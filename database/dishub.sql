-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Sep 2019 pada 00.36
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dishub`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_instansi`
--

CREATE TABLE `tbl_instansi` (
  `id_instansi` varchar(100) NOT NULL,
  `institusi` varchar(100) NOT NULL,
  `nama` varchar(5000) NOT NULL,
  `status` varchar(50) NOT NULL,
  `alamat` varchar(10000) NOT NULL,
  `kepsek` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `website` varchar(10000) NOT NULL,
  `email` varchar(10000) NOT NULL,
  `logo` varchar(10) NOT NULL,
  `id_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_instansi`
--

INSERT INTO `tbl_instansi` (`id_instansi`, `institusi`, `nama`, `status`, `alamat`, `kepsek`, `nip`, `website`, `email`, `logo`, `id_user`) VALUES
('1', 'Dinas Perhubungan Kota Sukabumi', 'Lalu Lintas dan Angkutan', 'Aktif', 'Jl. Arif Rahman Hakim No.25', 'Abdul Rachman,A.T.D', '-', 'https://portal.sukabumikota.go.id', '-', 'dishub.png', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_klasifikasi`
--

CREATE TABLE `tbl_klasifikasi` (
  `id_klasifikasi` int(5) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `uraian` mediumtext NOT NULL,
  `id_user` tinyint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_peremajaan`
--

CREATE TABLE `tbl_peremajaan` (
  `id_surat` tinyint(50) NOT NULL,
  `nokendaraan` int(11) NOT NULL,
  `namapemilik` int(11) NOT NULL,
  `alamat` int(11) NOT NULL,
  `merk` int(11) NOT NULL,
  `jenis` int(11) NOT NULL,
  `thpembuatan` int(11) NOT NULL,
  `isisilinder` int(11) NOT NULL,
  `norangka` int(11) NOT NULL,
  `nomesin` int(11) NOT NULL,
  `asalkendaraan` int(11) NOT NULL,
  `nokendaraan2` int(11) NOT NULL,
  `namapemilik2` int(11) NOT NULL,
  `alamat2` int(11) NOT NULL,
  `merk2` int(11) NOT NULL,
  `jenis2` int(11) NOT NULL,
  `thpembuatan2` int(11) NOT NULL,
  `isisilinder2` int(11) NOT NULL,
  `norangka2` int(11) NOT NULL,
  `nomesin2` int(11) NOT NULL,
  `nouji2` int(11) NOT NULL,
  `kodetrayek2` int(11) NOT NULL,
  `kodeangkutan2` int(11) NOT NULL,
  `reg_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rekomendasi`
--

CREATE TABLE `tbl_rekomendasi` (
  `id_surat` tinyint(50) NOT NULL,
  `nokendaraan` varchar(20) NOT NULL,
  `namapemilik` varchar(1000) NOT NULL,
  `alamat` varchar(1000) NOT NULL,
  `type` varchar(20) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `thpembuatan` date NOT NULL,
  `isisilinder` varchar(20) NOT NULL,
  `norangka` varchar(20) NOT NULL,
  `nomesin` varchar(20) NOT NULL,
  `kodetrayek` varchar(20) NOT NULL,
  `nouji` varchar(20) NOT NULL,
  `file` varchar(300) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `lintastrayek` varchar(1000) NOT NULL,
  `id_user` tinyint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_rekomendasi`
--

INSERT INTO `tbl_rekomendasi` (`id_surat`, `nokendaraan`, `namapemilik`, `alamat`, `type`, `jenis`, `thpembuatan`, `isisilinder`, `norangka`, `nomesin`, `kodetrayek`, `nouji`, `file`, `reg_no`, `lintastrayek`, `id_user`) VALUES
(0, '1', '57uii', 'uytu', 'e', '3', '0000-00-00', '$', 'fgd', 'yi', 'e', 'i', 'e7454', 'uy', 'e', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sett`
--

CREATE TABLE `tbl_sett` (
  `id_sett` tinyint(50) NOT NULL,
  `surat_rekomendasi` tinyint(50) NOT NULL,
  `surat_peremajaan` tinyint(50) NOT NULL,
  `referensi` tinyint(50) NOT NULL,
  `id_user` tinyint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_sett`
--

INSERT INTO `tbl_sett` (`id_sett`, `surat_rekomendasi`, `surat_peremajaan`, `referensi`, `id_user`) VALUES
(1, 10, 10, 10, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nama`, `nip`, `admin`) VALUES
('1', 'angkutan', 'angkutan123', 'Lalu Lintas dan Angkutan', '-', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_instansi`
--
ALTER TABLE `tbl_instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indeks untuk tabel `tbl_klasifikasi`
--
ALTER TABLE `tbl_klasifikasi`
  ADD PRIMARY KEY (`id_klasifikasi`);

--
-- Indeks untuk tabel `tbl_rekomendasi`
--
ALTER TABLE `tbl_rekomendasi`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indeks untuk tabel `tbl_sett`
--
ALTER TABLE `tbl_sett`
  ADD PRIMARY KEY (`id_sett`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
