-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2021 at 05:26 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smarthr`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(11) NOT NULL,
  `assetName` varchar(200) NOT NULL,
  `assetId` varchar(200) NOT NULL,
  `PurchaseDate` date DEFAULT NULL,
  `PurchaseFrom` varchar(200) NOT NULL,
  `Manufacturer` varchar(200) NOT NULL,
  `Model` varchar(200) NOT NULL,
  `Status` int(10) NOT NULL,
  `Supplier` varchar(255) NOT NULL,
  `AssetCondition` varchar(255) NOT NULL,
  `Warranty` int(3) NOT NULL,
  `Price` int(255) NOT NULL,
  `AssetUser` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `DateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `assetName`, `assetId`, `PurchaseDate`, `PurchaseFrom`, `Manufacturer`, `Model`, `Status`, `Supplier`, `AssetCondition`, `Warranty`, `Price`, `AssetUser`, `Description`, `DateTime`) VALUES
(1, 'Mackbook Pro', '#AST-031256', '2020-09-23', 'Bismillah', 'Apple Inc.', '2019', 1, 'Amazon', 'In good shape', 12, 77777777, 'Faqih Eza Ammar', 'This is the description of the laptop', '2020-09-23 23:57:26'),
(5, 'Mataram', '#AST-786032', '2020-11-16', 'Amajon', 'Hujan', 'Model Lama', 3, 'JNE', 'Rusak', 69, 20000, 'John Doe', 'Tolong Diapprove mas', '2020-12-26 09:56:01'),
(11, 'Busetttttt', '#AST-198247', '2021-01-09', 'Cok', 'Kamu', 'Koyok', 2, 'Kadal', 'Buaya', 12, 101010, 'John Doe', 'hahaha', '2020-12-31 00:23:25'),
(12, 'asuuuu', '#AST-791503', '2021-01-01', 'sempak', 'kuda', 'nil', 0, '', '', 25, 15000000, 'John Doe', 'hahahahahaahaha', '2021-01-01 01:54:46'),
(13, 'Acer Swift 3 ADE', '#AST-679305', '2021-01-13', 'Global Usaha Masyarakat', 'ACER Inc.', 'SF314-54G', 1, 'Tokopedia', 'In good shape', 12, 8000000, 'Goerge Merchason', 'Laptop Baruu Harum Wanginya', '2021-01-01 01:55:15'),
(15, 'Goodness', '#AST-518423', '2021-01-21', 'Ohhh god', 'hiya', 'Iya Kamu', 0, 'HAHAHAH', 'HAHAHAHAHAHAHAH', 133, 2147483647, 'Richard Miles', 'Buahhh', '2021-01-01 01:59:37'),
(17, 'Halooo ', '#AST-953680', '2021-01-21', 'Dicoba', 'Samsung', 'SM4-3', 1, 'Reeeeeee', 'Bettulll', 999, 2147483647, 'Donny Rizal', 'Donny dicoba\r\n', '2021-01-01 20:05:02');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(225) NOT NULL,
  `ClientId` varchar(225) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Company` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL,
  `Picture` varchar(225) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `FirstName`, `LastName`, `UserName`, `Email`, `Password`, `ClientId`, `Phone`, `Company`, `Address`, `Status`, `Picture`, `date`) VALUES
(1, 'Yahuza', 'Abdul-Hakim', 'Vendetta', 'musheabdulhakim@protonmail.ch', '$2y$10$xU1zDRigag7ZMGs0Egcqoei0SrtZJRX/p425h4qOi5OMKFz32k0UC', 'CLT-613498', '233209229025', 'Microsoft Inc', 'Live from home', 1, 'd41d8cd98f00b204e9800998ecf8427e1601112041', '2020-09-26'),
(2, 'Vendetta', 'Alkaline', 'alkaline', 'musheabdulhakim99@gmail.com', '$2y$10$qUL2APr762X.vvJuNQvqludvabDa.Y3TRHOa.M/qq8WFoeoh7IaWG', 'CLT-217594', '233209229025', 'Falcon Systems', 'Live from home', 1, 'd41d8cd98f00b204e9800998ecf8427e1601112339', '2020-09-26'),
(6, 'Donny Rizal ', 'Adhi Pratama', 'dude', 'dude@gmail.com', '$2y$10$OjGRR6GlAzCl6yP/taWI7uxIB2DOwOTeA4OBDUfU5bJRUdm9SJ8FO', 'CLT-543872', '089', 'dude', 'dude', 1, 'd41d8cd98f00b204e9800998ecf8427e1609003455', '2020-12-27');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `Department` varchar(200) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `Department`, `Date`) VALUES
(2, 'Marketing', '2020-09-26'),
(3, 'IT Department', '2020-09-26'),
(4, 'Web Development', '2020-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(11) NOT NULL,
  `Designation` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `Designation`, `Department`, `Date`) VALUES
(1, 'Web Designer', 'Web Development', '2020-09-27'),
(2, 'Web Developer', 'Web Development', '2020-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Employee_Id` varchar(50) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Designation` varchar(255) NOT NULL,
  `Joining_Date` date NOT NULL DEFAULT current_timestamp(),
  `Picture` varchar(200) NOT NULL,
  `DateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `FirstName`, `LastName`, `UserName`, `Email`, `Password`, `Employee_Id`, `Phone`, `Department`, `Designation`, `Joining_Date`, `Picture`, `DateTime`) VALUES
