# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.29)
# Database: westie
# Generation Time: 2014-06-07 21:55:51 +0000
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
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=latin1;

LOCK TABLES `costs` WRITE;
/*!40000 ALTER TABLE `costs` DISABLE KEYS */;

INSERT INTO `costs` (`cost_id`, `cost_event_id`, `cost_person_type`, `cost_amount`)
VALUES
	(1,1,'non-members',12),
	(2,1,'members',8),
	(3,2,'club members',8),
	(4,2,'affiliate members',9),
	(5,2,'non-members',10),
	(6,4,'lessons and dancing (7-11pm)',12),
	(7,4,'open dancing (after 8:30pm)',7),
	(8,3,'group lessons',10),
	(9,3,'social dancing',0),
	(10,5,'lesson + dance',15),
	(11,5,'non members dance only ',8),
	(12,5,'members and students',6),
	(13,6,'class',13),
	(14,6,'dance',5),
	(15,7,'class',13),
	(16,7,'dance',5),
	(17,8,'everyone',12),
	(18,9,'open dance and lesson',5),
	(19,10,'lesson',7),
	(20,10,'dance',5),
	(21,12,'dance + beginning level 1 lesson',5),
	(22,12,'beginning level 2 lesson',5),
	(23,12,'intermediate level 1 lesson',5),
	(24,12,'combo: beginning level 2 + intermediate level 1 + dance',12),
	(25,15,'everyone ',5),
	(26,16,'Entire quarter',10),
	(27,17,'lesson + dance',10),
	(28,17,'dance only',7),
	(29,18,'per month',40),
	(30,20,'everyone will',10),
	(31,21,'all ages',7),
	(32,22,'everyone pays',10),
	(34,23,'Lessons & Dance',15),
	(35,23,'Beginning wcs lesson + dance',12),
	(36,23,'Dance/socialize until close',8),
	(37,23,'high school students (up to 18yrs old) for any lesson + dance',8),
	(38,23,'college students (up to 22 years old) for any lesson + dance',10),
	(39,25,'members',4),
	(40,25,'non members',6),
	(41,26,'2 classes + dance',20),
	(42,26,'1 class + dance',15),
	(43,26,'dance',10),
	(44,27,'non members',10),
	(45,27,'members',5),
	(46,27,'12 month membership',35),
	(47,28,'members',5),
	(48,29,'everyone will',10),
	(49,30,'everyone will',7),
	(50,31,'floor fee',50),
	(51,33,'students',5),
	(52,33,'non-students',7),
	(53,33,'Anyone arriving before 9:30pm to dance will',4),
	(54,34,'members',7),
	(55,34,'non-members',10),
	(56,34,'students',5),
	(57,35,'dance only',10),
	(58,35,'lesson only',12),
	(59,36,'for the class + social dance',12),
	(60,37,'4 weeks of class',50),
	(61,37,'drop in students',15),
	(62,38,'everyone will',12),
	(63,40,'everyone will',5),
	(64,41,'everyone will',5),
	(65,44,'everyone will',15),
	(67,51,'people for lesson will',10),
	(68,52,'For dance + lesson',15),
	(69,53,'members + students',5),
	(70,53,'non-members',8),
	(71,58,'For admission',6),
	(72,58,'For the lesson',5),
	(73,59,'everyone will',5),
	(74,62,'everyone will',5),
	(75,63,'students (with ID)',7),
	(76,63,'members',7),
	(77,63,'non-members',11),
	(78,66,'members',5),
	(79,66,'non-members',10),
	(80,66,'for yearly membership',25),
	(81,67,'to enter',5),
	(82,68,'non-members',15),
	(83,68,'members',10),
	(84,69,'everyone will',20),
	(85,71,'adults',6),
	(86,71,'students',5),
	(87,71,'dancing only',3),
	(88,72,'drop in classes',13),
	(89,72,'4 weeks of class',40),
	(90,73,'Dance only',5),
	(91,73,'Lesson + dance',10),
	(92,74,'class + dance',15),
	(93,77,'dance + lesson',10),
	(94,77,'dance only',5),
	(95,77,'students (dance + lesson)',5),
	(96,78,'Sunday dance',5),
	(97,78,'Tuesday dance',3),
	(98,79,'lesson bought online',6),
	(99,79,'lesson bought at the door',7),
	(100,79,'show up to dance before 9:15',8),
	(101,79,'show up to dance after 9:15',10),
	(102,80,'For 2 classes, mentoring and social dancing',17),
	(103,80,'Social dancing only',9),
	(104,81,'for dancing all night',15),
	(105,82,'members',5),
	(106,82,'non-members',8),
	(107,84,'students (with ID)',6),
	(108,84,'everyone else will',12),
	(109,86,'members',10),
	(110,86,'non-members',12),
	(111,87,'lesson + dance + beverages + snacks',12),
	(112,88,'everyone will',12),
	(113,89,'lessons',3),
	(114,90,'lesson',5),
	(115,98,'lesson',10),
	(116,98,'dance',10),
	(117,98,'lesson + dance',15),
	(118,102,'members',6),
	(119,102,'non-members',8),
	(120,102,'yearly membership',20),
	(121,103,'lesson',12),
	(122,103,'students (18-24)',8),
	(123,103,'dance only',5),
	(124,105,'for dance, members',6),
	(125,105,'for dance, non-members',10),
	(126,105,'for lesson, members',4),
	(127,105,'for lesson, non-members',5),
	(128,108,'everyone will',10000);

/*!40000 ALTER TABLE `costs` ENABLE KEYS */;
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
  `event_status` varchar(25) NOT NULL,
  `event_member_id` int(11) DEFAULT NULL,
  `event_contact_email` varchar(100) DEFAULT NULL,
  `event_time_created` datetime NOT NULL COMMENT '	',
  `event_time_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `event_will_stop` int(11) NOT NULL,
  PRIMARY KEY (`event_id`),
  UNIQUE KEY `event_id_UNIQUE` (`event_id`),
  KEY `fk_event_venue_id_idx` (`event_venue_id`),
  CONSTRAINT `fk_event_venue_id` FOREIGN KEY (`event_venue_id`) REFERENCES `venues` (`venue_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;

