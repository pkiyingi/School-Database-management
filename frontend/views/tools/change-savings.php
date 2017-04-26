<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$member = Yii::$app->user->identity;
/* @var $this yii\web\View */
$this->title = "Change Savings";
?>
<h2>Change savings</h2>
<p class="alert alert-info">Please specify how much you want to save from now on</p>
<div class="row">
<div class="col-lg-6">
    <?php $form = ActiveForm::begin(); ?>
    <table class="table table-striped">
        <tr>
            <th>Current amount</th>
            <td>
                <input type="text" name="previous" value="" class="form-control"/> 
            </td>
        </tr>
        <tr>
            <th>New Amount</th>
            <td>
                <input type="text" name="next_savings" value="" class="form-control"/> 
            </td>
        </tr>

        <tr><td>
                <input type="hidden" name="username" value="<?= $member->username; ?>"/>
            </td>
            <td>
                <input type="submit" class="btn btn-primary btn-block btn-lg" value="Change Savings"/>
            </td>
        </tr>
    </table>
    <?php ActiveForm::end(); ?>
</div>
</div>
