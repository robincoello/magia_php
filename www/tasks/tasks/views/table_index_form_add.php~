<form method="post" action="index.php">
    <input type="hidden" name="c" value="tasks">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi[redi]" value="1">
    <tr>
        <?php
        //$checked_array = json_decode(_options_option("config_tasks_show_col_from_table"), true);
        foreach (tasks_db_col_list_from_table($c) as $th) {
            if (isset($checked_array[$th]) || !isset($checked_array)) {
//                echo "<th>" . _tr(ucfirst($th)) . "</th>";
                switch ($th) {
                    case "id":
                        echo "<td></td>";
                        break;

                    case "id":
                        echo "<td></td>";
                        break;

                    case "category_id": // category_id
                        echo "<td><select name="category_id" class="form-control selectpicker" id="category_id" data-live-search="true" >
                <?php tasks_categories_select("id","id", "" , array()); ?>                        
                </select></td>";
                        break;

                    case "contact_id": // contact_id
                        echo "<td><select name="contact_id" class="form-control selectpicker" id="contact_id" data-live-search="true" >
                <?php contacts_select("id","id", "" , array()); ?>                        
                </select></td>";
                        break;

                    case "title": // title
                        echo "<td><select name="title" class="form-control selectpicker" id="title" data-live-search="true" >
                <?php _select("","", "" , array()); ?>                        
                </select></td>";
                        break;

                    case "description": // description
                        echo "<td><select name="description" class="form-control selectpicker" id="description" data-live-search="true" >
                <?php _select("","", "" , array()); ?>                        
                </select></td>";
                        break;

                    case "controller": // controller
                        echo "<td><select name="controller" class="form-control selectpicker" id="controller" data-live-search="true" >
                <?php controllers_select("controller","controller", "" , array()); ?>                        
                </select></td>";
                        break;

                    case "doc_id": // doc_id
                        echo "<td><select name="doc_id" class="form-control selectpicker" id="doc_id" data-live-search="true" >
                <?php _select("","", "" , array()); ?>                        
                </select></td>";
                        break;

                    case "date_registre": // date_registre
                        echo "<td><select name="date_registre" class="form-control selectpicker" id="date_registre" data-live-search="true" >
                <?php _select("","", "" , array()); ?>                        
                </select></td>";
                        break;

                    case "date_update": // date_update
                        echo "<td><select name="date_update" class="form-control selectpicker" id="date_update" data-live-search="true" >
                <?php _select("","", "" , array()); ?>                        
                </select></td>";
                        break;

                    case "color": // color
                        echo "<td><select name="color" class="form-control selectpicker" id="color" data-live-search="true" >
                <?php _select("","", "" , array()); ?>                        
                </select></td>";
                        break;

                    case "order_by": // order_by
                        echo "<td><select name="order_by" class="form-control selectpicker" id="order_by" data-live-search="true" >
                <?php _select("","", "" , array()); ?>                        
                </select></td>";
                        break;

                    case "status": // status
                        echo "<td><select name="status" class="form-control selectpicker" id="status" data-live-search="true" >
                <?php tasks_status_select("code","code", "" , array()); ?>                        
                </select></td>";
                        break;

                    default:
                        echo '<td><input type="text" class="form-control" name="' . $th . '" id="' . $th . '" placeholder="' . $th . '"></td>';
                        break;
                }
            }
        }
        ?>
        <th>
            <button type="submit" class="btn btn-default">
                <?php echo icon("plus"); ?> 
                <?php _t("Add"); ?>
            </button>
        </th>                                                      
    </tr>
</form>
