-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Сен 17 2018 г., 23:57
-- Версия сервера: 5.7.23-0ubuntu0.16.04.1
-- Версия PHP: 7.2.9-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gamemarket`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Action', 'Игры в стиле Action', '2018-09-15 13:40:24', '2018-09-15 15:18:15'),
(2, 'RPG', 'Игры в стиле RPG', '2018-09-15 13:42:03', '2018-09-15 15:18:39'),
(3, 'Квесты', NULL, '2018-09-15 14:15:47', '2018-09-15 15:18:54'),
(4, 'Онлайн-игры', 'Игры, для которых требуется Интернет', '2018-09-15 15:19:21', '2018-09-15 15:19:21'),
(5, 'Стратегии', 'Стратегические игры', '2018-09-15 15:19:47', '2018-09-15 15:19:47');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_09_14_141445_create_categories', 1),
(4, '2018_09_14_141704_create_products', 1),
(5, '2018_09_14_141955_create_orders', 1),
(6, '2018_09_14_183110_add_fields_user', 2),
(7, '2018_09_14_191318_add_fields_orders', 3),
(8, '2018_09_15_164804_set_nullable_description_categories', 4),
(9, '2018_09_15_201926_set_nullable_photo_products', 5),
(10, '2018_09_16_055018_change_column_photo_in_products', 6),
(11, '2018_09_16_072131_set_nullable_description_in_products', 7),
(12, '2018_09_16_195216_set_nullable_name_in_users', 8),
(13, '2018_09_16_195629_set_nullable_password_in_users', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `email`, `created_at`, `updated_at`, `user_full_name`) VALUES
(1, 9, 'klop2@mail.ru', '2018-09-17 15:09:32', '2018-09-17 15:09:32', 'klop2'),
(2, 9, 'klop2@mail.ru', '2018-09-17 15:10:15', '2018-09-17 15:10:15', 'klop2'),
(3, 9, 'klop2@mail.ru', '2018-09-17 15:19:44', '2018-09-17 15:19:44', 'Андрей Попов'),
(4, 9, 'klop2@mail.ru', '2018-09-17 15:20:33', '2018-09-17 15:20:33', 'Андрей Попов'),
(5, 9, 'klop2@mail.ru', '2018-09-17 15:21:40', '2018-09-17 15:21:40', 'Андрей Попов'),
(6, 9, 'klop2@mail.ru', '2018-09-17 15:22:00', '2018-09-17 15:22:00', 'Андрей Попов'),
(7, 7, 'klop@mail.ru', '2018-09-17 15:34:26', '2018-09-17 15:34:26', 'Сергей'),
(8, 12, 'klop2@mail.ru', '2018-09-17 16:40:29', '2018-09-17 16:40:29', 'klop2'),
(9, 12, 'klop2@mail.ru', '2018-09-17 16:44:34', '2018-09-17 16:44:34', 'Иван');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `price` decimal(8,2) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `price`, `photo`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Первая игра', 1, '12.00', '1LtYk7KTBr.png', 'Описание игры', '2018-09-16 03:02:05', '2018-09-16 03:02:05'),
(4, 'Еще одна игра', 2, '145.60', NULL, 'Описание', '2018-09-16 04:23:40', '2018-09-16 04:23:55'),
(5, 'Reprehenderit tempora est est.', 4, '38.00', '1.jpg', 'Error nulla dolorem ut suscipit.', '2018-09-16 06:35:50', '2018-09-16 06:35:50'),
(6, 'Nostrum nihil architecto perferendis.', 4, '290.00', '1.jpg', 'Ad alias minus perspiciatis consequatur debitis quas.', '2018-09-16 06:35:50', '2018-09-16 06:35:50'),
(7, 'Est sunt.', 2, '11.00', '1.jpg', 'Rerum sit at deserunt quas placeat dolorum.', '2018-09-16 06:35:50', '2018-09-16 06:35:50'),
(8, 'Quas sit ut qui.', 5, '1185.00', '1.jpg', 'Commodi ducimus fuga vel reiciendis doloribus.', '2018-09-16 06:35:50', '2018-09-16 06:35:50'),
(9, 'Deserunt dolor qui.', 2, '980.00', '1.jpg', 'Autem optio similique eius voluptatibus.', '2018-09-16 06:40:55', '2018-09-16 06:40:55'),
(10, 'Modi id id.', 4, '824.00', '1.jpg', 'Consequatur vitae nemo et asperiores.', '2018-09-16 06:40:55', '2018-09-16 06:40:55'),
(11, 'Dolorem consequatur quo.', 3, '925.00', '1.jpg', 'Quam necessitatibus nostrum autem animi.', '2018-09-16 06:40:55', '2018-09-16 06:40:55'),
(12, 'Et beatae eum qui vel.', 5, '1731.00', '1.jpg', 'Est voluptatem totam dolor corporis officia cupiditate.', '2018-09-16 06:40:55', '2018-09-16 06:40:55');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'admin', 'admin@mail.ru', NULL, '$2y$10$mwNsW0z7/cS6Rh7jwAQf9.KxJfu8F83NQIoGTbuJeKcQlK2jeV5pC', '33U1de9TizeWHFBi8EasaPLEo1OEjRdQYEMNeQCiw9mw9xrvGi02lo8lr9j0', '2018-09-14 14:15:20', '2018-09-14 14:15:20', 0),
(4, 'klop2', 'klop2@mail.ru', NULL, '$2y$10$SlTDRJrb1R.mxETwnR1lLOdR4pa5RYuv0qGXbcbiNLpmQmHXCWvme', 'EdGjn7XVXg8HtOyiuqecfTbWWpRyPNQCKGzVhuWHmsGPfBhE7MsnEpzMfPHT', '2018-09-16 17:05:37', '2018-09-16 17:05:37', 1),
(5, 'klop', 'klop@mail.ru', NULL, '$2y$10$/lpIU.WxxxqKqkc33p8CNeGoc/KVFSOMZj.jaFGP7huOjqkxS1y8O', 'fQqWo2ymdW7izw4FopwdXu7iL3ZGneA2QLduAgwv17SUfxzAbiSNvfH8IIIf', '2018-09-16 17:06:30', '2018-09-16 17:06:30', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
