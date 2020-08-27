-- MySQL dump 10.13  Distrib 5.7.26, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: sistemaventas
-- ------------------------------------------------------
-- Server version	5.7.26-0ubuntu0.18.10.1

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
-- Table structure for table `abono`
--

DROP TABLE IF EXISTS `abono`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `abono` (
  `id_abono` bigint(10) NOT NULL AUTO_INCREMENT,
  `fechaAbono` datetime DEFAULT NULL,
  `cantidad` decimal(9,2) DEFAULT NULL,
  `recargo` decimal(9,2) DEFAULT NULL,
  `total` decimal(9,2) DEFAULT NULL,
  `id_detalle_credito` bigint(10) DEFAULT NULL,
  `id_cliente` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id_abono`),
  KEY `id_credito` (`id_detalle_credito`),
  CONSTRAINT `id_credito` FOREIGN KEY (`id_detalle_credito`) REFERENCES `detalle_credito` (`id_detalle_credito`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abono`
--

LOCK TABLES `abono` WRITE;
/*!40000 ALTER TABLE `abono` DISABLE KEYS */;
INSERT INTO `abono` VALUES (1,'2020-08-10 13:49:29',3.00,NULL,3.00,1,1),(2,'2020-08-10 15:14:30',1.42,NULL,1.42,1,1),(3,'2020-08-10 15:51:13',3.00,NULL,3.00,1,1),(4,'2020-08-11 00:57:26',47.00,NULL,47.00,15,3),(5,'2020-08-11 00:59:40',47.00,NULL,47.00,15,3),(6,'2020-08-11 01:04:25',553.00,NULL,553.00,15,3),(7,'2020-08-11 15:38:03',492.00,NULL,492.00,15,3),(8,'2020-08-11 15:40:33',3000.00,NULL,3000.00,15,3),(9,'2020-08-12 23:06:28',38.00,NULL,38.00,19,2),(10,'2020-08-12 23:11:43',300.00,NULL,300.00,19,2),(11,'2020-08-12 23:23:26',500.00,NULL,500.00,19,2),(12,'2020-08-13 00:07:36',23.00,NULL,23.00,27,1),(13,'2020-08-13 00:29:35',246.00,NULL,246.00,35,4),(14,'2020-08-13 14:17:39',90000.00,NULL,90000.00,15,3),(15,'2020-08-13 14:25:31',1.00,NULL,1.00,15,3),(16,'2020-08-16 22:53:42',3.00,NULL,3.00,19,2),(17,'2020-08-21 02:12:48',8.00,NULL,8.00,28,3),(18,'2020-08-21 02:17:39',5.00,NULL,5.00,9,3),(19,'2020-08-21 02:21:26',20.00,NULL,20.00,11,3),(20,'2020-08-21 02:22:26',46.00,NULL,46.00,29,3),(21,'2020-08-21 02:25:02',50.00,NULL,50.00,33,2),(22,'2020-08-21 11:30:41',8.00,NULL,8.00,34,7),(23,'2020-08-21 11:43:25',2.00,NULL,2.00,10,2),(24,'2020-08-21 11:44:14',88.00,NULL,88.00,32,7),(25,'2020-08-21 11:46:24',44.00,NULL,44.00,16,2),(26,'2020-08-21 17:17:59',3.00,NULL,3.00,14,2),(27,'2020-08-21 21:11:37',14.00,NULL,14.00,30,3),(28,'2020-08-21 21:23:57',100.00,NULL,100.00,10,2);
/*!40000 ALTER TABLE `abono` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id_cliente` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(300) DEFAULT NULL,
  `apellido_paterno` varchar(300) DEFAULT NULL,
  `apellido_materno` varchar(300) DEFAULT NULL,
  `domicilio` varchar(300) DEFAULT NULL,
  `localidad` varchar(300) DEFAULT NULL,
  `telefono` bigint(20) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `fecha_alta` datetime DEFAULT NULL,
  `credito_actual` varchar(3) DEFAULT NULL,
  `estatus_credito_actual` varchar(30) DEFAULT NULL,
  `id_credito` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'sinCliente','','','','',0,'',NULL,NULL,NULL,NULL),(2,'azucena','mosso','guzman','cedros 22 el mirador','iztapalapa cdmx',5556322534,'azucenamata@gmail.com',NULL,NULL,NULL,NULL),(3,'Alfonso','Lira','Zavaleta','Nicolas Bravo','Guerrero',7774398670,'xboy_@hotmail.com','2020-07-21 00:00:00',NULL,NULL,NULL),(4,'pedro','torres','guajardo','matamoros 22','alvaro obregon cdmx',5546832400,'pedrotorres@gmail.com','2020-08-11 20:36:25',NULL,NULL,NULL),(5,'alejandra','gutierrez','dias','Vicente Guerrero 34 las villas','PUEBLA',2221649287,'alejandrabecerra@gmail.com','2020-08-11 20:43:37',NULL,NULL,NULL),(7,'navocodonosor','espiricueta','rodriguez','calle las palmas no 22 colonia lindavista','chalco',5543227890,'navurodri@gmail.com','2020-08-12 21:02:42',NULL,NULL,NULL),(9,'alfredo','palacios','gomez','','',0,'','2020-08-16 15:08:12',NULL,NULL,NULL),(10,'angel','guzman','sevilla','san miguel 32','cuernavaca',77765432277,'angel@gmail.com','2020-08-19 00:46:49',NULL,NULL,NULL),(11,'sergio','corona','tellez','libertad 72','iztacalco',5556324522,'sergiocorona@gmail.com','2020-08-19 01:11:09',NULL,NULL,NULL),(12,'pedro','mota','perez','domicilio conocido','localidad conocida',73333445172,'pedrom@gmail.com','2020-08-19 01:19:21',NULL,NULL,NULL);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `credito`
--

DROP TABLE IF EXISTS `credito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `credito` (
  `id_credito` bigint(20) NOT NULL AUTO_INCREMENT,
  `montoTotalPrestado` decimal(9,2) DEFAULT NULL,
  `monto_a_pagar` decimal(9,2) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `estatus_credito` int(11) DEFAULT NULL,
  `id_cliente` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id_credito`),
  KEY `id_cliente` (`id_cliente`),
  CONSTRAINT `id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `credito`
--

LOCK TABLES `credito` WRITE;
/*!40000 ALTER TABLE `credito` DISABLE KEYS */;
INSERT INTO `credito` VALUES (1,723.00,11.42,'2020-08-10 00:25:02','2020-08-25',1,3);
/*!40000 ALTER TABLE `credito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `credito_old`
--

DROP TABLE IF EXISTS `credito_old`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `credito_old` (
  `id_credito` bigint(20) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` date DEFAULT NULL,
  `dias_plazo` bigint(3) DEFAULT NULL,
  `interes` float DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `monto_prestado` float DEFAULT NULL,
  `monto_total` float DEFAULT NULL,
  `cantidad_abonada` bigint(4) DEFAULT NULL,
  `cantidad_por_pagar` bigint(4) DEFAULT NULL,
  `id_cliente` bigint(20) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `estatus_credito` int(11) DEFAULT NULL,
  `id_venta` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id_credito`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `credito_old`
--

LOCK TABLES `credito_old` WRITE;
/*!40000 ALTER TABLE `credito_old` DISABLE KEYS */;
/*!40000 ALTER TABLE `credito_old` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_credito`
--

DROP TABLE IF EXISTS `detalle_credito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_credito` (
  `id_detalle_credito` bigint(20) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` date DEFAULT NULL,
  `dias_plazo` bigint(10) DEFAULT NULL,
  `interes` float DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `monto_prestado` decimal(9,2) DEFAULT NULL,
  `monto_total` decimal(9,2) DEFAULT NULL,
  `cantidad_abonada` decimal(9,2) DEFAULT NULL,
  `cantidad_por_pagar` decimal(9,2) DEFAULT NULL,
  `id_cliente` bigint(20) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `estatus_credito` int(11) DEFAULT NULL,
  `id_venta` bigint(20) DEFAULT NULL,
  `id_credito` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id_detalle_credito`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_venta` (`id_venta`),
  CONSTRAINT `detalle_credito_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  CONSTRAINT `id_venta` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_credito`
--

LOCK TABLES `detalle_credito` WRITE;
/*!40000 ALTER TABLE `detalle_credito` DISABLE KEYS */;
INSERT INTO `detalle_credito` VALUES (1,NULL,-24,NULL,NULL,100.00,100.00,0.00,100.00,1,NULL,1,NULL,NULL),(2,'2020-08-06',24,7,NULL,100.00,100.00,0.00,100.00,1,NULL,1,NULL,NULL),(3,'2020-08-06',24,9,'2020-08-30',500.00,100.00,0.00,100.00,1,NULL,1,NULL,NULL),(4,'2020-08-06',24,11,'2020-08-30',100.00,81.00,30.00,100.00,1,NULL,1,NULL,NULL),(5,'2020-08-06',24,10,'2020-08-30',100.00,110.00,50.00,60.00,1,NULL,1,NULL,NULL),(6,'2020-08-06',24,10,'2020-08-30',100.00,110.00,50.00,60.00,1,'2020-08-06 00:00:00',1,NULL,NULL),(7,'2020-08-06',24,10,'2020-08-30',100.00,110.00,40.00,70.00,1,'2020-08-06 00:00:00',1,NULL,NULL),(8,'2020-08-06',21,2,'2020-08-27',213.00,217.26,0.00,217.00,1,NULL,1,NULL,NULL),(9,'2020-08-06',24,5,'2020-08-30',100.00,105.00,0.00,105.00,3,NULL,1,NULL,NULL),(10,'2020-08-06',20,2,'2020-08-26',100.00,102.00,0.00,102.00,2,NULL,0,NULL,NULL),(11,'2020-08-06',14,10,'2020-08-20',200.00,220.00,0.00,220.00,3,NULL,1,NULL,NULL),(12,'2020-08-06',14,10,'2020-08-20',200.00,220.00,0.00,220.00,3,NULL,1,NULL,NULL),(13,'2020-08-06',14,10,'2020-08-20',200.00,220.00,0.00,220.00,3,NULL,1,NULL,NULL),(14,'2020-08-06',13,3,'2020-08-19',100.00,103.00,0.00,103.00,2,NULL,1,NULL,NULL),(15,'2020-08-06',31,15,'2020-09-06',435345.00,500646.75,9000.00,491647.00,3,NULL,1,NULL,NULL),(16,'2020-08-07',23,20,'2020-08-30',212.00,254.40,10.00,244.00,2,NULL,1,NULL,NULL),(17,'2020-08-07',20,8,'2020-08-27',412.00,444.96,40.00,405.00,2,NULL,1,NULL,NULL),(18,'2020-08-07',20,8,'2020-08-27',412.00,444.96,40.00,405.00,2,NULL,1,NULL,NULL),(19,'2020-08-07',19,6,'2020-08-26',1324.00,1403.44,26.00,1377.00,2,NULL,1,NULL,NULL),(20,'2020-08-07',7,3,'2020-08-14',12.00,12.36,10.00,2.00,1,NULL,1,NULL,NULL),(21,'2020-08-07',1,2,'2020-08-08',200.00,204.00,2.00,202.00,2,'2020-08-07 21:42:51',1,49,NULL),(22,'2020-08-08',3,2,'2020-08-11',12.00,12.24,0.00,12.00,1,'2020-08-08 01:37:41',1,51,NULL),(24,'2020-08-08',18,2,'2020-08-26',12.00,12.24,0.00,12.00,3,'2020-08-08 13:14:33',1,56,NULL),(25,'2020-08-09',17,2,'2020-08-26',462.00,471.24,0.00,471.00,1,'2020-08-09 01:13:17',1,58,NULL),(27,'2020-08-09',10,4,'2020-08-19',229.00,238.16,0.00,238.00,1,'2020-08-09 01:24:27',1,60,NULL),(28,'2020-08-09',19,2,'2020-08-28',400.00,408.00,0.00,408.00,3,'2020-08-09 01:25:54',1,61,NULL),(29,'2020-08-09',9,5,'2020-08-18',615.00,645.75,0.00,646.00,3,'2020-08-09 01:31:14',1,62,NULL),(30,'2020-08-10',15,3,'2020-08-25',14.00,14.42,0.00,14.00,3,'2020-08-10 00:25:02',0,64,NULL),(32,'2020-08-12',12,9,'2020-08-24',448.00,488.32,0.00,488.32,7,'2020-08-12 22:00:41',1,67,NULL),(33,'2020-08-12',9,0,'2020-08-21',450.00,450.00,0.00,450.00,2,'2020-08-12 23:39:27',1,69,NULL),(34,'2020-08-13',13,0,'2020-08-26',298.00,298.00,0.00,298.00,7,'2020-08-13 00:00:19',1,71,NULL),(35,'2020-08-13',16,0,'2020-08-29',246.00,246.00,0.00,246.00,4,'2020-08-13 00:04:44',0,72,NULL),(36,'2020-08-16',1,0,'2020-08-17',12.00,12.00,0.00,12.00,9,'2020-08-16 20:56:43',1,99,NULL),(37,'2020-08-16',14,9,'2020-08-30',489.00,533.01,5.00,528.01,2,'2020-08-16 22:57:22',1,102,NULL);
/*!40000 ALTER TABLE `detalle_credito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_venta`
--

DROP TABLE IF EXISTS `detalle_venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_venta` (
  `id_detalle` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_venta` bigint(20) DEFAULT NULL,
  `codigo` bigint(20) DEFAULT NULL,
  `unidades_x_producto` bigint(20) DEFAULT NULL,
  `total_x_producto` decimal(9,2) DEFAULT NULL,
  PRIMARY KEY (`id_detalle`),
  KEY `id_venta` (`id_venta`),
  CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_venta`
--

LOCK TABLES `detalle_venta` WRITE;
/*!40000 ALTER TABLE `detalle_venta` DISABLE KEYS */;
INSERT INTO `detalle_venta` VALUES (2,32,1,2,24.00),(3,32,2,1,200.00),(4,32,3,1,200.00),(5,33,1,2,24.00),(6,33,2,7,1400.00),(7,33,3,5,1000.00),(8,33,7,1,200.00),(9,33,11,3,600.00),(10,33,12,2,400.00),(11,33,13,4,800.00),(12,34,3,2,400.00),(13,35,1,1,12.00),(14,36,1,1,12.00),(15,36,2,1,200.00),(16,36,3,2,400.00),(17,37,1,1,12.00),(18,38,1,1,12.00),(19,39,2,1,200.00),(20,39,3,1,200.00),(21,45,1,1,12.00),(22,47,10,5,250.00),(23,48,7,1,200.00),(24,49,2,1,200.00),(25,50,3,3,600.00),(26,51,1,1,12.00),(27,52,1,1,12.00),(28,53,2,1,200.00),(29,54,2,2,400.00),(30,56,1,1,12.00),(31,57,1,1,12.00),(32,58,5,1,200.00),(33,58,6,1,62.00),(34,58,7,1,200.00),(35,60,4,1,215.00),(36,60,9,1,14.00),(37,61,2,2,400.00),(38,62,2,1,200.00),(39,62,3,1,200.00),(40,62,4,1,215.00),(41,63,1,1,12.00),(42,64,9,1,14.00),(43,65,2,1,200.00),(44,65,24,1,10.00),(45,67,3,1,200.00),(46,67,5,1,180.00),(47,67,15,1,22.00),(48,67,19,1,36.00),(49,67,25,1,10.00),(50,68,11,1,25.00),(51,68,12,1,200.00),(52,68,18,1,48.00),(53,68,23,1,78.00),(54,69,4,1,215.00),(55,69,8,1,35.00),(56,69,14,1,200.00),(57,70,7,1,150.00),(58,70,14,1,200.00),(59,70,21,1,56.00),(60,70,22,1,76.00),(61,70,23,1,78.00),(62,71,7,1,150.00),(63,71,8,2,70.00),(64,71,23,1,78.00),(65,72,3,1,200.00),(66,72,19,1,36.00),(67,72,24,1,10.00),(68,74,6,1,62.00),(69,75,2,1,200.00),(70,76,2,1,200.00),(71,76,3,2,400.00),(72,76,8,1,35.00),(73,93,6,1,62.00),(74,94,2,1,200.00),(75,94,4,1,215.00),(76,95,3,1,200.00),(77,95,11,1,25.00),(78,96,4,1,215.00),(79,96,22,1,76.00),(80,97,4,1,215.00),(81,98,4,1,215.00),(82,99,1,1,12.00),(83,100,5,1,180.00),(84,101,2,1,200.00),(85,102,1,1,12.00),(86,102,10,1,50.00),(87,102,11,1,25.00),(88,102,14,1,200.00),(89,102,15,1,22.00),(90,102,18,1,48.00),(91,102,21,1,56.00),(92,102,22,1,76.00),(93,103,31,81,22680.00),(94,104,31,17,4760.00),(95,105,3,1,200.00);
/*!40000 ALTER TABLE `detalle_venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gastos`
--

DROP TABLE IF EXISTS `gastos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gastos` (
  `id_gasto` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_nota_compra` bigint(20) DEFAULT NULL,
  `id_proov` int(10) DEFAULT NULL,
  `total` decimal(9,2) DEFAULT NULL,
  `fecha_alta` date DEFAULT NULL,
  PRIMARY KEY (`id_gasto`),
  KEY `id_proov` (`id_proov`),
  CONSTRAINT `gastos_ibfk_1` FOREIGN KEY (`id_proov`) REFERENCES `proveedores` (`id_proov`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gastos`
--

LOCK TABLES `gastos` WRITE;
/*!40000 ALTER TABLE `gastos` DISABLE KEYS */;
INSERT INTO `gastos` VALUES (1,1,2,800.00,'2020-08-05'),(2,2,3,800.00,'2020-08-06'),(3,3,4,1200.00,'2020-08-06'),(4,2,2,2000.00,'2020-08-07'),(5,4,9,1475.00,'2020-08-13'),(6,5,8,3700.00,'2020-08-13'),(7,6,8,2600.00,'2020-08-13'),(8,7,8,2200.00,'2020-08-13'),(9,8,7,2300.00,'2020-08-13'),(10,9,3,1300.00,'2020-08-13'),(11,10,11,2222.00,'2020-08-21'),(12,11,10,3333.00,'2020-08-21'),(13,12,14,4444.00,'2020-08-21');
/*!40000 ALTER TABLE `gastos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historial_credito`
--

DROP TABLE IF EXISTS `historial_credito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historial_credito` (
  `id_historial` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_abono` bigint(20) DEFAULT NULL,
  `cantidad_por_pagar` decimal(9,2) DEFAULT NULL,
  PRIMARY KEY (`id_historial`),
  KEY `id_abono` (`id_abono`),
  CONSTRAINT `id_abono` FOREIGN KEY (`id_abono`) REFERENCES `abono` (`id_abono`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historial_credito`
--

LOCK TABLES `historial_credito` WRITE;
/*!40000 ALTER TABLE `historial_credito` DISABLE KEYS */;
INSERT INTO `historial_credito` VALUES (1,1,13.00),(2,1,11.42);
/*!40000 ALTER TABLE `historial_credito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historial_inventario`
--

DROP TABLE IF EXISTS `historial_inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historial_inventario` (
  `id_update` bigint(20) NOT NULL AUTO_INCREMENT,
  `codigo` bigint(20) DEFAULT NULL,
  `new_unidades` bigint(20) DEFAULT NULL,
  `new_costo` decimal(9,2) DEFAULT NULL,
  `new_precio` decimal(9,2) DEFAULT NULL,
  `new_fecha_cad` date DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `new_id_gasto` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id_update`),
  KEY `codigo` (`codigo`),
  CONSTRAINT `historial_inventario_ibfk_1` FOREIGN KEY (`codigo`) REFERENCES `inventario` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historial_inventario`
--

LOCK TABLES `historial_inventario` WRITE;
/*!40000 ALTER TABLE `historial_inventario` DISABLE KEYS */;
INSERT INTO `historial_inventario` VALUES (1,10,81,25.00,30.00,'2020-10-03','2020-08-03',NULL),(2,10,8,25.00,30.00,'2020-10-03','2020-08-03',NULL),(3,10,8,35.00,30.00,'2020-10-03','2020-08-03',NULL),(4,10,8,35.00,50.00,'2020-10-03','2020-08-03',NULL),(5,3,6,100.00,200.00,'2020-07-30','2020-08-03',NULL),(6,11,31,15.00,25.00,NULL,'2020-08-03',NULL),(7,1,100,10.00,12.00,'2020-12-12','2020-08-08',NULL),(8,2,102,200.00,200.00,'2020-10-30','2020-08-08',NULL),(9,3,100,100.00,200.00,'2020-07-30','2020-08-08',NULL),(10,9,2,11.00,14.00,NULL,'2020-08-10',NULL),(11,7,2,100.00,200.00,'2020-10-03','2020-08-11',NULL),(12,5,8,150.00,200.00,'2020-08-03','2020-08-12',NULL),(13,5,8,160.00,200.00,'2020-08-03','2020-08-12',NULL),(14,5,8,160.00,180.00,'2020-08-03','2020-08-12',NULL),(15,5,8,160.00,180.00,'2020-08-04','2020-08-12',NULL),(16,5,8,160.00,180.00,'2020-08-28','2020-08-12',NULL),(17,5,8,160.00,180.00,'2020-08-28','2020-08-12',NULL),(18,5,8,160.00,180.00,'2020-08-28','2020-08-12',NULL),(19,7,2,120.00,200.00,'2020-10-03','2020-08-12',NULL),(20,7,2,120.00,150.00,'2020-10-03','2020-08-12',NULL),(21,7,2,120.00,150.00,'2020-10-09','2020-08-12',NULL),(22,7,2,120.00,150.00,'2020-10-09','2020-08-12',NULL),(23,7,2,120.00,150.00,'2020-10-09','2020-08-12',NULL),(24,20,30,24.00,45.00,NULL,'2020-08-12',NULL),(25,20,30,40.00,45.00,NULL,'2020-08-12',NULL),(26,20,30,40.00,50.00,NULL,'2020-08-12',NULL),(27,20,30,40.00,50.00,NULL,'2020-08-12',NULL),(28,20,3,40.00,50.00,NULL,'2020-08-12',NULL),(29,20,1,40.00,50.00,NULL,'2020-08-12',NULL),(30,20,1,40.00,50.00,NULL,'2020-08-12',NULL),(31,17,6,15.00,26.00,NULL,'2020-08-12',NULL),(32,20,1,44.00,50.00,NULL,'2020-08-12',NULL),(33,20,1,44.00,54.00,NULL,'2020-08-12',NULL),(34,20,2,44.00,54.00,NULL,'2020-08-12',NULL),(35,31,100,240.00,280.00,NULL,'2020-08-16',NULL),(36,7,20,120.00,150.00,'2020-10-09','2020-08-19',NULL),(37,4,50,110.00,215.00,'2020-10-06','2020-08-19',NULL),(38,16,30,3.00,5.00,'2020-08-13','2020-08-19',NULL);
/*!40000 ALTER TABLE `historial_inventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historial_pago_creditos`
--

DROP TABLE IF EXISTS `historial_pago_creditos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historial_pago_creditos` (
  `id_pago_credito` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_abono` bigint(20) DEFAULT NULL,
  `id_detalle_credito` bigint(20) DEFAULT NULL,
  `monto_por_pagar` decimal(9,2) DEFAULT NULL,
  PRIMARY KEY (`id_pago_credito`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historial_pago_creditos`
--

LOCK TABLES `historial_pago_creditos` WRITE;
/*!40000 ALTER TABLE `historial_pago_creditos` DISABLE KEYS */;
INSERT INTO `historial_pago_creditos` VALUES (1,4,15,491600.00),(2,5,15,491553.00),(3,6,15,491000.00),(4,7,15,490508.00),(5,8,15,487508.00),(6,9,19,1339.00),(7,10,19,539.00),(8,11,19,-461.00),(9,12,27,215.00),(10,13,35,0.00),(11,14,15,397508.00),(12,15,15,397507.00),(13,16,19,-1461.00),(14,17,28,400.00),(15,18,9,100.00),(16,19,11,200.00),(17,20,29,600.00),(18,21,33,400.00),(19,22,34,290.00),(20,23,10,100.00),(21,24,32,400.32),(22,25,16,200.00),(23,26,14,100.00),(24,27,30,0.00),(25,28,10,0.00);
/*!40000 ALTER TABLE `historial_pago_creditos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingresos`
--

DROP TABLE IF EXISTS `ingresos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingresos` (
  `id_ingreso` bigint(20) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `cantidad_inicial` decimal(9,2) DEFAULT NULL,
  `ingresos_del_dia` decimal(9,2) DEFAULT NULL,
  `cantidad_final` decimal(9,2) DEFAULT NULL,
  PRIMARY KEY (`id_ingreso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingresos`
--

LOCK TABLES `ingresos` WRITE;
/*!40000 ALTER TABLE `ingresos` DISABLE KEYS */;
/*!40000 ALTER TABLE `ingresos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventario`
--

DROP TABLE IF EXISTS `inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventario` (
  `id_inv` bigint(10) NOT NULL AUTO_INCREMENT,
  `codigo` bigint(30) NOT NULL,
  `unidades` bigint(10) DEFAULT NULL,
  `costo` decimal(9,2) DEFAULT NULL,
  `precio` decimal(9,2) DEFAULT NULL,
  `fecha_ingreso` datetime DEFAULT NULL,
  `fecha_caducidad` date DEFAULT NULL,
  `id_gasto` bigint(20) DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_inv`,`codigo`),
  KEY `codigo` (`codigo`),
  KEY `id_gasto` (`id_gasto`),
  CONSTRAINT `id_gasto` FOREIGN KEY (`id_gasto`) REFERENCES `gastos` (`id_gasto`),
  CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`codigo`) REFERENCES `producto` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventario`
--

LOCK TABLES `inventario` WRITE;
/*!40000 ALTER TABLE `inventario` DISABLE KEYS */;
INSERT INTO `inventario` VALUES (1,1,95,10.00,12.00,'2020-08-01 18:23:12','2020-12-12',NULL,1),(2,2,94,200.00,200.00,'2020-08-02 23:59:54','2020-10-30',NULL,1),(3,3,93,100.00,200.00,'2020-08-02 20:56:11','2020-07-30',NULL,1),(4,4,50,110.00,215.00,'2020-08-02 19:43:08','2020-10-06',NULL,1),(5,10,3,35.00,50.00,'2020-08-03 13:35:16','2020-10-03',NULL,1),(6,5,6,160.00,180.00,'2020-08-01 20:24:09','2020-08-28',NULL,1),(7,7,20,120.00,150.00,'2020-08-01 21:54:36','2020-10-09',NULL,1),(9,11,28,15.00,25.00,'2020-08-03 13:41:58',NULL,NULL,1),(10,12,35,100.00,200.00,'2020-08-03 12:53:18',NULL,NULL,1),(11,13,13,100.00,200.00,'2020-08-01 12:59:49','2020-08-08',NULL,1),(13,14,11,100.00,200.00,'2020-07-30 01:52:53',NULL,NULL,1),(14,15,38,20.00,22.00,'2020-08-04 18:22:43','2020-08-29',NULL,1),(15,16,30,3.00,5.00,'2020-08-04 18:41:11','2020-08-13',NULL,0),(16,6,6,60.00,62.00,'2020-08-08 00:00:00',NULL,NULL,1),(17,8,126,30.00,35.00,'2020-08-08 00:00:00','2020-12-11',NULL,1),(18,9,2,11.00,14.00,'2020-08-08 00:00:00',NULL,NULL,0),(19,17,6,15.00,26.00,'2020-08-08 00:00:00',NULL,NULL,0),(20,18,97,45.00,48.00,'2020-08-08 00:00:00',NULL,NULL,1),(21,19,43,34.00,36.00,'2020-08-08 00:00:00',NULL,NULL,1),(22,20,2,44.00,54.00,'2020-08-08 00:00:00',NULL,NULL,1),(23,21,56,26.00,56.00,'2020-08-08 00:00:00',NULL,NULL,1),(24,22,453,45.00,76.00,'2020-08-08 00:00:00',NULL,NULL,1),(25,23,53,45.00,78.00,'2020-08-08 00:00:00',NULL,NULL,1),(28,24,18,8.00,10.00,'2020-08-11 00:00:00','2020-09-06',NULL,1),(29,25,8,8.00,10.00,'2020-08-12 00:00:00',NULL,NULL,1),(30,31,100,240.00,280.00,'2020-08-16 00:00:00',NULL,NULL,1),(31,27,30,6.00,8.00,'2020-08-19 00:00:00',NULL,NULL,1),(32,30,60,11.00,14.00,'2020-08-19 00:00:00',NULL,NULL,1);
/*!40000 ALTER TABLE `inventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventarioTempXprod`
--

DROP TABLE IF EXISTS `inventarioTempXprod`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventarioTempXprod` (
  `id_inv_x_prod` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` bigint(20) NOT NULL,
  `unidades_temp_inv` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_inv_x_prod`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventarioTempXprod`
--

LOCK TABLES `inventarioTempXprod` WRITE;
/*!40000 ALTER TABLE `inventarioTempXprod` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventarioTempXprod` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `id_producto` bigint(20) DEFAULT NULL,
  `codigo` bigint(30) NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `costo` decimal(9,2) DEFAULT NULL,
  `precio` decimal(9,2) DEFAULT NULL,
  `fecha_caducidad` date DEFAULT NULL,
  `id_proov` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `codigo_UNIQUE` (`codigo`),
  KEY `fk_relacion` (`id_proov`),
  CONSTRAINT `fk_relacion` FOREIGN KEY (`id_proov`) REFERENCES `proveedores` (`id_proov`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,1,'producto1',1.00,2.00,'2020-05-01',1),(2,2,'producto 2',3.00,4.00,'2020-05-01',2),(3,3,'producto3',5.00,6.00,'2020-05-01',3),(4,4,'producto4',12.00,14.00,'2020-12-12',2),(NULL,5,'descripcion prueba',33.00,66.00,'2020-02-02',2),(NULL,6,'articulo6',6.00,8.00,'2020-12-12',2),(NULL,7,'descripcion prueba',18.00,20.00,'2020-12-12',4),(NULL,8,'articulo8',22.00,24.00,'2020-12-12',1),(NULL,9,'articulo9',9.00,11.00,'2020-03-03',3),(NULL,10,'descripcion prueba',102.00,122.00,'2022-02-02',1),(NULL,11,'descripcion prueba',13.00,15.00,'2020-03-03',3),(NULL,12,'descripcion prueba',15.00,16.00,'2020-04-04',3),(NULL,13,'descripcion prueba',13.00,15.00,'2020-04-04',1),(NULL,14,'descripcion prueba',14.00,16.00,'2020-03-03',1),(NULL,15,'sopa maruchan',15.00,16.00,'2020-04-04',1),(NULL,16,'articulo16',NULL,NULL,NULL,1),(NULL,17,'articulo17',NULL,NULL,NULL,4),(NULL,18,'articulo18',NULL,NULL,NULL,1),(NULL,19,'negrito 150g',NULL,NULL,NULL,4),(NULL,20,'articulo 20',NULL,NULL,NULL,1),(NULL,21,'articulo 21',NULL,NULL,NULL,1),(NULL,22,'nutri leche',NULL,NULL,NULL,1),(NULL,23,'articulo 23',NULL,NULL,NULL,1),(NULL,24,'galletas maria',NULL,NULL,NULL,7),(NULL,25,'galleta principe vainilla 320 g',NULL,NULL,NULL,7),(NULL,26,'sopa moderna 300g',NULL,NULL,NULL,8),(NULL,27,'articulo 27',NULL,NULL,NULL,18),(NULL,30,'jugo jumex 480ml',NULL,NULL,NULL,2),(NULL,31,'maiz sonaloense 50kg',NULL,NULL,NULL,2),(NULL,32,'huevo bachoco',NULL,NULL,NULL,14);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedores` (
  `id_proov` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `telefono` bigint(20) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `nombre_responsable` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`id_proov`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedores`
--

LOCK TABLES `proveedores` WRITE;
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
INSERT INTO `proveedores` VALUES (1,'proveedor1','direccion1',3341189,NULL,'responsable1'),(2,'proveedor4','direccion2',3341182,NULL,'responsable2'),(3,'proveedor3','direccion3',3341183,NULL,'responsable3'),(4,'proveedor3','domicilio4',44444,'email4',''),(5,'proveedor5','domicilio5',55555,'email5','responsable5'),(6,'nombreprov','domicilio proov',4534,'gamesa@gmail.com','resposable algo'),(7,'gamesa','cobo 52 santa barbara iztapalapa CDMX',7333363368,'mccormic@gmail.com','mario castaÃ±eda lopez'),(8,'moderna','calle roble 22 tlalpan cdmx',5544883298,'moderna@gmail.com','luis estrada ordoÃ±ez'),(9,'BIMBO','catalina pastrana s/n col industrial iguala gro',73324754389,'bimbo@gmail.com','marco serrano mota'),(10,'cocacola','',0,'',''),(11,'pepsi co','',0,'',''),(12,'pionner','domicilio5',44444,'piooner@gmail.com','valdemar gomez oropeza'),(13,'knor','jose maria morelos 133',456245645,'knor@gmail.com','alberto rosas vazquez'),(14,'bachoco','libertad 73 colonia nopalera cdmx',5556324467,'bachoco@gmail.com','javier lara fernandez'),(15,'zorro','altamirano 74 col el capire',5532452611,'zorro@gmail.com',''),(16,'reza','hayuntamiento 307',7271003246,'reza@gmail.com','regina reza oropeza'),(17,'reza','hayuntamiento 307',77232456680,'reza@gmail.com','regina reza oropeza'),(18,'alpura','carretera mexico cuernavaca no. 772 milpa alta',5544883298,'alpura@gmail.com','alfredo romero castillo');
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rel_detalle_x_prod`
--

DROP TABLE IF EXISTS `rel_detalle_x_prod`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rel_detalle_x_prod` (
  `id_detalle_x_prod` bigint(20) NOT NULL,
  `id_venta` bigint(20) DEFAULT NULL,
  `id_detalle` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id_detalle_x_prod`),
  KEY `id_venta` (`id_venta`),
  KEY `id_detalle` (`id_detalle`),
  CONSTRAINT `id_detalle` FOREIGN KEY (`id_detalle`) REFERENCES `detalle_venta` (`id_detalle`),
  CONSTRAINT `rel_detalle_x_prod_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rel_detalle_x_prod`
--

LOCK TABLES `rel_detalle_x_prod` WRITE;
/*!40000 ALTER TABLE `rel_detalle_x_prod` DISABLE KEYS */;
/*!40000 ALTER TABLE `rel_detalle_x_prod` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabla1`
--

DROP TABLE IF EXISTS `tabla1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabla1` (
  `campo1` varchar(50) DEFAULT NULL,
  `campo2` varchar(50) DEFAULT NULL,
  `campo3` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabla1`
--

LOCK TABLES `tabla1` WRITE;
/*!40000 ALTER TABLE `tabla1` DISABLE KEYS */;
INSERT INTO `tabla1` VALUES ('uni','doi','treu'),('uni','doi','treu'),('uni','doi','treu'),('primer','15','tercer');
/*!40000 ALTER TABLE `tabla1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabla2`
--

DROP TABLE IF EXISTS `tabla2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabla2` (
  `campo4` varchar(50) DEFAULT NULL,
  `campo5` varchar(50) DEFAULT NULL,
  `campo6` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabla2`
--

LOCK TABLES `tabla2` WRITE;
/*!40000 ALTER TABLE `tabla2` DISABLE KEYS */;
/*!40000 ALTER TABLE `tabla2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temporal`
--

DROP TABLE IF EXISTS `temporal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temporal` (
  `id_autoin` int(11) NOT NULL AUTO_INCREMENT,
  `campo1` varchar(300) DEFAULT NULL,
  `campo2` varchar(300) DEFAULT NULL,
  `campo3` varchar(300) DEFAULT NULL,
  `unidades` int(20) DEFAULT NULL,
  UNIQUE KEY `id_autoin` (`id_autoin`)
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temporal`
--

LOCK TABLES `temporal` WRITE;
/*!40000 ALTER TABLE `temporal` DISABLE KEYS */;
INSERT INTO `temporal` VALUES (99,'2','producto2','5.00',1),(100,'2','producto2','5.00',1),(101,'3','producto3','5.00',1),(102,'2','producto2','5.00',1),(103,'2','producto2','5.00',1),(104,'3','producto3','5.00',1),(105,'2','producto2','5.00',1),(106,'3','producto3','5.00',1),(107,'2','producto2','5.00',1),(108,'2','producto2','5.00',1),(109,'3','producto3','5.00',1),(110,'2','producto2','5.00',1),(111,'2','producto2','5.00',1),(112,'2','producto2','5.00',1),(113,'2','producto2','5.00',1),(114,'3','producto3','5.00',1),(115,'2','producto2','5.00',1),(116,'3','producto3','5.00',1),(117,'2','producto2','5.00',1),(118,'2','producto2','5.00',1),(119,'3','producto3','5.00',1),(120,'2','producto2','5.00',1),(121,'2','producto2','5.00',1),(122,'2','producto2','5.00',1),(123,'2','producto2','5.00',1),(124,'2','producto2','5.00',1),(125,'2','producto2','5.00',1),(126,'2','producto2','5.00',1),(127,'3','producto3','5.00',1),(128,'2','producto2','5.00',1),(129,'2','producto2','5.00',1),(130,'2','producto2','5.00',1),(131,'2','producto2','5.00',1),(132,'2','producto2','5.00',1),(133,'2','producto2','5.00',1),(134,'3','producto3','5.00',1),(135,'2','producto2','5.00',1),(136,'2','producto2','5.00',1),(137,'3','producto3','5.00',1),(138,'2','producto2','5.00',1),(139,'2','producto2','5.00',1),(140,'2','producto2','5.00',1),(141,'2','producto2','5.00',1),(142,'3','producto3','5.00',1),(143,'2','producto2','5.00',1),(144,'1','producto1','5.00',1),(145,'2','producto2','5.00',1),(146,'3','producto3','5.00',1),(147,'1','producto1','5.00',1),(148,'2','producto2','5.00',1),(149,'3','producto3','5.00',1),(150,'5','productoPrueba2','7.00',1),(151,'7','articulo7','8.00',1),(152,'10','articulo102','11.00',1),(153,'1','producto1','5.00',1),(154,'1','producto1','5.00',1),(155,'3','producto3','5.00',1),(156,'2','producto2','5.00',1),(157,'10','articulo102','11.00',1),(158,'7','articulo7','8.00',1),(159,'1','producto1','5.00',1),(160,'10','articulo102','11.00',1);
/*!40000 ALTER TABLE `temporal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temporal2`
--

DROP TABLE IF EXISTS `temporal2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temporal2` (
  `id_autoin` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` bigint(20) NOT NULL,
  `nombre_producto` varchar(300) DEFAULT NULL,
  `precioBD` decimal(9,2) DEFAULT NULL,
  `unidadesInput` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_autoin`,`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temporal2`
--

LOCK TABLES `temporal2` WRITE;
/*!40000 ALTER TABLE `temporal2` DISABLE KEYS */;
/*!40000 ALTER TABLE `temporal2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `nombre` varchar(300) DEFAULT NULL,
  `fecha_alta` datetime DEFAULT NULL,
  `estatus_usuario` int(11) DEFAULT NULL,
  `tipo_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'admin','aG9sYW11bmRv','Alfonso Emmanuel Lira Zavaleta','2020-08-19 17:10:11',1,1),(2,'usuario1','bWV4aWNv','nombre de usuario1','2020-08-19 17:10:11',1,1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ventas` (
  `id_venta` bigint(20) NOT NULL AUTO_INCREMENT,
  `total_unidades` bigint(20) DEFAULT NULL,
  `totalVenta` decimal(9,2) DEFAULT NULL,
  `cantidad_pagada` decimal(9,2) DEFAULT NULL,
  `cambio` decimal(9,2) DEFAULT NULL,
  `id_cliente` bigint(20) DEFAULT NULL,
  `fecha_venta` date DEFAULT NULL,
  `hora_venta` time DEFAULT NULL,
  `tipo_venta` bigint(10) DEFAULT NULL,
  PRIMARY KEY (`id_venta`),
  KEY `id_cliente` (`id_cliente`),
  CONSTRAINT `puntoventa_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (3,4,800.00,1000.00,200.00,1,'2020-08-02','00:21:40',1),(4,3,600.00,700.00,100.00,3,'2020-08-02','00:32:53',1),(5,3,600.00,700.00,100.00,3,'2020-08-02','00:35:42',1),(6,1,12.00,16.00,4.00,1,'2020-08-02','11:49:21',1),(7,1,12.00,15.00,3.00,1,'2020-08-02','12:12:47',1),(8,1,12.00,15.00,3.00,1,'2020-08-02','12:13:55',1),(9,1,12.00,16.00,4.00,1,'2020-08-02','12:16:36',1),(10,1,12.00,17.00,5.00,1,'2020-08-02','12:17:19',1),(11,1,12.00,15.00,3.00,1,'2020-08-02','12:37:49',1),(12,1,12.00,17.00,5.00,1,'2020-08-02','12:40:18',1),(13,1,12.00,15.00,3.00,1,'2020-08-02','12:43:26',1),(14,1,12.00,20.00,8.00,1,'2020-08-02','12:48:30',1),(15,1,12.00,27.00,15.00,1,'2020-08-02','13:50:20',1),(16,1,12.00,57.00,45.00,1,'2020-08-02','13:58:04',1),(17,1,12.00,89.00,77.00,1,'2020-08-02','13:59:16',1),(18,1,12.00,18.00,6.00,1,'2020-08-02','14:00:55',1),(19,1,12.00,98.00,86.00,1,'2020-08-02','14:14:09',1),(20,1,12.00,15.00,3.00,1,'2020-08-02','14:34:00',1),(21,10,1436.00,1500.00,64.00,1,'2020-08-02','14:35:33',1),(22,1,12.00,18.00,6.00,1,'2020-08-02','16:27:15',1),(23,1,12.00,19.00,7.00,1,'2020-08-02','16:50:24',1),(24,4,612.00,700.00,88.00,1,'2020-08-02','17:03:58',1),(25,10,1436.00,1450.00,14.00,1,'2020-08-02','17:13:41',1),(26,8,848.00,900.00,52.00,1,'2020-08-02','17:49:09',1),(27,15,2248.00,2250.00,2.00,2,'2020-08-02','18:12:24',1),(28,12,1648.00,1750.00,102.00,1,'2020-08-02','19:27:38',1),(29,2,212.00,300.00,88.00,1,'2020-08-02','19:38:20',1),(30,4,612.00,677.00,65.00,1,'2020-08-02','19:41:39',1),(31,7,836.00,1000.00,164.00,1,'2020-08-02','19:43:36',1),(32,4,424.00,599.00,175.00,1,'2020-08-02','20:22:20',1),(33,24,4424.00,5000.00,576.00,1,'2020-08-02','20:35:04',1),(34,2,400.00,500.00,100.00,1,'2020-08-02','21:54:01',1),(35,1,12.00,20.00,8.00,1,'2020-08-03','12:16:19',1),(36,4,612.00,615.00,3.00,1,'2020-08-07','17:45:14',1),(37,1,12.00,19.00,7.00,1,'2020-08-07','19:57:15',1),(38,1,12.00,18.00,6.00,1,'2020-08-07','20:02:31',1),(39,2,400.00,0.00,0.00,2,'2020-08-07','20:31:40',0),(43,0,0.00,0.00,0.00,1,'2020-08-07','21:10:16',0),(44,0,0.00,0.00,0.00,1,'2020-08-07','21:10:42',1),(45,1,12.00,0.00,0.00,1,'2020-08-07','21:14:57',0),(46,0,0.00,0.00,0.00,3,'2020-08-07','21:24:28',0),(47,5,250.00,0.00,0.00,3,'2020-08-07','21:28:43',0),(48,1,200.00,0.00,0.00,2,'2020-08-07','21:37:37',0),(49,1,200.00,0.00,0.00,2,'2020-08-07','21:42:50',0),(50,3,600.00,700.00,100.00,1,'2020-08-08','01:32:51',1),(51,1,12.00,0.00,0.00,1,'2020-08-08','01:37:41',0),(52,1,12.00,15.00,3.00,1,'2020-08-08','01:52:11',1),(53,1,200.00,400.00,200.00,1,'2020-08-08','01:54:45',1),(54,2,400.00,500.00,100.00,1,'2020-08-08','01:58:01',1),(56,1,12.00,0.00,0.00,3,'2020-08-08','13:14:33',0),(57,1,12.00,16.00,4.00,1,'2020-08-08','13:15:18',1),(58,3,462.00,0.00,0.00,1,'2020-08-09','01:13:16',0),(60,2,229.00,0.00,0.00,1,'2020-08-09','01:24:26',0),(61,2,400.00,0.00,0.00,3,'2020-08-09','01:25:54',0),(62,3,615.00,0.00,0.00,3,'2020-08-09','01:31:14',0),(63,1,12.00,0.00,0.00,3,'2020-08-10','00:22:06',0),(64,1,14.00,0.00,0.00,3,'2020-08-10','00:25:02',0),(65,2,210.00,0.00,0.00,7,'2020-08-12','21:32:54',0),(67,5,448.00,0.00,0.00,7,'2020-08-12','22:00:41',0),(68,4,351.00,0.00,0.00,2,'2020-08-12','23:36:42',0),(69,3,450.00,0.00,0.00,2,'2020-08-12','23:39:27',0),(70,5,560.00,0.00,0.00,7,'2020-08-12','23:55:47',0),(71,4,298.00,0.00,0.00,7,'2020-08-13','00:00:18',0),(72,3,246.00,0.00,0.00,4,'2020-08-13','00:04:44',0),(74,1,62.00,70.00,8.00,5,'2020-08-14','00:40:56',1),(75,1,200.00,201.00,1.00,1,'2020-08-16','00:29:19',1),(76,4,635.00,650.00,15.00,7,'2020-08-16','00:36:43',1),(93,1,62.00,63.00,1.00,1,'2020-08-16','15:18:28',1),(94,2,415.00,415.00,0.00,1,'2020-08-16','15:23:42',1),(95,2,225.00,228.00,3.00,1,'2020-08-16','15:36:11',1),(96,2,291.00,300.00,9.00,9,'2020-08-16','15:37:41',1),(97,1,215.00,0.00,0.00,1,'2020-08-16','19:58:09',0),(98,1,215.00,0.00,0.00,1,'2020-08-16','20:35:32',0),(99,1,12.00,0.00,0.00,9,'2020-08-16','20:56:43',0),(100,1,180.00,180.00,0.00,1,'2020-08-16','21:11:47',1),(101,1,200.00,201.00,1.00,1,'2020-08-16','22:42:27',1),(102,8,489.00,0.00,0.00,2,'2020-08-16','22:57:21',0),(103,81,22680.00,22700.00,20.00,1,'2020-08-16','23:07:21',1),(104,17,4760.00,5000.00,240.00,1,'2020-08-16','23:08:02',1),(105,1,200.00,201.00,1.00,1,'2020-08-23','21:57:39',1);
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-08-24  1:44:18
