-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 10:21 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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

--
-- Dumping data for table `branchinfo`
--

ALTER Table `branchinfo`
  AUTO_INCREMENT = 1001;

INSERT INTO `branchinfo` (`branch_address`, `branch_telephone`, `branch_name`) VALUES
('126 Pracha Uthit Rd., Bang Mod, Thung Khru, Bangkok 10140, Thailand', '021111111', 'Bang Mod Flag Ship Cinema'),
('991 Rama I Road, Pathum Wan\r\nBangkok 10330, Thailand', '022222222', 'Siam Cinema'),
('333/99 Moo 9, Nong Prue Subdistrict, Bang Lamung, Pattaya, Chonburi 20260, Thailand', '023333333', 'Pattaya Cinema'),
('299 Charoen Nakhon Rd, Khlong Ton Sai, Khlong San, Bangkok 10600, Thailand', '024444444', 'River View Cinema'),
('69/4 Pradit Manutham Road, Lat Phrao, Bangkok 10230, Thailand', '025555555\r\n', 'Lat Phrao Cinema'),
('9 9 Ratchadaphisek Rd, Huai Khwang, Bangkok 10320, Thailand', '026666666', 'BKK Cinema'),
('39 Moo 6, Bangna-Trad Rd, Bang Kaeo, Bang Phli, Samut Prakan 10540, Thailand', '027777777', 'Bang Na Cinema'),
('94 Phaholyothin Road, Prachathipat, Thanyaburi, Pathumtanee 12130, Thailand', '028888888', 'Pathumtanee Cinema'),
('99/3 Moo 4, Mueang Chiang Mai District, Chiang Mai 50000, Thailand', '029999999', 'Chiang Mai Cinema'),
('74-75 Moo 5, Wichit, Muang Phuket, Phuket 83000, Thailand', '021000000', 'Phuket Cinema'),
('1520 Kanchanavanich Road, Hadyai, Hadyai, SongKhla 90110, Thailand', '021100000', 'Hatyai Cinema'),
('888 Mittraphap-Nong Khai Road, Naimuang, Muang Nakhon Ratchasima, Nakhon Ratchasima 30000, Thailand', '021200000', 'Korat Cinema'),
('10 Bayfront Ave, Singapore 018956, Singapore', '021300000', 'Bayfront Cinema'),
('ION Orchard, 2 Orchard Turn, Singapore 238801, Singapore', '021400000', 'Singapore Cinema'),
('168 Jalan Bukit Bintang, Kuala Lumpur 55100 Malaysia', '021500000', 'Kuala Lumpur Cinema'),
('Lingkaran Syed Putra Mid Valley City, Kuala Lumpur 59200, Malaysia', '021600000', 'Mid Valley Cinema'),
('132 Samdach Sothearos Blvd (3), Phnom Penh, Cambodia', '021700000\r\n', 'Phnom Penh Cinema'),
('20 Trần Phú, Lộc Thọ, Nha Trang, Khánh Hòa 650000, Vietnam', '021800000', 'Vietnam Cinema'),
('1058 Đ. Nguyễn Văn Linh, Tân Phong, Quận 7, Thành phố Hồ Chí Minh, Vietnam', '021900000', 'Hồ Chí Minh Cinema'),
('East Kelapa Gading, Kelapa Gading, North Jakarta City, Jakarta, Indonesia', '022000000', 'Jakarta Cinema');

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
('Sprite', 'Drinks', 'Soft Drinks Sprite');

--
-- Dumping data for table `foodsize`
--

ALTER Table `foodsize`
  AUTO_INCREMENT = 101;

INSERT INTO `foodsize` (`food_type`, `size`, `price`) VALUES
('Pepsi', 'S', 90),
('Pepsi', 'M', 140),
('Pepsi', 'L', 190),
('Pepsi Max', 'S', 90),
('Pepsi Max', 'M', 140),
('Pepsi Max', 'L', 190),
('Coca-Cola', 'S', 90),
('Coca-Cola', 'M', 140),
('Coca-Cola', 'L', 190),
('Coca-Cola Zero', 'S', 90),
('Coca-Cola Zero', 'M', 140),
('Coca-Cola Zero', 'L', 190),
('Sprite', 'S', 90),
('Sprite', 'M', 140),
('Sprite', 'L', 190),
('Lemon Soda', 'S', 100),
('Lemon Soda', 'M', 150),
('Minera Water', 'S', 40),
('Minera Water', 'M', 60),
('Fanta Strawberry Soda', 'S', 90),
('Fanta Strawberry Soda', 'M', 140),
('Fanta Strawberry Soda', 'L', 190),
('Fanta Orange', 'S', 90),
('Fanta Orange', 'M', 140),
('Fanta Orange', 'L', 190),
('Fanta Grape', 'S', 90),
('Fanta Grape', 'M', 140),
('Fanta Grape', 'L', 190);

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

