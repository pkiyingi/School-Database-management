<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LandForSalePayment */

$this->title = 'Update Land For Sale Payment: ' . ' ' . $model->landpayment_id;
$this->params['breadcrumbs'][] = ['label' => 'Land For Sale Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->landpayment_id, 'url' => ['view', 'id' => $model->landpayment_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="land-for-sale-payment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
