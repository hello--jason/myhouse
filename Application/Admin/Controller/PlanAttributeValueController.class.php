<?php
namespace Admin\Controller;
class PlanAttributeValueController extends \Admin\Controller\BaseController {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $page   = intval(I("post.page"));
        $page   = $page < 1 ? 1 : $page;
        $limit  = 20;
        $valueModel     = new \Common\Model\PlanAttributeValueModel();
        $values         = $valueModel->getList("", "id desc", $page, $limit);
        
        $this->assign("values", $values);
        $this->display();
    }
    
    public function add(){
        if (IS_POST) {
            $request                = array();
            $request['categoryid']  = intval(I("post.categoryid"));
            $request['attributeid'] = intval(I("post.attributeid"));
            $request['value']       = trim(I("post.value"));
            $request['addtime']     = time();
            
            if (empty($request['categoryid'])) {
                $this->error("请选择分类");
            }
            
            //根据ID获取分类
            $categoryModel  = new \Common\Model\PlanCategoryModel();
            $category       = $categoryModel->getById($request['categoryid']);
            
            if (empty($category)) {
                $this->error("分类数据错误");
            }
            
            if (empty($request['attributeid'])) {
                $this->error("请选择属性");
            }
            
            //根据ID获取属性
            $attributeModel = new \Common\Model\PlanAttributeModel();
            $attribute      = $attributeModel->where("categoryid = {$request['categoryid']} AND id = {$request['attributeid']}")->find();
            if (empty($attribute)) {
                $this->error("属性数据错误");
            }
            
            if (empty($request['value'])) {
                $this->error("请填写属性值名称");
            }
            
            if (mb_strlen($request['value'], "utf-8") > 20) {
                $this->error("属性值名称不能超过20个字");
            }
           
            
            $valueModel = new \Common\Model\PlanAttributeValueModel();
            $valueModel->create($request);
            $result = $valueModel->add();
            if ($result) {
                $this->success("添加成功", U("Admin/PlanCategory/index"));
            } else {
                $this->error("添加失败");
            }
            
        } else {
            $categoryModel  = new \Common\Model\PlanCategoryModel();
            $category       = $categoryModel->getList("", "id desc", $page, $limit);

            $this->assign("category", $category);
            $this->display();
        }
    }
    
    public function getAttributeByCategory(){
        $category = intval(I("post.categoryid"));
        
        //获取分类下的所有属性
        $attributeModel = new \Common\Model\PlanAttributeModel();
        $attributes = $attributeModel->where("categoryid = {$category}")->select();
        $this->ajaxReturn($attributes);
    }
}
