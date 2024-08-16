<?php

/**
 * Created by: Magia_php
 * Author: Robinson Coello s.
 * Web: http://coello.be
 * E-mail: robincoello@hotmail.com
 * Date: 2020-04-22
 */
function mostrar_valores($v = array()) {
    echo "<table border>";
    $i = 0;
    foreach ($v as $key => $value) {
        echo "<t><td>1</td><td>$key</td><td>$value</td><td></td></tr>";
        $i++;
    }
}
