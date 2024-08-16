
<?php if (modules_field_module('status', 'accounting')) { ?>
    <div class="list-group">
        <a href="#" class="list-group-item active">
            <?php _menu_icon("top", "invoices"); ?>
            <?php echo _t("Invoices"); ?>
        </a>

        <a href="index.php?c=config&a=invoices_checked_by_default" class="list-group-item <?php echo ($a == "invoices_checked_by_default") ? "list-group-item-info" : ""; ?>">
            <span class="glyphicon glyphicon-hourglass"></span>
            <?php _t("Status by default"); ?>
        </a>


        <a href="index.php?c=config&a=invoices_expiration_days" class="list-group-item <?php echo ($a == "invoices_expiration_days") ? "list-group-item-info" : ""; ?>">
            <span class="glyphicon glyphicon-hourglass"></span>
            <?php _t("Expiration days"); ?>
        </a>

        <?php
        /**
         * 
          <a href="index.php?c=config&a=invoices_reminders" class="list-group-item">
          <span class="glyphicon glyphicon-time"></span>
          <?php _t("Reminders"); ?>
          </a>

         */
        ?>

        <a href="index.php?c=config&a=invoices_show_tr_no_price" class="list-group-item <?php echo ($a == "invoices_show_tr_no_price") ? "list-group-item-info" : ""; ?>">
            <?php _menu_icon("top", "invoices"); ?> 
            <?php _t("Show tr no price"); ?>
        </a>

        <?php
        /**
         * 
         * 
         *         <a href="index.php?c=config&a=invoices_proforma" class="list-group-item">
          <span class="glyphicon glyphicon-time"></span>
          <?php _t("Proforma invoice"); ?>
          </a>

         * SE DEBE MEJORAR EL SISTEMA DE FACTURA MENSUAL
         *
         *         

         */
        ?>
        <a href="index.php?c=config&a=invoices_monthly" class="list-group-item <?php echo ($a == "invoices_monthly") ? "list-group-item-info" : ""; ?>">
            <span class="glyphicon glyphicon-calendar"></span>
            <?php _t("Monthly invoice"); ?>
        </a>




        <a href="index.php?c=config&a=invoices_description_maxlength" class="list-group-item <?php echo ($a == "invoices_description_maxlength") ? "list-group-item-info" : ""; ?>">
            <span class="glyphicon glyphicon-text-width"></span>
            <?php _t("Description maxlength"); ?>
        </a>


        <a href="index.php?c=config&a=invoices_edit_tmp" class="list-group-item <?php echo ($a == "invoices_edit_tmp") ? "list-group-item-info" : ""; ?>">
            <span class="glyphicon glyphicon-text-width"></span>
            <?php _t("Edit template"); ?>
        </a>

        <?php if (modules_field_module('status', 'app')) { ?>
            <a href="index.php?c=config&a=invoices_see_via_web" class="list-group-item <?php echo ($a == "invoices_see_via_web") ? "list-group-item-info" : ""; ?>">
                <span class="glyphicon glyphicon-time"></span>
                <?php _t("Invoices see via web"); ?>
            </a>
        <?php } ?>

        <?php if ($u_rol == 'root') { ?>
            <a href="index.php?c=invoices&a=check_ce" class="list-group-item <?php echo ($a == "check_ce") ? "list-group-item-info" : ""; ?>">
                <span class="glyphicon glyphicon-time"></span>
                <?php _t("Check ce"); ?>
            </a>


            <a href="index.php?c=invoices&a=check_office" class="list-group-item <?php echo ($a == "check_office") ? "list-group-item-info" : ""; ?>">
                <span class="glyphicon glyphicon-time"></span>
                <?php _t("Check office"); ?>
            </a>

        <?php } ?>



        <a href="index.php?c=config&a=invoices_print_counter" class="list-group-item <?php echo ($a == "invoices_print_counter") ? "list-group-item-info" : ""; ?>">
            <span class="glyphicon glyphicon-print"></span>
            <?php _t("Print counter"); ?>
        </a>



        <a href="index.php?c=config&a=invoices_print_counter_update" class="list-group-item <?php echo ($a == "invoices_print_counter_update") ? "list-group-item-info" : ""; ?>">
            <span class="glyphicon glyphicon-print"></span>
            <?php _t("Print counter update"); ?>
        </a>



        <a href="index.php?c=config&a=invoices_pagination_items_limit" class="list-group-item <?php echo ($a == "invoices_pagination_items_limit") ? "list-group-item-info" : ""; ?>">
            <span class="glyphicon glyphicon-time"></span>
            <?php _t("Pagination"); ?>
        </a>

    </div>
<?php } ?>


<?php
/*        Prefijo 
  tva por defecto
  idioma por defecto
  email tmp por defecto

  Terminios por defecto (notas)

  Activar envio de email
  crear numeros automaticamete

  Pdf template
  -Color
  - Mostrar codigo QR
  - Mostrar codigo de barras
  - Texto en header
  - Texto en footer

  ---<!-- Recordatorios -->
  x dias fecha de expira
  rapel 1 x dias despues de fecha expira
  rapel 2 x dias despues de fecha expira
  rapel 3 x dias despues de fecha expira
  r1
  Tmp email recordatorio
  tmp pdf recordatorio
  r2
  Tmp email recordatorio
  tmp pdf recordatorio
  r3
  Tmp email recordatorio
  tmp pdf recordatorio

  Sender rappels al cliente (si,no)
  Sender rappels al admin (si,no)
  Sender rappels a quien creo la factura (si,no) */
?>





