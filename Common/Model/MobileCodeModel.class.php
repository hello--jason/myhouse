<?php
namespace Common\Model;
class MobileCodeModel extends \Common\Model\BaseModel {
    /**
     * 表名
     * @var type 
     */
    protected $tableName        = 'mobile_code';
    
    /**
     * 自动填充
     * @var type 
     */
    protected $_auto            = array(
        array('updatetime','time',3,'function'),
    );
    
    public function updateUsedCode($mobile, $code){
        $data = array();
        $data['usetime'] = time();
        $this->create($data);
        $this->where("mobile='{$mobile}' AND code = '{$code}'")->save();
    }
}