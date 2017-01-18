<?php
namespace Wap\Controller;
class JobController extends \Wap\Controller\BaseController {
    
    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $page       = intval(I("get.page"));
        $page       = $page < 1 ? 1 : $page;
        $limit      = 100;
        
        //获取招聘列表
        $jobModel   = new \Common\Model\JobModel();
        $jobs       = $jobModel->getList("", "id DESC", $page, $limit);
        
        $this->assign("jobs", $jobs);
        $this->display();
    }
    
    public function detail(){
        $id = intval(I("get.id"));
        
        $jobModel   = new \Common\Model\JobModel();
        $job        = $jobModel->getById($id);
        
        $this->assign("job", $job);
        $this->display();
    }
}