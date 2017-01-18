<!DOCTYPE html>
<html lang="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="author" content="me@evanxu"/>
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <title>首页</title>
    <link href="/Public/Static/Home/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="/Public/Static/Home/css/css.css" type="text/css" rel="stylesheet">
    <script src="/Public/Static/Home/js/swiper.js"></script>
    <script src="/Public/Static/Home/js/zepto.min.js"></script>
    <style>



    </style>
</head>
<body>
<div class="banner">
    <div class="swiper-container1">
        <div class="swiper-wrapper list_an">
            <?php foreach ($adverts as $k=>$v) {?>
            <div class="swiper-slide list"><img src="<?php echo $v['image'];?>" height="496" width="100%"></div>
            <?php }?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-9 swiper-container" style="height: 560px; overflow: hidden;">
            <div class="swiper-wrapper">
                <?php if (!empty($demands)) {?>
                    <?php foreach ($demands as $k=>$v) { ?>
                        <div class="row cont_row swiper-slide">
                            <span class="col-lg-2 img">
                                <img src="/Public/Static/Home/images/type_<?php echo $v['typeid'];?>.png" height="100%">
                            </span>
                            <span class="col-lg-2"><?php echo $v['mrname'];?></span>
                            <?php if ($v['typeid'] == 1) {?>
                                <span class="col-lg-3">
                                    投资项目：<?php echo $v['other']['name'];?>
                                </span>
                                <span class="col-lg-3">
                                    投资金额：<?php echo $v['amount'];?>元
                                </span>
                            <?php } else if ($v['typeid'] == 2) {?>
                                <span class="col-lg-3">
                                    支持项目：<?php echo $v['other']['name'];?>
                                </span>
                                <span class="col-lg-3">
                                    支持金额：<?php echo $v['amount'];?>元
                                </span>
                            <?php } else if ($v['typeid'] == 3) {?>
                                <span class="col-lg-3">
                                    借款金额：<?php echo $v['amount'];?>万元
                                </span>
                                <span class="col-lg-3">
                                    借款期限：<?php echo $v['other']['term'];?>
                                </span>
                            <?php } else if ($v['typeid'] == 4) {?>
                                <span class="col-lg-3">
                                    典当金额：<?php echo $v['amount'];?>万元
                                </span>
                                <span class="col-lg-3">
                                    典当期限：<?php echo $v['other']['term'];?>
                                </span>
                            <?php } else if ($v['typeid'] == 5) {?>
                                <span class="col-lg-3">
                                    融资金额：<?php echo $v['amount'];?>万元
                                </span>
                                <span class="col-lg-3">
                                    租赁期限：<?php echo $v['other']['term'];?>
                                </span>
                            <?php } else if ($v['typeid'] == 6) {?>
                                <span class="col-lg-3">公司名称：<?php echo $v['other']['company'];?>
                                </span>
                                <span class="col-lg-3">
                                拟IPO市场：<?php echo $v['other']['ipo'];?></span>
                            <?php } else if ($v['typeid'] == 7) {?>
                                <span class="col-lg-3">公司名称：<?php echo $v['other']['company'];?>
                                </span>
                                <span class="col-lg-3">
                                拟融资规模：<?php echo $v['amount'];?>万元</span>
                            <?php } else if ($v['typeid'] == 8) {?>
                                <span class="col-lg-3">
                                    投资金额：<?php echo $v['amount'];?>万元
                                </span>
                                <span class="col-lg-3">
                                    投资期限：<?php echo $v['other']['term'];?>
                                </span>
                            <?php } else if ($v['typeid'] == 9) {?>
                                <span class="col-lg-3">
                                    投资金额：<?php echo $v['amount'];?>万元
                                </span>
                                <span class="col-lg-3">
                                    投资期限：<?php echo $v['other']['term'];?>
                                </span>
                            <?php } else if ($v['typeid'] == 10) {?>
                                <span class="col-lg-3">
                                    资管需求：<?php echo $v['other']['note'];?><br/>
                                </span>                            
                            <?php } else if ($v['typeid'] == 11) {?>
                                <span class="col-lg-3">
                                    产品名称：<?php echo $v['other']['name'];?>
                                </span>
                                <span class="col-lg-3">
                                    支付金额：<?php echo $v['amount'];?>元<br/>
                                </span>                            
                            <?php } else if ($v['typeid'] == 12) {?>
                                <span class="col-lg-3">
                                    公司名称：<?php echo $v['other']['company'];?>
                                </span>
                                <span class="col-lg-3">
                                    咨询类型：<?php echo $v['other']['zxtype'];?>
                                </span>                            
                            <?php }?>
                            <span class="col-lg-2 row_dz">
                                <?php if (!in_array($v['typeid'], array(1,2,11))) {?>
                                    <img src="/Public/Static/Home/images/wz.png"><?php echo $v['city_name'];?>.<?php echo $v['area_name'];?>
                                <?php }?>
                            </span>
                        </div>
                    <?php }?>
                <?php } else {?>
                
                <?php }?>
            </div>
        </div>
        <div class="col-lg-3 wxcon">
            <div class="col-lg-6 weix_con">
                <span><img src="/Public/Static/Home/images/bt.jpg" width="148"> </span>
                <p>八特金融</p>
            </div>
            <div class="col-lg-6 weix_con">
                <span><img src="/Public/Static/Home/images/md.jpg" width="148"> </span>
                <p>萌哒众筹</p>
            </div>
            <div class="col-lg-6 weix_con">
                <span><img src="/Public/Static/Home/images/jhs.png" width="148"> </span>
                <p>合金社</p>
            </div>
            <div class="col-lg-6 weix_con">
                <span><img src="/Public/Static/Home/images/fqb.png" width="148"> </span>
                <p>分期宝</p>
            </div>
        </div>
    </div>
</div>
<script>

    var swiper = new Swiper('.swiper-container1', {
        pagination: '.swiper-pagination',
        autoplay : 3000,
        paginationClickable: true,
        loop : true
    });
    var swipers = new Swiper('.swiper-container', {

        slidesPerView: 5,
        direction: 'vertical',
        paginationClickable: true,
        spaceBetween: 9,
        loop : true,
        autoplay : 5000
    });
</script>
</body>
</html>