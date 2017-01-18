<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',TRUE);

// 定义应用目录
define('APP_PATH','./Application/');

// 配置修改记录
//Think/Conf/convention.php TMPL_TEMPLATE_SUFFIX默认模版后缀改为.php
//Think/Conf/convention.php 增加AUTOLOAD_NAMESPACE配置
//增加Common目录常量定义
define('MY_COMMON_PATH', './Common/');

//模版目录
define('TMPL_PATH','./Public/Template/');

//静态文件目录
define('STATIC_PATH','./Public/Static/');

//文件上传目录
define('UPLOAD_PATH','./Public/Upload/');


define("DANG_IMG_URL", DOMAIN."/Public/Upload/Dang/images/");

define("DANG_VIDEO_URL", DOMAIN."/Public/Upload/Dang/videos/");


//插件目录
define('PLUGIN_PATH','./Plugins/');

//环境要求PHP >5.3 && php < 5.6
//PHP配置upload_max_filesize  根据视频大小来配置

if (!($_SERVER['REMOTE_ADDR'] == '117.25.163.202' || $_SERVER['REMOTE_ADDR'] == "120.42.62.148")) {
    //exit();
}

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单