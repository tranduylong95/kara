-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 19, 2022 lúc 06:14 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hoangtu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `area`
--

CREATE TABLE `area` (
  `id` int(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf16 COLLATE utf16_vietnamese_ci NOT NULL,
  `id_company_child` int(255) NOT NULL,
  `id_price_time` int(255) NOT NULL,
  `deleted_at` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `area`
--

INSERT INTO `area` (`id`, `name`, `id_company_child`, `id_price_time`, `deleted_at`) VALUES
(30, 'Tầng 1', 6, 148, NULL),
(31, 'Tầng 2', 6, 149, NULL),
(32, 'Tầng 3', 6, 150, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf16 COLLATE utf16_vietnamese_ci NOT NULL,
  `id_company_child` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `id_company_child`) VALUES
(144, 'Bia', 6),
(146, 'Nước ngọt', 6),
(147, 'Thức Ăn', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `company_child`
--

CREATE TABLE `company_child` (
  `id` int(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf16 COLLATE utf16_vietnamese_ci NOT NULL,
  `adress` text CHARACTER SET utf16 COLLATE utf16_vietnamese_ci NOT NULL,
  `status` int(20) NOT NULL DEFAULT 1,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `company_child`
--

INSERT INTO `company_child` (`id`, `name`, `adress`, `status`, `phone`) VALUES
(6, 'Hoàng tử', '65 Minh Mạng', 1, '0774545697');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_order`
--

CREATE TABLE `detail_order` (
  `id` int(255) NOT NULL,
  `id_order` int(255) NOT NULL,
  `id_product` int(255) NOT NULL,
  `number` int(255) NOT NULL DEFAULT 1,
  `id_price` int(255) NOT NULL,
  `money_total` int(255) NOT NULL DEFAULT 0,
  `discount_product` int(255) NOT NULL DEFAULT 0,
  `id_dvt` int(255) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `detail_order`
--

INSERT INTO `detail_order` (`id`, `id_order`, `id_product`, `number`, `id_price`, `money_total`, `discount_product`, `id_dvt`) VALUES
(222, 33, 210, 11, 274, 20, 50, 16),
(227, 36, 210, 9, 274, 180, 0, 16),
(229, 34, 210, 14, 274, 280, 0, 16),
(230, 37, 210, 1, 274, 20, 0, 16),
(231, 38, 210, 1, 274, 20, 0, 16),
(232, 39, 210, 1, 274, 20, 0, 16),
(233, 40, 210, 2, 274, 20, 0, 16),
(236, 43, 210, 20, 274, 20, 10, 16),
(237, 52, 210, 1, 274, 20, 0, 16),
(240, 41, 211, 26, 272, 0, 0, 16),
(241, 41, 210, 4, 274, 80, 0, 16),
(242, 56, 210, 1, 274, 20, 0, 16),
(243, 57, 210, 1, 274, 20, 0, 16),
(244, 58, 210, 1, 274, 20, 0, 16),
(245, 59, 199, 1, 254, 0, 0, 5),
(246, 60, 199, 1, 254, 0, 0, 5),
(247, 61, 210, 1, 274, 20, 0, 16),
(248, 62, 199, 1, 254, 0, 0, 5),
(249, 63, 210, 1, 274, 20, 0, 16),
(250, 64, 210, 1, 274, 20, 0, 16),
(251, 65, 199, 1, 254, 0, 0, 5),
(252, 66, 199, 1, 254, 0, 0, 5),
(253, 67, 199, 1, 254, 0, 0, 5),
(254, 68, 210, 1, 274, 20, 0, 16),
(255, 69, 199, 1, 254, 0, 0, 5),
(256, 70, 210, 1, 274, 20, 0, 16),
(257, 71, 199, 1, 254, 0, 0, 5),
(258, 72, 210, 1, 274, 20, 0, 16),
(261, 78, 210, 8, 274, 60, 0, 16),
(285, 78, 211, 6, 272, 0, 0, 16),
(288, 79, 210, 1, 274, 20, 0, 16),
(289, 80, 210, 1, 274, 20, 0, 16),
(292, 81, 210, 1, 274, 20, 0, 16),
(293, 82, 199, 1, 254, 0, 0, 5),
(294, 83, 210, 1, 274, 20, 0, 16),
(295, 84, 199, 1, 254, 0, 0, 5),
(296, 85, 199, 1, 254, 0, 0, 5),
(305, 35, 210, 21, 274, 0, 20, 16),
(306, 35, 211, 2, 272, 0, 0, 16),
(307, 55, 210, 1, 274, 0, 20, 16),
(308, 86, 210, 1, 274, 20, 0, 16),
(309, 87, 199, 1, 254, 0, 0, 5),
(310, 88, 210, 1, 274, 20, 0, 16),
(311, 89, 211, 1, 272, 0, 0, 16),
(312, 90, 199, 1, 254, 0, 0, 5),
(313, 91, 210, 1, 274, 20, 0, 16),
(314, 92, 211, 1, 272, 0, 0, 16),
(315, 92, 215, 1, 277, 1, 0, 16),
(316, 93, 210, 1, 274, 20, 0, 16),
(317, 93, 211, 1, 272, 0, 0, 16),
(318, 93, 216, 1, 278, 112, 0, 16),
(319, 94, 210, 1, 274, 20, 0, 16),
(320, 94, 213, 1, 275, 12, 0, 16),
(321, 95, 210, 1, 274, 20, 0, 16),
(322, 96, 210, 1, 274, 20, 0, 16),
(323, 97, 210, 1, 274, 20, 0, 16),
(324, 98, 210, 1, 274, 20, 0, 16),
(325, 99, 210, 1, 274, 20, 0, 16),
(326, 100, 210, 1, 274, 20, 0, 16),
(327, 101, 199, 1, 254, 0, 0, 5),
(328, 102, 211, 1, 272, 0, 0, 16),
(329, 103, 210, 1, 274, 20, 0, 16),
(330, 104, 211, 2, 272, 0, 0, 16),
(331, 104, 210, 1, 274, 20, 0, 16),
(332, 105, 224, 1, 290, 30000, 0, 16),
(333, 106, 225, 1, 297, 24000, 0, 16),
(334, 106, 224, 1, 290, 30000, 0, 16),
(335, 106, 227, 4, 299, 12000, 0, 16),
(336, 106, 223, 7, 289, 25000, 0, 16),
(337, 106, 226, 1, 298, 14000, 0, 16),
(338, 107, 223, 1, 289, 25000, 0, 16);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employee`
--

CREATE TABLE `employee` (
  `id` int(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf16 COLLATE utf16_vietnamese_ci NOT NULL,
  `account` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `rank` int(255) NOT NULL DEFAULT 0,
  `phone` varchar(255) DEFAULT NULL,
  `id_company_child` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `employee`
--

INSERT INTO `employee` (`id`, `name`, `account`, `password`, `status`, `rank`, `phone`, `id_company_child`) VALUES
(5, 'admin', 'admin', '$2y$10$DGmSrIrP1MAXDJ1pobAGieb1AKvye3v6qKzKvzSUIQ3ri618mW3H2', 1, 0, '0774545697', 6),
(11, 'Trần Duy Long', 'long123', '$2y$10$79JRgrK9XGtiMjU0LVaQ7.DUcPglGdDKRsXgIamyDvfZtPq8bte1y', 1, 1, '0774545698', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `code_order` varchar(255) NOT NULL,
  `status` int(255) NOT NULL DEFAULT 1,
  `id_room` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_employee` int(255) NOT NULL,
  `id_company_child` int(255) NOT NULL,
  `discount_order` int(255) NOT NULL DEFAULT 0,
  `discount_time` int(255) NOT NULL DEFAULT 0,
  `VAT` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `code_order`, `status`, `id_room`, `created_at`, `updated_at`, `id_employee`, `id_company_child`, `discount_order`, `discount_time`, `VAT`) VALUES
(105, 'HD000001', 0, 43, '2022-09-18 23:02:53', '2022-09-18 23:03:46', 5, 6, 0, 0, 0),
(106, 'HD000002', 1, 40, '2022-09-18 23:03:01', '2022-09-18 23:49:43', 5, 6, 40, 0, 30),
(107, 'HD000003', 1, 41, '2022-09-18 23:03:19', '2022-09-18 23:49:22', 5, 6, 10, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(255) UNSIGNED NOT NULL,
  `id_product` int(255) NOT NULL,
  `id_order` int(255) NOT NULL,
  `number` int(255) NOT NULL DEFAULT 1,
  `id_price` int(11) NOT NULL,
  `money_total` int(11) NOT NULL DEFAULT 0,
  `id_dvr` int(255) NOT NULL,
  `discount_product` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `price`
--

CREATE TABLE `price` (
  `id` int(255) NOT NULL,
  `price_sell` int(244) NOT NULL DEFAULT 0,
  `price_import` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `price`
--

INSERT INTO `price` (`id`, `price_sell`, `price_import`) VALUES
(289, 25000, 20000),
(290, 30000, 20000),
(291, 12000, 8000),
(292, 12000, 8000),
(293, 12000, 8000),
(294, 12000, 8000),
(295, 12000, 8000),
(296, 12000, 8000),
(297, 24000, 12000),
(298, 14000, 10000),
(299, 12000, 5000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `price_time`
--

CREATE TABLE `price_time` (
  `id` int(255) NOT NULL,
  `price_0_8` int(255) NOT NULL,
  `price_8_16` int(255) NOT NULL,
  `price_16_24` int(255) NOT NULL,
  `status` int(255) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `price_time`
--

INSERT INTO `price_time` (`id`, `price_0_8`, `price_8_16`, `price_16_24`, `status`) VALUES
(148, 200000, 300000, 400000, 1),
(149, 250000, 200000, 300000, 1),
(150, 300000, 200000, 400000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf16 COLLATE utf16_vietnamese_ci DEFAULT NULL,
  `image` text DEFAULT NULL,
  `number` int(255) NOT NULL DEFAULT 0,
  `status` int(255) NOT NULL DEFAULT 1,
  `Ma_sp` varchar(255) DEFAULT NULL,
  `id_category` int(255) DEFAULT NULL,
  `id_dvt` int(255) DEFAULT NULL,
  `id_price` int(255) DEFAULT NULL,
  `id_company_child` int(255) DEFAULT NULL,
  `create_up` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_up` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `number`, `status`, `Ma_sp`, `id_category`, `id_dvt`, `id_price`, `id_company_child`, `create_up`, `update_up`, `deleted_at`) VALUES
(223, 'Bia HuDa', 'storage/app/public/default.jpg', 10, 1, 'SP000001', 144, 16, 289, 6, '2022-09-18 22:29:54', '2022-09-18 22:29:54', NULL),
(224, 'Bia Tiger', 'storage/app/public/default.jpg', 10, 1, 'SP000002', 144, 16, 290, 6, '2022-09-18 22:30:25', '2022-09-18 22:30:25', NULL),
(225, 'Nước cam', 'storage/app/public/default.jpg', 10, 1, 'SP000003', 146, 16, 297, 6, '2022-09-18 22:32:38', '2022-09-18 22:32:38', NULL),
(226, 'Coca', 'storage/app/public/default.jpg', 10, 1, 'SP000004', 146, 16, 298, 6, '2022-09-18 22:33:00', '2022-09-18 22:33:00', NULL),
(227, 'Mít Sấy', 'storage/app/public/default.jpg', 1, 1, 'SP000005', 147, 16, 299, 6, '2022-09-18 22:33:30', '2022-09-18 22:33:30', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room`
--

CREATE TABLE `room` (
  `id` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `id_area` int(255) NOT NULL,
  `id_company_child` int(255) NOT NULL,
  `id_price_time` int(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` time DEFAULT NULL,
  `active` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `room`
--

INSERT INTO `room` (`id`, `name`, `id_area`, `id_company_child`, `id_price_time`, `create_at`, `deleted_at`, `active`) VALUES
(39, '1', 30, 6, 148, '2022-09-18 22:34:15', NULL, 0),
(40, '2', 30, 6, 148, '2022-09-18 22:34:15', NULL, 1),
(41, '3', 30, 6, 148, '2022-09-18 22:34:15', NULL, 1),
(42, '1', 31, 6, 149, '2022-09-18 22:34:45', NULL, 0),
(43, '2', 31, 6, 149, '2022-09-18 22:34:45', NULL, 0),
(44, '3', 31, 6, 149, '2022-09-18 22:34:45', NULL, 0),
(45, '1', 32, 6, 150, '2022-09-18 22:49:21', NULL, 0),
(46, '2', 32, 6, 150, '2022-09-18 22:49:21', NULL, 0),
(47, '3', 32, 6, 150, '2022-09-18 22:49:21', NULL, 0),
(48, '4', 32, 6, 150, '2022-09-18 22:49:21', NULL, 0),
(49, '5', 32, 6, 150, '2022-09-18 22:49:21', NULL, 0),
(50, '6', 32, 6, 150, '2022-09-18 22:49:21', NULL, 0),
(51, '7', 32, 6, 150, '2022-09-18 22:49:21', NULL, 0),
(52, '8', 32, 6, 150, '2022-09-18 22:49:21', NULL, 0),
(53, '9', 32, 6, 150, '2022-09-18 22:49:21', NULL, 0),
(54, '10', 32, 6, 150, '2022-09-18 22:49:21', NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `time_money`
--

CREATE TABLE `time_money` (
  `id` int(255) NOT NULL,
  `id_room` int(255) NOT NULL,
  `id_order` int(255) NOT NULL,
  `hour_limit` datetime NOT NULL,
  `price_time` int(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `discount_time` int(255) NOT NULL DEFAULT 0,
  `time_start` timestamp NULL DEFAULT NULL,
  `time_finish` timestamp NULL DEFAULT NULL,
  `move` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `time_money`
--

INSERT INTO `time_money` (`id`, `id_room`, `id_order`, `hour_limit`, `price_time`, `status`, `discount_time`, `time_start`, `time_finish`, `move`) VALUES
(935, 39, 105, '2022-09-19 08:00:00', 200000, 0, 0, '2022-09-18 23:02:53', '2022-09-18 23:03:29', 1),
(936, 40, 106, '2022-09-19 08:00:00', 200000, 1, 0, '2022-09-18 23:03:01', NULL, 0),
(937, 41, 107, '2022-09-19 08:00:00', 200000, 1, 0, '2022-09-18 23:03:19', NULL, 0),
(938, 43, 105, '2022-09-19 08:00:00', 250000, 0, 0, '2022-09-18 23:03:29', '2022-09-18 23:03:46', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `unit`
--

CREATE TABLE `unit` (
  `id` int(255) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf16 COLLATE utf16_vietnamese_ci NOT NULL,
  `ID_company_child` int(255) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `unit`
--

INSERT INTO `unit` (`id`, `name`, `ID_company_child`, `status`) VALUES
(16, 'Lon', 6, 1),
(17, 'Chai', 6, 1),
(20, 'Dĩa', 6, 1),
(21, 'Cái', 6, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `company_child`
--
ALTER TABLE `company_child`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `price_time`
--
ALTER TABLE `price_time`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `time_money`
--
ALTER TABLE `time_money`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `area`
--
ALTER TABLE `area`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT cho bảng `company_child`
--
ALTER TABLE `company_child`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=339;

--
-- AUTO_INCREMENT cho bảng `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `price`
--
ALTER TABLE `price`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

--
-- AUTO_INCREMENT cho bảng `price_time`
--
ALTER TABLE `price_time`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT cho bảng `room`
--
ALTER TABLE `room`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `time_money`
--
ALTER TABLE `time_money`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=939;

--
-- AUTO_INCREMENT cho bảng `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
