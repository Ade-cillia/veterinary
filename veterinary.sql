-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour veterinary
CREATE DATABASE IF NOT EXISTS `veterinary` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `veterinary`;

-- Listage de la structure de la table veterinary. animal
CREATE TABLE IF NOT EXISTS `animal` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `date_birth` varchar(50) NOT NULL DEFAULT '',
  `species` varchar(255) NOT NULL,
  `date_visit` varchar(50) NOT NULL DEFAULT '',
  `sexe` varchar(255) NOT NULL,
  `chip` varchar(255) NOT NULL,
  `picture` text NOT NULL,
  `weight` decimal(10,0) NOT NULL,
  `favorite_healer_id` bigint(20) DEFAULT NULL,
  `owner_id` bigint(11) NOT NULL,
  `date_death` varchar(50) DEFAULT NULL,
  `other` text,
  PRIMARY KEY (`id`),
  KEY `favorite_healer_id` (`favorite_healer_id`),
  KEY `fk_animal_owner` (`owner_id`),
  CONSTRAINT `FK_animal_worker` FOREIGN KEY (`favorite_healer_id`) REFERENCES `worker` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `fk_animal_owner` FOREIGN KEY (`owner_id`) REFERENCES `owner` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Listage des données de la table veterinary.animal : ~1 rows (environ)
/*!40000 ALTER TABLE `animal` DISABLE KEYS */;
INSERT INTO `animal` (`id`, `name`, `date_birth`, `species`, `date_visit`, `sexe`, `chip`, `picture`, `weight`, `favorite_healer_id`, `owner_id`, `date_death`, `other`) VALUES
	(2, 'minecraft', '4664-05-06', 'Chat', '6644-04-05', 'man', 'fdsfds', 'image/animal/default.png', 45, 16, 6, NULL, NULL),
	(3, 'Tipouf', '5321-06-05', 'Chaton', '0322-06-05', 'women', '45642341fd23s.f', 'image/animal/default.png', 36, 16, 6, NULL, NULL),
	(4, 'Jiflou', '42312-06-05', 'chien', '3513-11-23', 'man', '4c65s435dv41xcc3', 'image/animal/add/jiflou.jpg', 1, 18, 6, NULL, NULL);
/*!40000 ALTER TABLE `animal` ENABLE KEYS */;

-- Listage de la structure de la table veterinary. cabinet
CREATE TABLE IF NOT EXISTS `cabinet` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Listage des données de la table veterinary.cabinet : ~0 rows (environ)
/*!40000 ALTER TABLE `cabinet` DISABLE KEYS */;
INSERT INTO `cabinet` (`id`, `name`, `adress`, `phone`) VALUES
	(1, 'vetoPlus', '3 rue salamandre, 38460, Villemoirieu', '0666666666'),
	(2, 'MAxiTo', '96 Rue Palissandre,3695,Paris', '0999999');
/*!40000 ALTER TABLE `cabinet` ENABLE KEYS */;

-- Listage de la structure de la table veterinary. heal
CREATE TABLE IF NOT EXISTS `heal` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `date_start` varchar(50) NOT NULL DEFAULT '',
  `date_end` varchar(50) NOT NULL DEFAULT '',
  `animal_id` bigint(20) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `payd` tinyint(1) NOT NULL,
  `room_id` bigint(20) DEFAULT NULL,
  `other` text,
  `finish` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `animal_id` (`animal_id`),
  KEY `room_id` (`room_id`),
  CONSTRAINT `FK_heal_animal` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_heal_room` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- Listage des données de la table veterinary.heal : ~4 rows (environ)
/*!40000 ALTER TABLE `heal` DISABLE KEYS */;
INSERT INTO `heal` (`id`, `name`, `date_start`, `date_end`, `animal_id`, `price`, `payd`, `room_id`, `other`, `finish`) VALUES
	(23, 'dssfsds', '2021-04-06T04:54', '2021-04-06T04:54', 2, 12, 0, 1, NULL, 0),
	(24, 'dssfsds', '2021-04-06T04:54', '2021-04-06T04:54', 2, 12, 0, 1, NULL, 0),
	(25, 'dssfsds', '2021-04-06T04:54', '2021-04-06T04:54', 2, 12, 0, 1, NULL, 0),
	(28, 'piquouse', '54546-06-05T04:56', '64564-05-04T05:45', 3, 199, 1, 5, NULL, 1);
/*!40000 ALTER TABLE `heal` ENABLE KEYS */;

-- Listage de la structure de la table veterinary. owner
CREATE TABLE IF NOT EXISTS `owner` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `phone` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL DEFAULT '',
  `other` text,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `adress` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Listage des données de la table veterinary.owner : ~3 rows (environ)
/*!40000 ALTER TABLE `owner` DISABLE KEYS */;
INSERT INTO `owner` (`id`, `phone`, `mail`, `other`, `last_name`, `first_name`, `date_inscription`, `adress`) VALUES
	(6, '5552423312', 'dfsd', NULL, '', 'ffdsfdsf', '2022-04-03 20:02:14', 'fsdfsdf'),
	(7, '0637057595', 'aureliendu3809@outlook.fr', NULL, 'DE CILLIA', 'Aurélien', '2022-04-03 20:06:16', '3 impasse des Libellules');
/*!40000 ALTER TABLE `owner` ENABLE KEYS */;

-- Listage de la structure de la table veterinary. room
CREATE TABLE IF NOT EXISTS `room` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `cabinet_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_room_cabinet` (`cabinet_id`),
  CONSTRAINT `fk_room_cabinet` FOREIGN KEY (`cabinet_id`) REFERENCES `cabinet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Listage des données de la table veterinary.room : ~8 rows (environ)
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
INSERT INTO `room` (`id`, `name`, `type`, `cabinet_id`) VALUES
	(1, 'S01', 'consultation', 1),
	(2, 'S02', 'consultation', 1),
	(3, 'S03', 'consultation', 1),
	(4, 'S04', 'operation', 1),
	(5, 'S05', 'operation', 1),
	(6, 'S01', 'consultation', 2),
	(7, 'S02', 'consultation', 2),
	(8, 'S03', 'operation', 2),
	(9, 'S04', 'operation', 2),
	(10, 'S05', 'operation', 2),
	(11, 'B01', 'operation', 1);
