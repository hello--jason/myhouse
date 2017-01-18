<?php
namespace Wap\Controller;
class StoreController extends \Wap\Controller\BaseController {
    
    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $page   = intval(I("get.page"));
        $page   = $page < 1 ? 1 : $page;
        $limit  = 10;
        
        //获取门店
        $storeModel = new \Common\Model\StoreModel();
        $stores     = $storeModel->getList("", "id DESC", $page, $limit);
        
        $this->assign("stores", $stores);
        $this->display();
    }
    
    public function map(){
        $id         = intval(I("get.id"));
        $storeModel = new \Common\Model\StoreModel();
        $store      = $storeModel->getById($id);
        if (!empty($store)) {
            $location = explode(",", $store['position']);
            $store['lat'] = $location[0];
            $store['lng'] = $location[1];
        }
        
        $this->assign("store", $store);
        $this->display();
    }
}