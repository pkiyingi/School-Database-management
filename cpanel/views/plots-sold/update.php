<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LandForSalePlotsSold */

$this->title = 'Update Land For Sale Plots Sold: ' . ' ' . $model->plotsold_id;
$this->params['breadcrumbs'][] = ['label' => 'Land For Sale Plots Solds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->plotsold_id, 'url' => ['view', 'id' => $model->plotsold_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="land-for-sale-plots-sold-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
