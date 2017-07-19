<?php
/**
 * 书签操作
 */
class Api_Admin extends PhalApi_Api
{
    public function getRules() {
        return array(
            'insert' => array(
                'url'           => array('name' => 'url', 'require' => true, 'desc' => '书签地址'),
                'name'          => array('name' => 'name', 'require' => true, 'desc' => '书签英文'),
                'wall'          => array('name' => 'wall', 'type' => 'boolean', 'default' => false, 'desc' => '是否需要翻墙'),
            	'color'			=> array('name' => 'color', 'default' => '#9E9E9E', 'desc' => '书签背景色块'),
                'description'   => array('name' => 'description', 'desc' => '书签备注'),
            	'preview'       => array('name' => 'image_preview', 'desc' => '书签缩略图'),
                'image_id'      => array('name' => 'image_id', 'type' => 'int', 'min' => 1, 'max' => 11, 'desc' => '书签背景图ID'),
                'image_url'     => array('name' => 'image_url', 'desc' => '书签背景图URL'),
                'updata' 		=> array('name' => 'updata', 'type' => 'date', 'format' => 'timestamp', 'desc' => '更新时间'),
            ),
            'import' => array(
                'data' => array('name' => 'data', 'type' => 'array', 'require' => true, 'desc' => '更新时间'),
            ),
        );
    }

    /**
     * 插入数据
     * @desc 向数据库插入一条纪录数据
     * @return int code 操作码，0表示成功， 1表示失败
     * @return int id 新增的ID
     */
    public function insert()
    {
    	$rs = array('code' => 200, 'msg' => '', 'info' => array());

    	$newData = array(
            'url'           => $this->url,
    	    'name' 			=> $this->name,
            'wall'          => $this->wall,
            'color'         => $this->color,
            'description'   => $this->description,
    	    'preview'       => $this->preview,
            'image_id'      => $this->image_id,
            'image_url'     => $this->image_url,
    	    'updata' 		=> $_SERVER['REQUEST_TIME'],
    	);

    	$domain = new Domain_Admin();
    	$id = $domain->insert($newData);

    	$rs['id'] = $id;
    	return $rs;
    }

    /**
     * JSON文件导入
     * @desc 读取JSON文件数据向数据库插入一条纪录数据
     * @return [type] [description]
     */
    public function import()
    {
        $rs = array('code' => 200, 'msg' => '', 'info' => array());

        $newData = $this->data;
        foreach ($newData as $key => $value) {
            # code...
        }

        $domain = new Domain_Admin();
        $id = $domain->insert($newData);

        $rs['id'] = $id;
        return $rs;
    }
}