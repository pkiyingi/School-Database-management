<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SaccoMember */

$this->title = $model->member_id;
$this->params['breadcrumbs'][] = ['label' => 'Sacco Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sacco-member-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->member_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->member_id], [
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
            'member_id',
            'username',
            'firstname',
            'email:email',
            'lastname',
            'gender',
            'role',
            'created_date',
            'created_by',
            'updated_date',
            'updated_by',
            'status_code',
            'joining_date',
            'date_of_birth',
            'member_category',
            'member_monthly_contribution',
            'toto_monthly_contribution',
            'accont_type',
            'telephone1',
            'telephone2',
            'physical_address',
            'employment_type',
            'employment_position',
            'password',
            'password_hash',
            'password_reset_token',
            'auth_key',
        ],
    ]) ?>

</div>
