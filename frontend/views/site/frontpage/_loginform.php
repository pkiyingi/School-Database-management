<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \common\models\LoginForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

//The user model
$model = new LoginForm();
?>
<div class="pull-left login-form">
<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
<div class="form-vertical">
    <?= $form->field($model, 'username') ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <?= Html::submitButton('Login', ['class' => 'btn btn-success btn-large', 'name' => 'login-button']) ?>
</div>
<div class="form-inline lower-part">
    <?= $form->field($model, 'rememberMe')->checkbox() ?>
    <div class="pull-right">
        <?= Html::a('Forgot your password ?', ['site/request-password-reset']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
</div>