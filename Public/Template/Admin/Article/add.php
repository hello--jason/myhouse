<?php include TMPL_PATH . 'Admin/header.php' ?>
<script type="text/javascript" src="/Public/Ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/Public/Ueditor/ueditor.all.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Ueditor/lang/zh-cn/zh-cn.js"></script>
<div class="conter clearfix">
    <!--left-->
    <?php include TMPL_PATH . 'Admin/menu.php' ?>
    <!--right-->
    <div class="contRight">
        <div class="i_title">
            <a href="javascript:void(0);" class="refresh iconfont">&#xe60b;</a>
            <a href="javascript:void(0);" class="addBnt qrhb js-btn-back"><var class="iconfont">&#xe60e;</var>返回上一页</a>
        </div>
        <div class="top_pms">
        </div>
        <div class="allCond">
            <form action="<?php echo U("Admin/Article/add"); ?>" method="POST">
                <div class="form_con" style="display: block;">
                    <p class="form_Itext">
                        <label>文章标题：</label>
                        <input type="text" class="i3" name="title" />
                    </p>
                    <div class="form_textarea clearfix">
                        <label>内容：</label>
                        <div class="textCon"><script id="container" name="content" type="text/plain" style="width:700px;height:400px;"></script></div>
                    </div>
                    <p class="form_Itext">
                        <label>位置：</label>
                        <select name="categoryid">
                            <?php foreach ($categories as $k=>$v) {?>
                            <option value="<?php echo $k;?>"><?php echo $v;?></option>
                            <?php }?>
                        </select>
                    </p>
                    <div class="form_Itext clearfix form_check">
                        <label>状态：</label>
                        <p class="checks">
                            <label class="check">
                                <input type="radio" name="display" value="1" checked="checked"/> 开启
                            </label>
                            <label class="check">
                                <input type="radio" name="display" value="0"/> 关闭
                            </label>
                            </label>
                        </p>
                    </div>
                    <p class="bnt_Con">
                        <input type="button" class="btn js-sub-btn" value="提交">
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    var ue = UE.getEditor('container');

    khm.use(['defaul'], function (d) {
        d.init();
        d.sel();
        d.hander('pjTab', 'form_con');
        d.publish();
    });
</script>
<?php include TMPL_PATH . 'Admin/footer.php' ?>