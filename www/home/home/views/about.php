<?php include view("home", "header"); ?>


<div class="container-fluid">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">

        <h1><?php _t("About"); ?></h1>

        <p><?php _t("Developed with"); ?>: Coello</p>
        <p><?php _t("Version"); ?>: factux 4.0.0</p>
        <p><?php _t("By"); ?>: Róbinson Coello S.</p>
        <p><?php _t("Url"); ?>: <a href="http://coello.be" target="coello">http://coello.be</a></p>
        <p><?php _t("Doc"); ?>: <?php
            echo _options_option("doc_model");
            ;
            ?></p>

    </div>
    <div class="col-lg-3"></div>
</div>





<?php include view("home", "footer"); ?>