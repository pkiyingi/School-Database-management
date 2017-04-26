<?php

use yii\helpers\Html;

$this->title = 'Upload a document';
?>
<div class="loan-application-update">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_documentuploadform', [
        'model' => $model,
    ]) ?>

</div>
