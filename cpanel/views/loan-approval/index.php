<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LoanApprovalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Loan Approvals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loan-approval-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Loan Approval', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'loan_approval_id',
            'loan_application_id',
            'approved_by',
            'approval_date',
            'status_code',
            // 'remarks',
            // 'forwarded_to',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
