<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("users_ask_pass", "izq"); ?>
    </div>

    <div class="col-lg-10">
        <?php include view("users_ask_pass", "nav"); ?>


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
                    <th><?php _t("Code"); ?></th>
                    <th><?php _t("Date"); ?></th>
                    <th><?php _t("Status"); ?></th>

                    <th><?php _t("Action"); ?></th>                                                                      
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    if (!$users_ask_pass) {
                        message("info", "No items");
                    } else {


                        //foreach ($liste_info as $address) {
                        foreach ($users_ask_pass as $users_ask_pass) {


                            $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=users_ask_pass&a=details&id=' . $users_ask_pass["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=users_ask_pass&a=edit&id=' . $users_ask_pass["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=users_ask_pass&a=delete&id=' . $users_ask_pass["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                            //   $photo = addresses_photos_principal($address["id"]);
                            //   $contact_name = contacts_field_id("name", $users_ask_pass["contact_id"]);
                            //   $contact_lastname = contacts_field_id("lastname", $users_ask_pass["contact_id"]);
                            echo "<tr id=\"$users_ask_pass[id]\">";
                            echo "<td>$users_ask_pass[id]</td>";
                            echo "<td>" . contacts_formated($users_ask_pass['contact_id']) . " (" . $users_ask_pass['contact_id'] . ")</td>";
                            echo "<td>$users_ask_pass[code]</td>";
                            echo "<td>$users_ask_pass[date]</td>";
                            echo "<td>$users_ask_pass[status]</td>";

                            echo "<td>$menu</td>";

                            echo "</tr>";
                        }
                    }
                    ?>	
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th><?php _t("Id"); ?></th>
                    <th><?php _t("Contact_id"); ?></th>
                    <th><?php _t("Code"); ?></th>
                    <th><?php _t("Date"); ?></th>
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

