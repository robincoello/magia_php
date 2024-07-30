<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="_content">
    <input type="hidden" name="a" value="search_advancedOk">




    <?php # frase ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Frase"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="frase" class="form-control"  id="frase" placeholder="frase" value="">
        </div>	
    </div>
    <?php # frase ?>

    <?php # contexto ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Contexto"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="contexto" class="form-control"  id="contexto" placeholder="contexto" value="">
        </div>	
    </div>
    <?php # contexto ?>






    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
