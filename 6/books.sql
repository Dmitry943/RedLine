-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 03 2017 г., 11:12
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `books`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books_author`
--

CREATE TABLE IF NOT EXISTS `books_author` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `books_author`
--

INSERT INTO `books_author` (`id`, `name`) VALUES
(1, 'Автор первый'),
(2, 'Автор второй'),
(3, 'Пушкин А.С.'),
(4, 'Лермонтов'),
(6, 'Носов'),
(7, 'Чехов А.П.');

-- --------------------------------------------------------

--
-- Структура таблицы `books_book`
--

CREATE TABLE IF NOT EXISTS `books_book` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `books_book`
--

INSERT INTO `books_book` (`id`, `title`) VALUES
(1, 'Книга первая'),
(2, 'Книга вторая'),
(3, 'Книга третья'),
(4, 'Книга четвертая'),
(5, 'Очень интересная книга'),
(9, 'Интересная книга');

-- --------------------------------------------------------

--
-- Структура таблицы `books_book_nm_author`
--

CREATE TABLE IF NOT EXISTS `books_book_nm_author` (
  `id_book` int(10) unsigned NOT NULL,
  `id_author` int(10) unsigned NOT NULL,
  KEY `books_book` (`id_book`),
  KEY `books_authors` (`id_author`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books_book_nm_author`
--

INSERT INTO `books_book_nm_author` (`id_book`, `id_author`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1),
(3, 2),
(4, 3),
(5, 4),
(1, 4),
(9, 6),
(9, 4),
(5, 7);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `books_book_nm_author`
--
ALTER TABLE `books_book_nm_author`
  ADD CONSTRAINT `books_authors` FOREIGN KEY (`id_author`) REFERENCES `books_author` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_book` FOREIGN KEY (`id_book`) REFERENCES `books_book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
