-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2024 at 10:57 AM
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
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `ISBN` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `pubdate` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `genre`, `ISBN`, `status`, `pubdate`) VALUES
(1, 'Alamat ni Juan', 'Bob Ong', 'Comedy', '12345', 'Available', '0000'),
(2, 'Clean Code', 'Robert Cecil Martin', 'Technology', '123456', 'Available', '2008'),
(3, 'The Great Gatsby', 'F. Scott Fitzgerald', 'Classic', '978-0-7432-7356-5', 'Available', '1925'),
(4, 'To Kill a Mockingbird', 'Harper Lee', 'Fiction', '978-0-06-112008-4', 'Available', '1960'),
(5, '1984', 'George Orwell', 'Dystopian', '978-0-452-28423-4', 'Available', '1949'),
(6, 'Pride and Prejudice', 'Jane Austen', 'Romance', '978-0-19-953556-9', 'Available', '0000'),
(7, 'The Hobbit', 'J.R.R. Tolkien', 'Fantasy', '978-0-618-00221-4', 'Available', '1937'),
(8, 'The Catcher in the Rye', 'J.D. Salinger', 'Coming-of-Age', '978-0-316-76948-0', 'Available', '1951'),
(9, 'The Da Vinci Code', 'Dan Brown', 'Mystery', '978-0-385-50420-5', 'Available', '2003'),
(10, 'Harry Potter and the Sorc', 'J.K. Rowling', 'Fantasy', '978-0-590-35340-3', 'Available', '1997'),
(11, 'The Lord of the Rings', 'J.R.R. Tolkien', 'Fantasy', '978-0-544-27344-3', 'Available', '1954'),
(12, 'The Hitchhiker\'s Guide to', 'Douglas Adams', 'Science Fiction', '978-0-345-39181-3', 'Available', '1979');

-- --------------------------------------------------------

--
-- Table structure for table `borrows`
--

CREATE TABLE `borrows` (
  `id` int(11) NOT NULL,
  `ISBN` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `borrow_date` date NOT NULL,
  `due_date` date NOT NULL,
  `count` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `user_type`, `status`) VALUES
(17, 'Lilia', 'kda', 'lilia@gmail.com', '$2y$10$7Popn0Gt8ZMkGJ6cTw4OE.0H9VQLZAx4wvxOKtPhSph8XAgmdS6ni', 'user', 'Active'),
(18, 'jayson', 'teleb', 'jayson@gmail.com', '$2y$10$UtOV4hu6bAsCjfs5wbknC.gJhF9rUJzKQzSlNShhTgz6w2ufUObFy', 'user', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrows`
--
ALTER TABLE `borrows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `borrows`
--
ALTER TABLE `borrows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
