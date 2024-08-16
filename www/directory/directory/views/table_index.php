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

            <th><?php _t("#"); ?></th>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Contact id"); ?></th>
            <th><?php _t("Contact"); ?></th>  
            <th><?php _t("Tva"); ?></th>  
            <th><?php _t("Type"); ?></th>
            <th><?php _t("Data"); ?></th>
        </tr>
    </thead>

    <tfoot>
        <tr>
            <th><?php _t("#"); ?></th>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Contact id"); ?></th>
            <th><?php _t("Contact"); ?></th>  
            <th><?php _t("Tva"); ?></th>  
            <th><?php _t("Type"); ?></th>
            <th><?php _t("Data"); ?></th>
        </tr>
    </tfoot>


    <tbody>
        <tr>
            <?php
            if (!$directory) {
                message("info", "No items");
            }


            $i = 0;
            foreach ($directory as $directory) {


                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=directory&a=details&id=' . $directory["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=directory&a=edit&id=' . $directory["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=directory&a=delete&id=' . $directory["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';

                //   $photo = addresses_photos_principal($address["id"]);
                //   $contact_name = contacts_field_id("name", $directory["contact_id"]);
                //   $contact_lastname = contacts_field_id("lastname", $directory["contact_id"]);
                echo "<tr id=\"$directory[id]\">";
                echo "<td>" . $i++ . "</td>";
                echo "<td>$directory[id]</td>";
                echo "<td>$directory[contact_id]</td>";
                // echo "<td><a href=\"index.php?c=contacts&a=details&id=".contacts_field_id("owner_id", $directory['contact_id'])."\">" . contacts_formated(contacts_field_id("owner_id", $directory['contact_id'])) . "</a></td>" ;
                echo "<td><a href=\"index.php?c=contacts&a=directory&id=$directory[contact_id]\">" . contacts_formated($directory['contact_id']) . "</a></td>";
                //echo "<td>$directory[address_id]</td>" ;
                echo "<td>" . contacts_field_id('tva', $directory["id"]) . "</td>";
                echo "<td>$directory[name]</td>";
                echo "<td>$directory[data]</td>";
                //echo "<td>$directory[order_by]</td>" ;
                //echo "<td>$directory[status]</td>" ;
                // echo "<td>$menu</td>" ;

                echo "</tr>";
            }
            ?>	



        </tr>
    </tbody>

</table>

<?php
// Genera la pagination
$pagination->createHtml();
?>




