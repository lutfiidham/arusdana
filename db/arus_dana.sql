/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 5.6.27-log : Database - arus_dana
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`arus_dana` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `arus_dana`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(100) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password_admin` varchar(100) DEFAULT NULL,
  `level_admin` varchar(5) DEFAULT NULL COMMENT 'ADM, MNG,ADR',
  `status_admin` varchar(2) DEFAULT 'A',
  PRIMARY KEY (`id_admin`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`id_admin`,`nama_admin`,`username`,`password_admin`,`level_admin`,`status_admin`) values 
(1,'Super Administrator','superadmin','$2y$10$K5KdI2pCnak7ZrHPHC62COqSgujp22tkXiBaCwQ5uSG.kX9.pjSB6','ADR','A'),
(2,'Admin Biasa','admin','$2y$10$XzBxbRQQ5WTkJwPlcKRDRe7XiuMwwn7JIuWzH1Vprq6OyrvASa0Pe','ADM','A'),
(3,'Manager','manager','$2y$10$1Hcf8IaRaliRFiOHiFm/oeP3oeMCPu1V6RdUwTTXlt3u/DQOH9Kia','MNG','A');

/*Table structure for table `anggaran` */

DROP TABLE IF EXISTS `anggaran`;

CREATE TABLE `anggaran` (
  `id_anggaran` int(11) NOT NULL AUTO_INCREMENT,
  `kode_anggaran` varchar(255) DEFAULT NULL,
  `nama_anggaran` varchar(255) DEFAULT NULL,
  `id_bagian` int(11) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  PRIMARY KEY (`id_anggaran`),
  KEY `fk_reference_4` (`id_bagian`),
  CONSTRAINT `anggaran_ibfk_1` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id_bagian`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `anggaran` */

insert  into `anggaran`(`id_anggaran`,`kode_anggaran`,`nama_anggaran`,`id_bagian`,`status`,`tahun`) values 
(1,'A.1','Transportasi Marketing ',1,'A',2019),
(2,'A.2','Hosting dan Domain',1,'A',2019),
(3,'A.3','Biaya Konsumsi Rapat',1,'A',2019),
(4,'A.4','Proyek Software',1,'A',2019),
(5,'A.5','Hubungan Antar Instansi',1,'A',2019),
(6,'A.6','Pelatihan & Sertifikasi',1,'A',2019),
(7,'B.1','Acara MOU',1,'A',2019),
(8,'B.2','Sertifikat Pelatihan',1,'A',2019),
(9,'B.3','Brosur ITCoPS',1,'A',2019),
(10,'B.4','Menyebarkan Brosur',1,'A',2019),
(11,'B.6','Training Flutter',1,'A',NULL),
(12,'B.7','Pelatihan Sertifikasi Professional Scrum Master',1,'A',NULL),
(13,'C.1','9 Mouse Rexus Sierra GT3',1,'A',NULL),
(14,'C.2','1 Lusin Kaos PKS',1,'A',NULL),
(15,'C.3','mencetak Manual Book',1,'A',NULL);

/*Table structure for table `arus_dana` */

DROP TABLE IF EXISTS `arus_dana`;

