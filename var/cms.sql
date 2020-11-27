-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 27 Lis 2020, 15:09
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
  `id_page` int(10) UNSIGNED NOT NULL,
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
  `related` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `view` varchar(32) COLLATE utf8_polish_ci NOT NULL,
  `view_settings` varchar(1024) COLLATE utf8_polish_ci NOT NULL,
  `update_time` datetime NOT NULL,
  `update_ip` varchar(16) COLLATE utf8_polish_ci NOT NULL,
  `update_user` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `contents`
--

INSERT INTO `contents` (`id`, `id_page`, `slug`, `title`, `subtitle`, `lead`, `content`, `image_url`, `image_alt`, `primary_url`, `primary_text`, `secondary_url`, `secondary_text`, `event_date`, `ord`, `state`, `related`, `view`, `view_settings`, `update_time`, `update_ip`, `update_user`) VALUES
(1, 1, 'why', 'Why Choose Us', 'Still have some hesitations whether cooperation with us is worth the trouble? Check the reasons why you should choose us among other companies!', '', '', '', '', '', '', '', '', '0000-00-00', 0, 0, '', 'features/features.php', '{\r\n    \"layout\": {\r\n        \"title\": \"\",\r\n        \"subtitle\": \"\",\r\n        \"lead\": \"\",\r\n        \"content\": \"\",\r\n        \"image\": \"\",\r\n        \"date\": \"\",\r\n        \"primary-button\": \"\",\r\n        \"secondary-button\": \"\",\r\n        \"align\": \"left\"\r\n    },\r\n    \"background\": {\r\n        \"color\": \"\",\r\n        \"image\": \"\",\r\n        \"flip\": \"\",\r\n        \"overlay\": \"\",\r\n        \"scroll-effect\": \"fixed/parallax\"\r\n    },\r\n    \"animation\": {\r\n        \"appear\": \"fadein/slidein\",\r\n        \"appear-speed\": \"slow/normal/fast\"\r\n    },\r\n    \"info\": {\r\n        \"anchor\": \"\"\r\n    }\r\n}', '0000-00-00 00:00:00', '', 0),
(3, 1, 'tytul-strony', 'Tytuł strony', '', '', '', '', '', '', '', '', '', '0000-00-00', 0, 0, '', 'features_full/features_full.php', '{\r\n    \"layout\": {\r\n        \"title\": \"\",\r\n        \"subtitle\": \"\",\r\n        \"lead\": \"\",\r\n        \"content\": \"\",\r\n        \"image\": \"\",\r\n        \"date\": \"\",\r\n        \"primary-button\": \"\",\r\n        \"secondary-button\": \"\",\r\n        \"align\": \"left\"\r\n    },\r\n    \"background\": {\r\n        \"color\": \"\",\r\n        \"image\": \"\",\r\n        \"flip\": \"\",\r\n        \"overlay\": \"\",\r\n        \"scroll-effect\": \"fixed/parallax\"\r\n    },\r\n    \"animation\": {\r\n        \"appear\": \"fadein/slidein\",\r\n        \"appear-speed\": \"slow/normal/fast\"\r\n    },\r\n    \"info\": {\r\n        \"anchor\": \"\"\r\n    }\r\n}', '0000-00-00 00:00:00', '', 0),
(4, 1, 'tytul-strony-sdf', 'Tytuł strony', '', '', '', '', '', '', '', '', '', '0000-00-00', 0, 0, '', 'projects/projects.php', '{\r\n    \"layout\": {\r\n        \"title\": \"\",\r\n        \"subtitle\": \"\",\r\n        \"lead\": \"\",\r\n        \"content\": \"\",\r\n        \"image\": \"\",\r\n        \"date\": \"\",\r\n        \"primary-button\": \"\",\r\n        \"secondary-button\": \"\",\r\n        \"align\": \"left\"\r\n    },\r\n    \"background\": {\r\n        \"color\": \"\",\r\n        \"image\": \"\",\r\n        \"flip\": \"\",\r\n        \"overlay\": \"\",\r\n        \"scroll-effect\": \"fixed/parallax\"\r\n    },\r\n    \"animation\": {\r\n        \"appear\": \"fadein/slidein\",\r\n        \"appear-speed\": \"slow/normal/fast\"\r\n    },\r\n    \"info\": {\r\n        \"anchor\": \"\"\r\n    }\r\n}', '0000-00-00 00:00:00', '', 0),
(5, 3, 'good-news-q', 'Good news', 'A taxonomy is a system of classifying data around a set of unique characteristics. Scientists have been using this system for years, grouping all living creatures into Kingdoms, Class, Species and so on.', '', 'Each collection defines which taxonomies are part of its content model in their blueprint. Thus, taxonomies and their terms are connected to entries through the collection in a strict relationship. Once you attach a taxonomy to a collection, the fields, variables, and routes are added automatically.', 'add_photo.svg', '', '', '', '', '', '0000-00-00', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0),
(6, 3, 'bad-news-w', 'Bad news', 'A taxonomy is a system of classifying data around a set of unique characteristics. Scientists have been using this system for years, grouping all living creatures into Kingdoms, Class, Species and so on.', '', 'Each collection defines which taxonomies are part of its content model in their blueprint. Thus, taxonomies and their terms are connected to entries through the collection in a strict relationship. Once you attach a taxonomy to a collection, the fields, variables, and routes are added automatically.', 'add_photo.svg', '', '', '', '', '', '0000-00-00', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0),
(7, 3, 'good-news-sd', 'Good news', 'A taxonomy is a system of classifying data around a set of unique characteristics. Scientists have been using this system for years, grouping all living creatures into Kingdoms, Class, Species and so on.', '', 'Each collection defines which taxonomies are part of its content model in their blueprint. Thus, taxonomies and their terms are connected to entries through the collection in a strict relationship. Once you attach a taxonomy to a collection, the fields, variables, and routes are added automatically.', 'add_photo.svg', '', '', '', '', '', '0000-00-00', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0),
(8, 3, 'very-bad-news', 'Very bad news', 'A taxonomy is a system of classifying data around a set of unique characteristics. Scientists have been using this system for years, grouping all living creatures into Kingdoms, Class, Species and so on.', '', 'Each collection defines which taxonomies are part of its content model in their blueprint. Thus, taxonomies and their terms are connected to entries through the collection in a strict relationship. Once you attach a taxonomy to a collection, the fields, variables, and routes are added automatically.', 'add_photo.svg', '', '', '', '', '', '0000-00-00', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `factors`
--

CREATE TABLE `factors` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_topic` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `ord` tinyint(3) UNSIGNED NOT NULL,
  `key_factor` tinyint(1) NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `factors`
--

INSERT INTO `factors` (`id`, `id_topic`, `title`, `ord`, `key_factor`, `type`) VALUES
(16, 1, 'Pierwszy czynnik', 0, 1, 1),
(17, 1, 'Drugi czynnik', 0, 1, 1),
(23, 1, 'sdfsdfsdf', 0, 0, 3),
(24, 1, 'erwerwerwer', 0, 0, 3),
(25, 1, 'rewr reewr ewrwe rwe', 0, 0, 3);

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

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_parent` int(10) UNSIGNED NOT NULL,
  `model` varchar(24) COLLATE utf8_polish_ci NOT NULL DEFAULT 'contents',
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
-- Zrzut danych tabeli `pages`
--

INSERT INTO `pages` (`id`, `id_parent`, `model`, `title`, `slug`, `hidden`, `access`, `ord`, `page_view`, `page_view_settings`, `view`, `view_settings`, `layout`) VALUES
(1, 0, 'contents', 'Home', '', 0, 0, 1, '', '', '', '', ''),
(2, 0, 'contents', 'O nas', 'o-nas', 0, 0, 1, '', '', '', '', ''),
(3, 0, 'contents', 'Aktualności', 'aktualnosci', 0, 0, 3, 'news/news.php', '', 'features/features.php', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `scenarios`
--

CREATE TABLE `scenarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_topic` int(10) UNSIGNED NOT NULL,
  `title` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `subtitle` varchar(1024) COLLATE utf8_polish_ci NOT NULL,
  `content` text COLLATE utf8_polish_ci NOT NULL,
  `factors` varchar(512) COLLATE utf8_polish_ci NOT NULL,
  `ord` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `scenarios`
--

INSERT INTO `scenarios` (`id`, `id_topic`, `title`, `subtitle`, `content`, `factors`, `ord`) VALUES
(1, 1, 'Pierwszy scenariusz', '', '<h1 class=\"css-16aryjy-Html--Container eyyskcn0\" style=\"margin-top: 18px; margin-bottom: 18px; color: #222222; font-family: Rubik, sans-serif;\">Wnioski</h1>\n<div class=\"css-16aryjy-Html--Container eyyskcn0\" style=\"margin-top: 18px; margin-bottom: 18px; color: #222222; font-family: Rubik, sans-serif;\">Filmy Roberta Rodrigueza nigdy nie należały do dzieł, o kt&oacute;rych m&oacute;wiło się, że są wyżynami kinematografii, ale dawały dzieciakom po prostu frajdę. Nie były przekombinowane, momentami wręcz raziły widza tandetą po oczach. Podobnie jest w przypadku \"Kroniki świątecznej: części 2\".</div>\n<div style=\"color: #222222; font-family: Rubik, sans-serif; margin-top: 18px; margin-bottom: 18px;\">Nowej produkcji Netflixa udało się zrobić dokładnie to, co \"Małym agentom\". W filmie dzieciaki zamieniły się poniekąd rolami z dorosłymi i to one w gruncie rzeczy przewodzą wszelkim akcjom skierowanym przeciwko Belsnickelowi. W międzyczasie święty Mikołaj gdzieś sobie w tle tańczy lub śpiewa. Jest więc mało przydatnym sojusznikiem.</div>\n<h1 style=\"color: #222222; font-family: Rubik, sans-serif; margin-top: 18px; margin-bottom: 18px;\">Procedury postępowania</h1>\n<p><span style=\"color: #222222; font-family: Rubik, sans-serif;\">Ci, kt&oacute;rzy są fanami kina przygodowego z początku XXI wieku, też znajdą rozrywkę w \"The Christmas Chronicles 2\". Wystarczy, że pozwolą sobie na to, aby wyszło z nich mentalne dziecko. Wtedy wieczorny seans z rodziną okaże się sukcesem na miarę premiery pierwszego \"Harry\'ego Pottera\".</span></p>', '[23,24]', 1),
(2, 1, 'Drugi', '', '<h1>Tytuł rozdziału</h1>\n<p>fdsfdsfsdfsdfsdf</p>', '[]', 2),
(3, 1, 'Trzeci', '', 'undefined', '[]', 3),
(4, 1, 'Koniec świata', '', '<h1 class=\"css-16aryjy-Html--Container eyyskcn0\" style=\"margin-top: 18px; margin-bottom: 18px; color: #222222; font-family: Rubik, sans-serif;\">Wnioski</h1>\n<div class=\"css-16aryjy-Html--Container eyyskcn0\" style=\"margin-top: 18px; margin-bottom: 18px; color: #222222; font-family: Rubik, sans-serif;\">Filmy Roberta Rodrigueza nigdy nie należały do dzieł, o kt&oacute;rych m&oacute;wiło się, że są wyżynami kinematografii, ale dawały dzieciakom po prostu frajdę. Nie były przekombinowane, momentami wręcz raziły widza tandetą po oczach. Podobnie jest w przypadku \"Kroniki świątecznej: części 2\".</div>\n<div style=\"color: #222222; font-family: Rubik, sans-serif; margin-top: 18px; margin-bottom: 18px;\">Nowej produkcji Netflixa udało się zrobić dokładnie to, co \"Małym agentom\". W filmie dzieciaki zamieniły się poniekąd rolami z dorosłymi i to one w gruncie rzeczy przewodzą wszelkim akcjom skierowanym przeciwko Belsnickelowi. W międzyczasie święty Mikołaj gdzieś sobie w tle tańczy lub śpiewa. Jest więc mało przydatnym sojusznikiem.</div>\n<h1 style=\"color: #222222; font-family: Rubik, sans-serif; margin-top: 18px; margin-bottom: 18px;\">Procedury postępowania</h1>\n<p><span style=\"color: #222222; font-family: Rubik, sans-serif;\">Ci, kt&oacute;rzy są fanami kina przygodowego z początku XXI wieku, też znajdą rozrywkę w \"The Christmas Chronicles 2\". Wystarczy, że pozwolą sobie na to, aby wyszło z nich mentalne dziecko. Wtedy wieczorny seans z rodziną okaże się sukcesem na miarę premiery pierwszego \"Harry\'ego Pottera\".</span></p>', '[24,23,25]', 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `topics`
--

CREATE TABLE `topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `subtitle` varchar(512) COLLATE utf8_polish_ci NOT NULL,
  `time_horizon` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  `topic_area` tinyint(3) UNSIGNED NOT NULL,
  `create_time` datetime NOT NULL,
  `create_ip` varchar(16) COLLATE utf8_polish_ci NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `state` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `topics`
--

INSERT INTO `topics` (`id`, `title`, `subtitle`, `time_horizon`, `topic_area`, `create_time`, `create_ip`, `id_user`, `state`) VALUES
(1, 'Czy androidy śnią o elektrycznych owcach?', '', 'Nigdy', 2, '0000-00-00 00:00:00', '', 0, 1),
(3, 'Zawód przyszłości', '', '5 lat', 1, '0000-00-00 00:00:00', '', 0, 1),
(4, 'Czy Mateusz wyprodukuje samochody elektryczne?', '', '3 lata', 1, '0000-00-00 00:00:00', '', 0, 1),
(5, 'Czy PIS będzie rządził do końca kadencji', '', '3 lata', 3, '0000-00-00 00:00:00', '', 0, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `topics_areas`
--

CREATE TABLE `topics_areas` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `title` varchar(64) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `topics_areas`
--

INSERT INTO `topics_areas` (`id`, `title`) VALUES
(1, 'Społeczeństwo');

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
  ADD KEY `id_page` (`id_page`);

--
-- Indeksy dla tabeli `factors`
--
ALTER TABLE `factors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_topic` (`id_topic`);

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
  ADD UNIQUE KEY `id_frame` (`id_frame`);

--
-- Indeksy dla tabeli `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `id_parent` (`id_parent`);

--
-- Indeksy dla tabeli `scenarios`
--
ALTER TABLE `scenarios`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state` (`state`);

--
-- Indeksy dla tabeli `topics_areas`
--
ALTER TABLE `topics_areas`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `factors`
--
ALTER TABLE `factors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
-- AUTO_INCREMENT dla tabeli `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `scenarios`
--
ALTER TABLE `scenarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `topics_areas`
--
ALTER TABLE `topics_areas`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
