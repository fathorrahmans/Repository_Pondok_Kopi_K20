-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jan 2021 pada 11.42
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
-- Struktur dari tabel `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` varchar(100) NOT NULL,
  `tgl_berita` date NOT NULL,
  `gambar_berita` varchar(255) NOT NULL,
  `isi_singkat` text NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `judul_berita`, `tgl_berita`, `gambar_berita`, `isi_singkat`, `isi`) VALUES
(1, 'Waktu Ngopi Terbaik', '2021-01-05', 'news1.jpg', 'Kortisol adalah hormon steroid dari golongan glukokortikoid yang diproduksi oleh sel di dalam zona fasikulata pada kelenjar adrenal sebagai respon terhadap stimulasi hormon ACTH yang disekresi oleh ...', 'Kortisol adalah hormon steroid dari golongan glukokortikoid yang diproduksi oleh sel di dalam zona fasikulata pada kelenjar adrenal sebagai respon terhadap stimulasi hormon ACTH yang disekresi oleh ...Kortisol adalah hormon steroid dari golongan glukokortikoid yang diproduksi oleh sel di dalam zona fasikulata pada kelenjar adrenal sebagai respon terhadap stimulasi hormon ACTH yang disekresi oleh ...Kortisol adalah hormon steroid dari golongan glukokortikoid yang diproduksi oleh sel di dalam zona fasikulata pada kelenjar adrenal sebagai respon terhadap stimulasi hormon ACTH yang disekresi oleh ...');

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
(3, 'Ngopi di Alam', '2020-11-03', 'gunung.png', 'Kembali ke asal di mana bijimu tertanam. kawasan gunung.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae eveniet itaque quisquam, minima, officiisLorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae eveniet itaque quisquam, minima, officiis'),
(23, 'Pertemuan', '2021-01-05', '20210107094325banner4.jpg', 'Pertemuan Para kiyai.', 'hmm.\r\n');

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
(2, 'Banyuwangi', 22000),
(6, 'Pasuruan', 12000),
(7, 'Jember', 5000),
(8, 'Bondowoso', 12000),
(9, 'Besuki', 15000),
(10, 'Situbondo', 15000),
(11, 'Malang', 12000),
(12, 'Tulungagung', 12000),
(14, 'Surabaya', 15000),
(15, 'Sidoarjo', 12000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `email` varchar(50) NOT NULL,
  `vkey` varchar(255) NOT NULL,
  `verifikasi` int(1) NOT NULL DEFAULT 0,
  `no_telp` varchar(13) NOT NULL,
  `gambar_profil` varchar(100) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `username`, `password`, `tgl_lahir`, `jenis_kelamin`, `email`, `vkey`, `verifikasi`, `no_telp`, `gambar_profil`, `alamat`) VALUES
(1, 'Fathor Rahman', 'ftr', '$2y$10$9nGuucdz5QbVlUn20fTyW.A0xthntYUALSnLf8zMdcBXkUCwWLkiq', '2001-07-03', 'Wanita', 'fathorrahman2357@gmail.com', '', 1, '082231515788', 'admin/images/profil-pelanggan/1610286938.png', 'Jl.Jakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `id_pesan` int(5) NOT NULL,
  `tanggal_pesan` datetime NOT NULL,
  `tanggal_terima` datetime NOT NULL,
  `status` enum('belum bayar','verifikasi','sudah bayar','sedang dikirim','dibatalkan','selesai') NOT NULL,
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
(5, '2021-01-10 21:27:00', '0000-00-00 00:00:00', 'belum bayar', 165000, 'sido', '', '', 1, 1);

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
(1, 1, 5, 125000, 1),
(2, 4, 3, 90000, 1),
(3, 1, 1, 25000, 2),
(4, 3, 3, 45000, 3),
(5, 2, 2, 100000, 4),
(6, 2, 3, 150000, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(5) NOT NULL,
  `nama_petugas` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `level` enum('admin','karyawan','pemilik') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `no_telp`, `alamat`, `level`) VALUES
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
  `id_produk` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_produk_variasi`
--

INSERT INTO `tb_produk_variasi` (`id_variasi`, `nama_variasi`, `harga_variasi`, `stok`, `berat`, `id_produk`) VALUES
(1, 'Berat', 25000, 94, 100, 1),
(2, 'Berat', 50000, 95, 200, 1),
(3, 'Berat', 15000, 97, 100, 2),
(4, 'Berat', 30000, 100, 200, 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`);

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
-- AUTO_INCREMENT untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_galeri`
--
ALTER TABLE `tb_galeri`
  MODIFY `id_galeri` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tb_ongkir`
--
ALTER TABLE `tb_ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id_pesan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_pesan_detail`
--
ALTER TABLE `tb_pesan_detail`
  MODIFY `id_detail_pesan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_produk_variasi`
--
ALTER TABLE `tb_produk_variasi`
  MODIFY `id_variasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
