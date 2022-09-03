-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 01, 2022 at 05:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matrikulasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `ACC_Ujian`
--

CREATE TABLE `ACC_Ujian` (
  `Id` int(11) NOT NULL,
  `Dosen_Penguji` varchar(45) NOT NULL,
  `Jadwal_ujian` varchar(45) NOT NULL,
  `ACC_Ujian` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Anggota_Kelompok`
--

CREATE TABLE `Anggota_Kelompok` (
  `Anggota_Kelompok_Id` int(11) NOT NULL,
  `Nama_anggota` varchar(45) NOT NULL,
  `Nim` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Anggota_Kelompok`
--

INSERT INTO `Anggota_Kelompok` (`Anggota_Kelompok_Id`, `Nama_anggota`, `Nim`) VALUES
(1, 'Erdi Vernanto', '362155401141'),
(2, 'Sani Ahmad Nur Hilmi', '362155401151'),
(4, 'Yunita Lutfita', '362155401137'),
(5, 'Alvina Damayanti', '362155401199'),
(6, 'Muhammad Ananta', '362155401198');

-- --------------------------------------------------------

--
-- Table structure for table `Disetujui`
--

CREATE TABLE `Disetujui` (
  `Id` int(11) NOT NULL,
  `Tempat_KP` varchar(45) NOT NULL,
  `Alamat_KP` varchar(45) NOT NULL,
  `Tanggal_mulai` datetime NOT NULL,
  `Tanggal_selesai` datetime NOT NULL,
  `Proposal` varchar(45) NOT NULL,
  `Anggota_Kelompok_Id` int(11) NOT NULL,
  `Dosen_Id` int(11) NOT NULL,
  `Perusahaan_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Disetujui`
--

INSERT INTO `Disetujui` (`Id`, `Tempat_KP`, `Alamat_KP`, `Tanggal_mulai`, `Tanggal_selesai`, `Proposal`, `Anggota_Kelompok_Id`, `Dosen_Id`, `Perusahaan_Id`) VALUES
(22, 'Rumah', 'Desa Orocimaruf', '2022-08-31 11:49:00', '2022-08-19 09:49:00', '03. Inheritance.pdf', 2, 2, 2),
(23, 'Poliwangi 8', 'Amekiri Gerbongan', '2022-08-31 11:50:00', '2022-08-31 00:51:00', '04. Enkapsulasi (Visibility).pdf', 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Dosen`
--

CREATE TABLE `Dosen` (
  `Dosen_Id` int(11) NOT NULL,
  `Nama_dosen` varchar(45) NOT NULL,
  `Nik` varchar(45) NOT NULL,
  `User_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Dosen`
--

INSERT INTO `Dosen` (`Dosen_Id`, `Nama_dosen`, `Nik`, `User_Id`) VALUES
(1, 'Otnanrev Idre Amd. Kom.', '9999991', 1),
(2, 'Bambang Kot Intl.', '99999922', 1),
(4, 'Bapak Saya Dosen Bangunan', '99999999999', 1),
(5, 'Paiman', '21321321432', 1),
(6, 'saya', '2321243', 3),
(7, 'sayakamu', '1235346547', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Lembar_Kerja`
--

CREATE TABLE `Lembar_Kerja` (
  `Id` int(11) NOT NULL,
  `Tanggal` datetime NOT NULL,
  `File` varchar(45) NOT NULL,
  `Anggota_Kelompok_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Mahasiswa`
--

CREATE TABLE `Mahasiswa` (
  `Id` int(11) NOT NULL,
  `Nama_mahasiswa` varchar(45) NOT NULL,
  `Nim` varchar(45) NOT NULL,
  `Kelas` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Alamat` varchar(45) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Anggota_Kelompok_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Mahasiswa`
--

INSERT INTO `Mahasiswa` (`Id`, `Nama_mahasiswa`, `Nim`, `Kelas`, `Email`, `Alamat`, `User_Id`, `Anggota_Kelompok_Id`) VALUES
(2, 'Erdi Vernanto', '362155401141', '1e', 'Dragonfruitfarm@gmail.com', 'Wringinpitu', 2, 1),
(6, 'Erdi', '3621554011411', '1e', 'aeweq@fs.hj', '1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Nilai`
--

CREATE TABLE `Nilai` (
  `Id` int(11) NOT NULL,
  `Nilai_pembimbing_lapangan` varchar(45) NOT NULL,
  `Nilai_pembimbing_KP` varchar(45) NOT NULL,
  `Nilai_penguji` varchar(45) NOT NULL,
  `Bukti_nilai_pembimbing_lapangan` varchar(45) NOT NULL,
  `Pendaftaran_ujian_KP_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Pendaftaran_KP`
--

CREATE TABLE `Pendaftaran_KP` (
  `Id` int(11) NOT NULL,
  `Tempat_KP` varchar(45) NOT NULL,
  `Alamat_KP` varchar(45) NOT NULL,
  `Tanggal_mulai` datetime NOT NULL,
  `Tanggal_selesai` datetime NOT NULL,
  `Proposal` varchar(45) NOT NULL,
  `Anggota_Kelompok_Id` int(11) NOT NULL,
  `Dosen_Id` int(11) NOT NULL,
  `Perusahaan_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Pendaftaran_ujian_KP`
--

CREATE TABLE `Pendaftaran_ujian_KP` (
  `Id` int(11) NOT NULL,
  `Laporan_KP` varchar(45) NOT NULL,
  `Jadwal_ujian` varchar(45) NOT NULL,
  `Pendaftaran_KP_Id` int(11) NOT NULL,
  `ACC_Ujian_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Perusahaan`
--

CREATE TABLE `Perusahaan` (
  `Perusahaan_Id` int(11) NOT NULL,
  `Nama_Perusahaan` varchar(45) NOT NULL,
  `Alamat` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Telephone` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Perusahaan`
--

INSERT INTO `Perusahaan` (`Perusahaan_Id`, `Nama_Perusahaan`, `Alamat`, `Email`, `Telephone`) VALUES
(1, 'PT . PW Farm', 'Wringinpitu', 'Dragonfruitfarm@gmail.com', '9999982712'),
(2, 'Dragon Fruit Farm', 'Boyolali', 'erdghsdg@gmail,cone', '9999982712'),
(3, 'Kambing Gibbass Farm', 'Wringinpitu', 'erdghsdg@gmail,cone', '9999982712');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `Id` int(11) NOT NULL,
  `Username` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `Id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`Id`, `Username`, `Password`, `Id_role`) VALUES
(1, 'dosen', '1', 2),
(2, 'Erdi Vernanto', '123', 1),
(3, 'pakdolah', '1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `User_Role`
--

CREATE TABLE `User_Role` (
  `Id_user` int(11) NOT NULL,
  `Role` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User_Role`
--

INSERT INTO `User_Role` (`Id_user`, `Role`) VALUES
(1, 'Mahasiswa'),
(2, 'Dosen'),
(3, 'Koordinator KP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ACC_Ujian`
--
ALTER TABLE `ACC_Ujian`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `Anggota_Kelompok`
--
ALTER TABLE `Anggota_Kelompok`
  ADD PRIMARY KEY (`Anggota_Kelompok_Id`);

--
-- Indexes for table `Disetujui`
--
ALTER TABLE `Disetujui`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Anggota_Kelompok_Id` (`Anggota_Kelompok_Id`),
  ADD KEY `Dosen_Id` (`Dosen_Id`),
  ADD KEY `Perusahaan_Id` (`Perusahaan_Id`);

--
-- Indexes for table `Dosen`
--
ALTER TABLE `Dosen`
  ADD PRIMARY KEY (`Dosen_Id`),
  ADD KEY `User_Id` (`User_Id`);

--
-- Indexes for table `Lembar_Kerja`
--
ALTER TABLE `Lembar_Kerja`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Anggota_Kelompok_Id` (`Anggota_Kelompok_Id`);

--
-- Indexes for table `Mahasiswa`
--
ALTER TABLE `Mahasiswa`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `User_Id` (`User_Id`),
  ADD KEY `Anggota_Kelompok_Id` (`Anggota_Kelompok_Id`);

--
-- Indexes for table `Nilai`
--
ALTER TABLE `Nilai`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Pendaftaran_ujian_KP_Id` (`Pendaftaran_ujian_KP_Id`);

--
-- Indexes for table `Pendaftaran_KP`
--
ALTER TABLE `Pendaftaran_KP`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Anggota_Kelompok_Id` (`Anggota_Kelompok_Id`),
  ADD KEY `Dosen_Id` (`Dosen_Id`),
  ADD KEY `Perusahaan_Id` (`Perusahaan_Id`);

--
-- Indexes for table `Pendaftaran_ujian_KP`
--
ALTER TABLE `Pendaftaran_ujian_KP`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ACC_Ujian_Id` (`ACC_Ujian_Id`),
  ADD KEY `Pendaftaran_KP_Id` (`Pendaftaran_KP_Id`);

--
-- Indexes for table `Perusahaan`
--
ALTER TABLE `Perusahaan`
  ADD PRIMARY KEY (`Perusahaan_Id`),
  ADD UNIQUE KEY `Id` (`Perusahaan_Id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_role` (`Id_role`);

--
-- Indexes for table `User_Role`
--
ALTER TABLE `User_Role`
  ADD PRIMARY KEY (`Id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ACC_Ujian`
--
ALTER TABLE `ACC_Ujian`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Anggota_Kelompok`
--
ALTER TABLE `Anggota_Kelompok`
  MODIFY `Anggota_Kelompok_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Disetujui`
--
ALTER TABLE `Disetujui`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `Dosen`
--
ALTER TABLE `Dosen`
  MODIFY `Dosen_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Lembar_Kerja`
--
ALTER TABLE `Lembar_Kerja`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Mahasiswa`
--
ALTER TABLE `Mahasiswa`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Nilai`
--
ALTER TABLE `Nilai`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Pendaftaran_KP`
--
ALTER TABLE `Pendaftaran_KP`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `Pendaftaran_ujian_KP`
--
ALTER TABLE `Pendaftaran_ujian_KP`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Perusahaan`
--
ALTER TABLE `Perusahaan`
  MODIFY `Perusahaan_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `User_Role`
--
ALTER TABLE `User_Role`
  MODIFY `Id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Disetujui`
--
ALTER TABLE `Disetujui`
  ADD CONSTRAINT `Disetujui_ibfk_1` FOREIGN KEY (`Anggota_Kelompok_Id`) REFERENCES `Anggota_Kelompok` (`Anggota_Kelompok_Id`),
  ADD CONSTRAINT `Disetujui_ibfk_2` FOREIGN KEY (`Dosen_Id`) REFERENCES `Dosen` (`Dosen_Id`),
  ADD CONSTRAINT `Disetujui_ibfk_3` FOREIGN KEY (`Perusahaan_Id`) REFERENCES `Perusahaan` (`Perusahaan_Id`);

--
-- Constraints for table `Dosen`
--
ALTER TABLE `Dosen`
  ADD CONSTRAINT `Dosen_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `User` (`Id`);

--
-- Constraints for table `Lembar_Kerja`
--
ALTER TABLE `Lembar_Kerja`
  ADD CONSTRAINT `Lembar_Kerja_ibfk_1` FOREIGN KEY (`Anggota_Kelompok_Id`) REFERENCES `Anggota_Kelompok` (`Anggota_Kelompok_Id`);

--
-- Constraints for table `Mahasiswa`
--
ALTER TABLE `Mahasiswa`
  ADD CONSTRAINT `Mahasiswa_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `User` (`Id`),
  ADD CONSTRAINT `Mahasiswa_ibfk_2` FOREIGN KEY (`Anggota_Kelompok_Id`) REFERENCES `Anggota_Kelompok` (`Anggota_Kelompok_Id`);

--
-- Constraints for table `Nilai`
--
ALTER TABLE `Nilai`
  ADD CONSTRAINT `Nilai_ibfk_1` FOREIGN KEY (`Pendaftaran_ujian_KP_Id`) REFERENCES `Pendaftaran_ujian_KP` (`Id`);

--
-- Constraints for table `Pendaftaran_KP`
--
ALTER TABLE `Pendaftaran_KP`
  ADD CONSTRAINT `Pendaftaran_KP_ibfk_1` FOREIGN KEY (`Anggota_Kelompok_Id`) REFERENCES `Anggota_Kelompok` (`Anggota_Kelompok_Id`),
  ADD CONSTRAINT `Pendaftaran_KP_ibfk_2` FOREIGN KEY (`Dosen_Id`) REFERENCES `Dosen` (`Dosen_Id`),
  ADD CONSTRAINT `Pendaftaran_KP_ibfk_3` FOREIGN KEY (`Perusahaan_Id`) REFERENCES `Perusahaan` (`Perusahaan_Id`);

--
-- Constraints for table `Pendaftaran_ujian_KP`
--
ALTER TABLE `Pendaftaran_ujian_KP`
  ADD CONSTRAINT `Pendaftaran_ujian_KP_ibfk_1` FOREIGN KEY (`ACC_Ujian_Id`) REFERENCES `ACC_Ujian` (`Id`),
  ADD CONSTRAINT `Pendaftaran_ujian_KP_ibfk_2` FOREIGN KEY (`Pendaftaran_KP_Id`) REFERENCES `ACC_Ujian` (`Id`);

--
-- Constraints for table `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `User_ibfk_1` FOREIGN KEY (`Id_role`) REFERENCES `User_Role` (`Id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
