-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 16, 2023 at 03:55 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `friends`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `friend_id` int(11) NOT NULL,
  `friend_email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `profile_name` varchar(30) NOT NULL,
  `date_started` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `num_of_friends` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`friend_id`, `friend_email`, `password`, `profile_name`, `date_started`, `num_of_friends`) VALUES
(2, 'desilvabethmin@gmail.com', '123', 'Januda', '2023-10-16 18:50:41', 6),
(4, 'sandalika24@gmail.com', '123', 'Sandali', '2023-10-16 19:01:43', 4),
(5, 'hasithmavinuki@gmail.com', '123', 'Vinuki', '2023-10-16 19:09:25', 2),
(26, 'senethmavinumi@gmail.com', '123', 'Vinumi', '2023-10-16 19:10:04', 2),
(28, 'nadunitashana@gmail.com', '123', 'Tashana', '2023-10-16 13:49:51', 0),
(29, 'thevindukevin@gmail.com', '123', 'Thevindu', '2023-10-16 13:50:18', 0),
(30, 'umecooray@gmail.com', '123', 'Umayangana', '2023-10-16 13:50:47', 0),
(31, 'mayurayasith@gmail.com', '123', 'Mayura', '2023-10-16 13:51:17', 0),
(32, 'uviniranasinghe@gmail.com', '123', 'Uvini', '2023-10-16 13:52:10', 0),
(33, 'supuniab@gmail.com', '123', 'Supuni', '2023-10-16 13:52:31', 0),
(34, 'peheliyadhanuka@gmail.com', '123', 'Peheliya', '2023-10-16 16:39:31', 0),
(35, 'sashindaadithya@gmail.com', '123', 'Shashinda', '2023-10-16 16:39:54', 0),
(36, 'batheeshadilmeen@gmail.com', '123', 'Batheesha', '2023-10-16 16:40:09', 0),
(37, 'chamodinduwara@gmail.com', '123', 'Chamod', '2023-10-16 16:40:30', 0),
(38, 'rusiryjayakody@gmail.com', '123', 'Rusiru', '2023-10-16 16:41:07', 0),
(39, 'nipunasudesh@gmail.com', '123', 'Nipuna', '2023-10-16 16:41:40', 0),
(40, 'visuraindula@gmail.com', '123', 'Visura', '2023-10-16 16:41:59', 0);

-- --------------------------------------------------------

--
-- Table structure for table `myfriends`
--

CREATE TABLE `myfriends` (
  `friend_id1` int(11) NOT NULL,
  `friend_id2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `myfriends`
--

INSERT INTO `myfriends` (`friend_id1`, `friend_id2`) VALUES
(2, 4),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 33),
(4, 2),
(4, 28),
(4, 32),
(4, 33),
(5, 2),
(5, 26),
(26, 2),
(26, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`friend_id`),
  ADD UNIQUE KEY `friend_email` (`friend_email`);

--
-- Indexes for table `myfriends`
--
ALTER TABLE `myfriends`
  ADD PRIMARY KEY (`friend_id1`,`friend_id2`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `friend_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
