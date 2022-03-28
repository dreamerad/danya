-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 08 2022 г., 12:20
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `danya`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(64) NOT NULL,
  `img` varchar(64) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_email` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `name`, `description`, `category`, `img`, `date`, `user_email`, `status`) VALUES
(4, 'Редактированная запись', 'Редактированная записьРедактированная записьРедактированная записьРедактированРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьРедактированная записьная запись', 'Джаз', 'asdasd.jpf', '2022-01-08 07:47:54', 'adminф', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `articles_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `articles_id`) VALUES
(2, 'sdfsdfsdfsd@gmail.com', 'sdfsdfsdfsd@gmail.com', 1),
(3, 'admin', 'admin', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
