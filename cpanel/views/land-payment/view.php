<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\LandForSalePayment */

$this->title = $model->landpayment_id;
$this->params['breadcrumbs'][] = ['label' => 'Land For Sale Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="land-for-sale-payment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->landpayment_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->landpayment_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'landpayment_id',
            'payment_date',
            'amount_paid',
            'paid_by',
            'plotsold_id',
        ],
    ]) ?>

</div>
