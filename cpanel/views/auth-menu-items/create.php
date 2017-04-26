<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\accesscontrol\AuthMenuItems */

$this->title = 'Create Auth Menu Items';
$this->params['breadcrumbs'][] = ['label' => 'Auth Menu Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-menu-items-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
