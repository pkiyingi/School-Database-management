<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\LoggedInMember;
use common\models\SaccoManagerDropdowns;

//User Details
$user = new LoggedInMember();
$member = $user->member_details;
$bank_accounts = $user->bank_accounts;
//Plots for sale
$lands = SaccoManagerDropdowns::getAvailableLandForSale();
?>
<?php $form = ActiveForm::begin(['action' => 'index.php?r=loan/confirm']); ?>
<table>
    <tr>
        <td>
            
        </td>     
    </tr>
</table>
<?php ActiveForm::end(); ?>
