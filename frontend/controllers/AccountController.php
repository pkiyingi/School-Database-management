<?php

namespace frontend\controllers;

use Yii;
use common\models\MemberWithdrawalRequests;
use common\models\User;
use common\models\LoggedInMember;
use common\models\Processrequest\Processrequest;
use common\models\SaccoManagerDropdowns;


class AccountController extends \yii\web\Controller {

    public function actionChangeSavings() {
        $member = Yii::$app->user->identity;
        $model = User::findOne(['member_id' => $member->member_id,]);

        if ($model->load(Yii::$app->request->post())) {
            //Update Member's Monthly Contribution
            LoggedInMember::updateMemberMonthlyContribution($model->member_id, $model->member_monthly_contribution, $model->toto_monthly_contribution);
            //Then go to register member deduction
            LoggedInMember::registerMemberDeduction($model->member_id, 1, $model->member_monthly_contribution);
            //Then record the Toto contributions
            if ($model->toto_monthly_contribution > 0) {
                LoggedInMember::registerMemberDeduction($model->member_id, 3, $model->toto_monthly_contribution);
            }
            //Go back to the frontpage
            return $this->redirect('index.php?r=site/index');
        } else {
            return $this->render('change-savings', ['model' => $model]);
        }
    }

    public function actionClose() {
        return $this->render('close');
    }

    public function actionDashboard() {
        return $this->render('dashboard');
    }

    public function actionTotoAccounts() {
        return $this->render('toto-accounts');
    }

    public function actionTransferSavings() {
        return $this->render('transfer-savings');
    }

    /**
     * Withdraw from the model
     */
    public function actionWithdraw() {
        $model = new MemberWithdrawalRequests();
        $form = Yii::$app->request->post();
        $this->layout = "memberprofile";
        
          $dropdowns = new SaccoManagerDropdowns();
         // print_r($dropdowns->getReferenceNumberCounts()['withdrawals']); exit();
        $withdraw_ref = (isset($dropdowns->getReferenceNumberCounts()['withdrawals'])) ? ($dropdowns->getReferenceNumberCounts()['withdrawals'] + 1) : (1);

        //if (isset($post) && $model->reference_no) {
      //  $model->setAttribute('reference_no', 'WITHDRAW/' . date('Y') . '-' . date('m') . '/' . str_pad($withdraw_ref, 3, '0', 0));
        $model->reference_no='WITHDRAW/' . date('Y') . '-' . date('m') . '/' . str_pad($withdraw_ref, 3, '0', 0);
        
        
            
        
        if ($model->load($form) && $model->save()) {
			
			
			
			$request=new Processrequest();
			$request->reference_no=$model->reference_no;
			$request->application_type=1;
			$request->amount_applied=$model->amount_requested;
			$request->status=1;
			$request->member_no=$model->requested_by;
			$request->created_at=date('Y-m-d H:m:s');
			$request->created_by=$model->requested_by;
			$request->save();
                        
                        $request->createtast($request);
                        
                        // Up date the reference Number count
            $dropdowns->updateReferenceNumberCount($colomn='withdrawals');
            //Flash
            Yii::$app->session->setFlash('success', 'You have successfully submitted your withdrawal request');
            //Go Home
            return $this->goHome();
        } else {
            return $this->render('withdraw', ['model' => $model]);
        }
    }

}
