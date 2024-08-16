<?php

// crea html 
if (modules_field_module("status", "tasks") && permissions_has_permission($u_rol, "tasks", "read")) {
    $args = array(
        "c" => $c,
        "name" => 'robinson',
        "form" => array(
            "category_id" => null,
            "contact_id" => $u_id,
            "controller" => $c,
            "doc_id" => null,
            "redi" => array(
                "redi" => "30",
                "c" => $c,
                "id" => null
            )
        ),
    );

    tasks_create_html('tmp_izq_index', $args);
}
?>




<?php

/**
 * 
 * 
  <div class="panel panel-primary">
  <div class="panel-heading"><?php _t("Text without translation"); ?></div>
  <div class="panel-body">

  <p><?php _t("Find texts without translation"); ?></p>
  <form method="get" action="index.php">
  <input class="hidden" name="c" value="_content">
  <input class="hidden" name="a" value="search">
  <input class="hidden" name="w" value="hasNotTranslation">

  <div class="form-group">
  <label for="language"><?php _t("Language"); ?></label>
  <select class="form-control" name="language" id="language">

  <?php
  foreach (_languages_list() as $key => $value) {

  $selected = ( $value['language'] == users_field_contact_id("language", $u_id) ) ? " selected " : "";

  echo '<option value="' . $value['language'] . '" ' . $selected . '>' . _tr($value['name']) . '</option>';
  //echo '<option value="' . $value['language'] . '">' . _tr($value['name']) . '</option>';
  }
  ?>
  </select>
  </div>
  <button type="submit" class="btn btn-default"><?php _t("Search"); ?></button>
  </form>
  </div>
  </div>



  <div class="panel panel-default">
  <div class="panel-heading"><?php _t("Text without translation"); ?></div>
  <div class="panel-body">

  <p><?php _t("Find texts without translation"); ?></p>
  <form method="get" action="index.php">
  <input class="hidden" name="c" value="_content">
  <input class="hidden" name="a" value="search">
  <input class="hidden" name="w" value="hasNotTranslation">

  <div class="form-group">
  <label for="language"><?php _t("Language"); ?></label>
  <select class="form-control" name="language" id="language">
  <?php
  foreach (_languages_list() as $key => $value) {
  echo '<option value="' . $value['language'] . '">' . _tr($value['name']) . '</option>';
  }
  ?>
  </select>
  </div>




  <div class="form-group">
  <label for="language"><?php _t("Tmp"); ?></label>
  <select class="form-control" name="tmp" id="tmp">
  <option value="1">Normal</option>
  <option value="2">Google</option>
  </select>
  </div>





  <button type="submit" class="btn btn-default"><?php _t("Search"); ?></button>
  </form>
  </div>
  </div>


  <div class="panel panel-default">
  <div class="panel-heading"><?php _t("Export to translate"); ?></div>
  <div class="panel-body">

  <form method="get" action="index.php">
  <input class="hidden" name="c" value="_content">
  <input class="hidden" name="a" value="search">
  <input class="hidden" name="w" value="exportToTranslate">

  <div class="form-group">
  <label for="language"><?php _t("Language"); ?></label>
  <select class="form-control" name="language" id="language">
  <?php
  foreach (_languages_list() as $key => $value) {
  echo '<option value="' . $value['language'] . '">' . _tr($value['name']) . '</option>';
  }
  ?>
  </select>
  </div>


  <div class="form-group">
  <label for="languageTo"><?php _t("Language"); ?></label>
  <select class="form-control" name="languageTo" id="languageTo">
  <?php
  foreach (_languages_list() as $key => $value) {
  echo '<option value="' . $value['language'] . '">' . _tr($value['name']) . '</option>';
  }
  ?>
  </select>
  </div>



  <div class="form-group">
  <label for="start"><?php _t("Start"); ?></label>
  <select class="form-control" name="start" id="start">
  <?php
  $i = 0;
  $j = $i + 100;
  while ($i < 5000) {
  echo '<option value="' . $i . '">' . $i . ' - ' . $j . '</option>';
  $i = $i + 100;
  $j = $i + 100;
  }
  ?>
  </select>
  </div>





  <button type="submit" class="btn btn-default">Submit</button>
  </form>
  </div>
  </div>

  <div class="panel panel-default">
  <div class="panel-heading"><?php _t("Export language"); ?></div>
  <div class="panel-body">

  <form method="get" action="index.php">
  <input class="hidden" name="c" value="_content">
  <input class="hidden" name="a" value="search">
  <input class="hidden" name="w" value="exportLanguage">

  <div class="form-group">
  <label for="languageFrom"><?php _t("From language"); ?></label>
  <select class="form-control" name="languageFrom" id="languageFrom">
  <?php
  foreach (_languages_list() as $key => $value) {
  echo '<option value="' . $value['language'] . '">' . _tr($value['name']) . '</option>';
  }
  ?>
  </select>
  </div>


  <div class="form-group">
  <label for="languageTo"><?php _t("to language"); ?></label>
  <select class="form-control" name="languageTo" id="languageTo">
  <?php
  foreach (_languages_list() as $key => $value) {
  echo '<option value="' . $value['language'] . '">' . _tr($value['name']) . '</option>';
  }
  ?>
  </select>
  </div>

  <button type="submit" class="btn btn-default">Submit</button>
  </form>
  </div>
  </div>

 */
?>




