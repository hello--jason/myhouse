<!--上市辅导-->
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
    <span class="text">
        <input type="text" class="i1" name="name" value="" />
    </span>
</p>
<p class="form_Itext">
    <label>拟IPO市场:</label>
    <select name="ipo">
        <option value="上海">上海</option>
        <option value="深圳">深圳</option>
        <option value="新三板">新三板</option>
        <option value="四板">四板</option>
        <option value="海外">海外</option>
    </select>
</p>