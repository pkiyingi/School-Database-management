<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LandForSalePlotsSoldSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="land-for-sale-plots-sold-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'plotsold_id') ?>

    <?= $form->field($model, 'land_id') ?>

    <?= $form->field($model, 'num_of_plots') ?>

    <?= $form->field($model, 'created_by') ?>

    <?= $form->field($model, 'plot_numbers') ?>

    <?php // echo $form->field($model, 'last_payment_date') ?>

    <?php // echo $form->field($model, 'bought_by') ?>

    <?php // echo $form->field($model, 'date_bought') ?>

    <?php // echo $form->field($model, 'total_amount') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
