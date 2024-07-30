<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

if (!$u_rol != 'root') {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


die("go to contacts secction");

/**

$web = (isset($_REQUEST["web"])) ? clean($_REQUEST["web"]) : false;
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;

$error = array();


if (!$web) {
    array_push($error, "Url is mandatory");
}

//if( ! is_url($web) ){
//    array_push($error, "Url is mandatory"); 
//}
################################################################################
if (!$error) {


    //config_web_update($web);
    _options_push('config_company_url', $web, 'home');

    switch ($redi) {
        case 1:
            break;

        default:
            header("Location: index.php?c=config&a=web&sms=1");
            break;
    }
} else {
    include view('home', 'pageError');
}
 * 
 */

    