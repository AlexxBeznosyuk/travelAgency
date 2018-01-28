-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 28 2018 г., 22:04
-- Версия сервера: 5.5.53
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Alexx`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city` varchar(64) DEFAULT NULL,
  `countryid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `city`, `countryid`) VALUES
(1, 'Vatican', 1),
(2, 'Paris', 2),
(3, 'Lion', 2),
(4, 'Marseille', 2),
(5, 'Maribor', 3),
(6, 'Ljubljana', 3),
(7, 'Oslo', 4),
(8, 'Trondheim', 4),
(9, 'Reykjavik', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id`, `country`) VALUES
(1, 'Vatican'),
(2, 'France'),
(3, 'Slovenia'),
(4, 'Norway'),
(5, 'Island');

-- --------------------------------------------------------

--
-- Структура таблицы `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `hotel` varchar(64) DEFAULT NULL,
  `cityid` int(11) DEFAULT NULL,
  `countryid` int(11) DEFAULT NULL,
  `stars` int(11) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `info` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `hotels`
--

INSERT INTO `hotels` (`id`, `hotel`, `cityid`, `countryid`, `stars`, `cost`, `info`) VALUES
(6, 'Hotel_vatican', 1, 1, 5, 500, 'Upgraded in 2006, the building has retained its unique character in modern style. The hall, built with love in the form of atrium, as well as the stucco ceiling, decorating the main restaurant premises, are the best evidences of this architecture.'),
(7, 'Paris_hotel', 2, 2, 4, 300, 'Take a deep look from the elegant hall to your room. Historical elements of traditional architecture are skillfully harmonized with the modern interior. Here you can exhale and relax. You will feel yourself comfortably in our hotel being surrounded by warm atmosphere. Comfortable apartments (some of them have balcony or terrace) equipped with all modern facilities.'),
(8, 'Lion_hotel', 3, 2, 3, 250, 'This hotel is located in the city center, surrounded by the well-known scenic spots like Tiananmen Square, Forbidden City and the Temple of Heaven. It has 300 rooms equipped with complete facilities and functions. The Old House 1918 Café is located on the first floor of the auxiliary building and from the top floor guests can have one of the best views of Beijing’s old city.'),
(9, 'Hotel_marceille', 4, 2, 5, 600, 'Kai Heng Century Hotel offers ultimate comfort and luxury. This 4-storied hotel is a beautiful combination of traditional grandeur and modern facilities. The 255 exclusive guest rooms are furnished with a range of modern amenities such as television and internet access. International direct-dial phone and safe are also available in any of these rooms. Wake-up call facility is also available in these rooms.'),
(10, 'Maribol_hotel', 5, 3, 3, 150, 'Hotel Belvoir is situated in the idyllic mountainous region of the Lake of Sarnen. The Hotel offers comfortable rooms, an excellent kitchen, cozy premises, a wonderful sun terrace and its own night club. It is an ideal jumping-off point between Lucerne and Interlaken for all sorts of excursions and in Winter months, the snow slopes of Lungern-Schoenbuehl as well as those of Melchsee-Frutt are invitingly close.'),
(11, 'Hotel1', 6, 3, 3, 225, 'The hotel Florida Norte is located in the center of Ljubljana, next to the major monuments, tourist attractions and a popular shopping area with cafés and restaurants nearby. The large capacity hotel has charming and classic style hosted by a very friendly staff. The hotel has its own restaurant as well as provides safety boxes and money exchange services. Rooms are equipped with a TV and radio.'),
(12, 'Norway Hotel', 7, 4, 4, 450, 'Set in Mestre, Hotel Antony offers spacious rooms with extra-large beds, a traditional Italian restaurant and affordable shuttle service. Venice\'s historic center is 10 minutes\' drive away. Rooms at the Antony Hotel are classically furnished and air conditioned. They come with free WiFi, satellite TV and tea and coffee-making facilities.'),
(13, 'Sky hotel', 8, 4, 3, 330, '“ABSOLUTELY WONDERFUL!!!! Access to the Adriatic sea, environment and staff at this hotel were amazing. The staff were seriously so kind. So kind. And their food was INCREDIBLE. I want to never stay anywhere else, ever, when visiting Venice!!! SO GREAT!”'),
(14, 'sea hotel', 9, 5, 2, 275, 'Situated in an enchanting and peaceful position on the banks of the Arno River just a short distance away from the city center of Florence in a central but yet quiet position. The Grand Hotel Mediterraneo has 331 large and comfortable bedrooms equipped with the most modern conveniences. American bar and lounge. A private &quot;Internet Corner is also available.'),
(15, 'Hotel2', 2, 2, 1, 100, 'The Meadowlands River Inn is located just outside New York City, adjacent to the Meadowlands Sports Complex. The hotel offers easy access to major tourist attractions and includes amenities such as wireless internet and a hot breakfast.'),
(16, 'hotel3', 2, 2, 3, 200, 'The Meadowlands River Inn is located just outside New York City, adjacent to the Meadowlands Sports Complex. The hotel offers easy access to major tourist attractions and includes amenities such as wireless internet and a hot breakfast.');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `imagepath` varchar(255) DEFAULT NULL,
  `hotelid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `imagepath`, `hotelid`) VALUES
