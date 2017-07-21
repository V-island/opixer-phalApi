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
    public function getItems($id, $orderName, $orderType, $page, $perpage) {
    	$sql = 'SELECT book.*'
            . ' FROM  opixer_bookmark AS book LEFT JOIN opixer_bookmark_label_rule AS label'
            . ' ON book.id = label.bookmark_id'
            . ' WHERE label.label_id = '.$id
            . ' ORDER BY book.'.$orderName.' '.$orderType
            . ' LIMIT '.($page - 1) * $perpage.','.$perpage;
        return $this->getORM()
            ->queryAll($sql, array());
    }
    public function getTotal($id) {
        $total = $this->getORM()
        	->where('label_id', $id)
        	->count('id');
        return intval($total);
    }
}
