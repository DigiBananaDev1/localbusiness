-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2025 at 11:38 AM
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
-- Database: `localbuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
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
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Test Admin', 'test@example.com', '2025-02-24 00:58:47', '$2y$12$rzzWxwpMTimbPQglecZnxeBypJqcXR/P5pm3Ob6Pjg4rMm8U/NIB6', 'O2IDVi0XS6L0NtN18fzJRSU5TihNJIu7Ak99aX0OWF0vNYKMr2VVWal0YIy8', '2025-02-24 00:58:47', '2025-05-24 06:39:18');

-- --------------------------------------------------------

--
-- Table structure for table `admin_activity_logs`
--

CREATE TABLE `admin_activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `logged_in_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `logged_out_at` timestamp NULL DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `browser_version` varchar(255) DEFAULT NULL,
  `platform` varchar(255) DEFAULT NULL,
  `platform_version` varchar(255) DEFAULT NULL,
  `device` varchar(255) DEFAULT NULL,
  `is_mobile` varchar(255) DEFAULT NULL,
  `is_tablet` varchar(255) DEFAULT NULL,
  `is_desktop` varchar(255) DEFAULT NULL,
  `is_robot` varchar(255) DEFAULT NULL,
  `country_name` varchar(255) DEFAULT NULL,
  `region_name` varchar(255) DEFAULT NULL,
  `city_name` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `lattitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `timezone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_activity_logs`
--

