<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\db\Query;
use common\models\loan\LoanGuarantor;
use common\models\member\BankAccount;
use common\models\savings\MemberAccounts;
use common\models\savings\SavingsProduct;

use common\models\Processrequest\Processrequest;


/**
 * This is the model class for table "mst_member".
 *
 * @property integer $member_id
 * @property string $username
 * @property string $fullnames
 * @property string $gender
 * @property string $date_of_birth
 * @property string $employment_type
 * @property string $member_category
 * @property string $employment_position
 * @property string $joining_date
 * @property string $email
 * @property string $telephone1
 * @property string $telephone2
 * @property string $physical_address
 * @property string $password
 * @property string $password_hash
 * @property string $password_reset_token
 * @property integer $status_code
 * @property string $auth_key
 * @property string $created_date
 * @property string $created_by
 * @property string $updated_date
 * @property string $updated_by
 * @property string $gross_pay
 * @property string $profile_pic
 * @property string $next_of_kin
 * @property string $next_of_kin_tel
 * @property integer $sacco_branch
 * @property string $sign
 * @property integer $number_of_identifications
 * @property string $nationality
 * @property integer $number_of_dependants
 * @property string $place_of_birth
 * @property integer $postal_number
 * @property string $postal_code
 * @property string $town
 * @property string $country
 * @property string $province
 * @property string $district
 * @property string $plot_number
 * @property string $employer_name
 * @property string $employer_address
 * @property string $employer_country
 * @property string $occupation
 * @property integer $employment_duration_years
 * @property integer $employment_duration_months
 * @property string $is_sms_client
 * @property string $is_web_client
 * @property string $is_mobile_money_client
 * @property string $file_ref
 * @property integer $is_imported
 * @property string $firstname
 * @property string $lastname
 */
class User extends ActiveRecord implements IdentityInterface {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'mst_member';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [ //, 'created_date','physical_address','telephone1', 'telephone2'
            [['username', 'fullnames', 'gender', 'status_code'], 'required'],
            [['date_of_birth', 'joining_date', 'created_date', 'updated_date'], 'safe'],
            [['employment_type', 'member_category', 'employment_position', 'place_of_birth', 'employer_address', 'employer_country'], 'string'],
            [['status_code', 'gross_pay', 'sacco_branch', 'number_of_identifications', 'number_of_dependants', 'postal_number', 'employment_duration_years', 'employment_duration_months', 'is_imported'], 'integer'],
            [['username', 'fullnames', 'email', 'password', 'password_hash', 'password_reset_token', 'auth_key', 'lastname'], 'string', 'max' => 255],
            [['gender'], 'string', 'max' => 10],
            [['telephone1', 'telephone2'], 'string', 'max' => 20],
            [['physical_address'], 'string', 'max' => 2000],
            [['created_by', 'updated_by'], 'string', 'max' => 50],
            [['profile_pic', 'next_of_kin', 'next_of_kin_tel', 'sign', 'nationality', 'postal_code', 'town', 'country', 'province', 'district', 'plot_number', 'employer_name', 'occupation', 'file_ref'], 'string', 'max' => 100],
            [['is_sms_client', 'is_web_client', 'is_mobile_money_client'], 'string', 'max' => 2],
            [['firstname'], 'string', 'max' => 225],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'member_id' => 'Member ID',
            'username' => 'Username',
            'fullnames' => 'Fullnames',
            'gender' => 'Gender',
            'date_of_birth' => 'Date Of Birth',
            'employment_type' => 'Employment Type',
            'member_category' => 'Member Category',
            'employment_position' => 'Employment Position',
            'joining_date' => 'Joining Date',
            'email' => 'Email',
            'telephone1' => 'Telephone1',
            'telephone2' => 'Telephone2',
            'physical_address' => 'Physical Address',
            'password' => 'Password',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'status_code' => 'Status Code',
            'auth_key' => 'Auth Key',
            'created_date' => 'Created Date',
            'created_by' => 'Created By',
            'updated_date' => 'Updated Date',
            'updated_by' => 'Updated By',
            'gross_pay' => 'Gross Pay',
            'profile_pic' => 'Profile Pic',
            'next_of_kin' => 'Next Of Kin',
            'next_of_kin_tel' => 'Next Of Kin Tel',
            'sacco_branch' => 'Sacco Branch',
            'sign' => 'Sign',
            'number_of_identifications' => 'Number Of Identifications',
            'nationality' => 'Nationality',
            'number_of_dependants' => 'Number Of Dependants',
            'place_of_birth' => 'Place Of Birth',
            'postal_number' => 'Postal Number',
            'postal_code' => 'Postal Code',
            'town' => 'Town',
            'country' => 'Country',
            'province' => 'Province',
            'district' => 'District',
            'plot_number' => 'Plot Number',
            'employer_name' => 'Employer Name',
            'employer_address' => 'Employer Address',
            'employer_country' => 'Employer Country',
            'occupation' => 'Occupation',
            'employment_duration_years' => 'Employment Duration Years',
            'employment_duration_months' => 'Employment Duration Months',
            'is_sms_client' => 'Is Sms Client',
            'is_web_client' => 'Is Web Client',
            'is_mobile_money_client' => 'Is Mobile Money Client',
            'file_ref' => 'File Ref',
            'is_imported' => 'Is Imported',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id) {
        return static::findOne(['member_id' => $id,]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username) {
        return static::findOne(['username' => $username,]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token) {
//        if (!static::isPasswordResetTokenValid($token)) {
//            return null;
//        }

        return static::findOne([
                    'password_reset_token' => $token,]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token) {
        if (empty($token)) {
            return false;
        }
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId() {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password) {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey() {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken() {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken() {
        $this->password_reset_token = null;
    }

    /**
     * Generates new password reset token
     */
    public static function setPasswordResetToken($username) {
        $db = Yii::$app->db;
        Yii::$app->db->open();

        $params = ['username' => $username];
        return $db->createCommand()->update(self::tableName(), [
                    'password_reset_token' => Yii::$app->security->generateRandomString() . '_' . time(),
                        ], $params)->execute();
    }

    /**
     * Pending Guarantor tasks assigned to this person
     * @return type\
     */
    public function getGuarantorTasks() {
        return $this->hasMany(LoanGuarantor::className(), ['assigned_to' => 'member_id']);
    }

    /**
     * Bank Accounts for this user
     * @return type
     */
    public function getBankAccounts() {
        return $this->hasMany(BankAccount::className(), ['sacco_account_no' => 'username']);
    }
    
    /**
     * Bank Accounts for this user
     * @return type
     */
    public function getMemberAccounts() {
        return $this->hasMany(MemberAccounts::className(), ['member_id' => 'member_id']);
    }

    /**
     * Details of the currentlu logged in User
     * @return \common\models\User
     */
    public static function findLoggedInUser() {
        return self::findOne(Yii::$app->user->id);
    }

    
    public function getSavingsProduct()
    {
         //return $this->hasMany(MemberAccounts::className(), ['member_id' => 'member_id']);
		 return $this->hasMany(SavingsProduct::className(), ['id'=>'saveproduct_id'])->via('memberAccounts');
        
    }
	
	
	 /**
     * Bank Accounts for this user
     * @return type
     */
    public function getUserrequests() {
        return $this->hasMany(Processrequest::className(), ['member_no' => 'username']);
    }
}
