<!DOCTYPE html>
<html lang="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="author" content="me@evanxu"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"/>
    <title>提交业务</title>
    <link href="/Public/Static/Wap/css/css.css" type="text/css" rel="stylesheet"/>
    <script src="/Public/Static/Wap/js/swiper.min.js" type="text/javascript"></script>
    <script src="/Public/Static/Wap/js/zepto.min.js" type="text/javascript"></script>
    <script src="/Public/Static/Wap/js/base.js" type="text/javascript"></script>
</head>
<body>
<div class="alls">

    <div class="pic_por">
        <img src="/Public/Static/Wap/images/slide1.png" width="100%" height="100%">
    </div>
    <div class="formcons">
        <form action="<?php echo U("Wap/Demand/checkStep2");?>" method="POST">
            <p class="formT">请确保填写真实身份信息，否则无法通过</p>
            <input type="hidden" name="realname" value="<?php echo $request['realname'];?>">
            <input type="hidden" name="mobile" value="<?php echo $request['mobile'];?>">
            <input type="hidden" name="code" value="<?php echo $request['code'];?>">
            <dl class="u_con clearfix js-items">
                <dd>
                    <span>业务类别</span>
                    <span class="r sel">
                        <select name="typeid" class="js-i-type" autocomplete="off">
                            <option value="请选择">请选择</option>
                            <?php foreach ($types as $k=>$v) {?>
                                <option value="<?php echo $k;?>"><?php echo $v['name'];?></option>
                            <?php }?>
                        </select>
                    </span>
                    <em ><img src="/Public/Static/Wap/images/ico_l.png"></em>
                </dd>
                <dd>
                    <span>性别</span>
                    <span class="r sel">
                        <select name="sex">
                            <option value="请选择">请选择</option>
                            <option value="1">男</option>
                            <option value="0">女</option>
                        </select>
                    </span>
                    <em ><img src="/Public/Static/Wap/images/ico_l.png"></em>
                </dd>
                <dd class="js-i-areas">
                    <span>省市地区</span>
                    <span class="r sel">
                        <select class="cs js-i-province" name="province">
                            <option value="0">请选择</option>
                            <?php foreach ($province as $k=>$v) {?>
                            <option value="<?php echo $v['id'];?>" <?php echo $location['province']['id'] == $v['id'] ? "selected='selected'" : "";?>><?php echo $v['short_name'];?></option>
                            <?php }?>
                        </select>
                        <select class="cs js-i-city" name="city">
                            <option value="0">请选择</option>
                            <?php foreach ($citys as $k=>$v) {?>
                            <option value="<?php echo $v['id'];?>" <?php echo $location['city']['id'] == $v['id'] ? "selected='selected'" : "";?>><?php echo $v['short_name'];?></option>
                            <?php }?>
                        </select>
                        <select class="cs js-i-area" name="area">
                            <option value="0">请选择</option>
                        </select>
                    </span>
                    <em ><img src="/Public/Static/Wap/images/ico_l.png"></em>
                </dd>
                <dd>
                    <span>职业身份</span>
                    <span class="r sel">
                        <select name="profession">
                            <option value="请选择">请选择</option>
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
                    <span>投资金额</span>
                    <span class="r">
                        <input type="text" placeholder="0" name="amount" class="mone">
                    </span>
                    <em class="wzts">万元</em>
                </dd>
                <dd>
                    <span>投资期限</span>
                    <span class="r sel">
                        <select name="term">
                            <option value="请选择">请选择</option>
                            <option value="1个月以内">1个月以内</option>
                            <option value="1-3个月">1-3个月</option>
                            <option value="3-6个月">3-6个月</option>
                            <option value="6-12个月">6-12个月</option>
                            <option value="1年以上">1年以上</option>
                        </select>
                    </span>
                    <em ><img src="/Public/Static/Wap/images/ico_l.png"></em>
                </dd>
                <dd>
                    <span>期望利率</span>
                    <span class="r sel">
                        <select name="interest">
                            <option value="请选择">请选择</option>
                            <option value="年化5%以下">年化5%以下</option>
                            <option value="年化5-10%">年化5-10%</option>
                            <option value="年化10-15%">年化10-15%</option>
                            <option value="年化15%以上">年化15%以上</option>
                        </select>
                    </span>
                    <em ><img src="/Public/Static/Wap/images/ico_l.png"></em>
                </dd>
                <dd>
                    <span>常用邮箱</span>
                    <span class="r">
                        <input type="text" name="email" placeholder="请输入邮箱">
                    </span>
                </dd>
            </dl>
            <p class="bnt">
                <a href="javascript:void(0);" class="js-btn-step2">提交</a>
            </p>
        </form>
    </div>

</div>

<script>
    khm.use(['defaul'],function(d){});
    
    /*业务类别选择事件*/
    $(".js-i-type").bind("change", function(){
        var id = $(this).val();
        $.ajax({
            type: "GET",
            url: "<?php echo U('Wap/Demand/getHtmlByType');?>",
            data: {typeid:id},
            success: function(redata){
                if (redata.status > 0) {
                    removeNextAll($(".js-i-areas"));
                    $(".js-items").append(redata.html);
                }
            }
        });
    });
    
    /*删除同级以下的所有对象元素*/
    function removeNextAll(object){
        var next = object.next();
        if (next.length > 0) {
            next.remove();
            removeNextAll(object);
        }
    }
    
    $(".js-btn-step2").bind("click", function(){
        var form    = $(this).closest("form");
        var url     = "<?php echo U("Wap/Demand/checkStep2");?>";
        var method  = "POST";
        var data    = form.serialize();
        $.ajax({
            type: method,
            url: url,
            data: data,
            success: function(data){
                if (data.status > 0) {
                    alert(data.info);
                    window.location.href=data.url;
                } else {
                    alert(data.info);
                }
            }
        });
    });
    
    $(".js-i-province").bind("change", function(){
        var id = $(this).val();
        $.ajax({
            type: "get",
            url: "<?php echo U("Wap/Demand/getRegion");?>",
            data: {parentid:id},
            success: function(data){
                if (data.status > 0) {
                    $(".js-i-city").children().remove();
                    $(".js-i-city").append("<option value='0'>请选择</option>");
                    
                    $(".js-i-area").children().remove();
                    $(".js-i-area").append("<option value='0'>请选择</option>");  
                    $.each(data.region, function(i, n){
                        var html = "<option value='"+ n.id +"'>"+ n.short_name +"</option>";
                        $(".js-i-city").append(html);
                    });
                }
            }
        });
    });
    
    $(".js-i-city").bind("change", function(){
        var id = $(this).val();
        $.ajax({
            type: "get",
            url: "<?php echo U("Wap/Demand/getRegion");?>",
            data: {parentid:id},
            success: function(data){
                if (data.status > 0) {
                    $(".js-i-area").children().remove();
                    $(".js-i-area").append("<option value='0'>请选择</option>");                    
                    $.each(data.region, function(i, n){
                        var html = "<option value='"+ n.id +"'>"+ n.short_name +"</option>";
                        $(".js-i-area").append(html);
                    });
                }
            }
        });
    });
</script>
</body>
</html>