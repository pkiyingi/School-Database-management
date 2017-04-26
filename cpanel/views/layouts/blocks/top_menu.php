<?php
/*
 * Top menu for logged in members
 */
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\member\LoggedInMember;

//The logged in member
$user = new LoggedInMember();
$member = $user->member_details;
//session
$session = Yii::$app->session;
?>

<div class="top_nav">
    <div class="nav_menu">
        <nav class="" role="navigation">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <ul class="nav navbar-nav navbar-left pull-left">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" style="font-size: 14px;font-weight: 100;">                       
                        ACCOUNT NUMBER: <?= $member->username; ?>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="images/img.jpg" alt=""><?= $member->firstname; ?>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                        <li><a href="index.php?r=member/profile">
                                 <span class="badge bg-green pull-right"><?= $user->profile_completeness ?>% Complete</span>
                                Profile</a>
                        </li>
                        <li>
                            <a href="#">
                                  <span>Bank Accounts</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">Change Password</a>
                        </li>
                        <li><a href="index.php?r=site/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>

</div>