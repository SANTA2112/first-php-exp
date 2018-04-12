-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 27 2018 г., 13:40
-- Версия сервера: 5.6.38
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lol`
--
CREATE DATABASE IF NOT EXISTS `lol` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lol`;
-- --------------------------------------------------------

--
-- Структура таблицы `daysOfTheWeek_BD`
--

CREATE TABLE `daysOfTheWeek_BD` (
  `id` int(11) NOT NULL,
  `days` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `daysOfTheWeek_BD`
--

INSERT INTO `daysOfTheWeek_BD` (`id`, `days`) VALUES
(1, 'Понедельник'),
(2, 'Вторник'),
(3, 'Среда'),
(4, 'Четверг'),
(5, 'Пятница'),
(6, 'Суббота');

-- --------------------------------------------------------

--
-- Структура таблицы `groups_BD`
--

CREATE TABLE `groups_BD` (
  `id` int(11) NOT NULL,
  `groups` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `groups_BD`
--

INSERT INTO `groups_BD` (`id`, `groups`) VALUES
(1, 'П6-13'),
(2, 'П7-14'),
(3, 'БПИ17-01'),
(4, 'БИС17-01'),
(5, 'БСК17-01');

-- --------------------------------------------------------

--
-- Структура таблицы `lessons_BD`
--

CREATE TABLE `lessons_BD` (
  `id` int(11) NOT NULL,
  `lesson` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `lessons_BD`
--

INSERT INTO `lessons_BD` (`id`, `lesson`) VALUES
(1, 'Программировние'),
(2, 'Экономика'),
(3, 'Охрана труда'),
(4, 'Алгебра'),
(5, 'Математический анализ'),
(6, 'Физика'),
(7, 'Русский язык'),
(8, 'БЖД'),
(9, 'Инженерная и компьютерная графика'),
(10, 'Теоретическая механика'),
(11, 'Иностранный язык'),
(12, 'История науки о материалах и технологиях'),
(13, 'Технология конструкционных материалов'),
(14, 'Прикладная физическая культура'),
(15, 'Теория архитектуры '),
(16, 'Рабочее проектирование'),
(17, 'Защита в операционных системах'),
(18, 'Информационные технологии'),
(19, 'Сети и системы передачи информации'),
(20, 'Методы программирования ');

-- --------------------------------------------------------

--
-- Структура таблицы `rooms_BD`
--

CREATE TABLE `rooms_BD` (
  `id` int(11) NOT NULL,
  `n_room` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rooms_BD`
--

INSERT INTO `rooms_BD` (`id`, `n_room`) VALUES
(1, 'А204'),
(2, 'Н311'),
(3, 'Н301');

-- --------------------------------------------------------

--
-- Структура таблицы `schedule_BD`
--

CREATE TABLE `schedule_BD` (
  `id` int(11) NOT NULL,
  `semester` int(2) NOT NULL,
  `groups` varchar(10) NOT NULL,
  `week` varchar(20) NOT NULL,
  `typeofweek` varchar(10) NOT NULL,
  `lesson` varchar(40) NOT NULL,
  `teacher` varchar(45) NOT NULL,
  `typeofoccupation` varchar(30) NOT NULL,
  `room` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `semesters_BD`
--

CREATE TABLE `semesters_BD` (
  `id` int(11) NOT NULL,
  `semester` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `semesters_BD`
--

INSERT INTO `semesters_BD` (`id`, `semester`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `teachers_BD`
--

CREATE TABLE `teachers_BD` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `teachers_BD`
--

INSERT INTO `teachers_BD` (`id`, `name`) VALUES
(1, 'Солдатов В. С.'),
(2, 'Меньшиков О. Д.'),
(3, 'Статников Б. М.'),
(4, 'Комарова М. А.'),
(5, 'Ланин А. А. '),
(6, 'Панов Н. А.'),
(7, 'Акимов М. Л.'),
(8, 'Коростелева А. А.'),
(9, 'Букжалев Е. Е.'),
(10, 'Бушина Т. А.'),
(11, 'Шленов С. А. '),
(12, 'Серебрянников Е. Е.'),
(13, 'Якута А. А.'),
(14, 'Мельникова А. А.');

-- --------------------------------------------------------

--
-- Структура таблицы `typeOfOccupation_BD`
--

CREATE TABLE `typeOfOccupation_BD` (
  `id` int(11) NOT NULL,
  `view` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `typeOfOccupation_BD`
--

INSERT INTO `typeOfOccupation_BD` (`id`, `view`) VALUES
(1, 'Лекция'),
(2, 'Семинар'),
(3, 'Лабораторная работа'),
(4, 'Практика');

-- --------------------------------------------------------

--
-- Структура таблицы `weeks_BD`
--

CREATE TABLE `weeks_BD` (
  `id` int(11) NOT NULL,
  `week` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `weeks_BD`
--

INSERT INTO `weeks_BD` (`id`, `week`) VALUES
(1, 'Первая'),
(2, 'Вторая');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `daysOfTheWeek_BD`
--
ALTER TABLE `daysOfTheWeek_BD`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `groups_BD`
--
ALTER TABLE `groups_BD`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lessons_BD`
--
ALTER TABLE `lessons_BD`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rooms_BD`
--
ALTER TABLE `rooms_BD`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `schedule_BD`
--
ALTER TABLE `schedule_BD`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `semesters_BD`
--
ALTER TABLE `semesters_BD`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `teachers_BD`
--
ALTER TABLE `teachers_BD`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `typeOfOccupation_BD`
--
ALTER TABLE `typeOfOccupation_BD`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `weeks_BD`
--
ALTER TABLE `weeks_BD`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `daysOfTheWeek_BD`
--
ALTER TABLE `daysOfTheWeek_BD`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `groups_BD`
--
ALTER TABLE `groups_BD`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `lessons_BD`
--
ALTER TABLE `lessons_BD`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `rooms_BD`
--
ALTER TABLE `rooms_BD`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `schedule_BD`
--
ALTER TABLE `schedule_BD`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `semesters_BD`
--
ALTER TABLE `semesters_BD`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `teachers_BD`
--
ALTER TABLE `teachers_BD`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `typeOfOccupation_BD`
--
ALTER TABLE `typeOfOccupation_BD`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `weeks_BD`
--
ALTER TABLE `weeks_BD`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

