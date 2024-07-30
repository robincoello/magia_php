

<table class="table table-striped table-bordered" >

    <tr>
        <td>

            <?php
            if (isset($location) && $location !== 'null' && 1 == 2) {
                // echo '<a href="index.php?c=_menus&a=search&w=full&location=null&father_id=null&label=null&controller=null&url=null&target=null&icon=null&order_by=null&status=null">' . $location . ' ' . icon("remove") . '</a>';
            } else {
                ?>
                <form class="form-horizontal" action="index.php" method="get" >
                    <input type="hidden" name="c" value="_menus">
                    <input type="hidden" name="a" value="search">
                    <input type="hidden" name="w" value="full">                                                                                

                    <select 
                        name="location" 
                        class="form-control selectpicker" 
                        id="location" 
                        data-live-search="true" 
                        required="" 
                        onchange="this.form.submit()"

                        >
                        <option value="null"><?php _t("All"); ?></option>
                        <?php
                        foreach (_menus_unique_from_col('location') as $key => $mufl) {

                            $selected = ($location == $mufl['location']) ? " selected " : "";
                            echo '<option value="' . $mufl['location'] . '"  ' . $selected . '>' . $mufl['location'] . '</option>';
                        }
                        ?>
                        <?php // _menus_select("location", "location", "$location", array());   ?>                        
                    </select>

                    <input type="hidden" name="father_id" value="<?php echo $father_id ?? null; ?>">                                                                                
                    <input type="hidden" name="label" value="<?php echo $label ?? null; ?>">                                                                                
                    <input type="hidden" name="controller" value="<?php echo $controller ?? null; ?>">                                                                                
                    <input type="hidden" name="target" value="<?php echo $target ?? null; ?>">                                                                                
                    <input type="hidden" name="icon" value="<?php echo $icon ?? null; ?>">                                                                                
                    <input type="hidden" name="order_by" value="<?php echo $order_by ?? null; ?>">                                                                                
                    <input type="hidden" name="status" value="<?php echo $status ?? null; ?>">                                                                                
                </form>
            <?php }
            ?>


        </td>

        <td>
            <form class="form-horizontal" action="index.php" method="get" >
                <input type="hidden" name="c" value="_menus">
                <input type="hidden" name="a" value="search">
                <input type="hidden" name="w" value="full">                                                                                
                <input type="hidden" name="location" value="<?php echo $location ?? null; ?>">                                                                                

                <select 
                    name="father_id" 
                    class="form-control selectpicker" 
                    id="father_id" 
                    data-live-search="true" 
                    required="" 
                    onchange="this.form.submit()">

                    <option value="null"><?php _t("All"); ?></option>
                    <?php
                    foreach (_menus_unique_from_col('father_id') as $key => $mufl) {

                        $selected = ($father_id == $mufl['father_id']) ? " selected " : "";
                        echo '<option value="' . $mufl['father_id'] . '"  ' . $selected . '>' . _menus_field_id('label', $mufl['father_id']) . '</option>';
                    }
                    ?>
                    <?php // _menus_select("location", "location", "$location", array());   ?>                        
                </select>


                <input type="hidden" name="location" value="<?php echo $location ?? null; ?>">                                                                                
                <input type="hidden" name="label" value="<?php echo $label ?? null; ?>">                                                                                
                <input type="hidden" name="controller" value="<?php echo $controller ?? null; ?>">                                                                                
                <input type="hidden" name="target" value="<?php echo $target ?? null; ?>">                                                                                
                <input type="hidden" name="icon" value="<?php echo $icon ?? null; ?>">                                                                                
                <input type="hidden" name="order_by" value="<?php echo $order_by ?? null; ?>">                                                                                
                <input type="hidden" name="status" value="<?php echo $status ?? null; ?>"> 

            </form>


        </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>

        <td></td>
        <td></td>
    </tr>



    <thead>
        <tr class="info">
            <?php
            $order_icon_show = false;
            $checked_array = json_decode(_options_option("config__menus_show_col_from_table"), true);
            foreach (_menus_db_col_list_from_table($c) as $th) {
                $order_icon_up = '<span class="glyphicon glyphicon-sort-by-attributes"></span>';
                $order_icon_down = '<span class="glyphicon glyphicon-sort-by-attributes-alt"></span>';
                $order_icon = ($order_way == "desc") ? $order_icon_down : $order_icon_up;
                if (isset($checked_array[$th]) || !isset($checked_array)) {
                    $order_icon_show = ($th == $order_col ) ? $order_icon : "";
                    $link_order_way = ($order_way == "desc") ? "&order_way=asc" : "&order_way=desc";
                    echo '<th><a href="index.php?c=_menus&order_col=' . $th . '' . $link_order_way . ' ">' . _tr(ucfirst($th)) . ' ' . $order_icon_show . '</a></th>';
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
            //$checked_array = json_decode(_options_option("config__menus_show_col_from_table"), true);
            foreach (_menus_db_col_list_from_table($c) as $th) {
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
            foreach ($_menus as $_menus) {
                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=_menus&a=details&id=' . $_menus["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=_menus&a=edit&id=' . $_menus["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=_menus&a=delete&id=' . $_menus["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                echo "<tr id=\"$_menus[id]\">";
                $checked_array = json_decode(_options_option("config__menus_show_col_from_table"), true);
                foreach (_menus_db_col_list_from_table($c) as $col_name) {
                    if (isset($checked_array[$col_name]) || !isset($checked_array)) {
                        //echo "<td>$_menus[$col_name]</td>";
                        echo "<td>" . _menus_add_filter($col_name, $_menus[$col_name]) . "</td>";
                    }
                } echo "<td>$menu</td>";
                echo "</tr>";
            }
            ?>	
        </tr>
    </tbody>

    <?php
    /**
     * 
      <form class="form-horizontal" action="index.php" method="post" >
      <input type="hidden" name="c" value="_menus">
      <input type="hidden" name="a" value="ok_add">
      <input type="hidden" name="location" value="<?php echo $location ?? false; ?>">
      <input type="hidden" name="status" value="1">
      <input type="hidden" name="redi" value="2">


      <tr>
      <td>
      <?php echo ($location) ?? false; ?>
      </td>
      <td>
      <select name="father_id" class="form-control selectpicker" id="father_id" data-live-search="true" required="">
      <option value="null">null</option>
      <?php _menus_select("id", "label", "$father_id", array()); ?>
      </select>
      </td>
      <td>

      <input
      type="text"
      name="label"
      class="form-control"
      id="label"
      placeholder="label"
      value="<?php echo (isset($label)) ? "$label" : ""; ?>"
      required=""
      >
      </td>
      <td>
      <select name="controller" class="form-control selectpicker" id="controller" data-live-search="true" required="">
      <?php
      foreach (controllers_list() as $key => $clist) {
      echo '<option value="' . $clist["controller"] . '" >' . _tr($clist['controller']) . '</option>';
      }
      ?>
      </select>
      </td>
      <td>
      <input type="text" name="url" class="form-control" id="url" placeholder="url"
      value="index.php?c=xxxx"
      >


      </td>
      <td>
      <input type="text" name="target" class="form-control" id="target" placeholder="target"
      value=""
      >
      </td>
      <td>

      <select class="form-control selectpicker" name="icon" id="icon" data-live-search="true">
      <?php
      foreach (icons_list() as $key => $icon_item) {
      //$icon_selected = ($icon_item['icon'] === $_menus['icon'] ) ? ' selected="true" ' : '';
      echo '<option data-icon="' . $icon_item["icon"] . '" value="' . $icon_item["icon"] . '" >' . $icon_item['icon'] . '</option>';
      }
      ?>
      </select>
      <span id="icon" class="help-block">
      <a href="https://getbootstrap.com/docs/3.4/components/" target="new"><?php _t("Icons"); ?></a>
      </span>


      </td>

      <td>
      <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="1" >
      </td>


      <td>
      <input class="btn btn-primary active" type ="submit" value ="<?php _t("Add"); ?>">
      </td>
      </tr>

      </form>
     */
    ?>




</table>
<?php
$pagination->createHtml();
?>
