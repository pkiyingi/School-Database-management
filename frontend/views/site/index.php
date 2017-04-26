<?php

use miloschuman\highcharts\Highcharts;
use common\models\User;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;

//The logged in member


$user_id = Yii::$app->user->id;
$user = User::findOne($user_id);

/*

$user = new LoggedInMember();

//Account History
$history = $user->account_history;

$this->title = "Welcome";
$savings = $user->getTotalSavings();
$loan = $user->getLoanBalance();
$shares_amount = $user->getTotalShareValue();
$shares_number = ($shares_amount / 30000)
*/


                    $status=[1=>'Submited',2=>'Processing',3=>'Approved',4=>'Rejected'];
                    $statuscolor=[1=>'primary',2=>'success',3=>'success',4=>'danger'];
?>

<div class="row">
        <h2 style="border-bottom: 4px solid #ccc; font-weight: bold;">PENDING APPLICATIONS
            <a href="#" class="btn btn-dark pull-right">
                <span class="fa fa-external-link"></span>
                ALL TRANSACTIONS</a>
        </h2>
        <table class="table table-striped">
            <thead>
                <tr>
				    <th>APPLICATION TYPE</th>
                    <th>DATE</th>
                    <th>AMOUNT</th>
                    <th>STATUS</th>
					<th></th>
					<th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($user->userrequests AS $activity) {
                    
                  //  print_r($activity->applicationtype->requestName); exit();
                    ?>
                    <tr>
                        <td>
                            <?= $activity->applicationtype->requestName; ?>
                        </td>
						<td>
                            <?= $activity['created_at']; ?>
                        </td> 						
                        <td>
                            UGX <?= number_format($activity['amount_applied'], 2); ?>
                        </td> 
                        <td>
                            
                            <label class="label label-<?= $statuscolor[$activity['status']] ?>">
                                <?= $status[$activity['status']] ?>
                                </label>
                        </td>
                        <th>
                            
							
                        </th>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
</div>