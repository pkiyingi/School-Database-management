<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Processrequest\Processrequest */

$this->title = 'Update Processrequest: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Processrequests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="processrequest-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
