<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\SaccoManagerDropdowns;

$request = Yii::$app->request;

$docs = SaccoManagerDropdowns::getListDocumentsUploaded();

$loan_id = $request->get('ln', 0);
$base_url = Yii::$app->request->baseUrl;
$user = Yii::$app->user->identity;
?>

<div class="loan-documentuploaded-form">
    <?php $form = ActiveForm::begin(['action' => $base_url . '/index.php?r=documents/create', 'options' => ['enctype' => 'multipart/form-data']]); ?>

    <table class="table">
        <tr>
            <td>
                <?= $form->field($model, 'document_uploaded')->fileInput() ?>
            </td>
            <td>
                <?=
                Html::activeDropDownList($model, 'document_id', ArrayHelper::map($docs, 'document_id', 'document_type'), ['prompt' => 'Select a Document Type',
                    'class' => 'form-control'])
                ?> 
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <?= $form->field($model, 'remarks')->textArea(['maxlength' => true]) ?>               
            </td>
        </tr>
        <tr>
            <td>
                <?= Html::submitButton($model->isNewRecord ? 'Upload Document' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>     
            </td>
            <td>
                <?= $form->field($model, 'loan_id')->hiddenInput(['value' => $loan_id])->label(false); ?>
                <?= $form->field($model, 'uploaded_by')->hiddenInput(['value' => $user['id']])->label(false) ?>
                <?= $form->field($model, 'uploaded_date')->hiddenInput(['value' => date('Y-m-d H:m:s')])->label(false) ?>            
            </td>
        </tr>
    </table>
    <?php ActiveForm::end(); ?>

</div>
