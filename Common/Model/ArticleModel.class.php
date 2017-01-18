<?php
namespace Common\Model;
class ArticleModel extends \Common\Model\BaseModel {
    /**
     * 表名
     * @var type 
     */
    protected $tableName        = 'article';
    
    /**
     * 自动填充
     * @var type 
     */
    protected $_auto            = array(
        array('updatetime','time',3,'function'),
    );
    
    public function getCategories(){
        return array(
            "1"=>"关于我们"
        );
    }
}