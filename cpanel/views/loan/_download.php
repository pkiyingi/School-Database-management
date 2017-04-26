<?php

use common\models\loan\LoanApplication;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\member\LoggedInMember;
use common\models\User;
use common\models\loan\LoanApplicationDetails;
use common\models\member\BankAccount;
use yii\helpers\Url;

/*
 * Confirm loan submission
 */
 
// print_r($model);


$post = Yii::$app->request->post();
//User Details
//Bind submitted data to the model
$model->load($post);



$user = User::findOne(['username'=>$model['sacco_account_no']]);



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
$type_of_loan = $_POST['loan_type_id'];
$type = LoanApplicationDetails::getLoanTypeDetails($type_of_loan);

//The bank account
$selected_account = BankAccount::findOne(['bank_account_id' => $model->bank_account_id]);
//$schedule = LoanApplicationDetails::getLoanApplicationPaymentSchedule(25000000, 1.4, 25);


?>


<style>
    <link href="<?= MYSACCO_FRONTEND_URL; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= MYSACCO_FRONTEND_URL; ?>/css/custom.css" rel="stylesheet">
    html,body{
        background:#fff; 
    }
    table tr td{
        padding:5px;
    }
    tr:nth-child(odd) {
        background-color:red; 
    }
    table thead tr th{
        padding:7px;
        background:#1155aa;
        color:#fff;

    }
</style>



<h2 class="text-center">UGANDA REVENUE AUTHORITY STAFF COOPERATIVE<BR/>
	SAVINGS AND CREDIT SOCIETY LIMITED <BR>
	LOAN REFERENCE NO. <?PHP echo $model['reference_no']; ?> <BR>
    <small>Date Printed <?= date('Y-M-d'); ?></small>
</h2>


<table class="table table-bordered">
    <thead>
        <tr>
            <th colspan="4">
                PART A: MEMBER DETAILS
            </th>
            
        </tr>   
    </thead>
    <tbody>
	<tr>
	
	<td> NAME </td>
	<td> <?php echo $user->fullnames; ?></td>
	<td> ID NO:</td>
	<td> <?php echo $user->username; ?></td>
	</TR>
	
	
	<tr>
	
	<td> PHYSICAL ADDRESS </td>
	<td> <?php echo $user->physical_address; ?>  </td>
	<td> DATE OF BIRTH:</td>
	<td> <?php echo $user->date_of_birth; ?> </td>
	</TR>
	
	
	<tr>
	
	<td> HOME TELEPHONE NUMBER </td>
	<td> <?php echo $user->telephone1; ?>    </td>
	<td> MOBILE NUMBER:</td>
	<td> <?php echo $user->telephone2; ?> </td>
	</TR>
	
	
        
    </tbody>
</table>


<table class="table table-bordered">
    <thead>
        <tr>
            <th colspan="4">
                PART B: EMPLOYMENT / BENEFIT DETAILS
            </th>
            
        </tr>   
    </thead>
     <tbody>
	<tr>
	
	<td> Employment Status </td>
	<td> <?php echo $user->employment_type; ?> </td>
	<td> End Date of Contract</td>
	<td> </td>
	</TR>
	
	
	<tr>
	
	<td> Position held</td>
	<td> <?php echo $user->employment_position; ?> </td>
	<td> Purpose Of Loan</td>
	<td> <?php echo $model['loan_purpose']; ?> </td>
	</TR>
	
	
	<tr>
	
	<td> Amount Requested</td>
	<td> <?php echo $model['amount_requested']; ?></td>
	<td> Repayment Period (months)</td>
	<td> <?php  echo $model['repayment_period']; ?></td>
	</TR>
	
	
	
        
    </tbody>
</table>


