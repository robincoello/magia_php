<?php

function api_extract_quoted_text($input) {
    if (preg_match('/"([^"]+)"/', $input, $matches)) {
        return $matches[1];
    }
    return null;
}