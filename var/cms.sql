-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 07 Paź 2020, 16:44
-- Wersja serwera: 10.1.38-MariaDB
-- Wersja PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `cms`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `assets`
--

CREATE TABLE `assets` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_parent` int(10) UNSIGNED NOT NULL,
  `title` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `subtitle` varchar(512) COLLATE utf8_polish_ci NOT NULL,
  `lead` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `content` text COLLATE utf8_polish_ci NOT NULL,
  `image_url` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `image_alt` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `primary_url` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `primary_text` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `secondary_url` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `secondary_text` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `event_date` date NOT NULL,
  `ord` int(10) UNSIGNED NOT NULL,
  `state` tinyint(3) UNSIGNED NOT NULL,
  `view` varchar(512) COLLATE utf8_polish_ci NOT NULL,
  `update_time` datetime NOT NULL,
  `update_ip` varchar(16) COLLATE utf8_polish_ci NOT NULL,
  `update_user` smallint(5) UNSIGNED NOT NULL,
  `type` varchar(8) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `assets`
--

INSERT INTO `assets` (`id`, `id_parent`, `title`, `subtitle`, `lead`, `content`, `image_url`, `image_alt`, `primary_url`, `primary_text`, `secondary_url`, `secondary_text`, `event_date`, `ord`, `state`, `view`, `update_time`, `update_ip`, `update_user`, `type`) VALUES
(1, 6, 'Experience', 'We have extensive experience and can be proud of 100+ completed projects.', '', '', 'ico1.svg', 'Go to hell', '#', '', '', '', '0000-00-00', 0, 0, '', '0000-00-00 00:00:00', '', 0, 'gallery'),
(2, 6, 'Support', 'We value each client and always respond to feedback throughout our cooperation.', '', '', 'ico2.svg', '', '#', '', '', '', '0000-00-00', 2, 1, '', '0000-00-00 00:00:00', '', 0, 'gallery'),
(3, 6, 'Technologies', 'We create our products using the latest technologies to ensure the best experience.', '', '', 'ico1.svg', 'Go to hell', '#', '', '', '', '0000-00-00', 0, 0, '', '0000-00-00 00:00:00', '', 0, 'gallery');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `contents`
--

CREATE TABLE `contents` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_menu` int(10) UNSIGNED NOT NULL,
  `slug` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `title` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `subtitle` varchar(512) COLLATE utf8_polish_ci NOT NULL,
  `lead` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `content` text COLLATE utf8_polish_ci NOT NULL,
  `image_url` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `image_alt` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `primary_url` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `primary_text` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `secondary_url` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `secondary_text` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `event_date` date NOT NULL,
  `ord` int(10) UNSIGNED NOT NULL,
  `state` tinyint(3) UNSIGNED NOT NULL,
  `view` varchar(32) COLLATE utf8_polish_ci NOT NULL,
  `view_settings` varchar(1024) COLLATE utf8_polish_ci NOT NULL,
  `update_time` datetime NOT NULL,
  `update_ip` varchar(16) COLLATE utf8_polish_ci NOT NULL,
  `update_user` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `contents`
--

