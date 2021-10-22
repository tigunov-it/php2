-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: mariadb
-- Время создания: Окт 11 2021 г., 11:32
-- Версия сервера: 10.5.12-MariaDB
-- Версия PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gb_php`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE `catalog` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `price` int(11) NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `name`, `quantity`, `price`, `photo`, `description`) VALUES
(1, 'Фонарь задний круглый (ТН188) КАМАЗ, УРАЛ, МАЗ, MAN, Volvo, Scania', 100, 300, 'IMG_1445.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, dolores ea esse et eum ex, id magni maxime nesciunt, nobis non nostrum possimus provident ratione voluptatum? A alias aspernatur corporis delectus deserunt optio voluptatum. Ab fuga hic nam neque obcaecati. Dolores esse fugiat impedit ipsam iste molestias pariatur quisquam, voluptatibus.\r\n'),
(2, 'Фонарь габаритный E-102A-1 LED', 200, 290, 'IMG_1447.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, dolores ea esse et eum ex, id magni maxime nesciunt, nobis non nostrum possimus provident ratione voluptatum? A alias aspernatur corporis delectus deserunt optio voluptatum. Ab fuga hic nam neque obcaecati. Dolores esse fugiat impedit ipsam iste molestias pariatur quisquam, voluptatibus.\r\n'),
(3, 'Блок-фара КАМАЗ с дневными ходовыми огнями (441.3775)', 40, 14500, 'IMG_3558.JPG', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, dolores ea esse et eum ex, id magni maxime nesciunt, nobis non nostrum possimus provident ratione voluptatum? A alias aspernatur corporis delectus deserunt optio voluptatum. Ab fuga hic nam neque obcaecati. Dolores esse fugiat impedit ipsam iste molestias pariatur quisquam, voluptatibus.\r\n'),
(4, 'Фонарь габаритный LED (431.3731-02)', 100, 225, 'IMG_3577.JPG', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, dolores ea esse et eum ex, id magni maxime nesciunt, nobis non nostrum possimus provident ratione voluptatum? A alias aspernatur corporis delectus deserunt optio voluptatum. Ab fuga hic nam neque obcaecati. Dolores esse fugiat impedit ipsam iste molestias pariatur quisquam, voluptatibus.\r\n'),
(5, 'Фонарь габаритный LED (431.3731)', 100, 225, 'IMG_3582.JPG', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, dolores ea esse et eum ex, id magni maxime nesciunt, nobis non nostrum possimus provident ratione voluptatum? A alias aspernatur corporis delectus deserunt optio voluptatum. Ab fuga hic nam neque obcaecati. Dolores esse fugiat impedit ipsam iste molestias pariatur quisquam, voluptatibus.\r\n'),
(6, 'Фонарь задний СуперМаз, КАМАЗ, МАЗ, УРАЛ левый с проводом AMP 7452.3716', 100, 2500, 'IMG_3590.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, dolores ea esse et eum ex, id magni maxime nesciunt, nobis non nostrum possimus provident ratione voluptatum? A alias aspernatur corporis delectus deserunt optio voluptatum. Ab fuga hic nam neque obcaecati. Dolores esse fugiat impedit ipsam iste molestias pariatur quisquam, voluptatibus.\r\n');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`item_id`, `body`, `user_id`) VALUES
(1, 'Доволен покупкой, очень качественный фонарь!', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Аноним',
  `pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `pass`, `hash`) VALUES
(1, 'Петя', '321', '2109738363616414bc283b65.87219572'),
(2, 'Вася', '234', ''),
(3, 'Лена', '345', ''),
(4, 'Анна', '456', ''),
(5, 'Ольга', '567', ''),
(6, 'Аноним', '', ''),
(7, 'admin', '123', '19720108286164135db632e5.71871078');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Индексы таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD UNIQUE KEY `item_id` (`item_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `catalog` (`id`);

--
-- Ограничения внешнего ключа таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `catalog` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
