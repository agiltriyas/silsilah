-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2019 at 10:57 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `penailmu`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_setCustomVal`(`sSeqName` VARCHAR(50), `sSeqGroup` VARCHAR(10), `nVal` INT UNSIGNED)
BEGIN
    IF (SELECT COUNT(*) FROM _sequence  
            WHERE seq_name = sSeqName  
                AND seq_group = sSeqGroup) = 0 THEN
        INSERT INTO _sequence (seq_name,seq_group,seq_val)
        VALUES (sSeqName,sSeqGroup,nVal);
    ELSE
        UPDATE _sequence SET seq_val = nVal
        WHERE seq_name = sSeqName AND seq_group = sSeqGroup;
    END IF;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `getNextCustomSeq`(`sSeqName` VARCHAR(50), `sSeqGroup` VARCHAR(10)) RETURNS varchar(20) CHARSET latin1
BEGIN
    DECLARE nLast_val INT; 
 
    SET nLast_val =  (SELECT seq_val
                          FROM _sequence
                          WHERE seq_name = sSeqName
                                AND seq_group = sSeqGroup);
    IF nLast_val IS NULL THEN
        SET nLast_val = 1;
        INSERT INTO _sequence (seq_name,seq_group,seq_val)
        VALUES (sSeqName,sSeqGroup,nLast_Val);
    ELSE
        SET nLast_val = nLast_val + 1;
        UPDATE _sequence SET seq_val = nLast_val
        WHERE seq_name = sSeqName AND seq_group = sSeqGroup;
    END IF; 
 
    SET @ret = (SELECT concat(sSeqGroup,lpad(nLast_val,4,'0')));
    RETURN @ret;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `access_menu`
--

CREATE TABLE IF NOT EXISTS `access_menu` (
`id` int(11) NOT NULL,
  `menu_id` int(2) NOT NULL,
  `level_id` int(2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `access_menu`
--

INSERT INTO `access_menu` (`id`, `menu_id`, `level_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 2, 2),
(4, 3, 1),
(8, 2, 3),
(13, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `daerah`
--

CREATE TABLE IF NOT EXISTS `daerah` (
`id` int(2) unsigned zerofill NOT NULL,
  `nama` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `daerah`
--

INSERT INTO `daerah` (`id`, `nama`) VALUES
(01, 'Pena Ilmu');

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE IF NOT EXISTS `desa` (
`id` int(2) unsigned zerofill NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`id`, `nama`) VALUES
(01, '00'),
(02, 'Rawamangun'),
(03, 'Pondok Bambu'),
(04, 'Perumnas'),
(05, 'Pondok Kelapa'),
(06, 'Lampiri'),
(07, 'Duren Sawit'),
(08, 'Jati Cempaka'),
(09, 'Penggilingan'),
(10, 'Jati Perhubungan'),
(11, 'Puri Idaman'),
(12, 'Pangkalan Jati');

-- --------------------------------------------------------

--
-- Table structure for table `extra_sub_menu`
--

CREATE TABLE IF NOT EXISTS `extra_sub_menu` (
`id` int(2) NOT NULL,
  `sub_menu_id` int(2) NOT NULL,
  `nama_extra` varchar(32) NOT NULL,
  `url` varchar(32) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `extra_sub_menu`
--

INSERT INTO `extra_sub_menu` (`id`, `sub_menu_id`, `nama_extra`, `url`, `is_active`) VALUES
(1, 8, 'Master Code', 'SuperAdmin/mastercode', 1),
(2, 8, 'Data Daerah', 'SuperAdmin/datadaerah', 1),
(3, 10, 'Generus', 'user/kegiatangen', 1),
(4, 10, 'Pengurus', 'admin/kegpeg', 1),
(6, 8, 'Level', 'SuperAdmin/level', 1);

-- --------------------------------------------------------

--
-- Table structure for table `generus`
--

CREATE TABLE IF NOT EXISTS `generus` (
`id` int(11) NOT NULL,
  `Id_gen` varchar(20) NOT NULL,
  `master_id` int(2) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `jk_id` int(1) NOT NULL,
  `tmpt_lahir` varchar(32) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nama_ayah` varchar(32) NOT NULL,
  `alamat` varchar(52) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `hobi` varchar(32) NOT NULL,
  `kegiatan` varchar(32) NOT NULL,
  `img` varchar(32) NOT NULL,
  `date_created` date NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=115 ;

--
-- Dumping data for table `generus`
--

INSERT INTO `generus` (`id`, `Id_gen`, `master_id`, `nama`, `jk_id`, `tmpt_lahir`, `tgl_lahir`, `nama_ayah`, `alamat`, `no_telp`, `hobi`, `kegiatan`, `img`, `date_created`, `is_active`) VALUES
(6, '20190001', 3, 'Hendri Budiman Suryadiningrat', 1, 'Jakarta', '2005-04-02', 'Dudu', 'jl. Serangkai bunga', '081928192', 'bola', 'berkerja', 'default.jpg', '0000-00-00', 1),
(7, '20190002', 7, 'Indah Sari', 2, 'Jakarta', '2004-04-02', 'Supri', 'Jl. Bintangkejora', '08291829312', 'bola', 'wirausaha', 'default.jpg', '0000-00-00', 1),
(65, '20190060', 5, 'Rahayu Yuniar', 2, 'Bandung', '2004-04-03', 'Ellis Widiastuti', 'jl. Serangkai bunga', '8291829312', 'Inggris', 'Pelajar', 'default.jpg', '2019-07-16', 1),
(66, '20190061', 5, 'Winda Santoso', 2, 'Bandung', '2004-04-04', 'Puspa Lazuardi', 'Jl. Bintangkejora', '8291829312', 'Bola', 'Pelajar', 'default.jpg', '2019-07-16', 1),
(67, '20190062', 5, 'Hesti Yulianti', 2, 'Jakarta', '2004-04-05', 'Siska Laksmiwati', 'jl. Serangkai bunga', '8291829312', 'Makeup', 'Lulusan', 'default.jpg', '2019-07-16', 1),
(68, '20190063', 5, 'Uli Usada', 2, 'Tangerang', '2004-04-06', 'Kurnia Pangestu', 'Jl. Bintangkejora', '8291829312', 'Makeup', 'Kerja', 'default.jpg', '2019-07-16', 1),
(69, '20190064', 5, 'Vanesa Wastuti', 2, 'Bekasi', '2004-04-07', 'Puspa Prabowo', 'jl. Serangkai bunga', '8291829312', 'Makeup', 'Lulusan', 'default.jpg', '2019-07-16', 1),
(70, '20190065', 5, 'Maya Anggraini', 2, 'Bekasi', '2004-04-08', 'Puspa Dongoran', 'Jl. Bintangkejora', '8291829312', 'Inggris', 'Wirausaha', 'default.jpg', '2019-07-16', 1),
(71, '20190066', 5, 'Tedi Hidayat', 1, 'Tangerang', '2004-04-09', 'Uli Natsir', 'jl. Serangkai bunga', '8291829312', 'Bola', 'Pelajar', 'default.jpg', '2019-07-16', 1),
(72, '20190067', 5, 'Jane Mustofa', 2, 'Bandung', '2004-04-10', 'Empluk Hassanah', 'Jl. Bintangkejora', '8291829312', 'Inggris', 'Wirausaha', 'default.jpg', '2019-07-16', 1),
(73, '20190068', 5, 'Icha Prasetyo', 2, 'Tangerang', '2004-04-11', 'Novi Riyanti', 'jl. Serangkai bunga', '8291829312', 'Bola', 'Kerja', 'default.jpg', '2019-07-16', 1),
(74, '20190069', 5, 'Nasim Sinaga', 1, 'Bekasi', '2004-04-12', 'Siti Handayani', 'Jl. Bintangkejora', '8291829312', 'Basket', 'Lulusan', 'default.jpg', '2019-07-16', 1),
(75, '20190070', 5, 'Zizi Mandala', 2, 'Jakarta', '2004-04-13', 'Mala Saptono', 'jl. Serangkai bunga', '8291829312', 'IT', 'Kerja', 'default.jpg', '2019-07-16', 1),
(76, '20190071', 5, 'Danang Firgantoro', 1, 'Bekasi', '2004-04-14', 'Kiandra Hasanah', 'Jl. Bintangkejora', '8291829312', 'Bola', 'Wirausaha', 'default.jpg', '2019-07-16', 1),
(77, '20190072', 5, 'Bella Agustina', 2, 'Jakarta', '2004-04-15', 'Dewi Pudjiastuti', 'jl. Serangkai bunga', '8291829312', 'Bola', 'Kerja', 'default.jpg', '2019-07-16', 1),
(78, '20190073', 5, 'Zaenab Riyanti', 2, 'Surabaya', '2004-04-16', 'Garang Narpati', 'Jl. Bintangkejora', '8291829312', 'Inggris', 'Wirausaha', 'default.jpg', '2019-07-16', 1),
(79, '20190074', 5, 'Kamal Rajata', 1, 'Bandung', '2004-04-17', 'Almira Novitasari', 'jl. Serangkai bunga', '8291829312', 'Inggris', 'Wirausaha', 'default.jpg', '2019-07-16', 1),
(80, '20190075', 5, 'Anastasia Narpati', 2, 'Bandung', '2004-04-18', 'Upik Simbolon', 'Jl. Bintangkejora', '8291829312', 'Basket', 'Wirausaha', 'default.jpg', '2019-07-16', 1),
(81, '20190076', 5, 'Cinthia Utami', 2, 'Jakarta', '2004-04-19', 'Ani Maheswara', 'jl. Serangkai bunga', '8291829312', 'Basket', 'Kerja', 'default.jpg', '2019-07-16', 1),
(82, '20190077', 5, 'Jayeng Putra', 1, 'Bekasi', '2004-04-20', 'Paiman Nasyidah', 'Jl. Bintangkejora', '8291829312', 'IT', 'Kerja', 'default.jpg', '2019-07-16', 1),
(83, '20190078', 5, 'Salimah Prakasa', 1, 'Surabaya', '2004-04-21', 'Dacin Nurdiyanti', 'jl. Serangkai bunga', '8291829312', 'Basket', 'Wirausaha', 'default.jpg', '2019-07-16', 1),
(84, '20190079', 5, 'Yuni Uyainah', 2, 'Tangerang', '2004-04-22', 'Unggul Hariyah', 'Jl. Bintangkejora', '8291829312', 'Inggris', 'Kerja', 'default.jpg', '2019-07-16', 1),
(85, '20190080', 5, 'Kuncara Widiastuti', 2, 'Tangerang', '2004-04-23', 'Dewi Riyanti', 'jl. Serangkai bunga', '8291829312', 'Makeup', 'Wirausaha', 'default.jpg', '2019-07-16', 1),
(86, '20190081', 5, 'Arta Puspita', 2, 'Jakarta', '2004-04-24', 'Ulva Mandasari', 'Jl. Bintangkejora', '8291829312', 'IT', 'Pelajar', 'default.jpg', '2019-07-16', 1),
(87, '20190082', 5, 'Titin Yuliarti', 2, 'Bandung', '2004-04-25', 'Danu Rahimah', 'jl. Serangkai bunga', '8291829312', 'Basket', 'Kerja', 'default.jpg', '2019-07-16', 1),
(88, '20190083', 5, 'Hani Rajata', 2, 'Tangerang', '2004-04-26', 'Nasrullah Puspita', 'Jl. Bintangkejora', '8291829312', 'Bola', 'Kerja', 'default.jpg', '2019-07-16', 1),
(89, '20190084', 5, 'Harimurti Waskita', 1, 'Jakarta', '2004-04-27', 'Kasiyah Usamah', 'jl. Serangkai bunga', '8291829312', 'Bola', 'Lulusan', 'default.jpg', '2019-07-16', 1),
(90, '20190085', 5, 'Pangeran Kuswandari', 1, 'Surabaya', '2004-04-28', 'Empluk Santoso', 'Jl. Bintangkejora', '8291829312', 'Inggris', 'Wirausaha', 'default.jpg', '2019-07-16', 1),
(91, '20190086', 5, 'Hari Purnawati', 1, 'Jakarta', '2004-04-29', 'Ulya Uyainah', 'jl. Serangkai bunga', '8291829312', 'Basket', 'Pelajar', 'default.jpg', '2019-07-16', 1),
(92, '20190087', 5, 'Ikin Saptono', 1, 'Bekasi', '2004-04-30', 'Kayun Adriansyah', 'Jl. Bintangkejora', '8291829312', 'Makeup', 'Wirausaha', 'default.jpg', '2019-07-16', 1),
(93, '20190088', 5, 'Xanana Dabukke', 2, 'Jakarta', '2004-05-01', 'Kamaria Simbolon', 'jl. Serangkai bunga', '8291829312', 'Bola', 'Wirausaha', 'default.jpg', '2019-07-16', 1),
(94, '20190089', 5, 'Iriana Prakasa', 2, 'Surabaya', '2004-05-02', 'Aswani Saragih', 'Jl. Bintangkejora', '8291829312', 'Bola', 'Pelajar', 'default.jpg', '2019-07-16', 1),
(95, '20190090', 5, 'Latika Prasetya', 1, 'Tangerang', '2004-05-03', 'Dacin Setiawan', 'jl. Serangkai bunga', '8291829312', 'Inggris', 'Kerja', 'default.jpg', '2019-07-16', 1),
(96, '20190091', 5, 'Jessica Fujiati', 2, 'Surabaya', '2004-05-04', 'Tari Natsir', 'Jl. Bintangkejora', '8291829312', 'Bola', 'Kerja', 'default.jpg', '2019-07-16', 1),
(97, '20190092', 5, 'Agnes Jailani', 2, 'Tangerang', '2004-05-05', 'Dinda Hidayat', 'jl. Serangkai bunga', '8291829312', 'Inggris', 'Lulusan', 'default.jpg', '2019-07-16', 1),
(98, '20190093', 5, 'Gatra Agustina', 1, 'Bandung', '2004-05-06', 'Ridwan Nurdiyanti', 'Jl. Bintangkejora', '8291829312', 'Inggris', 'Wirausaha', 'default.jpg', '2019-07-16', 1),
(99, '20190094', 5, 'Legawa Mulyani', 2, 'Jakarta', '2004-05-07', 'Asman Thamrin', 'jl. Serangkai bunga', '8291829312', 'Bola', 'Kerja', 'default.jpg', '2019-07-16', 1),
(100, '20190095', 5, 'Naradi Mansur', 1, 'Bekasi', '2004-05-08', 'Jati Lestari', 'Jl. Bintangkejora', '8291829312', 'Makeup', 'Pelajar', 'default.jpg', '2019-07-16', 1),
(101, '20190096', 5, 'Edward Kuswoyo', 2, 'Jakarta', '2004-05-09', 'Nova Aryani', 'jl. Serangkai bunga', '8291829312', 'Makeup', 'Pelajar', 'default.jpg', '2019-07-16', 1),
(102, '20190097', 5, 'Cahyanto Situmorang', 2, 'Bekasi', '2004-05-10', 'Mursita Firmansyah', 'Jl. Bintangkejora', '8291829312', 'Inggris', 'Kerja', 'default.jpg', '2019-07-16', 1),
(103, '20190098', 5, 'Wani Jailani', 1, 'Tangerang', '2004-05-11', 'Wahyu Zulaika', 'jl. Serangkai bunga', '8291829312', 'Basket', 'Lulusan', 'default.jpg', '2019-07-16', 1),
(104, '20190099', 5, 'Hana Mayasari', 1, 'Jakarta', '2004-05-12', 'Samiah Kusmawati', 'Jl. Bintangkejora', '8291829312', 'Makeup', 'Wirausaha', 'default.jpg', '2019-07-16', 1),
(105, '20190100', 5, 'Talia Nainggolan', 2, 'Bandung', '2004-05-13', 'Genta Purwanti', 'jl. Serangkai bunga', '8291829312', 'Bola', 'Kerja', 'default.jpg', '2019-07-16', 1),
(106, '20190101', 5, 'Teguh Tarihoran', 1, 'Bandung', '2004-05-14', 'Eka Uyainah', 'Jl. Bintangkejora', '8291829312', 'Makeup', 'Wirausaha', 'default.jpg', '2019-07-16', 1),
(107, '20190102', 5, 'Niyaga Mulyani', 1, 'Bekasi', '2004-05-15', 'Warta Simbolon', 'jl. Serangkai bunga', '8291829312', 'Bola', 'Pelajar', 'default.jpg', '2019-07-16', 1),
(108, '20190103', 5, 'Aslijan Suryatmi', 1, 'Surabaya', '2004-05-16', 'Chelsea Nasyiah', 'Jl. Bintangkejora', '8291829312', 'IT', 'Wirausaha', 'default.jpg', '2019-07-16', 1),
(109, '20190104', 5, 'Ida Kurniawan', 2, 'Jakarta', '2004-05-17', 'Raisa Zulaika', 'jl. Serangkai bunga', '8291829312', 'IT', 'Lulusan', 'default.jpg', '2019-07-16', 1),
(110, '20190105', 5, 'Hafshah Wijayanti', 1, 'Bekasi', '2004-05-18', 'Ian Lazuardi', 'Jl. Bintangkejora', '8291829312', 'Basket', 'Lulusan', 'default.jpg', '2019-07-16', 1),
(111, '20190106', 5, 'Kemba Zulkarnain', 2, 'Bandung', '2004-05-19', 'Nyoman Hardiansyah', 'jl. Serangkai bunga', '8291829312', 'Makeup', 'Pelajar', 'default.jpg', '2019-07-16', 1),
(112, '20190107', 5, 'Dimaz Utama', 1, 'Surabaya', '2004-05-20', 'Widya Budiman', 'Jl. Bintangkejora', '8291829312', 'IT', 'Lulusan', 'default.jpg', '2019-07-16', 1),
(113, '20190108', 5, 'Jaga Tampubolon', 2, 'Jakarta', '2004-05-21', 'Dina Lestari', 'jl. Serangkai bunga', '8291829312', 'IT', 'Pelajar', 'default.jpg', '2019-07-16', 1),
(114, '20190109', 5, 'Wani Zulkarnain', 1, 'Bandung', '2004-05-22', 'Shania Sapton', 'Jl. Bintangkejora', '8291829312', 'IT', 'Wirausaha', 'default.jpg', '2019-07-16', 1);

--
-- Triggers `generus`
--
DELIMITER //
CREATE TRIGGER `id_year` BEFORE INSERT ON `generus`
 FOR EACH ROW BEGIN
   SET NEW.id_gen = getNextCustomSeq("id_gen",year(now()));
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jk`
--

CREATE TABLE IF NOT EXISTS `jk` (
`id` int(1) NOT NULL,
  `nama` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jk`
--

INSERT INTO `jk` (`id`, `nama`) VALUES
(1, 'Laki-laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok`
--

CREATE TABLE IF NOT EXISTS `kelompok` (
`id` int(2) unsigned zerofill NOT NULL,
  `nama` int(2) unsigned zerofill NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `kelompok`
--

INSERT INTO `kelompok` (`id`, `nama`) VALUES
(01, 00),
(02, 01),
(03, 02),
(04, 03),
(05, 04),
(06, 05),
(07, 06);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
`id` int(2) NOT NULL,
  `nama_level` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `nama_level`) VALUES
(1, 'Super Admin'),
(2, 'Admin Daerah'),
(3, 'Admin Desa'),
(4, 'Admin Kelompok'),
(5, 'Contributor');

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE IF NOT EXISTS `master` (
`id` int(2) unsigned zerofill NOT NULL,
  `id_daerah` int(2) unsigned zerofill NOT NULL,
  `id_desa` int(2) unsigned zerofill NOT NULL,
  `id_kelompok` int(2) unsigned zerofill NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `master`
--

INSERT INTO `master` (`id`, `id_daerah`, `id_desa`, `id_kelompok`) VALUES
(01, 01, 01, 01),
(02, 01, 02, 01),
(03, 01, 02, 02),
(05, 01, 02, 03),
(06, 01, 03, 01),
(07, 01, 03, 02),
(08, 01, 04, 01),
(09, 01, 04, 02),
(10, 01, 04, 03),
(11, 01, 04, 04),
(12, 01, 05, 01),
(13, 01, 05, 02);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`id` int(2) NOT NULL,
  `nama_menu` varchar(32) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama_menu`) VALUES
(1, 'SuperAdmin'),
(2, 'Admin'),
(3, 'Menu');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE IF NOT EXISTS `sub_menu` (
`id` int(2) NOT NULL,
  `menu_id` int(2) NOT NULL,
  `nama_sub` varchar(32) NOT NULL,
  `icon` varchar(52) NOT NULL,
  `url` varchar(52) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `sub_menu`
--

INSERT INTO `sub_menu` (`id`, `menu_id`, `nama_sub`, `icon`, `url`, `is_active`) VALUES
(1, 1, 'Dashboard', 'fas fa-fw fa-tachometer-alt', 'SuperAdmin', 1),
(2, 2, 'Data Generus', 'fas fa-fw fa-table', 'admin', 1),
(3, 1, 'Data Admin', 'fas fa-fw fa-users', 'SuperAdmin/dataAdmin', 1),
(4, 3, 'Menu', 'far fa-fw fa-folder', 'menu', 1),
(5, 3, 'Sub Menu', 'fas fa-fw fa-folder-open', 'menu/submenu', 1),
(6, 2, 'Dashboard User', 'fas fa-fw fa-flag', 'admin', 0),
(8, 1, 'Data Master', 'fas fa-fw fa-flag', 'SuperAdmin/dataMaster', 1),
(9, 3, 'Extra Sub Menu', 'fas fa-fw fa-folder-plus', 'menu/extrasm', 1),
(10, 2, 'Data Kegiatan', 'fas fa-fw fa-flag', 'admin/kegiatan', 1),
(11, 2, 'Profile Sekolah', 'fas fa-fw fa-flag', 'admin/sekolah', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `img` varchar(128) NOT NULL,
  `master_id` int(2) unsigned zerofill NOT NULL,
  `level_id` int(2) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_user`, `password`, `img`, `master_id`, `level_id`, `is_active`) VALUES
(2, 'penailmu02', '$2y$10$mj2xDF8YhklBoHPxO5742Oa/t3Z5rXg.awhJuPFAag3io1GGmH932', 'default.jpg', 01, 2, 1),
(5, 'penailmu01', '$2y$10$8PDAynMpZRPt/XDZWdAgYuXmEdd4OlxsUmrt/Pz7M1D4QlQf46s..', 'default.jpg', 01, 1, 1),
(6, 'RWM01', '$2y$10$vuee/sTALO9AZWgFZz1RgObYmhWXvtNjq4i3/YTcFq87bEQk0ovk6', 'default.jpg', 02, 3, 1),
(12, 'RWM02', '$2y$10$oyCB97X5tW922wOpF8.LQOBdYgclFUe4VTaPWkfZGicowd8IyuSZy', 'default.jpg', 03, 4, 1),
(13, 'RWM03', '$2y$10$rYxgMW1RxW5DzsND6FlXleO77kTAhH0GG4JG6OWg9gjEy4Q4BfNUC', 'default.jpg', 05, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `_sequence`
--

CREATE TABLE IF NOT EXISTS `_sequence` (
  `seq_name` varchar(50) NOT NULL,
  `seq_group` varchar(10) NOT NULL,
  `seq_val` int(5) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_sequence`
--

INSERT INTO `_sequence` (`seq_name`, `seq_group`, `seq_val`) VALUES
('id_gen', '2019', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_menu`
--
ALTER TABLE `access_menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daerah`
--
ALTER TABLE `daerah`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra_sub_menu`
--
ALTER TABLE `extra_sub_menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generus`
--
ALTER TABLE `generus`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `Id_gen` (`Id_gen`);

--
-- Indexes for table `jk`
--
ALTER TABLE `jk`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelompok`
--
ALTER TABLE `kelompok`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master`
--
ALTER TABLE `master`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_sequence`
--
ALTER TABLE `_sequence`
 ADD PRIMARY KEY (`seq_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_menu`
--
ALTER TABLE `access_menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `daerah`
--
ALTER TABLE `daerah`
MODIFY `id` int(2) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `desa`
--
ALTER TABLE `desa`
MODIFY `id` int(2) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `extra_sub_menu`
--
ALTER TABLE `extra_sub_menu`
MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `generus`
--
ALTER TABLE `generus`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `jk`
--
ALTER TABLE `jk`
MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kelompok`
--
ALTER TABLE `kelompok`
MODIFY `id` int(2) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `master`
--
ALTER TABLE `master`
MODIFY `id` int(2) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
