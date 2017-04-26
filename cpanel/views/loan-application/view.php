<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\LoanApplication */

$this->title = $model->loan_application_id;
$this->params['breadcrumbs'][] = ['label' => 'Loan Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loan-application-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->loan_application_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->loan_application_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'loan_application_id',
            'sacco_account_no',
            'loan_type_id',
            'created_date',
            'created_by',
            'amount_requested',
            'loan_purpose',
            'consolidated_pay',
            'other_income',
            'monthly_expenditure',
            'new_sacco_savings',
            'other_loan_repayments',
            'bank_account_id',
            'update_date',
            'updated_by',
            'submitted_date',
            'status_code',
            'amount_approved',
            'repayment_period',
            'monthly_repayment',
            'disbursment_date',
            'outstanding_loan_balance',
            'bank_loan_payment',
            'net_payment',
        ],
    ]) ?>

</div>
