-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:9000
-- Generation Time: Dec 08, 2021 at 08:47 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rap`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `Bill_No` int(11) NOT NULL,
  `Order_No` int(11) NOT NULL,
  `Email_Id` varchar(35) NOT NULL,
  `Bill_Date` date NOT NULL DEFAULT current_timestamp(),
  `V_Charges` decimal(10,2) NOT NULL,
  `F_Charges` decimal(10,2) NOT NULL,
  `Total` decimal(10,2) NOT NULL,
  `Tax` decimal(10,2) NOT NULL,
  `Final` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`Bill_No`, `Order_No`, `Email_Id`, `Bill_Date`, `V_Charges`, `F_Charges`, `Total`, `Tax`, `Final`) VALUES
(4458, 1103, 'atul@gmail.com', '2021-09-23', '1000000.00', '840000.00', '1840000.00', '368000.00', '2208000.00'),
(4506, 1101, 'jatin@gmail.com', '2021-11-21', '1000000.00', '842400.00', '1842400.00', '368480.00', '2210880.00'),
(4548, 1102, 'rohit@gmail.com', '2021-10-26', '800000.00', '543000.00', '1343000.00', '268600.00', '1611600.00');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `D_Id` varchar(5) NOT NULL,
  `D_Name` varchar(20) NOT NULL,
  `EmailAddress` varchar(35) NOT NULL,
  `Staff_Count` int(11) NOT NULL,
  `Category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`D_Id`, `D_Name`, `EmailAddress`, `Staff_Count`, `Category`) VALUES
('D01', 'RAP_WorkForce', '', 5, 'Attendant'),
('D02', 'RAP_Gourmet', '', 10, 'Caterer_Cook'),
('D03', 'RAP_Hosters', '', 30, 'Caterer_Server'),
('D04', 'RAP_Floral', '', 8, 'Flower Decorator'),
('D05', 'RAP_Cluster', '', 15, 'Seating_Planers');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `Event_code` int(11) NOT NULL,
  `Event_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`Event_code`, `Event_type`) VALUES
(1000, 'Birthday'),
(1001, 'Wedding'),
(1002, 'Shower'),
(1003, 'Conference'),
(1004, 'Seminar'),
(1005, 'Workshop'),
(1006, 'Sponsorship'),
(1007, 'Trade show'),
(1008, 'Networking event '),
(1009, 'Guest speaker');

-- --------------------------------------------------------

--
-- Table structure for table `expenditure`
--

CREATE TABLE `expenditure` (
  `Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `D_Id` varchar(5) NOT NULL,
  `Detail` varchar(50) NOT NULL,
  `Amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expenditure`
--

INSERT INTO `expenditure` (`Date`, `D_Id`, `Detail`, `Amount`) VALUES
('2021-06-24 20:59:17', 'D03', 'Cuttlery', '12750.00'),
('2021-07-25 05:02:43', 'D04', 'Flowers', '11500.00'),
('2021-07-25 03:50:05', 'D04', 'Ribbons', '2500.00'),
('2021-08-25 06:30:01', 'D02', 'Rice', '19050.00'),
('2021-08-24 20:59:27', 'D05', 'Table Clothes', '12750.00'),
('2021-09-25 02:21:01', 'D04', 'Thread', '800.00'),
('2021-10-25 03:09:05', 'D05', 'Table', '13000.00'),
('2021-10-25 09:29:57', 'D02', 'Vegetables', '8000.00'),
('2021-11-25 11:49:46', 'D05', 'Chairs', '15500.00'),
('2021-12-25 18:19:32', 'D03', 'Plates', '10065.00');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Email_Id` varchar(35) NOT NULL,
  `Message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Email_Id`, `Message`) VALUES
('shadab@gmail.com', 'the staff was really great and was doing the work nicely '),
('atul@gmail.com', 'I cant thank R-A-P enough the make my sons birthday great'),
('shweta@gmail.com', 'I couldnt go any better place to celebrate '),
('rohit@gmail.com', 'Everything was so perfect'),
('jatin@gmail.com', 'I was too tense for my daughters wedding but they made everything smooth'),
('tushar@gmail.com', 'a great massive respect for RAP team '),
('yukta@gmail.com', 'the staff was doing every thing so nicely, I thought its there sons birthday ');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `User_Id` varchar(35) NOT NULL,
  `EmailAddress` varchar(35) NOT NULL,
  `Password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`User_Id`, `EmailAddress`, `Password`) VALUES
