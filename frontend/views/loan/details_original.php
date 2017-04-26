<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

//Requests
$request = Yii::$app->request;
//Current page
$page = $request->get('pg', 'details');
$id = $request->get('id');
$this->title = $model->details->reference_no;

$menus = array(
    ['label' => 'Loan Details', 'link' => '#', 'code' => 'details'],
    ['label' => 'Guarantors', 'link' => '#', 'code' => 'guarantee'],
    ['label' => 'Files Attached', 'link' => '#', 'code' => 'files'],
    ['label' => 'Costs & Shares Bought', 'link' => '#', 'code' => 'costs'],
    ['label' => 'Payment Schedule', 'link' => '#', 'code' => 'schedule'],
    ['label' => 'Approvals', 'link' => '#', 'code' => 'approvals'],
);
?>
<style>
    ul li a.active{
        background:#ccc;
    }


    /*CPANEL*/
    .dashboard{
        background: none repeat scroll 0% 0% #FFF;
        border-width: 1px;
        border-style: solid;
        -moz-border-top-colors: none;
        -moz-border-right-colors: none;
        -moz-border-bottom-colors: none;
        -moz-border-left-colors: none;
        border-image: none;
        border-color: #E5E6E9 #DFE0E4 #D0D1D5;
        border-radius: 3px;
        margin-top:-4px;
        margin-bottom: 25px;
    }

    .dashboard .title{
        font-size:130%;
        color:#003 !important;
        background: none repeat scroll 0% 60% #F6F7F8 !important;
        height: 47px;
        margin-bottom:0px;
        text-align:left;
        font-weight:bold;
        padding:8px 6px !important;
        border-bottom:1px solid #ccc;
    }

    .dashboard .title h1,
    .dashboard .title h2,
    .dashboard .title h3,
    .dashboard .title p,
    .dashboard .title b
    {
        border-bottom:none !important;
    }

    .dashboard .content{
        width:100%;
        background: #fff;
        padding:3px;
    }

    div.right_col{
        background:#fff;
    }

    div.letter-head h2{
        font-size: 200%;
        color:#333;
    }
</style>
<div class="loan-application-view" style="background:#fff;margin-left: -15px; padding:4px;">
    <div class="row-fluid letter-head" style="border-bottom: 4px solid #069;padding-bottom: 5px;margin-bottom: 10px;">
        <img src="images/logo.png"  style="height: 100px;float:left;margin-left: 50px;"/>
        <h2 class="text-center">UGANDA REVENUE AUTHORITY STAFF COOPERATIVE 
            <br/>SAVINGS AND CREDIT SOCIETY LIMITED
            <br/><b>LOAN APPLICATION NO: <?= $model->details->reference_no; ?></b>
        </h2>
    </div>

    <div>
        <div class="row">
            <div class="col-lg-9" style="border-radius: 0px;background: #fff;">
                <table class="table table-striped">
                    <tr>
                        <th>
                            AMOUNT REQUESTED 
                        </th>
                        <td>
                            <?= $model->details->amount_requested; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            TYPE OF LOAN   
                        </th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>
                            CURRENT STATUS  
                        </th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>
                            LOAN PURPOSE
                        </th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>
                            REPAYMENT PERIOD
                        </th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>
                            MONTHLY REPAYMENT
                        </th>
                        <td></td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-3">
                <a href="#" class="btn btn-success btn-block btn-lg"><i class="glyphicon glyphicon-print"></i> Print Application form</a>
                <a href="#" class="btn btn-warning btn-block btn-lg"><i class="glyphicon glyphicon-usd"></i> Pay up</a>
                <a class="btn btn-dark btn-block btn-lg" href="index.php?r=documents/create&ln=<?= $id; ?>">
                    <i class="glyphicon glyphicon-upload"></i> Upload Document</a>
                <a href="#" class="btn btn-primary btn-block btn-lg" 
                   data-toggle="modal" 
                   data-target="#add_guarantor_form"><i class="glyphicon glyphicon-user"></i> Add guarantor</a>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="dashboard-row">
                    <div class="dashboard">
                        <div class="title">
                            <b>
                                <span class="glyphicon glyphicon-file"></span>    
                                Loan Details
                                <a href=""><span class="pull-right"><span class="glyphicon glyphicon-"></span> </span></a>                        </b>
                        </div>
                        <div class="content miniview">
                            <?php
                            echo $this->render('details/loandetails', [
                                'loandetails' => $model->details,
                            ]);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- Costs Incurred -->
                <div class="dashboard-row">
                    <div class="dashboard">
                        <div class="title">
                            <b>
                                <span class="glyphicon glyphicon-file"></span>    
                                Costs Incurred & Shares bought
                                <a href=""><span class="pull-right"><span class="glyphicon glyphicon-"></span> </span></a>                        </b>
                        </div>
                        <div class="content miniview">
                            <h2>Costs go here</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="dashboard-row">
                    <div class="dashboard">
                        <div class="title">
                            <b>
                                <span class="glyphicon glyphicon-file"></span>    
                                Documents Attached
                                <a href=""><span class="pull-right"><span class="glyphicon glyphicon-"></span> </span></a>                        </b>
                        </div>
                        <div class="content miniview">
                            <h2>Documents go here</h2>
                        </div>
                    </div>
                </div>
            </div>

            <!--Guarantors -->
            <div class="col-lg-6">
                <div class="dashboard-row">
                    <div class="dashboard">
                        <div class="title">
                            <b>
                                <span class="glyphicon glyphicon-file"></span>    
                                Guarantors
                                <a href=""><span class="pull-right"><span class="glyphicon glyphicon-"></span> </span></a>                        </b>
                        </div>
                        <div class="content miniview">
                            <?php
                            echo $this->render('details/guarantee', [
                                'guarantors' => $model->guarantors,
                            ]);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <!-- Recent Activities --
        <div class="row">
        <div class="col-lg-12">
    
            <div class="dashboard-row">
                <div class="dashboard">
                    <div class="title">
                        <b>
                            <span class="glyphicon glyphicon-file"></span>    
                            Recent Activities
                            <a href=""><span class="pull-right"><span class="glyphicon glyphicon-"></span> </span></a>                        </b>
                    </div>
                    <div class="content miniview">
                        <h2>Activities go here</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
             --/Recent activities-->

        <!-- Payment Schedule -->
        <div class="row">
            <div class="col-lg-12">
                <div class="dashboard-row">
                    <div class="dashboard">
                        <div class="title">
                            <b>
                                <span class="glyphicon glyphicon-file"></span>    
                                Payment Schedule
                                <a href=""><span class="pull-right"><span class="glyphicon glyphicon-"></span> </span></a>                        </b>
                        </div>
                        <div class="content miniview">
                            <h2>Schedule goes here</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--MODALS -->
<!--1. Add Guarantor -->
<div class="modal fade" id="add_guarantor_form" tabindex="-1" role="dialog" aria-labelledby="add_guarantor_formLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add a guarantor</h4>
            </div>
            <div class="modal-body">
                <h2>Form Details</h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--/Add Guarantor-->
<!--/MODALS-->