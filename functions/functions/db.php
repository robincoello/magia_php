<?php

function db_list_tables_from_db($database) {
    global $db;
    $data = null;
    $req = $db->prepare("            
            SHOW FULL TABLES FROM $database; 
            ");
    $req->execute(array($database));
    $data = $req->fetchAll();
    return $data;
}

function db_cols_from_table($table) {
    global $db;
    $data = null;
    $req = $db->prepare("            
             SHOW COLUMNS FROM $table
            ");
    $req->execute(array($table));
    $data = $req->fetchAll();
    return $data;
}

/**
 * 
 * @param type $filePath
 * @param type $hostname
 * @param type $db_user
 * @param type $db_pass
 * @param type $db_name
 * @param type $test Muesra lo que se esta haciendo
 * @return array
 */
function db_fill($filePath, $hostname, $db_user, $db_pass, $db_name, $test = false) {
//    $conn = mysqli_connect("localhost", "root", "root", "factux_test");
    $conn = mysqli_connect($hostname, $db_user, $db_pass, $db_name);
//    mysqli_connect($hostname, $username, $password, $database);
    $sql = '';
    $error = array();
    if (file_exists($filePath)) {
        $lines = file($filePath);
        foreach ($lines as $line) {
//            echo "$line<br>";
//            
            if (!$test) {
                // Ignoring comments from the SQL script
                if (substr($line, 0, 2) == '--' || $line == '') {
                    continue;
                }
                $sql .= $line;
                if (substr(trim($line), - 1, 1) == ';') {
                    $result = mysqli_query($conn, $sql);
                    if (!$result) {
                        array_push($error, mysqli_error($conn));
                    }
                    $sql = '';
                }
            } else {
                echo "$line<br>";
            }
            //
            //
            //
        } // end foreach
    } else {
        array_push($error, $filePath . ' no fue encontrada');
    }
    return $error;
}

function db_update($filePath, $hostname, $db_user, $db_pass, $db_name, $tva_cloud_contact, $test = false) {
    // coneccion
    $conn = mysqli_connect($hostname, $db_user, $db_pass, $db_name);
    //
    $sql = '';
    $error = array();
    if (file_exists($filePath)) {
        $lines = file($filePath);
        foreach ($lines as $line) {
            // Template
            $line = db_tmp($line, $tva_cloud_contact);
//            echo "$line<br>";
            if (!$test) {
                // Ignoring comments from the SQL script
                if (substr($line, 0, 2) == '--' || $line == '') {
                    continue;
                }
                $sql .= $line;
                if (substr(trim($line), - 1, 1) == ';') {
                    $result = mysqli_query($conn, $sql);
                    if (!$result) {
                        array_push($error, mysqli_error($conn));
                    }
                    $sql = '';
                }
            } else {
                echo "$line<br>";
            }
        } // end foreach
    } else {
        array_push($error, $filePath . ' no fue encontrada');
    }
    return $error;
}

//
function db_tmp($txt, $tva_contact_cloud) {

    $cc = cloud_company_details_by_tva($tva_contact_cloud);

    $ab = cloud_addresses_billing_by_contact_id($cc['id']);

    $tags = array(
        "%company_name%" => $cc['name'],
        "%tva%" => $cc['tva'],
        "%owner_name%" => $company->getEmployees()[0]->getName(),
        "%owner_lastname%" => $company->getEmployees()[0]->getLastame(),
        "%address%" => $ab['address'],
        "%number%" => $ab['number'],
        "%postcode%" => $ab['postcode'],
        "%barrio%" => $ab['barrio'],
        "%sector%" => $ab['sector'],
        "%ref%" => $ab['ref'],
        "%city%" => $ab['city'],
        "%province%" => $ab['province'],
        "%region%" => $ab['region'],
        "%country%" => $ab['country'],
        "%company_email%" => cloud_directory_list_by_contact_name($cc['id'], 'Email'),
        "%owner_email%" => cloud_directory_list_by_contact_name(60001, 'Email'),
        "%owner_email_password%" => password_hash(cloud_directory_list_by_contact_name(60001, 'Email'), PASSWORD_DEFAULT),
    );

    foreach ($tags as $tag => $tmp) {
        $txt = (str_replace($tag, $tmp, $txt));
    }

    return $txt;
}
