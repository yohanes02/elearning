/*
 Navicat Premium Data Transfer

 Source Server         : local mysql
 Source Server Type    : MySQL
 Source Server Version : 100121
 Source Host           : 127.0.0.1:3306
 Source Schema         : eeleen

 Target Server Type    : MySQL
 Target Server Version : 100121
 File Encoding         : 65001

 Date: 28/05/2021 15:54:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for adm_question
-- ----------------------------
DROP TABLE IF EXISTS `adm_question`;
CREATE TABLE `adm_question`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for adm_user
-- ----------------------------
DROP TABLE IF EXISTS `adm_user`;
CREATE TABLE `adm_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `type` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `picture` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `gender` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `birthdate` datetime(0) NULL DEFAULT NULL,
  `question_id` int(11) NULL DEFAULT NULL,
  `answer` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of adm_user
-- ----------------------------
INSERT INTO `adm_user` VALUES (1, 'nn@mail.co', 'Lucy', '11', 't', '09990', 'Jakarta', NULL, 'f', '1986-05-03 09:34:26', 1, 'kacang', '2021-05-28 09:34:51');
INSERT INTO `adm_user` VALUES (2, 'na@mail.com', 'Ace', '3', 's', '2131', 'Jakarta', NULL, 'm', '1986-05-03 09:34:26', 3, 'oren', '2021-05-28 09:34:51');
INSERT INTO `adm_user` VALUES (3, 'na@mail.com', 'Na', '4', 's', '2131', 'Jakarta', NULL, 'm', '1986-05-03 09:34:26', 3, 'oren', '2021-05-28 09:34:51');

-- ----------------------------
-- Table structure for cls_assignment
-- ----------------------------
DROP TABLE IF EXISTS `cls_assignment`;
CREATE TABLE `cls_assignment`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cls_id` int(11) NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `type` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `due_date` datetime(0) NULL DEFAULT NULL,
  `attachment` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT NULL,
  `creator_id` int(11) NULL DEFAULT NULL,
  `creator_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for cls_info
-- ----------------------------
DROP TABLE IF EXISTS `cls_info`;
CREATE TABLE `cls_info`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cls_id` int(11) NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `attachment` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT NULL,
  `creator_id` int(11) NULL DEFAULT NULL,
  `creator_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cls_info
-- ----------------------------
INSERT INTO `cls_info` VALUES (1, 1, 'mat1', 'desc sac', 'kontrak.xlsx', '2021-05-28 09:36:43', 1, 'Ana');
INSERT INTO `cls_info` VALUES (2, 1, 'GAAA', 'akaka', 'Doc1.pdf', '2021-05-28 10:04:02', 1, 'Ana');

-- ----------------------------
-- Table structure for cls_main
-- ----------------------------
DROP TABLE IF EXISTS `cls_main`;
CREATE TABLE `cls_main`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `owner_id` int(11) NULL DEFAULT NULL,
  `owner_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cls_main
-- ----------------------------
INSERT INTO `cls_main` VALUES (1, 'xafff', 'E-Learning', 'E-Learning Malam', 1, 'Lucy', '2021-05-19 09:35:02');
INSERT INTO `cls_main` VALUES (2, 'xafff', '1', 'E-Learning Malam', 1, 'Lucy', '2021-05-19 09:35:02');
INSERT INTO `cls_main` VALUES (3, 'xafff', '33', 'E-Learning Malam', 1, 'Lucy', '2021-05-19 09:35:02');
INSERT INTO `cls_main` VALUES (4, 'xafff', '5', 'E-Learning Malam', 1, 'Lucy', '2021-05-19 09:35:02');
INSERT INTO `cls_main` VALUES (5, 'xafff', '65', 'E-Learning Malam', 1, 'Lucy', '2021-05-19 09:35:02');
INSERT INTO `cls_main` VALUES (6, 'xafff', '2', 'E-Learning Malam', 1, 'Lucy', '2021-05-19 09:35:02');
INSERT INTO `cls_main` VALUES (7, 'xafff', 'f', 'E-Learning Malam', 1, 'Lucy', '2021-05-19 09:35:02');
INSERT INTO `cls_main` VALUES (8, 'xafff', '234', 'E-Learning Malam', 1, 'Lucy', '2021-05-19 09:35:02');
INSERT INTO `cls_main` VALUES (9, 'xafff', 's34', 'E-Learning Malam', 1, 'Lucy', '2021-05-19 09:35:02');
INSERT INTO `cls_main` VALUES (10, 'xafff', '324', 'E-Learning Malam', 1, 'Lucy', '2021-05-19 09:35:02');
INSERT INTO `cls_main` VALUES (11, 'xafff', '555', 'E-Learning Malam', 1, 'Lucy', '2021-05-19 09:35:02');

-- ----------------------------
-- Table structure for cls_participant
-- ----------------------------
DROP TABLE IF EXISTS `cls_participant`;
CREATE TABLE `cls_participant`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cls_id` int(11) NOT NULL,
  `student_id` int(11) NULL DEFAULT NULL,
  `join_date` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cls_participant
-- ----------------------------
INSERT INTO `cls_participant` VALUES (1, 1, 2, '2021-05-18 09:43:18');

-- ----------------------------
-- Table structure for cls_subject
-- ----------------------------
DROP TABLE IF EXISTS `cls_subject`;
CREATE TABLE `cls_subject`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cls_id` int(11) NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `attachment` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT NULL,
  `creator_id` int(11) NULL DEFAULT NULL,
  `creator_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cls_subject
-- ----------------------------
INSERT INTO `cls_subject` VALUES (1, 1, 'mat1', 'desc sac', 'kontrak.xlsx', '2021-05-28 09:36:43', 1, 'Ana');
INSERT INTO `cls_subject` VALUES (2, 1, 'GAAA', 'akaka', 'Doc1.pdf', '2021-05-28 10:04:02', 1, 'Ana');

-- ----------------------------
-- View structure for vw_cls_topic
-- ----------------------------
DROP VIEW IF EXISTS `vw_cls_topic`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `vw_cls_topic` AS SELECT
	id,
	cls_id,
	title,
	"desc",
	attachment,
	created_date,
	creator_name,
	'Materi' AS type,
	'fa-book' as icon,
	NULL AS due_date 
FROM
	cls_subject 
	UNION
	SELECT
	id,
	cls_id,
	title,
	"desc",
	attachment,
	created_date,
	creator_name,
	'Info' AS type,
	'fa-info-circle' as icon,
	NULL AS due_date 
FROM
	cls_info UNION
SELECT
	id,
	cls_id,
	title,
	"desc",
	attachment,
	created_date,
	creator_name,
	'Tugas' AS type,
	'fa-clipboard-list' as icon,
	due_date 
FROM
	cls_assignment ;

SET FOREIGN_KEY_CHECKS = 1;
