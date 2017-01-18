<?php
namespace Admin\Controller;
class IndexController extends \Admin\Controller\BaseController {
    
    protected $demandModel  = null;
    protected $adminModel   = null;

    public function __construct() {
        parent::__construct();
        $this->demandModel  = new \Common\Model\DemandModel();
        
        $this->adminModel   = new \Common\Model\AdminModel();
    }

    /**
     * 后台首页控制器
     * 
     */
    public function index() {
        $page       = intval(I("get.page"));
        $page       = $page < 1 ? 1 : $page;
        $limit      = 20;
        $typeid     = intval(I("get.typeid"));
        $beginTime  = trim(I("get.beginTime"));
        $endTime    = trim(I("get.endTime"));
        $searchArea = trim(I("get.searchArea"));
        $condition  = "status=1";
        
        if (!empty($typeid)) {
            $condition .= " AND typeid={$typeid}";
        }
        
        if (!empty($beginTime) && strtotime($beginTime) > 0) {
            $condition .= " AND addtime > ".strtotime($beginTime);
        }
        
        if (!empty($endTime) && strtotime($endTime) > 0) {
            $condition .= " AND addtime < ". (strtotime($endTime)+86400);
        }
                
        if (!empty($searchArea)) {
            $regionModel    = new \Common\Model\RegionModel();
            $regions        = $regionModel->where("name like '%{$searchArea}%'")->select();
            $areaids        = array(-1);
            foreach ($regions as $k=>$v) {
                if (!empty($v['id'])) {
                    $areaids[] = $v['id'];
                }
            }
            
            $condition .= " AND (province in (".  implode(",", $areaids).") OR city in (". implode(",", $areaids) .") OR area in (". implode(",", $areaids) ."))";
        }
        
        
        $demandModel    = new \Common\Model\DemandModel();
        $demands        = $demandModel->getList($condition, "id desc", $page, $limit);
        
        //获取记录总数
        $count      = $demandModel->where($condition)->count();      
        
        //分页
        $pageHtml   = $this->getPageHtml($count, $limit);
        
        $this->assign("types", $demandModel->getTypes());
        $this->assign("pageHtml", $pageHtml);
        $this->assign("demands", $demands);
        $this->display();
    }

    public function pending(){
        $page       = intval(I("get.page"));
        $page       = $page < 1 ? 1 : $page;
        $limit      = 20;        
        $typeid     = intval(I("get.typeid"));
        $beginTime  = trim(I("get.beginTime"));
        $endTime    = trim(I("get.endTime"));
        $searchArea = trim(I("get.searchArea"));
        $condition  = "status=0";
        
        if (!empty($typeid)) {
            $condition .= " AND typeid={$typeid}";
        }
        
        if (!empty($beginTime) && strtotime($beginTime) > 0) {
            $condition .= " AND addtime > ".strtotime($beginTime);
        }
        
        if (!empty($endTime) && strtotime($endTime) > 0) {
            $condition .= " AND addtime < ".(strtotime($endTime)+86400);
        }
        
        if (!empty($searchArea)) {
            $regionModel    = new \Common\Model\RegionModel();
            $regions        = $regionModel->where("name like '%{$searchArea}%'")->select();
            $areaids        = array(-1);
            foreach ($regions as $k=>$v) {
                $areaids[] = $v['id'];
            }
            
            $condition .= " AND (province in (".  implode(",", $areaids).") OR city in (". implode(",", $areaids) .") OR area in (". implode(",", $areaids) ."))";
        }
        
        $demandModel    = new \Common\Model\DemandModel();
        $demands        = $demandModel->getList($condition, "id desc", $page, $limit);
        
        //获取记录总数
        $count      = $demandModel->where($condition)->count();      
        
        //分页
        $pageHtml   = $this->getPageHtml($count, $limit);
        
        $this->assign("types", $demandModel->getTypes());
        $this->assign("pageHtml", $pageHtml);
        $this->assign("demands", $demands);
        $this->display();
    }
    