INSERT INTO `contents` (`id`, `id_menu`, `slug`, `title`, `subtitle`, `lead`, `content`, `image_url`, `image_alt`, `primary_url`, `primary_text`, `secondary_url`, `secondary_text`, `event_date`, `ord`, `state`, `view`, `view_settings`, `update_time`, `update_ip`, `update_user`) VALUES
(1, 1, 'why', 'Why Choose Us', 'Still have some hesitations whether cooperation with us is worth the trouble? Check the reasons why you should choose us among other companies!', '', '', '', '', '', '', '', '', '0000-00-00', 0, 0, 'features/features.php', '{\r\n    \"layout\": {\r\n        \"title\": \"\",\r\n        \"subtitle\": \"\",\r\n        \"lead\": \"\",\r\n        \"content\": \"\",\r\n        \"image\": \"\",\r\n        \"date\": \"\",\r\n        \"primary-button\": \"\",\r\n        \"secondary-button\": \"\",\r\n        \"align\": \"left\"\r\n    },\r\n    \"background\": {\r\n        \"color\": \"\",\r\n        \"image\": \"\",\r\n        \"flip\": \"\",\r\n        \"overlay\": \"\",\r\n        \"scroll-effect\": \"fixed/parallax\"\r\n    },\r\n    \"animation\": {\r\n        \"appear\": \"fadein/slidein\",\r\n        \"appear-speed\": \"slow/normal/fast\"\r\n    },\r\n    \"info\": {\r\n        \"anchor\": \"\"\r\n    }\r\n}', '0000-00-00 00:00:00', '', 0),
(3, 1, 'tytul-strony', 'Tytuł strony', '', '', '', '', '', '', '', '', '', '0000-00-00', 0, 0, 'features_full/features_full.php', '{\r\n    \"layout\": {\r\n        \"title\": \"\",\r\n        \"subtitle\": \"\",\r\n        \"lead\": \"\",\r\n        \"content\": \"\",\r\n        \"image\": \"\",\r\n        \"date\": \"\",\r\n        \"primary-button\": \"\",\r\n        \"secondary-button\": \"\",\r\n        \"align\": \"left\"\r\n    },\r\n    \"background\": {\r\n        \"color\": \"\",\r\n        \"image\": \"\",\r\n        \"flip\": \"\",\r\n        \"overlay\": \"\",\r\n        \"scroll-effect\": \"fixed/parallax\"\r\n    },\r\n    \"animation\": {\r\n        \"appear\": \"fadein/slidein\",\r\n        \"appear-speed\": \"slow/normal/fast\"\r\n    },\r\n    \"info\": {\r\n        \"anchor\": \"\"\r\n    }\r\n}', '0000-00-00 00:00:00', '', 0),
(4, 1, 'tytul-strony-sdf', 'Tytuł strony', '', '', '', '', '', '', '', '', '', '0000-00-00', 0, 0, 'projects/projects.php', '{\r\n    \"layout\": {\r\n        \"title\": \"\",\r\n        \"subtitle\": \"\",\r\n        \"lead\": \"\",\r\n        \"content\": \"\",\r\n        \"image\": \"\",\r\n        \"date\": \"\",\r\n        \"primary-button\": \"\",\r\n        \"secondary-button\": \"\",\r\n        \"align\": \"left\"\r\n    },\r\n    \"background\": {\r\n        \"color\": \"\",\r\n        \"image\": \"\",\r\n        \"flip\": \"\",\r\n        \"overlay\": \"\",\r\n        \"scroll-effect\": \"fixed/parallax\"\r\n    },\r\n    \"animation\": {\r\n        \"appear\": \"fadein/slidein\",\r\n        \"appear-speed\": \"slow/normal/fast\"\r\n    },\r\n    \"info\": {\r\n        \"anchor\": \"\"\r\n    }\r\n}', '0000-00-00 00:00:00', '', 0),
(5, 3, 'good-news-q', 'Good news', 'A taxonomy is a system of classifying data around a set of unique characteristics. Scientists have been using this system for years, grouping all living creatures into Kingdoms, Class, Species and so on.', '', 'Each collection defines which taxonomies are part of its content model in their blueprint. Thus, taxonomies and their terms are connected to entries through the collection in a strict relationship. Once you attach a taxonomy to a collection, the fields, variables, and routes are added automatically.', 'add_photo.svg', '', '', '', '', '', '0000-00-00', 0, 0, '', '', '0000-00-00 00:00:00', '', 0),
(6, 3, 'bad-news-w', 'Bad news', 'A taxonomy is a system of classifying data around a set of unique characteristics. Scientists have been using this system for years, grouping all living creatures into Kingdoms, Class, Species and so on.', '', 'Each collection defines which taxonomies are part of its content model in their blueprint. Thus, taxonomies and their terms are connected to entries through the collection in a strict relationship. Once you attach a taxonomy to a collection, the fields, variables, and routes are added automatically.', 'add_photo.svg', '', '', '', '', '', '0000-00-00', 0, 0, '', '', '0000-00-00 00:00:00', '', 0),
(7, 3, 'good-news-sd', 'Good news', 'A taxonomy is a system of classifying data around a set of unique characteristics. Scientists have been using this system for years, grouping all living creatures into Kingdoms, Class, Species and so on.', '', 'Each collection defines which taxonomies are part of its content model in their blueprint. Thus, taxonomies and their terms are connected to entries through the collection in a strict relationship. Once you attach a taxonomy to a collection, the fields, variables, and routes are added automatically.', 'add_photo.svg', '', '', '', '', '', '0000-00-00', 0, 0, '', '', '0000-00-00 00:00:00', '', 0),
(8, 3, 'very-bad-news', 'Very bad news', 'A taxonomy is a system of classifying data around a set of unique characteristics. Scientists have been using this system for years, grouping all living creatures into Kingdoms, Class, Species and so on.', '', 'Each collection defines which taxonomies are part of its content model in their blueprint. Thus, taxonomies and their terms are connected to entries through the collection in a strict relationship. Once you attach a taxonomy to a collection, the fields, variables, and routes are added automatically.', 'add_photo.svg', '', '', '', '', '', '0000-00-00', 0, 0, '', '', '0000-00-00 00:00:00', '', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `globals`
--

CREATE TABLE `globals` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(32) COLLATE utf8_polish_ci NOT NULL,
  `content` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `title` varchar(32) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `globals`
--

INSERT INTO `globals` (`id`, `name`, `content`, `title`) VALUES
(1, 'firm_name', 'IMD', 'Nazwa firmy'),
(2, 'firm_email', 'rm@pawelec.info', 'E-mail firmowy');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `menu`
--

CREATE TABLE `menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_parent` int(10) UNSIGNED NOT NULL,
  `title` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `hidden` tinyint(1) UNSIGNED NOT NULL,
  `access` tinyint(1) UNSIGNED NOT NULL,
  `ord` smallint(5) UNSIGNED NOT NULL,
  `page_view` varchar(32) COLLATE utf8_polish_ci NOT NULL,
  `page_view_settings` varchar(512) COLLATE utf8_polish_ci NOT NULL,
  `view` varchar(32) COLLATE utf8_polish_ci NOT NULL,
  `view_settings` varchar(1024) COLLATE utf8_polish_ci NOT NULL,
  `layout` varchar(32) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `menu`
--

INSERT INTO `menu` (`id`, `id_parent`, `title`, `slug`, `hidden`, `access`, `ord`, `page_view`, `page_view_settings`, `view`, `view_settings`, `layout`) VALUES
(1, 0, 'Home', '', 0, 0, 1, '', '', '', '', ''),
(2, 0, 'O nas', 'o-nas', 0, 0, 1, '', '', '', '', ''),
(3, 0, 'Aktualności', 'aktualnosci', 0, 0, 3, 'news/news.php', '', 'features/features.php', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `meta`
--

CREATE TABLE `meta` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_frame` int(10) UNSIGNED NOT NULL,
  `title` varchar(96) COLLATE utf8_polish_ci NOT NULL,
  `description` varchar(196) COLLATE utf8_polish_ci NOT NULL,
  `canonical` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `og_type` varchar(32) COLLATE utf8_polish_ci NOT NULL,
  `og_title` varchar(96) COLLATE utf8_polish_ci NOT NULL,
  `og_description` varchar(196) COLLATE utf8_polish_ci NOT NULL,
  `og_url` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `og_site_name` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  `og_locale` varchar(8) COLLATE utf8_polish_ci NOT NULL,
  `og_locale_alternate` varchar(8) COLLATE utf8_polish_ci NOT NULL,
  `og_image` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `og_image_width` varchar(4) COLLATE utf8_polish_ci NOT NULL,
  `og_image_height` varchar(4) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `meta`
--

INSERT INTO `meta` (`id`, `id_frame`, `title`, `description`, `canonical`, `og_type`, `og_title`, `og_description`, `og_url`, `og_site_name`, `og_locale`, `og_locale_alternate`, `og_image`, `og_image_width`, `og_image_height`) VALUES
(1, 1, 'Meta tytuł strony', 'Meta opis strony', '', '', '', '', '', '', '', '', '', '', '');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_parent` (`id_parent`),
  ADD KEY `ord` (`ord`),
  ADD KEY `event_date` (`event_date`);

--
-- Indeksy dla tabeli `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `ord` (`ord`),
  ADD KEY `event_date` (`event_date`),
  ADD KEY `id_frame` (`id_menu`);

--
-- Indeksy dla tabeli `globals`
--
ALTER TABLE `globals`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `id_parent` (`id_parent`);

--
-- Indeksy dla tabeli `meta`
--
ALTER TABLE `meta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_frame` (`id_frame`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `globals`
--
ALTER TABLE `globals`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `meta`
--
ALTER TABLE `meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
