-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2020 at 10:30 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `move`
--

-- --------------------------------------------------------

--
-- Table structure for table `active members`
--

CREATE TABLE `active members` (
  `id` int(11) NOT NULL,
  `email` varchar(225) COLLATE utf8_bin NOT NULL,
  `university id` varchar(50) COLLATE utf8_bin NOT NULL,
  `team` varchar(225) COLLATE utf8_bin NOT NULL,
  `faculty` varchar(225) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `chatText` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `user_id`, `chatText`) VALUES
(1, 1, 'hi\n'),
(2, 2, 'hi hayeen ya 7bb\n'),
(3, 4, 'hi\n'),
(13, 4, 'hi\n'),
(14, 4, 'hi\n'),
(15, 4, 'h\n'),
(16, 4, 'h\n'),
(17, 4, 'h\n'),
(18, 4, ''),
(19, 4, 'h\n'),
(20, 4, 'h\n'),
(21, 4, '\n'),
(22, 4, 'h\n'),
(23, 4, '\n'),
(24, 4, 'h\n'),
(25, 4, 'h\n'),
(26, 4, 'hi\n'),
(27, 4, 'hi\n'),
(28, 4, 'hi\n'),
(29, 4, 'z\n'),
(30, 4, 'zzz\n'),
(31, 4, 'hey\n'),
(32, 4, 'a\n'),
(33, 4, 'a\n'),
(34, 4, 'a\n'),
(35, 4, 'a\n'),
(36, 4, 'lol\n'),
(37, 4, 'lol\n'),
(38, 4, 'hyyyy\n'),
(39, 4, 'h\n'),
(40, 4, 'ldkvldv\n'),
(41, 4, 'hhhh\n'),
(42, 4, 'f\n'),
(43, 4, 'bbbbbbbbb\n'),
(44, 4, 'b\n'),
(45, 4, 'xxxxxxxxx\n'),
(46, 4, 'x\n'),
(47, 4, 'hey\n'),
(48, 4, 'h\n'),
(49, 4, 'h\n'),
(50, 4, 'h\n'),
(51, 4, 'h\n'),
(52, 4, 'lol\n'),
(53, 4, 'l\n'),
(54, 4, 'hy\n'),
(55, 4, 'l\n'),
(56, 4, 'o\n'),
(57, 4, 'aaaaa\n'),
(58, 4, 'a\n'),
(59, 4, 'a\n'),
(60, 4, 'a\n'),
(61, 4, 'f\n'),
(62, 4, 'hey\n'),
(63, 4, 'hey\n'),
(64, 4, 'l\n'),
(65, 4, ';l\n'),
(66, 4, 'hi\n'),
(67, 4, 'hi\n'),
(68, 4, 'h\n'),
(69, 4, 'hhhh\n'),
(70, 4, 'm\n'),
(71, 4, 'hi\n'),
(72, 4, 'lol\n'),
(73, 4, 'damn\n'),
(74, 4, 'this chat app is great\n'),
(75, 4, 'hhhh\n');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(225) COLLATE utf8_bin NOT NULL,
  `date` text COLLATE utf8_bin NOT NULL,
  `body` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `date`, `body`) VALUES
(3, 'hello', '21/1/2020', 'ufgwirbuiehrnoiw');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(225) COLLATE utf8_bin NOT NULL,
  `email` varchar(225) COLLATE utf8_bin NOT NULL,
  `universityid` varchar(50) COLLATE utf8_bin NOT NULL,
  `team` varchar(225) COLLATE utf8_bin NOT NULL,
  `username` varchar(225) COLLATE utf8_bin NOT NULL,
  `password` varchar(225) COLLATE utf8_bin NOT NULL,
  `faculty` varchar(225) COLLATE utf8_bin NOT NULL,
  `type` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `universityid`, `team`, `username`, `password`, `faculty`, `type`) VALUES
(2, 'fady bassel', 'fadybassel1@gmail.com', '1232321', '', 'fady', '123456', '', 'admin'),
(3, 'fadyyy', 'fadybassel1@mail.com', '2123', '', 'bony', '123456', '', 'user'),
(4, 'ddd', 'ddd@d.com', '11111', '', 'dddd', '111111', '', 'user'),
(5, 'fady bassel', 'fadybassel@ss.com', '2017/1213', '', 'fadyy', '123456', '', 'user'),
(6, 'amr khaled', 'amr@hotmail.com', '2222/2222', '', 'Amrr', '123456', '', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active members`
--
ALTER TABLE `active members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `event`
--
ALTER TABLE `event`
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
-- AUTO_INCREMENT for table `active members`
--
ALTER TABLE `active members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
