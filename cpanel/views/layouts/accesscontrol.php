<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use yii\helpers\Url;

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
<?php echo $this->head() ?>
        <!-- Bootstrap core CSS -->
        <link href="<?= MYSACCO_FRONTEND_URL; ?>/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= MYSACCO_FRONTEND_URL; ?>/fonts/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?= MYSACCO_FRONTEND_URL; ?>/css/animate.min.css" rel="stylesheet">
        <link href="<?= MYSACCO_FRONTEND_URL; ?>/css/custom.css" rel="stylesheet">
        <link href="<?= MYSACCO_FRONTEND_URL; ?>/css/modalforms.css" rel="stylesheet">
        <link href="<?= MYSACCO_FRONTEND_URL; ?>/css/icheck/flat/blue.css" rel="stylesheet" />
        <link href="<?= MYSACCO_FRONTEND_URL; ?>/css/custom-modal.css" rel="stylesheet">
        <!-- JS-->
        <script src="<?= MYSACCO_FRONTEND_URL; ?>/js/jquery.min.js"></script>
    </head>


    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="index.php">
                                <img src="<?= MYSACCO_BASEURL; ?>/images/logo_small.png" style="height:40px;">            
                                <span class="title">URA STAFF SACCO</span>
                                <br/>
                                <span class="desc">Self Service Portal</span>
                            </a>
                        </div>
                        <br />
                        <!-- sidebar menu -->
<?= $this->render('blocks/left_navigation') ?>
                        <!-- /sidebar menu -->                       
                    </div>
                </div>
<?= $this->render('blocks/top_menu') ?>
                <div class="right_col" role="main">
                    <div class="row">
                        <div class="col-lg-9" style="padding-right: 3px">
                            <?= Alert::widget() ?>

                            <div class="x_panel">
                                <div class="x_content">
<?= $content ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3" style="padding: 0px">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="<?= Url::to(['accesscontrol/permissions']) ?>">
                                        <i class="fa fa-user"></i>
                                        Permissions
                                    </a>
                                </li>
                             <li class="list-group-item">
                                    <a href="<?= Url::to(['accesscontrol/userroles']) ?>">
                                        <i class="fa fa-cc-visa"></i>
                                        Assign Users Permissions
                                    </a>
                                </li>
								
								
                                <li class="list-group-item">
                                    <a href="<?= Url::to(['accesscontrol/menus']) ?>">
                                        <i class="fa fa-shopping-cart"></i>
                                        Manage Menus
                                    </a>
                                </li>
                               
                                <li class="list-group-item">
                                    <a href="<?= Url::to(['accesscontrol/roles']) ?>">
                                        <i class="fa fa-dollar"></i>
                                        System Roles
                                    </a>
                                </li>
                            </ul>
                            <h4 style="font-weight:bold;color:#068;border-bottom:3px solid #ccc;margin-left:5px;">Recent Activities
                            </h4>
                        </div>
                    </div>

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
<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>