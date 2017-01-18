<?php
namespace Admin\Controller;
class StoreController extends \Admin\Controller\BaseController {
    
    private $storeModel   = null;


    public function __construct() {
        parent::__construct();
        $this->storeModel = new \Common\Model\StoreModel();
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
        $stores     = $this->storeModel->getList($condition, "id DESC", $page, $limit);
        
        //获取记录总数
        $count      = $this->storeModel->where($condition)->count();      
        
        //分页
        $pageHtml   = $this->getPageHtml($count, $limit);
        
        $this->assign("pageHtml", $pageHtml);
        $this->assign("stores", $stores);
        $this->display();
    }
    
    public function add(){
        if (IS_POST) {
            $request = array();
            $request['name']        = trim(I("post.name"));
            $request['address']     = trim(I("post.address"));
            $request['telephone']   = trim(I("post.telephone"));
            $request['position']    = trim(I("post.position"));
            $request['addtime']     = time();
            
            if (empty($request['name'])) {
                $this->error("请填写门店名称");
            }
            
            if (mb_strlen($request['name'], "utf-8") > 30) {
                $this->error("门店名称不能超过30个字符");
            }
            
            if (empty($request['address'])) {
                $this->error("请填写门店地址");
            }
            
            if (mb_strlen($request['address'], "utf-8") > 100) {
                $this->error("门店地址不能超过100个字符");
            }
            
            if (empty($request['telephone'])) {
                $this->error("请填写门店电话");
            }
            
            if (mb_strlen($request['telephone'], "utf-8") > 30) {
                $this->error("门店电话不能超过30个字符");
            }
                        
            $this->storeModel->create($request);
            $result = $this->storeModel->add();
            if ($result) {
                $this->success("添加成功", U("Admin/Store/index"));
            } else {
                $this->error("添加失败");
            }
            
        } else {
            $this->display();
        }        
    }
    
    public function edit(){
        $id         = intval(I("get.id"));
        $store      = $this->storeModel->getById($id);
        if (IS_POST) {
            $request = array();
            $request['name']        = trim(I("post.name"));
            $request['address']     = trim(I("post.address"));
            $request['telephone']   = trim(I("post.telephone"));
            $request['position']    = trim(I("post.position"));
            $request['addtime']     = time();
            
            if (empty($request['name'])) {
                $this->error("请填写门店名称");
            }
            
            if (mb_strlen($request['name'], "utf-8") > 30) {
                $this->error("门店名称不能超过30个字符");
            }
            
            if (empty($request['address'])) {
                $this->error("请填写门店地址");
            }
            
            if (mb_strlen($request['address'], "utf-8") > 100) {
                $this->error("门店地址不能超过100个字符");
            }
            
            if (empty($request['telephone'])) {
                $this->error("请填写门店电话");
            }
            
            if (mb_strlen($request['telephone'], "utf-8") > 30) {
                $this->error("门店电话不能超过30个字符");
            }
            
            $this->storeModel->create($request);
            $result = $this->storeModel->where("id={$id}")->save();
            $this->success("编辑成功", U("Admin/Store/index"));
        } else {
            $this->assign("store", $store);
            $this->display();
        }
    }
    
    public function del(){
        $id     = intval(I("get.id"));
        $store = $this->storeModel->getById($id);
        if (empty($store)) {
            $this->error("找不到该记录");
        }
        
        $this->storeModel->where("id={$id}")->delete();
        $this->success("删除成功");
    }
    
    public function getLocation() {
        $address= trim(I("post.address"));
        if (empty($address)) {
            $this->ajaxReturn(array("status"=>-1, "info"=>"请填写地址"));
        }
        $url    = "http://api.map.baidu.com/geocoder/v2/?address={$address}&output=json&ak=C735ed6edfdaf2c2e5028ead02b8a760";
        
        $result = file_get_contents($url);
        $result = json_decode($result, true);
        if ($result['status'] != 0) {
            $this->ajaxReturn(array("status"=>-1, "info"=>"获取失败"));
        }
        
        if (!empty($result['result']) && !empty($result['result']['location'])) {
            $this->ajaxReturn(array("status"=>1, "info"=>"获取成功", "location"=>$result['result']['location']));
        } else {
            $this->ajaxReturn(array("status"=>-1, "info"=>"获取失败"));
        }
    }

}
