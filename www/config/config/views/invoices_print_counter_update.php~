<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-lg-2">
        <?php include view("config", "izq_invoices"); ?>
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

        <h1><?php _t("Invoices"); ?></h1>
        <p>
            <?php
            //vardump(_options_option('config_invoices_print_counter'));


            if (
                    _options_option("config_invoices_print_counter")
            // &&
            // y existe factuas
            // &&
            // no existe contador 
            ) {
                ?>


            <h1><?php _t("Update counter"); ?></h1>
            <form class="form-inline" method="get" action="index.php">
                <input type="hidden" name="c" value="config">
                <input type="hidden" name="a" value="invoices_print_counter_update">            
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
                foreach (invoices_list_update_counter() as $key => $invoice) {

                    echo '<tr>';
                    echo '<td>' . $invoice["id"] . '</td>';
                    echo '<td>';
                    if (isset($update_now) && $update_now == 'ok') {
                        echo "Update";
                        // saco el año de la fecha 
                        $year = magia_dates_get_year_from_date($invoice[('date')]);
                        invoices_counter_add($invoice['id'], $year, invoices_counter_next_number($year));
                    }
                    echo '</td>';
                    echo '<td>';
                    echo invoices_field_id('year', $invoice['id']);
                    echo '</td>
                        <td>';
                    echo invoices_field_id('counter', $invoice['id']);
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

