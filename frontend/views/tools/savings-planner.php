<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
$post = Yii::$app->request->post();
$Ans1 = 0;
$Ans2 = 0;
if (!empty($post)) {
    $A1 = $post['amount'];
    $A2 = $post['installments'];
    $A3 = $post['months'];

    if (empty($A1) && $A2 > 0 && $A3 > 0) {
        $Ans1 = $A3 * $A2;
    } elseif (empty($A2) && $A1 > 0 && $A3 > 0) {
        $Ans2 = $A1 / $A3;
        $A2 = $Ans2;
    }
}

$this->title = "Savings Planner";
?>
<h1>Savings Planner</h1>
<p class="alert alert-info">This tool helps you plan your savings. Do you want to save a particular amount over a period of time? This tool is for you </p>
<div class="row">
    <div class="col-lg-6">
        <?php $form = ActiveForm::begin(); ?>
        <table class="table table-striped">
            <tr>
                <th>Total Amount (UGX)</th>
                <td>
                    <input type="text" name="amount" value="<?= $Ans1; ?>" class="form-control"/> 
                </td>
            </tr>
            <tr>
                <th>Installments (UGX)</th>
                <td>
                    <input type="text" name="installments" value="<?= $Ans2; ?>" class="form-control"/> 
                </td>
            </tr>
            <tr>
                <th>Period (months)</th>
                <td>
                    <select name="months" class="form-control">
                        <option value="">Select Months</option>
                        <?php for ($inst = 1; $inst < 48; $inst++) { ?>
                            <option value="<?= $inst; ?>"><?= $inst; ?></option>
                        <?php } ?>
                    </select> 
                </td>
            </tr>
            <tr><td></td>
                <td>
                    <input type="submit" class="btn btn-success btn-block btn-lg" value="Calculate"/>
                </td>
            </tr>
        </table>
        <?php ActiveForm::end(); ?>
    </div>
    <div class="col-lg-6 well text-center">
       
    </div>
</div>
<?php if (!empty($post)) { ?>
    <div class="row">
        <table class="table table-striped">
            <thead>
            <th>PERIOD (months)</th>
            <th>AMOUNT DEDUCTED</th>
            <th class="info">TOTAL AMOUNT SAVED</th>
            <th>TOTAL AMOUNT SAVED
                <br/>
                <I style="font-size: 75%">including interest earned</I>
            </th>
            <th>INTEREST EARNED</th>
            <th class="success">TOTAL AMOUNT IN ACCOUNT</th>
            </thead>
            <tbody>
                <?php
                $prev_interest[0]=0;
                for ($i = 1; $i <= $A3; $i++) {
                    $total_saved = $i * $A2;
                    $interest_earned = ($total_saved*0.1/12);
                    $total_savings = $total_saved+$interest_earned;
                    //Previous interest
                    $prev_interest[$i]=$interest_earned;
                    ?> 
                    <tr>
                        <th><?= $i; ?></th>
                        <td>UGX <?= number_format($A2); ?></td>
                        <td class="info">UGX <?= number_format($total_saved); ?></td>
                        <td>UGX <?= number_format($total_saved+$prev_interest[$i-1]); ?>
                            <?php if($i>1){ ?><br/>
                            <i style="color:green;font-size: 80%;">(includes interest earned: UGX <?= number_format($prev_interest[$i-1]); ?>)</i>
                            <?php } ?>
                        </td>
                        <th>UGX <?= number_format($interest_earned); ?></th>
                        <th class="success">UGX <?= number_format($total_savings); ?></th>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php } ?>