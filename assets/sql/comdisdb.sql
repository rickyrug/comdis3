CREATE DATABASE  IF NOT EXISTS `comdis` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `comdis`;
-- MySQL dump 10.13  Distrib 5.6.19, for osx10.7 (i386)
--
-- Host: rickyrug-pc    Database: comdis
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.16-MariaDB

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
-- Table structure for table `client_account_movements`
--

DROP TABLE IF EXISTS `client_account_movements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client_account_movements` (
  `idaccount_movement` int(11) NOT NULL AUTO_INCREMENT,
  `idaccount` int(11) NOT NULL,
  `value` decimal(20,5) NOT NULL,
  `type` varchar(2) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `modification_date` datetime DEFAULT NULL,
  `modification_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`idaccount_movement`),
  KEY `fk_accmov_cliaccount_idx` (`idaccount`),
  CONSTRAINT `fk_accmov_cliaccount` FOREIGN KEY (`idaccount`) REFERENCES `client_accounts` (`idaccount`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_account_movements`
--

LOCK TABLES `client_account_movements` WRITE;
/*!40000 ALTER TABLE `client_account_movements` DISABLE KEYS */;
/*!40000 ALTER TABLE `client_account_movements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client_accounts`
--

DROP TABLE IF EXISTS `client_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client_accounts` (
  `idaccount` int(11) NOT NULL AUTO_INCREMENT,
  `idclient` int(11) NOT NULL,
  `credit` decimal(20,5) NOT NULL DEFAULT '0.00000',
  `status` varchar(2) NOT NULL DEFAULT 'AC',
  `create_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `modification_date` datetime DEFAULT NULL,
  `modification_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`idaccount`),
  UNIQUE KEY `idclient_UNIQUE` (`idclient`),
  CONSTRAINT `fk_cliacc_client` FOREIGN KEY (`idclient`) REFERENCES `clients` (`idclient`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_accounts`
--

LOCK TABLES `client_accounts` WRITE;
/*!40000 ALTER TABLE `client_accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `client_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `idclient` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `rfc` varchar(45) DEFAULT NULL,
  `status` varchar(2) NOT NULL DEFAULT 'AC',
  `create_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `modification_date` datetime DEFAULT NULL,
  `modification_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`idclient`),
  UNIQUE KEY `clientsuq` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (27,'Booxiarania','12345522222','AC','2016-10-02 21:39:13',1,'2016-10-03 22:10:18',1),(28,'Luisa','123456','AC','2016-10-02 21:43:35',1,NULL,NULL),(29,'Test222333','1234562222','AC','2016-10-02 21:45:24',1,'2016-10-03 22:07:58',1),(30,'Ricardo333','12345634456222','AC','2016-10-02 15:47:08',1,'2016-10-04 21:55:51',1),(31,'Boox','1234567','AC','2016-10-02 14:47:51',1,NULL,NULL),(32,'testing12234','letsgo7898744','AC','2016-10-02 15:05:40',1,'2016-10-03 22:10:46',1);
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients_details`
--

DROP TABLE IF EXISTS `clients_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients_details` (
  `idclients_detail` int(11) NOT NULL AUTO_INCREMENT,
  `idclient` int(11) NOT NULL,
  `idvariable` int(11) NOT NULL,
  `value` varchar(45) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `modification_date` datetime DEFAULT NULL,
  `modification_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`idclients_detail`,`idclient`,`idvariable`),
  KEY `fk_cldtl_client_idx` (`idclient`),
  KEY `fk_cldtl_variable_idx` (`idvariable`),
  CONSTRAINT `fk_cldtl_client` FOREIGN KEY (`idclient`) REFERENCES `clients` (`idclient`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cldtl_variable` FOREIGN KEY (`idvariable`) REFERENCES `variables` (`idvariable`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients_details`
--

LOCK TABLES `clients_details` WRITE;
/*!40000 ALTER TABLE `clients_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `clients_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients_prices`
--

DROP TABLE IF EXISTS `clients_prices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients_prices` (
  `idclients_prices` int(11) NOT NULL AUTO_INCREMENT,
  `idclient` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  `price` decimal(20,10) NOT NULL,
  `valid_date_due` datetime NOT NULL,
  `creation_date` datetime NOT NULL,
  `creation_by` int(11) NOT NULL,
  PRIMARY KEY (`idclients_prices`),
  UNIQUE KEY `clientpricesuq` (`idclient`,`idproduct`,`valid_date_due`),
  KEY `fk_clientprices_product_idx` (`idproduct`),
  KEY `fk_clientprices_client_idx` (`idclient`),
  CONSTRAINT `fk_clientprices_client` FOREIGN KEY (`idclient`) REFERENCES `clients` (`idclient`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_clientprices_product` FOREIGN KEY (`idproduct`) REFERENCES `product` (`idproduct`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients_prices`
--

LOCK TABLES `clients_prices` WRITE;
/*!40000 ALTER TABLE `clients_prices` DISABLE KEYS */;
/*!40000 ALTER TABLE `clients_prices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `idproduct` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(2) NOT NULL DEFAULT 'AC',
  `sell_price` decimal(20,10) NOT NULL,
  `buy_price` decimal(20,10) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `modification_date` datetime DEFAULT NULL,
  `modification_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`idproduct`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'1234','balon de papel','AC',90.0000000000,80.0000000000,'2016-12-28 22:07:16',1,'2016-12-28 22:07:24',1);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_details`
--

DROP TABLE IF EXISTS `product_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_details` (
  `idproduct_details` int(11) NOT NULL AUTO_INCREMENT,
  `idproduct` int(11) NOT NULL,
  `idvariable` int(11) NOT NULL,
  `value` varchar(45) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by` varchar(45) NOT NULL,
  `modification_date` datetime DEFAULT NULL,
  `modification_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`idproduct_details`),
  KEY `fk_prdtl_product_idx` (`idproduct`),
  KEY `fk_prdtl_variable_idx` (`idvariable`),
  CONSTRAINT `fk_prdtl_product` FOREIGN KEY (`idproduct`) REFERENCES `product` (`idproduct`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_prdtl_variable` FOREIGN KEY (`idvariable`) REFERENCES `variables` (`idvariable`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_details`
--

LOCK TABLES `product_details` WRITE;
/*!40000 ALTER TABLE `product_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_dtl`
--

DROP TABLE IF EXISTS `purchase_dtl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase_dtl` (
  `idpurchase_dtl` int(11) NOT NULL AUTO_INCREMENT,
  `idpurchase` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  `quantity` decimal(20,10) NOT NULL,
  `price` decimal(20,10) NOT NULL,
  `creation_date` datetime NOT NULL,
  `creation_by` int(11) NOT NULL,
  `modification_date` datetime DEFAULT NULL,
  `modification_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpurchase_dtl`),
  UNIQUE KEY `uq_purchasedtl` (`idpurchase`,`idproduct`),
  KEY `fk_purchasedtl_purchase_idx` (`idpurchase`),
  KEY `fk_purchasedtl_product_idx` (`idproduct`),
  CONSTRAINT `fk_purchasedtl_product` FOREIGN KEY (`idproduct`) REFERENCES `product` (`idproduct`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_purchasedtl_purchase` FOREIGN KEY (`idpurchase`) REFERENCES `purchase_hdr` (`idpurchase`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_dtl`
--

LOCK TABLES `purchase_dtl` WRITE;
/*!40000 ALTER TABLE `purchase_dtl` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_dtl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_hdr`
--

DROP TABLE IF EXISTS `purchase_hdr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase_hdr` (
  `idpurchase` int(11) NOT NULL AUTO_INCREMENT,
  `idsupplier` int(11) NOT NULL,
  `delivery_date` datetime NOT NULL,
  `purchase_bill` varchar(45) NOT NULL,
  `type` varchar(2) NOT NULL,
  `creation_date` datetime NOT NULL,
  `creation_by` int(11) NOT NULL,
  `modification_date` datetime DEFAULT NULL,
  `modification_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpurchase`),
  KEY `fk_purchase_supplier_idx` (`idsupplier`),
  CONSTRAINT `fk_purchase_supplier` FOREIGN KEY (`idsupplier`) REFERENCES `supplier` (`idsupplier`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_hdr`
--

LOCK TABLES `purchase_hdr` WRITE;
/*!40000 ALTER TABLE `purchase_hdr` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_hdr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sells_dtl`
--

DROP TABLE IF EXISTS `sells_dtl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sells_dtl` (
  `idsells_dtl` int(11) NOT NULL AUTO_INCREMENT,
  `idsell` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  `quantity` decimal(20,10) NOT NULL,
  `price` decimal(20,10) NOT NULL,
  `creation_date` datetime NOT NULL,
  `creation_by` int(11) NOT NULL,
  `modification_date` datetime DEFAULT NULL,
  `modification_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`idsells_dtl`),
  UNIQUE KEY `UQ_sellsdtl` (`idsell`,`idproduct`),
  KEY `fk_sellsdtl_prod_idx` (`idproduct`),
  CONSTRAINT `fk_sells_sellsdtl` FOREIGN KEY (`idsell`) REFERENCES `sells_hdr` (`idsell`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sellsdtl_prod` FOREIGN KEY (`idproduct`) REFERENCES `product` (`idproduct`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sells_dtl`
--

LOCK TABLES `sells_dtl` WRITE;
/*!40000 ALTER TABLE `sells_dtl` DISABLE KEYS */;
/*!40000 ALTER TABLE `sells_dtl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sells_hdr`
--

DROP TABLE IF EXISTS `sells_hdr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sells_hdr` (
  `idsell` int(11) NOT NULL AUTO_INCREMENT,
  `idclient` int(11) NOT NULL,
  `delivery_date` datetime NOT NULL,
  `type` varchar(2) NOT NULL,
  `creation_date` datetime NOT NULL,
  `creation_by` int(11) NOT NULL,
  `modification_date` datetime DEFAULT NULL,
  `modification_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`idsell`),
  KEY `fk_sellshdr_sellshdr_idx` (`idclient`),
  CONSTRAINT `fk_sellshdr_sellshdr` FOREIGN KEY (`idclient`) REFERENCES `clients` (`idclient`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sells_hdr`
--

LOCK TABLES `sells_hdr` WRITE;
/*!40000 ALTER TABLE `sells_hdr` DISABLE KEYS */;
/*!40000 ALTER TABLE `sells_hdr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supplier` (
  `idsupplier` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `rfc` varchar(255) DEFAULT NULL,
  `status` varchar(2) NOT NULL DEFAULT 'AC',
  `create_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `modification_date` datetime DEFAULT NULL,
  `modification_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`idsupplier`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES (1,'Lozar','1233456678','AC','2016-12-28 22:11:12',1,NULL,NULL);
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier_details`
--

DROP TABLE IF EXISTS `supplier_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supplier_details` (
  `idsupplier_detail` int(11) NOT NULL AUTO_INCREMENT,
  `idsupplier` int(11) NOT NULL,
  `idvariable` int(11) NOT NULL,
  `value` varchar(45) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `modification_date` datetime DEFAULT NULL,
  `modification_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`idsupplier_detail`,`idsupplier`,`idvariable`),
  KEY `fk_cldtl_variable_idx` (`idvariable`),
  KEY `fk_cldtl_supplier_idx` (`idsupplier`),
  CONSTRAINT `fk_cldtl_supplier` FOREIGN KEY (`idsupplier`) REFERENCES `supplier` (`idsupplier`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cldtl_variable0` FOREIGN KEY (`idvariable`) REFERENCES `variables` (`idvariable`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier_details`
--

LOCK TABLES `supplier_details` WRITE;
/*!40000 ALTER TABLE `supplier_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `supplier_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `variables`
--

DROP TABLE IF EXISTS `variables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `variables` (
  `idvariable` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  `status` varchar(2) NOT NULL DEFAULT 'AC',
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modification_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`idvariable`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `variables`
--

LOCK TABLES `variables` WRITE;
/*!40000 ALTER TABLE `variables` DISABLE KEYS */;
INSERT INTO `variables` VALUES (1,'Test1','AC','2016-12-28 22:06:33',1,'2016-12-28 22:06:41',1);
/*!40000 ALTER TABLE `variables` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-28 22:23:59

ALTER TABLE `comdis`.`sells_hdr` 
ADD COLUMN `status` VARCHAR(2) NOT NULL AFTER `type`;