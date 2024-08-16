<?php

header('Content-Type: image/png');
$im = @imagecreatetruecolor(120, 20)
        or die('No se puede Iniciar el nuevo flujo a la imagen GD');
$color_texto = imagecolorallocate($im, 233, 14, 91);
imagestring($im, 1, 5, 5, 'robinson coello', $color_texto);
imagepng($im);
imagedestroy($im);
?>