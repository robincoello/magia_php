<?php
//session_start();
session_destroy();
//header('location:view/index.php?msgType=info&msgText=See you next time');
header('location: index.php');
?>
<meta http-equiv="refresh" content="5; URL=index.php">