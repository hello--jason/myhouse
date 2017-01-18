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
<div class="all">
    <div class="banner">
        <ul class="items swiper-wrapper">
            <li class="swiper-slide">
                <a href="" target="_blank"><img src="/Public/Static/Wap/images/slide.png" width="100%" /></a>
            </li>
            <li class="swiper-slide">
                <a href="" target="_blank"><img src="/Public/Static/Wap/images/slide1.png" width="100%" /></a>
            </li>
            <li class="swiper-slide">
                <a href="" target="_blank"><img src="/Public/Static/Wap/images/slide2.png" width="100%" /></a>
            </li>
        </ul>
        <div class="pagination"></div>
    </div>
   <div class="mechanism">
       <span>
           <i>
               <img src="/Public/Static/Wap/images/ico1.png">
           </i>
           <var>
               综合金融
           </var>
       </span>
       <span>
           <i>
               <img src="/Public/Static/Wap/images/ico2.png" width="100%">
           </i>
           <var>
               战略联盟
           </var>
       </span>
       <span>
           <i>
               <img src="/Public/Static/Wap/images/ico3.png" width="100%">
           </i>
           <var>
               标准管理
           </var>
       </span>
       <span>
           <i>
               <img src="/Public/Static/Wap/images/ico4.png" width="100%">
           </i>
           <var>
               超强风控
           </var>
       </span>
   </div>
    <div class="project">
        <h3><span>近期业务</span><a href="<?php echo U("Wap/Demand/listing");?>">更多></a> </h3>
        <div class="projectList">
            <?php foreach ($demands as $k=>$v) {?>
                <dl>
                    <dd class="d1">
                        <a href="<?php echo U("Wap/Demand/detail", array("id"=>$v['id']));?>">
                            <span class="img">
                                <img src="/Public/Static/Wap/images/type<?php echo $v['typeid'];?>.png" width="100%">
                            </span>
                            <p class="time"><?php echo $v['mrname'];?> <?php echo date("Y-m-d", $v['verify_time'])?></p>
                            
                            <?php if ($v['typeid'] == 1) {?>
                                <p> 
                                    投资金额：<?php echo $v['amount'];?>万元<br/>
                                    投资期限：<?php echo $v['other']['term'];?>
                                </p>
                            <?php } else if ($v['typeid'] == 2) {?>
                                <p> 
                                    众筹金额：<?php echo $v['amount'];?>万元<br/>
                                    众筹期限：<?php echo $v['other']['term'];?>
                                </p>
                            <?php } else if ($v['typeid'] == 3) {?>
                                <p> 
                                    借款金额：<?php echo $v['amount'];?>万元<br/>
                                    借款期限：<?php echo $v['other']['term'];?>
                                </p>
                            <?php } else if ($v['typeid'] == 4) {?>
                                <p> 
                                    典当金额：<?php echo $v['amount'];?>万元<br/>
                                    典当期限：<?php echo $v['other']['term'];?>
                                </p>
                            <?php } else if ($v['typeid'] == 5) {?>
                                <p> 
                                    融资金额：<?php echo $v['amount'];?>万元<br/>
                                    租赁期限：<?php echo $v['other']['term'];?>
                                </p>
                            <?php } else if ($v['typeid'] == 6) {?>
                                <p>公司名称：<?php echo $v['other']['company'];?> <br/>
                                拟IPO市场：<?php echo $v['other']['ipo'];?></p>
                            <?php } else if ($v['typeid'] == 7) {?>
                                <p>公司名称：<?php echo $v['other']['company'];?> <br/>
                                拟融资规模：<?php echo $v['amount'];?>万元</p>
                            <?php } else if ($v['typeid'] == 8) {?>
                                <p> 
                                    投资金额：<?php echo $v['amount'];?>万元<br/>
                                    投资期限：<?php echo $v['other']['term'];?>
                                </p>
                            <?php } else if ($v['typeid'] == 9) {?>
                                <p> 
                                    投资金额：<?php echo $v['amount'];?>万元<br/>
                                    投资期限：<?php echo $v['other']['term'];?>
                                </p>
                            <?php } else if ($v['typeid'] == 10) {?>
                                <p class="info">
                                    资管需求：<?php echo $v['other']['note'];?><br/>
                                </p>
                            <?php }?>
                        </a>
                    </dd>
                    <dd class="d2"><a href="javascript:void(0);"> <img src="/Public/Static/Wap/images/wz.png"><?php echo $v['city_name'];?>.<?php echo $v['area_name'];?></a></dd>
                </dl>
            <?php }?>
        </div>
    </div>
    <?php include TMPL_PATH . 'Wap/nav.php' ?>
</div>

<script>
    khm.use(['defaul'],function(d){d.slide()});
</script>
</body>
</html>