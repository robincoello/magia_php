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
            <th><?php _t("Content"); ?></th>
            <th><?php _t("Language"); ?></th>
            <th><?php _t("Translation"); ?></th>                                                                       
            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Content"); ?></th>
            <th><?php _t("Language"); ?></th>
            <th><?php _t("Translation"); ?></th>                                                                       
            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </tfoot>

    <tbody>
        <?php
        /*                <form method="get" action="index.php">
          <input type="hidden" name="c" value="_translations">
          <input type="hidden" name="a" value="search">
          <tr>
          <td></td>
          <td><input class="form-control" type="text" name="content" placeholder="content"></td>
          <td>
          <select class="form-control" name="language">
          <option value="all"><?php _t("All"); ?></option>
          <?php foreach (_languages_list() as $key => $_language) { ?>
          <option value="<?php echo $_language['language']; ?>"><?php echo $_language['language']; ?> - <?php echo $_language['name']; ?></option>
          <?php }?>
          </select>
          </td>
          <td></td>
          <td><input class="btn btn-primary" type="submit" value="<?php _t("Search"); ?>"></td>
          </tr>
          </form> */
        ?>


        <tr>
            <?php
            if (!$_translations) {
                message("info", "No items");
            }



            foreach ($_translations as $_translation_items) {


                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=_translations&a=details&id=' . $_translation_items["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=_translations&a=edit&id=' . $_translation_items["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=_translations&a=delete&id=' . $_translation_items["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                //   $photo = addresses_photos_principal($address["id"]);
                //   $contact_name = contacts_field_id("name", $_translation_items["contact_id"]);
                //   $contact_lastname = contacts_field_id("lastname", $_translation_items["contact_id"]);
                echo "<tr id=\"$_translation_items[id]\">";
                echo "<td>$_translation_items[id]</td>";
                echo "<td>$_translation_items[content]</td>";
                echo "<td>$_translation_items[language]</td>";
                echo "<td>$_translation_items[translation]</td>";

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