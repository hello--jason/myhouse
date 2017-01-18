<!DOCTYPE html>
<html lang="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="author" content="me@evanxu"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"/>
    <title>门店列表</title>
    <link href="/Public/Static/Wap/css/css.css" type="text/css" rel="stylesheet"/>
    <script src="/Public/Static/Wap/js/swiper.min.js" type="text/javascript"></script>
    <script src="/Public/Static/Wap/js/zepto.min.js" type="text/javascript"></script>
    <script src="/Public/Static/Wap/js/base.js" type="text/javascript"></script>
</head>
<body>
<div class="alls">
    <div class="storeList">
        <?php if (!empty($stores)) {?>
            <?php foreach ($stores as $k=>$v) {?>
                <dl>
                    <dd class="info">
                        <h3><?php echo $v['name'];?></h3>
                        <p><?php echo $v['address'];?></p>
                    </dd>
                    <dd class="bnt">
                        <a href="<?php echo U("Wap/Store/map", array("id"=>$v['id']));?>"><img src="/Public/Static/Wap/images/wz.png"> 门店位置</a>
                        <a href="tel:<?php echo $v['telephone'];?>" class="phone">拨打电话</a>
                    </dd>
                </dl>
            <?php }?>
        <?php } else {?>
            <dl>暂时没有相关信息</dl>
        <?php }?>
    </div>
</div>
<script>
    khm.use(['defaul'],function(d){d.slide()});
</script>
</body>
</html>