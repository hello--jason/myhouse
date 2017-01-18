<?php
namespace Common\Model;
class StoreModel extends \Common\Model\BaseModel {
    /**
     * 表名
     * @var type 
     */
    protected $tableName        = 'store';
    
    /**
     * 自动填充
     * @var type 
     */
    protected $_auto            = array(
        array('updatetime','time',3,'function'),
    );
}