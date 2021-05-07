-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 07 Maj 2021, 12:17
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `fortepian_konwer`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `sort_index` int(11) NOT NULL,
  `common_desc_id` int(10) UNSIGNED DEFAULT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category_translation`
--

CREATE TABLE `category_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL DEFAULT 2,
  `category_id` int(10) UNSIGNED NOT NULL,
  `heading_3` varchar(255) NOT NULL,
  `paragraph` varchar(255) NOT NULL,
  `button` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `long_desc` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `common_desc`
--

CREATE TABLE `common_desc` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `common_desc_translation`
--

CREATE TABLE `common_desc_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `common_desc_id` int(10) UNSIGNED NOT NULL,
  `common_desc` varchar(1500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `common_desc_id` int(10) UNSIGNED DEFAULT NULL,
  `img_thumbnail` varchar(255) NOT NULL,
  `movie` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `courses_heading_translation`
--

CREATE TABLE `courses_heading_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `heading_3` varchar(255) NOT NULL,
  `heading_2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `courses_translation`
--

CREATE TABLE `courses_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `courses_id` int(10) UNSIGNED NOT NULL DEFAULT 4,
  `course_name` varchar(255) DEFAULT NULL,
  `heading_3` varchar(255) DEFAULT NULL,
  `button` varchar(255) NOT NULL,
  `long_desc` varchar(5000) DEFAULT NULL,
  `short_desc` varchar(500) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `employee`
--

CREATE TABLE `employee` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `img_thumbnail` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `employee_translation`
--

CREATE TABLE `employee_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `temp` int(11) NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `position` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `long_desc` varchar(1500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `emp_heading_translation`
--

CREATE TABLE `emp_heading_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `heading_3` varchar(255) NOT NULL,
  `heading_2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `form_translation`
--

CREATE TABLE `form_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `town` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` varchar(255) NOT NULL,
  `currency_label` varchar(255) NOT NULL,
  `privacy_policy` varchar(255) DEFAULT NULL,
  `learning_policy` varchar(255) DEFAULT NULL,
  `button` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `main_about_info_translation`
--

CREATE TABLE `main_about_info_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `heading_3` varchar(255) DEFAULT NULL,
  `heading_2` varchar(255) DEFAULT NULL,
  `short_desc` varchar(255) DEFAULT NULL,
  `long_desc` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `main_banner`
--

CREATE TABLE `main_banner` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `main_banner_translation`
--

CREATE TABLE `main_banner_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `main_banner_id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `long_desc` varchar(255) DEFAULT NULL,
  `button` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `main_contact_translation`
--

CREATE TABLE `main_contact_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `heading_3` varchar(255) DEFAULT NULL,
  `heading_2` varchar(255) DEFAULT NULL,
  `address` varchar(1000) NOT NULL,
  `branch_address` varchar(1000) NOT NULL,
  `phone` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `main_counter`
--

CREATE TABLE `main_counter` (
  `id` int(10) UNSIGNED NOT NULL,
  `counter` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `main_counter_translation`
--

CREATE TABLE `main_counter_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `heading_3` varchar(255) DEFAULT NULL,
  `short_desc` varchar(255) DEFAULT NULL,
  `main_counter_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `main_facts`
--

CREATE TABLE `main_facts` (
  `id` int(10) UNSIGNED NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `main_facts_translation`
--

CREATE TABLE `main_facts_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `main_facts_id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `fact` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `main_progress_heading_translation`
--

CREATE TABLE `main_progress_heading_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `heading_3` varchar(255) NOT NULL,
  `heading_2` varchar(255) NOT NULL,
  `button` varchar(255) NOT NULL,
  `short_desc` varchar(2000) DEFAULT NULL,
  `long_desc` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `main_progress_translation`
--

CREATE TABLE `main_progress_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `short_desc` varchar(255) NOT NULL,
  `percent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `main_references_translation`
--

CREATE TABLE `main_references_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `heading_3` varchar(255) NOT NULL,
  `heading_2` varchar(255) NOT NULL,
  `button_1` varchar(255) DEFAULT NULL,
  `button_2` varchar(255) DEFAULT NULL,
  `button_3` varchar(255) DEFAULT NULL,
  `partners` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `main_special_offer_translation`
--

CREATE TABLE `main_special_offer_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `heading_3` varchar(255) DEFAULT NULL,
  `heading_2` varchar(255) DEFAULT NULL,
  `short_desc` varchar(5000) DEFAULT NULL,
  `long_desc` mediumtext NOT NULL,
  `button` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `menu`
--

