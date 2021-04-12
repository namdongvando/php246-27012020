-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2021 at 03:51 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banhang1`
--

-- --------------------------------------------------------

--
-- Table structure for table `nn_comment`
--

CREATE TABLE `nn_comment` (
  `MaHH` int(11) NOT NULL,
  `MaKH` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung` text COLLATE utf8_unicode_ci NOT NULL,
  `NgayDang` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nn_donhang`
--

CREATE TABLE `nn_donhang` (
  `MaDH` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NgayTao` datetime NOT NULL,
  `TongTien` decimal(18,2) NOT NULL,
  `MaKH` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` text COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TinhTrang` tinyint(4) NOT NULL,
  `TinhThanh` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `QuanHuyen` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nn_donhang_chitiet`
--

CREATE TABLE `nn_donhang_chitiet` (
  `MaHH` int(11) NOT NULL,
  `MaDH` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Gia` decimal(10,0) NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nn_hanghoa`
--

CREATE TABLE `nn_hanghoa` (
  `MaHH` int(11) NOT NULL,
  `Code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TenHH` text COLLATE utf8_unicode_ci NOT NULL,
  `TenKhongDau` text COLLATE utf8_unicode_ci NOT NULL,
  `Gia` decimal(18,2) NOT NULL,
  `SoLuong` int(11) DEFAULT 0,
  `MaLoai` int(11) NOT NULL,
  `MaNCC` int(11) NOT NULL,
  `NguonGoc` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `QuyCachDongGoi` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `MoTaNgan` text COLLATE utf8_unicode_ci NOT NULL,
  `BaiViet` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ThongSoKyThuat` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `SoLanXem` int(11) DEFAULT 0,
  `SoLanMua` int(11) DEFAULT 0,
  `HienThi` int(11) DEFAULT 0,
  `GiamGia` decimal(18,2) DEFAULT 0.00,
  `TinhTrang` int(11) DEFAULT 0,
  `DanhGia` double DEFAULT 0,
  `NgayNhap` datetime DEFAULT NULL,
  `NgayHetHan` datetime DEFAULT NULL,
  `NgayCapNhat` datetime DEFAULT NULL,
  `User` int(11) DEFAULT NULL,
  `Images` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Lang` varchar(5) COLLATE utf8_unicode_ci DEFAULT 'vi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nn_hinhhanghoa`
--

