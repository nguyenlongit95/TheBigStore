-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 27, 2018 at 05:22 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BigStore`
--

-- --------------------------------------------------------

--
-- Table structure for table `Answers`
--

CREATE TABLE `Answers` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idQuestion` int(11) NOT NULL,
  `Answers` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Answers`
--

INSERT INTO `Answers` (`id`, `idUser`, `idQuestion`, `Answers`, `created_at`, `updated_at`) VALUES
(1, 9, 1, 'BigStore is a mini supermarket operating on many countries, we provide all essential products for home appliances such as: canned food, fresh food, fast food etc.\r\nContact Ngoc Truc Stret, Nam Tu Liem County, Ha Noi Capital in Viet Nam', '2018-07-17 03:16:44', '0000-00-00 00:00:00'),
(2, 9, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, consectetur distinctio eum facilis nobis officia possimus ullam! Animi consequuntur doloremque, earum eos fuga fugit labore minus officia quia, ratione reiciendis!</p>', '2018-07-16 21:39:29', '2018-07-16 21:39:29');

-- --------------------------------------------------------

--
-- Table structure for table `Banner`
--

CREATE TABLE `Banner` (
  `id` int(11) NOT NULL,
  `idMainCategories` int(11) NOT NULL,
  `Banner` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Banner`
--

INSERT INTO `Banner` (`id`, `idMainCategories`, `Banner`, `created_at`, `updated_at`) VALUES
(1, 1, 'DW4_ki.jpg', '2018-05-25 08:12:46', '2018-05-25 08:12:46'),
(2, 1, 'vG3_ki1.jpg', '2018-05-25 19:03:51', '2018-05-25 19:03:51'),
(3, 1, 'b1x_ki2.jpg', '2018-05-25 19:04:05', '2018-05-25 19:04:05'),
(4, 2, 'M6n_ki3.jpg', '2018-05-25 19:04:23', '2018-05-25 19:04:23'),
(5, 2, 'W7x_ki4.jpg', '2018-05-25 19:04:31', '2018-05-25 19:04:31'),
(6, 2, 'z7I_ki5.jpg', '2018-05-25 19:04:41', '2018-05-25 19:04:41'),
(7, 3, 'pEa_ki6.jpg', '2018-05-25 19:04:58', '2018-05-25 19:04:58'),
(8, 3, '4BB_ki7.jpg', '2018-05-25 19:05:07', '2018-05-25 19:05:07'),
(9, 3, 'KnB_ki8.jpg', '2018-05-25 19:05:17', '2018-05-25 19:05:17');

-- --------------------------------------------------------

--
-- Table structure for table `BigStoreOrder`
--

CREATE TABLE `BigStoreOrder` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `AddressShip` varchar(255) NOT NULL,
  `TotalPrice` int(11) NOT NULL,
  `CodeOrder` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `BigStoreOrder`
--

INSERT INTO `BigStoreOrder` (`id`, `idUser`, `Name`, `AddressShip`, `TotalPrice`, `CodeOrder`, `created_at`, `updated_at`) VALUES
(10, 9, 'Name', 'VietNam', 152, 'p2u_demoUser', '2018-07-18 21:46:09', '2018-07-18 21:46:09'),
(11, 9, 'Name', 'VietNam', 178, 'eag_demoUser', '2018-07-19 04:08:17', '2018-07-19 04:08:17'),
(12, 9, 'Name', 'VietNam', 178, 'U7Q_demoUser', '2018-07-19 04:09:25', '2018-07-19 04:09:25'),
(13, 9, 'Name', 'VietNam', 57, '1R9_demoUser', '2018-07-19 08:26:46', '2018-07-19 08:26:46'),
(14, 9, 'Name', 'VietNam', 57, '4yv_demoUser', '2018-07-19 08:28:36', '2018-07-19 08:28:36'),
(15, 9, 'Name', 'VietNam', 57, 'Ejn_demoUser', '2018-07-19 08:28:53', '2018-07-19 08:28:53'),
(16, 9, 'Name', 'VietNam', 57, 'mwg_demoUser', '2018-07-19 08:29:19', '2018-07-19 08:29:19'),
(17, 9, 'Name', 'VietNam', 57, 'Nuo_demoUser', '2018-07-19 08:29:46', '2018-07-19 08:29:46'),
(18, 9, 'Name', 'VietNam', 56, 'CG9_demoUser', '2018-07-19 21:31:05', '2018-07-19 21:31:05');

-- --------------------------------------------------------

--
-- Table structure for table `BigStoreOrderDetail`
--

