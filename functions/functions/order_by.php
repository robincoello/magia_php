<?php

/**
 * https://www.itsolutionstuff.com/post/php-dynamic-drag-and-drop-table-rows-using-jquery-ajaxexample.html
 *
 * Solo falta hacer la coneccion a la DB correctamente 
 * Cojer como ejemplo la tabla _languages
 * 
 */
//include "admin/conect_db.php";
//$position = $_POST['position'];
//$table = $_POST['table'];

$position = (isset($_POST["position"]) && $_POST["position"] != "" ) ? ($_POST["position"]) : false;
$table = (isset($_POST["table"]) && $_POST["table"] != "" ) ? ($_POST["table"]) : false;

if ($table && $position) {
    // se ejecuta
    order_by_change_order($table, $position);
}

function order_by_change_order($table, $doc_id, $position) {
    global $db;

    $i = 1;
    foreach ($position as $k => $v) {
        $req = $db->prepare(" Update `budget_lines` SET `order_by`=  :i WHERE `id` = :v AND budget_id = :budget_id ");
        $req->execute(array(
            ":i" => (int) $i,
            ":v" => (int) $v,
            ":budget_id" => (int) $budget_id,
        ));

        $i++;
    }
}

function order_by_create_javascript_html($controller, $doc_id) {

    $html = '<script type="text/javascript">
            $(".row_position").sortable({
                delay: 0.000,
                stop: function () {
                    var selectedData = new Array();
                    var controller = "' . $controller . '";                    
                    var doc_id = "' . $doc_id . '";                    
                    $(".row_position>tr").each(function () {
                        selectedData.push($(this).attr("id"));
                    });
                    updateOrder(controller, doc_id, selectedData);
                }
            });
            function updateOrder(controller, document_id, data) {
                $.ajax({
                    url: "functions/order_by.php",
                    type: "post",
                    data: {
                        c: controller,
                        doc_id: document_id,
                        position: data
                    },
                    success: function () {
//                alert("your change successfully saved");
                        location.reload(true);
                    }
                })
            }
        </script>';

    echo $html;
}

//
//

//
//
//
//
//
//
//
//
// 