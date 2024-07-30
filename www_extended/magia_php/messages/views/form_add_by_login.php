<h3>Pantalla de login</h3>
<p><?php _t("Message visible to people who are not connected"); ?></p>

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
        <label for="message"><?php _t("Message"); ?></label>
        <textarea class="form-control" name="message"></textarea>
    </div>



    <button type="submit" class="btn btn-default">
        <?php _t("Add"); ?>
    </button>
</form>