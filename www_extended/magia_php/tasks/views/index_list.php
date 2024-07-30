

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">

        <?php include "izq.php"; ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include "izq_items_by_status.php"; ?>
    </div>

    <div class="col-sm-12 col-md-8 col-lg-8">
        <?php //include view("services", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php
        if ($tasks) {
            //include view("tasks", "table_index");
        } else {
            message("info", "No items");
        }
        ?>
    </div>
</div>