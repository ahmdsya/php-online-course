-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 17 Feb 2021 pada 15.44
-- Versi server: 5.7.26
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php-online-course`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `password`) VALUES
(2, 'Administrator', 'admin@test.com', 'password');

-- --------------------------------------------------------

--
-- Struktur dari tabel `enroll`
--

DROP TABLE IF EXISTS `enroll`;
CREATE TABLE IF NOT EXISTS `enroll` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kursus` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `enroll`
--

INSERT INTO `enroll` (`id`, `id_kursus`, `id_user`) VALUES
(1, 7, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(22, 'Web Development');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kursus`
--

DROP TABLE IF EXISTS `kursus`;
CREATE TABLE IF NOT EXISTS `kursus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `tingkat` varchar(225) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status` enum('0','1') DEFAULT '0',
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kursus`
--

INSERT INTO `kursus` (`id`, `judul`, `slug`, `deskripsi`, `kategori_id`, `tingkat`, `gambar`, `status`, `created_at`) VALUES
(7, 'Kelas Online UI Set Character Design', 'kelas-online-ui-set-character-design', '<p>Membuat set ilustrasi karakter unik dan dapat digunakan dalam Desain User Interface (UI) / tampilan antarmuka sebuah aplikasi atau website. Mulai dari proses ideation, membuat sketsa, mengubahnya menjadi vector, dan menjadikannya komponen yang variatif.</p>\r\n\r\n<p>Komponen tersebut selanjutnya akan disusun dalam Set Ilustrasi Karakter yang dapat digunakan dengan mudah dan praktis.</p>\r\n', 22, 'Semua Tingkat', '602010fb899fc.png', '1', '2021-02-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

DROP TABLE IF EXISTS `materi`;
CREATE TABLE IF NOT EXISTS `materi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kursus` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `durasi` int(11) NOT NULL,
  `is_view` enum('0','1') DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id`, `id_kursus`, `judul`, `video_url`, `durasi`, `is_view`) VALUES
(6, 7, 'Menemukan Mu - Seventen', 'https://www.youtube.com/watch?v=1dLbDhcxzeQ', 5, '0'),
(7, 7, 'Sumpah Ku Mencintaimu', 'https://www.youtube.com/watch?v=h3mAiYUQHUg', 3, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`) VALUES
(1, 'Ahmad Syarif', 'test@mail.com', 'password');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
