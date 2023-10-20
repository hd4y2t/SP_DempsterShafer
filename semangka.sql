-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 28 Feb 2022 pada 07.43
-- Versi server: 8.0.21
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `semangka`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `id` int NOT NULL,
  `idgejala` varchar(10) NOT NULL,
  `namagejala` varchar(50) NOT NULL,
  `organ` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`id`, `idgejala`, `namagejala`, `organ`) VALUES
(1, 'G1', 'Batang terpotong', 'Batang'),
(2, 'G2', 'Pangkal batang terpotong', 'Batang'),
(3, 'G3', 'Daun berlubang', 'Daun'),
(4, 'G4', 'Kulit semangka berlubang', 'Buah'),
(5, 'G5', 'Buah berlubang', 'Buah'),
(6, 'G6', 'Buah Membusuk', 'Buah'),
(7, 'G7', 'Daun mengering', 'Daun'),
(8, 'G8', 'Daun mengeriting', 'Daun'),
(9, 'G9', 'Daun melengkung keluar', 'Daun'),
(10, 'G10', 'Tanaman mengkerdil', 'Batang'),
(11, 'G11', 'Terdapat jalur korokan pada daun', 'Daun'),
(12, 'G12', 'Merusak jaringan daun (bergaris-garis)', 'Daun'),
(13, 'G13', 'Tepi daun rusak', 'Daun'),
(14, 'G14', 'Daun mengerut', 'Daun'),
(15, 'G15', 'Daun melengkung kedalam', 'Daun'),
(16, 'G16', 'Daun agak mengkilap', 'Daun'),
(17, 'G17', 'Pucuk daun terpotong', 'Daun'),
(18, 'G18', 'Akar berwarna coklat', 'akar'),
(19, 'G19', 'Batang mengerut', 'Batang'),
(20, 'G20', 'Batang coklat', 'batang'),
(21, 'G21', 'Daun layu', 'Daun'),
(22, 'G22', 'Batang berlendir saat dipotong', 'Batang'),
(23, 'G23', 'Bercak-bercak coklat pada pangkal daun', 'Daun'),
(24, 'G24', 'Batang membusuk', 'Batang'),
(25, 'G25', 'Daun berwarna coklat', 'Daun'),
(26, 'G26', 'Daun timbul seperti berwarna putih', 'Daun'),
(27, 'G27', 'Ruas-ruas daun memendek', 'Daun'),
(28, 'G28', 'Batang pecah dan keluar lendir', 'Batang'),
(29, 'G29', 'Daun trotol-trotol', 'Daun'),
(30, 'G30', 'Daun membusuk', 'Daun'),
(31, 'G31', 'Buah rusak', 'Buah'),
(32, 'G32', 'Daun pipih', 'Daun');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int NOT NULL,
  `nama` varchar(128) NOT NULL,
  `diagnosa` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `id` int NOT NULL,
  `idpenyakit` varchar(10) NOT NULL,
  `namapenyakit` varchar(75) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `nonkimiawi` varchar(130) NOT NULL,
  `kimiawi` varchar(130) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`id`, `idpenyakit`, `namapenyakit`, `jenis`, `nonkimiawi`, `kimiawi`) VALUES
