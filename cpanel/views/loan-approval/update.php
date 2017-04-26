<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LoanApproval */

$this->title = 'Update Loan Approval: ' . ' ' . $model->loan_approval_id;
$this->params['breadcrumbs'][] = ['label' => 'Loan Approvals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->loan_approval_id, 'url' => ['view', 'id' => $model->loan_approval_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="loan-approval-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
