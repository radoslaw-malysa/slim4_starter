-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Paź 2020, 23:50
-- Wersja serwera: 10.1.37-MariaDB
-- Wersja PHP: 7.3.0

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
  `title` varchar(255) COLLATE utf8_polish_ci NOT NULL,
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
(1, 1, 'Experience', 'We have extensive experience and can be proud of 100+ completed projects.', '', '', 'ico1.svg', 'Go to hell', '#', '', '', '', '0000-00-00', 0, 0, '', '0000-00-00 00:00:00', '', 0, 'entries'),
(2, 1, 'Support', 'We value each client and always respond to feedback throughout our cooperation.', '', '', 'ico2.svg', '', '#', '', '', '', '0000-00-00', 2, 1, '', '0000-00-00 00:00:00', '', 0, 'entries'),
(3, 1, 'Technologies', 'We create our products using the latest technologies to ensure the best experience.', '', '', 'ico1.svg', 'Go to hell', '#', '', '', '', '0000-00-00', 0, 0, '', '0000-00-00 00:00:00', '', 0, 'entries');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `contents`
--

CREATE TABLE `contents` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_nav` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_polish_ci NOT NULL,
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

INSERT INTO `contents` (`id`, `id_nav`, `title`, `subtitle`, `lead`, `content`, `image_url`, `image_alt`, `primary_url`, `primary_text`, `secondary_url`, `secondary_text`, `event_date`, `ord`, `state`, `view`, `view_settings`, `update_time`, `update_ip`, `update_user`) VALUES
(1, 1, 'Why Choose Us', 'Still have some hesitations whether cooperation with us is worth the trouble? Check the reasons why you should choose us among other companies!', '', '', '', '', '', '', '', '', '0000-00-00', 0, 0, 'features/features.php', '{\r\n    \"layout\": {\r\n        \"title\": \"\",\r\n        \"subtitle\": \"\",\r\n        \"lead\": \"\",\r\n        \"content\": \"\",\r\n        \"image\": \"\",\r\n        \"date\": \"\",\r\n        \"primary-button\": \"\",\r\n        \"secondary-button\": \"\",\r\n        \"align\": \"left\"\r\n    },\r\n    \"background\": {\r\n        \"color\": \"\",\r\n        \"image\": \"\",\r\n        \"flip\": \"\",\r\n        \"overlay\": \"\",\r\n        \"scroll-effect\": \"fixed/parallax\"\r\n    },\r\n    \"animation\": {\r\n        \"appear\": \"fadein/slidein\",\r\n        \"appear-speed\": \"slow/normal/fast\"\r\n    },\r\n    \"info\": {\r\n        \"anchor\": \"\"\r\n    }\r\n}', '0000-00-00 00:00:00', '', 0),
(3, 1, 'Tytuł strony', '', '', '', '', '', '', '', '', '', '0000-00-00', 0, 0, 'features_full/features_full.php', '{\r\n    \"layout\": {\r\n        \"title\": \"\",\r\n        \"subtitle\": \"\",\r\n        \"lead\": \"\",\r\n        \"content\": \"\",\r\n        \"image\": \"\",\r\n        \"date\": \"\",\r\n        \"primary-button\": \"\",\r\n        \"secondary-button\": \"\",\r\n        \"align\": \"left\"\r\n    },\r\n    \"background\": {\r\n        \"color\": \"\",\r\n        \"image\": \"\",\r\n        \"flip\": \"\",\r\n        \"overlay\": \"\",\r\n        \"scroll-effect\": \"fixed/parallax\"\r\n    },\r\n    \"animation\": {\r\n        \"appear\": \"fadein/slidein\",\r\n        \"appear-speed\": \"slow/normal/fast\"\r\n    },\r\n    \"info\": {\r\n        \"anchor\": \"\"\r\n    }\r\n}', '0000-00-00 00:00:00', '', 0),
(4, 1, 'Tytuł strony', '', '', '', '', '', '', '', '', '', '0000-00-00', 0, 0, 'projects/projects.php', '{\r\n    \"layout\": {\r\n        \"title\": \"\",\r\n        \"subtitle\": \"\",\r\n        \"lead\": \"\",\r\n        \"content\": \"\",\r\n        \"image\": \"\",\r\n        \"date\": \"\",\r\n        \"primary-button\": \"\",\r\n        \"secondary-button\": \"\",\r\n        \"align\": \"left\"\r\n    },\r\n    \"background\": {\r\n        \"color\": \"\",\r\n        \"image\": \"\",\r\n        \"flip\": \"\",\r\n        \"overlay\": \"\",\r\n        \"scroll-effect\": \"fixed/parallax\"\r\n    },\r\n    \"animation\": {\r\n        \"appear\": \"fadein/slidein\",\r\n        \"appear-speed\": \"slow/normal/fast\"\r\n    },\r\n    \"info\": {\r\n        \"anchor\": \"\"\r\n    }\r\n}', '0000-00-00 00:00:00', '', 0);

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
-- Struktura tabeli dla tabeli `meta`
--

CREATE TABLE `meta` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_nav` int(10) UNSIGNED NOT NULL,
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

