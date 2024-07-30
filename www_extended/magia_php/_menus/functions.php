<?php

function _menus_get_file_name($file) {
    $info = pathinfo($file);
    $file_name = basename($file, '.' . $info['extension']);
    return $file_name;
}

function _menu_icon($location, $module) {
    $icon = _menu_iconr($location, $module);
    if ($icon) {
        $html = '<span class="' . $icon . '"></span>';
    } else {
        $html = '<span class="glyphicon glyphicon-file"></span>';
    }
    echo ($html);
}

function _menu_iconr($location, $module) {

    $val = _menus_search_icon($location, $module);

    return $val ?? false;
}

function _menus_list_by_location($location, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT *  FROM `_menus` 
    WHERE `location` = :location
    ORDER BY `order_by` , `id` DESC
    Limit  :limit OFFSET :start
";
    $query = $db->prepare($sql);
    $query->bindValue(':location', $location, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function _menus_list_by_location_father($location, $father_id, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `location`,  `father_id`,  `label`,  `controller`,  `url`,  `target`,  `icon`,  `order_by`,  `status`    FROM `_menus` 
    WHERE `location` = :location AND  `father_id` = :father_id
    ORDER BY `order_by` DESC, `id` DESC
    Limit  :limit OFFSET :start
";
    $query = $db->prepare($sql);
    $query->bindValue(':location', $location, PDO::PARAM_STR);
    $query->bindValue(':father_id', $father_id, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function _menus_list_by_location_with_father($location, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `location`,  `father_id`,  `label`,  `controller`,  `url`,  `target`,  `icon`,  `order_by`,  `status`    FROM `_menus` 
    WHERE `location` = :location AND  `father_id` IS NOT NULL
    ORDER BY `order_by` DESC, `id` DESC
    Limit  :limit OFFSET :start
";
    $query = $db->prepare($sql);
    $query->bindValue(':location', $location, PDO::PARAM_STR);
//    $query->bindValue(':father_id', $father_id, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function _menus_list_by_location_controller($location, $controller, $start = 0, $limit = 999) {
    global $db;

    $sql = "SELECT `id`,  `location`,  `father_id`,  `label`,  `controller`,  `url`,  `target`,  `icon`,  `order_by`,  `status`    FROM `_menus` 
    WHERE `location` = :location AND  `controller` =:controller
    ORDER BY `order_by` DESC, `id` DESC
    Limit  :limit OFFSET :start
";
    $query = $db->prepare($sql);
    $query->bindValue(':location', $location, PDO::PARAM_STR);
    $query->bindValue(':controller', $controller, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function _menus_search_icon($location, $controller) {
    global $db;

    $sql = "SELECT  `icon`   FROM `_menus` 
    WHERE `location` = :location AND  `controller` =:controller
    Limit  1 OFFSET 0
";
    $query = $db->prepare($sql);
    $query->bindValue(':location', $location, PDO::PARAM_STR);
    $query->bindValue(':controller', $controller, PDO::PARAM_STR);
    $query->execute();
    $data = $query->fetch();
    return $data[0] ?? null;
}

function _menus_list_by_location_without_father($location, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `location`,  `father_id`,  `label`,  `controller`,  `url`,  `target`,  `icon`,  `order_by`,  `status`    FROM `_menus` 
    WHERE `location` = :location AND  `father_id` IS NULL
    ORDER BY `order_by`, `id` DESC
    Limit  :limit OFFSET :start
";
    $query = $db->prepare($sql);
    $query->bindValue(':location', $location, PDO::PARAM_STR);
//    $query->bindValue(':father', $father_id, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function _menus_list_childrens_from_father($father_id, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT * FROM `_menus` 
    WHERE `father_id` = :father_id
    ORDER BY `order_by` DESC, `id` DESC
    Limit  :limit OFFSET :start
";
    $query = $db->prepare($sql);
//    $query->bindValue(':location', $location, PDO::PARAM_STR);
    $query->bindValue(':father_id', $father_id, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function _menus_list_childrens_from_father_location($father_id, $location, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `location`,  `father_id`,  `label`,  `controller`,  `url`,  `target`,  `icon`,  `order_by`,  `status`    FROM `_menus` 
    WHERE `father_id` = :father_id AND `location` = :location
    ORDER BY `order_by` DESC, `id` DESC
    Limit  :limit OFFSET :start
";
    $query = $db->prepare($sql);
    $query->bindValue(':location', $location, PDO::PARAM_STR);
    $query->bindValue(':father_id', $father_id, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function _menus_dropdown_create_html($location, $item) {
    global $u_rol, $u_id, $c;

    $childrens = _menus_list_childrens_from_father_location($item['id'], $location);

//    vardump($c);
//vardump($childrens);

    $class_active = '';

    if ($c == strtolower($item['label'])) {
        $class_active = ' class="active" ';
    }



    if ($childrens) {
// echo $item['label'] ;
//TEMPLATE
//TEMPLATE
//TEMPLATE
//TEMPLATE
//TEMPLATE
        if ($item['label'] == '%u_name_lastname%') {
            $label = contacts_formated($u_id) . " (" . $u_rol . ")";
        } else {
            $label = _tr(ucfirst($item['label']));
        }


        $html = '<li ' . $class_active . ' class="dropdown">
                    <a href="#"
                       class="dropdown-toggle"
                       data-toggle="dropdown"
                       role="button"
                       aria-haspopup="true"
                       aria-expanded="false"
                       >
                        <span class="' . $item['icon'] . '"></span>
                        ' . $label . '
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu"> ';

        foreach ($childrens as $children) {
// si tiene permiso para ver
// lo mostramos
// vardump($children['controller']);
//             vardump($children);


            if (_menus_can_show($children['controller'])) {
                $html .= _menus_dropdown_create_link($children);
            }
        }

        $html .= '
                    </ul>
                </li>';
    } else {
// SIN HIJOS
        $html = _menus_dropdown_create_link($item);
    }

    if (_menus_can_show($item['controller'])) {
        return $html;
    } else {
        return false;
    }
}

function _menus_dropdown_create_link($link, $link_actual = null) {

    global $c;

    $class = "";
    $target = "";

//    vardump($link['url']);
//    vardump($link_actual);
//    vardump($class);
//    vardump($link);
//    vardump($link['url']);
//    vardump($link_actual);
//    vardump($c);
//    vardump($link['controller']);

    $target = ($link['target']) ? ' target="' . $link['target'] . '" ' : "";
    $class = ($link['url'] == $link_actual ) ? ' class="active" ' : ' ';

    $class = ( $c == $link['controller'] ) ? ' class="active" ' : ' ';

    if ($link['label'] == "separator") {
        $l = '<li role="separator" class="divider"></li>';
    } else {
        $l = '<li ' . $class . ' ><a href="' . $link['url'] . '" ' . $target . ' ><span class="' . $link['icon'] . '"></span> ' . _tr(ucfirst($link['label'])) . '</a></li>';
    }
    return $l;
}

function _menus_can_show($controller) {
    global $u_rol;

    if ($controller == '' || $controller == NULL) {
        return false;
    }

    if (!permissions_has_permission($u_rol, $controller, 'read')) {
        return false;
    }

    if (!modules_field_module('status', $controller)) {
        return false;
    }

    if (modules_field_module('father', $controller) != null && !modules_field_module('status', modules_field_module('father', $controller))) {
        return false;
    }

    return true;
}

// SEARCH
function _menus_search_by_location_father_id($location, $father_id, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `location`,  `father_id`,  `label`,  `controller`,  `url`,  `target`,  `icon`,  `order_by`,  `status`    FROM `_menus` 
    WHERE `location` = :location AND `father_id` = :father_id 
    ORDER BY `order_by` DESC, `id` DESC
    Limit  :limit OFFSET :start
";
    $query = $db->prepare($sql);
    $query->bindValue(':location', $location, PDO::PARAM_STR);
    $query->bindValue(':father_id', $father_id, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// SEARCH
function _menus_search_by_controller_location($c, $location, $start = 0, $limit = 999) {
    global $db;
    $data = null;

    $sql = "SELECT * FROM `_menus` 
    
    WHERE `controller` = :c AND `location` = :location 
    
    ORDER BY `order_by`, `label`
    
    Limit  :limit OFFSET :start
";
    $query = $db->prepare($sql);
    $query->bindValue(':c', $c, PDO::PARAM_STR);
    $query->bindValue(':location', $location, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function _menus_add_filter($col_name, $value) {

    switch ($col_name) {
        case "father_id":
            return _menus_field_id("label", $value);
            break;
        case "icon":
            return '<span class="' . $value . '"></span>';
            break;

        default:
            return $value;
            break;
    }
}

function _menus_is_controller($controller) {
    if (!$controller) {
        return false;
    }

    if (_menus_search_by('controller', $controller)) {
        return true;
    }
}

function _menus_create_menu_items_by_controller_location($c, $location = __FILE__) {

    echo '<ul class = "nav navbar-nav">';
    foreach (_menus_search_by_controller_location($c, _menus_get_file_name($location)) as $key => $msbcl) {
        $target = ($msbcl['target']) ? ' target="' . $msbcl['target'] . '" ' : '';
        if (!_menus_list_childrens_from_father($msbcl['id'])) {
            echo '<li><a href="' . $msbcl["url"] . '"  ' . $target . '><span class="' . $msbcl["icon"] . '"> </span> ' . $msbcl["label"] . '</a></li>';
        } else {
            echo ' <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="' . $msbcl["icon"] . '"></span> ' . _tr($msbcl['label']) . ' <span class="caret"></span></a>
           <ul class="dropdown-menu">';
            foreach (_menus_list_childrens_from_father($msbcl['id']) as $key => $mlcff) {
                echo '<li><a href="' . $mlcff["url"] . '"> <span class="' . $msbcl["icon"] . '"></span> ' . $mlcff["label"] . '</a></li>';
            }
            echo '
          </ul>
        </li>';
        }
    }
    echo '</ul>';
}

// SEARCH
function _menus_search_full(
        $location,
        $father_id,
        $label,
        $controller,
        $target,
        $icon,
        $order_by,
        $status,
        $start = 0, $limit = 999
) {

    global $db;

    $where_location = (isset($location) && $location != '' && $location != 'null' ) ? " = '$location' " : " IS NOT NULL ";
    $where_father_id = (isset($father_id) && $father_id != '' && $father_id != 'null' ) ? " = '$father_id' " : " > 0 ";

    $req = $db->prepare("
        SELECT *
        FROM `_menus`
        WHERE `location` $where_location
            AND `father_id` $where_father_id
    

"
    );

    $req->execute();
    $data = $req->fetchall();
    return $data;
}

function _menus_next_order_by_by_location($location) {
    global $db;
    $data = null;

    $sql = "SELECT MAX(order_by) as max FROM `_menus` 
    
    WHERE `location` = :location                 

";
    $query = $db->prepare($sql);
    $query->bindValue(':location', $location, PDO::PARAM_STR);
    $query->execute();
    $data = $query->fetch();
    return ($data[0]) ? $data[0] + 1 : 1;
}
