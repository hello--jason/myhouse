<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller {
    
    protected $adminid = null;
    
    public function __construct() {
        parent::__construct();
        
        $uid = session("adminid");
        $isNoLogin = $this->noLogin();
        if (empty($uid) && !$isNoLogin) {
            $this->redirect('Index/login');
        }
        
        $this->adminid = $uid;
        
        //获取管理员信息
        $adminModel = new \Common\Model\AdminModel();
        $admin = $adminModel->getById($uid);
        $this->assign("admin", $admin);
    }
    
    protected function noLogin(){
        $array = array(
            array('module'=>'Admin', 'controller'=>'Index', 'action'=> 'login'),
            array('module'=>'Admin', 'controller'=>'Index', 'action'=> 'verify')
        );
        
        $flag = FALSE;
        foreach ($array as $k=>$v) {
            if (MODULE_NAME == $v['module'] && CONTROLLER_NAME == $v['controller'] && ACTION_NAME == $v['action']) {
                $flag = TRUE;
            }
        }
        
        return $flag;
    }
    
    public function getPageHtml($count, $limit,$parameter = array()){
        //总记录数
        $count      = intval($count);
        
        //每页显示的记录数
        $limit      = intval($limit); 
        
        //分页链接参数
        $parameter  = empty($parameter) ? $_GET : $parameter;
        
        //当前页码
        $now_page   = empty($_GET['page']) ? 1 : intval($_GET['page']);
        
        //总页数
        $total_page = ceil($count / $limit);
        
        //链接
        $url        = "";
        
        $start      = 1;
        
        $end        = $total_page;
        if ($total_page > 6) {
            if ($now_page >= 4) {
                $start  = $now_page - 2;
                $end    = $now_page + 2;
            } else {
                $start  = 1;
                $end    = 4;
            }
        }
        
        if ($total_page <= 1) {
            return "";
        }
        
        
        $html   = "<div class='pageCon'>";
        $html  .= "<ul class='pagination'>";
        
//        $html  .= "<li class='active'><span class='hdbodysublistdivhuidus'>1</span></li>";
//        $html  .= "<li><a href='#'>2</a></li>";
//        $html  .= "<li><a href='#'>3</a></li>";
//        $html  .= "<li><a href='#'>4</a></li>";
//        $html  .= "<li><a href='/managerCenter/user?page=2'>»</a></li>";
//        $html  .= "</ul>";
//        $html  .= "</div>";
        
        if ($now_page > 1) {
            $parameter['page'] = $now_page - 1;
            $url = U(ACTION_NAME, $parameter);
            $html  .= "<li><a href='". $url ."'>«</a></li>";
        }
        
        for ($i = $start; $i <= $end; $i ++) {
            if ($i == $now_page) {
                $html  .= "<li class='active'><span class='hdbodysublistdivhuidus'>". $i ."</span></li>";
            } else {
                $parameter['page'] = $i;
                $url = U(ACTION_NAME, $parameter);
                $html  .= "<li><a href='". $url ."'>{$i}</a></li>";
            }
        }
        
        if ($now_page < $total_page) {
            $parameter['page'] = $now_page + 1;
            $url = U(ACTION_NAME, $parameter);
            $html  .= "<li><a href='". $url ."'>»</a></li>";
        }
        
        $html  .= "</ul>";
        $html  .= "</div>";
        
        return $html;
    }
}