<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use yii\helpers\Url;
use frontend\models\ContactForm;

//session
$session = Yii::$app->session;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>
            <?= $this->title . ' | URA STAFF SACCO'; ?>
        </title>
        <meta name="author" content="">
        <meta name="keywords" content="">
        <meta name="description" content="">		

        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">		

        <!-- Libs CSS -->
        <link href="<?= MYSACCO_FRONTEND_URL; ?>/welcometheme/css/bootstrap.css" rel="stylesheet">
        <link href="<?= MYSACCO_FRONTEND_URL; ?>/welcometheme/css/simple-line-icons.css" rel="stylesheet">
        <link href="<?= MYSACCO_FRONTEND_URL; ?>/welcometheme/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?= MYSACCO_FRONTEND_URL; ?>/vendor/fontawesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?= MYSACCO_FRONTEND_URL; ?>/welcometheme/css/prettyPhoto.css" rel="stylesheet" type="text/css" media="all" />

        <!-- Template CSS -->
        <link href="<?= MYSACCO_FRONTEND_URL; ?>/welcometheme/css/style.css" rel="stylesheet"> 

        <!-- Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,700,800&amp;subsetting=all' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,800,700,300' rel='stylesheet' type='text/css'>
        <style>
            .clients-logo img{
                height:45px;
                width:auto;
            }
            body,h2,h3,h4,
            label.control-label{
                font-feature-settings: "kern";
                font-family: "WOL_SL","Segoe UI Semilight","Segoe UI",Tahoma,Helvetica,sans-serif;
                font-weight: 100;
            }
        </style>

    </head>

    <body data-spy="scroll" data-target=".navigation">

        <!-- Banner -->	
        <div id="banner" class="bg-blur" style="background:#1155aa">
            <!-- Start Header -->
            <div id="header" style="padding-bottom:0px;b">
                <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <!-- Start Logo / Text -->
                            <a class="navbar-brand text-logo" href="#">
                                <img src="http://localhost:85/saccomanager/new/images/logo.png" style="height:40px;">            
                                MYSACCO</a>
                            <!-- End Logo / Text -->
                        </div>
                        <!-- Start Navigation -->
                        <div class="navigation navbar-collapse collapse">
                            <ul class="nav navbar-nav menu-right">
                                <li class="active"><a href="#"><b><i class="fa fa-envelope-o"></i> ura-sacco@ura.go.ug</b></a></li>
                                <li><a href="#"><b><i class="icon-call-out"></i> 0417442228</b></a></li>
                                <li><a href="#faq"><i class="fa fa-question"></i> FAQs</a></li>
                                <li><a href="#contact"><i class="fa fa-envelope"></i> Send Email</a></li>  
                                <li><a href="http://localhost:85/saccomanager/documentation"><i class="fa fa-external-link"></i> User Manual</a></li>
                            </ul>
                        </div>
                        <!-- End Navigation  -->
                    </div>
                </nav>
            </div>
            <!-- End Header -->
            <div class="banner-content">
                <div class="container">
                    <div class="row">

                        <!-- Start Header Text -->
                        <div class="col-md-8 col-sm-8 col-lg-8 text-justify" style='margin-top:-30px;'>
                            <h3 style='color:yellow'>Better<strong> SACCO Account</strong> Management</h3>
                            <p><b>MYSACCO</b> is an system which helps you to manage your savings, loans and deposits in your URA Staff SACCO Account. 
                                You can use your Desktop computer, Laptop, Tablet or even Smart phone.
                            </p>
                            <img src="<?= MYSACCO_BASEURL; ?>/images/responsive.png" class="img-responsive" alt="" title="" />
                       </div>
                        <!-- End Header Text -->
                        <!-- Start Banner Optin Form-->
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="banner-form">
                                <div class="form-title">
                                    <h2>Login to your account</h2>
                                </div>
                                <div class="form-body">
                                    <?= $content ?>
                                </div>
                            </div>
   
                        </div>
                        <!-- End Banner Option Form -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner -->

        <!-- FAQ -->
        <section id="faq" class="section bg-grey  arrow-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="headline">
                            <h2>Frequently Asked Questions</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam aliquando posse.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="faq-body"><!-- FAQ -->
                            <i class="line-font blue icon-question"></i><!-- Question Mark Icon -->
                            <h4><b>Can I buy this template and sell it ?</b></h4><!-- Question -->
                            <div class="answer"><!-- Answer -->
                                <p>It actually depends on the license.</p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                            </div>
                        </div><!-- End FAQ -->
                        <div class="faq-body"><!-- FAQ -->
                            <i class="line-font blue icon-question"></i><!-- Question Mark Icon -->
                            <h4><b>What's the guarantee period ?</b></h4><!-- Question -->
                            <div class="answer"><!-- Answer -->
                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                            </div>
                        </div><!-- End FAQ -->
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="faq-body"><!-- FAQ -->
                            <i class="line-font blue icon-question"></i><!-- Question Mark Icon -->
                            <h4><b>Why not use an accordion ?</b></h4><!-- Question -->
                            <div class="answer"><!-- Answer -->
                                <p><strong>Not everyone like accordions and it's easier to read it this way</strong></p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                            </div><!-- End FAQ -->
                        </div>
                        <div class="faq-body"><!-- FAQ -->
                            <i class="line-font blue icon-question"></i><!-- Question Mark Icon -->
                            <h4><b>What is the refund policy ?</b></h4><!-- Question -->
                            <div class="answer"><!-- Answer -->
                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                            </div><!-- End FAQ -->
                        </div>
                    </div>
                </div>
            </div>
        </section>	
        <!-- End FAQ -->

        <!--Contact-->
        <section id="contact" class="section bg-blue-pattern">
            <div class="container">
                <div class="headline">
                    <h2>Contact us today</h2>
                </div>
                <div class="col-lg-12 col-md-12">
                    <?php
                    $contact_model = new ContactForm();
                    echo $this->render('/site/contact', [
                        'model' => $contact_model,
                    ])
                    ?>
                </div>
            </div>
        </section>
        <!-- End Contact -->

        <!-- Footer Bottom -->	
        <footer class="footer footer-sub">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <p>&copy;MYSACCO. All Right Reserved</p>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <p class="copyright">Designed and Developed with <i class="icon-heart"></i> by <a href="http://www.kumusoft.com/">Kumusoft</a></p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer Bottom -->

        <!-- Start Js Files -->
        <script type="text/javascript" src="<?= MYSACCO_FRONTEND_URL; ?>/welcometheme/js/jquery-2.1.0.min.js"></script><!--jQuery is a Javascript library that greatly reduces the amount of code that you must write.-->
        <script type="text/javascript">window.jQuery || document.write('<script src="js/jquery-2.1.0.min.js"><\/script>')</script>
        <script src="<?= MYSACCO_FRONTEND_URL; ?>/welcometheme/js/bootstrap.min.js" type="text/javascript"></script><!--Packed with many functionalies such as carousel slider, responsivity, tabs, drop downs, buttons, and many other features-->
        <script src="<?= MYSACCO_FRONTEND_URL; ?>/welcometheme/js/modernizr.min.js" type="text/javascript"></script><!--Modernizr is an open-source JavaScript library that helps you build the next generation of HTML5 and CSS3-powered websites.-->
        <script src="<?= MYSACCO_FRONTEND_URL; ?>/welcometheme/js/jquery.prettyPhoto.js" type="text/javascript" ></script><!-- Script for Lightbox Image  -->
        <script src="<?= MYSACCO_FRONTEND_URL; ?>/welcometheme/js/custom.js" type="text/javascript"></script><!-- Script File containing all customizations  -->
        <!-- End Js Files  -->
        <?php
        if (class_exists('yii\debug\Module')) {
            $this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
        }
        $this->endBody()
        ?>
    </body>
</html>
<?php $this->endPage() ?>