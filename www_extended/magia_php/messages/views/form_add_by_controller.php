<h3>En una controller</h3>
<p>Este mensaje sera visible por todo el mundo unicamente en la seccion que escojas</p>

<form method="post" action="index.php">
    <input type="hidden" name="c" value="messages">
    <input type="hidden" name="a" value="ok_add">

    <input type="hidden" name="type" value="info">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    <input type="hidden" name="date_registre" value="<?php echo date("Y-m-d"); ?>">
    <input type="hidden" name="is_logued" value="1">


    <?php # type ?>
    <div class="form-group">
        <label class="control-label" for="type"><?php _t("Type"); ?></label>
        <select class="form-control" name="type">
            <?php
            $types_array = array("info", "success", "warning", "danger", "primary");
            foreach ($types_array as $types_item) {
                echo '<option value="' . $types_item . '">' . ucfirst($types_item) . '</option>';
            }
            ?>
        </select>
    </div>
    <?php # /type ?>


    <div class="form-group">
        <label for="controller"><?php _t("Controller"); ?></label>
        <select class="form-control" name="controller">
            <?php
            foreach (controllers_list() as $key => $controllers_list) {

                $selected = ($controllers_list['controller'] == 'contacts') ? " selected " : "";

                echo '<option value="' . $controllers_list['controller'] . '" ' . $selected . '>' . ($controllers_list["controller"]) . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="message"><?php _t("Message"); ?></label>
        <textarea class="form-control" name="message"></textarea>
    </div>

    <button type="submit" class="btn btn-default">Submit</button>
</form>