<!--财务咨询-->
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
    <label>公司名称:</label>
    <input type="text" class="i1" name="name" value="" />
</p>
<p class="form_Itext">
    <label>咨询类型:</label>
    <select name="zxtype">
        <option value="融资咨询">融资咨询</option>
        <option value="投资咨询">投资咨询</option>
        <option value="税务咨询">税务咨询</option>
        <option value="评估咨询">评估咨询</option>
        <option value="审计咨询">审计咨询</option>
        <option value="律师咨询">律师咨询</option>
        <option value="其他企业管理咨询及信息咨询">其他企业管理咨询及信息咨询</option>
    </select>
</p>
<p class="form_Itext">
    <label>咨询内容:</label>
    <input type="text" class="i1" name="content" value="" />
</p>