<?php
/*
 * Left Navigation for the Front-end App
 */
?>
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

    <div class="menu_section">

        <ul class="nav side-menu" style="margin-top:40px;">
            <li class="vn"><a href="index.php?r=site/index"><i class="fa fa-home">
                    </i>Dashboard</a>
            </li>
            <li class="vn"><a href="index.php?r=member/profile"><i class="fa fa-male">
                    </i>My Profile</a>
            </li>
            <li class="vn"><a href="index.php?r=loan/apply"><i class="fa fa-file-text">
                    </i> Apply for a Loan</a>
            </li>
            <li class="vn"><a href="index.php?r=account/withdraw"><i class="fa fa-arrow-circle-left">
                    </i> Withdraw from savings</a>
            </li>
            <li><a><i class="fa fa-cube"></i> My Account <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="index.php?r=account/toto-accounts">Manage Accounts</a>
                    </li>
                    <li><a href="index.php?r=account/close">Learn More</a>
                    </li>
                </ul>
            </li>
            <li><a><i class="fa fa-cubes"></i> My Shares <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="#">Buy Savings</a>
                    </li>
                    <li><a href="#">Sell Shares</a>
                    </li>
                    <li><a href="#">Transfer Shares</a>
                    </li>
                </ul>
            </li>
            <li><a><i class="fa fa-history"></i> Account History <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="index.php?r=member/loan-applications">Loan Applications</a>
                    </li>
                    <li><a href="#">Withdrawals</a>
                    </li>
                    <li><a href="#">Savings</a>
                    </li>
                    <li><a href="#">Change of savings</a>
                    </li>
                    <li><a href="#">Toto Contributions</a>
                    </li>
                    <li><a href="#">Interest &amp; Devidend earned</a>
                    </li>
                </ul>
            </li>
            <li><a><i class="fa fa-cogs"></i> Tools <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="index.php?r=tools/loan-calculator">Loan Calculator</a>
                    </li>
                    <li><a href="index.php?r=tools/savings-planner">Savings Planner</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

</div>

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="SACCO Products" href="index.php?r=site/products">
        <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Download Forms" href="index.php?r=site/downloads">
        <span class="fa fa-download" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Knowledge Center" href="index.php?r=site/useful-info">
        <span class="fa fa-info" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" 
       title="SACCO Website" href="http://urasacco.com" target="_blank">
        <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
    </a>
</div>
<!-- /menu footer buttons -->