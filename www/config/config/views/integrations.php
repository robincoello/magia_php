<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-lg-2">
        <div class="list-group">
            <a href="#" class="list-group-item">
                <?php _menu_icon("top", "accounting"); ?>
                <?php echo _t("Emails"); ?>
            </a>
            <a href="index.php?c=config&a=emails_templates&tmp=r1" class="list-group-item"><?php _t("Email rappel1"); ?></a>
            <a href="index.php?c=config&a=emails_templates&tmp=r2" class="list-group-item"><?php _t("Email rappel 2"); ?></a>
            <a href="index.php?c=config&a=emails_templates&tmp=r3" class="list-group-item"><?php _t("Email rappel 3"); ?></a>
            <a href="index.php?c=config&a=emails_templates&tmp=invoice" class="list-group-item"><?php _t("Email invoice"); ?></a>
            <a href="index.php?c=config&a=emails_templates&tmp=budget" class="list-group-item"><?php _t("Email budget"); ?></a>
            <a href="index.php?c=config&a=emails_templates&tmp=credit_note" class="list-group-item"><?php _t("Email credit note"); ?></a>
        </div>
    </div>

    <div class="col-lg-8">
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        Para la coneccion con otras aplicaciones para backups,(google drive, dropbox, onedrive) pagos, (stripe, paypal, )




    </div>
</div>

<?php include view("home", "footer"); ?> 

