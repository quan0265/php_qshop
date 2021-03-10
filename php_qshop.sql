-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 10, 2021 lúc 06:58 AM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `php_qshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(3, 'admin', '7b902e6ff1db9f560443f2048974fd7d386975b0', 'quan0265@gmail.com'),
(5, 'admin1', '7b902e6ff1db9f560443f2048974fd7d386975b0', 'quan02651@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `cate_id` int(100) NOT NULL,
  `brand_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`brand_id`, `cate_id`, `brand_name`) VALUES
(14, 1, 'Dell'),
(15, 1, 'Acer'),
(16, 1, 'Hp'),
(17, 2, 'Dell'),
(18, 2, 'Acer');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `cate_id` int(20) NOT NULL,
  `cate_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`cate_id`, `cate_name`) VALUES
(1, 'pin laptop'),
(2, 'sac laptop');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(100) NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(20) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `username`, `email`, `password`, `phone`, `address`) VALUES
(1, 'nong van quan', 'user', 'user@gmail.com', '1ad918380ab0147d18ad5aef93cdff3fe0ad679b', 333883838, 'ha noi'),
(5, 'nong van quan', 'user', 'user@gmail.com', '1ad918380ab0147d18ad5aef93cdff3fe0ad679b', 333883838, 'ha noi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(100) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `ship_fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ship_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ship_phone` int(20) NOT NULL,
  `ship_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_money` int(20) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `ship_fullname`, `ship_email`, `ship_phone`, `ship_address`, `total_money`, `order_date`, `order_status`) VALUES
(56, 1, 'nong van quan', 'user@gmail.com', 333883838, 'ha noi', 400000, '2021-03-09 22:23:57', 1),
(57, 1, 'nong van quan', 'user@gmail.com', 333883838, 'ha noi', 400000, '2021-03-09 22:23:57', 1),
(58, 1, 'nong van quan', 'user@gmail.com', 333883838, 'ha noi', 400000, '2021-03-09 22:24:47', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(100) NOT NULL,
  `order_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `quanlity` int(10) NOT NULL,
  `total_price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quanlity`, `total_price`) VALUES
