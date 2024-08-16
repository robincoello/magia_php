<?php
// crea html 
if (modules_field_module("status", "tasks") && permissions_has_permission($u_rol, "tasks", "read")) {

    $args = array(
        "c" => $c,
        "name" => 'robinson',
        "form" => array(
            "category_id" => null,
            "contact_id" => $u_id,
            "controller" => $c,
            "doc_id" => null,
            "redi" => array(
                "redi" => "30",
                "c" => $c,
                "id" => null
            )
        ),
    );

    tasks_create_html('tmp_izq_index', $args);
}
?>
<div class="list-group">
    <a href="#" class="list-group-item active">
        <i class="fas fa-map-marker"></i>
        <?php echo _t("Controllers"); ?>
    </a>

    <?php foreach (logs_list_distinct_c() as $key => $log_controller) { ?>
        <a href="index.php?c=logs&a=search&w=byC&controller=<?php echo $log_controller['c']; ?>" class="list-group-item"><?php echo $log_controller['c']; ?></a>
    <?php } ?>

</div>



<div class="list-group">
    <a href="#" class="list-group-item active">
        <i class="fas fa-map-marker"></i>
        <?php echo _t("Level"); ?>
    </a>

    <?php foreach (array(1, 2, 3, 4, 5) as $level) { ?>
        <a href="index.php?c=logs&a=search&w=byLevel&level=<?php echo $level; ?>" class="list-group-item">
            <?php echo $level; ?>
        </a>
    <?php } ?>

</div>




<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Search"); ?>
    </div>
    <div class="panel-body">


        <form action="index.php" method="get" >
            <input type="hidden" name="c" value="logs">
            <input type="hidden" name="a" value="search">
            <input type="hidden" name="w" value="byC">

            <div class="form-group">

                <label for="c" ><?php _t("Controllers"); ?></label>

                <select class="form-control" name="controller" id="controller">

                    <?php
                    foreach (controllers_list() as $key => $log_controller) {

                        echo '<option value="' . $log_controller['controller'] . '">' . $log_controller['controller'] . '</option>';
                    }
                    ?>
                </select>

            </div>




            <?php
            vardump($controller);

            if ($controller) {
                ?>

                <div class = "form-group">

                    <label for = "c" ><?php _t("Actions"); ?></label>

                    <select class="form-control" name="controller" id="controller">

                        <?php
                        foreach (logs_list_distinct_a() as $key => $log_action) {

                            echo '<option value="' . $log_action['a'] . '">' . $log_action['a'] . '</option>';
                        }
                        ?>
                    </select>

                </div>

            <?php } ?>





            <button class="btn btn-primary" type="submit" ><?php _t("Search"); ?></button>

        </form>

    </div>
</div>