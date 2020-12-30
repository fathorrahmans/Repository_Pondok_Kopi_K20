-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Des 2020 pada 19.57
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kopi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_galeri`
--

CREATE TABLE `tb_galeri` (
  `id_galeri` int(5) NOT NULL,
  `judul_gambar` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi_singkat` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_galeri`
--

INSERT INTO `tb_galeri` (`id_galeri`, `judul_gambar`, `tanggal`, `gambar`, `deskripsi_singkat`, `deskripsi`) VALUES
(2, 'Kunjungan Jokowi', '2020-11-03', 'jokowi.png', 'Kedatangan jokowi untuk peresmian BLK pondok kopi', 'Sudah punya Balai Latihan Kerja bertempat di daerah Panti Kemiri lebih tepatnya di dalam Pondok Pesantren Al Hasan Kemiri Yakin masih meragukan @pondokkopidjember Jangan lupa mampir di @pondokkopidjember '),
(3, 'Ngopi di Alam', '2020-11-03', 'gunung.png', 'Kembali ke asal di mana bijimu tertanam. kawasan gunung.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae eveniet itaque quisquam, minima, officiisLorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae eveniet itaque quisquam, minima, officiis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ongkir`
--

CREATE TABLE `tb_ongkir` (
  `id_ongkir` int(5) NOT NULL,
  `nama_kota` varchar(30) NOT NULL,
  `harga_ongkir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_ongkir`
--

INSERT INTO `tb_ongkir` (`id_ongkir`, `nama_kota`, `harga_ongkir`) VALUES
(1, 'Probolinggo', 15000),
(2, 'Banyuwangi', 22000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `username`, `password`, `jenis_kelamin`, `no_telp`, `alamat`) VALUES
(5, 'Fathor', 'ftr', 'ftr', 'laki-laki', '082231515788', 'Pakuniran'),
(6, 'Danila', 'danila09', 'danila', 'perempuan', '08223456789', 'kraksaan '),
(9, 'Shovi', 'shovi', 'shovi', 'perempuan', '0987654321', 'sumenep');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `id_pesan` int(5) NOT NULL,
  `tanggal_pesan` datetime NOT NULL,
  `tanggal_terima` datetime NOT NULL,
  `status` enum('belum bayar','sudah bayar','sedang dikirim','dibatalkan','selesai') NOT NULL,
  `total` int(15) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `bukti_bayar` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `id_pelanggan` int(5) NOT NULL,
  `id_ongkir` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pesan`
--

INSERT INTO `tb_pesan` (`id_pesan`, `tanggal_pesan`, `tanggal_terima`, `status`, `total`, `alamat_lengkap`, `bukti_bayar`, `keterangan`, `id_pelanggan`, `id_ongkir`) VALUES
(60, '2020-12-13 19:21:54', '2020-12-13 19:23:33', 'selesai', 47000, 'asd', '6020201213132205logo.png', '-', 6, 2),
(61, '2020-12-13 19:40:10', '0000-00-00 00:00:00', 'sudah bayar', 40000, 'Jalan Pakuniran, Dusun krajan RT:003 RW:001 Gunggungan-Lor kec. pakuniran, KAB. PROBOLINGGO, PAKUNIRAN, JAWA TIMUR, ID, 67292', '6120201213134020logo.png', '', 6, 1),
(63, '2020-12-13 22:38:22', '0000-00-00 00:00:00', 'dibatalkan', 210000, 'Jalan Pakuniran, Dusun krajan RT:003 RW:001 Gunggungan-Lor kec. pakuniran, KAB. PROBOLINGGO, PAKUNIRAN, JAWA TIMUR, ID, 67292', '6320201214064734tugas.jpg', '', 6, 2),
(64, '2020-12-15 09:31:00', '0000-00-00 00:00:00', 'dibatalkan', 65000, 'sdfghjkfdsgfsgfds', '', '', 6, 1),
(65, '2020-12-15 09:56:16', '2020-12-15 09:59:47', 'selesai', 137000, 'asd', '6520201215035725tugas.jpg', '-', 6, 2),
(66, '2020-12-15 12:06:03', '0000-00-00 00:00:00', 'dibatalkan', 55000, 'a', '6620201215060624tugas.jpg', '', 6, 1),
(67, '2020-12-15 12:09:01', '0000-00-00 00:00:00', 'dibatalkan', 115000, 's', '6720201215060920tugas.jpg', 'gaada barang', 6, 1),
(68, '2020-12-22 11:18:12', '2020-12-22 11:26:51', 'selesai', 65000, 'kraksaan ', '6820201222052214baesuzy.png', '-', 6, 1),
(69, '2020-12-23 15:49:23', '2020-12-23 15:57:23', 'selesai', 140000, 'sumenep rt 003', '6920201223095330tugas.jpg', '-', 9, 1),
(70, '2020-12-23 15:50:37', '0000-00-00 00:00:00', 'dibatalkan', 47000, 'sumenep madura', '', '', 9, 2),
(71, '2020-12-23 20:40:40', '0000-00-00 00:00:00', 'belum bayar', 35000, 'asdf', '', '', 9, 1),
(72, '2020-12-28 22:32:16', '2020-12-28 22:37:22', 'selesai', 135000, 'Banyuwangi', '7220201228163455tugas.jpg', '-', 6, 2),
(73, '2020-12-30 01:56:16', '0000-00-00 00:00:00', 'belum bayar', 40000, 'asd', '', '', 6, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesan_detail`
--

CREATE TABLE `tb_pesan_detail` (
  `id_detail_pesan` int(5) NOT NULL,
  `id_variasi` int(5) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `id_pesan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pesan_detail`
--

INSERT INTO `tb_pesan_detail` (`id_detail_pesan`, `id_variasi`, `jumlah`, `subtotal`, `id_pesan`) VALUES
(77, 1, 3, 75000, 57),
(78, 5, 2, 50000, 57),
(79, 54, 2, 46000, 58),
(80, 2, 1, 23000, 59),
(81, 1, 1, 25000, 60),
(82, 1, 1, 25000, 61),
(83, 1, 2, 50000, 63),
(84, 2, 1, 23000, 63),
(85, 4, 2, 40000, 63),
(86, 5, 3, 75000, 63),
(87, 1, 2, 50000, 64),
(88, 2, 5, 115000, 65),
(89, 4, 2, 40000, 66),
(90, 1, 4, 100000, 67),
(91, 1, 2, 50000, 68),
(92, 1, 3, 75000, 69),
(93, 5, 2, 50000, 69),
(94, 1, 1, 25000, 70),
(95, 4, 1, 20000, 71),
(96, 1, 3, 75000, 72),
(97, 54, 1, 23000, 72),
(98, 4, 1, 15000, 72),
(99, 1, 1, 25000, 73);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `level` enum('admin','karyawan','pemilik') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama`, `username`, `password`, `no_telp`, `alamat`, `level`) VALUES
(1, 'Fathor Rahman', 'admin', 'admin', '998727112a', 'gunggungan lor', 'admin'),
(3, 'Pemilik', 'pemilik', 'pemilik', '0998727112', 'Jember', 'pemilik'),
(5, 'Danila', 'karyawan', 'karyawan', '082234123321', 'pakuniran\r\n', 'karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(5) NOT NULL,
  `nama_depan` varchar(20) NOT NULL,
  `nama_belakang` varchar(20) NOT NULL,
  `gambar_produk` varchar(255) NOT NULL,
  `deskripsi_singkat` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_depan`, `nama_belakang`, `gambar_produk`, `deskripsi_singkat`, `deskripsi`) VALUES
(1, 'Kopi', 'Arabica', 'arabica.jpg', 'Best Arabica Coffe', 'Best Arabica coffe lereng argopuro lereng argopuro ketinggian : 1260 mdpl. Semi-Wash(Medium Roast). Taste Profile(Acid dan Sweet Medium Body)'),
(2, 'Kopi', 'Robusta', 'robusta.jpg', 'Best Robusta Coffe', 'Best Arabica coffe lereng argopuro lereng argopuro ketinggian : 1260 mdpl. Semi-Wash(Dark Medium). Taste Profile(Nutty, Caramel, Chocholaty, dan Orange)'),
(3, 'Biji', 'Roasting', 'biji1.jpg', 'Biji kopi pilihan terbaik dan terindah', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iure veniam modi omnis assumenda nihil, nemo numquam error labore, adipisci dolorum molestias ratione, praesentium a. Dignissimos molestiae ipsa aliquid inventore ipsum?'),
(4, 'Biji', 'Kopi', 'biji2.jpg', 'Biji kopi yang telah di roasting tentunya siap di sajikan', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iure veniam modi omnis assumenda nihil, nemo numquam error labore, adipisci dolorum molestias ratione, praesentium a. Dignissimos molestiae ipsa aliquid inventore ipsum?');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk_variasi`
--

CREATE TABLE `tb_produk_variasi` (
  `id_variasi` int(5) NOT NULL,
  `nama_variasi` varchar(20) DEFAULT NULL,
  `harga_variasi` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `berat` float DEFAULT NULL,
  `gambar_variasi` varchar(255) DEFAULT NULL,
  `id_produk` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_produk_variasi`
--

INSERT INTO `tb_produk_variasi` (`id_variasi`, `nama_variasi`, `harga_variasi`, `stok`, `berat`, `gambar_variasi`, `id_produk`) VALUES
(1, 'Berat', 25000, 46, 100, 'arabica.jpg', 1),
(2, 'Berat', 50000, 50, 200, 'arabica.jpg', 1),
(4, 'Berat', 15000, 49, 100, 'robusta.jpg', 2),
(5, 'Berat', 30000, 50, 200, 'robusta.jpg', 2),
(54, 'Berat', 23000, 44, 0.35, '', 3),
(55, 'Berat', 35000, 46, 0.75, '', 3),
(56, 'Berat', 34500, 35, 0.5, '', 4),
(57, 'Berat', 22500, 40, 0.35, '', 4);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_galeri`
--
ALTER TABLE `tb_galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indeks untuk tabel `tb_ongkir`
--
ALTER TABLE `tb_ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `tb_pesan_detail`
--
ALTER TABLE `tb_pesan_detail`
  ADD PRIMARY KEY (`id_detail_pesan`);

--
-- Indeks untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `tb_produk_variasi`
--
ALTER TABLE `tb_produk_variasi`
  ADD PRIMARY KEY (`id_variasi`),
  ADD KEY `id_produk` (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_galeri`
--
ALTER TABLE `tb_galeri`
  MODIFY `id_galeri` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tb_ongkir`
--
ALTER TABLE `tb_ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id_pesan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT untuk tabel `tb_pesan_detail`
--
ALTER TABLE `tb_pesan_detail`
  MODIFY `id_detail_pesan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_produk_variasi`
--
ALTER TABLE `tb_produk_variasi`
  MODIFY `id_variasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
