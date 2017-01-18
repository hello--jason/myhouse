<?php include TMPL_PATH . 'Wap/Demand/header.php' ?>
<dd>
    <span>企业类型</span>
    <span class="r sel">
        <select name="egType">
            <option value="0">请选择</option>
            <option value="外商独资">外商独资</option>
            <option value="中外合资">中外合资</option>
            <option value="中外合作">中外合作</option>
            <option value="私营">私营</option>
        </select>
    </span>
    <em ><img src="/Public/Static/Wap/images/ico_l.png"></em>
</dd>
<dd>
    <span>租赁类型</span>
    <span class="r sel">
        <select name="leaseType">
            <option value="0">请选择</option>
            <option value="直租">直租</option>
            <option value="售后回租">售后回租</option>
        </select>
    </span>
    <em ><img src="/Public/Static/Wap/images/ico_l.png"></em>
</dd>
<dd>
    <span>融资金额</span>
    <span class="r">
        <input type="number" name="amount" placeholder="0" class="mone">
    </span>
    <em class="wzts">万元</em>
</dd>
<dd>
    <span>租赁期限</span>
    <span class="r sel">
        <select name="term">
            <option value="0">请选择</option>
            <option value="6-12个月">6-12个月</option>
            <option value="1年-2年">1年-2年</option>
            <option value="2年-3年">2年-3年</option>
            <option value="3年以上">3年以上</option>
        </select>
    </span>
    <em ><img src="/Public/Static/Wap/images/ico_l.png"></em>
</dd>
<dd>
    <span>期望融资利率</span>
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
<?php include TMPL_PATH . 'Wap/Demand/footer.php' ?>