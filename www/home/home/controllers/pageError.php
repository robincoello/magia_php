<?php

$smst = (isset($_REQUEST['smst'])) ? clean($_REQUEST['smst']) : false;
$smsm = (isset($_REQUEST['smsm'])) ? clean($_REQUEST['smsm']) : false;

include view("home", "pageError");

