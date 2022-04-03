-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 03, 2022 at 03:03 PM
-- Server version: 8.0.24
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arenda`
--

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `property_id` int UNSIGNED NOT NULL COMMENT 'id объекта недвижимости ',
  `user_id` int UNSIGNED NOT NULL COMMENT 'id владельца объекта недвижимости',
  `rent` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'в состоянии аренды',
  `type` varchar(63) NOT NULL COMMENT 'тип объекта недвижимости  ',
  `name` varchar(255) NOT NULL COMMENT 'имя',
  `area` int UNSIGNED NOT NULL COMMENT 'площадь',
  `address` varchar(255) NOT NULL COMMENT 'адрес',
  `price` int UNSIGNED NOT NULL,
  `description` varchar(255) DEFAULT NULL COMMENT 'описание',
  `rooms` int UNSIGNED NOT NULL DEFAULT '0' COMMENT 'количество комнат (при наличии)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `rent_id` int UNSIGNED NOT NULL COMMENT 'id аренды',
  `user_id` int UNSIGNED NOT NULL COMMENT 'id арендатора',
  `property_id` int UNSIGNED NOT NULL COMMENT 'id объекта аренда',
  `start_date` date NOT NULL COMMENT 'дата начала аренды',
  `end_date` date NOT NULL COMMENT 'дата конца аренды',
  `price` int UNSIGNED NOT NULL COMMENT 'цена всего периода аренды'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int UNSIGNED NOT NULL COMMENT 'id пользователя',
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Имя',
  `second_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Фамилия',
  `md5password` varchar(255) NOT NULL COMMENT 'пароль',
  `login` varchar(255) NOT NULL COMMENT 'логин',
  `is_admin` int UNSIGNED NOT NULL DEFAULT '0' COMMENT 'флаг администратора'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`rent_id`),
  ADD KEY `property_id` (`property_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id объекта недвижимости ';

--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `rent_id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id аренды';

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id пользователя';

--
-- Constraints for dumped tables
--

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `rent`
--
ALTER TABLE `rent`
  ADD CONSTRAINT `rent_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `rent_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
