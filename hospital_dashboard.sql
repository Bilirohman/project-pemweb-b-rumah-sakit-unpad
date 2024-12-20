-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2024 at 06:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

USE DATABASE hospital_dashboard;

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `dateofappointment` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `appointments` (`id`, `nama`, `hp`, `dateofappointment`) VALUES
(1, 'azari', '', '0000-00-00'),
(2, 'azari', '', '0000-00-00'),
(3, 'azari', '', '0000-00-00'),
(4, 'azari', '081219443128', '2024-12-02'),
(5, 'Gunawan', '081219443145', '2024-12-02'),
(6, 'ajaribajuri', '1234567891011', '2024-12-02'),
(7, 'bimbajuri', '0821001821', '2024-12-02');


CREATE TABLE `doctors` (
  `nip` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `spesialisasi` varchar(50) NOT NULL,
  `no_izin_praktek` varchar(50) NOT NULL,
  `alumni` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `doctors` (`nip`, `name`, `hp`, `spesialisasi`, `no_izin_praktek`, `alumni`, `created_at`) VALUES
(1, 'Dr. Andi Wijaya', '081234567890', 'Penyakit Kulit dan Kelamin', 'IZIN-UM-001', 'Universitas Indonesia', '2024-11-23 21:45:40'),
(2, 'Dr. Siti Ramadhani', '082345678901', 'Gigi', 'IZIN-GI-002', 'Universitas Gadjah Mada', '2024-11-23 21:45:40'),
(4, 'Dr. Dewi Lestari', '084567890123', 'Kandungan', 'IZIN-KD-004', 'Universitas Padjadjaran', '2024-11-23 21:45:40'),
(5, 'Dr. Ridwan Syah', '085678901234', 'Bedah', 'IZIN-BD-005', 'Universitas Diponegoro', '2024-11-23 21:45:40'),
(6, 'Dr. Ratna Kartika', '086789012345', 'Mata', 'IZIN-MT-006', 'Universitas Hasanuddin', '2024-11-23 21:45:40'),
(8, 'Dr. Intan Permatasari', '088901234567', 'Kulit dan Kelamin', 'IZIN-KK-008', 'Universitas Brawijaya', '2024-11-23 21:45:40'),
(11, 'Dr. Aisyah Putri', '081234567890', 'Poliklinik Umum', 'PRK001234', 'Universitas Indonesia', '2024-11-25 06:31:15'),
(12, 'Dr. Siti Ramadhan', '082345678901', 'Gigi', 'PRK001235', 'Universitas Gadjah Mada', '2024-11-25 06:31:15'),
(13, 'Dr. Clara Wijaya', '081312345678', 'Poliklinik Anak', 'PRK001236', 'Universitas Gadjah Mada', '2024-11-25 06:31:15'),
(14, 'Dr. David Gunawan', '081356789012', 'Poliklinik Penyakit Dalam', 'PRK001237', 'Universitas Padjadjaran', '2024-11-25 06:31:15'),
(15, 'Dr. Elvira Natalia', '081378901234', 'Poliklinik Kandungan', 'PRK001238', 'Universitas Hasanuddin', '2024-11-25 06:31:15'),
(16, 'Dr. Fajar Priyanto', '081390123456', 'Poliklinik Umum', 'PRK001239', 'Universitas Indonesia', '2024-11-25 06:31:15'),
(17, 'Dr. Gina Kusuma', '081323456789', 'Poliklinik Gigi', 'PRK001240', 'Universitas Airlangga', '2024-11-25 06:31:15'),
(18, 'Dr. Harry Tjahjadi', '081378912345', 'Poliklinik Anak', 'PRK001241', 'Universitas Gadjah Mada', '2024-11-25 06:31:15'),
(19, 'Dr. Irma Aditya', '081398765432', 'Poliklinik Penyakit Dalam', 'PRK001242', 'Universitas Padjadjaran', '2024-11-25 06:31:15'),
(20, 'Dr. Andi Wijaya', '081234567890', 'Umum(gw ganti)', 'IZIN-UM-0011', 'Universitas Indonesia', '2024-11-25 06:31:15'),
(21, 'dr. Gunawann Napitulu', '081234567890', 'Kandungan', '', 'Unpadc', '2024-12-02 04:48:21');


CREATE TABLE `jadwal_praktek` (
  `id` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') NOT NULL,
  `jam` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `jadwal_praktek` (`id`, `nip`, `hari`, `jam`, `created_at`, `updated_at`) VALUES
(2, '9', 'Senin', '10.00 - 12.45', '2024-11-23 16:14:05', '2024-11-23 16:14:05'),
(5, '1', 'Senin', '08:00-12:00', '2024-11-25 06:32:14', '2024-11-25 06:32:14'),
(6, '1', 'Rabu', '08:00-12:00', '2024-11-25 06:32:14', '2024-11-25 06:32:14'),
(7, '2', 'Selasa', '09:00-13:00', '2024-11-25 06:32:14', '2024-11-25 06:32:14'),
(8, '2', 'Kamis', '09:00-13:00', '2024-11-25 06:32:14', '2024-11-25 06:32:14'),
(9, '3', 'Senin', '10:00-14:00', '2024-11-25 06:32:14', '2024-11-25 06:32:14'),
(10, '3', 'Jumat', '10:00-14:00', '2024-11-25 06:32:14', '2024-11-25 06:32:14'),
(11, '4', 'Selasa', '07:00-11:00', '2024-11-25 06:32:14', '2024-11-25 06:32:14'),
(12, '4', 'Kamis', '07:00-11:00', '2024-11-25 06:32:14', '2024-11-25 06:32:14'),
(13, '5', 'Rabu', '08:30-12:30', '2024-11-25 06:32:14', '2024-11-25 06:32:14'),
(15, '6', 'Senin', '13:00-17:00', '2024-11-25 06:32:14', '2024-11-25 06:32:14'),
(16, '6', 'Kamis', '13:00-17:00', '2024-11-25 06:32:14', '2024-11-25 06:32:14'),
(17, '7', 'Selasa', '14:00-18:00', '2024-11-25 06:32:14', '2024-11-25 06:32:14'),
(18, '7', 'Jumat', '14:00-18:00', '2024-11-25 06:32:14', '2024-11-25 06:32:14'),
(19, '8', 'Rabu', '09:00-13:00', '2024-11-25 06:32:14', '2024-11-25 06:32:14'),
(20, '8', 'Sabtu', '09:00-13:00', '2024-11-25 06:32:14', '2024-11-25 06:32:14'),
(21, '9', 'Senin', '07:30-11:30', '2024-11-25 06:32:14', '2024-11-25 06:32:14'),
(22, '9', 'Kamis', '07:30-11:30', '2024-11-25 06:32:14', '2024-11-25 06:32:14'),
(23, '10', 'Selasa', '08:00-12:00', '2024-11-25 06:32:14', '2024-11-25 06:32:14'),
(24, '10', 'Jumat', '08:00-12:00', '2024-11-25 06:32:14', '2024-11-25 06:32:14'),
(25, '1', 'Minggu', '09.00 - 16.00', '2024-12-02 04:50:05', '2024-12-02 04:50:05'),
(26, '1', 'Senin', '', '2024-12-02 04:50:09', '2024-12-02 04:50:09');


CREATE TABLE `patients` (
  `no_rekam_medis` varchar(20) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nama_penanggung_jawab` varchar(100) NOT NULL,
  `hubungan_penanggung_jawab` varchar(50) NOT NULL,
  `alamat_penanggung_jawab` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `patients` (`no_rekam_medis`, `nama_pasien`, `tanggal_lahir`, `nama_penanggung_jawab`, `hubungan_penanggung_jawab`, `alamat_penanggung_jawab`) VALUES
('', 'Altahf Alfarezy', '2024-12-06', 'Siti Aminag', 'saudara kandung', 'cikuda'),
('RM-437082368', 'Sabrina Hasibuan', '2024-11-24', 'Jeffrey Hasibuan', 'saudara kandung', 'Jl. Cipta Karya Perum. Griya Cipta blok G/8');



CREATE TABLE `pesanan_obat` (
  `id` int(11) NOT NULL,
  `no_rawat` varchar(20) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `dosis` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `status` enum('MENUNGGU','DIPROSES','SELESAI','DIBATALKAN') NOT NULL DEFAULT 'MENUNGGU',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `pesanan_obat` (`id`, `no_rawat`, `nama_obat`, `dosis`, `jumlah`, `satuan`, `tanggal_masuk`, `jam_masuk`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(4, '123457768', 'Paraectamol 500g', '3x1', 1, 'Strip', '2024-11-24', '22:33:50', NULL, 'SELESAI', '2024-11-24 22:33:50', '2024-12-02 07:39:02'),
(6, '123457768', 'amoxan', '1 gram', 5, 'Strip', '2024-12-02', '07:47:24', NULL, 'MENUNGGU', '2024-12-02 07:47:24', '2024-12-02 07:47:24'),
(7, '123457768', 'air', '1 liter', 500, 'Botol', '2024-12-02', '07:49:58', NULL, 'MENUNGGU', '2024-12-02 07:49:58', '2024-12-02 07:49:58'),
(8, 'RW-5555', 'Paracetamol 500ML', '3x1', 1, 'Strip', '2024-12-02', '11:57:45', NULL, 'SELESAI', '2024-12-02 11:57:45', '2024-12-02 11:58:37');

CREATE TABLE `poliklinik` (
  `id` int(11) NOT NULL,
  `nama_poliklinik` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `poliklinik` (`id`, `nama_poliklinik`, `lokasi`) VALUES
(1, 'Poliklinik Umum', 'Gedung A, Lantai 1'),
(2, 'Poliklinik Gigi', 'Gedung B, Lantai 2'),
(3, 'Poliklinik Anak', 'Gedung A, Lantai 3'),
(4, 'Poliklinik Penyakit Dalam', 'Gedung C, Lantai 1'),
(5, 'Poliklinik Kandungan', 'Gedung D, Lantai 1');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` int(11) NOT NULL,
  `no_registrasi` varchar(20) NOT NULL,
  `no_rawat` varchar(20) NOT NULL,
  `cara_masuk` enum('RAWAT JALAN','RAWAT INAP') NOT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `doctor_nip` int(11) NOT NULL,
  `poliklinik_id` int(11) NOT NULL,
  `jenis_bayar` varchar(50) NOT NULL,
  `asal_rujukan` varchar(100) DEFAULT NULL,
  `no_rekam_medis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `registrations` (`id`, `no_registrasi`, `no_rawat`, `cara_masuk`, `tanggal_daftar`, `doctor_nip`, `poliklinik_id`, `jenis_bayar`, `asal_rujukan`, `no_rekam_medis`) VALUES
(3, '12345678', '123457768', 'RAWAT INAP', '2024-11-28 00:00:00', 2, 3, 'BPJS', 'zrehtsynm', 'RM-437082368'),
(4, 'REG-4375678', 'RW-5555', 'RAWAT JALAN', '2024-12-02 00:00:00', 1, 1, 'SENDIRI', 'Klinik Unpad', 'RM-437082368');


CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','doctor','apoteker','umum') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$ogEXq63NLL7o78/J.v9Pfu7apLjuZCr370clHVtyK4IIYkmTYCZ8.', 'doctor'),
(2, 'bim_yusuf', '$2y$10$XsJGNwIhsg/vlHxCjEBIpOA2SzUTsN.CoWUVAHfLxiE6cl8eYtUCO', 'doctor'),
(3, 'bim23002', '$2y$10$0/aIzZc6s1qbR.MKmQEGaOY3VFdC3BXRMt7HwOLfU6UQn5CJvxF32', 'doctor'),
(4, 'dokter123', '$2y$10$z5PkzY1WhIzzEGHjOsmO7eokH9kdzTOidcMUVZuZYS4ZdKK91QRSC', 'doctor'),
(5, 'azharii', '$2y$10$EsdSXL2QfnA7wziYsBy9OeYfIres2fGOegxq3G2FIC.2NhiEZqwMe', 'doctor'),
(7, 'apoteker', '$2y$10$Vq7Hd/smztBX06/5ahMTcuHNYGqoQForzDY6z5nIUVvCPAeIW01oi', 'apoteker'),
(8, 'azunew', '$2y$10$h.7IiMIaTJwW4YXkUTVNE.O5HlqU//BFF1pFtC1dhh7LOvHZRXWwK', 'umum'),
(9, 'barulagi', '$2y$10$4iwWxdxXzAwlwFZ7gxHftuX7fE7GJtLzA0UdKMIYsCFBmacL5p2M.', 'umum'),
(10, 'newacc', '$2y$10$6jnmI0sXb1G674znpKa6wecC/6TPqPD8er9Y.3D66ogucmc1B/CRC', 'umum'),
(11, 'bili', '$2y$10$8/jRzXN0B84YNZtauCQJUu3x.0dZEC3FHuP6nM8A9RGdNZR0RGDCG', 'umum'),
(12, 'ajaribajuri', '$2y$10$m9QSvaGQltQnW2KdEww7nOxjPqo3Lt06o7OvVooXM6tIEu5zy0PEm', 'umum'),
(13, 'bimbajuri', '$2y$10$0PupkyIZ1kREPxNOfBXpUemWW3YZ7y5WRawqBtVW8LBfL.Mla8kaG', 'umum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`nip`),
  ADD UNIQUE KEY `no_izin_praktek` (`no_izin_praktek`),
  ADD KEY `nama_dokter` (`name`);

--
-- Indexes for table `jadwal_praktek`
--
ALTER TABLE `jadwal_praktek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal` (`nip`,`hari`,`jam`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`no_rekam_medis`);

--
-- Indexes for table `pesanan_obat`
--
ALTER TABLE `pesanan_obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_rawat` (`no_rawat`);

--
-- Indexes for table `poliklinik`
--
ALTER TABLE `poliklinik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_registrasi` (`no_registrasi`),
  ADD UNIQUE KEY `no_rawat` (`no_rawat`),
  ADD KEY `doctor_nip` (`doctor_nip`),
  ADD KEY `poliklinik_id` (`poliklinik_id`),
  ADD KEY `no_rekam_medis` (`no_rekam_medis`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `nip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `jadwal_praktek`
--
ALTER TABLE `jadwal_praktek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pesanan_obat`
--
ALTER TABLE `pesanan_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `poliklinik`
--
ALTER TABLE `poliklinik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanan_obat`
--
ALTER TABLE `pesanan_obat`
  ADD CONSTRAINT `pesanan_obat_ibfk_1` FOREIGN KEY (`no_rawat`) REFERENCES `registrations` (`no_rawat`);

--
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `registrations_ibfk_1` FOREIGN KEY (`doctor_nip`) REFERENCES `doctors` (`nip`),
  ADD CONSTRAINT `registrations_ibfk_2` FOREIGN KEY (`poliklinik_id`) REFERENCES `poliklinik` (`id`),
  ADD CONSTRAINT `registrations_ibfk_3` FOREIGN KEY (`no_rekam_medis`) REFERENCES `patients` (`no_rekam_medis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
