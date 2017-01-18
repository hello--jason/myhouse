<?php
namespace Common\Model;
class OperationModel extends \Common\Model\BaseModel {
    /**
     * 表名
     * @var type 
     */
    protected $tableName        = 'operation';
    
    /**
     * 自动填充
     * @var type 
     */
    protected $_auto            = array(
        array('updatetime','time',3,'function'),
    );
    
    public function getList($condition, $order, $page = 1, $limit = 20) {
        $results= parent::getList($condition, $order, $page, $limit);
        $config = $this->getModuleConfig();
        
        foreach ($results as $k=>$v) {
            if (!empty($config[$v['controller']])) {
                $results[$k]['module_name'] = $config[$v['controller']];
            } else {
                $results[$k]['module_name'] = "尚未配置";
            }
            
            if ($v['typeid'] == 1) {
                $data = json_decode($v['updated'], TRUE);                
                $results[$k]['action_name'] = "操作：添加， 记录ID：{$data['id']}";
            } else if ($v['typeid'] == 2) {
                $data = json_decode($v['original'], TRUE); 
                $results[$k]['action_name'] = "操作：编辑， 记录ID：{$data['id']}";
            } else if ($v['typeid'] == 3) {
                $data = json_decode($v['original'], TRUE); 
                $results[$k]['action_name'] = "操作：删除， 记录ID：{$data['id']}";
            }
        }
        
        return $results;
    }


    public function getModuleName($controller){
        $array  = $this->getModuleConfig();
        if (!empty($array[$index])) {
            return $array[$index]['module'];
        }
        return "";
    }
    
    public function getActionName($controller, $action){
        $array  = $this->getModuleConfig();
        $index  = "{$controller}_{$action}";
        if (!empty($array[$index])) {
            return $array[$index]['action'];
        }
        return "";
    }
    
    public function getModuleConfig(){
        return array(
            "Index"     => "业务管理",
            "Advert"    => "营销管理",
            "Article"   => "内容管理",
            "Store"     => "门店管理",
            "Job"       => "招聘管理",
            "Manager"   => "权限管理",
            "User"      => "用户管理",
            "Operation" => "操作管理",
        );
    }
}