-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 06:17 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

 CREATE DATABASE IF NOT EXISTS `cine` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cine`;  

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cine`
--

-- --------------------------------------------------------

--
-- Table structure for table `branchinfo`
--

CREATE TABLE `branchinfo` (
  `branch_id` int(10) NOT NULL,
  `branch_address` text NOT NULL,
  `branch_telephone` text NOT NULL,
  `branch_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `branchinfo`
--

INSERT INTO `branchinfo` (`branch_id`, `branch_address`, `branch_telephone`, `branch_name`) VALUES
(1001, '126 Pracha Uthit Rd., Bang Mod, Thung Khru, Bangkok 10140, Thailand', '021111111', 'Bang Mod Flag Ship Cinema'),
(1002, '991 Rama I Road, Pathum Wan\r\nBangkok 10330, Thailand', '022222222', 'Siam Cinema'),
(1003, '333/99 Moo 9, Nong Prue Subdistrict, Bang Lamung, Pattaya, Chonburi 20260, Thailand', '023333333', 'Pattaya Cinema'),
(1004, '299 Charoen Nakhon Rd, Khlong Ton Sai, Khlong San, Bangkok 10600, Thailand', '024444444', 'River View Cinema'),
(1005, '69/4 Pradit Manutham Road, Lat Phrao, Bangkok 10230, Thailand', '025555555\r\n', 'Lat Phrao Cinema'),
(1006, '9 9 Ratchadaphisek Rd, Huai Khwang, Bangkok 10320, Thailand', '026666666', 'BKK Cinema'),
(1007, '39 Moo 6, Bangna-Trad Rd, Bang Kaeo, Bang Phli, Samut Prakan 10540, Thailand', '027777777', 'Bang Na Cinema'),
(1008, '94 Phaholyothin Road, Prachathipat, Thanyaburi, Pathumtanee 12130, Thailand', '028888888', 'Pathumtanee Cinema'),
(1009, '99/3 Moo 4, Mueang Chiang Mai District, Chiang Mai 50000, Thailand', '029999999', 'Chiang Mai Cinema'),
(1010, '74-75 Moo 5, Wichit, Muang Phuket, Phuket 83000, Thailand', '021000000', 'Phuket Cinema'),
(1011, '1520 Kanchanavanich Road, Hadyai, Hadyai, SongKhla 90110, Thailand', '021100000', 'Hatyai Cinema'),
(1012, '888 Mittraphap-Nong Khai Road, Naimuang, Muang Nakhon Ratchasima, Nakhon Ratchasima 30000, Thailand', '021200000', 'Korat Cinema'),
(1013, '10 Bayfront Ave, Singapore 018956, Singapore', '021300000', 'Bayfront Cinema'),
(1014, 'ION Orchard, 2 Orchard Turn, Singapore 238801, Singapore', '021400000', 'Singapore Cinema'),
(1015, '168 Jalan Bukit Bintang, Kuala Lumpur 55100 Malaysia', '021500000', 'Kuala Lumpur Cinema'),
(1016, 'Lingkaran Syed Putra Mid Valley City, Kuala Lumpur 59200, Malaysia', '021600000', 'Mid Valley Cinema'),
(1017, '132 Samdach Sothearos Blvd (3), Phnom Penh, Cambodia', '021700000\r\n', 'Phnom Penh Cinema'),
(1018, '20 Trần Phú, Lộc Thọ, Nha Trang, Khánh Hòa 650000, Vietnam', '021800000', 'Vietnam Cinema'),
(1019, '1058 Đ. Nguyễn Văn Linh, Tân Phong, Quận 7, Thành phố Hồ Chí Minh, Vietnam', '021900000', 'Hồ Chí Minh Cinema'),
(1020, 'East Kelapa Gading, Kelapa Gading, North Jakarta City, Jakarta, Indonesia', '022000000', 'Jakarta Cinema');

-- --------------------------------------------------------

--
-- Table structure for table `foodinfo`
--

CREATE TABLE `foodinfo` (
  `food_type` char(100) NOT NULL,
  `category` text NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `foodinfo`
--


INSERT INTO `foodinfo` (`food_type`, `category`, `description`) VALUES
('Coca-Cola', 'Drinks', 'Soft Drinks Coca-Cola'),
('Coca-Cola Zero', 'Drinks', 'Soft Drinks sugar-free Coca-Cola'),
('Fanta Grape', 'Drinks', 'Grape Flavor'),
('Fanta Orange', 'Drinks', 'Orange Flavor'),
('Fanta Strawberry Soda', 'Drinks', 'Strawberry Flavor'),
('Lemon Soda', 'Drinks', 'Soda Fruits'),
('Minera Water', 'Drinks', 'Mineral water from Norway'),
('Pepsi', 'Drinks', 'Refreshing Pepsi'),
('Pepsi Max', 'Drinks', 'Refreshing sugar-free Pepsi'),
('Sprite', 'Drinks', 'Soft Drinks Sprite'),
('Salty Popcorn', 'Popcorn', 'Salty flavour'),
('Caramel Popcorn', 'Popcorn', 'Caramel flavour '),
('Cheese Popcorn', 'Popcorn', 'Cheese flavour'),
('BBQ Popcorn', 'Popcorn', 'BBQ flavour'),
('Lay Nori seaweed', 'Snack', 'Nori seaweed flavour chips'),
('Lay BBQ', 'Snack', 'BBQ flavour chips'),
('Cornae', 'Snack', 'Corn chips'),
('Pringles', 'Snack', 'Fried potato chips');

-- --------------------------------------------------------

--
-- Table structure for table `foodsize`
--

CREATE TABLE `foodsize` (
  `food_id` int(10) NOT NULL,
  `food_type` char(100) NOT NULL,
  `size` varchar(10) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `foodsize`
--

INSERT INTO `foodsize` (`food_id`, `food_type`, `size`, `price`) VALUES
(101, 'Pepsi', 'S', 90),
(102, 'Pepsi', 'M', 140),
(103, 'Pepsi', 'L', 190),
(104, 'Pepsi Max', 'S', 90),
(105, 'Pepsi Max', 'M', 140),
(106, 'Pepsi Max', 'L', 190),
(107, 'Coca-Cola', 'S', 90),
(108, 'Coca-Cola', 'M', 140),
(109, 'Coca-Cola', 'L', 190),
(110, 'Coca-Cola Zero', 'S', 90),
(111, 'Coca-Cola Zero', 'M', 140),
(112, 'Coca-Cola Zero', 'L', 190),
(113, 'Sprite', 'S', 90),
(114, 'Sprite', 'M', 140),
(115, 'Sprite', 'L', 190),
(116, 'Lemon Soda', 'S', 100),
(117, 'Lemon Soda', 'M', 150),
(118, 'Minera Water', 'S', 40),
(119, 'Minera Water', 'M', 60),
(120, 'Fanta Strawberry Soda', 'S', 90),
(121, 'Fanta Strawberry Soda', 'M', 140),
(122, 'Fanta Strawberry Soda', 'L', 190),
(123, 'Fanta Orange', 'S', 90),
(124, 'Fanta Orange', 'M', 140),
(125, 'Fanta Orange', 'L', 190),
(126, 'Fanta Grape', 'S', 90),
(127, 'Fanta Grape', 'M', 140),
(128, 'Fanta Grape', 'L', 190),
(129, 'Salty Popcorn', 'S', 150),
(130, 'Salty Popcorn', 'M', 250),
(131, 'Salty Popcorn', 'L', 400),
(132, 'Caramel Popcorn', 'S', 150),
(133, 'Caramel Popcorn', 'M', 250),
(134, 'Caramel Popcorn', 'L', 400),
(135, 'Cheese Popcorn', 'S', 150),
(136, 'Cheese Popcorn', 'M', 250),
(137, 'Cheese Popcorn', 'L', 400),
(138, 'BBQ Popcorn', 'S', 150),
(139, 'BBQ Popcorn', 'M', 250),
(140, 'BBQ Popcorn', 'L', 400),
(141, 'Lay Nori seaweed', 'S', 40),
(142, 'Lay Nori seaweed', 'M', 80),
(143, 'Lay BBQ', 'S', 40),
(144, 'Lay BBQ', 'M', 80),
(145, 'Cornae', 'S', 40),
(146, 'Cornae', 'M', 80),
(147, 'Pringles', 'S', 40),
(148, 'Pringles', 'M', 80);


-- --------------------------------------------------------

--
-- Table structure for table `layouttype`
--

CREATE TABLE `layouttype` (
  `layout_type` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `layouttype`
--

INSERT INTO `layouttype` (`layout_type`) VALUES
('A'),
('B'),
('C'),
('D'),
('E'),
('F');

-- --------------------------------------------------------

--
-- Table structure for table `movieinfo`
--

CREATE TABLE `movieinfo` (
  `movie_id` bigint(20) NOT NULL,
  `movie_name` text NOT NULL,
  `movie_description` text DEFAULT NULL,
  `movie_trailer` text DEFAULT NULL,
  `director_info` text DEFAULT NULL,
  `movie_poster` text DEFAULT NULL,
  `movie_length` int(10) UNSIGNED DEFAULT 0,
  `releaseDate` date DEFAULT NULL,
  `promote` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `movieinfo`
--

INSERT INTO `movieinfo` (`movie_id`, `movie_name`, `movie_description`, `movie_trailer`, `director_info`, `movie_poster`, `movie_length`, `releaseDate`, `promote`) VALUES
(100000001, 'Avatar 2: The Way of Water', 'Jake Sully lives with his newfound family formed on the extrasolar moon Pandora. Once a familiar threat returns to finish what was previously started, Jake must work with Neytiri and the army of the Na\'vi race to protect their home.', 'https://youtu.be/t0sCVZk0VVM', 'James Cameron', 'http://localhost/cine/img/poster/avatar-poster.png', 192, '2022-12-14', '0000-00-00'),
(100000002, 'John Wick 4', 'John Wick uncovers a path to defeating The High Table. But before he can earn his freedom, Wick must face off against a new enemy with powerful alliances across the globe and forces that turn old friends into foes.', 'https://www.youtube.com/watch?v=yjRHZEUamCc', 'Chad Stahelski', 'https://www.imdb.com/title/tt10366206/mediaviewer/rm4007540737/?ref_=tt_ov_i', 169, '2023-03-22', '0000-00-00'),
(100000003, 'The Batman', 'When a sadistic serial killer begins murdering key political figures in Gotham, Batman is forced to investigate the city\'s hidden corruption and question his family\'s involvement.', 'https://www.youtube.com/watch?v=mqqft2x_Aa4', 'Matt Reeves', 'https://www.imdb.com/title/tt1877830/mediaviewer/rm2474894849/?ref_=tt_ov_i', 175, '2023-03-03', '0000-00-00'),
(100000004, 'The Super Mario Bros. Movie', 'The story of The Super Mario Bros. on their journey through the Mushroom Kingdom.', 'https://www.youtube.com/watch?v=rG4tpqT5zlw', 'Aaron Horvath, Michael Jelenic, Pierre Leduc', 'https://www.imdb.com/title/tt6718170/mediaviewer/rm1378366465/?ref_=tt_ov_i', 92, '2023-04-05', '0000-00-00'),
(100000005, 'Creed III', 'Adonis has been thriving in both his career and family life, but when a childhood friend and former boxing prodigy resurfaces, the face-off is more than just a fight.', 'https://www.youtube.com/watch?v=AHmCH7iB_IM', 'Michael B. Jordan', 'https://www.imdb.com/title/tt11145118/mediaviewer/rm669921281/?ref_=tt_ov_i', 116, '2023-03-02', '0000-00-00'),
(100000006, 'Dungeons & Dragons: Honor Among Thieves', 'A charming thief and a band of unlikely adventurers embark on an epic quest to retrieve a lost relic, but things go dangerously awry when they run afoul of the wrong people.', 'https://www.youtube.com/watch?v=IiMinixSXII', 'John Francis Daley, Jonathan Goldstein', 'https://www.imdb.com/title/tt2906216/mediaviewer/rm2360753153/?ref_=tt_ov_i', 134, '2023-03-03', '0000-00-00'),
(100000007, 'Barbie', 'To live in Barbie Land is to be a perfect being in a perfect place. Unless you have a full-on existential crisis. Or you\'re a Ken.', 'https://www.youtube.com/watch?v=8zIf0XvoL9Y', 'Greta Gerwig', 'https://www.imdb.com/title/tt1517268/mediaviewer/rm2419599361/?ref_=tt_ov_i', NULL, '2023-07-21', '0000-00-00'),
(100000008, 'Operation Fortune: Ruse de guerre', 'Special agent Orson Fortune and his team of operatives recruit one of Hollywood\'s biggest movie stars to help them on an undercover mission when the sale of a deadly new weapons technology threatens to disrupt the world order.', 'https://www.youtube.com/watch?v=W8Sqk1GcqxY', 'Guy Ritchie', 'https://www.imdb.com/title/tt7985704/mediaviewer/rm576532737/?ref_=tt_ov_i', 114, '2023-04-20', '0000-00-00'),
(100000009, 'Spider-Man: Across the Spider-Verse', 'Miles Morales catapults across the Multiverse, where he encounters a team of Spider-People charged with protecting its very existence. When the heroes clash on how to handle a new threat, Miles must redefine what it means to be a hero.', 'https://www.youtube.com/watch?v=cqGjhVJWtEg', 'Joaquim Dos, SantosKemp Powers, Justin K. Thompson', 'https://www.imdb.com/title/tt9362722/mediaviewer/rm2758622721/?ref_=tt_ov_i', 120, '2023-06-02', '0000-00-00'),
(100000010, 'Guardians of the Galaxy Vol. 3', 'Still reeling from the loss of Gamora, Peter Quill rallies his team to defend the universe and one of their own - a mission that could mean the end of the Guardians if not successful.', 'https://www.youtube.com/watch?v=u3V5KDHRQvk', 'James Gunn', 'https://lumiere-a.akamaihd.net/v1/images/th-guardiansofthegalaxy-vol3-payoffposter_bdad006d.jpeg?region=0%2C0%2C600%2C900', 150, '2023-05-05', '0000-00-00'),
(100000011, '65', 'An astronaut crash lands on a mysterious planet only to discover he\'s not alone.', 'https://www.youtube.com/watch?v=bHXejJq5vr0', 'Scott BecBryan Woods', 'https://m.media-amazon.com/images/M/MV5BYzFhM2M1MDUtNDhmNC00YzEzLThiMzctYWYxZTc0MGJhNWYyXkEyXkFqcGdeQXVyMTUzMTg2ODkz._V1_FMjpg_UX1000_.jpg', 93, '2023-04-12', '0000-00-00'),
(100000012, 'Detective Conan The Movie 26 : Black Iron Submarine', 'This time\'s location is set in the sea near the Hachijo-jima island, Tokyo. Engineers from around the world have gathered for the full-scale operation of \"Pacific Buoy,\" an offshore facility to connect security cameras owned by the worldwide police forces. A test of a certain \"new technology\" based on a face recognition system is underway there.\r\n\r\nMeanwhile, Conan and the Detective Boys visit Hachijo-jima at Sonoko\'s invitation and receive a phone call from Subaru Okiya informing them that a Europol employee was murdered in Germany by the Black Organization\'s Jin.\r\n\r\nConan, who is disquieted, sneaks into the facility and finds that a female engineer has been kidnapped by the Black Organization...! Furthermore, a USB drive containing certain information in her possession ends up in the hands of the organization... A black shadow also creeps up on Ai Haibara ...', 'https://www.youtube.com/watch?v=gGynIKMklkI', 'Tachikawa Yuzaru', 'https://www.metalbridges.com/wp-content/uploads/2023/04/Detective-Conan-The-Movie-26-Kurogane-no-Submarine-1.jpg', 110, '2023-04-26', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `promotion_code` varchar(15) NOT NULL,
  `discount_percent` float NOT NULL,
  `_start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `seat_type` char(50) DEFAULT NULL,
  `system_type` char(50) DEFAULT NULL,
  `_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`promotion_code`, `discount_percent`, `_start_date`, `end_date`, `seat_type`, `system_type`, `_description`) VALUES
('AIS15', 15, '2023-01-01 00:00:00', '2023-12-31 23:59:59', NULL, NULL, 'Special 15% discount for AIS customers with no restrictions, applicable to all system type and all types of seats'),
('BLOCKBUSTER', 15, '2023-01-01 00:00:00', '2023-12-31 23:59:59', 'Premium Bed', 'Bed Cinema', 'Watch Blockbuster Movies at BED CINEMAget a 15% discount throughout the year.'),
('CHRISTMAS', 50, '2022-12-24 00:00:00', '2022-12-25 23:59:59', NULL, NULL, 'Christmas Party, discount 50% for two days'),
('DTAC20', 20, '2023-01-01 00:00:00', '2023-12-31 23:59:59', 'Honeymoon Seat', NULL, 'Special 20% discount for DTAC customers applicable to Honeymoon seat for all system type.'),
('STUDENT20', 20, '2023-01-01 00:00:00', '2023-12-31 23:59:59', NULL, NULL, 'Just show your student ID card and get a 20% discount for all movies and all types of seats, for every showtime.'),
('SUMMER10', 10, '2023-03-01 00:00:00', '2023-05-31 23:59:59', 'Premium Seat', 'Laser', 'Special 10% discount For Summer 2003, usable for Premium Seat, Laser system type');

-- --------------------------------------------------------

--
-- Table structure for table `reservefood`
--

CREATE TABLE `reservefood` (
  `reserve_id` int(10) NOT NULL,
  `food_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reserveinfo`
--

CREATE TABLE `reserveinfo` (
  `reserve_id` int(10) NOT NULL,
  `showing_id` int(10) NOT NULL,
  `promotion_code` varchar(15) DEFAULT NULL,
  `payment_method` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reserveseats`
--

CREATE TABLE `reserveseats` (
  `reserve_id` int(10) NOT NULL,
  `seat_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seatlayout`
--

CREATE TABLE `seatlayout` (
  `seat_id` int(10) NOT NULL,
  `seat_type` char(50) NOT NULL,
  `layout_type` char(2) NOT NULL,
  `seat_row` char(1) NOT NULL,
  `seat_column` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `seatlayout`
--

INSERT INTO `seatlayout` (`seat_id`, `seat_type`, `layout_type`, `seat_row`, `seat_column`) VALUES
(300001, 'Premium Bed', 'A', 'A', 1),
(300002, 'Premium Bed', 'A', 'A', 2),
(300003, 'Premium Bed', 'A', 'A', 3),
(300004, 'Premium Bed', 'A', 'B', 1),
(300005, 'Premium Bed', 'A', 'B', 2),
(300006, 'Premium Bed', 'A', 'B', 3),
(300007, 'Premium Bed', 'A', 'C', 1),
(300008, 'Premium Bed', 'A', 'C', 2),
(300009, 'Premium Bed', 'A', 'C', 3),
(300010, 'Premium Bed', 'A', 'D', 1),
(300011, 'Premium Bed', 'A', 'D', 2),
(300012, 'Premium Bed', 'A', 'D', 3),
(300013, 'Premium Bed', 'B', 'A', 1),
(300014, 'Premium Bed', 'B', 'A', 2),
(300015, 'Premium Bed', 'B', 'A', 3),
(300016, 'Premium Bed', 'B', 'A', 4),
(300017, 'Premium Bed', 'B', 'B', 1),
(300018, 'Premium Bed', 'B', 'B', 2),
(300019, 'Premium Bed', 'B', 'B', 3),
(300020, 'Premium Bed', 'B', 'B', 4),
(300021, 'Premium Bed', 'B', 'C', 1),
(300022, 'Premium Bed', 'B', 'C', 2),
(300023, 'Premium Bed', 'B', 'C', 3),
(300024, 'Premium Bed', 'B', 'C', 4),
(300025, 'Premium Bed', 'B', 'D', 1),
(300026, 'Premium Bed', 'B', 'D', 2),
(300027, 'Premium Bed', 'B', 'D', 3),
(300028, 'Premium Bed', 'B', 'D', 4),
(300029, 'Premium Bed', 'C', 'A', 1),
(300030, 'Premium Bed', 'C', 'A', 2),
(300031, 'Premium Bed', 'C', 'A', 3),
(300032, 'Premium Bed', 'C', 'A', 4),
(300033, 'Premium Bed', 'C', 'A', 5),
(300034, 'Premium Bed', 'C', 'B', 1),
(300035, 'Premium Bed', 'C', 'B', 2),
(300036, 'Premium Bed', 'C', 'B', 3),
(300037, 'Premium Bed', 'C', 'B', 4),
(300038, 'Premium Bed', 'C', 'B', 5),
(300039, 'Premium Bed', 'C', 'C', 1),
(300040, 'Premium Bed', 'C', 'C', 2),
(300041, 'Premium Bed', 'C', 'C', 3),
(300042, 'Premium Bed', 'C', 'C', 4),
(300043, 'Premium Bed', 'C', 'C', 5),
(300044, 'Premium Bed', 'C', 'D', 1),
(300045, 'Premium Bed', 'C', 'D', 2),
(300046, 'Premium Bed', 'C', 'D', 3),
(300047, 'Premium Bed', 'C', 'D', 4),
(300048, 'Premium Bed', 'C', 'D', 5),
(300049, 'Honeymoon Seat', 'D', 'A', 1),
(300050, 'Honeymoon Seat', 'D', 'A', 2),
(300051, 'Honeymoon Seat', 'D', 'A', 3),
(300052, 'Honeymoon Seat', 'D', 'A', 4),
(300053, 'Honeymoon Seat', 'D', 'A', 5),
(300054, 'Honeymoon Seat', 'D', 'A', 6),
(300055, 'Premium Seat', 'D', 'B', 1),
(300056, 'Premium Seat', 'D', 'B', 2),
(300057, 'Premium Seat', 'D', 'B', 3),
(300058, 'Premium Seat', 'D', 'B', 4),
(300059, 'Premium Seat', 'D', 'B', 5),
(300060, 'Premium Seat', 'D', 'B', 6),
(300061, 'Premium Seat', 'D', 'C', 1),
(300062, 'Premium Seat', 'D', 'C', 2),
(300063, 'Premium Seat', 'D', 'C', 3),
(300064, 'Premium Seat', 'D', 'C', 4),
(300065, 'Premium Seat', 'D', 'C', 5),
(300066, 'Premium Seat', 'D', 'C', 6),
(300067, 'Premium Seat', 'D', 'D', 1),
(300068, 'Premium Seat', 'D', 'D', 2),
(300069, 'Premium Seat', 'D', 'D', 3),
(300070, 'Premium Seat', 'D', 'D', 4),
(300071, 'Premium Seat', 'D', 'D', 5),
(300072, 'Premium Seat', 'D', 'D', 6),
(300073, 'Honeymoon Seat', 'E', 'A', 1),
(300074, 'Honeymoon Seat', 'E', 'A', 2),
(300075, 'Honeymoon Seat', 'E', 'A', 3),
(300076, 'Honeymoon Seat', 'E', 'A', 4),
(300077, 'Honeymoon Seat', 'E', 'A', 5),
(300078, 'Honeymoon Seat', 'E', 'A', 6),
(300079, 'Honeymoon Seat', 'E', 'A', 7),
(300080, 'Honeymoon Seat', 'E', 'A', 8),
(300081, 'Honeymoon Seat', 'E', 'A', 9),
(300082, 'Honeymoon Seat', 'E', 'A', 10),
(300083, 'Honeymoon Seat', 'E', 'A', 11),
(300084, 'Honeymoon Seat', 'E', 'A', 12),
(300085, 'Honeymoon Seat', 'E', 'A', 13),
(300086, 'Honeymoon Seat', 'E', 'A', 14),
(300087, 'Honeymoon Seat', 'E', 'A', 15),
(300088, 'Premium Seat', 'E', 'B', 1),
(300089, 'Premium Seat', 'E', 'B', 2),
(300090, 'Premium Seat', 'E', 'B', 3),
(300091, 'Premium Seat', 'E', 'B', 4),
(300092, 'Premium Seat', 'E', 'B', 5),
(300093, 'Premium Seat', 'E', 'B', 6),
(300094, 'Premium Seat', 'E', 'B', 7),
(300095, 'Premium Seat', 'E', 'B', 8),
(300096, 'Premium Seat', 'E', 'B', 9),
(300097, 'Premium Seat', 'E', 'B', 10),
(300098, 'Premium Seat', 'E', 'B', 11),
(300099, 'Premium Seat', 'E', 'B', 12),
(300100, 'Premium Seat', 'E', 'B', 13),
(300101, 'Premium Seat', 'E', 'B', 14),
(300102, 'Premium Seat', 'E', 'B', 15),
(300103, 'Premium Seat', 'E', 'C', 1),
(300104, 'Premium Seat', 'E', 'C', 2),
(300105, 'Premium Seat', 'E', 'C', 3),
(300106, 'Premium Seat', 'E', 'C', 4),
(300107, 'Premium Seat', 'E', 'C', 5),
(300108, 'Premium Seat', 'E', 'C', 6),
(300109, 'Premium Seat', 'E', 'C', 7),
(300110, 'Premium Seat', 'E', 'C', 8),
(300111, 'Premium Seat', 'E', 'C', 9),
(300112, 'Premium Seat', 'E', 'C', 10),
(300113, 'Premium Seat', 'E', 'C', 11),
(300114, 'Premium Seat', 'E', 'C', 12),
(300115, 'Premium Seat', 'E', 'C', 13),
(300116, 'Premium Seat', 'E', 'C', 14),
(300117, 'Premium Seat', 'E', 'C', 15),
(300118, 'Premium Seat', 'E', 'D', 1),
(300119, 'Premium Seat', 'E', 'D', 2),
(300120, 'Premium Seat', 'E', 'D', 3),
(300121, 'Premium Seat', 'E', 'D', 4),
(300122, 'Premium Seat', 'E', 'D', 5),
(300123, 'Premium Seat', 'E', 'D', 6),
(300124, 'Premium Seat', 'E', 'D', 7),
(300125, 'Premium Seat', 'E', 'D', 8),
(300126, 'Premium Seat', 'E', 'D', 9),
(300127, 'Premium Seat', 'E', 'D', 10),
(300128, 'Premium Seat', 'E', 'D', 11),
(300129, 'Premium Seat', 'E', 'D', 12),
(300130, 'Premium Seat', 'E', 'D', 13),
(300131, 'Premium Seat', 'E', 'D', 14),
(300132, 'Premium Seat', 'E', 'D', 15),
(300133, 'Premium Seat', 'E', 'E', 1),
(300134, 'Premium Seat', 'E', 'E', 2),
(300135, 'Premium Seat', 'E', 'E', 3),
(300136, 'Premium Seat', 'E', 'E', 4),
(300137, 'Premium Seat', 'E', 'E', 5),
(300138, 'Premium Seat', 'E', 'E', 6),
(300139, 'Premium Seat', 'E', 'E', 7),
(300140, 'Premium Seat', 'E', 'E', 8),
(300141, 'Premium Seat', 'E', 'E', 9),
(300142, 'Premium Seat', 'E', 'E', 10),
(300143, 'Premium Seat', 'E', 'E', 11),
(300144, 'Premium Seat', 'E', 'E', 12),
(300145, 'Premium Seat', 'E', 'E', 13),
(300146, 'Premium Seat', 'E', 'E', 14),
(300147, 'Premium Seat', 'E', 'E', 15),
(300148, 'Honeymoon Seat', 'F', 'A', 1),
(300149, 'Honeymoon Seat', 'F', 'A', 2),
(300150, 'Honeymoon Seat', 'F', 'A', 3),
(300151, 'Honeymoon Seat', 'F', 'A', 4),
(300152, 'Honeymoon Seat', 'F', 'A', 5),
(300153, 'Honeymoon Seat', 'F', 'A', 6),
(300154, 'Honeymoon Seat', 'F', 'A', 7),
(300155, 'Honeymoon Seat', 'F', 'A', 8),
(300156, 'Honeymoon Seat', 'F', 'A', 9),
(300157, 'Honeymoon Seat', 'F', 'A', 10),
(300158, 'Honeymoon Seat', 'F', 'A', 11),
(300159, 'Honeymoon Seat', 'F', 'A', 12),
(300160, 'Honeymoon Seat', 'F', 'A', 13),
(300161, 'Honeymoon Seat', 'F', 'A', 14),
(300162, 'Honeymoon Seat', 'F', 'A', 15),
(300163, 'Honeymoon Seat', 'F', 'A', 16),
(300164, 'Honeymoon Seat', 'F', 'A', 17),
(300165, 'Honeymoon Seat', 'F', 'A', 18),
(300166, 'Honeymoon Seat', 'F', 'B', 1),
(300167, 'Honeymoon Seat', 'F', 'B', 2),
(300168, 'Honeymoon Seat', 'F', 'B', 3),
(300169, 'Honeymoon Seat', 'F', 'B', 4),
(300170, 'Honeymoon Seat', 'F', 'B', 5),
(300171, 'Honeymoon Seat', 'F', 'B', 6),
(300172, 'Honeymoon Seat', 'F', 'B', 7),
(300173, 'Honeymoon Seat', 'F', 'B', 8),
(300174, 'Honeymoon Seat', 'F', 'B', 9),
(300175, 'Honeymoon Seat', 'F', 'B', 10),
(300176, 'Honeymoon Seat', 'F', 'B', 11),
(300177, 'Honeymoon Seat', 'F', 'B', 12),
(300178, 'Honeymoon Seat', 'F', 'B', 13),
(300179, 'Honeymoon Seat', 'F', 'B', 14),
(300180, 'Honeymoon Seat', 'F', 'B', 15),
(300181, 'Honeymoon Seat', 'F', 'B', 16),
(300182, 'Honeymoon Seat', 'F', 'B', 17),
(300183, 'Honeymoon Seat', 'F', 'B', 18),
(300184, 'Premium Seat', 'F', 'C', 1),
(300185, 'Premium Seat', 'F', 'C', 2),
(300186, 'Premium Seat', 'F', 'C', 3),
(300187, 'Premium Seat', 'F', 'C', 4),
(300188, 'Premium Seat', 'F', 'C', 5),
(300189, 'Premium Seat', 'F', 'C', 6),
(300190, 'Premium Seat', 'F', 'C', 7),
(300191, 'Premium Seat', 'F', 'C', 8),
(300192, 'Premium Seat', 'F', 'C', 9),
(300193, 'Premium Seat', 'F', 'C', 10),
(300194, 'Premium Seat', 'F', 'C', 11),
(300195, 'Premium Seat', 'F', 'C', 12),
(300196, 'Premium Seat', 'F', 'C', 13),
(300197, 'Premium Seat', 'F', 'C', 14),
(300198, 'Premium Seat', 'F', 'C', 15),
(300199, 'Premium Seat', 'F', 'C', 16),
(300200, 'Premium Seat', 'F', 'C', 17),
(300201, 'Premium Seat', 'F', 'C', 18),
(300202, 'Premium Seat', 'F', 'D', 1),
(300203, 'Premium Seat', 'F', 'D', 2),
(300204, 'Premium Seat', 'F', 'D', 3),
(300205, 'Premium Seat', 'F', 'D', 4),
(300206, 'Premium Seat', 'F', 'D', 5),
(300207, 'Premium Seat', 'F', 'D', 6),
(300208, 'Premium Seat', 'F', 'D', 7),
(300209, 'Premium Seat', 'F', 'D', 8),
(300210, 'Premium Seat', 'F', 'D', 9),
(300211, 'Premium Seat', 'F', 'D', 10),
(300212, 'Premium Seat', 'F', 'D', 11),
(300213, 'Premium Seat', 'F', 'D', 12),
(300214, 'Premium Seat', 'F', 'D', 13),
(300215, 'Premium Seat', 'F', 'D', 14),
(300216, 'Premium Seat', 'F', 'D', 15),
(300217, 'Premium Seat', 'F', 'D', 16),
(300218, 'Premium Seat', 'F', 'D', 17),
(300219, 'Premium Seat', 'F', 'D', 18),
(300220, 'Premium Seat', 'F', 'E', 1),
(300221, 'Premium Seat', 'F', 'E', 2),
(300222, 'Premium Seat', 'F', 'E', 3),
(300223, 'Premium Seat', 'F', 'E', 4),
(300224, 'Premium Seat', 'F', 'E', 5),
(300225, 'Premium Seat', 'F', 'E', 6),
(300226, 'Premium Seat', 'F', 'E', 7),
(300227, 'Premium Seat', 'F', 'E', 8),
(300228, 'Premium Seat', 'F', 'E', 9),
(300229, 'Premium Seat', 'F', 'E', 10),
(300230, 'Premium Seat', 'F', 'E', 11),
(300231, 'Premium Seat', 'F', 'E', 12),
(300232, 'Premium Seat', 'F', 'E', 13),
(300233, 'Premium Seat', 'F', 'E', 14),
(300234, 'Premium Seat', 'F', 'E', 15),
(300235, 'Premium Seat', 'F', 'E', 16),
(300236, 'Premium Seat', 'F', 'E', 17),
(300237, 'Premium Seat', 'F', 'E', 18),
(300238, 'Premium Seat', 'F', 'F', 1),
(300239, 'Premium Seat', 'F', 'F', 2),
(300240, 'Premium Seat', 'F', 'F', 3),
(300241, 'Premium Seat', 'F', 'F', 4),
(300242, 'Premium Seat', 'F', 'F', 5),
(300243, 'Premium Seat', 'F', 'F', 6),
(300244, 'Premium Seat', 'F', 'F', 7),
(300245, 'Premium Seat', 'F', 'F', 8),
(300246, 'Premium Seat', 'F', 'F', 9),
(300247, 'Premium Seat', 'F', 'F', 10),
(300248, 'Premium Seat', 'F', 'F', 11),
(300249, 'Premium Seat', 'F', 'F', 12),
(300250, 'Premium Seat', 'F', 'F', 13),
(300251, 'Premium Seat', 'F', 'F', 14),
(300252, 'Premium Seat', 'F', 'F', 15),
(300253, 'Premium Seat', 'F', 'F', 16),
(300254, 'Premium Seat', 'F', 'F', 17),
(300255, 'Premium Seat', 'F', 'F', 18),
(300256, 'Premium Seat', 'F', 'G', 1),
(300257, 'Premium Seat', 'F', 'G', 2),
(300258, 'Premium Seat', 'F', 'G', 3),
(300259, 'Premium Seat', 'F', 'G', 4),
(300260, 'Premium Seat', 'F', 'G', 5),
(300261, 'Premium Seat', 'F', 'G', 6),
(300262, 'Premium Seat', 'F', 'G', 7),
(300263, 'Premium Seat', 'F', 'G', 8),
(300264, 'Premium Seat', 'F', 'G', 9),
(300265, 'Premium Seat', 'F', 'G', 10),
(300266, 'Premium Seat', 'F', 'G', 11),
(300267, 'Premium Seat', 'F', 'G', 12),
(300268, 'Premium Seat', 'F', 'G', 13),
(300269, 'Premium Seat', 'F', 'G', 14),
(300270, 'Premium Seat', 'F', 'G', 15),
(300271, 'Premium Seat', 'F', 'G', 16),
(300272, 'Premium Seat', 'F', 'G', 17),
(300273, 'Premium Seat', 'F', 'G', 18);

-- --------------------------------------------------------

--
-- Table structure for table `seatprice`
--

CREATE TABLE `seatprice` (
  `seat_type` char(50) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `seatprice`
--

INSERT INTO `seatprice` (`seat_type`, `price`) VALUES
('Honeymoon Seat', 400),
('Premium Bed', 2500),
('Premium Seat', 180);

-- --------------------------------------------------------

--
-- Table structure for table `showings`
--

CREATE TABLE `showings` (
  `showing_id` int(10) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `theater_no` int(10) NOT NULL,
  `movie_id` bigint(20) NOT NULL,
  `date_time` datetime NOT NULL,
  `language_dub` text NOT NULL,
  `language_sub` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `showings`
--

INSERT INTO `showings` (`showing_id`, `branch_id`, `theater_no`, `movie_id`, `date_time`, `language_dub`, `language_sub`) VALUES
(481000001, 1001, 1, 100000001, '2023-04-19 11:30:00', 'EN', 'TH'),
(481000002, 1001, 1, 100000002, '2023-04-21 20:30:00', 'EN', 'TH'),
(481000003, 1001, 1, 100000003, '2023-04-20 14:30:00', 'EN', 'TH'),
(481000004, 1001, 2, 100000001, '2023-04-20 12:00:00', 'EN', 'TH'),
(481000005, 1001, 2, 100000002, '2023-04-20 20:00:00', 'EN', 'TH'),
(481000006, 1001, 2, 100000003, '2023-04-21 10:30:00', 'EN', 'TH'),
(481000007, 1001, 3, 100000001, '2023-04-19 12:00:00', 'EN', 'TH'),
(481000008, 1001, 3, 100000002, '2023-04-20 20:00:00', 'EN', 'TH'),
(481000009, 1001, 4, 100000001, '2023-04-19 15:30:00', 'EN', 'TH'),
(481000010, 1001, 4, 100000001, '2023-04-20 13:30:00', 'EN', 'TH'),
(481000011, 1001, 4, 100000002, '2023-04-21 13:30:00', 'EN', 'TH'),
(481000012, 1001, 4, 100000003, '2023-04-20 17:30:00', 'EN', 'TH'),

(481000013, 1002, 1, 100000001, '2023-04-20 11:30:00', 'EN', 'TH'),
(481000014, 1002, 1, 100000002, '2023-04-21 13:30:00', 'EN', 'TH'),
(481000015, 1002, 2, 100000003, '2023-04-19 11:30:00', 'EN', 'TH'),
(481000016, 1002, 2, 100000004, '2023-04-19 20:30:00', 'EN', 'TH'),
(481000017, 1002, 3, 100000001, '2023-04-20 14:30:00', 'EN', 'TH'),
(481000018, 1002, 3, 100000001, '2023-04-20 12:00:00', 'EN', 'TH'),
(481000019, 1002, 4, 100000002, '2023-04-20 20:00:00', 'EN', 'TH'),
(481000020, 1002, 4, 100000003, '2023-04-21 10:30:00', 'EN', 'TH'),
(481000021, 1002, 5, 100000004, '2023-04-21 12:00:00', 'EN', 'TH'),
(481000022, 1002, 5, 100000002, '2023-04-20 20:00:00', 'EN', 'TH'),
(481000023, 1002, 6, 100000004, '2023-04-20 15:30:00', 'EN', 'TH'),
(481000024, 1002, 6, 100000002, '2023-04-21 13:30:00', 'EN', 'TH'),
(481000025, 1002, 7, 100000001, '2023-04-20 13:30:00', 'EN', 'TH'),
(481000026, 1002, 7, 100000001, '2023-04-19 17:30:00', 'EN', 'TH'),
(481000027, 1002, 7, 100000001, '2023-04-20 15:30:00', 'EN', 'TH'),
(481000028, 1002, 7, 100000002, '2023-04-21 13:30:00', 'EN', 'TH'),
(481000029, 1002, 8, 100000001, '2023-12-23 14:30:00', 'EN', 'TH'),

(481000030, 1003, 1, 100000001, '2023-04-19 11:30:00', 'EN', 'TH'),
(481000031, 1003, 1, 100000001, '2023-04-19 20:30:00', 'EN', 'TH'),
(481000032, 1003, 1, 100000001, '2023-04-20 14:30:00', 'EN', 'TH'),
(481000033, 1003, 2, 100000001, '2023-04-20 12:00:00', 'EN', 'TH'),
(481000034, 1003, 2, 100000008, '2023-04-19 20:00:00', 'EN', 'TH'),
(481000035, 1003, 2, 100000001, '2023-04-21 10:30:00', 'EN', 'TH'),
(481000036, 1003, 2, 100000001, '2023-04-21 12:00:00', 'EN', 'TH'),
(481000037, 1003, 2, 100000002, '2023-04-20 20:00:00', 'EN', 'TH'),
(481000038, 1003, 3, 100000008, '2023-04-19 20:00:00', 'EN', 'TH'),
(481000039, 1003, 3, 100000001, '2023-04-21 10:30:00', 'EN', 'TH'),
(481000040, 1003, 3, 100000001, '2023-04-21 12:00:00', 'EN', 'TH'),
(481000041, 1003, 3, 100000002, '2023-04-20 20:00:00', 'EN', 'TH'),
(481000042, 1003, 4, 100000002, '2023-04-20 15:30:00', 'EN', 'TH'),
(481000043, 1003, 4, 100000002, '2023-04-21 13:30:00', 'EN', 'TH'),
(481000044, 1003, 4, 100000001, '2023-04-21 10:30:00', 'EN', 'TH'),
(481000045, 1003, 5, 100000001, '2023-04-21 12:00:00', 'EN', 'TH'),
(481000046, 1003, 5, 100000002, '2023-04-20 20:00:00', 'EN', 'TH'),
(481000047, 1003, 5, 100000002, '2023-04-20 15:30:00', 'EN', 'TH'),
(481000048, 1003, 5, 100000002, '2023-04-21 13:30:00', 'EN', 'TH'),
(481000049, 1003, 6, 100000001, '2023-04-21 10:30:00', 'EN', 'TH'),
(481000050, 1003, 6, 100000001, '2023-04-21 12:00:00', 'EN', 'TH'),
(481000051, 1003, 6, 100000002, '2023-04-29 20:00:00', 'EN', 'TH'),
(481000052, 1003, 6, 100000002, '2023-04-20 15:30:00', 'EN', 'TH'),
(481000053, 1003, 6, 100000002, '2023-04-19 13:30:00', 'EN', 'TH'),

(481000054, 1004, 1, 100000001, '2023-04-20 13:30:00', 'EN', 'TH'),
(481000055, 1004, 1, 100000001, '2023-04-20 17:30:00', 'EN', 'TH'),
(481000056, 1004, 2, 100000002, '2023-04-19 15:30:00', 'EN', 'TH'),
(481000057, 1004, 2, 100000001, '2023-04-21 13:30:00', 'EN', 'TH'),
(481000058, 1004, 2, 100000003, '2023-04-20 13:30:00', 'EN', 'TH'),
(481000059, 1004, 3, 100000001, '2023-04-20 17:30:00', 'EN', 'TH'),
(481000060, 1004, 3, 100000002, '2023-04-19 15:30:00', 'EN', 'TH'),
(481000061, 1004, 4, 100000003, '2023-04-21 13:30:00', 'EN', 'TH'),
(481000062, 1004, 4, 100000004, '2023-04-20 13:30:00', 'EN', 'TH'),
(481000063, 1004, 4, 100000004, '2023-04-20 17:30:00', 'EN', 'TH'),
(481000064, 1004, 5, 100000004, '2023-04-19 15:30:00', 'EN', 'TH'),
(481000065, 1004, 5, 100000001, '2023-04-21 13:30:00', 'EN', 'TH'),
(481000066, 1004, 5, 100000001, '2023-04-19 13:30:00', 'EN', 'TH'),
(481000067, 1004, 6, 100000002, '2023-04-20 17:30:00', 'EN', 'TH'),
(481000068, 1004, 6, 100000003, '2023-04-20 15:30:00', 'EN', 'TH'),
(481000069, 1004, 6, 100000004, '2023-04-21 13:30:00', 'EN', 'TH'),
(481000070, 1004, 7, 100000001, '2023-04-19 13:30:00', 'EN', 'TH'),
(481000071, 1004, 7, 100000001, '2023-04-20 17:30:00', 'EN', 'TH'),

(481000072, 1005, 1, 100000001, '2023-04-20 13:30:00', 'EN', 'TH'),
(481000073, 1005, 1, 100000002, '2023-04-20 17:30:00', 'EN', 'TH'),
(481000074, 1005, 2, 100000001, '2023-04-19 15:30:00', 'EN', 'TH'),
(481000075, 1005, 2, 100000001, '2023-04-21 13:30:00', 'EN', 'TH'),
(481000076, 1005, 2, 100000003, '2023-04-20 13:30:00', 'EN', 'TH'),
(481000077, 1005, 3, 100000001, '2023-04-20 17:30:00', 'EN', 'TH'),
(481000078, 1005, 3, 100000002, '2023-04-19 15:30:00', 'EN', 'TH'),
(481000079, 1005, 4, 100000003, '2023-04-21 13:30:00', 'EN', 'TH'),
(481000080, 1005, 4, 100000004, '2023-04-20 13:30:00', 'EN', 'TH'),
(481000081, 1005, 4, 100000001, '2023-04-20 17:30:00', 'EN', 'TH'),
(481000082, 1005, 5, 100000002, '2023-04-19 15:30:00', 'EN', 'TH'),
(481000083, 1005, 5, 100000001, '2023-04-21 13:30:00', 'EN', 'TH'),
(481000084, 1005, 5, 100000001, '2023-04-19 13:30:00', 'EN', 'TH'),
(481000085, 1005, 6, 100000002, '2023-04-19 17:30:00', 'EN', 'TH'),
(481000086, 1005, 6, 100000003, '2023-04-20 15:30:00', 'EN', 'TH'),
(481000087, 1005, 6, 100000001, '2023-04-21 13:30:00', 'EN', 'TH'),
(481000088, 1005, 6, 100000001, '2023-04-19 13:30:00', 'EN', 'TH'),
(481000089, 1005, 6, 100000004, '2023-04-20 17:30:00', 'EN', 'TH');

-- --------------------------------------------------------

--
-- Table structure for table `staffinfo`
--

CREATE TABLE `staffinfo` (
  `staff_id` int(10) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `staff_role` text NOT NULL,
  `staff_first_name` text NOT NULL,
  `staff_last_name` text NOT NULL,
  `staff_tel` text NOT NULL,
  `password` varchar(30) NOT NULL,
  `SESSION` datetime DEFAULT NULL,
  `loginstatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `staffinfo`
--

INSERT INTO `staffinfo` (`staff_id`, `branch_id`, `staff_role`, `staff_first_name`, `staff_last_name`, `staff_tel`, `password`, `SESSION`, `loginstatus`) VALUES
(840200001, 1001, 'Manager', 'Neramit', 'Matarat', '0992866777', '1234', '0000-00-00 00:00:00', 0),
(840200002, 1001, 'Staff', 'Chayarob', 'Chantrapiwat', '0922747419', '1234', '2023-05-23 15:07:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `systemtype`
--

CREATE TABLE `systemtype` (
  `system_type` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `systemtype`
--

INSERT INTO `systemtype` (`system_type`) VALUES
('4D'),
('Bed Cinema'),
('IMAX'),
('Laser');

-- --------------------------------------------------------

--
-- Table structure for table `theaterinfo`
--

CREATE TABLE `theaterinfo` (
  `branch_id` int(10) NOT NULL,
  `theater_no` int(10) NOT NULL,
  `layout_type` char(2) DEFAULT NULL,
  `system_type` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `theaterinfo`
--

INSERT INTO `theaterinfo` (`branch_id`, `theater_no`, `layout_type`, `system_type`) VALUES
(1001, 1, 'A', 'Bed Cinema'),
(1001, 2, 'D', 'Laser'),
(1001, 3, 'E', 'Laser'),
(1001, 4, 'E', 'Laser'),

(1002, 1, 'B', 'Bed Cinema'),
(1002, 2, 'C', 'Bed Cinema'),
(1002, 3, 'F', 'IMAX'),
(1002, 4, 'F', '4D'),
(1002, 5, 'E', 'Laser'),
(1002, 6, 'E', 'Laser'),
(1002, 7, 'F', 'Laser'),
(1002, 8, 'F', '4D'),

(1003, 1, 'B', 'Bed Cinema'),
(1003, 2, 'F', 'IMAX'),
(1003, 3, 'E', '4D'),
(1003, 4, 'E', 'Laser'),
(1003, 5, 'F', 'Laser'),
(1003, 6, 'F', 'Laser'),

(1004, 1, 'B', 'Bed Cinema'),
(1004, 2, 'C', 'Bed Cinema'),
(1004, 3, 'E', '4D'),
(1004, 4, 'F', 'IMAX'),
(1004, 5, 'E', 'Laser'),
(1004, 6, 'E', 'Laser'),
(1004, 7, 'E', 'Laser'),

(1005, 1, 'B', 'Bed Cinema'),
(1005, 2, 'C', 'Bed Cinema'),
(1005, 3, 'E', '4D'),
(1005, 4, 'F', 'IMAX'),
(1005, 5, 'E', 'Laser'),
(1005, 6, 'E', 'Laser');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branchinfo`
--
ALTER TABLE `branchinfo`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `foodinfo`
--
ALTER TABLE `foodinfo`
  ADD PRIMARY KEY (`food_type`);

--
-- Indexes for table `foodsize`
--
ALTER TABLE `foodsize`
  ADD PRIMARY KEY (`food_id`),
  ADD KEY `food_type` (`food_type`);

--
-- Indexes for table `layouttype`
--
ALTER TABLE `layouttype`
  ADD PRIMARY KEY (`layout_type`);

--
-- Indexes for table `movieinfo`
--
ALTER TABLE `movieinfo`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`promotion_code`),
  ADD UNIQUE KEY `seat_type` (`seat_type`),
  ADD UNIQUE KEY `system_type` (`system_type`) USING BTREE;

--
-- Indexes for table `reservefood`
--
ALTER TABLE `reservefood`
  ADD PRIMARY KEY (`food_id`,`reserve_id`),
  ADD KEY `reservefood_reserveinfo` (`reserve_id`);

--
-- Indexes for table `reserveinfo`
--
ALTER TABLE `reserveinfo`
  ADD PRIMARY KEY (`reserve_id`),
  ADD KEY `showing_id` (`showing_id`),
  ADD KEY `promotion_code` (`promotion_code`);

--
-- Indexes for table `reserveseats`
--
ALTER TABLE `reserveseats`
  ADD PRIMARY KEY (`reserve_id`,`seat_id`),
  ADD KEY `seat_id` (`seat_id`);

--
-- Indexes for table `seatlayout`
--
ALTER TABLE `seatlayout`
  ADD PRIMARY KEY (`seat_id`),
  ADD KEY `seat_type` (`seat_type`),
  ADD KEY `layout_type` (`layout_type`);

--
-- Indexes for table `seatprice`
--
ALTER TABLE `seatprice`
  ADD PRIMARY KEY (`seat_type`);

--
-- Indexes for table `showings`
--
ALTER TABLE `showings`
  ADD PRIMARY KEY (`showing_id`),
  ADD KEY `branch_id` (`branch_id`,`theater_no`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `staffinfo`
--
ALTER TABLE `staffinfo`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `staff_branch` (`branch_id`);

--
-- Indexes for table `systemtype`
--
ALTER TABLE `systemtype`
  ADD PRIMARY KEY (`system_type`);

--
-- Indexes for table `theaterinfo`
--
ALTER TABLE `theaterinfo`
  ADD PRIMARY KEY (`branch_id`,`theater_no`),
  ADD KEY `layout_type` (`layout_type`),
  ADD KEY `system_type` (`system_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branchinfo`
--
ALTER TABLE `branchinfo`
  MODIFY `branch_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1021;

--
-- AUTO_INCREMENT for table `foodsize`
--
ALTER TABLE `foodsize`
  MODIFY `food_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `movieinfo`
--
ALTER TABLE `movieinfo`
  MODIFY `movie_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100000013;

--
-- AUTO_INCREMENT for table `reserveinfo`
--
ALTER TABLE `reserveinfo`
  MODIFY `reserve_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reserveseats`
--
ALTER TABLE `reserveseats`
  MODIFY `reserve_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seatlayout`
--
ALTER TABLE `seatlayout`
  MODIFY `seat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300274;

--
-- AUTO_INCREMENT for table `showings`
--
ALTER TABLE `showings`
  MODIFY `showing_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=481000016;

--
-- AUTO_INCREMENT for table `staffinfo`
--
ALTER TABLE `staffinfo`
  MODIFY `staff_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=840200003;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foodsize`
--
ALTER TABLE `foodsize`
  ADD CONSTRAINT `foodsize_foodinfo` FOREIGN KEY (`food_type`) REFERENCES `foodinfo` (`food_type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `promotion_ibfk_1` FOREIGN KEY (`seat_type`) REFERENCES `seatprice` (`seat_type`),
  ADD CONSTRAINT `promotion_ibfk_2` FOREIGN KEY (`system_type`) REFERENCES `systemtype` (`system_type`);

--
-- Constraints for table `reservefood`
--
ALTER TABLE `reservefood`
  ADD CONSTRAINT `reservefood_foodsize` FOREIGN KEY (`food_id`) REFERENCES `foodsize` (`food_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservefood_reserveinfo` FOREIGN KEY (`reserve_id`) REFERENCES `reserveinfo` (`reserve_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reserveinfo`
--
ALTER TABLE `reserveinfo`
  ADD CONSTRAINT `reserveinfo_ibfk_1` FOREIGN KEY (`showing_id`) REFERENCES `showings` (`showing_id`),
  ADD CONSTRAINT `reserveinfo_ibfk_2` FOREIGN KEY (`promotion_code`) REFERENCES `promotion` (`promotion_code`);

--
-- Constraints for table `reserveseats`
--
ALTER TABLE `reserveseats`
  ADD CONSTRAINT `reserveseats_reserveinfo` FOREIGN KEY (`reserve_id`) REFERENCES `reserveinfo` (`reserve_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserveseats_seatlayout` FOREIGN KEY (`seat_id`) REFERENCES `seatlayout` (`seat_id`) ON UPDATE CASCADE;

--
-- Constraints for table `seatlayout`
--
ALTER TABLE `seatlayout`
  ADD CONSTRAINT `seatlayout_layouttype` FOREIGN KEY (`layout_type`) REFERENCES `layouttype` (`layout_type`) ON UPDATE CASCADE,
  ADD CONSTRAINT `seatlayout_seattype` FOREIGN KEY (`seat_type`) REFERENCES `seatprice` (`seat_type`) ON UPDATE CASCADE;

--
-- Constraints for table `showings`
--
ALTER TABLE `showings`
  ADD CONSTRAINT `showings_movie` FOREIGN KEY (`movie_id`) REFERENCES `movieinfo` (`movie_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `showings_theater` FOREIGN KEY (`branch_id`,`theater_no`) REFERENCES `theaterinfo` (`branch_id`, `theater_no`) ON UPDATE CASCADE;

--
-- Constraints for table `staffinfo`
--
ALTER TABLE `staffinfo`
  ADD CONSTRAINT `staff_branch` FOREIGN KEY (`branch_id`) REFERENCES `branchinfo` (`branch_id`) ON UPDATE CASCADE;

--
-- Constraints for table `theaterinfo`
--
ALTER TABLE `theaterinfo`
  ADD CONSTRAINT `theater_branch` FOREIGN KEY (`branch_id`) REFERENCES `branchinfo` (`branch_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `theater_layout` FOREIGN KEY (`layout_type`) REFERENCES `layouttype` (`layout_type`) ON UPDATE CASCADE,
  ADD CONSTRAINT `theater_system` FOREIGN KEY (`system_type`) REFERENCES `systemtype` (`system_type`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
