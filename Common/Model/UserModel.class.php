<?php
namespace Common\Model;
class UserModel extends \Common\Model\BaseModel {
    /**
     * 表名
     * @var type 
     */
    protected $tableName        = 'user';
    
    /**
     * 自动填充
     * @var type 
     */
    protected $_auto            = array(
        array('updatetime','time',3,'function'),
    );
    
    public function getUserByMobile($mobile){
        if (!isMobile($mobile)) {
            return array();
        }
        
        $user = $this->where("mobile='{$mobile}'")->find();
        
        return $user;
    }
    
    /**
     * 用户登录
     * @param type $uid
     * @param type $username
     * @param type $groupid
     */
    public function userLogin($uid){
        $uid = intval($uid);
        
        //设置用户登录记录
        session("uid", $uid);
        
        $user = $this->getById($uid);
        
        session("user_info", $user);
    }
    
    /**
     * 用户退出
     * 
     * @param type $name Description
     * @return type Description
     */
    public function loginOut(){
        session("uid", NULL);        
        session("user_info", NULL);
    }
    
    /**
     * 用户注册
     * @param type $mobile 手机号码
     * @param type $code 手机验证码
     */
    public function registerByMobileCode($mobile, $code){
        if (empty($mobile)) {
            return array("status"=>-1001, "info"=>"请填写手机号码");
        }

        if (!isMobile($mobile)) {
            return array("status"=>-1002, "info"=>"请填写正确的手机号码");
        }

        if (empty($code)){
            return array("status"=>-1003, "info"=>"请填写验证码");
        }

        $mobileCode = new \Common\Model\MobileCodeModel();
        $code = $mobileCode->where("mobile='{$mobile}' AND code = '{$code}' AND usetime = 0")->find();
        if (empty($code)) {
            return array("status"=>-1006, "info"=>"验证码错误");
        }
        
        $user = $this->getUserByMobile($mobile);
        if (!empty($user)) {
            return array("status"=>-1007, "info"=>"手机号码已存在");
        }
        
        $data = array();
        $data['username']   = $mobile;
        $data['password']   = md5(rand(10000000, 99999999));
        $data['mobile']     = $mobile;
        $data['nickname']   = $mobile;
        $data['addtime']    = time();
        
       
        $this->create($data);
        $uid = $this->add();
        
        return array("status"=>1, "info"=>"注册成功", "uid"=>$uid);
    }
}