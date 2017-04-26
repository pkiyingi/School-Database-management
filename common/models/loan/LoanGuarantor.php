<?php

namespace common\models\loan;

use Yii;
use common\models\User;

/**
 * This is the model class for table "loan_guarantor".
 *
 * @property integer $guarantor_id
 * @property integer $loan_id
 * @property integer $assigned_to
 * @property integer $created_at
 * @property integer $created_by
 * @property string $identity_scannedcopy
 * @property integer $status_code
 * @property string $remarks
 * @property integer $updated_at
 * @property integer $updated_by
 *
 * @property LoanApplication $loan
 */
class LoanGuarantor extends \yii\db\ActiveRecord {

    /**
     * Guarantor request which has been rejected
     * @var Int
     */
    const STATUS_APPROVED = 1;

    /**
     * Guarntor request which ha snot yet been approved or rejected
     * @var Int
     */
    const STATUS_PENDING_APPROVAL = 0;

    /**
     * A guarantor task which has been rejected
     * @var int
     */
    const STATUS_REJECTED = 2;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'loan_guarantor';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['loan_id', 'assigned_to', 'created_at', 'created_by', 'status_code'], 'required'],
            [['loan_id', 'assigned_to', 'created_at', 'created_by', 'status_code', 'updated_at', 'updated_by'], 'integer'],
            [['identity_scannedcopy'], 'string', 'max' => 255],
            [['createdby_remarks','assignedto_remarks'], 'string', 'max' => 50],
            [['loan_id'], 'exist', 'skipOnError' => true, 'targetClass' => LoanApplication::className(), 'targetAttribute' => ['loan_id' => 'loan_application_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'guarantor_id' => 'Guarantor ID',
            'loan_id' => 'Loan ID',
            'assigned_to' => 'Assigned To',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'identity_scannedcopy' => 'Identity Scannedcopy',
            'status_code' => 'Status Code',
            'createdby_remarks' => 'Remarks',
            'assignedto_remarks' => 'Remarks',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Loan application in which this guarantor was appointed
     * @return \yii\db\ActiveQuery
     */
    public function getLoan() {
        return $this->hasOne(LoanApplication::className(), ['loan_application_id' => 'loan_id']);
    }

    /**
     * Persons to whom this guarantor task has been assigned to
     * @return type
     */
    public function getAssignedto() {
        return $this->hasOne(User::className(), ['member_id' => 'assigned_to']);
    }
    
    /**
     * Who made this guarantor request?
     * @return type
     */
    public function getCreatedBy() {
        return $this->hasOne(User::className(), ['member_id' => 'created_by']);
    }

}
