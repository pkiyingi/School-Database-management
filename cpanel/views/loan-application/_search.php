<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LoanApplicationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loan-application-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'loan_application_id') ?>

    <?= $form->field($model, 'sacco_account_no') ?>

    <?= $form->field($model, 'loan_type_id') ?>

    <?= $form->field($model, 'created_date') ?>

    <?= $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'amount_requested') ?>

    <?php // echo $form->field($model, 'loan_purpose') ?>

    <?php // echo $form->field($model, 'consolidated_pay') ?>

    <?php // echo $form->field($model, 'other_income') ?>

    <?php // echo $form->field($model, 'monthly_expenditure') ?>

    <?php // echo $form->field($model, 'new_sacco_savings') ?>

    <?php // echo $form->field($model, 'other_loan_repayments') ?>

    <?php // echo $form->field($model, 'bank_account_id') ?>

    <?php // echo $form->field($model, 'update_date') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'submitted_date') ?>

    <?php // echo $form->field($model, 'status_code') ?>

    <?php // echo $form->field($model, 'amount_approved') ?>

    <?php // echo $form->field($model, 'repayment_period') ?>

    <?php // echo $form->field($model, 'monthly_repayment') ?>

    <?php // echo $form->field($model, 'disbursment_date') ?>

    <?php // echo $form->field($model, 'outstanding_loan_balance') ?>

    <?php // echo $form->field($model, 'bank_loan_payment') ?>

    <?php // echo $form->field($model, 'net_payment') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
