<!--资产管理-->
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
<p class="form_Itext js-i-parent">
    <label>有无房产</label>
    <select class="pgz" name="house">
        <option value="1">有</option>
        <option value="0">无</option>
    </select>
</p>
<p class="form_Itext  js-i-children">
    <label>房产评估价值:</label>
    <input class="i1" name="houseAmount" value=""  placeholder="房产评估价值（万元）">
    <em class="wzts">万元</em>
</p>
<p class="form_Itext  js-i-parent">
    <label>有无私家车</label>
    <select class="pgz" name="car">
        <option value="1">有</option>
        <option value="0">无</option>
    </select>
</p>
<p class="form_Itext js-i-children">
    <label>私家车评估价值:</label>
    <input class="i1" name="carAmount" value="" placeholder="私家车评估价值（万元）">
    <em class="wzts">万元</em>
</p>
<p class="form_Itext js-i-parent">
    <label>有无商业保险</label>
    <select class="pgz" name="insurance">
        <option value="1">有</option>
        <option value="0">无</option>
    </select>
</p>
<p class="form_Itext js-i-children">
    <label>商业保险评估价值:</label>
    <input class="i1" name="insuranceAmount" value="" placeholder="商业保险评估价值（万元）">
    <em class="wzts">万元</em>
</p>
<p class="form_Itext js-i-parent">
    <label>有无贷款</label>
    <select class="pgz" name="loan">
        <option value="1">有</option>
        <option value="0">无</option>
    </select>
</p>
<p class="form_Itext js-i-children">
    <label>贷款金额:</label>
    <input class="i1" name="loanAmount" value="" placeholder="贷款金额（万元）">
    <em class="wzts">万元</em>
</p>
<p class="form_Itext">
    <label>婚姻状况</label>
    <select name="marry">
        <option value="已婚">已婚</option>
        <option value="未婚">未婚</option>
    </select>
</p>

<p class="form_Itext">
    <label>您的资管需求</label>
    <input type="text" class="i1" name="note" value="" placeholder="例如我想投资、我想贷款等">
</p>
<p class="form_Itext">
    <label>常用邮箱</label>
    <input type="text" class="i1" name="email" value="" placeholder="xxxx@qq.com">
</p>