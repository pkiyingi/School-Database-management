<?php

namespace common\models\loan;

use Yii;
use yii\base\Model;
use yii\db\Query;

/*
 * All Details associated to a loan application
 */

class LoanApplicationDetails {
    public $id;
    public $details;
    public $guarantors;
    public $attachments;
    public $costs;
    public $shares_bought;
    public $payment_schedule;
    public $approvals;

    
    public function __construct($id) {
        $this->id=$id;
        //Application Details
        $this->details = $this->getLoanApplicationDetails();
        //Guarantors
        $this->guarantors=$this->getLoanGuarantors();
    }
    
    /**
     * Basic Details of a loan application
     * @return \common\models\LoanApplication
     */
    protected function getLoanApplicationDetails(){
        $db = Yii::$app->db;
        Yii::$app->db->open();
        $loan = $db->createCommand("SELECT * FROM trans_loan_application_v WHERE loan_application_id='{$this->id}'")
                ->queryOne();
        return (object)$loan;
    }
    
    /**
     * Guarantors for this loan
     * @return type
     */
     protected function getLoanGuarantors(){
        $db = Yii::$app->db;
        Yii::$app->db->open();
        $guarantors = $db->createCommand("SELECT * FROM trans_loan_guarantor WHERE loan_application_id='{$this->id}'")
                ->queryAll();
        return $guarantors;
    }
    
    /**
     * Details of the type of Loan applied for
     */
       public static function getLoanTypeDetails($id){
        $db = Yii::$app->db;
        Yii::$app->db->open();
        $type = $db->createCommand("SELECT * FROM mst_typesof_loans WHERE loantype_id='{$id}'")
                ->queryOne();
        return $type;
    }
    
    /**
     * Get the loan payment shedule for a loan which is not yet submitted
     * @param Double $amount
     * @param Decimal $interest_rate
     * @param Int $period
     * @return type
     */
       public static function getLoanApplicationPaymentSchedule($amount,$interest_rate,$period){
        $db = Yii::$app->db;
        Yii::$app->db->open();
        $schedule = $db->createCommand("CALL `proc_calc_loan_schedule`($amount, $interest_rate, $period)")
                ->queryAll();
        return $schedule;
    }
}
