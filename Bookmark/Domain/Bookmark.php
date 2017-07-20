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
    public function insertSortRule($newData) {
        $model = new Model_BookmarkSortRule();
        return $model->insert($newData);
    }
}
