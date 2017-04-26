<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LoanDocumentuploaded */

$this->title = 'Upload a document';

?>
<div class="loan-documentuploaded-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>