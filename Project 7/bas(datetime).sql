-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2022 at 12:42 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bas`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikelen`
--

CREATE TABLE `artikelen` (
  `ArtId` int(11) NOT NULL,
  `ArtOmschrijving` varchar(45) NOT NULL,
  `ArtInkoop` decimal(5,0) DEFAULT NULL,
  `ArtVerkoop` decimal(5,0) DEFAULT NULL,
  `ArtVoorraad` int(11) NOT NULL,
  `ArtMinVoorraad` int(11) NOT NULL,
  `ArtLocatie` int(11) DEFAULT NULL,
  `LevId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikelen`
--

INSERT INTO `artikelen` (`ArtId`, `ArtOmschrijving`, `ArtInkoop`, `ArtVerkoop`, `ArtVoorraad`, `ArtMinVoorraad`, `ArtLocatie`, `LevId`) VALUES
(2, 'test2', '0', '0', 5000, 2, 1234, 1);

-- --------------------------------------------------------

--
-- Table structure for table `inkooporders`
--

CREATE TABLE `inkooporders` (
  `InkOrdId` int(11) NOT NULL,
  `ArtId` int(11) NOT NULL,
  `LevId` int(11) NOT NULL,
  `InkOrdDatum` datetime DEFAULT current_timestamp(),
  `InkOrdBestAantal` int(11) NOT NULL,
  `InkOrdStatus` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inkooporders`
--

INSERT INTO `inkooporders` (`InkOrdId`, `ArtId`, `LevId`, `InkOrdDatum`, `InkOrdBestAantal`, `InkOrdStatus`) VALUES
(1, 1, 1, '2022-01-26 00:00:00', 5, 0),
(2, 1, 1, '2022-01-26 00:00:00', 5, 0),
(3, 1, 1, '2022-01-26 00:00:00', 1, 0),
(15, 1, 1, '2022-01-26 12:39:39', 321, 1),
(16, 1, 1, '2022-01-26 12:40:31', 123, 1),
(17, 1, 1, '2022-01-26 12:40:53', 123, 1),
(18, 2, 1, '2022-01-26 12:41:40', 999, 1);

-- --------------------------------------------------------

--
-- Table structure for table `klanten`
--

CREATE TABLE `klanten` (
  `KlantId` int(11) NOT NULL,
  `KlantNaam` varchar(45) DEFAULT NULL,
  `KlantEmail` varchar(45) NOT NULL,
  `KlantAdres` varchar(45) NOT NULL,
  `KlantPostcode` varchar(6) DEFAULT NULL,
  `KlantWoonplaats` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `klanten`
--

INSERT INTO `klanten` (`KlantId`, `KlantNaam`, `KlantEmail`, `KlantAdres`, `KlantPostcode`, `KlantWoonplaats`) VALUES
(2, 'TEST1', 'test1@gmail.com', 'Fata', '21', 'Rotterdam');

-- --------------------------------------------------------

--
-- Table structure for table `leveranciers`
--

CREATE TABLE `leveranciers` (
  `LevId` int(11) NOT NULL,
  `LevNaam` varchar(45) DEFAULT NULL,
  `LevEmail` varchar(45) NOT NULL,
  `LevAdres` varchar(45) NOT NULL,
  `LevPostcode` varchar(6) DEFAULT NULL,
  `LevWoonplaats` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leveranciers`
--

INSERT INTO `leveranciers` (`LevId`, `LevNaam`, `LevEmail`, `LevAdres`, `LevPostcode`, `LevWoonplaats`) VALUES
(1, 'Test', 'test@gmail.com', 'Coffie', '1234', 'Rotterdam');

-- --------------------------------------------------------

--
-- Table structure for table `verkooporders`
--

CREATE TABLE `verkooporders` (
  `VerkoopOrdId` int(11) NOT NULL,
  `KlantId` int(11) NOT NULL,
  `Artikelen_ArtId` int(11) NOT NULL,
  `verkOrdDatum` datetime DEFAULT NULL,
  `verkOrdBest` int(11) DEFAULT NULL,
  `verkOrdStatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verkooporders`
--

INSERT INTO `verkooporders` (`VerkoopOrdId`, `KlantId`, `Artikelen_ArtId`, `verkOrdDatum`, `verkOrdBest`, `verkOrdStatus`) VALUES
(4, 2, 2, '2022-01-25 22:55:00', 100, 1),
(5, 2, 2, '2022-01-26 11:32:00', 1, 3),
(6, 2, 1, '2022-01-26 12:14:00', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikelen`
--
ALTER TABLE `artikelen`
  ADD PRIMARY KEY (`ArtId`),
  ADD UNIQUE KEY `ArtId_UNIQUE` (`ArtId`),
  ADD KEY `fk_Artikelen_leveranciers1_idx` (`LevId`);

--
-- Indexes for table `inkooporders`
--
ALTER TABLE `inkooporders`
  ADD PRIMARY KEY (`InkOrdId`,`ArtId`,`LevId`),
  ADD KEY `fk_Artikelen_has_leveranciers_leveranciers1_idx` (`LevId`),
  ADD KEY `fk_Artikelen_has_leveranciers_Artikelen1_idx` (`ArtId`);

--
-- Indexes for table `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`KlantId`),
  ADD UNIQUE KEY `KlantenId_UNIQUE` (`KlantId`);

--
-- Indexes for table `leveranciers`
--
ALTER TABLE `leveranciers`
  ADD PRIMARY KEY (`LevId`),
  ADD UNIQUE KEY `KlantenId_UNIQUE` (`LevId`);

--
-- Indexes for table `verkooporders`
--
ALTER TABLE `verkooporders`
  ADD PRIMARY KEY (`VerkoopOrdId`,`KlantId`,`Artikelen_ArtId`),
  ADD KEY `fk_klanten_has_Artikelen_Artikelen1_idx` (`Artikelen_ArtId`),
  ADD KEY `fk_klanten_has_Artikelen_klanten1_idx` (`KlantId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikelen`
--
ALTER TABLE `artikelen`
  MODIFY `ArtId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inkooporders`
--
ALTER TABLE `inkooporders`
  MODIFY `InkOrdId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `klanten`
--
ALTER TABLE `klanten`
  MODIFY `KlantId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `verkooporders`
--
ALTER TABLE `verkooporders`
  MODIFY `VerkoopOrdId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikelen`
--
ALTER TABLE `artikelen`
  ADD CONSTRAINT `fk_Artikelen_leveranciers1` FOREIGN KEY (`LevId`) REFERENCES `leveranciers` (`LevId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `inkooporders`
--
ALTER TABLE `inkooporders`
  ADD CONSTRAINT `fk_Artikelen_has_leveranciers_Artikelen1` FOREIGN KEY (`ArtId`) REFERENCES `artikelen` (`ArtId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Artikelen_has_leveranciers_leveranciers1` FOREIGN KEY (`LevId`) REFERENCES `leveranciers` (`LevId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `verkooporders`
--
ALTER TABLE `verkooporders`
  ADD CONSTRAINT `fk_klanten_has_Artikelen_Artikelen1` FOREIGN KEY (`Artikelen_ArtId`) REFERENCES `artikelen` (`ArtId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_klanten_has_Artikelen_klanten1` FOREIGN KEY (`KlantId`) REFERENCES `klanten` (`KlantId`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
