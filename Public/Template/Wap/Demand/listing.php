<!DOCTYPE html>
<html lang="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="author" content="me@evanxu"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"/>
    <title>近期业务</title>
    <link href="/Public/Static/Wap/css/css.css" type="text/css" rel="stylesheet">
    <script src="/Public/Static/Wap/js/swiper.min.js" type="text/javascript"></script>
    <script src="/Public/Static/Wap/js/zepto.min.js" type="text/javascript"></script>
    <script src="/Public/Static/Wap/js/base.js" type="text/javascript"></script>
</head>
<body>
<div class="all">
    <div class="seach_sel">
        <a href="javascript:void(0);" class="pvct"><span>按地区</span><var></var></a>
        <a href="javascript:void(0);" class="storm"><span>按业务类型</span><var></var></a>
    </div>
    <div class="project">
        <?php if (!empty($demands)) {?>
        <div class="projectList">

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
                                    投资项目：<?php echo $v['other']['name'];?></p>
                                    <p>
                                    投资金额：<?php echo $v['amount'];?>元
                                </p>
                            <?php } else if ($v['typeid'] == 2) {?>
                                <p class="name">
                                    支持项目：<?php echo $v['other']['name'];?></p>
                                    <p>
                                    支持金额：<?php echo $v['amount'];?>元
                                </p>
                            <?php } else if ($v['typeid'] == 3) {?>
                                <p class="name">
                                    借款金额：<?php echo $v['amount'];?>万元</p>
                                    <p>
                                    借款期限：<?php echo $v['other']['term'];?>
                                </p>
                            <?php } else if ($v['typeid'] == 4) {?>
                                <p class="name">
                                    典当金额：<?php echo $v['amount'];?>万元</p>
                                    <p>
                                    典当期限：<?php echo $v['other']['term'];?>
                                </p>
                            <?php } else if ($v['typeid'] == 5) {?>
                                <p class="name">
                                    融资金额：<?php echo $v['amount'];?>万元</p>
                                    <p>
                                    租赁期限：<?php echo $v['other']['term'];?>
                                </p>
                            <?php } else if ($v['typeid'] == 6) {?>
                                <p class="name">公司名称：<?php echo $v['other']['company'];?> </p>
                                    <p>
                                拟IPO市场：<?php echo $v['other']['ipo'];?></p>
                            <?php } else if ($v['typeid'] == 7) {?>
                                <p class="name">公司名称：<?php echo $v['other']['company'];?> </p>
                                    <p>
                                拟融资规模：<?php echo $v['amount'];?>万元</p>
                            <?php } else if ($v['typeid'] == 8) {?>
                                <p class="name">
                                    投资金额：<?php echo $v['amount'];?>万元</p>
                                    <p>
                                    投资期限：<?php echo $v['other']['term'];?>
                                </p>
                            <?php } else if ($v['typeid'] == 9) {?>
                                <p class="name">
                                    投资金额：<?php echo $v['amount'];?>万元</p>
                                    <p>
                                    投资期限：<?php echo $v['other']['term'];?>
                                </p>
                            <?php } else if ($v['typeid'] == 10) {?>
                                <p class="info">
                                    资管需求：<?php echo $v['other']['note'];?>
                                </p>                            
                            <?php } else if ($v['typeid'] == 11) {?>
                                <p class="name">
                                    产品名称：<?php echo $v['other']['name'];?></p>
                                    <p>
                                    支付金额：<?php echo $v['amount'];?>元<br/>
                                </p>                            
                            <?php } else if ($v['typeid'] == 12) {?>
                                <p class="name">
                                    公司名称：<?php echo $v['other']['company'];?></p>
                                    <p class="name">
                                    咨询类型：<?php echo $v['other']['zxtype'];?>
                                </p>                            
                            <?php }?>
                            </a>
                        </dd>
                        <dd class="d2">
                        <?php if (!in_array($v['typeid'], array(1,2,11))) {?>
                        <a href="javascript:void(0);"> <img src="/Public/Static/Wap/images/wz.png"><?php echo $v['city_name'];?>.<?php echo $v['area_name'];?></a>
                        <?php }?>
                        </dd>
                    </dl>
                <?php }?>

        </div>
        <?php } else {?>
            <!--没有数据-->
            <p class="nopage">
                    <span>
                        <img src="/Public/Static/Wap/images/no.jpg" width="100%">
                    </span>
            </p>
        <?php }?>
    </div>
    <input type="hidden" class="citys" value="<?php echo !empty($_GET['city']) ? $_GET['city'] : 0;?>">
    <input type="hidden" class="typeids" value="<?php echo !empty($_GET['type']) ? $_GET['type'] : 0;?>">
    <?php include TMPL_PATH . 'Wap/nav.php' ?>
    <div class="seletCon pops" id="pvct">
        <a href="<?php echo U("Wap/Demand/listing", array_merge($_GET,array("city"=>0)));?>" <?php echo empty($_GET['city']) && isset($_GET['city']) ? "class='cur'" : "";?>>不限</a>
        <?php foreach ($citys as $k=>$v) {?>
            <a href="<?php echo U("Wap/Demand/listing", array_merge($_GET,array("city"=>$v['id'])));?>" <?php echo !empty($_GET['city']) && $_GET['city'] == $v['id'] ? "class='cur'" : "";?>><?php echo $v['short_name'];?></a>
        <?php }?>
    </div>
    <div class="seletCon pops" id="storm">
        <a href="<?php echo U("Wap/Demand/listing", array_merge($_GET,array("type"=>0)));?>" <?php echo empty($_GET['type'])  && isset($_GET['type']) ? "class='cur'" : "";?>>不限</a>
        <?php foreach ($types as $k=>$v) {?>
            <a href="<?php echo U("Wap/Demand/listing", array_merge($_GET,array("type"=>$k)));?>" <?php echo !empty($_GET['type']) && $_GET['type'] == $k ? "class='cur'" : "";?>><?php echo $v['name'];?></a>
        <?php }?>
    </div>

</div>

<script>
    khm.use(['defaul'],function(d){d.selts();d.getList();});
</script>
</body>
</html>