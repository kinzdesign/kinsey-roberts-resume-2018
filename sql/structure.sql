--
-- ------------------------------------------------------

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
-- Current Database: `resume`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `resume` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `resume`;

--
-- Table structure for table `bullets`
--

DROP TABLE IF EXISTS `bullets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bullets` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `tenure` tinyint(3) unsigned NOT NULL,
  `text` varchar(255) NOT NULL,
  `displayorder` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `experience` (`tenure`),
  CONSTRAINT `bullets_ibfk_1` FOREIGN KEY (`tenure`) REFERENCES `tenures` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departments` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `organization` tinyint(3) unsigned NOT NULL,
  `name` varchar(60) NOT NULL,
  `parent` varchar(40) DEFAULT NULL,
  `url` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `organization` (`organization`),
  CONSTRAINT `departments_ibfk_1` FOREIGN KEY (`organization`) REFERENCES `organizations` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `organizations`
--

DROP TABLE IF EXISTS `organizations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organizations` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `street1` varchar(30) DEFAULT NULL,
  `street2` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `zip` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `project_skills`
--

DROP TABLE IF EXISTS `project_skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_skills` (
  `project` tinyint(3) unsigned NOT NULL,
  `skill` smallint(5) unsigned NOT NULL,
  `displayorder` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`project`,`skill`),
  KEY `skill` (`skill`),
  KEY `project` (`project`),
  CONSTRAINT `project_skills_ibfk_1` FOREIGN KEY (`project`) REFERENCES `projects` (`id`),
  CONSTRAINT `project_skills_ibfk_2` FOREIGN KEY (`skill`) REFERENCES `skills` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `tenure` tinyint(3) unsigned NOT NULL,
  `name` varchar(160) DEFAULT NULL,
  `slug` varchar(160) DEFAULT NULL,
  `synopsis` varchar(160) DEFAULT NULL,
  `displayorder` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `experience` (`tenure`),
  CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`tenure`) REFERENCES `tenures` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `skill_types`
--

DROP TABLE IF EXISTS `skill_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skill_types` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `slug` varchar(55) NOT NULL,
  `displayorder` tinyint(4) unsigned DEFAULT NULL,
  `expanded` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skills` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) unsigned NOT NULL,
  `name` varchar(55) NOT NULL,
  `slug` varchar(55) NOT NULL,
  `synopsis` varchar(160) DEFAULT NULL,
  `displayorder` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`) USING BTREE,
  KEY `category` (`type`),
  CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`type`) REFERENCES `skill_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tenure_types`
--

DROP TABLE IF EXISTS `tenure_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tenure_types` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `slug` varchar(55) NOT NULL,
  `displayorder` tinyint(3) unsigned DEFAULT NULL,
  `showInNav` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tenures`
--

DROP TABLE IF EXISTS `tenures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tenures` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) unsigned NOT NULL,
  `department` tinyint(3) unsigned NOT NULL,
  `name` varchar(55) NOT NULL,
  `slug` varchar(55) NOT NULL,
  `category` varchar(55) DEFAULT NULL,
  `synopsis` varchar(160) DEFAULT NULL,
  `url` varchar(120) DEFAULT NULL,
  `start` date NOT NULL,
  `end` date DEFAULT NULL,
  `showInNav` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `type` (`type`),
  KEY `organization` (`department`) USING BTREE,
  CONSTRAINT `tenures_ibfk_1` FOREIGN KEY (`type`) REFERENCES `tenure_types` (`id`),
  CONSTRAINT `tenures_ibfk_2` FOREIGN KEY (`department`) REFERENCES `departments` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
--
/*!50003 DROP FUNCTION IF EXISTS `MonthYearOrPresent` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `MonthYearOrPresent`(ts DATETIME) RETURNS varchar(14) CHARSET utf8
BEGIN
	RETURN IF(ts IS NULL, 'present', DATE_FORMAT(ts, '%M %Y'));
END ;;
DELIMITER ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed
