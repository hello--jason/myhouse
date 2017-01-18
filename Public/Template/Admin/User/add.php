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
            <form action="<?php echo U("Admin/User/add");?>" method="POST">
                <div class="form_con" style="display: block;">
                    <p class="form_Itext">
                        <label>头像：</label>
                        <img src="/Public/Static/Admin/images/upload_img_back.png" class="js_upload_image" width="150" height="150">
                        <input type="hidden" class="i3 js_image_val" name="image" value=""/>
                    </p>

                    <p class="form_Itext">
                        <label>用户名：</label>
                        <input type="text" class="i3" name="nickname"/>
                    </p>
                    <p class="form_Itext">
                        <label>性别：</label>
                        <select name="sex">
                            <option value="0">请选择</option>
                            <option value="1">男</option>
                            <option value="2">女</option>
                        </select>
                    </p>
                    <p class="form_Itext">
                        <label>手机号：</label>
                        <input type="text" class="i3" name="mobile"/>
                    </p>
                    <p class="form_Itext">
                        <label>Email：</label>
                        <input type="text" class="i3" name="email"/>
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

<form method="post" id="upload_from" action="<?php echo U("Admin/User/icon");?>" style="display: none;" target="ifram_upload" enctype="multipart/form-data">
    <input  type="file" class="js_file_input" name="image" />
</form>
<iframe name="ifram_upload" src="" frameborder="0" height="0" width="0" marginheight="0" marginwidth="0"></iframe>
<?php include TMPL_PATH . 'Admin/footer.php' ?>
<script type="text/javascript">
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
            $(".js_image_val").val(image);
        }
    }
</script>