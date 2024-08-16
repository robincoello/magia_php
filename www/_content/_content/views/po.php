<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-md-2 col-lg-2">
        <?php include view("_content", "izq"); ?>
    </div>

    <div class="col-xs-12 col-md-10 col-lg-10">
        <?php include view("_content", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <textarea rows="20" class="form-control">
            <?php
            $i = 1;
            foreach ($_content as $key => $val) {
                echo "$val[frase], ,$val[context], , ;\n";
                $i++;
            }
            ?>
        </textarea>
        Copiar y registrar como term.csv



    </div>
</div>

<?php include view("home", "footer"); ?> 

