/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 50730
 Source Host           : 127.0.0.1:3306
 Source Schema         : zonakorea

 Target Server Type    : MySQL
 Target Server Version : 50730
 File Encoding         : 65001

 Date: 10/06/2020 01:50:22
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for client_reviews
-- ----------------------------
DROP TABLE IF EXISTS `client_reviews`;
CREATE TABLE `client_reviews`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `review` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `client_reviews_client_id_foreign`(`client_id`) USING BTREE,
  CONSTRAINT `client_reviews_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of client_reviews
-- ----------------------------

-- ----------------------------
-- Table structure for clients
-- ----------------------------
DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `media_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `clients_media_id_foreign`(`media_id`) USING BTREE,
  CONSTRAINT `clients_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of clients
-- ----------------------------

-- ----------------------------
-- Table structure for contents
-- ----------------------------
DROP TABLE IF EXISTS `contents`;
CREATE TABLE `contents`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contents
-- ----------------------------
INSERT INTO `contents` VALUES (1, 'footer_text', NULL, 'Phasellus pulvinar iaculis nunc at placerat. Sed porta sollicitudin eros, vel sagittis turpis consequat nec. Donec ac viverra ligula, in scelerisque leo. Proin massa quam, ornare in porta quis', '2020-06-10 00:38:08', '2020-06-10 00:38:08', NULL);
INSERT INTO `contents` VALUES (2, 'facebook', NULL, 'https://www.facebook.com/', '2020-06-10 01:12:01', '2020-06-10 01:12:01', NULL);
INSERT INTO `contents` VALUES (3, 'twitter', NULL, 'https://twitter.com/', '2020-06-10 01:12:14', '2020-06-10 01:12:14', NULL);
INSERT INTO `contents` VALUES (4, 'instagram', NULL, 'https://www.instagram.com/', '2020-06-10 01:12:29', '2020-06-10 01:12:29', NULL);

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for featured_post_details
-- ----------------------------
DROP TABLE IF EXISTS `featured_post_details`;
CREATE TABLE `featured_post_details`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `featured_post_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of featured_post_details
-- ----------------------------
INSERT INTO `featured_post_details` VALUES (1, 1, 2, '2020-06-08 23:04:38', '2020-06-08 23:04:38', NULL);
INSERT INTO `featured_post_details` VALUES (2, 1, 5, '2020-06-08 23:04:46', '2020-06-08 23:04:46', NULL);
INSERT INTO `featured_post_details` VALUES (3, 1, 3, '2020-06-08 23:04:52', '2020-06-08 23:04:52', NULL);

-- ----------------------------
-- Table structure for featured_posts
-- ----------------------------
DROP TABLE IF EXISTS `featured_posts`;
CREATE TABLE `featured_posts`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of featured_posts
-- ----------------------------
INSERT INTO `featured_posts` VALUES (1, 'top_3', '2020-06-08 22:28:18', '2020-06-08 22:28:18', NULL);

