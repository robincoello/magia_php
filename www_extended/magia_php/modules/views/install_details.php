<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("modules", "izq"); ?>
    </div>

    <div class="col-lg-9">
        <?php include view("modules", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



        <?php
// https://api.jquery.com/prop/
//vardump($modules);
        ?>

        <h2><?php _t("Details"); ?></h2>
        <img class="img-resposive" src="https://cloud.gestionmanager.com/www/modules/views/img/<?php echo $module['name']; ?>.jpg">
        <h1><?php echo $module['name']; ?></h1>
        <p><b><?php _t("Description"); ?>: </b> <?php echo $module['description']; ?></p>
        <p><b><?php _t("Sub modules"); ?>: </b> <?php echo $module['sub_modules']; ?></p>
        <p><b><?php _t("Author"); ?>:</b>  <?php echo $module['author']; ?> (<?php echo $module['author_email'] ?>)</p>
        <p><b><?php _t("Web"); ?>:</b> <a href="<?php echo $module['url']; ?>" target="new"><?php echo $module['url']; ?></a></p>
        <p><b><?php _t("Version"); ?>:</b> <?php echo $module['version']; ?></p>

        <hr>

        Verifica si los sub modulos estan instalados 

        zip: 

        https://github.com/robincoello/mercedes/archive/refs/tags/public.zip



        <input class="btn btn-primary active" type ="submit" value ="<?php _t("Install"); ?>">



        <code>
            <pre>
            Cargo el archivo y lo pongo en tpm

            descomprimo

            ejecuto el archo de instalacion 

            intall file -----
            -----------------
            1) Descomprilo las carpetas
            2) instalo base de datos 
            3) permisos
            </pre> 
        </code>










    </div>
</div>

<?php include view("home", "footer"); ?> 

