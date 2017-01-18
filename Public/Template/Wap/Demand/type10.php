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
    <span>有无房产</span>
    <span class="r sel">
        <select class="pgz" name="house">
            <option value="1">有</option>
            <option value="0">无</option>
        </select>
    </span>
    <em ><img src="/Public/Static/Wap/images/ico_l.png"></em>
</dd>
<dd class="pgjz">
    <input  placeholder="房产评估价值（万元）" name="houseAmount" value="" class="mone">
    <em class="wzts">万元</em>
</dd>
<dd>
    <span>有无私家车</span>
    <span class="r sel">
        <select class="pgz" name="car">
            <option value="1">有</option>
            <option value="0">无</option>
        </select>
    </span>
    <em ><img src="/Public/Static/Wap/images/ico_l.png"></em>
</dd>
<dd class="pgjz">
    <input  placeholder="私家车评估价值（万元）" name="carAmount" value="" class="mone">
    <em class="wzts">万元</em>
</dd>
<dd>
    <span>有无商业保险</span>
    <span class="r sel">
        <select class="pgz" name="insurance">
            <option value="1">有</option>
            <option value="0">无</option>
        </select>
    </span>
    <em ><img src="/Public/Static/Wap/images/ico_l.png"></em>
</dd>
<dd class="pgjz">
    <input placeholder="商业保险评估价值（万元）" name="insuranceAmount" value="" class="mone">
    <em class="wzts">万元</em>
</dd>
<dd>
    <span>有无贷款</span>
    <span class="r sel">
        <select class="pgz" name="loan">
            <option value="1">有</option>
            <option value="0">无</option>
        </select>

    </span>
    <em ><img src="/Public/Static/Wap/images/ico_l.png"></em>
</dd>
<dd class="pgjz">
    <input type="number" placeholder="贷款金额（万元）" name="loanAmount" value="" class="mone">
    <em class="wzts">万元</em>
</dd>
<dd>
    <span>婚姻状况</span>
    <span class="r sel">
        <select name="marry">
            <option value="已婚">已婚</option>
            <option value="未婚">未婚</option>
        </select>
    </span>
    <em ><img src="/Public/Static/Wap/images/ico_l.png"></em>
</dd>

<dd>
    <span>您的资管需求</span>
    <span class="r">
        <input type="text" name="note" placeholder="例如我想投资、我想贷款等">
    </span>
</dd>
<?php include TMPL_PATH . 'Wap/Demand/footer.php' ?>
<script>
    $(".pgz").change(function(){
        var checkValue=$(this).val();
        if(checkValue==1)
        {
            $(this).parents("dd").next(".pgjz").show();
        }else{
            $(this).parents("dd").next(".pgjz").hide();
        }
    })
</script>