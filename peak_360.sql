-- phpMyAdmin SQL Dump
-- version 4.3.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 04, 2015 at 01:39 AM
-- Server version: 5.5.42-37.1
-- PHP Version: 5.5.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `peak_360`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE IF NOT EXISTS `announcements` (
  `announcement_id` int(111) NOT NULL,
  `announcement_name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`announcement_id`, `announcement_name`, `link`, `description`) VALUES
(10, 'Website Launch for CCC!', 'https://www.youtube.com/embed/ignxdHgpzWI', 'Welcome to the new Canes Peak 360 Crossfit Club website! We are going to have a lot of changes coming for the Fall 2015 semester, including an iOS app along with this site! \n\nSince we are making some great moves forward as a UM club, there will be many '),
(11, 'New Canes Crossfit Club Website', 'https://www.youtube.com/embed/ignxdHgpzWI', 'Welcome to the new Canes Peak 360 Crossfit Club website! <br />\n<br />\nWe are going to have a lot of changes coming for the Fall 2015 semester, including an iOS app along with this brand new website! Since we are making some great moves forward as a UM club, there will be many updates to follow that can slow done these app. Please bear with us while we make this updates. <br />\n<br />\nNow in honor of starting a new website, here is a nice throwback of where Peak 360 crossfit all started. If you needed some workout motivation here it is!');

-- --------------------------------------------------------

--
-- Table structure for table `pr_data`
--

CREATE TABLE IF NOT EXISTS `pr_data` (
  `pr_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `exercise_name` varchar(255) NOT NULL,
  `rep_description` text NOT NULL,
  `pr_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_type` varchar(100) CHARACTER SET utf8 NOT NULL,
  `user_avatar` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `username`, `password`, `user_type`, `user_avatar`) VALUES
