<?php

function tasks_status_change_status($id, $status) {

    global $db;
    $req = $db->prepare(" UPDATE tasks_status SET "
            . "status=:status  "
            . " WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "status" => $status,
    ));
}
