<?php include TMPL_PATH . 'Wap/Demand/header.php' ?>
<dd>
    <span>公司名称</span>
    <span class="r">
        <input type="text" placeholder="公司名称" name="name">
    </span>
</dd>
<dd>
    <span>咨询类型:</span>
    <span class="r sel">
        <select name="zxtype">
            <option value="融资咨询">融资咨询</option>
            <option value="投资咨询">投资咨询</option>
            <option value="税务咨询">税务咨询</option>
            <option value="评估咨询">评估咨询</option>
            <option value="审计咨询">审计咨询</option>
            <option value="律师咨询">律师咨询</option>
            <option value="其他企业管理咨询及信息咨询">其他企业管理咨询及信息咨询</option>
        </select>
    </span>
    <em ><img src="/Public/Static/Wap/images/ico_l.png"></em>
</dd>
<dd>
    <span>咨询内容:</span>
    <span class="r">
        <input type="text" class="i1" name="content" value="" />
    </span>
</dd>
<?php include TMPL_PATH . 'Wap/Demand/footer.php' ?>