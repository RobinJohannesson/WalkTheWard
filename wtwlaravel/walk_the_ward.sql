-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 11 jan 2018 kl 18:08
-- Serverversion: 10.1.28-MariaDB
-- PHP-version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `walk_the_ward`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `areas`
--

CREATE TABLE `areas` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mapId` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumpning av Data i tabell `areas`
--

INSERT INTO `areas` (`id`, `name`, `mapId`, `updated_at`, `created_at`) VALUES
(1, 'Nordvästra', 1, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(2, 'Nordöstra', 1, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(3, 'Centrala', 1, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(4, 'Sydvästra', 1, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(5, 'Sydöstra', 1, '2018-01-11 17:08:14', '2018-01-11 17:08:14');

-- --------------------------------------------------------

--
-- Tabellstruktur `bonus_games`
--

CREATE TABLE `bonus_games` (
  `id` int(10) UNSIGNED NOT NULL,
  `lettersToDiscard` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imageSource` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placeId` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumpning av Data i tabell `bonus_games`
--

INSERT INTO `bonus_games` (`id`, `lettersToDiscard`, `imageSource`, `placeId`, `updated_at`, `created_at`) VALUES
(1, 'Helsingborg', 'helsingborg.jpg', 1, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(2, 'Ängelholm', 'ängelholm.jpg', 2, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(3, 'Båstad', 'båstad.jpg', 3, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(4, 'Örkelljunga', 'örkelljunga.jpg', 4, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(5, 'Höör', 'höör.jpg', 19, '2018-01-11 17:08:14', '2018-01-11 17:08:14');

-- --------------------------------------------------------

--
-- Tabellstruktur `bonus_game_in_games`
--

CREATE TABLE `bonus_game_in_games` (
  `bonusGameId` int(10) UNSIGNED NOT NULL,
  `gameId` int(10) UNSIGNED NOT NULL,
  `isCompleted` tinyint(1) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumpning av Data i tabell `bonus_game_in_games`
--

INSERT INTO `bonus_game_in_games` (`bonusGameId`, `gameId`, `isCompleted`, `updated_at`, `created_at`) VALUES
(1, 1, 1, '2018-01-11 17:08:14', '2018-01-11 17:08:14');

-- --------------------------------------------------------

--
-- Tabellstruktur `characters`
--

CREATE TABLE `characters` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageSource` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumpning av Data i tabell `characters`
--

