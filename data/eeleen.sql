-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 06, 2021 at 11:35 AM
-- Server version: 5.7.33-0ubuntu0.16.04.1
-- PHP Version: 5.6.40-50+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eeleen`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm_question`
--

CREATE TABLE `adm_question` (
  `id` int(11) NOT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `adm_question`
--

INSERT INTO `adm_question` (`id`, `question`) VALUES
(1, 'Siapa nama ibumu ?'),
(2, 'Siapa nama gurumu ?'),
(3, 'Siapa nama kakakmu ?'),
(4, 'Siapa nama ayahmu ?'),
(5, 'Apa makanan favoritmu ?'),
(6, 'Apa nama hewan peliharaanmu ?'),
(7, 'Apa hobimu ?'),
(8, 'Apa kota kelahiranmu ?'),
(9, 'Apa kesukaanmu ?'),
(10, 'Berapa umurmu ?');

-- --------------------------------------------------------

--
-- Table structure for table `adm_user`
--

CREATE TABLE `adm_user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthdate` datetime DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `answer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `adm_user`
--

INSERT INTO `adm_user` (`id`, `email`, `fullname`, `password`, `type`, `phone`, `address`, `picture`, `gender`, `birthdate`, `question_id`, `answer`, `created_date`) VALUES
(14, 'lucy@gmail.com', 'Lucy Kanti Rahayu', '81dc9bdb52d04dc20036dbd8313ed055', 't', '012231344', 'DKI Jakarta', 'icon_camera_photo.png', 'm', '1990-06-02 00:00:00', 7, 'mengajar', '2021-06-02 19:39:26'),
(15, 'yohanes@gmail.com', 'Yohanes', '81dc9bdb52d04dc20036dbd8313ed055', 's', '081934195500', 'Penggilingan', 'doctor.jpg', 'L', '2000-02-10 00:00:00', 8, 'Jakarta', '2021-06-02 19:40:00'),
(16, 'yunus@gmail.com', 'Yunus Sugito', '81dc9bdb52d04dc20036dbd8313ed055', 's', '09123111123', 'Duren Sawit', NULL, 'm', '1998-05-13 00:00:00', 7, 'badminton', '2021-06-02 19:40:41'),
(17, 'eva@gmail.com', 'Eva Novianti', '81dc9bdb52d04dc20036dbd8313ed055', 't', '091228', 'Jakarta', NULL, 'f', '1990-06-09 00:00:00', 5, 'ayam', '2021-06-03 18:08:42');

-- --------------------------------------------------------

--
-- Table structure for table `cls_answer`
--

CREATE TABLE `cls_answer` (
  `id` int(11) NOT NULL,
  `assignment_id` int(11) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `uploaded_date` datetime DEFAULT NULL,
  `cls_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `grade` int(3) DEFAULT NULL,
  `status_answer` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cls_answer`
--

INSERT INTO `cls_answer` (`id`, `assignment_id`, `attachment`, `uploaded_date`, `cls_id`, `student_id`, `student_name`, `grade`, `status_answer`) VALUES
(1, 8, '28_Mei.docx', '2021-06-04 11:31:40', 13, 15, 'Yohanes', 100, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cls_assignment`
--

CREATE TABLE `cls_assignment` (
  `id` int(11) NOT NULL,
  `cls_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `type` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `due_date` datetime DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `creator_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `cls_assignment`
--

INSERT INTO `cls_assignment` (`id`, `cls_id`, `title`, `desc`, `type`, `due_date`, `attachment`, `created_date`, `creator_id`, `creator_name`) VALUES
(8, 13, 'Tugas 1', 'Tolong kerjakan dan perhatikan tenggat waktu pengumpulan', 'tugas', '2021-06-05 17:47:00', 'RPS-Semester_Ganjil_2020_2021.docx', '2021-06-03 17:47:54', 14, 'Lucy Kanti Rahayu'),
(9, 13, 'Tugas 2', 'Tolong Dikerjakan', 'tugas', '2021-06-04 11:34:00', 'Daftar_Kelas.pdf', '2021-06-04 11:33:22', 14, 'Lucy Kanti Rahayu');

-- --------------------------------------------------------

--
-- Table structure for table `cls_info`
--

CREATE TABLE `cls_info` (
  `id` int(11) NOT NULL,
  `cls_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `attachment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `creator_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `cls_info`
--

INSERT INTO `cls_info` (`id`, `cls_id`, `title`, `desc`, `attachment`, `created_date`, `creator_id`, `creator_name`) VALUES
(1, 13, 'PengumumanUAS AKAN DILAKSANAKAN PADA 30 JUNI 2021', '<p><strong>Pengumuman</strong><br /><br />UAS AKAN DILAKSANAKAN PADA <strong>30 JUNI 2021</strong></p>', NULL, '2021-06-03 15:42:10', 14, 'Lucy Kanti Rahayu');

-- --------------------------------------------------------

--
-- Table structure for table `cls_main`
--

CREATE TABLE `cls_main` (
  `id` int(11) NOT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `owner_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `cls_main`
--

INSERT INTO `cls_main` (`id`, `code`, `name`, `desc`, `owner_id`, `owner_name`, `created_date`) VALUES
(13, 'faksl', 'E-Learning Malam', 'UNSADA SI 2020/2021', 14, 'Lucy Kanti Rahayu', '2021-06-02 19:42:38'),
(14, 'ntKoxV', 'Data Mining', 'UNSADA SI MALAM 2020/2021', 17, 'Eva Novianti', '2021-06-03 18:09:20');

-- --------------------------------------------------------

--
-- Table structure for table `cls_participant`
--

CREATE TABLE `cls_participant` (
  `id` int(11) NOT NULL,
  `cls_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `join_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `cls_participant`
--

INSERT INTO `cls_participant` (`id`, `cls_id`, `student_id`, `join_date`) VALUES
(6, 13, 15, '2021-06-02 19:43:03'),
(7, 14, 15, '2021-06-03 18:09:56'),
(8, 13, 16, '2021-06-04 14:32:47');

-- --------------------------------------------------------

--
-- Table structure for table `cls_subject`
--

CREATE TABLE `cls_subject` (
  `id` int(11) NOT NULL,
  `cls_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `attachment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `creator_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `cls_subject`
--

INSERT INTO `cls_subject` (`id`, `cls_id`, `title`, `desc`, `attachment`, `created_date`, `creator_id`, `creator_name`) VALUES
(4, 13, 'Materi 1', 'Tolong dipahami', 'Pertemuan_11_Kompensasi_part11.pdf', '2021-06-02 19:50:49', 14, 'Lucy Kanti Rahayu');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `mtr_id` int(11) DEFAULT NULL,
  `tgs_id` int(11) DEFAULT NULL,
  `usr_id` int(11) NOT NULL,
  `usr_name` varchar(255) NOT NULL,
  `komentar` text NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `mtr_id`, `tgs_id`, `usr_id`, `usr_name`, `komentar`, `created_date`) VALUES
(1, NULL, 8, 15, 'Yohanes', 'Terima kasih', '0000-00-00 00:00:00'),
(2, NULL, 8, 15, 'Yohanes', 'Terima Kasih 2', '0000-00-00 00:00:00'),
(3, NULL, 8, 15, 'Yohanes', 'Terima Kasih 3', '0000-00-00 00:00:00'),
(4, 4, NULL, 15, 'Yohanes', 'Terima Kasih', '0000-00-00 00:00:00'),
(5, NULL, 9, 15, 'Yohanes', 'Maaf Telat', '0000-00-00 00:00:00'),
(6, NULL, 9, 15, 'Yohanes', 'Maaf', '0000-00-00 00:00:00'),
(7, NULL, 9, 15, 'Yohanes', 'Maaf 2', '2021-06-05 15:43:25');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_cls_topic`
--
CREATE TABLE `vw_cls_topic` (
`id` int(11)
,`cls_id` int(11)
,`title` varchar(255)
,`desc` mediumtext
,`attachment` varchar(255)
,`created_date` datetime
,`creator_name` varchar(255)
,`type` varchar(6)
,`icon` varchar(17)
,`due_date` datetime
);

-- --------------------------------------------------------

--
-- Structure for view `vw_cls_topic`
--
DROP TABLE IF EXISTS `vw_cls_topic`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_cls_topic`  AS  select `cls_subject`.`id` AS `id`,`cls_subject`.`cls_id` AS `cls_id`,`cls_subject`.`title` AS `title`,`cls_subject`.`desc` AS `desc`,`cls_subject`.`attachment` AS `attachment`,`cls_subject`.`created_date` AS `created_date`,`cls_subject`.`creator_name` AS `creator_name`,'Materi' AS `type`,'fa-book' AS `icon`,NULL AS `due_date` from `cls_subject` union select `cls_info`.`id` AS `id`,`cls_info`.`cls_id` AS `cls_id`,`cls_info`.`title` AS `title`,`cls_info`.`desc` AS `desc`,`cls_info`.`attachment` AS `attachment`,`cls_info`.`created_date` AS `created_date`,`cls_info`.`creator_name` AS `creator_name`,'Info' AS `type`,'fa-info-circle' AS `icon`,NULL AS `due_date` from `cls_info` union select `cls_assignment`.`id` AS `id`,`cls_assignment`.`cls_id` AS `cls_id`,`cls_assignment`.`title` AS `title`,`cls_assignment`.`desc` AS `desc`,`cls_assignment`.`attachment` AS `attachment`,`cls_assignment`.`created_date` AS `created_date`,`cls_assignment`.`creator_name` AS `creator_name`,'Tugas' AS `type`,'fa-clipboard-list' AS `icon`,`cls_assignment`.`due_date` AS `due_date` from `cls_assignment` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm_question`
--
ALTER TABLE `adm_question`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `adm_user`
--
ALTER TABLE `adm_user`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `cls_answer`
--
ALTER TABLE `cls_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_assignment`
--
ALTER TABLE `cls_assignment`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `cls_info`
--
ALTER TABLE `cls_info`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `cls_main`
--
ALTER TABLE `cls_main`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `cls_participant`
--
ALTER TABLE `cls_participant`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `cls_subject`
--
ALTER TABLE `cls_subject`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adm_question`
--
ALTER TABLE `adm_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `adm_user`
--
ALTER TABLE `adm_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `cls_answer`
--
ALTER TABLE `cls_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cls_assignment`
--
ALTER TABLE `cls_assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `cls_info`
--
ALTER TABLE `cls_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cls_main`
--
ALTER TABLE `cls_main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `cls_participant`
--
ALTER TABLE `cls_participant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `cls_subject`
--
ALTER TABLE `cls_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
