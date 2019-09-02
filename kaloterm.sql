-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2017 at 08:57 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kaloterm`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikli`
--

CREATE TABLE `artikli` (
  `id` int(11) NOT NULL,
  `ime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cena` double NOT NULL,
  `slika` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opis` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `artikli`
--

INSERT INTO `artikli` (`id`, `ime`, `cena`, `slika`, `alt`, `opis`) VALUES
(5, 'Lek', 350, './img/artikli/1508947345.jpg', 'Lek', 'Stvarno je lek mmm njam'),
(8, '', 0, './img/artikli/1508951512.jpg', '', ''),
(9, 'dfs', 123, './img/artikli/1509052804.jpg', 'dfs', 'asdasd'),
(10, 'asdasd', 123, './img/artikli/1509054824.jpg', 'asdasd', 'asddasdas'),
(11, 'asdasd', 123, './img/artikli/1509054888.jpg', 'asdasd', 'asddasdas');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `naslov` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slika` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tekst` text COLLATE utf8_unicode_ci NOT NULL,
  `datum` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `naslov`, `slika`, `alt`, `tekst`, `datum`) VALUES
(1, 'Test baze', './img/logo.png', 'opis alta', 'Ovo je neki tekst.\r\nSada je pritisnut enter.', '21.10.2017'),
(2, 'Naslov', './img/artikli/1508951115.jpg', 'Opis slike', 'Kad sam bio malo', '25.10.2017'),
(3, 'Ayyy', './img/blog/1508951205.jpg', 'lmaoo', 'ayyy', '25.10.2017'),
(4, '', './img/blog/1508951302.jpg', '', '', '25.10.2017'),
(5, '', './img/blog/1508951542.jpg', '', '', '25.10.2017'),
(6, '', './img/blog/1508951621.jpg', '', '', '25.10.2017'),
(7, 'Naziv bloga ovoga ', './img/blog/1509051677.jpg', 'nice place', 'ASDJASNKDLNASLKDNASJKDNASKJDNKJASNDJKASNDKJASNASDJASNKDLNASLKDNASJKDNASKJDNKJASNDJKASNDKJASNASDJASNKDLNASLKDNASJKDNASKJDNKJASNDJKASNDKJASNASDJASNKDLNASLKDNASJKDNASKJDNKJASNDJKASNDKJASNASDJASNKDLNASLKDNASJKDNASKJDNKJASNDJKASNDKJASN', '26.10.2017');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `naslov` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opis` text COLLATE utf8_unicode_ci NOT NULL,
  `slika` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `naslov`, `opis`, `slika`, `alt`) VALUES
(4, 'Slajd 1', 'Opis prvog slajda', './img/slider/1509009588.jpg', 'pug in arms'),
(5, 'Slajd 2', 'Opis drugog  slajda', './img/slider/1509009825.jpg', 'cat in arm'),
(6, 'Slajd 3', 'Opis treceg slajda', './img/slider/1509009872.jpg', 'girl and dog');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikli`
--
ALTER TABLE `artikli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikli`
--
ALTER TABLE `artikli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
