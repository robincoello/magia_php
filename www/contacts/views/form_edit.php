<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="editOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">



    <?php # owner_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="owner_id"><?php _t("Owner_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="owner_id" class="form-control"  id="owner_id" placeholder="owner_id" value="<?php echo "$contacts[owner_id]"; ?>" >
        </div>	
    </div>
    <?php # /owner_id ?>

    <?php # type ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="type"><?php _t("Type"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="type" class="form-control"  id="type" placeholder="type" value="<?php echo "$contacts[type]"; ?>" >
        </div>	
    </div>
    <?php # /type ?>

    <?php # title ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="title"><?php _t("Title"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="title" class="form-control"  id="title" placeholder="title" value="<?php echo "$contacts[title]"; ?>" >
        </div>	
    </div>
    <?php # /title ?>

    <?php # name ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Name"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="name" class="form-control"  id="name" placeholder="name" value="<?php echo "$contacts[name]"; ?>" >
        </div>	
    </div>
    <?php # /name ?>

    <?php # lastname ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="lastname"><?php _t("Lastname"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="lastname" class="form-control"  id="lastname" placeholder="lastname" value="<?php echo "$contacts[lastname]"; ?>" >
        </div>	
    </div>
    <?php # /lastname ?>

    <?php # birthdate ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="birthdate"><?php _t("Birthdate"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="birthdate" class="form-control"  id="birthdate" placeholder="birthdate" value="<?php echo "$contacts[birthdate]"; ?>" >
        </div>	
    </div>
    <?php # /birthdate ?>

    <?php # tva ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="tva"><?php _t("Tva"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="tva" class="form-control"  id="tva" placeholder="tva" value="<?php echo "$contacts[tva]"; ?>" >
        </div>	
    </div>
    <?php # /tva ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$contacts[order_by]"; ?>" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$contacts[status]"; ?>" >
        </div>	
    </div>
    <?php # /status ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

