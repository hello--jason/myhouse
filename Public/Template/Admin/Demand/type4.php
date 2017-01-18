<!--典当-->
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
<p class="form_Itext">
    <label>当品名称:</label>
    <span class="text">
        <input type="text" class="i1" name="name" value="" />
    </span>
</p>
<p class="form_Itext">
    <label>当品描述:</label>
    <span class="text">
        <input type="text" class="i1" name="description" value="" />
    </span>
</p>
<p class="form_Itext">
    <label>典当金额:</label>
    <span class="text">
        <input type="text" class="i1" name="amount" value="" />万元
    </span>
</p>
<p class="form_Itext">
    <label>典当期限:</label>
    <select name="term">
        <option value="5天">5天</option>
        <option value="15天">15天</option>
        <option value="1个月">1个月</option>
        <option value="2个月">2个月</option>
        <option value="3个月">3个月</option>
        <option value="4个月">4个月</option>
        <option value="5个月">5个月</option>
        <option value="6个月">6个月</option>
    </select>
</p>