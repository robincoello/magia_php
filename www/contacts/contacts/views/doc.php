<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php // include view("contacts", "izq"); ?>
        <?php include view("api", "izq"); ?>
    </div>

    <div class="col-lg-8">
        <?php // include view("contacts", "nav"); ?>
        <?php include view("api", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1><?php _t("Contacts"); ?></h1>

        <h2>Como crear un contacto</h2>



        <table class="table table-condensed table-striped table-bordered">
            <thead>
                <tr>
                    <th>tipo</th>
                    <th>que es?</th>
                    <th>tipo de valor</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $valores = array(
                    array("field" => 'id', "description" => "identificador", null),
                    array("field" => 'owner_id', "description" => "identificador", null),
                    array("field" => 'type', "description" => "Contact type", "more" => "http://localhost/jiho_23/index.php?c=contacts&a=doc"),
                    array("field" => 'title', "description" => "Contact salutation", "more" => null),
                    array("field" => 'name', "description" => "Contact name", "more" => null),
                    array("field" => 'lastname', "description" => "Contact name", "more" => null),
                    array("field" => 'birthdate', "description" => "Contact birthdate", "more" => null),
                    array("field" => 'tva', "description" => "Contact tva", "more" => null),
                    array("field" => 'billing_method', "description" => "Contact billing_method", "more" => null),
                    array("field" => 'discounts', "description" => "Contact discounts valor entre 0 y 100", "more" => null),
                    array("field" => 'code', "description" => "Contact code unique", "more" => null),
                    array("field" => 'language', "description" => "Contact language preference", "more" => null),
                );

                foreach ($valores as $value) {

                    $field = ($value['more']) ? '<a href="' . $value['more'] . '">' . $value['field'] . '</a>' : $value['field'];

                    echo '<tr>
                    <td>' . $field . '</td>
                    <td>' . $value['description'] . '</td>
                    <td>' . $value['more'] . '</td>
                    
                </tr>';
                }
                ?>
            </tbody>
        </table>






    </div>

    <div class="col-lg-2">
        <?php // include view("contacts", "izq"); ?>
        <?php // include view("api", "izq"); ?>
    </div>
</div>

<?php include view("home", "footer"); ?> 

