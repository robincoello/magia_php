<?php include view("home", "header"); ?> 

<form class="form-horizontal" action ="index.php" method ="post" >
    <input type="hidden" name="c" value="registration"> 
    <input type="hidden" name="action" value="registre"> 

    <h2><?php _t("Registration"); ?></h2>


    <?php
    if ($_REQUEST && $action == "registre") {
        foreach ($error as $key => $value) {
            message("info", "$value");
        }
    }
    ?>

    <div class="form-group">	    	
        <label class="control-label col-sm-3" for="title"><?php _t("Salutation"); ?></label>
        <div class="col-sm-8">	    		
            <select class="form-control" name="title" id="title">
                <?php
                foreach (users_titles_array() as $key => $value) {
                    echo '<option value="' . $key . '">' . _tr("$value") . '</option>';
                }
                ?>

            </select>
        </div>	
    </div>	



    <div class="form-group">	    	
        <label class="control-label col-sm-3" for="lastname"><?php _t("Lastname"); ?></label>
        <div class="col-sm-8">	    		
            <input class="form-control" type ="text " name ="lastname" id=" nom " placeholder="<?php _t("Coello"); ?>"/>
        </div>	
    </div>	


    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?php _t("Name"); ?></label>
        <div class="col-sm-8">	    		
            <input class="form-control" type ="text" name ="name" id="name" placeholder="<?php _t("Robinson"); ?>"/>
        </div>
    </div>



    <div class="form-group">
        <label class="control-label col-sm-3" for="address"><?php _t("address"); ?></label>	
        <div class="col-sm-8">    	
            <input class="form-control" type ="text" name ="address" id="address" placeholder="<?php _t("Av Louise 236"); ?>"/>
        </div>	
    </div>	

    <div class="form-group">
        <label class="control-label col-sm-3" for="postcode"><?php _t("Postal code"); ?></label>
        <div class="col-sm-8">	    		
            <input class="form-control" type ="text" name ="postcode" id="postcode" placeholder="<?php _t("1050"); ?>"/>
        </div>	
    </div>




    <div class="form-group">
        <label class="control-label col-sm-3" for="y"><?php _t("Year"); ?></label>
        <div class="col-sm-8">	    		
            <select class="form-control" name="y" id="y">
                <?php year_add(); ?>
            </select>
        </div>	
    </div>




    <div class="form-group">
        <label class="control-label col-sm-3" for="m"><?php _t("Month"); ?></label>
        <div class="col-sm-8">	    		
            <select class="form-control" name="m" id="m">
                <?php month_add(); ?>
            </select>
        </div>	
    </div>




    <div class="form-group">
        <label class="control-label col-sm-3" for="d"><?php _t("Day"); ?></label>
        <div class="col-sm-8">	    		
            <select class="form-control" name="d" id="d">
                <?php day_add(); ?>
            </select>
        </div>	
    </div>



    <div class="form-group">
        <label class="control-label col-sm-3" for="email"><?php _t("Email"); ?></label>	
        <div class="col-sm-8">    		
            <input class="form-control" type ="text" name ="email" id="email" placeholder="<?php _t("robin"); ?>"/>
        </div>	
    </div>


    <div class="form-group">
        <label class="control-label col-sm-3" for="login"><?php _t("Your Login"); ?></label>	
        <div class="col-sm-8">    		
            <input class="form-control" type ="text" name ="login" id="login" placeholder="<?php _t("robin"); ?>"/>
        </div>	
    </div>


    <div class="form-group">
        <label class="control-label col-sm-3" for="password"><?php _t("Your Password"); ?></label>	
        <div class="col-sm-8">    		
            <input class="form-control" type ="password" name ="password" id="password"placeholder="<?php _t("Letres and numbers"); ?>"/>
            <p>Use: lowercase, CAPITAL letters and numbers</p>
        </div>	
    </div>


    <div class="form-group">
        <input class="btn btn-primary active" type ="submit" value ="Valider"> 
    </div>	

</form>

<?php include view("home", "footer"); ?> 