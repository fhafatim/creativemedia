-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Sep 2021 pada 06.01
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infocrea_apps-backend`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(300) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `grup_id` int(10) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `last_created_date` datetime NOT NULL,
  `last_update_date` datetime NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `last_update_by` varchar(200) NOT NULL,
  `last_login_user` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `nama`, `grup_id`, `foto`, `status`, `last_created_date`, `last_update_date`, `created_by`, `last_update_by`, `last_login_user`) VALUES
(1, 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 'admincreative@gmail.com', 'Admin Creative Media', 1, 'no-image.jpg', 3, '0000-00-00 00:00:00', '2019-05-07 10:22:32', '', 'Admin Creative Media', '2021-09-06 10:50:42'),
(3, 'csotubanan ', 'bf254f791b53a9aacc8f20ffa7a778aa', 'cs@creativemedia.id', 'CSO Tubanan', 3, 'no-image.jpg', 3, '2019-05-07 10:29:16', '2021-08-06 01:27:12', 'Admin Creative Media', 'Admin Creative Media', '2021-09-04 08:11:15'),
(4, 'mastereditor ', 'd17996618b444aec1ff8a036278d02da', 'editor@creativemedia.id', 'Editor Konten', 4, 'no-image.jpg', 3, '2019-05-07 10:47:19', '2021-08-06 01:29:41', 'Admin Creative Media', 'Admin Creative Media', '2021-08-06 01:34:08'),
(5, 'csonginden', '53375d3ebc8c559670e1c34658d8792b', 'csonginden@creativemedia.id', 'CSO Nginden', 3, 'no-image.jpg', 3, '2019-05-07 14:03:16', '2021-08-06 01:26:04', 'Admin Creative Media', 'Admin Creative Media', '2020-01-03 17:00:42'),
(6, 'masterhrd', '83862a9fd68e79b7886d22770ee3a38d', 'hrd@creativemedia.id', 'HRD Creative Media', 5, 'no-image.jpg', 3, '2019-05-07 14:07:25', '2021-08-06 01:30:26', 'Admin Creative Media', 'Admin Creative Media', '2019-05-07 14:31:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `agama`
--

CREATE TABLE `agama` (
  `id_agama` int(11) NOT NULL,
  `nama_agama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `agama`
--

INSERT INTO `agama` (`id_agama`, `nama_agama`) VALUES
(1, 'Islam'),
(2, 'Kristen'),
(3, 'Katolik'),
(4, 'Hindu'),
(5, 'Budha'),
(6, 'Kepercayaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `judul` varchar(300) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(200) NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `updated_by` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `gambar`, `judul`, `deskripsi`, `status`, `created_by`, `updated_by`, `created_date`, `updated_date`) VALUES
(4, 'upload/gambar/foto_2.jpg', 'Corporate Training Editing Video Creative Media Bersama Badan Besar Pengawas Obat dan Makanan (BBPOM) Padang', '<p>Creative Media dipercaya oleh Badan Besar Pengawas Obat dan Makanan (BBPOM) Padang dalam memberikan Materi Pelatihan/Training  bidang studi \"Editing Video\". Pelatihan dilaksanakan selama 4 hari pada tanggal 19 s/d 23 November 2018 di Branch Office kami Jl. Nginden Intan Timur XVIII/A3-10, Surabaya. \r\n\r\nPeserta sangat antusias dengan materi yang dibawakan oleh Trainer kami, karena kami menerapkan metode pembelajaran yang efektif dan efisien sehingga peserta mampu menangkap materi dan langsung mengimplementasikan kedalam software editing video yaitu Adobe Premiere dan Adobe After Effects. Tidak hanya itu, kami memberikan kesempatan kepada peserta untuk melihat secara langsung dalam produksi dan teknik pengambilan gambar pada pembuatan iklan pendek sebuah produk perusahaan.\r\n</p><p>Jadi para peserta bisa langsung mempraktekan ilmu yang didapat dari materi pelatihan dalam produksi iklan/video dalam instansi internal perusahaan. Nah, bagi anda yang ingin mengembangka keilmuwan dibidang Editing Video, atau tentang IT &amp; Multimedia, Creative Media adalah tempat yang tepat, segera daftarkan diri anda. Bisa hubungi Customer Service kami di 0821 3131 4040 / 0821 3131 0210 atau bisa telpon di 031 – 7328540 / 031 – 59173739.</p>', 'Publish', 'Admin Creative Media', 'Admin Creative Media', '2018-12-27 04:00:18', '2019-03-14 16:32:53'),
(6, 'upload/gambar/foto_1.jpg', 'Corporate Training Editing Video Creative Media Bersama PT. Panasonic Industrial Devices Batam', '<p style=\"margin-bottom: 24px; border: 0px; font-family: Lato, sans-serif; font-size: 13px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(64, 64, 64);\">Creative Media dipercaya oleh PT. Panasonic Industrial Devices Batam untuk melaksanakan Corporate <strong style=\"border: 0px; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Training Editing Video </strong>menggunakan Pinnacle Studio 21 kepada 2 staff diantaranya Bpk. Arif Bagus Amaludin dan Bpk. Rahmat Wijaya.</p><p style=\"margin-bottom: 24px; border: 0px; font-family: Lato, sans-serif; font-size: 13px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(64, 64, 64);\"><strong style=\"border: 0px; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Training Editing Video </strong>dilaksanakan selama 3 hari yang berlangsung pada 12 s/d 14 November 2018 di Branch Office kami di Jl. Nginden Intan Timur XVIII/A3-10, Surabaya. Meskipun sangat singkat tetapi peserta sangat antusias untuk mengikuti materi yang diberikan oleh trainer kami yaitu Bpk. Dicky Arif Hardianza yang ahli dibidangnya.</p><p style=\"margin-bottom: 24px; border: 0px; font-family: Lato, sans-serif; font-size: 13px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(64, 64, 64);\">Dalam <strong style=\"border: 0px; font-family: inherit; font-style: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Training Editing Video </strong>tak hanya materi saja yang diberikan, tetapi peserta juga langsung praktik untuk menggunakan software Pinnacle Studio 21, dari memotong setiap bagian video, memberikan effect, transisi, hingga menambahkan audio yang pas agar tercipta sebuah video yang keren.</p><p style=\"margin-bottom: 24px; border: 0px; font-family: Lato, sans-serif; font-size: 13px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(64, 64, 64);\"><span style=\"font-family: inherit; font-style: inherit; font-weight: inherit;\">Nah, bagi anda yang ingin mengembangkan dan mempelajari Editing Video, atau tentang IT dan Multimedia Creative Media adalah tempat yang tepat, segera daftarkan diri anda. Bisa hubungi Customer Service kami di 0821 3131 4040 / 0821 3131 0210 atau bisa telpon di 031 – 7328540 / 031 – 59173739.</span></p>                        ', 'Publish', 'Admin Creative Media', 'Admin Creative Media', '2018-12-27 04:11:42', '2019-03-13 16:39:09'),
(7, 'upload/gambar/galeri1.jpg', 'Corporate Training Editing Video Creative Media Bersama Fakultas Kedokteran Universitas Jember', '<p style=\"margin:0cm;margin-bottom:.0001pt;vertical-align:baseline\"><span style=\"font-family:\"Lato\",\"sans-serif\";color:#404040\">Creative Media dipercaya\r\noleh Fakultas Kedokteran Universitas Jember untuk melaksanakan Corporate </span><strong style=\"font-style: inherit; outline: 0px;\"><span style=\"font-family:\"inherit\",\"serif\";color:#404040;\r\nborder:none windowtext 1.0pt;mso-border-alt:none windowtext 0cm;padding:0cm\">Training\r\nEditing Video</span></strong><span style=\"font-family:\"Lato\",\"sans-serif\";\r\ncolor:#404040\"> dengan judul ‘Pembuatan Media Pembelajaran Audio Visual’\r\ntraining dilakukan oleh 5 staff dari Universitas Jember yaitu Ibu Adelia\r\nHandoko, dr., M.Si, Bpk. Ahmad Kodri Riyandoko, A.Md. Kep, Bpk. Rizqi\r\nMardianan, Bpk. Laksono Hadi Prastyo, A.Md. Kep, Bpk. Dion K. Dharmawan, dr.,\r\nM.Si.<o:p></o:p></span></p><p style=\"margin: 0cm 0cm 0.0001pt; vertical-align: baseline; outline: 0px;\"><span style=\"font-family:\"Lato\",\"sans-serif\";color:#404040\">Pada </span><strong style=\"font-style: inherit; outline: 0px;\"><span style=\"font-family:\"inherit\",\"serif\";color:#404040;\r\nborder:none windowtext 1.0pt;mso-border-alt:none windowtext 0cm;padding:0cm\">Training\r\nEditing Video</span></strong><span style=\"font-family:\"Lato\",\"sans-serif\";\r\ncolor:#404040\"> kali ini langsung dibimbing oleh trainer kami yaitu Bpk.\r\nTomy Tri Haryono yang memang ahli di bidangnya. Training dilaksanakan selama 2\r\nhari pada tanggal 14 s/d 15 Januari 2019 di Branch Office kami Jl. Nginden\r\nIntan Timur XVIII/A3-10, Surabaya.<o:p></o:p></span></p><p style=\"margin: 0cm 0cm 0.0001pt; vertical-align: baseline; outline: 0px;\"><span style=\"font-family:\"Lato\",\"sans-serif\";color:#404040\">Pada\r\nsaat </span><strong style=\"font-style: inherit; outline: 0px;\"><span style=\"font-family:\"inherit\",\"serif\";\r\ncolor:#404040;border:none windowtext 1.0pt;mso-border-alt:none windowtext 0cm;\r\npadding:0cm\">Training Editing Video</span></strong><span style=\"font-family:\r\n\"Lato\",\"sans-serif\";color:#404040\"> para peserta sangat antusias mengikuti\r\nmateri yang disampaikan oleh trainer, software yang para peserta gunakan adalah\r\nAdobe Premiere dan Adobe After Effect, tak hanya materi saja yang diberikan\r\npara peserta juga diajak praktek langsung untuk menggunakan software yang\r\ndigunakan.<o:p></o:p></span></p><p style=\"margin: 0cm 0cm 18pt; vertical-align: baseline; outline: 0px;\"><span style=\"font-family:\"Lato\",\"sans-serif\";color:#404040\">Nah, bagi anda yang ingin\r\nmengembangkan dan mempelajari Editing Video, atau tentang IT dan Multimedia\r\nCreative Media adalah tempat yang tepat, segera daftarkan diri anda. Bisa\r\nhubungi Customer Service kami di 0821 3131 4040 / 0821 3131 0210 atau bisa\r\ntelpon di 031 – 7328540 / 031 – 59173739.<o:p></o:p></span></p><p style=\"margin-bottom: 24px; border: 0px; font-family: Lato, sans-serif; font-size: 16px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(64, 64, 64);\">\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><o:p> </o:p></p>                ', 'Publish', 'Admin Creative Media', 'Admin Creative Media', '2019-03-14 15:56:54', '2019-03-14 16:11:44'),
(8, 'upload/gambar/galeri6.jpg', 'Creative Media Family Gathering 2018 \"Semangat Kebersamaan, Menjalin Keakraban\"', '<p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\nnormal\"><span style=\"font-size: 10pt; font-family: \"Source Sans Pro\", sans-serif;\">Pada 13 Desember 2018 Creative Media\r\nMengadakan Family Gathering 2018 yang dihadiri oleh para trainer dan staff\r\nCreative Media, dalam acara tersebut di pimpin langsung oleh CEO Creative Media\r\nyaitu Bpk. Hadi Sisyanto dengan moderator dari staff Creative Media yaitu Ayu\r\nSarwinasih, ada pula penyampaian materi yang disampaikan oleh Bpk. Hadi\r\nSisyanto dan Yusi Aristawati (Riris).<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\nnormal\"><span style=\"font-family: \"Source Sans Pro\", sans-serif; font-size: 10pt;\"><br></span></p><p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\nnormal\"><span style=\"font-family: \"Source Sans Pro\", sans-serif; font-size: 10pt;\">Acara Family Gathering diadakan di Branch\r\nOffice kami di Jl. Nginden Intan Timur XVIII Blok A3-10, Surabaya. Dalam Family\r\nGathering kali ini mengambil tema “Semangat Kebersamaan, Menjalin Keakraban”\r\ndiharapkan akan tumbuh adanya kebersamaan dan keakraban antara para staff,\r\ntrainer, dan siswa yang belajar di Creative Media. Acara ini diadakan bertujuan\r\nuntuk  menginformasikan SOP Trainer yang baru untuk tahun ajar 2019, tak\r\nhanya itu saja ada juga sesi Tanya jawab yang disampaikan langsung oleh para trainer\r\nuntuk perkembangan tahun ajar 2019, disini juga bisa menjadi tempat sharing\r\npara trainer selama mengajar siswa yang belajar di Creative Media baik itu\r\nsiswa Private Class, Home Private, ataupun Reguler Class.</span><span style=\"font-size: 10pt; font-family: \"Source Sans Pro\", sans-serif;\"><br></span></p><p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\nnormal\"><span style=\"font-family: \"Source Sans Pro\", sans-serif; font-size: 10pt;\"><br></span></p><p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\nnormal\"><span style=\"font-family: \"Source Sans Pro\", sans-serif; font-size: 10pt;\">Dalam acara Family Gathering ini juga\r\nmemberikan reward kepada para Trainer dengan kategori favorit, disiplin, dan\r\nloyalitas, untuk katergori Trainer Favorit berhasil diraih oleh Bpk. Sugianto,\r\nuntuk kategori Trainer Disiplin berhasil diraih oleh Bpk. Johanes Adi\r\nKristanto, dan untuk Kategori Loyalitas berhasil diraih oleh Bpk. Dicky Arif\r\nHardianza, dengan adanya reward dan pemenangnya diharapkan bisa memotivasi\r\ntrainer lainnya.</span><span style=\"font-size: 10pt; font-family: \"Source Sans Pro\", sans-serif;\"><br></span></p><p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\nnormal\"><span style=\"font-family: \"Source Sans Pro\", sans-serif; font-size: 10pt;\"><br></span></p><p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\nnormal\"><span style=\"font-family: \"Source Sans Pro\", sans-serif; font-size: 10pt;\">Nah, bagi anda yang ingin belajar tentang\r\nIT & Multimedia dan diajar langsung oleh trainer yang hebat dan\r\nberpengalaman dibidangnya dari Creative Media bisa segera daftarkan diri anda,\r\natau anda juga bisa menghubungi Customer Service kami di 0821 3131 4040 / 0821\r\n3131 0210 atau bisa telpon di 031 – 7328540 / 031 – 59173739 untuk info lebih\r\nlanjutnya.</span><span style=\"font-size: 10pt; font-family: \"Source Sans Pro\", sans-serif;\"><br></span></p><p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\nnormal\">\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><span style=\"font-size:10.0pt;line-height:115%\"><o:p> </o:p></span></p>                ', 'Publish', 'Admin Creative Media', 'Admin Creative Media', '2019-03-14 16:00:49', '2019-03-15 15:22:11'),
(9, 'upload/gambar/galeri_3a.jpg', 'Corporate Training Editing Video Creative Media Bersama Bagian Humas dan Protokol Kota Kediri', '<p style=\"margin:0cm;margin-bottom:.0001pt;vertical-align:baseline\"><span style=\"font-size:10.0pt;font-family:\" lato\",\"sans-serif\";color:#404040\"=\"\">Creative\r\nMedia dipercaya oleh Bagian Humas dan Protokol Kota Kediri untuk melaksanakan\r\nCorporate </span><strong style=\"font-style: inherit; outline: 0px;\"><span style=\"font-size:10.0pt;font-family:\r\n\" inherit\",\"serif\";color:#404040;border:none=\"\" windowtext=\"\" 1.0pt;mso-border-alt:=\"\" none=\"\" 0cm;padding:0cm\"=\"\">Training Desain Grafis,</span></strong><span style=\"font-size:10.0pt;font-family:\" lato\",\"sans-serif\";color:#404040\"=\"\"> training\r\ndilakukan oleh 5 staff dari Bagian Humas dan Protokol Kota Kediri yaitu Bpk.\r\nHerwin Zakiyah, ST.M.Eng, Ibu Rinta Ariestia Hardianti, Bpk. Arief Cholisudin,\r\nS.STP.MM, Bpk. Seta Prasetya Adhi Sunda, Bpk. Nico Puji Setiawan.<o:p></o:p></span></p><p style=\"margin:0cm;margin-bottom:.0001pt;vertical-align:baseline\"><span style=\"font-size:10.0pt;font-family:\" lato\",\"sans-serif\";color:#404040\"=\"\"><o:p> </o:p></span><span lato\",\"sans-serif\";=\"\" color:#404040\"=\"\" style=\"font-size: 10pt;\">Pada </span><strong style=\"font-style: inherit; outline: 0px;\"><span style=\"font-size:10.0pt;font-family:\" inherit\",\"serif\";color:#404040;border:=\"\" none=\"\" windowtext=\"\" 1.0pt;mso-border-alt:none=\"\" 0cm;padding:0cm\"=\"\">Training\r\nDesain Grafis</span></strong><span lato\",\"sans-serif\";=\"\" color:#404040\"=\"\" style=\"font-size: 10pt;\"> kali ini langsung dibimbing oleh trainer kami yaitu Ibu.\r\nTika Mutiara Safitri yang memang ahli di bidangnya. Training dilaksanakan\r\nselama 3 hari pada tanggal 13 s/d 15 Desember 2018 di Branch Office kami Jl.\r\nNginden Intan Timur XVIII/A3-10, Surabaya.</span></p><p style=\"margin:0cm;margin-bottom:.0001pt;vertical-align:baseline\"><span style=\"font-size:10.0pt;font-family:\" lato\",\"sans-serif\";color:#404040\"=\"\"><o:p> </o:p></span><span lato\",\"sans-serif\";=\"\" color:#404040\"=\"\" style=\"font-size: 10pt;\">Pada saat </span><strong style=\"font-style: inherit; outline: 0px;\"><span style=\"font-size:10.0pt;font-family:\" inherit\",\"serif\";color:#404040;border:=\"\" none=\"\" windowtext=\"\" 1.0pt;mso-border-alt:none=\"\" 0cm;padding:0cm\"=\"\">Training\r\nDesain Grafis</span></strong><span lato\",\"sans-serif\";=\"\" color:#404040\"=\"\" style=\"font-size: 10pt;\"> para peserta sangat antusias mengikuti materi yang\r\ndisampaikan oleh trainer, software yang para peserta gunakan adalah Adobe\r\nPhotoshop dan CorelDraw, tak hanya materi saja yang diberikan para peserta juga\r\ndiajak praktek langsung untuk menggunakan software yang digunakan.</span></p><p style=\"margin:0cm;margin-bottom:.0001pt;vertical-align:baseline\"><span style=\"font-size:10.0pt;font-family:\" lato\",\"sans-serif\";color:#404040\"=\"\"><o:p> </o:p></span><span style=\"font-size: 10pt;\">Nah,\r\nbagi anda yang ingin mengembangkan dan mempelajari Desain Grafis, atau tentang\r\nIT dan Multimedia Creative Media adalah tempat yang tepat dan juga dibimbing\r\nlangsung oleh Trainer yang ahli dibidangnya, segera daftarkan diri anda. Bisa\r\nhubungi Customer Service kami di 0821 3131 4040 / 0821 3131 0210 atau bisa\r\ntelpon di 031 – 7328540 / 031 – 59173739.</span></p>                        ', 'Publish', 'Admin Creative Media', 'Admin Creative Media', '2019-03-14 16:03:32', '2019-03-15 15:24:55'),
(10, 'upload/gambar/galeri5.jpg', 'Corporate Training Editing Video dan Desain Grafis Creative Media Bersama PT. Pupuk Kalimantan Timur', '<p style=\"margin: 0cm 0cm 0.0001pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; vertical-align: baseline;\"><span style=\"font-size:10.0pt;font-family:\" lato\",\"sans-serif\";=\"\" color:#404040\"=\"\">Creative Media dipercaya oleh PT. Pupuk Kalimantan Timur untuk\r\nmelaksanakan Corporate&nbsp;</span><strong style=\"font-style: inherit; outline: 0px;\"><span style=\"font-size:10.0pt;font-family:\" inherit\",\"serif\";color:#404040;border:=\"\" none=\"\" windowtext=\"\" 1.0pt;mso-border-alt:none=\"\" 0cm;padding:0cm\"=\"\">Training\r\nDesain Grafis dan Editing Video,</span></strong><span style=\"font-size:10.0pt;\r\nfont-family:\" lato\",\"sans-serif\";color:#404040\"=\"\">&nbsp;training dilakukan oleh 3\r\nstaff dari PT. Pupuk Kalimantan Timur yaitu Bpk. Muhammad Fauzi, Bpk. Nasrullah,\r\nBpk. Sri Lasono.</span><span style=\"font-size: 10pt;\">&nbsp;</span></p><p style=\"margin: 0cm 0cm 0.0001pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; vertical-align: baseline; outline: 0px;\"><span style=\"font-size:10.0pt;font-family:\" lato\",\"sans-serif\";=\"\" color:#404040\"=\"\">Pada&nbsp;</span><strong style=\"font-style: inherit; outline: 0px;\"><span style=\"font-size:10.0pt;font-family:\" inherit\",\"serif\";color:#404040;border:=\"\" none=\"\" windowtext=\"\" 1.0pt;mso-border-alt:none=\"\" 0cm;padding:0cm\"=\"\">Training\r\nDesain Grafis dan Editing Video</span></strong><span style=\"font-size:10.0pt;\r\nfont-family:\" lato\",\"sans-serif\";color:#404040\"=\"\">&nbsp;kali ini langsung\r\ndibimbing oleh trainer kami yaitu Bpk. M. Kurniawan Najib yang memang ahli di\r\nbidangnya. Training dilaksanakan selama 3 hari pada tanggal 26 s/d 28 Februari\r\n2019 di Branch Office kami Jl. Nginden Intan Timur XVIII/A3-10, Surabaya.<o:p></o:p></span></p><p style=\"margin: 0cm 0cm 0.0001pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; vertical-align: baseline;\"><span lato\",\"sans-serif\";=\"\" color:#404040\"=\"\" style=\"font-size: 10pt;\">Pada saat&nbsp;</span><strong style=\"font-style: inherit; outline: 0px;\"><span style=\"font-size:10.0pt;font-family:\" inherit\",\"serif\";color:#404040;border:=\"\" none=\"\" windowtext=\"\" 1.0pt;mso-border-alt:none=\"\" 0cm;padding:0cm\"=\"\">Training\r\nDesain Grafis dan Editing Video</span></strong><span lato\",\"sans-serif\";color:#404040\"=\"\" style=\"font-size: 10pt;\">&nbsp;para peserta sangat\r\nantusias mengikuti materi yang disampaikan oleh trainer, software yang para\r\npeserta gunakan adalah Adobe Photoshop, CorelDraw, Adobe Premiere, dan Adobe\r\nAfter Effect tak hanya materi saja yang diberikan para peserta juga diajak\r\npraktek langsung untuk menggunakan software yang digunakan.</span><br></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><o:p>&nbsp;</o:p></p>        ', 'Publish', 'Admin Creative Media', 'Admin Creative Media', '2019-03-14 16:32:04', '2019-03-15 15:26:19'),
(11, 'upload/gambar/Bagi_-_Bagi_Takjil.jpg', 'Berbagi Kebaikan di Bulan Suci Ramadhan 1440 H Bersama Creative Media ', '<p class=\"MsoNormal\"><span lang=\"EN-US\" style=\"font-size:12.0pt;mso-bidi-font-size:\r\n11.0pt;line-height:107%\">Bulan Ramadhan adalah bulan yang penuh berkah, dimana\r\nbulan yang sangat di nantikan oleh umat muslim mereka berlomba – lomba untuk\r\nmendapatkan pahala dan berkah di bulan suci ini. Dan di Bulan Ramadhan ini\r\nsemoga ibadah yang kita kerjakan dan do’a – do’a yang kita panjatkan bisa di\r\nijabah oleh Allah Subhanallahu Wata’ala.<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"EN-US\" style=\"font-size:12.0pt;mso-bidi-font-size:\r\n11.0pt;line-height:107%\">Untuk mendapatkan keberkahan itu salah satu yang\r\ndilakukan adalah berbuat kebaikan kepada semua orang. Maka dari itu Creative\r\nMedia ingin berbagi kebaikan di Bulan Suci Ramadhan yang penuh berkah ini\r\ndengan “<b>bagi – bagi takjil</b>” yang\r\ndilaksanakan pada 23 Mei 2019 di Institute Teknologi 10 November (ITS). <o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"EN-US\" style=\"font-size:12.0pt;mso-bidi-font-size:\r\n11.0pt;line-height:107%\">Kehadiran kami dijalanan dismabut dengan antusias oleh\r\npengguna jalan, acara berlangsung dengan lancer dan sukses. Seperti pada tahun\r\n-tahun sebelumnya, dimana acara ini merupakan acara rutin yang kami\r\nselenggarakan setiap Bulan Ramadhan. <o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><span lang=\"EN-US\" style=\"font-size:12.0pt;mso-bidi-font-size:\r\n11.0pt;line-height:107%\">Tak hanya itu di Bulan Ramadhan ini kami memberikan\r\n“PROMO RAMADHAN” yaitu Diskon/Potongan kursus sebesar Rp. 150.000 tak hanya\r\npotongan saja kami juga memberikan Free Starterkit senilai Rp. 200.000, segera\r\ndaftarkan diri anda untuk kursus di Creative Media sebelum promo berakhir. Bisa\r\nlangsung hubungi Customer Service kami di </span><span lang=\"EN-US\" style=\"font-size:12.0pt;line-height:107%\">0821 3131 4040 / 0821 3131 0210 atau\r\nbisa telpon di 031 - 7328540 / 031 – 59173739.&nbsp;</span><span lang=\"EN-US\" style=\"font-size:12.0pt;mso-bidi-font-size:11.0pt;line-height:107%\"><o:p></o:p></span></p>', 'Publish', 'Editor Creative Media', '', '2019-06-14 13:58:16', '0000-00-00 00:00:00'),
(12, 'upload/gambar/Buka_Puasa_Bersama.jpg', 'Buka Puasa Bersama Creative Media Sebagai Ajang Silahturahmi ', '<p class=\"MsoNormal\"><span lang=\"EN-US\" style=\"font-size:12.0pt;mso-bidi-font-size:\r\n11.0pt;line-height:107%\">Bulan Ramadhan adalah Bulan yang penuh berkah, Bulan\r\nyang sangat dinantikan oleh umat muslim di seluruh dunia, karena di bulan ini\r\nkita bisa berlomba – lomba untuk mendapatkan keberkahan dan pahala.<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"EN-US\" style=\"font-size:12.0pt;mso-bidi-font-size:\r\n11.0pt;line-height:107%\">Dan di Bulan Ramadhan ini biasanya dijadikan sebagai\r\najang berkumpul Bersama keluarga, saudara, teman, dan sahabat saat berbuka\r\npuasa, karena dengan begitu bisa menjadi ajang silaturahmi berbagi kebaikan dan\r\nkehangatan.<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"EN-US\" style=\"font-size:12.0pt;mso-bidi-font-size:\r\n11.0pt;line-height:107%\">Bertepatan dengan adanya Bulan Suci Ramadhan ini,\r\nCreative Media mengadakan acara <b>Buka\r\nPuasa Bersama</b> sebagai ajang silaturahmi dengan staff, trainer, dan\r\nmanajemen. Acara dilaksanakan pada hari Rabu, 22 Mei 2019 yang berlangsung di\r\nZoom Hotel Surabaya. Acara berlangsung cukup sederhana dengan penuh kebahagiaan\r\ndan kehangatan.<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><span lang=\"EN-US\" style=\"font-size:12.0pt;mso-bidi-font-size:\r\n11.0pt;line-height:107%\">Diharapkan dengan adanya acara buka puasa Bersama,\r\nkita akan mendapatkan banyak motivasi dan semangat beribadah untuk menjalankan\r\npuasa di hari esok. Melakukan buka Bersama dengan orang-orang dicintai bisa\r\nmenjadi keberkahan untuk ita semua. Kami berharap kegiatan ini dapat terus ada\r\nkarena mempunyai banyak manfaat bagi semua pihak dan berharap bisa lebih besar\r\ndalam skala yang luas.<o:p></o:p></span></p>', 'Publish', 'Editor Creative Media', '', '2019-06-14 14:00:21', '0000-00-00 00:00:00'),
(13, 'upload/gambar/Training_Photography.jpg', 'Corporate Training Photography Creative Media Bersama PT. Jatipurna Artindo Design', '<p class=\"MsoNormal\"><span lang=\"EN-US\" style=\"font-size:12.0pt;line-height:115%\">Creative\r\nMedia dipercaya oleh PT. Jatipurna Artindo Design untuk melaksanakan Corporate <b>Training Photography,</b> training\r\ndilakukan oleh 2 staff dari PT. Jatipurna Artindo Design yaitu Bpk. Galasa\r\nPutra Audita &amp; Bpk. Taufiq Hidayat<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"EN-US\" style=\"font-size:12.0pt;line-height:115%\">Pada\r\n<b>Training Photography</b> kali ini\r\nlangsung dibimbing oleh trainer kami yaitu Bpk. Richard Angkapranoto, S. Sn yang\r\nmemang ahli di bidangnya. Training dilaksanakan selama 3 hari pada tanggal 13,\r\n16, 17 Mei 2019 di Branch Office kami Jl. Nginden Intan Timur XVIII/A3-10,\r\nSurabaya. <o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"EN-US\" style=\"font-size:12.0pt;line-height:115%\">Pada\r\nsaat <b>Training Photography</b> para\r\npeserta sangat antusias mengikuti materi yang disampaikan oleh trainer, tak\r\nhanya materi saja yang diberikan para peserta juga diajak praktek langsung\r\nuntuk menggunakan kamera secara langsung. Bagaimana cara pengaturan di kamera\r\ndalam pengambilan objek foto dan juga pengambilan angle foto yang tepat, selain\r\npraktik menggunakan kamera secara langsung para peserta juga diajarkan untuk\r\nmengedit foto menggunakan software Adobe Photoshop. <o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n<span lang=\"EN-US\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Calibri&quot;,sans-serif;\r\nmso-ascii-theme-font:minor-latin;mso-fareast-font-family:Calibri;mso-fareast-theme-font:\r\nminor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman&quot;;\r\nmso-bidi-theme-font:minor-bidi;mso-ansi-language:EN-US;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">Nah, bagi anda yang ingin mengembangkan dan\r\nmempelajari Photography, atau tentang IT dan Multimedia Creative Media adalah\r\ntempat yang tepat dan juga dibimbing langsung oleh Trainer yang ahli\r\ndibidangnya, segera daftarkan diri anda. Bisa hubungi Customer Service kami di\r\n0821 3131 4040 / 0821 3131 0210 atau bisa telpon di 031 - 7328540 / 031 –\r\n59173739.</span><br></p>', 'Publish', 'Editor Creative Media', '', '2019-06-14 14:01:23', '0000-00-00 00:00:00'),
(14, 'upload/gambar/Training_Microsoft_Excel_For_Business.jpg', 'Corporate Training Microsoft Excel For Business Creative Media Bersama PT. Epson Indonesia ', '<p class=\"MsoNormal\"><span lang=\"EN-US\" style=\"font-size:12.0pt;mso-bidi-font-size:\r\n11.0pt;line-height:107%\">Creative Media dipercaya oleh PT. Epson Indonesia\r\nuntuk melaksanakan <b>Training Microsoft\r\nExcel For Business</b>, pada training kali ini diikuti oleh 5 peserta diantaranya\r\nadalah Bpk. R. Soerjo Harjoko, Ibu Shabrina Mataram, Ibu Yuwana, Ibu Devina\r\nErlita Trisnie, dan Bpk. Hesthi Suranto. <o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"EN-US\" style=\"font-size:12.0pt;mso-bidi-font-size:\r\n11.0pt;line-height:107%\">Pada <b>Training\r\nMicrosoft Excel For Business</b> kali ini dibimbing langsung oleh trainer kami\r\nyaitu Ibu Dian Agita, S. E dan juga didampingi oleh staff trainer kami yaitu\r\nIbu Rina Andriani yang memang ahli dibidangnya, tak hanya materi saja yang\r\ndiberikan para peserta juga diajak secara langsung untuk praktek mengoperasikan\r\nMicrosoft Excel dengan baik dan benar.<o:p></o:p></span></p><p class=\"MsoNormal\"><b><span lang=\"EN-US\" style=\"font-size:12.0pt;mso-bidi-font-size:11.0pt;line-height:107%\">Training\r\nMicrosoft Excel for business</span></b><span lang=\"EN-US\" style=\"font-size:12.0pt;\r\nmso-bidi-font-size:11.0pt;line-height:107%\"> kali ini dilaksanakan selama 3\r\nhari pada tanggal 20 – 22 Mei 2019 dan training dilaksanakan secara langsung di\r\nkantor cabang PT. Epson Indonesia yang ada di Surabaya. Semoga dengan adanya\r\ntraining ini diharapkan para peserta bisa menambah ilmu tentang Microsoft Excel\r\nFor Business dari materi yang diberikan, dan bisa menerapkan materi yang\r\ndidapat untuk menunjang kinerja para peserta. <o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><span lang=\"EN-US\" style=\"font-size:12.0pt;mso-bidi-font-size:\r\n11.0pt;line-height:107%\">Nah, bagi anda yang ingin training ataupun kursus IT\r\n&amp; Multimedia di Creative Media bisa langsung hubungi kami di </span><span lang=\"EN-US\" style=\"font-size:12.0pt;line-height:107%\">0821 3131 4040 / 0821 3131\r\n0210 atau bisa telpon di 031 - 7328540 / 031 – 59173739. Karena disini akan\r\ndibimbing langsung oleh trainer yang memang berpengalaman dibidangnya, atau\r\nanda bisa kunjungi kami secara langsung di www.creativemedia.id&nbsp;<o:p></o:p></span></p>', 'Publish', 'Editor Creative Media', '', '2019-06-14 14:02:36', '0000-00-00 00:00:00'),
(15, 'upload/gambar/Creative_Media_.jpg', 'Creative Media meraih penghargaan di “ INDONESIA CREATIVE INNOVATIVE BUSINESS AWARD WINNER 2019” ', '<p class=\"MsoNormal\"><span lang=\"EN-US\">Pada Tahun 2019 <b>Creative Media</b> terpilih dan menerima penghargaan INDONESIA CREATIVE\r\nINNOVATIVE BUSINESS AWARDS WINNER 2019 yang merupakan penghargaan\r\nberkredibilitas tinggi dan paling bergengsi. Penghargaan ini merupakan bukti\r\nkepercayaan publik serta customer kami dalam berekspansi meningkatkan\r\nkeberhasilan diri dan lembaga, dan juga menjadi sebuah apresiasi sebagai bukti\r\nkehandalan dalam pengakuan yang mengukuhkan sebagai salah satu terbaik di tanah\r\nair.<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"EN-US\">Penghargaan prestisius ini menganugerahkan\r\npengakuan dan penghargaan Istimewa, yang Eksklusif diberikan kepada Bapak HADI\r\nSISYANTO Direktur Utama <b>CREATIVE MEDIA</b>\r\nuntuk menerima penghargaan special INDONESIA BUSINESS EXCELLENCE AWARD WINNER\r\n2019, Pada hari Jumat 12 April 2019 Pukul 19.00 WIB, bertempat di Aston\r\nPriority Simatupang Hotel – Jakarta. Perhargaan ini diberikan secara langsung\r\noleh PUSAT REKOR INDONESIA.<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><span lang=\"EN-US\">Ajang penilaian dan penghargaan berskala\r\nnasional, pengakuan pihak juri hasil konsorsium dari Pusat Rekor Indonesia\r\ndengan didukung Pejabat Pemerintah Pusat &amp; Daerah, Lembaga Sosial\r\nMasyarakat, Media cetak yang tersebar di seluruh Indonesia sehingga menjadi\r\nbarometer penerima penghargaan yang memiliki reputasi, kredibilitas dan rekam\r\njejak kwalitas unggul dan terpercaya. Sebuah nilai kesempurnaan dan cermin\r\nkesuksesan dengan penghargaan yang diterima, it’s signature of your success.<o:p></o:p></span></p>', 'Publish', 'Editor Creative Media', '', '2019-06-14 14:04:27', '0000-00-00 00:00:00'),
(16, 'upload/gambar/kursus_editing_video_surabaya.jpg', 'Lebih Mahir Dengan Kursus Editing Video di Creative Media', '<p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"IN\">Anda sedang</span><span lang=\"IN\"> </span><span lang=\"IN\">men</span><span lang=\"EN-US\">cari tempat <b>Kursus\r\nEditing Video Surabaya</b>? Anda menemukan tempat yang tepat,</span><span lang=\"EN-US\"> </span><span lang=\"EN-US\">Creative Media\r\n</span><span lang=\"IN\">jawabannya</span><span lang=\"EN-US\">. Di zaman serba digital</span><span lang=\"IN\"> dengan</span><span lang=\"EN-US\"> per</span><span lang=\"IN\">kembangan</span><span lang=\"EN-US\"> semakin pesat menuntut kita untuk\r\nmengikuti trend yang ada, apalagi di bidang media baik itu foto ataupun video.\r\nSalah satunya sebut saja Vlog, yang sekarang banyak di gandrungi banyak orang\r\nbaik yang tua ataupun muda, mereka berbondong-bondong untuk menciptakan suatu\r\nvideo yang menarik, Tak hanya vlog saja sekarang ini banyak para pebisnis juga\r\nmenggunakan video untuk mempromosikan bisnis mereka. &nbsp;</span><span lang=\"IN\">M</span><span lang=\"EN-US\">enjadikan social media untuk memperbanyak viewers\r\ndari video yang di publikasikan. <o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\">Apalagi hanya dengan\r\nbermodalkan Smartphone saja sudah bisa merekam video sesuai yang di inginkan.\r\nDengan Spec Smartphone yang mumpuni dengan resolusi tinggi yang banyak dijual\r\ndipasaran kita tidak perlu keluar banyak modal membuat bahan untuk merekam\r\nvideo. Bagi mereka yang ingin mendalami ilmu editing video bisa melakukan\r\nberbagai cara agar bisa membuat video yang menarik, dari Searching di internet\r\nhingga membaca buku tutorial, karena editing video bukan sesuatu yang mudah\r\nuntuk dipelajari. Maka dari itu diperlukan skill khusus untuk bisa menjadikan\r\nsebuah video lebih menarik dan terlihat professional. Untuk itu Creative Media\r\nmenyediakan <b>Kursus Editing Video\r\nSurabaya</b> untuk Anda yang ingin mengemas </span><span lang=\"IN\">promosi dengan format Video.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-size:14.0pt;line-height:115%\">Apa Itu Editing Video?<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\">Editing Video\r\nmerupakan proses seleksi video dari proses shooting, penambahan teks, sound,\r\neffect, dan lain sebagainya, atau menggabungkan gambar-gambar dengan\r\nmenyisipkan sebuah transisi. Tujuan dari Editing Video adalah membuat suatu\r\nrekaman dari proses shooting untuk dijadikan sebuah video yang menarik dan bisa\r\ndinikmati. </span><span lang=\"IN\">Untuk mendapatkan\r\nhasil secara Profesional, Anda bisa mengikuti kelas <b>Kursus Editing Video Surabaya</b> yang ada di Creative Media.</span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\">Dalam proses\r\nediting tidak hanya sesuatu yang bergerak saja yang bisa dijadikan video yang\r\nmenarik, tetapi foto juga bisa dijadikan sebuah video yaitu dengan membuat\r\nslide show atau stop motion, serta dapat juga menambahkan beberapa effect,\r\nteks, sound dan lain sebagainya yang bisa menjadikan foto tersebut menjadi\r\nsebuah video yang menarik. </span><span lang=\"EN-US\" style=\"color: rgb(17, 17, 17); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Untuk\r\nmenjadi seorang video editor yang handal pun di perlukan jiwa seni dan\r\nkreatifitas yang baik, agar dapat menciptakan dan merasakan apakah video yang\r\ndibuat siap ditayangkan itu sudah terlihat menarik atau belum. <o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"color: rgb(17, 17, 17); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Bagi anda yang tertarik untuk <b>Kursus Editing Video Surabaya</b>, di Creative Media lah tempatnya.\r\nDengan tentor yang ahli di bidangnya, fasilitas yang memadai bisa mendukung\r\nanda bisa lebih mahir untuk belajar editing video, di Creative Media juga bisa\r\nmengatur jadwal kursus lebih fleksibel jadi bisa disesuaikan dengan jadwal\r\nanda. Tanpa harus berpikir lama-lama lagi ayo segera daftarkan diri anda Via WA\r\ndi 0821 3131 4040 (Wida) / 0821 3131 0210 (Yesi) atau langsung telpon di 031 -\r\n7328540 / 031 – 59173739.&nbsp;<o:p></o:p></span></p>', 'Publish', 'Editor Creative Media', '', '2019-06-17 16:27:13', '0000-00-00 00:00:00'),
(17, 'upload/gambar/Aplikasi_Android.jpg', 'Creative Media Resmi Meluncurkan Aplikasi Android \"C-Mobile\" di Yello Hotel Surabaya.', '<p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\">S</span><span lang=\"IN\">ebagaimana yang sudah\r\nkita ketahui bersama bahwa pada tanggal 15 Maret 2019 merupakan Hari “Hak\r\nKonsumen Sedunia”, bertepatan dengan itu kami mengadakan acara “Launching <b>Aplikasi Android</b> C-Mobile” untuk\r\nKonsumen kami. Guna meningkatkan pelayanan yang prima kepada konsumen peran\r\nserta dalam pendidikan non formal khususnya dalam bidang IT &amp; Multimedia,\r\ndalam upaya membangun kualitas SDM yang lebih baik lagi dibidangnya.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"IN\">Konsumen merupakan\r\nasset dari sebuah perusahaan untuk dapat berkembang menjadi yang lebih baik\r\nlagi. Tugas kami adalah selalu melakukan maintain melalui berbagai pendekatan\r\nagar dapat dipercaya dan menjadi mitra terdepan dibidang Pendidikan Non Formal\r\nkhususnya IT &amp; Multimedia. Untuk itu kami selalu berusaha memberikan\r\nkemudahan serta peningkatan kualitas pelayanan yang prima kepada konsumen setia\r\nkami. <o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"IN\">Mudah-mudahan\r\ndengan adanya </span><b><span lang=\"EN-US\">Aplikasi Android</span></b><span lang=\"IN\">\r\n“C-Mobile” yang kami kembangkan konsumen lebih mudah dan dekat dengan kami,\r\nsegala update dan informasi Creative Media sudah dalam genggaman. Karena aplikasi\r\nini masih dikategori fresh/baru untuk itu kami mewakili Creative Media\r\nmembutuhkan Sara</span><span lang=\"EN-US\">n</span><span lang=\"IN\"> dan Masukan untuk pengembangan aplikasi C-Mobile agar dapat lebih baik\r\nlagi khususnya untuk pelanggan setia kami.<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\">Anda bisa mendapatkan <b>Aplikasi Android</b> “C-Mobile” dengan mendownload di Play Store. Dan\r\nselamat menikmati <b>Aplikasi Android</b>\r\nterbaru dari Creative Media.&nbsp;<o:p></o:p></span></p>', 'Publish', 'Editor Creative Media', '', '2019-06-17 16:29:25', '0000-00-00 00:00:00'),
(18, 'upload/gambar/Kursus-Website-Surabaya.jpg', 'Ingin Bisa Membuat Website? Di Sini Tempatnya ', '<p class=\"MsoNormal\"><span lang=\"EN-US\">Di dunia yang serba digital banyak dari\r\nmereka memanfaatkan website untuk membuka peluang usaha untuk memasarkan produk\r\nmereka baik itu di bidang jasa, fashion, kuliner, dan masih banyak lagi.\r\nApalagi sekarang banyak e-commerce yang menyediakan tempat untuk para pelaku\r\nusaha untuk memasarkan produk mereka. kita sebagai pelaku usaha pasti inginkan\r\nmemiliki website sendiri untuk produk yang kita miliki, tapi kendalanya adalah\r\nbagaimana cara membuat website tersebut. Jawabannya adalah dengan <b>Kursus Website Surabaya</b>. Daripada\r\nmembayar jasa seseorang yang lebih mahal harganya, lebih baik kursus dan kita\r\nbisa manage website kita sendiri. <o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"EN-US\">Apalagi banyak dari kita yang sibuk kerja\r\ndan tidak ada waktu untuk belanja kebutuhan memilih online shop sebagai\r\npilihannya, itu bisa menjadi kesempatan kita yang ingin membuka usaha secara\r\nonline dengan memiliki website sendiri. Tapi sebelum <b>Kursus Website Surabaya</b> perlu diketahui dahulu apa itu website dan\r\napa yang ada di dalam sebuah website tersebut.<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"EN-US\" style=\"font-size:16.0pt;line-height:115%\">Sejarah\r\nWebsite<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"EN-US\">Untuk website yang pertama kali dibuat\r\nyaitu di CERN&nbsp;oleh&nbsp;Tim Berners-Lee&nbsp;dan online pada tahun 1991. Tujuan\r\nawal Tim Berners-Lee membuat sebuah website adalah supaya lebih memudahkan para\r\npeneliti di tempatnya bekerja ketika akan bertukar atau melakukan perubahan\r\ninformasi. Pada saat itu, website mulai dapat digunakan secara gratis oleh\r\npublik baru diumumkan oleh CERN tepatnya tanggal 30 April 1993. Website dapat\r\ndimiliki oleh individu, organisasi, atau perusahaan. Pada umumnya sebuah\r\nwebsite akan menampilkan informasi atau satu topik tertentu, meskipun saat ini\r\nbanyak website yang menampilkan berbagai informasi dengan topik yang berbeda.</span></p><p class=\"MsoNormal\"><span lang=\"EN-US\" style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Website adalah sebuah kumpulan dari halaman web yang saling berhubungan\r\ndan dapat diakses melalui halaman depan (home page) menggunakan sebuah browser.\r\nWebsite juga memiliki beberapa jenisnya yaitu Website Pesonal, Website\r\nBisnis/Toko Online, dan Blog. <o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Jika anda ingin belajar secara langsung\r\nbagaimana membuat website yang baik dan benar untuk memasarkan produk anda,\r\nCreative Media tempatnya. Dengan <b>Kursus\r\nWebsite Surabaya</b> anda akan diajarkan langung oleh trainer yang ahli di\r\nbidangnya dari praktisi dan akademisi yang nantinya akan mengajarkan anda\r\nbagaimana membuat website yang baik dan benar. Tunggu apalagi segera daftarkan\r\ndiri anda via Whatsapp di 082131314040 (Wida) / 082131310210 (Yesi) </span><span lang=\"EN-US\" style=\"color: rgb(17, 17, 17); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">atau langsung telpon di 031 - 7328540 / 031 –\r\n59173739.</span><span lang=\"EN-US\"><o:p></o:p></span></p>        ', 'Publish', 'Editor Creative Media', 'Editor Creative Media', '2019-06-17 16:41:30', '2019-06-20 14:26:21');
INSERT INTO `artikel` (`id_artikel`, `gambar`, `judul`, `deskripsi`, `status`, `created_by`, `updated_by`, `created_date`, `updated_date`) VALUES
(19, 'upload/gambar/Kursus-Programming-Android-Surabaya.jpg', 'Mambuat Aplikasi Android Sendiri Dengan Kursus di Creative Media', '<p class=\"MsoNormal\"><span lang=\"EN-US\">Dengan adanya teknologi yang cukup canggih\r\nsekarang ini kita sudah dimanjakan dengan adanya Smartphone, apalagi di dalam\r\nSmartphone tersebut sudah disediakan aplikasi yang tentunya bisa lebih\r\nmemanjakan kita dalam menggunakan Smartphone mulai dari social media, games, dan\r\nadapula sekarang ini e-commerce yang sudah menggunakan aplikasi di android. Tapi\r\npernahkan bertanya bagaimana cara membuat aplikasi di Smartphone tersebut?\r\nPasti untuk menjawab rasa penasaran anda akan mencoba untuk searching tentang\r\ncara membuat aplikasi android. Nah, daripada bingung-bingung untuk searching, di\r\nCreative Media menyediakan <b>Kursus\r\nProgramming Android Surabaya</b>. <o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"EN-US\">Dengan <b>Kursus\r\nProgramming Android Surabaya</b> anda akan diajarkan bagaimana membuat sebuah\r\naplikasi android sesuai yang anda inginkan, Dan aplikasi yang anda buat\r\nnantinya juga bisa menjadi peluang usaha anda yang ingin &nbsp;dikembangkan berupa aplikasi android, menarik\r\nbukan? Tapi sebelum tahu bagaimana cara membuat aplikasi android ada baiknya\r\nketahui dahulu apa itu programming android.<o:p></o:p></span></p><p style=\"margin-top:12.0pt;margin-right:0cm;margin-bottom:12.0pt;margin-left:\r\n0cm\"><span lang=\"EN-US\" style=\"font-size: 11pt; font-family: Calibri, sans-serif; color: rgb(51, 51, 51); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Pemrograman Android adalah\r\npemrograman berbasis Java untuk membuat aplikasi pada device smartphone, tablet\r\nmaupun device lainnya yang menggunakan sistem operasi berbasis Android.</span><span lang=\"EN-US\" style=\"color: rgb(51, 51, 51); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"> </span><span lang=\"EN-US\" style=\"font-size:11.0pt;\r\nfont-family:\" calibri\",sans-serif;mso-ascii-theme-font:minor-latin;mso-hansi-theme-font:=\"\" minor-latin;mso-bidi-theme-font:minor-latin\"=\"\">dan software yang digunakan dalam\r\nmembuat sebuah aplikasi adroid biasanya menggunakan android studio. Android\r\nstudio sendiri adalah</span><span lang=\"EN-US\"> </span><span lang=\"EN-US\" style=\"font-size:11.0pt;font-family:\" calibri\",sans-serif;mso-ascii-theme-font:=\"\" minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:minor-latin;=\"\" color:#212121\"=\"\">Lingkungan Pengembangan Terpadu - Integrated Development\r\nEnvironment (IDE) untuk pengembangan aplikasi Android, Android Studio\r\nmenawarkan fitur lebih banyak untuk meningkatkan produktivitas Anda saat\r\nmembuat aplikasi Android, misalnya:<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpFirst\" style=\"margin-top:6.0pt;margin-right:0cm;\r\nmargin-bottom:6.0pt;margin-left:36.0pt;mso-add-space:auto;text-indent:-18.0pt;\r\nline-height:normal;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span lang=\"EN-US\" style=\"font-family:Symbol;mso-fareast-font-family:Symbol;mso-bidi-font-family:\r\nSymbol;color:#212121\">·<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: \" times=\"\" new=\"\" roman\";\"=\"\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span lang=\"EN-US\" style=\"mso-fareast-font-family:\r\n\" times=\"\" new=\"\" roman\";mso-bidi-font-family:calibri;mso-bidi-theme-font:minor-latin;=\"\" color:#212121\"=\"\">Sistem versi berbasis Gradle yang fleksibel<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-top:6.0pt;margin-right:0cm;\r\nmargin-bottom:6.0pt;margin-left:36.0pt;mso-add-space:auto;text-indent:-18.0pt;\r\nline-height:normal;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span lang=\"EN-US\" style=\"font-family:Symbol;mso-fareast-font-family:Symbol;mso-bidi-font-family:\r\nSymbol;color:#212121\">·<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: \" times=\"\" new=\"\" roman\";\"=\"\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span lang=\"EN-US\" style=\"mso-fareast-font-family:\r\n\" times=\"\" new=\"\" roman\";mso-bidi-font-family:calibri;mso-bidi-theme-font:minor-latin;=\"\" color:#212121\"=\"\">Emulator yang lengkap dan kaya fitur<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-top:6.0pt;margin-right:0cm;\r\nmargin-bottom:6.0pt;margin-left:36.0pt;mso-add-space:auto;text-indent:-18.0pt;\r\nline-height:normal;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span lang=\"EN-US\" style=\"font-family:Symbol;mso-fareast-font-family:Symbol;mso-bidi-font-family:\r\nSymbol;color:#212121\">·<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: \" times=\"\" new=\"\" roman\";\"=\"\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span lang=\"EN-US\" style=\"mso-fareast-font-family:\r\n\" times=\"\" new=\"\" roman\";mso-bidi-font-family:calibri;mso-bidi-theme-font:minor-latin;=\"\" color:#212121\"=\"\">Lingkungan yang menyatu untuk pengembangan bagi semua perangkat\r\nandroid<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-top:6.0pt;margin-right:0cm;\r\nmargin-bottom:6.0pt;margin-left:36.0pt;mso-add-space:auto;text-indent:-18.0pt;\r\nline-height:normal;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span lang=\"EN-US\" style=\"font-family:Symbol;mso-fareast-font-family:Symbol;mso-bidi-font-family:\r\nSymbol;color:#212121\">·<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: \" times=\"\" new=\"\" roman\";\"=\"\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span lang=\"EN-US\" style=\"mso-fareast-font-family:\r\n\" times=\"\" new=\"\" roman\";mso-bidi-font-family:calibri;mso-bidi-theme-font:minor-latin;=\"\" color:#212121\"=\"\">Instant Run untuk mendorong perubahan </span><span lang=\"EN-US\" style=\"mso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;color:#212121\">ke\r\naplikasi yang berjalan tanpa membuat APK baru</span><span lang=\"EN-US\" style=\"mso-fareast-font-family:\" times=\"\" new=\"\" roman\";mso-bidi-font-family:calibri;=\"\" mso-bidi-theme-font:minor-latin;color:#212121\"=\"\"><o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-top:6.0pt;margin-right:0cm;\r\nmargin-bottom:6.0pt;margin-left:36.0pt;mso-add-space:auto;text-indent:-18.0pt;\r\nline-height:normal;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span lang=\"EN-US\" style=\"font-family:Symbol;mso-fareast-font-family:Symbol;mso-bidi-font-family:\r\nSymbol;color:#212121\">·<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: \" times=\"\" new=\"\" roman\";\"=\"\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span lang=\"EN-US\" style=\"mso-fareast-font-family:\r\n\" times=\"\" new=\"\" roman\";mso-bidi-font-family:calibri;mso-bidi-theme-font:minor-latin;=\"\" color:#212121\"=\"\">Template kode dan integrasi GitHub untuk membuat fitur aplikasi\r\nyang sama dan mengimpor kode contoh<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-top:6.0pt;margin-right:0cm;\r\nmargin-bottom:6.0pt;margin-left:36.0pt;mso-add-space:auto;text-indent:-18.0pt;\r\nline-height:normal;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span lang=\"EN-US\" style=\"font-family:Symbol;mso-fareast-font-family:Symbol;mso-bidi-font-family:\r\nSymbol;color:#212121\">·<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: \" times=\"\" new=\"\" roman\";\"=\"\">&nbsp; &nbsp; &nbsp; &nbsp;</span></span><!--[endif]--><span lang=\"EN-US\" style=\"mso-fareast-font-family:\r\n\" times=\"\" new=\"\" roman\";mso-bidi-font-family:calibri;mso-bidi-theme-font:minor-latin;=\"\" color:#212121\"=\"\">Alat pengujian dan kerangka kerja yang ekstensif<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-top:6.0pt;margin-right:0cm;\r\nmargin-bottom:6.0pt;margin-left:36.0pt;mso-add-space:auto;text-indent:-18.0pt;\r\nline-height:normal;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span lang=\"EN-US\" style=\"font-family:Symbol;mso-fareast-font-family:Symbol;mso-bidi-font-family:\r\nSymbol;color:#212121\">·<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: \" times=\"\" new=\"\" roman\";\"=\"\">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></span><!--[endif]--><span lang=\"EN-US\" style=\"mso-fareast-font-family:\r\n\" times=\"\" new=\"\" roman\";mso-bidi-font-family:calibri;mso-bidi-theme-font:minor-latin;=\"\" color:#212121\"=\"\">Alat Lint untuk meningkatkan kinerja, kegunaan, kompatibilitas\r\nversi, dan masalah-masalah lain<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-top:6.0pt;margin-right:0cm;\r\nmargin-bottom:6.0pt;margin-left:36.0pt;mso-add-space:auto;text-indent:-18.0pt;\r\nline-height:normal;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span lang=\"EN-US\" style=\"font-family:Symbol;mso-fareast-font-family:Symbol;mso-bidi-font-family:\r\nSymbol;color:#212121\">·<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: \" times=\"\" new=\"\" roman\";\"=\"\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span lang=\"EN-US\" style=\"mso-fareast-font-family:\r\n\" times=\"\" new=\"\" roman\";mso-bidi-font-family:calibri;mso-bidi-theme-font:minor-latin;=\"\" color:#212121\"=\"\">Dukungan C++ dan NDK<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-top:6.0pt;margin-right:0cm;\r\nmargin-bottom:6.0pt;margin-left:36.0pt;mso-add-space:auto;text-indent:-18.0pt;\r\nline-height:normal;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span lang=\"EN-US\" style=\"font-family:Symbol;mso-fareast-font-family:Symbol;mso-bidi-font-family:\r\nSymbol;color:#212121\">·<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: \" times=\"\" new=\"\" roman\";\"=\"\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span lang=\"EN-US\" style=\"mso-fareast-font-family:\r\n\" times=\"\" new=\"\" roman\";mso-bidi-font-family:calibri;mso-bidi-theme-font:minor-latin;=\"\" color:#212121\"=\"\">Dukungan bawaan untuk&nbsp;</span><span lang=\"EN-US\"><a href=\"http://developers.google.com/cloud/devtools/android_studio_templates/?hl=id\"><span style=\"color: black;\">Google Cloud Platform</span></a></span><span lang=\"EN-US\">, </span><span lang=\"EN-US\" style=\"mso-fareast-font-family:\" times=\"\" new=\"\" roman\";mso-bidi-font-family:=\"\" calibri;mso-bidi-theme-font:minor-latin;color:#212121\"=\"\">mempermudah\r\npengintegrasian Google Cloud Messaging dan App Engine<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"EN-US\" style=\"mso-fareast-font-family:\" times=\"\" new=\"\" roman\";=\"\" mso-bidi-font-family:calibri;mso-bidi-theme-font:minor-latin;color:#212121\"=\"\">Apakah\r\nsudah menjawab rasa penasaran anda? Maka dari itu di Creative Media menyediakan\r\n<b>Kursus Programming Android Surabaya</b>.\r\n<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"mso-fareast-font-family:\" times=\"\" new=\"\" roman\";mso-bidi-font-family:calibri;=\"\" mso-bidi-theme-font:minor-latin;color:#212121\"=\"\">Nah, tunggu apalagi segera\r\ndaftarkan diri anda untuk <b>Kursus\r\nProgramming Android Surabaya</b> di Creative Media, Kapan lagi anda bisa\r\nmembuat aplikasi android sendiri. Hubungi kami via whatsapp di 082131314040 / 082131310210 atau </span><span lang=\"EN-US\" style=\"color: rgb(17, 17, 17); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">langsung\r\ntelpon di 031 - 7328540 / 031 – 59173739.</span><span lang=\"EN-US\"><o:p></o:p></span></p>        ', 'Publish', 'Editor Creative Media', 'Editor Creative Media', '2019-06-20 14:22:38', '2019-06-20 14:28:07'),
(20, 'upload/gambar/Kursus_Administrasi_Perkantoran_Surabaya.jpg', 'Langsung Menguasai Ms. Office dengan Kursus Administrasi Perkantoran di Creative Media', '<p class=\"MsoNormal\"><span lang=\"EN-US\">Dalam dunia kerja tuntutan sebuah\r\nperusahaan terus ditingkatkan untuk para karyawannya, salah satunya adalah tentang\r\nadministrasi perkantoran, dan tak jarang perusahaan tersebut rela mengeluarkan\r\nbudget lebih untuk mengadakan training atau kursus untuk para karyawannya. Tapi\r\ntak banyak dari kita belum sepenuhnya memahami apa itu Administrasi Perkantoran\r\nkarena tidak semua orang memiliki passion tersebut, mau tidak mau dalam dunia\r\nkerja kita di tuntut untuk mempelajarinya untuk menunjang pekerjaan kita. Maka\r\ndari itu di Creative Media menyediakan <b>Kursus\r\nAdministrasi Perkantoran Surabaya</b> bagi anda yang ingin mendalami&nbsp; tentang Administrasi Perkantoran. <o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"EN-US\">Kenapa harus Administrasi Perkantoran yang\r\ndipelajari? Karena disini kita akan diajarkan bagaimana menggunakan Microsoft\r\nOffice yang baik dan benar untuk menyeimbangkan pekerjaan di bidang yang di\r\ngeluti. Tapi sebelum <b>Kursus Administrasi\r\nPerkantoran Surabaya</b> ada baiknya ketahui dahulu apa itu administrasi\r\nperkantoran dan software yang dipelajari di dalamnya.<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Administrasi\r\nperkantoran merupakan kegiatan yang berhubungan langsung dengan sistem\r\nadministrasi dalam sebuah ruang lingkup kantor. Sistem manajemen dalam sebuah\r\nruang lingkup perkantoran ini salah satu bagian dari manajemen yang memberikan\r\ninformasi sesuai dengan bidang administrasi yang dibutuhkan untuk menunjang\r\nberjalannya suatu kegiatan secara efektif.</span><span lang=\"EN-US\" style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"> Software yang biasanya dipakai dalam\r\nadministrasi perkantoran adalah :<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpFirst\" style=\"text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span lang=\"EN-US\" style=\"font-family: Symbol;\">·<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span lang=\"EN-US\">Microsoft\r\nWord<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\"><span lang=\"EN-US\">Dalam\r\nMs. Word nantinya akan diajarkan apa saja tools-tools yang ada di Ms. Word\r\nkegunaan dan fungsinya, selain itu akan di ajarkan pula bagaimana membuat\r\nsebuah surat dan amplop yang baik dan benar. <o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\"><span lang=\"EN-US\">&nbsp;</span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span lang=\"EN-US\" style=\"font-family: Symbol;\">·<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span lang=\"EN-US\">Microsoft\r\nExcel<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\"><span lang=\"EN-US\">Berbeda\r\ndengan Ms. Word, di dalam Ms. Excel nantinya akan diajarkan bagaimana membuat\r\nlaporan keuangan, tak hanya itu dalam laporan tersebut juga diajarkan\r\nrumus-rumus perhitungan agar jumlah yang dicantumkan bisa akurat. <o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\"><span lang=\"EN-US\">&nbsp;</span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span lang=\"EN-US\" style=\"font-family: Symbol;\">·<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span lang=\"EN-US\">Microsoft\r\nPower Point<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\"><span lang=\"EN-US\">Sedangkan\r\ndi Ms. Power Point nantinya akan diajarkan bagaimana membuat slide untuk\r\nkeperluan sebuah presentasi, dan diajarkan pula cara menambahkan transisi,\r\nanimasi, dan sound agar slide yang dibuat terlihat menarik untuk ditayangkan. <o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<span lang=\"EN-US\" style=\"font-size: 11pt; line-height: 115%; font-family: Calibri, sans-serif;\">Masih kurang penjelasan tentang Administrasi\r\nPerkantoran diatas? maka dari itu segera daftarkan diri anda untuk <b>Kursus Administrasi Perkantoran Surabaya</b>\r\ndi Creative Media untuk mendapatkan penjelasan yang lebih lengkap tentang\r\nAdministrasi Perkantoran. Langsung hubungi kami via Whatsapp di 0821 3131 4040 / 0821 3131 0210 atau bisa telpon di </span><span lang=\"EN-US\" style=\"font-size: 11pt; line-height: 115%; font-family: Calibri, sans-serif; color: rgb(17, 17, 17); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">031 - 7328540 / 031 – 59173739.</span><br></p>', 'Publish', 'Editor Creative Media', '', '2019-06-20 14:24:03', '0000-00-00 00:00:00'),
(21, 'upload/gambar/Kursus_Desain_Grafis_Surabaya.jpg', 'Menciptakan Desain Yang Powerfull dengan Kursus di Creative Media', '<p class=\"MsoNormal\"><span lang=\"EN-US\">Bagi anda yang ingin mengembangkan diri\r\ndalam dunia advertising desain grafis adalah salah satu yang perlu dipelajari,\r\nkarena dalam membuat sebuah desain yang menarik tidak semudah yang kita\r\nbayangkan diperlukan seni dan kreatifitas agar tercipta sebuah desain yang\r\ndapat menarik perhatian banyak orang. Tapi seni dan kreatifitas saja tidak\r\ncukup karena perlu juga mempelajari apa saja software – software yang digunakan\r\ndalam membuat sebuah desain. Maka dari itu bagi anda yang ingin mempelajarinya\r\ndi Creative Media menyediakan <b>Kursus\r\nDesain Grafis Surabaya</b>.<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"EN-US\">Dalam Desain Grafis software yang digunakan\r\nbiasanya CorelDraw, Adobe Photoshop, Adobe Illustrator, ke tiga software\r\ntersebut paling banyak digunakan dalam hal mendesain bagi para Designer. Nah,\r\ndengan <b>Kursus Desain Grafis Surabaya</b>\r\ndi Creative Media nantinya akan diajarkan pengenalan tentang software-software\r\nyang digunakan, cara penggunaan tools-tools desain, dan bagaimana membuat sebuah\r\ndesain yang baik dan benar.<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"EN-US\">Apa itu Desain Grafis?<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Desain grafis\r\nadalah sebuah bentuk seni dengan tujuan untuk memecahkan masalah komunikasi\r\nmelalui kombinasi elemen grafis seperti bentuk, garis, warna, dan sebagainya.\r\nVisual yang tercipta diharapkan dapat menjadi sarana penyampaian informasi atau\r\npesan secara jelas dan efektif, bahkan mampu membentuk persepsi manusia akan\r\nsebuah hal.<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Dalam desain\r\nperlu diperhatikan juga element – element yang digunakan dari object, warna,\r\nbentuk, font, dan lain sebagainya agar tercipta suatu desain yang bisa menarik\r\nperhatian karena desain yang menarik adalah desain yang tersampaikan dengan\r\nbaik oleh semua orang.<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><span lang=\"EN-US\" style=\"color: rgb(34, 34, 34); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Nah, bagi anda\r\nyang tertarik untuk <b>Kursus Desain Grafis\r\nSurabaya</b>, segera daftarkan diri anda di Creative Media. Hubungi kami\r\nlangsung melalui Whatsapp di 0821 3131 4040 / 0821 3131 0210 </span><span lang=\"EN-US\">atau bisa telpon di </span><span lang=\"EN-US\" style=\"color: rgb(17, 17, 17); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">031 - 7328540 / 031 – 59173739.</span><span lang=\"EN-US\"> <o:p></o:p></span></p>', 'Publish', 'Editor Creative Media', '', '2019-06-20 14:31:13', '0000-00-00 00:00:00'),
(22, 'upload/gambar/Kursus_Desain_Interior_Surabaya.jpg', 'Kursus Desain Interior Surabaya? Creative Media Pilihannya', '<p class=\"MsoNormal\"><span lang=\"EN-US\">Bagi anda yang ingin belajar Desain\r\nInterior, Creative Media adalah pilihan yang tepat. Karena dengan anda <b>Kursus Desain Interior Surabaya</b> di\r\nCreative Media bisa menjawab semua pertanyaan anda tentang bagaimana membuat\r\nsebuah Desain Interior yang baik dan benar, nantinya juga akan didampingi oleh\r\ntentor professional yang ahli dibidangnya.<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"EN-US\">Apa saja sih yang diajarkan dengan <b>Kursus Desain Interior Surabaya</b> di\r\nCreative Media? Dalam Desain Interior akan diajarkan bagaimana membuat 3D\r\nsebuah object berupa benda-benda yang diperlukan dalam penataan interior sebuah\r\nruangan, dan juga akan diajarkan penataan interior yang tepat agar terlihat\r\nlebih artistic. Software yang di gunakan dalam membuat sebuah desain interior\r\nadalah 3D Max, AutoCAD, dan SketchUp, ketiga software tersebut yang paling sering\r\ndigunakan oleh para Interior Designer untuk merancang sebuah Desain Interior.<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"EN-US\">Desain Interior adalah profesi yang\r\nsekarang banyak ditemui dan di cari di Indonesia. Desain Interior bukan hanya\r\nsekedar semata-mata menata sebuah ruangan begitu saja, tapi diperlukan juga\r\nseni dan kreatifitas agar ruangan yang dirancang bisa terlihat indah,\r\nFungsional, dan nyaman. Nah, dengan <b>Kursus\r\nDesain Interior Surabaya</b> anda akan diajak bagaimana merasakan merancang\r\nsebuah Desain Interior dengan seni dan kreatifitas yang anda miliki, tentunya\r\nakan semakin bangga jika desain yang anda rancang bisa diaplikasikan di sebuah\r\nruangan.<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><span lang=\"EN-US\">Menarik bukan? Yuk, bagi anda yang ingin <b>Kursus Desain Interior Surabaya</b>, disini\r\nadalah pilhan yang tepat. Tunggu apalagi segera daftarkan diri anda di Creative\r\nMedia, bisa hubungi kami melalui Whatsapp di 0821 3131 4040 / 0821 3131\r\n0210 atau </span><span lang=\"EN-US\">bisa telpon\r\ndi </span><span lang=\"EN-US\" style=\"color: rgb(17, 17, 17); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">031 - 7328540 / 031 – 59173739.</span><span lang=\"EN-US\"> </span><span lang=\"EN-US\"><o:p></o:p></span></p>', 'Publish', 'Editor Creative Media', '', '2019-06-22 15:19:51', '0000-00-00 00:00:00'),
(23, 'upload/gambar/Kursus_Akuntansi_Surabaya.jpg', 'Mengatur Keuangan Bisa Lebih Mudah Dengan Kursus Akuntansi Surabaya di Creative Media ', '<p class=\"MsoNormal\"><span lang=\"EN-US\">Dalam dunia bisnis seseorang akuntan yang bisa\r\nmengatur keuangan pasti sangat dibutuhkan, apalagi kita sebagai pelaku bisnis\r\ntesebut yang kurang mengerti tentang akunting akan terasa sulit untuk kita, mau\r\ntidak mau sebagai pelaku usaha harus belajar akunting agar kita tau bagaimana\r\nproses keuangan itu berjalan. Dan untuk yang masih duduk dibangku sekolah atau\r\nkuliah sebaiknya mempelajarinya lebih awal untuk bekal bila nantinya bisa\r\nmemiliki usaha sendiri. Dan disinilah tempat yang tepat untuk anda <b>Kursus Akuntansi Surabaya</b>. <o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"EN-US\">Dengan <b>Kursus\r\nAkuntansi Surabaya</b> di Creative Media nantinya anda akan diajarkan tentang\r\nbagaimana menghitung keuangan dengan Microsoft Excel, kenapa Microsoft Excel?\r\nKarena di Ms. Excel terdapat formula khusus yang sulit dan variatif untuk\r\nmenghitung sebuah data agar hasil dari data yang di dapat bisa akurat, dan juga\r\nkita bisa menghitung laba atau rugi menggunakan formula tersebut. Tak hanya itu\r\nsaja anda juga bisa menganalisa sebuah data menggunakan grafik agar tahu laju\r\nperkembangan data tersebut. <o:p></o:p></span></p><p class=\"MsoNormal\"><em><span lang=\"EN-US\" style=\"font-family:&quot;Calibri&quot;,sans-serif;\r\nmso-ascii-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:\r\nminor-latin\">Sebelum anda mempelajarinya, ketahuilah dahulu apa itu akunting.\r\nYang dimaksud dengan akunting adalah kegiatan proses yang sistematis dalam\r\nmengumpulkan data, menganalisa, dan melaporkan informasi tentang keuangan.\r\nPekerjaan akunting telah dilakukan perusahaan sejak berabad-abad yang lalu\r\nyaitu sejak tahun 1494 oleh seorang Italia bernama POCIOLO. Sedangkan di Amerika\r\nserikat sudah dimulai sejak tahin 1887. Tahun 1900 an pengajaran akuntansi\r\ndiajarkan di banyak perguruan tinggi. Sekarang pengajaran akunting sudah meluas\r\nsangat pesat sekali. </span></em><em><span lang=\"EN-US\" style=\"font-family:&quot;Calibri&quot;,sans-serif;\r\nmso-ascii-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:\r\nminor-latin;font-style:normal;mso-bidi-font-style:italic\"><o:p></o:p></span></em></p><p class=\"MsoNormal\"><em><span lang=\"EN-US\" style=\"font-family:&quot;Calibri&quot;,sans-serif;\r\nmso-ascii-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:\r\nminor-latin\">Dengan anda<b> Kursus Akuntansi\r\nSurabaya</b> di Creative Media akan menjawab rasa penasaran anda tentang\r\nbagaimana menghitung keuangan yang baik dan benar menggunakan formula khusus,\r\nmenganalisa data menggunakan table dan grafik, dan lain sebagainya yang\r\nberhubungan dengan akunting. </span></em><em><span lang=\"EN-US\" style=\"font-family:\r\n&quot;Calibri&quot;,sans-serif;mso-ascii-theme-font:minor-latin;mso-hansi-theme-font:\r\nminor-latin;mso-bidi-theme-font:minor-latin;font-style:normal;mso-bidi-font-style:\r\nitalic\"><o:p></o:p></span></em></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><em><span lang=\"EN-US\" style=\"font-family:&quot;Calibri&quot;,sans-serif;\r\nmso-ascii-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:\r\nminor-latin\">Tunggu apalagi segera daftarkan diri anda untuk <b>Kursus Akuntansi Surabaya</b> di Creative\r\nMedia, bisa langsung hubungi kami via Whatsapp di 0821 3131 4040 / 0821\r\n3131 0210 atau </span></em><span lang=\"EN-US\">bisa\r\ntelpon di </span><span lang=\"EN-US\" style=\"color: rgb(17, 17, 17); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">031 - 7328540 /\r\n031 – 59173739.</span><span lang=\"EN-US\"> </span><span lang=\"EN-US\"><o:p></o:p></span></p>', 'Publish', 'Editor Creative Media', '', '2019-06-25 18:09:32', '0000-00-00 00:00:00'),
(24, 'upload/gambar/Kursus_Programming_Website.jpg', 'Rahasia Membuat Website Dengan Kursus Programming Website di Creative Media', '<p class=\"MsoNormal\"><span lang=\"EN-US\">Ingin belajar membuat website? <b>Kursus Programming Website</b> pilihannya\r\ndan Creative Media tempat yang tepat. Bagi anda ingin sekali bisa membuat\r\nwebsite sendiri bidang studi ini sangat cocok untuk anda, karena dengan anda\r\nmembuat dan memiliki website sendiri yang sesuai diinginkan anda juga bisa\r\nmemanage website anda sendiri sesuai yang anda mau.<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"EN-US\">Apa saja sih yang dipelajari dalam\r\npembuatan web? Dengan <b>Kursus Programming\r\nWebsite</b> nantinya akan mempelajari tentang HTML, PHP, MySQL, CSS, Java\r\nScript, dan nantinya juga diajarkan bagaimana membuat koding yang benar. Tetapi\r\nsebelum anda mempelajari software-software tersebut ada baiknya kenali dulu\r\ntentang software tersebut<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpFirst\" style=\"text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span lang=\"EN-US\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span lang=\"EN-US\">HTML &nbsp;&nbsp; : </span><span lang=\"EN-US\" style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Hypertext Markup Language adalah sebuah bahasa markah yang digunakan\r\nuntuk membuat sebuah halaman web, menampilkan berbagai informasi di dalam\r\nsebuah penjelajah web Internet dan pemformatan hiperteks sederhana yang ditulis\r\ndalam berkas format ASCII agar dapat menghasilkan tampilan wujud yang\r\nterintegerasi.</span><span lang=\"EN-US\"><o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span lang=\"EN-US\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span lang=\"EN-US\">PHP &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</span><span lang=\"EN-US\"> <span style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Hypertext Preprocessor adalah bahasa skrip yang dapat\r\nditanamkan atau disisipkan ke dalam HTML. PHP banyak dipakai untuk memprogram\r\nsitus web dinamis. PHP dapat digunakan untuk membangun sebuah CMS.</span><o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span lang=\"EN-US\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span lang=\"EN-US\">MySQL&nbsp;  :</span><span lang=\"EN-US\"> <span style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Adalah sebuah perangkat lunak sistem manajemen basis data SQL\r\natau DBMS yang multialur, multipengguna, dengan sekitar 6 juta instalasi di\r\nseluruh dunia.</span><o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span lang=\"EN-US\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span lang=\"EN-US\">CSS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  : <span style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Cascading\r\nStyle Sheet merupakan aturan untuk mengatur beberapa komponen dalam sebuah web\r\nsehingga akan lebih terstruktur dan seragam.&nbsp;</span><o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span lang=\"EN-US\">-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span lang=\"EN-US\" style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Java Script : Adalah bahasa pemrograman tingkat tinggi dan\r\ndinamis. JavaScript populer di internet dan dapat bekerja di sebagian besar\r\npenjelajah web populer seperti Google Chrome, Internet Explorer, Mozilla\r\nFirefox, Netscape dan Opera. Kode JavaScript dapat disisipkan dalam halaman web\r\nmenggunakan tag SCRIPT.</span><span lang=\"EN-US\"><o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"EN-US\">Dari\r\npenjelasan diatas apakah bisa sedikit menjawab rasa penasaran anda tentang\r\nPemrograman Web? Dari pada penasaran dan hanya di angan-angan saja lebih baik <b>Kursus Programming Website</b>, dengan\r\nbegitu anda bisa langsung praktek dengan tentor yang berpengalaman di bidangnya\r\ndan bisa menjawab semua rasa penasaran anda dan juga akan di berikan rahasia\r\ndan trik-trik khusus dalam pembuatan website, menarik bukan?<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><span lang=\"EN-US\">Tanpa perlu\r\npikir panjang lagi, langsung saja <b>Kursus\r\nProgramming Website</b> di Creative Media, bisa langsung hubungi customer\r\nservice kami melalui Whatsapp di 0821 3131 4040 / 0821 3131 0210 atau bisa telpon di </span><span lang=\"EN-US\" style=\"color: rgb(17, 17, 17); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">031 - 7328540 /\r\n031 – 59173739.</span><span lang=\"EN-US\">&nbsp;&nbsp;</span><span lang=\"EN-US\"><o:p></o:p></span></p>', 'Publish', 'Editor Creative Media', '', '2019-06-25 18:12:02', '0000-00-00 00:00:00'),
(25, 'upload/gambar/banner.jpg', 'Creative Media Launching Bidang Studi Digital Marketing dan Animasi', '<p class=\"MsoNormal\"><span lang=\"EN-US\">Pada bulan Agustus 2019, bersamaan dengan peringatan Dirgahayu RI yang ke-74th. Secara resmi </span><span lang=\"EN-US\">Creative Media merelease bidang studi\r\nbaru yaitu <b>Animasi dan Digital Marketing</b>. Seperti yang kita ketahui\r\nbahwa di Era Revolusi Industri 4.0 serba digitalisasi. Untuk itu kami berharap\r\nbidang studi <b>Digital Marketing</b> mampu menjawab kebutuhan para milenial\r\nsaat ini </span><span class=\"e24kjd\"><b><span lang=\"EN-US\">Digital Marketing</span></b><span lang=\"EN-US\"> adalah segala upaya untuk melakukan pemasaran suatu produk dan jasa\r\nmelalui internet dan social media.</span></span><span lang=\"EN-US\"> <span style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Tidak hanya itu perkembangan animasi di\r\nera milenial sangat diminati, karena </span></span><b><span lang=\"EN-US\">Animasi</span></b><span lang=\"EN-US\"> merupakan salah satu bagian grafika komputer yang menyajikan\r\ntampilan-tampilan yang sangat atraktif juga merupakan sekumpulan gambar yang\r\nditampilkan secara berurutan dengan cepat untuk mensimulasi gerakan yang hidup.\r\n</span><span lang=\"EN-US\" style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Hal ini menjadikan <b>Digital\r\nMarketing dan Animasi</b> menjadi bidang studi baru yang ada di Creative Media.</span><span lang=\"EN-US\"><o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"EN-US\" style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Creative Media\r\nmerupakan Lembaga Kursus dan Pelatihan Komputer IT Multimedia di Surabaya yang\r\nsaat ini mempunyai 15 bidang studi termasuk <b>Digital Marketing dan Animasi</b>.\r\nDengan hadirnya 2 bidang studi baru ini kami berharap menjadi primadona dan\r\nmampu menjawab kebutuhan masyarakat milenial. <o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"EN-US\" style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Dalam bidang\r\nstudi <b>Digital Marketing</b> peserta akan mempelajari tentang pemahaman Search\r\nEngine Optimization (SEO), Teknik SEO, management SEO di website, Google My\r\nBusiness, riset kata kunci, Google Adwords, Google Adsence, Email marketing,\r\nInstagram Ads dan Facebook Ads. Sedangkan pada bidang studi <b>Animasi</b>\r\npeserta akan mempelajari tentang prinsip-prinsip <b>Animasi</b>, pembuatan\r\nmedia animasi interaktif, pemahaman action script 2.0 dan action script 3.0. <o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><span lang=\"EN-US\" style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Bagi anda\r\ngenerasi milenial bidang studi ini sangat cocok untuk dipelajari yang nantinya\r\nmampu diterapkan dalam melakukan kegiatan promosi dan meningkatkan pengunjung\r\natau visitor sehingga berdampak pada peningkatan omset penjualan. Kami\r\nmemberikan kemudahan bagi anda yang ingin bergabung dengan cara menguhubungi\r\ntim representative kami di nomor WA 0821 3131 4040 (Ayu) atau 0821 3131 0210\r\n(Dhea). Jangan sampai ketinggalan…</span><span lang=\"EN-US\"><o:p></o:p></span></p>        ', 'Publish', 'Editor Creative Media', 'Editor Creative Media', '2019-08-06 14:47:31', '2019-08-06 15:01:47'),
(26, 'upload/gambar/ypp.jpg', 'Piagam Penghargaan Sebagai Mitra Strategis dari Yayasan Pundi Amal Peduli Kasih (YPP), SCTV dan Indosiar', '<p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"IN\">Senin, </span>14 Oktober 2019 Yayasan Pundi Amal Peduli Kasih (YPP) SCTV\r\nIndosiar yaitu Ibu Dewi Yudho Miranti selaku Manajer CSR Indosiar dan Bapak\r\nAbbas Yahya selaku manajer CSR SCTV berkunjung ke Creative Media untuk menjalin\r\nsilaturahmi dengan Creative Media. <span lang=\"IN\">T</span>ak\r\nhanya itu saja, <span lang=\"IN\">&nbsp;beliau</span> memberikan <span lang=\"IN\">PIAGAM PENGHARGAAN</span><span lang=\"IN\"> </span>kepada\r\nCreative Media sebagai Mitra strategis <span lang=\"IN\">dalam P</span>elatihan <span lang=\"IN\">Website </span>E-<span lang=\"IN\">C</span>ommerce.<o:p></o:p></p><p class=\"MsoNormal\" style=\"text-align:justify\">Seperti yang diketahui <span style=\"background: rgb(254, 254, 254);\">SCTV dan Indosiar adalah\r\nperusahaan media massa yang berada di bawah kelompok perusahaan Elang Mahkota\r\nTeknologi (EMTEK). Salah satu peran media massa adalah menyebarluaskan\r\ninformasi melalui program-program berita dan informasinya. Beragam materi\r\ninformasi didistribusikan melalui program Liputan 6 SCTV dan Fokus Indosiar.\r\nTermasuk di dalamnya informasi mengenai kemanusiaan dan social. Dan pada 11\r\nNovember 2015 Yayasan Pundi amal Peduli Kasih (YPP) ini didirikan, dengan keberadaan\r\nYPP ini semua kegiatan social dilakukan dari bidang kemanusiaan, social,\r\nlingkungan/komunitas, hingga bidang Pendidikan untuk membantu mereka yang\r\nmembutuhkan. </span><span style=\"mso-bidi-font-family:Calibri;mso-bidi-theme-font:\r\nminor-latin;background:#FEFEFE\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\">Sebagai informasi beberapa waktu\r\nyang lalu di Surabaya terjadi musibah pengeboman oleh pihak yang tidak\r\nbertanggung jawab di beberapa Geraja, dan salah satu korban musibah tersebut\r\nadalah ayah dari Ahmad Fani, maka dari itu pihak Yayasan Pundi Amal Peduli\r\nKasih memberikan bantuan kepada keluarga korban yaitu Ahmad Fani dengan\r\nmengikutsertakan dalam pelatihan Website Design di Creative Media.<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"background: rgb(254, 254, 254);\">Ingin belajar juga di Creative Media? Tak hanya website saja\r\ncreative media juga menyediakan 15 bidang studi lainnya yang bisa anda\r\npelajari, langsung saja hubungi Customer Service kami via Whatsapp di 0821 3131\r\n4040 (Ayu) atau 0821 3131 0210 (Dhea) atau bisa telpon di 031 - 7328540 / 031 –\r\n59173739.</span><span style=\"mso-bidi-font-family:Calibri;mso-bidi-theme-font:\r\nminor-latin;background:#FEFEFE\"><o:p></o:p></span></p>', 'Publish', 'Editor Creative Media', '', '2019-10-21 14:59:37', '0000-00-00 00:00:00');
INSERT INTO `artikel` (`id_artikel`, `gambar`, `judul`, `deskripsi`, `status`, `created_by`, `updated_by`, `created_date`, `updated_date`) VALUES
(27, 'upload/gambar/Digital_Marketing.jpg', 'Creative Media menjadi Nara Sumber di Acara Seminar Nasional “Indonesian Creativepreneur in Digital Era”', '<p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:12.0pt;\r\nline-height:107%\">Pada 24 Oktober 2019, Creative Media di percaya menjadi\r\npembicara</span><span lang=\"IN\" style=\"font-size:12.0pt;line-height:107%;\r\nmso-ansi-language:IN\">/nara sumber</span><span style=\"font-size:12.0pt;\r\nline-height:107%\"> di Acara Seminar Nasional “Indonesian Creativepreneur in\r\nDigital Era</span><span lang=\"IN\" style=\"font-size:12.0pt;line-height:107%;\r\nmso-ansi-language:IN\">”</span><span style=\"font-size:12.0pt;line-height:107%\">\r\nyang diadakan oleh Laboratorium Cyber Marketing </span><span lang=\"IN\" style=\"font-size:12.0pt;line-height:107%;mso-ansi-language:IN\">Universitas\r\nPembangunan Nasional (</span><span style=\"font-size:12.0pt;line-height:107%\">UPN</span><span lang=\"IN\" style=\"font-size:12.0pt;line-height:107%;mso-ansi-language:IN\">)</span><span style=\"font-size:12.0pt;line-height:107%\"> Veteran Jatim</span><span lang=\"IN\" style=\"font-size:12.0pt;line-height:107%;mso-ansi-language:IN\">. Ada 3</span><span lang=\"IN\" style=\"font-size:12.0pt;line-height:107%\"> </span><span lang=\"IN\" style=\"font-size:12.0pt;line-height:107%;mso-ansi-language:IN\">Pembicara atau\r\nNarasumber pada Acara Seminar tersebut yaitu </span><span style=\"font-size:\r\n12.0pt;line-height:107%\">Hadi Sisyanto selaku Founder &amp; Creative Direct</span><span lang=\"IN\" style=\"font-size:12.0pt;line-height:107%;mso-ansi-language:IN\">o</span><span style=\"font-size:12.0pt;line-height:107%\">r yang mewakili Creative Media\r\nsebagai nara seumber,</span><span style=\"font-size:12.0pt;line-height:107%;\r\nmso-ansi-language:IN\"> </span><span style=\"font-size:12.0pt;line-height:107%\">Dodit\r\nMulyanto seorang Stand Up Comedian &amp; Chies Seorang Trainer Komunitas\r\nBukalapak. Acara </span><span lang=\"IN\" style=\"font-size:12.0pt;line-height:107%;\r\nmso-ansi-language:IN\">Seminar</span><span lang=\"IN\" style=\"font-size:12.0pt;\r\nline-height:107%\"> </span><span lang=\"IN\" style=\"font-size:12.0pt;line-height:\r\n107%;mso-ansi-language:IN\">ini </span><span style=\"font-size:12.0pt;line-height:\r\n107%\">diadakan di Convention Hall Arif Rahman Hakim – Surabaya.</span><span lang=\"IN\" style=\"font-size:12.0pt;line-height:107%;mso-ansi-language:IN\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:12.0pt;\r\nline-height:107%\">Dalam kesempatan kali ini </span><span lang=\"IN\" style=\"font-size:12.0pt;line-height:107%;mso-ansi-language:IN\">Creative Media\r\nmem</span><span style=\"font-size:12.0pt;line-height:107%\">beri</span><span lang=\"IN\" style=\"font-size:12.0pt;line-height:107%;mso-ansi-language:IN\">kan</span><span style=\"font-size:12.0pt;line-height:107%\"> materi tentang </span><span lang=\"IN\" style=\"font-size:12.0pt;line-height:107%;mso-ansi-language:IN\">peran “</span><span style=\"font-size:12.0pt;line-height:107%\"><b>Digital Marketing</b></span><span lang=\"IN\" style=\"font-size:12.0pt;line-height:107%;mso-ansi-language:IN\">” dalam\r\nmengembangkan Bisnis </span><span style=\"font-size:12.0pt;line-height:107%\">di </span><span lang=\"IN\" style=\"font-size:12.0pt;line-height:107%;mso-ansi-language:IN\">E</span><span style=\"font-size:12.0pt;line-height:107%\">ra Digital. Seperti yang diketahui</span><span lang=\"IN\" style=\"font-size:12.0pt;line-height:107%;mso-ansi-language:IN\"> bahwa\r\nkehadiran</span><span style=\"font-size:12.0pt;line-height:107%\"> Digital</span><span lang=\"IN\" style=\"font-size:12.0pt;line-height:107%;mso-ansi-language:IN\">isasi</span><span style=\"font-size:12.0pt;line-height:107%\"> sangat diminati oleh berbagai\r\nkalangan dari anak kecil hingga orang dewasa</span><span lang=\"IN\" style=\"font-size:12.0pt;line-height:107%;mso-ansi-language:IN\">.</span><span lang=\"IN\" style=\"font-size:12.0pt;line-height:107%\"> </span><span lang=\"IN\" style=\"font-size:12.0pt;line-height:107%;mso-ansi-language:IN\">A</span><span style=\"font-size:12.0pt;line-height:107%\">palagi untuk seorang pengusaha di\r\njaman sekarang pastinya membutuhkan </span><span lang=\"IN\" style=\"font-size:12.0pt;\r\nline-height:107%;mso-ansi-language:IN\">pemasaran secara digital melalui\r\ninternet</span><span style=\"font-size:12.0pt;line-height:107%\"> untuk\r\nmemasarkan produk dan jasa mereka. Bagi </span><span lang=\"IN\" style=\"font-size:\r\n12.0pt;line-height:107%;mso-ansi-language:IN\">Anda </span><span style=\"font-size:12.0pt;line-height:107%\">yang belum tahu bagaimana </span><span lang=\"IN\" style=\"font-size:12.0pt;line-height:107%;mso-ansi-language:IN\">memasarkan\r\n</span><span style=\"font-size:12.0pt;line-height:107%\">produk dan jasa </span><span lang=\"IN\" style=\"font-size:12.0pt;line-height:107%;mso-ansi-language:IN\">agar\r\nlebih di</span><span style=\"font-size:12.0pt;line-height:107%\">kenal</span><span lang=\"IN\" style=\"font-size:12.0pt;line-height:107%;mso-ansi-language:IN\"> oleh\r\npublik</span><span lang=\"IN\" style=\"font-size:12.0pt;line-height:107%\"> </span><span style=\"font-size:12.0pt;line-height:107%\">maka </span><span lang=\"IN\" style=\"font-size:12.0pt;line-height:107%;mso-ansi-language:IN\">Anda harus\r\nbelajar “<b>D</b></span><span style=\"font-size:12.0pt;line-height:107%\"><b>igital\r\nMarketing</b>”</span><span lang=\"IN\" style=\"font-size:12.0pt;line-height:107%;\r\nmso-ansi-language:IN\">. Dengan pemasaran melalui <b>Digital Marketing</b> maka produk\r\ndan jasa Anda akan lebih mudah dikenal oleh banyak pelanggan dari berbagai\r\nkalangan dan penjuru dunia.</span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size: 12pt; line-height: 107%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b>Digital marketing</b> adalah segala upaya untuk\r\nmelakukan pemasaran suatu produk dan jasa melalui media internet. Pemasaran\r\ndalam internet marketing bukan hanya untuk meningkatkan penjualan, tapi juga\r\ntermasuk promosi produk dan jasa baru, branding, dan membina hubungan dengan\r\npelanggan. <o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size: 12pt; line-height: 107%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Nah, bagi </span><span lang=\"IN\" style=\"font-size: 12pt; line-height: 107%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">A</span><span style=\"font-size: 12pt; line-height: 107%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">nda yang ingin\r\njuga mempelajari </span><span lang=\"IN\" style=\"font-size: 12pt; line-height: 107%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">keilmuwan “</span><span style=\"font-size: 12pt; line-height: 107%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b>Digital Marketing</b>”</span><span style=\"font-size: 12pt; line-height: 107%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"> <span lang=\"IN\">untuk pemasaran produk dan jasa Anda </span></span><span style=\"font-size: 12pt; line-height: 107%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Creative Media\r\nlah tempatnya. </span><span lang=\"IN\" style=\"font-size: 12pt; line-height: 107%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Disini Anda akan diajarkan secara detail\r\nmulai dari Basic hingga Advanced bagaimana agara produk dan jasa Anda dibanjiri\r\noleh Order. </span><span style=\"font-size: 12pt; line-height: 107%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Yuk\r\nlangsung aja hubungi Custimer Service kami via WA di 0821 3131 4040 (Ayu) /\r\n0821 3131 0210 (Dhea) </span><span style=\"font-size: 12pt; line-height: 107%; background: rgb(254, 254, 254);\">atau bisa telpon di 031 - 7328540\r\n/ 031 – 59173739.</span><span style=\"font-size:12.0pt;line-height:107%;\r\nmso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin;background:#FEFEFE\"><o:p></o:p></span></p>', 'Publish', 'Editor Creative Media', '', '2019-11-25 17:19:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang_studi`
--

CREATE TABLE `bidang_studi` (
  `id_studi` int(4) NOT NULL,
  `nama_studi` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `harga` varchar(300) NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `updated_by` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bidang_studi`
--

INSERT INTO `bidang_studi` (`id_studi`, `nama_studi`, `deskripsi`, `gambar`, `harga`, `created_by`, `updated_by`, `created_date`, `updated_date`) VALUES
(4, 'Komputer Umum & Internet', 'Menguasai Komputer Umum & Internet secara keseluruhan sangatlah penting dan diperlukan dalam kehidupan sehari-hari karena Teknologi saat ini berkembang pesat. Dengan berkembangnya teknologi, saat ini Kursus Komputer Surabaya menyebar luas dikalangan muda hingga lanjut usia. Untuk itu dalam menghadapi persaingan global pada tahap informasi dan teknologi,        ', 'upload/gambar/kursus-komputer-surabaya.jpg', '2000000', '0000-00-00 00:00:00', 'Admin Creative Media', '2018-11-27 08:54:16', '2019-01-18 13:33:00'),
(5, 'Website Blog', '<p style=\"text-align: justify; \"><font color=\"#404040\" face=\"Lato, sans-serif\"><span style=\"font-size: 12px;\">Kalau hanya membuat Website Blog saja kami yakin banyak orang yang bisa, tapi pertanyaannya “Bagaimana Cara Membuat Website Sendiri secara Gratis tampilan Powerfull ?“. Pada bidang studi “Website Blog” ini anda dapat membuat Website menggunakan Blogspot dan Worpress dengan tampilan Menarik dan Powerfull tidak seperti Blog-blog pada umumnya dengan tampilan sederhana. Karena anda akan dibekali beberapa Teknik editing konten HTML yang ada di Web Blog tersebut sehingga tampilan lebih Menarik dan Profesional sehingga mempunyai nilai Citra Positif untuk pengembangan Bisnis Anda.</span></font><br></p>', 'upload/gambar/website-blog.jpg', '', 'Admin Creative Media', '', '2018-12-03 05:47:40', '0000-00-00 00:00:00'),
(6, 'Administrasi Perkantoran', '<p style=\"text-align: justify; \"><font color=\"#404040\" face=\"Lato, sans-serif\"><span style=\"font-size: 12px;\">Program Kursus Administrasi Perkantoran ini sangat cocok bagi anda lulusan SMA/K, Mahasiswa, Guru, Staff Perusahaan, Pegawai Negeri Sipil (PNS), Pebisnis Online, Karyawan swasta dll. Khususnya yang ingin mempelajari lebih dalam Software yang digunakan dalam kegiatan Administrasi Perkantoran yang ada di Perusahaan. Kursus Administrasi Perkantoran berfokus pada penguasaan Software Microsoft Office (Ms. Excel, Ms. Word, Ms. Power Point &amp; Outlook). Staff Administrasi Perkantoran sangat dibutuhkan di Perusahaan guna membantu mengelola dan mengolah serta manajemen data yang ada di perusahaan, sehingga lebih Efektif dan Efisien.</span></font><br></p>', 'upload/gambar/administrasi-perkantoran-ok.jpg', '', 'Admin Creative Media', '', '2018-12-03 05:50:17', '0000-00-00 00:00:00'),
(7, 'Komputer Akuntansi', '<p style=\"text-align: justify; \"><font color=\"#404040\" face=\"Lato, sans-serif\"><span style=\"font-size: 12px;\">Program bidang studi Komputer Akuntansi kami khususkan bagi Anda yang ingin Kursus Akuntansi yaitu mempelajari software accounting (Myob Accounting, Zahir Accounting, Accurate Accounting ataupun Excel Accounting). Banyak tempat kursus yang menyediakan bidang studi Komputer akuntansi atau MYOB sebagai materi pembelajaran, namun materi yang disajikan sangatlah Dasar sehingga belum sesuai dengan yang kita harapkan. Hal tersebut akan membuang waktu dan biaya secara percuma, untuk memenuhi kebutuhan tersebut Creative Media hadir dengan bidang studi Komputer Akuntasi Keuangan Profesional yang terdiri dari 2 kelas yaitu Professional Class dan Executive Class. Untuk mengetahui perbedaan antara Professional Class dan Executive Class, Anda dapat mempelajari perbedaan dimasing masing kelas pada halaman About Us.</span></font><br></p>', 'upload/gambar/Kursus-Komputer-Akuntansi-Akuntansi-MYOB-Les-Akuntansi-Kursus-Akuntansi-Surabaya-Les-Akutansi-Surabaya-02.jpg', '', 'Admin Creative Media', '', '2018-12-03 05:51:57', '0000-00-00 00:00:00'),
(8, 'Desain Grafis', '<p style=\"margin-bottom: 24px; border: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify;\"><font color=\"#404040\" face=\"Lato, sans-serif\"><span style=\"font-size: 12px;\">Seperti yang kita tahu bahwa keilmuwan Graphic Design sangat dibutuhkan di Era Global seperti saat ini, 99% teknik promo secara visual menggunakan keilmuwan Graphic Design. Untuk itu tidak salah lagi bidang studi Desain Grafis menjadi Primadona yaitu bidang studi terfavorit ditahun 2016. Siswa dan peserta kursus pada bidang studi ini datang dari berbagai latar belakang dan profesi, mulai dari lulusan SMA/K, Mahasiswa, Karyawan Swasta, Owner Bisnis hingga kalangan Dokter. Kini saatnya giliran Anda belajar desain grafis bersama kami. Untuk tingkatan pada bidang studi ini, kami mempunyai 2 level yaitu level Basic dan level Advanced.</span></font></p><p style=\"margin-bottom: 24px; border: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify;\"><font color=\"#404040\" face=\"Lato, sans-serif\"><span style=\"font-size: 12px;\"><br></span></font></p><p style=\"margin-bottom: 24px; border: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify;\"><font color=\"#404040\" face=\"Lato, sans-serif\"><span style=\"font-size: 12px;\">Tips dan trik pada keilmuwan Desain Grafis (seorang Desainer) dalam menciptakan sebuah karya komunikasi visual yang menarik, tentunya indah dilihat akan dikupas jika Anda belajar Desain Grafis bersama kami. Jadi bagi Anda yang ingin belajar Desain Grafis secara singkat dengan jadwal yang fleksibel, kami adalah solusi Cerdas dan Tepat dalam Desain Grafis Anda. Pada bidang studi ini akan diajarkan “Bagaimana cara mendesain yang benar?” serta arah dan tujuan dari karya visual yang kita buat agar bisa diterima oleh Client/Perusahaan. Dengan Desain yang Menarik, Informatif dan Kreatif akan mampu berbicara dalam menyampaikan pesan secara Visual. Oleh sebab itu bagi Anda yang ingin belajar Desain Grafis, saatnya Anda bergabung dengan kami, untuk menguak rahasia dibalik keilmuwan Desain Grafis.</span></font></p>', 'upload/gambar/Les-Privat-Desain-Grafis-Creative-Media.png', '', 'Admin Creative Media', '', '2018-12-03 05:53:44', '0000-00-00 00:00:00'),
(9, 'Desain Interior', '<p>Bidang Studi <font color=\"#ff9c00\" style=\"background-color: inherit;\">Desain Interior</font> adalah salah satu bidang studi keilmuan yang didasarkan pada penggabungan ilmu <b>Desain</b> dan <b>Interior</b> atau paling populer <b>Desain Interior Rumah</b>. Bidang studi <b>Desain Interior</b> ini bertujuan untuk menciptakan suatu lingkungan binaan (ruang dalam) yang fungsional sesuai dengan kebutuhan individu beserta elemen-elemen pendukungnya, baik fisik maupun non-fisik, sehingga kualitas kehidupan manusia yang berada didalamnya nyaman. Ada tiga hal utama yang menjadi kajian dalam <b>Desain Interior Rumah</b> yaitu ruang, alat fungsional dan manusia penggunanya.</p><p>Dalam mempelajari<b> Desain Interior Rumah</b> diperlukan penguasaan sejumlah pengetahuan yang berkaitan dengan aspek kebutuhan manusia di dalam ruang sebagai makhluk individual maupun sosial. Pengetahuan yang dimaksud mencakup: sejarah<b> desain, psikologi, sosiologi, ergonomi, konstruksi bangunan, fisika teknik, metodologi dan estetika.</b> Selain pemahaman terhadap pengetahuan yang mendukung diperlukan juga penguasaan keterampilan dalam proses perancangan<b> Desain Interior Rumah</b> antara lain kemampuan membuat program, kemampuan membuat presentasi desain, kemampuan komunikasi dan sebagainya.</p>                ', 'upload/gambar/Kursus-Desain-Interior-di-Surabaya-01.jpg', '', 'Admin Creative Media', 'Admin Creative Media', '2019-02-12 11:40:08', '2019-03-25 20:41:25'),
(10, 'Desain Arsitektur', '<p>Perkembangan desain bangunan saat ini yang sangat indah, berseri serta megah yang sering kita jumpai khususnya di kota-kota besar Jakarta, Surabaya dan sekitarnya, mungkin ketika itu pikiran kita akan melayang pada suatu kata yaitu \"Arsitek\". Sangat benar kata Arsitek ketika sudah menempuh dan menyelesaikan pendidikan formal maupun non-formal di bidang studi<b> Desain Arsitektur</b>. Tentunya kata<b> Desain Arsitektur</b>&nbsp; tidak lepas dari kata perancangan dan desain sebuah bangunan dan ruang.</p><p>Sebuah ruang yang baik adalah yang dapat menampung dan mewadahi segala aktivitas di dalamnya. Dengan adanya aktivitas yang terjadi di dalamnya, maka sebuah space dapat dikatakan sudah menjadi place (tempat yang memiliki ruh/spirit kehidupan). Banyak elemen dan unsur yang mampu menciptakan sebuah ruang. Salah satunya contohnya ada pada gambar disamping ini. Sebuah ruang cafe tidak hanya dapat dibentuk oleh lantai marmer, dinding masif, dan atap genteng. Tetapi, ruangan tersebut hanya diciptakan dari sebuah kanopi sederhana dan pagar rendah disekelilingnya.</p><p><b><font color=\"#0000ff\" style=\"background-color: inherit;\">Bangunan</font></b> yang baik haruslah memiliki Keindahan / Estetika (Venustas), Kekuatan (Firmitas), dan Kegunaan /Fungsi (Utilitas); arsitektur dapat dikatakan sebagai keseimbangan dan koordinasi antara ketiga unsur tersebut, dan tidak ada satu unsur yang melebihi unsur lainnya. Dalam definisi modern,<b> Desain Arsitektur</b> harus mencakup pertimbangan fungsi, estetika, dan psikologis. Namun, dapat dikatakan pula bahwa unsur fungsi itu sendiri di dalamnya sudah mencakup baik unsur estetika maupun psikologis.</p><p>Dalam bidang studi<b> Desain Arsitektur</b> ini, materi pembelajaran seputar penggunaan software AutoCAD dan Sketch Up serta penggunaan tools didalamnya. Dalam prosesnya, dan setelah menuntaskan kursus dalam bidang studi ini, siswa diharapkan akan mampu membuat denah rumah sederhana, siswa mampu dalam membuat tampak bangunan di AutoCAD 2D (depan dan samping), mampu membuat potongan bangunan di AutoCAD 2D, perencanaan denah lokasi denah atap, serta perencanaan instalasi dalam rumah lainnya seperti listrik dan saluran air.</p><p>Setelah menyelesaikan pembelajaran bidang studi<b> Desain Arsitektur</b> ini, peserta diharapkan memiliki kemampuan dalam menguasai dasar merancang Arsitektur secara komprehensif (untuk bangunan dengan kompleksitas menengah), mempunyai jiwa semangat dalam berwirausaha, mempunyai kualifikasi nasional, menguasai prinsip arsitektur sadar energi, mempunyai kemampuan mendesain arsitektur (menguasai metode desain, menguasai standard-standard, menguasai peraturan bangunan, menguasai detailed desain, menguasai bahan bangunan, mampu memperhitungkan RAB), dll.</p>                ', 'upload/gambar/architecture-design-wallpaper-ok-.jpg', '', 'Admin Creative Media', 'Admin Creative Media', '2019-02-12 11:50:36', '2019-02-12 13:28:16'),
(11, 'Editing Video Multimedia', '<p>Bidang studi<b>  Kursus Editing Video Multimedia</b>  ini sangat cocok bagi Anda yang ingin mengembangkan kemampuan dalam proses pembuatan atau pengolahan<b> Editing Video Multimedia</b>. Dalam pembelajaran ini materi yang akan Anda pelajari secara umum adalah<b>  Teknik capture video, Edit video, Film dokumenter, Video effect, Transisi effect, Audio editing dan Effect, Tittle video animations, Video rendering, Produksi VCD & DVD,</b>  dan masih banyak lagi yang lainnya. Karena Sistem pembelajaran kami 1 Tentor 1 Siswa, jadi Anda bebas berexplore mengenai materi, materi custom (bisa menyesuaikan kebutuhan siswa). Software yang Anda kuasi pada<b> Kursus Editing Video</b> ini adalah<b> Adobe Premiere, Adobe After Effect,</b> serta software pendukung<b> Editing Video Multimedia</b>  lainnya.</p><p>Dalam pembelajaran<b> Editing Video Multimedia</b> kursus topik yang didapat merupakan bagian dari pengetahuan pembuatan motion graphics dan efek video yang didapat dimanfaatkan untuk kebutuhan Video Editing, Televisi dan Film. Setelah mengikuti kursus Anda akan mampu membuat Project Video (<b>Wedding, Birthday Party, Event Organizer, Video Clip, Film Pendek, Opening, Ending, dll.</b>) dari Camera dengan menarik dan Profesional, Video Edited/Manipulations Special Video Effect dan lain-lain.</p>                ', 'upload/gambar/kursus_editing_video.jpg', '', 'Admin Creative Media', 'Admin Creative Media', '2019-02-12 11:59:37', '2019-02-12 13:16:52'),
(12, 'Pemrograman Web', '<p>Bahasa pemrograman yang akan Anda pelajari dalam bidang studi <b>Pemrograman Web</b> disini yaitu mencakup<b> HTML, PHP, MySQL</b> (database),<b> CSS, Java Script, Framework dan Jquery</b>. Anda akan mempelajari dasar-dasar bahasa <b>Pemrograman Web</b> HTML, PHP, MySQL, CSS dan Jquery, sehingga setelah melewati kursus <b>Pemrograman Web</b> ini Anda akan mampu menerapkan pemrograman yang Anda pelajari dalam pembuatan sebuah <b>Website Dinamis Profesional</b>. Jika Anda pemula yang sama sekali belum pernah mengenal coding / bahasa pemrograman, dengan senang hati Tentor kami akan membimbing Anda SAMPAI BISA. Semua itu didasari demi tercapainya Visi dan Misi yang besar, salah satunya \"Mencerdaskan generasi muda Indonesia menjadi generasi yang berkompeten dan berdaya saing Global sehingga dapat bekerja Mandiri dan Kreatif\".</p><p><br></p><p>Dalam kursus <b>Pemrograman Web</b> ini Anda akan dibimbing langsung oleh <b>Pakar Progamming Web</b> terdiri dari dari Praktisi dan Dosen Profesional yang sudah berpengalaman di Bidang Web Programmer. Sudah banyak project-project besar yang ditangani oleh Tentor kami mulai dari Perusahaan, Pemerintah, UMKM, Dll. Jadi Tentor kami adalah orang yang tepat untuk Anda jadikan pendamping dalam menyelesaikan tumpukan permasalahan <b>Pemrograman Web</b> Anda. Belajar Pemrograman itu sangatlah mudah, tidak seperti yang anda bayangkan saat ini.</p><p><span source=\"\" sans=\"\" pro\",=\"\" sans-serif;=\"\" color:=\"\" rgb(64,=\"\" 64,=\"\" 64);=\"\" background-image:=\"\" initial;=\"\" background-position:=\"\" background-size:=\"\" background-repeat:=\"\" background-attachment:=\"\" background-origin:=\"\" background-clip:=\"\" initial;\"=\"\">Jika Anda pemula, dalam pembelajaran kursus&nbsp;</span><strong style=\"font-style: inherit; outline: 0px;\"><span source=\"\" sans=\"\" pro\",=\"\" sans-serif;=\"\" color:=\"\" rgb(255,=\"\" 102,=\"\" 0);=\"\" border:=\"\" 1pt=\"\" none=\"\" windowtext;=\"\" padding:=\"\" 0in;=\"\" background-image:=\"\" initial;=\"\" background-position:=\"\" background-size:=\"\" background-repeat:=\"\" background-attachment:=\"\" background-origin:=\"\" background-clip:=\"\" initial;\"=\"\"><span style=\"outline: 0px;\">Pemrograman Web</span></span></strong><span source=\"\" sans=\"\" pro\",=\"\" sans-serif;=\"\" color:=\"\" rgb(64,=\"\" 64,=\"\" 64);=\"\" background-image:=\"\" initial;=\"\" background-position:=\"\" background-size:=\"\" background-repeat:=\"\" background-attachment:=\"\" background-origin:=\"\" background-clip:=\"\" initial;\"=\"\">&nbsp;ini Anda akan dikenalkan Pengantar bahasa pemrograman\r\nPHP, Struktur PHP, Variable, Tipe data dan konstanta, Submit form (POST/GET),\r\nOperator Aritmatika, Operator assignment, Operator perbandingan, Operator\r\nlogika, Menggunakan variable array, Kondisi (IF, ELSE , SWITCH), Pengulangan\r\n(FOR, WHILE, FOREACH), Membuat fungsi, Mengenal MySQL, Membuat database,\r\nMembuat table database, Perintah SQL, Koneksi Database dengan PHP, Submit form\r\nke database, Menampilkan data dari database, Upload ke hosting.</span><br></p><p class=\"MsoNormal\"><span style=\"font-family: \" source=\"\" sans=\"\" pro\",=\"\" sans-serif;=\"\" color:=\"\" rgb(64,=\"\" 64,=\"\" 64);=\"\" background-image:=\"\" initial;=\"\" background-position:=\"\" background-size:=\"\" background-repeat:=\"\" background-attachment:=\"\" background-origin:=\"\" background-clip:=\"\" initial;\"=\"\"><o:p>&nbsp;</o:p></span></p><p style=\"margin: 0in 0in 0.25in; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; vertical-align: baseline;\"><span style=\"font-family:\" source=\"\" sans=\"\" pro\",sans-serif;color:#404040\"=\"\">Namun jika Anda\r\nsudah menguasai teknik dasar dalam pembuatan Web Standart, maka tentor akan\r\nmengajarkan Anda&nbsp; tentang PHP &amp; MySQL tingkat Profesional. Mengenal\r\ndan menggunakan tag-tag HTML, Membuat dokumen web statis HTML, Manajemen Table,\r\nBullet &amp; numbering, Penggunaan link, Penerapan Color. Penggunaan\r\nproperty-properti CSS tingkat lanjut, JavaScript tingkat lanjut. Konsep OOP\r\ndalan PHP tingkat lanjut, Konfigurasi Database MySQL, Pengenal\r\nperintah-perintah SQL di MySQL untuk tingkat lanjut, HTML : iframe, JavaScript,event\r\ndriven (on Change, on Submit, functions), document object. MySQL: DDL, DML, DCL\r\ndi SQL. PHP : OOP, File System, Regular Expresion, XML, Penggunaan dan\r\npenerapan CSS, Penggunaan dan pengaplikasian Jquery.<o:p></o:p></span></p><p style=\"margin: 0in 0in 0.0001pt; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; vertical-align: baseline; outline: 0px;\"><span style=\"font-family:\" source=\"\" sans=\"\" pro\",sans-serif;color:#404040\"=\"\">Setelah\r\nmengikuti kursus&nbsp;</span><span style=\"font-style: inherit; font-weight: inherit; outline: 0px;\"><strong style=\"font-style: inherit; outline: 0px;\"><span style=\"font-family:\" source=\"\" sans=\"\" pro\",sans-serif;=\"\" color:#993366;border:none=\"\" windowtext=\"\" 1.0pt;mso-border-alt:none=\"\" 0in;=\"\" padding:0in\"=\"\">Pemrograman Web level Advanced</span></strong></span><span style=\"font-family:\" source=\"\" sans=\"\" pro\",sans-serif;color:#404040\"=\"\">&nbsp;Anda akan\r\nmampu membuat&nbsp;<strong style=\"font-style: inherit; outline: 0px;\"><span style=\"border: 1pt none windowtext; padding: 0in;\">Website\r\nCompany Profile, Web Application dan Website E-Commerce (Lazada.co.id,\r\nTokopedia.com,</span></strong>&nbsp;dll) yang komplek dan dinamis.<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><span style=\"font-family:\" source=\"\" sans=\"\" pro\",sans-serif;=\"\" mso-fareast-font-family:mingliu_hkscs-extb\"=\"\">&nbsp;</span></p>                ', 'upload/gambar/pemweb.jpg', '', 'Admin Creative Media', 'Admin Creative Media', '2019-02-12 12:00:39', '2019-02-12 13:35:36'),
(13, 'Website Desain CMS', '<p><b><font color=\"#0000ff\">C<font style=\"background-color: inherit;\">ara membuat Website</font></font></b> sangatlah mudah jika sudah tahu trik dan tipsnya. Dalam bidang studi Website Desain CMS ini dirancang bagi Anda yang ingin tahu bagaimana <font color=\"#0000ff\" style=\"background-color: inherit;\">cara membuat Website</font> (Toko Online, E-Commerce, Company profile, Web portfolio, Instansi pemerintah, Kementerian, Sekolah, Majalah, Bisnis, Fotografi dll.) menggunakan CMS Wordpress. Alasan kenapa untuk kursus cara membuat Website menggunakan CMS Wordpress ? Alasannya adalah kemampuannya sudah tidak bisa diragukan lagi, dilengkapi dengan desain template yang up-to-date sehingga Platform Wordpress menjadi populer di kalangan Programmer Web selain Open Source, CMS WordPress menjadi salah satu CMS yang Populer dan Powerfull dibanding Joomla dan sejenisnya.</p><p>Bagaimana cara membuat Website dalam waktu singkat? disini kami membimbing Anda tentang<b> cara membuat Website</b> atau membangun sebuah website yang<b> Powerfull dan SEO Friendly</b>. Dengan memanfaatkan fasilitas yang ada mulai dari<b> Widget serta Plugin-plugin</b> dengan konfigurasi yang kompleks, maka Website Anda berpeluang besar akan masuk di halaman \" Rangking 1 di google, Mau? \" Pada bidang studi ini Anda akan diajarkan<b> cara membuat Website</b> yang Menarik, Powerfull dan CEO friendly tanpa harus belajar Web Programming yang begitu rumit (bagi yang belum bisa), Jadi saat ini adalah moment yang TEPAT bagi Anda untuk SEGERA mengambil kursus di bidang<b> Desain Website CMS</b> ini.</p><p>Untuk memenuhi kebutuhan tersebut yaitu<b> cara membuat Website</b> yang menarik dan powerfull kami menyiapkan Pengajar dari Praktisi dan Dosen Profesional yang sudah berpengalaman di bidangnya. Anda bisa belajar mulai dasar hingga tingkat Advanced dalam waktu yang relatif singkat, setelah mengikuti kursus<b> Website Desain CMS</b> (cara membuat Website) siswa mampu membuat, mengelola atau maintenance website secara Profesional serta penerapan teknik SEO Friendly.</p>                ', 'upload/gambar/cara-membuat-website21.jpg', '', 'Admin Creative Media', 'Admin Creative Media', '2019-02-12 12:06:50', '2019-02-12 13:15:08'),
(14, 'Pemrograman Java Android', '<p>Aplikasi Android adalah salah satu aplikasi yang lagi trend dan dicari oleh para penggila gadget atau smartphone canggih saat ini. Tahukah Anda, bahwa semua aplikasi android / mobile yang lagi dicari dan trend itu dasarnya dari <b>Pemrograman Java for Android</b> yang di compile menjadi apk. Sederhana bukan ?&nbsp; Tidak heran jika muncul berbagai macam tutorial di blog dan website yang mengajarkan materi tentang <b>Pemrograman Java Mobile</b> untuk <b>Android</b>.</p><p><br></p><p class=\"MsoNormal\"><strong><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif; color: rgb(51, 51, 51); border: 1pt none windowtext; padding: 0in; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Pemrograman Java</span></strong><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif; color: rgb(51, 51, 51); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">&nbsp;adalah bahasa\r\npemrograman yang dapat dijalankan di berbagai komputer atau smartphone.&nbsp;<strong style=\"outline: 0px;\"><span style=\"border: 1pt none windowtext; padding: 0in;\">Pemrograman</span></strong>&nbsp;ini banyak\r\nmengadopsi sintaksis yang terdapat pada C dan C++ namun dengan sintaksis model\r\nobjek yang lebih. Aplikasi-aplikasi berbasis java umumnya dikompilasi ke dalam\r\np-code (bytecode) dan dapat dijalankan pada berbagai Mesin Virtual Java (JVM).<o:p></o:p></span></p><p class=\"MsoNormal\"><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif; color: rgb(51, 51, 51); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><o:p>&nbsp;</o:p></span></p><p>\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><strong><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif; color: rgb(51, 51, 51); border: 1pt none windowtext; padding: 0in; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Pemrograman Java</span></strong><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif; color: rgb(51, 51, 51); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">&nbsp;merupakan\r\nbahasa pemrograman yang bersifat umum/non-spesifik (general purpose), dan\r\nsecara khusus didesain untuk memanfaatkan dependensi implementasi seminimal\r\nmungkin. Karena fungsionalitasnya yang memungkinkan aplikasi java mampu\r\nberjalan di beberapa platform sistem operasi yang berbeda, java dikenal pula\r\ndengan slogannya, “<strong style=\"outline: 0px;\"><span style=\"border: 1pt none windowtext; padding: 0in;\">Tulis\r\nsekali, jalankan di mana pun</span></strong>“. Bidang studi ini&nbsp;merupakan bahasa pemrograman yang\r\npaling populer digunakan, dan secara luas dimanfaatkan dalam pengembangan\r\nberbagai jenis perangkat lunak aplikasi mobile ataupun aplikasi berbasis web.</span><span style=\"font-family:&quot;Source Sans Pro&quot;,sans-serif\"><o:p></o:p></span></p>        ', 'upload/gambar/pemrograman-java.jpg', '', 'Admin Creative Media', 'Admin Creative Media', '2019-02-12 12:32:08', '2019-02-12 13:30:10'),
(15, 'Web Designer', '<p>Bidang studi<b> Web Designer</b> ini sangat kami rekomendasikan bagi Anda yang ingin belajar membuat website dengan bahasa pemrograman HTML & CSS. Jika Anda tidak mempunyai Basic IT tidak menjadi persoalan, karena kami mempunyai 2 Level yaitu Basic (pemula) dan level Advanced (Mahir). Pembelajaran pada bidang studi ini kami fokuskan pada HTML5 dan CSS3 dimana peserta akan mampu membuat Front End website sesuai dengan keinginan yang diinginkan. Materi pembelajaran pada Level Basic mencakup fitur terbaru HTML5 dan CSS3, memahami media Query di CSS, implementasi sintak di HTML5, menerapkan semantic Content Markup & Tag-tag bari, work with audio & video fluid (desain responsive), layout responsive (tablet & smartphone).<b> Kursus Web Designer</b> ini sangatlah cocok bagi Anda yang masih pemula (step-awal) sebelum mengenal bahasa pemrograman PHP & SQL (Database) yaitu yang akan di pelajari pada bidang studi<font style=\"background-color: inherit;\"> </font><font style=\"background-color: inherit;\">Pemrograman Web.</font></p><p>Level selanjutnya setelah Anda menempuh level Basic (pemula) adalah melanjutkan ke Level Advanced (mahir). Materi lanjutan dari level Basic akan dibahas pada level Advanced mencakup pendalaman tentang CSS3 (CSS3 tingkat lanjut) dan pemahaman javascript dan implementasi boostrap untuk menghasilkan template website yang responsive (menyesuaikan) untuk tampilan mobile (tablet, smartphone). Setelah mengikuti<b> Kursus Web Designer</b> ini siswa akan memahami konsep UX (User Experience) dan karakteristik serta prinsip-prinsip UI (User Interface).</p><p>Setelah mengikuti kelas Basic dan Advanced siswa akan mampu membuat Template Website menggunakan Bootstrap yang nantinya bisa dijual di beberapa situs template website internasional. Karya Anda akan mempunyai peluang besar dibeli oleh Perusahaan-Perusahaan Internasional yang menyukai dengan web yang sudah Anda buat.</p>                ', 'upload/gambar/video-bkgd2.jpg', '', 'Admin Creative Media', 'Admin Creative Media', '2019-02-12 12:39:02', '2019-02-12 13:11:09'),
(16, 'Pemrograman Mobile IOS', '<p>Seperti yang kita ketahui bahwa perkembangan teknologi mobile begitu pesat sehingga mengikis pangsa pasar desktop user. Sehingga Perusahaan harus memacu mengikuti perkembangan teknologi mobile saat ini yaitu menciptakan produk-produk aplikasi berbasis mobile mencakup Android & IOS. Beberapa aplikasi mobile yang sangat populer pada masa kini adalah Android & IOS. Sebagai Programmer atau developer aplikasi sudah seharusnya Anda menguasai pemrograman yang berbasis mobile  diantaranya adalah pemrograman Android dan Pemrograman IOS. Kami sebagai Developer aplikasi mobile Android & IOS membuka kesempatan bagi Anda yang ingin belajar dalam pembuatan aplikasi mobile sesuai kebutuhan Anda. Program bidang studi <b>Pemrograman Mobile IOS</b> ini kami rancang khusus bagi Anda yang ingin berselancar membuat aplikasi IOS dengan berbagai macam kebutuhan. <b>Pemrograman Mobile IOS </b>ini mempunyai 2 kelas yaitu <b>Profesional Class</b> dan<b> Executive Class</b>, dimana pada masing-masing kelas mempunyai konsep pendekatan materi yang berbeda. Untuk mengetahui perbedaan dari kedua kelas tersebut Anda bisa mengakses halaman Profil .</p><p><br></p><p class=\"MsoNormal\"><span style=\"font-family: Lato, sans-serif; color: rgb(64, 64, 64); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Bidang Studi </span><strong style=\"outline: 0px;\"><span style=\"font-family:\"Lato\",sans-serif;\r\nmso-bidi-font-family:\"Times New Roman\";mso-bidi-theme-font:minor-bidi;\r\nborder:none windowtext 1.0pt;mso-border-alt:none windowtext 0in;padding:0in\">Pemrograman\r\nMobile IOS</span></strong> ini mempunyai 2 Level yaitu Pemrograman Mobile IOS\r\nlevel basic dan Pemrograman Mobile IOS Level Advanced. Level Basic kami\r\nkhususkan bagi Anda seorang pemula yang belum pernah belajar bahasa <strong style=\"outline: 0px;\"><span style=\"font-family:\"Lato\",sans-serif;mso-bidi-font-family:\"Times New Roman\";\r\nmso-bidi-theme-font:minor-bidi;border:none windowtext 1.0pt;mso-border-alt:\r\nnone windowtext 0in;padding:0in\">Pemrogaman Mobile IOS</span></strong> atau belum\r\nmempunyai Basic Programming IOS. Sedangkan Level Advanced adalah materi\r\nlanjutan dari Level Basic, tetapi jika Anda sudah mempunyai Basic Pemrogaman\r\nMobile IOS mungkin belajar secara otodidak Anda bisa mengambil Level Advanced.\r\nHanya saja jika Anda ingin fokus dan menguasai <strong style=\"outline: 0px;\"><span style=\"font-family:\"Lato\",sans-serif;mso-bidi-font-family:\"Times New Roman\";\r\nmso-bidi-theme-font:minor-bidi;border:none windowtext 1.0pt;mso-border-alt:\r\nnone windowtext 0in;padding:0in\">Programmin Mobile IOS</span></strong> kami sangat\r\nmerekomendasikan bagi Anda untuk mengambil 1 Paket yaitu Level Basic dan Level\r\nAdvanced sehingga Anda akan mampu membuat aplikasi dengan harga jual 5 juta\r\nhingga 15 jutaan. Pada bidang studi <strong style=\"outline: 0px;\"><span style=\"font-family:\"Lato\",sans-serif;\r\nmso-bidi-font-family:\"Times New Roman\";mso-bidi-theme-font:minor-bidi;\r\nborder:none windowtext 1.0pt;mso-border-alt:none windowtext 0in;padding:0in\">Pemrograman\r\nMobile IOS</span></strong> Anda akan dibimbing oleh tutor kami dari Kalangan\r\nPraktisi dan Akademis Profesional yang sudah berpengalaman di Mobile IOS\r\nDevelopment.<o:p></o:p></p><p class=\"MsoNormal\"><span style=\"font-family: Lato, sans-serif; color: rgb(64, 64, 64); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><o:p> </o:p></span></p><p>\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><span style=\"font-family: Lato, sans-serif; color: rgb(64, 64, 64); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Untuk melihat Silabus Kursus </span><strong style=\"outline: 0px;\"><span style=\"font-family:\"Lato\",sans-serif;mso-bidi-font-family:\"Times New Roman\";\r\nmso-bidi-theme-font:minor-bidi;border:none windowtext 1.0pt;mso-border-alt:\r\nnone windowtext 0in;padding:0in\">Pemrograman Mobile IOS</span></strong>, Anda dapat\r\nberkunjung ke kantor kami untuk konsultasi dan melihat lebih detail. Karena\r\nkami hanya menyiapkan silabus dalam bentuk Hardcopy untuk kebutuhan Internal\r\nkami. Lebih dari 50 siswa setiap bulannya daftar dan bergabung bersama kami\r\nuntuk mengembangkan softskill di keilmuan Informatic Technology  &\r\nMultimedia. Tidak hanya dari masyarakat umum saja, lebih dari 5 perusahaan\r\nsetiap bulannya dimana mereka mengirimkan staff / karyawan mereka untuk\r\nmengikuti Training bersama kami. <strong style=\"outline: 0px;\"><span style=\"font-family:\"Lato\",sans-serif;\r\nmso-bidi-font-family:\"Times New Roman\";mso-bidi-theme-font:minor-bidi;\r\nborder:none windowtext 1.0pt;mso-border-alt:none windowtext 0in;padding:0in\">Apakah\r\nAnda adalah calon siswa kami pada Bulan ini?</span></strong> Jawabanya ada\r\npada Anda. Karena kami sangat tahu bahwa Anda akan memilih tempat terbaik dan\r\nkredibel untuk memebuhi kebutuhan belajar Anda. Jangan belajar pada orang yang\r\nhanya bisa, karena itu akan menyesatkan Anda. Belajarlah pada Pakar dan\r\nPraktisi yang sudah berpengalaman dibidangnya.<o:p></o:p></p>                ', 'upload/gambar/Kursus-Pemrograman-Mobile-IOS-Les-Pemrograman-Mobile-IOS-Training-Mobile-IOS-Kursus-IOS-Surabaya-Les-IOS-Surabaya-03.jpg', '', 'Admin Creative Media', 'Admin Creative Media', '2019-02-12 12:43:57', '2019-02-12 13:34:57'),
(17, 'Photography', '<p><b>Kursus <font color=\"#6ba54a\">Fotografi Profesional</font></b><font color=\"#6ba54a\"> </font><span style=\"color: rgb(0, 0, 0); font-family: \" source=\"\" sans=\"\" pro\",=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 400;=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" text-decoration-style:=\"\" initial;=\"\" text-decoration-color:=\"\" display:=\"\" inline=\"\" !important;=\"\" float:=\"\" none;\"=\"\"><span> </span></span>dengan layanan dan fasilitas lengkap adalah impian dari semua siswa yang ingin <font color=\"#ff9c00\"><b>Belajar Fotografi</b></font> <b>secara Profesional</b>. Itu semua akan terjawab jika anda mengambil bidang studi kursus<font color=\"#311873\"><span style=\"background-color: rgb(255, 255, 255);\"> <b>Fotografi</b></span><b> </b></font>di <font color=\"#311873\"><b>CREATIVE</b></font><font color=\"#ff9c00\"><b> MEDIA</b></font>. Dibimbing langsung oleh <b>Tentor Profesional</b> di bidang Fotografi dan sudah berpengalaman mendidik banyak<b> Fotografer</b> dari berbagai kalangan untuk kebutuhan<b> Hobi, Bisnis dan Profesi</b>. Dalam<b> kursus Fotografi </b>anda akan mampu menguasai teknik-teknik<b> Fotografi Profesional</b> dalam waktu yang singkat dan efektif serta biaya di <b style=\"\"><font color=\"#6ba54a\">JAMIN MURAH</font></b>.</p><p><br></p><p>Pada umumnya kursus<b><font color=\"#ff9c00\"> Fotografi</font></b> itu <b>MAHAL</b> tapi kami berbeda, hanya kami yang berani memberikan HARGA <b>kursus <font color=\"#731842\">Fotografi</font></b> dengan<b> BIAYA TERJANGKAU</b>, demi tercapainya Visi dan Misi kami yang besar salah satunya \"<b>Mencerdaskan generasi muda Indonesia menjadi generasi yang berkompeten dan berdaya saing Global</b>\". Sangat berbeda dengan <b>kursus <font color=\"#6ba54a\">Fotografi</font></b><font color=\"#6ba54a\"> </font>ditempat lain yang hanya menguntungkan secara personal tetapi tidak mampu membantu dan memberikan kontribusi positif dan menjawab kebutuhan siswa dengan kondisi ekonomi terbatas. Tentunya kami sangat prihatin tetapi keputusan semacam itu menjadi hak setiap orang / profesi untuk menentukan harga sesuai yang dia inginkan.</p><p><br></p><p class=\"MsoNormal\"><span style=\"font-family: \"Source Sans Pro\", sans-serif; color: rgb(64, 64, 64); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Pada kursus </span><strong style=\"font-style: inherit; outline: 0px;\"><span style=\"font-family: \"Source Sans Pro\", sans-serif; color: rgb(255, 102, 0); border: 1pt none windowtext; padding: 0in; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"outline: 0px;\">Belajar Fotografi</span></span></strong><span style=\"font-family: \"Source Sans Pro\", sans-serif; color: rgb(64, 64, 64); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"> siswa akan mampu menghasilkan karya foto yang\r\nberkualitas tinggi tanpa melakukan editing menggunakan software pendukung foto\r\npada umumnya, misalnya Adobe Photoshop dll. Untuk menghasilkan karya foto\r\nseperti itu tentunya ada teknik-teknik dan banyak pemikiran serta pertimbangan\r\nkhusus yang akurat dalam penerapannya. Dengan mengikuti kursus </span><strong style=\"font-style: inherit; outline: 0px;\"><span style=\"font-family: \"Source Sans Pro\", sans-serif; color: rgb(153, 51, 102); border: 1pt none windowtext; padding: 0in; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"outline: 0px;\">Belajar Fotografi</span></span></strong><span style=\"font-family: \"Source Sans Pro\", sans-serif; color: rgb(153, 51, 102); border: 1pt none windowtext; padding: 0in; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"> </span><span style=\"font-family: \"Source Sans Pro\", sans-serif; color: rgb(64, 64, 64); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">ini, kami akan\r\nmemberikan semua bekal yang anda butuhkan serta dengan leluasa anda bisa\r\nberdiskusi secara bebas (kapan saja dan dimana saja) bersama</span><strong style=\"font-style: inherit; outline: 0px;\"><span style=\"font-family: \"Source Sans Pro\", sans-serif; color: rgb(153, 204, 0); border: 1pt none windowtext; padding: 0in; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"outline: 0px;\"> Tentor Profesional</span></span></strong><span style=\"font-family: \"Source Sans Pro\", sans-serif; color: rgb(153, 204, 0); border: 1pt none windowtext; padding: 0in; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"> </span><span style=\"font-family: \"Source Sans Pro\", sans-serif; color: rgb(64, 64, 64); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">kami.<o:p></o:p></span></p><p class=\"MsoNormal\"><span style=\"font-family: \"Source Sans Pro\", sans-serif; color: rgb(64, 64, 64); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><o:p> </o:p></span></p><p style=\"margin: 0in 0in 0.0001pt; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; vertical-align: baseline;\"><span style=\"font-family:\"Source Sans Pro\",sans-serif;\r\ncolor:#404040\">Kenapa Kursus</span><span style=\"font-style: inherit; font-weight: inherit; outline: 0px;\"><strong style=\"font-style: inherit; outline: 0px;\"><span style=\"font-family:\"Source Sans Pro\",sans-serif;\r\ncolor:#99CC00;border:none windowtext 1.0pt;mso-border-alt:none windowtext 0in;\r\npadding:0in\"> Fotografi</span></strong></span><span style=\"font-family:\r\n\"Source Sans Pro\",sans-serif;color:#404040\"> itu penting? Banyak orang\r\ndiluar sana yang memunyai camera berkualitas tinggi, tapi hanya sedikit yang\r\nmampu menjual kemampuannya secara tepat. Hal itu karena mereka tidak mempunyai\r\nkemampuan khusus untuk menghasilkan karya yang menjual. Perlu anda ketahui\r\nbahwa untuk mendapatkan <strong style=\"font-style: inherit; outline: 0px;\"><span style=\"border: 1pt none windowtext; padding: 0in;\">Profit\r\nbesar puluhan juta setiap bulan</span></strong> dari hasil memotret itu\r\nhal yang sangat mudah jika anda mengikuti kursus </span><span style=\"font-style: inherit; font-weight: inherit; outline: 0px;\"><strong style=\"font-style: inherit; outline: 0px;\"><span style=\"font-family:\"Source Sans Pro\",sans-serif;color:#FF6600;\r\nborder:none windowtext 1.0pt;mso-border-alt:none windowtext 0in;padding:0in\">Belajar\r\nFotografi.</span></strong></span><span style=\"font-family:\"Source Sans Pro\",sans-serif;\r\ncolor:#404040\"> Besarnya kebutuhan pasar akan produk fotografi membuat\r\nindustri ini berkembang pesat, dan sekarang adalah kesempatan anda untuk meraih\r\nsukses.<o:p></o:p></span></p><p style=\"margin: 0in 0in 0.0001pt; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; vertical-align: baseline;\"><span style=\"font-family:\"Source Sans Pro\",sans-serif;\r\ncolor:#404040\"> </span></p><p style=\"margin: 0in 0in 0.0001pt; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; vertical-align: baseline; outline: 0px;\"><span style=\"font-family:\"Source Sans Pro\",sans-serif;color:#404040\">Materi\r\nkursus </span><span style=\"font-style: inherit; font-weight: inherit; outline: 0px;\"><strong style=\"font-style: inherit; outline: 0px;\"><span style=\"font-family:\"Source Sans Pro\",sans-serif;\r\ncolor:#99CC00;border:none windowtext 1.0pt;mso-border-alt:none windowtext 0in;\r\npadding:0in\">Belajar Fotografi</span></strong><span style=\"font-family:\"Source Sans Pro\",sans-serif;\r\ncolor:#99CC00;border:none windowtext 1.0pt;mso-border-alt:none windowtext 0in;\r\npadding:0in\"> </span></span><span style=\"font-family:\"Source Sans Pro\",sans-serif;\r\ncolor:#404040\">ini dirumuskan berdasarkan riset selama bertahun-tahun dari\r\npengalaman yang didapat dari<strong style=\"font-style: inherit; outline: 0px;\"><span style=\"border: 1pt none windowtext; padding: 0in;\"> Tentor\r\nProfesional</span></strong> kami yaitu sebagai Fotografer handal pada\r\nbidang </span><span style=\"font-style: inherit; font-weight: inherit; outline: 0px;\"><strong style=\"font-style: inherit; outline: 0px;\"><span style=\"font-family:\"Source Sans Pro\",sans-serif;\r\ncolor:#993366;border:none windowtext 1.0pt;mso-border-alt:none windowtext 0in;\r\npadding:0in\">Wedding, Pre-Wedding, Indoor Studio, Outdoor, Product, Company\r\nProfile, Advertising, Magazine dll.</span><o:p></o:p></strong></span></p><p style=\"margin: 0in 0in 0.0001pt; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; vertical-align: baseline;\"><strong><span style=\"font-family:\"Source Sans Pro\",sans-serif;\r\ncolor:#993366;border:none windowtext 1.0pt;mso-border-alt:none windowtext 0in;\r\npadding:0in\"> </span></strong></p><p style=\"margin: 0in 0in 0.0001pt; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; vertical-align: baseline;\"><span style=\"font-family: \"Source Sans Pro\", sans-serif; color: rgb(64, 64, 64); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Kegagalan menjadi biaya mahal dalam meraih\r\nkesuksesan. Dengan belajar dari ahlinya, anda bisa menghindarinya dan sukses di\r\nbisnis fotografi ini pun bisa diraih secara efektif, efisien dan lebih cepat.\r\nDaftar sekarang juga. Klik </span><strong style=\"outline: 0px;\"><span style=\"font-style: inherit; font-weight: inherit; outline: 0px;\"><span style=\"font-family: \"Source Sans Pro\", sans-serif; color: red; border: 1pt none windowtext; padding: 0in; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><a href=\"http://www.infocreativemedia.com/pendaftaran-online\" title=\"Pendaftaran Online Belajar Fotografi\" style=\"font-style: inherit; font-weight: inherit; outline: 0px; transition: all 700ms ease 0s; background-position: 0px 0px;\"><span style=\"color: purple;\">DISINI</span></a>, </span></span></strong><span style=\"font-family: \"Source Sans Pro\", sans-serif; color: rgb(64, 64, 64); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Peserta terbatas\r\ndan pendaftaran ditutup sewaktu-waktu. Anda mau mengikuti kursus </span><strong style=\"font-style: inherit; outline: 0px;\"><span style=\"font-family: \"Source Sans Pro\", sans-serif; color: rgb(153, 51, 102); border: 1pt none windowtext; padding: 0in; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"outline: 0px;\">Belajar Fotografi</span></span></strong><span style=\"font-family: \"Source Sans Pro\", sans-serif; color: rgb(64, 64, 64); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">, diskusikan dengan tim kreatif kami.</span><strong><span style=\"font-family:\"Source Sans Pro\",sans-serif;color:#993366;border:none windowtext 1.0pt;\r\nmso-border-alt:none windowtext 0in;padding:0in\"><o:p></o:p></span></strong></p><p style=\"margin: 0in 0in 0.0001pt; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; vertical-align: baseline;\"><strong><span style=\"font-family:\"Source Sans Pro\",sans-serif;\r\ncolor:#993366;border:none windowtext 1.0pt;mso-border-alt:none windowtext 0in;\r\npadding:0in\"> </span></strong></p><p style=\"margin: 0in 0in 0.0001pt; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; vertical-align: baseline;\"><span style=\"font-family:\"Source Sans Pro\",sans-serif;\r\ncolor:#404040\"> </span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><span style=\"font-family:\"Source Sans Pro\",sans-serif\"> </span></p>                ', 'upload/gambar/belajar-fotografi.jpg', '', 'Admin Creative Media', 'Admin Creative Media', '2019-02-12 13:06:20', '2019-03-25 20:40:56');
INSERT INTO `bidang_studi` (`id_studi`, `nama_studi`, `deskripsi`, `gambar`, `harga`, `created_by`, `updated_by`, `created_date`, `updated_date`) VALUES
(18, 'Pemrograman Dasar', '<div style=\"text-align: left; color: rgb(34, 34, 34);\" palatino=\"\" linotype\",=\"\" palatino,=\"\" serif;=\"\" font-size:=\"\" 15.4px;\"=\"\"><span style=\"font-family: \" trebuchet=\"\" ms\",=\"\" trebuchet,=\"\" sans-serif;=\"\" font-size:=\"\" 13px;\"=\"\">Pemrograman</span><span style=\"font-family: \" trebuchet=\"\" ms\",=\"\" trebuchet,=\"\" sans-serif;=\"\" font-size:=\"\" 13px;\"=\"\">&nbsp;adalah proses menulis, menguji dan memperbaiki (</span><i style=\"font-family: \" trebuchet=\"\" ms\",=\"\" trebuchet,=\"\" sans-serif;=\"\" font-size:=\"\" 13px;\"=\"\">debug</i><span style=\"font-family: \" trebuchet=\"\" ms\",=\"\" trebuchet,=\"\" sans-serif;=\"\" font-size:=\"\" 13px;\"=\"\">), dan memelihara kode yang membangun sebuah program komputer</span><span style=\"font-family: \" trebuchet=\"\" ms\",=\"\" trebuchet,=\"\" sans-serif;=\"\" font-size:=\"\" 13px;\"=\"\">. Kode ini ditulis dalam berbagai bahasa pemrograman</span><span style=\"font-family: \" trebuchet=\"\" ms\",=\"\" trebuchet,=\"\" sans-serif;=\"\" font-size:=\"\" 13px;\"=\"\">. Tujuan dari pemrograman adalah untuk memuat suatu program yang dapat melakukan suatu perhitungan atau \'pekerjaan\' sesuai dengan keinginan si pemrogram (programmer). Untuk dapat melakukan pemrograman, diperlukan keterampilan dalam&nbsp;</span><span style=\"color: black;\"><span style=\"font-family: \" trebuchet=\"\" ms\",=\"\" trebuchet,=\"\" sans-serif;\"=\"\"><span style=\"font-size: 13px;\">algoritma</span></span><span style=\"font-family: \" trebuchet=\"\" ms\",=\"\" trebuchet,=\"\" sans-serif;=\"\" font-size:=\"\" 13px;\"=\"\">,&nbsp;</span><span style=\"font-family: \" trebuchet=\"\" ms\",=\"\" trebuchet,=\"\" sans-serif;\"=\"\"><span style=\"font-size: 13px;\">logika, bahasa pemrograman</span></span></span><span style=\"font-family: \" trebuchet=\"\" ms\",=\"\" trebuchet,=\"\" sans-serif;=\"\" font-size:=\"\" 13px;\"=\"\">, dan di banyak kasus, pengetahuan-pengetahuan lain seperti matematika</span><span style=\"font-family: \" trebuchet=\"\" ms\",=\"\" trebuchet,=\"\" sans-serif;=\"\" font-size:=\"\" 13px;\"=\"\">.</span></div><div style=\"\"><div style=\"text-align: left;\"><font color=\"#222222\" face=\"Arial, Tahoma, Helvetica, FreeSans, sans-serif\"><span style=\"font-size: 13px;\"><br></span></font></div><span style=\"color: rgb(34, 34, 34); font-family: Arial, Tahoma, Helvetica, FreeSans, sans-serif; font-size: 13px;\" palatino=\"\" linotype\",=\"\" palatino,=\"\" serif;=\"\" font-size:=\"\" 15.4px;\"=\"\"><div style=\"text-align: left;\"><span trebuchet=\"\" ms\",=\"\" trebuchet,=\"\" sans-serif;=\"\" font-size:=\"\" 13px;\"=\"\">Pemrograman adalah sebuah seni dalam menggunakan satu atau lebih algoritma</span><span trebuchet=\"\" ms\",=\"\" trebuchet,=\"\" sans-serif;=\"\" font-size:=\"\" 13px;\"=\"\">&nbsp;yang saling berhubungan dengan menggunakan sebuah&nbsp;</span><span trebuchet=\"\" ms\",=\"\" trebuchet,=\"\" sans-serif;\"=\"\">bahasa pemrograman</span><span trebuchet=\"\" ms\",=\"\" trebuchet,=\"\" sans-serif;=\"\" font-size:=\"\" 13px;\"=\"\">&nbsp;tertentu sehingga menjadi sebuah program komputer. Bahasa pemrograman</span><span trebuchet=\"\" ms\",=\"\" trebuchet,=\"\" sans-serif;=\"\" font-size:=\"\" 13px;\"=\"\">&nbsp;yang berbeda mendukung gaya pemrograman yang berbeda pula. Gaya pemrograman ini biasa disebut paradigma pemrograman</span><span trebuchet=\"\" ms\",=\"\" trebuchet,=\"\" sans-serif;=\"\" font-size:=\"\" 13px;\"=\"\">.&nbsp;</span></div></span></div><div style=\"text-align: left; font-family: Arial, Tahoma, Helvetica, FreeSans, sans-serif; font-size: 13px; color: rgb(34, 34, 34);\"><span style=\"font-family: Georgia, Utopia, \" palatino=\"\" linotype\",=\"\" palatino,=\"\" serif;=\"\" font-size:=\"\" 15.4px;\"=\"\"><span style=\"font-family: \" trebuchet=\"\" ms\",=\"\" trebuchet,=\"\" sans-serif;=\"\" font-size:=\"\" 13px;\"=\"\">&nbsp; </span></span></div><div style=\"text-align: left; font-family: Arial, Tahoma, Helvetica, FreeSans, sans-serif; font-size: 13px; color: rgb(34, 34, 34);\"><span style=\"font-family: Georgia, Utopia, \" palatino=\"\" linotype\",=\"\" palatino,=\"\" serif;=\"\" font-size:=\"\" 15.4px;\"=\"\"><span style=\"font-family: \" trebuchet=\"\" ms\",=\"\" trebuchet,=\"\" sans-serif;=\"\" font-size:=\"\" 13px;\"=\"\">Pengertian Pemrograman&nbsp;</span><span style=\"font-family: \" trebuchet=\"\" ms\",=\"\" trebuchet,=\"\" sans-serif;=\"\" font-size:=\"\" 13px;\"=\"\">adalah</span><span style=\"font-family: \" trebuchet=\"\" ms\",=\"\" trebuchet,=\"\" sans-serif;=\"\" font-size:=\"\" 13px;\"=\"\">&nbsp;</span><span style=\"font-family: \" trebuchet=\"\" ms\",=\"\" trebuchet,=\"\" sans-serif;=\"\" font-size:=\"\" 13px;\"=\"\">suatu kumpulan urutan perintah ke komputer untuk mengerjakan sesuatu, dimana instruksi tersebut menggunakan bahasa yang dimengerti &nbsp;oleh komputer atau dikenal dengan bahasa pemrograman.</span></span><br></div>                ', 'upload/gambar/header-image-algoritma.jpg', '', 'Admin Creative Media', 'Admin Creative Media', '2019-02-19 15:51:31', '2019-02-19 16:07:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `calon_siswa`
--

CREATE TABLE `calon_siswa` (
  `id_siswa` int(255) NOT NULL,
  `no_registrasi` varchar(200) NOT NULL,
  `nama_depan` varchar(200) NOT NULL,
  `nama_belakang` varchar(200) NOT NULL,
  `jenis_kelamin` varchar(200) NOT NULL,
  `handphone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `status` varchar(200) NOT NULL,
  `bidang_studi` varchar(300) NOT NULL,
  `creted_by` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `judul` varchar(300) DEFAULT NULL,
  `created_by` varchar(200) NOT NULL,
  `updated_by` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL,
  `update_by` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `gambar`, `type`, `judul`, `created_by`, `updated_by`, `created_date`, `update_by`) VALUES
(5, 'upload/gambar/ruangan-ac.jpg', 'INFRASTRUKTUR', 'Ruangan Ber Ac', '', '', '2019-03-14 14:46:35', '0000-00-00 00:00:00'),
(6, 'upload/gambar/parkir.jpg', 'INFRASTRUKTUR', 'Tempat Parkir Luas', '', '', '2019-03-14 14:46:57', '0000-00-00 00:00:00'),
(7, 'upload/gambar/ruang-kelas1.jpg', 'INFRASTRUKTUR', 'Ruang Kelas', '', '', '2019-03-14 14:47:21', '0000-00-00 00:00:00'),
(8, 'upload/gambar/ruang-kelas2.jpg', 'INFRASTRUKTUR', 'Ruang Kelas 2', '', '', '2019-03-14 14:47:46', '0000-00-00 00:00:00'),
(10, 'upload/gambar/Bulpen.jpg', 'STARTER KIT', 'Bolpoin', '', '', '2019-03-14 09:55:18', '0000-00-00 00:00:00'),
(11, 'upload/gambar/Handbook.jpg', 'STARTER KIT', 'Handbook', 'Admin Creative Media', '', '2019-03-06 14:59:17', '0000-00-00 00:00:00'),
(12, 'upload/gambar/Mousepad.jpg', 'STARTER KIT', 'Mousepad', 'Admin Creative Media', '', '2019-03-06 14:59:32', '0000-00-00 00:00:00'),
(13, 'upload/gambar/Mug.jpg', 'STARTER KIT', 'Mug', 'Admin Creative Media', '', '2019-03-06 14:59:48', '0000-00-00 00:00:00'),
(14, 'upload/gambar/Note_Exclusive.jpg', 'STARTER KIT', 'Note Exclusive', 'Admin Creative Media', '', '2019-03-06 15:00:02', '0000-00-00 00:00:00'),
(15, 'upload/gambar/Tas_Spundbond.jpg', 'STARTER KIT', 'Tas Spundbond', 'Admin Creative Media', '', '2019-03-06 15:00:18', '0000-00-00 00:00:00'),
(16, 'upload/gambar/ruang_kelas3.jpg', 'INFRASTRUKTUR', 'Ruang Kelas 3', 'Admin Creative Media', '', '2019-03-14 14:48:26', '0000-00-00 00:00:00'),
(17, 'upload/gambar/ruang_tengah.jpg', 'INFRASTRUKTUR', 'Ruang Kelas 4', '', '', '2019-03-15 15:33:37', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas_tipe`
--

CREATE TABLE `fasilitas_tipe` (
  `id_tipe` int(11) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `updated_by` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fasilitas_tipe`
--

INSERT INTO `fasilitas_tipe` (`id_tipe`, `nama`, `created_by`, `updated_by`, `created_date`, `updated_date`) VALUES
(1, 'INFRASTRUKTUR', 'Admin Creative Media', '', '2018-11-28 09:42:25', '0000-00-00 00:00:00'),
(2, 'STARTER KIT', 'Admin Creative Media', 'Admin Creative Media', '2018-11-28 09:43:48', '2018-11-28 09:57:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `created_by` varchar(200) NOT NULL,
  `updated_by` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `gambar`, `judul`, `created_by`, `updated_by`, `created_date`, `updated_date`) VALUES
(3, 'upload/gambar/galleri2.jpg', 'Creative Media Goes Kampus', '', '', '2019-03-14 16:23:50', '0000-00-00 00:00:00'),
(4, 'upload/gambar/galleri3.jpg', 'Foto Bersama Mahasiswa Kampus UIN Surabaya', '', '', '2019-03-14 16:24:28', '0000-00-00 00:00:00'),
(5, 'upload/gambar/galleri4.jpg', 'Corporate Training BPOM Padang', '', '', '2019-03-14 16:26:00', '0000-00-00 00:00:00'),
(6, 'upload/gambar/foto_1.jpg', 'Corporate Training PT. Panasonic Industrial Devices Batam', '', '', '2019-03-14 16:26:25', '0000-00-00 00:00:00'),
(7, 'upload/gambar/galeri6.jpg', 'Creative Media Family Gathering 2018', '', '', '2019-03-15 15:38:19', '0000-00-00 00:00:00'),
(8, 'upload/gambar/galeri1.jpg', 'Corporate Training Fakultas Kedokteran Universitas Jember', 'Admin Creative Media', '', '2019-03-14 16:28:04', '0000-00-00 00:00:00'),
(9, 'upload/gambar/galeri_3a.jpg', 'Corporate Training Bagian Humas dan Protokol Kota Kediri', '', '', '2019-03-15 15:26:55', '0000-00-00 00:00:00'),
(10, 'upload/gambar/galeri5.jpg', 'Corporate Training PT. Pupuk Kalimantan Timur', 'Admin Creative Media', '', '2019-03-14 16:29:39', '0000-00-00 00:00:00'),
(11, 'upload/gambar/Halal-Bihalal--Gathering-2017.jpg', 'Creative Media Halal Bihalal & Gathering 2017', '', '', '2019-03-15 15:39:30', '0000-00-00 00:00:00'),
(12, 'upload/gambar/DSC00136.jpg', 'Corporate Training Programming PT. Jawa Pos Koran', '', '', '2019-03-15 15:48:02', '0000-00-00 00:00:00'),
(13, 'upload/gambar/DSC00325.jpg', 'Corporate Training Bea & Cukai Juanda Surabaya', 'Admin Creative Media', '', '2019-03-15 15:33:38', '0000-00-00 00:00:00'),
(14, 'upload/gambar/DSC00272.jpg', 'Kursus Privat Photography', '', '', '2019-03-15 15:51:52', '0000-00-00 00:00:00'),
(15, 'upload/gambar/11.jpg', 'Corporate Training PT Surabaya Autocom Indonesia', 'Admin Creative Media', '', '2019-03-15 15:34:54', '0000-00-00 00:00:00'),
(16, 'upload/gambar/gambar_sarana_prima.jpg', 'Corporate Training \" Administrasi Perkantoran\" PT Black woods', 'Admin Creative Media', '', '2019-03-15 15:36:48', '0000-00-00 00:00:00'),
(17, 'upload/gambar/unair.jpg', 'Training \"Programming Java Android\" Kampus Unair', '', '', '2019-03-15 15:46:45', '0000-00-00 00:00:00'),
(18, 'upload/gambar/DSC01160.JPG', 'Corporate Training Suara Surabaya (SS)', 'Admin Creative Media', '', '2019-03-15 15:39:03', '0000-00-00 00:00:00'),
(19, 'upload/gambar/studi_kasus.jpg', 'Corporate Training \" Editing Video\" BPPOM Padang', 'Admin Creative Media', '', '2019-03-15 15:40:25', '0000-00-00 00:00:00'),
(20, 'upload/gambar/DSC01408.JPG', 'Corporate Training \"Programming Java Android\" BP Batam', '', '', '2019-03-15 15:43:28', '0000-00-00 00:00:00'),
(21, 'upload/gambar/tabalong.jpg', 'Corporate Training \" Pemrograman Web\" Pemda Kabupaten Tabalong', '', '', '2019-03-15 15:43:28', '0000-00-00 00:00:00'),
(22, 'upload/gambar/UMKM.jpg', 'Corporate Training \"Programming Web\" Bank UMKM Jawa Timur', '', '', '2019-03-15 15:49:03', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `grup`
--

CREATE TABLE `grup` (
  `grup_id` int(10) NOT NULL,
  `nama_grup` varchar(300) NOT NULL,
  `deskripsi` varchar(300) NOT NULL,
  `last_created_date` datetime NOT NULL,
  `last_update_date` datetime NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `last_update_by` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `grup`
--

INSERT INTO `grup` (`grup_id`, `nama_grup`, `deskripsi`, `last_created_date`, `last_update_date`, `created_by`, `last_update_by`) VALUES
(1, 'Super Admin', 'Full Akses', '0000-00-00 00:00:00', '2019-01-25 15:37:42', '', 'Admin Creative Media'),
(3, 'Divisi CSO', 'Akses Terbatas', '2019-05-07 10:14:23', '2021-08-06 01:31:53', 'Admin Creative Media', 'Admin Creative Media'),
(4, 'Divisi Artikel & Konten', 'Akses Terbatas', '2019-05-07 10:21:21', '2021-08-06 01:32:14', 'Admin Creative Media', 'Admin Creative Media'),
(5, 'Divisi HRD', 'Akses Terbatas', '2019-05-07 14:00:31', '2021-08-06 01:31:34', 'Admin Creative Media', 'Admin Creative Media');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hari`
--

CREATE TABLE `hari` (
  `id_hari` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hari`
--

INSERT INTO `hari` (`id_hari`, `nama`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jumat'),
(6, 'Sabtu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `siswa` varchar(200) NOT NULL,
  `hari` varchar(200) NOT NULL,
  `jam` text NOT NULL,
  `jam2` text NOT NULL,
  `trainer` varchar(200) NOT NULL,
  `studi` varchar(200) NOT NULL,
  `pertemuan` varchar(300) NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `updated_by` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `status` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `timestamp_demo` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `siswa`, `hari`, `jam`, `jam2`, `trainer`, `studi`, `pertemuan`, `created_by`, `updated_by`, `created_date`, `updated_date`, `status`, `tanggal`, `timestamp_demo`) VALUES
(1, 'Nadiviansyah  Prizaldy P', 'Sabtu', '08.00-10.00', '', 'Pak Frangky', 'Pemrograman Web', '3', 'Admin Creative Media', '', '2019-03-23 11:06:53', '0000-00-00 00:00:00', 'Sedang Berjalan', '2019-03-23', '2019-03-23 04:06:53'),
(2, 'FITRI  sa', 'Rabu', '09.00-11.00', '', 'Pak M. Akbar B.', 'Administrasi Perkantoran', '5', 'Admin Creative Media', '', '2019-04-01 15:40:27', '0000-00-00 00:00:00', 'Sedang Berjalan', '2019-04-01', '2019-04-01 08:40:27'),
(3, 'natasha karina hariyono', 'Rabu,Sabtu', '19.00-21.00,13.00-15.00', '', 'Pak Putra Aditya', 'Desain Interior', '3', 'Admin Creative Media', 'Admin Creative Media', '2019-04-08 09:58:05', '2019-04-09 14:37:50', 'Sedang Berjalan', '2019-04-08', '2019-04-09 07:37:50'),
(4, 'Rini Rahmawati ', 'Senin,Rabu,Kamis', '08.00,09.00,10.00', '', 'Pak Romi Amirul Hakim', 'Komputer Akuntansi', '1', 'CSO Tubanan', '', '2021-08-06 03:15:53', '0000-00-00 00:00:00', 'Sedang Berjalan', '2021-08-06', '2021-08-06 03:15:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo` varchar(300) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`username`, `password`, `photo`, `tipe`, `nama`, `status`) VALUES
('addin', 'addin', '', 'trainer', 'Pak Addin Firdaus Y.', 'Aktif'),
('agung', 'agung', '', 'trainer', 'Pak Agung Arief Perdana P', 'Aktif'),
('Aisyah', 'aisyah', '', 'trainer', 'Bu Aisyah', 'Aktif'),
('akbar', 'akbar', '', 'trainer', 'Pak M. Akbar B.', 'Aktif'),
('ali', 'ali', '', 'trainer', 'Pak Ali', 'Aktif'),
('Anggun', 'anggun', '', 'trainer', 'Bu Anggun', 'Aktif'),
('arfian', 'arfian', '', 'trainer', 'Pak Arfian Bagus Nurmajis', 'Aktif'),
('arif', 'arif', '', 'trainer', 'Pak Agus Nanang Arif Efendi', 'Aktif'),
('bagas', 'bagas', '', 'trainer', 'Pak Bagas Grenadega', 'Aktif'),
('CM11201900100', '', '', 'siswa', 'febyoktariawan ', 'Belum Aktif'),
('CM12201900100', 'rinirahmawati', 'upload/user/no-profile.jpg', 'siswa', 'Rini Rahmawati ', 'Aktif'),
('CM2019001', 'admin', 'upload/gambar/affb74e01e7df76900cb576fbfc363d0.jpg', 'siswa', 'Hadi Sisyanto', 'Aktif'),
('cm2019002', 'toni', 'upload/gambar/424903f12ef13c9ee3493ef0624e6af9.jpg', 'siswa', 'Fatoni AE', 'Aktif'),
('CM2019005', 'vietnam359', 'upload/gambar/0fdfcd21caf7995904f29c0c05a27191.jpg', 'siswa', 'Nadiviansyah  Prizaldy P', 'Aktif'),
('CM2019006', '', '', 'siswa', 'nurhuda saputra', 'Belum Aktif'),
('CM2019007', 'natasha', 'upload/user/no-profile.jpg', 'siswa', 'natasha karina hariyono', 'Aktif'),
('CM2019008', 'fitri', 'upload/user/no-profile.jpg', 'siswa', 'FITRI  sa', 'Aktif'),
('CM2019009', '', '', 'siswa', 'verawati santoso', 'Belum Aktif'),
('CM2019010', '', '', 'siswa', 'AZMIL KHOIROH ', 'Belum Aktif'),
('CM2019011', '', '', 'siswa', 'Ganesha Alfian', 'Belum Aktif'),
('CM2019012', '', '', 'siswa', 'Garri Nacov', 'Belum Aktif'),
('CM2019013', '', '', 'siswa', 'Fatimah Azzahra', 'Belum Aktif'),
('CM2019014', '', '', 'siswa', 'Fathur Rahman', 'Belum Aktif'),
('CM2019015', '', '', 'siswa', 'Deni Kurniawan', 'Belum Aktif'),
('CM2019016', '', '', 'siswa', 'Hafid Aksani', 'Belum Aktif'),
('CM2019017', '', '', 'siswa', 'Krisnanto Soenjoto', 'Belum Aktif'),
('CM2019018', '', '', 'siswa', 'Trivena Melawati', 'Belum Aktif'),
('CM2019019', '', '', 'siswa', 'Elsa Hutabarat', 'Belum Aktif'),
('CM2019020', '', '', 'siswa', 'Badru Rojak', 'Belum Aktif'),
('CM2019021', '', '', 'siswa', 'Zaki Afiakh', 'Belum Aktif'),
('CM2019022', '', '', 'siswa', 'Dika  ', 'Belum Aktif'),
('CM2019023', '', '', 'siswa', 'Sarmadi Saryono', 'Belum Aktif'),
('CM2019024', '', '', 'siswa', 'Eko Nur Hidayat', 'Belum Aktif'),
('CM2019025', '', '', 'siswa', 'Fitri Wulandari', 'Belum Aktif'),
('CM2019026', '', '', 'siswa', 'Ardin Yahya', 'Belum Aktif'),
('CM2019027', '', '', 'siswa', 'Hendrik Supriyadi', 'Belum Aktif'),
('CM2019028', '', '', 'siswa', 'Boni Clinton Panjaitan', 'Belum Aktif'),
('CM2019029', '', '', 'siswa', 'Mokhammad Happy Taufiq', 'Belum Aktif'),
('CM2019030', '', '', 'siswa', 'Septian Adi Herlambang', 'Belum Aktif'),
('CM2019031', '', '', 'siswa', 'Alfina Rahmawati', 'Belum Aktif'),
('CM2019032', '', '', 'siswa', 'Aden  Syahwira Prasandotama', 'Belum Aktif'),
('CM2019033', '', '', 'siswa', 'Gede  suarda', 'Belum Aktif'),
('CM2019034', '', '', 'siswa', 'shinta  yasmien gunawan', 'Belum Aktif'),
('CM2019035', '', '', 'siswa', 'Lukman  Hakim', 'Belum Aktif'),
('CM2019036', '', '', 'siswa', 'Taffy  Hermando', 'Belum Aktif'),
('CM2019037', '', '', 'siswa', 'Helmi  Tanthawi', 'Belum Aktif'),
('CM2019038', '', '', 'siswa', 'Wira Sakti', 'Belum Aktif'),
('CM2019039', '', '', 'siswa', 'jihan  elshadat', 'Belum Aktif'),
('CM2019040', '', '', 'siswa', 'Ocha  Wahida Karuniasari', 'Belum Aktif'),
('CM2019041', '', '', 'siswa', 'Didik  Setiawan', 'Belum Aktif'),
('CM2019042', '', '', 'siswa', 'Rizal  Fachri', 'Belum Aktif'),
('CM2019043', '', '', 'siswa', 'Dani  Santoso', 'Belum Aktif'),
('CM2019044', '', '', 'siswa', 'hadziq  kharisma farrell', 'Belum Aktif'),
('CM2019045', '', '', 'siswa', 'robby  usman sugara', 'Belum Aktif'),
('CM2019046', '', '', 'siswa', 'Dara Umi', 'Belum Aktif'),
('CM2019047', '', '', 'siswa', 'Gadmon  Victor Gunardi', 'Belum Aktif'),
('CM2019048', '', '', 'siswa', 'basyasyah  nabilah', 'Belum Aktif'),
('CM2019049', '', '', 'siswa', 'Mochamad  Sofi Maulana', 'Belum Aktif'),
('CM2019050', '', '', 'siswa', 'Amri  Munthe', 'Belum Aktif'),
('CM2019051', '', '', 'siswa', 'Moh  Solihin', 'Belum Aktif'),
('CM2019052', '', '', 'siswa', 'Kevin  Andryanto', 'Belum Aktif'),
('CM2019053', '', '', 'siswa', 'dewantami  putri pertiwi', 'Belum Aktif'),
('CM2019054', '', '', 'siswa', 'Azhar  Muh', 'Belum Aktif'),
('CM2019055', '', '', 'siswa', 'Suheri  Syahputra', 'Belum Aktif'),
('CM2019056', '', '', 'siswa', 'Abhirama  Saputra', 'Belum Aktif'),
('CM2019057', '', '', 'siswa', 'Muthia  Nur amalina', 'Belum Aktif'),
('CM2019058', '', '', 'siswa', 'Agatha  Anggraini', 'Belum Aktif'),
('CM2019059', '', '', 'siswa', 'Nafis  Umara', 'Belum Aktif'),
('CM2019060', '', '', 'siswa', 'eko  ismiyanti', 'Belum Aktif'),
('CM2019061', '', '', 'siswa', 'Lalu  Andi ', 'Belum Aktif'),
('CM2019062', '', '', 'siswa', 'rima  yuni pratiwi', 'Belum Aktif'),
('CM2019063', '', '', 'siswa', 'Achmad Affandy Letto', 'Belum Aktif'),
('CM2019064', '', '', 'siswa', 'Ade Koto', 'Belum Aktif'),
('CM2019065', '', '', 'siswa', 'Fadella  Yulnidar', 'Belum Aktif'),
('CM2019066', '', '', 'siswa', 'Zanuar  Wibi', 'Belum Aktif'),
('CM2019067', '', '', 'siswa', 'didha  leksana', 'Belum Aktif'),
('CM2019068', '', '', 'siswa', 'Suleman  Husain', 'Belum Aktif'),
('CM2019069', '', '', 'siswa', 'Alkausar  Delpiero', 'Belum Aktif'),
('CM2019070', '', '', 'siswa', 'Etik  Kurniawati', 'Belum Aktif'),
('CM2019071', '', '', 'siswa', 'Fauzan  Ilhami', 'Belum Aktif'),
('CM2019072', '', '', 'siswa', 'Reno  Sari', 'Belum Aktif'),
('CM2019073', '', '', 'siswa', 'shokib  shokib', 'Belum Aktif'),
('CM2019074', '', '', 'siswa', 'Yogo  Baskoro', 'Belum Aktif'),
('CM2019075', '', '', 'siswa', 'slamet  supriadi', 'Belum Aktif'),
('CM2019076', '', '', 'siswa', 'Muhammad  Anggi S', 'Belum Aktif'),
('CM2019077', '', '', 'siswa', 'Ulfatul  Laily', 'Belum Aktif'),
('CM2019078', '', '', 'siswa', 'Bayu  Aji Priambodo', 'Belum Aktif'),
('CM2019079', '', '', 'siswa', 'Mohammad  Zultoni', 'Belum Aktif'),
('CM2019080', '', '', 'siswa', 'Jessica  Octoberia', 'Belum Aktif'),
('CM2019081', '', '', 'siswa', 'Jessica  Octoberia', 'Belum Aktif'),
('CM2019082', '', '', 'siswa', 'Muhammad  rizky Irsandi', 'Belum Aktif'),
('CM2019083', '', '', 'siswa', 'ali  adit', 'Belum Aktif'),
('CM2019084', '', '', 'siswa', 'Angga  Yulianto', 'Belum Aktif'),
('CM2019085', '', '', 'siswa', 'Wahyu  Budi Adi Kurniawan', 'Belum Aktif'),
('CM2019086', '', '', 'siswa', 'Amalia  Reskiana', 'Belum Aktif'),
('CM2019087', '', '', 'siswa', 'Ivana  Via', 'Belum Aktif'),
('CM2019088', '', '', 'siswa', 'Gunawan  Yoga', 'Belum Aktif'),
('CM2019089', '', '', 'siswa', 'MUHAMMAD  MUZAKKI', 'Belum Aktif'),
('CM2019090', '', '', 'siswa', 'sadri  talib', 'Belum Aktif'),
('CM2019091', '', '', 'siswa', 'sadri  talib', 'Belum Aktif'),
('CM2019092', '', '', 'siswa', 'Zikry  Drajad Syahputra', 'Belum Aktif'),
('CM2019093', '', '', 'siswa', 'Novia  Indah', 'Belum Aktif'),
('CM2019094', '', '', 'siswa', 'lisa  rosalina', 'Belum Aktif'),
('CM2019095', '', '', 'siswa', 'Endrostil  Aditya', 'Belum Aktif'),
('CM2019097', '', '', 'siswa', 'koral  komunity', 'Belum Aktif'),
('CM2019098', '', '', 'siswa', 'Rista  Nadia Jasmine', 'Belum Aktif'),
('CM2019099', '', '', 'siswa', 'Asep  ', 'Belum Aktif'),
('CM2019100', '', '', 'siswa', 'Florentina  Wawolangi', 'Belum Aktif'),
('CM20191000', '', '', 'siswa', 'Stefanie  Hadi', 'Belum Aktif'),
('CM2019101', '', '', 'siswa', 'Kurniawan  Sidarta', 'Belum Aktif'),
('CM20191010000', '', '', 'siswa', 'Ratu  Ogi', 'Belum Aktif'),
('CM2019102', '', '', 'siswa', 'Zaim  fahry', 'Belum Aktif'),
('CM2019103', '', '', 'siswa', 'Yonatan  Wicaksono', 'Belum Aktif'),
('CM2019104', '', '', 'siswa', 'Yohanes  didik setiawan', 'Belum Aktif'),
('CM2019105', '', '', 'siswa', 'EKO  EFFENDI', 'Belum Aktif'),
('CM2019106', '', '', 'siswa', 'su  mantri', 'Belum Aktif'),
('CM2019107', '', '', 'siswa', 'Moch  Imron Syahroni', 'Belum Aktif'),
('CM2019108', '', '', 'siswa', 'Anastasia  Rosalind', 'Belum Aktif'),
('CM2019109', '', '', 'siswa', 'Asvarita  Yasmena Andalusia', 'Belum Aktif'),
('CM20191091001', '', '', 'siswa', 'saiful  rohman', 'Belum Aktif'),
('CM20191091002', '', '', 'siswa', 'Bimasakti  ', 'Belum Aktif'),
('CM20191091003', '', '', 'siswa', 'Fadhilah Adam', 'Belum Aktif'),
('CM20191091004', '', '', 'siswa', 'Fauzi  Alkautsar', 'Belum Aktif'),
('CM20191091005', '', '', 'siswa', 'ollan  kerans', 'Belum Aktif'),
('CM20191091006', '', '', 'siswa', 'felix  abdullah', 'Belum Aktif'),
('CM20191091007', '', '', 'siswa', 'Siti Umayah', 'Belum Aktif'),
('CM20191091008', '', '', 'siswa', 'Shofa  Nur aidah', 'Belum Aktif'),
('CM20191091009', '', '', 'siswa', 'Mochamad Ilmi', 'Belum Aktif'),
('CM20191091010', '', '', 'siswa', 'M Eko  Prasetyo', 'Belum Aktif'),
('CM20191091011', '', '', 'siswa', 'Agus  Setiawan', 'Belum Aktif'),
('CM20191091012', '', '', 'siswa', 'Tri Afaid', 'Belum Aktif'),
('CM20191091013', '', '', 'siswa', 'Marilyn  Regina', 'Belum Aktif'),
('CM20191091014', '', '', 'siswa', 'Cintya Wibowo', 'Belum Aktif'),
('CM20191091015', '', '', 'siswa', 'Andre citra  Atmaja', 'Belum Aktif'),
('CM20191091016', '', '', 'siswa', 'Djuniarto  Djun', 'Belum Aktif'),
('CM20191091017', '', '', 'siswa', 'YUL  ADRIANSYAH', 'Belum Aktif'),
('CM20191091018', '', '', 'siswa', 'Pangestuning Gusti', 'Belum Aktif'),
('CM20191091019', '', '', 'siswa', 'hilmi  alawiyah', 'Belum Aktif'),
('CM20191091020', '', '', 'siswa', 'Luh Widiastuti', 'Belum Aktif'),
('CM20191091021', '', '', 'siswa', 'Pita  ', 'Belum Aktif'),
('CM20191091022', '', '', 'siswa', 'Marselinus Saputra', 'Belum Aktif'),
('CM20191091023', '', '', 'siswa', 'Jordy Predon', 'Belum Aktif'),
('CM20191091024', '', '', 'siswa', 'Katerina  ', 'Belum Aktif'),
('CM20191091025', '', '', 'siswa', 'Nur Ubaydillah', 'Belum Aktif'),
('CM20191091026', '', '', 'siswa', 'Ahmad  ', 'Belum Aktif'),
('CM20191091027', '', '', 'siswa', 'Adrian  ', 'Belum Aktif'),
('CM20191091028', '', '', 'siswa', 'Rufita Hardiantoroputro', 'Belum Aktif'),
('CM20191091029', '', '', 'siswa', 'Evarista  ', 'Belum Aktif'),
('CM20191091030', '', '', 'siswa', 'Jessica Mandy', 'Belum Aktif'),
('CM20191091031', '', '', 'siswa', 'Ari Sudibyo', 'Belum Aktif'),
('CM20191091032', '', '', 'siswa', 'Satria  Purwadana', 'Belum Aktif'),
('CM20191091033', '', '', 'siswa', 'Michelle Theorissa', 'Belum Aktif'),
('CM20191091034', '', '', 'siswa', 'Ridho  Febri', 'Belum Aktif'),
('CM20191091035', '', '', 'siswa', 'bagus  wichaksono', 'Belum Aktif'),
('CM20191091036', '', '', 'siswa', 'Mahardina Putri', 'Belum Aktif'),
('CM20191091037', '', '', 'siswa', 'kalvin   gea', 'Belum Aktif'),
('CM20191091038', '', '', 'siswa', 'Hanifa  ', 'Belum Aktif'),
('CM20191091039', '', '', 'siswa', 'yudha  ', 'Belum Aktif'),
('CM20191091040', '', '', 'siswa', 'Danny Wijayanto', 'Belum Aktif'),
('CM20191091041', '', '', 'siswa', 'Aji Laksono', 'Belum Aktif'),
('CM20191091042', '', '', 'siswa', 'eri  ', 'Belum Aktif'),
('CM20191091043', '', '', 'siswa', 'daniel  ', 'Belum Aktif'),
('CM20191091044', '', '', 'siswa', 'dewi  ', 'Belum Aktif'),
('CM20191091045', '', '', 'siswa', 'erdyan  gilang', 'Belum Aktif'),
('CM20191091046', '', '', 'siswa', 'Daud  Waluyo', 'Belum Aktif'),
('CM20191091047', '', '', 'siswa', 'samsul  hidayat', 'Belum Aktif'),
('CM20191091048', '', '', 'siswa', 'Ghani Latifah', 'Belum Aktif'),
('CM20191091049', '', '', 'siswa', 'Deby Kukuh  Setiawan', 'Belum Aktif'),
('CM20191091050', '', '', 'siswa', 'Nency  Prafitasari', 'Belum Aktif'),
('CM20191091051', '', '', 'siswa', 'Hera Ginawati', 'Belum Aktif'),
('CM20191091052', '', '', 'siswa', 'Avira  Restyanti', 'Belum Aktif'),
('CM20191091053', '', '', 'siswa', 'gilang  permana', 'Belum Aktif'),
('CM20191091054', '', '', 'siswa', 'Margareth Tuasun', 'Belum Aktif'),
('CM20191091055', '', '', 'siswa', 'Mutiara  Ningrum', 'Belum Aktif'),
('CM20191091056', '', '', 'siswa', 'Wan  Fitri', 'Belum Aktif'),
('CM20191091057', '', '', 'siswa', 'muhammad  miftachuddin', 'Belum Aktif'),
('CM20191091058', '', '', 'siswa', 'Hilmi  Yahya', 'Belum Aktif'),
('CM20191091059', '', '', 'siswa', 'bayu  susilo', 'Belum Aktif'),
('CM20191091060', '', '', 'siswa', 'Luandre  Ezra', 'Belum Aktif'),
('CM20191091061', '', '', 'siswa', 'Slamet Margono', 'Belum Aktif'),
('CM20191091062', '', '', 'siswa', 'Slamet Margono', 'Belum Aktif'),
('CM20191091063', '', '', 'siswa', 'try  kamal', 'Belum Aktif'),
('CM20191091064', '', '', 'siswa', 'Uji  Parhani', 'Belum Aktif'),
('CM20191091065', '', '', 'siswa', 'Ester Mince', 'Belum Aktif'),
('CM20191091066', '', '', 'siswa', 'Ester Mince', 'Belum Aktif'),
('CM20191091067', '', '', 'siswa', 'Yudhis Thiro  Kabul Yunior', 'Belum Aktif'),
('CM20191091068', '', '', 'siswa', 'Dewa  Putranto', 'Belum Aktif'),
('CM20191091069', '', '', 'siswa', 'Indra Anarendra', 'Belum Aktif'),
('CM20191091070', '', '', 'siswa', 'Fitri  Kushandayani', 'Belum Aktif'),
('CM20191091071', '', '', 'siswa', 'Mochammad Dicky  Perdana Putra ', 'Belum Aktif'),
('CM20191091072', '', '', 'siswa', 'Jessen Ang', 'Belum Aktif'),
('CM20191091073', '', '', 'siswa', 'Bismo Firmanto', 'Belum Aktif'),
('CM20191091074', '', '', 'siswa', 'Prahastuti  margi Cahyani', 'Belum Aktif'),
('CM20191091075', '', '', 'siswa', 'Fairuz Mahira', 'Belum Aktif'),
('CM20191091076', '', '', 'siswa', 'Jessen Ang', 'Belum Aktif'),
('CM20191091077', '', '', 'siswa', 'Ichsani  M. Ilham', 'Belum Aktif'),
('CM20191091078', '', '', 'siswa', 'Leny Puspitasari', 'Belum Aktif'),
('CM20191091079', '', '', 'siswa', 'nurul  faria', 'Belum Aktif'),
('CM20191091080', '', '', 'siswa', 'Syarifudin Arifianto', 'Belum Aktif'),
('CM20191091081', '', '', 'siswa', 'dimas  aryosudarono', 'Belum Aktif'),
('CM20191091082', '', '', 'siswa', 'Yetik Kusumanigrum', 'Belum Aktif'),
('CM20191091083', '', '', 'siswa', 'Luthfian Perdana', 'Belum Aktif'),
('CM20191091084', '', '', 'siswa', 'Rinda Maylesta', 'Belum Aktif'),
('CM20191091085', '', '', 'siswa', 'Suhariono -', 'Belum Aktif'),
('CM20191091086', '', '', 'siswa', 'Ghalih  Sugihantoro', 'Belum Aktif'),
('CM20191091087', '', '', 'siswa', 'Grace Natasha', 'Belum Aktif'),
('CM20191091088', '', '', 'siswa', 'Myron  Widyanata', 'Belum Aktif'),
('CM20191091089', '', '', 'siswa', 'Erik Estrada', 'Belum Aktif'),
('CM20191091090', '', '', 'siswa', 'Siti Komariyah', 'Belum Aktif'),
('CM20191091091', '', '', 'siswa', 'Aji Pratmojo', 'Belum Aktif'),
('CM20191091092', '', '', 'siswa', 'William Richard  L I', 'Belum Aktif'),
('CM20191091093', '', '', 'siswa', 'Rendy Arbani', 'Belum Aktif'),
('CM20191091094', '', '', 'siswa', 'Muhammad Febrian', 'Belum Aktif'),
('CM20191091095', '', '', 'siswa', 'Yoga Hadi', 'Belum Aktif'),
('CM20191091096', '', '', 'siswa', 'Thomas  Santoso', 'Belum Aktif'),
('CM20191091097', '', '', 'siswa', 'kalvin  gea', 'Belum Aktif'),
('CM20191091098', '', '', 'siswa', 'Ferry Saputra', 'Belum Aktif'),
('CM20191091099', '', '', 'siswa', 'Achmad  Chumaidi', 'Belum Aktif'),
('CM20191091100', '', '', 'siswa', 'Ayyash Al Qaradhani', 'Belum Aktif'),
('CM20191091101', '', '', 'siswa', 'Royce Ferio', 'Belum Aktif'),
('CM20191091102', '', '', 'siswa', 'Yudi Murcahyo', 'Belum Aktif'),
('CM20191091103', '', '', 'siswa', 'Amelia Subiakto', 'Belum Aktif'),
('CM20191091104', '', '', 'siswa', 'Sean Andrew Valentino D', 'Belum Aktif'),
('CM20191091105', '', '', 'siswa', 'diannisius damis', 'Belum Aktif'),
('CM20191091106', '', '', 'siswa', 'Slamet  Ashari', 'Belum Aktif'),
('CM20191091107', '', '', 'siswa', 'Hari Prasetyo', 'Belum Aktif'),
('CM20191091108', '', '', 'siswa', 'Royce Ferio', 'Belum Aktif'),
('CM20191091109', '', '', 'siswa', 'Azhari Muttaqien', 'Belum Aktif'),
('CM20191091110', '', '', 'siswa', 'Muhammad Ramadhan', 'Belum Aktif'),
('CM20191091111', '', '', 'siswa', 'Andri   Susanto', 'Belum Aktif'),
('CM20191091112', '', '', 'siswa', 'Putri Permatasari', 'Belum Aktif'),
('CM20191091113', '', '', 'siswa', 'Lisania  ayu', 'Belum Aktif'),
('CM20191091114', '', '', 'siswa', 'UBAIDILLAH  AFIF', 'Belum Aktif'),
('CM20191091116', '', '', 'siswa', 'Fiqo Tsavandho', 'Belum Aktif'),
('CM20191091117', '', '', 'siswa', 'leni  diana', 'Belum Aktif'),
('CM20191091118', '', '', 'siswa', 'Ali Azyumardi  Azra', 'Belum Aktif'),
('CM20191091119', '', '', 'siswa', 'Carolina Katrin', 'Belum Aktif'),
('CM20191091120', '', '', 'siswa', 'Mochamad Mashudi', 'Belum Aktif'),
('CM20191091121', '', '', 'siswa', 'Gabriel ebangseli', 'Belum Aktif'),
('CM20191091122', '', '', 'siswa', 'putri   kurniasih', 'Belum Aktif'),
('CM20191091123', '', '', 'siswa', 'Asep  Rudin', 'Belum Aktif'),
('CM20191091124', '', '', 'siswa', 'DIPATRIA  NUSWANTORO', 'Belum Aktif'),
('CM20191091125', '', '', 'siswa', 'habi  bullah', 'Belum Aktif'),
('CM20191091126', '', '', 'siswa', 'Herru  Prastyo', 'Belum Aktif'),
('CM20191091127', '', '', 'siswa', 'bagus  wichaksono', 'Belum Aktif'),
('CM20191091128', '', '', 'siswa', 'Alvian  Rio', 'Belum Aktif'),
('CM20191091129', '', '', 'siswa', 'rofiqoh  permata sari ', 'Belum Aktif'),
('CM20191091130', '', '', 'siswa', 'I Gusti  Bagus Suteja', 'Belum Aktif'),
('CM20191091131', '', '', 'siswa', 'Ridho  Febri', 'Belum Aktif'),
('CM20191091132', '', '', 'siswa', 'MOCHAMAD  ARDIANSYAH', 'Belum Aktif'),
('CM20191091133', '', '', 'siswa', 'hepriyanto indra  Sumatra asnar ', 'Belum Aktif'),
('CM20191091134', '', '', 'siswa', 'Rusman  Hartono', 'Belum Aktif'),
('CM20191091135', '', '', 'siswa', 'riki steinli  faot', 'Belum Aktif'),
('CM20191091136', '', '', 'siswa', 'Khasanul   Ilmi', 'Belum Aktif'),
('CM20191091137', '', '', 'siswa', 'Nadia  Nur', 'Belum Aktif'),
('CM20191091138', '', '', 'siswa', ' riza  ali fikri', 'Belum Aktif'),
('CM20191091139', '', '', 'siswa', 'Jitro  Behuku', 'Belum Aktif'),
('CM20191091140', '', '', 'siswa', 'jessica  selestina ', 'Belum Aktif'),
('CM20191091141', '', '', 'siswa', 'budianto  budi', 'Belum Aktif'),
('CM20191091142', '', '', 'siswa', 'Joko  Kartiko', 'Belum Aktif'),
('CM20191091143', '', '', 'siswa', 'SIMON RAMLAN  TINAMBUNAN', 'Belum Aktif'),
('CM20191091144', '', '', 'siswa', 'Arif  Setiawan', 'Belum Aktif'),
('CM20191091145', '', '', 'siswa', 'Moch Khoirul  Anam', 'Belum Aktif'),
('CM20191091146', '', '', 'siswa', 'Fradina Sri  Oktaviani', 'Belum Aktif'),
('CM20191091147', '', '', 'siswa', 'Natasha Hariyono', 'Belum Aktif'),
('CM20191091148', '', '', 'siswa', 'MAYA  PRISTANTY', 'Belum Aktif'),
('CM20191091149', '', '', 'siswa', 'Dearmando Purba', 'Belum Aktif'),
('CM20191091150', '', '', 'siswa', 'Satria  Purwadana', 'Belum Aktif'),
('CM20191091151', '', '', 'siswa', 'Anindya Estralita', 'Belum Aktif'),
('CM20191091152', '', '', 'siswa', 'Handy  Satri', 'Belum Aktif'),
('CM20191091153', '', '', 'siswa', 'PRASETYO  HARI PURWANTO ', 'Belum Aktif'),
('CM20191091154', '', '', 'siswa', 'harta gunawan  ricky tanuwijaya', 'Belum Aktif'),
('CM20191091155', '', '', 'siswa', 'Unggul Pambudi  Putra', 'Belum Aktif'),
('CM20191091156', '', '', 'siswa', 'Lueky  Apri Nelpandi', 'Belum Aktif'),
('CM20191091157', '', '', 'siswa', 'Rufita Hardiantoroputro', 'Belum Aktif'),
('CM20191091158', '', '', 'siswa', 'Suraidah  Hasan', 'Belum Aktif'),
('CM20191091159', '', '', 'siswa', 'daniel  christianto', 'Belum Aktif'),
('CM20191091160', '', '', 'siswa', 'saka  arethusa', 'Belum Aktif'),
('CM20191091161', '', '', 'siswa', 'yeremia  kok', 'Belum Aktif'),
('CM20191091162', '', '', 'siswa', 'firdaus  ardiansyah', 'Belum Aktif'),
('CM20191091164', '', '', 'siswa', 'anik Hikmatuzzahra', 'Belum Aktif'),
('CM20191091165', '', '', 'siswa', 'Juan Tjamalla', 'Belum Aktif'),
('CM20191091166', '', '', 'siswa', 'Rudy  Darmawan', 'Belum Aktif'),
('CM20191091167', '', '', 'siswa', 'Juan Sebastian', 'Belum Aktif'),
('CM20191091168', '', '', 'siswa', 'Ummi Irsyadah', 'Belum Aktif'),
('CM20191091169', '', '', 'siswa', 'Mutiara  Ningrum', 'Belum Aktif'),
('CM20191091170', '', '', 'siswa', 'Ahmad  Syaifuddin', 'Belum Aktif'),
('CM20191091171', '', '', 'siswa', 'Anna  Ningrum', 'Belum Aktif'),
('CM20191091172', '', '', 'siswa', 'Adi  Djatmiko', 'Belum Aktif'),
('CM20191091174', '', '', 'siswa', 'Izzano  Monzila', 'Belum Aktif'),
('CM20191091175', '', '', 'siswa', 'Shokhibul  Arifin', 'Belum Aktif'),
('CM20191091176', '', '', 'siswa', 'Gusti Eka  Yuliastuti', 'Belum Aktif'),
('CM20191091177', '', '', 'siswa', 'irawan  thijayadi', 'Belum Aktif'),
('CM20191091178', '', '', 'siswa', 'gilang  permana', 'Belum Aktif'),
('CM20191091179', '', '', 'siswa', 'Azka  Adji Mubarok', 'Belum Aktif'),
('CM20191091180', '', '', 'siswa', 'Adeck  Madriana Kasih', 'Belum Aktif'),
('CM20191091181', '', '', 'siswa', 'Irfan Fachrudi  Rachman', 'Belum Aktif'),
('CM20191091182', '', '', 'siswa', 'Rahmad Rinaldi', 'Belum Aktif'),
('CM20191091183', '', '', 'siswa', 'Satria Germanustika', 'Belum Aktif'),
('CM20191091184', '', '', 'siswa', 'Avira  Restyanti', 'Belum Aktif'),
('CM20191091185', '', '', 'siswa', 'anton  sugiarto', 'Belum Aktif'),
('CM20191091186', '', '', 'siswa', 'Hasna  Rizkika', 'Belum Aktif'),
('CM20191091187', '', '', 'siswa', 'Nency  Prafitasari', 'Belum Aktif'),
('CM20191091188', '', '', 'siswa', 'Ghea  Vanda', 'Belum Aktif'),
('CM20191091189', '', '', 'siswa', 'Hendrik  Supriyadi', 'Belum Aktif'),
('CM20191091190', '', '', 'siswa', 'winda   nurmadinah', 'Belum Aktif'),
('CM20191091191', '', '', 'siswa', 'Wahid  Syarifudin', 'Belum Aktif'),
('CM20191091192', '', '', 'siswa', 'ADE PUTRA  PRAWIRA', 'Belum Aktif'),
('CM20191091193', '', '', 'siswa', 'akhmad  muzamil', 'Belum Aktif'),
('CM20191091194', '', '', 'siswa', 'Moh.  Ridwan', 'Belum Aktif'),
('CM20191091195', '', '', 'siswa', 'Steven -', 'Belum Aktif'),
('CM20191091196', '', '', 'siswa', 'Steven -', 'Belum Aktif'),
('CM20191091197', '', '', 'siswa', 'Rizaldy Ramadhan', 'Belum Aktif'),
('CM20191091198', '', '', 'siswa', 'Lorenzo Yauwerissa', 'Belum Aktif'),
('CM20191091199', '', '', 'siswa', 'Vila Kristi', 'Belum Aktif'),
('CM20191091200', '', '', 'siswa', 'Evelyn Angela', 'Belum Aktif'),
('CM20191091201', '', '', 'siswa', 'Vincent Wahyudi', 'Belum Aktif'),
('CM20191091202', '', '', 'siswa', 'Yudi Nurcahya', 'Belum Aktif'),
('CM20191091203', '', '', 'siswa', 'Bambang Suprayogi', 'Belum Aktif'),
('CM20191091204', '', '', 'siswa', 'Tri Wahyudi', 'Belum Aktif'),
('CM20191091205', '', '', 'siswa', 'Bambang Suprayogi', 'Belum Aktif'),
('CM20191091206', '', '', 'siswa', 'Grace Natasha', 'Belum Aktif'),
('CM20191091207', '', '', 'siswa', 'Yetik Kusumaningrum', 'Belum Aktif'),
('CM20191091208', '', '', 'siswa', 'Harry Zulhadji', 'Belum Aktif'),
('CM20191091209', '', '', 'siswa', 'Zulaikha Nur Aisyah', 'Belum Aktif'),
('CM20191091210', '', '', 'siswa', 'Harry Zulhadji', 'Belum Aktif'),
('CM20191091211', '', '', 'siswa', 'Vanessa Moedjiono', 'Belum Aktif'),
('CM20191091212', '', '', 'siswa', 'Koko Suwandi', 'Belum Aktif'),
('CM20191091213', '', '', 'siswa', 'Resida Wachdani', 'Belum Aktif'),
('CM20191091214', '', '', 'siswa', 'Rufita Hardhiantonoputro', 'Belum Aktif'),
('CM20191091215', '', '', 'siswa', 'Yong   ', 'Belum Aktif'),
('CM20191091216', '', '', 'siswa', 'Sean Andrew Valentino D', 'Belum Aktif'),
('CM20191091217', '', '', 'siswa', 'Yuanita   ', 'Belum Aktif'),
('CM20191091218', '', '', 'siswa', 'Lorenzo Yauwerissa', 'Belum Aktif'),
('CM20191091219', '', '', 'siswa', 'Vincent Wahyudi', 'Belum Aktif'),
('CM20191091220', '', '', 'siswa', 'Pratono Atmaji', 'Belum Aktif'),
('CM20191091221', '', '', 'siswa', 'Cherly Pattiasina', 'Belum Aktif'),
('CM20191091222', '', '', 'siswa', 'Novy vincentius', 'Belum Aktif'),
('CM20191091223', '', '', 'siswa', 'Suhariono -', 'Belum Aktif'),
('CM20191091224', '', '', 'siswa', 'Rufita Hardiantoroputro', 'Belum Aktif'),
('CM20191091225', '', '', 'siswa', 'Ahmad Muhammad', 'Belum Aktif'),
('CM20191091226', '', '', 'siswa', 'Ardhityar Suharsono', 'Belum Aktif'),
('CM20191091227', '', '', 'siswa', 'Widjaja Soebianto', 'Belum Aktif'),
('CM20191091228', '', '', 'siswa', 'Jefferson  Matthew', 'Belum Aktif'),
('CM20191091229', '', '', 'siswa', 'Citra Nurfadilah', 'Belum Aktif'),
('CM20191091230', '', '', 'siswa', 'Felix  ', 'Belum Aktif'),
('CM20191091231', '', '', 'siswa', 'Nur Ubaydillah', 'Belum Aktif'),
('CM20191091232', '', '', 'siswa', 'Gisela Irwanto', 'Belum Aktif'),
('CM20191091233', '', '', 'siswa', 'Aditya Kuncoro', 'Belum Aktif'),
('CM20191091234', '', '', 'siswa', 'Septriana Nosarianti', 'Belum Aktif'),
('CM20191091235', '', '', 'siswa', 'Maria Runturambi', 'Belum Aktif'),
('CM20191091236', '', '', 'siswa', 'Septriana Nosarianti', 'Belum Aktif'),
('CM20191091237', '', '', 'siswa', 'Adrian Yuwono', 'Belum Aktif'),
('CM20191091238', '', '', 'siswa', 'Septriana Nosarianti', 'Belum Aktif'),
('CM20191091239', '', '', 'siswa', 'Ika Luqyana', 'Belum Aktif'),
('CM20191091240', '', '', 'siswa', 'Andhita Farrakhan', 'Belum Aktif'),
('CM20191091241', '', '', 'siswa', 'Nurul Arofiah', 'Belum Aktif'),
('CM20191091242', '', '', 'siswa', 'Meru Respati', 'Belum Aktif'),
('CM20191091243', '', '', 'siswa', 'Arif Rizqullah', 'Belum Aktif'),
('CM20191091244', '', '', 'siswa', 'Dimas Arya Danu Kusuma', 'Belum Aktif'),
('CM20191091245', '', '', 'siswa', 'Arif Rizqullah', 'Belum Aktif'),
('CM20191091246', '', '', 'siswa', 'Putri Devalza', 'Belum Aktif'),
('CM20191091247', '', '', 'siswa', 'Grace Natasha', 'Belum Aktif'),
('CM20191091248', '', '', 'siswa', 'Ardhityar Izaaz Suharsono', 'Belum Aktif'),
('CM20191091249', '', '', 'siswa', 'Bahtiar Rosid', 'Belum Aktif'),
('CM20191091250', '', '', 'siswa', 'Jessen Ang', 'Belum Aktif'),
('CM20191091251', '', '', 'siswa', 'Candra Ayuningtias', 'Belum Aktif'),
('CM20191091252', '', '', 'siswa', 'Clara Putu Suryandari', 'Belum Aktif'),
('CM20191091253', '', '', 'siswa', 'Marsyela Nurtaviela Widyaswari', 'Belum Aktif'),
('CM20191091254', '', '', 'siswa', 'Agung  Iskandar', 'Belum Aktif'),
('CM20191091255', '', '', 'siswa', 'Yan   Yan', 'Belum Aktif'),
('CM20191091256', '', '', 'siswa', 'bionica  wangili', 'Belum Aktif'),
('CM20191091257', '', '', 'siswa', 'Ivan  Tristan', 'Belum Aktif'),
('CM20191091258', '', '', 'siswa', 'R. M. Ariel  Febriansyah Mochtar S ', 'Belum Aktif'),
('CM20191091259', '', '', 'siswa', 'Alexander  Apriando', 'Belum Aktif'),
('CM20191091260', '', '', 'siswa', 'Daniel  Sidharta', 'Belum Aktif'),
('CM20191091261', '', '', 'siswa', 'Widya  Ningsih', 'Belum Aktif'),
('CM20191091262', '', '', 'siswa', 'ruhanda  merdiyansa', 'Belum Aktif'),
('CM20191091263', '', '', 'siswa', 'Daud  Waluyo', 'Belum Aktif'),
('CM20191091264', '', '', 'siswa', 'Wirman  Kwanmas', 'Belum Aktif'),
('CM20191091265', '', '', 'siswa', 'fionni  sarranova', 'Belum Aktif'),
('CM20191091266', '', '', 'siswa', 'bethany   febe', 'Belum Aktif'),
('CM20191091267', '', '', 'siswa', 'Fahmi  Amiruddin', 'Belum Aktif'),
('CM20191091268', '', '', 'siswa', 'Rajab  Amali', 'Belum Aktif'),
('CM20191091269', '', '', 'siswa', 'andhi  nugroho', 'Belum Aktif'),
('CM20191091270', '', '', 'siswa', 'samsul  hidayat', 'Belum Aktif'),
('CM20191091271', '', '', 'siswa', 'Deby Kukuh  Setiawan', 'Belum Aktif'),
('CM20191091272', '', '', 'siswa', 'vecky  sosio', 'Belum Aktif'),
('CM20191091273', '', '', 'siswa', 'Mif  Tahul', 'Belum Aktif'),
('CM20191091274', '', '', 'siswa', 'Aditya  Cakra  Wirapratama', 'Belum Aktif'),
('CM20191091275', '', '', 'siswa', 'Dindin  Wahidin', 'Belum Aktif'),
('CM20191091276', '', '', 'siswa', 'Maulana  Abdul Yazid', 'Belum Aktif'),
('CM20191091277', '', '', 'siswa', 'Maey  Syarah. IK', 'Belum Aktif'),
('CM20191091278', '', '', 'siswa', 'Rita  Sara', 'Belum Aktif'),
('CM20191091279', '', '', 'siswa', 'rangga  triutomo', 'Belum Aktif'),
('CM20191091280', '', '', 'siswa', 'mochammad hanif  junianto', 'Belum Aktif'),
('CM20191091281', '', '', 'siswa', 'Gunawan   ', 'Belum Aktif'),
('CM20191091282', '', '', 'siswa', 'Izzatul  Khonsa', 'Belum Aktif'),
('CM20191091283', '', '', 'siswa', 'Indra  Permana Putra', 'Belum Aktif'),
('CM20191091284', '', '', 'siswa', 'vince  missa', 'Belum Aktif'),
('CM20191091285', '', '', 'siswa', 'Muhamad  Roghib', 'Belum Aktif'),
('CM20191091286', '', '', 'siswa', 'irawan  ', 'Belum Aktif'),
('CM20191091287', '', '', 'siswa', 'Ryan  Kent Tanadi', 'Belum Aktif'),
('CM20191091288', '', '', 'siswa', 'BRYAN PATRICK  PURNOMO', 'Belum Aktif'),
('CM20191091289', '', '', 'siswa', 'Windi  Yulianto', 'Belum Aktif'),
('CM20191091290', '', '', 'siswa', 'Udin  Siswanto', 'Belum Aktif'),
('CM20191091291', '', '', 'siswa', 'yohanes   christian', 'Belum Aktif'),
('CM20191091292', '', '', 'siswa', 'Fajar  Muzakki', 'Belum Aktif'),
('CM20191091293', '', '', 'siswa', 'Swita  Pijoh', 'Belum Aktif'),
('CM20191091294', '', '', 'siswa', 'Yohanes  Steven Wijaya', 'Belum Aktif'),
('CM20191091295', '', '', 'siswa', 'Ferry  Susilo', 'Belum Aktif'),
('CM20191091296', '', '', 'siswa', 'erdyan  gilang', 'Belum Aktif'),
('CM20191091297', '', '', 'siswa', 'Ardian  Rizky', 'Belum Aktif'),
('CM20191091298', '', '', 'siswa', 'James  Simbolon', 'Belum Aktif'),
('CM20191091299', '', '', 'siswa', 'ahmad  khudloifin', 'Belum Aktif'),
('CM20191091300', '', '', 'siswa', 'CHARINA EKA  NATALIA TAMARINDANG', 'Belum Aktif'),
('CM20191091301', '', '', 'siswa', 'Saskia  Ayudhia', 'Belum Aktif'),
('CM20191091302', '', '', 'siswa', 'Toni  Romanzah', 'Belum Aktif'),
('CM20191091303', '', '', 'siswa', 'Naufal  Afifi', 'Belum Aktif'),
('CM20191091304', '', '', 'siswa', 'Adhitya  Candra', 'Belum Aktif'),
('CM20191091305', '', '', 'siswa', 'Faris  Alkomi', 'Belum Aktif'),
('CM20191091306', '', '', 'siswa', 'Fahmi  Amiruddin', 'Belum Aktif'),
('CM20191091307', '', '', 'siswa', 'Dewinda  Julianensi Rumala', 'Belum Aktif'),
('CM20191091308', '', '', 'siswa', 'yenni  marpaung', 'Belum Aktif'),
('CM20191091309', '', '', 'siswa', 'Titien  Handayani Story', 'Belum Aktif'),
('CM20191091310', '', '', 'siswa', 'Syahrul  Ahdi Oktavian', 'Belum Aktif'),
('CM20191091311', '', '', 'siswa', 'daniel  christianto', 'Belum Aktif'),
('CM20191091312', '', '', 'siswa', 'ahmad  fauji', 'Belum Aktif'),
('CM20191091313', '', '', 'siswa', 'Yohanes  Romyldo Bundur', 'Belum Aktif'),
('CM20191091314', '', '', 'siswa', 'Catharina  Nesti', 'Belum Aktif'),
('CM20191091315', '', '', 'siswa', 'Fransiskus  Arnoldy', 'Belum Aktif'),
('CM20191091316', '', '', 'siswa', 'Moses  Boikaway', 'Belum Aktif'),
('CM20191091317', '', '', 'siswa', 'EDDY  PURWOKO GOO', 'Belum Aktif'),
('CM20191091318', '', '', 'siswa', 'wahyu  himawan', 'Belum Aktif'),
('CM20191091319', '', '', 'siswa', 'Suando  Malau', 'Belum Aktif'),
('CM20191091320', '', '', 'siswa', 'yusuf  parri akbar', 'Belum Aktif'),
('CM20191091321', '', '', 'siswa', 'ANGELIA  LIMANTONO', 'Belum Aktif'),
('CM20191091322', '', '', 'siswa', 'Syahrul  Ahdi', 'Belum Aktif'),
('CM20191091323', '', '', 'siswa', 'Rheza  Dwinata', 'Belum Aktif'),
('CM20191091324', '', '', 'siswa', 'Adi  Suwarto', 'Belum Aktif'),
('CM20191091325', '', '', 'siswa', 'Fuad  Nichi Kellyvoni', 'Belum Aktif'),
('CM20191091326', '', '', 'siswa', 'Maya  Silvina', 'Belum Aktif'),
('CM20191091327', '', '', 'siswa', 'HERMIN  TITI PALUPI', 'Belum Aktif'),
('CM20191091328', '', '', 'siswa', 'Angelo  Estiller', 'Belum Aktif'),
('CM20191091329', '', '', 'siswa', 'pontjo  suharwono', 'Belum Aktif'),
('CM20191091330', '', '', 'siswa', 'fanny  sutanto', 'Belum Aktif'),
('CM20191091331', '', '', 'siswa', 'Mirza  Rachman', 'Belum Aktif'),
('CM20191091332', '', '', 'siswa', 'Andika  Tri Raharja', 'Belum Aktif'),
('CM20191091333', '', '', 'siswa', 'Andreas  Tirtohartono', 'Belum Aktif'),
('CM20191091334', '', '', 'siswa', 'Vicky  Altovan', 'Belum Aktif'),
('CM20191091335', '', '', 'siswa', 'Uhti  Mulyadini', 'Belum Aktif'),
('CM20191091336', '', '', 'siswa', 'Ahmad  Fauzi', 'Belum Aktif'),
('CM20191091337', '', '', 'siswa', 'alvin  syahrial', 'Belum Aktif'),
('CM20191091338', '', '', 'siswa', 'Mohammad  Kodir', 'Belum Aktif'),
('CM20191091339', '', '', 'siswa', 'Imron  Rosyadi', 'Belum Aktif'),
('CM20191091340', '', '', 'siswa', 'Likhu  Hapsari', 'Belum Aktif'),
('CM20191091341', '', '', 'siswa', 'Vincentius Ronalto  Dwito Kumoro ', 'Belum Aktif'),
('CM20191091342', '', '', 'siswa', 'yusuf  fadilah', 'Belum Aktif'),
('CM20191091343', '', '', 'siswa', 'catherine  rahardjo', 'Belum Aktif'),
('CM20191091344', '', '', 'siswa', 'DJOKO  ISMANTO', 'Belum Aktif'),
('CM20191091345', '', '', 'siswa', 'Zam zam ', 'Belum Aktif'),
('CM20191091346', '', '', 'siswa', 'Dwi  Mutrohfini', 'Belum Aktif'),
('CM20191091347', '', '', 'siswa', 'Ririh  Wijayanti', 'Belum Aktif'),
('CM20191091348', '', '', 'siswa', 'Tilik  Siswantara', 'Belum Aktif'),
('CM20191091349', '', '', 'siswa', 'nazwa  denisa', 'Belum Aktif'),
('CM20191091350', '', '', 'siswa', 'Novitta  Christiana', 'Belum Aktif'),
('CM20191091351', '', '', 'siswa', 'CHRIS  GANANG WIDIOSA', 'Belum Aktif'),
('CM20191091352', '', '', 'siswa', 'Jason  Ciputra', 'Belum Aktif'),
('CM20191091353', '', '', 'siswa', 'Abdul Aziz  Al Hakim', 'Belum Aktif'),
('CM20191091354', '', '', 'siswa', 'Fransiskus Zaverius  Sutjiharto', 'Belum Aktif'),
('CM20191091355', '', '', 'siswa', 'ANNA  JULIANA', 'Belum Aktif'),
('CM20191091356', '', '', 'siswa', 'Hengky  Gunawan', 'Belum Aktif'),
('CM20191091357', '', '', 'siswa', 'Muhammad  Rivai Aziz', 'Belum Aktif'),
('CM20191091358', '', '', 'siswa', 'Dian  Nilam Sari', 'Belum Aktif'),
('CM20191091359', '', '', 'siswa', 'Nelsen  Adrian', 'Belum Aktif'),
('CM20191091360', '', '', 'siswa', 'Ahmad  Husnan', 'Belum Aktif'),
('CM20191091361', '', '', 'siswa', 'Rheza  Paleva Uyanto', 'Belum Aktif'),
('CM20191091362', '', '', 'siswa', 'Rizqy  Wildan', 'Belum Aktif'),
('CM20191091363', '', '', 'siswa', 'budi  jayantara', 'Belum Aktif'),
('CM20191091364', '', '', 'siswa', 'indra  wicaksana', 'Belum Aktif'),
('CM20191091365', '', '', 'siswa', 'habi  bullah', 'Belum Aktif'),
('CM20191091366', '', '', 'siswa', 'Purwadi  Sutarto', 'Belum Aktif'),
('CM20191091367', '', '', 'siswa', 'amar  ihsan', 'Belum Aktif'),
('CM20191091368', '', '', 'siswa', 'pradika wahyu  dwi putra', 'Belum Aktif'),
('CM20191091369', '', '', 'siswa', 'Daniel  Christianto', 'Belum Aktif'),
('CM20191091370', '', '', 'siswa', 'fitriyah  fatmawati', 'Belum Aktif'),
('CM20191091371', '', '', 'siswa', 'Reynhard  Yuvensi Setiawan', 'Belum Aktif'),
('CM20191091372', '', '', 'siswa', 'maulidia  sani', 'Belum Aktif'),
('CM20191091373', '', '', 'siswa', 'SAMSUL  ARIFIN', 'Belum Aktif'),
('CM20191091374', '', '', 'siswa', 'Mamik  Dwi Hartanto', 'Belum Aktif'),
('CM20191091375', '', '', 'siswa', 'Edi  Kawab', 'Belum Aktif'),
('CM20191091376', '', '', 'siswa', 'ade  christian', 'Belum Aktif'),
('CM20191091377', '', '', 'siswa', 'dodik  sugianto', 'Belum Aktif'),
('CM20191091378', '', '', 'siswa', 'Hendrik  Supriyadi', 'Belum Aktif'),
('CM20191091379', '', '', 'siswa', 'pungki  purwati', 'Belum Aktif'),
('CM20191091380', '', '', 'siswa', 'Wahyu  Anggi Suhartono', 'Belum Aktif'),
('CM20191091381', '', '', 'siswa', 'Ragil  Winarsyah', 'Belum Aktif'),
('CM20191091382', '', '', 'siswa', 'Muhammad  Zaenal fanani', 'Belum Aktif'),
('CM20191091383', '', '', 'siswa', 'Astari  Isnan', 'Belum Aktif'),
('CM20191091384', '', '', 'siswa', 'muliana  putri imanda', 'Belum Aktif'),
('CM20191091385', '', '', 'siswa', 'Norman  Arief Setiawan', 'Belum Aktif'),
('CM20191091386', '', '', 'siswa', 'Feri  Kurniawan', 'Belum Aktif'),
('CM20191091387', '', '', 'siswa', 'agus  santoso', 'Belum Aktif'),
('CM20191091388', '', '', 'siswa', 'Daniel  Christianto', 'Belum Aktif'),
('CM20191091389', '', '', 'siswa', 'Saka  Arethusa', 'Belum Aktif'),
('CM20191091390', '', '', 'siswa', 'Anderan  Sugiarto', 'Belum Aktif'),
('CM20191091391', '', '', 'siswa', 'Sammy   ', 'Belum Aktif'),
('CM20191091392', '', '', 'siswa', 'Methivani  ', 'Belum Aktif'),
('CM20191091393', '', '', 'siswa', 'Cornelius Hendra  Purnama A S', 'Belum Aktif'),
('CM20191091394', '', '', 'siswa', 'Yuliana  Wati ', 'Belum Aktif'),
('CM20191091395', '', '', 'siswa', 'Muh Khoiruil  Hidayat', 'Belum Aktif'),
('CM20191091396', '', '', 'siswa', 'Pungki  Dami ', 'Belum Aktif'),
('CM20191091397', '', '', 'siswa', 'Putri  Wulandari', 'Belum Aktif'),
('CM20191091398', '', '', 'siswa', 'Ahmad Jonny  Prasetiawan', 'Belum Aktif'),
('CM20191091399', '', '', 'siswa', 'Michael  Teddy', 'Belum Aktif'),
('CM20191091400', '', '', 'siswa', 'Musbihkin  ', 'Belum Aktif'),
('CM20191091402', '', '', 'siswa', 'Fransisco  Senior', 'Belum Aktif'),
('CM20191091403', '', '', 'siswa', 'Shawn  Dalies', 'Belum Aktif'),
('CM20191091404', '', '', 'siswa', 'Christian  Natario', 'Belum Aktif'),
('CM20191091405', '', '', 'siswa', 'Tri  Evania', 'Belum Aktif'),
('CM20191091406', '', '', 'siswa', 'Firmansyah  Bayu Destyan', 'Belum Aktif'),
('CM20191091407', '', '', 'siswa', 'Claudine  Hartanto', 'Belum Aktif'),
('CM20191091408', '', '', 'siswa', 'R Soegiharto   ', 'Belum Aktif'),
('CM20191091409', '', '', 'siswa', 'Syamsul  Baidlowi', 'Belum Aktif'),
('CM20191091410', '', '', 'siswa', 'Hadi  ', 'Belum Aktif'),
('CM20191091411', '', '', 'siswa', 'Beverly  Sharon Laza', 'Belum Aktif'),
('CM20191091412', '', '', 'siswa', 'Yuliana  Ningsih', 'Belum Aktif'),
('CM20191091413', '', '', 'siswa', 'Fadhilah  Winda Dwi', 'Belum Aktif'),
('CM20191091414', '', '', 'siswa', 'Jimmy    ', 'Belum Aktif'),
('CM20191091415', '', '', 'siswa', 'Yuyun  Setiorini', 'Belum Aktif'),
('CM20191091416', '', '', 'siswa', 'Rio  Permana', 'Belum Aktif'),
('CM20191091417', '', '', 'siswa', 'Ayas  Faikar', 'Belum Aktif'),
('CM20191091418', '', '', 'siswa', 'Jimmy    ', 'Belum Aktif'),
('CM20191091419', '', '', 'siswa', 'Aloysius  Oeitono', 'Belum Aktif'),
('CM20191091420', '', '', 'siswa', 'John Paul  Gunawan', 'Belum Aktif'),
('CM20191091421', '', '', 'siswa', 'Buang  Ben Bela', 'Belum Aktif'),
('CM20191091422', '', '', 'siswa', 'Fadjar  Pradja Winata', 'Belum Aktif'),
('CM20191091423', '', '', 'siswa', 'John Paul  Gunawan', 'Belum Aktif'),
('CM20191091424', '', '', 'siswa', 'Achmad  fauzie', 'Belum Aktif'),
('CM20191091425', '', '', 'siswa', 'Moch Ichya  Ulumuddin', 'Belum Aktif'),
('CM20191091426', '', '', 'siswa', 'Putri  Raditya', 'Belum Aktif'),
('CM20191091427', '', '', 'siswa', 'Mark  Steven', 'Belum Aktif'),
('CM20191091428', '', '', 'siswa', 'Veni  Prasetyawati', 'Belum Aktif'),
('CM20191091429', '', '', 'siswa', 'Muliana  ', 'Belum Aktif'),
('CM20191091430', '', '', 'siswa', 'Bagus  Arianto', 'Belum Aktif'),
('CM20191091431', '', '', 'siswa', 'Tirta  Darma', 'Belum Aktif'),
('CM20191091432', '', '', 'siswa', 'Alvin Nirvana  Adam', 'Belum Aktif'),
('CM20191091433', '', '', 'siswa', 'Agung  Wahyu Setyawan', 'Belum Aktif'),
('CM20191091434', '', '', 'siswa', 'M Ilham  Arfah', 'Belum Aktif'),
('CM20191091435', '', '', 'siswa', 'Abdul  Rokhim', 'Belum Aktif'),
('CM20191091436', '', '', 'siswa', 'Heri  Susanto', 'Belum Aktif'),
('CM20191091437', '', '', 'siswa', 'Isabel  ', 'Belum Aktif'),
('CM20191091438', '', '', 'siswa', 'Axcel Tiorido  Pasaribu', 'Belum Aktif'),
('CM20191091439', '', '', 'siswa', 'Ivan Nugraha  Gunawan', 'Belum Aktif'),
('CM20191091440', '', '', 'siswa', 'Ivana Tan  & Vania Tan', 'Belum Aktif'),
('CM20191091441', '', '', 'siswa', 'Hartanto  ', 'Belum Aktif'),
('CM20191091442', '', '', 'siswa', 'Alvin  Tanya', 'Belum Aktif'),
('CM20191091443', '', '', 'siswa', 'dr. Anggana  Suryatmana', 'Belum Aktif'),
('CM20191091444', '', '', 'siswa', 'Anthony  ', 'Belum Aktif'),
('CM20191091445', '', '', 'siswa', 'Jimmy   Wibisono', 'Belum Aktif'),
('CM20191091446', '', '', 'siswa', 'Patricia  Pamela Pariury', 'Belum Aktif'),
('CM20191091447', '', '', 'siswa', 'John  Budiman', 'Belum Aktif'),
('CM20191091448', '', '', 'siswa', 'Tri  Evania', 'Belum Aktif'),
('CM20191091449', '', '', 'siswa', 'Elaine  Kartika SH', 'Belum Aktif'),
('CM20191091450', '', '', 'siswa', 'Ghiffari  Arfian', 'Belum Aktif'),
('CM20191091451', '', '', 'siswa', 'Agung Arief  Perdana Putra', 'Belum Aktif'),
('CM20191091452', '', '', 'siswa', 'Galih Indra  Rochim', 'Belum Aktif'),
('CM20191091453', '', '', 'siswa', 'Hans Paul  Christoper Mahaganti', 'Belum Aktif'),
('CM20191091454', '', '', 'siswa', 'Rhizal  SH', 'Belum Aktif'),
('CM20191091455', '', '', 'siswa', 'Putri Arimbi  Arumdhany ', 'Belum Aktif'),
('CM20191091456', '', '', 'siswa', 'Yohanes Adi  Putra Fernandez', 'Belum Aktif'),
('CM20191091457', '', '', 'siswa', 'Jihad  Aji Ghifari', 'Belum Aktif'),
('CM20191091458', '', '', 'siswa', 'Axcel Tiorido  Pasaribu', 'Belum Aktif'),
('CM20191091459', '', '', 'siswa', 'Leonard  Susilo', 'Belum Aktif'),
('CM20191091460', '', '', 'siswa', 'Purnomo  ', 'Belum Aktif'),
('CM20191091461', '', '', 'siswa', 'Susanto  ', 'Belum Aktif'),
('CM20191091462', '', '', 'siswa', 'Stella  Stepfanie', 'Belum Aktif'),
('CM20191091463', '', '', 'siswa', 'Graciella  Chasty Wijaya', 'Belum Aktif'),
('CM20191091464', '', '', 'siswa', 'Djoko  Suratno', 'Belum Aktif'),
('CM20191091465', '', '', 'siswa', 'Lisa  Andriani', 'Belum Aktif'),
('CM20191091466', '', '', 'siswa', 'Sri Wulandari Wulandari', 'Belum Aktif'),
('CM20191091467', '', '', 'siswa', 'Djoeni  Prasoetijo', 'Belum Aktif'),
('CM20191091468', '', '', 'siswa', 'William  Yuhono', 'Belum Aktif'),
('CM20191091469', '', '', 'siswa', 'Arif  Budi ', 'Belum Aktif'),
('CM20191091470', '', '', 'siswa', 'Eza  Putra ', 'Belum Aktif'),
('CM20191091471', '', '', 'siswa', 'Claudine  Hartanto', 'Belum Aktif'),
('CM20191091472', '', '', 'siswa', 'Rio  Permana', 'Belum Aktif'),
('CM20191091473', '', '', 'siswa', 'Lahmuddin  ', 'Belum Aktif'),
('CM20191091474', '', '', 'siswa', 'Lahmuddin  ', 'Belum Aktif'),
('CM20191091475', '', '', 'siswa', 'Shafira  Nur Shabrina', 'Belum Aktif'),
('CM20191091476', '', '', 'siswa', 'Rosita  Dewi A', 'Belum Aktif'),
('CM20191091477', '', '', 'siswa', 'Ahmad  Ardani', 'Belum Aktif'),
('CM20191091478', '', '', 'siswa', 'Ahmad  Ardani', 'Belum Aktif'),
('CM20191091479', '', '', 'siswa', 'Idham Sinarisyah', 'Belum Aktif'),
('CM20191091480', '', '', 'siswa', 'ADITYA  RAHMAWAN ', 'Belum Aktif'),
('CM20191091481', '', '', 'siswa', 'Rachmad  Akbar', 'Belum Aktif'),
('CM20191091482', '', '', 'siswa', 'NOVERIA  ANGGRAENI', 'Belum Aktif'),
('CM20191091483', '', '', 'siswa', 'R Soegiharto  ', 'Belum Aktif'),
('CM20191091484', '', '', 'siswa', 'Syamsul  Baidlowi', 'Belum Aktif'),
('CM20191091485', '', '', 'siswa', 'rachmad andre  virgantara putra', 'Belum Aktif'),
('CM20191091486', '', '', 'siswa', 'Arlan  Thomas', 'Belum Aktif'),
('CM20191091487', '', '', 'siswa', 'Arlan  Thomas', 'Belum Aktif'),
('CM20191091488', '', '', 'siswa', 'Nizar  kurniawan', 'Belum Aktif'),
('CM20191091489', '', '', 'siswa', 'Hendro  Prastyawan', 'Belum Aktif'),
('CM20191091490', '', '', 'siswa', 'Cindy  Christina', 'Belum Aktif'),
('CM20191091491', '', '', 'siswa', 'Resmi Ari A  ', 'Belum Aktif'),
('CM20191091492', '', '', 'siswa', 'Andry  Christian', 'Belum Aktif'),
('CM20191091493', '', '', 'siswa', 'Dian Sofianty  Pratiwi', 'Belum Aktif'),
('CM20191091494', '', '', 'siswa', 'Efendy  Yosal', 'Belum Aktif'),
('CM20191091495', '', '', 'siswa', 'Kristina  Sawen', 'Belum Aktif'),
('CM20191091496', '', '', 'siswa', 'Fandy  Aditanaya Putra', 'Belum Aktif'),
('CM20191091497', '', '', 'siswa', 'purna  ekasari', 'Belum Aktif'),
('CM20191091498', '', '', 'siswa', 'Clarin  Mulyanintyas', 'Belum Aktif'),
('CM20191091499', '', '', 'siswa', 'Niky  Januar', 'Belum Aktif'),
('CM20191091500', '', '', 'siswa', 'Niky  Januar', 'Belum Aktif'),
('CM20191091501', '', '', 'siswa', 'Effie  Sanusi', 'Belum Aktif'),
('CM20191091502', '', '', 'siswa', 'Muhammad  Dhaifan', 'Belum Aktif'),
('CM20191091503', '', '', 'siswa', 'Novella  Devina Adilia', 'Belum Aktif'),
('CM20191091504', '', '', 'siswa', 'Marisa  ', 'Belum Aktif'),
('CM20191091505', '', '', 'siswa', 'Silvi  ', 'Belum Aktif'),
('CM20191091506', '', '', 'siswa', 'Edward   ', 'Belum Aktif'),
('CM20191091507', '', '', 'siswa', 'Kevin  Sunaryadi', 'Belum Aktif'),
('CM20191091508', '', '', 'siswa', 'Adrian  Hartanto', 'Belum Aktif'),
('CM20191091509', '', '', 'siswa', 'Ingshan  ', 'Belum Aktif'),
('CM20191091510', '', '', 'siswa', 'Pelatihan  Coorporate', 'Belum Aktif'),
('CM20191091511', '', '', 'siswa', 'S Made  Angga Widartha', 'Belum Aktif'),
('CM20191091512', '', '', 'siswa', 'Sidarta  Gautama', 'Belum Aktif'),
('CM20191091513', '', '', 'siswa', 'Marco  Priyo Hutomo', 'Belum Aktif'),
('CM20191091515', '', '', 'siswa', ' The Palladium Group (2)  ', 'Belum Aktif'),
('CM20191091516', '', '', 'siswa', 'Robbin  Karuniawan', 'Belum Aktif'),
('CM20191091517', '', '', 'siswa', 'Muzaki  Abdurahman', 'Belum Aktif'),
('CM20191091518', '', '', 'siswa', 'Moch Izzan  Arrafiqi', 'Belum Aktif'),
('CM20191091519', '', '', 'siswa', 'Sarif  ', 'Belum Aktif'),
('CM20191091520', '', '', 'siswa', 'Acho  Chandra', 'Belum Aktif'),
('CM20191091521', '', '', 'siswa', 'Fitri  Puji S', 'Belum Aktif'),
('CM20191091522', '', '', 'siswa', 'Rusmiati  ', 'Belum Aktif'),
('CM20191091523', '', '', 'siswa', 'Dio  Putra Utama', 'Belum Aktif'),
('CM20191091524', '', '', 'siswa', 'Afri  Dwi Christian', 'Belum Aktif'),
('CM20191091525', '', '', 'siswa', 'Lienny  Setianingsih', 'Belum Aktif'),
('CM20191091526', '', '', 'siswa', 'Merrys  Flafiyana', 'Belum Aktif'),
('CM20191091527', '', '', 'siswa', 'Dwi Yudha  Masohiyanto', 'Belum Aktif'),
('CM20191091528', '', '', 'siswa', 'Anies  Harivayanti', 'Belum Aktif'),
('CM20191091529', '', '', 'siswa', 'Yuyun  ', 'Belum Aktif'),
('CM20191091530', '', '', 'siswa', 'Galih  Dani Saputra', 'Belum Aktif'),
('CM20191091531', '', '', 'siswa', 'Go Danny  Rommer', 'Belum Aktif'),
('CM20191091532', '', '', 'siswa', 'Zam Zam  ', 'Belum Aktif'),
('CM20191091533', '', '', 'siswa', 'Taufiq  Sidiq', 'Belum Aktif'),
('CM20191091534', '', '', 'siswa', 'Ribby  ', 'Belum Aktif'),
('CM20191091535', '', '', 'siswa', 'Sutrisno  ', 'Belum Aktif'),
('CM20191091536', '', '', 'siswa', 'Andy  Kurniawan', 'Belum Aktif'),
('CM20191091537', '', '', 'siswa', 'Eko  Janji Prasetyo', 'Belum Aktif'),
('CM20191091538', '', '', 'siswa', 'Luandre  Eza', 'Belum Aktif'),
('CM20191091539', '', '', 'siswa', 'Tataq  Almi', 'Belum Aktif'),
('CM20191091540', '', '', 'siswa', 'Ariel  Sinatra ', 'Belum Aktif'),
('CM20191091541', '', '', 'siswa', 'Yudikadhinata  ', 'Belum Aktif'),
('CM20191091542', '', '', 'siswa', 'Fitri  Kushandayani', 'Belum Aktif'),
('CM20191091543', '', '', 'siswa', 'Ibnu  Wahyu Cahyono', 'Belum Aktif'),
('CM20191091544', '', '', 'siswa', 'Dwi  Trio Anggara', 'Belum Aktif'),
('CM20191091545', '', '', 'siswa', 'Abustan  ', 'Belum Aktif'),
('CM20191091546', '', '', 'siswa', 'Fabianivanda  Hernawati', 'Belum Aktif'),
('CM20191091547', '', '', 'siswa', 'Ichsani  M. Ilham', 'Belum Aktif'),
('CM20191091548', '', '', 'siswa', 'Yuyun   ', 'Belum Aktif'),
('CM20191091549', '', '', 'siswa', 'Jimmy Steven  Tranggono', 'Belum Aktif'),
('CM20191091550', '', '', 'siswa', 'Shinta  Purnama Dewi', 'Belum Aktif'),
('CM20191091551', '', '', 'siswa', 'Bertomilius  Rapa', 'Belum Aktif'),
('CM20191091552', '', '', 'siswa', 'Bertomilius  Rapa', 'Belum Aktif'),
('CM20191091553', '', '', 'siswa', 'Rizki Deddy  Susanto', 'Belum Aktif'),
('CM20191091554', '', '', 'siswa', 'Rochmad Eko  Hariono', 'Belum Aktif'),
('CM20191091555', '', '', 'siswa', 'Abdurrahman  Sadad', 'Belum Aktif'),
('CM20191091556', '', '', 'siswa', 'Ichwan  Efendi', 'Belum Aktif'),
('CM20191091557', '', '', 'siswa', 'Fuad Syarif  Hidayatullah', 'Belum Aktif'),
('CM20191091558', '', '', 'siswa', 'Argam  Ilhami', 'Belum Aktif'),
('CM20191091559', '', '', 'siswa', 'NOVIARDI,  S.Kom', 'Belum Aktif'),
('CM20191091560', '', '', 'siswa', 'FERNADA  TAWAFFAL, S.Ikom', 'Belum Aktif'),
('CM20191091561', '', '', 'siswa', 'ANDRIYAN  SUTIRTO', 'Belum Aktif'),
('CM20191091562', '', '', 'siswa', 'WIDDY FRIMA,  S.Sos', 'Belum Aktif'),
('CM20191091563', '', '', 'siswa', 'Yuyun  ', 'Belum Aktif'),
('CM20191091564', '', '', 'siswa', 'Leni Diana Diana', 'Belum Aktif'),
('CM20191091565', '', '', 'siswa', 'William  Richard L I', 'Belum Aktif'),
('CM20191091566', '', '', 'siswa', 'A A Ngurah  Panji', 'Belum Aktif'),
('CM20191091567', '', '', 'siswa', 'M Bintang  (Bu Heri & Bu Sita) Susanto', 'Belum Aktif'),
('CM20191091568', '', '', 'siswa', 'Peni Anatia  Syari', 'Belum Aktif'),
('CM20191091569', '', '', 'siswa', 'rofiqoh  permata sari ', 'Belum Aktif'),
('CM20191091570', '', '', 'siswa', 'Hubbert  Rein', 'Belum Aktif'),
('CM20191091571', '', '', 'siswa', 'Gusti Eka  Yuliastuti', 'Belum Aktif'),
('CM20191091572', '', '', 'siswa', 'Izzano  Monzila', 'Belum Aktif'),
('CM20191091573', '', '', 'siswa', ' Vania  Tan', 'Belum Aktif'),
('CM20191091574', '', '', 'siswa', 'Reo  Santoso', 'Belum Aktif'),
('CM20191091575', '', '', 'siswa', 'Naufal  Nabila', 'Belum Aktif'),
('CM20191091576', '', '', 'siswa', 'Vondrea  ', 'Belum Aktif'),
('CM20191091580', '', '', 'siswa', 'Dhiro  Nugroho', 'Belum Aktif'),
('CM20191091581', '', '', 'siswa', 'Achmad  Syafrudin', 'Belum Aktif'),
('CM20191091582', '', '', 'siswa', 'Heri  Tri Prasetyo', 'Belum Aktif'),
('CM20191091583', '', '', 'siswa', 'Teezar  Tioni', 'Belum Aktif'),
('CM20191091584', '', '', 'siswa', 'Dwi  Ariyanto', 'Belum Aktif'),
('CM20191091585', '', '', 'siswa', 'Angga  Kharisma Putra', 'Belum Aktif'),
('CM20191091586', '', '', 'siswa', 'Ferry  Wimbanu Aditiar', 'Belum Aktif'),
('CM20191091587', '', '', 'siswa', 'Achmad  Fadli', 'Belum Aktif'),
('CM20191091588', '', '', 'siswa', 'Victor  Decha Zhevanya', 'Belum Aktif'),
('CM20191091589', '', '', 'siswa', 'David  Prayitno', 'Belum Aktif'),
('CM20191091590', '', '', 'siswa', 'Hendra  Ongkowijoyo', 'Belum Aktif'),
('CM20191091591', '', '', 'siswa', 'Selina  Siswanto', 'Belum Aktif'),
('CM20191091592', '', '', 'siswa', 'Kumoro  Adiatmo', 'Belum Aktif'),
('CM20191091593', '', '', 'siswa', 'winda   nurmadinah', 'Belum Aktif'),
('CM20191091594', '', '', 'siswa', 'Alexander  Apriando', 'Belum Aktif'),
('CM20191091595', '', '', 'siswa', 'Karang Reksa  Ginolla', 'Belum Aktif'),
('CM20191091596', '', '', 'siswa', 'Zhulfi  Bajra Wikjatmiko', 'Belum Aktif'),
('CM20191091597', '', '', 'siswa', 'Daniel  Sidharta', 'Belum Aktif'),
('CM20191091598', '', '', 'siswa', 'Jimmi  Santoso W', 'Belum Aktif'),
('CM20191091599', '', '', 'siswa', 'Maja Bagus  Pradikta', 'Belum Aktif'),
('CM20191091600', '', '', 'siswa', 'Yogas  Andrian', 'Belum Aktif'),
('CM20191091601', '', '', 'siswa', 'Ryan Kent  Tanadi', 'Belum Aktif'),
('CM20191091602', '', '', 'siswa', 'BRYAN PATRICK  PURNOMO', 'Belum Aktif'),
('CM20191091603', '', '', 'siswa', 'Fajar  Muzakki', 'Belum Aktif'),
('CM20191091604', '', '', 'siswa', 'Boris  Kumara', 'Belum Aktif'),
('CM20191091605', '', '', 'siswa', 'Saskia  Ayudhia', 'Belum Aktif'),
('CM20191091606', '', '', 'siswa', 'Stefanus  Satrya Yoedono', 'Belum Aktif'),
('CM20191091607', '', '', 'siswa', 'Anak Agung  Aditya Dharma S', 'Belum Aktif'),
('CM20191091608', '', '', 'siswa', 'Chandra  Wijaya ', 'Belum Aktif'),
('CM20191091609', '', '', 'siswa', 'Fanny  Sutanto', 'Belum Aktif'),
('CM20191091610', '', '', 'siswa', 'Yuda  Januardi', 'Belum Aktif'),
('CM20191091611', '', '', 'siswa', 'Francis Angelo  Lim Estiller', 'Belum Aktif'),
('CM20191091612', '', '', 'siswa', 'Chandra  Nasuha', 'Belum Aktif'),
('CM20191091613', '', '', 'siswa', 'Didik  Merdianto', 'Belum Aktif'),
('CM20191091614', '', '', 'siswa', 'Salam  Mustofa', 'Belum Aktif'),
('CM20191091615', '', '', 'siswa', 'Chandra  Nasuha', 'Belum Aktif'),
('CM20191091616', '', '', 'siswa', 'Didik  Merdianto', 'Belum Aktif'),
('CM20191091617', '', '', 'siswa', 'Janet  Gloria', 'Belum Aktif');
INSERT INTO `login` (`username`, `password`, `photo`, `tipe`, `nama`, `status`) VALUES
('CM20191091618', '', '', 'siswa', 'Imron  Rosyadi', 'Belum Aktif'),
('CM20191091619', '', '', 'siswa', 'Kartika  ', 'Belum Aktif'),
('CM20191091620', '', '', 'siswa', 'Jason  Ciputra', 'Belum Aktif'),
('CM20191091621', '', '', 'siswa', 'Indra  Wicaksana', 'Belum Aktif'),
('CM20191091622', '', '', 'siswa', 'Ririh  Wijayanti ', 'Belum Aktif'),
('CM20191091623', '', '', 'siswa', 'Chris  Ganang Widiosa', 'Belum Aktif'),
('CM20191091624', '', '', 'siswa', 'Nelsen  Adrian', 'Belum Aktif'),
('CM20191091625', '', '', 'siswa', 'Anthony  Surya', 'Belum Aktif'),
('CM20191091626', '', '', 'siswa', 'Lita  Ongkowijoyo', 'Belum Aktif'),
('CM20191091627', '', '', 'siswa', 'Esty  Evelina ', 'Belum Aktif'),
('CM20191091628', '', '', 'siswa', 'Eko  Saputra', 'Belum Aktif'),
('CM20191091629', '', '', 'siswa', 'Reynhard  Yuvensi Setiawan', 'Belum Aktif'),
('CM20191091630', '', '', 'siswa', 'Nurul  Khomariyah', 'Belum Aktif'),
('CM20191091631', '', '', 'siswa', 'Stefanus  Satrya Yoedono', 'Belum Aktif'),
('CM20191091632', '', '', 'siswa', 'Norman Arief  Setiawan, SE', 'Belum Aktif'),
('CM20191091633', '', '', 'siswa', 'Farid  Abdul Karim', 'Belum Aktif'),
('CM20191091634', '', '', 'siswa', 'Tino  Chandra Siregar', 'Belum Aktif'),
('CM20191091635', '', '', 'siswa', 'Muhammad Andri  Bagaskara', 'Belum Aktif'),
('CM20191091636', '', '', 'siswa', 'Axcel  Tiorido Pasaribu', 'Belum Aktif'),
('CM20191091637', '', '', 'siswa', 'Tommy  Iriawan ', 'Belum Aktif'),
('CM20191091638', '', '', 'siswa', 'Christine  Njotohartanto', 'Belum Aktif'),
('CM20191091639', '', '', 'siswa', 'Yuli  Srihandayani', 'Belum Aktif'),
('CM20191091640', '', '', 'siswa', 'Abdul Patah  Muzakir', 'Belum Aktif'),
('CM20191091641', '', '', 'siswa', 'BRYAN  PATRICK PURNOMO', 'Belum Aktif'),
('CM20191091642', '', '', 'siswa', 'Bobby  Sanjaya', 'Belum Aktif'),
('CM20191091643', '', '', 'siswa', 'Roland  N. Wetik', 'Belum Aktif'),
('CM20191091644', '', '', 'siswa', 'Enrico  Hariono', 'Belum Aktif'),
('CM20191091645', '', '', 'siswa', 'Rizqa  Mauliana', 'Belum Aktif'),
('CM20191091646', '', '', 'siswa', 'Janet  Gloria', 'Belum Aktif'),
('CM20191091647', '', '', 'siswa', 'Novita  Kartikaningsih', 'Belum Aktif'),
('CM20191091648', '', '', 'siswa', 'Swita  Pijoh', 'Belum Aktif'),
('CM20191091650', '', '', 'siswa', 'Sandra Ayu  Permatasari Gunawan', 'Belum Aktif'),
('CM20191091651', '', '', 'siswa', 'Kusuma Eko  Febriarta', 'Belum Aktif'),
('CM20191091652', '', '', 'siswa', 'Ryan  Kent Tanadi', 'Belum Aktif'),
('CM20191091653', '', '', 'siswa', 'M Imron  S', 'Belum Aktif'),
('CM20191091654', '', '', 'siswa', 'Frikke  Anggakusuma', 'Belum Aktif'),
('CM20191091655', '', '', 'siswa', 'Resmi  Ari Aranita', 'Belum Aktif'),
('CM20191091656', '', '', 'siswa', 'Muhammad  Solekhudin', 'Belum Aktif'),
('CM20191091657', '', '', 'siswa', 'Endiyanto  ', 'Belum Aktif'),
('CM20191091658', '', '', 'siswa', 'Tofan  Ade Irawan', 'Belum Aktif'),
('CM20191091659', '', '', 'siswa', 'Vigor  Arisandi Sasmito', 'Belum Aktif'),
('CM20191091660', '', '', 'siswa', 'Danu  Ditri Pratama', 'Belum Aktif'),
('CM20191091663', '', '', 'siswa', 'Abu  Sho\'im', 'Belum Aktif'),
('CM20191091664', '', '', 'siswa', 'Axcel  Tiorido Pasaribu', 'Belum Aktif'),
('CM20191091665', '', '', 'siswa', 'Frikke  Anggakusuma', 'Belum Aktif'),
('CM20191091666', '', '', 'siswa', 'Sutrisno  ', 'Belum Aktif'),
('CM20191091667', '', '', 'siswa', 'Andika  Cahya Purnama', 'Belum Aktif'),
('CM20191091668', '', '', 'siswa', 'Mahmuji  ', 'Belum Aktif'),
('CM20191091669', '', '', 'siswa', 'JP  Reuland', 'Belum Aktif'),
('CM20191091670', '', '', 'siswa', 'Gegen  Prasetyo', 'Belum Aktif'),
('CM20191091671', '', '', 'siswa', 'Alief  Zainurrachman', 'Belum Aktif'),
('CM20191091672', '', '', 'siswa', 'Rentdy  P', 'Belum Aktif'),
('CM20191091673', '', '', 'siswa', 'Shobic  Zainudin', 'Belum Aktif'),
('CM20191091674', '', '', 'siswa', 'Bobby  Adi Nugroho', 'Belum Aktif'),
('CM20191091675', '', '', 'siswa', 'Heni  Ratnawati', 'Belum Aktif'),
('CM20191091676', '', '', 'siswa', 'Tiwi  Ardiningsih', 'Belum Aktif'),
('CM20191091677', '', '', 'siswa', 'Nila  Sisca', 'Belum Aktif'),
('CM20191091678', '', '', 'siswa', 'Herdiana  Sulistyantini', 'Belum Aktif'),
('CM20191091679', '', '', 'siswa', 'Dedy  Setiawan', 'Belum Aktif'),
('CM20191091680', '', '', 'siswa', 'Fudji  Widjajanti', 'Belum Aktif'),
('CM20191091681', '', '', 'siswa', 'Fabea  Judith ', 'Belum Aktif'),
('CM20191091682', '', '', 'siswa', 'Reynaldo  Suryawan Santoso', 'Belum Aktif'),
('CM20191091683', '', '', 'siswa', 'Felix  Leonardo', 'Belum Aktif'),
('CM20191091684', '', '', 'siswa', 'Alif  Fajar Gumilang', 'Belum Aktif'),
('CM20191091685', '', '', 'siswa', 'Satria  Widyar Oktano', 'Belum Aktif'),
('CM20191091686', '', '', 'siswa', 'M. Nabil  Naufal', 'Belum Aktif'),
('CM20191091687', '', '', 'siswa', 'Bambang  Heriawan', 'Belum Aktif'),
('CM20191091688', '', '', 'siswa', 'Tania  Clara Wahono', 'Belum Aktif'),
('CM20191091689', '', '', 'siswa', 'Gegen  Prasetyo', 'Belum Aktif'),
('CM20191091690', '', '', 'siswa', 'Hanifa  Nur Rizkarima', 'Belum Aktif'),
('CM20191091691', '', '', 'siswa', 'Janoear Satria  Noegraha S, Th', 'Belum Aktif'),
('CM20191091692', '', '', 'siswa', 'Pranita  Kencana', 'Belum Aktif'),
('CM20191091693', '', '', 'siswa', 'Tjandra  Basoeki', 'Belum Aktif'),
('CM20191091694', '', '', 'siswa', 'Miftakhul  Hilal Alfarizi', 'Belum Aktif'),
('CM20191091695', '', '', 'siswa', 'NADIA  MAGDALENA', 'Belum Aktif'),
('CM20191091696', '', '', 'siswa', 'AXEL DEVARA  PUTRA HALINTAR', 'Belum Aktif'),
('CM20191091697', '', '', 'siswa', 'MUHAMMAD  ARIEF', 'Belum Aktif'),
('CM20191091698', '', '', 'siswa', 'LEXY  JEREMY YOSSEY', 'Belum Aktif'),
('CM20191091699', '', '', 'siswa', 'HALBERT  ', 'Belum Aktif'),
('CM20191091700', '', '', 'siswa', 'LANNY  BASULI', 'Belum Aktif'),
('CM20191091701', '', '', 'siswa', 'SUGENG  PURNOMO', 'Belum Aktif'),
('CM20191091702', '', '', 'siswa', 'ADELIA  SETIAWAN', 'Belum Aktif'),
('CM20191091703', '', '', 'siswa', 'SHIRLEY  SAPUTRO', 'Belum Aktif'),
('CM20191091704', '', '', 'siswa', 'SHIRLEY  SAPUTRO', 'Belum Aktif'),
('CM20191091705', '', '', 'siswa', 'WIRMAN  KWANMAS', 'Belum Aktif'),
('CM20191091706', '', '', 'siswa', 'KANDA  ARYA YUDA', 'Belum Aktif'),
('CM20191091707', '', '', 'siswa', 'SINATRYA  ARDHANA', 'Belum Aktif'),
('CM20191091708', '', '', 'siswa', 'Yuan  Vega vernando', 'Belum Aktif'),
('CM20191091709', '', '', 'siswa', 'GATOT  ', 'Belum Aktif'),
('CM20191091710', '', '', 'siswa', 'ANDRE  CITRA ATMAJA', 'Belum Aktif'),
('CM20191091711', '', '', 'siswa', 'TANTI  DJUWITA', 'Belum Aktif'),
('CM20191091712', '', '', 'siswa', 'TANTI DJUWITA  ', 'Belum Aktif'),
('CM20191091713', '', '', 'siswa', 'AXCEL  TIORIDO PASARIBU', 'Belum Aktif'),
('CM20191091714', '', '', 'siswa', 'MONICA  PRANOTO', 'Belum Aktif'),
('CM20191091715', '', '', 'siswa', 'MADELINE  SUSILO', 'Belum Aktif'),
('CM20191091716', '', '', 'siswa', 'MATEUS  SAMPURNA', 'Belum Aktif'),
('CM20191091717', '', '', 'siswa', 'YOGA  DYMAS', 'Belum Aktif'),
('CM20191091718', '', '', 'siswa', 'NADIA  MAGDALENA', 'Belum Aktif'),
('CM20191091719', '', '', 'siswa', 'JENG  PRAMESTI', 'Belum Aktif'),
('CM20191091720', '', '', 'siswa', 'ENRICO  HARIONO', 'Belum Aktif'),
('CM20191091721', '', '', 'siswa', 'SHIRLEY  MARIA', 'Belum Aktif'),
('CM20191091722', '', '', 'siswa', 'MICHELLE  HILARY SUSANTO', 'Belum Aktif'),
('CM20191091723', '', '', 'siswa', 'HANIFA  NUR RIZKARIMA', 'Belum Aktif'),
('CM20191091724', '', '', 'siswa', 'ADRIAN  SOEGIJONO', 'Belum Aktif'),
('CM20191091725', '', '', 'siswa', 'Levin Jose  Santodo', 'Belum Aktif'),
('CM20191091726', '', '', 'siswa', 'Rosalina Nur  Firdausy', 'Belum Aktif'),
('CM20191091727', '', '', 'siswa', 'CAHYO  ', 'Belum Aktif'),
('CM20191091728', '', '', 'siswa', 'Nita Mega Y.  ', 'Belum Aktif'),
('CM20191091729', '', '', 'siswa', ' Anne  Sellyna', 'Belum Aktif'),
('CM20191091730', '', '', 'siswa', 'ANGGORO  PONCO WISUDA', 'Belum Aktif'),
('CM20191091731', '', '', 'siswa', 'IKE  MERYA FASKA', 'Belum Aktif'),
('CM20191091732', '', '', 'siswa', 'MADELINE  SUSILO', 'Belum Aktif'),
('CM20191091733', '', '', 'siswa', 'Novia  Damayanti', 'Belum Aktif'),
('CM20191091734', '', '', 'siswa', 'R. Auditya  Raihan Ramadhan', 'Belum Aktif'),
('CM20191091735', '', '', 'siswa', 'Sany  Hendrik', 'Belum Aktif'),
('CM20191091736', '', '', 'siswa', 'Sany  Hendrik', 'Belum Aktif'),
('CM20191091737', '', '', 'siswa', 'Indra  Ihdiyanto', 'Belum Aktif'),
('CM20191091740', '', '', 'siswa', 'Esther  Chen', 'Belum Aktif'),
('CM20191091741', '', '', 'siswa', 'NADIA  MAGDALENA', 'Belum Aktif'),
('CM20191091742', '', '', 'siswa', 'Alan  Chen', 'Belum Aktif'),
('CM20191091743', '', '', 'siswa', 'Aden Syahwira  Prasandotama', 'Belum Aktif'),
('CM20191091744', '', '', 'siswa', 'MIKE  DANUHARJA PUTRA', 'Belum Aktif'),
('CM20191091745', '', '', 'siswa', 'MUHAMMAD  THOYEB', 'Belum Aktif'),
('CM20191091746', '', '', 'siswa', 'IVA  RATNA DEWI', 'Belum Aktif'),
('CM20191091747', '', '', 'siswa', 'Oktavia Dina  Praja Sakti', 'Belum Aktif'),
('CM20191091748', '', '', 'siswa', 'AMSORI, S.KOM, MM  ', 'Belum Aktif'),
('CM20191091749', '', '', 'siswa', 'GABRIEL  ANDRIANO BRAMANTYO', 'Belum Aktif'),
('CM20191091750', '', '', 'siswa', 'LADY TANARA  DENISANARY MUHAMIYU', 'Belum Aktif'),
('CM20191091751', '', '', 'siswa', 'Ronald  ', 'Belum Aktif'),
('CM20191091752', '', '', 'siswa', 'Pretty  Wiono', 'Belum Aktif'),
('CM20191091753', '', '', 'siswa', 'karen  Delicia', 'Belum Aktif'),
('CM20191091754', '', '', 'siswa', 'Yogo L  Baskoro', 'Belum Aktif'),
('CM20191091755', '', '', 'siswa', 'Madeline  Susilo', 'Belum Aktif'),
('CM20191091756', '', '', 'siswa', 'Wahyu  Rahman H', 'Belum Aktif'),
('CM20191091757', '', '', 'siswa', 'Budi  Wiyono', 'Belum Aktif'),
('CM20191091758', '', '', 'siswa', 'Aryanti  Puspa ', 'Belum Aktif'),
('CM20191091759', '', '', 'siswa', 'Maureen  Rosalina Suthelie', 'Belum Aktif'),
('CM20191091760', '', '', 'siswa', 'Cindy  Winata', 'Belum Aktif'),
('CM20191091761', '', '', 'siswa', 'Wigya  Defi Charlinda', 'Belum Aktif'),
('CM20191091762', '', '', 'siswa', 'Celine  Tamara Siahu', 'Belum Aktif'),
('CM20191091763', '', '', 'siswa', 'Ubaidillah  Zein', 'Belum Aktif'),
('CM20191091764', '', '', 'siswa', 'Aden Syahwira  Prasandotama', 'Belum Aktif'),
('CM20191091765', '', '', 'siswa', 'Jumadi  ', 'Belum Aktif'),
('CM20191091766', '', '', 'siswa', 'Siti Aisyatul  Hotijah', 'Belum Aktif'),
('CM20191091767', '', '', 'siswa', 'Ninik Nuryani  ', 'Belum Aktif'),
('CM20191091768', '', '', 'siswa', 'Damayanti  ', 'Belum Aktif'),
('CM20191091769', '', '', 'siswa', 'Dwi  Supraptiningsih', 'Belum Aktif'),
('CM20191091770', '', '', 'siswa', 'Niya  Nurjana', 'Belum Aktif'),
('CM20191091771', '', '', 'siswa', 'Mochammad  Wirdan S', 'Belum Aktif'),
('CM20191091772', '', '', 'siswa', 'Alief  Kusumaningtyas Khrishnanti', 'Belum Aktif'),
('CM20191091773', '', '', 'siswa', 'Moh. Bimo  Gondokusumo', 'Belum Aktif'),
('CM20191091774', '', '', 'siswa', 'Erlia  Rofida', 'Belum Aktif'),
('CM20191091775', '', '', 'siswa', 'Stenly Anggara  Purnomo', 'Belum Aktif'),
('CM20191091776', '', '', 'siswa', 'Rizky Andri  Nurdianto', 'Belum Aktif'),
('CM20191091777', '', '', 'siswa', 'Ryan  Tanadi', 'Belum Aktif'),
('CM20191091778', '', '', 'siswa', 'Istirowati  ', 'Belum Aktif'),
('CM20191091779', '', '', 'siswa', 'Rosmayanti  ', 'Belum Aktif'),
('CM20191091780', '', '', 'siswa', 'Megarita  ', 'Belum Aktif'),
('CM20191091781', '', '', 'siswa', 'Ayu  Rochmawati', 'Belum Aktif'),
('CM20191091782', '', '', 'siswa', 'Niwan  Subekti', 'Belum Aktif'),
('CM20191091783', '', '', 'siswa', 'Udrikah  ', 'Belum Aktif'),
('CM20191091784', '', '', 'siswa', 'Reza  Laksmana Nugraha', 'Belum Aktif'),
('CM20191091785', '', '', 'siswa', 'Vicki  Wijaya', 'Belum Aktif'),
('CM20191091786', '', '', 'siswa', 'Vicki  Wijaya', 'Belum Aktif'),
('CM20191091787', '', '', 'siswa', 'Widya  Rahmawati', 'Belum Aktif'),
('CM20191091788', '', '', 'siswa', 'Andhi  Ermawan', 'Belum Aktif'),
('CM20191091789', '', '', 'siswa', 'Ardhityar  Izaaz Suharsono', 'Belum Aktif'),
('CM20191091839', '', '', 'siswa', 'Deny Ferdyansyah', 'Belum Aktif'),
('CM20191091840', '', '', 'siswa', 'Putri Armadiyanti', 'Belum Aktif'),
('CM20191091841', '', '', 'siswa', 'Putri Armadiyanti', 'Belum Aktif'),
('CM20191091842', '', '', 'siswa', 'Rizky Anjani', 'Belum Aktif'),
('CM20191091843', '', '', 'siswa', 'Afiyan Rawali', 'Belum Aktif'),
('CM20191091844', '', '', 'siswa', 'Lisa Rosalina', 'Belum Aktif'),
('CM20191091845', '', '', 'siswa', 'Bergas Eldi', 'Belum Aktif'),
('CM20191091846', '', '', 'siswa', 'Monika Susanto', 'Belum Aktif'),
('CM20191091847', '', '', 'siswa', 'Harits Hakim', 'Belum Aktif'),
('CM20191091848', '', '', 'siswa', 'Adi Sasongko', 'Belum Aktif'),
('CM20191091849', '', '', 'siswa', 'Vemi Indah Suwita', 'Belum Aktif'),
('CM20191091850', '', '', 'siswa', 'Hafiz Azhar', 'Belum Aktif'),
('CM20191091851', '', '', 'siswa', 'Budi Setyawan', 'Belum Aktif'),
('CM20191091852', '', '', 'siswa', 'Ditya Septiansyah', 'Belum Aktif'),
('CM20191091853', '', '', 'siswa', 'Abyzan Haq', 'Belum Aktif'),
('CM20191091854', '', '', 'siswa', 'Jefferson Bion Eddy', 'Belum Aktif'),
('CM20191091855', '', '', 'siswa', 'Yosephine Susanto', 'Belum Aktif'),
('CM20191091856', '', '', 'siswa', 'Asep -', 'Belum Aktif'),
('CM20191091857', '', '', 'siswa', 'Jefferson Bion Eddy', 'Belum Aktif'),
('CM20191091858', '', '', 'siswa', 'Rianty Fadlilah', 'Belum Aktif'),
('CM20191091859', '', '', 'siswa', 'Wildan Nugroho', 'Belum Aktif'),
('CM20191091860', '', '', 'siswa', 'Rafi Dimas', 'Belum Aktif'),
('CM20191091861', '', '', 'siswa', 'Rizal Agusta', 'Belum Aktif'),
('CM20191091862', '', '', 'siswa', 'Andreas Edwin Watungadha', 'Belum Aktif'),
('CM20191091863', '', '', 'siswa', 'Grace Suwono', 'Belum Aktif'),
('CM20191091864', '', '', 'siswa', 'Raynaldi Akbar', 'Belum Aktif'),
('CM20191091865', '', '', 'siswa', 'Radyan Atma W.Wardhana', 'Belum Aktif'),
('CM20191091866', '', '', 'siswa', 'Probo Moeljadi', 'Belum Aktif'),
('CM20191091867', '', '', 'siswa', 'Ditta Nugroho', 'Belum Aktif'),
('CM20191091868', '', '', 'siswa', 'Riesa Argesti Dayanti', 'Belum Aktif'),
('CM20191091869', '', '', 'siswa', 'Davine -', 'Belum Aktif'),
('CM20191091870', '', '', 'siswa', 'Moch Abdulloh Mahin', 'Belum Aktif'),
('CM20191091871', '', '', 'siswa', 'Tio Irwantono', 'Belum Aktif'),
('CM20191091872', '', '', 'siswa', 'Prastawa Wirjotenojo', 'Belum Aktif'),
('CM20191091873', '', '', 'siswa', 'I Gusti Edwin', 'Belum Aktif'),
('CM20191091874', '', '', 'siswa', 'Garaswara Arif Prabowo', 'Belum Aktif'),
('CM20191091875', '', '', 'siswa', 'Kezia Gozali', 'Belum Aktif'),
('CM20191091876', '', '', 'siswa', 'Johan Soewanda', 'Belum Aktif'),
('CM20191091877', '', '', 'siswa', 'Erna Gunawan', 'Belum Aktif'),
('CM20191091878', '', '', 'siswa', 'Derry Prasetya', 'Belum Aktif'),
('CM20191091879', '', '', 'siswa', 'Muhammad Bima', 'Belum Aktif'),
('CM20191091880', '', '', 'siswa', 'Aldhila Kurniawan', 'Belum Aktif'),
('CM20191091881', '', '', 'siswa', 'Matilde Tansatrisna', 'Belum Aktif'),
('CM20191091882', '', '', 'siswa', 'Grace Rompies', 'Belum Aktif'),
('CM20191091883', '', '', 'siswa', 'I Gusti Edwin', 'Belum Aktif'),
('CM20191091884', '', '', 'siswa', 'Supriyadi -', 'Belum Aktif'),
('CM20191091885', '', '', 'siswa', 'Tedjo Nugroho Harijadi', 'Belum Aktif'),
('CM20191091886', '', '', 'siswa', 'Vincentius Lilimanak', 'Belum Aktif'),
('CM20191091887', '', '', 'siswa', 'Arisandy Kurniawan', 'Belum Aktif'),
('CM20191091888', '', '', 'siswa', 'Rizkyka Harjono', 'Belum Aktif'),
('CM20191091889', '', '', 'siswa', 'Berlianata -', 'Belum Aktif'),
('CM20191091890', '', '', 'siswa', 'Heri Santoso', 'Belum Aktif'),
('CM20191091891', '', '', 'siswa', 'Dwita Mei', 'Belum Aktif'),
('CM20191091892', '', '', 'siswa', 'Fransiska -', 'Belum Aktif'),
('CM20191091893', '', '', 'siswa', 'Harisuddin Hawali', 'Belum Aktif'),
('CM20191091894', '', '', 'siswa', 'Myron Widyananta', 'Belum Aktif'),
('CM20191091895', '', '', 'siswa', 'Ahmad Hamzah', 'Belum Aktif'),
('CM20191091896', '', '', 'siswa', 'Davine -', 'Belum Aktif'),
('CM20191091897', '', '', 'siswa', 'Yus Ananto', 'Belum Aktif'),
('CM20191091898', '', '', 'siswa', 'Geraldo -', 'Belum Aktif'),
('CM20191091899', '', '', 'siswa', 'Muhammad Haekal', 'Belum Aktif'),
('CM20191091900', '', '', 'siswa', 'Sugeng Priyono', 'Belum Aktif'),
('CM20191091901', '', '', 'siswa', 'Dhimas Budiarso', 'Belum Aktif'),
('CM20191091902', '', '', 'siswa', 'Andri Kristiawan', 'Belum Aktif'),
('CM20191091903', '', '', 'siswa', 'Kenny Stefanus', 'Belum Aktif'),
('CM20191091904', '', '', 'siswa', 'Arif Fahmi', 'Belum Aktif'),
('CM20191091905', '', '', 'siswa', 'Purnomo  ', 'Belum Aktif'),
('CM20191091906', '', '', 'siswa', 'Ichlasul Romadona', 'Belum Aktif'),
('CM20191091907', '', '', 'siswa', 'Josephine Permata', 'Belum Aktif'),
('CM20191091908', '', '', 'siswa', 'Fauziyah  ', 'Belum Aktif'),
('CM20191091909', '', '', 'siswa', 'Hilmi Yahya', 'Belum Aktif'),
('CM20191091910', '', '', 'siswa', 'Herru Prasetyo', 'Belum Aktif'),
('CM20191091911', '', '', 'siswa', 'Jonathan Kurniawan', 'Belum Aktif'),
('CM20191091912', '', '', 'siswa', 'Deni Ranoptri', 'Belum Aktif'),
('CM20191091913', '', '', 'siswa', 'Lisania Ayu.A', 'Belum Aktif'),
('CM20191091914', '', '', 'siswa', 'Alvin Yasyfa', 'Belum Aktif'),
('CM20191091915', '', '', 'siswa', 'Rizqy  ', 'Belum Aktif'),
('CM20191091916', '', '', 'siswa', 'Jastin  ', 'Belum Aktif'),
('CM20191091917', '', '', 'siswa', 'Alfeus  ', 'Belum Aktif'),
('CM20191091918', '', '', 'siswa', 'Evert Christian', 'Belum Aktif'),
('CM20191091919', '', '', 'siswa', 'Alfin Yasyfa', 'Belum Aktif'),
('CM20191091920', '', '', 'siswa', 'Luh Putu Gayatri Widiastuti', 'Belum Aktif'),
('CM20191091921', '', '', 'siswa', 'Rochmat Setiawan', 'Belum Aktif'),
('CM20191091922', '', '', 'siswa', 'Ahmad Yusuf Fauzan A.', 'Belum Aktif'),
('CM20191091923', '', '', 'siswa', 'Krismawan Wahyu Eko', 'Belum Aktif'),
('CM20191091924', '', '', 'siswa', 'Budi Setyawan', 'Belum Aktif'),
('CM20191091925', '', '', 'siswa', 'Raditya Favian Asa', 'Belum Aktif'),
('CM20191091926', '', '', 'siswa', 'Levina  Limantoro', 'Belum Aktif'),
('CM20191091927', '', '', 'siswa', 'Vecky Sosio Ariyono', 'Belum Aktif'),
('CM20191091928', '', '', 'siswa', 'Bima IP', 'Belum Aktif'),
('CM20191091929', '', '', 'siswa', 'Indra Putra Ardi', 'Belum Aktif'),
('CM20191091930', '', '', 'siswa', 'Muchammad Ariex Irawan', 'Belum Aktif'),
('CM20191091931', '', '', 'siswa', 'Arline Hartani', 'Belum Aktif'),
('CM20191091932', '', '', 'siswa', 'Iwan Zuhriyanto', 'Belum Aktif'),
('CM20191091933', '', '', 'siswa', 'David Toga Franklin Siagan', 'Belum Aktif'),
('CM20191091934', '', '', 'siswa', 'Antonius Paulus Wempy', 'Belum Aktif'),
('CM20191091935', '', '', 'siswa', 'Didit Aditya Christanto', 'Belum Aktif'),
('CM20191091936', '', '', 'siswa', 'Rita Muliana', 'Belum Aktif'),
('CM20191091937', '', '', 'siswa', 'Ferry Susilo', 'Belum Aktif'),
('CM20191091938', '', '', 'siswa', 'Damianus Adii', 'Belum Aktif'),
('CM20191091939', '', '', 'siswa', 'Pandu Swasono Putra', 'Belum Aktif'),
('CM20191091940', '', '', 'siswa', 'Sapta Ageng', 'Belum Aktif'),
('CM20191091941', '', '', 'siswa', 'Haris Zulfikar', 'Belum Aktif'),
('CM20191091942', '', '', 'siswa', 'Rizal Hidayatullah', 'Belum Aktif'),
('CM20191091943', '', '', 'siswa', 'Kezia Gozali', 'Belum Aktif'),
('CM20191091944', '', '', 'siswa', 'Abdul Ghofur', 'Belum Aktif'),
('CM20191091945', '', '', 'siswa', 'Aries Novianto', 'Belum Aktif'),
('CM20191091946', '', '', 'siswa', 'Antonnius Halim', 'Belum Aktif'),
('CM20191091947', '', '', 'siswa', 'Sidarta Gautama', 'Belum Aktif'),
('CM20191091948', '', '', 'siswa', 'Bayu Wicaksono', 'Belum Aktif'),
('CM20191091949', '', '', 'siswa', 'Arlean Rosul', 'Belum Aktif'),
('CM20191091950', '', '', 'siswa', 'Himaghna Nugroho', 'Belum Aktif'),
('CM20191091951', '', '', 'siswa', 'Davit Muslimin', 'Belum Aktif'),
('CM20191091952', '', '', 'siswa', 'Gusti Utomo', 'Belum Aktif'),
('CM20191091953', '', '', 'siswa', 'Jessy Wiliana', 'Belum Aktif'),
('CM20191091954', '', '', 'siswa', 'Elvin Farianti', 'Belum Aktif'),
('CM20191091955', '', '', 'siswa', 'Adrian Hartono', 'Belum Aktif'),
('CM20191091958', '', '', 'siswa', 'Evi Ari Santi', 'Belum Aktif'),
('CM20191091959', '', '', 'siswa', 'Widya Satria', 'Belum Aktif'),
('CM20191091960', '', '', 'siswa', 'Arvidian Harsono', 'Belum Aktif'),
('CM20191091961', '', '', 'siswa', 'Aldhila Kurniawan', 'Belum Aktif'),
('CM20191091962', '', '', 'siswa', 'Charles Hendry', 'Belum Aktif'),
('CM20191091963', '', '', 'siswa', 'Yosephine Susanto', 'Belum Aktif'),
('CM20191091964', '', '', 'siswa', 'Wildan Nugroho', 'Belum Aktif'),
('CM20191091965', '', '', 'siswa', 'Bulan Amanda', 'Belum Aktif'),
('CM20191091966', '', '', 'siswa', 'Ari Ramadhan', 'Belum Aktif'),
('CM20191091967', '', '', 'siswa', 'Yudhis Yunior', 'Belum Aktif'),
('CM20191091968', '', '', 'siswa', 'Restu Fauzi', 'Belum Aktif'),
('CM20191091969', '', '', 'siswa', 'Maulana Alkadri', 'Belum Aktif'),
('CM20191091970', '', '', 'siswa', 'Andy  ', 'Belum Aktif'),
('CM20191091971', '', '', 'siswa', 'Christofer Oktavianus', 'Belum Aktif'),
('CM20191091972', '', '', 'siswa', 'Winston Wiratama', 'Belum Aktif'),
('CM20191091973', '', '', 'siswa', 'Choirul Anam', 'Belum Aktif'),
('CM20191091974', '', '', 'siswa', 'Andi Suharsono', 'Belum Aktif'),
('CM20191091975', '', '', 'siswa', 'M.Rendra Fristana', 'Belum Aktif'),
('CM20191091976', '', '', 'siswa', 'Prince Dipa', 'Belum Aktif'),
('CM20191091977', '', '', 'siswa', 'Putu Sidharta', 'Belum Aktif'),
('CM20191091978', '', '', 'siswa', 'Jaka Irianto', 'Belum Aktif'),
('CM20191091979', '', '', 'siswa', 'Diani Vira', 'Belum Aktif'),
('CM20191091980', '', '', 'siswa', 'Alvian -', 'Belum Aktif'),
('CM20191091981', '', '', 'siswa', 'Wahono Santoso', 'Belum Aktif'),
('CM20191091982', '', '', 'siswa', 'Angga Pratama', 'Belum Aktif'),
('CM20191091983', '', '', 'siswa', 'Erviana Oktavia', 'Belum Aktif'),
('CM20191091984', '', '', 'siswa', 'Madina Rizkya', 'Belum Aktif'),
('CM20191091985', '', '', 'siswa', 'Retno Harlia', 'Belum Aktif'),
('CM20191091986', '', '', 'siswa', 'Stevan Jordie', 'Belum Aktif'),
('CM20191091987', '', '', 'siswa', 'Felicia Austin', 'Belum Aktif'),
('CM20191091988', '', '', 'siswa', 'Carenina Aesha', 'Belum Aktif'),
('CM20191091989', '', '', 'siswa', 'Burhanuddin Hanantyo', 'Belum Aktif'),
('CM20191091990', '', '', 'siswa', 'Kanya Catya', 'Belum Aktif'),
('CM20191091991', '', '', 'siswa', 'Rizki Farakkhan', 'Belum Aktif'),
('CM20191091992', '', '', 'siswa', 'Dion Ramadhan', 'Belum Aktif'),
('CM20191091993', '', '', 'siswa', 'Wahyu Prasbudianto', 'Belum Aktif'),
('CM20191091994', '', '', 'siswa', 'Yusuf Effendi', 'Belum Aktif'),
('CM20191091995', '', '', 'siswa', 'Lilyani Harsono', 'Belum Aktif'),
('CM20191091996', '', '', 'siswa', 'Siswanto -', 'Belum Aktif'),
('CM20191091997', '', '', 'siswa', 'Adib Patarbudi', 'Belum Aktif'),
('CM20191091998', '', '', 'siswa', 'Afi  Sunani', 'Belum Aktif'),
('CM20191091999', '', '', 'siswa', 'Agus  Subroto', 'Belum Aktif'),
('CM20191092000', '', '', 'siswa', 'M. Adam  Alvan', 'Belum Aktif'),
('CM20191092001', '', '', 'siswa', 'Taufik Hidayat', 'Belum Aktif'),
('CM20191092002', '', '', 'siswa', 'Ponco Agung  Wibowo', 'Belum Aktif'),
('CM20191092003', '', '', 'siswa', 'widhera Yoza Mahana', 'Belum Aktif'),
('CM20191092004', '', '', 'siswa', 'Djohan Prabowo', 'Belum Aktif'),
('CM20191092005', '', '', 'siswa', 'Sepriyadi  ', 'Belum Aktif'),
('CM20191092006', '', '', 'siswa', 'Lina  Mardiani', 'Belum Aktif'),
('CM20191092007', '', '', 'siswa', 'Antonia  Kurniawan', 'Belum Aktif'),
('CM20191092008', '', '', 'siswa', 'Andreas Lumanto', 'Belum Aktif'),
('CM20191092009', '', '', 'siswa', 'Vivi Aliati  Nurjannah Laili', 'Belum Aktif'),
('CM20191092010', '', '', 'siswa', 'Sukartini  ', 'Belum Aktif'),
('CM20191092011', '', '', 'siswa', 'Harisita  Nurfaizah', 'Belum Aktif'),
('CM20191092012', '', '', 'siswa', 'Kiky  Arum Sandra', 'Belum Aktif'),
('CM20191092013', '', '', 'siswa', 'Sukasih  ', 'Belum Aktif'),
('CM20191092014', '', '', 'siswa', 'Adi Hermawan', 'Belum Aktif'),
('CM20191092015', '', '', 'siswa', 'Wigya  Defi Clarlinda', 'Belum Aktif'),
('CM20191092016', '', '', 'siswa', 'Yohanes Steven Wijaya', 'Belum Aktif'),
('CM20191092017', '', '', 'siswa', 'Yulia  Lonesti', 'Belum Aktif'),
('CM20191092018', '', '', 'siswa', 'Faris Alkomi', 'Belum Aktif'),
('CM20191092019', '', '', 'siswa', 'Syafrianto  ', 'Belum Aktif'),
('CM20191092020', '', '', 'siswa', 'The Djioe  Ing', 'Belum Aktif'),
('CM20191092021', '', '', 'siswa', 'Naufal Afifi', 'Belum Aktif'),
('CM20191092022', '', '', 'siswa', 'Angga  Hardika Pratama', 'Belum Aktif'),
('CM20191092023', '', '', 'siswa', 'Wirapratama  ', 'Belum Aktif'),
('CM20191092024', '', '', 'siswa', 'Dewinda Julianensi Rumala', 'Belum Aktif'),
('CM20191092025', '', '', 'siswa', 'Ardhityar  I.S', 'Belum Aktif'),
('CM20191092026', '', '', 'siswa', 'Setyanantha Hariyono', 'Belum Aktif'),
('CM20191092027', '', '', 'siswa', 'The Djioe Ing  ', 'Belum Aktif'),
('CM20191092028', '', '', 'siswa', 'Dimas Hari Prasetyo', 'Belum Aktif'),
('CM20191092029', '', '', 'siswa', 'Angga  Hardika Pratama', 'Belum Aktif'),
('CM20191092030', '', '', 'siswa', 'Budiman  ', 'Belum Aktif'),
('CM20191092031', '', '', 'siswa', 'Agitha  Mahardika H', 'Belum Aktif'),
('CM20191092032', '', '', 'siswa', 'Bima IP', 'Belum Aktif'),
('CM20191092033', '', '', 'siswa', 'Maydina  Sari Fariski', 'Belum Aktif'),
('CM20191092034', '', '', 'siswa', 'Bona Hutauruk', 'Belum Aktif'),
('CM20191092035', '', '', 'siswa', 'Bayu  Soewando Geni', 'Belum Aktif'),
('CM20191092036', '', '', 'siswa', 'Cindy Patricia', 'Belum Aktif'),
('CM20191092037', '', '', 'siswa', 'Muhammad Asril Machrus', 'Belum Aktif'),
('CM20191092038', '', '', 'siswa', 'Enrico J.Hartono', 'Belum Aktif'),
('CM20191092039', '', '', 'siswa', 'Permadina Kanah Arieska', 'Belum Aktif'),
('CM20191092040', '', '', 'siswa', 'Yudas Tadeus  Lelang', 'Belum Aktif'),
('CM20191092041', '', '', 'siswa', 'Mutiara Ningrum', 'Belum Aktif'),
('CM20191092042', '', '', 'siswa', 'Irenne  Ninna Kennady', 'Belum Aktif'),
('CM20191092043', '', '', 'siswa', 'Dewi Yemima', 'Belum Aktif'),
('CM20191092044', '', '', 'siswa', 'Githa Amtia  Barshobedie', 'Belum Aktif'),
('CM20191092045', '', '', 'siswa', 'Setyanantha Hariyono', 'Belum Aktif'),
('CM20191092046', '', '', 'siswa', 'Frisca Sannia', 'Belum Aktif'),
('CM20191092047', '', '', 'siswa', 'Widya Satria Utomo', 'Belum Aktif'),
('CM20191092048', '', '', 'siswa', 'Irtifa Citra Agustin', 'Belum Aktif'),
('CM20191092049', '', '', 'siswa', 'Likhu Puspa Hapsari', 'Belum Aktif'),
('CM20191092050', '', '', 'siswa', 'Sisca Putri Sanni', 'Belum Aktif'),
('CM20191092051', '', '', 'siswa', 'Didit Aditya Christanto', 'Belum Aktif'),
('CM20191092052', '', '', 'siswa', 'Rizal Fardan', 'Belum Aktif'),
('CM20191092053', '', '', 'siswa', 'Suleman  ', 'Belum Aktif'),
('CM20191092054', '', '', 'siswa', ' Kelly  Utomo ', 'Belum Aktif'),
('CM20191092055', '', '', 'siswa', ' Julia Kartika  Kolondam ', 'Belum Aktif'),
('CM20191092056', '', '', 'siswa', ' Ardhityar  Izaaz Suharsono ', 'Belum Aktif'),
('CM20191092057', '', '', 'siswa', 'Gerald Francis  Russell', 'Belum Aktif'),
('CM20191092058', '', '', 'siswa', 'Saddhana  Arta Daniswara', 'Belum Aktif'),
('CM20191092059', '', '', 'siswa', 'Geri Purna  Irawan', 'Belum Aktif'),
('CM20191092060', '', '', 'siswa', 'Andrew  Kamajaya', 'Belum Aktif'),
('CM20191092061', '', '', 'siswa', 'Cindy Patricia', 'Belum Aktif'),
('CM20191092062', '', '', 'siswa', 'Silvia  Aci Cynthia', 'Belum Aktif'),
('CM20191092063', '', '', 'siswa', 'Devietha  Kurnia Sari', 'Belum Aktif'),
('CM20191092064', '', '', 'siswa', 'Jenny  Susantawati', 'Belum Aktif'),
('CM20191092065', '', '', 'siswa', 'Hendra  ', 'Belum Aktif'),
('CM20191092066', '', '', 'siswa', 'Jovan  Hariono', 'Belum Aktif'),
('CM20191092067', '', '', 'siswa', 'Vina  Valencia', 'Belum Aktif'),
('CM20191092068', '', '', 'siswa', 'M.Dzakwan Taqy', 'Belum Aktif'),
('CM20191092069', '', '', 'siswa', 'Nabila  Putri', 'Belum Aktif'),
('CM20191092070', '', '', 'siswa', 'Josevina  Gaby', 'Belum Aktif'),
('CM20191092071', '', '', 'siswa', 'Dwi Wanto Saputro', 'Belum Aktif'),
('CM20191092072', '', '', 'siswa', 'Shannia Olivia  Budiman', 'Belum Aktif'),
('CM20191092073', '', '', 'siswa', 'Hilmi Yahya', 'Belum Aktif'),
('CM20191092074', '', '', 'siswa', 'Kennard Austin  Sutanto', 'Belum Aktif'),
('CM20191092075', '', '', 'siswa', 'Rendhy Riri  Ananta', 'Belum Aktif'),
('CM20191092076', '', '', 'siswa', 'Ryan Wijaya', 'Belum Aktif'),
('CM20191092077', '', '', 'siswa', 'Nugraha Nur Rusandy', 'Belum Aktif'),
('CM20191092078', '', '', 'siswa', 'Patricia  Gunawan', 'Belum Aktif'),
('CM20191092079', '', '', 'siswa', 'Mario Moses Astari', 'Belum Aktif'),
('CM20191092080', '', '', 'siswa', 'Bayu  Kristianto', 'Belum Aktif'),
('CM20191092081', '', '', 'siswa', 'Almada  Adevelia', 'Belum Aktif'),
('CM20191092082', '', '', 'siswa', 'Hasan  Mustofa', 'Belum Aktif'),
('CM20191092083', '', '', 'siswa', 'Novella Devina Adellia', 'Belum Aktif'),
('CM20191092084', '', '', 'siswa', 'Rusman Hartono', 'Belum Aktif'),
('CM20191092085', '', '', 'siswa', 'Mike  Danuharja Putra', 'Belum Aktif'),
('CM20191092086', '', '', 'siswa', 'Jessica  W', 'Belum Aktif'),
('CM20191092087', '', '', 'siswa', 'Katherine  W', 'Belum Aktif'),
('CM20191092088', '', '', 'siswa', 'Samsul  Arifin', 'Belum Aktif'),
('CM20191092089', '', '', 'siswa', 'Khaerul  Fuad', 'Belum Aktif'),
('CM20191092090', '', '', 'siswa', 'Khaerul  Fuad', 'Belum Aktif'),
('CM20191092091', '', '', 'siswa', ' Ardhityar  Izaaz Suharsono ', 'Belum Aktif'),
('CM20191092092', '', '', 'siswa', 'Lenny  Jauliany', 'Belum Aktif'),
('CM20191092093', '', '', 'siswa', 'Richy  Setyawan', 'Belum Aktif'),
('CM20191092094', '', '', 'siswa', 'M. Dani  Fajar Lutfian', 'Belum Aktif'),
('CM20191092095', '', '', 'siswa', 'Abdurrohim  Nur', 'Belum Aktif'),
('CM20191092096', '', '', 'siswa', 'Ming  Siswoyo', 'Belum Aktif'),
('CM20191092097', '', '', 'siswa', 'Syarif  Mahfudin', 'Belum Aktif'),
('CM20191092098', '', '', 'siswa', 'Hendro  Wang', 'Belum Aktif'),
('CM20191092099', '', '', 'siswa', 'Ray  ', 'Belum Aktif'),
('CM20191092100', '', '', 'siswa', 'Arum  Rizka Nursantari', 'Belum Aktif'),
('CM20191092101', '', '', 'siswa', 'Choirib Mahendra T.P  ', 'Belum Aktif'),
('CM20191092102', '', '', 'siswa', 'Muhammad Helmi  Wahyudi, ST', 'Belum Aktif'),
('CM20191092103', '', '', 'siswa', 'Rizky Aditya  Faqihatin', 'Belum Aktif'),
('CM20191092104', '', '', 'siswa', 'Deta  Frischa', 'Belum Aktif'),
('CM20191092105', '', '', 'siswa', 'Riga  Armando', 'Belum Aktif'),
('CM20191092106', '', '', 'siswa', 'Patricia  Gunawan', 'Belum Aktif'),
('CM20191092107', '', '', 'siswa', 'Michael  Wijaya', 'Belum Aktif'),
('CM20191092108', '', '', 'siswa', 'Jessica W  ', 'Belum Aktif'),
('CM20191092109', '', '', 'siswa', 'Chrisdiyanto  Triwibowo', 'Belum Aktif'),
('CM20191092110', '', '', 'siswa', 'Stevanus  Natanael M.', 'Belum Aktif'),
('CM20191092111', '', '', 'siswa', 'Forny Octora  Baringbing', 'Belum Aktif'),
('CM20191092112', '', '', 'siswa', 'Ady  Wibisono', 'Belum Aktif'),
('CM20191092113', '', '', 'siswa', 'Achmad  Fani', 'Belum Aktif'),
('CM20191092114', '', '', 'siswa', 'Suta  Ramadhan', 'Belum Aktif'),
('CM20191092115', '', '', 'siswa', 'Kenneth  Nathanael T', 'Belum Aktif'),
('CM20191092116', '', '', 'siswa', 'Mike Danuharja  Putra', 'Belum Aktif'),
('CM20191092117', '', '', 'siswa', 'Michael  Christophi Wibisono', 'Belum Aktif'),
('CM20191092118', '', '', 'siswa', 'Erick Christopher  Hartono', 'Belum Aktif'),
('CM20191092119', '', '', 'siswa', 'Alexandro  Surya Putra', 'Belum Aktif'),
('CM20191092120', '', '', 'siswa', 'Zulkarnain  Daeng Effendi', 'Belum Aktif'),
('CM20191092121', '', '', 'siswa', 'Matias Cosmas  Ratusintano', 'Belum Aktif'),
('CM20191092122', '', '', 'siswa', 'Heru  Cahyono', 'Belum Aktif'),
('CM20191092123', '', '', 'siswa', 'Alvin  Suwignjo', 'Belum Aktif'),
('CM20191092124', '', '', 'siswa', 'Melyana  Gozali', 'Belum Aktif'),
('CM20191092125', '', '', 'siswa', 'Yonatan  Passal', 'Belum Aktif'),
('CM20191092126', '', '', 'siswa', 'Iyan  Hadinata', 'Belum Aktif'),
('CM20191092127', '', '', 'siswa', 'Ardhityar Izaaz  Suharsono', 'Belum Aktif'),
('CM20191092128', '', '', 'siswa', 'Ardhityar Izaaz  Suharsono', 'Belum Aktif'),
('CM20191092129', '', '', 'siswa', 'Cliff Claudio', 'Belum Aktif'),
('CM20191092130', '', '', 'siswa', 'R.M. Ariel Febriansyah M.S', 'Belum Aktif'),
('CM20191092131', '', '', 'siswa', 'Amirah Setyaningrum', 'Belum Aktif'),
('CM20191092132', '', '', 'siswa', 'Moch Nurfuadi', 'Belum Aktif'),
('CM20191092133', '', '', 'siswa', 'Ruhanda Merdiansa', 'Belum Aktif'),
('CM20191092134', '', '', 'siswa', 'Deddy Setiabudi', 'Belum Aktif'),
('CM20191092135', '', '', 'siswa', 'aditya parama hadi', 'Belum Aktif'),
('CM20191092136', '', '', 'siswa', 'Rakha Asyrofi', 'Belum Aktif'),
('CM20191092137', '', '', 'siswa', 'Aron  ', 'Belum Aktif'),
('CM20191092138', '', '', 'siswa', 'Syahrul Ramadhany', 'Belum Aktif'),
('CM20191092139', '', '', 'siswa', 'Jeremy Adriel', 'Belum Aktif'),
('CM20191092140', '', '', 'siswa', 'Khaerul  Fuad', 'Belum Aktif'),
('CM20191092141', '', '', 'siswa', 'Akhmad Faizal', 'Belum Aktif'),
('CM20191092142', '', '', 'siswa', 'Endro  ', 'Belum Aktif'),
('CM20191092143', '', '', 'siswa', 'Eva  Noviana', 'Belum Aktif'),
('CM20191092144', '', '', 'siswa', 'Sandra Cicilia', 'Belum Aktif'),
('CM20191092145', '', '', 'siswa', 'Bambang Seswanto', 'Belum Aktif'),
('CM20191092146', '', '', 'siswa', 'Felicia  Tonggoredjo', 'Belum Aktif'),
('CM20191092147', '', '', 'siswa', 'Ade  Sulistio', 'Belum Aktif'),
('CM20191092148', '', '', 'siswa', 'Liem Gunawan Chandra', 'Belum Aktif'),
('CM20191092149', '', '', 'siswa', 'Dwi  Satrio', 'Belum Aktif'),
('CM20191092150', '', '', 'siswa', 'Saifur Rohman', 'Belum Aktif'),
('CM20191092151', '', '', 'siswa', 'Mario Hartoyo', 'Belum Aktif'),
('CM20191092152', '', '', 'siswa', 'Sugiarto  ', 'Belum Aktif'),
('CM20191092153', '', '', 'siswa', 'Karang  Reksa Ginolla', 'Belum Aktif'),
('CM20191092154', '', '', 'siswa', 'Adik  Kurniawan', 'Belum Aktif'),
('CM20191092155', '', '', 'siswa', 'Pebrian  Yonas Saputra', 'Belum Aktif'),
('CM20191092156', '', '', 'siswa', 'Zulqarnain  Majid', 'Belum Aktif'),
('CM20191092157', '', '', 'siswa', 'Muhammad  Abdul Ghofur', 'Belum Aktif'),
('CM20191092158', '', '', 'siswa', 'Akhmad Farid  Widiarto', 'Belum Aktif'),
('CM20191092159', '', '', 'siswa', 'Tricia Indah  Wijaya Njo', 'Belum Aktif'),
('CM20191092160', '', '', 'siswa', 'Denis Arif  Saputro', 'Belum Aktif'),
('CM20191092161', '', '', 'siswa', 'Rahmat  Wijaya', 'Belum Aktif'),
('CM20191092162', '', '', 'siswa', 'Arif Bagus  Amaludin', 'Belum Aktif'),
('CM20191092163', '', '', 'siswa', 'Michael William  Soegijono', 'Belum Aktif'),
('CM20191092164', '', '', 'siswa', 'Yusuf  Arjuna Rasyid', 'Belum Aktif'),
('CM20191092165', '', '', 'siswa', 'Billy  Yunarto', 'Belum Aktif'),
('CM20191092166', '', '', 'siswa', 'Arizona  Herfay', 'Belum Aktif'),
('CM20191092167', '', '', 'siswa', 'Fahmi Amiruddin', 'Belum Aktif'),
('CM20191092168', '', '', 'siswa', 'Catharina Nesti', 'Belum Aktif'),
('CM20191092169', '', '', 'siswa', 'Fransiskus Arnoldy', 'Belum Aktif'),
('CM20191092170', '', '', 'siswa', 'Charina Eka N.T', 'Belum Aktif'),
('CM20191092171', '', '', 'siswa', 'Yusuf Parri Akbar', 'Belum Aktif'),
('CM20191092172', '', '', 'siswa', 'Tia Kristina', 'Belum Aktif'),
('CM20191092173', '', '', 'siswa', 'Bintang Muhammad', 'Belum Aktif'),
('CM20191092174', '', '', 'siswa', 'Prawindya Puspita Karuni', 'Belum Aktif'),
('CM20191092175', '', '', 'siswa', 'Yunita Alisia Nurma', 'Belum Aktif'),
('CM20191092176', '', '', 'siswa', 'Prevandito Wahyu Widodo', 'Belum Aktif'),
('CM20191092177', '', '', 'siswa', 'Muhtar Marzuqi', 'Belum Aktif'),
('CM20191092178', '', '', 'siswa', 'Nicholas Ang', 'Belum Aktif'),
('CM20191092179', '', '', 'siswa', 'Yasreza Elrisal', 'Belum Aktif'),
('CM20191092180', '', '', 'siswa', 'Muhammad Firman Nur Setiawan', 'Belum Aktif'),
('CM20191092181', '', '', 'siswa', 'Novia Milasari Sugianto', 'Belum Aktif'),
('CM20191092182', '', '', 'siswa', 'Ahmed  Andrew', 'Belum Aktif'),
('CM20191092183', '', '', 'siswa', 'David Maulana', 'Belum Aktif'),
('CM20191092184', '', '', 'siswa', 'Ghozi Mukhlishon', 'Belum Aktif'),
('CM20191092185', '', '', 'siswa', 'Gamaria Mandar', 'Belum Aktif'),
('CM20191092186', '', '', 'siswa', 'Tri Sunarti ', 'Belum Aktif'),
('CM20191092187', '', '', 'siswa', 'Vania Eunike Setiabudi', 'Belum Aktif'),
('CM20191092188', '', '', 'siswa', 'Timothy Johan', 'Belum Aktif'),
('CM20191092189', '', '', 'siswa', 'Felicius Rindy Kurniawan', 'Belum Aktif'),
('CM20191092190', '', '', 'siswa', 'Fachreza Reynaldi Nugroho', 'Belum Aktif'),
('CM20191092191', '', '', 'siswa', 'Dewantami Putri Pertiwi', 'Belum Aktif'),
('CM20191092192', '', '', 'siswa', 'Putri Permatasari', 'Belum Aktif'),
('CM20191092193', '', '', 'siswa', 'Norry Febriani', 'Belum Aktif'),
('CM20191092194', '', '', 'siswa', 'Sri Kumalawati', 'Belum Aktif'),
('CM20191092195', '', '', 'siswa', 'Tony Hadi Saputra', 'Belum Aktif'),
('CM20191092196', '', '', 'siswa', 'Fairus Rizkitasari', 'Belum Aktif'),
('CM20191092197', '', '', 'siswa', 'Achmad Salim Kurniawan', 'Belum Aktif'),
('CM20191092198', '', '', 'siswa', 'Annisa Fajar Fitriani', 'Belum Aktif'),
('CM20191092199', '', '', 'siswa', 'Luffi Rahman', 'Belum Aktif'),
('CM20191092200', '', '', 'siswa', 'Dissya  Bennaogest', 'Belum Aktif'),
('CM20191092201', '', '', 'siswa', 'Mohamad  Imron', 'Belum Aktif'),
('CM20191092202', '', '', 'siswa', 'Cecilia  Renata Tanjung', 'Belum Aktif'),
('CM20191092203', '', '', 'siswa', 'Nadiviansyah  Prizaldy P', 'Belum Aktif'),
('CM20191092204', '', '', 'siswa', 'Sandrina Gita  Andra Rizti', 'Belum Aktif'),
('CM20191092205', '', '', 'siswa', 'Muthya  Gusteen', 'Belum Aktif'),
('CM20191092206', '', '', 'siswa', 'M. Arief  Kurniawan, ST', 'Belum Aktif'),
('CM20191092207', '', '', 'siswa', 'Ivana  ', 'Belum Aktif'),
('CM20191092208', '', '', 'siswa', 'Hubaib  Ansharullah', 'Belum Aktif'),
('CM20191092209', '', '', 'siswa', 'Bridget  Beatrix C', 'Belum Aktif'),
('CM20191092210', '', '', 'siswa', 'Andrew  Santoso', 'Belum Aktif'),
('CM20191092211', '', '', 'siswa', 'Mikha  Lukmansyah', 'Belum Aktif'),
('CM20191092212', '', '', 'siswa', 'Herwin  Zakiyah, ST, M. Eng', 'Belum Aktif'),
('CM20191092213', '', '', 'siswa', 'Rinta  Ariestia Hardianti', 'Belum Aktif'),
('CM20191092214', '', '', 'siswa', 'Arief  Cholisudin Y, S. STP, MM', 'Belum Aktif'),
('CM20191092215', '', '', 'siswa', 'Seta Prasetya  Adhi Sunda', 'Belum Aktif'),
('CM20191092216', '', '', 'siswa', 'Sandrina Gita  Andra Rizti', 'Belum Aktif'),
('CM20191092217', '', '', 'siswa', 'Nafis  Zamany Sulthon ', 'Belum Aktif'),
('CM20191092218', '', '', 'siswa', 'Ori  ', 'Belum Aktif'),
('CM20191092219', '', '', 'siswa', 'Eko  Harmoko', 'Belum Aktif'),
('CM20191092220', '', '', 'siswa', 'Gusti  Yoshida Mirza', 'Belum Aktif'),
('CM20191092221', '', '', 'siswa', 'Prisillia Mentari  Kusuma Dewi', 'Belum Aktif'),
('CM20191092222', '', '', 'siswa', 'Achmad  Arif', 'Belum Aktif'),
('CM20191092223', '', '', 'siswa', 'Agus  Budiman', 'Belum Aktif'),
('CM20191092224', '', '', 'siswa', 'Achmad  Fani', 'Belum Aktif'),
('CM20191092225', '', '', 'siswa', 'Kevin  Jackson', 'Belum Aktif'),
('CM20191092226', '', '', 'siswa', 'Nani  ', 'Belum Aktif'),
('CM20191092227', '', '', 'siswa', 'Sheisa Sastaviana  Sudrajat', 'Belum Aktif'),
('CM20191092228', '', '', 'siswa', 'Renny  Herwanto', 'Belum Aktif'),
('CM20191092229', '', '', 'siswa', 'Vina  Taufiq', 'Belum Aktif'),
('CM20191092230', '', '', 'siswa', 'Moch. Nurhasan', 'Belum Aktif'),
('CM20191092231', '', '', 'siswa', 'David Aryanto  Goenawan', 'Belum Aktif'),
('CM20191092232', '', '', 'siswa', 'Akhmad Raihan  Fadhila', 'Belum Aktif'),
('CM20191092233', '', '', 'siswa', 'M. Adlant Nazhari  Yahyasamdie', 'Belum Aktif'),
('CM20191092234', '', '', 'siswa', 'Yogi Surya  Perdana', 'Belum Aktif'),
('CM20191092235', '', '', 'siswa', 'Farah  Desiska', 'Belum Aktif'),
('CM20191092236', '', '', 'siswa', 'Rizqi  Mardiana', 'Belum Aktif'),
('CM20191092237', '', '', 'siswa', 'Ahmad Kodri  Riyandoko', 'Belum Aktif'),
('CM20191092238', '', '', 'siswa', 'Laksono  Hadi Prastyo', 'Belum Aktif'),
('CM20191092239', '', '', 'siswa', 'Dion  Krismashogi D', 'Belum Aktif'),
('CM20191092240', '', '', 'siswa', 'Adelia  Handoko', 'Belum Aktif'),
('CM20191092241', '', '', 'siswa', 'Yudi  Irawan', 'Belum Aktif'),
('CM20191092242', '', '', 'siswa', 'Agung  Rahmadi', 'Belum Aktif'),
('CM20191092243', '', '', 'siswa', 'David  Anggawijaya', 'Belum Aktif'),
('CM20191092244', '', '', 'siswa', 'Komalasari  ', 'Belum Aktif'),
('CM20191092245', '', '', 'siswa', 'Prisillia Mentari  Kusuma Dewi', 'Belum Aktif'),
('CM20191092246', '', '', 'siswa', 'Viona Octavia  Roeslie', 'Belum Aktif'),
('CM20191092247', '', '', 'siswa', 'Andreas  Adinata ', 'Belum Aktif'),
('CM20191092248', '', '', 'siswa', 'Siti  Nur Alifah', 'Belum Aktif'),
('CM20191092249', '', '', 'siswa', 'Yansen  Tri Utomo', 'Belum Aktif'),
('CM20191092250', '', '', 'siswa', 'Tanisma  Basuki', 'Belum Aktif'),
('CM20191092251', '', '', 'siswa', 'Luffi  Febrianto', 'Belum Aktif'),
('CM20191092252', '', '', 'siswa', 'Danti  Fadhila', 'Belum Aktif'),
('CM20191092253', '', '', 'siswa', 'Katrin  Purnama', 'Belum Aktif'),
('CM20191092254', '', '', 'siswa', ' Joko  Amukti Setiabudi ', 'Belum Aktif'),
('CM20191092255', '', '', 'siswa', ' Debora  Paskarina Sormin ', 'Belum Aktif'),
('CM20191092256', '', '', 'siswa', ' Suciati   ', 'Belum Aktif'),
('CM20191092257', '', '', 'siswa', 'Bryan  ', 'Belum Aktif'),
('CM20191092258', '', '', 'siswa', 'Bahrudin  Manshur Arrosyid', 'Belum Aktif'),
('CM20191092259', '', '', 'siswa', 'Enrico  Surya T', 'Belum Aktif'),
('CM20191092260', '', '', 'siswa', 'Hendrik  Setiawan', 'Belum Aktif'),
('CM20191092261', '', '', 'siswa', 'Suciati  ', 'Belum Aktif'),
('CM20191092262', '', '', 'siswa', 'Fina  Angga Wijaya', 'Belum Aktif'),
('CM20191092263', '', '', 'siswa', 'Anggita  Dharaning Lestary', 'Belum Aktif'),
('CM20191092264', '', '', 'siswa', 'Billy  Iskandar', 'Belum Aktif'),
('CM20191092265', '', '', 'siswa', 'Devrita Nur  Ayu Wilujeng', 'Belum Aktif'),
('CM20191092266', '', '', 'siswa', 'Yudi  Chandra', 'Belum Aktif'),
('CM20191092267', '', '', 'siswa', 'Ivana  Rayawan', 'Belum Aktif'),
('CM20191092268', '', '', 'siswa', 'Diyah  Pitaloka', 'Belum Aktif'),
('CM20191092269', '', '', 'siswa', 'Kika  Dunat', 'Belum Aktif'),
('CM20191092270', '', '', 'siswa', 'Hesnod  Daraeny', 'Belum Aktif'),
('CM20191092271', '', '', 'siswa', 'Hesnod  Daraeny', 'Belum Aktif'),
('CM20191092272', '', '', 'siswa', 'Kika  Dunat', 'Belum Aktif'),
('CM20191092273', '', '', 'siswa', 'Tony Setyawan', 'Belum Aktif'),
('CM20191092274', '', '', 'siswa', 'Tony Setyawan', 'Belum Aktif'),
('CM20191092275', '', '', 'siswa', 'Reza Wibowo', 'Belum Aktif'),
('CM20191092276', '', '', 'siswa', 'Rahmad Arifin', 'Belum Aktif'),
('CM20191092277', '', '', 'siswa', 'Nico Winata', 'Belum Aktif'),
('CM20191092278', '', '', 'siswa', 'Reny Claudia', 'Belum Aktif'),
('CM20191092279', '', '', 'siswa', 'Ali Firman', 'Belum Aktif'),
('CM20191092280', '', '', 'siswa', 'Ali Firman', 'Belum Aktif'),
('CM20191092281', '', '', 'siswa', 'David Siagian', 'Belum Aktif'),
('CM20191092282', '', '', 'siswa', 'Sulung Aries', 'Belum Aktif'),
('CM20191092283', '', '', 'siswa', 'Rizki Farakkhan', 'Belum Aktif'),
('CM20191092284', '', '', 'siswa', 'Nikmatul Udchiyah', 'Belum Aktif'),
('CM20191092285', '', '', 'siswa', 'Michael Wijaya', 'Belum Aktif'),
('CM20191092286', '', '', 'siswa', 'Andrien -', 'Belum Aktif'),
('CM20191092287', '', '', 'siswa', 'Muhammad Afinurzaid', 'Belum Aktif'),
('CM20191092288', '', '', 'siswa', 'Awan Putra', 'Belum Aktif'),
('CM20191092289', '', '', 'siswa', 'Chandra Wijaya', 'Belum Aktif'),
('CM20191092290', '', '', 'siswa', 'Vincentius Lestiono', 'Belum Aktif'),
('CM20191092291', '', '', 'siswa', 'Laily Jannah', 'Belum Aktif'),
('CM20191092292', '', '', 'siswa', 'Xanverius Chandra', 'Belum Aktif'),
('CM20191092293', '', '', 'siswa', 'Ulfatul Laily', 'Belum Aktif'),
('CM20191092295', '', '', 'siswa', 'Ragowo Riantory', 'Belum Aktif'),
('CM20191092296', '', '', 'siswa', 'Amirta Wicaksono', 'Belum Aktif'),
('CM20191092297', '', '', 'siswa', 'Aswan -', 'Belum Aktif'),
('CM20191092298', '', '', 'siswa', 'Made Rahayu', 'Belum Aktif'),
('CM20191092299', '', '', 'siswa', 'Christopher Wibisono', 'Belum Aktif'),
('CM20191092300', '', '', 'siswa', 'Rizki Farakkhan', 'Belum Aktif'),
('CM20191092301', '', '', 'siswa', 'Andhika Farakkhan', 'Belum Aktif'),
('CM20191092302', '', '', 'siswa', 'William Wibisono', 'Belum Aktif'),
('CM20191092303', '', '', 'siswa', 'Anas Hanan', 'Belum Aktif'),
('CM20191092304', '', '', 'siswa', 'Donna Laurianto', 'Belum Aktif'),
('CM20191092305', '', '', 'siswa', 'Kadek Mahardika', 'Belum Aktif'),
('CM20191092306', '', '', 'siswa', 'Alief Fakhriadi', 'Belum Aktif'),
('CM20191092307', '', '', 'siswa', 'Yustinus Ukago', 'Belum Aktif'),
('CM20191092308', '', '', 'siswa', 'Garnada Prahasto', 'Belum Aktif'),
('CM20191092309', '', '', 'siswa', 'Calvina  ', 'Belum Aktif'),
('CM20191092310', '', '', 'siswa', 'Abdul Aziz Al Hakim', 'Belum Aktif'),
('CM20191092311', '', '', 'siswa', 'Bayu Yudo Susilo', 'Belum Aktif'),
('CM20191092312', '', '', 'siswa', 'Kartika Irsa Aryani', 'Belum Aktif'),
('CM20191092313', '', '', 'siswa', 'Syahrul Aldi Oktavian', 'Belum Aktif'),
('CM20191092314', '', '', 'siswa', 'Kevin Nastatur Chatriovandi', 'Belum Aktif'),
('CM20191092315', '', '', 'siswa', 'Antonius Paulus Wempy', 'Belum Aktif'),
('CM20191092316', '', '', 'siswa', 'Hardiv Arviri Sandi', 'Belum Aktif'),
('CM20191092317', '', '', 'siswa', 'Andy Christian', 'Belum Aktif'),
('CM20191092318', '', '', 'siswa', 'Ganistan Ahmad', 'Belum Aktif'),
('CM20191092319', '', '', 'siswa', 'Winardy Hertanto', 'Belum Aktif'),
('CM20191092320', '', '', 'siswa', 'Prasetya Rizky', 'Belum Aktif'),
('CM20191092321', '', '', 'siswa', 'Hary Diantoro', 'Belum Aktif'),
('CM20191092322', '', '', 'siswa', 'Rizkiya  ', 'Belum Aktif'),
('CM20191092323', '', '', 'siswa', 'Suwandi  ', 'Belum Aktif'),
('CM20191092324', '', '', 'siswa', 'Lintang Arival Bahalma', 'Belum Aktif'),
('CM20191092325', '', '', 'siswa', 'Imelda Hartika Bunga', 'Belum Aktif'),
('CM20191092326', '', '', 'siswa', 'Wildan Priyastomo Nugroho', 'Belum Aktif'),
('CM20191092327', '', '', 'siswa', 'Ekky Samodro', 'Belum Aktif'),
('CM20191092328', '', '', 'siswa', 'Arina Manashikana', 'Belum Aktif'),
('CM20191092329', '', '', 'siswa', 'Revo Faris Saifuddin', 'Belum Aktif'),
('CM20191092330', '', '', 'siswa', 'Antonius Paulus Wempy', 'Belum Aktif'),
('CM20191092331', '', '', 'siswa', 'Gheby Tamara Risman', 'Belum Aktif'),
('CM20191092332', '', '', 'siswa', 'Helen Setiani Ivan', 'Belum Aktif'),
('CM20191092333', '', '', 'siswa', 'Moch Eko Andre Saputro', 'Belum Aktif'),
('CM20191092334', '', '', 'siswa', 'M.Haris Kurniawan', 'Belum Aktif'),
('CM20191092335', '', '', 'siswa', 'Afif Amruzain', 'Belum Aktif'),
('CM20191092336', '', '', 'siswa', 'M. Adlant Nazhari  Yahyasamdie', 'Belum Aktif'),
('CM20191092337', '', '', 'siswa', 'Jacqueline Angelica Limanto', 'Belum Aktif'),
('CM20191092338', '', '', 'siswa', 'Meida Simatupang', 'Belum Aktif'),
('CM20191092339', '', '', 'siswa', 'Yogi Surya  Perdana', 'Belum Aktif'),
('CM20191092340', '', '', 'siswa', 'Sutji Iroh Wati', 'Belum Aktif'),
('CM20191092341', '', '', 'siswa', 'Muhammad Triyanto', 'Belum Aktif'),
('CM20191092342', '', '', 'siswa', 'Rochmatul Khikmiyah', 'Belum Aktif'),
('CM20191092343', '', '', 'siswa', 'Anies Adhanasih', 'Belum Aktif'),
('CM20191092344', '', '', 'siswa', 'Sherly Wijaya', 'Belum Aktif'),
('CM20191092345', '', '', 'siswa', 'Shafa Trivia', 'Belum Aktif'),
('CM20191092346', '', '', 'siswa', 'Lilik Kusmawati', 'Belum Aktif'),
('CM20191092347', '', '', 'siswa', 'Muhammad Ghufron', 'Belum Aktif'),
('CM20191092348', '', '', 'siswa', 'Jemmy Kristiawan', 'Belum Aktif'),
('CM20191092349', '', '', 'siswa', 'Afisia Dewima', 'Belum Aktif'),
('CM20191092350', '', '', 'siswa', 'Awan Sukmawan', 'Belum Aktif'),
('CM20191092351', '', '', 'siswa', 'Wafda Zahidah', 'Belum Aktif'),
('CM20191092352', '', '', 'siswa', 'Yonathan Erwan Nanda P', 'Belum Aktif'),
('CM20191092353', '', '', 'siswa', 'Eko Heri Oktavianto', 'Belum Aktif'),
('CM20191092354', '', '', 'siswa', 'Raditya Khansa Adifa', 'Belum Aktif'),
('CM20191092355', '', '', 'siswa', 'Dinny Islamiah Dewitasari', 'Belum Aktif'),
('CM20191092356', '', '', 'siswa', 'Muhammad  Fauzi', 'Belum Aktif'),
('CM20191092357', '', '', 'siswa', 'Nasrullah  ', 'Belum Aktif'),
('CM20191092358', '', '', 'siswa', 'Sri  Lasono', 'Belum Aktif'),
('CM20191092359', '', '', 'siswa', 'Dian  Santoso', 'Belum Aktif'),
('CM20191092360', '', '', 'siswa', 'Millenia  Syafira P', 'Belum Aktif'),
('CM20191092361', '', '', 'siswa', 'Riesca  Rachael Tarore', 'Belum Aktif'),
('CM20191092362', '', '', 'siswa', ' Doni  Slamet ', 'Belum Aktif'),
('CM20191092363', '', '', 'siswa', 'Valentine M. Ningsih  Rahayu Eugenius', 'Belum Aktif'),
('CM20191092364', '', '', 'siswa', 'Arya  Krisna', 'Belum Aktif'),
('CM20191092365', '', '', 'siswa', 'Nadiviansyah  Prizaldy P', 'Belum Aktif'),
('CM20191092366', '', '', 'siswa', 'Deny  Wirawan S', 'Belum Aktif'),
('CM20191092367', '', '', 'siswa', 'Aulia  Risdian Syahayu', 'Belum Aktif'),
('CM20191092368', '', '', 'siswa', 'Yansen  Tri Utomo', 'Belum Aktif'),
('CM20191092369', '', '', 'siswa', 'Michael  Kusumo', 'Belum Aktif'),
('CM20191092370', '', '', 'siswa', 'Agus  Anugerah Yahono', 'Belum Aktif'),
('CM20191092371', '', '', 'siswa', 'Moch Angga Putra W', 'Belum Aktif'),
('CM20191092372', '', '', 'siswa', 'Theresia  Sanctiani', 'Belum Aktif'),
('CM20191092373', '', '', 'siswa', 'Desyana Handayani', 'Belum Aktif'),
('CM20191092374', '', '', 'siswa', 'Eldiwani  ', 'Belum Aktif'),
('CM20191092375', '', '', 'siswa', 'Deasy Irawati', 'Belum Aktif'),
('CM20191092376', '', '', 'siswa', 'Anshari  Junior Rahmatullah', 'Belum Aktif'),
('CM20191092377', '', '', 'siswa', 'Ginanjar  Wicaksono P', 'Belum Aktif'),
('CM20191092378', '', '', 'siswa', 'M.Alif Dary Farras', 'Belum Aktif'),
('CM20191092379', '', '', 'siswa', 'Achmad  Kafi Syobirin', 'Belum Aktif'),
('CM20191092380', '', '', 'siswa', 'Tania Indhana Fahma', 'Belum Aktif'),
('CM20191092381', '', '', 'siswa', 'Achmad  Effendi', 'Belum Aktif'),
('CM20191092382', '', '', 'siswa', 'Joshua  Samudra Widodo', 'Belum Aktif'),
('CM20191092383', '', '', 'siswa', 'Yossi Prayoga Mukti', 'Belum Aktif'),
('CM20191092384', '', '', 'siswa', 'Aulia Khasanah', 'Belum Aktif'),
('CM20191092385', '', '', 'siswa', 'Wahyu Ikhra Wirawan', 'Belum Aktif'),
('CM20191092386', '', '', 'siswa', 'Chrismania Indah Ramadhani', 'Belum Aktif'),
('CM20191092387', '', '', 'siswa', 'Diky Efra Hutamawida', 'Belum Aktif'),
('CM20191092388', '', '', 'siswa', 'Muhammad Infan Tri Andhika', 'Belum Aktif'),
('CM20191092389', '', '', 'siswa', 'Ferdy  Ananda Harahap', 'Belum Aktif'),
('CM20191092390', '', '', 'siswa', 'Nixon Savero Lutters', 'Belum Aktif'),
('CM20191092391', '', '', 'siswa', 'Ahmad  Suyitno', 'Belum Aktif'),
('CM20191092392', '', '', 'siswa', 'Yahya  Permata Ardiansyah', 'Belum Aktif');
INSERT INTO `login` (`username`, `password`, `photo`, `tipe`, `nama`, `status`) VALUES
('CM20191092393', '', '', 'siswa', 'Tiffany  Prayogo', 'Belum Aktif'),
('CM20191092394', '', '', 'siswa', 'Farah  Desiska', 'Belum Aktif'),
('CM20191092395', '', '', 'siswa', 'Akhmad  Raihan Fadhila', 'Belum Aktif'),
('CM20191092396', '', '', 'siswa', 'Reza  Andre Kurniawan', 'Belum Aktif'),
('CM20191092397', '', '', 'siswa', 'Dismas  Rafael Rusdi', 'Belum Aktif'),
('CM20191092398', '', '', 'siswa', 'Citra  Dewi Irianti', 'Belum Aktif'),
('CM20191092399', '', '', 'siswa', 'Permadi  Wibowo', 'Belum Aktif'),
('CM20191092400', '', '', 'siswa', 'Fabella  Andinia Setiawan', 'Belum Aktif'),
('CM20191092401', '', '', 'siswa', 'Geby  ', 'Belum Aktif'),
('CM20191092402', '', '', 'siswa', 'Raissa  ', 'Belum Aktif'),
('CM20191092403', '', '', 'siswa', 'Alice  Tamara Kristiano', 'Belum Aktif'),
('CM20191092404', '', '', 'siswa', 'Evelyn  Andriani Sutrisno', 'Belum Aktif'),
('CM20191092405', '', '', 'siswa', 'Muhammad Adil  Mugrbel', 'Belum Aktif'),
('CM20191092406', '', '', 'siswa', 'Moch. Saifuddin  Zuhri', 'Belum Aktif'),
('CM20191092407', '', '', 'siswa', 'Yustanti  ', 'Belum Aktif'),
('CM20191092408', '', '', 'siswa', 'Dewi  Arnita', 'Belum Aktif'),
('CM20191092409', '', '', 'siswa', 'Michael  Ciputra', 'Belum Aktif'),
('CM20191092410', '', '', 'siswa', 'Christian William  Kaunang', 'Belum Aktif'),
('CM20191092411', '', '', 'siswa', 'M. Dani  Fajar L', 'Belum Aktif'),
('CM20191092412', '', '', 'siswa', 'Galasa  Putra Audita', 'Belum Aktif'),
('CM20191092413', '', '', 'siswa', 'Taufiq  Hidayat', 'Belum Aktif'),
('CM20191092414', '', '', 'siswa', 'Joel Samuel  Santoso', 'Belum Aktif'),
('CM20191092415', '', '', 'siswa', 'Yosef  Surya', 'Belum Aktif'),
('CM20191092416', '', '', 'siswa', 'Suwati  ', 'Belum Aktif'),
('CM20191092417', '', '', 'siswa', 'R. Soeryo  Haryoko', 'Belum Aktif'),
('CM20191092418', '', '', 'siswa', 'Yuwana  ', 'Belum Aktif'),
('CM20191092419', '', '', 'siswa', 'Shabrina  Mataram', 'Belum Aktif'),
('CM20191092420', '', '', 'siswa', 'Hesthi  Suranto', 'Belum Aktif'),
('CM20191092421', '', '', 'siswa', 'Devina Erlita  Trisni E', 'Belum Aktif'),
('CM20191092422', '', '', 'siswa', 'Moh.  Hafiluddin', 'Belum Aktif'),
('CM20191092423', '', '', 'siswa', 'Enrico  Ticoalu', 'Belum Aktif'),
('CM20191092424', '', '', 'siswa', 'Nizar Hanif  Maulana', 'Belum Aktif'),
('CM20191092425', '', '', 'siswa', 'Kevin  Hendriadi', 'Belum Aktif'),
('CM20191092426', '', '', 'siswa', 'Go George  Herbert', 'Belum Aktif'),
('CM20191092427', '', '', 'siswa', 'Gustaf G  Boelan, A.Md', 'Belum Aktif'),
('CM20191092428', '', '', 'siswa', 'Joel Samuel  Santoso', 'Belum Aktif'),
('CM20191092429', '', '', 'siswa', 'Haris  Nasrus', 'Belum Aktif'),
('CM20191092430', '', '', 'siswa', 'Pedrico  Putra Manuel', 'Belum Aktif'),
('CM20191092431', '', '', 'siswa', 'Stefanny  Aprilia Yantoro', 'Belum Aktif'),
('CM20191092432', '', '', 'siswa', 'Stevanus  Susanto', 'Belum Aktif'),
('CM20191092433', '', '', 'siswa', 'Christian  William Kaunang', 'Belum Aktif'),
('CM20191092434', '', '', 'siswa', 'Cahyadesthian  Rizki Widigda', 'Belum Aktif'),
('CM20191092435', '', '', 'siswa', 'Kevin  Surinda', 'Belum Aktif'),
('CM20191092436', '', '', 'siswa', 'Vivi  Matandi', 'Belum Aktif'),
('CM20191092437', '', '', 'siswa', 'Esti  Firdani', 'Belum Aktif'),
('CM20191092438', '', '', 'siswa', 'Rahmat  Fajar Basarda', 'Belum Aktif'),
('CM20191092439', '', '', 'siswa', 'Esti  Firdani', 'Belum Aktif'),
('CM20191092440', '', '', 'siswa', 'Rahmat Fajar  Basarda', 'Belum Aktif'),
('CM20191092441', '', '', 'siswa', 'Leonardi  Wirya Pranoto', 'Belum Aktif'),
('CM20191092442', '', '', 'siswa', 'Laras  Sati', 'Belum Aktif'),
('CM20191092443', '', '', 'siswa', 'Diah  Sri Witdhianti', 'Belum Aktif'),
('CM20191092444', '', '', 'siswa', 'Eka Rizki  Wulandari Putri', 'Belum Aktif'),
('CM20191092445', '', '', 'siswa', 'Gilang  Reza Khasogi', 'Belum Aktif'),
('CM20191092446', '', '', 'siswa', 'Triyas  Wulandari Iswati', 'Belum Aktif'),
('CM20191092447', '', '', 'siswa', 'Andini  Pramudya', 'Belum Aktif'),
('CM20191092448', '', '', 'siswa', 'Fadrian  ', 'Belum Aktif'),
('CM20191092449', '', '', 'siswa', 'Yusuf  Indrawan', 'Belum Aktif'),
('CM20191092450', '', '', 'siswa', 'Zaky  Achmad B', 'Belum Aktif'),
('CM20191092451', '', '', 'siswa', 'Ratna  Sari Dewi', 'Belum Aktif'),
('CM20191092452', '', '', 'siswa', 'Rahmawati  ', 'Belum Aktif'),
('CM20191092453', '', '', 'siswa', 'Haryo  Pratama', 'Belum Aktif'),
('CM20191092454', '', '', 'siswa', 'Itsna Hanifah  Khoirun Nisa', 'Belum Aktif'),
('CM20191092455', '', '', 'siswa', 'Tri Karunia  Utami ', 'Belum Aktif'),
('CM20191092456', '', '', 'siswa', 'Galih  Satya P', 'Belum Aktif'),
('CM20191092457', '', '', 'siswa', 'Yuwono  ', 'Belum Aktif'),
('CM20191092458', '', '', 'siswa', 'Siti  Saodah', 'Belum Aktif'),
('CM20191092459', '', '', 'siswa', 'Siti  Saodah', 'Belum Aktif'),
('CM20191092460', '', '', 'siswa', 'Ahmad  Fatih', 'Belum Aktif'),
('CM20191092461', '', '', 'siswa', 'Wahyu  Eriyanti', 'Belum Aktif'),
('CM20191092462', '', '', 'siswa', 'Wahyu  Wijayanto', 'Belum Aktif'),
('CM20191092463', '', '', 'siswa', 'Felisia  ', 'Belum Aktif'),
('CM20191092464', '', '', 'siswa', 'Felisia  ', 'Belum Aktif'),
('CM20191092465', '', '', 'siswa', 'Julius Andi Kurniawan', 'Belum Aktif'),
('CM20191092466', '', '', 'siswa', 'Cristian Ari Wibowo', 'Belum Aktif'),
('CM20191092468', '', '', 'siswa', 'Cristian Ari Wibowo', 'Belum Aktif'),
('CM20191092470', '', '', 'siswa', 'Ariyanto  ', 'Belum Aktif'),
('CM20191092471', '', '', 'siswa', 'Aprilliano Agung Pradana', 'Belum Aktif'),
('CM20191092472', '', '', 'siswa', 'Alberth  Limandau Alihin', 'Belum Aktif'),
('CM20191092474', '', '', 'siswa', 'Laily Miftahul Jannah', 'Belum Aktif'),
('CM20191092475', '', '', 'siswa', 'Clarissa Audrey Chinara', 'Belum Aktif'),
('CM20191092476', '', '', 'siswa', 'Darrel  ', 'Belum Aktif'),
('CM20191092478', '', '', 'siswa', 'Shanny Boedihartono', 'Belum Aktif'),
('CM20191092479', '', '', 'siswa', 'Gerry  William', 'Belum Aktif'),
('CM20191092481', '', '', 'siswa', 'Ikrimatul Ulumiyyah', 'Belum Aktif'),
('CM20191092482', '', '', 'siswa', 'Haris  ', 'Belum Aktif'),
('CM20191092483', '', '', 'siswa', 'Alfian  Himawan', 'Belum Aktif'),
('CM20191092484', '', '', 'siswa', 'Aldyth Kusuma Atmaja', 'Belum Aktif'),
('CM20191092485', '', '', 'siswa', 'Rizki Farrakhan', 'Belum Aktif'),
('CM20191092486', '', '', 'siswa', 'Dona Laurianto', 'Belum Aktif'),
('CM20191092487', '', '', 'siswa', 'Ismi Yunita Utami', 'Belum Aktif'),
('CM20191092488', '', '', 'siswa', 'Xaverius Chandra', 'Belum Aktif'),
('CM20191092489', '', '', 'siswa', 'Muhammad  Saddam H', 'Belum Aktif'),
('CM20191092490', '', '', 'siswa', 'Diky Riesky Hariyanto', 'Belum Aktif'),
('CM20191092492', '', '', 'siswa', 'Vadia Dwi  Juniarti', 'Belum Aktif'),
('CM20191092493', '', '', 'siswa', 'Christopher Reinhar Lorens', 'Belum Aktif'),
('CM20191092495', '', '', 'siswa', 'Shanny Boedihartono', 'Belum Aktif'),
('CM20191092498', '', '', 'siswa', 'Nurhuda  Saputra', 'Belum Aktif'),
('CM20191092500', '', '', 'siswa', 'Arif Rahayono Chandra', 'Belum Aktif'),
('CM20191092502', '', '', 'siswa', 'Erna  Kusumawati', 'Belum Aktif'),
('CM20191092503', '', '', 'siswa', 'Indra Hendratno', 'Belum Aktif'),
('CM20191092505', '', '', 'siswa', 'Elisabeth Cindy Widjaja, S.KG', 'Belum Aktif'),
('CM20191092506', '', '', 'siswa', 'Theresia  Sanctiani', 'Belum Aktif'),
('CM20191092508', '', '', 'siswa', 'Efira Isniah', 'Belum Aktif'),
('CM20191092509', '', '', 'siswa', 'Bagus  Prasetyo', 'Belum Aktif'),
('CM20191092511', '', '', 'siswa', 'Aprilliano Agung Pradana', 'Belum Aktif'),
('CM20191092513', '', '', 'siswa', 'Ammyersen  Seranik Sinaga', 'Belum Aktif'),
('CM20191092514', '', '', 'siswa', 'Jessica Azaria Kuntandi', 'Belum Aktif'),
('CM20191092515', '', '', 'siswa', 'Muchammad Sofi\'i', 'Belum Aktif'),
('CM20191092517', '', '', 'siswa', 'Muhammad  Adil Mugrbel', 'Belum Aktif'),
('CM20191092518', '', '', 'siswa', 'M.Iqbal Aulia Rafi', 'Belum Aktif'),
('CM20191092520', '', '', 'siswa', 'Geraldo -', 'Belum Aktif'),
('CM20191092521', '', '', 'siswa', 'Frangky  ', 'Belum Aktif'),
('CM20191092522', '', '', 'siswa', 'Agung Nanang Arif Efendi', 'Belum Aktif'),
('CM20191092523', '', '', 'siswa', 'Bryant Kantono', 'Belum Aktif'),
('CM20191092524', '', '', 'siswa', 'Moch.Wahyu Sugiarto, S.Kom', 'Belum Aktif'),
('CM20191092525', '', '', 'siswa', 'Miftakul Huda', 'Belum Aktif'),
('CM20191092526', '', '', 'siswa', 'Bayu Hargianto  Nugroho', 'Belum Aktif'),
('CM20191092527', '', '', 'siswa', 'Graciella Emerald', 'Belum Aktif'),
('CM20191092528', '', '', 'siswa', 'Triono Saputro', 'Belum Aktif'),
('CM20191092529', '', '', 'siswa', 'Mochamad  Saddam Hussen', 'Belum Aktif'),
('CM20191092530', '', '', 'siswa', 'Andhika Farakkhan', 'Belum Aktif'),
('CM20191092531', '', '', 'siswa', 'Heinrich Noel Siawan', 'Belum Aktif'),
('CM20191092532', '', '', 'siswa', 'Syaikh Ahmad', 'Belum Aktif'),
('CM20191092533', '', '', 'siswa', 'Tarsisius  Suwandi Alfa', 'Belum Aktif'),
('CM20191092534', '', '', 'siswa', 'Heinrich Noel Siawan', 'Belum Aktif'),
('CM20191092535', '', '', 'siswa', 'Sarono -', 'Belum Aktif'),
('CM20191092536', '', '', 'siswa', 'Arif Rahayono Chandra', 'Belum Aktif'),
('CM20191092537', '', '', 'siswa', 'Bagus Rahadian Putra', 'Belum Aktif'),
('CM20191092538', '', '', 'siswa', 'Allan Diavanda', 'Belum Aktif'),
('CM20191092539', '', '', 'siswa', 'Chedia Putri', 'Belum Aktif'),
('CM20191092540', '', '', 'siswa', 'Sri Rahayu', 'Belum Aktif'),
('CM20191092541', '', '', 'siswa', 'Dyah Tri  Ayundasari', 'Belum Aktif'),
('CM20191092542', '', '', 'siswa', 'Alpri Dianta', 'Belum Aktif'),
('CM20191092543', '', '', 'siswa', 'Hari Kartika Nursanti', 'Belum Aktif'),
('CM20191092544', '', '', 'siswa', 'Pattricia Tjamalla', 'Belum Aktif'),
('CM20191092545', '', '', 'siswa', 'Daysi Mahargyani', 'Belum Aktif'),
('CM20191092547', '', '', 'siswa', 'Gabriella -', 'Belum Aktif'),
('CM20191092548', '', '', 'siswa', 'Arva Xavier', 'Belum Aktif'),
('CM20191092549', '', '', 'siswa', 'Yuli Shinta Asi', 'Belum Aktif'),
('CM20191092550', '', '', 'siswa', 'Fenni Rindi  Lukista E', 'Belum Aktif'),
('CM20191092551', '', '', 'siswa', 'Dewi Azlika Vianti', 'Belum Aktif'),
('CM20191092552', '', '', 'siswa', 'Fransisco -', 'Belum Aktif'),
('CM20191092553', '', '', 'siswa', 'Darren Justin', 'Belum Aktif'),
('CM20191092554', '', '', 'siswa', 'Michiko Winata', 'Belum Aktif'),
('CM20191092555', '', '', 'siswa', 'Daniel Rheza', 'Belum Aktif'),
('CM20191092556', '', '', 'siswa', 'Daysi Mahargyani', 'Belum Aktif'),
('CM20191092557', '', '', 'siswa', 'Sinta  Diana Sari', 'Belum Aktif'),
('CM20191092558', '', '', 'siswa', 'Muhammad Aria Satria Abrori', 'Belum Aktif'),
('CM20191092559', '', '', 'siswa', 'Veronika -', 'Belum Aktif'),
('CM20191092560', '', '', 'siswa', 'Pandu Nur Afi Dewanto', 'Belum Aktif'),
('CM20191092561', '', '', 'siswa', 'Liztrianto Puji', 'Belum Aktif'),
('CM20191092562', '', '', 'siswa', 'Jodi  Evanda Putra', 'Belum Aktif'),
('CM20191092563', '', '', 'siswa', 'Cornelius Nelson', 'Belum Aktif'),
('CM20191092564', '', '', 'siswa', 'Yusak  ', 'Belum Aktif'),
('CM20191092565', '', '', 'siswa', 'Suryadi  ', 'Belum Aktif'),
('CM20191092566', '', '', 'siswa', 'Suryadi  ', 'Belum Aktif'),
('CM20191092567', '', '', 'siswa', 'Nadiviansyah  Prizaldy P', 'Belum Aktif'),
('CM20191092568', '', '', 'siswa', 'Ni Putu Intan Sawitri Wirayani', 'Belum Aktif'),
('CM20191092569', '', '', 'siswa', 'Patrick  ', 'Belum Aktif'),
('CM20191092570', '', '', 'siswa', 'Fathoni Arief Rakhman', 'Belum Aktif'),
('CM20191092571', '', '', 'siswa', 'Prita Dia Anesti', 'Belum Aktif'),
('CM20191092572', '', '', 'siswa', 'Dimas Elang', 'Belum Aktif'),
('CM20191092573', '', '', 'siswa', 'Arvino Aprilian', 'Belum Aktif'),
('CM20191092574', '', '', 'siswa', 'Dimas Elang', 'Belum Aktif'),
('CM20191092575', '', '', 'siswa', 'Valerey Leoly', 'Belum Aktif'),
('CM20191092576', '', '', 'siswa', 'Orvin Savero', 'Belum Aktif'),
('CM20191092577', '', '', 'siswa', 'Rheza Arie Kurniawan', 'Belum Aktif'),
('CM20191092578', '', '', 'siswa', 'Galih Palgunadi', 'Belum Aktif'),
('CM20191092579', '', '', 'siswa', 'Micky Geovanni Montol', 'Belum Aktif'),
('CM20191092580', '', '', 'siswa', 'Rheza Arie Kurniawan', 'Belum Aktif'),
('CM20191092581', '', '', 'siswa', 'Micky Geovanni Montol', 'Belum Aktif'),
('CM20191092582', '', '', 'siswa', 'Edwin Oka Arifianto', 'Belum Aktif'),
('CM20191092583', '', '', 'siswa', 'Melky Mandowen', 'Belum Aktif'),
('CM20191092584', '', '', 'siswa', 'Maikel Marsel Kabes', 'Belum Aktif'),
('CM20191092585', '', '', 'siswa', 'Thimotius Sanoy', 'Belum Aktif'),
('CM20191092586', '', '', 'siswa', 'Elias Wilianter Padwa', 'Belum Aktif'),
('CM20191092587', '', '', 'siswa', 'Dewani Arisa PA', 'Belum Aktif'),
('CM20191092588', '', '', 'siswa', 'Agustinus Gonsales Botu', 'Belum Aktif'),
('CM20191092589', '', '', 'siswa', 'Heinrich Noel Siawan', 'Belum Aktif'),
('CM20191092590', '', '', 'siswa', 'Arif Rahayono Chandra', 'Belum Aktif'),
('CM20191092591', '', '', 'siswa', 'Edwin Setiadi Sugeng', 'Belum Aktif'),
('CM20191092592', '', '', 'siswa', 'Richard Matthew Yuwono Utomo', 'Belum Aktif'),
('CM20191092593', '', '', 'siswa', 'Hedwig Yoga', 'Belum Aktif'),
('CM20191092594', '', '', 'siswa', 'Claudio Julio Thomas', 'Belum Aktif'),
('CM20191092595', '', '', 'siswa', 'Fausto Ernesto Karuna', 'Belum Aktif'),
('CM20191092597', '', '', 'siswa', 'Nathaniel  ', 'Belum Aktif'),
('CM20191092598', '', '', 'siswa', 'Fienkan Laura Sandyego Dumalang', 'Belum Aktif'),
('CM20191092599', '', '', 'siswa', 'Gilang Ramadhan', 'Belum Aktif'),
('CM20191092600', '', '', 'siswa', 'Richard Matthew Yuwono Utomo', 'Belum Aktif'),
('CM20191092601', '', '', 'siswa', 'Rendra Wibawa', 'Belum Aktif'),
('CM20191092602', '', '', 'siswa', 'Richard Matthew Yuwono Utomo', 'Belum Aktif'),
('CM20191092603', '', '', 'siswa', 'Abdulah Sanduan', 'Belum Aktif'),
('CM20191092604', '', '', 'siswa', 'Atha  Triatmojoyo', 'Belum Aktif'),
('CM20191092605', '', '', 'siswa', 'Agus Susanto', 'Belum Aktif'),
('CM20191092606', '', '', 'siswa', 'Yosua Vidda Juliant', 'Belum Aktif'),
('CM20191092607', '', '', 'siswa', 'Guruh Pratama', 'Belum Aktif'),
('CM20191092608', '', '', 'siswa', 'Jastin Jordan', 'Belum Aktif'),
('CM20191092609', '', '', 'siswa', 'Hosea Marchellino', 'Belum Aktif'),
('CM20191092610', '', '', 'siswa', 'Alvita  ', 'Belum Aktif'),
('CM20191092611', '', '', 'siswa', 'Tarfian Sadewo', 'Belum Aktif'),
('CM20191092612', '', '', 'siswa', 'Novie Maria Ulfa', 'Belum Aktif'),
('CM20191092613', '', '', 'siswa', 'Debbi  Bara Atmaja ', 'Belum Aktif'),
('CM20191092614', '', '', 'siswa', 'Genius Hartono', 'Belum Aktif'),
('CM20191092615', '', '', 'siswa', 'Bryant Kantono', 'Belum Aktif'),
('CM20191092616', '', '', 'siswa', 'Januar  Tambunan', 'Belum Aktif'),
('CM20191092617', '', '', 'siswa', 'Michael Widodo', 'Belum Aktif'),
('CM20191092618', '', '', 'siswa', 'Ricky  Harmoko', 'Belum Aktif'),
('CM20191092619', '', '', 'siswa', 'Muchammad Sofi\'i', 'Belum Aktif'),
('CM20191092620', '', '', 'siswa', 'Fausto Ernesto', 'Belum Aktif'),
('CM20191092621', '', '', 'siswa', 'Rafael Billy Jayadi', 'Belum Aktif'),
('CM20191092622', '', '', 'siswa', 'Jonathan Christovelt', 'Belum Aktif'),
('CM20191092623', '', '', 'siswa', 'Sumantri  ', 'Belum Aktif'),
('CM20191092624', '', '', 'siswa', 'Miftakul Huda', 'Belum Aktif'),
('CM20191092625', '', '', 'siswa', 'Wibsa Janua', 'Belum Aktif'),
('CM20191092626', '', '', 'siswa', 'Geraldo  ', 'Belum Aktif'),
('CM20191092627', '', '', 'siswa', 'Aprilia Kartikasari', 'Belum Aktif'),
('CM20191092628', '', '', 'siswa', 'Heru  Widodo', 'Belum Aktif'),
('CM20191092629', '', '', 'siswa', 'Bryant Zechariah Kantono', 'Belum Aktif'),
('CM20191092630', '', '', 'siswa', 'Faris Rabbani', 'Belum Aktif'),
('CM20191092631', '', '', 'siswa', 'Susilo Puguh  Seno Aji', 'Belum Aktif'),
('CM20191092632', '', '', 'siswa', 'Faris Rabbani', 'Belum Aktif'),
('CM20191092633', '', '', 'siswa', 'Doni  Rahmawan', 'Belum Aktif'),
('CM20191092634', '', '', 'siswa', 'Rully Suryandany', 'Belum Aktif'),
('CM20191092635', '', '', 'siswa', 'M Khusnul  Mukhlis', 'Belum Aktif'),
('CM20191092636', '', '', 'siswa', 'Rudy -', 'Belum Aktif'),
('CM20191092637', '', '', 'siswa', 'Rahmad Yanuar', 'Belum Aktif'),
('CM20191092638', '', '', 'siswa', 'Rizky Pratama', 'Belum Aktif'),
('CM20191092639', '', '', 'siswa', 'Rizky Firman', 'Belum Aktif'),
('CM20191092640', '', '', 'siswa', 'Edy  Pranoto', 'Belum Aktif'),
('CM20191092641', '', '', 'siswa', 'Binuri Hidayatika', 'Belum Aktif'),
('CM20191092642', '', '', 'siswa', 'Rahmatul Hisan', 'Belum Aktif'),
('CM20191092643', '', '', 'siswa', 'Mujibul Fattah', 'Belum Aktif'),
('CM20191092644', '', '', 'siswa', 'Awtia  Andini', 'Belum Aktif'),
('CM20191092645', '', '', 'siswa', 'Mujibul Fattah', 'Belum Aktif'),
('CM20191092646', '', '', 'siswa', 'Pedro Putra', 'Belum Aktif'),
('CM20191092647', '', '', 'siswa', 'muhammad fahmi  aziz', 'Belum Aktif'),
('CM20191092648', '', '', 'siswa', 'Abdulah Sanduan', 'Belum Aktif'),
('CM20191092649', '', '', 'siswa', 'Trista  Aisyah', 'Belum Aktif'),
('CM20191092650', '', '', 'siswa', 'Sean Andrew Valentino D', 'Belum Aktif'),
('CM20191092651', '', '', 'siswa', 'Dian  Sofianty Pratiwi', 'Belum Aktif'),
('CM20191092652', '', '', 'siswa', 'Purwandayani   ', 'Belum Aktif'),
('CM20191092653', '', '', 'siswa', 'Lexius Thonnyson', 'Belum Aktif'),
('CM20191092654', '', '', 'siswa', 'Dessy Natalia', 'Belum Aktif'),
('CM20191092655', '', '', 'siswa', 'Leo  Aswin Tjahjono', 'Belum Aktif'),
('CM20191092656', '', '', 'siswa', 'Nixon Savero', 'Belum Aktif'),
('CM20191092657', '', '', 'siswa', 'Nixon Savero', 'Belum Aktif'),
('CM20191092658', '', '', 'siswa', 'Egi Rifki  Yuda Arian', 'Belum Aktif'),
('CM20191092659', '', '', 'siswa', 'Farid Farhan', 'Belum Aktif'),
('CM20191092660', '', '', 'siswa', 'Suherman  ', 'Belum Aktif'),
('CM20191092661', '', '', 'siswa', 'Ivans Ricardo', 'Belum Aktif'),
('CM20191092662', '', '', 'siswa', 'Davin Joshua', 'Belum Aktif'),
('CM20191092663', '', '', 'siswa', 'Siti Izzatul', 'Belum Aktif'),
('CM20191092664', '', '', 'siswa', 'Maman  Rahman', 'Belum Aktif'),
('CM20191092665', '', '', 'siswa', 'Cayla Magdalena', 'Belum Aktif'),
('CM20191092666', '', '', 'siswa', 'Bezaliel Jerry', 'Belum Aktif'),
('CM20191092667', '', '', 'siswa', 'Ester -', 'Belum Aktif'),
('CM20191092668', '', '', 'siswa', 'Rizka Aristya', 'Belum Aktif'),
('CM20191092669', '', '', 'siswa', 'Muchibbudin -', 'Belum Aktif'),
('CM20191092670', '', '', 'siswa', 'Dion Ramadhan', 'Belum Aktif'),
('CM20191092671', '', '', 'siswa', 'Mohammad  Wahyudi ', 'Belum Aktif'),
('CM20191092672', '', '', 'siswa', 'Pedro Putra', 'Belum Aktif'),
('CM20191092673', '', '', 'siswa', 'Lienny  Setianingsih', 'Belum Aktif'),
('CM20191092674', '', '', 'siswa', 'Erdhi Budiyanto', 'Belum Aktif'),
('CM20191092675', '', '', 'siswa', 'Adam Setiya', 'Belum Aktif'),
('CM20191092676', '', '', 'siswa', 'Ari  Pandu', 'Belum Aktif'),
('CM20191092677', '', '', 'siswa', 'Arwan Tristiyanto', 'Belum Aktif'),
('CM20191092678', '', '', 'siswa', 'Dwi Andriano  ', 'Belum Aktif'),
('CM20191092679', '', '', 'siswa', 'Janoear Satria', 'Belum Aktif'),
('CM20191092680', '', '', 'siswa', 'Hendrik  Riswanto', 'Belum Aktif'),
('CM20191092681', '', '', 'siswa', 'Ervinna -', 'Belum Aktif'),
('CM20191092682', '', '', 'siswa', 'Olivia Sidharta', 'Belum Aktif'),
('CM20191092683', '', '', 'siswa', 'dimas  aryosudarsono', 'Belum Aktif'),
('CM20191092684', '', '', 'siswa', 'Dwi Septian', 'Belum Aktif'),
('CM20191092685', '', '', 'siswa', 'Machrutin -', 'Belum Aktif'),
('CM20191092686', '', '', 'siswa', 'Kurniawan Halim', 'Belum Aktif'),
('CM20191092687', '', '', 'siswa', 'Sherly Franschischa', 'Belum Aktif'),
('CM20191092688', '', '', 'siswa', 'Mochammad Fandrian', 'Belum Aktif'),
('CM20191092689', '', '', 'siswa', 'Dito Novanata', 'Belum Aktif'),
('CM20191092690', '', '', 'siswa', 'Huddin Saiful', 'Belum Aktif'),
('CM20191092691', '', '', 'siswa', 'Trisna Rahardi', 'Belum Aktif'),
('CM20191092692', '', '', 'siswa', 'Yanuar Harianto', 'Belum Aktif'),
('CM20191092693', '', '', 'siswa', 'dimas  aryosudarsono', 'Belum Aktif'),
('CM20191092694', '', '', 'siswa', 'Machrutin -', 'Belum Aktif'),
('CM20191092695', '', '', 'siswa', 'M GIGIH  ADI JAYA', 'Belum Aktif'),
('CM20191092696', '', '', 'siswa', 'Kefas  Wilfred N S', 'Belum Aktif'),
('CM20191092697', '', '', 'siswa', 'Hasna  Rizkika', 'Belum Aktif'),
('CM20191092698', '', '', 'siswa', 'DIPATRIA  NUSWANTORO', 'Belum Aktif'),
('CM20191092699', '', '', 'siswa', 'Yohan  Saputra Alam', 'Belum Aktif'),
('CM20191092700', '', '', 'siswa', 'Mochamad  Adi Djatmiko', 'Belum Aktif'),
('CM20191092701', '', '', 'siswa', 'Aileen  Salsa T', 'Belum Aktif'),
('CM20191092702', '', '', 'siswa', 'Ardo  ', 'Belum Aktif'),
('CM20191092703', '', '', 'siswa', 'Muhamad  Roghib', 'Belum Aktif'),
('CM20191092704', '', '', 'siswa', 'Ahmad  Uuhudlofin', 'Belum Aktif'),
('CM20191092705', '', '', 'siswa', 'Tjahyo  Winarto', 'Belum Aktif'),
('CM20191092706', '', '', 'siswa', 'M GIGIH  ADI JAYA', 'Belum Aktif'),
('CM20191092707', '', '', 'siswa', 'Kefas  Wilfred N S', 'Belum Aktif'),
('CM20191092708', '', '', 'siswa', 'antonius  eko wibowo', 'Belum Aktif'),
('CM20191092709', '', '', 'siswa', 'Zamzam  ', 'Belum Aktif'),
('CM20191092710', '', '', 'siswa', 'Doddy  Afandi', 'Belum Aktif'),
('CM20191092711', '', '', 'siswa', 'Rheza Paleva  Uyanto', 'Belum Aktif'),
('CM20191092712', '', '', 'siswa', 'Andreas  Dwi Susilo', 'Belum Aktif'),
('CM20191092713', '', '', 'siswa', 'eggis  rafdani', 'Belum Aktif'),
('CM20191092714', '', '', 'siswa', 'nindi  aditya', 'Belum Aktif'),
('CM20191092715', '', '', 'siswa', 'Moh.  Yusup', 'Belum Aktif'),
('CM20191092716', '', '', 'siswa', 'Iqbal  Rizky', 'Belum Aktif'),
('CM20191092717', '', '', 'siswa', 'NOVA  FERDI SETIAWAN', 'Belum Aktif'),
('CM20191092718', '', '', 'siswa', 'Nano  Khresna', 'Belum Aktif'),
('CM20191092719', '', '', 'siswa', 'Sadrah  Priyo Pamungkas', 'Belum Aktif'),
('CM20191092720', '', '', 'siswa', 'Ika  Rahmi Setyawardhani', 'Belum Aktif'),
('CM20191092721', '', '', 'siswa', 'Eko  Anggoro', 'Belum Aktif'),
('CM20191092722', '', '', 'siswa', 'Fardian  Ramadhani', 'Belum Aktif'),
('CM20191092723', '', '', 'siswa', 'Sofyan Adi  Suryono', 'Belum Aktif'),
('CM20191092724', '', '', 'siswa', 'Yugo Adiyanto', 'Belum Aktif'),
('CM20191092725', '', '', 'siswa', 'Debrina  Margaretha Darsono', 'Belum Aktif'),
('CM20191092726', '', '', 'siswa', 'Andini  Rezkyta Meynard', 'Belum Aktif'),
('CM20191092727', '', '', 'siswa', 'Lusi  Arini Putri', 'Belum Aktif'),
('CM20191092728', '', '', 'siswa', 'Lusi  Arini Putri', 'Belum Aktif'),
('CM20191092729', '', '', 'siswa', 'Rifqi  Ramadhan ', 'Belum Aktif'),
('CM20191092730', '', '', 'siswa', 'Yulianto  ', 'Belum Aktif'),
('CM20191092731', '', '', 'siswa', 'Abdul  Malik', 'Belum Aktif'),
('CM20191092732', '', '', 'siswa', 'Arin  Maya Rosita', 'Belum Aktif'),
('CM20191092733', '', '', 'siswa', 'IZZA  SAKHARA', 'Belum Aktif'),
('CM20191092734', '', '', 'siswa', 'MELI  ', 'Belum Aktif'),
('CM20191092735', '', '', 'siswa', 'RIFQI  RAMADHAN', 'Belum Aktif'),
('CM20191092736', '', '', 'siswa', 'INTAN  ERLINA', 'Belum Aktif'),
('CM20191092737', '', '', 'siswa', 'MARTIN  WILFRED', 'Belum Aktif'),
('CM20191092738', '', '', 'siswa', 'EUGENIA  JOCELYN', 'Belum Aktif'),
('CM20191092739', '', '', 'siswa', 'BARUNA WING  PARASANTYA', 'Belum Aktif'),
('CM20191092740', '', '', 'siswa', 'Salim  Janto', 'Belum Aktif'),
('CM20191092741', '', '', 'siswa', 'Mislul  Miati', 'Belum Aktif'),
('CM20191092742', '', '', 'siswa', 'ARDIANTO  BAGUS APRILIO', 'Belum Aktif'),
('CM20191092743', '', '', 'siswa', 'RAHMAT  HARDIANSAH', 'Belum Aktif'),
('CM20191092744', '', '', 'siswa', 'DZIKRI  IMADUDDIN', 'Belum Aktif'),
('CM20191092745', '', '', 'siswa', 'Agus setyo  Margono', 'Belum Aktif'),
('CM20191092746', '', '', 'siswa', 'Dhian  Nurina A', 'Belum Aktif'),
('CM20191092747', '', '', 'siswa', 'Santy  Darmawan Warwey', 'Belum Aktif'),
('CM20191092748', '', '', 'siswa', 'David  kurniawan', 'Belum Aktif'),
('CM20191092749', '', '', 'siswa', 'Ari  setiawan', 'Belum Aktif'),
('CM20191092750', '', '', 'siswa', 'Kukuh  Mahardo', 'Belum Aktif'),
('CM20191092751', '', '', 'siswa', 'Fadella  Yulnidar', 'Belum Aktif'),
('CM20191092752', '', '', 'siswa', 'Erlia  Rofida', 'Belum Aktif'),
('CM20191092753', '', '', 'siswa', 'Ayu  Azari Tan', 'Belum Aktif'),
('CM20191092754', '', '', 'siswa', 'Fernando  Sondakh', 'Belum Aktif'),
('CM20191092755', '', '', 'siswa', 'Shafira  Prayata Ardhana', 'Belum Aktif'),
('CM20191092756', '', '', 'siswa', 'Eliana  ', 'Belum Aktif'),
('CM20191092757', '', '', 'siswa', 'Janet  Gloria', 'Belum Aktif'),
('CM20191092758', '', '', 'siswa', 'Jason  Jeremiah', 'Belum Aktif'),
('CM20191092759', '', '', 'siswa', 'Salim  Janto', 'Belum Aktif'),
('CM20191092760', '', '', 'siswa', 'Nano  Khresna', 'Belum Aktif'),
('CM20191092761', '', '', 'siswa', 'Hendry  Permana Putra', 'Belum Aktif'),
('CM20191092762', '', '', 'siswa', 'Mustolih   ', 'Belum Aktif'),
('CM20191092763', '', '', 'siswa', 'Henoch  Zebaoth', 'Belum Aktif'),
('CM20191092764', '', '', 'siswa', 'Jhody Lesmana  Ongko', 'Belum Aktif'),
('CM20191092765', '', '', 'siswa', 'Suhartono  ', 'Belum Aktif'),
('CM20191092766', '', '', 'siswa', 'Imam  Wahyudhi', 'Belum Aktif'),
('CM20191092767', '', '', 'siswa', 'Kartika  Zurria Nirmala', 'Belum Aktif'),
('CM20191092768', '', '', 'siswa', 'Yuni  Awidda', 'Belum Aktif'),
('CM20191092769', '', '', 'siswa', 'Gita  Veliana Adjany', 'Belum Aktif'),
('CM20191092770', '', '', 'siswa', 'Wardah  Hasanah', 'Belum Aktif'),
('CM20191092771', '', '', 'siswa', 'Vina Amalia  Fitrianingrum', 'Belum Aktif'),
('CM20191092772', '', '', 'siswa', 'Widyanta  Kripsi Sadono', 'Belum Aktif'),
('CM20191092773', '', '', 'siswa', 'Andy  Saputra', 'Belum Aktif'),
('CM20191092774', '', '', 'siswa', 'Melinda Rahayu  Savira Valendina', 'Belum Aktif'),
('CM20191092775', '', '', 'siswa', 'Vincensius  Reynald Kurniawan', 'Belum Aktif'),
('CM20191092776', '', '', 'siswa', 'Febiola  Maya Fransiska', 'Belum Aktif'),
('CM20191092777', '', '', 'siswa', 'Muchamad  Eko Prasetyo', 'Belum Aktif'),
('CM20191092778', '', '', 'siswa', 'Faizal  ', 'Belum Aktif'),
('CM20191092779', '', '', 'siswa', 'Puput Yusda  Apriliana', 'Belum Aktif'),
('CM20191092780', '', '', 'siswa', 'Rudy  Firmansyah', 'Belum Aktif'),
('CM20191092781', '', '', 'siswa', 'Agus  Suprianto', 'Belum Aktif'),
('CM20191092782', '', '', 'siswa', 'Roy  Abraham', 'Belum Aktif'),
('CM20191092783', '', '', 'siswa', 'Wahyu  Nur Hidayatulloh', 'Belum Aktif'),
('CM20191092784', '', '', 'siswa', 'Muhammad  Rifai Romly', 'Belum Aktif'),
('CM20191092785', '', '', 'siswa', 'Mohamad  Imron', 'Belum Aktif'),
('CM20191092786', '', '', 'siswa', 'Utari  Ika Cahyani', 'Belum Aktif'),
('CM20191092787', '', '', 'siswa', 'Aminullah  Saleh Jakaria', 'Belum Aktif'),
('CM20191092788', '', '', 'siswa', 'Mohamad  Imron', 'Belum Aktif'),
('CM20191092789', '', '', 'siswa', 'Bintang  Prakoso', 'Belum Aktif'),
('CM20191092790', '', '', 'siswa', 'M. Zainal  Abidin', 'Belum Aktif'),
('CM20191092791', '', '', 'siswa', 'Muhammad  Mustakim', 'Belum Aktif'),
('CM20191092792', '', '', 'siswa', 'Dika  Kurniawan', 'Belum Aktif'),
('CM20191092793', '', '', 'siswa', 'Hans Daren  Christian Santoso', 'Belum Aktif'),
('CM20191092794', '', '', 'siswa', 'Maria  Dwi Susanti ', 'Belum Aktif'),
('CM20191092795', '', '', 'siswa', 'Riris  Khoiriyah', 'Belum Aktif'),
('CM20191092796', '', '', 'siswa', 'Karin  ', 'Belum Aktif'),
('CM20191092797', '', '', 'siswa', 'Maysa  Belinda Kurnia', 'Belum Aktif'),
('CM20191092798', '', '', 'siswa', 'Wisman  Aji Harnantoko', 'Belum Aktif'),
('CM20191092799', '', '', 'siswa', 'Hanan  Putra', 'Belum Aktif'),
('CM20191092800', '', '', 'siswa', 'Alvin  Wahyu Bagaskara', 'Belum Aktif'),
('CM20191092801', '', '', 'siswa', 'Erna  Kusumawati', 'Belum Aktif'),
('CM20191092802', '', '', 'siswa', 'Aziz  Fakhurrokhman', 'Belum Aktif'),
('CM20191092803', '', '', 'siswa', 'Vincent  Fernando', 'Belum Aktif'),
('CM20191092804', '', '', 'siswa', 'Arif  Wicaksono', 'Belum Aktif'),
('CM20191092805', '', '', 'siswa', 'Uswah  Mahmud', 'Belum Aktif'),
('CM20191092806', '', '', 'siswa', 'Rokhmania  Sholikhah', 'Belum Aktif'),
('CM20191092807', '', '', 'siswa', 'Lisa  Carolina', 'Belum Aktif'),
('CM20191092808', '', '', 'siswa', 'Ricko  Kurniawan', 'Belum Aktif'),
('CM20191092809', '', '', 'siswa', 'Abdul Shukor  Abdul Rahim', 'Belum Aktif'),
('CM20191092810', '', '', 'siswa', 'Yudi  Chandra', 'Belum Aktif'),
('CM20191092811', '', '', 'siswa', 'Abdul  Muhid', 'Belum Aktif'),
('CM20191092812', '', '', 'siswa', 'Abdul  Muhid', 'Belum Aktif'),
('CM20191092813', '', '', 'siswa', 'Bintang Prakoso', 'Belum Aktif'),
('CM20191092814', '', '', 'siswa', 'Abdurrohman  Nur', 'Belum Aktif'),
('CM20191092815', '', '', 'siswa', 'Dewi  Mita Sari', 'Belum Aktif'),
('CM20191092816', '', '', 'siswa', 'Heru  Prasetyo', 'Belum Aktif'),
('CM2019109999', '', '', 'siswa', 'Mohammad Rifat  Anwar', 'Belum Aktif'),
('CM2019110', '', '', 'siswa', 'Riesthandie  Riesthandie', 'Belum Aktif'),
('CM2019111', '', '', 'siswa', 'Septi  Andriani', 'Belum Aktif'),
('CM2019112', '', '', 'siswa', 'faiz  abrori', 'Belum Aktif'),
('CM2019113', '', '', 'siswa', 'Shella  Ryo', 'Belum Aktif'),
('CM2019114', '', '', 'siswa', 'rusliansyah  rully', 'Belum Aktif'),
('CM2019115', '', '', 'siswa', 'Okie  Sandra Firmansyah', 'Belum Aktif'),
('CM2019116', '', '', 'siswa', 'anastasia  rosalind', 'Belum Aktif'),
('CM2019117', '', '', 'siswa', 'Sugeng Purnomo', 'Belum Aktif'),
('CM2019118', '', '', 'siswa', 'Indera  Kurniawan Akhbar', 'Belum Aktif'),
('CM2019119', '', '', 'siswa', 'Mochammad  hidayat', 'Belum Aktif'),
('CM2019120', '', '', 'siswa', 'Shofyan  arif', 'Belum Aktif'),
('CM2019121', '', '', 'siswa', 'Yosua  Massaro', 'Belum Aktif'),
('CM2019122', '', '', 'siswa', 'lita  Ariyanti', 'Belum Aktif'),
('CM2019123', '', '', 'siswa', 'Vandi  Jose', 'Belum Aktif'),
('CM2019124', '', '', 'siswa', 'Abyzan  Razza Adel Haq', 'Belum Aktif'),
('CM2019125', '', '', 'siswa', 'lilik  suryaningsih', 'Belum Aktif'),
('CM2019126', '', '', 'siswa', 'Kun  Tegar Jaya Ibrahim', 'Belum Aktif'),
('CM2019127', '', '', 'siswa', 'Ferdian  Agung Kurniawan', 'Belum Aktif'),
('CM2019128', '', '', 'siswa', 'christine  susilo', 'Belum Aktif'),
('CM2019129', '', '', 'siswa', 'prastawa  adi wirjotenojo', 'Belum Aktif'),
('CM2019130', '', '', 'siswa', 'Crom  Tiyan', 'Belum Aktif'),
('CM2019131', '', '', 'siswa', 'Fengky  Setiono Szito', 'Belum Aktif'),
('CM2019132', '', '', 'siswa', 'Sumintar  Hadisiswoyo', 'Belum Aktif'),
('CM2019133', '', '', 'siswa', 'Deny  Setiawan', 'Belum Aktif'),
('CM2019134', '', '', 'siswa', 'MOCHAMAD  FAISAL', 'Belum Aktif'),
('CM2019135', '', '', 'siswa', 'nanang  firdaus', 'Belum Aktif'),
('CM2019136', '', '', 'siswa', 'Rafi  Indra Permana', 'Belum Aktif'),
('CM2019137', '', '', 'siswa', 'Olivia  Chu', 'Belum Aktif'),
('CM2019138', '', '', 'siswa', 'Yunus  Muhammad', 'Belum Aktif'),
('CM2019139', '', '', 'siswa', 'arini  dwi ramadhani', 'Belum Aktif'),
('CM2019140', '', '', 'siswa', 'm fatkhul  hadi', 'Belum Aktif'),
('CM2019141', '', '', 'siswa', 'fantasy  yahya', 'Belum Aktif'),
('CM2019142', '', '', 'siswa', 'suba  ikah', 'Belum Aktif'),
('CM2019143', '', '', 'siswa', 'Kemala  Paramitha', 'Belum Aktif'),
('CM2019144', '', '', 'siswa', 'nur  alfin', 'Belum Aktif'),
('CM2019145', '', '', 'siswa', 'Erika  Dewi Kartika', 'Belum Aktif'),
('CM2019146', '', '', 'siswa', 'Gegen  Prasetyo', 'Belum Aktif'),
('CM2019147', '', '', 'siswa', 'MAKS  LAISOKA', 'Belum Aktif'),
('CM2019148', '', '', 'siswa', 'LUPITA  THANAYA PUTRI', 'Belum Aktif'),
('CM2019149', '', '', 'siswa', 'syahril  ramdhani', 'Belum Aktif'),
('CM2019150', '', '', 'siswa', 'Emma  Rahmawati', 'Belum Aktif'),
('CM2019151', '', '', 'siswa', 'Juhenwils  Talumantak', 'Belum Aktif'),
('CM2019152', '', '', 'siswa', 'Muhammad  Yasir', 'Belum Aktif'),
('CM2019153', '', '', 'siswa', 'Precillia  aberta Putri', 'Belum Aktif'),
('CM2019154', '', '', 'siswa', 'try  kamal', 'Belum Aktif'),
('CM2019155', '', '', 'siswa', 'emir  ridho', 'Belum Aktif'),
('CM2019156', '', '', 'siswa', 'Ellen  Kusumadjaja', 'Belum Aktif'),
('CM2019157', '', '', 'siswa', 'Atika  Hermanda', 'Belum Aktif'),
('CM2019158', '', '', 'siswa', 'Ika  Oktaviana', 'Belum Aktif'),
('CM2019159', '', '', 'siswa', 'Setiawan  ', 'Belum Aktif'),
('CM2019160', '', '', 'siswa', 'Grace  Rompies', 'Belum Aktif'),
('CM2019161', '', '', 'siswa', 'Ali  Tofan', 'Belum Aktif'),
('CM2019162', '', '', 'siswa', 'Kokoh  Aji Supanggih', 'Belum Aktif'),
('CM2019163', '', '', 'siswa', 'Ryan  Eranio Irwan', 'Belum Aktif'),
('CM2019164', '', '', 'siswa', 'HENDRIANSAH  PRASTYA NUGROHO', 'Belum Aktif'),
('CM2019165', '', '', 'siswa', 'Nabil  Naufal', 'Belum Aktif'),
('CM2019166', '', '', 'siswa', 'Valentino  Sholly', 'Belum Aktif'),
('CM2019167', '', '', 'siswa', 'Faisal  Habibi', 'Belum Aktif'),
('CM2019168', '', '', 'siswa', 'Davit  Davit', 'Belum Aktif'),
('CM2019169', '', '', 'siswa', 'Thomas  Brian', 'Belum Aktif'),
('CM2019170', '', '', 'siswa', 'Anggun  Ajeng', 'Belum Aktif'),
('CM2019171', '', '', 'siswa', 'Heru  Triono', 'Belum Aktif'),
('CM2019172', '', '', 'siswa', 'Satria  Oktano', 'Belum Aktif'),
('CM2019173', '', '', 'siswa', 'arya  dwi utomo budi', 'Belum Aktif'),
('CM2019174', '', '', 'siswa', 'Suryadi  Arif', 'Belum Aktif'),
('CM2019175', '', '', 'siswa', 'Adis  Lavrianto', 'Belum Aktif'),
('CM2019176', '', '', 'siswa', 'Putut  Joko prasetiyo', 'Belum Aktif'),
('CM2019177', '', '', 'siswa', 'Biem  Prima', 'Belum Aktif'),
('CM2019178', '', '', 'siswa', 'AJI  SAFRAJI', 'Belum Aktif'),
('CM2019179', '', '', 'siswa', 'Rifqi  Wahyu aryanto', 'Belum Aktif'),
('CM2019180', '', '', 'siswa', 'Tumpal Sirait', 'Belum Aktif'),
('CM2019181', '', '', 'siswa', 'Ahmad  Fahmi', 'Belum Aktif'),
('CM2019182', '', '', 'siswa', 'Uka  Brittantyo', 'Belum Aktif'),
('CM2019183', '', '', 'siswa', 'Ahmad  Fikri Iskandar', 'Belum Aktif'),
('CM2019184', '', '', 'siswa', 'Akmal  Fuadi', 'Belum Aktif'),
('CM2019185', '', '', 'siswa', 'sasongko  prayogi', 'Belum Aktif'),
('CM2019186', '', '', 'siswa', 'Adiyaksa  Prasidapati', 'Belum Aktif'),
('CM2019187', '', '', 'siswa', 'Abd  Hannan', 'Belum Aktif'),
('CM2019188', '', '', 'siswa', 'Kurnia  Muliasari', 'Belum Aktif'),
('CM2019189', '', '', 'siswa', 'Puput  Tri', 'Belum Aktif'),
('CM2019190', '', '', 'siswa', 'muhammad  naashiruddiin', 'Belum Aktif'),
('CM2019191', '', '', 'siswa', 'Andi  Bastian', 'Belum Aktif'),
('CM2019192', '', '', 'siswa', 'Idris  Efendi', 'Belum Aktif'),
('CM2019193', '', '', 'siswa', 'POENDIK  SOEGIYANTO', 'Belum Aktif'),
('CM2019194', '', '', 'siswa', 'sholi  zhaynol abbidin', 'Belum Aktif'),
('CM2019195', '', '', 'siswa', 'Siti  Yulianah', 'Belum Aktif'),
('CM2019196', '', '', 'siswa', 'Arin  Maya Rosita', 'Belum Aktif'),
('CM2019197', '', '', 'siswa', 'jessy  wiliana', 'Belum Aktif'),
('CM2019199', '', '', 'siswa', 'Sholehuddin  ', 'Belum Aktif'),
('CM2019200', '', '', 'siswa', 'Haris  Faisal', 'Belum Aktif'),
('CM2019201', '', '', 'siswa', 'Hendar  saputra', 'Belum Aktif'),
('CM2019202', '', '', 'siswa', 'adip  prasetyo', 'Belum Aktif'),
('CM2019203', '', '', 'siswa', 'Mohammad  Rifat Anwar', 'Belum Aktif'),
('CM2019204', '', '', 'siswa', 'Velita  Susanto', 'Belum Aktif'),
('CM2019206', '', '', 'siswa', 'husni  husni', 'Belum Aktif'),
('CM2019207', '', '', 'siswa', 'Trio  Agam Setiawan', 'Belum Aktif'),
('CM2019209', '', '', 'siswa', 'Bima sakti', 'Belum Aktif'),
('CM2019210', '', '', 'siswa', 'Stefanie  Hadi', 'Belum Aktif'),
('CM2019211', '', '', 'siswa', 'Fauzi  Alkautsar', 'Belum Aktif'),
('CM2019212', '', '', 'siswa', 'ollan  kerans', 'Belum Aktif'),
('CM2019213', '', '', 'siswa', 'felix  abdullah', 'Belum Aktif'),
('CM2019214', '', '', 'siswa', 'Shofa  Nur aidah', 'Belum Aktif'),
('CM2019215', '', '', 'siswa', 'M Eko  Prasetyo', 'Belum Aktif'),
('CM2019216', '', '', 'siswa', 'Agus  Setiawan', 'Belum Aktif'),
('CM2019217', '', '', 'siswa', 'Marilyn  Regina', 'Belum Aktif'),
('CM2019218', '', '', 'siswa', 'Andre  citra Atmaja', 'Belum Aktif'),
('CM2019219', '', '', 'siswa', 'Djuniarto  Djun', 'Belum Aktif'),
('CM2019220', '', '', 'siswa', 'YUL  ADRIANSYAH', 'Belum Aktif'),
('CM2019221', '', '', 'siswa', 'Michelle  Angela Molomu', 'Belum Aktif'),
('CM2019222', '', '', 'siswa', 'Didin  sobari', 'Belum Aktif'),
('CM2019223', '', '', 'siswa', 'Bayu  Wicaksono', 'Belum Aktif'),
('CM2019224', '', '', 'siswa', 'hendro  wibowo', 'Belum Aktif'),
('CM2019225', '', '', 'siswa', 'faris  ahmad', 'Belum Aktif'),
('CM2019226', '', '', 'siswa', 'dicky  hadi', 'Belum Aktif'),
('CM2019227', '', '', 'siswa', 'Wira  Satyawan', 'Belum Aktif'),
('CM2019228', '', '', 'siswa', 'Thomas  Brian', 'Belum Aktif'),
('CM2019229', '', '', 'siswa', 'Tania  Aneira', 'Belum Aktif'),
('CM2019230', '', '', 'siswa', 'Hendri  Ch', 'Belum Aktif'),
('CM2019231', '', '', 'siswa', 'Gilang  Adhi Permana', 'Belum Aktif'),
('CM2019232', '', '', 'siswa', 'junaidi  junai', 'Belum Aktif'),
('CM2019233', '', '', 'siswa', 'Farraz  Haidar Akbar', 'Belum Aktif'),
('CM2019234', '', '', 'siswa', 'R akhmad  munif Haryono', 'Belum Aktif'),
('CM2019235', '', '', 'siswa', 'Jaco  Ahmad', 'Belum Aktif'),
('CM2019236', '', '', 'siswa', 'Moch  Masrur', 'Belum Aktif'),
('CM2019237', '', '', 'siswa', 'Achmadi  Salmawan', 'Belum Aktif'),
('CM2019238', '', '', 'siswa', 'Widya  Satria Utama', 'Belum Aktif'),
('CM2019239', '', '', 'siswa', 'saiful  hadi', 'Belum Aktif'),
('CM2019240', '', '', 'siswa', 'Crom  Tiyan', 'Belum Aktif'),
('CM2019241', '', '', 'siswa', 'Mustajab  Arif', 'Belum Aktif'),
('CM2019242', '', '', 'siswa', 'bambang  nurcahyono', 'Belum Aktif'),
('CM2019243', '', '', 'siswa', 'Hermanto SE  ', 'Belum Aktif'),
('CM2019244', '', '', 'siswa', 'iqbal  izaz perdana', 'Belum Aktif'),
('CM2019245', '', '', 'siswa', 'Andreas  Dwi Susilo', 'Belum Aktif'),
('CM2019246', '', '', 'siswa', 'Mochammad  Rusdi', 'Belum Aktif'),
('CM2019247', '', '', 'siswa', 'Nindi  Aditya', 'Belum Aktif'),
('CM2019248', '', '', 'siswa', 'Muhammad  Alif Alrasyid', 'Belum Aktif'),
('CM2019249', '', '', 'siswa', 'Bagus  Amin Saputra', 'Belum Aktif'),
('CM2019250', '', '', 'siswa', 'Triyo  Bawono', 'Belum Aktif'),
('CM2019251', '', '', 'siswa', 'Winardy  Hertanto', 'Belum Aktif'),
('CM2019252', '', '', 'siswa', 'adis  nugraha', 'Belum Aktif'),
('CM2019253', '', '', 'siswa', 'Prasetyati  Riski', 'Belum Aktif'),
('CM2019254', '', '', 'siswa', 'WIKA  AKBAR', 'Belum Aktif'),
('CM2019255', '', '', 'siswa', 'Ikki  Kurogane', 'Belum Aktif'),
('CM2019256', '', '', 'siswa', 'karyadi  adie', 'Belum Aktif'),
('CM2019257', '', '', 'siswa', 'nindi  aditya', 'Belum Aktif'),
('CM2019258', '', '', 'siswa', 'Nindy  Seftiavani', 'Belum Aktif'),
('CM2019259', '', '', 'siswa', 'Lusiana  Stefanus', 'Belum Aktif'),
('CM2019260', '', '', 'siswa', 'arten  selvian', 'Belum Aktif'),
('CM2019261', '', '', 'siswa', 'Solehoddin  ', 'Belum Aktif'),
('CM2019262', '', '', 'siswa', 'Adam  Wicakasana', 'Belum Aktif'),
('CM2019263', '', '', 'siswa', 'Sheylla  Nerissa', 'Belum Aktif'),
('CM2019264', '', '', 'siswa', 'moch  ridwan', 'Belum Aktif'),
('CM2019265', '', '', 'siswa', 'Redita  Prasetyo', 'Belum Aktif'),
('CM2019266', '', '', 'siswa', 'Rizky  dwi putra', 'Belum Aktif'),
('CM2019267', '', '', 'siswa', 'Ikhsan  Wahyudi', 'Belum Aktif'),
('CM2019268', '', '', 'siswa', 'Muhammad DIego  Aprillio Kusnandy', 'Belum Aktif'),
('CM2019269', '', '', 'siswa', 'Yoppy  Handoko', 'Belum Aktif'),
('CM2019270', '', '', 'siswa', 'Maria  Intan sania', 'Belum Aktif'),
('CM2019271', '', '', 'siswa', 'dipa  ferdian', 'Belum Aktif'),
('CM2019272', '', '', 'siswa', 'Firly  Mas\'ulatul Janah', 'Belum Aktif'),
('CM2019273', '', '', 'siswa', 'Wildan  Rizki Mubarok', 'Belum Aktif'),
('CM2019274', '', '', 'siswa', 'Kusnadi  Jarek', 'Belum Aktif'),
('CM2019275', '', '', 'siswa', 'edo  sulistyo', 'Belum Aktif'),
('CM2019276', '', '', 'siswa', 'Ahmad Tasdiq  Arafah Siregar', 'Belum Aktif'),
('CM2019277', '', '', 'siswa', 'Richard  Sudibyo', 'Belum Aktif'),
('CM2019278', '', '', 'siswa', 'Daniel  Christianto', 'Belum Aktif'),
('CM2019279', '', '', 'siswa', 'bergas  eldi', 'Belum Aktif'),
('CM2019280', '', '', 'siswa', 'sumariyono  ', 'Belum Aktif'),
('CM2019281', '', '', 'siswa', 'Dhea  Hasrianah', 'Belum Aktif'),
('CM2019282', '', '', 'siswa', 'Moch Maulidin  Rizqi Arif', 'Belum Aktif'),
('CM2019283', '', '', 'siswa', 'Syafii  Zp', 'Belum Aktif'),
('CM2019284', '', '', 'siswa', 'RIZKY  KENDRA ANJANI', 'Belum Aktif'),
('CM2019285', '', '', 'siswa', 'Kiki  Hermawan', 'Belum Aktif'),
('CM2019286', '', '', 'siswa', 'Rahmat  Aminuddin', 'Belum Aktif'),
('CM2019287', '', '', 'siswa', 'Mochamad  Sabarudin', 'Belum Aktif'),
('CM2019288', '', '', 'siswa', 'Muhammad  Suef', 'Belum Aktif'),
('CM2019289', '', '', 'siswa', 'Hamzah  Firdaus', 'Belum Aktif'),
('CM2019290', '', '', 'siswa', 'Ainul  Rufi', 'Belum Aktif'),
('CM2019291', '', '', 'siswa', 'Irfan  Fauzi Nugraha', 'Belum Aktif'),
('CM2019292', '', '', 'siswa', 'Arni  Muarifah Amri', 'Belum Aktif'),
('CM2019293', '', '', 'siswa', 'setyo  tyo', 'Belum Aktif'),
('CM2019294', '', '', 'siswa', 'Imamm  Kusairi', 'Belum Aktif'),
('CM2019295', '', '', 'siswa', 'Hadit  Fikri Falah', 'Belum Aktif'),
('CM2019296', '', '', 'siswa', 'Rochmatul  Khikmiyah', 'Belum Aktif'),
('CM2019297', '', '', 'siswa', 'thareq  bramasta', 'Belum Aktif'),
('CM2019298', '', '', 'siswa', 'Elliot  Donohadi', 'Belum Aktif'),
('CM2019299', '', '', 'siswa', 'Serfi  Cherry Kawulur', 'Belum Aktif'),
('CM2019300', '', '', 'siswa', 'Hasbi  alfaridzi', 'Belum Aktif'),
('CM2019301', '', '', 'siswa', 'Bambang   satriyo', 'Belum Aktif'),
('CM2019302', '', '', 'siswa', 'Rahmad  Tirta Febriyanto ', 'Belum Aktif'),
('CM2019303', '', '', 'siswa', 'Anang  subandi', 'Belum Aktif'),
('CM2019304', '', '', 'siswa', 'Tiara  Lauw', 'Belum Aktif'),
('CM2019305', '', '', 'siswa', 'Baiquni  elhuda', 'Belum Aktif'),
('CM2019306', '', '', 'siswa', 'Sheren  Moidady', 'Belum Aktif'),
('CM2019307', '', '', 'siswa', 'Nanda  Anisyah', 'Belum Aktif'),
('CM2019308', '', '', 'siswa', 'Dicky  hdia', 'Belum Aktif'),
('CM2019309', '', '', 'siswa', 'Sayida  Brillian ', 'Belum Aktif'),
('CM2019310', '', '', 'siswa', 'Ernest  Pranata', 'Belum Aktif'),
('CM2019311', '', '', 'siswa', 'Ade  Nugroho ', 'Belum Aktif'),
('CM2019312', '', '', 'siswa', 'Iffah  Nor  Azizah ', 'Belum Aktif'),
('CM2019313', '', '', 'siswa', 'Ivan  Gunawan ', 'Belum Aktif'),
('CM2019314', '', '', 'siswa', 'Ahmad  Sigit Cahyadhi ', 'Belum Aktif'),
('CM2019315', '', '', 'siswa', 'Soni   Hoo', 'Belum Aktif'),
('CM2019316', '', '', 'siswa', 'Muhammad  akmal jafar ', 'Belum Aktif'),
('CM2019317', '', '', 'siswa', 'Ferdi  Umbu', 'Belum Aktif'),
('CM2019318', '', '', 'siswa', 'irham  mr', 'Belum Aktif'),
('CM2019319', '', '', 'siswa', 'Dina  Adnan', 'Belum Aktif'),
('CM2019320', '', '', 'siswa', 'Adi  candra ', 'Belum Aktif'),
('CM2019321', '', '', 'siswa', 'Pandu   Ariwibowo', 'Belum Aktif'),
('CM2019322', '', '', 'siswa', 'EDI  ARIANTO ', 'Belum Aktif'),
('CM2019323', '', '', 'siswa', 'Wilfridus   Laki ', 'Belum Aktif'),
('CM2019324', '', '', 'siswa', 'Hartanto  ', 'Belum Aktif'),
('CM2019325', '', '', 'siswa', 'Alvin  Tanya ', 'Belum Aktif'),
('CM2019326', '', '', 'siswa', 'Roni  Witarto', 'Belum Aktif'),
('CM2019327', '', '', 'siswa', 'slamet  riyadi', 'Belum Aktif'),
('CM2019328', '', '', 'siswa', 'Irsan   Salim', 'Belum Aktif'),
('CM2019329', '', '', 'siswa', 'aidy  fitri', 'Belum Aktif'),
('CM2019330', '', '', 'siswa', 'Elaine  Hanafi', 'Belum Aktif'),
('CM2019331', '', '', 'siswa', 'Ghiffari  Arfian', 'Belum Aktif'),
('CM2019332', '', '', 'siswa', 'ima  suryani', 'Belum Aktif'),
('CM2019333', '', '', 'siswa', 'andri  wijaya', 'Belum Aktif'),
('CM2019334', '', '', 'siswa', 'Jessy  Wiliana', 'Belum Aktif'),
('CM2019335', '', '', 'siswa', 'Muhammad   Abduh', 'Belum Aktif'),
('CM2019336', '', '', 'siswa', 'Galih  Indra Rochim', 'Belum Aktif'),
('CM2019337', '', '', 'siswa', 'Nisa  Septarini', 'Belum Aktif'),
('CM2019338', '', '', 'siswa', 'Vemi  Suwita', 'Belum Aktif'),
('CM2019339', '', '', 'siswa', 'Yusnitaqwa ,S.Pd', 'Belum Aktif'),
('CM2019340', '', '', 'siswa', 'IWAN  PARTONO', 'Belum Aktif'),
('CM2019341', '', '', 'siswa', 'RADIANT  AGUNG', 'Belum Aktif'),
('CM2019342', '', '', 'siswa', 'SISWANTO  ', 'Belum Aktif'),
('CM2019343', '', '', 'siswa', 'wahyu  hidayat', 'Belum Aktif'),
('CM2019344', '', '', 'siswa', 'Thomas  Brian', 'Belum Aktif'),
('CM2019345', '', '', 'siswa', 'Leonard  Susilo', 'Belum Aktif'),
('CM2019346', '', '', 'siswa', 'Soegiharto  Kreshna', 'Belum Aktif'),
('CM2019347', '', '', 'siswa', 'VIRA  AMELLA JATMIKOC', 'Belum Aktif'),
('CM2019348', '', '', 'siswa', 'Susanto   ', 'Belum Aktif'),
('CM2019349', '', '', 'siswa', 'syahril  ary', 'Belum Aktif'),
('CM2019350', '', '', 'siswa', 'beta  beta', 'Belum Aktif'),
('CM2019351', '', '', 'siswa', 'yuyus  yususf', 'Belum Aktif'),
('CM2019352', '', '', 'siswa', 'stella  stepfanie', 'Belum Aktif'),
('CM2019353', '', '', 'siswa', 'heldo  donal', 'Belum Aktif'),
('CM2019354', '', '', 'siswa', 'masblorok   ', 'Belum Aktif'),
('CM2019355', '', '', 'siswa', 'Christianto  Felix Juwono Suganda  ', 'Belum Aktif'),
('CM2019356', '', '', 'siswa', 'Soegiharto   ', 'Belum Aktif'),
('CM2019357', '', '', 'siswa', 'ISAMU GUSTI  PUTU RAI GANESHA ', 'Belum Aktif'),
('CM2019358', '', '', 'siswa', 'asrul  jaya', 'Belum Aktif'),
('CM2019359', '', '', 'siswa', 'Claudine  Hartanto', 'Belum Aktif'),
('CM2019360', '', '', 'siswa', 'Eza  Putra', 'Belum Aktif'),
('CM2019361', '', '', 'siswa', 'Riswan  Nokta Distira', 'Belum Aktif'),
('CM2019362', '', '', 'siswa', 'mar  sela', 'Belum Aktif'),
('CM2019363', '', '', 'siswa', 'yohana  tiro', 'Belum Aktif'),
('CM2019364', '', '', 'siswa', 'Nizar  Julfikar', 'Belum Aktif'),
('CM2019365', '', '', 'siswa', 'AGUS  MUKAROM', 'Belum Aktif'),
('CM2019366', '', '', 'siswa', 'Afrizal  Yasin', 'Belum Aktif'),
('CM2019367', '', '', 'siswa', 'Lukman  Tandy', 'Belum Aktif'),
('CM2019368', '', '', 'siswa', 'Yanarto   Teguh Prasetyo, S.Kom', 'Belum Aktif'),
('CM2019369', '', '', 'siswa', 'Christ  Paul', 'Belum Aktif'),
('CM2019370', '', '', 'siswa', 'Dewi  Ariyati', 'Belum Aktif'),
('CM2019371', '', '', 'siswa', 'Iskandar  Muda', 'Belum Aktif'),
('CM2019372', '', '', 'siswa', 'yusuf  fakhruddin', 'Belum Aktif'),
('CM2019373', '', '', 'siswa', 'imran  rahmat', 'Belum Aktif'),
('CM2019374', '', '', 'siswa', 'ADITYA  RAHMAWAN ', 'Belum Aktif'),
('CM2019375', '', '', 'siswa', 'Dimas  Dwi Arbi', 'Belum Aktif'),
('CM2019376', '', '', 'siswa', 'Moh. Ridzwanul  Kirom', 'Belum Aktif'),
('CM2019377', '', '', 'siswa', 'Yonathan  Rengga', 'Belum Aktif'),
('CM2019378', '', '', 'siswa', 'Deden  Setiadi', 'Belum Aktif'),
('CM2019379', '', '', 'siswa', 'rachmad andre  virgantara putra', 'Belum Aktif'),
('CM2019380', '', '', 'siswa', 'Muhammad  Ali', 'Belum Aktif'),
('CM2019381', '', '', 'siswa', 'Any   Suryaningsih', 'Belum Aktif'),
('CM2019382', '', '', 'siswa', 'Efendy  Yosal', 'Belum Aktif'),
('CM2019383', '', '', 'siswa', 'Ayu  Wulandari', 'Belum Aktif'),
('CM2019384', '', '', 'siswa', 'Rendi  firdaus', 'Belum Aktif'),
('CM2019385', '', '', 'siswa', 'ipang  argilla', 'Belum Aktif'),
('CM2019386', '', '', 'siswa', 'riski  muhammad arbian ', 'Belum Aktif'),
('CM2019387', '', '', 'siswa', 'Christian  Bams', 'Belum Aktif'),
('CM2019388', '', '', 'siswa', 'barevandayu  Elang', 'Belum Aktif'),
('CM2019389', '', '', 'siswa', 'bayu  elang revanda', 'Belum Aktif'),
('CM2019390', '', '', 'siswa', 'yanto  toring', 'Belum Aktif'),
('CM2019391', '', '', 'siswa', 'Yoga pradyptya', 'Belum Aktif'),
('CM2019392', '', '', 'siswa', 'Galih  Sanjaya', 'Belum Aktif'),
('CM2019393', '', '', 'siswa', 'Berto  Juanda', 'Belum Aktif'),
('CM2019394', '', '', 'siswa', 'Ahmad Arisandy', 'Belum Aktif'),
('CM2019395', '', '', 'siswa', 'Andry  Chrinstia', 'Belum Aktif'),
('CM2019396', '', '', 'siswa', 'Fandy  AditanayPutraa ', 'Belum Aktif'),
('CM2019397', '', '', 'siswa', 'Triad  Kurniawan', 'Belum Aktif'),
('CM2019398', '', '', 'siswa', 'Nurul   Mahdalena', 'Belum Aktif'),
('CM2019399', '', '', 'siswa', 'ade  ristiyawati', 'Belum Aktif'),
('CM2019400', '', '', 'siswa', 'Mus  sarib', 'Belum Aktif'),
('CM2019401', '', '', 'siswa', 'Fakhrurrazi  ', 'Belum Aktif'),
('CM2019402', '', '', 'siswa', 'Dian Sofianty  Pratiwi', 'Belum Aktif'),
('CM2019403', '', '', 'siswa', 'Agus  Randhani', 'Belum Aktif'),
('CM2019404', '', '', 'siswa', 'Glenn  D P  Maramis', 'Belum Aktif'),
('CM2019405', '', '', 'siswa', 'Yuyun  Setiorini', 'Belum Aktif'),
('CM2019406', '', '', 'siswa', 'Julio  Reinaldo', 'Belum Aktif'),
('CM2019407', '', '', 'siswa', 'Wira   Kencono', 'Belum Aktif'),
('CM2019408', '', '', 'siswa', 'purna  ekasari', 'Belum Aktif'),
('CM2019409', '', '', 'siswa', 'Vincen  Williamz', 'Belum Aktif'),
('CM2019410', '', '', 'siswa', 'Mardianto  Basuki', 'Belum Aktif'),
('CM2019411', '', '', 'siswa', 'nur  imamah', 'Belum Aktif'),
('CM2019412', '', '', 'siswa', 'ainur  rosidin', 'Belum Aktif'),
('CM2019413', '', '', 'siswa', 'Theodorus  Andrew Kansil', 'Belum Aktif'),
('CM2019414', '', '', 'siswa', 'Hendrik  Rustiawan', 'Belum Aktif'),
('CM2019415', '', '', 'siswa', 'Angga  Prasetyo', 'Belum Aktif'),
('CM2019416', '', '', 'siswa', 'FLORENCIA  LIE', 'Belum Aktif'),
('CM2019417', '', '', 'siswa', 'Arya  Rifqi Pratama', 'Belum Aktif'),
('CM2019418', '', '', 'siswa', 'pipiet  pronocitro', 'Belum Aktif'),
('CM2019419', '', '', 'siswa', 'rachmat   hidayat', 'Belum Aktif'),
('CM2019420', '', '', 'siswa', 'Adi  Swandaru Wasisto', 'Belum Aktif'),
('CM2019421', '', '', 'siswa', 'Fransisco  Senior', 'Belum Aktif'),
('CM2019422', '', '', 'siswa', 'eko  cahyono', 'Belum Aktif'),
('CM2019423', '', '', 'siswa', 'najwa  ramadhani', 'Belum Aktif'),
('CM2019424', '', '', 'siswa', 'dian  setiawan', 'Belum Aktif'),
('CM2019425', '', '', 'siswa', 'Ditta  Alfianto', 'Belum Aktif'),
('CM2019426', '', '', 'siswa', 'Maulana  Malik', 'Belum Aktif'),
('CM2019427', '', '', 'siswa', 'Jimmy  Pangalinan', 'Belum Aktif'),
('CM2019428', '', '', 'siswa', 'Muhammad   Dhaifan', 'Belum Aktif'),
('CM2019429', '', '', 'siswa', 'Effie  Sanusi', 'Belum Aktif'),
('CM2019430', '', '', 'siswa', 'ade  kowareono', 'Belum Aktif'),
('CM2019431', '', '', 'siswa', 'Budi  Darmawan', 'Belum Aktif'),
('CM2019432', '', '', 'siswa', 'Rafi  Indra Permana', 'Belum Aktif'),
('CM2019433', '', '', 'siswa', 'ardhi  wicaksono', 'Belum Aktif'),
('CM2019434', '', '', 'siswa', 'aris b eny  prayogo', 'Belum Aktif'),
('CM2019435', '', '', 'siswa', 'SANGGAR  ABRESO MAINO', 'Belum Aktif'),
('CM2019436', '', '', 'siswa', 'Tito  Ardiansyah', 'Belum Aktif'),
('CM2019437', '', '', 'siswa', 'muhamad  ainul yakin', 'Belum Aktif'),
('CM2019438', '', '', 'siswa', 'hendra  surahmat', 'Belum Aktif'),
('CM2019439', '', '', 'siswa', 'stefanie   wong', 'Belum Aktif'),
('CM2019440', '', '', 'siswa', 'ary  sunantiyo', 'Belum Aktif'),
('CM2019441', '', '', 'siswa', 'tengku  novansyah', 'Belum Aktif'),
('CM2019442', '', '', 'siswa', 'Lim  Mulyono', 'Belum Aktif'),
('CM2019443', '', '', 'siswa', 'mistang  boenk', 'Belum Aktif'),
('CM2019444', '', '', 'siswa', 'Taufiq   Marie', 'Belum Aktif'),
('CM2019445', '', '', 'siswa', 'Tantowy  Jauhari', 'Belum Aktif'),
('CM2019446', '', '', 'siswa', 'Denis  Aridiana', 'Belum Aktif'),
('CM2019447', '', '', 'siswa', 'Emilia  Nur Cholifah', 'Belum Aktif');
INSERT INTO `login` (`username`, `password`, `photo`, `tipe`, `nama`, `status`) VALUES
('CM2019448', '', '', 'siswa', 'Mutiara   Ningrum', 'Belum Aktif'),
('CM2019449', '', '', 'siswa', 'Yusron  Mustain', 'Belum Aktif'),
('CM2019450', '', '', 'siswa', 'Pingkan  Dharma', 'Belum Aktif'),
('CM2019451', '', '', 'siswa', 'RATIH  NIDIA', 'Belum Aktif'),
('CM2019452', '', '', 'siswa', 'David  Sugianto', 'Belum Aktif'),
('CM2019453', '', '', 'siswa', 'if titach  ', 'Belum Aktif'),
('CM2019454', '', '', 'siswa', 'Ali  Tofan', 'Belum Aktif'),
('CM2019455', '', '', 'siswa', 'bily  julian', 'Belum Aktif'),
('CM2019456', '', '', 'siswa', 'PANDU  SWASONOPUTRA', 'Belum Aktif'),
('CM2019457', '', '', 'siswa', 'davit  muslimin', 'Belum Aktif'),
('CM2019458', '', '', 'siswa', 'Fredy  Hermanto', 'Belum Aktif'),
('CM2019459', '', '', 'siswa', 'Rini  Desi Ariyanti', 'Belum Aktif'),
('CM2019460', '', '', 'siswa', 'Rizky  Aditya Nugroho', 'Belum Aktif'),
('CM2019461', '', '', 'siswa', 'Rian  Andriano', 'Belum Aktif'),
('CM2019462', '', '', 'siswa', 'Sidarta  Gautama', 'Belum Aktif'),
('CM2019463', '', '', 'siswa', 'iva nur  halimah', 'Belum Aktif'),
('CM2019464', '', '', 'siswa', 'theofilus  andre saputra', 'Belum Aktif'),
('CM2019465', '', '', 'siswa', 'Muhammad  Saddam Alhaq', 'Belum Aktif'),
('CM2019466', '', '', 'siswa', 'Agung  Hilmiawan', 'Belum Aktif'),
('CM2019467', '', '', 'siswa', 'ALVITA   SALASTISABILA', 'Belum Aktif'),
('CM2019468', '', '', 'siswa', 'Ahmad  Sigit Cahyadhi', 'Belum Aktif'),
('CM2019469', '', '', 'siswa', 'Stefanus  Angga Widartha', 'Belum Aktif'),
('CM2019470', '', '', 'siswa', 'Sumantri   ', 'Belum Aktif'),
('CM2019471', '', '', 'siswa', 'Farhan  Hidayat', 'Belum Aktif'),
('CM2019472', '', '', 'siswa', 'Isnainy  Nurlaily', 'Belum Aktif'),
('CM2019473', '', '', 'siswa', 'EVI ARI  SANTI', 'Belum Aktif'),
('CM2019474', '', '', 'siswa', 'Prasetyo   Hari', 'Belum Aktif'),
('CM2019475', '', '', 'siswa', 'Made  Rai Lintang Kresnadi ', 'Belum Aktif'),
('CM2019476', '', '', 'siswa', 'Andan  Adhie s', 'Belum Aktif'),
('CM2019477', '', '', 'siswa', 'Leonardo  sihombing', 'Belum Aktif'),
('CM2019478', '', '', 'siswa', 'ALDHILA  KURNIAWAN', 'Belum Aktif'),
('CM2019479', '', '', 'siswa', 'Adrian  Hartono Atmadjaja ', 'Belum Aktif'),
('CM2019480', '', '', 'siswa', 'Ywang  Nara  Pragnya', 'Belum Aktif'),
('CM2019481', '', '', 'siswa', 'Nurkumala  Sari ', 'Belum Aktif'),
('CM2019482', '', '', 'siswa', 'Hazrul   Azan', 'Belum Aktif'),
('CM2019483', '', '', 'siswa', 'Retno  Palupi', 'Belum Aktif'),
('CM2019484', '', '', 'siswa', 'Awtia  Andini', 'Belum Aktif'),
('CM2019485', '', '', 'siswa', 'Muhammad  Fikri Fahmillah ', 'Belum Aktif'),
('CM2019486', '', '', 'siswa', 'kukuh  candra kurniawan', 'Belum Aktif'),
('CM2019487', '', '', 'siswa', 'Misbakhul  Munir', 'Belum Aktif'),
('CM2019488', '', '', 'siswa', 'Januar  Tambunan', 'Belum Aktif'),
('CM2019489', '', '', 'siswa', 'Ricky  Harmoko', 'Belum Aktif'),
('CM2019490', '', '', 'siswa', 'Asril  Kurniadi', 'Belum Aktif'),
('CM2019491', '', '', 'siswa', 'Rizal  Adv', 'Belum Aktif'),
('CM2019492', '', '', 'siswa', 'Tio  Dwihono', 'Belum Aktif'),
('CM2019493', '', '', 'siswa', 'ARI   PANDU', 'Belum Aktif'),
('CM2019494', '', '', 'siswa', 'Anas  Solihin', 'Belum Aktif'),
('CM2019495', '', '', 'siswa', 'eko   jermia', 'Belum Aktif'),
('CM2019496', '', '', 'siswa', 'marco   priyo hutomo', 'Belum Aktif'),
('CM2019497', '', '', 'siswa', 'decky  imam januar', 'Belum Aktif'),
('CM2019498', '', '', 'siswa', 'Ade  Christian', 'Belum Aktif'),
('CM2019499', '', '', 'siswa', 'Nusa anugra antariksa', 'Belum Aktif'),
('CM2019500', '', '', 'siswa', 'evi  hermawati', 'Belum Aktif'),
('CM2019501', '', '', 'siswa', 'Khumroni   ', 'Belum Aktif'),
('CM2019502', '', '', 'siswa', 'Robbin  Karuniawan', 'Belum Aktif'),
('CM2019503', '', '', 'siswa', 'eka  putri', 'Belum Aktif'),
('CM2019504', '', '', 'siswa', 'RIZA  SYULTONI', 'Belum Aktif'),
('CM2019505', '', '', 'siswa', 'budi  nandio', 'Belum Aktif'),
('CM2019506', '', '', 'siswa', 'Rudi  Hikmatullah', 'Belum Aktif'),
('CM2019507', '', '', 'siswa', 'pingky  titus', 'Belum Aktif'),
('CM2019508', '', '', 'siswa', 'Axel  Leonard Widodo', 'Belum Aktif'),
('CM2019509', '', '', 'siswa', 'lu\'luul   maknun', 'Belum Aktif'),
('CM2019510', '', '', 'siswa', 'Zamzam  Ulinuha F', 'Belum Aktif'),
('CM2019511', '', '', 'siswa', 'jafar  baddar', 'Belum Aktif'),
('CM2019512', '', '', 'siswa', 'choirul  anam', 'Belum Aktif'),
('CM2019513', '', '', 'siswa', 'Haydar  Muhammad', 'Belum Aktif'),
('CM2019514', '', '', 'siswa', 'Gabrielle  Oliviani', 'Belum Aktif'),
('CM2019515', '', '', 'siswa', 'moch risqi  oktavidyan', 'Belum Aktif'),
('CM2019516', '', '', 'siswa', 'Muhamad   Riansyah', 'Belum Aktif'),
('CM2019517', '', '', 'siswa', 'Stefandry  ', 'Belum Aktif'),
('CM2019518', '', '', 'siswa', 'Jeng  Pramesti', 'Belum Aktif'),
('CM2019519', '', '', 'siswa', 'TRI  SETYO', 'Belum Aktif'),
('CM2019520', '', '', 'siswa', 'ashari  ashari', 'Belum Aktif'),
('CM2019521', '', '', 'siswa', 'archie ekaviansyah  andhana putra ', 'Belum Aktif'),
('CM2019522', '', '', 'siswa', 'Ahmad  Yaskur', 'Belum Aktif'),
('CM2019523', '', '', 'siswa', 'LAKSA  PRAWORO', 'Belum Aktif'),
('CM2019524', '', '', 'siswa', 'angga  ariesona', 'Belum Aktif'),
('CM2019525', '', '', 'siswa', 'mochammad  Hadan afidz ram', 'Belum Aktif'),
('CM2019526', '', '', 'siswa', 'Muh.  Aqshar Marsani', 'Belum Aktif'),
('CM2019527', '', '', 'siswa', 'hilman  maulana', 'Belum Aktif'),
('CM2019528', '', '', 'siswa', 'Hasyim  hasyim', 'Belum Aktif'),
('CM2019529', '', '', 'siswa', 'Rusma  wati', 'Belum Aktif'),
('CM2019530', '', '', 'siswa', 'Nurhadi   Setianto', 'Belum Aktif'),
('CM2019531', '', '', 'siswa', 'raihan   ahmad', 'Belum Aktif'),
('CM2019532', '', '', 'siswa', 'arengga nova  haris kuputra ', 'Belum Aktif'),
('CM2019533', '', '', 'siswa', 'Amirtha windoe  Bagoes nugraha ', 'Belum Aktif'),
('CM2019534', '', '', 'siswa', 'Merlyn  Lee', 'Belum Aktif'),
('CM2019535', '', '', 'siswa', 'Muh.  Imam Ghazali', 'Belum Aktif'),
('CM2019536', '', '', 'siswa', 'Reza   Mahendra', 'Belum Aktif'),
('CM2019537', '', '', 'siswa', 'Muhammad  Asrori', 'Belum Aktif'),
('CM2019538', '', '', 'siswa', 'Ratna  Dewi', 'Belum Aktif'),
('CM2019539', '', '', 'siswa', 'Muhammad  Arsyad', 'Belum Aktif'),
('CM2019540', '', '', 'siswa', 'Andreas  Ariyanto ', 'Belum Aktif'),
('CM2019541', '', '', 'siswa', 'Frankie  Tjandra', 'Belum Aktif'),
('CM2019542', '', '', 'siswa', 'ade   irpans', 'Belum Aktif'),
('CM2019543', '', '', 'siswa', 'Hendri Puji  Faris  Lismana  ', 'Belum Aktif'),
('CM2019544', '', '', 'siswa', 'Hengki  Candra', 'Belum Aktif'),
('CM2019545', '', '', 'siswa', 'Dhimas  Budiarso  ', 'Belum Aktif'),
('CM2019546', '', '', 'siswa', 'Leo  aswin', 'Belum Aktif'),
('CM2019547', '', '', 'siswa', 'andri  handoko', 'Belum Aktif'),
('CM2019548', '', '', 'siswa', 'afri  dwi christian', 'Belum Aktif'),
('CM2019549', '', '', 'siswa', 'Garaswara  Arif Prabowo', 'Belum Aktif'),
('CM2019550', '', '', 'siswa', 'Kris  Tanto', 'Belum Aktif'),
('CM2019551', '', '', 'siswa', 'ABDUL   GAFUR', 'Belum Aktif'),
('CM2019552', '', '', 'siswa', 'Filianie  Limanto', 'Belum Aktif'),
('CM2019553', '', '', 'siswa', 'Muhammad  Syaifuddin', 'Belum Aktif'),
('CM2019554', '', '', 'siswa', 'dodi  saputra', 'Belum Aktif'),
('CM2019555', '', '', 'siswa', 'Himas  EL Hakim', 'Belum Aktif'),
('CM2019556', '', '', 'siswa', 'ILHAM  SETIA  PAMBUDI', 'Belum Aktif'),
('CM2019557', '', '', 'siswa', 'Inayah  Zubaidi', 'Belum Aktif'),
('CM2019558', '', '', 'siswa', 'Chen  Sie Hoe', 'Belum Aktif'),
('CM2019559', '', '', 'siswa', 'Stefano  Huwae', 'Belum Aktif'),
('CM2019560', '', '', 'siswa', 'Maman  Rachman', 'Belum Aktif'),
('CM2019561', '', '', 'siswa', 'Cindy   Patricia', 'Belum Aktif'),
('CM2019562', '', '', 'siswa', 'Wahyudi  Irwansyah', 'Belum Aktif'),
('CM2019563', '', '', 'siswa', 'Yanu  Saktiaji', 'Belum Aktif'),
('CM2019564', '', '', 'siswa', 'LINDA  MARLINA BERUTU', 'Belum Aktif'),
('CM2019565', '', '', 'siswa', 'Andes  Gamafu', 'Belum Aktif'),
('CM2019566', '', '', 'siswa', 'ARI  PANDU', 'Belum Aktif'),
('CM2019567', '', '', 'siswa', 'Madryka   Yuningsih', 'Belum Aktif'),
('CM2019568', '', '', 'siswa', 'yanuar  risdiyanto', 'Belum Aktif'),
('CM2019569', '', '', 'siswa', 'Bagus Setyawan  Ananto ananto ', 'Belum Aktif'),
('CM2019570', '', '', 'siswa', 'Rian  Andriano', 'Belum Aktif'),
('CM2019571', '', '', 'siswa', 'Wan  Fitri', 'Belum Aktif'),
('CM2019572', '', '', 'siswa', 'muhammad  miftachuddin', 'Belum Aktif'),
('CM2019573', '', '', 'siswa', 'Hilmi  Yahya', 'Belum Aktif'),
('CM2019574', '', '', 'siswa', 'bayu  susilo', 'Belum Aktif'),
('CM2019575', '', '', 'siswa', 'Luandre  Ezra', 'Belum Aktif'),
('CM2019576', '', '', 'siswa', 'try  kamal', 'Belum Aktif'),
('CM2019577', '', '', 'siswa', 'Uji  Parhani', 'Belum Aktif'),
('CM2019578', '', '', 'siswa', 'Yudhis Thiro  Kabul Yunior', 'Belum Aktif'),
('CM2019579', '', '', 'siswa', 'Dewa  Putranto', 'Belum Aktif'),
('CM2019580', '', '', 'siswa', 'Fitri  Kushandayani', 'Belum Aktif'),
('CM2019581', '', '', 'siswa', 'Mochammad Dicky  Perdana Putra ', 'Belum Aktif'),
('CM2019582', '', '', 'siswa', 'Prahastuti  margi Cahyani', 'Belum Aktif'),
('CM2019583', '', '', 'siswa', 'Ichsani  M. Ilham', 'Belum Aktif'),
('CM2019584', '', '', 'siswa', 'nurul  faria', 'Belum Aktif'),
('CM2019585', '', '', 'siswa', 'dimas  aryosudarono', 'Belum Aktif'),
('CM2019586', '', '', 'siswa', 'Ghalih  Sugihantoro', 'Belum Aktif'),
('CM2019587', '', '', 'siswa', 'Myron  Widyanata', 'Belum Aktif'),
('CM2019588', '', '', 'siswa', 'William  Richard L I', 'Belum Aktif'),
('CM2019589', '', '', 'siswa', 'Thomas  Santoso', 'Belum Aktif'),
('CM2019590', '', '', 'siswa', 'kalvin   gea', 'Belum Aktif'),
('CM2019591', '', '', 'siswa', 'Achmad  Chumaidi', 'Belum Aktif'),
('CM2019592', '', '', 'siswa', 'Slamet  Ashari', 'Belum Aktif'),
('CM2019593', '', '', 'siswa', 'Andri  Susanto', 'Belum Aktif'),
('CM2019594', '', '', 'siswa', 'Lisania  ayu', 'Belum Aktif'),
('CM2019595', '', '', 'siswa', 'UBAIDILLAH  AFIF', 'Belum Aktif'),
('CM2019596', '', '', 'siswa', 'leni  diana', 'Belum Aktif'),
('CM2019597', '', '', 'siswa', 'Ali  Azyumardi Azra', 'Belum Aktif'),
('CM2019598', '', '', 'siswa', 'putri   kurniasih', 'Belum Aktif'),
('CM2019599', '', '', 'siswa', 'Asep  Rudin', 'Belum Aktif'),
('CM2019600', '', '', 'siswa', 'DIPATRIA  NUSWANTORO', 'Belum Aktif'),
('CM2019601', '', '', 'siswa', 'habi bullah  ', 'Belum Aktif'),
('CM2019602', '', '', 'siswa', 'Herru  Prastyo', 'Belum Aktif'),
('CM2019603', '', '', 'siswa', 'bagus  wichaksono', 'Belum Aktif'),
('CM2019604', '', '', 'siswa', 'Alvian  Rio', 'Belum Aktif'),
('CM2019605', '', '', 'siswa', 'rofiqoh permata sari ', 'Belum Aktif'),
('CM2019606', '', '', 'siswa', 'I Gusti  Bagus Suteja', 'Belum Aktif'),
('CM2019607', '', '', 'siswa', 'Ridho  Febri', 'Belum Aktif'),
('CM2019608', '', '', 'siswa', 'MOCHAMAD  ARDIANSYAH', 'Belum Aktif'),
('CM2019609', '', '', 'siswa', 'hepriyanto indra  Sumatra asnar ', 'Belum Aktif'),
('CM2019610', '', '', 'siswa', 'Rusman  Hartono', 'Belum Aktif'),
('CM2019611', '', '', 'siswa', 'riki steinli faot  ', 'Belum Aktif'),
('CM2019612', '', '', 'siswa', 'Khasanul   Ilmi', 'Belum Aktif'),
('CM2019613', '', '', 'siswa', 'Nadia  Nur', 'Belum Aktif'),
('CM2019614', '', '', 'siswa', ' riza  ali fikri ', 'Belum Aktif'),
('CM2019615', '', '', 'siswa', 'Jitro  Behuku', 'Belum Aktif'),
('CM2019616', '', '', 'siswa', 'jessica  selestina ', 'Belum Aktif'),
('CM2019617', '', '', 'siswa', 'budianto  budi', 'Belum Aktif'),
('CM2019618', '', '', 'siswa', 'Joko  Kartiko', 'Belum Aktif'),
('CM2019619', '', '', 'siswa', 'SIMON  RAMLAN TINAMBUNAN', 'Belum Aktif'),
('CM2019620', '', '', 'siswa', 'Arif  Setiawan', 'Belum Aktif'),
('CM2019621', '', '', 'siswa', 'Moch  Khoirul Anam', 'Belum Aktif'),
('CM2019622', '', '', 'siswa', 'Fradina  Sri Oktaviani', 'Belum Aktif'),
('CM2019623', '', '', 'siswa', 'MAYA  PRISTANTY', 'Belum Aktif'),
('CM2019624', '', '', 'siswa', 'Satria  Purwadana', 'Belum Aktif'),
('CM2019625', '', '', 'siswa', 'Handy  Satri', 'Belum Aktif'),
('CM2019626', '', '', 'siswa', 'PRASETYO HARI  PURWANTO ', 'Belum Aktif'),
('CM2019627', '', '', 'siswa', 'harta gunawan ricky tanuwijaya   ricky tanuwijaya ', 'Belum Aktif'),
('CM2019628', '', '', 'siswa', 'Unggul  Pambudi Putra', 'Belum Aktif'),
('CM2019629', '', '', 'siswa', 'Lueky  Apri Nelpandi', 'Belum Aktif'),
('CM2019630', '', '', 'siswa', 'Suraidah  Hasan', 'Belum Aktif'),
('CM2019631', '', '', 'siswa', 'daniel  christianto', 'Belum Aktif'),
('CM2019632', '', '', 'siswa', 'saka  arethusa', 'Belum Aktif'),
('CM2019633', '', '', 'siswa', 'yeremia  kok', 'Belum Aktif'),
('CM2019634', '', '', 'siswa', 'firdaus  ardiansyah', 'Belum Aktif'),
('CM2019635', '', '', 'siswa', 'Rudy  Darmawan', 'Belum Aktif'),
('CM2019636', '', '', 'siswa', 'Mutiara  Ningrum', 'Belum Aktif'),
('CM2019637', '', '', 'siswa', 'Ahmad  Syaifuddin', 'Belum Aktif'),
('CM2019638', '', '', 'siswa', 'Anna  Ningrum', 'Belum Aktif'),
('CM2019639', '', '', 'siswa', 'Adi  Djatmiko', 'Belum Aktif'),
('CM2019641', '', '', 'siswa', 'Izzano  Monzila', 'Belum Aktif'),
('CM2019642', '', '', 'siswa', 'Shokhibul Arifin', 'Belum Aktif'),
('CM2019643', '', '', 'siswa', 'Gusti Eka  Yuliastuti', 'Belum Aktif'),
('CM2019644', '', '', 'siswa', 'irawan  thijayadi', 'Belum Aktif'),
('CM2019645', '', '', 'siswa', 'gilang  permana', 'Belum Aktif'),
('CM2019646', '', '', 'siswa', 'Azka Adji  Mubarok', 'Belum Aktif'),
('CM2019647', '', '', 'siswa', 'Adeck  Madriana Kasih', 'Belum Aktif'),
('CM2019648', '', '', 'siswa', 'Irfan  Fachrudi Rachman', 'Belum Aktif'),
('CM2019649', '', '', 'siswa', 'Avira  Restyanti', 'Belum Aktif'),
('CM2019650', '', '', 'siswa', 'anton  sugiarto', 'Belum Aktif'),
('CM2019651', '', '', 'siswa', 'Hasna  Rizkika', 'Belum Aktif'),
('CM2019652', '', '', 'siswa', 'Nency  Prafitasari', 'Belum Aktif'),
('CM2019653', '', '', 'siswa', 'Ghea  Vanda', 'Belum Aktif'),
('CM2019654', '', '', 'siswa', 'Hendrik  Supriyadi', 'Belum Aktif'),
('CM2019655', '', '', 'siswa', 'winda   nurmadinah', 'Belum Aktif'),
('CM2019656', '', '', 'siswa', 'Wahid  Syarifudin', 'Belum Aktif'),
('CM2019657', '', '', 'siswa', 'ADE  PUTRA PRAWIRA', 'Belum Aktif'),
('CM2019658', '', '', 'siswa', 'akhmad  muzamil', 'Belum Aktif'),
('CM2019659', '', '', 'siswa', 'Moh.  Ridwan', 'Belum Aktif'),
('CM2019660', '', '', 'siswa', 'Agung  Iskandar', 'Belum Aktif'),
('CM2019661', '', '', 'siswa', 'Yan   Yan', 'Belum Aktif'),
('CM2019662', '', '', 'siswa', 'bionica  wangili', 'Belum Aktif'),
('CM2019663', '', '', 'siswa', 'Ivan  Tristan', 'Belum Aktif'),
('CM2019664', '', '', 'siswa', 'R. M. Ariel  Febriansyah Mochtar S ', 'Belum Aktif'),
('CM2019665', '', '', 'siswa', 'Alexander  Apriando', 'Belum Aktif'),
('CM2019666', '', '', 'siswa', 'Daniel  Sidharta', 'Belum Aktif'),
('CM2019667', '', '', 'siswa', 'Widya  Ningsih', 'Belum Aktif'),
('CM2019668', '', '', 'siswa', 'CHARINA EKA NATALIA  TAMARINDANG', 'Belum Aktif'),
('CM2019670', '', '', 'siswa', 'Wirman  Kwanmas', 'Belum Aktif'),
('CM2019671', '', '', 'siswa', 'fionni  sarranova', 'Belum Aktif'),
('CM2019672', '', '', 'siswa', 'bethany   febe', 'Belum Aktif'),
('CM2019673', '', '', 'siswa', 'Fahmi  Amiruddin', 'Belum Aktif'),
('CM2019674', '', '', 'siswa', 'Rajab  Amali', 'Belum Aktif'),
('CM2019675', '', '', 'siswa', 'andhi  nugroho', 'Belum Aktif'),
('CM2019676', '', '', 'siswa', 'samsul  hidayat', 'Belum Aktif'),
('CM2019677', '', '', 'siswa', 'Deby Kukuh  Setiawan', 'Belum Aktif'),
('CM2019678', '', '', 'siswa', 'vecky  sosio', 'Belum Aktif'),
('CM2019679', '', '', 'siswa', 'Mif  Tahul', 'Belum Aktif'),
('CM2019680', '', '', 'siswa', 'Aditya  Cakra  Wirapratama', 'Belum Aktif'),
('CM2019681', '', '', 'siswa', 'Dindin  Wahidin', 'Belum Aktif'),
('CM2019682', '', '', 'siswa', 'Maulana  Abdul Yazid', 'Belum Aktif'),
('CM2019683', '', '', 'siswa', 'Maey  Syarah. IK', 'Belum Aktif'),
('CM2019684', '', '', 'siswa', 'Rita  Sara', 'Belum Aktif'),
('CM2019685', '', '', 'siswa', 'rangga  triutomo', 'Belum Aktif'),
('CM2019686', '', '', 'siswa', 'mochammad hanif  junianto', 'Belum Aktif'),
('CM2019687', '', '', 'siswa', 'Gunawan   ', 'Belum Aktif'),
('CM2019688', '', '', 'siswa', 'Izzatul  Khonsa', 'Belum Aktif'),
('CM2019689', '', '', 'siswa', 'Indra  Permana Putra', 'Belum Aktif'),
('CM2019690', '', '', 'siswa', 'vince  missa', 'Belum Aktif'),
('CM2019691', '', '', 'siswa', 'Muhamad  Roghib', 'Belum Aktif'),
('CM2019692', '', '', 'siswa', 'irawan  ', 'Belum Aktif'),
('CM2019693', '', '', 'siswa', 'Ryan  Kent Tanadi', 'Belum Aktif'),
('CM2019694', '', '', 'siswa', 'BRYAN PATRICK  PURNOMO', 'Belum Aktif'),
('CM2019695', '', '', 'siswa', 'Windi  Yulianto', 'Belum Aktif'),
('CM2019696', '', '', 'siswa', 'Udin  Siswanto', 'Belum Aktif'),
('CM2019697', '', '', 'siswa', 'yohanes   christian', 'Belum Aktif'),
('CM2019698', '', '', 'siswa', 'Fajar  Muzakki', 'Belum Aktif'),
('CM2019699', '', '', 'siswa', 'Swita  Pijoh', 'Belum Aktif'),
('CM2019700', '', '', 'siswa', 'Yohanes  Steven Wijaya', 'Belum Aktif'),
('CM2019701', '', '', 'siswa', 'Ferry Susilo', 'Belum Aktif'),
('CM2019703', '', '', 'siswa', 'Ardian  Rizky', 'Belum Aktif'),
('CM2019704', '', '', 'siswa', 'James  Simbolon', 'Belum Aktif'),
('CM2019705', '', '', 'siswa', 'ahmad  khudloifin', 'Belum Aktif'),
('CM2019706', '', '', 'siswa', 'CHARINA EKA  NATALIA TAMARINDANG', 'Belum Aktif'),
('CM2019707', '', '', 'siswa', 'Saskia  Ayudhia', 'Belum Aktif'),
('CM2019708', '', '', 'siswa', 'Toni  Romanzah', 'Belum Aktif'),
('CM2019709', '', '', 'siswa', 'Naufal  Afifi', 'Belum Aktif'),
('CM2019710', '', '', 'siswa', 'Adhitya  Candra', 'Belum Aktif'),
('CM2019711', '', '', 'siswa', 'Faris  Alkomi', 'Belum Aktif'),
('CM2019712', '', '', 'siswa', 'Fahmi  Amiruddin', 'Belum Aktif'),
('CM2019713', '', '', 'siswa', 'Dewinda  Julianensi Rumala', 'Belum Aktif'),
('CM2019714', '', '', 'siswa', 'yenni  marpaung', 'Belum Aktif'),
('CM2019715', '', '', 'siswa', 'Titien  Handayani Story', 'Belum Aktif'),
('CM2019716', '', '', 'siswa', 'Syahrul Ahdi  Oktavian', 'Belum Aktif'),
('CM2019717', '', '', 'siswa', 'daniel  christianto', 'Belum Aktif'),
('CM2019718', '', '', 'siswa', 'ahmad  fauji', 'Belum Aktif'),
('CM2019719', '', '', 'siswa', 'Yohanes  Romyldo Bundur', 'Belum Aktif'),
('CM2019720', '', '', 'siswa', 'Catharina  Nesti', 'Belum Aktif'),
('CM2019721', '', '', 'siswa', 'Fransiskus  Arnoldy', 'Belum Aktif'),
('CM2019722', '', '', 'siswa', 'Moses  Boikaway', 'Belum Aktif'),
('CM2019723', '', '', 'siswa', 'EDDY  PURWOKO GOO', 'Belum Aktif'),
('CM2019724', '', '', 'siswa', 'wahyu  himawan', 'Belum Aktif'),
('CM2019725', '', '', 'siswa', 'Suando  Malau', 'Belum Aktif'),
('CM2019726', '', '', 'siswa', 'yusuf parri  akbar', 'Belum Aktif'),
('CM2019727', '', '', 'siswa', 'ANGELIA  LIMANTONO', 'Belum Aktif'),
('CM2019728', '', '', 'siswa', 'Syahrul Ahdi Ahdi', 'Belum Aktif'),
('CM2019729', '', '', 'siswa', 'Rheza  Dwinata', 'Belum Aktif'),
('CM2019730', '', '', 'siswa', 'Adi  Suwarto', 'Belum Aktif'),
('CM2019731', '', '', 'siswa', 'Fuad Nichi  Kellyvoni', 'Belum Aktif'),
('CM2019732', '', '', 'siswa', 'Maya  Silvina', 'Belum Aktif'),
('CM2019733', '', '', 'siswa', 'HERMIN TITI  PALUPI', 'Belum Aktif'),
('CM2019734', '', '', 'siswa', 'Angelo  Estiller', 'Belum Aktif'),
('CM2019735', '', '', 'siswa', 'pontjo  suharwono', 'Belum Aktif'),
('CM2019736', '', '', 'siswa', 'fanny  sutanto', 'Belum Aktif'),
('CM2019737', '', '', 'siswa', 'Mirza  Rachman', 'Belum Aktif'),
('CM2019738', '', '', 'siswa', 'Andika Tri  Raharja', 'Belum Aktif'),
('CM2019739', '', '', 'siswa', 'Andreas  Tirtohartono', 'Belum Aktif'),
('CM2019740', '', '', 'siswa', 'Vicky  Altovan', 'Belum Aktif'),
('CM2019741', '', '', 'siswa', 'Uhti  Mulyadini', 'Belum Aktif'),
('CM2019742', '', '', 'siswa', 'Ahmad  Fauzi', 'Belum Aktif'),
('CM2019743', '', '', 'siswa', 'alvin  syahrial', 'Belum Aktif'),
('CM2019744', '', '', 'siswa', 'Mohammad  Kodir', 'Belum Aktif'),
('CM2019745', '', '', 'siswa', 'Imron  Rosyadi', 'Belum Aktif'),
('CM2019746', '', '', 'siswa', 'Likhu  Hapsari', 'Belum Aktif'),
('CM2019747', '', '', 'siswa', 'Vincentius Ronalto  Dwito Kumoro ', 'Belum Aktif'),
('CM2019748', '', '', 'siswa', 'yusuf  fadilah', 'Belum Aktif'),
('CM2019749', '', '', 'siswa', 'catherine  rahardjo', 'Belum Aktif'),
('CM2019750', '', '', 'siswa', 'DJOKO  ISMANTO', 'Belum Aktif'),
('CM2019751', '', '', 'siswa', 'catherine  rahardjo', 'Belum Aktif'),
('CM2019752', '', '', 'siswa', 'Dwi  Mutrohfini', 'Belum Aktif'),
('CM2019753', '', '', 'siswa', 'Ririh  Wijayanti', 'Belum Aktif'),
('CM2019754', '', '', 'siswa', 'Tilik  Siswantara', 'Belum Aktif'),
('CM2019755', '', '', 'siswa', 'nazwa  denisa', 'Belum Aktif'),
('CM2019756', '', '', 'siswa', 'Novitta  Christiana', 'Belum Aktif'),
('CM2019757', '', '', 'siswa', 'CHRIS  GANANG WIDIOSA', 'Belum Aktif'),
('CM2019758', '', '', 'siswa', 'Jason  Ciputra', 'Belum Aktif'),
('CM2019759', '', '', 'siswa', 'Abdul Aziz  Al Hakim', 'Belum Aktif'),
('CM2019760', '', '', 'siswa', 'Fransiskus  Zaverius Sutjiharto', 'Belum Aktif'),
('CM2019761', '', '', 'siswa', 'ANNA  JULIANA', 'Belum Aktif'),
('CM2019762', '', '', 'siswa', 'Hengky  Gunawan', 'Belum Aktif'),
('CM2019763', '', '', 'siswa', 'Muhammad  Rivai Aziz', 'Belum Aktif'),
('CM2019764', '', '', 'siswa', 'Dian  Nilam Sari', 'Belum Aktif'),
('CM2019765', '', '', 'siswa', 'Nelsen  Adrian', 'Belum Aktif'),
('CM2019766', '', '', 'siswa', 'Ahmad  Husnan', 'Belum Aktif'),
('CM2019767', '', '', 'siswa', 'Ahmad  Hanif', 'Belum Aktif'),
('CM2019768', '', '', 'siswa', 'Rheza Paleva  Uyanto', 'Belum Aktif'),
('CM2019769', '', '', 'siswa', 'Rizqy  Wildan', 'Belum Aktif'),
('CM2019770', '', '', 'siswa', 'budi  jayantara', 'Belum Aktif'),
('CM2019771', '', '', 'siswa', 'indra  wicaksana', 'Belum Aktif'),
('CM2019772', '', '', 'siswa', 'habi  bullah', 'Belum Aktif'),
('CM2019773', '', '', 'siswa', 'Purwadi  Sutarto', 'Belum Aktif'),
('CM2019774', '', '', 'siswa', 'amar ihsan', 'Belum Aktif'),
('CM2019775', '', '', 'siswa', 'pradika wahyu  dwi putra', 'Belum Aktif'),
('CM2019776', '', '', 'siswa', 'Daniel  Christianto', 'Belum Aktif'),
('CM2019777', '', '', 'siswa', 'fitriyah  fatmawati', 'Belum Aktif'),
('CM2019778', '', '', 'siswa', 'Reynhard  Yuvensi Setiawan', 'Belum Aktif'),
('CM2019779', '', '', 'siswa', 'maulidia  sani', 'Belum Aktif'),
('CM2019780', '', '', 'siswa', 'SAMSUL  ARIFIN', 'Belum Aktif'),
('CM2019781', '', '', 'siswa', 'Mamik Dwi  Hartanto', 'Belum Aktif'),
('CM2019782', '', '', 'siswa', 'Edi  Kawab', 'Belum Aktif'),
('CM2019783', '', '', 'siswa', 'ade  christian', 'Belum Aktif'),
('CM2019784', '', '', 'siswa', 'dodik  sugianto', 'Belum Aktif'),
('CM2019785', '', '', 'siswa', 'Wahyu Anggi  Suhartono', 'Belum Aktif'),
('CM2019786', '', '', 'siswa', 'Ragil  Winarsyah', 'Belum Aktif'),
('CM2019787', '', '', 'siswa', 'Muhammad  Zaenal fanani', 'Belum Aktif'),
('CM2019788', '', '', 'siswa', 'Astari  Isnan', 'Belum Aktif'),
('CM2019789', '', '', 'siswa', 'muliana putri  imanda', 'Belum Aktif'),
('CM2019790', '', '', 'siswa', 'Norman Arief  Setiawan', 'Belum Aktif'),
('CM2019791', '', '', 'siswa', 'Feri  Kurniawan', 'Belum Aktif'),
('CM2019792', '', '', 'siswa', 'agus  santoso', 'Belum Aktif'),
('CM2019793', '', '', 'siswa', 'Daniel  Christianto', 'Belum Aktif'),
('CM2019794', '', '', 'siswa', 'Saka  Arethusa', 'Belum Aktif'),
('CM2019795', '', '', 'siswa', 'saiful   hadi', 'Belum Aktif'),
('CM2019796', '', '', 'siswa', 'Crom  Tiyan', 'Belum Aktif'),
('CM2019797', '', '', 'siswa', 'Mustajab  Arif', 'Belum Aktif'),
('CM2019798', '', '', 'siswa', 'bambang  nurcahyono', 'Belum Aktif'),
('CM2019799', '', '', 'siswa', 'Hermanto  SE', 'Belum Aktif'),
('CM2019800', '', '', 'siswa', 'iqbal izaz  perdana', 'Belum Aktif'),
('CM2019801', '', '', 'siswa', 'Andreas Dwi  Susilo', 'Belum Aktif'),
('CM2019802', '', '', 'siswa', 'Mochammad  Rusdi', 'Belum Aktif'),
('CM2019803', '', '', 'siswa', 'Nindi  Aditya', 'Belum Aktif'),
('CM2019804', '', '', 'siswa', 'Muhammad Alif  Alrasyid', 'Belum Aktif'),
('CM2019805', '', '', 'siswa', 'Bagus  Amin Saputra', 'Belum Aktif'),
('CM2019806', '', '', 'siswa', 'Triyo  Bawono', 'Belum Aktif'),
('CM2019807', '', '', 'siswa', 'Winardy  Hertanto', 'Belum Aktif'),
('CM2019808', '', '', 'siswa', 'adis  nugraha', 'Belum Aktif'),
('CM2019809', '', '', 'siswa', 'Prasetyati  Riski', 'Belum Aktif'),
('CM2019810', '', '', 'siswa', 'WIKA  AKBAR', 'Belum Aktif'),
('CM2019811', '', '', 'siswa', 'Ikki  Kurogane', 'Belum Aktif'),
('CM2019812', '', '', 'siswa', 'karyadi  adie', 'Belum Aktif'),
('CM2019813', '', '', 'siswa', 'nindi aditya', 'Belum Aktif'),
('CM2019814', '', '', 'siswa', 'Nindy  Seftiavani', 'Belum Aktif'),
('CM2019815', '', '', 'siswa', 'Lusiana  Stefanus', 'Belum Aktif'),
('CM2019816', '', '', 'siswa', 'arten  selvian', 'Belum Aktif'),
('CM2019817', '', '', 'siswa', 'Solehoddin  ', 'Belum Aktif'),
('CM2019818', '', '', 'siswa', 'Adam  Wicakasana', 'Belum Aktif'),
('CM2019819', '', '', 'siswa', 'Sheylla  Nerissa', 'Belum Aktif'),
('CM2019820', '', '', 'siswa', 'moch  ridwan', 'Belum Aktif'),
('CM2019821', '', '', 'siswa', 'Redita  Prasetyo', 'Belum Aktif'),
('CM2019822', '', '', 'siswa', 'Rizky  dwi putra', 'Belum Aktif'),
('CM2019823', '', '', 'siswa', 'Ikhsan  Wahyudi', 'Belum Aktif'),
('CM2019824', '', '', 'siswa', 'Muhammad DIego  Aprillio Kusnandy', 'Belum Aktif'),
('CM2019825', '', '', 'siswa', 'Yoppy  Handoko', 'Belum Aktif'),
('CM2019826', '', '', 'siswa', 'Maria  Intan sania', 'Belum Aktif'),
('CM2019827', '', '', 'siswa', 'dipa  ferdian', 'Belum Aktif'),
('CM2019828', '', '', 'siswa', 'Firly  Mas\'ulatul Janah', 'Belum Aktif'),
('CM2019829', '', '', 'siswa', 'Wildan  Rizki Mubarok', 'Belum Aktif'),
('CM2019830', '', '', 'siswa', 'Kusnadi  Jarek', 'Belum Aktif'),
('CM2019831', '', '', 'siswa', 'edo  sulistyo', 'Belum Aktif'),
('CM2019832', '', '', 'siswa', 'Ahmad Tasdiq  Arafah Siregar', 'Belum Aktif'),
('CM2019833', '', '', 'siswa', 'Richard  Sudibyo', 'Belum Aktif'),
('CM2019834', '', '', 'siswa', 'Daniel  Christianto', 'Belum Aktif'),
('CM2019835', '', '', 'siswa', 'bergas  eldi', 'Belum Aktif'),
('CM2019836', '', '', 'siswa', 'sumariyono  ', 'Belum Aktif'),
('CM2019837', '', '', 'siswa', 'Dhea  Hasrianah', 'Belum Aktif'),
('CM2019838', '', '', 'siswa', 'Moch Maulidin  Rizqi Arif', 'Belum Aktif'),
('CM2019839', '', '', 'siswa', 'Syafii  Zp', 'Belum Aktif'),
('CM2019840', '', '', 'siswa', 'RIZKY KENDRA  ANJANI', 'Belum Aktif'),
('CM2019841', '', '', 'siswa', 'Kiki  Hermawan', 'Belum Aktif'),
('CM2019842', '', '', 'siswa', 'Rahmat  Aminuddin', 'Belum Aktif'),
('CM2019843', '', '', 'siswa', 'Mochamad  Sabarudin', 'Belum Aktif'),
('CM2019844', '', '', 'siswa', 'Muhammad  Suef', 'Belum Aktif'),
('CM2019845', '', '', 'siswa', 'Hamzah  Firdaus', 'Belum Aktif'),
('CM2019846', '', '', 'siswa', 'Ainul  Rufi', 'Belum Aktif'),
('CM2019847', '', '', 'siswa', 'Irfan Fauzi  Nugraha', 'Belum Aktif'),
('CM2019848', '', '', 'siswa', 'Arni  Muarifah Amri', 'Belum Aktif'),
('CM2019849', '', '', 'siswa', 'setyo  tyo', 'Belum Aktif'),
('CM2019850', '', '', 'siswa', 'Imamm  Kusairi', 'Belum Aktif'),
('CM2019851', '', '', 'siswa', 'Hadit Fikri  Falah', 'Belum Aktif'),
('CM2019852', '', '', 'siswa', 'Rochmatul  Khikmiyah', 'Belum Aktif'),
('CM2019853', '', '', 'siswa', 'thareq  bramasta', 'Belum Aktif'),
('CM2019854', '', '', 'siswa', 'Elliot  Donohadi', 'Belum Aktif'),
('CM2019855', '', '', 'siswa', 'Novia  Indah', 'Belum Aktif'),
('CM2019856', '', '', 'siswa', 'lisa  rosalina', 'Belum Aktif'),
('CM2019857', '', '', 'siswa', 'Endrostil  Aditya', 'Belum Aktif'),
('CM2019859', '', '', 'siswa', 'koral  komunity', 'Belum Aktif'),
('CM2019860', '', '', 'siswa', 'Rista  Nadia Jasmine', 'Belum Aktif'),
('CM2019861', '', '', 'siswa', 'Asep  ', 'Belum Aktif'),
('CM2019862', '', '', 'siswa', 'Florentina  Wawolangi', 'Belum Aktif'),
('CM2019863', '', '', 'siswa', 'Kurniawan  Sidarta', 'Belum Aktif'),
('CM2019864', '', '', 'siswa', 'Zaim  fahry', 'Belum Aktif'),
('CM2019865', '', '', 'siswa', 'Yonatan  Wicaksono', 'Belum Aktif'),
('CM2019866', '', '', 'siswa', 'Yohanes  didik setiawan', 'Belum Aktif'),
('CM2019867', '', '', 'siswa', 'EKO  EFFENDI', 'Belum Aktif'),
('CM2019868', '', '', 'siswa', 'su mantri  ', 'Belum Aktif'),
('CM2019869', '', '', 'siswa', 'Moch Imron  Syahroni', 'Belum Aktif'),
('CM2019870', '', '', 'siswa', 'Anastasia  Rosalind', 'Belum Aktif'),
('CM2019871', '', '', 'siswa', 'Asvarita  Yasmena Andalusia', 'Belum Aktif'),
('CM2019872', '', '', 'siswa', 'Riesthandie  ', 'Belum Aktif'),
('CM2019873', '', '', 'siswa', 'Septi  Andriani', 'Belum Aktif'),
('CM2019874', '', '', 'siswa', 'faiz  abrori', 'Belum Aktif'),
('CM2019875', '', '', 'siswa', 'Shella  Ryo', 'Belum Aktif'),
('CM2019876', '', '', 'siswa', 'rusliansyah  rully', 'Belum Aktif'),
('CM2019877', '', '', 'siswa', 'Okie  Sandra Firmansyah', 'Belum Aktif'),
('CM2019878', '', '', 'siswa', 'anastasia  rosalind', 'Belum Aktif'),
('CM2019879', '', '', 'siswa', 'Sugeng  Purnomo', 'Belum Aktif'),
('CM2019880', '', '', 'siswa', 'Indera  Kurniawan Akhbar', 'Belum Aktif'),
('CM2019881', '', '', 'siswa', 'Mochammad  hidayat', 'Belum Aktif'),
('CM2019882', '', '', 'siswa', 'Shofyan  arif', 'Belum Aktif'),
('CM2019883', '', '', 'siswa', 'Yosua  Massaro', 'Belum Aktif'),
('CM2019884', '', '', 'siswa', 'lita  Ariyanti', 'Belum Aktif'),
('CM2019885', '', '', 'siswa', 'Vandi  Jose', 'Belum Aktif'),
('CM2019886', '', '', 'siswa', 'Abyzan Razza  Adel Haq', 'Belum Aktif'),
('CM2019887', '', '', 'siswa', 'lilik  suryaningsih', 'Belum Aktif'),
('CM2019888', '', '', 'siswa', 'Kun Tegar  Jaya Ibrahim', 'Belum Aktif'),
('CM2019889', '', '', 'siswa', 'Ferdian Agung  Kurniawan', 'Belum Aktif'),
('CM2019890', '', '', 'siswa', 'christine  susilo', 'Belum Aktif'),
('CM2019891', '', '', 'siswa', 'prastawa adi  wirjotenojo', 'Belum Aktif'),
('CM2019892', '', '', 'siswa', 'Crom  Tiyan', 'Belum Aktif'),
('CM2019893', '', '', 'siswa', 'Fengky  Setiono Szito', 'Belum Aktif'),
('CM2019894', '', '', 'siswa', 'Sumintar  Hadisiswoyo', 'Belum Aktif'),
('CM2019895', '', '', 'siswa', 'Deny  Setiawan', 'Belum Aktif'),
('CM2019896', '', '', 'siswa', 'MOCHAMAD  FAISAL', 'Belum Aktif'),
('CM2019897', '', '', 'siswa', 'nanang  firdaus', 'Belum Aktif'),
('CM2019898', '', '', 'siswa', 'Rafi Indra  Permana', 'Belum Aktif'),
('CM2019899', '', '', 'siswa', 'Rayi  Ardhiani', 'Belum Aktif'),
('CM2019900', '', '', 'siswa', 'Olivia  Chu', 'Belum Aktif'),
('CM2019901', '', '', 'siswa', 'Yunus  Muhammad', 'Belum Aktif'),
('CM2019902', '', '', 'siswa', 'arini dwi  ramadhani', 'Belum Aktif'),
('CM2019903', '', '', 'siswa', 'm fatkhul  hadi', 'Belum Aktif'),
('CM2019904', '', '', 'siswa', 'fantasy  yahya', 'Belum Aktif'),
('CM2019905', '', '', 'siswa', 'suba  ikah', 'Belum Aktif'),
('CM2019906', '', '', 'siswa', 'Kemala  Paramitha', 'Belum Aktif'),
('CM2019907', '', '', 'siswa', 'nur  alfin', 'Belum Aktif'),
('CM2019908', '', '', 'siswa', 'Erika Dewi  Kartika', 'Belum Aktif'),
('CM2019909', '', '', 'siswa', 'Gegen  Prasetyo', 'Belum Aktif'),
('CM2019910', '', '', 'siswa', 'MAKS  LAISOKA', 'Belum Aktif'),
('CM2019911', '', '', 'siswa', 'LUPITA  THANAYA PUTRI', 'Belum Aktif'),
('CM2019912', '', '', 'siswa', 'syahril  ramdhani', 'Belum Aktif'),
('CM2019913', '', '', 'siswa', 'Emma  Rahmawati', 'Belum Aktif'),
('CM2019914', '', '', 'siswa', 'Juhenwils  Talumantak', 'Belum Aktif'),
('CM2019915', '', '', 'siswa', 'Muhammad  Yasir', 'Belum Aktif'),
('CM2019916', '', '', 'siswa', 'Precillia  aberta Putri', 'Belum Aktif'),
('CM2019917', '', '', 'siswa', 'try  kamal', 'Belum Aktif'),
('CM2019918', '', '', 'siswa', 'emir  ridho', 'Belum Aktif'),
('CM2019919', '', '', 'siswa', 'Ellen  Kusumadjaja', 'Belum Aktif'),
('CM2019920', '', '', 'siswa', 'Atika  Hermanda', 'Belum Aktif'),
('CM2019921', '', '', 'siswa', 'Ika  Oktaviana', 'Belum Aktif'),
('CM2019922', '', '', 'siswa', 'Setiawan  ', 'Belum Aktif'),
('CM2019923', '', '', 'siswa', 'Grace  Rompies', 'Belum Aktif'),
('CM2019924', '', '', 'siswa', 'Ali  Tofan', 'Belum Aktif'),
('CM2019925', '', '', 'siswa', 'Kokoh  Aji Supanggih', 'Belum Aktif'),
('CM2019926', '', '', 'siswa', 'Ryan Eranio  Irwan', 'Belum Aktif'),
('CM2019927', '', '', 'siswa', 'HENDRIANSAH PRASTYA  NUGROHO', 'Belum Aktif'),
('CM2019928', '', '', 'siswa', 'Nabil  Naufal', 'Belum Aktif'),
('CM2019929', '', '', 'siswa', 'Valentino  Sholly', 'Belum Aktif'),
('CM2019930', '', '', 'siswa', 'Faisal  Habibi', 'Belum Aktif'),
('CM2019931', '', '', 'siswa', 'Davit  ', 'Belum Aktif'),
('CM2019932', '', '', 'siswa', 'Thomas  Brian', 'Belum Aktif'),
('CM2019933', '', '', 'siswa', 'Anggun  Ajeng', 'Belum Aktif'),
('CM2019934', '', '', 'siswa', 'Heru  Triono', 'Belum Aktif'),
('CM2019935', '', '', 'siswa', 'Satria  Oktano', 'Belum Aktif'),
('CM2019936', '', '', 'siswa', 'arya dwi  utomo budi', 'Belum Aktif'),
('CM2019937', '', '', 'siswa', 'Suryadi  Arif', 'Belum Aktif'),
('CM2019938', '', '', 'siswa', 'Adis  Lavrianto', 'Belum Aktif'),
('CM2019939', '', '', 'siswa', 'Putut Joko  prasetiyo', 'Belum Aktif'),
('CM2019940', '', '', 'siswa', 'Biem  Prima', 'Belum Aktif'),
('CM2019941', '', '', 'siswa', 'AJI  SAFRAJI', 'Belum Aktif'),
('CM2019942', '', '', 'siswa', 'Rifqi Wahyu  aryanto', 'Belum Aktif'),
('CM2019943', '', '', 'siswa', 'tumpal  sirait', 'Belum Aktif'),
('CM2019944', '', '', 'siswa', 'Ahmad  Fahmi', 'Belum Aktif'),
('CM2019945', '', '', 'siswa', 'Uka  Brittantyo', 'Belum Aktif'),
('CM2019946', '', '', 'siswa', 'Ahmad Fikri  Iskandar', 'Belum Aktif'),
('CM2019947', '', '', 'siswa', 'Akmal  Fuadi', 'Belum Aktif'),
('CM2019948', '', '', 'siswa', 'sasongko  prayogi', 'Belum Aktif'),
('CM2019949', '', '', 'siswa', 'Adiyaksa  Prasidapati', 'Belum Aktif'),
('CM2019950', '', '', 'siswa', 'Abd  Hannan', 'Belum Aktif'),
('CM2019951', '', '', 'siswa', 'Kurnia  Muliasari', 'Belum Aktif'),
('CM2019952', '', '', 'siswa', 'Andriy Anur', 'Belum Aktif'),
('CM2019953', '', '', 'siswa', 'Puput  Tri', 'Belum Aktif'),
('CM2019954', '', '', 'siswa', 'Muntaha Namkatu', 'Belum Aktif'),
('CM2019955', '', '', 'siswa', 'muhammad  naashiruddiin', 'Belum Aktif'),
('CM2019956', '', '', 'siswa', 'Andi  Bastian', 'Belum Aktif'),
('CM2019957', '', '', 'siswa', 'Idris  Efendi', 'Belum Aktif'),
('CM2019958', '', '', 'siswa', 'Wisnu Saputra', 'Belum Aktif'),
('CM2019959', '', '', 'siswa', 'POENDIK  SOEGIYANTO', 'Belum Aktif'),
('CM2019960', '', '', 'siswa', 'Rio Satriawan', 'Belum Aktif'),
('CM2019961', '', '', 'siswa', 'sholi zhaynol abbidin  zhaynol abbidin', 'Belum Aktif'),
('CM2019962', '', '', 'siswa', 'Siti  Yulianah', 'Belum Aktif'),
('CM2019963', '', '', 'siswa', 'Tiara Putri', 'Belum Aktif'),
('CM2019964', '', '', 'siswa', 'Arin Maya  Rosita', 'Belum Aktif'),
('CM2019965', '', '', 'siswa', 'Fakhruddin Thalib', 'Belum Aktif'),
('CM2019966', '', '', 'siswa', 'Yoga Prasetya', 'Belum Aktif'),
('CM2019968', '', '', 'siswa', 'Achmad Cholid', 'Belum Aktif'),
('CM2019969', '', '', 'siswa', 'Sean Andrew Valentino D', 'Belum Aktif'),
('CM2019970', '', '', 'siswa', 'Ongky Onggo', 'Belum Aktif'),
('CM2019971', '', '', 'siswa', 'Rakhmat Agung', 'Belum Aktif'),
('CM2019973', '', '', 'siswa', 'Nabilah Wibawa', 'Belum Aktif'),
('CM2019974', '', '', 'siswa', 'jessy  wiliana', 'Belum Aktif'),
('CM2019976', '', '', 'siswa', 'Richard Wesutan', 'Belum Aktif'),
('CM2019977', '', '', 'siswa', 'uci  siska', 'Belum Aktif'),
('CM2019978', '', '', 'siswa', 'Luh Gayatri', 'Belum Aktif'),
('CM2019979', '', '', 'siswa', 'Dwi Septian', 'Belum Aktif'),
('CM2019980', '', '', 'siswa', 'Sholehuddin  ', 'Belum Aktif'),
('CM2019981', '', '', 'siswa', 'Jauw Yauwerissa', 'Belum Aktif'),
('CM2019982', '', '', 'siswa', 'Haris  Faisal', 'Belum Aktif'),
('CM2019983', '', '', 'siswa', 'Dewi Sari', 'Belum Aktif'),
('CM2019984', '', '', 'siswa', 'Mirsalana Akram', 'Belum Aktif'),
('CM2019985', '', '', 'siswa', 'Hendar  saputra', 'Belum Aktif'),
('CM2019986', '', '', 'siswa', 'Almira puspa', 'Belum Aktif'),
('CM2019987', '', '', 'siswa', 'Hari Prasetyo', 'Belum Aktif'),
('CM2019988', '', '', 'siswa', 'adip  prasetyo', 'Belum Aktif'),
('CM2019990', '', '', 'siswa', 'Velita  Susanto', 'Belum Aktif'),
('CM2019991', '', '', 'siswa', 'Muhammad Rizqi', 'Belum Aktif'),
('CM2019993', '', '', 'siswa', 'husni  ', 'Belum Aktif'),
('CM2019994', '', '', 'siswa', 'Trio Agam  Setiawan', 'Belum Aktif'),
('CM2019995', '', '', 'siswa', 'Verawati Santoso', 'Belum Aktif'),
('CM2019996', '', '', 'siswa', 'Muhammad Mohi', 'Belum Aktif'),
('CM2019998', '', '', 'siswa', 'Haris Riyanto', 'Belum Aktif'),
('CM20210492817', '', '', 'siswa', 'Thomas  Akuarin Tanjung', 'Belum Aktif'),
('CM20210492818', '', '', 'siswa', 'Thomas  Akuarin Tanjung', 'Belum Aktif'),
('CM20210492819', '', '', 'siswa', 'Happy Christofel Mamesah', 'Belum Aktif'),
('CM20210492820', '', '', 'siswa', 'Happy Christofel Mamesah', 'Belum Aktif'),
('CM20210492821', '', '', 'siswa', 'Regi Handono', 'Belum Aktif'),
('CM20210492822', '', '', 'siswa', 'Novan Indra Prasetya', 'Belum Aktif'),
('CM20210492823', '', '', 'siswa', 'Wahyu Wijayanto', 'Belum Aktif'),
('CM20210492824', '', '', 'siswa', 'Wahyu Wijayanto', 'Belum Aktif'),
('CM20210492825', '', '', 'siswa', 'Erna wati', 'Belum Aktif'),
('CM20210492826', '', '', 'siswa', 'Erna wati', 'Belum Aktif'),
('CM20210492827', '', '', 'siswa', 'Hafidz Firli Firlana', 'Belum Aktif'),
('CM20210492828', '', '', 'siswa', 'Ramsi Mulya Wicaksana', 'Belum Aktif'),
('CM20210492829', '', '', 'siswa', 'Dewi Ayuningsih Santoso', 'Belum Aktif'),
('CM20210492830', '', '', 'siswa', 'Agitha Mahardika', 'Belum Aktif'),
('CM20210492831', '', '', 'siswa', 'Yusron Nugroho Aji', 'Belum Aktif'),
('CM20210492832', '', '', 'siswa', 'Rifqi Ramadhan', 'Belum Aktif'),
('CM20210492833', '', '', 'siswa', 'Hengky Jayadi', 'Belum Aktif'),
('CM20210492834', '', '', 'siswa', 'Hengky Jayadi', 'Belum Aktif'),
('CM20210492835', '', '', 'siswa', 'Raditya Windoro Katon', 'Belum Aktif'),
('CM20210492836', '', '', 'siswa', 'Axcel Tiorido Pasaribu', 'Belum Aktif'),
('CM20210492837', '', '', 'siswa', 'Lintang Kenzie Azaria', 'Belum Aktif'),
('CM20210492838', '', '', 'siswa', 'Amindya Haziratul Putri', 'Belum Aktif'),
('CM20210492839', '', '', 'siswa', 'Gilbert Laurentius', 'Belum Aktif'),
('CM20210492840', '', '', 'siswa', 'Anmelia Hartono', 'Belum Aktif'),
('CM20210492841', '', '', 'siswa', 'Iryansius Efi', 'Belum Aktif'),
('CM20210492842', '', '', 'siswa', 'Radityo Muhammad Aufar', 'Belum Aktif'),
('CM20210492843', '', '', 'siswa', 'Axcel Tiorido Pasaribu', 'Belum Aktif'),
('CM20210492844', '', '', 'siswa', 'Gina Fachniar', 'Belum Aktif'),
('CM20210492845', '', '', 'siswa', 'M. Zacky Syabani', 'Belum Aktif'),
('CM20210492846', '', '', 'siswa', 'Almira Zerlina Sri Hartanti', 'Belum Aktif'),
('CM20210492847', '', '', 'siswa', 'Ramsi Mulya Wicaksana', 'Belum Aktif'),
('CM20210492848', '', '', 'siswa', 'Moch. Novandre Rega Herwanto', 'Belum Aktif'),
('CM20210492849', '', '', 'siswa', 'Kenneith Chan', 'Belum Aktif'),
('CM20210492850', '', '', 'siswa', 'Amindya Haziratul Putri', 'Belum Aktif'),
('CM20210492851', '', '', 'siswa', 'Novan  Indra Prasetya', 'Belum Aktif'),
('CM20210492852', '', '', 'siswa', 'Almira Zerlina Sri Hartanti', 'Belum Aktif'),
('CM20210492853', '', '', 'siswa', 'Axcel Tiorido Pasaribu', 'Belum Aktif'),
('CM20210492854', '', '', 'siswa', 'Shafira Ainur Habibah', 'Belum Aktif'),
('CM20210492855', '', '', 'siswa', 'Shafira Ainur Habibah', 'Belum Aktif'),
('CM20210492856', '', '', 'siswa', 'Shelvy Setia Innda', 'Belum Aktif'),
('CM20210492857', '', '', 'siswa', 'Novan Indra Prasetya', 'Belum Aktif'),
('CM20210492858', '', '', 'siswa', 'Hilaria Nimat', 'Belum Aktif'),
('CM20210492859', '', '', 'siswa', 'Siti Saodah', 'Belum Aktif'),
('CM20210492860', '', '', 'siswa', 'Siti Saodah', 'Belum Aktif'),
('CM20210492861', '', '', 'siswa', 'Adith Galih Dharmasandy', 'Belum Aktif'),
('CM20210492862', '', '', 'siswa', 'Kelvin Kurniawan', 'Belum Aktif'),
('CM20210492863', '', '', 'siswa', 'Firmanda Haditya Firdaus', 'Belum Aktif'),
('CM20210492864', '', '', 'siswa', 'Dhanestinurul Widaningrum', 'Belum Aktif'),
('CM20210492865', '', '', 'siswa', 'Sati riani', 'Belum Aktif'),
('CM20210492866', '', '', 'siswa', 'Radityo Muhammad Aufar', 'Belum Aktif'),
('CM20210492867', '', '', 'siswa', 'Tirza A', 'Belum Aktif'),
('CM20210492868', '', '', 'siswa', 'Malya Devita Laksono', 'Belum Aktif'),
('CM20210492869', '', '', 'siswa', 'Mumtaz Maheswari', 'Belum Aktif'),
('CM20210492870', '', '', 'siswa', 'Chedia Putri Kusuma Laksono', 'Belum Aktif'),
('CM20210492871', '', '', 'siswa', 'Nurul Hidayah', 'Belum Aktif'),
('CM20210492872', '', '', 'siswa', 'Novia Nurist Niani', 'Belum Aktif'),
('CM20210492873', '', '', 'siswa', 'Emanuel Bernard Gunawan', 'Belum Aktif'),
('CM20210492874', '', '', 'siswa', 'Yusfi andi', 'Belum Aktif'),
('CM20210492875', '', '', 'siswa', 'Nurul Ayu Andari', 'Belum Aktif'),
('CM20210492876', '', '', 'siswa', 'Firman Haditya Firdaus', 'Belum Aktif'),
('CM20210492877', '', '', 'siswa', 'Gerald Francis Russel', 'Belum Aktif'),
('CM20210492878', '', '', 'siswa', 'Farrel Ihsan Diu Cahyadi', 'Belum Aktif'),
('CM20210492879', '', '', 'siswa', 'Irfan Ridhana', 'Belum Aktif'),
('CM20210492880', '', '', 'siswa', 'Cornelius Juvian Limanto', 'Belum Aktif'),
('CM20210492881', '', '', 'siswa', 'M. Fatihatul Firjatullah', 'Belum Aktif'),
('CM20210492882', '', '', 'siswa', 'Awaludin Lingga Palipur', 'Belum Aktif'),
('CM20210492883', '', '', 'siswa', 'Theodore Clifford Lauw', 'Belum Aktif'),
('CM20210492884', '', '', 'siswa', 'Lincoln Mayer Lauw', 'Belum Aktif'),
('CM20210492886', '', '', 'siswa', 'Gugi Sakuryanto', 'Belum Aktif'),
('CM20210492887', '', '', 'siswa', 'Gugi Sakuryanto', 'Belum Aktif'),
('CM20210492888', '', '', 'siswa', 'Alexander Kevin Mahat', 'Belum Aktif'),
('CM20210492890', '', '', 'siswa', 'Yusfi andi', 'Belum Aktif'),
('CM20210492891', '', '', 'siswa', 'Ratih Darmayanti', 'Belum Aktif'),
('CM20210492892', '', '', 'siswa', 'Yu nia', 'Belum Aktif'),
('CM20210492893', '', '', 'siswa', 'Celine Christina', 'Belum Aktif'),
('CM20210492894', '', '', 'siswa', 'Anton Winarto Putro', 'Belum Aktif'),
('CM20210492895', '', '', 'siswa', 'Wahyu Wijayanto', 'Belum Aktif'),
('CM20210492896', '', '', 'siswa', 'Cleary Matthew Wijaya', 'Belum Aktif'),
('CM20210492897', '', '', 'siswa', 'Yusfi andi', 'Belum Aktif'),
('CM20210492898', '', '', 'siswa', 'Deky Yakob', 'Belum Aktif'),
('CM20210492899', '', '', 'siswa', 'Martina Hermin', 'Belum Aktif'),
('CM20210492900', '', '', 'siswa', 'Martina Hermin', 'Belum Aktif'),
('CM20210492901', '', '', 'siswa', 'Siti Marhamah', 'Belum Aktif'),
('CM20210492902', '', '', 'siswa', 'Siti Marhamah', 'Belum Aktif'),
('CM20210492903', '', '', 'siswa', 'Novia Ayu Nanda Safitri', 'Belum Aktif'),
('CM20210492904', '', '', 'siswa', 'Novia Ayu Nanda Safitri', 'Belum Aktif'),
('CM20210492905', '', '', 'siswa', 'Akhmad Rizal', 'Belum Aktif'),
('CM20210492906', '', '', 'siswa', 'Akhmad Rizal', 'Belum Aktif'),
('CM20210492907', '', '', 'siswa', 'Ivon Darmanto', 'Belum Aktif'),
('CM20210492908', '', '', 'siswa', 'Na thania', 'Belum Aktif'),
('CM20210492909', '', '', 'siswa', 'Dewi Rochma Sejati', 'Belum Aktif'),
('CM20210492910', '', '', 'siswa', 'Brian Ezra Wijoyo', 'Belum Aktif'),
('CM20210492911', '', '', 'siswa', 'Hamdan Tri Pamungkas', 'Belum Aktif'),
('CM20210492912', '', '', 'siswa', 'Fiqih Purnamasari', 'Belum Aktif'),
('CM20210492913', '', '', 'siswa', 'Axcel Pasaribu', 'Belum Aktif'),
('CM20210492914', '', '', 'siswa', 'Theodore Clifford Lauw', 'Belum Aktif'),
('CM20210492915', '', '', 'siswa', 'Hana Anindyaguna', 'Belum Aktif'),
('CM20210492916', '', '', 'siswa', 'Celine Christina', 'Belum Aktif'),
('CM20210492917', '', '', 'siswa', 'Agus Surya Wargono', 'Belum Aktif'),
('CM20210492918', '', '', 'siswa', 'Celine Christina', 'Belum Aktif'),
('CM20210492919', '', '', 'siswa', 'Nadiviansyah Prizaldy p', 'Belum Aktif'),
('CM20210492920', '', '', 'siswa', 'Alexander Kevin Mahat', 'Belum Aktif'),
('CM20210492921', '', '', 'siswa', 'Aditya Agil Hendrawan', 'Belum Aktif'),
('CM20210492922', '', '', 'siswa', 'Jessica Nathania', 'Belum Aktif'),
('CM20210492923', '', '', 'siswa', 'Nu rah', 'Belum Aktif'),
('CM20210492924', '', '', 'siswa', 'Cleary Matthew Wijaya', 'Belum Aktif'),
('CM20210492925', '', '', 'siswa', 'Cleary Matthew Wijaya', 'Belum Aktif'),
('CM20210492926', '', '', 'siswa', 'Tahta Alfina', 'Belum Aktif'),
('CM20210492927', '', '', 'siswa', 'Aditya Ramadhan', 'Belum Aktif'),
('CM20210492928', '', '', 'siswa', 'Pieter Ryadi W', 'Belum Aktif'),
('CM20210492929', '', '', 'siswa', 'M. Syaichuddin', 'Belum Aktif'),
('CM20210492930', '', '', 'siswa', 'Nizar Zulmi Pristanto', 'Belum Aktif'),
('CM20210492931', '', '', 'siswa', 'Yogie Takbir Febrianto', 'Belum Aktif'),
('CM20210492932', '', '', 'siswa', 'Dany Yatika', 'Belum Aktif'),
('CM20210492933', '', '', 'siswa', 'Jovan Hariono', 'Belum Aktif'),
('CM20210492934', '', '', 'siswa', 'Farras Naufal Chaliq', 'Belum Aktif'),
('CM20210492935', '', '', 'siswa', 'Derren Deanartha Andrianto', 'Belum Aktif'),
('CM20210492936', '', '', 'siswa', 'Gandy Prawana', 'Belum Aktif'),
('CM20210492937', '', '', 'siswa', 'Christy Grywen', 'Belum Aktif'),
('CM20210492938', '', '', 'siswa', 'Thomson Imanuel Go', 'Belum Aktif'),
('CM20210492939', '', '', 'siswa', 'Lordgent Rafael', 'Belum Aktif'),
('CM20210492940', '', '', 'siswa', 'Arisandi Saputra', 'Belum Aktif'),
('CM20210492941', '', '', 'siswa', 'Almira Zerlina Sri Hartanti', 'Belum Aktif'),
('CM20210492942', '', '', 'siswa', 'Axcel Tiorido Pasaribu', 'Belum Aktif'),
('CM20210492943', '', '', 'siswa', 'Iwan Setiawan', 'Belum Aktif'),
('CM20210492944', '', '', 'siswa', 'Sari Rahayu', 'Belum Aktif'),
('CM20210492945', '', '', 'siswa', 'Arief Hernawan', 'Belum Aktif'),
('CM20210492946', '', '', 'siswa', 'Hans Daren Christian Santoso', 'Belum Aktif'),
('CM20210492947', '', '', 'siswa', 'Ninik Magfiroh', 'Belum Aktif'),
('CM20210492948', '', '', 'siswa', 'Vania Salsabillah', 'Belum Aktif'),
('CM20210492949', '', '', 'siswa', 'Priskila Anggun Octaviani', 'Belum Aktif'),
('CM20210492950', '', '', 'siswa', 'Hafidhotun Nisfi Amaliyah', 'Belum Aktif'),
('CM20210492951', '', '', 'siswa', 'Sudar wanto', 'Belum Aktif'),
('CM20210492952', '', '', 'siswa', 'Ste ven', 'Belum Aktif'),
('CM20210492953', '', '', 'siswa', 'Adrian Azhari Wahono', 'Belum Aktif'),
('CM20210492954', '', '', 'siswa', 'Adrian Azhari Wahono', 'Belum Aktif'),
('CM20210492955', '', '', 'siswa', 'Dian Novitasari', 'Belum Aktif'),
('CM20210492956', '', '', 'siswa', 'Muhammad Dwiky Reyditto', 'Belum Aktif'),
('CM20210492957', '', '', 'siswa', 'Muhammad Dwiky Reyditto', 'Belum Aktif'),
('CM20210492958', '', '', 'siswa', 'M. Farrel Ardan', 'Belum Aktif'),
('CM20210492959', '', '', 'siswa', 'Azwar Shadat Febriansyah', 'Belum Aktif'),
('CM20210492960', '', '', 'siswa', 'Azwar Shadat Febriansyah', 'Belum Aktif'),
('CM20210492961', '', '', 'siswa', 'Muhammad Firja Radinsyah', 'Belum Aktif'),
('CM20210492962', '', '', 'siswa', 'M. Ahyan', 'Belum Aktif'),
('CM20210492963', '', '', 'siswa', ' Raisa Aqila', 'Belum Aktif'),
('CM20210492964', '', '', 'siswa', 'Dewi Novita', 'Belum Aktif'),
('CM20210492965', '', '', 'siswa', 'Siti Nurjiyati', 'Belum Aktif'),
('CM20210492966', '', '', 'siswa', 'Irza Fatchul Yaqin', 'Belum Aktif'),
('CM20210492967', '', '', 'siswa', 'Rika Uly Panggabean', 'Belum Aktif'),
('CM20210492968', '', '', 'siswa', 'Franky Christyan Oeylianto', 'Belum Aktif'),
('CM20210492969', '', '', 'siswa', 'Rizky Prastianto', 'Belum Aktif'),
('CM20210492970', '', '', 'siswa', 'Stephanus Surya Santoso', 'Belum Aktif'),
('CM20210492971', '', '', 'siswa', 'Muhammad Ilyas Zainul Arrafii', 'Belum Aktif'),
('CM20210492972', '', '', 'siswa', 'Na dya', 'Belum Aktif'),
('CM20210492973', '', '', 'siswa', 'William Thamrin', 'Belum Aktif'),
('CM20210492974', '', '', 'siswa', 'William Thamrin', 'Belum Aktif'),
('CM20210492975', '', '', 'siswa', 'Alfrido Tigi Putra', 'Belum Aktif'),
('CM20210492976', '', '', 'siswa', 'Kaysha Aulia Putri Maharany', 'Belum Aktif'),
('CM20210492977', '', '', 'siswa', 'Kaysha Aulia Putri Maharany', 'Belum Aktif'),
('CM20210492978', '', '', 'siswa', 'Edi Wiyanto', 'Belum Aktif'),
('CM20210492979', '', '', 'siswa', 'Jason William Tjandra', 'Belum Aktif'),
('CM20210492980', '', '', 'siswa', 'Yusron Nugroho Aji', 'Belum Aktif'),
('CM20210492981', '', '', 'siswa', 'Margie Agnes Samuel', 'Belum Aktif'),
('CM20210492982', '', '', 'siswa', 'Falih Lutfi Chaliq', 'Belum Aktif'),
('CM20210492983', '', '', 'siswa', 'Fikri Abdul Halim', 'Belum Aktif'),
('CM20210492984', '', '', 'siswa', 'Beryl Cholif', 'Belum Aktif'),
('CM20210492985', '', '', 'siswa', 'Aby Sulthan', 'Belum Aktif'),
('CM20210492986', '', '', 'siswa', 'Tria toe', 'Belum Aktif'),
('CM20210492987', '', '', 'siswa', 'Rijal Rushdi', 'Belum Aktif'),
('CM20210492988', '', '', 'siswa', 'A ham', 'Belum Aktif'),
('CM20210492989', '', '', 'siswa', 'Zam roni', 'Belum Aktif'),
('CM20210492990', '', '', 'siswa', 'Glo rio', 'Belum Aktif'),
('CM20210492991', '', '', 'siswa', 'Han dis', 'Belum Aktif'),
('CM20210492992', '', '', 'siswa', 'Arif P', 'Belum Aktif'),
('CM20210492993', '', '', 'siswa', 'Fikri Abdul Halim', 'Belum Aktif'),
('CM20210492994', '', '', 'siswa', 'Beryl Cholif', 'Belum Aktif'),
('CM20210492995', '', '', 'siswa', 'A bid', 'Belum Aktif'),
('CM20210492996', '', '', 'siswa', 'Ferry Fabi', 'Belum Aktif'),
('CM20210492997', '', '', 'siswa', 'Okta vian', 'Belum Aktif'),
('CM20210492998', '', '', 'siswa', 'Na bil', 'Belum Aktif'),
('CM20210492999', '', '', 'siswa', 'Fajar H', 'Belum Aktif'),
('CM20210493000', '', '', 'siswa', 'Dwic ky', 'Belum Aktif'),
('CM20210493001', '', '', 'siswa', 'Mif tah', 'Belum Aktif'),
('CM20210493002', '', '', 'siswa', 'Ja ka', 'Belum Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `loker`
--

CREATE TABLE `loker` (
  `id_loker` int(11) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `gaji` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(200) NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `updated_by` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `loker`
--

INSERT INTO `loker` (`id_loker`, `gambar`, `judul`, `gaji`, `deskripsi`, `status`, `created_by`, `updated_by`, `created_date`, `updated_date`) VALUES
(1, 'upload/gambar/lowongan-kerja-java-android.jpg', 'Open Recruitment Trainer Programming Java Android', 'Negosiasi', '<p>Creative Media adalah perusahaan bergerak dalam bidang Industri Kreatif yang menyediakan Layanan dan Jasa : Computer Course &amp; Trainings, Web Development, Design &amp; Branding, Mobile Apps Development yang berkantor pusat di Surabaya. Profil lengkap kami silahkan mengakses www.creativemedia.id Kami membuka kesempatan bagi Anda Profesional muda yang mempunyai Integritas Tinggi untuk bergabung bersama kami mengisi jabatan :</p><p><br></p><p>Persayaratan &amp; Kualifikasi:<br></p><p>• Pria / Wanita</p><p>• Usia min. 21 Tahun</p><p>• Menguasai dan Familiar (Android Studio, MySQL / SQLite / Oracle, XML dan Json)</p><p>• Min. D3 / S1 (Tek. Informatika, Tek. Komputer, Sistem Informasi, Manajemen Komputer)</p><p>• Berpengalaman minimal 1 tahun sebagai Programmer Java Android</p><p>• Mempunyai Laptop Sendiri</p><p>• Domisili Surabaya, Gresik , Sidoarjo</p><p>• Berpenampilan Menarik &amp; Energik</p><p>• Dapat berkomunikasi dengan baik</p><p>• Mempunyai Sertifikat Keahlian Internasional (diutamakan)</p><p>• Mempunyai Portfolio.</p><p><br></p><p>Berkas Lamaran : Pas Foto, CV, Ijazah Terakhir</p><p>Kirim ke email : hrd@creativemedia.id</p><p>Subyek : “TRAINER PROGRAMMING JAVA ANDROID”</p>                                                ', 'Publish', 'Admin Creative Media', 'Admin Creative Media', '2018-12-01 03:47:07', '2019-03-14 16:00:43'),
(3, 'upload/gambar/lowongan-kerja.jpg', 'Accounting Staf', 'Negosiasi', '<p>Di butuhkan Accounting Staff Dengan kualifikasi :</p><p>- Wanita, usia max 30 th, boleh memakai jilbab </p><p>- Min SMK dari Jurusan Akuntansi</p><p> - Memiliki Pengalaman dalam pembukuan, Fresh Graduate juga dipertimbangkan </p><p>- Jujur , Teliti, Pekerja keras, berkepribadian baik, bertanggung jawab </p><p>- Mampu bekerja secara kelompok maupun individu, dibawah tekanan dan tenggat waktu </p><p>- Terbiasa dengan software Accurate </p><p>- Dapat menyiapkan laporan Neraca dan Rugi / Laba </p><p>- Mempunyai pengalaman dalam bidang perpajakan</p><p><br></p><p>Hormat Kami, PT. Mitra Bahari Sejati&nbsp;</p>        ', 'Publish', 'Admin Creative Media', 'Admin Creative Media', '2019-03-05 14:45:52', '2019-03-05 14:50:59'),
(4, 'upload/gambar/UKI_Education_Square.png', 'Lowongan “Admin & Customer Service”', 'Negosiasi', 'UKI Education merupakan Lembaga Bimbingan Belajar untuk membantu meningkatkan kemampuan dalam bidang akademik untuk mata pelajaran umum, bahasa inggris dan komputer yang ada di kota Tuban.\r\n\r\nTanggung Jawan Pekerjaan :\r\n\r\nMenerima telp masuk dan menjelaskan produk serta layanan\r\nMenjelaskan produk dan layanan kepada customer baru\r\nMembuat dan mencatat laporan keuangan\r\nMempromosikan produk dan layanan secara konvensional maupun online\r\nMenawarkan produk dan layanan bimbingan belajar kepada customer\r\nMelakukan follow up customer\r\nMelakukan penjadwalan bimbingan belajar\r\nKeahlian :\r\n\r\nMempunyai kemampuan komunikasi yang baik\r\nMenguasai Ms. Office (Ms. Word, Ms. Excel & Ms. Powerpoint)\r\nKualifikasi :\r\n\r\nWanita\r\nMin. SMA/SMK Segala Jurusan\r\nBerpenampilan Menarik / Good Looking\r\nPengalaman Min. 1 Tahun dibidang Customer Service\r\nMampu berkomunikasi dengan baik\r\nKomunikatif, Disipilin, Pekerja Keras, Kreatif\r\nMampu mengoperasikan Microsoft Office\r\nMampu bekerja secara tim dan individu\r\nTUNJANGAN :\r\n\r\nGaji Pokok\r\nBonus / Insentif\r\nBERKAS LAMARAN :\r\n\r\nPas Foto, CV, Ijazah Terakhir\r\nKirim ke email : hrd@ukieducation.com\r\nSubjek : \"Admin & Customer Service\"                        ', 'Publish', 'Admin Creative Media', 'Admin Creative Media', '2019-03-14 08:52:07', '2019-03-15 15:08:47'),
(5, 'upload/gambar/0-Main-GiftWorldTeachersDay-wavebreakmedia-shutterstock_309241202-848x477.jpg', 'Lowongan Guru Bimbel UKI Education', 'Rp. 1.000.000  s.d Rp. 2.500.000', '<p>UKI Education merupakan Lembaga Bimbingan Belajar untuk SD, SMP, SMA dan Umum. Kami membantu meningkatkan kemampuan dalam bidang akademik untuk mata pelajaran Umum, Bahasa Inggris dan Komputer yang ada di kota Tuban. Kami mengundang Profesional muda yang INTEGRITAS untuk bergabung bersama kami mengisi jabatan \"PENGAJAR\" Freelance.</p><p><b>Persyaratan :</b></p><p>- Wanita /Pria</p><p>- Minimal Pendidikan D3/Semester Akhir segala jurusan</p><p>- Mampu berkomunikasi dgn baik</p><p>- Menyukai dunia anak-anak</p><p>- Menguasai minimal 1 mata pelajaran</p><p>- Mempunyai laptop</p><p>- Jujur, Profesional dan bertanggung jawab</p><div><div>Berkas Lamaran :</div><div>Pas Foto & CV kirim ke alamat dibawah ini : </div><div>Graha Ronggolawe Blok H-06 </div><div>Jl. Raya Bektiharjo, Semanding - Tuban.</div><div>Jam Operasional : 08.00  - 16.00 WIB</div><div><br></div><div>Lamaran Online :</div><div>Email ke : hrd@ukieducation.com</div><div>Subyek :  “Pengajar Freelance”</div></div><div><br></div><p>        </p>        ', 'Publish', 'Admin Creative Media', 'Admin Creative Media', '2019-03-14 09:13:44', '2019-03-15 15:06:36'),
(6, 'upload/gambar/Informa.jpg', 'Lowongan Pekerjaan INFORMA Surabaya (Admin, Customer Service, Pramuniaga, Kasir, Installer, Teknisi, VM)', 'negosiasi', '<p style=\"font-family: Verdana, Geneva, sans-serif; line-height: 24px; color: rgb(34, 34, 34); margin-bottom: 24px;\">Kembali pada kesempatan ini Informa guna membangun pasar lebih besar dan efektif didalam pekerjaan yang mempunyai motivasi tinggi dibutuhkan karyawan yang profesional dan menjalankan misi sesuai keinginan perusahaan, dengan cara mengundang Anda untuk bergabung bersama kami.</p><p style=\"font-family: Verdana, Geneva, sans-serif; line-height: 24px; color: rgb(34, 34, 34); margin-bottom: 24px;\">Jenis Perusahaan            : Retail Perlengkapan Furniture</p><p style=\"font-family: Verdana, Geneva, sans-serif; line-height: 24px; color: rgb(34, 34, 34); margin-bottom: 24px;\">Ruang lingkup pekerjaan : Operasional</p><p style=\"font-family: Verdana, Geneva, sans-serif; line-height: 24px; color: rgb(34, 34, 34); margin-bottom: 24px;\">Posisi lowongan kerja yang dibutuhkan adalah :</p><p style=\"font-family: Verdana, Geneva, sans-serif; line-height: 24px; color: rgb(34, 34, 34); margin-bottom: 24px;\"><strong>1. INSTALLER<br>2. ADMINISTRATION STAFF<br>3. CUSTOMER SERVICE<br>4. PRAMUNIAGA<br>5. KASIR<br>6. TEKNISI<br>7. VISUAL MERCHANDISING</strong></p><p style=\"font-family: Verdana, Geneva, sans-serif; line-height: 24px; color: rgb(34, 34, 34); margin-bottom: 24px;\">Kualifikasi sebagai berikut :<br>– Laki-laki/ Perempuan<br>– Usia maksimal 28 tahun<br>– Pendidikan minimal SMA/SMK (D3/S1 lebih diutamakan)<br>– Khusus Pendidikan minimal S1 (Desainer)<br>– Berpenampilan menarik, ramah, dan helpful</p><p style=\"font-family: Verdana, Geneva, sans-serif; line-height: 24px; color: rgb(34, 34, 34); margin-bottom: 24px;\">Info : Pengumuman lowongan ini dibutuhkan langsung. Hanya pelamar yang memenuhi syarat akan ditindaklanjuti. Informasi kepada Pelamar diharapkan berhati-hati terhadap unsur penipuan yang dilakukan oleh perusahaan yang tidak bertanggung jawab dalam memungut biaya atau yang dapat merugikan.</p><p style=\"font-family: Verdana, Geneva, sans-serif; line-height: 24px; color: rgb(34, 34, 34); margin-bottom: 24px;\">Jika Anda tertarik, silahkan datang langsung berkas surat lamaran, pas photo, fc KTP, FC Ijazah dan dokumen lengkap ke :<br><strong>WALK IN INTERVIEW</strong><br><strong>TANGGAL : 14 MARET 2019</strong><br><strong>PUKUL : 10.00 -12.00 WIB</strong><br>INFORMA ROYAL PLAZA<br>Jl. Ahmad Yani 16-18 Lantai 2 Surabaya</p>                        ', 'Hidden', 'Admin Creative Media', 'Admin Creative Media', '2019-03-14 14:06:21', '2019-03-23 11:53:51'),
(7, 'upload/gambar/PARAGON-TECHNOLOGY-INNOVATIVE.png', 'Walk In Interview Paragon Technology & Innovative – Wardah Surabaya (Beauty Advisor)', 'Negosiasi', '<p class=\"MsoNormal\" style=\"text-align: justify; margin-bottom: 0.0001pt;\"><span lang=\"IN\" style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Loker Surabaya, PT. Paragon\r\nTechnology and Innovation yang beralamat di Surabaya, merupakan perusahaan yang\r\nbergerak di bidang kosmetik manufaktur dan telah mendapat sertifikat GMP (Good\r\nManufacturing Practice) dengan kapasitas produksi yang besar dan formulasi yang\r\nunggul. Kami juga telah membawa MAKE OVER sebagai brand terpercaya oleh para\r\nMake-Up artis terkemuka. PT PTI terus mengembangkan brand-brand unggulan\r\nlainnya, seperti Putri, IX, Vivre, Hair Addict, dan Nusilk.&nbsp;Pada tahun\r\n1995, PTI mulai mengembangkan merk Wardah.&nbsp;Adapun semangat kerja dan\r\npelayanan yang handal oleh tenaga profesional kami yang sudah berpengalaman di\r\nbidangnya mampu memberikan solusi dan kontribusi kepada Anda.</span><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-ansi-language:EN-US\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-ansi-language:EN-US\"><o:p>&nbsp;</o:p></span></p><p class=\"MsoNormal\" style=\"text-align: justify; margin-bottom: 0.0001pt;\"><span lang=\"IN\" style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Kembali pada kesempatan ini\r\nPT. Paragon Technology and Innovation guna&nbsp;membangun pasar lebih besar dan\r\nefektif di ddalam&nbsp;pekerjaan&nbsp;yang&nbsp;mempunyai motivasi\r\ntinggi&nbsp;dibutuhkan karyawan yang profesional dan menjalankan misi sesuai\r\nkeinginan perusahaan, dengan cara mengundang Anda untuk bergabung bersama kami.</span><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-ansi-language:EN-US\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-ansi-language:EN-US\"><o:p>&nbsp;</o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt\"><span lang=\"IN\" style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Jenis Perusahaan : Perusahaan\r\nKosmetik<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt\"><span lang=\"IN\" style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Ruang lingkup pekerjaan :\r\nOperasional<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt\"><span lang=\"IN\" style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Posisi lowongan kerja yang\r\ndibutuhkan BEAUTY ADVISOR<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\nnormal\"><span lang=\"IN\" style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Persyaratan\r\nsebagai berikut :</span><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;\r\nmso-ansi-language:EN-US\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt\"><span lang=\"IN\"><br>\r\n</span><span lang=\"IN\" style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">– Perempuan<br>\r\n– Usia maksimal 26 tahun<br>\r\n– Memiliki kendaraan dan SIM C<br>\r\n– Tinggi badan minimal 158cm<br>\r\n– Berat badan ideal<br>\r\n– Berpenampilan menarik (tidak berjerawat)<br>\r\n– Lebih diutamakan yang berpengalaman</span><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;\r\nmso-ansi-language:EN-US\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-ansi-language:EN-US\"><o:p>&nbsp;</o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt\"><span lang=\"IN\" style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Info : </span><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-ansi-language:EN-US\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align: justify; margin-bottom: 0.0001pt;\"><span lang=\"IN\" style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Pengumuman lowongan ini\r\ndibutuhkan segera, diharapkan agar lamaran Anda segera dikirim segera mungkin.\r\nHanya&nbsp;pelamar yang memenuhi syarat akan ditindaklanjuti. Informasi kepada\r\nPelamar diharapkan berhati-hati terhadap unsur penipuan yang dilakukan oleh\r\nperusahaan yang tidak bertanggung jawab dalam memungut biaya atau yang dapat\r\nmerugikan.</span><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-ansi-language:\r\nEN-US\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-ansi-language:EN-US\"><o:p>&nbsp;</o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt\"><span lang=\"IN\" style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Jika Anda tertarik, silahkan\r\nkirim surat lamaran, pas photo, riwayat hidup, fc ktp, fc</span><span lang=\"IN\" style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-ansi-language:EN-US\"> </span><span lang=\"IN\" style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">ijazah</span><span lang=\"IN\" style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-ansi-language:EN-US\"> </span><span lang=\"IN\" style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">/</span><span lang=\"IN\" style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-ansi-language:EN-US\"> </span><span lang=\"IN\" style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">SKHUN dan dokumen lengkap, ke\r\n:</span><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-ansi-language:EN-US\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt\"><span lang=\"IN\" style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><br>\r\nWALK IN INTERVIEW<br>\r\nSABTU, 23 MARET 2019<br>\r\nPUKUL : 09.00 – 12.00<br>\r\nJl. Rungkut Industri III No. 26 Surabaya</span><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;\r\nmso-ansi-language:EN-US\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt\"><span lang=\"IN\" style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><br>\r\n*Mengenakan pakaian rapi dan sopan<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;text-align:\r\njustify\">\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><o:p>&nbsp;</o:p></p>', 'Publish', 'Admin Creative Media', 'Admin Creative Media', '2019-03-14 14:09:06', '2019-03-14 16:45:46'),
(8, 'upload/gambar/PT_-DEWATA-KENCANA-DISTRIBUSI.jpg', 'Lowongan Pekerjaan PT. DEWATA KENCANA DISTRIBUSI Surabaya (Staff  Accounting, MT Sales SPV, Staff IT)', 'negosiasi', '<p><span style=\"color: rgb(34, 34, 34); font-family: Verdana, Geneva, sans-serif;\">PT. Dewata Kencana Distribusi – Orang Tua Group yang beralamat di Surabaya merupakan perusahaan  yang bergerak dalam bidang distributor minuman kesehatan berskala nasional dengan produk-produk Orang Tua. Tentunya dengan pelayanan oleh tenaga profesional kami selalu memberikan solusi dan kontribusi dengan kenyaman dan kepuasan customer, kami sangat berpengalaman dibidangnya karena sudah menjalani masa training secara visi dan misi perusahaan kedepan untuk lebih baik.</span></p><p><span style=\"color: rgb(34, 34, 34); font-family: Verdana, Geneva, sans-serif;\"><br></span></p><p style=\"font-family: Verdana, Geneva, sans-serif; line-height: 24px; color: rgb(34, 34, 34); margin-bottom: 24px;\">Kembali pada kesempatan ini PT. Dewata Kencana Distribusi guna membangun pasar lebih besar dan efektif didalam pekerjaan yang mempunyai motivasi tinggi dibutuhkan karyawan yang profesional dan menjalankan misi sesuai keinginan perusahaan, dengan cara mengundang Anda untuk bergabung bersama kami.</p><div style=\"color: rgb(68, 68, 68); font-family: Verdana, Geneva, sans-serif;\">Jenis Perusahaan            : Distributor Minuman</div><p style=\"font-family: Verdana, Geneva, sans-serif; line-height: 24px; color: rgb(34, 34, 34); margin-bottom: 24px;\">Ruang lingkup pekerjaan : Operasional</p><p style=\"font-family: Verdana, Geneva, sans-serif; line-height: 24px; color: rgb(34, 34, 34); margin-bottom: 24px;\">Posisi lowongan kerja yang dibutuhkan dan kualifikasi sebagai berikut :</p><p style=\"font-family: Verdana, Geneva, sans-serif; line-height: 24px; color: rgb(34, 34, 34); margin-bottom: 24px;\"><strong>1. MANAGEMENT TRAINEE SALES SUPERVISOR (MT-SPV)</strong><br>– Pria/ Wanita<br>– Usia maksimal 25 tahun<br>– Pendidikan S1 Semua Jurusan<br>– IPK minimal 3.00<br>– Menyukai pekerjaan lapangan, bekerja dengan target, memiliki leadership dan komunikasi<br>– Penempatan JAWA TIMUR</p><p style=\"font-family: Verdana, Geneva, sans-serif; line-height: 24px; color: rgb(34, 34, 34); margin-bottom: 24px;\"><strong>2. STAFF ACCOUNTING (ACC)</strong><br>– Pria/ Wanita<br>– Usia maksimal 25 tahun<br>– Pendidikan S1 Akuntansi<br>– IPK minimal 3.00<br>– Mengerti dasar akuntansi<br>– Bersedia tugas luar kota<br>– Penempatan SURABAYA</p><p style=\"font-family: Verdana, Geneva, sans-serif; line-height: 24px; color: rgb(34, 34, 34); margin-bottom: 24px;\"><strong>3. STAFF IT (EDP)<br></strong>– Pria<br>– Usia maksimal 25 tahun<br>– Pendidikan S1 Teknik Informatika/ Sistem Informasi<br>– IPK minimal 3.00<br>– Menguasai troubleshooting, instalasi jaringan, dan hardware<br>– Mau bertugas di luar kota<br>– Penempatan SURABAYA</p><p style=\"font-family: Verdana, Geneva, sans-serif; line-height: 24px; color: rgb(34, 34, 34); margin-bottom: 24px;\">Info : Pengumuman lowongan ini dibutuhkan segera. Hanya pelamar yang memenuhi syarat akan ditindaklanjuti. Informasi kepada Pelamar diharapkan berhati-hati terhadap unsur penipuan yang dilakukan oleh perusahaan yang tidak bertanggung jawab dalam memungut biaya atau yang dapat merugikan.</p><p style=\"font-family: Verdana, Geneva, sans-serif; line-height: 24px; color: rgb(34, 34, 34); margin-bottom: 24px;\">Jika Anda tertarik, silahkan kirim langsung surat lamaran, cv, pas photo 4×6, fc ktp, riwayat hidup dan dokumen lengkap, ke :<br>HRD PT. DEWATA KENCANA DISTRIBUSI<br>Jl. Cempaka No. 34, Tegalsari, Surabay<br>Email : <em><strong>dewata_jatim@yahoo.com</strong></em></p><p><br></p>                ', 'Publish', 'Admin Creative Media', 'Admin Creative Media', '2019-03-14 14:14:51', '2019-03-14 14:32:38'),
(9, 'upload/gambar/MINISO.jpg', 'Lowongan kerja MINISO Surabaya (Store Crew) Terbit Maret 2019', 'Negosiasi', '<p><span style=\"display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(34, 34, 34); font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\">Loker Surabaya, MINISO yang beralamat di cabang Surabaya, sebuah merek fashion & Aksesoris Wanita ternama dari Jepang. Adapun semangat kerja dan pelayanan yang handal oleh tenaga profesional kami yang sudah berpengalaman di bidangnya mampu memberikan solusi dan kontribusi kepada Anda.</span></p><p><span style=\"display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(34, 34, 34); font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\"><br></span></p><span style=\"text-align: left; color: rgb(34, 34, 34); text-transform: none; line-height: 24px; text-indent: 0px; letter-spacing: normal; font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-variant: normal; word-spacing: 0px; display: inline !important; white-space: normal; orphans: 2; float: none; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"><p style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; line-height: 24px; margin-bottom: 24px; margin-top: 0px; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\">Kembali pada kesempatan ini MINISO guna membangun pasar lebih besar dan efektif didalam pekerjaan yang mempunyai motivasi tinggi dibutuhkan karyawan yang profesional dan menjalankan misi sesuai keinginan perusahaan, dengan cara mengundang Anda untuk bergabung bersama kami.</p><p><span style=\"display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(68, 68, 68); font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\">\r\n</span></p><p style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; line-height: 24px; margin-bottom: 24px; margin-top: 0px; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\">Jenis Perusahaan : Fashion Aksesoris</p><p><span style=\"display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(68, 68, 68); font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\">\r\n</span></p><p style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; line-height: 24px; margin-bottom: 24px; margin-top: 0px; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\">Ruang lingkup pekerjaan : Operasional</p><p><span style=\"display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(68, 68, 68); font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\">\r\n</span></p><p style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; line-height: 24px; margin-bottom: 24px; margin-top: 0px; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\">Posisi lowongan kerja yang dibutuhkan adalah<b style=\"box-sizing: border-box; font-weight: bold;\"> STORE CREW</b></p><p><span style=\"display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(68, 68, 68); font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\">\r\n</span></p><p style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; line-height: 24px; margin-bottom: 24px; margin-top: 0px; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\">dan persyaratan sebagai berikut :<br style=\"box-sizing: border-box;\">\r\n– Pria/Wanita<br style=\"box-sizing: border-box;\">\r\n– Usia maksimal 28 tahun<br style=\"box-sizing: border-box;\">\r\n– Pendidikan minimal SMA/SMK<br style=\"box-sizing: border-box;\">\r\n– Berpenampilan menarik dengan tinggi badan 155 cm (Wanita) dan tinggi badan minimal 165 cm (Pria)<br style=\"box-sizing: border-box;\">\r\n– Sehat fisik dan psikis (tidak bertato dan bertindik)</p><p><span style=\"display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(68, 68, 68); font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\">\r\n</span></p><p style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; line-height: 24px; margin-bottom: 24px; margin-top: 0px; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\">Fasilitas :<br style=\"box-sizing: border-box;\">\r\n– Gaji UMR<br style=\"box-sizing: border-box;\">\r\n– BPJS Kesehatan dan Ketenagakerjaan<br style=\"box-sizing: border-box;\">\r\n– Insentif (target toko)<br style=\"box-sizing: border-box;\">\r\n– Jenjang karir (promosi 3 bulan)</p><p><span style=\"display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(68, 68, 68); font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\">\r\n</span></p><p style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; line-height: 24px; margin-bottom: 24px; margin-top: 0px; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\">Berkas lamaran yang dibawa :<br style=\"box-sizing: border-box;\">\r\n– CV Lengkap & Photo terbaru<br style=\"box-sizing: border-box;\">\r\n– Ijazah Asli (HANYA DIPERLIHATKAN)<br style=\"box-sizing: border-box;\">\r\n– FC Ijazah, KTP, KK<br style=\"box-sizing: border-box;\">\r\n– Surat Keterangan Kerja (WAJIB UNTUK POSISI AST. STORE SPV)</p><p><span style=\"display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(68, 68, 68); font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\">\r\n</span></p><p style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; line-height: 24px; margin-bottom: 24px; margin-top: 0px; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\">Info : Pengumuman lowongan ini dibutuhkan segera, diharpakan agar lamaran Anda segera dikirim segera mungkin. Hanya pelamar yang memenuhi syarat akan ditindaklanjuti. Informasi kepada Pelamar diharapkan berhati-hati terhadap unsur penipuan yang dilakukan oleh perusahaan yang tidak bertanggung jawab dalam memungut biaya atau yang dapat merugikan.</p><p><span style=\"display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(68, 68, 68); font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\">\r\n</span></p></span><p style=\"box-sizing: border-box; color: rgb(34, 34, 34); font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; line-height: 24px; margin-bottom: 24px; margin-top: 0px; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\"><span style=\"text-align: left; color: rgb(34, 34, 34); text-transform: none; line-height: 24px; text-indent: 0px; letter-spacing: normal; font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-variant: normal; word-spacing: 0px; display: inline !important; white-space: normal; orphans: 2; float: none; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">Jika Anda tertarik, silahkan kirim langsung berkas lamaran yang seperti disebutkan diatas, ke :<br style=\"box-sizing: border-box;\">\r\n<em style=\"box-sizing: border-box;\"><strong style=\"box-sizing: border-box; font-weight: bold;\">email : hrdstore.indonesia@miniso.com<br style=\"box-sizing: border-box;\">\r\nsubjek : Surabaya_Store Crew</strong></em></span><br></p>                ', 'Publish', 'Admin Creative Media', 'Admin Creative Media', '2019-03-14 14:18:59', '2019-03-14 14:32:24'),
(10, 'upload/gambar/lowongan-kerja-bumn-pt-antam-tbk-pendaftaran-sampai-12-januari-2019.jpg', 'lowongan kerja PT. Antam persero tbk Surabaya, Jawa Timur', 'Negosiasi', '<p><span style=\"color: rgba(0, 0, 0, 0.87); font-family: Roboto, arial, sans-serif; white-space: pre-line;\">PT Aneka Tambang (Persero) Tbk – Antam adalah salah satu BUMN tambang terbesar di Indonesia. Perseroan berdiri tahu 1968 sebagai hasil merjer atau penggabungan beberapa perusahaan pertambangan nasional yang memproduksi komoditas tunggal. Sebagai perusahaan BUMN, sebagaian besar saham perseroan dimiliki oleh pemerintah Republik Indonesia dengan komposisi 65% saham. Sisanya sebanyak 35% saham dimiliki oleh publik atau masyarakat umum. Komoditas utama dari perusahaan tambang ini adalah bijih nikel kadar tinggi (saprolit), bijih nikel kadar rendah (limonit), feronikel, emas, perak serta bauksit. Perseroan ini juga melakukan kegiatan pengolahan dan pemurian logam mulia serta jasa geologi sebagai jasa utama. Sejalan dengan pertumbuhan perusahaan yang begitu pesat, saat ini PT Aneka Tambang (Persero) Tbk membuka kesempatan kepada kandidat terbaik untuk bergabung bersama PT Aneka Tambang (Persero) Tbk dengan posisi berikut ini : </span></p><p><span style=\"color: rgba(0, 0, 0, 0.87); font-family: Roboto, arial, sans-serif; white-space: pre-line;\">\r\nDi butuhkan :\r\n• STAFF ADMINISTRASI\r\n• SUPERVISOR\r\n•</span><span class=\"WbZuDe\" style=\"display: inline; color: rgba(0, 0, 0, 0.87); font-family: Roboto, arial, sans-serif; white-space: pre-line;\"> RECEPTIONIST\r\n• STAFF ACCOUNTING/KEUANGAN\r\n• STAFF HRD\r\n• MARKETING\r\n• PRODUCTION STAFF\r\n• KEPALA CABANG\r\n• SENIOR DEVELOPMENT GEOLOGIST\r\n• SENIOR DATA MANAGEMENT ENGINEER,\r\n• OPERATOR PRODUKSI,\r\n• PURCHASING OFFICER,\r\n</span></p><p><span class=\"WbZuDe\" style=\"display: inline; color: rgba(0, 0, 0, 0.87); font-family: Roboto, arial, sans-serif; white-space: pre-line;\">\r\nKUALIFIKASI</span></p><p><span class=\"WbZuDe\" style=\"display: inline; color: rgba(0, 0, 0, 0.87); font-family: Roboto, arial, sans-serif; white-space: pre-line;\"> 1. Pria/Wanita Usia 17 - 45 Tahun</span></p><p><span class=\"WbZuDe\" style=\"display: inline; color: rgba(0, 0, 0, 0.87); font-family: Roboto, arial, sans-serif; white-space: pre-line;\"> 2. Pendidikan/Lulusan D1, D3 & S1, S2 Sederajat (Semua Jurusan)</span></p><p><span class=\"WbZuDe\" style=\"display: inline; color: rgba(0, 0, 0, 0.87); font-family: Roboto, arial, sans-serif; white-space: pre-line;\">3. Pengalaman kerja 1 sampai 2 tahun</span></p><p><span class=\"WbZuDe\" style=\"display: inline; color: rgba(0, 0, 0, 0.87); font-family: Roboto, arial, sans-serif; white-space: pre-line;\"> 4. Jujur, Disiplin dan Bertanggung jawab</span></p><p><span class=\"WbZuDe\" style=\"display: inline; color: rgba(0, 0, 0, 0.87); font-family: Roboto, arial, sans-serif; white-space: pre-line;\">5. Sehat jasmani dan Rohani, Boleh berjilbab/Berkacamata </span></p><p><span class=\"WbZuDe\" style=\"display: inline; color: rgba(0, 0, 0, 0.87); font-family: Roboto, arial, sans-serif; white-space: pre-line;\">6. Menginput data secara manual dan computer Min.Ms - Office + Internet </span></p><p><span class=\"WbZuDe\" style=\"display: inline; color: rgba(0, 0, 0, 0.87); font-family: Roboto, arial, sans-serif; white-space: pre-line;\">7. Bisa berbahasa Asing akan menjadi kelebihan </span></p><p></p><h4></h4><h5><span class=\"WbZuDe\" style=\"display: inline; color: rgba(0, 0, 0, 0.87); font-family: Roboto, arial, sans-serif; white-space: pre-line;\">8. Ditempatkan di wilayah kerja PT.ANTAM PERSERO\r\n</span></h5><h5><span class=\"WbZuDe\" style=\"display: inline; color: rgba(0, 0, 0, 0.87); font-family: Roboto, arial, sans-serif; white-space: pre-line;\">\r\n</span></h5><span class=\"WbZuDe\" style=\"display: inline; color: rgba(0, 0, 0, 0.87); font-family: Roboto, arial, sans-serif; white-space: pre-line;\">Persyaratan :</span> <p></p><p><span class=\"WbZuDe\" style=\"display: inline; color: rgba(0, 0, 0, 0.87); font-family: Roboto, arial, sans-serif; white-space: pre-line;\"> 1. Lamaran lengkap, Fotocopy KTP,KK,IJAZAH,CV,PHOTO (3X4) 2 Lembar</span></p><p><span class=\"WbZuDe\" style=\"display: inline; color: rgba(0, 0, 0, 0.87); font-family: Roboto, arial, sans-serif; white-space: pre-line;\"> 2. Mengahadiri undangan/wawancara di kantor apabilah menerima surat panggilan dari perusahaan\r\n</span></p><p><span class=\"WbZuDe\" style=\"display: inline; color: rgba(0, 0, 0, 0.87); font-family: Roboto, arial, sans-serif; white-space: pre-line;\">\r\nCara melamar :</span></p><p><span class=\"WbZuDe\" style=\"display: inline; color: rgba(0, 0, 0, 0.87); font-family: Roboto, arial, sans-serif; white-space: pre-line;\"> Silahkan kirim data lamaran, cv, Fotocopy KTP, Kartu Keluarga, Ijazah serta foto Anda,no hp yang bisa di hubungi, ijazah Terakhir ke Email : <b>recruitment.pt.antampersero@gmail.com</b></span></p><p><span class=\"WbZuDe\" style=\"display: inline; color: rgba(0, 0, 0, 0.87); font-family: Roboto, arial, sans-serif; white-space: pre-line;\"> Bagi calon karyawan yang memenuhi persyaratan akan di konfirmasikan dari perusahaan melalui sms/via Email.\r\n</span></p><p><span class=\"WbZuDe\" style=\"display: inline; color: rgba(0, 0, 0, 0.87); font-family: Roboto, arial, sans-serif; white-space: pre-line;\">\r\nNote :\r\n• Hanya yang sesuai kreteria diatas yang akan dipanggil untuk interview\r\n• Jadwal interview akan dikonfirmasi via email, telp atau sms.\r\n• Bagi yang di panggil interview 100 % sudah pasti diterima bekerja.\r\n• Non Yayasan, Mlm, dan Outsourching\r\n• Dan Untuk yang baru lulus ijazah bisa menyusul dapat dengan </span><span style=\"color: rgba(0, 0, 0, 0.87); font-family: Roboto, arial, sans-serif; white-space: pre-line;\">melampirkan SKL(Surat Ket. Lulus / KTP)</span></p>        ', 'Publish', 'Admin Creative Media', 'Admin Creative Media', '2019-03-14 14:27:49', '2019-08-07 10:56:06'),
(11, 'upload/gambar/Indomaret-1.jpg', 'Walk In Interview Indomaret Surabaya (Pramuniaga, Kasir, Barista) 13 Maret 2019', 'Negosiasi', '<p><span style=\"display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(34, 34, 34); font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\">Loker Indomaret Surabaya, PT. Indomarco Prismatama atau Indomaret yang beralamat di cabang Surabaya, merupakan perusahaan yang bergerak di bidang retail minimarket, kami menyediakan kebutuhan sehari-ari dan merupakan merk dagang yang menyediakan lebih dari 5000 produk dengan harga yang kompetitif dalam memenuhi kebutuhan Anda, saat ini Indomaret sudah berkembang dengan pesat telah memiliki lebih dari 12.800 gerai terdiri dari 40% waralaba dan 60% oleh perusahaan. Tentunya dengan semangat kerja dan pelayanan handal oleh tenaga profesional kami yang sudah berpengalaman di bidangnya mampu memberikan solusi dan kontribusi kepada Anda.</span></p><p><span style=\"display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(34, 34, 34); font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\"><br></span></p><p><span style=\"display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(34, 34, 34); font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\">Kembali pada kesempatan ini PT. Indomarco Prismatama guna membangun pasar lebih besar dan efektif didalam pekerjaan yang mempunyai motivasi tinggi dibutuhkan karyawan yang profesional dan menjalankan misi sesuai keinginan perusahaan, dengan cara mengundang Anda untuk bergabung bersama kami.</span></p><p><span style=\"display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(34, 34, 34); font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\"><br>Jenis Perusahaan : Retail Minimarket</span><span style=\"display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(34, 34, 34); font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\"><br></span></p><p><span style=\"display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(34, 34, 34); font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\">Ruang lingkup pekerjaan : Operasional</span></p><p><span style=\"display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(34, 34, 34); font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\"><br>Posisi lowongan kerja yang dibutuhkan dan kualifikasi sebagai berikut :</span></p><p><span style=\"display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(34, 34, 34); font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\"><br>1. PRAMUNIAGA <br>– Pria<br>– Belum menikah<br>– Usia maksimal 25 tahun<br>– Pendidikan minimal SMA/SMK/Sederajat<br>– Belum menikah<br>– Tinggi badan minimal 160 cm<br>– Berpenampilan menarik<br>– Bersedia bekerja SHIFT<br>– Penempatan sesuai kebutuhan</span></p><p><span style=\"display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(34, 34, 34); font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\"><br>2. KASIR <br>– Wanita<br>– Belum menikah<br>– Usia 18 – 23 tahun<br>– Pendidikan minimal SMA/SMK/Sederajat<br>– Belum menikah<br>– Tinggi badan minimal 155 cm<br>– Berpenampilan menarik<br>– Bersedia bekerja SHIFT<br>– Penempatan sesuai kebutuhan</span></p><p><span style=\"display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(34, 34, 34); font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\"><br>3. BARISTA<br>– Pria (Usia maksimal 25 tahun)<br>– Wanita (Usia maksimal 23 tahun)<br>– Tinggi badan Pria minimal 160cm & Wanita minimal 155cm<br>– Berat badan ideal<br>– Pendidikan minimal SMA/SMK/Sederajat atau D1 Semua Jurusan<br>– Belum menikah<br>– Komunikatif, berpenampilan menarik<br>– Pengalaman kerja sebagai BARISTA (minimal 1 tahun)<br></span></p><p><span style=\"display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(34, 34, 34); font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\"><br>Fasilitas yang diperoleh :<br>– Gaji minimal sesuai UMK penempatan<br>– BPJS Kesehatan dan Ketenagakerjaan<br>– THR, lembur, cuti, insentif<br>– Jenjang karir<br>– Kesempatan menjadi karyawan tetap</span></p><p><span style=\"display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(34, 34, 34); font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\"><br>Berkas lamaran yang perlu dibawa saat TES :<br>– Fotocopy</span>    <span style=\"display: inline !important; float: none; background-color: rgb(255, 255, 255); color: rgb(34, 34, 34); font-family: Verdana,Geneva,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\"><br> a. e-KTP/KTP Sementara<br> b. Ijazah<br> c. Kartu Keluarga<br> d. Surat Keterangan Catatan Kepolisian yang masih berlaku<br> e. Surat Keterangan Sehat<br>– Pas photo 4×6 (2 lembar)<br>– Surat lamaran kerja<br>– CV<br></span><b></b><i></i><u></u><sub></sub><sup></sup><strike></strike><br></p>        ', 'Hidden', 'Admin Creative Media', 'Admin Creative Media', '2019-03-14 14:30:45', '2019-03-23 11:50:08'),
(12, 'upload/gambar/Logo_750x750px.jpg', 'Customer Service CREATIVE MEDIA', 'Rp 2 - 5 jt', '<div>Creative Media adalah perusahaan bergerak dalam bidang Industri Kreatif yang menyediakan Layanan atau Jasa : Computer Course &amp; Trainings, Web Development, Branding &amp; Design, Mobile App Development yang berkantor pusat di Surabaya. Profil lengkap kami silahkan mengakses www.creativemedia.id, Kami membuka kesempatan bagi Anda Profesional muda yang mempunyai Integritas Tinggi untuk bergabung bersama kami mengisi posisi : PENGAJAR PHOTOGRAPHY (FREELANCE)<p></p></div><h5 style=\"color: rgb(0, 0, 0);\">Tanggung Jawab Pekerjaan :</h5><div><ul><li>Mengajarkan materi praktek kepada peserta kursus</li><li>Menyelesaikan permasalah siswa terkait kebutuhan fotografi</li><li>Memotivasi peserta kursus untuk belajar lebih giat</li><li>Mengajar sesuai dengan bidang studi yang dikuasai</li><li>Memberikan latihan kepada peserta kursus dan pelatihan</li></ul></div><h5 style=\"color: rgb(0, 0, 0);\">Syarat Pengalaman :</h5><div>Berpengalaman sebagai Photografer Min. 2 Tahun</div><h5 style=\"color: rgb(0, 0, 0);\">Keahlian :</h5><div><p>Menguasai teknik fotografi<br>Mempunyai kemampuan dalam setup camera<br>Menguasai software pendukung fotografi</p></div><h5 style=\"color: rgb(0, 0, 0);\">Kualifikasi :</h5><div><p>Pria / Wanita.<br>Minimum D1 / D3 segala jurusan<br>Menguasai teknik fotografi<br>Berpengalaman minimal 2 tahun sebagai fotografi<br>Mempunyai Camera, Laptop &amp; Kendaraan Sendiri.<br>Siap bekerja paruh waktu<br>Memiliki Portfolio (diutamakan)</p><p>Berkas Lamaran : Pas Foto, CV, Ijazah Terakhir<br>Kirim ke email : hrd@creativemedia.id<br>Subjek : “Pengajar / Trainer Fotografi”</p></div>        ', 'Publish', 'Admin Creative Media', 'Admin Creative Media', '2019-08-06 14:24:09', '2019-08-06 14:45:57'),
(13, 'upload/gambar/no-image.png', 'Administrasi Desain Grafis Wanita', '', '<p>Glory Print merupakan percetakan di Surabaya yang bergerak dalam bidang Pembuatan brosur &amp; Packaging, membutuhkan seorang Administrasi sekaligus yang bisa Desain Grafis dengan Kriteria :</p><ul><li>Wanita</li><li>Usia sekita 20 Tahun</li><li>Nilai Matematika baik</li><li>Teliti</li><li>Cekatan untuk bekerja dalam Team</li><li>Bisa mengoperasikan program corel &amp; photoshop</li></ul><p>Jika kurang mahir tidak masalah, karena nanti ditempat kami bisa memperdalam ilmu sambil bekerja, dengan cara melihat-lihat ribuan contoh brosur &amp; packaging, contoh-contoh tersebut adalah kumpulan desain yang dibuat oleh desainer-desainer di Surabaya yang pernah cetak di tempat kami.</p><p><br></p><p>Pimpinan,<br>Bapak Andi Widjaja<br>0896 - 1216 - 0265</p>', 'Publish', 'CSO Service Nginden', '', '2019-08-21 12:37:35', '0000-00-00 00:00:00'),
(14, 'upload/gambar/ferrari_variasi.png', 'Admin Desain Kreatif', '', '<p>Keahlian :</p><ol><li>Mampu menggunakan aplikasi Ps, Ai, Id software desain dan&nbsp; video grafis.</li><li>Menguasai tool design, khususnya video grafis (adobe premiere, adobe after effect, adobe illustrator, adobe photoshop, corel draw).</li><li>Memiliki skill foto/videografis dan berpengalaman sebagai tim reatif menjadi nilai tambah</li><li>SEO</li></ol><p>Kualifikasi :</p><ol><li>Mampu membuat copy content an copy writing</li><li>Social Media addict</li><li>Inovatif, Kreative, teliti dan memiliki jiwa seni yang tinggi, serta update dengan trend terbaru di dunia digital</li><li>Memiliki skill foto/video grafis dan berpengalaman sebagai tim kreatif menjadi nilai tambah.</li><li>Terbiasa bekerja dengan deadline</li><li>Dapat bekerja dengan team maupun individu</li><li>Siap bekerja dibawah tekanan</li><li>Berkomunikasi dengan baik dan memiliki semangat kerja tinggi</li></ol><p><br></p><p>Silahkan kirimkan lamaran Anda ke :</p><p>Toko Ferrari Variasi&nbsp;</p><p>Jl. Kedungsari no. 95-A, Surabaya</p>', 'Publish', 'CSO Service Nginden', '', '2019-08-24 12:19:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_data`
--

CREATE TABLE `master_data` (
  `id_master` int(30) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `tempat` varchar(200) NOT NULL,
  `tgl_lahir` varchar(100) NOT NULL,
  `jkel` varchar(200) NOT NULL,
  `pekerjaan` varchar(200) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `kota` varchar(200) NOT NULL,
  `kategori` varchar(200) NOT NULL,
  `sket1` varchar(200) NOT NULL,
  `sket2` varchar(200) NOT NULL,
  `sket3` varchar(200) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_data`
--

INSERT INTO `master_data` (`id_master`, `nama`, `tempat`, `tgl_lahir`, `jkel`, `pekerjaan`, `alamat`, `kota`, `kategori`, `sket1`, `sket2`, `sket3`, `created_by`, `updated_by`, `created_date`, `updated_date`, `tanggal`) VALUES
(1, 'Moch Wahyu Sugiarto', 'Surabaya', '18-06-1994', 'LAKI-LAKI', 'PNS', 'JL.PAKIS GUNUNG 1 / 68', 'SURABAYA', 'A-UMUM', '2345', 'XI', '2018', 'Admin Web', 'Moch Wahyu Sugiarto', '2018-11-07 05:11:29', '2018-11-22 04:42:51', '2018-11-07'),
(2, 'Dinda Afria', 'surabaya', '10/10/1994', 'PEREMPUAN', 'SWASTA', 'margorukun baru GG 9/75 ', 'GRESIK', 'A-UMUM', '1234', 'XI', '2018', 'Admin Web', 'Dinda Afria', '2018-11-07 05:28:00', '2018-11-15 08:20:53', '2018-11-07'),
(7, 'Bima Mardianto', '', '11/11/2018', 'LAKI-LAKI', 'SWASTA', 'kembang kuning kulon GG 2/78', 'SURABAYA', 'B2-UMUM', '34', '67', '', 'Admin Web', 'Bima Mardianto', '2018-11-07 05:56:53', '2018-11-14 14:45:34', '2018-11-12'),
(10, 'Ayu sarwinasih', 'madiun', '02/11/2018', 'PEREMPUAN', 'SWASTA', 'Ds.krumutan kec saradan', 'SURABAYA', 'A-UMUM', 'XII', '2018', '', 'Admin Web', 'Ayu sarwinasih', '2018-11-08 11:41:51', '2018-11-14 14:45:49', '2018-11-12'),
(11, 'Ricardo', 'Surabaya', '02/11/2018', 'LAKI-LAKI', 'SWASTA', 'wonokitri besar gg 1/78 ', 'GRESIK', 'B1-UMUM', '12', '56', '', 'Admin Web', 'Ricardo', '2018-11-08 11:42:16', '2018-11-14 14:46:02', '2018-11-12'),
(12, 'Wijanarko', 'Surabaya', '09/08/2018', 'LAKI-LAKI', 'TNI', 'simo pomahan baru barat gg 2/68', 'SURABAYA', 'A-UMUM (PERP)', '123', '2018', '', 'Admin Web', 'Wijanarko', '2018-11-09 13:04:16', '2018-11-14 14:46:17', '2018-11-13'),
(13, 'Putri Rizky Amalia', 'madiun', '06/11/2018', 'PEREMPUAN', 'SWASTA', 'Kmlaten baru barat gg Matahari no 17', 'SURABAYA', 'B1-UMUM (PERP)', '123', '2018', '', 'Admin Web', 'Putri Rizky Amalia', '2018-11-10 02:55:36', '2018-11-14 14:46:37', '2018-11-14'),
(14, 'Fajar Mulya', 'lamongan', '03/05/2018', 'LAKI-LAKI', 'TNI', 'Desa sumber rejo 1/68', 'GRESIK', 'B1', 'xii', '2018', '', 'Admin Web', 'Fajar Mulya', '2018-11-14 08:02:14', '2018-11-14 14:46:50', '2018-11-13'),
(15, 'cika', 'trenggalek', '05/11/2018', 'PEREMPUAN', 'WIRASWASTA', 'dusun banaran 1234', 'GRESIK', 'B1-UMUM', 'xii', '2018', '', 'Admin Web', 'cika', '2018-11-14 08:47:44', '2018-11-14 14:47:05', '2018-11-14'),
(16, 'Johan adi putra', 'surabaya', '03/07/2018', 'LAKI-LAKI', 'SWASTA', 'pakis gunung 1/88 ', 'SURABAYA', 'B2-UMUM', '5678', 'XI', '2018', 'Admin Web', '', '2018-11-15 08:24:48', '0000-00-00 00:00:00', '2018-11-15'),
(17, 'Kaneshia Alindya Prisha', 'surabaya', '11/11/2016', 'PEREMPUAN', 'PNS', 'PAKIS GUNUNG 1/68', 'SURABAYA', 'B1-UMUM', '1234', 'XI', '2018', 'Admin Web', 'Kaneshia Alindya Prisha', '2018-11-15 12:01:02', '2018-11-15 12:02:43', '2018-11-15'),
(18, 'Rica', 'surabaya', '13/11/2018', 'PEREMPUAN', 'SWASTA', 'jl pandadaran 10', 'GRESIK', 'B1', '1234', 'III', '2015', 'admin2', '', '2018-11-16 12:10:38', '0000-00-00 00:00:00', '2018-11-16'),
(19, 'jessica', 'surabaya', '21-05-1998', 'PEREMPUAN', 'SWASTA', 'jalan simo pomahan barat', 'SURABAYA', 'A-UMUM', '1234', 'III', '2018', 'Admin Web', '', '2018-11-22 04:45:16', '0000-00-00 00:00:00', '2018-11-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_akses`
--

CREATE TABLE `menu_akses` (
  `id_menuakses` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `grup_id` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `add` int(11) NOT NULL,
  `edit` int(11) NOT NULL,
  `del` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_akses`
--

INSERT INTO `menu_akses` (`id_menuakses`, `id_menu`, `grup_id`, `view`, `add`, `edit`, `del`) VALUES
(3430, 53, 2, 1, 0, 0, 0),
(3431, 50, 2, 1, 0, 0, 0),
(3432, 41, 2, 1, 1, 1, 1),
(3433, 38, 2, 1, 0, 0, 0),
(3434, 42, 2, 1, 1, 1, 1),
(3435, 55, 2, 1, 1, 1, 1),
(3436, 43, 2, 1, 1, 1, 1),
(3437, 1, 2, 1, 0, 0, 0),
(3438, 44, 2, 1, 1, 1, 1),
(3439, 2, 2, 0, 0, 0, 0),
(3440, 45, 2, 1, 1, 1, 1),
(3441, 46, 2, 1, 1, 1, 1),
(3442, 35, 2, 1, 0, 0, 0),
(3443, 40, 2, 1, 1, 1, 1),
(3444, 36, 2, 1, 1, 1, 1),
(3445, 51, 2, 1, 1, 1, 1),
(3446, 52, 2, 1, 0, 1, 1),
(3447, 54, 2, 1, 1, 1, 1),
(3448, 39, 2, 1, 1, 1, 1),
(3449, 49, 2, 1, 1, 1, 1),
(3450, 47, 2, 1, 1, 1, 1),
(3451, 48, 2, 1, 1, 1, 1),
(3452, 3, 2, 0, 0, 0, 0),
(3453, 4, 2, 0, 0, 0, 0),
(3454, 17, 2, 0, 0, 0, 0),
(3580, 1, 5, 0, 0, 0, 0),
(3581, 50, 5, 0, 0, 0, 0),
(3582, 42, 5, 1, 1, 1, 1),
(3583, 41, 5, 1, 1, 1, 1),
(3584, 53, 5, 0, 0, 0, 0),
(3585, 2, 5, 0, 0, 0, 0),
(3586, 43, 5, 0, 0, 0, 0),
(3587, 44, 5, 1, 1, 1, 1),
(3588, 55, 5, 0, 0, 0, 0),
(3589, 45, 5, 0, 0, 0, 0),
(3590, 46, 5, 0, 0, 0, 0),
(3591, 35, 5, 0, 0, 0, 0),
(3592, 38, 5, 0, 0, 0, 0),
(3593, 36, 5, 0, 0, 0, 0),
(3594, 40, 5, 0, 0, 0, 0),
(3595, 52, 5, 0, 0, 0, 0),
(3596, 51, 5, 0, 0, 0, 0),
(3597, 54, 5, 0, 0, 0, 0),
(3598, 39, 5, 0, 0, 0, 0),
(3599, 49, 5, 0, 0, 0, 0),
(3600, 47, 5, 0, 0, 0, 0),
(3601, 48, 5, 0, 0, 0, 0),
(3602, 3, 5, 0, 0, 0, 0),
(3603, 4, 5, 0, 0, 0, 0),
(3604, 17, 5, 0, 0, 0, 0),
(3655, 1, 4, 0, 0, 0, 0),
(3656, 50, 4, 0, 0, 0, 0),
(3657, 42, 4, 1, 1, 1, 1),
(3658, 41, 4, 1, 1, 1, 1),
(3659, 53, 4, 0, 0, 0, 0),
(3660, 2, 4, 0, 0, 0, 0),
(3661, 43, 4, 1, 1, 1, 1),
(3662, 44, 4, 0, 0, 0, 0),
(3663, 55, 4, 1, 1, 1, 1),
(3664, 45, 4, 1, 0, 0, 0),
(3665, 46, 4, 0, 0, 0, 0),
(3666, 35, 4, 1, 0, 0, 0),
(3667, 38, 4, 1, 0, 0, 0),
(3668, 36, 4, 1, 0, 0, 0),
(3669, 40, 4, 1, 0, 0, 0),
(3670, 52, 4, 1, 0, 0, 0),
(3671, 51, 4, 1, 0, 0, 0),
(3672, 54, 4, 0, 0, 0, 0),
(3673, 39, 4, 0, 0, 0, 0),
(3674, 49, 4, 1, 0, 0, 0),
(3675, 47, 4, 0, 0, 0, 0),
(3676, 48, 4, 1, 0, 0, 0),
(3677, 3, 4, 0, 0, 0, 0),
(3678, 4, 4, 0, 0, 0, 0),
(3679, 17, 4, 0, 0, 0, 0),
(3680, 1, 3, 1, 0, 0, 0),
(3681, 2, 3, 0, 0, 0, 0),
(3682, 44, 3, 1, 1, 1, 1),
(3683, 43, 3, 1, 1, 1, 1),
(3684, 45, 3, 1, 1, 1, 1),
(3685, 55, 3, 1, 1, 1, 1),
(3686, 35, 3, 1, 0, 0, 0),
(3687, 46, 3, 1, 1, 1, 1),
(3688, 50, 3, 1, 0, 0, 0),
(3689, 38, 3, 1, 0, 0, 0),
(3690, 42, 3, 1, 1, 1, 1),
(3691, 41, 3, 1, 1, 1, 1),
(3692, 53, 3, 1, 0, 0, 0),
(3693, 36, 3, 1, 1, 1, 1),
(3694, 40, 3, 1, 1, 1, 1),
(3695, 52, 3, 1, 0, 1, 1),
(3696, 51, 3, 1, 1, 1, 1),
(3697, 54, 3, 1, 1, 1, 1),
(3698, 39, 3, 1, 1, 1, 1),
(3699, 48, 3, 1, 1, 1, 1),
(3700, 49, 3, 1, 1, 1, 1),
(3701, 47, 3, 1, 1, 1, 1),
(3702, 3, 3, 0, 0, 0, 0),
(3703, 4, 3, 0, 0, 0, 0),
(3704, 17, 3, 0, 0, 0, 0),
(3705, 35, 1, 1, 0, 0, 0),
(3706, 45, 1, 1, 1, 1, 1),
(3707, 50, 1, 1, 0, 0, 0),
(3708, 38, 1, 1, 0, 0, 0),
(3709, 53, 1, 1, 0, 0, 0),
(3710, 46, 1, 1, 1, 1, 1),
(3711, 41, 1, 1, 1, 1, 1),
(3712, 55, 1, 1, 1, 1, 1),
(3713, 42, 1, 1, 1, 1, 1),
(3714, 1, 1, 1, 0, 0, 0),
(3715, 43, 1, 1, 1, 1, 1),
(3716, 56, 1, 1, 1, 1, 1),
(3717, 2, 1, 1, 0, 0, 0),
(3718, 44, 1, 1, 1, 1, 1),
(3719, 36, 1, 1, 1, 1, 1),
(3720, 40, 1, 1, 1, 1, 1),
(3721, 51, 1, 1, 1, 1, 1),
(3722, 52, 1, 1, 0, 1, 1),
(3723, 39, 1, 1, 1, 1, 1),
(3724, 54, 1, 1, 1, 1, 1),
(3725, 47, 1, 1, 1, 1, 1),
(3726, 48, 1, 1, 1, 1, 1),
(3727, 49, 1, 1, 1, 1, 1),
(3728, 3, 1, 1, 1, 1, 1),
(3729, 4, 1, 1, 1, 1, 1),
(3730, 17, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(4) NOT NULL,
  `nama_siswa` varchar(50) DEFAULT NULL,
  `bidang_studi` varchar(50) DEFAULT NULL,
  `jumlah` int(4) DEFAULT NULL,
  `tahap` int(4) DEFAULT NULL,
  `kekurangan` varchar(255) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_registrasi` int(255) NOT NULL,
  `no_registrasi` varchar(200) NOT NULL,
  `nama_depan` varchar(50) DEFAULT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL,
  `nama` varchar(300) NOT NULL,
  `ktp` varchar(100) NOT NULL,
  `tempat_lahir` varchar(250) NOT NULL,
  `tanggal_lahir` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `jenis_tinggal` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(50) DEFAULT NULL,
  `handphone` varchar(200) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `kota` varchar(300) NOT NULL,
  `kode_pos` varchar(300) NOT NULL,
  `provinsi` varchar(300) NOT NULL,
  `warganegara` varchar(300) NOT NULL,
  `pendidikan_terakhir` varchar(30) DEFAULT NULL,
  `bidang_studi` varchar(50) DEFAULT NULL,
  `level` varchar(100) NOT NULL,
  `nama_ayah` varchar(200) NOT NULL,
  `nama_ibu` varchar(200) NOT NULL,
  `alamat_ayah` varchar(200) NOT NULL,
  `alamat_ibu` varchar(200) NOT NULL,
  `ktp_ayah` varchar(200) NOT NULL,
  `ktp_ibu` varchar(200) NOT NULL,
  `pekerjaan_ayah` varchar(200) NOT NULL,
  `pekerjaan_ibu` varchar(200) NOT NULL,
  `pendidikan_ayah` varchar(200) NOT NULL,
  `pendidikan_ibu` varchar(200) NOT NULL,
  `tempat_lahir_ayah` varchar(200) NOT NULL,
  `tempat_lahir_ibu` varchar(200) NOT NULL,
  `tggal_lahir_ayah` varchar(200) NOT NULL,
  `tggal_lahir_ibu` varchar(200) NOT NULL,
  `penghasilan_ayah` varchar(200) NOT NULL,
  `penghasilan_ibu` varchar(200) NOT NULL,
  `telpon_ayah` varchar(200) NOT NULL,
  `telpon_ibu` varchar(200) NOT NULL,
  `email_ayah` varchar(200) NOT NULL,
  `email_ibu` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan`
--

CREATE TABLE `pendidikan` (
  `nama` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendidikan`
--

INSERT INTO `pendidikan` (`nama`) VALUES
('SD'),
('SMP'),
('SMA/SMK'),
('DIPLOMA'),
('S1'),
('S2'),
('S3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penghasilan`
--

CREATE TABLE `penghasilan` (
  `nama` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penghasilan`
--

INSERT INTO `penghasilan` (`nama`) VALUES
('>2 Juta'),
('2 Juta - 5 Juta'),
('6 Juta - 10 Juta'),
('<10 Juta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `promo`
--

CREATE TABLE `promo` (
  `id_promo` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `priode_promo` varchar(50) DEFAULT NULL,
  `judul` varchar(300) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(200) NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `updated_by` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `promo`
--

INSERT INTO `promo` (`id_promo`, `gambar`, `priode_promo`, `judul`, `deskripsi`, `status`, `created_by`, `updated_by`, `created_date`, `updated_date`) VALUES
(1, 'upload/gambar/gel_3.jpg', '21-03-2019 - 30-06-2019', 'Telah dibuka Kelas Reguler Gelombang 3', '<p style=\"\">CREATIVE MEDIA t<span style=\"font-family: -apple-system, BlinkMacSystemFont, \" sans-serif;\"=\"\" arial,=\"\" helvetica,=\"\" roboto,=\"\" ui\",=\"\" segoe=\"\">elah membuka Kelas Reguler Gelombang ke- 3.&nbsp; Ayo b</span><span style=\"font-family: -apple-system, BlinkMacSystemFont, \" sans-serif;\"=\"\" arial,=\"\" helvetica,=\"\" roboto,=\"\" ui\",=\"\" segoe=\"\">uruan segera daftarkan diri anda sebelum kuota penuh. Kuota terbatas lhoo !!!</span></p>                ', 'Publish', '', 'Admin Creative Media', '2018-11-29 14:24:55', '2019-03-27 13:56:33'),
(4, 'upload/gambar/49452310_365781570901793_5613095514646047878_n.jpg', '12-11-2018 - 03-12-2018', 'Reguler Class GEL. 2', '<p>Kursus Website Surabaya –&nbsp; Apakah kamu sedang mencari tempat Kursus Website, Web Design dan Webmaster di Surabaya ? Jangan galau karena t<span style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif;\">elah dibuka Kelas Reguler Gel. 2. Ayo b</span><span style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif;\">uruan daftarkan diri anda sebelum kuota penuh. kuota terbatas lhoo !!!</span><br></p>                                        ', 'Publish', 'Admin Creative Media', 'Admin Creative Media', '2019-01-16 09:53:49', '2019-03-08 15:52:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(255) NOT NULL,
  `no_registrasi` varchar(300) NOT NULL,
  `nama_depan` varchar(200) NOT NULL,
  `nama_belakang` varchar(200) NOT NULL,
  `jenis_kelamin` varchar(200) NOT NULL,
  `handphone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `bidang_studi` varchar(100) NOT NULL,
  `jenis_kursus` varchar(100) NOT NULL,
  `kelas` varchar(200) NOT NULL,
  `harga_kursus` varchar(100) NOT NULL,
  `pembayaran` varchar(100) NOT NULL,
  `kekurangan` varchar(100) NOT NULL,
  `status_pembayaran` varchar(100) NOT NULL,
  `status` varchar(200) NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL,
  `tanggal` date NOT NULL,
  `token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `no_registrasi`, `nama_depan`, `nama_belakang`, `jenis_kelamin`, `handphone`, `email`, `alamat`, `username`, `nama`, `bidang_studi`, `jenis_kursus`, `kelas`, `harga_kursus`, `pembayaran`, `kekurangan`, `status_pembayaran`, `status`, `created_by`, `created_date`, `tanggal`, `token`) VALUES
(1, 'CM211', '', '', 'laki-laki', '08989230204', 'muhnailul@gmail.com', 'surabaya', 'CM211', 'nailul abrori', 'Pemrograman Web', 'Class Privat', 'Reguler', '2000000', '1000000', '1000000', 'Lunas', 'Aktif', 'Admin Creative Media', '2021-08-09 14:26:17', '2021-08-09', ''),
(2, 'CM211', '', '', 'laki-laki', '08989230204', 'muhnailul@gmail.com', 'surabaya', '', 'nailul abrori', 'Desain Arsitektur', 'Class Privat', 'Reguler', '2000000', '2000000', '0', 'Lunas', 'Aktif', 'Admin Creative Media', '2021-08-09 14:30:27', '2021-08-09', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_grup`
--

CREATE TABLE `status_grup` (
  `id_status` int(11) NOT NULL,
  `nama` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_grup`
--

INSERT INTO `status_grup` (`id_status`, `nama`) VALUES
(1, 'Unread'),
(2, 'Read'),
(3, 'Aktif'),
(4, 'Belum Aktif'),
(5, 'Hidden'),
(6, 'Publish'),
(7, 'Penuh'),
(8, 'Kosong'),
(9, 'Non Aktif'),
(10, 'Sedang Berjalan'),
(11, 'Cancel'),
(12, 'Selesai'),
(14, 'laki-laki'),
(15, 'perempuan'),
(16, 'Class Privat'),
(17, 'Home Privat '),
(18, 'Lunas'),
(19, 'Belum Lunas'),
(20, 'Reguler'),
(21, 'Profesional '),
(22, 'Executive '),
(23, 'Bersama Orang Tua'),
(24, 'Kos'),
(25, 'Lainnya'),
(26, 'Basic'),
(27, 'Advanced');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bidang_studi`
--

CREATE TABLE `tbl_bidang_studi` (
  `id_bidang_studi` int(11) NOT NULL,
  `nama_bidang_studi` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_bidang_studi`
--

INSERT INTO `tbl_bidang_studi` (`id_bidang_studi`, `nama_bidang_studi`, `created_date`, `updated_date`) VALUES
(1, 'Komputer Umum & Internet', '2021-08-14 06:33:13', '2021-08-14 06:33:13'),
(2, 'Website Blog', '2021-08-14 06:33:13', '2021-08-14 06:33:13'),
(3, 'Administrasi Perkantoran', '2021-08-14 06:34:16', '2021-08-14 06:34:16'),
(4, 'Komputer Akuntansi', '2021-08-14 06:34:16', '2021-08-14 06:34:16'),
(5, 'Desain Grafis', '2021-08-14 06:34:47', '2021-08-14 06:34:47'),
(6, 'Desain Interior', '2021-08-14 06:34:47', '2021-08-14 06:34:47'),
(7, 'Desain Arsitektur', '2021-08-14 06:35:03', '2021-08-14 06:35:03'),
(8, 'Editing Video Multimedia', '2021-08-14 06:35:03', '2021-08-14 06:35:03'),
(9, 'Pemrograman Web', '2021-08-14 06:35:26', '2021-08-14 06:35:26'),
(10, 'Website Desain CMS', '2021-08-14 06:35:26', '2021-08-14 06:35:26'),
(11, 'Pemrograman Java Android', '2021-08-14 06:36:17', '2021-08-14 06:36:17'),
(12, 'Web Designer', '2021-08-14 06:36:17', '2021-08-14 06:36:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `id_invoice` int(11) NOT NULL,
  `no_invoice` varchar(100) NOT NULL,
  `id_pendaftaran` int(11) NOT NULL,
  `tanggal_invoice` date NOT NULL,
  `status_invoice` enum('pending','lunas') NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`id_invoice`, `no_invoice`, `id_pendaftaran`, `tanggal_invoice`, `status_invoice`, `created_date`, `updated_date`) VALUES
(1, 'INV09211', 3, '2021-09-03', 'lunas', '2021-09-03 06:50:55', '2021-09-03 06:50:55'),
(2, 'INV09212', 5, '2021-09-03', 'pending', '2021-09-03 13:42:25', '2021-09-03 13:42:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` varchar(10) NOT NULL,
  `jam_selesai` varchar(10) NOT NULL,
  `pertemuan` int(11) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `status_jadwal` enum('pending','selesai') NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori_kelas`
--

CREATE TABLE `tbl_kategori_kelas` (
  `id_kategori_kelas` int(11) NOT NULL,
  `nama_kategori_kelas` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kategori_kelas`
--

INSERT INTO `tbl_kategori_kelas` (`id_kategori_kelas`, `nama_kategori_kelas`, `created_date`, `updated_date`) VALUES
(1, 'Class Private', '2021-08-16 03:39:55', '2021-08-16 03:39:55'),
(2, 'Home Private', '2021-08-16 03:39:55', '2021-08-16 03:39:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_pendaftaran` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_tentor` int(11) NOT NULL,
  `jumlah_pertemuan` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `status_kelas` enum('berjalan','selesai') NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `id_pendaftaran`, `id_siswa`, `id_tentor`, `jumlah_pertemuan`, `tanggal_mulai`, `tanggal_selesai`, `status_kelas`, `created_date`, `updated_date`) VALUES
(1, 3, 2, 0, 10, '0000-00-00', '0000-00-00', 'berjalan', '2021-09-03 11:23:30', '2021-09-03 11:23:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_level_kelas`
--

CREATE TABLE `tbl_level_kelas` (
  `id_level_kelas` int(11) NOT NULL,
  `nama_level_kelas` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_level_kelas`
--

INSERT INTO `tbl_level_kelas` (`id_level_kelas`, `nama_level_kelas`, `created_date`, `updated_date`) VALUES
(1, 'Basic', '2021-08-14 06:29:49', '2021-08-14 06:29:49'),
(2, 'Advanced', '2021-08-14 06:29:49', '2021-08-14 06:29:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id_login` int(11) NOT NULL,
  `kategori_login` enum('siswa','tentor') NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status_login` enum('belum aktif','aktif') NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_login`
--

INSERT INTO `tbl_login` (`id_login`, `kategori_login`, `username`, `password`, `status_login`, `created_date`, `updated_date`) VALUES
(1, 'siswa', 'muhnailul@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'belum aktif', '2021-08-27 13:23:05', '2021-08-27 13:23:05'),
(2, 'siswa', 'awahyu741@gmail.com', '67668b72b79eb18fb8d24a4c34ad830a', 'aktif', '2021-09-02 16:08:06', '2021-09-02 16:08:06'),
(3, 'siswa', 'awahyu139@yahoo.com', 'f377b8840950362485dadd85ece1584b', 'belum aktif', '2021-09-03 06:54:05', '2021-09-03 06:54:05'),
(4, 'tentor', 'tentor1', 'tentor1', 'aktif', '2021-09-03 11:20:55', '2021-09-03 11:20:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(300) NOT NULL,
  `link` varchar(300) NOT NULL,
  `icon` varchar(300) NOT NULL,
  `parent` int(11) NOT NULL,
  `kode_menu` varchar(100) NOT NULL,
  `menu_file` varchar(100) NOT NULL,
  `urutan` int(11) NOT NULL,
  `last_created_date` datetime NOT NULL,
  `last_update_date` datetime NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `last_update_by` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `nama_menu`, `link`, `icon`, `parent`, `kode_menu`, `menu_file`, `urutan`, `last_created_date`, `last_update_date`, `created_by`, `last_update_by`) VALUES
(1, 'Dashboard', 'Dashboard', 'fa fa-home', 0, 'admin', 'view', 0, '2018-04-20 09:17:58', '2018-05-25 13:41:58', '', 'Moch Wahyu Sugiarto'),
(2, 'Setting', '', 'fa fa-wrench', 0, 'setting', 'view', 10, '2018-04-20 09:19:49', '2018-05-02 12:47:51', '', 'Moch Wahyu Sugiarto'),
(3, 'Master Menu', 'menu', 'fa fa-th-list', 2, 'menu-master', 'view,add,edit,del', 2, '2018-04-20 09:22:00', '2018-04-20 09:54:37', '', ''),
(4, 'Group', 'user-grup', 'fa fa-users', 2, 'user-grup', 'view,add,edit,del', 3, '2018-04-20 09:23:34', '2018-04-20 09:54:06', '', ''),
(17, 'User', 'user', 'fa fa-user', 2, 'user', 'view,add,edit,del', 1, '2018-04-20 10:29:57', '0000-00-00 00:00:00', '', ''),
(35, 'Kategori', '', 'fa  fa-list', 0, 'list-kategori', 'view', 1, '2018-11-06 08:45:59', '2018-11-06 09:35:17', 'Admin web master', 'Admin web master'),
(36, 'Bidang Studi', 'studi', 'fa fa-circle-o', 35, 'studi', 'view,add,edit,del', 1, '2018-11-06 09:34:01', '2018-11-27 08:12:57', 'Admin web master', 'Admin Creative Media'),
(38, 'Master Siswa', '', 'fa fa-user', 0, 'master-data', 'view', 1, '2018-11-06 13:10:07', '2018-12-27 02:34:32', 'Admin Web', 'Admin Creative Media'),
(39, 'Report Siswa', 'report', 'fa fa-circle-o', 53, 'report', 'view,add,edit,del', 1, '2018-11-06 13:18:03', '2018-12-12 07:55:46', 'Admin Web', 'Admin Creative Media'),
(40, 'Kategori Fasilitas', 'kat-fasilitas', 'fa fa-circle-o', 35, 'kat-fasilitas', 'view,add,edit,del', 3, '2018-11-14 14:18:24', '2018-11-28 09:11:50', 'Admin Web', 'Admin Creative Media'),
(41, 'Master Fasilitas', 'fasilitas', 'fa fa-bank', 0, 'fasilitas', 'view,add,edit,del', 2, '2018-11-28 10:30:22', '2018-11-28 10:31:04', 'Admin Creative Media', 'Admin Creative Media'),
(42, 'Master Galeri', 'galeri', 'fa fa-file-image-o', 0, 'galeri', 'view,add,edit,del', 2, '2018-11-29 09:27:15', '2018-11-29 09:37:17', 'Admin Creative Media', 'Admin Creative Media'),
(43, 'Master Promo', 'promo', 'fa fa-gift', 0, 'promo', 'view,add,edit,del', 2, '2018-11-29 12:05:27', '2018-11-29 12:06:22', 'Admin Creative Media', 'Admin Creative Media'),
(44, 'Master Loker', 'loker', 'fa fa-briefcase', 0, 'loker', 'view,add,edit,del', 2, '2018-12-01 03:34:30', '0000-00-00 00:00:00', 'Admin Creative Media', ''),
(45, 'Master Trainer', 'trainer', 'fa fa-users', 0, 'trainer', 'view,add,edit,del', 1, '2018-12-03 04:48:27', '2018-12-27 02:33:51', 'Admin Creative Media', 'Admin Creative Media'),
(46, 'Pendaftaran', 'daftar', 'fa fa-user-plus', 0, 'daftar', 'view,add,edit,del', 0, '2018-12-06 04:11:04', '2018-12-21 04:14:47', 'Admin Creative Media', 'Admin Creative Media'),
(47, 'Calon Siswa', 'calon-siswa', 'fa fa-circle-o', 38, 'calon-siswa', 'view,add,edit,del', 1, '2018-12-06 08:43:29', '0000-00-00 00:00:00', 'Admin Creative Media', ''),
(48, 'Siswa Aktif', 'siswa', 'fa fa-circle-o', 38, 'siswa', 'view,add,edit,del', 2, '2018-12-06 08:44:08', '0000-00-00 00:00:00', 'Admin Creative Media', ''),
(49, 'Alumni Siswa', 'alumni-siswa', 'fa fa-circle-o', 38, 'alumni-siswa', 'view,add,edit,del', 3, '2018-12-06 08:44:40', '0000-00-00 00:00:00', 'Admin Creative Media', ''),
(50, 'Master Penjadwalan', '', 'fa fa-calendar', 0, 'master-jadwal', 'view', 1, '2018-12-10 08:10:23', '2018-12-10 08:12:08', 'Admin Creative Media', 'Admin Creative Media'),
(51, 'Jadwal Aktif', 'jadwal', 'fa fa-circle-o', 50, 'jadwal', 'view,add,edit,del', 1, '2018-12-10 08:13:59', '0000-00-00 00:00:00', 'Admin Creative Media', ''),
(52, 'Jadwal Selesai', 'jadwal-selesai', 'fa fa-circle-o', 50, 'jadwal-selesai', 'view,edit,del', 2, '2018-12-10 08:15:23', '0000-00-00 00:00:00', 'Admin Creative Media', ''),
(53, 'Master Report', '', 'fa fa-book', 0, 'master-report', 'view', 3, '2018-12-12 07:53:56', '0000-00-00 00:00:00', 'Admin Creative Media', ''),
(54, 'Report Pendaftaran', 'report-pendaftaran', 'fa fa-circle-o', 53, 'report-pendaftaran', 'view,add,edit,del', 2, '2018-12-12 08:27:46', '0000-00-00 00:00:00', 'Admin Creative Media', ''),
(55, 'Master Artikel', 'artikel', 'fa fa-newspaper-o', 0, 'artikel', 'view,add,edit,del', 1, '2018-12-27 02:38:12', '0000-00-00 00:00:00', 'Admin Creative Media', ''),
(56, 'Pembayaran', 'pembayaran', 'fa fa-money', 0, 'pembayaran', 'view,add,edit,del', 0, '2021-08-20 14:28:00', '2021-08-20 14:29:35', 'Admin Creative Media', 'Admin Creative Media');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `kode_pembayaran` varchar(100) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `kategori_pembayaran` enum('transfer','cash') NOT NULL,
  `bank` varchar(50) NOT NULL,
  `nomor_rekening` varchar(100) NOT NULL,
  `atas_nama` varchar(250) NOT NULL,
  `nominal` varchar(100) NOT NULL,
  `status_pembayaran` enum('pending','lunas','batal') NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pendaftaran`
--

CREATE TABLE `tbl_pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `no_pendaftaran` varchar(100) NOT NULL,
  `tanggal_pendaftaran` date NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_bidang_studi` int(11) NOT NULL,
  `id_kategori_kelas` int(11) NOT NULL,
  `id_level_kelas` int(11) NOT NULL,
  `harga_kursus` varchar(100) NOT NULL,
  `status_pendaftaran` enum('pending','selesai','batal') NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pendaftaran`
--

INSERT INTO `tbl_pendaftaran` (`id_pendaftaran`, `no_pendaftaran`, `tanggal_pendaftaran`, `id_siswa`, `id_bidang_studi`, `id_kategori_kelas`, `id_level_kelas`, `harga_kursus`, `status_pendaftaran`, `created_date`, `updated_date`) VALUES
(1, 'CM211', '2021-08-27', 1, 9, 1, 1, '1000000', 'pending', '2021-08-27 13:23:05', '2021-09-03 14:24:54'),
(2, 'CM212', '2021-09-02', 2, 2, 1, 1, '1000000', 'selesai', '2021-09-02 16:08:06', '2021-09-02 16:08:06'),
(3, 'CM213', '2021-09-03', 2, 2, 1, 2, '1000000', 'selesai', '2021-09-03 06:50:55', '2021-09-03 06:50:55'),
(4, 'CM214', '2021-09-03', 3, 5, 2, 1, '1000000', 'selesai', '2021-09-03 06:54:05', '2021-09-03 06:54:05'),
(5, 'CM215', '2021-09-03', 3, 2, 2, 1, '1000000', 'pending', '2021-09-03 13:42:25', '2021-09-03 13:42:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penghasilan`
--

CREATE TABLE `tbl_penghasilan` (
  `id_penghasilan` int(11) NOT NULL,
  `penghasilan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_penghasilan`
--

INSERT INTO `tbl_penghasilan` (`id_penghasilan`, `penghasilan`) VALUES
(1, '< 2 Juta'),
(2, '2 Juta - 5 Juta'),
(3, '6 Juta - 10 Juta'),
(4, '< 10 Juta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `nama_siswa` varchar(250) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `ktp` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(100) NOT NULL,
  `jenis_tinggal` varchar(100) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kode_pos` varchar(50) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `warga_negara` varchar(100) NOT NULL,
  `pendidikan_terakhir` varchar(100) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `alamat_ayah` varchar(100) NOT NULL,
  `alamat_ibu` varchar(100) NOT NULL,
  `ktp_ayah` varchar(100) NOT NULL,
  `ktp_ibu` varchar(100) NOT NULL,
  `pekerjaan_ayah` varchar(100) NOT NULL,
  `pekerjaan_ibu` varchar(100) NOT NULL,
  `pendidikan_ayah` varchar(100) NOT NULL,
  `pendidikan_ibu` varchar(100) NOT NULL,
  `tempat_lahir_ayah` varchar(100) NOT NULL,
  `tempat_lahir_ibu` varchar(100) NOT NULL,
  `tanggal_lahir_ayah` date NOT NULL,
  `tanggal_lahir_ibu` date NOT NULL,
  `penghasilan_ayah` varchar(100) NOT NULL,
  `penghasilan_ibu` varchar(100) NOT NULL,
  `telepon_ayah` varchar(100) NOT NULL,
  `telepon_ibu` varchar(100) NOT NULL,
  `email_ayah` varchar(100) NOT NULL,
  `email_ibu` varchar(100) NOT NULL,
  `foto_siswa` varchar(250) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `status_siswa` enum('calon','aktif','tidak aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `id_login`, `nama_siswa`, `jenis_kelamin`, `ktp`, `tempat_lahir`, `tanggal_lahir`, `agama`, `jenis_tinggal`, `telepon`, `email`, `alamat`, `kota`, `kode_pos`, `provinsi`, `warga_negara`, `pendidikan_terakhir`, `nama_ayah`, `nama_ibu`, `alamat_ayah`, `alamat_ibu`, `ktp_ayah`, `ktp_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `pendidikan_ayah`, `pendidikan_ibu`, `tempat_lahir_ayah`, `tempat_lahir_ibu`, `tanggal_lahir_ayah`, `tanggal_lahir_ibu`, `penghasilan_ayah`, `penghasilan_ibu`, `telepon_ayah`, `telepon_ibu`, `email_ayah`, `email_ibu`, `foto_siswa`, `created_date`, `updated_date`, `status_siswa`) VALUES
(1, 1, 'nailul abrori', 'laki-laki', '350901271293002', 'jember', '1993-12-27', 'Islam', 'Bersama Orang Tua', '08989230204', 'muhnailul@gmail.com', 'surabaya', '', '', '', '', 'DIPLOMA', 'aa', '', '', '', '', '', '', '', '', '', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', '', '', '2021-08-27 13:23:05', '2021-09-03 14:24:54', 'calon'),
(2, 2, 'agung', 'laki-laki', '350000', 'jember', '2021-09-05', 'Islam', 'Kos', '909090', 'awahyu741@gmail.com', 'Jl. umbulsari 70, umbulsari, jember', 'jember', '68166', 'jatim', 'indo', 'DIPLOMA', 'aa', 'ss', 'jember', 'jember', '123', '12121', 'aa', 'hhh', 'SMA/SMK', 'DIPLOMA', 'jember', 'jember', '1999-12-12', '2021-09-03', '', '', '099999', '', 'agung@gmail.com', '', '', '2021-09-02 16:08:06', '2021-09-02 16:08:06', 'aktif'),
(3, 3, 'wahyu', 'laki-laki', '', 'jember', '2021-09-07', '', '', '909090', 'awahyu139@yahoo.com', 'jember', '', '', '', '', 'DIPLOMA', '', '', '', '', '', '', '', '', '', '', 'jember', 'jember', '1999-12-12', '2021-09-20', '', '', '', '', '', '', '', '2021-09-03 06:54:05', '2021-09-03 06:54:05', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tentor`
--

CREATE TABLE `tbl_tentor` (
  `id_tentor` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `nama_tentor` varchar(100) NOT NULL,
  `ktp` varchar(100) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `telepon_alternatif` varchar(20) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `lembaga_pendidikan` varchar(100) NOT NULL,
  `tahun_lulus` varchar(50) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `id_bidang_studi` int(11) NOT NULL,
  `status_tentor` enum('aktif','tidak aktif') NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_tentor`
--

INSERT INTO `tbl_tentor` (`id_tentor`, `id_login`, `nama_tentor`, `ktp`, `jenis_kelamin`, `tanggal_lahir`, `tempat_lahir`, `alamat`, `kota`, `provinsi`, `telepon`, `telepon_alternatif`, `pendidikan`, `lembaga_pendidikan`, `tahun_lulus`, `tanggal_masuk`, `id_bidang_studi`, `status_tentor`, `created_date`, `updated_date`) VALUES
(1, 4, 'tentor1', '41180417', 'laki-laki', '2019-09-03', '', '', '', '', '085816908859', '', 'S1-Teknik', 'Universitas Jaya', '2019', '2021-08-01', 1, 'aktif', '2021-09-03 11:20:29', '2021-09-03 11:20:29'),
(2, 0, 'wahyu', '', 'laki-laki', '0000-00-00', '', '', '', '', '', '', '', '', '', '0000-00-00', 0, 'tidak aktif', '2021-09-06 10:46:16', '2021-09-06 10:46:16'),
(3, 0, 'agung', '', 'laki-laki', '0000-00-00', '', '', '', '', '', '', '', '', '', '0000-00-00', 0, 'tidak aktif', '2021-09-06 10:58:17', '2021-09-06 10:58:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trainer`
--

CREATE TABLE `trainer` (
  `id_trainer` int(11) NOT NULL,
  `nama_trainer` varchar(300) NOT NULL,
  `bidang_studi` text NOT NULL,
  `username` varchar(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `gambar` varchar(300) NOT NULL,
  `status` varchar(200) NOT NULL,
  `status_ajar` varchar(200) NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `updated_by` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `tanggal` date NOT NULL,
  `token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `trainer`
--

INSERT INTO `trainer` (`id_trainer`, `nama_trainer`, `bidang_studi`, `username`, `nama`, `gambar`, `status`, `status_ajar`, `created_by`, `updated_by`, `created_date`, `updated_date`, `tanggal`, `token`) VALUES
(5, 'Pak Dicky', 'Desain Grafis,Desain 3D Interior,Editing Video Multimedia,Fotografi', 'dicky', 'Pak Dicky', 'upload/gambar/pak_dicky.jpg', 'Aktif', 'Kosong', 'Admin Creative Media', 'Admin Creative Media', '2019-01-23 11:44:06', '2019-02-21 18:00:01', '2019-01-23', ''),
(6, 'Pak Richard', 'Desain Grafis,Editing Video Multimedia,Fotografi', 'richard', 'Pak Richard', 'upload/gambar/Richard-Angkapranoto.png', 'Aktif', 'Kosong', 'Admin Creative Media', 'Admin Creative Media', '2019-01-23 11:48:40', '2019-03-05 08:57:20', '2019-01-23', ''),
(10, 'Pak Tjioe Sing Fuk', 'Pemrograman Web,Pemrograman Java Android', 'tjioe', 'Pak Tjioe Sing Fuk', 'upload/gambar/Tjioe-Sing-fu.png', 'Aktif', 'Kosong', 'Admin Creative Media', 'Admin Creative Media', '2019-02-12 14:16:00', '2019-02-12 14:16:12', '2019-02-12', ''),
(11, 'Pak Sudarmadji', 'Pemrograman Web,Pemrograman Java Android', 'darma', 'Pak Sudarmadji', 'upload/gambar/Sudarmadji-Creative-Media.png', 'Aktif', 'Kosong', 'Admin Creative Media', 'Admin Creative Media', '2019-02-12 14:17:46', '2019-03-14 20:31:56', '2019-02-12', ''),
(12, 'Pak Agung Arief Perdana P', 'Pemrograman Web,Pemrograman Java Android', 'agung', 'Pak Agung Arief Perdana P', 'upload/gambar/Agung-Arief-P.png', 'Aktif', 'Kosong', 'Admin Creative Media', 'Admin Creative Media', '2019-02-12 14:18:47', '2019-03-14 20:31:39', '2019-02-12', ''),
(13, 'Pak Wahyudi', 'Desain 3D Interior,Desain Arsitektur', 'wahyudi', 'Pak Wahyudi', 'upload/gambar/pak_wahyudi.jpg', 'Aktif', 'Kosong', 'Admin Creative Media', 'Admin Creative Media', '2019-02-12 14:19:33', '2019-03-14 20:32:46', '2019-02-12', ''),
(14, 'Pak M. Akbar B.', 'Desain Grafis', 'akbar', 'Pak M. Akbar B.', 'upload/gambar/Akbar-Creative-Media.png', 'Aktif', 'Kosong', 'Admin Creative Media', 'Admin Creative Media', '2019-02-12 14:19:48', '2019-02-12 14:23:41', '2019-02-12', ''),
(15, 'Pak Bagas Grenadega', 'Desain Grafis,Editing Video Multimedia', 'bagas', 'Pak Bagas Grenadega', 'upload/gambar/Bagas-Grenadega.png', 'Aktif', 'Kosong', 'Admin Creative Media', 'Admin Creative Media', '2019-02-12 14:20:29', '2019-02-12 14:23:58', '2019-02-12', ''),
(16, 'Bu Siti Munawaroh', 'Administrasi Perkantoran', 'siti', 'Bu Siti Munawaroh', 'upload/gambar/bu_siti.jpg', 'Aktif', 'Kosong', 'Admin Creative Media', 'Admin Creative Media', '2019-02-12 14:21:02', '2019-04-01 15:37:12', '2019-02-12', ''),
(17, 'Pak Romi Amirul Hakim', 'Pemrograman Web,Pemrograman Java Android', 'romi', 'Pak Romi Amirul Hakim', 'upload/gambar/Romi.png', 'Aktif', 'Kosong', 'Admin Creative Media', 'Admin Creative Media', '2019-02-12 14:21:23', '2019-02-12 14:21:42', '2019-02-12', ''),
(18, 'Pak Muh. Hafizh Ardhana ', 'Desain 3D Interior', 'hafizh', 'Pak Muh. Hafizh Ardhana ', 'upload/gambar/Hafizh-Creative-Media.png', 'Aktif', 'Kosong', 'Admin Creative Media', 'Admin Creative Media', '2019-02-12 14:22:13', '2019-02-12 14:24:22', '2019-02-12', ''),
(20, 'Bu Rina Andriani', 'Editing Video Multimedia', 'rina', 'Bu Rina Andriani', 'upload/gambar/staf_rina.png', 'Aktif', 'Kosong', 'Admin Creative Media', 'Admin Creative Media', '2019-02-12 14:25:44', '2019-02-12 14:26:01', '2019-02-12', ''),
(21, 'Pak Arfian Bagus Nurmajis', 'Pemrograman Web,Pemrograman Java Android', 'arfian', 'Pak Arfian Bagus Nurmajis', 'upload/gambar/pak_arfian.jpg', 'Aktif', 'Kosong', 'Admin Creative Media', 'Admin Creative Media', '2019-02-12 14:27:34', '2019-02-12 14:28:45', '2019-02-12', ''),
(22, 'Pak Putra Aditya', 'Desain 3D Interior', 'putra', 'Pak Putra Aditya', 'upload/gambar/pak_putra.png', 'Aktif', 'Kosong', 'Admin Creative Media', 'Admin Creative Media', '2019-02-12 14:28:04', '2019-02-12 14:28:31', '2019-02-12', ''),
(23, 'Pak Addin Firdaus Y.', 'Pemrograman Java Android', 'addin', 'Pak Addin Firdaus Y.', 'upload/gambar/pak_adin.jpg', 'Aktif', 'Kosong', 'Admin Creative Media', 'Admin Creative Media', '2019-02-12 14:28:47', '2019-02-12 14:36:47', '2019-02-12', ''),
(24, 'Pak Dyasnata Wirahadi', 'Pemrograman Web', 'dyas', 'Pak Dyasnata Wirahadi', 'upload/gambar/pak_dyas.png', 'Aktif', 'Kosong', 'Admin Creative Media', 'Admin Creative Media', '2019-02-12 14:30:28', '2019-02-12 14:37:12', '2019-02-12', ''),
(25, 'Pak Sugianto', 'Desain Grafis', 'sugi', 'Pak Sugianto', 'upload/gambar/pak_sugi.jpg', 'Aktif', 'Kosong', 'Admin Creative Media', 'Admin Creative Media', '2019-02-12 14:31:43', '2019-02-12 14:36:54', '2019-02-12', ''),
(26, 'Pak Muhammad Fatoni', 'Pemrograman Java Android', 'fatoni', 'Pak Muhammad Fatoni', 'upload/gambar/staf_fatoni.png', 'Aktif', 'Kosong', 'Admin Creative Media', 'Admin Creative Media', '2019-02-12 14:32:01', '2019-03-06 14:35:25', '2019-02-12', ''),
(27, 'Pak Agus Nanang Arif Efendi', 'Desain Grafis,Pemrograman Web,Web Designer', 'arif', 'Pak Agus Nanang Arif Efendi', 'upload/gambar/mas_arif.png', 'Aktif', 'Kosong', 'Admin Creative Media', 'Admin Creative Media', '2019-02-12 14:33:08', '2019-02-12 15:06:49', '2019-02-12', ''),
(28, 'Pak Moch. Wahyu Sugiarto', 'Desain Grafis,Pemrograman Web,Website Desain CMS,Web Designer', 'wahyu', 'Pak Moch. Wahyu Sugiarto', 'upload/gambar/wahyu.jpg', 'Aktif', 'Kosong', 'Admin Creative Media', 'Admin Creative Media', '2019-02-12 14:33:24', '2019-02-12 15:07:17', '2019-02-12', ''),
(29, 'Pak Yogi Poedyantoro', 'Pemrograman Web', 'yogi', 'Pak Yogi Poedyantoro', 'upload/gambar/Yogi-Poedyantoro.png', 'Aktif', 'Kosong', 'Admin Creative Media', 'Admin Creative Media', '2019-02-12 14:35:10', '2019-02-12 14:37:30', '2019-02-12', ''),
(30, 'Pak Muhammad Jeffry', 'Desain Grafis', 'jeffry', 'Pak Muhammad Jeffry', 'upload/gambar/M_-jeffry.png', 'Aktif', 'Kosong', 'Admin Creative Media', 'Admin Creative Media', '2019-02-12 14:40:26', '2019-02-21 18:00:55', '2019-02-12', ''),
(31, 'Bu Aisyah', 'Komputer Umum & Internet,Administrasi Perkantoran,Komputer Akuntansi', 'Aisyah', 'Bu Aisyah', 'upload/gambar/bu_aisyah.png', 'Aktif', 'Kosong', 'Admin Creative Media', 'Admin Creative Media', '2019-03-09 08:59:17', '2019-03-09 09:36:42', '2019-03-09', ''),
(32, 'Bu Anggun', 'Administrasi Perkantoran,Komputer Akuntansi', 'Anggun', 'Bu Anggun', 'upload/gambar/bu_anggun.png', 'Aktif', 'Kosong', 'Admin Creative Media', 'Admin Creative Media', '2019-03-09 09:06:07', '2019-03-09 09:37:06', '2019-03-09', ''),
(33, 'Bu Septian', 'Administrasi Perkantoran', 'Septian', 'Bu Septian', 'upload/gambar/bu_septian.png', 'Aktif', 'Kosong', 'Admin Creative Media', 'Admin Creative Media', '2019-03-09 09:08:11', '2019-03-16 10:08:17', '2019-03-09', ''),
(34, 'Pak Frangky', 'Komputer Umum & Internet,Administrasi Perkantoran,Pemrograman Web,Website Desain CMS,Web Designer', 'frangky', 'Pak Frangky', 'upload/gambar/pak_frengky.png', 'Aktif', 'Kosong', 'Admin Creative Media', 'Admin Creative Media', '2019-03-09 09:09:52', '2019-03-09 09:19:33', '2019-03-09', ''),
(35, 'Bu Tika', 'Desain Grafis,Editing Video Multimedia,Website Desain CMS', 'Tika', 'Bu Tika', 'upload/gambar/bu_tika.png', 'Aktif', 'Kosong', 'Admin Creative Media', 'Admin Creative Media', '2019-03-09 09:10:16', '2019-03-09 09:36:25', '2019-03-09', ''),
(36, 'Pak Herlambang', 'Administrasi Perkantoran,Pemrograman Web,Website Desain CMS,Pemrograman Java Android,Web Designer', 'herlambang', 'Pak Herlambang', 'upload/gambar/pak_herlambang.png', 'Aktif', 'Kosong', 'Admin Creative Media', 'Admin Creative Media', '2019-03-09 09:11:38', '2019-03-09 09:20:09', '2019-03-09', ''),
(37, 'Pak Kurniawan', 'Desain Grafis,Editing Video Multimedia,Fotografi', 'kurniawan', 'Pak Kurniawan', 'upload/gambar/pak_kurniawan.png', 'Aktif', 'Kosong', 'Admin Creative Media', 'Admin Creative Media', '2019-03-09 09:13:43', '2019-03-09 09:20:35', '2019-03-09', ''),
(38, 'Pak Ali', 'Website Blog,Administrasi Perkantoran,Desain Grafis,Editing Video Multimedia,Pemrograman Web,Website Desain CMS,Web Designer,Fotografi', 'ali', 'Pak Ali', 'upload/gambar/pak_ali.png', 'Aktif', 'Kosong', 'Admin Creative Media', 'Admin Creative Media', '2019-03-09 09:13:54', '2019-03-09 09:21:02', '2019-03-09', ''),
(39, 'Pak Tommy', 'Administrasi Perkantoran,Desain Grafis,Editing Video Multimedia,Fotografi', 'tommy', 'Pak Tommy', 'upload/gambar/pak_tommy.png', 'Aktif', 'Kosong', 'Admin Creative Media', 'Admin Creative Media', '2019-03-09 09:16:27', '2019-03-09 09:21:20', '2019-03-09', ''),
(40, 'Pak Johanes', 'Administrasi Perkantoran,Komputer Akuntansi,Pemrograman Web,Website Desain CMS,Pemrograman Java Android,Web Designer', 'johanes', 'Pak Johanes', 'upload/gambar/pak_yohanes.png', 'Aktif', 'Kosong', 'Admin Creative Media', 'Admin Creative Media', '2019-03-09 09:18:59', '2019-03-14 20:26:11', '2019-03-09', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indeks untuk tabel `bidang_studi`
--
ALTER TABLE `bidang_studi`
  ADD PRIMARY KEY (`id_studi`);

--
-- Indeks untuk tabel `calon_siswa`
--
ALTER TABLE `calon_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indeks untuk tabel `fasilitas_tipe`
--
ALTER TABLE `fasilitas_tipe`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indeks untuk tabel `grup`
--
ALTER TABLE `grup`
  ADD PRIMARY KEY (`grup_id`);

--
-- Indeks untuk tabel `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `loker`
--
ALTER TABLE `loker`
  ADD PRIMARY KEY (`id_loker`);

--
-- Indeks untuk tabel `master_data`
--
ALTER TABLE `master_data`
  ADD PRIMARY KEY (`id_master`);

--
-- Indeks untuk tabel `menu_akses`
--
ALTER TABLE `menu_akses`
  ADD PRIMARY KEY (`id_menuakses`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_registrasi`);

--
-- Indeks untuk tabel `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id_promo`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `status_grup`
--
ALTER TABLE `status_grup`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `tbl_bidang_studi`
--
ALTER TABLE `tbl_bidang_studi`
  ADD PRIMARY KEY (`id_bidang_studi`);

--
-- Indeks untuk tabel `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indeks untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `tbl_kategori_kelas`
--
ALTER TABLE `tbl_kategori_kelas`
  ADD PRIMARY KEY (`id_kategori_kelas`);

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tbl_level_kelas`
--
ALTER TABLE `tbl_level_kelas`
  ADD PRIMARY KEY (`id_level_kelas`);

--
-- Indeks untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indeks untuk tabel `tbl_penghasilan`
--
ALTER TABLE `tbl_penghasilan`
  ADD PRIMARY KEY (`id_penghasilan`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tbl_tentor`
--
ALTER TABLE `tbl_tentor`
  ADD PRIMARY KEY (`id_tentor`);

--
-- Indeks untuk tabel `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`id_trainer`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `bidang_studi`
--
ALTER TABLE `bidang_studi`
  MODIFY `id_studi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `calon_siswa`
--
ALTER TABLE `calon_siswa`
  MODIFY `id_siswa` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `fasilitas_tipe`
--
ALTER TABLE `fasilitas_tipe`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `grup`
--
ALTER TABLE `grup`
  MODIFY `grup_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `hari`
--
ALTER TABLE `hari`
  MODIFY `id_hari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `loker`
--
ALTER TABLE `loker`
  MODIFY `id_loker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `master_data`
--
ALTER TABLE `master_data`
  MODIFY `id_master` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `menu_akses`
--
ALTER TABLE `menu_akses`
  MODIFY `id_menuakses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3731;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_registrasi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `promo`
--
ALTER TABLE `promo`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `status_grup`
--
ALTER TABLE `status_grup`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tbl_bidang_studi`
--
ALTER TABLE `tbl_bidang_studi`
  MODIFY `id_bidang_studi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori_kelas`
--
ALTER TABLE `tbl_kategori_kelas`
  MODIFY `id_kategori_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_level_kelas`
--
ALTER TABLE `tbl_level_kelas`
  MODIFY `id_level_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_penghasilan`
--
ALTER TABLE `tbl_penghasilan`
  MODIFY `id_penghasilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_tentor`
--
ALTER TABLE `tbl_tentor`
  MODIFY `id_tentor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `trainer`
--
ALTER TABLE `trainer`
  MODIFY `id_trainer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
