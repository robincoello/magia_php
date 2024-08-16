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

        <h1><?php _t("Languages"); ?></h1>





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
                    array("field" => 'language', "description" => "Idioma en codigo iso", null),
                    array("field" => 'name', "description" => "Nombre del idioma", null),
                    array("field" => 'order_by', "description" => "Prioridad para mostrar el idioma", null),
                    array("field" => 'status', "description" => "Estatus del idioma, se puestra o no ", null),
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
        <?php // include view("contacts", "izq");  ?>
        <?php // include view("api", "izq"); ?>
    </div>
</div>

<?php include view("home", "footer"); ?> 

