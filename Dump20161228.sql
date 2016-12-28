CREATE DATABASE  IF NOT EXISTS `fitnespraktika` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `fitnespraktika`;
-- MySQL dump 10.13  Distrib 5.5.53, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: fitnespraktika
-- ------------------------------------------------------
-- Server version	5.5.53-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `calendar`
--

DROP TABLE IF EXISTS `calendar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calendar` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text` text,
  `gallery` text,
  `gallery_titles` text,
  `collect_gallery` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `gallery_views` int(10) unsigned NOT NULL DEFAULT '0',
  `video` varchar(255) DEFAULT NULL,
  `collect_video` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `video_views` int(10) unsigned NOT NULL DEFAULT '0',
  `start_at` int(10) unsigned DEFAULT NULL,
  `created_at` int(10) unsigned NOT NULL,
  `updated_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calendar`
--

LOCK TABLES `calendar` WRITE;
/*!40000 ALTER TABLE `calendar` DISABLE KEYS */;
INSERT INTO `calendar` VALUES (1,'<p>SMS, as used on modern handsets, originated from radio telegraphy in radio memo pagers that used standardized phone protocols. These were defined in 1985 as part of the Global System for Mobile Communications (GSM) series of standards. The protocols allowed users to send and receive messages of up to 160 alpha-numeric characters to and from GSM mobile handsets. Though most SMS messages are mobile-to-mobile text messages, support for the service has expanded to include other mobile technologies, such as ANSI CDMA networks and Digital AMPS, as well as satellite and landline networks.</p>\r\n','En2oEYsUXKuT4oomiT1oqdnv','',1,3,'<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/ouZQ7rgAq-I\" frameborder=\"0\" allowfullscreen></iframe>',0,0,1482440400,1482081572,1482926759),(3,'','KaPngLUWt09zfemc4NsK1yiB','',1,13,'<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/Rm_SgHd-7pA\" frameborder=\"0\" allowfullscreen></iframe>',1,10,1482872400,1482514218,1482938190);
/*!40000 ALTER TABLE `calendar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calendar_exercises`
--

DROP TABLE IF EXISTS `calendar_exercises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calendar_exercises` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `calendar_id` int(10) unsigned NOT NULL,
  `exercise_id` int(10) unsigned NOT NULL,
  `notice` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `index4` (`calendar_id`,`exercise_id`),
  KEY `fk_exersises_calendar_2_idx` (`calendar_id`),
  KEY `fk_exersises_calendar_2_idx1` (`exercise_id`),
  CONSTRAINT `fk_exersises_calendar_1` FOREIGN KEY (`calendar_id`) REFERENCES `calendar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_exersises_calendar_2` FOREIGN KEY (`exercise_id`) REFERENCES `exercises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calendar_exercises`
--

LOCK TABLES `calendar_exercises` WRITE;
/*!40000 ALTER TABLE `calendar_exercises` DISABLE KEYS */;
INSERT INTO `calendar_exercises` VALUES (11,1,1,NULL),(36,3,1,NULL),(37,3,3,NULL);
/*!40000 ALTER TABLE `calendar_exercises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calendar_recipes`
--

DROP TABLE IF EXISTS `calendar_recipes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calendar_recipes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `meal_id` int(10) unsigned NOT NULL,
  `calendar_id` int(10) unsigned NOT NULL,
  `recipe_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `index2` (`recipe_id`,`calendar_id`,`meal_id`),
  KEY `fk_food_calendar_1_idx` (`calendar_id`),
  KEY `fk_recipes_calendar_2_idx` (`meal_id`),
  KEY `index5` (`recipe_id`),
  CONSTRAINT `fk_food_calendar_1` FOREIGN KEY (`calendar_id`) REFERENCES `calendar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_recipes_calendar_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_recipes_calendar_2` FOREIGN KEY (`meal_id`) REFERENCES `meals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calendar_recipes`
--

LOCK TABLES `calendar_recipes` WRITE;
/*!40000 ALTER TABLE `calendar_recipes` DISABLE KEYS */;
INSERT INTO `calendar_recipes` VALUES (18,2,1,1),(20,2,3,1),(17,1,1,2),(19,1,3,2);
/*!40000 ALTER TABLE `calendar_recipes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL DEFAULT '2',
  `text` text NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  `updated_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comments_1_idx` (`user_id`),
  KEY `index3` (`hash`),
  CONSTRAINT `fk_comments_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (2,'a20f553e70e5fbf639827a8ee8db5b54',NULL,1,'ыфвафыва',1482697239,1482697239),(3,'0819c237826e20497e792fa6e77d6939',NULL,1,'ewrwe',1482698009,1482698009),(4,'0819c237826e20497e792fa6e77d6939',NULL,1,'ertert',1482698015,1482698015),(7,'a20f553e70e5fbf639827a8ee8db5b54',NULL,2,'yth',1482740301,1482740301);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exercises`
