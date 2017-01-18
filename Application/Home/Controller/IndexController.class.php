<?php
namespace Home\Controller;
class IndexController extends \Home\Controller\BaseController {
    
    protected $demandModel    = null;

    public function __construct() {
        parent::__construct();
        $this->demandModel    = new \Common\Model\DemandModel();
    }

    public function index(){
        $demands = $this->demandModel->getList("status = 1", "verify_time DESC", 1, 10);
        
        $advertModel= new \Common\Model\AdvertModel();
        $adverts    = $advertModel->where("keyword in ('wap_index_index1', 'wap_index_index2', 'wap_index_index3')")->select();
        
        $this->assign("adverts", $adverts);
        $this->assign("demands", $demands);
        $this->display();
    }
    
    public function subject(){
        $this->display();
    }
}