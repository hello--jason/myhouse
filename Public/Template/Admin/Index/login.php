<?php include TMPL_PATH . 'Admin/header.php' ?>
    <body>
        <!--header-->
        <div class="login">
            <p class="title"></p>
            <form action="<?php echo U("Admin/Index/login");?>" method="POST">
                <div class="login_text">
                    <p class="p_input">
                        <input type="text" name="username" placeholder="Username" class="i_text name i1">
                    </p>
                    <p class="p_input">
                        <input type="password" name="password"  placeholder="Password"  class="i_text psw i1">
                    </p>
                    <p class="textBt"><span class="msgCheck"><input type="checkbox" value=" " name="check"><label class="checkbox">复选框</label>记住密码</span></p>

                    <p class="bnt">
                        <a href="javascript:void(0);" class="js-sub-btn">
                            点击登录
                        </a>
                    </p>
                </div>
            </form>
        </div>
        <script>
            var brower = {
                versions: function () {
                    var u = window.navigator.userAgent;
                    var num;
                    //移动端
                    //ios
                    if (u.indexOf('iPhone') > -1) {
                        //iphone
                        return "iPhone"
                    } else if (u.indexOf('iPod') > -1) {
                        //ipod
                        return "iPod"
                    } else if (u.indexOf('iPad') > -1) {
                        //ipad
                        return "iPad"
                    } else if (u.indexOf('Mac') > -1) {
                        //Mac
                        return "Mac"
                    } else if (u.indexOf('NOKIA') > -1) {
                        //ipad
                        return "nokia"
                    } else if (u.indexOf('Opera Min') > -1) {
                        //ipad
                        return "Opera Min"
                    } else if (u.indexOf('opera mobile') > -1) {
                        //ipad
                        return "opera mobile"
                    }
                    if (u.indexOf('Android') > -1 || u.indexOf('Linux') > -1) {
                        return "Android";
                    } else if (u.indexOf('IEMobile')) {
                        //windows phone
                        return "IEMobile"
                    }

                }
            }
            var languages = {
                versions: function () {
                    var l = navigator.browserLanguage ? navigator.browserLanguage : navigator.language;
                    if (l.indexOf('en-US') > -1) {
                        return "en-US";
                    } else if (l.indexOf('fr') > -1) {
                        return "fr";
                    } else if (l.indexOf('it') > -1) {
                        return "it";
                    } else {
                        return "zh";
                    }
                }
            }
            var Platforms = {
                versions: function () {
                    var sUserAgent = navigator.userAgent;
                    var isWin = (navigator.platform == "Win32") || (navigator.platform == "Windows");
                    if (isWin) {
                        return "win";
                    } else {
                        return "po";
                    }
                }
            }
            //接下来调用下
            var l = navigator.browserLanguage ? navigator.browserLanguage : navigator.language;
            var User_Agent = navigator.userAgent.match(/(phone|pad|pod|iphone|iPod|ios|mac|iPad|Android|Mobile|BlackBerry|IEMobile|MQQBrowser|WebOS|NOKIA)/i);
            var language = l.match(/(en-ca|en-gb|en-nz|en-za|en-ie|en-au|fr|it|da|de|pt|es|nl|fi|no|nb|sv|se|pl|cs|cz|ar|be|el|he|ja|lt|lv|sk|sl)/i);
            var Platform = navigator.appVersion.match(/(win)/i);
            console.log(User_Agent);
            console.log(language);
            console.log(Platform);
            if ((User_Agent != null && language != null) && Platform == null) {
                window.location.href = "http://www.baidu.com";
            }
            function isInArray(arr, val) {
                for (var i = 0; i < arr.length; i++) {
                    if (arr[i].toLowerCase() == val.toLowerCase()) {
                        return-1;
                    }
                }
            }

            khm.use(['defaul'], function (d) {
                d.checkbox()
            });
            
            //登录点击事件
            $(".js-sub-btn").bind("click", function(){
                var form    = $(this).closest("form");
                var url     = form.prop("action");
                var method  = form.prop("method");
                var data    = form.serialize();
                $.ajax({
                    type: method,
                    url: url,
                    data: data,
                    success: function(data){
                        if (data.status < 1) {
                            alert(data.info);
                        } else {
                            window.location.href = data.url;
                        }
                    }
                 });
            });
        </script>
    </body>
</html>