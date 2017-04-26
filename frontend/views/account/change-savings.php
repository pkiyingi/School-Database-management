<?php
use common\models\User;
use yii\base\Model;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SaccoMember */
/* @var $form yii\widgets\ActiveForm */

$member = Yii::$app->user->identity;
/* @var $this yii\web\View */
$this->title="Change monthly savings";
//PAYE: 30%,RBS: 6%, NSSF: 6%
?>
<h1><?= $this->title; ?></h1>
<div class="row">
<div class="col-lg-6">
<div class="sacco-member-form">
    <?php $form = ActiveForm::begin(); ?>
    <table class="table table-striped">
        <tr>
            <td>
                <?= $form->field($model, 'member_monthly_contribution')->textInput(['maxlength' => 10]) ?>         
            </td>
        </tr>
        <tr>
            <td>
                <?= $form->field($model, 'toto_monthly_contribution')->textInput(['maxlength' => 10]) ?>  
            </td>
        </tr>
    </table>
    <div>
        <!--Hidden Fields -->
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update your Monthly Savings', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
         <?= $form->field($model, 'member_id')->hiddenInput()->label(false) ?>
    <?php ActiveForm::end(); ?>

</div>

</div>
    <div class="col-lg-6 alert alert-info">
        <ul>
        <li>You don't have any loan deductions at the moment.</li>
        <li>The minimum amount you can save per month is UGX 50,000.</li>
        <li>According to the information we have, you earn 4,399,518. Therefore the maximum amount we can deduct per month is XXX (Your salary less PAYE,NSSF and RBS deductions)</li>
        </ul>
    </div>
</div>
