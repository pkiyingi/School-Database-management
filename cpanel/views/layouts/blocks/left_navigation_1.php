<?php
//
/*
 * Left Navigation for the Front-end App
 */
?>
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <ul class="nav side-menu">
            <li class="vn"><a href="index.php?r=site/index"><i class="fa fa-home">
                    </i>Dashboard</a>
            </li>
             <li class="vn"><a href="index.php?r=accounts/index"><i class="fa fa-home">
                    </i>Approved Loans</a>
            </li>
            <li class="vn"><a href="index.php?r=loan-application/index">
                    <i class="fa fa-bullseye"></i>
                    Loan Applications</a> 
            </li>
            <li class="vn"><a href="index.php?r=loan-application/approved">
                    <i class="fa fa-bullseye"></i>
                    Approved Loan Applications</a> 
            </li>
            <li class="vn"><a href="index.php?r=loan-application/download-approved">
                    <i class="fa fa-bullseye"></i>
                    Download Approved Applications</a> 
            </li>
            
            <li><a><i class="fa fa-th"></i>Land For Sale <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="index.php?r=landforsale/index">
                            <i class="fa fa-circle">
                            </i>Plots For Sale</a>
                    </li>
                    <li><a href="index.php?r=plots-sold/index">
                            <i class="fa fa-circle">
                            </i>Plots Sold</a>
                    </li>
            </li>
            <li><a href="index.php?r=land-payment/index">
                    <i class="fa fa-circle">
                    </i>Payments Made</a>
            </li>
        </ul>
        </li>

        <li><a><i class="fa fa-users"></i>SACCO Members <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu" style="display: none">
                <li><a href="#">List of All members</a>
                </li>
                <li><a href="#">User Groups</a>
                </li>
                <li><a href="#">User Group Permissions</a>
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