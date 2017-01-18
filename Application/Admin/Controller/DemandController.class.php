<?php
namespace Admin\Controller;
class DemandController extends \Admin\Controller\BaseController {
    
    private $demandModel    = null;
    
    public function __construct() {
        parent::__construct();
        $this->demandModel = new \Common\Model\DemandModel();
    }
    
    
    public function publish(){
        if (IS_POST) {
            $request                = array();
            $request['typeid']      = intval(I("post.typeid"));
            $request['mobile']      = trim(I("post.mobile"));
            $request['province']    = intval(I("post.province"));
            $request['city']        = intval(I("post.city"));
            $request['area']        = intval(I("post.area"));
            $request['amount']      = intval(I("post.amount"));
            $request['addtime']     = time();
            $request['number']      = date("ymdhis").  rand(1000, 9999);

            //存储数据
            $data   = $request;

            //其他字段类型
            $other  = array();

            if ($request['typeid'] == 1) {
                $other['name']        = trim(I("post.name"));

            } else if ($request['typeid'] == 2) {
                $other['name']        = trim(I("post.name"));

            } else if ($request['typeid'] == 3) {
                $other['profession']  = trim(I("post.profession"));
                $other['term']        = trim(I("post.term"));
                $other['purpose']     = trim(I("post.purpose"));
                $other['interest']    = trim(I("post.interest"));
                $other['repayment']   = trim(I("post.repayment"));

            } else if ($request['typeid'] == 4) {
                $other['profession']  = trim(I("post.profession"));
                $other['name']        = trim(I("post.name"));
                $other['description'] = trim(I("post.description"));
                $other['term']        = trim(I("post.term"));

            } else if ($request['typeid'] == 5) {
                $other['egType']      = trim(I("post.egType"));
                $other['leaseType']   = trim(I("post.leaseType"));
                $other['term']        = trim(I("post.term"));
                $other['interest']    = trim(I("post.interest"));

            } else if ($request['typeid'] == 6) {
                $other['name']        = trim(I("post.name"));
                $other['ipo']         = trim(I("post.ipo"));

            } else if ($request['typeid'] == 7) {
//                $other['name']        = trim(I("post.name"));

            } else if ($request['typeid'] == 8) {
//                $other['profession']  = trim(I("post.profession"));
//                $other['term']        = trim(I("post.term"));
//                $other['interest']    = trim(I("post.interest"));

            } else if ($request['typeid'] == 9) {
                $other['profession']  = trim(I("post.profession"));
                $other['term']        = trim(I("post.term"));
                $other['interest']    = trim(I("post.interest"));

            } else if ($request['typeid'] == 10) {
                $other['profession']    = trim(I("post.profession"));
                $other['house']         = intval(I("post.house"));
                $other['houseAmount']   = intval(I("post.houseAmount"));
                $other['car']           = intval(I("post.car"));
                $other['carAmount']     = intval(I("post.carAmount"));            
                $other['insurance']     = intval(I("post.insurance"));
                $other['insuranceAmount']   = intval(I("post.insuranceAmount"));
                $other['loan']          = intval(I("post.loan"));
                $other['loanAmount']    = intval(I("post.loanAmount"));
                $other['marry']         = trim(I("post.marry"));
                $other['note']          = trim(I("post.note"));
                
            } else if ($request['typeid'] == 11) {
                $other['name']  = trim(I("post.name"));
            } else if ($request['typeid'] == 12) {
                $other['name']          = trim(I("post.name"));
                $other['zxtype']        = trim(I("post.zxtype"));
                $other['content']       = trim(I("post.content"));
            }

            //合并数据
            $request = array_merge($request, $other);

            //数据验证
            $validate = $this->validate($request);
            if ($validate['status'] < 1) {
                $this->ajaxReturn($validate);
            }

            //数据验证
            $string     = "validate{$request['typeid']}";
            $validate   = $this->$string($request);
            if ($validate['status'] < 1) {
                $this->ajaxReturn($validate);
            }
            
            //根据手机号码获取用户信息
            $userModel = new \Common\Model\UserModel();
            $user = $userModel->getUserByMobile($request['mobile']);
            
            //添加操作
            $data['other']      = json_encode($other);
            $data['uid']        = $user['id'];
            $data['mobile']     = $user['mobile'];
            $data['realname']   = empty($user['nickname']) ? $user['mobile'] : $user['nickname'];
            $data['sex']        = $user['sex'];
            $data['email']      = $user['email'];
            $demandModel        = new \Common\Model\DemandModel();
            $demandModel->create($data);
            $result = $demandModel->add();

            if ($result) {
                $this->ajaxReturn(array("status"=>1, "info"=>"添加成功", "url"=>U("Admin/Index/pending")));
            } else {
                $this->ajaxReturn(array("status"=>0, "info"=>"添加失败"));
            }
        } else {
            $categories     = $this->demandModel->getTypes();
            $regionModel    = new \Common\Model\RegionModel();
            $province       = $regionModel->where("parentid=0")->select();

            $this->assign("province", $province);            
            $this->assign("categories", $categories);
            $this->display();
        }
    }
    
