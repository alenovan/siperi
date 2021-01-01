-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Nov 2020 pada 11.26
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_raport`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_agama`
--

CREATE TABLE `tb_agama` (
  `idAgama` int(11) NOT NULL,
  `namaAgama` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_agama`
--

INSERT INTO `tb_agama` (`idAgama`, `namaAgama`) VALUES
(1, 'Islam'),
(2, 'Kristen'),
(3, 'Katholik'),
(4, 'Budha'),
(5, 'Hindu'),
(6, 'Konghucu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bidang`
--

CREATE TABLE `tb_bidang` (
  `idBidang` int(11) NOT NULL,
  `kodeBidang` varchar(50) NOT NULL DEFAULT '',
  `namaBidang` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_bidang`
--

INSERT INTO `tb_bidang` (`idBidang`, `kodeBidang`, `namaBidang`) VALUES
(1, 'TIK', 'Teknologi Informasi Komunikasi'),
(2, 'Elektro', 'Elektronika'),
(3, 'Otomotif', 'Otomotif'),
(4, 'Mesin', 'Mesin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ekstrakulikuler`
--

CREATE TABLE `tb_ekstrakulikuler` (
  `idEkstra` int(11) NOT NULL,
  `namaEkstra` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_ekstrakulikuler`
--

INSERT INTO `tb_ekstrakulikuler` (`idEkstra`, `namaEkstra`) VALUES
(1, 'Basket'),
(3, 'Sepak Bola'),
(4, 'Pramuka');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru`
--

CREATE TABLE `tb_guru` (
  `idGuru` int(11) NOT NULL,
  `nip` int(11) NOT NULL DEFAULT 0,
  `email` varchar(255) NOT NULL DEFAULT '',
  `namaGuru` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `tempatLahir` varchar(100) NOT NULL DEFAULT '',
  `tglLahir` date NOT NULL DEFAULT '1900-01-01',
  `jenisKelamin` int(11) NOT NULL DEFAULT 0,
  `agama` int(11) NOT NULL DEFAULT 0,
  `alamat` text NOT NULL DEFAULT '',
  `noTelp` varchar(12) NOT NULL DEFAULT '0',
  `foto` varchar(255) NOT NULL DEFAULT '',
  `isActive` int(11) NOT NULL DEFAULT 0,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp(),
  `createdBy` int(11) NOT NULL DEFAULT 0,
  `updatedDate` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
  `updatedBy` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`idGuru`, `nip`, `email`, `namaGuru`, `password`, `tempatLahir`, `tglLahir`, `jenisKelamin`, `agama`, `alamat`, `noTelp`, `foto`, `isActive`, `createdDate`, `createdBy`, `updatedDate`, `updatedBy`) VALUES
(1, 2456, 'rpadannyzulfikar@gmail.com', 'Danny Zulfikar', '482c811da5d5b4bc6d497ffa98491e38', 'Malang', '1989-11-09', 1, 1, '', '08944454555', 'Photo by Amelia Andani on November.jpg', 1, '2020-11-29 17:20:51', 1, '2020-11-29 00:00:00', 1),
(2, 4555, '', 'Okky Karina', '482c811da5d5b4bc6d497ffa98491e38', '', '2020-11-29', 0, 0, '', '0', '', 1, '2020-11-29 17:22:00', 1, '1900-01-01 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `idKelas` int(11) NOT NULL,
  `idBidang` int(11) NOT NULL DEFAULT 0,
  `idProgram` int(11) NOT NULL DEFAULT 0,
  `tingkatKelas` int(11) NOT NULL DEFAULT 0,
  `alphabetKelas` varchar(10) NOT NULL DEFAULT '',
  `namaKelas` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`idKelas`, `idBidang`, `idProgram`, `tingkatKelas`, `alphabetKelas`, `namaKelas`) VALUES
(1, 1, 1, 11, 'B', 'XI-A'),
(2, 1, 1, 12, 'C', 'XII-C'),
(3, 1, 2, 10, 'C', 'XMM-C'),
(4, 4, 4, 11, 'B', 'XITL-B'),
(5, 4, 3, 11, 'A', 'XITP-A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelastmp`
--

CREATE TABLE `tb_kelastmp` (
  `recID` int(11) NOT NULL,
  `idKelas` int(11) NOT NULL DEFAULT 0,
  `idSiswa` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kelastmp`
--

INSERT INTO `tb_kelastmp` (`recID`, `idKelas`, `idSiswa`) VALUES
(4, 5, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `idMapel` int(11) NOT NULL,
  `kodeMapel` varchar(50) NOT NULL DEFAULT '',
  `namaMapel` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mapel`
--

INSERT INTO `tb_mapel` (`idMapel`, `kodeMapel`, `namaMapel`) VALUES
(1, 'MTK', 'Matematika'),
(3, 'BIN', 'Bahasa Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mapeltmp`
--

CREATE TABLE `tb_mapeltmp` (
  `recID` int(11) NOT NULL,
  `idMapel` int(11) NOT NULL DEFAULT 0,
  `idGuru` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mapeltmp`
--

INSERT INTO `tb_mapeltmp` (`recID`, `idMapel`, `idGuru`) VALUES
(11, 3, 11),
(16, 1, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pekerjaan`
--

CREATE TABLE `tb_pekerjaan` (
  `idPekerjaan` int(11) NOT NULL,
  `namaPekerjaan` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pekerjaan`
--

INSERT INTO `tb_pekerjaan` (`idPekerjaan`, `namaPekerjaan`) VALUES
(1, 'PNS'),
(2, 'Wiraswasta'),
(3, 'Wirausaha'),
(4, 'Karyawan Swasta'),
(5, 'Ibu Rumah Tangga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_program`
--

CREATE TABLE `tb_program` (
  `idProgram` int(11) NOT NULL,
  `idBidang` int(11) NOT NULL DEFAULT 0,
  `kodeProgram` varchar(50) NOT NULL DEFAULT '',
  `namaProgram` varchar(266) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_program`
--

INSERT INTO `tb_program` (`idProgram`, `idBidang`, `kodeProgram`, `namaProgram`) VALUES
(1, 1, 'RPL', 'Rekayasa Perangkat Lunak'),
(2, 1, 'MM', 'Multimedia'),
(3, 4, 'TP', 'Teknik Permesinan'),
(4, 4, 'TL', 'Teknik Pengelasan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_semester`
--

CREATE TABLE `tb_semester` (
  `idSemester` int(11) NOT NULL,
  `namaSemester` varchar(255) NOT NULL DEFAULT '',
  `isActive` int(11) NOT NULL DEFAULT 0,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp(),
  `createdBy` int(11) NOT NULL DEFAULT 0,
  `updatedDate` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
  `updatedBy` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_semester`
--

INSERT INTO `tb_semester` (`idSemester`, `namaSemester`, `isActive`, `createdDate`, `createdBy`, `updatedDate`, `updatedBy`) VALUES
(1, '2020/2021', 1, '2020-11-29 15:51:43', 1, '1900-01-01 00:00:00', 0),
(2, '2021/2022', 0, '2020-11-29 15:52:00', 1, '1900-01-01 00:00:00', 0),
(3, '2022/2023', 0, '2020-11-29 15:54:28', 1, '1900-01-01 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `idSiswa` int(11) NOT NULL,
  `nisn` varchar(20) NOT NULL DEFAULT '0',
  `nis` varchar(12) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL DEFAULT '',
  `namaSiswa` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `jenisKelamin` int(11) NOT NULL DEFAULT 0,
  `tempatLahir` varchar(50) NOT NULL DEFAULT '',
  `tglLahir` date NOT NULL DEFAULT '1900-01-01',
  `agama` varchar(50) NOT NULL DEFAULT '',
  `alamat` text NOT NULL DEFAULT '',
  `noTelp` varchar(12) NOT NULL DEFAULT '0',
  `namaAyah` varchar(255) NOT NULL DEFAULT '',
  `namaIbu` varchar(255) NOT NULL DEFAULT '',
  `alamatOrtu` text NOT NULL DEFAULT '',
  `noTelpOrtu` varchar(12) NOT NULL DEFAULT '0',
  `pekerjaanAyah` varchar(255) NOT NULL DEFAULT '',
  `pekerjaanIbu` varchar(255) NOT NULL DEFAULT '',
  `foto` varchar(255) NOT NULL DEFAULT '',
  `kelas` int(11) NOT NULL DEFAULT 0,
  `bidang` int(11) NOT NULL DEFAULT 0,
  `program` int(11) NOT NULL DEFAULT 0,
  `isActive` int(11) NOT NULL DEFAULT 0,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp(),
  `createdBy` int(11) NOT NULL DEFAULT 0,
  `updatedDate` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
  `updatedBy` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`idSiswa`, `nisn`, `nis`, `email`, `namaSiswa`, `password`, `jenisKelamin`, `tempatLahir`, `tglLahir`, `agama`, `alamat`, `noTelp`, `namaAyah`, `namaIbu`, `alamatOrtu`, `noTelpOrtu`, `pekerjaanAyah`, `pekerjaanIbu`, `foto`, `kelas`, `bidang`, `program`, `isActive`, `createdDate`, `createdBy`, `updatedDate`, `updatedBy`) VALUES
(1, '9998710777', '0001', 'okkaindra@gmail.com', 'Okka Indra', '482c811da5d5b4bc6d497ffa98491e38', 1, 'Malang', '2006-06-28', '1', 'JL Mawar 10 Malang', '0849344344', 'Test', 'Ibu', 'JL Mawar 10 Malang', '0848494444', '1', '5', 'test.jpg', 10, 1, 1, 1, '2020-11-28 18:10:51', 1, '2020-11-29 00:00:00', 1),
(2, '9999827333', '0002', '', 'Afani Firmansyah', '482c811da5d5b4bc6d497ffa98491e38', 0, '', '2020-11-28', '', '', '', '', '', 'alamatOrtu', '', '', '', '', 10, 1, 1, 1, '2020-11-28 19:05:42', 1, '2020-11-29 00:00:00', 1),
(3, '9998939444', '0003', '', 'Widiati Putri', '482c811da5d5b4bc6d497ffa98491e38', 0, '', '2020-11-29', '', '', '', '', '', '', '', '', '', '', 11, 4, 3, 1, '2020-11-29 16:35:21', 1, '2020-11-29 00:00:00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `idUser` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`idUser`, `nama`, `image`, `email`, `username`, `password`, `role`) VALUES
(1, 'Administrator SMK', '', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'Danny Zulfikar', '', 'mcheal@gmail.com', 'fanniple', 'cc03e747a6afbbcbf8be7668acfebee5', 2),
(3, 'Micheal Dede', '', 'mchealtest@gmail.com', 'test123', 'cc03e747a6afbbcbf8be7668acfebee5', 2),
(4, 'Meisya Paramita', '', 'meisya@gmail.com', 'dragonulo10', '482c811da5d5b4bc6d497ffa98491e38', 2),
(5, 'Effendi Akbar', '', 'effendiakbar@gmail.com', 'testdanny', '482c811da5d5b4bc6d497ffa98491e38', 1),
(6, 'test test', '', 'mcheal@gmail.com', 'testtt', '7947b142751e6bc22f6771780a682675', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_walikelas`
--

CREATE TABLE `tb_walikelas` (
  `recID` int(11) NOT NULL,
  `idKelas` int(11) NOT NULL DEFAULT 0,
  `idGuru` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_walikelas`
--

INSERT INTO `tb_walikelas` (`recID`, `idKelas`, `idGuru`) VALUES
(5, 1, 4);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_agama`
--
ALTER TABLE `tb_agama`
  ADD PRIMARY KEY (`idAgama`);

--
-- Indeks untuk tabel `tb_bidang`
--
ALTER TABLE `tb_bidang`
  ADD PRIMARY KEY (`idBidang`);

--
-- Indeks untuk tabel `tb_ekstrakulikuler`
--
ALTER TABLE `tb_ekstrakulikuler`
  ADD PRIMARY KEY (`idEkstra`);

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`idGuru`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`idKelas`);

--
-- Indeks untuk tabel `tb_kelastmp`
--
ALTER TABLE `tb_kelastmp`
  ADD PRIMARY KEY (`recID`);

--
-- Indeks untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`idMapel`);

--
-- Indeks untuk tabel `tb_mapeltmp`
--
ALTER TABLE `tb_mapeltmp`
  ADD PRIMARY KEY (`recID`);

--
-- Indeks untuk tabel `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  ADD PRIMARY KEY (`idPekerjaan`);

--
-- Indeks untuk tabel `tb_program`
--
ALTER TABLE `tb_program`
  ADD PRIMARY KEY (`idProgram`);

--
-- Indeks untuk tabel `tb_semester`
--
ALTER TABLE `tb_semester`
  ADD PRIMARY KEY (`idSemester`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`idSiswa`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`idUser`);

--
-- Indeks untuk tabel `tb_walikelas`
--
ALTER TABLE `tb_walikelas`
  ADD PRIMARY KEY (`recID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_agama`
--
ALTER TABLE `tb_agama`
  MODIFY `idAgama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_bidang`
--
ALTER TABLE `tb_bidang`
  MODIFY `idBidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_ekstrakulikuler`
--
ALTER TABLE `tb_ekstrakulikuler`
  MODIFY `idEkstra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `idGuru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `idKelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_kelastmp`
--
ALTER TABLE `tb_kelastmp`
  MODIFY `recID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `idMapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_mapeltmp`
--
ALTER TABLE `tb_mapeltmp`
  MODIFY `recID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  MODIFY `idPekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_program`
--
ALTER TABLE `tb_program`
  MODIFY `idProgram` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_semester`
--
ALTER TABLE `tb_semester`
  MODIFY `idSemester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `idSiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_walikelas`
--
ALTER TABLE `tb_walikelas`
  MODIFY `recID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
