<?php

namespace common\models\member;

use Yii;

/**
 * This is the model class for table "member_bank_account".
 *
 * @property integer $bank_account_id
 * @property string $account_name
 * @property string $bank_account_no
 * @property string $bank_branch
 * @property string $bank_name
 * @property string $sacco_account_no
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 */
class BankAccount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member_bank_account';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['account_name', 'bank_account_no', 'bank_branch', 'bank_name', 'sacco_account_no', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['account_name', 'bank_branch', 'bank_name'], 'string', 'max' => 255],
            [['bank_account_no', 'sacco_account_no'], 'string', 'max' => 50],
            [['created_by', 'updated_by'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bank_account_id' => 'Bank Account ID',
            'account_name' => 'Account Name',
            'bank_account_no' => 'Bank Account No',
            'bank_branch' => 'Bank Branch',
            'bank_name' => 'Bank Name',
            'sacco_account_no' => 'Sacco Account No',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
