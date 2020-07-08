-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 08, 2020 at 01:32 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `wmsez`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `AssetID` int(11) NOT NULL,
  `AssetCode` varchar(255) DEFAULT NULL,
  `AssetName` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Manufacturer` varchar(255) DEFAULT NULL,
  `Model` int(255) DEFAULT NULL,
  `VendorName` varchar(255) DEFAULT NULL,
  `Location` varchar(11) DEFAULT NULL,
  `Category` varchar(255) DEFAULT NULL,
  `StockCount` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`AssetID`, `AssetCode`, `AssetName`, `Description`, `Manufacturer`, `Model`, `VendorName`, `Location`, `Category`, `StockCount`) VALUES
(1, 'OMF-L1-CB', 'Conduit Bender', 'The GREENLEE® conduit bender combo, is referred to as triple nickel', 'Greenlee / Textron', NULL, 'Amazon', NULL, 'Conduit Bender', 5);

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `PartsID` int(11) NOT NULL,
  `PartsName` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ItemNumber` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `SKUNo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `QTYInHand` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Category` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ManufacturingDate` date DEFAULT NULL,
  `ExpiryDate` date DEFAULT NULL,
  `Model` varchar(255) DEFAULT NULL,
  `Manufacturer` varchar(255) DEFAULT NULL,
  `VendorName` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `CostPrice` int(11) DEFAULT NULL,
  `SellingPrice` int(11) DEFAULT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`PartsID`, `PartsName`, `ItemNumber`, `SKUNo`, `Description`, `QTYInHand`, `Category`, `ManufacturingDate`, `ExpiryDate`, `Model`, `Manufacturer`, `VendorName`, `CostPrice`, `SellingPrice`, `CreatedBy`, `CreatedOn`) VALUES
(1, 'Oil filter ', '11428575211', NULL, 'Oil filter', '5', 'Rare Stock', NULL, NULL, '325D MSPT LED HUD', 'BMW', NULL, NULL, NULL, 1, '2020-07-08 13:29:45'),
(2, 'Air Filter ', '13718511668', NULL, 'Air Filter', '6', 'Rare Stock', NULL, NULL, '325D MSPT LED HUD', 'BMW', NULL, NULL, NULL, 1, '2020-07-08 13:29:48'),
(3, 'Fuel Filter ', '13328572522', NULL, 'Fuel Filter', '7', 'Rare Stock', NULL, NULL, '325D MSPT LED HUD', 'BMW', NULL, NULL, NULL, 1, '2020-07-08 13:29:51'),
(4, 'Automatic Transmission Fluid', 'AA00601304', NULL, 'Automatic Transmission Fluid', NULL, 'Rare Stock', NULL, NULL, '325D MSPT LED HUD', 'BMW', NULL, NULL, NULL, 1, '2020-06-30 04:18:57'),
(5, 'Diffential Oil', '83222295532', NULL, 'Diffential Oil', NULL, 'Rare Stock', NULL, NULL, '325D MSPT LED HUD', 'BMW', NULL, NULL, NULL, 1, '2020-06-30 04:19:00'),
(6, 'Brake Fluid', 'Dot 4', NULL, 'Brake Fluid', NULL, 'Rare Stock', NULL, NULL, '325D MSPT LED HUD', 'BMW', NULL, NULL, NULL, 1, '2020-06-30 04:19:03'),
(7, 'Radiator Coolant ', '83512355290', NULL, 'Radiator Coolant', NULL, 'Rare Stock', NULL, NULL, '325D MSPT LED HUD', 'BMW', NULL, NULL, NULL, 1, '2020-06-30 04:19:07'),
(8, 'Air Filter ', '13718511668', NULL, 'Air Filter', NULL, 'Normal Stock', NULL, NULL, '325D MSPT LED HUD', 'BMW', NULL, NULL, NULL, 1, '2020-07-06 05:20:53'),
(9, 'Diffential Oil', '83222295532', NULL, 'Diffential Oil', NULL, 'High Value Stock', NULL, NULL, '325D MSPT LED HUD', 'BMW', NULL, NULL, NULL, 1, '2020-07-06 05:20:58'),
(10, 'Diffential Oil', '83222295532', NULL, 'Diffential Oil', NULL, 'High Runner Stock', NULL, NULL, '325D MSPT LED HUD', 'BMW', NULL, NULL, NULL, 1, '2020-07-06 05:21:03'),
(11, 'Meta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-08 08:41:11'),
(12, 'Meta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-08 08:50:24'),
(13, 'Meta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-08 09:00:36'),
(14, 'Meta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-08 09:06:43'),
(15, 'Meta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-08 09:17:37'),
(16, 'Meta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-08 09:23:51'),
(17, 'Meta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-08 09:24:57');

-- --------------------------------------------------------

--
-- Table structure for table `Product_Request_List`
--

CREATE TABLE `Product_Request_List` (
  `RequestId` int(11) NOT NULL,
  `RequestFormNo` varchar(255) NOT NULL,
  `VehicleNo` varchar(255) NOT NULL,
  `PartsList` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `QTYRequested` varchar(255) DEFAULT NULL,
  `PartsRequestedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `PartsIssueDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Model` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'Not Delivered',
  `Active` int(11) NOT NULL DEFAULT '1',
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Product_Request_List`
--

INSERT INTO `Product_Request_List` (`RequestId`, `RequestFormNo`, `VehicleNo`, `PartsList`, `Description`, `QTYRequested`, `PartsRequestedDate`, `PartsIssueDate`, `Model`, `Status`, `Active`, `CreatedBy`, `CreatedOn`) VALUES
(1, 'FORM00001', 'XXXXXX', '900600,1693314A', '', '', '2020-07-07 16:00:00', '2020-07-08 03:50:58', '', 'Not Delivered', 1, 1, '2020-07-08 03:50:58'),
(2, '', 'test vehicle', '11428575211,13718511668', '', '', '2020-07-07 16:00:00', '2020-07-08 03:53:37', 'car', 'Not Delivered', 1, 0, '2020-07-08 03:53:37'),
(3, '', 'test vehicle', '11428575211,13718511668', '', '', '2020-07-07 16:00:00', '2020-07-08 03:53:42', 'car', 'Not Delivered', 1, 0, '2020-07-08 03:53:42'),
(4, '', '', '', '', '', '2020-07-07 16:00:00', '2020-07-08 03:53:47', '', 'Not Delivered', 1, 0, '2020-07-08 03:53:47'),
(5, '', '', '', '', '', '2020-07-07 16:00:00', '2020-07-08 03:53:51', '', 'Not Delivered', 1, 0, '2020-07-08 03:53:51'),
(6, 'FORM20200006', 'SGP 123', '11428575211,13718511668,13328572522,AA00601304', '', '', '2020-07-08 04:18:25', NULL, 'BMW', 'Not Delivered', 1, 0, '2020-07-08 04:18:25'),
(7, 'FORM20200007', '12345', '11428575211,AA00601304,83222295532', '', '', '2020-07-08 05:12:46', NULL, 'APS', 'Not Delivered', 1, 0, '2020-07-08 05:12:46');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorders`
--

