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
-- Dumping data for table `SOSAlert`
--

LOCK TABLES `SOSAlert` WRITE;
/*!40000 ALTER TABLE `SOSAlert` DISABLE KEYS */;
/*!40000 ALTER TABLE `SOSAlert` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `agendaPengantar`
--

LOCK TABLES `agendaPengantar` WRITE;
/*!40000 ALTER TABLE `agendaPengantar` DISABLE KEYS */;
INSERT INTO `agendaPengantar` VALUES ('18010003','123/45/67','2018-01-09','Kepala Desa','Mad Bashor');
/*!40000 ALTER TABLE `agendaPengantar` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `ambulans`
--

LOCK TABLES `ambulans` WRITE;
/*!40000 ALTER TABLE `ambulans` DISABLE KEYS */;
INSERT INTO `ambulans` VALUES ('18010001','2001','Mbah Sarini','02/06','Klinik Orthopedi','2018-01-07 06:18:50','2018-01-09 06:38:35','selesai'),('18010002','2001','Mbok Sarminah','09/01','RSU Karyadi','2018-01-09 04:50:27','2018-01-09 06:37:57','selesai'),('18010003','1231','Mbah Karyo','02/04','RS Tlogorejo','2018-01-13 05:20:05','2018-01-13 05:25:28','selesai'),('18010004','1231','Lik Kamsudi','09/03','TPU Mojosongong','2018-01-13 05:22:15','2018-01-13 05:25:30','selesai'),('18010005','1231','Mbah Dikun','02/01','RSU Kariadi','2018-01-13 05:23:55','2018-01-13 05:25:31','selesai');
/*!40000 ALTER TABLE `ambulans` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `kredensiWarga`
--

LOCK TABLES `kredensiWarga` WRITE;
/*!40000 ALTER TABLE `kredensiWarga` DISABLE KEYS */;
INSERT INTO `kredensiWarga` VALUES ('1231','dulmajid','7acf691797a7737e77509b6c6f6fb978','aktif'),('2001','ayahmadun','1c1b07deca20d4d01d4ebcc7749be98e','aktif');
/*!40000 ALTER TABLE `kredensiWarga` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `penduduk`
--

LOCK TABLES `penduduk` WRITE;
/*!40000 ALTER TABLE `penduduk` DISABLE KEYS */;
INSERT INTO `penduduk` VALUES ('123','1231','jeneing','L','ANAK','ngene','1991-01-12','Belum Kawin','ISLAM','id','AB-','DIPLOMA IV/STRATA I','TENTARA NASIONAL INDONESIA','00093',1,1,'1192','babena','kono','1965-12-12','mm','1172','mamake','ngkana','1978-06-21','ht','datang','2018-01-03'),('200','2001','Ayah Manchini','L','KEPALA KELUARGA','Pamekasan','1945-08-17','Kawin','ISLAM','Indonesia','Tidak Tahu','STRATA II','DOSEN','-',3,2,'1991','Kakek Renggo','Blitar','1920-12-15','','1893','Nenek Cicih','Cimahi','1925-12-22','','datang','2018-01-04');
/*!40000 ALTER TABLE `penduduk` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `pengantar`
--

LOCK TABLES `pengantar` WRITE;
/*!40000 ALTER TABLE `pengantar` DISABLE KEYS */;
INSERT INTO `pengantar` VALUES ('18010001','2018-01-07 02:49:36','2001','Membuat SKCK','batal'),('18010002','2018-01-07 02:54:30','2001','Membuat SIM','batal'),('18010003','2018-01-07 02:56:34','2001','Mengajukan Kredit Modal Usaha','cetak');
/*!40000 ALTER TABLE `pengantar` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `pildata`
--

LOCK TABLES `pildata` WRITE;
/*!40000 ALTER TABLE `pildata` DISABLE KEYS */;
INSERT INTO `pildata` VALUES (1,'agama','ISLAM'),(2,'agama','KRISTEN'),(3,'agama','KATHOLIK'),(4,'agama','HINDU'),(5,'agama','BUDHA'),(6,'agama','KONGHUCU'),(7,'agama','KEPERCAYAAN'),(8,'hubKeluarga','KEPALA KELUARGA'),(9,'hubKeluarga','SUAMI'),(10,'hubKeluarga','ISTRI'),(11,'hubKeluarga','ANAK'),(12,'hubKeluarga','MENANTU'),(13,'hubKeluarga','CUCU'),(14,'hubKeluarga','ORANG TUA'),(15,'hubKeluarga','MERTUA'),(16,'hubKeluarga','FAMILI LAIN'),(17,'hubKeluarga','PEMBANTU'),(18,'hubKeluarga','LAINNYA'),(19,'pendidikan','TIDAK/BELUM SEKOLAH'),(20,'pendidikan','BELUM TAMAT SD/SEDERAJAT'),(21,'pendidikan','TAMAT SD/SEDERAJAT'),(22,'pendidikan','SLTP/SEDERAJAT'),(23,'pendidikan','SLTA/SEDERAJAT'),(24,'pendidikan','DIPLOMA I/II'),(25,'pendidikan','AKADEMI/DIPLOMA III/SARJANA MUDA'),(26,'pendidikan','DIPLOMA IV/STRATA I'),(27,'pendidikan','STRATA II'),(28,'pendidikan','STRATA III'),(29,'pekerjaan','BELUM / TIDAK BEKERJA'),(30,'pekerjaan','MENGURUS RUMAH TANGGA'),(31,'pekerjaan','PELAJAR/MAHASISWA'),(32,'pekerjaan','PENSIUNAN'),(33,'pekerjaan','PEGAWAI NEGERI SIPIL'),(34,'pekerjaan','TENTARA NASIONAL INDONESIA'),(35,'pekerjaan','KEPOLISIAN RI'),(36,'pekerjaan','PERDAGANGAN'),(37,'pekerjaan','PETANI/PEKEBUN'),(38,'pekerjaan','PETERNAK'),(39,'pekerjaan','NELAYAN/PERIKANAN'),(40,'pekerjaan','INDUSTRI'),(41,'pekerjaan','KONSTRUKSI'),(42,'pekerjaan','TRANSPORTASI'),(43,'pekerjaan','KARYAWAN SWASTA'),(44,'pekerjaan','KARYAWAN BUMN'),(45,'pekerjaan','KARYAWAN BUMD'),(46,'pekerjaan','KARYAWAN HONORER'),(47,'pekerjaan','UBURUH HARIAN LEPAS'),(48,'pekerjaan','BURUH TANI/PERKEBUNAN'),(49,'pekerjaan','BURUH NELAYAN/PERIKANAN'),(50,'pekerjaan','BURUH PETERNAKAN'),(51,'pekerjaan','PEMBANTU RUMAH TANGGA'),(52,'pekerjaan','TUKANG CUKUR'),(53,'pekerjaan','TUKANG LISTRIK'),(54,'pekerjaan','TUKAN BATU'),(55,'pekerjaan','TUKANG KAYU'),(56,'pekerjaan','TUKANG SOL SEPATU'),(57,'pekerjaan','TUKANG LAS / PANDE BESI'),(58,'pekerjaan','TUKANG JAHIT'),(59,'pekerjaan','TUKANG GIGI'),(60,'pekerjaan','PENATA RIAS'),(61,'pekerjaan','PENATA BUSANA'),(62,'pekerjaan','PENATA RAMBUT'),(63,'pekerjaan','MEKANIK'),(64,'pekerjaan','SENIMAN'),(65,'pekerjaan','TABIB'),(66,'pekerjaan','PENGRAJIN'),(67,'pekerjaan','PERANCANG BUSANA'),(68,'pekerjaan','PENTERJEMAH'),(69,'pekerjaan','IMAM MASJID'),(70,'pekerjaan','PENDETA'),(71,'pekerjaan','PASTOR'),(72,'pekerjaan','WARTAWAN'),(73,'pekerjaan','USTADZ/MUBALIGH'),(74,'pekerjaan','JURU MASAK'),(75,'pekerjaan','PROMOTOR ACARA'),(76,'pekerjaan','ANGGOTA DPR'),(77,'pekerjaan','ANGGOTA DPD'),(78,'pekerjaan','ANGGOTA BPK'),(79,'pekerjaan','PRESIDEN'),(80,'pekerjaan','WAKIL PRESIDEN'),(81,'pekerjaan','ANGOTA MK'),(82,'pekerjaan','ANGGOTA KABINET'),(83,'pekerjaan','DUTA BESAR'),(84,'pekerjaan','GUBERNUR'),(85,'pekerjaan','WAKIL GUBERNUR'),(86,'pekerjaan','BUPATI'),(87,'pekerjaan','WAKIL BUPATI'),(88,'pekerjaan','WALIKOTA'),(89,'pekerjaan','WAKIL WALIKOTA'),(90,'pekerjaan','ANGGOTA DPRD PROPINSI'),(91,'pekerjaan','ANGGOTA DORD KABUPATEN'),(92,'pekerjaan','DOSEN'),(93,'pekerjaan','GURU'),(94,'pekerjaan','PILOT'),(95,'pekerjaan','PENGACARA'),(96,'pekerjaan','NOTARIS'),(97,'pekerjaan','ARSITEK'),(98,'pekerjaan','AKUNTAN'),(99,'pekerjaan','KONSULTAN'),(100,'pekerjaan','DOKTER'),(101,'pekerjaan','BIDAN'),(102,'pekerjaan','PERAWAT'),(103,'pekerjaan','APOTEKER'),(104,'pekerjaan','PSIKIATER/PSIKOLOG'),(105,'pekerjaan','PENYIAR TELEVISI'),(106,'pekerjaan','PENYIAR RADIO'),(107,'pekerjaan','PELAUT'),(108,'pekerjaan','PENELITI'),(109,'pekerjaan','SOPIR'),(110,'pekerjaan','PIALANG'),(111,'pekerjaan','PARANORMAL'),(112,'pekerjaan','PEDAGANG'),(113,'pekerjaan','PERANGKAT DESA'),(114,'pekerjaan','KEPALA DESA'),(115,'pekerjaan','BIARAWATI'),(116,'pekerjaan','WIRASWASTA'),(117,'st_kawin','Belum Kawin'),(118,'st_kawin','Cerai Hidup'),(119,'st_kawin','Cerai Mati'),(120,'st_kawin','Kawin'),(121,'golDarah','A+'),(122,'golDarah','A-'),(123,'golDarah','AB+'),(124,'golDarah','AB-'),(125,'golDarah','B+'),(126,'golDarah','B-'),(127,'golDarah','O+'),(128,'golDarah','0-'),(129,'golDarah','Tidak Tahu');
/*!40000 ALTER TABLE `pildata` ENABLE KEYS */;
UNLOCK TABLES;

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

-- Dump completed on 2018-01-13 12:36:28
