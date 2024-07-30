<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-lg-2">
        <?php include view("config", "izq_credit_notes"); ?>
    </div>

    <div class="col-lg-8">
        <?php include view("config", "nav"); ?>


        <?php
        if ($m) {
            foreach ($m as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1><?php _t("Credit notes"); ?></h1>

        <p>
            <?php
            vardump(_options_option('config_credit_notes_print_counter'));

            if (
                    _options_option("config_credit_notes_print_counter")
            // &&
            // y existe factuas
            // &&
            // no existe contador 
            ) {
                ?>


            <h1>Actualizar el contador</h1>
            <form class="form-inline" method="get" action="index.php">
                <input type="hidden" name="c" value="config">
                <input type="hidden" name="a" value="credit_notes_print_counter_update">            
                <input type="hidden" name="update_now" value="ok">            
                <button type="submit" class="btn btn-danger"><?php _t("Update counters"); ?></button>
            </form>
            <p>-</p>





            <table class="table table-condensed border">
                <thead>
                    <tr>
                        <th><?php _t("Invoice"); ?></th>
                        <th><?php _t("Action"); ?></th>
                        <th><?php _t("Year"); ?></th>
                        <th><?php _t("Counter"); ?></th>
                    </tr>
                </thead>
                <?php
                foreach (credit_notes_list_update_counter() as $key => $cn) {


                    echo '<tr>';
                    echo '<td>' . $cn["id"] . '</td>';
                    echo '<td>';

                    if (isset($update_now) && $update_now == 'ok') {
                        echo "Update";

                        // saco el año de la fecha 

                        $year = magia_dates_get_year_from_date($cn[('date_registre')]);

                        credit_notes_counter_add($cn['id'], $year, credit_notes_counter_next_number($year));
                    }

                    echo '</td>';

                    echo '<td>';
                    echo credit_notes_field_id('year', $cn['id']);

                    echo '</td>
                        <td>';

                    echo credit_notes_field_id('counter', $cn['id']);

                    echo '</td>';

                    echo ' </tr>';
                }
                ?>



                <tr>
                    <td></td>
                </tr>


            </table>





        <?php } else { ?>




        <?php } ?>
        </p>

    </div>
</div>

<?php include view("home", "footer"); ?> 

