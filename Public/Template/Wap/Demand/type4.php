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
    <span>当品名称</span>
    <span class="r">
        <input type="text" placeholder="当品名称" name="name">
    </span>
</dd>
<dd>
    <span>当品描述</span>
    <span class="r">
        <input type="text" name="description" placeholder="请描述您的当品">
    </span>
</dd>
<dd>
    <span>典当金额</span>
    <span class="r">
        <input type="number" placeholder="0" name="amount" class="mone">
    </span>
    <em class="wzts">万元</em>
</dd>
<dd>
    <span>典当期限</span>
    <span class="r sel">
        <select name="term">
            <option value="0">请选择</option>
            <option value="5天">5天</option>
            <option value="15天">15天</option>
            <option value="1个月">1个月</option>
            <option value="2个月">2个月</option>
            <option value="3个月">3个月</option>
            <option value="4个月">4个月</option>
            <option value="5个月">5个月</option>
            <option value="6个月">6个月</option>
        </select>
    </span>
    <em ><img src="/Public/Static/Wap/images/ico_l.png"></em>
</dd>
<?php include TMPL_PATH . 'Wap/Demand/footer.php' ?>