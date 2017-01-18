<?php
namespace Common\Model;
use Think\Model;
class BaseModel extends Model {
    protected $adminid = 1;
    
    public function __construct($name = '', $tablePrefix = '', $connection = '') {
        parent::__construct($name, $tablePrefix, $connection);
    }
    
    public function getList($condition, $order, $page = 1, $limit = 20){
        $limit  = intval($limit);
        $page   = intval($page);
        $page   = $page < 1 ? 1 : $page;
        $start  = ($page - 1) * $limit;
        
        $result = $this->where($condition)->order($order)->limit($start, $limit)->select();
        $return = array();
        foreach ($result as $k=>$v) {
            $return[$v['id']] = $v;
        }
        
        return $return;
    }
    
    public function getById($id){
        $id = intval($id);
        $result = $this->where("id={$id}")->find();
        return $result;
    }
    
    public function getByIds($ids){
         if (empty($ids) || !is_array($ids)) {
            return array();
        }
        
        $ids    = implode(",", $ids);
        $where  = "id in ({$ids})"; 
        if (!empty($ids)) {
            $result = $this->where($where)->select();
            $array  = array();
            foreach ($result as $k=>$v) {
                $array[$v['id']] = $v;
            }
            return $array;
        } else {
            return array();
        }
    }
    
    
    protected function _before_update(&$data, $options) {
        parent::_before_update($data, $options);
        
        $table  = $options['table'];
        $model  = $options['model'];
        $where  = $options['where']['_string'];
        $info   = $this->where($where)->find();
        if ($table != "xf_operation" && !empty($where) && !empty($info)) {            
            $operationModel = new \Common\Model\OperationModel();
            $items[] = array();
            $items['module']        = MODULE_NAME;
            $items['controller']    = CONTROLLER_NAME;
            $items['action']        = ACTION_NAME;
            $items['typeid']        = 2;
            $items['original']      = json_encode($info);
            $items['updated']       = json_encode($data);
            $items['ip']            = get_client_ip();
            $items['adminid']       = intval(session("adminid"));
            $items['addtime']       = time();
            $operationModel->create($items);
            $operationModel->add();
        }
    }
    
    protected function _before_delete($options) {
        parent::_before_delete($options);
        
        $table  = $options['table'];
        $model  = $options['model'];
        $where  = $options['where']['_string'];
        $info   = $this->where($where)->find();       
        if ($table != "xf_operation" && !empty($where) && !empty($info)) {            
            $operationModel = new \Common\Model\OperationModel();
            $items[] = array();
            $items['module']        = MODULE_NAME;
            $items['controller']    = CONTROLLER_NAME;
            $items['action']        = ACTION_NAME;
            $items['typeid']        = 3;
            $items['original']      = json_encode($info);
            $items['updated']       = "";
            $items['ip']            = get_client_ip();
            $items['adminid']       = intval(session("adminid"));
            $items['addtime']       = time();
            $operationModel->create($items);
            $operationModel->add();
        }
    }

    protected function _after_insert($data, $options) {
        parent::_after_insert($data, $options);
        
        $table  = $options['table'];
        $model  = $options['model'];
        if ($table != "xf_operation") {            
            $operationModel = new \Common\Model\OperationModel();
            $items[] = array();
            $items['module']        = MODULE_NAME;
            $items['controller']    = CONTROLLER_NAME;
            $items['action']        = ACTION_NAME;
            $items['typeid']        = 1;
            $items['original']      = "";
            $items['updated']       = json_encode($data);
            $items['ip']            = get_client_ip();
            $items['adminid']       = intval(session("adminid"));
            $items['addtime']       = time();
            $operationModel->create($items);
            $operationModel->add();
        }
    }
}
