SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE `utilisateur` (
                           `identifiant` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                           `discr` ENUM('simple', 'contributeur', 'admin') NOT NULL,
                           `nom_complet` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                           `mdp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                           `contributions` int NULL,
                           `niveau_acces` int NULL,
                           PRIMARY KEY (`identifiant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;