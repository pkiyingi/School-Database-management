<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LoanDocumentuploadedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Loan Documentuploadeds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loan-documentuploaded-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Loan Documentuploaded', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'loandocument_id',
            'loan_id',
            'document_id',
            'uploaded_by',
            'remarks',
            // 'uploaded_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
