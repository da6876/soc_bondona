-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2022 at 06:26 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soc_bondonaa`
--

-- --------------------------------------------------------

--
-- Table structure for table `customerinfo`
--

CREATE TABLE `customerinfo` (
  `CustomerID` int(6) UNSIGNED NOT NULL,
  `LoginID` varchar(30) NOT NULL,
  `Password` varchar(150) DEFAULT NULL,
  `FirstName` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) DEFAULT NULL,
  `picture` varchar(80) DEFAULT NULL,
  `MobileNo` varchar(15) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Address` varchar(250) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `CreateBy` varchar(20) DEFAULT NULL,
  `CreateDate` varchar(20) DEFAULT NULL,
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateDate` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orderinfo`
--

CREATE TABLE `orderinfo` (
  `OrderID` int(6) UNSIGNED NOT NULL,
  `ProductCode` int(6) DEFAULT NULL,
  `CustomerID` int(6) DEFAULT NULL,
  `ShipingAddress` varchar(250) DEFAULT NULL,
  `PaymentMethod` varchar(30) DEFAULT NULL,
  `TransID` varchar(50) DEFAULT NULL,
  `Quantity` varchar(15) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `CreateBy` varchar(20) DEFAULT NULL,
  `CreateDate` varchar(20) DEFAULT NULL,
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateDate` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `productcategory`
--

CREATE TABLE `productcategory` (
  `ProductCategoryId` int(6) UNSIGNED NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `CreateBy` varchar(20) DEFAULT NULL,
  `CreateDate` varchar(20) DEFAULT NULL,
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateDate` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productcategory`
--

INSERT INTO `productcategory` (`ProductCategoryId`, `Name`, `Status`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES
(30000, 'Category 2', 'Active', '10000', '02/11/2022', '10000', '02/11/2022'),
(30001, 'PRODUCT CATEGORY NAME 22', 'Delete', '10000', '02/11/2022', '10000', '02/11/2022'),
(30002, 'Category 3', 'Active', '10000', '02/11/2022', '', ''),
(30003, 'Panjabi', 'Active', '10000', '07/11/2022', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `productcolor`
--

CREATE TABLE `productcolor` (
  `ProductColorId` int(6) UNSIGNED NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `CreateBy` varchar(20) DEFAULT NULL,
  `CreateDate` varchar(20) DEFAULT NULL,
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateDate` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productcolor`
--

INSERT INTO `productcolor` (`ProductColorId`, `Name`, `Status`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES
(30000, 'Light Red', 'Active', '10000', '02/11/2022', '10000', '02/11/2022'),
(30001, 'Green', 'Active', '10000', '02/11/2022', '', ''),
(30002, 'Blue', 'Delete', '10000', '02/11/2022', '', ''),
(30003, 'Light Blue', 'Active', '10000', '06/11/2022', '', ''),
(30004, 'Noral', 'Active', '10000', '07/11/2022', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `productinfo`
--

CREATE TABLE `productinfo` (
  `ProductID` int(6) UNSIGNED NOT NULL,
  `ProductType` int(6) DEFAULT NULL,
  `Color` int(6) DEFAULT NULL,
  `Size` int(6) DEFAULT 0,
  `Category` int(6) DEFAULT NULL,
  `SubCategory` int(6) DEFAULT NULL,
  `DisplayType` varchar(150) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Details` text DEFAULT NULL,
  `Material` text DEFAULT NULL,
  `Care` text DEFAULT NULL,
  `PriceMRP` varchar(15) DEFAULT NULL,
  `PriceDiscount` varchar(15) DEFAULT NULL,
  `image1` varchar(80) NOT NULL DEFAULT 'No Image',
  `image2` varchar(80) NOT NULL DEFAULT 'No Image',
  `image3` varchar(80) NOT NULL DEFAULT 'No Image',
  `image4` varchar(80) NOT NULL DEFAULT 'No Image',
  `Status` varchar(10) DEFAULT NULL,
  `CreateBy` varchar(20) DEFAULT NULL,
  `CreateDate` varchar(20) DEFAULT NULL,
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateDate` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productinfo`
--

INSERT INTO `productinfo` (`ProductID`, `ProductType`, `Color`, `Size`, `Category`, `SubCategory`, `DisplayType`, `Description`, `Details`, `Material`, `Care`, `PriceMRP`, `PriceDiscount`, `image1`, `image2`, `image3`, `image4`, `Status`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES
(110000, 30000, 30001, 30002, 30000, 30002, 'Top', 'DESCRIPaaTION', 'DETAILS asdasd', 'MATERIAL asdasd', 'CAREasd asd a', '500', '560', 'public/allImages/productimage/84c5UF.webp', 'No Image', 'No Image', 'No Image', 'Active', '10000', '05/11/2022', '10000', '05/11/2022'),
(110001, 30000, 30000, 30002, 30000, 30002, 'Features', 'DESCRIPTION Shirt', 'DETAILS Shirt', 'MATERIAL Shirt', 'CARE Shirt', '600', '680', 'public/allImages/productimage/84c5UF.webp', 'No Image', 'No Image', 'No Image', 'Active', '10000', '05/11/2022', '10000', '05/11/2022'),
(110002, 30003, 30004, 30004, 30003, 30003, 'New', 'Brown Printed and Embroidered Viscose-Cotton Panjabi', 'White and brown printed viscose-cotton panjabi with mustard and beige embroidery.', 'Viscott (Viscose & Cotton)', 'Hand Wash With Mild Detergent In Cold Water', '2502.33', '2,302.33', 'public/allImages/productimage/84c5UF.webp', 'No Image', 'No Image', 'No Image', 'Active', '10000', '07/11/2022', '', ''),
(110003, 30003, 30004, 30005, 30003, 30003, 'New', 'Olive Sand Splash Dyed and Embroidered Silk Panjabi', 'Olive sand splash dyed silk panjabi with black embroidery.', 'Silk', 'Dry Clean', '9265.12', '9565.12', 'public/allImages/productimage/84c5UF.webp', 'No Image', 'No Image', 'No Image', 'Active', '10000', '07/11/2022', '', ''),
(110004, 30003, 30004, 30006, 30003, 30003, 'New', 'Ivory Striped Cotton Panjabi', 'Ivory striped cotton panjabi. Try yours with pajama, waistcoat and other accessories.', 'Cotton', 'Band Collar', '2065.12', '2265.12', 'public/allImages/productimage/84c5UF.webp', 'No Image', 'No Image', 'No Image', 'Active', '10000', '07/11/2022', '', ''),
(110005, 30003, 30004, 30007, 30003, 30003, 'New', 'Ivory Striped Cotton Panjabi', 'Ivory striped cotton panjabi. Try yours with pajama, waistcoat and other accessories.', 'Cotton', 'Hand Wash With Mild Detergent In Cold Water', '2065.12', '2565.12', 'public/allImages/productimage/84c5UF.webp', 'public/allImages/productimage/VWAn8J.webp', 'public/allImages/productimage/78xT7H.webp', 'public/allImages/productimage/mrFf0O.webp', 'Active', '10000', '07/11/2022', '', ''),
(110006, 30003, 30004, 30007, 30003, 30003, 'New', 'TEST', 'test', 'test', 'test', '222', '222', 'public/allImages/productimage/vlTrNp.jpg', 'public/allImages/productimage/2p2QOI.jpg', 'public/allImages/productimage/0zhF7q.jpg', 'public/allImages/productimage/QAouEt.jpg', 'Active', '10000', '08/11/2022', '10000', '08/11/2022'),
(110007, 30003, 30001, 0, 30003, 30003, 'New', 'Semi Long Linen Panjabi For Men', 'Semi Long Linen Panjabi For Men', 'cotton', 'stylish and fashionable', '300', '600', 'public/allImages/productimage/ThrXoc.jpg', 'public/allImages/productimage/Cuq8AB.jpg', 'public/allImages/productimage/PywIqq.jpg', 'public/allImages/productimage/5qLXhA.jpg', 'Active', '10000', '08/11/2022', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `productsize`
--

CREATE TABLE `productsize` (
  `ProductSizeId` int(6) UNSIGNED NOT NULL,
  `ProductTypeId` int(6) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `CreateBy` varchar(20) DEFAULT NULL,
  `CreateDate` varchar(20) DEFAULT NULL,
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateDate` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productsize`
--

INSERT INTO `productsize` (`ProductSizeId`, `ProductTypeId`, `Name`, `Status`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES
(30000, 30000, 'M', 'Delete', '10000', '02/11/2022', '', ''),
(30001, 30000, 'Larger', 'Active', '10000', '02/11/2022', '10000', '02/11/2022'),
(30002, 30000, 'Small', 'Active', '10000', '02/11/2022', '', ''),
(30003, 30002, 'Small', 'Active', '10000', '06/11/2022', '', ''),
(30004, 30003, '38', 'Active', '10000', '07/11/2022', '', ''),
(30005, 30003, '40', 'Active', '10000', '07/11/2022', '', ''),
(30006, 30003, '42', 'Active', '10000', '07/11/2022', '', ''),
(30007, 30003, '44', 'Active', '10000', '07/11/2022', '', ''),
(30008, 30003, '46', 'Active', '10000', '07/11/2022', '', ''),
(30009, 30003, '48', 'Active', '10000', '07/11/2022', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `productstock`
--

CREATE TABLE `productstock` (
  `StockID` int(6) UNSIGNED NOT NULL,
  `ProductID` int(6) DEFAULT NULL,
  `ProductCode` varchar(20) DEFAULT NULL,
  `StockQuantity` varchar(15) DEFAULT NULL,
  `SellQuantity` varchar(15) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `CreateBy` varchar(20) DEFAULT NULL,
  `CreateDate` varchar(20) DEFAULT NULL,
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateDate` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `productsubcategory`
--

CREATE TABLE `productsubcategory` (
  `ProductSubCategoryId` int(6) UNSIGNED NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Category_Id` int(6) NOT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `CreateBy` varchar(20) DEFAULT NULL,
  `CreateDate` varchar(20) DEFAULT NULL,
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateDate` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productsubcategory`
--

INSERT INTO `productsubcategory` (`ProductSubCategoryId`, `Name`, `Category_Id`, `Status`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES
(30000, 'PRODUCT TYPE NAME 1', 30002, 'InActive', '10000', '02/11/2022', '10000', '07/11/2022'),
(30001, 'PRODUCT TYPE NAME 22', 0, 'Delete', '10000', '02/11/2022', '10000', '02/11/2022'),
(30002, 'PRODUCT TYPE NAME 22', 30000, 'InActive', '10000', '02/11/2022', '10000', '07/11/2022'),
(30003, 'Cotton & Blends', 30003, 'Active', '10000', '07/11/2022', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE `producttype` (
  `ProductTypeId` int(6) UNSIGNED NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `CreateBy` varchar(20) DEFAULT NULL,
  `CreateDate` varchar(20) DEFAULT NULL,
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateDate` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producttype`
--

INSERT INTO `producttype` (`ProductTypeId`, `Name`, `Status`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES
(30000, 'Black Shirt', 'Active', '10000', '02/11/2022', '', ''),
(30001, 'Short Time 1', 'Delete', '10000', '02/11/2022', '10000', '02/11/2022'),
(30002, 'Short Shirt', 'Active', '10000', '06/11/2022', '10000', '06/11/2022'),
(30003, 'Panjabi', 'Active', '10000', '07/11/2022', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `shopingcard`
--

CREATE TABLE `shopingcard` (
  `ShopingCardID` int(6) UNSIGNED NOT NULL,
  `ProductID` int(6) DEFAULT NULL,
  `CustomerID` int(6) DEFAULT NULL,
  `ProductCode` varchar(20) DEFAULT NULL,
  `Quantity` varchar(15) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `CreateBy` varchar(20) DEFAULT NULL,
  `CreateDate` varchar(20) DEFAULT NULL,
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateDate` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `UserID` int(6) UNSIGNED NOT NULL,
  `LoginID` varchar(30) NOT NULL,
  `UserType` varchar(30) NOT NULL,
  `Password` varchar(150) DEFAULT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `MobileNo` varchar(15) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Address` varchar(250) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `CreateBy` varchar(20) DEFAULT NULL,
  `CreateDate` varchar(20) DEFAULT NULL,
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateDate` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`UserID`, `LoginID`, `UserType`, `Password`, `FullName`, `MobileNo`, `Email`, `Address`, `Status`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES
(1, 'fdsf', 'dfsdf', 'dfdf', 'dsfdsff', 'dfg', 'dfgdsf', 'asddgfsdg', 'Delete', 'df', 'fg', 'h', 'fdf'),
(2, 'fdsf', 'dfsdf', 'dfdf', 'dsfdsff', 'dfg', 'dfgdsf', 'asddgfsdg', 'Delete', 'df', 'fg', 'h', 'fdf'),
(10000, 'socroot@gmail.com', 'ADMIN', '7G2M7V4rVd/j', 'SOC ROOT', '01315007287', 'socroot@gmail.com', 'Dhaka,Bangladesh', 'ROOT', 'ADMIN', '30/10/2022', '', ''),
(10001, 'das', 'fdg', 'gdfg dfgsg', 'gsfdgs sdfgsdg', '23423', 'dsfsdfsd sg s', 'gsdf g', 'Delete', 'das', 'aaa', 'fdf', 'aff'),
(10002, '0147852369', 'ROOT', '', 'Mr Maksud Alam Rifat', '0147852369', 'rifat@gmail.com', '60 Fit,Mirpur,Dhaka,1216', 'Active', NULL, '01/11/2022', '01/11/2022', 'A'),
(10003, 'ashif@gmail.com', 'ADMIN', '', 'Ashif Dhali', '0168493258', 'ashif@gmail.com', 'Dhaka, Bangladesh', 'Active', NULL, '01/11/2022', '01/11/2022', 'A'),
(10004, '01474125825', 'NORMAL', '', 'Navil Hassan', '01474125825', 'navil@gmail.com', 'Mirpur DOHS.Dhaka', 'Active', NULL, '01/11/2022', '01/11/2022', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customerinfo`
--
ALTER TABLE `customerinfo`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `orderinfo`
--
ALTER TABLE `orderinfo`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`ProductCategoryId`);

--
-- Indexes for table `productcolor`
--
ALTER TABLE `productcolor`
  ADD PRIMARY KEY (`ProductColorId`);

--
-- Indexes for table `productinfo`
--
ALTER TABLE `productinfo`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `productsize`
--
ALTER TABLE `productsize`
  ADD PRIMARY KEY (`ProductSizeId`);

--
-- Indexes for table `productstock`
--
ALTER TABLE `productstock`
  ADD PRIMARY KEY (`StockID`);

--
-- Indexes for table `productsubcategory`
--
ALTER TABLE `productsubcategory`
  ADD PRIMARY KEY (`ProductSubCategoryId`);

--
-- Indexes for table `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`ProductTypeId`);

--
-- Indexes for table `shopingcard`
--
ALTER TABLE `shopingcard`
  ADD PRIMARY KEY (`ShopingCardID`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customerinfo`
--
ALTER TABLE `customerinfo`
  MODIFY `CustomerID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20000;

--
-- AUTO_INCREMENT for table `orderinfo`
--
ALTER TABLE `orderinfo`
  MODIFY `OrderID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110000;

--
-- AUTO_INCREMENT for table `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `ProductCategoryId` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30004;

--
-- AUTO_INCREMENT for table `productcolor`
--
ALTER TABLE `productcolor`
  MODIFY `ProductColorId` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30005;

--
-- AUTO_INCREMENT for table `productinfo`
--
ALTER TABLE `productinfo`
  MODIFY `ProductID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110008;

--
-- AUTO_INCREMENT for table `productsize`
--
ALTER TABLE `productsize`
  MODIFY `ProductSizeId` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30010;

--
-- AUTO_INCREMENT for table `productstock`
--
ALTER TABLE `productstock`
  MODIFY `StockID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110000;

--
-- AUTO_INCREMENT for table `productsubcategory`
--
ALTER TABLE `productsubcategory`
  MODIFY `ProductSubCategoryId` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30004;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `ProductTypeId` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30004;

--
-- AUTO_INCREMENT for table `shopingcard`
--
ALTER TABLE `shopingcard`
  MODIFY `ShopingCardID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110000;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `UserID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10005;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