('abhi9560', 'abhi@gmail.com', '9700000001'),
('atul0607', 'atul@gmail.com', '9700000005'),
('jatin487', 'jatin@gmail.com', '9700000008'),
('reaha866', 'riha@gmail.com', '9700000003'),
('rohit482', 'rohit@gmail.com', '9700000007'),
('shadab123', 'shadab@gmail.com', '9700000004'),
('shweta48', 'shweta@gmail.com', '9700000006'),
('tushar012', 'tushar@gmail.com', '9700000009'),
('yukta102', 'yukta@gmail.com', '9700000010'),
('zyx789', 'priyanka@gmail.com', '9700000002');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `M_Id` varchar(5) NOT NULL,
  `Category` varchar(30) NOT NULL,
  `Descp` varchar(50) NOT NULL,
  `Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`M_Id`, `Category`, `Descp`, `Price`) VALUES
('M101', 'main course', 'Paneer Pasanda', '250.00'),
('M102', 'main course', 'Dal Bukhara', '200.00'),
('M103', 'main course', 'Zafrani Pulao', '250.00'),
('M104', 'starter', 'Indo-Chinese', '150.00'),
('M105', 'starter', 'Dahi Bhalle', '100.00'),
('M106', 'bevarage', 'Cold Drinks', '40.00'),
('M107', 'starter', 'Aloo ki tikki', '70.00'),
('M108', 'starter', 'Litti Chokha', '150.00'),
('M109', 'sweet dish', 'Chocolate Fondue', '100.00'),
('M110', 'starter', 'Pasta Primavera', '120.00'),
('M111', 'apetizer', 'Salad', '320.00');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `EmailAddress` varchar(35) NOT NULL,
  `Message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`EmailAddress`, `Message`) VALUES
