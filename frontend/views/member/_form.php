<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SaccoMember */
/* @var $form yii\widgets\ActiveForm */

$member = Yii::$app->user->identity;
?>

<div class="sacco-member-form">

    <?php $form = ActiveForm::begin(); ?>
    <table class="table table-striped">
        <tr>
            <td>
                <?=
                $form->field($model, 'firstname')->textInput(
                        ['maxlength' => 255,
                            'disabled' => true])
                ?>
            </td>
            <td>
                <?= $form->field($model, 'lastname')->textInput(['maxlength' => 255, 'disabled' => true]) ?>
            </td>
            <td>
                <?= $form->field($model, 'username')->textInput(['maxlength' => 255, 'disabled' => true]) ?>
            </td>
            <td>
                <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>
            </td>
        </tr>
        <tr>
            <td>
                <?= $form->field($model, 'joining_date')->textInput(['disabled'=>true]) ?>
            </td>
            <td>
                <?= $form->field($model, 'gender')->dropDownList([ 'Male' => 'Male', 'Female' => 'Female',], ['prompt' => 'Select your Gender']) ?> 
            </td>
            <td>
                <?= $form->field($model, 'date_of_birth')->textInput() ?>
            </td>
            <td>
                <?= $form->field($model, 'member_category')->dropDownList([ 'URA_STAFF' => 'URA STAFF', 'FORMER_URA_STAFF' => 'FORMER URA STAFF', 'SPOUSE_TO_MEMBER' => 'SPOUSE TO MEMBER', 'SACCO_STAFF' => 'SACCO STAFF',], ['prompt' => '']) ?>
            </td>
        </tr>
        <tr>
            <td>
                <?= $form->field($model, 'member_monthly_contribution')->textInput(['maxlength' => 10, 'disabled' => true]) ?>         
            </td>
            <td>
                <?= $form->field($model, 'toto_monthly_contribution')->textInput(['maxlength' => 10, 'disabled' => true]) ?>  
            </td>
            <td>
                
            </td>
            <td>
                <?= $form->field($model, 'telephone1')->textInput(['maxlength' => 20]) ?>   
            </td>
        </tr>
        <tr>
            <td>
                <?= $form->field($model, 'telephone2')->textInput(['maxlength' => 20]) ?>
            </td>
            <td>
                <?= $form->field($model, 'physical_address')->textInput(['maxlength' => 2000]) ?>
            </td>
            <td>
                <?= $form->field($model, 'employment_type')->dropDownList([ 'CONTRACT' => 'CONTRACT', 'PARMANENT' => 'PARMANENT',], ['prompt' => '']) ?>
            </td>
            <td>
                <?= $form->field($model, 'employment_position')->dropDownList([ 'COMMISSIONER GENERAL' => 'COMMISSIONER GENERAL', 'COMMISSIONER' => 'COMMISSIONER', 'ASSISTANT COMMISSIONER' => 'ASSISTANT COMMISSIONER', 'MANAGER' => 'MANAGER', 'SUPERVISOR' => 'SUPERVISOR', 'OFFICER' => 'OFFICER', 'SUPPORT STAFF' => 'SUPPORT STAFF', 'NOT A CURRENT STAFF OF URA' => 'NOT A CURRENT STAFF OF URA',], ['prompt' => '']) ?>
            </td>
        </tr>
    </table>
    <div>
        <!--Hidden Fields -->
         <?= $form->field($model, 'member_id')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'created_date')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'created_by')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'updated_date')->hiddenInput(['value' => date('Y-m-d')])->label(false) ?>
        <?= $form->field($model, 'password')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'password_hash')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'password_reset_token')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'auth_key')->hiddenInput()->label(false) ?>      
        <?= $form->field($model, 'updated_by')->hiddenInput(['value' => $member->username])->label(false) ?>
        <?= $form->field($model, 'status_code')->hiddenInput()->label(false) ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
