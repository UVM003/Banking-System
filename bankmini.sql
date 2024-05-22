-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2024 at 02:36 PM
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
-- Database: `bankmini`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `acc_no` int(10) NOT NULL,
  `cus_id` int(5) NOT NULL,
  `type` varchar(10) NOT NULL,
  `balance` int(10) NOT NULL,
  `branch_no` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acc_no`, `cus_id`, `type`, `balance`, `branch_no`) VALUES
(100098, 301, 'RD', 56666, 1),
(1000543, 307, 'SB', 50000, 1),
(1000645, 301, 'FD', 600000, 1),
(1000678, 301, 'SB', 67000, 1),
(1000892, 456, 'RD', 4566, 2),
(1000918, 302, 'CA', 5000, 1),
(1000928, 302, 'Rd', 45000, 1),
(1000978, 302, 'SB', 7666, 1),
(1006822, 303, 'FD', 40066, 2),
(10000432, 303, 'SB', 9877, 2),
(10000632, 456, 'SB', 4566, 2),
(100098877, 301, 'RD', 56666, 1),
(1000988776, 301, 'FD', 75000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_no` int(4) NOT NULL,
  `branch_name` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_no`, `branch_name`, `address`) VALUES
(1, 'Vijayanagar', 'Banglore'),
(2, 'Channasandra', 'Banglore'),
(3, 'Srinivasanagar', 'Banglore');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(5) NOT NULL,
  `cus_name` varchar(20) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `DOB` date DEFAULT NULL,
  `occupation` varchar(20) NOT NULL,
  `Aadhar no` varchar(12) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `address` varchar(10) NOT NULL,
  `mobileno` varchar(10) NOT NULL,
  `branch_no` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_name`, `gender`, `DOB`, `occupation`, `Aadhar no`, `Email`, `address`, `mobileno`, `branch_no`) VALUES
(301, 'Srivatsa', 'Male', '2003-09-01', 'Student', '654712349126', 'srivatsareddy@gmail.com', 'nagarabavi', '1545678326', 1),
(302, 'Swathi', 'Female', '1992-06-21', 'Doctor', '654829129845', 'swathi992@gmail.com', 'attiguppe', '1345678326', 1),
(303, 'Nagaswachandha', 'Female', '1996-12-06', 'Lawyer', '765432893456', 'Nagaswachandha96@gmail.com', 'vijayanaga', '7657775555', 2),
(307, 'prerana', 'female', '2003-09-01', 'student', '123454326789', 'preranab@gmail.com', 'rr nagar', '8976543210', 1),
(456, 'pranathi', 'female', '2003-09-29', 'student', '123454326789', 'pranathi@', 'srinivasap', '7654327865', 2);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(5) NOT NULL,
  `emp_name` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `mobileno` varchar(10) NOT NULL,
  `salary` int(10) NOT NULL,
  `branch_no` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `address`, `mobileno`, `salary`, `branch_no`) VALUES
(201, 'Srimathi', 'vijayanagar', '1545678326', 45000, 1),
(202, 'Vyjayanthi KS', 'rr nagar', '7654323451', 35000, 2),
(456, 'Rajesh', 'Banshankari', '4567892301', 56000, 2),
(9877, 'Vyjayanthi KS', 'srinivasapura', '7654323456', 35000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `loan_id` int(5) NOT NULL,
  `amount` int(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `loan_tenure` varchar(20) NOT NULL,
  `approval` varchar(10) NOT NULL,
  `branch_no` int(4) NOT NULL,
  `cus_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`loan_id`, `amount`, `type`, `loan_tenure`, `approval`, `branch_no`, `cus_id`) VALUES
(706, 800000, 'Car', '72 months', 'approved', 1, 302),
(710, 7665, 'Personal', '60 months', 'approved', 1, 307),
(711, 7665, 'Personal', '12 months', 'approved', 1, 303),
(718, 1234567, 'Lorry', '68 months', 'approved', 1, 301),
(719, 765545444, 'Marriage', '89 months', 'approved', 1, 301),
(723, 37800, 'student', '89months', 'pending', 1, 301),
(724, 500000, 'student', '89months', 'pending', 1, 301);

--
-- Triggers `loan`
--
DELIMITER $$
CREATE TRIGGER `before_loan_insert` BEFORE INSERT ON `loan` FOR EACH ROW BEGIN
        IF NEW.type = "student" AND NEW.amount > 500000 THEN
            SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Error: Student loan amount cannot exceed 500,000.";
        END IF;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(12) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `username`, `password`, `type`) VALUES
(101, 'vasudeva', '654321', 'manager'),
(102, 'dev', 'dev123', 'manager'),
(201, 'srimathi', '123456', 'employee'),
(202, 'viji', '0', 'employee'),
(301, 'srivatsa003', '654321', 'customer'),
(302, 'Swathi@123', '321456', 'customer'),
(303, 'Naga006', '67890', 'customer'),
(307, 'prerana001', 'preu2003', 'customer'),
(456, 'pranathi', '2345', 'customer'),
(9877, 'manu', '45678', 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `mgr_id` int(5) NOT NULL,
  `branch_no` int(4) NOT NULL,
  `mgr_name` varchar(20) NOT NULL,
  `mobileno` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`mgr_id`, `branch_no`, `mgr_name`, `mobileno`) VALUES
(101, 1, 'Vasudeva', '1234567890'),
(102, 2, 'Devendra', '7421567684');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acc_no`),
  ADD KEY `branch_no` (`branch_no`),
  ADD KEY `cus_id` (`cus_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_no`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`),
  ADD KEY `branch_no` (`branch_no`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `branch_no` (`branch_no`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`loan_id`),
  ADD KEY `branch_no` (`branch_no`),
  ADD KEY `cus_id` (`cus_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`mgr_id`),
  ADD KEY `branch_no` (`branch_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `loan_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=725;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`branch_no`) REFERENCES `branch` (`branch_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `account_ibfk_2` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`branch_no`) REFERENCES `branch` (`branch_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`branch_no`) REFERENCES `branch` (`branch_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loan`
--
ALTER TABLE `loan`
  ADD CONSTRAINT `loan_ibfk_1` FOREIGN KEY (`branch_no`) REFERENCES `branch` (`branch_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loan_ibfk_2` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`branch_no`) REFERENCES `branch` (`branch_no`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