INSERT INTO `meta` (`id`, `id_nav`, `title`, `description`, `canonical`, `og_type`, `og_title`, `og_description`, `og_url`, `og_site_name`, `og_locale`, `og_locale_alternate`, `og_image`, `og_image_width`, `og_image_height`) VALUES
(1, 1, 'Meta tytuł strony', 'Meta opis strony', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `navs`
--

CREATE TABLE `navs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(16) COLLATE utf8_polish_ci NOT NULL,
  `id_parent` int(10) UNSIGNED NOT NULL,
  `title` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  `url` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `hidden` tinyint(1) UNSIGNED NOT NULL,
  `access` tinyint(1) UNSIGNED NOT NULL,
  `ord` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `navs`
--

INSERT INTO `navs` (`id`, `name`, `id_parent`, `title`, `url`, `hidden`, `access`, `ord`) VALUES
(1, 'pages', 0, 'Home', '/', 0, 0, 1),
(2, 'pages', 0, 'O nas', '/o-nas', 0, 0, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `taxonomies`
--

CREATE TABLE `taxonomies` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `title` varchar(32) COLLATE utf8_polish_ci NOT NULL,
  `slug` varchar(32) COLLATE utf8_polish_ci NOT NULL,
  `url` varchar(64) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `taxonomies`
--

INSERT INTO `taxonomies` (`id`, `title`, `slug`, `url`) VALUES
(1, 'Kategoria', 'kategoria', '/kategorie');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `taxonomy`
--

CREATE TABLE `taxonomy` (
  `id_contents` int(10) UNSIGNED NOT NULL,
  `id_term` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `terms`
--

CREATE TABLE `terms` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `id_taxonomy` tinyint(3) UNSIGNED NOT NULL,
  `title` varchar(32) COLLATE utf8_polish_ci NOT NULL,
  `slug` varchar(32) COLLATE utf8_polish_ci NOT NULL,
  `url` varchar(64) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `terms`
--

INSERT INTO `terms` (`id`, `id_taxonomy`, `title`, `slug`, `url`) VALUES
(1, 1, 'Aktualności', 'aktualnosci', '/aktualnosci');

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
  ADD KEY `ord` (`ord`),
  ADD KEY `event_date` (`event_date`),
  ADD KEY `id_nav` (`id_nav`);

--
-- Indeksy dla tabeli `globals`
--
ALTER TABLE `globals`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `meta`
--
ALTER TABLE `meta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_nav` (`id_nav`);

--
-- Indeksy dla tabeli `navs`
--
ALTER TABLE `navs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_parent` (`id_parent`),
  ADD KEY `name` (`name`);

--
-- Indeksy dla tabeli `taxonomies`
--
ALTER TABLE `taxonomies`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `taxonomy`
--
ALTER TABLE `taxonomy`
  ADD UNIQUE KEY `conterm` (`id_contents`,`id_term`);

--
-- Indeksy dla tabeli `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `globals`
--
ALTER TABLE `globals`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `meta`
--
ALTER TABLE `meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `navs`
--
ALTER TABLE `navs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `taxonomies`
--
ALTER TABLE `taxonomies`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `terms`
--
ALTER TABLE `terms`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