(2, 'Karen', 'Si KOMPUTER', 'karen', 'karen@plankton.inc', '$2y$10$NStAc.HdAWhXBrVEfTSW0ebT2AFXpm5LzGCn9hHPikkMpKLIKXL0W', 'EMP-863140', '99999969', 'IT Department', 'Web Developer', '2021-01-02', '2.jpg', '2021-01-02 19:06:08'),
(4, 'Rifqy', 'Fauzy', 'Rifqy', 'rifqy@gmail.com', '$2y$10$E8FuYrk8eyA2s5bccuUNk.bTFXPHjzgbzhgJzIFfZHmevYT6Z41k6', 'EMP-743619', '089927924', 'Web Development', 'Web Developer', '2020-09-29', 'avatar-11.jpg', '2020-09-29 00:04:29'),
(5, 'Faqih', 'Eza Ammar', 'Skeeney', 'faqihhhhhsholat@gmail.com', '$2y$10$fBLIUiJ3HTgxW5RcEdfi0O3NEUN.Sn8mdfBC5GckdTJdOTsSJRNBW', 'EMP-186249', '0899994949494', 'Web Development', 'Web Developer', '2020-09-29', 'avatar-09.jpg', '2020-09-29 00:14:44'),
(6, 'Donny', 'Rizal', 'donnyrizal', 'jancok@gmail.com', '$2y$10$CudM3ey1PCEO3uoD69v76u90s/K8DSNO1n04h.RvO.WYiYTu3X9LS', 'EMP-295047', '089959595959595', 'IT Department', 'Select Designation', '2020-12-29', 'foto.jpg', '2020-12-29 22:17:21'),
(10, 'Takahiro', 'Moriuchi', 'taka', 'taka@gmail.com', '$2y$10$GAKzay96r60nSn7a0BHZgOe9dLegqrHrCGHKhF/LGyM64aMcDrNMO', 'EMP-867403', '+526737383', 'Marketing', 'Web Designer', '2021-01-02', 'taka.jpg', '2021-01-02 22:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(200) DEFAULT NULL,
  `lastname` varchar(200) DEFAULT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(100) DEFAULT 'employee',
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `picture` varchar(255) DEFAULT 'IMG-20170519-WA0000.png',
  `dateTime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `role`, `phone`, `address`, `picture`, `dateTime`) VALUES
(1, 'Donny', 'Rizal', 'donny', 'donnyrizaladhip@rocketmail.com', '$2y$10$HZIJ8wvC4epQ.rTcA1h8feG2z5FfqzX21yYFq8i8Y9SJCTs4QYBqa', 'employee', '08996596007', 'Rembang, Jawa Tengah', 'avatar-19.jpg', '2020-09-21 19:04:47'),
(2, 'Administrasi', 'Super', 'admin', 'Adminstrasibro@gmail.com', '$2y$10$.V/X26KC6UHWdSzPSyGgzuZLYpyvjrcRlxdQlpbTYqXnCPr2g2F9O', 'admin', '---', 'Nowhere', 'my-passport-photo.jpg', '2020-09-21 19:05:43'),
(8, NULL, NULL, 'saya', NULL, '$2y$10$0n8x2nCcWFVFnu86J9XRhu8JhR/9qf.bFSo0SbI/h5xetftOETMni', 'employee', NULL, NULL, 'IMG-20170519-WA0000.png', '2020-12-31 11:47:59');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role` varchar(100) NOT NULL DEFAULT 'employee',
  `id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role`, `id`, `date`) VALUES
('admin', 6, '2021-01-02'),
('employee', 5, '2021-01-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `assetId` (`assetId`),
  ADD UNIQUE KEY `assetId_2` (`assetId`),
  ADD UNIQUE KEY `assetId_3` (`assetId`),
  ADD UNIQUE KEY `assetId_4` (`assetId`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ClientId` (`ClientId`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Department` (`Department`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Employee_Id` (`Employee_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`email`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `role_fk` FOREIGN KEY (`role`) REFERENCES `user_role` (`role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
