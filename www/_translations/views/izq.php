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
/*
  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "_translations"); ?>
  <?php echo _t("_translations"); ?>
  </a>
  <a href="index.php?c=_translations" class="list-group-item"><?php _t("List"); ?></a>
  <a href="index.php?c=_translations&a=add" class="list-group-item"><?php _t("Add"); ?></a>
  </div>

  <?php  //foreach (_languages_list() as $key => $_language) { ?>
  <a href="#" class="list-group-item"><?php echo $_language['language']; ?> - <?php echo $_language['name']; ?></a>

  <?php // } ?> */
?>



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
    <div class="panel-heading"><?php _t('Search by content'); ?></div>
    <div class="panel-body">

        <form action="index.php" method="get">    
            <input type="hidden" name="c" value="_translations">
            <input type="hidden" name="a" value="search">
            <input type="hidden" name="w" value="byContent">

            <div class="form-group">
                <label for="txt"><?php _t("Text original"); ?></label>
                <input 
                    type="text" 
                    name="txt" 
                    class="form-control" 
                    id="txt" 
                    placeholder="<?php _t("Text original to find"); ?>">
            </div>       
            <button type="submit" class="btn btn-default"><?php _t("Search"); ?></button>
        </form>

    </div>
</div>


<div class="panel panel-default">
    <div class="panel-heading"><?php _t('Search by translation'); ?></div>
    <div class="panel-body">


        <form action="index.php" method="get">    
            <input type="hidden" name="c" value="_translations">
            <input type="hidden" name="a" value="search">
            <input type="hidden" name="w" value="byTranslation">

            <div class="form-group">
                <label for="txt"><?php _t("Text"); ?></label>
                <input type="text" name="txt" class="form-control" id="txt" placeholder="<?php _t("Traduction to find"); ?>">
            </div> 


            <div class="form-group">
                <label for="language"><?php _t("Language"); ?></label>
                <select class="form-control" name="language" id="language">
                    <option value="all"><?php _t("All"); ?></option>
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





<div class="panel panel-primary">
    <div class="panel-heading"><?php _t("To fix"); ?></div>
    <div class="panel-body">

        <p><?php _t("To fix"); ?></p>
        <form method="get" action="index.php">
            <input class="hidden" name="c" value="_translations">
            <input class="hidden" name="a" value="search">
            <input class="hidden" name="w" value="toFix">

            <button type="submit" class="btn btn-default"><?php _t("Search"); ?></button>            
        </form>
    </div>
</div>