CREATE TABLE `purchaseorders` (
  `PurchaseOrderID` int(11) NOT NULL,
  `PurchaseOrderNumber` int(255) NOT NULL,
  `PartsNo` int(11) DEFAULT NULL,
  `RequestedQTY` int(11) DEFAULT NULL,
  `UnitPrice` int(255) DEFAULT NULL,
  `SupplierName` int(11) DEFAULT NULL,
  `EstimatedDateOfDelivery` date DEFAULT NULL,
  `ReceivedDate` date DEFAULT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Quotes`
--

CREATE TABLE `Quotes` (
  `QuoteId` int(11) NOT NULL,
  `QuoteNumber` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `QuoteExpiryDate` date NOT NULL,
  `PartNumber` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `UnitPrice` int(11) NOT NULL,
  `Discount` int(11) NOT NULL,
  `TaxRate` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Quotes`
--

INSERT INTO `Quotes` (`QuoteId`, `QuoteNumber`, `Date`, `QuoteExpiryDate`, `PartNumber`, `Quantity`, `UnitPrice`, `Discount`, `TaxRate`, `Amount`, `Status`, `CreatedBy`, `CreatedOn`) VALUES
(1, 'QuoteEZ1', '2020-06-22', '2020-06-25', '900600', 2, 100, 5, 0, 190, 'Open', 1, '2020-06-22 01:18:19');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `SupplierID` int(11) NOT NULL,
  `SupplierName` varchar(255) DEFAULT NULL,
  `EmailAdress` varchar(255) DEFAULT NULL,
  `PhoneNumber` int(255) DEFAULT NULL,
  `WebsiteName` varchar(255) DEFAULT NULL,
  `Country` varchar(255) DEFAULT NULL,
  `BusinessType` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`SupplierID`, `SupplierName`, `EmailAdress`, `PhoneNumber`, `WebsiteName`, `Country`, `BusinessType`) VALUES
