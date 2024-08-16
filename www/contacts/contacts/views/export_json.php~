<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-0">

        <?php include view("contacts", "izq"); ?>
    </div>

    <div class="col-lg-12">

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <pre>
            <?php
            echo json_encode($contacts);
            ?>
        </pre>

    </div>
</div>

<?php include view("home", "footer"); ?>

