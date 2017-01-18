<!--短期融资-->
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
    <label>职业身份</label>
    <select name="profession">
        <option value="0">请选择</option>
        <option value="上班族">上班族</option>
        <option value="公务员">公务员</option>
        <option value="个体户">个体户</option>
        <option value="无固定职业">无固定职业</option>
        <option value="企业主">企业主</option>
        <option value="学生">学生</option>
        <option value="离退休人员">离退休人员</option>
    </select>
</p>
<p class="form_Itext">
    <label>借款金额</label>
    <input type="text" placeholder="0" name="amount" class="mone i1">
    <em class="wzts">万元</em>
</p>
<p class="form_Itext">
    <label>借款期限</label>
    <select name="term">
        <option value="0">请选择</option>
        <option value="1个月以内">1个月以内</option>
        <option value="1-3个月">1-3个月</option>
        <option value="3-6个月">3-6个月</option>
        <option value="6-12个月">6-12个月</option>
        
        <option value="1年以上">1年以上</option>
    </select>
</p>
<p class="form_Itext">
    <label>借款用途</label>
    <select name="purpose">
        <option value="0">请选择</option>
        <option value="短期周转">短期周转</option>
        <option value="购房借款">购房借款</option>
        <option value="购车借款">购车借款</option>
        <option value="装修借款">装修借款</option>
        <option value="其他">其他</option>
    </select>
</p>
<p class="form_Itext">
    <label>期望借款利率</label>
    <select name="interest">
        <option value="0">请选择</option>
        <option value="年化8-12%">年化8-12%</option>
        <option value="年化12-18%">年化12-18%</option>
        <option value="年化18%以上">年化18%以上</option>
    </select>
</p>
<p class="form_Itext">
    <label>还款来源</label>
    <input type="text" class="i1" placeholder="还款来源(100字以内)" name="repayment">
</p>