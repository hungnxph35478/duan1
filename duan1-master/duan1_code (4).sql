-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 12, 2023 lúc 06:37 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1_code`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(10) NOT NULL,
  `iduser` int(10) DEFAULT 0,
  `bill_name` varchar(255) NOT NULL,
  `bill_address` varchar(255) NOT NULL,
  `bill_tel` varchar(50) NOT NULL,
  `bill_email` varchar(100) NOT NULL,
  `bill_pttt` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1. thanh toán trực tiếp 2. chuyển khoản 3. thanh toán online',
  `ngaydathang` varchar(50) DEFAULT NULL,
  `total` int(10) NOT NULL DEFAULT 0,
  `bill_status` tinyint(1) DEFAULT 0 COMMENT '0. Đơn hàng mới 1. Đang xử lý 2. Đang giao hàng 3. Đã giao hàng',
  `payment_status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `iduser`, `bill_name`, `bill_address`, `bill_tel`, `bill_email`, `bill_pttt`, `ngaydathang`, `total`, `bill_status`, `payment_status`) VALUES
(346, 6, '  nguyenxuanhung', ' hà nội', ' 0387732069', '   hungnxph35478@fpt.edu.vn', 2, '2023-12-12 13:50:54', 135000, 3, 1),
(347, 6, 'nguyenxuanhung', 'hà nội', '0387732069', 'hungnxph35478@fpt.edu.vn', 2, '2023-12-12 13:58:57', 85000, 4, 0),
(348, 6, 'nguyenxuanhung', 'hà nội', '0387732069', 'hungnxph35478@fpt.edu.vn', 2, '2023-12-12 14:56:00', 60000, 4, 0),
(349, 6, 'nguyenxuanhung', 'hà nội', '0387732069', 'hungnxph35478@fpt.edu.vn', 2, '2023-12-12 14:26:06', 90000, 0, 0),
(350, 6, 'nguyenxuanhung', 'hà nội', '0987544615', 'hungnxph35478@fpt.edu.vn', 2, '2023-12-12 15:42:31', 80000, 4, 0),
(351, 6, 'nguyenxuanhung', 'hà nội', '0987544615', 'hungnxph35478@fpt.edu.vn', 2, '2023-12-12 15:58:35', 65000, 0, 0),
(352, 6, 'nguyenxuanhung', 'hà nội', '0987544615', 'hungnxph35478@fpt.edu.vn', 2, '2023-12-12 15:00:54', 90000, 0, 0),
(353, 1, '  uprprc', ' 153 Mễ Trì Hạ', ' 0356346232', '   sebastran727@gmail.com', 2, '2023-12-12 16:19:14', 105000, 4, 0),
(354, 1, '    uprprc', '  153 Mễ Trì Hạ', '  0356346232', '      sebastran727@gmail.com', 2, '2023-12-12 16:42:15', 80000, 3, 1),
(355, 6, 'nguyenxuanhung', 'a', '0987544615', 'hungnxph35478@fpt.edu.vn', 2, '2023-12-12 17:34:54', 45000, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_chitiet`
--

CREATE TABLE `bill_chitiet` (
  `id` int(10) NOT NULL,
  `order_id` int(10) DEFAULT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_chitiet`
--

INSERT INTO `bill_chitiet` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(177, 346, 8, 2, 25000.00),
(178, 346, 10, 2, 25000.00),
(179, 346, 7, 1, 20000.00),
(180, 347, 10, 2, 25000.00),
(181, 347, 7, 1, 20000.00),
(182, 348, 7, 1, 20000.00),
(183, 348, 2, 1, 25000.00),
(184, 349, 4, 1, 50000.00),
(185, 349, 2, 1, 25000.00),
(186, 350, 9, 1, 25000.00),
(187, 350, 7, 2, 20000.00),
(188, 351, 9, 1, 25000.00),
(189, 351, 10, 1, 25000.00),
(190, 352, 10, 1, 25000.00),
(191, 352, 9, 1, 25000.00),
(192, 352, 8, 1, 25000.00),
(193, 353, 7, 2, 20000.00),
(194, 353, 4, 1, 50000.00),
(195, 354, 9, 1, 25000.00),
(196, 354, 7, 2, 20000.00),
(197, 355, 14, 2, 15000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(10) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `iduser` int(10) NOT NULL,
  `idpro` int(10) NOT NULL,
  `ngaybinhluan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id`, `noidung`, `iduser`, `idpro`, `ngaybinhluan`) VALUES
(19, 'hoai niem qua', 0, 14, '05:10:22pm 12/12/2023');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `iduser` int(10) NOT NULL,
  `idpro` int(10) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(10) NOT NULL DEFAULT 0,
  `soluong` int(3) NOT NULL,
  `thanhtien` int(10) NOT NULL,
  `idbill` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `iduser`, `idpro`, `img`, `name`, `price`, `soluong`, `thanhtien`, `idbill`) VALUES