INSERT INTO `events` (`event_id`, `event_venue_id`, `event_name`, `event_minimum_age`, `event_start_time`, `event_end_time`, `event_start_date`, `event_end_date`, `event_web_links`, `event_description`, `event_special_notes`, `event_status`, `event_member_id`, `event_contact_email`, `event_time_created`, `event_time_updated`, `event_will_stop`)
VALUES
	(1,4,'','None','18:30:00','00:00:00','2014-05-04','2014-05-04','','Group lessons from 6pm-7:30pm\r\nOpen dancing 7:30pm - midnight\r\nRegular jack and jill contests almost every week.','','pending approval',1,'cara.mcilnay@gmail.com','2014-04-30 01:05:50','2014-06-04 16:35:57',0),
	(2,5,'','None','19:00:00','00:00:00','2014-05-01','2015-05-01','','Beginner lessons 7pm - 8:15pm\r\nIntermediate 8:15pm - 9pm\r\nSocial Dancing 9pm - midnight','','pending approval',1,'cara.mcilnay@gmail.com','2014-04-30 02:01:01','2014-04-29 17:24:56',0),
	(3,7,'','None','19:00:00','00:00:00','2014-04-29','2014-04-29','','Lessons by Mindia Robin on Tue/Thur 7pm- 8:30pm.\r\n1st Saturdays of the month with Phil Adams 7pm - midnight.\r\n3rd Tuesdays of the month with Ben Morris\'s Swingin\' da Club','','pending approval',1,'cara.mcilnay@gmail.com','2014-04-30 02:40:08','2014-04-30 05:25:22',0),
	(4,28,'B Street Boogie','None','19:00:00','23:00:00','2014-06-04','2015-06-04','http://www.michelledance.com/wednesday.html','7:00pm-7:45pm ... Levels 1 & 3 7:45pm-8:30pm ... \nLevels 2 & 4 8:30pm-11:00pm ... \nDancing to Music Mix w/ DJ, \nMichelle Lessons & Dancing (7-11pm): $12 \nOpen Dancing (after 8:30pm): $7','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 16:09:59','2014-06-02 07:16:50',0),
	(5,9,'Ben Morris\'s Swingin\' the Blues','None','19:00:00','00:00:00','2014-06-05','2015-06-05','http://atomicballroom.com/evening-dances/thursday/swingin-the-blues.php','','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 17:29:02','2014-06-02 17:29:02',0),
	(6,10,'WCS with Yenni Setiawan, Eric Jacobson, Janelle Guido and Jason Taylor','None','18:30:00','23:30:00','2014-06-24','2014-06-24','http://www.wnywarehouse.com/','Lessons 6:30pm - 8:30pm\r\nOpen dancing 8:30pm - 11:30pm','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 17:31:28','2014-06-02 17:33:14',0),
	(7,10,'Thursdays - WCS University with Jason & Yvonne Wayne, Nick Jay, Joanna Meinl & Shantala Davis','None','18:30:00','23:00:00','2014-06-05','2015-06-05','','Lessons 6:30pm - 8:30pm\r\nDancing 8:30pm - 11pm','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 17:34:56','2014-06-02 17:34:56',0),
	(8,11,'','None','20:00:00','02:00:00','2014-06-06','2015-06-06','http://www.twoleftfeet.com/','Lessons 8pm-9pm\r\nOpen Dancing 9pm-2am','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 17:36:58','2014-06-02 17:36:58',0),
	(9,12,'','None','19:00:00','00:00:00','2014-06-03','2014-06-03','http://www.paragondance.net/','7 pm - Beginner\r\n8 pm - Intermediate\r\n8:30 pm - midnight Open Dance','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 17:39:28','2014-06-02 17:41:37',0),
	(10,12,'','None','19:30:00','00:00:00','2014-06-06','2014-06-06','http://www.paragondance.net/','7:30 pm - Beginner\r\n9 pm - midnight Open Dance','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 17:40:55','2014-06-02 17:42:00',0),
	(11,13,'','None','18:00:00','22:00:00','2014-06-08','2015-06-08','http://www.desertcityswing.com/sunday-night-dance.html;https://www.facebook.com/groups/89930035498/?fref=ts Sunday nights','Newcomer/Beginner: 6 - 7:00 pm\r\nIntermediate/Advanced: 7 - 8:00pm\r\nYouth Program (6-16) FREE\r\nOpen Dance: 7 - 10:30pm\r\n','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 17:46:14','2014-06-02 17:46:14',0),
	(12,14,'Opera House Saloon - Sac Swings','21 and over','18:00:00','00:00:00','2014-06-24','2014-06-24','http://www.sacswings.com/','Hosts: Martin Casillas and Lindsey Heaton\r\n6:30 pm-7:15pm:  Beginning level 2 lesson\r\n7:30 pm-8:15pm:  Beginning level 1 lesson\r\n7:30 pm-8:15pm:  Intermediate level 1 lesson\r\n8:15 pm - close: Open Dancing','Free parking (lot across the street.)','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 17:54:02','2014-06-02 17:54:47',0),
	(13,15,'','None','21:00:00','00:00:00','2014-06-05','2015-06-05','http://www.studiooneballroom.com','','Free parking on st and surrounding area. ','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 17:57:21','2014-06-02 17:57:21',0),
	(14,16,'Monthly Project Swing Dance','None','19:30:00','02:00:00','2014-06-28','2015-06-28','https://www.facebook.com/pages/Project-Swing/291845975230','','Tuesdays - Lessons 5:30pm - 8:30pm\r\nWednesdays - Lessons 6:30pm-8:30pm\r\nThursdays - Lessons 7:30pm-8:30pm','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 18:01:06','2014-06-02 18:01:06',0),
	(15,17,'','None','19:30:00','00:00:00','2014-06-03','2015-06-03','http://www.tangodelrey.com/','','$5 entry gets you $3 credit toward bar','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 18:03:42','2014-06-02 18:03:42',0),
	(16,18,'','None','21:00:00','23:15:00','2014-06-04','2015-06-04','https://www.facebook.com/groups/UCSBWCS/','Class Schedule:\r\n\r\nLevel 1 class: 9:00 - 9:50 PM\r\nLevel 2 class: 9:55 - 10:45 PM\r\nSocial Dance: 10:45 - 11:15 PM','Parking: Parking Lot 18 (Mesa Parking Structure) Please refer to UCSB MAP','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 18:53:05','2014-06-02 18:53:05',0),
	(17,19,'','None','18:30:00','21:00:00','2014-06-08','2015-06-08','http://www.mayihavethisdance.com/dance_parties/swing-on-sundays','Hustle Lesson 6pm-6:30pm\r\nWCS Lessons 6:30pm-7pm\r\nOpen Dancing 7pm-9pm (usually later)','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 18:55:37','2014-06-02 18:55:37',0),
	(18,44,'','None','18:00:00','21:30:00','2014-06-03','2015-06-03','','WCS classes with Victoria Tolonen','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 19:00:28','2014-06-02 19:00:28',0),
	(19,44,'Free practica','None','18:00:00','21:30:00','2014-06-08','2015-06-08','http://www.benddance.com/','','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 19:03:49','2014-06-02 19:03:49',0),
	(20,45,'','None','19:00:00','22:00:00','2014-06-20','2015-06-20','http://www.sofn.com/','','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 19:06:37','2014-06-02 19:06:37',0),
	(21,20,'','None','21:00:00','00:00:00','2014-06-03','2015-06-03','http://www.centuryballroom.com','Music by DJ Robb\r\nEvery 1st saturday: OutSwing, for the GLBTQ WCS community (and their friends!). Lesson 8pm, dance 9-12a. ','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 19:10:28','2014-06-02 19:10:28',0),
	(22,46,'','None','22:30:00','04:00:00','2014-06-06','2014-06-06','https://www.facebook.com/WCSIsrael','','Alcohol is served','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 19:14:15','2014-06-02 19:21:57',0),
	(23,23,'','None','19:00:00','23:15:00','2014-06-03','2015-06-03','http://www.danceboston.com/;https://www.facebook.com/groups/18362946501/','','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 19:27:41','2014-06-02 19:27:41',0),
	(24,24,'','None','20:00:00','00:00:00','2014-06-04','2015-06-04','https://www.facebook.com/thedancingfools','','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 19:29:00','2014-06-02 19:29:00',0),
	(25,26,'','None','19:00:00','22:30:00','2014-06-05','2015-06-05','http://tsdc.net/','Beginner lesson 7pm.\r\nIntermediate lesson 8 pm\r\nOpen dancing 8:30 - 10:30 pm','Free for first time attendees','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 19:33:38','2014-06-02 19:33:38',0),
	(26,27,'','None','19:00:00','23:30:00','2014-06-23','2015-06-23','http://melissarutz.com/justknockwcs.php;https://www.facebook.com/groups/thedanceloft/','Instructor & DJ: Melissa Rutz\r\n\r\n7-7:45pm : Beginning WCS Lesson\r\n7:45-8:30pm : Intermediate WCS Lesson\r\n8:30-11:30pm : Dance Party','All-stars get in free','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 19:36:57','2014-06-02 19:36:57',0),
	(27,28,'','None','19:15:00','23:30:00','2014-06-06','2015-06-06',' http://www.tbwcsa.com/','','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 19:41:50','2014-06-02 19:41:50',0),
	(28,30,'Wicked Westie','None','19:00:00','23:00:00','2014-06-05','2015-06-05','http://www.wickedwestie.com','Lessons from 7:00pm - 7:45pm and 7:45pm - 8:30pm\r\nDance from 8:30pm - 11:00pm','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 19:43:55','2014-06-02 19:43:55',0),
	(29,32,'Danielle Blouin-Oats Floorplay dances','None','20:00:00','00:00:00','2014-06-07','2015-06-07','','','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 19:49:26','2014-06-02 19:49:26',0),
	(30,33,'Dorset Dance at Murrells','None','20:00:00','23:00:00','2014-06-05','2015-06-05','http://www.dorsetdance.com','','Monthly Sunday workshop & tea dances.','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 19:51:44','2014-06-02 19:51:44',0),
	(31,37,'','None','18:00:00','21:00:00','2014-06-08','2015-06-08','http://tinyurl.com/l6bkjd6','','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 20:39:13','2014-06-02 20:39:13',0),
	(32,38,'Chicago Rebels','None','20:00:00','00:00:00','2014-07-19','2015-07-19','http://www.chicagorebels.net/','','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 20:43:49','2014-06-02 20:43:49',0),
	(33,39,'','None','20:00:00','00:30:00','2014-06-03','2015-06-03','http://www.southtownswing.com/;https://www.facebook.com/SouthTownSwing','West Coast Swing all night on the main floor\r\nBlues Dancing on the back floor','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 20:48:11','2014-06-02 20:48:11',0),
	(34,41,'','None','18:00:00','00:00:00','2014-06-07','2015-06-07','http://www.nextgenswingdance.com/','Beginning WCS Dance lesson 7-8 PM\r\nDance: 6PM until close (Midnight).','Entrance fee includes the lesson and dance.These prices are in effect until 9 PM.','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 20:52:12','2014-06-02 20:52:12',0),
	(35,42,'','None','20:00:00','23:00:00','2014-06-05','2015-06-05','http://www.cherylburkedance.com/','Thursday Night WCS Lesson: 8-9pm\r\nSocial Dancing: 9-11pm','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 21:04:07','2014-06-02 21:04:07',0),
	(36,43,'Richard Kear\'s Monday Night West Coast Swing Class and Party','None','19:15:00','00:00:00','2014-06-02','2015-06-02','http://www.danceboulevard.com/west-coast-swing/','7:15 Beginner West Coast Swing\r\n8:15 Intermediate West Coast Swing\r\n9:15 West Coast Swing Party with DJ Richard Kear','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 21:08:01','2014-06-02 21:08:01',0),
	(37,43,'Tuesday Night West Coast Swing Series Class with Kim Delli Santi & Jack','None','19:00:00','20:00:00','2014-06-03','2015-06-03','http://www.danceboulevard.com/west-coast-swing/','','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 21:10:36','2014-06-02 21:10:36',0),
	(38,43,'Friday Night West Coast Swing','None','19:30:00','00:00:00','2014-06-06','2015-06-06','http://www.danceboulevard.com/west-coast-swing/','7:30 Beginning West Coast Swing taught by Dance Boulevard?s finest!\r\n7:30 Intermediate West Coast Swing with top instructors from the Bay Area and beyond. We are pleased to host instructors like Miguel de Sousa, Joanna Meinl, Luis Crespo, Kurt Senser, Heather Powers, Rome and Chevy Slater and more!\r\n8:30 West Coast Swing Dance with DJ Michael O? Connor','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 21:12:12','2014-06-02 21:12:12',0),
	(39,47,'WCS social','None','22:00:00','00:00:00','2014-06-03','2015-06-03','www.mosaicdance.com.sg','','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 21:15:15','2014-06-02 21:15:15',0),
	(40,48,'WCS Social','None','21:30:00','01:00:00','2014-06-06','2015-06-06','http://www.swingapore.com/','','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 21:19:33','2014-06-02 21:19:33',0),
	(41,49,'','None','20:00:00','00:00:00','2014-06-06','2015-06-06','http://rhythmicsouls.com/;https://www.facebook.com/rhythmicsouls','','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 21:33:28','2014-06-02 21:33:28',0),
	(42,50,'','None','19:00:00','00:00:00','2014-06-02','2014-06-02','http://swingfx.co.nz/','Monday: beg & int classes and social dancing till late.\r\nsee website for full details','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 21:37:48','2014-06-02 21:39:08',0),
	(43,50,'','None','20:00:00','00:00:00','2014-06-07','2015-06-07','http://swingfx.co.nz/','','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 21:38:41','2014-06-02 21:38:41',0),
	(44,51,'West Coast Swing Australia at the Lewisham Hotel','None','19:30:00','22:30:00','2014-06-03','2015-06-03','http://www.facebook.com/dancewcsa','Beginner & Intermediate Classes + Social Dancing.\r\nExtended Social Dancing last week of every month','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 21:46:01','2014-06-02 21:46:01',0),
	(45,52,'West Coast Swing Saskatoon','None','19:30:00','00:00:00','2014-06-12','2015-06-12','','beginner lesson from 730pm-830pm\r\nintermediate from 830pm-900pm\r\ndance til close!','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 21:52:23','2014-06-02 21:52:23',0),
	(46,52,'West Coast Swing Dance party','18 and over','21:00:00','02:00:00','2014-06-21','2014-06-21','','non stop music and dance..\r\nno cover.\r\ngood size dance floor','age 19+','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 21:53:51','2014-06-02 21:53:51',1),
	(47,53,'','None','20:30:00','23:30:00','2014-09-05','2014-09-05','','For more info and to keep up with happening in the Calgary WCS community please join us on\r\nFacebook: WCSwing Calgary','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 21:58:04','2014-06-02 21:58:04',1),
	(49,4,'','None','01:00:00','01:00:00','2014-09-21','2014-09-21','','','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 16:21:37','2014-06-04 16:21:37',1),
	(50,56,'','None','19:00:00','22:00:00','2014-06-08','2015-06-08','','Beginner class - 7pm-8pm \r\nSocial dancing - 8pm-9pm\r\nIntermediate class - 9pm-9.30pm    \r\nSocial dancing - 9.30pm-10pm \r\n\r\nNEW BEGINNERS ARE WELCOME TO START ON ANY SUNDAY NIGHT AS WE TEACH DIFFERENT BEGINNER PATTERNS IN THE BEGINNERS CLASS FROM 7PM UNTIL 8PM.','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 16:49:50','2014-06-04 16:49:50',0),
	(51,57,'','None','19:00:00','11:30:00','2014-06-05','2015-06-05','http://www.dancebook.org','Lessons at 7 PM (BEG), 8 PM (INT)\r\nDancing from 9 PM to 11:30 PM','Contact Tony Azar','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 17:03:20','2014-06-04 17:03:20',0),
	(52,58,'Song Scout Saturdays','None','20:30:00','01:30:00','2014-06-07','2015-06-07','','Intermediate Lesson from 8:30 - 9:30 PM.\r\nDance from 9:30 PM - 1:30 AM.\r\n\r\nHosted by Song Scout (Paul and Melinda Booth)\r\nMore information at SongScout.net','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 17:06:03','2014-06-04 17:06:03',0),
	(53,59,'MWCSDC dance','None','19:30:00','00:00:00','2014-06-13','2015-06-13','','This event will feature a free one-hour lesson (with paid admission).','Special Events include an Anniversary Dance, Picnic, and Holiday Dance.','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 17:11:11','2014-06-04 17:11:11',0),
	(54,60,'Tahiti Swing','None','18:00:00','21:00:00','2014-06-04','2015-06-04','http://tahitiswing.fr;','Lessons on Wednesday(beginners & inter)','TAHITI SWING\r\nTel : (+689) 33 33 03\r\nEmail : tahitiswing@yahoo.fr\r\nFacebook : Mur TahitiSwing','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 17:19:23','2014-06-04 17:19:23',0),
	(55,60,'Tahiti Swing','None','21:00:00','00:00:00','2014-06-06','2015-06-06','http://tahitiswing.fr','TAHITI SWING\r\nOpen dancing on friday\r\nTel : (+689) 33 33 03\r\nEmail : tahitiswing@yahoo.fr\r\nFacebook : Mur TahitiSwing','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 17:20:46','2014-06-04 17:20:46',0),
	(56,61,'','None','19:30:00','23:00:00','2014-06-10','2015-06-10','https://www.facebook.com/nfyokohama','7:30pm-8:00pm Beginner\r\n8:00pm-8:50pm Intermediate\r\n8:50pm-11:00pm Social Dancing\r\nLesson 2500JPY W1D\r\nSocial 1500JPY W1D','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 17:23:44','2014-06-04 17:23:44',0),
	(57,62,'','None','20:00:00','22:30:00','2014-06-05','2015-06-05','https://www.facebook.com/pages/West-Coast-Swing-Townsville','','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 17:34:37','2014-06-04 17:34:37',0),
	(58,63,'West Coast Wednesdays','None','19:00:00','23:15:00','2014-06-11','2014-06-11','http://www.westcoastwednesdays.com/','Chicago/s West Coast Wednesdays where we dance west coast swing (WCS) every Wednesday.\r\n\r\n7:00 - Beginner WCS Lesson\r\n7:45 - Intermediate WCS Lesson\r\n8:30-11:15 (or later) - Open Dancing','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 17:37:53','2014-06-04 17:38:41',0),
	(59,65,'','None','19:30:00','21:30:00','2014-06-06','2015-06-06','','Intermediate Lessons\r\nIntermediate lessons are offered from 7:30 to 8:00 pm\r\n\r\nBeginner Lessons\r\nLearn West Coast Swing Basics! For dates and pricing of lessons, visit the \"WCS Level 1\" link under \"Dance Lessons.\"\r\n\r\nOpen Dancing 8:00 - 9:30 pm\r\nThe best pop, jazz, swing, blues, disco and R&B.','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 17:46:42','2014-06-04 17:46:42',0),
	(60,66,'','None','20:00:00','01:00:00','2014-06-10','2015-06-10','http://www.dancetelaviv.co.il/','Classes 8:30-10:30pm\r\nOpen Dancing 10:30pm-2am or later...','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 17:51:49','2014-06-04 17:51:49',0),
	(61,67,'','None','19:00:00','23:00:00','2014-06-09','2015-06-09','','see website for class times & pricing.\r\nWCS Practice every Monday, 9p-11p, $5 cover ($3 with same day class attendance)\r\n\r\nClub Swing - 2nd Saturday of every month, lesson from 7-8p, dancing 8p-11p, cover $10 for lesson & dance, $5 for dance only.','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 17:56:38','2014-06-04 17:56:38',0),
	(62,68,'','None','20:00:00','00:00:00','2014-06-20','2015-06-20','','West Coast Swing & Variety dance\r\nCountry night every Wednesday and most Saturday\'s. Check website for updated details, dates & times.','no outside beverages allowed','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 18:04:24','2014-06-04 18:04:24',0),
	(63,67,'Twin City Rebeles','None','19:00:00','22:30:00','2014-06-01','2015-06-01','http://TCRebels.com','Classes offered on Sunday\'s at Social Dance Studio in Minneapolis.  \r\n','Special Events:\r\nSpring, 2nd week of June, Anniversary Dance\r\nFall, end of October, Masquerade Ball/Weekend','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 18:07:53','2014-06-04 18:07:53',0),
	(64,69,'','None','20:00:00','22:00:00','2014-06-04','2014-06-04','','Classes offered Wednesday with Practice hour from 9-10p\r\nSee Website for class info, times & cost.','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 18:10:32','2014-06-04 18:11:02',0),
	(65,70,'','None','18:30:00','19:30:00','2014-06-09','2014-06-09','','Classes Monday-Saturday for all levels. Social dance Party Nights every 4th Friday & 3rd Saturday of the Month','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 18:14:07','2014-06-04 18:18:57',0),
	(66,71,'','None','18:30:00','20:30:00','2014-06-08','2015-06-08','','West Coast Swing Lessons with Mike Konkel & Sheli Schroeder\r\n6:30 PM Beg WCS Lesson\r\n7:30 PM Intermediate WCS Lesson','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 18:22:32','2014-06-04 18:22:32',0),
	(67,72,'Milwaukee Rebels Swing Dance Club','None','20:00:00','00:00:00','2014-06-11','2015-06-11','http://www.milwaukeerebels.com','','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 18:25:36','2014-06-04 18:25:36',0),
	(68,73,'DSD Thursdays','None','19:15:00','22:15:00','2014-06-05','2015-06-05','','7:30-8:00 Beginner Class\r\n8:00-8:30 Social\r\n8:30-9:15 Beginner Revision (Room 2) + Intermediate\r\n9:15-10:15 Social\r\nWe have something for all levels every week. Learn at your own pace and tick off the 8 base moves to be eligible for Intermediate class. No rush, learning is casual from week to week.','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 00:26:23','2014-06-05 00:26:23',0),
	(69,74,'','None','20:00:00','01:00:00','2014-06-06','2015-06-06','','- Open Nights are perfect for new people to come and check out why so many people dance at DSD or even at all. Dance whaaaat?\r\nExpected;\r\n- Beginner tester class\r\n- BYO alcohol\r\n- Snack food provided\r\n- Performances\r\n- Great music\r\nUnexpected;\r\n* Pumped Up Kicks Edition','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 00:30:19','2014-06-05 00:30:19',0),
	(70,75,'Austin City Dance Club','None','18:00:00','23:00:00','2014-06-10','2015-06-10','https://facebook.com/austincitydanceclub;http://austincitydanceclub.com/','Non-profit dance membership club featuring classes and social dancing in West Coast Swing and Hustle. \r\n\r\nInstructors: Mike Topel, Angel & Debbie Figueroa, Taletha Jouzdanie and Emily Washburn\r\n\r\n','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 00:52:08','2014-06-05 00:52:08',0),
	(71,76,'','None','18:00:00','21:30:00','2014-06-05','2015-06-05','','7-8 Lessons\r\n8-9:30 Dancing','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 00:55:33','2014-06-05 00:55:33',0),
	(72,77,'','None','19:00:00','21:00:00','2014-06-11','2015-06-11','http://www.rhythmicsouls.com','Our group is the Rhythmic Souls Group. We rent space all over the valley.','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 01:04:09','2014-06-05 01:04:09',0),
	(73,79,'','None','19:00:00','22:00:00','2014-06-05','2015-06-05','','Beginner lesson 7pm\r\nBeyond the Basics 7:45\r\nDance 8:30-10pm.','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 01:07:51','2014-06-05 01:07:51',0),
	(74,80,'','None','19:00:00','22:00:00','2014-06-10','2015-06-10','','7pm -10pm including social dancing. ','Discounted multi class passes available.','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 02:15:24','2014-06-05 02:15:24',0),
	(75,59,'Holiday Dance','None','19:00:00','00:00:00','2014-12-12','2015-12-12','http://mnwestcoastswingdanceclub.com/','','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 02:25:08','2014-06-05 02:25:08',0),
	(76,59,'anniversary dance','None','19:00:00','00:00:00','2014-05-09','2015-05-09','http://mnwestcoastswingdanceclub.com/','','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 02:34:12','2014-06-05 02:34:12',0),
	(77,81,'','None','19:00:00','23:00:00','2014-06-05','2015-06-05','http://www.overstreetdancegallery.com/','Three Lessons (Beg., Int., & Adv.): 7-8PM\r\nSocial Dance: 8-11pm','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 02:41:10','2014-06-05 02:41:10',0),
	(78,82,'','None','20:30:00','20:30:00','2014-06-08','2014-06-08','http://www.facebook.com/groups/vancouverwcs/','','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 06:47:39','2014-06-05 06:48:11',0),
	(79,83,'Just Wanna Dance! West Coast Swing','None','19:30:00','00:30:00','2014-06-21','2015-06-21','http://www.vanswingthing.com/;http://www.facebook.com/groups/vancouverwcs/','Vancouver\'s hottest venue for West Coast Swing dances brought to you monthly by VanSwingThing.\r\nBeginner lesson: 7:30 - 8:30pm\r\nIntermediate lesson: 7:30 - 8:30pm\r\nDance: 8:30 - 12:30am','Note: entrance is on Helmcken under the Rhodes College sign.','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 06:57:33','2014-06-05 06:57:33',0),
	(80,84,'WCS Melbourne','None','19:30:00','22:00:00','2014-06-05','2015-06-05','http://wcsmelbourne.com.au/ ;https://www.facebook.com/WCSMelbourne','What\'s New?\r\n- Mentoring session: At 7:30pm and 8:30pm Brett and Samantha are at your disposal to answer any questions and help with any patterns or technique you?re having trouble with. We?re introducing these one-on-one mentoring times especially for beginners.\r\n- Brett and Samantha teaching every week: You asked for it, you got it! We know you love them individually but together the class always twice as fun, with a great routine, and thorough teaching.\r\n- 45 minute classes: Not too long, not too short, and still plenty of time for social dancing\r\n- DJ slot: the last 30 minutes is open for any budding DJ\'s! Just let Brett and Sammi know if you?d like to DJ the following week and bring along a playlist on your iPod\r\n\r\n7:30pm Doors open for social dancing, warm up and mentoring\r\n7:45pm Beginner class\r\n8:30pm Social dancing and mentoring\r\n8:45pm Intermediate class\r\n9:30-10:00pm Social dancing','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 07:07:49','2014-06-05 07:07:49',0),
	(81,85,'Barefoot Swing','None','19:00:00','23:00:00','2014-06-09','2015-06-09','','7:00pm - 7:30pmDoors Open & Social Dancing\r\n7:30pm - 8:15pmIntermediate Class\r\n8:15pm - 8:30pmSocial Dancing Break\r\n8:30pm - 9:15pmBeginner & 1st Timer\'s Class\r\n9:15pm - 11:00pmSocial Dancing & Partaay!!\r\n11:00pm - 12:00amJoin us at the bar!','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 07:14:13','2014-06-05 07:14:13',0),
	(82,87,'Ala Wai Palladium','None','18:30:00','21:15:00','2014-05-11','2014-08-31','http://swingdanceclubhawaii.org/Dance_Schedule_and_Events.html','We start with a half hour WCS dance lesson at 6:30\r\n\r\nBert Burgess play a variety of music to dance to - WCS, Hustle, NC2 Step, Country 2 step, Waltz, Cha Cha, Salsa\r\n\r\nA light snack, usually pizza, is provided\r\n','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 07:24:01','2014-06-05 07:24:01',1),
	(83,88,'TOKYO WCS BASE!','None','19:00:00','23:00:00','2014-06-14','2015-06-14','http://www.tokyoswinggang.com/ ;https://www.facebook.com/groups/164559766951293','SCHEDULEOPEN19:00-CLOSE23:00\r\n19:00-20:00 Lesson by.JOSE&AYA @1,000yen (beginner/intermediate)\r\n20:00-23:00 Party @1,500yen\r\nSoft drink:charge of free / Beer:300yen\r\nYou can bring any drinks and food.\r\n\r\nPLACEShin-Tokyo Building B1 Floor.\r\nADD: 1-19-8 Nishi-shinjuku Shinjuku-ku TOKYO, JAPAN\r\nACCESS: 5 minutes walk from \"South Exit\"\r\n at JR / Odakyu / Keio Shinjuku Station\r\n1F=\"KAMO\" soccer shop\r\n','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 07:29:27','2014-06-05 07:29:27',0),
	(84,89,'','None','17:00:00','21:30:00','2014-06-01','2014-06-01','http://www.robandsheiladance.com','5:00-5:30\r\npm\r\nDoors open. Meet and greet.\r\n5:30-6:15pm\r\nAll level dance lesson.\r\nWe mostly teach WCS here but we do\r\nadd in a few other dance lessons at times. There?s something\r\nfor everyone from the absolute beginner to the more advanced\r\ndancers in our lessons! No Partner needed\r\n.\r\nNewcomers welcome!\r\n.\r\n6:15-9:30pm (at least!) WE DANCE\r\n! We play lots of WCS: contemporary, blues,\r\nrhythm & blues, time honored favorites and more\r\n.\r\nEveryone welcome. No partner needed. Free parking on the streets and in the garage on\r\nthe corner of Olive St. and Baltimore Av.','With Rob and Sheila\r\nNOTE: Cost can vary when we have guest instructors in to visit. Check our website often for our schedule.','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 07:35:06','2014-06-05 07:38:41',0),
	(85,89,'','None','19:30:00','23:00:00','2014-06-10','2014-06-10','http://www.robandsheiladance.com','West Coast Swing Every Tuesday\r\nwith Rob and Sheila\r\n\r\n7:30-8:30 West Coast Swing Intermediates\r\n8:30-9:30 West Coast Swing for Life\r\n9:30-11:00ish FREE WCS practica\r\n.Stay after class and practice what you are learning or just come out and join in the fun of the dance.','NOTE: Cost can vary when we have guest instructors in to visit. Check our website often for our schedule.','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 07:37:49','2014-06-05 07:38:19',0),
	(86,90,'Watermelon Dance','None','19:30:00','00:30:00','2014-06-21','2015-06-21','http://delval.wordpress.com/','Our DJs play a great mix of blues, rhythm and blues, contemporary, and more for a great night of dancing.\r\n\r\nThere will also be snacks, beverages, and free parking (no alcohol please).\r\n\r\nSchedule:\r\n7:30 - 8:00 All Level Workshop\r\n8:00 - 8:30 Free Introduction Lesson in West Coast Swing\r\n8:30 - 12:30am Dancing!\r\n\r\n\r\n\r\n','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 07:44:14','2014-06-05 07:44:14',0),
	(87,90,'4th Fridays at the Lodge','None','20:15:00','00:00:00','2014-06-28','2015-06-28','http://delval.wordpress.com/','8:15-8:30 Doors open for meet and mingle\r\n8:30-9:15 All level WCS lesson\r\n9:15 til 12:30 Dance, Dance, Dance !!!','No alcohol please','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 07:46:15','2014-06-05 07:46:15',0),
	(88,91,'','None','20:30:00','01:00:00','2014-06-14','2015-06-14','','','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 07:49:13','2014-06-05 07:49:13',0),
	(89,92,'','None','20:00:00','21:30:00','2014-06-05','2015-06-05','http://www.theballroomdancecompany.com','Dancing with Jimmy Ho\r\n\r\nCheck website for schedule updates','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 07:53:01','2014-06-05 07:53:01',0),
	(90,92,'','None','19:00:00','22:00:00','2014-06-08','2015-06-08','','Beginner Lessons 7pm-7:30pm\r\nDance 7:30pm - 10:00pm','Check website for schedule updates\r\n','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 07:54:39','2014-06-05 07:54:39',0),
	(91,93,'Strictly Tuesdays at Connolly\'s','None','19:30:00','00:30:00','2014-06-10','2015-06-10','http://www.strictlywestie.com;http://www.nowdancing.com','8:30 pm - 12:30 am Dance\r\n7:30 pm Beginner and Int/Adv. Lessons','Please contact organizer to confirm whether there is a dance as it is subject to change','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 22:36:47','2014-06-07 22:36:47',0),
	(92,94,'Gotham Soul','None','21:00:00','12:30:00','2014-06-07','2015-06-07','http://www.gothamswingclub.org','','Please contact organizer to confirm whether there is a dance as it is subject to change.','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 22:41:19','2014-06-07 22:41:19',0),
	(93,95,'West Coast Wednesday','None','21:00:00','00:00:00','2014-06-11','2015-06-11','http://www.dancemanhattan.com','West Coast Wednesday with DJs Anthony DeRosa, Jeanette Holmes and John Lindo','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 22:46:53','2014-06-07 22:46:53',0),
	(94,96,'Platinum Party WCS & Hustle','None','21:00:00','00:00:00','2014-06-20','2014-06-20','http://www.swingshoes.net','Free Beginner Crash Course: 9:00 pm\r\nDancing: 9:30-12','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 22:50:32','2014-06-07 22:52:20',0),
	(95,97,'Cali Mix Practice Dance','None','21:30:00','23:00:00','2014-06-09','2015-06-09','http://www.steppingoutstudios.com','','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 22:57:23','2014-06-07 22:57:23',0),
	(96,98,'','None','21:00:00','22:30:00','2014-06-10','2015-06-10','http://pghwcs.com/','','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 23:04:59','2014-06-07 23:04:59',0),
	(97,99,'Weekly dance','None','19:15:00','22:30:00','2014-06-09','2015-06-09','http://wcsmontana.com/wcs/;https://www.facebook.com/pages/West-Coast-Swing-Montana/109823322410541?fref=ts','','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 23:08:25','2014-06-07 23:08:25',0),
	(98,100,'','None','18:00:00','22:30:00','2014-06-27','2015-06-27','http://audiopyle.com/baysideswing.html','LESSON: 6:00-7:00 PM\r\nDANCE:   7:00-10:30 PM','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 23:13:57','2014-06-07 23:13:57',0),
	(99,101,'','None','19:00:00','20:30:00','2014-06-13','2015-06-13','http://www.danceworksstudio.com','Beginner WCS classes on Friday evenings. Intermediate/Advanced WCS classes on Monday evenings. Drop-in and monthly rates','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 23:17:16','2014-06-07 23:17:16',0),
	(100,101,'WCS dance party','None','20:30:00','00:00:00','2014-06-27','2015-06-27','http://danceworksstudio.com/','Party starts at 9:15 with lesson beforehand at 8:30pm.\r\nFun & friendly atmosphere. Occasional live music events.','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 23:18:38','2014-06-07 23:18:38',0),
	(101,102,'','None','17:45:00','00:30:00','2014-06-11','2015-06-11','http://www.loafersbeachclub.com','shag and wcs. wcs dancers get there around 8pm usually','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 23:21:26','2014-06-07 23:21:26',0),
	(102,102,'','None','20:00:00','02:00:00','2014-06-13','2015-06-13','','','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 23:23:09','2014-06-07 23:23:09',0),
	(103,103,'','None','18:30:00','21:30:00','2014-06-08','2015-06-08','','','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 23:26:10','2014-06-07 23:26:10',0),
	(104,104,'','None','18:30:00','00:00:00','2014-06-10','2015-06-10','','6:30 - 7:15 HD Class\r\n7:15 - 8:00 Intermediate\r\n8:00 - 8:45 Beginner\r\n9:00 - 12:00 - Dancing.\r\n\r\nFor more information on the Toronto scene go to http://towestcoast.com/ \r\n','Free Beginner Class first Tuesday of the month.','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 23:29:19','2014-06-07 23:29:19',0),
	(105,105,'','None','17:30:00','21:30:00','2014-06-08','2014-06-08','http://coloradoswingdance.org','Lesson from 5:30 -6:30 PM \r\nDance from 6:30 - 9:30 PM','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 23:33:12','2014-06-07 23:33:46',0),
	(106,107,'BoogieInBethesda','None','19:30:00','00:00:00','2014-06-10','2015-06-10','','West Coast Swing lessons and dance Tuesday nights. Beginners welcome.\r\nContact Frank boogieinbethesda@aol.com or BoogieInBethesda on facebook.','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 23:40:26','2014-06-07 23:40:26',0),
	(107,21,'','None','20:00:00','01:00:00','2014-06-07','2015-06-07','','Lesson 8pm / dance 9pm-1am','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 23:42:09','2014-06-07 23:42:09',0),
	(108,111,'','None','20:00:00','01:00:00','2014-06-07','2015-06-07','https://www.facebook.com/groups/koreaopenswingdance/ ;https://www.facebook.com/KoreaOpenSwingDanceChampionships','West Coast Swing Lesson and Dancing every Sat with WCSwing Pros.','3 floor Sherry Kwon Dance School.\r\n \r\n\r\n','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 23:53:53','2014-06-07 23:53:53',0);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;

