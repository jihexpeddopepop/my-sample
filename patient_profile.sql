-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2024 at 10:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patient_profile`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `users_id_card` char(13) NOT NULL,
  `users_firstname` varchar(255) NOT NULL,
  `users_lastname` varchar(255) NOT NULL,
  `users_email` varchar(255) NOT NULL,
  `users_phonenumber` char(11) NOT NULL,
  `users_postingdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `users_detail_date` date NOT NULL,
  `users_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `users_id_card`, `users_firstname`, `users_lastname`, `users_email`, `users_phonenumber`, `users_postingdate`, `users_detail_date`, `users_address`) VALUES
(580, '1479300003016', 'Runglawan', 'Haiwang', 'dongdong4845@gmail.com', '0930578688', '2024-11-14 20:38:47', '2024-11-15', '145/1'),
(582, '1479300000000', 'Runglawan', 'Haiwang', 'dongdong4845@gmail.com', '0930578688', '2024-11-14 20:41:20', '2024-11-22', '133'),
(583, '1479300000001', 'Runglawang', 'Haiwang', 'dongdong4845@admail.com', '0930578687', '2024-11-14 20:48:20', '2024-11-28', '455/2 '),
(584, '1479300003002', 'Nuttawut', 'Komaram', 'dongdong458@gmail.com', '0973052207', '2024-11-14 20:55:32', '2024-11-29', '191/1 บุรีรัมย์');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=585;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
