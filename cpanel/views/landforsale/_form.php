<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$member = Yii::$app->user->identity;
?>

<div class="land-for-sale-form">

    <?php $form = ActiveForm::begin(); ?>
    <table class='table table-striped'>
        <tr>
            <td>
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>             
            </td>
            <td>
                <?= $form->field($model, 'district')->textInput(['maxlength' => true]) ?>          
            </td>
            <td>
                <?= $form->field($model, 'number_of_pots')->textInput() ?>       
            </td>
        </tr>
        <tr>
            <td>
                <?= $form->field($model, 'amount_bought')->textInput(['maxlength' => true]) ?>              
            </td>
            <td colspan="2">
                <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?> 
            </td>
        </tr>
        <tr>
            <td>
                <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success btn-block' : 'btn btn-primary']) ?>            
            </td>
            <td colspan="2">

                <?= $form->field($model, 'created_by')->hiddenInput(['value'=>$member->id])->label(false) ?>

                <?= $form->field($model, 'created_date')->hiddenInput(['value' => date('Y-m-d')])->label(false) ?>            
            </td>
        </tr>
    </table>
    <?php ActiveForm::end(); ?>
</div>
