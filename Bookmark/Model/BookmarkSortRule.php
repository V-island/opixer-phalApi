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
    public function getItems($id, $orderName, $orderType, $page, $perpage) {
    	$sql = 'SELECT book.*'
            . ' FROM  opixer_bookmark AS book LEFT JOIN opixer_bookmark_sort_rule AS sort'
            . ' ON book.id = sort.bookmark_id'
            . ' WHERE sort.sort_id = '.$id
            . ' ORDER BY book.'.$orderName.' '.$orderType
            . ' LIMIT '.($page - 1) * $perpage.','.$perpage;
        return $this->getORM()
            ->queryAll($sql, array());
    }
    public function getTotal($id) {
        $total = $this->getORM()
        	->where('sort_id', $id)
        	->count('id');
        return intval($total);
    }
}
