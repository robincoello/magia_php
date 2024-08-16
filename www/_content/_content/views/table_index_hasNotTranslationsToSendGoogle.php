INSERT INTO `bacs` (`id`, `name`, `color`, `description`, `order_id`, `order_by`, `status`) VALUES 
('1', '1', '1', '1', NULL, '1', '1'), 
('2', '2', '2', '2', NULL, '1', '1'); 

<p></p>
<hr>
INSERT INTO `_translations` (`id`, `content`, `language`, `translation`) VALUES 
(NULL, 'orders', 'fr_BE', 'Commandes'),
(NULL, 'orders', 'fr_BE', 'Commandes'),
(NULL, 'orders', 'fr_BE', 'Commandes'),
(NULL, 'orders', 'fr_BE', 'Commandes');
<hr>

INSERT INTO `_translations` (`id`, `content`, `language`, `translation`) VALUES 
<hr>

UPDATE `_translations` SET `translation` = 'Columne to show' WHERE `_translations`.`id` = 29030; 
<hr>

<?php
foreach ($_content as $key => $value) {
//    vardump($value);
    echo "(NULL, '$value[frase]', 'es_ES', '$value[frase]'),";
    echo "<br>";
}
?>
<hr>

UPDATE `_translations` SET `translation` = 'Columne to show' WHERE `_translations`.`id` = 29030; 
<hr>

<?php
foreach ($_content as $key => $value) {
//    vardump($value);
    echo "UPDATE `_translations` SET `translation` = '$value[frase]' WHERE `_translations`.`id` = $value[id]; ";
    echo "<br>";
}
?>
<hr>


UPDATE `_translations` SET `translation` = 'El número de cuenta ya existe' WHERE `_translations`.`id` = 34932;
UPDATE `_translations` SET `translation` = 'Agregar imagen' WHERE `_translations`.`id` = 34930;

