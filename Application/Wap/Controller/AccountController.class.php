<?php
namespace Wap\Controller;
class AccountController extends \Wap\Controller\BaseController {
    
    protected $userModel = null;


    public function __construct() {
        parent::__construct();
        $this->userModel = new \Common\Model\UserModel();
    }

    public function index(){
        $user = $this->userModel->getById($this->user['id']);
        $this->assign("user", $user);
        $this->display();
    }
    
    public function login(){
        if (!empty($this->user)) {
            $this->redirect("Index/index");
            exit();
        }
        
        if (IS_POST) {
            $request = array();
            $request['mobile']  = trim(I("post.mobile"));
            $request['code']    = trim(I("post.code"));
            
            if (empty($request['mobile'])) {
                $this->ajaxReturn(array("status"=>-1001, "info"=>"请填写手机号码"));
            }

            if (!isMobile($request['mobile'])) {
                $this->ajaxReturn(array("status"=>-1002, "info"=>"请填写正确的手机号码"));
            }

            if (empty($request['code'])){
                $this->ajaxReturn(array("status"=>-1003, "info"=>"请填写验证码"));
            }
            
            $mobileCode = new \Common\Model\MobileCodeModel();
            $code = $mobileCode->where("mobile='{$request['mobile']}' AND code = '{$request['code']}' AND usetime = 0")->find();
            if (empty($code)) {
                $this->ajaxReturn(array("status"=>-1006, "info"=>"验证码错误"));
            }
            
            $userModel = new \Common\Model\UserModel();
            $user = $userModel->getUserByMobile($request['mobile']);
            
            if (!empty($user)) {
                $userModel->userLogin($user['id']);
                $mobileCode->updateUsedCode($request['mobile'], $request['code']);
            } else {
                $result = $userModel->registerByMobileCode($request['mobile'], $request['code']);
                if ($result['status'] < 1) {
                    $this->ajaxReturn($result);
                }
                $userModel->userLogin($result['uid']);
                $mobileCode->updateUsedCode($request['mobile'], $request['code']);
            }
            
            $this->ajaxReturn(array("status"=>1, "info"=>"登录成功"));
        } else {            
            $forward =  base64_decode($_GET['forward']);
            $this->assign("forward", $forward);
            $this->display();
        }
    }
    
    public function loginOut(){
        $this->userModel->loginOut();
        $this->redirect("Index/index");
    }
    
    public function userinfo(){
        $this->checkLogin();
        $user = $this->userModel->getById($this->user['id']);
        $this->assign("user", $user);
        $this->display();
    }
    
    public function updateInfo(){
        if (empty($this->user)) {
            $this->ajaxReturn(array("status"=>-1001, "info"=>"请先登录"));
        }
        
        $request = array();
        if (isset($_POST['nickname'])) {
            $request['nickname']= trim(I("post.nickname"));
            
            if (empty($request['nickname'])) {
                $this->ajaxReturn(array("status"=>-1002, "info"=>"请填写昵称"));
            }
            
            if (mb_strlen($request['nickname'], "utf-8") > 20) {
                $this->ajaxReturn(array("status"=>-1002, "info"=>"昵称不能大于20个字符"));
            }
            
            if (!isChinese($request['nickname'])) {
                $this->ajaxReturn(array("status"=>-1002, "info"=>"昵称请使用中文"));
            }
        }
        
        if (isset($_POST['sex'])) {
            $request['sex']     = intval(I("post.sex"));
            
            if (!in_array($request['sex'], array(0,1,2))) {
                $this->ajaxReturn(array("status"=>-1002, "info"=>"性别参数错误"));
            }
        }
        
        if (isset($_POST['email'])) {
            $request['email']   = trim(I("post.email"));
            
            if (empty($request['email'])) {
                $this->ajaxReturn(array("status"=>-1002, "info"=>"请填写Email"));
            }
            
            if (!isEmail($request['email'])) {
                $this->ajaxReturn(array("status"=>-1002, "info"=>"请填写正确的Email"));
            }
        }
        
        if (!isset($_POST['nickname']) && !isset($_POST['sex']) && !isset($_POST['email'])) {
            $this->ajaxReturn(array("status"=>-1002, "info"=>"参数错误, 请重新提交"));
        }
        
        $this->userModel->create($request);
        $this->userModel->where("id={$this->user['id']}")->save();
        $this->ajaxReturn(array("status"=>1, "info"=>"修改成功"));
    }
    
    public function uploadIcon(){
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
                
                $this->userModel->create(array("image"=>$original));
                $this->userModel->where("id={$this->user['id']}")->save();
                
                echo "<script>parent.upload_callback(1, '上传成功', '{$original}');</script>";
                exit();
            }
        } else {
            echo "<script>parent.upload_callback(0, '请上传图片');</script>";
            exit();
        }
    }
}