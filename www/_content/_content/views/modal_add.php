<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalAdd_<?php echo $_content_item['id']; ?>">
    <?php echo "$l"; ?>
</button>


<div class="modal fade" id="myModalAdd_<?php echo $_content_item['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalAdd_<?php echo $_content_item['id']; ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalAdd_<?php echo $_content_item['id']; ?>Label"><?php _t("Add traslation"); ?></h4>
            </div>

            <div class="modal-body">
                <?php include "form_add_tr.php"; ?>
            </div>

        </div>
    </div>
</div>
