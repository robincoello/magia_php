<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}




$fp = fopen("www/_translations/wp.po", "r");

$i = 0;

while (!feof($fp)) {

    $line = fgets($fp);

    if (strpos($line, '#') === 0) {
        //echo "$line <br>"; 
    } else {
        if (!empty($line)) {
            echo "$line <br>";
        }
    }


    $i++;
}

fclose($fp);
