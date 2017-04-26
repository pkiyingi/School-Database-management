<?php
/*
 * Quick links for a logged in member
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\User;

//The molled in member
$member = Yii::$app->user->identity;

//Log out link
$logout = Html::a('Logout', ['//site/logout'], ['data-method' => 'post']);
?>


<div id="personal-links">
    <ul class="nav navbar-nav">
        <li><a href="#"> <span class="glyphicon glyphicon-home"></span></a></li>
        <li><a href="#"><span class="glyphicon glyphicon-envelope"></span></a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="glyphicon glyphicon-user"></span> <?php echo $member->firstname; ?>
                <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#">Schools Attended</a></li>
                <li><a href="#">Fav Quotes</a></li>
                <li><a href="#">Courses</a></li>
                <li class="divider"></li>
                <li><a href="index.php?r=pages/cpanel&id=2">Example Admin Panel</a></li>
                <li class="divider"></li>
                <li>
                   <?php echo $logout; ?>
                </li>
            </ul>
        </li>
    </ul>
</div>