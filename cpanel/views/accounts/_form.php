<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SystemAccounts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="system-accounts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'account_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'branch_no')->textInput() ?>

    <?= $form->field($model, 'branch_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'r_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'account_type_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
