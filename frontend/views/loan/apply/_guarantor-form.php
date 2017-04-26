<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\widgets\Select2;
use yii\web\JsExpression;
use common\models\User;
use yii\helpers\ArrayHelper;




?>


<div class="row">
                    <div class="col-lg-12 alert alert-info" style="border-radius: 0px;">
                        <h2 style="font-weight: 700;color:#eee;border-bottom: 4px solid yellow;">STEP 3 :LOAN GAURANTORS</h2>
                        <div class="#">
                            In this step, You will specify the Gaurantors to your Loan application 
                            <br/>
                            
                        </div>
                    </div>
</div>

<?php 


if(sizeof($loan->guarantors)<2){
?>
<div class="row">

<?php $form = ActiveForm::begin(['action' => Url::to(['loan/guarantor', 'id' => $model->loan_id])]); ?>
<?= $form->field($model, 'loan_id')->hiddenInput()->label(false); ?>
<?php


echo $form->field($model, 'assigned_to')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(User::findAll(['status_code'=>1]), 'member_id', 'fullnames'),
    'options' => [
        'placeholder' => 'Select member ...',
      //  'multiple' => true,
        //'tags' => true,
    ],
   // 'pluginOptions' => [
    //    'maximumSelectionLength' => 2
    ]
);
?>
<?= $form->field($model, 'created_at')->hiddenInput()->label(false); ?>
<?= $form->field($model, 'created_by')->hiddenInput()->label(false); ?>
<?= $form->field($model, 'status_code')->hiddenInput(['value' => 1])->label(false); ?>
<?= $form->field($model, 'updated_at')->hiddenInput()->label(false); ?>
<?= $form->field($model, 'updated_by')->hiddenInput()->label(false); ?>
<?= $form->field($model, 'identity_scannedcopy')->hiddenInput()->label(false); ?>
<?= $form->field($model, 'createdby_remarks')->textarea(['rows' => 1]); ?>
<?= $form->field($model, 'assignedto_remarks')->hiddenInput()->label(false); ?>
<div class="modal-footer">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end(); ?>

</div><!-- _guarantor-form -->

<?php } ?>
 <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>ASSIGNED AT</th>
                        <th>APPLICANT REMARKS</th>
                        <th>STATUS</th>
                        <TH>GUARANTOR REMARKS</TH>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $status=[1=>'Pending',2=>'Approved',3=>'rejected'];
                    $statuscolor=[1=>'danger',2=>'success',3=>'inverse'];
                    foreach ($loan->guarantors AS $guarantor) { ?>
                        <tr>
                            <td>
                                <?= $guarantor->assignedto->fullnames; ?>
                            </td>
                            <td><?= \Yii::$app->formatter->asDatetime($guarantor->created_at, "php:d-M-Y"); ?></td>
                            <td><?= $guarantor->createdby_remarks; ?></td>
                            <td>
                                <label class="label label-<?= $statuscolor[$guarantor->status_code] ?>">
                                <?= $status[$guarantor->status_code] ?>
                                </label>
                            </td>
                             <td>
                               <?= $guarantor->assignedto_remarks; ?> 
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
   
