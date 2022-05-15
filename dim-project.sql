/*
 Navicat Premium Data Transfer

 Source Server         : local MySQL
 Source Server Type    : MySQL
 Source Server Version : 80028
 Source Host           : localhost:3306
 Source Schema         : dim-project

 Target Server Type    : MySQL
 Target Server Version : 80028
 File Encoding         : 65001

 Date: 15/05/2022 22:28:00
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2022_04_22_172410_create_permission_tables', 1);
INSERT INTO `migrations` VALUES (6, '2022_04_22_172518_create_products_table', 2);
INSERT INTO `migrations` VALUES (7, '2022_05_14_022839_update_products_table', 3);
INSERT INTO `migrations` VALUES (8, '2022_05_14_141347_create_purchases_table', 4);
INSERT INTO `migrations` VALUES (9, '2022_05_15_102125_update_users_table', 5);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles`  (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES (1, 'App\\Models\\User', 1);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 3);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `permissions_name_guard_name_unique`(`name` ASC, `guard_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'role-list', 'web', '2022-04-24 07:54:09', '2022-04-24 07:54:09');
INSERT INTO `permissions` VALUES (2, 'role-create', 'web', '2022-04-24 07:54:09', '2022-04-24 07:54:09');
INSERT INTO `permissions` VALUES (3, 'role-edit', 'web', '2022-04-24 07:54:09', '2022-04-24 07:54:09');
INSERT INTO `permissions` VALUES (4, 'role-delete', 'web', '2022-04-24 07:54:09', '2022-04-24 07:54:09');
INSERT INTO `permissions` VALUES (5, 'product-list', 'web', '2022-04-24 07:54:09', '2022-04-24 07:54:09');
INSERT INTO `permissions` VALUES (6, 'product-create', 'web', '2022-04-24 07:54:09', '2022-04-24 07:54:09');
INSERT INTO `permissions` VALUES (7, 'product-edit', 'web', '2022-04-24 07:54:09', '2022-04-24 07:54:09');
INSERT INTO `permissions` VALUES (8, 'product-delete', 'web', '2022-04-24 07:54:09', '2022-04-24 07:54:09');

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `harga_barang` int NOT NULL,
  `biaya_penyimpanan` int NOT NULL,
  `periode_permintaan` int NOT NULL,
  `satuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `konversi` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 152 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (137, 'Kertas Kalkir Ukuran A4', NULL, NULL, 10000, 1000, 30, 'rim', 500);
INSERT INTO `products` VALUES (138, 'Kertas Kalkir Ukuran F4', NULL, NULL, 11500, 1150, 30, 'rim', 500);
INSERT INTO `products` VALUES (139, 'Kertas Kalkir Ukuran A3', NULL, NULL, 20000, 2000, 30, 'rim', 500);
INSERT INTO `products` VALUES (140, 'Kertas HVS Ex Tjiwi Kimia 65 x 100', NULL, NULL, 23900, 3000, 30, 'rim', 500);
INSERT INTO `products` VALUES (142, 'Kertas HVS Ex Tjiwi Kimia 65 x 100 2', NULL, NULL, 26750, 2500, 30, 'rim', 500);
INSERT INTO `products` VALUES (143, 'Kertas HVS Ex Tjiwi Kimia 65 x 100 3', NULL, NULL, 30550, 3000, 30, 'rim', 500);
INSERT INTO `products` VALUES (144, 'Kertas HVS Ex Tjiwi Kimia 65 x 100 4', NULL, NULL, 38200, 3000, 30, 'rim', 500);
INSERT INTO `products` VALUES (145, 'Kertas HVS Ex Tjiwi Kimia 79 x 109', NULL, NULL, 41000, 4100, 30, 'rim', 500);
INSERT INTO `products` VALUES (146, 'Tinta Cetak Offset ', NULL, NULL, 12000, 1200, 30, 'kaleng', 1);
INSERT INTO `products` VALUES (147, 'Laser Film A4', NULL, NULL, 15500, 2000, 30, 'lembar', 1);
INSERT INTO `products` VALUES (148, 'Laser Film F4', NULL, NULL, 18500, 2000, 30, 'lembar', 1);
INSERT INTO `products` VALUES (149, 'Laser Film A3', NULL, NULL, 27500, 3000, 30, 'lembar', 1);

-- ----------------------------
-- Table structure for purchases
-- ----------------------------
DROP TABLE IF EXISTS `purchases`;
CREATE TABLE `purchases`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_pemesan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `jumlah_pesanan` int NOT NULL,
  `lead_time` int NOT NULL,
  `pakai` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `purchases_product_id_foreign`(`product_id` ASC) USING BTREE,
  CONSTRAINT `purchases_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 176 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of purchases
-- ----------------------------
INSERT INTO `purchases` VALUES (103, 'raja tulis', 137, 5, 2, 2000, NULL, NULL);
INSERT INTO `purchases` VALUES (104, 'raja tulis', 137, 3, 1, 2000, NULL, NULL);
INSERT INTO `purchases` VALUES (105, 'Indo trading', 137, 4, 3, 1900, NULL, NULL);
INSERT INTO `purchases` VALUES (106, 'global offset', 137, 5, 3, 2488, NULL, NULL);
INSERT INTO `purchases` VALUES (107, 'kedai grafika', 137, 6, 3, 2790, NULL, NULL);
INSERT INTO `purchases` VALUES (108, 'deprintz', 137, 3, 3, 1490, NULL, NULL);
INSERT INTO `purchases` VALUES (109, 'elevent printing', 137, 8, 3, 3999, NULL, NULL);
INSERT INTO `purchases` VALUES (110, 'Indo trading', 137, 3, 3, 1499, NULL, NULL);
INSERT INTO `purchases` VALUES (111, 'global offset', 137, 7, 3, 3499, NULL, NULL);
INSERT INTO `purchases` VALUES (112, 'platindo jaya', 137, 5, 3, 2400, NULL, NULL);
INSERT INTO `purchases` VALUES (113, 'platindo jaya', 137, 8, 3, 3760, NULL, NULL);
INSERT INTO `purchases` VALUES (114, 'global offset', 137, 6, 3, 2999, NULL, NULL);
INSERT INTO `purchases` VALUES (115, 'global offset', 146, 4, 3, 3, NULL, NULL);
INSERT INTO `purchases` VALUES (116, 'global offset', 146, 3, 3, 4, NULL, NULL);
INSERT INTO `purchases` VALUES (117, 'global offset', 146, 4, 3, 3, NULL, NULL);
INSERT INTO `purchases` VALUES (118, 'global offset', 146, 5, 3, 3, NULL, NULL);
INSERT INTO `purchases` VALUES (119, 'global offset', 146, 4, 3, 6, NULL, NULL);
INSERT INTO `purchases` VALUES (120, 'global offset', 146, 6, 3, 4, NULL, NULL);
INSERT INTO `purchases` VALUES (121, 'global offset', 146, 8, 3, 6, NULL, NULL);
INSERT INTO `purchases` VALUES (122, 'global offset', 146, 4, 3, 7, NULL, NULL);
INSERT INTO `purchases` VALUES (123, 'global offset', 146, 5, 3, 3, NULL, NULL);
INSERT INTO `purchases` VALUES (124, 'global offset', 146, 3, 3, 5, NULL, NULL);
INSERT INTO `purchases` VALUES (125, 'global offset', 146, 3, 3, 5, NULL, NULL);
INSERT INTO `purchases` VALUES (126, 'global offset', 146, 4, 3, 4, NULL, NULL);
INSERT INTO `purchases` VALUES (127, 'Indo trading', 147, 200, 3, 170, NULL, NULL);
INSERT INTO `purchases` VALUES (128, 'platindo jaya', 149, 400, 3, 350, NULL, NULL);
INSERT INTO `purchases` VALUES (129, 'platindo jaya', 147, 300, 3, 400, NULL, NULL);
INSERT INTO `purchases` VALUES (130, 'platindo jaya', 147, 100, 3, 100, NULL, NULL);
INSERT INTO `purchases` VALUES (131, 'deprintz', 147, 120, 3, 150, NULL, NULL);
INSERT INTO `purchases` VALUES (132, 'kedai grafika', 147, 100, 3, 90, NULL, NULL);
INSERT INTO `purchases` VALUES (133, 'elevent printing', 147, 140, 3, 120, NULL, NULL);
INSERT INTO `purchases` VALUES (134, 'global offset', 147, 90, 3, 100, NULL, NULL);
INSERT INTO `purchases` VALUES (135, 'global offset', 147, 200, 3, 175, NULL, NULL);
INSERT INTO `purchases` VALUES (136, 'global offset', 147, 100, 3, 120, NULL, NULL);
INSERT INTO `purchases` VALUES (137, 'platindo jaya', 147, 200, 3, 200, NULL, NULL);
INSERT INTO `purchases` VALUES (138, 'global offset', 147, 120, 3, 140, NULL, NULL);
INSERT INTO `purchases` VALUES (139, 'global offset', 147, 400, 3, 350, NULL, NULL);
INSERT INTO `purchases` VALUES (140, 'platindo jaya', 149, 500, 3, 500, NULL, NULL);
INSERT INTO `purchases` VALUES (141, 'kedai grafika', 149, 250, 3, 300, NULL, NULL);
INSERT INTO `purchases` VALUES (142, 'deprintz', 149, 100, 3, 99, NULL, NULL);
INSERT INTO `purchases` VALUES (143, 'platindo jaya', 149, 200, 3, 180, NULL, NULL);
INSERT INTO `purchases` VALUES (144, 'platindo jaya', 149, 120, 3, 120, NULL, NULL);
INSERT INTO `purchases` VALUES (145, 'platindo jaya', 149, 250, 3, 230, NULL, NULL);
INSERT INTO `purchases` VALUES (146, 'platindo jaya', 149, 300, 3, 300, NULL, NULL);
INSERT INTO `purchases` VALUES (147, 'platindo jaya', 149, 450, 3, 400, NULL, NULL);
INSERT INTO `purchases` VALUES (148, 'platindo jaya', 149, 200, 3, 250, NULL, NULL);
INSERT INTO `purchases` VALUES (149, 'platindo jaya', 149, 300, 3, 325, NULL, NULL);
INSERT INTO `purchases` VALUES (150, 'platindo jaya', 149, 500, 3, 510, NULL, NULL);
INSERT INTO `purchases` VALUES (151, 'raja tulis', 144, 5, 3, 2000, NULL, NULL);
INSERT INTO `purchases` VALUES (152, 'kedai grafika', 144, 6, 3, 2500, NULL, NULL);
INSERT INTO `purchases` VALUES (153, 'kedai grafika', 144, 10, 3, 5000, NULL, NULL);
INSERT INTO `purchases` VALUES (154, 'Indo trading', 144, 4, 3, 2500, NULL, NULL);
INSERT INTO `purchases` VALUES (155, 'platindo jaya', 144, 8, 3, 4000, NULL, NULL);
INSERT INTO `purchases` VALUES (156, 'platindo jaya', 144, 7, 3, 3000, NULL, NULL);
INSERT INTO `purchases` VALUES (157, 'elevent printing', 144, 10, 3, 4000, NULL, NULL);
INSERT INTO `purchases` VALUES (158, 'global offset', 144, 5, 3, 3000, NULL, NULL);
INSERT INTO `purchases` VALUES (159, 'global offset', 144, 12, 3, 6000, NULL, NULL);
INSERT INTO `purchases` VALUES (160, 'global offset', 144, 15, 3, 7500, NULL, NULL);
INSERT INTO `purchases` VALUES (161, 'global offset', 144, 8, 3, 4000, NULL, NULL);
INSERT INTO `purchases` VALUES (162, 'global offset', 144, 10, 3, 6000, NULL, NULL);
INSERT INTO `purchases` VALUES (163, 'Indo trading', 138, 8, 3, 3500, NULL, NULL);
INSERT INTO `purchases` VALUES (164, 'Indo trading', 138, 10, 3, 4500, NULL, NULL);
INSERT INTO `purchases` VALUES (166, 'kedai grafika', 138, 13, 3, 6500, NULL, NULL);
INSERT INTO `purchases` VALUES (167, 'kedai grafika', 138, 18, 3, 7500, NULL, NULL);
INSERT INTO `purchases` VALUES (168, 'platindo jaya', 138, 12, 3, 9000, NULL, NULL);
INSERT INTO `purchases` VALUES (169, 'platindo jaya', 138, 10, 3, 6000, NULL, NULL);
INSERT INTO `purchases` VALUES (170, 'global offset', 138, 20, 3, 5000, NULL, NULL);
INSERT INTO `purchases` VALUES (171, 'global offset', 138, 7, 3, 11000, NULL, NULL);
INSERT INTO `purchases` VALUES (172, 'raja tulis', 138, 5, 3, 3000, NULL, NULL);
INSERT INTO `purchases` VALUES (173, 'platindo jaya', 138, 8, 3, 2000, NULL, NULL);
INSERT INTO `purchases` VALUES (174, 'raja tulis', 138, 10, 3, 4000, NULL, NULL);
INSERT INTO `purchases` VALUES (175, 'deprintz', 138, 15, 3, 5000, NULL, NULL);

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id` ASC) USING BTREE,
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO `role_has_permissions` VALUES (1, 1);
INSERT INTO `role_has_permissions` VALUES (2, 1);
INSERT INTO `role_has_permissions` VALUES (3, 1);
INSERT INTO `role_has_permissions` VALUES (4, 1);
INSERT INTO `role_has_permissions` VALUES (5, 1);
INSERT INTO `role_has_permissions` VALUES (6, 1);
INSERT INTO `role_has_permissions` VALUES (7, 1);
INSERT INTO `role_has_permissions` VALUES (8, 1);
INSERT INTO `role_has_permissions` VALUES (5, 2);
INSERT INTO `role_has_permissions` VALUES (6, 2);
INSERT INTO `role_has_permissions` VALUES (7, 2);
INSERT INTO `role_has_permissions` VALUES (5, 3);
INSERT INTO `role_has_permissions` VALUES (6, 3);
INSERT INTO `role_has_permissions` VALUES (7, 3);
INSERT INTO `role_has_permissions` VALUES (5, 4);
INSERT INTO `role_has_permissions` VALUES (6, 4);
INSERT INTO `role_has_permissions` VALUES (7, 4);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_guard_name_unique`(`name` ASC, `guard_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'administrator', 'web', '2022-04-24 07:56:43', '2022-05-14 02:12:28');
INSERT INTO `roles` VALUES (2, 'gudang', 'web', '2022-05-14 02:12:12', '2022-05-14 02:12:12');
INSERT INTO `roles` VALUES (3, 'manajer', 'web', '2022-05-14 02:12:56', '2022-05-14 02:13:15');
INSERT INTO `roles` VALUES (4, 'purchasing', 'web', '2022-05-14 02:20:01', '2022-05-14 02:20:01');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pegawai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp_pegawai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Humam Mukti', 'admin@gmail.com', NULL, '$2y$10$cc5/tNueJAfUqOlIKoujlOgMJGg5DyfQF/wCDL7D9FoPOPmnA24UG', 'Kediri', '081333521003', NULL, '2022-04-24 07:56:43', '2022-04-24 07:56:43');
INSERT INTO `users` VALUES (3, 'Mukti H', 'mukti@gmail.com', NULL, '$2y$10$BI24kaI1.vxHZ083iPjKHuLZXJSlR0EARTu/jAaVDKGzkcGdx07hO', 'Surabaya', '081234567890', NULL, '2022-05-15 11:24:17', '2022-05-15 11:40:34');

SET FOREIGN_KEY_CHECKS = 1;
