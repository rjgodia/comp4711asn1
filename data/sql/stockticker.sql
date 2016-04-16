-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2016 at 11:42 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stockticker`
--

-- --------------------------------------------------------

--
-- Table structure for table `gamestate`
--

CREATE TABLE `gamestate` (
  `name` varchar(50) NOT NULL DEFAULT 'stockticker',
  `round` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gamestate`
--

INSERT INTO `gamestate` (`name`, `round`) VALUES
('stockticker', 133);

-- --------------------------------------------------------

--
-- Table structure for table `holdings`
--

CREATE TABLE `holdings` (
  `user` varchar(200) DEFAULT NULL,
  `stock` varchar(200) DEFAULT NULL,
  `token` varchar(400) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `movements`
--

CREATE TABLE `movements` (
  `Datetime` varchar(19) DEFAULT NULL,
  `Code` varchar(4) DEFAULT NULL,
  `Action` varchar(4) DEFAULT NULL,
  `Amount` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movements`
--

INSERT INTO `movements` (`Datetime`, `Code`, `Action`, `Amount`) VALUES
('2016.02.01-09:01:00', 'BOND', 'down', 5),
('2016.02.01-09:01:02', 'IND', 'div', 5),
('2016.02.01-09:01:04', 'OIL', 'down', 10),
('2016.02.01-09:01:06', 'GOLD', 'div', 5),
('2016.02.01-09:01:08', 'BOND', 'up', 20),
('2016.02.01-09:01:10', 'GOLD', 'div', 5),
('2016.02.01-09:01:12', 'GOLD', 'down', 20),
('2016.02.01-09:01:14', 'IND', 'div', 10),
('2016.02.01-09:01:16', 'OIL', 'up', 20),
('2016.02.01-09:01:18', 'BOND', 'down', 5),
('2016.02.01-09:01:20', 'BOND', 'up', 5),
('2016.02.01-09:01:22', 'BOND', 'div', 20),
('2016.02.01-09:01:24', 'BOND', 'div', 20),
('2016.02.01-09:01:26', 'GOLD', 'div', 20),
('2016.02.01-09:01:28', 'IND', 'up', 20),
('2016.02.01-09:01:30', 'OIL', 'down', 20),
('2016.02.01-09:01:32', 'GRAN', 'down', 20),
('2016.02.01-09:01:34', 'BOND', 'up', 5),
('2016.02.01-09:01:36', 'GOLD', 'down', 20),
('2016.02.01-09:01:38', 'GOLD', 'down', 20),
('2016.02.01-09:01:40', 'TECH', 'down', 20),
('2016.02.01-09:01:42', 'TECH', 'up', 5),
('2016.02.01-09:01:44', 'OIL', 'up', 20),
('2016.02.01-09:01:46', 'BOND', 'up', 5),
('2016.02.01-09:01:48', 'GOLD', 'div', 10),
('2016.02.01-09:01:50', 'GOLD', 'down', 5),
('2016.02.01-09:01:52', 'GOLD', 'up', 20),
('2016.02.01-09:01:54', 'IND', 'down', 10),
('2016.02.01-09:01:56', 'GOLD', 'div', 20);

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `Player` varchar(6) DEFAULT NULL,
  `Cash` int(4) DEFAULT NULL,
  `Equity` int(11) NOT NULL DEFAULT '0',
  `Net` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`Player`, `Cash`, `Equity`, `Net`) VALUES
('Mickey', 1000, 0, 1000),
('Donald', 3000, 95200, 98200),
('George', 2000, 46100, 48100),
('Henry', 2500, 158000, 160500);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `Code` varchar(4) DEFAULT NULL,
  `Name` varchar(10) DEFAULT NULL,
  `Category` varchar(1) DEFAULT NULL,
  `Value` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`Code`, `Name`, `Category`, `Value`) VALUES
('BOND', 'Bonds', 'B', 66),
('GOLD', 'Gold', 'B', 110),
('GRAN', 'Grain', 'B', 113),
('IND', 'Industrial', 'B', 39),
('OIL', 'Oil', 'B', 52),
('TECH', 'Tech', 'B', 37);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `user` varchar(400) NOT NULL,
  `action` varchar(50) NOT NULL,
  `stock` varchar(60) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(229) NOT NULL,
  `password` varchar(299) NOT NULL,
  `avatar` varchar(299) DEFAULT NULL,
  `role` varchar(299) DEFAULT NULL,
  `cash` decimal(10,0) NOT NULL DEFAULT '5000',
  `equity` decimal(10,0) NOT NULL DEFAULT '0',
  `net` decimal(10,0) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `avatar`, `role`, `cash`, `equity`, `net`) VALUES
('rj', '$2y$10$TcJwOXGijXGudRtFLDGDo.tUSDtS.FZiY7iRTVVBjWNU9SkZn/TXO', '1460622752.png', 'user', '5000', '0', '5000'),
('danny', '$2y$10$zIKDo69q1mVE.2yWj.QhHuUGX0jrzrfMHxZMRprcUC.s7c7F35Vj2', '1460623810.png', 'user', '5000', '0', '5000'),
('daniel', '$2y$10$jhyT4E.jwtk7Gz7beG2/6eQi9aVuLS9HXcSxD6I5D3IjotZkawQBe', '1460623841.png', 'user', '5000', '0', '5000'),
('nico', '$2y$10$gOpIox3cyYuifOVflxgro.bJp/9lblJQHcYWbF5hiLETyyH8/P5Mq', '1460623956.png', 'user', '5000', '0', '5000'),
('unknown', '$2y$10$uv1NkXyAQl0pC6dOGaEhUue80EN6jGto0gXkFLIN1boZsjiYWY242', 'default.jpg', 'admin', '5000', '0', '5000');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
