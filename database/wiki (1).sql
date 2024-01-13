-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 12, 2024 at 03:40 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wiki`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `Categorie_Name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `Categorie_Name`) VALUES
(1, 'History'),
(2, 'Sport'),
(4, 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int NOT NULL,
  `tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag`) VALUES
(2, 'sport'),
(8, 'History'),
(9, 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','author') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `role`) VALUES
(2, 'test', 'test@gmail.com', 87757646, '$2y$10$H/M9nSOkUe3FS8OQ0/B2FOQtjDg4JIwoJSKbg05glxah8vnpFjlyO', 'admin'),
(3, 'test1', 'test1@gmail.com', 335465, '$2y$10$3ZumBq3RB1lJvEUwXO8hheRGri7C0yGVnXMLCezpEI61XPyuY2yze', 'admin'),
(4, 'test2', 'test2@gmail.com', 435545466, '$2y$10$azETzbdv7pMxv7BnS14dqOOPBDdRGjuOb5pWAZK5q4moJfWPabh9O', 'admin'),
(5, 'yassin', 'yassin@gmail.com', 2535564, '$2y$10$WWT.rcI0M9IZAUxUqau1pe3kH3YWDNkMnvRcvqEvxa64siopSsoWC', 'admin'),
(6, 'tergui', 'tergui@gmail.com', 635577879, '$2y$10$ASb37wF3icseDioLkzQT6ec84PtcosR.1L9qvmbOjQNqFttDlkg3G', 'author');

-- --------------------------------------------------------

--
-- Table structure for table `wiki-tag`
--

CREATE TABLE `wiki-tag` (
  `wiki-id` int NOT NULL,
  `tag-id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wikis`
--

CREATE TABLE `wikis` (
  `id` int NOT NULL,
  `wiki_title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `status` enum('approved','archived') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `User_ID` int NOT NULL,
  `Categorie_ID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `wikis`
--

INSERT INTO `wikis` (`id`, `wiki_title`, `content`, `status`, `User_ID`, `Categorie_ID`) VALUES
(1, 'Football', 'This is something about football ', 'approved', 2, 2),
(3, 'Tergui', 'This is about tergui', 'archived', 6, 2),
(4, 'TESTTTTTT', 'This is a test', 'approved', 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `wiki-tag`
--
ALTER TABLE `wiki-tag`
  ADD KEY `wiki-tag_ibfk_1` (`tag-id`),
  ADD KEY `wiki-tag_ibfk_2` (`wiki-id`);

--
-- Indexes for table `wikis`
--
ALTER TABLE `wikis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Categorie_ID` (`Categorie_ID`),
  ADD KEY `wikis_ibfk_2` (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wikis`
--
ALTER TABLE `wikis`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wiki-tag`
--
ALTER TABLE `wiki-tag`
  ADD CONSTRAINT `wiki-tag_ibfk_1` FOREIGN KEY (`tag-id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wiki-tag_ibfk_2` FOREIGN KEY (`wiki-id`) REFERENCES `wikis` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `wikis`
--
ALTER TABLE `wikis`
  ADD CONSTRAINT `wikis_ibfk_1` FOREIGN KEY (`Categorie_ID`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wikis_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
