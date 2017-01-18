<?php include TMPL_PATH . 'Admin/header.php' ?>
<div class="conter clearfix">
    <!--left-->
    <?php include TMPL_PATH . 'Admin/menu.php' ?>
    <!--right-->
    <div class="contRight">
        <div class="i_title">
            <a href="javascript:void(0);" class="refresh iconfont">&#xe60b;</a>
            <a href="javascript:void(0);" class="addBnt qrhb js-btn-back"><var class="iconfont">&#xe60e;</var>返回上一页</a>
        </div>
        <div class="top_pms">
        </div>
        <div class="allCond">

            <div class="form_con" style="display: block;">
                <p class="form_Itext">
                    <label>业务编码：</label>
                    <span class="text">
                        <?php echo $demand['number'];?>
                    </span>
                </p>
                <p class="form_Itext">
                    <label>业务类型:</label>
                    <span class="text">
                        <?php echo $demand['type_name'];?>
                    </span>
                </p>
                <p class="form_Itext">
                    <label>姓名:</label>
                    <span class="text">
                        <?php echo $demand['realname'];?>
                    </span>
                </p>
                <?php if (!in_array($demand['typeid'], array(1,2,11))) {?>
                <p class="form_Itext">
                    <label>省市区:</label>
                    <span class="text">
                        <?php echo $demand['province_name']. $demand['city_name']. $demand['area_name'];?>
                    </span>
                </p>
                <?php }?>
                <p class="form_Itext">
                    <label>电话号码:</label>
                    <span class="text">
                        <?php echo $demand['mobile'];?>
                    </span>
                </p>
                <?php if ($demand['typeid'] == 1) {?>
                    <p class="form_Itext">
                        <label>项目名称:</label>
                        <span class="text">
                            <?php echo $demand['other']['name'];?>
                        </span>
                    </p>
                    <p class="form_Itext">
                        <label>投资金额:</label>
                        <span class="text">
                            <?php echo $demand['amount'];?>元
                        </span>
                    </p>
                <?php } else if ($demand['typeid'] == 2) {?>
                    <p class="form_Itext">
                        <label>项目名称:</label>
                        <span class="text">
                            <?php echo $demand['other']['name'];?>
                        </span>
                    </p>
                    <p class="form_Itext">
                        <label>支持金额:</label>
                        <span class="text">
                            <?php echo $demand['amount'];?>元
                        </span>
                    </p>
                <?php } else if ($demand['typeid'] == 3) {?>
                    <p class="form_Itext">
                        <label>职业身份:</label>
                        <span class="text">
                            <?php echo $demand['other']['profession'];?>
                        </span>
                    </p>
                    <p class="form_Itext">
                        <label>借款金额:</label>
                        <span class="text">
                            <?php echo $demand['amount'];?>万元
                        </span>
                    </p>
                    <p class="form_Itext">
                        <label>借款期限:</label>
                        <span class="text">
                            <?php echo $demand['other']['term'];?>
                        </span>
                    </p>
                    <p class="form_Itext">
                        <label>借款用途:</label>
                        <span class="text">
                            <?php echo $demand['other']['purpose'];?>
                        </span>
                    </p>
                    <p class="form_Itext">
                        <label>期望借款利率:</label>
                        <span class="text">
                            <?php echo $demand['other']['interest'];?>
                        </span>
                    </p>
                    <p class="form_Itext">
                        <label>还款来源:</label>
                        <span class="text">
                            <?php echo $demand['other']['repayment'];?>
                        </span>
                    </p>
                <?php } else if ($demand['typeid'] == 4) {?>
                    <p class="form_Itext">
                        <label>职业身份:</label>
                        <span class="text">
                            <?php echo $demand['other']['profession'];?>
                        </span>
                    </p>
                    <p class="form_Itext">
                        <label>当品名称:</label>
                        <span class="text">
                            <?php echo $demand['other']['name'];?>
                        </span>
                    </p>
                    <p class="form_Itext">
                        <label>当品描述:</label>
                        <span class="text">
                            <?php echo $demand['other']['description'];?>
                        </span>
                    </p>
                    <p class="form_Itext">
                        <label>典当金额:</label>
                        <span class="text">
                            <?php echo $demand['amount'];?>万元
                        </span>
                    </p>
                    <p class="form_Itext">
                        <label>典当期限:</label>
                        <span class="text">
                            <?php echo $demand['other']['term'];?>
                        </span>
                    </p>
                <?php } else if ($demand['typeid'] == 5) {?>
                    <p class="form_Itext">
                        <label>企业类型:</label>
                        <span class="text">
                            <?php echo $demand['other']['egType'];?>
                        </span>
                    </p>
                    <p class="form_Itext">
                        <label>租赁类型:</label>
                        <span class="text">
                            <?php echo $demand['other']['leaseType'];?>
                        </span>
                    </p>
                    <p class="form_Itext">
                        <label>融资金额:</label>
                        <span class="text">
                            <?php echo $demand['amount'];?>万元
                        </span>
                    </p>
                    <p class="form_Itext">
                        <label>租赁期限:</label>
                        <span class="text">
                            <?php echo $demand['other']['term'];?>
                        </span>
                    </p>
                    <p class="form_Itext">
                        <label>期望融资利率:</label>
                        <span class="text">
                            <?php echo $demand['other']['interest'];?>
                        </span>
                    </p>
                <?php } else if ($demand['typeid'] == 6) {?>
                    <p class="form_Itext">
                        <label>公司名称:</label>
                        <span class="text">
                            <?php echo $demand['other']['name'];?>
                        </span>
                    </p>
                    <p class="form_Itext">
                        <label>拟IPO市场:</label>
                        <span class="text">
                            <?php echo $demand['other']['ipo'];?>
                        </span>
                    </p>
                <?php } else if ($demand['typeid'] == 7) {?>
                    <p class="form_Itext">
                        <label>公司名称:</label>
                        <span class="text">
                            <?php echo $demand['other']['name'];?>
                        </span>
                    </p>
                    <p class="form_Itext">
                        <label>拟融资规模:</label>
                        <span class="text">
                            <?php echo $demand['amount'];?>万元
                        </span>
                    </p>
                <?php } else if ($demand['typeid'] == 8) {?>
                    <p class="form_Itext">
                        <label>职业身份:</label>
                        <span class="text">
                            <?php echo $demand['other']['profession'];?>
                        </span>
                    </p>
                    <p class="form_Itext">
                        <label>投资金额:</label>
                        <span class="text">
                            <?php echo $demand['amount'];?>万元
                        </span>
                    </p>
                    <p class="form_Itext">
                        <label>投资期限:</label>
                        <span class="text">
                            <?php echo $demand['other']['term'];?>
                        </span>
                    </p>
                    <p class="form_Itext">
                        <label>期望回报利率:</label>
                        <span class="text">
                            <?php echo $demand['other']['interest'];?>
                        </span>
                    </p>
                <?php } else if ($demand['typeid'] == 9) {?>
                    <p class="form_Itext">
                        <label>职业身份:</label>
                        <span class="text">
                            <?php echo $demand['other']['profession'];?>
                        </span>
                    </p>
                    <p class="form_Itext">
                        <label>投资金额:</label>
                        <span class="text">
                            <?php echo $demand['amount'];?>
                        </span>
                    </p>  
                    <p class="form_Itext">
                        <label>投资期限:</label>
                        <span class="text">
                            <?php echo $demand['other']['term'];?>
                        </span>
                    </p> 
                    <p class="form_Itext">
                        <label>期望回报利率:</label>
                        <span class="text">
                            <?php echo $demand['other']['interest'];?>
                        </span>
                    </p> 
                <?php } else if ($demand['typeid'] == 10) {?>
                    <p class="form_Itext">
                        <label>职业身份:</label>
                        <span class="text">
                            <?php echo $demand['other']['profession'];?>
                        </span>
                    </p>                    
                    <p class="form_Itext">
                        <label>有无房产:</label>
                        <span class="text">
                            <?php echo $demand['other']['house'] == 1 ? "有 &nbsp;&nbsp;(房产评估：{$demand['other']['houseAmount']} 万元)" : "无";?>
                        </span>
                    </p>
                    
                    <p class="form_Itext">
                        <label>有无私家车:</label>
                        <span class="text">
                            <?php echo $demand['other']['car'] == 1 ? "有 &nbsp;&nbsp;(私家车评估：". $demand['other']['carAmount'] ."万元)" : "无";?>
                        </span>
                    </p>
                    <p class="form_Itext">
                        <label>有无商业保险:</label>
                        <span class="text">
                            <?php echo $demand['other']['insurance'] == 1 ? "有 &nbsp;&nbsp;(商业保险评估：". $demand['other']['insuranceAmount'] ." 万元)" : "无";?>
                        </span>
                    </p>
                    <p class="form_Itext">
                        <label>有无贷款:</label>
                        <span class="text">
                            <?php echo $demand['other']['loan'] == 1 ? "有 &nbsp;&nbsp;(贷款金额：". $demand['other']['loanAmount'] ." 万元)" : "无";?>
                        </span>
                    </p>
                    <p class="form_Itext">
                        <label>婚姻状况:</label>
                        <span class="text">
                            <?php echo $demand['other']['marry'];?>
                        </span>
                    </p>
                    <p class="form_Itext">
                        <label>资管需求:</label>
                        <span class="text">
                            <?php echo $demand['other']['note'];?>
                        </span>
                    </p>
                <?php } else if ($demand['typeid'] == 11) {?>
                    <p class="form_Itext">
                        <label>产品名称:</label>
                        <span class="text">
                            <?php echo $demand['other']['name'];?>
                        </span>
                    </p>
                    <p class="form_Itext">
                        <label>支付金额:</label>
                        <span class="text">
                            <?php echo $demand['amount'];?>元
                        </span>
                    </p>
                <?php } else if ($demand['typeid'] == 12) {?>
                    <p class="form_Itext">
                        <label>公司名称:</label>
                        <span class="text">
                            <?php echo $demand['other']['name'];?>
                        </span>
                    </p>
                    <p class="form_Itext">
                        <label>咨询类型:</label>
                        <span class="text">
                            <?php echo $demand['other']['zxtype'];?>
                        </span>
                    </p>
                    <p class="form_Itext">
                        <label>咨询内容:</label>
                        <span class="text">
                            <?php echo $demand['other']['content'];?>
                        </span>
                    </p>
                <?php }?>
                <p class="form_Itext">
                    <label>常用邮箱:</label>
                    <span class="text">
                        <?php echo $demand['email'];?>
                    </span>
                </p>
                <div class="form_Itext clearfix form_check">
                    <label>审核状态</label>
                    <p class="checks">
                        <?php if ($demand['status'] == 0) {?>
                            <span class="text">未审核</span>
                        <?php } else if ($demand['status'] == 1) {?>
                            <span class="text">已通过</span>
                        <?php } else if ($demand['status'] == -1) {?>
                            <span class="text">未通过</span>
                        <?php }?>
                    </p>
                </div>
                <?php if (!empty($demand['status'])) {?>
                    <p class="form_Itext">
                        <label>审核时间:</label>
                        <span class="text">
                            <?php echo date("Y-m-d H:i:s", $demand['verify_time']);?>
                        </span>
                    </p>
                <?php }?>
            </div>
        </div>

    </div>
</div>
<script>

    khm.use(['defaul'], function (d) {
        d.init();
        d.sel();
        d.hander('pjTab', 'form_con');
        d.publish();
    });

</script>
<?php include TMPL_PATH . 'Admin/footer.php' ?>