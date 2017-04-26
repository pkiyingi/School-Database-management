<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SaccoMember */

$this->title = 'Create Sacco Member';
$this->params['breadcrumbs'][] = ['label' => 'Sacco Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sacco-member-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
