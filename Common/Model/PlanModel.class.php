<?php
namespace Common\Model;
class PlanModel extends \Common\Model\BaseModel {
    /**
     * 表名
     * @var type 
     */
    protected $tableName        = 'plan';
    
        
    /**
     * 自动填充
     * @var type 
     */
    protected $_auto            = array(
        array('updatetime','time',3,'function'),
    );
}