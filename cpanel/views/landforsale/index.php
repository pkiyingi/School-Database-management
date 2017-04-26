<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LandForSaleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Land For Sales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="land-for-sale-index">

    <h2><?= Html::encode($this->title) ?>
     <?= Html::a('Register land for sale', ['create'], ['class' => 'btn btn-primary pull-right']) ?>
    </h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
           </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'land_id',
            'name',
            'district',
            'number_of_pots',
            'description',
            // 'created_by',
            // 'created_date',
            // 'amount_bought',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
