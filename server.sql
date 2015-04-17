-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 16, 2015 at 12:22 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `peak_360`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `announcement_id` int(111) NOT NULL,
  `announcement_name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`announcement_id`, `announcement_name`, `link`, `description`) VALUES
(1, 'Starting Announcement', 'https://www.youtube.com/embed/atk-xvB_5lI\n', 'CrossFit Games athletes Becca Voigt, Emily Bridgers and Stacie Tovar do CrossFit.com workout 150409 at CrossFit Terminus'),
(7, 'New Announcement', 'https://www.youtube.com/embed/atk-xvB_5lI', 'CrossFit Games athletes Becca Voigt, Emily Bridgers and Stacie Tovar do CrossFit.com workout 150409 at CrossFit Terminus');

-- --------------------------------------------------------

--
-- Table structure for table `pr_data`
--

CREATE TABLE `pr_data` (
  `pr_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `exercise_name` varchar(255) NOT NULL,
  `rep_description` text NOT NULL,
  `pr_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pr_data`
--

INSERT INTO `pr_data` (`pr_id`, `user_id`, `exercise_name`, `rep_description`, `pr_date`) VALUES
(1, 1, 'deadlift', '2 reps @ 200lb', '2015-04-05'),
(2, 1, 'back squat', '2 rep max at 155 lb', '2015-04-03'),
(5, 1, 'clean and jerk', '1 rep 110lb', '2015-04-02'),
(11, 1, 'snatch', '75lb 1 rep', '2015-04-07'),
(21, 39, 'snatch', '2 reps @ 200lb', '2015-04-01'),
(23, 39, 'snatch', '2 reps @ 200lb', '2015-04-01'),
(24, 39, 'back squat', '155lb for 1 rep', '2015-04-06'),
(25, 39, 'back squat', '155lb for 1 rep', '2015-04-06'),
(26, 39, 'back squat', '155lb for 1 rep', '2015-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_type` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `username`, `password`, `user_type`) VALUES
(1, 'Kelsey', 'Kjeldsen', 'kmk73@miami.edu', '0c8b77a3876762afc8ebad292adf6335', 'Athlete'),
(2, 'Clay', 'Ewing', 'clay@miami.edu', '5f4dcc3b5aa765d61d8327deb882cf99', ''),
(9, 'Example ', 'Last ', 'example@miami.edu', '5f4dcc3b5aa765d61d8327deb882cf99', 'Coach'),
(25, 'test', 'user', 'test@user.com', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(27, 'test2', 'user', 'test2@me.com', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(29, 'shawn', 'mcmahon', 'shawn@me.com', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(30, 'jayz', 'test', 'jayz@me.com', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(31, 'jayz', 'test', 'jayz@me.com', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(32, 'lil ', 'wayne', 'lilwayne@me.com', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(33, 'drake', 'fake', 'drake@me.com', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(34, 'fake', 'rapper', 'rapper@me.com', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(36, 'star', 'wars', 'star@wars.com', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(37, 'json', 'encode', 'test@json.com', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(38, 'new', 'user', 'new@user.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Athlete'),
(39, 'snoop', 'dog', 'snoop@dog.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Athlete'),
(43, 'test', 'user', 'test@user.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Athlete'),
(50, 'brew', 'boss', 'brew@boss.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Athlete'),
(51, 'coach', 'test', 'test@coach.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Coach'),
(54, 'Chiara', 'Speziale ', 'chiara@annoying.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Athlete'),
(55, 'nic', 'aguirre', 'nic@me.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Athlete'),
(57, 'Brewster', 'Boss', 'brewster@me.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Coach'),
(59, 'ashley', 'miller', 'miller@me.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Athlete'),
(60, 'ashley', 'miller', 'miller@me.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Athlete'),
(61, 'lien', 'tran', 'lien@me.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Athlete');

-- --------------------------------------------------------

--
-- Table structure for table `wod_results`
--

CREATE TABLE `wod_results` (
  `workout_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `workout_score` int(11) NOT NULL,
  `workout_level` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wod_results`
--

INSERT INTO `wod_results` (`workout_id`, `user_id`, `workout_score`, `workout_level`) VALUES
(37, 1, 100, 0),
(39, 1, 100, 0),
(39, 1, 100, 1),
(31, 25, 297, 2),
(32, 33, 136, 2),
(2, 37, 399, 1),
(0, 43, 38, 2),
(33, 32, 180, 1),
(17, 25, 352, 1),
(31, 34, 224, 2),
(28, 33, 191, 1),
(30, 1, 144, 2),
(33, 25, 86, 2),
(16, 50, 387, 2),
(1, 25, 105, 2),
(33, 50, 372, 1),
(32, 31, 22, 2),
(32, 1, 219, 1),
(33, 31, 389, 1),
(32, 38, 332, 2),
(0, 32, 78, 2),
(17, 36, 274, 2),
(0, 43, 222, 2),
(2, 37, 380, 1),
(37, 51, 67, 2),
(37, 51, 382, 2),
(32, 51, 271, 2),
(30, 30, 111, 2),
(30, 32, 236, 1),
(17, 39, 220, 1),
(2, 29, 105, 2),
(16, 25, 363, 1),
(1, 9, 348, 2),
(30, 33, 175, 2),
(33, 1, 219, 1),
(2, 25, 182, 2),
(1, 32, 147, 2),
(32, 9, 224, 1),
(30, 50, 142, 2),
(16, 34, 380, 2),
(36, 1, 142, 2),
(36, 30, 127, 1),
(37, 33, 317, 2),
(37, 27, 20, 1),
(31, 34, 260, 1),
(1, 2, 135, 2),
(17, 27, 42, 1),
(29, 2, 314, 1),
(2, 27, 296, 2),
(0, 43, 135, 1),
(28, 51, 148, 1),
(2, 1, 263, 1),
(33, 32, 198, 2),
(17, 27, 362, 1),
(32, 31, 79, 1),
(31, 25, 112, 2),
(31, 36, 385, 1),
(33, 30, 14, 1),
(32, 50, 238, 1),
(2, 32, 309, 2),
(32, 31, 47, 2),
(28, 30, 30, 1),
(28, 54, 172, 1),
(36, 39, 372, 1),
(0, 34, 169, 1),
(1, 37, 253, 1),
(29, 9, 302, 1),
(37, 2, 84, 1),
(17, 25, 350, 1),
(17, 37, 230, 2),
(30, 38, 215, 1),
(30, 30, 190, 2),
(37, 32, 99, 1),
(37, 54, 68, 1),
(37, 29, 192, 1),
(32, 43, 297, 2),
(32, 54, 67, 2),
(33, 9, 11, 1),
(30, 25, 147, 2),
(31, 31, 266, 1),
(36, 33, 124, 2),
(36, 39, 48, 2),
(37, 33, 199, 1),
(31, 33, 6, 1),
(16, 25, 4, 1),
(1, 51, 316, 1),
(16, 34, 252, 2),
(17, 43, 86, 1),
(30, 9, 9, 2),
(2, 30, 162, 2),
(16, 32, 346, 2),
(0, 39, 0, 0),
(0, 39, 0, 0),
(0, 39, 0, 0),
(0, 39, 0, 0),
(0, 39, 0, 0),
(41, 39, 0, 0),
(41, 39, 0, 0),
(41, 39, 0, 0),
(41, 39, 0, 0),
(41, 39, 0, 0),
(41, 39, 0, 0),
(40, 39, 0, 0),
(41, 39, 0, 0),
(40, 39, 0, 0),
(40, 39, 0, 0),
(0, 39, 10, 0),
(40, 39, 0, 0),
(0, 39, 10, 0),
(0, 39, 0, 0),
(0, 39, 12, 0),
(0, 39, 12, 0),
(0, 39, 12, 0),
(0, 39, 12, 0),
(0, 39, 12, 0),
(0, 39, 12, 0),
(42, 39, 11, 0),
(42, 39, 11, 0),
(43, 39, 18, 0),
(42, 39, 25, 0);

-- --------------------------------------------------------

--
-- Table structure for table `workouts`
--

CREATE TABLE `workouts` (
  `workout_id` int(11) NOT NULL,
  `workout_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wod_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `wod_date` date NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `workouts`
--

INSERT INTO `workouts` (`workout_id`, `workout_name`, `wod_type`, `wod_date`, `description`) VALUES
(1, 'brewster', 'not timed', '2015-04-01', 'brewster runs everywhere'),
(16, 'Jesus', 'timed', '2015-04-01', 'Sit Ups'),
(17, 'crossfit open 15.3', 'reps', '2015-03-19', 'WORKOUT 15.3 Complete as many rounds and reps as possible in 14 minutes of: 7 muscle-ups 50 wall-ball shots 100 double-unders Men use 20-lb. ball to 10 feet, Women use 14-lb. ball to 9 feet Scaled Option: 14 Minute AMRAP 50 wall-ball shots 200 Single-unders'),
(28, 'Cindy', 'rounds', '2015-03-26', '"Cindy" Complete as many rounds in 20 minutes as you can of: 5 Pull-ups 10 Push-ups 15 Squats'),
(29, 'Test', 'reps', '2015-04-03', 'AMRAP test workout '),
(30, 'canes club ', 'rounds', '2015-04-04', '3 rounds for time of 15 wallballs'),
(32, 'canes 2', 'timed', '2015-04-04', 'testing workouts for database'),
(36, 'jackie', 'timed', '2015-04-07', '1000m row, 50 thrusters , 30 pullups '),
(37, 'April 8', 'timed', '2015-04-08', 'testing april 8'),
(38, 'April 10', 'rounds', '2015-04-10', 'Testing date for April 10'),
(39, 'April 10', 'rounds', '2015-04-10', 'Testing date for April 10'),
(40, 'April 13 WOD A', 'timed', '2015-04-13', 'Complete for time:\r\n3 Rounds\r\n12 Thrusters (135, 95)\r\n12 C2B Pull-ups\r\n2 Rounds \r\n24 Wallballs – (12ft, 11ft target) (20, 14)\r\n24 Calories Row\r\n1 Round\r\n36 Burpee Box Jump Overs (30, 24)'),
(41, 'April 13 WOD B', 'rounds', '2015-04-13', 'Midline WORK\r\n12 min AMRAP\r\n- 30 second ring support L-sit\r\n- 60 second weighted plank\r\n- 9 strict toes to bar'),
(42, 'APRIL 14', 'timed', '2015-04-14', 'Complete for time:\r\n50 Calorie Assault Bike\r\n50 Calorie Air Dyne'),
(43, 'Deadlifts and Running', 'timed', '2015-04-14', '6 Rounds for time\r\n7 Deadlifts (245, 165) Rx+ (275, 185)\r\n200 meter Run\r\n*12 minute Cap'),
(44, 'April 15 WOD A', 'rounds', '2015-04-15', '20 min AMRAP\r\n3 Rounds\r\n5 Cleans (145, 105)\r\n7 Toes to Bar\r\n25 Double Unders\r\n3 Rounds\r\n5 Cleans (165, 115)\r\n7 Toes to Bar\r\n25 Double Unders\r\n3 Rounds\r\n5 Cleans (185, 125)\r\n7 Toes to Bar\r\n25 Double Unders\r\n3 Rounds\r\n5 Cleans (205, 135)\r\n7 Toes to Bar\r\n25 Double Unders\r\n….continue to increase the weight by 20 pounds for the men and 10 for the women Every round.\r\n….power clean and squat clean are both acceptable\r\n…..Score = post how many rounds plus reps'),
(45, 'Ropes and Snatches', 'rounds', '2015-04-16', '8 min AMRAP \r\n1 Rope Climb\r\n8 Power Snatches (95, 65) \r\n\r\nRest 4 Minutes\r\n\r\n8 min AMRAP\r\n100 meter Run\r\n8 OH Stationary Walking Lunges (95, 65)'),
(46, 'Ring Dips Test', 'reps', '2015-04-17', 'Skill WOD\r\n- Ring Dips (kipping)\r\nMax reps in 30 seconds\r\n1 minute rest\r\n4 Rounds (6 minutes total)'),
(47, 'WOD – Froning + Fraser 15.5', 'timed', '2015-04-19', 'A)\r\nStrength WOD\r\n20 Rep Max OH Squat\r\n*12 min Cap to find a 20 rep max. You may use the squat rack\r\n\r\nB)\r\nWOD\r\nISABEL\r\nComplete for time:\r\n30 Snatches (135, 95)\r\nthen…\r\n\r\nC)\r\n@ Minute 6 begin.\r\nGRACE\r\nComplete for time:\r\n30 Power Clean and Jerks (135, 95)\r\n*Post Scores / times for both WODs Isabel & Grace'),
(48, 'Regionals 2013 Chipper WOD', 'timed', '2015-04-18', 'Regionals 2013 Chipper WOD\r\n100 Dubs\r\n50 HSPU (scale down 75 Hand Release Push-ups)\r\n40 Toes to Bar\r\n30 Shoulder to Overhead (165, 115)\r\n100 Ft Front Rack Staionary Walking Lunges (30 steps total)'),
(49, 'Testing Database WOD', 'timed', '2015-04-15', 'Testing database wod for coaches and scheduler table');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `pr_data`
--
ALTER TABLE `pr_data`
  ADD PRIMARY KEY (`pr_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wod_results`
--
ALTER TABLE `wod_results`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `workouts`
--
ALTER TABLE `workouts`
  ADD PRIMARY KEY (`workout_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcement_id` int(111) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pr_data`
--
ALTER TABLE `pr_data`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `workouts`
--
ALTER TABLE `workouts`
  MODIFY `workout_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pr_data`
--
ALTER TABLE `pr_data`
  ADD CONSTRAINT `pr_data_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `wod_results`
--
ALTER TABLE `wod_results`
  ADD CONSTRAINT `wod_results_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
