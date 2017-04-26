<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LoanApprovalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loan-approval-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'loan_approval_id') ?>

    <?= $form->field($model, 'loan_application_id') ?>

    <?= $form->field($model, 'approved_by') ?>

    <?= $form->field($model, 'approval_date') ?>

    <?= $form->field($model, 'status_code') ?>

    <?php // echo $form->field($model, 'remarks') ?>

    <?php // echo $form->field($model, 'forwarded_to') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
