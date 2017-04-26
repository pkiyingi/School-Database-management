<?php

namespace frontend\controllers;

use Yii;
use common\models\loan\LoanApplication;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\SaccoManagerDropdowns;
use common\models\loan\LoanApplicationDetails;
use common\models\loan\LoanGuarantor;
use common\models\member\SaccoMember;
use common\models\User;
use common\models\Processrequest\Processrequest;

/**
 * LoanController implements the CRUD actions for LoanApplication model.
 */
class LoanController extends Controller {

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
     * Lists all LoanApplication models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new LoanApplicationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LoanApplication model.
     * @param integer $id
     * @return mixed
     */
    public function actionDetails($id) {

        $this->layout = "loan_application";
        $details = LoanApplication::findOne($id);
        return $this->render('details', [
                    'loan' => $details,
        ]);
    }

    /**
     * Creates a new LoanApplication model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionApply() {
        $model = new LoanApplication();


        $post = Yii::$app->request->post();
        $this->layout = "loan_application";

        ///Get the reference No.
        //1. Last reference No
        //Dropdowns
        $dropdowns = new SaccoManagerDropdowns();
        $loan_ref = (isset($dropdowns->reference_number['loans'])) ? ($dropdowns->reference_number['loans'] + 1) : (1);

        //if (isset($post) && $model->reference_no) {
        $model->setAttribute('reference_no', 'LOAN/' . date('Y') . '-' . date('m') . '/' . str_pad($loan_ref, 3, '0', 0));
        //  }

        if ($model->load($post) && $model->save(false)) {

            $request = new Processrequest();
            $request->reference_no = $model->reference_no;
            $request->application_type = 6;
            $request->amount_applied = $model->amount_requested;
            $request->status = 1;
            $request->member_no = $model->sacco_account_no;
            $request->created_at = date('Y-m-d H:m:s');
            $request->created_by = $model->sacco_account_no;
            $request->save();


            $sql1 = "SELECT
                module_id,
               ( select username from
                (
                (SELECT 
                sacco_ugmembers.UserName,
                count(*)
                FROM sacco_ugmembers
                where sacco_ugmembers.GroupID=1
                GROUP BY sacco_ugmembers.GroupID, sacco_ugmembers.UserName
                order by count(*)
                limit 1) a)),
                now(),
                now(),
                DATE_ADD(now(), INTERVAL max_sla DAY),
                id,
                $request->id,
                role_id
                FROM processing_unit p
                where module_id={$request->application_type} and is_start='YES'";

            print_r($sql1);
            exit();
            $request->createtast($request);



            Yii::$app->session->setFlash('success', 'You have successfully submitted your loan application request');
            //Update Reference No Count
            $dropdowns->updateReferenceNumberCount();

            return $this->redirect(['details', 'id' => $model->loan_application_id]);
        } else {
            Yii::$app->session->setFlash('info', 'Please fill in the form correctly to submit your application');

            return $this->render('apply', [
                        'model' => $model,
            ]);
        }
    }

    public function actionConfirm($id = null) {
        $this->layout = "loan_application";

        if (Yii::$app->request->post()) {
            $loanmodel = LoanApplication::findOne($id);
            $loanmodel->status_code = 1;
            $loanmodel->save();

           
            Yii::$app->session->setFlash('success', 'You have successfully submitted your Loan application; ');

            return $this->goHome();
        } else {

            $loanmodel = LoanApplication::findOne($id);
            $loanmodel->status_code = 1;
            $loanmodel->save();
            $model = $this->findModel($id);

            return $this->render('apply/confirm', ['model' => $model]);
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
     * Upload a document 
     * @param Int $id Loan Application Identifier
     * @return type
     */
    /* public function actionUpload($id=47) {
      $model = $this->findModel($id);

      if ($model->load(Yii::$app->request->post()) && $model->save()) {
      return $this->redirect(['view', 'id' => $model->loan_application_id]);
      } else {
      return $this->render('upload', [
      'model' => $model,
      ]);
      }
      }
     * */

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

