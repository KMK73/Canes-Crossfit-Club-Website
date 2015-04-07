-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 03, 2015 at 02:12 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `peak_360`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
`id` int(11) NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_type` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `user_type`) VALUES
(1, 'Kelsey', 'Kjeldsen', 'kmk73@miami.edu', '0c8b77a3876762afc8ebad292adf6335', 'Athlete'),
(2, 'Clay', 'Ewing', 'clay@miami.edu', '5f4dcc3b5aa765d61d8327deb882cf99', ''),
(9, 'Example ', 'Last ', 'example@miami.edu', '5f4dcc3b5aa765d61d8327deb882cf99', 'Coach'),
(10, 'Kelsey', 'Kjeldsen', 'kmk73@miami.edu', '0c8b77a3876762afc8ebad292adf6335', 'Coach'),
(11, 'klee', 'klop', 'klickty@klop.com', '1234', ''),
(12, 'yeezus', 'walks', 'yeez@steez.com', '1234', ''),
(23, 'yeezus ', 'walks', 'yeez@steez.com', '1234', ''),
(24, 'will', 'me', 'will@me.com', '1234', ''),
(25, 'test', 'user', 'test@user.com', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(27, 'test2', 'user', 'test2@me.com', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(29, 'shawn', 'mcmahon', 'shawn@me.com', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(30, 'jayz', 'test', 'jayz@me.com', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(31, 'jayz', 'test', 'jayz@me.com', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(32, 'lil ', 'wayne', 'lilwayne@me.com', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(33, 'drake', 'fake', 'drake@me.com', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(34, 'fake', 'rapper', 'rapper@me.com', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(35, 'chiara', 'spez', 'spez@me.com', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(36, 'star', 'wars', 'star@wars.com', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(37, 'json', 'encode', 'test@json.com', 'd41d8cd98f00b204e9800998ecf8427e', '');

-- --------------------------------------------------------

--
-- Table structure for table `wod_results`
--

CREATE TABLE `wod_results` (
  `workout_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rep_score` int(11) NOT NULL,
  `round_score` int(11) NOT NULL,
  `time_score` int(255) NOT NULL,
  `level` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `workouts`
--

CREATE TABLE `workouts` (
`workout_id` int(11) NOT NULL,
  `workout_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wod_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `wod_date` date NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `workouts`
--

INSERT INTO `workouts` (`workout_id`, `workout_name`, `wod_type`, `wod_date`, `description`) VALUES
(1, 'brewster', 'not timed', '2015-04-01', 'brewster runs everywhere'),
(2, 'crossfit trial', 'reps', '2015-04-01', 'testing trial data'),
(16, 'Jesus', 'timed', '2015-04-01', 'Sit Ups'),
(17, 'crossfit open 15.3', 'reps', '2015-03-19', 'WORKOUT 15.3 Complete as many rounds and reps as possible in 14 minutes of: 7 muscle-ups 50 wall-ball shots 100 double-unders Men use 20-lb. ball to 10 feet, Women use 14-lb. ball to 9 feet Scaled Option: 14 Minute AMRAP 50 wall-ball shots 200 Single-unders'),
(28, 'Cindy', 'rounds', '2015-03-26', '"Cindy" Complete as many rounds in 20 minutes as you can of: 5 Pull-ups 10 Push-ups 15 Squats'),
(29, 'Test', 'reps', '2015-04-03', 'AMRAP test workout ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workouts`
--
ALTER TABLE `workouts`
 ADD PRIMARY KEY (`workout_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `workouts`
--
ALTER TABLE `workouts`
MODIFY `workout_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;