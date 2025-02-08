

DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `departments_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `device_attributes`;
CREATE TABLE `device_attributes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `device_id` bigint unsigned NOT NULL,
  `attribute_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `device_attributes_device_id_foreign` (`device_id`),
  CONSTRAINT `device_attributes_device_id_foreign` FOREIGN KEY (`device_id`) REFERENCES `devices` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `device_types`;
CREATE TABLE `device_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `device_types_type_name_unique` (`type_name`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `devices`;
CREATE TABLE `devices` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_type_id` bigint unsigned NOT NULL,
  `mac_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subnet_mask` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `network_info` text COLLATE utf8mb4_unicode_ci,
  `default_gateway` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dns_servers` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `connection_type` enum('Ethernet','Wi-Fi','Other') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vlan_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufacturer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firmware_version` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `software_version` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hardware_version` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` int DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `maintenance_history_id` int DEFAULT NULL,
  `operational_status` enum('active','inactive','decommissioned') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `health_metrics` text COLLATE utf8mb4_unicode_ci,
  `antivirus_status` enum('enabled_up_to_date','enabled_outdated','disabled','not_installed','error') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'enabled_up_to_date',
  `firewall_settings` text COLLATE utf8mb4_unicode_ci,
  `network_traffic_stats` text COLLATE utf8mb4_unicode_ci,
  `is_enabled` tinyint(1) NOT NULL DEFAULT '1',
  `is_online` tinyint(1) NOT NULL DEFAULT '0',
  `last_seen_at` timestamp NULL DEFAULT NULL,
  `last_boot_at` timestamp NULL DEFAULT NULL,
  `last_reboot_at` timestamp NULL DEFAULT NULL,
  `last_sync_at` timestamp NULL DEFAULT NULL,
  `last_synced_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `devices_device_type_id_foreign` (`device_type_id`),
  KEY `devices_created_by_foreign` (`created_by`),
  KEY `devices_updated_by_foreign` (`updated_by`),
  KEY `devices_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `devices_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `devices_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  CONSTRAINT `devices_device_type_id_foreign` FOREIGN KEY (`device_type_id`) REFERENCES `device_types` (`id`),
  CONSTRAINT `devices_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `maintenance_histories`;
CREATE TABLE `maintenance_histories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `device_id` bigint unsigned NOT NULL,
  `maintenance_date` date NOT NULL,
  `performed_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `maintenance_type` enum('preventive','corrective','predictive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `maintenance_histories_device_id_foreign` (`device_id`),
  CONSTRAINT `maintenance_histories_device_id_foreign` FOREIGN KEY (`device_id`) REFERENCES `devices` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_department_id_foreign` (`department_id`),
  CONSTRAINT `users_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `users_departments`;
CREATE TABLE `users_departments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `department_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_departments_user_id_foreign` (`user_id`),
  CONSTRAINT `users_departments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1738194877),
('livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1738194877;', 1738194877);

INSERT INTO `departments` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, '2025-01-30 02:54:49', '2025-01-30 02:54:49', 'قسم الشؤون الفكرية'),
(2, '2025-01-30 02:55:51', '2025-01-30 02:55:51', 'حفظ النظام'),
(3, '2025-01-30 02:56:11', '2025-01-30 02:56:11', 'قسم الامانات والنذور'),
(4, '2025-01-30 02:56:21', '2025-01-30 02:56:21', 'قسم التشريفات'),
(5, '2025-01-30 02:56:31', '2025-01-30 02:56:31', 'وحدة البث المباشر'),
(6, '2025-01-30 02:56:40', '2025-01-30 02:56:40', 'وحدة الامن السبراني'),
(7, '2025-01-30 02:56:53', '2025-01-30 02:56:53', 'مركز الكفيل'),
(8, '2025-01-30 02:56:58', '2025-01-30 02:56:58', 'مستشفى الكفيل'),
(9, '2025-01-30 02:57:21', '2025-01-30 02:57:21', 'دار القران الكريم');

INSERT INTO `device_types` (`id`, `type_name`, `created_at`, `updated_at`) VALUES
(5, 'Router', NULL, NULL),
(6, 'Computer', NULL, NULL),
(7, 'Printer', NULL, NULL),
(8, 'Mobile', NULL, NULL),
(9, 'Server', NULL, NULL),
(10, 'Scanner', NULL, NULL),
(11, 'Camera', NULL, NULL),
(12, 'DVR', NULL, NULL),
(13, 'Tablet', NULL, NULL),
(14, 'Mikrotik', NULL, NULL),
(15, 'Cisco', NULL, NULL),
(16, 'SmartTV', NULL, NULL);

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(7, '2025_01_30_005157_create_device_types_table', 2),
(8, '2025_01_30_005356_create_devices_table', 2),
(9, '2025_01_30_005358_create_device_attributes_table', 2),
(10, '2025_01_30_023754_create_departments_table', 3),
(11, '2025_01_30_024119_add_department_id_to_users_table', 4),
(12, '2025_01_30_032237_create__maintenance_histories_table', 5);

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('SdAGlCBUKN7FzeKPbUthhycPl95eEASc245m1uuY', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiNUVsS0M2dGIzUnc3ZVVyZlpNRUFZbUloNUFGZEQwZDEwNXlQa2Y4eCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi91c2VycyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiRaTkNDdU5wTGdSZjRLU1NCYXhNMmMuWFlqeXppYVFsQmVzbjFXM0xjaTVCL1QwdzF0LmIyeSI7czo4OiJmaWxhbWVudCI7YTowOnt9czo2OiJ0YWJsZXMiO2E6MTp7czoxODoiTGlzdFVzZXJzX3Blcl9wYWdlIjtzOjM6ImFsbCI7fX0=', 1738209832);

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `department_id`) VALUES
(1, 'Admin', 'admin@mail.com', '2025-01-30 01:48:33', '$2y$12$ZNCCuNpLgRf4KSSBaxM2c.XYjyziaQlBesn1W3Lci5B/T0w1t.b2y', 'RTp0wnrXohKdYSqJSoVrDaZI2volKWxZAfHkINrG2yTdCThwkPMdm9MSfswk', '2025-01-29 22:47:28', '2025-01-29 22:47:28', NULL);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;