/*
 Navicat Premium Data Transfer

 Source Server         : db1
 Source Server Type    : MySQL
 Source Server Version : 80030
 Source Host           : localhost:3306
 Source Schema         : student

 Target Server Type    : MySQL
 Target Server Version : 80030
 File Encoding         : 65001

 Date: 11/06/2023 17:28:17
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for book
-- ----------------------------
DROP TABLE IF EXISTS `book`;
CREATE TABLE `book`  (
  `book_id` int NOT NULL AUTO_INCREMENT,
  `book_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `piles` int NOT NULL,
  PRIMARY KEY (`book_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 38 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of book
-- ----------------------------
INSERT INTO `book` VALUES (1, '《老人与海》', 27);
INSERT INTO `book` VALUES (2, '《假如给我三天光明》', 8);
INSERT INTO `book` VALUES (3, '《红玫瑰旅馆的客人》', 2);
INSERT INTO `book` VALUES (4, '《平凡的世界》', 5);
INSERT INTO `book` VALUES (5, '《活着》', 11);
INSERT INTO `book` VALUES (6, '《我本芬芳》', 2);
INSERT INTO `book` VALUES (7, '《牛马》', 4);
INSERT INTO `book` VALUES (8, '《墨菲定律》', 2);

-- ----------------------------
-- Table structure for manager_info
-- ----------------------------
DROP TABLE IF EXISTS `manager_info`;
CREATE TABLE `manager_info`  (
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  UNIQUE INDEX `manager_info_username_uindex`(`username`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of manager_info
-- ----------------------------
INSERT INTO `manager_info` VALUES ('root', 'root');

-- ----------------------------
-- Table structure for student_books
-- ----------------------------
DROP TABLE IF EXISTS `student_books`;
CREATE TABLE `student_books`  (
  `stuid` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `book_id` int NOT NULL,
  `borrow_time` datetime NULL DEFAULT NULL,
  INDEX `student_books_student_info_stuid_fk`(`stuid`) USING BTREE,
  INDEX `student_books_book_book_id_fk`(`book_id`) USING BTREE,
  CONSTRAINT `student_books_book_book_id_fk` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `student_books_student_info_stuid_fk` FOREIGN KEY (`stuid`) REFERENCES `student_info` (`stuid`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of student_books
-- ----------------------------
INSERT INTO `student_books` VALUES ('root', 2, '2023-06-11 17:01:38');
INSERT INTO `student_books` VALUES ('root', 2, '2023-06-11 17:01:41');
INSERT INTO `student_books` VALUES ('root', 3, '2023-06-11 17:01:43');
INSERT INTO `student_books` VALUES ('2020131100', 1, '2023-06-11 17:02:12');
INSERT INTO `student_books` VALUES ('2020131100', 1, '2023-06-11 17:02:15');
INSERT INTO `student_books` VALUES ('2020131601', 1, '2023-06-11 17:02:53');
INSERT INTO `student_books` VALUES ('2020131601', 2, '2023-06-11 17:02:55');
INSERT INTO `student_books` VALUES ('2020131601', 3, '2023-06-11 17:02:57');

-- ----------------------------
-- Table structure for student_info
-- ----------------------------
DROP TABLE IF EXISTS `student_info`;
CREATE TABLE `student_info`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `stuid` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `stuname` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `stusex` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '123456',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `student_info_stuid_uindex`(`stuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 52 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of student_info
-- ----------------------------
INSERT INTO `student_info` VALUES (1, '2020132030', '刘旺龙', '男', '123456');
INSERT INTO `student_info` VALUES (2, '2020140406', '吴涛', '男', '123456');
INSERT INTO `student_info` VALUES (3, '2020132362', '张碧麒', '男', '123456');
INSERT INTO `student_info` VALUES (4, '2020131100', '陈向凡', '男', '123456');
INSERT INTO `student_info` VALUES (5, '2020131700', '徐雨轩', '男', '123456');
INSERT INTO `student_info` VALUES (6, '2018140716', '陈长烽', '男', '123456');
INSERT INTO `student_info` VALUES (7, '2020130845', '田宵', '女', '123456');
INSERT INTO `student_info` VALUES (8, '2020131607', '刘静', '女', '123456');
INSERT INTO `student_info` VALUES (9, '2020131601', '朱心怡', '女', '123456');
INSERT INTO `student_info` VALUES (10, '2020131648', '王名科', '男', '123456');
INSERT INTO `student_info` VALUES (11, '2020132123', '罗鑫宇', '男', '123456');
INSERT INTO `student_info` VALUES (12, '2020131702', '唐虎', '男', '123456');
INSERT INTO `student_info` VALUES (13, '2020131633', '黄园园', '女', '123456');
INSERT INTO `student_info` VALUES (14, '2020131638', '董艳姣', '女', '123456');
INSERT INTO `student_info` VALUES (15, '2020140154', '胡玉平', '女', '123456');
INSERT INTO `student_info` VALUES (43, 'root', '夏天文', '男', '666');

SET FOREIGN_KEY_CHECKS = 1;
