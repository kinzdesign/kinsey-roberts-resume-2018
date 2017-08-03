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
  (2,1,NULL),
  (2,5,NULL),
  (2,9,NULL),
  (2,11,NULL),
  (3,1,NULL),
  (3,5,NULL),
  (3,7,NULL),
  (3,13,NULL),
  (3,14,NULL),
  (3,16,NULL);
/*!40000 ALTER TABLE `project_skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES
  (1,1,'Server Hardening','server-hardening',NULL,NULL),
  (2,1,'Server Migration','server-migration',NULL,NULL),
  (3,2,'Mailroom','mailroom',NULL,NULL),
  (4,5,'Gamifying Genetics','gamifying-genetics',NULL,NULL),
  (5,2,'Mobile Work Orders','mobile-work-orders',NULL,NULL),
  (6,2,'Housing and Residence Life Database (HARLD)','harld',NULL,NULL),
  (7,2,'Digital Signage','digital-signage',NULL,NULL),
  (8,2,'Furniture Inventory','furniture-inventory',NULL,NULL),
  (9,2,'Key and Badge Issuing','key-badge-issuing',NULL,NULL);
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `skill_types`
--

LOCK TABLES `skill_types` WRITE;
/*!40000 ALTER TABLE `skill_types` DISABLE KEYS */;
INSERT INTO `skill_types` VALUES
  (1,'Languages','languages',NULL),
  (2,'Operating Systems','operating-systems',NULL),
  (3,'Databases','databases',NULL),
  (4,'Cloud Services','cloud-services',NULL),
  (5,'.NET Framework','.net-framework',NULL),
  (6,'Creative Tools','creative-tools',255),
  (7,'Interpersonal Skills','interpersonal-skills',254),
  (8,'Point of Service Hardware','point-of-service-hardware',NULL);
/*!40000 ALTER TABLE `skill_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `skills`
--

LOCK TABLES `skills` WRITE;
/*!40000 ALTER TABLE `skills` DISABLE KEYS */;
INSERT INTO `skills` VALUES
  (1,1,'Microsoft C#','microsoft-c-sharp',NULL,NULL),
  (2,1,'Adobe ColdFusion','adobe-coldfusion',NULL,NULL),
  (3,2,'Microsoft Windows','microsoft-windows',NULL,NULL),
  (4,2,'Ubuntu Linux','ubuntu-linux',NULL,NULL),
  (5,3,'Microsoft SQL Server','microsoft-sql-server',NULL,NULL),
  (6,4,'Heroku','heroku',NULL,NULL),
  (7,5,'Windows Forms','windows-forms',NULL,NULL),
  (8,6,'Adobe Photoshop','adobe-photoshop',NULL,NULL),
  (9,7,'Coaching','coaching',NULL,NULL),
  (10,3,'MySQL','mysql',NULL,NULL),
  (11,5,'ASP.NET','asp-net',NULL,NULL),
  (12,8,'Epson Receipt Printers','epson-receipt-printers',NULL,NULL),
  (13,8,'Zebra Label Printers','zebra-label-printers',NULL,NULL),
  (14,8,'Motorola Symbol Barcode Scanners','motorola-symbol-barcode-scanners',NULL,NULL),
  (15,8,'MagTek Motorized Card Encoders','magtek-motorized-card-encoders',NULL,NULL),
  (16,8,'Equinox Transaction Terminals','equinox-transaction-terminals',NULL,NULL);
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
