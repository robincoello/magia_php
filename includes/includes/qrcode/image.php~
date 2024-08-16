<?php

$msg = isset($_GET['msg']) ? $_GET['msg'] : '';
if (!$msg)
    $msg = "Le site du spipu\r\nhttp://spipu.net/";


$err = isset($_GET['err']) ? $_GET['err'] : '';
if (!in_array($err, array('L', 'M', 'Q', 'H')))
    $err = 'L';

require_once('qrcode.class.php');

$qrcode = new QRcode(($msg), $err);
$qrcode->disableBorder();
$qrcode->displayPNG(200);
