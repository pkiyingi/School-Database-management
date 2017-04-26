<?php
/*
 * Login form at the front page
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php
$form = ActiveForm::begin(['id'=>'ishomero_new_member']);
?>
<h3>Create an account. Its free</h3>
<div class="btn btn-group btn-group-justified">
    <div class="btn btn-primary"><span class="icon icon-facebook"></span> Facebook</div>
    <div class="btn btn-info"><span class="icon icon-twitter"></span> Twitter</div>
    <div class="btn btn-danger"><span class="icon icon-google-plus"></span> Google+</div>
</div>
<hr/>
<div class="row">
    <?= $form->field($model, 'firstname')->textInput(['maxlength' => 255, 'placeholder' => 'Firstname','class'=>'leftside'])->label(false) ?>
    <?= $form->field($model, 'lastname')->textInput(['maxlength' => 255, 'placeholder' => 'Last name','class'=>'rightside'])->label(false) ?>
</div>
<div class="row">
    <?= $form->field($model, 'email')->textInput(['maxlength' => 255, 'placeholder' => 'Email','class'=>'leftside'])->label(false) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => 255, 'placeholder' => 'Confirm Email','class'=>'rightside'])->label(false) ?>
</div>
<div class="row">
    <?= $form->field($model, 'dob_year')->textInput(['maxlength' => 255, 'placeholder' => 'Date of Birth','class'=>'leftside'])->label(false) ?>
    <?= $form->field($model, 'sex')->passwordInput(['maxlength' => 255, 'placeholder' => 'Gender','class'=>'rightside'])->label(false) ?>
</div>
<div class="row">
    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 255, 'placeholder' => 'Password','class'=>'leftside'])->label(false) ?>
    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 255, 'placeholder' => 'Confirm Password'])->label(false) ?>
</div>

<div class="row">
    <?= Html::submitButton('Create account', ['class' => 'btn btn-success btn-large btn-block']) ?>
</div>
<?php ActiveForm::end(); ?>
