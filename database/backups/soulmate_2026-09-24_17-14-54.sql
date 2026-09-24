-- MariaDB dump 10.17  Distrib 10.4.14-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: soulmate
-- ------------------------------------------------------
-- Server version	10.4.14-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activity_log`
--

DROP TABLE IF EXISTS `activity_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint(20) unsigned DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) unsigned DEFAULT NULL,
  `attribute_changes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`attribute_changes`)),
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subject` (`subject_type`,`subject_id`),
  KEY `causer` (`causer_type`,`causer_id`),
  KEY `activity_log_log_name_index` (`log_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_log`
--

LOCK TABLES `activity_log` WRITE;
/*!40000 ALTER TABLE `activity_log` DISABLE KEYS */;
INSERT INTO `activity_log` VALUES (1,'default','Category updated','App\\Models\\Category',1,'updated','App\\Models\\User',1,'{\"attributes\":{\"name\":\"Movie Partner\",\"slug\":\"movie-partner\",\"description\":\"Watch together, share laughs\",\"image\":null,\"icon\":\"\\ud83c\\udfac\",\"prices\":\"4500.00\",\"min_price\":null,\"max_price\":null,\"hours\":3,\"minutes\":30,\"pricing_type\":\"package\"},\"old\":{\"name\":\"Movie Partner\",\"slug\":\"movie-partner\",\"description\":\"Watch together, share laughs\",\"image\":null,\"icon\":\"\\ud83c\\udfac\",\"prices\":\"4500.00\",\"min_price\":null,\"max_price\":null,\"hours\":3,\"minutes\":30,\"pricing_type\":\"hourly\"}}','[]','2026-09-22 04:47:05','2026-09-22 04:47:05');
/*!40000 ALTER TABLE `activity_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `partner_id` bigint(20) unsigned NOT NULL,
  `category_id` bigint(20) unsigned DEFAULT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `razorpay_order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bookings_user_id_foreign` (`user_id`),
  KEY `bookings_partner_id_foreign` (`partner_id`),
  CONSTRAINT `bookings_partner_id_foreign` FOREIGN KEY (`partner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (1,4,3,1,'2026-09-24','09:00:00','13:00:00',20000.00,'confirmed','pay_Tf2pJRlVouOCNk',NULL,'2026-09-22 04:40:27','2026-09-22 04:40:27'),(2,4,3,4,'2026-09-24','17:00:00','18:00:00',1500.00,'confirmed','pay_TfrPtW8D8xuTS0',NULL,'2026-09-24 06:09:46','2026-09-24 06:09:46');
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brands` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `brands_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('soulmate-india-cache-356a192b7913b04c54574d18c28d46e6395428ab','i:1;',1790068908),('soulmate-india-cache-356a192b7913b04c54574d18c28d46e6395428ab:timer','i:1790068908;',1790068908),('soulmate-india-cache-livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3','i:2;',1790068857),('soulmate-india-cache-livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer','i:1790068857;',1790068857),('soulmate-india-cache-page_about-us','O:15:\"App\\Models\\Page\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"pages\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:11:{s:2:\"id\";i:7;s:5:\"title\";s:8:\"About us\";s:4:\"slug\";s:8:\"about-us\";s:7:\"content\";s:4384:\"[{\"type\":\"section\",\"data\":{\"section_type_id\":\"11\",\"data\":{\"title\":\"ABOUT US\",\"subtitle\":\"More Than Just<br>\\nA Platform,<br>\\n<span>It\'s a Connection<\\/span>\",\"description\":\"At Soulmate India, we believe that everyone deserves companionship, friendship and meaningful experiences. We connect you with genuine, verified and trusted partners for your special moments \\u2014 because life is better together.\\n\\n\",\"background_image\":4}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"14\",\"data\":{\"title\":\"The Reality We Address\",\"list\":[{\"icon\":\"fa-solid fa-users\",\"description\":\"A large number of people, especially in urban areas, feel lonely, isolated or have limited time to explore new experiences. Traditional social platforms don\'t always provide a safe, verified and meaningful way to meet like-minded people.\\n\\n\"},{\"icon\":\"fa-regular fa-star\",\"description\":\"Where a young professional needs a date, a traveler wants a companion, or someone wants to try new activities \\u2014 finding the right partner is often difficult, time-consuming and risky.\\n\\n\"}],\"subtitle\":\"That\'s why Soulmate India exists.\",\"description\":\"Not just a platform, but a safe and trusted space to connect with real people for real experiences.\\n\\n\"}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"15\",\"data\":{\"list\":[{\"icon\":\"fa-solid fa-users\",\"number\":\"10K+\",\"title\":\"Happy Members\"},{\"icon\":\"fa-solid fa-user-check\",\"number\":\"100%\",\"title\":\"Verified Profiles\"},{\"icon\":\"fa-regular fa-star\",\"number\":\"4.8\\/5\",\"title\":\"Average Rating\"},{\"icon\":\"fa-regular fa-heart\",\"number\":\"50+\",\"title\":\"Cities Covered\"},{\"icon\":\"fa-regular fa-headphones\",\"number\":\"24\\/7\",\"title\":\"Support\"}]}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"16\",\"data\":{\"title\":\"OUR STORY\",\"subtitle\":\"What We Do\",\"description\":\"Soulmate India is a modern platform that helps people find the right partner for companionship, travel, shopping, dining and more. We carefully verify each partner and ensure a safe, respectful and enjoyable experience for everyone.\\n\\n\",\"cta\":{\"label\":\"Join Our Community\",\"url_type\":\"external\",\"external_url\":\"http:\\/\\/127.0.0.1:8000\",\"target\":\"_self\"},\"list\":[{\"icon\":\"fa-regular fa-heart\",\"title\":\"Companionship\",\"description\":\"For dates, outings and meaningful chats.\"},{\"icon\":\"fa-solid fa-plane\",\"title\":\"Travel Together\",\"description\":\"Explore new places with the right partner.\"},{\"icon\":\"fa-solid fa-cart-shopping\",\"title\":\"Shopping Companion\",\"description\":\"Make shopping more fun together.\"},{\"icon\":\"fa-solid fa-utensils\",\"title\":\"Dining Companion\",\"description\":\"Enjoy great food and conversations.\"},{\"icon\":\"fa-solid fa-person-swimming\",\"title\":\"Sports & Activities\",\"description\":\"Stay active, stay happy.\\n\\n\"},{\"icon\":\"fa-solid fa-ellipsis\",\"title\":\"And More\",\"description\":\"Many more categories to choose from.\\n\\n\"}]}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"17\",\"data\":{\"list\":[{\"icon\":\"fa-solid fa-bullseye\",\"title\":\"Our Mission\",\"description\":\"To bring the most trusted and reliable platform for providing accessible, affordable and professional companionship services to every individual across all cities and pin codes. We aim to connect loneliness, provide dignified assistance to seniors, and create meaningful earning opportunities for millions of Indians.\\n\\n\"},{\"icon\":\"fa-regular fa-eye\",\"title\":\"Our Vision\",\"description\":\"To become the most trusted name in professional social support services in India and beyond. We envision a world where no one feels alone, where help is always just a click away, and where providing care is a respected profession that empowers millions of independent workers.\\n\\n\"}]}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"18\",\"data\":{\"title\":\"Our Core Values\",\"list\":[{\"icon\":\"fa-solid fa-shield\",\"title\":\"Trust\",\"description\":\"We believe in genuine connections and transparent experiences.\\n\\n\"},{\"icon\":\"fa-solid fa-users\",\"title\":\"Respect\",\"description\":\"We promote a safe, kind and inclusive community for all.\\n\\n\"},{\"icon\":\"fa-solid fa-lock\",\"title\":\"Safety\",\"description\":\"Your security is our priority, always.\\n\\n\"},{\"icon\":\"fa-regular fa-star\",\"title\":\"Better Experiences\",\"description\":\"We aim to make every moment special and memorable.\\n\\n\"},{\"icon\":\"fa-regular fa-heart\",\"title\":\"Inclusion\",\"description\":\"Everyone deserves companionship and happiness.\\n\\n\"}]}}},{\"type\":\"global_section\",\"data\":{\"global_section_id\":\"1\"}}]\";s:12:\"is_published\";i:1;s:10:\"created_at\";s:19:\"2026-09-18 17:08:56\";s:10:\"updated_at\";s:19:\"2026-09-20 09:03:47\";s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:8:\"og_image\";N;}s:11:\"\0*\0original\";a:11:{s:2:\"id\";i:7;s:5:\"title\";s:8:\"About us\";s:4:\"slug\";s:8:\"about-us\";s:7:\"content\";s:4384:\"[{\"type\":\"section\",\"data\":{\"section_type_id\":\"11\",\"data\":{\"title\":\"ABOUT US\",\"subtitle\":\"More Than Just<br>\\nA Platform,<br>\\n<span>It\'s a Connection<\\/span>\",\"description\":\"At Soulmate India, we believe that everyone deserves companionship, friendship and meaningful experiences. We connect you with genuine, verified and trusted partners for your special moments \\u2014 because life is better together.\\n\\n\",\"background_image\":4}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"14\",\"data\":{\"title\":\"The Reality We Address\",\"list\":[{\"icon\":\"fa-solid fa-users\",\"description\":\"A large number of people, especially in urban areas, feel lonely, isolated or have limited time to explore new experiences. Traditional social platforms don\'t always provide a safe, verified and meaningful way to meet like-minded people.\\n\\n\"},{\"icon\":\"fa-regular fa-star\",\"description\":\"Where a young professional needs a date, a traveler wants a companion, or someone wants to try new activities \\u2014 finding the right partner is often difficult, time-consuming and risky.\\n\\n\"}],\"subtitle\":\"That\'s why Soulmate India exists.\",\"description\":\"Not just a platform, but a safe and trusted space to connect with real people for real experiences.\\n\\n\"}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"15\",\"data\":{\"list\":[{\"icon\":\"fa-solid fa-users\",\"number\":\"10K+\",\"title\":\"Happy Members\"},{\"icon\":\"fa-solid fa-user-check\",\"number\":\"100%\",\"title\":\"Verified Profiles\"},{\"icon\":\"fa-regular fa-star\",\"number\":\"4.8\\/5\",\"title\":\"Average Rating\"},{\"icon\":\"fa-regular fa-heart\",\"number\":\"50+\",\"title\":\"Cities Covered\"},{\"icon\":\"fa-regular fa-headphones\",\"number\":\"24\\/7\",\"title\":\"Support\"}]}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"16\",\"data\":{\"title\":\"OUR STORY\",\"subtitle\":\"What We Do\",\"description\":\"Soulmate India is a modern platform that helps people find the right partner for companionship, travel, shopping, dining and more. We carefully verify each partner and ensure a safe, respectful and enjoyable experience for everyone.\\n\\n\",\"cta\":{\"label\":\"Join Our Community\",\"url_type\":\"external\",\"external_url\":\"http:\\/\\/127.0.0.1:8000\",\"target\":\"_self\"},\"list\":[{\"icon\":\"fa-regular fa-heart\",\"title\":\"Companionship\",\"description\":\"For dates, outings and meaningful chats.\"},{\"icon\":\"fa-solid fa-plane\",\"title\":\"Travel Together\",\"description\":\"Explore new places with the right partner.\"},{\"icon\":\"fa-solid fa-cart-shopping\",\"title\":\"Shopping Companion\",\"description\":\"Make shopping more fun together.\"},{\"icon\":\"fa-solid fa-utensils\",\"title\":\"Dining Companion\",\"description\":\"Enjoy great food and conversations.\"},{\"icon\":\"fa-solid fa-person-swimming\",\"title\":\"Sports & Activities\",\"description\":\"Stay active, stay happy.\\n\\n\"},{\"icon\":\"fa-solid fa-ellipsis\",\"title\":\"And More\",\"description\":\"Many more categories to choose from.\\n\\n\"}]}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"17\",\"data\":{\"list\":[{\"icon\":\"fa-solid fa-bullseye\",\"title\":\"Our Mission\",\"description\":\"To bring the most trusted and reliable platform for providing accessible, affordable and professional companionship services to every individual across all cities and pin codes. We aim to connect loneliness, provide dignified assistance to seniors, and create meaningful earning opportunities for millions of Indians.\\n\\n\"},{\"icon\":\"fa-regular fa-eye\",\"title\":\"Our Vision\",\"description\":\"To become the most trusted name in professional social support services in India and beyond. We envision a world where no one feels alone, where help is always just a click away, and where providing care is a respected profession that empowers millions of independent workers.\\n\\n\"}]}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"18\",\"data\":{\"title\":\"Our Core Values\",\"list\":[{\"icon\":\"fa-solid fa-shield\",\"title\":\"Trust\",\"description\":\"We believe in genuine connections and transparent experiences.\\n\\n\"},{\"icon\":\"fa-solid fa-users\",\"title\":\"Respect\",\"description\":\"We promote a safe, kind and inclusive community for all.\\n\\n\"},{\"icon\":\"fa-solid fa-lock\",\"title\":\"Safety\",\"description\":\"Your security is our priority, always.\\n\\n\"},{\"icon\":\"fa-regular fa-star\",\"title\":\"Better Experiences\",\"description\":\"We aim to make every moment special and memorable.\\n\\n\"},{\"icon\":\"fa-regular fa-heart\",\"title\":\"Inclusion\",\"description\":\"Everyone deserves companionship and happiness.\\n\\n\"}]}}},{\"type\":\"global_section\",\"data\":{\"global_section_id\":\"1\"}}]\";s:12:\"is_published\";i:1;s:10:\"created_at\";s:19:\"2026-09-18 17:08:56\";s:10:\"updated_at\";s:19:\"2026-09-20 09:03:47\";s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:8:\"og_image\";N;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:2:{s:7:\"content\";s:5:\"array\";s:12:\"is_published\";s:7:\"boolean\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:8:{i:0;s:5:\"title\";i:1;s:4:\"slug\";i:2;s:7:\"content\";i:3;s:12:\"is_published\";i:4;s:10:\"meta_title\";i:5;s:16:\"meta_description\";i:6;s:13:\"meta_keywords\";i:7;s:8:\"og_image\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}',1790156370),('soulmate-india-cache-page_contact-us','O:15:\"App\\Models\\Page\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"pages\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:11:{s:2:\"id\";i:8;s:5:\"title\";s:10:\"Contact Us\";s:4:\"slug\";s:10:\"contact-us\";s:7:\"content\";s:1120:\"[{\"type\":\"section\",\"data\":{\"section_type_id\":\"11\",\"data\":{\"title\":\"GET IN TOUCH\",\"subtitle\":\"We\'d Love to<br>\\n<span>Hear From You<\\/span>\",\"description\":\"Have a question, suggestion, or need support?<br>\\nWe\'re here to help! Reach out to us \\u2014 our team will get back to you as soon as possible.\",\"background_image\":4}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"20\",\"data\":{\"title\":\"Contact Information\",\"description\":\"You can reach us through any of the following channels.\",\"contact-list\":[{\"icon\":\"fa-solid fa-envelope\",\"title\":\"Email\",\"Line_1\":\"support@soulmateindia.com\",\"line_2\":\"We usually respond within 24 hours.\",\"link\":\"mailto:support@soulmateindia.com\"},{\"icon\":\"fa-solid fa-phone\",\"title\":\"Call Us\",\"Line_1\":\"+91 98765 43210\",\"line_2\":\"Mon - Sat: 10:00 AM - 7:00 PM (IST)\",\"link\":\"tel:+919876543210\"},{\"icon\":\"fa-solid fa-location-dot\",\"title\":\"Our Office\",\"Line_1\":\"123, Business Park, Sector 62,\",\"line_2\":\"Noida, Uttar Pradesh - 201309\",\"link\":\"#visitOffice\"},{\"icon\":\"fa-solid fa-message\",\"title\":\"Live Chat\",\"Line_1\":\"Chat with our support team\",\"line_2\":\"(Mon - Sat, 10:00 AM - 7:00 PM)\"}]}}}]\";s:12:\"is_published\";i:1;s:10:\"created_at\";s:19:\"2026-09-20 09:05:04\";s:10:\"updated_at\";s:19:\"2026-09-20 09:33:02\";s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:8:\"og_image\";N;}s:11:\"\0*\0original\";a:11:{s:2:\"id\";i:8;s:5:\"title\";s:10:\"Contact Us\";s:4:\"slug\";s:10:\"contact-us\";s:7:\"content\";s:1120:\"[{\"type\":\"section\",\"data\":{\"section_type_id\":\"11\",\"data\":{\"title\":\"GET IN TOUCH\",\"subtitle\":\"We\'d Love to<br>\\n<span>Hear From You<\\/span>\",\"description\":\"Have a question, suggestion, or need support?<br>\\nWe\'re here to help! Reach out to us \\u2014 our team will get back to you as soon as possible.\",\"background_image\":4}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"20\",\"data\":{\"title\":\"Contact Information\",\"description\":\"You can reach us through any of the following channels.\",\"contact-list\":[{\"icon\":\"fa-solid fa-envelope\",\"title\":\"Email\",\"Line_1\":\"support@soulmateindia.com\",\"line_2\":\"We usually respond within 24 hours.\",\"link\":\"mailto:support@soulmateindia.com\"},{\"icon\":\"fa-solid fa-phone\",\"title\":\"Call Us\",\"Line_1\":\"+91 98765 43210\",\"line_2\":\"Mon - Sat: 10:00 AM - 7:00 PM (IST)\",\"link\":\"tel:+919876543210\"},{\"icon\":\"fa-solid fa-location-dot\",\"title\":\"Our Office\",\"Line_1\":\"123, Business Park, Sector 62,\",\"line_2\":\"Noida, Uttar Pradesh - 201309\",\"link\":\"#visitOffice\"},{\"icon\":\"fa-solid fa-message\",\"title\":\"Live Chat\",\"Line_1\":\"Chat with our support team\",\"line_2\":\"(Mon - Sat, 10:00 AM - 7:00 PM)\"}]}}}]\";s:12:\"is_published\";i:1;s:10:\"created_at\";s:19:\"2026-09-20 09:05:04\";s:10:\"updated_at\";s:19:\"2026-09-20 09:33:02\";s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:8:\"og_image\";N;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:2:{s:7:\"content\";s:5:\"array\";s:12:\"is_published\";s:7:\"boolean\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:8:{i:0;s:5:\"title\";i:1;s:4:\"slug\";i:2;s:7:\"content\";i:3;s:12:\"is_published\";i:4;s:10:\"meta_title\";i:5;s:16:\"meta_description\";i:6;s:13:\"meta_keywords\";i:7;s:8:\"og_image\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}',1789983186),('soulmate-india-cache-page_partners','O:15:\"App\\Models\\Page\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"pages\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:11:{s:2:\"id\";i:6;s:5:\"title\";s:8:\"Partners\";s:4:\"slug\";s:8:\"partners\";s:7:\"content\";s:509:\"[{\"type\":\"section\",\"data\":{\"section_type_id\":\"3\",\"data\":{\"title\":\"FIND YOUR PERFECT PARTNER\",\"subtitle\":\"Explore & Connect<br>\\n<span>With Amazing People<\\/span>\",\"description\":\"Browse through genuine profiles, find the right companion for your special moments, and make memories together.\\n\\n\",\"tagline\":\"Real People<br>\\n<span>Real Connections<\\/span><br>\\nFor Real Moments \\u2661\",\"background_image\":2,\"filter_section\":\"no\"}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"12\",\"data\":{\"title\":\"Partners\"}}}]\";s:12:\"is_published\";i:1;s:10:\"created_at\";s:19:\"2026-09-18 10:27:15\";s:10:\"updated_at\";s:19:\"2026-09-22 09:39:55\";s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:8:\"og_image\";N;}s:11:\"\0*\0original\";a:11:{s:2:\"id\";i:6;s:5:\"title\";s:8:\"Partners\";s:4:\"slug\";s:8:\"partners\";s:7:\"content\";s:509:\"[{\"type\":\"section\",\"data\":{\"section_type_id\":\"3\",\"data\":{\"title\":\"FIND YOUR PERFECT PARTNER\",\"subtitle\":\"Explore & Connect<br>\\n<span>With Amazing People<\\/span>\",\"description\":\"Browse through genuine profiles, find the right companion for your special moments, and make memories together.\\n\\n\",\"tagline\":\"Real People<br>\\n<span>Real Connections<\\/span><br>\\nFor Real Moments \\u2661\",\"background_image\":2,\"filter_section\":\"no\"}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"12\",\"data\":{\"title\":\"Partners\"}}}]\";s:12:\"is_published\";i:1;s:10:\"created_at\";s:19:\"2026-09-18 10:27:15\";s:10:\"updated_at\";s:19:\"2026-09-22 09:39:55\";s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:8:\"og_image\";N;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:2:{s:7:\"content\";s:5:\"array\";s:12:\"is_published\";s:7:\"boolean\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:8:{i:0;s:5:\"title\";i:1;s:4:\"slug\";i:2;s:7:\"content\";i:3;s:12:\"is_published\";i:4;s:10:\"meta_title\";i:5;s:16:\"meta_description\";i:6;s:13:\"meta_keywords\";i:7;s:8:\"og_image\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}',1790156569),('soulmate-india-cache-page_root','O:15:\"App\\Models\\Page\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"pages\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:11:{s:2:\"id\";i:5;s:5:\"title\";s:23:\"Soulmate India ΓÇö Root\";s:4:\"slug\";s:4:\"root\";s:7:\"content\";s:6590:\"[{\"type\":\"section\",\"data\":{\"section_type_id\":\"3\",\"data\":{\"title\":\"Partner on Rent\",\"subtitle\":\"Find the <em>Perfect<\\/em><br>\\nCompanion for<br>\\nYour Special Moments\",\"description\":\"Whether it\'s a movie, shopping, travel or just a great conversation \\u2014 <br>find your ideal partner, safely and easily.\",\"tagline\":\"Real People<br>\\n<span>Real Connections<\\/span><br>\\nFor Real Moments \\u2661\",\"background_image\":2,\"filter_section\":\"yes\"}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"4\",\"data\":{\"title\":\"Explore Categories\",\"description\":\"Choose from a variety of activities and find your perfect companion.\\n\\n\"}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"5\",\"data\":{\"title\":\"Why Choose Us?\",\"subtitle\":\"Safe, Simple & Trusted\",\"description\":\"Your safety and comfort are our priority.\",\"list\":[{\"icon\":\"fa-solid fa-user-check\",\"title\":\"Verified Profiles\",\"description\":\"Real people, verified ID & background checked.\\n\\n\"},{\"icon\":\"fa-solid fa-lock\",\"title\":\"Secure Payments\",\"description\":\"100% safe and hassle-free transactions.\\n\\n\"},{\"icon\":\"fa-regular fa-message\",\"title\":\"In-App Chat\",\"description\":\"Connect and plan your time together.\\n\\n\"},{\"icon\":\"fa-regular fa-heart\",\"title\":\"Trusted Community\",\"description\":\"Real reviews, ratings and verified experiences.\\n\\n\"},{\"icon\":\"fa-regular fa-headphones\",\"title\":\"24\\/7 Support\",\"description\":\"We\'re always here to help you.\\n\\n\"}]}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"6\",\"data\":{\"title\":\"How It Works\",\"description\":\"Getting your perfect partner is just a few simple steps.\\n\\n\",\"list\":[{\"icon\":\"fa-solid fa-user\",\"title\":\"Create Account\",\"description\":\"Sign up and complete your profile.\\n\\n\"},{\"icon\":\"fa-solid fa-magnifying-glass\",\"title\":\"Browse Partners\",\"description\":\"Explore profiles and find your match.\\n\\n\"},{\"icon\":\"fa-regular fa-calendar\",\"title\":\"Book & Pay\",\"description\":\"Choose your date, time and make a secure payment.\\n\\n\"},{\"icon\":\"fa-regular fa-message\",\"title\":\"Chat\",\"description\":\"Connect and plan your meeting.\\n\\n\"},{\"icon\":\"fa-regular fa-heart\",\"title\":\"Enjoy Your Time\",\"description\":\"Meet, make memories and share your experience.\\n\\n\"}],\"card_title\":\"Ready for Your<br> Next Adventure?\",\"card_desc\":\"Find the right partner for your favorite activities and make every moment special.\",\"card_image\":1,\"cta\":{\"label\":\"Explore Partners\",\"url_type\":\"external\",\"external_url\":\"http:\\/\\/127.0.0.1:8000\\/partners\",\"target\":\"_self\"}}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"7\",\"data\":{\"title\":\"What Our Users Say\",\"subtitle\":\"Real Stories, Real Connections.\\n\",\"description\":\"Hear from people who found their perfect partner and made unforgettable memories.\\n\\n\"}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"8\",\"data\":{\"title\":\"\\ud83d\\udc97 Membership Plans\",\"subtitle\":\"More Benefits,\\nMore Connections\",\"description\":\"Choose the plan that works best for you\\nand start connecting with compatible partners.\"}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"9\",\"data\":{\"title\":\"Earning Opportunity\",\"subtitle\":\"Earn Up to <span>\\u20b92,000<\\/span> Per Hour\\n\",\"description\":\"Join India\'s trusted partner-on-rent platform. Set your own rates, choose your services, and\\nearn while helping others.\",\"background_image\":3,\"list\":[{\"icon\":\"fa-solid fa-database\",\"numbers\":\"\\u20b92K\\/hr\",\"title\":\"Earn Per Hour\"},{\"icon\":\"fa-solid fa-shield\",\"numbers\":\"80%\",\"title\":\"You Keep\"},{\"icon\":\"fa-solid fa-users\",\"numbers\":\"Millions\",\"title\":\"of Potential Customers\"},{\"icon\":\"fa-solid fa-crown\",\"numbers\":\"\\u20b9199\",\"title\":\"Membership From\"}],\"title_2\":\"How Partners Earn\",\"description_2\":\"Choose from a variety of activities and start earning today.\",\"list_2\":[{\"icon\":\"fa-solid fa-users\",\"title\":\"Elder Care\",\"rate\":\"\\u20b91,000\\/hour\",\"description\":\"Companionship and support for your loved ones.\"},{\"icon\":\"fa-solid fa-mug-hot\",\"title\":\"Hangout\",\"rate\":\"\\u20b91,500\\/hour\",\"description\":\"Enjoy casual outings, coffee and great conversations.\"},{\"icon\":\"fa-regular fa-calendar\",\"title\":\"Events & Clubbing\",\"rate\":\"\\u20b92,000\\/hour\",\"description\":\"Make events more special with the right company.\"},{\"icon\":\"fa-solid fa-gear\",\"title\":\"Set Your Own Rates\",\"rate\":\"Flexible & Customizable\",\"description\":\"Choose your services and set your own price.\"}],\"cta\":{\"label\":\"Become a Partner\",\"url_type\":\"external\",\"external_url\":\"http:\\/\\/127.0.0.1:8000\",\"target\":\"_self\"}}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"10\",\"data\":{\"title\":\"Frequently Asked Questions\",\"description\":\"Everything you need to know about Soulmate India and how it works.\\n\\n\\n\",\"list\":[{\"question\":\"What is Soulmate India?\",\"answer\":\"<p>Soulmate India is a trusted companion platform that connects you with verified partners for activities like movies, shopping, dining, travel, events and more \\u2014 safely and easily.<\\/p>\"},{\"question\":\"Are the companions verified?\",\"answer\":\"<p>&nbsp;Yes! Every companion on Soulmate India goes through a thorough ID verification and background check process before their profile is approved and made visible on the platform.&nbsp;<\\/p>\"},{\"question\":\"How do I book a companion?\",\"answer\":\"<p>Simply create an account, browse available companion profiles, select your preferred companion, choose a date and time, make a secure payment and you\'re all set! You can also chat with them before your meeting.<br>&nbsp;<\\/p>\"},{\"question\":\"Is my personal information safe?\",\"answer\":\"<p>Absolutely. We take your privacy very seriously. Your personal data is encrypted, never shared with third parties, and all in-app communications happen through our secure messaging system.<br>&nbsp;<\\/p>\"},{\"question\":\"What activities can I book a companion for?\",\"answer\":\"<p>You can book companions for movies, shopping, dining, travel, sports &amp; fitness, events, live concerts, corporate outings, and many more categories. We keep adding new activities regularly.<\\/p>\"},{\"question\":\"How does payment work?\",\"answer\":\"<p>All payments are made securely through our platform using UPI, credit\\/debit cards, or net banking. Payments are held until after the session, ensuring full safety for both parties.&nbsp;<\\/p>\"},{\"question\":\"Can I cancel or reschedule a booking?\",\"answer\":\"<p>Yes. You can cancel or reschedule a booking up to 24 hours in advance without any penalty. Cancellations made within 24 hours may be subject to a partial refund policy as per our terms.&nbsp;<\\/p>\"},{\"question\":\"Is Soulmate India available in my city?\",\"answer\":\"<p>&nbsp;\\u201cYes! Soulmate India is available in all cities across India. Find your perfect companion wherever you are.\\u201d&nbsp;<\\/p>\"}]}}}]\";s:12:\"is_published\";i:1;s:10:\"created_at\";s:19:\"2026-09-18 09:11:05\";s:10:\"updated_at\";s:19:\"2026-09-18 10:34:06\";s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:8:\"og_image\";N;}s:11:\"\0*\0original\";a:11:{s:2:\"id\";i:5;s:5:\"title\";s:23:\"Soulmate India ΓÇö Root\";s:4:\"slug\";s:4:\"root\";s:7:\"content\";s:6590:\"[{\"type\":\"section\",\"data\":{\"section_type_id\":\"3\",\"data\":{\"title\":\"Partner on Rent\",\"subtitle\":\"Find the <em>Perfect<\\/em><br>\\nCompanion for<br>\\nYour Special Moments\",\"description\":\"Whether it\'s a movie, shopping, travel or just a great conversation \\u2014 <br>find your ideal partner, safely and easily.\",\"tagline\":\"Real People<br>\\n<span>Real Connections<\\/span><br>\\nFor Real Moments \\u2661\",\"background_image\":2,\"filter_section\":\"yes\"}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"4\",\"data\":{\"title\":\"Explore Categories\",\"description\":\"Choose from a variety of activities and find your perfect companion.\\n\\n\"}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"5\",\"data\":{\"title\":\"Why Choose Us?\",\"subtitle\":\"Safe, Simple & Trusted\",\"description\":\"Your safety and comfort are our priority.\",\"list\":[{\"icon\":\"fa-solid fa-user-check\",\"title\":\"Verified Profiles\",\"description\":\"Real people, verified ID & background checked.\\n\\n\"},{\"icon\":\"fa-solid fa-lock\",\"title\":\"Secure Payments\",\"description\":\"100% safe and hassle-free transactions.\\n\\n\"},{\"icon\":\"fa-regular fa-message\",\"title\":\"In-App Chat\",\"description\":\"Connect and plan your time together.\\n\\n\"},{\"icon\":\"fa-regular fa-heart\",\"title\":\"Trusted Community\",\"description\":\"Real reviews, ratings and verified experiences.\\n\\n\"},{\"icon\":\"fa-regular fa-headphones\",\"title\":\"24\\/7 Support\",\"description\":\"We\'re always here to help you.\\n\\n\"}]}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"6\",\"data\":{\"title\":\"How It Works\",\"description\":\"Getting your perfect partner is just a few simple steps.\\n\\n\",\"list\":[{\"icon\":\"fa-solid fa-user\",\"title\":\"Create Account\",\"description\":\"Sign up and complete your profile.\\n\\n\"},{\"icon\":\"fa-solid fa-magnifying-glass\",\"title\":\"Browse Partners\",\"description\":\"Explore profiles and find your match.\\n\\n\"},{\"icon\":\"fa-regular fa-calendar\",\"title\":\"Book & Pay\",\"description\":\"Choose your date, time and make a secure payment.\\n\\n\"},{\"icon\":\"fa-regular fa-message\",\"title\":\"Chat\",\"description\":\"Connect and plan your meeting.\\n\\n\"},{\"icon\":\"fa-regular fa-heart\",\"title\":\"Enjoy Your Time\",\"description\":\"Meet, make memories and share your experience.\\n\\n\"}],\"card_title\":\"Ready for Your<br> Next Adventure?\",\"card_desc\":\"Find the right partner for your favorite activities and make every moment special.\",\"card_image\":1,\"cta\":{\"label\":\"Explore Partners\",\"url_type\":\"external\",\"external_url\":\"http:\\/\\/127.0.0.1:8000\\/partners\",\"target\":\"_self\"}}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"7\",\"data\":{\"title\":\"What Our Users Say\",\"subtitle\":\"Real Stories, Real Connections.\\n\",\"description\":\"Hear from people who found their perfect partner and made unforgettable memories.\\n\\n\"}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"8\",\"data\":{\"title\":\"\\ud83d\\udc97 Membership Plans\",\"subtitle\":\"More Benefits,\\nMore Connections\",\"description\":\"Choose the plan that works best for you\\nand start connecting with compatible partners.\"}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"9\",\"data\":{\"title\":\"Earning Opportunity\",\"subtitle\":\"Earn Up to <span>\\u20b92,000<\\/span> Per Hour\\n\",\"description\":\"Join India\'s trusted partner-on-rent platform. Set your own rates, choose your services, and\\nearn while helping others.\",\"background_image\":3,\"list\":[{\"icon\":\"fa-solid fa-database\",\"numbers\":\"\\u20b92K\\/hr\",\"title\":\"Earn Per Hour\"},{\"icon\":\"fa-solid fa-shield\",\"numbers\":\"80%\",\"title\":\"You Keep\"},{\"icon\":\"fa-solid fa-users\",\"numbers\":\"Millions\",\"title\":\"of Potential Customers\"},{\"icon\":\"fa-solid fa-crown\",\"numbers\":\"\\u20b9199\",\"title\":\"Membership From\"}],\"title_2\":\"How Partners Earn\",\"description_2\":\"Choose from a variety of activities and start earning today.\",\"list_2\":[{\"icon\":\"fa-solid fa-users\",\"title\":\"Elder Care\",\"rate\":\"\\u20b91,000\\/hour\",\"description\":\"Companionship and support for your loved ones.\"},{\"icon\":\"fa-solid fa-mug-hot\",\"title\":\"Hangout\",\"rate\":\"\\u20b91,500\\/hour\",\"description\":\"Enjoy casual outings, coffee and great conversations.\"},{\"icon\":\"fa-regular fa-calendar\",\"title\":\"Events & Clubbing\",\"rate\":\"\\u20b92,000\\/hour\",\"description\":\"Make events more special with the right company.\"},{\"icon\":\"fa-solid fa-gear\",\"title\":\"Set Your Own Rates\",\"rate\":\"Flexible & Customizable\",\"description\":\"Choose your services and set your own price.\"}],\"cta\":{\"label\":\"Become a Partner\",\"url_type\":\"external\",\"external_url\":\"http:\\/\\/127.0.0.1:8000\",\"target\":\"_self\"}}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"10\",\"data\":{\"title\":\"Frequently Asked Questions\",\"description\":\"Everything you need to know about Soulmate India and how it works.\\n\\n\\n\",\"list\":[{\"question\":\"What is Soulmate India?\",\"answer\":\"<p>Soulmate India is a trusted companion platform that connects you with verified partners for activities like movies, shopping, dining, travel, events and more \\u2014 safely and easily.<\\/p>\"},{\"question\":\"Are the companions verified?\",\"answer\":\"<p>&nbsp;Yes! Every companion on Soulmate India goes through a thorough ID verification and background check process before their profile is approved and made visible on the platform.&nbsp;<\\/p>\"},{\"question\":\"How do I book a companion?\",\"answer\":\"<p>Simply create an account, browse available companion profiles, select your preferred companion, choose a date and time, make a secure payment and you\'re all set! You can also chat with them before your meeting.<br>&nbsp;<\\/p>\"},{\"question\":\"Is my personal information safe?\",\"answer\":\"<p>Absolutely. We take your privacy very seriously. Your personal data is encrypted, never shared with third parties, and all in-app communications happen through our secure messaging system.<br>&nbsp;<\\/p>\"},{\"question\":\"What activities can I book a companion for?\",\"answer\":\"<p>You can book companions for movies, shopping, dining, travel, sports &amp; fitness, events, live concerts, corporate outings, and many more categories. We keep adding new activities regularly.<\\/p>\"},{\"question\":\"How does payment work?\",\"answer\":\"<p>All payments are made securely through our platform using UPI, credit\\/debit cards, or net banking. Payments are held until after the session, ensuring full safety for both parties.&nbsp;<\\/p>\"},{\"question\":\"Can I cancel or reschedule a booking?\",\"answer\":\"<p>Yes. You can cancel or reschedule a booking up to 24 hours in advance without any penalty. Cancellations made within 24 hours may be subject to a partial refund policy as per our terms.&nbsp;<\\/p>\"},{\"question\":\"Is Soulmate India available in my city?\",\"answer\":\"<p>&nbsp;\\u201cYes! Soulmate India is available in all cities across India. Find your perfect companion wherever you are.\\u201d&nbsp;<\\/p>\"}]}}}]\";s:12:\"is_published\";i:1;s:10:\"created_at\";s:19:\"2026-09-18 09:11:05\";s:10:\"updated_at\";s:19:\"2026-09-18 10:34:06\";s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:8:\"og_image\";N;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:2:{s:7:\"content\";s:5:\"array\";s:12:\"is_published\";s:7:\"boolean\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:8:{i:0;s:5:\"title\";i:1;s:4:\"slug\";i:2;s:7:\"content\";i:3;s:12:\"is_published\";i:4;s:10:\"meta_title\";i:5;s:16:\"meta_description\";i:6;s:13:\"meta_keywords\";i:7;s:8:\"og_image\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}',1790336723),('soulmate-india-cache-setting_copyright_text','s:44:\"┬⌐ 2026 Soulmate India. All rights reserved.\";',1790336245),('soulmate-india-cache-setting_footer_buttons','a:0:{}',1790155208),('soulmate-india-cache-setting_footer_nav','a:1:{i:0;a:2:{s:12:\"column_title\";s:6:\"Footer\";s:5:\"links\";a:6:{i:0;a:2:{s:5:\"label\";s:4:\"Home\";s:3:\"url\";s:1:\"/\";}i:1;a:2:{s:5:\"label\";s:8:\"Discover\";s:3:\"url\";s:9:\"/partners\";}i:2;a:2:{s:5:\"label\";s:10:\"Membership\";s:3:\"url\";s:12:\"/#membership\";}i:3;a:2:{s:5:\"label\";s:15:\"Earning With Us\";s:3:\"url\";s:9:\"/#earning\";}i:4;a:2:{s:5:\"label\";s:8:\"About Us\";s:3:\"url\";s:9:\"/about-us\";}i:5;a:2:{s:5:\"label\";s:10:\"Contact Us\";s:3:\"url\";s:11:\"/contatc-us\";}}}}',1790336245),('soulmate-india-cache-setting_footer_tagline','s:39:\"Because every moment is better together\";',1790336245),('soulmate-india-cache-setting_header_nav','a:7:{i:0;a:4:{s:5:\"label\";s:4:\"Home\";s:3:\"url\";s:1:\"/\";s:15:\"open_in_new_tab\";b:0;s:8:\"children\";a:0:{}}i:1;a:4:{s:5:\"label\";s:8:\"Discover\";s:3:\"url\";s:9:\"/partners\";s:15:\"open_in_new_tab\";b:0;s:8:\"children\";a:0:{}}i:2;a:4:{s:5:\"label\";s:10:\"Categories\";s:3:\"url\";s:11:\"/categories\";s:15:\"open_in_new_tab\";b:0;s:8:\"children\";a:0:{}}i:3;a:4:{s:5:\"label\";s:10:\"Membership\";s:3:\"url\";s:12:\"/#membership\";s:15:\"open_in_new_tab\";b:0;s:8:\"children\";a:0:{}}i:4;a:4:{s:5:\"label\";s:15:\"Earning With Us\";s:3:\"url\";s:9:\"/#earning\";s:15:\"open_in_new_tab\";b:0;s:8:\"children\";a:0:{}}i:5;a:4:{s:5:\"label\";s:8:\"ABout Us\";s:3:\"url\";s:9:\"/about-us\";s:15:\"open_in_new_tab\";b:0;s:8:\"children\";a:0:{}}i:6;a:4:{s:5:\"label\";s:10:\"Contact Us\";s:3:\"url\";s:11:\"/contact-us\";s:15:\"open_in_new_tab\";b:0;s:8:\"children\";a:0:{}}}',1790336245),('soulmate-india-cache-setting_header_secondary_nav','a:0:{}',1790155208),('soulmate-india-cache-setting_logo','i:5;',1790336245),('soulmate-india-cache-setting_site_name','s:15:\"Soulemate India\";',1790336245),('soulmate-india-cache-setting_social_facebook','N;',1790336764),('soulmate-india-cache-setting_social_instagram','N;',1790336764),('soulmate-india-cache-setting_social_linkedin','N;',1790336764),('soulmate-india-cache-setting_social_twitter','N;',1790336764),('soulmate-india-cache-setting_social_youtube','N;',1790336764),('soulmate-india-cache-spatie.permission.cache','a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:199:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:13:\"view_activity\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:17:\"view_any_activity\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:15:\"create_activity\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:15:\"update_activity\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:16:\"restore_activity\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:20:\"restore_any_activity\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:18:\"replicate_activity\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:16:\"reorder_activity\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:15:\"delete_activity\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:19:\"delete_any_activity\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:21:\"force_delete_activity\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:25:\"force_delete_any_activity\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:12:\"view_booking\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:16:\"view_any_booking\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:14:\"create_booking\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:14:\"update_booking\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:15:\"restore_booking\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:19:\"restore_any_booking\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:17:\"replicate_booking\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:15:\"reorder_booking\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:14:\"delete_booking\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:18:\"delete_any_booking\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:22;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:20:\"force_delete_booking\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:23;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:24:\"force_delete_any_booking\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:24;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:10:\"view_brand\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:25;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:14:\"view_any_brand\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:26;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:12:\"create_brand\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:27;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:12:\"update_brand\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:28;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:13:\"restore_brand\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:29;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:17:\"restore_any_brand\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:30;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:15:\"replicate_brand\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:31;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:13:\"reorder_brand\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:32;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:12:\"delete_brand\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:33;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:16:\"delete_any_brand\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:34;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:18:\"force_delete_brand\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:35;a:4:{s:1:\"a\";i:36;s:1:\"b\";s:22:\"force_delete_any_brand\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:36;a:4:{s:1:\"a\";i:37;s:1:\"b\";s:13:\"view_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:37;a:4:{s:1:\"a\";i:38;s:1:\"b\";s:17:\"view_any_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:38;a:4:{s:1:\"a\";i:39;s:1:\"b\";s:15:\"create_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:39;a:4:{s:1:\"a\";i:40;s:1:\"b\";s:15:\"update_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:40;a:4:{s:1:\"a\";i:41;s:1:\"b\";s:16:\"restore_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:41;a:4:{s:1:\"a\";i:42;s:1:\"b\";s:20:\"restore_any_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:42;a:4:{s:1:\"a\";i:43;s:1:\"b\";s:18:\"replicate_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:43;a:4:{s:1:\"a\";i:44;s:1:\"b\";s:16:\"reorder_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:44;a:4:{s:1:\"a\";i:45;s:1:\"b\";s:15:\"delete_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:45;a:4:{s:1:\"a\";i:46;s:1:\"b\";s:19:\"delete_any_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:46;a:4:{s:1:\"a\";i:47;s:1:\"b\";s:21:\"force_delete_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:47;a:4:{s:1:\"a\";i:48;s:1:\"b\";s:25:\"force_delete_any_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:48;a:4:{s:1:\"a\";i:49;s:1:\"b\";s:18:\"view_certification\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:49;a:4:{s:1:\"a\";i:50;s:1:\"b\";s:22:\"view_any_certification\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:50;a:4:{s:1:\"a\";i:51;s:1:\"b\";s:20:\"create_certification\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:51;a:4:{s:1:\"a\";i:52;s:1:\"b\";s:20:\"update_certification\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:52;a:4:{s:1:\"a\";i:53;s:1:\"b\";s:21:\"restore_certification\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:53;a:4:{s:1:\"a\";i:54;s:1:\"b\";s:25:\"restore_any_certification\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:54;a:4:{s:1:\"a\";i:55;s:1:\"b\";s:23:\"replicate_certification\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:55;a:4:{s:1:\"a\";i:56;s:1:\"b\";s:21:\"reorder_certification\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:56;a:4:{s:1:\"a\";i:57;s:1:\"b\";s:20:\"delete_certification\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:57;a:4:{s:1:\"a\";i:58;s:1:\"b\";s:24:\"delete_any_certification\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:58;a:4:{s:1:\"a\";i:59;s:1:\"b\";s:26:\"force_delete_certification\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:59;a:4:{s:1:\"a\";i:60;s:1:\"b\";s:30:\"force_delete_any_certification\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:60;a:4:{s:1:\"a\";i:61;s:1:\"b\";s:9:\"view_form\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:61;a:4:{s:1:\"a\";i:62;s:1:\"b\";s:13:\"view_any_form\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:62;a:4:{s:1:\"a\";i:63;s:1:\"b\";s:11:\"create_form\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:63;a:4:{s:1:\"a\";i:64;s:1:\"b\";s:11:\"update_form\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:64;a:4:{s:1:\"a\";i:65;s:1:\"b\";s:12:\"restore_form\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:65;a:4:{s:1:\"a\";i:66;s:1:\"b\";s:16:\"restore_any_form\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:66;a:4:{s:1:\"a\";i:67;s:1:\"b\";s:14:\"replicate_form\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:67;a:4:{s:1:\"a\";i:68;s:1:\"b\";s:12:\"reorder_form\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:68;a:4:{s:1:\"a\";i:69;s:1:\"b\";s:11:\"delete_form\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:69;a:4:{s:1:\"a\";i:70;s:1:\"b\";s:15:\"delete_any_form\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:70;a:4:{s:1:\"a\";i:71;s:1:\"b\";s:17:\"force_delete_form\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:71;a:4:{s:1:\"a\";i:72;s:1:\"b\";s:21:\"force_delete_any_form\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:72;a:4:{s:1:\"a\";i:73;s:1:\"b\";s:21:\"view_form::submission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:73;a:4:{s:1:\"a\";i:74;s:1:\"b\";s:25:\"view_any_form::submission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:74;a:4:{s:1:\"a\";i:75;s:1:\"b\";s:23:\"create_form::submission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:75;a:4:{s:1:\"a\";i:76;s:1:\"b\";s:23:\"update_form::submission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:76;a:4:{s:1:\"a\";i:77;s:1:\"b\";s:24:\"restore_form::submission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:77;a:4:{s:1:\"a\";i:78;s:1:\"b\";s:28:\"restore_any_form::submission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:78;a:4:{s:1:\"a\";i:79;s:1:\"b\";s:26:\"replicate_form::submission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:79;a:4:{s:1:\"a\";i:80;s:1:\"b\";s:24:\"reorder_form::submission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:80;a:4:{s:1:\"a\";i:81;s:1:\"b\";s:23:\"delete_form::submission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:81;a:4:{s:1:\"a\";i:82;s:1:\"b\";s:27:\"delete_any_form::submission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:82;a:4:{s:1:\"a\";i:83;s:1:\"b\";s:29:\"force_delete_form::submission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:83;a:4:{s:1:\"a\";i:84;s:1:\"b\";s:33:\"force_delete_any_form::submission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:84;a:4:{s:1:\"a\";i:85;s:1:\"b\";s:20:\"view_global::section\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:85;a:4:{s:1:\"a\";i:86;s:1:\"b\";s:24:\"view_any_global::section\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:86;a:4:{s:1:\"a\";i:87;s:1:\"b\";s:22:\"create_global::section\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:87;a:4:{s:1:\"a\";i:88;s:1:\"b\";s:22:\"update_global::section\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:88;a:4:{s:1:\"a\";i:89;s:1:\"b\";s:23:\"restore_global::section\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:89;a:4:{s:1:\"a\";i:90;s:1:\"b\";s:27:\"restore_any_global::section\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:90;a:4:{s:1:\"a\";i:91;s:1:\"b\";s:25:\"replicate_global::section\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:91;a:4:{s:1:\"a\";i:92;s:1:\"b\";s:23:\"reorder_global::section\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:92;a:4:{s:1:\"a\";i:93;s:1:\"b\";s:22:\"delete_global::section\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:93;a:4:{s:1:\"a\";i:94;s:1:\"b\";s:26:\"delete_any_global::section\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:94;a:4:{s:1:\"a\";i:95;s:1:\"b\";s:28:\"force_delete_global::section\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:95;a:4:{s:1:\"a\";i:96;s:1:\"b\";s:32:\"force_delete_any_global::section\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:96;a:4:{s:1:\"a\";i:97;s:1:\"b\";s:10:\"view_media\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:97;a:4:{s:1:\"a\";i:98;s:1:\"b\";s:14:\"view_any_media\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:98;a:4:{s:1:\"a\";i:99;s:1:\"b\";s:12:\"create_media\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:99;a:4:{s:1:\"a\";i:100;s:1:\"b\";s:12:\"update_media\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:100;a:4:{s:1:\"a\";i:101;s:1:\"b\";s:13:\"restore_media\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:101;a:4:{s:1:\"a\";i:102;s:1:\"b\";s:17:\"restore_any_media\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:102;a:4:{s:1:\"a\";i:103;s:1:\"b\";s:15:\"replicate_media\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:103;a:4:{s:1:\"a\";i:104;s:1:\"b\";s:13:\"reorder_media\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:104;a:4:{s:1:\"a\";i:105;s:1:\"b\";s:12:\"delete_media\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:105;a:4:{s:1:\"a\";i:106;s:1:\"b\";s:16:\"delete_any_media\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:106;a:4:{s:1:\"a\";i:107;s:1:\"b\";s:18:\"force_delete_media\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:107;a:4:{s:1:\"a\";i:108;s:1:\"b\";s:22:\"force_delete_any_media\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:108;a:4:{s:1:\"a\";i:109;s:1:\"b\";s:22:\"view_membership::order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:109;a:4:{s:1:\"a\";i:110;s:1:\"b\";s:26:\"view_any_membership::order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:110;a:4:{s:1:\"a\";i:111;s:1:\"b\";s:24:\"create_membership::order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:111;a:4:{s:1:\"a\";i:112;s:1:\"b\";s:24:\"update_membership::order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:112;a:4:{s:1:\"a\";i:113;s:1:\"b\";s:25:\"restore_membership::order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:113;a:4:{s:1:\"a\";i:114;s:1:\"b\";s:29:\"restore_any_membership::order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:114;a:4:{s:1:\"a\";i:115;s:1:\"b\";s:27:\"replicate_membership::order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:115;a:4:{s:1:\"a\";i:116;s:1:\"b\";s:25:\"reorder_membership::order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:116;a:4:{s:1:\"a\";i:117;s:1:\"b\";s:24:\"delete_membership::order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:117;a:4:{s:1:\"a\";i:118;s:1:\"b\";s:28:\"delete_any_membership::order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:118;a:4:{s:1:\"a\";i:119;s:1:\"b\";s:30:\"force_delete_membership::order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:119;a:4:{s:1:\"a\";i:120;s:1:\"b\";s:34:\"force_delete_any_membership::order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:120;a:4:{s:1:\"a\";i:121;s:1:\"b\";s:21:\"view_membership::plan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:121;a:4:{s:1:\"a\";i:122;s:1:\"b\";s:25:\"view_any_membership::plan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:122;a:4:{s:1:\"a\";i:123;s:1:\"b\";s:23:\"create_membership::plan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:123;a:4:{s:1:\"a\";i:124;s:1:\"b\";s:23:\"update_membership::plan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:124;a:4:{s:1:\"a\";i:125;s:1:\"b\";s:24:\"restore_membership::plan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:125;a:4:{s:1:\"a\";i:126;s:1:\"b\";s:28:\"restore_any_membership::plan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:126;a:4:{s:1:\"a\";i:127;s:1:\"b\";s:26:\"replicate_membership::plan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:127;a:4:{s:1:\"a\";i:128;s:1:\"b\";s:24:\"reorder_membership::plan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:128;a:4:{s:1:\"a\";i:129;s:1:\"b\";s:23:\"delete_membership::plan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:129;a:4:{s:1:\"a\";i:130;s:1:\"b\";s:27:\"delete_any_membership::plan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:130;a:4:{s:1:\"a\";i:131;s:1:\"b\";s:29:\"force_delete_membership::plan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:131;a:4:{s:1:\"a\";i:132;s:1:\"b\";s:33:\"force_delete_any_membership::plan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:132;a:4:{s:1:\"a\";i:133;s:1:\"b\";s:9:\"view_page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:133;a:4:{s:1:\"a\";i:134;s:1:\"b\";s:13:\"view_any_page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:134;a:4:{s:1:\"a\";i:135;s:1:\"b\";s:11:\"create_page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:135;a:4:{s:1:\"a\";i:136;s:1:\"b\";s:11:\"update_page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:136;a:4:{s:1:\"a\";i:137;s:1:\"b\";s:12:\"restore_page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:137;a:4:{s:1:\"a\";i:138;s:1:\"b\";s:16:\"restore_any_page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:138;a:4:{s:1:\"a\";i:139;s:1:\"b\";s:14:\"replicate_page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:139;a:4:{s:1:\"a\";i:140;s:1:\"b\";s:12:\"reorder_page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:140;a:4:{s:1:\"a\";i:141;s:1:\"b\";s:11:\"delete_page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:141;a:4:{s:1:\"a\";i:142;s:1:\"b\";s:15:\"delete_any_page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:142;a:4:{s:1:\"a\";i:143;s:1:\"b\";s:17:\"force_delete_page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:143;a:4:{s:1:\"a\";i:144;s:1:\"b\";s:21:\"force_delete_any_page\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:144;a:4:{s:1:\"a\";i:145;s:1:\"b\";s:9:\"view_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:145;a:4:{s:1:\"a\";i:146;s:1:\"b\";s:13:\"view_any_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:146;a:4:{s:1:\"a\";i:147;s:1:\"b\";s:11:\"create_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:147;a:4:{s:1:\"a\";i:148;s:1:\"b\";s:11:\"update_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:148;a:4:{s:1:\"a\";i:149;s:1:\"b\";s:12:\"restore_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:149;a:4:{s:1:\"a\";i:150;s:1:\"b\";s:16:\"restore_any_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:150;a:4:{s:1:\"a\";i:151;s:1:\"b\";s:14:\"replicate_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:151;a:4:{s:1:\"a\";i:152;s:1:\"b\";s:12:\"reorder_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:152;a:4:{s:1:\"a\";i:153;s:1:\"b\";s:11:\"delete_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:153;a:4:{s:1:\"a\";i:154;s:1:\"b\";s:15:\"delete_any_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:154;a:4:{s:1:\"a\";i:155;s:1:\"b\";s:17:\"force_delete_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:155;a:4:{s:1:\"a\";i:156;s:1:\"b\";s:21:\"force_delete_any_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:156;a:4:{s:1:\"a\";i:157;s:1:\"b\";s:9:\"view_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:157;a:4:{s:1:\"a\";i:158;s:1:\"b\";s:13:\"view_any_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:158;a:4:{s:1:\"a\";i:159;s:1:\"b\";s:11:\"create_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:159;a:4:{s:1:\"a\";i:160;s:1:\"b\";s:11:\"update_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:160;a:4:{s:1:\"a\";i:161;s:1:\"b\";s:11:\"delete_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:161;a:4:{s:1:\"a\";i:162;s:1:\"b\";s:15:\"delete_any_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:162;a:4:{s:1:\"a\";i:163;s:1:\"b\";s:18:\"view_section::type\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:163;a:4:{s:1:\"a\";i:164;s:1:\"b\";s:22:\"view_any_section::type\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:164;a:4:{s:1:\"a\";i:165;s:1:\"b\";s:20:\"create_section::type\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:165;a:4:{s:1:\"a\";i:166;s:1:\"b\";s:20:\"update_section::type\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:166;a:4:{s:1:\"a\";i:167;s:1:\"b\";s:21:\"restore_section::type\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:167;a:4:{s:1:\"a\";i:168;s:1:\"b\";s:25:\"restore_any_section::type\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:168;a:4:{s:1:\"a\";i:169;s:1:\"b\";s:23:\"replicate_section::type\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:169;a:4:{s:1:\"a\";i:170;s:1:\"b\";s:21:\"reorder_section::type\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:170;a:4:{s:1:\"a\";i:171;s:1:\"b\";s:20:\"delete_section::type\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:171;a:4:{s:1:\"a\";i:172;s:1:\"b\";s:24:\"delete_any_section::type\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:172;a:4:{s:1:\"a\";i:173;s:1:\"b\";s:26:\"force_delete_section::type\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:173;a:4:{s:1:\"a\";i:174;s:1:\"b\";s:30:\"force_delete_any_section::type\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:174;a:4:{s:1:\"a\";i:175;s:1:\"b\";s:10:\"view_staff\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:175;a:4:{s:1:\"a\";i:176;s:1:\"b\";s:14:\"view_any_staff\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:176;a:4:{s:1:\"a\";i:177;s:1:\"b\";s:12:\"create_staff\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:177;a:4:{s:1:\"a\";i:178;s:1:\"b\";s:12:\"update_staff\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:178;a:4:{s:1:\"a\";i:179;s:1:\"b\";s:13:\"restore_staff\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:179;a:4:{s:1:\"a\";i:180;s:1:\"b\";s:17:\"restore_any_staff\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:180;a:4:{s:1:\"a\";i:181;s:1:\"b\";s:15:\"replicate_staff\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:181;a:4:{s:1:\"a\";i:182;s:1:\"b\";s:13:\"reorder_staff\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:182;a:4:{s:1:\"a\";i:183;s:1:\"b\";s:12:\"delete_staff\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:183;a:4:{s:1:\"a\";i:184;s:1:\"b\";s:16:\"delete_any_staff\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:184;a:4:{s:1:\"a\";i:185;s:1:\"b\";s:18:\"force_delete_staff\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:185;a:4:{s:1:\"a\";i:186;s:1:\"b\";s:22:\"force_delete_any_staff\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:186;a:4:{s:1:\"a\";i:187;s:1:\"b\";s:9:\"view_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:187;a:4:{s:1:\"a\";i:188;s:1:\"b\";s:13:\"view_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:188;a:4:{s:1:\"a\";i:189;s:1:\"b\";s:11:\"create_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:189;a:4:{s:1:\"a\";i:190;s:1:\"b\";s:11:\"update_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:190;a:4:{s:1:\"a\";i:191;s:1:\"b\";s:12:\"restore_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:191;a:4:{s:1:\"a\";i:192;s:1:\"b\";s:16:\"restore_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:192;a:4:{s:1:\"a\";i:193;s:1:\"b\";s:14:\"replicate_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:193;a:4:{s:1:\"a\";i:194;s:1:\"b\";s:12:\"reorder_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:194;a:4:{s:1:\"a\";i:195;s:1:\"b\";s:11:\"delete_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:195;a:4:{s:1:\"a\";i:196;s:1:\"b\";s:15:\"delete_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:196;a:4:{s:1:\"a\";i:197;s:1:\"b\";s:17:\"force_delete_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:197;a:4:{s:1:\"a\";i:198;s:1:\"b\";s:21:\"force_delete_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:198;a:4:{s:1:\"a\";i:199;s:1:\"b\";s:17:\"page_SiteSettings\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:1:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:11:\"super_admin\";s:1:\"c\";s:3:\"web\";}}}',1790155204);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pricing_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'hourly',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prices` decimal(10,2) DEFAULT NULL,
  `hours` int(11) DEFAULT NULL,
  `minutes` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_price` decimal(10,2) DEFAULT NULL,
  `max_price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Movie Partner','package','movie-partner','2026-09-17 05:48:39','2026-09-22 04:47:05',NULL,'≡ƒÄ¼',4500.00,3,30,'Watch together, share laughs',NULL,NULL),(2,'In-Person Meeting','hourly','in-person-meeting','2026-09-17 05:48:40','2026-09-17 05:48:40',NULL,'≡ƒñ¥',2000.00,1,0,'Face-to-face meeting and conversation',NULL,NULL),(3,'Elder Care','hourly','elder-care','2026-09-17 05:48:40','2026-09-17 05:48:40',NULL,'≡ƒæ┤',1000.00,1,0,'Senior assistance & daily support',NULL,NULL),(4,'Hangingout','hourly','hangingout','2026-09-17 05:48:40','2026-09-17 05:48:40',NULL,'≡ƒÿè',1500.00,1,0,'Casual social time together',NULL,NULL),(5,'Clubbing','hourly','clubbing','2026-09-17 05:48:40','2026-09-17 05:48:40',NULL,'≡ƒÄë',4500.00,3,0,'Nightlife & party assistance',NULL,NULL),(6,'Shopping Buddy','hourly','shopping-buddy','2026-09-17 05:48:40','2026-09-17 05:48:40',NULL,'≡ƒ¢ì∩╕Å',2000.00,1,0,'Groceries, errands, or shopping',NULL,NULL),(7,'Medical Support','hourly','medical-support','2026-09-17 05:48:40','2026-09-17 05:48:40',NULL,'≡ƒÅÑ',2000.00,1,0,'Hospital & appointment assistance',NULL,NULL),(8,'Domestic Help','hourly','domestic-help','2026-09-17 05:48:40','2026-09-17 05:48:40',NULL,'≡ƒÅá',2000.00,1,0,'Light support & organizing',NULL,NULL),(9,'Travel Partner','hourly','travel-partner','2026-09-17 05:48:40','2026-09-17 05:48:40',NULL,'Γ£ê∩╕Å',2000.00,1,0,'Explore and travel together',NULL,NULL),(10,'Event Partner','hourly','event-partner','2026-09-17 05:48:40','2026-09-17 05:48:40',NULL,'≡ƒÄ¡',2000.00,1,0,'Event & Party Assistance',NULL,NULL),(11,'City Tour Partner','hourly','city-tour-partner','2026-09-17 05:48:40','2026-09-17 05:48:40',NULL,'≡ƒÜ┤',2000.00,1,0,'Explore City',NULL,NULL),(12,'Gaming Partner (Physical)','hourly','gaming-partner-physical','2026-09-17 05:48:40','2026-09-17 05:48:40',NULL,'≡ƒÄ«',1800.00,1,0,'Play & Fun',NULL,NULL),(13,'Concert Partner','hourly','concert-partner','2026-09-17 05:48:40','2026-09-17 05:48:40',NULL,'≡ƒÄ╕',2000.00,1,0,'Enjoy & Laught',NULL,NULL),(14,'Coffee Partner','hourly','coffee-partner','2026-09-17 05:48:40','2026-09-17 05:48:40',NULL,'Γÿò',1500.00,1,0,'Enjoy Coffee',NULL,NULL),(15,'Cafe & Food Partner','hourly','cafe-food-partner','2026-09-17 05:48:40','2026-09-17 05:48:40',NULL,'≡ƒìò',2000.00,1,0,'Outing with Yummy Food',NULL,NULL),(16,'Professional Networking Partner','hourly','professional-networking-partner','2026-09-17 05:48:40','2026-09-17 05:48:40',NULL,'≡ƒÆ╝',1500.00,1,0,'Business Discussion, Startup Brainstorming',NULL,NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `certifications`
--

DROP TABLE IF EXISTS `certifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `certifications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `certifications`
--

LOCK TABLES `certifications` WRITE;
/*!40000 ALTER TABLE `certifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `certifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form_submissions`
--

DROP TABLE IF EXISTS `form_submissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `form_submissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `form_id` bigint(20) unsigned NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data`)),
  `metadata` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`metadata`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `form_submissions_form_id_foreign` (`form_id`),
  CONSTRAINT `form_submissions_form_id_foreign` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_submissions`
--

LOCK TABLES `form_submissions` WRITE;
/*!40000 ALTER TABLE `form_submissions` DISABLE KEYS */;
INSERT INTO `form_submissions` VALUES (1,1,'{\"full_name\":\"rk\",\"email\":\"rk@gmail.com\",\"subject\":\"general\",\"message\":\"message\",\"terms\":true}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/153.0.0.0 Safari\\/537.36\",\"referer\":\"http:\\/\\/127.0.0.1:8000\\/contact-us\"}','2026-09-20 04:16:20','2026-09-20 04:16:20'),(2,1,'{\"full_name\":\"test\",\"email\":\"test@gmail.com\",\"subject\":\"booking\",\"message\":\"test\",\"terms\":true}','{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/153.0.0.0 Safari\\/537.36\",\"referer\":\"http:\\/\\/127.0.0.1:8000\\/contact-us\"}','2026-09-20 04:17:44','2026-09-20 04:17:44');
/*!40000 ALTER TABLE `form_submissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forms`
--

DROP TABLE IF EXISTS `forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fields` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`fields`)),
  `settings` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`settings`)),
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `forms_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forms`
--

LOCK TABLES `forms` WRITE;
/*!40000 ALTER TABLE `forms` DISABLE KEYS */;
INSERT INTO `forms` VALUES (1,'Contact Us Form','contact-us-form','[{\"type\":\"text\",\"data\":{\"name\":\"full_name\",\"label\":\"Full Name\",\"placeholder\":\"Enter your name\",\"required\":true}},{\"type\":\"email\",\"data\":{\"name\":\"email\",\"label\":\"Email Address\",\"placeholder\":\"Enter your email\",\"required\":true}},{\"type\":\"select\",\"data\":{\"name\":\"subject\",\"label\":\"Subject\",\"required\":true,\"options\":[{\"label\":\"General Inquiry\",\"value\":\"general\"},{\"label\":\"Booking Assistance\",\"value\":\"booking\"},{\"label\":\"Membership & Plans\",\"value\":\"membership\"},{\"label\":\"Become a Partner\",\"value\":\"partner\"},{\"label\":\"Safety & Support\",\"value\":\"support\"},{\"label\":\"Other\",\"value\":\"other\"}]}},{\"type\":\"textarea\",\"data\":{\"name\":\"message\",\"label\":\"Message\",\"placeholder\":\"Type your message here...\",\"required\":true}},{\"type\":\"checkbox\",\"data\":{\"name\":\"terms\",\"label\":\"I agree to the Terms & Conditions and Privacy Policy.\",\"required\":true}}]','{\"submit_button_text\":\"Send Message\",\"success_message\":\"Thank you! We will get back to you shortly.\",\"notification_emails\":\"admin@soulmateindia.com\"}',1,'2026-09-20 04:08:27','2026-09-20 04:08:27');
/*!40000 ALTER TABLE `forms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `global_sections`
--

DROP TABLE IF EXISTS `global_sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `global_sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_type_id` bigint(20) unsigned NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `global_sections_section_type_id_foreign` (`section_type_id`),
  CONSTRAINT `global_sections_section_type_id_foreign` FOREIGN KEY (`section_type_id`) REFERENCES `section_types` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `global_sections`
--

LOCK TABLES `global_sections` WRITE;
/*!40000 ALTER TABLE `global_sections` DISABLE KEYS */;
INSERT INTO `global_sections` VALUES (1,'Find Partner Banner',19,'{\"tagline\":\"Let\'s create something beautiful\",\"title\":\"Ready to Find Your Perfect Partner?\",\"description\":\"Join Soulmate India and discover a world of companionship, new experiences and unforgettable moments.\\n\\n\",\"image\":4,\"cta\":{\"label\":\"GET Started\",\"url_type\":\"external\",\"external_url\":\"http:\\/\\/127.0.0.1:8000\\/\",\"target\":\"_self\"}}','2026-09-18 06:08:09','2026-09-18 06:08:09');
/*!40000 ALTER TABLE `global_sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (1,'default','{\"uuid\":\"25bd0c1a-7d00-4722-afec-29a0abb90c45\",\"displayName\":\"App\\\\Mail\\\\FormSubmitted\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":17:{s:8:\\\"mailable\\\";O:22:\\\"App\\\\Mail\\\\FormSubmitted\\\":3:{s:10:\\\"submission\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:25:\\\"App\\\\Models\\\\FormSubmission\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:23:\\\"admin@soulmateindia.com\\\";}}s:6:\\\"mailer\\\";s:3:\\\"log\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:12:\\\"messageGroup\\\";N;s:12:\\\"deduplicator\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\",\"batchId\":null},\"createdAt\":1789897581,\"delay\":null}',0,NULL,1789897581,1789897581),(2,'default','{\"uuid\":\"5b4e1397-12bb-449a-b69b-b4c1cf14e5fb\",\"displayName\":\"App\\\\Mail\\\\FormSubmitted\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":17:{s:8:\\\"mailable\\\";O:22:\\\"App\\\\Mail\\\\FormSubmitted\\\":3:{s:10:\\\"submission\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:25:\\\"App\\\\Models\\\\FormSubmission\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:23:\\\"admin@soulmateindia.com\\\";}}s:6:\\\"mailer\\\";s:3:\\\"log\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:12:\\\"messageGroup\\\";N;s:12:\\\"deduplicator\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\",\"batchId\":null},\"createdAt\":1789897664,\"delay\":null}',0,NULL,1789897664,1789897664);
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'public',
  `directory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'media',
  `visibility` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'public',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `width` int(10) unsigned DEFAULT NULL,
  `height` int(10) unsigned DEFAULT NULL,
  `size` int(10) unsigned DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image',
  `ext` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exif` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `curations` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tenant_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` VALUES (1,'public','media','public','58ec7b3e-a3d1-4ff9-a642-97ba32f2dff8','media/58ec7b3e-a3d1-4ff9-a642-97ba32f2dff8.jpg',295,155,14977,'image/jpeg','jpg',NULL,'cta',NULL,NULL,'{\"FileName\":\"G0dnv1ju8Wut2DiUWqMehNOEjRWCfQ-metaY3RhLmpwZw==-.jpg\",\"FileDateTime\":1789721562,\"FileSize\":14977,\"FileType\":2,\"MimeType\":\"image\\/jpeg\",\"SectionsFound\":null,\"COMPUTED\":{\"html\":\"width=\\\"295\\\" height=\\\"155\\\"\",\"Height\":155,\"Width\":295,\"IsColor\":1}}',NULL,'2026-09-18 03:22:45','2026-09-18 03:22:45',NULL),(2,'public','media','public','1ab3ad57-b50b-476b-9fb9-24879e547ed3','media/1ab3ad57-b50b-476b-9fb9-24879e547ed3.jpg',594,308,42445,'image/jpeg','jpg',NULL,'hero',NULL,NULL,'{\"FileName\":\"eNiGUmvGUUrbcCJ22Af6wX2A2S6lsh-metaaGVyby5qcGc=-.jpg\",\"FileDateTime\":1789721645,\"FileSize\":42445,\"FileType\":2,\"MimeType\":\"image\\/jpeg\",\"SectionsFound\":null,\"COMPUTED\":{\"html\":\"width=\\\"594\\\" height=\\\"308\\\"\",\"Height\":308,\"Width\":594,\"IsColor\":1}}',NULL,'2026-09-18 03:24:06','2026-09-18 03:24:06',NULL),(3,'public','media','public','e2dd9ee7-69be-4001-9661-120f9f0c26b4','media/e2dd9ee7-69be-4001-9661-120f9f0c26b4.jpg',1200,896,857616,'image/jpeg','jpg',NULL,'earning-couple',NULL,NULL,'{\"FileName\":\"pkDZXXKYUEBbRydmfNdaE2phJGlg72-metaZWFybmluZy1jb3VwbGUuanBn-.jpg\",\"FileDateTime\":1789723598,\"FileSize\":857616,\"FileType\":2,\"MimeType\":\"image\\/jpeg\",\"SectionsFound\":null,\"COMPUTED\":{\"html\":\"width=\\\"1200\\\" height=\\\"896\\\"\",\"Height\":896,\"Width\":1200,\"IsColor\":1}}',NULL,'2026-09-18 03:56:40','2026-09-18 03:56:40',NULL),(4,'public','media','public','e91e12f7-671a-443c-b754-ee057573b3e0','media/e91e12f7-671a-443c-b754-ee057573b3e0.jpg',1376,768,840007,'image/jpeg','jpg',NULL,'contact-couple',NULL,NULL,'{\"FileName\":\"02e6KDp39CSloTiuDwPrSKuiAyw8FR-metaY29udGFjdC1jb3VwbGUuanBn-.jpg\",\"FileDateTime\":1789731460,\"FileSize\":840007,\"FileType\":2,\"MimeType\":\"image\\/jpeg\",\"SectionsFound\":null,\"COMPUTED\":{\"html\":\"width=\\\"1376\\\" height=\\\"768\\\"\",\"Height\":768,\"Width\":1376,\"IsColor\":1}}',NULL,'2026-09-18 06:07:43','2026-09-18 06:07:43',NULL),(5,'public','media','public','8e4405f8-8aaf-42fa-9a8e-cf884e04a3ac','media/8e4405f8-8aaf-42fa-9a8e-cf884e04a3ac.jpeg',1254,1254,74248,'image/jpeg','jpeg',NULL,'logo',NULL,NULL,'{\"FileName\":\"WdzF67nzSVC0ZsQceQ8r4vrskJjQeG-metabG9nby5qcGVn-.jpeg\",\"FileDateTime\":1790068848,\"FileSize\":74248,\"FileType\":2,\"MimeType\":\"image\\/jpeg\",\"SectionsFound\":null,\"COMPUTED\":{\"html\":\"width=\\\"1254\\\" height=\\\"1254\\\"\",\"Height\":1254,\"Width\":1254,\"IsColor\":1}}',NULL,'2026-09-22 03:50:54','2026-09-22 03:50:54',NULL);
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `membership_orders`
--

DROP TABLE IF EXISTS `membership_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `membership_orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'India',
  `user_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'both',
  `membership_plan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_period` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '3 Months',
  `matches_count` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tax_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `coupon_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referral_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'razorpay',
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `razorpay_order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `razorpay_signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `auto_renew` tinyint(1) NOT NULL DEFAULT 0,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metadata` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`metadata`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `membership_orders_order_number_unique` (`order_number`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `membership_orders`
--

LOCK TABLES `membership_orders` WRITE;
/*!40000 ALTER TABLE `membership_orders` DISABLE KEYS */;
INSERT INTO `membership_orders` VALUES (1,'SM-20260918-C6656','rachna','rachna@gmail.com','9876789876','$2y$12$dH7Y54qHqXddx1qDyJeb0uXU4higN6AhLFvKRcgMpVLc2cBOK9tGi','2008-09-02','Female','delhi','110098','India','find','gold','Gold Plan','3 Months','50 Matches',699.00,0.00,125.82,699.00,NULL,NULL,'razorpay','pay_TdTLnRcuVm54pQ',NULL,NULL,'completed','active',0,'Registered and paid via online checkout journey.','{\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/153.0.0.0 Safari\\/537.36\",\"ip\":\"127.0.0.1\"}','2026-09-18 05:19:15','2026-09-18 05:19:15'),(2,'SM-20260922-4E386','arun','arun@gmail.com','8765456789','$2y$12$U2.sSrKEYPHdVGnN5o6XM.U2VuBMLtLALWk9DYjR7A8D8QvR51rpa','2008-09-18','Male','delhi','110089','India','become','gold','Gold Plan','3 Months','50 Matches',699.00,0.00,125.82,699.00,NULL,NULL,'razorpay','pay_Tf2WVqw3SMxUcI',NULL,NULL,'completed','active',0,'Registered and paid via online checkout journey.','{\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/153.0.0.0 Safari\\/537.36\",\"ip\":\"127.0.0.1\"}','2026-09-22 04:22:41','2026-09-22 04:22:41');
/*!40000 ALTER TABLE `membership_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `membership_plans`
--

DROP TABLE IF EXISTS `membership_plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `membership_plans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `period` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '3 Months',
  `matches` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '25 Matches',
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `badge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_popular` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`features`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `membership_plans_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `membership_plans`
--

LOCK TABLES `membership_plans` WRITE;
/*!40000 ALTER TABLE `membership_plans` DISABLE KEYS */;
INSERT INTO `membership_plans` VALUES (1,'Silver Plan','silver',399.00,'3 Months','25 Matches','≡ƒ¢í∩╕Å',NULL,0,1,1,'[\"Browse verified profiles\",\"Basic intelligent matching\",\"End-to-end secure chat\",\"Email support\"]','2026-09-17 05:48:39','2026-09-17 05:48:39'),(2,'Gold Plan','gold',699.00,'3 Months','50 Matches','≡ƒÅå','POPULAR',1,1,2,'[\"All Silver features included\",\"Advanced personality matching\",\"Higher profile visibility (2x)\",\"Priority customer support\"]','2026-09-17 05:48:39','2026-09-17 05:48:39'),(3,'Premium Plan','premium',999.00,'3 Months','100 Matches','≡ƒÆÄ',NULL,0,1,3,'[\"All Gold features included\",\"Premium top-tier matching\",\"Priority profile spotlight (5x)\",\"Dedicated companion concierge\"]','2026-09-17 05:48:39','2026-09-17 05:48:39'),(4,'Premium Yearly','yearly',2999.00,'1 Year','Unlimited Matches','≡ƒÄü','BEST VALUE',0,1,4,'[\"Valid until you find your match\",\"Unlimited companion matches\",\"VIP Concierge & 24\\/7 dedicated support\",\"50% Refund Guarantee if unmatched (as per policy)\"]','2026-09-17 05:48:39','2026-09-17 05:48:39');
/*!40000 ALTER TABLE `membership_plans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_05_06_093426_create_pages_table',1),(5,'2026_05_06_093426_create_section_types_table',1),(6,'2026_05_06_094610_create_permission_tables',1),(7,'2026_05_06_095552_create_global_sections_table',1),(8,'2026_05_06_101208_create_posts_table',1),(9,'2026_05_06_101423_create_media_table',1),(10,'2026_05_06_101424_add_tenant_aware_column_to_media_table',1),(11,'2026_05_06_101935_create_clients_table',1),(12,'2026_05_06_102432_create_notifications_table',1),(13,'2026_05_06_102524_add_seo_to_pages_and_posts',1),(14,'2026_05_06_104928_create_categories_table',1),(15,'2026_05_06_105016_add_category_id_to_posts',1),(16,'2026_05_06_110519_create_settings_table',1),(17,'2026_05_06_112051_create_activity_log_table',1),(18,'2026_05_07_122317_create_product_categories_table',1),(19,'2026_05_07_122317_create_products_table',1),(20,'2026_05_08_082323_create_forms_table',1),(21,'2026_05_08_082324_create_form_submissions_table',1),(22,'2026_06_01_121040_create_brands_table',1),(23,'2026_06_09_072457_staff',1),(24,'2026_06_10_123853_create_certifications_table',1),(25,'2026_06_26_072425_add_linkdin_link_to_staff_table',1),(26,'2026_06_26_081351_add_slug_to_staff_table',1),(27,'2026_09_09_100000_create_membership_orders_table',1),(28,'2026_09_09_110358_add_auto_renew_to_membership_orders_table',1),(29,'2026_09_10_080921_add_referral_code_to_membership_orders_table',1),(30,'2026_09_10_093459_add_is_admin_to_users_table',1),(31,'2026_09_10_100911_add_partner_fields_to_users_table',1),(32,'2026_09_10_105701_add_extra_fields_to_categories_table',1),(33,'2026_09_10_111758_add_description_to_categories_table',1),(34,'2026_09_10_112000_create_membership_plans_table',1),(35,'2026_09_11_113811_add_partner_fields_to_users_table',1),(36,'2026_09_11_125025_add_price_fields_to_categories_table',1),(37,'2026_09_11_161653_add_availability_to_users_table',1),(38,'2026_09_11_162807_add_referral_fields_to_users_table',1),(39,'2026_09_11_162823_create_withdrawal_requests_table',1),(40,'2026_09_12_100725_add_is_active_to_users_table',1),(41,'2026_09_12_103436_add_is_verified_to_users_table',1),(42,'2026_09_12_112648_add_profile_id_to_users_table',1),(43,'2026_09_12_112746_create_bookings_table',1),(44,'2026_09_12_120733_add_pricing_type_to_categories_table',1),(45,'2026_09_12_120740_add_service_fields_to_bookings_table',1),(46,'2026_09_20_102853_add_category_prices_to_users_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(1,'App\\Models\\User',2);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`content`)),
  `is_published` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (5,'Soulmate India ΓÇö Root','root','[{\"type\":\"section\",\"data\":{\"section_type_id\":\"3\",\"data\":{\"title\":\"Partner on Rent\",\"subtitle\":\"Find the <em>Perfect<\\/em><br>\\nCompanion for<br>\\nYour Special Moments\",\"description\":\"Whether it\'s a movie, shopping, travel or just a great conversation \\u2014 <br>find your ideal partner, safely and easily.\",\"tagline\":\"Real People<br>\\n<span>Real Connections<\\/span><br>\\nFor Real Moments \\u2661\",\"background_image\":2,\"filter_section\":\"yes\"}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"4\",\"data\":{\"title\":\"Explore Categories\",\"description\":\"Choose from a variety of activities and find your perfect companion.\\n\\n\"}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"5\",\"data\":{\"title\":\"Why Choose Us?\",\"subtitle\":\"Safe, Simple & Trusted\",\"description\":\"Your safety and comfort are our priority.\",\"list\":[{\"icon\":\"fa-solid fa-user-check\",\"title\":\"Verified Profiles\",\"description\":\"Real people, verified ID & background checked.\\n\\n\"},{\"icon\":\"fa-solid fa-lock\",\"title\":\"Secure Payments\",\"description\":\"100% safe and hassle-free transactions.\\n\\n\"},{\"icon\":\"fa-regular fa-message\",\"title\":\"In-App Chat\",\"description\":\"Connect and plan your time together.\\n\\n\"},{\"icon\":\"fa-regular fa-heart\",\"title\":\"Trusted Community\",\"description\":\"Real reviews, ratings and verified experiences.\\n\\n\"},{\"icon\":\"fa-regular fa-headphones\",\"title\":\"24\\/7 Support\",\"description\":\"We\'re always here to help you.\\n\\n\"}]}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"6\",\"data\":{\"title\":\"How It Works\",\"description\":\"Getting your perfect partner is just a few simple steps.\\n\\n\",\"list\":[{\"icon\":\"fa-solid fa-user\",\"title\":\"Create Account\",\"description\":\"Sign up and complete your profile.\\n\\n\"},{\"icon\":\"fa-solid fa-magnifying-glass\",\"title\":\"Browse Partners\",\"description\":\"Explore profiles and find your match.\\n\\n\"},{\"icon\":\"fa-regular fa-calendar\",\"title\":\"Book & Pay\",\"description\":\"Choose your date, time and make a secure payment.\\n\\n\"},{\"icon\":\"fa-regular fa-message\",\"title\":\"Chat\",\"description\":\"Connect and plan your meeting.\\n\\n\"},{\"icon\":\"fa-regular fa-heart\",\"title\":\"Enjoy Your Time\",\"description\":\"Meet, make memories and share your experience.\\n\\n\"}],\"card_title\":\"Ready for Your<br> Next Adventure?\",\"card_desc\":\"Find the right partner for your favorite activities and make every moment special.\",\"card_image\":1,\"cta\":{\"label\":\"Explore Partners\",\"url_type\":\"external\",\"external_url\":\"http:\\/\\/127.0.0.1:8000\\/partners\",\"target\":\"_self\"}}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"7\",\"data\":{\"title\":\"What Our Users Say\",\"subtitle\":\"Real Stories, Real Connections.\\n\",\"description\":\"Hear from people who found their perfect partner and made unforgettable memories.\\n\\n\"}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"8\",\"data\":{\"title\":\"\\ud83d\\udc97 Membership Plans\",\"subtitle\":\"More Benefits,\\nMore Connections\",\"description\":\"Choose the plan that works best for you\\nand start connecting with compatible partners.\"}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"9\",\"data\":{\"title\":\"Earning Opportunity\",\"subtitle\":\"Earn Up to <span>\\u20b92,000<\\/span> Per Hour\\n\",\"description\":\"Join India\'s trusted partner-on-rent platform. Set your own rates, choose your services, and\\nearn while helping others.\",\"background_image\":3,\"list\":[{\"icon\":\"fa-solid fa-database\",\"numbers\":\"\\u20b92K\\/hr\",\"title\":\"Earn Per Hour\"},{\"icon\":\"fa-solid fa-shield\",\"numbers\":\"80%\",\"title\":\"You Keep\"},{\"icon\":\"fa-solid fa-users\",\"numbers\":\"Millions\",\"title\":\"of Potential Customers\"},{\"icon\":\"fa-solid fa-crown\",\"numbers\":\"\\u20b9199\",\"title\":\"Membership From\"}],\"title_2\":\"How Partners Earn\",\"description_2\":\"Choose from a variety of activities and start earning today.\",\"list_2\":[{\"icon\":\"fa-solid fa-users\",\"title\":\"Elder Care\",\"rate\":\"\\u20b91,000\\/hour\",\"description\":\"Companionship and support for your loved ones.\"},{\"icon\":\"fa-solid fa-mug-hot\",\"title\":\"Hangout\",\"rate\":\"\\u20b91,500\\/hour\",\"description\":\"Enjoy casual outings, coffee and great conversations.\"},{\"icon\":\"fa-regular fa-calendar\",\"title\":\"Events & Clubbing\",\"rate\":\"\\u20b92,000\\/hour\",\"description\":\"Make events more special with the right company.\"},{\"icon\":\"fa-solid fa-gear\",\"title\":\"Set Your Own Rates\",\"rate\":\"Flexible & Customizable\",\"description\":\"Choose your services and set your own price.\"}],\"cta\":{\"label\":\"Become a Partner\",\"url_type\":\"external\",\"external_url\":\"http:\\/\\/127.0.0.1:8000\",\"target\":\"_self\"}}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"10\",\"data\":{\"title\":\"Frequently Asked Questions\",\"description\":\"Everything you need to know about Soulmate India and how it works.\\n\\n\\n\",\"list\":[{\"question\":\"What is Soulmate India?\",\"answer\":\"<p>Soulmate India is a trusted companion platform that connects you with verified partners for activities like movies, shopping, dining, travel, events and more \\u2014 safely and easily.<\\/p>\"},{\"question\":\"Are the companions verified?\",\"answer\":\"<p>&nbsp;Yes! Every companion on Soulmate India goes through a thorough ID verification and background check process before their profile is approved and made visible on the platform.&nbsp;<\\/p>\"},{\"question\":\"How do I book a companion?\",\"answer\":\"<p>Simply create an account, browse available companion profiles, select your preferred companion, choose a date and time, make a secure payment and you\'re all set! You can also chat with them before your meeting.<br>&nbsp;<\\/p>\"},{\"question\":\"Is my personal information safe?\",\"answer\":\"<p>Absolutely. We take your privacy very seriously. Your personal data is encrypted, never shared with third parties, and all in-app communications happen through our secure messaging system.<br>&nbsp;<\\/p>\"},{\"question\":\"What activities can I book a companion for?\",\"answer\":\"<p>You can book companions for movies, shopping, dining, travel, sports &amp; fitness, events, live concerts, corporate outings, and many more categories. We keep adding new activities regularly.<\\/p>\"},{\"question\":\"How does payment work?\",\"answer\":\"<p>All payments are made securely through our platform using UPI, credit\\/debit cards, or net banking. Payments are held until after the session, ensuring full safety for both parties.&nbsp;<\\/p>\"},{\"question\":\"Can I cancel or reschedule a booking?\",\"answer\":\"<p>Yes. You can cancel or reschedule a booking up to 24 hours in advance without any penalty. Cancellations made within 24 hours may be subject to a partial refund policy as per our terms.&nbsp;<\\/p>\"},{\"question\":\"Is Soulmate India available in my city?\",\"answer\":\"<p>&nbsp;\\u201cYes! Soulmate India is available in all cities across India. Find your perfect companion wherever you are.\\u201d&nbsp;<\\/p>\"}]}}}]',1,'2026-09-18 03:41:05','2026-09-18 05:04:06',NULL,NULL,NULL,NULL),(6,'Partners','partners','[{\"type\":\"section\",\"data\":{\"section_type_id\":\"3\",\"data\":{\"title\":\"FIND YOUR PERFECT PARTNER\",\"subtitle\":\"Explore & Connect<br>\\n<span>With Amazing People<\\/span>\",\"description\":\"Browse through genuine profiles, find the right companion for your special moments, and make memories together.\\n\\n\",\"tagline\":\"Real People<br>\\n<span>Real Connections<\\/span><br>\\nFor Real Moments \\u2661\",\"background_image\":2,\"filter_section\":\"no\"}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"12\",\"data\":{\"title\":\"Partners\"}}}]',1,'2026-09-18 04:57:15','2026-09-22 04:09:55',NULL,NULL,NULL,NULL),(7,'About us','about-us','[{\"type\":\"section\",\"data\":{\"section_type_id\":\"11\",\"data\":{\"title\":\"ABOUT US\",\"subtitle\":\"More Than Just<br>\\nA Platform,<br>\\n<span>It\'s a Connection<\\/span>\",\"description\":\"At Soulmate India, we believe that everyone deserves companionship, friendship and meaningful experiences. We connect you with genuine, verified and trusted partners for your special moments \\u2014 because life is better together.\\n\\n\",\"background_image\":4}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"14\",\"data\":{\"title\":\"The Reality We Address\",\"list\":[{\"icon\":\"fa-solid fa-users\",\"description\":\"A large number of people, especially in urban areas, feel lonely, isolated or have limited time to explore new experiences. Traditional social platforms don\'t always provide a safe, verified and meaningful way to meet like-minded people.\\n\\n\"},{\"icon\":\"fa-regular fa-star\",\"description\":\"Where a young professional needs a date, a traveler wants a companion, or someone wants to try new activities \\u2014 finding the right partner is often difficult, time-consuming and risky.\\n\\n\"}],\"subtitle\":\"That\'s why Soulmate India exists.\",\"description\":\"Not just a platform, but a safe and trusted space to connect with real people for real experiences.\\n\\n\"}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"15\",\"data\":{\"list\":[{\"icon\":\"fa-solid fa-users\",\"number\":\"10K+\",\"title\":\"Happy Members\"},{\"icon\":\"fa-solid fa-user-check\",\"number\":\"100%\",\"title\":\"Verified Profiles\"},{\"icon\":\"fa-regular fa-star\",\"number\":\"4.8\\/5\",\"title\":\"Average Rating\"},{\"icon\":\"fa-regular fa-heart\",\"number\":\"50+\",\"title\":\"Cities Covered\"},{\"icon\":\"fa-regular fa-headphones\",\"number\":\"24\\/7\",\"title\":\"Support\"}]}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"16\",\"data\":{\"title\":\"OUR STORY\",\"subtitle\":\"What We Do\",\"description\":\"Soulmate India is a modern platform that helps people find the right partner for companionship, travel, shopping, dining and more. We carefully verify each partner and ensure a safe, respectful and enjoyable experience for everyone.\\n\\n\",\"cta\":{\"label\":\"Join Our Community\",\"url_type\":\"external\",\"external_url\":\"http:\\/\\/127.0.0.1:8000\",\"target\":\"_self\"},\"list\":[{\"icon\":\"fa-regular fa-heart\",\"title\":\"Companionship\",\"description\":\"For dates, outings and meaningful chats.\"},{\"icon\":\"fa-solid fa-plane\",\"title\":\"Travel Together\",\"description\":\"Explore new places with the right partner.\"},{\"icon\":\"fa-solid fa-cart-shopping\",\"title\":\"Shopping Companion\",\"description\":\"Make shopping more fun together.\"},{\"icon\":\"fa-solid fa-utensils\",\"title\":\"Dining Companion\",\"description\":\"Enjoy great food and conversations.\"},{\"icon\":\"fa-solid fa-person-swimming\",\"title\":\"Sports & Activities\",\"description\":\"Stay active, stay happy.\\n\\n\"},{\"icon\":\"fa-solid fa-ellipsis\",\"title\":\"And More\",\"description\":\"Many more categories to choose from.\\n\\n\"}]}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"17\",\"data\":{\"list\":[{\"icon\":\"fa-solid fa-bullseye\",\"title\":\"Our Mission\",\"description\":\"To bring the most trusted and reliable platform for providing accessible, affordable and professional companionship services to every individual across all cities and pin codes. We aim to connect loneliness, provide dignified assistance to seniors, and create meaningful earning opportunities for millions of Indians.\\n\\n\"},{\"icon\":\"fa-regular fa-eye\",\"title\":\"Our Vision\",\"description\":\"To become the most trusted name in professional social support services in India and beyond. We envision a world where no one feels alone, where help is always just a click away, and where providing care is a respected profession that empowers millions of independent workers.\\n\\n\"}]}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"18\",\"data\":{\"title\":\"Our Core Values\",\"list\":[{\"icon\":\"fa-solid fa-shield\",\"title\":\"Trust\",\"description\":\"We believe in genuine connections and transparent experiences.\\n\\n\"},{\"icon\":\"fa-solid fa-users\",\"title\":\"Respect\",\"description\":\"We promote a safe, kind and inclusive community for all.\\n\\n\"},{\"icon\":\"fa-solid fa-lock\",\"title\":\"Safety\",\"description\":\"Your security is our priority, always.\\n\\n\"},{\"icon\":\"fa-regular fa-star\",\"title\":\"Better Experiences\",\"description\":\"We aim to make every moment special and memorable.\\n\\n\"},{\"icon\":\"fa-regular fa-heart\",\"title\":\"Inclusion\",\"description\":\"Everyone deserves companionship and happiness.\\n\\n\"}]}}},{\"type\":\"global_section\",\"data\":{\"global_section_id\":\"1\"}}]',1,'2026-09-18 11:38:56','2026-09-20 03:33:47',NULL,NULL,NULL,NULL),(8,'Contact Us','contact-us','[{\"type\":\"section\",\"data\":{\"section_type_id\":\"11\",\"data\":{\"title\":\"GET IN TOUCH\",\"subtitle\":\"We\'d Love to<br>\\n<span>Hear From You<\\/span>\",\"description\":\"Have a question, suggestion, or need support?<br>\\nWe\'re here to help! Reach out to us \\u2014 our team will get back to you as soon as possible.\",\"background_image\":4}}},{\"type\":\"section\",\"data\":{\"section_type_id\":\"20\",\"data\":{\"title\":\"Contact Information\",\"description\":\"You can reach us through any of the following channels.\",\"contact-list\":[{\"icon\":\"fa-solid fa-envelope\",\"title\":\"Email\",\"Line_1\":\"support@soulmateindia.com\",\"line_2\":\"We usually respond within 24 hours.\",\"link\":\"mailto:support@soulmateindia.com\"},{\"icon\":\"fa-solid fa-phone\",\"title\":\"Call Us\",\"Line_1\":\"+91 98765 43210\",\"line_2\":\"Mon - Sat: 10:00 AM - 7:00 PM (IST)\",\"link\":\"tel:+919876543210\"},{\"icon\":\"fa-solid fa-location-dot\",\"title\":\"Our Office\",\"Line_1\":\"123, Business Park, Sector 62,\",\"line_2\":\"Noida, Uttar Pradesh - 201309\",\"link\":\"#visitOffice\"},{\"icon\":\"fa-solid fa-message\",\"title\":\"Live Chat\",\"Line_1\":\"Chat with our support team\",\"line_2\":\"(Mon - Sat, 10:00 AM - 7:00 PM)\"}]}}}]',1,'2026-09-20 03:35:04','2026-09-20 04:03:02',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=200 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'view_activity','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(2,'view_any_activity','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(3,'create_activity','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(4,'update_activity','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(5,'restore_activity','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(6,'restore_any_activity','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(7,'replicate_activity','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(8,'reorder_activity','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(9,'delete_activity','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(10,'delete_any_activity','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(11,'force_delete_activity','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(12,'force_delete_any_activity','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(13,'view_booking','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(14,'view_any_booking','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(15,'create_booking','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(16,'update_booking','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(17,'restore_booking','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(18,'restore_any_booking','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(19,'replicate_booking','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(20,'reorder_booking','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(21,'delete_booking','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(22,'delete_any_booking','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(23,'force_delete_booking','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(24,'force_delete_any_booking','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(25,'view_brand','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(26,'view_any_brand','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(27,'create_brand','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(28,'update_brand','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(29,'restore_brand','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(30,'restore_any_brand','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(31,'replicate_brand','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(32,'reorder_brand','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(33,'delete_brand','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(34,'delete_any_brand','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(35,'force_delete_brand','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(36,'force_delete_any_brand','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(37,'view_category','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(38,'view_any_category','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(39,'create_category','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(40,'update_category','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(41,'restore_category','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(42,'restore_any_category','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(43,'replicate_category','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(44,'reorder_category','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(45,'delete_category','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(46,'delete_any_category','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(47,'force_delete_category','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(48,'force_delete_any_category','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(49,'view_certification','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(50,'view_any_certification','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(51,'create_certification','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(52,'update_certification','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(53,'restore_certification','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(54,'restore_any_certification','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(55,'replicate_certification','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(56,'reorder_certification','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(57,'delete_certification','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(58,'delete_any_certification','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(59,'force_delete_certification','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(60,'force_delete_any_certification','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(61,'view_form','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(62,'view_any_form','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(63,'create_form','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(64,'update_form','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(65,'restore_form','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(66,'restore_any_form','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(67,'replicate_form','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(68,'reorder_form','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(69,'delete_form','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(70,'delete_any_form','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(71,'force_delete_form','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(72,'force_delete_any_form','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(73,'view_form::submission','web','2026-09-17 05:57:12','2026-09-17 05:57:12'),(74,'view_any_form::submission','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(75,'create_form::submission','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(76,'update_form::submission','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(77,'restore_form::submission','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(78,'restore_any_form::submission','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(79,'replicate_form::submission','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(80,'reorder_form::submission','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(81,'delete_form::submission','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(82,'delete_any_form::submission','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(83,'force_delete_form::submission','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(84,'force_delete_any_form::submission','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(85,'view_global::section','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(86,'view_any_global::section','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(87,'create_global::section','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(88,'update_global::section','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(89,'restore_global::section','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(90,'restore_any_global::section','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(91,'replicate_global::section','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(92,'reorder_global::section','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(93,'delete_global::section','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(94,'delete_any_global::section','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(95,'force_delete_global::section','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(96,'force_delete_any_global::section','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(97,'view_media','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(98,'view_any_media','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(99,'create_media','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(100,'update_media','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(101,'restore_media','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(102,'restore_any_media','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(103,'replicate_media','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(104,'reorder_media','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(105,'delete_media','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(106,'delete_any_media','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(107,'force_delete_media','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(108,'force_delete_any_media','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(109,'view_membership::order','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(110,'view_any_membership::order','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(111,'create_membership::order','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(112,'update_membership::order','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(113,'restore_membership::order','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(114,'restore_any_membership::order','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(115,'replicate_membership::order','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(116,'reorder_membership::order','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(117,'delete_membership::order','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(118,'delete_any_membership::order','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(119,'force_delete_membership::order','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(120,'force_delete_any_membership::order','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(121,'view_membership::plan','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(122,'view_any_membership::plan','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(123,'create_membership::plan','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(124,'update_membership::plan','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(125,'restore_membership::plan','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(126,'restore_any_membership::plan','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(127,'replicate_membership::plan','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(128,'reorder_membership::plan','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(129,'delete_membership::plan','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(130,'delete_any_membership::plan','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(131,'force_delete_membership::plan','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(132,'force_delete_any_membership::plan','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(133,'view_page','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(134,'view_any_page','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(135,'create_page','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(136,'update_page','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(137,'restore_page','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(138,'restore_any_page','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(139,'replicate_page','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(140,'reorder_page','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(141,'delete_page','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(142,'delete_any_page','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(143,'force_delete_page','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(144,'force_delete_any_page','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(145,'view_post','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(146,'view_any_post','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(147,'create_post','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(148,'update_post','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(149,'restore_post','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(150,'restore_any_post','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(151,'replicate_post','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(152,'reorder_post','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(153,'delete_post','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(154,'delete_any_post','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(155,'force_delete_post','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(156,'force_delete_any_post','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(157,'view_role','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(158,'view_any_role','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(159,'create_role','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(160,'update_role','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(161,'delete_role','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(162,'delete_any_role','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(163,'view_section::type','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(164,'view_any_section::type','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(165,'create_section::type','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(166,'update_section::type','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(167,'restore_section::type','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(168,'restore_any_section::type','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(169,'replicate_section::type','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(170,'reorder_section::type','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(171,'delete_section::type','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(172,'delete_any_section::type','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(173,'force_delete_section::type','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(174,'force_delete_any_section::type','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(175,'view_staff','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(176,'view_any_staff','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(177,'create_staff','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(178,'update_staff','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(179,'restore_staff','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(180,'restore_any_staff','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(181,'replicate_staff','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(182,'reorder_staff','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(183,'delete_staff','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(184,'delete_any_staff','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(185,'force_delete_staff','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(186,'force_delete_any_staff','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(187,'view_user','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(188,'view_any_user','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(189,'create_user','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(190,'update_user','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(191,'restore_user','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(192,'restore_any_user','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(193,'replicate_user','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(194,'reorder_user','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(195,'delete_user','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(196,'delete_any_user','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(197,'force_delete_user','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(198,'force_delete_any_user','web','2026-09-17 05:57:13','2026-09-17 05:57:13'),(199,'page_SiteSettings','web','2026-09-17 05:57:13','2026-09-17 05:57:13');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  KEY `posts_category_id_foreign` (`category_id`),
  CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_categories_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_categories`
--

LOCK TABLES `product_categories` WRITE;
/*!40000 ALTER TABLE `product_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_category_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`content`)),
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_product_category_id_foreign` (`product_category_id`),
  CONSTRAINT `products_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(46,1),(47,1),(48,1),(49,1),(50,1),(51,1),(52,1),(53,1),(54,1),(55,1),(56,1),(57,1),(58,1),(59,1),(60,1),(61,1),(62,1),(63,1),(64,1),(65,1),(66,1),(67,1),(68,1),(69,1),(70,1),(71,1),(72,1),(73,1),(74,1),(75,1),(76,1),(77,1),(78,1),(79,1),(80,1),(81,1),(82,1),(83,1),(84,1),(85,1),(86,1),(87,1),(88,1),(89,1),(90,1),(91,1),(92,1),(93,1),(94,1),(95,1),(96,1),(97,1),(98,1),(99,1),(100,1),(101,1),(102,1),(103,1),(104,1),(105,1),(106,1),(107,1),(108,1),(109,1),(110,1),(111,1),(112,1),(113,1),(114,1),(115,1),(116,1),(117,1),(118,1),(119,1),(120,1),(121,1),(122,1),(123,1),(124,1),(125,1),(126,1),(127,1),(128,1),(129,1),(130,1),(131,1),(132,1),(133,1),(134,1),(135,1),(136,1),(137,1),(138,1),(139,1),(140,1),(141,1),(142,1),(143,1),(144,1),(145,1),(146,1),(147,1),(148,1),(149,1),(150,1),(151,1),(152,1),(153,1),(154,1),(155,1),(156,1),(157,1),(158,1),(159,1),(160,1),(161,1),(162,1),(163,1),(164,1),(165,1),(166,1),(167,1),(168,1),(169,1),(170,1),(171,1),(172,1),(173,1),(174,1),(175,1),(176,1),(177,1),(178,1),(179,1),(180,1),(181,1),(182,1),(183,1),(184,1),(185,1),(186,1),(187,1),(188,1),(189,1),(190,1),(191,1),(192,1),(193,1),(194,1),(195,1),(196,1),(197,1),(198,1),(199,1);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'super_admin','web','2026-09-17 05:51:55','2026-09-17 05:51:55');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section_types`
--

DROP TABLE IF EXISTS `section_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `section_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `schema` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`schema`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `section_types_identifier_unique` (`identifier`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section_types`
--

LOCK TABLES `section_types` WRITE;
/*!40000 ALTER TABLE `section_types` DISABLE KEYS */;
INSERT INTO `section_types` VALUES (3,'Banner Section','banner','[{\"label\":\"Eyebrow \\/ Title\",\"name\":\"title\",\"type\":\"text\"},{\"label\":\"Heading (H1)\",\"name\":\"subtitle\",\"type\":\"textarea\"},{\"label\":\"Description\",\"name\":\"description\",\"type\":\"textarea\"},{\"label\":\"Tagline\",\"name\":\"tagline\",\"type\":\"textarea\"},{\"label\":\"Background Image\",\"name\":\"background_image\",\"type\":\"image\"},{\"label\":\"Filter Section\",\"name\":\"filter_section\",\"type\":\"options\",\"select\":[{\"name\":\"Yes\",\"value\":\"yes\"},{\"name\":\"No\",\"value\":\"no\"}]}]','2026-09-17 06:24:04','2026-09-18 05:03:52'),(4,'Home Category','home-category','[{\"label\":\"Title\",\"name\":\"title\",\"type\":\"text\"},{\"label\":\"Description\",\"name\":\"description\",\"type\":\"textarea\"}]','2026-09-17 10:00:47','2026-09-17 10:01:27'),(5,'Why Choose Us','why-choose-us','[{\"label\":\"Title\",\"name\":\"title\",\"type\":\"text\"},{\"label\":\"Subtitle\",\"name\":\"subtitle\",\"type\":\"text\"},{\"label\":\"Description\",\"name\":\"description\",\"type\":\"textarea\"},{\"label\":\"List\",\"name\":\"list\",\"type\":\"repeater\",\"max_items\":\"5\",\"sub_schema\":[{\"label\":\"Icon\",\"name\":\"icon\",\"type\":\"text\"},{\"label\":\"Title\",\"name\":\"title\",\"type\":\"text\"},{\"label\":\"Description\",\"name\":\"description\",\"type\":\"textarea\"}]}]','2026-09-17 10:13:10','2026-09-17 10:15:44'),(6,'How It Work','how-it-work','[{\"label\":\"Title\",\"name\":\"title\",\"type\":\"text\"},{\"label\":\"Description\",\"name\":\"description\",\"type\":\"textarea\"},{\"label\":\"List\",\"name\":\"list\",\"type\":\"repeater\",\"max_items\":\"5\",\"sub_schema\":[{\"label\":\"Icon\",\"name\":\"icon\",\"type\":\"text\"},{\"label\":\"Title\",\"name\":\"title\",\"type\":\"text\"},{\"label\":\"Description\",\"name\":\"description\",\"type\":\"textarea\"}]},{\"label\":\"Card Title\",\"name\":\"card_title\",\"type\":\"text\"},{\"label\":\"Card Description\",\"name\":\"card_desc\",\"type\":\"text\"},{\"label\":\"Card Image\",\"name\":\"card_image\",\"type\":\"image\"},{\"label\":\"CTA\",\"name\":\"cta\",\"type\":\"cta\"}]','2026-09-18 03:09:18','2026-09-18 03:30:41'),(7,'Home Review','home-review','[{\"label\":\"Eyebrow \\/ Title\",\"name\":\"title\",\"type\":\"text\"},{\"label\":\"Heading (H1)\",\"name\":\"subtitle\",\"type\":\"textarea\"},{\"label\":\"Description\",\"name\":\"description\",\"type\":\"textarea\"}]','2026-09-18 03:48:21','2026-09-18 03:48:40'),(8,'Membership Plans','membership-plans','[{\"label\":\"Eyebrow \\/ Title\",\"name\":\"title\",\"type\":\"text\"},{\"label\":\"Heading (H1)\",\"name\":\"subtitle\",\"type\":\"textarea\"},{\"label\":\"Description\",\"name\":\"description\",\"type\":\"textarea\"}]','2026-09-18 03:49:37','2026-09-18 03:49:53'),(9,'Earning Opportunity','earning-opportunity','[{\"label\":\"Eyebrow \\/ Title\",\"name\":\"title\",\"type\":\"text\"},{\"label\":\"Heading (H1)\",\"name\":\"subtitle\",\"type\":\"textarea\"},{\"label\":\"Description\",\"name\":\"description\",\"type\":\"textarea\"},{\"label\":\"Background Image\",\"name\":\"background_image\",\"type\":\"image\"},{\"label\":\"List\",\"name\":\"list\",\"type\":\"repeater\",\"max_items\":\"4\",\"sub_schema\":[{\"label\":\"Icon\",\"name\":\"icon\",\"type\":\"text\"},{\"label\":\"Numbers\",\"name\":\"numbers\",\"type\":\"text\"},{\"label\":\"Title\",\"name\":\"title\",\"type\":\"text\"}]},{\"label\":\"Title 2\",\"name\":\"title_2\",\"type\":\"text\"},{\"label\":\"Description 2\",\"name\":\"description_2\",\"type\":\"text\"},{\"label\":\"List 2\",\"name\":\"list_2\",\"type\":\"repeater\",\"max_items\":\"4\",\"sub_schema\":[{\"label\":\"Icon\",\"name\":\"icon\",\"type\":\"text\"},{\"label\":\"Title\",\"name\":\"title\",\"type\":\"text\"},{\"label\":\"Rate\",\"name\":\"rate\",\"type\":\"text\"},{\"label\":\"Description\",\"name\":\"description\",\"type\":\"text\"}]},{\"label\":\"CTA\",\"name\":\"cta\",\"type\":\"cta\"}]','2026-09-18 03:50:54','2026-09-18 03:58:17'),(10,'FAQ','faq','[{\"label\":\"Title\",\"name\":\"title\",\"type\":\"text\"},{\"label\":\"Description\",\"name\":\"description\",\"type\":\"textarea\"},{\"label\":\"List\",\"name\":\"list\",\"type\":\"repeater\",\"max_items\":\"20\",\"sub_schema\":[{\"label\":\"Question\",\"name\":\"question\",\"type\":\"text\"},{\"label\":\"Answer\",\"name\":\"answer\",\"type\":\"rich_editor\"}]}]','2026-09-18 04:38:31','2026-09-18 04:39:25'),(11,'Abount Us Banner','abount-us-banner','[{\"label\":\"Eyebrow \\/ Title\",\"name\":\"title\",\"type\":\"text\"},{\"label\":\"Heading (H1)\",\"name\":\"subtitle\",\"type\":\"textarea\"},{\"label\":\"Description\",\"name\":\"description\",\"type\":\"textarea\"},{\"label\":\"Background Image\",\"name\":\"background_image\",\"type\":\"image\"}]','2026-09-18 04:55:42','2026-09-18 05:33:36'),(12,'Partner List','partner-list','[{\"label\":\"Title\",\"name\":\"title\",\"type\":\"text\"}]','2026-09-18 05:00:02','2026-09-18 05:00:02'),(13,'Banner Section','banner_copy_gfjr','[{\"label\":\"Eyebrow \\/ Title\",\"name\":\"title\",\"type\":\"text\"},{\"label\":\"Heading (H1)\",\"name\":\"subtitle\",\"type\":\"textarea\"},{\"label\":\"Description\",\"name\":\"description\",\"type\":\"textarea\"},{\"label\":\"Tagline\",\"name\":\"tagline\",\"type\":\"textarea\"},{\"label\":\"Background Image\",\"name\":\"background_image\",\"type\":\"image\"},{\"label\":\"Filter Section\",\"name\":\"filter_section\",\"type\":\"options\",\"select\":[{\"name\":\"Yes\",\"value\":\"yes\"},{\"name\":\"No\",\"value\":\"no\"}]}]','2026-09-18 05:32:56','2026-09-18 05:32:56'),(14,'Reality We Address','reality-we-address','[{\"label\":\"Title\",\"name\":\"title\",\"type\":\"text\"},{\"label\":\"List\",\"name\":\"list\",\"type\":\"repeater\",\"max_items\":\"2\",\"sub_schema\":[{\"label\":\"Icon\",\"name\":\"icon\",\"type\":\"text\"},{\"label\":\"Description\",\"name\":\"description\",\"type\":\"textarea\"}]},{\"label\":\"Subtitle\",\"name\":\"subtitle\",\"type\":\"text\"},{\"label\":\"Description\",\"name\":\"description\",\"type\":\"textarea\"}]','2026-09-18 05:41:13','2026-09-18 05:43:03'),(15,'Stats','stats','[{\"label\":\"List\",\"name\":\"list\",\"type\":\"repeater\",\"max_items\":\"5\",\"sub_schema\":[{\"label\":\"Icon\",\"name\":\"icon\",\"type\":\"text\"},{\"label\":\"Number\",\"name\":\"number\",\"type\":\"text\"},{\"label\":\"Title\",\"name\":\"title\",\"type\":\"text\"}]}]','2026-09-18 05:43:34','2026-09-18 05:44:50'),(16,'Our Story','our-story','[{\"label\":\"Title\",\"name\":\"title\",\"type\":\"text\"},{\"label\":\"Subtitle\",\"name\":\"subtitle\",\"type\":\"text\"},{\"label\":\"Description\",\"name\":\"description\",\"type\":\"textarea\"},{\"label\":\"CTA\",\"name\":\"cta\",\"type\":\"cta\"},{\"label\":\"List\",\"name\":\"list\",\"type\":\"repeater\",\"max_items\":\"30\",\"sub_schema\":[{\"label\":\"Icon\",\"name\":\"icon\",\"type\":\"text\"},{\"label\":\"Title\",\"name\":\"title\",\"type\":\"text\"},{\"label\":\"Description\",\"name\":\"description\",\"type\":\"textarea\"}]}]','2026-09-18 05:45:16','2026-09-18 05:48:30'),(17,'Mission Vision','mission-vision','[{\"label\":\"List\",\"name\":\"list\",\"type\":\"repeater\",\"max_items\":\"2\",\"sub_schema\":[{\"label\":\"Icon\",\"name\":\"icon\",\"type\":\"text\"},{\"label\":\"Title\",\"name\":\"title\",\"type\":\"text\"},{\"label\":\"Description\",\"name\":\"description\",\"type\":\"textarea\"}]}]','2026-09-18 05:48:39','2026-09-18 05:49:19'),(18,'Core Values','core-values','[{\"label\":\"Title\",\"name\":\"title\",\"type\":\"text\"},{\"label\":\"List\",\"name\":\"list\",\"type\":\"repeater\",\"max_items\":\"5\",\"sub_schema\":[{\"label\":\"Icon\",\"name\":\"icon\",\"type\":\"text\"},{\"label\":\"Title\",\"name\":\"title\",\"type\":\"text\"},{\"label\":\"Description\",\"name\":\"description\",\"type\":\"textarea\"}]}]','2026-09-18 06:03:57','2026-09-18 12:06:18'),(19,'Find Partner Banner','find-partner-banner','[{\"label\":\"Tagline\",\"name\":\"tagline\",\"type\":\"text\"},{\"label\":\"Title\",\"name\":\"title\",\"type\":\"text\"},{\"label\":\"Description\",\"name\":\"description\",\"type\":\"textarea\"},{\"label\":\"Image\",\"name\":\"image\",\"type\":\"image\"},{\"label\":\"CTA\",\"name\":\"cta\",\"type\":\"cta\"}]','2026-09-18 06:05:58','2026-09-18 06:05:58'),(20,'Contact Us Form','contact-us-form','[{\"label\":\"Title\",\"name\":\"title\",\"type\":\"text\"},{\"label\":\"Description\",\"name\":\"description\",\"type\":\"text\"},{\"label\":\"Contact List\",\"name\":\"contact-list\",\"type\":\"repeater\",\"max_items\":\"4\",\"sub_schema\":[{\"label\":\"Icon\",\"name\":\"icon\",\"type\":\"text\"},{\"label\":\"Title\",\"name\":\"title\",\"type\":\"text\"},{\"label\":\"Line 1\",\"name\":\"Line_1\",\"type\":\"text\"},{\"label\":\"Line 2\",\"name\":\"line_2\",\"type\":\"text\"},{\"label\":\"Link\",\"name\":\"link\",\"type\":\"text\"}]}]','2026-09-20 03:51:28','2026-09-20 03:59:16');
/*!40000 ALTER TABLE `section_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('7r0vAQC3mKF9oV2z0pcERQrzSwWDutEOXszPCSNB',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiN1k3MjBUYkdqMU5EUng1bUlTcU1pUHprSTRaY2hVTDN0V1VTaTJRaiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo5OiJwYWdlLnNob3ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1790250333),('EaqqCFYuslWjkuPfBkOorA1s0rTnGn7HDviRPElg',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36','YToyOntzOjY6Il90b2tlbiI7czo0MDoidno2RWxNSGxreEthYzZUN2FzTkJvNUpOMU45YW1LWFVFSjMwb1BHdiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1790249842),('I9y79yqWqhyeluJxbaeZVLAMfmNyuyrvjPaRcwI6',4,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNWoyN3QzZjlqOGwxWjlLdUtWZWtjN0kxQjlzazJzdExFdHVXZVBUOCI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDtzOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czo0MDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2Rhc2hib2FyZC9ib29raW5ncyI7czo1OiJyb3V0ZSI7czoxODoiZGFzaGJvYXJkLmJvb2tpbmdzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxODoic3VjY2Vzc19ib29raW5nX2lkIjtpOjI7fQ==',1790250389),('pBtUBmxToQ8jrzgZHnNrkWTjorYqxFamnHxSdQTk',4,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSlRCcVhBNG40TWhGSndyS3VCQko5Vzg5MHZhRkp6ak9zcVBWTDlZSCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wYXJ0bmVycy1wcm9maWxlLzI4NTIwMiI7czo1OiJyb3V0ZSI7czoxNjoicGFydG5lcnMucHJvZmlsZSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7czoxODoic3VjY2Vzc19ib29raW5nX2lkIjtpOjE7fQ==',1790072234),('Wuts9wZ9dFeENqSbfADWyKtTUf6Iz7sedl1Hrfon',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36','YTo3OntzOjY6Il90b2tlbiI7czo0MDoiZVp1TFBpa3M5aHR2dUI4MnBGUmVjcElHa1MwUnpFQWVYdnZlUERKaCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjQ1OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vY2F0ZWdvcmllcy8xL2VkaXQiO3M6NToicm91dGUiO3M6NDA6ImZpbGFtZW50LmFkbWluLnJlc291cmNlcy5jYXRlZ29yaWVzLmVkaXQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjY0OiJmNGMxYjZkMjdiYzRiMjI4MWQ2ZTliZTYxNDVhZTk0NWEyNGU1YjUzNjNkMTVkMjQwOWU3Nzc5MWNiOGE2N2VhIjtzOjg6ImZpbGFtZW50IjthOjA6e319',1790072261);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'site_name','Soulemate India','2026-09-22 03:55:04','2026-09-22 03:55:04'),(2,'logo','5','2026-09-22 03:55:04','2026-09-22 03:55:04'),(3,'favicon',NULL,'2026-09-22 03:55:04','2026-09-22 03:55:04'),(4,'header_nav','[{\"label\":\"Home\",\"url\":\"\\/\",\"open_in_new_tab\":false,\"children\":[]},{\"label\":\"Discover\",\"url\":\"\\/partners\",\"open_in_new_tab\":false,\"children\":[]},{\"label\":\"Categories\",\"url\":\"\\/categories\",\"open_in_new_tab\":false,\"children\":[]},{\"label\":\"Membership\",\"url\":\"\\/#membership\",\"open_in_new_tab\":false,\"children\":[]},{\"label\":\"Earning With Us\",\"url\":\"\\/#earning\",\"open_in_new_tab\":false,\"children\":[]},{\"label\":\"ABout Us\",\"url\":\"\\/about-us\",\"open_in_new_tab\":false,\"children\":[]},{\"label\":\"Contact Us\",\"url\":\"\\/contact-us\",\"open_in_new_tab\":false,\"children\":[]}]','2026-09-22 03:55:04','2026-09-22 03:55:04'),(5,'header_buttons','[]','2026-09-22 03:55:04','2026-09-22 03:55:04'),(6,'footer_nav','[{\"column_title\":\"Footer\",\"links\":[{\"label\":\"Home\",\"url\":\"\\/\"},{\"label\":\"Discover\",\"url\":\"\\/partners\"},{\"label\":\"Membership\",\"url\":\"\\/#membership\"},{\"label\":\"Earning With Us\",\"url\":\"\\/#earning\"},{\"label\":\"About Us\",\"url\":\"\\/about-us\"},{\"label\":\"Contact Us\",\"url\":\"\\/contatc-us\"}]}]','2026-09-22 03:55:04','2026-09-22 03:55:04'),(7,'footer_tagline','Because every moment is better together','2026-09-22 03:55:04','2026-09-22 03:55:38'),(8,'copyright_text','┬⌐ 2026 Soulmate India. All rights reserved.','2026-09-22 03:55:04','2026-09-22 03:55:38'),(9,'contact_email',NULL,'2026-09-22 03:55:04','2026-09-22 03:55:04'),(10,'contact_phone',NULL,'2026-09-22 03:55:04','2026-09-22 03:55:04'),(11,'timing',NULL,'2026-09-22 03:55:04','2026-09-22 03:55:04'),(12,'contact_address',NULL,'2026-09-22 03:55:04','2026-09-22 03:55:04'),(13,'social_linkedin',NULL,'2026-09-22 03:55:04','2026-09-22 03:55:04'),(14,'social_twitter',NULL,'2026-09-22 03:55:04','2026-09-22 03:55:04'),(15,'social_facebook',NULL,'2026-09-22 03:55:04','2026-09-22 03:55:04'),(16,'social_instagram',NULL,'2026-09-22 03:55:04','2026-09-22 03:55:04'),(17,'social_youtube',NULL,'2026-09-22 03:55:04','2026-09-22 03:55:04');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `linkdin_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iwantto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_prices` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`category_prices`)),
  `price_per_hour` int(11) DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `languages` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`languages`)),
  `preferred_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `available_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `available_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interests` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`interests`)),
  `looking_for` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`looking_for`)),
  `profile_photos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`profile_photos`)),
  `availability` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`availability`)),
  `referral_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referred_by` bigint(20) unsigned DEFAULT NULL,
  `wallet_balance` decimal(10,2) NOT NULL DEFAULT 0.00,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_referral_code_unique` (`referral_code`),
  UNIQUE KEY `users_profile_id_unique` (`profile_id`),
  KEY `users_referred_by_foreign` (`referred_by`),
  CONSTRAINT `users_referred_by_foreign` FOREIGN KEY (`referred_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,NULL,'Super Admin','admin@admin.com',NULL,'$2y$12$49bKQOTSulNCsdkBFcDM8eS/29p.88zGe2ZLAMhvvMiqEcXifLQ3W',1,NULL,'2026-09-17 05:48:39','2026-09-17 05:53:26',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.00,1,0),(2,'533694','Super Admin','superadmin@soulmateindia.com',NULL,'$2y$12$sE6zSAj0WGOuCVdI3/0C/etmY99FYtmRw1fyMtYPiGxBvGFVk6EO6',1,NULL,'2026-09-17 05:51:55','2026-09-17 05:51:55',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2UTBBPRM',NULL,0.00,1,0),(3,'285202','rachna','rachna@gmail.com',NULL,'$2y$12$z6SPL26tZrVrsO/3S4aJluAei4pvOBD8b4Sojao4.hnLU7r00w.ba',0,'lsXucHOaokdsyXuPjNz5PtxyqI2gxXx0fnrI2ELxsTKZN1cYSa8OKs2w34Ke','2026-09-18 05:19:16','2026-09-22 04:07:07','9876789876','2008-09-02','female','delhi','110098','India','become','movie-partner,in-person-meeting,elder-care,hangingout,clubbing,shopping-buddy','{\"movie-partner\":5000,\"in-person-meeting\":2000,\"elder-care\":1000,\"hangingout\":1500,\"clubbing\":4500,\"shopping-buddy\":2000}',NULL,'profiles/GP6ZvVOHob1XAYTyzqlqIwXlidbka3AzkagfXMYQ.jpg',NULL,'5\'4\" (163 cm)','Hindu',NULL,'Delhi NCR',NULL,NULL,NULL,NULL,'[\"profiles\\/GP6ZvVOHob1XAYTyzqlqIwXlidbka3AzkagfXMYQ.jpg\"]','{\"Mon\":{\"active\":\"1\",\"from\":\"09:00\",\"to\":\"18:00\"},\"Tue\":{\"active\":\"1\",\"from\":\"09:00\",\"to\":\"18:00\"},\"Wed\":{\"from\":\"09:00\",\"to\":\"18:00\"},\"Thu\":{\"active\":\"1\",\"from\":\"09:00\",\"to\":\"18:00\"},\"Fri\":{\"active\":\"1\",\"from\":\"09:00\",\"to\":\"18:00\"},\"Sat\":{\"from\":\"09:00\",\"to\":\"18:00\"},\"Sun\":{\"from\":\"09:00\",\"to\":\"18:00\"}}','VV5A1TTD',NULL,0.00,1,1),(4,'396936','arun','arun@gmail.com',NULL,'$2y$12$rsfPWJa/GjQ48n3AdyAwFOFWwOZIGzJyeBhYeIZqPJk/gzOb4Rzvy',0,'dApLd6rkzNHG95lJtWVkr56qKalp0SKHVnwIbVa0wqroxIqGolzFoL81KBE6','2026-09-22 04:22:42','2026-09-24 06:16:26','8765456789','2008-09-18','male','delhi','110089','India','become','movie-partner,in-person-meeting,elder-care','{\"movie-partner\":4500,\"in-person-meeting\":2000,\"elder-care\":1000}',NULL,'profiles/yOvCMOD9UL0k0IJg5MKrDEpehblKNqYgylf3Sezp.jpg',NULL,'5\'4\" (163 cm)','Hindu',NULL,'Delhi NCR',NULL,NULL,NULL,NULL,'[\"profiles\\/yOvCMOD9UL0k0IJg5MKrDEpehblKNqYgylf3Sezp.jpg\"]','{\"Mon\":{\"from\":\"09:00\",\"to\":\"18:00\"},\"Tue\":{\"from\":\"09:00\",\"to\":\"18:00\"},\"Wed\":{\"from\":\"09:00\",\"to\":\"18:00\"},\"Thu\":{\"from\":\"09:00\",\"to\":\"18:00\"},\"Fri\":{\"from\":\"09:00\",\"to\":\"18:00\"},\"Sat\":{\"from\":\"09:00\",\"to\":\"18:00\"},\"Sun\":{\"from\":\"09:00\",\"to\":\"18:00\"}}','VMCRURJK',NULL,0.00,1,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `withdrawal_requests`
--

DROP TABLE IF EXISTS `withdrawal_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `withdrawal_requests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `account_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `withdrawal_requests_user_id_foreign` (`user_id`),
  CONSTRAINT `withdrawal_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `withdrawal_requests`
--

LOCK TABLES `withdrawal_requests` WRITE;
/*!40000 ALTER TABLE `withdrawal_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `withdrawal_requests` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-09-24 17:14:57
