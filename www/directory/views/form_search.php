<form action="index.php" method="get">

    <input type="hidden" name="c" value="directory">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="by_contact_id">



    <div class="form-group">
        <label for="contact_id"><?php _t("Contact list"); ?></label>
        <select name="contact_id" class="form-control selectpicker" data-live-search="true" data-width="100%"   >
            <?php
            //foreach (contacts_list_by_type(1) as $key => $value) {
            foreach (contacts_list() as $key => $contacts_list) {
                // $selected = (xxxx == $value[contact_id]) ? " selected ": " "; 

                echo "<option value=\"$contacts_list[id]\">" . contacts_formated($contacts_list['id']) . "</option>";
            }
            ?>
        </select>
    </div>

    <?php
    /*
      <div class="form-group">
      <label for="name"><?php _t("Type"); ?></label>
      <select class="selectpicker" data-live-search="true" data-width="100%"  name="name">
      <option value="all"><?php echo _t("All"); ?></option>

      <?php
      foreach (directory_names_list() as $key => $directory_names_list) {
      // $selected = (xxxx == $value[contact_id]) ? " selected ": " ";

      echo "<option value=\"$directory_names_list[name]\">$directory_names_list[name]</option>";
      }
      ?>
      </select>
      </div> */
    ?>


    <div class="form-group">
        <label for="search"></label>
        <button type="submit" class="btn btn-default"><?php echo _t("Search"); ?></button>
    </div>






</form>