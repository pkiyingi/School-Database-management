<?php

use common\models\SaccoManagerDropdowns;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LoanApproval */
/* @var $form yii\widgets\ActiveForm */
$loanstatus = SaccoManagerDropdowns::getStatusCodes(2);
?>

<div class="loan-approval-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'loan_application_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'approved_by')->textInput() ?>

    <?= $form->field($model, 'approval_date')->textInput() ?>

    <?php // $form->field($model, 'status_code')->textInput() ?>
    <?=
    Html::activeDropDownList($model, 'status_code', ArrayHelper::map($loanstatus, 'status_id', 'status_name'), ['prompt' => 'Select Status',
        'class' => 'form-control'])
    ?>
    <?= $form->field($model, 'remarks')->textArea(['maxlength' => true, 'rows' => 4, 'class' => 'form-control']) ?>

<?= $form->field($model, 'forwarded_to')->textInput() ?>

    <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
