<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">



    <?php # id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="id" name="id" class="form-control"  id="id" placeholder="id" value="<?php echo "$contacts[id]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # id ?>

    <?php # owner_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Owner_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="owner_id" name="owner_id" class="form-control"  id="owner_id" placeholder="owner_id" value="<?php echo "$contacts[owner_id]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # owner_id ?>

    <?php # type ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Type"); ?></label>
        <div class="col-sm-8">                    
            <input type="type" name="type" class="form-control"  id="type" placeholder="type" value="<?php echo "$contacts[type]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # type ?>

    <?php # title ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Title"); ?></label>
        <div class="col-sm-8">                    
            <input type="title" name="title" class="form-control"  id="title" placeholder="title" value="<?php echo "$contacts[title]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # title ?>

    <?php # name ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Name"); ?></label>
        <div class="col-sm-8">                    
            <input type="name" name="name" class="form-control"  id="name" placeholder="name" value="<?php echo "$contacts[name]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # name ?>

    <?php # lastname ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Lastname"); ?></label>
        <div class="col-sm-8">                    
            <input type="lastname" name="lastname" class="form-control"  id="lastname" placeholder="lastname" value="<?php echo "$contacts[lastname]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # lastname ?>

    <?php # birthdate ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Birthdate"); ?></label>
        <div class="col-sm-8">                    
            <input type="birthdate" name="birthdate" class="form-control"  id="birthdate" placeholder="birthdate" value="<?php echo "$contacts[birthdate]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # birthdate ?>

    <?php # tva ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Tva"); ?></label>
        <div class="col-sm-8">                    
            <input type="tva" name="tva" class="form-control"  id="tva" placeholder="tva" value="<?php echo "$contacts[tva]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # tva ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="order_by" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$contacts[order_by]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="status" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$contacts[status]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # status ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

