<?php

// Robinson Coello 
//-----------------
// http://php.net/manual/es/function.number-format.php	  
// http://www.php.net/manual/fr/ref.bc.php
// http://www.informaticien.be/forum_topic-2564--Generer_une_communication_structuree.html
// -----------------------------------------------------------------------------
// Errores
// Fatal error: Uncaught Error: Call to undefined function bcmod() in /var/www/html/jiho_42/admin/communicacion_extructurada.php:30 Stack trace: #0 /var/www/html/jiho_42/www/invoices/controllers/ok_add.php(172): generate_structured_communication() #1 /var/www/html/jiho_42/index.php(169): include('/var/www/html/j...') #2 {main} thrown in /var/www/html/jiho_42/admin/communicacion_extructurada.php on line 30
// Solucion:
// https://xpertdeveloper.com/install-bcmath-extension-in-php/
// Y hago 
// sudo dnf install php-bcmath-7.4.33-*
// sudo service httpd restart 
// robin@localhost /var/www/html/factux_46 (banks)$ sudo dnf install php-bcmath-8.2.16-1.fc39.x86_64 
// -----------------------------------------------------------------------------
// Transaccion 
// extructura ano factura numeroControl precede de ceros hasta completar 12 numeros 
// ejemplo: 0000 2014 77 97
//
// 2 para el digito de control 
// 3 espacios para el numero de factura 
// 2 para el ano
// 5 para la cantidad 99.999 (sin decimales)
// 12345 12 123 12
// fomateamos y queda asi 
// +++123/4512/12312+++	
//		   
//		   
// Usada en : 
// /factura_nueva.php
// https://support.focus.teamleader.eu/en/support/solutions/articles/7000058390-faq-what-is-the-logic-behind-the-structured-communication-

/**
 * Genera la comunicacion extructurada
 * @param type $tr
 * @return type
 */
function generate_structured_communication($tr) {

    try {
        $transactionID = date('Y') . "$tr";
        $control = bcmod($transactionID, 97);
        $control = ($control == "0") ? "97" : $control;
        if ($control < 10) {
            $control = "0" . $control;
        }
        $count = 10 - strlen($transactionID);
        for ($i = 0; $i < $count; $i++) {
            $transactionID = "0" . $transactionID;
        }
        $com = $transactionID . $control;
    } catch (Exception $exc) {
//        echo $exc->getTraceAsString();
//        echo $exc->getTraceAsString();
    }

    if ($exc) {
        return false;
    } else {
        return '+++' . substr($com, 0, 3) . "/" . substr($com, 3, 4) . "/" . substr($com, 7, 5) . '+++';
    }
}

function ce_create($invoice_id, $date_invoice) {
    // saco el año de la fecha enviada 
    $year = magia_dates_get_year_from_date($date_invoice);

    // 2020165
    $transactionID = $year . $invoice_id;

    $control = bcmod($transactionID, 97);
    $control = ($control == "0") ? "97" : $control;
    if ($control < 10) {
        $control = "0" . $control;
    }
    $count = 10 - strlen($transactionID);
    for ($i = 0; $i < $count; $i++) {
        $transactionID = "0" . $transactionID;
    }
    $com = $transactionID . $control;
    return '+++' . substr($com, 0, 3) . "/" . substr($com, 3, 4) . "/" . substr($com, 7, 5) . '+++';
}

// Verifica si una ce es valida
// Ejemplo de uso
//$ce = '+++1234567890123/4567/89012+++';
//if (ce_is_valid($ce)) {
//    echo "El código CE es válido.";
//} else {
//    echo "El código CE no es válido.";
//}
function ce_is_valid($ce) {
    // Eliminar caracteres no numéricos del CE
    $ce = preg_replace('/[^0-9]/', '', $ce);

    // Extraer el control del CE
    $control = substr($ce, -2);

    // Extraer el resto del CE (sin el control)
    $transactionID = substr($ce, 0, -2);

    // Calcular el módulo 97 del transactionID
    $remainder = bcmod($transactionID, 97);

    // Verificar si el módulo 97 del transactionID es igual al control
    return $remainder == $control;
}
