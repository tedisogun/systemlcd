-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: localhost    Database: pemlcd
-- ------------------------------------------------------
-- Server version	5.7.25-0ubuntu0.18.04.2

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
-- Table structure for table `admin_table`
--

DROP TABLE IF EXISTS `admin_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_table` (
  `adm_username` varchar(10) NOT NULL,
  `adm_password` varchar(15) DEFAULT NULL,
  `adm_email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`adm_username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_table`
--

LOCK TABLES `admin_table` WRITE;
/*!40000 ALTER TABLE `admin_table` DISABLE KEYS */;
INSERT INTO `admin_table` VALUES ('dedy','dedypassword','dedydarmawan2848@gmail.com'),('fany','unicorn','desyauliaalfany10@gmail.com'),('intan','fairytale','gustiayuintan123@gmail.com'),('rifda','littlepony','rifdaaulinda16@gmail.com'),('sogun','calnewport','sogun.kwn@gmail.com');
/*!40000 ALTER TABLE `admin_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fakultas_table`
--

DROP TABLE IF EXISTS `fakultas_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fakultas_table` (
  `fakultas_id` varchar(5) NOT NULL,
  `fakultas_nama` varchar(70) DEFAULT NULL,
  `no` int(11) DEFAULT NULL,
  PRIMARY KEY (`fakultas_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fakultas_table`
--

LOCK TABLES `fakultas_table` WRITE;
/*!40000 ALTER TABLE `fakultas_table` DISABLE KEYS */;
INSERT INTO `fakultas_table` VALUES ('FBS','Fakultas Bahasa dan Seni',1),('FE','Fakultas Ekonomi',2),('FHIS','Fakultas Hukum Ilmu Sosial',3),('FIP','Fakultas Ilmu Pendidikan',4),('FMIPA','Fakultas Matematika dan Ilmu Pengetahuan Alam',5),('FOK','Fakultas Olahraga dan Kesehatan',6),('FTK','Fakultas Teknik dan Kejuruan',7);
/*!40000 ALTER TABLE `fakultas_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jurusan_table`
--

DROP TABLE IF EXISTS `jurusan_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jurusan_table` (
  `jurusan_id` varchar(7) NOT NULL,
  `jurusan_nama` varchar(70) DEFAULT NULL,
  `jurusan_fakultas_id` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`jurusan_id`),
  KEY `jurusan_fakultas_id` (`jurusan_fakultas_id`),
  CONSTRAINT `jurusan_table_ibfk_1` FOREIGN KEY (`jurusan_fakultas_id`) REFERENCES `fakultas_table` (`fakultas_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jurusan_table`
--

LOCK TABLES `jurusan_table` WRITE;
/*!40000 ALTER TABLE `jurusan_table` DISABLE KEYS */;
INSERT INTO `jurusan_table` VALUES ('FBSBI','Bahasa Inggris','FBS'),('FBSDKV','Desain Komunikasi Visual','FBS'),('FBSPBB','Pendidikan Bahasa Bali','FBS'),('FBSPBI','Pendidikan Bahasa Inggris','FBS'),('FBSPBJ','Pendidikan Bahasa Jepang','FBS'),('FBSPBS','Pendidikan Bahasa dan Sastra Indonesia','FBS'),('FBSPSR','Pendidikan Seni Rupa','FBS'),('FEA','Akuntansi','FE'),('FEM','Manajemen','FE'),('FEP','Perhotelan','FE'),('FEPE','Pendidikan Ekonomi','FE'),('FHISIH','Ilmu Hukum','FHIS'),('FHISP','Perpustakaan','FHIS'),('FHISPG','Pendidikan Geografi','FHIS'),('FHISPK','Pendidikan Pancasila dan Kewarganegaraan','FHIS'),('FHISPS','Pendidikan Sejarah','FHIS'),('FHISS','Pendidikan Sosiologi','FHIS'),('FHISSP','Survey dan Pemetaan','FHIS'),('FIPBK','Bimbingan dan Konseling','FIP'),('FIPPAUD','Pendidikan Guru Pendidikan Anak Usia Dini','FIP'),('FIPPGSD','Pendidikan Guru Sekolah Dasar','FIP'),('FIPTK','Teknologi Pendidikan','FIP'),('FMIPAA','Akuakultur','FMIPA'),('FMIPAAK','Analisis Kimia','FMIPA'),('FMIPAB','Biologi','FMIPA'),('FMIPABK','Budidaya Kelautan','FMIPA'),('FMIPAK','Kimia','FMIPA'),('FMIPAM','Matematika','FMIPA'),('FMIPAPB','Pendidikan Biologi','FMIPA'),('FMIPAPF','Pendidikan Fisika','FMIPA'),('FMIPAPI','Pendidikan IPA','FMIPA'),('FMIPAPK','Pendidikan Kimia','FMIPA'),('FMIPAPM','Pendidikan Matematika','FMIPA'),('FOKIK','Ilmu Keolahragaan','FOK'),('FOKKB','Kebidanan','FOK'),('FOKPJKR','Pendidikan Jasmani Kesehatan dan Rekreasi','FOK'),('FOKPKO','Pendidikan Kepelatihan Olahraga','FOK'),('FOKPOP','Pelatihan Olahraga Pariwisata','FOK'),('IL','Ilmu Komputer','FTK'),('MI','Manajemen Informatika','FTK'),('PKK','Pendidikan Kesejahtraan Keluarga','FTK'),('PTE','Pendidikan Teknik Elektro','FTK'),('PTI','Pendidikan Teknik Informatika','FTK'),('PTM','Pendidikan Teknik Mesin','FTK'),('SI','Sistem Informasi','FTK');
/*!40000 ALTER TABLE `jurusan_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lcd_table`
--

DROP TABLE IF EXISTS `lcd_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lcd_table` (
  `lcd_id` varchar(10) NOT NULL,
  `lcd_merk` varchar(20) DEFAULT NULL,
  `lcd_type` varchar(20) DEFAULT NULL,
  `lcd_gambar` varchar(100) DEFAULT NULL,
  `lcd_adm_username` varchar(10) DEFAULT NULL,
  `lcd_status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`lcd_id`),
  KEY `lcd_adm_username` (`lcd_adm_username`),
  CONSTRAINT `lcd_table_ibfk_1` FOREIGN KEY (`lcd_adm_username`) REFERENCES `admin_table` (`adm_username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lcd_table`
--

LOCK TABLES `lcd_table` WRITE;
/*!40000 ALTER TABLE `lcd_table` DISABLE KEYS */;
INSERT INTO `lcd_table` VALUES ('LCD001','Everycom','X7','LCD001.jpeg','sogun',1),('LCD002','Lumens','EB-X450','LCD002.jpeg','sogun',1),('LCD003','LG','PH150','LCD003.png','sogun',1),('LCD004','LG','PW1500','LCD004.png','sogun',1),('LCD005','Sony','VPL-DX102','LCD005.jpeg','dedy',1);
/*!40000 ALTER TABLE `lcd_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mahasiswa_table`
--

DROP TABLE IF EXISTS `mahasiswa_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mahasiswa_table` (
  `mhs_nim` varchar(10) NOT NULL,
  `mhs_nama` varchar(50) DEFAULT NULL,
  `mhs_kelamin` tinyint(4) DEFAULT NULL,
  `mhs_alamat` varchar(100) DEFAULT NULL,
  `mhs_tlp` varchar(12) DEFAULT NULL,
  `mhs_jurusan_id` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`mhs_nim`),
  KEY `mhs_jurusan_id` (`mhs_jurusan_id`),
  CONSTRAINT `mahasiswa_table_ibfk_1` FOREIGN KEY (`mhs_jurusan_id`) REFERENCES `jurusan_table` (`jurusan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mahasiswa_table`
--

LOCK TABLES `mahasiswa_table` WRITE;
/*!40000 ALTER TABLE `mahasiswa_table` DISABLE KEYS */;
INSERT INTO `mahasiswa_table` VALUES ('1234567898','Jdjxnxjdjnnd',1,'Jdjdndnd','123455888488','FBSBI'),('1715051016','I Putu Dedy Wiradarmawan',1,'Negare, Jembrana, Bali','087666333222','PTI'),('1715051017','Dedy',1,'Paris','876655556666','FBSBI'),('1715051018','Osama Bin Laden',1,'Timur Tengah','876768945671','PTE'),('1715051019','Alan',1,'atlantik','876655556668','FBSBI'),('1715051072','dedy',0,'singaraja','087263554555','PTI'),('1715051073','I Putu Tedi Sogun',1,'Gianyar','083119392024','PTI'),('1715051080','Desy Aulia Alfany',0,'perumahan satelit','089536878867','PTI'),('1715051096','Ahooy',0,'perumahan satelit','089536878867','FHISPS'),('1715051103','I Made Beny Gunarta',1,'Kintamani, Bangli Bali','087657482943','PTI'),('1804081007','Luh Putu Widiasih',0,'Renon, Denpasar Selatan, Bali','087384783473','FBSBI');
/*!40000 ALTER TABLE `mahasiswa_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peminjaman_table`
--

DROP TABLE IF EXISTS `peminjaman_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `peminjaman_table` (
  `pjm_id` int(11) NOT NULL AUTO_INCREMENT,
  `pjm_lcd_id` varchar(10) DEFAULT NULL,
  `pjm_mhs_nim` varchar(10) DEFAULT NULL,
  `pjm_adm_username` varchar(10) DEFAULT NULL,
  `pjm_tgl_pinjam` datetime DEFAULT NULL,
  `pjm_tgl_kembali` datetime DEFAULT NULL,
  `pjm_adm_username_kembali` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`pjm_id`),
  KEY `pjm_lcd_id` (`pjm_lcd_id`),
  KEY `pjm_mhs_nim` (`pjm_mhs_nim`),
  KEY `pjm_adm_username` (`pjm_adm_username`),
  KEY `pjm_adm_username_kembali` (`pjm_adm_username_kembali`),
  CONSTRAINT `peminjaman_table_ibfk_1` FOREIGN KEY (`pjm_lcd_id`) REFERENCES `lcd_table` (`lcd_id`),
  CONSTRAINT `peminjaman_table_ibfk_2` FOREIGN KEY (`pjm_mhs_nim`) REFERENCES `mahasiswa_table` (`mhs_nim`),
  CONSTRAINT `peminjaman_table_ibfk_3` FOREIGN KEY (`pjm_adm_username`) REFERENCES `admin_table` (`adm_username`),
  CONSTRAINT `peminjaman_table_ibfk_4` FOREIGN KEY (`pjm_adm_username_kembali`) REFERENCES `admin_table` (`adm_username`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peminjaman_table`
--

LOCK TABLES `peminjaman_table` WRITE;
/*!40000 ALTER TABLE `peminjaman_table` DISABLE KEYS */;
INSERT INTO `peminjaman_table` VALUES (10,'LCD003','1804081007','sogun','2018-12-31 15:12:12','2018-12-31 15:13:01','sogun'),(11,'LCD002','1715051073','sogun','2018-12-31 16:24:40','2018-12-31 16:25:32','sogun'),(12,'LCD004','1715051016','sogun','2018-12-31 16:25:13','2018-12-31 16:38:36','sogun'),(13,'LCD001','1804081007','sogun','2018-12-31 16:40:46','2018-12-31 21:53:05','sogun'),(15,'LCD001','1715051017','dedy','2019-01-02 06:39:09','2019-01-02 06:39:17','dedy'),(16,'LCD001','1715051017','dedy','2019-01-02 06:39:48','2019-01-02 06:40:42','dedy'),(17,'LCD002','1715051080','fany','2019-01-02 07:58:35','2019-01-02 08:01:15','fany'),(18,'LCD001','1715051096','fany','2019-01-02 08:00:03','2019-01-02 08:01:05','fany'),(19,'LCD001','1715051017','dedy','2019-01-02 08:16:58','2019-01-02 08:17:07','dedy'),(20,'LCD001','1715051017','dedy','2019-01-02 08:19:23','2019-01-19 04:39:02','sogun'),(21,'LCD002','1715051073','sogun','2019-01-02 12:44:18','2019-01-03 00:06:44','dedy'),(22,'LCD004','1804081007','sogun','2019-01-02 12:47:49','2019-01-31 06:59:10','sogun'),(23,'LCD003','1715051018','dedy','2019-01-02 14:40:26','2019-01-31 06:59:02','sogun'),(24,'LCD002','1715051019','dedy','2019-01-03 07:46:04','2019-01-31 06:58:52','sogun'),(25,'LCD005','1715051072','sogun','2019-01-03 08:41:43','2019-01-31 06:59:17','sogun'),(26,'LCD001','1234567898','sogun','2019-01-31 07:00:35','2019-01-31 07:02:18','sogun'),(27,'LCD001','1234567898','sogun','2019-01-31 07:02:44','2019-01-31 07:03:22','sogun');
/*!40000 ALTER TABLE `peminjaman_table` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-08 14:44:48