-- ----------------------------
-- Table structure for media
-- ----------------------------
DROP TABLE IF EXISTS `media`;
CREATE TABLE `media`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_gallery` smallint(6) NOT NULL DEFAULT 0,
  `extension` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of media
-- ----------------------------
INSERT INTO `media` VALUES (1, '00314243e.jpg', 'media/leCSkY_00314243e.jpg.jpeg', 0, 'jpeg', '2020-06-08 22:55:02', '2020-06-08 22:55:02', NULL);
INSERT INTO `media` VALUES (2, '00314335.jpg', 'media/9rZe11_00314335.jpg.jpeg', 0, 'jpeg', '2020-06-08 22:56:32', '2020-06-08 22:56:32', NULL);
INSERT INTO `media` VALUES (3, '00314366.jpg', 'media/I6hQoC_00314366.jpg.jpeg', 0, 'jpeg', '2020-06-08 22:58:52', '2020-06-08 22:58:52', NULL);
INSERT INTO `media` VALUES (4, '00314382.jpg', 'media/iTwiZK_00314382.jpg.jpeg', 0, 'jpeg', '2020-06-08 23:00:32', '2020-06-08 23:00:32', NULL);
INSERT INTO `media` VALUES (5, '00314057.jpg', 'media/cMXVdB_00314057.jpg.jpeg', 0, 'jpeg', '2020-06-08 23:04:23', '2020-06-08 23:04:23', NULL);
INSERT INTO `media` VALUES (6, 'profile.jpg', 'media/AzErWG_profile.jpg.jpeg', 0, 'jpeg', '2020-06-10 00:49:29', '2020-06-10 00:49:29', NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (3, '2020_05_15_202948_create_modules_table', 1);
INSERT INTO `migrations` VALUES (4, '2020_05_15_203001_create_user_levels_table', 1);
INSERT INTO `migrations` VALUES (5, '2020_05_15_203008_create_user_level_credentials_table', 1);
INSERT INTO `migrations` VALUES (6, '2020_05_15_203033_update_users_table_add_user_level', 1);
INSERT INTO `migrations` VALUES (7, '2020_05_15_203044_create_user_logs_table', 1);
INSERT INTO `migrations` VALUES (8, '2020_05_15_204217_create_media_table', 1);
INSERT INTO `migrations` VALUES (9, '2020_05_15_204249_create_post_categories_table', 1);
INSERT INTO `migrations` VALUES (10, '2020_05_15_204257_create_posts_table', 1);
INSERT INTO `migrations` VALUES (11, '2020_05_15_204549_create_post_comments_table', 1);
INSERT INTO `migrations` VALUES (12, '2020_05_15_204616_create_services_table', 1);
INSERT INTO `migrations` VALUES (13, '2020_05_15_204645_create_clients_table', 1);
INSERT INTO `migrations` VALUES (14, '2020_05_15_204656_create_client_reviews_table', 1);
INSERT INTO `migrations` VALUES (15, '2020_05_15_204828_create_partners_table', 1);
INSERT INTO `migrations` VALUES (16, '2020_05_15_204923_create_contents_table', 1);
INSERT INTO `migrations` VALUES (17, '2020_05_15_204933_create_settings_table', 1);
INSERT INTO `migrations` VALUES (18, '2020_05_15_214605_create_sliders_table', 1);
INSERT INTO `migrations` VALUES (19, '2020_06_07_163924_create_featured_posts_table', 1);
INSERT INTO `migrations` VALUES (20, '2020_06_07_164016_create_featured_post_details_table', 1);

-- ----------------------------
-- Table structure for modules
-- ----------------------------
DROP TABLE IF EXISTS `modules`;
CREATE TABLE `modules`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of modules
-- ----------------------------
INSERT INTO `modules` VALUES (1, '01', '#', 'Menu', 'Dashboard', 'dashboard', 'la la-dashboard', NULL, NULL, NULL);
INSERT INTO `modules` VALUES (2, '02', '#', 'Menu', 'Modules', 'module', 'la la-folder', NULL, NULL, NULL);
INSERT INTO `modules` VALUES (3, '03', '#', 'Menu', 'User Level', 'user_level', 'la la-users', NULL, NULL, NULL);
INSERT INTO `modules` VALUES (4, '04', '#', 'Menu', 'User', 'user', 'la la-user', NULL, NULL, NULL);
INSERT INTO `modules` VALUES (5, '05', '#', 'Menu', 'Media', 'media', 'la la-image', NULL, NULL, NULL);
INSERT INTO `modules` VALUES (6, '06', '#', 'Menu', 'Slider', 'slider', 'la la-image', NULL, NULL, NULL);
INSERT INTO `modules` VALUES (7, '07', '#', 'Menu', 'Setting', 'setting', 'la la-cogs', NULL, NULL, NULL);
INSERT INTO `modules` VALUES (8, '08', '#', 'Menu', 'Content', 'content', 'la la-folder', NULL, NULL, NULL);
INSERT INTO `modules` VALUES (9, '09', '#', 'Menu', 'Category', 'post_category', 'la la-tag', NULL, NULL, NULL);
INSERT INTO `modules` VALUES (10, '10', '#', 'Menu', 'Post', 'post', 'la la-file', NULL, NULL, NULL);
INSERT INTO `modules` VALUES (11, '11', '#', 'Menu', 'Featured Post', 'featured_post', 'la la-folder', NULL, NULL, NULL);
INSERT INTO `modules` VALUES (12, '12', '#', 'Menu', 'Service', 'service', 'la la-tag', NULL, NULL, NULL);
INSERT INTO `modules` VALUES (13, '13', '#', 'Menu', 'Client', 'client', 'la la-user', NULL, NULL, NULL);
INSERT INTO `modules` VALUES (14, '14', '#', 'Menu', 'Partner', 'partner', 'la la-user', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for partners
-- ----------------------------
DROP TABLE IF EXISTS `partners`;
CREATE TABLE `partners`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `media_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `partners_media_id_foreign`(`media_id`) USING BTREE,
  CONSTRAINT `partners_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of partners
-- ----------------------------

-- ----------------------------
-- Table structure for post_categories
-- ----------------------------
DROP TABLE IF EXISTS `post_categories`;
CREATE TABLE `post_categories`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `media_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of post_categories
-- ----------------------------
INSERT INTO `post_categories` VALUES (1, 'Films', 'films', NULL, NULL, '2020-06-08 22:39:15', '2020-06-08 22:42:21', NULL);
INSERT INTO `post_categories` VALUES (2, 'News', 'news', NULL, NULL, '2020-06-08 22:41:36', '2020-06-08 22:41:36', NULL);
INSERT INTO `post_categories` VALUES (3, 'Music', 'music', NULL, NULL, '2020-06-08 22:42:11', '2020-06-08 22:42:11', NULL);

-- ----------------------------
-- Table structure for post_comments
-- ----------------------------
DROP TABLE IF EXISTS `post_comments`;
CREATE TABLE `post_comments`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `post_comments_post_id_foreign`(`post_id`) USING BTREE,
  INDEX `post_comments_parent_id_foreign`(`parent_id`) USING BTREE,
  CONSTRAINT `post_comments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `post_comments` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `post_comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of post_comments
