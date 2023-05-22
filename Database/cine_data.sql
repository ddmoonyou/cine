
INSERT INTO `branchinfo` (`branch_id`, `branch_address`, `branch_telephone`, `branch_name`) VALUES
	(NULL, '126 Pracha Uthit Rd., Bang Mod, Thung Khru, Bangkok 10140, Thailand', '021111111', 'Bang Mod Flag Ship Cinema'),
	(NULL, '991 Rama I Road, Pathum Wan\r\nBangkok 10330, Thailand', '022222222', 'Siam Cinema'),
	(NULL, '333/99 Moo 9, Nong Prue Subdistrict, Bang Lamung, Pattaya, Chonburi 20260, Thailand', '023333333', 'Pattaya Cinema'),
	(NULL, '299 Charoen Nakhon Rd, Khlong Ton Sai, Khlong San, Bangkok 10600, Thailand', '024444444', 'River View Cinema'),
	(NULL, '69/4 Pradit Manutham Road, Lat Phrao, Bangkok 10230, Thailand', '025555555\r\n', 'Lat Phrao Cinema'),
	(NULL, '9 9 Ratchadaphisek Rd, Huai Khwang, Bangkok 10320, Thailand', '026666666', 'BKK Cinema'),
	(NULL, '39 Moo 6, Bangna-Trad Rd, Bang Kaeo, Bang Phli, Samut Prakan 10540, Thailand', '027777777', 'Bang Na Cinema'),
	(NULL, '94 Phaholyothin Road, Prachathipat, Thanyaburi, Pathumtanee 12130, Thailand', '028888888', 'Pathumtanee Cinema'),
	(NULL, '99/3 Moo 4, Mueang Chiang Mai District, Chiang Mai 50000, Thailand', '029999999', 'Chiang Mai Cinema'),
	(NULL, '74-75 Moo 5, Wichit, Muang Phuket, Phuket 83000, Thailand', '021000000', 'Phuket Cinema'),
	(NULL, '1520 Kanchanavanich Road, Hadyai, Hadyai, SongKhla 90110, Thailand', '021100000', 'Hatyai Cinema'),
	(NULL, '888 Mittraphap-Nong Khai Road, Naimuang, Muang Nakhon Ratchasima, Nakhon Ratchasima 30000, Thailand', '021200000', 'Korat Cinema'),
	(NULL, '10 Bayfront Ave, Singapore 018956, Singapore', '021300000', 'Bayfront Cinema'),
	(NULL, 'ION Orchard, 2 Orchard Turn, Singapore 238801, Singapore', '021400000', 'Singapore Cinema'),
	(NULL, '168 Jalan Bukit Bintang, Kuala Lumpur 55100 Malaysia', '021500000', 'Kuala Lumpur Cinema'),
	(NULL, 'Lingkaran Syed Putra Mid Valley City, Kuala Lumpur 59200, Malaysia', '021600000', 'Mid Valley Cinema'),
	(NULL, '132 Samdach Sothearos Blvd (3), Phnom Penh, Cambodia', '021700000\r\n', 'Phnom Penh Cinema'),
	(NULL, '20 Trần Phú, Lộc Thọ, Nha Trang, Khánh Hòa 650000, Vietnam', '021800000', 'Vietnam Cinema'),
	(NULL, '1058 Đ. Nguyễn Văn Linh, Tân Phong, Quận 7, Thành phố Hồ Chí Minh, Vietnam', '021900000', 'Hồ Chí Minh Cinema'),
	(NULL, 'East Kelapa Gading, Kelapa Gading, North Jakarta City, Jakarta, Indonesia', '022000000', 'Jakarta Cinema');

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

INSERT INTO `foodsize` (`food_id`, `food_type`, `size`, `price`) VALUES
	(NULL, 'Pepsi', 'S', 90),
	(NULL, 'Pepsi', 'M', 140),
	(NULL, 'Pepsi', 'L', 190),
	(NULL, 'Pepsi Max', 'S', 90),
	(NULL, 'Pepsi Max', 'M', 140),
	(NULL, 'Pepsi Max', 'L', 190),
	(NULL, 'Coca-Cola', 'S', 90),
	(NULL, 'Coca-Cola', 'M', 140),
	(NULL, 'Coca-Cola', 'L', 190),
	(NULL, 'Coca-Cola Zero', 'S', 90),
	(NULL, 'Coca-Cola Zero', 'M', 140),
	(NULL, 'Coca-Cola Zero', 'L', 190),
	(NULL, 'Sprite', 'S', 90),
	(NULL, 'Sprite', 'M', 140),
	(NULL, 'Sprite', 'L', 190),
	(NULL, 'Lemon Soda', 'S', 100),
	(NULL, 'Lemon Soda', 'M', 150),
	(NULL, 'Minera Water', 'S', 40),
	(NULL, 'Minera Water', 'M', 60),
	(NULL, 'Fanta Strawberry Soda', 'S', 90),
	(NULL, 'Fanta Strawberry Soda', 'M', 140),
	(NULL, 'Fanta Strawberry Soda', 'L', 190),
	(NULL, 'Fanta Orange', 'S', 90),
	(NULL, 'Fanta Orange', 'M', 140),
	(NULL, 'Fanta Orange', 'L', 190),
	(NULL, 'Fanta Grape', 'S', 90),
	(NULL, 'Fanta Grape', 'M', 140),
	(NULL, 'Fanta Grape', 'L', 190);

