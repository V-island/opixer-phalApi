<?php

class Domain_Admin {

    public function insert($newData) {
        $model = new Model_Admin();
        return $model->insert($newData);
    }
}
