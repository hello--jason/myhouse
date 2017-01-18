<!DOCTYPE html>
<html lang="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="author" content="me@evanxu"/>
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <title>用户信息</title>
    <link href="/Public/Static/Wap/css/css.css" type="text/css" rel="stylesheet">
    <script src="/Public/Static/Wap/js/swiper.min.js" type="text/javascript"></script>
    <script src="/Public/Static/Wap/js/zepto.min.js" type="text/javascript"></script>
    <script src="/Public/Static/Wap/js/base.js" type="text/javascript"></script>
</head>
<body>
<div class="all">

    <dl class="u_con clearfix">
        <dd class="img">
            <span>头像</span>
            <span class="toux"><img src="<?php echo empty($user['image']) ? "/Public/Static/Wap/images/mrtx.png" : $user['image'];?>" id="aad" width="100%" height="100%" class="js_upload_image"></span>
        </dd>
        <dd><span>账号昵称</span><span class="r" id="name"><?php echo $user['nickname'];?></span> <em><img src="/Public/Static/Wap/images/ico_l.png"></em></dd>
        <dd>
            <span>性别</span>
                <span class="r sel">
                    <select class="user js-i-sex" name="sex">
                        <option value="0">请选择</option>
                        <option value="1" <?php echo $user['sex'] == 1 ? "selected='selected'" : ""; ?>>男</option>
                        <option value="2" <?php echo $user['sex'] == 2 ? "selected='selected'" : ""; ?>>女</option>
                    </select>
                </span>
            <em><img src="/Public/Static/Wap/images/ico_l.png"></em>
        </dd>
        <dd><span>邮箱</span><span class="r" id="email"><?php echo $user['email'];?></span> <em><img src="/Public/Static/Wap/images/ico_l.png"></em></dd>

    </dl>
    <dl class="u_con clearfix">
        <dd><span>手机号码</span><span class="r" id="name"><?php echo $user['mobile'];?></span></dd>
        
    </dl>
    <p class="tcdl">
        <a href="<?php echo U("Wap/Account/loginOut");?>">退出登录</a>
    </p>
</div>
<div class="share_maskyer"></div>
<div class="pop" id="edot" >
    <form action="<?php echo U("Wap/Account/updateInfo");?>" method="post">
        <h3>修改昵称</h3>
        <p class="p_text">
            <input type="text" name="nickname" maxlength="10" value="<?php echo $user['nickname'];?>">
        </p>
        <p class="bnt">
            <a href="javascript:void(0);" class="popClose">取消</a>
            <input type="button" class="del js-btn-sub"  value="提交">
        </p>
    </form>
</div>
<div class="pop" id="emailP" >
    <form action="<?php echo U("Wap/Account/updateInfo");?>" method="post">
        <h3>修改邮箱</h3>
        <p class="p_text">
            <input type="text" name="email" value="<?php echo $user['email'];?>">
        </p>
        <p class="bnt">
            <a href="javascript:void(0);" class="popClose">取消</a>
            <input type="button" class="del js-btn-sub" value="提交">
        </p>
    </form>
</div>
<form method="post" id="upload_from" action="<?php echo U("Wap/Account/uploadIcon");?>" style="display: none;" target="ifram_upload" enctype="multipart/form-data">
    <input  type="file" class="js_file_input" name="image" />
</form>
<iframe name="ifram_upload" src="" frameborder="0" height="0" width="0" marginheight="0" marginwidth="0"></iframe>
<script>
    khm.use(['defaul'],function(d){d.slide();d.names();});    
    $(".js-btn-sub").bind("click", function(){
        var form    = $(this).closest("form");
        var url     = form.attr("action");
        var method  = "POST";
        var data    = form.serialize();
        $.ajax({
            type: method,
            url: url,
            data: data,
            success: function(data){
                if (data.status > 0) {
                    location.reload();
                } else {
                    alert(data.info);
                }
            }
        });
    });
    
    $(".js-i-sex").bind("change", function(){
       var url = "<?php echo U("Wap/Account/updateInfo");?>"; 
       var sex = $(this).val();
       $.ajax({
            type: "POST",
            url: url,
            data: {sex:sex},
            success: function(data){
                if (data.status > 0) {
                    location.reload();
                } else {
                    alert(data.info);
                }
            }
        });
    });
    
    $(".js_upload_image").bind("click", function (){
        $(".js_file_input").val("");
        $(".js_file_input").click();
    });
    
    $(".js_file_input").bind("change", function(){
        $("#upload_from").submit();
    });
    
    function upload_callback(status, message, image){
        if (status < 1) {
            alert(message);
        } else {
            $(".js_upload_image").prop("src", image);
        }
    }
</script>
</body>
</html>