--
-- Dumping data for table `systemtype`
--

INSERT INTO `systemtype` (`system_type`) VALUES
('4D'),
('Bed Cinema'),
('IMAX'),
('Laser');

--
-- Dumping data for table `seatprice`
--

INSERT INTO `seatprice` (`seat_type`, `price`) VALUES
('Honeymoon Seat', 400),
('Premium Bed', 2500),
('Premium Seat', 180);


--
-- Dumping data for table `movieinfo`
--

ALTER Table `movieinfo`
  AUTO_INCREMENT = 100000001;

INSERT INTO `movieinfo` (`movie_name`, `movie_description`, `movie_trailer`, `director_info`, `movie_poster`, `movie_length`, `releaseDate`, `promote`) VALUES
('Avatar 2: The Way of Water', 'Jake Sully lives with his newfound family formed on the extrasolar moon Pandora. Once a familiar threat returns to finish what was previously started, Jake must work with Neytiri and the army of the Na\'vi race to protect their home.', 'https://youtu.be/t0sCVZk0VVM', 'James Cameron', 'http://localhost/cine/img/poster/avatar-poster.png', 192, '2022-12-14', 1),
('John Wick 4', 'John Wick uncovers a path to defeating The High Table. But before he can earn his freedom, Wick must face off against a new enemy with powerful alliances across the globe and forces that turn old friends into foes.', 'https://www.youtube.com/watch?v=yjRHZEUamCc', 'Chad Stahelski', 'https://www.imdb.com/title/tt10366206/mediaviewer/rm4007540737/?ref_=tt_ov_i', 169, '2023-03-22', 1),
('The Batman', 'When a sadistic serial killer begins murdering key political figures in Gotham, Batman is forced to investigate the city\'s hidden corruption and question his family\'s involvement.', 'https://www.youtube.com/watch?v=mqqft2x_Aa4', 'Matt Reeves', 'https://www.imdb.com/title/tt1877830/mediaviewer/rm2474894849/?ref_=tt_ov_i', 175, '2023-03-03', 0),
('The Super Mario Bros. Movie', 'The story of The Super Mario Bros. on their journey through the Mushroom Kingdom.', 'https://www.youtube.com/watch?v=rG4tpqT5zlw', 'Aaron Horvath, Michael Jelenic, Pierre Leduc', 'https://www.imdb.com/title/tt6718170/mediaviewer/rm1378366465/?ref_=tt_ov_i', 92, '2023-04-05', 0),
('Creed III', 'Adonis has been thriving in both his career and family life, but when a childhood friend and former boxing prodigy resurfaces, the face-off is more than just a fight.', 'https://www.youtube.com/watch?v=AHmCH7iB_IM', 'Michael B. Jordan', 'https://www.imdb.com/title/tt11145118/mediaviewer/rm669921281/?ref_=tt_ov_i', 116, '2023-03-02', 0),
('Dungeons & Dragons: Honor Among Thieves', 'A charming thief and a band of unlikely adventurers embark on an epic quest to retrieve a lost relic, but things go dangerously awry when they run afoul of the wrong people.', 'https://www.youtube.com/watch?v=IiMinixSXII', 'John Francis Daley, Jonathan Goldstein', 'https://www.imdb.com/title/tt2906216/mediaviewer/rm2360753153/?ref_=tt_ov_i', 134, '2023-03-03', 0),
('Barbie', 'To live in Barbie Land is to be a perfect being in a perfect place. Unless you have a full-on existential crisis. Or you\'re a Ken.', 'https://www.youtube.com/watch?v=8zIf0XvoL9Y', 'Greta Gerwig', 'https://www.imdb.com/title/tt1517268/mediaviewer/rm2419599361/?ref_=tt_ov_i', NULL, '2023-07-21', 0),
('Operation Fortune: Ruse de guerre', 'Special agent Orson Fortune and his team of operatives recruit one of Hollywood\'s biggest movie stars to help them on an undercover mission when the sale of a deadly new weapons technology threatens to disrupt the world order.', 'https://www.youtube.com/watch?v=W8Sqk1GcqxY', 'Guy Ritchie', 'https://www.imdb.com/title/tt7985704/mediaviewer/rm576532737/?ref_=tt_ov_i', 114, '2023-04-20', 0),
('Spider-Man: Across the Spider-Verse', 'Miles Morales catapults across the Multiverse, where he encounters a team of Spider-People charged with protecting its very existence. When the heroes clash on how to handle a new threat, Miles must redefine what it means to be a hero.', 'https://www.youtube.com/watch?v=cqGjhVJWtEg', 'Joaquim Dos, SantosKemp Powers, Justin K. Thompson', 'https://www.imdb.com/title/tt9362722/mediaviewer/rm2758622721/?ref_=tt_ov_i', 120, '2023-06-02', 0),
('Guardians of the Galaxy Vol. 3', 'Still reeling from the loss of Gamora, Peter Quill rallies his team to defend the universe and one of their own - a mission that could mean the end of the Guardians if not successful.', 'https://www.youtube.com/watch?v=u3V5KDHRQvk', 'James Gunn', 'https://lumiere-a.akamaihd.net/v1/images/th-guardiansofthegalaxy-vol3-payoffposter_bdad006d.jpeg?region=0%2C0%2C600%2C900', 150, '2023-05-05', 1),
('65', 'An astronaut crash lands on a mysterious planet only to discover he\'s not alone.', 'https://www.youtube.com/watch?v=bHXejJq5vr0', 'Scott BecBryan Woods', 'https://m.media-amazon.com/images/M/MV5BYzFhM2M1MDUtNDhmNC00YzEzLThiMzctYWYxZTc0MGJhNWYyXkEyXkFqcGdeQXVyMTUzMTg2ODkz._V1_FMjpg_UX1000_.jpg', 93, '2023-04-12', 0),
('Detective Conan The Movie 26 : Black Iron Submarine', 'This time\'s location is set in the sea near the Hachijo-jima island, Tokyo. Engineers from around the world have gathered for the full-scale operation of \"Pacific Buoy,\" an offshore facility to connect security cameras owned by the worldwide police forces. A test of a certain \"new technology\" based on a face recognition system is underway there.\r\n\r\nMeanwhile, Conan and the Detective Boys visit Hachijo-jima at Sonoko\'s invitation and receive a phone call from Subaru Okiya informing them that a Europol employee was murdered in Germany by the Black Organization\'s Jin.\r\n\r\nConan, who is disquieted, sneaks into the facility and finds that a female engineer has been kidnapped by the Black Organization...! Furthermore, a USB drive containing certain information in her possession ends up in the hands of the organization... A black shadow also creeps up on Ai Haibara ...', 'https://www.youtube.com/watch?v=gGynIKMklkI', 'Tachikawa Yuzaru', 'https://www.metalbridges.com/wp-content/uploads/2023/04/Detective-Conan-The-Movie-26-Kurogane-no-Submarine-1.jpg', 110, '2023-04-26', 0);

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

