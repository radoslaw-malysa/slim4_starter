-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Wrz 2020, 17:21
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
  `update_user` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `content`
--

CREATE TABLE `content` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_parent` int(10) UNSIGNED NOT NULL,
  `slug` varchar(64) COLLATE utf8_polish_ci NOT NULL,
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
  `update_user` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `content`
--

INSERT INTO `content` (`id`, `id_parent`, `slug`, `title`, `subtitle`, `lead`, `content`, `image_url`, `image_alt`, `primary_url`, `primary_text`, `secondary_url`, `secondary_text`, `event_date`, `ord`, `state`, `view`, `update_time`, `update_ip`, `update_user`) VALUES
(1, 0, '', 'Tytuł strony', '', '', '', '', '', '', '', '', '', '0000-00-00', 0, 0, '{\r\n    \"template\": \"hello.php\",\r\n    \"layout\": {\r\n        \"title\": \"\",\r\n        \"subtitle\": \"\",\r\n        \"lead\": \"\",\r\n        \"content\": \"\",\r\n        \"image\": \"\",\r\n        \"date\": \"\",\r\n        \"primary-button\": \"\",\r\n        \"secondary-button\": \"\",\r\n        \"align\": \"left\"\r\n    },\r\n    \"background\": {\r\n        \"color\": \"\",\r\n        \"image\": \"\",\r\n        \"flip\": \"\",\r\n        \"overlay\": \"\",\r\n        \"scroll-effect\": \"fixed/parallax\"\r\n    },\r\n    \"animation\": {\r\n        \"appear\": \"fadein/slidein\",\r\n        \"app', '0000-00-00 00:00:00', '', 0);

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

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `navs`
--

CREATE TABLE `navs` (
  `id` int(10) UNSIGNED NOT NULL,
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

INSERT INTO `navs` (`id`, `id_parent`, `title`, `url`, `hidden`, `access`, `ord`) VALUES
(1, 0, 'Home', '/', 0, 0, 1),
(2, 0, 'O nas', '/o-nas', 0, 0, 1);

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
-- Indeksy dla tabeli `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_parent` (`id_parent`),
  ADD KEY `ord` (`ord`),
  ADD KEY `event_date` (`event_date`),
  ADD KEY `slug` (`slug`);

--
-- Indeksy dla tabeli `globals`
--
ALTER TABLE `globals`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `navs`
--
ALTER TABLE `navs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_parent` (`id_parent`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `content`
--
ALTER TABLE `content`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `globals`
--
ALTER TABLE `globals`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `navs`
--
ALTER TABLE `navs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
