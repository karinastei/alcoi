-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 31, 2023 at 03:14 PM
-- Server version: 10.3.39-MariaDB
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `steinbergkarina_alcoi`
--

-- --------------------------------------------------------

--
-- Table structure for table `Company`
--

CREATE TABLE `Company` (
  `Company_id` int(50) NOT NULL,
  `CIFNIF` varchar(50) NOT NULL,
  `Codigo_primario_CNAE_2009` int(50) NOT NULL,
  `Literal_codigo_CNAE_2009_primario` varchar(50) NOT NULL,
  `Codigos_primario_IAE` int(50) NOT NULL,
  `Literal_primario_IAE` varchar(50) NOT NULL,
  `CompanyPublic_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Company`
--

INSERT INTO `Company` (`Company_id`, `CIFNIF`, `Codigo_primario_CNAE_2009`, `Literal_codigo_CNAE_2009_primario`, `Codigos_primario_IAE`, `Literal_primario_IAE`, `CompanyPublic_id`) VALUES
(2, 'Test4', 4444, 'Testike4', 44444, 'testeroni4', 1),
(3, '657689', 3645, 'Text', 8769, 'Text', 2),
(4, 'j5678', 6789, 'asdpoiytrsdfgfd', 3456, 'asdpoiytrsdfgfd', 3),
(5, 'y7777', 77777, 'codigo', 777777, 'primario', 4),
(6, 'N765432', 12345, 'newLiteral_codigo_CNAE_2009_primario', 156789, 'newLiteral_primario_IAE', 6),
(7, '8989', 89, 'Uus firma', 89, 'Uus firma', 7),
(8, '1', 1, 'k', 4, 'k', 8),
(9, '1', 1, 'k', 4, 'k', 9),
(10, '4', 4, 'd', 4, 'd', 10),
(11, '4', 4, 'd', 4, 'd', 11),
(12, '5', 5, 'ok', 5, 'ok', 12),
(13, '5', 5, 'ok', 5, 'ok', 13),
(14, '5', 5, 'ok', 5, 'ok', 14),
(15, '1', 1, 'qw', 1, 'qw', 15),
(16, '67', 54, 'k', 98, 'o', 16),
(17, '999', 999, 'Text', 999, 'Text', 17),
(18, '678', 678, 'text', 890, 'Text', 19),
(19, '8942', 983, 'lllll', 879, 'lll', 20);

-- --------------------------------------------------------

--
-- Table structure for table `CompanyProjects`
--

CREATE TABLE `CompanyProjects` (
  `Project_id` int(50) NOT NULL,
  `Company_id` int(50) NOT NULL,
  `Relationship_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `CompanyProjects`
--

INSERT INTO `CompanyProjects` (`Project_id`, `Company_id`, `Relationship_id`) VALUES
(1, 2, 1),
(2, 4, 2),
(2, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `CompanyPublic`
--

CREATE TABLE `CompanyPublic` (
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `Address` varchar(200) NOT NULL,
  `House_number` int(60) NOT NULL,
  `Zipcode` varchar(200) DEFAULT NULL,
  `Province` varchar(100) DEFAULT NULL,
  `Municipality` varchar(100) NOT NULL,
  `Location` varchar(200) NOT NULL,
  `Company_name` varchar(100) NOT NULL,
  `Founded` varchar(100) DEFAULT NULL,
  `General_sector` enum('Comerç','Hosteleria','Servicis de proximitat','Servicis a PYMES','Professionals','Industria') NOT NULL,
  `Specific_sector` varchar(100) NOT NULL,
  `Road` enum('Carrer','Plaça','Avinguda','Polígon','Carretera','Passeig','Placeta','Edifici','Camí') NOT NULL,
  `Accessible` tinyint(1) NOT NULL,
  `Opening_hours` varchar(500) DEFAULT NULL,
  `Parking` tinyint(1) DEFAULT NULL,
  `WiFi` tinyint(1) DEFAULT NULL,
  `Distribution` enum('Delivery','Self-pickup','No delivery') DEFAULT NULL,
  `Webstore` tinyint(1) DEFAULT NULL,
  `Product_name` varchar(500) DEFAULT NULL,
  `CompanyPublic_id` int(50) NOT NULL,
  `Picture_1` varchar(500) DEFAULT NULL,
  `Picture_2` varchar(500) DEFAULT NULL,
  `Deleted` tinyint(1) NOT NULL DEFAULT 0,
  `Deletion_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `CompanyPublic`
--

INSERT INTO `CompanyPublic` (`Email`, `Phone`, `Address`, `House_number`, `Zipcode`, `Province`, `Municipality`, `Location`, `Company_name`, `Founded`, `General_sector`, `Specific_sector`, `Road`, `Accessible`, `Opening_hours`, `Parking`, `WiFi`, `Distribution`, `Webstore`, `Product_name`, `CompanyPublic_id`, `Picture_1`, `Picture_2`, `Deleted`, `Deletion_time`) VALUES
('Test3', '3333', 'Test3', 333, '333', 'Test3', 'Test3', '333', 'Test3', '3333', 'Professionals', 'Test3', 'Avinguda', 0, 'Test3', 0, 1, 'No delivery', 0, 'Test3', 1, 'Company1Picture1', 'Company1Picture2', 1, NULL),
('testmail@gmail.com', '578657657', 'Teststreename 88B', 6, '5476475', 'Alicante/Alacant', 'Alcoy/Alcoi', '7676,-98987', 'Testercomp', NULL, 'Servicis a PYMES', 'testing', 'Carrer', 1, 'Monday:8.00-14.00 18.00-20.00;\r\nTuesday:8.00-14.00 18.00-20.00;\r\nWednesday:8.00-14.00 18.00-20.00;\r\nThursday:8.00-14.00 18.00-20.00;\r\nFriday:8.00-14.00 18.00-20.00;\r\nSaturday:10.00-16.00;\r\nSunday:Cerrado', 0, 1, 'Self-pickup', 0, 'Tester', 2, 'Company2Picture1', 'Company2Picture2', 1, NULL),
('uiyiuyh@gmail.com', '56789422', 'Tamme 27', 6, '345678', 'Alicante/Alacant', 'Albaida', '567.900,-65.076', 'Company A', '2006', 'Professionals', 'Nottesting', 'Placeta', 1, 'T:10.00-14.00', 0, 0, 'No delivery', 1, 'ok', 3, 'Company3Picture1', 'Company3Picture2', 0, NULL),
('email@gmail.com', '777777', 'Company', 777, '77777', 'Province', 'Municipality', '77.0522,-777.2437', 'Company B', '19777', 'Industria', 'Test', 'Carrer', 0, '19', 0, 0, 'Delivery', 0, 'productname', 4, 'Company4Picture1', 'Company4Picture2', 0, NULL),
('newEmail', 'newPhone', 'Address', 100, 'newZipcode', 'newProvince', 'newMunicipality', 'newLocation', 'Company C', 'newFounded', 'Professionals', 'newSpecific Sector', 'Passeig', 1, 'newOpening Hours', 1, 1, 'No delivery', 1, 'newProduct Name', 6, 'Company5Picture1', 'Company5Picture2', 0, NULL),
('Uusfirma@gmail.com', '89', 'Uus firma', 898, '898', 'Uus firma', 'Uus firma', '89', 'Company D', '89', 'Hosteleria', 'Uus firma', 'Avinguda', 1, '89', 1, 1, 'Self-pickup', 1, 'Uus firma', 7, 'Company6Picture1', 'Company6Picture2', 0, NULL),
('k@gmail.com', '4', 'g', 1, 'newZipcode', 'newProvince', 'Uus firma', '4', 'Company E', '1977', 'Servicis a PYMES', 'newtest', 'Carrer', 1, '0', 1, 1, 'Self-pickup', 1, 'k', 8, 'Company7Picture1', 'Company7Picture2', 0, NULL),
('k@gmail.com', '4', 'g', 1, 'newZipcode', 'newProvince', 'Uus firma', '4', 'g', '1977', 'Servicis a PYMES', 'newtest', 'Carrer', 1, '0', 1, 1, 'Self-pickup', 1, 'k', 9, 'Company7Picture1', 'Company7Picture2', 1, NULL),
('d@gmail.com', '4', 'Address F', 4, '4', 'd', 'd', '4', 'Company F', '4', 'Industria', 'd', 'Carrer', 1, '1', 1, 1, 'Self-pickup', 1, 'd', 10, 'Company2Picture1', 'Company1Picture2', 0, NULL),
('d@gmail.com', '4', 'd', 4, '4', 'd', 'd', '4', 'd', '4', 'Industria', 'd', 'Carrer', 1, '1', 1, 1, 'Self-pickup', 1, 'd', 11, 'Company2Picture1', 'Company1Picture2', 1, NULL),
('ok', '5', 'ok', 5, '5', 'ok', 'ok', '1', 'Company G', '5', 'Servicis a PYMES', 'ok', 'Avinguda', 1, '1', 1, 1, 'No delivery', 1, 'ok', 12, 'Company8Picture1', 'Company8Picture2', 0, NULL),
('ok', '5', 'ok', 5, '5', 'ok', 'ok', '1', 'Company H', '5', 'Servicis a PYMES', 'ok', 'Avinguda', 1, '1', 1, 1, 'No delivery', 1, 'ok', 13, 'Company8Picture1', 'Company8Picture2', 0, NULL),
('ok', '5', 'ok', 5, '5', 'ok', 'ok', '1', 'ok', '5', 'Servicis a PYMES', 'ok', 'Avinguda', 1, '1', 1, 1, 'No delivery', 1, 'ok', 14, 'Company8Picture1', 'Company8Picture2', 1, NULL),
('qw@gmail.com', '1', '1', 1, '1', 'qw', 'qw', '1', 'Company I', '1', 'Professionals', 'qw', 'Placeta', 1, '1', 1, 1, 'No delivery', 1, 'qw', 15, 'Company6Picture1', 'Company6Picture2', 0, NULL),
('k@gmail.com', '78', 'p', 6, '67', 'o', 'k', '67', 'Company J', '56', 'Servicis a PYMES', 'u', 'Placeta', 1, 'Tuesdays 7:00-12:00', 0, 0, 'No delivery', 0, 'ty', 16, 'Company10Picture1', 'Company10Picture2', 0, NULL),
('Text', 'Text', 'a', 9, '9', 'Province', 'Municipality', 'Location', 'Company K1', '999', 'Servicis a PYMES', 'Text', 'Carretera', 0, '999', 1, 1, 'Self-pickup', 1, 'Text', 17, 'Company5Picture1', 'Company5Picture2', 1, NULL),
('Text', '789', 'Text', 777, '777', 'Text', 'Text', '989', 'TestAdd', '789', 'Industria', 'Text', 'Edifici', 0, '6789', 0, 1, 'No delivery', 0, 'jkjk', 18, 'Company8Picture1', 'Company8Picture2', 0, NULL),
('Text', '789', 'Text', 777, '777', 'Text', 'Text', '989', 'Company L', '789', 'Industria', 'Text', 'Edifici', 0, '6789', 0, 1, 'No delivery', 0, 'jkjk', 19, 'Company8Picture1', 'Company8Picture2', 1, NULL),
('email l', '874', 'Address L', 8, '8', 'province L', 'Munc L', 'Loc L', 'Company L', '8743', 'Professionals', 'sect l', 'Carretera', 1, '9', 1, 1, 'No delivery', 1, 'product l', 20, 'Company9Picture1', 'Company9Picture2', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `CompanyWorkers`
--

CREATE TABLE `CompanyWorkers` (
  `Relationship_id` int(50) NOT NULL,
  `Company_id` int(50) NOT NULL,
  `CompanyPublic_id` int(50) NOT NULL,
  `Worker_id` int(50) NOT NULL,
  `Role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `CompanyWorkers`
--

INSERT INTO `CompanyWorkers` (`Relationship_id`, `Company_id`, `CompanyPublic_id`, `Worker_id`, `Role`) VALUES
(1, 2, 0, 1, 'CEO'),
(2, 2, 0, 3, 'm'),
(3, 3, 0, 4, ''),
(4, 3, 0, 1, ''),
(5, 4, 0, 2, ''),
(6, 4, 0, 3, 'u');

-- --------------------------------------------------------

--
-- Table structure for table `Events`
--

CREATE TABLE `Events` (
  `Event_id` int(50) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `Place` varchar(200) DEFAULT NULL,
  `Start_date` datetime DEFAULT NULL,
  `End_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Events`
--

INSERT INTO `Events` (`Event_id`, `Name`, `Description`, `Place`, `Start_date`, `End_date`) VALUES
(1, 'TestEvent', 'This event was about testing the database.', 'Townhall', '2023-05-16 08:47:43', '2023-05-16 23:55:43'),
(2, 'Coolgathering', 'The goal was to gather.', 'Local restaurant \"Restaurant name\".', '2023-05-17 12:11:26', '2023-05-18 12:14:30'),
(3, 'Event', 'Event where people hung out.', 'The street', '2023-05-07 12:55:16', '2023-05-17 12:55:16');

-- --------------------------------------------------------

--
-- Table structure for table `Event_attendance`
--

CREATE TABLE `Event_attendance` (
  `Attendance_id` int(50) NOT NULL,
  `Worker_id` int(50) NOT NULL,
  `Event_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Event_attendance`
--

INSERT INTO `Event_attendance` (`Attendance_id`, `Worker_id`, `Event_id`) VALUES
(1, 1, 1),
(2, 3, 3),
(3, 2, 3),
(4, 1, 1),
(5, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Projects`
--

CREATE TABLE `Projects` (
  `Project_id` int(50) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Start_date` datetime DEFAULT NULL,
  `End_date` datetime DEFAULT NULL,
  `Project_description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Projects`
--

INSERT INTO `Projects` (`Project_id`, `Name`, `Start_date`, `End_date`, `Project_description`) VALUES
(1, 'TestProject', '2023-05-01 14:49:36', '2023-05-16 14:49:36', 'This project focused on testing the database.'),
(2, 'Testprojecto', '2023-05-21 12:12:37', '2023-05-31 12:12:37', 'Imoportant'),
(3, 'VeryLongProject', '2020-08-01 12:55:54', '2023-05-31 12:55:54', 'A very big project.');

-- --------------------------------------------------------

--
-- Table structure for table `Workers`
--

CREATE TABLE `Workers` (
  `Worker_id` int(50) NOT NULL,
  `First_name` varchar(200) NOT NULL,
  `Last_name` varchar(200) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Workers`
--

INSERT INTO `Workers` (`Worker_id`, `First_name`, `Last_name`, `Email`, `Phone`) VALUES
(1, 'Tom', 'Wind', 'tomster@gmail.com', '5123456'),
(2, 'Peeter', 'Tõrvik', 'Peetermomeeter@gmail.com', '+7657987987'),
(3, 'Maiu', 'Tamm', 'maita@gmail.com', '6565465768'),
(4, 'Siim', 'Riim', 'siimar@gmail.com', '57678989');

-- --------------------------------------------------------

--
-- Table structure for table `WorkersProjects`
--

CREATE TABLE `WorkersProjects` (
  `Relationship_id` int(50) NOT NULL,
  `Worker_id` int(50) NOT NULL,
  `Project_id` int(50) NOT NULL,
  `Role_in_project` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `WorkersProjects`
--

INSERT INTO `WorkersProjects` (`Relationship_id`, `Worker_id`, `Project_id`, `Role_in_project`) VALUES
(1, 1, 1, 'Leader'),
(2, 1, 2, 'Technical lead'),
(3, 3, 1, 'Observer'),
(4, 4, 3, 'Backend developer'),
(5, 4, 1, 'Entertainment (told jokes)'),
(6, 4, 2, 'Designer'),
(7, 2, 3, 'Secretary'),
(8, 2, 1, 'Big idea man');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Company`
--
ALTER TABLE `Company`
  ADD PRIMARY KEY (`Company_id`),
  ADD KEY `CompanyPublic_id` (`CompanyPublic_id`);

--
-- Indexes for table `CompanyProjects`
--
ALTER TABLE `CompanyProjects`
  ADD PRIMARY KEY (`Relationship_id`),
  ADD KEY `Company_id` (`Company_id`),
  ADD KEY `Project_id` (`Project_id`);

--
-- Indexes for table `CompanyPublic`
--
ALTER TABLE `CompanyPublic`
  ADD PRIMARY KEY (`CompanyPublic_id`) USING BTREE;

--
-- Indexes for table `CompanyWorkers`
--
ALTER TABLE `CompanyWorkers`
  ADD PRIMARY KEY (`Relationship_id`),
  ADD KEY `Company_id` (`Company_id`),
  ADD KEY `Worker_id` (`Worker_id`),
  ADD KEY `CompanyPublic_id` (`CompanyPublic_id`);

--
-- Indexes for table `Events`
--
ALTER TABLE `Events`
  ADD PRIMARY KEY (`Event_id`);

--
-- Indexes for table `Event_attendance`
--
ALTER TABLE `Event_attendance`
  ADD PRIMARY KEY (`Attendance_id`),
  ADD KEY `Worker_id` (`Worker_id`),
  ADD KEY `Event_id` (`Event_id`);

--
-- Indexes for table `Projects`
--
ALTER TABLE `Projects`
  ADD PRIMARY KEY (`Project_id`);

--
-- Indexes for table `Workers`
--
ALTER TABLE `Workers`
  ADD PRIMARY KEY (`Worker_id`);

--
-- Indexes for table `WorkersProjects`
--
ALTER TABLE `WorkersProjects`
  ADD PRIMARY KEY (`Relationship_id`),
  ADD KEY `Worker_id` (`Worker_id`),
  ADD KEY `Project_id` (`Project_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Company`
--
ALTER TABLE `Company`
  MODIFY `Company_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `CompanyProjects`
--
ALTER TABLE `CompanyProjects`
  MODIFY `Relationship_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `CompanyPublic`
--
ALTER TABLE `CompanyPublic`
  MODIFY `CompanyPublic_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `CompanyWorkers`
--
ALTER TABLE `CompanyWorkers`
  MODIFY `Relationship_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Events`
--
ALTER TABLE `Events`
  MODIFY `Event_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Event_attendance`
--
ALTER TABLE `Event_attendance`
  MODIFY `Attendance_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Projects`
--
ALTER TABLE `Projects`
  MODIFY `Project_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Workers`
--
ALTER TABLE `Workers`
  MODIFY `Worker_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `WorkersProjects`
--
ALTER TABLE `WorkersProjects`
  MODIFY `Relationship_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Company`
--
ALTER TABLE `Company`
  ADD CONSTRAINT `Company_ibfk_1` FOREIGN KEY (`CompanyPublic_id`) REFERENCES `CompanyPublic` (`CompanyPublic_id`);

--
-- Constraints for table `CompanyProjects`
--
ALTER TABLE `CompanyProjects`
  ADD CONSTRAINT `CompanyProjects_ibfk_1` FOREIGN KEY (`Company_id`) REFERENCES `Company` (`Company_id`),
  ADD CONSTRAINT `CompanyProjects_ibfk_2` FOREIGN KEY (`Project_id`) REFERENCES `Projects` (`Project_id`);

--
-- Constraints for table `CompanyWorkers`
--
ALTER TABLE `CompanyWorkers`
  ADD CONSTRAINT `CompanyWorkers_ibfk_1` FOREIGN KEY (`Company_id`) REFERENCES `Company` (`Company_id`),
  ADD CONSTRAINT `CompanyWorkers_ibfk_2` FOREIGN KEY (`Worker_id`) REFERENCES `Workers` (`Worker_id`);

--
-- Constraints for table `Event_attendance`
--
ALTER TABLE `Event_attendance`
  ADD CONSTRAINT `Event_attendance_ibfk_1` FOREIGN KEY (`Event_id`) REFERENCES `Events` (`Event_id`),
  ADD CONSTRAINT `Event_attendance_ibfk_2` FOREIGN KEY (`Worker_id`) REFERENCES `Workers` (`Worker_id`);

--
-- Constraints for table `WorkersProjects`
--
ALTER TABLE `WorkersProjects`
  ADD CONSTRAINT `WorkersProjects_ibfk_1` FOREIGN KEY (`Worker_id`) REFERENCES `Workers` (`Worker_id`),
  ADD CONSTRAINT `WorkersProjects_ibfk_2` FOREIGN KEY (`Project_id`) REFERENCES `Projects` (`Project_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