INSERT INTO `admin_activity_logs` (`id`, `admin_id`, `ip_address`, `user_agent`, `logged_in_at`, `logged_out_at`, `browser`, `browser_version`, `platform`, `platform_version`, `device`, `is_mobile`, `is_tablet`, `is_desktop`, `is_robot`, `country_name`, `region_name`, `city_name`, `pincode`, `lattitude`, `longitude`, `timezone`, `created_at`, `updated_at`) VALUES
(1, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-27 00:01:31', '2025-05-27 00:13:55', 'Chrome', '136.0.0.0', 'Windows', '10.0', 'WebKit', '0', '0', '1', '0', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', '2025-05-27 00:01:31', '2025-05-27 00:13:55'),
(2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-27 00:14:00', NULL, 'Chrome', '136.0.0.0', 'Windows', '10.0', 'WebKit', '0', '0', '1', '0', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', '2025-05-27 00:14:00', '2025-05-27 00:14:00'),
(3, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-27 06:43:04', NULL, 'Chrome', '136.0.0.0', 'Windows', '10.0', 'WebKit', '0', '0', '1', '0', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', '2025-05-27 06:43:04', '2025-05-27 06:43:04'),
(4, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-28 01:07:17', NULL, 'Chrome', '136.0.0.0', 'Windows', '10.0', 'WebKit', '0', '0', '1', '0', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', '2025-05-28 01:07:17', '2025-05-28 01:07:17'),
(5, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-30 05:02:41', NULL, 'Chrome', '136.0.0.0', 'Windows', '10.0', 'WebKit', '0', '0', '1', '0', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', '2025-05-30 05:02:41', '2025-05-30 05:02:41'),
(6, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-02 01:46:37', NULL, 'Chrome', '137.0.0.0', 'Windows', '10.0', 'WebKit', '0', '0', '1', '0', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', '2025-06-02 01:46:37', '2025-06-02 01:46:37'),
(7, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-03 03:51:47', NULL, 'Chrome', '136.0.0.0', 'Windows', '10.0', 'WebKit', '0', '0', '1', '0', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', 'Unknown', '2025-06-03 03:51:47', '2025-06-03 03:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Beauty Spa', 'beauty.svg', 'beauty-spa', '2025-03-10 02:40:46', '2025-05-27 06:53:31'),
(2, 'Hotel', '1741594263.png', 'hotel', '2025-03-10 02:41:03', '2025-05-27 06:53:31'),
(3, 'Hospital', '1741594280.png', 'hospital', '2025-03-10 02:41:20', '2025-05-27 06:53:31'),
(4, 'AC Services', 'acservice.svg', 'ac-services', '2025-05-27 12:20:35', '2025-05-27 06:53:31'),
(5, 'Astrologers', 'astrologers.svg', 'astrologers', '2025-05-27 12:20:35', '2025-05-27 06:53:31'),
(6, 'Body Massage Centers', 'masseur.svg', 'body-massage-centers', '2025-05-27 12:20:35', '2025-05-27 06:53:31'),
(8, 'Car Hire', 'cabcarrental.svg', 'car-hire', '2025-05-27 12:20:35', '2025-05-27 06:53:31'),
(9, 'Caterers', 'caterers.svg', 'caterers', '2025-05-27 12:20:35', '2025-05-27 06:53:31'),
(10, 'Chartered Accountant', 'charteredaccountants.svg', 'chartered-accountant', '2025-05-27 12:20:35', '2025-05-27 06:53:31'),
(11, 'Computer Training Institute', 'computertraininginstitutes.svg', 'computer-training-institute', '2025-05-27 12:20:35', '2025-05-27 06:53:31'),
(12, 'Courier Services', 'internationalcourierservices.svg', 'courier-services', '2025-05-27 12:20:35', '2025-05-27 06:53:31'),
(13, 'Computer & Laptop Repair & Services', 'computerrepairs.svg', 'computer-laptop-repair-services', '2025-05-27 12:20:35', '2025-05-27 06:53:31'),
(14, 'Car Repair & Services', 'carrepairservices.svg', 'car-repair-services', '2025-05-27 12:20:35', '2025-05-27 06:53:31'),
(15, 'Dermatologists', 'dermatologists.svg', 'dermatologists', '2025-05-27 12:20:35', '2025-05-27 06:53:31'),
(16, 'Dentists', 'dentists.svg', 'dentists', '2025-05-27 12:20:35', '2025-05-27 06:53:31'),
(17, 'Electricians', 'electricians.svg', 'electricians', '2025-05-27 12:20:35', '2025-05-27 06:53:32'),
(18, 'Event Organizer', 'eventorganizers.svg', 'event-organizer', '2025-05-27 12:20:35', '2025-05-27 06:53:32'),
(19, 'Real Estate', 'realestate.svg', 'real-estate', '2025-05-27 12:20:35', '2025-05-27 06:53:32'),
(20, 'Fabricators', 'fabricators.svg', 'fabricators', '2025-05-27 12:20:35', '2025-05-27 06:53:32'),
(21, 'Furniture Repair Services', 'furniture.svg', 'furniture-repair-services', '2025-05-27 12:20:35', '2025-05-27 06:53:32'),
(22, 'House Keeping Services', 'housekeeping.svg', 'house-keeping-services', '2025-05-27 12:20:35', '2025-05-27 06:53:32'),
(23, 'Hobbies', 'hobbies.svg', 'hobbies', '2025-05-27 12:20:35', '2025-05-27 06:53:32'),
(24, 'Interior Designers', 'interiordesigners.svg', 'interior-designers', '2025-05-27 12:20:35', '2025-05-27 06:53:32'),
(25, 'Internet Website Designers', 'internet.svg', 'internet-website-designers', '2025-05-27 12:20:35', '2025-05-27 06:53:32'),
(26, 'Jwellery Showrooms', 'jewellery.svg', 'jwellery-showrooms', '2025-05-27 12:20:35', '2025-05-27 06:53:32'),
(27, 'Lawyers', 'lawyers.svg', 'lawyers', '2025-05-27 12:20:35', '2025-05-27 06:53:32'),
(28, 'Transporters', 'transporters.svg', 'transporters', '2025-05-27 12:20:35', '2025-05-27 06:53:32'),
(29, 'Photographers', 'photographers.svg', 'photographers', '2025-05-27 12:20:35', '2025-05-27 06:53:32'),
(30, 'Nursing Services', 'nursebureaus.svg', 'nursing-services', '2025-05-27 12:20:35', '2025-05-27 06:53:32'),
(31, 'Printing & Publishing Services', 'flexprintingservices.svg', 'printing-publishing-services', '2025-05-27 12:20:35', '2025-05-27 06:53:32'),
(32, 'Placement Services', 'jobs.svg', 'placement-services', '2025-05-27 12:20:35', '2025-05-27 06:53:32'),
(33, 'Pest Control Services', 'pestcontrol.svg', 'pest-control-services', '2025-05-27 12:20:35', '2025-05-27 06:53:32'),
(34, 'Painting Contractors', 'paintingcontractors.svg', 'painting-contractors', '2025-05-27 12:20:35', '2025-05-27 06:53:32'),
(35, 'Packers & Movers', 'packersandmovers.svg', 'packers-movers', '2025-05-27 12:20:35', '2025-05-27 06:53:32'),
(36, 'Scrap Dealers', 'scrap-dealers.svg', 'scrap-dealers', '2025-05-27 12:20:35', '2025-05-27 06:53:32'),
(37, 'Scrap Buyers', 'scrap-dealers.svg', 'scrap-buyers', '2025-05-27 12:20:35', '2025-05-27 06:53:32'),
(38, 'Registration Consultants', 'registrationconsultants.svg', 'registration-consultants', '2025-05-27 12:20:35', '2025-05-27 06:53:32'),
(39, 'Security System', 'securitycctv.svg', 'security-system', '2025-05-27 12:20:35', '2025-05-27 06:53:32'),
(40, 'Coaching', 'coaching.svg', 'coaching', '2025-05-27 12:20:35', '2025-05-27 06:53:32'),
(41, 'Vocational Training', 'traininginstitutes.svg', 'vocational-training', '2025-05-27 12:20:35', '2025-05-27 06:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`, `state_id`, `status`) VALUES
(1, 'North and Middle Andaman', 32, 0),
(2, 'South Andaman', 32, 0),
(3, 'Nicobar', 32, 0),
(4, 'Adilabad', 1, 0),
(5, 'Anantapur', 1, 0),
(6, 'Chittoor', 1, 0),
(7, 'East Godavari', 1, 0),
(8, 'Guntur', 1, 0),
(9, 'Hyderabad', 1, 0),
(10, 'Kadapa', 1, 0),
(11, 'Karimnagar', 1, 0),
(12, 'Khammam', 1, 0),
(13, 'Krishna', 1, 0),
(14, 'Kurnool', 1, 0),
(15, 'Mahbubnagar', 1, 0),
(16, 'Medak', 1, 0),
(17, 'Nalgonda', 1, 0),
(18, 'Nellore', 1, 0),
(19, 'Nizamabad', 1, 0),
(20, 'Prakasam', 1, 0),
(21, 'Rangareddi', 1, 0),
(22, 'Srikakulam', 1, 0),
(23, 'Vishakhapatnam', 1, 0),
(24, 'Vizianagaram', 1, 0),
(25, 'Warangal', 1, 0),
(26, 'West Godavari', 1, 0),
(27, 'Anjaw', 3, 0),
(28, 'Changlang', 3, 0),
(29, 'East Kameng', 3, 0),
(30, 'Lohit', 3, 0),
(31, 'Lower Subansiri', 3, 0),
(32, 'Papum Pare', 3, 0),
(33, 'Tirap', 3, 0),
(34, 'Dibang Valley', 3, 0),
(35, 'Upper Subansiri', 3, 0),
(36, 'West Kameng', 3, 0),
(37, 'Barpeta', 2, 0),
(38, 'Bongaigaon', 2, 0),
(39, 'Cachar', 2, 0),
(40, 'Darrang', 2, 0),
(41, 'Dhemaji', 2, 0),
(42, 'Dhubri', 2, 0),
(43, 'Dibrugarh', 2, 0),
(44, 'Goalpara', 2, 0),
(45, 'Golaghat', 2, 0),
(46, 'Hailakandi', 2, 0),
(47, 'Jorhat', 2, 0),
(48, 'Karbi Anglong', 2, 0),
(49, 'Karimganj', 2, 0),
(50, 'Kokrajhar', 2, 0),
(51, 'Lakhimpur', 2, 0),
(52, 'Marigaon', 2, 0),
(53, 'Nagaon', 2, 0),
(54, 'Nalbari', 2, 0),
(55, 'North Cachar Hills', 2, 0),
(56, 'Sibsagar', 2, 0),
(57, 'Sonitpur', 2, 0),
(58, 'Tinsukia', 2, 0),
(59, 'Araria', 4, 0),
(60, 'Aurangabad', 4, 0),
(61, 'Banka', 4, 0),
(62, 'Begusarai', 4, 0),
(63, 'Bhagalpur', 4, 0),
(64, 'Bhojpur', 4, 0),
(65, 'Buxar', 4, 0),
(66, 'Darbhanga', 4, 1),
(67, 'Purba Champaran', 4, 0),
(68, 'Gaya', 4, 0),
(69, 'Gopalganj', 4, 0),
(70, 'Jamui', 4, 0),
(71, 'Jehanabad', 4, 0),
(72, 'Khagaria', 4, 0),
(73, 'Kishanganj', 4, 0),
(74, 'Kaimur', 4, 0),
(75, 'Katihar', 4, 0),
(76, 'Lakhisarai', 4, 0),
(77, 'Madhubani', 4, 0),
(78, 'Munger', 4, 0),
(79, 'Madhepura', 4, 0),
(80, 'Muzaffarpur', 4, 0),
(81, 'Nalanda', 4, 0),
(82, 'Nawada', 4, 0),
(83, 'Patna', 4, 0),
(84, 'Purnia', 4, 0),
(85, 'Rohtas', 4, 0),
(86, 'Saharsa', 4, 0),
(87, 'Samastipur', 4, 0),
(88, 'Sheohar', 4, 0),
(89, 'Sheikhpura', 4, 0),
(90, 'Saran', 4, 0),
(91, 'Sitamarhi', 4, 0),
(92, 'Supaul', 4, 0),
(93, 'Siwan', 4, 0),
(94, 'Vaishali', 4, 0),
(95, 'Pashchim Champaran', 4, 0),
(96, 'Bastar', 36, 0),
(97, 'Bilaspur', 36, 0),
(98, 'Dantewada', 36, 0),
(99, 'Dhamtari', 36, 0),
(100, 'Durg', 36, 0),
(101, 'Jashpur', 36, 0),
(102, 'Janjgir-Champa', 36, 0),
(103, 'Korba', 36, 0),
(104, 'Koriya', 36, 0),
(105, 'Kanker', 36, 0),
(106, 'Kawardha', 36, 0),
(107, 'Mahasamund', 36, 0),
(108, 'Raigarh', 36, 0),
(109, 'Rajnandgaon', 36, 0),
(110, 'Raipur', 36, 0),
(111, 'Surguja', 36, 0),
(112, 'Diu', 29, 0),
(113, 'Daman', 29, 0),
(114, 'Central Delhi', 25, 0),
(115, 'East Delhi', 25, 0),
(116, 'New Delhi', 25, 0),
(117, 'North Delhi', 25, 0),
(118, 'North East Delhi', 25, 0),
(119, 'North West Delhi', 25, 0),
(120, 'South Delhi', 25, 0),
(121, 'South West Delhi', 25, 0),
(122, 'West Delhi', 25, 0),
(123, 'North Goa', 26, 0),
(124, 'South Goa', 26, 0),
(125, 'Ahmedabad', 5, 0),
(126, 'Amreli District', 5, 0),
(127, 'Anand', 5, 0),
(128, 'Banaskantha', 5, 0),
(129, 'Bharuch', 5, 0),
(130, 'Bhavnagar', 5, 0),
(131, 'Dahod', 5, 0),
(132, 'The Dangs', 5, 0),
(133, 'Gandhinagar', 5, 0),
(134, 'Jamnagar', 5, 0),
(135, 'Junagadh', 5, 0),
(136, 'Kutch', 5, 0),
(137, 'Kheda', 5, 0),
(138, 'Mehsana', 5, 0),
(139, 'Narmada', 5, 0),
(140, 'Navsari', 5, 0),
(141, 'Patan', 5, 0),
(142, 'Panchmahal', 5, 0),
(143, 'Porbandar', 5, 0),
(144, 'Rajkot', 5, 0),
(145, 'Sabarkantha', 5, 0),
(146, 'Surendranagar', 5, 0),
(147, 'Surat', 5, 0),
(148, 'Vadodara', 5, 0),
(149, 'Valsad', 5, 0),
(150, 'Ambala', 6, 0),
(151, 'Bhiwani', 6, 0),
(152, 'Faridabad', 6, 0),
(153, 'Fatehabad', 6, 0),
(154, 'Gurgaon', 6, 0),
(155, 'Hissar', 6, 0),
(156, 'Jhajjar', 6, 0),
(157, 'Jind', 6, 0),
(158, 'Karnal', 6, 0),
(159, 'Kaithal', 6, 0),
(160, 'Kurukshetra', 6, 0),
(161, 'Mahendragarh', 6, 0),
(162, 'Mewat', 6, 0),
(163, 'Panchkula', 6, 0),
(164, 'Panipat', 6, 0),
(165, 'Rewari', 6, 0),
(166, 'Rohtak', 6, 0),
(167, 'Sirsa', 6, 0),
(168, 'Sonepat', 6, 0),
(169, 'Yamuna Nagar', 6, 0),
(170, 'Palwal', 6, 0),
(171, 'Bilaspur', 7, 0),
(172, 'Chamba', 7, 0),
(173, 'Hamirpur', 7, 0),
(174, 'Kangra', 7, 0),
(175, 'Kinnaur', 7, 0),
(176, 'Kulu', 7, 0),
(177, 'Lahaul and Spiti', 7, 0),
(178, 'Mandi', 7, 0),
(179, 'Shimla', 7, 0),
(180, 'Sirmaur', 7, 0),
(181, 'Solan', 7, 0),
(182, 'Una', 7, 0),
(183, 'Anantnag', 8, 0),
(184, 'Badgam', 8, 0),
(185, 'Bandipore', 8, 0),
(186, 'Baramula', 8, 0),
(187, 'Doda', 8, 0),
(188, 'Jammu', 8, 0),
(189, 'Kargil', 8, 0),
(190, 'Kathua', 8, 0),
(191, 'Kupwara', 8, 0),
(192, 'Leh', 8, 0),
(193, 'Poonch', 8, 0),
(194, 'Pulwama', 8, 0),
(195, 'Rajauri', 8, 0),
(196, 'Srinagar', 8, 0),
(197, 'Samba', 8, 0),
(198, 'Udhampur', 8, 0),
(199, 'Bokaro', 34, 0),
(200, 'Chatra', 34, 0),
(201, 'Deoghar', 34, 0),
(202, 'Dhanbad', 34, 0),
(203, 'Dumka', 34, 0),
(204, 'Purba Singhbhum', 34, 0),
(205, 'Garhwa', 34, 0),
(206, 'Giridih', 34, 0),
(207, 'Godda', 34, 0),
(208, 'Gumla', 34, 0),
(209, 'Hazaribagh', 34, 0),
(210, 'Koderma', 34, 0),
(211, 'Lohardaga', 34, 0),
(212, 'Pakur', 34, 0),
(213, 'Palamu', 34, 0),
(214, 'Ranchi', 34, 0),
(215, 'Sahibganj', 34, 0),
(216, 'Seraikela and Kharsawan', 34, 0),
(217, 'Pashchim Singhbhum', 34, 0),
(218, 'Ramgarh', 34, 0),
(219, 'Bidar', 9, 0),
(220, 'Belgaum', 9, 0),
(221, 'Bijapur', 9, 0),
(222, 'Bagalkot', 9, 0),
(223, 'Bellary', 9, 0),
(224, 'Bangalore Rural District', 9, 0),
(225, 'Bangalore Urban District', 9, 0),
(226, 'Chamarajnagar', 9, 0),
(227, 'Chikmagalur', 9, 0),
(228, 'Chitradurga', 9, 0),
(229, 'Davanagere', 9, 0),
(230, 'Dharwad', 9, 0),
(231, 'Dakshina Kannada', 9, 0),
(232, 'Gadag', 9, 0),
(233, 'Gulbarga', 9, 0),
(234, 'Hassan', 9, 0),
(235, 'Haveri District', 9, 0),
(236, 'Kodagu', 9, 0),
(237, 'Kolar', 9, 0),
(238, 'Koppal', 9, 0),
(239, 'Mandya', 9, 0),
(240, 'Mysore', 9, 0),
(241, 'Raichur', 9, 0),
(242, 'Shimoga', 9, 0),
(243, 'Tumkur', 9, 0),
(244, 'Udupi', 9, 0),
(245, 'Uttara Kannada', 9, 0),
(246, 'Ramanagara', 9, 0),
(247, 'Chikballapur', 9, 0),
(248, 'Yadagiri', 9, 0),
(249, 'Alappuzha', 10, 0),
(250, 'Ernakulam', 10, 0),
(251, 'Idukki', 10, 0),
(252, 'Kollam', 10, 0),
(253, 'Kannur', 10, 0),
(254, 'Kasaragod', 10, 0),
(255, 'Kottayam', 10, 0),
(256, 'Kozhikode', 10, 0),
(257, 'Malappuram', 10, 0),
(258, 'Palakkad', 10, 0),
(259, 'Pathanamthitta', 10, 0),
(260, 'Thrissur', 10, 0),
(261, 'Thiruvananthapuram', 10, 0),
(262, 'Wayanad', 10, 0),
(263, 'Alirajpur', 11, 0),
(264, 'Anuppur', 11, 0),
(265, 'Ashok Nagar', 11, 0),
(266, 'Balaghat', 11, 0),
(267, 'Barwani', 11, 0),
(268, 'Betul', 11, 0),
(269, 'Bhind', 11, 0),
(270, 'Bhopal', 11, 0),
(271, 'Burhanpur', 11, 0),
(272, 'Chhatarpur', 11, 0),
(273, 'Chhindwara', 11, 0),
(274, 'Damoh', 11, 0),
(275, 'Datia', 11, 0),
(276, 'Dewas', 11, 0),
(277, 'Dhar', 11, 0),
(278, 'Dindori', 11, 0),
(279, 'Guna', 11, 0),
(280, 'Gwalior', 11, 0),
(281, 'Harda', 11, 0),
(282, 'Hoshangabad', 11, 0),
(283, 'Indore', 11, 0),
(284, 'Jabalpur', 11, 0),
(285, 'Jhabua', 11, 0),
(286, 'Katni', 11, 0),
(287, 'Khandwa', 11, 0),
(288, 'Khargone', 11, 0),
(289, 'Mandla', 11, 0),
(290, 'Mandsaur', 11, 0),
(291, 'Morena', 11, 0),
(292, 'Narsinghpur', 11, 0),
(293, 'Neemuch', 11, 0),
(294, 'Panna', 11, 0),
(295, 'Rewa', 11, 0),
(296, 'Rajgarh', 11, 0),
(297, 'Ratlam', 11, 0),
(298, 'Raisen', 11, 0),
(299, 'Sagar', 11, 0),
(300, 'Satna', 11, 0),
(301, 'Sehore', 11, 0),
(302, 'Seoni', 11, 0),
(303, 'Shahdol', 11, 0),
(304, 'Shajapur', 11, 0),
(305, 'Sheopur', 11, 0),
(306, 'Shivpuri', 11, 0),
(307, 'Sidhi', 11, 0),
(308, 'Singrauli', 11, 0),
(309, 'Tikamgarh', 11, 0),
(310, 'Ujjain', 11, 0),
(311, 'Umaria', 11, 0),
(312, 'Vidisha', 11, 0),
(313, 'Ahmednagar', 12, 0),
(314, 'Akola', 12, 0),
(315, 'Amrawati', 12, 0),
(316, 'Aurangabad', 12, 0),
(317, 'Bhandara', 12, 0),
(318, 'Beed', 12, 0),
(319, 'Buldhana', 12, 0),
(320, 'Chandrapur', 12, 0),
(321, 'Dhule', 12, 0),
(322, 'Gadchiroli', 12, 0),
(323, 'Gondiya', 12, 0),
(324, 'Hingoli', 12, 0),
(325, 'Jalgaon', 12, 0),
(326, 'Jalna', 12, 0),
(327, 'Kolhapur', 12, 0),
(328, 'Latur', 12, 0),
(329, 'Mumbai City', 12, 0),
(330, 'Mumbai suburban', 12, 0),
(331, 'Nandurbar', 12, 0),
(332, 'Nanded', 12, 0),
(333, 'Nagpur', 12, 0),
(334, 'Nashik', 12, 0),
(335, 'Osmanabad', 12, 0),
(336, 'Parbhani', 12, 0),
(337, 'Pune', 12, 0),
(338, 'Raigad', 12, 0),
(339, 'Ratnagiri', 12, 0),
(340, 'Sindhudurg', 12, 0),
(341, 'Sangli', 12, 0),
(342, 'Solapur', 12, 0),
(343, 'Satara', 12, 0),
(344, 'Thane', 12, 0),
(345, 'Wardha', 12, 0),
(346, 'Washim', 12, 0),
(347, 'Yavatmal', 12, 0),
(348, 'Bishnupur', 13, 0),
(349, 'Churachandpur', 13, 0),
(350, 'Chandel', 13, 0),
(351, 'Imphal East', 13, 0),
(352, 'Senapati', 13, 0),
(353, 'Tamenglong', 13, 0),
(354, 'Thoubal', 13, 0),
(355, 'Ukhrul', 13, 0),
(356, 'Imphal West', 13, 0),
(357, 'East Garo Hills', 14, 0),
(358, 'East Khasi Hills', 14, 0),
(359, 'Jaintia Hills', 14, 0),
(360, 'Ri-Bhoi', 14, 0),
(361, 'South Garo Hills', 14, 0),
(362, 'West Garo Hills', 14, 0),
(363, 'West Khasi Hills', 14, 0),
(364, 'Aizawl', 15, 0),
(365, 'Champhai', 15, 0),
(366, 'Kolasib', 15, 0),
(367, 'Lawngtlai', 15, 0),
(368, 'Lunglei', 15, 0),
(369, 'Mamit', 15, 0),
(370, 'Saiha', 15, 0),
(371, 'Serchhip', 15, 0),
(372, 'Dimapur', 16, 0),
(373, 'Kohima', 16, 0),
(374, 'Mokokchung', 16, 0),
(375, 'Mon', 16, 0),
(376, 'Phek', 16, 0),
(377, 'Tuensang', 16, 0),
(378, 'Wokha', 16, 0),
(379, 'Zunheboto', 16, 0),
(380, 'Angul', 17, 0),
(381, 'Boudh', 17, 0),
(382, 'Bhadrak', 17, 0),
(383, 'Bolangir', 17, 0),
(384, 'Bargarh', 17, 0),
(385, 'Baleswar', 17, 0),
(386, 'Cuttack', 17, 0),
(387, 'Debagarh', 17, 0),
(388, 'Dhenkanal', 17, 0),
(389, 'Ganjam', 17, 0),
(390, 'Gajapati', 17, 0),
(391, 'Jharsuguda', 17, 0),
(392, 'Jajapur', 17, 0),
(393, 'Jagatsinghpur', 17, 0),
(394, 'Khordha', 17, 0),
(395, 'Kendujhar', 17, 0),
(396, 'Kalahandi', 17, 0),
(397, 'Kandhamal', 17, 0),
(398, 'Koraput', 17, 0),
(399, 'Kendrapara', 17, 0),
(400, 'Malkangiri', 17, 0),
(401, 'Mayurbhanj', 17, 0),
(402, 'Nabarangpur', 17, 0),
(403, 'Nuapada', 17, 0),
(404, 'Nayagarh', 17, 0),
(405, 'Puri', 17, 0),
(406, 'Rayagada', 17, 0),
(407, 'Sambalpur', 17, 0),
(408, 'Subarnapur', 17, 0),
(409, 'Sundargarh', 17, 0),
(410, 'Karaikal', 27, 0),
(411, 'Mahe', 27, 0),
(412, 'Puducherry', 27, 0),
(413, 'Yanam', 27, 0),
(414, 'Amritsar', 18, 0),
(415, 'Bathinda', 18, 0),
(416, 'Firozpur', 18, 0),
(417, 'Faridkot', 18, 0),
(418, 'Fatehgarh Sahib', 18, 0),
(419, 'Gurdaspur', 18, 0),
(420, 'Hoshiarpur', 18, 0),
(421, 'Jalandhar', 18, 0),
(422, 'Kapurthala', 18, 0),
(423, 'Ludhiana', 18, 0),
(424, 'Mansa', 18, 0),
(425, 'Moga', 18, 0),
(426, 'Mukatsar', 18, 0),
(427, 'Nawan Shehar', 18, 0),
(428, 'Patiala', 18, 0),
(429, 'Rupnagar', 18, 0),
(430, 'Sangrur', 18, 0),
(431, 'Ajmer', 19, 0),
(432, 'Alwar', 19, 0),
(433, 'Bikaner', 19, 0),
(434, 'Barmer', 19, 0),
(435, 'Banswara', 19, 0),
(436, 'Bharatpur', 19, 0),
(437, 'Baran', 19, 0),
(438, 'Bundi', 19, 0),
(439, 'Bhilwara', 19, 0),
(440, 'Churu', 19, 0),
(441, 'Chittorgarh', 19, 0),
(442, 'Dausa', 19, 0),
(443, 'Dholpur', 19, 0),
(444, 'Dungapur', 19, 0),
(445, 'Ganganagar', 19, 0),
(446, 'Hanumangarh', 19, 0),
(447, 'Juhnjhunun', 19, 0),
(448, 'Jalore', 19, 0),
(449, 'Jodhpur', 19, 0),
(450, 'Jaipur', 19, 0),
(451, 'Jaisalmer', 19, 0),
(452, 'Jhalawar', 19, 0),
(453, 'Karauli', 19, 0),
(454, 'Kota', 19, 0),
(455, 'Nagaur', 19, 0),
(456, 'Pali', 19, 0),
(457, 'Pratapgarh', 19, 0),
(458, 'Rajsamand', 19, 0),
(459, 'Sikar', 19, 0),
(460, 'Sawai Madhopur', 19, 0),
(461, 'Sirohi', 19, 0),
(462, 'Tonk', 19, 0),
(463, 'Udaipur', 19, 0),
(464, 'East Sikkim', 20, 0),
(465, 'North Sikkim', 20, 0),
(466, 'South Sikkim', 20, 0),
(467, 'West Sikkim', 20, 0),
(468, 'Ariyalur', 21, 0),
(469, 'Chennai', 21, 0),
(470, 'Coimbatore', 21, 0),
(471, 'Cuddalore', 21, 0),
(472, 'Dharmapuri', 21, 0),
(473, 'Dindigul', 21, 0),
(474, 'Erode', 21, 0),
(475, 'Kanchipuram', 21, 0),
(476, 'Kanyakumari', 21, 0),
(477, 'Karur', 21, 0),
(478, 'Madurai', 21, 0),
(479, 'Nagapattinam', 21, 0),
(480, 'The Nilgiris', 21, 0),
(481, 'Namakkal', 21, 0),
(482, 'Perambalur', 21, 0),
(483, 'Pudukkottai', 21, 0),
(484, 'Ramanathapuram', 21, 0),
(485, 'Salem', 21, 0),
(486, 'Sivagangai', 21, 0),
(487, 'Tiruppur', 21, 0),
(488, 'Tiruchirappalli', 21, 0),
(489, 'Theni', 21, 0),
(490, 'Tirunelveli', 21, 0),
(491, 'Thanjavur', 21, 0),
(492, 'Thoothukudi', 21, 0),
(493, 'Thiruvallur', 21, 0),
(494, 'Thiruvarur', 21, 0),
(495, 'Tiruvannamalai', 21, 0),
(496, 'Vellore', 21, 0),
(497, 'Villupuram', 21, 0),
(498, 'Dhalai', 22, 0),
(499, 'North Tripura', 22, 0),
(500, 'South Tripura', 22, 0),
(501, 'West Tripura', 22, 0),
(502, 'Almora', 33, 0),
(503, 'Bageshwar', 33, 0),
(504, 'Chamoli', 33, 0),
(505, 'Champawat', 33, 0),
(506, 'Dehradun', 33, 0),
(507, 'Haridwar', 33, 0),
(508, 'Nainital', 33, 0),
(509, 'Pauri Garhwal', 33, 0),
(510, 'Pithoragharh', 33, 0),
(511, 'Rudraprayag', 33, 0),
(512, 'Tehri Garhwal', 33, 0),
(513, 'Udham Singh Nagar', 33, 0),
(514, 'Uttarkashi', 33, 0),
(515, 'Agra', 23, 0),
(516, 'Allahabad', 23, 0),
(517, 'Aligarh', 23, 0),
(518, 'Ambedkar Nagar', 23, 0),
(519, 'Auraiya', 23, 0),
(520, 'Azamgarh', 23, 1),
(521, 'Barabanki', 23, 0),
(522, 'Badaun', 23, 1),
(523, 'Bagpat', 23, 0),
(524, 'Bahraich', 23, 0),
(525, 'Bijnor', 23, 0),
(526, 'Ballia', 23, 0),
(527, 'Banda', 23, 0),
(528, 'Balrampur', 23, 0),
(529, 'Bareilly', 23, 0),
(530, 'Basti', 23, 0),
(531, 'Bulandshahr', 23, 0),
(532, 'Chandauli', 23, 0),
(533, 'Chitrakoot', 23, 0),
(534, 'Deoria', 23, 0),
(535, 'Etah', 23, 0),
(536, 'Kanshiram Nagar', 23, 0),
(537, 'Etawah', 23, 0),
(538, 'Firozabad', 23, 0),
(539, 'Farrukhabad', 23, 0),
(540, 'Fatehpur', 23, 0),
(541, 'Faizabad', 23, 0),
(542, 'Gautam Buddha Nagar', 23, 0),
(543, 'Gonda', 23, 0),
(544, 'Ghazipur', 23, 0),
(545, 'Gorkakhpur', 23, 0),
(546, 'Ghaziabad', 23, 0),
(547, 'Hamirpur', 23, 0),
(548, 'Hardoi', 23, 0),
(549, 'Mahamaya Nagar', 23, 0),
(550, 'Jhansi', 23, 0),
(551, 'Jalaun', 23, 0),
(552, 'Jyotiba Phule Nagar', 23, 0),
(553, 'Jaunpur District', 23, 0),
(554, 'Kanpur Dehat', 23, 0),
(555, 'Kannauj', 23, 0),
(556, 'Kanpur Nagar', 23, 0),
(557, 'Kaushambi', 23, 0),
(558, 'Kushinagar', 23, 0),
(559, 'Lalitpur', 23, 0),
(560, 'Lakhimpur Kheri', 23, 0),
(561, 'Lucknow', 23, 0),
(562, 'Mau', 23, 0),
(563, 'Meerut', 23, 0),
(564, 'Maharajganj', 23, 0),
(565, 'Mahoba', 23, 0),
(566, 'Mirzapur', 23, 0),
(567, 'Moradabad', 23, 0),
(568, 'Mainpuri', 23, 0),
(569, 'Mathura', 23, 0),
(570, 'Muzaffarnagar', 23, 0),
(571, 'Pilibhit', 23, 0),
(572, 'Pratapgarh', 23, 0),
(573, 'Rampur', 23, 0),
(574, 'Rae Bareli', 23, 0),
(575, 'Saharanpur', 23, 0),
(576, 'Sitapur', 23, 0),
(577, 'Shahjahanpur', 23, 0),
(578, 'Sant Kabir Nagar', 23, 0),
(579, 'Siddharthnagar', 23, 0),
(580, 'Sonbhadra', 23, 0),
(581, 'Sant Ravidas Nagar', 23, 0),
(582, 'Sultanpur', 23, 0),
(583, 'Shravasti', 23, 0),
(584, 'Unnao', 23, 0),
(585, 'Varanasi', 23, 0),
(586, 'Birbhum', 24, 0),
(587, 'Bankura', 24, 0),
(588, 'Bardhaman', 24, 0),
(589, 'Darjeeling', 24, 0),
(590, 'Dakshin Dinajpur', 24, 0),
(591, 'Hooghly', 24, 0),
(592, 'Howrah', 24, 0),
(593, 'Jalpaiguri', 24, 0),
(594, 'Cooch Behar', 24, 0),
(595, 'Kolkata', 24, 0),
(596, 'Malda', 24, 0),
(597, 'Midnapore', 24, 0),
(598, 'Murshidabad', 24, 0),
(599, 'Nadia', 24, 0),
(600, 'North 24 Parganas', 24, 0),
(601, 'South 24 Parganas', 24, 0),
(602, 'Purulia', 24, 0),
(603, 'Uttar Dinajpur', 24, 0),
(604, 'Noida', 23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `slug`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(2, 'what-courses-do-aviation-colleges-offer', 'What courses do aviation colleges offer?', '<ul style=\"color: rgb(33, 37, 41); font-family: system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><li><span style=\"font-weight: bolder;\">Pilot Training:</span>&nbsp;Courses to become a commercial or private pilot.</li><li>Aircraft Maintenance Engineering: Programs focusing on the maintenance and repair of aircraft.</li><li><span style=\"font-weight: bolder;\">Aviation Management:&nbsp;</span>Courses on the business and management side of the aviation industry.</li><li><span style=\"font-weight: bolder;\">Air Traffic Control:&nbsp;</span>Training for managing aircraft movements on the ground and in the air.</li><li><span style=\"font-weight: bolder;\">Cabin Crew Training:</span>&nbsp;Programs for aspiring flight attendants.</li><li><span style=\"font-weight: bolder;\">Aeronautical Engineering:&nbsp;</span>Focuses on the design and development of aircraft.</li><li><b>Testing:&nbsp;</b>&nbsp;lorem text for faq.</li></ul>', '2025-03-12 00:36:03', '2025-05-27 07:27:35'),
(3, 'what-are-the-eligibility-criteria-for-admission-to-aviation-colleges', 'What are the eligibility criteria for admission to aviation colleges?', '<li style=\"color: rgb(33, 37, 41); font-family: system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><b>Educational Qualifications: </b>A minimum of high school completion, often with a focus on science and mathematics.</li><li style=\"color: rgb(33, 37, 41); font-family: system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><b>Medical Fitness:</b> A medical examination to ensure physical fitness, particularly for pilot training.</li><li style=\"color: rgb(33, 37, 41); font-family: system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><b>Age Limit:</b> Some courses have age restrictions, commonly between 17-30 years.</li><li style=\"color: rgb(33, 37, 41); font-family: system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><b>Language Proficiency:</b> Proficiency in English, as it is the primary language of aviation.</li>', '2025-03-12 01:03:19', '2025-05-27 07:27:35'),
(4, 'how-long-do-aviation-courses-typically-take-to-complete', 'How long do aviation courses typically take to complete?', '<ul style=\"color: rgb(33, 37, 41); font-family: system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><li><b>Pilot Training:</b> 6 months to 2 years, depending on the type of license (private or commercial).</li><li><b>Aircraft Maintenance Engineering: </b>2 to 4 years.</li><li><b>Aviation Management:</b> 1 to 4 years, depending on whether it is a diploma, bachelor\'s, or master\'s program.</li><li><b>Air Traffic Control: </b>6 months to 1 year.</li><li><b>Cabin Crew Training:</b> 6 months to 1 year.</li><li><b>Aeronautical Engineering: </b>4 years for a bachelor\'s degree.</li></ul>', '2025-03-12 01:11:02', '2025-05-27 07:27:35');

-- --------------------------------------------------------

--
-- Table structure for table `image_library`
--

CREATE TABLE `image_library` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_library`
--

INSERT INTO `image_library` (`id`, `image_name`, `image_path`, `created_at`, `updated_at`) VALUES
(5, '1747728063.png', 'uploads/1747728063.png', '2025-05-20 02:31:04', '2025-05-20 02:31:04'),
(6, '1747728590.png', 'uploads/1747728590.png', '2025-05-20 02:39:50', '2025-05-20 02:39:50'),
(7, '1747728590.jpg', 'uploads/1747728590.jpg', '2025-05-20 02:39:50', '2025-05-20 02:39:50');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_21_095846_create_vendors_table', 2),
(5, '2025_02_21_114325_add_password_to_vendors_table', 3),
(6, '2025_02_22_050133_add_auth_fields_to_vendors_table', 4),
(7, '2025_02_22_092606_add_status_to_vendors_table', 5),
(8, '2025_02_22_093337_create_admins_table', 6),
(9, '2025_02_24_114542_create_queries_table', 7),
(10, '2025_03_04_073054_create_services_table', 8),
(11, '2025_03_04_081122_add_search_tags_to_services_table', 9),
(13, '2025_03_06_051636_create_categories_table', 10),
(14, '2025_03_10_043413_create_reviews_table', 11),
(15, '2025_03_12_050332_create_faqs_table', 12),
(16, '2025_05_20_061129_create_image_library_table', 13),
(17, '2025_05_26_120109_create_activity_logs_table', 14),
(20, '2025_05_26_120421_create_admin_activity_logs_table', 15),
(21, '2025_06_03_063711_create_personal_access_tokens_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_mobile` varchar(255) NOT NULL,
  `query` varchar(255) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `services_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=unanswered, 1=answered ',
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `forwarded` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=not forwarded, 1=forwarded',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`id`, `user_id`, `slug`, `user_name`, `user_email`, `user_mobile`, `query`, `vendor_id`, `services_id`, `status`, `is_deleted`, `forwarded`, `created_at`, `updated_at`) VALUES
(3, 1, 'himanshu-dixit', 'Himanshu Dixit', 'admin@khaadi.com', '7684994837', 'hii there', 3, NULL, 0, 0, 1, '2025-02-26 04:48:11', '2025-05-27 07:18:07'),
(4, 2, 'test', 'Test', 'user@vomoto.com', '9685741425', 'dfgfdgfdg', 2, 3, 0, 0, 0, '2025-03-08 03:51:42', '2025-05-27 07:18:07'),
(5, 2, 'test-1', 'Test', 'user@vomoto.com', '9685741425', 'gfdsgsdfgfdg', 2, 3, 0, 0, 0, '2025-03-08 03:53:38', '2025-05-27 07:18:07'),
(6, 2, 'test-2', 'Test', 'user@vomoto.com', '9685741425', 'dfdsfdsgd', 2, 3, 0, 0, 0, '2025-03-08 03:54:38', '2025-05-27 07:18:07'),
(7, 2, 'test-3', 'Test', 'user@vomoto.com', '9685741425', 'vvfdgsdgfdhgfdgfdg', 2, 3, 0, 0, 0, '2025-03-08 03:56:14', '2025-05-27 07:18:07'),
(8, 2, 'test-4', 'Test', 'user@vomoto.com', '9685741425', 'dgfdgfdgf', 2, 3, 0, 0, 0, '2025-03-08 03:57:04', '2025-05-27 07:18:07'),
(9, 2, 'test-5', 'Test', 'user@vomoto.com', '9685741425', 'fghjhfgjhfgjh', 2, 3, 0, 0, 0, '2025-03-08 04:00:55', '2025-05-27 07:18:07'),
(10, 2, 'test-6', 'Test', 'user@vomoto.com', '9685741425', 'dsgffsdgfdgfgf', 2, 3, 0, 0, 0, '2025-03-08 04:02:02', '2025-05-27 07:18:07'),
(11, 2, 'test-7', 'Test', 'user@vomoto.com', '9685741425', 'fhsgkdsfkdgfjd', 2, 3, 0, 0, 1, '2025-03-08 04:04:30', '2025-05-27 07:18:07'),
(12, 2, 'test-8', 'Test', 'user@vomoto.com', '9685741425', 'f sf gs fg f   df gsdfgsdfgsdgsdf gs g sdg sdf gdsfgsdd fg sfg sdf gdf sdfsad asd saddfasdf asdfasfasdfasd fassdfasdfassdf asdfasdfasdf asdfasdfasdfasdf asdsfasdfassdfasd fasdfassdfasdfasd fassdfassdfassdf assdfasdfsdf adsfasdf', 2, 3, 0, 0, 1, '2025-03-08 04:04:56', '2025-05-27 07:18:07'),
(13, 2, 'test-9', 'Test', 'user@vomoto.com', '9685741425', 'dfsgfdgdffg sdfsfgsfg sdf gsdfgsdfg sdfgsdbsdgh dsgsdhsdghsdg sdfgsdf dsfgdsf sdafasdfasdfasdf adfasfasvass assdasdfasdfasdf adfasdfasdfassdf asasffgvasskjk hk k hkhkhklhklhikh ikhikhikhikhikh ikhihikh  dfasdfasdfasdfs', 2, 3, 0, 0, 1, '2025-05-26 04:06:25', '2025-05-28 07:17:24'),
(17, 2, 'deepak-negi', 'Deepak Negi', 'neginegi3221@gmail.com', '08448160646', 'hii', 2, 3, 0, 0, 0, '2025-05-28 01:23:05', '2025-05-28 01:23:05');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `review` text NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `service_id`, `vendor_id`, `review`, `rating`, `created_at`, `updated_at`) VALUES
(2, 2, NULL, 2, 'vendor have good  Services', 5, '2025-03-10 04:41:19', '2025-03-10 04:41:19');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `mrp` double NOT NULL,
  `search_tags` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `vendor_id`, `slug`, `name`, `description`, `image`, `path`, `mrp`, `search_tags`, `created_at`, `updated_at`) VALUES
(12, 2, NULL, 'Ac Services', 'Air conditioning repair service in Noida, Uttar Pradesh', 'uploads/1748672501_upload.jpg', NULL, 2000, 'Ac,Cooling', '2025-05-31 00:51:41', '2025-05-31 00:51:59'),
(13, 2, NULL, 'Gas Filling', 'Air conditioning repair service in Noida, Uttar Pradesh', 'uploads/1748672770_upload.jpeg', NULL, 1800, 'Gas', '2025-05-31 00:56:10', '2025-05-31 00:56:10'),
(14, 2, NULL, 'Ac Cleaning', 'Air conditioning repair service in Noida, Uttar Pradesh', 'uploads/1748672811_upload.jfif', NULL, 600, 'Cleaning', '2025-05-31 00:56:51', '2025-05-31 00:56:51');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8BP7s16PN5JpWS45ZIOQfG5sPW92HJdFC4BXtEoK', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiUVluSHR3bWEyNnZhblpYakZUejY0U0wzS3RjcmJ2Qk5wN3IzUHM0NSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3QvbG9jYWxidXNzL3ZlbmRvcnMvNCI7fXM6NjoiZW1haWwxIjtzOjIyOiJwYXZhbmt1ODAwOTZAZ21haWwuY29tIjtzOjUzOiJsb2dpbl92ZW5kb3JfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozNztzOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1748949335),
('RJ0wLleLaltI7HgGtDLVnUSAE70ulietBPSTZ8iI', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSUI1V05FS1ZZTEFxVG80YVVHeWpzTENxcHBHQUxXRTlWWVF3V21pbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODc6Imh0dHA6Ly9sb2NhbGhvc3QvbG9jYWxidXNzL3ZlbmRvci1zZXJ2aWNlcy8yP25ld3MtZW1haWw9YWRmYXNlZGZhc3NkZmFzZGYlNDBnYWdqYXNzLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoiZW1haWwxIjtzOjExOiJhQGdtYWlsLmNvbSI7czo1MzoibG9naW5fdmVuZG9yXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzg7fQ==', 1749893512);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`) VALUES
(1, 'ANDHRA PRADESH', 105),
(2, 'ASSAM', 105),
(3, 'ARUNACHAL PRADESH', 105),
(4, 'BIHAR', 105),
(5, 'GUJRAT', 105),
(6, 'HARYANA', 105),
(7, 'HIMACHAL PRADESH', 105),
(8, 'JAMMU & KASHMIR', 105),
(9, 'KARNATAKA', 105),
(10, 'KERALA', 105),
(11, 'MADHYA PRADESH', 105),
(12, 'MAHARASHTRA', 105),
(13, 'MANIPUR', 105),
(14, 'MEGHALAYA', 105),
(15, 'MIZORAM', 105),
(16, 'NAGALAND', 105),
(17, 'ORISSA', 105),
(18, 'PUNJAB', 105),
(19, 'RAJASTHAN', 105),
(20, 'SIKKIM', 105),
(21, 'TAMIL NADU', 105),
(22, 'TRIPURA', 105),
(23, 'UTTAR PRADESH', 105),
(24, 'WEST BENGAL', 105),
(25, 'DELHI', 105),
(26, 'GOA', 105),
(27, 'PONDICHERY', 105),
(28, 'LAKSHDWEEP', 105),
(29, 'DAMAN & DIU', 105),
(30, 'DADRA & NAGAR', 105),
(31, 'CHANDIGARH', 105),
(32, 'ANDAMAN & NICOBAR', 105),
(33, 'UTTARANCHAL', 105),
(34, 'JHARKHAND', 105),
(35, 'CHATTISGARH', 105);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `otp_expires_at` timestamp NULL DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `otp`, `otp_expires_at`, `address`, `city`, `state`, `pincode`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Himanshu Dixit', 'himanshudixit@gmail.com', '7684994837', 482329, '2025-05-22 06:13:42', 'sector56', 'noida', 'uttar pradesh', '201301', NULL, '$2y$12$dCgFBJ6ftQ2b3fUMLBmfNuIsyy.kBGH.aoU4FVEKC4zbYWZ0FZoLK', NULL, '2025-02-25 01:06:34', '2025-05-22 06:08:43'),
(2, 'Test', 'user@vomoto.com', '9685741425', 801601, '2025-06-02 00:19:57', 'Address', 'Noida', 'uttar pradesh', '112233', NULL, '$2y$12$U01nZpJVt9D/QwG2UlQrpuKueOaej71rz14H3LnI1PUWsxkE7t3fe', NULL, '2025-03-08 02:15:59', '2025-06-02 00:14:57');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=registered,1=verified,2=rejected',
  `otp` varchar(255) DEFAULT NULL,
  `otp_verified` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = not verify\r\n1= verified\r\n',
  `otp_expires_at` timestamp NULL DEFAULT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `whatsapp_no` varchar(255) DEFAULT NULL,
  `block_building` varchar(255) DEFAULT NULL,
  `street_colony` varchar(255) DEFAULT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `area` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `pin_code` varchar(255) DEFAULT NULL,
  `categories` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `search_terms` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `slug`, `email`, `password`, `status`, `otp`, `otp_verified`, `otp_expires_at`, `business_name`, `mobile`, `whatsapp_no`, `block_building`, `street_colony`, `landmark`, `area`, `city`, `state`, `pin_code`, `categories`, `type`, `search_terms`, `description`, `name`, `image`, `created_at`, `updated_at`, `remember_token`) VALUES
