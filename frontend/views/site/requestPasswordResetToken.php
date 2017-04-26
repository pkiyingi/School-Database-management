<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Request password reset';
?>
<div class="text-center">
    <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form', 'options' => ['class' => 'form-signin']]); ?>
    <div class="logo">
        <img src="<?= MYSACCO_BASEURL; ?>/images/logo.png" class="text-center"/>
    </div>
    <p class="form-signin-heading">Self Service Portal</p>

    <p class="alert alert-info">Please fill out your email. We will send you a link to reset your password in your email.</p>           
    <?= $form->field($model, 'username')->textInput(['placeholder'=>'Your Username'])->label('Username') ?>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary btn-block']) ?>
    </div>
    <ul class="list-group">
    <li class="list-group-item">
        <a href="index.php" class="text-center">
            Go back to the login page
        </a>
    </li>
</ul>
    <?php ActiveForm::end(); ?>
</div>
