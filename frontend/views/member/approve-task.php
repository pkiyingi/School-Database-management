<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/*
 * Approve task
 */
$this->title = "Approve Task";
?>
<div class="row">
    <div class="col-lg-8">
        <table class="table table-striped">
            <tr>
                <th>
                    LOAN REF. NO
                </th>
                <td>
<?= $model->loan->reference_no; ?>
                </td>
            </tr>
            <tr>
                <th>
                    LOAN AMOUNT REQUESTED
                </th>
                <td>
<?= number_format($model->loan->amount_requested); ?>
                </td>
            </tr>
            <tr>
                <th>SENT BY</th>
                <td>
<?= $model->createdBy->fullnames; ?>
                </td>
            </tr>
            <tr>
                <th>MESSAGE</th>
                <td>
<?= $model->createdby_remarks; ?>
                </td>
            </tr>
        </table>
    </div>
    <div class="col-lg-4">
        <p class="alert alert-info">Please not that any guarantor under this agreement will be responsible to look for the borrower or be liable for sums due under it which the Borrower fails to pay.
        </p>

<?php $form = ActiveForm::begin(); ?>
        <table class="table table-striped">
            <tr>
                <td>
                    <?=
                    $form->field($model, 'identity_scannedcopy')->fileInput()->label('Upload a scanned copy of your ID');
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?=
                    $form->field($model, 'assignedto_remarks')->textarea(
                            ['rows'=>2])
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                   <?= 
        $form->field($model,'status_code')->radioList(
                [2=>'Approved',3=>'Rejected'])->label('Approval');
        ?> 
                </td>
            </tr>
            <tr>
                <td>
<?= Html::submitButton('Approve Task', ['class' => 'btn btn-primary']) ?>
                </td>
            </tr>
        </table>
<?php ActiveForm::end(); ?>

    </div>
</div>