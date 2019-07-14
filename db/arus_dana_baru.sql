/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.3.15-MariaDB : Database - arus_dana
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
  PRIMARY KEY (`id_anggaran`),
  KEY `fk_reference_4` (`id_bagian`),
  CONSTRAINT `anggaran_ibfk_1` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id_bagian`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `anggaran` */

insert  into `anggaran`(`id_anggaran`,`kode_anggaran`,`nama_anggaran`,`id_bagian`,`status`) values 
(1,'A1','AAA',1,'A'),
(2,'A2','AAAAA',1,'A');

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
  PRIMARY KEY (`id_arus_dana`),
  KEY `fk_reference_11` (`id_permintaan`),
  KEY `fk_reference_12` (`id_unit_kerja`),
  KEY `fk_reference_13` (`id_kategori`),
  KEY `fk_reference_14` (`id_anggaran`),
  CONSTRAINT `arus_dana_ibfk_1` FOREIGN KEY (`id_permintaan`) REFERENCES `permintaan_anggaran` (`id_permintaan`),
  CONSTRAINT `arus_dana_ibfk_2` FOREIGN KEY (`id_unit_kerja`) REFERENCES `unit_kerja` (`id_unit_kerja`),
  CONSTRAINT `arus_dana_ibfk_3` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  CONSTRAINT `arus_dana_ibfk_4` FOREIGN KEY (`id_anggaran`) REFERENCES `anggaran` (`id_anggaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `arus_dana` */

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detail_arus_dana` */

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `detail_permintaan_anggaran` */

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`id_kategori`,`kode_kategori`,`nama_kategori`,`id_bagian`,`status`) values 
(1,'UMUM','UMUM',1,'A'),
(2,'SINLUI','SINLUI',1,'A');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pemegang_jabatan` */

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `permintaan_anggaran` */

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tanda_tangan` */

insert  into `tanda_tangan`(`id_ttd`,`id_bagian`,`dokumen`,`dibuat`,`jabatan_pembuat`,`diperiksa`,`jabatan_pemeriksa`,`diketahui`,`jabatan_yg_mengetahui`,`disetujui`,`jabatan_penyetuju`) values 
(1,1,'permintaan','Lulut Fitriyaningrum, S,Kom','Admin','Tan Amelia, S.Kom., M.MT., MCP','Kepala Pusat','Lilis Binawati, S.E., M.Ak','Wakil Rektor Bidang Sumber Daya','Prof. Dr. Budi Jatmiko, M.Pd','Rektor');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `unit_kerja` */

insert  into `unit_kerja`(`id_unit_kerja`,`id_bagian`,`nama_unit_kerja`,`status`,`kode_unit_kerja`) values 
(1,1,'Solusi Sistem Informasi','A','SSI');

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

/*!50003 CREATE FUNCTION `generate_no_anggaran`(p_tanggal DATE, p_id_unit INT, p_id_kategori INT) RETURNS varchar(50) CHARSET latin1
BEGIN
	DECLARE v_kode_unit varchar(50);
	DECLARE v_kode_kategori varchar(50);
	declare v_bulan_romawi varchar(5);
	declare v_no_anggaran varchar(100);
	declare v_urutan int;
	
	select (IFNULL(CAST(MAX(SUBSTR(no_anggaran,1,1)) AS UNSIGNED),0)+1) into v_urutan 
	from permintaan_anggaran where date_format(tanggal,'%Y-%m') = date_format(p_tanggal,'%Y-%m');
	
	select kode_unit_kerja into v_kode_unit from unit_kerja where id_unit_kerja = p_id_unit;
	SELECT kode_kategori INTO v_kode_kategori FROM kategori WHERE id_kategori = p_id_kategori;
	
	set v_bulan_romawi = to_roman(date_format(p_tanggal,'%c'));
	
	set v_no_anggaran = concat(v_urutan,'/',v_kode_unit,'-',v_kode_kategori,'/',v_bulan_romawi,'/',date_format(p_tanggal,'%Y'));
	
	return v_no_anggaran;
	
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
