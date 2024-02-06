-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2024 at 09:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiendadiscos`
--

-- --------------------------------------------------------

--
-- Table structure for table `disco`
--

CREATE TABLE `disco` (
  `id_disco` int(11) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `autor` varchar(200) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `precio` float NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `visualizaciones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `disco`
--

INSERT INTO `disco` (`id_disco`, `imagen`, `titulo`, `autor`, `descripcion`, `precio`, `categoria`, `visualizaciones`) VALUES
(1, 'img/cdBurutik2.jpg', 'Zerua eta Zorua', 'Burutik', 'Hiru kanta bakardadeari', 8, 'rock', 3),
(2, 'img/cdBerri.jpg', 'Jaio Musika Hil', 'Berri Txarrak', 'Jaio Musika Hil diska ', 6, 'rock', 33),
(3, 'img/cdGanibet.jpg', 'Berriz esnatzean\n', 'Ganibet', 'Berriz esnatzean singlea', 3, 'alternativo', 11),
(4, 'img/cdDeserrite.jpg', 'Bihotz Herdoilduak\n', 'Deserrite', 'The Guilty Brigadeko Gartxotekin', 6, 'rock', 14),
(5, 'img/cdSkabi.jpg', 'Izaera', 'Skabidean', 'Blackbirdsekin lehen diska', 11, 'Ska-Rocksteady', 42),
(6, 'img/cdOlaia.jpg', 'Lehengo Lepotikan Burua', 'Olaia Inziarte', 'Lehen LPa', 13, 'Pop', 34),
(7, 'img/cdGoxuan.jpg', 'Errotari', 'Goxuan Salsa', 'Lehenengo diska', 15, 'Salsa', 68),
(8, 'img/cdIbilBedi.jpg', 'Beltxarga Beltza', 'Ibil Bedi', 'Taldearen hirugarren diska', 12, 'Indie', 46);

-- --------------------------------------------------------

--
-- Table structure for table `listafav`
--

CREATE TABLE `listafav` (
  `id_disco` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `listafav`
--

INSERT INTO `listafav` (`id_disco`, `id_user`) VALUES
(3, 2),
(4, 2),
(6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `contra` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_user`, `username`, `contra`, `email`) VALUES
(1, 'admin', 'admin', 'admin@admin.com'),
(2, 'irune', 'irune', 'irune@irune.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disco`
--
ALTER TABLE `disco`
  ADD PRIMARY KEY (`id_disco`),
  ADD KEY `id_disco` (`id_disco`);

--
-- Indexes for table `listafav`
--
ALTER TABLE `listafav`
  ADD PRIMARY KEY (`id_disco`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disco`
--
ALTER TABLE `disco`
  MODIFY `id_disco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `listafav`
--
ALTER TABLE `listafav`
  ADD CONSTRAINT `listafav_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `listafav_ibfk_2` FOREIGN KEY (`id_disco`) REFERENCES `disco` (`id_disco`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