--
-- Dumping data for table `seatlayout`
--

ALTER Table `seatlayout`
  AUTO_INCREMENT = 300001;

INSERT INTO `seatlayout` ( `seat_type`, `layout_type`, `seat_row`, `seat_column`) VALUES
('Premium Bed', 'A', 'A', 1),
('Premium Bed', 'A', 'A', 2),
('Premium Bed', 'A', 'A', 3),
('Premium Bed', 'A', 'B', 1),
('Premium Bed', 'A', 'B', 2),
('Premium Bed', 'A', 'B', 3),
('Premium Bed', 'A', 'C', 1),
('Premium Bed', 'A', 'C', 2),
('Premium Bed', 'A', 'C', 3),
('Premium Bed', 'A', 'D', 1),
('Premium Bed', 'A', 'D', 2),
('Premium Bed', 'A', 'D', 3),

('Premium Bed', 'B', 'A', 1),
('Premium Bed', 'B', 'A', 2),
('Premium Bed', 'B', 'A', 3),
('Premium Bed', 'B', 'A', 4),
('Premium Bed', 'B', 'B', 1),
('Premium Bed', 'B', 'B', 2),
('Premium Bed', 'B', 'B', 3),
('Premium Bed', 'B', 'B', 4),
('Premium Bed', 'B', 'C', 1),
('Premium Bed', 'B', 'C', 2),
('Premium Bed', 'B', 'C', 3),
('Premium Bed', 'B', 'C', 4),
('Premium Bed', 'B', 'D', 1),
('Premium Bed', 'B', 'D', 2),
('Premium Bed', 'B', 'D', 3),
('Premium Bed', 'B', 'D', 4),

