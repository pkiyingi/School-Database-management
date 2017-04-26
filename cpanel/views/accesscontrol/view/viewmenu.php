<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model common\models\accesscontrol\Authmenu */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Authmenus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="authmenu-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->menu_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->menu_id], [
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
        //    'menu_id',
            'name',
            'description',
          //  'code',
            'client',
            'record_status',
        ],
    ]) ?>
    
    
    
    
    
    <?php
    
    /* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menu Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-menu-items-index">

     <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create Auth Menu Items', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'menu_id',
            'label',
            'link',
            'icon',
            // 'parent_id',
            // 'permission',
            // 'page_description',
            // 'level',
            // 'record_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

</div>
