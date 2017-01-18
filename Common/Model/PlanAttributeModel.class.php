<?php
namespace Common\Model;
class PlanAttributeModel extends \Common\Model\BaseModel {
    /**
     * 表名
     * @var type 
     */
    protected $tableName        = 'plan_attribute';
    
        
    /**
     * 自动填充
     * @var type 
     */
    protected $_auto            = array(
        array('updatetime','time',3,'function'),
    );
    
    public function getList($condition, $order, $page = 1, $limit = 20) {
        $result = parent::getList($condition, $order, $page, $limit);
        
        foreach ($result as $k=>$v) {
            if ($v['typeid'] == 1) {
                $result[$k]['type_name'] = "文本";
            } else if ($v['typeid'] == 2) {
                $result[$k]['type_name'] = "单选";
            } else if ($v['typeid'] == 3) {
                $result[$k]['type_name'] = "多选";
            } else if ($v['typeid'] == 4) {
                $result[$k]['type_name'] = "富文本";
            }
        }
        
        return $result;
    }
}