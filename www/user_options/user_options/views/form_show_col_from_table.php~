
<form method="post" action="index.php">
    <input type="hidden" name="c" value="user_options">
    <input type="hidden" name="a" value="ok_show_col_from_table">
    <input type="hidden" name="redi" value="1">

    <table class="table table-bordered">
        <tr>
            <?php
            $checked_array = json_decode(_options_option("config_user_options_show_col_from_table"), true);
            foreach (user_options_db_col_list_from_table($c) as $th) {
                // si hay como parte del array $checked_array
                // o si el array tiene cero elementos (au no registrado)
                $checked = (isset($checked_array[$th]) || !isset($checked_array) ) ? " checked " : "";
                echo '<td><input ' . $checked . ' type="checkbox" name="' . $th . '" id="' . $th . '"> ' . $th . ' </td>';
            }
            ?>
            <td>
                <button type="submit" class="btn btn-default"><?php _t("Save"); ?></button>
            </td>
        </tr>
    </table>
</form>




