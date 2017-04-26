<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\member\BankAccount */
/* @var $form ActiveForm */


$user_id = Yii::$app->user->id;
$user = User::findOne($user_id);
?>
<h1>Member Bank Account</h1>
<div class="row">
    <p class="alert alert-info">
        This allows you add bank accounts to your profile that you can use from time to time while making transactions with the SACCO  
		</p>
<div class="bank_account_form">

   <?php $form = ActiveForm::begin(['action' => 'index.php?r=member/bankaccount']); ?>

        <?= $form->field($model, 'account_name') ?>
        <?= $form->field($model, 'bank_account_no') ?>
        <?= $form->field($model, 'bank_branch') ?>
        <?= $form->field($model, 'bank_name') ?>
        <?= $form->field($model, 'sacco_account_no')->hiddenInput(['value' => $user->username])->label(false) ?>
		 <?= $form->field($model, 'created_by')->hiddenInput(['value' => $user->member_id])->label(false) ?>
		 <?= $form->field($model, 'created_at')->hiddenInput(['value' => date('Y-m-d H:m:s')])->label(false) ?>
       
	 <?= $form->field($model, 'updated_by')->hiddenInput(['value' => $user->member_id])->label(false) ?>
	 <?= $form->field($model, 'updated_at')->hiddenInput(['value' => date('Y-m-d H:m:s')])->label(false) ?>
      
     
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- _bank_account_form -->
</div>