    public function getHtmlByType() {
        $typeid = intval(I("get.typeid"));
        $html   = "";
        
        $types = $this->demandModel->getTypes();
        $types = array_keys($types);
        if (!in_array($typeid, $types)) {
            $this->ajaxReturn(array("status"=>-1,"info"=>"获取失败"));
        }
        
        $regionModel    = new \Common\Model\RegionModel();
        $regions        = $regionModel->where("parentid=0")->select();
        $this->assign("province", $regions);
        $html   = $this->fetch("type{$typeid}");
        $this->ajaxReturn(array("status"=>1,"info"=>"获取成功", "html"=>$html));
    }
    
    public function getRegion(){
        $parentid = intval(I("get.parentid"));
        $regionModel    = new \Common\Model\RegionModel();
        $regions        = $regionModel->where("parentid={$parentid}")->select();
        $this->ajaxReturn(array("status"=>1, "region"=>$regions));
    }
    
    public function edit(){
        $id = intval(I("get.id"));
        $id     = intval(I("get.id"));
        $demand = $this->demandModel->getById($id);
        
        if (IS_POST) {
            $request                = array();
            $request['typeid']      = $demand['typeid'];
            $request['province']    = intval(I("post.province"));
            $request['city']        = intval(I("post.city"));
            $request['area']        = intval(I("post.area"));
            $request['amount']      = intval(I("post.amount"));
            $request['addtime']     = time();
            $request['number']      = date("ymdhis").  rand(1000, 9999);

            //存储数据
            $data   = $request;

            //其他字段类型
            $other  = array();
            if ($request['typeid'] == 1) {
                $other['name']        = trim(I("post.name"));

            } else if ($request['typeid'] == 2) {
                $other['name']        = trim(I("post.name"));

            } else if ($request['typeid'] == 3) {
                $other['profession']  = trim(I("post.profession"));
                $other['term']        = trim(I("post.term"));
                $other['purpose']     = trim(I("post.purpose"));
                $other['interest']    = trim(I("post.interest"));
                $other['repayment']   = trim(I("post.repayment"));

            } else if ($request['typeid'] == 4) {
                $other['profession']  = trim(I("post.profession"));
                $other['name']        = trim(I("post.name"));
                $other['description'] = trim(I("post.description"));
                $other['term']        = trim(I("post.term"));

            } else if ($request['typeid'] == 5) {
                $other['egType']      = trim(I("post.egType"));
                $other['leaseType']   = trim(I("post.leaseType"));
                $other['term']        = trim(I("post.term"));
                $other['interest']    = trim(I("post.interest"));

            } else if ($request['typeid'] == 6) {
                $other['name']        = trim(I("post.name"));
                $other['ipo']         = trim(I("post.ipo"));

            } else if ($request['typeid'] == 7) {
//                $other['name']        = trim(I("post.name"));

            } else if ($request['typeid'] == 8) {
//                $other['profession']  = trim(I("post.profession"));
//                $other['term']        = trim(I("post.term"));
//                $other['interest']    = trim(I("post.interest"));

            } else if ($request['typeid'] == 9) {
                $other['profession']  = trim(I("post.profession"));
                $other['term']        = trim(I("post.term"));
                $other['interest']    = trim(I("post.interest"));

            } else if ($request['typeid'] == 10) {
                $other['profession']    = trim(I("post.profession"));
                $other['house']         = intval(I("post.house"));
                $other['houseAmount']   = intval(I("post.houseAmount"));
                $other['car']           = intval(I("post.car"));
                $other['carAmount']     = intval(I("post.carAmount"));            
                $other['insurance']     = intval(I("post.insurance"));
                $other['insuranceAmount']   = intval(I("post.insuranceAmount"));
                $other['loan']          = intval(I("post.loan"));
                $other['loanAmount']    = intval(I("post.loanAmount"));
                $other['marry']         = trim(I("post.marry"));
                $other['note']          = trim(I("post.note"));
                
            } else if ($request['typeid'] == 11) {
                $other['name']  = trim(I("post.name"));
            } else if ($request['typeid'] == 12) {
                $other['name']          = trim(I("post.name"));
                $other['zxtype']        = trim(I("post.zxtype"));
                $other['content']       = trim(I("post.content"));
            }

            //合并数据
            $request = array_merge($request, $other);

            //数据验证
            $validate = $this->validate($request);
            if ($validate['status'] < 1) {
                $this->ajaxReturn($validate);
            }

            //数据验证
            $string     = "validate{$request['typeid']}";
            $validate   = $this->$string($request);
            if ($validate['status'] < 1) {
                $this->ajaxReturn($validate);
            }

            //添加操作
            $data['other']  = json_encode($other);
            $demandModel    = new \Common\Model\DemandModel();
            $demandModel->create($data);
            $result = $demandModel->where("id={$id}")->save();

            if ($result) {
                $forward = !empty($_POST['forward']) ? $_POST['forward'] : U("Admin/Index/index");
                $this->ajaxReturn(array("status"=>1, "info"=>"编辑成功", "url"=>$forward));
            } else {
                $this->ajaxReturn(array("status"=>0, "info"=>"编辑失败"));
            }
        } else {
            //获取省份
            $regionModel= new \Common\Model\RegionModel();
            $province   = $regionModel->where("parentid=0")->select();
            $city       = $regionModel->where("parentid='{$demand['province']}'")->select();
            $area       = $regionModel->where("parentid='{$demand['city']}'")->select();
            
            $this->assign("forward", $_SERVER['HTTP_REFERER']);
            $this->assign("province", $province);
            $this->assign("city", $city);
            $this->assign("area", $area);
            $this->assign("demand", $demand);
            $this->display();
        }        
    }
    
