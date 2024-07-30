
<form method="post" action="index.php">
    <input type="hidden" name="c" value="panels">
    <input type="hidden" name="a" value="ok_show">
    <input type="hidden" name="status" value="1">
    <input type="hidden" name="redi" value="1">


    <div class="form-group">
        <label for="panel">
            <?php _t("Panel"); ?>
        </label>

        <select class="form-control" name="id" required="">
            <?php
            foreach (panels_search_controller_action($c, $a) as $key => $psbca) {
                echo '<option value="' . $psbca["id"] . '">' . $psbca["name"] . '</option>';
            }
            ?>
        </select>

    </div>

    <div class="form-group">
        <label for="order_by"><?php _t("Order by"); ?></label>
        <input type="number" class="form-control" name="order_by" id="order_by" placeholder="" required="" value="1">
    </div>

    <button type="submit" class="btn btn-default">
        <?php _t("Add"); ?>
    </button>

</form>


