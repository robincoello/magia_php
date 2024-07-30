<style>
    .imgdisabled{
        opacity: 0.15;
    }
    img:hover {
        opacity: 0.5;
    }
</style>



<div class="row">

    <?php
    $disabled = "";
    $hidden = false;

    // vardump($modules);


    foreach ($modules as $key => $module) {

        if ($module['status'] == 1) {
            // esta activo, debo desactivar
            $class = "";
            $btn_status = '<a href="index.php?c=modules&a=ok_change_status&status=0&id=' . $module['id'] . '&redi=2" ' . $disabled . ' class="btn btn-danger" role="button">' . _tr("Deactivate") . '</a> ';
        } else {
            // esta inactivo, debo activar
            $class = "imgdisabled";
            $btn_status = '<a href="index.php?c=modules&a=ok_change_status&status=1&id=' . $module['id'] . '&redi=1" ' . $disabled . ' class="btn btn-default" role="button">' . _tr("Activate") . '</a> ';
        }


        $file = 'www_extended/default/modules/views/img/' . $module['module'] . '.jpg';

        $img = (file_exists($file)) ? $file : "www_extended/default/modules/views/img/no_image.jpg";

        if (modules_field_module("id", $module['module'])) {
            include "part_index2.php";
            //      echo "dos";
        } else {
            include "part_index_install.php";
        }
    }
    ?>
</div>
