-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2024 at 08:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drivehub`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignmnet_log`
--

CREATE TABLE `assignmnet_log` (
  `ASSIGNMENT_ID` int(11) NOT NULL,
  `U_ID` int(11) NOT NULL,
  `F_ID` int(11) NOT NULL,
  `PATH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `audit_log`
--

CREATE TABLE `audit_log` (
  `LOG_ID` int(11) NOT NULL,
  `U_ID` int(11) NOT NULL,
  `ACTION_TYPE` varchar(30) NOT NULL,
  `F_ID` int(11) NOT NULL,
  `ACTION_TIME` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `FILE_ID` int(11) NOT NULL,
  `U_ID` int(11) NOT NULL,
  `FILE_NAME` varchar(30) NOT NULL,
  `FILE_TYPE` varchar(255) NOT NULL,
  `PATH` varchar(255) NOT NULL,
  `CREATED_DATE` timestamp NOT NULL DEFAULT current_timestamp(),
  `FILE_SIZE` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`FILE_ID`, `U_ID`, `FILE_NAME`, `FILE_TYPE`, `PATH`, `CREATED_DATE`, `FILE_SIZE`) VALUES
(70, 16, 'p2.jfif', 'image/jpeg', 'uploads/TEST00,p2.jfif', '2024-04-27 03:09:42', 8.807),
(71, 17, 'p1.jpg.jfif', 'image/jpeg', 'uploads/parag2,p1.jpg.jfif', '2024-04-27 03:15:03', 6.745),
(72, 17, 'p2.jfif', 'image/jpeg', 'uploads/parag2,p2.jfif', '2024-04-27 03:15:14', 8.807),
(73, 16, 'resized_image.jpg', 'image/jpeg', 'uploads/TEST00,resized_image.jpg', '2024-04-27 04:08:46', 53.45),
(74, 16, 'Screenshot (1).png', 'image/png', 'uploads/TEST00,Screenshot (1).png', '2024-04-27 04:11:58', 119.552),
(77, 18, 'ansariyusuf,amatrix.cpp', 'application/octet-stream', 'uploads/ansariyusuf,ansariyusuf,amatrix.cpp', '2024-05-14 07:55:19', 0.815),
(78, 18, 'adjmatrix.cpp', 'application/octet-stream', 'uploads/ansariyusuf,adjmatrix.cpp', '2024-05-14 07:55:26', 1.246);

-- --------------------------------------------------------

--
-- Table structure for table `gropu_member`
--

CREATE TABLE `gropu_member` (
  `GROUP_MEMBERS_ID` int(11) NOT NULL,
  `GROUP_MEMBERS_NAME` varchar(30) NOT NULL,
  `G_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `G_ID` int(11) NOT NULL,
  `GROUP_NAME` varchar(255) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `groupmember` text NOT NULL,
  `U_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_files`
--

CREATE TABLE `group_files` (
  `gfid` int(11) NOT NULL,
  `gfile_name` varchar(50) NOT NULL,
  `gfile_type` varchar(50) NOT NULL,
  `gfile_path` varchar(300) NOT NULL,
  `gfile_created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gfile_size` float NOT NULL,
  `G_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `NOTIFICATION_ID` int(11) NOT NULL,
  `CONTENT` text NOT NULL,
  `SENDER_ID` int(11) NOT NULL,
  `RECIEVED_AT` date NOT NULL,
  `U_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `PERMISSION_ID` int(11) NOT NULL,
  `PERMISSION_TYPE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`PERMISSION_ID`, `PERMISSION_TYPE`) VALUES
(1, 'All');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `ROLE_ID` int(11) NOT NULL,
  `ROLE_NAME` varchar(255) NOT NULL,
  `PERMISSION_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`ROLE_ID`, `ROLE_NAME`, `PERMISSION_ID`) VALUES
(1, 'Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `SESSION_ID` int(11) NOT NULL,
  `U_ID` int(11) NOT NULL,
  `EXPIRATION_TIME` date NOT NULL,
  `SESSION_TOKEN` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shared_file`
--

CREATE TABLE `shared_file` (
  `SHARE_ID` int(11) NOT NULL,
  `F_ID` int(11) NOT NULL,
  `PERMISSION_ID` int(11) NOT NULL,
  `SHARED_AT` date NOT NULL,
  `SHARED_BY_UID` int(11) NOT NULL,
  `SHARED_G_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `U_ID` int(11) NOT NULL,
  `U_NAME` varchar(255) NOT NULL,
  `U_EMAIL` varchar(50) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `ROLE_ID` int(11) DEFAULT NULL,
  `G_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`U_ID`, `U_NAME`, `U_EMAIL`, `PASSWORD`, `ROLE_ID`, `G_ID`) VALUES
(15, 'parag', 'abc21@gmail.com', '$2y$10$CYRigpqzOSPWKXJzPvbM3Ogd2MiwqnBJKpFRtpa/s8Il61YygGFg.', NULL, NULL),
(16, 'TEST00', 'a0@gmail.com', '$2y$10$v2uEjUyjT0pXU6.GsnmBZuAuluhkjIazUKg7Oc63QadR8bfhHUxc2', NULL, NULL),
(17, 'parag2', 'a22@gmail.com', '$2y$10$T.O.uuf5vDSdZLjOpLCXOehImkTwEWjRGJgzgEs8GEWSTw51K6Tu6', NULL, NULL),
(18, 'ansariyusuf', 'ansariyusufcs@gmail.com', '$2y$10$miIEEtdiAcu2C/mgtiFK8uFJ56oq5J9s4id85GEDww6LEP4xV.fJC', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `PROFILE_ID` int(11) NOT NULL,
  `U_ID` int(11) NOT NULL,
  `BIO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignmnet_log`
--
ALTER TABLE `assignmnet_log`
  ADD PRIMARY KEY (`ASSIGNMENT_ID`);

--
-- Indexes for table `audit_log`
--
ALTER TABLE `audit_log`
  ADD PRIMARY KEY (`LOG_ID`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`FILE_ID`);

--
-- Indexes for table `gropu_member`
--
ALTER TABLE `gropu_member`
  ADD PRIMARY KEY (`GROUP_MEMBERS_ID`),
  ADD KEY `FOREIGN KEY` (`G_ID`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`G_ID`),
  ADD KEY `USERID` (`U_ID`);

--
-- Indexes for table `group_files`
--
ALTER TABLE `group_files`
  ADD PRIMARY KEY (`gfid`),
  ADD KEY `groupid` (`G_ID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`NOTIFICATION_ID`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`PERMISSION_ID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ROLE_ID`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`SESSION_ID`);

--
-- Indexes for table `shared_file`
--
ALTER TABLE `shared_file`
  ADD PRIMARY KEY (`SHARE_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`U_ID`);
ALTER TABLE `user` ADD FULLTEXT KEY `data` (`U_NAME`,`U_EMAIL`);
ALTER TABLE `user` ADD FULLTEXT KEY `idx_name` (`U_NAME`);
ALTER TABLE `user` ADD FULLTEXT KEY `U_NAME` (`U_NAME`,`U_EMAIL`);
ALTER TABLE `user` ADD FULLTEXT KEY `U_NAME_2` (`U_NAME`,`U_EMAIL`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`PROFILE_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignmnet_log`
--
ALTER TABLE `assignmnet_log`
  MODIFY `ASSIGNMENT_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `audit_log`
--
ALTER TABLE `audit_log`
  MODIFY `LOG_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `FILE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `gropu_member`
--
ALTER TABLE `gropu_member`
  MODIFY `GROUP_MEMBERS_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `G_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `group_files`
--
ALTER TABLE `group_files`
  MODIFY `gfid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `NOTIFICATION_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `PERMISSION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `ROLE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `SESSION_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shared_file`
--
ALTER TABLE `shared_file`
  MODIFY `SHARE_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `U_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `PROFILE_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gropu_member`
--
ALTER TABLE `gropu_member`
  ADD CONSTRAINT `FOREIGN KEY` FOREIGN KEY (`G_ID`) REFERENCES `groups` (`G_ID`);

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `USERID` FOREIGN KEY (`U_ID`) REFERENCES `user` (`U_ID`);

--
-- Constraints for table `group_files`
--
ALTER TABLE `group_files`
  ADD CONSTRAINT `groupid` FOREIGN KEY (`G_ID`) REFERENCES `groups` (`G_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
