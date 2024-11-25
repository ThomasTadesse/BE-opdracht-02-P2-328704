-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 25, 2024 at 10:46 AM
-- Server version: 9.0.1
-- PHP Version: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magazijn-jamin`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `spCreateProduct`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spCreateProduct` (IN `Naam` VARCHAR(255), IN `Barcode` VARCHAR(13), IN `IsActief` BIT(1), IN `Opmerking` VARCHAR(255), IN `DatumAangemaakt` DATETIME(6), IN `DatumGewijzigd` DATETIME(6))   BEGIN

    INSERT INTO Product (
        Naam,
        Barcode,
        IsActief,
        Opmerking,
        DatumAangemaakt,
        DatumGewijzigd
    ) VALUES (
        Naam,
        Barcode,
        IsActief,
        Opmerking,
        DatumAangemaakt,
        DatumGewijzigd
    );

END$$

DROP PROCEDURE IF EXISTS `spDeleteProductById`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spDeleteProductById` (IN `Id` INT UNSIGNED)   BEGIN
    DELETE  
    FROM    Product AS PROD
    WHERE   PROD.Id = Id;
END$$

DROP PROCEDURE IF EXISTS `spGetAllProducts`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetAllProducts` ()   BEGIN
    SELECT  PROD.Id         AS ProductId,
            PROD.Naam,
            PROD.Barcode,
            PROD.IsActief,
            PROD.Opmerking,
            PROD.DatumAangemaakt,
            PROD.DatumGewijzigd
    FROM    Product AS PROD
    ORDER BY PROD.Id DESC;
END$$

DROP PROCEDURE IF EXISTS `spSelectProductById`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spSelectProductById` (IN `Id` INT UNSIGNED)   BEGIN

    SELECT  PROD.Id,
            PROD.Naam,
            PROD.Barcode,
            PROD.IsActief,
            PROD.Opmerking,
            PROD.DatumAangemaakt,
            PROD.DatumGewijzigd
    FROM    Product AS PROD
    WHERE   PROD.Id = Id;

END$$

DROP PROCEDURE IF EXISTS `spUpdateProductById`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateProductById` (IN `Id` INT UNSIGNED, IN `Naam` VARCHAR(255), IN `Barcode` VARCHAR(255), IN `IsActief` BIT(1), IN `Opmerking` VARCHAR(255), IN `DatumAangemaakt` DATETIME(6), IN `DatumGewijzigd` DATETIME(6))   BEGIN
    UPDATE  Product AS  PROD
    SET     PROD.Naam = Naam,
            PROD.Barcode = Barcode,
            PROD.IsActief = IsActief,
            PROD.Opmerking = Opmerking,
            PROD.DatumAangemaakt = DatumAangemaakt,
            PROD.DatumGewijzigd = DatumGewijzigd
    WHERE   PROD.Id = Id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `allergeen`
--

