-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2017 at 04:39 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_mitigasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `chatid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `chatroomid` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  `chat_date` datetime NOT NULL,
  PRIMARY KEY (`chatid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chatid`, `uid`, `chatroomid`, `message`, `chat_date`) VALUES
(5, 8, 10, 'adadaaa', '2017-09-29 17:38:47'),
(6, 9, 10, 'hanya tes a', '2017-09-29 17:40:13'),
(7, 8, 10, 'wrw', '2017-10-01 12:08:08'),
(8, 9, 10, 'ghh', '2017-10-01 12:30:11');

-- --------------------------------------------------------

--
-- Table structure for table `chatroom`
--

CREATE TABLE IF NOT EXISTS `chatroom` (
  `chatroomid` int(11) NOT NULL AUTO_INCREMENT,
  `chat_name` varchar(60) NOT NULL,
  `date_created` datetime NOT NULL,
  `chat_password` varchar(30) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`chatroomid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `chatroom`
--

INSERT INTO `chatroom` (`chatroomid`, `chat_name`, `date_created`, `chat_password`, `uid`) VALUES
(10, 'adada', '2017-09-29 17:18:38', '', 9),
(11, 'tes', '2017-10-08 10:56:04', '123', 8),
(12, 'ad', '2017-10-08 11:06:05', '', 12),
(13, 'ad', '2017-10-08 11:06:10', '', 12);

-- --------------------------------------------------------

--
-- Table structure for table `chat_member`
--

CREATE TABLE IF NOT EXISTS `chat_member` (
  `chat_memberid` int(11) NOT NULL AUTO_INCREMENT,
  `chatroomid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`chat_memberid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `chat_member`
--

INSERT INTO `chat_member` (`chat_memberid`, `chatroomid`, `uid`) VALUES
(20, 10, 9),
(21, 10, 8),
(22, 11, 8),
(23, 11, 12),
(24, 10, 12),
(25, 12, 12),
(26, 13, 12),
(27, 11, 11);

-- --------------------------------------------------------

--
-- Table structure for table `panduan`
--

CREATE TABLE IF NOT EXISTS `panduan` (
  `id_panduan` int(5) NOT NULL AUTO_INCREMENT,
  `nama_panduan` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi` text COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_panduan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `panduan`
--

INSERT INTO `panduan` (`id_panduan`, `nama_panduan`, `judul`, `isi`, `hari`, `tanggal`, `jam`, `gambar`, `dibaca`) VALUES
(8, 'banjir', 'panduan Benanc', '<p>qeeq</p>\r\n', 'Minggu', '2017-09-17', '22:35:52', 'user3.png', 0),
(9, 'gunung', 'adad', '<p>adada</p>\r\n', 'Minggu', '0000-00-00', '22:36:39', 'user3.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bencana`
--

CREATE TABLE IF NOT EXISTS `tbl_bencana` (
  `id_bencana` varchar(2) NOT NULL,
  `nama_bencana` varchar(50) NOT NULL,
  PRIMARY KEY (`id_bencana`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bencana`
--

INSERT INTO `tbl_bencana` (`id_bencana`, `nama_bencana`) VALUES
('01', 'Angin Topan'),
('02', 'Gempa Bumi'),
('03', 'Kekeringan'),
('04', 'Longsor'),
('05', 'Kebakaran'),
('06', 'Banjir'),
('07', 'Gunung Meletus');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info_bencana`
--

CREATE TABLE IF NOT EXISTS `tbl_info_bencana` (
  `id_info` int(12) NOT NULL AUTO_INCREMENT,
  `id_bencana` varchar(2) NOT NULL,
  `tempat` varchar(250) NOT NULL,
  `korban` varchar(100) NOT NULL,
  `kronologis` text NOT NULL,
  `tgl` date NOT NULL,
  `foto` varchar(50) NOT NULL,
  PRIMARY KEY (`id_info`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_info_bencana`
--

INSERT INTO `tbl_info_bencana` (`id_info`, `id_bencana`, `tempat`, `korban`, `kronologis`, `tgl`, `foto`) VALUES
(1, '01', 'kuningan', 'nihil', '<p>;kdncacm;sknmckdsnclsnvlkdkvna</p>\r\n', '2017-10-06', ''),
(2, '01', 'desa', 'ga', '<p>ta</p>\r\n', '2017-10-08', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peringatan_dini`
--

CREATE TABLE IF NOT EXISTS `tbl_peringatan_dini` (
  `id_dini` int(5) NOT NULL AUTO_INCREMENT,
  `isi` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_dini`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_peringatan_dini`
--

INSERT INTO `tbl_peringatan_dini` (`id_dini`, `isi`, `gambar`) VALUES
(1, 'telah terjadi kadadadadadadada', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rpt_bencana`
--

CREATE TABLE IF NOT EXISTS `tbl_rpt_bencana` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(5) DEFAULT NULL,
  `keterangan` text,
  `gambar` varchar(250) DEFAULT NULL,
  `status` enum('-','Tidak Benar','Benar') DEFAULT NULL,
  `dibuka` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_rpt_bencana`
--

INSERT INTO `tbl_rpt_bencana` (`id`, `uid`, `keterangan`, `gambar`, `status`, `dibuka`) VALUES
(1, 9, 'zffs', 'sm-img-2.jpg', 'Tidak Benar', '0'),
(2, 12, 'sbdndn', '', 'Tidak Benar', '0'),
(3, 13, 'aflknlvanvlvlvnlsnlnv', 'PETA KRB G. CIREMAI.jpg', 'Tidak Benar', '0'),
(4, 13, 'gw', 'PETA KRB G. CIREMAI.jpg', 'Tidak Benar', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `w_login` datetime NOT NULL,
  `photo` varchar(100) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `aktif` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `nama`, `pass`, `level`, `email`, `w_login`, `photo`, `nohp`, `aktif`) VALUES
(8, 'didin', '80f0ca7f9c9bf51dea99162632e351aa', 'admin', 'didinlukmanudin@gmail.com', '2017-10-09 19:56:27', 'dist/img/avatar04.png', '08988999', 'Y'),
(10, 'ade', '14e1b600b1fd579f47433b88e8d85291', 'user', 'ade@yahoo.com', '2017-09-20 13:22:57', 'dist/img/avatar04.png', '08989899989', 'Y'),
(11, 'dewi', 'e10adc3949ba59abbe56e057f20f883e', 'user', 'dewi@gs.com', '0000-00-00 00:00:00', 'dist/img/avatar04.png', '2424242', 'Y'),
(12, 'lukman', '80f0ca7f9c9bf51dea99162632e351aa', 'user', 'lukmanudin@gmail.com', '2017-10-09 23:25:06', 'dist/img/avatar04.png', '0977665688', 'Y'),
(13, 'andri', '6bd3108684ccc9dfd40b126877f850b0', 'user', 'andri@gmail.com', '2017-10-09 13:17:22', 'dist/img/avatar04.png', '986657667658', 'Y'),
(14, 'sutrisno', '82e29bc26cd3dd9eff684bb064f1855b', 'user', 'sutrisno@gmail.com', '0000-00-00 00:00:00', 'dist/img/avatar04.png', '988569757959', 'Y');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