CREATE TABLE `arus_dana` (
  `id_arus_dana` int(11) NOT NULL AUTO_INCREMENT,
  `no_arus_dana` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_permintaan` int(11) DEFAULT NULL,
  `id_unit_kerja` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_anggaran` int(11) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `bbm` varchar(1) DEFAULT NULL,
  `periode_pelaksanaan` date DEFAULT NULL,
  `id_bagian` int(11) DEFAULT NULL,
  `id_pj` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_arus_dana`),
  KEY `fk_reference_11` (`id_permintaan`),
  KEY `fk_reference_12` (`id_unit_kerja`),
  KEY `fk_reference_13` (`id_kategori`),
  KEY `fk_reference_14` (`id_anggaran`),
  CONSTRAINT `arus_dana_ibfk_1` FOREIGN KEY (`id_permintaan`) REFERENCES `permintaan_anggaran` (`id_permintaan`),
  CONSTRAINT `arus_dana_ibfk_2` FOREIGN KEY (`id_unit_kerja`) REFERENCES `unit_kerja` (`id_unit_kerja`),
  CONSTRAINT `arus_dana_ibfk_3` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=latin1;

/*Data for the table `arus_dana` */

insert  into `arus_dana`(`id_arus_dana`,`no_arus_dana`,`tanggal`,`id_permintaan`,`id_unit_kerja`,`id_kategori`,`id_anggaran`,`catatan`,`total`,`bbm`,`periode_pelaksanaan`,`id_bagian`,`id_pj`) values 
(10,'1/PKS/I/2019','2019-01-03',NULL,NULL,NULL,NULL,'Bukti terlampir',-400000,'1','2018-12-01',1,2),
(11,'2/PKS/I/2019','2019-01-03',NULL,NULL,NULL,NULL,'Bukti terlampir',-200000,'1','2018-12-01',1,0),
(12,'3/PKS/I/2019','2019-01-31',NULL,NULL,NULL,0,'Bukti terlampir',-400000,'1','2019-01-01',1,NULL),
(13,'4/PKS/I/2019','2019-01-31',NULL,NULL,NULL,NULL,'Bukti terlampir',-200000,'1','2019-01-01',1,0),
(14,'1/PS-UMUM/I/2019','2019-07-26',11,2,1,6,'Bukti Terlampir',0,'0','2019-01-01',1,NULL),
(24,'2/PS-UMUM/I/2019','2019-01-31',NULL,2,1,6,'Pelatihan dilaksanakan selama 8 kali pertemuan',-263400,'0','2019-01-01',1,NULL),
(25,'1/SSI-DKRTHSBY/I/2019','2019-07-26',NULL,1,18,4,'Tunai',-200000,'0','2019-01-01',1,NULL),
(26,'5/PKS/II/2019','2019-02-28',NULL,NULL,NULL,NULL,'',-200000,'1','2019-02-01',1,0),
(27,'6/PKS/II/2019','2019-02-28',NULL,NULL,NULL,0,'',-400000,'1','2019-02-01',1,0),
(28,'7/PKS/II/2019','2019-02-28',NULL,NULL,NULL,NULL,'tunai',-114285,'0','2019-02-01',1,NULL),
(29,'8/PKS/II/2019','2019-02-28',NULL,NULL,NULL,0,'Tunai',-37000,'0','2019-02-01',1,NULL),
(30,'9/PKS/III/2019','2019-03-29',NULL,NULL,NULL,14,'tunai',-1020000,'0','2019-03-01',1,NULL),
(31,'10/PKS/III/2019','2019-03-29',NULL,NULL,NULL,0,'Transfer  BCA # 8220128599 a.n. Tan Amelia',-400000,'1','2019-03-01',1,2),
(32,'11/PKS/III/2019','2019-03-29',NULL,NULL,NULL,0,'',-200000,'1','2019-03-01',1,3),
(33,'12/PKS/VIII/2019','2019-03-29',NULL,NULL,NULL,NULL,'',-115287,'0','2019-03-01',1,NULL),
(34,'13/PKS/III/2019','2019-08-14',NULL,NULL,NULL,1,'',-130000,'0','2019-03-01',1,NULL),
(35,'14/PKS/II/2019','2019-08-14',NULL,NULL,NULL,13,'Debet Memo AU',-833313,'0','2019-02-01',1,NULL),
(36,'15/PKS/IV/2019','2019-08-14',NULL,NULL,NULL,0,'',-400000,'1','2019-04-01',1,2),
(37,'16/PKS/VIII/2019','2019-08-14',NULL,NULL,NULL,0,'',-200000,'1','2019-08-01',1,0),
(38,'1/HAI-UMUM/I/2019','2019-08-14',NULL,3,1,5,'',-30500,'0','2019-01-01',1,NULL),
(39,'2/HAI-UMUM/I/2019','2019-08-14',NULL,3,1,1,'Tunai',-62500,'0','2019-01-01',1,NULL),
(40,'3/HAI-UMUM/I/2019','2019-08-14',NULL,3,1,7,'',-15500,'0','2019-01-01',1,NULL),
(41,'4/HAI-UMUM/II/2019','2019-08-14',NULL,3,1,0,'',-8500,'0','2019-02-01',1,NULL),
(42,'5/HAI-UMUM/IV/2019','2019-08-14',NULL,3,1,5,'',-14500,'0','2019-08-01',1,NULL),
(43,'6/HAI-UMUM/IV/2019','2019-08-14',NULL,3,1,1,'Tunai',-42000,'0','2019-04-01',1,NULL),
(45,'7/HAI-UMUM/V/2019','2019-08-14',NULL,3,1,5,'tunai',-14500,'0','2019-05-01',1,NULL),
(46,'8/HAI-UMUM/VII/2019','2019-08-14',NULL,3,1,1,'tunai',-25000,'0','2019-07-01',1,NULL),
(47,'1/SSI-RSMLMG/I/2019','2019-08-14',NULL,1,23,4,' PARIS RS Muhammadiyah Lamongan',42793000,'0','2019-01-01',1,NULL),
(48,'2/SSI-RSMLMG/I/2019','2019-08-14',12,1,23,4,'Transfer ke BCA KCP Rungkut Megah Surabaya #6730 660 888 a.n PT. Matahri Aneka MKM',0,'0','2019-01-01',1,NULL),
(58,'17/PKS/V/2019','2019-08-30',NULL,NULL,NULL,3,'Tunai',-900000,'0','2019-05-01',1,NULL),
(59,'18/PKS/V/2019','2019-08-30',NULL,NULL,NULL,0,'Bukti terlampir',-200000,'1','2019-05-01',1,3),
(60,'19/PKS/V/2019','2019-08-30',NULL,NULL,NULL,NULL,'Bukti terlampir',-400000,'1','2019-05-01',1,2),
(61,'20/PKS/VI/2019','2019-08-30',NULL,NULL,NULL,0,'',-200000,'1','2019-06-01',1,3),
(62,'21/PKS/VI/2019','2019-08-30',NULL,NULL,NULL,0,'',-400000,'1','2019-06-01',1,2),
(63,'22/PKS/VI/2019','2019-08-30',NULL,NULL,NULL,7,'Tunai',-436000,'0','2019-06-01',1,NULL),
(64,'23/PKS/VII/2019','2019-08-30',NULL,NULL,NULL,0,'',-200000,'1','2019-07-01',1,3),
(65,'24/PKS/VII/2019','2019-08-30',NULL,NULL,NULL,0,'',-400000,'1','2019-07-01',1,2),
(66,'25/PKS/VII/2019','2019-08-30',NULL,NULL,NULL,7,'Tunai',-173500,'0','2019-07-01',1,NULL),
(67,'26/PKS/VIII/2019','2019-08-30',NULL,NULL,NULL,1,'Tunai',-150000,'0','2019-08-01',1,NULL),
(68,'27/PKS/VIII/2019','2019-08-30',NULL,NULL,NULL,0,'',-400000,'1','2019-08-01',1,2),
(69,'28/PKS/VIII/2019','2019-08-30',NULL,NULL,NULL,0,'',-200000,'1','2019-08-01',1,3),
(70,'9/HAI-UMUM/VIII/2019','2019-08-30',NULL,3,1,1,'Tunai',-10000,'0','2019-08-01',1,NULL),
(71,'10/HAI-UMUM/VIII/2019','2019-08-30',NULL,3,1,5,'',3448000,'0','2019-08-01',1,NULL),
(72,'1/HAI-STIKES/II/2019','2019-08-30',NULL,3,5,1,'',-64000,'0','2019-02-01',1,NULL),
(73,'2/HAI-STIKES/IV/2019','2019-08-30',NULL,3,5,5,'sudah di cek oleh bagian keuangan',7060000,'0','2019-04-01',1,NULL),
(74,'3/HAI-STIKES/IV/2019','2019-08-30',NULL,3,5,1,'Tunai',-128000,'0','2019-08-01',1,NULL),
(75,'4/HAI-STIKES/V/2019','2019-08-30',13,3,5,5,'Bukti Terlampir',0,'0','2019-08-01',1,NULL),
(77,'5/HAI-STIKES/VIII/2019','2019-08-30',NULL,3,5,5,'Bukti terlampir',7060000,'0','2019-08-01',1,NULL),
(78,'6/HAI-STIKES/VIII/2019','2019-08-30',14,3,5,5,'Tunai',0,'0','2019-08-01',1,NULL),
(79,'1/HAI-STAAL/III/2019','2019-08-30',NULL,3,30,7,'Tunai',-619500,'0','2019-03-01',1,NULL),
(80,'2/SSI-DKRTHSBY/II/2019','2019-08-30',NULL,1,18,4,'Tunai',-100000,'0','2019-02-01',1,NULL),
(81,'3/SSI-DKRTHSBY/VI/2019','2019-08-30',NULL,1,18,4,'Bukti terlampir',4880000,'0','2019-06-01',1,NULL),
(82,'1/SSI-MKM/II/2019','2019-08-30',NULL,1,11,4,'Bukti terlampir',28000000,'0','2019-02-01',1,NULL),
(83,'2/SSI-MKM/II/2019','2019-08-30',NULL,1,11,4,'tunai',-14500,'0','2019-02-01',1,NULL),
(84,'3/SSI-MKM/II/2019','2019-08-30',NULL,1,11,4,'tunai',-28000,'0','2019-02-01',1,NULL),
(85,'1/SSI-MSMANGK/VI/2019','2019-08-30',NULL,1,28,4,'Bukti terlampir',4000000,'0','2019-06-01',1,NULL),
(86,'1/SSI-PARIS/III/2019','2019-08-30',NULL,1,8,4,'Tunai',-75000,'0','2019-03-01',1,NULL),
(87,'1/SSI-PGDAIS2/I/2019','2019-08-30',NULL,1,12,4,'Kontrak AIS Tahap 2 PT Pegadaian (Persero) Jakarta\nTransfer  BCA # 8220128599 a.n. Tan Amelia\n',-396704,'0','2019-01-01',1,NULL),
(88,'2/SSI-PGDAIS2/I/2019','2019-08-30',NULL,1,12,4,'Sudah di cek oleh Bagian Keuangan',43507000,'0','2019-01-01',1,NULL),
(89,'3/SSI-PGDAIS2/VIII/2019','2019-08-30',NULL,1,12,4,'Bukti terlampir',-8051778,'0','2019-08-01',1,NULL),
(90,'1/SSI-PPGI/II/2019','2019-08-30',NULL,1,34,4,'transfer tgl 22 Februari 2019',12250000,'0','2019-02-01',1,NULL),
(91,'2/SSI-PPGI/II/2019','2019-08-30',NULL,1,34,4,'tunai',-45000,'0','2019-02-01',1,NULL),
(92,'3/SSI-PPGI/II/2019','2019-08-30',NULL,1,34,4,'tunai',-15500,'0','2019-02-01',1,NULL),
(93,'4/SSI-PPGI/II/2019','2019-08-30',NULL,1,34,4,'',-730848,'0','2019-02-01',1,NULL),
(94,'5/SSI-PPGI/III/2019','2019-08-30',15,1,34,4,'Bukti terlampir',0,'0','2019-03-01',1,NULL),
(96,'6/SSI-PPGI/VI/2019','2019-08-30',NULL,1,34,4,'Tunai',-14500,'0','2019-06-01',1,NULL),
(97,'7/SSI-PPGI/VII/2019','2019-08-30',NULL,1,34,4,'Sudah di cek oleh keuangan',12250000,'0','2019-07-01',1,NULL),
(99,'1/SSI-TPS/I/2019','2019-08-30',NULL,1,33,4,'Tunai',-450000,'0','2019-01-01',1,NULL),
(100,'2/SSI-TPS/I/2019','2019-08-30',NULL,1,33,4,'Tunai',-270000,'0','2019-01-01',1,NULL),
(101,'3/SSI-TPS/III/2019','2019-08-30',NULL,1,33,4,'Bukti terlampir',-150000,'0','2019-03-01',1,NULL),
(102,'4/SSI-TPS/V/2019','2019-08-30',NULL,1,33,4,'Sudah di cek oleh bagian keuangan',20000000,'0','2019-05-01',1,NULL),
(103,'1/SSI-SILABA/IV/2019','2019-08-30',NULL,1,35,4,'Sudah di cek oleh bagian keuangan',12735000,'0','2019-04-01',1,NULL),
(104,'1/SSI-SILABAHU/I/2019','2019-08-30',NULL,1,32,4,'tunai',-15500,'0','2019-01-01',1,NULL),
(105,'2/SSI-SILABAHU/I/2019','2019-08-30',NULL,1,32,4,'Tunai',-1762043,'0','2019-01-01',1,NULL),
(106,'3/SSI-SILABAHU/I/2019','2019-08-30',NULL,1,32,4,'Tunai',-31000,'0','2019-01-01',1,NULL),
(107,'4/SSI-SILABAHU/II/2019','2019-08-30',NULL,1,32,4,'Nilai proyek sebesar Rp.180.000.000,-',88195000,'0','2019-02-01',1,NULL),
(108,'5/SSI-SILABAHU/II/2019','2019-08-30',NULL,1,32,4,'Total yang di reimburse : Rp.5.317.419,-',-6603679,'0','2019-02-01',1,NULL),
(109,'6/SSI-SILABAHU/II/2019','2019-08-30',NULL,1,32,4,'Tunai',-161000,'0','2019-02-01',1,NULL),
(110,'7/SSI-SILABAHU/III/2019','2019-08-30',NULL,1,32,4,'Tunai',-72000,'0','2019-03-01',1,NULL),
(111,'8/SSI-SILABAHU/III/2019','2019-08-30',NULL,1,32,4,'berangkat tgl 27 - 29 Maret 2019',-8204122,'0','2019-03-01',1,NULL),
(112,'9/SSI-SILABAHU/IV/2019','2019-08-30',NULL,1,32,4,'Sudah di cek oleh bagian keuangan',-11532130,'0','2019-04-01',1,NULL),
(113,'10/SSI-SILABAHU/IV/2019','2019-08-30',NULL,1,32,4,'tunai',-14500,'0','2019-04-01',1,NULL),
(114,'11/SSI-SILABAHU/VII/2019','2019-08-30',NULL,1,32,4,'Untuk tiket pesawat akan di reimburse oleh PT Pegadaian.',-6617111,'0','2019-07-01',1,NULL),
(115,'12/SSI-SILABAHU/VIII/2019','2019-08-30',NULL,1,32,4,'transfer tgl 6 Agustus 2019 dan sudah di cek oleh bagian keuangan',5727111,'0','2019-08-01',1,NULL),
(116,'13/SSI-SILABAHU/VIII/2019','2019-08-30',NULL,1,32,4,'transfer tgl 19 Agustus 2019 dan sudah di cek oleh bagian keuangan',70555000,'0','2019-08-01',1,NULL),
(117,'1/SSI-STIESIA/I/2019','2019-08-30',NULL,1,29,4,'Tunai',-224000,'0','2019-01-01',1,NULL),
(118,'2/SSI-STIESIA/I/2019','2019-08-30',NULL,1,29,4,'Tunai',-182000,'0','2019-01-01',1,NULL),
(119,'3/SSI-STIESIA/II/2019','2019-08-30',NULL,1,29,4,'tunai',-380500,'0','2019-02-01',1,NULL),
(120,'4/SSI-STIESIA/III/2019','2019-08-30',NULL,1,29,4,'Tunai',-175000,'0','2019-03-01',1,NULL),
(121,'5/SSI-STIESIA/IV/2019','2019-08-30',NULL,1,29,4,'Tunai',-44000,'0','2019-04-01',1,NULL),
(122,'6/SSI-STIESIA/V/2019','2019-08-30',NULL,1,29,4,'tunai',-100000,'0','2019-05-01',1,NULL),
(123,'7/SSI-STIESIA/VI/2019','2019-08-30',NULL,1,29,4,'Tunai',-35000,'0','2019-06-01',1,NULL),
(124,'8/SSI-STIESIA/VII/2019','2019-08-30',NULL,1,29,4,'Tunai',-715000,'0','2019-08-01',1,NULL),
(125,'9/SSI-STIESIA/VIII/2019','2019-08-30',NULL,1,29,4,'Tunai',-984000,'0','2019-08-01',1,NULL),
(126,'3/SSI-RSMLMG/I/2019','2019-08-30',NULL,1,23,4,'Tunai',-9000,'0','2019-01-01',1,NULL),
(127,'4/SSI-RSMLMG/II/2019','2019-08-30',NULL,1,23,4,'transfer tgl 11 Februari 2019',21425000,'0','2019-02-01',1,NULL),
(128,'5/SSI-RSMLMG/II/2019','2019-08-30',16,1,23,4,'Bukti terlmapir',0,'0','2019-02-01',1,NULL),
(129,'6/SSI-RSMLMG/III/2019','2019-08-30',NULL,1,23,4,'Sudah di cek oleh keuangan',-21425000,'0','2019-03-01',1,NULL),
(130,'7/SSI-RSMLMG/III/2019','2019-08-30',NULL,1,23,4,'Bukti terlampir',-17765000,'0','2019-03-01',1,NULL),
(131,'8/SSI-RSMLMG/IV/2019','2019-08-30',NULL,1,23,4,'Bukti terlampir',-9458750,'0','2019-04-01',1,NULL),
(132,'9/SSI-RSMLMG/VII/2019','2019-08-30',NULL,1,23,4,'',20000000,'0','2019-06-01',1,NULL),
(133,'10/SSI-RSMLMG/VII/2019','2019-08-30',NULL,1,23,4,'Bukti terlampir',-21965000,'0','2019-07-01',1,NULL),
(134,'11/SSI-RSMLMG/VII/2019','2019-08-30',NULL,1,23,4,'bukti terlampir',16611400,'0','2019-07-01',1,NULL),
(135,'1/HAI-WHS/V/2019','2019-08-30',NULL,3,4,5,'Bukti terlampir',1350000,'0','2019-05-01',1,NULL),
(136,'1/SSI-UMUM/I/2019','2019-08-30',NULL,1,1,4,'Tunai',-36000,'0','2019-01-01',1,NULL),
(137,'2/SSI-UMUM/I/2019','2019-08-30',17,1,1,12,'Transfer  BCA # 8220128599 a.n. Tan Amelia',-447210,'0','2019-01-01',1,NULL),
(138,'3/SSI-UMUM/I/2019','2019-08-30',NULL,1,1,7,'tunai',-48000,'0','2019-01-01',1,NULL),
(139,'4/SSI-UMUM/II/2019','2019-08-30',NULL,1,1,2,'',-1693541,'0','2019-02-01',1,NULL),
(140,'5/SSI-UMUM/II/2019','2019-08-30',NULL,1,1,1,'Tunai',-12000,'0','2019-02-01',1,NULL),
(141,'6/SSI-UMUM/III/2019','2019-08-30',NULL,1,1,1,'Tunai',-400000,'0','2019-03-01',1,NULL),
(142,'7/SSI-UMUM/IV/2019','2019-08-30',NULL,1,1,1,'Tunai',-64000,'0','2019-04-01',1,NULL),
(143,'8/SSI-UMUM/IV/2019','2019-08-30',NULL,1,1,1,'tunai',-200000,'0','2019-04-01',1,NULL),
(144,'9/SSI-UMUM/V/2019','2019-08-30',NULL,1,1,1,'tunai',-200000,'0','2019-05-01',1,NULL),
(145,'10/SSI-UMUM/V/2019','2019-08-30',NULL,1,1,1,'Tunai',-27500,'0','2019-05-01',1,NULL),
(146,'11/SSI-UMUM/VI/2019','2019-08-30',NULL,1,1,11,'Transfer  BCA # 8220128599 a.n. Tan Amelia',-396912,'0','2019-06-01',1,NULL),
(147,'12/SSI-UMUM/VII/2019','2019-08-30',NULL,1,1,1,'Tunai',-72000,'0','2019-07-01',1,NULL),
(148,'13/SSI-UMUM/VIII/2019','2019-08-30',NULL,1,1,1,'tunai',-259000,'0','2019-08-01',1,NULL);

/*Table structure for table `bagian` */

DROP TABLE IF EXISTS `bagian`;

CREATE TABLE `bagian` (
  `id_bagian` int(11) NOT NULL AUTO_INCREMENT,
  `kode_bagian` varchar(20) DEFAULT NULL,
  `nama_bagian` varchar(255) DEFAULT NULL,
  `status_bagian` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_bagian`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `bagian` */

insert  into `bagian`(`id_bagian`,`kode_bagian`,`nama_bagian`,`status_bagian`) values 
(1,'PKS','Pusat Kerja Sama','A'),
(2,'PUS','Perpustakaan','A');

/*Table structure for table `detail_arus_dana` */

DROP TABLE IF EXISTS `detail_arus_dana`;

CREATE TABLE `detail_arus_dana` (
  `id_detail_arus` int(11) NOT NULL AUTO_INCREMENT,
  `id_arus_dana` int(11) DEFAULT NULL,
  `uraian` varchar(255) DEFAULT NULL,
  `penerimaan` int(11) DEFAULT NULL,
  `pengeluaran` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_detail_arus`),
  KEY `fk_reference_15` (`id_arus_dana`),
  CONSTRAINT `detail_arus_dana_ibfk_1` FOREIGN KEY (`id_arus_dana`) REFERENCES `arus_dana` (`id_arus_dana`)
) ENGINE=InnoDB AUTO_INCREMENT=295 DEFAULT CHARSET=latin1;

/*Data for the table `detail_arus_dana` */

insert  into `detail_arus_dana`(`id_detail_arus`,`id_arus_dana`,`uraian`,`penerimaan`,`pengeluaran`,`keterangan`) values 
(15,14,'HR Pemateri Pelatihan Desain Grafis untuk Usaha Percetakan',2400000,2400000,'0'),
(55,25,'Transportasi ke DKRTH Surabaya dan pelatihan scrum',0,200000,'Ke DKRTH 3x, pelatihan scrum 3 hari'),
(72,33,'Pembelian kabel HDMI v2.0 Ultra HD ',0,115287,'tunai'),
(74,11,'Transportasi BBM Kanit SSI bulan Desember 2018',0,200000,'Transfer BCA # 6720 4178 29 an Jimmy'),
(75,24,'Pembelian sovenir',0,80000,'0'),
(76,24,'Konsumsi',0,12000,'0'),
(77,24,'Binder buku untuk materi peserta pelatihan',0,29900,'0'),
(78,24,'Coffee untuk minuman peserta',0,13500,'0'),
(79,24,'Kue untuk konsumsi peserta dan pemateri pelatihan',0,128000,'0'),
(81,13,'Transportasi Kanit SSI bulan Januari 2019',0,200000,'Transfer BCA a.n Jimmy | BCA, No. Rek : 6720 4178 29'),
(82,12,'Transportasi Kepala PKS bulan Januari 2019',0,400000,'Transfer  BCA # 8220128599 a.n. Tan Amelia'),
(83,26,'Biaya Transportasi Kanit SSI bulan Februari 2019',0,200000,'Transfer  BCA # 6720 4178 29 a.n Jimmy'),
(84,27,'Biaya Transporsi Kepala Pusat PKS bulan Februari 2019',0,400000,'Transfer  BCA # 8220128599 a.n. Tan Amelia'),
(85,28,'Pembelian Condenser Microphone Mic untuk Laptop',0,114285,'tunai'),
(86,29,'Pembelian Audio Splitter untuk Microphone Laptop',0,37000,''),
(87,30,'Pembelian 12 kaos PKS',0,1020000,''),
(89,34,'Pembelian Post It untuk kegiatan PKS',0,130000,'Tunai'),
(90,35,'9 PCS MOUSE REXUS',0,833313,''),
(93,36,'Transportasi BBM Kepala PKS bulan April 2019',0,400000,'Transfer  BCA # 8220128599 a.n. Tan Amelia'),
(94,37,'Transportasi BBM Kanit SSI bulan April 2019',0,200000,'Transfer BCA # 6720 4178 29 a.n Jimmy'),
(95,38,'Pengiriman dokumen MOU ke UIN Raden Patah Palembang',0,30500,'Tunai'),
(96,39,'Pengiriman Kalender untuk rekanan ke RS Muhammdiyah Lamongan',0,8500,''),
(97,39,'Pengiriman Kalender untuk rekanan ke RSUD Aisyiyah Siti fatimah Sidoarjo',0,7000,''),
(98,39,'Pengiriman Kalender untuk rekanan ke RSUD Syafiyah Bangkalan',0,8500,''),
(99,39,'Pengiriman Kalender untuk rekanan ke JATIMPARK 2 MALANG',0,8500,'Bapak Jemmy'),
(100,39,'Pengiriman Kalender untuk rekanan ke PT Pegadaian Jakarta (Hukum)',0,15000,'Divisi Hukum'),
(101,39,'Pengiriman Kalender untuk rekanan ke PT Pegadaian Jakarta (SPI) ',0,15000,'Divisi IT'),
(103,41,'Pengiriman Kalender ke DIKOMINFO Gresik',0,8500,'Tunai'),
(104,42,'Pengiriman Dokumen MOU ke PT Cyberindo Aditama Jakarta',0,14500,'tunai'),
(107,43,'Transportasi ke IKPI',0,32000,''),
(108,43,'Parkir',0,10000,''),
(110,45,'Pengiriman Dokumen ke Universitas Bina Sarana Informatika Jakarta',0,14500,''),
(111,46,'Pengiriman Dokumen ke Universitas Bina Sarana Informatika Jakarta',0,25000,''),
(112,47,'Penerimaan Pembayaran Pengadaan Grounding System dan Perbaikan Peralatan PARIS Manless RS Muhammadiyah Lamongan',42793000,0,'Transfer tgl 21 Desember 2018'),
(113,48,'Pembayaran untuk perbaikan penggantian alat paris di RSM Lamongan',26122920,26122920,'sudah ditransfer tgl 23 Jan 2019'),
(114,48,'Pembayaran untuk pekerjaan Grounding  di RSM Lamongan',12430000,12430000,'sudah ditransfer tgl 23 Jan 2019'),
(121,40,'Pengiriman Dokumen MOU PT Anabatic Digital',0,15500,''),
(132,32,'Biaya BBM Kanit SSI bulan Maret 2019',0,200000,'Transfer BCA # 6720 4178 29 a.n Jimmy'),
(133,31,'Biaya BBM Kepala Pusat PKS bulan Maret 2019',0,400000,''),
(135,10,'Transportasi BBM Kabag PKS bulan Desember 2018',0,400000,'Transfer  BCA # 8220128599 a.n. Tan Amelia'),
(138,58,'Gathering karyawan bagian PKS (9 orang x Rp.100.000,-)',0,900000,'Anggaran untuk gathering 900.000'),
(139,59,'Biaya Transportasi Kanit SSI bulan Mei 2019',0,200000,'Transfer BCA # 6720 4178 29 a.n Jimmy'),
(141,61,'Biaya transportasi Kanit SSI bln Juni 2019',0,200000,'Transfer  BCA # 6720 4178 29 a.n. Jimmy'),
(142,60,'Biaya Transportasi Kapus PKS bulan Mei 2019',0,400000,'Transfer  BCA # 8220128599 a.n. Tan Amelia'),
(143,62,'Biaya transportasi Kepala PKS bln Juni 2019',0,400000,'Transfer  BCA # 8220128599 a.n. Tan Amelia'),
(144,63,'Acara Studi banding dengan Universitas Ciputra Surabaya',0,436000,''),
(145,64,'Biaya transportasi Kanit SSI bln Juli 2019',0,200000,'Transfer  BCA # 6720 4178 29 a.n. Jimmy'),
(146,65,'Biaya transportasi Kepala PKS bln Juni 2019',0,400000,'Transfer  BCA # 8220128599 a.n. Tan Amelia'),
(147,66,'Acara Visitasi Instansi dari Ep_Tec Academy Jakarta',0,127500,''),
(148,66,'air mineral club',0,46000,''),
(149,67,'Pembelian materai 6.000 sebanyak 25 lembar @Rp.6.000',0,150000,''),
(150,68,'Biaya transportasi Kepala PKS bln Agustus 2019',0,400000,' Transfer  BCA # 8220128599 a.n. Tan Amelia 	'),
(151,69,'Biaya transportasi Kanit SSI bln Agustus 2019',0,200000,' Transfer  BCA # 6720 4178 29 a.n. Jimmy 	'),
(152,70,'Pengiriman dokumen MOU ke UM Jember',0,10000,''),
(153,71,'Penerimaan dari Panitia UTBK UPN Veteran Surabaya',3948000,0,''),
(154,71,'HR Panitian UTBK Stikom Surabaya',0,500000,''),
(155,72,'Perjalanan dinas ke Stikes Dr. Soetomo untuk mengajar',0,64000,'yang berangkat Bu Sulistiowati'),
(156,73,'Penerimaan pembayaran termin I sebesar 50 % dari Rp.14.120.000,- untuk Biaya Partisipasi srIKoM Academic partnership semester Genap Tahun Ajaran 2018/2019 di STIKES yayasan Rumah Sakit Dr. Soetomo Surabaya',7060000,0,''),
(157,74,'Transportasi ke Stikes Dr.Soetomo',0,128000,''),
(158,75,'HR Dosen Pengajar di Stikes Dr. Soetomo setengah smester',636000,636000,'Bu Sulistiowati dan Pak Moh.Arifin'),
(160,77,'Penerimaan Pelunasan pembayaran  sebesar 50 % dari Rp.14.120.000,- untuk Biaya Partisipasi srIKoM Academic partnership semester Genap Tahun Ajaran 2018/2019 di STIKES yayasan Rumah Sakit Dr. Soetomo Surabaya',7060000,0,'Transfer 6 Agustus 2019 dan sudah dicek oleh Bag.Keuangan'),
(161,78,'HR Dosen Pengajar di Stikes Dr. Soetomo setengah smester  th ajaran 2018/2019',636000,636000,'Bu Sulistiowati dan Pak Moh.Arifin'),
(163,80,'Transportasi ke DKRTH Surabaya (3x)',0,100000,''),
(164,81,'Penerimaan Pembayaran  Penambahan Modul Aplikasi sapu Versi 2.1',9880000,0,''),
(165,81,'Pembayaran fee programmer atas nama Bhaga Yanuardo Missa',0,5000000,''),
(166,82,'Penerimaan Pembayaran Pelunasan sebesar 100% tentang Pengadaan Software di Bandara Juwata Tarakan untuk Gate Motor dan Mobil (3 Manless Masuk, 3 Gate Keluar dan 1 Server).',28000000,0,'sudah di cek oleh bagian keuangan'),
(167,83,'Pengiriman Dokumen ke CV Matahari MKM Yogjakarta',0,14500,''),
(168,84,'Pengiriman Dokumen (Manual Book) ke PT Matahari MKM Gubeng',0,28000,''),
(169,85,'Penerimaan pelunasan pembayaran 100% Proyek PARIS Museum Angkut untuk gate mobil (2 manless)',4000000,0,''),
(170,86,'Tunjangan Makan untuk kegiatan Proyek Paris',0,75000,'Jimmy, Lutfi dan pak Charles'),
(171,87,'Penginapan Hotel untuk proyek AIS PT Pegadaian (Persero) Jakarta Periode 5 - 6 Desember 2018',0,396704,'Yang berangkat Jimmy dan Dhani pada tgl 5-6 Desember 2018'),
(175,88,'Penerimaan Pembayaran Termin I,sebesar 30% dari Rp.148.000.000,- tentang Pengadaan Pekerjaan Jasa Pembangunan dashboard Tahap Ke-2 dan Pemeliharaan Report Hasil PengembanganTahap Ke-1 Aplikasi Audit Information System (AIS) PT. Pegadaian (Persero)',44400000,0,''),
(176,88,'PPH 23 atas jasa 2% dari Rp.44.400.000,-',0,888000,''),
(177,88,'Biaya Transfer Bank Lain',0,5000,''),
(178,89,'Tiket Pesawat PP SBY-JKT & JKT-SUB',0,4123780,'Transfer  BCA # 8220128599 a.n. Tan Amelia Rp.5.340.128'),
(179,89,'Penginapan Hotel',0,1216348,''),
(180,89,' Tunjangan perjalanan dinas stikom 4 (Jimmy) ',0,1335000,'Tunai Rp.2.711.650'),
(181,89,' Tunjangan perjalanan dinas stikom 5 (Ramdhani) ',0,960000,''),
(182,89,' Transpotasi Akomodasi ',0,416650,''),
(183,90,'PenerimaanPembayaran termin I, sebesar 50% dari Rp.25.000.000,- tentang Jasa Pembuatan Website Perkumpulan Perusahaan Gadai Indonesia',12250000,0,'Sudah di cek  oleh Bagian Keuangan'),
(184,91,'Konsumsi untuk kegiatan proyek PPGI',0,45000,''),
(185,92,'Pengiriman Dokumen Perjanjian Kerjasama dengan PPGI Jakarta',0,15500,''),
(186,93,'Pembelian template untuk Jasa Pembuatan Website Perkumpulan Perusahaan Gadai Indonesia',0,730848,'Transfer  BCA # 8220128599 a.n. Tan Amelia'),
(187,94,' Pembayaran fee programmer untuk proyek Pembuatan Website PPGI',7500000,7500000,''),
(189,96,'Pengiriman dokumen ke PPGI Jakarta',0,14500,''),
(190,97,'Penerimaan Pelunasan Pembayaran termin II, sebesar 50% dari Rp.25.000.000,- tentang Jasa Pembuatan Website Perkumpulan Perusahaan Gadai Indonesia',12500000,0,''),
(191,97,'Pph 23 sebesar 2% ',0,250000,''),
(193,99,'Biaya kegiatan Proyek PARIS Terminal Peti Kemas Surabaya',0,450000,'Jimmy dan Ramdhani'),
(194,100,'Transportasi ke Terminal Petikemas Surabaya (Proyek PARIS)',0,270000,'tidak ada driver'),
(195,101,'Biaya kegiatan Proyek Paris Terminal Petikemas Surabaya ',0,150000,''),
(197,102,'Penerimaan pembayaran tentang Pengadaan Produk Massal Acces Control Management di PT. Terminal Petikemas Surabaya',20000000,0,'Transfer tgl 17 Mei 2019'),
(198,103,'Penerimaan Pelunasan pembayaran termin III sebesar 10% dari Rp.130.000.000,- tentang Jasa Pembuatan Aplikasi Layanan Hukum dan Bantuan Hukum (SiLaBa)',13000000,0,''),
(199,103,'PPH 23 atas jasa 2% dari Rp.13.000.000,-',0,260000,''),
(200,103,'Biaya Transfer bank lain',0,5000,''),
(201,104,'Pengiriman Dokumen ke PT Pegadaian (Persero) untuk Divisi Hukum',0,15500,''),
(202,105,'Pembelian Template untuk Proyek SILABAHU',0,262043,''),
(203,105,'Pembuatan logo Pegadaian Divisi Hukum SILABAHU',0,1500000,''),
(204,106,'Pengiriman surat balasan PWC untuk PT Pegadaian Persero',0,31000,''),
(205,107,'Penerimaan Pembayaran termin I, sebesar 50% dari Rp.180.000.000,- tentang Pengadaan Jasa Pembuatan Aplikasi Sistem Informasi Layanan dan Bantuan Hukum (SILABAHU)',90000000,0,'Transfer tgl 6 Feb 2019 Sudah di cek oleh bagian keuangan'),
(206,107,'PPH 23 atas jasa 2% dari Rp.90.000.000',0,1800000,'Bukti pemotongan pajak Belum dikirim oleh Pegadaian divisi Hukum'),
(207,107,'Biaya transfer bank lain',0,5000,''),
(214,108,'Tiket Pesawat SBY-JKT',0,2301360,'Reimburse'),
(215,108,'Tiket Pesawat JKT-SBY',0,2705200,'Reimburse'),
(216,108,'Penginapan Hotel',0,310859,'Reimburse'),
(217,108,'Transportasi perjalanan dan tol',0,401260,''),
(218,108,'Tunjangan Perjalanan Dinas Stikom 4',0,505000,'Jimmy'),
(219,108,'Tunjangan Perjalanan Dinas Stikom 5',0,380000,'Ramdhani'),
(220,109,'Konsumsi untuk kegiatan proyek SILABAHU',0,161000,''),
(221,110,'Jilid manual book SILABAHU 4 buah',0,72000,''),
(222,111,'Tiket Sby-Jkt (2 orang)',0,2755200,'Reimburse'),
(223,111,' Tiket Jkt-Sby (2 orang) ',0,2662000,'Reimburse'),
(224,111,' Penginapan Hotel ',0,792512,'Reimburse'),
(225,111,' Transportasi perjalanan dan tol ',0,404410,''),
(226,111,' Tunjangan Perjalanan Dinas stikom 4 (Jimmy)  ',0,920000,''),
(227,111,' Tunjangan Perjalanan Dinas stikom 5 (Ramdhani)  ',0,670000,''),
(228,112,'Pembayaran Reimburse PT Pegadaian (Persero) Proyek SILABAHU (Periode 6-7 Feb 2019 dan 27-29 Maret 2019) ',0,11527130,''),
(229,112,'Biaya transfer bank lain',0,5000,''),
(230,113,'Pengiriman dokumen ke PT Pegadaian (SILABAHU)',0,14500,''),
(231,114,'Tiket Pesawat PP (SUb-UPG & UPG-SUB)',0,5732111,'Transfer  BCA # 8220128599 a.n. Tan Amelia'),
(232,114,'Tunjangan perjalanan dinas stikom 4 (jimmy)',0,505000,'Jimmy'),
(233,114,'Tunjangan perjalanan dinas stikom 5 (ramdhani)',0,380000,'Ramdhani'),
(234,115,'Reimburse Tiket Pesawat PP (SUb-UPG & UPG-SUB) PT. Pegadaian (Pesero) Jakarta',5732111,0,''),
(235,115,'Biaya Transfer bank lain',0,5000,''),
(236,116,' Penerimaan pembayaran termin II sebesar 40% dari Rp.180.000.000,- tentang Pengadaan Jasa Pembuatan Aplikasi Sistem lnformasi Layanandan Bantuan Hukum (SILABAHU) ',72000000,0,''),
(237,116,'Pph 23 sebesar 2%',0,1440000,''),
(238,116,'Biaya Transfer bank lain',0,5000,''),
(239,117,'Konsumsi untuk kegiatan Proyek Stiesia Surabaya',0,224000,''),
(240,118,'Transportasi ke STIESIA Surabaya',0,32000,'tidak ada driver'),
(241,118,'Konsumsi untuk proyek STIESIA Surabaya',0,150000,'3 orang'),
(242,119,'Transportasi ke STIESIA Surabaya',0,43000,'tidak ada driver'),
(243,119,'Konsumsi kegiatan proyek STIESIA Surabaya',0,337500,''),
(244,120,'Tunjangan Makan untuk kegiatan Proyek Stiesia Surabaya',0,175000,'Dani, Nanda, Adhe dan Lutfi'),
(245,121,'Transportasi ke STIESIA SURABAYA',0,44000,''),
(246,122,'Konsumsi kegiatan proyek STIESIA Surabaya',0,100000,'Dani, Adhe, Lutfi, dan Nanda'),
(247,123,'Konsumsi tamu Stiesia Surabaya',0,19000,''),
(248,123,'Transportasi ke Stiesia Surabaya',0,16000,'tidak ada driver'),
(249,124,'Transportasi ke Stiesia Surabaya',0,15000,''),
(250,124,'Tunjangan makan proyek Stiesia Surabaya',0,100000,'Adhe, Dani, Heru dan Idham'),
(251,124,'Biaya Kegiatan Proyek Stiesia Surabaya',0,600000,'Adhe, Dani, dan Idham'),
(252,125,'Transportasi ke Stiesia Surabaya',0,159000,''),
(253,125,'Biaya Kegiatan Proyek Stiesia Surabaya',0,825000,'Dani, Idhan dan Adhe'),
(254,126,'Pengiriman Dokumen Kerja Sama ke RS Muhammdiyah Lamongan',0,9000,''),
(255,127,'Penerimaan pembayaran termin 1, sebesar 50% dari Rp.42.850.000,- tentang pengadaan software dan hardware PARIS RS Muhammadiyah Lamongan   ',21425000,0,'Sudah dicek bag.keuangan '),
(256,128,'Pembayaran DP 50% dari total Rp.18.917.500,- untuk Manless Ticket Dispenser, IP Camera dan servis perbaikan di RS Muhammdiyah Lamongan',9458750,9458750,''),
(257,129,'Pelunasan Pembayaran termin II, sebesar 50% dari Rp.42.850.000,- tentang Pengadaan Software dan Hardware PARIS Rumah Sakit Muhammadiyah Lamongan.',0,21425000,'transfer tanggal  26 Maret 2019'),
(258,130,'Pembayaran pembelian Hardware untuk RS Muhammdiyah Lamongan',0,17765000,'Transfer BCA # 673 0660 888'),
(259,131,'Pelunasan Pembayaran sebesar 50% dari total Rp.18.917.500,- untuk Manless Ticket Dispenser, IP Camera dan servis perbaikan di RS Muhammdiyah Lamongan',0,9458750,'transfer BCA # 507 550 688 8 a.n Arisone Charles'),
(260,132,'Penerimaan Pembayaran DP Proyek PARIS RS Muhammadiyah Lamongan sebesar Rp.20.000.0000 dari Rp.36.611.400 untuk gate motor (Custom) ',20000000,0,'transfer 2 Juli 2019 (sudah dicek oleh bagian keuangan)'),
(261,133,'Pembelian 1 unit IP Camera Snapshot + Adaptor dan 1 unit Manless ECR - Gaet Out oleh MAC Automation',0,4145000,'Transfer BCA # 507 550 6888 a.n Arisone Charles'),
(262,133,'Pembelian 1 unit barrier gate, 2 unit loopdetector, 1 unit material instalasi dan 1 ls biaya instalasi oleh PT Matahari Aneka MKM',0,17820000,'Transfer BCA # 6730 660 888 a.n PT. Matahari Aneka MKM'),
(263,134,'Penerimaan Pelunasan PembayaranProyek PARIS RS Muhammadiyah Lamongan sebesar Rp.16.611.400 dari Rp.36.611.400 untuk gate motor (Custom) ',16611400,0,'transfer tgl 25 juli 2019 dan sudah di cek oleh bagian keuangan'),
(266,135,'Penerimaan dari Biaya Partisipasi sebagai Penguji Uji Kompetensi Keahlian di SMK Wachid Hasyim',2700000,0,'60 siswa x Rp.45.000,-'),
(267,135,'Pembayaran Honorarium Koordinator Penguji dan Penguji Uji Kompetensi Komputer Multimedia',0,1350000,'Pak karsam dan Pak Krisna'),
(268,136,'Cetak Manual Book PARIS versi baru 2 Examplar',0,36000,''),
(269,137,'Pelatihan Profesional Scrum untuk SSI',30000000,0,''),
(270,137,'Biaya Pelatihan Sertifikasi Pelatihan Profesional Scrum',0,28636360,''),
(271,137,'Perlengkapan dan Konsumsi Pelatihan',0,1810850,''),
(272,138,'Konsumsi untuk Pertemuan dengan Client PT Surveyor Indonesia',0,48000,'dilaksanakan pada Senin, 28 Januari 2019'),
(273,139,'Pembelian 2 domain  untuk Paris Parking dan ITCoPS dan Upgrade hosting dan perpanjangan untuk SSI Dev',0,1693541,''),
(274,140,'Pengiriman Dokumen ke PT Surveyor Indonesia',0,12000,''),
(275,141,'Transportasi ke DKTH (3x), Unesa, PT.MKM (2x), Stikes Dr.Soetomo (2x)',0,400000,''),
(276,142,'Konsumsi untuk pertemuan dengan PT Transtek ',0,64000,'Kunjungan dilakukan pada Kamis, 15 April 2019'),
(277,143,'Transportasi ke Unesa Ketintang (3x)',0,200000,''),
(278,144,'Biaya trasnportasi ke DKRTH (3x) dan Delisia Resto',0,200000,''),
(280,146,'Pembelian template untuk market place',0,396912,''),
(281,145,'Pembelian kaki X Banner ukuran 60x160cm',0,22500,''),
(282,145,'Parkir',0,5000,''),
(283,147,'Biaya Transportasi ke PT Inti Utama Suarabaya',0,72000,''),
(284,148,'Transportasi ke PT MKM Gubeng, Unesa Ketintang, Duboy, Stiesia Surabaya, UPN Veteran Surabaya',0,200000,''),
(285,148,'Tol dan parkir',0,19000,''),
(286,148,'Konsumsi untuk pertemuan dengan SHS',0,40000,''),
(287,79,'Konsumsi untuk kegiatan Studi Banding STAAL',0,619500,'');

/*Table structure for table `detail_permintaan_anggaran` */

DROP TABLE IF EXISTS `detail_permintaan_anggaran`;

CREATE TABLE `detail_permintaan_anggaran` (
  `id_detail_permintaan` int(11) NOT NULL AUTO_INCREMENT,
  `id_permintaan` int(11) DEFAULT NULL,
  `uraian` varchar(255) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_detail_permintaan`),
  KEY `fk_reference_10` (`id_permintaan`),
  CONSTRAINT `detail_permintaan_anggaran_ibfk_1` FOREIGN KEY (`id_permintaan`) REFERENCES `permintaan_anggaran` (`id_permintaan`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

/*Data for the table `detail_permintaan_anggaran` */

insert  into `detail_permintaan_anggaran`(`id_detail_permintaan`,`id_permintaan`,`uraian`,`nominal`,`keterangan`) values 
(17,11,'HR Pemateri Pelatihan Desain Grafis untuk Usaha Percetakan',2400000,'Pelatihan dilaksanakan mulai 13 Desember 2018 - 23 Januari 2019'),
(18,12,'Pembayaran untuk perbaikan penggantian alat paris di RSM Lamongan',12430000,'Kwitansi no: K/10104/WL/XII/2018'),
(19,12,'Pembayaran untuk pekerjaan Grounding  di RSM Lamongan',26122920,'Kwitansi no: K/10106/WL/XII/2018'),
(21,13,'Anggaran HR Dosen Pengajar di Stikes Dr. Soetomo setengah smester',636000,'Bu Sulistiowati dan Pak Moh.Arifin'),
(22,14,'HR Dosen Pengajar di Stikes Dr. Soetomo setengah smester  th ajaran 2018/2019',636000,'Bu Sulistiowati dan Pak Moh.Arifin'),
(23,15,'Anggaran untuk Pembayaran fee programmer untuk proyek Pembuatan Website PPGI',7500000,''),
(24,16,'Pembayaran DP 50% dari total Rp.18.917.500,- untuk Manless Ticket Dispenser, IP Camera dan servis perbaikan di RS Muhammdiyah Lamongan',9458750,'Transfer BCA # 507 550 688 8 an Arisone Charles'),
(25,17,'Pelatihan Profesional Scrum untuk SSI',30000000,'Kekurangan anggaran ini diambil dari dana Acara MOU (B.1)');

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kategori` varchar(255) DEFAULT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL,
  `id_bagian` int(11) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`),
  KEY `fk_reference_3` (`id_bagian`),
  CONSTRAINT `kategori_ibfk_1` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id_bagian`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`id_kategori`,`kode_kategori`,`nama_kategori`,`id_bagian`,`status`) values 
(1,'UMUM','UMUM',1,'A'),
(2,'SINLUI','SINLUI',1,'A'),
(3,'PEMKOT','PEMKOT',1,'A'),
(4,'WHS','SMK WACHID HASYIM',1,'A'),
(5,'STIKES','STIKES DR SOETOMO',1,'A'),
(6,'UMKM','UMKM BPR JATIM',1,'A'),
(7,'DIT','Dili institute of Technology',1,'A'),
(8,'PARIS','PARIS STIKOM',1,'A'),
(9,'WBS','PT WIRA BHUMI SEJATI',1,'A'),
(10,'POLTEKPEL','Politeknik Pelayaran Surabaya',1,'A'),
(11,'MKM','PT MATAHARI MKM',1,'A'),
(12,'PGDAIS2','PT PEGADAIAN PERSERO AIS',1,'A'),
(13,'SHS','Surabaya Hotel School',1,'A'),
(14,'RSFATIMAH','Rumah Sakit Aisyah Fatimah',1,'A'),
(15,'RISDIKTI','Ristekdikti Jakarta',1,'A'),
(16,'KENPARK','Kenpark Surabaya',1,'A'),
(17,'IPH','IPH SCHOOL',1,'A'),
(18,'DKRTHSBY','Dinas Kebersihan dan Pertamanan Surabaya',1,'A'),
(19,'RSKOESMO','RS Koesmo Tuban',1,'A'),
(20,'UNIJOYO','Universitas Trunojo Madura',1,'A'),
(21,'MP','Master Park Purwodadi',1,'A'),
(22,'DINKOMINFO','Dinas Komunikasi dan Informatika Gresik',1,'A'),
(23,'RSMLMG','RS Muhammadiyah Lamongan',1,'A'),
(24,'KOPERTISIX','Kopertis Wilayah IX Sulawesi',1,'A'),
(25,'JTMPARK','PT. JATIM PARK 2, Batu Malang',1,'A'),
(26,'RSI JMSR','RS Islam Jemursari',1,'A'),
(28,'MSMANGK','Museum Angkut Batu Malang',1,'A'),
(29,'STIESIA','STIESIA SURABAYA',1,'A'),
(30,'STAAL','Sekolah Tinggi Akademi Angkatan Laut',1,'A'),
(31,'RSUDBKLN','RSUD BANGKALAN',1,'A'),
(32,'SILABAHU','PT PEGADAIAN PERSERO SILABAHU',1,'A'),
(33,'TPS','Terminal Peti Kemas Surabaya',1,'A'),
(34,'PPGI','Persatuan Perusahaan Gadai Indonesia',1,'A'),
(35,'SILABA','PT PEGADAIAN PERSERO SILABA',1,'A'),
(36,'DRMGLF','Darmo Golf',1,'A'),
(37,'FMIPAUNESA','FMIPA Universitas Negeri Surabaya',1,'A'),
(38,'KTNG','Perusahaan KTNG Purwosari',1,'A');

/*Table structure for table `pemegang_jabatan` */

DROP TABLE IF EXISTS `pemegang_jabatan`;

CREATE TABLE `pemegang_jabatan` (
  `id_pj` int(11) NOT NULL AUTO_INCREMENT,
  `id_bagian` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_pj`),
  KEY `fk_reference_17` (`id_bagian`),
  CONSTRAINT `pemegang_jabatan_ibfk_1` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id_bagian`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `pemegang_jabatan` */

insert  into `pemegang_jabatan`(`id_pj`,`id_bagian`,`nama`,`jabatan`) values 
(2,1,'Tan Amelia, S.Kom., M.MT., MCP','Kepala Pusat'),
(7,1,'Jimmy, S.Kom.','Kepala Unit SSI');

/*Table structure for table `permintaan_anggaran` */

DROP TABLE IF EXISTS `permintaan_anggaran`;

CREATE TABLE `permintaan_anggaran` (
  `id_permintaan` int(11) NOT NULL AUTO_INCREMENT,
  `no_anggaran` varchar(255) DEFAULT NULL,
  `id_bagian` int(11) DEFAULT NULL,
  `id_unit_kerja` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_anggaran` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `tanggal_kebutuhan` date DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status_realisasi` varchar(1) DEFAULT 'D',
  PRIMARY KEY (`id_permintaan`),
  UNIQUE KEY `no_anggaran` (`no_anggaran`),
  KEY `fk_reference_6` (`id_bagian`),
  KEY `fk_reference_7` (`id_unit_kerja`),
  KEY `fk_reference_8` (`id_kategori`),
  KEY `fk_reference_9` (`id_anggaran`),
  CONSTRAINT `permintaan_anggaran_ibfk_1` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id_bagian`),
  CONSTRAINT `permintaan_anggaran_ibfk_2` FOREIGN KEY (`id_unit_kerja`) REFERENCES `unit_kerja` (`id_unit_kerja`),
  CONSTRAINT `permintaan_anggaran_ibfk_3` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  CONSTRAINT `permintaan_anggaran_ibfk_4` FOREIGN KEY (`id_anggaran`) REFERENCES `anggaran` (`id_anggaran`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `permintaan_anggaran` */

insert  into `permintaan_anggaran`(`id_permintaan`,`no_anggaran`,`id_bagian`,`id_unit_kerja`,`id_kategori`,`id_anggaran`,`tanggal`,`tanggal_kebutuhan`,`catatan`,`total`,`status_realisasi`) values 
(11,'1/PS-UMUM/I/2019',1,2,1,6,'2019-01-30','2019-02-05','Tunai',2400000,'W'),
(12,'2/SSI-RSMLMG/I/2019',1,1,23,4,'2019-01-17','2019-01-22','Transfer ke BCA KCP Rungkut Megah Surabaya #6730 660 888 a.n PT. Matahri Aneka MKM',38552920,'W'),
(13,'4/HAI-STIKES/V/2019',1,3,5,5,'2019-05-23','2019-05-29','Tunai',636000,'W'),
(14,'6/HAI-STIKES/VIII/2019',1,3,5,5,'2019-08-08','2019-08-14','Tunai',636000,'W'),
(15,'5/SSI-PPGI/III/2019',1,1,34,4,'2019-03-08','2019-03-15','Tunai',7500000,'W'),
(16,'5/SSI-RSMLMG/II/2019',1,1,23,4,'2019-02-13','2019-02-19','',9458750,'W'),
(17,'2/SSI-UMUM/I/2019',1,1,1,12,'2019-01-17','2019-01-22','Transfer  BCA # 8220128599 a.n. Tan Amelia',30000000,'W');

/*Table structure for table `tanda_tangan` */

DROP TABLE IF EXISTS `tanda_tangan`;

CREATE TABLE `tanda_tangan` (
  `id_ttd` int(11) NOT NULL AUTO_INCREMENT,
  `id_bagian` int(11) DEFAULT NULL,
  `dokumen` varchar(10) DEFAULT NULL,
  `dibuat` varchar(255) DEFAULT NULL,
  `jabatan_pembuat` varchar(255) DEFAULT NULL,
  `diperiksa` varchar(255) DEFAULT NULL,
  `jabatan_pemeriksa` varchar(255) DEFAULT NULL,
  `diketahui` varchar(255) DEFAULT NULL,
  `jabatan_yg_mengetahui` varchar(255) DEFAULT NULL,
  `disetujui` varchar(255) DEFAULT NULL,
  `jabatan_penyetuju` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_ttd`),
  KEY `fk_reference_16` (`id_bagian`),
  CONSTRAINT `tanda_tangan_ibfk_1` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id_bagian`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tanda_tangan` */

insert  into `tanda_tangan`(`id_ttd`,`id_bagian`,`dokumen`,`dibuat`,`jabatan_pembuat`,`diperiksa`,`jabatan_pemeriksa`,`diketahui`,`jabatan_yg_mengetahui`,`disetujui`,`jabatan_penyetuju`) values 
(1,1,'permintaan','Lulut Fitriyaningrum, S,Kom','Admin','Tan Amelia, S.Kom., M.MT., MCP','Kepala Pusat','Lilis Binawati, S.E., M.Ak','Wakil Rektor Bidang Sumber Daya','Prof. Dr. Budi Jatmiko, M.Pd','Rektor'),
(2,1,'realisasi','Lulut Fitriyaningrum, S,Kom','Admin','Tan Amelia, S.Kom., M.MT., MCP','Kepala Pusat','Lilis Binawati, S.E., M.Ak','Wakil Rektor Bidang Sumber Daya','Prof. Dr. Budi Jatmiko, M.Pd','Rektor'),
(3,1,'reimburse','Tan Amelia, S.Kom., M.MT., MCP','Kepala Pusat',NULL,NULL,NULL,NULL,'Lilis Binawati, S.E., M.Ak','Wakil Rektor Bidang Sumber Daya');

/*Table structure for table `unit_kerja` */

DROP TABLE IF EXISTS `unit_kerja`;

CREATE TABLE `unit_kerja` (
  `id_unit_kerja` int(11) NOT NULL AUTO_INCREMENT,
  `id_bagian` int(11) DEFAULT NULL,
  `nama_unit_kerja` varchar(255) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `kode_unit_kerja` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_unit_kerja`),
  KEY `fk_reference_2` (`id_bagian`),
  CONSTRAINT `unit_kerja_ibfk_1` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id_bagian`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `unit_kerja` */

insert  into `unit_kerja`(`id_unit_kerja`,`id_bagian`,`nama_unit_kerja`,`status`,`kode_unit_kerja`) values 
(1,1,'Solusi Sistem Informasi','A','SSI'),
(2,1,'Pelatihan dan Sertifikasi','A','PS'),
(3,1,'Hubungan Antar Instansi','A','HAI');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `password_admin` varchar(255) DEFAULT NULL,
  `id_bagian` int(11) DEFAULT NULL,
  `level_admin` varchar(100) NOT NULL,
  `status_admin` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `fk_reference_1` (`id_bagian`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id_bagian`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`user_id`,`username`,`nama_admin`,`password_admin`,`id_bagian`,`level_admin`,`status_admin`) values 
