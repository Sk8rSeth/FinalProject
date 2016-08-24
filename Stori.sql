# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.23)
# Database: SubPlot
# Generation Time: 2015-04-07 20:15:57 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table comment
# ------------------------------------------------------------
DROP DATABASE IF EXISTS SubPlot;
CREATE DATABASE SubPlot;
USE SubPlot;
CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `story_id` int(11) NOT NULL,
  `comment_body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `score` int(11) DEFAULT '1',
  `assessed` int(11) DEFAULT '0',
  `in_story` int(11) DEFAULT '0',
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;

INSERT INTO `comment` (`comment_id`, `user_id`, `story_id`, `comment_body`, `created_at`, `score`, `assessed`, `in_story`)
VALUES
	(1,2,1,'\"What do you mean?\" she asked. She shifted in her seat.','2015-04-01 10:42:42',1,1,1),
	(2,3,1,'Book spines on the shelf in front of her read Sagan, Herbert, Wells. Anything was better than dealing with this, she thought.','2015-04-01 10:42:42',1,1,1),
	(3,5,1,'He still examined the floor in front of him. “Neutrinos are lonely. They almost never interact with any other particle.”','2015-04-01 10:42:42',1,1,1),
	(4,1,1,'He paused, looked at her shoes then back to the floor.','2015-04-01 10:42:42',1,1,1),
	(5,5,1,'“A neutrino could pass through a light-year of lead without hitting anything,” he said.','2015-04-01 10:42:42',1,1,1),
	(6,2,1,'She clenched her jaw. She knew what she was supposed to do, maybe say she was sorry or explain just what was bothering her.','2015-04-01 10:42:42',1,1,1),
	(7,3,1,' She said nothing.','2015-04-01 10:42:42',1,1,1),
	(8,2,1,'\"You’re lonely,\" he said. \"Passing through the world, trying so hard not to touch anything.\" Again, the floor stole his gaze.','2015-04-01 10:42:42',1,1,1),
	(9,2,1,'She softened at the words. Crumbled. “But no matter how lonely,” she whispered, “something eventually touches them…”','2015-04-01 10:42:42',1,1,1),
	(10,4,1,'Out of the corner, he could see her feet shuffle towards him.','2015-04-01 10:42:42',1,1,1),
	(11,2,2,'The immense door swung shut behind her, the rapid change in air pressure letting her know that it had sealed itself,','2015-04-01 10:42:42',1,1,1),
	(12,3,2,'sucking the contaminated air from the tiny chamber as it did so. The UV lights flared on around her and her helmet’s filter automatically darkened.','2015-04-01 10:42:42',1,1,1),
	(13,5,2,'The familiar patter of the chemical shower beat down against her visor.','2015-04-01 10:42:42',1,1,1),
	(14,3,2,'After a few minutes, the yellow indicator light on the wall blinked a calming green, letting her know that she was cleared of contaminants.','2015-04-01 10:42:42',1,1,1),
	(15,1,2,'She felt the rush of the air press against her suit as the room re-pressurized itself.','2015-04-01 10:42:42',1,1,1),
	(16,6,2,'She unlatched her helmet with a tiny hiss, relieved to be free of the stale recycled air of her suit.','2015-04-01 10:42:42',1,1,1),
	(17,7,2,'The bunker’s air was recycled too, she knew, but somehow it felt less stifling.','2015-04-01 10:42:42',1,1,1),
	(18,3,2,'Funny how that feeling never got old, she thought, no matter how many times she’d been in and out of that stupid suit.','2015-04-01 10:42:42',1,1,1),
	(19,5,2,'And how many times had it been? She glanced at the date indicator on her arm and realized with a start, she knew exactly how many times.','2015-04-01 10:42:42',1,1,1),
	(20,1,2,'In the antechamber beyond the airlock, she released the airtight seals at her wrists and ankles','2015-04-01 10:42:42',1,1,1),
	(21,5,2,'and stepped carefully out of the suit, placing it gently back in its storage chamber.','2015-04-01 10:42:42',1,1,1),
	(22,1,2,'She took the handle of the heavy wheeled chest that contained today’s salvage and started towards her lab.','2015-04-01 10:42:42',1,1,1),
	(23,4,2,'Normally she’d turn on some music while she worked to stave off the unending silence of the bunker,','2015-04-01 10:42:42',1,1,1),
	(24,4,2,'vintage audio files that she’d pulled from previous salvages.','2015-04-01 10:42:42',1,1,1),
	(25,2,2,'1980’s pop rock was her favorite, Bowie and Journey and Depeche Mode. But not today.','2015-04-01 10:42:42',1,1,1),
	(26,1,2,'She punched up a file on her viewscreen, and the monitor filled with the image of a handsome young man in a lab coat.','2015-04-01 10:42:42',1,1,1),
	(27,5,2,'“Hi baby,” he said with a grin, clear blue eyes sparkling despite the pixelated image.','2015-04-01 10:42:42',1,1,1),
	(28,6,2,'“Sorry, I think I have a bad connection-but you won’t believe it, babe. I figured it out. I found the answer.','2015-04-01 10:42:42',1,1,1),
	(29,7,2,'I can’t believe we’ve been missing it this whole time, when it was right in front of us.','2015-04-01 10:42:42',1,1,1),
	(30,8,2,'I spoke with the council, and they’re flying me out in about six hours to meet with the President. This could all be over by tomorrow.”','2015-04-01 10:42:42',1,1,1),
	(31,8,2,'He continued to explain the details of his findings, and she smiled in spite of herself as she watched him gesturing excitedly,','2015-04-01 10:42:42',1,1,1),
	(32,7,2,'only pausing momentarily to sweep his long hair back out of his eyes.','2015-04-01 10:42:42',1,1,1),
	(33,4,2,'He went on for several minutes, until the transmission image began to crackle and waver,','2015-04-01 10:42:42',1,1,1),
	(34,6,2,'finally freezing on his childlike half-smile, the last image she would ever see of him. The date stamp read one year ago today.\"','2015-04-01 10:42:42',1,1,1),
	(35,6,3,'For some reason, his doors wouldn’t open.','2015-04-01 10:42:42',1,1,1),
	(36,1,3,'The train got closer as the tall shadowy figures stood their distance from the tracks.','2015-04-01 10:42:42',1,1,1),
	(37,4,3,'He panics, trying to get out, but the light flashes closer and closer, lighting up the entire vehicle.','2015-04-01 10:42:42',1,1,1),
	(38,2,3,'He closes his eyes and prays for a quick and painless death.','2015-04-01 10:42:42',1,1,1),
	(39,8,3,'But, all of the sudden!','2015-04-01 10:42:42',1,1,1),
	(40,2,4,'Twenty minutes in, out of an eight hour flight overseas, I managed to close my eyes and doze off.','2015-04-01 10:42:42',1,1,1),
	(41,1,4,'What feels like only seconds later, I open my eyes to see that I\'m falling from 33,000 feet in the air at about 230 feet per second.','2015-04-01 10:42:42',1,1,1),
	(42,3,5,'and were blasting music while sipping on some 40\'s.','2015-04-01 10:42:42',1,1,1),
	(43,6,5,'As they were jamming, Chico looked to his left out the window to see a silhouette of a man on a horse.','2015-04-01 10:42:42',1,1,1),
	(44,4,5,'On edge and a little confused, Chico got out the vehicle, hand on his gun and approached the mysterious man on the horse.','2015-04-01 10:42:42',1,1,1),
	(45,9,5,'José was still in his own world jamming to the music. Chico was able to get close enough to see that the silhouette was a man on a horse.','2015-04-01 10:42:42',1,1,1),
	(46,6,5,'The man had shining medieval armor, and long flowing brown hair, even though the air flow was as still as a pole.','2015-04-01 10:42:42',1,1,1),
	(47,8,5,'Chico asked, \"who or what are you bro?\". To Chico\'s complete shock, the armored man said','2015-04-01 10:42:42',1,1,1),
	(48,8,6,'Screamed the five-story muffin as he shot golfball-sized blueberries at mach1 speeds.','2015-04-01 10:42:42',1,1,1),
	(49,1,6,'The professor looked up at his creation in dismay. \"What have I done?!\", he cried. He had to think on his feet.','2015-04-01 10:42:42',1,1,1),
	(50,3,3,'The vehicle comes to life all of it\'s on accord, and flies off the tracks headed right for the Shadowy Figures!','2015-04-02 11:43:23',1,0,0),
	(51,8,3,'The Fire Nation Attacked!','2015-04-01 10:44:43',1,0,0),
	(52,8,4,'As I fell, I realized that I was the only one falling. Where were the other passengers?','2015-04-01 10:45:44',1,0,0),
	(54,1,3,'He noticed it was quiet. Impossibly silent in fact. When he opened his eyes, the train was just outside his window, and it stayed there...','2015-04-01 16:32:32',2,0,0),
	(55,1,1,'== End ==','2015-04-01 12:36:09',2,0,0),
	(56,1,6,'He would have to find a way to bring this monster to heal, and quick!','2015-04-01 21:59:10',1,0,0);

/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table comment_vote
# ------------------------------------------------------------

CREATE TABLE `comment_vote` (
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `vote` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `comment_vote` WRITE;
/*!40000 ALTER TABLE `comment_vote` DISABLE KEYS */;

INSERT INTO `comment_vote` (`user_id`, `comment_id`, `vote`)
VALUES
	(1,55,'up'),
	(1,50,'down'),
	(1,54,'up');

/*!40000 ALTER TABLE `comment_vote` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table genre
# ------------------------------------------------------------

CREATE TABLE `genre` (
  `genre_id` int(11) NOT NULL AUTO_INCREMENT,
  `genre_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`genre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

LOCK TABLES `genre` WRITE;
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;

INSERT INTO `genre` (`genre_id`, `genre_description`)
VALUES
	(1,'SciFi'),
	(2,'Mystery'),
	(3,'Fantasy'),
	(4,'Horror'),
	(5,'Drama');

/*!40000 ALTER TABLE `genre` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table seed
# ------------------------------------------------------------

CREATE TABLE `seed` (
  `seed_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `seed_body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `genre_id` varchar(255) DEFAULT NULL,
  `score` int(11) DEFAULT '1',
  `times_used` int(11) DEFAULT '0',
  PRIMARY KEY (`seed_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

