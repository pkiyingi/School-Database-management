<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LandForSalePlotsSoldSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Plot sold';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="land-for-sale-plots-sold-index">

    <h2><?= Html::encode($this->title) ?>
     <?= Html::a('Record Plot Sold', ['create'], ['class' => 'btn btn-primary pull-right']) ?>
    </h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'plotsold_id',
            //'land_id',
            'num_of_plots',
            'created_by',
            'plot_numbers',
            'last_payment_date',
            'bought_by',
            'date_bought',
            'total_amount',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

</div>
