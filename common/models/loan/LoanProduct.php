<?php

namespace common\models\loan;

use Yii;

/**
 * This is the model class for table "loan_product".
 *
 * @property string $id
 * @property string $default_bank_account
 * @property string $account_id
 * @property string $int_rate
 * @property string $int_method
 * @property integer $grace_period
 * @property integer $arrears_period
 * @property integer $loan_period
 * @property integer $writeoff_period
 * @property string $max_loan_amt
 * @property string $based_on
 * @property string $branch_id
 * @property string $penalty_rate
 * @property string $r_id
 * @property string $nature_installment
 * @property string $multiple_loans_on_pdt
 * @property string $sms_applic
 * @property integer $number_of_gaurantors
 */
class LoanProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loan_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['default_bank_account', 'number_of_gaurantors'], 'required'],
            [['default_bank_account', 'account_id', 'grace_period', 'arrears_period', 'loan_period', 'writeoff_period', 'max_loan_amt', 'branch_id', 'r_id', 'number_of_gaurantors'], 'integer'],
            [['int_rate', 'penalty_rate'], 'number'],
            [['int_method', 'based_on'], 'string', 'max' => 20],
            [['nature_installment'], 'string', 'max' => 250],
            [['multiple_loans_on_pdt', 'sms_applic'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'default_bank_account' => 'Default Bank Account',
            'account_id' => 'Account ID',
            'int_rate' => 'Int Rate',
            'int_method' => 'Int Method',
            'grace_period' => 'Grace Period',
            'arrears_period' => 'Arrears Period',
            'loan_period' => 'Loan Period',
            'writeoff_period' => 'Writeoff Period',
            'max_loan_amt' => 'Max Loan Amt',
            'based_on' => 'Based On',
            'branch_id' => 'Branch ID',
            'penalty_rate' => 'Penalty Rate',
            'r_id' => 'R ID',
            'nature_installment' => 'Nature Installment',
            'multiple_loans_on_pdt' => 'Multiple Loans On Pdt',
            'sms_applic' => 'Sms Applic',
            'number_of_gaurantors' => 'Number Of Required Gaurantors',
        ];
    }
}