('Premium Bed', 'C', 'A', 1),
('Premium Bed', 'C', 'A', 2),
('Premium Bed', 'C', 'A', 3),
('Premium Bed', 'C', 'A', 4),
('Premium Bed', 'C', 'A', 5),
('Premium Bed', 'C', 'B', 1),
('Premium Bed', 'C', 'B', 2),
('Premium Bed', 'C', 'B', 3),
('Premium Bed', 'C', 'B', 4),
('Premium Bed', 'C', 'B', 5),
('Premium Bed', 'C', 'C', 1),
('Premium Bed', 'C', 'C', 2),
('Premium Bed', 'C', 'C', 3),
('Premium Bed', 'C', 'C', 4),
('Premium Bed', 'C', 'C', 5),
('Premium Bed', 'C', 'D', 1),
('Premium Bed', 'C', 'D', 2),
('Premium Bed', 'C', 'D', 3),
('Premium Bed', 'C', 'D', 4),
('Premium Bed', 'C', 'D', 5),

('Honeymoon Seat', 'D', 'A', 1),
('Honeymoon Seat', 'D', 'A', 2),
('Honeymoon Seat', 'D', 'A', 3),
('Honeymoon Seat', 'D', 'A', 4),
('Honeymoon Seat', 'D', 'A', 5),
('Honeymoon Seat', 'D', 'A', 6),
('Premium Seat', 'D', 'B', 1),
('Premium Seat', 'D', 'B', 2),
('Premium Seat', 'D', 'B', 3),
('Premium Seat', 'D', 'B', 4),
('Premium Seat', 'D', 'B', 5),
('Premium Seat', 'D', 'B', 6),
('Premium Seat', 'D', 'C', 1),
('Premium Seat', 'D', 'C', 2),
('Premium Seat', 'D', 'C', 3),
('Premium Seat', 'D', 'C', 4),
('Premium Seat', 'D', 'C', 5),
('Premium Seat', 'D', 'C', 6),
('Premium Seat', 'D', 'D', 1),
('Premium Seat', 'D', 'D', 2),
('Premium Seat', 'D', 'D', 3),
('Premium Seat', 'D', 'D', 4),
('Premium Seat', 'D', 'D', 5),
('Premium Seat', 'D', 'D', 6),

('Honeymoon Seat', 'E', 'A', 1),
('Honeymoon Seat', 'E', 'A', 2),
('Honeymoon Seat', 'E', 'A', 3),
('Honeymoon Seat', 'E', 'A', 4),
('Honeymoon Seat', 'E', 'A', 5),
('Honeymoon Seat', 'E', 'A', 6),
('Honeymoon Seat', 'E', 'A', 7),
('Honeymoon Seat', 'E', 'A', 8),
('Honeymoon Seat', 'E', 'A', 9),
('Honeymoon Seat', 'E', 'A', 10),
('Honeymoon Seat', 'E', 'A', 11),
('Honeymoon Seat', 'E', 'A', 12),
('Honeymoon Seat', 'E', 'A', 13),
('Honeymoon Seat', 'E', 'A', 14),
('Honeymoon Seat', 'E', 'A', 15),
('Premium Seat', 'E', 'B', 1),
('Premium Seat', 'E', 'B', 2),
('Premium Seat', 'E', 'B', 3),
('Premium Seat', 'E', 'B', 4),
('Premium Seat', 'E', 'B', 5),
('Premium Seat', 'E', 'B', 6),
('Premium Seat', 'E', 'B', 7),
('Premium Seat', 'E', 'B', 8),
('Premium Seat', 'E', 'B', 9),
('Premium Seat', 'E', 'B', 10),
('Premium Seat', 'E', 'B', 11),
('Premium Seat', 'E', 'B', 12),
('Premium Seat', 'E', 'B', 13),
('Premium Seat', 'E', 'B', 14),
('Premium Seat', 'E', 'B', 15),
('Premium Seat', 'E', 'C', 1),
('Premium Seat', 'E', 'C', 2),
('Premium Seat', 'E', 'C', 3),
('Premium Seat', 'E', 'C', 4),
('Premium Seat', 'E', 'C', 5),
('Premium Seat', 'E', 'C', 6),
('Premium Seat', 'E', 'C', 7),
('Premium Seat', 'E', 'C', 8),
('Premium Seat', 'E', 'C', 9),
('Premium Seat', 'E', 'C', 10),
('Premium Seat', 'E', 'C', 11),
('Premium Seat', 'E', 'C', 12),
('Premium Seat', 'E', 'C', 13),
('Premium Seat', 'E', 'C', 14),
('Premium Seat', 'E', 'C', 15),
('Premium Seat', 'E', 'D', 1),
('Premium Seat', 'E', 'D', 2),
('Premium Seat', 'E', 'D', 3),
('Premium Seat', 'E', 'D', 4),
('Premium Seat', 'E', 'D', 5),
('Premium Seat', 'E', 'D', 6),
('Premium Seat', 'E', 'D', 7),
('Premium Seat', 'E', 'D', 8),
('Premium Seat', 'E', 'D', 9),
('Premium Seat', 'E', 'D', 10),
('Premium Seat', 'E', 'D', 11),
('Premium Seat', 'E', 'D', 12),
('Premium Seat', 'E', 'D', 13),
('Premium Seat', 'E', 'D', 14),
('Premium Seat', 'E', 'D', 15),
('Premium Seat', 'E', 'E', 1),
('Premium Seat', 'E', 'E', 2),
('Premium Seat', 'E', 'E', 3),
('Premium Seat', 'E', 'E', 4),
('Premium Seat', 'E', 'E', 5),
('Premium Seat', 'E', 'E', 6),
('Premium Seat', 'E', 'E', 7),
('Premium Seat', 'E', 'E', 8),
('Premium Seat', 'E', 'E', 9),
('Premium Seat', 'E', 'E', 10),
('Premium Seat', 'E', 'E', 11),
('Premium Seat', 'E', 'E', 12),
('Premium Seat', 'E', 'E', 13),
('Premium Seat', 'E', 'E', 14),
('Premium Seat', 'E', 'E', 15),

