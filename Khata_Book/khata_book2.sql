-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2024 at 04:26 PM
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
-- Database: `khata_book`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_balance`
--

CREATE TABLE `user_balance` (
  `BalanceID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Balance` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_balance`
--

INSERT INTO `user_balance` (`BalanceID`, `UserID`, `Balance`) VALUES
(1, 3, 1700.00);

-- --------------------------------------------------------

--
-- Table structure for table `user_contacts`
--

CREATE TABLE `user_contacts` (
  `ContactID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_contacts`
--

INSERT INTO `user_contacts` (`ContactID`, `UserID`, `Phone`) VALUES
(2, 3, '9305089318');

-- --------------------------------------------------------

--
-- Table structure for table `user_credits`
--

CREATE TABLE `user_credits` (
  `id` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `transaction_type` varchar(2) NOT NULL,
  `source` varchar(255) NOT NULL,
  `transaction_time` datetime DEFAULT current_timestamp(),
  `remark` text DEFAULT NULL,
  `updated_balance` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_credits`
--

INSERT INTO `user_credits` (`id`, `UserID`, `amount`, `transaction_type`, `source`, `transaction_time`, `remark`, `updated_balance`) VALUES
(1, 3, 200.00, 'C', 'Other', '2024-11-28 10:01:18', '200', 200.00),
(2, 3, 500.00, 'C', 'Refund', '2024-12-01 20:43:52', '', 1700.00),
(3, 3, 200.00, 'C', 'Other', '2024-11-28 10:02:39', '200', 600.00),
(4, 3, 500.00, 'C', 'Other', '2024-11-28 10:06:05', '400', 1100.00),
(5, 3, 200.00, 'D', 'Medical bills', '2024-12-01 14:21:25', 'Mummy Medicine', 900.00),
(6, 3, 500.00, 'C', 'Salary', '2024-12-01 15:05:04', 'salary', 1400.00);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `UserID` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `RegisteredOn` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`UserID`, `FirstName`, `LastName`, `RegisteredOn`) VALUES
(3, 'Atul', 'Verma', '2024-11-28 09:52:19');

-- --------------------------------------------------------

--
-- Table structure for table `user_emails`
--

CREATE TABLE `user_emails` (
  `EmailID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_emails`
--

INSERT INTO `user_emails` (`EmailID`, `UserID`, `Email`) VALUES
(3, 3, 'atul800498@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_passwords`
--

CREATE TABLE `user_passwords` (
  `PasswordID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Password_Hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_passwords`
--

INSERT INTO `user_passwords` (`PasswordID`, `UserID`, `Password_Hash`) VALUES
(2, 3, '$2y$10$nGlQ0QU3zLtXK/5z.LSoY.OB9TK0EICYGIR4UdCIJaN..QmalRL5a');

-- --------------------------------------------------------

--
-- Table structure for table `user_photos`
--

CREATE TABLE `user_photos` (
  `PhotoID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `PhotoName` varchar(255) NOT NULL,
  `Path` varchar(255) NOT NULL,
  `UploadTime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_balance`
--
ALTER TABLE `user_balance`
  ADD PRIMARY KEY (`BalanceID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `user_contacts`
--
ALTER TABLE `user_contacts`
  ADD PRIMARY KEY (`ContactID`),
  ADD UNIQUE KEY `Phone` (`Phone`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `user_credits`
--
ALTER TABLE `user_credits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `user_emails`
--
ALTER TABLE `user_emails`
  ADD PRIMARY KEY (`EmailID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `user_passwords`
--
ALTER TABLE `user_passwords`
  ADD PRIMARY KEY (`PasswordID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `user_photos`
--
ALTER TABLE `user_photos`
  ADD PRIMARY KEY (`PhotoID`),
  ADD KEY `UserID` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_balance`
--
ALTER TABLE `user_balance`
  MODIFY `BalanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_contacts`
--
ALTER TABLE `user_contacts`
  MODIFY `ContactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_credits`
--
ALTER TABLE `user_credits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_emails`
--
ALTER TABLE `user_emails`
  MODIFY `EmailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_passwords`
--
ALTER TABLE `user_passwords`
  MODIFY `PasswordID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_photos`
--
ALTER TABLE `user_photos`
  MODIFY `PhotoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_balance`
--
ALTER TABLE `user_balance`
  ADD CONSTRAINT `user_balance_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user_details` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `user_contacts`
--
ALTER TABLE `user_contacts`
  ADD CONSTRAINT `user_contacts_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user_details` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `user_credits`
--
ALTER TABLE `user_credits`
  ADD CONSTRAINT `user_credits_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user_details` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `user_emails`
--
ALTER TABLE `user_emails`
  ADD CONSTRAINT `user_emails_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user_details` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `user_passwords`
--
ALTER TABLE `user_passwords`
  ADD CONSTRAINT `user_passwords_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user_details` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `user_photos`
--
ALTER TABLE `user_photos`
  ADD CONSTRAINT `user_photos_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user_details` (`UserID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