CREATE TABLE `menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `sort_index` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `menu_translation`
--

CREATE TABLE `menu_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `nav_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `offer`
--

CREATE TABLE `offer` (
  `id` int(10) UNSIGNED NOT NULL,
  `courses_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `sort_index` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `offer_special`
--

CREATE TABLE `offer_special` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `long_desc` varchar(5000) NOT NULL,
  `heading_3` varchar(255) NOT NULL,
  `heading_2` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `references_category`
--

CREATE TABLE `references_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `references_category_translation`
--

CREATE TABLE `references_category_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `references_category_id` int(10) UNSIGNED NOT NULL,
  `heading_3` varchar(255) NOT NULL,
  `heading_2` varchar(255) NOT NULL,
  `short_desc` varchar(1000) NOT NULL,
  `long_desc` text NOT NULL,
  `button` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `shop_buy_translation`
--

CREATE TABLE `shop_buy_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `heading_3_buy` varchar(255) DEFAULT NULL,
  `heading_2_buy` varchar(255) DEFAULT NULL,
  `heading_2_payment` varchar(255) DEFAULT NULL,
  `heading_2_payment_1` varchar(255) DEFAULT NULL,
  `heading_2_payment_2` varchar(255) DEFAULT NULL,
  `heading_2_payment_3` varchar(255) DEFAULT NULL,
  `info_main` varchar(1000) NOT NULL,
  `info_buy` varchar(1000) DEFAULT NULL,
  `info_course` varchar(255) DEFAULT NULL,
  `info_price` varchar(255) DEFAULT NULL,
  `info_expiration` varchar(500) DEFAULT NULL,
  `info_buy_contact` varchar(1000) DEFAULT NULL,
  `info_payment` varchar(255) DEFAULT NULL,
  `button_confirm` varchar(255) DEFAULT NULL,
  `button_pay` varchar(255) DEFAULT NULL,
  `button_payment_policy` varchar(255) DEFAULT NULL,
  `info_account` varchar(500) DEFAULT NULL,
  `info_address` varchar(255) DEFAULT NULL,
  `info_payment_gateway` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `shop_client_reservations`
--

CREATE TABLE `shop_client_reservations` (
  `id` int(10) UNSIGNED NOT NULL,
  `offer_id` int(10) UNSIGNED NOT NULL,
  `offer_category` varchar(255) NOT NULL,
  `offer_name` varchar(255) NOT NULL,
  `lang_code` varchar(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `country` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `res_no` varchar(255) NOT NULL,
  `res_date` date NOT NULL,
  `res_active` tinyint(1) NOT NULL,
  `res_paid` tinyint(1) NOT NULL,
  `amount` int(10) DEFAULT NULL,
  `currency` varchar(3) DEFAULT NULL,
  `lesson_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `special_offer_2_translation`
--

CREATE TABLE `special_offer_2_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `heading_3` varchar(255) DEFAULT NULL,
  `heading_2` varchar(255) DEFAULT NULL,
  `short_desc` varchar(5000) DEFAULT NULL,
  `long_desc` mediumtext NOT NULL,
  `button` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `special_offer_3_translation`
--

CREATE TABLE `special_offer_3_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `heading_3` varchar(255) DEFAULT NULL,
  `heading_2` varchar(255) DEFAULT NULL,
  `short_desc` varchar(5000) DEFAULT NULL,
  `long_desc` mediumtext NOT NULL,
  `button` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indeksy dla tabeli `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `common_desc_id` (`common_desc_id`);

--
-- Indeksy dla tabeli `category_translation`
--
ALTER TABLE `category_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indeksy dla tabeli `common_desc`
--
ALTER TABLE `common_desc`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `common_desc_translation`
--
ALTER TABLE `common_desc_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`),
  ADD KEY `common_desc_id` (`common_desc_id`);

--
-- Indeksy dla tabeli `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `common_desc` (`common_desc_id`);

--
-- Indeksy dla tabeli `courses_heading_translation`
--
ALTER TABLE `courses_heading_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`);

--
-- Indeksy dla tabeli `courses_translation`
--
ALTER TABLE `courses_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`),
  ADD KEY `courses_id` (`courses_id`);

--
-- Indeksy dla tabeli `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `employee_translation`
--
ALTER TABLE `employee_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `languages_id` (`languages_id`);

--
-- Indeksy dla tabeli `emp_heading_translation`
--
ALTER TABLE `emp_heading_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`);

--
-- Indeksy dla tabeli `form_translation`
--
ALTER TABLE `form_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`);

--
-- Indeksy dla tabeli `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `main_about_info_translation`
--
ALTER TABLE `main_about_info_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`);

