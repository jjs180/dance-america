# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.29)
# Database: dance_america
# Generation Time: 2015-01-04 07:22:30 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table costs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `costs`;

CREATE TABLE `costs` (
  `cost_id` int(11) NOT NULL AUTO_INCREMENT,
  `cost_event_id` int(11) NOT NULL,
  `cost_person_type` varchar(255) NOT NULL,
  `cost_amount` decimal(10,0) NOT NULL,
  PRIMARY KEY (`cost_id`),
  KEY `fk_costs_event_id_idx` (`cost_event_id`),
  CONSTRAINT `fk_costs_event_id` FOREIGN KEY (`cost_event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table dance_styles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dance_styles`;

CREATE TABLE `dance_styles` (
  `ds_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ds_name` varchar(45) NOT NULL DEFAULT '',
  `ds_parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ds_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `dance_styles` WRITE;
/*!40000 ALTER TABLE `dance_styles` DISABLE KEYS */;

INSERT INTO `dance_styles` (`ds_id`, `ds_name`, `ds_parent_id`)
VALUES
	(1,'Swing',NULL),
	(2,'Salsa',NULL),
	(3,'Lindy + East Coast',1),
	(4,'Argentine Tango',NULL),
	(5,'Zook',NULL),
	(6,'West Coast Swing',1),
	(7,'Blues',NULL),
	(8,'Two Step',NULL),
	(9,'Ballroom',NULL),
	(10,'Bachata',NULL);

/*!40000 ALTER TABLE `dance_styles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table events
# ------------------------------------------------------------

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_venue_id` int(11) NOT NULL,
  `event_name` text,
  `event_minimum_age` varchar(15) NOT NULL,
  `event_start_time` time NOT NULL,
  `event_end_time` time NOT NULL,
  `event_start_date` date NOT NULL,
  `event_end_date` date NOT NULL,
  `event_web_links` text,
  `event_description` text,
  `event_special_notes` text,
  `event_will_stop` int(11) NOT NULL,
  `event_latitude` float NOT NULL,
  `event_longitude` float NOT NULL,
  `event_status` varchar(25) NOT NULL,
  `event_type` varchar(10) NOT NULL,
  `event_member_id` int(11) DEFAULT NULL,
  `event_contact_email` varchar(100) DEFAULT NULL,
  `event_time_created` datetime NOT NULL COMMENT '	',
  `event_time_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `event_dance_style` varchar(40) NOT NULL DEFAULT '',
  PRIMARY KEY (`event_id`),
  UNIQUE KEY `event_id_UNIQUE` (`event_id`),
  KEY `fk_event_venue_id_idx` (`event_venue_id`),
  CONSTRAINT `fk_event_venue_id` FOREIGN KEY (`event_venue_id`) REFERENCES `venues` (`venue_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;

INSERT INTO `events` (`event_id`, `event_venue_id`, `event_name`, `event_minimum_age`, `event_start_time`, `event_end_time`, `event_start_date`, `event_end_date`, `event_web_links`, `event_description`, `event_special_notes`, `event_will_stop`, `event_latitude`, `event_longitude`, `event_status`, `event_type`, `event_member_id`, `event_contact_email`, `event_time_created`, `event_time_updated`, `event_dance_style`)
VALUES
	(5,11,'Ben Morris\'s Swingin\' the Blues','None','19:00:00','00:00:00','2014-06-05','2015-06-05','http://atomicballroom.com/evening-dances/thursday/swingin-the-blues.php','','',0,0,0,'pending approval','classes',1,'cara.mcilnay@gmail.com','2014-06-02 17:29:02','2014-12-31 16:07:52',''),
	(6,10,'WCS with Yenni Setiawan, Eric Jacobson, Janelle Guido and Jason Taylor','None','18:30:00','23:30:00','2014-06-24','2014-06-24','http://www.wnywarehouse.com/','Lessons 6:30pm - 8:30pm\r\nOpen dancing 8:30pm - 11:30pm','',0,0,0,'pending approval','classes',1,'cara.mcilnay@gmail.com','2014-06-02 17:31:28','2014-12-31 16:07:56',''),
	(7,10,'Thursdays - WCS University with Jason & Yvonne Wayne, Nick Jay, Joanna Meinl & Shantala Davis','None','18:30:00','23:00:00','2014-06-05','2015-06-05','','Lessons 6:30pm - 8:30pm\r\nDancing 8:30pm - 11pm','',0,0,0,'pending approval','classes',1,'cara.mcilnay@gmail.com','2014-06-02 17:34:56','2014-12-31 16:07:57','');

/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table member_email_verifications
# ------------------------------------------------------------

DROP TABLE IF EXISTS `member_email_verifications`;

CREATE TABLE `member_email_verifications` (
  `mev_id` int(11) NOT NULL AUTO_INCREMENT,
  `mev_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mev_security_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `mev_time_created` datetime NOT NULL,
  `mev_time_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`mev_id`),
  KEY `mev_email_member_email_fk` (`mev_email`),
  KEY `mev_email_security_key` (`mev_email`,`mev_security_key`),
  CONSTRAINT `fk_mev_email_member_email` FOREIGN KEY (`mev_email`) REFERENCES `members` (`member_email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `member_email_verifications` WRITE;
/*!40000 ALTER TABLE `member_email_verifications` DISABLE KEYS */;

INSERT INTO `member_email_verifications` (`mev_id`, `mev_email`, `mev_security_key`, `mev_time_created`, `mev_time_updated`)
VALUES
	(2,'cara.mcilnay@gmail.com','If1CPRLMUDLTVNjsaetTQztZlSrV2wTY','2014-11-29 03:43:03','2014-11-29 03:43:03');

/*!40000 ALTER TABLE `member_email_verifications` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table member_password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `member_password_resets`;

CREATE TABLE `member_password_resets` (
  `mpr_id` int(11) NOT NULL AUTO_INCREMENT,
  `mpr_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mpr_security_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `mpr_time_created` datetime NOT NULL,
  `mpr_time_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`mpr_id`),
  KEY `mpr_email_member_email_fk` (`mpr_email`),
  KEY `mpr_email_security_key` (`mpr_email`,`mpr_security_key`),
  CONSTRAINT `fk_mpr_email_member_email` FOREIGN KEY (`mpr_email`) REFERENCES `members` (`member_email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table members
# ------------------------------------------------------------

DROP TABLE IF EXISTS `members`;

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `member_password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `member_last_login` datetime DEFAULT NULL,
  `member_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `member_role` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `member_read_terms` tinyint(1) NOT NULL,
  `member_time_created` datetime NOT NULL,
  `member_time_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`member_id`),
  UNIQUE KEY `email_UNIQUE` (`member_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;

INSERT INTO `members` (`member_id`, `member_email`, `member_password`, `member_last_login`, `member_status`, `member_role`, `member_read_terms`, `member_time_created`, `member_time_updated`)
VALUES
	(2,'cara.mcilnay@gmail.com','0365a86f390726a792f90de06255e848c1229d70',NULL,'pending_email_verification','member',0,'2014-11-29 03:43:03','2014-11-29 03:43:03');

/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table people
# ------------------------------------------------------------

DROP TABLE IF EXISTS `people`;

CREATE TABLE `people` (
  `person_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `person_name` varchar(200) NOT NULL DEFAULT '',
  `person_address_1` varchar(50) NOT NULL DEFAULT '',
  `person_address_2` varchar(50) NOT NULL DEFAULT '',
  `person_city` varchar(50) NOT NULL DEFAULT '',
  `person_state` varchar(2) NOT NULL DEFAULT '',
  `person_postal_code` int(11) DEFAULT NULL,
  PRIMARY KEY (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table repetition_descriptions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `repetition_descriptions`;

CREATE TABLE `repetition_descriptions` (
  `rd_id` int(11) NOT NULL AUTO_INCREMENT,
  `rd_event_id` int(11) NOT NULL,
  `rd_repetition_parameter` varchar(7) NOT NULL,
  `rd_repetition_spacing` int(11) NOT NULL,
  `rd_day_of_week` varchar(10) DEFAULT NULL,
  `rd_day_of_month` varchar(4) DEFAULT NULL,
  `rd_month_of_year` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`rd_id`),
  KEY `fk_repetition_descriptions_event_id_idx` (`rd_event_id`),
  KEY `fk_repetition_descriptions_parameter_idx` (`rd_repetition_parameter`),
  KEY `fk_repetition_descriptions_days_of_week_idx` (`rd_day_of_week`),
  KEY `fk_repetition_descriptions_days_of_month_idx` (`rd_day_of_month`),
  KEY `fk_repetition_descriptions_months_of_year_idx` (`rd_month_of_year`),
  CONSTRAINT `fk_repetition_descriptions_event_id` FOREIGN KEY (`rd_event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table venues
# ------------------------------------------------------------

DROP TABLE IF EXISTS `venues`;

CREATE TABLE `venues` (
  `venue_id` int(11) NOT NULL AUTO_INCREMENT,
  `venue_name` varchar(70) NOT NULL DEFAULT '',
  `venue_minimum_age` varchar(15) NOT NULL DEFAULT '',
  `venue_type` varchar(50) NOT NULL,
  `venue_web_links` text,
  `venue_address_1` varchar(100) NOT NULL,
  `venue_address_2` varchar(45) DEFAULT '',
  `venue_city` varchar(45) NOT NULL,
  `venue_state` varchar(45) DEFAULT '',
  `venue_postal_code` varchar(15) DEFAULT '',
  `venue_country` varchar(100) NOT NULL DEFAULT '',
  `venue_latitude` float NOT NULL,
  `venue_longitude` float NOT NULL,
  `venue_description` text,
  `venue_special_notes` text,
  `venue_status` varchar(25) NOT NULL,
  `venue_member_id` int(11) DEFAULT NULL,
  `venue_contact_email` varchar(100) DEFAULT NULL,
  `venue_time_created` datetime NOT NULL,
  `venue_time_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`venue_id`),
  UNIQUE KEY `venue_id_UNIQUE` (`venue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `venues` WRITE;
/*!40000 ALTER TABLE `venues` DISABLE KEYS */;

INSERT INTO `venues` (`venue_id`, `venue_name`, `venue_minimum_age`, `venue_type`, `venue_web_links`, `venue_address_1`, `venue_address_2`, `venue_city`, `venue_state`, `venue_postal_code`, `venue_country`, `venue_latitude`, `venue_longitude`, `venue_description`, `venue_special_notes`, `venue_status`, `venue_member_id`, `venue_contact_email`, `venue_time_created`, `venue_time_updated`)
VALUES
	(10,'WnY Warehouse','None','Dance Studio','http://www.wnywarehouse.com/','64 Digital Drive','','Novato','CA','94949','United States of America',38.071,-122.531,'','','pending approval',1,'','2014-06-01 18:23:53','2014-06-02 07:13:34'),
	(11,'Two Left Feet','None','Dance Studio','http://www.twoleftfeet.com/','194 Diablo Rd.','','Danville','CA','94526','United States of America',37.8231,-122,'','','pending approval',1,'','2014-06-01 18:25:47','2014-06-01 18:25:47'),
	(14,'Opera House Saloon','None','Dance Studio','','411 Lincoln St','','Roseville','CA','95678','United States of America',38.7522,-121.285,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-01 18:32:16','2014-06-01 18:32:16'),
	(15,'Studio One Ballroom','None','Dance Studio','http://www.studiooneballroom.com/','707 Wall Street','','Chico','CA','95928','United States of America',39.7276,-121.835,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-01 18:33:11','2014-06-02 17:57:38'),
	(27,'The Dance Loft','None','Dance Studio','https://www.facebook.com/groups/thedanceloft/','2475 3rd St. Suite 311','','San Francisco','CA','94107','United States of America',37.7583,-122.388,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 16:03:40','2014-06-02 16:03:40'),
	(28,'Peninsula Italian American Social Club','None','Dance Studio','','100 North B Street ','','San Mateo','CA','94401','United States of America',37.569,-122.326,'','Contact Information:\r\nMichelle Kinkaid- Tel: (415) 585-6282\r\nEmail: wcdancer@ix.netcom.com','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 16:06:01','2014-06-02 16:06:01'),
	(40,'Allegro Ballroom','None','Dance Studio','http://allegroballroom.com/','5855 Christie Ave','','Emeryville','CA','94608','United States of America',37.8397,-122.296,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 17:16:44','2014-06-02 17:16:44'),
	(41,'Next Generation Monthly','None','Dance Studio','http://www.nextgenswingdance.com/','236 West Portal Avenue, PMB 329','','San Francisco','CA','94127-1423','United States of America',37.7346,-122.464,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 17:18:29','2014-06-02 17:18:29'),
	(42,'Cheryl Burke Dance Mountain View','None','Dance Studio','http://www.cherylburkedance.com/mountain-view','1400 North Shoreline Blvd.','A-1','Mountain View','CA','94043','United States of America',37.3969,-122.082,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 17:20:27','2014-06-02 17:20:27'),
	(43,'Dance Boulevard','None','Dance Studio','http://www.danceboulevard.com/west-coast-swing/','1824 Hillsdale Avenue','','San Jose','CA','95124','United States of America',37.262,-121.918,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 17:21:58','2014-06-02 17:21:58'),
	(100,'Lakeside Swing','None','Dance Studio','','200 Grand Ave.','','Oakland','CA','94610','United States of America',37.8113,-122.261,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 23:11:20','2014-06-07 23:11:20');

/*!40000 ALTER TABLE `venues` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
