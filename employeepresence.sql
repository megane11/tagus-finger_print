-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 19 août 2025 à 10:09
-- Version du serveur : 11.5.2-MariaDB
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `employeepresence`
--

-- --------------------------------------------------------

--
-- Structure de la table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_name` varchar(100) NOT NULL,
  `post` enum('employee','intern') NOT NULL,
  `finger_print_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `employees`
--

INSERT INTO `employees` (`employee_id`, `employee_name`, `post`, `finger_print_id`) VALUES
(1, 'Alice Johnson', 'employee', 101),
(2, 'Bob Smith', 'intern', 102),
(3, 'Charlie Brown', 'employee', 103);

-- --------------------------------------------------------

--
-- Structure de la table `presence`
--

DROP TABLE IF EXISTS `presence`;
CREATE TABLE IF NOT EXISTS `presence` (
  `presence_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `arrival_time` datetime DEFAULT current_timestamp(),
  `departure_time` datetime DEFAULT current_timestamp(),
  `date` date DEFAULT curdate(),
  PRIMARY KEY (`presence_id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `presence`
--

INSERT INTO `presence` (`presence_id`, `employee_id`, `arrival_time`, `departure_time`, `date`) VALUES
(1, 1, '2025-08-14 08:05:00', '2025-08-14 17:15:00', '2025-08-14'),
(2, 2, '2025-08-14 09:00:00', '2025-08-14 15:45:00', '2025-08-14'),
(3, 3, '2025-08-15 08:20:00', '2025-08-15 17:05:00', '2025-08-15'),
(4, 1, '2025-08-15 08:00:00', '2025-08-15 16:50:00', '2025-08-15');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