('Honeymoon Seat', 'F', 'A', 1),
('Honeymoon Seat', 'F', 'A', 2),
('Honeymoon Seat', 'F', 'A', 3),
('Honeymoon Seat', 'F', 'A', 4),
('Honeymoon Seat', 'F', 'A', 5),
('Honeymoon Seat', 'F', 'A', 6),
('Honeymoon Seat', 'F', 'A', 7),
('Honeymoon Seat', 'F', 'A', 8),
('Honeymoon Seat', 'F', 'A', 9),
('Honeymoon Seat', 'F', 'A', 10),
('Honeymoon Seat', 'F', 'A', 11),
('Honeymoon Seat', 'F', 'A', 12),
('Honeymoon Seat', 'F', 'A', 13),
('Honeymoon Seat', 'F', 'A', 14),
('Honeymoon Seat', 'F', 'A', 15),
('Honeymoon Seat', 'F', 'A', 16),
('Honeymoon Seat', 'F', 'A', 17),
('Honeymoon Seat', 'F', 'A', 18),
('Honeymoon Seat', 'F', 'B', 1),
('Honeymoon Seat', 'F', 'B', 2),
('Honeymoon Seat', 'F', 'B', 3),
('Honeymoon Seat', 'F', 'B', 4),
('Honeymoon Seat', 'F', 'B', 5),
('Honeymoon Seat', 'F', 'B', 6),
('Honeymoon Seat', 'F', 'B', 7),
('Honeymoon Seat', 'F', 'B', 8),
('Honeymoon Seat', 'F', 'B', 9),
('Honeymoon Seat', 'F', 'B', 10),
('Honeymoon Seat', 'F', 'B', 11),
('Honeymoon Seat', 'F', 'B', 12),
('Honeymoon Seat', 'F', 'B', 13),
('Honeymoon Seat', 'F', 'B', 14),
('Honeymoon Seat', 'F', 'B', 15),
('Honeymoon Seat', 'F', 'B', 16),
('Honeymoon Seat', 'F', 'B', 17),
('Honeymoon Seat', 'F', 'B', 18),
('Premium Seat', 'F', 'C', 1),
('Premium Seat', 'F', 'C', 2),
('Premium Seat', 'F', 'C', 3),
('Premium Seat', 'F', 'C', 4),
('Premium Seat', 'F', 'C', 5),
('Premium Seat', 'F', 'C', 6),
('Premium Seat', 'F', 'C', 7),
('Premium Seat', 'F', 'C', 8),
('Premium Seat', 'F', 'C', 9),
('Premium Seat', 'F', 'C', 10),
('Premium Seat', 'F', 'C', 11),
('Premium Seat', 'F', 'C', 12),
('Premium Seat', 'F', 'C', 13),
('Premium Seat', 'F', 'C', 14),
('Premium Seat', 'F', 'C', 15),
('Premium Seat', 'F', 'C', 16),
('Premium Seat', 'F', 'C', 17),
('Premium Seat', 'F', 'C', 18),
('Premium Seat', 'F', 'D', 1),
('Premium Seat', 'F', 'D', 2),
('Premium Seat', 'F', 'D', 3),
('Premium Seat', 'F', 'D', 4),
('Premium Seat', 'F', 'D', 5),
('Premium Seat', 'F', 'D', 6),
('Premium Seat', 'F', 'D', 7),
('Premium Seat', 'F', 'D', 8),
('Premium Seat', 'F', 'D', 9),
('Premium Seat', 'F', 'D', 10),
('Premium Seat', 'F', 'D', 11),
('Premium Seat', 'F', 'D', 12),
('Premium Seat', 'F', 'D', 13),
('Premium Seat', 'F', 'D', 14),
('Premium Seat', 'F', 'D', 15),
('Premium Seat', 'F', 'D', 16),
('Premium Seat', 'F', 'D', 17),
('Premium Seat', 'F', 'D', 18),
('Premium Seat', 'F', 'E', 1),
('Premium Seat', 'F', 'E', 2),
('Premium Seat', 'F', 'E', 3),
('Premium Seat', 'F', 'E', 4),
('Premium Seat', 'F', 'E', 5),
('Premium Seat', 'F', 'E', 6),
('Premium Seat', 'F', 'E', 7),
('Premium Seat', 'F', 'E', 8),
('Premium Seat', 'F', 'E', 9),
('Premium Seat', 'F', 'E', 10),
('Premium Seat', 'F', 'E', 11),
('Premium Seat', 'F', 'E', 12),
('Premium Seat', 'F', 'E', 13),
('Premium Seat', 'F', 'E', 14),
('Premium Seat', 'F', 'E', 15),
('Premium Seat', 'F', 'E', 16),
('Premium Seat', 'F', 'E', 17),
('Premium Seat', 'F', 'E', 18),
('Premium Seat', 'F', 'F', 1),
('Premium Seat', 'F', 'F', 2),
('Premium Seat', 'F', 'F', 3),
('Premium Seat', 'F', 'F', 4),
('Premium Seat', 'F', 'F', 5),
('Premium Seat', 'F', 'F', 6),
('Premium Seat', 'F', 'F', 7),
('Premium Seat', 'F', 'F', 8),
('Premium Seat', 'F', 'F', 9),
('Premium Seat', 'F', 'F', 10),
('Premium Seat', 'F', 'F', 11),
('Premium Seat', 'F', 'F', 12),
('Premium Seat', 'F', 'F', 13),
('Premium Seat', 'F', 'F', 14),
('Premium Seat', 'F', 'F', 15),
('Premium Seat', 'F', 'F', 16),
('Premium Seat', 'F', 'F', 17),
('Premium Seat', 'F', 'F', 18),
('Premium Seat', 'F', 'G', 1),
('Premium Seat', 'F', 'G', 2),
('Premium Seat', 'F', 'G', 3),
('Premium Seat', 'F', 'G', 4),
('Premium Seat', 'F', 'G', 5),
('Premium Seat', 'F', 'G', 6),
('Premium Seat', 'F', 'G', 7),
('Premium Seat', 'F', 'G', 8),
('Premium Seat', 'F', 'G', 9),
('Premium Seat', 'F', 'G', 10),
('Premium Seat', 'F', 'G', 11),
('Premium Seat', 'F', 'G', 12),
('Premium Seat', 'F', 'G', 13),
('Premium Seat', 'F', 'G', 14),
('Premium Seat', 'F', 'G', 15),
('Premium Seat', 'F', 'G', 16),
('Premium Seat', 'F', 'G', 17),
('Premium Seat', 'F', 'G', 18);


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
-- Dumping data for table `showings`
--


