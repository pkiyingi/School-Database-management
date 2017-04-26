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

        <!-- Bootstrap core CSS -->

        <link href="<?= MYSACCO_FRONTEND_URL; ?>/css/bootstrap.min.css" rel="stylesheet">

        <link href="<?= MYSACCO_FRONTEND_URL; ?>/fonts/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?= MYSACCO_FRONTEND_URL; ?>/css/animate.min.css" rel="stylesheet">

        <!-- Custom styling plus plugins -->
        <link href="<?= MYSACCO_FRONTEND_URL; ?>/css/custom.css" rel="stylesheet">
        <link href="<?= MYSACCO_FRONTEND_URL; ?>/css/icheck/flat/green.css" rel="stylesheet">


        <script src="<?= MYSACCO_FRONTEND_URL; ?>/js/jquery.min.js"></script>

        <!--[if lt IE 9]>
            <script src="../assets/js/ie8-responsive-file-warning.js"></script>
            <![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

    </head>

    <body style="background: #0063DC;">
        <div class="">
            <a class="hiddenanchor" id="toregister"></a>
            <a class="hiddenanchor" id="tologin"></a>
            <div id="wrapper">
                <div id="login" class="animate form">
                    <section class="login_content">
                        <?= Alert::widget() ?>
                        <?= $content ?>
                    </section>
                    <!-- content -->
                </div>
            </div>
        </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>