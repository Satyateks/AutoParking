-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 09, 2024 at 12:17 PM
-- Server version: 8.0.34
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auto_park_raushan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_commission`
--

CREATE TABLE `admin_commission` (
  `id` int NOT NULL,
  `commission` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_commission`
--

INSERT INTO `admin_commission` (`id`, `commission`, `created_at`, `updated_at`) VALUES
(1, 25, '2024-01-18 11:15:51', '2024-02-02 08:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `account` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `branch` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ifsc` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `asc` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`id`, `name`, `bank_name`, `account`, `branch`, `ifsc`, `mobile`, `asc`) VALUES
(4, 'Raushan kumar', 'SBI', '91620583409944', 'Noida', 'SBIN0004446', '6205834099', NULL),
(5, 'Raushan kumar', 'SBI', '91620583409944', 'Noida', 'SBIN0004446', '6205834099', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` int NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `value1` text COLLATE utf8mb4_general_ci,
  `value2` text COLLATE utf8mb4_general_ci,
  `value3` text COLLATE utf8mb4_general_ci,
  `value4` text COLLATE utf8mb4_general_ci,
  `value5` text COLLATE utf8mb4_general_ci,
  `value6` text COLLATE utf8mb4_general_ci,
  `value7` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `type`, `value1`, `value2`, `value3`, `value4`, `value5`, `value6`, `value7`, `created_at`, `updated_at`) VALUES
(1, 'banner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-30 10:04:55', '2023-12-05 00:57:19'),
(2, 'banner1', 'Short-Term Lot  raushan', 'Short-Term Lot  anshul bhai', 'Short-Term Lot   subham bhai', 'Short-Term Lot    ravi sir', 'Short-Term Lot   parvesh sir', 'Short-Term Lot    akash', NULL, '2023-12-01 09:54:35', '2023-12-01 04:38:58'),
(3, 'user', 'Save Money Save Money', 'Save up to 70% on our site compared to the cost of on-airport parking.', 'Save Time', 'It’s easy to compare parking at all major airports. Booking a reservation is quick & simple!', 'Save Stress', 'Guarantee your parking spot by booking in advance. Can’t make it? Cancellations are free.', NULL, '2023-12-01 13:40:18', '2023-12-13 01:38:13'),
(4, 'heading', 'We Have The Best Deals For Parking Lots!', 'Instantly book your space today. Trusted by millions', NULL, NULL, NULL, NULL, NULL, '2023-12-01 13:41:44', '2023-12-02 00:03:53'),
(5, 'about_text', 'About Us', 'Welcome to one Auto Park', 'One Auto Park offers a comprehensive solution for parking needs, including EV charging availability and an eco-friendly approach.  Our all-in-one service is designed to provide convenience and sustainability to our customers. With our state-of-the-art facilities, you can rest assured that your vehicle is in good hands while you go about your day. Thank you for considering One Auto Park for your parking needs.  Please bear with us while we develop our website to give you the best experience in parking solutions. If you have a parking space that you would like to rent out, please drop us an email with your details and location:', 'praking@oneautogo.com', 'or call us on', '07778858278', NULL, '2023-12-02 06:05:58', '2023-12-02 00:38:57'),
(6, 'terms', '<div class=\"terms-page\">\r\n                    <h4>Terms & Condition</h4> <p> We respect your privacy. When you give us your personal information, we use it only to fulfill the transaction or service you have requested. </p>\r\n                     <p> We do not subscribe you to marketing emails without your consent. We do not sell or give away your contact information to any other entities. We do not allow the vendors who help us process transactions to sell or give away your information either. If you have questions about how we use your information please contact privacy@nngroup.com. </p>\r\n                     <h4>Detailed Terms & Condition</h4> <p>\r\n                         <b>1.SCOPE</b>\r\n                          <br /> This policy applies to personal information collected on websites owned or controlled by Nielsen Norman Group (collectively referred to in this policy as “we”, \"us\" or \"our\").\r\n                          The aim of this policy is to tell you how we will use any personal information we collect or you provide through our websites. Please read it carefully before you proceed. The data controller in respect of this website is Nielsen Norman Group. </p>\r\n                           <p> <b>2.WHAT PERSONAL INFORMATION DO WE COLLECT?</b>\r\n                             <br /> You do not have to give us any personal information in order to use most of this website. However, if you wish to subscribe to our newsletter, attend the UX Conference, attend or purchase an Online Seminar, purchase a Research Report, or request further information, we may collect the following personal information from you: name, address, phone number, email address, employment details, and employer details. We will also keep a record of any financial transaction you make with us but we do not directly collect, process or store your debit or credit card information. Online payments made through this website are processed securely by third party payment providers.\r\n                             <br /> We use different processors for different types of transactions and to manage support for different services.\r\n                              For more information about how your data will be handled please refer to the respective service provider\'s privacy policy: Research Report Purchases: FastSpring https://fastspring.com/privacy/ Online Seminars:\r\n                               Crowdcast, https://www.crowdcast.io/privacy-policy UX Conference Payments: Stripe, https://stripe.com/us/privacy In addition,\r\n                                we may automatically collect information about the website that you came from or are going to. We also collect information\r\n                                about the pages of this website which you visit, IP addresses, the type of browser you use and the times you access this website.\r\n                                 However,\r\n                             this information is aggregated across all visitors and we do not use it to identify you. </p> </div>', NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-02 07:20:18', '2023-12-02 04:04:21'),
(7, 'privacy', NULL, '<div class=\"container pt-4 pb-4\">\r\n    <div class=\"row justify-content-center\">\r\n        <div class=\"col-lg-8\">\r\n            <div class=\"terms-page\">\r\n              <h4>Privacy Policy</h4>\r\n              <p>\r\n                We respect your privacy. When you give us your personal\r\n                information, we use it only to fulfill the transaction or service\r\n                you have requested.\r\n              </p>\r\n              <p>\r\n                We do not subscribe you to marketing emails without your consent.\r\n                We do not sell or give away your contact information to any other\r\n                entities. We do not allow the vendors who help us process\r\n                transactions to sell or give away your information either. If you\r\n                have questions about how we use your information please contact\r\n                privacy@nngroup.com.\r\n              </p>\r\n              <h4>Detailed Privacy Policy</h4>\r\n              <p>\r\n                <b>1.SCOPE</b> <br />\r\n                This policy applies to personal information collected on websites\r\n                owned or controlled by Nielsen Norman Group (collectively referred\r\n                to in this policy as “we”, \"us\" or \"our\"). The aim of this policy\r\n                is to tell you how we will use any personal information we collect\r\n                or you provide through our websites. Please read it carefully\r\n                before you proceed. The data controller in respect of this website\r\n                is Nielsen Norman Group.\r\n              </p>\r\n              <p>\r\n                <b>2.WHAT PERSONAL INFORMATION DO WE COLLECT?</b> <br />\r\n                You do not have to give us any personal information in order to\r\n                use most of this website. However, if you wish to subscribe to our\r\n                newsletter, attend the UX Conference, attend or purchase an Online\r\n                Seminar, purchase a Research Report, or request further\r\n                information, we may collect the following personal information\r\n                from you: name, address, phone number, email address, employment\r\n                details, and employer details. We will also keep a record of any\r\n                financial transaction you make with us but we do not directly\r\n                collect, process or store your debit or credit card information.\r\n                Online payments made through this website are processed securely\r\n                by third party payment providers. <br />\r\n                We use different processors for different types of transactions\r\n                and to manage support for different services. For more information\r\n                about how your data will be handled please refer to the respective\r\n                service provider\'s privacy policy: Research Report Purchases:\r\n                FastSpring https://fastspring.com/privacy/ Online Seminars:\r\n                Crowdcast, https://www.crowdcast.io/privacy-policy UX Conference\r\n                Payments: Stripe, https://stripe.com/us/privacy In addition, we\r\n                may automatically collect information about the website that you\r\n                came from or are going to. We also collect information about the\r\n                pages of this website which you visit, IP addresses, the type of\r\n                browser you use and the times you access this website. However,\r\n                this information is aggregated across all visitors and we do not\r\n                use it to identify you.\r\n              </p>\r\n            </div>\r\n          </div>\r\n    </div>\r\n</div>', NULL, NULL, NULL, NULL, NULL, '2023-12-02 09:41:57', '2023-12-02 04:28:57'),
(9, 'about', 'We Have The Best Deals For Parking Lots!', 'Instantly book your space today. Trusted by millions', NULL, NULL, NULL, NULL, NULL, '2023-11-30 10:43:56', '2023-12-02 00:00:53'),
(10, 'Industries', 'Parking Amenities', 'Open air & Covered Parking', 'Parking open 24 hours', 'Electric Vehicle Charging', 'Electric Vehicle Charging', 'Electric Vehicle Charging', NULL, '2023-12-01 05:06:38', '2023-12-01 05:26:08'),
(11, 'Institutes', 'An excellent opportunity for Researchers/ Scientists/ Professors from top premier institutes to mark their footprint in the industrial arena (to get industrial R&D projects/ consultancy projects).', 'For the very first time, a click away method to explore the industrial problems for offering your proposed solutions.', 'One stop solution to showcase your competency/ skill / available resources/ expertise/ research outcomes to the real world problems.', NULL, NULL, NULL, NULL, '2023-12-01 07:08:51', '2023-12-01 01:46:56'),
(12, 'Analytics', 'ONBOARD INDUSTRIES', 'ONBOARDED INSTITUTES/ EXPERTS/ RESEARCHERS/ SCIENTISTS', 'LIVE QUERIES/ PROJECTS/ PROBLEMS', 'SUCCESSFULLY COMPLETED / QUERIES', NULL, NULL, NULL, '2023-12-01 07:14:00', '2023-12-01 01:46:30'),
(15, 'refund', NULL, '<div class=\"terms-page\">\r\n              <h4>Refund Policy</h4>\r\n              <p>\r\n                We respect your privacy. When you give us your personal\r\n                information, we use it only to fulfill the transaction or service\r\n                you have requested.\r\n              </p>\r\n              <p>\r\n                We do not subscribe you to marketing emails without your consent.\r\n                We do not sell or give away your contact information to any other\r\n                entities. We do not allow the vendors who help us process\r\n                transactions to sell or give away your information either. If you\r\n                have questions about how we use your information please contact\r\n                privacy@nngroup.com.\r\n              </p>\r\n              <h4>Detailed Refund Policy</h4>\r\n              <p>\r\n                <b>1.SCOPE</b> <br />\r\n                This policy applies to personal information collected on websites\r\n                owned or controlled by Nielsen Norman Group (collectively referred\r\n                to in this policy as “we”, \"us\" or \"our\"). The aim of this policy\r\n                is to tell you how we will use any personal information we collect\r\n                or you provide through our websites. Please read it carefully\r\n                before you proceed. The data controller in respect of this website\r\n                is Nielsen Norman Group.\r\n              </p>\r\n              <p>\r\n                <b>2.WHAT PERSONAL INFORMATION DO WE COLLECT?</b> <br />\r\n                You do not have to give us any personal information in order to\r\n                use most of this website. However, if you wish to subscribe to our\r\n                newsletter, attend the UX Conference, attend or purchase an Online\r\n                Seminar, purchase a Research Report, or request further\r\n                information, we may collect the following personal information\r\n                from you: name, address, phone number, email address, employment\r\n                details, and employer details. We will also keep a record of any\r\n                financial transaction you make with us but we do not directly\r\n                collect, process or store your debit or credit card information.\r\n                Online payments made through this website are processed securely\r\n                by third party payment providers. <br />\r\n                We use different processors for different types of transactions\r\n                and to manage support for different services. For more information\r\n                about how your data will be handled please refer to the respective\r\n                service provider\'s privacy policy: Research Report Purchases:\r\n                FastSpring https://fastspring.com/privacy/ Online Seminars:\r\n                Crowdcast, https://www.crowdcast.io/privacy-policy UX Conference\r\n                Payments: Stripe, https://stripe.com/us/privacy In addition, we\r\n                may automatically collect information about the website that you\r\n                came from or are going to. We also collect information about the\r\n                pages of this website which you visit, IP addresses, the type of\r\n                browser you use and the times you access this website. However,\r\n                this information is aggregated across all visitors and we do not\r\n                use it to identify you.\r\n              </p>\r\n            </div>', NULL, NULL, NULL, NULL, NULL, '2023-12-02 10:12:22', '2023-12-02 04:46:57'),
(16, 'media', NULL, '<main class=\"container pt-4 pb-4\">\r\n    <section class=\"blog-single\">\r\n      <div class=\"blog\">\r\n        <div class=\"blog-img blog-head-img\">\r\n          <img src=\"images/media1.jpg\" alt=\"\">\r\n        </div>\r\n        <div class=\"blog-content\">\r\n          <h2 class=\"blog-title\">\r\n            Weekly Newsletter: Tweets for Higher Engagements\r\n          </h2>\r\n          <p class=\"blog-desc\">\r\n            It is a long established fact that a reader will be distracted by\r\n            the readable content of a page when looking at its layout. The\r\n            point of using Lorem Ipsum is that it has a more-or-less normal\r\n            distribution of letters, as opposed to using \'Content here,\r\n            content here\', making it look like readable English.\r\n          </p>\r\n          <div class=\"blog-details\">\r\n            <div class=\"blog-author-img\">\r\n              <img src=\"images/media.jpg\" alt=\"\" />\r\n            </div>\r\n            <div class=\"blog-author-details\">\r\n              <h4 class=\"blog-author-name\">Media, Press Release</h4>\r\n              <div class=\"blog-author-desig\">AutoPark</div>\r\n            </div>\r\n          </div>\r\n        </div>\r\n      </div>\r\n    </section>\r\n\r\n    <section class=\"blog-grid pt-4\">\r\n      <div class=\"blog\">\r\n        <div class=\"blog-img\">\r\n          <img src=\"images/media.jpg\" alt=\"\">\r\n        </div>\r\n        <div class=\"blog-content blog-head-content\">\r\n          <h2 class=\"blog-title\">AutoPark adds up to 750 new parking locations</h2>\r\n          <p class=\"blog-desc\">\r\n            AutoPark adds up to 750 new parking locations to its network in US it has a more-or-less normal\r\n            distribution of letters, as opposed to using \'Content here,\r\n            content here\', making it look like readable English.\r\n          </p>\r\n          <div class=\"blog-details\">\r\n            <div class=\"blog-author-details\">\r\n              <h4 class=\"blog-author-name\">Media Release</h4>\r\n            </div>\r\n          </div>\r\n        </div>\r\n      </div>\r\n      <div class=\"blog\">\r\n        <div class=\"blog-img\">\r\n          <img\r\n              src=\"images/media1.jpg\"\r\n              alt=\"\"\r\n            />\r\n        </div>\r\n        <div class=\"blog-content blog-head-content\">\r\n          <h2 class=\"blog-title\">AutoPark adds up to 750 new parking locations</h2>\r\n          <p class=\"blog-desc\">\r\n            AutoPark adds up to 750 new parking locations to its network in US it has a more-or-less normal\r\n            distribution of letters, as opposed to using \'Content here,\r\n            content here\', making it look like readable English.\r\n          </p>\r\n          <div class=\"blog-details\">\r\n            <div class=\"blog-author-details\">\r\n              <h4 class=\"blog-author-name\">Media Release</h4>\r\n            </div>\r\n          </div>\r\n        </div>\r\n      </div>\r\n      <div class=\"blog\">\r\n        <div class=\"blog-img\">\r\n          <img\r\n              src=\"images/media1.jpg\"\r\n              alt=\"\"\r\n            />\r\n        </div>\r\n        <div class=\"blog-content blog-head-content\">\r\n          <h2 class=\"blog-title\">AutoPark adds up to 750 new parking locations</h2>\r\n          <p class=\"blog-desc\">\r\n            AutoPark adds up to 750 new parking locations to its network in US it has a more-or-less normal\r\n            distribution of letters, as opposed to using \'Content here,\r\n            content here\', making it look like readable English.\r\n          </p>\r\n          <div class=\"blog-details\">\r\n            <div class=\"blog-author-details\">\r\n              <h4 class=\"blog-author-name\">Media Release</h4>\r\n            </div>\r\n          </div>\r\n        </div>\r\n      </div>\r\n    </section>\r\n  </main>', NULL, NULL, NULL, NULL, NULL, '2023-12-02 10:56:58', '2023-12-02 05:36:04');

-- --------------------------------------------------------

--
-- Table structure for table `cms_main`
--

CREATE TABLE `cms_main` (
  `id` int NOT NULL,
  `heading1` text COLLATE utf8mb4_general_ci,
  `image1` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `info_col` text COLLATE utf8mb4_general_ci,
  `image2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `about_us` text COLLATE utf8mb4_general_ci,
  `image_r` text COLLATE utf8mb4_general_ci,
  `ev` text COLLATE utf8mb4_general_ci NOT NULL,
  `eco` text COLLATE utf8mb4_general_ci NOT NULL,
  `safe1` text COLLATE utf8mb4_general_ci NOT NULL,
  `safe2` text COLLATE utf8mb4_general_ci NOT NULL,
  `store` int NOT NULL,
  `sol` text COLLATE utf8mb4_general_ci NOT NULL,
  `image3` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `space` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `space`, `message`, `created_at`, `updated_at`) VALUES
(1, 'raushan919962@gmail.com', 'raushan919962@gmail.com', '6205834099', 'alfkjal', 'monaondo', NULL, NULL),
(2, 'raushan919962@gmail.com', 'raushan919962@gmail.com', '6205834099', 'alfkjal', 'fija;oj;ofija;ofa', NULL, NULL),
(3, 'raushan919962@gmail.com', 'raushan919962@gmail.com', '06205834099', '6166', 'ijfoajpofh;aohof', NULL, NULL),
(4, 'Raushan', 'raushan919962@gmail.com', '6205834099', 'This is test space', 'This is test space This is test space , i want to purchus this property', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'country'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country`, `type`) VALUES
(1, 'india', 'country'),
(2, 'pakistan', 'country');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kyc`
--

CREATE TABLE `kyc` (
  `id` int NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `country` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `adhar_front` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `adhar_back` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_verify` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `owner_user_id` int DEFAULT NULL,
  `unique_id` varchar(288) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `approve` varchar(60) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kyc`
--

INSERT INTO `kyc` (`id`, `fname`, `address`, `country`, `state`, `city`, `zip_code`, `adhar_front`, `adhar_back`, `is_verify`, `owner_user_id`, `unique_id`, `approve`) VALUES
(29, 'Griffith Montoya', 'Chase Merrill', 'india', 'delhi', 'Rhea Henry', 'Bert Moore', '1707396648._d5f55c77-073f-4faa-afb1-28df2bc6bf21 - Copy.jpg', '1707396648._d5f55c77-073f-4faa-afb1-28df2bc6bf21 - Copy.jpg', '1', 15, 'Quamar Weaver', 'pending'),
(33, 'Raushan kumar', 'Rohtak Rohtak', 'india', 'Haryana', 'Rohtak', '124001', '1707414641._0f66a1e6-3738-43f0-ac0c-1d3b8ffce137.jpg', '1707414641._0ed25170-3fcb-4222-a134-e6a7305db49a - Copy - Copy.jpg', '1', 14, '965940462104', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `master_table`
--

CREATE TABLE `master_table` (
  `id` int NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time(6) NOT NULL,
  `end_date` date NOT NULL,
  `end_time` time(6) NOT NULL,
  `price` varchar(6) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `master_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_table`
--

INSERT INTO `master_table` (`id`, `start_date`, `start_time`, `end_date`, `end_time`, `price`, `location`, `master_id`) VALUES
(1, '2023-12-13', '19:30:00.000000', '2023-12-15', '18:30:00.000000', NULL, 'Rohtak', NULL),
(2, '2023-12-20', '16:59:00.000000', '2023-12-19', '16:59:00.000000', NULL, 'Rohtak', NULL),
(3, '2023-12-07', '18:07:00.000000', '2023-12-19', '16:02:00.000000', NULL, 'Yahhvi Charging station @ BHRC Hospital', 3),
(4, '2023-12-29', '15:06:00.000000', '2023-12-29', '15:08:00.000000', NULL, 'Rohtak', NULL),
(5, '2023-12-06', '17:03:00.000000', '2023-12-20', '18:07:00.000000', NULL, 'Rohtak', NULL),
(6, '2023-12-07', '18:08:00.000000', '2023-12-20', '20:10:00.000000', NULL, 'Rohtak', NULL),
(7, '2023-12-20', '20:01:00.000000', '2023-12-19', '16:00:00.000000', NULL, 'Rohtak', NULL),
(8, '2023-12-19', '18:30:00.000000', '2023-12-19', '20:28:00.000000', NULL, 'Rohtak', NULL),
(9, '2023-12-19', '10:49:00.000000', '2023-12-19', '11:49:00.000000', NULL, 'Rohtak', NULL),
(10, '2023-12-19', '18:30:00.000000', '2023-12-19', '20:28:00.000000', NULL, 'Rohtak', NULL),
(11, '2023-12-19', '18:30:00.000000', '2023-12-19', '20:28:00.000000', NULL, 'Rohtak', NULL),
(12, '2023-12-20', '11:32:00.000000', '2023-12-09', '11:33:00.000000', NULL, 'Rohtak', NULL),
(13, '2023-12-20', '11:32:00.000000', '2023-12-09', '11:33:00.000000', NULL, 'Rohtak', NULL),
(14, '2023-12-20', '11:32:00.000000', '2023-12-09', '11:33:00.000000', NULL, 'Rohtak', NULL),
(15, '2023-12-20', '11:32:00.000000', '2023-12-09', '11:33:00.000000', NULL, 'Rohtak', NULL),
(16, '2023-12-28', '12:48:00.000000', '2023-12-08', '12:45:00.000000', '0.5', 'Rohtak', NULL),
(17, '2023-12-19', '15:12:00.000000', '2023-12-19', '17:12:00.000000', '444', 'Rohtak', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_09_111332_users', 1),
(6, '2023_12_09_111403_password_reset_tokens', 1),
(7, '2023_12_09_111604_users', 1),
(8, '2023_12_09_111642_password_reset_tokens', 1),
(9, '2023_12_12_084649_create_contacts_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `new_module`
--

CREATE TABLE `new_module` (
  `id` int NOT NULL,
  `images` longtext COLLATE utf8mb4_general_ci,
  `timages` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `star` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `new_module`
--

INSERT INTO `new_module` (`id`, `images`, `timages`, `text`, `star`, `type`) VALUES
(6, NULL, NULL, NULL, NULL, 'm0'),
(8, '1707038544._0f66a1e6-3738-43f0-ac0c-1d3b8ffce137 - Copy (2).jpg', NULL, NULL, NULL, 'm1'),
(9, '_0ed25170-3fcb-4222-a134-e6a7305db49a - Copy (2).jpg1707038544._0f66a1e6-3738-43f0-ac0c-1d3b8ffce137 - Copy (2).jpg', NULL, NULL, NULL, 'm2'),
(10, '1707038544._0f66a1e6-3738-43f0-ac0c-1d3b8ffce137 - Copy (2).jpg', NULL, NULL, NULL, 'm3');

-- --------------------------------------------------------

--
-- Table structure for table `owner_contact`
--

CREATE TABLE `owner_contact` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `space` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `message` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owner_contact`
--

INSERT INTO `owner_contact` (`id`, `name`, `email`, `phone`, `space`, `message`) VALUES
(1, 'raushan919962@gmail.com', 'raushan919962@gmail.com', '1234567890', 'name', 'ugjkjvkuv vjvkvkuv uhd;iohO'),
(2, 'raushan919962@gmail.com', 'raushan919962@gmail.com', '7320843886', 'This is test space', 'Laravel feature mode');

-- --------------------------------------------------------

--
-- Table structure for table `owner_user`
--

CREATE TABLE `owner_user` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'owner',
  `owner_id` int DEFAULT NULL,
  `is_verify` int NOT NULL DEFAULT '0',
  `dob` datetime(6) DEFAULT NULL,
  `kyc` varchar(15) COLLATE utf8mb4_general_ci DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owner_user`
--

INSERT INTO `owner_user` (`id`, `name`, `email`, `phone`, `password`, `updated_at`, `created_at`, `type`, `owner_id`, `is_verify`, `dob`, `kyc`) VALUES
(14, 'Raushan kumar', 'raushan919962@gmail.com', '6205834098', '$2y$12$kh/RA1vpVqVcCz/qpPDdLehDoHc9f6DMBDCrMwkZShcW15FLuqXuq', '2023-12-22 06:02:45', '2023-12-22 06:02:45', 'owner', NULL, 0, '2024-02-05 00:00:00.000000', 'no'),
(15, 'treebizz', 'treebeez305@gmail.com', '6205834099', '$2y$12$bfTuo/6MDeBd6HTbIhEOcee5rqDIkFEMT2eFY56nS6qhyP1Exv2Eq', '2024-02-07 20:54:01', '2024-02-07 20:54:01', 'owner', NULL, 0, NULL, 'no'),
(16, 'Vikash kumar', 'icubeinstitute8@gmail.com', '1234567890', '$2y$12$ALrTwidmLVXbFUDw51IIeOevqQbrCFsxIP68.hs4zqHbUZbj2kgl2', '2024-02-09 10:46:06', '2024-02-09 10:46:06', 'owner', NULL, 0, NULL, 'no'),
(17, 'shubham patel', 'icubeindustry@gmail.com', '6205834099', '$2y$12$LfjxexyfceT9yFvqj8.VweAjjVeNUl6st9FxTQCIfD8ZQYRriDDMK', '2024-02-09 10:48:47', '2024-02-09 10:48:47', 'owner', NULL, 0, NULL, 'no'),
(18, 'Dinesh', 'dineshmca500@gmail.com', '6205834099', '$2y$12$0eo0DQtp7BilWszK4zX/POg.m6PAfQNWo2JjwCxSobWJv5dlOfR1G', '2024-02-09 11:06:14', '2024-02-09 11:06:14', 'owner', NULL, 0, NULL, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `parking_space`
--

CREATE TABLE `parking_space` (
  `id` int NOT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type_of_space` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `daily` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `weekly` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `monthly` varchar(400) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hourly` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `country` varchar(400) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(400) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price` varchar(400) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(400) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `owner_id` int DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lng` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `ev_able` tinyint(1) NOT NULL DEFAULT '1',
  `ev_share` tinyint(1) NOT NULL DEFAULT '0',
  `is_verify` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parking_space`
--

INSERT INTO `parking_space` (`id`, `zip_code`, `type_of_space`, `daily`, `weekly`, `monthly`, `hourly`, `country`, `address`, `price`, `image`, `description`, `owner_id`, `lat`, `lng`, `updated_at`, `created_at`, `ev_able`, `ev_share`, `is_verify`) VALUES
(71, '12345', 'Open Lot', '15', '80', '250', '5', 'USA', '143144 Cherry St', '25.00', 'image71.jpg', 'Large outdoor parking area with security cameras', 101, '34.0522', '-118.2437', '2024-02-07 05:33:29.000000', '2024-02-07 05:33:29.000000', 1, 0, 0),
(72, '23456', 'Garage', '20', '100', '300', '8', 'USA', '145146 Pine St', '30.00', 'image72.jpg', 'Underground parking garage with controlled access', 102, '40.7128', '-74.0060', '2024-02-07 05:33:29.000000', '2024-02-07 05:33:29.000000', 1, 1, 0),
(73, '34567', 'Street Parking', '10', '60', '200', '3', 'USA', '147148 Maple St', '15.00', 'image73.jpg', 'Street parking available in a residential area', 103, '37.7749', '-122.4194', '2024-02-07 05:33:29.000000', '2024-02-07 05:33:29.000000', 0, 0, 0),
(74, '45678', 'Covered Parking', '18', '90', '275', '6', 'USA', '149150 Oak St', '28.00', 'image74.jpg', 'Covered parking garage with elevator access', 104, '51.5074', '-0.1278', '2024-02-07 05:33:29.000000', '2024-02-07 05:33:29.000000', 1, 0, 0),
(75, '56789', 'Open Lot', '12', '70', '225', '4', 'USA', '151152 Cedar St', '20.00', 'image75.jpg', 'Outdoor parking area with well-marked spaces', 105, '48.8566', '2.3522', '2024-02-07 05:33:29.000000', '2024-02-07 05:33:29.000000', 1, 1, 0),
(76, '67890', 'Garage', '25', '120', '350', '10', 'USA', '153154 Elm St', '35.00', 'image76.jpg', 'Secure indoor parking garage with surveillance', 106, '35.6895', '139.6917', '2024-02-07 05:33:29.000000', '2024-02-07 05:33:29.000000', 1, 0, 0),
(77, '78901', 'Street Parking', '8', '50', '180', '2', 'USA', '155156 Walnut St', '12.00', 'image77.jpg', 'Street parking available with close proximity to restaurants', 107, '37.7749', '-122.4194', '2024-02-07 05:33:29.000000', '2024-02-07 05:33:29.000000', 0, 1, 0),
(78, '89012', 'Covered Parking', '22', '110', '325', '7', 'USA', '157158 Pinecrest St', '32.00', 'image78.jpg', 'Covered parking garage with dedicated handicapped spots', 108, '35.6894', '51.3946', '2024-02-07 05:33:29.000000', '2024-02-07 05:33:29.000000', 1, 1, 0),
(79, '90123', 'Open Lot', '14', '75', '240', '4', 'USA', '159160 Birch St', '22.00', 'image79.jpg', 'Outdoor parking area with 24/7 security', 109, '41.8781', '-87.6298', '2024-02-07 05:33:29.000000', '2024-02-07 05:33:29.000000', 1, 0, 0),
(80, '01234', 'Garage', '30', '150', '400', '12', 'USA', '161162 Oakwood St', '40.00', 'image80.jpg', 'Indoor parking garage with valet service', 110, '52.3667', '4.8945', '2024-02-07 05:33:29.000000', '2024-02-07 05:33:29.000000', 1, 1, 0),
(81, '12345', 'Open Lot', '15', '80', '250', '5', 'USA', '163164 Cherry St', '25.00', 'image81.jpg', 'Large outdoor parking area with security cameras', 14, '34.0522', '-118.2437', '2024-02-07 05:33:48.000000', '2024-02-07 05:33:48.000000', 1, 0, 1),
(82, '23456', 'Garage', '20', '100', '300', '8', 'USA', '165166 Pine St', '30.00', 'image82.jpg', 'Underground parking garage with controlled access', 14, '40.7128', '-74.0060', '2024-02-07 05:33:48.000000', '2024-02-07 05:33:48.000000', 1, 1, 0),
(83, '34567', 'Street Parking', '10', '60', '200', '3', 'USA', '167168 Maple St', '15.00', 'image83.jpg', 'Street parking available in a residential area', 14, '37.7749', '-122.4194', '2024-02-07 05:33:48.000000', '2024-02-07 05:33:48.000000', 0, 0, 0),
(84, '45678', 'Covered Parking', '18', '90', '275', '6', 'USA', '169170 Oak St', '28.00', 'image84.jpg', 'Covered parking garage with elevator access', 14, '51.5074', '-0.1278', '2024-02-07 05:33:48.000000', '2024-02-07 05:33:48.000000', 1, 0, 0),
(85, '56789', 'Open Lot', '12', '70', '225', '4', 'USA', '171172 Cedar St', '20.00', 'image85.jpg', 'Outdoor parking area with well-marked spaces', 14, '48.8566', '2.3522', '2024-02-07 05:33:48.000000', '2024-02-07 05:33:48.000000', 1, 1, 0),
(86, '67890', 'Garage', '25', '120', '350', '10', 'USA', '173174 Elm St', '35.00', 'image86.jpg', 'Secure indoor parking garage with surveillance', 14, '35.6895', '139.6917', '2024-02-07 05:33:48.000000', '2024-02-07 05:33:48.000000', 1, 0, 0),
(87, '78901', 'Street Parking', '8', '50', '180', '2', 'USA', '175176 Walnut St', '12.00', 'image87.jpg', 'Street parking available with close proximity to restaurants', 14, '37.7749', '-122.4194', '2024-02-07 05:33:48.000000', '2024-02-07 05:33:48.000000', 0, 1, 0),
(88, '89012', 'Covered Parking', '22', '110', '325', '7', 'USA', '177178 Pinecrest St', '32.00', 'image88.jpg', 'Covered parking garage with dedicated handicapped spots', 14, '35.6894', '51.3946', '2024-02-07 05:33:48.000000', '2024-02-07 05:33:48.000000', 1, 1, 0),
(89, '90123', 'Open Lot', '14', '75', '240', '4', 'USA', '179180 Birch St', '22.00', 'image89.jpg', 'Outdoor parking area with 24/7 security', 14, '41.8781', '-87.6298', '2024-02-07 05:33:48.000000', '2024-02-07 05:33:48.000000', 1, 0, 0),
(90, '01234', 'Garage', '30', '150', '400', '12', 'USA', '181182 Oakwood St', '40.00', 'image90.jpg', 'Indoor parking garage with valet service', 14, '52.3667', '4.8945', '2024-02-07 05:33:48.000000', '2024-02-07 05:33:48.000000', 1, 1, 0),
(91, '12345', 'Open Lot', '15', '80', '250', '5', 'USA', '183184 Cherry St', '25.00', 'image91.jpg', 'Large outdoor parking area with security cameras', 14, '34.0522', '-118.2437', '2024-02-07 05:35:31.000000', '2024-02-07 05:35:31.000000', 1, 0, 0),
(92, '23456', 'Garage', '20', '100', '300', '8', 'USA', '185186 Pine St', '30.00', 'image92.jpg', 'Underground parking garage with controlled access', 14, '40.7128', '-74.0060', '2024-02-07 05:35:31.000000', '2024-02-07 05:35:31.000000', 1, 1, 0),
(93, '34567', 'Street Parking', '10', '60', '200', '3', 'USA', '187188 Maple St', '15.00', 'image93.jpg', 'Street parking available in a residential area', 14, '37.7749', '-122.4194', '2024-02-07 05:35:31.000000', '2024-02-07 05:35:31.000000', 0, 0, 0),
(94, '45678', 'Covered Parking', '18', '90', '275', '6', 'USA', '189190 Oak St', '28.00', 'image94.jpg', 'Covered parking garage with elevator access', 14, '51.5074', '-0.1278', '2024-02-07 05:35:31.000000', '2024-02-07 05:35:31.000000', 1, 0, 0),
(95, '56789', 'Open Lot', '12', '70', '225', '4', 'USA', '191192 Cedar St', '20.00', 'image95.jpg', 'Outdoor parking area with well-marked spaces', 14, '48.8566', '2.3522', '2024-02-07 05:35:31.000000', '2024-02-07 05:35:31.000000', 1, 1, 0),
(96, '67890', 'Garage', '25', '120', '350', '10', 'USA', '193194 Elm St', '35.00', 'image96.jpg', 'Secure indoor parking garage with surveillance', 14, '35.6895', '139.6917', '2024-02-07 05:35:31.000000', '2024-02-07 05:35:31.000000', 1, 0, 0),
(97, '78901', 'Street Parking', '8', '50', '180', '2', 'USA', '195196 Walnut St', '12.00', 'image97.jpg', 'Street parking available with close proximity to restaurants', 14, '37.7749', '-122.4194', '2024-02-07 05:35:31.000000', '2024-02-07 05:35:31.000000', 0, 1, 0),
(98, '89012', 'Covered Parking', '22', '110', '325', '7', 'USA', '197198 Pinecrest St', '32.00', 'image98.jpg', 'Covered parking garage with dedicated handicapped spots', 14, '35.6894', '51.3946', '2024-02-07 05:35:31.000000', '2024-02-07 05:35:31.000000', 1, 1, 0),
(99, '90123', 'Open Lot', '14', '75', '240', '4', 'USA', '199200 Birch St', '22.00', 'image99.jpg', 'Outdoor parking area with 24/7 security', 14, '41.8781', '-87.6298', '2024-02-07 05:35:31.000000', '2024-02-07 05:35:31.000000', 1, 0, 0),
(100, '01234', 'Garage', '30', '150', '400', '12', 'USA', '201202 Oakwood St', '40.00', 'image100.jpg', 'Indoor parking garage with valet service', 14, '52.3667', '4.8945', '2024-02-07 05:35:31.000000', '2024-02-07 05:35:31.000000', 1, 1, 0),
(101, '12345', 'Open Lot', '15', '80', '250', '5', 'USA', '203204 Cherry St', '25.00', 'image101.jpg', 'Large outdoor parking area with security cameras', 14, '34.0522', '-118.2437', '2024-02-07 05:36:23.000000', '2024-02-07 05:36:23.000000', 1, 0, 0),
(102, '23456', 'Garage', '20', '100', '300', '8', 'USA', '205206 Pine St', '30.00', 'image102.jpg', 'Underground parking garage with controlled access', 14, '40.7128', '-74.0060', '2024-02-07 05:36:23.000000', '2024-02-07 05:36:23.000000', 1, 1, 0),
(103, '34567', 'Street Parking', '10', '60', '200', '3', 'USA', '207208 Maple St', '15.00', 'image103.jpg', 'Street parking available in a residential area', 14, '37.7749', '-122.4194', '2024-02-07 05:36:23.000000', '2024-02-07 05:36:23.000000', 0, 0, 0),
(104, '45678', 'Covered Parking', '18', '90', '275', '6', 'USA', '209210 Oak St', '28.00', 'image104.jpg', 'Covered parking garage with elevator access', 14, '51.5074', '-0.1278', '2024-02-07 05:36:23.000000', '2024-02-07 05:36:23.000000', 1, 0, 0),
(105, '56789', 'Open Lot', '12', '70', '225', '4', 'USA', '211212 Cedar St', '20.00', 'image105.jpg', 'Outdoor parking area with well-marked spaces', 14, '48.8566', '2.3522', '2024-02-07 05:36:23.000000', '2024-02-07 05:36:23.000000', 1, 1, 0),
(106, '67890', 'Garage', '25', '120', '350', '10', 'USA', '213214 Elm St', '35.00', 'image106.jpg', 'Secure indoor parking garage with surveillance', 14, '35.6895', '139.6917', '2024-02-07 05:36:23.000000', '2024-02-07 05:36:23.000000', 1, 0, 0),
(107, '78901', 'Street Parking', '8', '50', '180', '2', 'USA', '215216 Walnut St', '12.00', 'image107.jpg', 'Street parking available with close proximity to restaurants', 14, '37.7749', '-122.4194', '2024-02-07 05:36:23.000000', '2024-02-07 05:36:23.000000', 0, 1, 0),
(108, '89012', 'Covered Parking', '22', '110', '325', '7', 'USA', '217218 Pinecrest St', '32.00', 'image108.jpg', 'Covered parking garage with dedicated handicapped spots', 14, '35.6894', '51.3946', '2024-02-07 05:36:23.000000', '2024-02-07 05:36:23.000000', 1, 1, 0),
(109, '90123', 'Open Lot', '14', '75', '240', '4', 'USA', '219220 Birch St', '22.00', 'image109.jpg', 'Outdoor parking area with 24/7 security', 14, '41.8781', '-87.6298', '2024-02-07 05:36:23.000000', '2024-02-07 05:36:23.000000', 1, 0, 0),
(110, '01234', 'Garage', '30', '150', '400', '12', 'USA', '221222 Oakwood St', '40.00', 'image110.jpg', 'Indoor parking garage with valet service', 14, '52.3667', '4.8945', '2024-02-07 05:36:23.000000', '2024-02-07 05:36:23.000000', 1, 1, 0),
(111, '124001', 'Private storage', '55', '2222', '44', NULL, 'india', 'Rohtak Rohtak', NULL, '1707416246._0f93544f-5e2e-4f8e-a746-7e1c4e9556f1 - Copy - Copy.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 14, NULL, NULL, NULL, NULL, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `parking_spots`
--

CREATE TABLE `parking_spots` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parking_spots`
--

INSERT INTO `parking_spots` (`id`, `name`, `is_available`, `created_at`, `updated_at`) VALUES
(2, 'Delhi', 1, NULL, NULL),
(3, 'Bob Johnson', 1, '2023-01-03 09:50:00', '2023-01-03 10:30:00'),
(4, 'Alice Brown', 1, '2023-01-04 02:30:00', '2023-01-04 03:00:00'),
(5, 'Charlie Davis', 0, '2023-01-05 09:00:00', '2023-01-05 09:30:00'),
(6, 'Eva White', 1, '2023-01-06 05:40:00', '2023-01-06 06:15:00'),
(7, 'Frank Miller', 0, '2023-01-07 08:15:00', '2023-01-07 08:45:00'),
(8, 'Grace Taylor', 1, '2023-01-08 11:00:00', '2023-01-08 11:30:00'),
(9, 'Harry Johnson', 0, '2023-01-09 04:30:00', '2023-01-09 05:00:00'),
(10, 'Ivy Martin', 1, '2023-01-10 07:15:00', '2023-01-10 07:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('raushan919962@gmail.com', 'AZboZ5yffZPxgsUk3exZOL1c9OrniSJm0mAeqzdiBhajZNDrjl5pkS5ZRPaTLAx4', '2024-02-08 00:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recent_order`
--

CREATE TABLE `recent_order` (
  `id` int NOT NULL,
  `order_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `delivary_date` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `order_price` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int DEFAULT NULL,
  `owner_id` int DEFAULT NULL,
  `checkin_time` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `checkout_time` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'booked',
  `invoice` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `parking_id` int DEFAULT NULL,
  `rating` int DEFAULT NULL,
  `feedback` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recent_order`
--

INSERT INTO `recent_order` (`id`, `order_name`, `order_id`, `order_date`, `delivary_date`, `order_price`, `user_id`, `owner_id`, `checkin_time`, `checkout_time`, `status`, `invoice`, `created_at`, `updated_at`, `parking_id`, `rating`, `feedback`) VALUES
(303, '579 Cedar St', '65a918e37f1b3', '2024-01-27 14:21:00.000000', '2024-01-27 14:18:00.000000', '1.15', NULL, NULL, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKOaxpK0GMgauT-utQr86LBYlKZD73jzjoSQ0Pw7CVrYDtlcrDYL7GOxfaAaV1olJFPgwf8ebwWvilhCl', '2024-01-18 12:28:24', '2024-01-18 12:28:24', NULL, NULL, NULL),
(304, 'Delhi', '65a91edbe6756', '2024-01-18 12:50:00.000000', '2024-01-18 14:50:00.000000', '46', 10, 24, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKN69pK0GMgbJPJkIAEs6LBZdOssmhNFl8rYKb_aFiOpdxWkMBwCMDxO99Fp4rc6oQfiQXTXzOra_7jLN', '2024-01-18 12:51:40', '2024-01-18 12:51:40', 14, 4, 'Parking Facility Very Well'),
(305, 'Delhi', '65aa78b8060af', '2024-01-26 14:25:00.000000', '2024-01-20 16:25:00.000000', '46', 10, 24, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKLXxqa0GMgbygnGHHm86LBaoIJ3khCkJg_OGH_r0Ycs7yWGoZvHe-4cPAxAYrPW_rOd6Zbyb9g6lRmso', '2024-01-19 13:27:20', '2024-01-19 13:27:20', 14, 4, 'Parking Facility Very Well'),
(306, 'Delhi', '65b35e24a057a', '2024-01-31 11:26:00.000000', '2024-02-01 22:23:00.000000', '251.85', 10, 24, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKJ-8za0GMgaHGNdeeSI6LBaWL9JTf4Okk-tCKtgSjoDeoXpL3VQSvFnURkkDGlB_G-PUJB2dEH2vJn5U', '2024-01-26 07:24:20', '2024-01-26 07:24:20', 14, 1, 'Parking Facility Very Well'),
(307, '690 Fir St', '65b3620f63b78', '2024-01-26 07:32:00.000000', '2024-01-26 09:32:00.000000', '46', 10, 33, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKJHEza0GMgbW-sBB9fM6LBbnhGBIfNFv4D0ijqiBxvZTvl88J_sjgCn_txxpe0HVreJDMijjRxr6-Gpc', '2024-01-26 07:41:03', '2024-01-26 07:41:03', 9, 3, 'Parking Facility Very Well'),
(308, '579 Cedar St', '65b362a3c7daa', '2024-02-10 00:36:00.000000', '2024-02-17 09:36:00.000000', '207', 10, 32, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKKbFza0GMgbTdwji2AM6LBatzq5MtZH24jdwuAbMG7uBVsenr70iuiYLkvFY59vZ--kKqbRx2TxAAYT6', '2024-01-26 07:43:31', '2024-01-26 07:43:31', 8, 5, 'Parking Facility Very Well'),
(309, 'Delhi', '65b4975a07ddb', '2024-01-27 05:32:00.000000', '2024-01-27 07:32:00.000000', '46', 10, 24, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKNau0q0GMgY_szrDJCI6LBYauikavJ97M2ZCM5Ltk68rb4C5LE7GWGk9E1Imn5eqwMLPBA_n7uXie221', '2024-01-27 05:40:42', '2024-01-27 05:40:42', 14, 3, 'Parking Facility Very Well'),
(310, 'Delhi', '65b49e745fe27', '2024-02-10 20:11:00.000000', '2024-01-27 08:09:00.000000', '54096', 10, 24, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKPe80q0GMgaYUBaG7VQ6LBbq00QA-Bw6NTEDFiy0aPjYE789ppDEnDt03uoGODTQP1Z7RwEU__3xU7o5', '2024-01-27 06:11:00', '2024-01-27 06:11:00', 14, 2, 'Parking Facility Very Welldj'),
(311, 'Delhi', '65b49fa37d744', '2024-02-09 18:17', '2024-01-27 08:15', '50232', 10, 24, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKKa_0q0GMgboY-_eykU6LBa9dau4kwXMylApyWLdIRSCrzY1wQnzuW0yNb0sAlgrAnfjak9shr5oTNtv', '2024-01-27 06:16:03', '2024-01-27 06:16:03', 14, 4, 'Parking Facility Very Well'),
(312, '456 Oak St', '65b4fc29cc6f7', '2024-01-31 12:50', '2024-01-30 14:50', '506', 10, 26, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKKz4060GMgb2lgulEnM6LBbTrtkY4_H1j4D3XSeT19W2BD_WqdL_2G4W5rUab0wEtmD4JfKGnTv8hXhj', '2024-01-27 12:50:49', '2024-01-27 12:50:49', 2, 5, 'Parking Facility Very Well'),
(313, 'Delhi', '65b4fd9b9b869', '2024-02-10 01:56', '2024-02-13 04:56', '69', 10, 24, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKJ37060GMgbNNxqnszM6LBZYzm3OacPMSJC0pYj7p6HQwTVvSLqv2ecir_iMOE4Lih_zwiUEhf3Nz2c3', '2024-01-27 12:56:59', '2024-01-27 12:56:59', 14, 4, 'Parking Facility Very Well'),
(314, 'Delhi', '65b4fe16b1b69', '2024-01-28 12:57', '2024-01-28 14:57', '46', 10, 24, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKJj8060GMgaYfo7SGWQ6LBar0S7X3TSTHYEK53qt-ccRIpC4ZEMhW0S63d-tCO-9ydOGj7pWwMOCBrPJ', '2024-01-27 12:59:02', '2024-01-27 12:59:02', 14, NULL, NULL),
(315, 'Delhi', '65b4fece2ed0e', '2024-01-29 12:57', '2024-01-30 14:57', '46', 10, 24, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKND9060GMgbi0uw5ugA6LBZFJA9vU9kV6mVB6k4RcUzdqufVPP-w0scenjEvTBWWeFnABJyoR4atxHNo', '2024-01-27 13:02:06', '2024-01-27 13:02:06', 14, NULL, NULL),
(316, 'Delhi', '65b4fffc4d38c', '2024-02-08 14:05', '2024-02-09 16:05', '46', 10, 24, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKO3_060GMgYVgdNmhUs6LBbwIQYHMs8Ate2duW3asoMp25I_wAFjhXw4Gg_xhZdcKDD2BSaNcuDzkMR7', '2024-01-27 13:07:08', '2024-01-27 13:07:08', 14, NULL, NULL),
(317, '579 Cedar St', '65b50107dffa8', '2024-03-02 13:10', '2024-01-27 15:10', '563040', 10, 32, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKIqC1K0GMgZwBL4W_Ks6LBbnVLFh_utM6G17U4cg8-_pxlievlbL9IQchGXhPIoLaJWoj3haVYqiQWQE', '2024-01-27 13:11:36', '2024-01-27 13:11:36', 8, NULL, NULL),
(318, '123 Main St', '65b5020fa6602', '2024-01-27 13:14', '2024-01-27 15:14', '46', 10, 25, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKJKE1K0GMgYP0gAVCQg6LBYGjKt3bt-NBggOfPcMGR6HsRQ0lmZbaswxmfrjQYJcyQELsfp4dwWM5scZ', '2024-01-27 13:15:59', '2024-01-27 13:15:59', 1, NULL, NULL),
(319, '123 Main St', '65b50263d33b8', '2024-01-27 13:14', '2024-01-27 15:14', '46', 10, 25, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKOaE1K0GMgZuRHRFeRM6LBZ2yJsFJOACRVxFbyf5Yypc81WjHDmApJ6y9mPkdxpXTZ8oeIDnzItAcS9j', '2024-01-27 13:17:23', '2024-01-27 13:17:23', 1, NULL, NULL),
(320, '468 Birch St', '65b5038de0417', '2024-01-27 13:21', '2024-01-27 15:21', '46', 10, 31, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKJCH1K0GMgbDQDFcJvA6LBYf0np-RAx_j_3000jJXf4HQxIJY3Tdvm2UJ2dnnxYpqtuMVN5llDSqk7VP', '2024-01-27 13:22:21', '2024-01-27 13:22:21', 7, NULL, NULL),
(321, '468 Birch St', '65b505a309516', '2024-01-27 13:21', '2024-01-27 15:21', '46', 10, 31, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKKWL1K0GMgYehccZJGo6LBb4UkfWDGW-xswuHMODf-wdKsXIFo5OqctHFcDgB_0DLRGd-oiUVRMxfIj_', '2024-01-27 13:31:15', '2024-01-27 13:31:15', 7, NULL, NULL),
(322, '579 Cedar St', '65b50897e8aaa', '2024-02-03 17:45', '2024-02-04 15:42', '504.85', 10, 32, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKJqR1K0GMgbVw2VZDFs6LBaebEV86_VeDs46G9Kik_BAQUFatXUxvgKBscsIinZDlbBW121qfHpIRybj', '2024-01-27 13:43:52', '2024-01-27 13:43:52', 8, NULL, NULL),
(323, '579 Cedar St', '65b509a646f87', '2024-01-28 13:47', '2024-01-27 15:47', '506', 10, 32, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKKiT1K0GMgaBPiZYt9Y6LBYFkZomI2q1f0xuQRJLg5aW5V-ih8BRQCdO5TqVB_3VVyeZG9dyPy8D9J_P', '2024-01-27 13:48:22', '2024-01-27 13:48:22', 8, NULL, NULL),
(324, '579 Cedar St', '65b50a3969692', '2024-01-28 13:50', '2024-01-27 15:50', '506', 10, 32, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKLuU1K0GMgbOVTS-gZg6LBYSDyfcgzplMwuzfXCBxS878veOIrKABt6z2i0wyNNHAh-WcQ_VP6_xI2Re', '2024-01-27 13:50:49', '2024-01-27 13:50:49', 8, 5, 'new'),
(325, '468 Birch St', '65bcec8e55e1d', '2024-02-02 13:21', '2024-02-02 15:21', '2.2', 10, 31, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKJDZ860GMgY5bR0Blx06LBZHby3w05lJcRHG919Lfx4lUXgAMbJUYZLYPV5vZsLrC94c-H66kWmvRoqf', '2024-02-02 13:22:22', '2024-02-02 13:22:22', 7, 5, 'Parking Facility Very Well'),
(326, 'Delhi', '65bced37af01a', '2024-02-02 13:23', '2024-02-02 15:23', '2.2', 10, 24, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKLra860GMgYj6NmPBuM6LBY6SY-6CgZmdHQEu3lXnGSgZthJ0WqIZEH9iv4wE4rzXNTEcky7ANbiRUpj', '2024-02-02 13:25:11', '2024-02-02 13:25:11', 14, 5, 'Parking Facility Very Well'),
(327, 'patna', '65bcef0e3f251', '2024-02-02 13:28', '2024-02-02 15:28', '2.2', 10, 55, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKJDe860GMgY6g6CKnks6LBZ9eZZRwCvwp9zy9jNkImRGuiadFKX6u4gt8Yq4afG9THbtN5wBx-Z6HVC5', '2024-02-02 13:33:02', '2024-02-02 13:33:02', 14, 5, 'Parking Facility Very Well'),
(328, 'punjab', '65c235cd9690a', '2024-02-06 13:35', '2024-02-06 15:35', '2.5', 10, 56, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKMzriK4GMgYYcEYFoz46LBYdlD39t5_zT8eIOacwHkPlD3ghoyotwMQRbG0narhSoRCEg3oz04A3ifv5', '2024-02-06 13:36:13', '2024-02-06 13:36:13', 14, 5, 'Parking Facility Very Well'),
(329, 'patna', '65c25b96b988f', '2024-02-06 16:16', '2024-02-06 18:16', '2.5', 10, 55, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKJi3ia4GMga3InePG-Y6LBY4_j8Su7TttBXu1pirWvXBzPuTBDSXwiiPskVw9HjnvFUgNoNwU6vaDOqE', '2024-02-06 16:17:26', '2024-02-06 16:17:26', 14, 5, 'Parking Facility Very Well'),
(330, 'Delhi', '65c2792d92a23', '2024-02-22 18:21', '2024-02-22 20:21', '2.5', 10, 24, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKKzyia4GMgafM0ajCKI6LBYo1-LKQcyYtIGTC1Run7aixoigRcOOaQxPAjQt8wuayqigowc9c0h5zOPD', '2024-02-06 18:23:41', '2024-02-06 18:23:41', 14, 5, 'Parking Facility Very Well'),
(331, '147148 Maple St', '65c31c37789b4', '2024-02-07 05:58', '2024-02-07 07:58', '2.5', 10, 73, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKLS4jK4GMgYEmLOb0dk6LBZV3l67Xpjot1Va34rfHQZ2M24c8lZOte6Svx7XRe9reaA2S-Pk5glpx_R4', '2024-02-07 05:59:19', '2024-02-07 05:59:19', 103, NULL, NULL),
(332, '145146 Pine St', '65c332422854c', '2024-02-15 06:31', '2024-02-22 08:31', '2.5', 10, 72, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKL_kjK4GMgaeFSzPBPs6LBZ8mnjXqGKRBuVF7hGQ_b8dYbdEGYBbGL090BpuYP6SazSsYiN85m4GS3uX', '2024-02-07 07:33:22', '2024-02-07 07:33:22', 102, 5, 'Parking Facility Very Well'),
(333, '145146 Pine St', '65c333d8325c3', '2024-03-29 13:44', '2024-04-06 15:44', '1680', 10, 72, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKNfnjK4GMgYcPoOuHPI6LBYI8Rjfz7wjf4oJZUdUBAAHMG-XE_cDo1jX3UC0gLLsFYcUKgOhd7bw2o3R', '2024-02-07 07:40:08', '2024-02-07 07:40:08', 102, 5, 'Parking Facility Very Well'),
(334, '151152 Cedar St', '65c33789636cb', '1970-01-01 00:00', '1970-01-01 00:00', '2.5', 10, 75, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKIjvjK4GMgZeNXBSizE6LBZ2ZH68NfY3pvrMnA3Xpv36_aa9ZBBuBYOqlRz4AGYDJQN2FO18RJf9aL1p', '2024-02-07 07:55:53', '2024-02-07 07:55:53', 105, 5, 'Parking Facility Very Well'),
(335, '149150 Oak St', '65c3383e0f6dd', '1970-01-01 00:00', '1970-01-01 00:00', '2.5', 10, 74, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKL3wjK4GMgYwchkvAzU6LBayH4LfQQdHvmOPNLu_OGFiOMFKn_NFA7tITY0rTjGrMSHANrSnHLilkXDy', '2024-02-07 07:58:54', '2024-02-07 07:58:54', 104, 4, 'Parking Facility Very Well'),
(336, '157158 Pinecrest St', '65c339ad7b39f', '1970-01-01 00:00', '1970-01-01 00:00', '2.5', 10, 78, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKK3zjK4GMgaJKZEycL46LBYjYCLEqy5mhhplAZQYV2Exq-zpZ5eot2BpiaFWLeCE71_skgiY_8mfP2f7', '2024-02-07 08:05:01', '2024-02-07 08:05:01', 108, 4, 'Parking Facility Very Well'),
(337, '161162 Oakwood St', '65c33b101d73c', '1970-01-01 00:00', '1970-01-01 00:00', '7.5', 10, 80, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKI_2jK4GMgZp9QvmUUU6LBbxcOxLc2jBfBDWulW114z0GhSUbRF28k4ejAI10qBy4OEFswljeIMQcK-K', '2024-02-07 08:10:56', '2024-02-07 08:10:56', 110, 5, 'Parking Facility Very Well'),
(338, '143144 Cherry St', '65c33c8a72272', '1970-01-01 00:00', '1970-01-01 00:00', '2.5', 10, 71, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKIr5jK4GMgbowEYVhz86LBbzul4zmaiyUuSdkS2179nTWO7sDbaTWbmv9Pjuaeb5bBwAwtBZiYYxxxWB', '2024-02-07 08:17:14', '2024-02-07 08:17:14', 101, 5, 'Parking Facility Very Well'),
(339, '145146 Pine St', '65c354ba64a69', '1970-01-01 00:00', '1970-01-01 00:00', '2.5', 10, 72, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKLmpja4GMgZ3u225AMs6LBaZXiCQBTNJSUVl8gQdgCjquOj-9c2ddedkGIpyJddU5wp1iPNk-tZNkBc8', '2024-02-07 10:00:26', '2024-02-07 10:00:26', 102, 5, 'Parking Facility Very Well'),
(340, '153154 Elm St', '65c3558d95943', '1970-01-01 00:00', '1970-01-01 00:00', '2.5', 10, 76, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKI2rja4GMgbWhyrd4HQ6LBYKYK8q9Hzmc-j7ecUwsOheWkLdNT3Co7ybcijXF0uWkFMVWW_4h1lMkmQf', '2024-02-07 10:03:57', '2024-02-07 10:03:57', 106, 5, 'Parking Facility Very Well'),
(341, '143144 Cherry St', '65c383b173e65', '1970-01-01 00:00', '1970-01-01 00:00', '37.7', 10, 71, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKLCHjq4GMgaWK7m3NTw6LBbKZ6_rg_tlPcgrh_CrG13KHfcVJvYJreS-UsTCxk3TMVOYWN1cNjTs32e4', '2024-02-07 13:20:49', '2024-02-07 13:20:49', 101, 3, 'Parking Facility Very Well'),
(342, '151152 Cedar St', '65c3c12d6c88d', '1970-01-01 00:00', '1970-01-01 00:00', '30.26', 10, 75, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKKyCj64GMgYGT8_ydEU6LBYQ8_KhK7jrionqpZCLKZyTy7_K441an4KEL_CKa0yEiZAyUuM2MgMRwTJu', '2024-02-07 17:43:09', '2024-02-07 17:43:09', 105, 5, 'Parking Facility Very Well'),
(343, '143144 Cherry St', '65c3c1d4abcc3', '1970-01-01 00:00', '1970-01-01 00:00', '37.7', 10, 71, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKNeDj64GMgb4q0UQt-Y6LBaff599-eGj9peegLIsTj755TY32xpbELW8gfjTqcnwpb7ZORwcQCV1BcH3', '2024-02-07 17:45:56', '2024-02-07 17:45:56', 101, 3, 'Parking Facility Very Well'),
(344, '151152 Cedar St', '65c3c2c4bf2c0', '1970-01-01 00:00', '1970-01-01 00:00', '40669.44', 10, 75, NULL, NULL, 'booked', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTWxzS3JEQXk5ZXdwQ1BGKMeFj64GMgZi0cjVh-06LBaxR011mGZR3j5PavOip3ZXDW0oS73X_2z4V5f0e4XR826dxr-ewOoRwQ34', '2024-02-07 17:49:56', '2024-02-07 17:49:56', 105, 1, 'Parking Facility Very Well');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `parking_spot_id` bigint UNSIGNED DEFAULT NULL,
  `reservation_start_time` datetime NOT NULL,
  `reservation_end_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `parking_spot_id`, `reservation_start_time`, `reservation_end_time`, `created_at`, `updated_at`, `type`) VALUES
(75, 10, 24, '2023-12-25 13:30:00', '2023-12-25 15:30:00', NULL, NULL, NULL),
(76, 10, 24, '2023-12-26 13:31:00', '2023-12-26 15:31:00', NULL, NULL, NULL),
(77, 10, 25, '2023-12-25 13:34:00', '2023-12-25 15:34:00', NULL, NULL, NULL),
(78, 10, 29, '2023-12-25 13:43:00', '2023-12-25 15:43:00', NULL, NULL, NULL),
(79, 10, 24, '2023-12-25 16:43:00', '2023-12-25 18:43:00', NULL, NULL, NULL),
(80, 10, 35, '2023-12-25 16:45:00', '2023-12-25 18:45:00', NULL, NULL, NULL),
(81, 10, 26, '2023-12-26 06:03:00', '2023-12-26 08:03:00', NULL, NULL, NULL),
(82, 10, 26, '2023-12-27 06:05:00', '2023-12-27 08:05:00', NULL, NULL, NULL),
(83, 10, 25, '2023-12-27 06:57:00', '2023-12-27 08:57:00', NULL, NULL, NULL),
(84, 10, 35, '2023-12-30 18:33:00', '2024-01-01 07:32:00', NULL, NULL, NULL),
(85, 10, 24, '2023-12-30 19:08:00', '2024-01-01 08:07:00', NULL, NULL, NULL),
(86, 10, 35, '2023-12-29 07:02:00', '2023-12-29 09:02:00', NULL, NULL, NULL),
(87, 10, 24, '2024-01-01 18:09:00', '2024-01-01 20:09:00', NULL, NULL, NULL),
(88, 10, 24, '2024-01-17 13:12:00', '2024-01-17 15:12:00', NULL, NULL, NULL),
(89, 10, 24, '2024-01-19 13:58:00', '2024-01-19 15:58:00', NULL, NULL, NULL),
(90, 10, 24, '2024-01-17 07:20:00', '2024-01-17 09:20:00', NULL, NULL, NULL),
(91, 10, 24, '2024-01-17 10:02:00', '2024-01-17 12:02:00', NULL, NULL, NULL),
(92, 10, 24, '2024-01-25 01:41:00', '2024-01-26 15:41:00', NULL, NULL, NULL),
(93, 10, 24, '2024-01-18 09:30:00', '2024-01-18 11:30:00', NULL, NULL, NULL),
(94, 10, 24, '2024-01-27 14:21:00', '2024-01-27 14:18:00', NULL, NULL, NULL),
(95, 10, 32, '2024-01-27 14:21:00', '2024-01-27 14:18:00', NULL, NULL, NULL),
(96, 10, 24, '2024-01-18 12:50:00', '2024-01-18 14:50:00', NULL, NULL, NULL),
(97, 10, 24, '2024-01-20 14:25:00', '2024-01-20 16:25:00', NULL, NULL, NULL),
(98, 10, 24, '2024-01-31 11:26:00', '2024-02-01 22:23:00', NULL, NULL, NULL),
(99, 10, 33, '2024-01-26 07:32:00', '2024-01-26 09:32:00', NULL, NULL, NULL),
(100, 10, 32, '2024-02-10 00:36:00', '2024-02-17 09:36:00', NULL, NULL, NULL),
(101, 10, 32, '2024-01-26 11:24:00', '2024-01-27 02:24:00', NULL, NULL, NULL),
(102, 10, 24, '2024-01-27 05:32:00', '2024-01-27 07:32:00', NULL, NULL, NULL),
(103, 10, 24, '2024-02-10 20:11:00', '2024-01-27 08:09:00', NULL, NULL, NULL),
(104, 10, 24, '2024-02-09 18:17:00', '2024-01-27 08:15:00', NULL, NULL, NULL),
(105, 10, 58, '2024-01-27 06:47:00', '2024-01-27 08:47:00', NULL, NULL, NULL),
(106, 10, 32, '2024-01-27 07:31:00', '2024-01-27 09:31:00', NULL, NULL, NULL),
(107, 10, 26, '2024-01-27 07:33:00', '2024-01-30 09:33:00', NULL, NULL, NULL),
(108, 10, 26, '2024-01-31 12:50:00', '2024-01-30 14:50:00', NULL, NULL, NULL),
(109, 10, 24, '2024-02-10 01:56:00', '2024-02-13 04:56:00', NULL, NULL, NULL),
(110, 10, 24, '2024-01-28 12:57:00', '2024-01-28 14:57:00', NULL, NULL, NULL),
(111, 10, 24, '2024-01-29 12:57:00', '2024-01-30 14:57:00', NULL, NULL, NULL),
(112, 10, 24, '2024-02-08 14:05:00', '2024-02-09 16:05:00', NULL, NULL, NULL),
(113, 10, 24, '2024-02-06 15:10:00', '2024-02-07 16:09:00', NULL, NULL, NULL),
(114, 10, 32, '2024-03-02 13:10:00', '2024-01-27 15:10:00', NULL, NULL, NULL),
(115, 10, 25, '2024-01-27 13:14:00', '2024-01-27 15:14:00', NULL, NULL, NULL),
(116, 10, 25, '2024-05-24 13:17:00', '2024-01-27 15:17:00', NULL, NULL, NULL),
(117, 10, 31, '2024-01-27 13:21:00', '2024-01-27 15:21:00', NULL, NULL, NULL),
(118, 10, 32, '2024-02-03 17:45:00', '2024-02-04 15:42:00', NULL, NULL, NULL),
(119, 10, 32, '2024-01-28 13:47:00', '2024-01-27 15:47:00', NULL, NULL, NULL),
(120, 10, 32, '2024-01-28 13:50:00', '2024-01-27 15:50:00', NULL, NULL, NULL),
(121, 10, 25, '2024-02-01 14:15:00', '2024-02-01 16:15:00', NULL, NULL, NULL),
(122, 10, 58, '2024-02-02 07:37:00', '2024-02-02 09:37:00', NULL, NULL, NULL),
(123, 10, 24, '2024-02-02 08:13:00', '2024-02-02 10:13:00', NULL, NULL, NULL),
(124, 10, 31, '2024-02-02 16:17:00', '2024-02-02 23:18:00', NULL, NULL, NULL),
(125, 10, 31, '2024-02-02 13:21:00', '2024-02-02 15:21:00', NULL, NULL, NULL),
(126, 10, 24, '2024-02-02 13:23:00', '2024-02-02 15:23:00', NULL, NULL, NULL),
(127, 10, 55, '2024-02-02 13:28:00', '2024-02-02 15:28:00', NULL, NULL, NULL),
(128, 10, 56, '2024-02-06 13:35:00', '2024-02-06 15:35:00', NULL, NULL, NULL),
(129, 10, 55, '2024-02-06 16:16:00', '2024-02-06 18:16:00', NULL, NULL, NULL),
(130, 10, 24, '2024-02-22 18:21:00', '2024-02-22 20:21:00', NULL, NULL, NULL),
(131, 10, 73, '2024-02-07 05:58:00', '2024-02-07 07:58:00', NULL, NULL, NULL),
(132, 10, 72, '2024-02-07 05:59:00', '2024-02-07 07:59:00', NULL, NULL, NULL),
(133, 10, 72, '2024-02-15 06:31:00', '2024-02-22 08:31:00', NULL, NULL, NULL),
(134, 10, 72, '2024-03-29 13:44:00', '2024-04-06 15:44:00', NULL, NULL, NULL),
(135, 10, 75, '2024-02-07 07:55:00', '2024-02-07 09:55:00', NULL, NULL, NULL),
(136, 10, 74, '2024-02-07 07:57:00', '2024-02-07 09:57:00', NULL, NULL, NULL),
(137, 10, 78, '2024-02-07 08:04:00', '2024-02-07 10:04:00', NULL, NULL, NULL),
(138, 10, 80, '2024-02-07 08:07:00', '2024-02-07 10:07:00', NULL, NULL, NULL),
(139, 10, 80, '2024-02-23 13:07:00', '2024-02-23 13:07:00', NULL, NULL, NULL),
(140, 10, 80, '2024-02-22 08:08:00', '2024-02-22 14:08:00', NULL, NULL, NULL),
(141, 10, 71, '2024-02-07 08:11:00', '2024-02-07 10:11:00', NULL, NULL, NULL),
(142, 10, 72, '2024-02-07 09:59:00', '2024-02-07 11:59:00', NULL, NULL, NULL),
(143, 10, 76, '2024-02-07 10:02:00', '2024-02-07 12:02:00', NULL, NULL, NULL),
(144, 10, 71, '2024-02-07 13:19:00', '2024-02-07 15:19:00', NULL, NULL, NULL),
(145, 10, 75, '2024-02-07 17:40:00', '2024-02-07 19:40:00', NULL, NULL, NULL),
(146, 10, 71, '2024-02-07 17:45:00', '2024-02-07 19:45:00', NULL, NULL, NULL),
(147, 10, 75, '2024-02-07 22:48:00', '2024-02-24 00:48:00', NULL, NULL, NULL),
(148, 13, 75, '2024-02-07 20:45:00', '2024-02-07 22:45:00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `space_type`
--

CREATE TABLE `space_type` (
  `id` int NOT NULL,
  `v1` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `space_type`
--

INSERT INTO `space_type` (`id`, `v1`) VALUES
(1, 'Drivar way'),
(2, 'Private storage'),
(3, 'parking space');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'state'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `state`, `type`) VALUES
(1, 'Haryana', 'state'),
(2, 'delhi', 'state');

-- --------------------------------------------------------

--
-- Table structure for table `summit`
--

CREATE TABLE `summit` (
  `id` int NOT NULL,
  `phone_number` int DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `summit`
--

INSERT INTO `summit` (`id`, `phone_number`, `email`, `phone`) VALUES
(9, NULL, NULL, NULL),
(10, NULL, NULL, NULL),
(11, NULL, NULL, '6205834099'),
(12, NULL, 'hello@gmail.com', NULL),
(13, NULL, NULL, '6205834099'),
(14, NULL, 'raushan@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ucms`
--

CREATE TABLE `ucms` (
  `id` int NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `image` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ucms`
--

INSERT INTO `ucms` (`id`, `text`, `image`, `type`) VALUES
(1, NULL, '1707297283._0f93544f-5e2e-4f8e-a746-7e1c4e9556f1 - Copy - Copy.jpg', 'm0'),
(2, NULL, '1707222011._b4f4d24e-37f8-4403-bdd0-c409369a0265.jpg', 'm1'),
(3, NULL, '1707126334._0f93544f-5e2e-4f8e-a746-7e1c4e9556f1 - Copy (2).jpg', 'm2'),
(4, NULL, '1707297262._d5f55c77-073f-4faa-afb1-28df2bc6bf21 - Copy.jpg', 'm3'),
(5, NULL, '1707149386._d5f55c77-073f-4faa-afb1-28df2bc6bf21 - Copy.jpg', 'i1'),
(6, NULL, '1707149402._c77180a0-c357-4f8e-b7fb-30b56649ac5e - Copy (2).jpg', 'i2'),
(7, NULL, '1707149436._eb50bc57-149d-46bf-80bb-fa245de15624.jpg', 'i3'),
(9, '<h5 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 500; line-height: normal; font-size: 22px; font-family: \'Euclid Circular A\', sans-serif; letter-spacing: 0.44px;\">Save Money</h5>\n<h6 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 400; line-height: 22px; font-size: 15px; font-family: \'Euclid Circular A\', sans-serif; letter-spacing: 0.3px;\">Save up to 70% on our site<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />compared to the cost of on-airport<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />parking. d</h6>', NULL, 't1'),
(10, '<h5 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 500; line-height: normal; font-size: 22px; font-family: \'Euclid Circular A\', sans-serif; letter-spacing: 0.44px;\">Save Money</h5>\r\n<h6 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 400; line-height: 22px; font-size: 15px; font-family: \'Euclid Circular A\', sans-serif; letter-spacing: 0.3px;\">Save up to 70% on our site<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />compared to the cost of on-airport<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />parking. d</h6>', NULL, 't2'),
(11, NULL, NULL, 't3'),
(12, NULL, '1707133767._0f93544f-5e2e-4f8e-a746-7e1c4e9556f1 - Copy - Copy.jpg', NULL),
(13, NULL, '1707133896._0f66a1e6-3738-43f0-ac0c-1d3b8ffce137 - Copy.jpg', NULL),
(14, NULL, '1707133903._0f93544f-5e2e-4f8e-a746-7e1c4e9556f1 - Copy (2).jpg', NULL),
(15, NULL, '1707134096._0f93544f-5e2e-4f8e-a746-7e1c4e9556f1 - Copy (2).jpg', NULL),
(16, NULL, '1707134103._0f66a1e6-3738-43f0-ac0c-1d3b8ffce137.jpg', NULL),
(17, '<h5 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; line-height: 60px; font-size: 40px; font-family: Poppins; letter-spacing: 2.8px; text-transform: capitalize; background-color: #f4faff;\">We Have The Best Deals For Parking Lots!</h5>\r\n<h4 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 500; line-height: 1.2; font-size: 1.5rem; color: #212529; font-family: system-ui, -apple-system, \'Segoe UI\', Roboto, \'Helvetica Neue\', \'Noto Sans\', \'Liberation Sans\', Arial, sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; background-color: #f4faff;\">Instantly book your space today. Trusted by millions</h4>', NULL, 't4'),
(18, '<h6 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; line-height: 24px; font-size: 16px; color: var(--black, #1c1c57); font-family: \'Euclid Circular A\', sans-serif;\">About Us</h6>\r\n<h5 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 500; line-height: 48px; font-size: 40px; color: var(--black, #1c1c57); font-family: \'Euclid Circular A\', sans-serif; letter-spacing: -0.816px;\">Welcome to one Auto Park</h5>\r\n<p style=\"margin: 0px 0px 1rem; padding: 0px; box-sizing: border-box; color: var(--black, #1c1c57); font-family: \'Euclid Circular A\', sans-serif; font-size: 15px; line-height: 30px;\">One Auto Park offers a comprehensive solution for parking needs, including EV charging availability and an eco-friendly approach.</p>\r\n<p style=\"margin: 0px 0px 1rem; padding: 0px; box-sizing: border-box; color: var(--black, #1c1c57); font-family: \'Euclid Circular A\', sans-serif; font-size: 15px; line-height: 30px;\">Our all-in-one service is designed to provide convenience and sustainability to our customers. With our state-of-the-art facilities, you can rest assured that your vehicle is in good hands while you go about your day. Thank you for considering One Auto Park for your parking needs.</p>\r\n<p style=\"margin: 0px 0px 1rem; padding: 0px; box-sizing: border-box; color: var(--black, #1c1c57); font-family: \'Euclid Circular A\', sans-serif; font-size: 15px; line-height: 30px;\">Please bear with us while we develop our website to give you the best experience in parking solutions.<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />If you have a parking space that you would like to rent out, please drop us an email with your details and location:</p>\r\n<p style=\"margin: 0px 0px 1rem; padding: 0px; box-sizing: border-box; color: var(--black, #1c1c57); font-family: \'Euclid Circular A\', sans-serif; font-size: 15px; line-height: 30px;\"><a style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" href=\"mailto:praking@oneautogo.com\">praking@oneautogo.com&nbsp;</a>or call us on&nbsp;<a style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" href=\"tel:07778858278\">07778858278</a>&nbsp;(what&rsquo;s up)</p>', NULL, 't5'),
(19, '<h4 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; line-height: normal; font-size: 35px; font-family: \'Euclid Circular A\', sans-serif; letter-spacing: 1.05px; text-align: center; background-color: #fbfbfb;\">Why Choose Auto Park</h4>\n<h6 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 400; line-height: 28px; font-size: 16px; color: #636363; text-align: center; font-family: \'Euclid Circular A\', sans-serif; letter-spacing: 0.54px; background-color: #fbfbfb;\">We are the Best providers of Auto parking<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />You can\'t park closer!</h6>\n<div class=\"why-img\" style=\"margin: 0px; padding: 0px; box-sizing: border-box; color: #212529; font-family: system-ui, -apple-system, \'Segoe UI\', Roboto, \'Helvetica Neue\', \'Noto Sans\', \'Liberation Sans\', Arial, sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px; background-color: #fbfbfb;\"><img style=\"margin: 0px; padding: 0px; box-sizing: border-box; vertical-align: middle; width: 0px;\" src=\"http://localhost:8000/images/why-choose.png\" alt=\"\" /></div>', NULL, 't6'),
(20, 'Our solution Of car parking services\nGlobal Supply Image\nOne Auto Park offers a comprehensive solution for parking needs, including EV charging availability and an eco-friendly approach.\n\nGlobal Supply Image\nOne Auto Park offers a comprehensive solution for parking needs, including EV charging availability and an eco-friendly approach.\n\nGlobal Supply Image\nOne Auto Park offers a comprehensive solution for parking needs, including EV charging availability and an eco-friendly approach.', NULL, 't7'),
(21, '<h4 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; line-height: normal; font-size: 35px; font-family: \'Euclid Circular A\', sans-serif; letter-spacing: 1.05px; text-align: center;\">What our<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />Customers Say</h4>\n<h6 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 400; line-height: 28px; font-size: 16px; color: #636363; text-align: center; font-family: \'Euclid Circular A\', sans-serif; letter-spacing: 0.54px;\">We are the Best providers of Auto parking<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />You can\'t park closer!&nbsp; hh</h6>', NULL, 't8'),
(22, '<h5 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 500; line-height: normal; font-size: 22px; font-family: \'Euclid Circular A\', sans-serif; letter-spacing: 0.44px;\">Save Money</h5>\n<h6 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 400; line-height: 22px; font-size: 15px; font-family: \'Euclid Circular A\', sans-serif; letter-spacing: 0.3px;\">Save up to 70% on our site<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />compared to the cost of on-airport<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />parking. d</h6>', NULL, 't9'),
(23, '<h5 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 500; line-height: normal; font-size: 22px; font-family: \'Euclid Circular A\', sans-serif; letter-spacing: 0.44px;\">Save Money</h5>\n<h6 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 400; line-height: 22px; font-size: 15px; font-family: \'Euclid Circular A\', sans-serif; letter-spacing: 0.3px;\">Save up to 70% on our site<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />compared to the cost of on-airport<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />parking. d</h6>', NULL, 't10'),
(24, NULL, '1707200924._0ed25170-3fcb-4222-a134-e6a7305db49a - Copy - Copy.jpg', 'oi1'),
(25, NULL, '1707200934._0f93544f-5e2e-4f8e-a746-7e1c4e9556f1 - Copy (2).jpg', 'oi2'),
(26, NULL, '1707200942._42c8d238-29d6-41b6-88c5-8ee56117546d.jpg', 'oi3'),
(27, '<h5 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 500; line-height: normal; font-size: 22px; font-family: \'Euclid Circular A\', sans-serif; letter-spacing: 0.44px;\">Save Money</h5>\r\n<h6 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 400; line-height: 22px; font-size: 15px; font-family: \'Euclid Circular A\', sans-serif; letter-spacing: 0.3px;\">Save up to 70% on our site<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />compared to the cost of on-airport<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />parking. d dd</h6>', NULL, 'ot1'),
(28, '<h5 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 500; line-height: normal; font-size: 22px; font-family: \'Euclid Circular A\', sans-serif; letter-spacing: 0.44px;\">Save Money</h5>\r\n<h6 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 400; line-height: 22px; font-size: 15px; font-family: \'Euclid Circular A\', sans-serif; letter-spacing: 0.3px;\">Save up to 70% on our site<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />compared to the cost of on-airport<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />parking. d ddd</h6>', NULL, 'ot2'),
(29, '<h5 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 500; line-height: normal; font-size: 22px; font-family: \'Euclid Circular A\', sans-serif; letter-spacing: 0.44px;\">Save Money</h5>\r\n<h6 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 400; line-height: 22px; font-size: 15px; font-family: \'Euclid Circular A\', sans-serif; letter-spacing: 0.3px;\">Save up to 70% on our site<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />compared to the cost of on-airport<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />parking. d dddd</h6>', NULL, 'ot3'),
(30, '<h5 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 500; line-height: normal; font-size: 22px; font-family: \'Euclid Circular A\', sans-serif; letter-spacing: 0.44px;\">Save Money</h5>\r\n<h6 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 400; line-height: 22px; font-size: 15px; font-family: \'Euclid Circular A\', sans-serif; letter-spacing: 0.3px;\">Save up to 70% on our site<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />compared to the cost of on-airport<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />parking. d&nbsp; yyy</h6>', NULL, 'ot4'),
(31, '<h5 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 500; line-height: normal; font-size: 22px; font-family: \'Euclid Circular A\', sans-serif; letter-spacing: 0.44px;\">Save Money</h5>\r\n<h6 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 400; line-height: 22px; font-size: 15px; font-family: \'Euclid Circular A\', sans-serif; letter-spacing: 0.3px;\">Save up to 70% on our site<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />compared to the cost of on-airport<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />parking. d ffffg</h6>', NULL, 'ot5'),
(32, '<h5 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 500; line-height: normal; font-size: 22px; font-family: \'Euclid Circular A\', sans-serif; letter-spacing: 0.44px;\">Save Money</h5>\n<h6 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 400; line-height: 22px; font-size: 15px; font-family: \'Euclid Circular A\', sans-serif; letter-spacing: 0.3px;\">Save up to 70% on our site<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />compared to the cost of on-airport<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />parking. d aio;gja;</h6>', NULL, 'ot6'),
(33, '<h5 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 500; line-height: normal; font-size: 22px; font-family: \'Euclid Circular A\', sans-serif; letter-spacing: 0.44px;\">Save Money</h5>\r\n<h6 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 400; line-height: 22px; font-size: 15px; font-family: \'Euclid Circular A\', sans-serif; letter-spacing: 0.3px;\">Save up to 70% on our site<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />compared to the cost of on-airport<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />parking. d aklf</h6>', NULL, 'ot7'),
(34, '<h5 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 500; line-height: normal; font-size: 22px; font-family: \'Euclid Circular A\', sans-serif; letter-spacing: 0.44px;\">Save Money</h5>\r\n<h6 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 400; line-height: 22px; font-size: 15px; font-family: \'Euclid Circular A\', sans-serif; letter-spacing: 0.3px;\">Save up to 70% on our site<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />compared to the cost of on-airport<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />parking. d aio;gja;</h6>', NULL, 'r1'),
(35, '1707200924._0ed25170-3fcb-4222-a134-e6a7305db49a - Copy - Copy.jpg', NULL, 'r2'),
(36, '<h5 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 500; line-height: normal; font-size: 22px; font-family: \'Euclid Circular A\', sans-serif; letter-spacing: 0.44px;\">Save Money</h5>\r\n<h6 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 400; line-height: 22px; font-size: 15px; font-family: \'Euclid Circular A\', sans-serif; letter-spacing: 0.3px;\">Save up to 70% on our site<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />compared to the cost of on-airport<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />parking. d aio;gja;</h6>', NULL, 'r3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'user',
  `dob` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `remember_token`, `created_at`, `updated_at`, `type`, `dob`) VALUES
(4, 'vikash kumar', 'rasuahn123@gmail.com', '12345645678', '$2y$12$iQ.ymnz1dRDxeI7wlbGmrOK.cvxfUzyhcHoWBinVN8ok/XToqCoOS', NULL, NULL, NULL, 'user', NULL),
(5, 'Admin', 'admin123@gmail.com', '12345645678', '$2y$12$iQ.ymnz1dRDxeI7wlbGmrOK.cvxfUzyhcHoWBinVN8ok/XToqCoOS', NULL, NULL, NULL, 'admin', NULL),
(6, 'anshul kumar', 'anshul123@gmail.com', '12345645678', '$2y$12$iQ.ymnz1dRDxeI7wlbGmrOK.cvxfUzyhcHoWBinVN8ok/XToqCoOS', NULL, NULL, NULL, 'user', NULL),
(10, 'Raushan kumar', 'raushan919962@gmail.com', '6205834099', '$2y$12$FzJm3wTFSk3LP6/T2ZoUaO4/Dew2QwoPmi3m/zf4R8MgvCxRVNwke', NULL, '2023-12-22 00:34:20', '2023-12-22 00:34:20', 'user', NULL),
(12, 'Icube', 'icubeinstitute8@gmail.com', '6205834099', '$2y$12$iQ.ymnz1dRDxeI7wlbGmrOK.cvxfUzyhcHoWBinVN8ok/XToqCoOS', NULL, '2024-02-05 13:17:05', '2024-02-05 13:17:05', 'user', NULL),
(13, 'Raushan kumar', 'treebeez305@gmail.com', '6205834099', '$2y$12$iQ.ymnz1dRDxeI7wlbGmrOK.cvxfUzyhcHoWBinVN8ok/XToqCoOS', NULL, '2024-02-07 13:19:20', '2024-02-07 13:19:20', 'user', NULL),
(14, 'Rahul sir', 'icubeindustry@gmail.com', '6205834099', '$2y$12$iQ.ymnz1dRDxeI7wlbGmrOK.cvxfUzyhcHoWBinVN8ok/XToqCoOS', NULL, '2024-02-07 13:28:31', '2024-02-07 13:28:31', 'user', NULL),
(15, 'Dinesh lal', 'dineshmca500@gmail.com', '6205834099', '$2y$12$iQ.ymnz1dRDxeI7wlbGmrOK.cvxfUzyhcHoWBinVN8ok/XToqCoOS', NULL, '2024-02-07 13:35:14', '2024-02-07 13:35:14', 'user', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_cms_head`
--

CREATE TABLE `user_cms_head` (
  `id` int NOT NULL,
  `about` text COLLATE utf8mb4_general_ci,
  `how_it_work` text COLLATE utf8mb4_general_ci,
  `type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `terms` text COLLATE utf8mb4_general_ci,
  `privacy` text COLLATE utf8mb4_general_ci,
  `refund` text COLLATE utf8mb4_general_ci,
  `blog` text COLLATE utf8mb4_general_ci,
  `career` text COLLATE utf8mb4_general_ci,
  `media` text COLLATE utf8mb4_general_ci,
  `file` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_cms_head`
--

INSERT INTO `user_cms_head` (`id`, `about`, `how_it_work`, `type`, `terms`, `privacy`, `refund`, `blog`, `career`, `media`, `file`) VALUES
(1, '<h4 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 500; line-height: 31px; font-size: 22px; font-family: \'Euclid Circular A\';\">&nbsp;Terms &amp; Condition</h4>\r\n<p style=\"margin: 0px 0px 1rem; padding: 0px; box-sizing: border-box; font-family: \'Euclid Circular A\'; font-size: 15px; line-height: 31px;\">We respect your privacy. When you give us your personal information, we use it only to fulfill the transaction or service you have requested.</p>\r\n<p style=\"margin: 0px 0px 1rem; padding: 0px; box-sizing: border-box; font-family: \'Euclid Circular A\'; font-size: 15px; line-height: 31px;\">We do not subscribe you to marketing emails without your consent. We do not sell or give away your contact information to any other entities. We do not allow the vendors who help us process transactions to sell or give away your information either. If you have questions about how we use your information please contact privacy@nngroup.com.</p>\r\n<h4 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 500; line-height: 31px; font-size: 22px; font-family: \'Euclid Circular A\';\">Detailed Terms &amp; Condition</h4>\r\n<p style=\"margin: 0px 0px 1rem; padding: 0px; box-sizing: border-box; font-family: \'Euclid Circular A\'; font-size: 15px; line-height: 31px;\"><span style=\"margin: 0px; padding: 0px; box-sizing: border-box;\">1.SCOPE</span><br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />This policy applies to personal information collected on websites owned or controlled by Nielsen Norman Group (collectively referred to in this policy as &ldquo;we&rdquo;, \"us\" or \"our\"). The aim of this policy is to tell you how we will use any personal information we collect or you provide through our websites. Please read it carefully before you proceed. The data controller in respect of this website is Nielsen Norman Group.</p>\r\n<p style=\"margin: 0px 0px 1rem; padding: 0px; box-sizing: border-box; font-family: \'Euclid Circular A\'; font-size: 15px; line-height: 31px;\"><span style=\"margin: 0px; padding: 0px; box-sizing: border-box;\">2.WHAT PERSONAL INFORMATION DO WE COLLECT?</span><br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />You do not have to give us any personal information in order to use most of this website. However, if you wish to subscribe to our newsletter, attend the UX Conference, attend or purchase an Online Seminar, purchase a Research Report, or request further information, we may collect the following personal information from you: name, address, phone number, email address, employment details, and employer details. We will also keep a record of any financial transaction you make with us but we do not directly collect, process or store your debit or credit card information. Online payments made through this website are processed securely by third party payment providers.<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />We use different processors for different types of transactions and to manage support for different services. For more information about how your data will be handled please refer to the respective service provider\'s privacy policy: Research Report Purchases: FastSpring https://fastspring.com/privacy/ Online Seminars: Crowdcast, https://www.crowdcast.io/privacy-policy UX Conference Payments: Stripe, https://stripe.com/us/privacy In addition, we may automatically collect information about the website that you came from or are going to. We also collect information about the pages of this website which you visit, IP addresses, the type of browser you use and the times you access this website. However, this information is aggregated across all visitors and we do not use it to identify you.</p>', NULL, 'about', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, '<h4 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 500; line-height: 31px; font-size: 22px; font-family: \'Euclid Circular A\';\">Terms &amp; Condition</h4>\r\n<p style=\"margin: 0px 0px 1rem; padding: 0px; box-sizing: border-box; font-family: \'Euclid Circular A\'; font-size: 15px; line-height: 31px;\">We respect your privacy. When you give us your personal information, we use it only to fulfill the transaction or service you have requested.</p>\r\n<p style=\"margin: 0px 0px 1rem; padding: 0px; box-sizing: border-box; font-family: \'Euclid Circular A\'; font-size: 15px; line-height: 31px;\">We do not subscribe you to marketing emails without your consent. We do not sell or give away your contact information to any other entities. We do not allow the vendors who help us process transactions to sell or give away your information either. If you have questions about how we use your information please contact privacy@nngroup.com.</p>\r\n<h4 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 500; line-height: 31px; font-size: 22px; font-family: \'Euclid Circular A\';\">Detailed Terms &amp; Condition</h4>\r\n<p style=\"margin: 0px 0px 1rem; padding: 0px; box-sizing: border-box; font-family: \'Euclid Circular A\'; font-size: 15px; line-height: 31px;\"><span style=\"margin: 0px; padding: 0px; box-sizing: border-box;\">1.SCOPE</span><br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />This policy applies to personal information collected on websites owned or controlled by Nielsen Norman Group (collectively referred to in this policy as &ldquo;we&rdquo;, \"us\" or \"our\"). The aim of this policy is to tell you how we will use any personal information we collect or you provide through our websites. Please read it carefully before you proceed. The data controller in respect of this website is Nielsen Norman Group.</p>\r\n<p style=\"margin: 0px 0px 1rem; padding: 0px; box-sizing: border-box; font-family: \'Euclid Circular A\'; font-size: 15px; line-height: 31px;\"><span style=\"margin: 0px; padding: 0px; box-sizing: border-box;\">2.WHAT PERSONAL INFORMATION DO WE COLLECT?</span><br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />You do not have to give us any personal information in order to use most of this website. However, if you wish to subscribe to our newsletter, attend the UX Conference, attend or purchase an Online Seminar, purchase a Research Report, or request further information, we may collect the following personal information from you: name, address, phone number, email address, employment details, and employer details. We will also keep a record of any financial transaction you make with us but we do not directly collect, process or store your debit or credit card information. Online payments made through this website are processed securely by third party payment providers.<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />We use different processors for different types of transactions and to manage support for different services. For more information about how your data will be handled please refer to the respective service provider\'s privacy policy: Research Report Purchases: FastSpring https://fastspring.com/privacy/ Online Seminars: Crowdcast, https://www.crowdcast.io/privacy-policy UX Conference Payments: Stripe, https://stripe.com/us/privacy In addition, we may automatically collect information about the website that you came from or are going to. We also collect information about the pages of this website which you visit, IP addresses, the type of browser you use and the times you access this website. However, this information is aggregated across all visitors and we do not use it to identify you. fff</p>', 'how_it_work', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, 'v1', '<h4 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 500; line-height: 31px; font-size: 22px; font-family: \'Euclid Circular A\';\">Terms &amp; Condition</h4>\r\n<p style=\"margin: 0px 0px 1rem; padding: 0px; box-sizing: border-box; font-family: \'Euclid Circular A\'; font-size: 15px; line-height: 31px;\">We respect your privacy. When you give us your personal information, we use it only to fulfill the transaction or service you have requested.</p>\r\n<p style=\"margin: 0px 0px 1rem; padding: 0px; box-sizing: border-box; font-family: \'Euclid Circular A\'; font-size: 15px; line-height: 31px;\">We do not subscribe you to marketing emails without your consent. We do not sell or give away your contact information to any other entities. We do not allow the vendors who help us process transactions to sell or give away your information either. If you have questions about how we use your information please contact privacy@nngroup.com.</p>\r\n<h4 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 500; line-height: 31px; font-size: 22px; font-family: \'Euclid Circular A\';\">Detailed Terms &amp; Condition</h4>\r\n<p style=\"margin: 0px 0px 1rem; padding: 0px; box-sizing: border-box; font-family: \'Euclid Circular A\'; font-size: 15px; line-height: 31px;\"><span style=\"margin: 0px; padding: 0px; box-sizing: border-box;\">1.SCOPE</span><br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />This policy applies to personal information collected on websites owned or controlled by Nielsen Norman Group (collectively referred to in this policy as &ldquo;we&rdquo;, \"us\" or \"our\"). The aim of this policy is to tell you how we will use any personal information we collect or you provide through our websites. Please read it carefully before you proceed. The data controller in respect of this website is Nielsen Norman Group.</p>\r\n<p style=\"margin: 0px 0px 1rem; padding: 0px; box-sizing: border-box; font-family: \'Euclid Circular A\'; font-size: 15px; line-height: 31px;\"><span style=\"margin: 0px; padding: 0px; box-sizing: border-box;\">2.WHAT PERSONAL INFORMATION DO WE COLLECT?</span><br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />You do not have to give us any personal information in order to use most of this website. However, if you wish to subscribe to our newsletter, attend the UX Conference, attend or purchase an Online Seminar, purchase a Research Report, or request further information, we may collect the following personal information from you: name, address, phone number, email address, employment details, and employer details. We will also keep a record of any financial transaction you make with us but we do not directly collect, process or store your debit or credit card information. Online payments made through this website are processed securely by third party payment providers.<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />We use different processors for different types of transactions and to manage support for different services. For more information about how your data will be handled please refer to the respective service provider\'s privacy policy: Research Report Purchases: FastSpring https://fastspring.com/privacy/ Online Seminars: Crowdcast, https://www.crowdcast.io/privacy-policy UX Conference Payments: Stripe, https://stripe.com/us/privacy In addition, we may automatically collect information about the website that you came from or are going to. We also collect information about the pages of this website which you visit, IP addresses, the type of browser you use and the times you access this website. However, this information is aggregated across all visitors and we do not use it to identify you.fff</p>', NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, 'v2', NULL, NULL, '<h4 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 500; line-height: 31px; font-size: 22px; font-family: \'Euclid Circular A\';\">Refund Policy</h4>\r\n<p style=\"margin: 0px 0px 1rem; padding: 0px; box-sizing: border-box; font-family: \'Euclid Circular A\'; font-size: 15px; line-height: 31px;\">We respect your privacy. When you give us your personal information, we use it only to fulfill the transaction or service you have requested.</p>\r\n<p style=\"margin: 0px 0px 1rem; padding: 0px; box-sizing: border-box; font-family: \'Euclid Circular A\'; font-size: 15px; line-height: 31px;\">We do not subscribe you to marketing emails without your consent. We do not sell or give away your contact information to any other entities. We do not allow the vendors who help us process transactions to sell or give away your information either. If you have questions about how we use your information please contact privacy@nngroup.com.</p>\r\n<h4 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 500; line-height: 31px; font-size: 22px; font-family: \'Euclid Circular A\';\">Detailed Refund Policy</h4>\r\n<p style=\"margin: 0px 0px 1rem; padding: 0px; box-sizing: border-box; font-family: \'Euclid Circular A\'; font-size: 15px; line-height: 31px;\"><span style=\"margin: 0px; padding: 0px; box-sizing: border-box;\">1.SCOPE</span><br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />This policy applies to personal information collected on websites owned or controlled by Nielsen Norman Group (collectively referred to in this policy as &ldquo;we&rdquo;, \"us\" or \"our\"). The aim of this policy is to tell you how we will use any personal information we collect or you provide through our websites. Please read it carefully before you proceed. The data controller in respect of this website is Nielsen Norman Group.</p>\r\n<p style=\"margin: 0px 0px 1rem; padding: 0px; box-sizing: border-box; font-family: \'Euclid Circular A\'; font-size: 15px; line-height: 31px;\"><span style=\"margin: 0px; padding: 0px; box-sizing: border-box;\">2.WHAT PERSONAL INFORMATION DO WE COLLECT?</span><br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />You do not have to give us any personal information in order to use most of this website. However, if you wish to subscribe to our newsletter, attend the UX Conference, attend or purchase an Online Seminar, purchase a Research Report, or request further information, we may collect the following personal information from you: name, address, phone number, email address, employment details, and employer details. We will also keep a record of any financial transaction you make with us but we do not directly collect, process or store your debit or credit card information. Online payments made through this website are processed securely by third party payment providers.<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />We use different processors for different types of transactions and to manage support for different services. For more information about how your data will be handled please refer to the respective service provider\'s privacy policy: Research Report Purchases: FastSpring https://fastspring.com/privacy/ Online Seminars: Crowdcast, https://www.crowdcast.io/privacy-policy UX Conference Payments: Stripe, https://stripe.com/us/privacy In addition, we may automatically collect information about the website that you came from or are going to. We also collect information about the pages of this website which you visit, IP addresses, the type of browser you use and the times you access this website. However, this information is aggregated across all visitors and we do not use it to identify you.&nbsp; fafa</p>\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: 48px; top: -17px;\">&nbsp;</div>', NULL, NULL, NULL, NULL),
(5, NULL, NULL, 'v3', NULL, '<h4 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 500; line-height: 31px; font-size: 22px; font-family: \'Euclid Circular A\';\">Privacy Policy</h4>\r\n<p style=\"margin: 0px 0px 1rem; padding: 0px; box-sizing: border-box; font-family: \'Euclid Circular A\'; font-size: 15px; line-height: 31px;\">We respect your privacy. When you give us your personal information, we use it only to fulfill the transaction or service you have requested.</p>\r\n<p style=\"margin: 0px 0px 1rem; padding: 0px; box-sizing: border-box; font-family: \'Euclid Circular A\'; font-size: 15px; line-height: 31px;\">We do not subscribe you to marketing emails without your consent. We do not sell or give away your contact information to any other entities. We do not allow the vendors who help us process transactions to sell or give away your information either. If you have questions about how we use your information please contact privacy@nngroup.com.</p>\r\n<h4 style=\"margin: 0px 0px 0.5rem; padding: 0px; box-sizing: border-box; font-weight: 500; line-height: 31px; font-size: 22px; font-family: \'Euclid Circular A\';\">Detailed Privacy Policy</h4>\r\n<p style=\"margin: 0px 0px 1rem; padding: 0px; box-sizing: border-box; font-family: \'Euclid Circular A\'; font-size: 15px; line-height: 31px;\"><span style=\"margin: 0px; padding: 0px; box-sizing: border-box;\">1.SCOPE</span><br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />This policy applies to personal information collected on websites owned or controlled by Nielsen Norman Group (collectively referred to in this policy as &ldquo;we&rdquo;, \"us\" or \"our\"). The aim of this policy is to tell you how we will use any personal information we collect or you provide through our websites. Please read it carefully before you proceed. The data controller in respect of this website is Nielsen Norman Group.</p>\r\n<p style=\"margin: 0px 0px 1rem; padding: 0px; box-sizing: border-box; font-family: \'Euclid Circular A\'; font-size: 15px; line-height: 31px;\"><span style=\"margin: 0px; padding: 0px; box-sizing: border-box;\">2.WHAT PERSONAL INFORMATION DO WE COLLECT?</span><br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />You do not have to give us any personal information in order to use most of this website. However, if you wish to subscribe to our newsletter, attend the UX Conference, attend or purchase an Online Seminar, purchase a Research Report, or request further information, we may collect the following personal information from you: name, address, phone number, email address, employment details, and employer details. We will also keep a record of any financial transaction you make with us but we do not directly collect, process or store your debit or credit card information. Online payments made through this website are processed securely by third party payment providers.<br style=\"margin: 0px; padding: 0px; box-sizing: border-box;\" />We use different processors for different types of transactions and to manage support for different services. For more information about how your data will be handled please refer to the respective service provider\'s privacy policy: Research Report Purchases: FastSpring https://fastspring.com/privacy/ Online Seminars: Crowdcast, https://www.crowdcast.io/privacy-policy UX Conference Payments: Stripe, https://stripe.com/us/privacy In addition, we may automatically collect information about the website that you came from or are going to. We also collect information about the pages of this website which you visit, IP addresses, the type of browser you use and the times you access this website. However, this information is aggregated across all visitors and we do not use it to identify you.ffff</p>\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: 51px; top: 25.6px;\">&nbsp;</div>', NULL, NULL, NULL, NULL, NULL),
(6, NULL, NULL, 'v4', NULL, NULL, NULL, '<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding-left: 0px; font-size: 20px; line-height: 32px; color: #36344d; letter-spacing: 0.3px; padding-bottom: 20px; font-family: Muli, sans-serif;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Blog Example</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding-left: 0px; font-size: 20px; line-height: 32px; color: #36344d; letter-spacing: 0.3px; padding-bottom: 20px; font-family: Muli, sans-serif;\">A&nbsp;<a style=\"box-sizing: border-box; color: #6747c7; text-decoration: unset; background-color: transparent; font-weight: bold;\" href=\"https://www.hostinger.in/tutorials/what-is-a-blog\" rel=\"follow\" data-wpel-link=\"internal\">blog</a>&nbsp;is a website or page that is a part of a larger website. Typically, it features articles written in a conversational style with accompanying pictures or videos.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding-left: 0px; font-size: 20px; line-height: 32px; color: #36344d; letter-spacing: 0.3px; padding-bottom: 20px; font-family: Muli, sans-serif;\">Blogging has&nbsp;<a style=\"box-sizing: border-box; color: #6747c7; text-decoration: unset; background-color: transparent; font-weight: bold;\" href=\"https://firstsiteguide.com/blogging-stats/\" target=\"_blank\" rel=\"nofollow noopener noreferrer\" data-wpel-link=\"external\">gained immense popularity</a>&nbsp;due to its enjoyable and adaptable nature, allowing for self-expression and social connections. In addition, it serves as a platform for enhancing writing skills and promoting businesses.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding-left: 0px; font-size: 20px; line-height: 32px; color: #36344d; letter-spacing: 0.3px; padding-bottom: 20px; font-family: Muli, sans-serif;\">Furthermore, a professional blogger can even&nbsp;<a style=\"box-sizing: border-box; color: #6747c7; text-decoration: unset; background-color: transparent; font-weight: bold;\" href=\"https://www.hostinger.in/tutorials/make-money-blogging/\" rel=\"follow\" data-wpel-link=\"internal\">make money from blogging</a>&nbsp;in various ways, such as Google ads and Amazon affiliate links. Successful blogs can cover any topic. No matter what subject you can think of, there&rsquo;s likely already a profitable blog dedicated to it.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding-left: 0px; font-size: 20px; line-height: 32px; color: #36344d; letter-spacing: 0.3px; padding-bottom: 20px; font-family: Muli, sans-serif;\">If there is none, this is where you come in. New bloggers who can find a unique niche to create content about have a higher chance of surviving in the competitive blogging world. Preferably, you should be passionate about or an expert in your blog niche. However, don&rsquo;t worry if you are having a difficult time pinning down a topic &ndash; this article will help you.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding-left: 0px; font-size: 20px; line-height: 32px; color: #36344d; letter-spacing: 0.3px; padding-bottom: 20px; font-family: Muli, sans-serif;\">In this article, we will explore 11 types of blogs in different niche industries, including tech, lifestyle, beauty and fashion, health and fitness, education, business and marketing, finance and investment, food, travel, photography, and art and design.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; padding-left: 0px; font-size: 20px; line-height: 32px; color: #36344d; letter-spacing: 0.3px; padding-bottom: 20px; font-family: Muli, sans-serif;\">We will include five of the best blog examples for each type, discuss each blog example briefly, and highlight what we can learn from the blog. We will also include the info on how it is build, for example, whether a CMS like&nbsp;<a style=\"box-sizing: border-box; color: #6747c7; text-decoration: unset; background-color: transparent; font-weight: bold;\" href=\"https://www.hostinger.in/tutorials/what-is-wordpress\" rel=\"follow\" data-wpel-link=\"internal\">WordPress</a>&nbsp;was used or a blogging platform.&nbsp; &nbsp;ffafa</p>', NULL, NULL, NULL),
(7, NULL, NULL, 'v5', NULL, NULL, NULL, NULL, '<section class=\"blog-single\">\r\n<div class=\"blog\">\r\n<div class=\"blog-img blog-head-img\"><img src=\"images/media1.jpg\" alt=\"\" /></div>\r\n<div class=\"blog-content\">\r\n<h2 class=\"blog-title\">Weekly Newsletter: Tweets for Higher Engagements</h2>\r\n<p class=\"blog-desc\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>\r\n<div class=\"blog-details\">\r\n<div class=\"blog-author-img\"><img src=\"images/media.jpg\" alt=\"\" /></div>\r\n<div class=\"blog-author-details\">\r\n<h4 class=\"blog-author-name\">Media, Press Release</h4>\r\n<div class=\"blog-author-desig\">AutoPark</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n<section class=\"blog-grid pt-4\">\r\n<div class=\"blog\">\r\n<div class=\"blog-img\"><img src=\"images/media.jpg\" alt=\"\" /></div>\r\n<div class=\"blog-content blog-head-content\">\r\n<h2 class=\"blog-title\">AutoPark adds up to 750 new parking locations</h2>\r\n<p class=\"blog-desc\">AutoPark adds up to 750 new parking locations to its network in US it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>\r\n<div class=\"blog-details\">\r\n<div class=\"blog-author-details\">\r\n<h4 class=\"blog-author-name\">Media Release</h4>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"blog\">\r\n<div class=\"blog-img\"><img src=\"images/media1.jpg\" alt=\"\" /></div>\r\n<div class=\"blog-content blog-head-content\">\r\n<h2 class=\"blog-title\">AutoPark adds up to 750 new parking locations</h2>\r\n<p class=\"blog-desc\">AutoPark adds up to 750 new parking locations to its network in US it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>\r\n<div class=\"blog-details\">\r\n<div class=\"blog-author-details\">\r\n<h4 class=\"blog-author-name\">Media Release</h4>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"blog\">\r\n<div class=\"blog-img\"><img src=\"images/media1.jpg\" alt=\"\" /></div>\r\n<div class=\"blog-content blog-head-content\">\r\n<h2 class=\"blog-title\">AutoPark adds up to 750 new parking locations</h2>\r\n<p class=\"blog-desc\">AutoPark adds up to 750 new parking locations to its network in US it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>\r\n<div class=\"blog-details\">\r\n<div class=\"blog-author-details\">\r\n<h4 class=\"blog-author-name\">Media Release dfaga</h4>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>', NULL, NULL),
(8, NULL, NULL, 'v6', NULL, NULL, NULL, NULL, NULL, '<p>media dagag</p>', NULL),
(9, NULL, NULL, 'file', NULL, NULL, NULL, NULL, NULL, NULL, 'file');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_commission`
--
ALTER TABLE `admin_commission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_main`
--
ALTER TABLE `cms_main`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kyc`
--
ALTER TABLE `kyc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `255` (`unique_id`(255));

--
-- Indexes for table `master_table`
--
ALTER TABLE `master_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_module`
--
ALTER TABLE `new_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner_contact`
--
ALTER TABLE `owner_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner_user`
--
ALTER TABLE `owner_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parking_space`
--
ALTER TABLE `parking_space`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parking_spots`
--
ALTER TABLE `parking_spots`
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
-- Indexes for table `recent_order`
--
ALTER TABLE `recent_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_user_id_foreign` (`user_id`),
  ADD KEY `reservations_slot_id_foreign` (`parking_spot_id`);

--
-- Indexes for table `space_type`
--
ALTER TABLE `space_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `summit`
--
ALTER TABLE `summit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ucms`
--
ALTER TABLE `ucms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_cms_head`
--
ALTER TABLE `user_cms_head`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_commission`
--
ALTER TABLE `admin_commission`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cms_main`
--
ALTER TABLE `cms_main`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kyc`
--
ALTER TABLE `kyc`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `master_table`
--
ALTER TABLE `master_table`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `new_module`
--
ALTER TABLE `new_module`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `owner_contact`
--
ALTER TABLE `owner_contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `owner_user`
--
ALTER TABLE `owner_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `parking_space`
--
ALTER TABLE `parking_space`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `parking_spots`
--
ALTER TABLE `parking_spots`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recent_order`
--
ALTER TABLE `recent_order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=345;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `space_type`
--
ALTER TABLE `space_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `summit`
--
ALTER TABLE `summit`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ucms`
--
ALTER TABLE `ucms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_cms_head`
--
ALTER TABLE `user_cms_head`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
