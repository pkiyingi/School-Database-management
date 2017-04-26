<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Processrequests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="processrequest-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Processrequest', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'reference_no',
            'application_type',
            'amount_applied',
            'amount_approved',
            // 'remarks',
            // 'status',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',
            // 'member_no',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
