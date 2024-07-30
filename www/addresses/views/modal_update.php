<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalDelivery">
    <?php _t("Change"); ?>
</button>
<?php icon('new-window'); ?>

<!-- Modal -->
<div class="modal fade" id="myModalDelivery" tabindex="-1" role="dialog" aria-labelledby="myModalDeliveryLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalDeliveryLabel">
                    <?php _t('Change delivery address'); ?>
                </h4>
            </div>
            <div class="modal-body">

                <p><?php _t("Please choose an address"); ?></p>



                <?php
                include "form_update.php";
                ?>


            </div>





        </div>
    </div>
</div>