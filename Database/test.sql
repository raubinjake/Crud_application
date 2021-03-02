-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 02, 2021 at 03:42 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `created_date` date DEFAULT NULL,
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `created_date` (`created_date`),
  KEY `created_date_2` (`created_date`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`created_date`, `id`, `name`, `email`, `password`, `image_path`) VALUES
('2021-01-04', 2, 'Golu Bajaj', 'golubajaj@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'http://localhost/codeigi/upload/bdmdashbrd.png'),
('2021-01-06', 6, 'Abhinaw Gerewal', 'Abhinaw@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'http://localhost/codeigi/upload/bdmedit.png'),
('2021-01-06', 5, 'Sagar kumar mishra', 'sagar@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'http://localhost/codeigi/upload/bdmview6.png'),
('2021-01-06', 7, 'Arvind Yadav', 'arvind@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'http://localhost/codeigi/upload/ccv2.png'),
('2021-02-23', 8, 'Ratnesh Golu Brand', 'rt@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'http://localhost/codeigi/upload/p4.jpg'),
('2021-02-23', 9, 'Ratnesh Golu Brand group', 'rtn@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'http://localhost/codeigi/upload/bdmview6.png'),
('2021-02-23', 10, 'Ratnesh Golu Brand', 'Abhinaw@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'http://localhost/codeigi/upload/p4.jpg'),
('2021-02-23', 11, 'Ratnesh Golu Brand', 'Abhinaw@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'http://localhost/codeigi/upload/pexels-pixabay-270348.jpg'),
('2021-02-23', 12, 'Ratnesh Golu Brand', 'rtn@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'http://localhost/codeigi/upload/csk1'),
('2021-02-24', 13, 'Ratnesh Golu Brand group bajaj', 'rtnnesh@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'http://localhost/codeigi/upload/bdmview4'),
('2021-03-01', 16, 'Mohan Lal Chaturwedi', 'mohanlal@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'http://localhost/codeigi/upload/pexels-pixabay-270348.jpg'),
('2021-03-02', 17, 'Lala Lajpat Rai ', 'lajpat@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'http://localhost/codeigi/upload/upcv3.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
