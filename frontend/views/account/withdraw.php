<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
//Dropdowns
use common\models\SaccoManagerDropdowns;
use common\models\User;
use common\models\savings\MemberAccounts;
use common\models\member\BankAccount;
use yii\helpers\Url;
use yii\bootstrap\Modal;




$user_id = Yii::$app->user->id;
$user = User::findOne($user_id);



$dropdowns = new SaccoManagerDropdowns();

//incremement
//$dropdowns->updateReferenceNumberCount();


$this->title = "Request a withdrawal from  your savings";


$listof_account_types = SaccoManagerDropdowns::getListOfAccountTypes();
?>
<h1>Request to make a withdrawal from your savings</h1>
<div class="row">
    <p class="alert alert-info">
        You can request to withdraw from either your regular savings account  <b>Toto Savings Account</b>.
        <br/>From your Toto savings account, you can only withdraw once in a every three months.
        <br/>From your regular savings account, you can make a withdrawal request anytime, as often as you need. Note you will be charged 20,000/= for the  withdraw
    </p>
    <div class="sacco-withdraw">
        <?php $form = ActiveForm::begin(); ?>
        <table class="table table-striped">
            <tr>
                <th>Amount you are withdrawing</th>
                <td>
                    <?= $form->field($model, 'amount_requested')->textInput()->label(false); ?>
                </td>
            </tr>
            <tr>
                <th>SACCO Account</th>
                <td>
                    					
					<?=
                    Html::activeDropDownList($model, 'account_type', ArrayHelper::map($user->savingsProduct, 'id', 'product_name'), ['prompt' => 'Select Saving Product',
                        'class' => 'form-control'])
                    ?>
                </td>
            </tr>
            <tr>
                <th>Bank Account</th>
                <td>
                    <?=
                    Html::activeDropDownList($model, 'bank_acount', ArrayHelper::map($user->bankAccounts, 'bank_account_id', 'bank_account_no'), ['prompt' => 'Select a Bank Account',
                        'class' => 'form-control'])
                    ?>
					
					 <a href="<?= Url::to(['member/bankaccount', 'id' => $user->member_id]); ?>" data-toggle="modal" data-target="#add-bank" class="btn btn-info pull-right">
                    <i class='fa fa-pencil'></i> Add Bank Account</a>
                </td>
            </tr>
            <tr>
                <td>
                    <!-- HIDDEN FIELDS -->
                    <?= $form->field($model, 'requested_by')->hiddenInput(['value' => $user->username])->label(false) ?>
                    <?= $form->field($model, 'status_code')->hiddenInput(['value' => 1])->label(false) ?>
                    <?= $form->field($model, 'requested_date')->hiddenInput(['value' => date('Y-m-d H:m:s')])->label(false) ?>
                </td>
                <td>
                    <input type="submit" value="SAVE" class="btn btn-success btn-block"/>
                </td>
            </tr>
        </table>
        <?php ActiveForm::end(); ?>
		
		
		
		<!-- Add Guaranators -->
<?php
Modal::begin([
    'options' => [
        'id' => 'add-bank',
        'tabindex' => false // important for Select2 to work properly
    ],
    'header' => '<h4 style="margin:0; padding:0">Add Bank Account</h4>',
]);

$newbank= new BankAccount();

?>
<?= $this->render('/member/_bank_account_form', ['model' => $newbank]); ?>
<?php Modal::end(); ?>
<!-- /Add Guarantors -->




    </div>
</div>

