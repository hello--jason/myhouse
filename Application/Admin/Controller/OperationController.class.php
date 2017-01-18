<?php
namespace Admin\Controller;
class OperationController extends \Admin\Controller\BaseController {
    
    protected $operationModel     = null;

    public function __construct() {
        parent::__construct();
        $this->operationModel    = new \Common\Model\OperationModel();
    }

    public function index(){
        $page       = intval(I("get.page"));
        $page       = $page < 1 ? 1 : $page;
        $limit      = 20;
        $start      = ($page - 1) * $limit;
        $keyword    = trim(I("get.keyword"));
        $condition  = "typeid in (1,2,3) AND module='Admin'";
        if (!empty($keyword)) {
            $adminModel = new \Common\Model\AdminModel();
            $admin      = $adminModel->where("username like '%{$keyword}%'")->select();
            $adminid    = array();
            if (!empty($admin)) {
                foreach ($admin as $k=>$v) {
                    $adminid[] = intval($v['id']);
                }
            }
            
            if (!empty($adminid)) {
                $condition .= " AND adminid in (". implode(",", $adminid) .")";
            } else {
                $condition .= " AND adminid in (0)";
            }
        }
        
        
        //获取操作日志
        $results    = $this->operationModel->getList($condition, "id DESC", $page, $limit);
        $adminids = array();
        foreach ($results as $k=>$v) {
            $adminids[] = $v['adminid'];
        }

        //根据UID获取管理员数据
        $adminModel = new \Common\Model\AdminModel();
        $admins     = $adminModel->getByIds($adminids);
        foreach ($results as $key=>$val) {
            if (!empty($admins[$val['adminid']])) {
                $results[$key]['admin_name'] = $admins[$val['adminid']]["username"];
            }
        }
        
        
        //获取记录总数
        $count      = $this->operationModel->where($condition)->count();
        
        //分页
        $Page       = new \Think\Page($count,$limit);
        $show       = $Page->show();   
        
        $this->assign("showPage", $show);
        $this->assign("operations", $results);
        $this->display();
    }
    
    public function login(){
        $page       = intval(I("get.page"));
        $page       = empty($page) ? 1 : $page;
        $limit      = 30;
        $start      = ($page - 1) * $limit;         
        $keyword    = trim(I("get.keyword"));
        $condition  = "typeid = 4";
        if (!empty($keyword)) {
            $adminModel  = new \Common\Model\AdminModel();
            $admins      = $adminModel->where("username like '%{$keyword}%'")->select();
            $uids       = array();
            if (!empty($admins)) {
                foreach ($admins as $k=>$v) {
                    $uids[] = intval($v['id']);
                }
            }
            
            if (!empty($uids)) {
                $condition .= " AND adminid in (". implode(",", $uids) .")";
            } else {
                $condition .= " AND adminid in (0)";
            }
        }
        
        //获取登录日志
        $results    = $this->operationModel->where($condition)->order("id DESC")->limit($start, $limit)->select();
        $adminids   = array();
        foreach ($results as $k=>$v) {
            $adminids[] = $v['adminid'];
        }
        $adminids = array_unique($adminids);
       
       
        //根据UID获取管理员数据
        $adminModel = new \Common\Model\AdminModel();
        $admins     = $adminModel->getByIds($adminids);
        foreach ($results as $key=>$val) {
            if (!empty($admins[$val['adminid']])) {
                $results[$key]['admin_name'] = $admins[$val['adminid']]["username"];
            }
        }
        
        //获取记录总数
        $count      = $this->operationModel->where($condition)->count();        
        
        //分页
        $Page       = new \Think\Page($count,$limit);
        $show       = $Page->show();   
        
        $this->assign("showPage", $show);        
        $this->assign("results", $results);
        $this->display();
    }
}
