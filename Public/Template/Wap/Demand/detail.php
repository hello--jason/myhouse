<!DOCTYPE html>
<html lang="zh">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="author" content="me@evanxu"/>
        <meta name="format-detection" content="telephone=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
        <title>业务详情</title>
        <link href="/Public/Static/Wap/css/css.css" type="text/css" rel="stylesheet">
        <script src="/Public/Static/Wap/js/swiper.min.js" type="text/javascript"></script>
        <script src="/Public/Static/Wap/js/zepto.min.js" type="text/javascript"></script>
        <script src="/Public/Static/Wap/js/base.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="all">
            <dl class="pact">
                <dt>
                    <img src="/Public/Static/Wap/images/type<?php echo $demand['typeid']; ?>.png" width="100%">
                    <var><?php echo $demand['type_name']; ?></var>
                </dt>
                <dd>
                    <h3>
                        <?php echo $demand['mrname']; ?>
                    </h3>
                    <p>
                        <?php echo date("Y-m-d", $demand['verify_time']);?>
                    </p>
                </dd>
            </dl>
            <dl class="pactList">
                <?php if (!in_array($demand['typeid'], array(1,2,11))) {?>
                    <dd>
                        <label>省市地区:</label>
                        <span><?php echo $demand['province_name'] . "&nbsp;" . $demand['city_name'] . "&nbsp;" . $demand['area_name']; ?></span>
                    </dd>
                <?php }?>
                <?php if ($demand['typeid'] == 1) { ?>
                    <dd class="xmms clearfix">
                        <label>投资项目:</label>
                        <span>
                            <?php echo $demand['other']['name']; ?>
                        </span>
                    </dd>
                    <dd class="xmms clearfix">
                        <label>投资金额:</label>
                        <span>
                            <?php echo $demand['amount']; ?>元
                        </span>
                    </dd>
                <?php } else if ($demand['typeid'] == 2) { ?>
                    <dd class="xmms clearfix">
                        <label>支持项目:</label>
                        <span>
                            <?php echo $demand['other']['name']; ?>
                        </span>
                    </dd>
                    <dd class="xmms clearfix">
                        <label>支持金额:</label>
                        <span>
                            <?php echo $demand['amount']; ?>元
                        </span>
                    </dd>
                <?php } else if ($demand['typeid'] == 3) { ?>
                    <dd class="xmms clearfix">
                        <label>职业身份:</label>
                        <span>
                            <?php echo $demand['other']['profession']; ?>
                        </span>
                    </dd>
                    <dd class="xmms clearfix">
                        <label>借款金额:</label>
                        <span>
                            <?php echo $demand['amount']; ?>万元
                        </span>
                    </dd>
                    <dd class="xmms clearfix">
                        <label>借款期限:</label>
                        <span>
                            <?php echo $demand['other']['term']; ?>
                        </span>
                    </dd>
                    <dd class="xmms clearfix">
                        <label>借款用途:</label>
                        <span>
                            <?php echo $demand['other']['purpose']; ?>
                        </span>
                    </dd>
                <?php } else if ($demand['typeid'] == 4) { ?>
                    <dd class="xmms clearfix">
                        <label>职业身份:</label>
                        <span>
                            <?php echo $demand['other']['profession']; ?>
                        </span>
                    </dd>
                    <dd class="xmms clearfix">
                        <label>当品名称:</label>
                        <span>
                            <?php echo $demand['other']['name']; ?>
                        </span>
                    </dd>
                    <dd class="xmms clearfix">
                        <label>当品描述:</label>
                        <span>
                            <?php echo $demand['other']['description']; ?>
                        </span>
                    </dd>
                    <dd class="xmms clearfix">
                        <label>典当金额:</label>
                        <span>
                            <?php echo $demand['amount']; ?>万元
                        </span>
                    </dd>
                    <dd class="xmms clearfix">
                        <label>典当期限:</label>
                        <span>
                            <?php echo $demand['other']['term']; ?>
                        </span>
                    </dd>
                <?php } else if ($demand['typeid'] == 5) { ?>
                    <dd class="xmms clearfix">
                        <label>企业类型:</label>
                        <span>
                            <?php echo $demand['other']['egType']; ?>
                        </span>
                    </dd>
                    <dd class="xmms clearfix">
                        <label>租赁类型:</label>
                        <span>
                            <?php echo $demand['other']['leaseType']; ?>
                        </span>
                    </dd>
                    <dd class="xmms clearfix">
                        <label>融资金额:</label>
                        <span>
                            <?php echo $demand['amount']; ?>万元
                        </span>
                    </dd>
                    <dd class="xmms clearfix">
                        <label>租赁期限:</label>
                        <span>
                            <?php echo $demand['other']['term']; ?>
                        </span>
                    </dd>
                <?php } else if ($demand['typeid'] == 6) { ?>
                    <dd class="xmms clearfix">
                        <label>公司名称:</label>
                        <span>
                            <?php echo $demand['other']['company']; ?>
                        </span>
                    </dd>
                    <dd class="xmms clearfix">
                        <label>拟IPO市场:</label>
                        <span>
                            <?php echo $demand['other']['ipo']; ?>
                        </span>
                    </dd>
                <?php } else if ($demand['typeid'] == 7) { ?>
                    <dd class="xmms clearfix">
                        <label>公司名称:</label>
                        <span>
                            <?php echo $demand['other']['company']; ?>
                        </span>
                    </dd>
                    <dd class="xmms clearfix">
                        <label>拟融资规模:</label>
                        <span>
                            <?php echo $demand['amount']; ?>万元
                        </span>
                    </dd>
                <?php } else if ($demand['typeid'] == 8) { ?>
                    <dd class="xmms clearfix">
                        <label>职业身份:</label>
                        <span>
                            <?php echo $demand['other']['profession']; ?>
                        </span>
                    </dd>
                    <dd class="xmms clearfix">
                        <label>投资金额:</label>
                        <span>
                            <?php echo $demand['amount']; ?>万元
                        </span>
                    </dd>
                    <dd class="xmms clearfix">
                        <label>投资期限:</label>
                        <span>
                            <?php echo $demand['other']['term']; ?>
                        </span>
                    </dd>
                    <dd class="xmms clearfix">
                        <label>期望回报利率:</label>
                        <span>
                            <?php echo $demand['other']['interest']; ?>
                        </span>
                    </dd>
                <?php } else if ($demand['typeid'] == 9) { ?>
                    <dd class="xmms clearfix">
                        <label>职业身份:</label>
                        <span>
                            <?php echo $demand['other']['profession']; ?>
                        </span>
                    </dd>
                    <dd class="xmms clearfix">
                        <label>投资金额:</label>
                        <span>
                            <?php echo $demand['amount']; ?>万元
                        </span>
                    </dd>
                    <dd class="xmms clearfix">
                        <label>投资期限:</label>
                        <span>
                            <?php echo $demand['other']['term']; ?>
                        </span>
                    </dd>
                <?php } else if ($demand['typeid'] == 10) { ?>
                    <dd class="xmms clearfix">
                        <label>职业身份:</label>
                        <span class="text">
                            <?php echo $demand['other']['profession'];?>
                        </span>
                    </dd>
                    
                    <dd class="xmms clearfix">
                        <label>有无房产:</label>
                        <span class="text">
                            <?php echo $demand['other']['house'] == 1 ? "有 &nbsp;&nbsp;(房产评估：". $demand['other']['houseAmount']. " 万元)" : "无";?>
                        </span>
                    </dd>
                    
                    <dd class="xmms clearfix">
                        <label>有无私家车:</label>
                        <span class="text">
                            <?php echo $demand['other']['car'] == 1 ? "有 &nbsp;&nbsp;(私家车评估：". $demand['other']['carAmount'] ."万元)" : "无";?>
                        </span>
                    </dd>
                    <dd class="xmms clearfix">
                        <label>有无商业保险:</label>
                        <span class="text">
                            <?php echo $demand['other']['insurance'] == 1 ? "有 &nbsp;&nbsp;(商业保险评估：". $demand['other']['insuranceAmount'] ." 万元)" : "无";?>
                        </span>
                    </dd>
                    <dd>
                        <label>有无贷款:</label>
                        <span class="text">
                            <?php echo $demand['other']['loan'] == 1 ? "有 &nbsp;&nbsp;(贷款金额：". $demand['other']['loanAmount'] ." 万元)" : "无";?>
                        </span>
                    </dd>
                    <dd class="xmms clearfix">
                        <label>婚姻状况:</label>
                        <span class="text">
                            <?php echo $demand['other']['marry'];?>
                        </span>
                    </dd>
                    <dd class="xmms clearfix">
                        <label>资管需求:</label>
                        <span class="text">
                            <?php echo $demand['other']['note'];?>
                        </span>
                    </dd>
                <?php } else if ($demand['typeid'] == 11) { ?>
                    <dd class="xmms clearfix">
                        <label>产品名称:</label>
                        <span>
                            <?php echo $demand['other']['name']; ?>
                        </span>
                    </dd>
                    <dd class="xmms clearfix">
                        <label>支付金额:</label>
                        <span>
                            <?php echo $demand['amount']; ?>元
                        </span>
                    </dd>
                <?php } else if ($demand['typeid'] == 12) { ?>
                    <dd class="xmms clearfix">
                        <label>公司名称:</label>
                        <span>
                            <?php echo $demand['other']['company']; ?>
                        </span>
                    </dd>
                    <dd class="xmms clearfix">
                        <label>咨询类型:</label>
                        <span>
                            <?php echo $demand['other']['zxtype']; ?>
                        </span>
                    </dd>
                    <dd class="xmms clearfix">
                        <label>咨询内容:</label>
                        <span>
                            <?php echo $demand['other']['content']; ?>
                        </span>
                    </dd>
                <?php } ?>
            </dl>
        </div>

        <script>
            khm.use(['defaul'], function (d) {
                d.slide()
            });
        </script>
    </body>
</html>