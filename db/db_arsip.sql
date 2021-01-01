/*
 Navicat Premium Data Transfer

 Source Server         : Mamp Local
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:8888
 Source Schema         : db_arsip

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 01/01/2021 18:48:55
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_arsip_keluar
-- ----------------------------
DROP TABLE IF EXISTS `tb_arsip_keluar`;
CREATE TABLE `tb_arsip_keluar` (
  `idArsip` int(11) NOT NULL AUTO_INCREMENT,
  `noArsip` varchar(255) NOT NULL DEFAULT '',
  `asalSurat` varchar(255) NOT NULL,
  `tglPenciptaan` date NOT NULL DEFAULT '1900-01-01',
  `kepada` varchar(255) NOT NULL,
  `keterangan` int(11) NOT NULL DEFAULT '0',
  `lampiran` varchar(255) NOT NULL,
  `perihal` text NOT NULL,
  `idKode` int(11) NOT NULL DEFAULT '0',
  `idLokasi` int(11) NOT NULL DEFAULT '0',
  `tglPenyimpanan` date NOT NULL DEFAULT '1900-01-01',
  `keteranganAsli` int(11) NOT NULL DEFAULT '0',
  `jumlah` int(11) NOT NULL DEFAULT '0',
  `idJenis` int(11) NOT NULL DEFAULT '0',
  `isDeleted` int(11) NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `updated_date` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `deleted_date` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
  `deleted_by` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idArsip`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_arsip_keluar
-- ----------------------------
BEGIN;
INSERT INTO `tb_arsip_keluar` VALUES (1, '2134324', 'test', '2020-12-08', 'test', 4, 'coba.jpg', 'test', 2, 1, '2020-12-24', 2, 4, 1, 0, '2020-12-08 15:57:05', 1, '2020-12-11 20:39:07', 1, '1900-01-01 00:00:00', 0);
INSERT INTO `tb_arsip_keluar` VALUES (2, '2134324', 'test', '2020-12-08', 'test', 1, 'coba.jpg', 'test', 0, 0, '0000-00-00', 0, 0, 0, 1, '2020-12-08 22:59:58', 1, '1900-01-01 00:00:00', 0, '2020-12-08 23:07:43', 1);
INSERT INTO `tb_arsip_keluar` VALUES (3, 'test123Arsip', 'test asal', '2020-12-08', 'Presiden RI', 3, 'coba.jpg', 'test', 0, 0, '0000-00-00', 0, 0, 0, 0, '2020-12-09 01:01:14', 1, '1900-01-01 00:00:00', 0, '1900-01-01 00:00:00', 0);
INSERT INTO `tb_arsip_keluar` VALUES (4, '23526test', 'test', '2020-12-09', 'test', 3, 'image 3.png', 'test', 0, 0, '0000-00-00', 0, 0, 0, 0, '2020-12-09 01:01:42', 1, '1900-01-01 00:00:00', 0, '1900-01-01 00:00:00', 0);
COMMIT;

-- ----------------------------
-- Table structure for tb_arsip_masuk
-- ----------------------------
DROP TABLE IF EXISTS `tb_arsip_masuk`;
CREATE TABLE `tb_arsip_masuk` (
  `idArsip` int(11) NOT NULL AUTO_INCREMENT,
  `noArsip` varchar(255) NOT NULL DEFAULT '',
  `asalSurat` varchar(255) NOT NULL,
  `tglPenciptaan` date NOT NULL DEFAULT '1900-01-01',
  `kepada` varchar(255) NOT NULL,
  `keterangan` int(11) NOT NULL DEFAULT '0',
  `lampiran` varchar(255) NOT NULL,
  `perihal` text NOT NULL,
  `idKode` int(11) NOT NULL DEFAULT '0',
  `idLokasi` int(11) NOT NULL DEFAULT '0',
  `tglPenyimpanan` date NOT NULL DEFAULT '1900-01-01',
  `keteranganAsli` int(11) NOT NULL DEFAULT '0',
  `jumlah` int(11) NOT NULL DEFAULT '0',
  `idJenis` int(11) NOT NULL DEFAULT '0',
  `isDeleted` int(11) NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `updated_date` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `deleted_date` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
  `deleted_by` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idArsip`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_arsip_masuk
-- ----------------------------
BEGIN;
INSERT INTO `tb_arsip_masuk` VALUES (1, '23526', 'test asal', '2020-12-09', 'Presiden RI', 4, 'image 3.png', 'test perihal', 2, 1, '2020-12-26', 2, 2, 1, 0, '2020-12-09 00:14:17', 1, '1900-01-01 00:00:00', 0, '1900-01-01 00:00:00', 0);
COMMIT;

-- ----------------------------
-- Table structure for tb_jenis_media
-- ----------------------------
DROP TABLE IF EXISTS `tb_jenis_media`;
CREATE TABLE `tb_jenis_media` (
  `id_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_jenis_media
-- ----------------------------
BEGIN;
INSERT INTO `tb_jenis_media` VALUES (1, 'test media');
COMMIT;

-- ----------------------------
-- Table structure for tb_keterangan
-- ----------------------------
DROP TABLE IF EXISTS `tb_keterangan`;
CREATE TABLE `tb_keterangan` (
  `id_keterangan` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan_name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_keterangan`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_keterangan
-- ----------------------------
BEGIN;
INSERT INTO `tb_keterangan` VALUES (3, 'Penting');
INSERT INTO `tb_keterangan` VALUES (4, 'Umum');
INSERT INTO `tb_keterangan` VALUES (5, 'Biasa');
COMMIT;

-- ----------------------------
-- Table structure for tb_keteranganAsli
-- ----------------------------
DROP TABLE IF EXISTS `tb_keteranganAsli`;
CREATE TABLE `tb_keteranganAsli` (
  `id_keteranganAsli` int(11) NOT NULL AUTO_INCREMENT,
  `keteranganAsli_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_keteranganAsli`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_keteranganAsli
-- ----------------------------
BEGIN;
INSERT INTO `tb_keteranganAsli` VALUES (2, 'Asli');
INSERT INTO `tb_keteranganAsli` VALUES (3, 'Duplikat');
COMMIT;

-- ----------------------------
-- Table structure for tb_kode
-- ----------------------------
DROP TABLE IF EXISTS `tb_kode`;
CREATE TABLE `tb_kode` (
  `id_kode` int(11) NOT NULL AUTO_INCREMENT,
  `kode_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kode`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_kode
-- ----------------------------
BEGIN;
INSERT INTO `tb_kode` VALUES (2, 'test kode');
COMMIT;

-- ----------------------------
-- Table structure for tb_lokasi
-- ----------------------------
DROP TABLE IF EXISTS `tb_lokasi`;
CREATE TABLE `tb_lokasi` (
  `id_lokasi` int(11) NOT NULL AUTO_INCREMENT,
  `lokasi_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_lokasi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_lokasi
-- ----------------------------
BEGIN;
INSERT INTO `tb_lokasi` VALUES (1, 'test lokasi');
COMMIT;

-- ----------------------------
-- Table structure for tb_role
-- ----------------------------
DROP TABLE IF EXISTS `tb_role`;
CREATE TABLE `tb_role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_role
-- ----------------------------
BEGIN;
INSERT INTO `tb_role` VALUES (1, 'Admin');
INSERT INTO `tb_role` VALUES (2, 'User');
COMMIT;

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `role` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
BEGIN;
INSERT INTO `tb_user` VALUES (1, 'Administrator Danny', 'bacgorund_header.png', 'admin@gmail.com', 'admin', '482c811da5d5b4bc6d497ffa98491e38', 1);
INSERT INTO `tb_user` VALUES (2, 'Danny Zulfikar', 'Layer x0020 1.png', 'mcheal@gmail.com', 'fanniple', '482c811da5d5b4bc6d497ffa98491e38', 1);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