INSERT INTO `layouttype` (`layout_type`) VALUES
	('A'),
	('B'),
	('C');

INSERT INTO `movieinfo` (`movie_id`, `movie_name`, `movie_description`, `movie_trailer`, `director_info`, `movie_poster`, `movie_length`, `releaseDate`, `promote`) VALUES
	(NULL, 'Avatar 2: The Way of Water', 'Jake Sully lives with his newfound family formed on the extrasolar moon Pandora. Once a familiar threat returns to finish what was previously started, Jake must work with Neytiri and the army of the Na\'vi race to protect their home.', 'https://youtu.be/t0sCVZk0VVM', 'James Cameron', 'http://localhost/cine/img/poster/avatar-poster.png', 192, '2022-12-14', 1),
	(NULL, 'John Wick 4', 'John Wick uncovers a path to defeating The High Table. But before he can earn his freedom, Wick must face off against a new enemy with powerful alliances across the globe and forces that turn old friends into foes.', 'https://www.youtube.com/watch?v=yjRHZEUamCc', 'Chad Stahelski', 'https://www.imdb.com/title/tt10366206/mediaviewer/rm4007540737/?ref_=tt_ov_i', 169, '2023-03-22', 1),
	(NULL, 'The Batman', 'When a sadistic serial killer begins murdering key political figures in Gotham, Batman is forced to investigate the city\'s hidden corruption and question his family\'s involvement.', 'https://www.youtube.com/watch?v=mqqft2x_Aa4', 'Matt Reeves', 'https://www.imdb.com/title/tt1877830/mediaviewer/rm2474894849/?ref_=tt_ov_i', 175, '2023-03-03', 1),
	(NULL, 'The Super Mario Bros. Movie', 'The story of The Super Mario Bros. on their journey through the Mushroom Kingdom.', 'https://www.youtube.com/watch?v=rG4tpqT5zlw', 'Aaron Horvath, Michael Jelenic, Pierre Leduc', 'https://www.imdb.com/title/tt6718170/mediaviewer/rm1378366465/?ref_=tt_ov_i', 92, '2023-04-05', 1),
	(NULL, 'Creed III', 'Adonis has been thriving in both his career and family life, but when a childhood friend and former boxing prodigy resurfaces, the face-off is more than just a fight.', 'https://www.youtube.com/watch?v=AHmCH7iB_IM', 'Michael B. Jordan', 'https://www.imdb.com/title/tt11145118/mediaviewer/rm669921281/?ref_=tt_ov_i', 116, '2023-03-02', 1),
	(NULL, 'Dungeons & Dragons: Honor Among Thieves', 'A charming thief and a band of unlikely adventurers embark on an epic quest to retrieve a lost relic, but things go dangerously awry when they run afoul of the wrong people.', 'https://www.youtube.com/watch?v=IiMinixSXII', 'John Francis Daley, Jonathan Goldstein', 'https://www.imdb.com/title/tt2906216/mediaviewer/rm2360753153/?ref_=tt_ov_i', 134, '2023-03-03', 1),
	(NULL, 'Barbie', 'To live in Barbie Land is to be a perfect being in a perfect place. Unless you have a full-on existential crisis. Or you\'re a Ken.', 'https://www.youtube.com/watch?v=8zIf0XvoL9Y', 'Greta Gerwig', 'https://www.imdb.com/title/tt1517268/mediaviewer/rm2419599361/?ref_=tt_ov_i', NULL, '2023-07-21', 1),
	(NULL, 'Operation Fortune: Ruse de guerre', 'Special agent Orson Fortune and his team of operatives recruit one of Hollywood\'s biggest movie stars to help them on an undercover mission when the sale of a deadly new weapons technology threatens to disrupt the world order.', 'https://www.youtube.com/watch?v=W8Sqk1GcqxY', 'Guy Ritchie', 'https://www.imdb.com/title/tt7985704/mediaviewer/rm576532737/?ref_=tt_ov_i', 114, '2023-04-20', 1),
	(NULL, 'Spider-Man: Across the Spider-Verse', 'Miles Morales catapults across the Multiverse, where he encounters a team of Spider-People charged with protecting its very existence. When the heroes clash on how to handle a new threat, Miles must redefine what it means to be a hero.', 'https://www.youtube.com/watch?v=cqGjhVJWtEg', 'Joaquim Dos, SantosKemp Powers, Justin K. Thompson', 'https://www.imdb.com/title/tt9362722/mediaviewer/rm2758622721/?ref_=tt_ov_i', 120, '2023-06-02', 1),
	(NULL, 'Guardians of the Galaxy Vol. 3', 'Still reeling from the loss of Gamora, Peter Quill rallies his team to defend the universe and one of their own - a mission that could mean the end of the Guardians if not successful.', 'https://www.youtube.com/watch?v=u3V5KDHRQvk', 'James Gunn', 'https://lumiere-a.akamaihd.net/v1/images/th-guardiansofthegalaxy-vol3-payoffposter_bdad006d.jpeg?region=0%2C0%2C600%2C900', 150, '2023-05-05', 1),
	(NULL, '65', 'An astronaut crash lands on a mysterious planet only to discover he\'s not alone.', 'https://www.youtube.com/watch?v=bHXejJq5vr0', 'Scott Beck, Bryan Woods', 'https://m.media-amazon.com/images/M/MV5BYzFhM2M1MDUtNDhmNC00YzEzLThiMzctYWYxZTc0MGJhNWYyXkEyXkFqcGdeQXVyMTUzMTg2ODkz._V1_FMjpg_UX1000_.jpg', 93, '2023-04-12', 1),
	(NULL, 'Detective Conan The Movie 26 : Black Iron Submarine', 'This time\'s location is set in the sea near the Hachijo-jima island, Tokyo. Engineers from around the world have gathered for the full-scale operation of "Pacific Buoy," an offshore facility to connect security cameras owned by the worldwide police forces. A test of a certain "new technology" based on a face recognition system is underway there.\r\n\r\nMeanwhile, Conan and the Detective Boys visit Hachijo-jima at Sonoko\'s invitation and receive a phone call from Subaru Okiya informing them that a Europol employee was murdered in Germany by the Black Organization\'s Jin.\r\n\r\nConan, who is disquieted, sneaks into the facility and finds that a female engineer has been kidnapped by the Black Organization...! Furthermore, a USB drive containing certain information in her possession ends up in the hands of the organization... A black shadow also creeps up on Ai Haibara ...', 'https://www.youtube.com/watch?v=gGynIKMklkI', 'Tachikawa Yuzaru', 'https://www.metalbridges.com/wp-content/uploads/2023/04/Detective-Conan-The-Movie-26-Kurogane-no-Submarine-1.jpg', 110, '2023-04-26', 1);

