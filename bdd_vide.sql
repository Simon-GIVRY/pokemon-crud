-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour crud-pkmn
CREATE DATABASE IF NOT EXISTS `crud-pkmn` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `crud-pkmn`;

-- Listage de la structure de la table crud-pkmn. pokemon_games
CREATE TABLE IF NOT EXISTS `pokemon_games` (
  `pkmn_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pkmn_game_name` varchar(255) DEFAULT NULL,
  `pkmn_generation` int(11) DEFAULT NULL,
  `pkmn_release_date` DATE DEFAULT NULL,
  `pkmn_support` varchar(255) DEFAULT NULL,
  `pkmn_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pkmn_id`),
  UNIQUE KEY `pkmn_id` (`pkmn_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table crud-pkmn.pokemon_games : ~0 rows (environ)
/*!40000 ALTER TABLE `pokemon_games` DISABLE KEYS */;
/*!40000 ALTER TABLE `pokemon_games` ENABLE KEYS */;

-- Listage de la structure de la table crud-pkmn. users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table crud-pkmn.users : ~0 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
