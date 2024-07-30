<?php

// https://blogprog.gonzalolopez.es/articulos/pasar-una-funcion-como-parametro-de-otra-funcion-en-php.html
// https://programadorwebvalencia.com/cursos/php/funciones/
// https://www.php.net/manual/es/function.runkit-function-rename.php
//
function tasks_categories_function($col_name, $value) {

    switch ($col_name) {
        case "father_id":
            return '<a href="index.php?c=tasks_categories&a=search&w=by_father_id&father_id=' . $value . '">' . tasks_categories_field_id("category", $value) . '</a>';
            break;

        default:
            return $value;
            break;
    }
}

// SEARCH
function tasks_categories_without_father($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `father_id`,  `category`,  `color`,  `icon`,  `order_by`,  `status`    FROM `tasks_categories` 
    WHERE `father_id` IS NULL 
    ORDER BY `order_by` DESC, `id` DESC
    Limit  $limit OFFSET $start
";
    $query = $db->prepare($sql);
//    $query->bindValue(':field', "field", PDO::PARAM_STR);
//    $query->bindValue(':txt',   "%$txt%", PDO::PARAM_STR);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}
