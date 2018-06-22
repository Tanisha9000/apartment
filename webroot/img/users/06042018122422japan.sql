-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 31, 2018 at 08:20 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `japan`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `view_count` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`, `view_count`, `created`, `modified`) VALUES
(1, 'rrrr', 'hey', 5, '2018-05-23 09:19:27', '0000-00-00 00:00:00'),
(2, 'test2', 'hello', 5, '2018-05-23 09:11:14', '0000-00-00 00:00:00'),
(3, 'test3', 'hi', 6, '2018-05-23 09:11:17', '0000-00-00 00:00:00'),
(4, 'test3', 'hi', 7, '2018-05-29 07:55:25', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `article_id` int(11) DEFAULT NULL,
  `username` varchar(256) DEFAULT NULL,
  `first_name` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `article_id`, `username`, `first_name`, `password`, `created`, `modified`) VALUES
(1, NULL, 'ghgfhdfgfd', NULL, NULL, '2018-05-11 11:02:50', '0000-00-00 00:00:00'),
(2, 1, 'babita@avainfotech.com', 'babita', '$2y$10$cd8r90YUkQ4KLSnSjE4YjOlgrvwgI9UK1qGt8RL5H2Ftowk0u8OtS', '2018-05-23 07:17:33', '0000-00-00 00:00:00'),
(5, 2, 'simerjit@avainfotech.com', 'simerjit', '$2y$10$gGfX3P4/DlOWufjXC5OaZOOYyv7lBkkamAcC9r/qX2pXeOkTA0zPq', '2018-05-23 07:17:38', '0000-00-00 00:00:00'),
(6, 3, 'anirudh@avainfotech.com', 'anirudh', '$2y$10$kYG1FgYfRxNU6N8jC2ZZr.Y/1GDVBvvU50SJ3j/EglPInzefcBd.G', '2018-05-23 07:17:42', '0000-00-00 00:00:00'),
(7, 2, 'babita@avainfotech.com', 'test', '$2y$10$19ioaXWbfQ3M2D.045CE6.6PEV2f7A./A3X5m0ofBOTNKIWdLfP.W', '2018-05-23 08:42:21', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
