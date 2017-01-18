<?php
namespace Admin\Controller;
class ArticleController extends \Admin\Controller\BaseController {
    
    private $articleModel   = null;


    public function __construct() {
        parent::__construct();
        $this->articleModel = new \Common\Model\ArticleModel();
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
            $condition .= " AND title like '%{$keyword}%'";
        }
        
        //获取记录
        $articles = $this->articleModel->getList($condition, "id DESC", $page, $limit);
        
        //获取记录总数
        $count      = $this->articleModel->where($condition)->count();      
        
        //分页
        $pageHtml   = $this->getPageHtml($count, $limit);
        
        $categories = $this->articleModel->getCategories();
        
        foreach ($articles as $k => $v) {
            if (!empty($categories[$v['categoryid']])) {
                $articles[$k]['category_name'] = $categories[$v['categoryid']];
            } else {
                $articles[$k]['category_name'] = "";
            }
        }
        
        $this->assign("pageHtml", $pageHtml);
        $this->assign("articles", $articles);
        $this->display();
    }
    
    public function add(){
        if (IS_POST) {
            $request = array();
            $request['title']       = trim(I("post.title"));
            $request['content']     = trim($_POST['content']);
            $request['display']     = intval(I("post.display"));
            $request['categoryid']  = intval(I("post.categoryid"));
            $request['addtime']     = time();
            
            if (empty($request['title'])) {
                $this->error("请填写活动标题");
            }
            
            if (mb_strlen($request['title'], "utf-8") > 30) {
                $this->error("活动标题不能超过30个字符");
            }
            
            if (empty($request['content'])) {
                $this->error("请填写内容");
            }
            
                        
            $this->articleModel->create($request);
            $result = $this->articleModel->add();
            if ($result) {
                $this->success("添加成功", U("Admin/Article/index"));
            } else {
                $this->error("添加失败");
            }
            
        } else {
            $this->assign("categories", $this->articleModel->getCategories());
            $this->display();
        }        
    }
    
    public function edit(){
        $id         = intval(I("get.id"));
        $article    = $this->articleModel->getById($id);
        if (IS_POST) {
            $request = array();
            $request['title']       = trim(I("post.title"));
            $request['content']     = trim($_POST['content']);
            $request['display']     = intval(I("post.display"));
            $request['categoryid']  = intval(I("post.categoryid"));
            $request['addtime']     = time();
            
            if (empty($request['title'])) {
                $this->error("请填写活动标题");
            }
            
            if (mb_strlen($request['title'], "utf-8") > 30) {
                $this->error("活动标题不能超过30个字符");
            }
            
            if (empty($request['content'])) {
                $this->error("请填写内容");
            }
            
            $this->articleModel->create($request);
            $result = $this->articleModel->where("id={$id}")->save();
            $this->success("编辑成功", U("Admin/Article/index"));
        } else {
            $this->assign("categories", $this->articleModel->getCategories());
            $this->assign("article", $article);
            $this->display();
        }
    }
    
    public function del(){
        $id     = intval(I("get.id"));
        $advert = $this->articleModel->getById($id);
        if (empty($advert)) {
            $this->error("找不到该记录");
        }
        
        $this->articleModel->where("id={$id}")->delete();
        $this->success("删除成功");
    }
}
