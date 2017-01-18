<?php include TMPL_PATH . 'Wap/Demand/header.php' ?>
<dd>
    <span>项目名称</span>
    <span class="r">
        <input type="text" placeholder="项目名称" name="name">
    </span>
</dd>
<dd>
    <span>项目描述</span>
    <span class="r">
        <input type="text" placeholder="简单介绍下你的项目吧" name="description">
    </span>
</dd>
<dd>
    <span>众筹金额</span>
    <span class="r">
        <input type="number" placeholder="0" name="amount" class="mone">
    </span>
    <em class="wzts">元</em>
</dd>
<dd>
    <span>众筹期限</span>
    <span class="r sel">
        <select name="term">
            <option value="0">请选择</option>
            <option value="1个月以内">1个月以内</option>
            <option value="1-3个月">1-3个月</option>
        </select>
    </span>
    <em ><img src="/Public/Static/Wap/images/ico_l.png"></em>
</dd>
<?php include TMPL_PATH . 'Wap/Demand/footer.php' ?>