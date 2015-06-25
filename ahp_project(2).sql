-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 25, 2015 at 06:07 PM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.6.10-1+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ahp_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_warga_miskin`
--

CREATE TABLE IF NOT EXISTS `data_warga_miskin` (
  `id_warga` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kk` varchar(30) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `nik_kk` varchar(20) NOT NULL,
  `no_kk` varchar(20) NOT NULL,
  `rw` varchar(3) NOT NULL,
  `id_user` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_warga`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_warga_miskin`
--

CREATE TABLE IF NOT EXISTS `detail_warga_miskin` (
  `id_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_warga` int(11) NOT NULL,
  `kriteria` int(11) NOT NULL,
  `value` int(2) NOT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_seleksi`
--

CREATE TABLE IF NOT EXISTS `hasil_seleksi` (
  `id_hasil` int(11) NOT NULL AUTO_INCREMENT,
  `id_warga` int(11) NOT NULL,
  `jml_beras_warga` int(2) NOT NULL,
  `bulan` varchar(2) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `tgl_pembagian` date NOT NULL,
  `status_pembagian` int(1) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_hasil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
  `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `score` int(2) NOT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama`, `score`) VALUES
(2, 'Luas lantai bangunan tempat tinggal kurang dari 8m2 perorang', 5),
(3, 'Jenis lantai tempat tinggal terbuat dari tanah / bambu  / kayu murahan', 7),
(4, 'Jenis dinding tempat tinggal terbuat dari tanah / rumbai / kayu berkualitas rendah / tembok tanpa diplester', 8),
(5, 'Tidak memiliki fasilitas buang air besar / bersama – sama dengan rumah tangga lain', 4),
(6, 'Sumber penerangan rumah tangga tidak menggunakan listrik ', 7),
(7, 'Sumber air minum berasal dari sumur / mata air tidak terlindung / sungai / air hujan', 8),
(8, 'Bahan bakar untuk memasak sehari – hari adalah kayu bakar / arang / minyak tanah', 9),
(9, 'Hanya mengkonsumsi daging / susu/ ayam satu kali dalam seminggu', 7),
(10, 'Hanya membeli satu stel pakaian baru dalam setahun', 5),
(11, 'Hanya sanggup makan sebanyak satu / dua kali dalam sehari', 7),
(12, 'Tidak sanggup membayar biaya pengobatan di puskesmas / poliklinik', 4),
(13, 'Sumber penghasilan kepala rumah tangga adalah : Petani dengan luas lahan 500 m2, buruh tani, nelayan, buruh bangunan, buruh perkebunan atau pekerjaan lainnya dengan pendapatan dibawah Rp.600.000,- perbulan', 10),
(14, 'Pendidikan tertinggi kepala rumah tangga : tidak sekolah / tidak tamat SD / hanya SD', 4),
(15, 'Tidak memiliki tabungan / barang yang mudah dijual dengan minimal Rp.500.000,- seperti sepeda motor kredit / non kredit, emas, ternak, kapal motor, atau barang modal lainnya.', 9);

-- --------------------------------------------------------

--
-- Table structure for table `stok_beras`
--

CREATE TABLE IF NOT EXISTS `stok_beras` (
  `id_stok_beras` int(11) NOT NULL AUTO_INCREMENT,
  `bulan` varchar(2) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `jml_stock` double NOT NULL,
  `tambahan_stock` int(5) NOT NULL,
  `stock_terpakai` int(5) NOT NULL,
  PRIMARY KEY (`id_stok_beras`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(70) NOT NULL,
  `level` enum('admin','staff_kelurahan','rw') NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `status`) VALUES
(1, 'ratna', '38753adc9fa129fd3626592006c4e8ce', 'staff_kelurahan', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
