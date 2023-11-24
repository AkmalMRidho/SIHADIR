-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 24 Nov 2023 pada 08.56
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kelompok4pbl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int NOT NULL,
  `id_mahasiswa` varchar(25) NOT NULL,
  `id_kelas` varchar(25) NOT NULL,
  `Tanggal Absensi` date NOT NULL,
  `Status Absensi` varchar(20) NOT NULL,
  `Jam Absensi` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(25) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nip` int NOT NULL,
  `Jenis_kelamin` enum('L','P') NOT NULL,
  `foto_admin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `Nama`, `password`, `nip`, `Jenis_kelamin`, `foto_admin`) VALUES
('AD01', 'Anggi Aminah Putri', 'Anggi123', 12345, 'P', 'https://storage.googleapis.com/pblkelompok4/Anggi.jpeg'),
('AD02', 'Agung Sutiyo', '123456', 782883, 'L', 'https://storage.googleapis.com/pblkelompok4/Agung.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` varchar(25) NOT NULL,
  `Nama_Dosen` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `Jenis_kelamin` varchar(10) NOT NULL,
  `foto_dosen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `Nama_Dosen`, `password`, `nip`, `Jenis_kelamin`, `foto_dosen`) VALUES
('D01', 'Lindung Siswanto', '123456', '19840611 201903 1012', 'L', 'https://storage.googleapis.com/pblkelompok4/Lindung-Siswanto.jpg'),
('D02', 'Ferry Faisal', '123456', '19730206 199501 1 001', 'L', 'https://storage.googleapis.com/pblkelompok4/Ferry-Faisal-e1644561870767.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` varchar(10) NOT NULL,
  `id_matkul` varchar(15) NOT NULL,
  `Nama Mata Kuliah` varchar(35) NOT NULL,
  `Dosen Pengajar` varchar(30) NOT NULL,
  `Ruangan` varchar(20) NOT NULL,
  `Hari` varchar(15) NOT NULL,
  `Jam Mulai` time NOT NULL,
  `Jam Selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id_kehadiran` varchar(25) NOT NULL,
  `id_mahasiswa` varchar(25) NOT NULL,
  `Tanggal Kehadiran` date NOT NULL,
  `Jumlah Jam Kehadiran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(25) NOT NULL,
  `Nama Pengajar` varchar(50) NOT NULL,
  `Jadwal Kuliah` varchar(25) NOT NULL,
  `Ruang Kelas` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kompensasi`
--

CREATE TABLE `kompensasi` (
  `id_kompensasi` varchar(10) NOT NULL,
  `id_absensi` varchar(15) NOT NULL,
  `id_kehadiran` varchar(15) NOT NULL,
  `Jenis_Kompensasi` varchar(30) NOT NULL,
  `Tanggal Kompensasi` date NOT NULL,
  `Nama Pengawas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `Nim` varchar(25) NOT NULL,
  `password` varchar(35) NOT NULL,
  `Nama_Mahasiswa` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `Foto_mhs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_kelas` varchar(20) NOT NULL,
  `id_user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`Nim`, `password`, `Nama_Mahasiswa`, `jenis_kelamin`, `Foto_mhs`, `id_kelas`, `id_user`) VALUES
('3202116022', '123456', 'Ahmad Hayyunaji', 'L', 'https://storage.googleapis.com/pblkelompok4/hayyun.jpeg', 'TIB', 'M03'),
('3202116055', '123456', 'Firza Febrian', 'L', 'https://storage.googleapis.com/pblkelompok4/Firza.jpeg', 'TIB', 'M02'),
('3202116099', 'Akmal22', 'Akmal Muhammad Ridho', 'L', 'https://storage.googleapis.com/pblkelompok4/WhatsApp%20Image%202023-06-15%20at%2013.02.48.jpeg', 'TIB', 'M01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkul`
--

CREATE TABLE `matkul` (
  `id_matkul` varchar(15) NOT NULL,
  `Nama Mata Kuliah` varchar(50) NOT NULL,
  `Semester` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peringatan kehadiran`
--

CREATE TABLE `peringatan kehadiran` (
  `id_sp` varchar(25) NOT NULL,
  `Nama Mahasiswa` varchar(50) NOT NULL,
  `Jumlah Jam` varchar(25) NOT NULL,
  `Status peringatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekapan`
--

CREATE TABLE `rekapan` (
  `id_rekapan` varchar(25) NOT NULL,
  `id_kelas` varchar(25) NOT NULL,
  `Tanggal Rekapan` date NOT NULL,
  `Isi Rekapan` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `kompensasi`
--
ALTER TABLE `kompensasi`
  ADD PRIMARY KEY (`id_kompensasi`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`Nim`);

--
-- Indeks untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indeks untuk tabel `peringatan kehadiran`
--
ALTER TABLE `peringatan kehadiran`
  ADD PRIMARY KEY (`id_sp`);

--
-- Indeks untuk tabel `rekapan`
--
ALTER TABLE `rekapan`
  ADD PRIMARY KEY (`id_rekapan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
