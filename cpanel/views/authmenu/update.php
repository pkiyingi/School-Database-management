<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\accesscontrol\Authmenu */

$this->title = 'Update Authmenu: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Authmenus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->menu_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="authmenu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
