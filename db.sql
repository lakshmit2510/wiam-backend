-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 10, 2020 at 01:06 PM
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
(1, 'Oil filter ', '11428575211', 'ABC', 'Oil filter', '5', 'Rare Stock', '2020-02-05', '2023-03-15', '325D MSPT LED HUD', 'BMW', 'Amezon', 25, 30, 1, '2020-07-08 16:10:58'),
(2, 'Air Filter ', '13718511668', 'cde', 'Air Filter', '6', 'Rare Stock', '2020-02-05', '2021-06-10', '325D MSPT LED HUD', 'BMW', 'Amezon', 30, 35, 1, '2020-07-08 16:10:58'),
(3, 'Fuel Filter ', '13328572522', 'efg', 'Fuel Filter', '7', 'Rare Stock', '2019-08-14', '2021-05-12', '325D MSPT LED HUD', 'BMW', 'Amezon', 35, 40, 1, '2020-07-08 16:10:58'),
(4, 'Automatic Transmission Fluid', 'AA00601304', 'wer', 'Automatic Transmission Fluid', '10', 'Rare Stock', '2019-07-08', '2021-07-16', '325D MSPT LED HUD', 'BMW', 'Amezon', 60, 65, 1, '2020-07-08 16:10:58'),
(5, 'Diffential Oil', '83222295532', 'rty', 'Diffential Oil', '15', 'Rare Stock', '2018-10-10', '2021-08-12', '325D MSPT LED HUD', 'BMW', 'Amezon', 45, 50, 1, '2020-07-08 16:10:58'),
(6, 'Brake Fluid', 'Dot 4', 'dfg', 'Brake Fluid', '20', 'Rare Stock', '2019-12-11', '2022-06-16', '325D MSPT LED HUD', 'BMW', 'xyz', 70, 75, 1, '2020-07-08 16:10:58'),
(7, 'Radiator Coolant ', '83512355290', 'nht', 'Radiator Coolant', '15', 'Rare Stock', '2019-06-11', '2022-03-10', '325D MSPT LED HUD', 'BMW', 'Amezon', 100, 110, 1, '2020-07-08 16:10:58'),
(8, 'Air Filter ', '13718511668', 'dfg', 'Air Filter', '20', 'Normal Stock', '2019-04-24', '2022-05-25', '325D MSPT LED HUD', '', NULL, NULL, NULL, 1, '2020-07-08 16:10:58'),
(9, 'Diffential Oil', '83222295532', NULL, 'Diffential Oil', '30', 'High Value Stock', '2018-01-09', '2023-06-20', '325D MSPT LED HUD', 'BMW', 'xyz', 40, 45, 1, '2020-07-08 17:05:06'),
(10, 'Diffential Oil', '83222295532', NULL, 'Diffential Oil', '10', 'High Runner Stock', '2019-11-09', '2022-06-28', '325D MSPT LED HUD', 'BMW', 'abcd', 60, 65, 1, '2020-07-08 17:08:08'),
(11, 'Meta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-08 08:41:11'),
(12, 'Meta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-08 08:50:24'),
(13, 'Meta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-08 09:00:36'),
(14, 'Meta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-08 09:06:43'),
(15, 'Meta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-08 09:17:37'),
(16, 'Meta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-08 09:23:51'),
(17, 'Meta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-08 09:24:57'),
(18, 'Meta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-08 17:05:38'),
(19, 'Meta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-08 17:08:23'),
(20, NULL, '8888572765884Enter', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-09 03:12:34'),
(21, NULL, 'Meta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-09 03:13:07'),
(22, NULL, '8888572765884Enter', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-09 03:15:45'),
(23, NULL, 'Meta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-09 03:16:47'),
(24, NULL, '8888572765884Enter', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-09 03:18:32'),
(25, NULL, '8888572765884Enter', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-09 03:20:57'),
(26, NULL, '8888572765884', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-09 03:22:51'),
(27, NULL, '8888572765884', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-09 03:23:03'),
(28, NULL, 'Meta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-09 03:23:12'),
(29, NULL, '8888572765884Enter', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-09 03:34:09'),
(30, NULL, '8888572765884Enter', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-09 03:58:33'),
(31, NULL, 'Meta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-09 03:58:42'),
(32, NULL, '8888572765884Enter', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-09 04:02:48'),
(33, NULL, '8888572765884Enter', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-09 04:06:18'),
(34, NULL, '8888572765884Enter', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-09 04:12:55'),
(35, NULL, '8888572765884Enter', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-09 04:14:11'),
(36, NULL, 'Meta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-09 04:43:30'),
(37, NULL, 'Meta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-09 04:43:36'),
(38, NULL, 'Meta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-09 04:44:19');

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
(7, 'FORM20200007', '12345', '11428575211,AA00601304,83222295532', '', '', '2020-07-08 05:12:46', NULL, 'APS', 'Not Delivered', 1, 0, '2020-07-08 05:12:46'),
(8, 'FORM20200008', '', '83222295532,83222295532,13718511668,83512355290,Dot 4,83222295532,AA00601304,13328572522,13718511668,11428575211', '', '1,1,1,1,1,1,1,1,1,1', '2020-07-09 04:15:59', NULL, '', 'Not Delivered', 1, 1, '2020-07-09 04:15:59'),
(9, 'FORM20200009', '', '11428575211,13718511668,13328572522,AA00601304', '', '1,1,1,1', '2020-07-09 04:17:39', NULL, '', 'Not Delivered', 1, 1, '2020-07-09 04:17:39'),
(10, 'FORM20200010', '', '', '', '0', '2020-07-09 04:36:34', NULL, '', 'Not Delivered', 1, 1, '2020-07-09 04:36:34'),
(11, 'FORM20200011', '', '', '', '0', '2020-07-09 04:36:50', NULL, '', 'Not Delivered', 1, 1, '2020-07-09 04:36:50');

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
(2, 'XXXX', 'XXXXX@gmail.com', 1234567, 'xxxxxx.com', 'Singapore', NULL),
(3, 'xyz', 'xyz123@gmail.com', 123456, 'abcd.com', 'Singapore', NULL);

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
-- Table structure for table `vehicle_models`
--

CREATE TABLE `vehicle_models` (
  `ModelId` int(11) NOT NULL,
  `ModelName` varchar(255) NOT NULL,
  `Active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicle_models`
--

INSERT INTO `vehicle_models` (`ModelId`, `ModelName`, `Active`) VALUES
(1, 'APC', 1),
(2, 'BMW 325D', 1),
(3, 'CHEVROLET CRUZE', 1),
(4, 'Ford Jumbo', 1),
(5, 'Ford Transit', 1),
(6, 'Ford Everest', 1),
(7, 'Ford Econ van', 1),
(8, 'Honda Civic 1.6', 1),
(9, 'Honda Civic 2.0', 1),
(10, 'Hyundai Avante', 1),
(11, 'Hyundai Elantra', 1),
(12, 'Hyundai Starex H1', 1),
(13, 'HYUNDAI SANTA FE', 1),
(14, 'Isuzu TFS54', 1),
(15, 'Isuzu BUS', 1),
(16, 'Isuzu NQR75', 1),
(17, 'IVECO', 1),
(18, 'Land Rover', 1),
(19, 'Man TGM 13.250', 1),
(20, 'MAZDA 323', 1),
(21, 'Mercedes Vito', 1),
(22, 'Mercedes Sprinter', 1),
(23, 'Mercedes Atego', 1),
(24, 'Mitsubishi Pajero', 1),
(25, 'Mitsubishi Bus', 1),
(26, 'Nissan Urvan', 1),
(27, 'Nissan Navara', 1),
(28, 'Nissan NV200', 1),
(29, 'NISSAN MKB212', 1),
(30, 'Nissan SP215', 1),
(31, 'Nissan SP217N', 1),
(32, 'Nissan SM217L', 1),
(33, 'Subaru Impreza', 1),
(34, 'Toyota Corolla', 1),
(35, 'Toyota Altis', 1),
(36, 'Toyota Hilux', 1),
(37, 'Toyota Hiace', 1),
(38, 'Toyota Picnic', 1),
(39, 'Toyota Camry', 1),
(40, 'Toyota Prius', 1),
(41, 'VOLKSWAGEN TOUAREG', 1),
(42, 'Volvo S80', 1),
(43, 'Volvo Xc90', 1);

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
-- Indexes for table `vehicle_models`
--
ALTER TABLE `vehicle_models`
  ADD PRIMARY KEY (`ModelId`);

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
  MODIFY `PartsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `Product_Request_List`
--
ALTER TABLE `Product_Request_List`
  MODIFY `RequestId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `SupplierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicle_models`
--
ALTER TABLE `vehicle_models`
  MODIFY `ModelId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `workorders`
--
ALTER TABLE `workorders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
