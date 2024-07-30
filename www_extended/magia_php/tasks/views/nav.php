
<nav class="navbar navbar-default">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php?c=tasks">
                <?php _menu_icon("top", 'tasks'); ?>
                <?php _t("Tasks"); ?>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

            </ul>

            <?php include view("tasks", "form_search") ?>

            <ul class="nav navbar-nav">
                <?php if (permissions_has_permission($u_rol, "config", "update")) { ?>
                    <li>
                        <a 
                            data-toggle="collapse" 
                            href="#collapse_form_tasks_pagination_items_limit" 
                            aria-expanded="false" 
                            aria-controls="collapse_form_tasks_pagination_items_limit">
                            <span class="glyphicon glyphicon-cog"></span>
                        </a>
                    </li>



                <?php } ?>
            </ul>

            <ul class="nav navbar-nav">

                <?php
                /**
                 *                 <li><a href="index.php?c=tasks&a=search_advanced"><?php _t("Search avanced"); ?></a></li>


                  <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <?php echo _t("Export"); ?>
                  <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                  <li><a href="index.php?c=tasks&a=export_json"><?php _t("Json"); ?></a></li>
                  <li><a href="index.php?c=tasks&a=export_pdf"><?php _t("Pdf"); ?></a></li>
                  <?php
                  /**
                 *                         <li><a href="index.php?c=tasks&a=export_csv"><?php _t("CSV"); ?></a></li>
                  <li><a href="index.php?c=tasks&a=export_xml"><?php _t("XML"); ?></a></li>


                  <li role="separator" class="divider"></li>
                  <li><a href="#">Other</a></li>
                  </ul>


                  </li>
                 */
                ?>

                <?php
## Controller
## Controller
## Controller
                ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php _menu_icon("top", 'controllers'); ?>
                        <?php echo _t("By controller"); ?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?c=tasks"><?php _menu_icon("top", 'controllers'); ?> <?php _t("All"); ?></a></li>
                        <?php
                        foreach (tasks_unique_from_col("controller") as $tasks_unique_from_col) {
                            echo '<li><a href="index.php?c=tasks&a=search&w&txt=' . $tasks_unique_from_col['controller'] . '">';
                            echo _menu_icon("top", "controllers");
                            echo ' ' . _tr($tasks_unique_from_col['controller']) . '</a></li>';
                        }
                        ?>
                    </ul>
                </li>



                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php _menu_icon("top", 'controllers'); ?>
                        <?php echo _t("By Category"); ?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?c=tasks"><?php _menu_icon("top", 'tasks'); ?> <?php _t("All"); ?></a></li>

                        <?php
                        foreach (tasks_unique_from_col("category_id") as $tufcol) {
                            if ($tufcol['category_id']) {
                                echo '<li><a href="index.php?c=tasks&a=search&w=by_category&category_id=' . $tufcol['category_id'] . '">';
                                echo _menu_icon("top", "controllers");
                                echo ' ' . _tr(tasks_categories_field_id('category', $tufcol['category_id'])) . '</a></li>';
                            }
                        }
                        ?>


                        <?php if (permissions_has_permission($u_rol, 'tasks_categories', "update")) { ?>
                            <li><a href="index.php?c=tasks_categories"><?php _menu_icon("top", 'tasks_categories'); ?> <?php _t("Edit categories"); ?></a></li>
                        <?php } ?>
                    </ul>
                </li>






                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php _menu_icon("top", 'contacts'); ?>
                        <?php echo _t("By user"); ?>
                        <?php echo contacts_formated(_options_option('task_index_show_by_user') ?? $u_id) ?>

                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">  
                        <li>
                            <a href="index.php?c=config&a=ok_task_index_show_by_user&data=all&redi[redi]=2"><?php echo icon("all"); ?> <?php _t("All"); ?></a>
                        </li>

                        <?php
                        foreach (tasks_contacts_unique_from_col("contact_id") as $tasks_by_contact_id) {

                            $icon_selected = ( _options_option('task_index_show_by_user') == $tasks_by_contact_id['contact_id'] ) ? icon("ok") : icon("user");

                            echo '<li>';
                            echo '<a href="index.php?c=config&a=ok_task_index_show_by_user&data=' . $tasks_by_contact_id['contact_id'] . '&redi[redi]=2">';
                            echo " $icon_selected ";
                            echo contacts_formated($tasks_by_contact_id['contact_id']);
                            echo ' </a>';
                            echo '</li>';
                        }
                        ?>
                    </ul>
                </li>







            </ul>



            <div class="collapse navbar-collapse" id="tasks_add">

                <?php if (permissions_has_permission($u_rol, "tasks", "create")) { ?>     

                    <a href="index.php?c=tasks&a=add" type="button" class="btn btn-primary navbar-btn navbar-right">
                        <span class="glyphicon glyphicon-plus-sign"></span>
                        <?php _t("New tasks"); ?>
                    </a>
                    <?php
                    /**
                      <button type="button" class="btn btn-primary navbar-btn navbar-right" data-toggle="modal" data-target="#tasksModal">
                      <span class="glyphicon glyphicon-plus-sign"></span>
                      <?php _t("New tasks"); ?>
                      </button>
                     * 
                     */
                    ?>

                    <div class="modal fade" id="tasksModal" tabindex="-1" role="dialog" aria-labelledby="tasksModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="tasks_addLabel">
                                        <?php _t("Add new tasks"); ?>                
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <?php include view('tasks', 'form_add'); ?>
                                </div>

                            </div>
                        </div>
                    </div>



                <?php } ?>    
            </div>           
        </div>
    </div>
</nav>

<div class="collapse" id="collapse_form_tasks_pagination_items_limit">
    <div class="well">


        <a href="index.php?c=user_options&a=ok_push&option=tasks_index_tmp&data=default&redi[c]=tasks&redi[a]=index">
            <span class="glyphicon glyphicon-th"></span>
        </a>

        <a href="index.php?c=user_options&a=ok_push&option=tasks_index_tmp&data=list&redi[c]=tasks&redi[a]=index">
            <span class="glyphicon glyphicon-th-list"></span>
        </a>



        <?php
//        $redi = 1;
//        include view("tasks", "form_pagination_items_limit");
//        echo "<br>";
//        echo "<h3>" . _tr("Columne to show") . "</h3>";
//        include view("tasks", "form_show_col_from_table");
        ?>
    </div>
</div>



