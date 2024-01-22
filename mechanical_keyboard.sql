-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2024 at 07:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mechanical keyboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `level`) VALUES
(1, 'Manager', 'manager@gmail.com', '123', 0),
(2, 'Admin', 'admin@gmail.com', '321', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `phone` char(15) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `email`, `password`, `token`, `phone`, `address`) VALUES
(5, 'Nguyễn Hữu Đại', 'dainguyen.nhd@gmail.com', '1', 'user_659e9541208730.10906510', '0347833039', 'Phú Yên'),
(11, 'Nguyễn Hữu Đại', 'dainguyen.dhth13@gmail.com', '123', NULL, '0347833032', 'Phú Yên'),
(14, 'Nguyễn Hữu Đại', 'nonhoem2003@gmail.com', '123', NULL, '0347833039', 'Phú Yên');

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

CREATE TABLE `forgot_password` (
  `customer_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int(11) NOT NULL,
  `manufacturers_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `manufacturers_name`, `address`, `phone`) VALUES
(9, 'Xinmeng ', 'Chinese', '400-006-1358'),
(10, 'KBDfans', 'Chinese', '400-316-1358'),
(11, 'Logitech', 'Switzerland', '021-863-5511'),
(12, 'ASUS', 'Chinese', '400-315-1328'),
(13, 'Razer', 'USA', '855-872-5233'),
(14, 'Akko', 'Vietnamese', ' 093-438-9001'),
(15, 'CMK', 'Singapore', '420-333-1388'),
(16, 'JKDK', 'Chinese', '400-006-1111'),
(17, 'MINTCAPS', 'Japanese', '123-006-9862'),
(18, 'PANDORA', 'Singapore', '420-333-8888');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name_receiver` varchar(255) NOT NULL,
  `address_receiver` varchar(255) NOT NULL,
  `phone_receiver` char(15) NOT NULL,
  `status` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `name_receiver`, `address_receiver`, `phone_receiver`, `status`, `create_at`, `total_amount`) VALUES
(2, 5, 'Nguyễn Hữu Đại', 'Phú Yên', '0347833039', 1, '2024-01-06 08:31:14', 14260),
(3, 5, 'Nguyễn Hữu Đại', 'Phú Yên', '0347833039', 2, '2024-01-06 08:40:01', 14260),
(4, 5, 'Nguyễn Hữu Đại', 'Phú Yên', '0347833039', 2, '2024-01-06 08:45:46', 14260),
(5, 5, 'Nguyễn Hữu Đại', 'Phú Yên', '0347833039', 2, '2024-01-06 08:45:50', 1460),
(6, 5, 'Nguyễn Hữu Đại', 'Phú Yên', '0347833039', 1, '2024-01-07 03:01:36', 730),
(7, 5, 'Nguyễn Hữu Đại', 'Phú Yên', '0347833039', 2, '2024-01-10 13:00:58', 730),
(8, 5, 'Nguyễn Hữu Đại', 'Phú Yên', '0347833039', 1, '2024-01-07 23:58:48', 2500);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_id`, `quantity`) VALUES
(2, 6, 1),
(2, 11, 2),
(4, 6, 1),
(4, 11, 2),
(5, 2, 2),
(6, 2, 1),
(7, 2, 1),
(8, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `photos` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `manufacturer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `photos`, `price`, `description`, `manufacturer_id`) VALUES
(2, ' XINMENG M87 PRO', '1704178411manhinhmin.webp', 730, 'Switch milky yellow\r\n\r\nType: Linear, 3 pin\r\nOperating Force: 50 ± 10gf\r\nTotal Travel: 4 ± 0.2mm\r\nPre-Travel: 2 ± 0.6mm\r\nSwitch Outemu silent peach v2\r\n\r\nType: Linear, 5 pin\r\nOperating Force: 40 ± 10gf\r\nTotal Travel: 3.5 ± 0.2mm\r\nPre-Travel: 2 ± 0.6mm', 9),
(6, 'TOFU FA', '17041815021.webp', 2500, 'The design language of \"Tofu65\" typically involves simplicity, modernity, and functionality. It may adopt a compact design with a 65% layout, preserving essential letter and function keys while excluding the number pad. The appearance of the keyboard might be uniform and streamlined, emphasizing a minimalist aesthetic. Material choice and surface treatment are likely considerations, often featuring a metal casing with color options and surface finishes to cater to users seeking a high-quality look.\r\n\r\n\"Tofu65\" is generally positioned as a high-performance, highly customizable mechanical keyboard. Its users are often keyboard enthusiasts, mechanical keyboard DIY enthusiasts, and professional users with specific requirements for keyboard quality and functionality. The keyboard may offer advanced features such as programmable keys, RGB backlighting, hot-swappable switches, etc., to meet users personalized needs.\r\n\r\nOriginally introduced by the keyboard manufacturer KBDfans, \"Tofu65\" is part of their product lineup. KBDfans is a renowned keyboard retailer known for providing high-quality mechanical keyboard parts and accessories. \"Tofu65\" likely emerged to meet the demand for customizable keyboards within the enthusiast community.\r\n\r\nThis model may have gained positive recognition within the keyboard community, receiving praise from users. It could become a preferred choice for users seeking a high-quality, highly customizable keyboard.', 10),
(7, 'TOFU65 2.0', '17041815622.webp', 4800, 'Case material: Aluminum (anodized and electrostatically coated process)\r\nPlate: PC/ Aluminum/ FR4/ Carbon fiber plate\r\nPCB: 1.2 mm Flex cut Hot-swap PCB/1.2 mm Non-Flex cut Solder PCB, supports per-key RGB, QMK firmware, VIA support, USB-C port, with daughterboard+JST cable\r\nWeight bar: Brass material (transparent E-coating after sandblasting process)\r\nStructure: Top mount, silicone socks, silicone bowl, 3 types of structural support\r\nWeight: ≈1.7 kg after assembly\r\nDimension: 313.7 mm (length) x 115.7 mm (width) x 18.5 mm (front) x 32.5 mm (back)\r\nFeature: The detachable silicon feet hiding all the screws at the bottom\r\nTyping angle: 7°\r\nDesign by KBDfans\r\nMade in China', 10),
(8, 'AKKO MOD007PC', '17042606072.webp', 1270, 'Akko MOD007PC là phiên bản nhựa của dòng sản phẩm MOD007 nhôm CNC huyền thoại của nhà Akko. Tuy nhiên, con phím này được ưu tiên làm mạch xuôi và flex từng nút cùng với chất build cực kỳ đầm và cứng giúp cho âm gõ vượt trội so với các dòng bàn phím nhựa cùng tầm giá.\r\n\r\nSwitch theo phím là dòng CS Piano ngon nhất của hãng\r\n\r\nKeycap PBT doubleshot đảm bảo độ bền tuyệt đối', 14),
(9, 'RAINY 75', '17041818184.webp', 1850, 'Maker: WOBLAB\r\nLayout: 75%\r\nMounting Style: PCB gasket Mount\r\nGóc nghiêng: 8°\r\nKeycap PBT doubleshot\r\nFull foam\r\nPCB 1.2mm \r\nTrọng lượng: ~1.8 kg với phiên bản pin 3500mAh, ~2kg với phiên bản pin 7000mAh\r\nHỗ trợ VIA\r\nStab M-one\r\nTuỳ chọn 6 màu case và 3 loại tạ\r\n\r\nAnode có 2 màu: Dark night và galaxy silver\r\n\r\nE-coating có: Cheese White, Frost peach powder, Snow moon blue, Neon purple', 10),
(10, 'JAPAN CLOUD WIND', '17042596951.webp', 899, 'Thông số kỹ thuật	\r\n Profile: Cherry\r\n Chất liệu: PBT dye-sub\r\n Số lượng phím: 168\r\n Độ dày: 1.5mm\r\n Tương thích	 Hầu hết các bàn phím cơ fullsize\r\n', 16),
(11, 'Pluto Keyboard Kit', '17042598862.webp', 5880, 'Thông tin sản phẩm:\r\nTyping Angle: 6 Degrees\r\nFront Height: 17.5 mm\r\nWeight: ~1.2 Kg before built\r\nDual Mounting: O-ring Gasket & Top Mount\r\nLayout: WKL & WK\r\nTop & Bottom Material: Aluminum 6063\r\nInternal Weight: Sand Blasted Brass\r\nPCB: 1.2 mm Non-flex cut hot-swap / 1.6 mm Non-flex cut solder PCB\r\nAccent Strip: Default Aluminum PVD Silver\r\nSwitch compatibility: MX-style switches (3 & 5-pin);\r\nWK ANSI (6.25U spacebar): minimum 71 switches required,\r\nWK ISO (6.25U spacebar): minimum 72 switches required,\r\nWKL ANSI: minimum 68 switches required,\r\nWKL ISO: minimum 69 switches required,\r\nDual Mounting: O-ring gasket mount; Top mount\r\nO-ring gasket: outer diameter 220 mm x 3.5 mm, silicone hardness: 50A\r\nDesign by Saab\r\nInclude\r\nCase x1 (with aluminum bottom)\r\nInternal weight x1\r\nO-ring gasket x1\r\nAluminum PVD Silver strip x1\r\nFoam kit x1 (Case foam, PCB foam, Switch Pad)\r\nScrews x1 set\r\nRubber feet x1 set', 10),
(16, 'MONSGEEK M1W', '17042605681.webp', 2050, 'Monsgeek M1W SP là phiên bản mới nhất của M1W với switch đi kèm là Akko CS Piano Pro cùng keycap xuyên led in mặt bên cực bắt mắt\r\n\r\nQuà tặng: dây cáp xoắn, nắp che bụi, sách hướng dẫn sử dụng.\r\n\r\nThông số kỹ thuật\r\n Hãng sản xuất: MONSGEEK\r\n Layout: 82 phím\r\n Kết nối: USB type C - Bluetooth - Wireless\r\n Led RGB: Hỗ trợ led RGB\r\n Pin: 6000mAh\r\n Hotswap: Có\r\n Foam: Lót sẵn foam silicon + foam sandwich\r\n Stab: Plate mount\r\n Kiểu mount: Gasket mount\r\n Trọng lượng: 1.7kg\r\n Kích thước: 332 x 147 x 33mm\r\n Núm xoay: Nhôm CNC\r\n Keycap: PBT doubleshot', 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `manufacturers_name` (`manufacturers_name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_name` (`product_name`),
  ADD KEY `manufacturer_id` (`manufacturer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
