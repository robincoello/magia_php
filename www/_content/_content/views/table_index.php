<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>


<nav aria-label="...">
    <ul class="pagination">
        <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
        <?php
        $abc = "abcdefghijklmnopqrstuvwxyz0123456789$-_";
        $i = 0;
        while ($i < strlen($abc)) {
            $active = ($abc[$i] == $l) ? "active" : "";
            echo '<li class="' . $active . '"><a href="index.php?c=_content&a=search&w=start_with&l=' . $abc[$i] . '">' . $abc[$i] . '<span class="sr-only">(current)</span></a></li>';
            $i++;
        }
        ?>

    </ul>
</nav>

<table class="table table-striped table-condensed table-bordered" >
    <thead>
        <tr class="info">
            <th><?php _t("#"); ?></th>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("encoding"); ?></th>                    
            <th><?php _t("Frase"); ?></th>
            <th><?php _t("Contexto"); ?></th>
            <th><?php _t("Languages"); ?></th>
            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("#"); ?></th>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Frase"); ?></th>
            <th><?php _t("Contexto"); ?></th>
            <th><?php _t("Languages"); ?></th>
            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </tfoot>
    <tbody>
        <tr>
            <?php
            if (!$_content) {
                message("info", "No items");
            }

            $i = 1;
            foreach ($_content as $_content_item) {

                $lang = array();
                foreach (_languages_list_by_status(1) as $key => $_languages_list) {
                    array_push($lang, $_languages_list["language"]);
                }

                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              ' . _tr("Actions") . '
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=_content&a=details&id=' . $_content_item["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=_content&a=edit&id=' . $_content_item["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=_content&a=delete&id=' . $_content_item["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                //   $photo = addresses_photos_principal($address["id"]);
                //   $contact_name = contacts_field_id("name", $_content_item["contact_id"]);
                //   $contact_lastname = contacts_field_id("lastname", $_content_item["contact_id"]);
                echo "<tr id=\"$_content_item[id]\">";
                echo "<td>$i</td>";
                echo "<td>$_content_item[id]</td>";
                echo "<td>" . mb_detect_encoding($_content_item['frase']) . "</td>";
                echo "<td>$_content_item[frase]</td>";
                echo "<td>$_content_item[contexto]</td>";
                echo "<td>";

                foreach ($lang as $key => $l) {
                    //echo (_translations_by_content_language($_content_item["frase"], $l)) ? '<span class="label label-info">' . $l . '</span> ' : '<span class="label label-default">' . $l . '</span> ';
                    include (_translations_by_content_language($_content_item["frase"], $l)) ? view("_content", "modal_details") : view("_content", "modal_add");
                } echo "</td>";

                echo "<td>$menu</td>";
                echo '<td><a href="#"></a>DELETE</td>';

                echo "</tr>";
                $i++;
            }
            ?>	
        </tr>
    </tbody>

</table>



