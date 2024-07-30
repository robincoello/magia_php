


<?php if (modules_field_module('status', 'accounting')) { ?>
    <div class="list-group">
        <a href="#" class="list-group-item active">
            <?php _menu_icon("top", "credit_notes"); ?>
            <?php echo _t("Credit notes"); ?>
        </a>

        <?php
        /**
         *         <a href="index.php?c=config&a=credit_notes_expiration_days" class="list-group-item">
          <span class="glyphicon glyphicon-hourglass"></span>
          <?php _t("Expiration days"); ?>
          </a>
         */
        ?>    



        <a href="index.php?c=config&a=credit_notes_description_maxlength" class="list-group-item <?php echo ($a == "credit_notes_description_maxlength") ? "list-group-item-info" : ""; ?>">
            <span class="glyphicon glyphicon-text-width"></span>
            <?php _t("Description maxlength"); ?>
        </a>


        <?php
        /**
         *         <a href="index.php?c=config&a=credit_notes_see_via_web" class="list-group-item">
          <span class="glyphicon glyphicon-time"></span>
          <?php _t("Credit notes see via web"); ?>
          </a>

         */
        ?>
        <a href="index.php?c=config&a=credit_notes_print_counter" class="list-group-item <?php echo ($a == "credit_notes_print_counter") ? "list-group-item-info" : ""; ?>">
            <span class="glyphicon glyphicon-print"></span>
            <?php _t("Print counter"); ?>
        </a>

        <?php
        /**
         *         <a href="index.php?c=config&a=credit_notes_print_counter_update" class="list-group-item">
          <span class="glyphicon glyphicon-print"></span>
          <?php _t("Print counter update"); ?>
          </a>

         */
        ?>


        <a href="index.php?c=config&a=credit_notes_pagination_items_limit" class="list-group-item <?php echo ($a == "credit_notes_pagination_items_limit") ? "list-group-item-info" : ""; ?>">
            <span class="glyphicon glyphicon-time"></span>
            <?php _t("Pagination"); ?>
        </a>




    </div>
<?php } ?>