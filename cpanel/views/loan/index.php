<?php
use yii\helpers\Url;
$this->title="Loan applications made";
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>
                REF. NO
            </th>
            <th>APPLIED BY
            </th>
            <th>CONSOLIDATED PAY</th>
            <TH>
                AMOUNT REQUESTED
            </TH>
            <TH>REPAYMENT PERIOD</TH>
            <TH>LOAN PURPOSE</TH>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($loans AS $loan){ ?>
        <tr>
            <th><?= $loan->reference_no; ?></th>
            <td><?= $loan->sacco_account_no; ?></td>
            <td><?= $loan->consolidated_pay; ?></td>
            <th><?= number_format($loan->amount_requested); ?></th>
            <td><?= $loan->repayment_period; ?> Months</td>
            <td><?= $loan->loan_purpose;  ?></td>
            <td>
                <a href="<?= Url::to(['loan/download', 'id' => $loan->loan_application_id]); ?>" class="btn btn-primary">
                    <i class="fa fa-download"></i> Download and Print</a>
           
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>