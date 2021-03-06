-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2021 at 11:14 PM
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
-- Database: `haram`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(11) NOT NULL,
  `assetName` varchar(200) NOT NULL,
  `assetId` varchar(200) NOT NULL,
  `PurchaseDate` varchar(20) DEFAULT NULL,
  `PurchaseFrom` varchar(200) NOT NULL,
  `Manufacturer` varchar(200) NOT NULL,
  `Model` varchar(200) NOT NULL,
  `Status` int(10) NOT NULL,
  `Supplier` varchar(255) NOT NULL,
  `AssetCondition` varchar(255) NOT NULL,
  `Warranty` int(3) NOT NULL,
  `Price` int(255) NOT NULL,
  `Employee_Id` varchar(50) NOT NULL,
  `AssetUser` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `DateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `assetName`, `assetId`, `PurchaseDate`, `PurchaseFrom`, `Manufacturer`, `Model`, `Status`, `Supplier`, `AssetCondition`, `Warranty`, `Price`, `Employee_Id`, `AssetUser`, `Description`, `DateTime`) VALUES
(1, 'Mackbook Pro', '#AST-031256', '2020-09-23', 'Bismillah', 'Apple Inc.', '2019', 1, 'Amazon', 'In good shape', 12, 77777777, 'EMP-186249', 'Faqih Eza Ammar', 'Ini Laptop mantap kali bujang', '2020-09-23 23:57:26'),
(5, 'Mataram', '#AST-786032', '2020-11-16', 'Amajon', 'Hujan', 'Model Lama', 3, 'JNE', 'Rusak', 69, 20000, 'EMP-743619', 'Rifqy Fauzy', 'Tolong Diapprove mas', '2020-12-26 09:56:01'),
(17, 'Halooo ', '#AST-953680', '2021-01-21', 'Dicoba', 'Samsung', 'SM4-3', 1, 'Reeeeeee', 'Bettulll', 999, 2147483647, 'EMP-295047', 'Donny Rizal', 'Donny dicoba\r\n', '2021-01-01 20:05:02'),
(33, 'Monitor Samsung S3-232', '#AST-721863', '07/01/2021', 'Amazon', 'Apple Inc.', 'Model Lama', 3, 'JNE', 'Dalam keadaan rusak ', 23, 2000000, 'EMP-295047', 'Donny Rizal', 'Rusak Kabeh', '2021-01-07 07:55:32'),
(34, 'PS5', '#AST-790541', '24/01/2021', 'PSEnterprise', 'Sony Inc.', '2020', 0, 'Shopee', 'Very well', 24, 8250000, 'EMP-160427', 'Derrick Rose', 'Demi kebersamaan dengan ini saya membuat pemesanan untuk PS5 supaya anak2 pada semangat di kantor 😁', '2021-01-08 01:04:07'),
(35, 'PC Master', '#AST-016892', '08/01/2021', 'Amajon', 'Apple Inc.', 'Model Lama', 1, 'JNE', 'Rusak', 21, 2147483647, 'EMP-743619', 'Rifqy Fauzy', 'Ini PC bagus oleh mas rifqy', '2021-01-08 01:34:09');

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
(2, 'IT Analysts ', '2020-09-26'),
(3, 'IT Department', '2020-09-26'),
(4, 'Web Development', '2020-09-27'),
(5, 'Data Science', '2021-01-05'),
(6, 'Repair Shop', '2021-01-07');

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
(2, 'Web Developer', 'Web Development', '2020-09-27'),
(4, 'Cracker', 'IT Department', '2021-01-07');

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
  `address` varchar(225) DEFAULT NULL,
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

INSERT INTO `employees` (`id`, `FirstName`, `LastName`, `UserName`, `Email`, `address`, `Password`, `Employee_Id`, `Phone`, `Department`, `Designation`, `Joining_Date`, `Picture`, `DateTime`) VALUES
(4, 'Rifqy', 'Fauzy', 'Rifqy', 'rifqy@gmail.com', '2971  Trymore Road, Byron, Minnesota, 55920', '$2y$10$E8FuYrk8eyA2s5bccuUNk.bTFXPHjzgbzhgJzIFfZHmevYT6Z41k6', 'EMP-743619', '089927924', 'Web Development', 'Web Developer', '2020-09-29', 'avatar-11.jpg', '2020-09-29 00:04:29'),
(5, 'Faqih', 'Eza Ammar', 'Skeeney', 'faqihhhhhsholat@gmail.com', 'Jl Gajah Mada 3-5 Kompl Duta Merlin Bl C/31,Petojo Utara, Surakarta', '$2y$10$fBLIUiJ3HTgxW5RcEdfi0O3NEUN.Sn8mdfBC5GckdTJdOTsSJRNBW', 'EMP-186249', '0899994949494', 'Web Development', 'Web Developer', '2020-09-29', 'avatar-09.jpg', '2020-09-29 00:14:44'),
(6, 'Donny', 'Rizal', 'donnyrizal', 'donny@gmail.com', 'Wonorejo Permai Timur I / 71, Jawa Timur', '$2y$10$iMpn8LufI2VifXpQfG1.y.PuZT2/qHb73yX50rBQ8ZL1kt6fzyL8G', 'EMP-295047', '089959595959595', 'Web Development', 'Web Designer', '2020-12-29', 'foto.jpg', '2020-12-29 22:17:21'),
(10, 'Takahiro', 'Moriuchi', 'taka', 'taka@gmail.com', 'Jl Daan Mogot Km 18 Pergudangan Semanan Megah,Kalideres', '$2y$10$gbC7F4Gj9Uk9LXoZ7ktiwel6QZO01x9.fWDX4niYA3rIKvWLdZJzm', 'EMP-867403', '+625353799999', 'Data Science', 'Cracker', '2021-01-02', 'main-qimg-392e83b0455422c59876d7a6270ebd1e[1].webp', '2021-01-02 22:48:25'),
(11, 'Derrick', 'Rose', 'rose', 'rose@yahoo.com', 'Jl Mangga Dua Raya Grand Boutique Centre Bl E/19,Ancol', '$2y$10$6ydlHw5pJX3DXSixnkWwtO0vjy8HXmjonoC9Icw6yYLkFc55Tupsu', 'EMP-160427', '+62485954120', 'IT Analysts ', 'Cracker', '2021-01-07', 'unnamed.webp', '2021-01-07 09:07:12'),
(12, 'Toru', 'Yamashita', 'toru', 'toru@gmail.com', 'JL Gereja Theresia No. 43 RT 001/04, Menteng, Central Jakarta', '$2y$10$f8hk0CKPLSoiNRNqi16i5OoW0RsQLVdgRetln/Kr7xe.Fd0rwuouW', 'EMP-621059', '+62564565456', 'IT Department', 'Web Developer', '2021-01-07', '118-1186556_sleepy-totoro-totoro-png-totoro-tumblr-studio-ghibli.ico', '2021-01-07 13:03:21'),
(13, 'Dada', 'Lol', 'dadaadada', 'dadar@guna.com', 'tenan', '$2y$10$H1TdHjQnPsejzGLUzLD.6uM/DKiaCMCyuPdfG2pzW9pPVgHW7GhCC', 'EMP-657493', '52637474', 'Web Development', 'Web Developer', '2021-01-08', 'maface.jpg', '2021-01-08 19:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `Employee_Id` varchar(50) NOT NULL,
  `salary` int(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `Employee_Id`, `salary`, `date`) VALUES
(2, 'EMP-743619', 777777777, '2021-01-07'),
(3, 'EMP-186249', 500000, '2021-01-07'),
(4, 'EMP-295047', 7000000, '2021-01-07'),
(5, 'EMP-867403', 7000000, '2021-01-07'),
(6, 'EMP-160427', 8000000, '2021-01-07'),
(7, 'EMP-621059', 56565656, '2021-01-07');

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
(10, 'Arthur', 'Morgan', 'arthur', 'arthur@gmail.com', '$2y$10$HF1I/R4nF906x3ZU0v33ieYbDrbHTNUadknUvmt//ZEyjxgXzI7/K', 'employee', '0899662626262', 'Blackwater st. 5 block 96, Tahiti', 'IMG-20170519-WA0000.png', '2021-01-04 15:19:09'),
(11, 'cuki', 'mani', 'cukimanis', 'cukimanis@gmaisjf.com', '$2y$10$dskYqu6.6iEEsRsPZ8FxO.1B7YjX2fEivwi15GrblKPaSfA006Q4y', 'employee', '08999999', 'cuki', 'IMG-20170519-WA0000.png', '2021-01-08 20:11:00');

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
  ADD KEY `AssetUser` (`AssetUser`),
  ADD KEY `Employee_Id` (`Employee_Id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Designation` (`Designation`),
  ADD KEY `Department` (`Department`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Employee_Id` (`Employee_Id`) USING BTREE,
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD KEY `Department` (`Department`),
  ADD KEY `Designation` (`Designation`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Employee_Id` (`Employee_Id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assets`
--
ALTER TABLE `assets`
  ADD CONSTRAINT `assets_ibfk_1` FOREIGN KEY (`Employee_Id`) REFERENCES `employees` (`Employee_Id`);

--
-- Constraints for table `designations`
--
ALTER TABLE `designations`
  ADD CONSTRAINT `designations_ibfk_1` FOREIGN KEY (`Department`) REFERENCES `departments` (`Department`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`Department`) REFERENCES `departments` (`Department`),
  ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`Designation`) REFERENCES `designations` (`Designation`);

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`Employee_Id`) REFERENCES `employees` (`Employee_Id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `role_fk` FOREIGN KEY (`role`) REFERENCES `user_role` (`role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
