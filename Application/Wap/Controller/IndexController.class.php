<?php
namespace Wap\Controller;
class IndexController extends \Wap\Controller\BaseController {
    
    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $demandModel= new \Common\Model\DemandModel();
        $demands    = $demandModel->getList("status = 1", "verify_time DESC", 1, 10);
        
        $advertModel= new \Common\Model\AdvertModel();
        $adverts    = $advertModel->where("keyword in ('wap_index_index1', 'wap_index_index2', 'wap_index_index3')")->select();
        
        $this->assign("adverts", $adverts);
        $this->assign("demands", $demands);
        $this->display();
    }
    
    public function test(){
        //获取用户本地地址
        $local = getLocation();die;
        $this->display();
    }
}