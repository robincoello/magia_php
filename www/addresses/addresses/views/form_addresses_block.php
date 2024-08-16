<form class="form-horizontal" action="index.php" method="post">
    <input type="hidden" name="c" value="addresses">
    <input type="hidden" name="a" value="ok_addresses_block">        
    <input type="hidden" name="address_id" value="<?php echo $address['id']; ?>">        
    <input type="hidden" name="id" value="<?php echo $id; ?>">        
    <input type="hidden" name="redi" value="1">        

    <div class="form-group">
        <label class="control-label col-sm-0" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-primary"><?php _t("Block"); ?></button>
        </div>      							
    </div>   

</form>