(1,'superadmin','Super Administrator','$2y$10$K5KdI2pCnak7ZrHPHC62COqSgujp22tkXiBaCwQ5uSG.kX9.pjSB6',NULL,'ADR','A'),
(2,'lulut','Lulut Fitr','$2y$10$XfZDYKf9aHOZSrwdXGsxd.3S3B1n9BcyofkHw9L0C8YxrEufyAR3C',1,'ADM','A'),
(4,'meli','Tan Amelia','$2y$10$cUE1lu7QY8HXCyw.9g1JqOdpK12I/wOWFawrqpPhuch9uG.4p8kt.',1,'MNG','A');

/* Function  structure for function  `generate_no_anggaran` */

/*!50003 DROP FUNCTION IF EXISTS `generate_no_anggaran` */;
DELIMITER $$

/*!50003 CREATE FUNCTION `generate_no_anggaran`(p_tanggal DATE, p_id_unit INT, p_id_kategori INT, p_kode_bagian VARCHAR(10)) RETURNS varchar(50) CHARSET latin1
BEGIN
	DECLARE v_kode_unit VARCHAR(50);
	DECLARE v_kode_kategori VARCHAR(50);
	DECLARE v_bulan_romawi VARCHAR(5);
	DECLARE v_no_anggaran VARCHAR(100);
	DECLARE v_urutan INT;
	DECLARE v_urutan_realisasi INT;
	
	IF(p_id_unit = '') THEN
		SELECT IFNULL(MAX(CAST(LEFT(no_anggaran,LOCATE('/',no_anggaran) - 1) AS UNSIGNED)),0)+1 INTO v_urutan 
		FROM permintaan_anggaran WHERE id_kategori IS NULL AND id_unit_kerja IS NULL;

		SELECT IFNULL(MAX(CAST(LEFT(no_arus_dana,LOCATE('/',no_arus_dana) - 1) AS UNSIGNED)),0)+1 INTO v_urutan_realisasi 
		FROM arus_dana WHERE id_kategori IS NULL AND id_unit_kerja IS NULL;
		
		SET v_kode_unit = p_kode_bagian;
	ELSE
		SELECT IFNULL(MAX(CAST(LEFT(no_anggaran,LOCATE('/',no_anggaran) - 1) AS UNSIGNED)),0)+1 INTO v_urutan 
		FROM permintaan_anggaran WHERE id_kategori = p_id_kategori AND id_unit_kerja = p_id_unit;
		
		SELECT IFNULL(MAX(CAST(LEFT(no_arus_dana,LOCATE('/',no_arus_dana) - 1) AS UNSIGNED)),0)+1 INTO v_urutan_realisasi 
		FROM arus_dana WHERE id_kategori = p_id_kategori AND id_unit_kerja = p_id_unit;

		SELECT kode_unit_kerja INTO v_kode_unit FROM unit_kerja WHERE id_unit_kerja = p_id_unit;
	END IF;

	
	
	IF
		v_urutan_realisasi>v_urutan
		THEN
		SET v_urutan = v_urutan_realisasi;
	END IF;

	SELECT kode_kategori INTO v_kode_kategori FROM kategori WHERE id_kategori = p_id_kategori;
	
	SET v_bulan_romawi = to_roman(DATE_FORMAT(p_tanggal,'%c'));
	
	IF(p_id_unit = '') THEN
		SET v_no_anggaran = CONCAT(v_urutan,'/',v_kode_unit,'/',v_bulan_romawi,'/',DATE_FORMAT(p_tanggal,'%Y'));
	ELSE
		SET v_no_anggaran = CONCAT(v_urutan,'/',v_kode_unit,'-',v_kode_kategori,'/',v_bulan_romawi,'/',DATE_FORMAT(p_tanggal,'%Y'));
	END IF;
	RETURN v_no_anggaran;
	
    END */$$
