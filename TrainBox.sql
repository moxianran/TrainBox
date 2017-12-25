/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50718
Source Host           : 127.0.0.1:3306
Source Database       : TrainBox

Target Server Type    : MYSQL
Target Server Version : 50718
File Encoding         : 65001

Date: 2017-12-25 11:30:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_admin
-- ----------------------------
DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `salt` int(4) NOT NULL DEFAULT '1234' COMMENT '随机四位整数',
  `nickname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `position_id` int(11) NOT NULL COMMENT '权限id',
  `login_times` int(11) NOT NULL DEFAULT '0' COMMENT '登录次数',
  `last_login_time` int(10) NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `last_login_ip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` int(10) NOT NULL DEFAULT '0',
  `update_time` int(10) NOT NULL DEFAULT '0',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tb_admin
-- ----------------------------
INSERT INTO `tb_admin` VALUES ('1', 'admin', 'f9b77d488ca8463fa2f8bdb44863159d', '1234', '超级管理员', '1', '12', '1456541222', '127.0.0.1', '1424565456', '0', '0');

-- ----------------------------
-- Table structure for tb_follow
-- ----------------------------
DROP TABLE IF EXISTS `tb_follow`;
CREATE TABLE `tb_follow` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `from_user_id` int(11) unsigned NOT NULL,
  `to_user_id` int(11) unsigned NOT NULL,
  `create_time` int(10) NOT NULL DEFAULT '0',
  `update_time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='关注表';

-- ----------------------------
-- Records of tb_follow
-- ----------------------------
INSERT INTO `tb_follow` VALUES ('1', '11', '13', '1233332334', '0');
INSERT INTO `tb_follow` VALUES ('2', '10', '13', '1345454545', '0');

-- ----------------------------
-- Table structure for tb_love
-- ----------------------------
DROP TABLE IF EXISTS `tb_love`;
CREATE TABLE `tb_love` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '主题标题',
  `pic` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '主题图片',
  `create_time` int(10) NOT NULL DEFAULT '0',
  `update_time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='我的最爱';

-- ----------------------------
-- Records of tb_love
-- ----------------------------
INSERT INTO `tb_love` VALUES ('1', '13', '呵呵哈哈哈哈', '/img/tumblr_o5.png', '1333333333', '0');
INSERT INTO `tb_love` VALUES ('3', '13', '123123', 'uploads/head_img/151082352910317.jpg', '1510823841', '0');
INSERT INTO `tb_love` VALUES ('4', '13', '123', 'uploads/head_img/151082391362669.jpg', '1510823915', '0');

-- ----------------------------
-- Table structure for tb_love_comment
-- ----------------------------
DROP TABLE IF EXISTS `tb_love_comment`;
CREATE TABLE `tb_love_comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `love_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `create_time` int(10) NOT NULL DEFAULT '0',
  `update_time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tb_love_comment
-- ----------------------------
INSERT INTO `tb_love_comment` VALUES ('1', '1', '12', '12312312', '1444444445', '0');
INSERT INTO `tb_love_comment` VALUES ('2', '1', '11', '5555', '1333333333', '0');
INSERT INTO `tb_love_comment` VALUES ('3', '1', '13', '<p>欢迎使用 <b>wangEditor</b> 富文本编辑器</p><p>５６５７</p>', '1510818722', '0');
INSERT INTO `tb_love_comment` VALUES ('4', '1', '13', '<p>欢迎使用 <b>wangEditor</b> 富文本编辑器</p><p><br></p>', '1510818782', '0');
INSERT INTO `tb_love_comment` VALUES ('5', '1', '13', '<p>欢迎使用 <b>wangEditor</b> 富文本编辑器</p><p><br></p>', '1510818987', '0');
INSERT INTO `tb_love_comment` VALUES ('6', '1', '13', '<p>欢迎使用 <b>wangEditor</b> 富文本编辑器</p><p><br></p>', '1510818996', '0');
INSERT INTO `tb_love_comment` VALUES ('7', '1', '13', '<p>欢迎使用 <b>wangEditor</b> 富文本编辑器</p><p><br></p>', '1510819420', '0');

-- ----------------------------
-- Table structure for tb_love_remember
-- ----------------------------
DROP TABLE IF EXISTS `tb_love_remember`;
CREATE TABLE `tb_love_remember` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `love_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `create_time` int(10) NOT NULL DEFAULT '0',
  `update_time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tb_love_remember
