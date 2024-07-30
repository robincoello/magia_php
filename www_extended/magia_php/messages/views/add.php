<?php
# MagiaPHP 
# file date creation: 2024-01-04 
?>
<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("messages", "izq_add"); ?></div>

    <div class="col-sm-12 col-md-8 col-lg-8">
        <h1>
            <?php _menu_icon("top", 'messages'); ?>
            <?php _t("Add messages"); ?>
        </h1>

        <?php
        $by = (($_GET['by'])) ?? null;

        if (isset($by)) {
            switch ($by) {
                case 'all':
                    include "form_add_by_all.php";
                    break;

                case 'controller':
                    include "form_add_by_controller.php";
                    break;

                case 'document':
//                    include "form_add_by_document.php";
                    break;

                case 'user':
                    include "form_add_by_user.php";
//                    echo "<br><br>";
//                    include "list_by_user.php";
                    break;

                case 'rol':
                    include "form_add_by_rol.php";
                    break;

                case 'date':
                    include "form_add_by_date.php";
                    break;

                case 'period':
                    include "form_add_by_period.php";
                    break;

                case 'login':
                    include "form_add_by_login.php";
                    break;

                default:
                    break;
            }
        } else {
            ?>

            <div class="list-group">
                <a href="#" class="list-group-item active">
                    <?php _t("Add"); ?>    

                </a>
                <a href="index.php?c=messages&a=add&by=all" class="list-group-item"><?php _t("For all"); ?></a>
                <a href="index.php?c=messages&a=add&by=controller#" class="list-group-item"><?php _t("On a specific controller"); ?></a>
                <?php
                /*
                 *                 <a href="index.php?c=messages&a=add&by=document#" class="list-group-item">En un documento</a>

                 */
                ?>
                <a href="index.php?c=messages&a=add&by=user#" class="list-group-item"><?php _t("To a specific user"); ?></a>
                <a href="index.php?c=messages&a=add&by=rol#" class="list-group-item"><?php _t("For users with a specific role"); ?></a>
                <a href="index.php?c=messages&a=add&by=date#" class="list-group-item"><?php _t("For a specific date"); ?></a>
                <a href="index.php?c=messages&a=add&by=period#" class="list-group-item"><?php _t("For a period of time"); ?></a>
                <a href="index.php?c=messages&a=add&by=login#" class="list-group-item"><?php _t("On the login page"); ?></a>
            </div>
            <?php
        }
        ?>


        <?php //include view("messages", "form_add"); ?>


    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php
        if ($by) {
            include view("messages", "der_add");
        }
        ?>

    </div>
</div>

<?php include view("home", "footer"); ?>

