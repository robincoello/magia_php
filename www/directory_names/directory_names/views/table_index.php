<table class="table table-striped">
    <thead>
        <tr class="info">
            <?php
            $checked_array = json_decode(_options_option("config_directory_names_show_col_from_table"), true);
            foreach (directory_names_db_col_list_from_table($c) as $th) {
                if (isset($checked_array[$th]) || !isset($checked_array)) {
                    echo "<th>" . _tr(ucfirst($th)) . "</th>";
                }
            }
            ?>
            <th><?php _t("Action"); ?></th>                                                      
        </tr>
    </thead>
    <tfoot>
        <tr class="info">
            <?php
            //$checked_array = json_decode(_options_option("config_directory_names_show_col_from_table"), true);
            foreach (directory_names_db_col_list_from_table($c) as $th) {
                if (isset($checked_array[$th]) || !isset($checked_array)) {
                    echo "<th>" . _tr(ucfirst($th)) . "</th>";
                }
            }
            ?>
            <th><?php _t("Action"); ?></th>                                                      
        </tr>
    </tfoot>
    <tbody>
        <tr>
            <?php
            if (!$directory_names) {
                message("info", "No items");
            }

            foreach ($directory_names as $directory_names) {
                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=directory_names&a=details&id=' . $directory_names["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=directory_names&a=edit&id=' . $directory_names["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=directory_names&a=delete&id=' . $directory_names["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                echo "<tr id=\"$directory_names[id]\">";
                $checked_array = json_decode(_options_option("config_directory_names_show_col_from_table"), true);
                foreach (directory_names_db_col_list_from_table($c) as $th) {
                    if (isset($checked_array[$th]) || !isset($checked_array)) {
                        echo "<td>$directory_names[$th]</td>";
                    }
                } echo "<td>$menu</td>";
                echo "</tr>";
            }
            ?>	
        </tr>
    </tbody>
</table>
<?php
$pagination->createHtml();
?>
