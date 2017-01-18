<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="author" content="evanxuyi@gmail"/>
    <title>FRONT - 富易当</title>
    <meta name="keywords" content="富易当"/>
    <meta name="description" content="富易当"/>
    <link href="/Public/Static/Home/css/public.css" type="text/css" rel="stylesheet"/>
    <script type="text/javascript" src="/Public/Static/Home/js/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
        var user_id = "<?php echo empty($head_user_info) ? "" : $head_user_info['id']; ?>";
    </script>
</head>
<body>

<div class="header_ob">
    <div class="header">
        <div class="header_con">
            <div class="logo_menu fl">
                <a class="m_logo" href="/" title="富易当首页">富易当</a>
                <ul class="m_menu">
                    <li><a href="<?php echo U("/Home/Shop/index"); ?>" <?php echo CONTROLLER_NAME == 'Shop' && ACTION_NAME == 'index' ? 'class="cur"' : ''; ?>>商城首页</a></li>
                    <li><a href="<?php echo U("/Home/Product/plist"); ?>" <?php echo CONTROLLER_NAME == 'Product' && ACTION_NAME == 'plist' ? 'class="cur"' : ''; ?>>全部商品</a></li>
                    <li><a href="<?php echo U("/Home/Shop/about"); ?>" <?php echo CONTROLLER_NAME == 'Shop' && ACTION_NAME == 'about' ? 'class="cur"' : '';?>>关于商城</a></li>
                    <li><a href="<?php echo U("/Home/Index/dang"); ?>" target="_blank">典当</a></li>
                </ul>
                <div class="shop_search fl">
                    <form name="formsearch" action="<?php echo U("Home/Product/search");?>">
                        <input name="product_keyword" type="text" value="<?php echo htmlspecialchars($_GET['product_keyword']);?>" class="s_keyword" id="s_keyword" placeholder="做最贴心的当铺" />
                        <a class="s_submit J_search_btn">搜索</a>
                    </form>
                </div>
            </div>
            <?php if (empty($head_user_info)) { ?>
                <!-- 未登录 -->
                <div class="login_menu fr">
                    <a class="u_login" href="<?php echo U("Home/User/login"); ?>">登录</a><a class="u_reg" href="<?php echo U("Home/User/register"); ?>">注册</a>
                </div>
            <?php } else { ?>
                <!-- 已登录 -->
                <div class="login_menu fr">
                    <a class="u_logout" href="<?php echo U("Home/User/loginOut"); ?>">退出</a>
                    <a class="user_name" href="<?php echo U("User/Index/index"); ?>" title="<?php echo $head_user_info['username'];?>"><?php echo $head_user_info['username']; ?></a>
                </div>
            <?php } ?>
            <div class="shop_menu fr">
                <a href="<?php echo U("Home/Cart/index");?>"><i class="iconfont">&#xe60a;</i><b>购物车</b><em><?php echo $cartQuantity ? $cartQuantity : "0";?></em></a>
            </div>
        </div>
    </div>
    <div class="header_bg"></div>
</div>
<!-- End of header -->