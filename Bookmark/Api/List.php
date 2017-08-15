<?php
/**
 * 列表目录
 */
class Api_List extends PhalApi_Api
{
    public function getRules() {
        return array(
            'sortList' =>  array(
                'orderName' => array('name' => 'orderName', 'default' => 'id', 'desc' => '排序字段'),
                'orderType' => array('name' => 'orderType', 'default' => 'desc', 'desc' => '排序方式'),
                'page'      => array('name' => 'page', 'type' => 'int', 'min' => 1, 'default' => 1, 'desc' => '第几页'),
                'perpage'   => array('name' => 'perpage', 'type' => 'int', 'min' => 1, 'max' => 20, 'default' => 10, 'desc' => '分页数量')
            ),
            'labelList' =>  array(
                'orderName' => array('name' => 'orderName', 'default' => 'id', 'desc' => '排序字段'),
                'orderType' => array('name' => 'orderType', 'default' => 'desc', 'desc' => '排序方式'),
                'page'      => array('name' => 'page', 'type' => 'int', 'min' => 1, 'default' => 1, 'desc' => '第几页'),
                'perpage'   => array('name' => 'perpage', 'type' => 'int', 'min' => 1, 'max' => 20, 'default' => 10, 'desc' => '分页数量')
            ),
            'sortItems' => array(
                'id'        => array('name' => 'id', 'require' => true, 'desc' => '目录ID'),
                'orderName' => array('name' => 'orderName', 'default' => 'id', 'desc' => '排序字段'),
                'orderType' => array('name' => 'orderType', 'default' => 'desc', 'desc' => '排序方式'),
                'page'      => array('name' => 'page', 'type' => 'int', 'min' => 1, 'default' => 1, 'desc' => '第几页'),
                'perpage'   => array('name' => 'perpage', 'type' => 'int', 'min' => 1, 'max' => 20, 'default' => 10, 'desc' => '分页数量')
            ),
            'labelItems' => array(
                'id'        => array('name' => 'id', 'require' => true, 'desc' => '目录ID'),
                'orderName' => array('name' => 'orderName', 'default' => 'id', 'desc' => '排序字段'),
                'orderType' => array('name' => 'orderType', 'default' => 'desc', 'desc' => '排序方式'),
                'page'      => array('name' => 'page', 'type' => 'int', 'min' => 1, 'default' => 1, 'desc' => '第几页'),
                'perpage'   => array('name' => 'perpage', 'type' => 'int', 'min' => 1, 'max' => 20, 'default' => 10, 'desc' => '分页数量')
            )
        );
    }

    /**
     * 获取分类目录列表
     * @desc 根据状态筛选列表数据，支持分页
     * @return array    items   列表数据
     * @return int      total   总数量
     * @return int      page    当前第几页
     * @return int      perpage 每页数量
     */
    public function sortList()
    {
        $rs = array();
        $domain = new Domain_List();
        $list = $domain->getList('sort', $this->orderName, $this->orderType, $this->page, $this->perpage);
        $rs['items'] = $list['items'];
        $rs['total'] = $list['total'];
        $rs['page'] = $this->page;
        $rs['perpage'] = $this->perpage;
        return $rs;
    }

    /**
     * 获取书签列表
     * @desc 根据状态筛选列表数据，支持分页
     * @return array    items   列表数据
     * @return int      total   总数量
     * @return int      page    当前第几页
     * @return int      perpage 每页数量
     */
    public function sortItems()
    {
        $rs = array();
        $domain = new Domain_List();
        $list = $domain->getItemsList('sort', $this->id, $this->orderName, $this->orderType, $this->page, $this->perpage);
        $rs['items'] = $list['items'];
        $rs['total'] = $list['total'];
        $rs['page'] = $this->page;
        $rs['perpage'] = $this->perpage;
        return $rs;
    }

    /**
     * 获取标签目录列表
     * @desc 根据状态筛选列表数据，支持分页
     * @return array    items   列表数据
     * @return int      total   总数量
     * @return int      page    当前第几页
     * @return int      perpage 每页数量
     */
    public function labelList()
    {
        $rs = array();
        $domain = new Domain_List();
        $list = $domain->getList('label', $this->orderName, $this->orderType, $this->page, $this->perpage);
        $rs['items'] = $list['items'];
        $rs['total'] = $list['total'];
        $rs['page'] = $this->page;
        $rs['perpage'] = $this->perpage;
        return $rs;
    }

    /**
     * 获取标签列表
     * @desc 根据状态筛选列表数据，支持分页
     * @return array    items   列表数据
     * @return int      total   总数量
     * @return int      page    当前第几页
     * @return int      perpage 每页数量
     */
    public function labelItems()
    {
        $rs = array();
        $domain = new Domain_List();
        $list = $domain->getItemsList('label', $this->id, $this->orderName, $this->orderType, $this->page, $this->perpage);
        $rs['items'] = $list['items'];
        $rs['total'] = $list['total'];
        $rs['page'] = $this->page;
        $rs['perpage'] = $this->perpage;
        return $rs;
    }
}