-- Adminer 4.8.1 MySQL 10.4.32-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `car_management`;
CREATE DATABASE `car_management` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `car_management`;

DROP TABLE IF EXISTS `cars`;
CREATE TABLE `cars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `cars` (`id`, `brand`, `model`, `year`, `price`) VALUES
(8,	'Suzuki',	'Solio',	2015,	100.00),
(9,	'Suzuki 3',	'Solio 3',	2019,	12000.00),
(11,	'Suzuki 5',	'Solio 5',	2023,	13500.00),
(13,	'Suzuki 9',	'Solio 3',	2025,	100.00);

-- 2025-02-15 18:05:04
