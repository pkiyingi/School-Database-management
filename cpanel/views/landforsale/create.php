<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LandForSale */

$this->title = 'Create Land For Sale';
$this->params['breadcrumbs'][] = ['label' => 'Land For Sales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="land-for-sale-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
