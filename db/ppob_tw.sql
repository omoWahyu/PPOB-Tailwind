-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for ppob_tw
CREATE DATABASE IF NOT EXISTS `ppob_tw` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ppob_tw`;

-- Dumping structure for table ppob_tw.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `id_level` int(11) NOT NULL,
  PRIMARY KEY (`id_admin`),
  KEY `id_level` (`id_level`),
  CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table ppob_tw.admin: ~1 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_admin`, `id_level`) VALUES
	(2, 'admin', 'gaYVtWOEm1Uu6', 'Wahyu', 1),
	(3, 'yuu27q', 'gaYVtWOEm1Uu6', 'yuu27q', 1);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table ppob_tw.level
CREATE TABLE IF NOT EXISTS `level` (
  `id_level` int(11) NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(10) NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table ppob_tw.level: ~3 rows (approximately)
/*!40000 ALTER TABLE `level` DISABLE KEYS */;
INSERT INTO `level` (`id_level`, `nama_level`) VALUES
	(1, 'Admin'),
	(2, 'Pimpinan'),
	(4, 'Lapangan');
/*!40000 ALTER TABLE `level` ENABLE KEYS */;

-- Dumping structure for table ppob_tw.pelanggan
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nomor_kwh` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `id_tarif` int(11) NOT NULL,
  PRIMARY KEY (`id_pelanggan`),
  KEY `id_tarif` (`id_tarif`),
  CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`id_tarif`) REFERENCES `tarif` (`id_tarif`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table ppob_tw.pelanggan: ~7 rows (approximately)
/*!40000 ALTER TABLE `pelanggan` DISABLE KEYS */;
INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `password`, `nomor_kwh`, `nama_pelanggan`, `alamat`, `id_tarif`) VALUES
	(1, 'pel1', 'pel1', '12345678', 'pelanggan1', 'Jalan Danau Bratan VI', 1),
	(2, 'pelanggan', 'ga2QFjzuQp532', '11134890', 'Kurniadi1', 'Jalan Danau Ranau G6B/2', 1),
	(7, 'tester', 'gaffmFbM2w1.w', '123300000', 'tester', 'Jalan Danau CI js', 3),
	(8, 'tester2', 'gaQgqhpYUTjYA', '223099000', 'tester2', 'Jalan Danau reactjs 21 ', 4),
	(9, 'tester3', 'gaiVK90HDSxFE', '3322200011', 'tester3', 'Jalan Danau 1234', 3),
	(10, 'yuu27q', 'ga9m0HxmcfCPM', '100', 'wahyu', 'tes', 1),
	(11, 'yuu', 'ga9m0HxmcfCPM', '1200', 'Wahyudi Chrisdianto', 'ditempat', 1);
/*!40000 ALTER TABLE `pelanggan` ENABLE KEYS */;

-- Dumping structure for table ppob_tw.pembayaran
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_tagihan` int(11) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `bulan_bayar` varchar(20) NOT NULL,
  `biaya_admin` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `bukti` varchar(100) NOT NULL,
  `id_admin` int(11) NOT NULL,
  PRIMARY KEY (`id_pembayaran`),
  KEY `id_tagihan` (`id_tagihan`),
  KEY `id_admin` (`id_admin`),
  CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_tagihan`) REFERENCES `tagihan` (`id_tagihan`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table ppob_tw.pembayaran: ~9 rows (approximately)
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
INSERT INTO `pembayaran` (`id_pembayaran`, `id_tagihan`, `tanggal_pembayaran`, `bulan_bayar`, `biaya_admin`, `total_bayar`, `status`, `bukti`, `id_admin`) VALUES
	(1, 7, '2022-01-23', 'Januari 2022', 2500, 177000, 'Belum Dikonfirmasi', '11.JPG', 2),
	(2, 6, '2022-01-23', 'Januari 2022', 2500, 134750, 'Belum Dikonfirmasi', 'login-bg.jpg', 2),
	(3, 11, '2022-01-23', 'Januari 2022', 2500, 21700, 'Belum Dikonfirmasi', 'login-bg1.jpg', 2),
	(5, 9, '2022-01-23', 'Januari 2022', 2500, 242500, 'Belum Dikonfirmasi', 'profile-bg.png', 2),
	(6, 8, '2022-01-23', 'Januari 2022', 2500, 57700, 'Belum Dikonfirmasi', 'user1.png', 2),
	(7, 5, '2022-01-23', 'Januari 2022', 2500, 52500, 'Belum Dikonfirmasi', '2.JPG', 0),
	(8, 13, '2022-01-23', 'Januari 2022', 2500, 14500, 'Lunas', 'Capture.JPG', 2),
	(9, 14, '2022-01-24', 'Januari 2022', 2500, 202500, 'Belum Dikonfirmasi', '13.JPG', 2),
	(10, 12, '2022-01-24', 'Januari 2022', 2500, 70500, 'Pembayaran Ditolak', 'Tagihan_User.JPG', 2);
/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;

-- Dumping structure for table ppob_tw.penggunaan
CREATE TABLE IF NOT EXISTS `penggunaan` (
  `id_penggunaan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(11) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` varchar(20) NOT NULL,
  `meter_awal` float NOT NULL,
  `meter_akhir` float NOT NULL,
  PRIMARY KEY (`id_penggunaan`),
  KEY `id_pelanggan` (`id_pelanggan`),
  CONSTRAINT `penggunaan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Dumping data for table ppob_tw.penggunaan: ~17 rows (approximately)
/*!40000 ALTER TABLE `penggunaan` DISABLE KEYS */;
INSERT INTO `penggunaan` (`id_penggunaan`, `id_pelanggan`, `bulan`, `tahun`, `meter_awal`, `meter_akhir`) VALUES
	(1, 1, 'Januari', '2022', 120, 200),
	(3, 1, 'Februari', '2022', 50, 210),
	(4, 1, 'Januari', '2022', 500, 1000),
	(5, 1, 'Januari', '2022', 30, 650),
	(6, 7, 'Januari', '2022', 600, 650),
	(7, 7, 'Februari', '2022', 188, 457),
	(8, 7, 'Januari', '2022', 400, 650),
	(9, 8, 'Januari', '2022', 54, 100),
	(10, 8, 'Februari', '2022', 50, 250),
	(11, 8, 'Januari', '2022', 123, 456),
	(12, 8, 'Januari', '2022', 56, 72),
	(13, 7, 'Januari', '2022', 32, 100),
	(14, 2, 'Januari', '2022', 300, 320),
	(15, 9, 'Januari', '2022', 800, 900),
	(17, 1, 'Januari', '2022', 4000, 3000),
	(19, 1, 'Januari', '2022', 40, 21),
	(20, 1, 'Februari', '2020', 12, 1),
	(21, 11, 'Februari', '2025', 1000, 1200);
/*!40000 ALTER TABLE `penggunaan` ENABLE KEYS */;

-- Dumping structure for table ppob_tw.tagihan
CREATE TABLE IF NOT EXISTS `tagihan` (
  `id_tagihan` int(11) NOT NULL AUTO_INCREMENT,
  `id_penggunaan` int(11) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` varchar(20) NOT NULL,
  `jumlah_meter` float NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tagihan`),
  KEY `id_penggunaan` (`id_penggunaan`),
  CONSTRAINT `tagihan_ibfk_1` FOREIGN KEY (`id_penggunaan`) REFERENCES `penggunaan` (`id_penggunaan`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table ppob_tw.tagihan: ~13 rows (approximately)
/*!40000 ALTER TABLE `tagihan` DISABLE KEYS */;
INSERT INTO `tagihan` (`id_tagihan`, `id_penggunaan`, `bulan`, `tahun`, `jumlah_meter`, `status`) VALUES
	(2, 3, 'Februari', '2025', 160, 'Belum Dibayar'),
	(3, 4, 'Maret', '2025', 500, 'Belum Dibayar'),
	(4, 5, 'Februari', '2025', 620, 'Belum Dibayar'),
	(5, 6, 'Januari', '2025', 50, 'Belum Dikonfirmasi'),
	(6, 7, 'Februari', '2022', 269, 'Lunas'),
	(7, 8, 'Februari', '2023', 100, 'Belum Dikonfirmasi'),
	(8, 9, 'Februari', '2022', 46, 'Lunas'),
	(9, 10, 'Februari', '2022', 200, 'Pembayaran Ditolak '),
	(11, 12, 'Februari', '2022', 16, 'Lunas'),
	(12, 13, 'Februari', '2022', 68, 'Bukti Ditolak Silahkan Upload Lagi'),
	(13, 14, 'Februari', '2022', 20, 'Lunas'),
	(14, 15, 'Februari', '2022', 200, 'Lunas'),
	(16, 17, 'Februari', '2025', 1000, 'Belum Dibayar'),
	(17, 21, 'Februari', '2025', -200, 'Belum Dibayar');
/*!40000 ALTER TABLE `tagihan` ENABLE KEYS */;

-- Dumping structure for table ppob_tw.tarif
CREATE TABLE IF NOT EXISTS `tarif` (
  `id_tarif` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tarif` varchar(20) NOT NULL,
  `daya` varchar(10) NOT NULL,
  `terperkwh` float NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tarif`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table ppob_tw.tarif: ~5 rows (approximately)
/*!40000 ALTER TABLE `tarif` DISABLE KEYS */;
INSERT INTO `tarif` (`id_tarif`, `nama_tarif`, `daya`, `terperkwh`, `status`) VALUES
	(1, 'TRF001', '1000', 600, 'Aktif'),
	(2, 'TRF002', '2000', 800, 'Aktif'),
	(3, 'TRF003', '3000', 1000, 'Aktif'),
	(4, 'TRF004', '4000', 1200, 'Aktif'),
	(5, 'TRF005', '3000', 2500, 'Aktif');
/*!40000 ALTER TABLE `tarif` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