    /**
     * Save Guaratir details for a loan appication
     * @return type
     */
    public function actionAddGuarantor($id) {
        $model = new LoanGuarantor();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Guarantor details successfully saved');

            // <editor-fold defaultstate="collapsed" desc="Send Email to member">
            $message = "<p>Hello {$model->assignedto->fullnames}, you have been requested to guarantee a loan application by {$model->createdBy->fullnames}.
                        <br/>Please note that any guarantor under this agreement will be responsible to look for the borrower or be liable for sums due under it which the Borrower fails to pay.                         
                        <br/>To grarantee this loan application please click the button below.
                        <br/>Yours, URA STAFF SACCO TEAM</p>";

            Yii::$app->mailer->compose()
                    ->setFrom('urasacco@ura.go.ug')
                    ->setTo($model->assignedto->email)
                    ->setSubject('REQUEST TO APPROVE LOAN NO.' . $model->loan->reference_no)
                    ->setHtmlBody($message)
                    ->send();
            // </editor-fold>
//Go back to loan details
            return $this->redirect(['details', 'id' => $model->loan_id]);
        } else {
            $model->loan_id = $id;
            $model->created_at = time();
            $model->created_by = Yii::$app->user->id;
            $model->status_code = LoanGuarantor::STATUS_PENDING_APPROVAL;
            return $this->renderPartial('_guarantor-form', [
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
    public function actionUpdateloanprofile() {
        $model = User::findLoggedInUser();
        $this->layout = "loan_application";


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['loan/loandetails']);
        } else {
            return $this->render('apply/updateprofile', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Creates a new LoanApplication model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionLoandetails($id = null) {

        $this->layout = "loan_application";


        $checkapplications = LoanApplication::findOne(['sacco_account_no' => User::findLoggedInUser()->username, 'status_code' => '0']);

        if (sizeof($checkapplications) == 1) {
            $id = $checkapplications->loan_application_id;
        }


        if ($id == null) {
            $model = new LoanApplication();


            $post = Yii::$app->request->post();


            /*
              if ($model->load($post)) {

              } else {
              if (sizeof($checkapplications) == 1) {
              $model = $this->findModel($checkapplications->loan_application_id);

              Yii::$app->session->setFlash('danger', 'You already have a pending Loan application Loan Reference Number :' . $checkapplications->reference_no);

              return $this->render('apply/loandetails', [
              'model' => $model,
              ]);
              }
              }


             */

            ///Get the reference No.
            //1. Last reference No
            //Dropdowns
            $dropdowns = new SaccoManagerDropdowns();


            $loan_ref = (isset($dropdowns->getReferenceNumberCounts()['loans'])) ? ($dropdowns->getReferenceNumberCounts()['loans'] + 1) : (1);

            //if (isset($post) && $model->reference_no) {
            $model->setAttribute('reference_no', 'LOAN/' . date('Y') . '-' . date('m') . '/' . str_pad($loan_ref, 3, '0', 0));
            //  }

            if ($model->load($post)) {
                $model->loan_details_step = 'Y';
                $model->personal_details_step = 'Y';
                if ($model['amount_requested'] > $dropdowns->getLoanProducts($model->loan_type_id)['max_loan_amt']) {
                    Yii::$app->session->setFlash('danger', 'Sorry the maximum amount for this loan type is ' . $dropdowns->getLoanProducts($model->loan_type_id)['max_loan_amt']);
                    return $this->render('apply/loandetails', [
                                'model' => $model,
                    ]);
                }
                if ($model['repayment_period'] == null) {
                    Yii::$app->session->setFlash('danger', 'Please select a repayment period');
                    return $this->render('apply/loandetails', [
                                'model' => $model,
                    ]);
                }

                $gaurantornumber = 0;
                $gaurantornumber = $dropdowns->getLoanProducts($model->loan_type_id)['number_of_gaurantors'];
                $documents = 0;
                $documents = $dropdowns->getLoanProducts($model->loan_type_id)['numberofdocs'];
                if ($gaurantornumber == 0) {
                    $model->gaurantor_appointment_step = 'Y';
                    $model->gaurantor_approval_step_step = 'Y';
                    $model->loan_details_step = 'Y';
                    $model->personal_details_step = 'Y';
                }

                if ($gaurantornumber == 0) {
                    $documents = 0;
                    $model->documentupload_step = 'Y';
                }
            }

            if ($model->load($post) && $model->save(false)) {


                $request = new Processrequest();
                $request->reference_no = $model->reference_no;
                $request->application_type = 6;
                $request->amount_applied = $model->amount_requested;
                $request->status = 1;
                $request->member_no = $model->sacco_account_no;
                $request->created_at = date('Y-m-d H:m:s');
                $request->created_by = $model->sacco_account_no;
                $request->save();


                $request->createtast($request);
                Yii::$app->session->setFlash('success', 'You have successfully saved your Loan Application Details');
                //Update Reference No Count
                $dropdowns->updateReferenceNumberCount();
                $session = Yii::$app->session;
                $_SESSION['loanid'] = $model->loan_application_id;

                if ($gaurantornumber > 0) {
                    return $this->redirect(['loan/guarantor', 'id' => $model->loan_application_id]);
                } else if ($gaurantornumber > 0) {
                    return $this->redirect(['loan/documents', 'id' => $model->loan_application_id]);
                }
                return $this->redirect(['view', 'id' => $model->loan_application_id]);
            } else {
                Yii::$app->session->setFlash('info', 'Please fill in the form correctly to submit your application');

                return $this->render('apply/loandetails', [
                            'model' => $model,
                ]);
            }
        } else {
            $model = $this->findModel($id);


            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('info', 'You have successfully updated the loan application details');

                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('apply/loandetails', [
                            'model' => $model,
                ]);
            }
        }
    }

    /**
     * Save Guaratir details for a loan appication
     * @return type
     */
    public function actionGuarantor($id) {



        $model = new LoanGuarantor();


        $this->layout = "loan_application";
        if (sizeof(LoanApplication::findOne($id)->guarantors) < 2) {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', 'Guarantor details successfully saved! The Gaurantors will need to approve your application before you submit');

                // <editor-fold defaultstate="collapsed" desc="Send Email to member">
                $message = "<p>Hello {$model->assignedto->fullnames}, you have been requested to guarantee a loan application by {$model->createdBy->fullnames}.
                        <br/>Please note that any guarantor under this agreement will be responsible to look for the borrower or be liable for sums due under it which the Borrower fails to pay.                         
                        <br/>To grarantee this loan application please click the button below.
                        <br/>Yours, URA STAFF SACCO TEAM</p>";

                Yii::$app->mailer->compose()
                        ->setFrom('urasacco@ura.go.ug')
                        ->setTo($model->assignedto->email)
                        ->setSubject('REQUEST TO APPROVE LOAN NO.' . $model->loan->reference_no)
                        ->setHtmlBody($message)
                        ->send();
                // </editor-fold>
                //Go back to loan details
                // return $this->redirect(['details', 'id' => $model->loan_id]);
                $model = new LoanGuarantor();
            }
        } else if (sizeof(LoanApplication::findOne($id)->guarantors) >= 2) {
            $loanmodel = LoanApplication::findOne($id);
            $loanmodel->gaurantor_appointment_step = 'Y';
            $loanmodel->save();
        }


        $model->loan_id = $id;
        $model->created_at = time();
        $model->created_by = Yii::$app->user->id;

        $model->status_code = LoanGuarantor::STATUS_PENDING_APPROVAL;
        return $this->render('apply/_guarantor-form', [
                    'model' => $model, 'loan' => LoanApplication::findOne($id)
        ]);
    }

    /**
     * Displays a single LoanApplication model.
     * @param integer $id
     * @return mixed
     */
    public function actionDocuments($id = null) {

        /*
         * Get the number of uploaded documents
         */

        $uploadeddocsnum = sizeof(LoanApplication::findOne($id)->documents);
        /*
         * 
         * Get the number of Required documents
         */

        $requireddocsnum = sizeof(LoanApplication::findOne($id)->requireddocuments);

        if ($uploadeddocsnum == $requireddocsnum) {
            $loanmodel = LoanApplication::findOne($id);
            $loanmodel->documentupload_step = 'Y';
            $loanmodel->save();
        }

        $this->layout = "loan_application";
        $details = LoanApplication::findOne($id);
        return $this->render('apply/_document_upload', [
                    'loan' => $details,
        ]);
    }

}