    public function detail(){
        $id     = intval(I("get.id"));
        $demand = $this->demandModel->getById($id);
        $this->assign("demand", $demand);
        $this->display();
    }
    
    
    
    public function validate($request){
        if (empty($request['realname'])) {
            return array("status"=>-1001, "info"=>"请填写姓名");
        }
        
        if (mb_strlen($request['realname'], "utf-8") > 20) {
            return array("status"=>-1002, "info"=>"姓名不能超过20个字符");
        }
        
        if (empty($request['mobile'])) {
            return array("status"=>-1003, "info"=>"请填写手机号码");
        }
        
        if (!isMobile($request['mobile'])) {
            return array("status"=>-1004, "info"=>"请填写正确的手机号码");
        }
        
        if (empty($request['typeid']) || !in_array($request['typeid'], array(1,2,3,4,5,6,7,8,9,10))) {
            return array("status"=>-1006, "info"=>"请选择业务类型");
        }
        
        if (!in_array($request['sex'], array("0","1"))) {
            return array("status"=>-1007, "info"=>"请选择性别");
        }
        
        if (empty($request['province'])) {
            return array("status"=>-1008, "info"=>"请选择省份");
        }
        
        if (empty($request['city'])) {
            return array("status"=>-1009, "info"=>"请选择城市");
        }
        
        $regionModel= new \Common\Model\RegionModel();
        $children   = $regionModel->where("parentid = '{$request['city']}'")->select(); 
        if (!empty($children) && empty($request['area'])) {
            return array("status"=>-1010, "info"=>"请选择地区");
        }
        
        return array("status"=>1, "info"=>"");
    }

    public function validate1($request){
        if (empty($request['profession'])) {
            return array("status"=>-1011, "info"=>"请选择职业身份");
        }
        
        if (!in_array($request['profession'], array(1,2,3,4,5,6,7))) {
            //return array("status"=>-1012, "info"=>"职业身份数据错误，请刷新重试");
        }
        
        if (empty($request['amount']) || $request['amount'] < 1) {
            return array("status"=>-1013, "info"=>"请填写正确的投资金额");
        }
        
        if (empty($request['term'])) {
            return array("status"=>-1014, "info"=>"请选择投资期限");
        }
        
        if (empty($request['interest'])) {
            return array("status"=>-1015, "info"=>"请选择期望利率");
        }
        
        if (!empty($request['email']) && !isEmail($request['email'])) {
            return array("status"=>-1016, "info"=>"请填写正确的Email");
        }
        
        return array("status"=>1, "info"=>"");
    }
    
    public function validate2($request){
        if (empty($request['name'])) {
            return array("status"=>-1021, "info"=>"请填写项目名称");
        }
        
        if (mb_strlen($request['name'], "utf-8") > 20) {
            return array("status"=>-1022, "info"=>"项目名称不能超过20个字符");
        }
        
        if (empty($request['description'])) {
            return array("status"=>-1023, "info"=>"请填写项目描述");
        }
        
        if (mb_strlen($request['description'], "utf-8") > 100) {
            return array("status"=>-1024, "info"=>"项目描述不能超过20个字符");
        }
        
        if (empty($request['amount']) || $request['amount'] < 1) {
            return array("status"=>-1025, "info"=>"请填写正确的众筹金额");
        }
        
        if (empty($request['term'])) {
            return array("status"=>-1026, "info"=>"请选择期望利率");
        }
        
        if (!empty($request['email']) && !isEmail($request['email'])) {
            return array("status"=>-1027, "info"=>"请填写正确的Email");
        }
        
        return array("status"=>1, "info"=>"");
    }
    
