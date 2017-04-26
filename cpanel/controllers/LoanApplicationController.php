<?php

namespace cpanel\controllers;

use Yii;
use common\models\LoanApplication;
use common\models\LoanApplicationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\LoanApplicationsManager;
use mPDF;

/**
 * LoanApplicationController implements the CRUD actions for LoanApplication model.
 */
class LoanApplicationController extends Controller {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all LoanApplication models.
     * @return mixed
     */
    public function actionIndex() {
        //Search could be shouwn in a modal
        //$searchModel = new LoanApplicationSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $loan_manager = LoanApplicationsManager::getAllLoanApplications();
        

        return $this->render('index', [
                    'applications' => $loan_manager,
        ]);
    }

    /**
     * Displays a single LoanApplication model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Loan Applications Which have been approved
     * @return type
     */
    public function actionApproved() {
        $approved = LoanApplicationsManager::getAllLoanApplications();

        return $this->render('approved', [
                    'model' => $approved,
        ]);
    }

    /**
     * Download a PDF version of the approved applications
     * @return type
     */
    public function actionDownloadApproved() {
        //Approved applications
         $approved = LoanApplicationsManager::getAllLoanApplications();

        $mpdf = new mPDF('c', 'A4-L');
	        $mpdf->WriteHTML($this->renderPartial('/loan-application/approved',['model'=>$approved]));
	        $mpdf->Output();
	        exit;
    }

    /**
     * Creates a new LoanApplication model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new LoanApplication();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->loan_application_id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing LoanApplication model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->loan_application_id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing LoanApplication model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the LoanApplication model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LoanApplication the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = LoanApplication::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