CREATE TABLE `BigStoreOrderDetail` (
  `id` int(11) NOT NULL,
  `idBigStoreOrder` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `CodeOrder` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `BigStoreOrderDetail`
--

INSERT INTO `BigStoreOrderDetail` (`id`, `idBigStoreOrder`, `idProduct`, `Qty`, `Price`, `CodeOrder`, `created_at`, `updated_at`) VALUES
(1, 10, 32, 1, 54, 'p2u_demoUser', '2018-07-18 21:46:09', '2018-07-18 21:46:09'),
(2, 10, 27, 1, 72, 'p2u_demoUser', '2018-03-18 21:46:09', '2018-07-18 21:46:09'),
(3, 11, 19, 1, 74, 'eag_demoUser', '2018-05-19 04:08:17', '2018-07-19 04:08:17'),
(4, 11, 35, 1, 74, 'eag_demoUser', '2018-03-19 04:08:17', '2018-07-19 04:08:17'),
(5, 12, 19, 1, 74, 'U7Q_demoUser', '2018-05-19 04:09:25', '2018-07-19 04:09:25'),
(6, 12, 35, 1, 74, 'U7Q_demoUser', '2018-05-19 04:09:25', '2018-07-19 04:09:25'),
(7, 17, 1, 1, 48, 'Nuo_demoUser', '2018-03-19 08:29:46', '2018-07-19 08:29:46'),
(8, 18, 13, 1, 46, 'CG9_demoUser', '2018-02-19 21:31:05', '2018-07-19 21:31:05');

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE `Categories` (
  `id` int(11) NOT NULL,
  `idMainCategories` int(11) NOT NULL,
  `Categories` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` (`id`, `idMainCategories`, `Categories`, `info`, `created_at`, `updated_at`) VALUES
(1, 1, 'Water & Beverages', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:49:41', '2018-05-24 07:49:41'),
(2, 1, 'Fruits & Vegetables', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:49:56', '2018-05-24 07:49:56'),
(3, 1, 'Staples', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:50:06', '2018-05-24 07:50:06'),
(4, 1, 'Branded Food', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:50:27', '2018-05-24 07:50:27'),
(5, 1, 'Breakfast & Cereal', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:50:44', '2018-05-24 07:50:44'),
(6, 1, 'Snacks', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:50:54', '2018-05-24 07:50:54'),
(7, 1, 'Spices', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:51:02', '2018-05-24 07:51:02'),
(8, 1, 'Biscuit & Cookie', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:51:12', '2018-05-24 07:51:12'),
(9, 1, 'Sweets', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:51:21', '2018-05-24 07:51:21'),
(10, 1, 'Pickle & Condiment', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:51:29', '2018-05-24 07:51:29'),
(11, 1, 'Instant Food', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:51:36', '2018-05-24 07:51:36'),
(12, 1, 'Dry Fruit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:51:44', '2018-05-24 07:51:44'),
(13, 1, 'Tea & Coffee', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:51:53', '2018-05-24 07:51:53'),
(14, 2, 'Ayurvedic', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:52:07', '2018-05-24 07:52:07'),
(15, 2, 'Baby Care', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:52:18', '2018-05-24 07:52:18'),
(16, 2, 'Cosmetics', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:52:27', '2018-05-24 07:52:27'),
(17, 2, 'Deo & Purfumes', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:52:38', '2018-05-24 07:52:38'),
(18, 2, 'Hair Care', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:52:46', '2018-05-24 07:52:46'),
(19, 2, 'Oral Care', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:52:55', '2018-05-24 07:52:55'),
(20, 2, 'Personal Hygiene', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:53:14', '2018-05-24 07:53:14'),
(21, 2, 'Fashion Accessories', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:53:34', '2018-05-24 07:53:34'),
(22, 2, 'Grooming Tools', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:53:42', '2018-05-24 07:53:42'),
(23, 2, 'Shaving Need', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:53:51', '2018-05-24 07:53:51'),
(24, 2, 'Sanitary Needs', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:54:01', '2018-05-24 07:54:01'),
(25, 2, 'Skin care', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:54:10', '2018-05-24 07:54:10'),
(26, 3, 'Cleaning Accessories', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:54:23', '2018-05-24 07:54:23'),
(27, 3, 'CookWear', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:54:40', '2018-05-24 07:54:40'),
(28, 3, 'Gardening Needs', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:54:59', '2018-05-24 07:54:59'),
(29, 3, 'Kitchen & Dining', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:55:12', '2018-05-24 07:55:12'),
(30, 3, 'KitchenWear', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:55:21', '2018-05-24 07:55:21'),
(31, 3, 'Pet Care', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:55:31', '2018-05-24 07:55:31'),
(32, 3, 'Plastic Wear', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:55:42', '2018-05-24 07:55:42'),
(33, 3, 'Pooja Needs', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:55:54', '2018-05-24 07:55:54'),
(34, 3, 'Serveware', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:56:04', '2018-05-24 07:56:04'),
(35, 3, 'Safety Accessories', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:56:15', '2018-05-24 07:56:15'),
(36, 3, 'Festive Decoratives', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-24 07:56:24', '2018-05-24 07:56:24'),
(37, 1, 'Water & Beverage', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa ducimus impedit iste iusto molestias, pariatur perspiciatis quia! Ad dolorem ea excepturi nisi nulla obcaecati possimus ut? Excepturi molestiae possimus similique.', '2018-05-25 07:17:28', '2018-05-25 07:17:28');

-- --------------------------------------------------------

--
-- Table structure for table `Contact`
--

CREATE TABLE `Contact` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Message` varchar(255) NOT NULL,
  `Checker` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Contact`
--

INSERT INTO `Contact` (`id`, `Name`, `Email`, `Message`, `Checker`, `created_at`, `updated_at`) VALUES
(1, 'ThanhNhan96', 'thanhnhan030796@gmail.com', '    - Xử lý với timezone\r\n    - Lấy datetime hiện tại dễ dàng\r\n    - Convert datetime sang 1 số định dạng khác dễ đọc\r\n    - Phân tích 1 cụm từ tiếng Anh sang định dạng datetime\r\n    - Dễ dàng thao tác với datetime', 0, '2018-07-22 09:59:42', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `FormProperties`
--

CREATE TABLE `FormProperties` (
  `id` int(11) NOT NULL,
  `idCategories` int(11) NOT NULL,
  `FormProperties` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `FormProperties`
--

INSERT INTO `FormProperties` (`id`, `idCategories`, `FormProperties`, `created_at`, `updated_at`) VALUES
(1, 1, 'Capacity', '2018-05-25 20:41:44', '2018-05-25 20:41:44');

-- --------------------------------------------------------

--
-- Table structure for table `ImgProduct`
--

CREATE TABLE `ImgProduct` (
  `id` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `ImgProduct` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ImgProduct`
--

INSERT INTO `ImgProduct` (`id`, `idProduct`, `ImgProduct`, `created_at`, `updated_at`) VALUES
(2, 1, 'ekG_of33.png', '2018-06-14 20:52:44', '2018-06-14 20:52:44'),
(3, 2, 'bEL_of8.png', '2018-06-15 02:33:57', '2018-06-15 02:33:57'),
(4, 3, 'T8l_of25.png', '2018-06-15 02:34:23', '2018-06-15 02:34:23'),
(5, 4, 'AXW_of24.png', '2018-06-15 02:34:50', '2018-06-15 02:34:50'),
(6, 5, 'cYd_of30.png', '2018-06-15 02:35:56', '2018-06-15 02:35:56'),
(7, 6, 'Gax_of29.png', '2018-06-15 02:36:20', '2018-06-15 02:36:20'),
(8, 7, 'Xfk_of31.png', '2018-06-15 02:36:47', '2018-06-15 02:36:47'),
(9, 8, 'oPD_of28.png', '2018-06-15 02:37:12', '2018-06-15 02:37:12'),
(10, 9, 'zxc_of32.png', '2018-06-15 02:37:41', '2018-06-15 02:37:41'),
(11, 10, 'qlR_of34.png', '2018-06-15 02:38:08', '2018-06-15 02:38:08'),
(12, 11, 'Ty8_of35.png', '2018-06-15 02:38:46', '2018-06-15 02:38:46'),
(13, 12, 'cS9_of36.png', '2018-06-15 02:39:11', '2018-06-15 02:39:11'),
(14, 13, 'Mhf_of37.png', '2018-06-15 02:39:34', '2018-06-15 02:39:34'),
(15, 14, 'P6G_of38.png', '2018-06-15 02:39:59', '2018-06-15 02:39:59'),
(16, 15, 'LIq_of39.png', '2018-06-15 02:40:29', '2018-06-15 02:40:29'),
(17, 16, 'BTI_of40.png', '2018-06-15 02:40:57', '2018-06-15 02:40:57'),
(18, 17, 'YjY_of41.png', '2018-06-15 02:41:28', '2018-06-15 02:41:28'),
(19, 18, 'JRb_of42.png', '2018-06-15 02:42:02', '2018-06-15 02:42:02'),
(20, 19, 'e9P_of43.png', '2018-06-15 02:42:26', '2018-06-15 02:42:26'),
(21, 20, 'kXc_of44.png', '2018-06-15 02:42:52', '2018-06-15 02:42:52'),
(22, 21, 'q2l_of45.png', '2018-06-15 02:43:17', '2018-06-15 02:43:17'),
(23, 22, 'Drw_of46.png', '2018-06-15 02:43:42', '2018-06-15 02:43:42'),
(24, 23, 'j0P_of47.png', '2018-06-15 02:44:02', '2018-06-15 02:44:02'),
(25, 24, 'jyn_of48.png', '2018-06-15 02:44:35', '2018-06-15 02:44:35'),
(26, 25, 'qiO_of49.png', '2018-06-15 02:44:58', '2018-06-15 02:44:58'),
(27, 26, 'WzN_of49.png', '2018-06-15 02:45:15', '2018-06-15 02:45:15'),
(28, 27, 'GSN_of50.png', '2018-06-15 02:45:29', '2018-06-15 02:45:29'),
(29, 28, 'gYU_of51.png', '2018-06-15 02:45:47', '2018-06-15 02:45:47'),
(30, 28, 'Csn_of52.png', '2018-06-15 02:46:05', '2018-06-15 02:46:05'),
(31, 29, 'nva_of52.png', '2018-06-15 02:46:30', '2018-06-15 02:46:30'),
(32, 30, 'KN2_of53.png', '2018-06-15 02:46:46', '2018-06-15 02:46:46'),
(33, 31, 'RyC_of54.png', '2018-06-15 02:47:13', '2018-06-15 02:47:13'),
(35, 33, 'wm4_of56.png', '2018-06-15 02:47:58', '2018-06-15 02:47:58'),
(36, 32, 'Su3_of57.png', '2018-06-15 02:48:16', '2018-06-15 02:48:16'),
(37, 34, 'LM9_of58.png', '2018-06-15 02:48:59', '2018-06-15 02:48:59'),
(39, 35, '3fr_of59.png', '2018-06-18 05:07:49', '2018-06-18 05:07:49');

-- --------------------------------------------------------

--
-- Table structure for table `Info`
--

CREATE TABLE `Info` (
  `id` int(11) NOT NULL,
  `OurBranChes` varchar(255) NOT NULL,
  `Mobile` int(11) NOT NULL,
  `Office` int(11) NOT NULL,
  `Home` int(11) NOT NULL,
  `Fax` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Linked`
--

CREATE TABLE `Linked` (
  `id` int(11) NOT NULL,
  `Linked` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `MainCategories`
--

CREATE TABLE `MainCategories` (
  `id` int(11) NOT NULL,
  `MainCategories` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `MainCategories`
--

INSERT INTO `MainCategories` (`id`, `MainCategories`, `created_at`, `updated_at`) VALUES
(1, 'Kitchens', '2018-05-25 14:00:56', '2018-05-25 07:00:56'),
(2, 'Personal Care', '2018-05-24 07:25:10', '2018-05-24 07:25:10'),
(3, 'Household', '2018-05-24 07:25:28', '2018-05-24 07:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `Poster`
--

CREATE TABLE `Poster` (
  `id` int(11) NOT NULL,
  `Poster` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `id` int(11) NOT NULL,
  `idCategories` int(11) NOT NULL,
  `NameProduct` varchar(255) NOT NULL,
  `Info` varchar(1000) NOT NULL,
  `Price` int(11) NOT NULL,
  `Sales` int(11) NOT NULL,
  `QTY` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`id`, `idCategories`, `NameProduct`, `Info`, `Price`, `Sales`, `QTY`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tea(250 g)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p><span style=\"background-color:rgb(238, 245, 249); color:rgb(85, 85, 85); font-family:poppins,sans-serif; font-size:14.4px\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet at beatae iure numquam pariatur sed, soluta. Alias aliquid est et eum maiores quia quisquam, quod rem sapiente similique totam?Alias aliquid est et eum maiores quia quisquam, quod rem sapiente similique totam?</span></p>', 50, 5, 3, '2018-05-22 09:04:21', '2018-07-19 08:29:46'),
(2, 2, 'Banana(1 kg)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p><span style=\"background-color:rgb(238, 245, 249); color:rgb(85, 85, 85); font-family:poppins,sans-serif; font-size:14.4px\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet at beatae iure numquam pariatur sed, soluta. Alias aliquid est et eum maiores quia quisquam, quod rem sapiente similique totam?</span></p>\r\n\r\n<p><span style=\"background-color:rgb(238, 245, 249); color:rgb(85, 85, 85); font-family:poppins,sans-serif; font-size:14.4px\">quae quam qui, reprehenderit tenetur ullam veniam, vero voluptatum! Deserunt dignissimos exercitationem sunt temporibus tenetur totam voluptate.</span></p>', 35, 3, 5, '2018-05-22 09:04:41', '2018-06-14 07:08:14'),
(3, 5, 'Peach Halves(250 g)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p>ibero minus odio officiis perspiciatis soluta velit? Alias cum debitis delectus dolor illum recusandae rem unde voluptatum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores ex nesciunt non officia quae quam qui, reprehenderit tenetur ullam veniam, vero voluptatum! Deserun</p>', 25, 2, 5, '2018-05-22 03:39:34', '2018-06-14 07:08:59'),
(4, 6, 'Wheat(500 g)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p>&nbsp;Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p>&nbsp;Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>', 50, 5, 3, '2018-06-22 03:36:34', '2018-06-14 07:09:38'),
(5, 9, 'Nuts(1 kg)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p>voluptatum! Deserunt dignissimos exercitationem sunt temporibus tenetur totam voluptate.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet at beatae iure numquam&nbsp;</p>\r\n\r\n<p><span style=\"background-color:rgb(238, 245, 249); color:rgb(85, 85, 85); font-family:poppins,sans-serif; font-size:14.4px\">eum maiores quia quisquam, quod rem sapiente similique totam?</span></p>', 20, 4, 10, '2018-06-22 03:41:50', '2018-06-14 07:10:30'),
(6, 6, 'Biscuits(250 g)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p><span style=\"background-color:rgb(238, 245, 249); color:rgb(85, 85, 85); font-family:poppins,sans-serif; font-size:14.4px\">consectetur adipisicing elit. A aperiam dolor ducimus eligendi excepturi illum itaque, minima minus modi nisi non odio officiis placeat porro possimus qui qui</span></p>\r\n\r\n<p><span style=\"background-color:rgb(238, 245, 249); color:rgb(85, 85, 85); font-family:poppins,sans-serif; font-size:14.4px\">et at beatae iure numquam pariatur sed, soluta. Alias aliquid est et eum maiores quia quisquam, quod rem sapiente similique</span></p>', 45, 5, 5, '2018-06-22 03:36:30', '2018-06-14 07:11:21'),
(7, 7, 'Rice(500 g)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p>quam qui, reprehenderit tenetur ullam veniam, vero voluptatum! Deserunt dignissimos exercitationem sunt temporibus tenetur totam voluptate.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet at beatae iure numquam&nbsp;</p>', 80, 8, 3, '2018-04-22 09:04:58', '2018-06-14 07:12:47'),
(8, 11, 'Oil(500 g)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p><span style=\"background-color:rgb(238, 245, 249); color:rgb(85, 85, 85); font-family:poppins,sans-serif; font-size:14.4px\">onsectetur adipisicing elit. Aliquid amet at beatae iure numquam pariatur sed, soluta. Alias aliquid est et eum maiores quia quisquam, quod rem sapiente similique totam?</span></p>\r\n\r\n<p><span style=\"background-color:rgb(238, 245, 249); color:rgb(85, 85, 85); font-family:poppins,sans-serif; font-size:14.4px\">onsectetur adipisicing elit. Aliquid amet at beatae iure numquam pariatur sed, soluta. Alias aliquid est et eum maiores quia quisquam, quod rem sapiente similique totam?</span></p>', 60, 6, 5, '2018-04-22 03:36:49', '2018-06-14 07:13:35'),
(9, 12, 'Noodles(500 g)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores ex nesciunt non officia quae quam qui, reprehenderit tenetur ullam veniam, vero voluptatum! Deserunt dignissimos exercitationem sunt temporibus tenetur totam voluptate.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet at beatae iure numqua</p>', 60, 6, 5, '2018-04-22 03:37:38', '2018-06-14 07:14:25'),
(10, 4, 'Seafood(1 kg)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p><span style=\"background-color:rgb(238, 245, 249); color:rgb(85, 85, 85); font-family:poppins,sans-serif; font-size:14.4px\">riatur sed, soluta. Alias aliquid est et eum maiores quia quisquam, quod rem sapiente similique totam?</span></p>\r\n\r\n<p><span style=\"background-color:rgb(238, 245, 249); color:rgb(85, 85, 85); font-family:poppins,sans-serif; font-size:14.4px\">riatur sed, soluta. Alias aliquid est et eum maiores quia quisquam, quod rem sapiente similique totam?</span></p>\r\n\r\n<p><span style=\"background-color:rgb(238, 245, 249); color:rgb(85, 85, 85); font-family:poppins,sans-serif; font-size:14.4px\">riatur sed, soluta. Alias aliquid est et eum maiores quia quisquam, quod rem sapiente similique totam?</span></p>', 35, 3, 3, '2018-03-22 03:36:20', '2018-06-14 07:15:04'),
(11, 13, 'Oats Idli(500 g)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p>aperiam dolor ducimus eligendi excepturi illum itaque, minima minus modi nisi non odio officiis placeat porro possimus qui quisquam suscipit voluptatem.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque debitis dignissimos doloribus ex libero minus odio officiis perspic</p>', 80, 8, 4, '2018-07-22 09:05:02', '2018-06-14 07:15:34'),
(12, 15, 'Baby Oil(250 g)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p>sectetur adipisicing elit. Atque debitis dignissimos doloribus ex libero minus odio officiis perspiciatis soluta velit? Alias cum debitis delectus dolor illum recusandae rem unde voluptatum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores ex nesciunt non officia quae quam qui, reprehenderit tenetur ullam veniam, vero voluptatum! Deserunt dignissimos exercitationem sunt temporib</p>', 60, 6, 3, '2018-03-22 03:36:55', '2018-06-14 07:16:10'),
(13, 14, 'Soap(250 g)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p>riores ex nesciunt non officia quae quam qui, reprehenderit tenetur ullam veniam, vero voluptatum! Deserunt dignissimos exercitationem sunt temporibus tenetur totam voluptate.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet at beatae iure numquam pariatur sed, soluta. Alias aliquid est et eum maiores quia quisquam, quod rem sapiente similique totam?</p>', 48, 4, 5, '2018-03-22 03:36:14', '2018-07-19 21:31:05'),
(14, 18, 'Hair Gel(100 g)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p>modi nisi non odio officiis placeat porro possimus qui quisquam suscipit voluptatem.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque debitis dignissimos doloribus ex libero minus odio officiis perspiciatis soluta velit? Alias cum debitis delectus dolor illum recusandae rem unde voluptatum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores ex nesciunt non officia quae quam qui, reprehenderit&nbsp;</p>', 35, 5, 3, '2018-07-22 03:36:59', '2018-06-14 07:17:23'),
(15, 16, 'Lotion (100 g)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.<span style=\"background-color:rgb(238, 245, 249); color:rgb(85, 85, 85); font-family:poppins,sans-serif; font-size:14.4px\">ectetur adipisicing elit. Aliquid amet at beatae iure numquam pariatur sed, soluta. Alias aliquid est et eum maiores quia quisquam, quod rem sapiente similique totam?</span></p>\r\n\r\n<p><span style=\"background-color:rgb(238, 245, 249); color:rgb(85, 85, 85); font-family:poppins,sans-serif; font-size:14.4px\">ectetur adipisicing elit. Aliquid amet at beatae iure numquam pariatur sed, soluta. Alias aliquid est et eum maiores quia quisquam, quod rem sapiente similique totam?</span></p>', 80, 8, 5, '2018-03-22 09:05:06', '2018-06-14 07:18:25'),
(16, 17, 'Shower Gel(250 g)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p>ur adipisicing elit. Atque debitis dignissimos doloribus ex libero minus odio officiis perspiciatis soluta velit? Alias cum debitis delectus dolor illum recusandae rem unde voluptatum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores ex nesciunt non officia quae quam qui, reprehenderit tenetur ullam veniam, vero&nbsp;</p>', 60, 6, 8, '2018-05-22 03:34:17', '2018-06-14 07:18:56'),
(17, 18, 'Hair Color(250 g)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p>uta velit? Alias cum debitis delectus dolor illum recusandae rem unde voluptatum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores ex nesciunt non officia quae quam qui, reprehenderit tenetur ullam veniam,&nbsp;</p>', 20, 4, 2, '2018-02-22 03:38:02', '2018-06-14 07:19:19'),
(18, 19, 'Wipes(300 kg)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p>quam qui, reprehenderit tenetur ullam veniam, vero voluptatum! Deserunt dignissimos exercitationem sunt temporibus tenetur totam voluptate.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>', 35, 3, 5, '2018-02-22 03:34:23', '2018-06-14 07:19:51'),
(19, 20, 'Essential Oils(200 g)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p>&nbsp;minus odio officiis perspiciatis soluta velit? Alias cum debitis delectus dolor illum recusandae rem unde voluptatum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores ex nesciunt non officia quae quam qui, reprehen</p>', 80, 8, 4, '2018-07-22 09:05:12', '2018-06-14 07:20:16'),
(20, 21, 'Cream(150 g)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p>tis dignissimos doloribus ex libero minus odio officiis perspiciatis soluta velit? Alias cum debitis delectus dolor illum recusandae rem unde voluptatum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores ex nesciunt non officia quae quam qui, reprehenderit tenetur ullam veniam, vero voluptatum! Deserunt dign</p>', 50, 5, 5, '2018-02-22 03:38:11', '2018-06-14 07:20:59'),
(21, 18, 'Hair Color(500 g)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p>lectus dolor illum recusandae rem unde voluptatum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores ex nesciunt non officia quae quam qui, reprehenderit tenetur ullam veniam, ve</p>', 45, 5, 4, '2018-04-22 03:40:00', '2018-06-14 07:21:55'),
(22, 15, 'Baby Care(1 kg)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p>voluptatum! Deserunt dignissimos exercitationem sunt temporibus tenetur totam voluptate.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet at beatae iure num</p>', 35, 3, 8, '2018-03-22 03:34:31', '2018-06-14 07:22:19'),
(23, 23, 'Lotion(100 g)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p>rcitationem sunt temporibus tenetur totam voluptate.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet at beatae iure numquam pariatur sed, soluta. Alias aliquid est et eum maiores quia quisquam, quod rem sapiente similique totam?</p>', 80, 8, 5, '2018-05-22 09:05:19', '2018-06-14 07:22:45'),
(24, 31, 'Cat Food(500 g)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p>oluptatum! Deserunt dignissimos exercitationem sunt temporibus tenetur totam voluptate.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet at beatae iure numquam&nbsp;<span style=\"background-color:rgb(238, 245, 249); color:rgb(85, 85, 85); font-family:poppins,sans-serif; font-size:14.4px\">m maiores quia quisquam, quod rem sapiente similique totam?</span></p>', 60, 6, 4, '2018-05-22 03:38:20', '2018-06-14 07:23:35'),
(25, 26, 'Safety Pins(100 g)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p>netur totam voluptate.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet at beatae iure numquam pariatur sed, soluta. Alias aliquid est et eum maiores quia quisquam, quod rem sapiente similique totam?</p>', 45, 5, 5, '2018-04-22 03:38:23', '2018-06-14 07:24:00'),
(26, 27, 'Agarbatti(200 g)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p>bero minus odio officiis perspiciatis soluta velit? Alias cum debitis delectus dolor illum recusandae rem unde voluptatum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores ex nesciunt non officia quae quam qui, reprehenderit tenetur ullam veniam, vero voluptatum! Deserunt dignissimos exercitationem sunt temporibus tenetur totam voluptate.</p>', 35, 3, 2, '2018-01-22 03:34:42', '2018-06-14 07:24:21'),
(27, 28, 'Candle Set (1 pc)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p>enetur totam voluptate.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet at beatae iure numquam pariatur sed, soluta. Alias aliquid est&nbsp;</p>\r\n\r\n<p>enetur totam voluptate.</p>', 80, 10, 4, '2018-01-22 03:38:25', '2018-06-14 07:24:54'),
(28, 29, 'Dust Bin(1 pc)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.<span style=\"background-color:rgb(238, 245, 249); color:rgb(85, 85, 85); font-family:poppins,sans-serif; font-size:14.4px\">speriores ex nesciunt non officia quae quam qui, reprehenderit tenetur ullam veniam, vero voluptatum! Deserunt dignissimos exercitationem sunt temsperiores ex nesciunt non officia quae quam qui, reprehenderit tenetur ullam veniam, vero voluptatum! Deserunt dignissimos exercitationem sunt tem</span></p>\r\n\r\n<p><span style=\"background-color:rgb(238, 245, 249); color:rgb(85, 85, 85); font-family:poppins,sans-serif; font-size:14.4px\">lorem</span></p>', 60, 10, 5, '2018-02-22 03:38:29', '2018-06-14 07:25:28'),
(29, 30, 'Hanger(1 pc)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.<span style=\"background-color:rgb(238, 245, 249); color:rgb(85, 85, 85); font-family:poppins,sans-serif; font-size:14.4px\">quam qui, reprehenderit tenetur ullam veniam, vero voluptatum! Deserunt dignissimos exercitationem sunt temporibus tenetur totam voluptate</span></p>\r\n\r\n<p>lorem ipsum</p>', 45, 5, 3, '2018-03-22 03:38:31', '2018-06-14 07:25:59'),
(30, 31, 'Pet Bowl(1 pc)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p>ectus dolor illum recusandae rem unde voluptatum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores ex nesciunt non officia quae quam qui, reprehenderit tenetur ullam veniam, vero&nbsp;</p>\r\n\r\n<p>ectus dolor illum recusandae rem unde voluptatum.</p>', 35, 5, 8, '2018-06-22 03:38:35', '2018-06-14 07:26:30'),
(31, 32, 'Tailum(500 g)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p>ectus dolor illum recusandae rem unde voluptatum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores ex nesciunt non officia quae quam qui, reprehe</p>\r\n\r\n<p>ectus dolor illum recusandae rem unde voluptatum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores ex nesciunt non officia quae quam qui, reprehe</p>', 80, 10, 5, '2018-05-22 03:38:38', '2018-06-14 07:26:57'),
(32, 33, 'Container(1 pc)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p>o possimus qui quisquam suscipit voluptatem.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque debitis dignissimos doloribus ex libero minus odio officiis perspiciatis soluta velit? Alias cum debitis delectus dolor illum recusand</p>', 60, 10, 2, '2018-01-22 03:38:41', '2018-06-14 07:27:23'),
(33, 34, 'Scrub Sponge(100 g)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.<span style=\"background-color:rgb(238, 245, 249); color:rgb(85, 85, 85); font-family:poppins,sans-serif; font-size:14.4px\">m dolor sit amet, consectetur adipisicing elit. Asperiores ex nesciunt non officia quae quam qui, reprehenderit tenetur ullam veniam, verm dolor sit amet, consectetur adipisicing elit. Asperiores ex nesciunt non officia quae quam qui, reprehenderit tenetur ullam veniam, ver</span></p>', 45, 5, 3, '2018-02-22 03:38:43', '2018-06-14 07:27:49'),
(34, 35, 'Reindeer (2 pc)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p>luta velit? Alias cum debitis delectus dolor illum recusandae rem unde voluptatum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores ex nesciunt non officia quae quam qui, reprehenderit tenetur ullam veniam, vero&nbsp;</p>', 35, 5, 5, '2018-03-22 03:38:45', '2018-06-14 07:28:16'),
(35, 36, 'Cleaner(3 pc)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p>&nbsp;voluptatum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores ex nesciunt non officia quae quam qui, reprehenderit tenetur ullam veniam, vero&nbsp;</p>\r\n\r\n<p>&nbsp;voluptatum.</p>', 80, 8, 4, '2018-04-22 03:38:48', '2018-06-14 07:28:44'),
(36, 3, 'Cleaner(5 pc)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p><span style=\"background-color:rgb(238, 245, 249); color:rgb(85, 85, 85); font-family:poppins,sans-serif; font-size:14.4px\">ur sed, soluta. Alias aliquid est et eum maiores quia quisquam, quod rem sapiente similique totam?</span></p>', 70, 5, 5, '2018-04-22 03:38:51', '2018-07-20 22:16:13'),
(37, 8, 'Stik Rice(700 g)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p><span style=\"background-color:rgb(238, 245, 249); color:rgb(85, 85, 85); font-family:poppins,sans-serif; font-size:14.4px\">ur ullam veniam, vero voluptatum! Deserunt dignissimos exercitationem sunt temporibus tenetur totam voluptate.</span></p>', 110, 5, 15, '2018-05-22 03:41:01', '2018-07-20 22:17:58'),
(38, 10, 'Dust Bin(Scrip)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p><span style=\"background-color:rgb(238, 245, 249); color:rgb(85, 85, 85); font-family:poppins,sans-serif; font-size:14.4px\">met at beatae iure numquam pariatur sed, solu</span></p>\r\n\r\n<p><span style=\"background-color:rgb(238, 245, 249); color:rgb(85, 85, 85); font-family:poppins,sans-serif; font-size:14.4px\">met at beatae iure numquam pariatur sed, solu</span></p>', 120, 15, 20, '2018-06-22 03:33:19', '2018-07-20 22:18:53'),
(39, 1, 'Tea(500 g) (0.5 kg)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p><span style=\"background-color:rgb(238, 245, 249); color:rgb(85, 85, 85); font-family:poppins,sans-serif; font-size:14.4px\">onsectetur adipisicing elit. Aliquid amet at beatae iure numquam pariatur sed, soluta. Alias aliq</span></p>', 90, 5, 3, '2018-07-23 01:55:34', '2018-07-23 01:55:34'),
(40, 1, 'Lotion(200 g)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p><span style=\"background-color:rgb(238, 245, 249); color:rgb(85, 85, 85); font-family:poppins,sans-serif; font-size:14.4px\">ectetur adipisicing elit. Aliquid amet at beatae iure numquam pariatur sed, soluta. Alias a</span></p>', 75, 6, 1, '2018-07-23 01:56:21', '2018-07-23 01:56:21'),
(41, 1, 'Tailum(1 Kg)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p><span style=\"background-color:rgb(238, 245, 249); color:rgb(85, 85, 85); font-family:poppins,sans-serif; font-size:14.4px\">e quam qui, reprehenderit tenetur ullam veniam, vero voluptatum! Deserunt dignissimos exercitationem sunt temporibus&nbsp;</span></p>', 130, 10, 1, '2018-07-23 01:56:58', '2018-07-23 01:56:58'),
(42, 3, 'Dust Bin(Broad)', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consectetur impedit itaque non, tenetur vitae voluptatum! Amet aperiam at autem consequatur culpa cumque dolor nihil nisi, quae, quisquam quod tempora.</p>\r\n\r\n<p>tur ullam veniam, vero voluptatum! Deserunt dignissimos exercitationem sunt temporibus tenetur totam voluptate.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliq</p>', 130, 3, 1, '2018-07-23 01:58:42', '2018-07-23 01:58:42');

-- --------------------------------------------------------

--
-- Table structure for table `ProductRatting`
--

CREATE TABLE `ProductRatting` (
  `id` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `Ratting` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ProductSpecialProperties`
--

CREATE TABLE `ProductSpecialProperties` (
  `id` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `ProductSpecialProperties` varchar(255) NOT NULL,
  `Value` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ProductSpecialProperties`
--

INSERT INTO `ProductSpecialProperties` (`id`, `idProduct`, `ProductSpecialProperties`, `Value`, `created_at`, `updated_at`) VALUES
(1, 1, 'Taste', 'Green Tea', '2018-06-15 02:11:45', '2018-06-15 02:11:45');

-- --------------------------------------------------------

--
-- Table structure for table `Slide`
--

CREATE TABLE `Slide` (
  `id` int(11) NOT NULL,
  `Slide` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Slide`
--

INSERT INTO `Slide` (`id`, `Slide`, `created_at`, `updated_at`) VALUES
(1, '3ZE_ba.jpg', '2018-07-12 07:48:28', '2018-07-12 07:48:28'),
(2, '2X7_ba1.jpg', '2018-07-12 07:48:49', '2018-07-12 07:48:49'),
(4, 'Xce_ba2.jpg', '2018-07-12 07:54:37', '2018-07-12 07:54:37');

-- --------------------------------------------------------

--
-- Table structure for table `StateOrder`
--

CREATE TABLE `StateOrder` (
  `id` int(11) NOT NULL,
  `idOrder` int(11) NOT NULL,
  `StateOrder` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `StateOrder`
--

INSERT INTO `StateOrder` (`id`, `idOrder`, `StateOrder`, `created_at`, `updated_at`) VALUES
(1, 12, 0, '2018-07-19 04:09:25', '2018-07-19 04:09:25'),
(2, 10, 1, '2018-07-20 04:31:58', '2018-07-19 21:31:58'),
(3, 11, 1, '2018-07-19 11:10:00', '0000-00-00 00:00:00'),
(4, 17, 0, '2018-07-19 08:29:46', '2018-07-19 08:29:46'),
(5, 18, 0, '2018-07-19 21:31:05', '2018-07-19 21:31:05');

-- --------------------------------------------------------

--
-- Table structure for table `UserQuestion`
--

CREATE TABLE `UserQuestion` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `Question` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `UserQuestion`
--

INSERT INTO `UserQuestion` (`id`, `idUser`, `Question`, `created_at`, `updated_at`) VALUES
(1, 9, 'BigStore is a mini supermarket operating on many countries, we provide all essential products for home appliances such as: canned food, fresh food, fast food etc..', '2018-07-17 03:15:53', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `address`, `level`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'nguyenlongit95', '$2y$10$v8evgJOPST24srg7P.G1p.P6/Ejl.Zhnj1r0BeA.GcU.7ybAGtKie', 'nguyenlongit95@gmail.com', 'Ha Noi', 1, 'VKU_LongNguyen.png', '4LqTzZXyhpv2xTTYXGYwdJgJzCqbaGMUD5OJqY0VHeMlSLAhCxGT0U6gLpup', '2018-07-27 14:12:34', '2018-07-07 03:45:02'),
(8, 'thanhnhan96', '$2y$10$XtP9pqAaq/SnouSCbsHEYujqCUDyHY.7T5IiWLir6rNdHqxDpyYZK', 'thanhnhan030796@gmail.com', 'Ha Noi', 0, 'kkt_ThanhNhan.png', 'sN7GDKHV8YgbPyRhLt6YaNiTi1ExqrHGwNBUF3cMGiPyLg91r3OwNCQTeLa6', '2018-07-14 14:50:13', '2018-07-14 07:07:59'),
(9, 'demoUser', '$2y$10$dSKqe88VodE2Z6qheOpkkeQA.AWygECVrCuWxTbs4nNpZfCppDfGe', 'demoUser@gmail.com', 'VietNam', 0, 'user.png', 'MFi6hL2sREloX8bvcplqD8nIaSVcTUD0lAap2b85ci5T4X23v1XGYX8vOenD', '2018-07-20 04:43:38', '2018-07-14 07:45:53');

-- --------------------------------------------------------

--
-- Table structure for table `WishList`
--

CREATE TABLE `WishList` (
  `id` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `WishList`
--

INSERT INTO `WishList` (`id`, `idProduct`, `idUser`, `qty`, `created_at`, `updated_at`) VALUES
(4, 2, 9, 1, '2018-07-17 02:18:49', '2018-07-17 02:18:49'),
(5, 14, 9, 1, '2018-07-17 02:19:16', '2018-07-17 02:19:16'),
(6, 2, 7, 1, '2018-07-17 02:34:45', '2018-07-17 02:34:45'),
(7, 19, 7, 1, '2018-07-17 02:36:24', '2018-07-17 02:36:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Answers`
--
ALTER TABLE `Answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idQuestion` (`idQuestion`);

--
-- Indexes for table `Banner`
--
ALTER TABLE `Banner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMainCategories` (`idMainCategories`);

--
-- Indexes for table `BigStoreOrder`
--
ALTER TABLE `BigStoreOrder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `BigStoreOrderDetail`
--
ALTER TABLE `BigStoreOrderDetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idBigStoreOrder` (`idBigStoreOrder`);

--
-- Indexes for table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMainCategories` (`idMainCategories`);

--
-- Indexes for table `Contact`
--
ALTER TABLE `Contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `FormProperties`
--
ALTER TABLE `FormProperties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCategories` (`idCategories`);

--
-- Indexes for table `ImgProduct`
--
ALTER TABLE `ImgProduct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Indexes for table `Info`
--
ALTER TABLE `Info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Linked`
--
ALTER TABLE `Linked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `MainCategories`
--
ALTER TABLE `MainCategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Poster`
--
ALTER TABLE `Poster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCategories` (`idCategories`);

--
-- Indexes for table `ProductRatting`
--
ALTER TABLE `ProductRatting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Indexes for table `ProductSpecialProperties`
--
ALTER TABLE `ProductSpecialProperties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCategories` (`idProduct`);

--
-- Indexes for table `Slide`
--
ALTER TABLE `Slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `StateOrder`
--
ALTER TABLE `StateOrder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idOrder` (`idOrder`);

--
-- Indexes for table `UserQuestion`
--
ALTER TABLE `UserQuestion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `WishList`
--
ALTER TABLE `WishList`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Answers`
--
ALTER TABLE `Answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Banner`
--
ALTER TABLE `Banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `BigStoreOrder`
--
ALTER TABLE `BigStoreOrder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `BigStoreOrderDetail`
--
ALTER TABLE `BigStoreOrderDetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Categories`
--
ALTER TABLE `Categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `Contact`
--
ALTER TABLE `Contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `FormProperties`
--
ALTER TABLE `FormProperties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ImgProduct`
--
ALTER TABLE `ImgProduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `Info`
--
ALTER TABLE `Info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Linked`
--
ALTER TABLE `Linked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `MainCategories`
--
ALTER TABLE `MainCategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Poster`
--
ALTER TABLE `Poster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `ProductRatting`
--
ALTER TABLE `ProductRatting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ProductSpecialProperties`
--
ALTER TABLE `ProductSpecialProperties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Slide`
--
ALTER TABLE `Slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `StateOrder`
--
ALTER TABLE `StateOrder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `UserQuestion`
--
ALTER TABLE `UserQuestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `WishList`
--
ALTER TABLE `WishList`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Answers`
--
ALTER TABLE `Answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`idQuestion`) REFERENCES `UserQuestion` (`id`);

--
-- Constraints for table `Banner`
--
ALTER TABLE `Banner`
  ADD CONSTRAINT `banner_ibfk_1` FOREIGN KEY (`idMainCategories`) REFERENCES `MainCategories` (`id`);

--
-- Constraints for table `BigStoreOrder`
--
ALTER TABLE `BigStoreOrder`
  ADD CONSTRAINT `bigstoreorder_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);

--
-- Constraints for table `BigStoreOrderDetail`
--
ALTER TABLE `BigStoreOrderDetail`
  ADD CONSTRAINT `bigstoreorderdetail_ibfk_1` FOREIGN KEY (`idBigStoreOrder`) REFERENCES `BigStoreOrder` (`id`);

--
-- Constraints for table `Categories`
--
ALTER TABLE `Categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`idMainCategories`) REFERENCES `MainCategories` (`id`);

--
-- Constraints for table `FormProperties`
--
ALTER TABLE `FormProperties`
  ADD CONSTRAINT `formproperties_ibfk_1` FOREIGN KEY (`idCategories`) REFERENCES `Categories` (`id`);

--
-- Constraints for table `ImgProduct`
--
ALTER TABLE `ImgProduct`
  ADD CONSTRAINT `imgproduct_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `Product` (`id`);

--
-- Constraints for table `Product`
--
ALTER TABLE `Product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`idCategories`) REFERENCES `Categories` (`id`);

--
-- Constraints for table `ProductRatting`
--
ALTER TABLE `ProductRatting`
  ADD CONSTRAINT `productratting_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `Product` (`id`);

--
-- Constraints for table `ProductSpecialProperties`
--
ALTER TABLE `ProductSpecialProperties`
  ADD CONSTRAINT `productspecialproperties_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `Product` (`id`);

--
-- Constraints for table `StateOrder`
--
ALTER TABLE `StateOrder`
  ADD CONSTRAINT `stateorder_ibfk_1` FOREIGN KEY (`idOrder`) REFERENCES `BigStoreOrder` (`id`);

--
-- Constraints for table `UserQuestion`
--
ALTER TABLE `UserQuestion`
  ADD CONSTRAINT `userquestion_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);

--
-- Constraints for table `WishList`
--
ALTER TABLE `WishList`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
