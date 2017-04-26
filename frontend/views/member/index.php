<?php
use common\models\User;
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Sacco Members';
$this->params['breadcrumbs'][] = $this->title;

$user = User::findByUsername('0512512');
?>
<pre>
    <?php
    print_r($user->guarantortasks);
    ?>
</pre>
<div class="sacco-member-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sacco Member', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'member_id',
            'username',
            'firstname',
            'email:email',
            'lastname',
            // 'gender',
            // 'role',
            // 'created_date',
            // 'created_by',
            // 'updated_date',
            // 'updated_by',
            // 'status_code',
            // 'joining_date',
            // 'date_of_birth',
            // 'member_category',
            // 'member_monthly_contribution',
            // 'toto_monthly_contribution',
            // 'accont_type',
            // 'telephone1',
            // 'telephone2',
            // 'physical_address',
            // 'employment_type',
            // 'employment_position',
            // 'password',
            // 'password_hash',
            // 'password_reset_token',
            // 'auth_key',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
