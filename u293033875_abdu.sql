
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 17 Jun 2015 pada 10.46
-- Versi Server: 5.1.71
-- Versi PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `u293033875_abdu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `nid` int(200) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `idmk` int(200) NOT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1009 ;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nid`, `nama`, `alamat`, `idmk`) VALUES
(1001, 'Hardianto Wibowo', 'Probolinggo', 111),
(1002, 'Timbul Yuwono', 'Malang', 222),
(1003, 'Efendi Cahyono', 'Jember', 333),
(1004, 'Ervan Putra', 'Surabaya', 444),
(1005, 'Yulianto Eko', 'Surabaya', 555),
(1006, 'Afrinda Puspitasari', 'Surabaya', 666),
(1007, 'Budi sudarsono', 'Jakarta', 777),
(1008, 'Bambang pamungkas', 'Jakarta', 888);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosenmk`
--

CREATE TABLE IF NOT EXISTS `dosenmk` (
  `iddosenmk` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `idmk` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`iddosenmk`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `dosenmk`
--

INSERT INTO `dosenmk` (`iddosenmk`, `nid`, `idmk`) VALUES
(1, 1001, 111),
(2, 1003, 222),
(3, 1002, 333),
(4, 1004, 444),
(5, 1005, 555),
(6, 1006, 666),
(7, 1001, 777),
(8, 1002, 888);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `idkelas` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nim` int(10) unsigned NOT NULL DEFAULT '0',
  `idmk` int(10) unsigned NOT NULL DEFAULT '0',
  `kelas` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`idkelas`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL DEFAULT '',
  `password` varchar(45) NOT NULL DEFAULT '',
  `kategori` varchar(45) NOT NULL DEFAULT '',
  `nama` varchar(45) NOT NULL DEFAULT '',
  `alamat` varchar(45) NOT NULL DEFAULT '',
  `hp` varchar(45) NOT NULL DEFAULT '',
  `tgl` date NOT NULL DEFAULT '0000-00-00',
  `kelamin` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `kategori`, `nama`, `alamat`, `hp`, `tgl`, `kelamin`) VALUES
