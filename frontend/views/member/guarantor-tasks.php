<?php
/*
 * All Guarantor tasks
 */
$this->title = "Guarantor Tasks";
?>

<table class="table table-stripped">
    <thead>
        <tr>
            <th>
                FROM
            </th>
            <th>
                LOAN REF. NO
            </th>
            <TH>
                DATE
            </TH>
            <th>MESSAGE</th>
            <TH>
                STATUS
            </TH>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tasks AS $task) { ?>
            <tr>
                <th><?= $task->createdBy->fullnames; ?></th>
                <td><a href="<?= $task->loan->loan_application_id ?>"><?= $task->loan->reference_no; ?></a></td>
                <td><?= \Yii::$app->formatter->asDatetime($task->created_at, "php:d-M-Y"); ?></td>
                <td>
                    <?= $task->createdby_remarks; ?>
                </td>
                <td><?= ($task->status_code==1)?('Pending Approval'):('Approved'); ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>