<?php
namespace Admin\Controller;
class ManagerController extends \Admin\Controller\BaseController {
    
    private $managerModel   = null;
    
    private $roleModel      = null;

    public function __construct() {
        parent::__construct();
        $this->managerModel = new \Common\Model\AdminModel();
        $this->roleModel    = new \Common\Model\RoleModel();
    }
    
    
    public function index(){
        $manager = $this->managerModel->getList("", "id DESC");
        $groupid = array();
        
        foreach ($manager as $k=>$v) {
            $groupid[] = intval($v['group']);
        }
        
        $groups = array();
        if (!empty($groupid)) {
            $groups = $this->roleModel->getByIds($groupid);
        }
        
        foreach ($manager as $key => $val) {
            if (!empty($groups[$val['group']])) {
                $manager[$key]['group_name'] = $groups[$val['group']]['name'];
            } else {
                $manager[$key]['group_name'] = "";
            }
        }
        
        $this->assign("manager", $manager);
        $this->display();
    }
    
    public function add(){
        $roles = $this->roleModel->getList("", "id DESC");
        if (IS_POST) {
            $request = array();
            $request['username'] = trim(I("post.username"));
            $request['password'] = trim(I("post.password"));
            $request['group']    = intval(I("post.group"));
            
            if (empty($request['username'])) {
                $this->error("请填写账号");
            }
            
            if (empty($request['password'])) {
                $this->error("请填写密码");
            }
            
            if (strlen($request['password']) < 6 || strlen($request['password']) > 20) {
                $this->error("密码长度为6到20位");
            }
//            
//            if (empty($request['group'])) {
//                $this->error("请选择分组");
//            }            
//            
            $result = $this->managerModel->where("username='{$request['username']}'")->find();
            if (!empty($result)) {
                $this->error("账号名称已存在");
            }
            
            $data = $request;
            $data['password']   = md5($data['password']);
            $data['addtime']    = time();
            $result = $this->managerModel->create($data);
            $result = $this->managerModel->add();
            if ($result) {
                $this->success("添加成功", U("Admin/Manager/index"));
            } else {
                $this->error("添加失败");
            }
            
        } else {
            $this->assign("roles", $roles);
            $this->display();
        }
    }
    
    public function edit(){
        $id     = intval(I("get.id"));
        $manager= $this->managerModel->getById($id);
        $roles  = $this->roleModel->getList("", "id DESC");
        if (IS_POST) {
            $request = array();
            $request['username'] = trim(I("post.username"));
            $request['password'] = trim(I("post.password"));
            $request['group']    = intval(I("post.group"));
            
            if (empty($manager)) {
                $this->error("编辑失败，找不到该记录");
            }
            
            if (empty($request['username'])) {
                $this->error("请填写账号");
            }
                        
            if (!empty($request['password']) && (strlen($request['password']) < 6 || strlen($request['password']) > 20)) {
                $this->error("密码长度为6到20位");
            }
//            
//            if (empty($request['group'])) {
//                $this->error("请选择分组");
//            }
            
            $result = $this->managerModel->where("username='{$request['username']}' AND id != {$id}")->find();
            if (!empty($result)) {
                $this->error("账号名称已存在");
            }
            
            $data = $request;
            $data['password']   = !empty($data) ? md5($data['password']) : $manager['password'];

            $this->managerModel->create($data);
            $result = $this->managerModel->where("id={$id}")->save();
            if ($result) {
                $this->success("编辑成功", U("Admin/Manager/index"));
            } else {
                $this->error("编辑失败");
            }
            
        } else {
            $this->assign("manager", $manager);
            $this->assign("roles", $roles);
            $this->display();
        }
    }
    
    public function del(){
        $id = intval(I("get.id"));
        $this->managerModel->where("id={$id}")->delete();
        $this->success("删除成功", U("Admin/Manager/index"));
    }
}