<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Administrator Login';

?>
<div class="site-login" style="background: #eee; border:2px double #003;width:350px;margin: 0 auto;">
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
    <div class="paper paper-blue" style="margin: 0 auto;width:300px;">
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?php // $form->field($model, 'rememberMe')->checkbox() ?>
        <div style="color:#999;margin:1em 0">
            If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
        </div>
        <div class="form-group">
            <?= Html::submitButton('Login', ['class' => 'btn btn-info btn-lg btn-block', 'name' => 'login-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