(108, 6, 8, NULL, NULL, 0, 2, 50000, 0),
(109, 6, 8, 'sanpham2.png', 'Trà sữa linh tinh', 25000, 2, 50000, 346),
(110, 6, 10, NULL, NULL, 0, 2, 50000, 0),
(111, 6, 10, 'sanpham5.png', 'Trà sữa hồng', 25000, 2, 50000, 346),
(112, 6, 7, NULL, NULL, 0, 1, 20000, 0),
(113, 6, 7, 'sanpham3.png', 'Trà chanh lô hội', 20000, 1, 20000, 346),
(114, 6, 10, NULL, NULL, 0, 2, 50000, 0),
(115, 6, 10, 'sanpham5.png', 'Trà sữa hồng', 25000, 2, 50000, 347),
(116, 6, 7, NULL, NULL, 0, 1, 20000, 0),
(117, 6, 7, 'sanpham3.png', 'Trà chanh lô hội', 20000, 1, 20000, 347),
(118, 6, 7, NULL, NULL, 0, 1, 20000, 0),
(119, 6, 7, 'sanpham3.png', 'Trà chanh lô hội', 20000, 1, 20000, 348),
(120, 6, 2, NULL, NULL, 0, 1, 25000, 0),
(121, 6, 2, 'sanpham4.png', 'Trà sữa TCĐĐ', 25000, 1, 25000, 348),
(122, 6, 4, NULL, NULL, 0, 1, 50000, 0),
(123, 6, 4, 'sanpham8.png', 'Trà sữa chanh dây', 50000, 1, 50000, 349),
(124, 6, 2, NULL, NULL, 0, 1, 25000, 0),
(125, 6, 2, 'sanpham4.png', 'Trà sữa TCĐĐ', 25000, 1, 25000, 349),
(126, 6, 9, NULL, NULL, 0, 1, 25000, 0),
(127, 6, 9, 'sanpham1.png', 'Trà sữa GongCha', 25000, 1, 25000, 350),
(128, 6, 7, NULL, NULL, 0, 2, 40000, 0),
(129, 6, 7, 'sanpham3.png', 'Trà chanh lô hội', 20000, 2, 40000, 350),
(130, 6, 9, NULL, NULL, 0, 1, 25000, 0),
(131, 6, 9, 'sanpham1.png', 'Trà sữa GongCha', 25000, 1, 25000, 351),
(132, 6, 10, NULL, NULL, 0, 1, 25000, 0),
(133, 6, 10, 'sanpham5.png', 'Trà sữa hồng', 25000, 1, 25000, 351),
(134, 6, 10, NULL, NULL, 0, 1, 25000, 0),
(135, 6, 10, 'sanpham5.png', 'Trà sữa hồng', 25000, 1, 25000, 352),
(136, 6, 9, NULL, NULL, 0, 1, 25000, 0),
(137, 6, 9, 'sanpham1.png', 'Trà sữa GongCha', 25000, 1, 25000, 352),
(138, 6, 8, NULL, NULL, 0, 1, 25000, 0),
(139, 6, 8, 'sanpham2.png', 'Trà sữa linh tinh', 25000, 1, 25000, 352),
(140, 1, 7, NULL, NULL, 0, 2, 40000, 0),
(141, 1, 7, 'sanpham3.png', 'Trà chanh lô hội', 20000, 2, 40000, 353),
(142, 1, 4, NULL, NULL, 0, 1, 50000, 0),
(143, 1, 4, 'sanpham8.png', 'Trà sữa chanh dây', 50000, 1, 50000, 353),
(144, 1, 9, NULL, NULL, 0, 1, 25000, 0),
(145, 1, 9, 'sanpham1.png', 'Trà sữa GongCha', 25000, 1, 25000, 354),
(146, 1, 7, NULL, NULL, 0, 2, 40000, 0),
(147, 1, 7, 'sanpham3.png', 'Trà chanh lô hội', 20000, 2, 40000, 354),
(148, 6, 14, NULL, NULL, 0, 2, 30000, 0),
(149, 6, 14, 'kem-trang-tien-219865.jpg', 'Kem ốc quế', 15000, 2, 30000, 355);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`) VALUES
(1, 'Trà sữa'),
(2, 'Kem'),
(3, 'Đồ ăn khác');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double(10,2) DEFAULT 0.00,
  `soluong` int(100) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `mota` text DEFAULT NULL,
  `luotxem` int(11) DEFAULT 0,
  `iddm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `price`, `soluong`, `img`, `mota`, `luotxem`, `iddm`) VALUES
