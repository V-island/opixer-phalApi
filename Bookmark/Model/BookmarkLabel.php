<?php
/**

CREATE TABLE `opixer_bookmark_label` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '标签ID',
  `name` varchar(255) NOT NULL COMMENT '标签名',
  `description` varchar(255) DEFAULT NULL COMMENT '标签备注',
  `updata` int(10) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

 */

class Model_BookmarkLabel extends PhalApi_Model_NotORM {

    protected function getTableName($id) {
        return 'bookmark_label';
    }
}
