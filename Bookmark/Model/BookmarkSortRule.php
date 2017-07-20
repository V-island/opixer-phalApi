<?php
/**

CREATE TABLE `opixer_bookmark_sort_rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `sid` int(11) NOT NULL COMMENT '分类ID',
  `bid` int(11) NOT NULL COMMENT '书签ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

 */

class Model_BookmarkSortRule extends PhalApi_Model_NotORM {

    protected function getTableName($id) {
        return 'bookmark_sort_rule';
    }
}
