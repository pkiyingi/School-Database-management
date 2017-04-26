<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\accesscontrol\Authmenu */

$this->title = 'Create Authmenu';
$this->params['breadcrumbs'][] = ['label' => 'Authmenus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="authmenu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
