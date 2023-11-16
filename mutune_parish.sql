-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2023 at 01:10 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mutune_parish`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `cpassword` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `station` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user_type`, `username`, `password`, `cpassword`, `mobile`, `email`, `station`, `photo`) VALUES
(1, 'Admin', 'Admin', 'e3afed0047b08059d0fada10f400c1e5', 'e3afed0047b08059d0fada10f400c1e5', '0706887595', 'anselmjackson3@gmail.com', 'Admin', 'images (2).jpg'),
(2, 'Priest', 'Kivosyo', 'f459859a3c8badeb7e1b5bdf70916335', 'f459859a3c8badeb7e1b5bdf70916335', '0745868954', 'kivosyo@gmail.com', 'Priest', 'images (2).jpg'),
(3, 'Catechist', 'Maseki', '07bd9bab996930ef463d9188acfc732e', '07bd9bab996930ef463d9188acfc732e', '0758965485', 'maseki@gmail.com', 'Maseki', 'images (2).jpg'),
(4, 'Catechist', 'Maiini', '1727498fbbb4783b0c05765b718ddbc8', '1727498fbbb4783b0c05765b718ddbc8', '0798765463', 'maiini@gmail.com', 'Maaini', 'passport.jpg'),
(5, 'Catechist', 'Kangau', '54e8e7d59412a886f905ca7210dd9981', '54e8e7d59412a886f905ca7210dd9981', '0789867857', 'kangau@gmail.com', 'Kangau', 'images (1).jpg'),
(6, 'Catechist', 'Mutune', '3c1c2d9237f525ebb597a115a6110962', '3c1c2d9237f525ebb597a115a6110962', '0789565455', 'mutune@gmail.com', 'Mutune', 'images (1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `baptismal_class`
--

CREATE TABLE `baptismal_class` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirm_password` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `baptismal_name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `card_no` varchar(20) NOT NULL,
  `baptismal_parent` varchar(100) NOT NULL,
  `station` varchar(40) NOT NULL,
  `scc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `baptismal_class`
--

INSERT INTO `baptismal_class` (`id`, `username`, `password`, `confirm_password`, `first_name`, `baptismal_name`, `surname`, `card_no`, `baptismal_parent`, `station`, `scc`) VALUES
(1, 'anselm', '1234', '1234', 'Mutei', '', 'Mwalimu', '', 'Mboya Mutua', 'Maseki', 'St. Paul');

-- --------------------------------------------------------

--
-- Table structure for table `burial_mass`
--

CREATE TABLE `burial_mass` (
  `id` int(11) NOT NULL,
  `nextKin` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `DDD` date NOT NULL,
  `outStation` varchar(100) NOT NULL,
  `SCC` varchar(100) NOT NULL,
  `burialDate` date NOT NULL,
  `assignedpriest` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `burial_mass`
--

INSERT INTO `burial_mass` (`id`, `nextKin`, `mobile`, `fullName`, `DDD`, `outStation`, `SCC`, `burialDate`, `assignedpriest`) VALUES
(1, 'Son', '0706887595', 'John', '2022-09-12', 'Kangau', 'St. paul', '2022-10-14', 'Rev.Fr.Kivosyo'),
(2, 'Son', '0706887595', 'John', '2022-09-12', 'Kangau', 'St. Paul', '2022-11-18', 'Rev.Fr.Masila(P.P)'),
(3, 'Son', '0706887595', 'John', '2022-09-12', 'Kangau', 'St. Paul', '2022-11-18', 'Rev.Fr.Masila(P.P)'),
(4, 'Husband', '0706225894', 'Mwende', '0000-00-00', 'Maaini', 'St Paul', '2022-11-04', 'Rev.Fr.Benard'),
(5, 'Husband', '0706225894', 'Mwende', '2024-11-30', 'Maaini', 'St James', '2022-11-02', 'Rev.Fr.Benard');

-- --------------------------------------------------------

--
-- Table structure for table `christians_registration`
--

CREATE TABLE `christians_registration` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `station` varchar(100) NOT NULL,
  `scc` varchar(100) NOT NULL,
  `card_no` varchar(20) NOT NULL,
  `passport` varchar(100) NOT NULL,
  `sacraments` varchar(200) NOT NULL,
  `gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `christians_registration`
--

INSERT INTO `christians_registration` (`id`, `username`, `password`, `cpassword`, `email`, `mobile`, `station`, `scc`, `card_no`, `passport`, `sacraments`, `gender`) VALUES
(1, 'Anselm', '40d32843bb680cce2d5b1581a00b1b13', '40d32843bb680cce2d5b1581a00b1b13', 'anselm@gmail.com', '0706887595', 'Maseki', 'St. Paul', '1422', 'jm1.jpg', 'Baptism,Confirmation,Eucharist,Penance', 'male'),
(2, 'Makuthu', '385b3be7e64955491b8a0460f7bb0cd1', '385b3be7e64955491b8a0460f7bb0cd1', 'makuthu@gmail.com', '0706254865', 'Kangau', 'St. Peters', '', 'images.jpg', 'Annointing of the sick', 'male'),
(3, 'Jane', '5844a15e76563fedd11840fd6f40ea7b', '5844a15e76563fedd11840fd6f40ea7b', 'jane@gmail.com', '0789876565', 'Maseki', 'St. Francis', '', 'images (2).jpg', 'Annointing of the sick', 'male'),
(4, 'Muthoka', '3cf7fb94736b791d416236f31fa99fc9', '3cf7fb94736b791d416236f31fa99fc9', 'muthoka@gmail.com', '0789857734', 'Kangau', 'St. Pius', '', 'images (2).jpg', 'Annointing of the sick', 'male'),
(5, 'John', '527bd5b5d689e2c32ae974c6229ff785', '527bd5b5d689e2c32ae974c6229ff785', 'john@gmail.com', '0756895456', 'Maseki', 'St.Paul', '', 'images (2).jpg', 'Annointing of the sick', 'male'),
(6, 'Peter', '51dc30ddc473d43a6011e9ebba6ca770', '51dc30ddc473d43a6011e9ebba6ca770', 'peter@gmail.com', '0745896584', 'Kyaani', 'St Paul', '', 'images (1).jpg', 'Annointing of the sick', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `confirmation_class`
--

CREATE TABLE `confirmation_class` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `confirm_password` varchar(200) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `confirmation_name` varchar(100) NOT NULL,
  `baptismal_name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `card_no` varchar(20) NOT NULL,
  `baptismal_parent` varchar(100) NOT NULL,
  `station` varchar(100) NOT NULL,
  `scc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `confirmation_class`
--

INSERT INTO `confirmation_class` (`id`, `username`, `password`, `confirm_password`, `first_name`, `confirmation_name`, `baptismal_name`, `surname`, `card_no`, `baptismal_parent`, `station`, `scc`) VALUES
(1, 'Anselm', '1234', '1234', 'Mutei', 'Anselm', 'Jackson', 'Mwalimu', '4230', 'Mboya Mutua', 'Maseki', 'St. Paul'),
(2, 'Anselm', '', '', '', 'John', 'Jackson', 'Mwalimu', '1422', '', 'Maseki', ''),
(3, '', '', '', '', '', '', '', '', '', 'Maseki', ''),
(4, 'anselm', '', '', '', 'Dickson', 'Jackson', 'Mwalimu', '3455', '', 'Kivaani', '');

-- --------------------------------------------------------

--
-- Table structure for table `deceased`
--

CREATE TABLE `deceased` (
  `id` int(11) NOT NULL,
  `nextKin` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `cardNo` varchar(100) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `DDD` date NOT NULL,
  `outStation` varchar(100) NOT NULL,
  `SCC` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deceased`
--

INSERT INTO `deceased` (`id`, `nextKin`, `mobile`, `cardNo`, `fullName`, `DDD`, `outStation`, `SCC`) VALUES
(1, 'Husband', '0706225894', '4589', 'Mwende Rose', '0000-00-00', 'Maaini', 'St. Paul'),
(2, 'Son', '0706887595', '8564', 'Peter Iloo', '2022-09-11', 'Maseki', 'St. Francis'),
(3, 'Son', '0706887595', '6785', 'John Kivundu', '2022-09-12', 'Kangau', 'St. Paul'),
(4, 'Son', '0706887595', '8574', 'Peter Nzuki Iloo', '2022-09-14', 'Maseki', 'St. Francis'),
(5, 'Son', '2548575', '594', 'James Peter', '2022-09-14', 'Maseki', 'St Paul'),
(6, 'Wife', '0790806488', '5687', 'Peter Nzuki Iloo', '2022-09-22', 'Maseki', 'St. Paul'),
(7, 'Wife', '0706887595', '4520', 'Peter Nzuki', '2022-09-03', 'Maseki', 'St.Paul'),
(8, 'Husband', '075685954', '5896', 'Dominic Klonzo', '2009-09-22', 'Kikanga', 'St. Paul'),
(9, 'Wife', '0706887595', '4250', 'Peter Iloo', '2022-10-01', 'Maseki', 'St. Paul'),
(13, 'Wife', '0786575366', '2040', 'Peter Owuor', '2022-10-22', 'Kikanga', 'St. Peter'),
(14, 'Husband', '0788987657', '1422', 'Caroline James', '2022-10-29', 'Kyaani', 'St. Peters'),
(15, 'Husband', '0078987656', '1010', 'Joel Paul', '2022-10-29', 'Kyaani', 'St. Peters'),
(16, 'Husband', '0078987656', '1010', 'Joel Paul', '2022-10-29', 'Kyaani', 'St. Peters'),
(17, 'Wife', '0898787667', '1422', 'Anselm Jackson', '2022-10-29', 'Kyaani', 'kyaani'),
(18, 'Son', '0788765453', '1422', 'James Peter', '2022-10-29', 'Kivaani', 'kivaani'),
(19, 'Son', '0706887595', '1422', 'Peter Iloo', '2022-10-29', 'Kivaani', 'St. James'),
(20, 'Wife', '0798765465', '1422', 'Joel Musau', '2022-10-29', 'Kikanga', 'Mwaani'),
(21, 'Wife', '0727446739', '1422', 'Peter Iloo', '2021-01-11', 'Maseki', 'St_Paul'),
(22, 'Wife', '0745856595', '1422', 'James John', '2022-11-02', 'Kanuli', 'st James'),
(23, 'Wife', '0727446739', '1422', 'Peter Iloo', '2022-11-02', 'Mwaani', 'St Paul'),
(25, 'Son', '0706887595', '1422', 'Jackson Mwalimu', '2023-01-07', 'Maseki', 'St. Paul');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mode` varchar(100) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `account` varchar(100) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `station` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `name`, `mode`, `purpose`, `account`, `amount`, `station`) VALUES
(1, 'Maseki', 'MPESA', 'Baptismal_Class', '0706887595', '5000', 'Maseki'),
(2, 'Maiini', 'MPESA', 'Baptismal_Class', '07458695866', '4000', 'Kivaani'),
(3, 'Maseki', 'MPESA', 'Baptismal_Class', '0727446739', '4000', 'Maseki');

-- --------------------------------------------------------

--
-- Table structure for table `mass_schedule`
--

CREATE TABLE `mass_schedule` (
  `id` int(11) NOT NULL,
  `station` varchar(100) NOT NULL,
  `mass_month` varchar(100) NOT NULL,
  `mass_date` date NOT NULL,
  `mass_from` time NOT NULL,
  `mass_to` time NOT NULL,
  `priest` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mass_schedule`
--

INSERT INTO `mass_schedule` (`id`, `station`, `mass_month`, `mass_date`, `mass_from`, `mass_to`, `priest`) VALUES
(1, 'Kyaani', 'October', '2022-11-06', '11:10:00', '00:10:00', 'Rev.Fr.Masila(P.P)'),
(2, 'Wanzua', 'November', '2022-11-06', '08:00:00', '11:00:00', 'Rev.Fr.Benard');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `baptismal_class`
--
ALTER TABLE `baptismal_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `burial_mass`
--
ALTER TABLE `burial_mass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `christians_registration`
--
ALTER TABLE `christians_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confirmation_class`
--
ALTER TABLE `confirmation_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deceased`
--
ALTER TABLE `deceased`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mass_schedule`
--
ALTER TABLE `mass_schedule`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `baptismal_class`
--
ALTER TABLE `baptismal_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `burial_mass`
--
ALTER TABLE `burial_mass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `christians_registration`
--
ALTER TABLE `christians_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `confirmation_class`
--
ALTER TABLE `confirmation_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `deceased`
--
ALTER TABLE `deceased`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mass_schedule`
--
ALTER TABLE `mass_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
