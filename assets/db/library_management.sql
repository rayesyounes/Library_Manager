-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2023 at 12:29 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


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

CREATE TABLE `books` (
  `ID_Book` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `ISBN` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`ID_Book`, `Title`, `Author`, `ISBN`, `Quantity`, `Picture`) VALUES
(20, 'Emotional intelligence ', 'Robert Julmane', 'AZ34538009', 5, 'assets/img/books/9780553804911_l.jpg'),
(23, 'Getting to Yes', 'Robert ghill', 'AZ34532639', 5, 'assets/img/books/Getting to Yes.jpg'),
(24, 'The Bucket List', 'adrian bianchi', 'AF6294122', 2, 'assets/img/books/The Bucket List.jpg'),
(25, 'Can\'t hurt me', 'David Goggins', 'REF598354', 5, 'assets/img/books/Can\'t Hurt Me.jpg'),
(26, 'What color is your parachute ', 'dave huligo', 'QM21463756', 2, 'assets/img/books/What Color Is Your Parachute.jpg'),
(27, 'The Wisdom of the Bullfrog', 'Sebastian vettel', 'AFV894122', 5, 'assets/img/books/The Wisdom of the Bullfrog.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `borrowers`
--

CREATE TABLE `borrowers` (
  `ID_Borrower` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `ID_Book` int(11) NOT NULL,
  `Issue_Date` date NOT NULL,
  `Return_Date` date NOT NULL,
  `Status` enum('Issued','Returned','Not Returned','Ordered') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrowers`
--

INSERT INTO `borrowers` (`ID_Borrower`, `ID_User`, `ID_Book`, `Issue_Date`, `Return_Date`, `Status`) VALUES
(40, 71, 20, '2023-06-15', '2023-06-17', 'Returned'),
(41, 71, 24, '2023-06-15', '2023-06-24', 'Returned'),
(42, 72, 26, '2023-06-15', '2023-07-09', 'Returned'),
(43, 71, 24, '2023-06-15', '2023-06-13', 'Returned'),
(44, 72, 26, '2023-06-15', '2023-07-01', 'Returned'),
(45, 71, 23, '2023-06-15', '2023-06-25', 'Returned'),
(46, 71, 26, '2023-06-15', '2023-06-23', 'Issued'),
(47, 72, 23, '2023-06-15', '2023-06-25', 'Ordered');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID_User` int(11) NOT NULL,
  `Cin` varchar(255) NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone_Number` varchar(255) NOT NULL,
  `Pass_key` varchar(255) NOT NULL,
  `Is_Admin` tinyint(1) NOT NULL,
  `Avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID_User`, `Cin`, `First_Name`, `Last_Name`, `Email`, `Phone_Number`, `Pass_key`, `Is_Admin`, `Avatar`) VALUES
(1, 'L649596', 'Younes', 'Rayes', 'rayesyounes@email.com', '0642599866', '$2y$10$Z0c6CkVEMMI7yH4Y7cuRcOFwCd99VnQrIRWkj1J4vVPI67f0m64Hm', 1, 'assets/img/avatars/avatar_6488e57c185a8_stockholm.png'),
(71, 'L641038', 'Hassan', 'Ajoulan', 'hassanajoulan@email.com', '0642519826', '$2y$10$M5m0RJULraamDaaofRekEeMf.goKgH/PYYwhbWtQ0xxGBKuZkW7iS', 0, 'assets/img/avatars/avatar_648977f796b50_1.jpg'),
(72, 'L6495163', 'Amin', 'Aamri', 'aminaamri@email.com', '0642129876', '$2y$10$pXMmybnq7VB.B7GxgRlAFOpeE9AGVj7Ttdspuu1JHZqQAOZHpWY5K', 0, 'assets/img/avatars/avatar_648b8e30ee87f_10.png'),
(73, 'L472499', 'Mohssin', 'Laarbii', 'mohssinlaarbi@email.com', '0647299866', '$2y$10$cHompdUSCvkwHiy0AdI/cueC67KlX4t75HNtfKJQyp3TuCS/AjVdK', 0, 'assets/img/avatars/avatar_648b8e70155fb_Download premium vector of Blue fluid fluid patterned mobile phone wallpaper vector by Kappy about iphone wallpaper, blue wallpaper iphone, blue, marble, and abstract 1219759.jpg'),
(74, 'admin', 'admin', 'user', 'admin@email.com', '0123456789', '$2y$10$szMPSpWFd45C6TMzn8SJ8elEvxluLdIKxxCvdhWfZg5PBf4qgwNCO', 1, 'assets/img/avatars/profile-default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ID_Book`);

--
-- Indexes for table `borrowers`
--
ALTER TABLE `borrowers`
  ADD PRIMARY KEY (`ID_Borrower`),
  ADD KEY `Book_key` (`ID_Book`),
  ADD KEY `User_Key` (`ID_User`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_User`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Cin` (`Cin`),
  ADD UNIQUE KEY `Phone_Number` (`Phone_Number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `ID_Book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `borrowers`
--
ALTER TABLE `borrowers`
  MODIFY `ID_Borrower` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrowers`
--
ALTER TABLE `borrowers`
  ADD CONSTRAINT `Book_key` FOREIGN KEY (`ID_Book`) REFERENCES `books` (`ID_Book`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `User_Key` FOREIGN KEY (`ID_User`) REFERENCES `users` (`ID_User`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
