<!DOCTYPE html>
<html lang="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="author" content="me@evanxu"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"/>
    <title>首页</title>
    <link href="/Public/Static/Wap/css/css.css" type="text/css" rel="stylesheet"/>
    <script src="/Public/Static/Wap/js/swiper.min.js" type="text/javascript"></script>
    <script src="/Public/Static/Wap/js/zepto.min.js" type="text/javascript"></script>
    <script src="/Public/Static/Wap/js/base.js" type="text/javascript"></script>
</head>
<body>
<div class="alls bgFFF">
    <div class="aboutInfo">
        <p class="img">
            <img src="/Public/Static/Wap/images/about.png" height="100%">
        </p>
        <div class="info">
            <?php echo $about['content'];?>
        </div>
    </div>
    <div class="serUpCons">
        <dl class="u_con clearfix">
            <dd>微信公众号 <i class="mendaa dyhws">八特金融</i></dd>
            <dd>官方网站 <i>www.batejinrong.com</i></dd>
        </dl>
    </div>
</div>
<div class="share_maskyer"></div>
<div class="weixins dyhwx">
    <a href="javascript:void(0);" class="gbwx">×</a>
    <img src="/Public/Static/Wap/images/wxin.jpg" width="100%">
</div>

<script>
    khm.use(['defaul'],function(d){d.weixin();});
</script>
</body>
</html>