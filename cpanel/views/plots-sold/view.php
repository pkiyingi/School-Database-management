<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\LandForSalePlotsSold */

$this->title = $model->plotsold_id;
$this->params['breadcrumbs'][] = ['label' => 'Land For Sale Plots Solds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="land-for-sale-plots-sold-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->plotsold_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->plotsold_id], [
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
            'plotsold_id',
            'land_id',
            'num_of_plots',
            'created_by',
            'plot_numbers',
            'last_payment_date',
            'bought_by',
            'date_bought',
            'total_amount',
        ],
    ]) ?>

</div>
