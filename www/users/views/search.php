<?php include view("home", "header"); ?> 


<?php

switch ($w) {
    case "by_rol":
        $users_info = users_list();
        break;

    default:
        $users_info = users_list();
        break;
}


//include "www/users/views/index.php";

include view("users", "index");
?>

<?php include view("home", "header"); ?> 