-- ----------------------------

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `media_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `date_published` date NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_tags` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `meta_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `vote_count` int(11) NOT NULL DEFAULT 0,
  `share_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `posts_post_category_id_foreign`(`post_category_id`) USING BTREE,
  INDEX `posts_user_id_foreign`(`user_id`) USING BTREE,
  INDEX `posts_media_id_foreign`(`media_id`) USING BTREE,
  CONSTRAINT `posts_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `posts_post_category_id_foreign` FOREIGN KEY (`post_category_id`) REFERENCES `post_categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES (1, 1, 1, 2, '\'The King: Eternal Monarch\' Dijadwalkan Tamat Pada 12 Juni Mendatang. Drama Yang Tayang Di SBS Ini Akan Digantikan \'Backstreet Rookie\' Mulai 19 Juni Mendatang.', 'the-king-eternal-monarch-dijadwalkan-tamat-pada-12-juni-mendatang-drama-yang-tayang-di-sbs-ini-akan-digantikan-backstreet-rookie-mulai-19-juni-mendatang', 'zonakorea, leeminho', '2020-06-08', '<h2 class=\"title-semibold-dark size-c30\" style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.4;\"><span style=\"color: rgb(68, 68, 68); font-family: \"open sans\", sans-serif; font-size: 16px; font-weight: 400; text-transform: none;\">Zona Korea - \"The King: Eternal Monarch\"menghadirkan episode terbaru pada Sabtu (6/6). Pada episode ke-15 drama SBS itu, penonton disuguhi beragam adegan emosional antara Lee Gon (</span><span style=\"color: rgb(68, 68, 68); font-family: \"open sans\", sans-serif; font-size: 16px; font-weight: bolder; text-transform: none; box-sizing: inherit;\"><a href=\"https://www.wowkeren.com/seleb/lee_min_ho/\" style=\"box-sizing: inherit; color: rgb(0, 123, 255); touch-action: manipulation;\">Lee Min Ho</a></span><span style=\"color: rgb(68, 68, 68); font-family: \"open sans\", sans-serif; font-size: 16px; font-weight: 400; text-transform: none;\">) dan Jung Tae Eul (</span><span style=\"color: rgb(68, 68, 68); font-family: \"open sans\", sans-serif; font-size: 16px; font-weight: bolder; text-transform: none; box-sizing: inherit;\"><a href=\"https://www.wowkeren.com/seleb/kim_go_eun/\" style=\"box-sizing: inherit; color: rgb(0, 123, 255); touch-action: manipulation;\">Kim Go Eun</a></span><span style=\"color: rgb(68, 68, 68); font-family: \"open sans\", sans-serif; font-size: 16px; font-weight: 400; text-transform: none;\">).</span><span style=\"color: rgb(68, 68, 68); font-family: roboto, sans-serif; font-size: 16px; font-weight: 500; text-transform: capitalize;\"><br></span></h2><h2 class=\"title-semibold-dark size-c30\" style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; font-family: roboto, sans-serif; font-weight: 600; line-height: 1.4; color: rgb(17, 17, 17); font-size: 30px; text-transform: capitalize;\"><span style=\"color: rgb(68, 68, 68); font-size: 16px; font-weight: 500;\">Sayangnya, Lee Gon tak bisa lama merawat Jung Tae Eul karena ia masih mengemban misi mengembalikan kondisi dua dunia menjadi normal setelah pengkhianatan Lee Rim (</span><span style=\"color: rgb(68, 68, 68); font-size: 16px; box-sizing: inherit; font-weight: bolder;\"><a href=\"https://www.wowkeren.com/seleb/lee_jung_jin/\" style=\"box-sizing: inherit; color: rgb(0, 123, 255); touch-action: manipulation;\">Lee Jung Jin</a></span><span style=\"color: rgb(68, 68, 68); font-size: 16px; font-weight: 500;\">). Lee Gon berencana kembali ke masa saat dirinya hampir dibunuh Lee Rim.</span><br></h2><h2 class=\"title-semibold-dark size-c30\" style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; font-family: roboto, sans-serif; line-height: 1.4; color: rgb(17, 17, 17); font-size: 30px; text-transform: capitalize;\"><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" text-transform:=\"\" none;\"=\"\">Namun kali ini, Lee Gon berniat melakukan misi bunuh diri. Sang Raja ganteng tidak akan menyelamatkan nyawanya sendiri saat masih kecil. Lee Gon akan fokus untuk menghabisi Lee Rim agar dua dunia menjadi normal kembali.</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" text-transform:=\"\" none;\"=\"\"><a href=\"https://www.instagram.com/p/CBDot_gHwu_/?utm_source=ig_embed\">https://www.instagram.com/p/CBDot_gHwu_/?utm_source=ig_embed</a><br></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" text-transform:=\"\" none;\"=\"\">Episode terbaru \"The King: Eternal Monarch\" ini pun berhasil mengalami kenaikan rating meski tipis. Drama yang juga dibintangi <span style=\"box-sizing: inherit; font-weight: bolder;\"><a href=\"https://www.wowkeren.com/seleb/woo_do_hwan/\" style=\"box-sizing: inherit; color: rgb(0, 123, 255); touch-action: manipulation;\">Woo Do Hwan</a></span> dan <span style=\"box-sizing: inherit; font-weight: bolder;\"><a href=\"https://www.wowkeren.com/seleb/jung_eun_chae/\" style=\"box-sizing: inherit; color: rgb(0, 123, 255); touch-action: manipulation;\">Jung Eun Chae</a></span> itu mencatat rating menjadi 5,9 persen dan 8,1 persen.<br></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" text-transform:=\"\" none;\"=\"\">Episode ke-15 ini juga disambut antusias fans terbukti dari tagar <i style=\"box-sizing: inherit;\">#TheKingEternalMonarchep15</i> yang berhasil menjadi trending topik Twitter pada Minggu (7/6) pagi. Fans ramai menuntut drama ini memiliki akhir bahagia.</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" text-transform:=\"\" none;\"=\"\">\"<i style=\"box-sizing: inherit;\">Pokoknya episode 16 harus ada pernikahan pheyaa sama tae eul.. Hanya itu kebahagiaan penonton on going drama ini</i>,\" tulis seorang fans. \"<i style=\"box-sizing: inherit;\">Semoga happy ending. Biar pusingnya kita mikirin semua teori2 ini drama kebayar ya gaess</i>,\" sambung fans lainnya.</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" text-transform:=\"\" none;\"=\"\">Sementara itu, \"The King: Eternal Monarch\" dijadwalkan tamat pada 12 Juni mendatang. Drama ini akan digantikan \"<span style=\"box-sizing: inherit; font-weight: bolder;\">Backstreet Rookie</span>\" yang dibintangi <span style=\"box-sizing: inherit; font-weight: bolder;\"><a href=\"https://www.wowkeren.com/seleb/ji_chang_wook/\" style=\"box-sizing: inherit; color: rgb(0, 123, 255); touch-action: manipulation;\">Ji Chang Wook</a></span> dan <span style=\"box-sizing: inherit; font-weight: bolder;\"><a href=\"https://www.wowkeren.com/seleb/kim_yoo_jung/\" style=\"box-sizing: inherit; color: rgb(0, 123, 255); touch-action: manipulation;\">Kim Yoo Jung</a></span> mulai 19 Juni mendatang. Jangan sampai ketinggalan menyaksikan ya.</p><br></h2>', 'zonakorea, leeminho', 'ZONA KOREA as your comfort zone to enjoy news, fun content, and more facts about Korea and Kpop!', 0, 0, 0, '2020-06-08 22:52:26', '2020-06-08 22:56:35', NULL);
