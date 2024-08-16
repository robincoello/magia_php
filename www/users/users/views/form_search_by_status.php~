
<form action="index.php" method="get">
    <input type="hidden" name="c" value="users">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="by_status">

    <div class="form-group">
        <label for="contact_id"><?php echo _t("Contacts"); ?></label>
        <select name="contact_id" class="selectpicker" data-live-search="true" data-width="100%">
            <option value="all"><?php echo _t("All"); ?></option>
            <?php
            foreach (contacts_list() as $key => $value) {
                echo "<option value=\"$value[id]\">$value[name], " . strtoupper($value[lastname]) . " </option>";
            }
            ?>

        </select>
    </div>


    <div class="form-group">
        <label for="rol"><?php echo _t("Rol"); ?></label>
        <select name="rol" class="selectpicker" data-live-search="true" data-width="100%">
            <option value="all"><?php echo _t("All"); ?></option>
            <?php
            foreach (rols_list() as $key => $value) {
                echo "<option value=\"$value[rol]\">$value[rol] </option>";
            }
            ?>

        </select>
    </div>







    <button type="submit" class="btn btn-default">Submit</button>
</form>