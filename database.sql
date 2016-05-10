-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.5.47-0ubuntu0.14.04.1 - (Ubuntu)
-- OS do Servidor:               debian-linux-gnu
-- HeidiSQL Versão:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela cordel.areas
DROP TABLE IF EXISTS `areas`;
CREATE TABLE IF NOT EXISTS `areas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `group_menu_id` int(11) DEFAULT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `appear` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `controller` varchar(25) NOT NULL,
  `controller_label` varchar(50) DEFAULT NULL,
  `action` varchar(25) NOT NULL,
  `action_label` varchar(50) NOT NULL DEFAULT '',
  `icon` varchar(50) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `appear` (`appear`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela cordel.areas: ~18 rows (aproximadamente)
DELETE FROM `areas`;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` (`id`, `group_menu_id`, `parent_id`, `appear`, `controller`, `controller_label`, `action`, `action_label`, `icon`) VALUES
	(1, 1, NULL, 1, 'Areas', 'Areas', 'index', 'listar', 'fa-cog'),
	(2, 1, NULL, 0, 'Areas', 'Areas', 'view', 'Visualizar', ''),
	(3, 1, NULL, 0, 'Areas', 'Areas', 'add', 'Adicionar', ''),
	(4, 1, NULL, 0, 'Areas', 'Areas', 'edit', 'Editar', ''),
	(5, 1, NULL, 1, 'Profiles', 'Perfies', 'index', 'lista', ''),
	(6, 1, NULL, 0, 'Profiles', 'Perfies', 'add', 'Adicionar', ''),
	(8, 1, NULL, 0, 'Profiles', 'Perfies', 'edit', 'Editar', ''),
	(10, 1, NULL, 0, 'Profiles', 'Perfies', 'delete', 'Excluir', ''),
	(11, 1, NULL, 1, 'Users', 'Usuarios', 'index', 'listar', ' fa-users'),
	(12, 0, NULL, 0, 'Users', 'Usuarios', 'view', 'Visualizar', ''),
	(13, 0, NULL, 0, 'Users', 'Usuarios', 'edit', 'Editar', ''),
	(14, 0, NULL, 0, 'Users', 'Usuarios', 'add', 'Adicionar', ''),
	(15, 0, NULL, 0, 'Users', 'Usuarios', 'delete', 'Excluir', ''),
	(16, 1, NULL, 1, 'GroupMenus', 'Grupo de menus', 'index', 'Listar', ''),
	(17, NULL, NULL, 0, 'GroupMenus', 'Grupo de menus', 'add', 'Adicionar', ''),
	(18, NULL, NULL, 0, 'GroupMenus', 'Grupo de menus', 'edit', 'Editar', ''),
	(19, NULL, NULL, 0, 'GroupMenus', 'Grupo de menus', 'view', 'Visualizar', ''),
	(20, NULL, NULL, 0, 'GroupMenus', 'Grupo de menus', 'delete', 'Excluir', '');
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;


-- Copiando estrutura para tabela cordel.areas_profiles
DROP TABLE IF EXISTS `areas_profiles`;
CREATE TABLE IF NOT EXISTS `areas_profiles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `area_id` int(11) unsigned NOT NULL,
  `profile_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `area_profile` (`area_id`,`profile_id`),
  KEY `profile_area_idx` (`profile_id`),
  CONSTRAINT `area_area_profile` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `profile_area` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela cordel.areas_profiles: ~21 rows (aproximadamente)
DELETE FROM `areas_profiles`;
/*!40000 ALTER TABLE `areas_profiles` DISABLE KEYS */;
INSERT INTO `areas_profiles` (`id`, `area_id`, `profile_id`) VALUES
	(26, 1, 1),
	(45, 1, 2),
	(27, 2, 1),
	(46, 2, 2),
	(28, 3, 1),
	(47, 3, 2),
	(29, 4, 1),
	(30, 5, 1),
	(31, 6, 1),
	(32, 8, 1),
	(33, 10, 1),
	(34, 11, 1),
	(35, 12, 1),
	(36, 13, 1),
	(37, 14, 1),
	(38, 15, 1),
	(39, 16, 1),
	(40, 17, 1),
	(41, 18, 1),
	(44, 19, 1),
	(43, 20, 1);
/*!40000 ALTER TABLE `areas_profiles` ENABLE KEYS */;


-- Copiando estrutura para tabela cordel.group_menus
DROP TABLE IF EXISTS `group_menus`;
CREATE TABLE IF NOT EXISTS `group_menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT '0',
  `icon` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela cordel.group_menus: ~3 rows (aproximadamente)
DELETE FROM `group_menus`;
/*!40000 ALTER TABLE `group_menus` DISABLE KEYS */;
INSERT INTO `group_menus` (`id`, `name`, `icon`) VALUES
	(1, 'Configurações', 'fa-dashboard'),
	(3, 'Teste2', ''),
	(4, 'teste3', 'fa-dashboard');
/*!40000 ALTER TABLE `group_menus` ENABLE KEYS */;


-- Copiando estrutura para tabela cordel.profiles
DROP TABLE IF EXISTS `profiles`;
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela cordel.profiles: ~2 rows (aproximadamente)
DELETE FROM `profiles`;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` (`id`, `name`, `created`, `modified`) VALUES
	(1, 'Admin', '2016-03-09 18:00:15', '2016-04-26 16:01:02'),
	(2, 'Teste', '2016-04-26 18:14:22', '2016-04-26 18:14:58');
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;


-- Copiando estrutura para tabela cordel.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) DEFAULT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` char(1) NOT NULL,
  `last_login` datetime NOT NULL,
  `password` varchar(255) NOT NULL,
  `pass_switched` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela cordel.users: ~1 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `profile_id`, `name`, `email`, `gender`, `last_login`, `password`, `pass_switched`, `created`, `modified`) VALUES
	(1, 1, 'Admin', 'admin', 'M', '2016-04-27 14:09:07', '$2y$10$i2icDxj3EvPQDMGdy0dEtuJgFjZobJ4ZNL6S3QFuB/ekIPhQx3ReG', 1, '2016-03-09 02:41:22', '2016-04-27 14:09:07');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
