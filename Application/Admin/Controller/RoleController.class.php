<?php
namespace Admin\Controller;
class RoleController extends \Admin\Controller\BaseController {
    
    private $roleModel   = null;


    public function __construct() {
        parent::__construct();
        $this->roleModel = new \Common\Model\RoleModel();
    }
    
    
    public function index(){
        $keyword= trim(I("get.keyword"));
        
        $roles  = $this->roleModel->getList("", "id DESC");
        
        $this->assign("roles", $roles);
        $this->display();
    }
    
    public function add(){
        $permission = include_once APP_PATH."Admin/Conf/role.php";
        if (IS_POST) {
            $request = array();
            $request['name']        = trim(I("post.name"));
            $request['permission']  = $_POST['permission'];
            
            $data['name']       = $request['name'];
            $data['permission'] = json_encode($request['permission']);
            $data['addtime']    = time();
            $this->roleModel->create($data);
            $result = $this->roleModel->add();
            
            if ($result) {
                $this->success("添加成功", U("Admin/Role/index"));
            } else {
                $this->error("添加失败");
            }
            
        } else {
            $this->assign("permission", $permission);
            $this->display();
        }
    }
    
    public function edit(){
        $id         = intval(I("get.id"));
        $role       = $this->roleModel->getById($id);
        
        $permission = include_once APP_PATH."Admin/Conf/role.php";
        if (IS_POST) {
            $request = array();
            $request['name']        = trim(I("post.name"));
            $request['permission']  = $_POST['permission'];
            
            $data['name']       = $request['name'];
            $data['permission'] = json_encode($request['permission']);
            $data['addtime']    = time();
            $this->roleModel->create($data);
            $result = $this->roleModel->where("id={$id}")->save();
            
            $this->success("编辑成功", U("Admin/Role/index"));
            
        } else {
            $this->assign("role", $role);
            $this->assign("permission", $permission);
            $this->display();
        }
    }
    
    public function del(){
        $id     = intval(I("get.id"));
        $role   = $this->roleModel->getById($id);
        
        if (empty($role)) {
            $this->error("该记录不存在", U("Admin/Role/index"));
        }
        
        $this->roleModel->where("id={$id}")->delete();
        $this->success("删除成功", U("Admin/Role/index"));
    }
}