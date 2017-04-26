<?php

namespace common\models\member;

use Yii;
use yii\base\Model;
use yii\db\Query;

//use yii\base\NotSupportedException;
//use yii\behaviors\TimestampBehavior;
//use yii\db\ActiveRecord;
//use yii\web\IdentityInterface;

/**
 * Logged in members of Ishomero
 */
class LoggedInMember {

    /**
     * Percentage of completeness of the current profile
     * @var Percentage
     */
    public $profile_completeness = null;

    /**
     * Detals of the logged in member
     * @var Object
     */
    public $member_details = null;

    /**
     * Bank accounts
     */
    public $bank_accounts = null;

    /**
     * Account History for this member
     */
    public $account_history = null;

    /**
     * Loan applications for a logged in member
     */
    public $loan_applications = null;

    /**
     * Deductions on this account
     * @var Array
     */
    public $deductions = null;

    public function __construct() {
        $this->member_details = Yii::$app->user->identity;
        $this->bank_accounts = $this->individualBankAccounts();
        $this->loan_applications = $this->individualLoanApplications();
        $this->profile_completeness = $this->getProfileInfoCompleteness();
        //Account History
        $this->account_history = $this->individualAccountHistory();
        //Deductions
        $this->deductions = $this->getMemberDeductions();
    }

    /**
     * Bank Accounts
     */
    protected function individualBankAccounts() {
        $db = Yii::$app->db;
        Yii::$app->db->open();
        $accounts = $db->createCommand("SELECT  *, CONCAT(bank_account_no,'-',bank_name) AS my_account_no FROM member_bank_account WHERE sacco_account_no = '{$this->member_details->username}'")
                ->queryAll();
        return $accounts;
    }

    /**
     * Loan applications of the logged in member
     */
    protected function individualLoanApplications() {
        $db = Yii::$app->db;
        Yii::$app->db->open();
        $accounts = $db->createCommand("SELECT  * FROM loan_application WHERE sacco_account_no = '{$this->member_details->username}'")
                ->queryAll();
        return $accounts;
    }

    /**
     * Account History
     */
    protected function individualAccountHistory() {
        $db = Yii::$app->db;
        Yii::$app->db->open();
        $account_history = $db->createCommand("SELECT  hist.*, accs.accounttype_name AS account_name FROM trans_member_account_history hist JOIN mst_account_type accs ON hist.account_type=accs.accounttype_id WHERE sacco_account_no = '{$this->member_details->username}'")
                ->queryAll();
        return $account_history;
    }

    /**
     * Get member deductions
     */
    protected function getMemberDeductions() {
        $db = Yii::$app->db;
        Yii::$app->db->open();
        $deductions = $db->createCommand("SELECT lst.deduction_type,lst.id,ded.amount_deducted,ded.amount_source from trans_member_deductions ded
                                        JOIN listof_member_deductions lst ON ded.deduction_id=lst.id WHERE ded.member_id = '{$this->member_details->member_id}'")
                ->queryAll();
        return $deductions;
    }

    /**
     * Completeness of the profile of the logged in staff
     * @return Percentage
     */
    protected function getProfileInfoCompleteness() {
        $db = Yii::$app->db;
        Yii::$app->db->open();
        $profile = $db->createCommand("SELECT * FROM mst_member WHERE username = '{$this->member_details->username}'")->queryOne();
        $empty = 0;
        $value = 0;

        foreach ($profile AS $x => $y) {
            if (empty($y)) {
                $empty++;
            } else {
                $value++;
            }
        }
        $total = $empty + $value;

        return round(100 * ($value / $total), 2);
    }

    /**
     * Update deductions
     */
    public static function updateMemberMonthlyContribution($member_id, $monthly, $toto = 0) {
        $db = Yii::$app->db;
        Yii::$app->db->open();
        return $db->createCommand("UPDATE mst_member SET member_monthly_contribution='{$monthly}', toto_monthly_contribution='{$toto}' WHERE member_id = '{$member_id}'")
                        ->execute();
    }

    /**
     * Register deductions on a SACCO member
     * @return Boolean
     */
    public static function registerMemberDeduction(
    $member_id, $deduction_id, $amount_deducted) {
        $db = Yii::$app->db;
        Yii::$app->db->open();
        return $db->createCommand("INSERT INTO trans_member_deductions SET deduction_id='{$deduction_id}', start_date=NOW(),date_created=NOW(),amount_source='SALARY', member_id = '{$member_id}',amount_deducted='{$amount_deducted}'")
                        ->execute();
    }

    /**
     * Total amount in savings
     * @return real
     */
    public function getTotalSavings() {
        return 9876157.98;
    }

    /**
     * Total Loan Balance
     * @return Double
     * @todo Should also return number of instalments remaining, and next payment date
     */
    public function getLoanBalance() {
        return 1200000;
    }

    /**
     * Total Amount woth of shares
     * @return Double
     */
    public function getTotalShareValue() {
        return 850000;
    }

    /**
     * The balance this account holder has in their regular savings account
     */
    public static function getRegularSavingsBalance() {
        return 11009846.095;
    }

    /**
     * The Toto savings balance for the logged in member/account holder
     */
    public static function getTotoSavingsBalance() {
        return 7896352.085;
    }

    /**
     * Maximum amount which can be withdrawn 
     * by this member/account holder from the Regular Saings account
     * @return Double
     */
    public static function getRegularSavingsAvailaBalance() {
        return 580000.54;
    }

    /**
     * Maximum amount which this member can withraw from the Toto Savings Account
     * @return Double
     */
    public static function getTotoSavingsAvailableBalance() {
        return 9000000;
    }

    /**
     * Determine if the logged in member can make a withdrawal on the Toto account.
     * Check if 
     * 1. The meber has a toto account
     * 2. member has not made a withdrwawal from this account in the last three months
     * 3. Member has sufficient amount in this account
     * @returns Boolean
     */
    public static function canMakeWithdrawalOnTotoAccount() {
        return true;
    }

}
