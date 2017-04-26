<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title">Upload Soft copy or Scanned copy</h4>
</div>
<div class="modal-body">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?php
    echo $form->field($model, 'attachment')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
    ]);
    ?>
    <?= $form->field($model, 'file_name')->dropdownList(
        [
            'BANK CONFIRMATION FORM'=>'BANK CONFIRMATION FORM',
            'RECENT URA PAY SLIP'=>'RECENT URA PAY SLIP',
            'BANK STRATEMENT'=>'BANK STATEMENT',
        ]
    ); ?>
    <?= $form->field($model, 'file_description')->textarea(['rows' => 1]); ?>
    <?= $form->field($model, 'file_size')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'file_ext')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'uploaded_at')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'uploaded_by')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'file_path')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'module_code')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'ref_id')->hiddenInput()->label(false); ?>
    <div class="modal-footer">
        <?= Html::submitButton('Upload Document', ['class' => 'btn btn-default btn-o pull-left']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- _upload-file -->