(1, 'Amazon', NULL, 12345678, 'Amazon.com.sg', 'Singapore', 'Service Provider'),
(2, 'XXXX', 'XXXXX@gmail.com', 1234567, 'xxxxxx.com', 'Singapore', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `EmailAddress1` varchar(255) CHARACTER SET utf8 NOT NULL,
  `EmailAddress2` varchar(255) CHARACTER SET utf8 NOT NULL,
  `PhoneNumber` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Password` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Role` enum('1','2','3') CHARACTER SET utf8 NOT NULL COMMENT '	1-Admin, 2-Company',
  `CompanyName` varchar(255) NOT NULL,
  `CompanyAddress` varchar(255) NOT NULL,
  `Active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `EmailAddress1`, `EmailAddress2`, `PhoneNumber`, `Password`, `Role`, `CompanyName`, `CompanyAddress`, `Active`) VALUES
(1, 'Lakshmi', 'lakshmi.t2510@gmai.com', '', '123345678', '12345', '1', '', '', 1),
(2, 'Lakshmi T', 'lakshimi@team-ez.com', 'lakshimi@team-ez.com', '93384472', '234567', '1', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `workorders`
--

CREATE TABLE `workorders` (
  `ID` int(11) NOT NULL,
  `Code` varchar(255) NOT NULL,
  `Priority` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `AssetCode` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `PartsID` int(11) DEFAULT NULL,
  `AssignedUsers` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Status` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `WorkType` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `CompletedByUsers` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `EstimatedHours` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `SpentHours` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `SummaryIssue` varchar(255) DEFAULT NULL,
  `RequestedCompletionDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workorders`
--

INSERT INTO `workorders` (`ID`, `Code`, `Priority`, `AssetCode`, `PartsID`, `AssignedUsers`, `Status`, `WorkType`, `CompletedByUsers`, `EstimatedHours`, `SpentHours`, `SummaryIssue`, `RequestedCompletionDate`) VALUES
(1, '5007734', 'High', 'OMF-L1-CB', 1, 'Technician test', 'Open', 'Repair test', 'Technician', '4', '3', 'Fill Oil', NULL),
(3, '5007735', 'Medium', 'OMF-L1-CB test1', 1, 'Technician test1', 'Close', 'Repair test1', 'Technician test1', '4', '3', 'Fill Oil', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`AssetID`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`PartsID`);

--
-- Indexes for table `Product_Request_List`
--
ALTER TABLE `Product_Request_List`
  ADD PRIMARY KEY (`RequestId`);

--
-- Indexes for table `purchaseorders`
--
ALTER TABLE `purchaseorders`
  ADD PRIMARY KEY (`PurchaseOrderID`);

--
-- Indexes for table `Quotes`
--
ALTER TABLE `Quotes`
  ADD PRIMARY KEY (`QuoteId`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`SupplierID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `workorders`
--
ALTER TABLE `workorders`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `AssetCode` (`ID`,`AssetCode`),
  ADD KEY `PartsId` (`ID`,`PartsID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `AssetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `PartsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `Product_Request_List`
--
ALTER TABLE `Product_Request_List`
  MODIFY `RequestId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchaseorders`
--
ALTER TABLE `purchaseorders`
  MODIFY `PurchaseOrderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Quotes`
--
ALTER TABLE `Quotes`
  MODIFY `QuoteId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `SupplierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `workorders`
--
ALTER TABLE `workorders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
