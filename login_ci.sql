-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2019 at 06:59 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nip` int(128) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `gelar` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nama`, `nip`, `jabatan`, `gelar`, `email`, `image`) VALUES
(3, 'Astaga S.kom, M.kom', 41228271, 'Dekan', 'S.kom, M.kom', 'cottomatte@gmail.com', 'ERIK_ADI_RAHMAT.JPG'),
(4, 'Ir.Adelia Meydie S.T, M.T', 41228272, 'adeliametro@gmail.com', 'Ir, S.T, M.T', 'cottomasstte@gmail.com', 'ADELIA_MEIDY_NINGRUM1.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nim` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `ukt` varchar(120) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `angkatan` int(11) NOT NULL,
  `kelas` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `image`, `email`, `ukt`, `alamat`, `angkatan`, `kelas`) VALUES
(3, 'Muhammad Ryand January', 'F1G117038', 'Ryand.jpg', 'ryandkomet@gmail.com', '45000000', 'Btn.Kendari Permai', 20171, 'Sistem_Informasi'),
(14, 'Muhammad Akbar', 'F1G117030', 'LD__MUHAMMAD_FADIL.JPG', 'akbar007@gmail.com', '35000000', 'kendari', 20171, 'Sistem_Informasi'),
(15, 'Muhammad Iksan Yusuf', 'F1G117034', 'alwi2.jpg', 'iksanyal17@gmail.com', '3000000', 'mangshdajj', 20171, 'Jaringan'),
(16, 'Bahri', 'F1G117049', 'PANJI_ARDANA_RIDWAN1.JPG', 'bahrybray@gmail.com', '3500000', 'Sakura', 20171, 'Artificial_Intelegent'),
(17, 'La ode Bangkasi', 'F1G118029', 'LD__AMIN_SYAFAHRUN2.JPG', 'asdaaaa@gmail.com', '3500000', 'fantuora,kkkkkkkkkkkhh', 20181, 'Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `penjurusan`
--

CREATE TABLE `penjurusan` (
  `id` int(11) NOT NULL,
  `kode_kelas` varchar(128) NOT NULL,
  `nama_kelas` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjurusan`
--

INSERT INTO `penjurusan` (`id`, `kode_kelas`, `nama_kelas`) VALUES
(1, 'Kelas A', 'Artificial_Intelegent'),
(2, 'Kelas B', 'Jaringan'),
(3, 'Kelas C', 'Sistem_Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(3, 'Muhammad Ryand January', 'ryandkomet@gmail.com', 'IMG20160925072155.jpg', '$2y$10$4eQUVPq8Xv4zrUqFqhSti.2ACM2Q6Pu9NOuxz5ATJvu8Q/yDKkewe', 1, 1, 1569084914),
(4, 'Saitama-kun', 'ryandcoc2@gmail.com', 'binary.jpg', '$2y$10$Vs79sKQniEzz.JfqKLS4WeFiH8LmR2ir8Sa3Ry5ixIHjxnXQrXyVe', 2, 1, 1569085183);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 1, 3),
(4, 1, 2),
(11, 3, 4),
(15, 1, 4),
(16, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Kuliah (Admin)'),
(5, 'Kuliah (User)');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Administrator', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profil', 'user', 'fas fa-fw fa-user-tie', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 1, 'Role', 'admin/role', 'fas fa-fw fa-user', 1),
(7, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(8, 4, 'Mahasiswa', 'Admin/mahasiswa', 'fas fa-fw fa-user-graduate', 1),
(9, 5, 'Mahasiswa', 'user/mahasiswa', 'fas fa-fw fa-user-graduate', 1),
(10, 4, 'Dosen', 'admin/dosen', 'fas fa-fw fa-chalkboard-teacher', 1),
(11, 5, 'Dosen', 'user/dosen', 'fas fa-fw fa-chalkboard-teacher', 1),
(12, 4, 'Penjurusan', 'admin/penjurusan', 'fas fa-fw fa-address-card', 1),
(13, 5, 'Penjurusan', 'user/penjurusan', 'fas fa-fw fa-address-card', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `Id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas` (`kelas`) USING BTREE;

--
-- Indexes for table `penjurusan`
--
ALTER TABLE `penjurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `penjurusan`
--
ALTER TABLE `penjurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
