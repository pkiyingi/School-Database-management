<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LandForSalePaymentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="land-for-sale-payment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'landpayment_id') ?>

    <?= $form->field($model, 'payment_date') ?>

    <?= $form->field($model, 'amount_paid') ?>

    <?= $form->field($model, 'paid_by') ?>

    <?= $form->field($model, 'plotsold_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
