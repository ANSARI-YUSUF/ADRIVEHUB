-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2024 at 09:52 PM
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
-- Database: `drivehub6`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `adminid` int(11) NOT NULL,
  `adminame` varchar(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`adminid`, `adminame`) VALUES
(1, 'bhumikamem');

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
-- Table structure for table `batchdetail`
--

CREATE TABLE `batchdetail` (
  `bid` int(11) NOT NULL,
  `batchname` varchar(20) NOT NULL,
  `cource` varchar(20) NOT NULL,
  `year` int(11) NOT NULL,
  `division` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batchdetail`
--

INSERT INTO `batchdetail` (`bid`, `batchname`, `cource`, `year`, `division`) VALUES
(17, 'players', 'mba', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `coursedetails`
--

CREATE TABLE `coursedetails` (
  `cid` int(11) NOT NULL,
  `course` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fid` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fid`, `fname`) VALUES
(1, 'bhumikamem'),
(2, ''),
(3, 'maitrymem'),
(4, 'maitrymem'),
(5, 'maitrymem'),
(6, 'maitrymem'),
(7, 'maitrymem'),
(8, 'maitrymem'),
(9, 'maitrymem');

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
(83, 29, 'h.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'uploads/yusuf,h.xlsx', '2024-06-26 08:59:20', 9.867),
(84, 32, '1.html', 'text/html', 'uploads/rutu,1.html', '2024-06-27 10:51:49', 0.682);

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

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`G_ID`, `GROUP_NAME`, `admin_name`, `groupmember`, `U_ID`) VALUES
(82, 'pg', 'test3030', 'drashti', 27),
(83, 'pg', 'test3030', 'drashti', 27),
(84, 'csk', 'dhoni', 'rutu,jaddu,raidu,raina', 29),
(85, 'csk', 'dhoni', 'rutu,jaddu,raidu,raina', 29),
(86, 'csk', 'rutu', 'jadeja,rachin', 32);

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
  `G_ID` int(11) NOT NULL,
  `U_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group_files`
--

INSERT INTO `group_files` (`gfid`, `gfile_name`, `gfile_type`, `gfile_path`, `gfile_created_date`, `gfile_size`, `G_ID`, `U_ID`) VALUES
(5, 'Assignment.php', 'application/octet-stream', 'guploads/test3030,Assignment.php', '2024-06-03 10:58:36', 2.766, 82, 27);

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

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `ROLE_ID` int(11) NOT NULL,
  `ROLE_NAME` varchar(255) NOT NULL,
  `PERMISSION_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `sfiles`
--

CREATE TABLE `sfiles` (
  `sfid` int(11) NOT NULL,
  `stuid` int(11) NOT NULL,
  `U_ID` int(11) NOT NULL,
  `sfname` varchar(40) NOT NULL,
  `sftype` varchar(40) NOT NULL,
  `sfcreateddate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sfsize` int(11) NOT NULL,
  `sfpath` varchar(40) NOT NULL,
  `bid` int(11) NOT NULL,
  `subid` int(11) NOT NULL,
  `subject` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sfiles`
--

INSERT INTO `sfiles` (`sfid`, `stuid`, `U_ID`, `sfname`, `sftype`, `sfcreateddate`, `sfsize`, `sfpath`, `bid`, `subid`, `subject`) VALUES
(2, 1, 34, 'java_assignment1.java', 'application/octet-stream', '2024-09-19 18:35:37', 16, 'suploads/bhumikamem,java_assignment1.jav', 17, 4, ''),
(3, 1, 35, 'ProblemSet_JavaBasicprograms_16072024.do', 'application/vnd.openxmlformats-officedoc', '2024-09-19 18:41:18', 15, 'suploads/dati,ProblemSet_JavaBasicprogra', 17, 4, ''),
(4, 2, 35, '61_ANSARI_MOHAMMED_YUSUF.txt', 'text/plain', '2024-09-19 19:08:00', 29, 'suploads/dati,61_ANSARI_MOHAMMED_YUSUF.t', 17, 4, '');

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
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stuid` int(11) NOT NULL,
  `stuname` varchar(20) NOT NULL,
  `batchname` varchar(30) NOT NULL,
  `course` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `bid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stuid`, `stuname`, `batchname`, `course`, `email`, `bid`) VALUES
(1, 'yusuf', 'players', 'mba', 'yusuf123@gmail.com', 16),
(2, 'dati', 'players', 'mba', 'dati@gmail.com', 17);

-- --------------------------------------------------------

--
-- Table structure for table `subjectsdetail`
--

CREATE TABLE `subjectsdetail` (
  `subid` int(11) NOT NULL,
  `subjects` varchar(30) NOT NULL,
  `batchname` varchar(30) NOT NULL,
  `course` varchar(30) NOT NULL,
  `subjectcode` varchar(20) NOT NULL,
  `credit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjectsdetail`
--

INSERT INTO `subjectsdetail` (`subid`, `subjects`, `batchname`, `course`, `subjectcode`, `credit`) VALUES
(1, 'java', 'players', 'mba', 'j', 4),
(2, 'java', 'players', 'mba', 'j', 4),
(3, 'java22', 'players', 'mba', 'jj', 4),
(4, 'java2222', 'players', 'mba', 'jjss', 4);

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
(27, 'test3030', 'pariya08@gmail.com', '$2y$10$rGLVSdDc1oZ12aRuoOZze.8Q96Rt/pWne/JaXSddb9Rwpb.RaXjrC', NULL, NULL),
(28, 'ashish', 'riya0808@gmail.com', '$2y$10$Ij/.lGmZcAr0EYl6Oa7.GOvEP6qhZIgK0TYUiv6ajt1R3AoxnjCEK', NULL, NULL),
(29, 'yusuf', 'yusuf@gmail.com', '$2y$10$QvrMBAnFgZ7z.amDXSPXeuQ9DdaEtuotPoGq6eHdViRYnrWKS2Tja', NULL, NULL),
(30, 'ram(GOD)', 'ram23@gmail.com', '$2y$10$M/l1pTh51ccjF3S6L3Inhu4NBzfHCD6yrRHsOOrPo66iwHsL9bHaS', NULL, NULL),
(31, 'hujh', 'patoliyadrashti08@gmail.com', '$2y$10$Wj5sfuSKdMAzfaRO702xOOXyEkb1M36Ak4tzu5cc3C0TK/3W.XIz.', NULL, NULL),
(32, 'rutu', 'rutu@gmail.com', '$2y$10$k8DDSy5CZ5YhfKtI4pWDoeYZkSIp8roFkpyqzGc19q1DGbJkQHFSe', NULL, NULL),
(33, 'bhumikashah', 'b1@gmail.com', '$2y$10$HeC1yRvE5xWLUzf4dGdAPO7o41N6u.CLURk9Ahsy3yyScOUFVyHJC', NULL, NULL),
(34, 'bhumikamem', 'bm1@gmail.com', '$2y$10$cWfY8Q9OD3jL7CqJCUnVHu87RWt4srOQByqBgIMyY6i7ip5dYBmsu', NULL, NULL),
(35, 'dati', 'dati@gmail.com', '$2y$10$ewzMkF0Tj5KfkmS090w0zOijDjBRWfS6eL2oOcqGNKYd5oWLN4qCq', NULL, NULL);

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
-- Indexes for table `batchdetail`
--
ALTER TABLE `batchdetail`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `coursedetails`
--
ALTER TABLE `coursedetails`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fid`);

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
  ADD PRIMARY KEY (`G_ID`);

--
-- Indexes for table `group_files`
--
ALTER TABLE `group_files`
  ADD PRIMARY KEY (`gfid`);

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
-- Indexes for table `sfiles`
--
ALTER TABLE `sfiles`
  ADD PRIMARY KEY (`sfid`);

--
-- Indexes for table `shared_file`
--
ALTER TABLE `shared_file`
  ADD PRIMARY KEY (`SHARE_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stuid`);

--
-- Indexes for table `subjectsdetail`
--
ALTER TABLE `subjectsdetail`
  ADD PRIMARY KEY (`subid`);

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
-- AUTO_INCREMENT for table `batchdetail`
--
ALTER TABLE `batchdetail`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `coursedetails`
--
ALTER TABLE `coursedetails`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `FILE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `gropu_member`
--
ALTER TABLE `gropu_member`
  MODIFY `GROUP_MEMBERS_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `G_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `group_files`
--
ALTER TABLE `group_files`
  MODIFY `gfid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `sfiles`
--
ALTER TABLE `sfiles`
  MODIFY `sfid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shared_file`
--
ALTER TABLE `shared_file`
  MODIFY `SHARE_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjectsdetail`
--
ALTER TABLE `subjectsdetail`
  MODIFY `subid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `U_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
