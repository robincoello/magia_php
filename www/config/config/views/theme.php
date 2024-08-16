<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-lg-3">
        <?php include view("config", "izq_theme"); ?>
    </div>

    <div class="col-lg-6">
        <?php //include view("config", "nav"); ?>


        <?php
        if (isset($m)) {
            foreach ($m as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1><?php _t("Theme"); ?></h1>





        <div class="row">

            <?php
            foreach ($doc_models as $key => $model) {

                include "www/doc_models/views/$model/_description.php";

                if (_options_option("doc_model") == $model) {
                    // esta activo, debo desactivar
                    $btn_status = '<a href="#" class="btn btn-danger" role="button">' . _tr("In use") . '</a> ';
                } else {
                    // esta inactivo, debo activar
                    $btn_status = '<a href="index.php?c=doc_models&a=ok_change_model&model=' . $model . '" class="btn btn-default" role="button">' . _tr("Activate") . '</a> ';
                }

                if ($actived) {



                    echo '<div class="col-sm-6 col-md-3">
    <div class="thumbnail">
      <img src="www/doc_models/views/' . $model . '/' . $model . '.jpg" alt="...">
      <div class="caption">
        <h3>' . $name . '</h3>
        <p>' . $description . '</p>
        <p>
        
        ' . $btn_status . '    
            
        
        </p>
      </div>
    </div>
  </div>';
                }
            }
            ?>
        </div>






    </div>
</div>

<?php include view("home", "footer"); ?> 

