<!DOCTYPE html>
<html lang="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="author" content="me@evanxu"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"/>
    <title>招聘列表</title>
    <link href="/Public/Static/Wap/css/css.css" type="text/css" rel="stylesheet"/>
    <script src="/Public/Static/Wap/js/swiper.min.js" type="text/javascript"></script>
    <script src="/Public/Static/Wap/js/zepto.min.js" type="text/javascript"></script>
    <script src="/Public/Static/Wap/js/base.js" type="text/javascript"></script>
</head>
<body>
<div class="alls bgFFF">
    <dl class="u_con clearfix" style="margin-bottom: 0;">
        <?php foreach ($jobs as $k=>$v) {?>
        <dd><a href="<?php echo U("Wap/Job/detail", array("id"=>$v['id']));?>"><span class="maxts"><?php echo $v['name'];?></span>  <em ><img src="/Public/Static/Wap/images/ico_l.png"></em></a></dd>
        <?php }?>
    </dl>
</div>
<script>
    khm.use(['defaul'],function(d){d.slide()});
</script>
</body>
</html>