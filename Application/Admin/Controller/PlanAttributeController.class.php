<?php
namespace Admin\Controller;
class PlanAttributeController extends \Admin\Controller\BaseController {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $page   = intval(I("post.page"));
        $page   = $page < 1 ? 1 : $page;
        $limit  = 20;
        $attributeModel = new \Common\Model\PlanAttributeModel();
        $attribute      = $attributeModel->getList("", "id desc", $page, $limit);
        
        $categoryIds    = array();
        $typeids        = array();
        foreach ($attribute as $k=>$v) {
            $categoryIds[]  = $v['categoryid'];
        }
        
        //获取分类
        $categoryModel  = new \Common\Model\PlanCategoryModel();
        if (!empty($categoryIds)) {
            $condition  = "id in (". implode(",", $categoryIds) .")";
            $categories = $categoryModel->getList($condition);
        }
        
        foreach ($attribute as $k=>$v) {
            if (!empty($categories[$v['categoryid']])) {
                $attribute[$k]['category_name'] = $categories[$v['categoryid']]['name'];
            } else {
                $attribute[$k]['category_name'] = "";
            }
        }
        
        $this->assign("attribute", $attribute);
        $this->display();
    }
    
    public function add(){
        if (IS_POST) {
            $request                = array();
            $request['categoryid']  = intval(I("post.categoryid"));
            $request['name']        = trim(I("post.name"));
            $request['typeid']      = intval(I("post.typeid"));
            $request['required']    = intval(I("post.required"));
            $request['hint']        = trim(I("post.hint"));
            $request['addtime']     = time();
            
            if (empty($request['categoryid'])) {
                $this->error("请选择分类");
            }
            
            $categoryModel = new \Common\Model\PlanCategoryModel();
            $category = $categoryModel->getById($request['categoryid']);
            if (empty($category)) {
                $this->error("分类不正确");
            }            
            
            if (empty($request['name'])) {
                $this->error("请填写属性名称");
            }
            
            if (mb_strlen($request['name'], "utf-8") > 20) {
                $this->error("属性名称不能超过20个字符");
            }
            
            if (empty($request['typeid'])) {
                $this->error("请选择属性类型");
            }
            
            if (!in_array($request['typeid'], array(1,2,3,4))) {
                $this->error("属性类型不正确");
            }
            
            $attributeModel = new \Common\Model\PlanAttributeModel();
            $attributeModel->create($request);
            $result = $attributeModel->add();
            if ($result) {
                $this->success("添加成功", U("Admin/PlanCategory/index"));
            } else {
                $this->error("添加失败");
            }
            
        } else {
            $categoryModel  = new \Common\Model\PlanCategoryModel();
            $category       = $categoryModel->getList("", "id DESC");
            
            $this->assign("category", $category);
            $this->display();
        }
    }
}
