-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2019 at 04:32 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlchts`
--

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `mahoadon` int(11) NOT NULL,
  `ngaylap` date NOT NULL,
  `soluong` int(11) NOT NULL,
  `tongtien` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `masanpham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`mahoadon`, `ngaylap`, `soluong`, `tongtien`, `id`, `masanpham`) VALUES
(1, '2019-05-09', 3, 90000, 1, 1),
(2, '2019-05-10', 2, 80000, 2, 2),
(3, '2019-05-09', 2, 90000, 1, 1),
(4, '2019-05-19', 2, 87000, 2, 1),
(5, '2019-05-15', 2, 91000, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `nhaccc`
--

CREATE TABLE `nhaccc` (
  `mancc` int(11) NOT NULL,
  `tenncc` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhaccc`
--

INSERT INTO `nhaccc` (`mancc`, `tenncc`, `diachi`, `sdt`) VALUES
(1, 'dingtea', 'hồ tùng mậu', 328878827),
(2, 'toco', 'cầu giấy', 345276840),
(4, 'toco3', 'hồ tùng mậu', 328345885),
(5, 'abcabc', 'trần quốc hoàn1', 961963494);

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(11) NOT NULL,
  `ten` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `soCMND` int(11) NOT NULL,
  `sdt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `ten`, `soCMND`, `sdt`) VALUES
(1, 'Nguyễn Thị Hương', 184234567, 328345885),
(2, 'Vũ Thị Lê', 184256058, 328800235),
(3, 'Huyền', 35476583, 328875730),
(4, 'Duyên1', 184377084, 961963493),
(5, 'Hoàng Thị Ngọc Huyền', 3813730, 12345);

-- --------------------------------------------------------

--
-- Table structure for table `trasua`
--

CREATE TABLE `trasua` (
  `masanpham` int(11) NOT NULL,
  `tensanpham` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dongia` int(11) NOT NULL,
  `mancc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trasua`
--

INSERT INTO `trasua` (`masanpham`, `tensanpham`, `size`, `dongia`, `mancc`) VALUES
(1, 'Trà sữa socola', 's', 45000, 1),
(2, 'Sữa tươi trân châu', 'm', 40000, 2),
(3, 'sinh tố bơ', 's', 40000, 1),
(4, 'trà xanh', 'm', 38000, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`mahoadon`),
  ADD KEY `masanpham` (`masanpham`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `nhaccc`
--
ALTER TABLE `nhaccc`
  ADD PRIMARY KEY (`mancc`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trasua`
--
ALTER TABLE `trasua`
  ADD PRIMARY KEY (`masanpham`),
  ADD KEY `mancc` (`mancc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `mahoadon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nhaccc`
--
ALTER TABLE `nhaccc`
  MODIFY `mancc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trasua`
--
ALTER TABLE `trasua`
  MODIFY `masanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`masanpham`) REFERENCES `trasua` (`masanpham`),
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`id`) REFERENCES `nhanvien` (`id`);

--
-- Constraints for table `trasua`
--
ALTER TABLE `trasua`
  ADD CONSTRAINT `trasua_ibfk_1` FOREIGN KEY (`mancc`) REFERENCES `nhaccc` (`mancc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
