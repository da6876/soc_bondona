-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2022 at 06:36 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

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

--
-- Dumping data for table `customerinfo`
--

INSERT INTO `customerinfo` (`CustomerID`, `LoginID`, `Password`, `FirstName`, `LastName`, `picture`, `MobileNo`, `Email`, `Address`, `Status`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES
(20006, 'NO AA', 'bcbe3365e6ac95ea2c0343a2395834dd', 'AAA', NULL, 'No Image', '2222', 'asd@asdad', NULL, 'Active', 'NO AA', '19/11/2022', '', ''),
(20007, '01684924439', 'e10adc3949ba59abbe56e057f20f883e', 'Dhali Abir', NULL, 'No Image', '01684924439', 'dhali@gmail.com', NULL, 'Active', '01684924439', '19/11/2022', '', ''),
(20008, '01315007287', 'e10adc3949ba59abbe56e057f20f883e', 'Abir', NULL, 'No Image', '01315007287', 'abir@gmail.com', NULL, 'Active', '01315007287', '19/11/2022', '', ''),
(20009, '01315007287', 'e10adc3949ba59abbe56e057f20f883e', 'AbirDhali', NULL, 'No Image', '+8801315007287', NULL, NULL, 'Active', 'NO AA', '20/11/2022', '', ''),
(20010, '+8801632594374', '25d55ad283aa400af464c76d713c07ad', 'rifat', NULL, 'No Image', '+8801632594374', NULL, NULL, 'Active', '+8801632594374', '20/11/2022', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `menu_item`
--

CREATE TABLE `menu_item` (
  `menu_item_id` int(6) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Link` varchar(50) NOT NULL,
  `Other` varchar(20) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `CreateBy` varchar(20) NOT NULL,
  `CreateDate` varchar(20) NOT NULL,
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateDate` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_item`
--

INSERT INTO `menu_item` (`menu_item_id`, `Name`, `Link`, `Other`, `Status`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES
(1, 'Home', '/', 'Home', 'Active', '10000', '13/11/2022', '10000', '13/11/2022'),
(2, 'Shop', 'shop', 'Shop', 'Active', '10000', '13/11/2022', '10000', '13/11/2022'),
(3, 'Women Collection', '#', 'Hot', 'InActive', '10000', '13/11/2022', '10000', '20/11/2022'),
(4, 'Men Collection', '#', 'Hot', 'InActive', '10000', '13/11/2022', '10000', '20/11/2022'),
(5, 'Contact', 'Contact', 'Contact', 'InActive', '10000', '13/11/2022', '', ''),
(6, 'Cart', 'cart', 'A', 'Active', '10000', '20/11/2022', '', ''),
(7, 'Winter Collection', '#', 'Hot', 'Active', '10000', '20/11/2022', '10000', '20/11/2022');

-- --------------------------------------------------------

--
-- Table structure for table `orderinfo_dtl`
--

CREATE TABLE `orderinfo_dtl` (
  `orderinfo_dtl_id` int(6) NOT NULL,
  `OrderID` int(6) NOT NULL,
  `ProductCode` int(10) NOT NULL,
  `Quantity` varchar(10) NOT NULL,
  `Price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderinfo_dtl`
--

INSERT INTO `orderinfo_dtl` (`orderinfo_dtl_id`, `OrderID`, `ProductCode`, `Quantity`, `Price`) VALUES
(12, 110003, 110000, '1', '000'),
(13, 110003, 110005, '1', '000'),
(14, 110003, 110001, '1', '000'),
(15, 110004, 110001, '1', '000');

-- --------------------------------------------------------

--
-- Table structure for table `orderinfo_mst`
--

CREATE TABLE `orderinfo_mst` (
  `OrderID` int(6) UNSIGNED NOT NULL,
  `CustomerID` int(6) DEFAULT NULL,
  `PhoneNo` varchar(15) NOT NULL,
  `ShipingAddress` varchar(250) DEFAULT NULL,
  `PaymentMethod` varchar(30) DEFAULT NULL,
  `TransID` varchar(50) DEFAULT NULL,
  `TotalPrice` varchar(15) DEFAULT NULL,
  `Discount` varchar(10) DEFAULT '00',
  `DeliveryCharges` varchar(10) DEFAULT '00',
  `Status` varchar(10) DEFAULT NULL,
  `CreateBy` varchar(20) DEFAULT NULL,
  `CreateDate` varchar(20) DEFAULT NULL,
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateDate` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderinfo_mst`
--

INSERT INTO `orderinfo_mst` (`OrderID`, `CustomerID`, `PhoneNo`, `ShipingAddress`, `PaymentMethod`, `TransID`, `TotalPrice`, `Discount`, `DeliveryCharges`, `Status`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES
(110003, 20008, '01315007287', 'Dhaka', 'Cash On Delivery', 'PlaceOrder', '3165.12', '0', '0', 'Pending', '20008', '20/11/2022', NULL, NULL),
(110004, 20010, '01632594374', 'mirpur', 'Cash On Delivery', 'PlaceOrder', '600', '0', '0', 'Pending', '20010', '20/11/2022', NULL, NULL);

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
(30000, 'Category 2', 'Delete', '10000', '02/11/2022', '10000', '02/11/2022'),
(30001, 'PRODUCT CATEGORY NAME 22', 'Delete', '10000', '02/11/2022', '10000', '02/11/2022'),
(30002, 'Category 3', 'Delete', '10000', '02/11/2022', '', ''),
(30003, 'Panjabi', 'Active', '10000', '07/11/2022', '', ''),
(30004, 'Woman wear', 'Active', '10000', '09/11/2022', '', ''),
(30005, 'Man Wear', 'Active', '10000', '09/11/2022', '', ''),
(30006, 'Children', 'Active', '10000', '09/11/2022', '', ''),
(30007, 'Bags & Purses', 'Active', '10000', '09/11/2022', '', ''),
(30008, 'Eyewear', 'Active', '10000', '09/11/2022', '', ''),
(30009, 'Footwear', 'Active', '10000', '09/11/2022', '', '');

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
(110000, 30000, 30001, 30002, 30005, 30009, 'Top', 'Green polo t shirt', 'Colour T shirts Gsm: 180 Colours: 10 Types Size: M,L,XL (Asian standard), (One carton) Minimun Purchase: 50pcs Wholesale.any colour.', 'T shirts Gsm', 'One carton', '500', '560', 'public/allImages/productimage/cVgAym.jpg', 'public/allImages/productimage/BjHxp9.jpg', 'public/allImages/productimage/ku5QHC.jpg', 'public/allImages/productimage/9k0eOt.jpg', 'Active', '10000', '05/11/2022', '10000', '10/11/2022'),
(110001, 30000, 30004, 30002, 30005, 30009, 'Top', 'Black Cotton Formal Shirt For Men', 'ip fashion  is one of the popular brand for all type of fashion products at reasonable price. They provide us different types of fashion items very frequently. Shop your choice from this seller!', 'Cotton', 'Cotton', '600', '680', 'public/allImages/productimage/4aM2sq.jpg', 'public/allImages/productimage/69qPv8.jpg', 'public/allImages/productimage/7HkHJ0.jpg', 'public/allImages/productimage/b9J6t2.jpg', 'Active', '10000', '05/11/2022', '10000', '10/11/2022'),
(110002, 30003, 30004, 30004, 30003, 30003, 'New', 'Brown Printed and Embroidered Viscose-Cotton Panjabi', 'White and brown printed viscose-cotton panjabi with mustard and beige embroidery.', 'Viscott (Viscose & Cotton)', 'Hand Wash With Mild Detergent In Cold Water', '2502.33', '2,302.33', 'public/allImages/productimage/84c5UF.webp', 'No Image', 'No Image', 'No Image', 'Active', '10000', '07/11/2022', '', ''),
(110003, 30003, 30004, 30005, 30003, 30003, 'New', 'Olive Sand Splash Dyed and Embroidered Silk Panjabi', 'Olive sand splash dyed silk panjabi with black embroidery.', 'Silk', 'Dry Clean', '9265.12', '9565.12', 'public/allImages/productimage/84c5UF.webp', 'No Image', 'No Image', 'No Image', 'Active', '10000', '07/11/2022', '', ''),
(110004, 30003, 30004, 30006, 30003, 30003, 'Features', 'Ivory Striped Cotton Panjabi', 'Ivory striped cotton panjabi. Try yours with pajama, waistcoat and other accessories.', 'Cotton', 'Band Collar', '2065.12', '2265.12', 'public/allImages/productimage/84c5UF.webp', 'public/allImages/productimage/Sl3xmH.jpg', 'No Image', 'No Image', 'Active', '10000', '07/11/2022', '10000', '10/11/2022'),
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
(30000, 'PRODUCT TYPE NAME 1', 30002, 'Delete', '10000', '02/11/2022', '10000', '07/11/2022'),
(30001, 'PRODUCT TYPE NAME 22', 0, 'Delete', '10000', '02/11/2022', '10000', '02/11/2022'),
(30002, 'PRODUCT TYPE NAME 22', 30000, 'Delete', '10000', '02/11/2022', '10000', '07/11/2022'),
(30003, 'Cotton & Blends', 30003, 'Active', '10000', '07/11/2022', '', ''),
(30004, 'Midi Dresses', 30004, 'Active', '10000', '09/11/2022', '', ''),
(30005, 'Maxi Dresses', 30004, 'Active', '10000', '09/11/2022', '', ''),
(30006, 'Prom Dresses', 30004, 'Active', '10000', '09/11/2022', '', ''),
(30007, 'Little Black Dresses', 30004, 'Active', '10000', '09/11/2022', '', ''),
(30008, 'Mini Dresses', 30004, 'Active', '10000', '09/11/2022', '', ''),
(30009, 'Man Dresses', 30005, 'Active', '10000', '09/11/2022', '', ''),
(30010, 'Man Black Dresses', 30005, 'Active', '10000', '09/11/2022', '', ''),
(30011, 'Man Mini Dresses', 30005, 'Active', '10000', '09/11/2022', '', ''),
(30012, 'Children Dresses', 30006, 'Active', '10000', '09/11/2022', '', ''),
(30013, 'Children Dresses', 30006, 'Active', '10000', '09/11/2022', '', ''),
(30014, 'Mini Dresses', 30006, 'Active', '10000', '09/11/2022', '', ''),
(30015, 'Bags', 30007, 'Active', '10000', '09/11/2022', '', ''),
(30016, 'Purses', 30007, 'Active', '10000', '09/11/2022', '', '');

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
-- Table structure for table `shipping_address`
--

CREATE TABLE `shipping_address` (
  `ShippingAddresId` int(10) NOT NULL,
  `CustomerID` int(10) DEFAULT NULL,
  `RecipientName` varchar(100) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Address` varchar(250) DEFAULT NULL,
  `ShippingLocation` varchar(50) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `PostalCode` varchar(20) DEFAULT NULL,
  `country_id` int(10) DEFAULT NULL,
  `CreateBy` varchar(20) DEFAULT NULL,
  `CreateDate` varchar(20) DEFAULT NULL,
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateDate` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

--
-- Dumping data for table `shopingcard`
--

INSERT INTO `shopingcard` (`ShopingCardID`, `ProductID`, `CustomerID`, `ProductCode`, `Quantity`, `Status`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES
(110029, 110000, 20008, '110000', '1', 'Delete', '20008', '20/11/2022', '', ''),
(110030, 110005, 20008, '110005', '1', 'Delete', '20008', '20/11/2022', '', ''),
(110031, 110001, 20008, '110001', '1', 'Delete', '20008', '20/11/2022', '', ''),
(110032, 110002, 20008, '110002', '1', 'P', '20008', '20/11/2022', '', ''),
(110033, 110001, 20010, '110001', '1', 'Delete', '20010', '20/11/2022', '', '');

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
-- Indexes for table `menu_item`
--
ALTER TABLE `menu_item`
  ADD PRIMARY KEY (`menu_item_id`);

--
-- Indexes for table `orderinfo_dtl`
--
ALTER TABLE `orderinfo_dtl`
  ADD PRIMARY KEY (`orderinfo_dtl_id`);

--
-- Indexes for table `orderinfo_mst`
--
ALTER TABLE `orderinfo_mst`
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
-- Indexes for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD PRIMARY KEY (`ShippingAddresId`);

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
  MODIFY `CustomerID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20011;

--
-- AUTO_INCREMENT for table `menu_item`
--
ALTER TABLE `menu_item`
  MODIFY `menu_item_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orderinfo_dtl`
--
ALTER TABLE `orderinfo_dtl`
  MODIFY `orderinfo_dtl_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orderinfo_mst`
--
ALTER TABLE `orderinfo_mst`
  MODIFY `OrderID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110005;

--
-- AUTO_INCREMENT for table `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `ProductCategoryId` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30010;

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
  MODIFY `ProductSubCategoryId` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30017;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `ProductTypeId` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30004;

--
-- AUTO_INCREMENT for table `shipping_address`
--
ALTER TABLE `shipping_address`
  MODIFY `ShippingAddresId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shopingcard`
--
ALTER TABLE `shopingcard`
  MODIFY `ShopingCardID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110034;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `UserID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10005;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
