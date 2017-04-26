<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Processrequest\Processrequest */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Processrequests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="processrequest-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'reference_no',
            'application_type',
            'amount_applied',
            'amount_approved',
            'remarks',
            'status',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
            'member_no',
        ],
    ]) ?>

</div>