(1, 'Kelsey', 'Kjeldsen', 'kmk73@miami.edu', '0c8b77a3876762afc8ebad292adf6335', 'Athlete', ''),
(2, 'Clay', 'Ewing', 'clay@miami.edu', '5f4dcc3b5aa765d61d8327deb882cf99', '', ''),
(9, 'Example ', 'Last ', 'example@miami.edu', '5f4dcc3b5aa765d61d8327deb882cf99', 'Coach', ''),
(25, 'test', 'user', 'test@user.com', 'd41d8cd98f00b204e9800998ecf8427e', '', ''),
(27, 'test2', 'user', 'test2@me.com', 'd41d8cd98f00b204e9800998ecf8427e', '', ''),
(29, 'shawn', 'mcmahon', 'shawn@me.com', 'd41d8cd98f00b204e9800998ecf8427e', '', ''),
(30, 'jayz', 'test', 'jayz@me.com', 'd41d8cd98f00b204e9800998ecf8427e', '', ''),
(31, 'jayz', 'test', 'jayz@me.com', 'd41d8cd98f00b204e9800998ecf8427e', '', ''),
(32, 'lil ', 'wayne', 'lilwayne@me.com', 'd41d8cd98f00b204e9800998ecf8427e', '', ''),
(33, 'drake', 'fake', 'drake@me.com', 'd41d8cd98f00b204e9800998ecf8427e', '', ''),
(34, 'fake', 'rapper', 'rapper@me.com', 'd41d8cd98f00b204e9800998ecf8427e', '', ''),
(36, 'star', 'wars', 'star@wars.com', 'd41d8cd98f00b204e9800998ecf8427e', '', ''),
(37, 'json', 'encode', 'test@json.com', 'd41d8cd98f00b204e9800998ecf8427e', '', ''),
(38, 'new', 'user', 'new@user.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Athlete', ''),
(39, 'Snoop', 'dogg', 'snoop@dog.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Athlete', 'default.png'),
(43, 'test', 'user', 'test@user.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Athlete', ''),
(50, 'brew', 'boss', 'brew@boss.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Athlete', ''),
(51, 'coach', 'test', 'test@coach.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Coach', ''),
(54, 'Chiara', 'Speziale ', 'chiara@annoying.com', 'ec6a6536ca304edf844d1d248a4f08dc', 'Athlete', 'man_l8_1-984851103.jpg'),
(55, 'nic', 'aguirre', 'nic@me.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Athlete', ''),
(57, 'Brewster', 'Boss', 'brewster@me.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Coach', ''),
(59, 'ashley', 'miller', 'miller@me.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Athlete', ''),
(60, 'ashley', 'miller', 'miller@me.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Athlete', ''),
(61, 'lien', 'tran', 'lien@me.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Athlete', ''),
(62, 'will', 'kjeldsen', 'will.kjeldsen@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Athlete', ''),
(63, 'Michelle', 'Zambik', 'Mmzambik@gmail.com', 'afcc9022bf90ced6c58a2b4e61e144f8', 'Athlete', ''),
(64, 'Michael ', 'Jordan', 'jordan@me.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Athlete', 'default.png'),
(65, 'Stephen', 'Curry', 'stephen@curry.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Athlete', ''),
(66, 'stephen', 'curry', 'steph@curry.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Athlete', ''),
(67, 'steph', 'curry', 'steph@curry.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Athlete', ''),
(68, 'Noah', 'Ohlsen', 'noah@ohlsen.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Coach', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `wod_results`
--

CREATE TABLE IF NOT EXISTS `wod_results` (
  `workout_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `workout_score` int(11) NOT NULL,
  `workout_level` varchar(10) NOT NULL,
  `wod_notes` varchar(1000) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wod_results`
--

INSERT INTO `wod_results` (`workout_id`, `user_id`, `workout_score`, `workout_level`, `wod_notes`) VALUES
(32, 2, 244, 'RX', ''),
(40, 39, 338, 'RX', ''),
(46, 39, 345, 'RX', ''),
(45, 32, 381, 'RX', ''),
(29, 43, 40, 'RX', ''),
(42, 51, 136, 'RX', ''),
(42, 60, 393, 'RX', ''),
(51, 33, 232, 'RX', ''),
(44, 1, 360, 'RX', ''),
(41, 27, 263, 'RX', ''),
(42, 39, 376, 'RX', ''),
(17, 25, 167, 'RX', ''),
(51, 60, 325, 'RX', ''),
(41, 59, 392, 'RX', ''),
(28, 62, 225, 'RX', ''),
(0, 30, 48, 'RX', ''),
(37, 29, 18, 'RX', ''),
(37, 59, 270, 'RX', ''),
(41, 54, 76, 'RX', ''),
(16, 33, 297, 'RX', ''),
(29, 31, 339, 'RX', ''),
(29, 55, 198, 'RX', ''),
(1, 60, 179, 'RX', ''),
(48, 51, 383, 'RX', ''),
(32, 61, 27, 'RX', ''),
(53, 31, 337, 'RX', ''),
(48, 2, 94, 'RX', ''),
(42, 25, 89, 'RX', ''),
(47, 34, 307, 'RX', ''),
(57, 61, 237, 'RX', ''),
(55, 39, 350, 'RX', ''),
(47, 66, 397, 'RX', ''),
(49, 55, 357, 'RX', ''),
(61, 1, 178, 'RX', ''),
(53, 50, 251, 'RX', ''),
(62, 54, 126, 'RX', ''),
(0, 38, 347, 'RX', ''),
(28, 59, 102, 'RX', ''),
(44, 65, 317, 'RX', ''),
(36, 57, 238, 'RX', ''),
(53, 31, 143, 'RX', ''),
(51, 25, 349, 'RX', ''),
(38, 25, 186, 'RX', ''),
(38, 1, 161, 'RX', ''),
(57, 39, 38, 'RX', ''),
(43, 9, 16, 'RX', ''),
(59, 37, 11, 'RX', ''),
(48, 32, 52, 'RX', ''),
(44, 43, 233, 'RX', ''),
(50, 64, 79, 'RX', ''),
(37, 38, 105, 'RX', ''),
(62, 50, 241, 'RX', ''),
(38, 31, 99, 'RX', ''),
(0, 59, 247, 'RX', ''),
(51, 62, 24, 'RX', ''),
(55, 9, 257, 'RX', ''),
(39, 27, 148, 'RX', ''),
(45, 29, 328, 'RX', ''),
(50, 60, 30, 'RX', ''),
(1, 67, 118, 'RX', ''),
(50, 30, 71, 'RX', ''),
(59, 62, 173, 'RX', ''),
(48, 2, 168, 'RX', ''),
(40, 57, 399, 'RX', ''),
(42, 60, 278, 'RX', ''),
(47, 34, 390, 'RX', ''),
(54, 60, 167, 'RX', ''),
(53, 50, 51, 'RX', ''),
(43, 2, 275, 'RX', ''),
(40, 25, 280, 'RX', ''),
(48, 37, 104, 'RX', ''),
(40, 51, 28, 'RX', ''),
(41, 1, 233, 'RX', ''),
(37, 36, 366, 'RX', ''),
(59, 25, 96, 'RX', ''),
(54, 64, 163, 'RX', ''),
(45, 29, 9, 'RX', ''),
(30, 9, 69, 'RX', ''),
(47, 59, 47, 'RX', ''),
(63, 63, 351, 'RX', ''),
(61, 60, 261, 'RX', ''),
(53, 61, 276, 'RX', ''),
(60, 9, 347, 'RX', ''),
(37, 61, 40, 'RX', ''),
(41, 57, 362, 'RX', ''),
(36, 66, 227, 'RX', ''),
(42, 33, 3, 'RX', ''),
(45, 34, 64, 'RX', ''),
(30, 43, 255, 'RX', ''),
(64, 55, 218, 'RX', ''),
(54, 43, 159, 'RX', ''),
(45, 27, 20, 'RX', ''),
(48, 63, 356, 'RX', ''),
(39, 59, 44, 'RX', ''),
(64, 62, 177, 'RX', ''),
(61, 59, 254, 'RX', ''),
(32, 32, 2, 'RX', ''),
(48, 32, 179, 'RX', ''),
(37, 50, 311, 'RX', ''),
(55, 36, 132, 'RX', ''),
(47, 43, 229, 'RX', ''),
(58, 36, 63, 'RX', ''),
(1, 65, 281, 'RX', ''),
(16, 2, 120, 'RX', ''),
(16, 29, 316, 'RX', ''),
(45, 57, 167, 'RX', ''),
(37, 60, 318, 'RX', ''),
(41, 29, 127, 'RX', ''),
(62, 32, 213, 'RX', ''),
(36, 1, 74, 'RX', ''),
(56, 36, 258, 'RX', ''),
(16, 67, 144, 'RX', ''),
(65, 9, 152, 'RX', ''),
(67, 62, 166, 'RX', ''),
(29, 9, 182, 'RX', ''),
(59, 65, 339, 'RX', ''),
(47, 32, 24, 'RX', ''),
(54, 9, 143, 'RX', ''),
(64, 37, 66, 'RX', ''),
(65, 67, 136, 'RX', ''),
(39, 25, 4, 'RX', ''),
(36, 61, 20, 'RX', ''),
(39, 25, 373, 'RX', '');

-- --------------------------------------------------------

--
-- Table structure for table `workouts`
--

CREATE TABLE IF NOT EXISTS `workouts` (
  `workout_id` int(11) NOT NULL,
  `workout_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wod_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `wod_date` date NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(49, 'Testing Database WOD', 'timed', '2015-04-15', 'Testing database wod for coaches and scheduler table'),
(50, 'WOD A - Saturday Skill', 'not timed', '2015-04-18', 'A)\r\n10 minutes\r\nSkill – Ring Muscle-ups'),
(51, 'WOD B - Saturday April 18th', 'timed', '2015-04-18', 'B)\r\nWOD\r\nComplete for time:\r\n60 DB Snatches (70, 50)\r\n15 meters Burpee Broad Jumps\r\n45 Pull-ups \r\n15 meters Burpee Broad Jumps\r\n30 Front Squats (155, 105)\r\n15 meters Burpee Broad Jumps\r\n15 Clean and Jerks (155, 105)\r\nups)\r\n15 meters Burpee Broad Jumps '),
(52, 'Monday Blues WOD A', 'rounds', '2015-04-20', 'A)\r\n\r\n20min AMRAP\r\n100 double unders\r\n50 sit ups '),
(53, 'April 20 workout', 'rounds', '2015-04-20', 'Testing workout\r\n\r\nApril 20'),
(54, 'workout test april 21', 'timed', '2015-04-21', 'testing april 21 date'),
(55, 'WOD A Metcon', 'not timed', '2015-04-22', 'B)\r\nWOD\r\nComplete for time:\r\n21-15-9\r\nClean & Jerks (135, 95)\r\nAssault Bike Calories'),
(56, 'Strength WOD', 'reps', '2015-04-22', 'Strength WOD\r\n6 rounds:\r\n2 Push Press + 2 Push Jerk + 2 Split Jerk\r\n*Build up to a Max Complex\r\n*Every 2 minutes begin a new set'),
(57, 'Skill Work April 23', 'not timed', '2015-04-23', 'A)\r\nSKill WOD\r\nPractice – Hand Stand Hold – 5 minutes\r\n4 Rounds\r\nMax Reps Strict Pull-ups (minium 6)\r\nimmediately into..\r\nMax reps Strict Toes to Bar (minimum 6)\r\nrest 90 seconds after both movements.'),
(58, 'Main WOD April 23', 'rounds', '2015-04-23', 'B)\r\nWOD\r\n9 Min AMRAP\r\n6 Ring Dips\r\n12 KB Swings (70, 55)\r\n\r\n3 Min Rest\r\n\r\n9 Min AMRAP\r\n12 Calories Row\r\n60 meter Sled Push (90, 60)'),
(59, 'April 27 Strength', 'not_timed', '2015-04-27', 'A) Strength WOD<br />\r\nFront Squats<br />\r\n1 x 5,4,3,2,1<br />\r\nFind a 1 Rep Max<br />\r\n- rest as needed btw sets'),
(60, 'April 27 WOD B', 'timed', '2015-04-27', 'B)<br />\r\nWOD <br />\r\n4 Rounds for time<br />\r\n10 Hang Squat Cleans (135, 95)<br />\r\n15 Push-Ups<br />\r\n10 Walking Lunges (KB Front Rack) (55, 35&prime;s)<br />\r\n15 Pull-ups'),
(61, 'AMRAP LADDER', 'rounds', '2015-04-28', 'WOD<br />\r\n12 Min AMRAP ladder<br />\r\n2,2,2,4,4,4,6,6,6,8,8,8&hellip;&hellip;<br />\r\nToes to Bar + Chest to Bar (1 T2B + 1 C2B = 1 Rep) &ndash; (2 reps equals 1 t2b + 1 c2B x 2)<br />\r\nFront Rack Stationary Lunges (135, 95)<br />\r\nDB Snatches (70, 50) &ndash; alternating hands'),
(62, 'Thruster Ladder', 'not_timed', '2015-04-28', 'Strength WOD<br />\r\nThruster Ladder &ndash; 1RM<br />\r\nevery 90 seconds complete 1 Thruster starting at (135, 95)<br />\r\n*increase by 10 pounds every 90 seconds until failure.<br />\r\n*Thruster must be performed with the bar starting on the ground<br />\r\n*If the weight is not accomplished the workout is over<br />\r\n*achieve a 1 Rep Max Thruster<br />\r\n*scale the wod as needed by starting at a lighter weight, but always making 10 pound increases'),
(63, 'Strength April 30', 'weight', '2015-04-30', 'A)<br />\r\nStrength WOD<br />\r\nOn the 30 seconds<br />\r\n10 minutes<br />\r\n1 Power Snatch + Hang Squat Snatch @ 75-80% of 1 RM<br />\r\n- total of 20 complexes (40 snatches)'),
(64, 'April 30th WOD B ', 'timed', '2015-04-30', 'B)<br />\r\nWOD<br />\r\nComplete for time<br />\r\n14-12-10-8-6-4-2<br />\r\nPower Snatch (95, 65) Rx+ (115, 85)<br />\r\nBar facing Burpees<br />\r\n*10 minute cap<br />\r\n<br />\r\nrest 2 minus after the 10 minute mark, and perform C.<br />\r\n<br />\r\nC)<br />\r\n7 Min AMRAP<br />\r\nMax reps Strict Press (95, 65)<br />\r\n*anytime you break perform 7 calories on the Assualt Bike'),
(65, 'Strength APRIL 29', 'weight', '2015-04-29', 'A) Strength WOD<br />\r\nFront Squats<br />\r\n1 x 5,4,3,2,1<br />\r\nFind a 1 Rep Max<br />\r\n- rest as needed btw set'),
(66, 'Skill Work', 'not_timed', '2015-05-03', 'Skill work:<br />\r\n10 minute practice <br />\r\nSkill &ndash; muscle ups / strict<br />\r\nOr<br />\r\nThose who can perform 5 muscle ups I broke perform:<br />\r\nDeath by muscle-ups: every minute on the minute Perform 1 muscle-up. Increase the June r of reps by one every minute until you cannot complete all of the reps in that minute. Your score is the most reps you completed in the final minute of your work. '),
(67, 'Skill Work', 'not_timed', '2015-05-04', 'Skill work:<br />\n10 minute practice <br />\nSkill &ndash; muscle ups / strict<br />\nOr<br />\nThose who can perform 5 muscle ups I broke perform:<br />\nDeath by muscle-ups: every minute on the minute Perform 1 muscle-up. Increase the number of reps by one every minute until you cannot complete all of the reps in that minute. Your score is the most reps you completed in the final minute of your work. '),
(68, 'WOD B', 'timed', '2015-05-04', 'B)<br />\nWOD<br />\nComplete for time:<br />\n<br />\n10 Toes to Bar <br />\n15 Power Cleans (155, 105) <br />\n20 seconds unbroken L-sit<br />\n15 Front Squats (155, 105) <br />\n3 Rope Climbs <br />\n15 Shoulder to Overhead (155, 105) <br />\n10 Toes to Bar <br />\n10 Power Cleans <br />\n20 seconds unbroken L-sit<br />\n10 Front Squats<br />\n3 Rope Climbs <br />\n10 Shoulder to Overhead<br />\n10 Toes to Bar <br />\n5 Power Cleans <br />\n20 seconds unbroken L-sit<br />\n5 Front Squats<br />\n3 Rope Climbs <br />\n5 Shoulder to Overhead');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcement_id`);

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `workouts`
--
ALTER TABLE `workouts`
  MODIFY `workout_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `wod_results`
--
ALTER TABLE `wod_results`
ADD CONSTRAINT `wod_results_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
