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
    <span>借款金额</span>
    <span class="r">
        <input type="text" placeholder="0" name="amount" class="mone">
    </span>
    <em class="wzts">万元</em>
</dd>
<dd>
    <span>借款期限</span>
    <span class="r sel">
        <select name="term">
            <option value="0">请选择</option>
            <option value="1个月以内">1个月以内</option>
            <option value="1-3个月">1-3个月</option>
            <option value="3-6个月">3-6个月</option>
            <option value="6-12个月">6-12个月</option>
            <option value="1年以上">1年以上</option>
        </select>
    </span>
    <em ><img src="/Public/Static/Wap/images/ico_l.png"></em>
</dd>
<dd>
    <span>借款用途</span>
    <span class="r sel">
        <select name="purpose">
            <option value="0">请选择</option>
            <option value="短期周转">短期周转</option>
            <option value="购房借款">购房借款</option>
            <option value="购车借款">购车借款</option>
            <option value="装修借款">装修借款</option>
            <option value="其他">其他</option>
        </select>
    </span>
    <em ><img src="/Public/Static/Wap/images/ico_l.png"></em>
</dd>
<dd>
    <span>期望借款利率</span>
    <span class="r sel">
        <select name="interest">
            <option value="0">请选择</option>
            <option value="年化8-12%">年化8-12%</option>
            <option value="年化12-18%">年化12-18%</option>
            <option value="年化18%以上">年化18%以上</option>
        </select>
    </span>
    <em ><img src="/Public/Static/Wap/images/ico_l.png"></em>
</dd>
<dd>
    <span>还款来源</span>
    <span class="r sel">
        <input type="text" placeholder="还款来源(100字以内)" name="repayment">
    </span>
</dd>
<?php include TMPL_PATH . 'Wap/Demand/footer.php' ?>