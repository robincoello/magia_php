<?php

function form($imputs = array(), $action = 'index.php', $method = 'post', $class = "form-inline") {
    $html = '<form action="' . $action . '" method="' . $method . '" class="' . $class . '">';
    foreach ($imputs as $k => $v) {
        $html .= '<input type="' . $v['type'] . '" name="' . $v['name'] . '" id="' . $v['id'] . '" value="' . $v['value'] . '">';
    }
    return $html;
}

/*
 * <form action="index.php" method="post" class="form-inline">                                                                                              
    <input type="hidden" name="c" value="invoices"> 
    <input type="hidden" name="a" value="ok_linesAddIndividual"> 
    <input type="hidden" name="invoice_id" value="<?php echo "$id" ; ?>"> 
    <input type="hidden" name="status" value="1"> 
    <input type="hidden" name="order_by" value="1"> 
 */