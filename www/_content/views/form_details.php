<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="_content">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">



    <?php # id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="id" name="id" class="form-control"  id="id" placeholder="id" value="<?php echo "$_content[id]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # id ?>

    <?php # frase ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Frase"); ?></label>
        <div class="col-sm-8">                    
            <input type="frase" name="frase" class="form-control"  id="frase" placeholder="frase" value="<?php echo "$_content[frase]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # frase ?>

    <?php # contexto ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Contexto"); ?></label>
        <div class="col-sm-8">                    
            <input type="contexto" name="contexto" class="form-control"  id="contexto" placeholder="contexto" value="<?php echo "$_content[contexto]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # contexto ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

