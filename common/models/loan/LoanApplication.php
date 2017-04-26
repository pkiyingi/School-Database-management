<?php

namespace common\models\loan;

use Yii;
use common\models\UploadedFiles;
use common\models\member\BankAccount;
use common\models\loan\LoanProductDocuments;


class LoanApplication extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loan_application';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sacco_account_no', 'loan_type_id', 'created_date', 'created_by', 'amount_requested', 'loan_purpose', 'consolidated_pay', 'monthly_expenditure', 'bank_account_id', 'submitted_date', 'repayment_period','new_sacco_savings'], 'required'],
            [['updated_by', 'created_by','loan_type_id', 'repayment_period','land_id','number_of_plots'], 'integer'],
            [['created_date', 'update_date', 'submitted_date', 'disbursment_date'], 'safe'],
            [['amount_requested', 'other_income','consolidated_pay', 'monthly_expenditure', 'new_sacco_savings', 'other_loan_repayments', 'amount_approved', 'monthly_repayment', 'outstanding_loan_balance', 'bank_loan_payment', 'net_payment'], 'number'],
            [['loan_purpose'], 'string', 'max' => 2000],
            [['reference_no','sacco_account_no','bank_account_id'], 'string', 'max' => 20],
             [['loan_details_step','gaurantor_appointment_step','gaurantor_approval_step_step','documentupload_step'], 'string', 'max' => 2],
            //[['loan_details_step', 'gaurantor_appointment_step', 'gaurantor_approval_step_step'], 'string', 'max' => 2],
        ];
        
        
        
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'loan_application_id' => 'Loan Application ID',
            'reference_no'=>'Reference No',
            'sacco_account_no' => 'Sacco Account No',
            'loan_type_id' => 'Type of Loan',
            'created_date' => 'Created Date',
            'created_by' => 'Created By',
            'amount_requested' => 'Amount Requested (UGX)',
            'loan_purpose' => 'Loan Purpose',
            'consolidated_pay' => 'Consolidated Pay (UGX)',
            'other_income' => 'Other Income (UGX)',
            'monthly_expenditure' => 'Monthly Expenditure (UGX)',
            'new_sacco_savings' => 'New Sacco Savings (UGX)',
            'other_loan_repayments' => 'Other Loan Repayments (UGX)',
            'bank_account_id' => 'Bank Account',
            'update_date' => 'Update Date',
            'updated_by' => 'Updated By',
            'submitted_date' => 'Submitted Date',
            'status_code' => 'Status Code',
            'amount_approved' => 'Amount Approved (UGX)',
            'repayment_period' => 'Repayment Period (Months)',
            'monthly_repayment' => 'Monthly Repayment (UGX)',
            'disbursment_date' => 'Disbursment Date',
            'outstanding_loan_balance' => 'Outstanding Loan Balance',
            'bank_loan_payment' => 'Bank Loan Payment (UGX)',
            'net_payment' => 'Net Payment (UGX)',
            'land_id'=>'Land Location',
            'number_of_plots'=>'Number of Plots',  
            'personal_details_step'=>'personal_details_step', 
            
            'loan_details_step'=>'loan_details_step', 
            
            'gaurantor_approval_step_step'=>'gaurantor_approval_step_step', 
            
            'gaurantor_appointment_step'=>'gaurantor_appointment_step',
            
        ];
    }
    
    /**
     * Guarantors appointed in this loan application
     * @return \yii\db\ActiveQuery
     */
    public function getGuarantors()
    {
        return $this->hasMany(LoanGuarantor::className(), ['loan_id' => 'loan_application_id']);
    }
    
    /**
     * Documents uploaded in this application
     */
     public function getDocuments()
    {
        return $this->hasMany(UploadedFiles::className(), ['ref_id' => 'loan_application_id']);
    }
	
    
       /**
     * Documents uploaded in this application
     */
     public function getRequireddocuments()
    {
        return $this->hasMany(LoanProductDocuments::className(), ['loan_productid' => 'loan_type_id']);
    }
	  /**
     * Bank Accounts for this user
     * @return type
     */
    public function getBankAccounts() {
        return $this->hasOne(BankAccount::className(), ['bank_account_id' => 'bank_account_id']);
    }
    
}
