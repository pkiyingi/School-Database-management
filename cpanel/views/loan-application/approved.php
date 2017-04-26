<?php

use yii\helpers\Html;
use common\models\LoanApplicationsManager;

$this->title = 'Approved Loan Applications';
?>
<style>
    <link href="<?= MYSACCO_FRONTEND_URL; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= MYSACCO_FRONTEND_URL; ?>/css/custom.css" rel="stylesheet">
    html,body{
        background:#fff; 
    }
    table tr td{
        padding:5px;
    }
    tr:nth-child(odd) {
        background-color:red; 
    }
    table thead tr th{
        padding:7px;
        background:#1155aa;
        color:#fff;

    }
</style>

<h2 class="text-center">UGANDA REVENUE AUTHORITY STAFF SACCO<BR/>
    <small>APPROVED LOANS AS AT <?= date('Y-M-d'); ?></small>
</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>
                REFERENCE NO
            </th>
            <th>
                NAME OF APPLICANT
            </th>
            <th>
                MEMBER ID
            </th>
            <th>AMOUNT APPROVED</th>
            <th>BANK NAME</th>
            <TH>BANK BRANCH</TH>
            <TH>BANK ACCOUNT NO.</TH>
        </tr>   
    </thead>
    <tbody>
        <?php
        $num=0;
        foreach ($model AS $application) {
            $loan = (object) $application;
            ?>
        <tr <?php if(($num%2)==0){?> class="info;"<?php } ?>>
                <td>
                    <?= $loan->reference_no; ?>
                </td>
                <td>
                    Okumu
                </td>
                <td>
                    <?= $loan->sacco_account_no ?>
                </td>
                <th>
                    <?= $loan->loan_type_id ?>
                </th>
                <td>
                    <?= $loan->amount_approved ?>
                </td>
                <td><?= $loan->repayment_period ?></td>
                <td></td>
            </tr>
        <?php $num++; } ?>
    </tbody>
</table>


<hr/>
<p>Authorized by: </p>
<p>Sign:______________________</p>
<p>Date: <?= date('Y-M-d') ?></p>

