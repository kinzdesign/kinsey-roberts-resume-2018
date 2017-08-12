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
  (3,1,'Department of Biology','College of Arts and Sciences','http://biology.case.edu/'),
  (4,1,'Department of Electrical Engineering and Computer Science','Case School of Engineering','http://engineering.case.edu/eecs/'),
  (5,2,'HighEdWeb Professionals',NULL,'https://www.highedweb.org/'),
  (6,3,'O&rsquo;Reilly Media',NULL,'https://www.oreilly.com/conferences/'),
  (7,1,'Executive Education','Weatherhead School of Management','https://weatherhead.case.edu/executive-education/'),
  (8,4,'Code PaLOUsa, Inc.',NULL,'http://www.codepalousa.com/');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `organizations`
--

LOCK TABLES `organizations` WRITE;
/*!40000 ALTER TABLE `organizations` DISABLE KEYS */;
INSERT INTO `organizations` VALUES
  (1,'Case Western Reserve University','10900 Euclid Avenue',NULL,'Cleveland','OH','44106'),
  (2,'HighEdWeb Professionals','312 W. Commercial St.',NULL,'East Rochester','NY','14445'),
  (3,'O&rsquo;Reilly Media','1005 Gravenstein Highway North',NULL,'Sebastopol','CA','95472'),
  (4,'Code PaLOUsa, Inc.','',NULL,'Louisville','KY','40219');
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
  (3,13,NULL),
  (3,14,NULL),
  (3,29,NULL),
  (3,30,NULL),
  (3,32,NULL),
  (6,1,NULL),
  (6,3,NULL),
  (6,5,NULL),
  (6,7,NULL),
  (6,11,NULL),
  (6,12,NULL),
  (6,13,NULL),
  (6,14,NULL),
  (6,15,NULL),
  (6,16,NULL),
  (6,17,NULL),
  (6,18,NULL),
  (6,19,NULL),
  (6,20,NULL),
  (6,22,NULL),
  (6,23,NULL),
  (6,29,NULL),
  (6,30,NULL),
  (6,32,NULL),
  (7,1,NULL),
  (7,3,NULL),
  (7,7,NULL),
  (7,21,NULL),
  (7,23,NULL),
  (7,24,NULL),
  (7,25,NULL),
  (7,26,NULL),
  (7,27,NULL),
  (7,29,NULL),
  (7,30,NULL),
  (7,31,NULL),
  (7,32,NULL);
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
  (1,'Languages','languages',10,''),
  (2,'Operating Systems','operating-systems',40,''),
  (3,'Databases','databases',20,''),
  (4,'Cloud Services','cloud-services',70,'\0'),
  (5,'.NET Framework','dot-net',30,'\0'),
  (6,'Creative Tools','creative-tools',80,'\0'),
  (7,'Interpersonal Skills','interpersonal-skills',50,''),
  (8,'Point of Service Hardware','point-of-service-hardware',60,'\0'),
  (9,'Protocols','protocols',75,'\0'),
  (10,'Administrative','administrative',75,'\0');
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
  (16,8,'Equinox Transaction Terminals','equinox-transaction-terminals',NULL,NULL),
  (17,5,'Telerik UI Controls','telerik-ui-controls',NULL,NULL),
  (18,5,'CSLA.NET Data Objects','csla-net-data-objects',NULL,NULL),
  (19,5,'Windows Phone 7','windows-phone-7',NULL,NULL),
  (20,5,'Windows Pocket PC','windows-pocket-pc',NULL,NULL),
  (21,5,'Windows Presentation Foundation','windows-presentation-foundation',NULL,NULL),
  (22,5,'Windows Communication Foundation','windows-communication-foundation',NULL,NULL),
  (23,9,'RS-232 Serial','rs-232-serial',NULL,NULL),
  (24,9,'SNMP','snmp',NULL,NULL),
  (25,9,'RSS','rss',NULL,NULL),
  (26,9,'iCal','ical',NULL,NULL),
  (27,1,'XML','xml',NULL,NULL),
  (28,1,'XSLT','xslt',NULL,NULL),
  (29,10,'Equipment Selection','equipment-selection',NULL,NULL),
  (30,10,'Budget Proposals','budget-proposals',NULL,NULL),
  (31,10,'Vendor Relations','vendor-relations',NULL,NULL),
  (32,10,'Procurement','procurement',NULL,NULL);
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tenure_types`
--

LOCK TABLES `tenure_types` WRITE;
/*!40000 ALTER TABLE `tenure_types` DISABLE KEYS */;
INSERT INTO `tenure_types` VALUES
  (1,'Experience','experience',NULL,''),
  (2,'Education','education',NULL,''),
  (3,'Professional Development','professional-development',NULL,'\0');
/*!40000 ALTER TABLE `tenure_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tenures`
--

LOCK TABLES `tenures` WRITE;
/*!40000 ALTER TABLE `tenures` DISABLE KEYS */;
INSERT INTO `tenures` VALUES
  (1,1,1,'Lead Web Developer','lead-web-developer','Analyst/Programmer 3',NULL,NULL,'2013-08-07',NULL,''),
  (2,1,2,'Application Developer','application-developer','Analyst/Programmer 3',NULL,NULL,'2012-10-01','2013-08-06',''),
  (3,2,3,'Bachelor of Science','bs-biology','Biology','3.275 cumulative GPA',NULL,'2003-08-25','2007-05-20',''),
  (4,2,4,'Non-Degree Studies','non-degree',NULL,'4.0 cumulative GPA',NULL,'2010-08-23','2011-12-09','\0'),
  (5,2,4,'Master of Science','ms-computer-science','Computer Science','4.0 cumulative GPA',NULL,'2012-01-17','2017-01-20',''),
  (6,3,5,'HighEdWeb conference 2016','highedweb-2016','Memphis, TN',NULL,'https://2016.highedweb.org/','2016-10-16','2016-10-19','\0'),
  (7,3,5,'HighEdWeb conference 2015','highedweb-2015','Milwaukee, WI',NULL,'https://2015.highedweb.org/','2015-10-04','2015-10-07','\0'),
  (8,3,6,'Web 2.0 Expo conference 2010','web-2-0-expo-2010','San Francisco, CA',NULL,'https://conferences.oreilly.com/web2expo/webexsf2010','2010-05-03','2010-05-06','\0'),
  (9,3,6,'Fluent: The Web Platform conference 2014','fluent-web-platform-2014','San Francisco, CA',NULL,'https://conferences.oreilly.com/fluent/fluent2014','2014-03-11','2014-03-13','\0'),
  (10,3,7,'Emotionally Intelligent Leader Certificate','emotionally-intelligent-leader-certificate',NULL,NULL,'https://weatherhead.case.edu/executive-education/certificates/emotionally-intelligent-leader','2013-10-28','2013-12-10','\0'),
  (11,3,7,'Fundamentals of Management Certificate','fundamentals-of-management-certificate',NULL,NULL,'https://weatherhead.case.edu/executive-education/certificates/fundamentals-of-management','2014-10-15','2014-10-22','\0'),
  (12,3,8,'Code PaLOUsa conference 2013','code-palousa-2013',NULL,NULL,'http://lanyrd.com/2013/codepalousa/','2013-04-01','2013-04-01','\0'),
  (13,3,8,'Code PaLOUsa conference 2012','code-palousa-2012',NULL,NULL,'http://lanyrd.com/2012/codepalousa/','2012-03-01','2012-03-01','\0'),
  (14,3,8,'Code PaLOUsa conference 2011','code-palousa-2011',NULL,NULL,'http://lanyrd.com/2011/codepalousa/','2011-03-01','2011-03-01','\0'),
  (15,1,2,'Software Developer','software-developer','Analyst/Programmer 2',NULL,NULL,'2008-06-01','2012-10-01','\0'),
  (16,1,2,'Training and Support Manager','training-and-support-manager',NULL,NULL,NULL,'2007-05-21','2008-06-01','\0'),
  (17,1,2,'Information Systems Assistant','information-systems-assistant','Student Employee',NULL,NULL,'2006-05-01','2007-05-20','\0');
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
