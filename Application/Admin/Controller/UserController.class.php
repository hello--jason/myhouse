<?php
namespace Admin\Controller;
class UserController extends \Admin\Controller\BaseController {
    
    private $userModel   = null;


    public function __construct() {
        parent::__construct();
        $this->userModel = new \Common\Model\UserModel();
    }

    /**
     * 后台首页控制器
     * 
     */
    public function index() {
        $page       = intval(I("get.page"));
        $page       = $page < 1 ? 1 : $page;
        $limit      = 20;
        $beginTime  = trim(I("get.beginTime"));
        $endTime    = trim(I("get.endTime"));
        $type       = trim(I("get.type"));
        $keyword    = trim(I("get.keyword"));
        $condition  = "1=1";
        
        if (!empty($beginTime) && strtotime($beginTime) > 0) {
            $condition .= " AND addtime > ". strtotime($beginTime);
        }
        
        if (!empty($endTime) && strtotime($endTime) > 0) {
            $condition .= " AND addtime < ". (strtotime($endTime)+86399);
        }
        
        if (!empty($type) && !empty($keyword)) {
            if ($type == "username") {
                $condition .= " AND nickname like '%{$keyword}%'";
            } else if ($type == "mobile") {
                $condition .= " AND mobile like '%{$keyword}%'";
            }
        }
                
        //获取记录
        $users     = $this->userModel->getList($condition, "id DESC", $page, $limit);
        
        //获取记录总数
        $count      = $this->userModel->where($condition)->count();      
        
        //分页
        $pageHtml   = $this->getPageHtml($count, $limit);
        
        $this->assign("pageHtml", $pageHtml);
        $this->assign("users", $users);
        $this->display();
    }
    
    public function add(){
        if (IS_POST) {
            $request = array();
            $request['nickname']    = trim(I("post.nickname"));
            $request['image']       = trim(I("post.image"));
            $request['sex']         = trim(I("post.sex"));
            $request['mobile']      = trim(I("post.mobile"));
            $request['username']    = $request['mobile'];
            $request['password']    = md5(rand(10000000, 99999999));
            $request['email']       = trim(I("post.email"));
            $request['addtime']     = time();
            
            if (empty($request['nickname'])) {
                $this->error("请填写用户名");
            }
            
            if (mb_strlen($request['nickname'], "utf-8") > 20) {
                $this->error("用户名不能超过20个字符");
            }
            
            if (empty($request['mobile'])) {
                $this->error("请填写手机号码");
            }
            
            if (!isMobile($request['mobile'])) {
                $this->error("请填写正确的手机号码");
            }
            
            if (!empty($request['email']) && !isEmail($request['email'])) {
                $this->error("请填写正确的Email");
            }
            
            $result = $this->userModel->where("mobile='{$request['mobile']}'")->find();
            if (!empty($result)) {
                $this->error("手机号码系统已存在");
            }
            
            
            $this->userModel->create($request);
            $result = $this->userModel->add();
            if ($result) {
                $this->success("添加成功", U("Admin/User/index"));
            } else {
                $this->error("添加失败");
            }
            
        } else {
            $this->display();
        }        
    }
    
    public function edit(){
        $id         = intval(I("get.id"));
        $user       = $this->userModel->getById($id);
        if (IS_POST) {
            $request = array();
            $request['nickname']    = trim(I("post.nickname"));
            $request['image']       = trim(I("post.image"));
            $request['sex']         = trim(I("post.sex"));
            $request['mobile']      = trim(I("post.mobile"));
            $request['email']       = trim(I("post.email"));
            $request['addtime']     = time();
            
            if (empty($request['nickname'])) {
                $this->error("请填写用户名");
            }
            
            if (mb_strlen($request['nickname'], "utf-8") > 20) {
                $this->error("用户名不能超过20个字符");
            }
            
            if (empty($request['mobile'])) {
                $this->error("请填写手机号码");
            }
            
            if (!isMobile($request['mobile'])) {
                $this->error("请填写正确的手机号码");
            }
            
            if (!empty($request['email']) && !isEmail($request['email'])) {
                $this->error("请填写正确的Email");
            }
            
            $result = $this->userModel->where("mobile='{$request['mobile']}' AND id != {$id} ")->find();
            if (!empty($result)) {
                $this->error("手机号码系统已存在");
            }
            
            $this->userModel->create($request);
            $result = $this->userModel->where("id={$id}")->save();
            $this->success("编辑成功", U("Admin/User/index"));
        } else {
            $this->assign("user", $user);
            $this->display();
        }
    }
    
    public function del(){
        $id     = intval(I("get.id"));
        $store = $this->userModel->getById($id);
        if (empty($store)) {
            $this->error("找不到该记录");
        }
        
        $this->userModel->where("id={$id}")->delete();
        $this->success("删除成功");
    }
    
    public function icon(){
        if (IS_POST) {
            $file   = $_FILES;
            $index  = "image";
            
            //创建目录
            mkDirs(UPLOAD_PATH."User/");
            
            $upload = new \Think\Upload();
            $upload->maxSize        = 2 * 1024 * 1024; //2M
            $upload->exts           = array('jpg', 'gif', 'png', 'jpeg');
            $upload->rootPath       = UPLOAD_PATH."User/";
            $upload->savePath       = ''; 
            $upload->autoSub        = true;
            $upload->subName        = array('date','Ymd');
            $upload->saveName       = array('uniqid','');   
            $upload->thumb          = true;
            
            if (empty($file)) {
                echo "<script>parent.upload_callback(0, '请上传图片');</script>";
                exit();
            }
                        
            $info       = $upload->upload($file);
            if(!$info) {
                $message = $upload->getError();
                echo "<script>parent.upload_callback(0, '{$message}');</script>";
                exit();
            }else{
                $dir        = $upload->rootPath.$info[$index]['savepath'];
                $original   = $dir.$info[$index]['savename'];
                $original   = trim($original, ".");
                echo "<script>parent.upload_callback(1, '上传成功', '{$original}');</script>";
                exit();
            }
        } else {
            echo "<script>parent.upload_callback(0, '请上传图片');</script>";
            exit();
        }
    }
}
