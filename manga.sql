-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2022 at 12:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manga`
--

-- --------------------------------------------------------

--
-- Table structure for table `manga`
--

CREATE TABLE `manga` (
  `manga_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `cover` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manga`
--

INSERT INTO `manga` (`manga_id`, `title`, `cover`, `description`) VALUES
(1, 'Kaguya', 'sampleImg\\kaguya-cover.jpg', 'blasdbalskdaslfkafhlkdsaflkasdlkfjlsdflksjadflkjasdlfjalksdfjaklsdjflkafd'),
(2, 'Oshi No Ko', 'sampleImg\\oshinoko-cover.jpg', 'ahdlkfjhadkhgklsdhkajhdfkghadsfkgjhkadsjhflaskdhfkajdhfkalhdfkdh dkjhaksldhfklshd kdjashfklasdhfkla');

-- --------------------------------------------------------

--
-- Table structure for table `manga_chapter`
--

CREATE TABLE `manga_chapter` (
  `chap_id` int(11) NOT NULL,
  `chap_no` int(11) NOT NULL,
  `manga_id` int(11) NOT NULL,
  `chapter_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manga_chapter`
--

INSERT INTO `manga_chapter` (`chap_id`, `chap_no`, `manga_id`, `chapter_title`) VALUES
(1, 1, 2, 'Introduction'),
(2, 2, 2, 'death of a time'),
(3, 3, 2, 'where are you'),
(4, 1, 1, 'Start of a war');

-- --------------------------------------------------------

--
-- Table structure for table `manga_chapter_pages`
--

CREATE TABLE `manga_chapter_pages` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `file_dir` varchar(200) NOT NULL,
  `MCLink` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manga_chapter_pages`
--

INSERT INTO `manga_chapter_pages` (`id`, `name`, `file_dir`, `MCLink`) VALUES
(1, 'OshiNoKo001-01', 'OshiNoKo001-01.png', 1),
(2, 'OshiNoKo001-02', 'OshiNoKo001-02.png', 1),
(3, 'OshiNoKo001-03', 'OshiNoKo001-03.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manga`
--
ALTER TABLE `manga`
  ADD PRIMARY KEY (`manga_id`);

--
-- Indexes for table `manga_chapter`
--
ALTER TABLE `manga_chapter`
  ADD PRIMARY KEY (`chap_id`),
  ADD KEY `manga_FK` (`manga_id`);

--
-- Indexes for table `manga_chapter_pages`
--
ALTER TABLE `manga_chapter_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chapter_FK` (`MCLink`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manga`
--
ALTER TABLE `manga`
  MODIFY `manga_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manga_chapter`
--
ALTER TABLE `manga_chapter`
  MODIFY `chap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `manga_chapter_pages`
--
ALTER TABLE `manga_chapter_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `manga_chapter`
--
ALTER TABLE `manga_chapter`
  ADD CONSTRAINT `manga_FK` FOREIGN KEY (`manga_id`) REFERENCES `manga` (`manga_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `manga_chapter_pages`
--
ALTER TABLE `manga_chapter_pages`
  ADD CONSTRAINT `chapter_FK` FOREIGN KEY (`MCLink`) REFERENCES `manga_chapter` (`chap_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
