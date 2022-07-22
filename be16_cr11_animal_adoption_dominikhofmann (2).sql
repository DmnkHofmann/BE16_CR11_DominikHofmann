-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2022 at 11:31 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be16_cr11_animal_adoption_dominikhofmann`
--
CREATE DATABASE IF NOT EXISTS `be16_cr11_animal_adoption_dominikhofmann` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `be16_cr11_animal_adoption_dominikhofmann`;

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `animalid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `species` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `size` varchar(30) NOT NULL,
  `image` varchar(30) NOT NULL,
  `age` int(15) NOT NULL,
  `short_description` text NOT NULL,
  `nutrition` varchar(30) NOT NULL,
  `color` varchar(30) NOT NULL,
  `familyfriendly` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`animalid`, `name`, `species`, `gender`, `size`, `image`, `age`, `short_description`, `nutrition`, `color`, `familyfriendly`, `location`) VALUES
(1, 'King Kong', 'Gorilla', 'Male', 'Huge', '62db165a55963.jpg', 26, 'Gen manipulated Gorilla destroying NewYork', 'Meat', 'Black', 'No', 'Vienna'),
(2, 'Domo Alligator', 'Alligator', 'Femal', 'Big', 'alligator.jpg', 16, 'Likes to hide in the water', 'Meat', 'Grey', 'No', 'Salzburg'),
(3, 'Vincent', 'Raven', 'Male', 'Small', 'Vincent.jpg', 6, 'Smart little bird. Steals jewelery', 'worms', 'black', 'yes', 'Kärnten'),
(4, 'Ben', 'Bear', 'Male', 'Big', 'bear.jpg', 4, 'Cozy fur', 'meat', 'bown', 'no', 'Niederoesterreich'),
(5, 'Stormy', 'Dog', 'Female', 'Normal', 'dog.jpg', 7, 'Golden Retriever with a nice smile', 'meat', 'lightbrown', 'yes', 'Oberoesterreich'),
(6, 'Sleepy', 'Sloth', 'female', 'small', 'sloth.jpg', 18, 'Sleeps all day', 'plants', 'brown', 'yes', 'Burgenland'),
(7, 'Nemo', 'Fish', 'male', 'small', 'nemo.jpg', 3, 'Little clownfish. Likes to explore things', 'plants', 'red', 'yes', 'Vorarlberg'),
(8, 'Pawsy', 'Cat', 'female', 'normal', 'cat.jpg', 12, 'Lazy cat. Just eats and sleep', 'meat', 'red', 'yes', 'Schweiz'),
(13, 'Ratty', 'Rat', 'Female', 'Small', '62db009f9d040.jpg', 3, 'Just a stinky rat', 'Meat', 'Grey', 'Yes', 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `animal_adoption`
--

CREATE TABLE `animal_adoption` (
  `id` int(11) NOT NULL,
  `fk_animal_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `adoption_date_start` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animal_adoption`
--

INSERT INTO `animal_adoption` (`id`, `fk_animal_id`, `fk_user_id`, `adoption_date_start`) VALUES
(1, 1, 2, '2022-07-23'),
(2, 1, 2, '0000-00-00'),
(3, 1, 2, '2022-07-23'),
(4, 1, 2, '2022-07-23'),
(5, 1, 2, '2022-07-23'),
(6, 1, 2, '2022-07-10'),
(7, 1, 2, '2022-07-10'),
(8, 1, 2, '2022-07-07'),
(9, 1, 2, '2022-07-17'),
(10, 1, 2, '2022-07-31'),
(11, 1, 2, '2022-07-10'),
(12, 1, 2, '2022-07-24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `status` enum('user','adm') NOT NULL DEFAULT 'user',
  `phonenumber` varchar(50) DEFAULT NULL,
  `adress` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `password`, `date_of_birth`, `email`, `picture`, `status`, `phonenumber`, `adress`) VALUES
(1, 'Dominik', 'Hofmann', '26ae9f97f23e32c9c277a54e4034ab1c7d5cb0a5a010f9a6708b199e2ec7e47f', '1993-06-04', 'dmnkhofmann@gmail.com', '62da76c393a24.jpg', 'adm', '123412345', 'Reviewstreet 2'),
(2, 'Medusa', 'Old', '26ae9f97f23e32c9c277a54e4034ab1c7d5cb0a5a010f9a6708b199e2ec7e47f', '1720-06-04', 'medusa@gmail.com', '62dab60871bf0.jpg', 'user', '0123456789', 'Codegasse 6'),
(3, 'Bruce', 'Wayne', '26ae9f97f23e32c9c277a54e4034ab1c7d5cb0a5a010f9a6708b199e2ec7e47f', '1985-01-04', 'batman@gmail.com', '62db16c72960f.jpg', 'user', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`animalid`);

--
-- Indexes for table `animal_adoption`
--
ALTER TABLE `animal_adoption`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_animal_id` (`fk_animal_id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `animalid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `animal_adoption`
--
ALTER TABLE `animal_adoption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animal_adoption`
--
ALTER TABLE `animal_adoption`
  ADD CONSTRAINT `animal_adoption_ibfk_1` FOREIGN KEY (`fk_animal_id`) REFERENCES `animals` (`animalid`),
  ADD CONSTRAINT `animal_adoption_ibfk_2` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
