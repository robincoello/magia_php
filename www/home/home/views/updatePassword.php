<?php include view("home", "header"); ?>


<?php

if ($_REQUEST) {
    foreach ($error as $key => $value) {
        message("info", "$value");
    }
}
include "form_updatePassword.php";
?>



<?php include view("home", "footer"); ?>