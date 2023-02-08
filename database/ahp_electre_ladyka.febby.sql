/*
SQLyog Ultimate v9.50 
MySQL - 5.5.5-10.4.22-MariaDB : Database - ahp_electre_ladyka.febby
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ahp_electre_ladyka.febby` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `ahp_electre_ladyka.febby`;

/*Table structure for table `tb_alternatif` */

DROP TABLE IF EXISTS `tb_alternatif`;

CREATE TABLE `tb_alternatif` (
  `nik` varchar(16) NOT NULL,
  `nama_alternatif` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telpon` varchar(255) DEFAULT NULL,
  `tanggal_survey` date DEFAULT NULL,
  `total` double DEFAULT NULL,
  `rank` int(11) DEFAULT 0,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_alternatif` */

insert  into `tb_alternatif`(`nik`,`nama_alternatif`,`alamat`,`telpon`,`tanggal_survey`,`total`,`rank`) values ('1572022704600001','Eni Eida','DESA UJUNG SAKTI','08129331561','2022-06-17',1,3),('1572023112550003','Iskandar','RT.03 MEKAR JAYA','08951709379','2022-06-17',1,4),('1572024102620001','Leni Dinofita','RT.05 LARIK MELINTANG','08515681581','2022-06-20',1,5),('1572024107530059','Nora Ardiati','DUSUN JALAN PANJANG','083873022168','2022-06-17',2,1),('1572024107610009','Wataniah','DUSUN TITIAN PANJANG','083173022168','2022-06-17',0,8),('1572024107670009','Rahmi Basir','DESA PERMAI INDAH DUSUN JALPA','081383217395','2022-06-19',1,6),('1572024107950002','Ernawati','DUSUN TITIAN PANJANG','081383466953','2022-06-17',2,2),('157202500368001','Rosni','DESA PERMAI INDAH DUSUN JALPA','081383217395','2022-06-19',0,9),('1572025210880001','Sahudi','DESA PERMAI INDAH DUSUN JALPA','081383217395','2022-06-19',1,7),('1572071003550001','Peni Siskawati','DESA KOTO LIMAU MANIS','083116631803','2022-06-12',0,10);

/*Table structure for table `tb_crisp` */

DROP TABLE IF EXISTS `tb_crisp`;

CREATE TABLE `tb_crisp` (
  `kode_crisp` int(11) NOT NULL AUTO_INCREMENT,
  `nama_crisp` varchar(255) DEFAULT NULL,
  `kode_kriteria` varchar(16) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  PRIMARY KEY (`kode_crisp`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_crisp` */

insert  into `tb_crisp`(`kode_crisp`,`nama_crisp`,`kode_kriteria`,`nilai`) values (1,'Tidak Ada','C01',2),(2,'Bersama','C01',3),(3,'Milik Sendiri ','C01',5),(4,'Tidak Bekerja','C02',1),(5,'Buruh/Petani','C02',3),(6,'Honorer','C02',5),(7,'Wiraswasta/Pedagang','C02',5),(8,'Rp.0 - Rp.1.200.000','C03',1),(9,'Rp.1.300.000-Rp.1.800.000','C03',2),(10,'Rp.1.900.000- Rp.2.500.000','C03',3),(11,'Lebih dari Rp.3.000.000','C03',4),(12,'1-3 Orang','C04',1),(13,'4-7 Orang','C04',2),(14,'8-11 Orang','C04',3),(15,'12-15 Orang','C04',4),(16,'Ijuk','C05',1),(17,'Genteng','C05',2),(18,'Seng','C05',3),(19,'Asbes','C05',4),(20,'Plesteran Anyaman Bambu','C06',1),(21,'Rumbia','C06',2),(22,'Kayu','C06',3),(23,'Tembok','C06',4),(24,'Tanah','C07',1),(25,'Kayu','C07',2),(26,'Plesteran','C07',3),(27,'Keramik','C07',4),(28,'Sendiri','C08',5),(29,'Bersama','C08',3),(30,'Tidak ada','C08',1);

/*Table structure for table `tb_kriteria` */

DROP TABLE IF EXISTS `tb_kriteria`;

CREATE TABLE `tb_kriteria` (
  `kode_kriteria` varchar(16) NOT NULL,
  `nama_kriteria` varchar(256) NOT NULL,
  PRIMARY KEY (`kode_kriteria`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tb_kriteria` */

insert  into `tb_kriteria`(`kode_kriteria`,`nama_kriteria`) values ('C01','Status Rumah'),('C02','Pekerjaan'),('C03','Penghasilan'),('C04','Jumlah Tanggungan'),('C05','Jenis Atap'),('C06','Jenis Dinding'),('C07','Jenis Lantai'),('C08','MCK');

/*Table structure for table `tb_rel_alternatif` */

DROP TABLE IF EXISTS `tb_rel_alternatif`;

CREATE TABLE `tb_rel_alternatif` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(16) DEFAULT NULL,
  `kode_kriteria` varchar(16) DEFAULT NULL,
  `kode_crisp` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=232 DEFAULT CHARSET=latin1;

/*Data for the table `tb_rel_alternatif` */

insert  into `tb_rel_alternatif`(`ID`,`nik`,`kode_kriteria`,`kode_crisp`) values (215,'1572024107610009','C08',28),(214,'1572024107610009','C07',25),(213,'1572024107610009','C06',21),(212,'1572024107610009','C05',17),(211,'1572024107610009','C04',14),(210,'1572024107610009','C03',9),(209,'1572024107610009','C02',4),(208,'1572024107610009','C01',3),(207,'1572024107670009','C08',29),(206,'1572024107670009','C07',27),(205,'1572024107670009','C06',23),(204,'1572024107670009','C05',19),(203,'1572024107670009','C04',14),(202,'1572024107670009','C03',11),(201,'1572024107670009','C02',7),(67,'1572024107950002','C01',3),(68,'1572024107950002','C02',5),(69,'1572024107950002','C03',10),(70,'1572024107950002','C04',12),(71,'1572024107950002','C05',16),(72,'1572024107950002','C06',22),(73,'1572024107950002','C07',24),(74,'1572024107950002','C08',28),(78,'157202500368001','C01',3),(79,'157202500368001','C02',5),(80,'157202500368001','C03',9),(81,'157202500368001','C04',15),(82,'157202500368001','C05',17),(83,'157202500368001','C06',22),(84,'157202500368001','C07',24),(85,'157202500368001','C08',30),(89,'1572025210880001','C01',3),(90,'1572025210880001','C02',5),(91,'1572025210880001','C03',8),(92,'1572025210880001','C04',13),(93,'1572025210880001','C05',18),(94,'1572025210880001','C06',20),(95,'1572025210880001','C07',24),(96,'1572025210880001','C08',28),(100,'1572071003550001','C01',3),(101,'1572071003550001','C02',4),(102,'1572071003550001','C03',8),(103,'1572071003550001','C04',13),(104,'1572071003550001','C05',17),(105,'1572071003550001','C06',21),(106,'1572071003550001','C07',26),(107,'1572071003550001','C08',30),(199,'1572024107530059','C08',30),(198,'1572024107530059','C07',25),(197,'1572024107530059','C06',21),(196,'1572024107530059','C05',17),(195,'1572024107530059','C04',14),(194,'1572024107530059','C03',11),(193,'1572024107530059','C02',7),(192,'1572024107530059','C01',3),(191,'1572024102620001','C08',29),(190,'1572024102620001','C07',25),(189,'1572024102620001','C06',20),(188,'1572024102620001','C05',16),(187,'1572024102620001','C04',13),(186,'1572024102620001','C03',8),(185,'1572024102620001','C02',4),(184,'1572024102620001','C01',3),(183,'1572023112550003','C08',28),(182,'1572023112550003','C07',26),(181,'1572023112550003','C06',23),(180,'1572023112550003','C05',18),(179,'1572023112550003','C04',13),(178,'1572023112550003','C03',10),(177,'1572023112550003','C02',5),(176,'1572023112550003','C01',3),(175,'1572022704600001','C08',30),(174,'1572022704600001','C07',26),(173,'1572022704600001','C06',23),(172,'1572022704600001','C05',17),(171,'1572022704600001','C04',15),(170,'1572022704600001','C03',11),(169,'1572022704600001','C02',7),(168,'1572022704600001','C01',3),(200,'1572024107670009','C01',3);

/*Table structure for table `tb_rel_kriteria` */

DROP TABLE IF EXISTS `tb_rel_kriteria`;

CREATE TABLE `tb_rel_kriteria` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID1` varchar(16) DEFAULT NULL,
  `ID2` varchar(16) DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=122 DEFAULT CHARSET=latin1;

/*Data for the table `tb_rel_kriteria` */

insert  into `tb_rel_kriteria`(`ID`,`ID1`,`ID2`,`nilai`) values (1,'C01','C01',1),(2,'C02','C01',0.5),(3,'C03','C01',0.333333333),(4,'C04','C01',0.25),(5,'C05','C01',0.2),(6,'C06','C01',0.2),(7,'C07','C01',0.166666666),(8,'C08','C01',0.142857142),(12,'C01','C02',2),(13,'C02','C02',1),(14,'C03','C02',0.5),(15,'C04','C02',0.333333333),(16,'C05','C02',0.25),(17,'C06','C02',0.333333333),(18,'C07','C02',0.2),(19,'C08','C02',0.166666666),(23,'C01','C03',3),(24,'C02','C03',2),(25,'C03','C03',1),(26,'C04','C03',0.333333333),(27,'C05','C03',0.333333333),(28,'C06','C03',0.25),(29,'C07','C03',0.2),(30,'C08','C03',0.166666666),(34,'C01','C04',4),(35,'C02','C04',3),(36,'C03','C04',3),(37,'C04','C04',1),(38,'C05','C04',0.5),(39,'C06','C04',0.333333333),(40,'C07','C04',0.25),(41,'C08','C04',0.2),(45,'C01','C05',5),(46,'C02','C05',4),(47,'C03','C05',3),(48,'C04','C05',2),(49,'C05','C05',1),(50,'C06','C05',0.333333333),(51,'C07','C05',0.333333333),(52,'C08','C05',0.5),(56,'C01','C06',5),(57,'C02','C06',3),(58,'C03','C06',4),(59,'C04','C06',3),(60,'C05','C06',3),(61,'C06','C06',1),(62,'C07','C06',0.142857142),(63,'C08','C06',0.5),(67,'C01','C07',6),(68,'C02','C07',5),(69,'C03','C07',5),(70,'C04','C07',4),(71,'C05','C07',3),(72,'C06','C07',7),(73,'C07','C07',1),(74,'C08','C07',0.5),(78,'C01','C08',7),(79,'C02','C08',6),(80,'C03','C08',6),(81,'C04','C08',5),(82,'C05','C08',2),(83,'C06','C08',2),(84,'C07','C08',2),(85,'C08','C08',1);

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `kode_user` varchar(16) DEFAULT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `user` varchar(16) DEFAULT NULL,
  `pass` varchar(16) DEFAULT NULL,
  `level` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_user` */

insert  into `tb_user`(`kode_user`,`nama_user`,`user`,`pass`,`level`) values ('U001','Administrator','admin','admin','admin'),('U002','Pengawas','pengawas','pengawas','pengawas'),('U003','staf','staf','staf','staf');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
