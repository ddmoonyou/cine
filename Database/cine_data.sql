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
(128, 'Fanta Grape', 'L', 190);

--
-- Dumping data for table `layouttype`
--

INSERT INTO `layouttype` (`layout_type`) VALUES
('A'),
('B'),
('C');

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

INSERT INTO `movieinfo` (`movie_id`, `movie_name`, `movie_description`, `movie_trailer`, `director_info`, `movie_poster`, `movie_length`, `releaseDate`, `promote`) VALUES
(100000001, 'Avatar 2: The Way of Water', 'Jake Sully lives with his newfound family formed on the extrasolar moon Pandora. Once a familiar threat returns to finish what was previously started, Jake must work with Neytiri and the army of the Na\'vi race to protect their home.', 'https://youtu.be/t0sCVZk0VVM', 'James Cameron', 'http://localhost/cine/img/poster/avatar-poster.png', 192, '2022-12-14', 1),
(100000002, 'John Wick 4', 'John Wick uncovers a path to defeating The High Table. But before he can earn his freedom, Wick must face off against a new enemy with powerful alliances across the globe and forces that turn old friends into foes.', 'https://www.youtube.com/watch?v=yjRHZEUamCc', 'Chad Stahelski', 'https://www.imdb.com/title/tt10366206/mediaviewer/rm4007540737/?ref_=tt_ov_i', 169, '2023-03-22', 1),
(100000003, 'The Batman', 'When a sadistic serial killer begins murdering key political figures in Gotham, Batman is forced to investigate the city\'s hidden corruption and question his family\'s involvement.', 'https://www.youtube.com/watch?v=mqqft2x_Aa4', 'Matt Reeves', 'https://www.imdb.com/title/tt1877830/mediaviewer/rm2474894849/?ref_=tt_ov_i', 175, '2023-03-03', 0),
(100000004, 'The Super Mario Bros. Movie', 'The story of The Super Mario Bros. on their journey through the Mushroom Kingdom.', 'https://www.youtube.com/watch?v=rG4tpqT5zlw', 'Aaron Horvath, Michael Jelenic, Pierre Leduc', 'https://www.imdb.com/title/tt6718170/mediaviewer/rm1378366465/?ref_=tt_ov_i', 92, '2023-04-05', 0),
(100000005, 'Creed III', 'Adonis has been thriving in both his career and family life, but when a childhood friend and former boxing prodigy resurfaces, the face-off is more than just a fight.', 'https://www.youtube.com/watch?v=AHmCH7iB_IM', 'Michael B. Jordan', 'https://www.imdb.com/title/tt11145118/mediaviewer/rm669921281/?ref_=tt_ov_i', 116, '2023-03-02', 0),
(100000006, 'Dungeons & Dragons: Honor Among Thieves', 'A charming thief and a band of unlikely adventurers embark on an epic quest to retrieve a lost relic, but things go dangerously awry when they run afoul of the wrong people.', 'https://www.youtube.com/watch?v=IiMinixSXII', 'John Francis Daley, Jonathan Goldstein', 'https://www.imdb.com/title/tt2906216/mediaviewer/rm2360753153/?ref_=tt_ov_i', 134, '2023-03-03', 0),
(100000007, 'Barbie', 'To live in Barbie Land is to be a perfect being in a perfect place. Unless you have a full-on existential crisis. Or you\'re a Ken.', 'https://www.youtube.com/watch?v=8zIf0XvoL9Y', 'Greta Gerwig', 'https://www.imdb.com/title/tt1517268/mediaviewer/rm2419599361/?ref_=tt_ov_i', NULL, '2023-07-21', 0),
(100000008, 'Operation Fortune: Ruse de guerre', 'Special agent Orson Fortune and his team of operatives recruit one of Hollywood\'s biggest movie stars to help them on an undercover mission when the sale of a deadly new weapons technology threatens to disrupt the world order.', 'https://www.youtube.com/watch?v=W8Sqk1GcqxY', 'Guy Ritchie', 'https://www.imdb.com/title/tt7985704/mediaviewer/rm576532737/?ref_=tt_ov_i', 114, '2023-04-20', 0),
(100000009, 'Spider-Man: Across the Spider-Verse', 'Miles Morales catapults across the Multiverse, where he encounters a team of Spider-People charged with protecting its very existence. When the heroes clash on how to handle a new threat, Miles must redefine what it means to be a hero.', 'https://www.youtube.com/watch?v=cqGjhVJWtEg', 'Joaquim Dos, SantosKemp Powers, Justin K. Thompson', 'https://www.imdb.com/title/tt9362722/mediaviewer/rm2758622721/?ref_=tt_ov_i', 120, '2023-06-02', 0),
(100000010, 'Guardians of the Galaxy Vol. 3', 'Still reeling from the loss of Gamora, Peter Quill rallies his team to defend the universe and one of their own - a mission that could mean the end of the Guardians if not successful.', 'https://www.youtube.com/watch?v=u3V5KDHRQvk', 'James Gunn', 'https://lumiere-a.akamaihd.net/v1/images/th-guardiansofthegalaxy-vol3-payoffposter_bdad006d.jpeg?region=0%2C0%2C600%2C900', 150, '2023-05-05', 1),
(100000011, '65', 'An astronaut crash lands on a mysterious planet only to discover he\'s not alone.', 'https://www.youtube.com/watch?v=bHXejJq5vr0', 'Scott Beck, Bryan Woods', 'https://m.media-amazon.com/images/M/MV5BYzFhM2M1MDUtNDhmNC00YzEzLThiMzctYWYxZTc0MGJhNWYyXkEyXkFqcGdeQXVyMTUzMTg2ODkz._V1_FMjpg_UX1000_.jpg', 93, '2023-04-12', 0),
(100000012, 'Detective Conan The Movie 26 : Black Iron Submarine', 'This time\'s location is set in the sea near the Hachijo-jima island, Tokyo. Engineers from around the world have gathered for the full-scale operation of \"Pacific Buoy,\" an offshore facility to connect security cameras owned by the worldwide police forces. A test of a certain \"new technology\" based on a face recognition system is underway there.\r\n\r\nMeanwhile, Conan and the Detective Boys visit Hachijo-jima at Sonoko\'s invitation and receive a phone call from Subaru Okiya informing them that a Europol employee was murdered in Germany by the Black Organization\'s Jin.\r\n\r\nConan, who is disquieted, sneaks into the facility and finds that a female engineer has been kidnapped by the Black Organization...! Furthermore, a USB drive containing certain information in her possession ends up in the hands of the organization... A black shadow also creeps up on Ai Haibara ...', 'https://www.youtube.com/watch?v=gGynIKMklkI', 'Tachikawa Yuzaru', 'https://www.metalbridges.com/wp-content/uploads/2023/04/Detective-Conan-The-Movie-26-Kurogane-no-Submarine-1.jpg', 110, '2023-04-26', 0);

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`promotion_code`, `discount_percent`, `_start_date`, `end_date`, `seat_type`, `system_type`, `_description`) VALUES
('AIS15', 15, '2023-01-01 00:00:00', '2023-12-31 23:59:59', NULL, NULL, 'Special 15% discount for AIS customers with no restrictions, applicable to all system type and all types of seats'),
('BLOCKBUSTER', 15, '2023-01-01 00:00:00', '2023-12-31 23:59:59', 'Premium Bed', 'Bed Cinema', 'Watch Blockbuster Movies at BED CINEMA , get a 15% discount throughout the year.'),
('CHRISTMAS', 50, '2022-12-24 00:00:00', '2022-12-25 23:59:59', NULL, NULL, 'Christmas Party, discount 50% for two days'),
('DTAC20', 20, '2023-01-01 00:00:00', '2023-12-31 23:59:59', 'Honeymoon Seat', NULL, 'Special 20% discount for DTAC customers applicable to Honeymoon seat for all system type.'),
('STUDENT20', 20, '2023-01-01 00:00:00', '2023-12-31 23:59:59', NULL, NULL, 'Just show your student ID card and get a 20% discount for all movies and all types of seats, for every showtime.'),
('SUMMER10', 10, '2023-03-01 00:00:00', '2023-05-31 23:59:59', 'Premium Seat', 'Laser', 'Special 10% discount For Summer 2003, usable for Premium Seat, Laser system type');

