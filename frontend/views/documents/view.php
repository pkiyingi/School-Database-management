<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\LoanDocumentuploaded */

$this->title = $model->loandocument_id;
$this->params['breadcrumbs'][] = ['label' => 'Loan Documentuploadeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loan-documentuploaded-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->loandocument_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->loandocument_id], [
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
            'loandocument_id',
            'loan_id',
            'document_id',
            'uploaded_by',
            'remarks',
            'uploaded_date',
        ],
    ]) ?>

</div>
