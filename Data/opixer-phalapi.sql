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
  `pid` int(11) unsigned DEFAULT NULL COMMENT '文件夹目录ID',
  `name` varchar(255) NOT NULL COMMENT '书签英文',
  `title` varchar(255) NOT NULL COMMENT '书签名',
  `color` varchar(255) DEFAULT NULL COMMENT '书签背景色块',
  `icon` varchar(255) DEFAULT NULL COMMENT '书签图标',
  `url` varchar(255) DEFAULT NULL COMMENT '书签地址',
  `url_name` varchar(255) DEFAULT NULL COMMENT '书签地址展示名',
  `image_id` int(11) DEFAULT NULL COMMENT '书签背景图ID',
  `image_url` varchar(255) DEFAULT NULL COMMENT '书签背景图URL',
  `image_preview` varchar(255) DEFAULT NULL COMMENT '书签缩略图',
  `description` varchar(255) DEFAULT NULL COMMENT '书签备注',
  `root` tinyint(4) NOT NULL COMMENT '是否为根目录',
  `folder` tinyint(4) NOT NULL COMMENT '是否为文件夹',
  `wall` tinyint(4) DEFAULT NULL COMMENT '是否需要翻墙',
  `weight` int(11) NOT NULL COMMENT '书签权重',
  `updata` int(10) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