    public function validate3($request){
        if (empty($request['profession'])) {
            return array("status"=>-1011, "info"=>"请选择职业身份");
        }
        
        if (!in_array($request['profession'], array(1,2,3,4,5,6,7))) {
            //return array("status"=>-1032, "info"=>"职业身份数据错误，请刷新重试");
        }
        
        if (empty($request['amount']) || $request['amount'] < 1) {
            return array("status"=>-1033, "info"=>"请填写正确的借款金额");
        }
        
        if (empty($request['term'])) {
            return array("status"=>-1034, "info"=>"请选择投资期限");
        }
        
        if (empty($request['purpose'])) {
            return array("status"=>-1035, "info"=>"请选择用途");
        }
                
        if (empty($request['interest'])) {
            return array("status"=>-1036, "info"=>"请选择期望借款利率");
        }
        
        if (!empty($request['email']) && !isEmail($request['email'])) {
            return array("status"=>-1037, "info"=>"请填写正确的Email");
        }
        
        return array("status"=>1, "info"=>"");
    }
    
    public function validate4($request){
        if (empty($request['profession'])) {
            return array("status"=>-1041, "info"=>"请选择职业身份");
        }
        
        if (!in_array($request['profession'], array(1,2,3,4,5,6,7))) {
            //return array("status"=>-1042, "info"=>"职业身份数据错误，请刷新重试");
        }
        
        if (empty($request['name'])) {
            return array("status"=>-1043, "info"=>"请填写当品名称");
        }
        
        if (mb_strlen($request['name'], "utf-8") > 20) {
            return array("status"=>-1044, "info"=>"当品名称不能超过20个字符");
        }
        
        if (empty($request['description'])) {
            return array("status"=>-1045, "info"=>"请填写当品描述");
        }
        
        if (mb_strlen($request['description'], "utf-8") > 100) {
            return array("status"=>-1046, "info"=>"当品描述不能超过20个字符");
        }
        
        if (empty($request['amount']) || $request['amount'] < 1) {
            return array("status"=>-1047, "info"=>"请填写正确的典当金额");
        }
        
        if (empty($request['term'])) {
            return array("status"=>-1048, "info"=>"请选择典当期限");
        }
                
        if (!empty($request['email']) && !isEmail($request['email'])) {
            return array("status"=>-1049, "info"=>"请填写正确的Email");
        }
        
        return array("status"=>1, "info"=>"");
    }
    
    public function validate5($request){
        if (empty($request['egType'])) {
            return array("status"=>-1051, "info"=>"请选择企业类型");
        }
        
        if (empty($request['leaseType'])) {
            return array("status"=>-1052, "info"=>"请选择租赁类型");
        }
        
        if (empty($request['amount']) || $request['amount'] < 1) {
            return array("status"=>-1053, "info"=>"请填写正确的融资金额");
        }
        
        if (empty($request['term'])) {
            return array("status"=>-1054, "info"=>"请选择租赁期限");
        }
        
        if (empty($request['interest'])) {
            return array("status"=>-1055, "info"=>"请选择期望融资利率");
        }
        
        if (!empty($request['email']) && !isEmail($request['email'])) {
            return array("status"=>-1049, "info"=>"请填写正确的Email");
        }
        
        return array("status"=>1, "info"=>"");
    }
    
    public function validate6($request){
        if (empty($request['name'])) {
            return array("status"=>-1061, "info"=>"请填写当公司名称");
        }
        
        if (mb_strlen($request['name'], "utf-8") > 30) {
            return array("status"=>-1062, "info"=>"公司名称不能超过30个字符");
        }
        
        if (empty($request['ipo'])) {
            return array("status"=>-1063, "info"=>"请选择拟IPO市场");
        }
        
        if (!empty($request['email']) && !isEmail($request['email'])) {
            return array("status"=>-1064, "info"=>"请填写正确的Email");
        }
        
        return array("status"=>1, "info"=>"");
    }
    
    public function validate7($request){
        if (empty($request['name'])) {
            return array("status"=>-1071, "info"=>"请填写当公司名称");
        }
        
        if (mb_strlen($request['name'], "utf-8") > 30) {
            return array("status"=>-1072, "info"=>"公司名称不能超过30个字符");
        }
        
        if (empty($request['amount']) || $request['amount'] < 1) {
            return array("status"=>-1073, "info"=>"请填写正确的融资金额");
        }
        
        if (!empty($request['email']) && !isEmail($request['email'])) {
            return array("status"=>-1074, "info"=>"请填写正确的Email");
        }
        
        return array("status"=>1, "info"=>"");
    }
    
