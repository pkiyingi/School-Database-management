<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LandForSalePayment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="land-for-sale-payment-form">

    <?php $form = ActiveForm::begin(); ?>
    <table class='table table-striped'>
        <tr>
            <td>
                <?= $form->field($model, 'paid_by')->textInput() ?>      
            </td>
            <td>
                <?= $form->field($model, 'plotsold_id')->textInput() ?>
            </td>
            <td>
                <?= $form->field($model, 'payment_date')->textInput() ?>
            </td>
        </tr>
        <tr>
            <td>
                <?= $form->field($model, 'amount_paid')->textInput(['maxlength' => true]) ?>
            </td>
            <td colspan="2">

            </td>
        </tr>
        <tr>
            <td>
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </td>
            <td colspan="2">

            </td>
        </tr>
    </table>
    <?php ActiveForm::end(); ?>

</div>
