<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

<table class="table table-striped table-condensed table-bordered" >
    <thead>
        <tr class="info">        
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Rol"); ?></th>
            <th><?php _t("Power"); ?></th>
            <th><?php _t("Order by"); ?></th>
            <th><?php _t("Total users"); ?></th>
            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Rol"); ?></th>
            <th><?php _t("Power"); ?></th>
            <th><?php _t("Order by"); ?></th>
            <th><?php _t("Total users"); ?></th>
            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </tfoot>
    <tbody>
        <tr>
            <?php
            if (!$rols) {
                message("info", "No items");
            }


            //foreach ($liste_info as $address) {
            foreach ($rols as $rols) {


                $danger = ($rols['rango'] <= $config_rango_max_for_labo) ? "danger" : "";

                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              ' . _tr("Actions") . '
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=rols&a=details&id=' . $rols["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=rols&a=edit&id=' . $rols["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=rols&a=delete&id=' . $rols["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                //   $photo = addresses_photos_principal($address["id"]);
                //   $contact_name = contacts_field_id("name", $rols["contact_id"]);
                //   $contact_lastname = contacts_field_id("lastname", $rols["contact_id"]);

                $total = (users_total_by_rol($rols['rol'])) ? users_total_by_rol($rols['rol']) : "";

                echo "<tr class=\"$danger\">";
                echo "<td>$rols[id]</td>";
                echo "<td>$rols[rol]</td>";
                echo "<td>$rols[rango]</td>";
                echo "<td>$rols[order]</td>";
                echo "<td>$total</td>";
                echo "<td>$menu</td>";

                echo "</tr>";
            }
            ?>	
        </tr>
    </tbody>

</table>

<?php
message("danger", "Roles with this rank are available for the shop");
?>




