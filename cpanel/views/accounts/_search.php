<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SystemAccounSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="system-accounts-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'account_no') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'branch_no') ?>

    <?= $form->field($model, 'branch_id') ?>

    <?php // echo $form->field($model, 'r_id') ?>

    <?php // echo $form->field($model, 'account_type_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