(1, 'P1', 'Gangsir (Brachytripes portentosus Licht)', 'Hama', 'Melindungi tanaman kecil menggunakan gelas plastik berlubang.', 'Dengan deltamethrin 25 g/ l (sesuai anjuran)'),
(2, 'P2', 'Ulat Grayak\r\n(Spodoptera litura)\r\n', 'Hama', 'Dengan melakukan pola rotasi tanaman dan menggunakan musuh.', 'Dengan menggunakan Insektisida yang berbahan aktif sipermetrin, deltametrin, klorfluazoron '),
(3, 'P3', 'Larva / Ngengat\r\n(Helicoverpa armigera)\r\n\r\n', 'Hama', 'Melakukan eradikasi buah yang terserang dan menggunakan musuh alami.', 'Dengan memberikan insektisida yang berbahan aktif sipermetrin, deltametrin, klorfluazuron betasiflutrin, profenofos.'),
(4, 'P4', 'Hama Putih/ Trips (Thrips parvispinus Karny)', 'Hama', 'Dengan mengatur waktu tanam yang serentak, menjaga kebersihan kebun,menggunakan musuh alami.', 'Dengan memberi insektisida berbahan aktif karbosulfan, formrtanat hidroklorida, piraklorofos dan imidakloprid.'),
(5, 'P5', 'Kutu Kebul\r\n(Bemisia tabaci )\r\n\r\n', 'Hama', 'Pengaturan jarak tanam tidak terlalu rapat, rotasi tanam, pemasangan perangkap kuning.', 'Dengan menggunakan insektisida berbahan aktif imidakloprid, karbosulfan,prothiofos,diafentiuron, tiametoksam.'),
(6, 'P6', 'Lalat Penggorok\r\n(Liromyza sp)\r\n', 'Hama', 'Melakukan penimbun bagian-bagian tanaman yang terserang dan pemangkasan daun yang terserang kemudian dibakar.', 'Dengan memberi insektisida berbahan aktif abamektin ,bensultap, bacillus coagulans, siromazin, piretroid dan organofosfat.'),
(7, 'P7', 'Larva dan Imago\r\n(Henosepilachna spp)\r\n', 'Hama', 'Pergiliran tanaman dan menggunakan musuh alami.', 'Dengan memberi insektisida bahan aktif profenofos, diafendiuron, metidation, tiodikarb.'),
(8, 'P8', 'Kumbang Daun  (Aulacophora femoralis motschulsky)', 'Hama', 'Menangkap hama tersebut, pergiliran tanaman dan pengolahan tanah sempurna.', 'Memberikan insektisida bahan aktif profenofos, diafendiuron, metidation, tiodikarb.'),
(9, 'P9', 'Kutu Daun (Aphis gossypii Glover)', 'Hama', 'Melakukan rotasi tanaman dan mengurangi ragam tanaman inang di sekitar kebun.', ' Memberi insektisida berbahan aktif betasiflutrin, imidakloprit, profenofos, dektametrin, tiodikarb dan protiofos.'),
(10, 'P10', 'Lalat Buah (Dacus spp)', 'Hama', 'Pemasangan perangkap beracun yang mengandung metil eugenol.', 'Memberi insektisida berbahan aktif betasiflutrin, profenofos, deltametrin, metitation dan protiofos.'),
(11, 'P11', 'Tikus (Rattus argentiventer)', 'Hama', 'Membuat sanitasi lingkungan dan melindungi tanaman kecil menggunakan gelas plastik berlubang.', 'Penggunaan umpan beracun (rodentisida) dan Zat Repellent.'),
(12, 'P12', 'Layu fusarium (Fusarium oxysporum f. sp.)', 'Penyakit', 'Menanam varietas yang tahan, perbaikan drainase tanah dan menghindari pelukan mekanis pada waktu pemeliharaan tanaman.', 'Perlakuan benih dengan Karbendazim 60% (sesuai anjuran).'),
(13, 'P13', 'Rebah batang (Pythium ultimum Trow)', 'Penyakit', 'Pemberian pupuk kandang harus matang dan mengurangi kelembaban.', 'Perlakuan benih dengan  propamocarb – HCl 72%.'),
(14, 'P14', 'Layu bakteri (Erwinia tracheiphila E. F. Sm.)', 'Penyakit', 'Tanaman dicabut dan dibakar.', 'Memberikan Agrimicin 1,2 gr/l, fungisida berbahan aktif Cu.'),
(15, 'P15', 'Antraknosa (Colletotrichum lagenarium (pass) Ell. Et. Halst)', 'Penyakit', 'Pergiliran tanaman, pembuangan tanaman yang terinfeksi, rotasi tanaman, perbaikan drainase tanah.', 'Dengan bahan kimia Karbendazim 60% dicampur Mankozeb  80 %.'),
(16, 'P16', 'Embun tepung / powdery mildew (Spaerotheca fuliginea)', 'Penyakit', 'Tanaman dicabut dan dibakar.', 'Memberikan bahan kimia Agrimicin 1,2 gr/l, fungisida berbahan aktif Cu.'),
(17, 'P17', 'Penyakit virus / njebuk (Watermelon Mosaic Virus)', 'Penyakit', 'Mencabut dan membakar tanaman, mempraktekkan sistem Mulsa Plastik Hitam Perak (MPHP), dan rotasi tanaman.', 'Memberikan insektisida berbahan aktif karbosulfan, formrtanat hidroklorida, piraklorofos dan imidakloprid.'),
(18, 'P18', 'Embun Bulu / Downey Meldew (Pseudoperonospora Cubensis)', 'Penyakit', 'Tanaman dicabut dan dibakar.', 'Memberikan Agrimicin 1,2 gr/l, fungisida berbahan aktif Cu.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekam`
--

CREATE TABLE `rekam` (
  `id_rekam` int NOT NULL,
  `nama` varchar(128) NOT NULL,
  `gejala` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rules`
--

CREATE TABLE `rules` (
  `penyakit_id` int NOT NULL,
  `gejala_id` int NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `rules`
--

INSERT INTO `rules` (`penyakit_id`, `gejala_id`, `nilai`) VALUES
(1, 1, 0.25),
(1, 2, 0.2),
(2, 3, 0.3),
(8, 3, 0.3),
(2, 4, 0.25),
(2, 5, 0.4),
(7, 5, 0.4),
(3, 6, 0.25),
(10, 6, 0.25),
(3, 7, 0.25),
(6, 7, 0.25),
(4, 8, 0.3),
(4, 9, 0.4),
(5, 10, 0.4),
(17, 10, 0.4),
(6, 11, 0.3),
(7, 12, 0.2),
(8, 13, 0.25),
(9, 14, 0.2),
(9, 15, 0.3),
(9, 16, 0.3),
(11, 17, 0.2),
(12, 18, 0.3),
(12, 19, 0.3),
(13, 20, 0.25),
(10, 12, 0.25),
(12, 21, 0.25),
(14, 12, 0.25),
(14, 22, 0.4),
(15, 23, 0.3),
(13, 24, 0.3),
(15, 24, 0.3),
(16, 25, 0.2),
(16, 26, 0.3),
(17, 27, 0.25),
(17, 28, 0.25),
(18, 29, 0.3),
(18, 30, 0.3),
(11, 31, 0.3),
(5, 32, 0.4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer',
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabel untuk menyimpan data user';

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `role`, `last_login`, `created_at`) VALUES
(1, 'dian', '$2y$10$TpipIS3PDfeHTJWggvnFO.eT/dVBMyVKI5OcYV1avGMnt8wTqOt5O', 'dian@petanikode.com', 'admin', '2021-10-13 14:39:06', '2019-12-10 08:46:40'),
(2, 'admin', '$2y$10$TpipIS3PDfeHTJWggvnFO.eT/dVBMyVKI5OcYV1avGMnt8wTqOt5O', 'admin@gmail.com', 'admin', '2021-09-18 05:05:52', '2021-09-18 05:03:14');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekam`
--
ALTER TABLE `rekam`
  ADD PRIMARY KEY (`id_rekam`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `rekam`
--
ALTER TABLE `rekam`
  MODIFY `id_rekam` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
