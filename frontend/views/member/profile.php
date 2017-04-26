<?php

use common\models\member\LoggedInMember;
use miloschuman\highcharts\Highcharts;
use common\models\User;

//User Details
$user_id = Yii::$app->user->id;
$member = User::findOne($user_id);
$bank_accounts = $member->bankAccounts;
//Guarantor Tasks
$tasks = $member->guarantorTasks;
//session
$session = Yii::$app->session;

$this->title = $member->fullnames . "'s Profile";
?>
<style>
    .money{
        font-size: 23px;
        color:#068;
        float:right;
    }

    .member-profile-pic{
        height:auto;
        width:220px;
    }
    
       ul.list-group li.list-group-item{
        border-left: none;
        border-radius: 0px;
        border-right: none;
    }
</style>

<?= $this->render('parts/profile_info') ?>
<h2 style="font-weight: 700;color:#069;border-bottom: 4px solid #ccc;">Bank Accounts</h2> 
<table class='table table-striped'>
    <thead>
        <tr>
            <th>Bank</th>
            <th>Branch</th>
            <th>Account Name</th>
            <th>Account Number</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($bank_accounts AS $bank) {
            $myaccount = (object) $bank;
            ?>
            <tr>
                <td><?= $myaccount->bank_name; ?></td>
                <td><?= $myaccount->bank_branch; ?></td>
                <td><?= $myaccount->account_name; ?></td>
                <td><?= $myaccount->bank_account_no; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>



