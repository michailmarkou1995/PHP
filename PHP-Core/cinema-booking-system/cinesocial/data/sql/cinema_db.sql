-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2021 at 06:39 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinema_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(1) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bookingtable`
--

CREATE TABLE `bookingtable` (
  `bookingID` int(11) NOT NULL,
  `movieName_fk` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `bookingTheatre_fk` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `bookingTheatreHall_fk` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `bookingType_fk` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `bookingDate_fk` date NOT NULL,
  `bookingTime_fk` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `bookingFName` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `bookingLName` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `bookingPNumber` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `bookingAccount_fk` varchar(256) CHARACTER SET utf8mb4 NOT NULL,
  `seatP` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookingtable`
--

INSERT INTO `bookingtable` (`bookingID`, `movieName_fk`, `bookingTheatre_fk`, `bookingTheatreHall_fk`, `bookingType_fk`, `bookingDate_fk`, `bookingTime_fk`, `bookingFName`, `bookingLName`, `bookingPNumber`, `bookingAccount_fk`, `seatP`, `price`) VALUES
(2, 'Justice League 2021', 'odeon', 'main-hall poseidon', 'imax', '2021-04-02', '14:00', 'MIONTRAGK', 'MARKOU', '1111111111', 'Backtrackpower@gmail.com', '2', ''),
(3, 'Avengers Endgame', 'odeon', 'main-hall poseidon', 'imax', '2021-04-02', '14:00', 'bourakis', 'bourakis', '111111111111', 'anonymous', '2', ''),
(4, 'Avengers Endgame', 'odeon', 'vip poseidon', 'imax', '2021-04-02', '14:00', 'bourakis', 'bourakis', '111111111111', 'anonymous', '2', ''),
(197, 'Avengers infinity war', 'odeon', 'main-hall artemis', 'imax', '2021-04-16', '09:00', 'Michail', 'Markou', '+30690899011', 'anonymous', '6', ''),
(198, 'Avengers infinity war', 'odeon', 'main-hall artemis', 'imax', '2021-04-16', '09:00', 'MIONTRAGK', 'MARKOU', '+30690899011', 'anonymous', '7', ''),
(218, 'Avengers infinity war', 'odeon', 'main-hall artemis', 'imax', '2021-04-16', '09:00', 'MIONTRAGK', 'MARKOU', '+30690899011', 'anonymous', '8', ''),
(219, 'Avengers infinity war', 'odeon', 'main-hall artemis', 'imax', '2021-04-16', '09:00', 'MIONTRAGK', 'MARKOU', '+30690899011', 'anonymous', '9', ''),
(220, 'Avengers infinity war', 'odeon', 'vip poseidon', '3d', '2021-04-02', '09:00', 'tf', 'tf', '1234', 'anonymous', '10', ''),
(221, 'Avengers infinity war', 'odeon', 'main-hall poseidon', '3d', '2021-04-16', '09:00', 'asd', 'asdasd', '1234', 'anonymous', '10', ''),
(223, 'Avengers infinity war', 'odeon', 'main-hall poseidon', '3d', '2021-04-16', '09:00', 'asdasd', 'asdasd', '1q2343', 'anonymous', '13', ''),
(224, 'Avengers infinity war', 'odeon', 'main-hall artemis', 'imax', '2021-04-02', '09:00', 'Michail', 'Markou', '+30690899011', 'Backtrackpower@gmail.com', '14', ''),
(226, 'Avengers infinity war', 'odeon', 'main-hall artemis', 'imax', '2021-04-16', '09:00', 'Michail', 'Markou', '+30690899011', 'Backtrackpower@gmail.com', '3', ''),
(227, 'Avengers infinity war', 'odeon', 'main-hall artemis', 'imax', '2021-04-16', '09:00', 'Michail', 'Markou', '+30690899011', 'Backtrackpower@gmail.com', '4', ''),
(228, 'Captain Marvel', 'odeon', 'main-hall poseidon', 'imax', '2021-04-16', '09:00', 'Michail', 'Markou', '+30690899011', 'Backtrackpower@gmail.com', '4', ''),
(233, 'Avengers Endgame', 'odeon', 'vip poseidon', '3d', '2020-04-03', '09:00', 'MichailTEST', 'Markou', '+30690899011', 'anonymous', '11', ''),
(234, 'Avengers infinity war', 'odeon', 'vip poseidon', '3d', '2020-04-03', '09:00', 'IMLPODE', 'Markou', '+30690899011', 'anonymous', '11', ''),
(236, 'Captain Marvel', 'test3', 'vip artemis', '3d', '2021-04-16', '09:00', 'Michail', 'Markou', '+30690899011', 'anonymous', '11', ''),
(248, 'Avengers infinity war', 'test3', 'main-hall artemis', 'imax', '2021-04-16', '09:00', 'Michail', 'Markou', '+30690899011', 'anonymous', '1', ''),
(249, 'Captain Marvel', 'test3', 'vip artemis', 'imax', '2020-04-03', '09:00', 'MIONTRAGK', 'MARKOU', '+30690899011', 'anonymous', '2', ''),
(250, 'Avengers Endgame', 'odeon', 'vip poseidon', '3d', '2021-04-02', '13:00', 'MIONTRAGK', 'MARKOU', '+30690899011', 'anonymous', '1', ''),
(251, 'Avengers Endgame', 'odeon', 'vip poseidon', '3d', '2021-04-02', '13:00', 'MIONTRAGK', 'MARKOU', '+30690899011', 'anonymous', '2', ''),
(252, 'Avengers Endgame', 'odeon', 'vip poseidon', '3d', '2021-04-02', '13:00', 'MIONTRAGK', 'MARKOU', '306908990119', 'anonymous', '3', ''),
(253, 'Avengers Endgame', 'odeon', 'vip poseidon', '3d', '2021-04-02', '13:00', 'MIONTRAGK', 'MARKOU', '+30690899011', 'anonymous', '4', ''),
(254, 'Avengers Endgame', 'odeon', 'vip poseidon', '3d', '2021-04-02', '13:00', 'MIONTRAGK', 'MARKOU', '+30690899011', 'anonymous', '6', ''),
(255, 'Avengers Endgame', 'odeon', 'vip poseidon', '3d', '2021-04-02', '13:00', 'MIONTRAGK', 'MARKOU', '+30690899011', 'anonymous', '5', ''),
(256, 'Avengers Endgame', 'odeon', 'vip poseidon', '3d', '2021-04-02', '13:00', 'MIONTRAGK', 'MARKOU', '+30690899011', 'anonymous', '7', ''),
(257, 'Avengers Endgame', 'odeon', 'vip poseidon', '3d', '2021-04-02', '13:00', 'MIONTRAGK', 'MARKOU', '+30690899011', 'anonymous', '8', ''),
(258, 'Avengers Endgame', 'odeon', 'vip poseidon', '3d', '2021-04-02', '13:00', 'MIONTRAGK', 'MARKOU', '+30690899011', 'anonymous', '9', ''),
(259, 'Avengers Endgame', 'odeon', 'vip poseidon', '3d', '2021-04-02', '13:00', 'MIONTRAGK', 'MARKOU', '+30690899011', 'anonymous', '9', ''),
(260, 'Avengers Endgame', 'odeon', 'vip poseidon', '3d', '2021-04-02', '13:00', 'MIONTRAGK', 'MARKOU', '+30690899011', 'anonymous', '10', ''),
(261, 'Avengers Endgame', 'odeon', 'vip poseidon', '3d', '2021-04-02', '13:00', 'MIONTRAGK', 'MARKOU', '+30690899011', 'anonymous', '11', ''),
(263, 'Avengers Endgame', 'odeon', 'vip poseidon', '3d', '2021-04-02', '13:00', 'MIONTRAGK', 'MARKOU', '+30690899011', 'anonymous', '13', ''),
(267, 'Avengers Endgame', 'odeon', 'vip poseidon', '3d', '2021-04-02', '13:00', 'MIONTRAGK', 'MARKOU', '+30690899011', 'anonymous', '12', ''),
(268, 'Avengers Endgame', 'odeon', 'vip poseidon', '3d', '2021-04-02', '13:00', 'MIONTRAGK', 'MARKOU', '+30690899011', 'anonymous', '14', ''),
(269, 'Avengers infinity war', 'test3', 'main-hall artemis', 'imax', '2021-04-16', '13:00', 'MIONTRAGK', 'MARKOU', '+30690899011', 'Backtrackpower@gmail.com', '22', ''),
(270, 'Avengers infinity war', 'test3', 'main-hall artemis', 'imax', '2021-04-16', '13:00', 'MIONTRAGK', 'MARKOU', '+30690899011', 'Backtrackpower@gmail.com', '1', ''),
(271, 'Avengers Endgame', 'odeon', 'vip poseidon', '3d', '2021-04-02', '13:00', 'MIONTRAGK', 'MARKOU', '+30690899011', 'anonymous', '15', ''),
(306, 'Avengers infinity war', 'odeon', 'main-hall poseidon', '3d', '2021-04-16', '09:00', 'Michail', 'Markou', '+306908990119', 'Backtrackpower@gmail.com', '2', '');

