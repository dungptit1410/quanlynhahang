-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 21, 2019 lúc 04:17 AM
-- Phiên bản máy phục vụ: 10.1.34-MariaDB
-- Phiên bản PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlynhahang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_anh_monan`
--

CREATE TABLE `tbl_anh_monan` (
  `id` int(11) NOT NULL,
  `url` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_bills`
--

CREATE TABLE `tbl_bills` (
  `id` int(11) NOT NULL,
  `datecreat` datetime DEFAULT CURRENT_TIMESTAMP,
  `amount` int(11) DEFAULT NULL,
  `note` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_bills`
--

INSERT INTO `tbl_bills` (`id`, `datecreat`, `amount`, `note`, `name`, `phone`, `email`, `address`, `status`) VALUES
(37, '2019-05-03 22:47:51', 2403021, NULL, 'dung', '123', NULL, NULL, 1),
(38, '2019-05-03 22:49:00', 2683021, NULL, 'hai', '1213', NULL, NULL, 1),
(39, '2019-05-04 10:43:04', 588000, NULL, 'luu hai', '12321312', 'trenbienkhoi_1410@yahoo.com', 'zxc', 1),
(40, '2019-05-04 10:44:48', 726000, NULL, 'luu hai', '12321312', NULL, NULL, 1),
(41, '2019-06-03 14:33:57', 174000, NULL, 'dung', '363181796', 'lathithuha1997@gmail.com', 'ha noi', 2),
(43, '2019-06-03 14:41:14', 174000, NULL, 'dung', '0363181796', 'lavandung1998@gmail.com', 'hn', 2),
(44, '2019-06-03 14:45:36', 686000, NULL, 'ha', '0363181796', 'trenbienkhoi_1410@yahoo.com', 'hn', 2),
(45, '2019-06-03 16:18:56', 1176000, NULL, 'dsfgf', '123456', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_bookings`
--

CREATE TABLE `tbl_bookings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `note` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_bookings`
--

INSERT INTO `tbl_bookings` (`id`, `name`, `telephone`, `amount`, `time`, `note`, `id_user`, `status`) VALUES
(17, 'dung', '123', 10, '2018-12-22 20:00:00', 'dsfds', NULL, 2),
(18, 'hai', '1213', 10, '2019-05-21 06:16:15', 'fds', NULL, 2),
(19, 'tuan', '1213', 10, '2019-05-21 06:16:15', 'fds', NULL, 2),
(20, 'dung', '12321312', 10, '2019-05-03 20:01:56', 'fdas', NULL, 2),
(21, 'dung', '12321312', 10, '2019-05-03 20:03:49', 'ádf', NULL, NULL),
(22, 'hải', '14522', 10, '2019-05-03 20:04:45', 'sda', NULL, NULL),
(23, 'hà', '12321312', 11, '1970-01-01 01:33:39', 'ds', NULL, NULL),
(24, 'dsfgf', '123456', NULL, '1970-01-01 01:33:39', NULL, NULL, 2),
(25, 'dsfgf', NULL, NULL, '2019-05-15 01:01:00', NULL, NULL, NULL),
(26, 'luu hai', '12321312', 10, '2019-05-16 02:01:00', 'asdfd', NULL, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `name`, `description`) VALUES
(8, 'Khai vị', NULL),
(9, 'Món Thịt', NULL),
(10, 'Món hải sản', NULL),
(11, 'Món rau', NULL),
(12, 'Mỳ - Miến - Phở', NULL),
(13, 'Cơm cháo', NULL),
(14, 'Canh - Lẩu', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_orderings`
--

CREATE TABLE `tbl_orderings` (
  `id` int(11) NOT NULL,
  `id_table` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `id_bill` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `note` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_orderings`
--

INSERT INTO `tbl_orderings` (`id`, `id_table`, `id_product`, `id_bill`, `number`, `price`, `status`, `note`) VALUES
(1, 1, 31, 39, 3, 58000, 1, NULL),
(2, 1, 33, 39, 3, 138000, 1, NULL),
(3, 2, 32, 40, 3, 58000, 1, NULL),
(4, 4, 33, 40, 4, 138000, 1, NULL),
(5, NULL, 31, 43, 3, 58000, 5, NULL),
(6, NULL, 31, 44, 3, 58000, 5, NULL),
(7, NULL, 39, 44, 4, 128000, 5, NULL),
(8, 1, 31, NULL, 3, 58000, 0, 'abc'),
(9, 1, 32, NULL, 3, 58000, 0, 'abc'),
(10, 2, 31, NULL, 3, 58000, 0, 'asc'),
(11, 2, 33, NULL, 3, 138000, 0, 'adsaf'),
(12, 7, 31, 45, 3, 58000, 1, NULL),
(13, 7, 34, 45, 3, 198000, 1, NULL),
(14, 8, 31, 45, 3, 58000, 1, NULL),
(15, 8, 35, 45, 3, 78000, 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` float DEFAULT NULL,
  `avatar` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `hidden` int(1) DEFAULT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `name`, `price`, `avatar`, `description`, `url`, `id_category`, `hidden`, `date_created`) VALUES
(31, 'Súp hải sản đậu phụ', 58000, 'views/upload/laucua.jpg', '                                                                                                                                                                                                                                                                                                                Món ăn bổ dưỡng                                                                                                                                                                                     ', 'adsf', 8, 0, '2019-05-03 23:35:20'),
(32, 'Súp gà nấm', 58000, 'views/upload/supganam.jpg', '                                                                                                                                                                                ', NULL, 8, 1, '2019-05-03 23:40:55'),
(33, 'Gói sứa tôm thịt', 138000, 'views/upload/goisuatomthit.jpg', '                         ', NULL, 8, 0, '2019-05-03 23:42:08'),
(34, 'bò nhúng dầm cuốn bánh tráng', 198000, 'views/upload/bonhungdamcuonbanhtrang.jpg', '                                    ', NULL, 9, 1, '2019-05-03 23:45:35'),
(35, 'Thịt ba chỉ rang cháy cạnh', 78000, 'views/upload/thitbachirangchay.jpg', '                                                                             ', NULL, 9, 1, '2019-05-03 23:46:14'),
(36, 'Tôm sú chiên xá ớt', 215000, 'views/upload/tomsuchiensaoi.jpg', '                                    ', NULL, 10, 1, '2019-05-03 23:51:07'),
(37, 'Cá lóc chiên giòn sốt xì dầu', 268000, 'views/upload/', '                                                                       ', NULL, 10, 1, '2019-05-03 23:51:53'),
(38, 'Ngông tói xào', 68000, 'views/upload/ngongtoixao.jpg', '                                    ', NULL, 11, 1, '2019-05-03 23:52:40'),
(39, 'Ngông tói xào thịt bò', 128000, 'views/upload/ngongtoixaothitbo.jpg', '                                    ', NULL, 11, 1, '2019-05-03 23:53:12'),
(40, 'Miến xào cua nôi đất', 588000, 'views/upload/cua.jpg', '                                    ', NULL, 12, 1, '2019-05-03 23:54:41'),
(41, 'Cơm đĩa gà quay', 118000, 'views/upload/comdiagaquay.jpg', '                                    ', NULL, 13, 1, '2019-05-03 23:55:16'),
(42, 'Lẩu thái hải sản', 438000, 'views/upload/lảuieucuasuon.jpg', '                                    ', NULL, 14, 1, '2019-05-03 23:56:02'),
(43, 'Lẩu cua Gia Viên chua cay', 758000, 'views/upload/laucua.jpg', '                                                                       ', NULL, 14, 1, '2019-05-03 23:57:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_tables`
--

CREATE TABLE `tbl_tables` (
  `id` int(11) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `id_booking` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_tables`
--

INSERT INTO `tbl_tables` (`id`, `status`, `id_booking`) VALUES
(1, 1, 20),
(2, 1, 20),
(3, 0, NULL),
(4, 0, NULL),
(5, 0, NULL),
(6, 0, NULL),
(7, 0, NULL),
(8, 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `address`, `password`) VALUES
(1, 'dung1', 'lavandung1998@gmail.com', 'ha noi', 'ádfa'),
(3, 'hai', 'trenbienkhoi_1410@yahoo.com', 'asdf', '12312'),
(4, 'dsfgfd', 'trenbienkhoi_1410@yahoo.com', 'asdaf', '1213'),
(6, 'dsfgfd', 'trenbienkhoi_1410@yahoo.com', 'Chính hãng', '23234');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_anh_monan`
--
ALTER TABLE `tbl_anh_monan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `monan_id` (`monan_id`);

--
-- Chỉ mục cho bảng `tbl_bills`
--
ALTER TABLE `tbl_bills`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `khachhang_id` (`id_user`);

--
-- Chỉ mục cho bảng `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_orderings`
--
ALTER TABLE `tbl_orderings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hoadon_id` (`id_bill`),
  ADD KEY `ban_id` (`id_table`),
  ADD KEY `monan_id` (`id_product`);

--
-- Chỉ mục cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loai_monan_id` (`id_category`);

--
-- Chỉ mục cho bảng `tbl_tables`
--
ALTER TABLE `tbl_tables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `datban_id` (`id_booking`);

--
-- Chỉ mục cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_anh_monan`
--
ALTER TABLE `tbl_anh_monan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_bills`
--
ALTER TABLE `tbl_bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_orderings`
--
ALTER TABLE `tbl_orderings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `tbl_tables`
--
ALTER TABLE `tbl_tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_anh_monan`
--
ALTER TABLE `tbl_anh_monan`
  ADD CONSTRAINT `tbl_anh_monan_ibfk_1` FOREIGN KEY (`monan_id`) REFERENCES `tbl_products` (`id`);

--
-- Các ràng buộc cho bảng `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  ADD CONSTRAINT `tbl_bookings_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_tt_khachhang` (`id`);

--
-- Các ràng buộc cho bảng `tbl_orderings`
--
ALTER TABLE `tbl_orderings`
  ADD CONSTRAINT `tbl_orderings_ibfk_1` FOREIGN KEY (`id_bill`) REFERENCES `tbl_bills` (`id`),
  ADD CONSTRAINT `tbl_orderings_ibfk_2` FOREIGN KEY (`id_table`) REFERENCES `tbl_tables` (`id`),
  ADD CONSTRAINT `tbl_orderings_ibfk_3` FOREIGN KEY (`id_product`) REFERENCES `tbl_products` (`id`);

--
-- Các ràng buộc cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `tbl_products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `tbl_categories` (`id`);

--
-- Các ràng buộc cho bảng `tbl_tables`
--
ALTER TABLE `tbl_tables`
  ADD CONSTRAINT `tbl_tables_ibfk_1` FOREIGN KEY (`id_booking`) REFERENCES `tbl_bookings` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
