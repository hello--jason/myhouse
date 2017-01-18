<?php include TMPL_PATH . 'Wap/Demand/header.php' ?>
<dd>
    <span>职业身份</span>
    <span class="r sel">
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
    </span>
    <em ><img src="/Public/Static/Wap/images/ico_l.png"></em>
</dd>
<dd>
    <span>投资金额</span>
    <span class="r">
        <input type="text" name="amount" placeholder="0" class="mone">
    </span>
    <em class="wzts">万元</em>
</dd>
<dd>
    <span>投资期限</span>
    <span class="r sel">
        <select name="term">
            <option value="0">请选择</option>
            <option value="1年-3年">1年-3年</option>
            <option value="3年-5年">3年-5年</option>
            <option value="5年以上">5年以上</option>
        </select>
    </span>
    <em ><img src="/Public/Static/Wap/images/ico_l.png"></em>
</dd>
<dd>
    <span>期望回报利率</span>
    <span class="r sel">
        <select name="interest">
            <option value="0">请选择</option>
            <option value="年化5%以下">年化5%以下</option>
            <option value="年化5-10%">年化5-10% </option>
            <option value="年化10-15%">年化10-15%</option>
            <option value="年化15%以上">年化15%以上</option>
        </select>
    </span>
    <em ><img src="/Public/Static/Wap/images/ico_l.png"></em>
</dd>
<?php include TMPL_PATH . 'Wap/Demand/footer.php' ?>