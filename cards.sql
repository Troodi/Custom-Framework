-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 14 2021 г., 17:19
-- Версия сервера: 8.0.19
-- Версия PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `task`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cards`
--

CREATE TABLE `cards` (
  `id` int NOT NULL,
  `cover` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_album` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_artist` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `release` timestamp NOT NULL,
  `duration` int NOT NULL,
  `buy` timestamp NOT NULL,
  `cost` double NOT NULL,
  `storage_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cards`
--

INSERT INTO `cards` (`id`, `cover`, `title_album`, `title_artist`, `release`, `duration`, `buy`, `cost`, `storage_code`) VALUES
(2, 'https://www.zastavki.com/pictures/286x180/2015/Backgrounds_Red_meteors_on_a_black_background_095964_32.png', 'Album', 'Artist', '2021-08-11 12:29:51', 23, '0000-00-00 00:00:00', 100.3, '1:2:3'),
(7, 'https://www.zastavki.com/pictures/286x180/2015/Backgrounds_Red_meteors_on_a_black_background_095964_32.png', 'Название', 'Артист', '2021-08-11 12:29:51', 23, '2021-08-11 12:29:51', 1999, '3:2:1'),
(8, 'https://www.zastavki.com/pictures/286x180/2015/Backgrounds_Red_meteors_on_a_black_background_095964_32.png', 'Название', 'Артист', '2021-08-11 12:29:51', 23, '2021-08-11 12:29:51', 1999, '3:3:3'),
(9, 'https://www.zastavki.com/pictures/286x180/2015/Backgrounds_Red_meteors_on_a_black_background_095964_32.png', 'Название', 'Артист', '2021-08-11 12:29:51', 23, '2021-08-11 12:29:51', 1999, '9:9:0'),
(10, 'https://www.zastavki.com/pictures/286x180/2015/Backgrounds_Red_meteors_on_a_black_background_095964_32.png', 'Название', 'Артист', '2021-08-11 12:29:51', 11, '2021-08-11 12:29:51', 111, '1:1:1'),
(11, 'https://www.zastavki.com/pictures/286x180/2015/Backgrounds_Red_meteors_on_a_black_background_095964_32.png', 'Названиеeeeeeeeeeeee2', 'Артист', '2021-08-11 12:29:51', 111, '2021-08-11 12:29:51', 123123, '1:1:1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