INSERT INTO `systemtype` (`system_type`) VALUES
	('4D'),
	('Bed Cinema'),
	('IMAX'),
	('Laser');

INSERT INTO `seatprice` (`seat_type`, `price`) VALUES
	('Honeymoon Seat', 400),
	('Premium Bed', 2500),
	('Premium Seat', 180);

INSERT INTO `promotion` (`promotion_code`, `discount_percent`, `_start_date`, `end_date`, `seat_type`, `system_type`, `_description`) VALUES
	('AIS15', 15, '2023-01-01 00:00:00', '2023-12-31 23:59:59', NULL, NULL, 'Special 15% discount for AIS customers with no restrictions, applicable to all system type and all types of seats'),
	('BLOCKBUSTER', 15, '2023-01-01 00:00:00', '2023-12-31 23:59:59', 'Premium Bed', 'Bed Cinema', 'Watch Blockbuster Movies at BED CINEMA , get a 15% discount throughout the year.'),
	('CHRISTMAS', 50, '2022-12-24 00:00:00', '2022-12-25 23:59:59', NULL, NULL, 'Christmas Party, discount 50% for two days'),
	('DTAC20', 20, '2023-01-01 00:00:00', '2023-12-31 23:59:59', 'Honeymoon Seat', NULL, 'Special 20% discount for DTAC customers applicable to Honeymoon seat for all system type.'),
	('STUDENT20', 20, '2023-01-01 00:00:00', '2023-12-31 23:59:59', NULL, NULL, 'Just show your student ID card and get a 20% discount for all movies and all types of seats, for every showtime.'),
	('SUMMER10', 10, '2023-03-01 00:00:00', '2023-05-31 23:59:59', 'Premium Seat', 'Laser', 'Special 10% discount For Summer 2003, usable for Premium Seat, Laser system type');

