<?php
/**
 * 管理员权限配置
 * @return array 
 */

return array(
    //业务管理模块
    "10001" => array("name" => "业务管理", "parentid" => 0, "controller" => "", "action" => "", "children" => array(
        
        "10010" => array("name" => "业务列表", "parentid" => 10001, "controller" => "Index", "action" => "index", "children" => array(
            "10011" => array("name" => "查看", "parentid" => 10010, "controller" => "Index", "action" => "detail"),
            "10012" => array("name" => "编辑", "parentid" => 10010, "controller" => "Index", "action" => "edit"),
            "10013" => array("name" => "删除", "parentid" => 10010, "controller" => "Index", "action" => "del")
        )),
        
        "10020" => array("name" => "待审业务", "parentid" => 10001, "controller" => "Index", "action" => "pending", "children" => array(
            "10021" => array("name" => "查看", "parentid" => 10020, "controller" => "Index", "action" => "detail"),
            "10022" => array("name" => "编辑", "parentid" => 10020, "controller" => "Index", "action" => "edit"),
            "10023" => array("name" => "删除", "parentid" => 10020, "controller" => "Index", "action" => "del")
        ))
    )),
    
    //营销管理模块
    "20001" => array("name" => "营销管理", "parentid" => 0, "controller" => "", "action" => "", "children" => array(
        "20010" => array("name" => "活动管理",  "parentid" => 20001,     "controller" => "Advert", "action" => "index", "children" => array(
            "20011" => array("name" => "编辑",      "parentid" => 20010,     "controller" => "Advert", "action" => "edit"),
            "20012" => array("name" => "删除",      "parentid" => 20010,     "controller" => "Advert", "action" => "del"),
            "20013" => array("name" => "添加",      "parentid" => 20010,     "controller" => "Advert", "action" => "add")
        ))
    )),
    
    //内容管理
    "30001" => array("name" => "内容管理", "parentid" => 0, "controller" => "", "action" => "", "children" => array(
        "30010" => array("name" => "内容列表",  "parentid" => 30001,     "controller" => "Article", "action" => "index", "children" => array(
            "30011" => array("name" => "编辑",      "parentid" => 30010,     "controller" => "Article", "action" => "edit"),
            "30012" => array("name" => "删除",      "parentid" => 30010,     "controller" => "Article", "action" => "del"),
            "30013" => array("name" => "添加",      "parentid" => 30010,     "controller" => "Article", "action" => "add")
        ))
    )),
    
    //门店管理
    "40001" => array("name" => "门店管理", "parentid" => 0, "controller" => "", "action" => "", "children" => array(
        "40010" => array("name" => "门店列表",  "parentid" => 40001,     "controller" => "Store", "action" => "index", "children" => array(
            "40011" => array("name" => "编辑",      "parentid" => 40010,     "controller" => "Store", "action" => "edit"),
            "40012" => array("name" => "删除",      "parentid" => 40010,     "controller" => "Store", "action" => "del"),
            "40013" => array("name" => "添加",      "parentid" => 40010,     "controller" => "Store", "action" => "add")
        ))
    )),
    
    //招聘管理
    "50001" => array("name" => "招聘管理", "parentid" => 0, "controller" => "", "action" => "", "children" => array(
        "50010" => array("name" => "招聘列表",  "parentid" => 50001,     "controller" => "Job", "action" => "index", "children" => array(
            "50011" => array("name" => "编辑",      "parentid" => 50010,     "controller" => "Job", "action" => "edit"),
            "50012" => array("name" => "删除",      "parentid" => 50010,     "controller" => "Job", "action" => "del"),
            "50013" => array("name" => "添加",      "parentid" => 50010,     "controller" => "Job", "action" => "add")
        ))
    ))
);