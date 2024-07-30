<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="_content">
    <input type="hidden" name="a" value="deleteOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">



    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="id" name="id" class="form-control"  id="id" placeholder="id" value="<?php echo "$_content[id]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Frase"); ?></label>
        <div class="col-sm-8">                    
            <input type="frase" name="frase" class="form-control"  id="frase" placeholder="frase" value="<?php echo "$_content[frase]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Contexto"); ?></label>
        <div class="col-sm-8">                    
            <input type="contexto" name="contexto" class="form-control"  id="contexto" placeholder="contexto" value="<?php echo "$_content[contexto]"; ?>" disabled="" >
        </div>	
    </div>




    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Delete"); ?>">
        </div>      							
    </div>      							

</form>

