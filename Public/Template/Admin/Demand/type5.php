<!--融资租赁-->
<p class="form_Itext js-i-areas">
    <label>省市区：</label>
    <select class="cs js-i-province" name="province" autocomplete="off">
        <option value="0">请选择</option>
        <?php foreach ($province as $k=>$v) {?>
        <option value="<?php echo $v['id'];?>"><?php echo $v['short_name'];?></option>
        <?php }?>
    </select>
    <select class="cs js-i-city" name="city">
        <option value="0">请选择</option>
    </select>
    <select class="cs js-i-area" name="area">
        <option value="0">请选择</option>
    </select>
</p>
<p class="form_Itext">
    <label>企业类型:</label>
    <select name="egType">
        <option value="外商独资">外商独资</option>
        <option value="中外合资">中外合资</option>
        <option value="中外合作">中外合作</option>
        <option value="私营">私营</option>
    </select>
</p>
<p class="form_Itext">
    <label>租赁类型:</label>
    <select name="leaseType">
        <option value="直租">直租</option>
        <option value="售后回租">售后回租</option>
    </select>
</p>
<p class="form_Itext">
    <label>融资金额:</label>
    <span class="text">
        <input type="text" class="i1" name="amount" value="" />万元
    </span>
</p>
<p class="form_Itext">
    <label>租赁期限:</label>
    <select name="term">
        <option value="6-12个月">6-12个月</option>
        <option value="1年-2年">1年-2年</option>
        <option value="2年-3年">2年-3年</option>
        <option value="3年以上">3年以上</option>
    </select>
</p>
<p class="form_Itext">
    <label>期望融资利率:</label>
    <select name="interest">
        <option value="年化8-12%">年化8-12%</option>
        <option value="年化12-18%">年化12-18%</option>
        <option value="年化18%以上">年化18%以上</option>
    </select>
</p>