<?php

/**
 * Gestion de mensajes cortos
 * <div class="alert alert-success" role="alert">...</div>
  <div class="alert alert-info" role="alert">...</div>
  <div class="alert alert-warning" role="alert">...</div>
  <div class="alert alert-danger" role="alert">...</div>
 * 
 * 
 */
function sms($sms, $type = null) {

    switch (strtolower($sms)) {
        case 'updated':
            message("success", 'Updated');
            break;
        case 'update':
            message("success", 'Update');
            break;
        default:
            $txt = false;
            break;
    }
}