--
-- Indeksy dla tabeli `main_banner`
--
ALTER TABLE `main_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `main_banner_translation`
--
ALTER TABLE `main_banner_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `main_banner_id` (`main_banner_id`),
  ADD KEY `languages_id` (`languages_id`);

--
-- Indeksy dla tabeli `main_contact_translation`
--
ALTER TABLE `main_contact_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`);

--
-- Indeksy dla tabeli `main_counter`
--
ALTER TABLE `main_counter`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `main_counter_translation`
--
ALTER TABLE `main_counter_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`),
  ADD KEY `main_counter_id` (`main_counter_id`);

--
-- Indeksy dla tabeli `main_facts`
--
ALTER TABLE `main_facts`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `main_facts_translation`
--
ALTER TABLE `main_facts_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `main_facts_id` (`main_facts_id`),
  ADD KEY `languages_id` (`languages_id`);

--
-- Indeksy dla tabeli `main_progress_heading_translation`
--
ALTER TABLE `main_progress_heading_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`);

--
-- Indeksy dla tabeli `main_progress_translation`
--
ALTER TABLE `main_progress_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`);

--
-- Indeksy dla tabeli `main_references_translation`
--
ALTER TABLE `main_references_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`);

--
-- Indeksy dla tabeli `main_special_offer_translation`
--
ALTER TABLE `main_special_offer_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`);

--
-- Indeksy dla tabeli `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `menu_translation`
--
ALTER TABLE `menu_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indeksy dla tabeli `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`courses_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indeksy dla tabeli `offer_special`
--
ALTER TABLE `offer_special`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`);

--
-- Indeksy dla tabeli `references_category`
--
ALTER TABLE `references_category`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `references_category_translation`
--
ALTER TABLE `references_category_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`),
  ADD KEY `references_category` (`references_category_id`);

--
-- Indeksy dla tabeli `shop_buy_translation`
--
ALTER TABLE `shop_buy_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`);

--
-- Indeksy dla tabeli `shop_client_reservations`
--
ALTER TABLE `shop_client_reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offer_id` (`offer_id`);

--
-- Indeksy dla tabeli `special_offer_2_translation`
--
ALTER TABLE `special_offer_2_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`);

--
-- Indeksy dla tabeli `special_offer_3_translation`
--
ALTER TABLE `special_offer_3_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `category_translation`
--
ALTER TABLE `category_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `common_desc`
--
ALTER TABLE `common_desc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `common_desc_translation`
--
ALTER TABLE `common_desc_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `courses_heading_translation`
--
ALTER TABLE `courses_heading_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `courses_translation`
--
ALTER TABLE `courses_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `employee_translation`
--
ALTER TABLE `employee_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `emp_heading_translation`
--
ALTER TABLE `emp_heading_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `form_translation`
--
ALTER TABLE `form_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `main_about_info_translation`
--
ALTER TABLE `main_about_info_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `main_banner`
--
ALTER TABLE `main_banner`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `main_banner_translation`
--
ALTER TABLE `main_banner_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `main_contact_translation`
--
ALTER TABLE `main_contact_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `main_counter`
--
ALTER TABLE `main_counter`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `main_counter_translation`
--
ALTER TABLE `main_counter_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `main_facts`
--
ALTER TABLE `main_facts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `main_facts_translation`
--
ALTER TABLE `main_facts_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `main_progress_heading_translation`
--
ALTER TABLE `main_progress_heading_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `main_progress_translation`
--
ALTER TABLE `main_progress_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `main_references_translation`
--
ALTER TABLE `main_references_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `main_special_offer_translation`
--
ALTER TABLE `main_special_offer_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `menu_translation`
--
ALTER TABLE `menu_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `offer`
--
ALTER TABLE `offer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `offer_special`
--
ALTER TABLE `offer_special`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `references_category`
--
ALTER TABLE `references_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `references_category_translation`
--
ALTER TABLE `references_category_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `shop_buy_translation`
--
ALTER TABLE `shop_buy_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `shop_client_reservations`
--
ALTER TABLE `shop_client_reservations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `special_offer_2_translation`
--
ALTER TABLE `special_offer_2_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `special_offer_3_translation`
--
ALTER TABLE `special_offer_3_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`common_desc_id`) REFERENCES `common_desc` (`id`);

--
-- Ograniczenia dla tabeli `category_translation`
--
ALTER TABLE `category_translation`
  ADD CONSTRAINT `category_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `category_translation_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `common_desc_translation`
--
ALTER TABLE `common_desc_translation`
  ADD CONSTRAINT `common_desc_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `common_desc_translation_ibfk_2` FOREIGN KEY (`common_desc_id`) REFERENCES `common_desc` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`common_desc_id`) REFERENCES `common_desc` (`id`);

