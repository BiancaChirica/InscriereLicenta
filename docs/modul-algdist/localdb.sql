-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:55468
-- Generation Time: Apr 22, 2019 at 04:16 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `localdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admini`
--

CREATE TABLE `admini` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `parola` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comisii`
--

CREATE TABLE `comisii` (
  `id` int(10) UNSIGNED NOT NULL,
  `nume_sala` varchar(32) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orar`
--

CREATE TABLE `orar` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_comisie` int(10) UNSIGNED DEFAULT NULL,
  `id_prof` int(10) UNSIGNED DEFAULT NULL,
  `id_student` int(10) UNSIGNED DEFAULT NULL,
  `ora` time NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profesori`
--

CREATE TABLE `profesori` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_comisie` int(10) UNSIGNED DEFAULT NULL,
  `nume` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `prenume` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `grad_didactic` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `rol` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `parola` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `studenti`
--

CREATE TABLE `studenti` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_comisie` int(10) UNSIGNED DEFAULT NULL,
  `id_prof` int(10) UNSIGNED DEFAULT NULL,
  `nr_matricol` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `nume` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `prenume` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `data_nastere` date NOT NULL,
  `repository` text COLLATE latin1_general_ci NOT NULL,
  `email` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `parola` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admini`
--
ALTER TABLE `admini`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `comisii`
--
ALTER TABLE `comisii`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orar`
--
ALTER TABLE `orar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_comisie` (`id_comisie`),
  ADD KEY `id_prof` (`id_prof`),
  ADD KEY `id_student` (`id_student`);

--
-- Indexes for table `profesori`
--
ALTER TABLE `profesori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_comisie` (`id_comisie`);

--
-- Indexes for table `studenti`
--
ALTER TABLE `studenti`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nr_matricol` (`nr_matricol`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_comisie` (`id_comisie`),
  ADD KEY `id_prof` (`id_prof`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admini`
--
ALTER TABLE `admini`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comisii`
--
ALTER TABLE `comisii`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orar`
--
ALTER TABLE `orar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profesori`
--
ALTER TABLE `profesori`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `studenti`
--
ALTER TABLE `studenti`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orar`
--
ALTER TABLE `orar`
  ADD CONSTRAINT `orar_ibfk_1` FOREIGN KEY (`id_comisie`) REFERENCES `comisii` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `orar_ibfk_2` FOREIGN KEY (`id_prof`) REFERENCES `profesori` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `orar_ibfk_3` FOREIGN KEY (`id_student`) REFERENCES `studenti` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `profesori`
--
ALTER TABLE `profesori`
  ADD CONSTRAINT `profesori_ibfk_1` FOREIGN KEY (`id_comisie`) REFERENCES `comisii` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `studenti`
--
ALTER TABLE `studenti`
  ADD CONSTRAINT `studenti_ibfk_1` FOREIGN KEY (`id_comisie`) REFERENCES `comisii` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `studenti_ibfk_2` FOREIGN KEY (`id_prof`) REFERENCES `profesori` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