INSERT INTO `posts` VALUES (2, 1, 1, 1, 'Baeksang Arts Awards 2020: Kemenangan Kim Hee Ae Sebagai Best Actress Banjir Protes', 'baeksang-arts-awards-2020-kemenangan-kim-hee-ae-sebagai-best-actress-banjir-protes', 'zonakorea, theworldofmarried', '2020-06-08', '<p><span style=\"color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif; font-size: 16px;\">Baeksang Arts Awards 2020 sukses digelar pada Jumat (5/6). Tahun ini, ajang penghargaan yang dikenal sebagai \"Oscar Korea\" tersebut diselenggarakan di KINTEX Exhibition Hall 2, Ilsanseo-gu, Goyang, Provinsi Gyeonggi. Demi meminimalisir penyebaran virus Corona, ajang penghargaan ini digelar tanpa penonton&nbsp;</span><i style=\"box-sizing: inherit; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif; font-size: 16px;\">live</i><span style=\"color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif; font-size: 16px;\">.</span></p><p><span style=\"color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif; font-size: 16px;\">Nominasi Baeksang Arts Awards 2020 sendiri terdiri dari drama dan film yang tayang antara 1 April 2019 sampai 30 April 2020. Tahun ini pihak penyelenggara kembali menggaet&nbsp;</span><span style=\"box-sizing: inherit; font-weight: bolder; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif; font-size: 16px;\"><a href=\"https://www.wowkeren.com/seleb/suzy/\" style=\"box-sizing: inherit; color: rgb(0, 123, 255); touch-action: manipulation;\">Suzy</a></span><span style=\"color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif; font-size: 16px;\">,&nbsp;</span><span style=\"box-sizing: inherit; font-weight: bolder; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif; font-size: 16px;\"><a href=\"https://www.wowkeren.com/seleb/park_bo_gum/\" style=\"box-sizing: inherit; color: rgb(0, 123, 255); touch-action: manipulation;\">Park Bo Gum</a></span><span style=\"color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif; font-size: 16px;\">&nbsp;dan&nbsp;</span><span style=\"box-sizing: inherit; font-weight: bolder; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif; font-size: 16px;\"><a href=\"https://www.wowkeren.com/seleb/shin_dong_yup/\" style=\"box-sizing: inherit; color: rgb(0, 123, 255); touch-action: manipulation;\">Shin Dong Yup</a></span><span style=\"color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif; font-size: 16px;\">&nbsp;sebagai pemandu acara.</span></p><p><span style=\"color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif; font-size: 16px;\">Pada perhelatan Baeksang Arts Awards tahun ini, aktris senior&nbsp;</span><span style=\"box-sizing: inherit; font-weight: bolder; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif; font-size: 16px;\"><a href=\"https://www.wowkeren.com/seleb/kim_hee_ae/\" style=\"box-sizing: inherit; color: rgb(0, 123, 255); touch-action: manipulation;\">Kim Hee Ae</a></span><span style=\"color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif; font-size: 16px;\">&nbsp;berhasil&nbsp;</span><a href=\"https://wowkeren.com/berita/tampil/00314223.html\" style=\"box-sizing: inherit; background-color: rgb(255, 255, 255); color: rgb(0, 123, 255); touch-action: manipulation; font-family: &quot;open sans&quot;, sans-serif; font-size: 16px;\">membawa pulang piala</a><span style=\"color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif; font-size: 16px;\">&nbsp;untuk kategori&nbsp;</span><i style=\"box-sizing: inherit; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif; font-size: 16px;\">Best Actress</i><span style=\"color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif; font-size: 16px;\">&nbsp;atau Aktris Terbaik. Penghargaan ini ia dapatkan untuk perannya sebagai Ji Sun Woo dalam drama hit JTBC \"</span><span style=\"box-sizing: inherit; font-weight: bolder; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif; font-size: 16px;\">The World of the Married</span><span style=\"color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif; font-size: 16px;\">\".</span></p><p><a href=\"https://www.instagram.com/p/CBDJKZDJXAI/?utm_source=ig_embed\" target=\"_blank\">https://www.instagram.com/p/CBDJKZDJXAI/?utm_source=ig_embed</a><a href=\"https://www.instagram.com/p/CBDJKZDJXAI/?utm_source=ig_embed\"></a></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif;\">Namun sayangnya, kemenangan Kim Hee Ae menuai banyak sekali komentar protes dan tidak puas dari netizen Korea Selatan. Pasalnya netizen beranggapan jika Kim Hee Ae lebih pantas menerima&nbsp;<i style=\"box-sizing: inherit;\">Daesang</i>&nbsp;(Penghargaan Utama) alih-alih sebagai Aktris Terbaik, karena aktingnya sebagai Ji Sun Woo yang sangat memukau. Simak komentar mereka berikut ini.</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif;\">\"Bukankah seharusnya Kim Hee Ae mendapatkan&nbsp;<i style=\"box-sizing: inherit;\">Daesang</i>&nbsp;untuk kategori TV? Siapa yang mendapatkan&nbsp;<i style=\"box-sizing: inherit;\">Daesang</i>?\"</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif;\">\"Ini bukan&nbsp;<i style=\"box-sizing: inherit;\">Daesang</i>&nbsp;tapi Penghargaan Aktris Terbaik?\"</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif;\">\"Jika Kim Hee Ae tidak mendapatkan&nbsp;<i style=\"box-sizing: inherit;\">Daesang</i>, siapa yang akan mendapatkannya?\"</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif;\">\"Ketika \'<span style=\"box-sizing: inherit; font-weight: bolder;\">When the Camellia Blooms</span>\' mendapatkan&nbsp;<i style=\"box-sizing: inherit;\">Daesang</i>... Itu tidak benar....\"</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif;\">\"Kim Hee Ae seharusnya mendapatkan&nbsp;<i style=\"box-sizing: inherit;\">Daesang</i>...\"</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif;\">\"Tidak,&nbsp;<span style=\"box-sizing: inherit; font-weight: bolder;\"><a href=\"https://www.wowkeren.com/seleb/iu/\" style=\"box-sizing: inherit; color: rgb(0, 123, 255); touch-action: manipulation;\">IU</a></span>&nbsp;berada di kelas yang sama dengan Kim Hee Ae kekeke. Apa itu masuk akal? Apa?? Kekeke. Itu adalah hal terlucu yang pernah kulihat kekeke.\"</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif;\">Sementara itu, episode terakhir \"The World Of The Married\" sukses mencatat rekor baru untuk rating pemirsa tertinggi yang pernah dicapai oleh TV kabel. Menurut Nielsen Korea, episode terakhir \"The World Of The Married\" berhasil mencatat rating nasional rata-rata sebesar 28,37 persen.</p><p><span style=\"color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif; font-size: 16px;\"><br></span><span style=\"color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif; font-size: 16px;\"><br></span><span style=\"color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif; font-size: 16px;\"><br></span><br></p>', 'zonakorea, theworldofmarried', 'ZONA KOREA as your comfort zone to enjoy news, fun content, and more facts about Korea and Kpop!', 3, 4, 0, '2020-06-08 22:56:14', '2020-06-10 01:41:24', NULL);
INSERT INTO `posts` VALUES (3, 2, 1, 3, 'Permintaan Maaf Jungkook BTS Soal Itaewon Dapat Respon Hangat, Netizen Minta Lakukan Ini', 'permintaan-maaf-jungkook-bts-soal-itaewon-dapat-respon-hangat-netizen-minta-lakukan-ini', 'zonakorea, korea', '2020-06-08', '<p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif;\">&nbsp;<span style=\"box-sizing: inherit; font-weight: bolder;\"><a href=\"https://www.wowkeren.com/seleb/jungkook/\" style=\"box-sizing: inherit; color: rgb(0, 123, 255); touch-action: manipulation;\">Jungkook</a></span>&nbsp;BTS (<span style=\"box-sizing: inherit; font-weight: bolder;\"><a href=\"https://www.wowkeren.com/seleb/bangtan_boys/\" style=\"box-sizing: inherit; color: rgb(0, 123, 255); touch-action: manipulation;\">Bangtan Boys</a></span>) menyapa para penggemar lewat siaran audio live bersama&nbsp;<span style=\"box-sizing: inherit; font-weight: bolder;\"><a href=\"https://www.wowkeren.com/seleb/suga/\" style=\"box-sizing: inherit; color: rgb(0, 123, 255); touch-action: manipulation;\">Suga</a></span>&nbsp;Sabtu (6/6) lalu. Pada kesempatan tersebut, member termuda BTS itu&nbsp;<a href=\"https://www.wowkeren.com/berita/tampil/00314326.html\" style=\"box-sizing: inherit; color: rgb(0, 123, 255); touch-action: manipulation;\">meminta maaf</a>&nbsp;atas kunjungannya ke Itaewon bersama member 97 Line April lalu.</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif;\">Jungkook mengatakan bahwa ia merasa sangat bersalah pada mereka yang merasa kesulitan dengan situasi saat ini, mereka yang bekerja keras di semua tempat, dan kepada para member BTS. Ia juga merasa bersalah pada ARMY yang ikut mengalami masa sulit. Jadi hatinya pun ikut sakit.</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif;\">Di sini, Jungkook mengungkapkan bahwa ia banyak banyak mengobrol dengan para member BTS dan merenungi diri. Penyanyi kelahiran 1997 itu juga berjanji bahwa mulai sekarang, kapan pun dan di mana pun, ia akan lebih serius dalam berpikir dan bertindak.</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif;\">Permintaan maaf Jungkook ini mendapat tanggapan dari para netizen. Merasakan kesungguhan pemilik nama lengkap Jeon Jungkook tersebut, mereka pun menanggapi dengan hangat. Mereka juga meminta agar ia lebih berhati-hati ke depannya.</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif;\">\"Orang-orang marah karena dia meminta maaf setelah sekian lama tapi kalian juga harus tahu bahwa meskipun dia tahu jika dia meminta maaf sekarang, dia mengungkit skandal itu lagi setelah orang-orang mulai melupakannya, tapi dia masih meminta maaf. Aku percaya dia meluangkan waktu untuk merenung dan aku berharap dia menunjukkan kedewasaan ke depannya.\"</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif;\">\"Dia tidak benar-benar pergi ke kelab malam tapi media melaporkan ini seolah-olah dia ke kelab. Para wartawan juga harus minta maaf. Haruskah aku diperlakukan seperti penjahat jika aku pergi ke restoran dan seminggu kemudian, kasus yang dikonfirmasi keluar? Kenapa mereka selalu menemukan cara untuk mengkritik selebriti? Dia bahkan mengenakan masker sepanjang waktu dan tidak ada yang mengenalinya.\"</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif;\">\"Terima kasih telah meminta maaf kepada fansmu dengan tulus. Aku tahu pasti sulit bagimu untuk mengungkit lagi masalah ini ketika media mulai melupakannya. Aku bisa merasakan cerminan asli dalam suaramu ketika kau mengatakan bahwa kau banyak berpikir dan berjanji untuk lebih berhati-hati di masa depan. Aku sangat berharap kau berhati-hati di masa depan dan kami hanya melihatmu di berita positif!\"</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif;\">\"Ya, renungkan dan jangan lakukan lagi di masa mendatang. Kaulah yang membantu negara kita untuk bersinar. Ini akan sulit, tapi tolong tunjukkan padaku hal-hal baikmu di masa depan!\"</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif;\">\"Orang-orang selalu bergegas membenci BTS setiap kali melihat artikel tentang mereka tapi hater benar-benar perlu berhenti. Sejujurnya, kalian akan membenci mereka tidak peduli apa yang mereka lakukan, dan itu adalah penyakit mental. Aku benar-benar tidak mengerti bagaimana beberapa orang bisa cukup marah untuk membenci orang lain seperti ini.\"</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif;\">\"Mendengar permintaan maafnya melalui suaranya sendiri, aku merasakan ketulusannya.\"</p><p style=\"box-sizing: inherit; margin: 0px 0px 20px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"></p>', 'zonakorea, korea', NULL, 0, 0, 0, '2020-06-08 22:58:55', '2020-06-08 22:58:55', NULL);
INSERT INTO `posts` VALUES (4, 2, 1, 4, 'Baeksang Arts Awards 2020: Kecantikan Son Ye Jin Dipuji Tak Tertandingi', 'baeksang-arts-awards-2020-kecantikan-son-ye-jin-dipuji-tak-tertandingi', NULL, '2020-06-08', '<p><span style=\"box-sizing: inherit; font-weight: bolder; color: rgb(68, 68, 68); font-family: \"open sans\", sans-serif; font-size: 16px;\"><a href=\"https://www.wowkeren.com/seleb/son_ye_jin/\" style=\"box-sizing: inherit; color: rgb(0, 123, 255); touch-action: manipulation;\">Son Ye Jin</a></span><span style=\"color: rgb(68, 68, 68); font-family: \"open sans\", sans-serif; font-size: 16px;\"> turut menghadiri </span><span style=\"box-sizing: inherit; font-weight: bolder; color: rgb(68, 68, 68); font-family: \"open sans\", sans-serif; font-size: 16px;\">Baeksang Arts Awards 2020</span><span style=\"color: rgb(68, 68, 68); font-family: \"open sans\", sans-serif; font-size: 16px;\"> yang tahun ini dilangsungkan pada 5 Juni di KINTEX Hall di Ilsan, Provinsi Gyeonggi mulai pukul 5 sore waktu setempat. Penampilan cantik aktris kelahiran 1982 itu sukses memukau banyak netizen yang memujinya tak tertandingi.</span></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: \"open sans\", sans-serif;\">Meski kalah, Son Ye Jin menjadi topik perbincangan hangat karena kecantikannya yang berkelas dalam balutan gaun sederhana. Netizen menyebut levelnya setara tiga aktris Korea <span style=\"box-sizing: inherit; font-weight: bolder;\"><a href=\"https://www.wowkeren.com/seleb/kim_tae_hee/\" style=\"box-sizing: inherit; color: rgb(0, 123, 255); touch-action: manipulation;\">Kim Tae Hee</a></span>, <span style=\"box-sizing: inherit; font-weight: bolder;\"><a href=\"https://www.wowkeren.com/seleb/song_hye_kyo/\" style=\"box-sizing: inherit; color: rgb(0, 123, 255); touch-action: manipulation;\">Song Hye Kyo</a></span> dan <span style=\"box-sizing: inherit; font-weight: bolder;\"><a href=\"https://www.wowkeren.com/seleb/jun_ji_hyun/\" style=\"box-sizing: inherit; color: rgb(0, 123, 255); touch-action: manipulation;\">Jun Ji Hyun</a></span>. Beberapa juga mengagumi tubuh seksinya meski tampil sederhana.</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: \"open sans\", sans-serif;\">\"Dia benar-benar sangat cantik.\"</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: \"open sans\", sans-serif;\">\"Kenapa Son Ye Jin tidak termasuk dalam level Kim Tae Hee, Song Hye Kyo dan Jun Ji Hyun? Akting, karier dan kecantikannya ada di puncak!\"</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: \"open sans\", sans-serif;\">\"Son Ye Jin. Dia semakin tua, tapi masih terlihat sangat cantik. Kepolosan Son Ye Jin dalam film-film klasik tak tertandingi. Kini kecantikan dan bentuk tubuhnya juga tak tertandingi.\"</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: \"open sans\", sans-serif;\">\"Dia akan selalu berkelas.\"</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: \"open sans\", sans-serif;\">\"Woah, dia seorang Dewi!\"</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: \"open sans\", sans-serif;\">\"Woah, dia masih sangat cantik.\"</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: \"open sans\", sans-serif;\">\"Dia serius terlihat sangat cantik. Aku iri padanya.\"</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: \"open sans\", sans-serif;\">\"Dia adalah aktris yang hebat dan dapat dipercaya yang bekerja sangat keras dalam akting dan hal-hal lainnya.\"</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: \"open sans\", sans-serif;\">\"Dia selalu cantik, tapi dia terlihat lebih cantik saat berakting.\"</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: \"open sans\", sans-serif;\">\"Wajahnya cantik dan tubuhnya seksi. Benar-benar tak tertandingi.\"</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: \"open sans\", sans-serif;\">Sementara itu, daftar pemenang lengkap Baeksang Arts Awards 2020 untuk kategori televisi bisa dilihat <a href=\"https://wowkeren.com/berita/tampil/00314223.html\" style=\"box-sizing: inherit; color: rgb(0, 123, 255); touch-action: manipulation;\">di sini</a>. Untuk kategori film, daftar pemenang lengkapnya bisa dilihat <a href=\"https://wowkeren.com/berita/tampil/00314229.html\" style=\"box-sizing: inherit; color: rgb(0, 123, 255); touch-action: manipulation;\">di sini</a>.</p><p><br></p>', NULL, NULL, 0, 0, 0, '2020-06-08 23:00:22', '2020-06-08 23:00:34', NULL);
INSERT INTO `posts` VALUES (5, 1, 1, 5, 'Ditipu 12 Miliar, Momen Lisa Bareng Mantan Manajer Di Bandara Bikin Sakit Hati', 'ditipu-12-miliar-momen-lisa-bareng-mantan-manajer-di-bandara-bikin-sakit-hati', NULL, '2020-06-08', '<p><span style=\"box-sizing: inherit; font-weight: bolder; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif; font-size: 16px;\"><a href=\"https://www.wowkeren.com/seleb/lisa/\" style=\"box-sizing: inherit; color: rgb(0, 123, 255); touch-action: manipulation;\">Lisa</a></span><span style=\"color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif; font-size: 16px;\">&nbsp;</span><span style=\"box-sizing: inherit; font-weight: bolder; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif; font-size: 16px;\">BLACKPINK</span><span style=\"color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif; font-size: 16px;\">&nbsp;(</span><span style=\"box-sizing: inherit; font-weight: bolder; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif; font-size: 16px;\"><a href=\"https://www.wowkeren.com/seleb/black_pink/\" style=\"box-sizing: inherit; color: rgb(0, 123, 255); touch-action: manipulation;\">Black Pink</a></span><span style=\"color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif; font-size: 16px;\">) terungkap menjadi&nbsp;</span><a href=\"https://wowkeren.com/berita/tampil/00313487.html\" style=\"box-sizing: inherit; background-color: rgb(255, 255, 255); color: rgb(0, 123, 255); touch-action: manipulation; font-family: &quot;open sans&quot;, sans-serif; font-size: 16px;\">korban penipuan</a><span style=\"color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif; font-size: 16px;\">&nbsp;1 miliar won atau sekitar Rp 12 miliar oleh manajernya sendiri. Menyusul masalah ini, momen ketika Lisa menghampiri manajernya di bandara menjadi sorotan di komunitas online.</span></p><p><span style=\"color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif; font-size: 16px;\">Dalam klip yang beredar, Lisa terlihat berlari sambil tersenyum segera setelah melihat manajernya di bandara. Hanya dengan melihatnya saja, kita mengetahui bahwa Lisa sangat menyayangi manajernya itu.</span></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif;\">\"Orang yang dihampiri Lisa dengan berlari ke arahnya dan tersenyum adalah mantan manajernya yang menipunya. Lisa berlari dengan riang,\" bunyi postingan. Ini membuat netizen sakit hati.</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px;\"><a href=\"https://tenor.com/1sHG.gif\" target=\"_blank\">https://tenor.com/1sHG.gif</a><br></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif;\">\"Manajer sialan, tidak peduli apa kata orang, bagaimana kau bisa berpikir untuk mengambil uang seorang anak muda yang bekerja sangat keras selama bertahun-tahun? Dan 1 miliar won? Bersyukurlah bahwa Lisa tidak mengambil tindakan hukum yang keras terhadapmu. Jika itu aku, kau pasti sudah makan makanan penjara.\"</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif;\">\"Ini sangat memalukan bagi Korea, Lisa pasti sangat terluka.\"</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif;\">\"Ketika aku mendengar berita ini, aku berpikir tentang waktu dia berlari ke arah manajernya. Pada saat itu, para penggemar mengatakan betapa mereka menyukai chemistry mereka dan menyuruhnya untuk merawat Lisa selama sisa hidupnya.\"</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif;\"><video controls=\"\" src=\"https://www.wowkeren.com/display/videos/2020/06/05/00314057v1.mp4\" width=\"640\" height=\"360\" class=\"note-video-clip\"></video><br></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif;\">\"Para pria di YG semuanya abnormal, bahkan manajer mereka.\"</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif;\">\"Aku tidak tahu apa-apa lagi, tapi aku khawatir betapa sakitnya perasaannya. Uang adalah uang, tapi uang dapat dipulihkan. Tapi begitu kau dikhianati, sulit untuk mempercayai seseorang lagi.\"</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif;\">\"Dia benar-benar pandai berakting di depan kamera, aku menyukainya karena kepribadiannya yang baik. Bagaimana dia bisa memikirkan untuk menipu Lisa. Dia sampah. Lisa adalah malaikat.\"</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif;\">Lisa ditipu oleh mantan manajernya dengan alasan mencari real estat untuknya tapi menggunakan semua uangnya untuk berjudi. Meskipun tidak ada kepastian apakah ia berbicara tentang cobaan itu dalam wawancara, klip saat ini sedang tren online dari spekulasi bahwa mungkin ada hubungannya.</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif;\">Sementara itu, YG Entertainment merilis pernyataan resmi membenarkan bahwa Lisa ditipu oleh mantan manajernya sendiri. Agensi meminta maaf karena kejadian yang sangat disayangkan ini harus terjadi.</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 28px; font-size: 16px; color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif;\">YG juga menyatakan bahwa Lisa ingin menyelesaikan permasalahan secara damai dan si mantan manajer pun telah setuju untuk mengembalikan uangnya. Meski sudah ditipu, Lisa tetap memaafkan mantan manajernya tersebut.</p><p><span style=\"color: rgb(68, 68, 68); font-family: &quot;open sans&quot;, sans-serif; font-size: 16px;\"><br></span><br></p>', NULL, NULL, 0, 0, 0, '2020-06-08 23:04:25', '2020-06-08 23:04:25', NULL);

