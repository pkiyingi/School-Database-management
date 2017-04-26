<?php

use common\models\member\LoggedInMember;

/*
 * Profile Picture
 */
//The logged in member
$user = new LoggedInMember();

$member = Yii::$app->user->identity;
?>
<div class="row">
    <div class="col-lg-7">
        <img src="<?= Yii::$app->homeUrl ?>memberpics/default.jpg" alt="Avatar" class="img-thumbnail member-profile-pic" style="height:120px;width:auto;float:left;margin-right:4px;"> 
        <h3><?= $member->firstname . ' ' . $member->lastname; ?></h3>         
        <p><b>Address:</b> <?= $member->physical_address; ?></p>
        <p><b>Telephone:</b> <?= $member->telephone1; ?></p>
        <p><b>Position:</b> <?= $member->employment_position; ?></p> 
    </div>
    <div class="col-lg-5">

    </div>
</div>