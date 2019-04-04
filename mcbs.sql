-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2019 at 09:06 PM
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
-- Database: `mcbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(25) NOT NULL,
  `b_type` varchar(10) NOT NULL,
  `seat_type` varchar(15) NOT NULL DEFAULT 'Chaircar',
  `b_no` char(9) NOT NULL,
  `path` char(1) NOT NULL,
  `r_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`b_id`, `b_name`, `b_type`, `seat_type`, `b_no`, `path`, `r_no`) VALUES
(1, 'VOLVO', 'AC', 'Chaircar', 'KA24A2365', 'D', 1),
(2, 'TATA', 'Non-AC', 'Chaircar', 'KA20C1276', 'D', 1),
(3, 'VOLVO', 'AC', 'Chaircar', 'KA23B4753', 'D', 2),
(4, 'TATA', 'Non-AC', 'Chaircar', 'KA04E1827', 'D', 2),
(5, 'VOLVO', 'AC', 'Chaircar', 'KA23B6975', 'D', 3),
(6, 'TATA', 'Non-AC', 'Chaircar', 'KA04F0908', 'D', 3),
(7, 'VOLVO', 'AC', 'Chaircar', 'KA24A2365', 'U', 1),
(8, 'TATA', 'Non-AC', 'Chaircar', 'KA20C1276', 'U', 1),
(9, 'VOLVO', 'AC', 'Chaircar', 'KA23B4753', 'U', 2),
(10, 'TATA', 'Non-AC', 'Chaircar', 'KA04E1827', 'U', 2),
(11, 'VOLVO', 'AC', 'Chaircar', 'KA23B6975', 'U', 3),
(12, 'TATA', 'Non-AC', 'Chaircar', 'KA04F0908', 'U', 3);

-- --------------------------------------------------------

--
-- Table structure for table `bus_route`
--

CREATE TABLE `bus_route` (
  `b_id` int(11) NOT NULL,
  `r_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_route`
--

INSERT INTO `bus_route` (`b_id`, `r_no`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 2),
(5, 3),
(6, 3),
(1, 4),
(2, 4),
(3, 5),
(4, 5),
(5, 6),
(6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `connection`
--

CREATE TABLE `connection` (
  `r_no` int(11) NOT NULL,
  `connected_to` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `connection`
--

INSERT INTO `connection` (`r_no`, `connected_to`) VALUES
(1, 2),
(2, 3),
(2, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `r_no` int(11) NOT NULL,
  `source` varchar(25) NOT NULL,
  `destination` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`r_no`, `source`, `destination`) VALUES
(1, 'Kengeri', 'Vidhan Soudha'),
(2, 'Banashankari', 'Yeshwantpur'),
(3, 'Majestic', 'Marathalli');

-- --------------------------------------------------------

--
-- Table structure for table `stops`
--

CREATE TABLE `stops` (
  `stop_id` int(11) NOT NULL,
  `r_no` int(11) NOT NULL,
  `s_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stops`
--

INSERT INTO `stops` (`stop_id`, `r_no`, `s_name`) VALUES
(1, 1, 'Kengeri'),
(2, 1, 'RV College'),
(3, 1, 'RR Gate'),
(4, 1, 'Nayandahalli Metro'),
(5, 1, 'Magadi Road'),
(6, 1, 'Majestic'),
(7, 1, 'Vidhan Soudha'),
(8, 2, 'Banashankari'),
(9, 2, 'Jaynagar'),
(10, 2, 'South End Circle'),
(11, 2, 'Chickpete'),
(12, 2, 'Majestic'),
(13, 2, 'Sandal Soap Factory'),
(14, 2, 'Yeshwantpur'),
(15, 3, 'Majestic'),
(16, 3, 'Cubbon Park'),
(17, 3, 'MG Road'),
(18, 3, 'Trinity'),
(19, 3, 'Indiranagar'),
(20, 3, 'Bayappanhalli'),
(21, 3, 'KR Puram'),
(22, 3, 'Marathalli');

-- --------------------------------------------------------

--
-- Table structure for table `timing`
--

CREATE TABLE `timing` (
  `b_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timing`
--

INSERT INTO `timing` (`b_id`, `s_id`, `time`) VALUES
(1, 1, '08:00:00'),
(1, 2, '08:05:00'),
(1, 3, '08:15:00'),
(1, 4, '08:30:00'),
(1, 5, '08:50:00'),
(1, 6, '09:10:00'),
(2, 1, '14:00:00'),
(2, 2, '14:05:00'),
(2, 3, '14:15:00'),
(2, 4, '14:30:00'),
(2, 5, '14:50:00'),
(2, 6, '15:10:00'),
(1, 7, '09:30:00'),
(2, 7, '15:30:00'),
(3, 8, '10:00:00'),
(3, 9, '10:20:00'),
(3, 10, '10:30:00'),
(3, 11, '10:50:00'),
(3, 12, '11:00:00'),
(3, 13, '11:25:00'),
(3, 14, '11:40:00'),
(4, 8, '15:00:00'),
(4, 9, '15:20:00'),
(4, 10, '15:30:00'),
(4, 11, '15:50:00'),
(4, 12, '16:00:00'),
(4, 13, '16:25:00'),
(4, 14, '16:40:00'),
(5, 15, '12:00:00'),
(5, 16, '12:15:00'),
(5, 17, '12:30:00'),
(5, 18, '12:40:00'),
(5, 19, '13:05:00'),
(5, 20, '13:35:00'),
(5, 21, '14:00:00'),
(5, 22, '14:20:00'),
(6, 15, '15:00:00'),
(6, 16, '15:15:00'),
(6, 17, '15:30:00'),
(6, 18, '15:40:00'),
(6, 19, '16:05:00'),
(6, 20, '16:35:00'),
(6, 21, '17:00:00'),
(6, 22, '17:20:00'),
(7, 7, '16:00:00'),
(7, 6, '16:20:00'),
(7, 5, '16:40:00'),
(7, 4, '17:00:00'),
(7, 3, '17:15:00'),
(7, 2, '17:25:00'),
(7, 1, '17:30:00'),
(8, 7, '17:00:00'),
(8, 6, '17:20:00'),
(8, 5, '17:40:00'),
(8, 4, '18:00:00'),
(8, 3, '18:15:00'),
(8, 2, '18:25:00'),
(8, 1, '18:30:00'),
(9, 14, '14:00:00'),
(9, 13, '14:15:00'),
(9, 12, '14:40:00'),
(9, 11, '14:50:00'),
(9, 10, '15:10:00'),
(9, 9, '15:20:00'),
(9, 8, '15:40:00'),
(10, 14, '18:00:00'),
(10, 13, '18:15:00'),
(10, 12, '18:40:00'),
(10, 11, '18:50:00'),
(10, 10, '19:10:00'),
(10, 9, '19:20:00'),
(10, 8, '19:40:00'),
(11, 22, '16:00:00'),
(11, 21, '16:20:00'),
(11, 20, '16:45:00'),
(11, 19, '17:15:00'),
(11, 18, '17:40:00'),
(11, 17, '17:50:00'),
(11, 16, '18:05:00'),
(11, 15, '18:20:00'),
(12, 22, '19:00:00'),
(12, 21, '19:20:00'),
(12, 20, '19:45:00'),
(12, 19, '20:15:00'),
(12, 18, '20:40:00'),
(12, 17, '20:50:00'),
(12, 16, '21:05:00'),
(12, 15, '21:20:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`r_no`);

--
-- Indexes for table `stops`
--
ALTER TABLE `stops`
  ADD PRIMARY KEY (`stop_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
