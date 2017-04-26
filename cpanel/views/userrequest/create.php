<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Processrequest\Processrequest */

$this->title = 'Create Processrequest';
$this->params['breadcrumbs'][] = ['label' => 'Processrequests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="processrequest-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
