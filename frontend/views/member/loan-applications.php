<?php
use yii\helpers\Html;
/*
 * Loan Applications filled before
 */
$this->title = "Previous Loan Applications";
?>
<h2><?= $this->title; ?>
<?= Html::a('Apply for a Loan', ['loan/apply'], ['class' => 'btn btn-success pull-right']) ?>
</h2>
<?php if (empty($applications)) { ?>
    <p class="text-center" style='color:#ccc;font-size: 25px;font-style: italic;'>We don't have any record of your previous loan applications</p>
<?php } else { ?>
    <table class='table table-striped'>
        <thead>
        <th>REFERENCE NO</th>
        <th>DATE SUBMITTED</th>
        <th>AMOUNT REQUESTED</th>
        <th>REPAYMENT PERIOD</th>
        <th>STATUS</th>
    </thead>
    <tbody>
        <?php foreach ($applications AS $loan) { ?>
            <tr>
                <th>
                    <a href="index.php?r=loan/details&id=<?= $loan['loan_application_id']; ?>"><?= $loan['reference_no']; ?></a>
                </th>
                <td><?= $loan['submitted_date'] ?></td>
                <td>UGX <?= number_format($loan['amount_requested']); ?></td>
                <td><?= $loan['repayment_period']; ?> Months</td>
                <td><span class='label label-warning'><?= $loan['status_code']; ?></span></td>
                <td>
                    <a href="index.php?r=loan/details&id=<?= $loan['loan_application_id']; ?>" class="btn btn-primary">
                        <span class="fa fa-external-link"></span>
                        Details</a>
                </td>
            </tr>
        <?php }
        ?>
    </tbody>
    </table>  
<?php } ?>