-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2022 at 05:37 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud-task`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookinfo`
--

CREATE TABLE `bookinfo` (
  `sno` int(11) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `image_file` varchar(300) NOT NULL,
  `borrow_date` date NOT NULL,
  `return_date` date NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `member_type` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `academic_class` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookinfo`
--

INSERT INTO `bookinfo` (`sno`, `book_name`, `image_file`, `borrow_date`, `return_date`, `student_name`, `member_type`, `description`, `academic_class`) VALUES
(66, 'Serina', ' ./images/jafar.jpg', '2022-04-12', '2022-04-13', 'shumon', 'Monthly', 'This is a science fiction book', '7'),
(67, 'Biggyani Safadar alir moha moha abishkar', ' ./images/bigggani.jpg', '2022-03-29', '2022-04-12', 'Sumaiya afrin', 'Yearly', 'this is a science fiction book', ' class 6'),
(70, 'Ami Topu', ' ./images/Ami Topu.jpg', '2022-03-29', '2022-04-12', 'Akash', 'Monthly', 'This is a noble book', ' class 10'),
(71, 'Ami Topu', ' ./images/Ami Topu.jpg', '2022-03-29', '2022-04-12', 'Minhaj', 'Monthly', 'This is a noble book', '8'),
(72, 'Biggyani Safadar alir moha moha abishkar', ' ./images/bigggani.jpg', '2022-03-29', '2022-04-12', 'Minhaj', 'Monthly', 'This is a noble book', '8'),
(73, 'Biggyani Safadar alir moha moha abishkar', ' ./images/bigggani.jpg', '2022-03-29', '2022-04-12', 'Minhaj', 'Monthly', 'This is a noble book', '8'),
(74, 'Biggyani Safadar alir moha moha abishkar', ' ./images/bigggani.jpg', '2022-03-29', '2022-04-12', 'Minhaj', 'Monthly', 'This is a noble book', '8'),
(75, 'Biggyani Safadar alir moha moha abishkar', ' ./images/bigggani.jpg', '2022-03-29', '2022-04-12', 'Minhaj', 'Monthly', 'This is a noble book', '8'),
(76, 'Macbeth', ' ./images/Macbeth.jpg', '2022-04-05', '2022-04-12', 'Saimon Akram', 'Monthly', 'This is a noble book', '12'),
(77, 'A brief history of time', ' ./images/history-of-time.jpg', '2022-04-06', '2022-04-19', 'Saimon Akram', 'Monthly', 'This is a Scientific Book', '12'),
(78, 'Serina', ' ./images/jafar.jpg', '2022-04-12', '2022-04-13', 'shumon', 'Monthly', 'This is a science fiction book', '7'),
(79, 'A brief history of time', ' ./images/history-of-time.jpg', '2022-04-06', '2022-04-19', 'Saimon Akram', 'Monthly', 'This is a Scientific Book', '12'),
(80, 'A brief history of time', ' ./images/history-of-time.jpg', '2022-04-06', '2022-04-19', 'Saimon Akram', 'Monthly', 'This is a Scientific Book', '12'),
(81, 'A brief history of time', ' ./images/history-of-time.jpg', '2022-04-06', '2022-04-19', 'Saimon Akram', 'Monthly', 'This is a Scientific Book', '12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookinfo`
--
ALTER TABLE `bookinfo`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookinfo`
--
ALTER TABLE `bookinfo`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
