<?php

namespace common\models;

use Yii;
/* 
 * Account Withdrawals
 */
class AccountWithdrawModel extends \yii\db\ActiveRecord{
   //APPLICATION DETAILS
    public $amount_requested;
    public $account_type;
    public $bank_acount;
    public $requested_by;
    public $requested_date;
    
    //ASSIGNMENT
    public $assigned_to;
    public $assignment_remarks;
    
    //APPROVAL
    public $approved_by;
    public $approval_date;
    public $approval_remarks;
    
    //PAYMENT
    public $amount_paid_out;
    public $payment_date;
    public $payment_remarks;
    
   
    public static function tableName()
    {
        return 'trans_member_withdrawal_requests';
    }
    
     public function rules()
    {
        return [
            [['amount_requested', 'account_type', 'bank_acount', 'requested_by'], 'required'],
            [['requested_by', 'assigned_to','approved_by'], 'integer'],
            [['amount_requested','amount_paid_out'], 'number'],
            [['approval_remarks','payment_remarks'], 'string', 'max' => 255],
        ];
    }
}
