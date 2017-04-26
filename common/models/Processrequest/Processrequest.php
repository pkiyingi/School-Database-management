<?php

namespace common\models\Processrequest;

use Yii;
use yii\db\Query;
use common\models\settings\Requesttypes;

/**
 * This is the model class for table "process_request".
 *
 * @property integer $id
 * @property string $reference_no
 * @property integer $application_type
 * @property string $amount_applied
 * @property string $amount_approved
 * @property string $remarks
 * @property integer $status
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 * @property string $member_no
 */
class Processrequest extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'process_request';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['reference_no', 'application_type', 'amount_applied', 'status', 'created_at', 'created_by', 'member_no'], 'required'],
            [['application_type', 'amount_applied', 'amount_approved', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['reference_no', 'member_no'], 'string', 'max' => 20],
            [['remarks'], 'string', 'max' => 200],
            [['created_by', 'updated_by'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'reference_no' => 'Reference No',
            'application_type' => 'Application Type',
            'amount_applied' => 'Amount Applied',
            'amount_approved' => 'Amount Approved',
            'remarks' => 'Remarks',
            'status' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'member_no' => 'Member No',
        ];
    }

    /**
     * Bank Accounts for this user
     * @return type
     */
    public function getApplicationtype() {
        return $this->hasOne(Requesttypes::className(), ['id' => 'application_type']);
    }

    public function createtast($request = null) {
        $sql1 = "SELECT
                module_id,
               ( select username from
                (
                (SELECT 
                sacco_ugmembers.UserName,
                count(*)
                FROM sacco_ugmembers
                where sacco_ugmembers.GroupID=1
                GROUP BY sacco_ugmembers.GroupID, sacco_ugmembers.UserName
                order by count(*)
                limit 1) a)),
                now(),
                now(),
                DATE_ADD(now(), INTERVAL max_sla DAY),
                id,
                $request->id,
                role_id
                FROM processing_unit p
                where module_id={$request->application_type} and is_start='YES'";
                
               // print_r($sql1); exit();

        //**********  Insert a record into another table  ************

        $sql = "INSERT INTO tasks (module_id, assigned_staff, insert_date,action_start_date,action_due_date,unitid,userrequestsid,role_id){$sql1}";
  
        $db = Yii::$app->db;
        Yii::$app->db->open();
        $db->createCommand($sql)->execute();
    }

}
