-- phpMyAdmin SQL Dump
-- version 2.11.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 10. Juli 2015 jam 16:01
-- Versi Server: 5.0.51
-- Versi PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_toko`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_barang`
--

CREATE TABLE IF NOT EXISTS `db_barang` (
  `id_brg` int(11) NOT NULL auto_increment,
  `plu` varchar(25) NOT NULL,
  `brand` varchar(25) NOT NULL,
  `article` varchar(40) NOT NULL,
  `harga` int(12) NOT NULL,
  PRIMARY KEY  (`id_brg`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data untuk tabel `db_barang`
--

INSERT INTO `db_barang` (`id_brg`, `plu`, `brand`, `article`, `harga`) VALUES
(21, '8998838110027', 'kenko', 'lem stick', 3400),
(22, '8998838110089', 'tango', 'wafer keju', 7600);

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_inv`
--

CREATE TABLE IF NOT EXISTS `db_inv` (
  `id_inv` int(11) NOT NULL auto_increment,
  `id_brg` int(11) NOT NULL,
  `jml_inv` int(11) NOT NULL,
  PRIMARY KEY  (`id_inv`),
  KEY `id_brg` (`id_brg`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data untuk tabel `db_inv`
--

INSERT INTO `db_inv` (`id_inv`, `id_brg`, `jml_inv`) VALUES
(22, 21, 1800),
(23, 22, 1385);

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_rec`
--

CREATE TABLE IF NOT EXISTS `db_rec` (
  `id_rec` int(11) NOT NULL auto_increment,
  `id_brg` int(11) NOT NULL,
  `jml_rec` int(11) NOT NULL,
  `tgl_rec` date NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY  (`id_rec`),
  KEY `id_brg` (`id_brg`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `db_rec`
--

INSERT INTO `db_rec` (`id_rec`, `id_brg`, `jml_rec`, `tgl_rec`, `total`) VALUES
(3, 22, 10, '2015-07-10', 76000),
(4, 21, 1, '2015-07-10', 3400);

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_sales`
--

CREATE TABLE IF NOT EXISTS `db_sales` (
  `id_sales` int(11) NOT NULL auto_increment,
  `id_brg` int(11) NOT NULL,
  `tgl_sales` date NOT NULL,
  `jml_sales` int(11) NOT NULL,
  `total` int(12) NOT NULL,
  PRIMARY KEY  (`id_sales`),
  KEY `id_brg` (`id_brg`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data untuk tabel `db_sales`
--

INSERT INTO `db_sales` (`id_sales`, `id_brg`, `tgl_sales`, `jml_sales`, `total`) VALUES
(19, 21, '2015-07-10', 10, 34000),
(20, 21, '2015-07-10', 23, 78200),
(21, 21, '2015-07-10', 56, 190400),
(22, 22, '2015-07-10', 36, 273600),
(23, 22, '2015-07-10', 5, 38000),
(24, 22, '2015-07-10', 56, 425600),
(25, 21, '2015-07-09', 10, 34000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE IF NOT EXISTS `tb_users` (
  `id` int(11) NOT NULL auto_increment,
  `usr_username` varchar(20) NOT NULL,
  `usr_password` varchar(60) NOT NULL,
  `usr_nama` varchar(50) NOT NULL,
  `usr_akses` enum('su','admin','user') NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id`, `usr_username`, `usr_password`, `usr_nama`, `usr_akses`) VALUES
(19, 'SuperUser', '0baea2f0ae20150db78f58cddac442a9', 'Tarikh Agustia', 'su'),
(20, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'deden priatna', 'admin');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `db_inv`
--
ALTER TABLE `db_inv`
  ADD CONSTRAINT `db_inv_ibfk_1` FOREIGN KEY (`id_brg`) REFERENCES `db_barang` (`id_brg`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `db_rec`
--
ALTER TABLE `db_rec`
  ADD CONSTRAINT `db_rec_ibfk_1` FOREIGN KEY (`id_brg`) REFERENCES `db_barang` (`id_brg`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `db_sales`
--
ALTER TABLE `db_sales`
  ADD CONSTRAINT `db_sales_ibfk_1` FOREIGN KEY (`id_brg`) REFERENCES `db_barang` (`id_brg`) ON DELETE CASCADE ON UPDATE CASCADE;
