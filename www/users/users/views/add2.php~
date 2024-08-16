<?php include view("home", "header"); ?>


<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">
        <?php include "izq.php"; ?>
    </div>
    <div class="col-sm-9 col-md-9 col-lg-9">
        <h1><?php _t("Add user"); ?></h1>


        <?php
        if ($_POST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <form class="form-horizontal" action="index.php" method="post">            	    	
            <input type="hidden" name="c" id="c"  value="users_add">			    	
            <input type="hidden" name="action" id="action"  value="add">			    	

            <div class="form-group">
                <label class="control-label col-sm-2" for="title"><?php _t("Estatus"); ?></label>
                <div class="col-sm-10">                                                
                    <select class="form-control" name="title" id="title">
                        <?php
                        foreach (users_titles_array() as $key => $value) {
                            // $selected = ($key == $detail_user["title"] ) ? " selected " : "";
                            echo '<option value="' . $key . '" >' . $value . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="name"><?php _t("Name"); ?></label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="name" id='name' value="" placeholder="<?php _t("Name"); ?>">
                </div>
            </div>	





            <div class="form-group">
                <label class="control-label col-sm-2" for="lastname"><?php _t("lastname"); ?></label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="lastname" id='lastname' value="" placeholder="<?php _t("Lastname"); ?>">
                </div>
            </div>	



            <div class="form-group">
                <label class="control-label col-sm-2" for="address"><?php _t("address"); ?></label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="address" id='address' value="" placeholder="<?php _t("Name"); ?>">
                </div>
            </div>	



            <div class="form-group">
                <label class="control-label col-sm-2" for="postcode"><?php _t("Postcode"); ?></label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="postcode" id='postcode' value="" placeholder="<?php _t("postcode"); ?>">
                </div>
            </div>	




            <div class="form-group">
                <label class="control-label col-sm-2" for="birthdate"><?php _t("birthdate"); ?></label>
                <div class="col-sm-10">
                    <input class="form-control" type="date" name="birthdate" id='birthdate' value="" placeholder="<?php _t("Name"); ?>">
                </div>
            </div>	



            <div class="form-group">
                <label class="control-label col-sm-2" for="login"><?php _t("login"); ?></label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="login" id='login' value="" placeholder="<?php _t("Name"); ?>">
                </div>
            </div>	



            <div class="form-group">
                <label class="control-label col-sm-2" for="password"><?php _t("New password"); ?></label>
                <div class="col-sm-10">
                    <input class="form-control" type="password" name="password" id='password' value="" placeholder="<?php _t("Name"); ?>">
                </div>
            </div>	





            <div class="form-group">
                <label class="control-label col-sm-2" for="email"><?php _t("email"); ?></label>
                <div class="col-sm-10">
                    <input class="form-control" type="email" name="email" id='email' value="" placeholder="<?php _t("Name"); ?>">
                </div>
            </div>	




            <div class="form-group">
                <label class="control-label col-sm-2" for="status"><?php _t("Estatus"); ?></label>
                <div class="col-sm-10">                                                
                    <select class="form-control" name="status" id="status">
                        <?php
                        foreach (users_status_array() as $key => $value) {
                            echo '<option value="' . $key . '">' . $value . '</option>';
                        }
                        ?>

                    </select>
                </div>
            </div>	



            <div class="form-group">	
                <div class="col-sm-offset-2 col-sm-10" >
                    <input class="btn btn-primary active col-sm-2" type ="submit" value ="<?php _t("Save"); ?>">
                </div>	
            </div>

        </form>		    	


    </div>



    <?php include view("home", "footer"); ?>