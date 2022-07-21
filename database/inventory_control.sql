-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 21 Jul 2022 pada 04.13
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_control`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `berat_barang` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `id_supplier`, `nama_barang`, `satuan`, `berat_barang`, `keterangan`) VALUES
(1, 4, 1, 'Meja', 'Pcs', '3 Kg', 'Meja Kursi'),
(2, 4, 1, 'kursi', 'Pcs', '1 Kg', 'sadasd'),
(3, 3, 1, 'Laptop', 'Pcs', '2 Gr', 'test laptop');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` int(11) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `id_permintaan` int(11) NOT NULL,
  `id_departement` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty_keluar` int(11) NOT NULL DEFAULT '0',
  `qty_diserahkan` int(11) NOT NULL,
  `batch_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barang_keluar`, `tgl_keluar`, `id_permintaan`, `id_departement`, `id_barang`, `qty_keluar`, `qty_diserahkan`, `batch_number`) VALUES
(1, '2022-07-15', 1, 12, 1, 0, 1, '001_001'),
(2, '2022-07-15', 1, 12, 2, 0, 1, '002_001'),
(3, '2022-07-15', 1, 12, 1, 0, 1, '001_001'),
(4, '2022-07-15', 2, 12, 1, 0, 1, '001_001'),
(5, '2022-07-15', 2, 12, 2, 0, 1, '002_001'),
(6, '2022-07-15', 2, 12, 1, 0, 1, '001_001'),
(7, '2022-07-15', 7, 12, 1, 0, 1, '001_001'),
(8, '2022-07-15', 7, 12, 1, 0, 1, '001_001'),
(9, '2022-07-15', 10, 12, 1, 0, 1, '001_001'),
(10, '2022-07-21', 12, 12, 1, 0, 1, '001_003'),
(11, '2022-07-21', 13, 12, 1, 0, 1, '001_003'),
(12, '2022-07-21', 13, 12, 1, 0, 1, '001_003'),
(13, '2022-07-21', 10, 12, 1, 0, 1, '001_003'),
(14, '2022-07-21', 13, 12, 1, 0, 1, '001_001'),
(15, '2022-07-21', 11, 12, 1, 0, 1, '001_001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` int(11) NOT NULL,
  `batch_number` varchar(255) NOT NULL,
  `tgl_datang` date NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `qty_masuk` int(11) NOT NULL,
  `exp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `batch_number`, `tgl_datang`, `id_supplier`, `id_barang`, `satuan`, `qty_masuk`, `exp`) VALUES
(18, '002_001', '2022-07-20', 1, 2, 'Pcs', 2, '2022-07-31'),
(19, '001_001', '2022-07-21', 1, 1, 'Pcs', 2, '2022-07-31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `batch_number`
--

CREATE TABLE `batch_number` (
  `id_batch_number` int(11) NOT NULL,
  `batch_number` varchar(255) NOT NULL,
  `id_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `departement`
--

