<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="add_from_text">

    <?php # owner_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="txt"><?php _t("Full text"); ?></label>
        <div class="col-sm-8">
            <textarea class="form-control" name="txt" id="txt" rows="15">Thomas Van der Elst

149 Rue Meyerbeer
1180 Uccle
Bruxelles

inspiredvision2030@gmail.com</textarea>
        </div>	
    </div>
    <?php # /owner_id ?>




    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Analyze text"); ?>">
        </div>      							
    </div>      							

</form>
