<?php

function files_get_total_files_in_folder($folder) {

    $total_files_in_folder = 0;

    $directory = "$folder/";
    $scanned_directory = array_diff(scandir($directory), array('..', '.', '.*'));
    foreach ($scanned_directory as $archivo) {
        if (!is_dir("tmp/$archivo")) {
            $total_files_in_folder = $total_files_in_folder + 1;
        }
    }

    return $total_files_in_folder;
}
