-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for cine
CREATE DATABASE IF NOT EXISTS `cine` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cine`;

-- Dumping structure for table cine.branchinfo
CREATE TABLE IF NOT EXISTS `branchinfo` (
  `branch_id` int NOT NULL AUTO_INCREMENT,
  `branch_address` text NOT NULL,
  `branch_telephone` text NOT NULL,
  `branch_name` text,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1021 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table cine.branchinfo: ~20 rows (approximately)
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

-- Dumping structure for table cine.foodinfo
CREATE TABLE IF NOT EXISTS `foodinfo` (
  `food_type` char(100) NOT NULL,
  `category` text NOT NULL,
  `description` text,
  PRIMARY KEY (`food_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table cine.foodinfo: ~0 rows (approximately)

-- Dumping structure for table cine.foodsize
CREATE TABLE IF NOT EXISTS `foodsize` (
  `food_id` int NOT NULL AUTO_INCREMENT,
  `food_type` char(100) NOT NULL,
  `size` varchar(10) NOT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (`food_id`),
  UNIQUE KEY `food_type` (`food_type`),
  CONSTRAINT `foodsize_ibfk_1` FOREIGN KEY (`food_type`) REFERENCES `foodinfo` (`food_type`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `foodsize_ibfk_2` FOREIGN KEY (`food_id`) REFERENCES `reservefood` (`food_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table cine.foodsize: ~0 rows (approximately)

-- Dumping structure for table cine.layouttype
CREATE TABLE IF NOT EXISTS `layouttype` (
  `layout_type` char(2) NOT NULL,
  PRIMARY KEY (`layout_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table cine.layouttype: ~3 rows (approximately)
INSERT INTO `layouttype` (`layout_type`) VALUES
	('A'),
	('B'),
	('C');

-- Dumping structure for table cine.movieinfo
CREATE TABLE IF NOT EXISTS `movieinfo` (
  `movie_id` bigint NOT NULL AUTO_INCREMENT,
  `movie_name` text NOT NULL,
  `movie_description` text,
  `movie_trailer` text,
  `director_info` text,
  `movie_poster` text,
  `movie_length` int unsigned DEFAULT '0',
  `releaseDate` date DEFAULT NULL,
  PRIMARY KEY (`movie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10000000013 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table cine.movieinfo: ~12 rows (approximately)
INSERT INTO `movieinfo` (`movie_id`, `movie_name`, `movie_description`, `movie_trailer`, `director_info`, `movie_poster`, `movie_length`, `releaseDate`) VALUES
	(10000000001, 'Avatar 2: The Way of Water', 'Jake Sully lives with his newfound family formed on the extrasolar moon Pandora. Once a familiar threat returns to finish what was previously started, Jake must work with Neytiri and the army of the Na\'vi race to protect their home.', 'https://youtu.be/t0sCVZk0VVM', 'James Cameron', 'http://localhost/cine/img/poster/avatar-poster.png', 192, '2022-12-14'),
	(10000000002, 'John Wick 4', 'John Wick uncovers a path to defeating The High Table. But before he can earn his freedom, Wick must face off against a new enemy with powerful alliances across the globe and forces that turn old friends into foes.', 'https://www.youtube.com/watch?v=yjRHZEUamCc', 'Chad Stahelski', 'https://www.imdb.com/title/tt10366206/mediaviewer/rm4007540737/?ref_=tt_ov_i', 169, '2023-03-22'),
	(10000000003, 'The Batman', 'When a sadistic serial killer begins murdering key political figures in Gotham, Batman is forced to investigate the city\'s hidden corruption and question his family\'s involvement.', 'https://www.youtube.com/watch?v=mqqft2x_Aa4', 'Matt Reeves', 'https://www.imdb.com/title/tt1877830/mediaviewer/rm2474894849/?ref_=tt_ov_i', 175, '2023-03-03'),
	(10000000004, 'The Super Mario Bros. Movie', 'The story of The Super Mario Bros. on their journey through the Mushroom Kingdom.', 'https://www.youtube.com/watch?v=rG4tpqT5zlw', 'Aaron Horvath, Michael Jelenic, Pierre Leduc', 'https://www.imdb.com/title/tt6718170/mediaviewer/rm1378366465/?ref_=tt_ov_i', 92, '2023-04-05'),
	(10000000005, 'Creed III', 'Adonis has been thriving in both his career and family life, but when a childhood friend and former boxing prodigy resurfaces, the face-off is more than just a fight.', 'https://www.youtube.com/watch?v=AHmCH7iB_IM', 'Michael B. Jordan', 'https://www.imdb.com/title/tt11145118/mediaviewer/rm669921281/?ref_=tt_ov_i', 116, '2023-03-02'),
	(10000000006, 'Dungeons & Dragons: Honor Among Thieves', 'A charming thief and a band of unlikely adventurers embark on an epic quest to retrieve a lost relic, but things go dangerously awry when they run afoul of the wrong people.', 'https://www.youtube.com/watch?v=IiMinixSXII', 'John Francis Daley, Jonathan Goldstein', 'https://www.imdb.com/title/tt2906216/mediaviewer/rm2360753153/?ref_=tt_ov_i', 134, '2023-03-03'),
	(10000000007, 'Barbie', 'To live in Barbie Land is to be a perfect being in a perfect place. Unless you have a full-on existential crisis. Or you\'re a Ken.', 'https://www.youtube.com/watch?v=8zIf0XvoL9Y', 'Greta Gerwig', 'https://www.imdb.com/title/tt1517268/mediaviewer/rm2419599361/?ref_=tt_ov_i', NULL, '2023-07-21'),
	(10000000008, 'Operation Fortune: Ruse de guerre', 'Special agent Orson Fortune and his team of operatives recruit one of Hollywood\'s biggest movie stars to help them on an undercover mission when the sale of a deadly new weapons technology threatens to disrupt the world order.', 'https://www.youtube.com/watch?v=W8Sqk1GcqxY', 'Guy Ritchie', 'https://www.imdb.com/title/tt7985704/mediaviewer/rm576532737/?ref_=tt_ov_i', 114, '2023-04-20'),
	(10000000009, 'Spider-Man: Across the Spider-Verse', 'Miles Morales catapults across the Multiverse, where he encounters a team of Spider-People charged with protecting its very existence. When the heroes clash on how to handle a new threat, Miles must redefine what it means to be a hero.', 'https://www.youtube.com/watch?v=cqGjhVJWtEg', 'Joaquim Dos, SantosKemp Powers, Justin K. Thompson', 'https://www.imdb.com/title/tt9362722/mediaviewer/rm2758622721/?ref_=tt_ov_i', 120, '2023-06-02'),
	(10000000010, 'Guardians of the Galaxy Vol. 3', 'Still reeling from the loss of Gamora, Peter Quill rallies his team to defend the universe and one of their own - a mission that could mean the end of the Guardians if not successful.', 'https://www.youtube.com/watch?v=u3V5KDHRQvk', 'James Gunn', 'https://lumiere-a.akamaihd.net/v1/images/th-guardiansofthegalaxy-vol3-payoffposter_bdad006d.jpeg?region=0%2C0%2C600%2C900', 150, '2023-05-05'),
	(10000000011, '65', 'An astronaut crash lands on a mysterious planet only to discover he\'s not alone.', 'https://www.youtube.com/watch?v=bHXejJq5vr0', 'Scott Beck, Bryan Woods', 'https://m.media-amazon.com/images/M/MV5BYzFhM2M1MDUtNDhmNC00YzEzLThiMzctYWYxZTc0MGJhNWYyXkEyXkFqcGdeQXVyMTUzMTg2ODkz._V1_FMjpg_UX1000_.jpg', 93, '2023-04-12'),
	(10000000012, 'Detective Conan The Movie 26 : Black Iron Submarine', 'This time\'s location is set in the sea near the Hachijo-jima island, Tokyo. Engineers from around the world have gathered for the full-scale operation of "Pacific Buoy," an offshore facility to connect security cameras owned by the worldwide police forces. A test of a certain "new technology" based on a face recognition system is underway there.\r\n\r\nMeanwhile, Conan and the Detective Boys visit Hachijo-jima at Sonoko\'s invitation and receive a phone call from Subaru Okiya informing them that a Europol employee was murdered in Germany by the Black Organization\'s Jin.\r\n\r\nConan, who is disquieted, sneaks into the facility and finds that a female engineer has been kidnapped by the Black Organization...! Furthermore, a USB drive containing certain information in her possession ends up in the hands of the organization... A black shadow also creeps up on Ai Haibara ...', 'https://www.youtube.com/watch?v=gGynIKMklkI', 'Tachikawa Yuzaru', 'https://www.metalbridges.com/wp-content/uploads/2023/04/Detective-Conan-The-Movie-26-Kurogane-no-Submarine-1.jpg', 110, '2023-04-26');

-- Dumping structure for table cine.promotion
CREATE TABLE IF NOT EXISTS `promotion` (
  `promotion_code` varchar(15) NOT NULL,
  `discount_percent` float NOT NULL,
  `_start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `seat_type` char(50) DEFAULT NULL,
  `system_type` char(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `_description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`promotion_code`),
  UNIQUE KEY `seat_type` (`seat_type`),
  UNIQUE KEY `system_type` (`system_type`) USING BTREE,
  CONSTRAINT `FK_promotion_seatprice` FOREIGN KEY (`seat_type`) REFERENCES `seatprice` (`seat_type`),
  CONSTRAINT `promotion_ibfk_1` FOREIGN KEY (`system_type`) REFERENCES `systemtype` (`system_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table cine.promotion: ~6 rows (approximately)
INSERT INTO `promotion` (`promotion_code`, `discount_percent`, `_start_date`, `end_date`, `seat_type`, `system_type`, `_description`) VALUES
	('AIS15', 15, '2023-01-01 00:00:00', '2023-12-31 23:59:59', NULL, NULL, 'Special 15% discount for AIS customers with no restrictions, applicable to all system type and all types of seats'),
	('BLOCKBUSTER', 15, '2023-01-01 00:00:00', '2023-12-31 23:59:59', 'Premium Bed', 'Bed Cinema', 'Watch Blockbuster Movies at BED CINEMA , get a 15% discount throughout the year.'),
	('CHRISTMAS', 50, '2022-12-24 00:00:00', '2022-12-25 23:59:59', NULL, NULL, 'Christmas Party, discount 50% for two days'),
	('DTAC20', 20, '2023-01-01 00:00:00', '2023-12-31 23:59:59', 'Honeymoon Seat', NULL, 'Special 20% discount for DTAC customers applicable to Honeymoon seat for all system type.'),
	('STUDENT20', 20, '2023-01-01 00:00:00', '2023-12-31 23:59:59', NULL, NULL, 'Just show your student ID card and get a 20% discount for all movies and all types of seats, for every showtime.'),
	('SUMMER10', 10, '2023-03-01 00:00:00', '2023-05-31 23:59:59', 'Premium Seat', 'Laser', 'Special 10% discount For Summer 2003, usable for Premium Seat, Laser system type');

-- Dumping structure for table cine.reservefood
CREATE TABLE IF NOT EXISTS `reservefood` (
  `reserve_id` int NOT NULL,
  `food_id` int NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`food_id`,`reserve_id`),
  KEY `reserve_id` (`reserve_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table cine.reservefood: ~0 rows (approximately)

-- Dumping structure for table cine.reserveinfo
CREATE TABLE IF NOT EXISTS `reserveinfo` (
  `reserve_id` int NOT NULL AUTO_INCREMENT,
  `showing_id` int NOT NULL,
  `promotion_code` varchar(15) DEFAULT NULL,
  `payment_method` text,
  PRIMARY KEY (`reserve_id`),
  UNIQUE KEY `showing_id` (`showing_id`),
  UNIQUE KEY `promotion_code` (`promotion_code`),
  CONSTRAINT `reserveinfo_ibfk_1` FOREIGN KEY (`reserve_id`) REFERENCES `reserveseats` (`reserve_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reserveinfo_ibfk_2` FOREIGN KEY (`showing_id`) REFERENCES `showings` (`showing_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table cine.reserveinfo: ~0 rows (approximately)

-- Dumping structure for table cine.reserveseats
CREATE TABLE IF NOT EXISTS `reserveseats` (
  `reserve_id` int NOT NULL AUTO_INCREMENT,
  `seat_id` int NOT NULL,
  PRIMARY KEY (`reserve_id`,`seat_id`),
  KEY `seat_id` (`seat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table cine.reserveseats: ~0 rows (approximately)

-- Dumping structure for table cine.seatlayout
CREATE TABLE IF NOT EXISTS `seatlayout` (
  `seat_id` int NOT NULL AUTO_INCREMENT,
  `seat_type` char(50) NOT NULL,
  `layout_type` char(2) NOT NULL,
  `seat_row` char(1) NOT NULL,
  `seat_column` int NOT NULL,
  PRIMARY KEY (`seat_id`),
  KEY `seatlayout_ibfk_2` (`seat_type`),
  KEY `seatlayout_ibfk_3` (`layout_type`),
  CONSTRAINT `seatlayout_ibfk_2` FOREIGN KEY (`seat_type`) REFERENCES `seatprice` (`seat_type`) ON UPDATE CASCADE,
  CONSTRAINT `seatlayout_ibfk_3` FOREIGN KEY (`layout_type`) REFERENCES `layouttype` (`layout_type`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table cine.seatlayout: ~42 rows (approximately)
INSERT INTO `seatlayout` (`seat_id`, `seat_type`, `layout_type`, `seat_row`, `seat_column`) VALUES
	(1, 'Honeymoon Seat', 'A', 'A', 1),
	(2, 'Honeymoon Seat', 'A', 'A', 2),
	(3, 'Honeymoon Seat', 'A', 'A', 3),
	(4, 'Honeymoon Seat', 'A', 'A', 4),
	(5, 'Honeymoon Seat', 'A', 'A', 5),
	(6, 'Honeymoon Seat', 'A', 'A', 6),
	(7, 'Premium Seat', 'A', 'B', 1),
	(8, 'Premium Seat', 'A', 'B', 2),
	(9, 'Premium Seat', 'A', 'B', 3),
	(10, 'Premium Seat', 'A', 'B', 4),
	(11, 'Premium Seat', 'A', 'B', 5),
	(12, 'Premium Seat', 'A', 'B', 6),
	(13, 'Premium Seat', 'A', 'B', 7),
	(14, 'Premium Seat', 'A', 'B', 8),
	(15, 'Premium Seat', 'A', 'B', 9),
	(16, 'Premium Seat', 'A', 'B', 10),
	(17, 'Premium Seat', 'A', 'B', 11),
	(18, 'Premium Seat', 'A', 'B', 12),
	(19, 'Premium Seat', 'A', 'C', 1),
	(20, 'Premium Seat', 'A', 'C', 2),
	(21, 'Premium Seat', 'A', 'C', 3),
	(22, 'Premium Seat', 'A', 'C', 4),
	(23, 'Premium Seat', 'A', 'C', 5),
	(24, 'Premium Seat', 'A', 'C', 6),
	(25, 'Premium Seat', 'A', 'C', 7),
	(26, 'Premium Seat', 'A', 'C', 8),
	(27, 'Premium Seat', 'A', 'C', 9),
	(28, 'Premium Seat', 'A', 'C', 10),
	(29, 'Premium Seat', 'A', 'C', 11),
	(30, 'Premium Seat', 'A', 'C', 12),
	(31, 'Premium Seat', 'A', 'D', 1),
	(32, 'Premium Seat', 'A', 'D', 2),
	(33, 'Premium Seat', 'A', 'D', 3),
	(34, 'Premium Seat', 'A', 'D', 4),
	(35, 'Premium Seat', 'A', 'D', 5),
	(36, 'Premium Seat', 'A', 'D', 6),
	(37, 'Premium Seat', 'A', 'D', 7),
	(38, 'Premium Seat', 'A', 'D', 8),
	(39, 'Premium Seat', 'A', 'D', 9),
	(40, 'Premium Seat', 'A', 'D', 10),
	(41, 'Premium Seat', 'A', 'D', 11),
	(42, 'Premium Seat', 'A', 'D', 12);

-- Dumping structure for table cine.seatprice
CREATE TABLE IF NOT EXISTS `seatprice` (
  `seat_type` char(50) NOT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (`seat_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table cine.seatprice: ~3 rows (approximately)
INSERT INTO `seatprice` (`seat_type`, `price`) VALUES
	('Honeymoon Seat', 400),
	('Premium Bed', 2500),
	('Premium Seat', 180);

-- Dumping structure for table cine.showings
CREATE TABLE IF NOT EXISTS `showings` (
  `showing_id` int NOT NULL,
  `branch_id` int NOT NULL,
  `theater_no` int NOT NULL,
  `movie_id` bigint NOT NULL,
  `date_time` datetime NOT NULL,
  `language_dub` text NOT NULL,
  `language_sub` text,
  PRIMARY KEY (`showing_id`),
  KEY `branch_id` (`branch_id`) USING BTREE,
  KEY `movie_id` (`movie_id`) USING BTREE,
  KEY `theatre_no` (`theater_no`) USING BTREE,
  KEY `FK_showings_theaterinfo` (`branch_id`,`theater_no`) USING BTREE,
  CONSTRAINT `FK_showings_branchinfo` FOREIGN KEY (`branch_id`) REFERENCES `branchinfo` (`branch_id`),
  CONSTRAINT `FK_showings_theaterinfo` FOREIGN KEY (`branch_id`, `theater_no`) REFERENCES `theaterinfo` (`branch_id`, `theater_no`),
  CONSTRAINT `showings_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movieinfo` (`movie_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table cine.showings: ~13 rows (approximately)
INSERT INTO `showings` (`showing_id`, `branch_id`, `theater_no`, `movie_id`, `date_time`, `language_dub`, `language_sub`) VALUES
	(2023040001, 1001, 1, 10000000001, '2023-04-19 11:30:00', 'EN', 'TH'),
	(2023040002, 1001, 1, 10000000001, '2023-04-19 20:30:00', 'EN', 'TH'),
	(2023040003, 1001, 1, 10000000001, '2023-04-20 14:30:00', 'EN', 'TH'),
	(2023040004, 1001, 2, 10000000001, '2023-04-20 12:00:00', 'EN', 'TH'),
	(2023040005, 1001, 1, 10000000008, '2023-04-20 20:00:00', 'EN', 'TH'),
	(2023040006, 1001, 1, 10000000001, '2023-04-21 10:30:00', 'EN', 'TH'),
	(2023040007, 1001, 2, 10000000001, '2023-04-21 12:00:00', 'EN', 'TH'),
	(2023040008, 1001, 1, 10000000002, '2023-04-20 20:00:00', 'EN', 'TH'),
	(2023040009, 1001, 2, 10000000002, '2023-04-20 15:30:00', 'EN', 'TH'),
	(2023040010, 1001, 1, 10000000002, '2023-04-21 13:30:00', 'EN', 'TH'),
	(2023040011, 1001, 4, 10000000002, '2023-04-20 13:30:00', 'EN', 'TH'),
	(2023040012, 1001, 7, 10000000002, '2023-04-20 17:30:00', 'EN', 'TH'),
	(2023040013, 1002, 1, 10000000001, '2023-04-20 11:30:00', 'EN', 'TH'),
	(2023040014, 1001, 1, 10000000001, '2023-04-21 10:30:00', 'EN', 'TH'),
	(2023040015, 1002, 1, 10000000001, '2023-04-21 13:30:00', 'EN', 'TH');

-- Dumping structure for table cine.staffinfo
CREATE TABLE IF NOT EXISTS `staffinfo` (
  `staff_id` int NOT NULL AUTO_INCREMENT,
  `branch_id` int NOT NULL,
  `staff_role` text NOT NULL,
  `staff_first_name` text NOT NULL,
  `staff_last_name` text NOT NULL,
  `staff_tel` text NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table cine.staffinfo: ~0 rows (approximately)

-- Dumping structure for table cine.systemtype
CREATE TABLE IF NOT EXISTS `systemtype` (
  `system_type` char(50) NOT NULL,
  PRIMARY KEY (`system_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table cine.systemtype: ~4 rows (approximately)
INSERT INTO `systemtype` (`system_type`) VALUES
	('4D'),
	('Bed Cinema'),
	('IMAX'),
	('Laser');

-- Dumping structure for table cine.theaterinfo
CREATE TABLE IF NOT EXISTS `theaterinfo` (
  `branch_id` int NOT NULL,
  `theater_no` int NOT NULL,
  `layout_type` char(2) DEFAULT NULL,
  `system_type` char(50) NOT NULL,
  PRIMARY KEY (`branch_id`,`theater_no`),
  KEY `FK_theaterinfo_layouttype` (`layout_type`),
  KEY `system_type` (`system_type`) USING BTREE,
  CONSTRAINT `FK_theaterinfo_branchinfo` FOREIGN KEY (`branch_id`) REFERENCES `branchinfo` (`branch_id`),
  CONSTRAINT `FK_theaterinfo_layouttype` FOREIGN KEY (`layout_type`) REFERENCES `layouttype` (`layout_type`),
  CONSTRAINT `theaterinfo_ibfk_3` FOREIGN KEY (`system_type`) REFERENCES `systemtype` (`system_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table cine.theaterinfo: ~14 rows (approximately)
INSERT INTO `theaterinfo` (`branch_id`, `theater_no`, `layout_type`, `system_type`) VALUES
	(1001, 1, 'A', 'Bed Cinema'),
	(1001, 2, 'B', 'Bed Cinema'),
	(1001, 3, 'C', 'Bed Cinema'),
	(1001, 4, 'A', '4D'),
	(1001, 5, 'B', '4D'),
	(1001, 6, 'A', 'IMAX'),
	(1001, 7, 'A', 'IMAX'),
	(1001, 8, 'A', 'Laser'),
	(1001, 9, 'B', 'Laser'),
	(1001, 10, 'C', 'Laser'),
	(1002, 1, 'A', 'Bed Cinema'),
	(1002, 2, 'A', '4D'),
	(1002, 3, 'B', '4D'),
	(1002, 4, 'C', '4D');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