(3, 'images/vat1.jpg', 6),
(4, 'images/vat2.jpg', 6),
(5, 'images/vat3.jpg', 6),
(6, 'images/vat4.jpg', 6),
(7, 'images/vat5.jpg', 6),
(8, 'images/vat6.jpg', 6),
(9, 'images/vat7.jpg', 6),
(10, 'images/vat8.jpg', 6),
(11, 'images/vat9.jpg', 6),
(12, 'images/france1.jpg', 7),
(13, 'images/france2.jpg', 7),
(14, 'images/france3.jpg', 7),
(15, 'images/france4.jpg', 7),
(16, 'images/france5.jpg', 7),
(17, 'images/france6.jpg', 7),
(18, 'images/france7.jpg', 7),
(19, 'images/france8.jpg', 7),
(20, 'images/france9.jpg', 7),
(21, 'images/france10.jpg', 7),
(22, 'images/france1.jpg', 8),
(23, 'images/france2.jpg', 8),
(24, 'images/france3.jpg', 8),
(25, 'images/france4.jpg', 8),
(26, 'images/france5.jpg', 8),
(27, 'images/france6.jpg', 8),
(28, 'images/france7.jpg', 8),
(29, 'images/france8.jpg', 8),
(30, 'images/france9.jpg', 8),
(31, 'images/france10.jpg', 8),
(32, 'images/france1.jpg', 9),
(33, 'images/france2.jpg', 9),
(34, 'images/france3.jpg', 9),
(35, 'images/france4.jpg', 9),
(36, 'images/france5.jpg', 9),
(37, 'images/france6.jpg', 9),
(38, 'images/france7.jpg', 9),
(39, 'images/france8.jpg', 9),
(40, 'images/france9.jpg', 9),
(41, 'images/france10.jpg', 9),
(42, 'images/slov1.jpg', 10),
(43, 'images/slov2.jpg', 10),
(44, 'images/slov3.jpg', 10),
(45, 'images/slov4.jpg', 10),
(46, 'images/slov5.jpg', 10),
(47, 'images/slov6.jpg', 10),
(48, 'images/slov7.jpg', 10),
(49, 'images/slov8.jpg', 10),
(50, 'images/slov9.jpg', 10),
(51, 'images/slov10.jpg', 10),
(52, 'images/nor1.jpg', 12),
(53, 'images/nor2.jpg', 12),
(54, 'images/nor3.jpg', 12),
(55, 'images/nor4.jpg', 12),
(56, 'images/nor5.jpg', 12),
(57, 'images/nor6.jpg', 12),
(58, 'images/nor7.jpg', 12),
(59, 'images/nor6.jpg', 13),
(60, 'images/nor7.jpg', 13),
(61, 'images/nor1.jpg', 13),
(62, 'images/nor2.jpg', 13),
(63, 'images/nor3.jpg', 13),
(64, 'images/nor4.jpg', 13),
(65, 'images/nor5.jpg', 13),
(66, 'images/isl1.jpg', 14),
(67, 'images/isl2.jpg', 14),
(68, 'images/isl3.jpg', 14),
(69, 'images/isl4.jpg', 14),
(70, 'images/isl5.jpg', 14),
(71, 'images/isl6.jpg', 14),
(72, 'images/isl7.jpg', 14),
(73, 'images/isl8.jpg', 14),
(74, 'images/isl9.jpg', 14),
(75, 'images/isl10.jpg', 14),
(86, 'images/france1.jpg', 15),
(87, 'images/france2.jpg', 15),
(88, 'images/france3.jpg', 15),
(89, 'images/france4.jpg', 15),
(90, 'images/france5.jpg', 15),
(91, 'images/france6.jpg', 15),
(92, 'images/france7.jpg', 15),
(93, 'images/france8.jpg', 15),
(94, 'images/france9.jpg', 15),
(95, 'images/france10.jpg', 15),
(96, 'images/france1.jpg', 16),
(97, 'images/france2.jpg', 16),
(98, 'images/france3.jpg', 16),
(99, 'images/france4.jpg', 16),
(100, 'images/france5.jpg', 16),
(101, 'images/france6.jpg', 16),
(102, 'images/france7.jpg', 16),
(103, 'images/france8.jpg', 16),
(104, 'images/france9.jpg', 16),
(105, 'images/france10.jpg', 16),
(106, 'images/slov1.jpg', 11),
(107, 'images/slov2.jpg', 11),
(108, 'images/slov3.jpg', 11),
(109, 'images/slov4.jpg', 11),
(110, 'images/slov5.jpg', 11),
(111, 'images/slov6.jpg', 11),
(112, 'images/slov7.jpg', 11),
(113, 'images/slov8.jpg', 11),
(114, 'images/slov9.jpg', 11),
(115, 'images/slov10.jpg', 11);

