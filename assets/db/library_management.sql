-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 07:59 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET TIME_ZONE = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `BOOKS` (
  `ID_BOOK` INT(11) NOT NULL,
  `TITLE` VARCHAR(255) NOT NULL,
  `AUTHOR` VARCHAR(255) NOT NULL,
  `ISBN` VARCHAR(255) NOT NULL,
  `QUANTITY` INT(11) NOT NULL,
  `PICTURE` VARCHAR(255) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Dumping data for table `books`
--

INSERT INTO `BOOKS` (
  `ID_BOOK`,
  `TITLE`,
  `AUTHOR`,
  `ISBN`,
  `QUANTITY`,
  `PICTURE`
) VALUES (
  20,
  'Emotional intelligence ',
  'Robert Julmane',
  'AZ34532009',
  10,
  'assets/img/books/pexels-mark-cruzat-3494806.jpg'
);

-- --------------------------------------------------------

--
-- Table structure for table `Borrowers`
--

CREATE TABLE `BORROWERS` (
  `ID_EMPRUNT` INT(11) NOT NULL,
  `ID_USER` INT(11) NOT NULL,
  `ID_BOOK` INT(11) NOT NULL,
  `START_DATE` DATE NOT NULL,
  `FINISH_DATE` DATE NOT NULL,
  `IS_RETURNED` TINYINT(1) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `USERS` (
  `ID_USER` INT(11) NOT NULL,
  `CIN` VARCHAR(255) NOT NULL,
  `FIRST_NAME` VARCHAR(255) NOT NULL,
  `LAST_NAME` VARCHAR(255) NOT NULL,
  `EMAIL` VARCHAR(255) NOT NULL,
  `PHONE_NUMBER` VARCHAR(255) NOT NULL,
  `PASS_KEY` VARCHAR(255) NOT NULL,
  `IS_ADMIN` TINYINT(1) NOT NULL,
  `AVATAR` VARCHAR(255) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Dumping data for table `users`
--

INSERT INTO `USERS` (
  `ID_USER`,
  `CIN`,
  `FIRST_NAME`,
  `LAST_NAME`,
  `EMAIL`,
  `PHONE_NUMBER`,
  `PASS_KEY`,
  `IS_ADMIN`,
  `AVATAR`
) VALUES (
  1,
  'L649596',
  'Younes',
  'Rayes',
  'rayesyounes88@gmail.com',
  '0642599866',
  '$2y$10$Z0c6CkVEMMI7yH4Y7cuRcOFwCd99VnQrIRWkj1J4vVPI67f0m64Hm',
  1,
  ''
),
(
  71,
  'L641038',
  'Hassan',
  'Ajoulan',
  'hassanajoulan@mail.com',
  '0642519826',
  '$2y$10$M5m0RJULraamDaaofRekEeMf.goKgH/PYYwhbWtQ0xxGBKuZkW7iS',
  0,
  'assets/img/avatars/profile-default.png'
),
(
  72,
  'L6495163',
  'Amin',
  'Aamri',
  'aminaamri@mail.com',
  '0642129876',
  '$2y$10$pXMmybnq7VB.B7GxgRlAFOpeE9AGVj7Ttdspuu1JHZqQAOZHpWY5K',
  0,
  'assets/img/avatars/profile-default.png'
);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `BOOKS` ADD PRIMARY KEY (`ID_BOOK`);

--
-- Indexes for table `Borrowers`
--
ALTER TABLE `BORROWERS` ADD PRIMARY KEY (`ID_EMPRUNT`), ADD KEY `BOOK_KEY` (`ID_BOOK`), ADD KEY `USER_KEY` (`ID_USER`);

--
-- Indexes for table `users`
--
ALTER TABLE `USERS` ADD PRIMARY KEY (`ID_USER`), ADD UNIQUE KEY `EMAIL` (`EMAIL`), ADD UNIQUE KEY `CIN` (`CIN`), ADD UNIQUE KEY `PHONE_NUMBER` (`PHONE_NUMBER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `BOOKS` MODIFY `ID_BOOK` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `Borrowers`
--
ALTER TABLE `BORROWERS` MODIFY `ID_EMPRUNT` INT(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `USERS` MODIFY `ID_USER` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Borrowers`
--
ALTER TABLE `BORROWERS` ADD CONSTRAINT `BOOK_KEY` FOREIGN KEY (`ID_BOOK`) REFERENCES `BOOKS` (`ID_BOOK`) ON DELETE CASCADE ON UPDATE CASCADE, ADD CONSTRAINT `USER_KEY` FOREIGN KEY (`ID_USER`) REFERENCES `USERS` (`ID_USER`) ON DELETE CASCADE ON UPDATE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;