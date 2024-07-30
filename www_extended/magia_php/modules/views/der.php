
<div class="panel panel-primary">
    <div class="panel-heading">
        <?php _menu_icon("top", 'modules'); ?>
        <?php _t($modules['module']); ?>
    </div>
    <div class="panel-body">


        <form action="index.php" method="get" class="navbar-form navbar-left">
            <input type="hidden" name="c" value="modules">
            <input type="hidden" name="a" value="ok_change_status">
            <input type="hidden" name="id" value="<?php echo "$id"; ?>">   
            <?php
            if ($modules['status'] == 1) {
                // activo      
                echo "<p>Modulo activo</p>";
                echo '<input type="hidden" name="status" value="0">';
                echo '<button type="submit" class="btn btn-danger">' . _tr("Disable") . '</button>';
            } else {
                // inactivo
                echo "<p>Modulo bloqueado</p>";
                echo '<input type="hidden" name="status" value="1">';
                echo '<button type="submit" class="btn btn-primary">' . _tr("Active") . '</button>';
            }
            ?>
        </form>


    </div>
</div>



<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Changer module"); ?>
    </div>
    <div class="panel-body">

        <p>
            <?php _t("Change the module to which this submodule belongs"); ?>
        </p>



        <form class="form-inline" method="post" action="index.php">
            <input type="hidden" name="c" value="modules">
            <input type="hidden" name="a" value="ok_push_father_to_module">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="redi[redi]" value="2">



            <div class="form-group">

                <?php
//                vardump($module->getFather());
                ?>

                <label class="sr-only" for="father"><?php _t("Module"); ?></label>                
                <select class="form-control selectpicker" name="father" data-live-search="true">
                    <option value="null"><?php _t('Select one'); ?></option>
                    <?php
                    foreach (modules_list() as $key => $mlwof_items) {
                        $selected = ($mlwof_items['module'] == $module->getModule() ) ? " selected " : "";
                        echo '<option value="' . $mlwof_items["module"] . '" ' . $selected . ' >' . $mlwof_items["module"] . '</option>    ';
                    }
                    ?>
                </select>
            </div>



            <button type="submit" class="btn btn-default">
                <?php _t("Changer"); ?>
            </button>
        </form>



    </div>
</div>






<div class="panel panel-primary">
    <div class="panel-heading">
        <?php _menu_icon("top", 'modules'); ?>
        <?php _t("Sub modules"); ?>
    </div>
    <div class="panel-body">
        <p><?php _t("Sub modules"); ?></p>      
        <?php
        $sub_modules = modules_search_sub_modules_by_module($modules['module']);
        $i = 1;
        foreach ($sub_modules as $key => $sm) {
            echo $i++ . "<a href='index.php?c=modules&a=ok_remove_sm_from_m&id=$sm[id]&redi[redi]=2&redi[id]=$id'>" . icon("trash") . "</a> $sm[module] <br>";
        }
        ?>          
    </div>
</div>



<div class="panel panel-primary">
    <div class="panel-heading">
        <?php _menu_icon("top", 'modules'); ?>
        <?php _t("Sub modules"); ?>
    </div>
    <div class="panel-body">
        <p>Sub modulos huerfanos</p>
        <?php
        $folder_list = array_diff(scandir("www"), array('..', '.', '.*'));
        $sub_moduls_orphans = array();
        $module = $modules['module'];
        $i = 1;
        foreach ($folder_list as $key => $folder) {
            if (is_dir("www/" . $folder)) {
                // este folder (module) tiene padre?
//                if (modules_search_sub_modules_by_module($folder)) {
//                    if (!modules_field_module('father', $folder)) {
                if (!modules_field_module('id', $folder)) {
//                    array_push($sub_moduls_orphans, $folder);
                    echo $i++ . " <a href='index.php?c=modules&a=ok_add_sm2m&father=$modules[module]&module=$folder&id=$id'>$folder</a> <br>";
                } else {
                    //    echo $i++ . " <a href='index.php?c=modules&a=ok_add_sm2m&father=$modules[module]&module=$folder&id=$id'>$folder</a> <br>";
                }
            }
        }
        ?>
    </div>
</div>


<?php
/**
  <div class="panel panel-primary">
  <div class="panel-heading">
  <?php _menu_icon("top", 'modules'); ?>
  <?php _t("Sub modules 2 "); ?>
  </div>
  <div class="panel-body">
  <p>Sub modulos con father null</p>

  <ul>
  <?php
  foreach (modules_list_with_father() as $key => $mlwf) {
  echo "<li><a href='index.php?c=modules&a=ok_add_father_to_m&father=$modules[module]&id=$mlwf[id]&redi[redi]=2&redi[id]=$id'>$mlwf[label] - $mlwf[module] </a></li>";
  }
  ?>
  </ul>
  </div>
  </div>
 * 
 */
?>


