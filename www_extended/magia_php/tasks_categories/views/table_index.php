<table class="table table-striped">
    <thead>
        <tr class="info">
            <?php
            $order_icon_show = false;
            $checked_array = json_decode(_options_option("config_tasks_categories_show_col_from_table"), true);
            foreach (tasks_categories_db_col_list_from_table($c) as $th) {
                $order_icon_up = '<span class="glyphicon glyphicon-sort-by-attributes"></span>';
                $order_icon_down = '<span class="glyphicon glyphicon-sort-by-attributes-alt"></span>';
                $order_icon = ($order_way == 'desc') ? $order_icon_down : $order_icon_up;
                if (isset($checked_array[$th]) || !isset($checked_array)) {
                    $order_icon_show = ($th == $order_col ) ? $order_icon : "";
                    $link_order_way = ($order_way == 'desc') ? '&order_way=asc' : '&order_way=desc';
                    echo '<th><a href="index.php?c=tasks_categories&order_col=' . $th . '' . $link_order_way . ' ">' . _tr(ucfirst($th)) . ' ' . $order_icon_show . '</a></th>';
                }
                $order_icon_show = false;
            }
            ?>
            <th><?php _t("Action"); ?></th>                                                      
        </tr>
    </thead>
    <tfoot>
        <tr class="info">
            <?php
//$checked_array = json_decode(_options_option("config_tasks_categories_show_col_from_table"), true);
            foreach (tasks_categories_db_col_list_from_table($c) as $th) {
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
            if (!$tasks_categories) {
                message("info", "No items");
            }

            foreach ($tasks_categories as $tasks_categories) {
                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=tasks_categories&a=details&id=' . $tasks_categories["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=tasks_categories&a=edit&id=' . $tasks_categories["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=tasks_categories&a=delete&id=' . $tasks_categories["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                echo "<tr id=\"$tasks_categories[id]\">";
                $checked_array = json_decode(_options_option("config_tasks_categories_show_col_from_table"), true);

                foreach (tasks_categories_db_col_list_from_table($c) as $col_name) {
                    if (isset($checked_array[$col_name]) || !isset($checked_array)) {
                        echo "<td>$tasks_categories[$col_name]</td>";
                        // echo "<td>" . tasks_categories_function($col_name, $tasks_categories[$col_name]) . "</td>";
                    }
                }

                echo "<td>$menu</td>";
                echo "</tr>";
            }
            ?>	
        </tr>
    </tbody>
</table>
<?php
$pagination->createHtml();
?>
