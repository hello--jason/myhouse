<?php
namespace Common\Model;
class AdminModel extends \Common\Model\BaseModel {
    /**
     * 表名
     * @var type 
     */
    protected $tableName        = 'admin';
    
       
    /**
     * 自动填充
     * @var type 
     */
    protected $_auto            = array(
        array('updatetime','time',3,'function'),
    );


    /**
     * 根据用户名获取管理员信息
     * @param type $username
     * @return type
     */
    public function getAdminByUsername($username){
        $admin = $this->where("username='{$username}'")->find();
        
        return $admin; 
    }
    
    /**
     * 根据UID获取管理员信息
     * @param   type $uid
     * @return  type
     */
    public function getAdminByUid($uid){
        $uid    = intval($uid);
        $admin  = $this->where("id='{$uid}'")->find();        
        return $admin; 
    }
     
    /**
     * 验证用户登录
     * @param type $username    用户名称
     * @param type $password    用户密码
     * @return type             验证成功返回用户对象，错误返回错误码以及错误信息
     */
    public function checkUserLogin($username, $password){
        $admin = $this->getAdminByUsername($username);
        if (empty($admin)) {
            return array('errcode'=>-1, "info"=>'用户不存在');
        }
        
        if ($admin['password'] != md5($password)) {
            return array('errcode'=>-2, "info"=>'密码错误');
        }
        
        return $admin;
    }
    
    /**
     * 管理员登录
     * @param type $uid
     * @param type $username
     * @param type $groupid
     */
    public function userLogin($uid, $username, $groupid){
        //设置用户登录记录
        session("adminid", $uid);
        session("username", $username);
        session("groupid", $groupid);
        
        //添加用户登录日志
    }
    
    
    /**
     * 用户退出
     * 
     */
    public function userLoginOut(){
        //设置用户退出登录标识
        session("adminid", NULL);
        session("username", NULL);
        session("groupid", NULL);
    }
        
    public function loginLog(){
        $operationModel = new \Common\Model\OperationModel();
        $items[] = array();
        $items['module']        = MODULE_NAME;
        $items['controller']    = CONTROLLER_NAME;
        $items['action']        = ACTION_NAME;
        $items['typeid']        = 4;
        $items['original']      = "";
        $items['updated']       = "";
        $items['ip']            = get_client_ip();
        $items['adminid']       = session("adminid");
        $items['addtime']       = time();
        $operationModel->create($items);
        $operationModel->add();
    }
}