<table class="table table-bordered">
    <thead>
        <tr>
            <th colspan="4">
                PART C: INCOME AND EXPENDITURE DETAILS
            </th>
            
        </tr>   
    </thead>
    <tbody>
	<tr>
	
	<td> Monthly Consolidated Pay (UGX) </td>
	<td> <?php  echo $model['consolidated_pay']; ?>  </td>
	<td> OTHER INCOME (AGGREGATE AND NET)</td>
	<td> <?php  echo $model['other_income']; ?></td>
	</TR>
	
	
	<tr>
	
	<td> Monthly expenditure </td>
	<td>  <?php  echo $model['monthly_expenditure']; ?> </td>
	<td> Proposed SACCO Savings</td>
	<td>  <?php  echo $model['new_sacco_savings']; ?> </td>
	</TR>
	
	
	<tr>
	
	<td> Monthly loan repayments from other financial institutions</td>
	<td> </td>
	<td> </td>
	<td> </td>
	</TR>
	
	
        
    </tbody>
</table>


<table class="table table-bordered">
    <thead>
        <tr>
            <th colspan="4">
                PART D: BANK ACCOUNT DETAILS
            </th>
            
        </tr>   
    </thead>
    <tbody>
	<tr>
	
	<td> A/c Name and Title </td>
	<td> <?php echo $model->bankAccounts->account_name; ?></td>
	<td> A/c Number</td>
	<td> <?php echo $model->bankAccounts->bank_account_no; ?></td>
	</TR>
	
	
	<tr>
	
	<td> Bank Branch</td>
		<td> <?php echo $model->bankAccounts->bank_branch; ?></td>
	<td> Bank Name</td>
		<td> <?php echo $model->bankAccounts->bank_name; ?></td>
	</TR>
    </tbody>
</table>



<table class="table table-bordered">
    <thead>
        <tr>
            <th colspan="4">
                 PART E: FORMAL DECLARATION
            </th>
            
        </tr>   
    </thead>
    <tbody>
	<tr>
	
	<td colspan=4> I Declare that iam in good helth and the the information i have given on this form is to the best of my knowledge and belief acculate
and full information. I understand that the provision of false information is fraud and that the saving and cooperation scheme may take appropriate action
if i am found to have deliberately provided false or misleading information	</td>
	
	</TR>
	
	
	
    </tbody>
</table>





<table class="table table-bordered">
    <thead>
        <tr>
            <th colspan="4">
               
				PART F: LENDER'S DETAILS
            </th>
            
        </tr>   
    </thead>
    <tbody>
	<tr><td colspan="4"> Name:	UGANDA REVENUE AUTHORITY STAFF SAVINGS AND CREDIT COOPERATIVE SOCIETY LIMITED</td></TR>
	<tr><td colspan="4"> Registered address : P.O BOX 7279 KAMPALA</td></TR>
		<tr><td colspan="4"> The Lender is a savings and Credit Co-operative Society registered under the Co-operative Societies ACT CAP 112 which
		governs the operation of this agreement</td></TR>
	
		
	
	
	
    </tbody>
</table>




<table class="table table-bordered">
    <thead>
        <tr>
            <th colspan="4">
                PART G: LOAN DETAILS
            </th>
            
        </tr>   
    </thead>
     <tbody>
	<tr>
	
	<td> Amount borrowed under loan agreement </td>
	<td> </td>
	<td> Process charge</td>
	<td> </td>
	</TR>
	
	
	<tr>
	
	<td> Insuarance Charge </td>
	<td> <?php echo $insurance; ?></td>
	<td> Interest Rate</td>
	<td> <?php echo ""; ?> </td>
	</TR>
	
	
	<tr>
	
	<td> Number of installments</td>
	<td> <?php echo ""; ?> </td>
	<td> Monthly repayment </td>
	<td> <?php echo ""; ?> </td>
	</TR>
	
	
        
    </tbody>
</table>


<table class="table table-bordered">
    <thead>
        <tr>
            <th colspan="4">
               PART H: TERMS OF THE AGREEMENT
            </th>
            
        </tr>   
    </thead>
    <tbody>
	<tr>
	
	<td colspan=4>  <ol>
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
                        </ol></td>
	
	</TR>
	
	
	
    </tbody>
</table>

<hr/>
<p>Authorized by: </p>
<p>Sign:______________________</p>
<p>Date: <?= date('Y-M-d') ?></p>

