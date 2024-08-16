<?php

echo "<h4>[" . $addresses['contact_id'] . "] " . contacts_formated($addresses['contact_id']) . "</h4>";
echo "$addresses[number], $addresses[address]<br>";
echo "$addresses[postcode], $addresses[barrio]<br>";
echo "$addresses[city], " . countries_name($addresses['country']) . "<br>";

echo "ID: $addresses[id]<br>";

// Transporte
// si el modulo de transporte esta activo                         
if ($addresses['name'] !== "Billing" && modules_field_module('status', 'transport')) {
    echo '<p class="text-primary"><b>';
    echo _tr('Transport') . ": " . transport_field_code('name', (addresses_transport_search_by_addresses_id($addresses['id'])));
    echo '</b></p>';
} else {
    echo "&nbsp";
}


//echo "$addresses[number], $addresses[address]<br>"; 
?>