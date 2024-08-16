<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("_languages", "izq"); ?>
    </div>

    <div class="col-lg-9">
        <?php include view("_languages", "nav"); ?>


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
                    <th><?php _t("Language"); ?></th>
                    <th><?php _t("Name"); ?></th>
                    <th><?php _t("Order_by"); ?></th>
                    <th><?php _t("Status"); ?></th>

                    <th><?php _t("Action"); ?></th>                                                                      
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    if (!$_languages) {
                        message("info", "No items");
                    }


                    //foreach ($liste_info as $address) {
                    foreach ($_languages as $_languages) {


                        $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=_languages&a=details&id=' . $_languages["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=_languages&a=edit&id=' . $_languages["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=_languages&a=delete&id=' . $_languages["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                        //   $photo = addresses_photos_principal($address["id"]);
                        //   $contact_name = contacts_field_id("name", $_languages["contact_id"]);
                        //   $contact_lastname = contacts_field_id("lastname", $_languages["contact_id"]);
                        echo "<tr id=\"$_languages[id]\">";
                        echo "<td>$_languages[id]</td>";
                        echo "<td>$_languages[language]</td>";
                        echo "<td>$_languages[name]</td>";
                        echo "<td>$_languages[order_by]</td>";
                        echo "<td>$_languages[status]</td>";

                        echo "<td>$menu</td>";

                        echo "</tr>";
                    }
                    ?>	
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th><?php _t("Id"); ?></th>
                    <th><?php _t("Language"); ?></th>
                    <th><?php _t("Name"); ?></th>
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

