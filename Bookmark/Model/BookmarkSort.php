<?php
/**

CREATE TABLE `opixer_bookmerk_sort` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `name` varchar(255) NOT NULL COMMENT '分类名',
  `description` varchar(255) DEFAULT NULL COMMENT '分类备注',
  `updata` int(10) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

 */

class Model_BookmarkSort extends PhalApi_Model_NotORM {

    protected function getTableName($id) {
        return 'bookmerk_sort';
    }

    public function getListItems($orderName, $orderType, $page, $perpage) {
        return $this->getORM()
            ->select('*')
            ->order($orderName.' '.$orderType)
            ->limit(($page - 1) * $perpage, $perpage)
            ->fetchAll();
    }
    public function getListTotal() {
        $total = $this->getORM()->count('id');
        return intval($total);
    }
}