LOCK TABLES `seed` WRITE;
/*!40000 ALTER TABLE `seed` DISABLE KEYS */;

INSERT INTO `seed` (`seed_id`, `user_id`, `title`, `seed_body`, `created_at`, `genre_id`, `score`, `times_used`)
VALUES
	(1,1,'Passing Through','\"You’re a neutrino,\" he said, staring at the ground. He felt her head turn at his voice, eyes on him. He didn’t move.','2015-04-01 10:42:42','1',1,1),
	(2,2,'Salvage','She stepped wearily through the airlock and slammed the wall switch.','2015-04-01 10:42:42','1',1,1),
	(3,1,'Just A Light','\"Break a leg,\" she said with a wry smile. \"You’re going to do great.\"','2015-04-01 10:42:42','4',1,0),
	(4,2,'Him','I bring him flowers every day, I hope that he will want to play! He never moves, he’s always there.','2015-04-01 10:42:42','2',1,0),
	(5,9,'Sentient Shadows','His car was stopped in the tracks.  The shadowy figures kept approaching him, with their ominous gadgets and red eyes.','2015-04-01 10:42:42','2',1,1),
	(6,9,'Mystery Triangle','As I board the plane, I\'m able to get a seat and immediately get relaxed.','2015-04-01 10:42:42','4',1,1),
	(7,9,'José and Chico\'s Strange Journey','It was a quiet Sunday afternoon in the hood. Two Latinos, named Chico and  José, sat parked in an El Camino,','2015-04-01 10:42:42','1',1,1),
	(8,9,'Steve','A giant blueberry muffin was destroying the city. \"I am the mighty Steve! Tremble before my power!\",','2015-04-01 10:42:42','1',1,1),
	(9,1,'Runes','He held them in his hands. These 7 geometric rock and metal. Why do they have so much power?','2015-04-01 15:48:07','3',2,0),
	(11,1,'The Dance of Moons','Some say humans are like moons, each in orbit around a single event in their lifetime. Either moving towards, or away from it.','2015-04-01 21:53:21','5',1,0),
	(16,1,'The Windows','Today I looked out the window, and something looked back.','2015-04-02 13:31:32','4',1,0);