ALTER Table `showings`
  AUTO_INCREMENT = 481000001;

INSERT INTO `showings` (`branch_id`, `theater_no`, `movie_id`, `date_time`, `language_dub`, `language_sub`) VALUES
(1001, 1, 100000001, '2023-04-19 11:30:00', 'EN', 'TH'),
(1001, 1, 100000002, '2023-04-21 20:30:00', 'EN', 'TH'),
(1001, 1, 100000003, '2023-04-20 14:30:00', 'EN', 'TH'),
(1001, 2, 100000001, '2023-04-20 12:00:00', 'EN', 'TH'),
(1001, 2, 100000002, '2023-04-20 20:00:00', 'EN', 'TH'),
(1001, 2, 100000003, '2023-04-21 10:30:00', 'EN', 'TH'),
(1001, 3, 100000001, '2023-04-19 12:00:00', 'EN', 'TH'),
(1001, 3, 100000002, '2023-04-20 20:00:00', 'EN', 'TH'),
(1001, 4, 100000001, '2023-04-19 15:30:00', 'EN', 'TH'),
(1001, 4, 100000001, '2023-04-20 13:30:00', 'EN', 'TH'),
(1001, 4, 100000002, '2023-04-21 13:30:00', 'EN', 'TH'),
(1001, 4, 100000003, '2023-04-20 17:30:00', 'EN', 'TH'),

