<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("my_info", "izq"); ?>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
    </div>


    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-8">
        <?php //include view("my_info", "nav"); ?>  



        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1>
            <?php _t("Home page"); ?>
        </h1>

        <p><?php _t("What page do you want to see at the beginning"); ?>?</p>





        <?php
        //vardump(user_options_search_by_user_option($u_id, 'home_page'));
        //vardump(user_options_search_by_user_option($u_id, 'home_page')['data']);
        ?>


        <form class="form-inline" method="post" action="index.php">
            <input type="hidden" name="c" value="my_info">
            <input type="hidden" name="a" value="ok_home_page_update">            


            <div class="form-group">
                <label class="sr-only" for="home_page">Home page</label>
                <div class="input-group">                    

                    <select name="home_page" class="form-control" disabled="">
                        <?php
                        // poner los que solo estan activos
                        foreach (permissions_search_by_rol($u_rol) as $key => $controller) {
                            // si el modulo y el padre esta activo 
//                            if (modules_field_module('status', $controller['controller']) && modules_field_module('status', modules_field_module('father', $controller['controller']))) {
                            if (modules_field_module('status', $controller['controller'])) {

                                $selected = ( user_options_search_by_user_option($u_id, 'home_page')['data'] == $controller['controller'] ) ? " selected " : "";

//                                if ($controller['controller'] !== 'home') {
                                echo '<option value="' . $controller['controller'] . '"  ' . $selected . '>' . _tr($controller['controller']) . '</option>';
                            }
//                            }
                        }
                        ?>
                    </select>


                </div>
            </div>

            <button type="submit" class="btn btn-primary" disabled="">
                <?php _t("Update"); ?>
            </button>
        </form>

    </div>
</div>

<?php include view("home", "footer"); ?>  



