-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17 Jan 2020 pada 15.06
-- Versi Server: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `kode_ta` int(11) NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  `kode_kelas` int(11) NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat') NOT NULL,
  `kode_mapel` varchar(11) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `kode_tutor` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `kode_ta`, `semester`, `kode_kelas`, `hari`, `kode_mapel`, `jam_mulai`, `jam_selesai`, `kode_tutor`) VALUES
(8, 5, 'Genap', 6, 'Kamis', 'MP01A08', '10:30:00', '12:30:00', 'T200116B001'),
(10, 2, 'Genap', 7, 'Selasa', 'MP01A08', '16:00:00', '18:30:00', 'T200116A001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `kode_kelas` int(11) NOT NULL,
  `kelas` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `kelas`) VALUES
(1, 'Kelas 4'),
(2, 'Kelas 5'),
(3, 'Kelas 6'),
(4, 'Kelas 7'),
(5, 'Kelas 8'),
(6, 'Kelas 9'),
(7, 'Kelas 10'),
(8, 'Kelas 11'),
(9, 'Kelas 12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `level_id` int(3) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`level_id`, `level`) VALUES
(1, 'Administrator'),
(2, 'Tutor'),
(3, 'Siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `kode_mapel` varchar(11) NOT NULL,
  `nama_mapel` varchar(30) NOT NULL,
  `kode_kelas` int(11) NOT NULL,
  `kode_tutor` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`kode_mapel`, `nama_mapel`, `kode_kelas`, `kode_tutor`) VALUES
('MP01A07', 'IPA', 2, 'T200116A001'),
('MP01A08', 'Bahasa Indonesia', 1, 'T200116C001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `kode_kelas` int(11) NOT NULL,
  `kode_ta` int(11) NOT NULL,
  `kode_mapel` varchar(11) NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  `nilai_tugas` varchar(10) NOT NULL,
  `nilai_pts` varchar(10) NOT NULL,
  `nilai_pat` varchar(10) NOT NULL,
  `nilai_akhir` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftar`
--

CREATE TABLE `pendaftar` (
  `no_pendaftar` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nisn` varchar(12) NOT NULL,
  `tempat_lhr` varchar(30) NOT NULL,
  `tanggal_lhr` date NOT NULL,
  `agama` varchar(12) NOT NULL,
  `jenkel` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  `asal_sekolah` varchar(30) NOT NULL,
  `setara_kelas` varchar(15) NOT NULL,
  `paket_kesetaraan` enum('A','B','C','') NOT NULL,
  `alamat_sekolah` varchar(100) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `pekerjaan_ayah` varchar(20) NOT NULL,
  `pekerjaan_ibu` varchar(20) NOT NULL,
  `alamat_ortu` varchar(100) NOT NULL,
  `nama_wali` varchar(50) NOT NULL,
  `pekerjaan_wali` varchar(20) NOT NULL,
  `alamat_wali` varchar(100) NOT NULL,
  `no_hp_ortuwali` varchar(14) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `status_pendaftar` varchar(15) NOT NULL,
  `akte` varchar(40) NOT NULL,
  `kk` varchar(40) NOT NULL,
  `ijazah_raport` varchar(40) NOT NULL,
  `sk_pindah_sekolah` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendaftar`
--

INSERT INTO `pendaftar` (`no_pendaftar`, `nama`, `nisn`, `tempat_lhr`, `tanggal_lhr`, `agama`, `jenkel`, `alamat`, `no_hp`, `tgl_pendaftaran`, `asal_sekolah`, `setara_kelas`, `paket_kesetaraan`, `alamat_sekolah`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `alamat_ortu`, `nama_wali`, `pekerjaan_wali`, `alamat_wali`, `no_hp_ortuwali`, `foto`, `status_pendaftar`, `akte`, `kk`, `ijazah_raport`, `sk_pindah_sekolah`) VALUES
('A202001160001', 'Mefri Andriyanto', '3163111096', 'Sleman', '1995-05-07', 'ISLAM', '', 'Srandakan,Bantul,Yogyakarta', '08562971772', '2020-01-16', 'SDN 1 panjangan bantul', 'Kelas 6', 'A', 'Jalan Pajangan,Bantul', 'Damar Prasetyo', 'Yuli Asriningtias', 'Dosen', 'IRT', 'Srandakan,Bantul,Yogyakarta', '-', '-', '-', '08562971772', 'Koala.jpg', 'Diterima', 'akta.pdf', 'kk.pdf', 'ijazah.pdf', 'Sk pindah.pdf'),
('A202001170002', 'Yanto', '2134567891', 'Surabaya', '1991-02-11', 'KRISTEN', 'Perempuan', 'ebre', '089775987211', '2020-01-17', 'SD 1 Pajangan', 'Kelas 6', 'A', 'rberre', 'Alex', 'Loren', 'PNS', 'Swasta', 'errrer', '-', '-', '-', '089765123456', 'default.jpg', 'Diterima', 'akta.pdf', 'kk.pdf', 'rapot.pdf', 'sk.pdf'),
('B202001160001', 'Mefri Andriyanto', '3163111096', 'Sleman', '1995-05-07', 'ISLAM', '', 'Srandakan,Bantul,Yogyakarta', '08562971772', '2020-01-16', 'SMPN 1 panjangan bantul', 'Kelas 7', 'B', 'Jalan Pajangan,Bantul', 'Damar Prasetyo', 'Yuli Asriningtias', 'Dosen', 'IRT', 'Srandakan,Bantul,Yogyakarta', '-', '-', '-', '08562971772', 'Koala.jpg', 'Diterima', 'akta.pdf', 'kk.pdf', 'ijazah.pdf', 'Sk pindah.pdf'),
('B202001170002', 'Jess No Limit', '2134567891', 'Surabaya', '2000-05-08', 'ISLAM', 'Laki-Laki', 'Pandak Bantul', '085629807712', '2020-01-17', 'SMP N 1 Srandakan', 'Kelas 8', 'B', 'Srandakan', 'Alex', 'Loren', 'PNS', 'Swasta', 'Pandak', '-', '-', '-', '089765123456', 'default.jpg', 'Belum Diterima', 'akta.pdf', 'kk.pdf', 'ijazah.pdf', 'sk.pdf'),
('C202001160001', 'Mefri Andriyanto', '3163111096', 'Sleman', '1995-05-07', 'ISLAM', '', 'Srandakan,Bantul,Yogyakarta', '08562971772', '2020-01-16', 'SMAN 1 panjangan bantul', 'Kelas 12', 'C', 'Jalan Pajangan,Bantul', 'Damar Prasetyo', 'Yuli Asriningtias', 'Dosen', 'IRT', 'Srandakan,Bantul,Yogyakarta', '-', '-', '-', '08562971772', 'Koala.jpg', 'Belum Diterima', 'akta.pdf', 'kk.pdf', 'ijazah.pdf', 'Sk pindah.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `no_pendaftar` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas_diterima` varchar(10) NOT NULL,
  `kode_kelas` int(11) NOT NULL,
  `kode_ta` int(11) NOT NULL,
  `status_siswa` enum('Aktif','Tidak Aktif','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `no_pendaftar`, `nama`, `kelas_diterima`, `kode_kelas`, `kode_ta`, `status_siswa`) VALUES
(2, 'A202001160001', 'Mefri Andriyanto ', 'Kelas 6 ', 6, 1, 'Tidak Aktif'),
(3, 'B202001160001', 'Mefri Andriyanto ', 'Kelas 7 ', 7, 3, 'Aktif'),
(4, 'A202001160001', 'Mefri Andriyanto ', 'Kelas 6 ', 0, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa_kelas`
--

CREATE TABLE `siswa_kelas` (
  `id_siswa_kelas` int(11) NOT NULL,
  `no_induk` varchar(12) NOT NULL,
  `kode_kelas` int(11) NOT NULL,
  `kode_ta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `kode_ta` int(11) NOT NULL,
  `ta` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`kode_ta`, `ta`) VALUES
(1, '2016/2017'),
(2, '2017/2018'),
(3, '2018/2019'),
(4, '2019/2020'),
(5, '2020/2021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tutor`
--

CREATE TABLE `tutor` (
  `kode_tutor` varchar(11) NOT NULL,
  `nama_tutor` varchar(50) NOT NULL,
  `tempat_lhr` varchar(30) NOT NULL,
  `tanggal_lhr` date NOT NULL,
  `jenkel` enum('laki-laki','perempuan') NOT NULL,
  `agama` varchar(12) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `tgl_terdaftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tutor`
--

INSERT INTO `tutor` (`kode_tutor`, `nama_tutor`, `tempat_lhr`, `tanggal_lhr`, `jenkel`, `agama`, `alamat`, `no_hp`, `tgl_terdaftar`) VALUES
('T200116A001', 'Haryadi Iswanto', 'Sleman', '1988-02-03', 'laki-laki', 'ISLAM', 'Jl. Srandakan KM. 09 Dawetan Triharjo Pandak Bantul', '089775987211', '2020-01-16'),
('T200116B001', 'Ernie Isnainy', 'Surabaya', '1970-03-30', 'perempuan', 'ISLAM', 'Jl. Imogiri Barat KM. 9,5 Ngentak Timbulharjo Sewon Bantul', '089611094208', '2020-01-16'),
('T200116C001', 'Bulan Balkis', 'Bantul', '1986-10-07', 'perempuan', 'ISLAM', 'Jl. Imogiri Timur KM. 04 Jejeran Pleret Bantul', '085629807712', '2020-01-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `level_id` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `level_id`, `nama`, `username`, `password`) VALUES
(1, 1, 'mefri', 'raizen', 'a6ff02b83b73e4ae298ef635764bd2c4'),
(2, 2, 'Ernie Isnainy', 'Isnainy123', '185ac77ec6dac538cf8c61f5fa40c670'),
(3, 3, 'Andri', '123123', '4297f44b13955235245b2497399d7a93');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `kode_ta` (`kode_ta`),
  ADD KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `kode_tutor` (`kode_tutor`),
  ADD KEY `kode_mapel` (`kode_mapel`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`kode_mapel`),
  ADD KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `kode_tutor` (`kode_tutor`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `no_induk` (`id_siswa`),
  ADD KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `kode_ta` (`kode_ta`),
  ADD KEY `id_detail_mapel` (`kode_mapel`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`no_pendaftar`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `no_pendaftar` (`no_pendaftar`),
  ADD KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `kode_ta` (`kode_ta`);

--
-- Indexes for table `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
  ADD PRIMARY KEY (`id_siswa_kelas`),
  ADD KEY `no_induk` (`no_induk`),
  ADD KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `kode_ta` (`kode_ta`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`kode_ta`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`kode_tutor`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`level_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kode_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
  MODIFY `id_siswa_kelas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `kode_ta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_4` FOREIGN KEY (`kode_ta`) REFERENCES `tahun_ajaran` (`kode_ta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_5` FOREIGN KEY (`kode_tutor`) REFERENCES `tutor` (`kode_tutor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_6` FOREIGN KEY (`kode_mapel`) REFERENCES `mapel` (`kode_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD CONSTRAINT `mapel_ibfk_1` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mapel_ibfk_2` FOREIGN KEY (`kode_tutor`) REFERENCES `tutor` (`kode_tutor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`kode_ta`) REFERENCES `tahun_ajaran` (`kode_ta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
  ADD CONSTRAINT `siswa_kelas_ibfk_1` FOREIGN KEY (`no_induk`) REFERENCES `siswa_wb` (`no_induk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_kelas_ibfk_2` FOREIGN KEY (`kode_ta`) REFERENCES `tahun_ajaran` (`kode_ta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `level` (`level_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
