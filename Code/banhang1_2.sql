-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2021 at 03:58 PM
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
-- Table structure for table `nn_admin`
--

CREATE TABLE `nn_admin` (
  `MaUser` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
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
-- Table structure for table `nn_admin_nhom`
--

CREATE TABLE `nn_admin_nhom` (
  `Ma` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Ten` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `MoTa` text COLLATE utf8_unicode_ci NOT NULL,
  `CapCha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nn_admin_quyen`
--

CREATE TABLE `nn_admin_quyen` (
  `MaUser` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MaNhom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Action` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

--
-- Dumping data for table `nn_hanghoa`
--

INSERT INTO `nn_hanghoa` (`MaHH`, `Code`, `TenHH`, `TenKhongDau`, `Gia`, `SoLuong`, `MaLoai`, `MaNCC`, `NguonGoc`, `QuyCachDongGoi`, `MoTaNgan`, `BaiViet`, `ThongSoKyThuat`, `SoLanXem`, `SoLanMua`, `HienThi`, `GiamGia`, `TinhTrang`, `DanhGia`, `NgayNhap`, `NgayHetHan`, `NgayCapNhat`, `User`, `Images`, `Lang`) VALUES
(5, 'Code', 'TenHH 11', 'TenKhongDau', '0.00', 100, 1, 1, 'NguonGoc', 'QuyCachDongGoi', 'MoTaNgan', 'BaiViet', 'ThongSoKyThuat', 0, 0, 0, '0.00', 0, 0, '2021-01-01 00:00:00', '2021-01-01 00:00:00', '2021-01-01 00:00:00', 0, 'Images', 'vi'),
(8, 'Code1', 'TenHH 11', 'TenKhongDau', '10.00', 200, 2, 2, 'NguonGoc', 'QuyCachDongGoi', 'MoTaNgan', 'BaiViet', 'ThongSoKyThuat', 0, 0, 0, '0.00', 0, 0, '2021-01-01 00:00:00', '2021-01-01 00:00:00', '2021-01-01 00:00:00', 0, 'Images', 'vi'),
(9, 'Code2', 'TenHH 11', 'TenKhongDau', '20.00', 300, 3, 1, 'NguonGoc', 'QuyCachDongGoi', 'MoTaNgan', 'BaiViet', 'ThongSoKyThuat', 0, 0, 0, '0.00', 0, 0, '2021-01-01 00:00:00', '2021-01-01 00:00:00', '2021-01-01 00:00:00', 0, 'Images', 'vi'),
(10, 'Code3', 'TenHH 11', 'TenKhongDau', '40.00', 500, 3, 2, 'NguonGoc', 'QuyCachDongGoi', 'MoTaNgan', 'BaiViet', 'ThongSoKyThuat', 0, 0, 0, '0.00', 0, 0, '2021-01-01 00:00:00', '2021-01-01 00:00:00', '2021-01-01 00:00:00', 0, 'Images', 'vi'),
(11, 'Code4', 'TenHH 11', 'TenKhongDau', '60.00', 10, 4, 1, 'NguonGoc', 'QuyCachDongGoi', 'MoTaNgan', 'BaiViet', 'ThongSoKyThuat', 0, 0, 0, '0.00', 0, 0, '2021-01-01 00:00:00', '2021-01-01 00:00:00', '2021-01-01 00:00:00', 0, 'Images', 'vi'),
(12, 'Code5', 'TenHH 11', 'TenKhongDau', '70.00', 20, 2, 1, 'NguonGoc', 'QuyCachDongGoi', 'MoTaNgan', 'BaiViet', 'ThongSoKyThuat', 0, 0, 0, '0.00', 0, 0, '2021-01-01 00:00:00', '2021-01-01 00:00:00', '2021-01-01 00:00:00', 0, 'Images', 'vi'),
(13, 'Code6', 'TenHH 11', 'TenKhongDau', '100.00', 50, 1, 1, 'NguonGoc', 'QuyCachDongGoi', 'MoTaNgan', 'BaiViet', 'ThongSoKyThuat', 0, 0, 0, '0.00', 0, 0, '2021-01-01 00:00:00', '2021-01-01 00:00:00', '2021-01-01 00:00:00', 0, 'Images', 'vi'),
(14, 'Code7', 'TenHH 11', 'TenKhongDau', '100.00', 1000, 1, 1, 'NguonGoc', 'QuyCachDongGoi', 'MoTaNgan', 'BaiViet', 'ThongSoKyThuat', 0, 0, 0, '0.00', 0, 0, '2021-01-01 00:00:00', '2021-01-01 00:00:00', '2021-01-01 00:00:00', 0, 'Images', 'vi');

--
-- Triggers `nn_hanghoa`
--
DELIMITER $$
CREATE TRIGGER `ThemHangHoa` AFTER INSERT ON `nn_hanghoa` FOR EACH ROW UPDATE `nn_loai` SET `SoLuongSanPham` = `SoLuongSanPham`  +1 WHERE `MaLoai` = NEW.MaLoai
$$
DELIMITER ;

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
-- Table structure for table `nn_lichsudangnhap`
--

CREATE TABLE `nn_lichsudangnhap` (
  `Id` int(11) NOT NULL,
  `MaKH` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TrinhDuyet` text COLLATE utf8_unicode_ci NOT NULL,
  `IP` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NgayThang` datetime NOT NULL,
  `Token` text COLLATE utf8_unicode_ci NOT NULL
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
  `Lang` varchar(5) COLLATE utf8_unicode_ci DEFAULT 'vi',
  `AnHien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nn_loai`
--

INSERT INTO `nn_loai` (`MaLoai`, `TenLoai`, `TenKhongDau`, `SoLuongSanPham`, `STT`, `ThongSoKyThuat`, `Lang`, `AnHien`) VALUES
(1, 'Ao Thun', 'ao-thun', 8, NULL, NULL, 'vi', 0),
(2, 'Ao Khoac 1', 'ao-khoac-1', 1, 1, '{}', 'vi', 0),
(3, 'Ao Khoac', 'ao-khoac', 1, 1, '{}', 'vi', 0),
(4, 'Ao Khoac', 'ao-khoac', 1, 1, '{}', 'vi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nn_loaitin`
--

CREATE TABLE `nn_loaitin` (
  `MaLoai` int(11) NOT NULL,
  `TenLoai` text COLLATE utf8_unicode_ci NOT NULL,
  `TenKhongDau` text COLLATE utf8_unicode_ci NOT NULL,
  `SoLuongTin` int(11) NOT NULL,
  `STT` int(11) NOT NULL,
  `NgonNgu` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nn_menu`
--

CREATE TABLE `nn_menu` (
  `Ma` int(11) NOT NULL,
  `Ten` text COLLATE utf8_unicode_ci NOT NULL,
  `Link` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `HinhAnh` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `STT` int(11) NOT NULL,
  `HienThi` int(11) NOT NULL,
  `ViTri` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Nhom` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CapCha` int(11) DEFAULT NULL,
  `GhiChu` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `AnHien` int(11) NOT NULL,
  `Lang` varchar(5) COLLATE utf8_unicode_ci DEFAULT 'vi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nn_ncc`
--

INSERT INTO `nn_ncc` (`MaNCC`, `TenNCC`, `SDT`, `DiaChi`, `BaiViet`, `Logo`, `AnHien`, `Lang`) VALUES
(1, 'Like', '', '', '\'NULL\'', NULL, 0, 'vi'),
(2, 'Like 1', '', '', '\'NULL\'', NULL, 0, 'vi');

-- --------------------------------------------------------

--
-- Table structure for table `nn_ngonngu`
--

CREATE TABLE `nn_ngonngu` (
  `Ma` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `HienThi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nn_quangcao`
--

CREATE TABLE `nn_quangcao` (
  `Ma` int(11) NOT NULL,
  `Ten` text COLLATE utf8_unicode_ci NOT NULL,
  `Link` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `HinhAnh` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `STT` int(11) NOT NULL,
  `HienThi` int(11) NOT NULL,
  `ViTri` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Nhom` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CapCha` int(11) DEFAULT NULL,
  `GhiChu` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Table structure for table `nn_thongtincty`
--

CREATE TABLE `nn_thongtincty` (
  `MaTT` int(11) NOT NULL,
  `TenTT` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `GiaTri` text COLLATE utf8_unicode_ci NOT NULL,
  `NgonNgu` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Active` int(11) NOT NULL,
  `Title` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nn_tin`
--

CREATE TABLE `nn_tin` (
  `MaTin` int(11) NOT NULL,
  `TieuDe` text COLLATE utf8_unicode_ci NOT NULL,
  `TieuDeKhongDau` text COLLATE utf8_unicode_ci NOT NULL,
  `Loai` int(11) NOT NULL,
  `NgayHienThi` datetime NOT NULL,
  `TinHot` int(11) NOT NULL,
  `MoTaNgan` text COLLATE utf8_unicode_ci NOT NULL,
  `BaiViet` longtext COLLATE utf8_unicode_ci NOT NULL,
  `SoLanXem` int(11) NOT NULL,
  `HienThi` int(11) NOT NULL,
  `TinhTrang` int(11) NOT NULL,
  `NgayNhap` datetime NOT NULL,
  `NgayCapNhat` datetime NOT NULL,
  `User` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Images` text COLLATE utf8_unicode_ci NOT NULL,
  `NgonNgu` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nn_trang`
--

CREATE TABLE `nn_trang` (
  `MaTrang` int(11) NOT NULL,
  `TieuDe` text COLLATE utf8_unicode_ci NOT NULL,
  `TieuDeKhongDau` text COLLATE utf8_unicode_ci NOT NULL,
  `MoTaNgan` text COLLATE utf8_unicode_ci NOT NULL,
  `BaiViet` longtext COLLATE utf8_unicode_ci NOT NULL,
  `SoLanXem` int(11) NOT NULL,
  `HienThi` int(11) NOT NULL,
  `TinhTrang` int(11) NOT NULL,
  `NgayNhap` datetime NOT NULL,
  `NgayCapNhat` datetime NOT NULL,
  `User` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Images` text COLLATE utf8_unicode_ci NOT NULL,
  `NgonNgu` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nn_yeuthich`
--

CREATE TABLE `nn_yeuthich` (
  `MaKH` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MaHH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nn_admin`
--
ALTER TABLE `nn_admin`
  ADD PRIMARY KEY (`MaUser`);

--
-- Indexes for table `nn_admin_nhom`
--
ALTER TABLE `nn_admin_nhom`
  ADD PRIMARY KEY (`Ma`);

--
-- Indexes for table `nn_admin_quyen`
--
ALTER TABLE `nn_admin_quyen`
  ADD PRIMARY KEY (`MaUser`,`MaNhom`,`Action`);

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
-- Indexes for table `nn_lichsudangnhap`
--
ALTER TABLE `nn_lichsudangnhap`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `nn_loai`
--
ALTER TABLE `nn_loai`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Indexes for table `nn_loaitin`
--
ALTER TABLE `nn_loaitin`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Indexes for table `nn_menu`
--
ALTER TABLE `nn_menu`
  ADD PRIMARY KEY (`Ma`);

--
-- Indexes for table `nn_ncc`
--
ALTER TABLE `nn_ncc`
  ADD PRIMARY KEY (`MaNCC`);

--
-- Indexes for table `nn_ngonngu`
--
ALTER TABLE `nn_ngonngu`
  ADD PRIMARY KEY (`Ma`);

--
-- Indexes for table `nn_quangcao`
--
ALTER TABLE `nn_quangcao`
  ADD PRIMARY KEY (`Ma`);

--
-- Indexes for table `nn_sanphamdaxem`
--
ALTER TABLE `nn_sanphamdaxem`
  ADD PRIMARY KEY (`MaHH`,`MaKH`);

--
-- Indexes for table `nn_thongtincty`
--
ALTER TABLE `nn_thongtincty`
  ADD PRIMARY KEY (`MaTT`);

--
-- Indexes for table `nn_tin`
--
ALTER TABLE `nn_tin`
  ADD PRIMARY KEY (`MaTin`);
ALTER TABLE `nn_tin` ADD FULLTEXT KEY `TieuDe` (`TieuDe`,`TieuDeKhongDau`);

--
-- Indexes for table `nn_trang`
--
ALTER TABLE `nn_trang`
  ADD PRIMARY KEY (`MaTrang`);
ALTER TABLE `nn_trang` ADD FULLTEXT KEY `TieuDe` (`TieuDe`,`TieuDeKhongDau`);

--
-- Indexes for table `nn_yeuthich`
--
ALTER TABLE `nn_yeuthich`
  ADD PRIMARY KEY (`MaKH`,`MaHH`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nn_hanghoa`
--
ALTER TABLE `nn_hanghoa`
  MODIFY `MaHH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nn_lichsudangnhap`
--
ALTER TABLE `nn_lichsudangnhap`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nn_loai`
--
ALTER TABLE `nn_loai`
  MODIFY `MaLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nn_loaitin`
--
ALTER TABLE `nn_loaitin`
  MODIFY `MaLoai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nn_menu`
--
ALTER TABLE `nn_menu`
  MODIFY `Ma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nn_ncc`
--
ALTER TABLE `nn_ncc`
  MODIFY `MaNCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nn_quangcao`
--
ALTER TABLE `nn_quangcao`
  MODIFY `Ma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nn_thongtincty`
--
ALTER TABLE `nn_thongtincty`
  MODIFY `MaTT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nn_tin`
--
ALTER TABLE `nn_tin`
  MODIFY `MaTin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nn_trang`
--
ALTER TABLE `nn_trang`
  MODIFY `MaTrang` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `Loai_HangHoa` FOREIGN KEY (`MaLoai`) REFERENCES `nn_loai` (`MaLoai`),
  ADD CONSTRAINT `NCC_HangHoa` FOREIGN KEY (`MaNCC`) REFERENCES `nn_ncc` (`MaNCC`);

--
-- Constraints for table `nn_hinhhanghoa`
--
ALTER TABLE `nn_hinhhanghoa`
  ADD CONSTRAINT `HangHoa_Hinh` FOREIGN KEY (`MaHH`) REFERENCES `nn_hanghoa` (`MaHH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
