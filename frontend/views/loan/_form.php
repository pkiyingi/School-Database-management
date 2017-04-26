<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\member\LoggedInMember;
use common\models\SaccoManagerDropdowns;
use common\models\loan\LoanProduct;

//User Details
$user = new LoggedInMember();
$member = $user->member_details;
$bank_accounts = $user->bank_accounts;
//Plots for sale
$lands = SaccoManagerDropdowns::getAvailableLandForSale();
$loanproducts = SaccoManagerDropdowns::getLoanProducts();
?>
<?php $form = ActiveForm::begin(['action' => 'index.php?r=loan/confirm']); ?>
<script type="text/javascript">
    function configureDropDownLists(ddl1, ddl2) {
        //Hidden Div
        var hiddenDiv = document.getElementById("land_bought");

        switch (ddl1.value) {
            case '1':
                ddl2.options.length = 0;
                for (i = 1; i < 5; i++) {
                    createOption(ddl2, i, i);
                }
                //Hide detail of the land
                hiddenDiv.style.display = "none";
                break;

            case '2':
                ddl2.options.length = 0;
                for (i = 1; i < 13; i++) {
                    createOption(ddl2, i, i);
                }
                //Hide detail of the land
                hiddenDiv.style.display = "none";

                break;

            case '3':
                ddl2.options.length = 0;
                for (i = 1; i < 37; i++) {
                    createOption(ddl2, i, i);
                }
                //Hide detail of the land
                hiddenDiv.style.display = "none";

                break;
            case '4': //land loan
                ddl2.options.length = 0;
                for (i = 1; i < 37; i++) {
                    createOption(ddl2, i, i);
                }
                //Show detail of the land
                hiddenDiv.style.display = "";
                break;

            case '5':
                ddl2.options.length = 0;
                for (i = 1; i < 49; i++) {
                    createOption(ddl2, i, i);
                }
                //Hide detail of the land
                hiddenDiv.style.display = "none";
                break;
        }

    }

    function createOption(ddl, text, value) {
        var opt = document.createElement('option');
        opt.value = value;
        opt.text = text;
        ddl.options.add(opt);
    }
</script>
<div class="panel-group">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapse1">Personal Information</a>
            </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-4 alert alert-info" style="border-radius: 0px;">
                        <h2 style="font-weight: 700;color:#eee;border-bottom: 4px solid yellow;">PERSONAL INFORMATION</h2>
                        <div class="#">
                            In this step, we ask for your personal information. 
                            <br/>
                            If this information is not correct please click the button below to update your personal information.
                            <br/>
                            <a href="#" class="btn btn-block btn-default">Update Personal Info</a>
                        </div>
                    </div>
                    <div class="col-lg-8 well" style="background: #fff;border-radius: 0">
                        <h3>YOUR PERSONAL DETAILS</h3>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="step-1">
    <div class="row">


    </div>
</div>
<div id="step-2">
    <div class="row">
        <div class="col-lg-4 alert alert-info" style="border-radius: 0px;">
            <h2 style="font-weight: 700;color:#eee;border-bottom: 4px solid yellow;">LOAN DETAILS</h2>
            <div class="#">
                In this step, please specify the loan details. If you are not sure, this is the information needed:
                <br/>
                <ul>
                    <li>
                        <b>AMOUNT REQUESTED:</b> How much do you want? 
                    </li>
                    <li>
                        <b>BANK ACCOUNT:</b> You need to select the bank account to which this money will be put. If you don't see it in the list, please <a href="#">add it from here</a>
                    </li>
                    <li>
                        <B>CONSOLIDATED PAY:</B> Your Gross Salary before it is taxed (UGX)
                    </li>
                    <li>
                        <b>MONTHLY EXPENDITURE:</b> Your monthly expenditure (UGX) is an approximation of the average amount of money you spend on your family each month
                    </li>
                </ul>
                <br/>
            </div>
        </div>
        <div class="col-lg-8 well" style="background: #fff;border-radius: 0">
            <h3>LOAN DETAILS</h3>
            <h2 style="font-weight: 700;color:#069;border-bottom: 4px solid #ccc;">Profile Information</h2>

            <table class="table table-striped">
                <tr>
                    <td>
                        <b>Type of Loan</b><br/>
                        
						
						<?=
                        Html::activeDropDownList($model, 'loan_type_id', ArrayHelper::map($loanproducts, 'id', 'account_id'), 
						['prompt' => 'Select Type of Loan',
                            'class' => 'form-control',
							'onchange' => "configureDropDownLists(this, document.getElementById('ddl2'))"])
                        ?>
						
                       <?php
						/* echo Html::dropDownList('loan_type_id', 'loan_type_id', array(
                            'Emergency Loans' => array(
                                '1' => 'Quick Loan (Up to 4 months, Max 2M)',
                                '2' => 'Short Term Loan (Up to 12 months)',
                            ),
                            'Development Loans' => array(
                                '3' => 'Medium Term Loan (Up to 3 years)',
                                '4' => 'Land Loan (Up to 3 years)',
                                '5' => 'Long term loans (Up to 4 years)',
                            ),
                                ), ['class' => 'form-control',
                            'prompt' => 'Select Type of Loan',
                            'id' => 'ddl',
                            'onchange' => "configureDropDownLists(this, document.getElementById('ddl2'))"
                        ]);*/
                        ?>
                    </td>     
                    <td>
                        <?= $form->field($model, 'amount_requested')->textInput(['maxlength' => 10]) ?>
                    </td>
                    <td>  
                        <b>Bank Account</b><br/>
                        <?=
                        Html::activeDropDownList($model, 'bank_account_id', ArrayHelper::map($user->bank_accounts, 'bank_account_id', 'my_account_no'), ['prompt' => 'Select a Bank Account',
                            'class' => 'form-control'])
                        ?>
                    </td>
                </tr>
                <tr id="land_bought" style="display: none">
                    <th class="info">DETAILS OF THE LAND<br/>
                        <i style="font-size: 80%;font-weight: 200;">Please specify the details (location and number of plots) of the land you are buying</i>
                    </th>
                    <td><b>Land Location</b><br/>
                        <?=
                        Html::activeDropDownList($model, 'land_id', ArrayHelper::map($lands, 'land_id', 'name'), ['prompt' => 'Select land Location',
                            'class' => 'form-control'])
                        ?>
                    </td>
                    <td>
                        <?= $form->field($model, 'number_of_plots')->textInput(['maxlength' => 10]) ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Repayment Period</b><br/>
                        <select id="ddl2" class="form-control" name="repayment_period">
                        </select> 
                    </td>
                    <td>
                        <?= $form->field($model, 'consolidated_pay')->textInput(['maxlength' => 10]) ?>
                    </td>
                    <td>
                        <?= $form->field($model, 'other_income')->textInput(['maxlength' => 2000]) ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?= $form->field($model, 'monthly_expenditure')->textInput(['maxlength' => 10]) ?>
                    </td>
                    <td>
                        <?= $form->field($model, 'new_sacco_savings')->textInput(['maxlength' => 10]) ?>
                    </td>
                    <td>
                        <?= $form->field($model, 'other_loan_repayments')->textInput(['maxlength' => 10]) ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <?= $form->field($model, 'loan_purpose')->textArea(['maxlength' => 2000, 'rows' => 1]) ?>         
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2">
                        <?= Html::submitButton($model->isNewRecord ? 'Preview Application' : 'Preview Application', ['class' => $model->isNewRecord ? 'btn btn-success btn-block' : 'btn btn-primary btn-block']) ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
