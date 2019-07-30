/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 50553
 Source Host           : localhost:3306
 Source Schema         : my1

 Target Server Type    : MySQL
 Target Server Version : 50553
 File Encoding         : 65001

 Date: 30/07/2019 17:34:22
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_ms
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ms`;
CREATE TABLE `tbl_ms`  (
  `username` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`username`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_ms
-- ----------------------------
INSERT INTO `tbl_ms` VALUES ('15727752774', '123456');
INSERT INTO `tbl_ms` VALUES ('admin', '123456');

-- ----------------------------
-- Table structure for tbl_ms1
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ms1`;
CREATE TABLE `tbl_ms1`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `title` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `author` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ip` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `liuyan` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `time` time NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user`(`user`) USING BTREE,
  CONSTRAINT `tbl_ms1_ibfk_1` FOREIGN KEY (`user`) REFERENCES `tbl_ms` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_ms1
-- ----------------------------
INSERT INTO `tbl_ms1` VALUES (5, 'admin', '中国', 'admin', '127.0.0.1', '强大的中国', '10:18:09');
INSERT INTO `tbl_ms1` VALUES (8, 'admin', '强大的中国', 'luke', '127.0.0.1', '中国好强大', '10:30:09');
INSERT INTO `tbl_ms1` VALUES (9, 'admin', '强大的中国', 'luke', '127.0.0.1', 'dddd', '10:33:01');
INSERT INTO `tbl_ms1` VALUES (10, '15727752774', '这是一件事', 'luke', '127.0.0.1', '这是不是一件事情', '11:00:28');

SET FOREIGN_KEY_CHECKS = 1;
