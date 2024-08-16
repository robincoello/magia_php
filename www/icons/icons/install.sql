 
--
--
--

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'icons', NULL, 'icons', 'icons', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'icons', 'icons', 'icons') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'icons', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'icons', 'icons', 'index.php?c=icons', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
