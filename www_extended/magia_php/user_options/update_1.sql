ALTER TABLE `user_options` ADD `order_by` INT(11) NOT NULL DEFAULT '1' AFTER `data`, ADD `status` INT(1) NOT NULL DEFAULT '1' AFTER `order_by`; 
