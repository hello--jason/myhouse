<!--基金管理-->
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
    <label>职业身份:</label>
    <select name="profession">
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
    <label>投资金额</label>
    <input type="text" placeholder="0" name="amount" class="mone i1">
    <em class="wzts">万元</em>
</p>
<p class="form_Itext">
    <label>投资期限:</label>
    <select name="term">
        <option value="6-12个月">6-12个月</option>
        <option value="1年-2年">1年-2年</option>
        <option value="2年-3年">2年-3年</option>
        <option value="3年以上">3年以上</option>
    </select>
</p>
<p class="form_Itext">
    <label>期望回报利率:</label>
    <select name="interest">
        <option value="年化5%以下">年化5%以下</option>
        <option value="年化5-10%">年化5-10%</option>
        <option value="年化10-15%">年化10-15%</option>
        <option value="年化15%以上">年化15%以上</option>
    </select>
</p>