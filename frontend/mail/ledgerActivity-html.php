<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p>Hello <?= Html::encode($user->firstname) ?>,</p>

    <p>We have received a request to reset your password. If you made this request, please click he button below. if you did not make the request, please ignore this email</p>

    <a href="<?= Html::encode($resetLink) ?>" 
       style="background: #7DDC1F -moz-linear-gradient(center top , #7DDC1F 0px, #64C306 100%) repeat scroll 0% 0%;
                border-color: #5DBA00;letter-spacing: 0.5px;padding: 9px 33px;color:#fff !important;
                text-shadow: none;width:400px;margin:0 auto; text-align: center;margin:20px;text-decoration: none;">Recover your password</a>
</div>
