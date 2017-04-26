<?php

namespace frontend\controllers;

use Yii;
use yii\base\Model;
use yii\db\Query;

class ToolsController extends \yii\web\Controller {

    public function actionLoanCalculator() {
        return $this->render('loan-calculator');
    }

    public function actionSavingsPlanner() {
        return $this->render('savings-planner');
    }

    /**
     * Change the amount saved every month
     */
    public function actionChangeSavings() {
        $post = Yii::$app->request->post();
        if (!empty($post)) {
            $new_amount = $post['next_savings'];
            $username = $post['username'];
            $db = Yii::$app->db;
            Yii::$app->db->open();
            $db->createCommand("UPDATE mst_member SET member_monthly_contribution ='{$new_amount}' WHERE username='{$username}' ")->execute();
            //Then go back to the dashboard
              Yii::$app->session->setFlash('success', 'You have successfully updated your details');
         return $this->redirect('index.php?r=site/index');
        }else {
            return $this->render('change-savings');
        }
    }

}
