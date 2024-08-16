


<form class="form-horizontal" method="post">
    <input type="hidden" name="c" value="my_info">
    <input type="hidden" name="a" value="ok_update_language">

    <?php
    /**
     * 
      <div class="form-group">
      <label for="" class="col-sm-2 control-label"><?php _t("Actualy i use"); ?></label>
      <div class="col-sm-10">
      <input
      type="text"
      class="form-control"
      id=""
      placeholder="<?php echo users_field_contact_id("language", $u_id); ?>"
      value="<?php echo users_field_contact_id("language", $u_id); ?>"
      disabled=""
      >
      </div>
      </div>
     */
    ?>



    <div class="form-group">
        <label for="language" class="col-sm-2 control-label"><?php _t("Change for"); ?></label>
        <div class="col-sm-10">
            <select class="form-control" name="language" id="language">
                <?php
                foreach (_languages_list_by_status(1) as $key => $value) {
                    echo "<option value=\"$value[language]\" ";
                    echo (users_field_contact_id("language", $u_id) == $value["language"]) ? " selected " : "";
                    echo " >$value[language] - " . _tr($value['name']) . "</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default"><?php _t("Update"); ?></button>
        </div>
    </div>


</form>


