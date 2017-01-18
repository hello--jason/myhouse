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
}