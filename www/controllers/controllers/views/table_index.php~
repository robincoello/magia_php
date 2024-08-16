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
            <th><?php _t("Controller"); ?></th>
            <th><?php _t("Title"); ?></th>
            <th><?php _t("Description"); ?></th>
            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Controller"); ?></th>
            <th><?php _t("Title"); ?></th>
            <th><?php _t("Description"); ?></th>
            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </tfoot>
    <tbody>
        <tr>
            <?php
            foreach ($controllers as $controller) {
                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=controllers&a=details&id=' . $controller["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=controllers&a=edit&id=' . $controller["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=controllers&a=delete&id=' . $controller["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                //   $photo = addresses_photos_principal($address["id"]);
                //   $contact_name = contacts_field_id("name", $controller["contact_id"]);
                //   $contact_lastname = contacts_field_id("lastname", $controller["contact_id"]);
                echo "<tr id=\"$controller[id]\">";
                echo "<td>$controller[id]</td>";
                echo "<td>$controller[controller]</td>";
                echo "<td>$controller[title]</td>";
                echo "<td>$controller[description]</td>";
                echo "<td>$menu</td>";
                echo "</tr>";
            }
            ?>	
        </tr>
    </tbody>
</table>
<?php $pagination->createHtml(); ?>

