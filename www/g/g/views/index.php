<?php include view("home", "header"); ?>  
<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("g", "izq"); ?>
    </div>
    <div class="col-sm-12 col-md-10 col-lg-10">
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



        <?php if (isset($txt) && $txt) { ?>


            <p>
                <?php _t('Search'); ?>: <?php echo $txt; ?> 
            </p>





            <?php
            foreach (contacts_search($txt) as $key => $contact) {
                $tva = ($contact['tva']) ? _tr('su numero de tva es') . " " . $contact['tva'] : _tr("No tiene tva");
                $language = ($contact['language']) ? _tr('idioma prefereido') . " " . _languages_field_language('name', $contact['language']) : _tr("No tiene definido un idioma");

                echo "<p>Contact: <a href='index.php?c=contacts&a=details&id=$contact[id]'>$contact[title] $contact[name] $contact[name]</a><br>  birthdate $tva,  billing_method discounts,  $language </p>";
            }
            ?>
            <?php
            foreach (addresses_search($txt) as $key => $address) {
                echo '<p>Addresses <a href="index.php?c=contacts&a=addresses&id=' . $address['contact_id'] . '">' . contacts_formated($address['contact_id']) . '</a><br> ';
                echo "$address[number], $address[address] $address[postcode] $address[barrio] $address[city] $address[province] $address[region] $address[country]  </p>";
            }
            ?>
            <?php
            foreach (projects_search($txt) as $key => $project) {
                echo '<p>Project: <a href="index.php?c=projects&a=details&id=' . $project['id'] . '"> name: ' . $project['name'] . '</a><br> Project id: ' . $project['id'] . ',  ' . $project['description'] . ', adresse: ' . $project['address'] . ', Date start: ' . $project['date_start'] . ', Date End:' . $project['date_end'] . '  </p>';
            }
            ?>
            <?php
            foreach (invoice_lines_search($txt) as $key => $ils) {
                echo '<p>Invoices lines: <a href="index.php?c=invoices&a=details&id=' . $ils['invoice_id'] . '">Invoice: ' . $ils['invoice_id'] . '</a><br> code: ' . $ils['code'] . ', description: ' . $ils['description'] . ', price: ' . $ils['price'] . ', tva: ' . $ils['tax'] . '    </p>';
            }
            ?>
            <?php
//        $i = 1;
//        foreach (permissions_search_by_rol($u_rol) as $key => $controller) {
//            if ($controller['controller']) {
//                echo '<p>' . $i++ . ') ' . $controller['controller'] . '</p>';
//            }
//        }
            ?>


        <?php }
        ?>















        <div class="container-fluid">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <?php
//  $pagination->createHtml();
                ?>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6 text-right">
                <?php
//          $redi = 1;
//include view("g", "form_pagination_items_limit", $redi = 1);
                ?>
            </div>
        </div>




    </div>
</div>

<?php include view("home", "footer"); ?> 
