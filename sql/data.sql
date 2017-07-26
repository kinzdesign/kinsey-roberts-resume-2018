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
-- Dumping data for table `bullets`
--

LOCK TABLES `bullets` WRITE;
/*!40000 ALTER TABLE `bullets` DISABLE KEYS */;
INSERT INTO `bullets` VALUES
  (1,1,'WSOM Bullet A',1),
  (2,1,'WSOM Bullet B',2),
  (3,1,'WSOM Bullet C',3),
  (4,2,'DOSA Bullet A',1),
  (5,2,'DOSA Bullet B',2),
  (6,2,'DOSA Bullet C',3),
  (7,3,'BS Bullet A',1),
  (8,5,'MS Bullet B',2),
  (9,5,'MS Bullet A',1);
/*!40000 ALTER TABLE `bullets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES
  (1,1,'University Technology','Weatherhead School of Management','https://weatherhead.case.edu/'),
  (2,1,'IT Operations Group','Division of Student Affairs','https://students.case.edu/'),
  (3,1,'College of Arts and Sciences',NULL,'http://artsci.case.edu'),
  (4,1,'School of Graduate Studies',NULL,'https://case.edu/gradstudies/');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `organizations`
--

LOCK TABLES `organizations` WRITE;
/*!40000 ALTER TABLE `organizations` DISABLE KEYS */;
INSERT INTO `organizations` VALUES
  (1,'Case Western Reserve University','10900 Euclid Avenue',NULL,'Cleveland','OH','44106');
/*!40000 ALTER TABLE `organizations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `project_skills`
--

LOCK TABLES `project_skills` WRITE;
/*!40000 ALTER TABLE `project_skills` DISABLE KEYS */;
INSERT INTO `project_skills` VALUES
  (1,2,NULL),
  (2,1,NULL),
  (2,2,NULL),
  (3,1,NULL),
  (4,1,NULL);
/*!40000 ALTER TABLE `project_skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES
  (1,1,'WSOM Project B','wsom-project-b','This was project b.',2),
  (2,1,'WSOM Project A','wsom-project-a','Project A was captivating.',1),
  (3,2,'ITOG Project','itog-project','Something about Student Affairs.',NULL),
  (4,5,'MS Project','ms-project','Masters research project.',NULL);
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `skill_types`
--

LOCK TABLES `skill_types` WRITE;
/*!40000 ALTER TABLE `skill_types` DISABLE KEYS */;
INSERT INTO `skill_types` VALUES
  (1,'Type C','type-c',3),
  (2,'Type A','type-a',1),
  (3,'Type B','type-b',2);
/*!40000 ALTER TABLE `skill_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `skills`
--

LOCK TABLES `skills` WRITE;
/*!40000 ALTER TABLE `skills` DISABLE KEYS */;
INSERT INTO `skills` VALUES
  (1,1,'Skill AA','skill-aa',NULL,NULL),
  (2,2,'Skill BA','skill-ba',NULL,NULL);
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tenure_types`
--

LOCK TABLES `tenure_types` WRITE;
/*!40000 ALTER TABLE `tenure_types` DISABLE KEYS */;
INSERT INTO `tenure_types` VALUES
  (1,'Experience','experience',NULL),
  (2,'Education','education',NULL);
/*!40000 ALTER TABLE `tenure_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tenures`
--

LOCK TABLES `tenures` WRITE;
/*!40000 ALTER TABLE `tenures` DISABLE KEYS */;
INSERT INTO `tenures` VALUES
  (1,1,1,'Lead Web Developer','lead-web-developer',NULL,NULL,'2013-08-07',NULL),
  (2,1,2,'Application Developer','application-developer',NULL,NULL,'2007-05-21','2013-08-06'),
  (3,2,3,'Bachelor of Science','bs-biology','Biology','3.275 GPA','2003-08-25','2007-05-20'),
  (4,2,4,'Non-Degree Studies','non-degree',NULL,'4.0 GPA','2010-08-23','2011-12-09'),
  (5,2,4,'Master of Science','ms-computer-science','Computer Science','4.0 GPA','2012-01-17','2017-01-20');
/*!40000 ALTER TABLE `tenures` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed
