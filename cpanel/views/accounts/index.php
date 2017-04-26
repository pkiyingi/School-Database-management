<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SystemAccounSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'System Accounts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-accounts-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a('Create System Accounts', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'account_no',
            'name',
            //'branch_no',
            //'branch_id',
            // 'r_id',
            // 'account_type_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
