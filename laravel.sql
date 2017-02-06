-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Фев 06 2017 г., 10:28
-- Версия сервера: 10.1.19-MariaDB
-- Версия PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `laravel`
--

-- --------------------------------------------------------

--
-- Структура таблицы `budgets`
--

CREATE TABLE `budgets` (
  `id` int(10) UNSIGNED NOT NULL,
  `organisation_id` smallint(6) NOT NULL,
  `catalog_id` smallint(6) NOT NULL,
  `value` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `budgets`
--

INSERT INTO `budgets` (`id`, `organisation_id`, `catalog_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 9, 2, 41179, '2016-12-13 21:49:50', '2016-12-13 21:49:50'),
(2, 9, 8, 28526, '2016-12-13 21:49:50', '2016-12-13 21:49:50'),
(3, 1, 22, 48974, '2016-12-13 21:49:50', '2016-12-13 21:49:50'),
(4, 2, 2, 52162, '2016-12-13 21:49:50', '2016-12-13 21:49:50'),
(5, 9, 8, 44742, '2016-12-13 21:49:50', '2016-12-13 21:49:50'),
(6, 4, 7, 49391, '2016-12-13 21:49:50', '2016-12-13 21:49:50'),
(7, 4, 7, 35722, '2016-12-13 21:49:50', '2016-12-13 21:49:50'),
(8, 9, 5, 15039, '2016-12-13 21:49:50', '2016-12-13 21:49:50'),
(9, 5, 4, 40751, '2016-12-13 21:49:50', '2016-12-13 21:49:50'),
(10, 3, 8, 41596, '2016-12-13 21:49:50', '2016-12-13 21:49:50'),
(11, 9, 2, 24027, '2016-12-13 21:49:50', '2016-12-13 21:49:50'),
(12, 5, 9, 41131, '2016-12-13 21:49:50', '2016-12-13 21:49:50'),
(13, 6, 9, 40794, '2016-12-13 21:49:50', '2016-12-13 21:49:50'),
(14, 2, 2, 49841, '2016-12-13 21:49:50', '2016-12-13 21:49:50'),
(15, 3, 5, 12225, '2016-12-13 21:49:50', '2016-12-13 21:49:50'),
(16, 4, 7, 2975, '2016-12-13 21:49:50', '2016-12-13 21:49:50'),
(18, 9, 7, 39360, '2016-12-13 21:49:50', '2016-12-13 21:49:50'),
(19, 9, 8, 25150, '2016-12-13 21:49:50', '2016-12-13 21:49:50'),
(20, 7, 3, 11476, '2016-12-13 21:49:50', '2016-12-13 21:49:50'),
(21, 5, 3, 19886, '2016-12-13 21:49:50', '2016-12-13 21:49:50'),
(22, 2, 2, 1878, '2016-12-13 21:49:50', '2016-12-13 21:49:50'),
(23, 7, 18, 8175, '2016-12-13 21:49:51', '2016-12-13 21:49:51'),
(24, 3, 1, 45122, '2016-12-13 21:49:51', '2016-12-13 21:49:51'),
(26, 2, 9, 8571, '2016-12-13 21:49:51', '2016-12-13 21:49:51'),
(27, 5, 5, 39103, '2016-12-13 21:49:51', '2016-12-13 21:49:51'),
(28, 5, 9, 2926, '2016-12-13 21:49:51', '2016-12-13 21:49:51'),
(30, 4, 3, 51162, '2016-12-13 21:49:51', '2016-12-13 21:49:51'),
(31, 9, 6, 10336, '2016-12-13 21:49:51', '2016-12-13 21:49:51'),
(32, 4, 9, 22293, '2016-12-13 21:49:51', '2016-12-13 21:49:51'),
(33, 9, 5, 30367, '2016-12-13 21:49:51', '2016-12-13 21:49:51'),
(34, 1, 3, 41923, '2016-12-13 21:49:51', '2016-12-13 21:49:51'),
(36, 5, 1, 2242, '2016-12-13 21:49:51', '2016-12-13 21:49:51'),
(37, 1, 18, 33100, '2016-12-13 21:49:51', '2016-12-13 21:49:51'),
(38, 6, 1, 25541, '2016-12-13 21:49:51', '2016-12-13 21:49:51'),
(39, 5, 6, 5462, '2016-12-13 21:49:51', '2016-12-13 21:49:51'),
(41, 9, 8, 15039, '2016-12-13 21:49:51', '2016-12-13 21:49:51'),
(42, 3, 3, 20234, '2016-12-13 21:49:51', '2016-12-13 21:49:51'),
(43, 3, 8, 52526, '2016-12-13 21:49:51', '2016-12-13 21:49:51'),
(44, 7, 22, 49145, '2016-12-13 21:49:51', '2016-12-13 21:49:51'),
(45, 7, 23, 40746, '2016-12-13 21:49:51', '2016-12-13 21:49:51'),
(46, 4, 8, 17719, '2016-12-13 21:49:51', '2016-12-13 21:49:51'),
(47, 8, 2, 33277, '2016-12-13 21:49:51', '2016-12-13 21:49:51'),
(48, 9, 9, 46582, '2016-12-13 21:49:52', '2016-12-13 21:49:52'),
(49, 9, 5, 42340, '2016-12-13 21:49:52', '2016-12-13 21:49:52'),
(50, 1, 23, 36203, '2016-12-13 21:49:52', '2016-12-13 21:49:52');

-- --------------------------------------------------------

--
-- Структура таблицы `catalogs`
--

CREATE TABLE `catalogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `catalogs`
--

INSERT INTO `catalogs` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'enimCatalog', '2016-12-13 21:49:45', '2016-12-13 21:49:45'),
(2, 'illoCatalog', '2016-12-13 21:49:45', '2016-12-13 21:49:45'),
(3, 'eaCatalog', '2016-12-13 21:49:46', '2016-12-13 21:49:46'),
(4, 'eaCatalog', '2016-12-13 21:49:46', '2016-12-13 21:49:46'),
(5, 'Справочник статей бюджета', '2016-12-13 21:49:46', '2016-12-13 21:49:46'),
(6, 'Справочник типов договоров', '2016-12-13 21:49:46', '2016-12-13 21:49:46'),
(7, 'Справочник подрядчиков', '2016-12-13 21:49:46', '2016-12-13 21:49:46'),
(8, 'Справочник периодов оплаты по договорам', '2016-12-13 21:49:46', '2016-12-13 21:49:46'),
(9, 'Справочник лицензий', '2016-12-13 21:49:46', '2016-12-13 21:49:46');

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_items`
--

CREATE TABLE `catalog_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `catalog_id` smallint(6) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `catalog_items`
--

INSERT INTO `catalog_items` (`id`, `catalog_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 8, 'Ежегодно', 'It was opened by another footman in livery came running out of the tale was something like it,''.', '2016-12-13 21:49:46', '2016-12-13 21:49:46'),
(2, 6, 'Техподдержка', 'I''ve finished.'' So they couldn''t see it?'' So she swallowed one of the court," and I had not long.', '2016-12-13 21:49:46', '2016-12-13 21:49:46'),
(3, 5, 'Запчасти, расходные материалы', 'Gryphon. ''I''ve forgotten the Duchess sang the second time round, she came upon a low trembling.', '2016-12-13 21:49:46', '2016-12-13 21:49:46'),
(4, 6, 'Разработка ПО', 'Queen: so she began nibbling at the house, "Let us both go to law: I will just explain to you.', '2016-12-13 21:49:46', '2016-12-13 21:49:46'),
(5, 9, 'Галактика', 'Mock Turtle. ''No, no! The adventures first,'' said the March Hare said to the Knave of Hearts, and.', '2016-12-13 21:49:46', '2016-12-13 21:49:46'),
(6, 7, 'Атвинта', 'VERY deeply with a kind of serpent, that''s all I can remember feeling a little way forwards each.', '2016-12-13 21:49:46', '2016-12-13 21:49:46'),
(7, 3, 'soft_earum', 'Alice herself, and once she remembered trying to explain the mistake it had a wink of sleep these.', '2016-12-13 21:49:46', '2016-12-13 21:49:46'),
(8, 6, 'Обслуживание учетной системы', 'White Rabbit with pink eyes ran close by her. There was no label this time with one finger for the.', '2016-12-13 21:49:46', '2016-12-13 21:49:46'),
(9, 3, 'soft_non', 'I think I can creep under the hedge. In another moment it was only the pepper that had fluttered.', '2016-12-13 21:49:46', '2016-12-13 21:49:46'),
(10, 9, 'MS Office', 'The Mouse only shook its head to keep herself from being broken. She hastily put down the little.', '2016-12-13 21:49:46', '2016-12-13 21:49:46'),
(11, 1, 'soft_recusandae', 'Lobster Quadrille is!'' ''No, indeed,'' said Alice. ''Anything you like,'' said the Gryphon: and it put.', '2016-12-13 21:49:46', '2016-12-13 21:49:46'),
(12, 7, 'Финтех', 'Gryphon, ''you first form into a line along the course, here and there. There was not going to.', '2016-12-13 21:49:47', '2016-12-13 21:49:47'),
(13, 2, 'soft_aut', 'I will prosecute YOU.--Come, I''ll take no denial; We must have prizes.'' ''But who is Dinah, if I.', '2016-12-13 21:49:47', '2016-12-13 21:49:47'),
(14, 9, '1с', 'King. The next thing is, to get out again. The Mock Turtle to the whiting,'' said the Duchess: ''and.', '2016-12-13 21:49:47', '2016-12-13 21:49:47'),
(15, 8, 'Единоразовая оплата', 'Hare, who had been all the arches are gone from this side of the room. The cook threw a frying-pan.', '2016-12-13 21:49:47', '2016-12-13 21:49:47'),
(16, 1, 'soft_veritatis', 'Eaglet, and several other curious creatures. Alice led the way, was the only difficulty was, that.', '2016-12-13 21:49:47', '2016-12-13 21:49:47'),
(17, 3, 'soft_et', 'I suppose.'' So she went down on one side, to look about her any more if you''d like it very hard.', '2016-12-13 21:49:47', '2016-12-13 21:49:47'),
(18, 5, 'Обучение специалистов', 'Hatter. ''Nor I,'' said the Footman, ''and that for the Duchess sneezed occasionally; and as it.', '2016-12-13 21:49:47', '2016-12-13 21:49:47'),
(19, 9, 'Eset NOD32', 'EVER happen in a louder tone. ''ARE you to offer it,'' said the Duchess, ''and that''s the jury, of.', '2016-12-13 21:49:47', '2016-12-13 21:49:47'),
(20, 8, 'Ежемесячно', 'I do,'' said the Dormouse, without considering at all this time. ''I want a clean cup,'' interrupted.', '2016-12-13 21:49:47', '2016-12-13 21:49:47'),
(21, 7, 'Касперский', 'Shall I try the thing at all. However, ''jury-men'' would have done just as if it likes.'' ''I''d.', '2016-12-13 21:49:47', '2016-12-13 21:49:47'),
(22, 5, 'Программное обеспечение', 'Don''t go splashing paint over me like a wild beast, screamed ''Off with his nose Trims his belt and.', '2016-12-13 21:49:47', '2016-12-13 21:49:47'),
(23, 5, 'Оборудование', 'Alice. ''Why, you don''t even know what to uglify is, you ARE a simpleton.'' Alice did not at all for.', '2016-12-13 21:49:47', '2016-12-13 21:49:47'),
(24, 7, 'Элефант', 'Alice knew it was too dark to see if she meant to take out of sight, he said in a sorrowful tone;.', '2016-12-13 21:49:47', '2016-12-13 21:49:47'),
(25, 4, 'soft_maxime', 'SHE, of course,'' said the Mock Turtle, capering wildly about. ''Change lobsters again!'' yelled the.', '2016-12-13 21:49:47', '2016-12-13 21:49:47'),
(26, 2, 'soft_pariatur', 'Dodo. Then they all crowded round her, about four inches deep and reaching half down the little.', '2016-12-13 21:49:47', '2016-12-13 21:49:47'),
(27, 8, 'Ежеквартально', 'I didn''t know that Cheshire cats always grinned; in fact, I didn''t know that cats COULD grin.''.', '2016-12-13 21:49:47', '2016-12-13 21:49:47'),
(28, 4, 'soft_mollitia', 'When the Mouse had changed his mind, and was beating her violently with its arms and frowning at.', '2016-12-13 21:49:48', '2016-12-13 21:49:48'),
(29, 7, 'ООО ЦИТ', 'I learn music.'' ''Ah! that accounts for it,'' said the voice. ''Fetch me my gloves this moment!'' Then.', '2016-12-13 21:49:48', '2016-12-13 21:49:48'),
(30, 1, 'soft_deleniti', 'Mock Turtle sighed deeply, and began, in rather a handsome pig, I think.'' And she began shrinking.', '2016-12-13 21:49:48', '2016-12-13 21:49:48');

-- --------------------------------------------------------

--
-- Структура таблицы `contracts`
--

CREATE TABLE `contracts` (
  `id` int(10) UNSIGNED NOT NULL,
  `organisation_id` smallint(6) NOT NULL,
  `pay_method` smallint(6) NOT NULL,
  `contractor` smallint(6) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `pay_period` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `specialist` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `scan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `contracts`
--

INSERT INTO `contracts` (`id`, `organisation_id`, `pay_method`, `contractor`, `name`, `value`, `pay_period`, `create_date`, `specialist`, `comment`, `scan`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 6, 'Договор №349', 37439, 2, '2001-07-21', 'Rossie McLaughlin', 'Nihil eos dicta aut facere.', NULL, '2016-12-13 21:49:54', '2016-12-13 21:49:54'),
(2, 1, 3, 1, 'Договор №42', 49702, 2, '1974-03-07', 'Mr. Tracey Schumm DVM', 'Inventore dolorem odit minima.', NULL, '2016-12-13 21:49:54', '2016-12-13 21:49:54'),
(3, 4, 7, 8, 'Договор №299', 18832, 1, '1992-05-05', 'Wiley Witting MD', 'Quia saepe quo labore.', NULL, '2016-12-13 21:49:54', '2016-12-13 21:49:54'),
(4, 3, 4, 6, 'Договор №106', 2552, 2, '2005-04-22', 'Lola Schuppe', 'At ut amet hic eum esse eum.', NULL, '2016-12-13 21:49:54', '2016-12-13 21:49:54'),
(5, 8, 6, 1, 'Договор №384', 36514, 1, '1986-08-21', 'Consuelo Spinka IV', 'Sint numquam aut qui quia aliquid.', NULL, '2016-12-13 21:49:54', '2016-12-13 21:49:54'),
(6, 2, 2, 8, 'Договор №33', 34625, 2, '2006-11-17', 'Kaycee Pagac', 'Sapiente sit sit omnis.', NULL, '2016-12-13 21:49:54', '2016-12-13 21:49:54'),
(7, 2, 8, 29, 'Договор №10', 26274, 1, '1984-03-24', 'Sanford Konopelski DDS', 'Et reiciendis beatae magni earum.', 'files/uploads/1b434ab99b3a26d460bfbb2a9d8272b1.pdf', '2016-12-13 21:49:54', '2016-12-13 23:21:55'),
(8, 8, 2, 8, 'Договор №60', 41848, 1, '2000-01-13', 'Shanie Powlowski', 'Sed facilis in assumenda soluta.', NULL, '2016-12-13 21:49:55', '2016-12-13 21:49:55'),
(9, 7, 8, 29, 'Договор №149', 17692, 27, '1971-08-02', 'Bruce Steuber DVM', 'Nobis aut ut natus officia.', 'files/uploads/d778f1b6a79413cca6e7ef4a1aa470be.jpg', '2016-12-13 21:49:55', '2017-01-20 00:03:50'),
(10, 3, 8, 5, 'Договор №249', 11176, 2, '1990-10-20', 'Jed Haley', 'Quam qui cumque qui quia.', NULL, '2016-12-13 21:49:55', '2016-12-13 21:49:55'),
(11, 5, 2, 5, 'Договор №195', 24642, 1, '1991-01-24', 'Prof. Tyrel Sporer', 'Sed harum sit nesciunt rerum.', NULL, '2016-12-13 21:49:55', '2016-12-13 21:49:55'),
(12, 7, 8, 12, 'Договор №165', 33860, 1, '2011-07-03', 'Ms. Marjolaine Mosciski DVM', 'Amet dignissimos qui aut.', 'files/uploads/59ec2b52c975507ca8d29b4642ba74cd.xlsx', '2016-12-13 21:49:55', '2016-12-14 02:19:39'),
(13, 8, 1, 6, 'Договор №34', 22358, 2, '1996-05-04', 'Kitty Gusikowski', 'Et voluptas excepturi ullam.', NULL, '2016-12-13 21:49:55', '2016-12-13 21:49:55'),
(14, 4, 5, 6, 'Договор №273', 861, 2, '1989-07-12', 'Maci Orn', 'Ea enim reprehenderit sed id.', NULL, '2016-12-13 21:49:55', '2016-12-13 21:49:55'),
(16, 3, 5, 4, 'Договор №325', 39841, 1, '1989-10-25', 'Ms. Hannah Leffler', 'Atque sit quam mollitia illo illo.', NULL, '2016-12-13 21:49:55', '2016-12-13 21:49:55'),
(17, 4, 9, 1, 'Договор №214', 12428, 2, '2012-11-06', 'Arch Brown', 'Expedita sint quia necessitatibus.', NULL, '2016-12-13 21:49:55', '2016-12-13 21:49:55'),
(19, 9, 3, 7, 'Договор №384', 35000, 1, '1991-01-25', 'Oleta McDermott', 'Et amet error culpa ducimus.', NULL, '2016-12-13 21:49:55', '2016-12-13 21:49:55'),
(20, 6, 1, 5, 'Договор №233', 41580, 2, '1977-10-13', 'Dr. Gunner Becker Jr.', 'Illo ratione sint non vitae dicta.', NULL, '2016-12-13 21:49:55', '2016-12-13 21:49:55'),
(21, 4, 4, 7, 'Договор №219', 29302, 1, '1983-10-01', 'Dr. Michel Aufderhar', 'Et cum et distinctio sunt et.', NULL, '2016-12-13 21:49:55', '2016-12-13 21:49:55'),
(22, 2, 8, 29, 'Договор №10', 26274, 1, '1984-03-24', 'Sanford Konopelski DDS', 'Et reiciendis beatae magni earum.', 'C:\\xampp\\tmp\\phpA5CB.tmp', '2016-12-13 21:49:55', '2016-12-13 22:07:11'),
(23, 5, 6, 5, 'Договор №245', 9609, 1, '1990-05-05', 'Audie Cummerata', 'Quis quia ex odio enim.', NULL, '2016-12-13 21:49:55', '2016-12-13 21:49:55'),
(24, 3, 6, 2, 'Договор №224', 47353, 1, '1971-10-24', 'Dannie Schmidt', 'Maxime iure labore molestias eum.', NULL, '2016-12-13 21:49:55', '2016-12-13 21:49:55'),
(25, 8, 1, 1, 'Договор №222', 34893, 2, '1995-10-19', 'Jammie Hermiston', 'Non minima dolor animi aut.', NULL, '2016-12-13 21:49:55', '2016-12-13 21:49:55'),
(26, 8, 2, 4, 'Договор №398', 25578, 1, '1984-05-05', 'Loren Grady', 'Est et doloremque voluptates.', NULL, '2016-12-13 21:49:55', '2016-12-13 21:49:55'),
(27, 1, 6, 3, 'Договор №112', 10181, 1, '2014-04-05', 'Maia Labadie', 'Ad quas et libero ut animi.', NULL, '2016-12-13 21:49:55', '2016-12-13 21:49:55'),
(28, 8, 8, 9, 'Договор №419', 38953, 2, '2003-03-15', 'Golda Morissette DVM', 'Pariatur quia facere quia ex.', NULL, '2016-12-13 21:49:55', '2016-12-13 21:49:55'),
(32, 2, 4, 29, 'Договор №294', 24658, 1, '1984-03-13', 'Kaia Purdy', 'Laborum doloremque et libero.', 'files/uploads/9561a7536959aacaab54bc7ed3ad95f2.jpg', '2016-12-13 21:49:55', '2017-01-19 23:43:43'),
(33, 8, 4, 6, 'Договор №281', 45357, 1, '2014-12-15', 'Sally Yost II', 'Magni iusto laboriosam error.', NULL, '2016-12-13 21:49:55', '2016-12-13 21:49:55'),
(35, 9, 8, 4, 'Договор №348', 16403, 2, '2014-08-18', 'Keyshawn Predovic III', 'Molestiae sint a ipsum illum non.', NULL, '2016-12-13 21:49:56', '2016-12-13 21:49:56'),
(36, 8, 7, 8, 'Договор №400', 39226, 2, '2000-10-26', 'Cierra Gislason', 'Officia rerum aut non qui.', NULL, '2016-12-13 21:49:56', '2016-12-13 21:49:56'),
(37, 3, 7, 6, 'Договор №40', 567, 2, '1972-06-13', 'Maddison Gusikowski', 'Mollitia hic quis doloribus vel.', NULL, '2016-12-13 21:49:56', '2016-12-13 21:49:56'),
(38, 2, 3, 6, 'Договор №135', 42746, 1, '1974-08-05', 'Demario Roob DDS', 'Soluta cum dolores aut dolore.', NULL, '2016-12-13 21:49:56', '2016-12-13 21:49:56'),
(39, 3, 2, 2, 'Договор №206', 51842, 2, '1976-12-16', 'Houston Gorczany', 'Eum voluptatibus molestias est.', NULL, '2016-12-13 21:49:56', '2016-12-13 21:49:56'),
(40, 5, 6, 9, 'Договор №212', 37964, 2, '1989-10-02', 'Jayme Jakubowski', 'Sunt sed et unde et.', NULL, '2016-12-13 21:49:56', '2016-12-13 21:49:56'),
(41, 6, 6, 1, 'Договор №67', 4087, 1, '1979-03-29', 'Amir Hintz', 'Quo quia aperiam qui fugiat.', NULL, '2016-12-13 21:49:56', '2016-12-13 21:49:56'),
(42, 6, 1, 6, 'Договор №48', 38333, 1, '2000-06-11', 'Dr. Shania Dooley', 'Et dolores quia voluptas.', NULL, '2016-12-13 21:49:56', '2016-12-13 21:49:56'),
(43, 9, 6, 2, 'Договор №338', 13931, 2, '1999-03-25', 'Tito Gottlieb', 'Omnis ipsum consequuntur quo.', NULL, '2016-12-13 21:49:56', '2016-12-13 21:49:56'),
(44, 7, 4, 6, 'Договор №283', 1132670, 15, '2016-11-09', 'Jamel O''Hara', 'Autem est animi qui eaque quas.', 'files/uploads/6e4a416c1831ead01195e8aa7df5b740.jpg', '2016-12-13 21:49:56', '2017-01-19 23:37:15'),
(45, 3, 5, 3, 'Договор №322', 44341, 2, '2012-08-27', 'Brady Purdy', 'Id enim sit vero totam.', NULL, '2016-12-13 21:49:56', '2016-12-13 21:49:56'),
(46, 5, 6, 3, 'Договор №307', 7324, 2, '1985-04-17', 'Mrs. Marquise Dooley', 'Ab velit reprehenderit et.', NULL, '2016-12-13 21:49:56', '2016-12-13 21:49:56'),
(47, 1, 7, 9, 'Договор №167', 36754, 2, '1980-05-15', 'Marcos Lang Sr.', 'Nemo aliquid quas eos ducimus.', NULL, '2016-12-13 21:49:56', '2016-12-13 21:49:56'),
(48, 5, 1, 2, 'Договор №87', 47551, 2, '1987-10-03', 'Leonard Schaden', 'A pariatur explicabo iure dolores.', NULL, '2016-12-13 21:49:56', '2016-12-13 21:49:56'),
(49, 3, 9, 2, 'Договор №119', 30276, 1, '1977-09-13', 'Prof. Domenick Schumm Sr.', 'Quos maxime vitae atque veritatis.', NULL, '2016-12-13 21:49:56', '2016-12-13 21:49:56'),
(50, 7, 4, 6, 'Договор №278', 50707, 1, '1981-10-05', 'Name McClure', 'Ducimus aut officia hic vitae quo.', 'files/uploads/15d22c35de845d83691b01e955d59b3b.jpg', '2016-12-13 21:49:56', '2017-01-19 23:36:13'),
(51, 7, 2, 29, 'Договор на замену картриджей', 3450, 20, '2016-07-13', 'Стасенко Станислав Викторович ', '', 'files/uploads/fba64513a30208d747b7aaf72a0b0b14.jpg', '2017-01-19 23:39:34', '2017-01-19 23:39:34');

-- --------------------------------------------------------

--
-- Структура таблицы `fundamental_settings`
--

CREATE TABLE `fundamental_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Человеческое название настройки/параметра. Например "Email-ы для оповещений"',
  `var` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'параметр, на который завязаться в коде. Изменять его уже нельзя ибо пото искать все вхождения в код.',
  `value` varchar(254) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Значение параметра (список почт, цифровое значение и тп.)',
  `description` varchar(254) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Описание параметра для вывода в админке в качестве подказки',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `fundamental_settings`
--

INSERT INTO `fundamental_settings` (`id`, `name`, `var`, `value`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Справочник типов договоров', 'contract_type_list', '6', 'Описание', '2016-12-14 00:17:04', '2016-12-14 00:17:04'),
(2, 'Справочник подрядчиков', 'contractor_list', '7', '', '2016-12-14 00:19:26', '2016-12-14 00:19:26'),
(3, 'Справочник периодов оплаты по договорам', 'pay_period_list', '8', '', '2016-12-14 00:20:23', '2016-12-14 00:20:23'),
(4, 'Справочник лицензий', 'null', '9', '', '2017-01-19 21:51:31', '2017-01-19 21:53:06'),
(5, 'Справочник статей бюджета', '11', '5', '', '2017-01-19 22:00:12', '2017-01-19 22:00:12');

-- --------------------------------------------------------

--
-- Структура таблицы `licenses`
--

CREATE TABLE `licenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `organisation_id` smallint(6) NOT NULL,
  `catalog_item_id` smallint(6) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `licenses`
--

INSERT INTO `licenses` (`id`, `organisation_id`, `catalog_item_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 8, 2, 15, '2016-12-13 21:49:52', '2016-12-13 21:49:52'),
(2, 4, 3, 14, '2016-12-13 21:49:52', '2016-12-13 21:49:52'),
(3, 4, 6, 18, '2016-12-13 21:49:52', '2016-12-13 21:49:52'),
(4, 1, 9, 8, '2016-12-13 21:49:52', '2016-12-13 21:49:52'),
(5, 9, 9, 16, '2016-12-13 21:49:52', '2016-12-13 21:49:52'),
(6, 9, 5, 8, '2016-12-13 21:49:52', '2016-12-13 21:49:52'),
(7, 8, 4, 26, '2016-12-13 21:49:52', '2016-12-13 21:49:52'),
(8, 2, 2, 14, '2016-12-13 21:49:52', '2016-12-13 21:49:52'),
(9, 7, 19, 7, '2016-12-13 21:49:52', '2016-12-13 21:49:52'),
(10, 9, 4, 12, '2016-12-13 21:49:52', '2016-12-13 21:49:52'),
(11, 1, 8, 26, '2016-12-13 21:49:52', '2016-12-13 21:49:52'),
(12, 7, 10, 2, '2016-12-13 21:49:52', '2016-12-13 21:49:52'),
(14, 4, 1, 13, '2016-12-13 21:49:52', '2016-12-13 21:49:52'),
(15, 3, 5, 8, '2016-12-13 21:49:52', '2016-12-13 21:49:52'),
(16, 3, 8, 13, '2016-12-13 21:49:52', '2016-12-13 21:49:52'),
(17, 8, 1, 28, '2016-12-13 21:49:52', '2016-12-13 21:49:52'),
(18, 5, 2, 14, '2016-12-13 21:49:53', '2016-12-13 21:49:53'),
(19, 9, 6, 9, '2016-12-13 21:49:53', '2016-12-13 21:49:53'),
(20, 1, 3, 12, '2016-12-13 21:49:53', '2016-12-13 21:49:53'),
(21, 2, 5, 12, '2016-12-13 21:49:53', '2016-12-13 21:49:53'),
(22, 7, 5, 4, '2016-12-13 21:49:53', '2016-12-13 21:49:53'),
(23, 9, 6, 20, '2016-12-13 21:49:53', '2016-12-13 21:49:53'),
(24, 6, 6, 11, '2016-12-13 21:49:53', '2016-12-13 21:49:53'),
(26, 1, 4, 14, '2016-12-13 21:49:53', '2016-12-13 21:49:53'),
(27, 8, 1, 19, '2016-12-13 21:49:53', '2016-12-13 21:49:53'),
(28, 6, 6, 3, '2016-12-13 21:49:53', '2016-12-13 21:49:53'),
(29, 5, 1, 27, '2016-12-13 21:49:53', '2016-12-13 21:49:53'),
(30, 9, 5, 3, '2016-12-13 21:49:53', '2016-12-13 21:49:53'),
(31, 2, 9, 27, '2016-12-13 21:49:53', '2016-12-13 21:49:53'),
(32, 8, 5, 30, '2016-12-13 21:49:53', '2016-12-13 21:49:53'),
(33, 1, 8, 11, '2016-12-13 21:49:53', '2016-12-13 21:49:53'),
(34, 3, 2, 3, '2016-12-13 21:49:53', '2016-12-13 21:49:53'),
(35, 6, 8, 21, '2016-12-13 21:49:53', '2016-12-13 21:49:53'),
(36, 4, 9, 27, '2016-12-13 21:49:53', '2016-12-13 21:49:53'),
(37, 9, 7, 23, '2016-12-13 21:49:53', '2016-12-13 21:49:53'),
(38, 6, 5, 2, '2016-12-13 21:49:53', '2016-12-13 21:49:53'),
(39, 9, 9, 21, '2016-12-13 21:49:53', '2016-12-13 21:49:53'),
(40, 3, 2, 3, '2016-12-13 21:49:54', '2016-12-13 21:49:54'),
(41, 2, 5, 17, '2016-12-13 21:49:54', '2016-12-13 21:49:54'),
(42, 5, 1, 3, '2016-12-13 21:49:54', '2016-12-13 21:49:54'),
(43, 7, 14, 5, '2016-12-13 21:49:54', '2016-12-13 21:49:54'),
(44, 6, 7, 15, '2016-12-13 21:49:54', '2016-12-13 21:49:54'),
(45, 3, 5, 22, '2016-12-13 21:49:54', '2016-12-13 21:49:54'),
(46, 9, 2, 25, '2016-12-13 21:49:54', '2016-12-13 21:49:54'),
(47, 2, 5, 24, '2016-12-13 21:49:54', '2016-12-13 21:49:54'),
(48, 3, 4, 13, '2016-12-13 21:49:54', '2016-12-13 21:49:54'),
(50, 1, 3, 9, '2016-12-13 21:49:54', '2016-12-13 21:49:54');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(352, '2014_10_12_000000_create_users_table', 1),
(353, '2014_10_12_100000_create_password_resets_table', 1),
(354, '2016_12_01_110045_CreateFundamentalSettingsTable', 1),
(355, '2016_12_02_094218_create_organisations_table', 1),
(356, '2016_12_05_092131_create_budget_table', 1),
(357, '2016_12_05_092240_create_catalog_table', 1),
(358, '2016_12_05_092305_create_catalog_items_table', 1),
(359, '2016_12_05_092430_create_workplace_table', 1),
(360, '2016_12_05_092445_create_workplace_soft_table', 1),
(361, '2016_12_05_110356_create_departures_table', 1),
(362, '2016_12_07_081955_create_role_table', 1),
(363, '2016_12_08_041016_create_role_user_table', 1),
(364, '2016_12_09_045317_create_license_table', 1),
(365, '2016_12_09_053700_create_contract_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `organisations`
--

CREATE TABLE `organisations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `inn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `departure_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` smallint(6) NOT NULL,
  `num_workplace` smallint(6) NOT NULL,
  `system_id` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `organisations`
--

INSERT INTO `organisations` (`id`, `name`, `inn`, `departure_name`, `user_id`, `num_workplace`, `system_id`, `created_at`, `updated_at`) VALUES
(1, 'АО ХК "СДС Уголь"', '4556796509922', 'Schimmel-AnkundingDeparture', 3, 83, 2, '2016-12-13 21:49:45', '2016-12-13 21:49:45'),
(2, 'Шахта Листвяжная', '347638538420893', 'Kirlin and SonsDeparture', 8, 76, 2, '2016-12-13 21:49:45', '2016-12-13 21:49:45'),
(3, 'ООО ХК "СДС Энерго"', '5232140171903795', 'Ullrich-SmithDeparture', 4, 97, 2, '2016-12-13 21:49:45', '2016-12-13 21:49:45'),
(4, 'СДС-Маркет', '5107859518166087', 'Oberbrunner, Aufderhar and ParisianDeparture', 2, 81, 1, '2016-12-13 21:49:45', '2016-12-13 21:49:45'),
(5, 'Разрез Киселевский', '4024007125244', 'Runte-SchmittDeparture', 7, 32, 1, '2016-12-13 21:49:45', '2016-12-13 21:49:45'),
(6, 'Алтайвагон, АО ', '5276584415411056', 'Bartell-OsinskiDeparture', 6, 65, 1, '2016-12-13 21:49:45', '2017-01-19 20:37:34'),
(7, 'Страховая компания СДС', '5264495126896911', 'Lubowitz, Halvorson and LehnerDeparture', 1, 11, 2, '2016-12-13 21:49:45', '2016-12-13 21:49:45'),
(8, 'СДС-Трейд', '5144392068099479', 'Nolan LtdDeparture', 5, 42, 1, '2016-12-13 21:49:45', '2016-12-13 21:49:45'),
(9, 'Электропром', '374760900402048', 'Cremin-JonesDeparture', 9, 59, 2, '2016-12-13 21:49:45', '2017-01-19 20:38:49');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `display_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`) VALUES
(1, 'User', 'Руководитель отдела'),
(2, 'Admin', 'Администратор сайта'),
(3, 'SuperAdmin', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(2, 11);

-- --------------------------------------------------------

--
-- Структура таблицы `systems`
--

CREATE TABLE `systems` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `systems`
--

INSERT INTO `systems` (`id`, `name`) VALUES
(1, '1c'),
(2, 'Галактика');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Чирухин Сергей Петрович ', 'madelyn60@example.net', '$2y$10$TDs3smL.QFatPtQIbZqg5OoRo2Ff7BpiAfDG76bLjNq78nJAwK9ZS', 'uJIIODOKIhJNgQSigVXOgLmfQJxfL5aGj2eWV2Bm89O9ko2g2F7UHtXbeAaU', '2016-12-13 21:49:44', '2017-02-05 22:29:35'),
(2, 'Кулебакин Николай Александрович ', 'devante.ortiz@example.org', '$2y$10$TDs3smL.QFatPtQIbZqg5OoRo2Ff7BpiAfDG76bLjNq78nJAwK9ZS', 'FzWdDU8LC0', '2016-12-13 21:49:44', '2016-12-13 21:49:44'),
(3, 'Арасланов Евгений Равильевич ', 'fabiola26@example.com', '$2y$10$TDs3smL.QFatPtQIbZqg5OoRo2Ff7BpiAfDG76bLjNq78nJAwK9ZS', 'ioeOB1WGH8', '2016-12-13 21:49:44', '2016-12-13 21:49:44'),
(4, 'Клименко Иван Анатольевич ', 'uspencer@example.net', '$2y$10$TDs3smL.QFatPtQIbZqg5OoRo2Ff7BpiAfDG76bLjNq78nJAwK9ZS', 'P3GC6zbkRW', '2016-12-13 21:49:45', '2016-12-13 21:49:45'),
(5, 'Красавина Ирина Станиславовна ', 'collier.ellsworth@example.org', '$2y$10$TDs3smL.QFatPtQIbZqg5OoRo2Ff7BpiAfDG76bLjNq78nJAwK9ZS', 'IGJ2Iq9tc8', '2016-12-13 21:49:45', '2016-12-13 21:49:45'),
(6, 'Пасечный Олег Леонидович ', 'yessenia.hayes@example.com', '$2y$10$TDs3smL.QFatPtQIbZqg5OoRo2Ff7BpiAfDG76bLjNq78nJAwK9ZS', 'wNVVgu8Bz1', '2016-12-13 21:49:45', '2016-12-13 21:49:45'),
(7, 'Андрющенко Иван Олегович ', 'bborer@example.org', '$2y$10$TDs3smL.QFatPtQIbZqg5OoRo2Ff7BpiAfDG76bLjNq78nJAwK9ZS', '3uB1igDcBG', '2016-12-13 21:49:45', '2017-01-19 20:28:06'),
(8, 'Маринина Светлана Геннадьевна ', 'mercedes83@example.com', '$2y$10$TDs3smL.QFatPtQIbZqg5OoRo2Ff7BpiAfDG76bLjNq78nJAwK9ZS', 'CYcY32B8CJ', '2016-12-13 21:49:45', '2016-12-13 21:49:45'),
(9, 'Коновалов Александр Борисович', 'aufderhar.garett@example.org', '$2y$10$TDs3smL.QFatPtQIbZqg5OoRo2Ff7BpiAfDG76bLjNq78nJAwK9ZS', '23aczhADzvWNJypp8bAqstOXLmbuZzKuTBxhP9bxAytQeAYriok9lgY8x0dh', '2016-12-13 21:49:45', '2016-12-15 19:10:08'),
(11, 'Кабанец Алексей Владимирович', 'p.rodionov@hcsds.ru', '$2y$10$s55xpkxwa7FKTU.H5hrtxOn6y4bMk6Pr6AALJsQcSSWVGN3poDBYe', 'Ta6urLhAu6QOmoEBpTJlKaxdWJpSKajDisO1YMTGMcef7NAWtBUKm19CGq1U', NULL, '2017-02-05 22:26:01');

-- --------------------------------------------------------

--
-- Структура таблицы `workplaces`
--

CREATE TABLE `workplaces` (
  `id` int(10) UNSIGNED NOT NULL,
  `departure_id` smallint(6) NOT NULL,
  `pc_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `workplaces`
--

INSERT INTO `workplaces` (`id`, `departure_id`, `pc_name`, `created_at`, `updated_at`) VALUES
(1, 9, 'sds-clnt703', '2016-12-13 21:49:48', '2016-12-13 21:49:48'),
(2, 2, 'sds-clnt591', '2016-12-13 21:49:48', '2016-12-13 21:49:48'),
(3, 7, 'sds-clnt333', '2016-12-13 21:49:48', '2016-12-13 21:49:48'),
(4, 8, 'sds-clnt730', '2016-12-13 21:49:48', '2016-12-13 21:49:48'),
(5, 5, 'sds-clnt425', '2016-12-13 21:49:48', '2016-12-13 21:49:48'),
(6, 1, 'sds-clnt897', '2016-12-13 21:49:48', '2016-12-13 21:49:48'),
(7, 2, 'sds-clnt400', '2016-12-13 21:49:48', '2016-12-13 21:49:48'),
(8, 8, 'sds-clnt930', '2016-12-13 21:49:48', '2016-12-13 21:49:48'),
(9, 8, 'sds-clnt210', '2016-12-13 21:49:48', '2016-12-13 21:49:48');

-- --------------------------------------------------------

--
-- Структура таблицы `workplace_soft`
--

CREATE TABLE `workplace_soft` (
  `id` int(10) UNSIGNED NOT NULL,
  `workplace_id` smallint(6) NOT NULL,
  `catalog_items_id` smallint(6) NOT NULL,
  `count` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `workplace_soft`
--

INSERT INTO `workplace_soft` (`id`, `workplace_id`, `catalog_items_id`, `count`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 1, '2016-12-13 21:49:48', '2016-12-13 21:49:48'),
(2, 2, 5, 8, '2016-12-13 21:49:48', '2016-12-13 21:49:48'),
(3, 1, 7, 7, '2016-12-13 21:49:48', '2016-12-13 21:49:48'),
(4, 1, 7, 3, '2016-12-13 21:49:48', '2016-12-13 21:49:48'),
(5, 8, 2, 4, '2016-12-13 21:49:48', '2016-12-13 21:49:48'),
(6, 3, 9, 5, '2016-12-13 21:49:48', '2016-12-13 21:49:48'),
(7, 2, 2, 9, '2016-12-13 21:49:49', '2016-12-13 21:49:49'),
(8, 1, 2, 9, '2016-12-13 21:49:49', '2016-12-13 21:49:49'),
(9, 6, 8, 7, '2016-12-13 21:49:49', '2016-12-13 21:49:49'),
(10, 9, 5, 5, '2016-12-13 21:49:49', '2016-12-13 21:49:49'),
(11, 5, 8, 3, '2016-12-13 21:49:49', '2016-12-13 21:49:49'),
(12, 4, 9, 8, '2016-12-13 21:49:49', '2016-12-13 21:49:49'),
(13, 3, 3, 4, '2016-12-13 21:49:49', '2016-12-13 21:49:49'),
(14, 1, 3, 2, '2016-12-13 21:49:49', '2016-12-13 21:49:49'),
(15, 2, 9, 2, '2016-12-13 21:49:49', '2016-12-13 21:49:49'),
(16, 2, 3, 4, '2016-12-13 21:49:49', '2016-12-13 21:49:49'),
(17, 4, 4, 3, '2016-12-13 21:49:49', '2016-12-13 21:49:49'),
(18, 1, 4, 4, '2016-12-13 21:49:49', '2016-12-13 21:49:49'),
(19, 8, 7, 1, '2016-12-13 21:49:49', '2016-12-13 21:49:49'),
(20, 8, 9, 7, '2016-12-13 21:49:49', '2016-12-13 21:49:49'),
(21, 8, 6, 6, '2016-12-13 21:49:49', '2016-12-13 21:49:49'),
(22, 6, 4, 2, '2016-12-13 21:49:49', '2016-12-13 21:49:49'),
(23, 7, 5, 4, '2016-12-13 21:49:49', '2016-12-13 21:49:49'),
(24, 6, 5, 5, '2016-12-13 21:49:49', '2016-12-13 21:49:49'),
(25, 2, 7, 8, '2016-12-13 21:49:49', '2016-12-13 21:49:49'),
(26, 6, 6, 2, '2016-12-13 21:49:49', '2016-12-13 21:49:49'),
(27, 6, 1, 7, '2016-12-13 21:49:49', '2016-12-13 21:49:49'),
(28, 7, 9, 7, '2016-12-13 21:49:49', '2016-12-13 21:49:49'),
(29, 6, 1, 2, '2016-12-13 21:49:49', '2016-12-13 21:49:49'),
(30, 8, 9, 6, '2016-12-13 21:49:50', '2016-12-13 21:49:50');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `budgets`
--
ALTER TABLE `budgets`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `catalogs`
--
ALTER TABLE `catalogs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `catalog_items`
--
ALTER TABLE `catalog_items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `fundamental_settings`
--
ALTER TABLE `fundamental_settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `licenses`
--
ALTER TABLE `licenses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `organisations`
--
ALTER TABLE `organisations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`role_id`,`user_id`);

--
-- Индексы таблицы `systems`
--
ALTER TABLE `systems`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `workplaces`
--
ALTER TABLE `workplaces`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `workplace_soft`
--
ALTER TABLE `workplace_soft`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `budgets`
--
ALTER TABLE `budgets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT для таблицы `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `catalog_items`
--
ALTER TABLE `catalog_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT для таблицы `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT для таблицы `fundamental_settings`
--
ALTER TABLE `fundamental_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `licenses`
--
ALTER TABLE `licenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=366;
--
-- AUTO_INCREMENT для таблицы `organisations`
--
ALTER TABLE `organisations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `systems`
--
ALTER TABLE `systems`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `workplaces`
--
ALTER TABLE `workplaces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `workplace_soft`
--
ALTER TABLE `workplace_soft`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
