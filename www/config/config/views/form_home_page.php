<form class="form-inline" method="post" action="index.php">
    <input type="hidden" name="c" value="config">
    <input type="hidden" name="a" value="ok_home_page_update">       
    <input type="hidden" name="redi" value="<?php echo $redi; ?>">

    <div class="form-group">
        <label class="sr-only" for="home_page">
            <?php _t("My home page"); ?>
        </label>
        <div class="input-group">                    
            <select name="home_page" class="form-control">
                <?php
                // lista de controlladores que este usuario puede ver 
                // para ello mejor ir a bucsaar en permision
                foreach (permissions_search_by_rol($u_rol) as $key => $controller) {
                    //$disabled = ( $controller['controller'] == 'home') ? " disabled " : "";
                    $selected = ( _options_option('home_page') == $controller['controller'] ) ? " selected " : "";

//                    if ($controller['controller'] !== 'home') {
                    echo '<option value="' . $controller['controller'] . '"  ' . $selected . '  ' . $disabled . '>' . ($controller['controller']) . '</option>';
                }
//                }
                ?>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">
        <?php _t("Update"); ?>
    </button>
</form>

