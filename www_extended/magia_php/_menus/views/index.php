<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include "izq.php"; ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php
        if (isset($location)) {
            include "izq_by_location.php";
        }
        ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php
        if (isset($father_id)) {
            include "izq_child_of.php";
        }
        ?>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6">
        <?php include "nav.php"; ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <?php
        if (isset($id)) {
            include"form_edit.php";

            echo '<hr><a class="btn btn-danger" href="index.php?c=_menus&a=delete&id=' . $menu->getId() . '&redi=1">' . _tr("Delete") . '</a>';
        }
        echo "<br><br>";

        include "table_index.php";

//        
//        if ($_menus) {
//            include view("_menus", "table_index");
//        } else {
//            message("info", "No items");
//        }
        ?>
    </div>
</div>

<?php include view("home", "footer"); ?> 