-- ----------------------------
INSERT INTO `tb_love_remember` VALUES ('1', '1', '11', '1444444444', '0');
INSERT INTO `tb_love_remember` VALUES ('2', '1', '13', '1510819861', '0');

-- ----------------------------
-- Table structure for tb_note
-- ----------------------------
DROP TABLE IF EXISTS `tb_note`;
CREATE TABLE `tb_note` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL COMMENT '用户id',
  `content` text COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `create_time` int(10) NOT NULL DEFAULT '0',
  `update_time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='心情表';

-- ----------------------------
-- Records of tb_note
-- ----------------------------
INSERT INTO `tb_note` VALUES ('1', '13', '11111', '1419984000', '0');
INSERT INTO `tb_note` VALUES ('2', '13', '22222222', '1219984000', '0');
INSERT INTO `tb_note` VALUES ('3', '13', '3333333', '1219984000', '0');
INSERT INTO `tb_note` VALUES ('4', '13', '<p>欢迎使用 <b>wangEditor</b> 富文本编辑器</p><p><br></p>', '1510800023', '0');

-- ----------------------------
-- Table structure for tb_operation
-- ----------------------------
DROP TABLE IF EXISTS `tb_operation`;
CREATE TABLE `tb_operation` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `position_id` int(11) NOT NULL DEFAULT '0' COMMENT '职位id',
  `task_id` int(11) NOT NULL DEFAULT '0' COMMENT '任务id',
  PRIMARY KEY (`id`),
  KEY `group_id` (`position_id`) USING BTREE,
  KEY `task_id` (`task_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=1201 DEFAULT CHARSET=utf8 COMMENT='权限职位对应表';

-- ----------------------------
-- Records of tb_operation
-- ----------------------------

-- ----------------------------
-- Table structure for tb_position
-- ----------------------------
DROP TABLE IF EXISTS `tb_position`;
CREATE TABLE `tb_position` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '职位名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='职位表';

-- ----------------------------
-- Records of tb_position
-- ----------------------------
INSERT INTO `tb_position` VALUES ('1', '管理员');

-- ----------------------------
-- Table structure for tb_task
-- ----------------------------
DROP TABLE IF EXISTS `tb_task`;
CREATE TABLE `tb_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '权限名',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '父id',
  `controller` varchar(50) NOT NULL DEFAULT '' COMMENT '控制器',
  `action` varchar(50) NOT NULL DEFAULT '' COMMENT '动作',
  `sort` smallint(5) NOT NULL DEFAULT '0' COMMENT '排序',
  `is_menu` smallint(1) NOT NULL DEFAULT '0' COMMENT '是否是标签，1是0否',
  `is_btn` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否是按钮',
  PRIMARY KEY (`id`),
  KEY `task_id` (`pid`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=605 DEFAULT CHARSET=utf8 COMMENT='权限表';

-- ----------------------------
-- Records of tb_task
-- ----------------------------

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '登录名(邮箱)',
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '密码',
  `salt` int(4) NOT NULL COMMENT '随机四位整数',
  `nickname` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户昵称',
  `head_img` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '头像',
  `birthday` int(10) NOT NULL DEFAULT '0' COMMENT '生日',
  `website` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '网站/博客',
  `create_time` int(10) NOT NULL DEFAULT '0',
  `update_time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='用户表';

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES ('9', 'test@qq.com', 'e5b9da95ab65cb24500b7e1d3b49d73f', '2153', 'test@qq.com', null, '0', null, '1510626791', '0');
INSERT INTO `tb_user` VALUES ('10', '333@qq.123', '860c5be909066a3f4c036dcb8a550562', '3373', '333@qq.123', null, '0', null, '1510626955', '0');
INSERT INTO `tb_user` VALUES ('11', '443@qq.com', '23d9ba76a28ed737eb9db4b19854852a', '4601', '123', null, '0', null, '1510627293', '0');
INSERT INTO `tb_user` VALUES ('12', 'test', '8bfc0e99c29b50a9eb233e323dd4f57d', '4733', '哈哈哈', 'uploads/head_img/151072788292620.jpg', '1510588800', '12313', '1510628101', '1510730568');
INSERT INTO `tb_user` VALUES ('13', '1@qq.com', '69fb95f77185b56ead08ed339cb9db74', '3332', '1@qq.com', null, '0', null, '1510798677', '0');
