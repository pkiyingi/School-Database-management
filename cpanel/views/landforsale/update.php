<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LandForSale */

$this->title = 'Update Land For Sale: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Land For Sales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->land_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="land-for-sale-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
