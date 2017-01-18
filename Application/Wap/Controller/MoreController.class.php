<?php
namespace Wap\Controller;
class MoreController extends \Wap\Controller\BaseController {
    
    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->display();
    }
    
    public function about(){
        $articleModel = new \Common\Model\ArticleModel();
        $about = $articleModel->where("categoryid=1")->order("id DESC")->find();
        
        $this->assign("about", $about);
        $this->display();
    }
    
    public function safe(){
        $this->display();
    }
    
    public function zhaopin(){
        $this->display();
    }
}