-- ----------------------------
-- Table structure for services
-- ----------------------------
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `media_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `services_media_id_foreign`(`media_id`) USING BTREE,
  CONSTRAINT `services_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of services
-- ----------------------------

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_tags` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `meta_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `favicon` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `logo` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `banner` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `flag_slider` smallint(6) NOT NULL DEFAULT 0,
  `flag_service` smallint(6) NOT NULL DEFAULT 0,
  `flag_client` smallint(6) NOT NULL DEFAULT 0,
  `flag_client_review` smallint(6) NOT NULL DEFAULT 0,
  `flag_partner` smallint(6) NOT NULL DEFAULT 0,
  `flag_post_comment` smallint(6) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of settings
-- ----------------------------

-- ----------------------------
-- Table structure for sliders
-- ----------------------------
DROP TABLE IF EXISTS `sliders`;
CREATE TABLE `sliders`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `media_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sliders_media_id_foreign`(`media_id`) USING BTREE,
  CONSTRAINT `sliders_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sliders
-- ----------------------------

-- ----------------------------
-- Table structure for user_level_credentials
-- ----------------------------
DROP TABLE IF EXISTS `user_level_credentials`;
CREATE TABLE `user_level_credentials`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_level_id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `is_allowed` smallint(6) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_level_credentials_user_level_id_foreign`(`user_level_id`) USING BTREE,
  INDEX `user_level_credentials_module_id_foreign`(`module_id`) USING BTREE,
  CONSTRAINT `user_level_credentials_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `user_level_credentials_user_level_id_foreign` FOREIGN KEY (`user_level_id`) REFERENCES `user_levels` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_level_credentials
-- ----------------------------
INSERT INTO `user_level_credentials` VALUES (1, 1, 1, 1, '2020-06-08 22:25:08', '2020-06-08 22:25:08', NULL);
INSERT INTO `user_level_credentials` VALUES (2, 1, 2, 1, '2020-06-08 22:25:08', '2020-06-08 22:25:08', NULL);
INSERT INTO `user_level_credentials` VALUES (3, 1, 3, 1, '2020-06-08 22:25:08', '2020-06-08 22:25:08', NULL);
INSERT INTO `user_level_credentials` VALUES (4, 1, 4, 1, '2020-06-08 22:25:08', '2020-06-08 22:25:08', NULL);
INSERT INTO `user_level_credentials` VALUES (5, 1, 5, 1, '2020-06-08 22:25:08', '2020-06-08 22:25:08', NULL);
INSERT INTO `user_level_credentials` VALUES (6, 1, 6, 1, '2020-06-08 22:25:08', '2020-06-08 22:25:08', NULL);
INSERT INTO `user_level_credentials` VALUES (7, 1, 7, 1, '2020-06-08 22:25:08', '2020-06-08 22:25:08', NULL);
INSERT INTO `user_level_credentials` VALUES (8, 1, 8, 1, '2020-06-08 22:25:08', '2020-06-08 22:25:08', NULL);
INSERT INTO `user_level_credentials` VALUES (9, 1, 9, 1, '2020-06-08 22:25:08', '2020-06-08 22:25:08', NULL);
INSERT INTO `user_level_credentials` VALUES (10, 1, 10, 1, '2020-06-08 22:25:08', '2020-06-08 22:25:08', NULL);
INSERT INTO `user_level_credentials` VALUES (11, 1, 11, 1, '2020-06-08 22:25:08', '2020-06-08 22:25:08', NULL);
INSERT INTO `user_level_credentials` VALUES (12, 1, 12, 1, '2020-06-08 22:25:08', '2020-06-08 22:25:08', NULL);
INSERT INTO `user_level_credentials` VALUES (13, 1, 13, 1, '2020-06-08 22:25:08', '2020-06-08 22:25:08', NULL);
INSERT INTO `user_level_credentials` VALUES (14, 1, 14, 1, '2020-06-08 22:25:08', '2020-06-08 22:25:08', NULL);
INSERT INTO `user_level_credentials` VALUES (15, 2, 1, 0, '2020-06-08 22:31:19', '2020-06-08 22:31:19', NULL);
INSERT INTO `user_level_credentials` VALUES (16, 2, 2, 0, '2020-06-08 22:31:19', '2020-06-08 22:31:19', NULL);
INSERT INTO `user_level_credentials` VALUES (17, 2, 3, 0, '2020-06-08 22:31:19', '2020-06-08 22:31:19', NULL);
INSERT INTO `user_level_credentials` VALUES (18, 2, 4, 0, '2020-06-08 22:31:19', '2020-06-08 22:31:19', NULL);
INSERT INTO `user_level_credentials` VALUES (19, 2, 5, 0, '2020-06-08 22:31:19', '2020-06-08 22:31:19', NULL);
INSERT INTO `user_level_credentials` VALUES (20, 2, 6, 0, '2020-06-08 22:31:19', '2020-06-08 22:31:19', NULL);
INSERT INTO `user_level_credentials` VALUES (21, 2, 7, 0, '2020-06-08 22:31:19', '2020-06-08 22:31:19', NULL);
INSERT INTO `user_level_credentials` VALUES (22, 2, 8, 0, '2020-06-08 22:31:19', '2020-06-08 22:31:19', NULL);
INSERT INTO `user_level_credentials` VALUES (23, 2, 9, 1, '2020-06-08 22:31:19', '2020-06-08 22:31:19', NULL);
INSERT INTO `user_level_credentials` VALUES (24, 2, 10, 1, '2020-06-08 22:31:19', '2020-06-08 22:31:19', NULL);
INSERT INTO `user_level_credentials` VALUES (25, 2, 11, 1, '2020-06-08 22:31:19', '2020-06-08 22:31:19', NULL);
INSERT INTO `user_level_credentials` VALUES (26, 2, 12, 0, '2020-06-08 22:31:19', '2020-06-08 22:31:19', NULL);
INSERT INTO `user_level_credentials` VALUES (27, 2, 13, 0, '2020-06-08 22:31:19', '2020-06-08 22:31:19', NULL);
INSERT INTO `user_level_credentials` VALUES (28, 2, 14, 0, '2020-06-08 22:31:19', '2020-06-08 22:31:19', NULL);

-- ----------------------------
-- Table structure for user_levels
-- ----------------------------
DROP TABLE IF EXISTS `user_levels`;
CREATE TABLE `user_levels`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_levels
-- ----------------------------
INSERT INTO `user_levels` VALUES (1, 'SuperAdmin', NULL, '2020-06-08 22:25:08', '2020-06-08 22:25:08', NULL);
INSERT INTO `user_levels` VALUES (2, 'Editor', NULL, '2020-06-08 22:29:39', '2020-06-08 22:29:39', NULL);

-- ----------------------------
-- Table structure for user_logs
-- ----------------------------
DROP TABLE IF EXISTS `user_logs`;
CREATE TABLE `user_logs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_logs_user_id_foreign`(`user_id`) USING BTREE,
  CONSTRAINT `user_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_logs
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `user_level_id` bigint(20) UNSIGNED NOT NULL,
  `media_id` bigint(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE,
  INDEX `users_user_level_id_foreign`(`user_level_id`) USING BTREE,
  CONSTRAINT `users_user_level_id_foreign` FOREIGN KEY (`user_level_id`) REFERENCES `user_levels` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Super Admin', 'superadmin@gmail.com', NULL, '$2y$10$q2VeRYoBsAV97XgzFAnjcea7M3DrL2NBpXBxCaUhFEOxr.35ujesi', NULL, '2020-06-08 22:25:08', '2020-06-10 00:54:14', NULL, 1, 6);
INSERT INTO `users` VALUES (2, 'Acid', 'astrid@hashentertainment.co', NULL, '$2y$10$/fo6Dt583/soJA9b4LsTnu76JOxq6bYBwFqEAgcLKCNdMIZbcka82', NULL, '2020-06-08 22:32:18', '2020-06-10 00:54:03', NULL, 2, 6);

SET FOREIGN_KEY_CHECKS = 1;
