<?php

class Domain_List {

    public function getList($type, $orderName, $orderType, $page, $perpage) {
        $rs = array('items' => array(), 'total' => 0);
        $model = ($type === 'sort') ? new Model_BookmarkSortRule() : new Model_BookmarkLabelRule();
        $items = $model->getListItems($orderName, $orderType, $page, $perpage);
        $total = $model->getListTotal();
        $rs['items'] = $items;
        $rs['total'] = $total;
        return $rs;
    }
    public function getItemsList($type, $id, $orderName, $orderType, $page, $perpage) {
        $rs = array('items' => array(), 'total' => 0);
        $model = ($type === 'sort') ? new Model_BookmarkSortRule() : new Model_BookmarkLabelRule();
        $items = $model->getItems($id, $orderName, $orderType, $page, $perpage);
        $total = $model->getTotal($id);
        $rs['items'] = $items;
        $rs['total'] = $total;
        return $rs;
    }
}