(2, 'Trà sữa TCĐĐ', 25000.00, 46, 'sanpham4.png', '', 0, 1),
(4, 'Trà sữa chanh dây', 50000.00, 47, 'sanpham8.png', '', 0, 1),
(5, 'Trà sữa lắc dâu tây', 25000.00, 45, 'sanpham5.png', '', 0, 1),
(6, 'Trà sữa Lasimi xoài', 35000.00, 48, 'sanpham7.png', '', 0, 1),
(7, 'Trà chanh lô hội', 20000.00, 37, 'sanpham3.png', '', 21, 1),
(8, 'Trà sữa linh tinh', 25000.00, 44, 'sanpham2.png', '', 0, 1),
(9, 'Trà sữa GongCha', 25000.00, 26, 'sanpham1.png', '', 0, 1),
(10, 'Trà sữa hồng', 25000.00, 12, 'sanpham5.png', 'Mô tả của mô tả của mô tả', 0, 1),
(14, 'Kem ốc quế', 15000.00, -2, 'kemmoi1.png', '', 11, 2),
(17, 'Bim Bim', 10000.00, 0, 'bimbim.png', '', 0, 3),
(18, 'Kem que miền tây', 12000.00, 0, 'kemmoi3.png', '', 0, 2),
(19, 'Kem đậu xanh', 10000.00, 0, 'kemmoi2.png', '', 3, 2),
(20, 'Xúc xích', 20000.00, 0, 'xucxich.png', '', 1000, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `user`, `pass`, `email`, `address`, `tel`, `role`) VALUES
(1, 'uprprc', '123456', 'sebastran727@gmail.com', NULL, NULL, 1),
(2, 'selcas', '123456', 'kuronesuki@gmail.com', NULL, NULL, 0),
(3, 'selcas', '123456', 'kuronesuki@gmail.com', NULL, NULL, 0),
(4, 'selcas', '123456', 'kuronesuki@gmail.com', NULL, NULL, 0),
(6, 'nguyenxuanhung', '123', 'hungnxph35478@fpt.edu.vn', NULL, NULL, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_bill_taikhoan` (`iduser`);

--
-- Chỉ mục cho bảng `bill_chitiet`
--
ALTER TABLE `bill_chitiet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `order_detail_ibfk_2` (`product_id`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `binhluan_sp` (`idpro`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_idpro_sanpham` (`idpro`),
  ADD KEY `lk_iduser_taikhoan` (`iduser`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_sanpham_danhmuc` (`iddm`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=356;

--
-- AUTO_INCREMENT cho bảng `bill_chitiet`
--
ALTER TABLE `bill_chitiet`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `lk_bill_taikhoan` FOREIGN KEY (`iduser`) REFERENCES `taikhoan` (`id`);

--
-- Các ràng buộc cho bảng `bill_chitiet`
--
ALTER TABLE `bill_chitiet`
  ADD CONSTRAINT `bill_chitiet_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `bill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_sp` FOREIGN KEY (`idpro`) REFERENCES `sanpham` (`id`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `lk_idpro_sanpham` FOREIGN KEY (`idpro`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `lk_iduser_taikhoan` FOREIGN KEY (`iduser`) REFERENCES `taikhoan` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `lk_sanpham_danhmuc` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
