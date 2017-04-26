<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Choose a new password';
?>


<?php $form = ActiveForm::begin(['id' => 'reset-password-form', 'options' => ['class' => 'form-signin']]); ?>
<div class="logo">
    <img src="<?= MYSACCO_BASEURL; ?>/images/logo.png" class="text-center"/>
</div>
<p class="form-signin-heading">Self Service Portal</p>

    <?= $form->field($model, 'password')->passwordInput()->label("New Password") ?>
<div class="form-group">
<?= Html::submitButton('Save New Password', ['class' => 'btn btn-block btn-lg btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>