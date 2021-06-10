-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 06:30 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_managment_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `committe`
--

CREATE TABLE `committe` (
  `faculty_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `committee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `program` char(40) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `year` char(10) DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  `coursename` varchar(60) DEFAULT NULL,
  `status` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `criteriamaster`
--

CREATE TABLE `criteriamaster` (
  `id` int(11) NOT NULL,
  `cname` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `evalutioncriteria`
--

CREATE TABLE `evalutioncriteria` (
  `eval_id` int(11) DEFAULT NULL,
  `criteria_id` int(11) DEFAULT NULL,
  `out_of_marks` int(11) DEFAULT NULL,
  `srn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(11) NOT NULL,
  `faculty_name` varchar(20) NOT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `designation` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `groupmember`
--

CREATE TABLE `groupmember` (
  `group_id` int(11) DEFAULT NULL,
  `enrollment` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `email` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL,
  `user_type` char(1) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `panelallocation`
--

CREATE TABLE `panelallocation` (
  `panel_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `eval_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `panelmember`
--

CREATE TABLE `panelmember` (
  `panel_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `panel_eval`
--

CREATE TABLE `panel_eval` (
  `panel_id` int(11) NOT NULL,
  `eval_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `panel_desc` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `projectgroup`
--

CREATE TABLE `projectgroup` (
  `group_id` int(11) NOT NULL,
  `project_title` varchar(200) DEFAULT NULL,
  `technology` varchar(200) DEFAULT NULL,
  `guide_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `projectguidance`
--

CREATE TABLE `projectguidance` (
  `group_id` int(11) DEFAULT NULL,
  `dom` date DEFAULT NULL,
  `discussion` varchar(1000) DEFAULT NULL,
  `instruction` varchar(1000) DEFAULT NULL,
  `remark` varchar(1000) DEFAULT NULL,
  `guide_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sheduleevalution`
--

CREATE TABLE `sheduleevalution` (
  `eval_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `edate` date DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `eval_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `enrollment` varchar(50) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `contact_number` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `studentmarks`
--

CREATE TABLE `studentmarks` (
  `group_id` int(11) NOT NULL,
  `enrollment` varchar(30) NOT NULL,
  `panel_id` int(11) NOT NULL,
  `eval_id` int(11) NOT NULL,
  `criteria_id` int(11) NOT NULL,
  `om` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `technologymaster`
--

CREATE TABLE `technologymaster` (
  `id` int(11) NOT NULL,
  `technology` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `committe`
--
ALTER TABLE `committe`
  ADD PRIMARY KEY (`committee_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `coursename` (`coursename`);

--
-- Indexes for table `criteriamaster`
--
ALTER TABLE `criteriamaster`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cname` (`cname`);

--
-- Indexes for table `evalutioncriteria`
--
ALTER TABLE `evalutioncriteria`
  ADD PRIMARY KEY (`srn`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- Indexes for table `panel_eval`
--
ALTER TABLE `panel_eval`
  ADD PRIMARY KEY (`panel_id`);

--
-- Indexes for table `projectgroup`
--
ALTER TABLE `projectgroup`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `projectguidance`
--
ALTER TABLE `projectguidance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sheduleevalution`
--
ALTER TABLE `sheduleevalution`
  ADD PRIMARY KEY (`eval_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`enrollment`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `contact_number` (`contact_number`);

--
-- Indexes for table `technologymaster`
--
ALTER TABLE `technologymaster`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `committe`
--
ALTER TABLE `committe`
  MODIFY `committee_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `criteriamaster`
--
ALTER TABLE `criteriamaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evalutioncriteria`
--
ALTER TABLE `evalutioncriteria`
  MODIFY `srn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `panel_eval`
--
ALTER TABLE `panel_eval`
  MODIFY `panel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projectgroup`
--
ALTER TABLE `projectgroup`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projectguidance`
--
ALTER TABLE `projectguidance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sheduleevalution`
--
ALTER TABLE `sheduleevalution`
  MODIFY `eval_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `technologymaster`
--
ALTER TABLE `technologymaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
