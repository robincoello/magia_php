<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>

    <div class="col-lg-10">
        <?php include view("config", "nav"); ?>


        <?php
        // Entrega un mensaje si es actualizado
        sms($sms);
        ?>

        <h1>
            <span class="glyphicon glyphicon-exclamation-sign"></span>
            <?php _t("Reset"); ?>
        </h1>


        <?php _t("Atention"); ?>

        <p>
            <?php _t("You are going to delete the entire database"); ?>
        </p>



        <form class="form-inline" method="post" action='index.php'>
            <input type="hidden" name="c" value="config">
            <input type="hidden" name="a" value="ok_reset">
            <input type="hidden" name="redi" value="1">

            <div class="form-group">
                <label class="sr-only" for="pass">Password</label>
                <input type="password"  name="pass" class="form-control" id="pass" placeholder="<?php _t("Reset password"); ?>" required="">
            </div>

            <button type="submit" class="btn btn-danger">
                <?php _t("Reset DB"); ?>
            </button>

        </form>





    </div>
</div>

<?php include view("home", "footer"); ?> 

