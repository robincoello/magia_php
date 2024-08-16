<?php //include("www/home/views/header.php");     ?>  
<?php include view("home", "header"); ?>                

<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">       
        <?php //include view("rols", "izq"); ?>
    </div>

    <div class="col-sm-6 col-md-6 col-lg-6">

        <h1>
            <?php _menu_icon("top", "rols"); ?>
            <?php _t("Rol edit"); ?>
        </h1>
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>




        <?php
        switch ($id) {
            case 1:
                // case 4:
                echo "<h3>Hey " . contacts_field_id("name", $u_id) . " !</h3>";
                message('info', "Ups, remember this rol can not be edit or delete.");
                echo '<img src="https://media1.tenor.com/images/44447ee08a526c60e0be80ac5a9c34d2/tenor.gif?itemid=9197132">';
                break;

            default:
                include view("rols", "form_edit");
                break;
        }
        ?>



    </div>

    <div class="col-sm-3 col-md-3 col-lg-3">


        <?php //include view("rols", "der"); ?>
    </div>
</div>

<?php include view("home", "footer"); ?>

