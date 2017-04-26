<?php

namespace common\models\savings;


use Yii;

/**
 * This is the model class for table "get_mem_accounts".
 *
 * @property string $id
 * @property string $mem_id
 * @property string $open_date
 * @property string $close_date
 * @property string $saveproduct_id
 * @property string $earn
 * @property string $awarded
 * @property string $last_award_date
 * @property string $now_award_date
 * @property string $last_charge_date
 * @property string $branch_id
 * @property string $r_id
 * @property string $trans_date
 * @property string $imported_id
 * @property string $pin
 * @property string $sms_deposit
 * @property string $sms_withdrawal
 * @property string $sms_interest
 * @property string $status
 * @property string $monthly_deposit
 * @property string $processing_status
 * @property string $is_deposit_changed
 * @property string $insert_date
 * @property integer $insert_by
 * @property string $old_id
 */
class MemberAccounts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member_accounts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mem_id', 'saveproduct_id', 'branch_id', 'r_id', 'imported_id', 'monthly_deposit', 'insert_by', 'old_id'], 'integer'],
            [['open_date', 'last_award_date', 'now_award_date', 'last_charge_date', 'monthly_deposit', 'processing_status', 'is_deposit_changed', 'insert_date', 'insert_by', 'old_id'], 'required'],
            [['open_date', 'close_date', 'last_award_date', 'now_award_date', 'last_charge_date', 'trans_date', 'insert_date'], 'safe'],
            [['earn', 'awarded'], 'string', 'max' => 1],
            [['pin'], 'string', 'max' => 5],
            [['sms_deposit', 'sms_withdrawal', 'sms_interest'], 'string', 'max' => 3],
            [['status', 'is_deposit_changed'], 'string', 'max' => 10],
            [['processing_status'], 'string', 'max' => 100],
            [['old_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mem_id' => 'Mem ID',
            'open_date' => 'Open Date',
            'close_date' => 'Close Date',
            'saveproduct_id' => 'Saveproduct ID',
            'earn' => 'Earn',
            'awarded' => 'Awarded',
            'last_award_date' => 'Last Award Date',
            'now_award_date' => 'Now Award Date',
            'last_charge_date' => 'Last Charge Date',
            'branch_id' => 'Branch ID',
            'r_id' => 'R ID',
            'trans_date' => 'Trans Date',
            'imported_id' => 'Imported ID',
            'pin' => 'Pin',
            'sms_deposit' => 'Sms Deposit',
            'sms_withdrawal' => 'Sms Withdrawal',
            'sms_interest' => 'Sms Interest',
            'status' => 'Status',
            'monthly_deposit' => 'Monthly Deposit',
            'processing_status' => 'Processing Status',
            'is_deposit_changed' => 'Is Deposit Changed',
            'insert_date' => 'Insert Date',
            'insert_by' => 'Insert By',
            'old_id' => 'Old ID',
        ];
    }

    /**
     * @inheritdoc
     * @return MemberAccountsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MemberAccountsQuery(get_called_class());
    }
    
      /**
     * Bank Accounts for this user
     * @return type
     */
    public function getSavingsProduct() {
        return $this->hasMany(SavingsProduct::className(), ['saveproduct_id' => 'id']);
    }
}
