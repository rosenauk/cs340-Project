DROP TABLE IF EXISTS `Videogames`;
CREATE TABLE `Videogames` (
    `titleID` int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (`titleID`)
);

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
  `titleID` int NOT NULL,
  `pName` varchar(100) NOT NULL,
  CONSTRAINT `unique_pName` UNIQUE (`pName`),
  PRIMARY KEY (`publisherID`),
  Key `titleID` (`titleID`),
  CONSTRAINT `publishers_titleID_fk` FOREIGN KEY (`titleID`) REFERENCES `Videogames` (`titleID`)
);

/*
LOCK TABLES `Publishers` WRITE;
INSERT INTO `Publishers` 
VALUES (1, 3, 'Ubisoft'),(2, 2, 'Microsoft'),(3, 1, 'FROM SOFTWARE');
UNLOCK TABLES;
*/

-- Ratings
DROP TABLE IF EXISTS `Ratings`;
CREATE TABLE `Ratings` (
  `ratingID` int NOT NULL AUTO_INCREMENT,
  `titleID` int,
  `rating` varchar(100) NOT NULL,
  PRIMARY KEY (`ratingID`),
  Key `titleID` (`titleID`),
  CONSTRAINT `ratings_titleID_fk` FOREIGN KEY (`titleID`) REFERENCES `Videogames` (`titleID`)
);

/*
LOCK TABLES `Ratings` WRITE;
INSERT INTO `Ratings` 
VALUES (1, 2, 'great game'), (2,1, 'kinda sucked'), (3, 3, 'amazin');
UNLOCK TABLES;
*/