    public function validate8($request){
        if (empty($request['profession'])) {
            return array("status"=>-1041, "info"=>"请选择职业身份");
        }
        
        if (!in_array($request['profession'], array(1,2,3,4,5,6,7))) {
            //return array("status"=>-1042, "info"=>"职业身份数据错误，请刷新重试");
        }
                
        
        if (empty($request['amount']) || $request['amount'] < 1) {
            return array("status"=>-1047, "info"=>"请填写正确的投资金额");
        }
        
        if (empty($request['term'])) {
            return array("status"=>-1048, "info"=>"请选择投资期限");
        }
        
        if (empty($request['interest'])) {
            return array("status"=>-1048, "info"=>"请选择期望回报利率");
        }
        
        if (!empty($request['email']) && !isEmail($request['email'])) {
            return array("status"=>-1049, "info"=>"请填写正确的Email");
        }
        
        return array("status"=>1, "info"=>"");
    }
    
    public function validate9($request){
        if (empty($request['profession'])) {
            return array("status"=>-1041, "info"=>"请选择职业身份");
        }
        
        if (!in_array($request['profession'], array(1,2,3,4,5,6,7))) {
            //return array("status"=>-1042, "info"=>"职业身份数据错误，请刷新重试");
        }
                
        
        if (empty($request['amount']) || $request['amount'] < 1) {
            return array("status"=>-1047, "info"=>"请填写正确的投资金额");
        }
        
        if (empty($request['term'])) {
            return array("status"=>-1048, "info"=>"请选择投资期限");
        }
        
        if (empty($request['interest'])) {
            return array("status"=>-1048, "info"=>"请选择期望回报利率");
        }
        
        if (!empty($request['email']) && !isEmail($request['email'])) {
            return array("status"=>-1049, "info"=>"请填写正确的Email");
        }
        
        return array("status"=>1, "info"=>"");
    }
    
    public function validate10($request){
        if (empty($request['profession'])) {
            return array("status"=>-1041, "info"=>"请选择职业身份");
        }
        
        if (!in_array($request['profession'], array(1,2,3,4,5,6,7))) {
            //return array("status"=>-1042, "info"=>"职业身份数据错误，请刷新重试");
        }
        
        if ($request['house'] == 1 && $request['houseAmount'] < 1) {
            return array("status"=>-1041, "info"=>"请填写房产评估价值");
        }
        
        if ($request['car'] == 1 && $request['carAmount'] < 1) {
            return array("status"=>-1041, "info"=>"请填写私家车评估价值");
        }
        
        if ($request['insurance'] == 1 && $request['insuranceAmount'] < 1) {
            return array("status"=>-1041, "info"=>"请填写商业保险评估价值");
        }
        
        if ($request['loan'] == 1 && $request['loanAmount'] < 1) {
            return array("status"=>-1041, "info"=>"请填写贷款金额");
        }
        
        if (empty($request['note'])) {
            return array("status"=>-1041, "info"=>"请填写您的资管需求");
        }
        
        return array("status"=>1, "info"=>"");
    }
    
    public function del(){
        $id     = intval(I("get.id"));
        
        $demandModel    = new \Common\Model\DemandModel();
        $store = $demandModel->getById($id);
        if (empty($store)) {
            $this->error("找不到该记录");
        }
        
        $demandModel->where("id={$id}")->delete();
        $this->success("删除成功");
    }

