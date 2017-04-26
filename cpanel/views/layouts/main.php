<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use cpanel\assets\AppAsset;
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
        <link href="<?= MYSACCO_FRONTEND_URL; ?>/css/custom.css" rel="stylesheet">
        <link href="<?= MYSACCO_FRONTEND_URL; ?>/css/modalforms.css" rel="stylesheet">
        <link href="<?= MYSACCO_FRONTEND_URL; ?>/css/icheck/flat/blue.css" rel="stylesheet" />
        <!-- JS-->
        <script src="<?=  MYSACCO_FRONTEND_URL; ?>/js/jquery.min.js"></script>
    </head>


    <body class="nav-md" style="background: #069;">

        <div class="container body">


            <div class="main_container">

                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">

                        <div class="navbar nav_title" style="border: 0;">
                            <a href="index.php" class="site_title">
                                 <img src="http://localhost/kumusoft-apps/urasako/images/logo.png" style="height:40px;">            
                             <span>URA STAFF SACCO</span></a>
                        </div>
                        <br />
                        <!-- sidebar menu -->
                        <?= $this->render('blocks/left_navigation') ?>
                        <!-- /sidebar menu -->                       
                    </div>
                </div>

                <!-- top navigation -->
               <?= $this->render('blocks/top_menu') ?>
                <!-- /top navigation -->


                <!-- page content -->
                <div class="right_col" role="main">
                    <?= Alert::widget() ?>
                    <?= $content ?>
                    <!-- footer content -->
                    <footer>
                        <div class="">
                            <p class="pull-right">Uganda Revenue Authority Sacco Manager. | &copy; 2015
                                <span class="lead"> <i class="fa fa-spinner"></i> MY SACCO</span>
                            </p>
                        </div>
                        <div class="clearfix"></div>
                    </footer>
                    <!-- /footer content -->
                </div>
                <!-- /page content -->

            </div>

        </div>
        <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>