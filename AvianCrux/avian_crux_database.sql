-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2021 at 11:19 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `avian_crux_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `customerpurchaselist`
--

CREATE TABLE `customerpurchaselist` (
  `PurchaseID` int(11) NOT NULL,
  `UserEmail` varchar(30) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `PurchaseDate` date DEFAULT NULL,
  `DeliveryDate` date DEFAULT NULL,
  `ManagerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customerpurchaselist`
--

INSERT INTO `customerpurchaselist` (`PurchaseID`, `UserEmail`, `Quantity`, `ProductID`, `Status`, `PurchaseDate`, `DeliveryDate`, `ManagerID`) VALUES
(1, 'customer2@mail.com', 2, 1, 'Delivered', '2021-08-03', '2021-08-04', 1),
(2, 'customer2@mail.com', 4, 2, 'Delivered', '2021-07-15', '2021-08-04', 1),
(3, 'customer2@mail.com', 7, 1, 'Delivered', '2021-07-08', '2021-08-04', 1),
(4, 'customer2@mail.com', 3, 4, 'Delivered', '2021-07-15', '2021-08-06', 1),
(5, 'customer2@mail.com', 5, 5, 'Completed', '2021-07-15', NULL, 1),
(10, 'goodcustomer@mail.com', 2, 2, 'Uncomplete', '2021-08-05', NULL, NULL),
(11, 'goodcustomer@mail.com', 3, 3, 'Uncomplete', '2021-08-05', NULL, NULL),
(12, 'goodcustomer@mail.com', 17, 1, 'Uncomplete', '2021-08-05', NULL, NULL),
(13, 'goodcustomer@mail.com', 2, 1, 'Uncomplete', '2021-08-05', NULL, NULL),
(14, 'goodcustomer@mail.com', 2, 1, 'Uncomplete', '2021-08-05', NULL, NULL),
(15, 'goodcustomer@mail.com', 2, 1, 'Uncomplete', '2021-08-05', NULL, NULL),
(16, 'goodcustomer@mail.com', 4, 6, 'Uncomplete', '2021-08-05', NULL, NULL),
(17, 'goodcustomer@mail.com', 4, 4, 'Uncomplete', '2021-08-05', NULL, NULL),
(18, 'goodcustomer@mail.com', 2, 6, 'Uncomplete', '2021-08-05', NULL, NULL),
(20, 'goodcustomer@mail.com', 1, 1, 'Uncomplete', '2021-08-06', NULL, NULL),
(21, 'goodcustomer@mail.com', 3, 6, 'Uncomplete', '2021-08-06', NULL, NULL),
(22, 'goodcustomer@mail.com', 4, 8, 'Uncomplete', '2021-08-06', NULL, NULL),
(24, 'goodcustomer@mail.com', 4, 6, 'Uncomplete', '2021-08-06', NULL, NULL),
(25, 'goodcustomer@mail.com', 3, 8, 'Uncomplete', '2021-08-06', NULL, NULL),
(26, 'goodcustomer@mail.com', 1, 8, 'Uncomplete', '2021-08-06', NULL, NULL),
(27, 'goodcustomer@mail.com', 1, 1, 'Uncomplete', '2021-08-06', NULL, NULL),
(28, 'sss', 2, 1, 'Uncomplete', '2021-08-06', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feedbacklist`
--