(7, 'mahasiswa', '5787be38ee03a9ae5360f54d9026465f', '3', 'Adnan Januzaj', 'Belgium', '0898881234', '2015-06-12', 'Laki-laki'),
(6, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', 'Abdoe Rahman Sadiq', 'Semeru', '08980460004', '1994-05-27', 'Laki-laki'),
(5, 'creazy', 'e00b29d5b34c3f78df09d45921c9ec47', '1', 'admin', 'jember', '0876543234', '2015-06-11', 'Laki-laki'),
(9, 'hardianto', '2f48b07c128521f5426ff99981afe01f', '2', 'Hardianto Wibowo', 'Probolinggo', '0858591231', '2004-02-18', 'Laki-laki'),
(14, 'ervan', 'd50346b92e6564381ec829f3daaadf3c', '2', 'ervan putra', 'jember', '087123144444', '2015-06-01', 'Laki-laki'),
(11, 'efendi', 'd09c7b7c72046ad43f3bacd7d4f54268', '2', 'Efendi Cahyono', 'Kaliurang', '0871313141', '2015-06-03', 'Laki-laki'),
(12, 'slamet', 'c5a42d9667c760e1b7c064e25536e570', '3', 'slamet', 'jember', '098771734123', '2015-06-10', 'Laki-laki'),
(13, 'ratna', '38753adc9fa129fd3626592006c4e8ce', '3', 'ratna', 'malang', '08977135151', '2015-06-12', 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkul`
--

CREATE TABLE IF NOT EXISTS `matkul` (
  `idmk` int(20) NOT NULL AUTO_INCREMENT,
  `namamk` varchar(100) NOT NULL,
  PRIMARY KEY (`idmk`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=778 ;

--
-- Dumping data untuk tabel `matkul`
--

INSERT INTO `matkul` (`idmk`, `namamk`) VALUES
(111, 'Pemrograman Web'),
(222, 'Pemrograman Berorientasi Objek'),
(333, 'Metode Numerik'),
(444, 'Kalkulus'),
(555, 'Jaringan Komputer'),
(666, 'Sistem Informasi'),
(777, 'Rekayasa Perangkat Lunak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mhs`
--

CREATE TABLE IF NOT EXISTS `mhs` (
  `nim` int(100) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=151 ;

--
-- Dumping data untuk tabel `mhs`
--

INSERT INTO `mhs` (`nim`, `nama`, `alamat`) VALUES
(101, 'Abdoe Rahman Sadiq', 'Jember'),
(102, 'Adi Firansyah', 'Jakarta'),
(103, 'Aditya Frimansyah', 'Jember'),
(104, 'Aditya Herpavi Rachman', 'Jakarta'),
(105, 'Aditya Rino', 'Jakarta'),
(106, 'Aditya Suryo Saputro', 'Jember'),
(107, 'Aditya Wariman', 'Jakarta'),
(108, 'Adjie Massaid', 'Jakarta'),
(109, 'Adjie Pangestu', 'Jember'),
(110, 'Adrian Maulana', 'Surabaya'),
(111, 'Advent Bangun', 'Jakarta'),
(112, 'Adul', 'Jember'),
(113, 'Aedy Moward', 'Surabaya'),
(114, 'Afdhal', 'Surabaya'),
(115, 'Afgan Syahreza', 'Surabaya'),
(116, 'Aira Sondang', 'Jakarta'),
(117, 'Al Ghazalie', 'Jakarta'),
(118, 'Albert Einstein', 'Jakarta'),
(119, 'Alam Surawidjaja', 'Jakarta'),
(120, 'Aldo Tansani', 'Surabaya'),
(121, 'Attar Syah', 'Surabaya'),
(122, 'Atalarik Syah', 'Jakarta'),
(123, 'Ahmad Dhani', 'Surabaya'),
(124, 'Aziz Gagap', 'Surabaya'),
(125, 'Ateng', 'Jember'),
(126, 'Aswin Fabanyo', 'Surabaya'),
(127, 'Baim Wong', 'Surabaya'),
(128, 'Bagus Santoso', 'Surabaya'),
(129, 'Barry Prima', 'Jember'),
(130, 'Bastian Steel', 'Jakarta'),
(131, 'Bing Slamet', 'Jakarta'),
(132, 'Billy Davidson', 'Jakarta'),
(133, 'Bolot', 'Jakarta'),
(134, 'Boy Idrus', 'Jember'),
(135, 'Boy Hamzah', 'Jakarta'),
(136, 'Nikita Willy', 'Jakarta'),
(137, 'Acha Septriasa', 'Jakarta'),
(138, 'Nabila Ayu Ratna', 'Surabaya'),
(139, 'Agnes Monica', 'Surabaya'),
(140, 'Mikha Tembayong', 'Jakarta'),
(141, 'Aida Nurmala', 'Jember'),
(142, 'Ajeng kartika', 'Jakarta'),
(143, 'Afifa Syahira', 'Jakarta'),
(144, 'Adila Fitri', 'Jember'),
(145, 'Chelsea Olivia', 'Jakarta'),
(146, 'Cinta Laura', 'Jember'),
(147, 'Clara Sinta', 'Jember'),
(148, 'Pevita Pearce', 'Jember'),
(149, 'Coralie Sutedja', 'Jember'),
(150, 'Chintya Ramlan', 'Surabaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi`
--

CREATE TABLE IF NOT EXISTS `presensi` (
  `idpresensi` int(200) NOT NULL AUTO_INCREMENT,
  `nim` int(200) NOT NULL,
  `idmk` int(200) NOT NULL DEFAULT '0',
  `tgl` date NOT NULL DEFAULT '0000-00-00',
  `status` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`idpresensi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data untuk tabel `presensi`
--

INSERT INTO `presensi` (`idpresensi`, `nim`, `idmk`, `tgl`, `status`) VALUES
(1, 102, 222, '2015-06-05', 'Hadir'),
(2, 102, 111, '2015-06-05', 'Hadir'),
(3, 103, 111, '2015-06-05', 'Sakit'),
(4, 101, 333, '2015-06-05', 'Hadir'),
(5, 123, 444, '2015-06-10', 'Izin'),
(6, 113, 222, '2015-06-11', 'Hadir'),
(7, 117, 222, '2015-06-11', 'Hadir'),
(8, 118, 222, '2015-06-11', 'Hadir'),
(9, 119, 222, '2015-06-11', 'Izin'),
(10, 108, 777, '2015-06-11', 'Hadir'),
(11, 104, 333, '2015-06-11', 'Sakit'),
(12, 104, 333, '2015-06-11', 'Sakit'),
(13, 104, 333, '2015-06-11', 'Sakit'),
(14, 116, 777, '2015-06-11', 'Izin'),
(15, 102, 222, '2015-06-11', 'Sakit'),
(16, 141, 222, '2015-06-11', 'Sakit'),
(17, 145, 333, '2015-06-11', 'Sakit'),
(18, 107, 444, '2015-06-12', 'Hadir'),
(19, 108, 444, '2015-06-12', 'Sakit');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
