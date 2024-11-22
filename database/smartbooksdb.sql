-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2024 at 08:15 AM
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
-- Database: `smartbook2.0`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `ifsc` varchar(255) NOT NULL,
  `beneficiary` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`id`, `client_id`, `bank_name`, `account_number`, `ifsc`, `beneficiary`, `created_at`, `updated_at`) VALUES
(1, 1, 'RAJANIKANTA', '1234556777', 'SBIN0008097', 'RAJANIKANTA BISWAL', '2024-11-20 00:59:07', '2024-11-20 00:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:0:{}s:11:\"permissions\";a:0:{}s:5:\"roles\";a:0:{}}', 1732164540);

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
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `country_code` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `exam_id` int(11) NOT NULL,
  `conducted_date` date NOT NULL,
  `conducted_by` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `remark` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `first_name`, `last_name`, `country_code`, `phone`, `email_id`, `company_id`, `vendor_id`, `exam_id`, `conducted_date`, `conducted_by`, `client_id`, `status`, `remark`, `created_at`, `updated_at`) VALUES
(1, 'Pallavi', 'Swain', NULL, '8018886342', 'rajanikantabiswal15@gmail.com', 1, 3, 6, '2024-11-20', 2, 1, 'passed', NULL, '2024-11-20 00:59:40', '2024-11-20 00:59:40');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `city_name`, `created_at`, `updated_at`) VALUES
(1, 22, 'Bhubaneswar', NULL, NULL),
(2, 22, 'Cuttack', NULL, NULL),
(3, 22, 'Rourkela', NULL, NULL),
(4, 22, 'Berhampur', NULL, NULL),
(5, 22, 'Sambalpur', NULL, NULL),
(6, 32, 'Kolkata', NULL, NULL),
(7, 32, 'Howrah', NULL, NULL),
(8, 32, 'Durgapur', NULL, NULL),
(9, 32, 'Siliguri', NULL, NULL),
(10, 32, 'Asansol', NULL, NULL),
(11, 12, 'Ranchi', NULL, NULL),
(12, 12, 'Jamshedpur', NULL, NULL),
(13, 12, 'Dhanbad', NULL, NULL),
(14, 12, 'Bokaro Steel City', NULL, NULL),
(15, 12, 'Hazaribagh', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `is_individual` tinyint(1) NOT NULL DEFAULT 0,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `pan_card` varchar(255) DEFAULT NULL,
  `registration_type` enum('registered','unregistered','composition') NOT NULL,
  `gst_no` varchar(255) NOT NULL DEFAULT 'N/A',
  `state_code` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `client_name`, `is_individual`, `first_name`, `last_name`, `phone`, `whatsapp`, `email`, `address`, `country_id`, `state_id`, `city_id`, `zip_code`, `pan_card`, `registration_type`, `gst_no`, `state_code`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Tata Consultancy Services', 0, 'Rajanikanta', 'Biswal', '8018886342', '8018886342', 'rajanikanta.b@jetsmartis.com', 'Bhubaneswar', 100, 20, 11, '754141', 'AAAAA0000A', 'registered', '22AAAAA0000A1Z5', NULL, 1, '2024-11-20 00:59:07', '2024-11-20 00:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `display_name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Tata Consultancy Services', 'TCS', 1, '2024-11-20 00:46:44', '2024-11-20 00:46:44');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_code` varchar(255) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `country_display_name` varchar(255) NOT NULL,
  `country_flag` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `country_display_name`, `country_flag`, `created_at`, `updated_at`) VALUES
