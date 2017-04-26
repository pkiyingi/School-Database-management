<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use common\models\loan\LoanApplication;
use yii\helpers\Url;

AppAsset::register($this);
$model = new LoanApplication();

if (isset($_GET['id'])) {
    $model = LoanApplication::findOne($_GET['id']);
}
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


    <style>
        .letter {
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
            min-height: 300px;
            padding: 24px;
            position: relative;
            width: 100%;
        }
        .letter:before, .letter:after {
            content: "";
            height: 98%;
            position: relative;
            width: 100%;
            z-index: -1;
        }
        .letter:before {
            background: #fafafa;
            box-shadow: 0 0 8px rgba(0,0,0,0.2);
            left: -5px;
            top: 4px;
            transform: rotate(-2.5deg);
        }
        .letter:after {
            background: #f6f6f6;
            box-shadow: 0 0 3px #003;
            right: -3px;
            top: 1px;
            transform: rotate(1.4deg);
        }

        /**
         * VERTICAL STEPS
         **/
        .list-group.vertical-steps{
            padding-left:10px;
        }
        .list-group.vertical-steps .list-group-item{
            border:none;
            border-left:3px solid #ece5dd;
            box-sizing:border-box;
            border-radius:0;
            counter-increment: step-counter;
            padding-left:20px;
            padding-right:0px;
            padding-bottom:20px;  
            padding-top:0px;
        }
        .list-group.vertical-steps .list-group-item.active{
            background-color:transparent;
            color:inherit;
        }
        .list-group.vertical-steps .list-group-item:last-child{
            border-left:3px solid transparent;
            padding-bottom:0;
        }
        .list-group.vertical-steps .list-group-item::before {
            border-radius: 50%;
            background-color:#ece5dd;
            color:#555;
            content: counter(step-counter);
            display:inline-block;
            float:left;
            height:25px;
            line-height:25px;
            margin-left:-35px;
            text-align:center;  
            width:25px;
            border:1px dotted #ccc;
        }
        .list-group.vertical-steps .list-group-item span,
        .list-group.vertical-steps .list-group-item a{
            display:block;
            overflow:hidden;
            padding-top:2px;
        }
        /*Active/ Completed States*/
        .list-group.vertical-steps .list-group-item.active::before{
            background-color:green;
            color:#fff;
        }
        .list-group.vertical-steps .list-group-item.completed{
            border-left:3px solid green;
        }
        .list-group.vertical-steps .list-group-item.completed::before{
            background-color:green;
            color:#fff;
        }
        .list-group.vertical-steps .list-group-item.completed:last-child{
            border-left:3px solid transparent;
        }
        /**
        Heading
        **/
        .heading{
            margin-top:-10px;
        }
        .heading h3{
            font-weight: bold;
            color:#069;
        }
        .heading p.desc{
            color:#0077b5;
            font-style: italic;
            size:90%;
            border-bottom: 1px solid #ccc;
            border-top:1px solid #ccc;
            padding:5px;
        }

        /** Modal **/
        span.select2-container {
            z-index:10050;
        }
    </style>


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




                            <ul class="list-group vertical-steps">

<?php if ($model->personal_details_step == 'Y') {
    ?>
                                    <li class="list-group-item completed"><span><a href="<?= Url::to(['loan/updateloanprofile', 'id' => $model->loan_application_id]) ?>">
                                                <i class="fa fa-user"></i>
                                                Member Details
                                            </a></span></li>

<?php } else { ?>


                                    <li class="list-group-item "><span><a href="<?= Url::to(['loan/updateloanprofile']) ?>">
                                                <i class="fa fa-user"></i>
                                                Member Details
                                            </a></span></li>

<?php } ?>


<?php if ($model->loan_details_step == 'Y') { ?>             

                                    <li class="list-group-item completed"><span><a href="<?= Url::to(['loan/loandetails', 'id' => $model->loan_application_id]) ?>">
                                                <i class="fa fa-cc-visa"></i>
                                                Loan Details
                                            </a></span></li>
<?php } else { ?>

                                    <li class="list-group-item"><span><a href="<?= Url::to(['loan/loandetails']) ?>">
                                                <i class="fa fa-cc-visa"></i>
                                                Loan Details
                                            </a></span></li>
<?php } ?>

                                <?php if ($model->gaurantor_approval_step_step == 'Y') {
                                    ?>
                                    <li class="list-group-item completed"><span> <a href="<?= Url::to(['loan/guarantor', 'id' => $model->loan_application_id]) ?>">
                                                <i class="fa fa-user"></i>
                                                Guarantors
                                            </a></span</li>

<?php } else if ($model->loan_details_step == 'Y') { ?>

                                    <li class="list-group-item "><span> <a href="<?= Url::to(['loan/guarantor', 'id' => $model->loan_application_id]) ?>">
                                                <i class="fa fa-user"></i>
                                                Guarantors Approval
                                            </a></span</li>

<?php } ?>

                                <?php if ($model->documentupload_step == 'Y') { ?>
                                    <li class="list-group-item completed"><span>
                                            <a href="<?= Url::to(['loan/documents', 'id' => $model->loan_application_id]) ?>">
                                                <i class="fa fa-file-pdf-o"></i>
                                                Supporting Documents
                                            </a>
                                        </span</li>


<?php } else if ($model->loan_details_step == 'Y') { ?>
                                    <li class="list-group-item "><span>
                                            <a href="<?= Url::to(['loan/documents', 'id' => $model->loan_application_id]) ?>">
                                                <i class="fa fa-file-pdf-o"></i>
                                                Supporting Documents
                                            </a>
                                        </span</li>

<?php } ?>
                                <br>

<?php  if ($model->loan_details_step == 'Y') { ?>
                                    <span>
                                        <a class="btn btn-info pull-left" href="<?= Url::to(['loan/confirm', 'id' => $model->loan_application_id]) ?>" >

                                            <i class="fa fa-file-pdf-o"></i>
                                            Complete Loan application
                                        </a>
                                    </span
<?php } ?>

                            </ul> 						
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