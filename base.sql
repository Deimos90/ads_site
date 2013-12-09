-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 09 2013 г., 03:43
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `base`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `name_holder` varchar(40) NOT NULL,
  `mail` varchar(32) NOT NULL,
  `hiddenmail` varchar(10) NOT NULL,
  `phone` varchar(18) NOT NULL,
  `region` varchar(40) NOT NULL,
  `gorod` varchar(40) NOT NULL,
  `sfera` varchar(40) NOT NULL,
  `podsfera` varchar(40) NOT NULL,
  `order_name` varchar(40) NOT NULL,
  `order_amount` varchar(18) NOT NULL,
  `order_descr` varchar(1024) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `order_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `data` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`order_id`),
  UNIQUE KEY `order_id` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`name_holder`, `mail`, `hiddenmail`, `phone`, `region`, `gorod`, `sfera`, `podsfera`, `order_name`, `order_amount`, `order_descr`, `photo`, `order_id`, `data`, `id_user`, `date`) VALUES
('Admin', 'admin@admin.com', 'no', '123456789', 'Москва и Московская обл.', 'Москва', 'Бумага. Картон', 'Бумага', 'item0', '100', 'item description', '', 15, '09-12-2013 03:38', 44, '0000-00-00'),
('Admin', 'admin@admin.com', 'no', '123456789', 'Москва и Московская обл.', 'Москва', 'Бумага. Картон', 'Бумага', 'item1', '100', 'item description', '', 16, '09-12-2013 03:38', 44, '0000-00-00'),
('Admin', 'admin@admin.com', 'no', '123456789', 'Москва и Московская обл.', 'Москва', 'Бумага. Картон', 'Бумага', 'item2', '100', 'item description', '', 17, '09-12-2013 03:39', 44, '0000-00-00');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `me` text,
  `date` date DEFAULT NULL,
  `phone` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=45 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `email`, `name`, `firstname`, `password`, `me`, `date`, `phone`) VALUES
(42, 'admin@admin.com', 'Admin', 'Admin', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '2013-12-09', '1234567890');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
