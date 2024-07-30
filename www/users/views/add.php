<?php include view("home", "header"); ?>




<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">
        <?php // include "izq.php"; ?>
    </div>

    <div class="col-sm-6 col-md-6 col-lg-6">
        <h1><?php _t("Add user"); ?></h1>


        <?php
        if ($_POST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <?php
        //  message('info', "Please, go to contacts to add a user in the sistem");
        ?>




        <form class="form-horizontal" action="index.php" method="post">            	    	
            <input type="hidden" name="c" id="c"  value="users">			    	
            <input type="hidden" name="a" id="a"  value="addOk">			    	





            <div class="form-group">
                <label class="control-label col-sm-2" for="contact_id"><?php _t("Company"); ?></label>
                <div class="col-sm-10">
                    <select class="form-control" name="contact_id">
                        <?php
                        foreach (contacts_list_by_type(1) as $key => $contact) {


                            $empresa = contacts_field_id("name", $contact['owner_id']);

                            $disabled = ( users_according_contact_id($contact['id']) ) ? " disabled " : "";

                            //if( ! users_according_contact_id($contact['id'])){
                            //  echo "<option value=\"$contact[id]\" >$contact[name], ". strtoupper($contact['lastname'])." ($empresa)</option>";
                            // }
                            echo "<option $disabled value=\"$contact[id]\" >$contact[name], " . strtoupper($contact['lastname']) . " ($empresa)</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>	




            <div class="form-group">
                <label class="control-label col-sm-2" for="rol"><?php _t("Rol"); ?></label>
                <div class="col-sm-10">
                    <select class="form-control" name="rol">
                        <?php
                        foreach (rols_list() as $key => $value) {
                            echo "<option value=\"$value[rol]\" >$value[rol]</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>	








            <div class="form-group">
                <label class="control-label col-sm-2" for="login"><?php _t("Login"); ?></label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="login" id='login' value="" placeholder="<?php _t("Login"); ?>">
                </div>
            </div>	



            <div class="form-group">
                <label class="control-label col-sm-2" for="password"><?php _t("New password"); ?></label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="password" id='password' value="" placeholder="<?php _t("password"); ?>">
                </div>
            </div>	





            <div class="form-group">
                <label class="control-label col-sm-2" for="email"><?php _t("Email"); ?></label>
                <div class="col-sm-10">
                    <input class="form-control" type="email" name="email" id='email' value="" placeholder="<?php _t("email"); ?>">
                </div>
            </div>	



            <?php
            /*
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
              </div> */
            ?>



            <div class="form-group">	
                <div class="col-sm-offset-2 col-sm-10" >
                    <input class="btn btn-primary active col-sm-2" type ="submit" value ="<?php _t("Save"); ?>">
                </div>	
            </div>

        </form>





    </div>

    <div class="col-sm-3 col-md-3 col-lg-3">
        <?php // include "izq.php";  ?>
    </div>

</div>



<?php include view("home", "footer"); ?>