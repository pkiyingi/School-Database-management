<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use common\models\loan\LoanGuarantor;
use kartik\select2\Select2Asset;
use yii\bootstrap\Modal;

//Requests
$request = Yii::$app->request;
//Current page
$page = $request->get('pg', 'details');
$id = $request->get('id');

//$menus = array(
//    ['label' => 'Loan Details', 'link' => '#', 'code' => 'details'],
//    ['label' => 'Guarantors', 'link' => '#', 'code' => 'guarantee'],
//    ['label' => 'Files Attached', 'link' => '#', 'code' => 'files'],
//    ['label' => 'Costs & Shares Bought', 'link' => '#', 'code' => 'costs'],
//    ['label' => 'Payment Schedule', 'link' => '#', 'code' => 'schedule'],
//    ['label' => 'Approvals', 'link' => '#', 'code' => 'approvals'],
//);
//Details of a new guarantor
$newguarantor = new LoanGuarantor();
$newguarantor->loan_id = $loan->loan_application_id;
$newguarantor->created_at=time();
$newguarantor->created_by = Yii::$app->user->id;
$newguarantor->status_code=1;

$this->title = "Loan Ref. No " . $loan->reference_no;
//Load the Select2 assets
Select2Asset::register($this);
?>
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

<div class="row" style="margin-top:60px;">
    <div class="col-lg-9">
        <div class="letter">
            <div class="heading text-center">
                <img src="<?= MYSACCO_BASEURL; ?>/images/logo.png" style="height:90px;" class="text-center">
                <br/>
                <h3>UGANDA REVENUE AUTHORITY STAFF COOPERATIVE SAVINGS AND CREDIT SOCIETY LIMITED</h3>
                <h3 style='color:#003'>LOAN APPLICATION NO:<?= $loan->reference_no; ?></h3>
                <p class="desc">
                    Details of loan application. Please refer to the old system for more details on this loan application.    
                </p>
            </div>
            <h2 id="loan-detailz">LOAN DETAILS</h2>
            <table class="table table-striped">
                <tr>
                    <th>REF. NO</th>
                    <td>
                        <?= $loan->reference_no; ?>
                    </td>
                </tr>
                <tr>
                    <th>AMOUNT REQUESTED</th>
                    <td>

                    </td>
                </tr>
                <tr>
                    <th>AMOUNT APPROVED</th>
                    <td>

                    </td>
                </tr>
                <tr>
                    <th>DATE SUBMITTED</th>
                    <td>

                    </td>
                </tr>
                <tr>
                    <th>CURRENT STATUS</th>
                    <td>

                    </td>
                </tr>
                <tr>
                    <th>CONSOLIDATED PAY</th>
                    <td>

                    </td>
                </tr>
                <tr>
                    <th>LOAN PURPOSE</th>
                    <td>

                    </td>
                </tr>
                <tr>
                    <th>MONTHLY EXPENDITURE</th>
                    <td>

                    </td>
                </tr>
                <tr>
                    <th>NEW SACCO SAVINGS</th>
                    <td>

                    </td>
                </tr>
                <tr>
                    <th>INTEREST RATE</th>
                    <td>

                    </td>
                </tr>
                <tr>
                    <th>Monthly Repayment</th>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="info">
                        When you applied for this loan, you were also charged for these:
                    </td>
                </tr>
                <tr>
                    <th>Loan processing fee</th>
                    <td>

                    </td>
                </tr>
                <tr>
                    <th>Shares Bought</th>
                    <td>

                    </td>
                </tr>
                <tr>
                    <th>Insurance fee</th>
                    <td>

                    </td>
                </tr>
            </table>
            <h2 id="guarantorz">LOAN GUARANTORS
                <a href="<?= Url::to(['loan/add-guarantor', 'id' => $loan->loan_application_id]); ?>" data-toggle="modal" data-target="#add-guarantor" class="btn btn-info pull-right">
                    <i class='fa fa-pencil'></i> Appoint Guarantors</a>
            </h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>ASSIGNED AT</th>
                        <th>APPLICANT REMARKS</th>
                        <th>STATUS</th>
                        <TH>GUARANTOR REMARKS</TH>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $status=[1=>'Pending',2=>'Approved',3=>'rejected'];
                    $statuscolor=[1=>'danger',2=>'success',3=>'inverse'];
                    foreach ($loan->guarantors AS $guarantor) { ?>
                        <tr>
                            <td>
                                <?= $guarantor->assignedto->fullnames; ?>
                            </td>
                            <td><?= \Yii::$app->formatter->asDatetime($guarantor->created_at, "php:d-M-Y"); ?></td>
                            <td><?= $guarantor->createdby_remarks; ?></td>
                            <td>
                                <label class="label label-<?= $statuscolor[$guarantor->status_code] ?>">
                                <?= $status[$guarantor->status_code] ?>
                                </label>
                            </td>
                             <td>
                               <?= $guarantor->assignedto_remarks; ?> 
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <h2 id="supporting-docs">SUPPORTING DOCUMENTS
                <a class="btn btn-info pull-right" href="<?= Url::to(['uploads/upload','module'=>'loan/supporting-docs','ref'=>$id])?>" data-toggle="modal" data-target="#upload-document">
                <i class="fa fa-upload"></i> Upload Scanned Copy
            </a>
            </h2>
             <table class="table table-striped">
                <thead>
                    <tr>
                        <th>TYPE OF FILE</th>
                        <th>DESCRIPTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($loan->documents AS $doc) { ?>
                        <tr>
                            <td>
                                <a href="<?= MYSACCO_ATTACHMENTS_URL; ?>/<?= $doc->module_code.'/'.$doc->attachment; ?>">
                                <i class="fa fa-file-text"></i> <?= $doc->file_name; ?>
                                </a>
                            </td>
                            <td></td>
                         </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-lg-3">
        <ul class="list-group">
            
            
            <li class="list-group-item">
                <a href="#loan-detailz">
                    <i class="fa fa-file-text"></i>
                    Member Details
                </a>
            </li>
            
            <li class="list-group-item">
                <a href="#loan-detailz">
                    <i class="fa fa-file-text"></i>
                    Loan Details
                </a>
            </li>
            <li class="list-group-item">
                <a href="#guarantorz">
                    <i class="fa fa-user"></i>
                    Guarantors
                </a>
            </li>
            <li class="list-group-item">
                <a href="#supporting-docs">
                    <i class="fa fa-file-pdf-o"></i>
                    Supporting Documents
                </a>
            </li>
            
            <li class="list-group-item">
                <a href="#supporting-docs">
                    <i class="fa fa-file-pdf-o"></i>
                    Terms And Conditions
                </a>
            </li>
<!--            <li class="list-group-item">
                <a href="#">
                    <i class="fa fa-calendar"></i>
                    Payment Schedule
                </a>
            </li>
            <li class="list-group-item">
                <a href="#">
                    <i class="fa fa-clock-o"></i>
                    Activity Log
                </a>
            </li>-->
        </ul>
        <hr/>
<!--
        <ul class="list-group vertical-steps">
            <li class="list-group-item completed"><span>Submit Application.</span></li>
            <li class="list-group-item completed"><span>Guarantor 1 approves application.</span</li>
            <li class="list-group-item completed"><span>Guarantor 2 approved application.</span</li>
            <li class="list-group-item"><span>SACCO Officer approved application.</span</li>
            <li class="list-group-item"><span>Loan Disbursed.</span</li>
        </ul> -->
    </div>
</div>


<!-- Add Guaranators -->
<?php
Modal::begin([
    'options' => [
        'id' => 'add-guarantor',
        'tabindex' => false // important for Select2 to work properly
    ],
    'header' => '<h4 style="margin:0; padding:0">Add Guarantor</h4>',
]);
?>
<?= $this->render('/loan/_guarantor-form', ['model' => $newguarantor]); ?>
<?php Modal::end(); ?>
<!-- /Add Guarantors -->

<!-- Upload Scanned Copy -->
<div class="modal fade" id="upload-document" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

        </div>
    </div>
</div>
<!-- /Upload Scanned Copy -->
