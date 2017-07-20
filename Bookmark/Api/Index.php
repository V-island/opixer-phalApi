<?php
/**
 * 书签操作
 */
class Api_Index extends PhalApi_Api
{
    public function getRules() {
        return array(
            'insert' => array(
                'url'           => array('name' => 'url', 'require' => true, 'desc' => '书签地址'),
                'name'          => array('name' => 'name', 'require' => true, 'desc' => '书签名'),
                'wall'          => array('name' => 'wall', 'type' => 'boolean', 'default' => false, 'desc' => '是否需要翻墙'),
            	'color'			=> array('name' => 'color', 'default' => '#9E9E9E', 'desc' => '书签背景色块'),
                'description'   => array('name' => 'description', 'desc' => '书签备注'),
            	'preview'       => array('name' => 'image_preview', 'desc' => '书签缩略图'),
                'image_id'      => array('name' => 'image_id', 'type' => 'int', 'min' => 1, 'max' => 11, 'desc' => '书签背景图ID'),
                'image_url'     => array('name' => 'image_url', 'desc' => '书签背景图URL'),
                'updata' 		=> array('name' => 'updata', 'type' => 'date', 'format' => 'timestamp', 'desc' => '更新时间')
            ),
            'import' => array(
                'file' => array(
                    'name'      => 'file',
                    'type'      => 'file',
                    'require'   => true,
                    'min'       => 0,
                    'max'       => 1024 * 1024,
                    'desc'      => 'JSON数据'
                    )
            ),
            'getList' => array(
                'type'      => array('name' => 'type', 'require' => true, 'desc' => '类型'), 
                'orderName' => array('name' => 'orderName', 'default' => 'id', 'desc' => '排序字段'), 
                'orderType' => array('name' => 'orderType', 'default' => 'desc', 'desc' => '排序方式'), 
                'page'      => array('name' => 'page', 'type' => 'int', 'min' => 1, 'default' => 1, 'desc' => '第几页'), 
                'perpage'   => array('name' => 'perpage', 'type' => 'int', 'min' => 1, 'max' => 20, 'default' => 10, 'desc' => '分页数量')
            ),
            'getItemsList' => array(
                'id'        => array('name' => 'id', 'require' => true, 'desc' => '目录ID'), 
                'type'      => array('name' => 'type', 'require' => true, 'desc' => '类型'), 
                'orderName' => array('name' => 'orderName', 'default' => 'id', 'desc' => '排序字段'), 
                'orderType' => array('name' => 'orderType', 'default' => 'desc', 'desc' => '排序方式'), 
                'page'      => array('name' => 'page', 'type' => 'int', 'min' => 1, 'default' => 1, 'desc' => '第几页'), 
                'perpage'   => array('name' => 'perpage', 'type' => 'int', 'min' => 1, 'max' => 20, 'default' => 10, 'desc' => '分页数量')
            )
        );
    }

    /**
     * 插入数据
     * @desc 向数据库插入一条纪录数据
     * @return int code 操作码，0表示成功， 1表示失败
     * @return string msg 操作信息
     */
    public function insert()
    {
    	$rs = array('code' => 0, 'msg' => '');

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

    	$domain = new Domain_Bookmark();
    	$id = $domain->insert($newData);
    	return $rs;
    }

    /**
     * JSON文件导入
     * @desc 读取JSON文件数据向数据库插入一条纪录数据
     * @return int code 操作码，0表示成功， 1表示失败
     * @return string msg 操作信息
     */
    public function import()
    {

        $rs = array('code' => 0, 'msg' => '');

        $tmpName = $this->file['tmp_name'];

        $name = md5($this->file['name']);
        $ext = strrchr($this->file['name'], '.');
        $uploadFolder = sprintf('%s/Public/upload/', API_ROOT);
        if (!is_dir($uploadFolder)) {
            mkdir($uploadFolder, 0777);
        }

        $filePath = $uploadFolder .  $name . $ext;
        if (move_uploaded_file($tmpName, $filePath)) {
            $jsonData = file_get_contents($filePath);
            $newData = json_decode($jsonData, true);
            $domain = new Domain_Bookmark();
            foreach ($newData as $data) {
                $sort = array(
                    'name'        => $data['title'],
                    'description' => $data['description'],
                    'updata'      => $_SERVER['REQUEST_TIME']
                );
                $sId = $domain->insertSort($sort);
                foreach ($data['items'] as $value) {
                    $book = array(
                        'url'         => $value['url'],
                        'name'        => $value['title'],
                        'wall'        => $value['wall'],
                        'color'       => $value['color'],
                        'description' => $value['explanation'],
                        'image_id'    => $value['image_id'],
                        'image_url'   => $value['image'],
                        'updata'      => $_SERVER['REQUEST_TIME']
                    );
                    $bId = $domain->insert($book);
                    $rule = array(
                        'sid'         => $sId,
                        'bid'         => $bId
                    );
                    $domain->insertSortRule($rule);
                }
                set_time_limit(0);
            }
            $rs['code'] = 1;
            $rs['msg']  = '上传完成';
        }
        return $rs;
    }

    /**
     * 获取分类/标签目录列表
     * @desc 根据状态筛选列表数据，支持分页
     * @return array    items   列表数据
     * @return int      total   总数量
     * @return int      page    当前第几页
     * @return int      perpage 每页数量
     */
    public function getList()
    {
        $rs = array();
        $domain = new Domain_Bookmark();
        $list = $domain->getList($this->type, $this->orderName, $this->orderType, $this->page, $this->perpage);
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
    public function getItemsList()
    {
        $rs = array();
        $domain = new Domain_Bookmark();
        $list = $domain->getItemsList($this->id, $this->type, $this->orderName, $this->orderType, $this->page, $this->perpage);
        $rs['items'] = $list['items'];
        $rs['total'] = $list['total'];
        $rs['page'] = $this->page;
        $rs['perpage'] = $this->perpage;
        return $rs;
    }
}