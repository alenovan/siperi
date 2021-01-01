/*
 Navicat Premium Data Transfer

 Source Server         : Mamp Local
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:8888
 Source Schema         : db_raport

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 01/01/2021 18:49:09
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_agama
-- ----------------------------
DROP TABLE IF EXISTS `tb_agama`;
CREATE TABLE `tb_agama` (
  `idAgama` int(11) NOT NULL AUTO_INCREMENT,
  `namaAgama` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`idAgama`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_agama
-- ----------------------------
BEGIN;
INSERT INTO `tb_agama` VALUES (1, 'Islam');
INSERT INTO `tb_agama` VALUES (2, 'Kristen');
INSERT INTO `tb_agama` VALUES (3, 'Katholik');
INSERT INTO `tb_agama` VALUES (4, 'Budha');
INSERT INTO `tb_agama` VALUES (5, 'Hindu');
INSERT INTO `tb_agama` VALUES (6, 'Konghucu');
COMMIT;

-- ----------------------------
-- Table structure for tb_bidang
-- ----------------------------
DROP TABLE IF EXISTS `tb_bidang`;
CREATE TABLE `tb_bidang` (
  `idBidang` int(11) NOT NULL AUTO_INCREMENT,
  `kodeBidang` varchar(50) NOT NULL DEFAULT '',
  `namaBidang` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`idBidang`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_bidang
-- ----------------------------
BEGIN;
INSERT INTO `tb_bidang` VALUES (1, 'TIK', 'Teknologi Informasi Komunikasi');
INSERT INTO `tb_bidang` VALUES (2, 'Elektro', 'Elektronika');
INSERT INTO `tb_bidang` VALUES (3, 'Otomotif', 'Otomotif');
INSERT INTO `tb_bidang` VALUES (4, 'Mesin', 'Mesin');
COMMIT;

-- ----------------------------
-- Table structure for tb_ekstrakulikuler
-- ----------------------------
DROP TABLE IF EXISTS `tb_ekstrakulikuler`;
CREATE TABLE `tb_ekstrakulikuler` (
  `idEkstra` int(11) NOT NULL AUTO_INCREMENT,
  `namaEkstra` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`idEkstra`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_ekstrakulikuler
-- ----------------------------
BEGIN;
INSERT INTO `tb_ekstrakulikuler` VALUES (1, 'Basket');
INSERT INTO `tb_ekstrakulikuler` VALUES (3, 'Sepak Bola');
INSERT INTO `tb_ekstrakulikuler` VALUES (4, 'Pramuka');
COMMIT;

-- ----------------------------
-- Table structure for tb_guru
-- ----------------------------
DROP TABLE IF EXISTS `tb_guru`;
CREATE TABLE `tb_guru` (
  `idGuru` int(11) NOT NULL AUTO_INCREMENT,
  `nip` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL DEFAULT '',
  `namaGuru` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `tempatLahir` varchar(100) NOT NULL DEFAULT '',
  `tglLahir` date NOT NULL DEFAULT '1900-01-01',
  `jenisKelamin` int(11) NOT NULL DEFAULT '0',
  `agama` int(11) NOT NULL DEFAULT '0',
  `alamat` text NOT NULL,
  `noTelp` varchar(12) NOT NULL DEFAULT '0',
  `foto` varchar(255) NOT NULL DEFAULT '',
  `isActive` int(11) NOT NULL DEFAULT '0',
  `createdDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdBy` int(11) NOT NULL DEFAULT '0',
  `updatedDate` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
  `updatedBy` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idGuru`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_guru
-- ----------------------------
BEGIN;
INSERT INTO `tb_guru` VALUES (1, 2456, 'rpadannyzulfikar@gmail.com', 'Danny Zulfikar', '482c811da5d5b4bc6d497ffa98491e38', 'Malang', '1989-11-09', 1, 1, '', '08944454555', 'Photo by Amelia Andani on November.jpg', 1, '2020-11-29 17:20:51', 1, '2020-11-29 00:00:00', 1);
INSERT INTO `tb_guru` VALUES (2, 4555, '', 'Okky Karina', '482c811da5d5b4bc6d497ffa98491e38', '', '2020-11-29', 0, 0, '', '0', '', 1, '2020-11-29 17:22:00', 1, '1900-01-01 00:00:00', 0);
COMMIT;

-- ----------------------------
-- Table structure for tb_kelas
-- ----------------------------
DROP TABLE IF EXISTS `tb_kelas`;
CREATE TABLE `tb_kelas` (
  `idKelas` int(11) NOT NULL AUTO_INCREMENT,
  `idBidang` int(11) NOT NULL DEFAULT '0',
  `idProgram` int(11) NOT NULL DEFAULT '0',
  `tingkatKelas` int(11) NOT NULL DEFAULT '0',
  `alphabetKelas` varchar(10) NOT NULL DEFAULT '',
  `namaKelas` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`idKelas`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_kelas
-- ----------------------------
BEGIN;
INSERT INTO `tb_kelas` VALUES (1, 1, 1, 11, 'B', 'XI-A');
INSERT INTO `tb_kelas` VALUES (2, 1, 1, 12, 'C', 'XII-C');
INSERT INTO `tb_kelas` VALUES (3, 1, 2, 10, 'C', 'XMM-C');
INSERT INTO `tb_kelas` VALUES (4, 4, 4, 11, 'B', 'XITL-B');
INSERT INTO `tb_kelas` VALUES (5, 4, 3, 11, 'A', 'XITP-A');
COMMIT;

-- ----------------------------
-- Table structure for tb_kelastmp
-- ----------------------------
DROP TABLE IF EXISTS `tb_kelastmp`;
CREATE TABLE `tb_kelastmp` (
  `recID` int(11) NOT NULL AUTO_INCREMENT,
  `idKelas` int(11) NOT NULL DEFAULT '0',
  `idSiswa` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`recID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_kelastmp
-- ----------------------------
BEGIN;
INSERT INTO `tb_kelastmp` VALUES (4, 5, 3);
COMMIT;

-- ----------------------------
-- Table structure for tb_mapel
-- ----------------------------
DROP TABLE IF EXISTS `tb_mapel`;
CREATE TABLE `tb_mapel` (
  `idMapel` int(11) NOT NULL AUTO_INCREMENT,
  `kodeMapel` varchar(50) NOT NULL DEFAULT '',
  `namaMapel` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`idMapel`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_mapel
-- ----------------------------
BEGIN;
INSERT INTO `tb_mapel` VALUES (1, 'MTK', 'Matematika');
INSERT INTO `tb_mapel` VALUES (3, 'BIN', 'Bahasa Indonesia');
COMMIT;

-- ----------------------------
-- Table structure for tb_mapeltmp
-- ----------------------------
DROP TABLE IF EXISTS `tb_mapeltmp`;
CREATE TABLE `tb_mapeltmp` (
  `recID` int(11) NOT NULL AUTO_INCREMENT,
  `idMapel` int(11) NOT NULL DEFAULT '0',
  `idGuru` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`recID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_mapeltmp
-- ----------------------------
BEGIN;
INSERT INTO `tb_mapeltmp` VALUES (11, 3, 11);
INSERT INTO `tb_mapeltmp` VALUES (16, 1, 8);
COMMIT;

-- ----------------------------
-- Table structure for tb_pekerjaan
-- ----------------------------
DROP TABLE IF EXISTS `tb_pekerjaan`;
CREATE TABLE `tb_pekerjaan` (
  `idPekerjaan` int(11) NOT NULL AUTO_INCREMENT,
  `namaPekerjaan` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`idPekerjaan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_pekerjaan
-- ----------------------------
BEGIN;
INSERT INTO `tb_pekerjaan` VALUES (1, 'PNS');
INSERT INTO `tb_pekerjaan` VALUES (2, 'Wiraswasta');
INSERT INTO `tb_pekerjaan` VALUES (3, 'Wirausaha');
INSERT INTO `tb_pekerjaan` VALUES (4, 'Karyawan Swasta');
INSERT INTO `tb_pekerjaan` VALUES (5, 'Ibu Rumah Tangga');
COMMIT;

-- ----------------------------
-- Table structure for tb_program
-- ----------------------------
DROP TABLE IF EXISTS `tb_program`;
CREATE TABLE `tb_program` (
  `idProgram` int(11) NOT NULL AUTO_INCREMENT,
  `idBidang` int(11) NOT NULL DEFAULT '0',
  `kodeProgram` varchar(50) NOT NULL DEFAULT '',
  `namaProgram` varchar(266) NOT NULL DEFAULT '',
  PRIMARY KEY (`idProgram`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_program
-- ----------------------------
BEGIN;
INSERT INTO `tb_program` VALUES (1, 1, 'RPL', 'Rekayasa Perangkat Lunak');
INSERT INTO `tb_program` VALUES (2, 1, 'MM', 'Multimedia');
INSERT INTO `tb_program` VALUES (3, 4, 'TP', 'Teknik Permesinan');
INSERT INTO `tb_program` VALUES (4, 4, 'TL', 'Teknik Pengelasan');
COMMIT;

-- ----------------------------
-- Table structure for tb_semester
-- ----------------------------
DROP TABLE IF EXISTS `tb_semester`;
CREATE TABLE `tb_semester` (
  `idSemester` int(11) NOT NULL AUTO_INCREMENT,
  `namaSemester` varchar(255) NOT NULL DEFAULT '',
  `isActive` int(11) NOT NULL DEFAULT '0',
  `createdDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdBy` int(11) NOT NULL DEFAULT '0',
  `updatedDate` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
  `updatedBy` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idSemester`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_semester
-- ----------------------------
BEGIN;
INSERT INTO `tb_semester` VALUES (1, '2020/2021', 1, '2020-11-29 15:51:43', 1, '1900-01-01 00:00:00', 0);
INSERT INTO `tb_semester` VALUES (2, '2021/2022', 0, '2020-11-29 15:52:00', 1, '1900-01-01 00:00:00', 0);
INSERT INTO `tb_semester` VALUES (3, '2022/2023', 0, '2020-11-29 15:54:28', 1, '1900-01-01 00:00:00', 0);
COMMIT;

-- ----------------------------
-- Table structure for tb_siswa
-- ----------------------------
DROP TABLE IF EXISTS `tb_siswa`;
CREATE TABLE `tb_siswa` (
  `idSiswa` int(11) NOT NULL AUTO_INCREMENT,
  `nisn` varchar(20) NOT NULL DEFAULT '0',
  `nis` varchar(12) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL DEFAULT '',
  `namaSiswa` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `jenisKelamin` int(11) NOT NULL DEFAULT '0',
  `tempatLahir` varchar(50) NOT NULL DEFAULT '',
  `tglLahir` date NOT NULL DEFAULT '1900-01-01',
  `agama` varchar(50) NOT NULL DEFAULT '',
  `alamat` text NOT NULL,
  `noTelp` varchar(12) NOT NULL DEFAULT '0',
  `namaAyah` varchar(255) NOT NULL DEFAULT '',
  `namaIbu` varchar(255) NOT NULL DEFAULT '',
  `alamatOrtu` text NOT NULL,
  `noTelpOrtu` varchar(12) NOT NULL DEFAULT '0',
  `pekerjaanAyah` varchar(255) NOT NULL DEFAULT '',
  `pekerjaanIbu` varchar(255) NOT NULL DEFAULT '',
  `foto` varchar(255) NOT NULL DEFAULT '',
  `kelas` int(11) NOT NULL DEFAULT '0',
  `bidang` int(11) NOT NULL DEFAULT '0',
  `program` int(11) NOT NULL DEFAULT '0',
  `isActive` int(11) NOT NULL DEFAULT '0',
  `createdDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdBy` int(11) NOT NULL DEFAULT '0',
  `updatedDate` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
  `updatedBy` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idSiswa`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_siswa
-- ----------------------------
BEGIN;
INSERT INTO `tb_siswa` VALUES (1, '9998710777', '0001', 'okkaindra@gmail.com', 'Okka Indra', '482c811da5d5b4bc6d497ffa98491e38', 1, 'Malang', '2006-06-28', '1', 'JL Mawar 10 Malang', '0849344344', 'Test', 'Ibu', 'JL Mawar 10 Malang', '0848494444', '1', '5', 'test.jpg', 10, 1, 1, 1, '2020-11-28 18:10:51', 1, '2020-11-29 00:00:00', 1);
INSERT INTO `tb_siswa` VALUES (2, '9999827333', '0002', '', 'Afani Firmansyah', '482c811da5d5b4bc6d497ffa98491e38', 0, '', '2020-11-28', '', '', '', '', '', 'alamatOrtu', '', '', '', '', 10, 1, 1, 1, '2020-11-28 19:05:42', 1, '2020-11-29 00:00:00', 1);
INSERT INTO `tb_siswa` VALUES (3, '9998939444', '0003', '', 'Widiati Putri', '482c811da5d5b4bc6d497ffa98491e38', 0, '', '2020-11-29', '', '', '', '', '', '', '', '', '', '', 11, 4, 3, 1, '2020-11-29 16:35:21', 1, '2020-11-29 00:00:00', 1);
COMMIT;

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `role` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
BEGIN;
INSERT INTO `tb_user` VALUES (1, 'Administrator SMK', '', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);
INSERT INTO `tb_user` VALUES (2, 'Danny Zulfikar', '', 'mcheal@gmail.com', 'fanniple', 'cc03e747a6afbbcbf8be7668acfebee5', 2);
INSERT INTO `tb_user` VALUES (3, 'Micheal Dede', '', 'mchealtest@gmail.com', 'test123', 'cc03e747a6afbbcbf8be7668acfebee5', 2);
INSERT INTO `tb_user` VALUES (4, 'Meisya Paramita', '', 'meisya@gmail.com', 'dragonulo10', '482c811da5d5b4bc6d497ffa98491e38', 2);
INSERT INTO `tb_user` VALUES (5, 'Effendi Akbar', '', 'effendiakbar@gmail.com', 'testdanny', '482c811da5d5b4bc6d497ffa98491e38', 1);
INSERT INTO `tb_user` VALUES (6, 'test test', '', 'mcheal@gmail.com', 'testtt', '7947b142751e6bc22f6771780a682675', 1);
COMMIT;

-- ----------------------------
-- Table structure for tb_walikelas
-- ----------------------------
DROP TABLE IF EXISTS `tb_walikelas`;
CREATE TABLE `tb_walikelas` (
  `recID` int(11) NOT NULL AUTO_INCREMENT,
  `idKelas` int(11) NOT NULL DEFAULT '0',
  `idGuru` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`recID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_walikelas
-- ----------------------------
BEGIN;
INSERT INTO `tb_walikelas` VALUES (5, 1, 4);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