('rohit@gmail.com', 'Can you provide me the detailed information about the venue \"Radisson Blu Hotel\"?\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `my_orders`
--

CREATE TABLE `my_orders` (
  `Order_No` int(11) NOT NULL,
  `Email_Id` varchar(35) NOT NULL,
  `ODate` date NOT NULL DEFAULT current_timestamp(),
  `Budget` decimal(10,2) NOT NULL,
  `EDate` date NOT NULL,
  `NEvent` varchar(20) NOT NULL,
  `Guests` int(11) NOT NULL,
  `Venue` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `my_orders`
--

INSERT INTO `my_orders` (`Order_No`, `Email_Id`, `ODate`, `Budget`, `EDate`, `NEvent`, `Guests`, `Venue`) VALUES
(1101, 'jatin@gmail.com', '2021-11-20', '3000000.00', '2021-11-30', 'Workshop', 156, 'Radisson Blu Hotel'),
(1102, 'rohit@gmail.com', '2021-10-12', '2000000.00', '2021-10-29', 'Networking event', 220, 'Royale Farmhouse'),
(1103, 'atul@gmail.com', '2021-09-22', '2500000.00', '2021-09-21', 'BIRTHDAY', 350, 'OWL Club');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Username` varchar(35) NOT NULL,
  `Date_from` date NOT NULL,
  `Date_to` date NOT NULL,
  `EventCode` int(11) NOT NULL,
  `VenueCode` varchar(5) NOT NULL,
  `FoodCharges` decimal(10,2) NOT NULL,
  `Budget` decimal(10,2) NOT NULL,
  `Guests` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Username`, `Date_from`, `Date_to`, `EventCode`, `VenueCode`, `FoodCharges`, `Budget`, `Guests`) VALUES
('atul0607', '2021-09-21', '2021-09-21', 1000, 'V08', '840000.00', '2500000.00', 350),
('jatin487', '2021-11-30', '2021-12-04', 1005, 'V01', '842400.00', '3000000.00', 156),
('rohit482', '2021-10-29', '2021-10-29', 1008, 'V05', '543000.00', '2000000.00', 220);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `User_Id` varchar(35) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Fname` varchar(30) NOT NULL,
  `Lname` varchar(30) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Mobile_No` varchar(20) NOT NULL,
  `Contact_NO` varchar(20) NOT NULL,
  `Email_Id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`User_Id`, `Password`, `Fname`, `Lname`, `Address`, `DOB`, `City`, `State`, `Mobile_No`, `Contact_NO`, `Email_Id`) VALUES
('atul0607', '9700000005', 'ATUL', 'GOYAL', 'H.No. 154, faridkot', '2002-07-06', 'Kotakpura', 'Punjab', '8478596125', '7845961487', 'atul@gmail.com'),
('jatin487', '9700000008', 'JATIN', 'SHARMA', 'H.No. 04, Newtown', '2001-08-25', 'Kolkata', 'West Bengal', '8148965478', '6478931548', 'jatin@gmail.com'),
('rohit482', '9700000003', 'ROHIT', 'SINGH', 'H.No. 487, Jalahalli', '2000-04-21', 'Bangalore', 'Karnataka', '7456321548', '9784561549', 'rohit@gmail.com'),
('shadab123', '9700000004', 'SHADAB', 'AGWAN', 'H.No. 79, Sangam Vihar', '2002-11-20', 'Najafgarh', 'New Delhi', '8457964125', '9784563214', 'shadab@gmail.com'),
('shweta48', '9700000006', 'SHWETA', 'GAHLAWAT', 'H.No. 123, Panchkula', '2001-09-27', 'Panchkula', 'Haryana', '9874589656', '6485794578', 'shweta@gmail.com'),
('yukta102', '9700000010', 'YUKTA', 'RANA', 'H.No. 105, Sector 13', '2001-12-09', 'Dwarka', 'New Delhi', '7145745896', '8453154978', 'yukta@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_payments`
--

CREATE TABLE `supplier_payments` (
  `Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `D_Id` varchar(5) NOT NULL,
  `Amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_payments`
--

INSERT INTO `supplier_payments` (`Date`, `D_Id`, `Amount`) VALUES
('2021-05-15 00:30:00', 'D01', '200000.00'),
('2021-03-22 11:30:00', 'D02', '150000.00'),
('2021-10-11 06:30:00', 'D03', '950000.00'),
('2021-01-31 03:30:00', 'D04', '80000.00'),
('2021-11-27 04:30:00', 'D05', '125000.00');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `V_Id` varchar(5) NOT NULL,
  `V_Name` varchar(100) NOT NULL,
  `Street` varchar(50) NOT NULL,
  `City` varchar(20) NOT NULL,
  `State` varchar(20) NOT NULL,
  `Landmark` varchar(30) NOT NULL,
  `PINCODE` int(11) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `Availability` char(4) NOT NULL,
  `FromDate` date DEFAULT NULL,
  `ToDate` date DEFAULT NULL,
  `Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`V_Id`, `V_Name`, `Street`, `City`, `State`, `Landmark`, `PINCODE`, `Capacity`, `Availability`, `FromDate`, `ToDate`, `Price`) VALUES
('V01', 'Radisson Blu Hotel', 'Naila Bagh Palace', 'Jaipur', 'Rajasthan', 'Moti Doongri', 302007, 1500, 'NO', '2025-11-21', '2027-11-21', '500000.00'),
('V02', 'Hammerzz Nightclub', 'Calangute - Baga Rd', 'Baga', 'Goa', '-', 403516, 2500, 'YES', NULL, NULL, '600000.00'),
('V03', 'Nyex Beach', 'Anjuna Cliff (Old Paradiso)', 'Bardez', 'Goa', '-', 403202, 2500, 'YES', NULL, NULL, '700000.00'),
('V04', 'Sinq Night', 'Aguada Rd', 'Candolim', 'Goa', 'Taj Holiday Village', 403515, 2000, 'NO', '2020-12-21', '2025-12-21', '750000.00'),
('V05', 'Royale Farmhouse', 'Airport Plaza, Plot No.10', 'Jaipur', 'Rajasthan', 'Radisson Blu Hotel', 302018, 2000, 'NO', '2020-11-21', '2023-11-21', '800000.00'),
('V06', 'Camp Himachal', 'Jot Road,Talai Village', 'Chamba', 'Himachal Pradesh', '-', 176310, 1000, 'YES', NULL, NULL, '900000.00'),
('V07', 'Leopard Valley', 'Agonda Beach Rd', 'Canacona', 'Goa', 'Juggernaut Arena', 403702, 2000, 'YES', NULL, NULL, '921000.00'),
('V08', 'OWL Club', 'Shiroli Pulachi', 'Calangute', 'Goa', 'Bagatel Boutique Hotel Goa', 403519, 2500, 'NO', '2012-01-22', '2014-01-22', '1000000.00'),
('V09', 'Shaadi Brigade', 'Block E, Soami Nagar South', 'New Delhi', 'Delhi', '-', 110016, 2000, 'YES', NULL, NULL, '1100000.00'),
('V10', 'NoorZa', 'Saket', 'New Delhi', 'Delhi', '-', 110017, 2500, 'NO', '2020-11-21', '2022-11-21', '1200000.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`Bill_No`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`D_Id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`Event_code`);

--
-- Indexes for table `expenditure`
--
ALTER TABLE `expenditure`
  ADD KEY `FK_D_Id1` (`D_Id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`User_Id`),
  ADD UNIQUE KEY `Unique` (`EmailAddress`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`M_Id`);

--
-- Indexes for table `my_orders`
--
ALTER TABLE `my_orders`
  ADD PRIMARY KEY (`Order_No`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`User_Id`);

--
-- Indexes for table `supplier_payments`
--
ALTER TABLE `supplier_payments`
  ADD KEY `D_Id2` (`D_Id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`V_Id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expenditure`
--
ALTER TABLE `expenditure`
  ADD CONSTRAINT `FK_D_Id1` FOREIGN KEY (`D_Id`) REFERENCES `department` (`D_Id`);

--
-- Constraints for table `supplier_payments`
--
ALTER TABLE `supplier_payments`
  ADD CONSTRAINT `D_Id2` FOREIGN KEY (`D_Id`) REFERENCES `department` (`D_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
