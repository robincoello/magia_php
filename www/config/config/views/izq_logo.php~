<?php //logo(200, "responsive");               ?>

<p></p>
<p></p>
<p></p>

<div class="panel panel-default">
    <div class="panel-body">


        <?php
        // si la carpeta para logo no existe, la debe crear primero 
        //vardump(PATH_GALLERY_IMG_SUBDOMAIN);

        if (!file_exists(PATH_GALLERY_IMG_SUBDOMAIN)) {
            // crar archivo

            echo "F5 please";

            if (!mkdir(PATH_GALLERY_IMG_SUBDOMAIN, 0777, true)) {
                die('Failed to create directories...');
            }
            //
            //
            //
        } else {
            ?>
            <form enctype="multipart/form-data" method="post" action="index.php">

                <input type="hidden" name="c" value="gallery">
                <input type="hidden" name="a" value="ok_logo_add">    
                <input type="hidden" name="order_id" id="id"  value="<?php echo $id; ?>">
                <input type="hidden" name="side" value="<?php echo $side; ?>">
                <input type="hidden" name="redi" value="1">
                <input type="hidden" name="notes" value="null">
                <input type="hidden" name="redi" value="1">


                <div class="form-group">
                    <label for="file"><?php _t("Logo"); ?></label>
                    <input type="file" id="file" name="file">
                    <br>
                    <br>
                    <br>
                    <br>
                    <p class="help-block"><?php //echo _t("Only these file extensions are accepted");                      ?></p>
                </div>  
                <button type="submit" class="btn btn-default"><?php _t("Submit"); ?></button>
            </form>
        <?php }
        ?>



    </div>
</div>


<?php if ($u_rol == 'root') { ?>
    only root
    <h3><?php _t("Make a logo on line"); ?></h3>
    <ul>
        <li><a href="https://www.logogenie.fr/creation-logo?text=coello" target="_blank">logogenie</a></li>
    </ul>
<?php }
?>