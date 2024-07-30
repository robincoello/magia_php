<h3>En un documento</h3>

<p>Mensaje visible en n determinado documento</p>


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
        <label for="by"><?php _t("Document type"); ?></label>
        <select class="form-control" name="by">
            <?php
            $documents_type = array("invoices", "budgets", "credit_notes", "balance");
            foreach ($documents_type as $documents_type_item) {
                $selected = ($documents_type_item == 'invoices') ? " selected " : "";
                echo '<option value="' . $documents_type_item . '" ' . $selected . '>' . _tr($documents_type_item) . '</option>';
            }
            ?>
        </select>
        <span id="helpBlock" class="help-block"><?php _t("In the next step you will choose the document number"); ?></span>
    </div>

    <div class="form-group">
        <label for="message"><?php _t("Message"); ?></label>
        <textarea class="form-control" name="message"></textarea>
    </div>

    <button type="submit" class="btn btn-default">Submit</button>
</form>