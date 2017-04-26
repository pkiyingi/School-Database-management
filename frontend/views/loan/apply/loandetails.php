<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LoanApplication */

$this->title = 'Apply for a loan';
?>
<h2 style="border-bottom:4px solid #ccc;"><?= Html::encode($this->title) ?>
    <a href="index.php?r=member/loan-applications" class="btn btn-dark pull-right">
        <i class="fa fa-external-link"></i>
        Previous Applications</a>
</h2>

<!-- Smart Wizard -->
<div id="wizard" class="form_wizard wizard_horizontal">
    <?=
    $this->render('_form_loandetails', [
        'model' => $model,
    ])
    ?>
</div>
<!-- End SmartWizard Content -->

