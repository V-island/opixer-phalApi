/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 100121
Source Host           : localhost:3306
Source Database       : phalapi

Target Server Type    : MYSQL
Target Server Version : 100121
File Encoding         : 65001

Date: 2017-07-13 18:31:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for opixer_bookmark
-- ----------------------------
DROP TABLE IF EXISTS `opixer_bookmark`;
CREATE TABLE `opixer_bookmark` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '书签ID',
  `url` varchar(255) NOT NULL COMMENT '书签地址',
  `name` varchar(255) NOT NULL COMMENT '书签英文',
  `wall` tinyint(4) DEFAULT NULL COMMENT '是否需要翻墙',
  `color` varchar(255) DEFAULT NULL COMMENT '书签背景色块',
  `description` varchar(255) DEFAULT NULL COMMENT '书签备注',
  `preview` varchar(255) DEFAULT NULL COMMENT '缩略图',
  `image_id` int(11) DEFAULT NULL COMMENT '书签背景图ID',
  `image_url` varchar(255) DEFAULT NULL COMMENT '书签背景图URL',
  `updata` int(10) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- ----------------------------
-- Table structure for opixer_bookmark_link
-- ----------------------------
DROP TABLE IF EXISTS `opixer_bookmark_link`;
CREATE TABLE `opixer_bookmark_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '标签ID',
  `name` varchar(255) DEFAULT NULL COMMENT '标签名',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



-- ----------------------------
-- Table structure for opixer_bookmark_link_group
-- ----------------------------
DROP TABLE IF EXISTS `opixer_bookmark_link_group`;
CREATE TABLE `opixer_bookmark_link_group` (
  `id` int(11) NOT NULL,
  `bid` int(11) NOT NULL COMMENT '书签ID',
  `lid` int(11) NOT NULL COMMENT '标签ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;