(1002, 1, 100000001, '2023-04-20 11:30:00', 'EN', 'TH'),
(1002, 1, 100000002, '2023-04-21 13:30:00', 'EN', 'TH'),
(1002, 2, 100000003, '2023-04-19 11:30:00', 'EN', 'TH'),
(1002, 2, 100000004, '2023-04-19 20:30:00', 'EN', 'TH'),
(1002, 3, 100000001, '2023-04-20 14:30:00', 'EN', 'TH'),
(1002, 3, 100000001, '2023-04-20 12:00:00', 'EN', 'TH'),
(1002, 4, 100000002, '2023-04-20 20:00:00', 'EN', 'TH'),
(1002, 4, 100000003, '2023-04-21 10:30:00', 'EN', 'TH'),
(1002, 5, 100000004, '2023-04-21 12:00:00', 'EN', 'TH'),
(1002, 5, 100000002, '2023-04-20 20:00:00', 'EN', 'TH'),
(1002, 6, 100000004, '2023-04-20 15:30:00', 'EN', 'TH'),
(1002, 6, 100000002, '2023-04-21 13:30:00', 'EN', 'TH'),
(1002, 7, 100000001, '2023-04-20 13:30:00', 'EN', 'TH'),
(1002, 7, 100000001, '2023-04-19 17:30:00', 'EN', 'TH'),
(1002, 7, 100000001, '2023-04-20 15:30:00', 'EN', 'TH'),
(1002, 7, 100000002, '2023-04-21 13:30:00', 'EN', 'TH'),
(1002, 8, 100000001, '2023-12-23 14:30:00', 'EN', 'TH'),

(1003, 1, 100000001, '2023-04-19 11:30:00', 'EN', 'TH'),
(1003, 1, 100000001, '2023-04-19 20:30:00', 'EN', 'TH'),
(1003, 1, 100000001, '2023-04-20 14:30:00', 'EN', 'TH'),
(1003, 2, 100000001, '2023-04-20 12:00:00', 'EN', 'TH'),
(1003, 2, 100000008, '2023-04-19 20:00:00', 'EN', 'TH'),
(1003, 2, 100000001, '2023-04-21 10:30:00', 'EN', 'TH'),
(1003, 2, 100000001, '2023-04-21 12:00:00', 'EN', 'TH'),
(1003, 2, 100000002, '2023-04-20 20:00:00', 'EN', 'TH'),
(1003, 3, 100000008, '2023-04-19 20:00:00', 'EN', 'TH'),
(1003, 3, 100000001, '2023-04-21 10:30:00', 'EN', 'TH'),
(1003, 3, 100000001, '2023-04-21 12:00:00', 'EN', 'TH'),
(1003, 3, 100000002, '2023-04-20 20:00:00', 'EN', 'TH'),
(1003, 4, 100000002, '2023-04-20 15:30:00', 'EN', 'TH'),
(1003, 4, 100000002, '2023-04-21 13:30:00', 'EN', 'TH'),
(1003, 4, 100000001, '2023-04-21 10:30:00', 'EN', 'TH'),
(1003, 5, 100000001, '2023-04-21 12:00:00', 'EN', 'TH'),
(1003, 5, 100000002, '2023-04-20 20:00:00', 'EN', 'TH'),
(1003, 5, 100000002, '2023-04-20 15:30:00', 'EN', 'TH'),
(1003, 5, 100000002, '2023-04-21 13:30:00', 'EN', 'TH'),
(1003, 6, 100000001, '2023-04-21 10:30:00', 'EN', 'TH'),
(1003, 6, 100000001, '2023-04-21 12:00:00', 'EN', 'TH'),
(1003, 6, 100000002, '2023-04-29 20:00:00', 'EN', 'TH'),
(1003, 6, 100000002, '2023-04-20 15:30:00', 'EN', 'TH'),
(1003, 6, 100000002, '2023-04-19 13:30:00', 'EN', 'TH'),

