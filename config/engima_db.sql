-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2019 at 09:55 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `engima_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `rating` float UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `release_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`, `photo`, `duration`, `rating`, `description`, `price`, `category`, `release_date`) VALUES
(1, 'Iron Man', 'ironman.jpg', 126, 7.9, 'After being held captive in an Afghan cave, billionaire engineer Tony Stark creates a unique weaponized suit of armor to fight evil.', 35000, 'Action, Adventure, Sci-Fi', 'September 2, 2019'),
(2, 'The Incredible Hulk', 'thehulk.jpg', 112, 6.7, 'Bruce Banner, a scientist on the run from the U.S. Government, must find a cure for the monster he turns into, whenever he loses his temper.', 35000, 'Action, Adventure, Sci-Fi', 'September 13, 2019'),
(3, 'Thor: Ragnarok', 'ragnarok.jpg', 130, 7.9, 'Thor (Chris Hemsworth) is imprisoned on the planet Sakaar, and must race against time to return to Asgard and stop Ragnarök, the destruction of his world, at the hands of the powerful and ruthless villain Hela (Cate Blanchett).', 40000, 'Action, Adventure, Comedy', 'September 3, 2019'),
(4, 'The Shawshank Redemption', 'shawshank.jpg', 142, 9.3, 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.', 35000, 'Drama', 'September 14, 2019'),
(5, 'Schindler\'s List', 'schindlers.jpg', 195, 8.9, 'In German-occupied Poland during World War II, industrialist Oskar Schindler gradually becomes concerned for his Jewish workforce after witnessing their persecution by the Nazis.', 40000, 'Biography, Drama, History', 'September 4, 2019'),
(6, 'Spider-Man: Far from Home', 'ffh.jpg', 129, 7.7, 'Following the events of Avengers: Endgame (2019), Spider-Man must step up to take on new threats in a world that has changed forever.', 40000, 'Action, Adventure, Sci-Fi', 'September 8, 2019'),
(7, 'Avengers: Infinity War', 'infinitywar.jpg', 149, 8.5, 'The Avengers and their allies must be willing to sacrifice all in an attempt to defeat the powerful Thanos before his blitz of devastation and ruin puts an end to the universe.', 45000, 'Action, Adventure, Sci-Fi', 'September 27, 2019'),
(8, 'Cinderella', 'cinderella.jpg', 105, 6.9, 'When her father unexpectedly dies, young Ella finds herself at the mercy of her cruel stepmother and her scheming stepsisters. Never one to give up hope, Ella\'s fortunes begin to change after meeting a dashing stranger.', 35000, 'Drama, Fantasy, Family', 'September 16, 2019'),
(9, 'Bohemian Rhapsody', 'bohemian.jpg', 134, 8, 'The story of the legendary British rock band Queen and lead singer Freddie Mercury, leading up to their famous performance at Live Aid (1985).', 35000, 'Biography, Drama, Music', 'September 9, 2019'),
(10, 'Ocean\'s Eight', 'ocean.jpg', 110, 6.2, 'Debbie Ocean gathers an all-female crew to attempt an impossible heist at New York City\'s yearly Met Gala.', 35000, 'Action, Comedy, Crime', 'September 18, 2019'),
(11, 'Monsters, Inc.', 'monsters.jpg', 92, 8, 'In order to power the city, monsters have to scare children so that they scream. However, the children are toxic to the monsters, and after a child gets through, 2 monsters realize things may not be what they think.', 35000, 'Animation, Adventure, Comedy', 'September 6, 2019');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `id_movie` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content` text NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `id_movie`, `id_user`, `content`, `rating`) VALUES
(1, 7, 1, '111', 5);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `date_of_play` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `date_of_play`) VALUES
(1, '2019-09-25 16:00:00'),
(2, '2019-09-25 19:00:00'),
(3, '2019-09-26 15:00:00'),
(4, '2019-09-26 21:00:00'),
(5, '2019-09-27 13:00:00'),
(6, '2019-09-27 17:00:00'),
(7, '2019-09-28 10:00:00'),
(8, '2019-09-28 22:00:00'),
(9, '2019-09-30 19:00:00'),
(10, '2019-09-30 21:00:00'),
(11, '2019-10-01 20:00:00'),
(12, '2019-10-01 22:00:00'),
(13, '2019-10-02 16:00:00'),
(14, '2019-10-02 18:00:00'),
(15, '2019-10-02 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `id_schedules` int(11) NOT NULL,
  `vacant` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `name`, `id_schedules`, `vacant`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 1, 1),
