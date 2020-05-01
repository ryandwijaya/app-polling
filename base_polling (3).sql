-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2020 at 10:21 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `base_polling`
--

-- --------------------------------------------------------

--
-- Table structure for table `hr_instansi`
--

CREATE TABLE `hr_instansi` (
  `instansi_id` int(11) NOT NULL,
  `instansi_nama` text NOT NULL,
  `instansi_dinas` text NOT NULL,
  `instansi_alamat` text NOT NULL,
  `instansi_telepon` varchar(20) NOT NULL,
  `instansi_email` varchar(100) NOT NULL,
  `instansi_logo` text NOT NULL,
  `instansi_versi` enum('monitor','android') NOT NULL,
  `instansi_app_responden` enum('yes','no') NOT NULL,
  `instansi_versi_jwb` enum('tiga','empat','lima','monitor3','monitor4','android') NOT NULL,
  `instansi_dcreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_instansi`
--

INSERT INTO `hr_instansi` (`instansi_id`, `instansi_nama`, `instansi_dinas`, `instansi_alamat`, `instansi_telepon`, `instansi_email`, `instansi_logo`, `instansi_versi`, `instansi_app_responden`, `instansi_versi_jwb`, `instansi_dcreated`) VALUES
(1, 'PT. DIGTIVE DEVELOPER', 'DINAS TEKNOLOGI DAN KOMUNIKASI PROVINSI RIAU', 'JL. Gajah Mada Duri - Riau, Indonesia MERDEKA', '0822 6828 3370', 'arrabadi@gmail.comm', 'icebear.jpg', 'android', 'yes', 'tiga', '2019-10-26 13:52:53');

-- --------------------------------------------------------

--
-- Table structure for table `hr_jwb`
--

CREATE TABLE `hr_jwb` (
  `jwb_id` int(11) NOT NULL,
  `jwb_ket` varchar(50) NOT NULL,
  `jwb_kategori` enum('tiga','empat','lima') NOT NULL,
  `jwb_dcreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_jwb`
--

INSERT INTO `hr_jwb` (`jwb_id`, `jwb_ket`, `jwb_kategori`, `jwb_dcreated`) VALUES
(1, 'Puas', 'tiga', '2019-10-16 18:25:11'),
(2, 'Cukup Puas', 'tiga', '2019-10-16 18:25:11'),
(3, 'Tidak Puas', 'tiga', '2019-10-16 18:25:11'),
(5, 'Sangat Puas', 'empat', '2019-12-13 16:52:05'),
(6, 'Puas', 'empat', '2019-12-13 16:52:05'),
(7, 'Cukup Puas', 'empat', '2019-12-13 16:52:05'),
(8, 'Tidak Puas', 'empat', '2019-12-13 16:52:05'),
(9, 'Sangat Puas', 'lima', '2019-12-15 09:34:47'),
(10, 'Puas', 'lima', '2019-12-15 09:34:47'),
(11, 'Cukup Puas', 'lima', '2019-12-15 09:34:47'),
(12, 'Tidak Puas', 'lima', '2019-12-15 09:34:47'),
(13, 'Sangat Tidak Puas', 'lima', '2019-12-15 09:34:47');

-- --------------------------------------------------------

--
-- Table structure for table `hr_jwb4`
--

CREATE TABLE `hr_jwb4` (
  `jwb4_id` int(11) NOT NULL,
  `jwb4_ket` varchar(255) NOT NULL,
  `jwb4_ptn` int(11) NOT NULL,
  `jwb4_option` varchar(2) NOT NULL,
  `jwb4_dcreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_jwb4`
--

INSERT INTO `hr_jwb4` (`jwb4_id`, `jwb4_ket`, `jwb4_ptn`, `jwb4_option`, `jwb4_dcreated`) VALUES
(1, 'Sangat Suka', 1, 'A', '2020-02-18 14:25:43'),
(2, 'Suka', 1, 'B', '2020-02-18 14:25:43'),
(3, 'Tidak Suka', 1, 'C', '2020-02-18 14:25:43'),
(4, 'Sangat Tidak Suka', 1, 'D', '2020-02-18 14:25:43');

-- --------------------------------------------------------

--
-- Table structure for table `hr_kpsn`
--

CREATE TABLE `hr_kpsn` (
  `kpsn_id` int(11) NOT NULL,
  `kpsn_responden` varchar(255) NOT NULL,
  `kpsn_petugas` int(11) NOT NULL,
  `kpsn_ptn` int(11) NOT NULL,
  `kpsn_lynn` int(11) NOT NULL,
  `kpsn_jwb` int(11) NOT NULL,
  `kpsn_klhn` text NOT NULL,
  `kpsn_dcreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_kpsn`
--

INSERT INTO `hr_kpsn` (`kpsn_id`, `kpsn_responden`, `kpsn_petugas`, `kpsn_ptn`, `kpsn_lynn`, `kpsn_jwb`, `kpsn_klhn`, `kpsn_dcreated`) VALUES
(1, '', 1, 5, 1, 1, '', '2020-03-03 15:47:58'),
(2, '', 1, 5, 1, 1, '', '2020-03-03 15:49:21'),
(3, '', 1, 5, 1, 3, '', '2020-03-03 15:49:26'),
(4, '', 1, 5, 2, 1, '', '2020-03-03 16:17:35'),
(5, '', 1, 5, 2, 2, '', '2020-03-03 16:18:19'),
(6, '', 1, 5, 3, 1, '', '2020-03-03 16:18:29'),
(7, '', 1, 5, 3, 2, '', '2020-03-03 16:18:41'),
(8, '', 1, 5, 4, 2, '', '2020-03-03 16:18:45'),
(9, '', 1, 5, 6, 3, '', '2020-03-03 16:19:01'),
(10, '', 1, 5, 6, 2, '', '2020-03-03 16:19:06'),
(11, '', 1, 5, 6, 1, '', '2020-03-03 16:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `hr_kpsn4`
--

CREATE TABLE `hr_kpsn4` (
  `kpsn4_id` int(11) NOT NULL,
  `kpsn4_responden` int(11) NOT NULL,
  `kpsn4_ptn` int(11) NOT NULL,
  `kpsn4_jwb` int(11) NOT NULL,
  `kpsn4_A` enum('0','1') DEFAULT NULL,
  `kpsn4_B` enum('0','1') DEFAULT NULL,
  `kpsn4_C` enum('0','1') DEFAULT NULL,
  `kpsn4_D` enum('0','1') DEFAULT NULL,
  `kpsn4_dcreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_lynn`
--

CREATE TABLE `hr_lynn` (
  `lynn_id` int(11) NOT NULL,
  `lynn_nm` varchar(30) NOT NULL,
  `lynn_dcreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_lynn`
--

INSERT INTO `hr_lynn` (`lynn_id`, `lynn_nm`, `lynn_dcreated`) VALUES
(1, 'Loket 1', '2020-03-03 15:45:31'),
(2, 'Loket 2', '2020-03-03 15:45:31'),
(3, 'Loket 3', '2020-03-03 15:45:31'),
(4, 'Loket 4', '2020-03-03 15:45:31'),
(5, 'Monitor', '2020-03-03 15:45:31'),
(6, 'Loket 5', '2020-03-03 15:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `hr_monitor3`
--

CREATE TABLE `hr_monitor3` (
  `mnt3_id` int(11) NOT NULL,
  `mnt3_responden` int(11) NOT NULL,
  `mnt3_jwb0` enum('A','B','C','D') DEFAULT NULL,
  `mnt3_jwb1` enum('A','B','C','D') DEFAULT NULL,
  `mnt3_jwb2` enum('A','B','C','D') DEFAULT NULL,
  `mnt3_jwb3` enum('A','B','C','D') DEFAULT NULL,
  `mnt3_jwb4` enum('A','B','C','D') DEFAULT NULL,
  `mnt3_jwb5` enum('A','B','C','D') DEFAULT NULL,
  `mnt3_jwb6` enum('A','B','C','D') DEFAULT NULL,
  `mnt3_jwb7` enum('A','B','C','D') DEFAULT NULL,
  `mnt3_jwb8` enum('A','B','C','D') DEFAULT NULL,
  `mnt3_jwb9` enum('A','B','C','D') DEFAULT NULL,
  `mnt3_jwb10` enum('A','B','C','D') DEFAULT NULL,
  `mnt3_jwb11` enum('A','B','C','D') DEFAULT NULL,
  `mnt3_jwb12` enum('A','B','C','D') DEFAULT NULL,
  `mnt3_jwb13` enum('A','B','C','D') DEFAULT NULL,
  `mnt3_jwb14` enum('A','B','C','D') DEFAULT NULL,
  `mnt3_dcreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_monitor3`
--

INSERT INTO `hr_monitor3` (`mnt3_id`, `mnt3_responden`, `mnt3_jwb0`, `mnt3_jwb1`, `mnt3_jwb2`, `mnt3_jwb3`, `mnt3_jwb4`, `mnt3_jwb5`, `mnt3_jwb6`, `mnt3_jwb7`, `mnt3_jwb8`, `mnt3_jwb9`, `mnt3_jwb10`, `mnt3_jwb11`, `mnt3_jwb12`, `mnt3_jwb13`, `mnt3_jwb14`, `mnt3_dcreated`) VALUES
(1, 1, 'A', 'B', 'D', 'B', 'B', 'D', 'B', 'B', 'D', 'C', 'D', 'B', 'B', 'D', 'B', '2020-02-29 16:47:35'),
(3, 3, 'B', 'D', 'B', 'D', 'B', 'D', 'B', 'C', 'D', 'B', 'B', 'D', 'B', 'D', 'C', '2020-03-02 11:13:02');

-- --------------------------------------------------------

--
-- Table structure for table `hr_pertanyaan`
--

CREATE TABLE `hr_pertanyaan` (
  `pertanyaan_id` int(11) NOT NULL,
  `pertanyaan_isi` text NOT NULL,
  `pertanyaan_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_pertanyaan`
--

INSERT INTO `hr_pertanyaan` (`pertanyaan_id`, `pertanyaan_isi`, `pertanyaan_date_created`) VALUES
(1, 'Bagaimana menurut saudara tentang prosedur pelayanan kami?', '2019-11-25 19:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `hr_ptn`
--

CREATE TABLE `hr_ptn` (
  `ptn_id` int(11) NOT NULL,
  `ptn_txt` text NOT NULL,
  `ptn_crtd_by` int(11) NOT NULL,
  `ptn_dcreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_ptn`
--

INSERT INTO `hr_ptn` (`ptn_id`, `ptn_txt`, `ptn_crtd_by`, `ptn_dcreated`) VALUES
(5, 'Bagaimana pendapat anda mengenai pelayanan kami disini ?', 1, '2019-12-03 14:05:14');

-- --------------------------------------------------------

--
-- Table structure for table `hr_ptn4`
--

CREATE TABLE `hr_ptn4` (
  `ptn4_id` int(11) NOT NULL,
  `ptn4_txt` text NOT NULL,
  `ptn4_dcreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_ptn4`
--

INSERT INTO `hr_ptn4` (`ptn4_id`, `ptn4_txt`, `ptn4_dcreated`) VALUES
(1, 'Apakah kamu menyukai pelayanan kami?', '2020-02-18 14:25:43');

-- --------------------------------------------------------

--
-- Table structure for table `hr_responden`
--

CREATE TABLE `hr_responden` (
  `responden_id` int(11) NOT NULL,
  `responden_no` int(11) NOT NULL,
  `responden_nama` varchar(255) NOT NULL,
  `responden_umur` int(11) NOT NULL,
  `responden_jk` varchar(255) NOT NULL,
  `responden_pendidikan` varchar(255) NOT NULL,
  `responden_pekerjaan` varchar(255) NOT NULL,
  `responden_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_responden`
--

INSERT INTO `hr_responden` (`responden_id`, `responden_no`, `responden_nama`, `responden_umur`, `responden_jk`, `responden_pendidikan`, `responden_pekerjaan`, `responden_date_created`) VALUES
(1, 0, 'Ryan Dwijaya', 23, 'Pria', 'SLTA', 'PEGAWAI SWASTA', '2020-02-29 16:47:35'),
(3, 0, 'Andre', 23, 'Pria', 'SLTP', 'WIRASWASTA', '2020-03-02 11:13:02');

-- --------------------------------------------------------

--
-- Table structure for table `hr_set_android`
--

CREATE TABLE `hr_set_android` (
  `andro_id` int(11) NOT NULL,
  `andro_jam` text NOT NULL,
  `andro_ptn` text NOT NULL,
  `andro_judul` text NOT NULL,
  `andro_alamat` text NOT NULL,
  `andro_text` text NOT NULL,
  `andro_dcreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_set_android`
--

INSERT INTO `hr_set_android` (`andro_id`, `andro_jam`, `andro_ptn`, `andro_judul`, `andro_alamat`, `andro_text`, `andro_dcreated`) VALUES
(1, '{\"font_jam\":\"Courier New\",\"color_jam\":\"#fb0404\",\"size_jam\":\"15\"}', '{\"isi_ptn\":\"Bagaimana pendapat anda mengenai pelayanan kami disini ?\",\"font_ptn\":\"Candara\",\"color_ptn\":\"#959595\",\"size_ptn\":\"14\"}', '{\"isi_judul\":\"PT. Digtive Developer  \",\"font_judul\":\"Impact\",\"color_judul\":\"#04d2fb\",\"size_judul\":\"12\"}', '{\"isi_alamat\":\"JL. Gajah Mada\",\"font_alamat\":\"Comic Sans\",\"color_alamat\":\"#000000\",\"size_alamat\":\"12\"}', '{\"isi_text\":\"Berita  hari ini adalah hari sabtu\",\"font_text\":\"Impact\",\"color_text\":\"#04fbc0\",\"size_text\":\"15\",\"status_text\":\"on\"}', '2020-01-08 06:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `hr_set_key`
--

CREATE TABLE `hr_set_key` (
  `key_id` int(11) NOT NULL,
  `loket_1` text NOT NULL,
  `loket_2` text NOT NULL,
  `loket_3` text NOT NULL,
  `loket_4` text NOT NULL,
  `loket_5` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr_set_key`
--

INSERT INTO `hr_set_key` (`key_id`, `loket_1`, `loket_2`, `loket_3`, `loket_4`, `loket_5`) VALUES
(1, '{\"key_1\":\"0\",\"key_2\":\"000\",\"key_3\":\"Delete\"}', '{\"key_1\":\"1\",\"key_2\":\"2\",\"key_3\":\"3\"}', '{\"key_1\":\"4\",\"key_2\":\"5\",\"key_3\":\"6\"}', '{\"key_1\":\"7\",\"key_2\":\"8\",\"key_3\":\"9\"}', '{\"key_1\":\"/\",\"key_2\":\"*\",\"key_3\":\"-\"}');

-- --------------------------------------------------------

--
-- Table structure for table `hr_set_monitor2`
--

CREATE TABLE `hr_set_monitor2` (
  `set_id` int(11) NOT NULL,
  `set_lyn` int(11) NOT NULL,
  `set_ptn` int(11) NOT NULL,
  `set_background` varchar(255) NOT NULL,
  `set_background_body` varchar(255) NOT NULL,
  `set_background_kop` varchar(255) NOT NULL,
  `set_background_button` varchar(255) NOT NULL,
  `set_shape_button` enum('Theme 1','Theme 2','Theme 3','Theme 4','Theme 5') NOT NULL,
  `set_font_color` varchar(255) NOT NULL,
  `set_timer` double DEFAULT NULL,
  `set_dcreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_set_monitor2`
--

INSERT INTO `hr_set_monitor2` (`set_id`, `set_lyn`, `set_ptn`, `set_background`, `set_background_body`, `set_background_kop`, `set_background_button`, `set_shape_button`, `set_font_color`, `set_timer`, `set_dcreated`) VALUES
(1, 4, 5, '#65fcd1', '', '', '', '', '', NULL, '2019-12-03 13:58:32'),
(2, 3, 5, 'rgba(173,102,249,0.79)', '', '', '', '', '', NULL, '2019-12-03 14:04:12'),
(3, 2, 5, 'darkgrey', '', '', '', '', '', NULL, '2019-12-03 14:05:30'),
(4, 1, 5, 'deeppink', '', '', '', '', '', NULL, '2019-12-03 14:22:30'),
(5, 5, 5, 'rgba(207,207,207,0.58)', 'walpaper1.jpg', 'rgba(207,207,207,0.58)', '#903ac2', 'Theme 4', '#000000', 40, '2019-12-28 20:55:43');

-- --------------------------------------------------------

--
-- Table structure for table `hr_umum`
--

CREATE TABLE `hr_umum` (
  `umum_id` int(11) NOT NULL,
  `umum_text_top` text NOT NULL,
  `umum_text_bot` text NOT NULL,
  `umum_video` text NOT NULL,
  `umum_background` varchar(255) NOT NULL,
  `umum_font` text NOT NULL,
  `umum_font_color` text NOT NULL,
  `umum_dcreated` datetime NOT NULL DEFAULT current_timestamp(),
  `umum_bg_header` text NOT NULL,
  `umum_kop` text NOT NULL,
  `umum_bg_video` text NOT NULL,
  `umum_bg_chart` text NOT NULL,
  `umum_bg_marquee` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_umum`
--

INSERT INTO `hr_umum` (`umum_id`, `umum_text_top`, `umum_text_bot`, `umum_video`, `umum_background`, `umum_font`, `umum_font_color`, `umum_dcreated`, `umum_bg_header`, `umum_kop`, `umum_bg_video`, `umum_bg_chart`, `umum_bg_marquee`) VALUES
(1, '', 'Pengumuman : pada hari sabtu dan minggu layanan kami tutup. Silahkan melakukan pendaftaran kembali pada hari berikutnya terimakasih .  |  Jam buka , Senin - Kamis : 10.00  ', 'videoplayback.mp4', 'bg-1.jpg', '', '#000000', '0000-00-00 00:00:00', '#ffffff', 'contoh-kop-surat-perusahaan.jpg', '#ffffff', '#ffffff', '#ffffff');

-- --------------------------------------------------------

--
-- Table structure for table `hr_usr`
--

CREATE TABLE `hr_usr` (
  `usr_id` int(11) NOT NULL,
  `usr_nm` varchar(60) NOT NULL,
  `usr_usrnm` varchar(30) NOT NULL,
  `usr_pw` text NOT NULL,
  `usr_lvl` text NOT NULL,
  `usr_dcreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_usr`
--

INSERT INTO `hr_usr` (`usr_id`, `usr_nm`, `usr_usrnm`, `usr_pw`, `usr_lvl`, `usr_dcreated`) VALUES
(1, 'Ryan Dwi', 'root', '$2y$10$727NGTGgitCblqV0EWeA3.0aJjgsZ17a5eoUBzNubNR6JsYX5KBfG', 'admin', '2019-12-19 11:56:46');

-- --------------------------------------------------------

--
-- Table structure for table `hr_video`
--

CREATE TABLE `hr_video` (
  `video_id` int(11) NOT NULL,
  `video_judul` text NOT NULL,
  `video_monitor` int(11) NOT NULL,
  `video_dcreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_video`
--

INSERT INTO `hr_video` (`video_id`, `video_judul`, `video_monitor`, `video_dcreated`) VALUES
(8, 'www.mp4', 1, '2020-01-01 19:30:36'),
(11, 'videoplayback.mp4', 1, '2020-01-26 14:06:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hr_instansi`
--
ALTER TABLE `hr_instansi`
  ADD PRIMARY KEY (`instansi_id`);

--
-- Indexes for table `hr_jwb`
--
ALTER TABLE `hr_jwb`
  ADD PRIMARY KEY (`jwb_id`);

--
-- Indexes for table `hr_jwb4`
--
ALTER TABLE `hr_jwb4`
  ADD PRIMARY KEY (`jwb4_id`);

--
-- Indexes for table `hr_kpsn`
--
ALTER TABLE `hr_kpsn`
  ADD PRIMARY KEY (`kpsn_id`),
  ADD KEY `kpsn_ptn` (`kpsn_ptn`),
  ADD KEY `kpsn_lynn` (`kpsn_lynn`),
  ADD KEY `kpsn_jwb` (`kpsn_jwb`);

--
-- Indexes for table `hr_kpsn4`
--
ALTER TABLE `hr_kpsn4`
  ADD PRIMARY KEY (`kpsn4_id`);

--
-- Indexes for table `hr_lynn`
--
ALTER TABLE `hr_lynn`
  ADD PRIMARY KEY (`lynn_id`);

--
-- Indexes for table `hr_monitor3`
--
ALTER TABLE `hr_monitor3`
  ADD PRIMARY KEY (`mnt3_id`);

--
-- Indexes for table `hr_pertanyaan`
--
ALTER TABLE `hr_pertanyaan`
  ADD PRIMARY KEY (`pertanyaan_id`);

--
-- Indexes for table `hr_ptn`
--
ALTER TABLE `hr_ptn`
  ADD PRIMARY KEY (`ptn_id`);

--
-- Indexes for table `hr_ptn4`
--
ALTER TABLE `hr_ptn4`
  ADD PRIMARY KEY (`ptn4_id`);

--
-- Indexes for table `hr_responden`
--
ALTER TABLE `hr_responden`
  ADD PRIMARY KEY (`responden_id`);

--
-- Indexes for table `hr_set_android`
--
ALTER TABLE `hr_set_android`
  ADD PRIMARY KEY (`andro_id`);

--
-- Indexes for table `hr_set_key`
--
ALTER TABLE `hr_set_key`
  ADD PRIMARY KEY (`key_id`);

--
-- Indexes for table `hr_set_monitor2`
--
ALTER TABLE `hr_set_monitor2`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `hr_umum`
--
ALTER TABLE `hr_umum`
  ADD PRIMARY KEY (`umum_id`);

--
-- Indexes for table `hr_usr`
--
ALTER TABLE `hr_usr`
  ADD PRIMARY KEY (`usr_id`);

--
-- Indexes for table `hr_video`
--
ALTER TABLE `hr_video`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hr_instansi`
--
ALTER TABLE `hr_instansi`
  MODIFY `instansi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hr_jwb`
--
ALTER TABLE `hr_jwb`
  MODIFY `jwb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `hr_jwb4`
--
ALTER TABLE `hr_jwb4`
  MODIFY `jwb4_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hr_kpsn`
--
ALTER TABLE `hr_kpsn`
  MODIFY `kpsn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hr_kpsn4`
--
ALTER TABLE `hr_kpsn4`
  MODIFY `kpsn4_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hr_lynn`
--
ALTER TABLE `hr_lynn`
  MODIFY `lynn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hr_monitor3`
--
ALTER TABLE `hr_monitor3`
  MODIFY `mnt3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hr_pertanyaan`
--
ALTER TABLE `hr_pertanyaan`
  MODIFY `pertanyaan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hr_ptn`
--
ALTER TABLE `hr_ptn`
  MODIFY `ptn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hr_ptn4`
--
ALTER TABLE `hr_ptn4`
  MODIFY `ptn4_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hr_responden`
--
ALTER TABLE `hr_responden`
  MODIFY `responden_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hr_set_android`
--
ALTER TABLE `hr_set_android`
  MODIFY `andro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hr_set_key`
--
ALTER TABLE `hr_set_key`
  MODIFY `key_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hr_set_monitor2`
--
ALTER TABLE `hr_set_monitor2`
  MODIFY `set_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hr_umum`
--
ALTER TABLE `hr_umum`
  MODIFY `umum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `hr_usr`
--
ALTER TABLE `hr_usr`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hr_video`
--
ALTER TABLE `hr_video`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hr_kpsn`
--
ALTER TABLE `hr_kpsn`
  ADD CONSTRAINT `hr_kpsn_ibfk_1` FOREIGN KEY (`kpsn_jwb`) REFERENCES `hr_jwb` (`jwb_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hr_kpsn_ibfk_2` FOREIGN KEY (`kpsn_ptn`) REFERENCES `hr_ptn` (`ptn_id`),
  ADD CONSTRAINT `hr_kpsn_ibfk_3` FOREIGN KEY (`kpsn_lynn`) REFERENCES `hr_lynn` (`lynn_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
