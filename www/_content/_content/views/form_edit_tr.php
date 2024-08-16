<form method="post" action="index.php">
    <input type="hidden" name="c" value="_content">
    <input type="hidden" name="a" value="ok_add_tr">
    <input type="hidden" name="content_id" value="<?php echo "$_content_item[id]" ?>">



    <div class="form-group">
        <label for="translation"><?php _t("Translation"); ?></label>
        <textarea disabled="" class="form-control" name="translation" id="translation" placeholder="<?php echo $_content_item["frase"] ?>"><?php echo $_content_item["frase"] ?></textarea>
    </div>





    <div class="form-group">
        <label for="language"><?php _t("Language"); ?></label>
        <select class="form-control" name="language" id="language">
            <?php
            foreach (_languages_list() as $key => $value) {

                $selected = ($value['language'] == $language ) ? " selected " : "";

                echo '<option value="' . $value['language'] . '" ' . $selected . '>' . $value['language'] . '</option>';
            }
            ?>


        </select>
    </div>

    <?php
    // echo var_dump($_content_item['frase']);
    ?>



    <div class="form-group">
        <label for="translation"><?php _t("Translation"); ?></label>
        <textarea autofocus="" class="form-control" name="translation" id="translation" placeholder="Put your translations here"></textarea>
    </div>





    <button type="submit" class="btn btn-default"><?php _t("Add traduction"); ?></button>

</form>