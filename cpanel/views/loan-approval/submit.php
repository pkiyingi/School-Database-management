<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LoanApproval */

$this->title = 'Approve Loan Application';
?>
<div class="loan-approval-create">
    <div class="row">
        <div class="col-lg-7 well" style="background:#fff;">
            <h3>Loan Details</h3>
              <?= $this->render('blocks/loandetails', [
        'loan' => $loan,
    ]) ?>
        </div>
<div class="col-lg-5">
    <h3>Approve/Reject</h3>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
</div>
