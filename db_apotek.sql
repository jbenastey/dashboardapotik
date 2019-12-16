-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Des 2019 pada 08.29
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_apotek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dim_golongan`
--

CREATE TABLE `dim_golongan` (
  `golongan_id` int(11) NOT NULL,
  `golongan_nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dim_golongan`
--

INSERT INTO `dim_golongan` (`golongan_id`, `golongan_nama`) VALUES
(1, 'BEBAS'),
(2, 'PSIKOTROPIKA'),
(3, 'BEBAS TERBATAS'),
(4, 'OBAT KERAS'),
(5, 'OBAT KERAS'),
(6, 'PSIKOTROPIKA'),
(7, 'PSIKOTROPIKA'),
(8, 'BEBAS TERBATAS'),
(9, 'OBAT KERAS'),
(10, 'PSIKOTROPIKA'),
(11, 'OBAT KERAS'),
(12, 'BEBAS'),
(13, 'PSIKOTROPIKA'),
(14, 'BEBAS TERBATAS'),
(15, 'OBAT KERAS'),
(16, 'OBAT KERAS'),
(17, 'PSIKOTROPIKA'),
(18, 'PSIKOTROPIKA'),
(19, 'BEBAS TERBATAS'),
(20, 'OBAT KERAS'),
(21, 'PSIKOTROPIKA'),
(22, 'OBAT KERAS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dim_kategori`
--

CREATE TABLE `dim_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dim_kategori`
--

INSERT INTO `dim_kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'ALKES'),
(2, 'TABLET'),
(3, 'SALEP'),
(4, 'TABLET'),
(5, 'TABLET'),
(6, 'CAIRAN'),
(7, 'CAIRAN'),
(8, 'TABLET'),
(9, 'TABLET'),
(10, 'TABLET'),
(11, 'TABLET'),
(12, 'ALKES'),
(13, 'TABLET'),
(14, 'SALEP'),
(15, 'TABLET'),
(16, 'TABLET'),
(17, 'CAIRAN'),
(18, 'CAIRAN'),
(19, 'TABLET'),
(20, 'TABLET'),
(21, 'TABLET'),
(22, 'TABLET');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dim_obat`
--

