
<button type="button" 
        class="btn btn-primary btn-sm" 
        data-toggle="modal" 
        data-target="#addresses_block_<?php echo $address['id']; ?>">
    <span class="glyphicon glyphicon-lock"></span>
    <?php _t("Block"); ?>
</button>


<div class="modal fade" id="addresses_block_<?php echo $address['id']; ?>" 
     tabindex="-1" role="dialog" aria-labelledby="addresses_block_<?php echo $address['id']; ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="addresses_block_<?php echo $address['id']; ?>Label">
                    <?php _t("Bloc address"); ?> <?php echo $address['id']; ?> 
                </h4>
            </div>
            <div class="modal-body">

                <h3><?php _t("Are you sure?"); ?></h3>

                <p>
                    <?php _t("When blocking an address, it cannot be used in orders, invoices, credit notes or any other document"); ?>
                </p>

                <p>
                    <?php _t("There will be no changes to documents created before the lock"); ?>
                </p>

                <?php
                include "form_addresses_block.php";
                ?>        
            </div>        
        </div>
    </div>
</div>