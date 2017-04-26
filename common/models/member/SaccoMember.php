<?php

namespace common\models\member;

use Yii;

/**
 * This is the model class for table "mst_member".
 *
 * @property integer $member_id
 * @property string $username
 * @property string $firstname
 * @property string $email
 * @property string $lastname
 * @property string $gender
 * @property integer $role
 * @property integer $created_date
 * @property string $created_by
 * @property integer $updated_date
 * @property string $updated_by
 * @property integer $status_code
 * @property string $joining_date
 * @property string $date_of_birth
 * @property string $member_category
 * @property string $member_monthly_contribution
 * @property string $toto_monthly_contribution
 * @property string $accont_type
 * @property string $telephone1
 * @property string $telephone2
 * @property string $physical_address
 * @property string $employment_type
 * @property string $employment_position
 * @property string $password
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $auth_key
 */
class SaccoMember extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mst_member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'firstname', 'email', 'lastname', 'gender', 'role', 'created_date', 'created_by', 'updated_date', 'updated_by', 'status_code', 'joining_date', 'date_of_birth', 'member_category', 'member_monthly_contribution', 'toto_monthly_contribution', 'accont_type', 'telephone1', 'telephone2', 'physical_address', 'employment_type', 'password', 'password_hash', 'password_reset_token', 'auth_key'], 'required'],
            [['role', 'created_date', 'updated_date', 'status_code'], 'integer'],
            [['joining_date', 'date_of_birth'], 'safe'],
            [['member_category', 'accont_type', 'employment_type', 'employment_position'], 'string'],
            [['member_monthly_contribution', 'toto_monthly_contribution'], 'number'],
            [['username', 'firstname', 'email', 'lastname', 'password', 'password_hash', 'password_reset_token', 'auth_key'], 'string', 'max' => 255],
            [['gender'], 'string', 'max' => 10],
            [['created_by', 'updated_by'], 'string', 'max' => 50],
            [['telephone1', 'telephone2'], 'string', 'max' => 20],
            [['physical_address'], 'string', 'max' => 2000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'member_id' => 'Member ID',
            'username' => 'Username',
            'firstname' => 'Firstname',
            'email' => 'Email',
            'lastname' => 'Lastname',
            'gender' => 'Gender',
            'role' => 'Role',
            'created_date' => 'Created Date',
            'created_by' => 'Created By',
            'updated_date' => 'Updated Date',
            'updated_by' => 'Updated By',
            'status_code' => 'Status Code',
            'joining_date' => 'Joining Date',
            'date_of_birth' => 'Date Of Birth',
            'member_category' => 'Member Category',
            'member_monthly_contribution' => 'Member Monthly Contribution',
            'toto_monthly_contribution' => 'Toto Monthly Contribution',
            'accont_type' => 'Account Type',
            'telephone1' => 'Telephone1',
            'telephone2' => 'Telephone2',
            'physical_address' => 'Physical Address',
            'employment_type' => 'Employment Type',
            'employment_position' => 'Employment Position',
            'password' => 'Password',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'auth_key' => 'Auth Key',
        ];
    }
}
