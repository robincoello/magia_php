<style>
    .imgdisabled{
        opacity: 0.15;
    }
    img:hover {
        opacity: 0.5;
    }
</style>
From: 
<code>
    <?php echo $url; ?>
</code>

<br>
<br>

<div class="row">

    <?php
    foreach ($modules as $key => $module) {

        if (permissions_has_permission($u_rol, $module['name'], 'read')) {
            $disabled = "";
            $hidden = false;
        } else {
            $disabled = " disabled ";
            $hidden = true;
        }


        if ($module['status'] == 1) {
            // esta activo, debo desactivar
            $class = "";
            $btn_status = '<a href="index.php?c=modules&a=ok_change_status&status=0&id=' . $module['id'] . '" ' . $disabled . ' class="btn btn-danger" role="button">' . _tr("Deactivate") . '</a> ';
        } else {
            // esta inactivo, debo activar
            $class = "imgdisabled";
            $btn_status = '<a href="index.php?c=modules&a=ok_change_status&status=1&id=' . $module['id'] . '" ' . $disabled . ' class="btn btn-default" role="button">' . _tr("Activate") . '</a> ';
        }

        $file = 'www/modules/views/img/' . $module['name'] . '.jpg';
        $img = (file_exists($file)) ? $file : "error.gif";

        // solo si no esta presnete en la DB lo muestro 
//        vardump($module['name']);
//        vardump(modules_field_module("id",$module['name']));
//        

        if (modules_field_module("id", $module['name'])) {
            // include "part_index.php"; 
        } else {
            include "part_index_install.php";
        }
    }
    ?>
</div>
