<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LoanDocumentuploadedSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loan-documentuploaded-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'loandocument_id') ?>

    <?= $form->field($model, 'loan_id') ?>

    <?= $form->field($model, 'document_id') ?>

    <?= $form->field($model, 'uploaded_by') ?>

    <?= $form->field($model, 'remarks') ?>

    <?php // echo $form->field($model, 'uploaded_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
