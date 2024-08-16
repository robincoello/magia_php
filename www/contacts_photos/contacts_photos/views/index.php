<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("contacts_photos", "izq"); ?>
    </div>

    <div class="col-lg-9">
        <?php include view("contacts_photos", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



        <?php
// https://api.jquery.com/prop/
        ?>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th><?php _t("Id"); ?></th>
                    <th><?php _t("Contact_id"); ?></th>
                    <th><?php _t("Photo"); ?></th>
                    <th><?php _t("Principal"); ?></th>
                    <th><?php _t("Order_by"); ?></th>
                    <th><?php _t("Status"); ?></th>

                    <th><?php _t("Action"); ?></th>                                                                      
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    if (!$contacts_photos) {
                        message("info", "No items");
                    }


                    //foreach ($liste_info as $address) {
                    foreach ($contacts_photos as $contacts_photos) {


                        $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=contacts_photos&a=details&id=' . $contacts_photos["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=contacts_photos&a=edit&id=' . $contacts_photos["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=contacts_photos&a=delete&id=' . $contacts_photos["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                        //   $photo = addresses_photos_principal($address["id"]);
                        //   $contact_name = contacts_field_id("name", $contacts_photos["contact_id"]);
                        //   $contact_lastname = contacts_field_id("lastname", $contacts_photos["contact_id"]);
                        echo "<tr id=\"$contacts_photos[id]\">";
                        echo "<td>$contacts_photos[id]</td>";
                        echo "<td>$contacts_photos[contact_id]</td>";
                        echo "<td>$contacts_photos[photo]</td>";
                        echo "<td>$contacts_photos[principal]</td>";
                        echo "<td>$contacts_photos[order_by]</td>";
                        echo "<td>$contacts_photos[status]</td>";

                        echo "<td>$menu</td>";

                        echo "</tr>";
                    }
                    ?>	
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th><?php _t("Id"); ?></th>
                    <th><?php _t("Contact_id"); ?></th>
                    <th><?php _t("Photo"); ?></th>
                    <th><?php _t("Principal"); ?></th>
                    <th><?php _t("Order_by"); ?></th>
                    <th><?php _t("Status"); ?></th>

                    <th><?php _t("Action"); ?></th>                                                                      
                </tr>
            </tfoot>
        </table>




        <?php
        /*
          Export:
          <a href="index.php?c=addresses&a=export_json">JSON</a>
          <a href="index.php?c=addresses&a=export_pdf">pdf</a>
         */
        ?>


    </div>
</div>

<?php include view("home", "footer"); ?> 

