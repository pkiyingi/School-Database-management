<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';
//$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(['id' => 'login-form', 'options'=>['class' => 'form-signin']]); ?>
<div class="logo">
    <img src="<?= MYSACCO_BASEURL; ?>/images/logo.png" class="text-center"/>
</div>
<p class="form-signin-heading">Self Service Portal</p>

<?= $form->field($model, 'username')->textInput(['placeholder'=>'ID Number without a hythen e.g.05137XX '])->label("URA ID Number "); ?>
<?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Your Password']) ?>
<?php // $form->field($model, 'rememberMe')->checkbox()  ?>
<div style="color:#999;margin:1em 0">
    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
</div>
<div class="form-group">
    <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'login-button']) ?>
</div>

<?php ActiveForm::end(); ?>