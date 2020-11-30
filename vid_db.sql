-- MySQL dump 10.16  Distrib 10.1.37-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: bsg
-- ------------------------------------------------------
-- Server version	10.1.37-MariaDB

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
-- Table structure for table `Videogames`
--

DROP TABLE IF EXISTS `Videogames`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Videogames` (
  `titleID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `releaseDate` date,
  `publisherID` int(11),
  `ratingID` int(11),
  PRIMARY KEY (`titleID`),
  Key `publisherID` (`publisherID`),
  Key `ratingID` (`ratingID`),
  CONSTRAINT `Videogames_publisherID_fk` FOREIGN KEY (`publisherID`) REFERENCES `Publishers` (`publisherID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `Videogames_ratingID_fk` FOREIGN KEY (`ratingID`) REFERENCES `Ratings` (`ratingID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Videogames`
--

LOCK TABLES `Videogames` WRITE;
/*!40000 ALTER TABLE `Videogames` DISABLE KEYS */;
INSERT INTO `Videogames` VALUES (1,'Minecraft','2009-5-17',1,1),(2,'Grand Theft Auto V','2013-9-17',2,2),(3,'Tetris','1984-6-6',3,3);
/*!40000 ALTER TABLE `Videogames` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `Platforms`
--

DROP TABLE IF EXISTS `Platforms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Platforms` (
  `platformID` int(11) NOT NULL AUTO_INCREMENT,
  `platform` varchar(255) NOT NULL,
  PRIMARY KEY (`platformID`)
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Platforms`
--

LOCK TABLES `Platforms` WRITE;
/*!40000 ALTER TABLE `Platforms` DISABLE KEYS */;
INSERT INTO `Platforms` VALUES (1,'Xbox One'),(2,'PlayStation 4'),(3,'Nintendo Switch'),(4,'PC');
/*!40000 ALTER TABLE `Platforms` ENABLE KEYS */;
UNLOCK TABLES;






--
-- Table structure for table `PlatToVids`
--

DROP TABLE IF EXISTS `PlatToVids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PlatToVids` (
  `titleID` int(11) NOT NULL DEFAULT '0',
  `platformID` int(11) DEFAULT '0',
  PRIMARY KEY (`titleID`,`platformID`),
  KEY `platformID` (`platformID`),
  CONSTRAINT `PlatToVids_ibfk_1` FOREIGN KEY (`titleID`) REFERENCES `Videogames` (`titleID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `PlatToVids_ibfk_2` FOREIGN KEY (`platformID`) REFERENCES `Platforms` (`platformID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PlatToVids`
--

LOCK TABLES `PlatToVids` WRITE;
/*!40000 ALTER TABLE `PlatToVids` DISABLE KEYS */;
INSERT INTO `PlatToVids` VALUES (1,1),(1,2),(1,3),(1,4),(2,1),(2,2),(2,4),(3,3),(3,4);
/*!40000 ALTER TABLE `PlatToVids` ENABLE KEYS */;
UNLOCK TABLES;



/*
LOCK TABLES `Videogames` WRITE;
INSERT INTO `Videogames` 
VALUES (1),(2),(3);
UNLOCK TABLES;
*/

-- Publishers

DROP TABLE IF EXISTS `Publishers`;
CREATE TABLE `Publishers` (
  `publisherID` int NOT NULL AUTO_INCREMENT,
  `pName` varchar(100) NOT NULL,
  CONSTRAINT `unique_pName` UNIQUE (`pName`),
  PRIMARY KEY (`publisherID`)
);


LOCK TABLES `Publishers` WRITE;
INSERT INTO `Publishers` 
VALUES (1, 'Mojang Studios'),(2, 'Rockstar Games'),(3, 'Nintendo');
UNLOCK TABLES;


-- Ratings
DROP TABLE IF EXISTS `Ratings`;
CREATE TABLE `Ratings` (
  `ratingID` int NOT NULL AUTO_INCREMENT,
  `rating` varchar(100) NOT NULL,
  CONSTRAINT `unique_rating` UNIQUE (`rating`),
  PRIMARY KEY (`ratingID`)
);


LOCK TABLES `Ratings` WRITE;
INSERT INTO `Ratings` 
VALUES (1, 'E10+'), (2, 'M'), (3, 'E');
UNLOCK TABLES;


/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-03  0:38:33