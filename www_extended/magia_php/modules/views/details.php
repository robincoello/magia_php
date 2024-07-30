<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("modules", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-7 col-lg-7">
        <?php include "nav.php"; ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1><?php echo $module->getModule(); ?></h1>


        <p>
            <?php echo $module->getDescription(); ?>
        </p>        

        <p><b><?php _t("Father"); ?></b> : <?php echo $module->getFather(); ?></p>
        <p><b><?php _t("Label"); ?></b> : <?php echo $module->getLabel(); ?></p>
        <p><b><?php _t("Module"); ?></b> : <?php echo $module->getModule(); ?></p>
        <p><b><?php _t("Description"); ?></b> : <?php echo $module->getDescription(); ?></p>
        <p><b><?php _t("Author"); ?></b> : <?php echo $module->getAuthor(); ?></p>
        <p><b><?php _t("Email"); ?></b> : <?php echo $module->getAuthor_email(); ?></p>
        <p><b><?php _t("Web"); ?></b> : <a target="new" href="<?php echo $module->getUrl(); ?>"><?php echo $module->getUrl(); ?></a></p>
        <p><b><?php _t("Version"); ?></b> : <?php echo $module->getVersion(); ?></p>
        <p><b><?php _t("Order by"); ?></b> : <?php echo $module->getOrder_by(); ?></p>
        <p><b><?php _t("Status"); ?></b> : <?php echo $module->getStatus(); ?></p>






        <?php //include view("modules", "form_details");   ?>

        <?php
        // vardump(modules_list_modules());
//        vardump(($modules['module']));
//        vardump(modules_search_module_by_sub_module('tasks_categories'));
//        vardump(modules_search_sub_modules_by_module($modules['module']));
        ?>


        <br>


        <?php
//        vardump($module);

        if ($u_rol == 'root') {
            ?> 
            <br>
            <h3>
                <?php _t("Sub Modules"); ?>
            </h3>

            <p>
                <?php _t("This table check if a submodule is registred like a controller and root user has full permission"); ?>
            </p>

            <table class="table table-condensed" border>
                <thead>
                    <tr>
                        <th><?php _t("Id"); ?></th>
                        <th><?php _t("Label"); ?></th>
                        <th><?php _t("Father"); ?></th>
                        <th><?php _t("Module"); ?></th>
                        <th><?php _t("Is controller"); ?></th>
                        <th><?php _t("In menu"); ?></th>
                        <th><?php _t("Root"); ?> / CRUD</th>
                        <th>?</th>
                        <th>?</th>
                        <th>?</th>

                    </tr>
                </thead>


                <?php
                $childrens = modules_search_sub_modules_by_module($module->getModule());

                $error = array();
                foreach ($childrens as $key => $value) {
                    if (!modules_field_module('status', $value['module'])) {
                        array_push($error, " " . $value['module']);
                    }
                }
                array_push($error, "Son los modulos requeridos por audio");

//            vardump($error);

                $i = 1;
                foreach ($childrens as $m_children) {

                    $link_add_like_controller = '<a href="index.php?c=controllers&a=add&controller=' . $m_children['module'] . '">add like controller</>';
                    $link_add_crud_to_root = '<a href="index.php?c=permissions&a=add&controller=' . $m_children['module'] . '">add like controller</> <br>';
                    $link_add_menu = '<a href="index.php?c=_menus&a=add&location=top&label=' . $m_children['module'] . '&father_id=&controller=' . $m_children['module'] . '&module=' . $m_children['module'] . '&description=' . $m_children['module'] . '&author=' . $module->getAuthor() . '&author_email=' . $module->getAuthor_email() . '&url=index.php?c=' . $m_children['module'] . '&version=1&order_by=1">add to menu</> <br>';
                    ?>




                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $m_children['label']; ?></td>
                        <td><?php echo $m_children['father']; ?></td>
                        <td><?php echo $m_children['module']; ?></td>
                        <td><?php echo (controllers_is_controller($m_children['module'])) ? "yes" : "<b>" . $m_children['module'] . "</b><br>" . " $link_add_like_controller"; ?></td>

                        <td><?php echo (_menus_is_controller($m_children['module'])) ? "yes" : "<b>" . $m_children['module'] . "</b><br>" . " $link_add_menu"; ?></td>

                        <td>
                            <?php echo permissions_has_permission('root', $m_children['module'], "create") ? 'C' : "$link_add_crud_to_root"; ?>
                            <?php echo permissions_has_permission('root', $m_children['module'], "read") ? 'R' : "$link_add_crud_to_root"; ?>
                            <?php echo permissions_has_permission('root', $m_children['module'], "update") ? 'U' : "$link_add_crud_to_root"; ?>
                            <?php echo permissions_has_permission('root', $m_children['module'], "delete") ? 'D' : "$link_add_crud_to_root"; ?>

                        </td>
                        <td>-</td>
                        <td>-</td>
                        <td>*</td>


                    </tr>

                    <?php
                }
                ?>




            </table>
        <?php }
        ?>

    </div>

    <div class="col-sm-3 col-md-3 col-lg-3">
        <?php include view("modules", "der"); ?>
    </div>
</div>

<?php include view("home", "footer"); ?>

