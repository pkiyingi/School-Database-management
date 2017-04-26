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
<html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>
            <?= $this->title . ' | URA STAFF SACCO'; ?>
        </title>
        <link href="<?= MYSACCO_BASEURL; ?>/html/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= MYSACCO_BASEURL; ?>/html/assets/css/loginpage.css" rel="stylesheet">

    </head>
    <body>
        <?php $this->beginBody() ?>
          <?= Alert::widget() ?>
        <div class = "container">
            <div class="wrapper">                  
                      <?= $content ?>		
            </div>
        </div>
        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage() ?>