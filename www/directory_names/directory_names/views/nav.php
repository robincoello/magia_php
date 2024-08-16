
<nav class="navbar navbar-default">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <?php _menu_icon("top", 'directory_names'); ?>
                <?php _t("Directory_names"); ?>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

            </ul>

            <?php include view("directory_names", "form_search") ?>

            <ul class="nav navbar-nav">
                <?php if (permissions_has_permission($u_rol, "config", "update")) { ?>
                    <li>
                        <a 
                            data-toggle="collapse" 
                            href="#collapse_form_directory_names_pagination_items_limit" 
                            aria-expanded="false" 
                            aria-controls="collapse_form_directory_names_pagination_items_limit">
                            <span class="glyphicon glyphicon-cog"></span>
                        </a>
                    </li>



                <?php } ?>
            </ul>

            <ul class="nav navbar-nav">
                <li><a href="index.php?c=directory_names&a=search_advanced"><?php _t("Search avanced"); ?></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php echo _t("Export"); ?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?c=directory_names&a=export_json"><?php _t("Json"); ?></a></li>
                        <li><a href="index.php?c=directory_names&a=export_pdf"><?php _t("Pdf"); ?></a></li>
                        <li><a href="index.php?c=directory_names&a=export_csv"><?php _t("CSV"); ?></a></li>
                        <li><a href="index.php?c=directory_names&a=export_xml"><?php _t("XML"); ?></a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Other</a></li>
                    </ul>
                </li>
            </ul>



            <div class="collapse navbar-collapse" id="directory_names_add">
                <?php if (permissions_has_permission($u_rol, "directory_names", "create")) { ?>     

                    <button type="button" class="btn btn-primary navbar-btn navbar-right" data-toggle="modal" data-target="#directory_namesModal">
                        <span class="glyphicon glyphicon-plus-sign"></span>
                        <?php _t("New directory_names"); ?>
                    </button>

                    <div class="modal fade" id="directory_namesModal" tabindex="-1" role="dialog" aria-labelledby="directory_namesModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="directory_names_addLabel">
                                        <?php _t("Add new directory_names"); ?>                
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <?php include view("directory_names", "form_add"); ?>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } ?>    
            </div>           
        </div>
    </div>
</nav>

<div class="collapse" id="collapse_form_directory_names_pagination_items_limit">
    <div class="well">
        <?php
        $redi = 1;
        include view("directory_names", "form_pagination_items_limit");
        echo "<br>";
        echo "<h3>" . _tr("Columne to show") . "</h3>";
        include view("directory_names", "form_show_col_from_table");
        ?>
    </div>
</div>