DROP TABLE IF EXISTS `allergeen`;
CREATE TABLE IF NOT EXISTS `allergeen` (
  `AllergeenId` int NOT NULL AUTO_INCREMENT,
  `AllergeenNaam` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Omschrijving` varchar(255) NOT NULL,
  `IsActief` bit(1) DEFAULT b'1',
  `Opmerking` varchar(255) DEFAULT NULL,
  `DatumAangemaakt` datetime DEFAULT CURRENT_TIMESTAMP,
  `DatumGewijzigd` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`AllergeenId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `allergeen`
--

INSERT INTO `allergeen` (`AllergeenId`, `AllergeenNaam`, `Omschrijving`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 'Gluten', 'Dit product bevat gluten', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(2, 'Gelatine', 'Dit product bevat gelatine', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(3, 'AZO-Kleurstof', 'Dit product bevat AZO-kleurstoffen', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(4, 'Lactose', 'Dit product bevat lactose', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(5, 'Soja', 'Dit product bevat soja', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `leverancier`
--

DROP TABLE IF EXISTS `leverancier`;
CREATE TABLE IF NOT EXISTS `leverancier` (
  `LeverancierId` int NOT NULL AUTO_INCREMENT,
  `LeverancierNaam` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ContactPersoon` varchar(255) DEFAULT NULL,
  `LeverancierNummer` varchar(50) DEFAULT NULL,
  `Mobiel` varchar(12) NOT NULL,
  `IsActief` bit(1) DEFAULT b'1',
  `Opmerking` varchar(255) DEFAULT NULL,
  `DatumAangemaakt` datetime DEFAULT CURRENT_TIMESTAMP,
  `DatumGewijzigd` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`LeverancierId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `leverancier`
--

INSERT INTO `leverancier` (`LeverancierId`, `LeverancierNaam`, `ContactPersoon`, `LeverancierNummer`, `Mobiel`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 'Venco', 'Bert van Linge', 'L1029384719', '', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(2, 'Astra Sweets', 'Jasper del Monte', 'L1029284315', '', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(3, 'Haribo', 'Sven Stalman', 'L1029324748', '', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(4, 'Basset', 'Joyce Stelterberg', 'L1023845773', '', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(5, 'De Bron', 'Remco Veenstra', 'L1023857736', '', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `magazijn`
--

DROP TABLE IF EXISTS `magazijn`;
CREATE TABLE IF NOT EXISTS `magazijn` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `ProductId` int DEFAULT NULL,
  `VerpakkingsEenheid` decimal(5,2) DEFAULT NULL,
  `AantalAanwezig` int DEFAULT NULL,
  `IsActief` bit(1) DEFAULT b'1',
  `Opmerking` varchar(255) DEFAULT NULL,
  `DatumAangemaakt` datetime DEFAULT CURRENT_TIMESTAMP,
  `DatumGewijzigd` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `ProductId` (`ProductId`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `magazijn`
--

INSERT INTO `magazijn` (`Id`, `ProductId`, `VerpakkingsEenheid`, `AantalAanwezig`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 1, '5.00', 453, b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(2, 2, '2.50', 400, b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(3, 3, '5.00', 1, b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(4, 4, '1.00', 800, b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(5, 5, '3.00', 234, b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(6, 6, '2.00', 345, b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(7, 7, '1.00', 795, b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(8, 8, '10.00', 233, b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(9, 9, '2.50', 123, b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(10, 10, '3.00', NULL, b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(11, 11, '2.00', 367, b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(12, 12, '1.00', 467, b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(13, 13, '5.00', 20, b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `ProductId` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `ProductNaam` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Barcode` varchar(13) NOT NULL,
  `IsActief` bit(1) DEFAULT b'1',
  `Opmerking` varchar(255) DEFAULT NULL,
  `DatumAangemaakt` datetime DEFAULT CURRENT_TIMESTAMP,
  `DatumGewijzigd` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ProductId`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductId`, `ProductNaam`, `Barcode`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 'Mintnopjes', '8719587231278', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(2, 'Schoolkrijt', '8719587326713', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(3, 'Honingdrop', '8719587327836', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(4, 'Zure Beren', '8719587321441', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(5, 'Cola Flesjes', '8719587321237', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(6, 'Turtles', '8719587322245', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(7, 'Witte Muizen', '8719587328256', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(8, 'Reuzen Slangen', '8719587325641', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(9, 'Zoute Rijen', '8719587322739', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(10, 'Winegums', '8719587327527', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(11, 'Drop Munten', '8719587322345', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(12, 'Kruis Drop', '8719587322265', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(13, 'Zoute Ruitjes', '8719587323256', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `productperleverancier`
--

DROP TABLE IF EXISTS `productperleverancier`;
CREATE TABLE IF NOT EXISTS `productperleverancier` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `LeverancierId` int DEFAULT NULL,
  `ProductId` int DEFAULT NULL,
  `DatumLevering` date DEFAULT NULL,
  `Aantal` int DEFAULT NULL,
  `DatumEerstVolgendeLevering` date DEFAULT NULL,
  `IsActief` bit(1) DEFAULT b'1',
  `Opmerking` varchar(255) DEFAULT NULL,
  `DatumAangemaakt` datetime DEFAULT CURRENT_TIMESTAMP,
  `DatumGewijzigd` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `LeverancierId` (`LeverancierId`),
  KEY `ProductId` (`ProductId`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `productperleverancier`
--

INSERT INTO `productperleverancier` (`Id`, `LeverancierId`, `ProductId`, `DatumLevering`, `Aantal`, `DatumEerstVolgendeLevering`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 1, 1, '2023-04-09', 23, '2023-04-16', b'1', NULL, '2024-11-25 11:45:51', '2024-11-25 11:45:51'),
(2, 1, 1, '2023-04-18', 21, '2023-04-25', b'1', NULL, '2024-11-25 11:45:51', '2024-11-25 11:45:51'),
(3, 1, 2, '2023-04-09', 12, '2023-04-16', b'1', NULL, '2024-11-25 11:45:51', '2024-11-25 11:45:51'),
(4, 1, 3, '2023-04-10', 11, '2023-04-17', b'1', NULL, '2024-11-25 11:45:51', '2024-11-25 11:45:51'),
(5, 2, 4, '2023-04-14', 16, '2023-04-21', b'1', NULL, '2024-11-25 11:45:51', '2024-11-25 11:45:51'),
(6, 2, 4, '2023-04-21', 23, '2023-04-28', b'1', NULL, '2024-11-25 11:45:51', '2024-11-25 11:45:51'),
(7, 2, 5, '2023-04-14', 45, '2023-04-21', b'1', NULL, '2024-11-25 11:45:51', '2024-11-25 11:45:51'),
(8, 2, 6, '2023-04-14', 30, '2023-04-21', b'1', NULL, '2024-11-25 11:45:51', '2024-11-25 11:45:51'),
(9, 3, 7, '2023-04-12', 12, '2023-04-19', b'1', NULL, '2024-11-25 11:45:51', '2024-11-25 11:45:51'),
(10, 3, 7, '2023-04-19', 23, '2023-04-26', b'1', NULL, '2024-11-25 11:45:51', '2024-11-25 11:45:51'),
(11, 3, 8, '2023-04-10', 12, '2023-04-17', b'1', NULL, '2024-11-25 11:45:51', '2024-11-25 11:45:51'),
(12, 3, 9, '2023-04-11', 1, '2023-04-18', b'1', NULL, '2024-11-25 11:45:51', '2024-11-25 11:45:51'),
(13, 4, 10, '2023-04-16', 24, '2023-04-30', b'1', NULL, '2024-11-25 11:45:51', '2024-11-25 11:45:51'),
(14, 5, 11, '2023-04-10', 47, '2023-04-17', b'1', NULL, '2024-11-25 11:45:51', '2024-11-25 11:45:51'),
(15, 5, 11, '2023-04-19', 60, '2023-04-26', b'1', NULL, '2024-11-25 11:45:51', '2024-11-25 11:45:51'),
(16, 5, 12, '2023-04-11', 45, NULL, b'1', NULL, '2024-11-25 11:45:51', '2024-11-25 11:45:51'),
(17, 5, 13, '2023-04-12', 23, NULL, b'1', NULL, '2024-11-25 11:45:51', '2024-11-25 11:45:51');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` int DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` text,
  `payload` text NOT NULL,
  `last_activity` int NOT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('J4VEUYmbWTAjVbp8uG3JvWVkRlKbFFrWaAdO4abs', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWnBYRGdoOTFUWVd6MFJCZnFNUFVwbk5ST2pTdEhsWkE2cGc5SGpIZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1731684208),
('aUgCfXGIlnWDzbj9DDt9ov7Cycg1YNwJCI0njvhI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN01CaGVZclNiNjU1UUp5eHhFUUNmSWZwdFY0ZXdOenZQZ0xxSEZyWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1732019859),
('LVbXdOjbTj6dgXxtHPMYbLxMRXE6ebxRKfQIJyeb', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiellnZDJIOE1ObjBRVHRCWkxadFZyY2VxSkthU2dTa2QwdzRwcDg3aSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1732530812);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
