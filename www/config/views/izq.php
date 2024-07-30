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
if (permissions_has_permission($u_rol, 'config', "read")) {
    ?>

    <div class="list-group">      

        <a href="#" class="list-group-item active">
            <?php _menu_icon("top", "system"); ?>
            <?php echo _t("My company"); ?>
        </a>

        <?php
        /**
         * 
          <a href="index.php?c=config&a=tva" class="list-group-item">
          <span class="glyphicon glyphicon-home"></span>
          <?php _t("My vat number"); ?>
          </a>
         */
        ?>




        <?php
        /**
         * 
          <a href="index.php?c=config&a=email" class="list-group-item">
          <span class="glyphicon glyphicon-envelope"></span>
          <?php _t("My email"); ?>
          </a>
         */
        ?>

        <a href="index.php?c=config&a=logo" class="list-group-item <?php echo ($a == "logo") ? "list-group-item-info" : ""; ?>">
            <span class="glyphicon glyphicon-picture"></span>
            <?php _t("My logo"); ?>
        </a>

        <?php
        /**
         *         <a href="index.php?c=config&a=web" class="list-group-item">
          <span class="glyphicon glyphicon-link"></span>
          <?php _t("My web site"); ?>
          </a>
         */
        ?>

        <?php
        /**
         *         
         * 
         * 
          <a href="index.php?c=_options" class="list-group-item">
          <span class="glyphicon glyphicon-ok"></span>
          <?php _t("Options"); ?>
          </a>
         */
        ?>



    </div>



    <?php if (modules_field_module('status', 'accounting')) { ?>
        <div class="list-group">

            <a href="#" class="list-group-item active"><?php _menu_icon("top", "accounting"); ?> <?php echo _t("Accounting"); ?></a>                    

            <?php if (permissions_has_permission($u_rol, 'budgets', "read")) { ?>
                <a href="index.php?c=config&a=budgets" class="list-group-item <?php echo ($a == "budgets" || $a == 'budgets_description_maxlength') ? "list-group-item-info" : ""; ?>"><?php _menu_icon("top", "budgets"); ?> <?php _t("Budgets"); ?></a>
            <?php } ?>

            <?php if (permissions_has_permission($u_rol, 'banks', "read")) { ?>
                <a href="index.php?c=config&a=banks" class="list-group-item <?php echo ($a == "banks" || $a == 'banks') ? "list-group-item-info" : ""; ?>">
                    <?php _menu_icon("top", "banks"); ?> 
                    <?php _t("Banks"); ?>
                </a>
            <?php } ?>

            <?php if (permissions_has_permission($u_rol, 'invoices', "read")) { ?>
                <a href="index.php?c=config&a=invoices" class="list-group-item <?php echo ($a == "invoices") ? "list-group-item-info" : ""; ?>"><?php _menu_icon("top", "invoices"); ?> <?php _t("Invoices"); ?></a>
            <?php } ?>

            <?php if (permissions_has_permission($u_rol, 'credit_notes', "read")) { ?>
                <a href="index.php?c=config&a=credit_notes" class="list-group-item <?php echo ($a == "credit_notes") ? "list-group-item-info" : ""; ?>"><?php _menu_icon("top", "credit_notes"); ?> <?php _t("Credit notes"); ?></a>
            <?php } ?>

            <?php if (permissions_has_permission($u_rol, 'expenses', "read")) { ?>
                <a href="index.php?c=config&a=expenses" class="list-group-item <?php echo ($a == "expenses") ? "list-group-item-info" : ""; ?>"><?php _menu_icon("top", "expenses"); ?> <?php _t("Expenses"); ?></a>
            <?php } ?>

            <?php if (permissions_has_permission($u_rol, 'balance', "read")) { ?>
                <a href="index.php?c=config&a=balance" class="list-group-item <?php echo ($a == "balance") ? "list-group-item-info" : ""; ?>"><?php _menu_icon("top", "balance"); ?> <?php _t("Balance"); ?></a>        
            <?php } ?>

            <?php if (permissions_has_permission($u_rol, 'tax', "read")) { ?>
                <a href="index.php?c=tax" class="list-group-item <?php echo ($c == "tax") ? "list-group-item-info" : ""; ?>"><?php _menu_icon("top", "tax"); ?> <?php _t("Tax"); ?></a> 
            <?php } ?>

            <?php if (modules_field_module('status', 'doc_models')) { ?>
                <a href="index.php?c=doc_models" class="list-group-item <?php echo ($c == "doc_models") ? "list-group-item-info" : ""; ?>">
                    <?php _menu_icon("top", "config"); ?> 
                    <?php _t("Doc models (PDF)"); ?>
                </a>    
            <?php } ?>


            <a href="index.php?c=config&a=cgv" class="list-group-item <?php echo ($a == "cgv") ? "list-group-item-info" : ""; ?>">
                <span class="glyphicon glyphicon-shopping-cart"></span>
                <?php _t("CGV"); ?>
            </a> 






            <?php /**
              <a href="index.php?c=config&a=export" class="list-group-item"><?php _menu_icon("top", "export"); ?> <?php _t("Export"); ?></a>
              <a href="index.php?c=config&a=projects" class="list-group-item"><?php _menu_icon("top", "projects"); ?> <?php _t("Projects"); ?></a>

             *                  
              <a href="index.php?c=config&a=paypal" class="list-group-item"><?php _menu_icon("top", "paypal"); ?> <?php _t("Paypal"); ?></a>
             * 
             * 
             */ ?>

        </div>

        <?php
    }
    ?>

    <?php if (modules_field_module('status', 'audio')) { ?>
        <div class="list-group">
            <?php if (permissions_has_permission($u_rol, 'orders', "read")) { ?>
                <a href="#" class="list-group-item active">
                    <?php _menu_icon("top", "orders"); ?>
                    <?php echo _t("Audio"); ?>
                </a>
            <?php } ?>

            <?php if (permissions_has_permission($u_rol, 'orders', "read")) { ?>
                <a href="index.php?c=config&a=orders" class="list-group-item <?php echo ($a == "orders") ? "list-group-item-info" : ""; ?>">
                    <?php _menu_icon("top", "orders"); ?> 
                    <?php _t("Orders"); ?>
                </a>
            <?php } ?>

        </div>
    <?php } ?>



    <?php if (modules_field_module('status', 'public_html')) { ?>
        <div class="list-group">
            <?php if (permissions_has_permission($u_rol, 'orders', "read")) { ?>
                <a href="#" class="list-group-item active">
                    <?php _menu_icon("top", "public_html"); ?>
                    <?php echo _t("public_html"); ?>
                </a>
            <?php } ?>

            <?php if (permissions_has_permission($u_rol, 'orders', "read")) { ?>
                <a href="index.php?c=config&a=public_html" class="list-group-item <?php echo ($a == "public_html") ? "list-group-item-info" : ""; ?>">
                    <?php _menu_icon("top", "public_html"); ?> 
                    <?php _t("Theme"); ?>
                </a>
            <?php } ?>

        </div>
    <?php } ?>





    <?php if (modules_field_module('status', 'products')) { ?>

        <div class="list-group">
            <a href="#" class="list-group-item active ">
                <?php _menu_icon("top", "products"); ?>
                <?php echo _t("Products"); ?>
            </a>

            <a href="index.php?c=products" class="list-group-item <?php echo ($c == "products") ? "list-group-item-info" : ""; ?>">
                <?php _menu_icon("top", "products"); ?>
                <?php _t("Products"); ?>
            </a>

            <a href="index.php?c=products_categories" class="list-group-item <?php echo ($c == "products_categories") ? "list-group-item-info" : ""; ?>">
                <?php _menu_icon("top", "products_categories"); ?>
                <?php _t("Categories"); ?>
            </a>

            <a href="index.php?c=products_stock" class="list-group-item <?php echo ($c == "products_stock") ? "list-group-item-info" : ""; ?>">
                <?php _menu_icon("top", "products_stock"); ?>
                <?php _t("Stock"); ?>
            </a>

        </div>
    <?php } ?>






    <div class="list-group">      

        <a href="#" class="list-group-item active">
            <?php _menu_icon("top", "system"); ?>
            <?php echo _t("System"); ?>
        </a>

        <?php if (permissions_has_permission($u_rol, '_menus', "update")) { ?>
            <a href="index.php?c=config&a=menus_debug" class="list-group-item <?php echo ($a == "menus_debug") ? "list-group-item-info" : ""; ?>">
                <?php _menu_icon("top", "_menus"); ?> <?php _t("Menus"); ?>
            </a>  
        <?php } ?>

        <?php if (permissions_has_permission($u_rol, 'addresses', "read")) { ?>
            <a href="index.php?c=config&a=addresses" class="list-group-item <?php echo ($a == "addresses") ? "list-group-item-info" : ""; ?>">
                <?php _menu_icon("top", "addresses"); ?> <?php _t("Addresses"); ?>
            </a>  
        <?php } ?>

        <?php if (permissions_has_permission($u_rol, 'contacts', "read")) { ?>
            <a href="index.php?c=config&a=contacts" class="list-group-item <?php echo ($a == "contacts") ? "list-group-item-info" : ""; ?>">
                <?php _menu_icon("top", "contacts"); ?> <?php _t("Contacts"); ?>
            </a>  
        <?php } ?>

        <?php if (permissions_has_permission($u_rol, '_languages', "read")) { ?>
            <a href="index.php?c=_languages" class="list-group-item <?php echo ($c == "_languages") ? "list-group-item-info" : ""; ?>">
                <?php _menu_icon("top", "_languages"); ?> <?php _t("Languages"); ?>
            </a>  
        <?php } ?>

        <?php if (permissions_has_permission($u_rol, 'transport', "read")) { ?>
            <?php if (modules_field_module('status', 'transport')) { ?>
                <a href="index.php?c=transport" class="list-group-item <?php echo ($c == "transport") ? "list-group-item-info" : ""; ?>">
                    <?php _menu_icon("top", "transport"); ?>
                    <?php _t("Transport"); ?>
                </a>
            <?php } ?>
        <?php } ?>


        <?php if (permissions_has_permission($u_rol, 'print_multilang', "read")) { ?>
            <a href="index.php?c=config&a=print_multilang" class="list-group-item <?php echo ($a == "print_multilang") ? "list-group-item-info" : ""; ?>">
                <span class="glyphicon glyphicon-print"></span> 
                <?php _t("Print multilang"); ?>
            </a>    
        <?php } ?>



        <?php if (permissions_has_permission($u_rol, 'doc_models', "read")) { ?>

            <?php
            if (
                    permissions_has_permission($u_rol, 'doc_models', 'read') &&
                    modules_field_module('status', modules_search_module_by_sub_module('doc_models'))
            ) {
                ?>
                <a href="index.php?c=doc_models" class="list-group-item <?php echo ($c == "doc_models") ? "list-group-item-info" : ""; ?>">
                    <?php _menu_icon("top", "config"); ?> 
                    <?php _t("Pdf models"); ?>
                </a>    
                <a href="index.php?c=config&a=pdf_data" class="list-group-item <?php echo ($a == "pdf_data") ? "list-group-item-info" : ""; ?>">
                    <?php _menu_icon("top", "config"); ?> 
                    <?php _t("Pdf data"); ?>
                </a>    
            <?php } ?>



        <?php } ?>



        <?php if (permissions_has_permission($u_rol, 'home', "read")) { ?>
            <a href="index.php?c=config&a=home_page" class="list-group-item <?php echo ($a == "home_page") ? "list-group-item-info" : ""; ?>">
                <?php _menu_icon("top", "config"); ?> 
                <?php _t("Home page"); ?>
            </a>
        <?php } ?>

        <?php if (permissions_has_permission($u_rol, 'themes', "read")) { ?>
            <a href="index.php?c=themes" class="list-group-item <?php echo ($c == "themes") ? "list-group-item-info" : ""; ?>">
                <?php _menu_icon("top", "theme"); ?> 
                <?php _t("Themes"); ?>
            </a>
        <?php } ?>

        <?php if (permissions_has_permission($u_rol, 'countries', "read")) { ?>
            <a href="index.php?c=countries" class="list-group-item <?php echo ($c == "countries") ? "list-group-item-info" : ""; ?>">
                <?php _menu_icon("top", "countries"); ?>  
                <?php _t("Countries"); ?>
            </a>
        <?php } ?>

        <?php if (permissions_has_permission($u_rol, 'holidays', "read")) { ?>
            <a href="index.php?c=holidays" class="list-group-item <?php echo ($c == "holidays") ? "list-group-item-info" : ""; ?>">
                <?php _menu_icon("top", "holidays"); ?>
                <?php _t("Holidays"); ?>
            </a>
        <?php } ?>


        <a href="index.php?c=config&a=tawk" class="list-group-item <?php echo ($a == "tawk") ? "list-group-item-info" : ""; ?>">
            <?php echo icon('comment'); ?></span>
            <?php _t("Live chat"); ?>
        </a>   

        <a href="index.php?c=config&a=demo" class="list-group-item <?php echo ($a == "demo") ? "list-group-item-info" : ""; ?>">
            <span class="glyphicon glyphicon-gift"></span>
            <?php _t("Demo"); ?>
        </a>   

        <a href="index.php?c=config&a=reset" class="list-group-item <?php echo ($a == "reset") ? "list-group-item-info" : ""; ?>">
            <span class="glyphicon glyphicon-exclamation-sign"></span>
            <?php _t("Reset"); ?>
        </a>    





        <?php if (permissions_has_permission($u_rol, 'credit_notes', "read")) { ?>
            <?php
            /* <a 
              href="index.php?c=config&a=debug_lang"
              class="list-group-item">
              <?php _t("Debug lang"); ?>
              </a> */
            ?>
        </div>
    <?php } ?>

    <?php if (permissions_has_permission($u_rol, 'modules', "read")) { ?>
        <div class="list-group  ">
            <a href="#" class="list-group-item active">
                <?php _menu_icon("top", 'modules'); ?>
                <?php echo _t("Modules"); ?>
            </a>
            <a href="index.php?c=modules" class="list-group-item <?php echo ($c == "modules") ? "list-group-item-info" : ""; ?>"><?php _t("List"); ?></a>

            <?php if (permissions_has_permission($u_rol, 'modules', "create")) { ?>
                <a href="index.php?c=modules&a=add" class="list-group-item <?php echo ($a == "add") ? "list-group-item-info" : ""; ?>"><?php _t("Add"); ?></a> 
            <?php } ?>
        </div>
    <?php } ?>






    <?php
// fin de los permisos
}
?>