(2, 'toys-manufacture', 'user@vomoto.com', '$2y$12$1qe2CIKY7VJ84pTpXYRIyueNtgWWVO5FsRJFkoSEkVJUs5k5epyCi', 1, '645061', 1, '2025-06-02 01:54:31', 'Cool Tech Services', '9685741425', '6386547294', 'H-107, Digibells', 'Sector 63', 'Noida Ele. city metro Station', 'Noida', 'Noida', 'DELHI', '114422', 4, 'Ac Repair', NULL, 'Hamare Yaan Ac Repair Kiya jata Hai .', 'Kunal', '1748601742.jpg', '2025-02-21 23:35:01', '2025-06-02 01:44:32', NULL),
(3, 'om-sai-ram', 'admin@gmail.com', '$2y$12$BowVEuXCvi2cb4ss1FE7BuYNRAyEuMj5bpMJp.GJpd5kdY6EbY2dq', 1, '473491', 1, '2025-02-24 00:29:26', 'om sai ram', '9685741425', '9685741425', 'H-107, Heera', 'Gali no. 5 Sector 66', 'Noida Sector 59 metro Station', 'Noida', 'Badaun', 'Delhi', '201301', 3, 'medical', 'medical,medicine,shop', 'we sell every type of medicine', 'Himanshu Dixit', '1741261926.jpg', '2025-02-24 00:19:26', '2025-05-27 07:02:24', NULL),
(4, 'om-sai-ram-1', 'himanshu@gmail.com', '$2y$12$BowVEuXCvi2cb4ss1FE7BuYNRAyEuMj5bpMJp.GJpd5kdY6EbY2dq', 1, '473491', 1, '2025-02-24 00:29:26', 'om sai ram', '9685741425', '9685741425', '', '', '', 'sector 66', 'Azamgarh', 'Uttar Pradesh', '201301', 3, 'medical', 'medical,medicine,shop', 'we sell every type of medicine', 'Himanshu Dixit', '', '2025-02-24 00:19:26', '2025-05-27 07:02:24', NULL),
(5, 'digibells-esolution', 'sample@gmail.com', '$2y$12$BowVEuXCvi2cb4ss1FE7BuYNRAyEuMj5bpMJp.GJpd5kdY6EbY2dq', 1, '842698', 1, '2025-02-27 01:37:26', 'digibells esolution', '3526784537', '2367489302', 'H-107,  Digibells', 'Gali no. 2 Sector 63', 'Noida Ele. city metro Station', 'Noida', 'Noida', 'Delhi', '201302', 1, 'plastic toys', 'toys,kids toys,plastic toys', 'we sell every type of medicine', 'digigenie', '1741262104.jpg', '2025-02-27 01:27:26', '2025-05-27 07:02:24', NULL),
(37, NULL, 'pavanku80096@gmail.com', '$2y$12$Q3AIoe8Va1BRS/oqOGHHSuLWvFuLjbAy6uwIzJAhIc1/3/O.unrEu', 1, NULL, 1, NULL, 'himanshu', '6386524108', '2367489302', 'h-147', 'H147 Sector 63 noida', 'metro last', 'sdfasdf', 'Agra', 'UTTAR PRADESH', '201301', 5, 'sdfdsf', 'sdf,sdf,sdsf,asdfas,sdf,sdf', 'sdfdfassdssddfsdsfsdf', 'Digibanana', NULL, '2025-06-03 03:49:30', '2025-06-03 04:33:38', NULL),
(38, NULL, 'a@gmail.com', '$2y$12$.40T23AaEUSnFDuYJVZ26ualrF58oMpoPegwkO0Lung0jdPISsOxK', 0, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-14 03:44:37', '2025-06-14 03:45:26', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_activity_logs`
--
ALTER TABLE `admin_activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_activity_logs_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_library`
--
ALTER TABLE `image_library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_service_id_foreign` (`service_id`),
  ADD KEY `reviews_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendors_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_activity_logs`
--
ALTER TABLE `admin_activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=605;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `image_library`
--
ALTER TABLE `image_library`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_activity_logs`
--
ALTER TABLE `admin_activity_logs`
  ADD CONSTRAINT `admin_activity_logs_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
