<table class="table table-striped">
    <thead>
        <tr class="info">
            <?php
            $checked_array = json_decode(_options_option("config__options_show_col_from_table"), true);
            foreach (_options_db_col_list_from_table($c) as $th) {
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
            //$checked_array = json_decode(_options_option("config__options_show_col_from_table"), true);
            foreach (_options_db_col_list_from_table($c) as $th) {
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
            if (!$_options) {
                message("info", "No items");
            }

            foreach ($_options as $_options) {
                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=_options&a=details&id=' . $_options["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=_options&a=edit&id=' . $_options["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=_options&a=delete&id=' . $_options["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                echo "<tr id=\"$_options[id]\">";
                $checked_array = json_decode(_options_option("config__options_show_col_from_table"), true);
                foreach (_options_db_col_list_from_table($c) as $th) {
                    if (isset($checked_array[$th]) || !isset($checked_array)) {
                        echo "<td>$_options[$th]</td>";
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
