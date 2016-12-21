
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
  `video` varchar(255) DEFAULT NULL,
  `start_at` int(10) unsigned DEFAULT NULL,
  `created_at` int(10) unsigned NOT NULL,
  `updated_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calendar`
--

LOCK TABLES `calendar` WRITE;
/*!40000 ALTER TABLE `calendar` DISABLE KEYS */;
INSERT INTO `calendar` VALUES (1,'SMS, as used on modern handsets, originated from radio telegraphy in radio memo pagers that used standardized phone protocols. These were defined in 1985 as part of the Global System for Mobile Communications (GSM) series of standards. The protocols allowed users to send and receive messages of up to 160 alpha-numeric characters to and from GSM mobile handsets. Though most SMS messages are mobile-to-mobile text messages, support for the service has expanded to include other mobile technologies, such as ANSI CDMA networks and Digital AMPS, as well as satellite and landline networks.','1 #2 #3 #4','<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/ouZQ7rgAq-I\" frameborder=\"0\" allowfullscreen></iframe>',1482081552,1482081572,NULL);
/*!40000 ALTER TABLE `calendar` ENABLE KEYS */;
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
  `created_at` int(10) unsigned NOT NULL DEFAULT '0',
  `updated_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercises`
--

LOCK TABLES `exercises` WRITE;
/*!40000 ALTER TABLE `exercises` DISABLE KEYS */;
INSERT INTO `exercises` VALUES (1,'Приседания Плие','<p>12-10-6-15-25</p>\n<p>12-10-6-15-25</p>\n<p>12-10-6-15-25</p>\n<p>12-10-6-15-25</p>','В тренажере Смитта, в глубокий присед, с контролем скорости по всей траектории движения, в верхней точки ноги остаются чуть согнутыми в коленях.',NULL,0,NULL);
/*!40000 ALTER TABLE `exercises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exercises_calendar`
--

DROP TABLE IF EXISTS `exercises_calendar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exercises_calendar` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `exercise_id` int(10) unsigned NOT NULL,
  `calendar_id` int(10) unsigned NOT NULL,
  `notice` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `index4` (`exercise_id`,`calendar_id`),
  KEY `fk_exersises_calendar_1_idx` (`calendar_id`),
  KEY `fk_exersises_calendar_2_idx` (`exercise_id`),
  CONSTRAINT `fk_exersises_calendar_1` FOREIGN KEY (`calendar_id`) REFERENCES `calendar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_exersises_calendar_2` FOREIGN KEY (`exercise_id`) REFERENCES `exercises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercises_calendar`
--

LOCK TABLES `exercises_calendar` WRITE;
/*!40000 ALTER TABLE `exercises_calendar` DISABLE KEYS */;
INSERT INTO `exercises_calendar` VALUES (1,1,1,'');
/*!40000 ALTER TABLE `exercises_calendar` ENABLE KEYS */;
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
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `panel_models`
--

LOCK TABLES `panel_models` WRITE;
/*!40000 ALTER TABLE `panel_models` DISABLE KEYS */;
INSERT INTO `panel_models` VALUES (2,14,'Panel Models','panel_model','',1,0,NULL,1450611656,1479563370),(3,15,'Пользователи','user','',1,1,'',1450611739,1479563370),(12,23,'Страницы сайта','misc','misc.gridItem',1,1,'',1471543723,1480512906),(23,22,'Объекты','project','',1,1,'',1479394711,1480512906),(24,19,'Галерея','gallery','',0,1,'',1479398345,1480512906),(25,18,'Сертификаты','certificate','',1,1,'',1479646413,1480512906),(26,21,'Объекты на карте','map_project','',0,0,'',1479933651,1480512906),(27,20,'Слайдер на главной','promoted_project','',1,1,'',1480022279,1480512906),(28,17,'Отзывы','review','',1,1,'',1480290560,1480512906),(29,16,'Настройки','settings','',0,1,'',1480512886,1480516796);
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
  `name` varchar(255) DEFAULT NULL,
  `notice` text,
  `text` text,
  `gallery` text,
  `start_at` int(10) unsigned DEFAULT NULL,
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
INSERT INTO `recipes` VALUES (1,'Индейка тушеная','<ul>\n<li>350 г филе индейки</li>\n<li>1 луковица репчатого лука</li>\n<li>2 дольки чеснока</li>\n<li>соль</li>\n<li>Аджика</li>\n<li>зелень укропа и кинзы</li>\n<li>растительное масло</li>\n</ul>','Мясо режется небольшими кусочками, перемешивается с солью, приправой, нарезанным четверть-кольцами луком и растительным маслом. Остается мариноваться в течение получаса. Далее выкладывается в сотейник и тушится до готовности. За 5 минут до готовности добавляется резанная зелень и чеснок, и тушится на среднем огне с открытой крышкой и помешиванием. ',NULL,NULL,0,NULL),(2,'Каша овсяная','<ul>\n<li>80 г овсяных хлопьев</li>\n<li>250 г цельного молока</li>\n<li>соль</li>\n<li>сахар или фруктоза</li>\n<li>десертная ложка мёда</li>\n<li>1/3 кисло-сладкого яблока</li>\n</ul>',NULL,NULL,NULL,0,NULL);
/*!40000 ALTER TABLE `recipes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipes_calendar`
--

DROP TABLE IF EXISTS `recipes_calendar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipes_calendar` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `meal_id` int(10) unsigned NOT NULL,
  `recipe_id` int(10) unsigned NOT NULL,
  `calendar_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `index2` (`recipe_id`,`calendar_id`),
  KEY `fk_food_calendar_1_idx` (`calendar_id`),
  KEY `fk_recipes_calendar_2_idx` (`meal_id`),
  KEY `index5` (`recipe_id`),
  CONSTRAINT `fk_food_calendar_1` FOREIGN KEY (`calendar_id`) REFERENCES `calendar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_recipes_calendar_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_recipes_calendar_2` FOREIGN KEY (`meal_id`) REFERENCES `meals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipes_calendar`
--

LOCK TABLES `recipes_calendar` WRITE;
/*!40000 ALTER TABLE `recipes_calendar` DISABLE KEYS */;
INSERT INTO `recipes_calendar` VALUES (1,2,1,1),(3,1,2,1);
/*!40000 ALTER TABLE `recipes_calendar` ENABLE KEYS */;
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
INSERT INTO `settings` VALUES (1,'mosgazniiproekt.ru','fogeron@mail.ru','<img src=\"/img/li.png\" alt=\"\">','АО институт \"МосгазНИИпроект\"',' - АО институт \"МосгазНИИпроект\"','',1480514247,1480581621);
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
INSERT INTO `user_panel_models` VALUES (1,2,1,1,1,1),(1,3,1,1,1,1),(1,12,1,1,1,1),(1,23,1,1,1,1),(1,24,1,1,1,1),(1,25,1,1,1,1),(1,26,1,1,1,1),(1,27,1,1,1,1),(1,28,1,1,1,1),(1,29,1,1,1,1);
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
  `token` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,1,'Admin','220619@gmail.com','$2y$10$dFc05KKbR4JzY9hJNX18keNJJriVo0VUweCAvdCNZSyN643e3zU3S',NULL,'cl4rsvJvT0etXLx4mjyhOuorpn5bXdMHGkAK0ofF4jW6Iq8LsFUWF8JS7Z3k',0,1480512913);
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

-- Dump completed on 2016-12-21  0:55:48
