<?php
namespace Admin\Controller;
class AdvertController extends \Admin\Controller\BaseController {
    
    private $advertModel = null;


    public function __construct() {
        parent::__construct();
        $this->advertModel = new \Common\Model\AdvertModel();
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
        $adverts = $this->advertModel->getList($condition, "id DESC", $page, $limit);
        
        //获取记录总数
        $count      = $this->advertModel->where($condition)->count();
        
        //分页
        $pageHtml   = $this->getPageHtml($count, $limit);
        
        $this->assign("pageHtml", $pageHtml);
        $this->assign("adverts", $adverts);
        $this->display();
    }
    
    public function add(){
        if (IS_POST) {
            $request = array();
            $request['position']        = trim(I("post.position"));
            $request['title']           = trim(I("post.title"));
            $request['image']          = trim(I("post.image"));
            $request['image_mobile']   = trim(I("post.image_mobile"));
            $request['keyword']         = trim(I("post.keyword"));
            $request['website']         = trim(I("post.website"));
            $request['display']         = intval(I("post.display"));
            $request['addtime']         = time();
            
            if (empty($request['position'])) {
                $this->error("请填写广告位置");
            }
            
            if (mb_strlen($request['position'], "utf-8") > 20) {
                $this->error("广告位置不能超过20个字符");
            }
            
            if (empty($request['title'])) {
                $this->error("请填写活动标题");
            }
            
            if (mb_strlen($request['title'], "utf-8") > 30) {
                $this->error("活动标题不能超过30个字符");
            }
            
            if (empty($request['keyword'])) {
                $this->error("请填写关键词");
            }
            
            if (mb_strlen($request['keyword'], "utf-8") > 30) {
                $this->error("关键词不能超过30个字符");
            }
            
            $result = $this->advertModel->where("keyword='{$request['keyword']}'")->find();
            if (!empty($result)) {
                $this->error("关键词已存在");
            }
            
            if (!empty($request['website']) && !isWebSite($request['website'])) {
               // $this->error("请填写正确的URL");
            }
            
            $this->advertModel->create($request);
            $result = $this->advertModel->add();
            if ($result) {
                $this->success("添加成功", U("Admin/Advert/index"));
            } else {
                $this->error("添加失败");
            }
            
        } else {
            $this->display();
        }        
    }
    
    public function edit(){
        $id     = intval(I("get.id"));
        $advert = $this->advertModel->getById($id);
        if (IS_POST) {
            $request = array();
            $request['position']        = trim(I("post.position"));
            $request['title']           = trim(I("post.title"));
            if (isset($_POST['image']) && !empty($_POST['image'])) {
                $request['image']          = trim(I("post.image"));
            }
            
            if (isset($_POST['image_mobile']) && !empty($_POST['image_mobile'])) {
                $request['image_mobile']   = trim(I("post.image_mobile"));
            }
            $request['keyword']         = trim(I("post.keyword"));
            $request['website']         = trim(I("post.website"));
            $request['display']         = intval(I("post.display"));
            $request['addtime']         = time();
            
            if (empty($advert)) {
                $this->error("找不到该记录");
            }
            
            if (empty($request['position'])) {
                $this->error("请填写广告位置");
            }
            
            if (mb_strlen($request['position'], "utf-8") > 20) {
                $this->error("广告位置不能超过20个字符");
            }
            
            if (empty($request['title'])) {
                $this->error("请填写活动标题");
            }
            
            if (mb_strlen($request['title'], "utf-8") > 30) {
                $this->error("活动标题不能超过30个字符");
            }
            
            if (empty($request['keyword'])) {
                $this->error("请填写关键词");
            }
            
            if (mb_strlen($request['keyword'], "utf-8") > 30) {
                $this->error("关键词不能超过30个字符");
            }
            
            $result = $this->advertModel->where("keyword='{$request['keyword']}' AND id != {$id}")->find();
            if (!empty($result)) {
                $this->error("关键词已存在");
            }
            
            if (!empty($request['website']) && !isWebSite($request['website'])) {
               // $this->error("请填写正确的URL");
            }
            
            $this->advertModel->create($request);
            $result = $this->advertModel->where("id={$id}")->save();
            
            $this->success("编辑成功", U("Admin/Advert/index"));
        } else {
            $this->assign("advert", $advert);
            $this->display();
        }
    }
    
    public function del(){
        $id     = intval(I("get.id"));
        $advert = $this->advertModel->getById($id);
        if (empty($advert)) {
            $this->error("找不到该记录");
        }
        
        $this->advertModel->where("id={$id}")->delete();
        $this->success("删除成功");
    }
    
    public function upload() {
        $file   = $_FILES;
        $index  = "image";
        $upload = new \Think\Upload();
        $upload->maxSize    = 0;
        $upload->exts       = array('jpg', 'gif', 'png', 'jpeg');
        $upload->rootPath   = UPLOAD_PATH."Advert/";
        $upload->savePath   = ''; 
        $upload->autoSub    = true;
        $upload->subName    = array('date','Ymd');
        $upload->saveName   = array('uniqid','');
        
        // 上传文件 
        $info               = $upload->upload($file);        
        if(!$info) {
            echo "<script>parent.upload_callback(0,'". $upload->getError() ."');</script>";
            exit();
        }else{
            $filename = $upload->rootPath.$info[$index]['savepath'].$info[$index]['savename']; 
            $filename = trim($filename, ".");
            echo "<script>parent.upload_callback(1,'{$filename}', '{$_POST['object_flag']}');</script>";
            exit();
        }
    }
}
