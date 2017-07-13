<?php
/**
 * 书签操作
 */
class Api_Admin extends PhalApi_Api
{
    public function getRules() {
        return array(
            'insert' => array(
            	'pid' 			=> array('name' => 'pid', 'type' => 'int', 'default' => 0, 'desc' => '文件夹目录ID'),
            	'name' 			=> array('name' => 'name', 'require' => true, 'desc' => '书签英文'),
            	'title' 		=> array('name' => 'title', 'require' => true, 'desc' => '书签名'),
            	'color'			=> array('name' => 'color', 'default' => '#9E9E9E', 'desc' => '书签背景色块'),
            	'icon' 			=> array('name' => 'icon', 'default' => 'icons:folder', 'desc' => '书签图标'),
            	'url' 			=> array('name' => 'url', 'desc' => '书签地址'),
            	'url_name' 		=> array('name' => 'url_name', 'desc' => '书签地址展示名'),
            	'image_id'		=> array('name' => 'image_id', 'type' => 'int', 'min' => 1, 'max' => 11, 'desc' => '书签背景图ID'),
            	'image_url'     => array('name' => 'image_url', 'desc' => '书签背景图URL'),
            	'image_preview' => array('name' => 'image_preview', 'desc' => '书签缩略图'),
            	'description'   => array('name' => 'description', 'desc' => '书签备注'),
            	'root'		 	=> array('name' => 'root', 'type' => 'boolean', 'require' => true, 'default' => false, 'desc' => '是否为根目录'),
            	'folder'		=> array('name' => 'folder', 'type' => 'boolean', 'require' => true, 'default' => false, 'desc' => '是否为文件夹'),
            	'wall'			=> array('name' => 'wall', 'type' => 'boolean', 'require' => true, 'default' => false, 'desc' => '是否需要翻墙'),
                'weight' 		=> array('name' => 'weight', 'type' => 'int', 'require' => true, 'desc' => '书签权重'),
                'updata' 		=> array('name' => 'updata', 'type' => 'date', 'format' => 'timestamp', 'desc' => '更新时间'),
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
    	    'pid' 			=> $this->pid,
    	    'name' 			=> $this->name,
    	    'title' 		=> $this->title,
    	    'color'			=> $this->color,
    	    'icon' 			=> $this->icon,
    	    'url' 			=> $this->url,
    	    'url_name' 		=> $this->url_name,
    	    'image_id' 		=> $this->image_id,
    	    'image_url' 	=> $this->image_url,
    	    'image_preview' => $this->image_preview,
    	    'description' 	=> $this->description,
    	    'root' 			=> $this->root,
    	    'folder' 		=> $this->folder,
    	    'wall' 			=> $this->wall,
    	    'weight' 		=> $this->weight,
    	    'updata' 		=> $_SERVER['REQUEST_TIME'],
    	);

    	$domain = new Domain_Admin();
    	$id = $domain->insert($newData);

    	$rs['id'] = $id;
    	return $rs;
    }
}