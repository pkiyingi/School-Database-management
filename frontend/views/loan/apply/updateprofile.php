<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SaccoMember */

$this->title = 'Update Personal Details';
$this->params['breadcrumbs'][] = ['label' => 'Sacco Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->member_id, 'url' => ['view', 'id' => $model->member_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="x_panel">
    <h2><?= Html::encode($this->title) ?>
        <span class="small">Please provide the information which has changed or is missing</span>
    </h2>
    <?= $this->render('_form_memberprofile', [
        'model' => $model,
    ]) ?>

</div>
