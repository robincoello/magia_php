<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-lg-2">
        <?php include view("config", "izq_export"); ?>
    </div>

    <div class="col-lg-8">
        <?php include view("config", "nav"); ?>


        <?php
        if (isset($m)) {
            foreach ($m as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1><?php _t("Export format XML"); ?></h1>
        <p>
            <?php _t("Activate this option to export documents in XML format"); ?>?
        </p>    

        <p>
            <a href="https://www.oasis-open.org/standard/ublv2-2-os/" target="new">https://www.oasis-open.org/standard/ublv2-2-os/</a>
        </p>

        <p>
            <a href="http://docs.oasis-open.org/ubl/os-UBL-2.2/UBL-2.2.html#S-INVOICE-SCHEMA" target="new">http://docs.oasis-open.org/ubl/os-UBL-2.2/UBL-2.2.html#S-INVOICE-SCHEMA</a>
        </p>

        <p>
            <?php if (_options_option("config_export_xml")) { ?>
            <form class="form-inline" method="post" action="index.php">
                <input type="hidden" name="c" value="config">
                <input type="hidden" name="a" value="ok_export_xml">            
                <input type="hidden" name="data" value="0">            

                <button type="submit" class="btn btn-danger"><?php _t("Disabled"); ?></button>
            </form>
            <h3><?php _t("Actual status"); ?></h3>
            <p>
                <?php _t("Yes, this option is currently activated"); ?>
            </p>
            <img src="www/gallery/img/export_xml_yes.jpg" width="width" height="height" alt="alt"/>
        <?php } else { ?>
            <form class="form-inline" method="post" action="index.php">
                <input type="hidden" name="c" value="config">
                <input type="hidden" name="a" value="ok_export_xml">            
                <input type="hidden" name="data" value="1">            
                <button type="submit" class="btn btn-primary"><?php _t("Activate"); ?></button>
            </form>
            <h3><?php _t("Actual status"); ?></h3>
            <p>
                <?php _t("No, this option is currently disabled"); ?>
            </p>
            <img src="www/gallery/img/export_xml_no.jpg" width="width" height="height" alt="alt"/>
        <?php } ?>
        </p>












    </div>
</div>

<?php include view("home", "footer"); ?> 