--
-- Dumping data for table `seatlayout`
--

INSERT INTO `seatlayout` (`seat_id`, `seat_type`, `layout_type`, `seat_row`, `seat_column`) VALUES
(310001, 'Honeymoon Seat', 'A', 'A', 1),
(310002, 'Honeymoon Seat', 'A', 'A', 2),
(310003, 'Honeymoon Seat', 'A', 'A', 3),
(310004, 'Honeymoon Seat', 'A', 'A', 4),
(310005, 'Honeymoon Seat', 'A', 'A', 5),
(310006, 'Honeymoon Seat', 'A', 'A', 6),
(310007, 'Premium Seat', 'A', 'B', 1),
(310008, 'Premium Seat', 'A', 'B', 2),
(310009, 'Premium Seat', 'A', 'B', 3),
(310010, 'Premium Seat', 'A', 'B', 4),
(310011, 'Premium Seat', 'A', 'B', 5),
(310012, 'Premium Seat', 'A', 'B', 6),
(310013, 'Premium Seat', 'A', 'B', 7),
(310014, 'Premium Seat', 'A', 'B', 8),
(310015, 'Premium Seat', 'A', 'B', 9),
(310016, 'Premium Seat', 'A', 'B', 10),
(310017, 'Premium Seat', 'A', 'B', 11),
(310018, 'Premium Seat', 'A', 'B', 12),
(310019, 'Premium Seat', 'A', 'C', 1),
(310020, 'Premium Seat', 'A', 'C', 2),
(310021, 'Premium Seat', 'A', 'C', 3),
(310022, 'Premium Seat', 'A', 'C', 4),
(310023, 'Premium Seat', 'A', 'C', 5),
(310024, 'Premium Seat', 'A', 'C', 6),
(310025, 'Premium Seat', 'A', 'C', 7),
(310026, 'Premium Seat', 'A', 'C', 8),
(310027, 'Premium Seat', 'A', 'C', 9),
(310028, 'Premium Seat', 'A', 'C', 10),
(310029, 'Premium Seat', 'A', 'C', 11),
(310030, 'Premium Seat', 'A', 'C', 12),
(310031, 'Premium Seat', 'A', 'D', 1),
(310032, 'Premium Seat', 'A', 'D', 2),
(310033, 'Premium Seat', 'A', 'D', 3),
(310034, 'Premium Seat', 'A', 'D', 4),
(310035, 'Premium Seat', 'A', 'D', 5),
(310036, 'Premium Seat', 'A', 'D', 6),
(310037, 'Premium Seat', 'A', 'D', 7),
(310038, 'Premium Seat', 'A', 'D', 8),
(310039, 'Premium Seat', 'A', 'D', 9),
(310040, 'Premium Seat', 'A', 'D', 10),
(310041, 'Premium Seat', 'A', 'D', 11),
(310042, 'Premium Seat', 'A', 'D', 12);

