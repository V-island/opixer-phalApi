<?php
/**

CREATE TABLE `opixer_bookmark_label_rule` (
  `id` int(11) NOT NULL,
  `bid` int(11) NOT NULL COMMENT '书签ID',
  `lid` int(11) NOT NULL COMMENT '标签ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

 */

class Model_BookmarkLabelRule extends PhalApi_Model_NotORM {

    protected function getTableName($id) {
        return 'bookmark_label_rule';
    }
}
