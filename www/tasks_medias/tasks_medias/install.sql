 
--
--
--

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, 'tasks_medias', NULL, 'tasks_medias', 'tasks_medias', 'robinson coello', 'robincoello@hotmail.com', 'https://coello.be', '1', '1', '1') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, 'tasks_medias', 'tasks_medias', 'tasks_medias') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, 'root', 'tasks_medias', '1111'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, 'top', NULL, 'tasks_medias', 'tasks_medias', 'index.php?c=tasks_medias', NULL, 'glyphicon glyphicon-file', '1', '1');  
    

        
