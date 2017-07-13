<?php
/**

CREATE TABLE `opixer_bookmark` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '书签ID',
  `pid` int(11) unsigned NOT NULL COMMENT '文件夹目录ID',
  `name` varchar(255) DEFAULT NULL COMMENT '书签英文',
  `title` varchar(255) DEFAULT NULL COMMENT '书签名',
  `color` varchar(255) DEFAULT NULL COMMENT '书签背景色块',
  `icon` varchar(255) DEFAULT NULL COMMENT '书签图标',
  `url` varchar(255) DEFAULT NULL COMMENT '书签地址',
  `url_name` varchar(255) DEFAULT NULL COMMENT '书签地址展示名',
  `image_id` int(11) DEFAULT NULL COMMENT '书签背景图ID',
  `image_url` varchar(255) DEFAULT NULL COMMENT '书签背景图URL',
  `image_preview` varchar(255) DEFAULT NULL COMMENT '书签缩略图',
  `description` varchar(255) DEFAULT NULL COMMENT '书签备注',
  `root` tinyint(4) DEFAULT NULL COMMENT '是否为根目录',
  `folder` tinyint(4) DEFAULT NULL COMMENT '是否为文件夹',
  `wall` tinyint(4) DEFAULT NULL COMMENT '是否需要翻墙',
  `weight` int(11) DEFAULT NULL COMMENT '书签权重',
  `updata` int(10) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

 */

class Model_Admin extends PhalApi_Model_NotORM {

    protected function getTableName($id) {
        return 'opixer_bookmark';
    }
}
