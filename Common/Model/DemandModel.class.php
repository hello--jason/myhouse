<?php
namespace Common\Model;
class DemandModel extends \Common\Model\BaseModel {
    /**
     * 表名
     * @var type 
     */
    protected $tableName        = 'demand';
    
    /**
     * 自动填充
     * @var type 
     */
    protected $_auto            = array(
        array('updatetime','time',3,'function'),
    );
    
    
    public function getTypes(){
        return array(
            "1"     => array("name"=>'P2P理财',  "disabled"=>0, "updated"=>""),
            "2"     => array("name"=>'众筹',     "disabled"=>0, "updated"=>""),
            "3"     => array("name"=>'短期融资', "disabled"=>0, "updated"=>""),
            "4"     => array("name"=>'典当',     "disabled"=>0, "updated"=>""),
            "5"     => array("name"=>'融资租赁', "disabled"=>0, "updated"=>""),
            "6"     => array("name"=>'上市辅导', "disabled"=>0, "updated"=>""),
//            "7"     => array("name"=>'创业投资', "disabled"=>1, "updated"=>"V1.1.0删除"),
//            "8"     => array("name"=>'股权投资', "disabled"=>1, "updated"=>"V1.1.0删除"),
            "9"     => array("name"=>'基金管理', "disabled"=>0, "updated"=>""),
            "10"    => array("name"=>'资产管理', "disabled"=>0, "updated"=>""),
            "11"    => array("name"=>'车险',     "disabled"=>0, "updated"=>"V1.1.0新增加"),
            "12"    => array("name"=>'财务咨询', "disabled"=>0, "updated"=>"V1.1.0新增加"),
        );
    }
    
    public function getList($condition, $order, $page = 1, $limit = 20) {
        $results    = parent::getList($condition, $order, $page, $limit);
        $types      = $this->getTypes();
        $regionids  = array();
        $uids       = array();
        $users      = array();
        
        foreach ($results as $k=>$v) {
            $uids[] = intval($v['uid']);
        }
        
        if (!empty($uids)) {
            $userModel = new \Common\Model\UserModel();
            $users = $userModel->getByIds($uids);
        }
        
        foreach ($results as $k=>$v) {
            if (!empty($users[$v['uid']])) {
                $results[$k]['mobile']      = $users[$v['uid']]['mobile'];
                $results[$k]['realname']    = empty($users[$v['uid']]['nickname']) ? $users[$v['uid']]['mobile'] : $users[$v['uid']]['nickname'];
                $results[$k]['email']       = $users[$v['uid']]['email'];
            } else {
                $results[$k]['mobile']      = "";
                $results[$k]['realname']    = "";
                $results[$k]['email']       = "";
            }
        }
        
        foreach ($results as $k=>$v) {
            if (!empty($types[$v['typeid']])) {
                $results[$k]['type_name'] = $types[$v['typeid']]['name'];
            } else {
                $results[$k]['type_name'] = "";
            }
            
            $regionids[] = $v['province'];
            $regionids[] = $v['city'];
            $regionids[] = $v['area'];
            
            $results[$k]['other'] = json_decode($v['other'], TRUE);
                        
            if (isChinese($v['realname'])) {
                $first      = mb_substr($v['realname'], 0, 1, "utf-8");
                $results[$k]['mrname'] = "{$first}**";
            } else {
                $first      = mb_substr($v['realname'], 0, 3, "utf-8");
                $last       = mb_substr($v['realname'], -4, 4, "utf-8");
                $results[$k]['mrname'] = "{$first}***{$last}";
            }
            
            if (in_array($v['typeid'], array(6,7,12))) {
                $first  = "";
                $last   = "";
                if (mb_strlen($results[$k]['other']['name'], "utf-8") >= 5) {
                    $first  = mb_substr($results[$k]['other']['name'], 0, 3, "utf-8");
                    $last   = mb_substr($results[$k]['other']['name'], -2, 2,"utf-8");
                    $results[$k]['other']['company'] = $first."******".$last;    
                } else if (mb_strlen($results[$k]['other']['name'], "utf-8") == 1) {
                    $first  = mb_substr($results[$k]['other']['name'], 0, 1, "utf-8");
                    $results[$k]['other']['company'] = $first."******".$last;
                } else {
                    $first  = mb_substr($results[$k]['other']['name'], 0, 1, "utf-8");
                    $last   = mb_substr($results[$k]['other']['name'], -1, 1,"utf-8");
                    $results[$k]['other']['company'] = $first."******".$last;  
                }
            }
        }
        
        if (!empty($regionids)) {
            $regionModel= new \Common\Model\RegionModel();
            $temps      = $regionModel->where("id in (". implode(",", $regionids) .")")->select();
            $regions    = array();
            foreach ($temps as $k=>$v) {
                $regions[$v['id']] = $v;
            }
        }
        
        if (!empty($regions)) {
            foreach ($results as $k=>$v) {
                if (!empty($regions[$v['province']])) {
                    $results[$k]['province_name'] = $regions[$v['province']]['short_name'];
                } else {
                    $results[$k]['province_name'] = "";
                }
                
                if (!empty($regions[$v['city']])) {
                    $results[$k]['city_name'] = $regions[$v['city']]['short_name'];
                } else {
                    $results[$k]['city_name'] = "";
                }
                
                if (!empty($regions[$v['area']])) {
                    $results[$k]['area_name'] = $regions[$v['area']]['short_name'];
                } else {
                    $results[$k]['area_name'] = "";
                }
            }
        }
        
        return $results;
    }
    
