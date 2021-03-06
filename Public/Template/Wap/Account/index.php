<!DOCTYPE html>
<html lang="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="author" content="me@evanxu"/>
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <title>我的</title>
    <link href="/Public/Static/Wap/css/css.css" type="text/css" rel="stylesheet">
    <script src="/Public/Static/Wap/js/swiper.min.js" type="text/javascript"></script>
    <script src="/Public/Static/Wap/js/zepto.min.js" type="text/javascript"></script>
    <script src="/Public/Static/Wap/js/base.js" type="text/javascript"></script>
</head>
<body>
<div class="all bgFFF">
    <div class="userName">
        <dl>
            <?php if (!empty($user)) {?>
                <dt>
                <p>
                    <img src="<?php echo empty($user['image']) ? "/Public/Static/Wap/images/mrtx.png" : $user['image'];?>" width="100%">
                </p>
                <a class="bnts" href="<?php echo U("Wap/Account/userinfo");?>"><em class="iconfont"><img src="/Public/Static/Wap/images/i_xr.png" width="100%"> </em></a>
                </dt>
                <dd><?php echo $user['nickname'];?></dd>
            <?php } else {?>
                <dt class="wdl">
                    <a href="<?php echo U("Wap/Account/login");?>">登录</a>
                </dt>
                <dd>
                    类金融平台的整合商
                </dd>
            <?php }?>
        </dl>
    </div>
    <dl class="u_con clearfix">
        <dd><a href="<?php echo U("Wap/Store/index");?>" class="ydi"><var class="iconfont add"><img src="/Public/Static/Wap/images/u_ico01.png" width="100"> </var><span>门店信息</span>  <em ><img src="/Public/Static/Wap/images/ico_l.png"></em></a></dd>
        <dd><a href="<?php echo U("Wap/Job/index");?>" class="ydi"><var class="iconfont add"><img src="/Public/Static/Wap/images/u_ico02.png" width="100"> </var><span>加入我们</span>  <em ><img src="/Public/Static/Wap/images/ico_l.png"></em></a></dd>
        <dd><a href="<?php echo U("Wap/More/about");?>" class="ydi"><var class="iconfont add"><img src="/Public/Static/Wap/images/u_ico03.png" width="100"> </var><span>关于我们</span>  <em ><img src="/Public/Static/Wap/images/ico_l.png"></em></a></dd>
    </dl>
    <?php include TMPL_PATH . 'Wap/nav.php' ?>
</div>

<script>
    khm.use(['defaul'],function(d){d.slide()});
</script>
</body>
</html>