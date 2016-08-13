-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2016 at 09:23 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `userregistration`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `testPost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `phone`, `role`, `created`, `modified`) VALUES
(5, 'ndumiso', '0b6904d24294f94b679d7f747cda56314647d0fe', 'xmbete@gmail.com', '731230109', 'admin', '2016-05-22 01:51:01', '2016-05-23 00:57:28'),
(6, 'andisiwe', 'abfbdedd0de24f59f95681c9ef7b12a8f2576601', 'anynoludwe@gmail.com', '0788650634', 'user', '2016-05-22 01:53:26', '2016-05-22 01:53:26'),
(7, 'ayabonga', '3a93328011d49c423c3eec6cf2920bdf7c6d0e34', 'ayabonga@gmail.com', '0731230109', 'admin', '2016-05-22 20:14:01', '2016-05-22 20:14:01'),
(8, 'siphelo', '3a93328011d49c423c3eec6cf2920bdf7c6d0e34', 'siphelo@gmail.com', '0731230109', 'admin', '2016-05-22 20:33:11', '2016-05-22 20:33:11'),
(9, 'asivikele', '3a93328011d49c423c3eec6cf2920bdf7c6d0e34', 'asivikele@gmail.com', '0731230109', 'admin', '2016-05-22 22:35:33', '2016-05-22 23:54:14'),
(10, 'asivile', '3a93328011d49c423c3eec6cf2920bdf7c6d0e34', 'anynolude@gmail.com', '731230109', 'admin', '2016-05-22 23:30:35', '2016-05-22 23:30:35'),
(11, 'asivikele', '3a93328011d49c423c3eec6cf2920bdf7c6d0e34', 'xmbete@gmail.com', '731230109', 'admin', '2016-05-22 23:57:12', '2016-05-22 23:57:12'),
(12, 'asivikele', '3a93328011d49c423c3eec6cf2920bdf7c6d0e34', 'xmbete@gmail.com', '731230109', 'admin', '2016-05-22 23:57:54', '2016-05-22 23:57:54'),
(14, 'siyabonga', '3a93328011d49c423c3eec6cf2920bdf7c6d0e34', 'xmbete@gmail.com', '731230109', 'admin', '2016-05-23 00:22:25', '2016-05-23 00:22:25'),
(15, 'avuyile', '3a93328011d49c423c3eec6cf2920bdf7c6d0e34', 'avuyile@gmail.com', '731230109', 'admin', '2016-05-23 01:11:41', '2016-05-23 01:20:43'),
(17, 'Mibonga', '5176eea36e14714104327a6801102c23c1528a47', 'xmbete@gmail.com', '731230109', 'admin', '2016-05-23 01:28:22', '2016-05-23 01:39:16'),
(18, 'ayabulela', '3a93328011d49c423c3eec6cf2920bdf7c6d0e34', 'xmbete@gmail.com', '731230109', 'admin', '2016-05-23 01:39:52', '2016-05-23 01:40:25'),
(20, 'instant', '83f7854d956ef2e1a95ca97643a9fd3b3543a345', 'xmbete@gmail.com', '731230109', 'admin', '2016-05-23 06:20:06', '2016-05-23 06:20:06'),
(21, 'Asie', '3a93328011d49c423c3eec6cf2920bdf7c6d0e34', 'xmbete@gmail.com', '731230109', 'admin', '2016-05-23 06:38:18', '2016-05-23 06:52:31'),
(22, 'inoerp1', '3a93328011d49c423c3eec6cf2920bdf7c6d0e34', 'xmbete@gmail.com', '731230109', 'admin', '2016-05-23 06:56:49', '2016-05-23 06:56:49'),
(23, 'inoerp', '7cae781d1854841e66a7382a19493fd00a5eebb3', 'xmbete@gmail.com', '731230109', 'admin', '2016-05-23 07:47:50', '2016-05-23 07:47:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
