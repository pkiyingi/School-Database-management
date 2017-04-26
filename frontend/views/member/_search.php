<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SaccoMemberSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sacco-member-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'member_id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'firstname') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'lastname') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'role') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_date') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'status_code') ?>

    <?php // echo $form->field($model, 'joining_date') ?>

    <?php // echo $form->field($model, 'date_of_birth') ?>

    <?php // echo $form->field($model, 'member_category') ?>

    <?php // echo $form->field($model, 'member_monthly_contribution') ?>

    <?php // echo $form->field($model, 'toto_monthly_contribution') ?>

    <?php // echo $form->field($model, 'accont_type') ?>

    <?php // echo $form->field($model, 'telephone1') ?>

    <?php // echo $form->field($model, 'telephone2') ?>

    <?php // echo $form->field($model, 'physical_address') ?>

    <?php // echo $form->field($model, 'employment_type') ?>

    <?php // echo $form->field($model, 'employment_position') ?>

    <?php // echo $form->field($model, 'password') ?>

    <?php // echo $form->field($model, 'password_hash') ?>

    <?php // echo $form->field($model, 'password_reset_token') ?>

    <?php // echo $form->field($model, 'auth_key') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
