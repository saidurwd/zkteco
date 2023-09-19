/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.28-MariaDB : Database - zkteco
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`zkteco` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `zkteco`;

/*Table structure for table `checkinout` */

DROP TABLE IF EXISTS `checkinout`;

CREATE TABLE `checkinout` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `USERID` int(11) DEFAULT NULL COMMENT 'Device User ID',
  `CHECKTIME` datetime DEFAULT NULL COMMENT 'Date',
  `CHECKTYPE` varchar(250) DEFAULT NULL COMMENT 'CHECKTYPE',
  `VERIFYCODE` int(11) DEFAULT NULL COMMENT 'VERIFYCODE',
  `SENSORID` varchar(250) DEFAULT NULL COMMENT 'Device ID',
  `Memoinfo` varchar(250) DEFAULT NULL COMMENT 'Memoinfo',
  `WorkCode` varchar(250) DEFAULT NULL COMMENT 'WorkCode',
  `sn` varbinary(250) DEFAULT NULL COMMENT 'SN',
  `UserExtFmt` int(11) DEFAULT NULL COMMENT 'UserExtFmt',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `checkinout` */

/*Table structure for table `userinfo` */

DROP TABLE IF EXISTS `userinfo`;

CREATE TABLE `userinfo` (
  `USERID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Device User ID',
  `Badgenumber` varchar(250) DEFAULT NULL COMMENT 'User ID',
  `SSN` varchar(250) DEFAULT NULL COMMENT 'Staff ID',
  `Name` varchar(250) DEFAULT NULL COMMENT 'Employee Name',
  `Gender` varchar(250) DEFAULT NULL COMMENT 'Gender',
  PRIMARY KEY (`USERID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `userinfo` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