(2, '+93', 'Afghanistan ', '', NULL, NULL, NULL),
(3, '+355', 'Albania ', '', NULL, NULL, NULL),
(4, '+213', 'Algeria ', '', NULL, NULL, NULL),
(5, '+1-684', 'American Samoa', '', NULL, NULL, NULL),
(6, '+376', 'Andorra, Principality of ', '', NULL, NULL, NULL),
(7, '+244', 'Angola', '', NULL, NULL, NULL),
(8, '+1-264', 'Anguilla ', '', NULL, NULL, NULL),
(9, '+672', 'Antarctica', '', NULL, NULL, NULL),
(10, '+1-268', 'Antigua and Barbuda', '', NULL, NULL, NULL),
(11, '+54', 'Argentina ', '', NULL, NULL, NULL),
(12, '+374', 'Armenia', '', NULL, NULL, NULL),
(13, '+297', 'Aruba', '', NULL, NULL, NULL),
(14, '+61', 'Australia', '', NULL, NULL, NULL),
(15, '+43', 'Austria', '', NULL, NULL, NULL),
(16, '+994', 'Azerbaijan', '', NULL, NULL, NULL),
(17, '+1-242', 'Bahamas', '', NULL, NULL, NULL),
(18, '+973', 'Bahrain', '', NULL, NULL, NULL),
(19, '+880', 'Bangladesh', '', NULL, NULL, NULL),
(20, '+1-246', 'Barbados ', '', NULL, NULL, NULL),
(21, '+375', 'Belarus', '', NULL, NULL, NULL),
(22, '+32', 'Belgium ', '', NULL, NULL, NULL),
(23, '+501', 'Belize', '', NULL, NULL, NULL),
(24, '+229', 'Benin', '', NULL, NULL, NULL),
(25, '+1-441', 'Bermuda ', '', NULL, NULL, NULL),
(26, '+975', 'Bhutan', '', NULL, NULL, NULL),
(27, '+591', 'Bolivia ', '', NULL, NULL, NULL),
(28, '+387', 'Bosnia and Herzegovina ', '', NULL, NULL, NULL),
(29, '+267', 'Botswana', '', NULL, NULL, NULL),
(30, '+55', 'Brazil ', '', NULL, NULL, NULL),
(31, '+246', 'British Indian Ocean Territory (BIOT)', '', NULL, NULL, NULL),
(32, '+673', 'Brunei', '', NULL, NULL, NULL),
(33, '+359', 'Bulgaria ', '', NULL, NULL, NULL),
(34, '+226', 'Burkina Faso', '', NULL, NULL, NULL),
(35, '+257', 'Burundi', '', NULL, NULL, NULL),
(36, '+855', 'Cambodia', '', NULL, NULL, NULL),
(37, '+237', 'Cameroon', '', NULL, NULL, NULL),
(38, '+1', 'Canada ', '', NULL, NULL, NULL),
(39, '+238', 'Cape Verde ', '', NULL, NULL, NULL),
(40, '+1-345', 'Cayman Islands ', '', NULL, NULL, NULL),
(41, '+236', 'Central African Republic ', '', NULL, NULL, NULL),
(42, '+235', 'Chad ', '', NULL, NULL, NULL),
(43, '+56', 'Chile ', '', NULL, NULL, NULL),
(44, '+86', 'China ', '', NULL, NULL, NULL),
(45, '+53', 'Christmas Island ', '', NULL, NULL, NULL),
(46, '+61', 'Cocos (Keeling) Islands ', '', NULL, NULL, NULL),
(47, '+57', 'Colombia ', '', NULL, NULL, NULL),
(48, '+269', 'Comoros, Union of the ', '', NULL, NULL, NULL),
(49, '+243', 'Congo, Democratic Republic of the (Former Zaire) ', '', NULL, NULL, NULL),
(50, '+242', 'Congo, Republic of the', '', NULL, NULL, NULL),
(51, '+682', 'Cook Islands (Former Harvey Islands)', '', NULL, NULL, NULL),
(52, '+506', 'Costa Rica ', '', NULL, NULL, NULL),
(53, '+225', 'Cote D\'Ivoire (Former Ivory Coast) ', '', NULL, NULL, NULL),
(54, '+385', 'Croatia (Hrvatska) ', '', NULL, NULL, NULL),
(55, '+53', 'Cuba ', '', NULL, NULL, NULL),
(56, '+357', 'Cyprus ', '', NULL, NULL, NULL),
(57, '+420', 'Czech Republic', '', NULL, NULL, NULL),
(58, '+45', 'Denmark ', '', NULL, NULL, NULL),
(59, '+253', 'Djibouti (Former French Territory of the Afars and Issas, French Somaliland)', '', NULL, NULL, NULL),
(60, '+1-767', 'Dominica ', '', NULL, NULL, NULL),
(61, '+670', 'East Timor (Former Portuguese Timor)', '', NULL, NULL, NULL),
(62, '+593 ', 'Ecuador ', '', NULL, NULL, NULL),
(63, '+20', 'Egypt (Former United Arab Republic - with Syria)', '', NULL, NULL, NULL),
(64, '+503', 'El Salvador ', '', NULL, NULL, NULL),
(65, '+240', 'Equatorial Guinea (Former Spanish Guinea)', '', NULL, NULL, NULL),
(66, '+291', 'Eritrea (Former Eritrea Autonomous Region in Ethiopia)', '', NULL, NULL, NULL),
(67, '+372', 'Estonia (Former Estonian Soviet Socialist Republic)', '', NULL, NULL, NULL),
(68, '+251', 'Ethiopia (Former Abyssinia, Italian East Africa)', '', NULL, NULL, NULL),
(69, '+500', 'Falkland Islands (Islas Malvinas) ', '', NULL, NULL, NULL),
(70, '+298', 'Faroe Islands ', '', NULL, NULL, NULL),
(71, '+679', 'Fiji ', '', NULL, NULL, NULL),
(72, '+358', 'Finland ', '', NULL, NULL, NULL),
(73, '+33', 'France ', '', NULL, NULL, NULL),
(74, '+594', 'French Guiana or French Guyana ', '', NULL, NULL, NULL),
(75, '+689', 'French Polynesia (Former French Colony of Oceania)', '', NULL, NULL, NULL),
(76, '+262', 'French Southern Territories and Antarctic Lands ', '', NULL, NULL, NULL),
(77, '+241', 'Gabon (Gabonese Republic)', '', NULL, NULL, NULL),
(78, '+220', 'Gambia, The ', '', NULL, NULL, NULL),
(79, '+995', 'Georgia (Former Georgian Soviet Socialist Republic)', '', NULL, NULL, NULL),
(80, '+49', 'Germany ', '', NULL, NULL, NULL),
(81, '+233', 'Ghana (Former Gold Coast)', '', NULL, NULL, NULL),
(82, '+350', 'Gibraltar ', '', NULL, NULL, NULL),
(83, '+44', 'Great Britain (United Kingdom) ', '', NULL, NULL, NULL),
(84, '+30', 'Greece ', '', NULL, NULL, NULL),
(85, '+299', 'Greenland ', '', NULL, NULL, NULL),
(86, '+1-473', 'Grenada ', '', NULL, NULL, NULL),
(87, '+590', 'Guadeloupe', '', NULL, NULL, NULL),
(88, '+1-671', 'Guam', '', NULL, NULL, NULL),
(89, '+502', 'Guatemala ', '', NULL, NULL, NULL),
(90, '+224', 'Guinea (Former French Guinea)', '', NULL, NULL, NULL),
(91, '+245', 'Guinea-Bissau (Former Portuguese Guinea)', '', NULL, NULL, NULL),
(92, '+592', 'Guyana (Former British Guiana)', '', NULL, NULL, NULL),
(93, '+509', 'Haiti ', '', NULL, NULL, NULL),
(94, '+672', 'Heard Island and McDonald Islands (Territory of Australia)', '', NULL, NULL, NULL),
(95, '+39', 'Holy See (Vatican City State)', '', NULL, NULL, NULL),
(96, '+504', 'Honduras ', '', NULL, NULL, NULL),
(97, '+852', 'Hong Kong ', '', NULL, NULL, NULL),
(98, '+36', 'Hungary ', '', NULL, NULL, NULL),
(99, '+354', 'Iceland ', '', NULL, NULL, NULL),
(100, '+91', 'India ', '', NULL, NULL, NULL),
(101, '+62', 'Indonesia (Former Netherlands East Indies; Dutch East Indies)', '', NULL, NULL, NULL),
(102, '+98', 'Iran, Islamic Republic of', '', NULL, NULL, NULL),
(103, '+964', 'Iraq ', '', NULL, NULL, NULL),
(104, '+353', 'Ireland ', '', NULL, NULL, NULL),
(105, '+972', 'Israel ', '', NULL, NULL, NULL),
(106, '+39', 'Italy ', '', NULL, NULL, NULL),
(107, '+1-876', 'Jamaica ', '', NULL, NULL, NULL),
(108, '+81', 'Japan ', '', NULL, NULL, NULL),
(109, '+962', 'Jordan (Former Transjordan)', '', NULL, NULL, NULL),
(110, '+7', 'Kazakstan or Kazakhstan (Former Kazakh Soviet Socialist Republic)', '', NULL, NULL, NULL),
(111, '+254', 'Kenya (Former British East Africa)', '', NULL, NULL, NULL),
(112, '+686', 'Kiribati (Pronounced keer-ree-bahss) (Former Gilbert Islands)', '', NULL, NULL, NULL),
(113, '+850', 'Korea, Democratic People\'s Republic of (North Korea)', '', NULL, NULL, NULL),
(114, '+82', 'Korea, Republic of (South Korea) ', '', NULL, NULL, NULL),
(115, '+965', 'Kuwait ', '', NULL, NULL, NULL),
(116, '+996', 'Kyrgyzstan (Kyrgyz Republic) (Former Kirghiz Soviet Socialist Republic)', '', NULL, NULL, NULL),
(117, '+856', 'Lao People\'s Democratic Republic (Laos)', '', NULL, NULL, NULL),
(118, '+371', 'Latvia (Former Latvian Soviet Socialist Republic)', '', NULL, NULL, NULL),
(119, '+961', 'Lebanon ', '', NULL, NULL, NULL),
(120, '+266', 'Lesotho (Former Basutoland)', '', NULL, NULL, NULL),
(121, '+231', 'Liberia ', '', NULL, NULL, NULL),
(122, '+218', 'Libya (Libyan Arab Jamahiriya)', '', NULL, NULL, NULL),
(123, '+423', 'Liechtenstein ', '', NULL, NULL, NULL),
(124, '+370', 'Lithuania (Former Lithuanian Soviet Socialist Republic)', '', NULL, NULL, NULL),
(125, '+352', 'Luxembourg ', '', NULL, NULL, NULL),
(126, '+853', 'Macau ', '', NULL, NULL, NULL),
(127, '+389', 'Macedonia, The Former Yugoslav Republic of', '', NULL, NULL, NULL),
(128, '+261', 'Madagascar (Former Malagasy Republic)', '', NULL, NULL, NULL),
(129, '+265', 'Malawi (Former British Central African Protectorate, Nyasaland)', '', NULL, NULL, NULL),
(130, '+60', 'Malaysia ', '', NULL, NULL, NULL),
(131, '+960', 'Maldives ', '', NULL, NULL, NULL),
(132, '+223', 'Mali (Former French Sudan and Sudanese Republic) ', '', NULL, NULL, NULL),
(133, '+356', 'Malta ', '', NULL, NULL, NULL),
(134, '+692', 'Marshall Islands (Former Marshall Islands District - Trust Territory of the Pacific Islands)', '', NULL, NULL, NULL),
(135, '+596', 'Martinique (French) ', '', NULL, NULL, NULL),
(136, '+222', 'Mauritania ', '', NULL, NULL, NULL),
(137, '+230', 'Mauritius ', '', NULL, NULL, NULL),
(138, '+269', 'Mayotte (Territorial Collectivity of Mayotte)', '', NULL, NULL, NULL),
(139, '+52', 'Mexico ', '', NULL, NULL, NULL),
(140, '+691', 'Micronesia, Federated States of (Former Ponape, Truk, and Yap Districts - Trust Territory of the Pacific Islands)', '', NULL, NULL, NULL),
(141, '+373', 'Moldova, Republic of', '', NULL, NULL, NULL),
(142, '+377', 'Monaco, Principality of', '', NULL, NULL, NULL),
(143, '+976', 'Mongolia (Former Outer Mongolia)', '', NULL, NULL, NULL),
(144, '+1-664', 'Montserrat ', '', NULL, NULL, NULL),
(145, '+212', 'Morocco ', '', NULL, NULL, NULL),
(146, '+258', 'Mozambique (Former Portuguese East Africa)', '', NULL, NULL, NULL),
(147, '+95', 'Myanmar, Union of (Former Burma)', '', NULL, NULL, NULL),
(148, '+264', 'Namibia (Former German Southwest Africa, South-West Africa)', '', NULL, NULL, NULL),
(149, '+674', 'Nauru (Former Pleasant Island)', '', NULL, NULL, NULL),
(150, '+977', 'Nepal ', '', NULL, NULL, NULL),
(151, '+31', 'Netherlands ', '', NULL, NULL, NULL),
(152, '+599', 'Netherlands Antilles (Former Curacao and Dependencies)', '', NULL, NULL, NULL),
(153, '+687', 'New Caledonia ', '', NULL, NULL, NULL),
(154, '+64', 'New Zealand (Aotearoa) ', '', NULL, NULL, NULL),
(155, '+505', 'Nicaragua ', '', NULL, NULL, NULL),
(156, '+227', 'Niger ', '', NULL, NULL, NULL),
(157, '+234', 'Nigeria ', '', NULL, NULL, NULL),
(158, '+683', 'Niue (Former Savage Island)', '', NULL, NULL, NULL),
(159, '+672', 'Norfolk Island ', '', NULL, NULL, NULL),
(160, '+1-670', 'Northern Mariana Islands (Former Mariana Islands District - Trust Territory of the Pacific Islands)', '', NULL, NULL, NULL),
(161, '+47', 'Norway ', '', NULL, NULL, NULL),
(162, '+968', 'Oman, Sultanate of (Former Muscat and Oman)', '', NULL, NULL, NULL),
(163, '+92', 'Pakistan (Former West Pakistan)', '', NULL, NULL, NULL),
(164, '+680', 'Palau (Former Palau District - Trust Terriroty of the Pacific Islands)', '', NULL, NULL, NULL),
(165, '+970', 'Palestinian State (Proposed)', '', NULL, NULL, NULL),
(166, '+507', 'Panama ', '', NULL, NULL, NULL),
(167, '+675', 'Papua New Guinea (Former Territory of Papua and New Guinea)', '', NULL, NULL, NULL),
(168, '+595', 'Paraguay ', '', NULL, NULL, NULL),
(169, '+51', 'Peru ', '', NULL, NULL, NULL),
(170, '+63', 'Philippines ', '', NULL, NULL, NULL),
(171, '+64', 'Pitcairn Island', '', NULL, NULL, NULL),
(172, '+48', 'Poland ', '', NULL, NULL, NULL),
(173, '+351', 'Portugal ', '', NULL, NULL, NULL),
(174, '+974 ', 'Qatar, State of ', '', NULL, NULL, NULL),
(175, '+262', 'Reunion (French) (Former Bourbon Island)', '', NULL, NULL, NULL),
(176, '+40', 'Romania ', '', NULL, NULL, NULL),
(177, '+7', 'Russia - USSR (Former Russian Empire, Union of Soviet Socialist Republics, Russian Soviet Federative Socialist Republic) Now RU - Russian Federation', '', NULL, NULL, NULL),
(178, '+7', 'Russian Federation ', '', NULL, NULL, NULL),
(179, '+250', 'Rwanda (Rwandese Republic) (Former Ruanda)', '', NULL, NULL, NULL),
(180, '+290', 'Saint Helena ', '', NULL, NULL, NULL),
(181, '+1-869', 'Saint Kitts and Nevis (Former Federation of Saint Christopher and Nevis)', '', NULL, NULL, NULL),
(182, '+1-758', 'Saint Lucia ', '', NULL, NULL, NULL),
(183, '+508', 'Saint Pierre and Miquelon ', '', NULL, NULL, NULL),
(184, '+1-784', 'Saint Vincent and the Grenadines ', '', NULL, NULL, NULL),
(185, '+685', 'Samoa (Former Western Samoa)', '', NULL, NULL, NULL),
(186, '+378', 'San Marino ', '', NULL, NULL, NULL),
(187, '+239', 'Sao Tome and Principe ', '', NULL, NULL, NULL),
(188, '+966', 'Saudi Arabia ', '', NULL, NULL, NULL),
(189, '+381', 'Serbia, Republic of', '', NULL, NULL, NULL),
(190, '+221', 'Senegal ', '', NULL, NULL, NULL),
(191, '+248', 'Seychelles ', '', NULL, NULL, NULL),
(192, '+232', 'Sierra Leone ', '', NULL, NULL, NULL),
(193, '+65', 'Singapore ', '', NULL, NULL, NULL),
(194, '+421', 'Slovakia', '', NULL, NULL, NULL),
(195, '+386', 'Slovenia ', '', NULL, NULL, NULL),
(196, '+677', 'Solomon Islands (Former British Solomon Islands)', '', NULL, NULL, NULL),
(197, '+252', 'Somalia (Former Somali Republic, Somali Democratic Republic) ', '', NULL, NULL, NULL),
(198, '+27', 'South Africa (Former Union of South Africa)', '', NULL, NULL, NULL),
(199, '+500', 'South Georgia and the South Sandwich Islands', '', NULL, NULL, NULL),
(200, '+34', 'Spain ', '', NULL, NULL, NULL),
(201, '+94', 'Sri Lanka (Former Serendib, Ceylon) ', '', NULL, NULL, NULL),
(202, '+249', 'Sudan (Former Anglo-Egyptian Sudan) ', '', NULL, NULL, NULL),
(203, '+597', 'Suriname (Former Netherlands Guiana, Dutch Guiana)', '', NULL, NULL, NULL),
(204, '+47', 'Svalbard (Spitzbergen) and Jan Mayen Islands ', '', NULL, NULL, NULL),
(205, '+268', 'Swaziland, Kingdom of ', '', NULL, NULL, NULL),
(206, '+46', 'Sweden ', '', NULL, NULL, NULL),
(207, '+41', 'Switzerland ', '', NULL, NULL, NULL),
(208, '+963', 'Syria (Syrian Arab Republic) (Former United Arab Republic - with Egypt)', '', NULL, NULL, NULL),
(209, '+886', 'Taiwan (Former Formosa)', '', NULL, NULL, NULL),
(210, '+992', 'Tajikistan (Former Tajik Soviet Socialist Republic)', '', NULL, NULL, NULL),
(211, '+255', 'Tanzania, United Republic of (Former United Republic of Tanganyika and Zanzibar)', '', NULL, NULL, NULL),
(212, '+66', 'Thailand (Former Siam)', '', NULL, NULL, NULL),
(213, '+228', 'Togo (Former French Togoland)', '', NULL, NULL, NULL),
(214, '+690', 'Tokelau ', '', NULL, NULL, NULL),
(215, '+676', 'Tonga, Kingdom of (Former Friendly Islands)', '', NULL, NULL, NULL),
(216, '+1-868', 'Trinidad and Tobago ', '', NULL, NULL, NULL),
(217, '+216', 'Tunisia ', '', NULL, NULL, NULL),
(218, '+90', 'Turkey ', '', NULL, NULL, NULL),
(219, '+993', 'Turkmenistan (Former Turkmen Soviet Socialist Republic)', '', NULL, NULL, NULL),
(220, '+1-649', 'Turks and Caicos Islands ', '', NULL, NULL, NULL),
(221, '+688', 'Tuvalu (Former Ellice Islands)', '', NULL, NULL, NULL),
(222, '+256', 'Uganda, Republic of', '', NULL, NULL, NULL),
(223, '+380', 'Ukraine (Former Ukrainian National Republic, Ukrainian State, Ukrainian Soviet Socialist Republic)', '', NULL, NULL, NULL),
(224, '+971', 'United Arab Emirates (UAE) (Former Trucial Oman, Trucial States)', '', NULL, NULL, NULL),
(225, '+44', 'United Kingdom (Great Britain / UK)', '', NULL, NULL, NULL),
(226, '+1', 'United States ', '', NULL, NULL, NULL),
(227, '+246', 'United States Minor Outlying Islands ', '', NULL, NULL, NULL),
(228, '+598', 'Uruguay, Oriental Republic of (Former Banda Oriental, Cisplatine Province)', '', NULL, NULL, NULL),
(229, '+998', 'Uzbekistan (Former UZbek Soviet Socialist Republic)', '', NULL, NULL, NULL),
(230, '+678', 'Vanuatu (Former New Hebrides)', '', NULL, NULL, NULL),
(231, '+418', 'Vatican City State (Holy See)', '', NULL, NULL, NULL),
(232, '+58', 'Venezuela ', '', NULL, NULL, NULL),
(233, '+84', 'Vietnam ', '', NULL, NULL, NULL),
(234, '+1-284', 'Virgin Islands, British ', '', NULL, NULL, NULL),
(235, '+1-340', 'Virgin Islands, United States (Former Danish West Indies) ', '', NULL, NULL, NULL),
(236, '+681', 'Wallis and Futuna Islands ', '', NULL, NULL, NULL),
(237, '+212', 'Western Sahara (Former Spanish Sahara)', '', NULL, NULL, NULL),
(238, '+967', 'Yemen ', '', NULL, NULL, NULL),
(239, '+243', 'Zaire (Former Congo Free State, Belgian Congo, Congo/Leopoldville, Congo/Kinshasa, Zaire) Now CD - Congo, Democratic Republic of the ', '', NULL, NULL, NULL),
(240, '+260', 'Zambia, Republic of (Former Northern Rhodesia) ', '', NULL, NULL, NULL),
(241, '+263', 'Zimbabwe, Republic of (Former Southern Rhodesia, Rhodesia) ', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_code` varchar(255) DEFAULT NULL,
  `exam_name` varchar(255) NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `exam_code`, `exam_name`, `vendor_id`, `created_at`, `updated_at`) VALUES
(4, 'AI-102', 'Designing and Implementing a Microsoft Azure AI Solution', 3, NULL, NULL),
(5, 'AI-900', 'Microsoft Azure AI Fundamentals', 3, NULL, NULL),
(6, 'AZ-104', 'Microsoft Azure Administrator', 3, NULL, NULL),
(7, 'AZ-120', 'Planning and Administering Microsoft Azure for SAP Workloads', 3, NULL, NULL),
(8, 'AZ-140', 'Configuring and Operating Windows Virtual Desktop on Microsoft Azure', 3, NULL, NULL),
(9, 'AZ-204', 'Developing Solutions for Microsoft Azure', 3, NULL, NULL),
(10, 'AZ-305', 'Designing Microsoft Azure Infrastructure Solutions', 3, NULL, NULL),
(11, 'AZ-400', 'Microsoft Azure DevOps Solutions', 3, NULL, NULL),
(12, 'AZ-500', 'Microsoft Azure Security Technologies', 3, NULL, NULL),
(13, 'AZ-600', 'Configuring and Operating a Hybrid Cloud with Microsoft Azure Stack Hub', 3, NULL, NULL),
(14, 'AZ-700', 'Designing and Implementing Microsoft Azure Networking Solutions', 3, NULL, NULL),
(15, 'AZ-800', 'Administering Windows Server Hybrid Core Infrastructure', 3, NULL, NULL),
(16, 'AZ-801', 'Configuring Windows Server Hybrid Advanced Services', 3, NULL, NULL),
(17, 'AZ-900', 'Microsoft Azure Fundamentals', 3, NULL, NULL),
(18, 'DP-100', 'Designing and Implementing a Data Science Solution on Azure', 3, NULL, NULL),
(19, 'DP-203', 'Data Engineering on Microsoft Azure', 3, NULL, NULL),
(20, 'DP-300', 'Administering Relational Databases on Microsoft Azure', 3, NULL, NULL),
(21, 'DP-500', 'Designing and Implementing Enterprise-Scale Analytics Solutions Using Microsoft Azure and Microsoft Power BI', 3, NULL, NULL),
(22, 'DP-600', 'Implementing Analytics Solutions Using Microsoft Fabric', 3, NULL, NULL),
(23, 'DP-900', 'Microsoft Azure Data Fundamentals', 3, NULL, NULL),
(24, 'MB-210', 'Microsoft Dynamics 365 for Sales', 3, NULL, NULL),
(25, 'MB-230', 'Microsoft Dynamics 365 Customer Service Functional Consultant', 3, NULL, NULL),
(26, 'MB-300', 'Microsoft Dynamics 365: Core Finance and Operations', 3, NULL, NULL),
(27, 'MB-310', 'Microsoft Dynamics 365 Finance Functional Consultant', 3, NULL, NULL),
(28, 'MB-330', 'Microsoft Dynamics 365 Supply Chain Management', 3, NULL, NULL),
(29, 'MB-335', 'Microsoft Dynamics 365 Supply Chain Management Functional Consultant Expert', 3, NULL, NULL),
(30, 'MB-500', 'Microsoft Dynamics 365: Finance and Operations Apps Developer', 3, NULL, NULL),
(31, 'MB-700', 'Microsoft Dynamics 365: Finance and Operations Apps Solution Architect', 3, NULL, NULL),
(32, 'MB-800', 'Microsoft Dynamics 365 Business Central Functional Consultant', 3, NULL, NULL),
(33, 'MB-910', 'Microsoft Dynamics 365 Fundamentals Customer Engagement Apps (CRM)', 3, NULL, NULL),
(34, 'MB-920', 'Microsoft Certified: Dynamics 365 Fundamentals (ERP)', 3, NULL, NULL),
(35, 'MD-102', 'Endpoint Administrator', 3, NULL, NULL),
(36, 'MS-102', 'Microsoft 365 Administrator', 3, NULL, NULL),
(37, 'MS-203', 'Microsoft 365 Messaging', 3, NULL, NULL),
(38, 'MS-500', 'Microsoft 365 Security Administration', 3, NULL, NULL),
(39, 'MS-700', 'Managing Microsoft Teams', 3, NULL, NULL),
(40, 'MS-900', 'Microsoft 365 Fundamentals', 3, NULL, NULL),
(41, 'PL-100', 'Microsoft Power Platform App Maker', 3, NULL, NULL),
(42, 'PL-200', 'Microsoft Power Platform Functional Consultant', 3, NULL, NULL),
(43, 'PL-300', 'Microsoft Power BI Data Analyst', 3, NULL, NULL),
(44, 'PL-400', 'Microsoft Power Platform Developer', 3, NULL, NULL),
(45, 'PL-500', 'Microsoft Power Automate RPA Developer', 3, NULL, NULL),
(46, 'PL-600', 'Microsoft Power Platform Solution Architect', 3, NULL, NULL),
(47, 'PL-900', 'Microsoft Power Platform Fundamentals', 3, NULL, NULL),
(48, 'SC-100', 'Microsoft Cybersecurity Architect', 3, NULL, NULL),
(49, 'SC-200', 'Microsoft Security Operations Analyst', 3, NULL, NULL),
(50, 'SC-300', 'Microsoft Identity and Access Administrator', 3, NULL, NULL),
(51, 'SC-400', 'Microsoft Information Protection Administrator', 3, NULL, NULL),
(52, 'SC-900', 'Microsoft Security, Compliance, and Identity Fundamentals', 3, NULL, NULL),
(53, 'CLF-C02', 'AWS Certified Cloud Practitioner(CLF-C02)', 4, NULL, NULL),
(54, 'AIF-C01', 'AWS Certified AI Practitioner(AIF-C01)', 4, NULL, NULL),
(55, 'ME1-C01', 'AWS Certified Machine Learning Engineer - Associate(ME1-C01)', 4, NULL, NULL),
(56, 'DEA-C01', 'AWS Certified Data Engineer - Associate(DEA-C01)', 4, NULL, NULL),
(57, 'DVA-C02', 'AWS Certified Developer - Associate(DVA-C02)', 4, NULL, NULL),
(58, 'SAA-C03', 'AWS Certified Solutions Architect - Associate(SAA-C03)', 4, NULL, NULL),
(59, 'SOA-C02', 'AWS Certified SysOps Administrator - Associate(SOA-C02)', 4, NULL, NULL),
(60, 'DOP-C02', 'AWS Certified DevOps Engineer - Professional(DOP-C02)', 4, NULL, NULL),
(61, 'SAP-C02', 'AWS Certified Solutions Architect - Professional(SAP-C02)', 4, NULL, NULL),
(62, 'ANS-C01', 'AWS Certified Advanced Networking - Specialty(ANS-C01)', 4, NULL, NULL),
(63, 'MLS-C01', 'AWS Certified Machine Learning - Specialty(MLS-C01)', 4, NULL, NULL),
(64, 'SCS-C02', 'AWS Certified Security - Specialty(SCS-C02)', 4, NULL, NULL),
(65, 'FC0-U61', 'CompTIA IT Fundamentals (ITF+)', 5, NULL, NULL),
(66, 'FC0-U71', 'CompTIA Tech+', 5, NULL, NULL),
(67, '220-1101 (Core 1)', 'CompTIA A+', 5, NULL, NULL),
(68, '220-1102 (Core 2)', 'CompTIA A+', 5, NULL, NULL),
(69, 'N10-009', 'CompTIA Network+', 5, NULL, NULL),
(70, 'SY0-701', 'CompTIA Security+', 5, NULL, NULL),
(71, 'CV0-004', 'CompTIA Cloud+', 5, NULL, NULL),
(72, 'XK0-005', 'CompTIA Linux+', 5, NULL, NULL),
(73, 'SK0-005', 'CompTIA Server+', 5, NULL, NULL),
(74, 'CS0-003', 'CompTIA Cybersecurity Analyst (CySA+)', 5, NULL, NULL),
(75, 'CAS-004', 'CompTIA Advanced Security Practitioner (CASP+)', 5, NULL, NULL),
(76, 'PT0-003', 'CompTIA PenTest+', 5, NULL, NULL),
(77, 'DA0-001', 'CompTIA Data+', 5, NULL, NULL),
(78, 'DS0-001', 'CompTIA DataSys+', 5, NULL, NULL),
(79, 'DY0-001', 'CompTIA DataX', 5, NULL, NULL),
(80, 'PK0-005', 'CompTIA Project+', 5, NULL, NULL),
(81, 'CLO-002', 'CompTIA Cloud Essentials+', 5, NULL, NULL),
(82, '', 'Google Cloud Certified - Cloud Digital Leader', 6, NULL, NULL),
(83, '', 'Google Cloud Certified - Associate Cloud Engineer', 6, NULL, NULL),
(84, '', 'Google Cloud Certified - Professional Cloud Architect', 6, NULL, NULL),
(85, '', 'Google Cloud Certified - Professional Cloud Database Engineer', 6, NULL, NULL),
(86, '', 'Google Cloud Certified - Professional Cloud Developer', 6, NULL, NULL),
(87, '', 'Google Cloud Certified - Professional Cloud DevOps Engineer', 6, NULL, NULL),
(88, '', 'Google Cloud Certified - Professional Cloud Network Engineer', 6, NULL, NULL),
(89, '', 'Google Cloud Certified - Professional Cloud Security Engineer', 6, NULL, NULL),
(90, '', 'Google Cloud Certified - Professional Data Engineer', 6, NULL, NULL),
(91, '', 'Google Cloud Certified - Professional Google Workspace Administrator', 6, NULL, NULL),
(92, '', 'Google Cloud Certified - Professional Machine Learning Engineer', 6, NULL, NULL),
(93, '', 'Salesforce Certified Associate', 7, NULL, NULL),
(94, '', 'Salesforce Certified AI Associate', 7, NULL, NULL),
(95, '', 'Salesforce Certified Marketing Associate', 7, NULL, NULL),
(96, '', 'Salesforce Certified MuleSoft Associate', 7, NULL, NULL),
(97, '', 'Salesforce Certified Administrator', 7, NULL, NULL),
(98, '', 'Salesforce Certified Advanced Administrator', 7, NULL, NULL),
(99, '', 'Salesforce Certified Business Analyst', 7, NULL, NULL),
(100, '', 'Salesforce Certified AI Specialist', 7, NULL, NULL),
(101, '', 'Salesforce Certified Slack Administrator', 7, NULL, NULL),
(102, '', 'Salesforce Certified Platform App Builder', 7, NULL, NULL),
(103, '', 'Salesforce Certified Data Architect', 7, NULL, NULL),
(104, '', 'Salesforce Certified Development Lifecycle and Deployment Architect', 7, NULL, NULL),
(105, '', 'Salesforce Certified Integration Architect', 7, NULL, NULL),
(106, '', 'Salesforce Certified Catalyst Specialist', 7, NULL, NULL),
(107, '', 'Salesforce Certified Education Cloud Consultant', 7, NULL, NULL),
(108, '', 'Salesforce Certified Experience Cloud Consultant', 7, NULL, NULL),
(109, '', 'Salesforce Certified Field Service Consultant', 7, NULL, NULL),
(110, '', 'Salesforce Certified Nonprofit Cloud Consultant', 7, NULL, NULL),
(111, '', 'Salesforce Certified OmniStudio Consultant', 7, NULL, NULL),
(112, '', 'Salesforce Certified Sales Cloud Consultant', 7, NULL, NULL),
(113, '', 'Salesforce Certified Service Cloud Consultant', 7, NULL, NULL),
(114, '', 'Salesforce Certified CRM Analytics and Einstein Discovery Consultant', 7, NULL, NULL),
(115, '', 'Salesforce Certified Data Cloud Consultant', 7, NULL, NULL),
(116, '', 'Salesforce Certified Slack Consultant', 7, NULL, NULL),
(117, '', 'Salesforce Certified CPQ Specialist', 7, NULL, NULL),
(118, '', 'Salesforce Certified User Experience Designer', 7, NULL, NULL),
(119, '', 'Salesforce Certified Strategy Designer', 7, NULL, NULL),
(120, '', 'Salesforce Certified B2C Commerce Developer', 7, NULL, NULL),
(121, '', 'Certified B2C Commerce Developers have experience as full-stack developers for Salesforce Commerce Cloud Digital.', 7, NULL, NULL),
(122, '', 'Salesforce Certified Industries CPQ Developer', 7, NULL, NULL),
(123, '', 'Salesforce Certified JavaScript Developer I', 7, NULL, NULL),
(124, '', 'Salesforce Certified OmniStudio Developer', 7, NULL, NULL),
(125, '', 'Salesforce Certified Platform Developer I', 7, NULL, NULL),
(126, '', 'Salesforce Certified Platform Developer II', 7, NULL, NULL),
(127, '', 'Salesforce Certified MuleSoft Developer I', 7, NULL, NULL),
(128, '', 'Salesforce Certified MuleSoft Developer II', 7, NULL, NULL),
(129, '', 'Salesforce Certified Hyperautomation Specialist', 7, NULL, NULL),
(130, '', 'Salesforce Certified Slack Developer', 7, NULL, NULL),
(131, '', 'Salesforce Certified Marketing Cloud Administrator', 7, NULL, NULL),
(132, '', 'Salesforce Certified Marketing Cloud Consultant', 7, NULL, NULL),
(133, '', 'Salesforce Certified Marketing Cloud Developer', 7, NULL, NULL),
(134, '', 'Salesforce Certified Marketing Cloud Email Specialist', 7, NULL, NULL),
(135, '', 'Salesforce Certified Marketing Cloud Account Engagement Consultant', 7, NULL, NULL),
(136, '', 'Salesforce Certified Marketing Cloud Account Engagement Specialist', 7, NULL, NULL),
(137, 'CAPM', 'Certified Associate in Project Management (PMI-100)', 8, NULL, NULL),
(138, 'PFMP', 'Portfolio Management Professional', 8, NULL, NULL),
(139, 'PGMP', 'Program Management Professional', 8, NULL, NULL),
(140, 'PMI-ACP', 'PMI Agile Certified Practitioner', 8, NULL, NULL),
(141, 'PMI-PBA', 'PMI Professional in Business Analysis', 8, NULL, NULL),
(142, 'PMI-RMP', 'PMI Risk Management Professional', 8, NULL, NULL),
(143, 'PMI-SP', 'PMI Scheduling Professional Practice Test', 8, NULL, NULL),
(144, 'PMP', 'Project Management Professional', 8, NULL, NULL),
(145, '1Z0-027', 'Oracle Exadata X3 and X4 Administration', 9, NULL, NULL),
(146, '1Z0-034', 'Upgrade Oracle9i10g OCA to Oracle Database 11g OCP', 9, NULL, NULL),
(147, '1Z0-051', 'Oracle Database 11g SQL Fundamentals I', 9, NULL, NULL),
(148, '1Z0-052', 'Oracle Database 11g Administration I', 9, NULL, NULL),
(149, '1Z0-053', 'Oracle Database 11g Administration II', 9, NULL, NULL),
(150, '1Z0-054', 'Oracle Database 11g Performance Tuning', 9, NULL, NULL),
(151, '1Z0-060', 'Upgrade to Oracle Database 12c', 9, NULL, NULL),
(152, '1Z0-061', 'Oracle Database 12c SQL Fundamentals', 9, NULL, NULL),
(153, '1Z0-062', 'Oracle Database 12c Installation and Administration', 9, NULL, NULL),
(154, '1Z0-063', 'Oracle Database 12c Advanced Administration', 9, NULL, NULL),
(155, '1Z0-064', 'Oracle Database 12c Performance Management and Tuning', 9, NULL, NULL),
(156, '1Z0-066', 'Oracle Database 12c Data Guard Administration', 9, NULL, NULL),
(157, '1Z0-067', 'Upgrade Oracle9i10g11g OCA OR OCP to Oracle Database 12c OCP', 9, NULL, NULL),
(158, '1Z0-068', 'Oracle Database 12c RAC and Grid Infrastructure Administration', 9, NULL, NULL),
(159, '1Z0-070', 'Oracle Exadata X5 Administration', 9, NULL, NULL),
(160, '1Z0-071', 'Oracle Datbase 12c SQL Popular', 9, NULL, NULL),
(161, '1Z0-078', 'Oracle Database 19c: RAC, ASM, and Grid Infrastructure Administration', 9, NULL, NULL),
(162, '1z0-082', 'Oracle Database Administration I Popular', 9, NULL, NULL),
(163, '1z0-083', 'Oracle Database Administration II Popular', 9, NULL, NULL),
(164, '1z0-084', 'Oracle Database 19c: Performance Management and Tuning', 9, NULL, NULL),
(165, '1z0-100', 'Oracle Linux 5 and 6 System Administration', 9, NULL, NULL),
(166, '1z0-1005', 'Oracle Financials Cloud: Payables 2018 Implementation Essentials', 9, NULL, NULL),
(167, '1z0-1042-20', 'Oracle Cloud Platform Application Integration 2020 Specialist', 9, NULL, NULL),
(168, '1z0-1042-23', 'Oracle Cloud Infrastructure 2023 Application Integration Professional', 9, NULL, NULL),
(169, '1z0-1046-21', 'Oracle Global Human Resources Cloud 2021 Implementation Essentials', 9, NULL, NULL),
(170, '1z0-105', 'Oracle Linux 6 Advanced System Administration', 9, NULL, NULL),
(171, '1z0-1054-21', 'Oracle Financials Cloud: General Ledger 2021 Implementation Essentials', 9, NULL, NULL),
(172, '1z0-1054-22', 'Oracle Financials Cloud: General Ledger 2022 Implementation Professional', 9, NULL, NULL),
(173, '1z0-1054-23', 'Oracle Financials Cloud: General Ledger 2023 Implementation Professional', 9, NULL, NULL),
(174, '1z0-1055-21', 'Oracle Financials Cloud: Payables 2021 Implementation Essentials', 9, NULL, NULL),
(175, '1z0-1056-21', 'Oracle Financials Cloud: Receivables 2021 Implementation Essentials', 9, NULL, NULL),
(176, '1z0-1056-23', 'Oracle Financials Cloud: Receivables 2023 Implementation Professional', 9, NULL, NULL),
(177, '1z0-1057-22', 'Oracle Project Management Cloud 2022 Certified Implementation Professional', 9, NULL, NULL),
(178, '1z0-1065-23', 'Oracle Fusion Cloud Procurement 2023 Implementation Professional', 9, NULL, NULL),
(179, '1z0-1066-22', 'Oracle Planning and Collaboration Cloud 2022 Implementation Professional', 9, NULL, NULL),
(180, '1z0-1067-21', 'Oracle Cloud Infrastructure 2021 Cloud Operations Associate', 9, NULL, NULL),
(181, '1z0-1072-20', 'Oracle Cloud Infrastructure 2020 Architect Associate', 9, NULL, NULL),
(182, '1z0-1072-21', 'Oracle Cloud Infrastructure 2021 Architect Associate', 9, NULL, NULL),
(183, '1z0-1072-22', 'Oracle Cloud Infrastructure 2022 Architect Associate', 9, NULL, NULL),
(184, '1z0-1072-23', 'Oracle Cloud Infrastructure 2023 Architect Associate', 9, NULL, NULL),
(185, '1z0-1073-20', 'Oracle Inventory Cloud 2020 Implementation Essentials', 9, NULL, NULL),
(186, '1z0-1079-20', 'Oracle SCM Transportation and Global Trade Management Cloud 2020 Implementation Essentials', 9, NULL, NULL),
(187, '1z0-1080-20', 'Oracle Planning 2020 Implementation Essentials', 9, NULL, NULL),
(188, '1z0-1081-20', 'Oracle Financial Consolidation and Close 2020 Implementation Essentials', 9, NULL, NULL),
(189, '1z0-1081-23', 'Oracle Financial Consolidation and Close 2023 Implementation Professional', 9, NULL, NULL),
(190, '1z0-1084-20', 'Oracle Cloud Infrastructure Developer 2020 Associate', 9, NULL, NULL),
(191, '1z0-1084-21', 'Oracle Cloud Infrastructure Developer 2021 Associate', 9, NULL, NULL),
(192, '1z0-1085-20', 'Oracle Cloud Infrastructure Foundations 2020 Associate', 9, NULL, NULL),
(193, '1z0-1086-22', 'Oracle Enterprise Data Management Cloud 2022 Implementation Professional', 9, NULL, NULL),
(194, '1z0-1087-20', 'Oracle Account Reconciliation 2020 Implementation Essentials', 9, NULL, NULL),
(195, '1z0-1091-22', ': Oracle Utilities Meter Solution Cloud Service 2022 Implementation Professional', 9, NULL, NULL),
(196, '1z0-1093-23', 'Oracle Base Database Services 2023 Professional', 9, NULL, NULL),
(197, '1z0-1094-23', 'Oracle Cloud Database 2023 Migration and Integration Professional', 9, NULL, NULL),
(198, '1z0-1105-22', 'Oracle Cloud Data Management 2022 Foundations Associate', 9, NULL, NULL),
(199, '1z0-1106-1', 'Oracle HCM Business Process Foundations Associate Rel 1', 9, NULL, NULL),
(200, '1z0-1114-23', 'Oracle Redwood Application Developer Associate', 9, NULL, NULL),
(201, '1z0-133', 'Oracle WebLogic Server 12c: Administration I', 9, NULL, NULL),
(202, '1z0-134', 'Oracle WebLogic Server 12c Advanced Administrator II', 9, NULL, NULL),
(203, '1z0-144', 'Oracle Database 11g Program with PLSQL', 9, NULL, NULL),
(204, '1z0-146', 'Oracle Database 11g Advanced PLSQL', 9, NULL, NULL),
(205, '1z0-148', 'Oracle Database 12c Advanced PLSQL', 9, NULL, NULL),
(206, '1z0-149', 'Oracle Database Program with PL/SQL', 9, NULL, NULL),
(207, '1z0-151', 'Oracle Fusion Middleware 11g Build Applications with Oracle Forms', 9, NULL, NULL),
(208, '1z0-160', 'Oracle Database Cloud Service', 9, NULL, NULL),
(209, '1z0-161', 'Oracle Java Cloud Service', 9, NULL, NULL),
(210, '1z0-238', 'Oracle EBS R12 Install Patch and Maintain Applications', 9, NULL, NULL),
(211, '1z0-324', 'Oracle Taleo Recruiting Cloud Service 2016 Implementation Essentials', 9, NULL, NULL),
(212, '1z0-325', '1z0-325: Oracle RightNow Cloud Service 2016 Implementation Essentials', 9, NULL, NULL),
(213, '1z0-327', '1z0-327: Oracle Fusion Procurement Cloud Service 2016 Implementation Essentials', 9, NULL, NULL),
(214, '1z0-329', '1z0-329: Oracle Fusion HCM Base Cloud Service 2016 Implementation Essentials', 9, NULL, NULL),
(215, '1z0-330', '1z0-330: Oracle Fusion Workforce Compensation Cloud Service 2016 Implementation Essentials', 9, NULL, NULL),
(216, '1z0-331', '1z0-331: Oracle Fusion Talent Management Base Cloud Service 2016 Implementation Essentials', 9, NULL, NULL),
(217, '1z0-337', '1z0-337: Oracle Infrastructure as a Service Cloud 2017 Implementation Essentials', 9, NULL, NULL),
(218, '1z0-338', '1z0-338: Oracle Exadata Database Machine and Cloud Service 2017 Implementation Essentials', 9, NULL, NULL),
(219, '1z0-342', '1z0-342: JD Edwards EnterpriseOne Financial Management 9.2 Implementation Essentials', 9, NULL, NULL),
(220, '1z0-343', '1z0-343: JD Edwards (JDE) EnterpriseOne 9 Projects Essentials', 9, NULL, NULL),
(221, '1z0-344', '1z0-344: JD Edwards EnterpriseOne Configurable Network Computing 9.2 Implementation Essentials', 9, NULL, NULL),
(222, '1z0-347', '1z0-347: Oracle Order Management Cloud 2017 Implementation Essentials', 9, NULL, NULL),
(223, '1z0-348', '1z0-348: Oracle Manufacturing Cloud 2017 Implementation Essentials', 9, NULL, NULL),
(224, '1z0-349', '1z0-349: Oracle Eloqua Marketing Cloud Service 2017 Implementation Essentials', 9, NULL, NULL),
(225, '1z0-404', '1z0-404: Oracle Communications Session Border Controller 7 Basic Implementation Essentials', 9, NULL, NULL),
(226, '1z0-416', '1z0-416: PeopleSoft 9.2 Human Resources Essentials', 9, NULL, NULL),
(227, '1z0-417', '1z0-417: Oracle Database Performance and Tuning Essentials 2015', 9, NULL, NULL),
(228, '1z0-419', '1z0-419: Oracle Application Development Framework 12c Essentials', 9, NULL, NULL),
(229, '1z0-429', '1z0-429: Oracle FS1 Series Systems Implementation Essentials', 9, NULL, NULL),
(230, '1z0-432', '1z0-432: Oracle Real Application Clusters 12c Essentials', 9, NULL, NULL),
(231, '1z0-434', '1z0-434: Oracle SOA Suite 12c Essentials', 9, NULL, NULL),
(232, '1z0-435', '1z0-435: Oracle Business Process Management Suite 12c Essentials', 9, NULL, NULL),
(233, '1z0-436', '1z0-436: Oracle BigMachines CPQ Cloud Service 2016 Implementation Essentials', 9, NULL, NULL),
(234, '1z0-439', '1z0-439: Primavera Unifier Cloud Service 2016 Implementation Essentials', 9, NULL, NULL),
(235, '1z0-443', '1z0-443: Oracle Taleo Learn Cloud Service 2016 Implementation Essentials', 9, NULL, NULL),
(236, '1z0-447', '1z0-447: Oracle GoldenGate 12c Implementation Essentials', 9, NULL, NULL),
(237, '1z0-448', '1z0-448: Oracle Data Integrator 12c Essentials', 9, NULL, NULL),
(238, '1z0-449', '1z0-449: Oracle Big Data 2016 Implementation Essentials', 9, NULL, NULL),
(239, '1z0-457', '1z0-457: Oracle Enterprise Manager 12c Essentials', 9, NULL, NULL),
(240, '1z0-477', '1z0-477: Oracle Responsys Marketing Platform Cloud Service 2017 Implementation Essentials', 9, NULL, NULL),
(241, '1z0-479', '1z0-479: Oracle Access Management Suite Plus 11g Essentials', 9, NULL, NULL),
(242, '1z0-481', '1z0-481: Oracle GoldenGate 11g Certified Implementation Essentials', 9, NULL, NULL),
(243, '1z0-485', '1z0-485: Oracle Exadata Database Machine 2014 Implementation Essentials', 9, NULL, NULL),
(244, '1z0-493', '1z0-493: Oracle Communications Order and Service Management Server 7 Implementation Essentials', 9, NULL, NULL),
(245, '1z0-497', '1z0-497: Oracle Database 12c Essentials', 9, NULL, NULL),
(246, '1z0-499', '1z0-499: Oracle ZFS Storage Appliance 2017 Implementation Essentials', 9, NULL, NULL),
(247, '1z0-500', '1z0-500: Oracle Management Cloud 2017 Implementation Essentials', 9, NULL, NULL),
(248, '1z0-517', '1z0-517: Oracle EBS R12.1 Payables Essentials', 9, NULL, NULL),
(249, '1z0-518', '1z0-518: Oracle EBS R12.1 Receivables Essentials', 9, NULL, NULL),
(250, '1z0-519', '1z0-519: Oracle EBS R12.1 Inventory Essentials', 9, NULL, NULL),
(251, '1z0-520', '1z0-520: Oracle EBS R12.1 Purchasing Essentials', 9, NULL, NULL),
(252, '1z0-522', '1z0-522: JD Edwards EnterpriseOne 9 Financial Management Essentials', 9, NULL, NULL),
(253, '1z0-531', '1z0-531: Oracle Essbase 11 Essentials', 9, NULL, NULL),
(254, '1z0-532', '1z0-532: Oracle Hyperion Financial Management 11 Essentials', 9, NULL, NULL),
(255, '1z0-533', '1z0-533: Oracle Hyperion Planning 11 Essentials', 9, NULL, NULL),
(256, '1z0-542', '1z0-542: Oracle WebCenter Content 11g Essentials', 9, NULL, NULL),
(257, '1z0-548', '1z0-548: Oracle E-Business Suite R12 Human Capital Management Essentials', 9, NULL, NULL),
(258, '1z0-574', '1z0-574: Oracle IT Architecture Release 3 Essentials', 9, NULL, NULL),
(259, '1z0-580', '1z0-580: Oracle Solaris 11 Installation and Configuration Essentials', 9, NULL, NULL),
(260, '1z0-588', '1z0-588: Oracle Hyperion Data Relationship Management Essentials', 9, NULL, NULL),
(261, '1z0-590', '1z0-590: Oracle VM 3.0 for x86 Essentials', 9, NULL, NULL),
(262, '1z0-591', '1z0-591: Oracle Business Intelligence Foundation Suite 11g Essentials', 9, NULL, NULL),
(263, '1z0-595', '1z0-595: Oracle Spatial 11g Essentials', 9, NULL, NULL),
(264, '1z0-599', '1z0-599: Oracle WebLogic Server 12c Essentials', 9, NULL, NULL),
(265, '1z0-632', '1z0-632: PeopleSoft PeopleTools 8.5x Implementation Essentials', 9, NULL, NULL),
(266, '1z0-750', '1z0-750: Oracle Application Express 18: Developing Web Applications', 9, NULL, NULL),
(267, '1z0-803', '1z0-803: Java SE 7 Programmer I', 9, NULL, NULL),
(268, '1z0-804', '1z0-804: Java SE 7 Programmer II', 9, NULL, NULL),
(269, '1z0-807', '1z0-807: Java EE 6 Enterprise Architect Certified Master', 9, NULL, NULL),
(270, '1z0-808', '1z0-808: Java SE 8 Programmer Popular', 9, NULL, NULL),
(271, '1z0-809', '1z0-809: Java SE 8 Programmer II', 9, NULL, NULL),
(272, '1z0-811', '1z0-811: Java Foundations', 9, NULL, NULL),
(273, '1z0-816', '1z0-816: Java SE 11 Programmer II', 9, NULL, NULL),
(274, '1z0-819', '1z0-819: Java SE 11 Developer', 9, NULL, NULL),
(275, '1z0-820', '1z0-820: Upgrade to Oracle Solaris 11 System Administrator', 9, NULL, NULL),
(276, '1z0-821', '1z0-821: Oracle Solaris 11 System Administration', 9, NULL, NULL),
(277, '1z0-829', '1z0-829: Java SE 17 Developer Popular', 9, NULL, NULL),
(278, '1z0-851', '1z0-851: Java SE 6 Programmer Certified Professional', 9, NULL, NULL),
(279, '1z0-882', '1z0-882: MySQL 5.6 Developer', 9, NULL, NULL),
(280, '1z0-883', '1z0-883: MySQL 5.6 Database Administrator', 9, NULL, NULL),
(281, '1z0-888', '1z0-888: MySQL 5.7 Database Administrator', 9, NULL, NULL),
(282, '1z0-895', '1z0-895: Java EE 6 Enterprise JavaBeans Developer Certified Expert', 9, NULL, NULL),
(283, '1z0-897', '1z0-897: Java EE 6 Web Services Developer Certified Expert', 9, NULL, NULL),
(284, '1z0-898', '1z0-898: Java EE 6 Java Persistence API Developer Certified Expert', 9, NULL, NULL),
(285, '1z0-899', '1z0-899: Java EE 6 Web Component Developer Certified Expert', 9, NULL, NULL),
(286, '1z0-900', '1z0-900: Java EE 7 Application Developer', 9, NULL, NULL),
(287, '1z0-902', '1z0-902: Oracle Exadata Database Machine X9M Implementation Essentials', 9, NULL, NULL),
(288, '1z0-908', '1z0-908: MySQL 8.0 Database Administrator', 9, NULL, NULL),
(289, '1z0-915', '1z0-915-1: MySQL HeatWave Implementation Associate Rel 1', 9, NULL, NULL),
(290, '1z0-931', '1z0-931: Oracle Autonomous Database Cloud 2019 Specialist', 9, NULL, NULL),
(291, '1z0-931-20', '1z0-931-20: Oracle Autonomous Database Cloud 2020 Specialist', 9, NULL, NULL),
(292, '1z0-931-23', '1z0-931-23: Oracle Autonomous Database Cloud 2023 Professional', 9, NULL, NULL),
(293, '1z0-932', '1z0-932: Oracle Cloud Infrastructure 2018 Architect Associate', 9, NULL, NULL),
(294, '1z0-961', '1z0-961: Oracle Financials Cloud Payables 2017 Implementation Essentials', 9, NULL, NULL),
(295, '1z0-962', '1z0-962: Oracle Financials Cloud Receivables 2017 Implementation Essentials', 9, NULL, NULL),
(296, '1z0-963', 'Oracle Procurement Cloud 2017 Implementation Essentials', 9, NULL, NULL),
(297, '1z0-964', 'Oracle Project Portfolio Management Cloud 2017 Implementation Essentials', 9, NULL, NULL),
(298, '1z0-965', 'Oracle Global Human Resources Cloud 2017 Implementation Essentials', 9, NULL, NULL),
(299, '1z0-966', ': Oracle Talent Management Cloud 2017 Implementation Essentials', 9, NULL, NULL),
(300, '1z0-969', 'Oracle Payroll Cloud 2017 Implementation Essentials', 9, NULL, NULL),
(301, '1z0-970', 'Oracle Sales Cloud 2017 Implementation Essentials', 9, NULL, NULL),
(302, '1z0-982', 'Oracle Enterprise Planning and Budgeting Cloud Service 2017 Implementation Essentials', 9, NULL, NULL),
(303, '1z0-993', 'Oracle Engagement Cloud 2018 Implementation Essentials', 9, NULL, NULL),
(304, '1z0-997-20', 'Oracle Cloud Infrastructure 2020 Architect Professional', 9, NULL, NULL),
(305, '1z0-997-22', 'Oracle Cloud Infrastructure 2022 Architect Professional', 9, NULL, NULL),
(306, 'PCCSE', 'Prisma Certified Cloud Security Engineer', 10, NULL, NULL),
(307, 'PCCET', 'Palo Alto Networks Certified Cybersecurity Entry-level Technician', 10, NULL, NULL),
(308, 'PCNSA', 'Palo Alto Networks Certified Network Security Administrator', 10, NULL, NULL),
(309, 'PCNSE', 'Palo Alto Networks Certified Network Security Engineer', 10, NULL, NULL),
(310, 'PCSFE', 'Palo Alto Networks Certified Software Firewall Engineer', 10, NULL, NULL),
(311, 'PCSAE', 'Palo Alto Networks Certified Security Automation Engineer', 10, NULL, NULL),
(312, 'PCDRA', 'Palo Alto Networks Certified Detection and Remediation Analyst', 10, NULL, NULL),
(313, 'PSM-1', 'PSM I: Professional Scrum Master I', 11, NULL, NULL),
(314, 'PSM-II', 'PSM II: Professional Scrum Master II', 11, NULL, NULL),
(315, 'PSPO-I', 'PSPO I: Professional Scrum Product Owner', 11, NULL, NULL),
(316, 'PSPO-II', 'PSPO II: Professional Scrum Product Owner', 11, NULL, NULL),
(317, 'CSM', 'Certified Scrum Master', 12, NULL, NULL),
(318, 'TIVATE13', 'SAPCertifiedAssociate-SAPActivateProjectManager', 13, NULL, NULL),
(319, 'C_ACTIVATE22', 'SAPCertifiedAssociate-SAPActivateProjectManager', 13, NULL, NULL),
(320, 'C_ARSOR_2202', 'SAPCertifiedApplicationAssociate-SAPAribaSourcing', 13, NULL, NULL),
(321, 'C_CPI_14', 'SAPCertifiedDevelopmentAssociate-SAPIntegrationSuite', 13, NULL, NULL),
(322, 'C_FIOAD_202', 'SAPCertifiedAssociate-SAPFioriSystemAdministration', 13, NULL, NULL),
(323, 'C_HANATEC_17', 'SAPCertifiedTechnologyAssociate-SAPHANA2.0SPS05', 13, NULL, NULL),
(324, 'C_HANATEC_18', 'SAPCertifiedTechnologyAssociate-SAPHANA2.0SPS06', 13, NULL, NULL),
(325, 'C_HCMP_2311', 'SAPCertifiedAssociate-SAPHCMPayrollforSAPS/4HANA', 13, NULL, NULL),
(326, 'C_S4CFI_2202', 'SAPCertifiedApplicationAssociate-SAPS/4HANACloud(public)-FinanceImplementation', 13, NULL, NULL),
(327, 'C_S4EWM_2020', 'SAPCertifiedAssociate-ExtendedWarehouseManagementwithSAPS/4HANA', 13, NULL, NULL),
(328, 'C_S4TM_2020', 'SAPCertifiedAssociate-TransportationManagementinSAPS/4HANA', 13, NULL, NULL),
(329, 'C_SAC_2221', 'SAPCertifiedApplicationAssociate-SAPAnalyticsCloud', 13, NULL, NULL),
(330, 'C_SECAUTH_20', 'SAPCertifiedTechnologyAssociate-SAPSystemSecurityandAuthorizations', 13, NULL, NULL),
(331, 'C_TADM_23', 'SAPCertifiedTechnologyConsultant-SAPS/4HANASystemAdministration', 13, NULL, NULL),
(332, 'C_TAW12_750', 'SAPCertifiedDevelopmentAssociate-ABAPwithSAPNetWeaver7.50', 13, NULL, NULL),
(333, 'C_TFIN52_64', 'SAPCertifiedApplicationAssociate-FinancialAccountingwithSAPERP6.0EHP4', 13, NULL, NULL),
(334, 'C_TFIN52_67', 'SAPCertifiedApplicationAssociate-FinancialAccountingwithSAPERP6.0EhP7', 13, NULL, NULL),
(335, 'C_THR12_67', 'SAPCertifiedApplicationAssociate-SAPHCMwithERP6.0EHP7', 13, NULL, NULL),
(336, 'C_THR81_2205', 'SAPCertifiedApplicationAssociate-SAPSuccessFactorsEmployeeCentralCore1H/2022', 13, NULL, NULL),
(337, 'C_TPLM30_67', 'SAPCertifiedApplicationAssociate-SAPMaintenance&RepairwithERP6.0EHP7', 13, NULL, NULL),
(338, 'C_TS413_1909', 'SAPCertifiedApplicationAssociate–SAPS/4HANAAssetManagement', 13, NULL, NULL),
(339, 'C_TS413_2021', 'SAPCertifiedApplicationAssociate-SAPS/4HANAAssetManagement', 13, NULL, NULL),
(340, 'C_TS450_2020', 'SAPCertifiedApplicationAssociate-SAPS/4HANASourcingandProcurement-UpskillingforERPExperts', 13, NULL, NULL),
(341, 'C_TS452_2021', 'SAPCertifiedApplicationAssociate-SAPS/4HANASourcingandProcurement', 13, NULL, NULL),
(342, 'C_TS452_2022', 'SAPCertifiedAssociate-SAPS/4HANASourcingandProcurement', 13, NULL, NULL),
(343, 'C_TS462_2020', 'SAPCertifiedApplicationAssociate–SAPS/4HANASales2020', 13, NULL, NULL),
(344, 'C_TS462_2021', 'SAPCertifiedApplicationAssociate–SAPS/4HANASales2021', 13, NULL, NULL),
(345, 'C_TS462_2022', 'SAPCertifiedApplicationAssociate-SAPS/4HANASales2022', 13, NULL, NULL),
(346, 'C_TS4FI_2020', 'SAPCertifiedApplicationAssociate-SAPS/4HANAforFinancialAccountingAssociates(SAPS/4HANA2020)', 13, NULL, NULL),
(347, 'C_TSCM52_67', 'SAPCertifiedApplicationAssociate-ProcurementwithSAPERP6.0EhP7', 13, NULL, NULL),
(348, 'C_TSCM62_67', 'SAPCertifiedApplicationAssociate–SalesandDistribution,ERP6.0EhP7', 13, NULL, NULL),
(349, 'E_ACTCLD_21', 'SAPCertifiedSpecialist-SAPActivateforCloudSolutionsProjectManager', 13, NULL, NULL),
(350, 'E_HANAAW_17', 'SAPCertifiedDevelopmentSpecialist-ABAPforSAPHANA2.0', 13, NULL, NULL),
(351, 'E_S4CPE_2023', 'SAPCertifiedSpecialist-SAPS/4HANACloud,privateeditionimplementationwithSAPActivate', 13, NULL, NULL),
(352, 'E_S4HCON2023', 'SAPCertifiedSpecialist-SAPS/4HANAConversionandSAPSystemUpgrade', 13, NULL, NULL),
(353, 'P_S4FIN_2021', 'SAPCertifiedApplicationProfessional-FinancialsinSAPS/4HANAforSAPERPFinanceExperts(SAPS/4HANA2021)', 13, NULL, NULL),
(354, 'CAD', 'CADServiceNowCertifiedApplicationDeveloperPopular', 14, NULL, NULL),
(355, 'CAS-PA', 'CertifiedApplicationSpecialist–PerformanceAnalytics', 14, NULL, NULL),
(356, 'CIS-APM', 'CertifiedImplementationSpecialist-ApplicationPortfolioManagement', 14, NULL, NULL),
(357, 'CIS-CPG', 'CertifiedImplementationSpecialist-CloudProvisioningandGovernance', 14, NULL, NULL),
(358, 'CIS-CSM', 'CertifiedImplementationSpecialist-CustomerServiceManagementPopular', 14, NULL, NULL),
(359, 'CIS', 'DiscoveryCertifiedImplementationSpecialist-Discovery', 14, NULL, NULL),
(360, 'CIS-EM', 'CertifiedImplementationSpecialist-EventMangement', 14, NULL, NULL),
(361, 'CIS-FSM', 'CertifiedImplementationSpecialist-FieldServiceMangement', 14, NULL, NULL),
(362, 'CIS-HAM', 'CertifiedImplementationSpecialist–HardwareAssetManagement', 14, NULL, NULL),
(363, 'CIS-HR', 'CertifiedImplementationSpecialist-HumanResourcesPopular', 14, NULL, NULL),
(364, 'CIS-ITSM', 'CertifiedImplementationSpecialist-ITServiceManagementPopular', 14, NULL, NULL),
(365, 'CIS-PPM', 'CertifiedImplementationSpecialist-ProjectPortfolioManagement', 14, NULL, NULL),
(366, 'CIS-RC', 'CertifiedImplementationSpecialist-RiskandCompliancePopular', 14, NULL, NULL),
(367, 'CIS-SAM', 'CertifiedImplementationSpecialist-SoftwareAssetManagement', 14, NULL, NULL),
(368, 'CIS-SIR', 'CertifiedImplementationSpecialist-SecurityIncidentResponse', 14, NULL, NULL),
(369, 'CIS-SM', 'CertifiedImplementationSpecialist-ServiceMapping', 14, NULL, NULL),
(370, 'CIS-VR', 'CertifiedImplementationSpecialist-VulnerabilityResponse', 14, NULL, NULL),
(371, 'CIS-VRM', 'CertifiedImplementationSpecialist-VendorRiskManagement', 14, NULL, NULL),
(372, 'CSA', 'ServiceNowCertifiedSystemAdministrator', 14, NULL, NULL),
(373, 'SPLK-1001', 'SplunkCoreCertifiedUserPopular', 15, NULL, NULL),
(374, 'SPLK-1002', 'SplunkCoreCertifiedPowerUserPopular', 15, NULL, NULL),
(375, 'SPLK-1003', 'SplunkEnterpriseCertifiedAdminPopular', 15, NULL, NULL),
(376, 'SPLK-1004', 'SplunkCoreCertifiedAdvancedPowerUser', 15, NULL, NULL),
(377, 'SPLK-1005', 'SplunkCloudCertifiedAdmin', 15, NULL, NULL),
(378, 'SPLK-2001', 'SplunkCertifiedDeveloper', 15, NULL, NULL),
(379, 'SPLK-2002', 'SplunkEnterpriseCertifiedArchitect', 15, NULL, NULL),
(380, 'SPLK-2003', 'SplunkSOARCertifiedAutomationDeveloper', 15, NULL, NULL),
(381, 'SPLK-3001', 'SplunkEnterpriseSecurityCertifiedAdmin', 15, NULL, NULL),
(382, 'SPLK-3002', 'SplunkITServiceIntelligenceCertifiedAdmin', 15, NULL, NULL),
(383, 'SPLK-3003', 'SplunkCoreCertifiedConsultant', 15, NULL, NULL),
(384, 'SPLK-4001', 'SplunkO11yCloudCertifiedMetricsUser', 15, NULL, NULL),
(385, 'SPLK-5001', 'SplunkCertifiedCybersecurityDefenseA', 15, NULL, NULL),
(386, '', 'PRINCE2 Agile Foundation: PRINCE2 Agile Foundation', 16, NULL, NULL),
(387, '', 'PRINCE2-Foundation: PRINCE2 Foundation Popular', 16, NULL, NULL),
(388, '', 'PRINCE2-Practitioner: PRINCE2 Practitioner Edition 7', 16, NULL, NULL),
(389, '', 'PRINCE2-Practitioner Edition 6: PRINCE2 Practitioner Edition 6', 16, NULL, NULL),
(390, '1V0-21.20', 'AssociateVMwareDataCenterVirtualization', 17, NULL, NULL),
(391, '1V0-31.21', 'AssociateVMwareCloudManagementAutomation', 17, NULL, NULL),
(392, '1V0-41.20', 'AssociateVMwareNetworkVirtualization', 17, NULL, NULL),
(393, '1V0-601', 'VMwareCertifiedAssociate6-DataCenterVirtualizationFundamentals', 17, NULL, NULL),
(394, '1V0-603', 'CertificationVMwareCertifiedAssociate6-CloudManagementandAutomationFundamentals', 17, NULL, NULL),
(395, '1V0-605', 'VMwareCertifiedAssociate6-DesktopandMobilityFundamentals', 17, NULL, NULL),
(396, '1V0-642', 'VMwareCertifiedAssociate6-NetworkVisualizationFundamentalsExam', 17, NULL, NULL),
(397, '1V0-701', 'VMwareCertifiedAssociate-DigitalBusinessTransformation(VCA-DBT)', 17, NULL, NULL),
(398, '1V0-71.21', 'AssociateVMwareApplicationModernization', 17, NULL, NULL),
(399, '1V0-81.20', 'AssociateVMwareSecurity', 17, NULL, NULL),
(400, '2V0-01.19', 'VMwarevSphere6.7FoundationsExam2019', 17, NULL, NULL),
(401, '2V0-21.19', 'ProfessionalvSphere6.7Exam2019', 17, NULL, NULL),
(402, '2V0-21.19D', 'ProfessionalvSphere6.7DeltaExam2019', 17, NULL, NULL),
(403, '2V0-21.19', 'PSEProfessionalvSphere6.7Exam2019', 17, NULL, NULL),
(404, '2V0-21.20', 'ProfessionalVMwarevSphere7.x', 17, NULL, NULL),
(405, '2V0-21.23', 'VMwarevSphere8.xProfessionalPopular', 17, NULL, NULL),
(406, '2V0-31.19', 'ProfessionalVMwarevRealizeAutomation7.6', 17, NULL, NULL),
(407, '2V0-31.20', 'ProfessionalVMwarevRealizeAutomation8.1', 17, NULL, NULL),
(408, '2V0-31.21', 'ProfessionalVMwarevRealizeAutomation8.3', 17, NULL, NULL),
(409, '2V0-31.23', 'VMwareAriaAutomation8.10Professional', 17, NULL, NULL),
(410, '2V0-33.22', 'VMwareCloudProfessional', 17, NULL, NULL),
(411, '2V0-41.19', 'VMwareProfessionalNSX-TDataCenter2.4', 17, NULL, NULL),
(412, '2V0-41.20', 'ProfessionalVMwareNSX-TDataCenter', 17, NULL, NULL),
(413, '2V0-41.23', 'VMwareNSX4.xProfessional', 17, NULL, NULL),
(414, '2V0-51.19', 'VMwareProfessionalHorizon7.7Exam2019', 17, NULL, NULL),
(415, '2V0-51.21', 'ProfessionalVMwareHorizon8.x', 17, NULL, NULL),
(416, '2V0-51.23', 'VMwareHorizon8.xProfessional', 17, NULL, NULL),
(417, '2V0-602', 'vSphere6.5Foundations', 17, NULL, NULL),
(418, '2V0-61.19', 'VMwareProfessionalWorkspaceONEExam2019', 17, NULL, NULL),
(419, '2V0-61.20', 'VMwareProfessionalWorkspaceONEExam', 17, NULL, NULL),
(420, '2V0-620', 'vSphere6Foundations', 17, NULL, NULL),
(421, '2V0-621', 'VMwareCertifiedProfessional6-DataCenterVirtualization', 17, NULL, NULL),
(422, '2V0-621D', 'VMwareCertifiedProfessional6-DataCenterVirtualizationDelta', 17, NULL, NULL),
(423, '2V0-622', 'VMwareCertifiedProfessional6.5-DataCenterVirtualization', 17, NULL, NULL),
(424, '2V0-62.21', 'ProfessionalVMwareWorkspaceONE21.X', 17, NULL, NULL),
(425, '2V0-62.23', 'VMwareWorkspaceONE22.XProfessional', 17, NULL, NULL),
(426, '2V0-622D', 'VMwareCertifiedProfessional6.5-DataCenterVirtualizationDelta', 17, NULL, NULL),
(427, '2V0-631', 'VMwareCertifiedProfessional6-CloudManagementandAutomationBeta', 17, NULL, NULL),
(428, '2V0-642', 'VMwareCertifiedProfessional6-NetworkVirtualization(NSXv6.2)', 17, NULL, NULL),
(429, '2V0-651', 'VMwareCertifiedProfessional6-DesktopandMobilityBeta', 17, NULL, NULL),
(430, '2V0-71.21', 'ProfessionalVMwareApplicationModernization', 17, NULL, NULL),
(431, '2V0-71.23', 'VMwareTanzuforKubernetesOperationsProfessional', 17, NULL, NULL),
(432, '2V0-72.22', 'ProfessionalDevelopVMwareSpring', 17, NULL, NULL),
(433, '2V0-731', 'VMwareCertifiedProfessional7-CloudManagementandAutomation', 17, NULL, NULL),
(434, '2V0-751', 'VMwareCertifiedProfessional7-DesktopandMobilityExam', 17, NULL, NULL),
(435, '2V0-81.20', 'ProfessionalVMwareSecurity', 17, NULL, NULL),
(436, '2VB-601', 'VMwareSpecialistvSAN6.xExam', 17, NULL, NULL),
(437, '2VB-602', 'VMwareSpecialistvRealizeOperations6.xExam', 17, NULL, NULL),
(438, '3V0-21.21', 'AdvancedDesignVMwarevSphere7.x', 17, NULL, NULL),
(439, '3V0-32.21', 'AdvancedDesignVMwareCloudManagementandAutomation', 17, NULL, NULL),
(440, '3V0-42.20', 'AdvancedDesignVMwareNSX-TDataCenter', 17, NULL, NULL),
(441, '3V0-622', 'VMwareCertifiedAdvancedProfessional6-DataCenterVirtualizationDesign', 17, NULL, NULL),
(442, '3V0-624', 'VMwareCertifiedAdvancedProfessional6.5-DataCenterVirtualizationDesign', 17, NULL, NULL),
(443, '3V0-732', 'VMwareCertifiedAdvancedProfessional7-CloudManagementandAutomationDesignExam', 17, NULL, NULL),
(444, '3V0-752', 'VMwareCertifiedAdvancedProfessional7-DesktopandMobilityDesign', 17, NULL, NULL),
(445, '5V0-11.21', 'VMwareCloudonAWSMasterSpecialist', 17, NULL, NULL),
(446, '5V0-21.19', 'VMwarevSAN6.7SpecialistExam2019', 17, NULL, NULL),
(447, '5V0-21.20', 'VMwareHCIMasterSpecialist', 17, NULL, NULL),
(448, '5V0-21.21', 'VMwareHCIMasterSpecialist', 17, NULL, NULL),
(449, '5V0-22.21', 'VMwarevSAN6.7Specialist', 17, NULL, NULL),
(450, '5V0-22.23', 'VMwarevSANSpecialistv2', 17, NULL, NULL),
(451, '5V0-23.20', 'VMwarevSpherewithTanzuSpecialist', 17, NULL, NULL),
(452, '5V0-31.19', 'VMwareCloudonAWSManagementExam2019', 17, NULL, NULL),
(453, '5V0-31.20', 'VMwareCloudFoundationSpecialist', 17, NULL, NULL),
(454, '5V0-31.22', 'VMwareCloudFoundationSpecialist(v2)', 17, NULL, NULL),
(455, '5V0-32.19', 'VMwareCloudProviderSpecialistExam2019', 17, NULL, NULL),
(456, '5V0-32.21', 'VMwareCloudProviderSpecialist', 17, NULL, NULL),
(457, '5V0-33.19', 'VMwareCloudonAWS-MasterServicesCompetencySpecialistExam2019', 17, NULL, NULL),
(458, '5V0-34.19', 'VMwarevRealizeOperations7.5', 17, NULL, NULL),
(459, '5V0-35.21', 'VMwarevRealizeOperationsSpecialist', 17, NULL, NULL),
(460, '5V0-42.21', 'VMwareSD-WANDesignandDeploySkills', 17, NULL, NULL),
(461, '5V0-61.19', 'WorkspaceONEUnifiedEndpointManagementSpecialist', 17, NULL, NULL),
(462, '5V0-61.22', 'VMwareWorkspaceONE21.XAdvancedIntegrationSpecialist', 17, NULL, NULL),
(463, '5V0-62.19', 'VMwareWorkspaceONEDesignandAdvancedIntegrationSpecialist', 17, NULL, NULL),
(464, '5V0-62.22', 'VMwareWorkspaceONE21.XUEMTroubleshootingSpecialist', 17, NULL, NULL),
(465, '5V0-91.20', 'VMwareCarbonBlackPortfolioSkills', 17, NULL, NULL),
(466, '5V0-93.22', 'VMwareCarbonBlackCloudEndpointStandardSkills', 17, NULL, NULL),
(467, 'SCA-C01', 'Tableau Server Certified Associate', 18, NULL, NULL),
(468, 'TDA-C01', 'Tableau Certified Data Analyst', 18, NULL, NULL),
(469, 'TDS-C01', 'Tableau Desktop Specialist', 18, NULL, NULL),
(470, 'JN0-102', 'JuniperNetworksCertifiedAssociateJunos(JNCIA-Junos)', 19, NULL, NULL),
(471, 'JN0-103', 'Junos,Associate(JNCIA-Junos)', 19, NULL, NULL),
(472, 'JN0-104', 'Junos,Associate(JNCIA-Junos)', 19, NULL, NULL),
(473, 'JN0-105', 'Junos,Associate(JNCIA-Junos)Popular', 19, NULL, NULL),
(474, 'JN0-1100', 'JuniperNetworksCertifiedDesignAssociate(JNCDA)', 19, NULL, NULL),
(475, 'JN0-1101', 'JuniperNetworksCertifiedDesignAssociate(JNCDA)', 19, NULL, NULL),
(476, 'JN0-1300', 'JuniperNetworksCertifiedDesignSpecialistDataCenter(JNCDS-DC)', 19, NULL, NULL),
(477, 'JN0-1301', 'DataCenterDesign,Specialist(JNCDS-DC)', 19, NULL, NULL),
(478, 'JN0-1302', 'DataCenterDesign,Specialist(JNCDS-DC)', 19, NULL, NULL),
(479, 'JN0-1330', 'SecurityDesignSpecialist(JNCDS-SEC)', 19, NULL, NULL),
(480, 'JN0-1331', 'SecurityDesign,Specialist(JNCDS-SEC)', 19, NULL, NULL),
(481, 'JN0-210', 'Cloud Associate', 19, NULL, NULL),
(482, 'JN0-211', 'Cloud, Associate', 19, NULL, NULL),
(483, 'JN0-213', 'Cloud, Associate (JNCIA-Cloud)', 19, NULL, NULL),
(484, 'JN0-220', 'Automation and DevOps, Associate (JNCIA-DevOps)', 19, NULL, NULL),
(485, 'JN0-221', 'Automation and DevOps, Associate', 19, NULL, NULL),
(486, 'JN0-223', 'Automation and DevOps, Associate (JNCIA-DevOps)', 19, NULL, NULL),
(487, 'JN0-230', 'Security, Associate (JNCIA-SEC)', 19, NULL, NULL),
(488, 'JN0-231', 'Security, Associate (JNCIA-SEC)', 19, NULL, NULL),
(489, 'JN0-250', 'Mist AI, Associate (JNCIA-MistAI)', 19, NULL, NULL),
(490, 'JN0-251', 'Mist AI, Associate (JNCIA-MistAI)', 19, NULL, NULL),
(491, 'JN0-252', 'Mist AI, Associate (JNCIA-MistAI)', 19, NULL, NULL),
(492, 'JN0-333', 'SecuritySpecialist(JNCIS-SEC)', 19, NULL, NULL),
(493, 'JN0-334', 'Security,Specialist', 19, NULL, NULL),
(494, 'JN0-335', 'Security,Specialist(JNCIS-SEC)', 19, NULL, NULL),
(495, 'JN0-347', 'EnterpriseRoutingandSwitching,Specialist(JNCIS-ENT)', 19, NULL, NULL),
(496, 'JN0-348', 'EnterpriseRoutingandSwitching,Specialist', 19, NULL, NULL),
(497, 'JN0-349', 'EnterpriseRoutingandSwitching,Specialist(JNCIS-ENT)', 19, NULL, NULL),
(498, 'JN0-351', 'EnterpriseRoutingandSwitching,Specialist(JNCIS-ENT)Popular', 19, NULL, NULL),
(499, 'JN0-360', 'JuniperNetworksCertifiedInternetSpecialistSP(JNCIS-SP)', 19, NULL, NULL),
(500, 'JN0-361', 'ServiceProviderRoutingandSwitchingSpecialist(JNCIS-SP)', 19, NULL, NULL),
(501, 'JN0-362', 'ServiceProviderRoutingandSwitching,Specialist', 19, NULL, NULL),
(502, 'JN0-363', 'ServiceProviderRoutingandSwitching,Specialist(JNCIS-SP)Popular', 19, NULL, NULL),
(503, 'JN0-410', 'JuniperNetworks-SDNandAutomationSpecialist', 19, NULL, NULL),
(504, 'JN0-411', 'EnterpriseCloudSpecialist', 19, NULL, NULL),
(505, 'JN0-412', 'Cloud,Specialist(JNCIS-Cloud)', 19, NULL, NULL),
(506, 'JN0-420', 'AutomationandDevOpsSpecialist', 19, NULL, NULL),
(507, 'JN0-451', 'MistAI,Specialist(JNCIS-MistAI)', 19, NULL, NULL),
(508, 'JN0-533', 'JuniperNetworksCertifiedSpecialistFWV(JNCIS-FWV)', 19, NULL, NULL),
(509, 'JN0-633', 'JuniperNetworksCertifiedProfessionalSecurity(JNCIP-SEC)', 19, NULL, NULL),
(510, 'JN0-634', 'SecurityProfessional(JNCIP-SEC)', 19, NULL, NULL),
(511, 'JN0-635', 'Security,Professional', 19, NULL, NULL),
(512, 'JN0-643', 'JuniperNetworksCertifiedProfessionalEnterpriseRoutingandSwitching(JNCIP-ENT)', 19, NULL, NULL),
(513, 'JN0-647', 'EnterpriseRoutingandSwitchingProfessional(JNCIP-ENT)', 19, NULL, NULL),
(514, 'JN0-648', 'EnterpriseRoutingandSwitching,Professional(JNCIP-ENT)', 19, NULL, NULL),
(515, 'JN0-649', 'EnterpriseRoutingandSwitching,Professional(JNCIP-ENT)', 19, NULL, NULL),
(516, 'JN0-660', 'JuniperNetworksCertifiedInternetProfessionalSP(JNCIP-SP)', 19, NULL, NULL),
(517, 'JN0-661', 'ServiceProviderRoutingandSwitching', 19, NULL, NULL),
(518, 'JN0-662', 'ServiceProviderRoutingandSwitching,Professional', 19, NULL, NULL),
(519, 'JN0-663', 'ServiceProviderRoutingandSwitching,Professional(JNCIP-SP)', 19, NULL, NULL),
(520, 'JN0-664', 'ServiceProviderRoutingandSwitching,Professional(JNCIP-SP)Popular', 19, NULL, NULL),
(521, 'JN0-680', 'DataCenterProfessional', 19, NULL, NULL),
(522, 'JN0-681', 'NewDataCenter,Professional', 19, NULL, NULL),
(523, 'JN0-682', 'DataCenter,Professional(JNCIP-DC)', 19, NULL, NULL),
(524, 'JN0-696', 'JuniperNetworksCertifiedSupportProfessionalSecurity(JNCSP-SEC', 19, NULL, NULL),
(525, '156-110', 'CheckPointCertifiedSecurityPrinciplesAssociate(CCSPA)', 20, NULL, NULL),
(526, '156-115.77', 'CheckPointCertifiedSecurityMaster', 20, NULL, NULL),
(527, '156-215.77', 'CheckPointCertifiedSecurityAdministrator', 20, NULL, NULL),
(528, '156-215.80', 'CheckPointCertifiedSecurityAdministrator(CCSAR80)', 20, NULL, NULL),
(529, '156-215.81', 'CheckPointCertifiedSecurityAdministratorR81', 20, NULL, NULL),
(530, '156-215.81.20', 'CheckPointCertifiedSecurityAdministrator–R81.20(CCSA)Popular', 20, NULL, NULL),
(531, '156-315.77', 'CheckPointCertifiedSecurityExpert', 20, NULL, NULL),
(532, '156-315.80', 'CheckPointCertifiedSecurityExpert-R80', 20, NULL, NULL),
(533, '156-315.81', 'CheckPointCertifiedSecurityExpertR81', 20, NULL, NULL),
(534, '156-315.81.20', 'CheckPointCertifiedSecurityExpert-R81.20Popular', 20, NULL, NULL),
(535, '156-560', 'CheckPointCertifiedCloudSpecialist(CCCS)', 20, NULL, NULL),
(536, '156-585', 'CheckPointCertifiedTroubleshootingExpert', 20, NULL, NULL),
(537, '156-586', 'CheckPointCertifiedTroubleshootingExpert', 20, NULL, NULL),
(538, '156-835', 'CheckPointCertifiedMaestroExpert', 20, NULL, NULL),
(539, '156-915.77', 'CheckPointCertifiedSecurityExpertUpdate', 20, NULL, NULL),
(540, '156-915.80', 'CCSEUpdateR80', 20, NULL, NULL),
(541, 'CCAK', 'CertificateofCloudAuditingKnowledge', 21, NULL, NULL),
(542, 'CDPSE', 'CertifiedDataPrivacySolutionsEngineer', 21, NULL, NULL),
(543, 'CGEIT', 'CertifiedintheGovernanceofEnterpriseIT', 21, NULL, NULL),
(544, 'CISA', 'CertifiedInformationSystemsAuditorPopular', 21, NULL, NULL),
(545, 'CISM', 'CertifiedInformationSecurityManagerPopular', 21, NULL, NULL),
(546, 'COBIT 2019', 'COBIT2019Foundation', 21, NULL, NULL),
(547, 'COBIT 5', 'ABusinessFrameworkfortheGovernanceandManagementofEnterpriseIT', 21, NULL, NULL),
(548, 'CRISC', 'CertifiedinRiskandInformationSystemsControlPopular', 21, NULL, NULL),
(549, 'ATA', 'AdvancedTestAnalyst', 22, NULL, NULL),
(550, 'ATM', 'AdvancedTestManager', 22, NULL, NULL),
(551, 'ATTA', 'AdvancedTechnicalTestAnalyst', 22, NULL, NULL),
(552, 'CTAL-TA', 'CertifiedTesterAdvancedLevel-TestAnalystV3.1', 22, NULL, NULL),
(553, 'CTAL-TM', 'ISTQB-CertifiedTesterAdvancedLevel,TestManager', 22, NULL, NULL),
(554, 'CTAL-TTA', 'CertifiedTesterAdvancedLevelTechnicalTestAnalyst', 22, NULL, NULL),
(555, 'CTFL-2018', 'ISTQBCertifiedTesterFoundationLevel2018', 22, NULL, NULL),
(556, 'CTFL-AT', 'CertifiedTesterFoundationLevelAgileTester', 22, NULL, NULL),
(557, 'CTFL v4.0', 'CertifiedTesterFoundationLevel(CTFL)v4.0', 22, NULL, NULL),
(558, 'CT-TAE', 'CertifiedTesterTestAutomationEngineer', 22, NULL, NULL),
(559, 'ISTQB - Agile Public', 'ISTQB-AgilePublic', 22, NULL, NULL),
(560, 'CTAL-TM_Syll2012', 'ISTQBCertifiedTesterAdvancedLevel-TestManager[Syllabus2012]', 23, NULL, NULL),
(561, 'CTFL: 001_ISTQB', 'CertifiedTesterFoundationLevel(CTFL_001)', 23, NULL, NULL),
(562, 'IREB-IT-CQ03', 'CertifiedProfessionalforRequirementsEngineering-FoundationLevelExamination', 23, NULL, NULL),
(563, 'ITILV4', 'ITILV4 FOUNDATION', 24, NULL, NULL),
(564, 'HFCP', 'Hyperledger Fabric Certified Practitioner', 25, NULL, NULL),
(565, 'KCNA', 'Kubernetes and Cloud Native Associate Popular', 25, NULL, NULL),
(566, 'LFCA', 'Linux Foundation Certified IT Associate', 25, NULL, NULL),
(567, 'LFCS', 'Linux Foundation Certified System Administrator', 25, NULL, NULL),
(568, '1Y0-203', 'CitrixXenAppandXenDesktop7.15Administration', 26, NULL, NULL),
(569, '1Y0-204', 'CitrixVirtualAppsandDesktops7Administration', 26, NULL, NULL),
(570, '1Y0-230', 'CitrixNetScaler12EssentialsandUnifiedGateway', 26, NULL, NULL),
(571, '1Y0-231', 'DeployandManageCitrixADC13withCitrixGateway', 26, NULL, NULL),
(572, '1Y0-240', 'CitrixNetScaler12EssentialsandTrafficManagement', 26, NULL, NULL),
(573, '1Y0-241', 'DeployandManageCitrixADC13withTrafficManagement', 26, NULL, NULL),
(574, '1Y0-311', 'CitrixXenAppandXenDesktop7.15AdvancedAdministrationExam', 26, NULL, NULL),
(575, '1Y0-312', 'CitrixVirtualAppsandDesktops7AdvancedAdministration', 26, NULL, NULL),
(576, '1Y0-340', 'NetScaler', 26, NULL, NULL),
(577, '1Y0-341', 'CitrixADCAdvancedTopics-Security,Management,andOptimization', 26, NULL, NULL),
(578, '1Y0-371', 'DesigningDeployingandManagingCitrixXenMobile10EnterpriseSolutions', 26, NULL, NULL),
(579, '1Y0-401', 'DesigningCitrixXenDesktop7.6Solutions', 26, NULL, NULL),
(580, '1Y0-402', 'CitrixXenAppandXenDesktop7.15Assessment,Design,andAdvancedConfigurations', 26, NULL, NULL),
(581, '1Y0-403', 'CitrixVirtualAppsandDesktops7Assessment,DesignandAdvancedConfigurations', 26, NULL, NULL),
(582, '1Y0-440', 'ArchitectingaCitrixNetworkingSolution', 26, NULL, NULL),
(583, '1Y0-A20', 'CitrixXenApp6.5Administration', 26, NULL, NULL),
(584, 'AD01', 'Blue Prism Developer', 27, NULL, NULL),
(585, 'APD01', 'Blue Prism Professional Developer', 27, NULL, NULL),
(586, 'ARA01', 'Blue Prism ROM Architect', 27, NULL, NULL),
(587, 'ARA02', 'BluePrismCertifiedROMArchitectExam(Version2)', 27, NULL, NULL),
(588, 'ASD01', 'DesigningBluePrismProcessSolutions', 27, NULL, NULL),
(589, 'ATA02', 'DesigningaBluePrism(Version6.0)Environment', 27, NULL, NULL),
(590, 'ACD100', 'AppianCertifiedAssociateDeveloper', 28, NULL, NULL),
(591, 'ACD101', 'AppianAssociateDeveloper', 28, NULL, NULL),
(592, 'ACD200', 'AppianCertifiedSeniorDeveloper', 28, NULL, NULL),
(593, '9A0-381', 'AdobeAnalyticsBusinessPractitioner', 29, NULL, NULL),
(594, '9A0-384', 'AdobeExperienceManager6Developer', 29, NULL, NULL),
(595, '9A0-385', 'AdobeExperienceManager6.0Architect', 29, NULL, NULL),
(596, '9A0-389', 'AdobeCampaignDeveloper', 29, NULL, NULL),
(597, '9A0-397', 'AdobeExperienceManagerDevOpsEngineer', 29, NULL, NULL),
(598, '9A0-410', 'Adobe Experience Manager Forms Developer ACE Exam', 29, NULL, NULL),
(599, 'AD0-E100', 'Adobe Experience Manager Assets Developer', 29, NULL, NULL),
(600, 'AD0-E103', 'Adobe Experience Manager Developer', 29, NULL, NULL),
(601, 'AD0-E104', 'Adobe Experience Manager Architect', 29, NULL, NULL),
(602, 'AD0-E127', 'Adobe Experience Manager Forms Backend Developer Professional', 29, NULL, NULL),
(603, 'AD0-E134', 'Adobe Experience Manager Sites Developer Expert', 29, NULL, NULL),
(604, 'AD0-E208', 'Adobe Analytics Business Practitioner Expert', 29, NULL, NULL),
(605, 'AD0-E301', 'Campaign Standard Developer', 29, NULL, NULL),
(606, 'AD0-E556', 'Adobe Marketo Engage Architect Master', 29, NULL, NULL),
(607, 'AD0-E602', 'Adobe Real-Time CDP Business Practitioner Professional', 29, NULL, NULL),
(608, 'AD0-E603', 'Adobe Journey Optimizer Developer Expert', 29, NULL, NULL);
INSERT INTO `exams` (`id`, `exam_code`, `exam_name`, `vendor_id`, `created_at`, `updated_at`) VALUES
(609, 'AD0-E712', 'Adobe Commerce Business Practitioner Professional', 29, NULL, NULL),
(610, 'AD0-E716', 'Adobe Commerce Developer Expert', 29, NULL, NULL),
(611, 'AD0-E717', 'Adobe Commerce Developer Professional', 29, NULL, NULL),
(612, 'AD0-E718', 'Adobe Commerce Architect Master', 29, NULL, NULL),
(613, 'AD0-E720', 'Adobe Commerce Front-End Developer Expert', 29, NULL, NULL),
(614, 'AD0-E722', 'Adobe Commerce Architect Master', 29, NULL, NULL),
(615, 'AD7-E601', 'Adobe Real-Time CDP Technical Practitioner', 29, NULL, NULL),
(616, 'ACCP-v6.2', 'Aruba Certified Clearpass Professional v6.2', 30, NULL, NULL),
(617, 'ACMP_6.4', 'Aruba Certified Mobility Professional 6.4', 30, NULL, NULL),
(618, 'ICBB', 'IASSC Certified Lean Six Sigma Black Belt', 31, NULL, NULL),
(619, 'ICGB', 'IASSC Certified Lean Six Sigma Green Belt', 31, NULL, NULL),
(620, 'ICYB', 'IASSC Certified Lean Six Sigma Yellow Belt', 31, NULL, NULL),
(621, 'LSSBB', 'Lean Six Sigma Black Belt', 31, NULL, NULL),
(622, 'LSSGB', 'Lean Six Sigma Green Belt', 31, NULL, NULL),
(623, 'LSSMBB', 'Lean Six Sigma Master Black Belt', 31, NULL, NULL),
(624, 'LSSWB', 'Lean Six Sigma White Belt', 31, NULL, NULL),
(625, 'LSSYB', 'Lean Six Sigma Yellow Belt', 31, NULL, NULL),
(626, 'OGEA-101', 'TOGAF® Enterprise Architecture Part 1 Exam', 32, NULL, NULL),
(627, 'OGEA-102', 'TOGAF® Enterprise Architecture Part 2 Exam', 32, NULL, NULL),
(628, 'OGEA-103', 'TOGAF® Enterprise Architecture Combined Part 1 and Part 2 Exam', 32, NULL, NULL),
(629, 'OG0-091', 'TOGAF® 9 Part 1 Exam', 32, NULL, NULL),
(630, 'OG0-092', 'TOGAF® 9 Part 2 Exam', 32, NULL, NULL),
(631, 'OG0-093', 'TOGAF® 9 Combined Part 1 and Part 2 Exam', 32, NULL, NULL),
(632, 'COF-P02', 'Practice Exam: Core', 33, NULL, NULL),
(633, 'ADA-P01', 'Practice Exam: Administrator', 33, NULL, NULL),
(634, 'ARA-P01', 'Practice Exam: Architect', 33, NULL, NULL),
(635, 'DAA-P01', 'Practice Exam: Data Analyst', 33, NULL, NULL),
(636, 'DEA-P01', 'Practice Exam: Data Engineer', 33, NULL, NULL),
(637, 'DSA-P02', 'Practice Exam: Data Scientist', 33, NULL, NULL),
(638, 'COF-C02', 'SnowPro Core Certification Exam', 33, NULL, NULL),
(639, 'COF-R02', 'SnowPro Core Recertification Exam', 33, NULL, NULL),
(640, 'ADA-C01', 'SnowPro Advanced: Administrator Certification Exam', 33, NULL, NULL),
(641, 'ADA-R01', 'SnowPro Advanced: Administrator Recertification Exam', 33, NULL, NULL),
(642, 'ARA-C01', 'SnowPro Advanced: Architect Certification Exam', 33, NULL, NULL),
(643, 'ARA-R01', 'SnowPro Advanced: Architect Recertification Exam', 33, NULL, NULL),
(644, 'DAA-C01', 'SnowPro Advanced: Data Analyst Certification Exam', 33, NULL, NULL),
(645, 'DAA-R01', 'SnowPro Advanced: Data Analyst Recertification Exam', 33, NULL, NULL),
(646, 'DEA-C01', 'SnowPro Advanced: Data Engineer Certification Exam', 33, NULL, NULL),
(647, 'DEA-R01', 'SnowPro Advanced: Data Engineer Recertification Exam', 33, NULL, NULL),
(648, 'DSA-C02', 'SnowPro Advanced: Data Scientist Certification Exam', 33, NULL, NULL),
(649, 'DSA-R02', 'SnowPro Advanced: Data Scientist Recertification Exam', 33, NULL, NULL),
(650, 'PEGACPBA23V1', 'Certified Pega Business Architect \'23', 34, NULL, NULL),
(651, 'PEGACPBA88V1', 'Certified Pega Business Architect 8.8', 34, NULL, NULL),
(652, 'PEGACPCSD23V1', 'Certified Pega Customer Service Developer \'23', 34, NULL, NULL),
(653, 'PEGACPDC23V1', 'Certified Pega Decisioning Consultant 23', 34, NULL, NULL),
(654, 'PEGACPDC88V1', 'Certified Pega Decisioning Consultant 8.8', 34, NULL, NULL),
(655, 'PEGACPDS23V1', 'Certified Pega Data Scientist 23', 34, NULL, NULL),
(656, 'PEGACPDS88V1', 'Certified Pega Data Scientist 8.8', 34, NULL, NULL),
(657, 'PEGACPLSA23V1', 'Certified Pega Lead System Architecture (LSA) Exam 23', 34, NULL, NULL),
(658, 'PEGACPLSA88V1', 'Certified Pega Lead System Architecture Exam 8.8', 34, NULL, NULL),
(659, 'PEGACPRSA22V1', 'Certified Pega Robotics System Architect 22', 34, NULL, NULL),
(660, 'PEGACPSA23V1', 'Certified Pega System Architect \'23', 34, NULL, NULL),
(661, 'PEGACPSA88V1', 'Certified Pega System Architect 8.8', 34, NULL, NULL),
(662, 'PEGACPSSA23V1', 'Certified Pega Senior System Architect \'23', 34, NULL, NULL),
(663, 'PEGACPSSA88V1', 'Certified Pega Senior System Architect 8.8', 34, NULL, NULL),
(664, 'PEGACSSA72V1', 'Certified Pega Senior System Architect (CSSA) 72V1 – French, Japanese, and Portuguese Brazilian Only', 34, NULL, NULL),
(665, 'PEGAPCBA87V1', 'Certified Pega Business Architect (PCBA) 87V1', 34, NULL, NULL),
(666, 'PEGAPCDC87V1', 'Certified Pega Decisioning Consultant (PCDC) 87V1', 34, NULL, NULL),
(667, 'PEGAPCDS87V1', 'Certified Pega Data Scientist (PCDS) 87V1', 34, NULL, NULL),
(668, 'PEGAPCLSA86V2', 'Lead System Architect (LSA) Pega Architecture Exam 86V2', 34, NULL, NULL),
(669, 'PEGAPCRSA80V1_2019', 'Certified Pega Robotics System Architect (PCRSA) 80V1 2019', 34, NULL, NULL),
(670, 'PEGAPCSA87V1', 'Certified Pega System Architect (PCSA) 87V1', 34, NULL, NULL),
(671, 'PEGAPCSSA87V1', 'Certified Pega Senior System Architect (PCSSA) 87V1', 34, NULL, NULL),
(672, '200-301', 'Cisco Certified Network Associate (CCNA)', 35, NULL, NULL),
(673, '200-201', 'Cisco Certified CyberOps Associate', 35, NULL, NULL),
(674, '200-901', 'Cisco Certified DevNet Associate', 35, NULL, NULL),
(675, '300-410', 'ENARSI: Implementing Cisco Enterprise Advanced Routing and Services', 35, NULL, NULL),
(676, '300-415', 'ENSDWI: Implementing Cisco SD-WAN Solutions', 35, NULL, NULL),
(677, '300-420', 'ENSLD: Designing Cisco Enterprise Networks', 35, NULL, NULL),
(678, '300-425', 'ENWLSD: Designing Cisco Enterprise Wireless Networks', 35, NULL, NULL),
(679, '300-430', 'ENWLSI: Implementing Cisco Enterprise Wireless Networks', 35, NULL, NULL),
(680, '300-435', 'ENAUTO: Automating Cisco Enterprise Solutions', 35, NULL, NULL),
(681, '300-710', 'SNCF: Securing Networks with Cisco Firepower', 35, NULL, NULL),
(682, '300-715', 'SISE: Implementing and Configuring Cisco Identity Services Engine', 35, NULL, NULL),
(683, '300-720', 'SESA: Securing Email with Cisco Email Security Appliance', 35, NULL, NULL),
(684, '300-725', 'SWSA: Securing the Web with Cisco Web Security Appliance', 35, NULL, NULL),
(685, '300-730', 'SVPN: Implementing Secure Solutions with Virtual Private Networks', 35, NULL, NULL),
(686, '300-735', 'SAUTO: Automating Cisco Security Solutions', 35, NULL, NULL),
(687, '300-610', 'DCID: Designing Cisco Data Center Infrastructure', 35, NULL, NULL),
(688, '300-615', 'DCIT: Troubleshooting Cisco Data Center Infrastructure', 35, NULL, NULL),
(689, '300-620', 'DCACI: Implementing Cisco Application Centric Infrastructure', 35, NULL, NULL),
(690, '300-625', 'DCSAN: Implementing Cisco Storage Area Networking', 35, NULL, NULL),
(691, '300-635', 'DCAUTO: Automating Cisco Data Center Solutions', 35, NULL, NULL),
(692, '300-810', 'CLICA: Implementing Cisco Collaboration Applications', 35, NULL, NULL),
(693, '300-815', 'CLACCM: Implementing Cisco Advanced Call Control and Mobility Services', 35, NULL, NULL),
(694, '300-820', 'CLCEI: Implementing Cisco Collaboration Cloud and Edge Solutions', 35, NULL, NULL),
(695, '300-835', 'CLAUTO: Automating Cisco Collaboration Solutions', 35, NULL, NULL),
(696, '300-510', 'SPRI: Implementing Cisco Service Provider Advanced Routing Solutions', 35, NULL, NULL),
(697, '300-515', 'SPVI: Implementing Cisco Service Provider VPN Services', 35, NULL, NULL),
(698, '300-535', 'SPAUTO: Automating Cisco Service Provider Solutions', 35, NULL, NULL),
(699, '300-910', 'DEVOPS: Implementing DevOps Solutions and Practices Using Cisco Platforms', 35, NULL, NULL),
(700, '300-915', 'DEVIOT: Implementing Cisco IoT Solutions', 35, NULL, NULL),
(701, '300-920', 'DEVWBX: Developing Applications for Cisco Webex and Webex Devices', 35, NULL, NULL),
(702, '300-925', 'DEVSP: Implementing Service Provider Automation Solutions', 35, NULL, NULL),
(703, '300-935', 'DEVASC: Automating and Programming Cisco Enterprise Solutions', 35, NULL, NULL),
(704, '350-401', 'Implementing and Operating Cisco Enterprise Network Core Technologies', 35, NULL, NULL),
(705, '350-701', 'Implementing and Operating Cisco Security Core Technologies', 35, NULL, NULL),
(706, '350-601', 'Implementing and Operating Cisco Data Center Core Technologies', 35, NULL, NULL),
(707, '350-501', 'Implementing and Operating Cisco Service Provider Network Core Technologies', 35, NULL, NULL),
(708, '400-007', 'Cisco Certified Design Expert', 35, NULL, NULL),
(709, '(C|EH)', 'Certified Ethical Hacker (C|EH)', 36, NULL, NULL),
(710, '(C|CISO)', 'Certified Chief Information Security Officer (C|CISO)', 36, NULL, NULL),
(711, '(C|HFI)', 'Computer Hacking Forensic Investigator (C|HFI)', 36, NULL, NULL),
(712, '(C|ND)', 'Certified Network Defender (C|ND)', 36, NULL, NULL),
(713, '(E|CIH)', 'Certified Incident Handler (E|CIH)', 36, NULL, NULL),
(714, '(C|PENT)', 'Certified Penetration Testing Professional (C|PENT)', 36, NULL, NULL),
(715, '(C|SA)', 'Certified SOC Analyst (C|SA)', 36, NULL, NULL),
(716, '(C|CT)', 'Certified Cybersecurity Technician (C|CT)', 36, NULL, NULL),
(717, '(E|CES)', 'Certified Encryption Specialist (E|CES)', 36, NULL, NULL),
(718, '(C|SCU)', 'Certified Secure Computer User (C|SCU)', 36, NULL, NULL),
(719, '(D|FE)', 'Digital Forensics Essentials (D|FE)', 36, NULL, NULL),
(720, '(E|DRP)', 'Disaster Recovery Professional (E|DRP)', 36, NULL, NULL),
(721, '(E|CSS)', 'EC-Council Certified Security Specialist (E|CSS)', 36, NULL, NULL),
(722, '(E|HE)', 'Ethical Hacking Essentials (E|HE)', 36, NULL, NULL),
(723, '(C|TIA)', 'Certified Threat Intelligence Analyst (C|TIA)', 36, NULL, NULL),
(724, '(C|CSE)', 'Certified Cloud Security Engineer (C|CSE)', 36, NULL, NULL),
(725, '(E|CSA)', 'EC-Council Certified Security Analyst (E|CSA)', 36, NULL, NULL),
(726, '(L|PT)', 'License Penetration Tester (L|PT)', 36, NULL, NULL),
(727, '(C|EI)', 'Certified EC-Council Instructor (C|EI)', 36, NULL, NULL),
(728, 'QCOM', 'Qlik Compose Certification Exam', 37, NULL, NULL),
(729, 'QREP', 'Qlik Replicate Certification Exam', 37, NULL, NULL),
(730, 'QSBA2022', 'Qlik Sense Business Analyst Certification Exam - 2022', 37, NULL, NULL),
(731, 'QSBA2024', 'Qlik Sense Business Analyst Certification Exam - 2024', 37, NULL, NULL),
(732, 'QSDA2024', 'Qlik Sense Data Architect Certification Exam - 2024', 37, NULL, NULL),
(733, 'QSSA2024', 'Qlik Sense System Administrator Certification Exam - 2024', 37, NULL, NULL),
(734, 'QV12BA', 'QlikView 12 Business Analyst Certification Exam', 37, NULL, NULL),
(735, 'QV12DA', 'QlikView 12 Data Architect Certification Exam', 37, NULL, NULL),
(736, 'QV12SA', 'QlikView 12 System Administrator Certification Exam', 37, NULL, NULL),
(737, 'NSE6_FNC-7.2', 'FortinetNSE6-FortiNAC7.2', 38, NULL, NULL),
(738, 'NSE6_FSW-7.2', 'FortinetNSE6-FortiSwitch7.2', 38, NULL, NULL),
(739, 'NSE6_FWF-6.4', 'FortinetNSE6-SecureWirelessLAN6.4', 38, NULL, NULL),
(740, 'FCP_FCT_AD-7.2', 'FCP—FortiClientEMS7.2Administrator', 38, NULL, NULL),
(741, 'FCP_FAC_AD-6.5', 'FCP—FortiAuthenticator6.5Administrator', 38, NULL, NULL),
(742, 'FCP_FGT_AD-7.4', 'FCP-FortiGate7.4Administrator', 38, NULL, NULL),
(743, 'FCP_FMG_AD-7.4', 'FCP-FortiManager7.4Administrator', 38, NULL, NULL),
(744, 'FCP_FAZ_AD-7.4', 'FCP-FortiAnalyzer7.4Administrator', 38, NULL, NULL),
(745, 'FCP_FWF_AD-7.4', 'FCP-SecureWirelessLAN7.4Administrator', 38, NULL, NULL),
(746, 'NSE5_EDR-5.0', 'Fortinet NSE 5 - FortiEDR 5.0', 38, NULL, NULL),
(747, 'NSE5_FSM-6.3', 'FortinetNSE5-FortiSIEM6.3', 38, NULL, NULL),
(748, 'NSE6_FSR-7.3', 'FortinetNSE6-FortiSOAR7.3Administrator', 38, NULL, NULL),
(749, 'FCP_FAZ_AN-7.4', 'FCP - FortiAnalyzer 7.4 Analyst', 38, NULL, NULL),
(750, 'NSE6_WCS-7.0', 'FortinetNSE6-CloudSecurity7.0forAWS', 38, NULL, NULL),
(751, 'NSE6_ZCS-7.0', 'FortinetNSE6-CloudSecurity7.0forAzure', 38, NULL, NULL),
(752, 'NSE6_FML-7.2', 'FortinetNSE6-FortiMail7.2', 38, NULL, NULL),
(753, 'FCP_WCS_AD-7.4', 'FCP-AWSCloudSecurity7.4Administrator', 38, NULL, NULL),
(754, 'FCP_FWB_AD-7.4', 'FCP-FortiWeb7.4Administrator', 38, NULL, NULL),
(755, 'FCP_ZCS_AD-7.4', 'FCP-AzureCloudSecurity7.4Administrator', 38, NULL, NULL),
(756, 'FCP_FML_AD-7.4', 'FCP-FortiMail7.4Administrator', 38, NULL, NULL),
(757, 'UiPath-ABAAv1', 'UiPath Automation Business Analyst Associate Exam', 39, NULL, NULL),
(758, 'UiPath-ABAv1', 'UiPath Automation Business Analyst Professional Exam', 39, NULL, NULL),
(759, 'UiPath-ADAv1', 'UiPath Automation Developer Associate Exam', 39, NULL, NULL),
(760, 'UiPath-ADPv1', 'UiPath Automation Developer Professional Exam', 39, NULL, NULL),
(761, 'UiPath-ASAPv1', 'UiPath Automation Solution Architect Professional Exam', 39, NULL, NULL),
(762, 'UiPath-IEPASv1', 'UiPath Infrastructure Engineer Professional – Automation Suite Exam', 39, NULL, NULL),
(763, 'UiPath-IEPSv1-I', 'UiPath Infrastructure Engineer Professional - Standalone Part 1', 39, NULL, NULL),
(764, 'UiPath-IEPSv1-II', 'UiPath Infrastructure Engineer Professional - Standalone Part 2', 39, NULL, NULL),
(765, 'UiPath-SAIAv1', 'UiPath Specialized AI Associate Exam', 39, NULL, NULL),
(766, 'UiPath-SAIv1', 'UiPath Specialized AI Professional Exam', 39, NULL, NULL),
(767, 'UiPath-TAEPv1', 'UiPath Test Automation Engineer Professional v1.0 Exam', 39, NULL, NULL),
(768, 'ACCESS-DEF', 'CyberArk Defender Access', 40, NULL, NULL),
(769, 'CPC-CDE-RECERT', 'CyberArk CDE-CPC Recertification', 40, NULL, NULL),
(770, 'CPC-SEN', 'CyberArk Sentry - Privilege Cloud', 40, NULL, NULL),
(771, 'EPM-CDE-RECERT', 'CyberArk CDE-EPM Recertification', 40, NULL, NULL),
(772, 'EPM-DEF', 'CyberArk Defender - EPM', 40, NULL, NULL),
(773, 'GUARD', 'CyberArk Guardian Exam', 40, NULL, NULL),
(774, 'PAM-CDE-RECERT', 'CyberArk CDE-PAM Recertification', 40, NULL, NULL),
(775, 'PAM-DEF', 'CyberArk Defender – PAM', 40, NULL, NULL),
(776, 'PAM-SEN', 'CyberArk Sentry – PAM', 40, NULL, NULL),
(777, 'SECRET-CDE-RECERT', 'CyberArk CDE-SECRET Recertification', 40, NULL, NULL),
(778, 'SECRET-SEN', 'CyberArk Sentry - Secrets Manager', 40, NULL, NULL),
(779, 'ACCESS-CDE-RECERT', 'CyberArk CDE-ACCESS Recertification', 40, NULL, NULL),
(780, 'C1000-101', 'IBMCloudProfessionalSalesEngineerv1', 41, NULL, NULL),
(781, 'C1000-119', 'IBMCloudProfessionalSREv2', 41, NULL, NULL),
(782, 'C1000-142', 'IBMCloudAdvocatev2', 41, NULL, NULL),
(783, 'C1000-166', 'IBMCloudProfessionalDeveloperv6', 41, NULL, NULL),
(784, 'C1000-169', 'IBMCloudAssociateSREV2', 41, NULL, NULL),
(785, 'C1000-170', 'IBMCloudTechnicalAdvocatev5', 41, NULL, NULL),
(786, 'C1000-172', 'IBMCloudProfessionalArchitectv6', 41, NULL, NULL),
(787, 'C1000-176', 'IBMCloudAdvancedArchitectv2', 41, NULL, NULL),
(788, 'C1000-186', 'IBMCloudTechnicalSellerv2-Professional', 41, NULL, NULL),
(789, 'S2000-013', 'IBMCloudSatelliteSpecialtyv1', 41, NULL, NULL),
(790, 'S2000-018', 'IBMCloudforVMwarev1Specialty', 41, NULL, NULL),
(791, 'S2000-019', 'IBMCloudforSAPSpecialtyv1', 41, NULL, NULL),
(792, 'S2000-020', 'IBMPowerVirtualServerv1Specialty', 41, NULL, NULL),
(793, 'S2000-022', 'IBMCloudDevSecOpsv2Specialty', 41, NULL, NULL),
(794, 'S2000-023', 'IBM Cloud for Financial Services v2 Specialty', 41, NULL, NULL);

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
(4, '2024_10_24_061214_create_candidates_table', 1),
(5, '2024_11_02_075428_create_personal_access_tokens_table', 1),
(6, '2024_11_06_093327_create_exams_table', 1),
(7, '2024_11_06_191240_create_companies_table', 1),
(8, '2024_11_08_045949_create_vendors_table', 1),
(9, '2024_11_08_104452_create_permission_tables', 1),
(10, '2024_11_10_193144_add_vendor_id_foreign_key_to_exams_table', 1),
(11, '2024_11_11_114421_create_countries_table', 1),
(12, '2024_11_13_072033_create_clients_table', 1),
(13, '2024_11_14_110758_create_bank_details_table', 1),
(14, '2024_11_14_115505_create_states_table', 1),
(15, '2024_11_14_120006_create_cities_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-11-19 23:17:47', '2024-11-19 23:17:47'),
(2, 'user', 'web', '2024-11-19 23:17:47', '2024-11-19 23:17:47');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('DCLjOr91UeY2zjPOzxPVoZeCHr9sIlBQqY5VdMSD', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiT25nTWM5djJyaWs3YWdsNElobVhRbXlIUFNiTFAxVWU1MnV5MVJUNSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMyOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvY2FuZGlkYXRlcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo5OiJhY3RpdmVUYWIiO3M6NzoiY2xpZW50cyI7fQ==', 1732085221);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `state_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `state_name`, `state_code`, `created_at`, `updated_at`) VALUES
(1, 100, 'Andhra Pradesh', '37', NULL, NULL),
(2, 100, 'Arunachal Pradesh', '12', NULL, NULL),
(3, 100, 'Assam', '18', NULL, NULL),
(4, 100, 'Bihar', '10', NULL, NULL),
(5, 100, 'Chattisgarh', '22', NULL, NULL),
(6, 100, 'Delhi', '7', NULL, NULL),
(7, 100, 'Goa', '30', NULL, NULL),
(8, 100, 'Gujarat', '24', NULL, NULL),
(9, 100, 'Haryana', '6', NULL, NULL),
(10, 100, 'Himachal Pradesh', '2', NULL, NULL),
(11, 100, 'Jammu and Kashmir', '1', NULL, NULL),
(12, 100, 'Jharkhand', '20', NULL, NULL),
(13, 100, 'Karnataka', '29', NULL, NULL),
(14, 100, 'Kerala', '32', NULL, NULL),
(15, 100, 'Lakshadweep Islands', '31', NULL, NULL),
(16, 100, 'Madhya Pradesh', '23', NULL, NULL),
(17, 100, 'Maharashtra', '27', NULL, NULL),
(18, 100, 'Manipur', '14', NULL, NULL),
(19, 100, 'Meghalaya', '17', NULL, NULL),
(20, 100, 'Mizoram', '15', NULL, NULL),
(21, 100, 'Nagaland', '13', NULL, NULL),
(22, 100, 'Odisha', '21', NULL, NULL),
(23, 100, 'Pondicherry', '34', NULL, NULL),
(24, 100, 'Punjab', '3', NULL, NULL),
(25, 100, 'Rajasthan', '8', NULL, NULL),
(26, 100, 'Sikkim', '11', NULL, NULL),
(27, 100, 'Tamil Nadu', '33', NULL, NULL),
(28, 100, 'Telangana', '36', NULL, NULL),
(29, 100, 'Tripura', '16', NULL, NULL),
(30, 100, 'Uttar Pradesh', '9', NULL, NULL),
(31, 100, 'Uttarakhand', '5', NULL, NULL),
(32, 100, 'West Bengal', '19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `is_active`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 1, NULL, '$2y$12$/.TLtMDxxpw9NI5BBIhod./Nf4XrsUQvDhJJYsrZYzNY5a2PrKfoy', NULL, '2024-11-19 23:17:47', '2024-11-19 23:17:47'),
(2, 'User', 'user@gmail.com', 1, NULL, '$2y$12$ieBL/lHQJ6pWNSPlHf3LEeGySz5CmqWf2V74EcULm.uPsnToTn/t.', NULL, '2024-11-19 23:17:48', '2024-11-19 23:17:48');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `vendor_name`, `is_active`, `created_at`, `updated_at`) VALUES
(3, 'Microsoft', 1, NULL, NULL),
(4, 'Amazon', 1, NULL, NULL),
(5, 'CompTIA', 1, NULL, NULL),
(6, 'Google', 1, NULL, NULL),
(7, 'Salesforce', 1, NULL, NULL),
(8, 'PMI', 1, NULL, NULL),
(9, 'Oracle', 1, NULL, NULL),
(10, 'PALO ALTO', 1, NULL, NULL),
(11, 'SCRUM', 1, NULL, NULL),
(12, 'Scrum Alliances', 1, NULL, NULL),
(13, 'SAP', 1, NULL, NULL),
(14, 'ServicesNow', 1, NULL, NULL),
(15, 'Splunk', 1, NULL, NULL),
(16, 'Prince 2', 1, NULL, NULL),
(17, 'VMware', 1, NULL, NULL),
(18, 'Tableau', 1, NULL, NULL),
(19, 'Juniper', 1, NULL, NULL),
(20, 'Check Point', 1, NULL, NULL),
(21, 'ISACA', 1, NULL, NULL),
(22, 'ISTQB', 1, NULL, NULL),
(23, 'ISQI', 1, NULL, NULL),
(24, 'ITIL', 1, NULL, NULL),
(25, 'Linux Foundation', 1, NULL, NULL),
(26, 'Citrix', 1, NULL, NULL),
(27, 'Blue prism', 1, NULL, NULL),
(28, 'Appian', 1, NULL, NULL),
(29, 'Adobe', 1, NULL, NULL),
(30, 'Aruba', 1, NULL, NULL),
(31, 'Six Sigma', 1, NULL, NULL),
(32, 'The Open Group', 1, NULL, NULL),
(33, 'Snowflake', 1, NULL, NULL),
(34, 'Pegasystems', 1, NULL, NULL),
(35, 'Cisco', 1, NULL, NULL),
(36, 'EC-COUNCLE', 1, NULL, NULL),
(37, 'QLICK', 1, NULL, NULL),
(38, 'Fortinet', 1, NULL, NULL),
(39, 'UiPath', 1, NULL, NULL),
(40, 'CyberArk', 1, NULL, NULL),
(41, 'IBM', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_details_client_id_foreign` (`client_id`);

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
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_state_id_foreign` (`state_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exams_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_country_id_foreign` (`country_id`);

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=795;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD CONSTRAINT `bank_details_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