DELIMITER ;

/* Function  structure for function  `to_roman` */

/*!50003 DROP FUNCTION IF EXISTS `to_roman` */;
DELIMITER $$

/*!50003 CREATE FUNCTION `to_roman`(`inArabic` INT) RETURNS varchar(15) CHARSET latin1
BEGIN
	DECLARE numeral CHAR(7) DEFAULT 'IVXLCDM';
	    DECLARE stringInUse CHAR(3);
	    DECLARE position tinyint DEFAULT 1;
	    DECLARE currentDigit tinyint;
	    DECLARE returnValue VARCHAR(15) DEFAULT '';
	    IF(inArabic > 3999) THEN RETURN 'overflow'; END IF;
	    IF(inArabic = 0) THEN RETURN 'N'; END IF;
	    WHILE position <= CEIL(LOG10(inArabic + .1)) DO
		SET currentDigit := MOD(FLOOR(inArabic / POW(10, position - 1)), 10);
		SET returnValue := CONCAT(
		    CASE currentDigit
			WHEN 4 THEN CONCAT(SUBSTRING(numeral, position * 2 - 1, 1), SUBSTRING(numeral, position * 2, 1))
			WHEN 9 THEN CONCAT(SUBSTRING(numeral, position * 2 - 1, 1), SUBSTRING(numeral, position * 2 + 1, 1))
			ELSE CONCAT(
			    REPEAT(SUBSTRING(numeral, position * 2, 1), currentDigit >= 5),
			    REPEAT(SUBSTRING(numeral, position * 2 - 1, 1), MOD(currentDigit, 5))
			)
		    END,
		    returnValue);
		SET position := position + 1;
	    END WHILE;
	    RETURN returnValue;
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
