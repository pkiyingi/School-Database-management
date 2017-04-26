<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <?= Html::csrfMetaTags() ?> 
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= Html::encode($this->title) ?> | URA STAFF SACCO </title>

        <link href="<?= MYSACCO_FRONTEND_URL; ?>/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= MYSACCO_FRONTEND_URL; ?>/fonts/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?= MYSACCO_FRONTEND_URL; ?>/css/animate.min.css" rel="stylesheet">

        <!-- Custom styling plus plugins -->
        <link href="<?= MYSACCO_FRONTEND_URL; ?>/css/custom.css" rel="stylesheet">
        <link href="<?= MYSACCO_FRONTEND_URL; ?>/css/icheck/flat/green.css" rel="stylesheet">
        <script src="<?= MYSACCO_FRONTEND_URL; ?>/js/jquery.min.js"></script>
    </head>

    <body style="background: #0063DC;">
            <div id="wrapper">
                    <section class="text-center" style="width:500px;background:#fff;border:2px solid #068;">
                        <?= Alert::widget() ?>
                        <h2 style="border-bottom:4px solid #ccc;font-weight:bold;padding:7px;"><?= $this->title; ?></h2>
                        <?= $content ?>
                    </section>
                </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>