-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2021 at 06:38 PM
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
-- Database: `oes`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `ph_number` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`, `username`, `ph_number`) VALUES
('admin@gmail.com', 'admin', 'Admin', '9876543210');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `c_id` int(17) NOT NULL,
  `password` varchar(20) NOT NULL,
  `c_name` varchar(20) NOT NULL,
  `aadhar_no` varchar(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `p_id` int(10) NOT NULL,
  `s_id` int(10) NOT NULL,
  `p_symbol` varchar(200) NOT NULL,
  `reg_date` date NOT NULL,
  `verify_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`c_id`, `password`, `c_name`, `aadhar_no`, `email`, `p_id`, `s_id`, `p_symbol`, `reg_date`, `verify_status`) VALUES
(4, 'dev2021', 'Devashya Patel', '345678901234', 'dev@gmail.com', 4, 3, 'congress.png', '2021-03-07', 'Accepted'),
(5, 'kush2021', 'kush raval', '123456789012', 'kush@gmail.com', 3, 1, 'bjp.png', '2021-03-09', 'Accepted'),
(6, 'bhargav2021', 'bhargav', '901234567890', 'bhargav@gmail.com', 5, 2, 'aap1.jpg', '2021-03-13', 'Accepted'),
(7, 'ved2021', 'Ved', '789012345678', 'ved@gmail.com', 6, 4, 'shivsena.jpg', '2021-03-14', 'Accepted'),
(8, 'venil2021', 'venil', '345687901234', 'venil@gmail.com', 6, 2, 'shivsena.jpg', '2021-03-22', 'Accepted'),
(9, 'vinay', 'Vinay Pandya', '445678901278', 'vinay@gmail.com', 6, 3, 'shivsena.jpg', '2021-03-26', 'Accepted'),
(12, 'jay2021', 'Jay Patel', '901234567843', 'jay@gmail.com', 5, 1, 'aap1.jpg', '2021-04-05', 'Accepted'),
(13, 'dhruvik2021', 'Dhruvik Soni', '123456789065', 'dhruvik@gmail.com', 3, 4, 'bjp.png', '2021-04-14', 'Accepted'),
(15, 'mohit2021', 'Mohit Mishra', '901234562784', 'mohit@gmail.com', 4, 5, 'congress.png', '2021-04-22', 'Accepted'),
(16, 'ramesh2021', 'Ramesh Raval', '901234563789', 'ramesh@gmail.com', 6, 5, 'shivsena.jpg', '2021-04-22', 'Rejected'),
(17, 'paresh2021', 'Paresh Soni', '123456789098', 'paresh@gmail.com', 3, 5, 'bjp.png', '2021-04-14', 'Withdrawed'),
(18, 'jay2021', 'Jay Rami', '901234567034', 'jay@gmail.com', 3, 3, 'bjp.png', '2021-04-30', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_docs`
--

CREATE TABLE `candidate_docs` (
  `c_id` int(17) NOT NULL,
  `c_photo` varchar(200) NOT NULL,
  `income` varchar(200) NOT NULL,
  `affidavit` varchar(200) NOT NULL,
  `form_a` varchar(200) NOT NULL,
  `form_b` varchar(200) NOT NULL,
  `caste_certificate` varchar(200) NOT NULL,
  `security_deposit` varchar(200) NOT NULL,
  `property` varchar(200) NOT NULL,
  `outh_letter` varchar(200) NOT NULL,
  `can_info` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate_docs`
--

INSERT INTO `candidate_docs` (`c_id`, `c_photo`, `income`, `affidavit`, `form_a`, `form_b`, `caste_certificate`, `security_deposit`, `property`, `outh_letter`, `can_info`) VALUES
(4, 'congress.png', 'ANNUAL SALARY CERTIFICATE.pdf', 'Affidavit Form.pdf', 'Form A.pdf', 'Form_B.pdf', 'Caste_Certificate.pdf', 'Security Deposit Receipt.pdf', 'Property_CERTIFICATE.pdf', 'oath letter.pdf', 'Candidate Information Form.pdf'),
(5, 'aap.jpg', 'ANNUAL SALARY CERTIFICATE.pdf', 'Affidavit Form.pdf', 'Form A.pdf', 'Form_B.pdf', 'Caste_Certificate.pdf', 'Security Deposit Receipt.pdf', 'Property_CERTIFICATE.pdf', 'oath letter.pdf', 'Candidate Information Form.pdf'),
(6, 'aap.jpg', 'ANNUAL SALARY CERTIFICATE.pdf', 'Affidavit Form.pdf', 'Form A.pdf', 'Form_B.pdf', 'Caste_Certificate.pdf', 'Security Deposit Receipt.pdf', 'Property_CERTIFICATE.pdf', 'oath letter.pdf', 'Candidate Information Form.pdf'),
(9, 'kejriwal.jpg', 'ANNUAL SALARY CERTIFICATE.pdf', 'Affidavit Form.pdf', 'Form A.pdf', 'Form_B.pdf', 'Caste_Certificate.pdf', 'Security Deposit Receipt.pdf', 'Property_CERTIFICATE.pdf', 'oath letter.pdf', 'Candidate Information Form.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`) VALUES
(1, 'Ahmedabad'),
(2, 'Gandhinagar'),
(3, 'Gir Somnath'),
(4, 'Jamnagar');

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

CREATE TABLE `election` (
  `e_id` int(20) NOT NULL,
  `e_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`e_id`, `e_name`) VALUES
(1, 'Lok Sabha 2021');

-- --------------------------------------------------------

--
-- Table structure for table `election_schedule`
--

CREATE TABLE `election_schedule` (
  `e_id` int(10) NOT NULL,
  `s_id` int(10) NOT NULL,
  `voting_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `reg_start_date` date NOT NULL,
  `reg_end_date` date NOT NULL,
  `withdraw_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `election_schedule`
--

INSERT INTO `election_schedule` (`e_id`, `s_id`, `voting_date`, `start_time`, `end_time`, `reg_start_date`, `reg_end_date`, `withdraw_date`) VALUES
(1, 1, '2021-03-30', '08:00:00', '17:00:00', '2021-03-18', '2021-03-21', '2021-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `p_id` int(10) NOT NULL,
  `p_name` varchar(30) NOT NULL,
  `p_shortname` varchar(10) NOT NULL,
  `symbol` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`p_id`, `p_name`, `p_shortname`, `symbol`) VALUES
(3, 'Bhartiya janta party', 'BJP', 'bjp.png'),
(4, 'Indian National Congress', 'Congress', 'congress.png'),
(5, 'Aam Aadmi Party', 'AAP', 'aap1.jpg'),
(6, 'Shivsena', 'SHS', 'shivsena.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `s_id` int(10) NOT NULL,
  `s_name` varchar(20) NOT NULL,
  `city_id` int(10) NOT NULL,
  `state` varchar(20) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`s_id`, `s_name`, `city_id`, `state`, `latitude`, `longitude`) VALUES
(1, 'Bapunagar', 1, 'Gujarat', 23.037431, 72.6298913),
(2, 'Gandhinagar South', 2, 'Gujarat', 23.23756, 72.647781),
(3, 'Somnath', 3, 'Gujarat', 20.9065579, 70.3683564),
(4, 'Naroda', 1, 'Gujarat', 23.0690095, 72.6801516),
(5, 'JamJodhpur', 4, 'Gujarat', 21.9025547, 70.0337615);

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `vote_date` date NOT NULL,
  `vote_time` time NOT NULL,
  `v_id` int(10) NOT NULL,
  `s_id` int(10) NOT NULL,
  `c_id` int(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`vote_date`, `vote_time`, `v_id`, `s_id`, `c_id`) VALUES
('2021-04-15', '23:15:44', 5, 2, 6),
('2021-04-06', '13:35:34', 6, 1, 5),
('2021-04-07', '14:02:35', 13, 3, 4),
('2021-04-15', '11:14:48', 14, 4, 13),
('2021-04-15', '12:18:36', 15, 4, 7),
('2021-04-16', '11:13:25', 16, 4, 13),
('2021-04-23', '10:41:17', 17, 1, 12),
('2021-04-23', '10:42:02', 18, 1, 5),
('2021-04-30', '21:47:38', 20, 1, 12),
('2021-04-23', '10:42:29', 21, 1, 5),
('2021-04-30', '21:47:58', 22, 1, 5),
('2021-04-30', '21:50:53', 23, 2, 6),
('2021-04-30', '21:51:13', 24, 2, 6),
('2021-04-30', '21:50:13', 25, 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `voter`
--

CREATE TABLE `voter` (
  `generic_id` varchar(30) NOT NULL,
  `v_id` int(20) NOT NULL,
  `v_name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `s_id` int(10) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `ph_no` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voter`
--

INSERT INTO `voter` (`generic_id`, `v_id`, `v_name`, `email`, `user_id`, `password`, `s_id`, `dob`, `gender`, `ph_no`) VALUES
('IND-604dff6e26d9c', 5, 'Devashya', 'dev@gmail.com', 'dev2805', 'dev2021', 2, '2000-05-28', 'Male', '9012345678'),
('IND-604dffb794cf6', 6, 'bhargav', 'bhargav@gmail.com', 'bhargav2000', 'bhargav2021', 1, '2000-01-11', 'Male', '9015632112'),
('IND-604e002607080', 7, 'kush', 'kush@gmail.com', 'kush1234', 'kush2021', 3, '2000-05-08', 'Male', '9876543210'),
('IND-6059a5b63b507', 8, 'malav', 'malav@gmail.com', 'malav2000', 'malav2021', 1, '2000-05-08', 'Male', '2345678901'),
('IND-606d6d7f66def', 13, 'Dev Patel', 'devp@gmail.com', 'dev2000', 'dev2021', 3, '1999-06-02', 'Male', '9876543345'),
('IND-6077d2a4a5a4f', 14, 'Kartik Patel', 'kartik@gmail.com', 'kartik2021', 'kartik2021', 4, '1998-05-06', 'Male', '9876543987'),
('IND-6077e180cdf59', 15, 'Khushi Solanki', 'khushi@gmail.com', 'khushi2000', 'khushi2021', 4, '1993-02-02', 'Female', '9012363872'),
('IND-60792398707b8', 16, 'Raj Pathak', 'raj@gmail.com', 'raj2000', 'raj2021', 4, '1992-07-21', 'Male', '9015632178'),
('IND-6081a18b57627', 17, 'Vidhya Chatterjee', 'vidhya@gmail.com', 'vidhya2000', 'vidhya2021', 1, '1986-07-10', 'Female', '9876543487'),
('IND-6081a1ddac517', 18, 'Mukesh Ahir', 'mukesh@gmail.com', 'mukesh2000', 'mukesh2021', 1, '1988-02-10', 'Male', '9012345128'),
('IND-6081a242d08e6', 19, 'Bhadresh Kapadia', 'bhadresh@gmail.com', 'bhadresh2000', 'bhadresh2021', 1, '1969-06-19', 'Male', '9876543290'),
('IND-6081a2812cf6f', 20, 'Sapna Chaudhari', 'sapna@gmail.com', 'sapna2000', 'sapna2021', 1, '1974-05-21', 'Female', '9876529371'),
('IND-6081a2e1e488b', 21, 'Laxmi Vyas', 'laxmi@gmail.com', 'laxmi2000', 'laxmi2021', 1, '1972-12-13', 'Female', '9012378923'),
('IND-6081a317d6446', 22, 'Pooja Patel', 'pooja@gmail.com', 'pooja2000', 'pooja2021', 1, '1981-10-13', 'Female', '9876541678'),
('IND-6081a358b4afd', 23, 'Ajay Mishra', 'ajay@gmail.com', 'ajay2000', 'ajay2021', 2, '1987-10-20', 'Male', '9015236789'),
('IND-6081a3a608e36', 24, 'Pawan Rajan', 'pawan@gmail.com', 'pawan2000', 'pawan2021', 2, '1985-03-28', 'Male', '9876541209'),
('IND-6081a413c84d4', 25, 'Dhara Jani', 'dhara@gmail.com', 'dhara2000', 'dhara2021', 2, '1988-12-01', 'Female', '9012345208'),
('IND-6086ef4ada8ac', 26, 'Vinay Sharma', 'vinays@gmail.com', 'vinay2001', 'vinay2021', 5, '1992-11-19', 'Male', '9012345209'),
('IND-608bf12bc0098', 27, 'Vishal Shah', 'vishal@gmail.com', 'vishal2000', 'vishal2021', 5, '1995-11-30', 'Male', '9012345012'),
('IND-608bf29552baf', 28, 'Jay Amin', 'jay123@gmai.com', 'jay2001', 'jay2021', 5, '1988-02-10', 'Male', '9876547834'),
('IND-608bf5f980966', 29, 'Saurav Rathod', 'saurav@gmail.com', 'saurav2000', 'saurav2021', 3, '1986-09-26', 'Male', '9876543781'),
('IND-608c2fb5919e8', 30, 'Harshad Mehta', 'harshad@gmail.com', 'harshad2000', 'harshad2021', 2, '1972-03-13', 'Male', '9012341972'),
('IND-608c3028e189a', 31, 'Abhishek Sharma', 'abhi@gmail.com', 'abhi2000', 'abhi2021', 2, '1982-10-12', 'Male', '9876543981');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `aadhar_no` (`aadhar_no`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `candidate_docs`
--
ALTER TABLE `candidate_docs`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `election`
--
ALTER TABLE `election`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `election_schedule`
--
ALTER TABLE `election_schedule`
  ADD KEY `s_id` (`s_id`),
  ADD KEY `e_id` (`e_id`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`v_id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `v_id` (`v_id`);

--
-- Indexes for table `voter`
--
ALTER TABLE `voter`
  ADD PRIMARY KEY (`generic_id`),
  ADD UNIQUE KEY `v_id` (`v_id`),
  ADD KEY `s_id` (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `c_id` int(17) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `election`
--
ALTER TABLE `election`
  MODIFY `e_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `s_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `voter`
--
ALTER TABLE `voter`
  MODIFY `v_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidate`
--
ALTER TABLE `candidate`
  ADD CONSTRAINT `candidate_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `seat` (`s_id`),
  ADD CONSTRAINT `p_id` FOREIGN KEY (`p_id`) REFERENCES `party` (`p_id`);

--
-- Constraints for table `candidate_docs`
--
ALTER TABLE `candidate_docs`
  ADD CONSTRAINT `c_id` FOREIGN KEY (`c_id`) REFERENCES `candidate` (`c_id`);

--
-- Constraints for table `election_schedule`
--
ALTER TABLE `election_schedule`
  ADD CONSTRAINT `e_id` FOREIGN KEY (`e_id`) REFERENCES `election` (`e_id`),
  ADD CONSTRAINT `election_schedule_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `seat` (`s_id`);

--
-- Constraints for table `seat`
--
ALTER TABLE `seat`
  ADD CONSTRAINT `city_id` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`);

--
-- Constraints for table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `s_id` FOREIGN KEY (`s_id`) REFERENCES `seat` (`s_id`),
  ADD CONSTRAINT `v_id` FOREIGN KEY (`v_id`) REFERENCES `voter` (`v_id`),
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `candidate` (`c_id`);

--
-- Constraints for table `voter`
--
ALTER TABLE `voter`
  ADD CONSTRAINT `voter_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `seat` (`s_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
