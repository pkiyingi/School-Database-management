<?php

namespace common\models\loan;

use Yii;

/**
 * This is the model class for table "trans_loan_approval".
 *
 * @property string $loan_approval_id
 * @property string $loan_application_id
 * @property integer $approved_by
 * @property string $approval_date
 * @property integer $status_code
 * @property string $remarks
 * @property integer $forwarded_to
 */
class LoanApproval extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loan_approval';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loan_application_id', 'approved_by', 'status_code', 'remarks', 'forwarded_to'], 'required'],
            [['loan_application_id', 'approved_by', 'status_code', 'forwarded_to'], 'integer'],
            [['approval_date'], 'safe'],
            [['remarks'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'loan_approval_id' => 'Loan Approval ID',
            'loan_application_id' => 'Loan Application ID',
            'approved_by' => 'Approved By',
            'approval_date' => 'Approval Date',
            'status_code' => 'Status Code',
            'remarks' => 'Remarks',
            'forwarded_to' => 'Forwarded To',
        ];
    }
}
