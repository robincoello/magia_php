-- phpMyAdmin SQL Dump
-- version 5.2.1-1.fc37.remi
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 20 fév. 2023 à 16:49
-- Version du serveur : 10.5.18-MariaDB
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionmanager_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `tasks`
--

CREATE TABLE `tasks` (
`id` int(11) NOT NULL,
`category_id` int(11) DEFAULT NULL,
`contact_id` int(11) NOT NULL,
`title` varchar(250) NOT NULL,
`description` text DEFAULT NULL,
`controller` varchar(50) DEFAULT NULL,
`doc_id` int(11) DEFAULT NULL,
`date_registre` timestamp NOT NULL DEFAULT current_timestamp(),
`date_update` date DEFAULT NULL,
`color` varchar(50) DEFAULT NULL,
`order_by` int(11) NOT NULL DEFAULT 1,
`status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tasks_categories`
--

CREATE TABLE `tasks_categories` (
`id` int(11) NOT NULL,
`category` varchar(50) NOT NULL,
`color` varchar(50) NOT NULL,
`icon` varchar(250) DEFAULT NULL,
`order_by` int(11) NOT NULL DEFAULT 1,
`status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `tasks_categories`
--

INSERT INTO `tasks_categories` (`id`, `category`, `color`, `icon`, `order_by`, `status`) VALUES
(1, 'Category 1', 'white', '<span class=\"glyphicon glyphicon-fire\"></span>', 1, 1),
(2, 'Cat 2', 'white', '<span class=\"glyphicon glyphicon-gift\"></span>', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tasks_contacts`
--

CREATE TABLE `tasks_contacts` (
`id` int(11) NOT NULL,
`task_id` int(11) NOT NULL,
`contact_id` int(11) NOT NULL,
`date_registred` timestamp NOT NULL DEFAULT current_timestamp(),
`order_by` int(11) NOT NULL DEFAULT 1,
`status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tasks_status`
--

CREATE TABLE `tasks_status` (
`id` int(11) NOT NULL,
`code` int(11) NOT NULL,
`name` varchar(50) NOT NULL,
`color` varchar(50) DEFAULT NULL,
`icon` varchar(250) DEFAULT NULL,
`order_by` int(11) NOT NULL DEFAULT 1,
`status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `tasks_status`
--

INSERT INTO `tasks_status` (`id`, `code`, `name`, `color`, `icon`, `order_by`, `status`) VALUES
(1, 0, 'Registred', NULL, '<span class=\"glyphicon glyphicon-hourglass\"></span>', 50, 1),
(2, 10, 'En proceso', NULL, '<span class=\"glyphicon glyphicon-ice-lolly-tasted\"></span>', 40, 1),
(3, 20, 'Transferido', NULL, '<span class=\"glyphicon glyphicon-retweet\"></span>', 30, 1),
(4, 30, 'Terminado', NULL, '<span class=\"glyphicon glyphicon-thumbs-up\"></span>', 20, 1),
(5, -10, 'Anulado', NULL, '<span class=\"glyphicon glyphicon-remove\"></span>', 10, 1),
(7, 5, 'Aceptado', NULL, '<span class=\"glyphicon glyphicon-ice-lolly\"></span>', 45, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tasks`
--
ALTER TABLE `tasks`
ADD PRIMARY KEY (`id`),
ADD KEY `category_id` (`category_id`),
ADD KEY `contact_id` (`contact_id`),
ADD KEY `controller` (`controller`),
ADD KEY `status` (`status`);

--
-- Index pour la table `tasks_categories`
--
ALTER TABLE `tasks_categories`
ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `category` (`category`);

--
-- Index pour la table `tasks_contacts`
--
ALTER TABLE `tasks_contacts`
ADD PRIMARY KEY (`id`),
ADD KEY `contact_id` (`contact_id`),
ADD KEY `task_id` (`task_id`);

--
-- Index pour la table `tasks_status`
--
ALTER TABLE `tasks_status`
ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `code` (`code`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tasks`
--
ALTER TABLE `tasks`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `tasks_categories`
--
ALTER TABLE `tasks_categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tasks_contacts`
--
ALTER TABLE `tasks_contacts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tasks_status`
--
ALTER TABLE `tasks_status`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tasks`
--
ALTER TABLE `tasks`
ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tasks_categories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `tasks_ibfk_3` FOREIGN KEY (`controller`) REFERENCES `controllers` (`controller`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `tasks_ibfk_4` FOREIGN KEY (`status`) REFERENCES `tasks_status` (`code`);

--
-- Contraintes pour la table `tasks_contacts`
--
ALTER TABLE `tasks_contacts`
ADD CONSTRAINT `tasks_contacts_ibfk_1` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `tasks_contacts_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- MODULE

INSERT INTO `modules` (`id`, `name`, `sub_modules`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES
(null, 'tasks', 'task, taskgroups, task_contact, task_status, task_categories, tasks, tasks_categories, tasks_status, tasks_contacts', 'task admin', 'robinson coello', 'robincoello@hotmail.com', 'http://www.gestionmanager.com', '0.0.1', 1, 0);


-- Add controller
INSERT INTO `controllers` (`id`, `controller`, `title`, `description`) VALUES (null, 'tasks', '', ''); 
INSERT INTO `controllers` (`id`, `controller`, `title`, `description`) VALUES (null, 'tasks_categories', '', ''); 
INSERT INTO `controllers` (`id`, `controller`, `title`, `description`) VALUES (null, 'tasks_contacts', '', ''); 
INSERT INTO `controllers` (`id`, `controller`, `title`, `description`) VALUES (null, 'tasks_status', '', ''); 

-- Add permission
-- root
INSERT INTO `permissions` (`id`, `rol`, `controller`, `crud`) VALUES (NULL, 'root', 'tasks', '1111');
INSERT INTO `permissions` (`id`, `rol`, `controller`, `crud`) VALUES (NULL, 'root', 'tasks_categories', '1111');
INSERT INTO `permissions` (`id`, `rol`, `controller`, `crud`) VALUES (NULL, 'root', 'tasks_contacts', '1111');
INSERT INTO `permissions` (`id`, `rol`, `controller`, `crud`) VALUES (NULL, 'root', 'tasks_status', '1111');

-- MENU
INSERT INTO `_menus` (`id`, `location`, `father`, `label`, `url`, `icon`, `order_by`) VALUES
(null, 'top', '', 'tasks', 'index.php?c=tasks', 'glyphicon glyphicon-pushpin', 1),
(null, 'top', 'tasks', 'tasks', 'index.php?c=tasks', 'glyphicon glyphicon-pushpin', 1),
(null, 'top', 'tasks', 'tasks_status', 'index.php?c=tasks_status', 'glyphicon glyphicon-pushpin', 1),
(null, 'top', 'tasks', 'tasks_contacts', 'index.php?c=tasks_contacts', 'glyphicon glyphicon-pushpin', 1),
(null, 'top', 'tasks', 'tasks_categories', 'index.php?c=tasks_categories', 'glyphicon glyphicon-pushpin', 1);