--
-- Ograniczenia dla tabeli `courses_heading_translation`
--
ALTER TABLE `courses_heading_translation`
  ADD CONSTRAINT `courses_heading_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`);

--
-- Ograniczenia dla tabeli `courses_translation`
--
ALTER TABLE `courses_translation`
  ADD CONSTRAINT `courses_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `courses_translation_ibfk_2` FOREIGN KEY (`courses_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `employee_translation`
--
ALTER TABLE `employee_translation`
  ADD CONSTRAINT `employee_translation_ibfk_3` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `employee_translation_ibfk_4` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `emp_heading_translation`
--
ALTER TABLE `emp_heading_translation`
  ADD CONSTRAINT `emp_heading_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`);

--
-- Ograniczenia dla tabeli `form_translation`
--
ALTER TABLE `form_translation`
  ADD CONSTRAINT `form_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`);

--
-- Ograniczenia dla tabeli `main_about_info_translation`
--
ALTER TABLE `main_about_info_translation`
  ADD CONSTRAINT `main_about_info_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`);

--
-- Ograniczenia dla tabeli `main_banner_translation`
--
ALTER TABLE `main_banner_translation`
  ADD CONSTRAINT `main_banner_translation_ibfk_1` FOREIGN KEY (`main_banner_id`) REFERENCES `main_banner` (`id`),
  ADD CONSTRAINT `main_banner_translation_ibfk_2` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`);

--
-- Ograniczenia dla tabeli `main_contact_translation`
--
ALTER TABLE `main_contact_translation`
  ADD CONSTRAINT `main_contact_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`);

--
-- Ograniczenia dla tabeli `main_counter_translation`
--
ALTER TABLE `main_counter_translation`
  ADD CONSTRAINT `main_counter_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `main_counter_translation_ibfk_2` FOREIGN KEY (`main_counter_id`) REFERENCES `main_counter` (`id`);

--
-- Ograniczenia dla tabeli `main_facts_translation`
--
ALTER TABLE `main_facts_translation`
  ADD CONSTRAINT `main_facts_translation_ibfk_1` FOREIGN KEY (`main_facts_id`) REFERENCES `main_facts` (`id`),
  ADD CONSTRAINT `main_facts_translation_ibfk_2` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`);

--
-- Ograniczenia dla tabeli `main_progress_heading_translation`
--
ALTER TABLE `main_progress_heading_translation`
  ADD CONSTRAINT `main_progress_heading_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`);

--
-- Ograniczenia dla tabeli `main_progress_translation`
--
ALTER TABLE `main_progress_translation`
  ADD CONSTRAINT `main_progress_translation_ibfk_2` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`);

--
-- Ograniczenia dla tabeli `main_references_translation`
--
ALTER TABLE `main_references_translation`
  ADD CONSTRAINT `main_references_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`);

--
-- Ograniczenia dla tabeli `main_special_offer_translation`
--
ALTER TABLE `main_special_offer_translation`
  ADD CONSTRAINT `main_special_offer_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`);

--
-- Ograniczenia dla tabeli `menu_translation`
--
ALTER TABLE `menu_translation`
  ADD CONSTRAINT `menu_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `menu_translation_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`);

--
-- Ograniczenia dla tabeli `offer`
--
ALTER TABLE `offer`
  ADD CONSTRAINT `offer_ibfk_1` FOREIGN KEY (`courses_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `offer_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Ograniczenia dla tabeli `offer_special`
--
ALTER TABLE `offer_special`
  ADD CONSTRAINT `offer_special_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`);

--
-- Ograniczenia dla tabeli `references_category_translation`
--
ALTER TABLE `references_category_translation`
  ADD CONSTRAINT `references_category_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `references_category_translation_ibfk_2` FOREIGN KEY (`references_category_id`) REFERENCES `references_category` (`id`);

--
-- Ograniczenia dla tabeli `shop_buy_translation`
--
ALTER TABLE `shop_buy_translation`
  ADD CONSTRAINT `shop_buy_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`);

--
-- Ograniczenia dla tabeli `shop_client_reservations`
--
ALTER TABLE `shop_client_reservations`
  ADD CONSTRAINT `shop_client_reservations_ibfk_1` FOREIGN KEY (`offer_id`) REFERENCES `offer` (`id`);

--
-- Ograniczenia dla tabeli `special_offer_2_translation`
--
ALTER TABLE `special_offer_2_translation`
  ADD CONSTRAINT `special_offer_2_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`);

--
-- Ograniczenia dla tabeli `special_offer_3_translation`
--
ALTER TABLE `special_offer_3_translation`
  ADD CONSTRAINT `special_offer_3_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
