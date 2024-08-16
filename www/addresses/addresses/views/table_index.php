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
            <th><?php _t("Contact_id"); ?></th>
            <th><?php _t("Type"); ?></th>
            <th><?php _t("Address"); ?></th>
            <th><?php _t("Number"); ?></th>
            <th><?php _t("Postcode"); ?></th>
            <th><?php _t("Barrio"); ?></th>
            <th><?php _t("Sector"); ?></th>
            <th><?php _t("Ref"); ?></th>
            <th><?php _t("City"); ?></th>
            <th><?php _t("Province"); ?></th>
            <th><?php _t("Region"); ?></th>
            <th><?php _t("Country"); ?></th>
            <?php if (modules_field_module('status', 'transport')) { ?> 
                <th><?php _t("Transport"); ?></th>
                <th><?php _t("Transport ref"); ?></th>
            <?php } ?>
            <th><?php _t("Status"); ?></th>

        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Contact_id"); ?></th>
            <th><?php _t("Type"); ?></th>
            <th><?php _t("Address"); ?></th>
            <th><?php _t("Number"); ?></th>
            <th><?php _t("Postcode"); ?></th>
            <th><?php _t("Barrio"); ?></th>
            <th><?php _t("Sector"); ?></th>
            <th><?php _t("Ref"); ?></th>
            <th><?php _t("City"); ?></th>
            <th><?php _t("Province"); ?></th>
            <th><?php _t("Region"); ?></th>
            <th><?php _t("Country"); ?></th>
            <?php if (modules_field_module('status', 'transport')) { ?> 
                <th><?php _t("Transport"); ?></th>
                <th><?php _t("Transport ref"); ?></th>
            <?php } ?>
            <th><?php _t("Status"); ?></th>

        </tr>
    </tfoot>


    <tbody>
        <tr>
            <?php
            foreach ($addresses as $address) {

                //vardump($address);

                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=addresses&a=details&id=' . $address["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=addresses&a=edit&id=' . $address["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=addresses&a=delete&id=' . $address["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                //   $photo = addresses_photos_principal($address["id"]);
                //   $contact_name = contacts_field_id("name", $address["contact_id"]);
                //   $contact_lastname = contacts_field_id("lastname", $address["contact_id"]);
                echo "<tr id=\"$address[id]\">";

                echo "<td>$address[id]</td>";
                echo "<td><a href=\"index.php?c=contacts&a=addresses&id=$address[contact_id]\">" . contacts_formated($address['contact_id']) . "</a></td>";
                echo "<td>" . _tr($address['name']) . "</td>";
                echo "<td>$address[address]</td>";
                echo "<td>$address[number]</td>";
                echo "<td>$address[postcode]</td>";
                echo "<td>$address[barrio]</td>";
                echo "<td>$address[sector]</td>";
                echo "<td>$address[ref]</td>";
                echo "<td>$address[city]</td>";
                echo "<td>$address[province]</td>";
                echo "<td>$address[region]</td>";
                echo "<td>" . countries_country_by_country_code($address['country']) . "</td>";
                if (modules_field_module('status', 'transport')) {
                    echo "<td>" . (addresses_transport_search_by_addresses_id($address['id'])) . "</td> ";
                    echo "<td>$address[transport_ref]</td>";
                }

                echo "<td>$address[status]</td>";
//                echo "<td>";
//                if (permissions_has_permission($u_rol, "addresses", "update")) {
//                    include "modal_addresses_edit.php";
//                }
//
//                if ($address['name'] !== "Billing") {
//// por el momento solo puede desactivar una direccion de entrega
//// no borrarla
////                if (permissions_has_permission($u_rol, "shop_addresses", "delete")) {
////                    include "modal_addresses_delete.php";
////                }
//                    if ($address['status'] == 1) {
//                        if (permissions_has_permission($u_rol, "addresses", "update")) {
//                            include "modal_addresses_block.php";
//                        }
//                    } else {
//                        if (permissions_has_permission($u_rol, "addresses", "update")) {
//                            include "modal_addresses_unblock.php";
//                        }
//                    }
//                }
//                echo "</td>";
                // echo "<td>$menu</td>";
                echo "</tr>";
            }
            ?>	
        </tr>
    </tbody>

</table>

<?php
$pagination->createHtml();
?>


