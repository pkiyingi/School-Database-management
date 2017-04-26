<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LoanApplicationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Previous Loan Applications';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loan-application-index">

    <h1><?= Html::encode($this->title) ?>
    <?= Html::a('Apply for a Loan', ['apply'], ['class' => 'btn btn-success pull-right']) ?>
    </h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'loan_application_id',
            //'sacco_account_no',
            //'loan_type_id',
            'created_date',
            //'created_by',
             'amount_requested',
             'loan_purpose',
            // 'consolidated_pay',
            // 'other_income',
            // 'monthly_expenditure',
            // 'new_sacco_savings',
            // 'other_loan_repayments',
            // 'bank_account_id',
            // 'update_date',
            // 'updated_by',
            // 'submitted_date',
            // 'status_code',
            // 'amount_approved',
             'repayment_period',
             'monthly_repayment',
            // 'disbursment_date',
            // 'outstanding_loan_balance',
            // 'bank_loan_payment',
            // 'net_payment',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
