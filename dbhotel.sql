-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jun 2023 pada 02.07
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbhotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `noKamar` int(255) NOT NULL,
  `jenisKamar` varchar(255) NOT NULL,
  `kapasitas` varchar(255) NOT NULL,
  `harga` float(10,2) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`noKamar`, `jenisKamar`, `kapasitas`, `harga`, `status`) VALUES
(1, 'Standard Room', '4 orang', 50.00, 'Available'),
(2, 'Standard Room', '4 orang', 50.00, 'Available'),
(3, 'Standard Room', '4 orang', 50.00, 'Available'),
(4, 'Standard Room', '4 orang', 50.00, 'Available'),
(5, 'Standard Room', '2 orang', 50.00, 'Available'),
(6, 'Deluxe Room', '2 orang', 100.00, 'Available'),
(7, 'Deluxe Room', '2 orang', 100.00, 'Available'),
(8, 'Deluxe Room', '2 orang', 100.00, 'Available'),
(9, 'Deluxe Room', '2 orang', 100.00, 'Available'),
(10, 'Deluxe Room', '4 orang', 100.00, 'Available'),
(11, 'Premier Room', '1 orang', 150.00, 'Available'),
(12, 'Premier Room', '2 orang', 150.00, 'Available'),
(13, 'Premier Room', '4 orang', 150.00, 'Available'),
(14, 'Premier Room', '1 orang', 150.00, 'Available'),
(15, 'Premier Room', '2 orang', 150.00, 'Available'),
(16, 'Premier Room', '4 orang', 150.00, 'Available'),
(17, 'Family Room', '1 orang', 200.00, 'Available'),
(18, 'Family Room', '2 orang', 200.00, 'Available'),
(19, 'Family Room', '4 orang', 200.00, 'Available'),
(20, 'Family Room', '1 orang', 200.00, 'Available'),
(21, 'Family Room', '2 orang', 200.00, 'Available'),
(22, 'Luxury Room', '4 orang', 300.00, 'Available'),
(23, 'Luxury Room', '1 orang', 300.00, 'Available'),
(24, 'Luxury Room', '2 orang', 300.00, 'Available'),
(25, 'Luxury Room', '4 orang', 300.00, 'Available'),
(26, 'Luxury Room', '1 orang', 300.00, 'Available'),
(27, 'President Room', '2 orang', 500.00, 'Available'),
(28, 'President Room', '4 orang', 500.00, 'Available'),
(29, 'President Room', '1 orang', 500.00, 'Available'),
(30, 'President Room', '2 orang', 500.00, 'Available'),
(31, 'President Room', '4 orang', 500.00, 'Available');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `idTransaksi` bigint(255) NOT NULL,
  `id` char(36) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `noKamar` int(255) NOT NULL,
  `typeKamar` varchar(255) NOT NULL,
  `jmlPenginap` varchar(255) NOT NULL,
  `tglCheckin` date NOT NULL,
  `tglCheckout` date NOT NULL,
  `totalHarga` varchar(255) NOT NULL,
  `statusPembayaran` varchar(255) NOT NULL,
  `tglTransaksi` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`idTransaksi`, `id`, `nama`, `noKamar`, `typeKamar`, `jmlPenginap`, `tglCheckin`, `tglCheckout`, `totalHarga`, `statusPembayaran`, `tglTransaksi`) VALUES
(12, '1', '', 22, 'Luxury Room', '2 orang', '2023-06-02', '2023-06-03', '', '', '2023-06-02 02:46:34'),
(16, '514c9498-00b0-11ee-b996-0a0027000005', 'dani', 6, 'Deluxe Room', '4 orang', '2023-06-16', '2023-06-17', '100', '', '2023-06-02 04:04:58'),
(17, '28b97e8d-00b0-11ee-b996-0a0027000005', 'Angga', 1, 'Standard Room', '2 orang', '2023-06-28', '2023-06-29', '50', 'complete', '2023-06-02 04:22:30'),
(18, '28b97e8d-00b0-11ee-b996-0a0027000005', 'Angga', 6, 'Deluxe Room', '2 orang', '2023-06-16', '2023-06-17', '100', 'incomplete', '2023-06-02 07:00:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` char(36) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `noHp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwd` text NOT NULL,
  `userRole` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `noHp`, `email`, `passwd`, `userRole`) VALUES
('1', 'admin1', '000', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
('2', 'admin2', '999', 'admin2', 'c84258e9c39059a89ab77d846ddab909', 'admin'),
('28b97e8d-00b0-11ee-b996-0a0027000005', 'Angga', '087648986453', 'angga@kencana.com', '8479c86c7afcb56631104f5ce5d6de62', 'user'),
('514c9498-00b0-11ee-b996-0a0027000005', 'dani', '089346927645', 'dani@kencana.com', '55b7e8b895d047537e672250dd781555', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`noKamar`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idTransaksi`),
  ADD KEY `noKamar` (`noKamar`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idTransaksi` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`noKamar`) REFERENCES `kamar` (`noKamar`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
