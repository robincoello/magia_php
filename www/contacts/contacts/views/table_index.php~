<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Id", null, $c); ?></th>
            <th><?php _t("Owner_id"); ?></th>
            <th><?php _t("Type"); ?></th>
            <th><?php _t("Title"); ?></th>
            <th><?php _t("Name"); ?></th>
            <th><?php _t("Lastname"); ?></th>
            <th><?php _t("Birthdate"); ?></th>
            <th><?php _t("Tva"); ?></th>
            <th><?php _t("Order_by"); ?></th>
            <th><?php _t("Status"); ?></th>
            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Owner_id"); ?></th>
            <th><?php _t("Type"); ?></th>
            <th><?php _t("Title"); ?></th>
            <th><?php _t("Name"); ?></th>
            <th><?php _t("Lastname"); ?></th>
            <th><?php _t("Birthdate"); ?></th>
            <th><?php _t("Tva"); ?></th>
            <th><?php _t("Order_by"); ?></th>
            <th><?php _t("Status"); ?></th>

            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </tfoot>

    <tbody>
        <tr>
            <?php
            if (!$contacts) {
                message("info", "No items");
            }

            foreach ($contacts as $contact) {


                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=contacts&a=details&id=' . $contact["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=contacts&a=edit&id=' . $contact["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=contacts&a=delete&id=' . $contact["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';

                //   $photo = addresses_photos_principal($address["id"]);
                //   $contact_name = contacts_field_id("name", $contact["contact_id"]);
                //   $contact_lastname = contacts_field_id("lastname", $contact["contact_id"]);
                echo "<tr id=\"$contact[id]\">";
                echo "<td>$contact[id]</td>";
                echo "<td>$contact[owner_id]</td>";
                echo "<td>$contact[type]</td>";
                echo "<td>$contact[title]</td>";
                echo "<td>$contact[name]</td>";
                echo "<td>$contact[lastname]</td>";
                echo "<td>$contact[birthdate]</td>";
                echo "<td>$contact[tva]</td>";
                echo "<td>$contact[order_by]</td>";
                echo "<td>$contact[status]</td>";
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
