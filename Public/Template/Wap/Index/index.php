<!DOCTYPE html>
<html lang="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="author" content="me@evanxu"/>
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <title>首页</title>
    <link href="/Public/Static/Wap/css/css.css" type="text/css" rel="stylesheet">
    <script src="/Public/Static/Wap/js/swiper.min.js" type="text/javascript"></script>
    <script src="/Public/Static/Wap/js/zepto.min.js" type="text/javascript"></script>
    <script src="/Public/Static/Wap/js/base.js" type="text/javascript"></script>
</head>
<body>
<div class="all">
    <div class="banner">
        <ul class="items swiper-wrapper">
            <?php if (!empty($adverts)) {?>
                <?php foreach ($adverts as $k=>$v) {?>
                    <li class="swiper-slide">
                        <a href="<?php echo $v['website'];?>" target="_blank"><img src="<?php echo $v['image_mobile'];?>" width="100%" /></a>
                    </li>
                <?php }?>
            <?php } else {?>
                <li class="swiper-slide">
                    <a href="" target="_blank"><img src="/Public/Static/Wap/images/slide1.png" width="100%" /></a>
                </li>
            <?php }?>
        </ul>
        <div class="pagination"></div>
    </div>
    <div class="tabCon">
        <div class="tabHand">
            <span class="cur">理财</span>
            <span>贷款</span>
            <span>服务</span>
        </div>
        <div class="tabsCon">
            <div class="swiper-wrapper items clearfix">
                <div class="swiper-slide tabList">
                    <a href="<?php echo U("Wap/Demand/describe", array("type"=>1));?>" class="a1">
                        <span>
                            <img src="/Public/Static/Wap/images/tab_p2p.png" width="100%">
                        </span>
                        <var>
                            p2p理财
                        </var>
                    </a>
                    <a href="<?php echo U("Wap/Demand/describe", array("type"=>2));?>" class="a1">
                        <span>
                            <img src="/Public/Static/Wap/images/tab_zc.png" width="100%">
                        </span>
                        <var>
                            众筹
                        </var>
                    </a>
                    <a href="<?php echo U("Wap/Demand/describe", array("type"=>11));?>" class="a1">
                        <span>
                            <img src="/Public/Static/Wap/images/tab_bx.png" width="100%">
                        </span>
                        <var>
                            车险
                        </var>
                    </a>
                    <a href="<?php echo U("Wap/Demand/describe", array("type"=>9));?>" class="a1">
                        <span>
                            <img src="/Public/Static/Wap/images/tab_jj.png" width="100%">
                        </span>
                        <var>
                            基金管理
                        </var>
                    </a>
                </div>
                <div class="swiper-slide tabList" >
                    <a href="<?php echo U("Wap/Demand/describe", array("type"=>3));?>">
                        <span>
                            <img src="/Public/Static/Wap/images/tab_dqrz.png" width="100%">
                        </span>
                        <var>
                            短期融资
                        </var>
                    </a>
                    <a href="<?php echo U("Wap/Demand/describe", array("type"=>4));?>">
                        <span>
                            <img src="/Public/Static/Wap/images/tab_dd.png" width="100%">
                        </span>
                        <var>
                            典当
                        </var>
                    </a>
                    <a href="<?php echo U("Wap/Demand/describe", array("type"=>5));?>">
                        <span>
                            <img src="/Public/Static/Wap/images/tab_rzzl.png" width="100%">
                        </span>
                        <var>
                            融资租赁
                        </var>
                    </a>
                </div>
                <div class="swiper-slide tabList" >
                    <a href="<?php echo U("Wap/Demand/describe", array("type"=>6));?>">
                        <span>
                            <img src="/Public/Static/Wap/images/tab_ssfd.png" width="100%">
                        </span>
                        <var>
                            上市辅导
                        </var>
                    </a>
                    <a href="<?php echo U("Wap/Demand/describe", array("type"=>10));?>">
                        <span>
                            <img src="/Public/Static/Wap/images/tab_zcgl.png" width="100%">
                        </span>
                        <var>
                            资产管理
                        </var>
                    </a>
                    <a href="<?php echo U("Wap/Demand/describe", array("type"=>12));?>">
                        <span>
                            <img src="/Public/Static/Wap/images/tab_cwzx.png" width="100%">
                        </span>
                        <var>
                            财务咨询
                        </var>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="project">
        <h3><span>近期业务</span><a href="<?php echo U("Wap/Demand/listing");?>">更多></a> </h3>
        <div class="projectList">
            <?php if (!empty($demands)) {?>
                <?php foreach ($demands as $k=>$v) {?>
                    <dl>
                        <dd class="d1">
                            <a href="<?php echo U("Wap/Demand/detail", array("id"=>$v['id']));?>">
                                <span class="img">
                                    <img src="/Public/Static/Wap/images/type<?php echo $v['typeid'];?>.png" width="100%">
                                    <var><?php echo $v['type_name'];?></var>
                                </span>
                                <p class="time"><?php echo $v['mrname'];?> <?php echo date("Y-m-d", $v['verify_time'])?></p>

                                <?php if ($v['typeid'] == 1) {?>
                                    <p class="name">
                                        投资项目：<?php echo $v['other']['name'];?>
                                    </p>
                                    <p>
                                        投资金额：<?php echo $v['amount'];?>元
                                    </p>
                                <?php } else if ($v['typeid'] == 2) {?>
                                    <p class="name">
                                        支持项目：<?php echo $v['other']['name'];?>
                                    </p>
                                    <p>
                                        支持金额：<?php echo $v['amount'];?>元
                                    </p>
                                <?php } else if ($v['typeid'] == 3) {?>
                                    <p class="name">
                                        借款金额：<?php echo $v['amount'];?>万元
                                    </p>
                                    <p>
                                        借款期限：<?php echo $v['other']['term'];?>
                                    </p>
                                <?php } else if ($v['typeid'] == 4) {?>
                                    <p class="name">
                                        典当金额：<?php echo $v['amount'];?>万元
                                    </p>
                                    <p>
                                        典当期限：<?php echo $v['other']['term'];?>
                                    </p>
                                <?php } else if ($v['typeid'] == 5) {?>
                                    <p class="name">
                                        融资金额：<?php echo $v['amount'];?>万元
                                    </p>
                                    <p>
                                        租赁期限：<?php echo $v['other']['term'];?>
                                    </p>
                                <?php } else if ($v['typeid'] == 6) {?>
                                    <p class="name">公司名称：<?php echo $v['other']['company'];?>
                                    </p>
                                    <p>
                                    拟IPO市场：<?php echo $v['other']['ipo'];?></p>
                                <?php } else if ($v['typeid'] == 7) {?>
                                    <p class="name">公司名称：<?php echo $v['other']['company'];?>
                                    </p>
                                    <p>
                                    拟融资规模：<?php echo $v['amount'];?>万元</p>
                                <?php } else if ($v['typeid'] == 8) {?>
                                    <p class="name">
                                        投资金额：<?php echo $v['amount'];?>万元
                                    </p>
                                    <p>
                                        投资期限：<?php echo $v['other']['term'];?>
                                    </p>
                                <?php } else if ($v['typeid'] == 9) {?>
                                    <p class="name">
                                        投资金额：<?php echo $v['amount'];?>万元
                                    </p>
                                    <p>
                                        投资期限：<?php echo $v['other']['term'];?>
                                    </p>
                                <?php } else if ($v['typeid'] == 10) {?>
                                    <p class="info">
                                        资管需求：<?php echo $v['other']['note'];?><br/>
                                    </p>                            
                                <?php } else if ($v['typeid'] == 11) {?>
                                    <p class="name">
                                        产品名称：<?php echo $v['other']['name'];?>
                                    </p>
                                    <p>
                                        支付金额：<?php echo $v['amount'];?>元<br/>
                                    </p>                            
                                <?php } else if ($v['typeid'] == 12) {?>
                                    <p class="name">
                                        公司名称：<?php echo $v['other']['company'];?>
                                    </p>
                                    <p class="name">
                                        咨询类型：<?php echo $v['other']['zxtype'];?>
                                    </p>                            
                                <?php }?>
                            </a>
                        </dd>
                        <dd class="d2">
                            <?php if (!in_array($v['typeid'], array(1,2,11))) {?>
                                <a href="javascript:void(0);"><img src="/Public/Static/Wap/images/wz.png"><?php echo $v['city_name'];?>.<?php echo $v['area_name'];?></a>
                            <?php }?>
                        </dd>
                    </dl>
                <?php }?>
            <?php } else {?>
                <!--没有数据-->
                <p class="nopage">
                    <span>
                        <img src="/Public/Static/Wap/images/no.jpg" width="100%">
                    </span>
                </p>
            <?php }?>
        </div>
    </div>
    <?php include TMPL_PATH . 'Wap/nav.php' ?>
</div>

<script>
    khm.use(['defaul'],function(d){d.slide();d.slidetab()});
</script>
</body>
</html>