/*!40000 ALTER TABLE `room` ENABLE KEYS */;

-- Listage de la structure de la table veterinary. treatment
CREATE TABLE IF NOT EXISTS `treatment` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `worker_id` bigint(20) DEFAULT NULL,
  `heal_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_treatment_worker` (`worker_id`) USING BTREE,
  KEY `fk_treatment_heal` (`heal_id`),
  CONSTRAINT `FK_treatment_heal` FOREIGN KEY (`heal_id`) REFERENCES `heal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_treatment_worker` FOREIGN KEY (`worker_id`) REFERENCES `worker` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Listage des données de la table veterinary.treatment : ~3 rows (environ)
/*!40000 ALTER TABLE `treatment` DISABLE KEYS */;
INSERT INTO `treatment` (`id`, `worker_id`, `heal_id`) VALUES
	(8, 20, 25),
	(13, 18, 28),
	(14, 17, 28);
/*!40000 ALTER TABLE `treatment` ENABLE KEYS */;

-- Listage de la structure de la table veterinary. worker
CREATE TABLE IF NOT EXISTS `worker` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `upper_id` bigint(20) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `date_in` varchar(255) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `picture` text NOT NULL,
  `specialties` varchar(255) NOT NULL,
  `nb_heal_max` int(11) NOT NULL,
  `date_out` varchar(255) DEFAULT NULL,
  `other` text,
  `cabinet_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `upper_id` (`upper_id`),
  KEY `cabinet_id` (`cabinet_id`),
  CONSTRAINT `FK_worker_cabinet` FOREIGN KEY (`cabinet_id`) REFERENCES `cabinet` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `FK_worker_worker` FOREIGN KEY (`upper_id`) REFERENCES `worker` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- Listage des données de la table veterinary.worker : ~4 rows (environ)
/*!40000 ALTER TABLE `worker` DISABLE KEYS */;
INSERT INTO `worker` (`id`, `upper_id`, `last_name`, `first_name`, `date_in`, `sexe`, `phone`, `mail`, `picture`, `specialties`, `nb_heal_max`, `date_out`, `other`, `cabinet_id`) VALUES
	(16, NULL, 'Bernard ', 'Durant', '2005-05-04', 'man', '0637057595', 'aureliendu3809@outlook.fr', 'image/worker/default.png', 'fourmis', 6, '2002-04-25', NULL, 1),
	(17, 16, 'DE CILLIA', 'Aurélien', '6644-04-05', 'man', '0637057595', 'aureliendu3809@outlook.fr', 'image/worker/default.png', 'blate', 666, '2002-06-04', NULL, 1),
	(18, 16, 'Gravat', 'Ethienne', '5666-04-25', 'man', '0637057595', 'aureliendu3809@outlook.fr', 'image/worker/default.png', 'éléphant', 4, '4665-05-06', 'Problème de santé, besoin d\'un assistant', 1),
	(20, 16, 'DE CILLIA', 'Aurélien', '0645-04-05', 'man', '0637057595', 'aureliendu3809@outlook.fr', 'image/worker/default.png', 'chat', 5, '5645-04-06', NULL, 2),
	(22, 18, 'Unity', 'Masty', '0645-05-07', 'man', '0666666666', 'aureliendu3809@outlook.fr', 'image/worker/add/metaverse-coins-unity.jpg', 'unityAnimal', 1, '0054-04-05', 'unity for life', 2);
/*!40000 ALTER TABLE `worker` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
