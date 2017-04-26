<?php

use common\models\loan\LoanApplication;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\member\LoggedInMember;
use common\models\loan\LoanApplicationDetails;
use common\models\member\BankAccount;
use yii\helpers\Url;

/*
 * Confirm loan submission
 */

$post = Yii::$app->request->post();
//User Details
//Bind submitted data to the model




$user = new LoggedInMember();
$member = $user->member_details;
//Period
$period = $model->repayment_period;
//CALCULATIONS
$amount_asked = $model->amount_requested;
//Insurance
$insurance = (0.01 * $amount_asked);

//Share Contribution
$share_contribution = (0.02 * $amount_asked);
//Shares bought
$shares_bought = ($share_contribution / 30000);
//Total Interest
$total_interest = (0.14 / 12) * $amount_asked * $period;

//Loan Type
$type_of_loan = $model->loan_type_id;


$type = LoanApplicationDetails::getLoanTypeDetails($type_of_loan);

//The bank account
$selected_account = BankAccount::findOne(['bank_account_id' => $model->bank_account_id]);
//$schedule = LoanApplicationDetails::getLoanApplicationPaymentSchedule(25000000, 1.4, 25);

$this->title = "LOAN APPLICATION DETAILS";
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
</style>
<?php 

//print_r($model); exit();
$form = ActiveForm::begin(['action' => Url::to(['loan/confirm', 'id' => $model->loan_application_id])]); ?>
<div class="row" style="margin-top:60px;">
    <div class="col-lg-12">
        <div class="letter">
            <div class="heading text-center">
                <img src="<?= MYSACCO_BASEURL; ?>/images/logo.png" style="height:90px;" class="text-center">
                <br/>
                <h3>UGANDA REVENUE AUTHORITY STAFF COOPERATIVE SAVINGS AND CREDIT SOCIETY LIMITED</h3>
                <h3 style='color:#003'>LOAN APPLICATION NO: <?php echo $model->reference_no ?></h3>
                <p class='desc'>This is a preview of your application. You have not yet submitted this loan application. Please scroll down to submit this application.</p>
            </div>
            <h3>MEMBER DETAILS</h3>
            <h2 style="font-weight: 700;color:#069;border-bottom: 4px solid #ccc;">Profile Information</h2>

            <table class="table table-striped">
                <tr>
                    <th>
                        FULL NAME
                    </th>
                    <td><?= $member->firstname . ' ' . $member->lastname; ?></td>
                </tr>
                <tr>
                    <th>
                        ID NUMBER
                    </th>
                    <td><?= $member->username ?></td>
                </tr>
                <tr>
                    <th>
                        PHYSICAL ADDRESS
                    </th>
                    <td><?= $member->physical_address; ?></td>
                </tr>
                <tr>
                    <th>
                        DATE OF BIRTH
                    </th>
                    <td><?= $member->date_of_birth; ?></td>
                </tr>
                <tr>
                    <th>
                        TELEPHONE NO.
                    </th>
                    <td><?= $member->telephone1; ?></td>
                </tr>
                <tr>
                    <th>
                        TELEPHONE NO (ALTERNATIVE)
                    </th>
                    <td><?= $member->telephone2; ?></td>
                </tr>
            </table>
            <h2 style="font-weight: 700;color:#069;border-bottom: 4px solid #ccc;">Employment Details</h2>
            <table class="table table-striped">
                <tr>
                    <th>
                        EMPLOYMENT TYPE.
                    </th>
                    <td><?= $member->employment_type; ?></td>
                </tr>
                <tr>
                    <th>
                        POSITION HELD.
                    </th>
                    <td><?= $member->employment_position; ?></td>
                </tr>
            </table>

            <h2 style="font-weight: 700;color:#069;border-bottom: 4px solid #ccc;">Loan Details</h2>      
            <div class="row">
                <div class="col-lg-8">
                    <table class="table table-striped">
                        <tr>
                            <th>
                                TYPE OF LOAN
                            </th>
                            <td>

                                <?= $form->field($model, 'loan_type_id')->hiddenInput(['value' => $type_of_loan])->label(false);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                PURPOSE OF LOAN
                            </th>
                            <td>
                                <?=
                                $model->loan_purpose
                                ?>

                                <?= $form->field($model, 'loan_purpose')->hiddenInput()->label(false);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                AMOUNT REQUESTED
                            </th> 
                            <td>
                                <?=
                                number_format($model->amount_requested, 2)
                                ?>

                                <?= $form->field($model, 'amount_requested')->hiddenInput()->label(false);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                REPAYMENT PERIOD
                            </th>
                            <td>
                                
                                
                                <?= $form->field($model, 'repayment_period')->hiddenInput()->label(false);
                                ?> months

                                <?= $form->field($model, 'repayment_period')->hiddenInput()->label(false);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                MONTHLY CONSOLIDATED PAY  
                            </th>
                            <td>
                                <?= number_format($model->consolidated_pay, 2)
                                ?>

                                <?= $form->field($model, 'consolidated_pay')->hiddenInput()->label(false);
                                ?>
                            </td>
                        </tr>
                        <?php if (intval($model->other_income) > 0) { ?>
                            <tr>
                                <th>
                                    OTHER INCOME
                                </th>
                                <td>
                                    <?= number_format($model->other_income, 2)
                                    ?>

                                    <?= $form->field($model, 'other_income')->hiddenInput()->label(false);
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <th>
                                MONTHLY EXPENDITURE
                            </th>
                            <td>
                                <?=
                                number_format($model->monthly_expenditure, 2)
                                ?>

                                <?= $form->field($model, 'monthly_expenditure')->hiddenInput()->label(false);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                PROPOSED SACCO SAVINGS
                            </th>
                            <td>
                                <?= number_format($model->new_sacco_savings, 2) ?>

                                <?= $form->field($model, 'new_sacco_savings')->hiddenInput()->label(false);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                MONTHLY LOAN REPAYMENTS
                            </th>
                            <td>
                                <?=
                                number_format($model->monthly_repayment, 2);
                                ?>

                                <?= $form->field($model, 'monthly_repayment')->hiddenInput()->label(false);
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="col-lg-4 well" style="border-radius: 0px;background: #a6e1ec; border:1px solid #ccc;">
                    <table class="table table-striped">
                        <tr>
                            <th>PROCESS FEE</th>
                            <td>
                                20,000.00
                            </td>
                        </tr>
                        <tr>
                            <th>INSURANCE CHARGE</th>
                            <td>
                                <?= number_format($insurance, 2); ?> 
                            </td>
                        </tr>
                        <tr>
                            <th>SHARE CONTRIBUTION</th>
                            <td>
                                <?= number_format($share_contribution, 2); ?> 
                            </td>
                        </tr>
                        <tr>
                            <th>SHARES BOUGHT</th>
                            <td>
                                <?= number_format($shares_bought, 2); ?> 
                            </td>
                        </tr>
                        <tr>
                            <th>INTEREST RATE</th>
                            <td>14% per annum</td>
                        </tr>
                        <tr>
                            <th>TOTAL INTEREST</th>
                            <td><?= number_format($total_interest, 2); ?> </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="letter" style="margin-top:10px;">
            <h2 style="font-weight: 700;color:#069;border-bottom: 4px solid #ccc;">BANK ACCOUNT DETAILS</h2>

            <table class="table table-striped">
                <tr>
                    <th>
                        ACCOUNT TITLE/NAME
                    </th>
                    <td>
                        <?= $selected_account['account_name'] ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        ACCOUNT NUMBER
                    </th>
                    <td>
                        <?= $selected_account['bank_account_no'] ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        BANK BRANCH
                    </th> 
                    <td>
                        <?= $selected_account['bank_branch'] ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        BANK NAME
                    </th> 
                    <td>
                        <?= $selected_account['bank_name'] ?>
                    </td>
                </tr>
            </table>
        </div>
        <p class="text-center">By submitting this Loan Application, you are agreeing to the<button type="button" class="btn-link" data-toggle="modal" data-target=".bs-example-modal-lg">TERMS AND CONDITIONS</button>

            You also have to accept the condition below
        </p>
        <hr/>
        <p class='text-justify'><input type="checkbox" id="accept_loan_terms" name="i_accept">
            I declare that I am in good health and that I declare that the information I have given on this form is, to the best of my knowledge and belief, accurate and full information. I understand that the provision of false information is fraud and that the saving & credit scheme may take appropriate action if I am found to have deliberately provided false or misleading information
        </p>

        <div style="width: 300px; margin: 0 auto; display: none" id='terms-accepted'>
            <?= Html::submitButton($model->isNewRecord ? 'Submit Loan Application' : 'Submit Updated Details', ['class' => $model->isNewRecord ? 'btn btn-success btn-lg' : 'btn btn-primary btn-lg']) ?>
        </div>
        <!--Body -->
        <div style="display: none;" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">TERMS AND CONDITIONS</h4>
                    </div>
                    <div class="modal-body">
                        <ol>
                            <li>The Lender will lend and the Borrower acknowledges that they have received, the sum borrowed under this agreement. The Borrower will repay the Loan (i.e. the Total Amount Owing) by the repayments set out in the loan details above.
                            </li>
                            <li>Interest will be charged monthly on the unpaid balance of the Loan and any unpaid interest at the rate set out in the Loan details above.
                            </li>
                            <li>The Borrower has the right to settle the Agreement early at any time by paying in full the balance of the Loan and any unpaid interest outstanding. The Lender will, on request, provide the Borrower with a written statement of the sums which have been paid and which remain outstanding under the agreement.
                            </li>
                            <li>The Borrower acknowledges that the details given on the Loan Application for this agreement are correct and will inform the Lender immediately of any change in financial circumstances which may reduce their ability to repay the Loan or of any change in their address
                            </li>
                            <li>If the Borrower fails to pay any amount due to the Lender under this agreement, or breaches any of its terms, the Lender has the right to demand early repayment of all or part of the balance of the Loan outstanding, together with any unpaid interest. The Lender will give the Borrower written notice not less than seven days before taking any action to recover any such sum. 
                            </li>
                            <li>If the Borrower misses any payments into their saving accounts, their saving will be transferred to pay off the existing loan balance and if at this stage your savings are insufficient to clear the loan the debt will be offset from terminal benefit, transferred to a debt collector, or court action will be taken.
                            </li>
                            <li>The Borrower will be liable for any costs the Lender incurs in recovering sums due under the Agreement.
                            </li>
                            <li>Any Guarantor under this agreement will be responsible to look for the borrower or be liable for sums due under it which the Borrower fails to pay.
                            </li>
                        </ol>
                    </div>
                    <div class="modal-footer" style="background: #ccc;">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    <div>
        <?php
        //Bank ID
        echo $form->field($model, 'bank_account_id')->hiddenInput(['value' => $model->bank_account_id])->label(false);
        if ($model->isNewRecord) {
            echo $form->field($model, 'submitted_date')->hiddenInput(['value' => time()])->label(false);
            echo $form->field($model, 'status_code')->hiddenInput(['value' => 'PENDING APPROVAL'])->label(false);
            echo $form->field($model, 'created_date')->hiddenInput(['value' => time()])->label(false);
            echo $form->field($model, 'created_by')->hiddenInput(['value' => $member->id])->label(false);
            echo $form->field($model, 'sacco_account_no')->hiddenInput(['value' => $member->username])->label(false);
        } else {
            echo $form->field($model, 'update_date')->hiddenInput(['value' => time()])->label(false);
            echo $form->field($model, 'updated_by')->hiddenInput(['value' => $member->id])->label(false);
        }
        ?>
    </div>
</div>
<?php ActiveForm::end(); ?>

<script>
    $(document).ready(function () {
        $('#accept_loan_terms').change(function () {
            if (this.checked) {
                $('#terms-accepted').fadeIn('slow');
            } else {
                $('#terms-accepted').fadeOut('slow');
            }
        });
    });
</script>