--
-- Dumping data for table `theaterinfo`
--
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

--
-- Dumping data for table `showings`
--

INSERT INTO `showings` (`showing_id`, `branch_id`, `theater_no`, `movie_id`, `date_time`, `language_dub`, `language_sub`) VALUES
(481000001, 1001, 1, 100000001, '2023-04-19 11:30:00', 'EN', 'TH'),
(481000002, 1001, 1, 100000001, '2023-04-19 20:30:00', 'EN', 'TH'),
(481000003, 1001, 1, 100000001, '2023-04-20 14:30:00', 'EN', 'TH'),
(481000004, 1001, 2, 100000001, '2023-04-20 12:00:00', 'EN', 'TH'),
(481000005, 1001, 1, 100000008, '2023-04-20 20:00:00', 'EN', 'TH'),
(481000006, 1001, 1, 100000001, '2023-04-21 10:30:00', 'EN', 'TH'),
(481000007, 1001, 2, 100000001, '2023-04-21 12:00:00', 'EN', 'TH'),
(481000008, 1001, 1, 100000002, '2023-04-20 20:00:00', 'EN', 'TH'),
(481000009, 1001, 2, 100000002, '2023-04-20 15:30:00', 'EN', 'TH'),
(481000010, 1001, 1, 100000002, '2023-04-21 13:30:00', 'EN', 'TH'),
(481000011, 1001, 4, 100000002, '2023-04-20 13:30:00', 'EN', 'TH'),
(481000012, 1001, 7, 100000002, '2023-04-20 17:30:00', 'EN', 'TH'),
(481000013, 1002, 1, 100000001, '2023-04-20 11:30:00', 'EN', 'TH'),
(481000014, 1001, 1, 100000001, '2023-04-21 10:30:00', 'EN', 'TH'),
(481000015, 1002, 1, 100000001, '2023-04-21 13:30:00', 'EN', 'TH');

--
-- Dumping data for table `staffinfo`
--

INSERT INTO `staffinfo` (`staff_id`, `branch_id`, `staff_role`, `staff_first_name`, `staff_last_name`, `staff_tel`, `password`, `SESSION`, `loginstatus`) VALUES
(840200001, 1001, 'Manager', 'Neramit', 'Matarat', '0992866777', '1234', '0000-00-00 00:00:00', 0),
(840200002, 1001, 'Staff', 'Chayarob', 'Chantrapiwat', '0922747419', '1234', '2023-05-23 15:07:54', 1);





COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
