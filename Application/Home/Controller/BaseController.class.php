<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {
    
    protected $user = array();

    public function __construct() {
         parent::__construct();
         $this->user = session("user_info");
         $this->user = empty($this->user) || !is_array($this->user) ? array() : $this->user;
         $this->assign("head_user_info", $this->user);
         
    }
    
    public function getUid(){
        return empty($this->user['id']) ? 0 : $this->user['id'];
    }
    
    public function isMobile($mobile){
        $pattern = "/^1[34578]\d{9}$/";
        if (preg_match($pattern, $mobile)) {
            return TRUE;
        } else {
            return FALSE;
        }
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
        
        $html       = '';
        $html      .= '<div class="pagination" id="pages" data-page="0" data-total="23" data-epage="10">';
        $html      .= '<div class="pagination">';
        if ($now_page > 1) {
            $parameter['page'] = $now_page - 1;
            $url = U(ACTION_NAME, $parameter);
            $html  .= '<a href="'. $url .'" class="prev">上一页</a>';
        } else {
            $html  .= '<span class="current prev">上一页</span>';
        }
        
        for ($i = $start; $i <= $end; $i ++) {
            if ($i == $now_page) {
                $html  .= '<span class="current">'.$i.'</span>';
            } else {
                $parameter['page'] = $i;
                $url = U(ACTION_NAME, $parameter);
                $html  .= '<a href="'.$url.'">'.$i.'</a>';
            }
        }
        
        if ($now_page < $total_page) {
            $parameter['page'] = $now_page + 1;
            $url = U(ACTION_NAME, $parameter);
            $html      .= '<a href="'.$url.'" class="next">下一页</a>';
        } else {
            $html  .= '<span class="current next">下一页</span>';
        }
        
        $html      .= '</div>';
        $html      .= '</div>';
        
        return $html;
    }
    
    public function getMiniPageHtml($count, $limit,$parameter = array()){
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
            if ($now_page > 4) {
                $start  = $now_page - 2;
                $end    = $now_page + 2;
            }
        }
        
        if ($total_page <= 1) {
            return "";
        }
        
        $html       = '';
        $html      .= "<div class='pager'>";
        
        if ($now_page > 1) {
            $parameter['page'] = $now_page - 1;
            $url = U(ACTION_NAME, $parameter);
            $html  .= "<a class='icon prev' href='{$url}'></a>";
        } else {
            $html  .= "<a class='icon prev disable' href='#prev'></a>";
        }
        
        $html      .= "<div class='num'><span class='current'>{$now_page}</span>/{$total_page}</div>";
        
        if ($now_page < $total_page) {
            $parameter['page'] = $now_page + 1;
            $url = U(ACTION_NAME, $parameter);
            $html   .= "<a class='icon next' href='{$url}'></a>";
        } else {
            $html   .= "<a class='icon next disable' href='#next'></a>";
        }
        
        $html      .= "</div>";
        return $html;
    }
}