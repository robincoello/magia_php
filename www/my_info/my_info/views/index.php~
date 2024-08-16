<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("my_info", "izq"); ?>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php //include view("my_info", "izq"); ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <?php //include view("my_info", "nav"); ?>      

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1>
            <?php
            //  echo contacts_picture($u_id);
            ?> 
            <?php _t("My info"); ?>
        </h1>




        <?php include "form_my_info.php"; ?>





        <?php if (modules_field_module('status', 'gallery')) { ?>
            <?php
            echo contacts_picture($u_id, 150);
            ?> 
            <hr>



            <form enctype="multipart/form-data" method="post" action="index.php">

                <input type="hidden" name="c" value="gallery">
                <input type="hidden" name="a" value="ok_pic_user_add">    
                <input type="hidden" name="contact_id"  value="<?php echo $u_id; ?>">
                <input type="hidden" name="redi" value="2">


                <div class="form-group">
                    <label for="file"><?php _t("Pic"); ?></label>
                    <input type="file" id="file" name="file">

                    <p class="help-block"><?php //echo _t("Only these file extensions are accepted");                 ?></p>

                </div>  
                <button type="submit" class="btn btn-default"><?php _t("Submit"); ?></button>
            </form>



        <?php } ?>




    </div>
</div>

<?php include view("home", "footer"); ?>  



