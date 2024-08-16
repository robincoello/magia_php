<table class="table table-striped">
    <thead>
        <tr class="info">
            <?php
            $order_icon_show = false;
            $checked_array = json_decode(_options_option("config_icons_show_col_from_table"), true);
            foreach (icons_db_col_list_from_table($c) as $th) {
                $order_icon_up = '<span class="glyphicon glyphicon-sort-by-attributes"></span>';
                $order_icon_down = '<span class="glyphicon glyphicon-sort-by-attributes-alt"></span>';
                $order_icon = ($order_way == "desc") ? $order_icon_down : $order_icon_up;
                if (isset($checked_array[$th]) || !isset($checked_array)) {
                    $order_icon_show = ($th == $order_col ) ? $order_icon : "";
                    $link_order_way = ($order_way == "desc") ? "&order_way=asc" : "&order_way=desc";
                    echo '<th><a href="index.php?c=icons&order_col=' . $th . '' . $link_order_way . ' ">' . _tr(ucfirst($th)) . ' ' . $order_icon_show . '</a></th>';
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
            //$checked_array = json_decode(_options_option("config_icons_show_col_from_table"), true);
            foreach (icons_db_col_list_from_table($c) as $th) {
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
            if (!$icons) {
                message("info", "No items");
            }

            foreach ($icons as $icons_item) {
                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropTableIndex" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              ' . _tr("Action") . '
                              <span class="caret"></span>
                            </button>
                            
                            <ul class="dropdown-menu" aria-labelledby="dropTableIndex">
                            
                            <?php if (permissions_has_permission($u_rol, "icons", "read")) { ?>
                              <li><a href="index.php?c=icons&a=details&id=' . $icons_item["id"] . '">' . _tr("Details") . '</a></li>
                            <?php } ?>
                            
                            <?php if (permissions_has_permission($u_rol, "icons", "update")) { ?>
                                <li><a href="index.php?c=icons&a=edit&id=' . $icons_item["id"] . '">' . _tr("Edit") . '</a></li>
                            <?php } ?>    

                             <?php if (permissions_has_permission($u_rol, "icons", "delete")) { ?>
                              <li role="separator" class="divider"></li>                              
                              <li><a href="index.php?c=icons&a=delete&id=' . $icons_item["id"] . '">' . _tr("Delete") . '</a></li>
                            <?php } ?>    
                            

                            </ul>
                          </div>';
                echo "<tr id=\"$icons_item[id]\">";
                $checked_array = json_decode(_options_option("config_icons_show_col_from_table"), true);
                foreach (icons_db_col_list_from_table($c) as $col_name) {
                    if (isset($checked_array[$col_name]) || !isset($checked_array)) {
                        //echo "<td>$icons_item[$col_name]</td>";
                        // si una columna se llama xx
                        if ($col_name == "xxxxxxxxxxxxxx") { // se pone un filtro en este caso la primera mayuscula
                            echo "<td>" . icons_add_filter($col_name, $icons_item[$col_name], ucfirst($col_name)) . "</td>";
                        } else {
                            echo "<td>" . icons_add_filter($col_name, $icons_item[$col_name]) . "</td>";
                        }
                    }
                } echo "<td>$menu</td>";
                echo "</tr>";
            }
            ?>	
        </tr>
    </tbody>

    <?php include view("icons", "table_index_form_add"); ?>



</table>
<?php
//$pagination->createHtml();
?>
