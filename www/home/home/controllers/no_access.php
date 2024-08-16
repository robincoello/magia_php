<?php

if (!$_SESSION) {
    header("Location: index.php");
}

include view("home", "no_access");
