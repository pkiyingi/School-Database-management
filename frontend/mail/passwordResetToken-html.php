<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p>Hello <?= Html::encode($user->firstname) ?>,</p>

    <p>We have received a request to reset your password. If you made this request, please <a href="<?= Html::encode($resetLink) ?>">click here</a> to recover your password.</p>
</div>

<p>This email was intended for <?= Html::encode($user->firstname) ?>, if you did not make the request, please ignore this email.</p>