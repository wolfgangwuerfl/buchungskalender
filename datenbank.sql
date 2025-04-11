DROP TABLE IF EXISTS `buchungen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `buchungen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `raum` varchar(50) NOT NULL,
  `start_datum` date NOT NULL,
  `end_datum` date NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