INSERT INTO `seatlayout` (`seat_id`, `seat_type`, `layout_type`, `seat_row`, `seat_column`) VALUES
	(NULL, 'Honeymoon Seat', 'A', 'A', 1),
	(NULL, 'Honeymoon Seat', 'A', 'A', 2),
	(NULL, 'Honeymoon Seat', 'A', 'A', 3),
	(NULL, 'Honeymoon Seat', 'A', 'A', 4),
	(NULL, 'Honeymoon Seat', 'A', 'A', 5),
	(NULL, 'Honeymoon Seat', 'A', 'A', 6),
	(NULL, 'Premium Seat', 'A', 'B', 1),
	(NULL, 'Premium Seat', 'A', 'B', 2),
	(NULL, 'Premium Seat', 'A', 'B', 3),
	(NULL, 'Premium Seat', 'A', 'B', 4),
	(NULL, 'Premium Seat', 'A', 'B', 5),
	(NULL, 'Premium Seat', 'A', 'B', 6),
	(NULL, 'Premium Seat', 'A', 'B', 7),
	(NULL, 'Premium Seat', 'A', 'B', 8),
	(NULL, 'Premium Seat', 'A', 'B', 9),
	(NULL, 'Premium Seat', 'A', 'B', 10),
	(NULL, 'Premium Seat', 'A', 'B', 11),
	(NULL, 'Premium Seat', 'A', 'B', 12),
	(NULL, 'Premium Seat', 'A', 'C', 1),
	(NULL, 'Premium Seat', 'A', 'C', 2),
	(NULL, 'Premium Seat', 'A', 'C', 3),
	(NULL, 'Premium Seat', 'A', 'C', 4),
	(NULL, 'Premium Seat', 'A', 'C', 5),
	(NULL, 'Premium Seat', 'A', 'C', 6),
	(NULL, 'Premium Seat', 'A', 'C', 7),
	(NULL, 'Premium Seat', 'A', 'C', 8),
	(NULL, 'Premium Seat', 'A', 'C', 9),
	(NULL, 'Premium Seat', 'A', 'C', 10),
	(NULL, 'Premium Seat', 'A', 'C', 11),
	(NULL, 'Premium Seat', 'A', 'C', 12),
	(NULL, 'Premium Seat', 'A', 'D', 1),
	(NULL, 'Premium Seat', 'A', 'D', 2),
	(NULL, 'Premium Seat', 'A', 'D', 3),
	(NULL, 'Premium Seat', 'A', 'D', 4),
	(NULL, 'Premium Seat', 'A', 'D', 5),
	(NULL, 'Premium Seat', 'A', 'D', 6),
	(NULL, 'Premium Seat', 'A', 'D', 7),
	(NULL, 'Premium Seat', 'A', 'D', 8),
	(NULL, 'Premium Seat', 'A', 'D', 9),
	(NULL, 'Premium Seat', 'A', 'D', 10),
	(NULL, 'Premium Seat', 'A', 'D', 11),
	(NULL, 'Premium Seat', 'A', 'D', 12);

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

INSERT INTO `showings` (`showing_id`, `branch_id`, `theater_no`, `movie_id`, `date_time`, `language_dub`, `language_sub`) VALUES
	(NULL, 1001, 1, 100000001, '2023-04-19 11:30:00', 'EN', 'TH'),
	(NULL, 1001, 1, 100000001, '2023-04-19 20:30:00', 'EN', 'TH'),
	(NULL, 1001, 1, 100000001, '2023-04-20 14:30:00', 'EN', 'TH'),
	(NULL, 1001, 2, 100000001, '2023-04-20 12:00:00', 'EN', 'TH'),
	(NULL, 1001, 1, 100000008, '2023-04-20 20:00:00', 'EN', 'TH'),
	(NULL, 1001, 1, 100000001, '2023-04-21 10:30:00', 'EN', 'TH'),
	(NULL, 1001, 2, 100000001, '2023-04-21 12:00:00', 'EN', 'TH'),
	(NULL, 1001, 1, 100000002, '2023-04-20 20:00:00', 'EN', 'TH'),
	(NULL, 1001, 2, 100000002, '2023-04-20 15:30:00', 'EN', 'TH'),
	(NULL, 1001, 1, 100000002, '2023-04-21 13:30:00', 'EN', 'TH'),
	(NULL, 1001, 4, 100000002, '2023-04-20 13:30:00', 'EN', 'TH'),
	(NULL, 1001, 7, 100000002, '2023-04-20 17:30:00', 'EN', 'TH'),
	(NULL, 1002, 1, 100000001, '2023-04-20 11:30:00', 'EN', 'TH'),
	(NULL, 1001, 1, 100000001, '2023-04-21 10:30:00', 'EN', 'TH'),
	(NULL, 1002, 1, 100000001, '2023-04-21 13:30:00', 'EN', 'TH');

INSERT INTO `staffinfo` (`staff_id`, `branch_id`, `staff_role`, `staff_first_name`, `staff_last_name`, `staff_tel`) VALUES
	(NULL, '1001', 'Manager', 'Neramit', 'Matarat', '0992866777');