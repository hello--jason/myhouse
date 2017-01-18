<?php include TMPL_PATH . 'Wap/Demand/header.php' ?>
<dd>
    <span>公司名称</span>
    <span class="r">
        <input type="text" name="name" placeholder="公司名称">
    </span>
</dd>
<dd>
    <span>拟IPO市场</span>
    <span class="r sel">
        <select name="ipo">
            <option value="0">请选择</option>
            <option value="上海">上海</option>
            <option value="深圳">深圳</option>
            <option value="新三板">新三板</option>
            <option value="四板">四板</option>
            <option value="海外">海外</option>
        </select>
    </span>
    <em ><img src="/Public/Static/Wap/images/ico_l.png"></em>
</dd>
<?php include TMPL_PATH . 'Wap/Demand/footer.php' ?>