<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="_translations">
    <input type="hidden" name="a" value="addOk">

    <?php # content ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="content"><?php _t("Content"); ?></label>
        <div class="col-sm-8">
            <select  name="content" class="form-control" id="content">                                
                <?php _select("", "", array(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /content ?>

    <?php # language ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="language"><?php _t("Language"); ?></label>
        <div class="col-sm-8">
            <select  name="language" class="form-control" id="language">                                
                <?php _select("", "", array(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /language ?>

    <?php # translation ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="translation"><?php _t("Translation"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="translation" class="form-control" id="translation" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /translation ?>


    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
