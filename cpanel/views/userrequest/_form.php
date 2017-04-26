<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Processrequest\Processrequest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="processrequest-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'reference_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'application_type')->textInput() ?>

    <?= $form->field($model, 'amount_applied')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount_approved')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member_no')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
