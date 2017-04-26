<?php

//
/*
 * Left Navigation for the Front-end App
 */

use yii\helpers\Url;
?>
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu" style="margin-top:40px;">
    <div class="menu_section">
        <ul class="nav side-menu">
            <li class="vn"><a href="index.php?r=site/index"><i class="fa fa-home">
                    </i>Dashboard</a>
            </li>
            <li class="vn"><a href="index.php?r=loan">
                    <i class="fa fa-th">
                    </i>LOAN APPLICATIONS</a>
            </li>
            <li class="vn"><a href="#">
                    <i class="fa fa-list"></i>
                    WITHDRAWAL REQUESTS</a> 
            </li>


            <li class="vn"><a href="<?= Url::to(['/userrequest']) ?>">
                    <i class="fa fa-list"></i>
                    Pending Requests</a> 
            </li>
            
             <li class="vn"><a href="<?= Url::to(['/accesscontrol']) ?>">
                    <i class="fa fa-list"></i>
                    Access Control</a> 
            </li>


        </ul>
        </li>
        </ul>
    </div>

</div>

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="SACCO Products" href="#">
        <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Download Forms" href="#">
        <span class="fa fa-download" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="My Account" href="/saccomanager/new" target="_blank">
        <span class="fa fa-link" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" 
       title="SACCO Website" href="http://urasacco.com" target="_blank">
        <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
    </a>
</div>
<!-- /menu footer buttons -->