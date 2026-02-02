-- phpMyAdmin SQL Dump
-- version 5.2.3-1.el10_2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 02, 2026 at 03:42 AM
-- Server version: 10.11.15-MariaDB
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `np03cs4a240186`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `password`, `created_at`) VALUES
(2, 'admin', '$2y$10$YzYEyo9yeWy3T0L5s7IgjebtXwhwj5BjsXk25q/mkF5gYlDgJ2pPC', '2026-01-30 11:10:40');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `patient_id`, `doctor_id`, `appointment_date`, `start_time`, `end_time`) VALUES
(33, 3, 3, '2026-02-01', '09:00:00', '09:30:00'),
(34, 4, 4, '2026-02-01', '10:00:00', '10:30:00'),
(35, 5, 5, '2026-02-02', '11:00:00', '11:30:00'),
(36, 6, 6, '2026-02-02', '14:00:00', '14:30:00'),
(37, 7, 7, '2026-02-03', '09:30:00', '10:00:00'),
(38, 3, 4, '2026-02-03', '15:00:00', '15:30:00'),
(39, 4, 5, '2026-02-04', '10:00:00', '10:30:00'),
(40, 5, 6, '2026-02-06', '09:00:00', '09:30:00'),
(41, 6, 7, '2026-02-06', '11:00:00', '11:30:00'),
(42, 7, 3, '2026-02-07', '14:00:00', '14:30:00'),
(43, 3, 4, '2026-02-07', '16:00:00', '16:30:00'),
(44, 4, 5, '2026-02-08', '09:00:00', '09:30:00'),
(45, 5, 6, '2026-02-08', '10:30:00', '11:00:00'),
(46, 6, 7, '2026-02-09', '13:00:00', '13:30:00'),
(47, 7, 3, '2026-02-10', '15:00:00', '15:30:00'),
(48, 3, 3, '2026-02-01', '20:48:00', '21:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `specialization` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `name`, `specialization`, `email`, `phone`, `created_at`) VALUES
(3, 'Dr. John Smith', 'Cardiologist', 'john.smith@clinic.com', '9801234501', '2026-01-30 14:54:18'),
(4, 'Dr. Sarah Johnson', 'Dermatologist', 'sarah.johnson@clinic.com', '9801234502', '2026-01-30 14:54:18'),
(5, 'Dr. Michael Brown', 'Neurologist', 'michael.brown@clinic.com', '9801234503', '2026-01-30 14:54:18'),
(6, 'Dr. Emily Davis', 'Pediatrician', 'emily.davis@clinic.com', '9801234504', '2026-01-30 14:54:18'),
(7, 'Dr. Robert Wilson', 'Orthopedic', 'robert.wilson@clinic.com', '9801234505', '2026-01-30 14:54:18'),
(8, 'Dr. Jennifer Taylor', 'Gynecologist', 'jennifer.taylor@clinic.com', '9801234506', '2026-01-30 14:54:18'),
(9, 'Dr. David Martinez', 'ENT Specialist', 'david.martinez@clinic.com', '9801234507', '2026-01-30 14:54:18'),
(10, 'Dr. Lisa Anderson', 'Psychiatrist', 'lisa.anderson@clinic.com', '9801234508', '2026-01-30 14:54:18'),
(11, 'Dr. James Thomas', 'Urologist', 'james.thomas@clinic.com', '9801234509', '2026-01-30 14:54:18'),
(12, 'Dr. Amanda White', 'Ophthalmologist', 'amanda.white@clinic.com', '9801234510', '2026-01-30 14:54:18'),
(13, 'Dr. Christopher Lee', 'General Physician', 'christopher.lee@clinic.com', '9801234511', '2026-01-30 14:54:18'),
(14, 'Dr. Jessica Harris', 'Dentist', 'jessica.harris@clinic.com', '9801234512', '2026-01-30 14:54:18'),
(15, 'Dr. Daniel Clark', 'Pulmonologist', 'daniel.clark@clinic.com', '9801234513', '2026-01-30 14:54:18'),
(16, 'Dr. Michelle Lewis', 'Endocrinologist', 'michelle.lewis@clinic.com', '9801234514', '2026-01-30 14:54:18'),
(17, 'Dr. Kevin Walker', 'Gastroenterologist', 'kevin.walker@clinic.com', '9801234515', '2026-01-30 14:54:18');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `name`, `email`, `phone`, `password`, `created_at`) VALUES
(3, 'Ram Sharma', 'ram.sharma@email.com', '9811111101', '$2y$10$YUZPsG0pmPWEJVHCV5NQDeK.ur5pPFKDa2kMpn3ZB.y93oVWBk2vu', '2026-01-30 14:56:19'),
(4, 'Sita Thapa', 'sita.thapa@email.com', '9811111102', '$2y$10$YUZPsG0pmPWEJVHCV5NQDeK.ur5pPFKDa2kMpn3ZB.y93oVWBk2vu', '2026-01-30 14:56:19'),
(5, 'Hari Prasad', 'hari.prasad@email.com', '9811111103', '$2y$10$YUZPsG0pmPWEJVHCV5NQDeK.ur5pPFKDa2kMpn3ZB.y93oVWBk2vu', '2026-01-30 14:56:19'),
(6, 'Gita Rana', 'gita.rana@email.com', '9811111104', '$2y$10$YUZPsG0pmPWEJVHCV5NQDeK.ur5pPFKDa2kMpn3ZB.y93oVWBk2vu', '2026-01-30 14:56:19'),
(7, 'Krishna Bhandari', 'krishna.bhandari@email.com', '9811111105', '$2y$10$YUZPsG0pmPWEJVHCV5NQDeK.ur5pPFKDa2kMpn3ZB.y93oVWBk2vu', '2026-01-30 14:56:19'),
(8, 'Laxmi Shrestha', 'laxmi.shrestha@email.com', '9811111106', '$2y$10$YUZPsG0pmPWEJVHCV5NQDeK.ur5pPFKDa2kMpn3ZB.y93oVWBk2vu', '2026-01-30 14:56:19'),
(9, 'Bishnu Gurung', 'bishnu.gurung@email.com', '9811111107', '$2y$10$YUZPsG0pmPWEJVHCV5NQDeK.ur5pPFKDa2kMpn3ZB.y93oVWBk2vu', '2026-01-30 14:56:19'),
(10, 'Maya Tamang', 'maya.tamang@email.com', '9811111108', '$2y$10$YUZPsG0pmPWEJVHCV5NQDeK.ur5pPFKDa2kMpn3ZB.y93oVWBk2vu', '2026-01-30 14:56:19'),
(11, 'Suresh Karki', 'suresh.karki@email.com', '9811111109', '$2y$10$YUZPsG0pmPWEJVHCV5NQDeK.ur5pPFKDa2kMpn3ZB.y93oVWBk2vu', '2026-01-30 14:56:19'),
(12, 'Anita Magar', 'anita.magar@email.com', '9811111110', '$2y$10$YUZPsG0pmPWEJVHCV5NQDeK.ur5pPFKDa2kMpn3ZB.y93oVWBk2vu', '2026-01-30 14:56:19'),
(13, 'Rajesh Adhikari', 'rajesh.adhikari@email.com', '9811111111', '$2y$10$YUZPsG0pmPWEJVHCV5NQDeK.ur5pPFKDa2kMpn3ZB.y93oVWBk2vu', '2026-01-30 14:56:19'),
(14, 'Sunita Limbu', 'sunita.limbu@email.com', '9811111112', '$2y$10$YUZPsG0pmPWEJVHCV5NQDeK.ur5pPFKDa2kMpn3ZB.y93oVWBk2vu', '2026-01-30 14:56:19'),
(15, 'Prakash Dahal', 'prakash.dahal@email.com', '9811111113', '$2y$10$YUZPsG0pmPWEJVHCV5NQDeK.ur5pPFKDa2kMpn3ZB.y93oVWBk2vu', '2026-01-30 14:56:19'),
(16, 'Kamala Bhattarai', 'kamala.bhattarai@email.com', '9811111114', '$2y$10$YUZPsG0pmPWEJVHCV5NQDeK.ur5pPFKDa2kMpn3ZB.y93oVWBk2vu', '2026-01-30 14:56:19'),
(17, 'Deepak Poudel', 'deepak.poudel@email.com', '9811111115', '$2y$10$YUZPsG0pmPWEJVHCV5NQDeK.ur5pPFKDa2kMpn3ZB.y93oVWBk2vu', '2026-01-30 14:56:19');


--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;


--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
