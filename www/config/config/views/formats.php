<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>

    <div class="col-lg-10">
        <?php include view("config", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1><?php _t("Formats"); ?></h1>


        moneda, 
        formato de numeros
        fechas 
        zona horaria

        <ul>
            <li>Fecha yyyy-mm-dd</li>
            <li>Moneda EUR, USD</li>
            <li>Hora 24h 12pm</li>
            <li>Invoice {%number%}</li>
            <li>{%number%} Invoice</li>
            <li>***</li>
        </ul>



    </div>
</div>

<?php include view("home", "footer"); ?> 

