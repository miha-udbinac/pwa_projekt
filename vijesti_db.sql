-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2026 at 03:43 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vijesti_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `korisnicko_ime` varchar(50) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `razina` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'mihael', '$2y$10$pEkA08r9lrEsTaR5Yl48eukJgggALmlx1uV2bMkAcbIiPwm/HL6ve', 0),
(2, 'ivan', '$2y$10$Of41KvKlaJ2gIkc2mWkQQOnJV9lBtXkT.NaVN4eVvGlhboANNhCdq', 0),
(3, 'projekt', '$2y$10$0eXiNZlPFrnIhj1bMbHDlOPfl4pk3d2Ht9ZmZwo.vDk4FwK7hdhvG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(20) DEFAULT NULL,
  `naslov` varchar(255) DEFAULT NULL,
  `sazetak` text DEFAULT NULL,
  `tekst` text DEFAULT NULL,
  `slika` varchar(255) DEFAULT NULL,
  `kategorija` varchar(50) DEFAULT NULL,
  `arhiva` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(17, '21.06.2026', 'test', 'test', 'test', 'slika1.jpg', 'politique', 0),
(18, '21.06.2026', 'test', 'test', 'test', 'slika1.jpg', 'politique', 0),
(19, '21.06.2026', 'test', 'test', 'test', 'slika1.jpg', 'politique', 0),
(20, '21.06.2026', 'test', 'test', 'test', 'slika1.jpg', 'politique', 0),
(21, '21.06.2026', 'test_sport', 'test', 'test', 'slika2.jpg', 'sport', 0),
(22, '21.06.2026', 'test_sport', 'test', 'test', 'slika2.jpg', 'sport', 0),
(23, '21.06.2026', 'test_sport', 'test', 'test', 'slika2.jpg', 'sport', 0),
(24, '21.06.2026', 'test_sport', 'test', 'test', 'slika2.jpg', 'sport', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