/*!40000 ALTER TABLE `seed` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table seed_vote
# ------------------------------------------------------------

CREATE TABLE `seed_vote` (
  `user_id` int(11) NOT NULL,
  `seed_id` int(11) NOT NULL,
  `vote` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `seed_vote` WRITE;
/*!40000 ALTER TABLE `seed_vote` DISABLE KEYS */;

INSERT INTO `seed_vote` (`user_id`, `seed_id`, `vote`)
VALUES
	(1,9,'up'),
	(3,9,'down'),
	(8,9,'up'),
	(1,11,'up'),
	(1,13,'up'),
	(1,14,'up');

/*!40000 ALTER TABLE `seed_vote` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table story
# ------------------------------------------------------------

CREATE TABLE `story` (
  `story_id` int(11) NOT NULL AUTO_INCREMENT,
  `seed_id` int(11) NOT NULL,
  `story_body` text,
  `score` int(11) DEFAULT '1',
  `genre_id` varchar(255) DEFAULT '1',
  `number_comments` int(11) DEFAULT '0',
  `is_alive` int(11) DEFAULT '1',
  PRIMARY KEY (`story_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

LOCK TABLES `story` WRITE;
/*!40000 ALTER TABLE `story` DISABLE KEYS */;

INSERT INTO `story` (`story_id`, `seed_id`, `story_body`, `score`, `genre_id`, `number_comments`, `is_alive`)
VALUES
	(1,1,'\"You’re a neutrino,\" he said, staring at the ground. He felt her head turn at his voice, eyes on him. He didn’t move.<br>\n        \"What do you mean?\" she asked. She shifted in her seat. Book spines on the shelf in front of her read Sagan, Herbert, Wells. Anything was better than dealing with this, she thought.<br>\n        He still examined the floor in front of him. “Neutrinos are lonely. They almost never interact with any other particle.” He paused, looked at her shoes then back to the floor. “A neutrino could pass through a light-year of lead without hitting anything,” he said.<br>\n        She clenched her jaw. She knew what she was supposed to do, maybe say she was sorry or explain just what was bothering her. She said nothing.<br>\n        \"You’re lonely,\" he said. \"Passing through the world, trying so hard not to touch anything.\" Again, the floor stole his gaze.<br>\n        She softened at the words. Crumbled. “But no matter how lonely,” she whispered, “something eventually touches them…” Out of the corner, he could see her feet shuffle towards him.',1,'1',11,1),
	(2,2,'She stepped wearily through the airlock and slammed the wall switch. The immense door swung shut behind her, the rapid change in air pressure letting her know that it had sealed itself, sucking the contaminated air from the tiny chamber as it did so. The UV lights flared on around her and her helmet’s filter automatically darkened. \n        The familiar patter of the chemical shower beat down against her visor. After a few minutes, the yellow indicator light on the wall blinked a calming green, letting her know that she was cleared of contaminants. She felt the rush of the air press against her suit as the room re-pressurized itself.  \n        She unlatched her helmet with a tiny hiss, relieved to be free of the stale recycled air of her suit. The bunker’s air was recycled too, she knew, but somehow it felt less stifling. Funny how that feeling never got old, she thought, no matter how many times she’d been in and out of that stupid suit. And how many times had it been? She glanced at the date indicator on her arm and realized with a start, she knew exactly how many times.\n        In the antechamber beyond the airlock, she released the airtight seals at her wrists and ankles and stepped carefully out of the suit, placing it gently back in its storage chamber. She took the handle of the heavy wheeled chest that contained today’s salvage and started towards her lab.\n        Normally she’d turn on some music while she worked to stave off the unending silence of the bunker, vintage audio files that she’d pulled from previous salvages. 1980’s pop rock was her favorite, Bowie and Journey and Depeche Mode. But not today. She punched up a file on her viewscreen, and the monitor filled with the image of a handsome young man in a lab coat.\n        “Hi baby,” he said with a grin, clear blue eyes sparkling despite the pixelated image. “Sorry, I think I have a bad connection-but you won’t believe it, babe. I figured it out. I found the answer. I can’t believe we’ve been missing it this whole time, when it was right in front of us. I spoke with the council, and they’re flying me out in about six hours to meet with the President. This could all be over by tomorrow.”\n        He continued to explain the details of his findings, and she smiled in spite of herself as she watched him gesturing excitedly, only pausing momentarily to sweep his long hair back out of his eyes. He went on for several minutes, until the transmission image began to crackle and waver, finally freezing on his childlike half-smile, the last image she would ever see of him. The date stamp read one year ago today.',1,'1',24,1),
	(3,5,'His car was stopped in the tracks.  The shadowy figures kept approaching him, with their ominous gadgets and red eyes. For some reason, his doors wouldn\'t open. The train got closer as the tall shadowy figures stood their distance from the tracks. \n        He panics, trying to get out, but the light flashes closer and closer, lighting up the entire vehicle. He closes his eyes and prays for a quick and painless death. But, all of the sudden!',3,'2',5,1),
	(4,6,'As I board the plane, I\'m able to get a seat and immediately get relaxed. Twenty minutes in, out of an eight hour flight overseas, I managed to close my eyes and doze off. \n        What feels like only seconds later, I open my eyes to see that I\'m falling from 33,000 feet in the air at about 230 feet per second.',1,'4',2,1),
	(5,7,'It was a quiet Sunday afternoon in the hood. Two Latinos, named Chico and  José, sat parked in an El Camino and were blasting music while sipping on some 40\'s. As they were jamming, Chico looked to his left out the window to see a silhouette of a man on a horse. On edge and a little confused, Chico got out the vehicle, hand on his gun and approached the mysterious man on the horse.\n        José was still in his own world jamming to the music. Chico was able to get close enough to see that the silhouette was a man on a horse. The man had shining medieval armor, and long flowing brown hair, even though the air flow was as still as a pole. Chico asked, \"who or what are you bro?\". To Chico\'s complete shock, the armored man said',1,'1',6,1),
	(6,8,'A giant blueberry muffin was destroying the city. \"I am the mighty Steve! Tremble before my power!\", screamed the five-story muffin as he shot golfball-sized blueberries at mach1 speeds. The professor looked up at his creation in dismay. \"What have I done?!\", he cried. He had to think on his feet.',2,'1',2,1);

