CREATE DATABASE IF NOT EXISTS `cine` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cine`;

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branchinfo` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_address` text NOT NULL,
  `branch_telephone` text NOT NULL,
  `branch_name` text DEFAULT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1001 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staffinfo` (
  `staff_id` int(10) NOT NULL AUTO_INCREMENT,
  `branch_id` int(10) NOT NULL,
  `staff_role` text NOT NULL,
  `staff_first_name` text NOT NULL,
  `staff_last_name` text NOT NULL,
  `staff_tel` text NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT = 840200001 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `foodinfo` (
  `food_type` char(100) NOT NULL,
  `category` text NOT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`food_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `foodsize` (
  `food_id` int(10) NOT NULL AUTO_INCREMENT,
  `food_type` char(100) NOT NULL,
  `size` varchar(10) NOT NULL,
  `price` int(10) NOT NULL,
  PRIMARY KEY (`food_id`),
  FOREIGN KEY (`food_type`) REFERENCES `foodinfo` (`food_type`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `layouttype` (
  `layout_type` char(2) NOT NULL,
  PRIMARY KEY (`layout_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movieinfo` (
  `movie_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `movie_name` text NOT NULL,
  `movie_description` text DEFAULT NULL,
  `movie_trailer` text DEFAULT NULL,
  `director_info` text DEFAULT NULL,
  `movie_poster` text DEFAULT NULL,
  `movie_length` int(10) unsigned DEFAULT 0,
  `releaseDate` date DEFAULT NULL,
  PRIMARY KEY (`movie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=100000001 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seatprice` (
  `seat_type` char(50) NOT NULL,
  `price` int(10) NOT NULL,
  PRIMARY KEY (`seat_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `systemtype` (
  `system_type` char(50) NOT NULL,
  PRIMARY KEY (`system_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `promotion` (
  `promotion_code` varchar(15) NOT NULL,
  `discount_percent` float NOT NULL,
  `_start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `seat_type` char(50) DEFAULT NULL,
  `system_type` char(50) DEFAULT NULL,
  `_description` text NOT NULL,
  PRIMARY KEY (`promotion_code`),
  UNIQUE KEY `seat_type` (`seat_type`),
  UNIQUE KEY `system_type` (`system_type`) USING BTREE,
  FOREIGN KEY (`seat_type`) REFERENCES `seatprice` (`seat_type`),
  FOREIGN KEY (`system_type`) REFERENCES `systemtype` (`system_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservefood` (
  `reserve_id` int(10) NOT NULL,
  `food_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  PRIMARY KEY (`food_id`,`reserve_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `theaterinfo` (
  `branch_id` int(10) NOT NULL,
  `theater_no` int(10) NOT NULL,
  `layout_type` char(2) DEFAULT NULL,
  `system_type` char(50) NOT NULL,
  PRIMARY KEY (`branch_id`,`theater_no`),
  FOREIGN KEY (`branch_id`) REFERENCES `branchinfo` (`branch_id`),
  FOREIGN KEY (`layout_type`) REFERENCES `layouttype` (`layout_type`),
  FOREIGN KEY (`system_type`) REFERENCES `systemtype` (`system_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `showings` (
  `showing_id` int(10) NOT NULL AUTO_INCREMENT,
  `branch_id` int(10) NOT NULL,
  `theater_no` int(10) NOT NULL,
  `movie_id` bigint(20) NOT NULL,
  `date_time` datetime NOT NULL,
  `language_dub` text NOT NULL,
  `language_sub` text DEFAULT NULL,
  PRIMARY KEY (`showing_id`),
  FOREIGN KEY (`branch_id`, `theater_no`) REFERENCES `theaterinfo` (`branch_id`, `theater_no`),
  FOREIGN KEY (`movie_id`) REFERENCES `movieinfo` (`movie_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=481000001 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reserveinfo` (
  `reserve_id` int(10) NOT NULL AUTO_INCREMENT,
  `showing_id` int(10) NOT NULL,
  `promotion_code` varchar(15) DEFAULT NULL,
  `payment_method` text DEFAULT NULL,
  PRIMARY KEY (`reserve_id`),
  FOREIGN KEY (`showing_id`) REFERENCES `showings` (`showing_id`),
  FOREIGN KEY (`promotion_code`) REFERENCES `promotion` (`promotion_code`)
) ENGINE=InnoDB AUTO_INCREMENT = 200000001 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seatlayout` (
  `seat_id` int(10) NOT NULL AUTO_INCREMENT,
  `seat_type` char(50) NOT NULL,
  `layout_type` char(2) NOT NULL,
  `seat_row` char(1) NOT NULL,
  `seat_column` int(11) NOT NULL,
  PRIMARY KEY (`seat_id`),
  FOREIGN KEY (`seat_type`) REFERENCES `seatprice` (`seat_type`) ON UPDATE CASCADE,
  FOREIGN KEY (`layout_type`) REFERENCES `layouttype` (`layout_type`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=310001 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;


/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reserveseats` (
  `reserve_id` int(10) NOT NULL AUTO_INCREMENT,
  `seat_id` int(10) NOT NULL,
  PRIMARY KEY (`reserve_id`,`seat_id`),
  FOREIGN KEY (`reserve_id`) REFERENCES `reserveinfo` (`reserve_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`seat_id`) REFERENCES `seatlayout` (`seat_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;