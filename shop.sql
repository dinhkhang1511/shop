-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 15, 2022 lúc 05:57 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`) VALUES
(6, 'Áo', NULL),
(7, 'Quần', NULL),
(8, 'Nón', NULL),
(9, 'Phụ kiện', NULL),
(10, 'Giày', NULL),
(11, 'Áo sơ mi', 6),
(12, 'Quần short', 7),
(13, 'Quần short rách', 12),
(14, 'Dây chuyền', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `name`, `product_id`) VALUES
(1, 'Abc', 9),
(2, 'ao2', 13),
(3, 'ao3', 13),
(4, 'cross', 14),
(5, 'cross2', 14),
(6, 'cross4', 14),
(7, 'baggy1', 15),
(8, 'baggy2', 15),
(9, 'shoes2', 16),
(10, 'shoes3', 16);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `image`, `author`, `price`, `quantity`, `description`, `created_at`, `update_at`) VALUES
(3, 'Áo Polo', 6, 'aodep', 1, 500, 10, '', '2022-06-13', NULL),
(5, 'Áo ba lỗ', 6, 'quan5', 1, 300, 10, 'Quần đẹp', '2022-06-13', '2022-06-15'),
(9, 'Váy', 6, 'vay', 1, 22, 2, '2', '2022-06-15', NULL),
(10, 'Quần jean edited', 6, 'quanJean', 1, 200000, 200, '                                Đẹp mát                                                                                        ', '2022-06-15', '2022-06-15'),
(13, 'Album áo', 6, 'ao1', 1, 500, 20, 'Hay                                                            ', '2022-06-15', NULL),
(14, 'Dây chuyền thập tự', 14, 'cross3', 1, 5000, 20, 'Inox', '2022-06-15', NULL),
(15, 'Quần jogger', 7, 'baggy3', 5, 50000, 20, 'Quần dài đẹp', '2022-06-15', NULL),
(16, 'Giày', 6, 'shoes', 4, 60000, 5, 'Giày sneaker', '2022-06-15', '2022-06-15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user','','') NOT NULL DEFAULT 'user',
  `created_at` date DEFAULT NULL,
  `secret` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`secret`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `secret`) VALUES
(1, 'khang', 'dinhkhang1511@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin', '2022-06-10', NULL),
(2, 'john', 'dinhkhang1511@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin', '2022-06-10', NULL),
(3, 'manh', 'manh@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'user', '2022-06-13', NULL),
(4, 'user', 'user@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user', '2022-06-15', NULL),
(5, 'admin2', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin', '2022-06-15', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `author` (`author`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`author`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
