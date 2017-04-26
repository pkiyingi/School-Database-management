<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LandForSalePayment */

$this->title = 'Create Land For Sale Payment';
$this->params['breadcrumbs'][] = ['label' => 'Land For Sale Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="land-for-sale-payment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