(1004, 1, 100000001, '2023-04-20 13:30:00', 'EN', 'TH'),
(1004, 1, 100000001, '2023-04-20 17:30:00', 'EN', 'TH'),
(1004, 2, 100000002, '2023-04-19 15:30:00', 'EN', 'TH'),
(1004, 2, 100000001, '2023-04-21 13:30:00', 'EN', 'TH'),
(1004, 2, 100000003, '2023-04-20 13:30:00', 'EN', 'TH'),
(1004, 3, 100000001, '2023-04-20 17:30:00', 'EN', 'TH'),
(1004, 3, 100000002, '2023-04-19 15:30:00', 'EN', 'TH'),
(1004, 4, 100000003, '2023-04-21 13:30:00', 'EN', 'TH'),
(1004, 4, 100000004, '2023-04-20 13:30:00', 'EN', 'TH'),
(1004, 4, 100000004, '2023-04-20 17:30:00', 'EN', 'TH'),
(1004, 5, 100000004, '2023-04-19 15:30:00', 'EN', 'TH'),
(1004, 5, 100000001, '2023-04-21 13:30:00', 'EN', 'TH'),
(1004, 5, 100000001, '2023-04-19 13:30:00', 'EN', 'TH'),
(1004, 6, 100000002, '2023-04-20 17:30:00', 'EN', 'TH'),
(1004, 6, 100000003, '2023-04-20 15:30:00', 'EN', 'TH'),
(1004, 6, 100000004, '2023-04-21 13:30:00', 'EN', 'TH'),
(1004, 7, 100000001, '2023-04-19 13:30:00', 'EN', 'TH'),
(1004, 7, 100000001, '2023-04-20 17:30:00', 'EN', 'TH'),

(1005, 1, 100000001, '2023-04-20 13:30:00', 'EN', 'TH'),
(1005, 1, 100000002, '2023-04-20 17:30:00', 'EN', 'TH'),
(1005, 2, 100000001, '2023-04-19 15:30:00', 'EN', 'TH'),
(1005, 2, 100000001, '2023-04-21 13:30:00', 'EN', 'TH'),
(1005, 2, 100000003, '2023-04-20 13:30:00', 'EN', 'TH'),
(1005, 3, 100000001, '2023-04-20 17:30:00', 'EN', 'TH'),
(1005, 3, 100000002, '2023-04-19 15:30:00', 'EN', 'TH'),
(1005, 4, 100000003, '2023-04-21 13:30:00', 'EN', 'TH'),
(1005, 4, 100000004, '2023-04-20 13:30:00', 'EN', 'TH'),
(1005, 4, 100000001, '2023-04-20 17:30:00', 'EN', 'TH'),
(1005, 5, 100000002, '2023-04-19 15:30:00', 'EN', 'TH'),
(1005, 5, 100000001, '2023-04-21 13:30:00', 'EN', 'TH'),
(1005, 5, 100000001, '2023-04-19 13:30:00', 'EN', 'TH'),
(1005, 6, 100000002, '2023-04-19 17:30:00', 'EN', 'TH'),
(1005, 6, 100000003, '2023-04-20 15:30:00', 'EN', 'TH'),
(1005, 6, 100000001, '2023-04-21 13:30:00', 'EN', 'TH'),
(1005, 6, 100000001, '2023-04-19 13:30:00', 'EN', 'TH'),
(1005, 6, 100000004, '2023-04-20 17:30:00', 'EN', 'TH');

--
-- Dumping data for table `staffinfo`
--

ALTER Table `staffinfo`
  AUTO_INCREMENT = 840200001;

INSERT INTO `staffinfo` (`branch_id`, `staff_role`, `staff_first_name`, `staff_last_name`, `staff_tel`, `password`, `SESSION`, `loginstatus`) VALUES
(1001, 'Manager', 'Neramit', 'Matarat', '0992866777', '1234', '0000-00-00 00:00:00', 0),
(1001, 'Staff', 'Chayarob', 'Chantrapiwat', '0922747419', '1234', '2023-05-23 15:07:54', 1);





COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