/*!40000 ALTER TABLE `story` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table story_comment
# ------------------------------------------------------------

CREATE TABLE `story_comment` (
  `story_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `story_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  PRIMARY KEY (`story_comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table story_vote
# ------------------------------------------------------------

CREATE TABLE `story_vote` (
  `user_id` int(11) NOT NULL,
  `story_id` int(11) NOT NULL,
  `vote` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `story_vote` WRITE;
/*!40000 ALTER TABLE `story_vote` DISABLE KEYS */;

INSERT INTO `story_vote` (`user_id`, `story_id`, `vote`)
VALUES
	(3,3,'up'),
	(1,3,'up'),
	(1,6,'up');

/*!40000 ALTER TABLE `story_vote` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(255) NOT NULL,
  `score` int(11) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(255) DEFAULT NULL,
  `password_resets` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `email`, `score`, `created_at`, `updated_at`, `remember_token`, `password_resets`)
VALUES
	(1,'Seth','Howell','Sk8rSeth','$2y$10$QXyUtwDOrinRLsEu3fUn9.3HNjQb72PgBDwLhC4MNWrQ4oI04I2XG','s@h.com',5,'2015-04-02 13:04:19','2015-04-02 20:04:19','oIXq0Ra6ZAWQNz4IyX2vQOMGwJ5gtCl04HglAjwguWlA1FQ0b1MQqrsJmrcE',NULL),
	(2,'Cap. Mal','Reynolds','Cap.MalReynolds','$2y$10$/.N0EP1vKzW1WxXMvyqutOHnlmGiopecaI4NE/0xbJpKHnaw8BvGS','mal@reynolds.com',2,'2015-04-01 12:34:38','0000-00-00 00:00:00',NULL,NULL),
	(3,'John','M.','John117','$2y$10$QXyUtwDOrinRLsEu3fUn9.3HNjQb72PgBDwLhC4MNWrQ4oI04I2XG','spartan@halo.com',7,'2015-04-01 16:31:17','2015-04-01 23:31:17','plncRhKsQVD5UEvcY3xJgrtECGaUfxHBXgLkMCsM840VWISXFu8R615jDdot',NULL),
	(4,'Buffy','Summers','TheSlayer','$2y$10$/.N0EP1vKzW1WxXMvyqutOHnlmGiopecaI4NE/0xbJpKHnaw8BvGS','buffy@summers.com',2,'2015-04-01 12:34:45','0000-00-00 00:00:00',NULL,NULL),
	(5,'Jon','Snow','LordCommander','$2y$10$/.N0EP1vKzW1WxXMvyqutOHnlmGiopecaI4NE/0xbJpKHnaw8BvGS','j@s.com',6,'2015-04-01 12:34:46','0000-00-00 00:00:00',NULL,NULL),
	(6,'Tyrion','Lannister','The_Imp','$2y$10$/.N0EP1vKzW1WxXMvyqutOHnlmGiopecaI4NE/0xbJpKHnaw8BvGS','t@l.com',4,'2015-04-01 12:34:48','0000-00-00 00:00:00',NULL,NULL),
	(7,'Finn','TheHuman','Adventurer','$2y$10$/.N0EP1vKzW1WxXMvyqutOHnlmGiopecaI4NE/0xbJpKHnaw8BvGS','finn@ooo.com',6,'2015-04-01 12:34:52','0000-00-00 00:00:00',NULL,NULL),
	(8,'Sarah','Kerrigan','QueenOfBlades','$2y$10$QXyUtwDOrinRLsEu3fUn9.3HNjQb72PgBDwLhC4MNWrQ4oI04I2XG','s@k.com',11,'2015-04-01 15:47:15','2015-04-01 22:47:15','DZKYEkL2eDqTq2oq2xqrBRxG1wz9f6pg5hO4o0xncpuFM0r6217PIba6Pkqn',NULL),
	(9,'Chris','Norris','Killastrata15','$2y$10$QXyUtwDOrinRLsEu3fUn9.3HNjQb72PgBDwLhC4MNWrQ4oI04I2XG','c@n.com',9,'2015-04-01 12:35:01','0000-00-00 00:00:00',NULL,NULL);

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
