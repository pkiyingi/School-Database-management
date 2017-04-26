<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LoanApplication */

$this->title = 'Update Loan Application: ' . ' ' . $model->loan_application_id;
$this->params['breadcrumbs'][] = ['label' => 'Loan Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->loan_application_id, 'url' => ['view', 'id' => $model->loan_application_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="loan-application-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
