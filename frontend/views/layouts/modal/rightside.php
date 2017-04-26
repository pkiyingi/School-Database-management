<?php
/*
 * Modal Header
 */
?>
<div class="modal fade modal-aside horizontal right"
     id="<?= $id; ?>"
     role="dialog"
     aria-labelledby="<?= $id; ?>Label"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 id="uploadDocumentHeading" style="font-weight: bold;"><?= $title; ?></h4>
            </div>
            <div class="modal-body">
                <?= $content ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>