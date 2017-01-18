<?php include TMPL_PATH . 'Admin/header.php' ?>
<div class="conter clearfix">
    <!--left-->
    <?php include TMPL_PATH . 'Admin/menu.php' ?>
    <!--right-->
    <div class="contRight">
        <div class="i_title">
            <a href="javascript:void(0);" class="refresh iconfont">&#xe60b;</a>
            <a href="javascript:void(0);" class="addBnt js-btn-back">返回上一页</a>

        </div>
        <div class="top_pms">
        </div>
        <div class="allCond">
            <form action="<?php echo U("Admin/Manager/add");?>" method="POST">
                <div class="form_con" style="display: block;">
                    <p class="form_Itext">
                        <label>账号：</label>
                        <input type="text" class="i3" name="username" value=""/>
                    </p>
                    <p class="form_Itext">
                        <label>密码：</label>
                        <input type="text" class="i3" name="password"/>
                    </p>
                    <p class="bnt_Con">
                        <input type="button" class="btn js-sub-btn" value="提交">
                    </p>
                </div>
            </form>
        </div>

    </div>
</div>
<script>

    khm.use(['defaul'], function (d) {
        d.init();
        d.sel();
        d.hander('pjTab', 'form_con');
        d.publish();
    });

</script>
<?php include TMPL_PATH . 'Admin/footer.php' ?>