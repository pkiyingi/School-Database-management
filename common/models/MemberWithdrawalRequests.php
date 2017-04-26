<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "trans_member_withdrawal_requests".
 *
 * @property string $withdrawalrequest_id
 * @property integer $requested_by
 * @property double $amount_requested
 * @property integer $account_type
 * @property string $bank_acount
 * @property string $requested_date
 * @property integer $assigned_to
 * @property string $assignment_remarks
 * @property integer $approved_by
 * @property string $approval_date
 * @property integer $approval_remarks
 * @property double $amount_paid_out
 * @property string $payment_date
 * @property string $payment_remarks
 * @property integer $status_code
 * @property string $reference_no
 */
class MemberWithdrawalRequests extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_member_withdrawal_requests';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['requested_by', 'amount_requested', 'account_type', 'bank_acount', 'requested_date', 'reference_no'], 'required'],
            [['requested_by', 'account_type', 'assigned_to', 'approved_by', 'approval_remarks', 'status_code'], 'integer'],
            [['amount_requested', 'amount_paid_out'], 'number'],
            [['requested_date', 'approval_date', 'payment_date'], 'safe'],
            [['bank_acount'], 'string', 'max' => 50],
            [['assignment_remarks', 'payment_remarks'], 'string', 'max' => 255],
            [['reference_no'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'withdrawalrequest_id' => 'Withdrawalrequest ID',
            'requested_by' => 'Requested By',
            'amount_requested' => 'Amount Requested',
            'account_type' => 'Account Type',
            'bank_acount' => 'Bank Acount',
            'requested_date' => 'Requested Date',
            'assigned_to' => 'Assigned To',
            'assignment_remarks' => 'Assignment Remarks',
            'approved_by' => 'Approved By',
            'approval_date' => 'Approval Date',
            'approval_remarks' => 'Approval Remarks',
            'amount_paid_out' => 'Amount Paid Out',
            'payment_date' => 'Payment Date',
            'payment_remarks' => 'Payment Remarks',
            'status_code' => 'Status Code',
            'reference_no' => 'Reference No',
        ];
    }
}
