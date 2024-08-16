


<div class="mypanel"></div>

<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>


<table class="table table-striped">
    <thead>
        <tr class="info">
            <th><?php _t("#"); ?></th>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Delete"); ?></th>
            <th width="40%"><?php _t("Frase"); ?></th>                    
            <th><?php _t("Languages"); ?></th>
            <th><?php _t("Translation"); ?></th>                                                                      
            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </thead>

    <tfoot>
        <tr class="info">
            <th><?php _t("#"); ?></th>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Delete"); ?></th>
            <th width="40%"><?php _t("Frase"); ?></th>                    
            <th><?php _t("Languages"); ?></th>
            <th><?php _t("Translation"); ?></th>                                                                      
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
                foreach (_languages_list() as $key => $_languages_list) {
                    array_push($lang, $_languages_list["language"]);
                }


                //$suggestion = _diccionario_search_translation_by_content_lang($_content_item['frase'], $language);
                $suggestion = _translation_suggestion($_content_item['frase'], $language);

                $ttt = _ttt($_content_item['frase']);

                //   vardump($language); 


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
                echo "<td><a href='index.php?c=_content&a=deleteOk&id=" . $_content_item['id'] . "&redi=1&language=$language' class='btn btn-danger'>" . _tr("Delete") . "</a></td>";
                echo "<td>$_content_item[frase]</td>";
                echo "<td>" . _tr(_languages_field_language('name', $language)) . "</td>";
                //  echo "<td>$_content_item[contexto]</td>";
                echo "<td>";
                ?>



        <form class="form-inline" method="post" >
            <input type="hidden" name="c" value="_translations">
            <input type="hidden" name="a" value="ok_add">
            <input type="hidden" name="content" value="<?php echo $_content_item['frase']; ?>">
            <input type="hidden" name="language" value="<?php echo $language; ?>">
            <input type="hidden" name="redi" value="2">

            <?php // vardump(_ttt($_content_item['frase'])); ?>
            <div class="form-group">
                <label class="sr-only" for="translation">Tr</label>
                <?php
                /**
                 *                 <textarea 
                  id="translation_2"
                  name="translation"
                  rows="5"
                  cols="25"
                  placeholder="<?php echo "$_content_item[frase]"; ?>"><?php echo "$_content_item[frase]"; ?></textarea>
                 */
//                vardump($language);
                ?>

                <input 
                    class="form-control"
                    type="text" 
                    name="translation" 
                    value="<?php echo ($language == 'en_GB') ? $_content_item['frase'] : ""; ?>"
                    placeholder="<?php //echo "$_content_item[frase]";     ?>"
                    >




            </div>
            <button type="submit" class="btn btn-primary btn-sm"><?php _t("Add"); ?></button>
        </form>









        <?php
        foreach ($lang as $key => $l) {
            //echo (_translations_by_content_language($_content_item["frase"], $l)) ? '<span class="label label-info">' . $l . '</span> ' : '<span class="label label-default">' . $l . '</span> ';
            //  include (_translations_by_content_language($_content_item["id"], $l)) ? view("_content", "modal_details") : view("_content", "modal_add");
        } echo "</td>";

        echo "<td>$menu</td>";

        echo "</tr>";

        $i++;
    }
    ?>	
</tr>
</tbody>

</table>




