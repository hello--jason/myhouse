<?php
namespace Admin\Controller;
class PlanCategoryController extends \Admin\Controller\BaseController {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $page   = intval(I("post.page"));
        $page   = $page < 1 ? 1 : $page;
        $limit  = 20;
        $categoryModel  = new \Common\Model\PlanCategoryModel();
        $category       = $categoryModel->getList("", "id desc", $page, $limit);

        $this->assign("category", $category);
        $this->display();
    }
    
    public function add(){
        if (IS_POST) {
            $request            = array();
            $request['name']    = trim(I("post.name"));
            $request['content'] = trim(I("post.content"));
            $request['sort']    = intval(I("post.sort"));
            $request['addtime'] = time();
            
            if (empty($request['name'])) {
                $this->error("请填写分类名称");
            }
            
            if (mb_strlen($request['name'], "utf-8") > 20) {
                $this->error("分类名称不能超过20个字符");
            }
            
            if (empty($request['content'])) {
                $this->error("请填写分类描述");
            }
            
            if (mb_strlen($request['content'], "utf-8") > 100) {
                $this->error("分类描述不能超过100个字符");
            }
            
            $categoryModel = new \Common\Model\PlanCategoryModel();
            $categoryModel->create($request);
            $result = $categoryModel->add();
            if ($result) {
                $this->success("添加成功", U("Admin/PlanCategory/index"));
            } else {
                $this->error("添加失败");
            }
            
        } else {
            $this->display();
        }
    }
}
