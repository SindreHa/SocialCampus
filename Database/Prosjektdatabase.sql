-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04. Feb, 2019 16:03 PM
-- Tjener-versjon: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `applikasjon`
--

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `bruker`
--

CREATE TABLE `bruker` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `made` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email` varchar(245) NOT NULL,
  `picture` blob NOT NULL,
  `is_moderator` tinyint(1) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bruker_status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `bruker_status`
--

CREATE TABLE `bruker_status` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `grupper`
--

CREATE TABLE `grupper` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `grupper_har_brukere`
--

CREATE TABLE `grupper_har_brukere` (
  `grupper_id` int(11) NOT NULL,
  `bruker_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `maker` int(11) NOT NULL,
  `made` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_id` int(11) NOT NULL,
  `bruker_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `made` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tråd_id` int(11) DEFAULT NULL,
  `bruker_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `stemmegivning`
--

CREATE TABLE `stemmegivning` (
  `post_id` int(11) NOT NULL,
  `tråd_id` int(11) NOT NULL,
  `content` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `tråd`
--

CREATE TABLE `tråd` (
  `id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `made` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bruker_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bruker`
--
ALTER TABLE `bruker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bruker_status_id` (`bruker_status_id`);

--
-- Indexes for table `bruker_status`
--
ALTER TABLE `bruker_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grupper`
--
ALTER TABLE `grupper`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_grupper_kategori1_idx` (`kategori_id`);

--
-- Indexes for table `grupper_har_brukere`
--
ALTER TABLE `grupper_har_brukere`
  ADD PRIMARY KEY (`grupper_id`,`bruker_id`),
  ADD KEY `fk_grupper_has_bruker_bruker1_idx` (`bruker_id`),
  ADD KEY `fk_grupper_has_bruker_grupper1_idx` (`grupper_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skaper_idx` (`skaper`),
  ADD KEY `fk_kategori_status1_idx` (`status_id`),
  ADD KEY `fk_kategori_bruker_status1_idx` (`bruker_status_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tråd_id` (`tråd_id`),
  ADD KEY `bruker_id` (`bruker_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stemmegivning`
--
ALTER TABLE `stemmegivning`
  ADD PRIMARY KEY (`post_id`,`tråd_id`),
  ADD KEY `fk_post_has_tråd_tråd1_idx` (`tråd_id`),
  ADD KEY `fk_post_has_tråd_post1_idx` (`post_id`);

--
-- Indexes for table `tråd`
--
ALTER TABLE `tråd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bruker_id` (`bruker_id`),
  ADD KEY `status_id` (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bruker`
--
ALTER TABLE `bruker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bruker_status`
--
ALTER TABLE `bruker_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tråd`
--
ALTER TABLE `tråd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Begrensninger for dumpede tabeller
--

--
-- Begrensninger for tabell `bruker`
--
ALTER TABLE `bruker`
  ADD CONSTRAINT `bruker_ibfk_1` FOREIGN KEY (`bruker_status_id`) REFERENCES `bruker_status` (`id`);

--
-- Begrensninger for tabell `grupper`
--
ALTER TABLE `grupper`
  ADD CONSTRAINT `fk_grupper_kategori1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Begrensninger for tabell `grupper_har_brukere`
--
ALTER TABLE `grupper_har_brukere`
  ADD CONSTRAINT `fk_grupper_has_bruker_bruker1` FOREIGN KEY (`bruker_id`) REFERENCES `bruker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_grupper_has_bruker_grupper1` FOREIGN KEY (`grupper_id`) REFERENCES `grupper` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Begrensninger for tabell `kategori`
--
ALTER TABLE `kategori`
  ADD CONSTRAINT `fk_kategori_bruker_status1` FOREIGN KEY (`bruker_status_id`) REFERENCES `bruker_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_kategori_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `skaper` FOREIGN KEY (`skaper`) REFERENCES `kategori` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Begrensninger for tabell `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`tråd_id`) REFERENCES `tråd` (`id`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`bruker_id`) REFERENCES `bruker` (`id`),
  ADD CONSTRAINT `post_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Begrensninger for tabell `stemmegivning`
--
ALTER TABLE `stemmegivning`
  ADD CONSTRAINT `fk_post_has_tråd_post1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_post_has_tråd_tråd1` FOREIGN KEY (`tråd_id`) REFERENCES `tråd` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Begrensninger for tabell `tråd`
--
ALTER TABLE `tråd`
  ADD CONSTRAINT `tråd_ibfk_1` FOREIGN KEY (`bruker_id`) REFERENCES `bruker` (`id`),
  ADD CONSTRAINT `tråd_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
