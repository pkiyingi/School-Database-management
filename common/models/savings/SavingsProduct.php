<?php

namespace common\models\savings;

use Yii;

/**
 * This is the model class for table "savings_product".
 *
 * @property string $id
 * @property string $account_id
 * @property integer $grace_period
 * @property string $opening_bal
 * @property string $min_bal
 * @property string $int_rate
 * @property string $withdrawal_perc
 * @property string $deposit_perc
 * @property string $deposit_flat
 * @property string $withdrawal_flat
 * @property string $type
 * @property string $pledged_account_id
 * @property string $monthly_charge
 * @property integer $int_frequency
 * @property string $secure_loan
 * @property string $branch_id
 * @property string $tax_rate
 * @property string $r_id
 * @property string $expense_account_id
 * @property string $tax_account_id
 * @property string $int_type
 * @property integer $withdrawal_no_lim
 * @property string $must_deposit
 * @property string $start_award
 * @property string $int_award_type
 * @property integer $atmChargeAmount
 * @property integer $atmMaxTransctions
 * @property integer $withdrawal_limit_day
 * @property integer $dormantDays
 * @property string $product_name
 */
class SavingsProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'savings_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['account_id', 'grace_period', 'opening_bal', 'min_bal', 'pledged_account_id', 'monthly_charge', 'int_frequency', 'branch_id', 'r_id', 'expense_account_id', 'tax_account_id', 'withdrawal_no_lim', 'atmChargeAmount', 'atmMaxTransctions', 'withdrawal_limit_day', 'dormantDays'], 'integer'],
            [['int_rate', 'withdrawal_perc', 'deposit_perc', 'deposit_flat', 'withdrawal_flat', 'tax_rate'], 'number'],
            [['product_name'], 'required'],
            [['type'], 'string', 'max' => 15],
            [['secure_loan', 'must_deposit'], 'string', 'max' => 3],
            [['int_type'], 'string', 'max' => 20],
            [['start_award'], 'string', 'max' => 1],
            [['int_award_type'], 'string', 'max' => 4],
            [['product_name'], 'string', 'max' => 100],
            [['account_id'], 'exist', 'skipOnError' => true, 'targetClass' => Accounts::className(), 'targetAttribute' => ['account_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'account_id' => 'Account ID',
            'grace_period' => 'Grace Period',
            'opening_bal' => 'Opening Bal',
            'min_bal' => 'Min Bal',
            'int_rate' => 'Int Rate',
            'withdrawal_perc' => 'Withdrawal Perc',
            'deposit_perc' => 'Deposit Perc',
            'deposit_flat' => 'Deposit Flat',
            'withdrawal_flat' => 'Withdrawal Flat',
            'type' => 'Type',
            'pledged_account_id' => 'Pledged Account ID',
            'monthly_charge' => 'Monthly Charge',
            'int_frequency' => 'Int Frequency',
            'secure_loan' => 'Secure Loan',
            'branch_id' => 'Branch ID',
            'tax_rate' => 'Tax Rate',
            'r_id' => 'R ID',
            'expense_account_id' => 'Expense Account ID',
            'tax_account_id' => 'Tax Account ID',
            'int_type' => 'Int Type',
            'withdrawal_no_lim' => 'Withdrawal No Lim',
            'must_deposit' => 'Must Deposit',
            'start_award' => 'Start Award',
            'int_award_type' => 'Int Award Type',
            'atmChargeAmount' => 'Atm Charge Amount',
            'atmMaxTransctions' => 'Atm Max Transctions',
            'withdrawal_limit_day' => 'Withdrawal Limit Day',
            'dormantDays' => 'days after which account is flagged as dormant',
            'product_name' => 'Product Name',
        ];
    }
    
     /**
     * Bank Accounts for this user
     * @return type
     */
    public function getAccounts() {
        return $this->hasMany(Accounts::className(), ['account_id' => 'id']);
    }
}
