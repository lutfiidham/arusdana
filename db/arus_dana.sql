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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

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
(14,'C.2','1 Lusin Kaos PKS',1,'A',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

/*Data for the table `arus_dana` */

insert  into `arus_dana`(`id_arus_dana`,`no_arus_dana`,`tanggal`,`id_permintaan`,`id_unit_kerja`,`id_kategori`,`id_anggaran`,`catatan`,`total`,`bbm`,`periode_pelaksanaan`,`id_bagian`,`id_pj`) values 
(10,'1/PKS/I/2019','2019-01-03',NULL,NULL,NULL,NULL,'Bukti terlampir',-400000,'1','2018-12-01',1,2),
(11,'2/PKS/I/2019','2019-01-03',NULL,NULL,NULL,NULL,'Bukti terlampir',-200000,'1','2018-12-01',1,0),
(12,'3/PKS/I/2019','2019-01-31',NULL,NULL,NULL,0,'Bukti terlampir',-400000,'1','2019-01-01',1,NULL),
(13,'4/PKS/I/2019','2019-01-31',NULL,NULL,NULL,NULL,'Bukti terlampir',-200000,'1','2019-01-01',1,0),
(14,'1/PS-UMUM/I/2019','2019-07-26',11,2,1,6,'Bukti Terlampir',0,'0','2019-01-01',1,NULL),
(15,'1/PS-UMUM/I/2019','2019-07-26',11,2,1,6,'Bukti Terlampir',0,'0','2019-01-01',1,NULL),
(16,'1/PS-UMUM/I/2019','2019-07-26',11,2,1,6,'Tunai',0,'0','2019-07-01',1,NULL),
(17,'1/PS-UMUM/I/2019','2019-07-26',11,2,1,6,'Bukti terlampir',0,'0','2019-07-01',1,NULL),
(18,'1/PS-UMUM/I/2019','2019-07-26',11,2,1,6,'Bukti terlampir',0,'0','2019-07-01',1,NULL),
(19,'1/PS-UMUM/I/2019','2019-07-26',11,2,1,6,'Bukti terlampir',0,'0','2019-07-01',1,NULL),
(20,'1/PS-STAAL/I/2019','2019-07-26',NULL,2,30,6,'',-18000,'0','2019-07-01',1,NULL),
(22,'1/PS-UMUM/I/2019','2019-07-26',11,2,1,6,'Tunai',0,'0','2019-07-01',1,NULL),
(23,'1/PS-UMUM/I/2019','2019-07-26',11,2,1,6,'Tunai',0,'0','2019-07-01',1,NULL),
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
(49,'2/SSI-RSMLMG/I/2019','2019-08-14',12,1,23,4,'Transfer ke BCA KCP Rungkut Megah Surabaya #6730 660 888 a.n PT. Matahri Aneka MKM',0,'0','2019-01-01',1,NULL),
(50,'2/SSI-RSMLMG/I/2019','2019-08-14',12,1,23,4,'Transfer ke BCA KCP Rungkut Megah Surabaya #6730 660 888 a.n PT. Matahri Aneka MKM',0,'0','2019-08-01',1,NULL),
(51,'2/SSI-RSMLMG/I/2019','2019-08-14',12,1,23,4,'Transfer ke BCA KCP Rungkut Megah Surabaya #6730 660 888 a.n PT. Matahri Aneka MKM',0,'0','2019-08-01',1,NULL),
(52,'2/SSI-RSMLMG/I/2019','2019-08-14',12,1,23,4,'Transfer ke BCA KCP Rungkut Megah Surabaya #6730 660 888 a.n PT. Matahri Aneka MKM',0,'0','2019-08-01',1,NULL),
(53,'2/SSI-RSMLMG/I/2019','2019-08-14',12,1,23,4,'Transfer ke BCA KCP Rungkut Megah Surabaya #6730 660 888 a.n PT. Matahri Aneka MKM',0,'0','2019-08-01',1,NULL),
(54,'2/SSI-RSMLMG/I/2019','2019-08-14',12,1,23,4,'Transfer ke BCA KCP Rungkut Megah Surabaya #6730 660 888 a.n PT. Matahri Aneka MKM',0,'0','2019-08-01',1,NULL),
(55,'2/SSI-RSMLMG/I/2019','2019-08-14',12,1,23,4,'Transfer ke BCA KCP Rungkut Megah Surabaya #6730 660 888 a.n PT. Matahri Aneka MKM',0,'0','2019-08-01',1,NULL),
(56,'2/SSI-RSMLMG/I/2019','2019-08-14',12,1,23,4,'Transfer ke BCA KCP Rungkut Megah Surabaya #6730 660 888 a.n PT. Matahri Aneka MKM',0,'0','2019-08-01',1,NULL),
(57,'2/SSI-RSMLMG/I/2019','2019-08-14',12,1,23,4,'Transfer ke BCA KCP Rungkut Megah Surabaya #6730 660 888 a.n PT. Matahri Aneka MKM',0,'0','2019-08-01',1,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=latin1;

/*Data for the table `detail_arus_dana` */

insert  into `detail_arus_dana`(`id_detail_arus`,`id_arus_dana`,`uraian`,`penerimaan`,`pengeluaran`,`keterangan`) values 
(15,14,'HR Pemateri Pelatihan Desain Grafis untuk Usaha Percetakan',2400000,2400000,'0'),
(16,15,'HR Pemateri Pelatihan Desain Grafis untuk Usaha Percetakan',2400000,2400000,'0'),
(17,16,'HR Pemateri Pelatihan Desain Grafis untuk Usaha Percetakan',2400000,2400000,'0'),
(18,17,'HR Pemateri Pelatihan Desain Grafis untuk Usaha Percetakan',2400000,2400000,'0'),
(19,18,'HR Pemateri Pelatihan Desain Grafis untuk Usaha Percetakan',2400000,2400000,'0'),
(20,19,'HR Pemateri Pelatihan Desain Grafis untuk Usaha Percetakan',2400000,2400000,'0'),
(21,20,'10 Lembar kertas Sertifikat untuk STAAL',0,18000,'Debet Memo'),
(26,22,'HR Pemateri Pelatihan Desain Grafis untuk Usaha Percetakan',2400000,2400000,'0'),
(27,23,'HR Pemateri Pelatihan Desain Grafis untuk Usaha Percetakan',2400000,2400000,'0'),
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
(115,49,'Pembayaran untuk perbaikan penggantian alat paris di RSM Lamongan',26122920,26122920,'sudah ditransfer tgl 23 Jan 2019'),
(116,49,'Pembayaran untuk pekerjaan Grounding  di RSM Lamongan',12430000,12430000,'sudah ditransfer tgl 23 Jan 2019'),
(117,50,'Pembayaran untuk perbaikan penggantian alat paris di RSM Lamongan',26122920,26122920,'sudah ditransfer tgl 23 Jan 2019'),
(118,50,'Pembayaran untuk pekerjaan Grounding  di RSM Lamongan',12430000,12430000,'sudah ditransfer tgl 23 Jan 2019'),
(119,51,'Pembayaran untuk perbaikan penggantian alat paris di RSM Lamongan',26122920,26122920,'sudah ditransfer tgl 23 Jan 2019'),
(120,51,'Pembayaran untuk pekerjaan Grounding  di RSM Lamongan',12430000,12430000,'sudah ditransfer tgl 23 Jan 2019'),
(121,40,'Pengiriman Dokumen MOU PT Anabatic Digital',0,15500,''),
(122,52,'Pembayaran untuk perbaikan penggantian alat paris di RSM Lamongan',26122920,26122920,'sudah ditransfer tgl 23 Jan 2019'),
(123,52,'Pembayaran untuk pekerjaan Grounding  di RSM Lamongan',12430000,12430000,'sudah ditransfer tgl 23 Jan 2019'),
(124,53,'Pembayaran untuk perbaikan penggantian alat paris di RSM Lamongan',26122920,26122920,'sudah ditransfer tgl 23 Jan 2019'),
(125,53,'Pembayaran untuk pekerjaan Grounding  di RSM Lamongan',12430000,12430000,'sudah ditransfer tgl 23 Jan 2019'),
(126,54,'Pembayaran untuk perbaikan penggantian alat paris di RSM Lamongan',26122920,26122920,'sudah ditransfer tgl 23 Jan 2019'),
(127,54,'Pembayaran untuk pekerjaan Grounding  di RSM Lamongan',12430000,12430000,'sudah ditransfer tgl 23 Jan 2019'),
(128,55,'Pembayaran untuk perbaikan penggantian alat paris di RSM Lamongan',26122920,26122920,'sudah ditransfer tgl 23 Jan 2019'),
(129,55,'Pembayaran untuk pekerjaan Grounding  di RSM Lamongan',12430000,12430000,'sudah ditransfer tgl 23 Jan 2019'),
(130,56,'Pembayaran untuk perbaikan penggantian alat paris di RSM Lamongan',26122920,26122920,'sudah ditransfer tgl 23 Jan 2019'),
(131,56,'Pembayaran untuk pekerjaan Grounding  di RSM Lamongan',12430000,12430000,'sudah ditransfer tgl 23 Jan 2019'),
(132,32,'Biaya BBM Kanit SSI bulan Maret 2019',0,200000,'Transfer BCA # 6720 4178 29 a.n Jimmy'),
(133,31,'Biaya BBM Kepala Pusat PKS bulan Maret 2019',0,400000,''),
(135,10,'Transportasi BBM Kabag PKS bulan Desember 2018',0,400000,'Transfer  BCA # 8220128599 a.n. Tan Amelia'),
(136,57,'Pembayaran untuk perbaikan penggantian alat paris di RSM Lamongan',26122920,26122920,'sudah ditransfer tgl 23 Jan 2019'),
(137,57,'Pembayaran untuk pekerjaan Grounding  di RSM Lamongan',12430000,12430000,'sudah ditransfer tgl 23 Jan 2019');

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `detail_permintaan_anggaran` */

insert  into `detail_permintaan_anggaran`(`id_detail_permintaan`,`id_permintaan`,`uraian`,`nominal`,`keterangan`) values 
(17,11,'HR Pemateri Pelatihan Desain Grafis untuk Usaha Percetakan',2400000,'Pelatihan dilaksanakan mulai 13 Desember 2018 - 23 Januari 2019'),
(18,12,'Pembayaran untuk perbaikan penggantian alat paris di RSM Lamongan',12430000,'Kwitansi no: K/10104/WL/XII/2018'),
(19,12,'Pembayaran untuk pekerjaan Grounding  di RSM Lamongan',26122920,'Kwitansi no: K/10106/WL/XII/2018');

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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

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
(36,'DRMGLF','Darmo Golf',1,'A');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `pemegang_jabatan` */

insert  into `pemegang_jabatan`(`id_pj`,`id_bagian`,`nama`,`jabatan`) values 
(1,1,'Lulut Fitriyaningrum, S.Kom.','Admin'),
(2,1,'Tan Amelia, S.Kom., M.MT., MCP','Kepala Pusat'),
(3,1,'Jimmy, S.Kom.','Kepala Unit SSI'),
(4,1,'Lilis Binawati, S.E., M.Ak','Wakil Rektor Bidang Sumber Daya '),
(5,1,'Prof. Dr. Budi Jatmiko, M.Pd','Rektor'),
(6,1,'Pantjawati Sudarmaningtyas, S.Kom., M.Eng','Wakil Rektor Bidang Akademik');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `permintaan_anggaran` */

insert  into `permintaan_anggaran`(`id_permintaan`,`no_anggaran`,`id_bagian`,`id_unit_kerja`,`id_kategori`,`id_anggaran`,`tanggal`,`tanggal_kebutuhan`,`catatan`,`total`,`status_realisasi`) values 
(11,'1/PS-UMUM/I/2019',1,2,1,6,'2019-01-30','2019-02-05','Tunai',2400000,'W'),
(12,'2/SSI-RSMLMG/I/2019',1,1,23,4,'2019-01-17','2019-01-22','Transfer ke BCA KCP Rungkut Megah Surabaya #6730 660 888 a.n PT. Matahri Aneka MKM',38552920,'W');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
