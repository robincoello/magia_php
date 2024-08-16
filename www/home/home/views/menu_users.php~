<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">

            <a href="index.php"><?php logo(150); ?></a>
        </div>   

    </div>
</div>




<?php
// if the user has permission to see shop
if (permissions_has_permission($u_rol, "shop", "read")) {
    include view("home", "menu_labo");
} else {
    include view("home", "menu_root");
}
?>