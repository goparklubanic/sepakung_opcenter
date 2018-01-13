-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: klubaner_desaApp
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB-0+deb9u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `SOSAlert`
--

DROP TABLE IF EXISTS `SOSAlert`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SOSAlert` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `jamTgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nik` varchar(16) NOT NULL,
  `bujur` varchar(20) DEFAULT '0.0000',
  `lintang` varchar(20) DEFAULT '0.0000',
  `status` enum('antri','tanggap','selesai') DEFAULT 'antri',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agendaPengantar`
--

DROP TABLE IF EXISTS `agendaPengantar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agendaPengantar` (
  `kd_permohonan` varchar(8) NOT NULL,
  `nmAgenda` varchar(20) NOT NULL,
  `tgAgenda` date DEFAULT NULL,
  `jbtPemaraf` varchar(20) DEFAULT 'Kepala Desa',
  `nmaPemaraf` varchar(20) DEFAULT NULL,
  UNIQUE KEY `nmAgenda` (`nmAgenda`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ambulans`
--

DROP TABLE IF EXISTS `ambulans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ambulans` (
  `id_permintaan` varchar(8) NOT NULL,
  `nik_peminta` varchar(8) NOT NULL,
  `jemput_rumah` varchar(30) NOT NULL,
  `jemput_rt_rw` varchar(10) NOT NULL,
  `tujuan` varchar(40) NOT NULL,
  `tanggal_masuk` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tanggal_respon` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `responStatus` enum('antri','proses','selesai') DEFAULT 'antri',
  PRIMARY KEY (`id_permintaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `kredensiWarga`
--

DROP TABLE IF EXISTS `kredensiWarga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kredensiWarga` (
  `nik` varchar(16) NOT NULL,
  `namalogin` varchar(32) DEFAULT NULL,
  `katasandi` varchar(32) DEFAULT NULL,
  `statusLog` enum('aktif','inaktif') DEFAULT 'inaktif',
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `penduduk`
--

DROP TABLE IF EXISTS `penduduk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penduduk` (
  `no_kk` varchar(16) DEFAULT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_lengkap` varchar(40) DEFAULT NULL,
  `kelamin` enum('L','P') DEFAULT 'L',
  `shk` varchar(15) DEFAULT NULL,
  `tp_lahir` varchar(20) DEFAULT NULL,
  `tg_lahir` date DEFAULT NULL,
  `st_kawin` varchar(16) DEFAULT 'Belum Kawin',
  `agama` varchar(8) DEFAULT NULL,
  `kewarganegaraan` varchar(20) DEFAULT 'Indonesia',
  `gol_darah` enum('A+','A-','B+','B-','AB+','AB-','O+','O-','Tidak Tahu') DEFAULT 'Tidak Tahu',
  `pendidikan` varchar(30) DEFAULT NULL,
  `pekerjaan` varchar(30) DEFAULT NULL,
  `no_akte_lahir` varchar(21) DEFAULT NULL,
  `rw` int(2) DEFAULT NULL,
  `rt` int(2) DEFAULT NULL,
  `bpkNik` varchar(16) DEFAULT NULL,
  `bpkNama` varchar(40) DEFAULT NULL,
  `bpkTpLahir` varchar(40) DEFAULT NULL,
  `bpkTgLahir` date DEFAULT NULL,
  `bpkAlamat` tinytext,
  `ibuNik` varchar(16) DEFAULT NULL,
  `ibuNama` varchar(40) DEFAULT NULL,
  `ibuTpLahir` varchar(40) DEFAULT NULL,
  `ibuTgLahir` date DEFAULT NULL,
  `ibuAlamat` tinytext,
  `mutasi` enum('datang','pindah','merantau','meninggal','external') DEFAULT 'datang',
  `tglmutasi` date DEFAULT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pengantar`
--

DROP TABLE IF EXISTS `pengantar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengantar` (
  `kd_permohonan` varchar(8) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nik` varchar(16) NOT NULL,
  `keperluan` tinytext,
  `status` enum('antri','cetak','batal') DEFAULT 'antri',
  PRIMARY KEY (`kd_permohonan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pildata`
--

DROP TABLE IF EXISTS `pildata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pildata` (
  `idx` int(3) NOT NULL AUTO_INCREMENT,
  `optGroup` varchar(20) NOT NULL,
  `optData` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `vwLogin`
--

DROP TABLE IF EXISTS `vwLogin`;
/*!50001 DROP VIEW IF EXISTS `vwLogin`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vwLogin` (
  `nik` tinyint NOT NULL,
  `nama_lengkap` tinyint NOT NULL,
  `kelamin` tinyint NOT NULL,
  `tg_lahir` tinyint NOT NULL,
  `rt` tinyint NOT NULL,
  `rw` tinyint NOT NULL,
  `namalogin` tinyint NOT NULL,
  `katasandi` tinyint NOT NULL,
  `statusLog` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vwLogin`
--

/*!50001 DROP TABLE IF EXISTS `vwLogin`*/;
/*!50001 DROP VIEW IF EXISTS `vwLogin`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`klubaner_income`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwLogin` AS select `penduduk`.`nik` AS `nik`,`penduduk`.`nama_lengkap` AS `nama_lengkap`,`penduduk`.`kelamin` AS `kelamin`,`penduduk`.`tg_lahir` AS `tg_lahir`,`penduduk`.`rt` AS `rt`,`penduduk`.`rw` AS `rw`,`kredensiWarga`.`namalogin` AS `namalogin`,`kredensiWarga`.`katasandi` AS `katasandi`,`kredensiWarga`.`statusLog` AS `statusLog` from (`penduduk` join `kredensiWarga`) where (`kredensiWarga`.`nik` = `penduduk`.`nik`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-13 12:28:18
