<?php

namespace frontend\controllers;

use Yii;
use common\models\member\SaccoMember;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\member\LoginForm;
use common\models\member\LoggedInMember;
use common\models\User;
use common\models\loan\LoanGuarantor;
use common\models\member\BankAccount;
use yii\helpers\Url;

/**
 * MemberController implements the CRUD actions for SaccoMember model.
 */
class MemberController extends Controller {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Creates a new SaccoMember model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionRegister() {
        $model = new SaccoMember();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->member_id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SaccoMember model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->member_id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    public function actionProfile() {
        $this->layout = 'memberprofile';
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('profile', ['model' => $model,]);
        }
    }

    public function actionLoanApplications() {
        //$this->layout = 'memberprofile';
        $model = new LoggedInMember();
        $applications = $model->loan_applications;
        return $this->render('loan-applications', ['applications' => $applications,]);
    }

    /**
     * Finds the SaccoMember model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SaccoMember the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = SaccoMember::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionBankaccount() {
        $model = new BankAccount();
        $this->layout = 'memberprofile';

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate() and $model->save()) {
                //Flash
                Yii::$app->session->setFlash('success', 'You have successfully Added a bank to your profile');
                //Go Home
                return $this->goHome();
            }
        } else {
            return $this->render('_bank_account_form', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * List of all guarantor Tasks
     */
    public function actionGuarantorTasks() {
        $user = User::findLoggedInUser();
        return $this->render('guarantor-tasks', ['tasks' => $user->guarantorTasks]);
    }

    /**
     * Approve/reject guarantor task
     * @param Int $id Description
     */
    public function actionApproveTask($id) {
        $model = LoanGuarantor::findOne($id);
        $post = Yii::$app->request->post();
        if ($model->load($post) && $model->save(false)) {


            $checkloangaurantor = LoanGuarantor::findAll(['loan_id' => $model->loan_id, 'status_code' => 2]);
            if (sizeof($checkloangaurantor) == 2) {
                $loanmodel = \common\models\loan\LoanApplication::findOne(['loan_application_id' => $model->loan_id]);
                $loanmodel->gaurantor_approval_step_step = 'Y';
                $loanmodel->gaurantor_appointment_step = 'Y';
                $loanmodel->status_code=1;
                
                $loanmodel->update();
            }

            Yii::$app->session->setFlash('success', 'You have successfully approved a loan application request');
            return $this->redirect(Url::to(['site/index']));
        } else {
            return $this->render('approve-task', ['model' => $model]);
        }
    }

}
