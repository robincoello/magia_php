<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("contacts_titles", "izq"); ?>
    </div>

    <div class="col-lg-9">
        <?php include view("contacts_titles", "nav"); ?>


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
                    <th><?php _t("Title"); ?></th>
                    <th><?php _t("Abbreviation"); ?></th>
                    <th><?php _t("Order_by"); ?></th>
                    <th><?php _t("Status"); ?></th>

                    <th><?php _t("Action"); ?></th>                                                                      
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    if (!$contacts_titles) {
                        message("info", "No items");
                    }


                    //foreach ($liste_info as $address) {
                    foreach ($contacts_titles as $contacts_titles) {


                        $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=contacts_titles&a=details&id=' . $contacts_titles["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=contacts_titles&a=edit&id=' . $contacts_titles["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=contacts_titles&a=delete&id=' . $contacts_titles["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                        //   $photo = addresses_photos_principal($address["id"]);
                        //   $contact_name = contacts_field_id("name", $contacts_titles["contact_id"]);
                        //   $contact_lastname = contacts_field_id("lastname", $contacts_titles["contact_id"]);
                        echo "<tr id=\"$contacts_titles[id]\">";
                        echo "<td>$contacts_titles[id]</td>";
                        echo "<td>$contacts_titles[title]</td>";
                        echo "<td>$contacts_titles[abbreviation]</td>";
                        echo "<td>$contacts_titles[order_by]</td>";
                        echo "<td>$contacts_titles[status]</td>";

                        echo "<td>$menu</td>";

                        echo "</tr>";
                    }
                    ?>	
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th><?php _t("Id"); ?></th>
                    <th><?php _t("Title"); ?></th>
                    <th><?php _t("Abbreviation"); ?></th>
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

