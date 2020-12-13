-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 13, 2020 lúc 02:30 PM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banhotstu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `maadmin` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `ten` varchar(255) NOT NULL,
  PRIMARY KEY (`maadmin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`maadmin`, `email`, `matkhau`, `ten`) VALUES
(1, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'An');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loainhot`
--

DROP TABLE IF EXISTS `loainhot`;
CREATE TABLE IF NOT EXISTS `loainhot` (
  `maloai` char(10) NOT NULL,
  `nhacungcap` varchar(255) DEFAULT NULL,
  `tenhangnhot` varchar(255) NOT NULL,
  PRIMARY KEY (`maloai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loainhot`
--

INSERT INTO `loainhot` (`maloai`, `nhacungcap`, `tenhangnhot`) VALUES
('GC', NULL, 'Goracing'),
('MT', NULL, 'Motul'),
('RL', NULL, 'Repsol'),
('SL', NULL, 'Shell');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `masp` int(11) NOT NULL AUTO_INCREMENT,
  `tensp` varchar(255) NOT NULL,
  `gia` varchar(255) NOT NULL,
  `thongso` varchar(255) NOT NULL,
  `phuhopxe` varchar(255) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `maloai` char(10) NOT NULL,
  `mota` text NOT NULL,
  PRIMARY KEY (`masp`),
  KEY `sanpham_ibfk_1` (`maloai`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `gia`, `thongso`, `phuhopxe`, `hinhanh`, `maloai`, `mota`) VALUES
(7, 'Motul 300V Pháp', '445000', 'Nhớt tổng hợp 100%', 'Xe số', 'motul-300v-phap-10w40-1l-81256.jpg', 'MT', 'Nhớt 300V Pháp sử dụng công nghệ ESTER Core độc quyền của Motul, đáp ứng các yêu cầu kỹ thuật của những thế hệ động cơ đời mới nhất với tính năng bảo vệ chống mài mòn, điều hòa nhiệt độ tốt, chống giảm áp suất dầu và tránh được hiện tượng oxy hóa ở nhiệt độ cao. Công suất và độ bền màn bảo vệ nhớt cực cao.'),
(8, 'MOTUL 2', '123', 'AA', 'Xe số', 'nhot-fuchs-sikolene-pro-4-10w40-xp-1064-slide-products-5dd25c731433237.png', 'MT', 'AA'),
(9, 'SHELL 1', '456', 'AA', 'Xe số', 'motul-300v-phap-10w40-1l-81254.jpg', 'SL', 'AA'),
(10, 'sads', '213', 'ádas', 'Xe số', '', 'GC', 'sad'),
(11, 'sadf', '23123', 'dsasd', 'Xe số', '', 'GC', 'sadad');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_chitietdondathang`
--

DROP TABLE IF EXISTS `tb_chitietdondathang`;
CREATE TABLE IF NOT EXISTS `tb_chitietdondathang` (
  `MaChiTiet` int(11) NOT NULL AUTO_INCREMENT,
  `MaspMua` int(11) NOT NULL,
  `TenspMua` varchar(255) NOT NULL,
  `GiaspMua` varchar(255) NOT NULL,
  `SoLuongMua` int(11) NOT NULL,
  PRIMARY KEY (`MaChiTiet`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tb_chitietdondathang`
--

INSERT INTO `tb_chitietdondathang` (`MaChiTiet`, `MaspMua`, `TenspMua`, `GiaspMua`, `SoLuongMua`) VALUES
(1, 3, 'MOTUL 2', '123', 2),
(2, 4, 'MOTUL 2', '123', 2),
(3, 5, 'MOTUL 2', '123', 2),
(4, 6, 'MOTUL 2', '123', 2),
(5, 7, 'MOTUL 2', '123', 2),
(6, 8, 'Motul 300V Pháp', '445000', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_dondathang`
--

DROP TABLE IF EXISTS `tb_dondathang`;
CREATE TABLE IF NOT EXISTS `tb_dondathang` (
  `MaDonDH` int(10) NOT NULL AUTO_INCREMENT,
  `SoDTDH` varchar(255) NOT NULL,
  `TenKH` varchar(255) NOT NULL,
  `DiaChiDH` varchar(255) NOT NULL,
  PRIMARY KEY (`MaDonDH`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tb_dondathang`
--

INSERT INTO `tb_dondathang` (`MaDonDH`, `SoDTDH`, `TenKH`, `DiaChiDH`) VALUES
(1, 'sda', 'sad', 'sad'),
(2, 'qdsad', '3123', 'sdasd'),
(3, 'ưewq', 'ưqeqe', 'qưe'),
(4, 'dsad', 'ádas', 'sad'),
(5, 'dsad', 'ádas', 'sad'),
(6, 'ads', 'ádsad', 'sada'),
(7, 'sdad', '123', '2313'),
(8, 'sdad', '123', '2313'),
(9, 'sdad', '123', '2313'),
(10, 'sads', 'sada', 'dsa'),
(11, 'sda', 'sda', 'asd'),
(12, 'hghg', '78787', 'gj'),
(13, 'sad', 'sad', 'sad'),
(14, 'sd', 'sad', 'sad');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_hinhthucthanhtoan`
--

DROP TABLE IF EXISTS `tb_hinhthucthanhtoan`;
CREATE TABLE IF NOT EXISTS `tb_hinhthucthanhtoan` (
  `MaHTTT` int(11) NOT NULL AUTO_INCREMENT,
  `HinhThucThanhToan` varchar(255) NOT NULL,
  `TrangThaiDonDat` varchar(255) NOT NULL,
  PRIMARY KEY (`MaHTTT`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tb_hinhthucthanhtoan`
--

INSERT INTO `tb_hinhthucthanhtoan` (`MaHTTT`, `HinhThucThanhToan`, `TrangThaiDonDat`) VALUES
(1, 'tra tien mat', 'Chờ xử lý'),
(2, 'tra tien mat', 'Chờ xử lý'),
(3, 'tra tien mat', 'Chờ xử lý'),
(4, 'thanh toan online', 'Chờ xử lý'),
(5, 'thanh toan online', 'Chờ xử lý'),
(6, 'thanh toan online', 'Chờ xử lý'),
(7, 'thanh toan online', 'Chờ xử lý'),
(8, 'tra tien mat', 'Chờ xử lý'),
(9, 'tra tien mat', 'Chờ xử lý'),
(10, 'tra tien mat', 'Chờ xử lý'),
(11, 'tra tien mat', 'Chờ xử lý'),
(12, 'tra tien mat', 'Chờ xử lý'),
(13, 'thanh toan online', 'Chờ xử lý'),
(14, 'tra tien mat', 'Chờ xử lý'),
(15, 'tra tien mat', 'Chờ xử lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_khachhang`
--

DROP TABLE IF EXISTS `tb_khachhang`;
CREATE TABLE IF NOT EXISTS `tb_khachhang` (
  `MaKH` int(10) NOT NULL AUTO_INCREMENT,
  `TenKH` varchar(255) NOT NULL,
  `EmailKH` varchar(255) NOT NULL,
  `MatKhauKH` varchar(255) NOT NULL,
  PRIMARY KEY (`MaKH`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tb_khachhang`
--

INSERT INTO `tb_khachhang` (`MaKH`, `TenKH`, `EmailKH`, `MatKhauKH`) VALUES
(1, 'an', 'an2@gmail.com', '12345'),
(2, 'sdsad', 'trtr@gmail.com', '2313231'),
(3, 'dsad', 'mm@gmail.com', '1231231'),
(4, 'cc', '31321@dsd', 'sd'),
(5, 'sad', 'sad', 'ád'),
(6, 'áda', 'sda', 'sad'),
(7, 'Duc', 'duc@gmail.com', '12345'),
(8, 'an', 'kk@gmail.com', '123456'),
(9, 'mk', 'mk@gmail.com', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_order`
--

DROP TABLE IF EXISTS `tb_order`;
CREATE TABLE IF NOT EXISTS `tb_order` (
  `MaOrder` int(10) NOT NULL AUTO_INCREMENT,
  `MaKhachDat` int(10) NOT NULL,
  `MaDonDatHang` int(10) NOT NULL,
  `MaHinhThucThanhToan` int(11) NOT NULL,
  `TongTien` varchar(255) NOT NULL,
  `TrangThai` varchar(255) NOT NULL,
  PRIMARY KEY (`MaOrder`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tb_order`
--

INSERT INTO `tb_order` (`MaOrder`, `MaKhachDat`, `MaDonDatHang`, `MaHinhThucThanhToan`, `TongTien`, `TrangThai`) VALUES
(5, 1, 12, 11, '246', 'Chờ xử lý'),
(6, 1, 12, 12, '246', 'Chờ xử lý'),
(7, 1, 13, 13, '246', 'Chờ xử lý'),
(8, 1, 14, 15, '445,000.00', 'Chờ xử lý');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`maloai`) REFERENCES `loainhot` (`maloai`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
