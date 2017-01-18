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
<div class="alls">
    <div class="orderCon">
        <p class="title">岗位职责</p>
        <div class="orderInof">
            <?php echo $job['duties'];?>
        </div>
        <p class="title">任职要求</p>
        <div class="orderInof">
            <?php echo $job['demand'];?>
        </div>
        <p class="title">工作地址</p>
        <div class="orderInof">
            <?php echo $job['address'];?>
        </div>
        <p class="title">招聘人数</p>
        <p class="tradsel">
           <?php echo $job['quantity'];?> 人
        </p>

    </div>
</div>
</body>
</html>