CREATE TABLE `dim_obat` (
  `obat_id` int(11) NOT NULL,
  `obat_kode` text NOT NULL,
  `obat_nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dim_obat`
--

INSERT INTO `dim_obat` (`obat_id`, `obat_kode`, `obat_nama`) VALUES
(1, '1000000001', 'CANGKANG CAPSUL'),
(2, '1001000001', 'DEPAKOT 250 MG'),
(3, '1001000002', 'BROIZ'),
(4, '1001000003', 'DEPAKOTE ER 500 MG'),
(5, '1001000004', 'DORNER TAB'),
(6, '1002000001', 'STESOLID 10 MG RECT'),
(7, '1002000002', 'STESOLID 5 MG RECT'),
(8, '1002000003', 'PULAREX  ACTIVATED 630 MG'),
(9, '1002000004', 'ONZAPINE /OLANZAPINE 5 MG'),
(10, '1002000005', 'ALGANAX 0,25 MG'),
(11, '1002000006', 'KETOPROFEN 100  MG'),
(12, '1000000001', 'CANGKANG CAPSUL'),
(13, '1001000001', 'DEPAKOT 250 MG'),
(14, '1001000002', 'BROIZ'),
(15, '1001000003', 'DEPAKOTE ER 500 MG'),
(16, '1001000004', 'DORNER TAB'),
(17, '1002000001', 'STESOLID 10 MG RECT'),
(18, '1002000002', 'STESOLID 5 MG RECT'),
(19, '1002000003', 'PULAREX  ACTIVATED 630 MG'),
(20, '1002000004', 'ONZAPINE /OLANZAPINE 5 MG'),
(21, '1002000005', 'ALGANAX 0,25 MG'),
(22, '1002000006', 'KETOPROFEN 100  MG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dim_penjual`
--

CREATE TABLE `dim_penjual` (
  `penjual_id` int(11) NOT NULL,
  `penjual_tempat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dim_penjual`
--

INSERT INTO `dim_penjual` (`penjual_id`, `penjual_tempat`) VALUES
(1, 'GUDANG OBAT'),
(2, 'GUDANG OBAT'),
(3, 'IGD'),
(4, 'IGD'),
(5, 'IGD'),
(6, 'IGD'),
(7, 'IGD'),
(8, 'APOTIK 1'),
(9, 'APOTIK 1'),
(10, 'APOTIK 1'),
(11, 'APOTIK 2'),
(12, 'GUDANG OBAT'),
(13, 'GUDANG OBAT'),
(14, 'IGD'),
(15, 'IGD'),
(16, 'IGD'),
(17, 'IGD'),
(18, 'IGD'),
(19, 'APOTIK 1'),
(20, 'APOTIK 1'),
(21, 'APOTIK 1'),
(22, 'APOTIK 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dim_produsen`
--

CREATE TABLE `dim_produsen` (
  `produsen_id` int(11) NOT NULL,
  `produsen_nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dim_produsen`
--

INSERT INTO `dim_produsen` (`produsen_id`, `produsen_nama`) VALUES
(1, 'INSTALASI RM & SIMRS'),
(2, 'ABBOTT'),
(3, 'ABBOTT'),
(4, 'ABBOTT'),
(5, 'ABBOTT'),
(6, 'ACTAVIS'),
(7, 'ACTAVIS'),
(8, 'ACTAVIS'),
(9, 'ACTAVIS'),
(10, 'ACTAVIS'),
(11, 'ACTAVIS'),
(12, 'INSTALASI RM & SIMRS'),
(13, 'ABBOTT'),
(14, 'ABBOTT'),
(15, 'ABBOTT'),
(16, 'ABBOTT'),
(17, 'ACTAVIS'),
(18, 'ACTAVIS'),
(19, 'ACTAVIS'),
(20, 'ACTAVIS'),
(21, 'ACTAVIS'),
(22, 'ACTAVIS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dim_waktu`
--

CREATE TABLE `dim_waktu` (
  `waktu_id` int(11) NOT NULL,
  `waktu` text NOT NULL,
  `waktu_hari` text NOT NULL,
  `waktu_bulan` text NOT NULL,
  `waktu_tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dim_waktu`
--

INSERT INTO `dim_waktu` (`waktu_id`, `waktu`, `waktu_hari`, `waktu_bulan`, `waktu_tahun`) VALUES
(1, '00:13:04', 'Kamis', '12', 2019),
(2, '00:13:04', 'Kamis', '12', 2019),
(3, '00:13:04', 'Kamis', '12', 2019),
(4, '00:13:04', 'Kamis', '12', 2019),
(5, '00:13:04', 'Kamis', '12', 2019),
(6, '00:13:04', 'Kamis', '12', 2019),
(7, '00:13:04', 'Kamis', '12', 2019),
(8, '00:13:04', 'Kamis', '12', 2019),
(9, '00:13:04', 'Kamis', '12', 2019),
(10, '00:13:04', 'Kamis', '12', 2019),
(11, '00:13:04', 'Kamis', '12', 2019),
(12, '14:25:02', 'Kamis', '12', 2019),
(13, '14:25:02', 'Kamis', '12', 2019),
(14, '14:25:02', 'Kamis', '12', 2019),
(15, '14:25:02', 'Kamis', '12', 2019),
(16, '14:25:02', 'Kamis', '12', 2019),
(17, '14:25:02', 'Kamis', '12', 2019),
(18, '14:25:02', 'Kamis', '12', 2019),
(19, '14:25:02', 'Kamis', '12', 2019),
(20, '14:25:02', 'Kamis', '12', 2019),
(21, '14:25:02', 'Kamis', '12', 2019),
(22, '14:25:02', 'Kamis', '12', 2019);

-- --------------------------------------------------------

--
-- Struktur dari tabel `excel_golongan`
--

CREATE TABLE `excel_golongan` (
  `golongan_id` int(11) NOT NULL,
  `golongan_nama` text NOT NULL,
  `golongan_keterangan` text NOT NULL,
  `golongan_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `excel_golongan`
--

INSERT INTO `excel_golongan` (`golongan_id`, `golongan_nama`, `golongan_keterangan`, `golongan_date_created`) VALUES
(1, 'BEBAS', 'asdsfsaf', '2019-12-11 10:32:27'),
(2, 'PSIKOTROPIKA', 'asdsfsaf', '2019-12-11 10:32:27'),
(3, 'BEBAS TERBATAS', 'asdsfsaf', '2019-12-11 10:32:27'),
(4, 'OBAT KERAS', 'asdsfsaf', '2019-12-11 10:32:27'),
(5, 'OBAT KERAS', 'asdsfsaf', '2019-12-11 10:32:27'),
(6, 'PSIKOTROPIKA', 'asdsfsaf', '2019-12-11 10:32:27'),
(7, 'PSIKOTROPIKA', 'asdsfsaf', '2019-12-11 10:32:27'),
(8, 'BEBAS TERBATAS', 'asdsfsaf', '2019-12-11 10:32:27'),
(9, 'OBAT KERAS', 'asdsfsaf', '2019-12-11 10:32:27'),
(10, 'PSIKOTROPIKA', 'asdsfsaf', '2019-12-11 10:32:27'),
(11, 'OBAT KERAS', 'asdsfsaf', '2019-12-11 10:32:27'),
(12, 'BEBAS', 'asdsfsaf', '2019-12-12 14:23:35'),
(13, 'PSIKOTROPIKA', 'asdsfsaf', '2019-12-12 14:23:35'),
(14, 'BEBAS TERBATAS', 'asdsfsaf', '2019-12-12 14:23:35'),
(15, 'OBAT KERAS', 'asdsfsaf', '2019-12-12 14:23:35'),
(16, 'OBAT KERAS', 'asdsfsaf', '2019-12-12 14:23:35'),
(17, 'PSIKOTROPIKA', 'asdsfsaf', '2019-12-12 14:23:35'),
(18, 'PSIKOTROPIKA', 'asdsfsaf', '2019-12-12 14:23:35'),
(19, 'BEBAS TERBATAS', 'asdsfsaf', '2019-12-12 14:23:35'),
(20, 'OBAT KERAS', 'asdsfsaf', '2019-12-12 14:23:35'),
(21, 'PSIKOTROPIKA', 'asdsfsaf', '2019-12-12 14:23:35'),
(22, 'OBAT KERAS', 'asdsfsaf', '2019-12-12 14:23:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `excel_kategori`
--

CREATE TABLE `excel_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` text NOT NULL,
  `kategori_keterangan` text NOT NULL,
  `kategori_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `excel_kategori`
--

INSERT INTO `excel_kategori` (`kategori_id`, `kategori_nama`, `kategori_keterangan`, `kategori_date_created`) VALUES
(1, 'ALKES', 'adsdas', '2019-12-11 10:32:27'),
(2, 'TABLET', 'adsdas', '2019-12-11 10:32:27'),
(3, 'SALEP', 'adsdas', '2019-12-11 10:32:27'),
(4, 'TABLET', 'adsdas', '2019-12-11 10:32:27'),
(5, 'TABLET', 'adsdas', '2019-12-11 10:32:27'),
(6, 'CAIRAN', 'adsdas', '2019-12-11 10:32:27'),
(7, 'CAIRAN', 'adsdas', '2019-12-11 10:32:27'),
(8, 'TABLET', 'adsdas', '2019-12-11 10:32:27'),
(9, 'TABLET', 'adsdas', '2019-12-11 10:32:27'),
(10, 'TABLET', 'adsdas', '2019-12-11 10:32:27'),
(11, 'TABLET', 'adsdas', '2019-12-11 10:32:27'),
(12, 'ALKES', 'adsdas', '2019-12-12 14:23:35'),
(13, 'TABLET', 'adsdas', '2019-12-12 14:23:35'),
(14, 'SALEP', 'adsdas', '2019-12-12 14:23:35'),
(15, 'TABLET', 'adsdas', '2019-12-12 14:23:35'),
(16, 'TABLET', 'adsdas', '2019-12-12 14:23:35'),
(17, 'CAIRAN', 'adsdas', '2019-12-12 14:23:35'),
(18, 'CAIRAN', 'adsdas', '2019-12-12 14:23:35'),
(19, 'TABLET', 'adsdas', '2019-12-12 14:23:35'),
(20, 'TABLET', 'adsdas', '2019-12-12 14:23:35'),
(21, 'TABLET', 'adsdas', '2019-12-12 14:23:35'),
(22, 'TABLET', 'adsdas', '2019-12-12 14:23:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `excel_obat`
--

CREATE TABLE `excel_obat` (
  `obat_id` int(11) NOT NULL,
  `obat_kode` text NOT NULL,
  `obat_nama` text NOT NULL,
  `obat_harga` text NOT NULL,
  `obat_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `excel_obat`
--

INSERT INTO `excel_obat` (`obat_id`, `obat_kode`, `obat_nama`, `obat_harga`, `obat_date_created`) VALUES
(1, '1000000001', 'CANGKANG CAPSUL', '28', '2019-12-11 10:32:27'),
(2, '1001000001', 'DEPAKOT 250 MG', '1200.1', '2019-12-11 10:32:27'),
(3, '1001000002', 'BROIZ', '44000', '2019-12-11 10:32:27'),
(4, '1001000003', 'DEPAKOTE ER 500 MG', '5927.9', '2019-12-11 10:32:27'),
(5, '1001000004', 'DORNER TAB', '4570.5', '2019-12-11 10:32:27'),
(6, '1002000001', 'STESOLID 10 MG RECT', '39204', '2019-12-11 10:32:27'),
(7, '1002000002', 'STESOLID 5 MG RECT', '26136', '2019-12-11 10:32:27'),
(8, '1002000003', 'PULAREX  ACTIVATED 630 MG', '210.001', '2019-12-11 10:32:27'),
(9, '1002000004', 'ONZAPINE /OLANZAPINE 5 MG', '3150.4', '2019-12-11 10:32:27'),
(10, '1002000005', 'ALGANAX 0,25 MG', '3150.4', '2019-12-11 10:32:27'),
(11, '1002000006', 'KETOPROFEN 100  MG', '1320', '2019-12-11 10:32:27'),
(12, '1000000001', 'CANGKANG CAPSUL', '28', '2019-12-12 14:23:35'),
(13, '1001000001', 'DEPAKOT 250 MG', '1200.1', '2019-12-12 14:23:35'),
(14, '1001000002', 'BROIZ', '44000', '2019-12-12 14:23:35'),
(15, '1001000003', 'DEPAKOTE ER 500 MG', '5927.9', '2019-12-12 14:23:35'),
(16, '1001000004', 'DORNER TAB', '4570.5', '2019-12-12 14:23:35'),
(17, '1002000001', 'STESOLID 10 MG RECT', '39204', '2019-12-12 14:23:35'),
(18, '1002000002', 'STESOLID 5 MG RECT', '26136', '2019-12-12 14:23:35'),
(19, '1002000003', 'PULAREX  ACTIVATED 630 MG', '210.001', '2019-12-12 14:23:35'),
(20, '1002000004', 'ONZAPINE /OLANZAPINE 5 MG', '3150.4', '2019-12-12 14:23:35'),
(21, '1002000005', 'ALGANAX 0,25 MG', '3150.4', '2019-12-12 14:23:35'),
(22, '1002000006', 'KETOPROFEN 100  MG', '1320', '2019-12-12 14:23:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `excel_penjual`
--

CREATE TABLE `excel_penjual` (
  `penjual_id` int(11) NOT NULL,
  `penjual_tempat` text NOT NULL,
  `penjual_jenis_bayar` text NOT NULL,
  `penjual_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `excel_penjual`
--

INSERT INTO `excel_penjual` (`penjual_id`, `penjual_tempat`, `penjual_jenis_bayar`, `penjual_date_created`) VALUES
(1, 'GUDANG OBAT', 'LAINNYA', '2019-12-11 10:32:27'),
(2, 'GUDANG OBAT', 'LAINNYA', '2019-12-11 10:32:27'),
(3, 'IGD', 'LAINNYA', '2019-12-11 10:32:27'),
(4, 'IGD', 'NON ASKES', '2019-12-11 10:32:27'),
(5, 'IGD', 'NON ASKES', '2019-12-11 10:32:27'),
(6, 'IGD', 'ASKES', '2019-12-11 10:32:27'),
(7, 'IGD', 'NON ASKES', '2019-12-11 10:32:27'),
(8, 'APOTIK 1', 'ASKES', '2019-12-11 10:32:27'),
(9, 'APOTIK 1', 'LAINNYA', '2019-12-11 10:32:27'),
(10, 'APOTIK 1', 'ASKES', '2019-12-11 10:32:27'),
(11, 'APOTIK 2', 'LAINNYA', '2019-12-11 10:32:27'),
(12, 'GUDANG OBAT', 'LAINNYA', '2019-12-12 14:23:35'),
(13, 'GUDANG OBAT', 'LAINNYA', '2019-12-12 14:23:35'),
(14, 'IGD', 'LAINNYA', '2019-12-12 14:23:35'),
(15, 'IGD', 'NON ASKES', '2019-12-12 14:23:35'),
(16, 'IGD', 'NON ASKES', '2019-12-12 14:23:35'),
(17, 'IGD', 'ASKES', '2019-12-12 14:23:35'),
(18, 'IGD', 'NON ASKES', '2019-12-12 14:23:35'),
(19, 'APOTIK 1', 'ASKES', '2019-12-12 14:23:35'),
(20, 'APOTIK 1', 'LAINNYA', '2019-12-12 14:23:35'),
(21, 'APOTIK 1', 'ASKES', '2019-12-12 14:23:35'),
(22, 'APOTIK 2', 'LAINNYA', '2019-12-12 14:23:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `excel_produsen`
--

CREATE TABLE `excel_produsen` (
  `produsen_id` int(11) NOT NULL,
  `produsen_nama` text NOT NULL,
  `produsen_tempat` text NOT NULL,
  `produsen_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `excel_produsen`
--

INSERT INTO `excel_produsen` (`produsen_id`, `produsen_nama`, `produsen_tempat`, `produsen_date_created`) VALUES
(1, 'INSTALASI RM & SIMRS', 'disana', '2019-12-11 10:32:27'),
(2, 'ABBOTT', 'disana', '2019-12-11 10:32:27'),
(3, 'ABBOTT', 'disana', '2019-12-11 10:32:27'),
(4, 'ABBOTT', 'disana', '2019-12-11 10:32:27'),
(5, 'ABBOTT', 'disana', '2019-12-11 10:32:27'),
(6, 'ACTAVIS', 'disana', '2019-12-11 10:32:27'),
(7, 'ACTAVIS', 'disana', '2019-12-11 10:32:27'),
(8, 'ACTAVIS', 'disana', '2019-12-11 10:32:27'),
(9, 'ACTAVIS', 'disana', '2019-12-11 10:32:27'),
(10, 'ACTAVIS', 'disana', '2019-12-11 10:32:27'),
(11, 'ACTAVIS', 'disana', '2019-12-11 10:32:27'),
(12, 'INSTALASI RM & SIMRS', 'disana', '2019-12-12 14:23:35'),
(13, 'ABBOTT', 'disana', '2019-12-12 14:23:35'),
(14, 'ABBOTT', 'disana', '2019-12-12 14:23:35'),
(15, 'ABBOTT', 'disana', '2019-12-12 14:23:35'),
(16, 'ABBOTT', 'disana', '2019-12-12 14:23:35'),
(17, 'ACTAVIS', 'disana', '2019-12-12 14:23:35'),
(18, 'ACTAVIS', 'disana', '2019-12-12 14:23:35'),
(19, 'ACTAVIS', 'disana', '2019-12-12 14:23:35'),
(20, 'ACTAVIS', 'disana', '2019-12-12 14:23:35'),
(21, 'ACTAVIS', 'disana', '2019-12-12 14:23:35'),
(22, 'ACTAVIS', 'disana', '2019-12-12 14:23:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fact_penjualan`
--

CREATE TABLE `fact_penjualan` (
  `id_fact` int(11) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `id_penjual` int(11) NOT NULL,
  `id_produsen` int(11) NOT NULL,
  `id_waktu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fact_penjualan`
--

INSERT INTO `fact_penjualan` (`id_fact`, `id_golongan`, `id_kategori`, `id_obat`, `id_penjual`, `id_produsen`, `id_waktu`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 2, 2, 2, 2, 2, 2),
(3, 3, 3, 3, 3, 3, 3),
(4, 4, 4, 4, 4, 4, 4),
(5, 5, 5, 5, 5, 5, 5),
(6, 6, 6, 6, 6, 6, 6),
(7, 7, 7, 7, 7, 7, 7),
(8, 8, 8, 8, 8, 8, 8),
(9, 9, 9, 9, 9, 9, 9),
(10, 10, 10, 10, 10, 10, 10),
(11, 11, 11, 11, 11, 11, 11),
(12, 1, 1, 1, 1, 1, 1),
(13, 2, 2, 2, 2, 2, 2),
(14, 3, 3, 3, 3, 3, 3),
(15, 4, 4, 4, 4, 4, 4),
(16, 5, 5, 5, 5, 5, 5),
(17, 6, 6, 6, 6, 6, 6),
(18, 7, 7, 7, 7, 7, 7),
(19, 8, 8, 8, 8, 8, 8),
(20, 9, 9, 9, 9, 9, 9),
(21, 10, 10, 10, 10, 10, 10),
(22, 11, 11, 11, 11, 11, 11),
(23, 12, 12, 12, 12, 12, 12),
(24, 13, 13, 13, 13, 13, 13),
(25, 14, 14, 14, 14, 14, 14),
(26, 15, 15, 15, 15, 15, 15),
(27, 16, 16, 16, 16, 16, 16),
(28, 17, 17, 17, 17, 17, 17),
(29, 18, 18, 18, 18, 18, 18),
(30, 19, 19, 19, 19, 19, 19),
(31, 20, 20, 20, 20, 20, 20),
(32, 21, 21, 21, 21, 21, 21),
(33, 22, 22, 22, 22, 22, 22),
(34, 1, 1, 1, 1, 1, 1),
(35, 2, 2, 2, 2, 2, 2),
(36, 3, 3, 3, 3, 3, 3),
(37, 4, 4, 4, 4, 4, 4),
(38, 5, 5, 5, 5, 5, 5),
(39, 6, 6, 6, 6, 6, 6),
(40, 7, 7, 7, 7, 7, 7),
(41, 8, 8, 8, 8, 8, 8),
(42, 9, 9, 9, 9, 9, 9),
(43, 10, 10, 10, 10, 10, 10),
(44, 11, 11, 11, 11, 11, 11),
(45, 12, 12, 12, 12, 12, 12),
(46, 13, 13, 13, 13, 13, 13),
(47, 14, 14, 14, 14, 14, 14),
(48, 15, 15, 15, 15, 15, 15),
(49, 16, 16, 16, 16, 16, 16),
(50, 17, 17, 17, 17, 17, 17),
(51, 18, 18, 18, 18, 18, 18),
(52, 19, 19, 19, 19, 19, 19),
(53, 20, 20, 20, 20, 20, 20),
(54, 21, 21, 21, 21, 21, 21),
(55, 22, 22, 22, 22, 22, 22),
(56, 1, 1, 1, 1, 1, 1),
(57, 2, 2, 2, 2, 2, 2),
(58, 3, 3, 3, 3, 3, 3),
(59, 4, 4, 4, 4, 4, 4),
(60, 5, 5, 5, 5, 5, 5),
(61, 6, 6, 6, 6, 6, 6),
(62, 7, 7, 7, 7, 7, 7),
(63, 8, 8, 8, 8, 8, 8),
(64, 9, 9, 9, 9, 9, 9),
(65, 10, 10, 10, 10, 10, 10),
(66, 11, 11, 11, 11, 11, 11),
(67, 12, 12, 12, 12, 12, 12),
(68, 13, 13, 13, 13, 13, 13),
(69, 14, 14, 14, 14, 14, 14),
(70, 15, 15, 15, 15, 15, 15),
(71, 16, 16, 16, 16, 16, 16),
(72, 17, 17, 17, 17, 17, 17),
(73, 18, 18, 18, 18, 18, 18),
(74, 19, 19, 19, 19, 19, 19),
(75, 20, 20, 20, 20, 20, 20),
(76, 21, 21, 21, 21, 21, 21),
(77, 22, 22, 22, 22, 22, 22),
(78, 1, 1, 1, 1, 1, 1),
(79, 2, 2, 2, 2, 2, 2),
(80, 3, 3, 3, 3, 3, 3),
(81, 4, 4, 4, 4, 4, 4),
(82, 5, 5, 5, 5, 5, 5),
(83, 6, 6, 6, 6, 6, 6),
(84, 7, 7, 7, 7, 7, 7),
(85, 8, 8, 8, 8, 8, 8),
(86, 9, 9, 9, 9, 9, 9),
(87, 10, 10, 10, 10, 10, 10),
(88, 11, 11, 11, 11, 11, 11),
(89, 12, 12, 12, 12, 12, 12),
(90, 13, 13, 13, 13, 13, 13),
(91, 14, 14, 14, 14, 14, 14),
(92, 15, 15, 15, 15, 15, 15),
(93, 16, 16, 16, 16, 16, 16),
(94, 17, 17, 17, 17, 17, 17),
(95, 18, 18, 18, 18, 18, 18),
(96, 19, 19, 19, 19, 19, 19),
(97, 20, 20, 20, 20, 20, 20),
(98, 21, 21, 21, 21, 21, 21),
(99, 22, 22, 22, 22, 22, 22);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `kode_obat` varchar(12) NOT NULL,
  `jenis_obat` enum('OBAT','ALKES') NOT NULL,
  `nama_obat` varchar(20) NOT NULL,
  `bentuk_obat` enum('ALKES','TABLET','SALEP','CAIRAN','SIRUP','INJEKSI') NOT NULL,
  `golongan_obat` enum('BEBAS','PSIKOTROPIKA','BEBAS TERBATAS','OBAT KERAS','ALKES') NOT NULL,
  `kelompok_obat` enum('LAINNYA','ASKES','NON ASKES') NOT NULL,
  `harga_pembelian` bigint(20) NOT NULL,
  `persediaan_obat` int(11) NOT NULL,
  `produsen_obat` varchar(20) NOT NULL,
  `tgl_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_expired` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`kode_obat`, `jenis_obat`, `nama_obat`, `bentuk_obat`, `golongan_obat`, `kelompok_obat`, `harga_pembelian`, `persediaan_obat`, `produsen_obat`, `tgl_update`, `tgl_expired`) VALUES
('09921', 'ALKES', 'asdsadsad', 'SALEP', 'BEBAS', 'ASKES', 3, 1, '2', '2018-10-09 03:09:18', '2020-11-10'),
('1000000001', 'OBAT', 'CANGKANG CAPSUL', 'ALKES', 'BEBAS', 'LAINNYA', 28, 15, '1', '2018-10-10 03:09:18', '2018-10-10'),
('1000000099', 'OBAT', 'CANGKANG CAPSUL', 'ALKES', 'BEBAS', 'LAINNYA', 28, 15, '1', '2018-10-09 03:09:18', '2018-10-09'),
('1000000100', 'OBAT', 'ACETOSAL', 'TABLET', 'BEBAS', 'LAINNYA', 122, 12, '10', '2017-10-09 03:09:19', '2017-10-10'),
('1000000101', 'OBAT', 'FLUNARIZIN 5MG', 'TABLET', 'BEBAS TERBATAS', 'LAINNYA', 1238, 16, '28', '2016-10-09 03:09:19', '2018-10-10'),
('1000000102', 'OBAT', 'EPINEPRIN INJ', 'INJEKSI', 'PSIKOTROPIKA', 'LAINNYA', 2354, 13, '16', '2015-10-09 03:09:20', '2017-10-11'),
('1000000103', 'OBAT', 'CEFIXIME 100 MG', 'TABLET', 'BEBAS TERBATAS', 'LAINNYA', 750, 17, '42', '2018-10-09 03:09:20', '2018-10-11'),
('1000000104', 'OBAT', 'CEFIXIME SP', 'SIRUP', 'BEBAS TERBATAS', 'LAINNYA', 5530, 14, '49', '2017-10-09 03:09:21', '2019-10-12'),
('1000000105', 'OBAT', 'MOFACORT CREAM', 'SALEP', 'OBAT KERAS', 'LAINNYA', 66550, 18, '10', '2019-10-09 03:09:21', '2018-10-12'),
('1001000001', 'OBAT', 'DEPAKOT 250 MG', 'TABLET', 'PSIKOTROPIKA', 'LAINNYA', 1200, 14, '2', '2018-10-10 03:09:19', '2018-10-11'),
('1001000002', 'OBAT', 'BROIZ', 'SALEP', 'BEBAS TERBATAS', 'LAINNYA', 44000, 13, '3', '2018-10-10 03:09:20', '2018-10-12'),
('1001000003', 'OBAT', 'DEPAKOTE ER 500 MG', 'TABLET', 'OBAT KERAS', 'LAINNYA', 5928, 12, '4', '2018-10-10 03:09:21', '2018-10-13'),
('1001000004', 'OBAT', 'DORNER TAB', 'TABLET', 'OBAT KERAS', 'LAINNYA', 4571, 11, '5', '2018-10-10 03:09:22', '2018-10-14'),
('1002000001', 'OBAT', 'STESOLID 10 MG RECT', 'CAIRAN', 'PSIKOTROPIKA', 'LAINNYA', 39204, 10, '6', '2018-10-10 03:09:23', '2018-10-15'),
('1002000002', 'OBAT', 'STESOLID 5 MG RECT', 'CAIRAN', 'PSIKOTROPIKA', 'LAINNYA', 26136, 9, '7', '2018-10-10 03:09:24', '2018-10-16'),
('1002000003', 'OBAT', 'PULAREX  ACTIVATED 6', 'TABLET', 'BEBAS TERBATAS', 'LAINNYA', 210, 8, '8', '2018-10-10 03:09:25', '2018-10-17'),
('1002000004', 'OBAT', 'ONZAPINE /OLANZAPINE', 'TABLET', 'OBAT KERAS', 'LAINNYA', 3150, 7, '9', '2018-10-10 03:09:26', '2018-10-18'),
('1002000005', 'OBAT', 'ALGANAX 0,25 MG', 'TABLET', 'PSIKOTROPIKA', 'LAINNYA', 0, 6, '10', '2018-10-10 03:09:27', '2018-10-19'),
('1002000006', 'OBAT', 'KETOPROFEN 100  MG', 'TABLET', 'OBAT KERAS', 'LAINNYA', 1320, 5, '11', '2018-10-10 03:09:28', '2018-10-20'),
('1002000007', 'OBAT', 'SIFROL 0.375 ER', 'TABLET', 'OBAT KERAS', 'ASKES', 9545, 4, '12', '2018-10-10 03:09:29', '2018-10-21'),
('1002000008', 'OBAT', 'VITAMIN B 6 25 MG', 'TABLET', 'BEBAS', 'LAINNYA', 0, 3, '13', '2018-10-10 03:09:30', '2018-10-22'),
('1111111', 'OBAT', 'uvuwewew', 'ALKES', 'PSIKOTROPIKA', '', 2, 1, '2', '2019-09-27 10:23:24', '2018-08-26'),
('1212', 'ALKES', 'www', 'TABLET', 'BEBAS', '', -2, 2, '4', '2019-10-03 04:02:32', '2019-11-04'),
('121212112', 'ALKES', 'tttt', 'TABLET', 'BEBAS', '', 3, 19, '4', '2019-10-03 04:04:14', '2017-10-02'),
('223232', 'OBAT', 'jahanam', 'INJEKSI', 'BEBAS', '', 2, 3, '2', '2019-10-09 03:10:04', '2015-10-08'),
('555', 'OBAT', 'formalin', 'TABLET', 'BEBAS', '', 4, 55, '5', '2019-10-03 04:03:34', '2020-11-04'),
('90909', 'OBAT', 'borak', 'CAIRAN', 'BEBAS', 'NON ASKES', 3, 2, '1', '2019-10-09 03:11:20', '2016-10-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `user_name`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'ryoo', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `tgl_transaksi` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `jenis_transaksi` enum('PENJUALAN','PEMBELIAN','KOREKSI PERSEDIAAN','MUTASI','KOREKSI PENJUALAN') NOT NULL,
  `nama_obat` varchar(20) NOT NULL,
  `tempat_obat` enum('GUDANG OBAT','IGD','APOTIK 1') NOT NULL,
  `kategori` enum('LAINNYA','ASKES','NONASKES') NOT NULL,
  `debet` int(10) NOT NULL,
  `kredit` int(10) NOT NULL,
  `biaya` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tgl_transaksi`, `jenis_transaksi`, `nama_obat`, `tempat_obat`, `kategori`, `debet`, `kredit`, `biaya`) VALUES
(3, '2019-09-05 22:45:57', 'PENJUALAN', 'asd', 'GUDANG OBAT', 'LAINNYA', 1221, 1212, 121),
(4, '2018-09-06 03:48:32', 'PENJUALAN', 'asas', 'GUDANG OBAT', 'NONASKES', 111, 111, 111),
(5, '2018-09-27 15:03:23', 'PENJUALAN', 'panadon', 'GUDANG OBAT', 'LAINNYA', 2, 2, 20),
(6, '2018-10-09 04:00:50', 'KOREKSI PERSEDIAAN', 'rusuh', 'GUDANG OBAT', 'LAINNYA', 2, 3, 2),
(7, '2017-10-09 04:01:04', 'MUTASI', 'qwewqeqwe', 'GUDANG OBAT', 'LAINNYA', 2, 2, 4),
(8, '2015-10-09 04:01:20', 'PENJUALAN', 'obat', 'GUDANG OBAT', 'ASKES', 2, 4, 5),
(9, '2016-10-09 04:02:03', 'KOREKSI PERSEDIAAN', 'horam', 'IGD', 'LAINNYA', 2, 3, 4),
(10, '2019-10-09 06:46:03', 'PENJUALAN', 'asdasd', 'GUDANG OBAT', 'NONASKES', 1212, 1212, 21221),
(11, '2019-11-10 18:58:36', 'PENJUALAN', 'dadasasdda', 'IGD', 'NONASKES', 13, 12, 123),
(12, '2016-09-05 22:45:57', 'PEMBELIAN', 'AMOXYCILIN 500 MG', 'GUDANG OBAT', 'ASKES', 70, 0, 17149671000),
(13, '2017-09-05 22:45:58', 'PEMBELIAN', 'FUCILEX KRIM', 'GUDANG OBAT', 'ASKES', 100, 0, 707850),
(14, '2019-09-05 22:45:59', 'PEMBELIAN', 'ALLETROL COMPOSITUM ', 'GUDANG OBAT', 'ASKES', 12, 0, 189552),
(16, '2019-09-05 22:45:57', 'PEMBELIAN', 'GENOINT CREAM 15 G', 'GUDANG OBAT', 'ASKES', 330, 0, 1976535),
(17, '2019-09-05 22:45:58', 'PEMBELIAN', 'RANITIDIN 150 MG', 'GUDANG OBAT', 'ASKES', 1000, 0, 192500),
(18, '2016-09-05 22:45:59', 'PEMBELIAN', 'MEZAC 50 / KALIUM DI', 'GUDANG OBAT', 'ASKES', 250, 0, 82225),
(20, '2019-09-05 22:45:57', 'PEMBELIAN', 'KLODERMA CREAM', 'GUDANG OBAT', 'NONASKES', 30, 0, 1033197),
(21, '2019-09-05 22:45:58', 'PEMBELIAN', 'PIROTOP CREAM', 'GUDANG OBAT', 'NONASKES', 50, 0, 2949980),
(22, '2019-09-05 22:45:59', 'PEMBELIAN', 'AMBROXOL 30 MG-2019', 'GUDANG OBAT', 'NONASKES', 500, 0, 53900),
(24, '2019-09-05 22:45:57', 'PENJUALAN', 'CLOZAPIN 25 MG', 'IGD', 'NONASKES', 0, 1, -1289),
(25, '2019-09-05 22:45:58', 'PENJUALAN', 'HALOPERIDOL 5 MG', 'IGD', 'NONASKES', 0, 1, -154),
(26, '2015-09-05 22:45:59', 'PENJUALAN', 'TRIHEKSYPHENIDIL 2 M', 'IGD', 'LAINNYA', 0, 10, -1000),
(28, '2020-09-05 22:45:51', 'PENJUALAN', 'HALOPERIDOL 5 MG', 'IGD', 'LAINNYA', 0, 30, -4620),
(29, '2016-09-05 22:45:57', 'PEMBELIAN', 'AMOXYCILIN 500 MG', 'GUDANG OBAT', 'ASKES', 70, 0, 17149671000),
(30, '2017-09-05 22:45:58', 'PEMBELIAN', 'FUCILEX KRIM', 'GUDANG OBAT', 'ASKES', 100, 0, 707850),
(31, '2019-09-05 22:45:59', 'PEMBELIAN', 'ALLETROL COMPOSITUM ', 'GUDANG OBAT', 'ASKES', 12, 0, 189552),
(32, '2019-09-05 22:45:57', 'PEMBELIAN', 'GENOINT CREAM 15 G', 'GUDANG OBAT', 'ASKES', 330, 0, 1976535),
(33, '2019-09-05 22:45:58', 'PEMBELIAN', 'RANITIDIN 150 MG', 'GUDANG OBAT', 'ASKES', 1000, 0, 192500),
(34, '2016-09-05 22:45:59', 'PEMBELIAN', 'MEZAC 50 / KALIUM DI', 'GUDANG OBAT', 'ASKES', 250, 0, 82225),
(35, '2019-09-05 22:45:57', 'PEMBELIAN', 'KLODERMA CREAM', 'GUDANG OBAT', 'NONASKES', 30, 0, 1033197),
(36, '2019-09-05 22:45:58', 'PEMBELIAN', 'PIROTOP CREAM', 'GUDANG OBAT', 'NONASKES', 50, 0, 2949980),
(37, '2019-09-05 22:45:59', 'PEMBELIAN', 'AMBROXOL 30 MG-2019', 'GUDANG OBAT', 'NONASKES', 500, 0, 53900),
(38, '2019-09-05 22:45:57', 'PENJUALAN', 'CLOZAPIN 25 MG', 'IGD', 'NONASKES', 0, 1, -1289),
(39, '2019-09-05 22:45:58', 'PENJUALAN', 'HALOPERIDOL 5 MG', 'IGD', 'NONASKES', 0, 1, -154),
(40, '2015-09-05 22:45:59', 'PENJUALAN', 'TRIHEKSYPHENIDIL 2 M', 'IGD', 'LAINNYA', 0, 10, -1000),
(41, '2020-09-05 22:45:51', 'PENJUALAN', 'HALOPERIDOL 5 MG', 'IGD', 'LAINNYA', 0, 30, -4620),
(42, '2016-09-05 22:45:57', 'PEMBELIAN', 'AMOXYCILIN 500 MG', 'GUDANG OBAT', 'ASKES', 70, 0, 17149671000),
(43, '2017-09-05 22:45:58', 'PEMBELIAN', 'FUCILEX KRIM', 'GUDANG OBAT', 'ASKES', 100, 0, 707850),
(44, '2019-09-05 22:45:59', 'PEMBELIAN', 'ALLETROL COMPOSITUM ', 'GUDANG OBAT', 'ASKES', 12, 0, 189552),
(45, '2019-09-05 22:45:57', 'PEMBELIAN', 'GENOINT CREAM 15 G', 'GUDANG OBAT', 'ASKES', 330, 0, 1976535),
(46, '2019-09-05 22:45:58', 'PEMBELIAN', 'RANITIDIN 150 MG', 'GUDANG OBAT', 'ASKES', 1000, 0, 192500),
(47, '2016-09-05 22:45:59', 'PEMBELIAN', 'MEZAC 50 / KALIUM DI', 'GUDANG OBAT', 'ASKES', 250, 0, 82225),
(48, '2019-09-05 22:45:57', 'PEMBELIAN', 'KLODERMA CREAM', 'GUDANG OBAT', 'NONASKES', 30, 0, 1033197),
(49, '2019-09-05 22:45:58', 'PEMBELIAN', 'PIROTOP CREAM', 'GUDANG OBAT', 'NONASKES', 50, 0, 2949980),
(50, '2019-09-05 22:45:59', 'PEMBELIAN', 'AMBROXOL 30 MG-2019', 'GUDANG OBAT', 'NONASKES', 500, 0, 53900),
(51, '2019-09-05 22:45:57', 'PENJUALAN', 'CLOZAPIN 25 MG', 'IGD', 'NONASKES', 0, 1, -1289),
(52, '2019-09-05 22:45:58', 'PENJUALAN', 'HALOPERIDOL 5 MG', 'IGD', 'NONASKES', 0, 1, -154),
(53, '2015-09-05 22:45:59', 'PENJUALAN', 'TRIHEKSYPHENIDIL 2 M', 'IGD', 'LAINNYA', 0, 10, -1000),
(54, '2020-09-05 22:45:51', 'PENJUALAN', 'HALOPERIDOL 5 MG', 'IGD', 'LAINNYA', 0, 30, -4620);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dim_golongan`
--
ALTER TABLE `dim_golongan`
  ADD PRIMARY KEY (`golongan_id`);

--
-- Indeks untuk tabel `dim_kategori`
--
ALTER TABLE `dim_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `dim_obat`
--
ALTER TABLE `dim_obat`
  ADD PRIMARY KEY (`obat_id`);

--
-- Indeks untuk tabel `dim_penjual`
--
ALTER TABLE `dim_penjual`
  ADD PRIMARY KEY (`penjual_id`);

--
-- Indeks untuk tabel `dim_produsen`
--
ALTER TABLE `dim_produsen`
  ADD PRIMARY KEY (`produsen_id`);

--
-- Indeks untuk tabel `dim_waktu`
--
ALTER TABLE `dim_waktu`
  ADD PRIMARY KEY (`waktu_id`);

--
-- Indeks untuk tabel `excel_golongan`
--
ALTER TABLE `excel_golongan`
  ADD PRIMARY KEY (`golongan_id`);

--
-- Indeks untuk tabel `excel_kategori`
--
ALTER TABLE `excel_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `excel_obat`
--
ALTER TABLE `excel_obat`
  ADD PRIMARY KEY (`obat_id`);

--
-- Indeks untuk tabel `excel_penjual`
--
ALTER TABLE `excel_penjual`
  ADD PRIMARY KEY (`penjual_id`);

--
-- Indeks untuk tabel `excel_produsen`
--
ALTER TABLE `excel_produsen`
  ADD PRIMARY KEY (`produsen_id`);

--
-- Indeks untuk tabel `fact_penjualan`
--
ALTER TABLE `fact_penjualan`
  ADD PRIMARY KEY (`id_fact`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kode_obat`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dim_waktu`
--
ALTER TABLE `dim_waktu`
  MODIFY `waktu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `excel_golongan`
--
ALTER TABLE `excel_golongan`
  MODIFY `golongan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `excel_kategori`
--
ALTER TABLE `excel_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `excel_obat`
--
ALTER TABLE `excel_obat`
  MODIFY `obat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `excel_penjual`
--
ALTER TABLE `excel_penjual`
  MODIFY `penjual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `excel_produsen`
--
ALTER TABLE `excel_produsen`
  MODIFY `produsen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `fact_penjualan`
--
ALTER TABLE `fact_penjualan`
  MODIFY `id_fact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
