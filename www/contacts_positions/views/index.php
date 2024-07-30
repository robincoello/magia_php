<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("contacts_positions", "izq"); ?>
    </div>

    <div class="col-lg-9">
        <?php include view("contacts_positions", "nav"); ?>


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
                    <th><?php _t("Contact_id"); ?></th>
                    <th><?php _t("Company_id"); ?></th>
                    <th><?php _t("Position"); ?></th>

                    <th><?php _t("Action"); ?></th>                                                                      
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    if (!$contacts_positions) {
                        message("info", "No items");
                    }


                    //foreach ($liste_info as $address) {
                    foreach ($contacts_positions as $contacts_positions) {


                        $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=contacts_positions&a=details&id=' . $contacts_positions["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=contacts_positions&a=edit&id=' . $contacts_positions["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=contacts_positions&a=delete&id=' . $contacts_positions["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                        //   $photo = addresses_photos_principal($address["id"]);
                        //   $contact_name = contacts_field_id("name", $contacts_positions["contact_id"]);
                        //   $contact_lastname = contacts_field_id("lastname", $contacts_positions["contact_id"]);
                        echo "<tr id=\"$contacts_positions[id]\">";
                        echo "<td>$contacts_positions[contact_id]</td>";
                        echo "<td>$contacts_positions[company_id]</td>";
                        echo "<td>$contacts_positions[position]</td>";

                        echo "<td>$menu</td>";

                        echo "</tr>";
                    }
                    ?>	
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th><?php _t("Contact_id"); ?></th>
                    <th><?php _t("Company_id"); ?></th>
                    <th><?php _t("Position"); ?></th>

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

