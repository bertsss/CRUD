-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2017 at 01:48 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `practice`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
`id` int(250) NOT NULL,
  `user` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `avatar_path` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `user`, `pass`, `avatar_path`) VALUES
(22, 'aaa', 'aaa', 'images/10.jpg'),
(23, 'bqr', 'bcd', ''),
(24, 'ccc', 'ccc', 'images/2.jpg'),
(25, 'ddd', 'ddd', 'images/x.jpg'),
(27, 'jajabbbjaja', '123', ''),
(28, 'zzz', 'zzz', ''),
(29, 'yyy', 'yyy', ''),
(30, 'iii', 'iii', ''),
(31, 'ooo', 'ooo', ''),
(32, 'jjj', 'jjj', ''),
(33, 'br', 'brasd', ''),
(34, 'asdadb', 'basdadad', ''),
(35, 'asdbasdqwe', 'qweb', ''),
(36, 'ertetbdgf', 'asd', ''),
(38, 'tyubdfgabs', 'uuu', ''),
(39, 'bbbtqw', 'aaa', ''),
(40, 'uuu', 'uuu', 'images/31.jpg'),
(41, 'vzvz', 'vzvz', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
MODIFY `id` int(250) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