INSERT INTO `members` (`member_id`, `member_email`, `member_password`, `member_last_login`, `member_status`, `member_role`, `member_read_terms`, `member_time_created`, `member_time_updated`)
VALUES
	(1,'cara.mcilnay@gmail.com','e07c3ed4f262858b6d3c2cc45a00c3be9e9f23b3',NULL,'active','admin',0,'2014-02-01 18:59:26','2014-02-02 17:24:08'),
	(3,'cara.m.hack@gmail.com','e07c3ed4f262858b6d3c2cc45a00c3be9e9f23b3',NULL,'active','member',0,'2014-02-02 02:15:38','2014-02-11 17:59:11');

/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;


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
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=latin1;

LOCK TABLES `repetition_descriptions` WRITE;
/*!40000 ALTER TABLE `repetition_descriptions` DISABLE KEYS */;

INSERT INTO `repetition_descriptions` (`rd_id`, `rd_event_id`, `rd_repetition_parameter`, `rd_repetition_spacing`, `rd_day_of_week`, `rd_day_of_month`, `rd_month_of_year`)
VALUES
	(1,1,'weeks',1,'Sunday','',''),
	(2,2,'weeks',1,'Wednesday','',''),
	(23,3,'weeks',1,'Tuesday','',''),
	(31,3,'weeks',1,'Thursday','',''),
	(34,3,'months',1,'Tuesday','3',''),
	(38,3,'months',1,'Saturday','1',''),
	(39,4,'weeks',1,'Wednesday','last',''),
	(40,5,'weeks',1,'Thursday','last',''),
	(41,6,'weeks',1,'Tuesday','last',''),
	(42,7,'weeks',1,'Thursday','last',''),
	(43,8,'weeks',1,'Friday','last',''),
	(44,9,'weeks',1,'Tuesday','last',''),
	(45,10,'weeks',1,'Friday','last',''),
	(46,11,'weeks',1,'Sunday','last',''),
	(47,12,'weeks',1,'Tuesday','last',''),
	(48,13,'weeks',1,'Thursday','last',''),
	(49,14,'months',1,'Saturday','last',''),
	(50,15,'weeks',1,'Tuesday','last',''),
	(51,16,'weeks',1,'Wednesday','last',''),
	(52,17,'weeks',1,'Sunday','last',''),
	(53,18,'weeks',1,'Tuesday','last',''),
	(54,18,'weeks',1,'Thursday','last',''),
	(55,19,'weeks',1,'Sunday','last',''),
	(56,20,'months',1,'Friday','3',''),
	(57,21,'weeks',1,'Tuesday','last',''),
	(58,21,'months',1,'Saturday','1',''),
	(59,22,'weeks',1,'Friday','last',''),
	(60,23,'weeks',1,'Tuesday','last',''),
	(61,23,'weeks',1,'Thursday','last',''),
	(62,24,'weeks',1,'Wednesday','last',''),
	(63,25,'weeks',1,'Thursday','last',''),
	(64,26,'months',1,'Monday','4',''),
	(65,27,'weeks',1,'Friday','last',''),
	(66,28,'weeks',1,'Thursday','last',''),
	(67,29,'months',1,'Saturday','1',''),
	(68,29,'months',1,'Saturday','4',''),
	(69,30,'weeks',1,'Thursday','last',''),
	(70,31,'weeks',2,'Sunday','last',''),
	(71,32,'weeks',2,'Saturday','last',''),
	(72,33,'weeks',1,'Tuesday','last',''),
	(73,34,'months',1,'Saturday','1',''),
	(74,35,'weeks',1,'Thursday','last',''),
	(75,36,'weeks',1,'Monday','last',''),
	(76,37,'weeks',1,'Tuesday','last',''),
	(77,38,'weeks',1,'Friday','last',''),
	(78,39,'weeks',1,'Tuesday','last',''),
	(79,40,'weeks',1,'Friday','last',''),
	(80,41,'weeks',1,'Friday','last',''),
	(81,42,'weeks',1,'Monday','last',''),
	(82,43,'months',1,'Saturday','1',''),
	(83,44,'weeks',1,'Tuesday','last',''),
	(84,45,'weeks',1,'Thursday','last',''),
	(85,46,'months',1,'Saturday','3',''),
	(86,47,'weeks',1,'Friday','last',''),
	(87,50,'weeks',1,'Sunday','last',''),
	(88,51,'weeks',1,'Thursday','last',''),
	(89,52,'weeks',1,'Saturday','last',''),
	(90,53,'months',1,'Friday','2',''),
	(91,53,'months',1,'Friday','4',''),
	(92,54,'weeks',1,'Wednesday','last',''),
	(93,55,'weeks',1,'Friday','last',''),
	(94,56,'weeks',1,'Tuesday','last',''),
	(95,57,'weeks',1,'Wednesday','last',''),
	(96,58,'weeks',1,'Wednesday','last',''),
	(97,59,'days',0,'','',''),
	(98,60,'weeks',1,'Tuesday','last',''),
	(99,61,'weeks',1,'Monday','last',''),
	(100,61,'months',1,'Saturday','2',''),
	(101,62,'months',1,'Friday','3',''),
	(102,63,'months',1,'Sunday','1',''),
	(103,63,'months',1,'Sunday','3',''),
	(104,63,'years',1,'Sunday','2','6'),
	(105,64,'weeks',1,'Wednesday','last',''),
	(106,65,'weeks',1,'Tuesday','last',''),
	(109,65,'months',1,'Saturday','3',''),
	(110,65,'months',1,'Friday','4',''),
	(111,66,'weeks',1,'Sunday','last',''),
	(112,67,'months',1,'Wednesday','2',''),
	(113,67,'months',1,'Wednesday','4',''),
	(114,68,'weeks',1,'Thursday','last',''),
	(115,69,'months',1,'Friday','1',''),
	(116,70,'weeks',1,'Tuesday','last',''),
	(117,71,'weeks',1,'Thursday','last',''),
	(118,72,'weeks',1,'Wednesday','last',''),
	(119,73,'weeks',1,'Thursday','last',''),
	(120,74,'weeks',1,'Tuesday','last',''),
	(121,74,'weeks',1,'Thursday','last',''),
	(122,75,'years',1,'Friday','2','12'),
	(123,76,'years',1,'Friday','2','5'),
	(124,77,'weeks',1,'Thursday','last',''),
	(125,77,'months',1,'Saturday','3',''),
	(126,78,'weeks',1,'Sunday','last',''),
	(127,78,'weeks',1,'Tuesday','last',''),
	(128,79,'months',1,'Saturday','3',''),
	(129,80,'weeks',1,'Thursday','last',''),
	(130,82,'months',1,'Sunday','2',''),
	(131,82,'months',1,'Sunday','last',''),
	(132,83,'months',1,'Saturday','2',''),
	(133,84,'months',1,'Sunday','1',''),
	(134,85,'weeks',1,'Tuesday','last',''),
	(135,86,'months',1,'Saturday','3',''),
	(136,87,'months',1,'Saturday','4',''),
	(137,88,'months',1,'Friday','2',''),
	(138,89,'weeks',1,'Thursday','last',''),
	(139,90,'weeks',1,'Sunday','last',''),
	(140,91,'weeks',1,'Tuesday','last',''),
	(141,92,'months',1,'Saturday','1',''),
	(142,93,'weeks',1,'Wednesday','last',''),
	(143,94,'months',1,'Friday','3',''),
	(144,95,'weeks',1,'Monday','last',''),
	(145,96,'weeks',1,'Tuesday','last',''),
	(146,97,'weeks',1,'Monday','last',''),
	(147,98,'months',1,'Sunday','4',''),
	(148,99,'weeks',1,'Friday','last',''),
	(149,100,'months',1,'Friday','last',''),
	(150,101,'weeks',1,'Wednesday','last',''),
	(151,102,'weeks',1,'Friday','last',''),
	(152,103,'weeks',1,'Sunday','last',''),
	(153,104,'weeks',1,'Tuesday','last',''),
	(154,105,'weeks',1,'Sunday','last',''),
	(155,106,'weeks',1,'Tuesday','last',''),
	(156,107,'weeks',1,'Saturday','last',''),
	(157,108,'weeks',1,'Saturday','last','');

/*!40000 ALTER TABLE `repetition_descriptions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table scraps
# ------------------------------------------------------------

DROP TABLE IF EXISTS `scraps`;

CREATE TABLE `scraps` (
  `scrap_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `scrap_longitude` float NOT NULL,
  `scrap_latitude` float NOT NULL,
  `scrap_name` varchar(70) NOT NULL DEFAULT '',
  `scrap_description` text,
  `scrap_status` varchar(60) DEFAULT NULL,
  `scrap_time_created` datetime NOT NULL,
  `scrap_time_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`scrap_id`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=latin1;

LOCK TABLES `scraps` WRITE;
/*!40000 ALTER TABLE `scraps` DISABLE KEYS */;

