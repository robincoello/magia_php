<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-lg-2">
        <?php include view("config", "izq_projects"); ?>
    </div>

    <div class="col-lg-8">
        <?php //include view("config", "nav"); ?>


        <?php
        if (isset($m)) {
            foreach ($m as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1><?php _t("Projects"); ?></h1>

        <p>
            Si activa esta opcion, estara disponible el momento de crear una factura o un gasto
        </p>

        <p>Actualmente esta activo </p>



        <?php if (_options_option("config_projects")) { ?>
            <form class="form-inline" method="post" action="index.php">
                <input type="hidden" name="c" value="config">
                <input type="hidden" name="a" value="ok_projects">            
                <input type="hidden" name="data" value="0">            
                <button type="submit" class="btn btn-danger"><?php _t("Desactivate"); ?></button>
            </form>
            <p>-</p>
            <p>
                <?php _t("Currently, is active."); ?>
            </p>


            <img src="www/gallery/img/projects_yes.png" width="width" height="height" alt="alt"/>


        <?php } else { ?> 
            <form class="form-inline" method="post" action="index.php">
                <input type="hidden" name="c" value="config">
                <input type="hidden" name="a" value="ok_projects">            
                <input type="hidden" name="data" value="1">            
                <button type="submit" class="btn btn-primary"><?php _t("Activate"); ?></button>
            </form>
            <p>-</p>
            <p>
                <?php _t("Currently, is not active."); ?>
            </p>


            <img src="www/gallery/img/projects_yes.png" width="width" height="height" alt="alt"/>

        <?php } ?>


    </div>
</div>

<?php include view("home", "footer"); ?> 

