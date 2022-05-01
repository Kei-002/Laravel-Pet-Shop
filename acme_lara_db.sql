-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2022 at 01:13 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acme_lara_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `service_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'Khenn', 1, 'Nc', '2022-04-28 00:49:32', '2022-04-28 00:49:32');

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE `consultation` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pet_id` int(10) UNSIGNED NOT NULL,
  `disease_id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `fee` double(6,2) NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`id`, `created_at`, `updated_at`, `pet_id`, `disease_id`, `employee_id`, `fee`, `comments`) VALUES
(1, '2022-04-26 14:13:22', '2022-04-26 14:13:22', 2, 4, 8, 500.00, 'Molleasd'),
(2, '2022-04-26 14:13:33', '2022-04-26 14:13:33', 17, 3, 4, 500.00, 'Bulate'),
(3, '2022-04-26 14:13:43', '2022-04-26 14:13:43', 22, 2, 3, 500.00, 'Testing lng'),
(4, '2022-04-26 14:14:12', '2022-04-26 14:14:12', 17, 5, 1, 200.00, 'Less Sweet'),
(5, '2022-04-26 14:14:39', '2022-04-26 14:14:39', 17, 5, 2, 500.00, 'Sweeter less'),
(6, '2022-04-27 06:43:43', '2022-04-27 06:43:43', 7, 2, 6, 234.00, 'Mallsasd');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `addressline` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `town` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_path` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_customer.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `title`, `lname`, `fname`, `addressline`, `town`, `zipcode`, `phone`, `img_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Prof.', 'Crist', 'Kaleigh', '1565 Schroeder Path\nNew Laila, ME 15184', 'West Della', '89545', '1-530-490-2625', 'default_customer.png', '2022-04-25 21:59:12', '2022-04-25 21:59:12', NULL),
(2, 'Mrs.', 'Brekke', 'Cedrick', '13579 Haley Common\nLehnermouth, NM 12423-7219', 'North Websterhaven', '18920-5863', '458.799.8847', 'default_customer.png', '2022-04-25 21:59:12', '2022-04-25 21:59:12', NULL),
(3, 'Dr.', 'Monahan', 'Mya', '1102 Halvorson Spring\nVergiehaven, RI 76461-5133', 'Fishermouth', '16511-5062', '1-878-602-0569', 'default_customer.png', '2022-04-25 21:59:12', '2022-04-25 21:59:12', NULL),
(4, 'Mrs.', 'Heaney', 'Johan', '741 Humberto Meadow\nPort Shayna, MA 92595-0049', 'Noemiborough', '26570', '+1.458.345.6210', 'default_customer.png', '2022-04-25 21:59:12', '2022-04-25 21:59:12', NULL),
(5, 'Dr.', 'Hammes', 'Coy', '647 Zulauf Station\nSouth Laurinemouth, WA 27636-4938', 'Lake Elbertside', '88623-6271', '619-276-7890', 'default_customer.png', '2022-04-25 21:59:12', '2022-04-25 21:59:12', NULL),
(6, 'Mr.', 'Bednar', 'Trevion', '60922 Tad Port Apt. 211\nO\'Reillytown, MN 27556', 'New Golden', '89129', '+1 (220) 445-2243', 'default_customer.png', '2022-04-25 21:59:12', '2022-04-25 21:59:12', NULL),
(7, 'Ms.', 'Kuvalis', 'Cody', '7261 Enid Extensions Suite 607\nAidanhaven, NM 65045-1246', 'East Carey', '34157', '+1-872-272-5741', 'default_customer.png', '2022-04-25 21:59:12', '2022-04-25 21:59:12', NULL),
(8, 'Prof.', 'Jerde', 'Dana', '37507 Liliane Lodge\nNaderberg, UT 72810-0579', 'Port Chadrick', '11393', '+12483623412', 'default_customer.png', '2022-04-25 21:59:12', '2022-04-25 21:59:12', NULL),
(9, 'Ms.', 'Dibbert', 'Adrien', '224 Ena Meadows Suite 807\nSouth Coltonshire, DE 76950-5498', 'New Alysonport', '65144-5882', '570-700-1709', 'default_customer.png', '2022-04-25 21:59:12', '2022-04-25 21:59:12', NULL),
(10, 'Mr.', 'Rempel', 'Jessyca', '90483 Romaguera Lodge\nBoyleland, KY 45145-9206', 'Port Koreyside', '78842', '+1-423-353-7366', 'default_customer.png', '2022-04-25 21:59:12', '2022-04-25 21:59:12', NULL),
(11, 'Prof.', 'Leuschke', 'Mark', '619 Astrid Rue\nNorth Claudie, IA 48984', 'Port Lempi', '52763-4605', '623-892-2320', 'default_customer.png', '2022-04-25 21:59:12', '2022-04-25 21:59:12', NULL),
(12, 'Mr.', 'Mayert', 'Bernita', '391 Laisha Court Apt. 751\nPort Estevan, ME 37956-9441', 'Oberbrunnerhaven', '75707-1875', '508-649-2441', 'default_customer.png', '2022-04-25 21:59:12', '2022-04-25 21:59:12', NULL),
(13, 'Mrs.', 'Rippin', 'Vesta', '436 Rogahn Overpass Suite 376\nEdwardchester, AL 66984', 'Ameliachester', '79322-9476', '+1 (567) 439-3068', 'default_customer.png', '2022-04-25 21:59:13', '2022-04-25 21:59:13', NULL),
(14, 'Prof.', 'Dietrich', 'Lawson', '429 Connie Pines\nPort Kiana, RI 37343', 'Pattieland', '93853', '920.541.0678', 'default_customer.png', '2022-04-25 21:59:13', '2022-04-25 21:59:13', NULL),
(15, 'Miss', 'Zemlak', 'Alfreda', '81661 Cruickshank Road\nBayerburgh, WA 04035', 'Lake Jovanihaven', '89253', '323.589.4138', 'default_customer.png', '2022-04-25 21:59:13', '2022-04-25 21:59:13', NULL),
(16, 'Prof.', 'Hahn', 'Henry', '631 Karine Divide\nLorenaport, CT 34487-4995', 'West Bayleehaven', '97566-5037', '+1 (458) 697-5361', 'default_customer.png', '2022-04-25 21:59:13', '2022-04-25 21:59:13', NULL),
(17, 'Dr.', 'Dibbert', 'Dina', '338 Collier Burgs Suite 513\nNorth Ednahaven, OR 71533-0694', 'Zboncakton', '90429-1029', '+1 (475) 780-6478', 'default_customer.png', '2022-04-25 21:59:13', '2022-04-25 21:59:13', NULL),
(18, 'Dr.', 'Donnelly', 'Erna', '10552 Jerome Lakes\nWizaland, CO 71154-1254', 'Dianashire', '34890-8005', '559.461.9913', 'default_customer.png', '2022-04-25 21:59:13', '2022-04-25 21:59:13', NULL),
(19, 'Dr.', 'Schowalter', 'Piper', '108 Gulgowski Parkways Suite 318\nNorth Hilmaville, AZ 16509', 'Dooleyfort', '06326', '(906) 390-7179', 'default_customer.png', '2022-04-25 21:59:13', '2022-04-25 21:59:13', NULL),
(20, 'Mrs.', 'Lebsack', 'Hermina', '989 Clare Gardens Apt. 153\nStaceyburgh, VA 07584-5585', 'Port Lauriane', '04918', '+1-505-725-6166', 'default_customer.png', '2022-04-25 21:59:13', '2022-04-25 21:59:13', NULL),
(21, 'Mrs.', 'Ebert', 'Kenyatta', '503 Roosevelt Stravenue Suite 939\nTinabury, MO 03890-1249', 'North Araceli', '97570', '1-678-702-8459', 'default_customer.png', '2022-04-25 21:59:13', '2022-04-25 21:59:13', NULL),
(22, 'Dr.', 'Treutel', 'Kiara', '6906 Howe Junction Apt. 921\nPort Clint, VT 86529-2728', 'Port Gregory', '41879', '318.720.7065', 'default_customer.png', '2022-04-25 21:59:13', '2022-04-25 21:59:13', NULL),
(23, 'Dr.', 'Stracke', 'Buford', '96005 Sebastian Extensions\nPort Myahburgh, CO 24571', 'Adelleborough', '03681-4480', '+1-743-429-5063', 'default_customer.png', '2022-04-25 21:59:13', '2022-04-25 21:59:13', NULL),
(24, 'Prof.', 'Ortiz', 'Devante', '169 Hollis Extensions\nSouth Austin, CT 96729-4557', 'South Sabrina', '25262-1595', '+1.283.708.1434', 'default_customer.png', '2022-04-25 21:59:13', '2022-04-25 21:59:13', NULL),
(25, 'Mr.', 'Daugherty', 'Tad', '2827 Bins Park\nPort Phyllis, ID 83509-2952', 'Brooksburgh', '16118-3596', '929.618.8930', 'default_customer.png', '2022-04-25 21:59:13', '2022-04-25 21:59:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `id` int(10) UNSIGNED NOT NULL,
  `disease_name` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`id`, `disease_name`) VALUES
(1, 'Bleeding'),
(2, 'Leg Injury'),
(3, 'Heartworms'),
(4, 'Cough'),
(5, 'Diabetes'),
(6, 'Hepatitis'),
(7, 'Leptospirosis'),
(8, 'Parvo'),
(9, 'Heatstroke'),
(10, 'Headache');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `lname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_path` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_employee.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `user_id`, `lname`, `fname`, `phone`, `img_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 8, 'Cummings', 'Ophelia', '539-715-0845', 'default_employee.png', '2022-04-25 21:59:15', '2022-04-25 21:59:15', NULL),
(2, 5, 'Bogisich', 'Keshaun', '283.990.8669', 'default_employee.png', '2022-04-25 21:59:15', '2022-04-25 21:59:15', NULL),
(3, 10, 'Borer', 'Jacey', '616.507.3033', 'default_employee.png', '2022-04-25 21:59:15', '2022-04-25 21:59:15', NULL),
(4, 6, 'Lockman', 'Maiya', '385-228-2887', 'default_employee.png', '2022-04-25 21:59:15', '2022-04-25 21:59:15', NULL),
(5, 4, 'Casper', 'Nicolette', '(586) 957-2701', 'default_employee.png', '2022-04-25 21:59:15', '2022-04-25 21:59:15', NULL),
(6, 9, 'Rath', 'Melvin', '(316) 547-7443', 'default_employee.png', '2022-04-25 21:59:15', '2022-04-25 21:59:15', NULL),
(7, 1, 'Reilly', 'Maximilian', '+1-678-270-8667', 'default_employee.png', '2022-04-25 21:59:15', '2022-04-25 21:59:15', NULL),
(8, 7, 'Champlin', 'Chad', '+1-320-907-1848', 'default_employee.png', '2022-04-25 21:59:15', '2022-04-25 21:59:15', NULL),
(9, 2, 'Kub', 'Jeffery', '+1 (612) 719-2606', 'default_employee.png', '2022-04-25 21:59:15', '2022-04-25 21:59:15', NULL),
(10, 3, 'Weissnat', 'Lonie', '838.552.7481', 'default_employee.png', '2022-04-25 21:59:15', '2022-04-25 21:59:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groom_service`
--

CREATE TABLE `groom_service` (
  `id` int(10) UNSIGNED NOT NULL,
  `groom_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_path` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_service.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groom_service`
--

INSERT INTO `groom_service` (`id`, `groom_name`, `price`, `description`, `img_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Nail Cutting', 1052.96, 'Sit quo non excepturi corrupti velit ut. Dolores animi officia sunt quas itaque optio consequatur placeat. Doloremque temporibus ut consequatur porro sit sint.', 'Apr,26,2022_cut_nails.jpg', '2022-04-25 21:59:16', '2022-04-25 22:03:34', NULL),
(2, 'Pet Spa', 635.40, 'Nulla quia quasi exercitationem. Dolores odio officiis blanditiis voluptatem. Voluptates odio ab nobis aut quod.', 'default_service.png', '2022-04-25 21:59:16', '2022-04-25 21:59:16', NULL),
(3, 'Hair Trim', 685.92, 'Qui occaecati eveniet officiis veniam et voluptates qui rerum. Architecto et quidem odit rerum molestias mollitia quo. Iusto incidunt quos praesentium expedita.', 'default_service.png', '2022-04-25 21:59:16', '2022-04-25 21:59:16', NULL),
(4, 'Ear Cleaning', 493.16, 'Dolorem neque natus officia nobis natus hic laboriosam. Explicabo laudantium reprehenderit beatae reprehenderit iste. Et nisi at laborum nihil et.', 'default_service.png', '2022-04-25 21:59:16', '2022-04-25 21:59:16', NULL),
(5, 'Pet Wash', 655.50, 'Corrupti voluptatum fugiat qui libero omnis error dolores. Placeat animi ut eum ut maxime quia. Accusamus doloribus aut sunt ut.', 'default_service.png', '2022-04-25 21:59:16', '2022-04-25 21:59:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_12_100720_create_clinic_tables', 1),
(6, '2022_04_23_082603_create_disease_table', 1),
(7, '2022_04_23_094506_create_consultation_table', 1),
(16, '2022_04_26_073045_create_transactioninfo_table', 2),
(17, '2022_04_26_073105_create_transactionline_table', 2),
(19, '2022_04_27_115147_create_comments_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `id` int(10) UNSIGNED NOT NULL,
  `pet_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `age` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_path` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_pet.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`id`, `pet_name`, `customer_id`, `age`, `img_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cleora', 6, '4', 'default_pet.png', '2022-04-25 21:59:15', '2022-04-27 06:43:17', NULL),
(2, 'Conor', 16, '5', 'default_pet.png', '2022-04-25 21:59:15', '2022-04-25 21:59:15', NULL),
(3, 'Cedrick', 11, '3', 'default_pet.png', '2022-04-25 21:59:15', '2022-04-25 21:59:15', NULL),
(4, 'Eryn', 18, '5', 'default_pet.png', '2022-04-25 21:59:15', '2022-04-25 21:59:15', NULL),
(5, 'Velda', 18, '3', 'default_pet.png', '2022-04-25 21:59:15', '2022-04-25 21:59:15', NULL),
(6, 'Reed', 16, '2', 'default_pet.png', '2022-04-25 21:59:15', '2022-04-25 21:59:15', NULL),
(7, 'Reyes', 2, '2', 'default_pet.png', '2022-04-25 21:59:15', '2022-04-25 21:59:15', NULL),
(8, 'Kelton', 14, '3', 'default_pet.png', '2022-04-25 21:59:15', '2022-04-25 21:59:15', NULL),
(9, 'Abby', 14, '2', 'default_pet.png', '2022-04-25 21:59:15', '2022-04-25 21:59:15', NULL),
(10, 'Eva', 3, '5', 'default_pet.png', '2022-04-25 21:59:15', '2022-04-25 21:59:15', NULL),
(11, 'Susan', 4, '3', 'default_pet.png', '2022-04-25 21:59:15', '2022-04-25 21:59:15', NULL),
(12, 'Sasha', 1, '3', 'default_pet.png', '2022-04-25 21:59:15', '2022-04-25 21:59:15', NULL),
(13, 'Leonora', 17, '5', 'default_pet.png', '2022-04-25 21:59:15', '2022-04-25 21:59:15', NULL),
(14, 'Kailey', 10, '2', 'default_pet.png', '2022-04-25 21:59:15', '2022-04-25 21:59:15', NULL),
(15, 'Melyssa', 12, '3', 'default_pet.png', '2022-04-25 21:59:15', '2022-04-25 21:59:15', NULL),
(16, 'Vinnie', 11, '3', 'default_pet.png', '2022-04-25 21:59:15', '2022-04-25 21:59:15', NULL),
(17, 'Sam', 9, '4', 'default_pet.png', '2022-04-25 21:59:15', '2022-04-25 21:59:15', NULL),
(18, 'Eladio', 18, '2', 'default_pet.png', '2022-04-25 21:59:15', '2022-04-25 21:59:15', NULL),
(19, 'Reina', 18, '4', 'default_pet.png', '2022-04-25 21:59:15', '2022-04-25 21:59:15', NULL),
(20, 'Bernita', 13, '3', 'default_pet.png', '2022-04-25 21:59:15', '2022-04-25 21:59:15', NULL),
(21, 'Adela', 9, '2', 'default_pet.png', '2022-04-25 21:59:15', '2022-04-25 21:59:15', NULL),
(22, 'June', 13, '1', 'default_pet.png', '2022-04-25 21:59:16', '2022-04-25 21:59:16', NULL),
(23, 'Jay', 8, '2', 'default_pet.png', '2022-04-25 21:59:16', '2022-04-25 21:59:16', NULL),
(24, 'Frederic', 9, '1', 'default_pet.png', '2022-04-25 21:59:16', '2022-04-25 21:59:16', NULL),
(25, 'Tate', 5, '2', 'default_pet.png', '2022-04-25 21:59:16', '2022-04-25 21:59:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactioninfo`
--

CREATE TABLE `transactioninfo` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `transacation_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactioninfo`
--

INSERT INTO `transactioninfo` (`id`, `customer_id`, `transacation_date`, `status`) VALUES
(2, 9, '2022-04-27', 'Unpaid'),
(3, 9, '2022-04-27', 'Paid'),
(4, 13, '2022-04-27', 'Paid'),
(5, 4, '2022-04-27', 'Unpaid'),
(6, 9, '2022-04-27', 'Paid'),
(8, 1, '2022-04-27', 'Unpaid'),
(9, 1, '2022-04-27', 'Unpaid'),
(10, 1, '2022-04-27', 'Unpaid'),
(11, 1, '2022-04-27', 'Unpaid'),
(12, 1, '2022-04-27', 'Unpaid'),
(13, 1, '2022-04-27', 'Unpaid'),
(14, 1, '2022-04-27', 'Unpaid'),
(15, 1, '2022-04-27', 'Unpaid'),
(16, 1, '2022-04-27', 'Unpaid'),
(17, 9, '2022-04-27', 'Unpaid'),
(18, 4, '2022-04-27', 'Unpaid'),
(19, 9, '2022-04-27', 'Unpaid'),
(20, 1, '2022-04-27', 'Unpaid'),
(21, 10, '2022-04-27', 'Unpaid'),
(22, 5, '2022-04-27', 'Unpaid'),
(23, 1, '2022-04-28', 'Unpaid'),
(24, 9, '2022-04-28', 'Unpaid'),
(25, 9, '2022-04-28', 'Unpaid'),
(26, 9, '2022-04-28', 'Unpaid'),
(27, 9, '2022-04-28', 'Paid'),
(28, 1, '2022-04-28', 'Unpaid'),
(29, 1, '2022-04-28', 'Unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `transactionline`
--

CREATE TABLE `transactionline` (
  `id` int(10) UNSIGNED NOT NULL,
  `transac_id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `pet_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactionline`
--

INSERT INTO `transactionline` (`id`, `transac_id`, `service_id`, `pet_id`, `quantity`) VALUES
(5, 3, 1, 21, 1),
(6, 3, 3, 24, 1),
(7, 4, 3, 22, 1),
(8, 5, 1, 11, 1),
(9, 5, 2, 11, 1),
(10, 6, 1, 17, 1),
(11, 6, 2, 21, 1),
(14, 8, 1, 12, 1),
(15, 8, 3, 12, 1),
(16, 9, 1, 12, 1),
(17, 9, 3, 12, 1),
(18, 10, 1, 12, 1),
(19, 10, 3, 12, 1),
(20, 11, 1, 12, 1),
(21, 11, 3, 12, 1),
(22, 12, 1, 12, 1),
(23, 12, 3, 12, 1),
(24, 13, 1, 12, 1),
(25, 13, 3, 12, 1),
(26, 14, 1, 12, 1),
(27, 14, 3, 12, 1),
(28, 15, 1, 12, 1),
(29, 15, 3, 12, 1),
(30, 16, 1, 12, 1),
(31, 16, 3, 12, 1),
(32, 17, 1, 21, 1),
(33, 17, 3, 17, 1),
(34, 18, 1, 11, 2),
(35, 18, 2, 11, 1),
(36, 19, 1, 17, 1),
(37, 19, 2, 21, 1),
(38, 19, 3, 24, 1),
(39, 20, 1, 12, 1),
(40, 20, 2, 12, 1),
(41, 21, 1, 14, 1),
(42, 21, 5, 14, 1),
(43, 22, 2, 25, 1),
(44, 22, 3, 25, 1),
(45, 23, 1, 12, 1),
(46, 23, 2, 12, 1),
(47, 24, 1, 17, 1),
(48, 24, 2, 17, 1),
(49, 25, 1, 17, 1),
(50, 25, 2, 17, 1),
(51, 26, 1, 24, 1),
(52, 27, 1, 21, 1),
(54, 28, 1, 12, 1),
(55, 29, 1, 12, 1),
(56, 29, 3, 12, 1),
(57, 29, 5, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'collier.hanna@yahoo.com', NULL, '$2y$10$GL8jsQcMkhhQ1G5XsCO3Wujsz8/aVAljQBWd4b/M3EznpvrFZfK8K', NULL, '2022-04-25 21:59:13', '2022-04-25 21:59:13'),
(2, 'imani73@hotmail.com', NULL, '$2y$10$JA6iUrSxQ03oLiVHXkX.LeT/aaPCOAgfcipZdUnPZTUp/GVNRCpkC', NULL, '2022-04-25 21:59:13', '2022-04-25 21:59:13'),
(3, 'stephania36@adams.org', NULL, '$2y$10$qF7b4OEySBfGlQVHLxv2xOhJhbNBmF/lFOAVq3fagsYK.B7tGLlPW', NULL, '2022-04-25 21:59:13', '2022-04-25 21:59:13'),
(4, 'armstrong.eulalia@gmail.com', NULL, '$2y$10$Bo8keqcn9FahgkVZoFiEme94rokA9H8gyBYTOoYStTBpmdlrnpwzy', NULL, '2022-04-25 21:59:13', '2022-04-25 21:59:13'),
(5, 'nitzsche.chris@fadel.com', NULL, '$2y$10$Fm6bfi.3nwz0bbU/z5.T7e5sGlAjKOTokYxMmChZ7IhPhrBJpZ.8e', NULL, '2022-04-25 21:59:14', '2022-04-25 21:59:14'),
(6, 'crist.myrtie@klocko.net', NULL, '$2y$10$8O7s59onKQan5MiYuixsK.uvZMOOlzKQPga28xzfoNZFHIi24SKWi', NULL, '2022-04-25 21:59:14', '2022-04-25 21:59:14'),
(7, 'keon.collins@bode.com', NULL, '$2y$10$86rntQQ0AN5uttBxhIUSz.3FZayW7ZsiSbcvu8Vp.nCUSYYC5tLhS', NULL, '2022-04-25 21:59:14', '2022-04-25 21:59:14'),
(8, 'ritchie.eli@kuvalis.org', NULL, '$2y$10$fOxlCCNSzV7esMSw0P1IUevR2uu5UJ2C2RxWJt2WX5dguFZKpsjtq', NULL, '2022-04-25 21:59:14', '2022-04-25 21:59:14'),
(9, 'suzanne.schmitt@yahoo.com', NULL, '$2y$10$wh/FMCMqpAToYZLSfRmF8uQxknhVhSoCYuxMB6mEKl2mcjn7ARfS6', NULL, '2022-04-25 21:59:14', '2022-04-25 21:59:14'),
(10, 'xbatz@bednar.com', NULL, '$2y$10$7vgubV2kM8mh500KYatzieHePcvBsLae9DhiJB4qyOm6Ge5eGhspm', NULL, '2022-04-25 21:59:14', '2022-04-25 21:59:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_service_id_foreign` (`service_id`);

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consultation_pet_id_foreign` (`pet_id`),
  ADD KEY `consultation_disease_id_foreign` (`disease_id`),
  ADD KEY `consultation_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `groom_service`
--
ALTER TABLE `groom_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pet_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `transactioninfo`
--
ALTER TABLE `transactioninfo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactioninfo_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `transactionline`
--
ALTER TABLE `transactionline`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactionline_transac_id_foreign` (`transac_id`),
  ADD KEY `transactionline_service_id_foreign` (`service_id`),
  ADD KEY `transactionline_pet_id_foreign` (`pet_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groom_service`
--
ALTER TABLE `groom_service`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `transactioninfo`
--
ALTER TABLE `transactioninfo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `transactionline`
--
ALTER TABLE `transactionline`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `groom_service` (`id`);

--
-- Constraints for table `consultation`
--
ALTER TABLE `consultation`
  ADD CONSTRAINT `consultation_disease_id_foreign` FOREIGN KEY (`disease_id`) REFERENCES `disease` (`id`),
  ADD CONSTRAINT `consultation_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `consultation_pet_id_foreign` FOREIGN KEY (`pet_id`) REFERENCES `pet` (`id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `pet_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `transactioninfo`
--
ALTER TABLE `transactioninfo`
  ADD CONSTRAINT `transactioninfo_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `transactionline`
--
ALTER TABLE `transactionline`
  ADD CONSTRAINT `transactionline_pet_id_foreign` FOREIGN KEY (`pet_id`) REFERENCES `pet` (`id`),
  ADD CONSTRAINT `transactionline_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `groom_service` (`id`),
  ADD CONSTRAINT `transactionline_transac_id_foreign` FOREIGN KEY (`transac_id`) REFERENCES `transactioninfo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
