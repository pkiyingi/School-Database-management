<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$member = Yii::$app->user->identity;
?>

<div class="land-for-sale-plots-sold-form">

    <?php $form = ActiveForm::begin(); ?>
    <table class='table table-striped'>
        <tr>
            <td>
                <?= $form->field($model, 'land_id')->textInput() ?>             
            </td>
            <td>
                <?= $form->field($model, 'num_of_plots')->textInput() ?>             
            </td>
            <td>
                <?= $form->field($model, 'plot_numbers')->textInput(['maxlength' => true]) ?>            
            </td>
        </tr>
        <tr>
            <td>
                <?= $form->field($model, 'last_payment_date')->textInput() ?>            
            </td>
            <td>
                <?= $form->field($model, 'bought_by')->textInput() ?>        
            </td>
            <td>
                <?= $form->field($model, 'date_bought')->textInput() ?>            
            </td>
        </tr>
        <tr>
            <td>
                <?= $form->field($model, 'total_amount')->textInput(['maxlength' => true]) ?>
            </td>
            <td>

            </td>
            <td>
                <?= $form->field($model, 'created_by')->hiddenInput(['value' => $member->id])->label(false) ?>
            </td>
        </tr>
    </table>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
