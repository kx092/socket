/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : bendiceshi

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-08-27 17:49:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tp5_jobs
-- ----------------------------
DROP TABLE IF EXISTS `tp5_jobs`;
CREATE TABLE `tp5_jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp5_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for tp5_msg
-- ----------------------------
DROP TABLE IF EXISTS `tp5_msg`;
CREATE TABLE `tp5_msg` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `msg` varchar(250) DEFAULT NULL COMMENT '消息',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '发送时间',
  `from` varchar(255) DEFAULT NULL COMMENT '来自哪个用户',
  `to` varchar(255) DEFAULT NULL COMMENT '发给那个用户',
  `type` varchar(255) DEFAULT NULL COMMENT '消息类型',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tp5_msg
-- ----------------------------
INSERT INTO `tp5_msg` VALUES ('1', '发送', '2019-08-27 16:22:03', 'user', '', 'public');
INSERT INTO `tp5_msg` VALUES ('2', 'fd', '2019-08-27 16:22:12', 'ffdfd', '', 'public');
INSERT INTO `tp5_msg` VALUES ('3', '好玩', '2019-08-27 16:22:24', 'ffdfd', '', 'public');
INSERT INTO `tp5_msg` VALUES ('4', '谁说不是呢？', '2019-08-27 16:22:32', 'user', '', 'public');
INSERT INTO `tp5_msg` VALUES ('5', '发送', '2019-08-27 16:24:23', 'user', '', 'public');
INSERT INTO `tp5_msg` VALUES ('6', 'fa', '2019-08-27 16:24:29', 'ffdfd', '', 'public');
INSERT INTO `tp5_msg` VALUES ('7', '发', '2019-08-27 16:25:03', 'user', '', 'public');
INSERT INTO `tp5_msg` VALUES ('8', 'fd', '2019-08-27 16:25:06', 'ffdfd', '', 'public');
INSERT INTO `tp5_msg` VALUES ('9', '发的', '2019-08-27 16:25:44', 'user', '', 'public');
INSERT INTO `tp5_msg` VALUES ('10', 'fd', '2019-08-27 16:25:53', 'ffdfd', '', 'public');
INSERT INTO `tp5_msg` VALUES ('11', 'fd ', '2019-08-27 17:21:04', 'user', '', 'public');
INSERT INTO `tp5_msg` VALUES ('12', 'fdf', '2019-08-27 17:21:11', 'user2', '', 'public');
INSERT INTO `tp5_msg` VALUES ('13', 'fd', '2019-08-27 17:21:13', 'user2', '', 'public');
INSERT INTO `tp5_msg` VALUES ('14', 'fa', '2019-08-27 17:25:09', 'user2', 'user', 'private');
INSERT INTO `tp5_msg` VALUES ('15', '我收到', '2019-08-27 17:25:34', 'user', 'user2', 'private');
INSERT INTO `tp5_msg` VALUES ('16', 'fd', '2019-08-27 17:32:15', 'userto', '', 'public');
INSERT INTO `tp5_msg` VALUES ('17', 'fd', '2019-08-27 17:32:31', 'user2', 'user', 'private');

-- ----------------------------
-- Table structure for tp5_test
-- ----------------------------
DROP TABLE IF EXISTS `tp5_test`;
CREATE TABLE `tp5_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_type` varchar(255) NOT NULL,
  `data` text NOT NULL,
  `pdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp5_test
-- ----------------------------
INSERT INTO `tp5_test` VALUES ('24', 'task one', '{\"ts\":1566875525,\"bizId\":\"5d649f85ea754\",\"data\":{\"name\":\"name\",\"time\":1566875525}}', '0000-00-00 00:00:00');
INSERT INTO `tp5_test` VALUES ('21', 'task one', '{\"ts\":1566873878,\"bizId\":\"5d649916a395c\",\"data\":{\"name\":\"name\",\"time\":1566873878}}', '0000-00-00 00:00:00');
INSERT INTO `tp5_test` VALUES ('22', 'task one', '{\"ts\":1566874085,\"bizId\":\"5d6499e5105e0\",\"data\":{\"name\":\"name\",\"time\":1566874085}}', '0000-00-00 00:00:00');
INSERT INTO `tp5_test` VALUES ('23', 'task one', '{\"ts\":1566874839,\"bizId\":\"5d649cd7dad2f\",\"data\":{\"name\":\"name\",\"time\":1566874839}}', '0000-00-00 00:00:00');
INSERT INTO `tp5_test` VALUES ('25', '', '{\"arg1\":1,\"arg2\":2}', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for tp5_test2
-- ----------------------------
DROP TABLE IF EXISTS `tp5_test2`;
CREATE TABLE `tp5_test2` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_no` varchar(50) DEFAULT NULL COMMENT '订单号',
  `msg` varchar(255) DEFAULT NULL COMMENT '消息内容',
  `status` tinyint(1) DEFAULT NULL COMMENT '状态 0未执行，1 执行',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  `data` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='测试表';

-- ----------------------------
-- Records of tp5_test2
-- ----------------------------
INSERT INTO `tp5_test2` VALUES ('1', '438476', '438476', '0', '2019-08-24 18:05:21', '0000-00-00 00:00:00', null);
