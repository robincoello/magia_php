<form action="index.php" method="get">

    <input type="hidden" name="c" value="addresses">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="by_contact_id">

    <?php # cliente_id ?>
    <div class="form-group">
        <label for="client_id"><?php _t("Cliente_id"); ?></label>

        <select class="form-control selectpicker" data-live-search="true" name="contact_id" required="">
            <?php //foreach ( contacts_list_by_type(1) as $key => $contacts_list ) { ?>
            <?php foreach (contacts_headoffice_list() as $key => $headoffice) { ?>
                <optgroup label="<?php echo contacts_formated($headoffice['id']); ?>">
                    <?php
                    foreach (contacts_list_according_company_and_type($headoffice['id'], 1) as $key => $contacts_list) {
                        $selected = (isset($id) && $contacts_list['id'] == $id ) ? " selected " : "";
                        // no se muestra la emrpea 1022
                        // osea la empresa que factura
                        if ($contacts_list['id'] != _options_option('default_id_company')) {
                            ?>
                            <option value="<?php echo "$contacts_list[id]"; ?>" <?php echo $selected; ?>>
                                <?php echo $contacts_list['id'] . ",  " . contacts_formated($contacts_list['id']); ?>
                            </option>
                            <?php
                        }
                    }
                    ?>
                </optgroup>
            <?php } ?>
        </select>

    </div>
    <?php # /cliente_id    ?>









    <?php /*
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
      </div>
     */ ?>


    <div class="form-group">
        <label for="search"></label>
        <button type="submit" class="btn btn-default"><?php echo _t("Search"); ?></button>
    </div>

</form>