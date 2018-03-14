-- MySQL dump 10.13  Distrib 5.5.57, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: lab4
-- ------------------------------------------------------
-- Server version	5.5.57-0ubuntu0.14.04.1

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
-- Table structure for table `checkout`
--

DROP TABLE IF EXISTS `checkout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `checkout` (
  `checkoutId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `deviceId` varchar(5) NOT NULL,
  `checkoutDate` date NOT NULL,
  `dueDate` date NOT NULL,
  `returnDate` date DEFAULT NULL,
  `checkoutBy` smallint(6) NOT NULL,
  `checkinBy` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`checkoutId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checkout`
--

LOCK TABLES `checkout` WRITE;
/*!40000 ALTER TABLE `checkout` DISABLE KEYS */;
INSERT INTO `checkout` VALUES (1,16969,'007','2017-03-09','2017-03-16',NULL,1,NULL);
/*!40000 ALTER TABLE `checkout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `departmentId` smallint(6) NOT NULL AUTO_INCREMENT,
  `deptName` varchar(50) NOT NULL,
  `college` varchar(50) NOT NULL,
  PRIMARY KEY (`departmentId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (1,'Mathematics','Science'),(2,'Computer Science','Hartnell'),(3,'Game Design','Science'),(4,'Teacher Education','Education'),(5,'Accounting','Business'),(6,'Biology','Science'),(7,'Computer Science','Science'),(8,'Finance','Business'),(9,'Music','Arts'),(10,'Marketing','College of Business');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `device`
--

DROP TABLE IF EXISTS `device`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `device` (
  `deviceId` varchar(5) NOT NULL,
  `deviceName` varchar(50) NOT NULL,
  `deviceType` varchar(20) NOT NULL,
  `price` float NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`deviceId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `device`
--

LOCK TABLES `device` WRITE;
/*!40000 ALTER TABLE `device` DISABLE KEYS */;
INSERT INTO `device` VALUES ('','HTC Vive','VR Headset',0,'Available'),('007','GALAXY TAB','Tablet',500,'Available'),('10000','D-Link Wireless Cam','webcam',35,'available'),('1199','Nexus 7','Tablet',999,'CheckedOut'),('12345','Nexus 7 (2013)','Tablet',80,'Available'),('69696','Lara\'s Midterm Answers','CheatSheet',1.75,'Available'),('A829E','iPad 1TB','Tablet',1000,'Available'),('aaabb','HTC vive','VR Headset',799,'Available'),('ad343','Google Pixel 32GB','Smartphone',649.99,'Checkedout'),('bbbaa','Oculus Rift','VR Headset',599.99,'Available'),('ca021','Cannon70D','Camera',900,'Available'),('ca100','Canon Rebel','Camera',200,'Available'),('gj213','Logitech C270','webcam',21.85,'AVAILABLE'),('GS501','Samsung Galaxy S5, Black 16GB','Smartphone',249.72,'Available'),('hs009','VR Headset','VR Headset',250,'Available'),('hs210','Samsung Gear Headset','VR Headset',49.99,'Available'),('ip221','iPhone 6s 32GB','Smartphone',549.99,'Available'),('lo666','Logitech C920','Webcam',58.49,'Available'),('lp014','Dell XPS','Laptop',1400,'checkout'),('lp223','Razer Blade Pro','Laptop',2000,'Available'),('LT007','Acer','laptop',650,'available'),('mi005','Snowball Mic','Microphone',0.99,'available'),('mi100','microphone','Dynamic Mics',999.99,'Available'),('mi311','Blue Yeti','Microphone',100.99,'Available'),('mi689','Blue Snowball iCE','Microphone',44.99,'Available'),('my234','BoomMic','Microphone',129.99,'CheckedOut'),('rb223','Razer Blade Pro','Laptop',2000,'Available'),('SG603','Samsung GALAXY S6 G920 32GB ','Smartphone',374,'CheckedOut'),('sp001','Samsung Galaxy S6','Smartphone',449.99,'Available'),('sp002','Samsung Galaxy S7','Smartphone',670,'Available'),('sp456','Apple iPhone 7','Smartphone',699.99,'Available'),('tr101','GE Tripod','Tripod',69.89,'available'),('vr007','HTC Vive','VR Headset',800,'Available'),('vr008','Gear VR','VR Headset',200,'Available'),('wc001','Logitech C922x Webcam ','Webcam',99.99,'Available'),('wc002','Logitech Webcam c900 HD','Webcam',59.99,'Available'),('wc021',' Logitech HD Pro Webcam C920,','Webcam',421,'Available'),('ya081','Hotball Mic','Microphone',999.99,'CheckedOut');
/*!40000 ALTER TABLE `device` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff` (
  `staffId` smallint(6) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(15) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  PRIMARY KEY (`staffId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (1,'Karen','White'),(2,'Maggie','Kwon');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `role` varchar(10) NOT NULL,
  `deptId` smallint(6) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (0,'Daniel','Crews','dcrews@csumb.edu','1231231234','Student',2),(211,'Linda','Reyes','lreyes@csumb.edu','(626)222-2222','student',6),(16969,'Ryan','LeBon','rian@csuhotmail.com','831-453-3231','Student',2),(126969,'Ryan','LeBon','rian@csuhotmail.com','831-453-3231','Student',2),(987642,'Tomas','Hernandez','tohernandez@csumb.edu','5555555555','Staff',7),(987654,'Kara','Spencer','kaspencer@csumb.edu','(702)123-4567','student',6),(1001235,'Austin','Brown','hello@gmail.com','(555) 220-8268','Student',9),(1002345,'Michael','Cwener','mcwener@csumb.edu','(123)-123-1234','student',2),(1110011,'Jeff','Gearhart','JGcollegestudent@csumb.edu','(555)-234-5678','student',7),(1111111,'Valerie','Hinojoza-Rood','vhinojoza-rood@csumb.edu','555-555-5555','Student',0),(1111234,'Tommy','Ha','makaveli1996@csumb.edu','831-555-5555','Student',7),(1111295,'Brandon','Ginn','some@email.com','(999) 888-7777','Faculty',1),(1112223,'Cody','Parker','bestEmail@gmail.com','(555) 123-0124','Faculty',3),(1114534,'Rick','James','maryjane420@csumb.edu','8315551234','Faculty',7),(1122334,'Babak','Chehraz','bchehraz@csumb.edu','(123) 456-7890','Student',7),(1134235,'Bill','Gates','BillGates@microsoft.com','(831)-444-8887','student',2),(1212121,'Yang','Jing','myemail@google.com','3333333333','Student',9),(1232123,'Bernie','Sanders','OurLordAndSavior@gmail.com','(831) 555-5555','Staff',5),(1234567,'Daniel','Crews','dcrews@csumb.edu','(123)123-1234','Student',2),(1234577,'Bob','Bobbington','bbob@gmail.com','777-555-7777','Faculty',0),(1234875,'Darth','Vader','darksidebestside@sbcglobal.net','(831)5555555','Student',7),(1236542,'Eduardo','Vilasenor','asdf@gmail.com','9764978123','student',2),(1239423,'Andrew','Sanchez','blasdfl@gmail.com','911','Faculty',7),(1346795,'Eduardo','Vilasenor','asdf@gmail.com','9764978123','student',2),(1485503,'Carsen','Yates','totallynotafakeemailaddress@totallyarealdomain.tot','5599999999','student',7),(1919191,'Billy','Boy','BillyBoy@Billyboy.com','(555) 533-5678','Student',7),(1999999,'Soul','Player','splayer@everywhere','(987)654-3210','Staff',8),(2101997,'Minh Tan','Le','mtl@csumb.edu','(666) 210-1997','Student',2),(2121212,'Lin','Hao','lin@csumb.edu','1370247394','Student',3),(2123215,'Bob','Stuart','BS@comcast.net','(555) 789-6352','Student',5),(2183308,'Brandon','Stillwell','brstillwell@csumb.edu','(281)330-8004','student',2),(2323232,'Tyler','Chargin','tchargin@csumb.edu','(408) 394-1477','Student',2),(2323242,'Tyler','Chargin','tchargin@csumb.edu','(408) 394-1477','Student',2),(2345436,'Daniel','Wilson','hello@hello.com','(325)123-4234','student',2),(2727272,'Brian','Little','thisisreal@real.com','(555)555-5050','Staff',7),(3256478,'Pedro','Lopez','dfrgtg90@yahoo.com','(831)569-1254','Staff',2),(3456789,'Dani','Crouch','blahblah@gmail','(012)345-6789','Student',1),(4433221,'Michael','Moore','moore@where.com','444555','Staff',9),(4561238,'Eduardo','Vilasenor','asdf@gmail.com','1234567894','student',2),(6543210,'Humberto','Plaza','hplazamartinez@csumb.edu','8316745900','Student',9),(6665555,'Bob','Barker','bobbarker@csumb.edu','(123)567-1234','Staff',10),(6666666,'Kieran','Burke','kburke@csumb.edu','8583345238','student',7),(6754832,'Fernando','Madrigal','fafaf422@gmail.com','(831)777-7777','Student',7),(7532145,'Lil','Wayne','cashmoneyrecordswheredreamscometrue@ymbc.info','8317894561','Staff',5),(7654321,'Velvet','Crowe','TalesofBerseria@yahoo.com','9876543','Staff',6),(7766554,'Isaac','Avila','me@mymail','(111)222-3333','Student',8),(7767777,'Tim','Smith','Littletim@gmail.com','(408) 123-4567','Student',2),(7777777,'Tim','Smith','Littletim@gmail.com','(408) 123-4567','Student',2),(8318456,'Samuel ','Valdez ','savaldez@csumb.edu','(831)865-3721','Student',4554),(8888888,'Yang','Jing','myrealemail@google.com','123434567','Student',0),(9999981,'Yashkaran','Singh','ysingh@csumb.edu','(669)-321-9871','Student',1),(9999982,'yahoo','google','yahho@google.com','(123)-456-7890','Student',1),(41111157,'Evelyn','ANDA-MURILLO','evelynmurillo91@gmail.com','(831)512-3812','student',444),(67545465,'Bobby','Longjohns','me@me.com','(765)676-4532','Staff',1),(191919191,'Hank','Hill','illtelluwot@gmail.com','1929292919','teacher',6),(411111157,'Evelyn','ANDA-MURILLO','evelynmurillo91@gmail.com','(831)512-3812','student',444),(902949902,'phillip','emmons','pemmons@csumb.edu','541-555-555','student',5);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-14 16:00:07
