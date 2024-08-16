<?php include view("home", "header"); ?>


<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">
        <?php include "izq.php"; ?>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <h1><?php echo _t("User details"); ?></h1>





        <form>


            <div class="form-group">
                <label for="">ID</label>
                <input type="text"  class="form-control" id="" placeholder="" value="<?php echo "$user[id]"; ?>" disabled="">
            </div>



            <div class="form-group">
                <label for=""><?php _t("contact_id"); ?></label>
                <input type="text"  class="form-control" id="" placeholder="" value="<?php echo "$user[contact_id]"; ?>" disabled="">
            </div>



            <div class="form-group">
                <label for=""><?php _t("rol"); ?></label>
                <input type="text"  class="form-control" id="" placeholder="" value="<?php echo "$user[rol]"; ?>" disabled="">
            </div>



            <div class="form-group">
                <label for=""><?php _t("login"); ?></label>
                <input type="text"  class="form-control" id="" placeholder="" value="<?php echo "$user[login]"; ?>" disabled="">
            </div>



            <div class="form-group">
                <label for=""><?php _t("password"); ?></label>
                <input type="text"  class="form-control" id="" placeholder="" value="***" disabled="">
            </div>

            <div class="form-group">
                <label for=""><?php _t("email"); ?></label>
                <input type="text"  class="form-control" id="" placeholder="" value="<?php echo "$user[email]"; ?>" disabled="">
            </div>



            <button type="submit" class="btn btn-default">Submit</button>
        </form>






        <h2><?php _t("Connections"); ?></h2>

        <h3><?php echo (logs_total_by_user_id_x_days($user['id'], 0)); ?> connections today</h3>
        <h3><?php echo (logs_total_by_user_id_x_days($user['id'], 7)); ?> connections last 7 days</h3>
















    </div>




    <?php include view("home", "footer"); ?>