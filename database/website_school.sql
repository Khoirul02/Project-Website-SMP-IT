-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Feb 2020 pada 10.21
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website_school`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `photo_galeri` text,
  `kegiatan_galeri` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `photo_galeri`, `kegiatan_galeri`) VALUES
(7, '809-WhatsApp Image 2020-01-25 at 4.13.08 PM.jpeg', '#KKN 01'),
(12, '178-WhatsApp Image 2020-01-25 at 6.59.01 PM.jpeg', '#KKN 02'),
(13, '190-WhatsApp Image 2020-01-24 at 10.51.06 PM.jpeg', '#KKN 03'),
(14, '805-WhatsApp Image 2020-01-28 at 2.41.39 PM.jpeg', '#KKN 04'),
(15, '335-WhatsApp Image 2020-02-02 at 9.56.34 AM.jpeg', '#KKN 05'),
(16, '167-WhatsApp Image 2020-01-24 at 10.42.20 PM.jpeg', '#KKN 06'),
(17, '908-WhatsApp Image 2020-01-25 at 6.59.01 PM.jpeg', '#KKN 07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `id_pelajaran` text,
  `judul_materi` text,
  `deskripsi_materi` text,
  `penerbit_materi` text,
  `lampiran_file_materi` text,
  `tanggal_penerbitan_materi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id_materi`, `id_pelajaran`, `judul_materi`, `deskripsi_materi`, `penerbit_materi`, `lampiran_file_materi`, `tanggal_penerbitan_materi`) VALUES
(10, '4', 'Surat Undangan', 'Contoh Model Surat Undangan yang Benar. ', 'Khoirul Hadi', 'undangan.docx', '2020-02-29'),
(11, '4', 'Daftar Cetak', 'Format Daftar Centak Transaksi yang Benar.', 'Khoirul Hadi', 'print-transaction.pdf', '2020-02-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelajaran`
--

CREATE TABLE `pelajaran` (
  `id_pelajaran` int(11) NOT NULL,
  `nama_pelajaran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pelajaran`
--

INSERT INTO `pelajaran` (`id_pelajaran`, `nama_pelajaran`) VALUES
(2, 'IPA'),
(3, 'IPS'),
(4, 'BHS. INDO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` text,
  `nip_pengguna` text,
  `email_pengguna` text,
  `username` text,
  `password` text,
  `foto_pengguna` text,
  `status_pengguna` text,
  `status` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `nip_pengguna`, `email_pengguna`, `username`, `password`, `foto_pengguna`, `status_pengguna`, `status`) VALUES
(1, 'Khoirul Huda', '12345667880', 'huda@gmail.com', 'admin', 'admin', '719-joss.png', 'admin', 'aktif'),
(2, 'Khoirul', '12345667889', 'huda2@gmail.com', 'huda', '123', '304-fcm.png', 'petugas', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `foto_pendukung_pengumuman_satu` text,
  `foto_pendukung_pengumuman_dua` text,
  `judul_pengumuman` text,
  `deskripsi_pengumuman` text,
  `pelaksanaan_kegiatan_pengumuman` text,
  `kategori_pengumuman` text,
  `penulis_pengumuman` text,
  `tanggal_terbit_pengumuman` date DEFAULT NULL,
  `status_pengumuman` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `foto_pendukung_pengumuman_satu`, `foto_pendukung_pengumuman_dua`, `judul_pengumuman`, `deskripsi_pengumuman`, `pelaksanaan_kegiatan_pengumuman`, `kategori_pengumuman`, `penulis_pengumuman`, `tanggal_terbit_pengumuman`, `status_pengumuman`) VALUES
(31, '109-WhatsApp Image 2020-02-02 at 12.15.36 PM.jpeg', '321-WhatsApp Image 2020-02-02 at 8.18.38 AM.jpeg', 'Senam Sehat', 'Semarang â€“ â€œAyo Olahraga, Dimana Saja, Kapan Sajaâ€ timeline hari olahraga nasional tahun 2019 masih sangat relevan saat ini. Seperti yang dilakukan oleh warga KKN UPGRIS bersama Warga RW 12, Kelurahan Bringin, Kecamatan Ngaliyan, Kota Semarang bersama-sama mahasiswa Kuliah Kerja Nyata (KKN) Universitas PGRI Semarang (UPGRIS), minggu (2/2) di Balai RW.\r\nDengan adanya mahasiswa KKN ini diharapkan mampu mengajak para remaja, pemuda-pemudi dan kaum millenia lainnya untuk bersama-sama melaksanakan senam sehat. \r\nMahasiswa KKN UPGRIS, bersinergi dengan Karang Taruna RW 12 untuk mengajak para remaja ikut serta dalam senam sehat ini.\r\nKetua Karang Taruna RW 12, Tedy berjanji menyampaikan informasi ini ke anggotanya.\r\nâ€œNanti akan saya sampaikan ke teman-teman remaja, namun belum bisa menentukan apakah bisa ikut semua atau tidak, karena senam sehat tersebut diikuti oleh bapak-bapak dan ibu PKK mungkin ada yang malu untuk mengikuti acara tersebut.â€ jelasnnya, ketika di temui dalam rapat dengan remaja di POSKO KKN sebelum kegitan senam sehat dilaksanakan.\r\nGuna meramaikan suasana dan keakraban, mahasiswa KKN UPGRIS menyediakan doorprize bagi yang beruntung dalam senam sehat kali ini. Kegiatan di tutup dengan foto bersama.  ', 'Balai RW 12 Kelurahan Bringin', 'noakademik', 'Khoirul Huda 123', '2020-02-27', 'publikasi'),
(67, '606-lcc.jpg', '606-lcc.jpg', 'Lomba Cerdas Cermat', 'Lomba Cerdas Cermat di Aula Sekolahan SMP IT AL-FIRDAUS Purwodadi', 'Aula SMP Al-Firdaus Purwodadi, \r\nHari Kamis, 30 Februari 2020', 'akademik', 'Khoirul Hadi', '2020-02-29', 'publikasi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indeks untuk tabel `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`id_pelajaran`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pelajaran`
--
ALTER TABLE `pelajaran`
  MODIFY `id_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
