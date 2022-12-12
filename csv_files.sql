-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2022 at 02:09 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csv_files`
--

-- --------------------------------------------------------

--
-- Table structure for table `not_inserted_students_details`
--

CREATE TABLE `not_inserted_students_details` (
  `ID` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `mobile_number` bigint(20) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students_details`
--

CREATE TABLE `students_details` (
  `ID` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `mobile_number` bigint(20) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students_details`
--

INSERT INTO `students_details` (`ID`, `user_name`, `mobile_number`, `gender`, `city`, `email`, `user_status`) VALUES
(325, 'Robinson Rajiv', 6787898767, 'Male', 'Trichy', 'rickmathews2@gmail.com', 'Active'),
(326, 'vincy', 9878675678, 'Vincy', 'Jone', 'ibots.robin@gmail.com', 'Active'),
(327, 'tim_lee', 6723456789, 'Tim', 'Lee', 'robin@gmail.com', 'Active'),
(328, 'jane', 6578987678, 'Jane', 'Ferro', 'robinson@gmail.com', 'Active'),
(329, 'Santhosh', 9878675645, 'Male', 'Sivaganga', 'santhoshcse@gmail.com', 'Active'),
(330, 'Arjun', 6787898787, 'Male', 'Kanyakumari', 'arjun@gmail.com', 'Active'),
(331, 'Undertaker', 6778987867, 'Male', 'Trichy', 'undertaker@gmail.com', 'Active'),
(332, 'Goldberg', 6787678987, 'Male', 'America', 'goldberg@gmail.com', 'Active'),
(333, 'Rick Mathews', 9878654345, 'Male', 'Trichy', 'robins@gmail.com', 'Active'),
(334, 'Raja Lakshmi', 8987675678, 'Female', 'Tirunelveli', 'lakshmi@gmail.com', 'Active'),
(335, 'Parkavi', 9867453456, 'Female', 'Chennai', 'parkavi@gmail.com', 'Active'),
(336, 'Robins', 6789789890, 'Male', 'Chennai', 'robinsed@gmail.com', 'Active'),
(337, 'suresh', 6567878987, 'Male', 'Chennai', 'suresh@gmail.com', 'Active'),
(338, 'Maniraj', 9876765678, 'Male', 'Chennai', 'manirajworld@gmail.com', 'Active'),
(339, 'raju', 7876787678, 'Male', 'Trichy', 'mightyraju@gmail.com', 'Active'),
(340, 'Rajamanickam', 8989786567, 'Male', 'Trichy', 'rajamanickam@gmail.com', 'Active'),
(341, 'Mark hendry', 9878678987, 'Male', 'America', 'markhendry@gmail.com', 'Active'),
(342, 'Murugan', 7876787678, 'Male', 'Trichy', 'murugan@gmail.com', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `not_inserted_students_details`
--
ALTER TABLE `not_inserted_students_details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `students_details`
--
ALTER TABLE `students_details`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `not_inserted_students_details`
--
ALTER TABLE `not_inserted_students_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students_details`
--
ALTER TABLE `students_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=343;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
