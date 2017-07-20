<?php

class Domain_Bookmark {

    public function insert($newData) {
        $model = new Model_Bookmark();
        return $model->insert($newData);
    }
    public function insertSort($newData) {
        $model = new Model_BookmarkSort();
        return $model->insert($newData);
    }
    public function insertLabel($newData) {
        $model = new Model_BookmarkLabel();
        return $model->insert($newData);
    }
    public function insertSortRule($newData) {
        $model = new Model_BookmarkSortRule();
        return $model->insert($newData);
    }
    public function insertLabelRule($newData) {
        $model = new Model_BookmarkLabelRule();
        return $model->insert($newData);
    }

    public function getList($type, $orderName, $orderType, $page, $perpage) {
        $rs = array('items' => array(), 'total' => 0);
        $model = $type === 'sort' ? new Model_BookmarkSort() : new Model_BookmarkLabel();
        $items = $model->getListItems($orderName, $orderType, $page, $perpage);
        $total = $model->getListTotal();
        $rs['items'] = $items;
        $rs['total'] = $total;
        return $rs;
    }
    public function getItemsList($id, $type, $orderName, $orderType, $page, $perpage) {
        $rs = array('items' => array(), 'total' => 0);
        $model = new Model_Bookmark();
        
        $items = $model->getItems($id, $orderName, $orderType, $page, $perpage);
        $total = $model->getItemsTotal($id);
        $rs['items'] = $items;
        $rs['total'] = $total;
        return $rs;
    }
}
