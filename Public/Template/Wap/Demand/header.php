<!DOCTYPE html>
<html lang="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="author" content="me@evanxu"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"/>
    <title>提交业务</title>
    <link href="/Public/Static/Wap/css/css.css" type="text/css" rel="stylesheet"/>
    <script src="/Public/Static/Wap/js/swiper.min.js" type="text/javascript"></script>
    <script src="/Public/Static/Wap/js/zepto.min.js" type="text/javascript"></script>
    <script src="/Public/Static/Wap/js/base.js" type="text/javascript"></script>
</head>
<body>
<div class="alls">

    <div class="pic_por">
        <img src="/Public/Static/Wap/images/slide1.png" width="100%" height="100%" />
    </div>
    <div class="formcons">
        <form action="<?php echo U("Wap/Demand/checkStep2");?>" method="POST">
            <p class="formT">请确保填写真实身份信息，否则无法通过</p>
            <input type="hidden" name="typeid" value="<?php echo $_GET['type']?>" />
            <dl class="u_con clearfix js-items">
                <dd class="js-i-areas">
                    <span>省市地区</span>
                    <span class="r sel">
                        <select class="cs js-i-province" name="province">
                            <option value="0">请选择</option>
                            <?php foreach ($province as $k=>$v) {?>
                            <option value="<?php echo $v['id'];?>" <?php echo $location['province']['id'] == $v['id'] ? "selected='selected'" : "";?>><?php echo $v['short_name'];?></option>
                            <?php }?>
                        </select>
                        <select class="cs js-i-city" name="city">
                            <option value="0">请选择</option>
                            <?php foreach ($citys as $k=>$v) {?>
                            <option value="<?php echo $v['id'];?>" <?php echo $location['city']['id'] == $v['id'] ? "selected='selected'" : "";?>><?php echo $v['short_name'];?></option>
                            <?php }?>
                        </select>
                        <select class="cs js-i-area" name="area">
                            <option value="0">请选择</option>
                            <?php foreach ($areas as $k=>$v) {?>
                            <option value="<?php echo $v['id'];?>" <?php echo $location['area']['id'] == $v['id'] ? "selected='selected'" : "";?>><?php echo $v['short_name'];?></option>
                            <?php }?>
                        </select>
                    </span>
                    <em ><img src="/Public/Static/Wap/images/ico_l.png"></em>
                </dd>