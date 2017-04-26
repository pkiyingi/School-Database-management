<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\widgets\Select2;
use yii\web\JsExpression;
use common\models\User;
use yii\helpers\ArrayHelper;
?>



    <div id="wizard" class="form_wizard wizard_horizontal">
  
<?php $form = ActiveForm::begin(['action' => Url::to(['loan/add-guarantor', 'id' => $model->loan_id])]); ?>
<?= $form->field($model, 'loan_id')->hiddenInput()->label(false); ?>
<?php
echo $form->field($model, 'assigned_to')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(User::findAll(['status_code'=>1]), 'member_id', 'fullnames'),
    'options' => [
        'placeholder' => 'Select member ...',
        //'multiple' => true,
        //'tags' => true,
    ],
//    'pluginOptions' => [
//        'maximumSelectionLength' => 2
//    ]
]);
?>
<?= $form->field($model, 'created_at')->hiddenInput()->label(false); ?>
<?= $form->field($model, 'created_by')->hiddenInput()->label(false); ?>
<?= $form->field($model, 'status_code')->hiddenInput()->label(false); ?>
<?= $form->field($model, 'updated_at')->hiddenInput()->label(false); ?>
<?= $form->field($model, 'updated_by')->hiddenInput()->label(false); ?>
<?= $form->field($model, 'identity_scannedcopy')->hiddenInput()->label(false); ?>
<?= $form->field($model, 'createdby_remarks')->textarea(['rows' => 1]); ?>
<?= $form->field($model, 'assignedto_remarks')->hiddenInput()->label(false); ?>
<div class="modal-footer">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end(); ?>

</div><!-- _guarantor-form -->
  