-- --------------------------------------------------------

--
-- Table structure for table `datetable`
--

CREATE TABLE `datetable` (
  `id` int(11) NOT NULL,
  `date_uniq` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datetable`
--

INSERT INTO `datetable` (`id`, `date_uniq`) VALUES
(11, '2020-04-03'),
(1, '2021-04-01'),
(2, '2021-04-02'),
(19, '2021-04-16');

-- --------------------------------------------------------

--
-- Table structure for table `discounttable`
--

CREATE TABLE `discounttable` (
  `id` int(11) NOT NULL,
  `tickets` varchar(50) NOT NULL,
  `discountprice` varchar(50) NOT NULL,
  `admin` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacktable`
--

CREATE TABLE `feedbacktable` (
  `msgID` int(12) NOT NULL,
  `senderfName` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `senderlName` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `sendereMail` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `senderfeedback` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `account_fk` varchar(100) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacktable`
--

INSERT INTO `feedbacktable` (`msgID`, `senderfName`, `senderlName`, `sendereMail`, `senderfeedback`, `account_fk`) VALUES
(4, 'Michail', 'Markou', 'backtrackpower@gmail.com', 'great movies', 'backtrackpower@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `hallstable`
--

CREATE TABLE `hallstable` (
  `id` int(100) NOT NULL,
  `tName_fk` varchar(50) NOT NULL,
  `date_added` datetime NOT NULL,
  `removed` varchar(3) NOT NULL,
  `hallName` varchar(50) NOT NULL,
  `hallType` varchar(10) NOT NULL,
  `seatsAvailable` int(50) NOT NULL,
  `hall_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hallstable`
--

INSERT INTO `hallstable` (`id`, `tName_fk`, `date_added`, `removed`, `hallName`, `hallType`, `seatsAvailable`, `hall_id`) VALUES
(2, 'odeon', '2021-04-17 12:52:58', 'no', 'main-hall poseidon', '3d', 50, 1),
(4, 'odeon', '2021-04-17 12:52:58', 'no', 'vip poseidon', '3d', 50, 1),
(8, 'test3', '2021-04-17 12:52:58', 'no', 'vip artemis', 'imax', 25, 2),
(9, 'test3', '2021-04-17 12:52:58', 'no', 'main-hall artemis', 'imax', 25, 2);

-- --------------------------------------------------------

--
-- Table structure for table `movietable`
--

CREATE TABLE `movietable` (
  `movieID` int(100) NOT NULL,
  `movieImgCover` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `movieImgPrev` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `movieTitle` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `movieGenre` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `movieDuration` int(11) NOT NULL,
  `movieRelDate` date NOT NULL,
  `movieDirector` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `movieActors` varchar(256) CHARACTER SET utf8mb4 NOT NULL,
  `urlPath` varchar(256) CHARACTER SET utf8mb4 NOT NULL,
  `admin_fk` varchar(25) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movietable`
--

INSERT INTO `movietable` (`movieID`, `movieImgCover`, `movieImgPrev`, `movieTitle`, `movieGenre`, `movieDuration`, `movieRelDate`, `movieDirector`, `movieActors`, `urlPath`, `admin_fk`) VALUES
(1, '../../web/images/movieTableCover/movie-poster-1.jpg', '../../web/images/movieTablePrev/movie-thumb-1.jpg', 'Captain Marvel', ' Action, Adventure, Sci-Fi ', 220, '2018-10-18', 'Anna Boden, Ryan Fleck', 'Brie Larson, Samuel L. Jackson, Ben Mendelsohn, Annette Bening', 'Z1BCujX3pw8', 'admin'),
(2, '../../web/images/movieTableCover/movie-poster-2.jpg', '../../web/images/movieTableCover/movie-poster-2.jpg', 'Justice League 2021', ' Action, Adventure, Fantasy', 245, '2021-03-18', 'Zack Snyder', 'Ben Affleck, Henry Cavill, Amy Adams, Gal Gadot, Ray Fisher, Jason Momoa', 'vM-Bja2Gy04', 'admin'),
(3, '../../web/images/movieTableCover/movie-poster-3.jpg', '../../web/images/movieTablePrev/movie-thumb-3.jpg', 'Avengers Endgame', ' Action, Adventure, Drama ', 185, '2019-04-24', 'Anthony Russo, Joe Russo', 'Mark Ruffalo, Scarlett Johansson, Jeremy Renner, Chris Evans', '6ZfuNTqbHE8', 'admin'),
(4, '../../web/images/movieTableCover/movie-poster-4.jpg', '../../web/images/movieTablePrev/movie-thumb-4.jpg', 'Avengers infinity war', ' Action, Adventure, Sci-Fi ', 160, '2018-04-26', 'Anthony Russo, Joe Russo', 'Mark Ruffalo, Scarlett Johansson, Jeremy Renner, Chris Evans', 'TcMBFSGVi1c', 'admin'),
(5, '../../web/images/movieTableCover/movie-poster-5.jpg', '../../web/images/movieTablePrev/movie-thumb-5.jpg', 'Inception', ' Action, Adventure, Sci-Fi ', 160, '2010-08-24', 'Christopher Nolan', 'Leonardo DiCaprio, Joseph Gordon-Levitt, Elliot Page', 'YoHD9XEInc0', 'admin'),
(6, '../../web/images/movieTableCover/movie-poster-6.jpg', '../../web/images/movieTablePrev/movie-thumb-6.jpg', 'Interstellar', ' Drama, Adventure, Sci-Fi ', 180, '2014-11-06', 'Christopher Nolan', 'Matthew McConaughey, Anne Hathaway, Jessica Chastain', 'zSWdZVtXT7E', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `scheduletable`
--

CREATE TABLE `scheduletable` (
  `id` int(100) NOT NULL,
  `movie_play_fk` varchar(100) NOT NULL,
  `date_play_fk` date NOT NULL,
  `time_play` varchar(100) NOT NULL,
  `duration_play_fk` int(11) NOT NULL,
  `theatre_name_fk` varchar(50) NOT NULL,
  `hall_name_fk` varchar(50) NOT NULL,
  `hall_type_fk` varchar(10) NOT NULL,
  `movie_synopsis` varchar(256) NOT NULL,
  `urlPath_fk` varchar(256) NOT NULL,
  `admin_fk` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scheduletable`
--

INSERT INTO `scheduletable` (`id`, `movie_play_fk`, `date_play_fk`, `time_play`, `duration_play_fk`, `theatre_name_fk`, `hall_name_fk`, `hall_type_fk`, `movie_synopsis`, `urlPath_fk`, `admin_fk`) VALUES
(3, 'Justice League 2021', '2021-04-01', '09:00', 245, 'test3', 'main-hall artemis', 'imax', 'Ethan and team take on their most impossible mission yet, eradicating the Syndicate - an International rogue organization', 'vM-Bja2Gy04', 'admin'),
(4, 'Avengers Endgame', '2021-04-02', '13:00', 245, 'odeon', 'vip poseidon', '3d', 'Ethan and team take on their most impossible mission yet, eradicating the Syndicate - an International rogue organization', '6ZfuNTqbHE8', 'admin'),
(24, 'Avengers infinity war', '2021-04-02', '13:00', 245, 'odeon', 'vip poseidon', '3d', 'Ethan and team take on their most impossible mission yet, eradicating the Syndicate - an International rogue organization', '6ZfuNTqbHE8', 'admin'),
(27, 'Captain Marvel', '2020-04-03', '09:00', 245, 'test3', 'vip artemis', 'imax', 'aadsada', 'Z1BCujX3pw8', 'admin'),
(29, 'Captain Marvel', '2020-04-03', '09:00', 245, 'odeon', 'main-hall poseidon', '3d', 'aadsada', 'Z1BCujX3pw8', 'admin'),
(45, 'Captain Marvel', '2020-04-03', '09:00', 245, 'odeon', 'vip poseidon', '3d', 'avd', 'Z1BCujX3pw8', 'admin'),
(70, 'Avengers infinity war', '2021-04-16', '09:00', 245, 'odeon', 'main-hall poseidon', '3d', 'aadsada', 'Z1BCujX3pw8', 'admin'),
(71, 'Avengers infinity war', '2021-04-16', '13:00', 245, 'test3', 'vip artemis', 'imax', 'Ethan and team take on their most impossible mission yet, eradicating the Syndicate - an International rogue organization', '6ZfuNTqbHE8', 'admin'),
(72, 'Avengers infinity war', '2021-04-02', '14:00', 245, 'test3', 'vip artemis', 'imax', 'Ethan and team take on their most impossible mission yet, eradicating the Syndicate - an International rogue organization', '6ZfuNTqbHE8', 'admin'),
(73, 'Avengers infinity war', '2021-04-02', '13:00', 245, 'test3', 'main-hall artemis', 'imax', 'Ethan and team take on their most impossible mission yet, eradicating the Syndicate - an International rogue organization', '6ZfuNTqbHE8', 'admin'),
(92, 'Avengers infinity war', '2021-04-16', '09:00', 245, 'test3', 'vip artemis', 'imax', 'Ethan and team take on their most impossible mission yet, eradicating the Syndicate - an International rogue organization', '6ZfuNTqbHE8', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`) VALUES
(1, 'php4.jpg'),
(2, 'php4.jpg'),
(3, 'php4.jpg'),
(4, 'php4.jpg'),
(5, 'php4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `test1`
--

CREATE TABLE `test1` (
  `increase` int(11) NOT NULL,
  `names` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test1`
--

INSERT INTO `test1` (`increase`, `names`) VALUES
(5, 'dasd'),
(6, 'dasd'),
(7, 'enadio');

-- --------------------------------------------------------

--
-- Table structure for table `theatretable`
--

CREATE TABLE `theatretable` (
  `id` int(100) NOT NULL,
  `tName_pk` varchar(50) NOT NULL,
  `tHalls` int(15) NOT NULL,
  `tAvailable` tinyint(1) NOT NULL,
  `admin_tk` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theatretable`
--

INSERT INTO `theatretable` (`id`, `tName_pk`, `tHalls`, `tAvailable`, `admin_tk`) VALUES
(1, 'odeon', 15, 1, 'admin'),
(6, 'test3', 15, 1, 'admin'),
(13, 'cinerama', 20, 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) CHARACTER SET utf8mb4 NOT NULL,
  `last_name` varchar(25) CHARACTER SET utf8mb4 NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `signup_date` date NOT NULL,
  `profile_pic` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `num_posts` int(11) NOT NULL,
  `num_likes` int(11) NOT NULL,
  `user_closed` varchar(3) CHARACTER SET utf8mb4 NOT NULL,
  `friend_array` text CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `signup_date`, `profile_pic`, `num_posts`, `num_likes`, `user_closed`, `friend_array`) VALUES
(1, 'Michail', 'Markou', 'michail_markou', 'Backtrackpower@gmail.com', '2de40e2a5400099442596fc18d668132', '2021-03-27', 'assets/images/profile_pics/defaults/head_emerald.png', 0, 0, 'no', ','),
(5, 'Sylvia', 'Markou', 'sylvia_markou', 'Sylvimarkou@hotmail.com', '2de40e2a5400099442596fc18d668132', '2021-03-27', 'assets/images/profile_pics/defaults/head_deep_blue.png', 0, 0, 'no', ','),
(8, 'anonymous', 'anonymous', 'anonymous_anonymous', 'anonymous', '', '2021-04-17', '', 0, 0, '', ''),
(9, 'Michail', 'Markou', 'michail_markou_1', 'Backtrackpower1@gmail.com', '2de40e2a5400099442596fc18d668132', '2021-05-10', 'assets/images/profile_pics/defaults/head_deep_blue.png', 0, 0, 'no', ','),
(10, 'Michail', 'Markou', 'michail_markou_1_2', 'Backtrackpower2@gmail.com', '2de40e2a5400099442596fc18d668132', '2021-05-10', 'assets/images/profile_pics/defaults/head_emerald.png', 0, 0, 'no', ','),
(11, 'Michail', 'Markou', 'michail_markou_1_2_3', 'Backtrackpower3@gmail.com', '2de40e2a5400099442596fc18d668132', '2021-05-10', 'assets/images/profile_pics/defaults/head_deep_blue.png', 0, 0, 'no', ','),
(12, 'Michail', 'Markou', 'michail_markou_1_2_3_4', 'Backtrackpower5@gmail.com', '2de40e2a5400099442596fc18d668132', '2021-05-10', 'assets/images/profile_pics/defaults/head_deep_blue.png', 0, 0, 'no', ','),
(13, 'Michail', 'Markou', 'michail_markou_1_2_3_4_5', 'Backtrackpower6@gmail.com', '2de40e2a5400099442596fc18d668132', '2021-05-10', 'assets/images/profile_pics/defaults/head_deep_blue.png', 0, 0, 'no', ','),
(14, 'Michail', 'Markou', 'michail_markou_1_2_3_4_5_6', 'Backtrackpower7@gmail.com', '2de40e2a5400099442596fc18d668132', '2021-05-10', 'assets/images/profile_pics/defaults/head_emerald.png', 0, 0, 'no', ','),
(15, 'Michail', 'Markou', 'michail_markou_1_2_3_4_5_6_7', 'Backtrackpower@gmail.com8', '2de40e2a5400099442596fc18d668132', '2021-05-10', 'assets/images/profile_pics/defaults/head_deep_blue.png', 0, 0, 'no', ','),
(16, 'Michail', 'Markou', 'michail_markou_1_2_3_4_5_6_7_8', 'Backtrackpowerf@gmail.com', '2de40e2a5400099442596fc18d668132', '2021-05-10', 'assets/images/profile_pics/defaults/head_emerald.png', 0, 0, 'no', ',');

-- --------------------------------------------------------

--
-- Table structure for table `usersettingstable`
--

CREATE TABLE `usersettingstable` (
  `id` int(11) NOT NULL,
  `user_fk` varchar(100) NOT NULL,
  `colortheme` varchar(10) NOT NULL DEFAULT '#FFF',
  `typography` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usersettingstable`
--

INSERT INTO `usersettingstable` (`id`, `user_fk`, `colortheme`, `typography`) VALUES
(1, 'Backtrackpower@gmail.com', '#FFF', ''),
(3, 'Sylvimarkou@hotmail.com', '#FFF', ''),
(17, 'Backtrackpowerf@gmail.com', '#FFF', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `bookingtable`
--
ALTER TABLE `bookingtable`
  ADD PRIMARY KEY (`bookingID`),
  ADD UNIQUE KEY `bookingID` (`bookingID`),
  ADD KEY `bookingTheatre` (`bookingTheatre_fk`),
  ADD KEY `bookingAccount` (`bookingAccount_fk`),
  ADD KEY `bookingTheatreHall` (`bookingTheatreHall_fk`),
  ADD KEY `bookingType` (`bookingType_fk`),
  ADD KEY `movieName_fk` (`movieName_fk`),
  ADD KEY `bookingTime_fk` (`bookingTime_fk`),
  ADD KEY `bookingDate_fk` (`bookingDate_fk`);

--
-- Indexes for table `datetable`
--
ALTER TABLE `datetable`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `date` (`date_uniq`);

--
-- Indexes for table `discounttable`
--
ALTER TABLE `discounttable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin` (`admin`);

--
-- Indexes for table `feedbacktable`
--
ALTER TABLE `feedbacktable`
  ADD PRIMARY KEY (`msgID`),
  ADD UNIQUE KEY `msgID` (`msgID`),
  ADD KEY `account_fk` (`account_fk`);

--
-- Indexes for table `hallstable`
--
ALTER TABLE `hallstable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hallstable_ibfk_1` (`tName_fk`),
  ADD KEY `hallType` (`hallType`),
  ADD KEY `hallName` (`hallName`);

--
-- Indexes for table `movietable`
--
ALTER TABLE `movietable`
  ADD PRIMARY KEY (`movieID`),
  ADD UNIQUE KEY `movieID` (`movieID`),
  ADD KEY `admin_fk` (`admin_fk`),
  ADD KEY `movieTitle` (`movieTitle`),
  ADD KEY `urlPath` (`urlPath`),
  ADD KEY `movieDuration` (`movieDuration`);

--
-- Indexes for table `scheduletable`
--
ALTER TABLE `scheduletable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_fk` (`admin_fk`),
  ADD KEY `movie_play_fk` (`movie_play_fk`),
  ADD KEY `theatre_name_fk` (`theatre_name_fk`),
  ADD KEY `urlPath_fk` (`urlPath_fk`),
  ADD KEY `hall_type_fk` (`hall_type_fk`),
  ADD KEY `duration_play_fk` (`duration_play_fk`),
  ADD KEY `date_play` (`date_play_fk`),
  ADD KEY `time_play` (`time_play`),
  ADD KEY `hall_name_fk` (`hall_name_fk`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test1`
--
ALTER TABLE `test1`
  ADD PRIMARY KEY (`increase`);

--
-- Indexes for table `theatretable`
--
ALTER TABLE `theatretable`
  ADD PRIMARY KEY (`id`,`tName_pk`),
  ADD UNIQUE KEY `tName` (`tName_pk`),
  ADD KEY `admin_tk` (`admin_tk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `usersettingstable`
--
ALTER TABLE `usersettingstable`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_fk` (`user_fk`),
  ADD KEY `colortheme` (`colortheme`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookingtable`
--
ALTER TABLE `bookingtable`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=307;

--
-- AUTO_INCREMENT for table `datetable`
--
ALTER TABLE `datetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `discounttable`
--
ALTER TABLE `discounttable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacktable`
--
ALTER TABLE `feedbacktable`
  MODIFY `msgID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hallstable`
--
ALTER TABLE `hallstable`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `movietable`
--
ALTER TABLE `movietable`
  MODIFY `movieID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `scheduletable`
--
ALTER TABLE `scheduletable`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `test1`
--
ALTER TABLE `test1`
  MODIFY `increase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `theatretable`
--
ALTER TABLE `theatretable`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `usersettingstable`
--
ALTER TABLE `usersettingstable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookingtable`
--
ALTER TABLE `bookingtable`
  ADD CONSTRAINT `bookingtable_ibfk_1` FOREIGN KEY (`bookingTheatre_fk`) REFERENCES `theatretable` (`tName_pk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookingtable_ibfk_2` FOREIGN KEY (`bookingAccount_fk`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookingtable_ibfk_3` FOREIGN KEY (`bookingType_fk`) REFERENCES `hallstable` (`hallType`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookingtable_ibfk_4` FOREIGN KEY (`movieName_fk`) REFERENCES `movietable` (`movieTitle`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookingtable_ibfk_6` FOREIGN KEY (`bookingTheatreHall_fk`) REFERENCES `hallstable` (`hallName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookingtable_ibfk_7` FOREIGN KEY (`bookingTime_fk`) REFERENCES `scheduletable` (`time_play`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookingtable_ibfk_8` FOREIGN KEY (`bookingDate_fk`) REFERENCES `datetable` (`date_uniq`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `discounttable`
--
ALTER TABLE `discounttable`
  ADD CONSTRAINT `discounttable_ibfk_1` FOREIGN KEY (`admin`) REFERENCES `admins` (`username`) ON UPDATE CASCADE;

--
-- Constraints for table `feedbacktable`
--
ALTER TABLE `feedbacktable`
  ADD CONSTRAINT `feedbacktable_ibfk_1` FOREIGN KEY (`account_fk`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hallstable`
--
ALTER TABLE `hallstable`
  ADD CONSTRAINT `hallstable_ibfk_1` FOREIGN KEY (`tName_fk`) REFERENCES `theatretable` (`tName_pk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movietable`
--
ALTER TABLE `movietable`
  ADD CONSTRAINT `movietable_ibfk_1` FOREIGN KEY (`admin_fk`) REFERENCES `admins` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scheduletable`
--
ALTER TABLE `scheduletable`
  ADD CONSTRAINT `scheduletable_ibfk_1` FOREIGN KEY (`movie_play_fk`) REFERENCES `movietable` (`movieTitle`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `scheduletable_ibfk_2` FOREIGN KEY (`admin_fk`) REFERENCES `admins` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `scheduletable_ibfk_3` FOREIGN KEY (`theatre_name_fk`) REFERENCES `theatretable` (`tName_pk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `scheduletable_ibfk_4` FOREIGN KEY (`urlPath_fk`) REFERENCES `movietable` (`urlPath`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `scheduletable_ibfk_5` FOREIGN KEY (`hall_type_fk`) REFERENCES `hallstable` (`hallType`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `scheduletable_ibfk_6` FOREIGN KEY (`duration_play_fk`) REFERENCES `movietable` (`movieDuration`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `scheduletable_ibfk_7` FOREIGN KEY (`hall_name_fk`) REFERENCES `hallstable` (`hallName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `scheduletable_ibfk_8` FOREIGN KEY (`date_play_fk`) REFERENCES `datetable` (`date_uniq`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `theatretable`
--
ALTER TABLE `theatretable`
  ADD CONSTRAINT `theatretable_ibfk_1` FOREIGN KEY (`admin_tk`) REFERENCES `admins` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usersettingstable`
--
ALTER TABLE `usersettingstable`
  ADD CONSTRAINT `usersettingstable_ibfk_1` FOREIGN KEY (`user_fk`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