    public function getById($id) {
        $id     = intval($id);
        $result = parent::getById($id);
        $types  = $this->getTypes();
        
        if (!empty($types[$result['typeid']])) {
            $result['type_name'] = $types[$result['typeid']]['name'];
        } else {
            $result['type_name'] = "";
        }
        
        $userModel = new \Common\Model\UserModel();
        $user = $userModel->getById($result['uid']);
        $result['mobile']   = $user['mobile'];
        $result['realname'] = empty($user['nickname']) ? $user['mobile'] : $user['nickname'];
        $result['email']    = $user['email'];
                
        $regionids   = array(); 
        $regionids[] = $result['province'];
        $regionids[] = $result['city'];
        $regionids[] = $result['area'];
        
        if (!empty($regionids)) {
            $regionModel= new \Common\Model\RegionModel();
            $temps      = $regionModel->where("id in (". implode(",", $regionids) .")")->select();
            $regions    = array();
            foreach ($temps as $k=>$v) {
                $regions[$v['id']] = $v;
            }
        }
        
        if (!empty($regions)) {
            if (!empty($regions[$result['province']])) {
                $result['province_name'] = $regions[$result['province']]['short_name'];
            } else {
                $result['province_name'] = "";
            }

            if (!empty($regions[$result['city']])) {
                $result['city_name'] = $regions[$result['city']]['short_name'];
            } else {
                $result['city_name'] = "";
            }

            if (!empty($regions[$result['area']])) {
                $result['area_name'] = $regions[$result['area']]['short_name'];
            } else {
                $result['area_name'] = "";
            }
        }
        
        if (isChinese($result['realname'])) {
            $first      = mb_substr($result['realname'], 0, 1, "utf-8");
            $result['mrname'] = "{$first}**";
        } else {
            $first      = mb_substr($result['realname'], 0, 3, "utf-8");
            $last       = mb_substr($result['realname'], -4, 4, "utf-8");
            $result['mrname'] = "{$first}***{$last}";
        }
        
        $result['other'] = json_decode($result['other'], TRUE);
        
        if ($result['typeid'] == 6 || $result['typeid'] == 7 || $result['typeid'] == 12) {
            $first  = "";
            $last   = "";
            if (mb_strlen($result['other']['name'], "utf-8") >= 5) {
                $first  = mb_substr($result['other']['name'], 0, 3, "utf-8");
                $last   = mb_substr($result['other']['name'], -2, 2, "utf-8");
                $result['other']['company'] = $first."******".$last;
            } else if (mb_strlen($result['other']['name'], "utf-8") == 1) {
                $first  = mb_substr($result['other']['name'], 0, 1, "utf-8");
                $result['other']['company'] = $first."******".$last;               
            } else {
                $first  = mb_substr($result['other']['name'], 0, 1, "utf-8");
                $last   = mb_substr($result['other']['name'], -1, 1, "utf-8");
                $result['other']['company'] = $first."******".$last;  
            }
        }
        
        return $result;
    }
}