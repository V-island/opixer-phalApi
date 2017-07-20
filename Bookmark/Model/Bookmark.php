<?php
/**

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

 */

class Model_Bookmark extends PhalApi_Model_NotORM {

    protected function getTableName($id) {
        return 'bookmark';
    }
}
