<form method="get" action="index.php">
    <input type="hidden" name="c" value="g">  

    <div class="form-group">
        <label for="txt"><?php _t("Global search"); ?></label>
        <input type="text" class="form-control" name="txt" id="txt" placeholder="<?php // echo _t("FiledName");            ?>">
    </div>
    <button type="submit" class="btn btn-default">
        <?php echo icon("ok"); ?> 
        <?php _t("Search"); ?>
    </button>
</form>