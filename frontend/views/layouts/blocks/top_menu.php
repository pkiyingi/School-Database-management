<?php
/*
 * Top menu for logged in members
 */

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\user;

//The logged in member
$user_id = Yii::$app->user->id;
$member = User::findOne($user_id);
//$bank_accounts = $member->bankAccounts;
//Guarantor Tasks
$tasks = $member->guarantorTasks;
//session
$session = Yii::$app->session;
?>
<div class="top_nav">
    <div class="nav_menu">
        <nav class="" role="navigation">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <ul class="nav navbar-nav navbar-right">           
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="<?= MYSACCO_MEMBERPICS_URL; ?>/default.jpg" alt=""><?= $member->fullnames; ?>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                        <li><a href="<?= Url::to(['member/profile']) ?>">
                                My Profile</a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['site/logout']) ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
                <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-red"><?= count($tasks); ?></span> TASKS
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                        <?php foreach($tasks AS $task){?>
                        <li>
                            <a href="<?= Url::to(['member/approve-task','id'=>$task->guarantor_id]); ?>">
                                <span class="image">
                                    <img src="<?= Yii::$app->homeUrl ?>memberpics/default.jpg" alt="Profile Image">
                                </span>
                                <span>
                                    <span><b><?= $task->createdBy->fullnames; ?></b></span>
                                    <span class="time"><?= \Yii::$app->formatter->asDatetime($task->created_at, "php:d-M-Y"); ?></span>
                                </span>
                                <span class="message">
                                   Loan application No. <?= $task->loan->reference_no; ?> needs your approval
                                </span>
                            </a>
                        </li>
                        <?php } ?>
                        <li>
                            <div class="text-center">
                                <a>
                                    <strong></strong></a><strong>
                                        <a href="<?= Url::to(['member/guarantor-tasks']);?>">
                                            See All Guarantor Tasks</a></strong><a href="<?= Url::to(['member/guarantor-tasks']);?>">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="<?= Url::to(['site/index']) ?>">
                        <i class="fa fa-home"></i> DASHBOARD
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>