    /**
     * 管理员登录控制器
     * @param   array     $_POST
     * 
     */
    public function login() {
        $uid = session("adminid");
        if (!empty($uid)) {
            //页面跳转
            $this->redirect("Index/index");
            exit();
        }
        if (IS_POST) {
            $username   = I("post.username");
            $password   = I("post.password");
            $code       = I("post.verify");

            if (empty($username)) {
                $this->error("请输入用户名");
            }
            
            if (empty($password)) {
                $this->error("请输入密码");
            }
            
            if (empty($code)) {
                //$this->error("请输入验证码");
            }
            
            //验证验证吗是否正确
            $verify = new \Think\Verify();
            $check = $verify->check($code, "admin_login");
            if (!$check) {
                //$this->error("验证码错误");
            }

            //创建管理员模型，验证用户名和密码
            $admin = $this->adminModel->checkUserLogin($username, $password);
            if (isset($admin['errcode'])) {
                //返回错误信息
                $this->ajaxReturn(array("status"=>$admin['errcode'], "info"=>$admin["info"]));
            } else {
                //登录成功，执行页面跳转
                $this->adminModel->userLogin($admin['id'], $admin['username'], $admin['groupid']);
                $this->adminModel->loginLog();
                if (IS_AJAX) {
                    $this->success("登录成功", U("Admin/Index/index"));
                } else {
                    //页面跳转
                    $this->redirect("Index/index");
                }                
            }
        } else {
            $this->display();
        }
    }

    /**
     * 管理员退出控制器
     * 
     */
    public function loginOut() {
        $this->adminModel->userLoginOut();
        
        //页面跳转
        $this->redirect("Index/login");
    }

    /**
     * 验证码获取
     */
    public function verify() {
        //验证码类型
        $type = I('get.type') ? I('get.type') : 'admin_login';
        $config = array(
            'fontSize' => 20,
            'length' => 4,
            'useCurve' => true,
            'useNoise' => false,
        );
        
        $Verify = new \Think\Verify($config);
        $Verify->entry($type);
    }
    
    public function getRegion(){
        $parentid = intval(I("get.parentid"));
        $regionModel    = new \Common\Model\RegionModel();
        $regions        = $regionModel->where("parentid={$parentid}")->select();
        $this->ajaxReturn(array("status"=>1, "region"=>$regions));
    }
    
    public function getDemandInfo(){
        $id     = intval(I("get.id"));
        $demand = $this->demandModel->getById($id);
        if (empty($demand)) {
            $this->ajaxReturn(array("status"=>-1, "info"=>"获取失败"));
        }
        
        $this->ajaxReturn(array("status"=>1,"info"=>"获取成功", "data"=>$demand));
    }
    
    public function demandVerify(){
        $request = array();
        $request['id']          = intval(I("post.id"));
        $request['status']      = intval(I("post.status"));
        $request['verify_note'] = trim(I("post.verify_note"));
        $request['verify_time'] = time();
        
        $demand = $this->demandModel->getById($request['id']);
        if (empty($demand)) {
            $this->ajaxReturn(array("status"=>-1001, "info"=>"参数错误，找不到该记录"));
        }
        
        if (!in_array($request['status'], array(1, -1))) {
            $this->ajaxReturn(array("status"=>-1002, "info"=>"审核状态值不正确"));
        }
        
        $this->demandModel->create($request);
        $this->demandModel->where("id = {$request['id']}")->save();
        $this->ajaxReturn(array("status"=>1, "info"=>"审核成功"));
    }
    
    
    public function update(){
        $demands    = $this->demandModel->getList("uid=0", "id DESC", 1, 10000);
        $userModel  = new \Common\Model\UserModel();
        foreach ($demands as $k=>$v) {
            $user = $userModel->getUserByMobile($v['mobile']);
            if (empty($user)) {
                $data = array();
                $data['nickname']    = empty($v['realname']) ? trim($v['mobile']) : trim($v['realname']);
                $data['sex']         = 0;
                $data['mobile']      = trim($v['mobile']);
                $data['username']    = trim($v['mobile']);
                $data['password']    = md5(rand(10000000, 99999999));
                $data['email']       = trim($v['email']);
                $data['addtime']     = time();
                $userModel->create($data);
                $result = $userModel->add();
                $user = $data;
                $user['id'] = $result;
            }
            
            $this->demandModel->create(array("uid"=>$user['id']));
            $this->demandModel->where("id={$v['id']}")->save();
        }       
    }
}
