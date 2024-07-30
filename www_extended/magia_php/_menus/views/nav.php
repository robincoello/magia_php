
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
                <?php _menu_icon("top", '_menus'); ?>
                <?php _t("_menus"); ?>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

            </ul>

            <?php include view("_menus", "form_search") ?>

            <ul class="nav navbar-nav">
                <?php if (permissions_has_permission($u_rol, "config", "update")) { ?>
                    <li>
                        <a 
                            data-toggle="collapse" 
                            href="#collapse_form__menus_pagination_items_limit" 
                            aria-expanded="false" 
                            aria-controls="collapse_form__menus_pagination_items_limit">
                            <span class="glyphicon glyphicon-cog"></span>
                        </a>
                    </li>



                <?php } ?>
            </ul>

            <?php /**
             *             <ul class="nav navbar-nav">
              <li><a href="index.php?c=_menus&a=search_advanced"><?php _t("Search avanced"); ?></a></li>
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <?php echo _t("Export"); ?>
              <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
              <li><a href="index.php?c=_menus&a=export_json"><?php _t("Json"); ?></a></li>
              <li><a href="index.php?c=_menus&a=export_pdf"><?php _t("Pdf"); ?></a></li>
              <li><a href="index.php?c=_menus&a=export_csv"><?php _t("CSV"); ?></a></li>
              <li><a href="index.php?c=_menus&a=export_xml"><?php _t("XML"); ?></a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Other</a></li>
              </ul>
              </li>
              </ul>
             */ ?>




            <ul class="nav navbar-nav">
                <?php
                foreach (_menus_search_by_controller_location($c, 'nav') as $key => $msbcl) {
                    $target = ($msbcl['target']) ? ' target="' . $msbcl['target'] . '" ' : '';
                    echo '<li><a href="' . $msbcl["url"] . '"  ' . $target . '><span class="' . $msbcl["icon"] . '"></span> ' . $msbcl["label"] . '</a></li>';
                }
                ?>
            </ul>



            <a href="index.php?c=_menus&a=add" type="button" class="btn btn-primary navbar-btn navbar-right" >
                <span class="glyphicon glyphicon-plus-sign"></span>
                <?php _t("New _menus"); ?>
            </a>




            <div class="collapse navbar-collapse" id="_menus_add">
                <?php if (permissions_has_permission($u_rol, "_menus", "creadddddddddddddddddte")) { ?>     

                    <button type="button" class="btn btn-primary navbar-btn navbar-right" data-toggle="modal" data-target="#_menusModal">
                        <span class="glyphicon glyphicon-plus-sign"></span>
                        <?php _t("New _menus"); ?>
                    </button>

                    <div class="modal fade" id="_menusModal" tabindex="-1" role="dialog" aria-labelledby="_menusModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="_menus_addLabel">
                                        <?php _t("Add new _menus"); ?>                
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <?php include view("_menus", "form_add"); ?>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } ?>    
            </div>           
        </div>
    </div>
</nav>

<div class="collapse" id="collapse_form__menus_pagination_items_limit">
    <div class="well">
        <?php
        $redi = 1;
        include view("_menus", "form_pagination_items_limit");
        echo "<br>";
        echo "<h3>" . _tr("Columne to show") . "</h3>";
        include view("_menus", "form_show_col_from_table");
        ?>
    </div>
</div>