CREATE TABLE `feedbacklist` (
  `FeedbackID` int(11) NOT NULL,
  `UserEmail` varchar(30) NOT NULL,
  `FeedbackContent` varchar(255) DEFAULT NULL,
  `FeedbackReply` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedbacklist`
--

INSERT INTO `feedbacklist` (`FeedbackID`, `UserEmail`, `FeedbackContent`, `FeedbackReply`) VALUES
(1, 'ceisenberg4@cbc.ca', 'Good! I hope the stuff is cheap', NULL),
(2, 'customer2@mail.com', 'I like the earphone', 'Same'),
(3, 'samuelLYM@mail.com', 'Can I have free discount on the cat earphone', 'No!'),
(4, 'goodcustomer@mail.com', NULL, NULL),
(15, 'sss', 'ok, thank you', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `managerpermission`
--

CREATE TABLE `managerpermission` (
  `ManagerID` int(11) NOT NULL,
  `UserEmail` varchar(30) NOT NULL,
  `UpdateProduct` int(1) NOT NULL,
  `UpdatePurchaseList` int(1) NOT NULL,
  `UpdateCompletedPurchaseList` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `managerpermission`
--

INSERT INTO `managerpermission` (`ManagerID`, `UserEmail`, `UpdateProduct`, `UpdatePurchaseList`, `UpdateCompletedPurchaseList`) VALUES
(1, 'managertest', 1, 1, 1),
(2, 'managertest2', 0, 1, 1),
(6, 'managertest3', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `productlist`
--

CREATE TABLE `productlist` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `ProductDescription` varchar(255) NOT NULL,
  `ProductCategory` varchar(255) NOT NULL,
  `ProductStock` int(11) NOT NULL,
  `ProductCost` decimal(10,2) NOT NULL,
  `ProductPrice` decimal(10,2) NOT NULL,
  `ProductPicture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productlist`
--

INSERT INTO `productlist` (`ProductID`, `ProductName`, `ProductDescription`, `ProductCategory`, `ProductStock`, `ProductCost`, `ProductPrice`, `ProductPicture`) VALUES
(1, 'Cat Ear Phone', 'Super Cute cat earphones', 'Earphone', 16, '120.00', '160.00', 'catearphone.jpg'),
(2, 'Gaming laptop Asus Op', 'A super OP laptop by Asus', 'Laptop', 11, '2600.00', '3150.00', 'laptop01.jpg'),
(3, 'Laptop for Work HP', 'Fast and simple laptop by HP company for working around', 'Laptop', 7, '1700.00', '2400.00', 'laptop02.jpg'),
(4, 'Pink Cute powerbank', 'A cheap yet good powerbank', 'PowerBank', 36, '20.00', '30.00', 'powerbank01.jpg'),
(5, 'Survivor Black PowerBank', 'A power bank Designed for outdoor activity! WATER PROVE! SAND PROVE!', 'Powerbank', 20, '200.00', '280.00', 'survivor04.jpg'),
(6, 'Xiao mi dual Earphone', 'Comfortable Earphone by Xiao Mi', 'Earphone', 7, '100.00', '150.00', 'Xiaomindual.jpg'),
(7, 'Flat Cool Power Bank', 'A flat power bank that you can bring outdoor in your pocket, easy to bring. And Cheap', 'PowerBank', 17, '35.00', '55.00', 'powerflat02.png'),
(8, 'Power Line Plus', 'Power Line Plus! The best charging cable of all time, fast changing.', 'Cables', 47, '20.00', '30.00', 'powerlineplus.jpg'),
(9, 'Camera Ver 01', 'And new digital series Camera version 1!', 'Camera', 40, '500.00', '800.00', 'camera.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `productratinglist`
--

CREATE TABLE `productratinglist` (
  `RatingID` int(11) NOT NULL,
  `UserEmail` varchar(30) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `RatingScore` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productratinglist`
--

INSERT INTO `productratinglist` (`RatingID`, `UserEmail`, `ProductID`, `RatingScore`) VALUES
(1, 'goodcustomer@mail.com', 6, 5),
(2, 'goodcustomer@mail.com', 1, 3),
(3, 'ceisenberg4@cbc.ca', 1, 4),
(4, 'sss', 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `updatelist`
--

CREATE TABLE `updatelist` (
  `UpdateID` int(11) NOT NULL,
  `UserEmail` varchar(30) NOT NULL,
  `UpdateType` varchar(20) NOT NULL,
  `UpdateDate` date NOT NULL,
  `UpdatedListName` varchar(50) DEFAULT NULL,
  `UpdatedListColumn` varchar(50) DEFAULT NULL,
  `StatusBeforeUpdate` varchar(255) DEFAULT NULL,
  `StatusAfterUpdate` varchar(255) DEFAULT NULL,
  `UpdateComments` varchar(255) DEFAULT NULL,
  `PurchaseID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `updatelist`
--

INSERT INTO `updatelist` (`UpdateID`, `UserEmail`, `UpdateType`, `UpdateDate`, `UpdatedListName`, `UpdatedListColumn`, `StatusBeforeUpdate`, `StatusAfterUpdate`, `UpdateComments`, `PurchaseID`) VALUES
(77, 'managertest', 'Deliver CP', '2021-08-04', 'CustomerPurchaseList', 'Status', 'Completed', 'Delivered', 'No Comments', 1),
(78, 'managertest', 'Deliver CP', '2021-08-04', 'CustomerPurchaseList', 'Status', 'Completed', 'Delivered', 'No Comments', 2),
(79, 'managertest', 'Deliver CP', '2021-08-04', 'CustomerPurchaseList', 'Status', 'Completed', 'Delivered', 'No Comments', 3),
(80, 'managertest', 'Deliver CP', '2021-08-04', 'CustomerPurchaseList', 'Status', 'Completed', 'Delivered', 'No Comments', 4),
(81, 'managertest2', 'Add new Product', '2021-08-04', 'ProductList', 'ProductPicture', NULL, 'camera.jpeg', '', NULL),
(82, 'managertest2', 'Add new Product', '2021-08-04', 'ProductList', 'ProductCategory', NULL, 'Camera', '', NULL),
(83, 'managertest2', 'Add new Product', '2021-08-04', 'ProductList', 'ProductDescription', NULL, 'And new digital series Camera version 1!', '', NULL),
(84, 'managertest2', 'Add new Product', '2021-08-04', 'ProductList', 'ProductName', NULL, 'Camera Ver 01', '', NULL),
(85, 'managertest2', 'Add new Product', '2021-08-04', 'ProductList', 'ProductCost', NULL, '500', '', NULL),
(86, 'managertest2', 'Add new Product', '2021-08-04', 'ProductList', 'ProductPrice', NULL, '800', '', NULL),
(87, 'managertest', 'Complete CP', '2021-08-06', 'CustomerPurchaseList', 'Status', 'Uncomplete', 'Completed', 'doing normal task', 5),
(88, 'managertest', 'Deliver CP', '2021-08-06', 'CustomerPurchaseList', 'Status', 'Completed', 'Delivered', 'ssssss', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserEmail` varchar(30) NOT NULL,
  `UserFullName` varchar(100) DEFAULT NULL,
  `UserPassword` varchar(30) NOT NULL,
  `UserType` char(20) NOT NULL,
  `UserAddress` varchar(255) DEFAULT NULL,
  `UserCardNum` varchar(19) DEFAULT NULL,
  `UserCardSerial` varchar(4) DEFAULT NULL,
  `UserCardExpiredDate` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserEmail`, `UserFullName`, `UserPassword`, `UserType`, `UserAddress`, `UserCardNum`, `UserCardSerial`, `UserCardExpiredDate`) VALUES
('admintest', 'True Admin', 'iamtheadmin', 'Admin', NULL, NULL, NULL, NULL),
('ceisenberg4@cbc.ca', 'customer sam act i hate', '234242342432', 'Customer', 'arbweweertmjiuiyoohjhjgjgh', '243234423423442432', '333', '4243'),
('customer2@mail.com', 'Tee Wei Huan', 'iamgoodcustomer2', 'Customer', 'room20 street XXX, Road number 5, 40000 ,Kuala Lumpur', '123131566468', '777', '07/29'),
('goodcustomer@mail.com', 'Sam Samuel See Shey', 'iamgoodcustomer1', 'Customer', 'Jalan satu, Bukit Jalil 101 , 44444,Kuala Lumpur.', '88880000888800', '332', '01/22'),
('managertest', 'Manager sir!', 'iamthemanager', 'Manager', NULL, NULL, NULL, NULL),
('managertest2', NULL, 'iambadmanager', 'Manager', NULL, NULL, NULL, NULL),
('managertest3', NULL, 'superbadmanager', 'Manager', NULL, NULL, NULL, NULL),
('samuelLYM@mail.com', 'Samuel Lee Yee Mee', '1234567890', 'Customer', 'taman here seksyen 0 jalan th 2/55 Puchong Selangor', '2222888899990000', '222', '09/29'),
('sss', 'wwww', 'wadasadadsada', 'Customer', 'gg-agg road 999 idk what garden', '000000000000000', '233', '09/88');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customerpurchaselist`
--
ALTER TABLE `customerpurchaselist`
  ADD PRIMARY KEY (`PurchaseID`),
  ADD KEY `Make Purchase` (`UserEmail`),
  ADD KEY `Responsible for` (`ManagerID`),
  ADD KEY `Brought In` (`ProductID`);

--
-- Indexes for table `feedbacklist`
--
ALTER TABLE `feedbacklist`
  ADD PRIMARY KEY (`FeedbackID`),
  ADD KEY `Given` (`UserEmail`);

--
-- Indexes for table `managerpermission`
--
ALTER TABLE `managerpermission`
  ADD PRIMARY KEY (`ManagerID`),
  ADD KEY `Assigned With` (`UserEmail`);

--
-- Indexes for table `productlist`
--
ALTER TABLE `productlist`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `productratinglist`
--
ALTER TABLE `productratinglist`
  ADD PRIMARY KEY (`RatingID`),
  ADD KEY `Rated for` (`ProductID`),
  ADD KEY `Rate` (`UserEmail`);

--
-- Indexes for table `updatelist`
--
ALTER TABLE `updatelist`
  ADD PRIMARY KEY (`UpdateID`),
  ADD KEY `Generates` (`UserEmail`),
  ADD KEY `Reference For` (`PurchaseID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customerpurchaselist`
--
ALTER TABLE `customerpurchaselist`
  MODIFY `PurchaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `feedbacklist`
--
ALTER TABLE `feedbacklist`
  MODIFY `FeedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `managerpermission`
--
ALTER TABLE `managerpermission`
  MODIFY `ManagerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `productlist`
--
ALTER TABLE `productlist`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `productratinglist`
--
ALTER TABLE `productratinglist`
  MODIFY `RatingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `updatelist`
--
ALTER TABLE `updatelist`
  MODIFY `UpdateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
