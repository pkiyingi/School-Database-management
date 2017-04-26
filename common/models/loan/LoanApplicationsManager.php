<?php

namespace common\models\loan;

use Yii;
use yii\base\Model;
use yii\db\Query;

/*
 * DB Management methods for the loan application Module
 */

class LoanApplicationsManager {

    /**
     * Database connection
     * @var type 
     */
    protected $db;

    /**
     * Create an instance
     */
    public function __construct() {
        $this->db = Yii::$app->db;
        Yii::$app->db->open();
        //all applications
    }

    /**
     * Get all loan applications
     * @return type
     */
    public static function getAllLoanApplications() {
        $db = Yii::$app->db;
        Yii::$app->db->open();
        $applications = $db->createCommand("SELECT * FROM trans_loan_application")
                ->queryAll();
        return $applications;
    }

}