CREATE TABLE `nn_hinhhanghoa` (
  `MaHH` int(11) NOT NULL,
  `Images` text COLLATE utf8_unicode_ci NOT NULL,
  `Nhom` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nn_khachhang`
--

CREATE TABLE `nn_khachhang` (
  `MaKH` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `SDT` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TaiKhoan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `RandomKey` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` text COLLATE utf8_unicode_ci NOT NULL,
  `TinhThanh` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `QuanHuyen` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinh` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nn_loai`
--

CREATE TABLE `nn_loai` (
  `MaLoai` int(11) NOT NULL,
  `TenLoai` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `TenKhongDau` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `SoLuongSanPham` int(11) DEFAULT 0,
  `STT` int(11) DEFAULT NULL,
  `ThongSoKyThuat` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `Lang` varchar(5) COLLATE utf8_unicode_ci DEFAULT 'vi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nn_loai`
--

INSERT INTO `nn_loai` (`MaLoai`, `TenLoai`, `TenKhongDau`, `SoLuongSanPham`, `STT`, `ThongSoKyThuat`, `Lang`) VALUES
(1, 'Ao Thun', 'ao-thun', 0, NULL, NULL, 'vi');

-- --------------------------------------------------------

--
-- Table structure for table `nn_ncc`
--

CREATE TABLE `nn_ncc` (
  `MaNCC` int(11) NOT NULL,
  `TenNCC` text COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` text COLLATE utf8_unicode_ci NOT NULL,
  `BaiViet` longtext COLLATE utf8_unicode_ci DEFAULT 'NULL',
  `Logo` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Lang` varchar(5) COLLATE utf8_unicode_ci DEFAULT 'vi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nn_ncc`
--

INSERT INTO `nn_ncc` (`MaNCC`, `TenNCC`, `SDT`, `DiaChi`, `BaiViet`, `Logo`, `Lang`) VALUES
(1, 'Like', '', '', '\'NULL\'', NULL, 'vi');

-- --------------------------------------------------------

--
-- Table structure for table `nn_sanphamdaxem`
--

CREATE TABLE `nn_sanphamdaxem` (
  `MaHH` int(11) NOT NULL,
  `MaKH` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NgayXem` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nn_yeuthic`
--

CREATE TABLE `nn_yeuthic` (
  `MaKH` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MaHH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nn_comment`
--
ALTER TABLE `nn_comment`
  ADD PRIMARY KEY (`MaHH`,`MaKH`);

--
-- Indexes for table `nn_donhang`
--
ALTER TABLE `nn_donhang`
  ADD PRIMARY KEY (`MaDH`),
  ADD KEY `KhachHang_DonHang` (`MaKH`);

--
-- Indexes for table `nn_donhang_chitiet`
--
ALTER TABLE `nn_donhang_chitiet`
  ADD PRIMARY KEY (`MaHH`,`MaDH`),
  ADD KEY `DonHang_DonHangChiTiet` (`MaDH`);

--
-- Indexes for table `nn_hanghoa`
--
ALTER TABLE `nn_hanghoa`
  ADD PRIMARY KEY (`MaHH`),
  ADD UNIQUE KEY `Code` (`Code`),
  ADD KEY `NCC_HangHoa` (`MaNCC`),
  ADD KEY `Loai_HangHoa` (`MaLoai`);

--
-- Indexes for table `nn_hinhhanghoa`
--
ALTER TABLE `nn_hinhhanghoa`
  ADD PRIMARY KEY (`MaHH`);

--
-- Indexes for table `nn_khachhang`
--
ALTER TABLE `nn_khachhang`
  ADD PRIMARY KEY (`MaKH`);

--
-- Indexes for table `nn_loai`
--
ALTER TABLE `nn_loai`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Indexes for table `nn_ncc`
--
ALTER TABLE `nn_ncc`
  ADD PRIMARY KEY (`MaNCC`);

--
-- Indexes for table `nn_sanphamdaxem`
--
ALTER TABLE `nn_sanphamdaxem`
  ADD PRIMARY KEY (`MaHH`,`MaKH`);

--
-- Indexes for table `nn_yeuthic`
--
ALTER TABLE `nn_yeuthic`
  ADD PRIMARY KEY (`MaKH`,`MaHH`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nn_hanghoa`
--
ALTER TABLE `nn_hanghoa`
  MODIFY `MaHH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nn_loai`
--
ALTER TABLE `nn_loai`
  MODIFY `MaLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nn_ncc`
--
ALTER TABLE `nn_ncc`
  MODIFY `MaNCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nn_donhang`
--
ALTER TABLE `nn_donhang`
  ADD CONSTRAINT `KhachHang_DonHang` FOREIGN KEY (`MaKH`) REFERENCES `nn_khachhang` (`MaKH`);

--
-- Constraints for table `nn_donhang_chitiet`
--
ALTER TABLE `nn_donhang_chitiet`
  ADD CONSTRAINT `DonHang_DonHangChiTiet` FOREIGN KEY (`MaDH`) REFERENCES `nn_donhang` (`MaDH`),
  ADD CONSTRAINT `HangHoa_DonHangChiTiet` FOREIGN KEY (`MaHH`) REFERENCES `nn_hanghoa` (`MaHH`);

--
-- Constraints for table `nn_hanghoa`
--
ALTER TABLE `nn_hanghoa`
  ADD CONSTRAINT `HangHoa_Hinh` FOREIGN KEY (`MaHH`) REFERENCES `nn_hinhhanghoa` (`MaHH`),
  ADD CONSTRAINT `Loai_HangHoa` FOREIGN KEY (`MaLoai`) REFERENCES `nn_loai` (`MaLoai`),
  ADD CONSTRAINT `NCC_HangHoa` FOREIGN KEY (`MaNCC`) REFERENCES `nn_ncc` (`MaNCC`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
