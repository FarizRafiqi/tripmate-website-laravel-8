-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2020 at 01:10 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tripmate`
--

-- --------------------------------------------------------

--
-- Table structure for table `airlines`
--

CREATE TABLE `airlines` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_iata` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kota` int(10) UNSIGNED NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `airlines`
--

INSERT INTO `airlines` (`id`, `kode_iata`, `logo`, `nama`, `id_kota`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'GA', 'Garuda.png', 'Garuda Indonesia', 1, 'Tiket pesawat Garuda Indonesia selalu dicari oleh calon penumpang yang menginginkan perjalanan dengan penerbangan yang berkelas. Karena Garuda Indonesia adalah maskapai kebanggaan Indonesia yang telah mendapatkan penghargaan bintang 5 dari Skytrax, tidak diragukan lagi, mereka tentu memberi layanan kelas dunia.   Didirikan pada tahun 1947 sebagai KLM Interinsulair Bedrijf, maskapai ini sekarang menjadi maskapai besar dan anggota ke-20 dari aliansi maskapai global SkyTeam. Mulanya, maskapai ini bernama “Indonesian Airways,” kemudian berganti menjadi “Garuda Indonesia Airways”. Nama “Garuda” diusulkan oleh presiden pertama Republik Indonesia, Ir. Soekarno, dengan harapan bahwa maskapai ini bisa terbang melintasi langit Nusantara seperti Burung Garuda milik Dewa Wisnu. Maskapai ini berkantor pusat di Bandara Internasional Soekarno-Hatta di Tangerang.  Garuda Indonesia menawarkan penerbangan dengan kabin yang bersih dan kru yang ramah dan berkelas. Selain itu, tersedia makanan lezat untuk dinikmati oleh penumpang selama penerbangan, mulai dari makanan khas Indonesia, Asia, sampai makanan Western.  Konsep layanan Garuda Indonesia Experience akan membuat kamu merasakan keramahan khas Indonesia ke mana pun kamu terbang. Selain itu, beragam ikon khas Indonesia juga hadir, seperti ornamen dalam pesawat, seragam kru kabin, serta wewangian khas Indonesia.', '2020-09-28 17:51:58', NULL),
(2, 'JT', 'Lion.png', 'Lion Air', 1, 'Lion Air adalah maskapai penerbangan yang berbasis di Indonesia yang dikenal luas sebagai maskapai tipe Low Cost Carrier (LCC). Didirikan pada tahun 1999 oleh kakak beradik Rusdi dan Rusnan Kirana, Lion Airlines menjadi LCC pertama di Indonesia sejak penerbangan pertamanya di 30 Juni 2000. Dua dekade setelahnya, Lion Air sudah menyediakan rute penerbangan yang mencakup lebih dari 183 destinasi domestik maupun internasional.   Maskapai yang berbasis di Jakarta ini merupakan maskapai swasta terbesar di Indonesia serta maskapai berbiaya rendah terbesar kedua di Asia Tenggara setelah AirAsia. Lion Air mengoperasikan rute domestik dan internasional, yang menghubungkan berbagai tujuan dari Indonesia ke Singapura, Filipina, Malaysia, Thailand, Australia, India, Jepang, dan Arab Saudi, serta rute charter ke Cina, Hong Kong, Korea Selatan, dan Makau, dengan lebih dari 630 penerbangan per hari.   Dengan slogan kebanggaan “We make people fly,” Lion Air terus memberikan layanan kelas atas kepada penumpangnya dari tahun ke tahun. Hal ini bisa dilihat dari berbagai penghargaan yang diperoleh Lion Air, seperti Skytrax World Airline Awards sebagai World’s Best Low-cost Airline Cabin dan World’s Best Low-cost Premium Seat.    Kelas Penerbangan Lion Air Beli tiket pesawat Lion Air dengan kelas penerbangan yang kamu inginkan. Lion Air menyediakan dua kelas penerbangan, yaitu penerbangan kelas ekonomi dan penerbangan kelas bisnis. Berikut informasi lengkapnya:  Kelas Ekonomi Fasilitas Ruang kaki 28 - 32 inci. Kursi berlapis bahan kulit yang nyaman.  Makanan di Pesawat Makanan dan minuman (dengan biaya tambahan).  Armada Kelas Ekonomi Boeing 737-900ER  Boeing 737-800NG Boeing 747-400  Airbus A330-300  Kelas Bisnis Fasilitas Ruang kaki 38 inci. Ruang yang lebih besar dan nyaman Kursi berlapis bahan kulit yang nyaman.  Makanan di Pesawat Makanan khas Indonesia gratis (kerja sama dengan Lion Boga).  Armada Kelas Bisnis Boeing 737-900ER  Program Loyalitas Lion Air Selalu menggunakan Lion Air sebagai maskapai penerbangan, tentunya ada banyak keuntungan yang bisa kamu dapatkan. Salah satunya adalah kesempatan untuk menjadi anggota dari program Lion Air frequent flyer. Tersedia keanggotaan Lion Air Passport yang bisa diikuti oleh semua penumpang setia Lion Air. Program ini bisa memberikan keuntungan bagi penumpang melalui penukaran miles dengan beragam hadiah menarik, yaitu:  Lion Air miles yang dapat ditukar dengan tiket pesawat gratis. Alokasi bagasi check-in yang meningkat. Prioritas check-in di bandara. Prioritas boarding khusus Kelas Ekonomi. Akses lounge pribadi.  Beli Tiket Pesawat Lion Air di tiket.com Segera pesan tiket Lion Air promo dari tiket.com. Beragam pilihan rute dan jadwal penerbangan Lion Air bisa kamu cek dan bandingkan secara langsung di tiket.com. Download dan install aplikasi tiket.com langsung di Google Play Store dan App Store untuk mendapatkan informasi promo tiket pesawat setiap hari. Kamu juga bisa dengan mudah mengecek jadwal penerbangan Lion Air secara langsung dari aplikasi tiket.com. Atau kamu bisa mengeceknya di website resmi tiket.com. Dapatkan pengalaman memesan tiket pesawat Lion Air di tiket.com dengan cepat, mudah, dan banyak promo.  Mau ke mana? Semua ada tiketnya!   Layanan Pelanggan Lion Air Nomor telepon: (021) 6379 8000 (021) 633 5669 (Faks)  Alamat: Lion Air Tower, Jl. Gajah Mada No. 7 Jakarta, Indonesia.  Email: customercare@lionair.co.id Kode Maskapai Penerbangan Lion Air Kode IATA: JT  Kode ICAO: LNI  Kode panggil: LION INTER', '2020-10-11 15:26:23', NULL),
(3, 'QG', 'Citilink.png', 'Citilink', 1, 'Ingin melakukan perjalanan yang nyaman dengan tiket pesawat yang murah? Pesan tiket pesawat Citilink dari tiket.com saja! Citilink merupakan salah satu maskapai low cost carrier (LCC) terbaik Indonesia yang tiketnya selalu diburu para penumpang. Meskipun harganya murah, maskapai yang terkenal dengan warna hijaunya ini juga memberikan pelayanan yang tak kalah nyaman dan memuaskan.  Maskapai ini berdiri sejak tahun 2001 sebagai anak perusahaan Garuda Indonesia. Namun, Sejak 30 Juli 2012, Citilink secara resmi beroperasi sebagai entitas bisnis yang terpisah dari Garuda Indonesia. Citilink beroperasi secara mandiri dengan callsign, kode penerbangan, logo, dan seragam sendiri. Basis utama maskapai ini adalah Bandara Internasional Soekarno-Hatta dan Bandara Internasional Juanda.  Citilink sudah mencapai 35 kota dengan 70 rute saat ini. Citilink Indonesia setia melayani para penumpang dalam kurang lebih 270 penerbangan setiap harinya. Tak lupa, para pramugari dan pramugara juga sering menyelipkan humor dalam informasi penerbangan atau instruksi keselamatan. Citilink memiliki visi untuk menjadi maskapai penerbangan berbiaya rendah terkemuka dengan menyediakan layanan transportasi udara terjadwal, berbiaya rendah, dan berfokus pada keselamatan. Ini yang menjadikan penerbangan Citilink berbeda dari yang lainnya. Cari tahu lebih banyak tentang Citilink Airline, jadwal penerbangan, dan promonya di tripmate', '2020-10-11 15:26:30', NULL),
(4, 'IW', 'WingsAir.png', 'Wings Air', 1, 'Wings Air adalah salah satu anak perusahaan Lion Air Group yang terkenal sebagai maskapai berbiaya rendah yang menerbangkan pesawat berbadan kecil. Berdiri sejak tahun 2003, Wings Air sering menjadi pesawat penghubung untuk maskapai lain yang juga berada dalam grup Lion Air, yaitu, Batik Air, Malindo Air, dan Lion Air.   Kini, Wings Air telah mencapai lebih dari 52 rute penerbangan internasional dan domestik jika digabungkan. Tentunya menjadi pilihan yang tepat bagi kamu yang ingin berwisata ke kota-kota di Indonesia dengan durasi pendek dan harga yang terjangkau. Meskipun termasuk maskapai berbiaya rendah yang hanya menyediakan kelas ekonomi, Wings Air tetap menyediakan fasilitas jatah bagasi gratis bagi para penumpangnya untuk rute internasional. Maskapai ini berhasil meraih sertifikasi IATA Standard Safety Assessment (ISSA) pada tahun 2015 dan IATA Operational Safety Audit (IOSA) pada tahun 2017.  Dengan warna merah putih dan lambang sayapnya, Wings Air selalu mengedepankan keamanan penumpang dan penerbangannya setiap saat. Terdengar seperti maskapai yang tepat bagimu? Ayo pesan tiket Wing Air sekarang!', '2020-10-11 15:26:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `airports`
--

CREATE TABLE `airports` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_iata` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kota` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `airports`
--

INSERT INTO `airports` (`id`, `kode_iata`, `nama`, `id_kota`, `created_at`, `updated_at`) VALUES
(2, 'CGK', 'Soekarno Hatta', 1, '2020-09-28 07:43:11', NULL),
(3, 'HLP', 'Halim Perdana Kusuma', 1, '2020-09-28 17:53:29', NULL),
(4, 'WYK', 'Gatot Subroto', 2, '2020-10-11 15:16:49', '0000-00-00 00:00:00'),
(5, 'TKG', 'Raden Inten II', 2, '0000-00-00 00:00:00', NULL),
(6, 'JOG', 'Adi Sutjipto', 7, '2020-10-11 15:16:49', NULL),
(7, 'YIA', 'Yogjakarta Kulon Progo', 7, '2020-10-11 15:16:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` enum('Nanggroe Aceh Darusalam','Bali','Bangka Belitung','Banten','Bengkulu','Daerah Istimewa Yogyakarta','Daerah Khusus Ibukota Jakarta','Gorontalo','Jambi','Jawa Barat','Jawa Tengah','Jawa Timur','Kalimantan Barat','Kalimantan Tengah','Kalimantan Timur','Kalimatan Utara','Kalimantan Selatan','Kepulauan Riau','Lampung','Maluku','Maluku Utara','Nusa Tenggara Barat','Nusa Tenggara Timur','Papua','Papua Barat','Sulawesi Barat','Sulawesi Selatan','Sulawesi Tengah','Sulawesi Tenggara','Sulawesi Utara','Sumatra Barat','Sumatra Selatan','Sumatra Utara','Riau') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `nama`, `provinsi`, `created_at`, `updated_at`) VALUES
(1, 'Jakarta', 'Daerah Khusus Ibukota Jakarta', '2020-09-28 07:42:48', NULL),
(2, 'Bandar Lampung', 'Lampung', '2020-10-01 06:16:18', NULL),
(4, 'Surabaya', 'Jawa Timur', '2020-10-11 15:10:15', NULL),
(5, 'Medan', 'Sumatra Utara', '2020-10-11 15:10:15', NULL),
(6, 'Makassar', 'Sulawesi Selatan', '2020-10-11 15:10:15', NULL),
(7, 'Yogyakarta', 'Daerah Istimewa Yogyakarta', '2020-10-11 15:10:15', NULL),
(8, 'Denpasar-Bali', 'Bali', '2020-10-11 15:10:15', NULL),
(9, 'Padang', 'Sumatra Barat', '2020-10-11 15:10:15', NULL),
(10, 'Palembang', 'Sumatra Selatan', '2020-10-11 15:10:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `nama`, `icon`) VALUES
(1, 'Bagasi', 'fas fa-suitcase'),
(2, 'Makanan', 'fas fa-utensils'),
(3, 'Hiburan', 'fas fa-photo-video');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `id` char(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pesawat` int(10) UNSIGNED NOT NULL,
  `id_bandara_asal` int(10) UNSIGNED NOT NULL,
  `id_bandara_tujuan` int(10) UNSIGNED NOT NULL,
  `durasi` time NOT NULL,
  `waktu_berangkat` datetime NOT NULL,
  `waktu_tiba` datetime NOT NULL,
  `kecepatan_rata_rata` double(8,2) DEFAULT NULL,
  `jarak_perjalanan` double(8,2) DEFAULT NULL,
  `kelas` enum('ekonomi','premium ekonomi','bisnis','first') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`id`, `id_pesawat`, `id_bandara_asal`, `id_bandara_tujuan`, `durasi`, `waktu_berangkat`, `waktu_tiba`, `kecepatan_rata_rata`, `jarak_perjalanan`, `kelas`) VALUES
('GA-1234', 2, 2, 3, '02:00:00', '2020-10-11 09:33:43', '2020-10-11 14:00:00', 500.00, 550.00, 'ekonomi'),
('GA-1235', 1, 2, 3, '02:00:00', '2020-10-11 08:00:00', '2020-10-11 12:00:00', 500.00, 500.00, 'premium ekonomi'),
('GA-1236', 3, 3, 6, '02:00:00', '2020-10-11 23:36:40', '2020-10-11 20:00:00', 600.00, 320.00, 'ekonomi'),
('GA-1237', 4, 6, 3, '01:30:00', '2020-10-11 20:00:00', '2020-10-11 22:00:00', 550.00, 320.00, 'ekonomi'),
('GA-1238', 5, 2, 5, '02:00:00', '2020-10-11 21:30:00', '2020-10-11 23:30:00', 450.00, 320.00, 'premium ekonomi'),
('GA-1239', 5, 2, 5, '02:00:00', '2020-10-11 05:10:00', '2020-10-11 07:10:00', 400.00, 550.00, 'bisnis'),
('GA-8976', 1, 2, 3, '02:00:00', '2020-10-11 10:20:28', '2020-10-09 14:00:00', 600.00, 500.00, 'bisnis');

-- --------------------------------------------------------

--
-- Table structure for table `flight_details`
--

CREATE TABLE `flight_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_penerbangan` char(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `id_fasilitas` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flight_details`
--

INSERT INTO `flight_details` (`id`, `id_penerbangan`, `harga`, `id_fasilitas`) VALUES
(1, 'GA-1234', '400000.00', 1),
(2, 'GA-1235', '600000.00', 1),
(3, 'GA-1235', '600000.00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2020_09_25_144456_create_planes_table', 1),
(8, '2020_09_25_151450_create_airlines_table', 2),
(9, '2020_09_26_012943_create_airports_table', 3),
(10, '2020_09_26_015530_create_cities_table', 4),
(12, '2020_09_26_021055_create_airports_table', 5),
(13, '2020_09_26_031901_create_airports_table', 6),
(14, '2020_09_26_032758_create_airlines_table', 7),
(15, '2020_09_26_034731_create_cities_table', 8),
(16, '2020_09_26_034946_create_airports_table', 9),
(17, '2020_09_26_035044_create_airlines_table', 9),
(18, '2020_09_26_082350_create_planes_table', 10),
(19, '2020_09_26_084402_create_flights_table', 11),
(20, '2020_09_26_084759_create_flights_table', 12),
(21, '2020_09_28_012235_drop_flights_timestamp_column', 13),
(22, '2020_09_28_014744_create_cities_table', 14),
(23, '2020_09_28_014938_create_airports_table', 15),
(24, '2020_09_28_015017_create_airlines_table', 15),
(25, '2020_09_28_015142_create_planes_table', 15),
(26, '2020_09_28_015327_create_flights_table', 15),
(28, '2020_09_28_021317_create_user_roles_table', 16),
(29, '2020_09_28_023425_modify_users_table', 17),
(30, '2020_09_28_023651_create_user_roles_table', 18),
(31, '2020_09_28_024454_create_user_roles_table', 19),
(32, '2020_09_28_024617_modify_users_table', 19),
(33, '2020_09_28_025031_modify_users_table', 20),
(34, '2020_09_28_032449_create_cities_table', 21),
(35, '2020_09_28_032532_create_airports_table', 22),
(36, '2020_09_28_033107_create_airlines_table', 23),
(37, '2020_09_28_033230_create_planes_table', 24),
(38, '2020_09_28_033455_create_planes_table', 25),
(39, '2020_09_28_033555_create_flights_table', 26),
(40, '2020_09_28_043052_create_user_roles_table', 27),
(41, '2020_09_28_043136_modify_users_table', 28),
(42, '2020_09_28_043414_modify_users_table', 29),
(43, '2020_09_28_082342_modify_users_table', 30),
(44, '2020_09_28_085728_create_flights_table', 31),
(45, '2020_09_28_090004_create_flights_table', 32),
(46, '2020_09_28_090137_create_flights_table', 33),
(47, '2020_10_01_055901_add_description_column_of_airlines_table', 34),
(48, '2020_10_01_060434_add_description_column_of_airlines_table', 35),
(49, '2020_10_01_070015_modify_flights_table', 36),
(50, '2020_10_01_070640_modify_flights_table', 37),
(51, '2020_10_08_064725_create_facilities_table', 38),
(52, '2020_10_08_064914_create_flight_details_table', 39),
(53, '2020_10_11_030233_create_flight_classes_table', 40),
(54, '2020_10_11_032430_modify_flight_details_table', 41),
(55, '2020_10_11_051724_create_flight_details_table', 42),
(56, '2020_10_11_051938_add_cabin_class_column_to_flights_table', 43);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `planes`
--

CREATE TABLE `planes` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_maskapai` int(10) UNSIGNED NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_kursi` int(11) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `planes`
--

INSERT INTO `planes` (`id`, `id_maskapai`, `gambar`, `model`, `jumlah_kursi`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 1, '', 'Airbus A330-300', 100, NULL, '2020-09-29 01:25:52', NULL),
(2, 1, '', 'Boeing 777-300ER', 80, NULL, '2020-10-01 06:55:04', NULL),
(3, 1, '', 'Boeing 737-800', 180, NULL, '2020-10-11 15:38:09', NULL),
(4, 1, '', 'Airbus A330-200', 100, NULL, '2020-10-11 15:37:46', NULL),
(5, 1, '', 'Boeing 737 Max 8', 135, NULL, '2020-10-11 15:37:46', NULL),
(6, 1, '', 'Boeing 737-800NG', 150, NULL, '2020-10-11 15:37:46', NULL),
(7, 1, '', 'CRJ1000 NextGen', 120, NULL, '2020-10-11 15:37:46', NULL),
(8, 1, '', 'ATR 72-600', 130, NULL, '2020-10-11 15:37:46', NULL),
(9, 3, '', 'Airbus A320neo', 100, NULL, '2020-10-11 15:39:21', NULL),
(10, 3, '', 'Airbus A330-900neo', 140, NULL, '2020-10-11 15:39:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_role` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `gambar`, `nama`, `email`, `email_verified_at`, `password`, `remember_token`, `no_telp`, `id_role`, `status`, `created_at`, `updated_at`) VALUES
('C13424', 'https://lorempixel.com/100/100/people/?87383', 'Nasab Hutapea', 'astuti.galang@example.net', '2020-10-11 10:23:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Aq21pwvDSX', '087500960872', 3, 0, '2020-10-11 10:23:45', '2020-10-11 10:23:45'),
('C18982', 'https://lorempixel.com/100/100/people/?46458', 'Saka Dongoran', 'budi48@example.net', '2020-10-11 10:23:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'uPThLHsDFB', '08134168391', 3, 0, '2020-10-11 10:23:45', '2020-10-11 10:23:45'),
('C27243', 'https://lorempixel.com/100/100/people/?30270', 'Bakiman Sihombing M.Kom.', 'umay.mulyani@example.com', '2020-10-11 10:23:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'lOSulhvXUv', '085668413736', 3, 0, '2020-10-11 10:23:45', '2020-10-11 10:23:45'),
('C39077', 'https://lorempixel.com/100/100/people/?72542', 'Liman Kuswoyo', 'kariman46@example.net', '2020-10-11 10:23:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'YAaSmv1Qiw', '08469244394', 3, 0, '2020-10-11 10:23:44', '2020-10-11 10:23:44'),
('C50758', 'https://lorempixel.com/100/100/people/?37752', 'Warta Nugroho', 'zulkarnain.agnes@example.net', '2020-10-11 10:23:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ikLjd0DpRM', '083471294609', 3, 0, '2020-10-11 10:23:45', '2020-10-11 10:23:45'),
('C63478', 'https://lorempixel.com/100/100/people/?34163', 'Maria Aryani S.Pt', 'ani.uyainah@example.org', '2020-10-11 10:23:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'kc4Mmcbu8x', '081286057162', 3, 0, '2020-10-11 10:23:44', '2020-10-11 10:23:44'),
('C81537', 'https://lorempixel.com/100/100/people/?56763', 'Rahman Nashiruddin', 'eman52@example.org', '2020-10-11 10:23:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0zPmmi50lA', '087801945837', 3, 0, '2020-10-11 10:23:45', '2020-10-11 10:23:45'),
('C87685', 'https://lorempixel.com/100/100/people/?82709', 'Prayitna Ramadan', 'puspa38@example.org', '2020-10-11 10:23:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'DEPWKQuk8F', '089314440161', 3, 0, '2020-10-11 10:23:45', '2020-10-11 10:23:45'),
('C88138', 'https://lorempixel.com/100/100/people/?32413', 'Lantar Napitupulu', 'kamaria97@example.net', '2020-10-11 10:23:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MNk6ygAiS6', '084698850128', 3, 0, '2020-10-11 10:23:44', '2020-10-11 10:23:44'),
('C94437', 'https://lorempixel.com/100/100/people/?46039', 'Cager Wasita', 'calista.wacana@example.com', '2020-10-11 10:23:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'qwVudqnehw', '082630896881', 3, 0, '2020-10-11 10:23:44', '2020-10-11 10:23:44');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2020-10-11 15:44:59', NULL),
(2, 'operator', '2020-10-11 15:44:59', NULL),
(3, 'customer', '2020-10-11 15:44:59', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airlines`
--
ALTER TABLE `airlines`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `airlines_kode_iata_unique` (`kode_iata`),
  ADD KEY `airlines_id_kota_foreign` (`id_kota`);

--
-- Indexes for table `airports`
--
ALTER TABLE `airports`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `airports_kode_iata_unique` (`kode_iata`),
  ADD KEY `airports_id_kota_foreign` (`id_kota`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flights_id_pesawat_index` (`id_pesawat`),
  ADD KEY `flights_id_bandara_asal_index` (`id_bandara_asal`),
  ADD KEY `flights_id_bandara_tujuan_index` (`id_bandara_tujuan`);

--
-- Indexes for table `flight_details`
--
ALTER TABLE `flight_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flight_details_id_penerbangan_index` (`id_penerbangan`),
  ADD KEY `flight_details_id_fasilitas_index` (`id_fasilitas`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `planes_id_maskapai_foreign` (`id_maskapai`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_role_foreign` (`id_role`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airlines`
--
ALTER TABLE `airlines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `airports`
--
ALTER TABLE `airports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flight_details`
--
ALTER TABLE `flight_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `planes`
--
ALTER TABLE `planes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `airlines`
--
ALTER TABLE `airlines`
  ADD CONSTRAINT `airlines_id_kota_foreign` FOREIGN KEY (`id_kota`) REFERENCES `cities` (`id`);

--
-- Constraints for table `airports`
--
ALTER TABLE `airports`
  ADD CONSTRAINT `airports_id_kota_foreign` FOREIGN KEY (`id_kota`) REFERENCES `cities` (`id`);

--
-- Constraints for table `flights`
--
ALTER TABLE `flights`
  ADD CONSTRAINT `flights_id_bandara_asal_foreign` FOREIGN KEY (`id_bandara_asal`) REFERENCES `airports` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `flights_id_bandara_tujuan_foreign` FOREIGN KEY (`id_bandara_tujuan`) REFERENCES `airports` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `flights_id_pesawat_foreign` FOREIGN KEY (`id_pesawat`) REFERENCES `planes` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `flight_details`
--
ALTER TABLE `flight_details`
  ADD CONSTRAINT `flight_details_id_fasilitas_foreign` FOREIGN KEY (`id_fasilitas`) REFERENCES `facilities` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `flight_details_id_penerbangan_foreign` FOREIGN KEY (`id_penerbangan`) REFERENCES `flights` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `planes`
--
ALTER TABLE `planes`
  ADD CONSTRAINT `planes_id_maskapai_foreign` FOREIGN KEY (`id_maskapai`) REFERENCES `airlines` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `user_roles` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
