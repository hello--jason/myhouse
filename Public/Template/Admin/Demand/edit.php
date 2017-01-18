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
        <div class="top_pms"></div>
        <div class="allCond">
            <form action="<?php echo U("Admin/Demand/edit", array("id" => $demand['id'])); ?>" method="POST">
                <input type="hidden" name="forward" value="<?php echo $forward;?>" />
                <div class="form_con" style="display: block;">
                    <p class="form_Itext">
                        <label>业务编码：</label>
                        <span><?php echo $demand['number']; ?></span>
                    </p>
                    <p class="form_Itext">
                        <label>业务类型：</label>
                        <select disabled="disabled">
                            <option><?php echo $demand['type_name']; ?></option>
                        </select>
                    </p>
                    <p class="form_Itext">
                        <label>姓名：</label>
                        <input type="text" class="i1" name="realname" value="<?php echo $demand['realname']; ?>" />
                    </p>
                    <p class="form_Itext">
                        <label>电话号码：</label>
                        <input type="text" class="i1" name="mobile" value="<?php echo $demand['mobile']; ?>" />
                    </p>
                    <?php if (!in_array($demand['typeid'], array(1,2,11))) {?>
                    <p class="form_Itext">
                        <label>省市区：</label>
                        <select name="province" class="js-i-province">
                            <?php foreach ($province as $k => $v) { ?>
                                <option value="<?php echo $v['id']; ?>" <?php echo $demand['province'] == $v['id'] ? "selected='selected'" : ""; ?>><?php echo $v['short_name']; ?></option>
                            <?php } ?>
                        </select>
                        <select name="city" class="js-i-city">
                            <?php foreach ($city as $k => $v) { ?>
                                <option value="<?php echo $v['id']; ?>" <?php echo $demand['city'] == $v['id'] ? "selected='selected'" : ""; ?>><?php echo $v['short_name']; ?></option>
                            <?php } ?>
                        </select>
                        <select name="area" class="js-i-area">
                            <?php foreach ($area as $k => $v) { ?>
                                <option value="<?php echo $v['id']; ?>" <?php echo $demand['area'] == $v['id'] ? "selected='selected'" : ""; ?>><?php echo $v['short_name']; ?></option>
                            <?php } ?>
                        </select>
                    </p>
                    <?php }?>
                    <?php if ($demand['typeid'] == 1) { ?>
                        <p class="form_Itext">
                            <label>项目名称</label>
                            <input type="text"  name="name" class="mone i1" value="<?php echo $demand['other']['name']; ?>">
                        </p>
                        <p class="form_Itext">
                            <label>投资金额</label>
                            <input type="text" placeholder="0" name="amount" class="mone i1" value="<?php echo $demand['amount']; ?>">
                            <em class="wzts">元</em>
                        </p>
                    <?php } else if ($demand['typeid'] == 2) { ?>
                        <p class="form_Itext">
                            <label>项目名称</label>
                            <input type="text"  name="name" class="mone i1" value="<?php echo $demand['other']['name']; ?>">
                        </p>
                        <p class="form_Itext">
                            <label>支持金额</label>
                            <input type="text" placeholder="0" name="amount" class="mone i1" value="<?php echo $demand['amount']; ?>">
                            <em class="wzts">元</em>
                        </p>
                    <?php } else if ($demand['typeid'] == 3) { ?>
                        <p class="form_Itext">
                            <label>职业身份:</label>
                            <select name="profession">
                                <option value="上班族" <?php echo $demand['other']['profession'] == '上班族' ? "selected='selected'" : ""; ?>>上班族</option>
                                <option value="公务员" <?php echo $demand['other']['profession'] == '公务员' ? "selected='selected'" : ""; ?>>公务员</option>
                                <option value="个体户" <?php echo $demand['other']['profession'] == '个体户' ? "selected='selected'" : ""; ?>>个体户</option>
                                <option value="无固定职业" <?php echo $demand['other']['profession'] == '无固定职业' ? "selected='selected'" : ""; ?>>无固定职业</option>
                                <option value="企业主" <?php echo $demand['other']['profession'] == '企业主' ? "selected='selected'" : ""; ?>>企业主</option>
                                <option value="学生" <?php echo $demand['other']['profession'] == '学生' ? "selected='selected'" : ""; ?>>学生</option>
                                <option value="离退休人员" <?php echo $demand['other']['profession'] == '离退休人员' ? "selected='selected'" : ""; ?>>离退休人员</option>
                            </select>
                        </p>
                        <p class="form_Itext">
                            <label>借款金额:</label>
                            <span class="text">
                                <input type="text" class="i1" name="amount" value="<?php echo $demand['amount']; ?>" />万元
                            </span>
                        </p>
                        <p class="form_Itext">
                            <label>借款期限:</label>
                            <select name="term">
                                <option value="1个月以内"  <?php echo $demand['other']['term'] == '1个月以内' ? "selected='selected'" : ""; ?>>1个月以内</option>
                                <option value="1-3个月"    <?php echo $demand['other']['term'] == '1-3个月' ? "selected='selected'" : ""; ?>>1-3个月</option>
                                <option value="3-6个月"    <?php echo $demand['other']['term'] == '3-6个月' ? "selected='selected'" : ""; ?>>3-6个月</option>
                                <option value="6-12个月"   <?php echo $demand['other']['term'] == '6-12个月' ? "selected='selected'" : ""; ?>>6-12个月</option>
                                <option value="1年以上"    <?php echo $demand['other']['term'] == '1年以上' ? "selected='selected'" : ""; ?>>1年以上</option>
                            </select>
                        </p>
                        <p class="form_Itext">
                            <label>借款用途:</label>
                            <select name="purpose">
                                <option value="短期周转" <?php echo $demand['other']['purpose'] == '短期周转' ? "selected='selected'" : ""; ?>>短期周转</option>
                                <option value="购房借款" <?php echo $demand['other']['purpose'] == '购房借款' ? "selected='selected'" : ""; ?>>购房借款</option>
                                <option value="购车借款" <?php echo $demand['other']['purpose'] == '购车借款' ? "selected='selected'" : ""; ?>>购车借款</option>
                                <option value="装修借款" <?php echo $demand['other']['purpose'] == '装修借款' ? "selected='selected'" : ""; ?>>装修借款</option>
                                <option value="其他" <?php echo $demand['other']['purpose'] == '其他' ? "selected='selected'" : ""; ?>>其他</option>
                            </select>
                        </p>
                        <p class="form_Itext">
                            <label>期望借款利率:</label>
                            <select name="interest">
                                <option value="年化8-12%"   <?php echo $demand['other']['interest'] == '年化8-12%' ? "selected='selected'" : ""; ?>>年化8-12%</option>
                                <option value="年化12-18%"  <?php echo $demand['other']['interest'] == '年化12-18%' ? "selected='selected'" : ""; ?>>年化12-18%</option>
                                <option value="年化18%以上" <?php echo $demand['other']['interest'] == '年化18%以上' ? "selected='selected'" : ""; ?>>年化18%以上</option>
                            </select>
                        </p>
                        <p class="form_Itext">
                            <label>还款来源:</label>
                            <span class="text">
                                <input type="text" class="i1" name="repayment" value="<?php echo $demand['other']['repayment']; ?>" />
                            </span>
                        </p>
                    <?php } else if ($demand['typeid'] == 4) { ?>
                        <p class="form_Itext">
                            <label>职业身份:</label>
                            <select name="profession">
                                <option value="上班族" <?php echo $demand['other']['profession'] == '上班族' ? "selected='selected'" : ""; ?>>上班族</option>
                                <option value="公务员" <?php echo $demand['other']['profession'] == '公务员' ? "selected='selected'" : ""; ?>>公务员</option>
                                <option value="个体户" <?php echo $demand['other']['profession'] == '个体户' ? "selected='selected'" : ""; ?>>个体户</option>
                                <option value="无固定职业" <?php echo $demand['other']['profession'] == '无固定职业' ? "selected='selected'" : ""; ?>>无固定职业</option>
                                <option value="企业主" <?php echo $demand['other']['profession'] == '企业主' ? "selected='selected'" : ""; ?>>企业主</option>
                                <option value="学生" <?php echo $demand['other']['profession'] == '学生' ? "selected='selected'" : ""; ?>>学生</option>
                                <option value="离退休人员" <?php echo $demand['other']['profession'] == '离退休人员' ? "selected='selected'" : ""; ?>>离退休人员</option>
                            </select>
                        </p>
                        <p class="form_Itext">
                            <label>当品名称:</label>
                            <span class="text">
                                <input type="text" class="i1" name="name" value="<?php echo $demand['other']['name']; ?>" />
                            </span>
                        </p>
                        <p class="form_Itext">
                            <label>当品描述:</label>
                            <span class="text">
                                <input type="text" class="i1" name="description" value="<?php echo $demand['other']['description']; ?>" />
                            </span>
                        </p>
                        <p class="form_Itext">
                            <label>典当金额:</label>
                            <span class="text">
                                <input type="text" class="i1" name="amount" value="<?php echo $demand['amount']; ?>" />万元
                            </span>
                        </p>
                        <p class="form_Itext">
                            <label>典当期限:</label>
                            <select name="term">
                                <option value="5天" <?php echo $demand['other']['term'] == '5天' ? "selected='selected'" : ""; ?>>5天</option>
                                <option value="15天" <?php echo $demand['other']['term'] == '15天' ? "selected='selected'" : ""; ?>>15天</option>
                                <option value="1个月" <?php echo $demand['other']['term'] == '1个月' ? "selected='selected'" : ""; ?>>1个月</option>
                                <option value="2个月" <?php echo $demand['other']['term'] == '2个月' ? "selected='selected'" : ""; ?>>2个月</option>
                                <option value="3个月" <?php echo $demand['other']['term'] == '3个月' ? "selected='selected'" : ""; ?>>3个月</option>
                                <option value="4个月" <?php echo $demand['other']['term'] == '4个月' ? "selected='selected'" : ""; ?>>4个月</option>
                                <option value="5个月" <?php echo $demand['other']['term'] == '5个月' ? "selected='selected'" : ""; ?>>5个月</option>
                                <option value="6个月" <?php echo $demand['other']['term'] == '6个月' ? "selected='selected'" : ""; ?>>6个月</option>
                            </select>
                        </p>
                    <?php } else if ($demand['typeid'] == 5) { ?>
                        <p class="form_Itext">
                            <label>企业类型:</label>
                            <select name="egType">
                                <option value="外商独资" <?php echo $demand['other']['egType'] == '外商独资' ? "selected='selected'" : ""; ?>>外商独资</option>
                                <option value="中外合资" <?php echo $demand['other']['egType'] == '中外合资' ? "selected='selected'" : ""; ?>>中外合资</option>
                                <option value="中外合作" <?php echo $demand['other']['egType'] == '中外合作' ? "selected='selected'" : ""; ?>>中外合作</option>
                                <option value="私营" <?php echo $demand['other']['egType'] == '私营' ? "selected='selected'" : ""; ?>>私营</option>
                            </select>
                        </p>
                        <p class="form_Itext">
                            <label>租赁类型:</label>
                            <select name="leaseType">
                                <option value="直租" <?php echo $demand['other']['leaseType'] == '直租' ? "selected='selected'" : ""; ?>>直租</option>
                                <option value="售后回租" <?php echo $demand['other']['leaseType'] == '售后回租' ? "selected='selected'" : ""; ?>>售后回租</option>
                            </select>
                        </p>
                        <p class="form_Itext">
                            <label>融资金额:</label>
                            <span class="text">
                                <input type="text" class="i1" name="amount" value="<?php echo $demand['amount']; ?>" />万元
                            </span>
                        </p>
                        <p class="form_Itext">
                            <label>租赁期限:</label>
                            <select name="term">
                                <option value="6-12个月" <?php echo $demand['other']['term'] == '6-12个月' ? "selected='selected'" : ""; ?>>6-12个月</option>
                                <option value="1年-2年" <?php echo $demand['other']['term'] == '1年-2年' ? "selected='selected'" : ""; ?>>1年-2年</option>
                                <option value="2年-3年" <?php echo $demand['other']['term'] == '2年-3年' ? "selected='selected'" : ""; ?>>2年-3年</option>
                                <option value="3年以上" <?php echo $demand['other']['term'] == '3年以上' ? "selected='selected'" : ""; ?>>3年以上</option>
                            </select>
                        </p>
                        <p class="form_Itext">
                            <label>期望融资利率:</label>
                            <select name="interest">
                                <option value="年化8-12%"  <?php echo $demand['other']['interest'] == '年化8-12%' ? "selected='selected'" : ""; ?>>年化8-12%</option>
                                <option value="年化12-18%" <?php echo $demand['other']['interest'] == '年化12-18%' ? "selected='selected'" : ""; ?>>年化12-18%</option>
                                <option value="年化18%以上" <?php echo $demand['other']['interest'] == '年化18%以上' ? "selected='selected'" : ""; ?>>年化18%以上</option>
                            </select>
                        </p>
                    <?php } else if ($demand['typeid'] == 6) { ?>
                        <p class="form_Itext">
                            <label>公司名称:</label>
                            <span class="text">
                                <input type="text" class="i1" name="name" value="<?php echo $demand['other']['name']; ?>" />
                            </span>
                        </p>
                        <p class="form_Itext">
                            <label>拟IPO市场:</label>
                            <select name="ipo">
                                <option value="上海"    <?php echo $demand['other']['ipo'] == '上海' ? "selected='selected'" : ""; ?>>上海</option>
                                <option value="深圳"    <?php echo $demand['other']['ipo'] == '深圳' ? "selected='selected'" : ""; ?>>深圳</option>
                                <option value="新三板"  <?php echo $demand['other']['ipo'] == '新三板' ? "selected='selected'" : ""; ?>>新三板</option>
                                <option value="四板"    <?php echo $demand['other']['ipo'] == '四板' ? "selected='selected'" : ""; ?>>四板</option>
                                <option value="海外"    <?php echo $demand['other']['ipo'] == '海外' ? "selected='selected'" : ""; ?>>海外</option>
                            </select>
                        </p>
                    <?php } else if ($demand['typeid'] == 7) { ?>
                        <p class="form_Itext">
                            <label>公司名称:</label>
                            <span class="text">
                                <input type="text" class="i1" name="name" value="<?php echo $demand['other']['name']; ?>" />
                            </span>
                        </p>
                        <p class="form_Itext">
                            <label>拟融资规模:</label>
                            <span class="text">
                                <input type="text" class="i1" name="amount" value="<?php echo $demand['amount']; ?>" />万元
                            </span>
                        </p>
                    <?php } else if ($demand['typeid'] == 8) { ?>
                        <p class="form_Itext">
                            <label>职业身份:</label>
                            <select name="profession">
                                <option value="上班族" <?php echo $demand['other']['profession'] == '上班族' ? "selected='selected'" : ""; ?>>上班族</option>
                                <option value="公务员" <?php echo $demand['other']['profession'] == '公务员' ? "selected='selected'" : ""; ?>>公务员</option>
                                <option value="个体户" <?php echo $demand['other']['profession'] == '个体户' ? "selected='selected'" : ""; ?>>个体户</option>
                                <option value="无固定职业" <?php echo $demand['other']['profession'] == '无固定职业' ? "selected='selected'" : ""; ?>>无固定职业</option>
                                <option value="企业主" <?php echo $demand['other']['profession'] == '企业主' ? "selected='selected'" : ""; ?>>企业主</option>
                                <option value="学生" <?php echo $demand['other']['profession'] == '学生' ? "selected='selected'" : ""; ?>>学生</option>
                                <option value="离退休人员" <?php echo $demand['other']['profession'] == '离退休人员' ? "selected='selected'" : ""; ?>>离退休人员</option>
                            </select>
                        </p>
                        <p class="form_Itext">
                            <label>投资金额:</label>
                            <span class="text">
                                <input type="text" class="i1" name="amount" value="<?php echo $demand['amount']; ?>" />万元
                            </span>
                        </p>
                        <p class="form_Itext">
                            <label>投资期限:</label>
                            <select name="term">
                                <option value="1年-3年" <?php echo $demand['other']['term'] == '1年-3年' ? "selected='selected'" : ""; ?>>1年-3年</option>
                                <option value="3年-5年" <?php echo $demand['other']['term'] == '3年-5年' ? "selected='selected'" : ""; ?>>3年-5年</option>
                                <option value="5年以上" <?php echo $demand['other']['term'] == '5年以上' ? "selected='selected'" : ""; ?>>5年以上</option>
                            </select>
                        </p>
                        <p class="form_Itext">
                            <label>期望回报利率:</label>
                            <select name="interest">
                                <option value="年化5%以下"  <?php echo $demand['other']['interest'] == '年化5%以下' ? "selected='selected'" : ""; ?>>年化5%以下</option>
                                <option value="年化5-10%"   <?php echo $demand['other']['interest'] == '年化5-10%' ? "selected='selected'" : ""; ?>>年化5-10% </option>
                                <option value="年化10-15%"  <?php echo $demand['other']['interest'] == '年化10-15%' ? "selected='selected'" : ""; ?>>年化10-15%</option>
                                <option value="年化15%以上" <?php echo $demand['other']['interest'] == '年化15%以上' ? "selected='selected'" : ""; ?>>年化15%以上</option>
                            </select>
                        </p>
                    <?php } else if ($demand['typeid'] == 9) { ?>
                        <p class="form_Itext">
                            <label>职业身份:</label>
                            <select name="profession">
                                <option value="上班族" <?php echo $demand['other']['profession'] == '上班族' ? "selected='selected'" : ""; ?>>上班族</option>
                                <option value="公务员" <?php echo $demand['other']['profession'] == '公务员' ? "selected='selected'" : ""; ?>>公务员</option>
                                <option value="个体户" <?php echo $demand['other']['profession'] == '个体户' ? "selected='selected'" : ""; ?>>个体户</option>
                                <option value="无固定职业" <?php echo $demand['other']['profession'] == '无固定职业' ? "selected='selected'" : ""; ?>>无固定职业</option>
                                <option value="企业主" <?php echo $demand['other']['profession'] == '企业主' ? "selected='selected'" : ""; ?>>企业主</option>
                                <option value="学生" <?php echo $demand['other']['profession'] == '学生' ? "selected='selected'" : ""; ?>>学生</option>
                                <option value="离退休人员" <?php echo $demand['other']['profession'] == '离退休人员' ? "selected='selected'" : ""; ?>>离退休人员</option>
                            </select>
                        </p>
                        <p class="form_Itext">
                            <label>投资金额:</label>
                            <span class="text">
                                <input type="text" class="i1" name="amount" value="<?php echo $demand['amount']; ?>" />万元
                            </span>
                        </p>
                        <p class="form_Itext">
                            <label>投资期限:</label>
                            <select name="term">
                                <option value="6-12个月" <?php echo $demand['other']['term'] == '6-12个月' ? "selected='selected'" : ""; ?>>6-12个月</option>
                                <option value="1年-2年" <?php echo $demand['other']['term'] == '1年-2年' ? "selected='selected'" : ""; ?>>1年-2年</option>
                                <option value="2年-3年" <?php echo $demand['other']['term'] == '2年-3年' ? "selected='selected'" : ""; ?>>2年-3年</option>
                                <option value="3年以上" <?php echo $demand['other']['term'] == '3年以上' ? "selected='selected'" : ""; ?>>3年以上</option>
                            </select>
                        </p>
                        <p class="form_Itext">
                            <label>期望回报利率:</label>
                            <select name="interest">
                                <option value="年化5%以下"  <?php echo $demand['other']['interest'] == '年化5%以下' ? "selected='selected'" : ""; ?>>年化5%以下</option>
                                <option value="年化5-10%"   <?php echo $demand['other']['interest'] == '年化5-10%' ? "selected='selected'" : ""; ?>>年化5-10% </option>
                                <option value="年化10-15%"  <?php echo $demand['other']['interest'] == '年化10-15%' ? "selected='selected'" : ""; ?>>年化10-15%</option>
                                <option value="年化15%以上" <?php echo $demand['other']['interest'] == '年化15%以上' ? "selected='selected'" : ""; ?>>年化15%以上</option>
                            </select>
                        </p>
                    <?php } else if ($demand['typeid'] == 10) { ?>
                        <p class="form_Itext">
                            <label>职业身份:</label>
                            <select name="profession">
                                <option value="上班族" <?php echo $demand['other']['profession'] == '上班族' ? "selected='selected'" : ""; ?>>上班族</option>
                                <option value="公务员" <?php echo $demand['other']['profession'] == '公务员' ? "selected='selected'" : ""; ?>>公务员</option>
                                <option value="个体户" <?php echo $demand['other']['profession'] == '个体户' ? "selected='selected'" : ""; ?>>个体户</option>
                                <option value="无固定职业" <?php echo $demand['other']['profession'] == '无固定职业' ? "selected='selected'" : ""; ?>>无固定职业</option>
                                <option value="企业主" <?php echo $demand['other']['profession'] == '企业主' ? "selected='selected'" : ""; ?>>企业主</option>
                                <option value="学生" <?php echo $demand['other']['profession'] == '学生' ? "selected='selected'" : ""; ?>>学生</option>
                                <option value="离退休人员" <?php echo $demand['other']['profession'] == '离退休人员' ? "selected='selected'" : ""; ?>>离退休人员</option>
                            </select>
                        </p>
                        <p class="form_Itext js-i-parent">
                            <label>有无房产</label>
                            <select class="pgz" name="house">
                                <option value="1" <?php echo $demand['other']['house'] == 1 ? "selected='selected'" : ""; ?>>有</option>
                                <option value="0" <?php echo $demand['other']['house'] == 0 ? "selected='selected'" : ""; ?>>无</option>
                            </select>
                        </p>
                        <p class="form_Itext  js-i-children" <?php echo $demand['other']['house'] == 0 ? "style='display:none;'" : "";?>>
                            <label>房产评估价值:</label>
                            <input class="i1" name="houseAmount" value="<?php echo $demand['other']['houseAmount']; ?>"  placeholder="房产评估价值（万元）">
                            <em class="wzts">万元</em>
                        </p>
                        <p class="form_Itext  js-i-parent">
                            <label>有无私家车</label>
                            <select class="pgz" name="car">
                                <option value="1" <?php echo $demand['other']['car'] == 1 ? "selected='selected'" : ""; ?>>有</option>
                                <option value="0" <?php echo $demand['other']['car'] == 0 ? "selected='selected'" : ""; ?>>无</option>
                            </select>
                        </p>
                        <p class="form_Itext js-i-children" <?php echo $demand['other']['car'] == 0 ? "style='display:none;'" : "";?>>
                            <label>私家车评估价值:</label>
                            <input class="i1" name="carAmount" value="<?php echo $demand['other']['carAmount']; ?>" placeholder="私家车评估价值（万元）">
                            <em class="wzts">万元</em>
                        </p>
                        <p class="form_Itext js-i-parent">
                            <label>有无商业保险</label>
                            <select class="pgz" name="insurance">
                                <option value="1" <?php echo $demand['other']['insurance'] == 1 ? "selected='selected'" : ""; ?>>有</option>
                                <option value="0" <?php echo $demand['other']['insurance'] == 0 ? "selected='selected'" : ""; ?>>无</option>
                            </select>
                        </p>
                        <p class="form_Itext js-i-children" <?php echo $demand['other']['insurance'] == 0 ? "style='display:none;'" : "";?>>
                            <label>商业保险评估价值:</label>
                            <input class="i1" name="insuranceAmount" value="<?php echo $demand['other']['insuranceAmount']; ?>" placeholder="商业保险评估价值（万元）">
                            <em class="wzts">万元</em>
                        </p>
                        <p class="form_Itext js-i-parent">
                            <label>有无贷款</label>
                            <select class="pgz" name="loan">
                                <option value="1" <?php echo $demand['other']['loan'] == 1 ? "selected='selected'" : ""; ?>>有</option>
                                <option value="0" <?php echo $demand['other']['loan'] == 0 ? "selected='selected'" : ""; ?>>无</option>
                            </select>
                        </p>
                        <p class="form_Itext js-i-children" <?php echo $demand['other']['loan'] == 0 ? "style='display:none;'" : "";?>>
                            <label>贷款金额:</label>
                            <input class="i1" name="loanAmount" value="<?php echo $demand['other']['loanAmount']; ?>" placeholder="贷款金额（万元）">
                            <em class="wzts">万元</em>
                        </p>
                        <p class="form_Itext">
                            <label>婚姻状况</label>
                            <select name="marry">
                                <option value="已婚" <?php echo $demand['other']['marry'] == "已婚" ? "selected='selected'" : ""; ?>>已婚</option>
                                <option value="未婚" <?php echo $demand['other']['marry'] == "未婚" ? "selected='selected'" : ""; ?>>未婚</option>
                            </select>
                        </p>

                        <p class="form_Itext">
                            <label>您的资管需求</label>
                            <input type="text" class="i1" name="note" value="<?php echo $demand['other']['note']; ?>" placeholder="例如我想投资、我想贷款等">
                        </p>
                        <p class="form_Itext">
                            <label>常用邮箱</label>
                            <input type="text" class="i1" name="email" value="<?php echo $demand['other']['email']; ?>" placeholder="xxxx@qq.com">
                        </p>                        
                    <?php } else if ($demand['typeid'] == 11) { ?>
                        <p class="form_Itext">
                            <label>产品名称</label>
                            <input type="text" name="name" class="mone i1" value="<?php echo $demand['other']['name'];?>" />
                        </p>
                        <p class="form_Itext">
                            <label>支付金额</label>
                            <input type="text" placeholder="0" name="amount" class="mone i1" value="<?php echo $demand['other']['amount'];?>">
                            <em class="wzts">元</em>
                        </p>
                    <?php } else if ($demand['typeid'] == 12) { ?>
                         <p class="form_Itext">
                            <label>公司名称:</label>
                            <input type="text" class="i1" name="name" value="<?php echo $demand['other']['name'];?>" />
                        </p>
                        <p class="form_Itext">
                            <label>咨询类型:</label>
                            <select name="zxtype">
                                <option value="融资咨询" <?php echo $demand['other']['zxtype'] == "融资咨询" ? "selected='selected'" : ""; ?>>融资咨询</option>
                                <option value="投资咨询" <?php echo $demand['other']['zxtype'] == "投资咨询" ? "selected='selected'" : ""; ?>>投资咨询</option>
                                <option value="税务咨询" <?php echo $demand['other']['zxtype'] == "税务咨询" ? "selected='selected'" : ""; ?>>税务咨询</option>
                                <option value="评估咨询" <?php echo $demand['other']['zxtype'] == "评估咨询" ? "selected='selected'" : ""; ?>>评估咨询</option>
                                <option value="审计咨询" <?php echo $demand['other']['zxtype'] == "审计咨询" ? "selected='selected'" : ""; ?>>审计咨询</option>
                                <option value="律师咨询" <?php echo $demand['other']['zxtype'] == "律师咨询" ? "selected='selected'" : ""; ?>>律师咨询</option>
                                <option value="其他企业管理咨询及信息咨询" <?php echo $demand['other']['zxtype'] == "其他企业管理咨询及信息咨询" ? "selected='selected'" : ""; ?>>其他企业管理咨询及信息咨询</option>
                            </select>
                        </p>
                        <p class="form_Itext">
                            <label>咨询内容:</label>
                            <input type="text" class="i1" name="content" value="<?php echo $demand['other']['content'];?>" />
                        </p>
                    <?php } ?>
                    <p class="bnt_Con">
                        <input type="button" class="btn js-sub-btn" value="提交">
                    </p>
                </div>
            </form>
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
    
    
    $(".js-i-province").bind("change", function(){
        var id = $(this).val();
        $.ajax({
            type: "get",
            url: "<?php echo U("Admin/Index/getRegion");?>",
            data: {parentid:id},
            success: function(data){
                if (data.status > 0) {
                    $(".js-i-city").children().remove();
                    $(".js-i-city").append("<option value='0'>请选择</option>");
                    
                    $(".js-i-area").children().remove();
                    $(".js-i-area").append("<option value='0'>请选择</option>");  
                    $.each(data.region, function(i, n){
                        var html = "<option value='"+ n.id +"'>"+ n.short_name +"</option>";
                        $(".js-i-city").append(html);
                    });
                }
            }
        });
    });
    
    $(".js-i-city").bind("change", function(){
        var id = $(this).val();
        $.ajax({
            type: "get",
            url: "<?php echo U("Admin/Index/getRegion");?>",
            data: {parentid:id},
            success: function(data){
                if (data.status > 0) {
                    $(".js-i-area").children().remove();
                    $(".js-i-area").append("<option value='0'>请选择</option>");                    
                    $.each(data.region, function(i, n){
                        var html = "<option value='"+ n.id +"'>"+ n.short_name +"</option>";
                        $(".js-i-area").append(html);
                    });
                }
            }
        });
    });
    
    $(".js-i-parent select").bind("change", function(){
        var val = $(this).val();
        if (val == 1) {
            $(this).closest(".js-i-parent").next(".js-i-children").show();
        } else {
            $(this).closest(".js-i-parent").next(".js-i-children").hide();
        }
    });
</script>
<?php include TMPL_PATH . 'Admin/footer.php' ?>