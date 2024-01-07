-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 30, 2023 lúc 02:04 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qrcode`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `districts`
--

CREATE TABLE `districts` (
  `id` varchar(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `province_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `districts`
--

INSERT INTO `districts` (`id`, `name`, `province_id`) VALUES
('1560', 'Thành phố Trà Vinh', '214'),
('1908', 'Huyện Cầu Ngang', '214'),
('1911', 'Huyện Châu Thành', '214'),
('2020', 'Huyện Tiểu Cần', '214'),
('2033', 'Huyện Trà Cú', '214'),
('2086', 'Huyện Càng Long', '214'),
('2091', 'Huyện Cầu Kè', '214'),
('2103', 'Huyện Duyên Hải', '214'),
('3443', 'Thị xã Duyên Hải', '214');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `provinces`
--

CREATE TABLE `provinces` (
  `id` varchar(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `provinces`
--

INSERT INTO `provinces` (`id`, `name`) VALUES
('214', 'Tỉnh Trà Vinh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `soil_types`
--

CREATE TABLE `soil_types` (
  `id` varchar(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `soil_types`
--

INSERT INTO `soil_types` (`id`, `name`) VALUES
('', 'Đất Phèn'),
('1', 'Đất cát'),
('2', 'Đất sét'),
('3', 'Đất cỏ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tree_types`
--

CREATE TABLE `tree_types` (
  `id` varchar(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tree_types`
--

INSERT INTO `tree_types` (`id`, `name`) VALUES
('', 'Chôm chôm'),
('1', 'Dừa'),
('2', 'Xoài'),
('3', 'Bưởi'),
('4', 'Dưa hấu'),
('5', 'Sầu riêng'),
('6', 'Ổi'),
('7', 'Lựu'),
('8', 'Bơ'),
('9', 'Măng cụt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Huy Khanh', 'huykhanh@gmail.com', '2023-10-29 08:52:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2023-10-29 11:05:02', '2023-10-29 11:05:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wards`
--

CREATE TABLE `wards` (
  `id` varchar(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `district_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `wards`
--

INSERT INTO `wards` (`id`, `name`, `district_id`) VALUES
('580101', 'Phường 1', '1560'),
('580102', 'Phường 2', '1560'),
('580103', 'Phường 3', '1560'),
('580104', 'Phường 4', '1560'),
('580105', 'Phường 5', '1560'),
('580106', 'Phường 6', '1560'),
('580107', 'Phường 7', '1560'),
('580108', 'Phường 8', '1560'),
('580109', 'Phường 9', '1560'),
('580110', 'Xã Long Đức', '1560'),
('580201', 'Thị trấn Càng Long', '2086'),
('580202', 'Xã An Trường', '2086'),
('580203', 'Xã An Trường A', '2086'),
('580204', 'Xã Bình Phú', '2086'),
('580205', 'Xã Đại Phúc', '2086'),
('580206', 'Xã Đại Phước', '2086'),
('580207', 'Xã Đức Mỹ', '2086'),
('580208', 'Xã Huyền Hội', '2086'),
('580209', 'Xã Mỹ Cẩm', '2086'),
('580210', 'Xã Nhị Long', '2086'),
('580211', 'Xã Nhị Long Phú', '2086'),
('580212', 'Xã Phương Thạnh', '2086'),
('580213', 'Xã Tân An', '2086'),
('580214', 'Xã Tân Bình', '2086'),
('580301', 'Thị trấn Cầu Kè', '2091'),
('580302', 'Xã An Phú Tân', '2091'),
('580303', 'Xã Châu Điền', '2091'),
('580304', 'Xã Hòa Ân', '2091'),
('580305', 'Xã Hoà Tân', '2091'),
('580306', 'Xã Ninh Thới', '2091'),
('580307', 'Xã Phong Phú', '2091'),
('580308', 'Xã Phong Thạnh', '2091'),
('580309', 'Xã Tam Ngãi', '2091'),
('580310', 'Xã Thạnh Phú', '2091'),
('580311', 'Xã Thông Hòa', '2091'),
('580401', 'Thị trấn Cầu Quan', '2020'),
('580402', 'Thị trấn Tiểu Cần', '2020'),
('580403', 'Xã Hiếu Trung', '2020'),
('580404', 'Xã Hiếu Tử', '2020'),
('580405', 'Xã Hùng Hòa', '2020'),
('580406', 'Xã Long Thới', '2020'),
('580407', 'Xã Ngãi Hùng', '2020'),
('580408', 'Xã Phú Cần', '2020'),
('580409', 'Xã Tân Hòa', '2020'),
('580410', 'Xã Tân Hùng', '2020'),
('580411', 'Xã Tập Ngãi', '2020'),
('58051', 'Thị trấn Châu Thành', '1911'),
('580510', 'Xã Mỹ Chánh', '1911'),
('580511', 'Xã Nguyệt Hóa', '1911'),
('580512', 'Xã Phước Hảo', '1911'),
('580513', 'Xã Song Lộc', '1911'),
('580514', 'Xã Thanh Mỹ', '1911'),
('58052', 'Xã Đa Lộc', '1911'),
('58053', 'Xã Hòa Lợi', '1911'),
('58054', 'Xã Hòa Minh', '1911'),
('58055', 'Xã Hòa Thuận', '1911'),
('58056', 'Xã Hưng Mỹ', '1911'),
('58057', 'Xã Long Hòa', '1911'),
('58058', 'Xã Lương Hòa', '1911'),
('58059', 'Xã Lương Hoà A', '1911'),
('580601', 'Thị trấn Định An', '2033'),
('580602', 'Thị trấn Trà Cú', '2033'),
('580603', 'Xã An Quảng Hữu', '2033'),
('580604', 'Xã Đại An', '2033'),
('580605', 'Xã Định An', '2033'),
('580606', 'Xã Hàm Giang', '2033'),
('580607', 'Xã Hàm Tân', '2033'),
('580608', 'Xã Kim Sơn', '2033'),
('580609', 'Xã Long Hiệp', '2033'),
('580610', 'Xã Lưu Nghiệp Anh', '2033'),
('580611', 'Xã Ngãi Xuyên', '2033'),
('580612', 'Xã Ngọc Biên', '2033'),
('580613', 'Xã Phước Hưng', '2033'),
('580614', 'Xã Tân Hiệp', '2033'),
('580615', 'Xã Tân Sơn', '2033'),
('580616', 'Xã Tập Sơn', '2033'),
('580617', 'Xã Thanh Sơn', '2033'),
('580701', 'Thị trấn Cầu Ngang', '1908'),
('580702', 'Thị trấn Mỹ Long', '1908'),
('580703', 'Xã Hiệp Hòa', '1908'),
('580704', 'Xã Hiệp Mỹ Đông', '1908'),
('580705', 'Xã Hiệp Mỹ Tây', '1908'),
('580706', 'Xã Kim Hòa', '1908'),
('580707', 'Xã Long Sơn', '1908'),
('580708', 'Xã Mỹ Hòa', '1908'),
('580709', 'Xã Mỹ Long Bắc', '1908'),
('580710', 'Xã Mỹ Long Nam', '1908'),
('580711', 'Xã Nhị Trường', '1908'),
('580712', 'Xã Thạnh Hòa Sơn', '1908'),
('580713', 'Xã Thuận Hòa', '1908'),
('580714', 'Xã Trường Thọ', '1908'),
('580715', 'Xã Vĩnh Kim', '1908'),
('580801', 'Thị trấn Long Thành', '2103'),
('580802', 'Xã Đôn Châu', '2103'),
('580803', 'Xã Đôn Xuân', '2103'),
('580804', 'Xã Đông Hải', '2103'),
('580805', 'Xã Long Khánh', '2103'),
('580806', 'Xã Long Vĩnh', '2103'),
('580807', 'Xã Ngũ Lạc', '2103'),
('580901', 'Phường 1', '3443'),
('580902', 'Phường 2', '3443'),
('580903', 'Xã Dân Thành', '3443'),
('580904', 'Xã Hiệp Thạnh', '3443'),
('580905', 'Xã Long Hữu', '3443'),
('580906', 'Xã Long Toàn', '3443'),
('580907', 'Xã Trường Long Hòa', '3443');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `water_types`
--

CREATE TABLE `water_types` (
  `id` varchar(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `water_types`
--

INSERT INTO `water_types` (`id`, `name`) VALUES
('1', 'Nước mặn'),
('2', 'Nước ngầm'),
('3', 'Nước mưa'),
('4', 'Nước sông');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_id` (`province_id`);

--
-- Chỉ mục cho bảng `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `soil_types`
--
ALTER TABLE `soil_types`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tree_types`
--
ALTER TABLE `tree_types`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `district_id` (`district_id`);

--
-- Chỉ mục cho bảng `water_types`
--
ALTER TABLE `water_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`);

--
-- Các ràng buộc cho bảng `wards`
--
ALTER TABLE `wards`
  ADD CONSTRAINT `wards_ibfk_1` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
