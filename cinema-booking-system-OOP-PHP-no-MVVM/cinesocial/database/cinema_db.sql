-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 16 Απρ 2021 στις 19:24:54
-- Έκδοση διακομιστή: 10.4.18-MariaDB
-- Έκδοση PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `cinema_db`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `bookingtable`
--

CREATE TABLE `bookingtable` (
  `bookingID` int(11) NOT NULL,
  `movieName` varchar(100) DEFAULT NULL,
  `bookingTheatre` varchar(100) NOT NULL,
  `bookingType` varchar(100) DEFAULT NULL,
  `bookingDate` varchar(50) NOT NULL,
  `bookingTime` varchar(50) NOT NULL,
  `bookingFName` varchar(100) NOT NULL,
  `bookingLName` varchar(100) DEFAULT NULL,
  `bookingPNumber` varchar(12) NOT NULL,
  `seatP` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `bookingtable`
--

INSERT INTO `bookingtable` (`bookingID`, `movieName`, `bookingTheatre`, `bookingType`, `bookingDate`, `bookingTime`, `bookingFName`, `bookingLName`, `bookingPNumber`, `seatP`) VALUES
(81, 'Captain Marvel', 'main-hall', '2d', '12-3', '09-00', 'Michail', 'Markou', '0000000000', '1'),
(82, 'Justice League 2021', 'vip-hall', 'imax', '12-3', '09-00', 'MIONTRAGK', 'MARKOU', '1111111111', '2'),
(134, 'Captain Marvel', 'main-hall', 'imax', '13-3', '15-00', 'sdfgrg', 'sdgsdfg', '77777777', '3'),
(135, 'Captain Marvel', 'main-hall', '2d', '13-3', '12-00', 'jiji', 'jiji', '111111111111', '2'),
(136, 'Justice League 2021', 'main-hall', '2d', '14-3', '18-00', 'burakis', 'burakis', '+30690899011', '3');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `feedbacktable`
--

CREATE TABLE `feedbacktable` (
  `msgID` int(12) NOT NULL,
  `senderfName` varchar(50) NOT NULL,
  `senderlName` varchar(50) DEFAULT NULL,
  `sendereMail` varchar(100) NOT NULL,
  `senderfeedback` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `feedbacktable`
--

INSERT INTO `feedbacktable` (`msgID`, `senderfName`, `senderlName`, `sendereMail`, `senderfeedback`) VALUES
(1, 'michail', 'markou', 'test@gmail.com', 'Hello first'),
(4, 'Michail', 'Markou', 'backtrackpower@gmail.com', 'great movies');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `movietable`
--

CREATE TABLE `movietable` (
  `movieID` int(11) NOT NULL,
  `movieImgCover` varchar(150) NOT NULL,
  `movieImgPrev` varchar(150) NOT NULL,
  `movieTitle` varchar(100) NOT NULL,
  `movieGenre` varchar(50) NOT NULL,
  `movieDuration` int(11) NOT NULL,
  `movieRelDate` date NOT NULL,
  `movieDirector` varchar(50) NOT NULL,
  `movieActors` varchar(150) NOT NULL,
  `urlPath` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `movietable`
--

INSERT INTO `movietable` (`movieID`, `movieImgCover`, `movieImgPrev`, `movieTitle`, `movieGenre`, `movieDuration`, `movieRelDate`, `movieDirector`, `movieActors`, `urlPath`) VALUES
(1, 'assets/images/movieTableCover/movie-poster-1.jpg', 'assets/images/movieTablePrev/movie-thumb-1.jpg', 'Captain Marvel', ' Action, Adventure, Sci-Fi ', 220, '2018-10-18', 'Anna Boden, Ryan Fleck', 'Brie Larson, Samuel L. Jackson, Ben Mendelsohn, Annette Bening', 'Z1BCujX3pw8'),
(2, 'assets/images/movieTableCover/movie-poster-2.jpg', 'assets/images/movieTablePrev/movie-thumb-2.jpg', 'Justice League 2021', ' Action, Adventure, Fantasy', 245, '2021-03-18', 'Zack Snyder', 'Ben Affleck, Henry Cavill, Amy Adams, Gal Gadot, Ray Fisher, Jason Momoa', 'vM-Bja2Gy04'),
(3, 'assets/images/movieTableCover/movie-poster-3.jpg', 'assets/images/movieTablePrev/movie-thumb-3.jpg', 'Avengers Endgame', ' Action, Adventure, Drama ', 185, '2019-04-24', 'Anthony Russo, Joe Russo', 'Mark Ruffalo, Scarlett Johansson, Jeremy Renner, Chris Evans', '6ZfuNTqbHE8'),
(4, 'assets/images/movieTableCover/movie-poster-4.jpg', 'assets/images/movieTablePrev/movie-thumb-4.jpg', 'Avengers ininity war', ' Action, Adventure, Sci-Fi ', 160, '2018-04-26', 'Anthony Russo, Joe Russo', 'Mark Ruffalo, Scarlett Johansson, Jeremy Renner, Chris Evans', 'TcMBFSGVi1c'),
(5, 'assets/images/movieTableCover/movie-poster-5.jpg', 'assets/images/movieTablePrev/movie-thumb-5.jpg', 'Inception', ' Action, Adventure, Sci-Fi ', 160, '2010-08-24', 'Christopher Nolan', 'Leonardo DiCaprio, Joseph Gordon-Levitt, Elliot Page', 'YoHD9XEInc0'),
(6, 'assets/images/movieTableCover/movie-poster-6.jpg', 'assets/images/movieTablePrev/movie-thumb-6.jpg', 'Interstellar', ' Drama, Adventure, Sci-Fi ', 180, '2014-11-06', 'Christopher Nolan', 'Matthew McConaughey, Anne Hathaway, Jessica Chastain', 'zSWdZVtXT7E');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signup_date` date NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `num_posts` int(11) NOT NULL,
  `num_likes` int(11) NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `friend_array` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `signup_date`, `profile_pic`, `num_posts`, `num_likes`, `user_closed`, `friend_array`) VALUES
(1, 'Michail', 'Markou', 'michail_markou', 'Backtrackpower@gmail.com', '2de40e2a5400099442596fc18d668132', '2021-03-27', 'assets/images/profile_pics/defaults/head_emerald.png', 0, 0, 'no', ','),
(5, 'Sylvia', 'Markou', 'sylvia_markou', 'Sylvimarkou@hotmail.com', '2de40e2a5400099442596fc18d668132', '2021-03-27', 'assets/images/profile_pics/defaults/head_deep_blue.png', 0, 0, 'no', ',');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `bookingtable`
--
ALTER TABLE `bookingtable`
  ADD PRIMARY KEY (`bookingID`),
  ADD UNIQUE KEY `bookingID` (`bookingID`),
  ADD KEY `bookingID_2` (`bookingID`),
  ADD KEY `bookingID_3` (`bookingID`),
  ADD KEY `bookingID_4` (`bookingID`);

--
-- Ευρετήρια για πίνακα `feedbacktable`
--
ALTER TABLE `feedbacktable`
  ADD PRIMARY KEY (`msgID`),
  ADD UNIQUE KEY `msgID` (`msgID`);

--
-- Ευρετήρια για πίνακα `movietable`
--
ALTER TABLE `movietable`
  ADD PRIMARY KEY (`movieID`),
  ADD UNIQUE KEY `movieID` (`movieID`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT για πίνακα `bookingtable`
--
ALTER TABLE `bookingtable`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT για πίνακα `feedbacktable`
--
ALTER TABLE `feedbacktable`
  MODIFY `msgID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT για πίνακα `movietable`
--
ALTER TABLE `movietable`
  MODIFY `movieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