INSERT INTO `scraps` (`scrap_id`, `scrap_longitude`, `scrap_latitude`, `scrap_name`, `scrap_description`, `scrap_status`, `scrap_time_created`, `scrap_time_updated`)
VALUES
	(1,-118.534,34.2035,'Sonny Watson\'s Street Swing Club','<div dir=\"ltr\"><font face=\"arial\" size=\"2\"><a href=\"http://www.streetswing.com/\" target=\"_blank\">http://www.streetswing.com/</a></font></div><div dir=\"ltr\"><BR>&nbsp;</div><div dir=\"ltr\" style=\"font-family:arial;font-size:10pt\"><b style=\"font-size:10pt\">Wednesdays</b><BR><ul><li><span style=\"font-size:10pt\">Beginner lessons 7pm - 8:15pm</span></li><li><span style=\"font-size:10pt\">Intermediate 8:15pm - 9pm</span></li><li><span style=\"font-size:10pt\">Social Dancing 9pm - midnight</span></li></ul><BR>$10 non-members<BR>$9 affiliate members<BR>$8 club members</div>','unprocessed','2014-01-21 23:30:33','2014-06-04 22:16:27'),
	(2,-117.88,33.8613,'The Clubhouse','<div dir=\"ltr\"><a href=\"http://www.ocwcsdc.com\" target=\"_blank\">www.ocwcsdc.com</a><BR><a href=\"http://www.theclubhousedancestudio.com\" target=\"_blank\">www.theclubhousedancestudio.com</a></div><div dir=\"ltr\"><BR>&nbsp;</div><div dir=\"ltr\">Owned by DJ Jack Smith and Rachele Smith.<BR><BR><span style=\"font-size:10pt\"><b>Sundays</b></span><BR><ul><li><span style=\"font-size:10pt\">Group lessons from 6pm-7:30pm</span></li><li><span style=\"font-size:10pt\">Open dancing 7:30pm - midnight</span></li></ul><BR>Regular jack and jill contests almost every week.<BR><BR>$12 non-members<BR>$8 members<BR><BR><BR>&nbsp;</div>','unprocessed','2014-01-21 23:30:33','2014-06-04 22:16:44'),
	(3,-118.397,33.9231,'Hacienda Hotel and Double H Club','<div dir=\"ltr\">WCS every Tuesday and Thursday 7pm - Midnight.<BR><BR>Lessons by Mindia Robin on Tue/Thur 7pm- 8:30pm.<BR><BR>1st Saturdays of the month with Phil Adams 7pm - midnight.<BR><BR>3rd Tuesdays of the month with Ben Morris\'s Swingin\' da Club.<BR><BR>No cover charge for dancing.  Group lessons $10.<BR><BR>Full bar</div>','unprocessed','2014-01-21 23:30:33','2014-06-04 22:16:28'),
	(4,-117.863,33.6901,'ATOMIC Ballroom','<div dir=\"ltr\">Ben Morris\'s Swingin\' the Blues every Thursday night 7pm - midnight.<BR><BR>Lessons 7pm - 8:45pm<BR><BR>$15 lesson + dance<BR>$8 non-members dance only<BR>$6 Members and students<BR><BR>http://atomicballroom.com/evening-dances/thursday/swingin-the-blues.php<BR>&nbsp;</div>','unprocessed','2014-01-21 23:30:33','2014-06-04 22:16:44'),
	(5,-122.531,38.0711,'WnY Warehouse','<div style=\"font-size:10pt;font-family:arial\"><font size=\"2\" face=\"arial\"><a href=\"http://www.wnywarehouse.com/\" target=\"_blank\">http://www.wnywarehouse.com/</a></font></div><b style=\"font-size:10pt;font-family:arial\"><div><b style=\"font-family:arial;font-size:10pt\"><BR></b></div>Tuesdays - WCS with Yenni Setiawan, Eric Jacobson, Janelle Guido and Jason Taylor</b><div style=\"font-family:arial\"><ul><li style=\"font-size:10pt\"><font size=\"2\" face=\"arial\">Lessons 6:30pm - 8:30pm</font></li><li style=\"font-size:10pt\"><font size=\"2\" face=\"arial\">Open dancing 8:30pm - 11:30pm</font></li><li><font size=\"2\">Classes $10</font></li><li><font size=\"2\">Dance $5</font></li></ul><div style=\"font-size:10pt\"><font size=\"2\"><b>Thursdays - WCS University with Jason &amp; Yvonne Wayne, Nick Jay, Joanna Meinl &amp; Shantala Davis</b></font></div></div><div><ul><li><font size=\"2\">Lessons 6:30pm - 8:30pm</font></li><li><font size=\"2\">Dancing 8:30pm - 11pm</font></li><li><font size=\"2\">$13 class</font></li><li><font size=\"2\">$5 dance only</font></li></ul></div>','unprocessed','2014-01-21 23:30:33','2014-06-04 22:16:30'),
	(6,-121.999,37.8231,'Two Left Feet','<font face=\"arial\" size=\"2\"><a href=\"http://www.twoleftfeet.com/\" target=\"_blank\">http://www.twoleftfeet.com/</a></font><div><BR>&nbsp;</div><div><b>Fridays</b></div><div><ul><li>Lessons 8pm-9pm</li><li>Open Dancing 9pm-2am</li></ul><div>$12</div></div>','processing','2014-01-21 23:30:33','2014-06-01 18:25:57'),
	(7,-111.927,33.3477,'Paragon Dance Center','<div dir=\"ltr\"><a href=\"http://www.paragondance.net\" target=\"_blank\">www.paragondance.net</a> West Coast Swing on <b>Tuesdays</b>&nbsp;</div><div dir=\"ltr\">(7 pm - Beginner; 8 pm - Intermediate; 8:30 pm - midnight Open Dance) and&nbsp;</div><div dir=\"ltr\"><BR>&nbsp;</div><div dir=\"ltr\"><b>Fridays</b>&nbsp;</div><div dir=\"ltr\">(7:30 pm - Beginner; 9 pm - midnight Open Dance) $7 general admission with lesson; $5 for students on Fridays; $5 on Tuesdays for open dance only.</div>','unprocessed','2014-01-21 23:30:33','2014-06-04 22:16:31'),
	(8,-112.056,33.4949,'Arthur Murray Dance Studio','<div dir=\"ltr\">http://www.desertcityswing.com/sunday-night-dance.html or https://www.facebook.com/groups/89930035498/?fref=ts Sunday nights. Beginner and Intermediate lessons at 6 pm. Open dance 7 pm to 10:30 pm.</div>','unprocessed','2014-01-21 23:30:33','2014-06-04 22:16:47'),
	(9,-121.285,38.7523,'Opera House Saloon - Sac Swings','<div dir=\"ltr\">Tuesday nights. 21+. Free parking (lot across the street.)<BR>Hosts: Martin Casillas and Lindsey Heaton<BR>6:30 pm: Lessons begin<BR>8:15 pm - close: Open Dancing<BR>http://www.sacswings.com/<BR><BR>Dance only - $5 (includes the 7:30 PM Beginning WCS Level 1 lesson)<BR>Beginning WCS Level 2 (6:30pm) - $5<BR>Intermediate WCS Level 1 (7:30pm) - $5<BR>Combo Special: Take the Beginning Level 2, the Intermediate Level 1 and stay for the dance: only $12<BR></div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(10,-121.835,39.7276,'StudioOne Ballroom 707 Wall St','<a href=\"http://www.studiooneballroom.com\" target=\"_blank\">studiooneballroom.com&nbsp;</a><div><BR>&nbsp;</div><div>Thursday nights. 9:00pm-midnight. &nbsp;$5 for the dance. Free parking on st and surrounding area. Chico, CA 95928<BR><img src=\"https://cbks0.google.com/cbk?output=thumbnail&amp;w=90&amp;h=68&amp;ll=39.727579,-121.835083&amp;thumb=0\"></div>','unprocessed','2014-01-21 23:30:33','2014-06-04 22:16:32'),
	(11,-117.059,32.7672,'Starlight Dance Studio','<font face=\"arial\" size=\"2\"><a href=\"http://www.starlightdance.com/\" target=\"_blank\">http://www.starlightdance.com/</a></font><div><a href=\"https://www.facebook.com/pages/Project-Swing/291845975230\" target=\"_blank\">Project Swing Facebook</a></div><div><BR>&nbsp;</div><div>Monthly Project Swing Dance</div><div><b>Saturdays - 7:30pm - 2am</b></div><div>Check schedule for dates of monthly dance.</div><div><BR>&nbsp;</div><div><b>Tuesdays&nbsp;</b></div><div><ul><li>Lessons 5:30pm - 8:30pm</li></ul><div><b>Wednesdays</b></div></div><div><ul><li>Lessons 6:30pm-8:30pm</li></ul><div><b>Thursdays</b></div></div><div><ul><li>Lessons 7:30pm-8:30pm</li></ul><div><BR>&nbsp;</div></div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(12,-117.23,32.7965,'Tango Del Rey','<font face=\"arial\" size=\"2\"><a href=\"http://www.tangodelrey.com/\" target=\"_blank\">http://www.tangodelrey.com/</a></font><div><BR>&nbsp;</div><div><b>Tuesdays</b></div><div><ul><li>7:30pm - Midnight</li></ul><div>$5 - ($3 credit towards bar)</div></div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(13,-119.852,34.4154,'UCSB West Coast Swing Club','West Coast Swing at University of California, Santa Barbara. 2013 - 2014 school year session time is every <span><span>Wednesday night 9 - 11:15 PM</span></span> (closed during holidays and school breaks). Please visit us on Facebook group to get the lasted club and event updates.<BR><BR><a href=\"https://www.facebook.com/groups/UCSBWCS/\" target=\"_blank\">https://www.facebook.com/groups/UCSBWCS/</a><BR><BR>Class Schedule:<BR><BR>Level 1 class: <span><span>9:00 - 9:50 PM</span></span><BR>Level 2 class: <span><span>9:55 - 10:45 PM</span></span><BR>Social Dance: <span><span>10:45 - 11:15 PM</span></span><BR><BR>Charge: $10 for entire quarter :)<BR><BR>Location: UCSB Robertson Gymnasium 2320<BR><BR>Parking: Parking Lot 18 (Mesa Parking Structure) Please refer to <a href=\"http://www.aw.id.ucsb.edu/maps/ucsbmap.html\" target=\"_blank\">UCSB MAP</a>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(14,-87.7535,41.9762,'May I Have This Dance','<font face=\"arial\" size=\"2\"><a href=\"http://www.mayihavethisdance.com/dance_parties/swing-on-sundays\" target=\"_blank\">http://www.mayihavethisdance.com/dance_parties/swing-on-sundays</a></font><div><BR>&nbsp;</div><div><b>Sundays</b></div><div><ul><li>Hustle Lesson 6pm-6:30pm</li><li>WCS Lessons 6:30pm-7pm</li><li>Open Dancing 7pm-9pm (usually later)</li></ul><div>$10 - Lesson + dance</div></div><div>$7 dance only</div><div><BR>&nbsp;</div><div>Mostly WCS music with some hustle and a little bit of country 2-step.</div>','unprocessed','2014-01-21 23:30:33','2014-06-04 22:16:50'),
	(15,-121.332,44.0245,'Bend Dance!','<div><a href=\"http://www.BendDance.com\" target=\"_blank\">www.BendDance.com&nbsp;</a></div><div><BR>&nbsp;</div>WCS classes with Victoria Tolonen Tuesdays and Thursdays 6:00 - 9:30pm ($40/month), Practica Sunday evenings (free) and a drop-in class and dance every 3rd and 5th Fridays at Sons of Norway ($10). Come to learn, meet people and have fun!&nbsp;<BR><BR>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(16,-122.32,47.615,'Century Ballroom','<div dir=\"ltr\" style=\"font-family:arial;font-size:10pt\"><a href=\"http://www.centuryballroom.com/\" target=\"_blank\">www.centuryballroom.com</a></div><div dir=\"ltr\" style=\"font-family:arial;font-size:10pt\"><b>Tuesdays</b></div><div dir=\"ltr\"><ul><li><font face=\"arial\" size=\"2\">9pm - Midnight</font></li><li><font face=\"arial\" size=\"2\">$7 cover</font></li></ul><div><font face=\"arial\" size=\"2\">All ages</font></div><div><font face=\"arial\" size=\"2\">Music by DJ Robb</font></div><div><font face=\"arial\" size=\"2\"><BR></font></div><div><font face=\"arial\" size=\"2\">1st Saturdays&nbsp;</font></div><div><font face=\"arial\" size=\"2\">OutSwing, for the GLBTQ WCS community (and their friends!). Lesson 8pm, dance 9-12a.&nbsp;</font></div></div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(17,-117.867,33.666,'Avant Garde Ballroom','<font face=\"arial\" size=\"2\"><a href=\"http://www.avantgardeballroom.com/carrielucas.htm\" target=\"_blank\">www.avantgardeballroom.com</a></font><div><BR>&nbsp;</div><div><b>4th Saturday of each Month</b></div><div><ul><li>Lesson 7pm-8pm</li><li>Dance 8pm-12pm&nbsp;</li></ul><div>Lessons and dance hosted by Carrie Lucas</div><div>$12 cover</div></div>','unprocessed','2014-01-21 23:30:33','2014-06-04 22:16:32'),
	(18,34.7819,32.0861,'WCSI @ StudioB','<div><a href=\"https://www.facebook.com/WCSIsrael\" target=\"_blank\">https://www.facebook.com/WCSIsrael</a></div><div><BR>&nbsp;</div><div><div dir=\"ltr\" align=\"left\" style=\"margin:0px;padding:0px 0px 0.7em;max-height:400px\"><div style=\"margin:0px;padding:0px\"><b>Fridays</b></div><div style=\"margin:0px;padding:0px\"><ul style=\"margin:6px 0px;padding:0px 0px 0px 32px;list-style-position:initial\"><li style=\"margin:0px;padding:0px\">Lessons 10:30pm-12:00am</li><li style=\"margin:0px;padding:0px\">Open Dancing 12am-4am</li></ul><div style=\"margin:0px;padding:0px\">$10</div><div style=\"margin:0px;padding:0px\"><BR>&nbsp;</div><div style=\"margin:0px;padding:0px\"><span style=\"font-family:arial, helvetica, sans-serif;background-color:rgb(255, 255, 255)\">Alcohol is served</span></div></div></div></div><BR><img src=\"https://cbks0.google.com/cbk?output=thumbnail&amp;w=90&amp;h=68&amp;ll=32.086760,34.782537&amp;thumb=0\">','unprocessed','2014-01-21 23:30:33','2014-06-02 15:45:20'),
	(19,-71.1519,42.4116,'DanceBoston','<a href=\"http://www.danceboston.com/\" target=\"_blank\">http://www.danceboston.com/</a><BR><a href=\"https://www.facebook.com/groups/18362946501/\" target=\"_blank\">https://www.facebook.com/groups/18362946501/</a><BR><BR><b>Tuesdays and Thursdays<BR></b><ul><li>Lessons 7pm - 9pm</li><li>Dance 9pm - 11:15pm</li></ul><p><font face=\"Arial,Helvetica,Geneva,Swiss,SunSans-Regular\" size=\"-1\">$15 Lessons &amp; Dance.<BR></font><font face=\"Arial,Helvetica,Geneva,Swiss,SunSans-Regular\" size=\"-1\">$12 for Beginner WCS Lessons &amp; Dance<BR></font><font face=\"Arial,Helvetica,Geneva,Swiss,SunSans-Regular\" size=\"-1\">$8 Dance and/or socialize until close</font></p><p><b>Student Discounts</b><BR></p><p><font face=\"Arial,Helvetica,Geneva,Swiss,SunSans-Regular\"><font face=\"Arial,Helvetica,Geneva,Swiss,SunSans-Regular\" size=\"-1\">High School students up to 18 years old = $8 Any lessons (dance included at no cost)<BR></font></font></p><p><font face=\"Arial,Helvetica,Geneva,Swiss,SunSans-Regular\"><font face=\"Arial,Helvetica,Geneva,Swiss,SunSans-Regular\" size=\"-1\">College students up to 22 years old = $10<BR></font></font></p><p><font face=\"Arial,Helvetica,Geneva,Swiss,SunSans-Regular\"><font face=\"Arial,Helvetica,Geneva,Swiss,SunSans-Regular\" size=\"-1\">Any lessons (dance included at no cost)<BR>$8 Dance &amp;/or socialize until close</font></font></p><BR><BR><BR><BR>56 Pond Ln, Arlington, MA 02474<BR><img src=\"https://cbks0.google.com/cbk?output=thumbnail&amp;w=90&amp;h=68&amp;ll=42.411649,-71.151950&amp;thumb=0\">','unprocessed','2014-01-21 23:30:33','2014-06-04 22:16:49'),
	(20,-71.1204,42.3738,'The Dancing Fools','<a href=\"https://www.facebook.com/thedancingfools\" target=\"_blank\">https://www.facebook.com/thedancingfools</a><BR><BR><b>Wednesdays</b><BR><ul><li>Lesson 8pm - 9pm</li><li>Dance 9pm - Midnight<BR></li></ul><BR>50 Church Street, Cambridge, MA 02138<BR>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(21,-71.349,42.459,'The Swing Dance Studio','<a href=\"http://www.theswingdancestudio.com/\" target=\"_blank\">www.theswingdancestudio.com</a><BR><a href=\"https://www.facebook.com/groups/373162002756097/\" target=\"_blank\">https://www.facebook.com/groups/373162002756097/</a><BR><BR>Check website or group for dance schedule updates.<BR><BR>51 Walden St, Concord, MA 01742<BR><img src=\"https://cbks0.google.com/cbk?output=thumbnail&amp;w=90&amp;h=68&amp;ll=42.459001,-71.348989&amp;thumb=0\">','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(22,-110.874,32.2505,'Sonoran Ballroom Co','<div dir=\"ltr\"><a href=\"http://tsdc.net/\" target=\"_blank\">http://tsdc.net/</a><BR>Tucson Swing Dance Club meets Thursdays.  Beginner lesson 7pm.<BR>Intermediate lesson 8 pm<BR>Open dancing 8:30 - 10:30 pm<BR>Free for first time visitors.<BR>$4 members/$6 non members</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(23,-122.388,37.7582,'\"Just Knock\" WCS @ The Dance Loft','<div dir=\"ltr\"><a href=\"http://melissarutz.com/justknockwcs.php\" target=\"_blank\">http://melissarutz.com/justknockwcs.php</a><BR><a href=\"https://www.facebook.com/groups/thedanceloft/\" target=\"_blank\">https://www.facebook.com/groups/thedanceloft/</a><BR>Monthly on Monday night. Check website for details.<BR><BR>The Dance Loft<BR>2475 3rd Street<BR>Suite #311<BR>San Francisco, CA 94107<BR><a href=\"http://www.valcunningham.com\" target=\"_blank\">www.valcunningham.com</a><BR><BR>Instructor &amp; DJ: Melissa Rutz<BR><BR>7-7:45pm : Beginning WCS Lesson<BR>7:45-8:30pm : Intermediate WCS Lesson<BR>8:30-11:30pm : Dance Party<BR><BR>Cost:<BR>$20 two classes &amp; dance<BR>$15 one class &amp; dance<BR>$10 Dance Only<BR>(All-Stars get in free!)<BR><BR>JUST KNOCK ON THE DOOR WHEN YOU GET THERE!</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(24,-122.326,37.5692,'\"B\" Street Boogie','<div dir=\"ltr\"><a href=\"http://www.michelledance.com/wednesday.html\" target=\"_blank\">http://www.michelledance.com/wednesday.html</a></div><div dir=\"ltr\"><BR>West Coast Swing Wednsedays</div><div dir=\"ltr\"><span style=\"font-size:10pt\">&nbsp;</span></div><div dir=\"ltr\">Lessons:&nbsp;</div><div dir=\"ltr\">Level 1: Beginner</div><div dir=\"ltr\">Level 2: Advanced Beginner</div><div dir=\"ltr\">Level 3: Intermediate</div><div dir=\"ltr\">Level 4: Advanced</div><div dir=\"ltr\"><BR><span style=\"font-size:medium;background-color:rgb(255, 255, 255)\">7:00pm-7:45pm ... Levels 1 &amp; 3&nbsp;</span></div><div dir=\"ltr\"><span style=\"background-color:rgb(255, 255, 255)\"><span style=\"font-size:medium\">7:45pm-8:30pm ... Levels 2 &amp; 4</span><br style=\"font-size:medium\"><span style=\"font-size:medium\">8:30pm-11:00pm ... Dancing to Music Mix w/ DJ, Michelle</span><br style=\"font-size:medium\"><br style=\"font-size:medium\"><b style=\"font-size:medium\">Lessons &amp; Dancing (7-11pm): $12&nbsp;<BR>Open Dancing (after 8:30pm): $7</b></span></div><div dir=\"ltr\"><BR>Contact Information:<BR>Michelle Kinkaid; Tel: (415) 585-6282<BR>Email: wcdancer@ix.netcom.com </div>','unprocessed','2014-01-21 23:30:33','2014-06-04 22:16:29'),
	(25,-82.7863,27.8398,'Crystal Blue Ballroom','<div dir=\"ltr\">Friday Night WCS dances.<BR>Here is the calendar.<BR><a href=\"http://www.tbwcsa.com/events/month.calendar/2013/06/03/\" target=\"_blank\">http://www.tbwcsa.com/events/month.calendar/2013/06/03/</a><BR><BR>$10 Non-members<BR>$5 Members<BR>$35 twelve month membership</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(26,-84.3765,33.8299,'Wicked Westie','<div dir=\"ltr\"><a href=\"http://www.wickedwestie.com/\" target=\"_blank\">www.wickedwestie.com</a><BR><BR>Thursday nights Time: 7:00pm - 11:00pm<BR><BR>Cost: $5 to $10,<BR><BR>Lessons from 7:00pm - 7:45pm and 7:45pm - 8:30pm<BR><BR>Dance from 8:30pm - 11:00pm<BR>Held in the Garden Hills Community Center</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(27,-82.7276,27.8646,'Bayou Dance Club','','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(28,-80.097,26.7099,'Sultry Swing Dance Studio','<div dir=\"ltr\">Danielle Blouin-Oats Floorplay dances on the 1st and 4th Saturdays of the month.<BR>$10</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(29,-1.84367,50.7207,'Dorset Dance @ Murrells','<div style=\"text-align:-webkit-auto\"><span style=\"background-color:rgb(255, 255, 255);color:rgb(51, 51, 51);font-size:10pt;line-height:16px;text-align:left\">Weekly Thursday Night WCS Class with Steve Hunt &amp; Rachel Martin, 8-11pm, ?7 on the door.</span></div><div style=\"text-align:-webkit-auto\"><span style=\"background-color:rgb(255, 255, 255);color:rgb(51, 51, 51);line-height:16px;text-align:left;font-size:10pt\">Monthly Sunday workshop &amp; tea dances.</span></div><div style=\"text-align:-webkit-auto\"><span style=\"font-size:10pt;background-color:rgb(255, 255, 255);text-align:left\"><font face=\"arial\">Murrells Dance Studio,&nbsp;</font></span><span style=\"font-size:10pt;background-color:rgb(255, 255, 255);color:rgb(51, 51, 51);line-height:16px;text-align:left\">Undercliff Road, Boscombe, BH5 1BN (Above Harvester)</span></div><div style=\"text-align:-webkit-auto\"><span style=\"background-color:rgb(255, 255, 255);color:rgb(51, 51, 51);line-height:16px;text-align:left;font-size:10pt\">See website for further details www.dorsetdance.com&nbsp;</span></div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(30,10.3931,63.4112,'Norway Westie Fest, Trondheim, Norway','<div dir=\"ltr\">http://www.westie-fest.com/<BR><BR>http://www.wcs.no/<BR><BR>West Coast Swing Events, local classes and socialdancing.</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(31,-38.5374,-3.73739,'Cia Soul Dan','<div dir=\"ltr\" style=\"font-family:arial;font-size:10pt\"><a href=\"http://www.facebook.com/ciasouldanca?fref=ts\" target=\"_blank\">http://www.facebook.com/ciasouldanca?fref=ts</a><BR><BR><p><span style=\"font-size:9.0pt;font-family:Arial;color:#333333;background:white\">- Cia Soul Dan?a ? uma iniciativa dos Professores de Dan?a<BR>Bruno L?neker &amp; Clau Batista visando a socializa??o da dan?a,&nbsp;</span>al?m de contribuir para a inser??o do West Coast Swing<BR>(Principal Ritmo da Companhia) na cidade de Fortaleza.<BR>- Aulas todos os s?bados de WCS, Samba &amp; Zouk.</p><p><BR></p><BR><p><span style=\"font-size:9.0pt;font-family:Arial;color:#333333;background:white\">&nbsp;</span><span style=\"background-color:rgb(247, 247, 247);color:rgb(62, 69, 76);font-family:Arial;font-size:9pt\">- Cia Soul Dan?a is an<BR>initiative of the teachers Bruno Lineker &amp; Clau Batista for dance<BR>socialization and contribution for the West Coast Swing\'s insertion (Main<BR>Rhythm of the Company) in </span>Fortaleza<BR>City<span style=\"background-color:rgb(247, 247, 247);color:rgb(62, 69, 76);font-family:Arial;font-size:9pt\">.</span></p><span lang=\"EN-US\" style=\"font-size:9.0pt;font-family:Arial;color:#3E454C\"><BR><span style=\"background:#F7F7F7\"><span style=\"white-space:pre-wrap\">- WCS,<BR>Samba &amp; Zouk Classes every Saturday</span>.</span></span><BR><p><span style=\"font-size:10.0pt;font-family:Arial;color:#333333;background:white\">&nbsp;</span></p><BR><p><BR></p></div>','unprocessed','2014-01-21 23:30:33','2014-06-04 22:16:47'),
	(32,-122.659,45.518,'Melody Ballroom','<a href=\"http://www.portlanddancing.com/moreinfo.aspx?moreinfo=1870\" target=\"_blank\">http://www.portlanddancing.com/moreinfo.aspx?moreinfo=1870</a><BR><BR><BR>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(33,-0.43396,51.4848,'New Year\'s Swing Fling','<div dir=\"ltr\">London based WCS event 28th December 2013 - 1st January 2014. Top international line up, 4 star hotel, 4 nights of parties, NYE dinner, 40hrs of multilevelled workshops. Passes start from ?79.<BR>http://www.dorsetdance.com/newyearswingflingbookings.html</div>','unprocessed','2014-01-21 23:30:33','2014-06-04 22:16:33'),
	(34,11.9742,57.6891,'Chalmers Dance Society','<div dir=\"ltr\">Every other sunday, 18-21 CET. 50 SEK floor fee.<BR><a href=\"http://tinyurl.com/l6bkjd6\" target=\"_blank\">http://tinyurl.com/l6bkjd6</a><BR><BR><img src=\"https://cbks0.google.com/cbk?output=thumbnail&amp;w=90&amp;h=68&amp;ll=57.689073,11.974228&amp;thumb=0\"><BR></div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(35,-87.8602,41.9441,'Chicago Rebels Swing Dance Club','','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(37,-111.661,40.2341,'South Town Swing','Every Tuesday Night<BR>$5 for Students<BR>$7 for Non-Students<BR>$4 for anyone before 9;30 PM<BR><BR>Beginning and Intermediate lessons start at 8 PM<BR>Dancing starts at 9 PM<BR>Goes until 12:30 AM<BR><BR>West Coast Swing all night on the main floor<BR>Blues Dancing on the back floor<BR>Our Website:<BR>http://www.southtownswing.com/<BR><BR>Our Facebook Group:<BR>https://www.facebook.com/groups/southtownswing/<BR><BR>Like us on facebook!<BR>https://www.facebook.com/SouthTownSwing<BR><BR><img src=\"https://cbks0.google.com/cbk?output=thumbnail&amp;w=90&amp;h=68&amp;ll=40.234073,-111.660869&amp;thumb=0\">','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(38,-122.296,37.8395,'Allegro Ballroom','','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(39,-122.296,37.8395,'Next Generation Monthly','<div style=\"font-family:arial;font-size:10pt\"><BR>&nbsp;</div><div style=\"font-family:arial;font-size:10pt\">Monthly Dance (Saturday). See site for details.</div><div style=\"font-family:arial;font-size:10pt\"><a href=\"http://www.nextgenswingdance.com/\" style=\"font-size:10pt\" target=\"_blank\">http://www.nextgenswingdance.com/</a></div><div style=\"font-family:arial;font-size:10pt\"><BR>&nbsp;</div><div><font face=\"arial\" size=\"2\">Beginning WCS Dance lesson 7-8 PM</font></div><div><font face=\"arial\" size=\"2\">Dance: 6PM until close (Midnight).</font></div><div><ul><li><span style=\"background-color:rgb(255, 255, 255);font-family:Verdana, Arial, Helvetica, sans-serif;font-size:small\">$7 member&nbsp;</span></li><li><span style=\"background-color:rgb(255, 255, 255);font-family:Verdana, Arial, Helvetica, sans-serif;font-size:small\">$12 non-member</span></li><li><span style=\"background-color:rgb(255, 255, 255);font-family:Verdana, Arial, Helvetica, sans-serif;font-size:small\">$5 student&nbsp;</span></li></ul></div><div><span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;background-color:rgb(255, 255, 255)\"><font size=\"1\">Entrance fee includes the lesson and dance.</font></span><font face=\"Arial, Arial, Helvetica, sans-serif\" style=\"background-color:rgb(255, 255, 255)\"><font><font><font size=\"1\">These prices are in effect until 9 PM</font><font size=\"2\">.</font></font></font></font></div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(40,-122.079,37.4138,'Thursday WCS with Richard Kear','<div dir=\"ltr\">http://www.cherylburkedance.com/mountain-view/<BR><BR>Thursday Night WCS Lesson: 8-9pm ($12)<BR><BR>Social Dancing: 9-11pm ($10)</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(41,-121.918,37.2624,'West Coast Swing Classes','<h2 style=\"padding:0px;margin:1.833em 0px 0.611em;color:rgb(17, 17, 17);line-height:1.222em\"><a href=\"http://www.danceboulevard.com/west-coast-swing/\" target=\"_blank\"><font size=\"2\">http://www.danceboulevard.com/west-coast-swing/</font></a></h2><h2 style=\"font-size:10pt;padding:0px;margin:1.833em 0px 0.611em;color:rgb(17, 17, 17);line-height:1.222em\"><span style=\"background-color:rgb(255, 255, 255)\"><font size=\"2\">Richard Kear?s Monday Night West Coast Swing Class and Party</font></span></h2><p style=\"font-size:14px;padding:0px;margin:0px 0px 1.571em;color:rgb(17, 17, 17);line-height:21.984375px\"><span style=\"background-color:rgb(255, 255, 255)\">7:15 Beginner West Coast Swing<br style=\"padding:0px;margin:0px\">8:15 Intermediate West Coast Swing<br style=\"padding:0px;margin:0px\">9:15 West Coast Swing Party with DJ Richard Kear<br style=\"padding:0px;margin:0px\">$12/class<br style=\"padding:0px;margin:0px\">$12/class and party</span></p><h3 style=\"font-size:1.286em;padding:0px;margin:1.833em 0px 0.611em;font-weight:normal;line-height:1.222em;color:rgb(17, 17, 17)\"><span style=\"background-color:rgb(255, 255, 255)\">Tuesday Night West Coast Swing Series Class with Kim Delli Santi &amp; Jack</span></h3><p style=\"font-size:14px;padding:0px;margin:0px 0px 1.571em;color:rgb(17, 17, 17);line-height:21.984375px\"><span style=\"background-color:rgb(255, 255, 255)\">Tuesday 7:00 pm<br style=\"padding:0px;margin:0px\">$50 for 4 weeks<br style=\"padding:0px;margin:0px\">$15 drop in</span></p><h3 style=\"font-size:1.286em;padding:0px;margin:1.833em 0px 0.611em;font-weight:normal;line-height:1.222em;color:rgb(17, 17, 17)\"><span style=\"background-color:rgb(255, 255, 255)\">Friday Night West Coast Swing</span></h3><p style=\"font-size:14px;padding:0px;margin:0px 0px 1.571em;color:rgb(17, 17, 17);line-height:21.984375px\"><span style=\"background-color:rgb(255, 255, 255)\">7:30 Beginning West Coast Swing taught by Dance Boulevard?s finest!<br style=\"padding:0px;margin:0px\">7:30 Intermediate West Coast Swing with top instructors from the Bay Area and beyond. We are pleased to host instructors like Miguel de Sousa, Joanna Meinl, Luis Crespo, Kurt Senser, Heather Powers, Rome and Chevy Slater and more!<br style=\"padding:0px;margin:0px\">8:30 West Coast Swing Dance with DJ Michael O? Connor<br style=\"padding:0px;margin:0px\">$12 for the evening.</span></p><div dir=\"ltr\" style=\"font-size:10pt\"></div>','processing','2014-01-21 23:30:33','2014-06-02 17:22:13'),
	(42,103.856,1.29882,'Mosaic Dance Singapore','<div>WCS Social every Tue Night from 10pm-12.30mn&nbsp;</div><div><BR>&nbsp;</div><a href=\"http://www.mosaicdance.com.sg\" target=\"_blank\">www.mosaicdance.com.sg</a><BR><BR>520 North Bridge Road<div>Level 5</div><div>Singapore 188742</div><div><BR>&nbsp;</div><div>Tel: +65 6884 5440&nbsp;</div><div>Email: info@mosaicdance.com.sg</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(43,103.848,1.29925,'Jitterbugs Swingapore','<div dir=\"ltr\">WCS Social every Fri night from 9.30pm to 1am, $5 per entry</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(44,-115.209,36.1286,'Broadway Hall','<div dir=\"ltr\">Every Friday at 8pm. Beginner lesson 8-8:30pm (no additional cost), open dancing 8:30pm till midnight.<BR><BR>$5 to get in.<BR><BR><a href=\"http://rhythmicsouls.com/\" target=\"_blank\">http://rhythmicsouls.com/</a><BR><BR><a href=\"https://www.facebook.com/rhythmicsouls\" target=\"_blank\">https://www.facebook.com/rhythmicsouls</a><BR></div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(46,175.078,-39.3683,'swingFX','<div dir=\"ltr\"><a href=\"http://www.swingFX.co.nz\" target=\"_blank\">www.swingFX.co.nz</a><BR><BR>Monday: beg &amp; int classes and social dancing till late.<BR>1st Friday of the month is our party night.<BR>see website for full details</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(47,151.147,-33.8901,'West Coast Swing Australia','<div dir=\"ltr\"><span style=\"font-weight:bold\">West Coast Swing Australia at the Lewisham Hotel</span><BR><BR>Every Tuesday 7:30pm - 10:30pm<BR>Cost $15<BR>Beginner &amp; Intermediate Classes + Social Dancing.<BR>Extended Social Dancing last week of every month<BR><BR>Visit us on Facebook - <a href=\"http://www.facebook.com/dancewcsa\" target=\"_blank\">www.facebook.com/dancewcsa</a></div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(48,-106.655,52.1267,'Toon Town Tavern','<div dir=\"ltr\">West Coast Swing Saskatoon<BR>Every Thursday night<BR>beginner lesson from 730pm-830pm<BR>intermediate from 830pm-900pm<BR>Dance till close<BR><BR>3rd Saturday of every month is our West Coast Swing Dance party from 9pm till close . non stop music and dance..<BR>no cover.<BR>good size dance floor<BR>age 19+<BR>&nbsp;</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(49,-114.088,50.9743,'WCSwing Calgary','<div dir=\"ltr\">Westies Welcome!<BR>Most Fridays Sept to June 8:30-11:30pm<BR>One dance a month in summer...<BR>For more info and to keep up with happening in the Calgary WCS community please join us on<BR>Facebook: WCSwing Calgary</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(51,150.999,-33.8137,'Nuroc Dance Company','<div dir=\"ltr\">Learn to Dance in Sydney with Nuroc Dance Company. West Coast Swing Dance Classes held twice a week along with regular dance parties!  Website <a href=\"http://www.nuroc.com.au\" target=\"_blank\">www.nuroc.com.au</a> for full details! </div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(52,-122.34,47.6373,'China Harbor Restaurant','<div dir=\"ltr\">West Coast Swing on Thursday Evenings.<BR><BR>Lessons at 7 PM (BEG), 8 PM (INT)<BR>Dancing from 9 PM to 11:30 PM<BR><BR>Entry Cost: $10<BR><BR>Contact: Tony Azar<BR><BR>More information at www.dancebook.org</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(53,-122.192,47.6803,'Song Scout Saturdays at KDC','<div dir=\"ltr\">Venue: Kirkland Dance Center<BR><BR>Intermediate Lesson from 8:30 - 9:30 PM.<BR>Dance from 9:30 PM - 1:30 AM.  $10.<BR><BR>Dance+Lesson $15.<BR><BR>Hosted by Song Scout (Paul and Melinda Booth)<BR>More information at SongScout.net</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(55,-122.165,47.6232,'WCS at Harmony Ballroom','<div dir=\"ltr\">WCS Wednesdays at Harmony Ballroom in Bellevue.<BR>Come out for a fun night of West Coast Swing dancing. Your DJ and instructor is SCOT McKAY. Scot will teach a drop-in beginning West Coast Swing lesson from 7:30 to 8:30 PM. Dance from 8:30 to 11:00 PM to a mix of Blues and Contemporary music. You\'ll learn something new each week in a free mini move lesson at 9:30 PM. The pre-dance lesson is $8, dance admission is also $8, or $13 for both. Held at the wonderful Harmony Ballroom, 1407 132nd Ave NE #7, Bellevue; www.harmonyballroom.com. For more info - or to make advance song requests which Scot always likes to receive - contact Scot at tinboy66@hotmail.com or 206-227-4277.</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(56,-122.192,47.6805,'Kirkland Dance Center','','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(57,-93.1261,45.0043,'MWCSDC','<div dir=\"ltr\">MWCSDC is a group of West Coast Swing dancers that holds two dances a month at the B-Dale club at 2100 Dale St. N, Roseville, MN 55113<BR><BR>Dances are held the 2nd &amp; 4th Fridays of each month and feature a free one-hour lesson (with paid admission).<BR>Cost for dances is $5 for members &amp; students, $8 for non-members. Special Events include an Anniversary Dance, Picnic, and Holiday Dance. </div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(58,-149.568,-17.5344,'Tahiti Swing','<div dir=\"ltr\"><a href=\"http://tahitiswing.fr\" target=\"_blank\">http://tahitiswing.fr</a><BR><BR>Lessons on Wednesday, from 6pm to 9pm (beginners &amp; inter)<BR><BR>Open dancing on Friday, 9pm<BR><BR><b>TAHITI SWING</b><BR>Website : <a href=\"http://tahitiswing.fr\" target=\"_blank\">http://tahitiswing.fr</a><BR>Tel : (+689) 33 33 03<BR>Email : tahitiswing@yahoo.fr<BR>Facebook : Mur TahitiSwing<BR><BR>Address :<BR>Paradise Night Club<BR>Papeete, Tahiti, Polyn?sie Fran?aise<BR></div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(59,139.624,35.4389,'Night FIRE','<div dir=\"ltr\">https://www.facebook.com/nfyokohama<BR>WCS every Tuesday<BR>7:30pm-8:00pm Beginner<BR>8:00pm-8:50pm Intermediate<BR>8:50pm-11:00pm Social Dancing<BR>Lesson 2500JPY W1D<BR>Social 1500JPY W1D</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(61,146.819,-19.2576,'West Coast Swing in Townsville @ Movimiento','<div dir=\"ltr\">https://www.facebook.com/pages/West-Coast-Swing-Townsville<BR><BR>Thursdays 8pm-10:30pm</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(62,-87.9158,41.8622,'West Coast Wednesdays','<div dir=\"ltr\">Chicago?s West Coast Wednesdays where we dance west coast swing (WCS) every Wednesday.<BR><BR>? 7:00 ? Beginner WCS Lesson<BR>?  7:45 ?  Intermediate WCS Lesson<BR>?  8:30?11:15 (or later) ? Open Dancing<BR><BR>The cost:<BR><BR>?  $6 ? Admission to West Coast Wednesdays<BR>?  $5 ? The cost per lesson</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(63,149.123,-35.2648,'David St','Turner ACT 2612, Australia<BR><img src=\"https://cbks0.google.com/cbk?output=thumbnail&amp;w=90&amp;h=68&amp;ll=-35.264818,149.122590&amp;thumb=0\">','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(66,-89.3848,43.0368,'Madison WCS at Badger Bowl','<div dir=\"ltr\">Intermediate Lessons<BR>Intermediate lessons are offered from 7:30 to 8:00 pm at a cost of $5 per person (includes the dance at 8:00 pm).<BR><BR>Beginner Lessons<BR>Learn West Coast Swing Basics! For dates and pricing of lessons, visit the \"WCS Level 1\" link under \"Dance Lessons.\"<BR><BR>Open Dancing 8:00 - 9:30 pm<BR>The best pop, jazz, swing, blues, disco and R&amp;B. Cost: $5 per person.<BR><BR>For more info, see http://mwcsc.org/</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(67,34.7743,32.0789,'Dance Tel Aviv','<div dir=\"ltr\">Tuesday nights:<BR>98 Dizengoff St.<BR>Tel Aviv, Israel<BR><BR>Classes 8:30-10:30pm<BR>Open Dancing 10:30pm-2am or later...<BR><BR>http://www.dancetelaviv.co.il/</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(68,-93.2392,44.9343,'Social Dance Studio','<div dir=\"ltr\">WCS classes every Monday (see website for class times &amp; pricing)<BR>WCS Practice every Monday, 9p-11p, $5 cover ($3 with same day class attendance)<BR>Club Swing - 2nd Saturday of every month, lesson from 7-8p, dancing 8p-11p, cover $10 for lesson &amp; dance, $5 for dance only. </div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(69,-93.1245,44.8445,'Starks Saloon','<div dir=\"ltr\">3rd Friday West Coast Swing &amp; Variety dance, cover is $5.00, no outside beverages allowed.<BR>Country night every Wednesday and most Saturday\'s.  Check website for updated details, dates &amp; times.</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(70,-93.2392,44.9343,'Twin Cities Rebels','<div dir=\"ltr\">Classes offered on Sunday\'s at Social Dance Studio in Minneapolis.&nbsp;&nbsp;</div><div dir=\"ltr\">See TCRebels.com website for details.<BR>&nbsp;</div><div dir=\"ltr\">Dances every 1st and 3rd Sunday, 7p-1030p; cover $7 for members and students with ID, $11 for guests<BR><BR>Special Events:<BR>Spring, 2nd week of June, Anniversary Dance<BR>Fall, end of October, Masquerade Ball/Weekend</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(71,-93.162,44.9536,'Dancers Studio','<div dir=\"ltr\">Classes offered Wednesday with Practice hour from 9-10p<BR>See Website for class info, times &amp; cost.</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(72,-105.083,39.6574,'State of the Arts Dance Studio','<div dir=\"ltr\"><a href=\"http://www.sotadancedenver.com/\" target=\"_blank\">http://www.sotadancedenver.com/ </a><BR><BR>Classes Monday-Saturday for all levels.  Social dance Party Nights every 4th Friday &amp; 3rd Saturday of the Month 3265 S Wadsworth Blvd Lakewood 80227</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(73,-87.8917,42.9981,'Milwaukee Rebels Swing Dance Club','<div dir=\"ltr\"><font color=\"#ff0000\"><b>www.milwaukeerebels.com</b></font><BR><BR><font color=\"#3333ff\">Milwaukee Rebels Swing Dance Club<BR>2499 S Delaware Avenue<BR>Milwaukee, WI  53207</font><BR><BR><font color=\"#6633ff\"><b>West Coast Swing Lessons with Mike Konkel &amp; Sheli Schroeder<BR><font color=\"#000099\">Most Sundays </font><BR><font color=\"#000099\">6:30 PM Beg WCS Lesson<BR></font></b><font color=\"#000099\"><i>Members: FREE, Nonmembers: $10</i><b><BR>7:30 PM Intermediate WCS Lesson</b><BR><i>Members: $5, Nonmembers: $10</i><BR><BR><i>Optional yearly membership: $25</i></font></font><BR><font color=\"#ff0000\"><b>www.milwaukeerebels.com</b></font><BR></div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(74,-87.9066,43.0227,'Milwaukee Rebels Swing Dance Club','<font color=\"#ff0000\"><b>www.milwaukeerebels.com</b></font><BR><BR><font color=\"#3333ff\">Milwaukee Rebels Swing Dance Club<BR>Social Dance Night at Hot Water Night Club<BR>818 South Water Street<BR>Milwaukee, WI  53204</font><BR><BR><font color=\"#6633ff\"><b>2nd &amp; 4th Wednesday of the month<BR>8 PM West Coast Swing Social Dance<BR></b><i>$5 Cover Charge</i><i></i></font><BR><font color=\"#ff0000\"><b>www.milwaukeerebels.com</b></font>\n\n','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(75,115.913,-31.9485,'DSD StreetSwing','<div dir=\"ltr\">http://streetswing.com.au/<BR><BR>Headed by Jessie Vos and Madeleine Platts,  DSD Street Swing is one of Perth?s largest social dance clubs, where you will learn a smooth, creative &amp; extremely popular dance style.<BR><BR>DSD Thursdays<BR>Bar / $15 A / $10 S / Join Other New People<BR>Maylands Bowls Club<BR>50 Clarkson Rd Maylands<BR>7:30-10:15ish<BR>7:30-8:00 Beginner Class<BR>8:00-8:30 Social<BR>8:30-9:15 Beginner Revision (Room 2) + Intermediate<BR>9:15-10:15 Social<BR>We have something for all levels every week. Learn at your own pace and tick off the 8 base moves to be eligible for Intermediate class. No rush, learning is casual from week to week.<BR><BR>-DSD Open Nights-<BR>BYO / $20 Entry / Join Other New People<BR>First Friday Of Every Month<BR>Doors Open 8pm<BR>Where<BR>Mount Hawthorn Main Hall<BR>197 Scarborough Beach Road, Mt Hawthorn<BR>What<BR>New to DSD<BR>- Open Nights are perfect for new people to come and check out why so many people dance at DSD or even at all. Dance whaaaat?<BR>Expected;<BR>- Beginner tester class<BR>- BYO alcohol<BR>- Snack food provided<BR>- Performances<BR>- Great music<BR>Unexpected;<BR>* Pumped Up Kicks Edition</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(76,-97.5586,29.8406,'Austin City Dance Club, Inc.','<div>Non-profit dance membership club featuring classes and social dancing in West Coast Swing and Hustle.&nbsp;</div><div><BR>&nbsp;</div><div>Every Tuesday 6-11pm</div><div><BR>&nbsp;</div><div>Instructors: Mike Topel, Angel &amp; Debbie Figueroa, Taletha Jouzdanie and Emily Washburn</div><div><a href=\"http://austincitydanceclub.com/\" target=\"_blank\">http://austincitydanceclub.com/</a></div><div>https://facebook.com/austincitydanceclub</div><div><BR>&nbsp;</div><div><BR>&nbsp;</div><div><BR>&nbsp;</div>Austin, TX 78757<BR><img src=\"https://cbks0.google.com/cbk?output=thumbnail&amp;w=90&amp;h=68&amp;ll=30.358061,-97.738057&amp;thumb=0\">','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(77,-122.854,42.4042,'Evergreen Ballroom','<div dir=\"ltr\">Thursday Nights:<BR><BR>7-8 Lessons<BR>8-9:30 Dancing<BR><BR>$6 Adults<BR>$5 Students<BR>$3 Dance Only</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(79,-115.046,36.0798,'Rhythmic Souls','<div dir=\"ltr\">We teach out of Academy of Gymnastics and Dance<BR>1000 Stephanie Place<BR>Henderson NV 89014</div><img src=\"https://cbks0.google.com/cbk?output=thumbnail&amp;w=90&amp;h=68&amp;ll=36.079818,-115.045803&amp;thumb=0\">','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(80,-115.046,36.0798,'Rhythmic Souls Dance','<div dir=\"ltr\"><a href=\"http://www.rhythmicsouls.com\" target=\"_blank\">www.rhythmicsouls.com</a><BR><BR>We rent space all over the valley:<BR><BR>Academy of Gymnastics and Dance<BR>1000 Stephanie Place<BR>Henderson NV 89014<BR>West Coast Swing Classes on Wednesdays 7pm-9pm: $13 drop in class/$40 for 4-week session<BR><BR>Zemskov Dance Academy<BR>7835 S. Rainbow Blvd.<BR>Las Vegas, NV 89139<BR><BR>Broadway Hall<BR>3375 S. Decatur Blvd<BR>Las Vegas, NV 89102<BR>West Coast Swing parties and workshops: 7pm-12am, $16 before 8pm/$5 after 8pm: please check schedule for workshops</div><img src=\"https://cbks0.google.com/cbk?output=thumbnail&amp;w=90&amp;h=68&amp;ll=36.079818,-115.045803&amp;thumb=0\">','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(81,-73.9915,41.9552,'Hudson Valley West Coast Swing','<div dir=\"ltr\">www.HudsonValleyWCS.com Thursdays Beginner lesson 7pm - Beyond the Basics 7:45, Dance 8:30-10pm. $10 One or both classes $5 Dance</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(82,153.043,-27.5081,'Raw Connection WCS Brisbane, Australia','<div dir=\"ltr\">www.rawconnection.com.au<BR>Drop in classes every Tuesday &amp; Thursday night.<BR>7pm -10pm including social dancing. $15 nightly entry or discounted multi class passes available.</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(83,127.033,37.4963,'Westie Korea','<font face=\"arial\" size=\"2\" style=\"background-color:rgb(255, 255, 255)\">\"Westie Korea\" @ Bar Tiffany</font><div><font face=\"arial\" size=\"2\" style=\"background-color:rgb(255, 255, 255)\"><a href=\"http://www.facebook.com/groups/202425312148\" target=\"_blank\">https://www.facebook.com/groups/202425312148</a></font></div><div style=\"font-family:arial;font-size:10pt\"><span style=\"background-color:rgb(255, 255, 255)\"><BR></span></div><div style=\"font-size:10pt\"><span style=\"background-color:rgb(255, 255, 255)\"><span style=\"font-family:arial, helvetica, sans-serif\">WCS lessons and dancing every Sunday&nbsp;</span><BR><span style=\"font-family:arial, helvetica, sans-serif\">Social dancing 7:30 ~&nbsp;</span></span></div><div style=\"font-size:10pt\"><span style=\"font-family:arial, helvetica, sans-serif;background-color:rgb(255, 255, 255)\">Floor Fee 8,000 KRW (includes one beverage)</span></div><div style=\"font-size:10pt\"><BR>&nbsp;</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(84,-93.2579,45.0397,'Murzyn Hall: MWCSD','http://mnwestcoastswingdanceclub.com/<BR>Location for holiday dance (2nd Friday of December), and anniversary dance (2nd Friday of May) for MWSCD.<BR><BR>Minneapolis, MN 55421<BR><img src=\"https://cbks0.google.com/cbk?output=thumbnail&amp;w=90&amp;h=68&amp;ll=45.039722,-93.257930&amp;thumb=0\">','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(85,-104.99,39.619,'Overstreet Dance','http://www.overstreetdancegallery.com/<BR>Thursday Night West Coast Swing Dance<BR>Three Lessons (Beg., Int., &amp; Adv.): 7-8PM<BR>Social Dance: 8-11pm<BR><a href=\"http://www.overstreetdancegallery.com/prices\" target=\"_blank\">Prices:</a> $10 lesson + dance; $6 dance only; $5 students<BR><BR>3rd Saturday WCS Dance with Shane and Keri<BR><BR>Beg./Int. Lesson: 7-8PM<BR>Social Dance: 8-11pm<BR><a href=\"http://www.overstreetdancegallery.com/prices\" target=\"_blank\">Prices:</a> $10 lesson + dance; $5 dance only; $5 students for both<BR>Littleton, CO 80120<BR><img src=\"https://cbks0.google.com/cbk?output=thumbnail&amp;w=90&amp;h=68&amp;ll=39.619000,-104.989646&amp;thumb=0\">','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(86,127.025,37.5058,'Swing Bar','WCS Social dance&nbsp;<div>Every Wednesday 8:30 ~</div><div><BR>&nbsp;</div><div>Floor fee 6,000 KRW (Includes one beverage)</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(88,-123.122,49.28,'Urban Beat Dance Co.','<div dir=\"ltr\"><b>Sundays	</b><BR><ul><li><span style=\"font-size:10pt\">8:45pm - 11pm&nbsp;</span></li><li><span style=\"font-size:10pt\">$5 cover</span></li></ul><b>Tuesdays</b><BR><ul><li><span style=\"font-size:10pt\">8:30pm - 11pm</span></li><li><span style=\"font-size:10pt\">$3 cover&nbsp;</span></li></ul>Connect with Vancouver WCS dancers here:<BR><a href=\"http://www.facebook.com/groups/vancouverwcs/\" target=\"_blank\">www.facebook.com/groups/vancouverwcs/</a><BR><BR><BR></div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(89,-123.126,49.2789,'Just Wanna Dance! West Coast Swing','<div dir=\"ltr\" style=\"font-family:arial;font-size:10pt\">Vancouver\'s hottest venue for West Coast Swing dances brought to you monthly by <a href=\"http://www.vanswingthing.com\" target=\"_blank\">VanSwingThing</a>.<BR><BR><b>When:</b> 3rd Saturday of every month</div><div dir=\"ltr\" style=\"font-family:arial;font-size:10pt\"><BR>&nbsp;</div><div dir=\"ltr\" style=\"font-family:arial;font-size:10pt\"><b>Time:</b></div><div dir=\"ltr\"><ul><li><font face=\"arial\" size=\"2\"><b>Beginner lesson:</b>&nbsp;</font><span style=\"font-family:arial;font-size:small\">7:30 - 8:30pm</span></li><li><font face=\"arial\" size=\"2\"><b>Intermediate lesson:</b>&nbsp;</font><span style=\"font-family:arial;font-size:small\">7:30 - 8:30pm</span></li><li><font face=\"arial\" size=\"2\"><b>Dance:</b>&nbsp;</font><span style=\"font-family:arial;font-size:small\">8:30 - 12:30am</span></li></ul><font face=\"arial\" size=\"2\"><b><div dir=\"ltr\"><font face=\"arial\" size=\"2\"><b><BR></b></font></div>Admission:</b></font></div><div dir=\"ltr\"><ul><li><font face=\"arial\" size=\"2\"><b>Lesson:</b> $6 online, $7 at the door</font></li><li><b style=\"font-family:arial;font-size:small\">Dance:</b><span style=\"font-family:arial;font-size:small\"> $8 till 9:15pm, $10 after</span></li></ul><font face=\"arial\" size=\"2\"><b><div dir=\"ltr\" style=\"color:rgb(102, 0, 204)\"><font color=\"#6600cc\" face=\"arial\" size=\"2\"><b><BR></b></font></div><font color=\"#ff0000\">Note:</font></b><font color=\"#ff0000\"> entrance is on Helmcken under the Rhodes College sign.</font></font></div><div dir=\"ltr\"><font color=\"#6600cc\" face=\"arial\" size=\"2\"><BR></font></div><div dir=\"ltr\"><font color=\"#6600cc\" face=\"arial\" size=\"2\"><BR></font></div><div dir=\"ltr\"><font face=\"arial\" size=\"2\">Connect with Vancouver WCS dancers here:</font></div><div dir=\"ltr\"><font face=\"arial\" size=\"2\"><a href=\"http://www.facebook.com/groups/vancouverwcs/\" target=\"_blank\">www.facebook.com/groups/vancouverwcs/</a></font></div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(90,144.985,-37.7944,'WCS Melbourne','<div dir=\"ltr\" style=\"font-family:arial;font-size:10pt\"></div><div><div><div><font face=\"arial\" size=\"2\">WCS Melbourne run Thursday night classes.</font></div><div><font face=\"arial\" size=\"2\">http://wcsmelbourne.com.au/</font></div><div><font face=\"arial\" size=\"2\">https://www.facebook.com/WCSMelbourne</font></div><div><font face=\"arial\" size=\"2\"><BR></font></div><div><font face=\"arial\" size=\"2\">What?s New?</font></div><div><font face=\"arial\" size=\"2\">? Mentoring session: At 7:30pm and 8:30pm Brett and Samantha are at your disposal to answer any questions and help with any patterns or technique you?re having trouble with. We?re introducing these one-on-one mentoring times especially for beginners.</font></div><div><font face=\"arial\" size=\"2\">? Brett and Samantha teaching every week: You asked for it, you got it! We know you love them individually but together the class always twice as fun, with a great routine, and thorough teaching.</font></div><div><font face=\"arial\" size=\"2\">? 45 minute classes: Not too long, not too short, and still plenty of time for social dancing</font></div><div><font face=\"arial\" size=\"2\">? DJ slot: the last 30 minutes is open for any budding DJ?s! Just let Brett and Sammi know if you?d like to DJ the following week and bring along a playlist on your iPod</font></div><div><font face=\"arial\" size=\"2\"><BR></font></div><div><font face=\"arial\" size=\"2\">So Thursday nights will now look like this:</font></div><div><font face=\"arial\" size=\"2\">7:30pm Doors open for social dancing, warm up and mentoring</font></div><div><font face=\"arial\" size=\"2\">7:45pm Beginner class</font></div><div><font face=\"arial\" size=\"2\">8:30pm Social dancing and mentoring</font></div><div><font face=\"arial\" size=\"2\">8:45pm Intermediate class</font></div><div><font face=\"arial\" size=\"2\">9:30-10:00pm Social dancing</font></div><div><font face=\"arial\" size=\"2\"><BR></font></div><div><font face=\"arial\" size=\"2\">$17 for the whole night (includes 2 classes, mentoring and social dancing)</font></div><div><font face=\"arial\" size=\"2\">$9 social only (9:30-10pm)</font></div><div style=\"font-family:arial;font-size:10pt\"><BR>&nbsp;</div></div></div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(91,144.954,-37.8095,'Barefoot Swing','<div><font face=\"arial\" size=\"2\">Barefoot Swing</font></div><div><font face=\"arial\" size=\"2\">Monday night classes</font></div><div><font face=\"arial\" size=\"2\"><BR></font></div><div><font face=\"arial\" size=\"2\">7:00pm - 7:30pmDoors Open &amp; Social Dancing</font></div><div><font face=\"arial\" size=\"2\">7:30pm - 8:15pmIntermediate Class</font></div><div><font face=\"arial\" size=\"2\">8:15pm - 8:30pmSocial Dancing Break</font></div><div><font face=\"arial\" size=\"2\">8:30pm - 9:15pmBeginner &amp; 1st Timer\'s Class</font></div><div><font face=\"arial\" size=\"2\">9:15pm - 11:00pmSocial Dancing &amp; Partaay!!</font></div><div><font face=\"arial\" size=\"2\">11:00pm - 12:00amJoin us at the bar!</font></div><div><font face=\"arial\" size=\"2\"><BR></font></div><div><font face=\"arial\" size=\"2\">$15 all night</font></div><div><font face=\"arial\" size=\"2\"><BR></font></div><div><font face=\"arial\" size=\"2\">MELBOURNE CITY BOWLS CLUB</font></div><div><font face=\"arial\" size=\"2\">FLAGSTAFF GARDENS / DUDLEY ST, WEST MELBOURNE</font></div><div><font face=\"arial\" size=\"2\">(PARKING AVAILABLE ON &amp; AROUND DUDLEY ST)</font></div><div style=\"font-family:arial;font-size:10pt\"><BR>&nbsp;</div>','unprocessed','2014-01-21 23:30:33','2014-06-05 07:17:18'),
	(92,24.1323,56.9523,'West Coast Swing Latvia parties','<div dir=\"ltr\">Every Tuesday at 20:00 in Cafe \"Ol?ve\"<BR>Gertrudes Street 56, Riga</div>','processing','2014-01-21 23:30:33','2014-06-05 07:17:27'),
	(93,-76.9687,39.0554,'Hollywood Ballroom','','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(94,-157.819,21.2776,'Ala Wai Palladium','<div dir=\"ltr\">Golf Course Clubhouse, 2nd Floor<BR>404 Kapahulu Ave, Honolulu, HI<BR><BR>May through August there will be dances on the 2nd and last Sundays of the month.<BR><BR>6:30 - 9:15 PM  SDCH Dance<BR><BR>We start with a half hour WCS dance lesson  at 6:30<BR><BR>Bert Burgess play a variety of music to dance to -  WCS, Hustle, NC2 Step, Country 2 step, Waltz, Cha Cha,  Salsa<BR><BR>A light snack, usually pizza, is provided<BR><BR>Members $5<BR>Non Members $8<BR><BR>http://swingdanceclubhawaii.org/Dance_Schedule_and_Events.html</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(95,139.697,35.688,'TOKYO WCS BASE!','<div dir=\"ltr\">The 2nd Saturday of the month </div><div dir=\"ltr\">http://www.tokyoswinggang.com/</div><div dir=\"ltr\">https://www.facebook.com/groups/164559766951293<BR><BR>?SCHEDULE?OPEN19:00-CLOSE23:00<BR>?19:00-20:00 Lesson by.JOSE&amp;AYA @1,000yen (biginner/intermediate?<BR>?20:00-23:00 Party @1,500yen<BR>??Soft drink:charge of free / Beer:300yen<BR>??You can bring any drinks and food.<BR><BR>?PLACE?Shin-Tokyo Building B1 Floor.<BR>?ADD: 1-19-8 Nishi-shinjuku Shinjuku-ku TOKYO, JAPAN<BR>?ACCESS: 5 minutes walk from \"South Exit\"<BR>????? ???at JR / Odakyu / Keio Shinjuku Station<BR>??1F=\"KAMO\" soccer shop<BR>??http://www.sskamo.co.jp/company/store/shinjuku.html<BR>??Pls do not use the stairs but come by an elevator to the B1.</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(96,-75.3921,39.9172,'Sangha Space','<div dir=\"ltr\">First Sunday and Every Tuesday, see details below or at www.robandsheiladance.com<BR><BR>West Coast Swing Every Tuesday<BR>with Rob and Sheila<BR><BR>7:30-8:30 West Coast Swing Intermediates<BR>8:30-9:30 West Coast Swing for Life<BR>9:30-11:00ish FREE WCS practica<BR>.Stay after class and practice what you are learning or just come out and join in the fun of the dance.<BR><BR>The Swing Loft<BR>First Sundays 5PM - 9:30PM<BR>with Rob and Sheila<BR><BR>5:00-5:30<BR>pm<BR>Doors open. Meet and greet.<BR>5:30-6:15pm<BR>All level dance lesson.<BR>We mostly teach WCS here but we do<BR>add in a few other dance lessons at times. There?s something<BR>for everyone from the absolute beginner to the more advanced<BR>dancers in our lessons! No Partner needed<BR>.<BR>Newcomers welcome!<BR>.<BR>6:15-9:30pm (at least!) WE DANCE<BR>! We play lots of WCS: contemporary, blues,<BR>rhythm &amp; blues, time honored favorites and more<BR>.<BR>Everyone welcome. No partner needed. Free parking on the streets and in the garage on<BR>the corner of Olive St. and Baltimore Av.<BR>COST: $12 per person; $6 undergrad students with valid ID. Includes refreshments and<BR>beverages. BYOB and your friends and make it a party!<BR><BR>NOTE: Cost can vary when we have guest instructors in to visit. Check our website often for our schedule.</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(97,-75.0669,39.9155,'Collingswood Cloud Masonic Lodge','<div dir=\"ltr\">West Coast Swing: 3rd Saturday and 4th Friday<BR><BR>Watermelon Dance<BR><BR>Every 3rd Saturday<BR><BR>Our DJs play a great mix of blues, rhythm and blues, contemporary, and more for a great night of dancing.<BR><BR>There will also be snacks, beverages, and free parking (no alcohol please).<BR><BR>Schedule:<BR>7:30 ? 8:00 All Level Workshop<BR>8:00 ? 8:30 Free Introduction Lesson in West Coast Swing<BR>8:30 ? 12:30am Dancing!<BR><BR>($10 for club members,<BR>$12 for non-members).<BR>First visit FREE.<BR><BR>http://delval.wordpress.com/<BR><BR>4th Fridays at the Lodge<BR><BR>8:15-8:30 Doors open for meet and mingle<BR>8:30-9:15 All level WCS lesson<BR>9:15 til 12:30 Dance, Dance, Dance !!!<BR><BR>$12 (includes lesson, dancing, snacks and beverages, no alcohol please)</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(98,-74.9252,39.8926,'Dance Time Of NJ','<div dir=\"ltr\">2nd Fridays Westie Friday at Dance Time of NJ<BR>8:30 PM - 1:00AM<BR>$12<BR><BR>3003 Lincoln Dr West, Suites C,D, Marlton, NJ 08053</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(99,-122.768,45.4298,'The Ballroom Dance Company','<a href=\"http://www.theballroomdancecompany.com/ThisWeeksClassesPortlandOregonBallroomDancing.shtml\" target=\"_blank\">http://www.theballroomdancecompany.com</a><BR><BR>Check website for schedule updates<BR><BR><b>Thursdays<BR></b><ul><li>8:00-9:30pm - Dancing with Jimmy Ho</li><li>$3 cover</li></ul><p><b>Sunday</b></p><ul><li>Beginner Lessons 7pm-7:30pm</li><li>Dance 7:30pm - 10:00pm</li><li>$5 cover<BR></li></ul>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(100,-73.9834,40.7571,'Strictly Tuesdays at Connolly\'s','<div dir=\"ltr\">www.strictlywestie.com<BR>www.nowdancing.com<BR><BR>8:30 pm - 12:30 am Dance<BR>7:30 pm Beginner and Int/Adv. Lessons<BR><BR>Connolly\'s Bar and Restaurant | 121 West 45th Street, Third Floor (Between Sixth Avenue &amp; Broadway)<BR><BR>Please contact organizer to confirm whether there is a dance as it is subject to change</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(101,-73.9862,40.749,'Gotham Soul','<div dir=\"ltr\">www.gothamswingclub.org<BR><BR>First Saturday of Every Month<BR>9:00 pm -12:30 am<BR><BR>Dancesport Studios | 22 West 34th Street, Fourth Floor (Between Fifth &amp; Sixth Avenue)<BR><BR>Please contact organizer to confirm whether there is a dance as it is subject to change.</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(102,-73.9902,40.741,'West Coast Wednesdays','<div dir=\"ltr\">www.dancemanhattan.com<BR><BR>West Coast Wednesday with DJs Anthony DeRosa, Jeanette Holmes and John Lindo<BR><BR>9:00 pm - 12:00 am<BR>Dance Manhattan | 39 West 19th Street, Fifth Floor (Between Fifth &amp; Sixth Avenue)<BR><BR>Please contact organizer to confirm whether there is a dance as it is subject to change.<BR>&nbsp;</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(103,-73.9951,40.75,'Platinum Party WCS & Hustle','<div dir=\"ltr\">www.swingshoes.net<BR>Third Friday of Every Month<BR>9:30 pm - 12:30am<BR>Club 412 - You Should Be Dancing | 412 Eighth Avenue, Fourth Floor (Between 30th &amp; 31st Streets)<BR>Free Beginner Crash Course: 9:00 pm</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(104,-73.9902,40.7444,'Cali Mix Practice Dance at Stepping Out Studios','<div dir=\"ltr\">www.steppingoutstudios.com<BR>Every Monday 9:30 pm - 11:00 pm<BR>Stepping Out Studios | 37 West 26th Street, Ninth Floor (Between Broadway &amp; 6th Avenue)</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(105,-73.3231,40.8389,'Monthly Dance with DJ Anthony DeRosa','www.wcsny.com','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(106,-113.455,53.5433,'West Coast Swing Addicts - Edmonton','<div dir=\"ltr\">West Coast Swing Addicts (Edmonton) is a group of enthusiastic dancers dedicated to providing a fun and friendly place for people to practice, learn, and enjoy West Coast Swing Dancing.<BR><BR>Info on West Coast Swing Addicts - Edmonton FB page</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(107,-119.8,36.7773,'STUDIO 65','','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(108,-80.0024,40.4302,'Absolute Ballroom','<div dir=\"ltr\">Tuesday Nights for more info http://pghwcs.com/</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(109,-108.502,45.7871,'Billings Community Center','<div dir=\"ltr\">West Coast Swing Montana<BR>Monthly Social Dance, $5/person.<BR><BR><a href=\"http://wcsmontana.com/wcs/?page_id=466\" target=\"_blank\">Schedule for lessons and dances.</a><BR><BR><a href=\"http://www.wcsmontana.com\" target=\"_blank\">www.wcsmontana.com</a><BR><BR><a href=\"https://www.facebook.com/pages/West-Coast-Swing-Montana/109823322410541?fref=ts\" target=\"_blank\">Facebook</a><BR></div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(110,-21.8952,64.1353,'Reykjavik','Check out www.haskoladansinn.is and www.westcoastswing.is for venues and times. Looking forward to seeing you!<BR>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(111,-122.402,37.7653,'Mike Pyle\'s Bayside Swing','<div dir=\"ltr\">SUNDAY MONTHLY LESSON &amp; DANCE Check site for details.</div><div dir=\"ltr\"><span style=\"font-size:10pt\">&nbsp;</span></div><div dir=\"ltr\"><a href=\"http://audiopyle.com/baysideswing.html\" target=\"_blank\">http://audiopyle.com/baysideswing.html</a><BR><BR><span style=\"font-size:10pt\">LESSON: 6:00-7:00 PM</span></div><div dir=\"ltr\">DANCE: &nbsp; 7:00-10:30 PM</div><div dir=\"ltr\"><BR>$10 LESSON ONLY</div><div dir=\"ltr\">$15 LESSON&amp;DANCE</div><div dir=\"ltr\">$10 DANCE ONLY&nbsp;</div>\n\n','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(113,-122.118,47.6726,'DanceWorks Studio','<div dir=\"ltr\">Beginner WCS classes on Friday evenings. Intermediate/Advanced WCS classes on Monday evenings. Drop-in and monthly rates.<BR><BR>WCS dance party last Friday of the month.  Party starts at 9:15 with lesson beforehand at 8:30pm.<BR><BR>Fun &amp; friendly atmosphere. Occasional live music events.<BR><BR>More info: www.danceworksstudio.com</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(114,-78.5742,34.958,'Loafers Beach Club','<div dir=\"ltr\">605 Creekside Drive, Raleigh, NC 27609<BR>919-743-5332<BR>loafers@bellsouth.net<BR>www.loafersbeachclub.com<BR>Wednesday Nights: 5:45pm - 12:30am (shag and wcs. wcs dancers get there around 8pm usually)<BR><BR>Friday nights: all wcs 8pm -2 am<BR><BR>$6/the night members<BR>$8/the night guests<BR>$20/year membership</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(115,-156.485,20.9046,'West Coast Swing Maui','310 HoOkahi St Wailuku, HI 96793<BR><img src=\"https://cbks0.google.com/cbk?output=thumbnail&amp;w=90&amp;h=68&amp;ll=20.904600,-156.485292&amp;thumb=0\"><img src=\"https://cbks0.google.com/cbk?output=thumbnail&amp;w=90&amp;h=68&amp;ll=20.904600,-156.485292&amp;thumb=0\"><div><a href=\"https://www.facebook.com/WestCoastSwingMaui?fref=ts\" target=\"_blank\">https://www.facebook.com/WestCoastSwingMaui?fref=ts</a></div><div>Sunday Nights from 6:30 - 9:30PM</div><div>Beginner Lesson 6:30 - 7:15PM</div><div>Intermediate Lesson 7:15 - 8:00PM</div><div>Open Dancing 8:00PM - 9:30PM</div><div><BR>&nbsp;</div><div>$12 for Beginner, Intermediate Lesson and Social Dancing!</div><div>$8 for Students (18-24)</div><div>$5 for Social Dancing</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(116,-79.4298,43.6627,'T.O. West Coast Swing','805 Dovercourt Rd<BR>Toronto, ON M6H 2X4, Canada<BR><BR>Every Tuesday Night<BR><BR>6:30 - 7:15 HD Class<BR>7:15 - 8:00 Intermediate<BR>8:00 - 8:45 Beginner<BR>9:00 - 12:00 - Dancing.<BR><BR>Free Beginner Class first Tuesday of the month.<BR><BR>For more information on the Toronto scene go to <a href=\"http://towestcoast.com/\" target=\"_blank\">http://towestcoast.com/ </a><BR><BR><BR>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(117,-104.977,39.7413,'Denver Turnverein','<div dir=\"ltr\">Rocky Mountain Swing Dance Club<BR>every Sunday, Lesson from 5:30 -6:30 PM Free Beginner lessons, Beginner+ lessons $4 member, $5 non-member<BR>Dance from 6:30 - 9:30 PM<BR>$6 members, $10 non-members<BR>coloradoswingdance.org<BR></div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(118,21.4897,65.3138,'Summer Social WCS','Social WCS Juli 8,15, 22<BR>18.30-20.30<BR>Free &amp; Drop In<BR>Storgatan 3<BR>941 31 Pite?, Sweden<BR><img src=\"https://cbks0.google.com/cbk?output=thumbnail&amp;w=90&amp;h=68&amp;ll=65.313762,21.489684&amp;thumb=0\">','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(119,-105.065,39.8908,'The Westin Westminster','The Westin Westminster<BR>10600 Westminster Boulevard, Westminster, CO 80020<BR>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(120,-121.268,38.6422,'7997 California Ave','Fair Oaks, CA 95628<BR><img src=\"https://cbks0.google.com/cbk?output=thumbnail&amp;w=90&amp;h=68&amp;ll=38.642196,-121.267632&amp;thumb=0\">','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(121,-77.1102,39.0015,'Womans Club Of Bethesda','<div>West Coast Swing lessons and dance Tuesday nights. Beginners welcome.</div><div>Contact Frank <a target=\"_blank\">boogieinbethesda@aol.com</a> or BoogieInBethesda on facebook.</div><div>&nbsp;</div><div><a href=\"http://www.boogieinbethesda.com/\" target=\"_blank\">http://www.boogieinbethesda.com/</a></div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(122,-77.1066,39.0444,'Avant Garde Ballroom Dance Center','<div dir=\"ltr\">Saturdays. Lesson 8pm / dance 9pm-1am. Contact boogieinbethesda@aol.com or BoogieInBethesda on facebook.</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(123,-85.4077,31.2034,'Dothan - Circle City Westies','<div dir=\"ltr\">https://www.facebook.com/DothanWCS?fref=ts</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(124,-87.2095,30.4297,'Pensacola, FL - Coastal Westies','<div dir=\"ltr\">https://www.facebook.com/CoastalWesties<BR><BR>for more styles of dancing visit our group:<BR>https://www.facebook.com/groups/dancinginpensacola/</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(125,2.40027,48.8489,'Temple du Swing, au Club de la Nation','<div>Cours r?guliers 4 niveaux</div><div>Regulars lessons, 4 levels</div><div>&nbsp;</div><div>Soir?es &amp; stages mensuels</div><div>Monthly parties &amp; workshops</div><div>&nbsp;</div><div>Allez voir sur / Go and see : <a href=\"http://www.templeduswing.com\" target=\"_blank\">http://www.templeduswing.com</a> </div><div>&nbsp;</div><div>Club de La Nation</div><div>5, rue de Lagny</div><div>75020 Paris<BR><img src=\"https://cbks0.google.com/cbk?output=thumbnail&amp;w=90&amp;h=68&amp;ll=48.848914,2.400271&amp;thumb=0\"></div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(126,6.19229,46.1886,'Salsavirus Geneva','','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(127,5.32295,60.3867,'Westie by the west coast','<img src=\"http://wcsbergen.com\">Universitetet i Bergen, 5007 Bergen, Norge<BR><img src=\"https://cbks0.google.com/cbk?output=thumbnail&amp;w=90&amp;h=68&amp;ll=60.386653,5.322951&amp;thumb=0\"><BR><BR><BR><BR><BR><BR><BR><BR><BR>www.wcsbergen.com<BR><BR><div style=\"width:625px;min-height:155px\"><div><p><BR><span>BSI dans is happy to welcome you all to a great weekend of west coast swing! We are proud to present our instructors</span></p><BR><p><BR><span> for this event, all the way from the United Kingdom: </span></p><BR><p><BR><span>Steve Hunt and Rachel Martin!</span></p><BR></div></div><BR>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(128,5.32295,60.3867,'www.wcsbergen.com','November 15-17th.<BR><BR>BSI dans is happy to welcome you all to a great weekend of west coast swing.<BR>We are proud to present our instructors from UK. Steve Hunt &amp; Rachel Martin!<BR><BR><a href=\"https://www.facebook.com/events/525405990856612/\" target=\"_blank\">Facebook</a> page here.<BR><BR><img src=\"https://cbks0.google.com/cbk?output=thumbnail&amp;w=90&amp;h=68&amp;ll=60.386653,5.322951&amp;thumb=0\">','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(129,127.018,37.5153,'19-8 Jamwon-dong (78 Naruteo-ro)','Seocho-gu, Seoul, South Korea<div>3 floor Sherry Kwon Dance School.</div><div><BR>&nbsp;</div><div>West Coast Swing Lesson and Dancing every Sat with WCSwing Pros.</div><div><BR>&nbsp;</div><div>Time &nbsp; : 8:00pm~</div><div>Ticket : 10,000 krw</div><div><BR>&nbsp;</div><div>Our Facebook Group &amp; Korea Open Page</div><div><a href=\"https://www.facebook.com/groups/koreaopenswingdance/\" target=\"_blank\">https://www.facebook.com/groups/koreaopenswingdance/</a></div><div><a href=\"https://www.facebook.com/KoreaOpenSwingDanceChampionships\" target=\"_blank\">https://www.facebook.com/KoreaOpenSwingDanceChampionships</a></div><div><BR>&nbsp;</div><div>Many Event &amp; Fun Dancing !!</div><div><BR><img src=\"https://cbks0.google.com/cbk?output=thumbnail&amp;w=90&amp;h=68&amp;ll=37.515334,127.018316&amp;thumb=0\"></div>','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(130,-122.287,47.8192,'The Verve Ballroom','','unprocessed','2014-01-21 23:30:33','2014-04-29 15:57:48'),
	(131,0,0,'',NULL,NULL,'0000-00-00 00:00:00','2014-06-02 13:00:57');

/*!40000 ALTER TABLE `scraps` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table venues
# ------------------------------------------------------------

DROP TABLE IF EXISTS `venues`;

CREATE TABLE `venues` (
  `venue_id` int(11) NOT NULL AUTO_INCREMENT,
  `venue_name` varchar(70) NOT NULL DEFAULT '',
  `venue_minimum_age` varchar(15) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;

LOCK TABLES `venues` WRITE;
/*!40000 ALTER TABLE `venues` DISABLE KEYS */;

INSERT INTO `venues` (`venue_id`, `venue_name`, `venue_minimum_age`, `venue_type`, `venue_web_links`, `venue_address_1`, `venue_address_2`, `venue_city`, `venue_state`, `venue_postal_code`, `venue_country`, `venue_latitude`, `venue_longitude`, `venue_description`, `venue_special_notes`, `venue_status`, `venue_member_id`, `venue_contact_email`, `venue_time_created`, `venue_time_updated`)
VALUES
	(4,'The Clubhouse','None','Dance Studio','http://www.theclubhousedancestudio.com;http://www.ocwcsdc.com','733 Dunn Way','','Placentia','CA','92870','United States of America',33.8622,-117.88,'Owned by DJ Jack Smith and Rachele Smith.','','pending approval',1,'','2014-04-30 00:59:34','2014-04-30 01:01:43'),
	(5,'Sonny Watson\'s Street Swing Club','None','Bar','http://www.streetswing.com/','7338 Canby Ave','','Reseda','CA','91335','United States of America',34.204,-118.534,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-04-30 01:44:36','2014-04-30 01:44:36'),
	(7,'Hacienda Hotel and Double H Club','None','Bar','','525 N Sepulveda Blvd','','El Segundo','CA','90245','United States of America',33.9232,-118.397,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-04-30 02:32:00','2014-04-30 02:32:00'),
	(9,'Atomic Ballroom','None','Dance Studio','','17961 Sky Park Cir','','Irvine','CA','92614','United States of America',33.69,-117.863,'','','pending approval',1,'','2014-06-01 18:21:46','2014-06-01 18:21:46'),
	(10,'WnY Warehouse','None','Dance Studio','http://www.wnywarehouse.com/','64 Digital Drive','','Novato','CA','94949','United States of America',38.071,-122.531,'','','pending approval',1,'','2014-06-01 18:23:53','2014-06-02 07:13:34'),
	(11,'Two Left Feet','None','Dance Studio','http://www.twoleftfeet.com/','194 Diablo Rd.','','Danville','CA','94526','United States of America',37.8231,-122,'','','pending approval',1,'','2014-06-01 18:25:47','2014-06-01 18:25:47'),
	(12,'Paragon Dance Center','None','Dance Studio','http://www.paragondance.net/','931 E. Elliot Rd, Suite 101','','Tempe','AZ','85284','United States of America',33.3479,-111.927,'','','pending approval',1,'','2014-06-01 18:27:31','2014-06-01 18:27:31'),
	(13,'Arthur Murray Dance Studio','None','Dance Studio','','1210 E. Indian School Road','','Phoenix','AZ','85014','United States of America',33.4952,-112.056,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-01 18:29:47','2014-06-01 18:29:47'),
	(14,'Opera House Saloon','None','Dance Studio','','411 Lincoln St','','Roseville','CA','95678','United States of America',38.7522,-121.285,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-01 18:32:16','2014-06-01 18:32:16'),
	(15,'Studio One Ballroom','None','Dance Studio','http://www.studiooneballroom.com/','707 Wall Street','','Chico','CA','95928','United States of America',39.7276,-121.835,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-01 18:33:11','2014-06-02 17:57:38'),
	(16,'Starlight Dance Studio','None','Dance Studio','http://www.starlightdance.com/','6506 El Cajon Blvd Aragon Plaza Shopping Center','','San Diego','CA','92115','United States of America',32.767,-117.06,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-01 18:35:33','2014-06-01 18:35:33'),
	(17,'Tango Del Rey','None','Dance Studio','http://www.tangodelrey.com/','3567 Del Rey St','','San Diego','CA','92109','United States of America',32.8037,-117.214,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-01 18:37:14','2014-06-01 18:37:14'),
	(18,'UCSB Robertson Gymnasium 2320','None','Other','https://www.facebook.com/groups/UCSBWCS/;http://www.aw.id.ucsb.edu/maps/images/aw_pdfs/RobGym_UCSB.pdf','UCSB Robertson Gymnasium','','Isla Vista','CA','93117','United States of America',34.4162,-119.849,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-01 18:43:50','2014-06-01 18:43:50'),
	(19,'The May I Studio','None','Dance Studio','http://www.mayihavethisdance.com','5246 N. Elston Avenue','','Chicago','IL','60630','United States of America',41.9762,-87.7536,'','Phone:773.635.3000','pending approval',1,'cara.mcilnay@gmail.com','2014-06-01 18:45:56','2014-06-02 09:55:55'),
	(20,'Century Ballroom','None','Dance Studio','http://www.centuryballroom.com','915 E Pine Street, 2nd Floor','','Seattle','WA','98122','United States of America',47.6149,-122.32,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 15:30:29','2014-06-02 06:37:51'),
	(21,'Avant Garde Ballroom','None','Dance Studio','http://www.avantgardeballroom.com/','4220 Scott Place','','Newport Beach','CA','92660','United States of America',33.6662,-117.866,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 15:39:04','2014-06-02 07:13:39'),
	(23,'Dance Boston','None','Dance Studio','http://www.danceboston.com/;https://www.facebook.com/groups/18362946501/','56 Pond Lane','','Arlington','MA','02474','United States of America',42.4116,-71.1519,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 15:48:02','2014-06-02 15:48:02'),
	(24,'The Dancing Fools','None','Other','','50 Church Street','','Cambridge','MA','02138','United States of America',42.3742,-71.1206,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 15:49:49','2014-06-02 15:49:49'),
	(25,'The Swing Dance Studio','None','Dance Studio','http://www.theswingdancestudio.com;https://www.facebook.com/groups/373162002756097/','51 Walden St','','Concord','MA','01742','United States of America',42.459,-71.349,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 15:51:22','2014-06-02 15:51:22'),
	(26,'Shall We Dance','None','Dance Studio','http://tsdc.net/','4101 E Grant Rd','','Tucson','AZ','85712','United States of America',32.251,-110.905,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 16:01:47','2014-06-02 16:01:47'),
	(27,'The Dance Loft','None','Dance Studio','https://www.facebook.com/groups/thedanceloft/','2475 3rd St. Suite 311','','San Francisco','CA','94107','United States of America',37.7583,-122.388,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 16:03:40','2014-06-02 16:03:40'),
	(28,'Peninsula Italian American Social Club','None','Dance Studio','','100 North B Street ','','San Mateo','CA','94401','United States of America',37.569,-122.326,'','Contact Information:\r\nMichelle Kinkaid- Tel: (415) 585-6282\r\nEmail: wcdancer@ix.netcom.com','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 16:06:01','2014-06-02 16:06:01'),
	(29,'Crystal Blue Ballroom','None','Dance Studio','http://www.tbwcsa.com/','10527 Park Blvd','','Seminole','FL','33772','United States of America',27.8403,-82.7854,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 16:12:13','2014-06-02 16:12:13'),
	(30,'Garden Hills Community Center','None','Other','','307 Pine Tree Drive NE','','Atlanta','GA','30305','United States of America',33.8296,-84.3771,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 16:18:42','2014-06-02 16:18:42'),
	(31,'Bayou Dance Club','None','Dance Studio','http://www.bayoudanceclub.com/','6541 102nd Ave N','','Pinellas Park','FL','33782','United States of America',27.8655,-82.7278,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 16:22:24','2014-06-02 16:22:24'),
	(32,'Sultry Swing Dance Studio','None','Dance Studio','http://www.sultryswing.com/','2250 Palm Beach Lakes Blvd 112','','West Palm Beach','FL','33409','United States of America',26.7098,-80.0967,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 16:23:45','2014-06-02 16:23:45'),
	(33,'Murrells','None','Dance Studio','http://www.sultryswing.com/','Undercliffe Road','','Boscombe','BC','BH5 1BN','United Kingdom',50.7198,-1.84306,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 16:29:27','2014-06-02 10:47:00'),
	(34,'Trondheim Swing Club','None','Dance Studio','','Kjøpmannsgata 12','','Trondheim','','7013','Norway',63.429,10.4003,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 16:39:18','2014-06-02 07:39:40'),
	(35,'Cia de dança adriel rocha','None','Dance Studio','','Rua Carapinima, 1825 Benfica','','Fortaleza','','','Brazil',-3.73736,-38.5374,'Cia Soul Dan a is an\r\ninitiative of the teachers Bruno Lineker & Clau Batista for dance\r\nsocialization and contribution for the West Coast Swing\'s insertion (Main\r\nRhythm of the Company) in Fortaleza City.','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 16:46:28','2014-06-02 16:47:29'),
	(36,'Radisson Blu Edwardian Hotel','None','Other','','140 Bath Rd','Hayes, ','Middlesex ','','UB3 5AW','United Kingdom',51.481,-0.441414,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 16:55:47','2014-06-02 16:55:47'),
	(37,'Chalmers Dance Society','None','Dance Studio','','Sven Hultins gata 2','','Göteborg','','41258','Sweden',57.6893,11.9735,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 16:58:22','2014-06-02 16:58:22'),
	(38,'Centre at North Park','None','Dance Studio','','10040 West. Addison Avenue','','Franklin Park','IL','60131','United States of America',41.9438,-87.877,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 16:59:45','2014-06-02 16:59:45'),
	(39,'South Town Swing','None','Dance Studio','http://www.southtownswing.com/;https://www.facebook.com/groups/southtownswing/','116 West Center St','','Provo','UT','84061','United States of America',40.2972,-111.698,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 17:02:20','2014-06-02 17:02:20'),
	(40,'Allegro Ballroom','None','Dance Studio','http://allegroballroom.com/','5855 Christie Ave','','Emeryville','CA','94608','United States of America',37.8397,-122.296,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 17:16:44','2014-06-02 17:16:44'),
	(41,'Next Generation Monthly','None','Dance Studio','http://www.nextgenswingdance.com/','236 West Portal Avenue, PMB 329','','San Francisco','CA','94127-1423','United States of America',37.7346,-122.464,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 17:18:29','2014-06-02 17:18:29'),
	(42,'Cheryl Burke Dance Mountain View','None','Dance Studio','http://www.cherylburkedance.com/mountain-view','1400 North Shoreline Blvd.','A-1','Mountain View','CA','94043','United States of America',37.3969,-122.082,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 17:20:27','2014-06-02 17:20:27'),
	(43,'Dance Boulevard','None','Dance Studio','http://www.danceboulevard.com/west-coast-swing/','1824 Hillsdale Avenue','','San Jose','CA','95124','United States of America',37.262,-121.918,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 17:21:58','2014-06-02 17:21:58'),
	(44,'Bend Dance','None','Dance Studio','http://www.benddance.com/','Somewhere','','SW Bend','OR','','United States of America',44.0404,-121.308,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 18:58:14','2014-06-02 18:58:14'),
	(45,'Sons of Norway','None','Other','http://www.sofn.com/','549 NW Harmon Blvd','','Bend','OR','97701','United States of America',44.0557,-121.326,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 19:05:05','2014-06-02 19:05:05'),
	(46,'Studio B','None','Dance Studio','https://www.facebook.com/WCSIsrael','Tel Aviv','','Tel Aviv','','','Israel',32.0853,34.7818,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 19:12:47','2014-06-02 19:12:47'),
	(47,'Mosaic Dance Pte. Ltd.','None','Dance Studio','http://www.mosaicdance.com.sg/','520 North Bridge Road Level 5','','Wisma Alsagoff','','188742','Singapore',1.35208,103.82,'Tel: +65 6884 5440 \r\nEmail: info@mosaicdance.com.sg','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 21:13:59','2014-06-02 21:13:59'),
	(48,'Jitterbugs Swingapore','None','Dance Studio','','Handy Rd','','Kallang','','229233','Singapore',1.29945,103.848,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 21:18:24','2014-06-02 21:18:24'),
	(49,'Broadway Hall','None','Dance Studio','','3375 S Decatur Blvd','','Las Vegas','NV','89102','United States of America',36.1287,-115.209,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 21:32:01','2014-06-02 21:32:01'),
	(50,'swingFX','None','Dance Studio','','Lower Ground Floor ','Via Basin View Lane 3 Korma Lane Panmure','Auckland','','','New Zealand',-36.8998,174.854,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 21:36:03','2014-06-02 21:36:03'),
	(51,'Lewisham Hotel','None','Dance Studio','https://www.facebook.com/dancewcsa','794 Parramatta Rd','Lewisham','New South Wales','','2049','Australia',-33.8902,151.147,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 21:42:58','2014-06-02 21:42:58'),
	(52,'Toon Town Tavern','18 and over','Bar','','3330 Fairlight Drive Saskatoon','','Saskatoon','SK',' S7M 3Y4','Canada',52.1274,-106.725,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 21:50:25','2014-06-02 21:50:25'),
	(53,'Haysboro Community Centre','None','Other','','1204-89th Avenue SW','','Calgary','AB','T2V','Canada',50.9739,-114.088,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-02 21:55:54','2014-06-04 06:57:53'),
	(56,'PARRAMATTA RSL CLUB','None','Other','http://www.parramattarsl.com.au/','O\'Connell St','','Parramatta ','','NSW 2150','Australia',-33.8113,151.001,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 16:47:23','2014-06-04 07:49:48'),
	(57,'China Harbor Restaurant','None','Other','',' 2040 Westlake Ave N','','Seattle','WA','98109','United States of America',47.6374,-122.34,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 17:01:34','2014-06-04 17:01:34'),
	(58,'Kirkland Dance Center','None','Dance Studio','','835 7th Ave','','Kirkland','WA','98033','United States of America',47.6802,-122.192,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 17:04:35','2014-06-04 17:04:35'),
	(59,' B-Dale club','None','Other','','2100 Dale St. N','','Roseville','MN','55113','United States of America',45.0044,-93.1257,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 17:07:39','2014-06-04 17:07:39'),
	(60,'Paradise Night Club','18 and over','Bar','',' F?ri\'ipiti','','Pape\'ete','','','French Polynesia',-17.5325,-149.563,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 17:16:46','2014-06-04 17:16:46'),
	(61,'Night Fire','None','Bar','','Yokohama-shi','','Kanagawa','','231-0055','Japan',35.4425,139.627,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 17:22:17','2014-06-04 17:22:17'),
	(62,'Movimiento','None','Dance Studio','http://www.movimiento.com.au/','1/205 Flinders Street East Townsville,','','Townsville','','QLD 4810','Australia',-19.2576,146.819,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 17:33:31','2014-06-04 17:33:31'),
	(63,'Galway Bar and Grill','None','Other','','12045 Roosevelt Rd','','Elmhurst','IL','60126','United States of America',41.8622,-87.9158,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 17:36:09','2014-06-04 17:36:09'),
	(64,'WCS','None','Dance Studio','',' David St','','Turner','','ACT 2612','United States of America',-35.2648,149.123,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 17:40:13','2014-06-04 17:40:13'),
	(65,'Badger Bowl','None','Other','http://mwcsc.org/','506 E Badger Rd','','Madison','WI','53713','United States of America',43.0378,-89.3773,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 17:41:31','2014-06-04 17:41:31'),
	(66,'Dance Tel Aviv','None','Dance Studio','http://www.dancetelaviv.co.il/','98 Dizengoff St. ','','Tel Aviv','','','Israel',32.079,34.774,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 17:48:24','2014-06-04 17:48:24'),
	(67,'Social Dance Studio','None','Dance Studio','http://www.socialdancestudio.com/','3742 23rd Avenue South','','Minneapolis','MN','55407','United States of America',44.9343,-93.2391,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 17:54:01','2014-06-04 17:54:01'),
	(68,'Starks Saloon','None','Bar','http://www.starks-saloon.com/','3125 Dodd Rd','','Eagan','MN','55121','United States of America',44.8445,-93.1248,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 18:02:36','2014-06-04 18:02:36'),
	(69,'Dancers Studio','None','Dance Studio','http://www.dancersstudio.com/','415 Pascal Street North','','St Paul','MN','55104','United States of America',44.9536,-93.1621,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 18:09:28','2014-06-04 18:09:28'),
	(70,'State of the Arts Dance Studio','None','Dance Studio','http://www.sotadancedenver.com/','3265 S Wadsworth Blvd','','Lakewood','CO','80027','United States of America',39.7631,-105.082,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 18:12:15','2014-06-04 18:12:15'),
	(71,'Milwaukee Rebels Swing Dance Club','None','Dance Studio','http://www.milwaukeerebels.com','2499 S Delaware Avenue','','Milwaukee','WI','53207','United States of America',42.998,-87.8919,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 18:20:26','2014-06-04 18:20:26'),
	(72,'Hot Water Night Club','21 and over','Bar','','818 South Water Street','','Milwaukee','WI','53204','United States of America',43.0228,-87.9066,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-04 18:23:53','2014-06-04 18:23:53'),
	(73,'Maylands Bowls Club','None','Other','','50 Clarkson Rd','','Maylands','','WA 6051','Australia',-31.948,115.913,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 00:24:28','2014-06-05 00:24:28'),
	(74,'Mount Hawthorn Main Hall','None','Other','','197 Scarborough Beach Road','','Mt Hawthorn','','WA 6016','Australia',-31.9196,115.835,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 00:28:31','2014-06-05 00:28:31'),
	(75,'Ben Hur Shrine','None','Other','','7811 Rockwood Lane','','Austin','TX','78757','United States of America',30.3582,-97.7381,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 00:50:37','2014-06-05 00:50:37'),
	(76,'Evergreen Ballroom','None','Dance Studio','http://www.evergreenballroom.com/','6088 Crater Lake Ave','','Central Point','OR','97502','United States of America',42.4042,-122.853,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 00:53:29','2014-06-05 00:53:29'),
	(77,'Academy of Gymnastics and Dance ','None','Other','','1000 Stephanie Place ','','Henderson','NV','89014','United States of America',36.0796,-115.046,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 00:58:59','2014-06-05 00:58:59'),
	(78,'Zemskov Dance Academy','None','Dance Studio','','7835 S. Rainbow Blvd.','','Las Vegas','NV','89139','United States of America',36.0458,-115.244,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 01:01:03','2014-06-05 01:01:03'),
	(79,'MAC Fitness in Kingston','None','Other','http://www.HudsonValleyWCS.com','743 East Chester Street ','','Kingston','NY','12401','United States of America',41.9521,-73.9908,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 01:06:06','2014-06-05 01:06:06'),
	(80,' Raw Connection WCS','None','Dance Studio','http://www.rawconnection.com.au','131 Ridge St','','Greenslopes','','QLD 4120','Australia',-27.5083,153.043,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 02:13:58','2014-06-05 02:13:58'),
	(81,'Overstreet Dance Gallery','None','Dance Studio','http://www.overstreetdancegallery.com/','5366 S. Bannock Street','','Littleton','CO','80120','United States of America',39.619,-104.99,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 02:36:24','2014-06-05 02:36:56'),
	(82,'Urban Beat Dance Co.','None','Dance Studio','','927 Granville St,','','Vancouver','','BC V6Z 1L3','Canada',49.2799,-123.122,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 06:45:04','2014-06-05 06:45:04'),
	(83,'Rhodes Wellness College (2nd floor)','None','Other','','1125 Howe Street','','Vancouver','BC','V6Z 2K8','Canada',49.2788,-123.126,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 06:53:49','2014-06-05 06:53:49'),
	(84,'Fusion Dance & Lifestyle Studios','None','Dance Studio','http://wcsmelbourne.com.au/;https://www.facebook.com/WCSMelbourne','478 Smith Street','','Fitzroy','','','Australia',-37.7944,144.985,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 07:04:41','2014-06-05 07:04:41'),
	(85,'MELBOURNE CITY BOWLS CLUB','None','Other','','FLAGSTAFF GARDENS / DUDLEY ST, ','','WEST MELBOURNE','',' VIC 3003','Australia',-37.809,144.949,'','(PARKING AVAILABLE ON & AROUND DUDLEY ST)','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 07:11:04','2014-06-05 07:11:04'),
	(86,'Hollywood Ballroom Dance Center','None','Dance Studio','http://www.hollywoodballroomdc.com/','2126 Industrial Pkwy','','Silver Spring','MD','20904','United States of America',39.0555,-76.9685,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 07:18:55','2014-06-05 07:18:55'),
	(87,'Golf Course Clubhouse, 2nd Floor','None','Other','http://swingdanceclubhawaii.org/Dance_Schedule_and_Events.html','404 Kapahulu Ave','','Honolulu','HI','96815','United States of America',21.2776,-157.819,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 07:20:31','2014-06-05 07:20:31'),
	(88,'Shin-Tokyo Building B1 Floor','None','Dance Studio','http://www.sskamo.co.jp/company/store/shinjuku.html','1-19-8 Nishi-shinjuku Shinjuku-ku','','Tokyo','','','Japan',35.6938,139.704,'','Pls do not use the stairs but come by an elevator to the B1.','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 07:26:40','2014-06-05 07:26:40'),
	(89,'Swing Loft','None','Dance Studio','','116 W. Baltimore Ave (2nd floor)','','Media','PA','19063','United States of America',39.9172,-75.3921,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 07:31:37','2014-06-05 07:32:37'),
	(90,'Collingswood Cloud Masonic Lodge','None','Other','http://delval.wordpress.com/','790 Haddon Ave','','Collingswood','NJ','08108','United States of America',39.9154,-75.0669,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 07:41:28','2014-06-05 07:41:28'),
	(91,' Dance Time Of NJ','None','Dance Studio','','3003 Lincoln Dr West, Suites C,D,','','Marlton','NJ','08053','United States of America',39.9113,-74.9421,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 07:47:45','2014-06-05 07:47:45'),
	(92,'The Ballroom Dance Company','None','Dance Studio','http://www.theballroomdancecompany.com','8900 SW Commercial Street ','','Tigard','OR','97223','United States of America',45.4298,-122.769,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-05 07:51:38','2014-06-05 07:51:38'),
	(93,'Connolly\'s Bar and Restaurant','None','Bar','','121 West 45th Street','Third Floor','New York','NY','10036','United States of America',40.7603,-73.9933,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 22:33:53','2014-06-07 13:45:44'),
	(94,'Dancesport Studios','None','Dance Studio','','22 West 34th Street','Fourth Floor','New York','NY','10001','United States of America',40.7537,-73.9992,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 22:39:47','2014-06-07 13:45:47'),
	(95,'Dance Manhattan ','None','Dance Studio','','39 West 19th Street','Fifth Floor','New York','NY','10011','United States of America',40.7401,-73.9935,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 22:43:59','2014-06-07 22:45:02'),
	(96,'Club 412 - You Should Be Dancing','None','Dance Studio','','412 Eighth Avenue','','New York','NY','10001','United States of America',40.75,-73.9948,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 22:49:03','2014-06-07 22:49:03'),
	(97,'Stepping Out Studios ','None','Dance Studio','http://www.steppingoutstudios.com','37 West 26th Street','Ninth Floor','New York','NY','10001','United States of America',40.7149,-74.012,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 22:53:27','2014-06-07 22:53:51'),
	(98,'Absolute Ballroom','None','Dance Studio','http://pghwcs.com/','6617 Hamilton Avenue','','Pittsburgh','PA','15206','United States of America',40.4578,-79.9099,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 23:03:41','2014-06-07 23:03:41'),
	(99,'Billings Community Center','None','Other','','360 N 23rd St','','Billings','MT','59101','United States of America',45.7871,-108.502,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 23:06:08','2014-06-07 23:06:08'),
	(100,'Lakeside Swing','None','Dance Studio','','200 Grand Ave.','','Oakland','CA','94610','United States of America',37.8113,-122.261,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 23:11:20','2014-06-07 23:11:20'),
	(101,'DanceWorks Studio','None','Dance Studio','','16641 Redmond Way','','Redmond','WA','98052','United States of America',47.6725,-122.118,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 23:15:14','2014-06-07 23:15:14'),
	(102,'Loafers Beach Club','None','Dance Studio','http://www.loafersbeachclub.com','605 Creekside Drive','','Raleigh','NC','27609','United States of America',35.8164,-78.6221,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 23:19:54','2014-06-07 23:19:54'),
	(103,'West Coast Swing Maui','None','Dance Studio','https://www.facebook.com/WestCoastSwingMaui?fref=ts','310 HoOkahi St','','Wailuku','HI','96793','United States of America',20.9046,-156.485,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 23:24:48','2014-06-07 23:24:48'),
	(104,'T.O. West Coast Swing','None','Dance Studio','','805 Dovercourt Rd','','Toronto','ON','M6H 2X4','Canada',43.6627,-79.4298,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 23:27:18','2014-06-07 23:28:09'),
	(105,' Denver Turnverein','None','Dance Studio','','1570 Clarkson St','','Denver','CO','80218','United States of America',39.7413,-104.977,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 23:31:07','2014-06-07 23:31:07'),
	(106,'Westin Westminster','None','Other','','10600 Westminster Boulevard','','Westminster','CO','80020','United States of America',39.8906,-105.065,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 23:35:31','2014-06-07 23:35:31'),
	(107,'Womans Club Of Bethesda','None','Other','','5500 Sonoma Rd','','Bethesda','MD','20817','United States of America',39.0014,-77.1102,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 23:37:14','2014-06-07 14:38:04'),
	(108,'Cultural Arts Center ','None','Dance Studio','https://www.facebook.com/DothanWCS?fref=ts','909 S St Andrews St','','Dothan','AL','36301','United States of America',31.2097,-85.3908,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 23:43:19','2014-06-07 23:43:42'),
	(109,'Club de la Nation','None','Other','','5, rue de Lagny','','Paris','','','France',48.849,2.40009,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 23:46:27','2014-06-07 23:46:27'),
	(110,'Scandic Strand Hotel','None','Other','','Strandkaien 2-4',' 5013','Bergen','','5013','Norway',60.3942,5.32511,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 23:48:53','2014-06-07 23:48:53'),
	(111,'Sherry Kwon Dance School','None','Dance Studio','','19-8 Jamwon-dong ','Seocho-gu ','Seoul','','','Korea Sout',37.5153,127.018,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 23:52:03','2014-06-07 23:52:03'),
	(112,'The Verve Ballroom','None','Dance Studio','http://www.theverveballroom.com/','19820 40th Avenue W, Suite 102','','Lynnwood','WA','98036','United States of America',47.8188,-122.288,'','','pending approval',1,'cara.mcilnay@gmail.com','2014-06-07 23:55:25','2014-06-07 23:55:25');

/*!40000 ALTER TABLE `venues` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
