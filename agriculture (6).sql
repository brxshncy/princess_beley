-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2020 at 12:36 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agriculture`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `area_inspected`
--

CREATE TABLE `area_inspected` (
  `id` int(11) NOT NULL,
  `date_inspected` date NOT NULL,
  `barangay_area` int(11) NOT NULL,
  `area_address` varchar(50) NOT NULL,
  `commodity` varchar(300) NOT NULL,
  `soil_type` varchar(50) NOT NULL,
  `area_platform` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area_inspected`
--

INSERT INTO `area_inspected` (`id`, `date_inspected`, `barangay_area`, `area_address`, `commodity`, `soil_type`, `area_platform`) VALUES
(15, '2020-02-02', 1, 'daadd', '100,101,102', 'Sandy Soil', 'Elevated');

-- --------------------------------------------------------

--
-- Table structure for table `barangay`
--

CREATE TABLE `barangay` (
  `id` int(11) NOT NULL,
  `baranggay_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barangay`
--

INSERT INTO `barangay` (`id`, `baranggay_name`) VALUES
(1, 'Abuno'),
(2, 'Acmac'),
(3, 'Bagong Silang'),
(4, 'Bonbonon'),
(5, 'Bunawan'),
(6, 'Buru-un'),
(7, 'Dalipuga'),
(8, 'Del Carmen'),
(9, 'Digkilaan'),
(10, 'Ditucalan'),
(11, 'Dulag'),
(12, 'Hinaplanon'),
(13, 'Hindang'),
(14, 'Kabacsanan'),
(15, 'Kalilangan'),
(16, 'Kiwalan'),
(17, 'Lanipao'),
(18, 'Luinab'),
(19, 'Mahayahay'),
(20, 'Mainit'),
(21, 'Mandulog'),
(22, 'Maria Cristina'),
(23, 'Pala-o'),
(24, 'Panoroganan'),
(25, 'Puga-an'),
(26, 'Rogongon'),
(27, 'San Miguel'),
(28, 'San Roque'),
(29, 'Santa Elena'),
(30, 'Santa Filomena'),
(31, 'Santiago'),
(32, 'Santo Rosario'),
(33, 'Saray'),
(34, 'Suarez'),
(35, 'Tambacan'),
(36, 'Tibanga'),
(37, 'Tipanoy'),
(38, 'Tomas L. Cabili (Tominobo Proper)'),
(39, 'Tominobo Upper'),
(40, 'Tubod'),
(41, 'Ubaldo Laya'),
(42, 'Upper Hinaplanon'),
(43, 'Villa Verde'),
(87, 'Poblacion');

-- --------------------------------------------------------

--
-- Table structure for table `benefeciaries`
--

CREATE TABLE `benefeciaries` (
  `id` int(11) NOT NULL,
  `benefeciaries` varchar(100) NOT NULL,
  `contact` bigint(12) NOT NULL,
  `specific_area` int(11) NOT NULL,
  `dc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `benefeciaries`
--

INSERT INTO `benefeciaries` (`id`, `benefeciaries`, `contact`, `specific_area`, `dc_id`) VALUES
(21, 'Princess Ann', 9957168082, 15, 3);

-- --------------------------------------------------------

--
-- Table structure for table `commodity`
--

CREATE TABLE `commodity` (
  `id` int(11) NOT NULL,
  `commodity_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commodity`
--

INSERT INTO `commodity` (`id`, `commodity_name`) VALUES
(100, 'kamunggay'),
(101, 'bean'),
(102, 'kang kong');

-- --------------------------------------------------------

--
-- Table structure for table `district_coordinator`
--

CREATE TABLE `district_coordinator` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `bday` date NOT NULL,
  `contact` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `area_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `district_coordinator`
--

INSERT INTO `district_coordinator` (`id`, `fname`, `lname`, `bday`, `contact`, `address`, `username`, `password`, `area_id`, `status`) VALUES
(2, 'majah', 'beley', '1995-02-02', 12345678, 'dada uccc syudad, iligan city', 'majah', 'beley', 23, 0),
(3, 'princess', 'cardino', '1993-02-02', 1234, 'tibanga tubod lanao', 'prin', '12', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `equipment_name` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL,
  `commodity` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `availability` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `equipment_name`, `description`, `commodity`, `capacity`, `unit`, `status`, `availability`) VALUES
(16, 'sprayers', 'daddada', '100,101,102', 200, 'tons', '1', 1),
(17, 'sprayer', 'dadda', '100,101,102', 200, 'dada', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `equipment_maintenance`
--

CREATE TABLE `equipment_maintenance` (
  `id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `date_sched` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `return_equipment`
--

CREATE TABLE `return_equipment` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `date_return` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `return_equipment`
--

INSERT INTO `return_equipment` (`id`, `transaction_id`, `date_return`) VALUES
(5, 15, '2020-03-06');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `username`, `password`) VALUES
(1, 'staff', 'qwer');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `eqp_id` int(11) NOT NULL,
  `bfcry_id` int(11) NOT NULL,
  `dc_id` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `date_borrowed` date NOT NULL,
  `date_return` date NOT NULL,
  `status` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `dc_notif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `eqp_id`, `bfcry_id`, `dc_id`, `reason`, `date_borrowed`, `date_return`, `status`, `state`, `dc_notif`) VALUES
(15, 16, 21, 3, 'dddadada', '2020-02-02', '2020-03-02', 1, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area_inspected`
--
ALTER TABLE `area_inspected`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barangay`
--
ALTER TABLE `barangay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benefeciaries`
--
ALTER TABLE `benefeciaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commodity`
--
ALTER TABLE `commodity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district_coordinator`
--
ALTER TABLE `district_coordinator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment_maintenance`
--
ALTER TABLE `equipment_maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_equipment`
--
ALTER TABLE `return_equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `area_inspected`
--
ALTER TABLE `area_inspected`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `barangay`
--
ALTER TABLE `barangay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `benefeciaries`
--
ALTER TABLE `benefeciaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `commodity`
--
ALTER TABLE `commodity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `district_coordinator`
--
ALTER TABLE `district_coordinator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `equipment_maintenance`
--
ALTER TABLE `equipment_maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `return_equipment`
--
ALTER TABLE `return_equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
