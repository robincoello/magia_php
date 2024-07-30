<?php
# MagiaPHP 
# file date creation: 2023-02-08 
?>
<?php include view("home", "header"); ?> 

<?php include view("tasks", "nav"); ?>

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("tasks", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include "izq_details.php"; ?>
    </div>

    <div class="col-sm-12 col-md-5 col-lg-5">



        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php echo _tr("Details"); ?>

        <?php include "form_details.php"; ?>

    </div>


    <div class="col-sm-12 col-md-3 col-lg-3">
        <?php include "der_details.php"; ?>
    </div>
</div>

<?php include view("home", "footer"); ?>