--

DROP TABLE IF EXISTS `exercises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exercises` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `notice` text,
  `text` text,
  `gallery` text,
  `gallery_titles` text,
  `created_at` int(10) unsigned NOT NULL DEFAULT '0',
  `updated_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercises`
--

LOCK TABLES `exercises` WRITE;
/*!40000 ALTER TABLE `exercises` DISABLE KEYS */;
INSERT INTO `exercises` VALUES (1,'Присед','<p>12-10-6-15-25</p>\n<p>12-10-6-15-25</p>\n<p>12-10-6-15-25</p>\n<p>12-10-6-15-25</p>','В тренажере Смитта, в глубокий присед, с контролем скорости по всей траектории движения, в верхней точки ноги остаются чуть согнутыми в коленях.','','',0,1482514085),(3,'Тележка','<p>12-10-6-15-25</p>\n\n<p>12-10-6-15-25</p>\n\n<p>12-10-6-15-25</p>\n\n<p>12-10-6-15-25</p>\n','<p>В тренажере Смитта, в глубокий присед, с контролем скорости по всей траектории движения, в верхней точки ноги остаются чуть согнутыми в коленях.</p>\n','',NULL,1482514463,1482514610);
/*!40000 ALTER TABLE `exercises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_reserved_at_index` (`queue`,`reserved_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meals`
--

DROP TABLE IF EXISTS `meals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ord` int(10) unsigned NOT NULL DEFAULT '1',
  `name` varchar(255) DEFAULT NULL,
  `created_at` int(10) unsigned NOT NULL,
  `updated_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meals`
--

LOCK TABLES `meals` WRITE;
/*!40000 ALTER TABLE `meals` DISABLE KEYS */;
INSERT INTO `meals` VALUES (1,6,'Завтрак',1482083734,NULL),(2,4,'Обед',1482083734,NULL),(3,3,'Полдник',1482083734,NULL),(4,2,'Ужин',1482083734,NULL),(5,5,'Второй завтрак',1482083734,NULL),(6,1,'Поздний ужин',1482083734,NULL);
/*!40000 ALTER TABLE `meals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_12_26_140448_create_jobs_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `panel_models`
--

DROP TABLE IF EXISTS `panel_models`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `panel_models` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ord` int(10) unsigned NOT NULL DEFAULT '1',
  `name` varchar(128) NOT NULL,
  `public_model_name` varchar(64) DEFAULT NULL,
  `grid_item_view` varchar(64) DEFAULT NULL,
  `sortable` tinyint(1) unsigned DEFAULT NULL,
  `has_gallery` tinyint(3) unsigned DEFAULT NULL,
  `custom_url` varchar(255) DEFAULT NULL,
  `created_at` int(8) unsigned NOT NULL DEFAULT '0',
  `updated_at` int(8) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `panel_models`
--

LOCK TABLES `panel_models` WRITE;
/*!40000 ALTER TABLE `panel_models` DISABLE KEYS */;
INSERT INTO `panel_models` VALUES (2,14,'Panel Models','panel_model','',1,0,NULL,1450611656,1479563370),(3,15,'Пользователи','user','',1,1,'',1450611739,1482400285),(29,16,'Настройки','settings','',0,0,'',1480512886,1482504724),(30,17,'Ex','exercise','',0,1,'',1482399813,1482407778),(31,18,'Rec','recipe','',1,1,'',1482407833,1482576212),(32,19,'Cal','calendar','calendar.gridItem',0,1,'',1482407924,1482501387);
/*!40000 ALTER TABLE `panel_models` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipes`
--

DROP TABLE IF EXISTS `recipes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ord` int(10) unsigned NOT NULL DEFAULT '1',
  `name` varchar(255) DEFAULT NULL,
  `notice` text,
  `text` text,
  `gallery` text,
  `gallery_titles` text,
  `start_at` int(10) unsigned DEFAULT NULL,
  `protein` smallint(6) unsigned NOT NULL DEFAULT '0',
  `fat` smallint(6) unsigned NOT NULL DEFAULT '0',
  `carbohydrates` smallint(6) unsigned NOT NULL DEFAULT '0',
  `calories` smallint(6) unsigned NOT NULL DEFAULT '0',
  `created_at` int(10) unsigned NOT NULL,
  `updated_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipes`
--

LOCK TABLES `recipes` WRITE;
/*!40000 ALTER TABLE `recipes` DISABLE KEYS */;
INSERT INTO `recipes` VALUES (1,0,'Индейка тушеная','<ul>\n<li>350 г филе индейки</li>\n<li>1 луковица репчатого лука</li>\n<li>2 дольки чеснока</li>\n<li>соль</li>\n<li>Аджика</li>\n<li>зелень укропа и кинзы</li>\n<li>растительное масло</li>\n</ul>','Мясо режется небольшими кусочками, перемешивается с солью, приправой, нарезанным четверть-кольцами луком и растительным маслом. Остается мариноваться в течение получаса. Далее выкладывается в сотейник и тушится до готовности. За 5 минут до готовности добавляется резанная зелень и чеснок, и тушится на среднем огне с открытой крышкой и помешиванием. ',NULL,NULL,NULL,0,0,0,0,0,1482576216),(2,1,'Каша овсяная','<ul>\n	<li>80 г овсяных хлопьев</li>\n	<li>250 г цельного молока</li>\n	<li>соль</li>\n	<li>сахар или фруктоза</li>\n	<li>десертная ложка мёда</li>\n	<li>1/3 кисло-сладкого яблока</li>\n</ul>\n','','xGXwRBG1MRqNJIFD7Vo37cHt','',NULL,0,0,0,0,0,1482918819);
/*!40000 ALTER TABLE `recipes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(64) NOT NULL,
  `counter` text,
  `main_page_title` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `gallery` text,
  `start_at` int(10) unsigned DEFAULT NULL,
  `created_at` int(10) unsigned NOT NULL DEFAULT '0',
  `updated_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'fp.ru','','','Main page',' - Postfix','',1480539600,1480514247,1482926740);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_panel_models`
--

DROP TABLE IF EXISTS `user_panel_models`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_panel_models` (
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `panel_model_id` int(10) unsigned NOT NULL DEFAULT '0',
  `c` tinyint(1) unsigned DEFAULT NULL,
  `r` tinyint(1) unsigned DEFAULT NULL,
  `u` tinyint(1) unsigned DEFAULT NULL,
  `d` tinyint(1) unsigned DEFAULT NULL,
  UNIQUE KEY `index4` (`user_id`,`panel_model_id`),
  KEY `fk_user_panel_models_1_idx` (`user_id`),
  KEY `fk_user_panel_models_2_idx` (`panel_model_id`),
  CONSTRAINT `fk_user_panel_models_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_user_panel_models_2` FOREIGN KEY (`panel_model_id`) REFERENCES `panel_models` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_panel_models`
--

LOCK TABLES `user_panel_models` WRITE;
/*!40000 ALTER TABLE `user_panel_models` DISABLE KEYS */;
INSERT INTO `user_panel_models` VALUES (1,2,1,1,1,1),(1,3,1,1,1,1),(1,29,1,1,1,1),(1,30,1,1,1,1),(1,31,1,1,1,1),(1,32,1,1,1,1);
/*!40000 ALTER TABLE `user_panel_models` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ord` int(10) unsigned NOT NULL DEFAULT '0',
  `verified` tinyint(1) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `gallery` text COLLATE utf8_unicode_ci,
  `token` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,1,'Admin','alex@fitnespraktika.ru','$2y$10$f65sqEzXccigV22Q6sDCnOCB3zAsvvb/ZYv0bwv3mVwpjYUT4xmRG',NULL,'123','pTwf6V3LJoNb2FfawHs82hGQi5tw1VdLZEwFulqL9MCH2dor29NlnKoRuPXb',1482407933,1482930810),(2,1,1,'Incognito','','',NULL,NULL,NULL,1482407933,1482407933);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-28 19:00:25
