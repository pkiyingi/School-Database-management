<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SystemAccounts */

$this->title = 'Create System Accounts';
$this->params['breadcrumbs'][] = ['label' => 'System Accounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-accounts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