INSERT INTO `characters` (`id`, `name`, `imageSource`, `updated_at`, `created_at`) VALUES
(1, 'Ballong Björn', 'ballong.png', '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(2, 'Dans Björn', 'dans.png', '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(3, 'Detektiv Björn', 'detektiv.png', '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(4, 'Fest Björn', 'fest.png', '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(5, 'Kjol Björn', 'kjol.png', '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(6, 'Paraply Björn', 'paraply.png', '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(7, 'Regnjacka Björn', 'regnjacka.png', '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(8, 'Röntgen Björn', 'röntgen.png', '2018-01-11 17:08:14', '2018-01-11 17:08:14');

-- --------------------------------------------------------

--
-- Tabellstruktur `exercises`
--

CREATE TABLE `exercises` (
  `id` int(10) UNSIGNED NOT NULL,
  `videoSource` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(1) DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumpning av Data i tabell `exercises`
--

INSERT INTO `exercises` (`id`, `videoSource`, `isActive`, `updated_at`, `created_at`) VALUES
(1, 'balansen.mp4', 1, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(2, 'muskelstyrka.mp4', 1, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(3, 'upppata.mp4', 1, '2018-01-11 17:08:14', '2018-01-11 17:08:14');

-- --------------------------------------------------------

--
-- Tabellstruktur `exercises_in_games`
--

CREATE TABLE `exercises_in_games` (
  `exerciseId` int(10) UNSIGNED NOT NULL,
  `gameId` int(10) UNSIGNED NOT NULL,
  `isCompleted` tinyint(1) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur `games`
--

CREATE TABLE `games` (
  `id` int(10) UNSIGNED NOT NULL,
  `areaId` int(10) UNSIGNED DEFAULT NULL,
  `themeId` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumpning av Data i tabell `games`
--

INSERT INTO `games` (`id`, `areaId`, `themeId`, `updated_at`, `created_at`) VALUES
(1, 1, 1, '2018-01-11 17:08:14', '2018-01-11 17:08:14');

-- --------------------------------------------------------

--
-- Tabellstruktur `maps`
--

CREATE TABLE `maps` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumpning av Data i tabell `maps`
--

INSERT INTO `maps` (`id`, `name`, `updated_at`, `created_at`) VALUES
(1, 'Skåne', '2018-01-11 17:08:14', '2018-01-11 17:08:14');

-- --------------------------------------------------------

--
-- Tabellstruktur `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumpning av Data i tabell `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_11_07_093825_create_characters_table', 1),
(4, '2017_11_07_094300_create_patients_table', 1),
(5, '2017_11_07_094318_create_statistics_table', 1),
(6, '2017_11_07_094848_create_games_table', 1),
(7, '2017_11_07_095126_create_place_in_games_table', 1),
(8, '2017_11_07_095302_create_bonus_game_in_games_table', 1),
(9, '2017_11_07_095349_create_question_in_games_table', 1),
(10, '2017_11_07_095510_create_questions_table', 1),
(11, '2017_11_07_095823_create_themes_table', 1),
(12, '2017_11_07_095910_create_bonus_games_table', 1),
(13, '2017_11_07_100007_create_wards_table', 1),
(14, '2017_11_07_100051_create_stations_table', 1),
(15, '2017_11_07_100113_create_places_table', 1),
(16, '2017_11_07_100141_create_areas_table', 1),
(17, '2017_11_07_100202_create_maps_table', 1),
(18, '2017_11_29_095126_create_exercises_in_games_table', 1),
(19, '2017_11_29_100113_create_exercises_table', 1),
(20, '2017_11_29_102003_edit_foreign_key', 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur `patients`
--

CREATE TABLE `patients` (
  `id` int(10) UNSIGNED NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roomType` int(11) NOT NULL,
  `distanceInMeter` int(11) NOT NULL DEFAULT '0',
  `gameId` int(10) UNSIGNED DEFAULT NULL,
  `characterId` int(10) UNSIGNED DEFAULT NULL,
  `wardId` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur `places`
--

CREATE TABLE `places` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stationId` int(10) UNSIGNED DEFAULT NULL,
  `areaId` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumpning av Data i tabell `places`
--

INSERT INTO `places` (`id`, `name`, `description`, `stationId`, `areaId`, `updated_at`, `created_at`) VALUES
(1, 'Helsingborg', 'Helsingborg description', 1, 1, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(2, 'Ängelholm', 'Ängelholm description', 2, 1, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(3, 'Båstad', 'Båstad description', 3, 1, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(4, 'Örkelljunga', 'Örkelljunga description', 4, 1, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(5, 'Perstorp', 'Perstorp description', 5, 1, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(6, 'Klippan', 'Klippan description', 6, 1, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(7, 'Svalöv', 'Svalöv description', 7, 1, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(8, 'Landskrona', 'Landskrona description', 8, 1, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(9, 'Kristianstad', 'Kristianstad description', 1, 2, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(10, 'Åhus', 'Åhus description', 2, 2, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(11, 'Degeberga', 'Degeberga description', 3, 2, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(12, 'Tollarp', 'Tollarp description', 4, 2, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(13, 'Sösdala', 'Sösdala description', 5, 2, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(14, 'Hässleholm', 'Hässleholm description', 6, 2, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(15, 'Broby', 'Broby description', 7, 2, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(16, 'Bromölla', 'Bromölla description', 8, 2, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(17, 'Eslöv', 'Eslöv description', 1, 3, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(18, 'Stehag', 'Stehag description', 2, 3, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(19, 'Höör', 'Höör description', 3, 3, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(20, 'Fulltofta', 'Fulltofta description', 4, 3, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(21, 'Hörby', 'Hörby description', 5, 3, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(22, 'Långaröd', 'Långaröd description', 6, 3, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(23, 'Östraby', 'Östraby description', 7, 3, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(24, 'Hurva', 'Hurva description', 8, 3, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(25, 'Malmö', 'Malmö description', 1, 4, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(26, 'Lund', 'Lund description', 2, 4, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(27, 'Revingehed', 'Revingehed description', 3, 4, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(28, 'Svedala', 'Svedala description', 4, 4, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(29, 'Skurup', 'Skurup description', 5, 4, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(30, 'Smygehamn', 'Smygehamn description', 6, 4, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(31, 'Trelleborg', 'Trelleborg description', 7, 4, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(32, 'Höllviken', 'Höllviken description', 8, 4, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(33, 'Ystad', 'Ystad description', 1, 5, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(34, 'Sjöbo', 'Sjöbo description', 2, 5, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(35, 'Ravlunda', 'Ravlunda description', 3, 5, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(36, 'Kivik', 'Kivik description', 4, 5, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(37, 'Simrishamn', 'Simrishamn description', 5, 5, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(38, 'Hammenhög', 'Hammenhög description', 6, 5, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(39, 'Kåseberga', 'Kåseberga description', 7, 5, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(40, 'Tomelilla', 'Tomelilla description', 8, 5, '2018-01-11 17:08:14', '2018-01-11 17:08:14');

-- --------------------------------------------------------

--
-- Tabellstruktur `place_in_games`
--

CREATE TABLE `place_in_games` (
  `placeId` int(10) UNSIGNED NOT NULL,
  `gameId` int(10) UNSIGNED NOT NULL,
  `numberOfStars` int(11) DEFAULT NULL,
  `activeRound` tinyint(1) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumpning av Data i tabell `place_in_games`
--

INSERT INTO `place_in_games` (`placeId`, `gameId`, `numberOfStars`, `activeRound`, `updated_at`, `created_at`) VALUES
(1, 1, 1, NULL, '2018-01-11 17:08:14', '2018-01-11 17:08:14');

-- --------------------------------------------------------

--
-- Tabellstruktur `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer1` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer2` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer3` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer4` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correctAnswer` int(11) NOT NULL,
  `imageSource` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `videoSource` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `themeId` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumpning av Data i tabell `questions`
--

INSERT INTO `questions` (`id`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `correctAnswer`, `imageSource`, `videoSource`, `themeId`, `deleted_at`, `updated_at`, `created_at`) VALUES
(1, 'Vilka av följande gräsarter kan användas för att anlägga en klippt gräsmatta?', 'Tuvtåtel och Hakonegräs', 'Blåsvingel och Lampborstgräs', 'Rödsvingel och Ängsröe', 'Hakonegräs och Lampborstgräs', 3, 'theme1q1.jpg', NULL, 1, NULL, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(2, 'När bör gamla äppelträd helst beskäras?', 'Under JAS (juli, augusti, september)', 'Under vårvintern', 'När som helst på året', 'December till februari', 1, 't1q2.jpg', NULL, 1, NULL, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(3, 'Idag förknippar vi ofta boxbom med kyrkogårdar, men boxbom är en mycket gammal kulturväxt som användes som medicinalväxt i klostren. Var har den sitt ursprung?', 'Medelhavsländerna', 'Östasien, Indien', 'Sydamerika, Mexiko', 'Nordafrika', 2, 't1q3.jpg', NULL, 1, NULL, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(4, 'Vad heter programledaren som förknippades med trädgård under 80- och 90-talet? Starta filmklippet.', 'Bo Swensson', 'Bengt Swensson', 'Bengt Bedrup', 'Bertil Svensson', 4, NULL, 't1q4.mp4', 1, NULL, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(5, 'Den småblommiga polyantharosen på bilden kallas bl.a. Perle Rose och har sitt ursprung i Storbritanien under 30-talet. Den kallas även för...?', 'Coral Cluster', 'Brittania', 'Burbank', 'The Fairy', 4, 't1q5.jpg', NULL, 1, NULL, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(6, 'Liljor, akleja och rosor kan vi ha i trädgården. Vad heter sången som spelas?', 'Änglamark', 'Uti vår hage', 'Sjösala vals', 'Den blomstertid nu kommer', 2, NULL, 't1q6.mp4', 1, NULL, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(7, 'Vilken av följande växter nedan är inte giftig?', 'Gullregn', 'Odört', 'Malva', 'Fingerborgsblomma', 3, 't1q7.jpg', NULL, 1, NULL, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(8, 'Vad kan du tänka på när det är snö och is ute på vägarna?', 'Att inte gå ut alls', 'Att jag kan sätta broddar på skorna och isdubb på käppen', 'Att det är bättre att pulsa i djupsnö än att gå på vägen', 'Att gå försiktigt', 2, 't2q1.jpg', NULL, 2, NULL, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(9, 'Kalcium och D-vitamin behövs för att bygga upp och förhindra urkalkning av skelettet. Vilken mat innehåller mycket kalcium?', 'Skinka och korv', 'Mjukt och hårt bröd', 'Mjölk, yoghurt och ost', 'Kanelbullar, sockerkaka och veteskorpor', 3, 't2q2.jpg', NULL, 2, NULL, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(10, 'Orsakerna till yrsel kan vara många. Vad är sant gällande yrsel?', 'Man bör alltid kontakta sin vårdcentral för bedömning av bakomliggande orsak och eventuell behandling', 'Yrsel på äldre dar går inte att behandla', 'Yrsel minskar fallrisken eftersom man blir mer försiktig', 'Man kan röra sig försikigt så minskar risken för fall', 1, 't2q3.jpg', NULL, 2, NULL, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(11, 'Synen förändras när vi blir äldre. Exempelvis blir pupillen stelare och ögat får svårare att ställa om mellan ljus och mörker. Vad ska du tänka på gällande syn och fallrisk?', 'Att ha mörkt och mysigt hemma för att inte bli bländad', 'Att aldrig gå runt med läsglasögon på eftersom de försvårar avståndsbedömningen', 'Det är inte lönt att gå till optikern när man är gammal', 'Jag vet var allt finns hemma, så jag behöver inte se så bra', 2, 't2q4.jpg', NULL, 2, NULL, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(12, 'Vad är sant gällande träning på äldre dar?', 'Träning kan till exempel vara en promenad, dans, gå i trappor eller gymnastik', 'Det är för sent att börja träna när man är över 75 år', 'Att städa hemmet kan inte räknas som naturlig träning', 'Man behöver inte träna', 1, 't2q5.jpg', NULL, 2, NULL, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(13, 'Vilken är den vanligaste typen av fallolycka bland äldre?', 'Fall från hög höjd, till exempel stege eller köksstol', 'Fall i samband med träning', 'När man hämtar posten', 'Fall på markplan, exempelvis halkning, snubbling eller snavning', 4, 't2q6.jpg', NULL, 2, NULL, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(14, 'Vad kan du göra om du känner dig ostadig och rädd för att falla?', 'Undvika att gå ut', 'Sitta så mycket som möjligt inomhus', 'Ansöka om trygghetslarm', 'Använda käpp', 3, 't2q7.jpg', NULL, 2, NULL, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(15, 'När man är äldre och blir sjuk är det viktigt att man får i sig tillräckligt med energi och protein. Näringen behövs för att man skall återhämta sig så fort som möjligt efter sjukdom. Vilket mellanmål innehåller mest energi?', '1 bit sockerkaka', '1 äpple', '1 digestivekex med milda, prästost och marmelad', '1 kardemummaskorpa', 3, 't3q1.jpg', NULL, 3, NULL, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(16, 'När aptiten är dålig är det viktigt att...', 'Inte äta för ofta eftersom man ska bli så hungrig som möjligt inför måltid', 'Äta 3-4 mellanmål om dagen. Välj frukt eller smörgåsrån - de mättar inte så mycket', 'Äta 3-4 energirika mellanmål om dagen. Välj kex med dessertost, delikatessyoghurt, kräm med gräddmjölk eller nyponsoppa med biskvier och glass', 'Småäta lite hela tiden', 3, 't3q2.jpg', NULL, 3, NULL, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(17, 'Vilken mat innehåller mest D-vitamin?', '2 gaffelbitar inlagd sill', '1 kokt ägg', '10 gram berikat bordsmargarin', 'Mineralvatten', 1, 't3q3.jpg', NULL, 3, NULL, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(18, 'Är en färdiglagad maträtt (kyld eller fryst) ett bra alternativ till den hemmalagade maten?', 'Ja, om du är trött och inte orkar laga mat är det ett utmärkt alternativ', 'Nej, den innehåller ingen näring', 'Nej, den är för kalorifattig', 'Nej, den innehåller för många kalorier', 1, 't3q4.jpg', NULL, 3, NULL, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(19, 'När man är äldre och blir sjuk är det viktigt att man får i sig tillräckligt med energi och protein. Näringen behövs för att man skall återhämta sig så fort som möjligt efter sjukdom. Vilket mellanmål innehåller mest protein?', '1 banan', '1 bit (75g) ostkaka', '1 portion (75g) gräddglass', '1 tomat', 2, 't3q5.jpg', NULL, 3, NULL, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(20, 'Kalcium är nödvändigt för att bilda ben. Långvarig brist kan eventuellt ge benskörhet (osteoporos). Vilka är de bästa källorna för kalcium?', 'Kött', 'Grönsaker', 'Pasta', 'Mjölk och ost', 4, 't3q6.jpg', NULL, 3, NULL, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(21, 'Titta på filmklippet. Vilket alternativ är rätt?', '\"Åldersmagen\" är farlig', 'Man behöver inte mycket mat när man är gammal', 'Man behöver näringen i maten för att må bra', 'Det är bra att gå ner i vikt när man är gammal', 3, NULL, NULL, 3, NULL, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(22, 'Malmö allmänna sjukhus anlades på Slottsgatan 22 mitt emot Kungsparken i Malmö, år 1857. Det blev snabbt för litet med sina 67 platser och behovet blev stort för ett nytt större sjukhus. Det nya Allmänna sjukhuset anlades på Södra Förstadsgatan längs med Malmö – Ystad järnvägen. Vilket år invigdes Allmänna sjukhuset?', '1867', '1896', '1908', '1930', 2, 't4q1.jpg', NULL, 4, NULL, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(23, 'Under 2014 döptes alla gatorna inom sjukhusområdet och en av gatorna fick namn efter den förste sjukhusdirektören. Vad hette han?', 'Fritz Bauer', 'Carl-Bertil Laurell', 'Jan G Waldenström', 'Helge B Wulff', 1, 't4q2.jpg', NULL, 4, NULL, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(24, 'Ruth Lundskog fick en gata på sjukhusområdet uppkallad efter sig. Vem var denna kvinna?', 'Sjuksköterska på MAS, 1913-1943. Uppskattad för sitt medmänskliga sätt.', 'Sjuksköterska som belönades med kunglig guldmedalj.', 'Sjuksköterska som 1959 var med och startade Malmö Sjuksköterskeskola.', 'Sjuksköterska och filosofie doktor.', 1, 't4q3.jpg', NULL, 4, NULL, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(25, 'På MAS finns det många vackra skulpturer med små springvatten som tillsammans med växter skulle skapa ro och avkoppling hos patienterna när de vistades på sjukhusområdet.Vad heter skulpturen på bilden?', 'Hälsokällan. konstnär Anders Olsson 1914', 'Flicka med fågel, konstnär Ivar Johansson 1963', 'Pluvius, konstnär Thure Thörn, 1970', 'Flicka vid källa, Ivar Ålenius-Björk, 1963', 2, 't4q4.jpg', NULL, 4, NULL, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(26, 'Det i folkmun kallat ”Runda huset” är den senaste sjukhusbyggnaden på SUS. Vilken viktig mottagning ligger i byggnaden?', 'Infektionsmottagning', 'Medicinens mottagning', 'Akutmottagning', 'Kirurgens mottagning', 3, 't4q5.jpg', NULL, 4, NULL, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(27, 'Kärt barn har många namn. Först var det Malmö Allmänna sjukhus (MAS), sedan Universitetssjukhuset MAS och nu heter sjukhuset, som blev sammanslaget med Lunds Universitetssjukhus, Skånes Universitetssjukhus (SUS). Vilket år slogs sjukhusen ihop?', '2008', '2010', '2012', '2013', 2, 't4q6.jpg', NULL, 4, NULL, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(28, 'Hennes forskning om blodets koagulationsmekanismer gav Malmökliniken internationellt rykte redan 1956. En pionjär som behandlade blödarsjuka. 2012 uppkallades en gata på SUS efter henne. Vem var hon?', 'Inga Marie Nilsson', 'Florence Nightingale', 'Kristina Nilsson', 'Charlotte Stölten', 1, 't4q7.jpg', NULL, 4, NULL, '2018-01-11 17:08:14', '2018-01-11 17:08:14');

-- --------------------------------------------------------

--
-- Tabellstruktur `question_in_games`
--

CREATE TABLE `question_in_games` (
  `questionId` int(10) UNSIGNED NOT NULL,
  `gameId` int(10) UNSIGNED NOT NULL,
  `isAnswered` tinyint(1) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumpning av Data i tabell `question_in_games`
--

INSERT INTO `question_in_games` (`questionId`, `gameId`, `isAnswered`, `updated_at`, `created_at`) VALUES
(1, 1, 1, '2018-01-11 17:08:14', '2018-01-11 17:08:14');

-- --------------------------------------------------------

--
-- Tabellstruktur `stations`
--

CREATE TABLE `stations` (
  `id` int(10) UNSIGNED NOT NULL,
  `imageSource` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wardId` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumpning av Data i tabell `stations`
--

INSERT INTO `stations` (`id`, `imageSource`, `wardId`, `updated_at`, `created_at`) VALUES
(1, 'geS3F1ocIo', 1, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(2, 'pX1mLpiOvk', 1, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(3, 's9ORRLpATa', 1, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(4, 'umqVFyWBFP', 1, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(5, 'MRxFW7BBKJ', 1, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(6, 'Pr2JPqD8fm', 1, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(7, 'QeZ293DW57', 1, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(8, 'SgidN0aQcZ', 1, '2018-01-11 17:08:14', '2018-01-11 17:08:14');

-- --------------------------------------------------------

--
-- Tabellstruktur `statistics`
--

CREATE TABLE `statistics` (
  `patientId` int(10) UNSIGNED NOT NULL,
  `hasGoneHome` tinyint(1) DEFAULT NULL,
  `dayAmount` int(11) DEFAULT NULL,
  `wasEasyToPlay` tinyint(1) DEFAULT NULL,
  `explainWhy` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur `themes`
--

CREATE TABLE `themes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumpning av Data i tabell `themes`
--

INSERT INTO `themes` (`id`, `name`, `isActive`, `updated_at`, `created_at`) VALUES
(1, 'Trädgård', 1, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(2, 'Fall', 1, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(3, 'Kost', 1, '2018-01-11 17:08:14', '2018-01-11 17:08:14'),
(4, 'SUS i tiden', 1, '2018-01-11 17:08:14', '2018-01-11 17:08:14');

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN-1', 'walkthewardteam@gmail.com', '$2y$10$XmsEprtJRf0W26j93TzIN.dnx/7IAMBGeq4qZJJYlJyQf1pqfaANC', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellstruktur `wards`
--

CREATE TABLE `wards` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imageSource` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumpning av Data i tabell `wards`
--

INSERT INTO `wards` (`id`, `name`, `address`, `description`, `imageSource`, `updated_at`, `created_at`) VALUES
(1, 'Medicinavdelning 2', 'Jan Waldenströms gata 11 A, plan 2, Malmö', 'Här vårdar vi dig som är multisjuk, med blandade svikt- och sjukdomstillstånd.', NULL, '2018-01-11 17:08:14', '2018-01-11 17:08:14');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `areas_mapid_foreign` (`mapId`);

--
-- Index för tabell `bonus_games`
--
ALTER TABLE `bonus_games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bonus_games_placeid_foreign` (`placeId`);

--
-- Index för tabell `bonus_game_in_games`
--
ALTER TABLE `bonus_game_in_games`
  ADD PRIMARY KEY (`bonusGameId`,`gameId`),
  ADD KEY `bonus_game_in_games_gameid_foreign` (`gameId`);

--
-- Index för tabell `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `exercises_in_games`
--
ALTER TABLE `exercises_in_games`
  ADD PRIMARY KEY (`exerciseId`,`gameId`),
  ADD KEY `exercises_in_games_gameid_foreign` (`gameId`);

--
-- Index för tabell `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `games_areaid_foreign` (`areaId`),
  ADD KEY `games_themeid_foreign` (`themeId`);

--
-- Index för tabell `maps`
--
ALTER TABLE `maps`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index för tabell `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patients_gameid_foreign` (`gameId`),
  ADD KEY `patients_characterid_foreign` (`characterId`),
  ADD KEY `patients_wardid_foreign` (`wardId`);

--
-- Index för tabell `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `places_stationid_foreign` (`stationId`),
  ADD KEY `places_areaid_foreign` (`areaId`);

--
-- Index för tabell `place_in_games`
--
ALTER TABLE `place_in_games`
  ADD PRIMARY KEY (`placeId`,`gameId`),
  ADD KEY `place_in_games_gameid_foreign` (`gameId`);

--
-- Index för tabell `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_themeid_foreign` (`themeId`);

--
-- Index för tabell `question_in_games`
--
ALTER TABLE `question_in_games`
  ADD PRIMARY KEY (`questionId`,`gameId`),
  ADD KEY `question_in_games_gameid_foreign` (`gameId`);

--
-- Index för tabell `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stations_wardid_foreign` (`wardId`);

--
-- Index för tabell `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`patientId`);

--
-- Index för tabell `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index för tabell `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT för tabell `bonus_games`
--
ALTER TABLE `bonus_games`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT för tabell `characters`
--
ALTER TABLE `characters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT för tabell `exercises`
--
ALTER TABLE `exercises`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT för tabell `games`
--
ALTER TABLE `games`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT för tabell `maps`
--
ALTER TABLE `maps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT för tabell `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT för tabell `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `places`
--
ALTER TABLE `places`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT för tabell `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT för tabell `stations`
--
ALTER TABLE `stations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT för tabell `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT för tabell `wards`
--
ALTER TABLE `wards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `areas_mapid_foreign` FOREIGN KEY (`mapId`) REFERENCES `maps` (`id`);

--
-- Restriktioner för tabell `bonus_games`
--
ALTER TABLE `bonus_games`
  ADD CONSTRAINT `bonus_games_placeid_foreign` FOREIGN KEY (`placeId`) REFERENCES `places` (`id`);

--
-- Restriktioner för tabell `bonus_game_in_games`
--
ALTER TABLE `bonus_game_in_games`
  ADD CONSTRAINT `bonus_game_in_games_bonusgameid_foreign` FOREIGN KEY (`bonusGameId`) REFERENCES `bonus_games` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bonus_game_in_games_gameid_foreign` FOREIGN KEY (`gameId`) REFERENCES `games` (`id`);

--
-- Restriktioner för tabell `exercises_in_games`
--
ALTER TABLE `exercises_in_games`
  ADD CONSTRAINT `exercises_in_games_exerciseid_foreign` FOREIGN KEY (`exerciseId`) REFERENCES `exercises` (`id`),
  ADD CONSTRAINT `exercises_in_games_gameid_foreign` FOREIGN KEY (`gameId`) REFERENCES `games` (`id`);

--
-- Restriktioner för tabell `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_areaid_foreign` FOREIGN KEY (`areaId`) REFERENCES `areas` (`id`),
  ADD CONSTRAINT `games_themeid_foreign` FOREIGN KEY (`themeId`) REFERENCES `themes` (`id`);

--
-- Restriktioner för tabell `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_characterid_foreign` FOREIGN KEY (`characterId`) REFERENCES `characters` (`id`),
  ADD CONSTRAINT `patients_gameid_foreign` FOREIGN KEY (`gameId`) REFERENCES `games` (`id`),
  ADD CONSTRAINT `patients_wardid_foreign` FOREIGN KEY (`wardId`) REFERENCES `wards` (`id`);

--
-- Restriktioner för tabell `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_areaid_foreign` FOREIGN KEY (`areaId`) REFERENCES `areas` (`id`),
  ADD CONSTRAINT `places_stationid_foreign` FOREIGN KEY (`stationId`) REFERENCES `stations` (`id`);

--
-- Restriktioner för tabell `place_in_games`
--
ALTER TABLE `place_in_games`
  ADD CONSTRAINT `place_in_games_gameid_foreign` FOREIGN KEY (`gameId`) REFERENCES `games` (`id`),
  ADD CONSTRAINT `place_in_games_placeid_foreign` FOREIGN KEY (`placeId`) REFERENCES `places` (`id`);

--
-- Restriktioner för tabell `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_themeid_foreign` FOREIGN KEY (`themeId`) REFERENCES `themes` (`id`);

--
-- Restriktioner för tabell `question_in_games`
--
ALTER TABLE `question_in_games`
  ADD CONSTRAINT `question_in_games_gameid_foreign` FOREIGN KEY (`gameId`) REFERENCES `games` (`id`),
  ADD CONSTRAINT `question_in_games_questionid_foreign` FOREIGN KEY (`questionId`) REFERENCES `questions` (`id`);

--
-- Restriktioner för tabell `stations`
--
ALTER TABLE `stations`
  ADD CONSTRAINT `stations_wardid_foreign` FOREIGN KEY (`wardId`) REFERENCES `wards` (`id`);

--
-- Restriktioner för tabell `statistics`
--
ALTER TABLE `statistics`
  ADD CONSTRAINT `statistics_patientid_foreign` FOREIGN KEY (`patientId`) REFERENCES `patients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
