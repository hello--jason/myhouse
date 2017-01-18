<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="author" content="me@evanxu"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"/>
    <title>八特金融后台管理系统</title>
    <link href="/Public/Static/Admin/css/css.css" type="text/css" rel="stylesheet"/>
    <script src="/Public/Static/Admin/js/jquery-1.8.2.min.js" type="text/javascript"></script>
    <script src="/Public/Static/Admin/js/layer/layer.js" type="text/javascript"></script>
    <script src="/Public/Static/Admin/js/base.js" type="text/javascript"></script>
</head>
    <body>
    <!--header-->
    <div class="header">
        <dl>
            <dt>
                <span><img src="/Public/Static/Admin/images/logo.png" height="100%" title="富德胜"> </span>
            </dt>
            <dd>
                <span>
                    <var>欢迎你：<?php echo $admin['username'];?></var> <a href="<?php echo U("Admin/Index/loginOut");?>">sign out</a>
                </span>
            </dd>
        </dl>
    </div>