CREATE TABLE `departement` (
  `id_departement` int(11) NOT NULL,
  `nama_departement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `departement`
--

INSERT INTO `departement` (`id_departement`, `nama_departement`) VALUES
(12, 'Web Development'),
(13, 'Service Quality Assurance'),
(15, 'Service Assurance');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_permintaan`
--

CREATE TABLE `detail_permintaan` (
  `id_detail_permintaan` int(11) NOT NULL,
  `id_permintaan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty_permintaan` int(11) NOT NULL,
  `qty_keluar_permintaan` int(11) NOT NULL,
  `ket_permintaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_permintaan`
--

INSERT INTO `detail_permintaan` (`id_detail_permintaan`, `id_permintaan`, `id_barang`, `qty_permintaan`, `qty_keluar_permintaan`, `ket_permintaan`) VALUES
(1, 1, 1, 2, 2, 'asdsad'),
(2, 1, 2, 1, 1, 'asdasd'),
(3, 2, 1, 2, 2, 'adsada'),
(4, 2, 2, 1, 1, 'asdsadsa'),
(5, 2, 3, 1, 0, 'asdaad'),
(8, 3, 1, 1, 1, 'sadsad'),
(9, 3, 1, 1, 1, 'adasd'),
(10, 8, 1, 2, 2, 'asdas'),
(11, 11, 1, 2, 1, 'adsada'),
(12, 12, 1, 1, 1, 'asdsad'),
(13, 13, 1, 3, 3, 'asdsad'),
(14, 14, 1, 1, 0, 'asdasda'),
(15, 15, 1, 1, 0, 'asdsad'),
(16, 16, 1, 1, 0, 'sadsad'),
(17, 16, 2, 1, 0, 'asdasd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_po`
--

CREATE TABLE `detail_po` (
  `id_detail_po` int(11) NOT NULL,
  `id_po` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty_po` int(11) NOT NULL,
  `ket_po` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_po`
--

INSERT INTO `detail_po` (`id_detail_po`, `id_po`, `id_barang`, `qty_po`, `ket_po`) VALUES
(1, 1, 1, 1, 'asdasd'),
(2, 2, 2, 2, 'sadsad'),
(3, 3, 3, 3, 'sadsada'),
(4, 3, 2, 2, 'sadsadsa'),
(5, 4, 2, 4, 'asdsad'),
(6, 4, 1, 2, 'asdsada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_barang`
--

INSERT INTO `kategori_barang` (`id_kategori`, `nama_kategori`) VALUES
(3, 'Besi'),
(4, 'Kayu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan_barang`
--

CREATE TABLE `permintaan_barang` (
  `id_permintaan` int(11) NOT NULL,
  `id_departement` int(11) NOT NULL,
  `id_detail_permintaan` int(11) NOT NULL,
  `tgl_permintaan` date NOT NULL,
  `status_permintaan` varchar(255) NOT NULL DEFAULT 'Waiting',
  `view_permintaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `permintaan_barang`
--

INSERT INTO `permintaan_barang` (`id_permintaan`, `id_departement`, `id_detail_permintaan`, `tgl_permintaan`, `status_permintaan`, `view_permintaan`) VALUES
(1, 12, 1, '2022-07-15', 'Selesai', 0),
(2, 12, 2, '2022-07-15', 'Selesai', 0),
(7, 12, 3, '2022-07-15', 'Selesai', 0),
(10, 12, 8, '2022-07-15', 'Selesai', 0),
(11, 12, 11, '2022-07-18', 'Proses', 0),
(12, 12, 12, '2022-07-18', 'Selesai', 0),
(13, 12, 13, '2022-07-18', 'Selesai', 0),
(14, 12, 14, '2022-07-18', 'Waiting', 0),
(15, 12, 15, '2022-07-18', 'Waiting', 0),
(19, 12, 16, '2022-07-21', 'Waiting', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id_po` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_po` date NOT NULL,
  `id_detail_po` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `purchase_order`
--

INSERT INTO `purchase_order` (`id_po`, `id_user`, `tgl_po`, `id_detail_po`) VALUES
(1, 1, '2022-07-18', 1),
(2, 1, '2022-07-18', 2),
(3, 1, '2022-07-18', 3),
(4, 1, '2022-07-18', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_barang`
--

CREATE TABLE `stok_barang` (
  `id_stok_barang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty_stok` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stok_barang`
--

INSERT INTO `stok_barang` (`id_stok_barang`, `id_barang`, `qty_stok`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2022-07-14', '2022-07-21'),
(2, 2, 2, '2022-07-14', '2022-07-20'),
(3, 3, 0, '2022-07-15', '2022-07-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp_supplier` varchar(255) NOT NULL,
  `email_supplier` varchar(255) NOT NULL,
  `nama_pic_supplier` varchar(255) NOT NULL,
  `no_telp_pic_supplier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat`, `no_telp_supplier`, `email_supplier`, `nama_pic_supplier`, `no_telp_pic_supplier`) VALUES
(1, 'Abi Baskara A', 'Kober', '(+62) 8229-9915-127', 'abibaskara211@gmail.com', 'Irfan', '(+62) 8123-4567-890');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_departement` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `jk` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `id_departement`, `nama_user`, `jk`, `no_telp`, `email`, `password`, `role`, `foto`, `is_active`) VALUES
(1, 12, 'Abi Baskara Atthallah', 'Pria', '082299915127', 'admin@gmail.com', '$2y$10$GqoVemjyWxmEcORrxgdiEu3.nnHCJJGSKSaJjDanSKEyTdm7riUqi', 'Inventory', '1.png', 1),
(2, 12, 'Produksi', 'Pria', '(+62) 8229-9915-127', 'produksi@gmail.com', '$2y$10$Xj07yJxs4BGsBrFObU4q4eZxnL2J0Gea6iibmvOBWoOAU4mXncYFO', 'Produksi', 'icon_survey_(4).png', 1),
(4, 12, 'Manager', 'Pria', '(+62) 8229-9915-127', 'manager@gmail.com', '$2y$10$N271c1jIoFJrwEyFK0QJYuma209../9zj6aEB4hZg.I9zdR9bAixi', 'Manager', 'icon_survey_(3).png', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`);

--
-- Indeks untuk tabel `batch_number`
--
ALTER TABLE `batch_number`
  ADD PRIMARY KEY (`id_batch_number`);

--
-- Indeks untuk tabel `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id_departement`);

--
-- Indeks untuk tabel `detail_permintaan`
--
ALTER TABLE `detail_permintaan`
  ADD PRIMARY KEY (`id_detail_permintaan`);

--
-- Indeks untuk tabel `detail_po`
--
ALTER TABLE `detail_po`
  ADD PRIMARY KEY (`id_detail_po`);

--
-- Indeks untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `permintaan_barang`
--
ALTER TABLE `permintaan_barang`
  ADD PRIMARY KEY (`id_permintaan`);

--
-- Indeks untuk tabel `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id_po`);

--
-- Indeks untuk tabel `stok_barang`
--
ALTER TABLE `stok_barang`
  ADD PRIMARY KEY (`id_stok_barang`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_barang_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `batch_number`
--
ALTER TABLE `batch_number`
  MODIFY `id_batch_number` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `departement`
--
ALTER TABLE `departement`
  MODIFY `id_departement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `detail_permintaan`
--
ALTER TABLE `detail_permintaan`
  MODIFY `id_detail_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `detail_po`
--
ALTER TABLE `detail_po`
  MODIFY `id_detail_po` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `permintaan_barang`
--
ALTER TABLE `permintaan_barang`
  MODIFY `id_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id_po` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `stok_barang`
--
ALTER TABLE `stok_barang`
  MODIFY `id_stok_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