    public function validate($request){
        if (ACTION_NAME == 'publish') {
            if (empty($request['mobile'])) {
                return array("status"=>-1006, "info"=>"请填写手机号码");
            }

            if (!isMobile($request['mobile'])) {
                return array("status"=>-1006, "info"=>"请填写正确的手机号码");
            }

            $userModel = new \Common\Model\UserModel();
            $user = $userModel->getUserByMobile($request['mobile']);
            if (empty($user)) {
                return array("status"=>-1006, "info"=>"该手机号码系统不存在");
            }
        }
        
        $types = $this->demandModel->getTypes();
        $types = array_keys($types);
        if (empty($request['typeid']) || !in_array($request['typeid'], $types)) {
            return array("status"=>-1006, "info"=>"请选择业务类型");
        }
        
        if (!in_array($request['typeid'], array(1,2,11))) {
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
        }
        
        return array("status"=>1, "info"=>"");
    }

    public function validate1($request){        
        if (empty($request['name'])) {
            return array("status"=>-1013, "info"=>"请填写项目名称");
        }
        
        if (mb_strlen($request['name'], "utf-8") > 50) {
            return array("status"=>-1013, "info"=>"项目名称不能超过50个字符");
        }
        
        if (empty($request['amount']) || $request['amount'] < 1) {
            return array("status"=>-1013, "info"=>"请填写正确的投资金额");
        }
                
        return array("status"=>1, "info"=>"");
    }
    
    public function validate2($request){
        if (empty($request['name'])) {
            return array("status"=>-1013, "info"=>"请填写项目名称");
        }
        
        if (mb_strlen($request['name'], "utf-8") > 50) {
            return array("status"=>-1013, "info"=>"项目名称不能超过50个字符");
        }
        
        if (empty($request['amount']) || $request['amount'] < 1) {
            return array("status"=>-1013, "info"=>"请填写正确的支持金额");
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
        
        if (empty($request['repayment'])) {
            return array("status"=>-1037, "info"=>"请填写还款来源");
        }
        
        if (mb_strlen($request['repayment'], "utf-8") > 100) {
            return array("status"=>-1034, "info"=>"还款来源不能超过100个字符");
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
            return array("status"=>-1046, "info"=>"当品描述不能超过100个字符");
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
                
        return array("status"=>1, "info"=>"");
    }
    
    public function validate9($request){
        if (empty($request['profession'])) {
            return array("status"=>-1041, "info"=>"请选择职业身份");
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
        
        if (mb_strlen($request['note'], "utf-8") > 100) {
            return array("status"=>-1072, "info"=>"资管需求不能超过100个字符");
        }
        
        return array("status"=>1, "info"=>"");
    }
    
    public function validate11($request){
        if (empty($request['name'])) {
            return array("status"=>-1013, "info"=>"请填写项目名称");
        }
        
        if (mb_strlen($request['name'], "utf-8") > 50) {
            return array("status"=>-1013, "info"=>"项目名称不能超过50个字符");
        }
        
        if (empty($request['amount']) || $request['amount'] < 1) {
            return array("status"=>-1013, "info"=>"请填写正确的投资金额");
        }
                
        return array("status"=>1, "info"=>"");
    }
    
    public function validate12($request){
        if (empty($request['name'])) {
            return array("status"=>-1013, "info"=>"请填写公司名称");
        }
        
        if (mb_strlen($request['name'], "utf-8") > 50) {
            return array("status"=>-1013, "info"=>"公司名称不能超过50个字符");
        }
        
        if (empty($request['zxtype'])) {
            return array("status"=>-1013, "info"=>"请选择咨询类型");
        }
        
        if (empty($request['content'])) {
            return array("status"=>-1013, "info"=>"请填写咨询内容");
        }
        
        if (mb_strlen($request['name'], "utf-8") > 200) {
            return array("status"=>-1013, "info"=>"咨询内容不能超过200个字符");
        }
        
        return array("status"=>1, "info"=>"");
    }
}