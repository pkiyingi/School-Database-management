<?php
use common\models\Document;
use common\models\User;

use yii\helpers\Html;
?>

            <p>Hello <?= $user->firstname; ?>,</p>
            <p>There is an incoming document which has been received
            </p>
            <p><b>Sender:</b> <?= $doc->document_sender; ?> </p>
            <p><b>Subject Matter:</b> <?= $doc->subject_matter; ?></p>
            <p><b>Type of Document:</b> <?= $doc->category; ?></p>
