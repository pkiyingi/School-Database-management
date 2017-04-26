<?php

/* 
 *Profile information
 */
$member = Yii::$app->user->identity;
?>
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