-- --------------------------------------------------------

--
-- Структура таблицы `msgs`
--

CREATE TABLE `msgs` (
  `id` int(11) NOT NULL,
  `msg` varchar(1024) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `msgs`
--

INSERT INTO `msgs` (`id`, `msg`, `userid`, `dt`) VALUES
(2, 'We were disapointed with the standard of the room. We were travelling with our 12 yr old son, and I found it quite annoying that we couldnt bring him into the bar for a afternoon soft drink or so. The lobby would have been much better with 3-4 areas with comfy chairs and tables, it was impossible to talk over the huge coffee table..', 2, '2017-09-14 19:59:52'),
(4, 'Dear Guest, Thank you very much for choosing our Savoy Hotel for your recent stay in Berlin and for taking the time to write a feedback. We are truly sorry, that you were disappointed about the experience with our front desk staff. Please be assured that this does not reflect our service standards and that we will follow up the situation with our entire team. Our goal is to deliver high-quality hospitality to every guest on every stay, starting from your arrival until your departure. We hope, that during your next visit in Berlin, we can welcome you once again at our Savoy Hotel Berlin to prove, that we are really passionate about guest service. Best regards, The Savoy Hotel Berlin Team', 1, '2017-09-14 20:00:44'),
(5, 'We had 3 lovely days in Berlin and at the Sanoy. However, booking a suite and getting 2 rooms with an internal door and the bed in one of the rooms replaced by a sofa. That is not quite what I expected.', 3, '2017-09-14 20:01:17'),
(6, 'The hotel is nice and staff are friendly. A little bit of wear and tear, threadbare furniture etc, but nothing too bad. There was quite a lot of mould on the bathroom tile grout however so cleanliness could be a bit better. The rooms are also way too hot, i definately would not stay there in summer!', 5, '2017-09-14 20:02:17');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(32) DEFAULT NULL,
  `pass` varchar(32) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `roleid` int(11) DEFAULT NULL,
  `avatar` mediumblob,
  `phone` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `email`, `discount`, `roleid`, `avatar`, `phone`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'Derevannij@mail.ru', 5, NULL, 0x696d616765732f6176617461722f61646d696e2e4b6f616c612e6a7067, '066 150 86 69'),
(2, 'vasya', '827ccb0eea8a706c4c34a16891f84e7b', 'mail@ru', 5, NULL, 0x696d616765732f6176617461722f76617379612e4a656c6c79666973682e6a7067, '111-22-33'),
(3, 'sasha', '827ccb0eea8a706c4c34a16891f84e7b', 'trym@grid.ry', 5, NULL, 0x696d616765732f6176617461722f73617368612e50656e6775696e732e6a7067, '(0xx) xxx-xx-xx'),
(4, 'masha', '827ccb0eea8a706c4c34a16891f84e7b', 'qqq@we.23', 5, NULL, 0x696d616765732f6176617461722f6d617368612e48796472616e676561732e6a7067, '066 111 11 11'),
(5, 'petya', '827ccb0eea8a706c4c34a16891f84e7b', 'aa@dd.45', 5, NULL, 0x696d616765732f6176617461722f70657479612e54756c6970732e6a7067, '111-225-66');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countryid` (`countryid`);

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cityid` (`cityid`),
  ADD KEY `countryid` (`countryid`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotelid` (`hotelid`);

--
-- Индексы таблицы `msgs`
--
ALTER TABLE `msgs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `roleid` (`roleid`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT для таблицы `msgs`
--
ALTER TABLE `msgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`countryid`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_ibfk_1` FOREIGN KEY (`cityid`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hotels_ibfk_2` FOREIGN KEY (`countryid`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`hotelid`) REFERENCES `hotels` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `msgs`
--
ALTER TABLE `msgs`
  ADD CONSTRAINT `msgs_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roleid`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
