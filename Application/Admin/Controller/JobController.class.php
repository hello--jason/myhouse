<?php
namespace Admin\Controller;
class JobController extends \Admin\Controller\BaseController {
    
    private $jobModel   = null;


    public function __construct() {
        parent::__construct();
        $this->jobModel = new \Common\Model\JobModel();
    }

    /**
     * 后台首页控制器
     * 
     */
    public function index() {
        $page       = intval(I("get.page"));
        $page       = $page < 1 ? 1 : $page;
        $limit      = 20;
        $keyword    = trim(I("get.keyword"));
        $condition  = "1=1";
        
        if (!empty($keyword)) {
            $condition .= " AND name like '%{$keyword}%'";
        }        
        
        //获取记录
        $jobs     = $this->jobModel->getList($condition, "id DESC", $page, $limit);
        
        //获取记录总数
        $count      = $this->jobModel->where($condition)->count();      
        
        //分页
        $pageHtml   = $this->getPageHtml($count, $limit);
        
        $this->assign("pageHtml", $pageHtml);
        $this->assign("jobs", $jobs);
        $this->display();
    }
    
    public function add(){
        if (IS_POST) {
            $request = array();
            $request['name']        = trim(I("post.name"));
            $request['quantity']    = intval(I("post.quantity"));
            $request['duties']      = nl2br(trim(I("post.duties")));
            $request['demand']      = nl2br(trim(I("post.demand")));
            $request['address']     = trim(I("post.address"));
            $request['addtime']     = time();
            
            if (empty($request['name'])) {
                $this->error("请填写岗位名称");
            }
            
            if (mb_strlen($request['name'], "utf-8") > 30) {
                $this->error("岗位名称不能超过30个字符");
            }
            
            if (empty($request['quantity'])){
                $this->error("请填写招聘人数");
            }
            
            if (empty($request['duties'])) {
                $this->error("请填写岗位职责");
            }
            
            if (mb_strlen($request['duties'], "utf-8") > 500) {
                $this->error("岗位职责不能超过500个字符");
            }
            
            if (empty($request['demand'])) {
                $this->error("请填写任职要求");
            }
            
            if (mb_strlen($request['demand'], "utf-8") > 500) {
                $this->error("任职要求不能超过500个字符");
            }
            
            if (empty($request['address'])) {
                $this->error("请填写工作地点");
            }
            
            if (mb_strlen($request['address'], "utf-8") > 100) {
                $this->error("工作地点不能超过100个字符");
            }
                      
                        
            $this->jobModel->create($request);
            $result = $this->jobModel->add();
            if ($result) {
                $this->success("添加成功", U("Admin/Job/index"));
            } else {
                $this->error("添加失败");
            }
            
        } else {
            $this->display();
        }        
    }
    
    public function edit(){
        $id         = intval(I("get.id"));
        $job      = $this->jobModel->getById($id);
        if (IS_POST) {
            $request = array();
            $request['name']        = trim(I("post.name"));
            $request['quantity']    = intval(I("post.quantity"));
            $request['duties']      = nl2br(trim(I("post.duties")));
            $request['demand']      = nl2br(trim(I("post.demand")));
            $request['address']     = trim(I("post.address"));
            $request['addtime']     = time();
            
            if (empty($request['name'])) {
                $this->error("请填写岗位名称");
            }
            
            if (mb_strlen($request['name'], "utf-8") > 30) {
                $this->error("岗位名称不能超过30个字符");
            }
            
            if (empty($request['quantity'])){
                $this->error("请填写招聘人数");
            }
            
            if (empty($request['duties'])) {
                $this->error("请填写岗位职责");
            }
            
            if (mb_strlen($request['duties'], "utf-8") > 500) {
                $this->error("岗位职责不能超过500个字符");
            }
            
            if (empty($request['demand'])) {
                $this->error("请填写任职要求");
            }
            
            if (mb_strlen($request['demand'], "utf-8") > 500) {
                $this->error("任职要求不能超过500个字符");
            }
            
            if (empty($request['address'])) {
                $this->error("请填写工作地点");
            }
            
            if (mb_strlen($request['address'], "utf-8") > 100) {
                $this->error("工作地点不能超过100个字符");
            }
            
            $this->jobModel->create($request);
            $result = $this->jobModel->where("id={$id}")->save();
            $this->success("编辑成功", U("Admin/Job/index"));
        } else {
            $this->assign("job", $job);
            $this->display();
        }
    }
    
    public function del(){
        $id     = intval(I("get.id"));
        $store = $this->jobModel->getById($id);
        if (empty($store)) {
            $this->error("找不到该记录");
        }
        
        $this->jobModel->where("id={$id}")->delete();
        $this->success("删除成功");
    }
}
