/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `airlines` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_iata` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kota` int(10) unsigned NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `airlines_kode_iata_unique` (`kode_iata`),
  KEY `airlines_id_kota_foreign` (`id_kota`),
  CONSTRAINT `airlines_id_kota_foreign` FOREIGN KEY (`id_kota`) REFERENCES `cities` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `airports` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_iata` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kota` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `airports_kode_iata_unique` (`kode_iata`),
  KEY `airports_id_kota_foreign` (`id_kota`),
  CONSTRAINT `airports_id_kota_foreign` FOREIGN KEY (`id_kota`) REFERENCES `cities` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` enum('Nanggroe Aceh Darusalam','Bali','Bangka Belitung','Banten','Bengkulu','Daerah Istimewa Yogyakarta','Daerah Khusus Ibukota Jakarta','Gorontalo','Jambi','Jawa Barat','Jawa Tengah','Jawa Timur','Kalimantan Barat','Kalimantan Tengah','Kalimantan Timur','Kalimatan Utara','Kalimantan Selatan','Kepulauan Riau','Lampung','Maluku','Maluku Utara','Nusa Tenggara Barat','Nusa Tenggara Timur','Papua','Papua Barat','Sulawesi Barat','Sulawesi Selatan','Sulawesi Tengah','Sulawesi Tenggara','Sulawesi Utara','Sumatra Barat','Sumatra Selatan','Sumatra Utara','Riau') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facilities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flight_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_penerbangan` char(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `id_fasilitas` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `flight_details_id_penerbangan_index` (`id_penerbangan`),
  KEY `flight_details_id_fasilitas_index` (`id_fasilitas`),
  CONSTRAINT `flight_details_id_fasilitas_foreign` FOREIGN KEY (`id_fasilitas`) REFERENCES `facilities` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `flight_details_id_penerbangan_foreign` FOREIGN KEY (`id_penerbangan`) REFERENCES `flights` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flight_order_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_pemesanan` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_penerbangan` char(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_penumpang` bigint(20) unsigned NOT NULL,
  `id_kursi` bigint(20) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `flight_order_details_id_pemesanan_index` (`id_pemesanan`),
  KEY `flight_order_details_id_penerbangan_index` (`id_penerbangan`),
  KEY `flight_order_details_id_penumpang_index` (`id_penumpang`),
  KEY `flight_order_details_id_kursi_index` (`id_kursi`),
  CONSTRAINT `flight_order_details_id_kursi_foreign` FOREIGN KEY (`id_kursi`) REFERENCES `plane_seats` (`id`),
  CONSTRAINT `flight_order_details_id_pemesanan_foreign` FOREIGN KEY (`id_pemesanan`) REFERENCES `flight_orders` (`id`),
  CONSTRAINT `flight_order_details_id_penerbangan_foreign` FOREIGN KEY (`id_penerbangan`) REFERENCES `flights` (`id`) ON DELETE CASCADE,
  CONSTRAINT `flight_order_details_id_penumpang_foreign` FOREIGN KEY (`id_penumpang`) REFERENCES `passengers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flight_orders` (
  `id` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pelanggan` bigint(20) unsigned NOT NULL,
  `status` enum('IN_CART','PENDING','SUCCESS','CANCEL') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `flight_orders_id_pelanggan_index` (`id_pelanggan`),
  CONSTRAINT `flight_orders_id_pelanggan_foreign` FOREIGN KEY (`id_pelanggan`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flight_ticket_payments` (
  `id` char(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pemesanan_detail` bigint(20) unsigned NOT NULL,
  `id_operator` bigint(20) unsigned NOT NULL,
  `tarif_per_penumpang` decimal(10,2) NOT NULL,
  `id_metode_pembayaran` bigint(20) unsigned NOT NULL,
  `total_bayar` decimal(10,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `tanggal_bayar` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `flight_ticket_payments_id_pemesanan_detail_index` (`id_pemesanan_detail`),
  KEY `flight_ticket_payments_id_operator_index` (`id_operator`),
  KEY `flight_ticket_payments_id_metode_pembayaran_index` (`id_metode_pembayaran`),
  CONSTRAINT `flight_ticket_payments_id_metode_pembayaran_foreign` FOREIGN KEY (`id_metode_pembayaran`) REFERENCES `payment_methods` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `flight_ticket_payments_id_operator_foreign` FOREIGN KEY (`id_operator`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `flight_ticket_payments_id_pemesanan_detail_foreign` FOREIGN KEY (`id_pemesanan_detail`) REFERENCES `flight_order_details` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flights` (
  `id` char(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pesawat` int(10) unsigned NOT NULL,
  `id_bandara_asal` int(10) unsigned NOT NULL,
  `id_bandara_tujuan` int(10) unsigned NOT NULL,
  `durasi` time NOT NULL,
  `waktu_berangkat` datetime NOT NULL,
  `waktu_tiba` datetime NOT NULL,
  `kecepatan_rata_rata` double(8,2) DEFAULT NULL,
  `jarak_perjalanan` double(8,2) DEFAULT NULL,
  `kelas` enum('ekonomi','premium ekonomi','bisnis','first') COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `flights_id_pesawat_index` (`id_pesawat`),
  KEY `flights_id_bandara_asal_index` (`id_bandara_asal`),
  KEY `flights_id_bandara_tujuan_index` (`id_bandara_tujuan`),
  CONSTRAINT `flights_id_bandara_asal_foreign` FOREIGN KEY (`id_bandara_asal`) REFERENCES `airports` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `flights_id_bandara_tujuan_foreign` FOREIGN KEY (`id_bandara_tujuan`) REFERENCES `airports` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `flights_id_pesawat_foreign` FOREIGN KEY (`id_pesawat`) REFERENCES `planes` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `passengers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` enum('tuan','nyonya','nona') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_methods` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_metode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plane_seats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_pesawat` int(10) unsigned NOT NULL,
  `kelas` enum('ekonomi','premium ekonomi','bisnis','first') COLLATE utf8mb4_unicode_ci NOT NULL,
  `baris` int(11) NOT NULL,
  `kolom` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jarak_kursi` decimal(4,0) DEFAULT NULL,
  `status` enum('tersedia','dikonfirmasi') COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `plane_seats_id_pesawat_index` (`id_pesawat`),
  CONSTRAINT `plane_seats_id_pesawat_foreign` FOREIGN KEY (`id_pesawat`) REFERENCES `planes` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `planes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_maskapai` int(10) unsigned NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_kursi` int(11) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `planes_id_maskapai_foreign` (`id_maskapai`),
  CONSTRAINT `planes_id_maskapai_foreign` FOREIGN KEY (`id_maskapai`) REFERENCES `airlines` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `gambar` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` enum('tuan','nyonya','nona') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_role` int(10) unsigned NOT NULL DEFAULT 3,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_id_role_foreign` (`id_role`),
  CONSTRAINT `users_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `user_roles` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

INSERT INTO `migrations` VALUES (4,'2014_10_12_000000_create_users_table',1);
INSERT INTO `migrations` VALUES (5,'2014_10_12_100000_create_password_resets_table',1);
INSERT INTO `migrations` VALUES (6,'2019_08_19_000000_create_failed_jobs_table',1);
INSERT INTO `migrations` VALUES (7,'2020_09_25_144456_create_planes_table',1);
INSERT INTO `migrations` VALUES (8,'2020_09_25_151450_create_airlines_table',2);
INSERT INTO `migrations` VALUES (9,'2020_09_26_012943_create_airports_table',3);
INSERT INTO `migrations` VALUES (10,'2020_09_26_015530_create_cities_table',4);
INSERT INTO `migrations` VALUES (12,'2020_09_26_021055_create_airports_table',5);
INSERT INTO `migrations` VALUES (13,'2020_09_26_031901_create_airports_table',6);
INSERT INTO `migrations` VALUES (14,'2020_09_26_032758_create_airlines_table',7);
INSERT INTO `migrations` VALUES (15,'2020_09_26_034731_create_cities_table',8);
INSERT INTO `migrations` VALUES (16,'2020_09_26_034946_create_airports_table',9);
INSERT INTO `migrations` VALUES (17,'2020_09_26_035044_create_airlines_table',9);
INSERT INTO `migrations` VALUES (18,'2020_09_26_082350_create_planes_table',10);
INSERT INTO `migrations` VALUES (19,'2020_09_26_084402_create_flights_table',11);
INSERT INTO `migrations` VALUES (20,'2020_09_26_084759_create_flights_table',12);
INSERT INTO `migrations` VALUES (21,'2020_09_28_012235_drop_flights_timestamp_column',13);
INSERT INTO `migrations` VALUES (22,'2020_09_28_014744_create_cities_table',14);
INSERT INTO `migrations` VALUES (23,'2020_09_28_014938_create_airports_table',15);
INSERT INTO `migrations` VALUES (24,'2020_09_28_015017_create_airlines_table',15);
INSERT INTO `migrations` VALUES (25,'2020_09_28_015142_create_planes_table',15);
INSERT INTO `migrations` VALUES (26,'2020_09_28_015327_create_flights_table',15);
INSERT INTO `migrations` VALUES (28,'2020_09_28_021317_create_user_roles_table',16);
INSERT INTO `migrations` VALUES (29,'2020_09_28_023425_modify_users_table',17);
INSERT INTO `migrations` VALUES (30,'2020_09_28_023651_create_user_roles_table',18);
INSERT INTO `migrations` VALUES (31,'2020_09_28_024454_create_user_roles_table',19);
INSERT INTO `migrations` VALUES (32,'2020_09_28_024617_modify_users_table',19);
INSERT INTO `migrations` VALUES (33,'2020_09_28_025031_modify_users_table',20);
INSERT INTO `migrations` VALUES (34,'2020_09_28_032449_create_cities_table',21);
INSERT INTO `migrations` VALUES (35,'2020_09_28_032532_create_airports_table',22);
INSERT INTO `migrations` VALUES (36,'2020_09_28_033107_create_airlines_table',23);
INSERT INTO `migrations` VALUES (37,'2020_09_28_033230_create_planes_table',24);
INSERT INTO `migrations` VALUES (38,'2020_09_28_033455_create_planes_table',25);
INSERT INTO `migrations` VALUES (39,'2020_09_28_033555_create_flights_table',26);
INSERT INTO `migrations` VALUES (40,'2020_09_28_043052_create_user_roles_table',27);
INSERT INTO `migrations` VALUES (41,'2020_09_28_043136_modify_users_table',28);
INSERT INTO `migrations` VALUES (42,'2020_09_28_043414_modify_users_table',29);
INSERT INTO `migrations` VALUES (43,'2020_09_28_082342_modify_users_table',30);
INSERT INTO `migrations` VALUES (44,'2020_09_28_085728_create_flights_table',31);
INSERT INTO `migrations` VALUES (45,'2020_09_28_090004_create_flights_table',32);
INSERT INTO `migrations` VALUES (46,'2020_09_28_090137_create_flights_table',33);
INSERT INTO `migrations` VALUES (47,'2020_10_01_055901_add_description_column_of_airlines_table',34);
INSERT INTO `migrations` VALUES (48,'2020_10_01_060434_add_description_column_of_airlines_table',35);
INSERT INTO `migrations` VALUES (49,'2020_10_01_070015_modify_flights_table',36);
INSERT INTO `migrations` VALUES (50,'2020_10_01_070640_modify_flights_table',37);
INSERT INTO `migrations` VALUES (51,'2020_10_08_064725_create_facilities_table',38);
INSERT INTO `migrations` VALUES (52,'2020_10_08_064914_create_flight_details_table',39);
INSERT INTO `migrations` VALUES (53,'2020_10_11_030233_create_flight_classes_table',40);
INSERT INTO `migrations` VALUES (54,'2020_10_11_032430_modify_flight_details_table',41);
INSERT INTO `migrations` VALUES (55,'2020_10_11_051724_create_flight_details_table',42);
INSERT INTO `migrations` VALUES (56,'2020_10_11_051938_add_cabin_class_column_to_flights_table',43);
INSERT INTO `migrations` VALUES (57,'2020_10_11_232654_create_passengers_table',44);
INSERT INTO `migrations` VALUES (58,'2020_10_11_234628_create_flight_orders_table',44);
INSERT INTO `migrations` VALUES (62,'2020_10_12_004615_create_plane_seats_table',45);
INSERT INTO `migrations` VALUES (63,'2020_10_12_012742_create_flight_orders_table',45);
INSERT INTO `migrations` VALUES (64,'2020_10_12_012817_create_flight_order_details_table',45);
INSERT INTO `migrations` VALUES (68,'2020_10_12_030103_create_payment_methods_table',46);
INSERT INTO `migrations` VALUES (70,'2020_10_12_030155_create_flight_ticket_payments_table',47);
INSERT INTO `migrations` VALUES (71,'2020_10_12_140439_add_default_value_to_column_users_table',47);
INSERT INTO `migrations` VALUES (72,'2020_10_12_152745_add_title_column_to_users_table',48);
