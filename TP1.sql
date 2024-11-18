/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `tp1` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `tp1`;

CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `carritos` (
  `id_carrito` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_carrito`),
  KEY `carritos_id_usuario_foreign` (`id_usuario`),
  CONSTRAINT `carritos_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `carritos` (`id_carrito`, `id_usuario`, `created_at`, `updated_at`) VALUES
	(1, 1, '2024-11-18 07:29:00', '2024-11-18 07:29:00');

CREATE TABLE IF NOT EXISTS `carrito_productos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_carrito` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categorias` (`id_categoria`, `nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Periféricos', NULL, NULL),
	(2, 'Laptops', NULL, NULL),
	(3, 'Monitores', NULL, NULL),
	(4, 'Teclados', NULL, NULL),
	(5, 'Mouses', NULL, NULL),
	(6, 'Licencias de Software', NULL, NULL),
	(7, 'Componentes de PC', NULL, NULL),
	(8, 'cargadores', '2024-11-18 08:45:17', '2024-11-18 08:45:17');

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2024_11_17_023105_create_categorias_table', 1),
	(5, '2024_11_17_023114_create_productos_table', 1),
	(6, '2024_11_17_051944_create_carritos_table', 2),
	(7, '2024_11_17_052026_create_carrito_productos_table', 2);

CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `imagen_url` varchar(255) DEFAULT NULL,
  `id_categoria` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `productos_id_categoria_foreign` (`id_categoria`),
  CONSTRAINT `productos_id_categoria_foreign` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `productos` (`id_producto`, `nombre`, `descripcion`, `precio`, `stock`, `imagen_url`, `id_categoria`, `created_at`, `updated_at`) VALUES
	(2, 'Producto 2', 'Descripción del producto 2', 250.75, 6, NULL, NULL, '2024-11-18 04:17:22', '2024-11-18 08:50:55'),
	(94, 'Mouse Logitech G502', 'Mouse gaming con 11 botones programables', 79.99, 100, '/img/mouse_logitech_g502.jpg', 5, '2024-11-18 02:22:45', '2024-11-18 02:22:45'),
	(95, 'Teclado Mecánico Razer', 'Teclado RGB mecánico', 99.99, 50, '/img/teclado_razer.jpg', 4, '2024-11-18 02:22:45', '2024-11-18 02:22:45'),
	(96, 'Laptop HP Pavilion', 'Laptop 15.6" con Intel Core i7', 799.99, 20, '/img/laptop_hp_pavilion.jpg', 2, '2024-11-18 02:22:45', '2024-11-18 02:22:45'),
	(97, 'Monitor Dell 24"', 'Monitor Full HD de 24 pulgadas', 199.99, 30, '/img/monitor_dell.jpg', 3, '2024-11-18 02:22:45', '2024-11-18 02:22:45'),
	(98, 'Mousepad SteelSeries', 'Mousepad de gran tamaño', 29.99, 200, '/img/mousepad_steelseries.jpg', 5, '2024-11-18 02:22:45', '2024-11-18 02:22:45'),
	(99, 'Licencia Windows 10', 'Licencia original de Windows 10 Home', 139.99, 150, '/img/licencia_windows_10.jpg', 6, '2024-11-18 02:22:45', '2024-11-18 02:22:45'),
	(100, 'Procesador Intel i9-11900K', 'Procesador Intel de 8 núcleos', 599.99, 25, '/img/procesador_intel_i9.jpg', 7, '2024-11-18 02:22:45', '2024-11-18 02:22:45'),
	(101, 'Tarjeta gráfica NVIDIA RTX 3080', 'Tarjeta gráfica de alto rendimiento', 799.99, 10, '/img/tarjeta_grafica_nvidia.jpg', 7, '2024-11-18 02:22:45', '2024-11-18 02:22:45'),
	(102, 'Placa madre ASUS Z590', 'Placa madre ATX con soporte para procesadores Intel', 249.99, 15, '/img/placa_madre_asus.jpg', 7, '2024-11-18 02:22:45', '2024-11-18 02:22:45'),
	(103, 'SSD Samsung 1TB', 'Unidad de almacenamiento SSD de 1TB', 129.99, 50, '/img/ssd_samsung_1tb.jpg', 7, '2024-11-18 02:22:45', '2024-11-18 02:22:45'),
	(104, 'Macbook Pro M1', 'Laptop Macbook Pro con chip M1', 1299.99, 10, '/img/macbook_pro_m1.jpg', 2, '2024-11-18 02:22:45', '2024-11-18 02:22:45'),
	(105, 'Monitor LG UltraWide 34"', 'Monitor ultrawide de 34 pulgadas', 399.99, 20, '/img/monitor_lg_ultrawide.jpg', 3, '2024-11-18 02:22:45', '2024-11-18 02:22:45'),
	(106, 'Teclado Logitech G Pro', 'Teclado mecánico profesional', 89.99, 60, '/img/teclado_logitech_gpro.jpg', 4, '2024-11-18 02:22:45', '2024-11-18 02:22:45'),
	(107, 'Mouse Razer DeathAdder', 'Mouse gaming ergonómico', 69.99, 120, '/img/mouse_razer_deathadder.jpg', 5, '2024-11-18 02:22:45', '2024-11-18 02:22:45'),
	(108, 'Licencia Office 2021', 'Licencia de Office 2021 para un dispositivo', 149.99, 200, '/img/licencia_office_2021.jpg', 6, '2024-11-18 02:22:45', '2024-11-18 02:22:45'),
	(109, 'GPU AMD RX 6800', 'Tarjeta gráfica de alto rendimiento de AMD', 699.99, 10, '/img/gpu_amd_rx_6800.jpg', 7, '2024-11-18 02:22:45', '2024-11-18 02:22:45'),
	(110, 'Laptop Acer Nitro 5', 'Laptop gamer con procesador Intel Core i7', 899.99, 15, '/img/laptop_acer_nitro.jpg', 2, '2024-11-18 02:22:45', '2024-11-18 02:22:45'),
	(111, 'Teclado Corsair K95 RGB', 'Teclado mecánico con iluminación RGB', 169.99, 30, '/img/teclado_corsair_k95.jpg', 4, '2024-11-18 02:22:45', '2024-11-18 02:22:45'),
	(112, 'Monitor Samsung 27"', 'Monitor con pantalla curva de 27 pulgadas', 249.99, 40, '/img/monitor_samsung_27.jpg', 3, '2024-11-18 02:22:45', '2024-11-18 02:22:45'),
	(113, 'Mouse Logitech MX Master 3', 'Mouse ergonómico inalámbrico', 99.99, 100, '/img/mouse_logitech_mxmaster3.jpg', 5, '2024-11-18 02:22:45', '2024-11-18 02:22:45'),
	(114, 'SSD Kingston 500GB', 'Unidad de almacenamiento SSD de 500GB', 49.99, 75, '/img/ssd_kingston_500gb.jpg', 7, '2024-11-18 02:22:45', '2024-11-18 02:22:45'),
	(115, 'Mac Mini M1', 'Ordenador Mac Mini con chip M1', 699.99, 5, '/img/mac_mini_m1.jpg', 2, '2024-11-18 02:22:45', '2024-11-18 02:22:45'),
	(116, 'Teclado SteelSeries Apex 7', 'Teclado mecánico con retroiluminación RGB', 159.99, 35, '/img/teclado_steelseries_apex7.jpg', 4, '2024-11-18 02:22:45', '2024-11-18 02:22:45'),
	(117, 'GPU ASUS RTX 3060', 'Tarjeta gráfica de la serie RTX 3060 de ASUS', 499.99, 15, '/img/gpu_asus_rtx3060.jpg', 7, '2024-11-18 02:22:45', '2024-11-18 02:22:45'),
	(118, 'Monitor BenQ 32"', 'Monitor 4K de 32 pulgadas', 499.99, 25, '/img/monitor_benq_32.jpg', 3, '2024-11-18 02:22:45', '2024-11-18 02:22:45'),
	(119, 'Teclado HyperX Alloy FPS', 'Teclado mecánico compacto', 129.99, 50, '/img/teclado_hyperx_alloy_fps.jpg', 4, '2024-11-18 02:22:45', '2024-11-18 02:22:45');

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('nfQEZBXVCenJs9CJF0UT0ly5BfTrWncA2pUaXmyp', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieVY4QTVzenkxNXpxQ3pjUEFTblpiNUVEY1JuWWFUY29OTzhjNGV2NyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXRlZ29yaWFzLzEvZWRpdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1731903056);

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'alex', 'alex@gmail.com', NULL, '$2y$12$3IfOeKqKtp2F7L2qJmGVh..ZTsdl3uIPcz7J1frCJOXhtCT41150G', NULL, '2024-11-17 09:56:03', '2024-11-17 09:56:03');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
