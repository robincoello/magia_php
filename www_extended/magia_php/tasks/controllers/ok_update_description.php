<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$id = (isset($_POST["id"]) && $_POST["id"] != "") ? clean($_POST["id"]) : null;
//$category_id = (isset($_POST["category_id"]) && $_POST["category_id"] != "") ? clean($_POST["category_id"]) : null;
//$contact_id = (isset($_POST["contact_id"]) && $_POST["contact_id"] != "") ? clean($_POST["contact_id"]) : $u_id;
//$title = (isset($_POST["title"]) && $_POST["title"] != "") ? clean($_POST["title"]) : false;
// Quoitamos el clin para usar el texto enriquecido
$description = ($_POST["description"] != "") ? ($_POST["description"]) : null;
//$controller = (isset($_POST["controller"]) && $_POST["controller"] != "") ? clean($_POST["controller"]) : 'home';
//$doc_id = (isset($_POST["doc_id"]) && $_POST["doc_id"] != "") ? clean($_POST["doc_id"]) : null;
//$date_registre = (isset($_POST["date_registre"]) && $_POST["date_registre"] != "") ? clean($_POST["date_registre"]) : date("Y-m-d H:i:s");
//$date_update = (isset($_POST["date_update"]) && $_POST["date_update"] != "") ? clean($_POST["date_update"]) : date("Y-m-d");
//$color = (isset($_POST["color"]) && $_POST["color"] != "") ? clean($_POST["color"]) : 'white';
//$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "") ? clean($_POST["order_by"]) : 1;
//$status = (isset($_POST["status"]) && $_POST["status"] != "") ? clean($_POST["status"]) : 0;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
$error = array();

################################################################################
# REQUERIDO
################################################################################
//if (!$category_id) {
//    array_push($error, '$category_id is mandatory');
//}
//if (!$contact_id) {
//    array_push($error, '$contact_id is mandatory');
//}
//if (!$title) {
//    array_push($error, '$title is mandatory');
//}
//if (!$description) {
//    array_push($error, '$description is mandatory');
//}
//if (!$controller) {
//    array_push($error, '$controller is mandatory');
//}
//if (!$doc_id) {
//    array_push($error, '$doc_id is mandatory');
//}
//if (!$date_registre) {
//    array_push($error, '$date_registre is mandatory');
//}
//if (!$date_update) {
//    array_push($error, '$date_update is mandatory');
//}
//if (!$color) {
//    array_push($error, '$color is mandatory');
//}
//if (!$order_by) {
//    array_push($error, '$order_by is mandatory');
//}
//if (!$status) {
//    array_push($error, '$status is mandatory');
//}
###############################################################################
# FORMAT
//switch ($category_id) {
//    case 'null':
//    case 'Null':
//    case '':
//        $category_id = null;
//        break;
//
//    default:
//        break;
//}
################################################################################
//
###############################################################################
# CONDICIONAL
################################################################################
//if (tasks_search($status)) {
//    //array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
//vardump(
//        array(
//            $category_id, $contact_id, $title, $description, $controller, $doc_id, $date_registre, $date_update, $color, $order_by, $status
//        )
//);
//die(); 
##############################################################################################################################################
##############################################################################################################################################
##############################################################################################################################################
##############################################################################################################################################
if (!$error) {
//    $lastInsertId = tasks_add(
//            $category_id, $contact_id, $title, $description, $controller, $doc_id, $date_registre, $date_update, $color, $order_by, $status
//    );

    tasks_update_description($id, $description);

//    vardump($lastInsertId);
//
//    vardump(array(
//        $category_id, $contact_id, $title, $description, $controller, $doc_id, $date_registre, $date_update, $color, $order_by, $status
//    ));
//    die();



    switch ($redi['redi']) {
        case 10:
            header("Location: index.php");
            break;

        case 20:
            header("Location: index.php?c=tasks&a=details&id=$lastInsertId");
            break;

        case 25:
            header("Location: index.php?c=tasks&a=edit&id=$id");
            break;

        case 30:
            header("Location: index.php?c=$redi[c]#3");
            break;

        case 40:
            header("Location: index.php?c=$redi[c]&a=details&id=$redi[id]#40");
            break;

        default:
            header("Location: index.php?c=tasks");
            break;
    }
} else {

    include view("home", "pageError");
}


