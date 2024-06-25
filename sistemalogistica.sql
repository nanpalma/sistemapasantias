-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 25-06-2024 a las 13:33:18
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemalogistica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `armas`
--

CREATE TABLE `armas` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_arma_id` bigint UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` bigint UNSIGNED NOT NULL,
  `delet_observacion` longtext COLLATE utf8mb4_unicode_ci,
  `brigada_id` bigint UNSIGNED NOT NULL,
  `sub_brigada_id` bigint UNSIGNED NOT NULL,
  `sub_tipo_arma_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brigadas`
--

CREATE TABLE `brigadas` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `brigadas`
--

INSERT INTO `brigadas` (`id`, `nombre`, `direccion`, `created_at`, `updated_at`) VALUES
(1, '14 Brigada', '14 Brigada', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(2, '81 Beilos', 'Sin direccion', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(3, '94 Brigadas Especial', 'Sin direccion', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(4, 'C2-12 GNB', 'Sin direccion', '2024-05-06 20:08:16', '2024-05-06 20:08:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hospitales`
--

CREATE TABLE `hospitales` (
  `id` bigint UNSIGNED NOT NULL,
  `municipios_hospitale_id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `hospitales`
--

INSERT INTO `hospitales` (`id`, `municipios_hospitale_id`, `nombre`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'HOSPITALES', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(2, 1, 'AMBULATORIO URBANO TIPO III', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(3, 1, 'AMBULATORIO URBANO TIPO II', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(4, 1, 'AMBULATORIO URBANO TIPO I', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(5, 1, 'AMBULATORIO RURAL TIPO II', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(6, 2, 'AMBULATORIO URBANO TIPO III', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(7, 2, 'AMBULATORIO URBANO TIPO I', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(8, 2, 'AMBULATORIO RURAL I', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(9, 3, 'HOSPITAL', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(10, 3, 'AMBULATORIO RURAL II', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(11, 3, 'AMBULATORIO RURAL I', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(12, 4, 'HOSPITAL', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(13, 4, 'AMBULATORIO RURAL II', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(14, 4, 'AMBULATORIO RURAL I', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(15, 5, 'HOSPITAL', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(16, 5, 'AMBULATORIO RURAL II', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(17, 5, 'AMBULATORIO RURAL I', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(18, 6, 'HOSPITAL', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(19, 6, 'AMBULATORIO RURAL TIPO II', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(20, 6, 'AMBULATORIO RURAL TIPO I', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(21, 7, 'HOSPITAL', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(22, 7, 'AMBULATORIO URBANO I', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(23, 7, 'AMBULATORIO RURAL II', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(24, 7, 'AMBULATORIO RURAL I', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(25, 7, 'CENTROS DE SALUD ACONDICIONADOS Y CONSTRUIDOS POR LOS CONSEJOS COMUNALES', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(26, 8, 'HOSPITAL', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(27, 8, 'AMBULATORIO RURAL I', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(28, 8, 'CENTROS DE SALUD ACONDICIONADOS Y CONSTRUIDOS POR LOS CONSEJOS COMUNALES', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(29, 9, 'HOSPITAL', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(30, 9, 'AMBULATORIO URBANO TIPO III', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(31, 9, 'AMBULATORIO URBANO TIPO I', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(32, 9, 'AMBULATORIO RURAL TIPO II', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(33, 9, 'AMBULATORIO RURAL TIPO II', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(34, 9, 'CENTROS DE SALUD ACONDICIONADOS Y CONSTRUIDOS POR LOS CONSEJOS COMUNALES', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE `materiales` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_material_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `materiales`
--

INSERT INTO `materiales` (`id`, `nombre`, `tipo_material_id`, `created_at`, `updated_at`) VALUES
(1, 'Phone clonado', 2, '2024-05-06 20:09:11', '2024-05-06 20:09:11'),
(2, 'dsffds', 1, '2024-05-06 20:09:16', '2024-05-06 20:09:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales_zodies`
--

CREATE TABLE `materiales_zodies` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_material_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_03_24_133516_create_permission_tables', 1),
(7, '2024_04_02_234922_create_brigadas_table', 1),
(8, '2024_04_02_234952_create_sub_brigadas_table', 1),
(9, '2024_04_02_235014_create_tipo_armas_table', 1),
(10, '2024_04_02_235025_create_sub_tipo_armas_table', 1),
(11, '2024_04_02_235039_create_armas_table', 1),
(12, '2024_04_03_185609_create_materiales_table', 1),
(13, '2024_04_03_192335_create_stocks_table', 1),
(14, '2024_04_05_135857_create_vehiculos_table', 1),
(15, '2024_04_10_014859_create_stock_transportes_table', 1),
(16, '2024_04_12_022913_create_vehiculo_zodis_table', 1),
(17, '2024_04_29_032110_create_materiales_zodies_table', 1),
(18, '2024_05_01_014702_create_municipios_hospitales_table', 1),
(19, '2024_05_01_024327_create_hospitales_table', 1),
(20, '2024_05_06_160021_create_stock_sanidads_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios_hospitales`
--

CREATE TABLE `municipios_hospitales` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `municipios_hospitales`
--

INSERT INTO `municipios_hospitales` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'IRIBARREN', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(2, 'PALAVECINO', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(3, 'SIMÓN PLANAS', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(4, 'CRESPO', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(5, 'URDANETA', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(6, 'MORAN', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(7, 'JIMÉNEZ', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(8, 'ANDRÉS ELOY BLANCO', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(9, 'ANDRÉS TORRES', '2024-05-06 20:08:16', '2024-05-06 20:08:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create-role', 'web', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(2, 'edit-role', 'web', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(3, 'delete-role', 'web', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(4, 'create-user', 'web', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(5, 'edit-user', 'web', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(6, 'delete-user', 'web', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(7, 'create-product', 'web', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(8, 'edit-product', 'web', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(9, 'delete-product', 'web', '2024-05-06 20:08:16', '2024-05-06 20:08:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(2, 'Admin', 'web', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(3, 'Product Manager', 'web', '2024-05-06 20:08:16', '2024-05-06 20:08:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(7, 3),
(8, 3),
(9, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint UNSIGNED NOT NULL,
  `id_departamento` bigint UNSIGNED NOT NULL,
  `materiale_id` bigint UNSIGNED NOT NULL,
  `brigadas_id` bigint UNSIGNED NOT NULL,
  `sub_brigada_id` bigint UNSIGNED NOT NULL,
  `toe` double(8,2) DEFAULT NULL,
  `dotado` double(8,2) DEFAULT NULL,
  `faltan` double(8,2) DEFAULT NULL,
  `operativo` double(8,2) DEFAULT NULL,
  `inoperativo` double(8,2) DEFAULT NULL,
  `observacion` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `stocks`
--

INSERT INTO `stocks` (`id`, `id_departamento`, `materiale_id`, `brigadas_id`, `sub_brigada_id`, `toe`, `dotado`, `faltan`, `operativo`, `inoperativo`, `observacion`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 1, 10.00, 10.00, 0.00, 10.00, 0.00, 'sadfds', 1, '2024-05-06 20:09:33', '2024-05-06 20:09:33'),
(2, 1, 1, 1, 1, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2024-06-22 23:37:01', '2024-06-22 23:37:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_sanidads`
--

CREATE TABLE `stock_sanidads` (
  `id` bigint UNSIGNED NOT NULL,
  `id_departamento` bigint UNSIGNED DEFAULT NULL,
  `centro_salud_id` bigint UNSIGNED DEFAULT NULL,
  `municipios_hospitale_id` bigint UNSIGNED NOT NULL,
  `hospitale_id` bigint UNSIGNED NOT NULL,
  `establecimiento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parroquia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `stock_sanidads`
--

INSERT INTO `stock_sanidads` (`id`, `id_departamento`, `centro_salud_id`, `municipios_hospitale_id`, `hospitale_id`, `establecimiento`, `parroquia`, `tipo`, `direccion`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 7, 29, 'dsffsd', 'dsffds', 'dsffds', 'dsffds', 1, '2024-05-06 18:45:46', '2024-05-06 18:45:46'),
(2, 4, NULL, 1, 3, 'saddsf', 'fds', 'dsf', 'fds', 1, '2024-05-06 23:26:40', '2024-05-06 23:26:40'),
(3, 4, NULL, 1, 5, '144444444444', '44444444', '4444444', '44444444444444444', 1, '2024-05-06 23:27:08', '2024-05-06 23:54:40'),
(6, 4, NULL, 1, 3, 'ddddddd', 'ddddddddd', 'ddddddddd', 'dddd', 1, '2024-05-06 23:56:55', '2024-05-06 23:56:55'),
(7, 4, NULL, 5, 15, 'ddd', 'ddddfs', 'dsf', 'sdffds', 1, '2024-05-06 23:58:50', '2024-05-06 23:58:50'),
(8, 4, NULL, 5, 17, 'dsffds', 'fdssdf', 'dsf', 'sdff', 1, '2024-05-06 23:58:59', '2024-05-06 23:58:59'),
(9, 4, NULL, 5, 17, 'dsf', 'fds', 'dsf', 'fds', 1, '2024-05-06 23:59:07', '2024-05-06 23:59:07'),
(10, 4, NULL, 5, 16, 'dsf', 'dfs', 'sdf', 'sfd', 1, '2024-05-06 23:59:16', '2024-05-06 23:59:16'),
(11, 4, NULL, 9, 34, 'xx', 'xx', 'xx', 'xx', 1, '2024-05-07 04:36:31', '2024-05-07 04:36:31'),
(12, 4, NULL, 9, 29, 'dfds', 'dsfdsf', 'dsfdsf', 'dsffds', 1, '2024-05-07 04:36:50', '2024-05-07 04:36:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_transportes`
--

CREATE TABLE `stock_transportes` (
  `id` bigint UNSIGNED NOT NULL,
  `id_departamento` bigint UNSIGNED NOT NULL,
  `vehiculo_id` bigint UNSIGNED NOT NULL,
  `brigadas_id` bigint UNSIGNED NOT NULL,
  `operativo` tinyint(1) NOT NULL DEFAULT '0',
  `reparado` tinyint(1) NOT NULL DEFAULT '0',
  `inoperativo` tinyint(1) NOT NULL DEFAULT '0',
  `observacion` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `stock_transportes`
--

INSERT INTO `stock_transportes` (`id`, `id_departamento`, `vehiculo_id`, `brigadas_id`, `operativo`, `reparado`, `inoperativo`, `observacion`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 1, 0, 1, 0, 'dsf', 1, '2024-05-07 06:03:56', '2024-05-07 06:04:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_brigadas`
--

CREATE TABLE `sub_brigadas` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brigadas_id` bigint UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sub_brigadas`
--

INSERT INTO `sub_brigadas` (`id`, `nombre`, `brigadas_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '141 Batallón de infanteria \'Segundo riera\'', 1, 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(2, '142 Batallón de blindado \'Juan Gillermos Iribarren\'', 1, 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(3, 'CIA-1401 Comando', 1, 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(4, '145 Batallón Cruz Carrillo', 1, 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(5, '814 Batallón de apoyo logístico', 2, 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(6, '941 Batallon \'Manuel Sedeño\'', 3, 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(7, '942 Batallón \'GNA Antonio Jose De Sucre\'', 3, 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(8, '943 Batallón \'Juan Bautista\'', 3, 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(9, 'Detacamento 121', 4, 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(10, 'Destacamento 122', 4, 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(11, 'Destacamento 123', 4, 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(12, 'DESUL', 4, 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(13, 'Comando Rurales Nº 12', 4, 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_tipo_armas`
--

CREATE TABLE `sub_tipo_armas` (
  `id` bigint UNSIGNED NOT NULL,
  `tipo_arma_id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sub_tipo_armas`
--

INSERT INTO `sub_tipo_armas` (`id`, `tipo_arma_id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pistola semiautomática', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(2, 1, 'Pistola de bolsillo', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(3, 1, 'Pistola compacta', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(4, 2, 'Revólver de acción simple', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(5, 2, 'Revólver de acción doble', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(6, 2, 'Revólver de tambor', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(7, 3, 'Escopeta de caza', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(8, 3, 'Escopeta táctica', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(9, 3, 'Escopeta de corredera', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(10, 3, 'Escopetas de doble cañón', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(11, 4, 'Rifle de cerrojo', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(12, 4, 'Rifle semiautomático', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(13, 4, 'Rifle de francotirador', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(14, 4, 'Rifles de asalto', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(15, 5, 'Fusil de asalto', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(16, 5, 'Fusil de precisión', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(17, 5, 'Fusil de combate', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(18, 6, 'Subfusil compacto', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(19, 6, 'Subfusil con culata plegable', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(20, 6, 'Subfusil con mira holográfica', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(21, 7, 'Ametralladora pesada', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(22, 7, 'Ametralladora ligera', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(23, 7, 'Ametralladora de cinta', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(24, 8, 'Metralleta compacta', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(25, 8, 'Metralleta de asalto', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(26, 8, 'Metralleta táctica', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(27, 9, 'Carabina de caza', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(28, 9, 'Carabina deportiva', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(29, 9, 'Carabina táctica', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(30, 10, 'Mosquete de avancarga', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(31, 10, 'Mosquete de retrocarga', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(32, 10, 'Mosquete de chispa', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(33, 11, 'Cañón de artillería', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(34, 11, 'Cañón naval', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(35, 11, 'Cañón antiaéreo', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(36, 12, 'Arma automática ligera', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(37, 12, 'Arma automática pesada', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(38, 12, 'Arma automática de precisión', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(39, 13, 'Arma semiautomática de combate', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(40, 13, 'Arma semiautomática deportiva', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(41, 13, 'Arma semiautomática táctica', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(42, 14, 'Revólver', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(43, 14, 'Pistola', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(44, 14, 'Derringer', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(45, 15, 'Rifle', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(46, 15, 'Escopeta', '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(47, 15, 'Fusil', '2024-05-06 20:08:16', '2024-05-06 20:08:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_armas`
--

CREATE TABLE `tipo_armas` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_armas`
--

INSERT INTO `tipo_armas` (`id`, `nombre`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pistola', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(2, 'Revólver', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(3, 'Escopeta', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(4, 'Rifle', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(5, 'Fusil', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(6, 'Subfusil', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(7, 'Ametralladora', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(8, 'Metralleta', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(9, 'Carabina', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(10, 'Mosquete', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(11, 'Cañón', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(12, 'Arma automática', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(13, 'Arma semiautomática', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(14, 'Arma de fuego corta', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16'),
(15, 'Arma de fuego larga', 1, '2024-05-06 20:08:16', '2024-05-06 20:08:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@gmail.com', '2024-05-06 20:08:16', '$2y$10$2terevRGRWWV60Yif0RTrOeHenahLYaoaiqwwvwGEv/1Y1OEoWCrK', NULL, '2024-05-06 20:08:16', '2024-05-06 20:08:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `nombre`, `placa`, `modelo`, `created_at`, `updated_at`) VALUES
(2, 'fds', 'fds', 'VEHÍCULO DE TRASPORTE', '2024-05-07 06:03:41', '2024-05-07 06:03:41'),
(3, 'dffdfd', 'ffdfds', 'SISTEMA BLINDADOS', '2024-05-07 06:03:46', '2024-05-07 06:03:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo_zodis`
--

CREATE TABLE `vehiculo_zodis` (
  `id` bigint UNSIGNED NOT NULL,
  `id_departamento` bigint UNSIGNED NOT NULL,
  `marca` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modelo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_chasis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_motor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ubicacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operativo` tinyint(1) NOT NULL DEFAULT '0',
  `inoperativo` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `armas`
--
ALTER TABLE `armas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `armas_serial_unique` (`serial`),
  ADD KEY `armas_tipo_arma_id_foreign` (`tipo_arma_id`),
  ADD KEY `armas_user_id_foreign` (`user_id`),
  ADD KEY `armas_brigada_id_foreign` (`brigada_id`),
  ADD KEY `armas_sub_brigada_id_foreign` (`sub_brigada_id`),
  ADD KEY `armas_sub_tipo_arma_id_foreign` (`sub_tipo_arma_id`);

--
-- Indices de la tabla `brigadas`
--
ALTER TABLE `brigadas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `hospitales`
--
ALTER TABLE `hospitales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hospitales_municipios_hospitale_id_foreign` (`municipios_hospitale_id`);

--
-- Indices de la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materiales_zodies`
--
ALTER TABLE `materiales_zodies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `municipios_hospitales`
--
ALTER TABLE `municipios_hospitales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks_materiale_id_foreign` (`materiale_id`),
  ADD KEY `stocks_brigadas_id_foreign` (`brigadas_id`),
  ADD KEY `stocks_sub_brigada_id_foreign` (`sub_brigada_id`);

--
-- Indices de la tabla `stock_sanidads`
--
ALTER TABLE `stock_sanidads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_sanidads_municipios_hospitale_id_foreign` (`municipios_hospitale_id`),
  ADD KEY `stock_sanidads_hospitale_id_foreign` (`hospitale_id`);

--
-- Indices de la tabla `stock_transportes`
--
ALTER TABLE `stock_transportes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_transportes_vehiculo_id_foreign` (`vehiculo_id`),
  ADD KEY `stock_transportes_brigadas_id_foreign` (`brigadas_id`);

--
-- Indices de la tabla `sub_brigadas`
--
ALTER TABLE `sub_brigadas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_brigadas_brigadas_id_foreign` (`brigadas_id`);

--
-- Indices de la tabla `sub_tipo_armas`
--
ALTER TABLE `sub_tipo_armas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_tipo_armas_tipo_arma_id_foreign` (`tipo_arma_id`);

--
-- Indices de la tabla `tipo_armas`
--
ALTER TABLE `tipo_armas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vehiculos_placa_unique` (`placa`);

--
-- Indices de la tabla `vehiculo_zodis`
--
ALTER TABLE `vehiculo_zodis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vehiculo_zodis_placa_unique` (`placa`),
  ADD UNIQUE KEY `vehiculo_zodis_serial_chasis_unique` (`serial_chasis`),
  ADD UNIQUE KEY `vehiculo_zodis_serial_motor_unique` (`serial_motor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `armas`
--
ALTER TABLE `armas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `brigadas`
--
ALTER TABLE `brigadas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hospitales`
--
ALTER TABLE `hospitales`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `materiales`
--
ALTER TABLE `materiales`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `materiales_zodies`
--
ALTER TABLE `materiales_zodies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `municipios_hospitales`
--
ALTER TABLE `municipios_hospitales`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `stock_sanidads`
--
ALTER TABLE `stock_sanidads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `stock_transportes`
--
ALTER TABLE `stock_transportes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sub_brigadas`
--
ALTER TABLE `sub_brigadas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `sub_tipo_armas`
--
ALTER TABLE `sub_tipo_armas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `tipo_armas`
--
ALTER TABLE `tipo_armas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vehiculo_zodis`
--
ALTER TABLE `vehiculo_zodis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `armas`
--
ALTER TABLE `armas`
  ADD CONSTRAINT `armas_brigada_id_foreign` FOREIGN KEY (`brigada_id`) REFERENCES `brigadas` (`id`),
  ADD CONSTRAINT `armas_sub_brigada_id_foreign` FOREIGN KEY (`sub_brigada_id`) REFERENCES `sub_brigadas` (`id`),
  ADD CONSTRAINT `armas_sub_tipo_arma_id_foreign` FOREIGN KEY (`sub_tipo_arma_id`) REFERENCES `sub_tipo_armas` (`id`),
  ADD CONSTRAINT `armas_tipo_arma_id_foreign` FOREIGN KEY (`tipo_arma_id`) REFERENCES `tipo_armas` (`id`),
  ADD CONSTRAINT `armas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `hospitales`
--
ALTER TABLE `hospitales`
  ADD CONSTRAINT `hospitales_municipios_hospitale_id_foreign` FOREIGN KEY (`municipios_hospitale_id`) REFERENCES `municipios_hospitales` (`id`);

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_brigadas_id_foreign` FOREIGN KEY (`brigadas_id`) REFERENCES `brigadas` (`id`),
  ADD CONSTRAINT `stocks_materiale_id_foreign` FOREIGN KEY (`materiale_id`) REFERENCES `materiales` (`id`),
  ADD CONSTRAINT `stocks_sub_brigada_id_foreign` FOREIGN KEY (`sub_brigada_id`) REFERENCES `sub_brigadas` (`id`);

--
-- Filtros para la tabla `stock_sanidads`
--
ALTER TABLE `stock_sanidads`
  ADD CONSTRAINT `stock_sanidads_hospitale_id_foreign` FOREIGN KEY (`hospitale_id`) REFERENCES `hospitales` (`id`),
  ADD CONSTRAINT `stock_sanidads_municipios_hospitale_id_foreign` FOREIGN KEY (`municipios_hospitale_id`) REFERENCES `municipios_hospitales` (`id`);

--
-- Filtros para la tabla `stock_transportes`
--
ALTER TABLE `stock_transportes`
  ADD CONSTRAINT `stock_transportes_brigadas_id_foreign` FOREIGN KEY (`brigadas_id`) REFERENCES `brigadas` (`id`),
  ADD CONSTRAINT `stock_transportes_vehiculo_id_foreign` FOREIGN KEY (`vehiculo_id`) REFERENCES `vehiculos` (`id`);

--
-- Filtros para la tabla `sub_brigadas`
--
ALTER TABLE `sub_brigadas`
  ADD CONSTRAINT `sub_brigadas_brigadas_id_foreign` FOREIGN KEY (`brigadas_id`) REFERENCES `brigadas` (`id`);

--
-- Filtros para la tabla `sub_tipo_armas`
--
ALTER TABLE `sub_tipo_armas`
  ADD CONSTRAINT `sub_tipo_armas_tipo_arma_id_foreign` FOREIGN KEY (`tipo_arma_id`) REFERENCES `tipo_armas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