(34, 56, 36, 1, 400000),
(35, 57, 36, 1, 400000),
(36, 58, 53, 1, 400000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `brand_id` int(100) NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` int(20) NOT NULL,
  `product_price_old` int(20) DEFAULT 0,
  `product_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_quanlity` int(20) NOT NULL,
  `product_warranty` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `brand_id`, `product_name`, `product_price`, `product_price_old`, `product_image`, `product_quanlity`, `product_warranty`, `product_detail`) VALUES
(34, 14, 'pin dell inspiron 3442 3421', 400000, 440000, '8076sac-acer-aspire-6.png', 20, '12 tháng', '<p>sản phẩm chính hãng</p>\r\n\r\n'),
(35, 18, 'Sạc acer aspire 2130', 180000, NULL, '1337sac-acer-aspire-6.png', 20, '12 tháng', '<p>sản phẩm chính hãng</p>\r\n'),
(36, 14, 'pin dell inspiron 3442 3421', 400000, 440000, '715pin-dell-inspiron-3421.jpg', 20, '12 tháng', '<p>sản phẩm chính hãng</p>\r\n\r\n'),
(37, 14, 'pin dell inspiron 3442 3421', 400000, 440000, '4355pin-dell-inspiron-3421.jpg', 20, '12 tháng', '<p>sản phẩm chính hãng</p>\r\n\r\n'),
(38, 14, 'pin dell inspiron 3442 3421', 400000, 440000, '7838pin-dell-inspiron-3421.jpg', 20, '12 tháng', '<p>sản phẩm chính hãng</p>\r\n\r\n'),
(39, 14, 'pin dell inspiron 3442 3421', 400000, 440000, '2314pin-dell-inspiron-3421.jpg', 20, '12 tháng', '<p>sản phẩm chính hãng</p>\r\n\r\n'),
(40, 14, 'pin dell inspiron 3442 3421', 400000, 440000, '8076sac-acer-aspire-6.png', 20, '12 tháng', '<p>sản phẩm chính hãng</p>\r\n\r\n'),
(41, 18, 'Sạc acer aspire 2130', 180000, 440000, '1337sac-acer-aspire-6.png', 20, '12 tháng', '<p>sản phẩm chính hãng</p>\r\n\r\n'),
(42, 14, 'pin dell inspiron 3442 3421', 400000, 440000, '715pin-dell-inspiron-3421.jpg', 20, '12 tháng', '<p>sản phẩm chính hãng</p>\r\n\r\n'),
(43, 14, 'pin dell inspiron 3442 3421', 400000, 440000, '4355pin-dell-inspiron-3421.jpg', 20, '12 tháng', '<p>sản phẩm chính hãng</p>\r\n\r\n'),
(44, 14, 'pin dell inspiron 3442 3421', 400000, 440000, '7838pin-dell-inspiron-3421.jpg', 20, '12 tháng', '<p>sản phẩm chính hãng</p>\r\n\r\n'),
(45, 14, 'pin dell inspiron 3442 3421', 400000, 440000, '2314pin-dell-inspiron-3421.jpg', 20, '12 tháng', '<p>sản phẩm chính hãng</p>\r\n\r\n'),
(46, 18, 'Sạc acer aspire 2130', 180000, 440000, '1337sac-acer-aspire-6.png', 20, '12 tháng', '<p>sản phẩm chính hãng</p>\r\n\r\n'),
(47, 18, 'Sạc acer aspire 2130', 180000, 440000, '1337sac-acer-aspire-6.png', 20, '12 tháng', '<p>sản phẩm chính hãng</p>\r\n\r\n'),
(48, 14, 'pin dell inspiron 3442 3421', 400000, 440000, '8076sac-acer-aspire-6.png', 20, '12 tháng', '<p>sản phẩm chính hãng</p>\r\n\r\n'),
(49, 14, 'pin dell inspiron 3442 3421', 400000, 440000, '715pin-dell-inspiron-3421.jpg', 20, '12 tháng', '<p>sản phẩm chính hãng</p>\r\n\r\n'),
(50, 14, 'pin dell inspiron 3442 3421', 400000, 440000, '4355pin-dell-inspiron-3421.jpg', 20, '12 tháng', '<p>sản phẩm chính hãng</p>\r\n\r\n'),
(51, 14, 'pin dell inspiron 3442 3421', 400000, 440000, '7838pin-dell-inspiron-3421.jpg', 20, '12 tháng', '<p>sản phẩm chính hãng</p>\r\n\r\n'),
(52, 14, 'pin dell inspiron 3442 3421', 400000, 440000, '2314pin-dell-inspiron-3421.jpg', 20, '12 tháng', '<p>sản phẩm chính hãng</p>\r\n\r\n'),
(53, 14, 'pin dell inspiron 3442 3421', 400000, 440000, '8076sac-acer-aspire-6.png', 20, '12 tháng', '<p>sản phẩm chính hãng</p>\r\n\r\n'),
(54, 14, 'pin dell inspiron 3442 3421', 400000, 440000, '715pin-dell-inspiron-3421.jpg', 20, '12 tháng', '<p>sản phẩm chính hãng</p>\r\n\r\n'),
(55, 14, 'pin dell inspiron 3442 3421', 400000, 440000, '4355pin-dell-inspiron-3421.jpg', 20, '12 tháng', '<p>sản phẩm chính hãng</p>\r\n\r\n'),
(56, 14, 'pin dell inspiron 3442 3421', 400000, 440000, '7838pin-dell-inspiron-3421.jpg', 20, '12 tháng', '<p>sản phẩm chính hãng</p>\r\n\r\n'),
(57, 14, 'pin dell inspiron 3442 3421', 400000, 440000, '2314pin-dell-inspiron-3421.jpg', 20, '12 tháng', '<p>sản phẩm chính hãng</p>\r\n\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` int(100) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `image`, `display`) VALUES
(24, 'pin dell inspiron 3442 3421', '8945pin-dell-inspiron-3421.jpg', 1),
(25, 'pin dell inspiron 3442 3421', '4075pin-dell-inspiron-3421.jpg', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`),
  ADD KEY `fk_brands_categories` (`cate_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cate_id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_orders_customers` (`customer_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_detail_orders` (`order_id`),
  ADD KEY `fk_order_detail_products` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_products_brands` (`brand_id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `cate_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `fk_brands_categories` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`cate_id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_customers` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `fk_order_detail_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `fk_order_detail_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_brands` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
