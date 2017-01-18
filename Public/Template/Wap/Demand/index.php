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
        <div class="all bgFFF">
            <div class="pic_por">
                <img src="/Public/Static/Wap/images/slide2.png" width="100%" height="100%">
            </div>
            <div class="formcon">
                <form action="<?php echo U("Wap/Demand/publish");?>" method="POST">
                    <p class="text_input">
                        <input type="text" name="realname" placeholder="请输入姓名">
                        <span  class="user"></span>
                    </p>
                    <p class="text_input">
                        <input type="text" name="mobile" class="mb" placeholder="请输入手机号">
                        <a href="javascript:void(0);" class="js-get-code">发送验证码</a>
                        <span  class="phone"></span>
                    </p>
                    <p class="text_input">
                        <input type="text" name="code" placeholder="请输入短信验证码">
                        <span  class="code"></span>
                    </p>
                    <p class="bnt">
                        <a href="javascript:;" class="js-btn-next">下一步</a>
                    </p>
                </form>
            </div>
            <div class="siblit">
                <span>
                    <i>
                        <img src="/Public/Static/Wap/images/s_01.png">
                    </i>
                    <var>
                        财富端
                    </var>
                </span>
                <span>
                    <i>
                        <img src="/Public/Static/Wap/images/s_02.png">
                    </i>
                    <var>
                        资产端
                    </var>
                </span>
                <span>
                    <i>
                        <img src="/Public/Static/Wap/images/s_03.png">
                    </i>
                    <var>
                        资管端
                    </var>
                </span>
            </div>
            <?php include TMPL_PATH . 'Wap/nav.php' ?>
        </div>

        <script>
            khm.use(['defaul'], function (d) {
                d.slide()
            });
            
            $(".js-btn-next").bind("click", function(){
                var form    = $(this).closest("form");
                var url     = "<?php echo U("Wap/Demand/checkStep1");?>";
                var method  = "POST";
                var data    = form.serialize();
                $.ajax({
                    type: method,
                    url: url,
                    data: data,
                    success: function(data){
                        if (data.status > 0) {
                            form.submit();
                        } else {
                            alert(data.info);
                        }
                    }
                });
            });
            
            $(".js-get-code").bind("click", function(){
                var mobile = $(this).prev("input").val();
                $.ajax({
                    type:"post",
                    url:"<?php echo U("Wap/Demand/getCode");?>",
                    data:{mobile:mobile},
                    success: function(data){
                        alert(data.info);
                    }
                });
            });
        </script>
    </body>
</html>