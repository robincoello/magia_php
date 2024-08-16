<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">

            <?php
            if (modules_field_module('status', "docu")) {
                echo docu_modal_bloc("invoices", 'details', 'bloc_address' . $addresses['name']);
            }
            ?>

            <span class="glyphicon glyphicon-map-marker"></span>

            <?php echo $addresses['id']; ?>

            <?php
            _t($addresses['name']);
            echo " ";
            _t("address");
            ?>

        </h3>
    </div>
    <div class="panel-body">

        <?php
        echo "<h4>" . contacts_formated($addresses['contact_id']) . "</h4>";
        echo "$addresses[number], $addresses[address]<br>";
        echo "$addresses[postcode], $addresses[barrio]<br>";
        echo "$addresses[city], " . countries_name($addresses['country']) . "<br>";
        echo "<br>";

        // Transporte
        // si el modulo de transporte esta activo                         
        if ($addresses['name'] !== "Billing" && modules_field_module('status', 'transport')) {
            echo _tr('Transport') . ": " . (addresses_transport_search_by_addresses_id($addresses['id']));
        } else {
            echo "&nbsp";
        }


//echo "$addresses[number], $addresses[address]<br>"; 
        ?>


    </div>
</div>


