<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LandForSalePaymentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Land Payments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="land-for-sale-payment-index">

    <h2><?= Html::encode($this->title) ?>
     <?= Html::a('Record Payment', ['create'], ['class' => 'btn btn-primary pull-right']) ?>
    </h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

           <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'landpayment_id',
            'payment_date',
            'amount_paid',
            'paid_by',
            'plotsold_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
