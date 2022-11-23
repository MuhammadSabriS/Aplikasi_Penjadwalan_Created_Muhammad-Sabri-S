-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Sep 2022 pada 05.26
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scheduling`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bulan`
--

CREATE TABLE `bulan` (
  `id_bln` int(10) NOT NULL,
  `nama_bln` varchar(25) NOT NULL,
  `nama_bln2` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bulan`
--

INSERT INTO `bulan` (`id_bln`, `nama_bln`, `nama_bln2`) VALUES
(1, 'Jan', 'Januari'),
(2, 'Feb', 'Februari'),
(3, 'Mar', 'Maret'),
(4, 'Apr', 'April'),
(5, 'May', 'Mei'),
(6, 'Jun', 'Juni'),
(7, 'Jul', 'Juli'),
(8, 'Aug', 'Sep'),
(9, 'Sep', 'September'),
(10, 'Oct', 'Oktober'),
(11, 'Nov', 'November'),
(12, 'Dec', 'Desember');

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatan`
--

CREATE TABLE `catatan` (
  `id_cat` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_bln` int(10) NOT NULL,
  `id_hri` int(10) NOT NULL,
  `id_tgl` int(10) NOT NULL,
  `isi_cat` longtext NOT NULL,
  `status_cat` enum('Menunggu','Dikonfirmasi','Ditolak') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `catatan`
--

INSERT INTO `catatan` (`id_cat`, `id_user`, `id_bln`, `id_hri`, `id_tgl`, `isi_cat`, `status_cat`) VALUES
(52, 2, 10, 2, 12, 'TESS', 'Menunggu'),
(60, 12, 10, 4, 21, 'Cekk!!', 'Menunggu'),
(59, 2, 10, 3, 13, 'Cek Cek!!', 'Menunggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_absen`
--

CREATE TABLE `data_absen` (
  `id_absen` int(11) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `id_bln` int(10) NOT NULL,
  `id_hri` int(10) NOT NULL,
  `id_tgl` int(10) NOT NULL,
  `jam_msk` varchar(50) NOT NULL,
  `ttd_masuk` varchar(255) DEFAULT NULL,
  `st_jam_msk` enum('Menunggu','Dikonfirmasi','Ditolak') NOT NULL,
  `jam_klr` varchar(50) NOT NULL,
  `ttd_keluar` text DEFAULT NULL,
  `st_jam_klr` enum('Belum Absen','Menunggu','Dikonfirmasi','Ditolak') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_absen`
--

INSERT INTO `data_absen` (`id_absen`, `id_user`, `id_bln`, `id_hri`, `id_tgl`, `jam_msk`, `ttd_masuk`, `st_jam_msk`, `jam_klr`, `ttd_keluar`, `st_jam_klr`) VALUES
(108, '7', 10, 4, 21, '15.56 WITA', '61711d391d7dd.png', 'Menunggu', '', NULL, 'Belum Absen'),
(107, '12', 10, 4, 21, '15.45 WITA', '61711aafdcbff.png', 'Menunggu', '15.46 WITA', '61711ac235d28.png', 'Menunggu'),
(106, '2', 10, 4, 21, '15.13 WITA', '6171131ebe3f2.png', 'Menunggu', '15.46 WITA', '61711acb614ba.png', 'Menunggu'),
(105, '7', 10, 2, 19, '13.45 WITA', '616e5b5f21ef7.png', 'Menunggu', '13.45 WITA', '616e5b684998f.png', 'Menunggu'),
(104, '3', 10, 2, 19, '13.44 WITA', '616e5b3c52a79.png', 'Menunggu', '13.44 WITA', '616e5b4342325.png', 'Menunggu'),
(103, '4', 10, 2, 19, '13.43 WITA', '616e5b15550cd.png', 'Menunggu', '13.43 WITA', '616e5b1c9b2de.png', 'Menunggu'),
(102, '2', 10, 2, 19, '13.42 WITA', '616e5ad46de55.png', 'Menunggu', '13.42 WITA', '616e5add54e7b.png', 'Menunggu'),
(101, '6', 10, 2, 19, '13.41 WITA', '616e5a719ee82.png', 'Menunggu', '13.41 WITA', '616e5a797689d.png', 'Menunggu'),
(100, '10', 10, 2, 19, '13.40 WITA', '616e5a491f758.png', 'Menunggu', '13.40 WITA', '616e5a50adfd4.png', 'Menunggu'),
(99, '8', 10, 2, 19, '13.39 WITA', '616e5a0dde0d2.png', 'Menunggu', '13.39 WITA', '616e5a14e57e1.png', 'Menunggu'),
(98, '9', 10, 2, 19, '13.38 WITA', '616e59e97065d.png', 'Menunggu', '13.38 WITA', '616e59f2f04f6.png', 'Menunggu'),
(97, '11', 10, 2, 19, '13.38 WITA', '616e59bf2273d.png', 'Menunggu', '13.38 WITA', '616e59c9466ed.png', 'Menunggu'),
(96, '5', 10, 2, 19, '13.37 WITA', '616e5994afec8.png', 'Menunggu', '13.37 WITA', '616e599e8683e.png', 'Menunggu'),
(94, '12', 10, 5, 15, '16.38 WITA', '61693e0a26865.png', 'Menunggu', '21.06 WITA', '61697ce5ac33c.png', 'Menunggu'),
(93, '3', 10, 5, 15, '12.08 WITA', '6168feb1af27c.png', 'Menunggu', '12.08 WITA', '6168feb9e8305.png', 'Menunggu'),
(95, '12', 10, 2, 19, '13.36 WITA', '616e59675cf55.png', 'Menunggu', '13.36 WITA', '616e59752adfe.png', 'Menunggu'),
(92, '2', 10, 5, 15, '12.07 WITA', '6168fe7bae89b.png', 'Menunggu', '12.07 WITA', '6168fe86de59e.png', 'Menunggu'),
(109, '3', 10, 5, 22, '11.49 WITA', '617234d8ddd7e.png', 'Menunggu', '11.50 WITA', '617234f2de08c.png', 'Menunggu'),
(110, '2', 10, 5, 22, '11.52 WITA', '617235891010e.png', 'Menunggu', '', NULL, 'Belum Absen'),
(111, '6', 10, 5, 22, '14.35 WITA', '61725bb89f5b9.png', 'Menunggu', '14.40 WITA', '61725ce0c3336.png', 'Menunggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_bahan`
--

CREATE TABLE `detail_bahan` (
  `id_user` int(10) DEFAULT NULL,
  `nama_bahan` varchar(25) DEFAULT NULL,
  `merk_bahan` varchar(25) DEFAULT NULL,
  `kode_rak` varchar(25) NOT NULL,
  `harga_beli` varchar(50) NOT NULL,
  `harga_jual` varchar(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_bahan`
--

INSERT INTO `detail_bahan` (`id_user`, `nama_bahan`, `merk_bahan`, `kode_rak`, `harga_beli`, `harga_jual`, `keterangan`) VALUES
(27, 'Spanduk', 'Erdrobe', '2B', '20.000/meter', '25.000/meter', 'dalam lemari kaca'),
(28, 'Sticker Timbul', 'Agraris (Timbul Licin)', '1B', '10.000/meter', '12.000/meter', 'di lantai 1 '),
(42, 'Tinta Hitam', 'Leadjet', '2B', '13.000/botol', '20.000/botol', 'dalam lemari kaca dibawah'),
(43, 'Tinta Biru', 'KSF Ink', '2B', '13.000/botol', '20.000/botol', 'dalam lemari kaca dibawah'),
(44, 'Tinta Merah', 'Leadjet', '2C', '13.000/botol', '20.000/botol', 'dalam lemari kaca dibawah'),
(45, 'Tinta Kuning', 'KSF Ink', '2B', '13.000/botol', '20.000/botol', 'dalam lemari kaca dibawah'),
(46, 'Kertas Photo', 'V-Tech', '101A', '23.000/pack', '30.000/pack', 'dalam lemari sudut'),
(47, 'Kertas Quarto', 'V-Tech', '101A', '30.000/pack', '36.000/pack', 'dalam tumpukan dekat tangga'),
(48, 'HeadPrint', 'Zebra ZT-230', '301A', '290.000/head', '390.000/head', 'dalam lemari kaca'),
(49, 'Mug Coating', 'Mercaz', '201A', '70.000/dus', '77.000/dus', 'dalam lemari sudut'),
(125, 'bahan', 'merek', '101be', '20.000', '30.000', 'dos warna hitam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_mesin`
--

CREATE TABLE `detail_mesin` (
  `id_user` int(10) DEFAULT NULL,
  `merk_mesin` varchar(25) DEFAULT NULL,
  `kode_mesin` varchar(50) DEFAULT NULL,
  `tahun_pembuatan` varchar(25) DEFAULT NULL,
  `fungsi` varchar(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_mesin`
--

INSERT INTO `detail_mesin` (`id_user`, `merk_mesin`, `kode_mesin`, `tahun_pembuatan`, `fungsi`, `status`) VALUES
(39, 'Kurva Screen Printing', 'SC-PA02', '2021', 'Sablon Mug', 'Maintenance'),
(50, 'Mesin Digital Printing', 'MH32191888', '2017', 'Cetak Spanduk, Baliho, Banner', 'Ready'),
(51, 'Flexography', 'FH21888122634', '2019', 'Cetak karton, kantong plastik, kertas karung ', 'Ready'),
(52, 'Gravure', 'GFF217944443537', '2020', 'Pembuatan ukiran', 'Maintenance'),
(53, 'Mesin Cetak Offset', 'CH3126543888325', '2022', 'Printing Phographic, Textile, digital UV printing', 'Ready'),
(94, 'ELF', '333222', '2020', 'Penghalus', 'Ready');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pb`
--

CREATE TABLE `detail_pb` (
  `id_user` int(10) NOT NULL,
  `name_user` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pb`
--

INSERT INTO `detail_pb` (`id_user`, `name_user`, `jabatan`) VALUES
(3, 'MUHAMMAD SABRI S', ''),
(8, 'Jabal', ''),
(1, 'Admin', ''),
(7, 'Dea', ''),
(21, 'MUHAMMAD AMINULLAH', 'MANAGER SDM DAN UMUM'),
(20, 'Muhammad Sabri S', 'ahli sdm'),
(18, 'Muhammad Sabri S', 'ahli sdm'),
(19, 'suharto', 'ahli sdm'),
(22, 'Muhammad Sabri S', 'MANAGER SDM '),
(23, 'MUHAMMAD SABRI S', 'MANAGER CV.THE KALONG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id` int(11) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_bln` int(10) NOT NULL,
  `id_hri` int(10) NOT NULL,
  `id_tgl` int(10) NOT NULL,
  `tgl_masuk` varchar(50) NOT NULL,
  `tgl_jatuh_tempo` varchar(255) DEFAULT NULL,
  `nama_customer` varchar(30) NOT NULL,
  `handphone` varchar(13) NOT NULL,
  `isi_pesanan` longtext NOT NULL,
  `ukuran` varchar(100) NOT NULL,
  `banyaknya` int(255) DEFAULT NULL,
  `mesin` varchar(255) NOT NULL,
  `karyawan` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `harga` varchar(30) NOT NULL,
  `panjar` varchar(30) NOT NULL,
  `file` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id`, `id_user`, `id_bln`, `id_hri`, `id_tgl`, `tgl_masuk`, `tgl_jatuh_tempo`, `nama_customer`, `handphone`, `isi_pesanan`, `ukuran`, `banyaknya`, `mesin`, `karyawan`, `keterangan`, `harga`, `panjar`, `file`, `status`) VALUES
(1, 56, 7, 1, 25, '31-Aug-2022 18:40:46', '01-Sep-2022 18:40:46', 'Rexy Yuss', '085432678222', 'Spanduk besar', '4x2 meter', 2, 'Mesin Digital Printing', 'Ryan Terry', 'Kasih Cincin Ujung Atas', '120.000', '50.000', '', 'Selesai'),
(2, 68, 7, 2, 26, '31-Aug-2022 19:00:46', '01-Sep-2022 19:00:46', 'Richard', '081288343221', 'Gelas Besar', '3x3 meter', 12, 'Kurva Screen Printing', 'Wira Satya Tri Almi', 'Percantik Gagangnya', '70.000', '25.000', '', 'Selesai'),
(3, 70, 7, 2, 26, '31-Aug-2022 19:05:46', '01-Sep-2022 19:05:46', 'Ichal Zaibatsu', '082177729351', 'Baju Kaos', 'L', 2, 'Mesin Cetak Offset', 'Jabalnur', 'kain combed 30s', '100.000', '50.000', '', 'Dikerja'),
(4, 71, 7, 3, 27, '31-Aug-2022 19:10:46', '01-Sep-2022 19:10:46', 'Upin', '085624385306', 'Stiker kaca', '4x2 meter', 0, 'Flexography', 'Suharto', 'kualitas nomor 1 ya', '200.000', '30.000', '', 'Dikerja'),
(5, 72, 8, 5, 5, '31-Aug-2022 19:15:46', '01-Sep-2022 19:15:46', 'Ipin', '083621904392', 'Kalender', '50x50cm', 0, 'Flexography', 'Dea Nurhikma', '1 lembar ada 4 bulan', '25.000', 'LUNAS', '', 'Selesai'),
(6, 73, 8, 5, 5, '31-Aug-2022 19:18:46', '01-Sep-2022 19:18:46', 'Kak Ros', '082183679914', 'Baju Kemeja', 'XL', 0, 'Mesin Digital Printing', 'Rizky Maulana', 'Kain Licin ya', '120.000', 'LUNAS', '', 'Dikerja'),
(7, 78, 8, 2, 9, '31-Aug-2022 19:20:46', '01-Sep-2022 19:20:46', 'Faruq Kahn', '082183679911', 'Sticker Pintu Kaca', '4x2 meter', 0, 'Kurva Screen Printing', 'Febrianti', 'Ukiran mengikut bentuk', '150.000', '100.000', '', 'Dikerja'),
(8, 79, 8, 2, 9, '31-Aug-2022 19:28:46', '01-Sep-2022 19:28:46', 'Fathir', '085123456781', 'Mug', 'Small', 0, 'Flexography', 'Rizky Maulana', 'Warna Biru Gelap ya', '40.000', 'LUNAS', '', 'Dikerja'),
(9, 89, 8, 3, 10, '31-Aug-2022 19:28:46', '01-Sep-2022 19:28:46', 'Erik Ahmad', '08512345243', 'Spanduk besar', '4x2 meter', 0, 'Kurva Screen Printing', 'Muhammad Sabri S', 'Tambahkan Cincin', '135.000', '100.000', '', 'Selesai'),
(10, 93, 8, 3, 10, '31-Aug-2022 19:30:46', '01-Sep-2022 19:30:46', 'Ahmad Rizky', '081432678232', 'Banner', '4x2 meter', 0, 'Gravure', 'Wira Satya Tri Almi', 'Tambahkan Cincin', '75.000', '50.000', '', 'Selesai'),
(11, 123, 8, 1, 14, '31-Aug-2022 19:38:46', '01-Sep-2022 19:38:46', 'Faris', '085111222333', 'spanduk', '4x2 meter', 0, 'Kurva Screen Printing', 'Dea Nurhikma', 'tambahkan cincin', '75.000', 'Lunas', '', 'Selesai'),
(26, 157, 9, 4, 15, '15-Sep-2022 15:36:30', '16-Sep-2022 15:36:30', 'Ahmad Rizky', '08512345678', 'Spanduk', '4x4 meter', 1, 'Mesin Digital Printing', 'Muhammad Sabri S', 'Tambahkan Cincin', '75.000', 'LUNAS', '1.1.jpg', 'Dikerja');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_user`
--

CREATE TABLE `detail_user` (
  `id_user` int(10) NOT NULL,
  `nis_user` varchar(25) NOT NULL,
  `name_user` varchar(255) NOT NULL,
  `alamat_user` varchar(255) NOT NULL,
  `jk_user` varchar(5) NOT NULL,
  `pendidikan` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_user`
--

INSERT INTO `detail_user` (`id_user`, `nis_user`, `name_user`, `alamat_user`, `jk_user`, `pendidikan`) VALUES
(2, '73060888111114', 'Dea Nurhikma', 'Jln. Nuri', 'P', 'S1'),
(3, '73060888111121', 'Jabalnur', 'Jl. Buaya', 'L', 'D3'),
(4, '73060888111113', 'Ayu Adhe Putri', 'Jln. Kayangan', 'P', 'S1'),
(54, 'D121181307', 'Suharto', 'Jl.Singa', 'L', 'SMA'),
(8, '73060888111123', 'Muh Irzan Ilyas', 'Jln. Merpati', 'L', 'D3'),
(9, '73060888111113', 'Wira Satya Tri Almi', 'Jln. Durian', 'L', 'SMA'),
(10, '73060888111143', 'Ryan Terry', 'Jln. Nangka', 'L', 'SMA'),
(11, '73060888111128', 'Rizky Maulana', 'Jln. Semangka', 'L', 'SMA'),
(12, '73060888111119', 'Febrianti', 'Jln. Singa', 'P', 'S1'),
(26, '73060853444442', 'Muhammad Sabri S', 'Lapajung', 'L', 'D3'),
(69, '188183838138', 'TES', 'Jl.Nuri', 'L', 'SMA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hari`
--

CREATE TABLE `hari` (
  `id_hri` int(10) NOT NULL,
  `nama_hri` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hari`
--

INSERT INTO `hari` (`id_hri`, `nama_hri`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jum\'at'),
(6, 'Sabtu'),
(7, 'Minggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_mesin`
--

CREATE TABLE `status_mesin` (
  `id_user` int(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_mesin`
--

INSERT INTO `status_mesin` (`id_user`, `status`) VALUES
(1, 'Ready'),
(2, 'Maintenance');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggal`
--

CREATE TABLE `tanggal` (
  `id_tgl` int(10) NOT NULL,
  `nama_tgl` varchar(20) NOT NULL,
  `nama_tgl2` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tanggal`
--

INSERT INTO `tanggal` (`id_tgl`, `nama_tgl`, `nama_tgl2`) VALUES
(1, '01', '02'),
(2, '02', '03'),
(3, '03', '04'),
(4, '04', '05'),
(5, '05', '06'),
(6, '06', '07'),
(7, '07', '08'),
(8, '08', '09'),
(9, '09', '10'),
(10, '10', '11'),
(11, '11', '12'),
(12, '12', '13'),
(13, '13', '14'),
(14, '14', '15'),
(15, '15', '16'),
(16, '16', '17'),
(17, '17', '18'),
(18, '18', '19'),
(19, '19', '20'),
(20, '20', '21'),
(21, '21', '22'),
(22, '22', '23'),
(23, '23', '24'),
(24, '24', '25'),
(25, '25', '26'),
(26, '26', '27'),
(27, '27', '28'),
(28, '28', '29'),
(29, '29', '30'),
(30, '30', '31'),
(31, '31', '01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `id_mesin` int(10) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `pwd_user` varchar(255) NOT NULL,
  `level_user` enum('sw','pb') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `id_mesin`, `email_user`, `pwd_user`, `level_user`) VALUES
(1, 0, 'admin@admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'pb'),
(2, 0, 'deanurhikma@yahoo.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'sw'),
(3, 0, 'jabalnur@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'sw'),
(4, 0, 'ayuadheputri@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'sw'),
(31, 0, '', '', 'sw'),
(32, 0, '', '', 'sw'),
(29, 0, '', '', 'sw'),
(30, 0, '', '', 'sw'),
(8, 0, 'muhirzanilyas@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'sw'),
(9, 0, 'wirasatyatrialmi@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'sw'),
(10, 0, 'ryanterry@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'sw'),
(11, 0, 'rizkymaulana@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'sw'),
(12, 0, 'febrianti@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'sw'),
(19, 0, '', '', 'pb'),
(16, 0, '', '', 'pb'),
(15, 0, '', '', 'pb'),
(18, 0, '', '', 'pb'),
(17, 0, '', '', 'pb'),
(20, 0, '', '', 'pb'),
(21, 0, '', '', 'pb'),
(22, 0, '', '', 'pb'),
(23, 0, '', '', 'pb'),
(24, 0, 'ddd@ss', '01464e1616e3fdd5c60c0cc5516c1d1454cc4185', 'sw'),
(27, 0, '', '', 'sw'),
(28, 0, '', '', 'sw'),
(26, 0, 'ddds@aa', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 'sw'),
(33, 0, '', '', 'sw'),
(34, 0, '', '', 'sw'),
(35, 0, '', '', 'sw'),
(36, 0, '', '', 'sw'),
(37, 0, '', '', 'sw'),
(38, 0, '', '', 'sw'),
(39, 0, '', '', 'sw'),
(40, 0, '', '', 'sw'),
(41, 0, '', '', 'sw'),
(42, 0, '', '', 'sw'),
(43, 0, '', '', 'sw'),
(44, 0, '', '', 'sw'),
(45, 0, '', '', 'sw'),
(46, 0, '', '', 'sw'),
(47, 0, '', '', 'sw'),
(48, 0, '', '', 'sw'),
(49, 0, '', '', 'sw'),
(50, 0, '', '', 'sw'),
(51, 0, '', '', 'sw'),
(52, 0, '', '', 'sw'),
(53, 0, '', '', 'sw'),
(54, 0, 'suhartoo12@gmail.com', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 'sw'),
(55, 0, '', '', 'sw'),
(56, 0, '', '', 'sw'),
(57, 0, '', '', 'sw'),
(58, 0, '', '', 'sw'),
(59, 0, '', '', 'sw'),
(60, 0, '', '', 'sw'),
(61, 0, '', '', 'sw'),
(62, 0, '', '', 'sw'),
(63, 0, '', '', 'sw'),
(64, 0, '', '', 'sw'),
(65, 0, '', '', 'sw'),
(66, 0, '', '', 'sw'),
(67, 0, '', '', 'sw'),
(68, 0, '', '', 'sw'),
(69, 0, 'tes@gmail.com', 'd1c056a983786a38ca76a05cda240c7b86d77136', 'sw'),
(70, 0, '', '', 'sw'),
(71, 0, '', '', 'sw'),
(72, 0, '', '', 'sw'),
(73, 0, '', '', 'sw'),
(74, 0, '', '', 'sw'),
(75, 0, '', '', 'sw'),
(76, 0, '', '', 'sw'),
(77, 0, '', '', 'sw'),
(78, 0, '', '', 'sw'),
(79, 0, '', '', 'sw'),
(80, 0, '', '', 'sw'),
(81, 0, '', '', 'sw'),
(82, 0, '', '', 'sw'),
(83, 0, '', '', 'sw'),
(84, 0, '', '', 'sw'),
(85, 0, '', '', 'sw'),
(86, 0, '', '', 'sw'),
(87, 0, '', '', 'sw'),
(88, 0, '', '', 'sw'),
(89, 0, '', '', 'sw'),
(90, 0, '', '', 'sw'),
(91, 0, '', '', 'sw'),
(92, 0, '', '', 'sw'),
(93, 0, '', '', 'sw'),
(94, 0, '', '', 'sw'),
(95, 0, '', '', 'sw'),
(96, 1, '', '', 'sw'),
(97, 2, '', '', 'sw'),
(98, 3, '', '', 'sw'),
(99, 3, '', '', 'sw'),
(100, 3, '', '', 'sw'),
(101, 4, '', '', 'sw'),
(102, 5, '', '', 'sw'),
(103, 1, '', '', 'sw'),
(104, 1, '', '', 'sw'),
(105, 1, '', '', 'sw'),
(106, 1, '', '', 'sw'),
(107, 1, '', '', 'sw'),
(108, 1, '', '', 'sw'),
(109, 0, '', '', 'sw'),
(110, 0, '', '', 'sw'),
(111, 0, '', '', 'sw'),
(112, 0, '', '', 'sw'),
(113, 0, '', '', 'sw'),
(114, 0, '', '', 'sw'),
(115, 0, '', '', 'sw'),
(116, 0, '', '', 'sw'),
(117, 0, '', '', 'sw'),
(118, 0, '', '', 'sw'),
(119, 0, '', '', 'sw'),
(120, 0, '', '', 'sw'),
(121, 0, '', '', 'sw'),
(122, 0, '', '', 'sw'),
(123, 0, '', '', 'sw'),
(124, 0, '', '', 'sw'),
(125, 0, '', '', 'sw'),
(126, 0, '', '', 'sw'),
(127, 0, '', '', 'sw'),
(128, 0, '', '', 'sw'),
(129, 0, '', '', 'sw'),
(130, 0, '', '', 'sw'),
(131, 0, '', '', 'sw'),
(132, 0, '', '', 'sw'),
(133, 0, '', '', 'sw'),
(134, 0, '', '', 'sw'),
(135, 0, '', '', 'sw'),
(136, 0, '', '', 'sw'),
(137, 0, '', '', 'sw'),
(138, 0, '', '', 'sw'),
(139, 0, '', '', 'sw'),
(140, 0, '', '', 'sw'),
(141, 0, '', '', 'sw'),
(142, 0, '', '', 'sw'),
(143, 0, '', '', 'sw'),
(144, 0, '', '', 'sw'),
(145, 0, '', '', 'sw'),
(146, 0, '', '', 'sw'),
(147, 0, '', '', 'sw'),
(148, 0, '', '', 'sw'),
(149, 0, '', '', 'sw'),
(150, 0, '', '', 'sw'),
(151, 0, '', '', 'sw'),
(152, 0, '', '', 'sw'),
(153, 0, '', '', 'sw'),
(154, 0, '', '', 'sw'),
(155, 0, '', '', 'sw');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id_bln`);

--
-- Indeks untuk tabel `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indeks untuk tabel `data_absen`
--
ALTER TABLE `data_absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `detail_pb`
--
ALTER TABLE `detail_pb`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_user`
--
ALTER TABLE `detail_user`
  ADD PRIMARY KEY (`id_user`,`nis_user`);

--
-- Indeks untuk tabel `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id_hri`);

--
-- Indeks untuk tabel `tanggal`
--
ALTER TABLE `tanggal`
  ADD PRIMARY KEY (`id_tgl`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`,`email_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bulan`
--
ALTER TABLE `bulan`
  MODIFY `id_bln` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id_cat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `data_absen`
--
ALTER TABLE `data_absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `hari`
--
ALTER TABLE `hari`
  MODIFY `id_hri` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tanggal`
--
ALTER TABLE `tanggal`
  MODIFY `id_tgl` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
