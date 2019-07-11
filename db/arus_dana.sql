-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 11 Jul 2019 pada 11.35
-- Versi Server: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arus_dana`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(10) unsigned NOT NULL,
  `nama_admin` varchar(100) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password_admin` varchar(100) DEFAULT NULL,
  `level_admin` varchar(5) DEFAULT NULL COMMENT 'ADM, MNG,ADR',
  `status_admin` varchar(2) DEFAULT 'A'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password_admin`, `level_admin`, `status_admin`) VALUES
(1, 'Super Administrator', 'superadmin', '$2y$10$K5KdI2pCnak7ZrHPHC62COqSgujp22tkXiBaCwQ5uSG.kX9.pjSB6', 'ADR', 'A'),
(2, 'Admin Biasa', 'admin', '$2y$10$XzBxbRQQ5WTkJwPlcKRDRe7XiuMwwn7JIuWzH1Vprq6OyrvASa0Pe', 'ADM', 'A'),
(3, 'Manager', 'manager', '$2y$10$1Hcf8IaRaliRFiOHiFm/oeP3oeMCPu1V6RdUwTTXlt3u/DQOH9Kia', 'MNG', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggaran`
--

CREATE TABLE IF NOT EXISTS `anggaran` (
  `id_anggaran` int(11) NOT NULL,
  `kode_anggaran` varchar(255) DEFAULT NULL,
  `nama_anggaran` varchar(255) DEFAULT NULL,
  `id_bagian` int(11) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `arus_dana`
--

CREATE TABLE IF NOT EXISTS `arus_dana` (
  `id_arus_dana` int(11) NOT NULL,
  `no_arus_dana` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_permintaan` int(11) DEFAULT NULL,
  `id_unit_kerja` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_anggaran` int(11) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `bbm` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bagian`
--

CREATE TABLE IF NOT EXISTS `bagian` (
  `id_bagian` int(11) NOT NULL,
  `kode_bagian` varchar(20) DEFAULT NULL,
  `nama_bagian` varchar(255) DEFAULT NULL,
  `status_bagian` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bagian`
--

INSERT INTO `bagian` (`id_bagian`, `kode_bagian`, `nama_bagian`, `status_bagian`) VALUES
(1, 'PKS', 'Pusat Kerja Samaas', 'A'),
(2, 'DSI', 'D3 Sistem Informasii', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_arus_dana`
--

CREATE TABLE IF NOT EXISTS `detail_arus_dana` (
  `id_detail_arus` int(11) NOT NULL,
  `id_arus_dana` int(11) DEFAULT NULL,
  `uraian` varchar(255) DEFAULT NULL,
  `penerimaan` int(11) DEFAULT NULL,
  `pengeluaran` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_permintaan_anggaran`
--

CREATE TABLE IF NOT EXISTS `detail_permintaan_anggaran` (
  `id_detail_permintaan` int(11) NOT NULL,
  `id_permintaan` int(11) DEFAULT NULL,
  `uraian` varchar(255) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kode_kategori` varchar(255) DEFAULT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL,
  `id_bagian` int(11) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kode_kategori`, `nama_kategori`, `id_bagian`, `status`) VALUES
(1, 'UMUM', 'UMUM', 1, 'A'),
(2, 'SINLUI', 'SINLUI', 1, 'A'),
(3, 'PEMKOT', 'PEMKOT', NULL, 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemegang_jabatan`
--

CREATE TABLE IF NOT EXISTS `pemegang_jabatan` (
  `id_pj` int(11) NOT NULL,
  `id_bagian` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan_anggaran`
--

CREATE TABLE IF NOT EXISTS `permintaan_anggaran` (
  `id_permintaan` int(11) NOT NULL,
  `no_anggaran` varchar(255) DEFAULT NULL,
  `id_bagian` int(11) DEFAULT NULL,
  `id_unit_kerja` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_anggaran` int(11) DEFAULT NULL,
  `tanggal_kebutuhan` date DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status_realisasi` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanda_tangan`
--

CREATE TABLE IF NOT EXISTS `tanda_tangan` (
  `id_ttd` int(11) NOT NULL,
  `id_bagian` int(11) DEFAULT NULL,
  `dokumen` varchar(10) DEFAULT NULL,
  `dibuat` varchar(255) DEFAULT NULL,
  `jabatan_pembuat` varchar(255) DEFAULT NULL,
  `diperiksa` varchar(255) DEFAULT NULL,
  `jabatan_pemeriksa` varchar(255) DEFAULT NULL,
  `diketahui` varchar(255) DEFAULT NULL,
  `jabatan_yg_mengetahui` varchar(255) DEFAULT NULL,
  `disetujui` varchar(255) DEFAULT NULL,
  `jabatan_penyetuju` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit_kerja`
--

CREATE TABLE IF NOT EXISTS `unit_kerja` (
  `id_unit_kerja` int(11) NOT NULL,
  `id_bagian` int(11) DEFAULT NULL,
  `nama_unit_kerja` varchar(255) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `kode_unit_kerja` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `unit_kerja`
--

INSERT INTO `unit_kerja` (`id_unit_kerja`, `id_bagian`, `nama_unit_kerja`, `status`, `kode_unit_kerja`) VALUES
(1, 1, 'Solusi Sistem Informasidd', 'A', 'SSI'),
(2, 1, 'Pelatihan dan Sertifikasi', 'A', 'PS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `password_admin` varchar(255) DEFAULT NULL,
  `id_bagian` int(11) DEFAULT NULL,
  `level_admin` varchar(100) NOT NULL,
  `status_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `nama_admin`, `password_admin`, `id_bagian`, `level_admin`, `status_admin`) VALUES
(1, 'superadmin', 'Super Administrator', '$2y$10$K5KdI2pCnak7ZrHPHC62COqSgujp22tkXiBaCwQ5uSG.kX9.pjSB6', NULL, 'ADR', 'A'),
(2, 'lulut', 'Lulut Fitr', '$2y$10$XfZDYKf9aHOZSrwdXGsxd.3S3B1n9BcyofkHw9L0C8YxrEufyAR3C', 1, 'ADM', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `anggaran`
--
ALTER TABLE `anggaran`
  ADD PRIMARY KEY (`id_anggaran`),
  ADD KEY `fk_reference_4` (`id_bagian`);

--
-- Indexes for table `arus_dana`
--
ALTER TABLE `arus_dana`
  ADD PRIMARY KEY (`id_arus_dana`),
  ADD KEY `fk_reference_11` (`id_permintaan`),
  ADD KEY `fk_reference_12` (`id_unit_kerja`),
  ADD KEY `fk_reference_13` (`id_kategori`),
  ADD KEY `fk_reference_14` (`id_anggaran`);

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `detail_arus_dana`
--
ALTER TABLE `detail_arus_dana`
  ADD PRIMARY KEY (`id_detail_arus`),
  ADD KEY `fk_reference_15` (`id_arus_dana`);

--
-- Indexes for table `detail_permintaan_anggaran`
--
ALTER TABLE `detail_permintaan_anggaran`
  ADD PRIMARY KEY (`id_detail_permintaan`),
  ADD KEY `fk_reference_10` (`id_permintaan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `fk_reference_3` (`id_bagian`);

--
-- Indexes for table `pemegang_jabatan`
--
ALTER TABLE `pemegang_jabatan`
  ADD PRIMARY KEY (`id_pj`),
  ADD KEY `fk_reference_17` (`id_bagian`);

--
-- Indexes for table `permintaan_anggaran`
--
ALTER TABLE `permintaan_anggaran`
  ADD PRIMARY KEY (`id_permintaan`),
  ADD KEY `fk_reference_6` (`id_bagian`),
  ADD KEY `fk_reference_7` (`id_unit_kerja`),
  ADD KEY `fk_reference_8` (`id_kategori`),
  ADD KEY `fk_reference_9` (`id_anggaran`);

--
-- Indexes for table `tanda_tangan`
--
ALTER TABLE `tanda_tangan`
  ADD PRIMARY KEY (`id_ttd`),
  ADD KEY `fk_reference_16` (`id_bagian`);

--
-- Indexes for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD PRIMARY KEY (`id_unit_kerja`),
  ADD KEY `fk_reference_2` (`id_bagian`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_reference_1` (`id_bagian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `anggaran`
--
ALTER TABLE `anggaran`
  ADD CONSTRAINT `fk_reference_4` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id_bagian`);

--
-- Ketidakleluasaan untuk tabel `arus_dana`
--
ALTER TABLE `arus_dana`
  ADD CONSTRAINT `fk_reference_11` FOREIGN KEY (`id_permintaan`) REFERENCES `permintaan_anggaran` (`id_permintaan`),
  ADD CONSTRAINT `fk_reference_12` FOREIGN KEY (`id_unit_kerja`) REFERENCES `unit_kerja` (`id_unit_kerja`),
  ADD CONSTRAINT `fk_reference_13` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `fk_reference_14` FOREIGN KEY (`id_anggaran`) REFERENCES `anggaran` (`id_anggaran`);

--
-- Ketidakleluasaan untuk tabel `detail_arus_dana`
--
ALTER TABLE `detail_arus_dana`
  ADD CONSTRAINT `fk_reference_15` FOREIGN KEY (`id_arus_dana`) REFERENCES `arus_dana` (`id_arus_dana`);

--
-- Ketidakleluasaan untuk tabel `detail_permintaan_anggaran`
--
ALTER TABLE `detail_permintaan_anggaran`
  ADD CONSTRAINT `fk_reference_10` FOREIGN KEY (`id_permintaan`) REFERENCES `permintaan_anggaran` (`id_permintaan`);

--
-- Ketidakleluasaan untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD CONSTRAINT `fk_reference_3` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id_bagian`);

--
-- Ketidakleluasaan untuk tabel `pemegang_jabatan`
--
ALTER TABLE `pemegang_jabatan`
  ADD CONSTRAINT `fk_reference_17` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id_bagian`);

--
-- Ketidakleluasaan untuk tabel `permintaan_anggaran`
--
ALTER TABLE `permintaan_anggaran`
  ADD CONSTRAINT `fk_reference_6` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id_bagian`),
  ADD CONSTRAINT `fk_reference_7` FOREIGN KEY (`id_unit_kerja`) REFERENCES `unit_kerja` (`id_unit_kerja`),
  ADD CONSTRAINT `fk_reference_8` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `fk_reference_9` FOREIGN KEY (`id_anggaran`) REFERENCES `anggaran` (`id_anggaran`);

--
-- Ketidakleluasaan untuk tabel `tanda_tangan`
--
ALTER TABLE `tanda_tangan`
  ADD CONSTRAINT `fk_reference_16` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id_bagian`);

--
-- Ketidakleluasaan untuk tabel `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD CONSTRAINT `fk_reference_2` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id_bagian`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_reference_1` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id_bagian`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