(4, 4, 1, 1),
(5, 5, 1, 1),
(6, 6, 1, 1),
(7, 7, 1, 1),
(8, 8, 1, 1),
(9, 9, 1, 1),
(10, 10, 1, 1),
(11, 11, 1, 1),
(12, 12, 1, 1),
(13, 13, 1, 1),
(14, 14, 1, 1),
(15, 15, 1, 1),
(16, 16, 1, 1),
(17, 17, 1, 1),
(18, 18, 1, 1),
(19, 19, 1, 1),
(20, 20, 1, 1),
(21, 21, 1, 1),
(22, 22, 1, 1),
(23, 23, 1, 1),
(24, 24, 1, 1),
(25, 25, 1, 1),
(26, 26, 1, 1),
(27, 27, 1, 1),
(28, 28, 1, 1),
(29, 29, 1, 1),
(30, 30, 1, 1),
(31, 1, 2, 1),
(32, 2, 2, 1),
(33, 3, 2, 1),
(34, 4, 2, 1),
(35, 5, 2, 1),
(36, 6, 2, 1),
(37, 7, 2, 1),
(38, 8, 2, 1),
(39, 9, 2, 1),
(40, 10, 2, 1),
(41, 11, 2, 1),
(42, 12, 2, 1),
(43, 13, 2, 1),
(44, 14, 2, 1),
(45, 15, 2, 1),
(46, 16, 2, 1),
(47, 17, 2, 1),
(48, 18, 2, 1),
(49, 19, 2, 1),
(50, 20, 2, 1),
(51, 21, 2, 1),
(52, 22, 2, 1),
(53, 23, 2, 1),
(54, 24, 2, 1),
(55, 25, 2, 1),
(56, 26, 2, 1),
(57, 27, 2, 1),
(58, 28, 2, 1),
(59, 29, 2, 1),
(60, 30, 2, 1),
(61, 1, 3, 1),
(62, 2, 3, 1),
(63, 3, 3, 1),
(64, 4, 3, 1),
(65, 5, 3, 1),
(66, 6, 3, 1),
(67, 7, 3, 1),
(68, 8, 3, 1),
(69, 9, 3, 1),
(70, 10, 3, 1),
(71, 11, 3, 1),
(72, 12, 3, 1),
(73, 13, 3, 1),
(74, 14, 3, 1),
(75, 15, 3, 1),
(76, 16, 3, 1),
(77, 17, 3, 1),
(78, 18, 3, 1),
(79, 19, 3, 1),
(80, 20, 3, 1),
(81, 21, 3, 1),
(82, 22, 3, 1),
(83, 23, 3, 1),
(84, 24, 3, 1),
(85, 25, 3, 1),
(86, 26, 3, 1),
(87, 27, 3, 1),
(88, 28, 3, 1),
(89, 29, 3, 1),
(90, 30, 3, 1),
(91, 1, 4, 1),
(92, 2, 4, 1),
(93, 3, 4, 1),
(94, 4, 4, 1),
(95, 5, 4, 1),
(96, 6, 4, 1),
(97, 7, 4, 1),
(98, 8, 4, 1),
(99, 9, 4, 1),
(100, 10, 4, 1),
(101, 11, 4, 1),
(102, 12, 4, 1),
(103, 13, 4, 1),
(104, 14, 4, 1),
(105, 15, 4, 1),
(106, 16, 4, 1),
(107, 17, 4, 1),
(108, 18, 4, 1),
(109, 19, 4, 1),
(110, 20, 4, 1),
(111, 21, 4, 1),
(112, 22, 4, 1),
(113, 23, 4, 1),
(114, 24, 4, 1),
(115, 25, 4, 1),
(116, 26, 4, 1),
(117, 27, 4, 1),
(118, 28, 4, 1),
(119, 29, 4, 1),
(120, 30, 4, 1),
(121, 1, 5, 1),
(122, 2, 5, 1),
(123, 3, 5, 1),
(124, 4, 5, 1),
(125, 5, 5, 1),
(126, 6, 5, 1),
(127, 7, 5, 1),
(128, 8, 5, 1),
(129, 9, 5, 1),
(130, 10, 5, 1),
(131, 11, 5, 1),
(132, 12, 5, 1),
(133, 13, 5, 1),
(134, 14, 5, 1),
(135, 15, 5, 1),
(136, 16, 5, 1),
(137, 17, 5, 1),
(138, 18, 5, 1),
(139, 19, 5, 1),
(140, 20, 5, 1),
(141, 21, 5, 1),
(142, 22, 5, 1),
(143, 23, 5, 1),
(144, 24, 5, 1),
(145, 25, 5, 1),
(146, 26, 5, 1),
(147, 27, 5, 1),
(148, 28, 5, 1),
(149, 29, 5, 1),
(150, 30, 5, 1),
(151, 1, 6, 1),
(152, 2, 6, 1),
(153, 3, 6, 1),
(154, 4, 6, 1),
(155, 5, 6, 1),
(156, 6, 6, 1),
(157, 7, 6, 1),
(158, 8, 6, 1),
(159, 9, 6, 1),
(160, 10, 6, 1),
(161, 11, 6, 1),
(162, 12, 6, 1),
(163, 13, 6, 1),
(164, 14, 6, 1),
(165, 15, 6, 1),
(166, 16, 6, 1),
(167, 17, 6, 1),
(168, 18, 6, 1),
(169, 19, 6, 1),
(170, 20, 6, 1),
(171, 21, 6, 1),
(172, 22, 6, 1),
(173, 23, 6, 1),
(174, 24, 6, 1),
(175, 25, 6, 1),
(176, 26, 6, 1),
(177, 27, 6, 1),
(178, 28, 6, 1),
(179, 29, 6, 1),
(180, 30, 6, 1),
(181, 1, 7, 1),
(182, 2, 7, 1),
(183, 3, 7, 1),
(184, 4, 7, 1),
(185, 5, 7, 1),
(186, 6, 7, 1),
(187, 7, 7, 1),
(188, 8, 7, 1),
(189, 9, 7, 1),
(190, 10, 7, 1),
(191, 11, 7, 1),
(192, 12, 7, 1),
(193, 13, 7, 1),
(194, 14, 7, 1),
(195, 15, 7, 1),
(196, 16, 7, 1),
(197, 17, 7, 1),
(198, 18, 7, 1),
(199, 19, 7, 1),
(200, 20, 7, 1),
(201, 21, 7, 1),
(202, 22, 7, 1),
(203, 23, 7, 1),
(204, 24, 7, 1),
(205, 25, 7, 1),
(206, 26, 7, 1),
(207, 27, 7, 1),
(208, 28, 7, 1),
(209, 29, 7, 1),
(210, 30, 7, 1),
(211, 1, 8, 1),
(212, 2, 8, 1),
(213, 3, 8, 1),
(214, 4, 8, 1),
(215, 5, 8, 1),
(216, 6, 8, 1),
(217, 7, 8, 1),
(218, 8, 8, 1),
(219, 9, 8, 1),
(220, 10, 8, 1),
(221, 11, 8, 1),
(222, 12, 8, 1),
(223, 13, 8, 1),
(224, 14, 8, 1),
(225, 15, 8, 1),
(226, 16, 8, 1),
(227, 17, 8, 1),
(228, 18, 8, 1),
(229, 19, 8, 1),
(230, 20, 8, 1),
(231, 21, 8, 1),
(232, 22, 8, 1),
(233, 23, 8, 1),
(234, 24, 8, 1),
(235, 25, 8, 1),
(236, 26, 8, 1),
(237, 27, 8, 1),
(238, 28, 8, 1),
(239, 29, 8, 1),
(240, 30, 8, 1),
(241, 1, 9, 1),
(242, 2, 9, 1),
(243, 3, 9, 1),
(244, 4, 9, 1),
(245, 5, 9, 1),
(246, 6, 9, 1),
(247, 7, 9, 1),
(248, 8, 9, 1),
(249, 9, 9, 1),
(250, 10, 9, 1),
(251, 11, 9, 1),
(252, 12, 9, 1),
(253, 13, 9, 1),
(254, 14, 9, 1),
(255, 15, 9, 1),
(256, 16, 9, 1),
(257, 17, 9, 1),
(258, 18, 9, 1),
(259, 19, 9, 1),
(260, 20, 9, 1),
(261, 21, 9, 1),
(262, 22, 9, 1),
(263, 23, 9, 1),
(264, 24, 9, 1),
(265, 25, 9, 1),
(266, 26, 9, 1),
(267, 27, 9, 1),
(268, 28, 9, 1),
(269, 29, 9, 1),
(270, 30, 9, 1),
(271, 1, 10, 1),
(272, 2, 10, 1),
(273, 3, 10, 1),
(274, 4, 10, 1),
(275, 5, 10, 1),
(276, 6, 10, 1),
(277, 7, 10, 1),
(278, 8, 10, 1),
(279, 9, 10, 1),
(280, 10, 10, 1),
(281, 11, 10, 1),
(282, 12, 10, 1),
(283, 13, 10, 1),
(284, 14, 10, 1),
(285, 15, 10, 1),
(286, 16, 10, 1),
(287, 17, 10, 1),
(288, 18, 10, 1),
(289, 19, 10, 1),
(290, 20, 10, 1),
(291, 21, 10, 1),
(292, 22, 10, 1),
(293, 23, 10, 1),
(294, 24, 10, 1),
(295, 25, 10, 1),
(296, 26, 10, 1),
(297, 27, 10, 1),
(298, 28, 10, 1),
(299, 29, 10, 1),
(300, 30, 10, 1),
(301, 1, 11, 1),
(302, 2, 11, 1),
(303, 3, 11, 1),
(304, 4, 11, 1),
(305, 5, 11, 1),
(306, 6, 11, 1),
(307, 7, 11, 1),
(308, 8, 11, 1),
(309, 9, 11, 1),
(310, 10, 11, 1),
(311, 11, 11, 1),
(312, 12, 11, 1),
(313, 13, 11, 1),
(314, 14, 11, 1),
(315, 15, 11, 1),
(316, 16, 11, 1),
(317, 17, 11, 1),
(318, 18, 11, 1),
(319, 19, 11, 1),
(320, 20, 11, 1),
(321, 21, 11, 1),
(322, 22, 11, 1),
(323, 23, 11, 1),
(324, 24, 11, 1),
(325, 25, 11, 1),
(326, 26, 11, 1),
(327, 27, 11, 1),
(328, 28, 11, 1),
(329, 29, 11, 1),
(330, 30, 11, 1),
(331, 1, 12, 1),
(332, 2, 12, 1),
(333, 3, 12, 1),
(334, 4, 12, 1),
(335, 5, 12, 1),
(336, 6, 12, 1),
(337, 7, 12, 1),
(338, 8, 12, 1),
(339, 9, 12, 1),
(340, 10, 12, 1),
(341, 11, 12, 1),
(342, 12, 12, 1),
(343, 13, 12, 1),
(344, 14, 12, 1),
(345, 15, 12, 1),
(346, 16, 12, 1),
(347, 17, 12, 1),
(348, 18, 12, 1),
(349, 19, 12, 1),
(350, 20, 12, 1),
(351, 21, 12, 1),
(352, 22, 12, 1),
(353, 23, 12, 1),
(354, 24, 12, 1),
(355, 25, 12, 1),
(356, 26, 12, 1),
(357, 27, 12, 1),
(358, 28, 12, 1),
(359, 29, 12, 1),
(360, 30, 12, 1),
(361, 1, 13, 1),
(362, 2, 13, 1),
(363, 3, 13, 1),
(364, 4, 13, 1),
(365, 5, 13, 1),
(366, 6, 13, 1),
(367, 7, 13, 1),
(368, 8, 13, 1),
(369, 9, 13, 1),
(370, 10, 13, 1),
(371, 11, 13, 1),
(372, 12, 13, 1),
(373, 13, 13, 1),
(374, 14, 13, 1),
(375, 15, 13, 1),
(376, 16, 13, 1),
(377, 17, 13, 1),
(378, 18, 13, 1),
(379, 19, 13, 1),
(380, 20, 13, 1),
(381, 21, 13, 1),
(382, 22, 13, 1),
(383, 23, 13, 1),
(384, 24, 13, 1),
(385, 25, 13, 1),
(386, 26, 13, 1),
(387, 27, 13, 1),
(388, 28, 13, 1),
(389, 29, 13, 1),
(390, 30, 13, 1),
(391, 1, 14, 1),
(392, 2, 14, 1),
(393, 3, 14, 1),
(394, 4, 14, 1),
(395, 5, 14, 1),
(396, 6, 14, 1),
(397, 7, 14, 1),
(398, 8, 14, 1),
(399, 9, 14, 1),
(400, 10, 14, 1),
(401, 11, 14, 1),
(402, 12, 14, 1),
(403, 13, 14, 1),
(404, 14, 14, 1),
(405, 15, 14, 1),
(406, 16, 14, 1),
(407, 17, 14, 1),
(408, 18, 14, 1),
(409, 19, 14, 1),
(410, 20, 14, 1),
(411, 21, 14, 1),
(412, 22, 14, 1),
(413, 23, 14, 1),
(414, 24, 14, 1),
(415, 25, 14, 1),
(416, 26, 14, 1),
(417, 27, 14, 1),
(418, 28, 14, 1),
(419, 29, 14, 1),
(420, 30, 14, 1),
(421, 1, 15, 1),
(422, 2, 15, 1),
(423, 3, 15, 1),
(424, 4, 15, 1),
(425, 5, 15, 1),
(426, 6, 15, 1),
(427, 7, 15, 1),
(428, 8, 15, 1),
(429, 9, 15, 1),
(430, 10, 15, 1),
(431, 11, 15, 1),
(432, 12, 15, 1),
(433, 13, 15, 1),
(434, 14, 15, 1),
(435, 15, 15, 1),
(436, 16, 15, 1),
(437, 17, 15, 1),
(438, 18, 15, 1),
(439, 19, 15, 1),
(440, 20, 15, 1),
(441, 21, 15, 1),
(442, 22, 15, 1),
(443, 23, 15, 1),
(444, 24, 15, 1),
(445, 25, 15, 1),
(446, 26, 15, 1),
(447, 27, 15, 1),
(448, 28, 15, 1),
(449, 29, 15, 1),
(450, 30, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE `shows` (
  `id` int(11) NOT NULL,
  `id_movie` int(11) NOT NULL,
  `id_schedule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`id`, `id_movie`, `id_schedule`) VALUES
(1, 7, 1),
(2, 7, 2),
(3, 8, 3),
(4, 4, 11),
(5, 5, 7),
(6, 8, 14),
(7, 10, 6),
(8, 5, 5),
(9, 5, 2),
(10, 3, 14),
(11, 4, 11),
(12, 4, 14),
(13, 6, 6),
(14, 6, 15);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `photo`, `phone`) VALUES
(1, 'itb13517038', 'ayurifanny@gmail.com', '1', 'BastaWaka.png', '081283314945'),
(2, 'itb135170328', 'ayurifanny@gma1il.co1m', '1', 'star.png', '08128331491');

-- --------------------------------------------------------

--
-- Table structure for table `watches`
--

CREATE TABLE `watches` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_schedule` int(11) NOT NULL,
  `chair_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `watches`
--

INSERT INTO `watches` (`id`, `id_user`, `id_schedule`, `chair_number`) VALUES
(1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `frgn_id_movie_reviews` (`id_movie`),
  ADD KEY `frgn_id_user_reviews` (`id_user`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `frgn_id_schedule_shows` (`id_schedule`),
  ADD KEY `frgnk_id_movie_shows` (`id_movie`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `watches`
--
ALTER TABLE `watches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `frgn_id_schedule_watches` (`id_schedule`),
  ADD KEY `frgn_id_user_watches` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=451;

--
-- AUTO_INCREMENT for table `shows`
--
ALTER TABLE `shows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `watches`
--
ALTER TABLE `watches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `frgn_id_movie_reviews` FOREIGN KEY (`id_movie`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `frgn_id_user_reviews` FOREIGN KEY (`id_user`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shows`
--
ALTER TABLE `shows`
  ADD CONSTRAINT `frgn_id_schedule_shows` FOREIGN KEY (`id_schedule`) REFERENCES `schedules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `frgnk_id_movie_shows` FOREIGN KEY (`id_movie`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `watches`
--
ALTER TABLE `watches`
  ADD CONSTRAINT `frgn_id_user_watches` FOREIGN KEY (`id_user`) REFERENCES `watches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
