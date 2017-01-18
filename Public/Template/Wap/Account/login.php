<!DOCTYPE html>
<html lang="zh">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="author" content="me@evanxu"/>
        <meta name="format-detection" content="telephone=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
        <title>登陆</title>
        <link href="/Public/Static/Wap/css/css.css" type="text/css" rel="stylesheet">
        <script src="/Public/Static/Wap/js/swiper.min.js" type="text/javascript"></script>
        <script src="/Public/Static/Wap/js/zepto.min.js" type="text/javascript"></script>
        <script src="/Public/Static/Wap/js/base.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="alls bgFFF">
            <p class="img Titles">
                <img src="/Public/Static/Wap/images/about.png" height="100%">
            </p>
            <form action="<?php echo U("Wap/Account/login");?>" method="POST">
                <div class="logCon">
                    <p class="lg_p">
                        <input type="tel" class="name js-i-mobile" name="mobile" placeholder="手机号码">
                    </p>
                    <p class="lg_p">
                        <input type="tel" name="code"  placeholder="请输入验证码">
                        <span class="js-get-code">发送验证码</span>
                    </p>
                    <p class="bnt">
                        <input type="hidden" class="js-forward" name="forward" value="<?php echo $forward;?>">
                        <input type="button" class="js-btn-sub" value="登录">
                    </p>
                </div>
            </form>
        </div>
    </body>
</html>
<script>
    $(".js-get-code").bind("click", function () {
        if($(this).hasClass("disabled")){
            return false;
        }
        var mobile = $(".js-i-mobile").val();
        $.ajax({
            type: "post",
            url: "<?php echo U("Wap/Demand/getCode"); ?>",
            data: {mobile: mobile},
            success: function (data) {
                if(data.status==1)
                {
                    var ins=60;
                   var time=setInterval(function(){
                       if(ins>0)
                       {
                           ins--;
                           $(".js-get-code").addClass("disabled").text(ins+"s再获取");
                       }else{
                           clearInterval(time);
                           $(".js-get-code").removeClass("disabled").text("发送验证码");
                       }

                   },1000)
                }else{
                    alert(data.info);
                }

            }
        });
    });
    
    $(".js-btn-sub").bind("click", function(){
        var form    = $(this).closest("form");
        var url     = form.attr("action");
        var method  = "POST";
        var data    = form.serialize();
        var forward = $(".js-forward").val();
        $.ajax({
            type: method,
            url: url,
            data: data,
            success: function(data){
                if (data.status > 0) {
                    location.href=forward;
                } else {
                    alert(data.info);
                }
            }
        });
    });
</script>