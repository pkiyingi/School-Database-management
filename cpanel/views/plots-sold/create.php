<?php
use yii\helpers\Html;


$this->title = 'Record a  plot sold';
$this->params['breadcrumbs'][] = ['label' => 'Land For Sale Plots Solds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="land-for-sale-plots-sold-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
