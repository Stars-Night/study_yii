/*
 Navicat MySQL Data Transfer

 Source Server         : 127.0.0.1_3306
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : 127.0.0.1:3306
 Source Schema         : yii2study

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 12/12/2021 16:10:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for country
-- ----------------------------
DROP TABLE IF EXISTS `country`;
CREATE TABLE `country`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` char(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` char(52) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `population` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of country
-- ----------------------------
INSERT INTO `country` VALUES (1, 'AU', 'Australia', 188860001);
INSERT INTO `country` VALUES (2, 'BR', 'Brazil', 170115000);
INSERT INTO `country` VALUES (3, 'CA', 'Canada', 1147000);
INSERT INTO `country` VALUES (4, 'CN', 'China', 1277558000);
INSERT INTO `country` VALUES (5, 'DE', 'Germany', 82164700);
INSERT INTO `country` VALUES (6, 'FR', 'France', 59225700);
INSERT INTO `country` VALUES (7, 'GB', 'United Kingdom', 59623400);
INSERT INTO `country` VALUES (8, 'IN', 'India', 1013662000);
INSERT INTO `country` VALUES (9, 'RU', 'Russia', 146934000);
INSERT INTO `country` VALUES (10, 'US', 'United States', 278357000);

SET FOREIGN_KEY_CHECKS = 1;
