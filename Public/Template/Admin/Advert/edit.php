<?php include TMPL_PATH . 'Admin/header.php' ?>
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
                <form action="<?php echo U("Admin/Advert/edit", array("id"=>$advert['id']));?>" method="POST">
                    <div class="form_con" style="display: block;">
                        <p class="form_Itext">
                            <label>广告位置：</label>
                            <input type="text" class="i3" name="position" value="<?php echo $advert['position'];?>" />
                        </p>
                        <p class="form_Itext">
                            <label>活动标题：</label>
                            <input type="text" class="i3" name="title" value="<?php echo $advert['title'];?>" />
                        </p>                        
                        <p class="form_Itext">
                            <label>关键词：</label>
                            <input type="text" class="i3" name="keyword" value="<?php echo $advert['keyword'];?>" />
                        </p>
                        <p class="form_Itext">
                            <label>url：</label>
                            <input type="text" class="i3" name="website" value="<?php echo $advert['website'];?>" />
                        </p>
                        <p class="form_Itext">
                            <label>电脑端图片：</label>
                            <img src="<?php echo !empty($advert['image']) ? $advert['image'] : '/Public/Static/Admin/images/upload_img_back.png'; ?>" class="js_upload_image" id="js_image1" width="200" height="200"/>
                            <input type="hidden" name="image" class="i3" />
                            <font color="blue">图片已经存在，修改则重新上传</font>  图片尺寸170×250
                        </p>
                        <p class="form_Itext">
                            <label>手机端图片：</label>
                            <img src="<?php echo !empty($advert['image']) ? $advert['image_mobile'] : '/Public/Static/Admin/images/upload_img_back.png'; ?>" class="js_upload_image" id="js_image2" width="200" height="200"/>
                            <input type="hidden" name="image_mobile" class="i3" />
                            <font color="blue">图片已经存在，修改则重新上传</font>  图片尺寸170×250
                        </p>
                        <div class="form_Itext clearfix form_check">
                            <label>显示：</label>
                            <p class="checks">
                                <label class="check">
                                    <input type="radio" name="display" value="1" <?php echo $advert['display'] ? "checked='checked'" : "";?>/> 是
                                </label>
                                <label class="check">
                                    <input type="radio" name="display" value="0" <?php echo $advert['display'] == 0 ? "checked='checked'" : "";?>/> 否
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
        khm.use(['defaul'], function (d) {
            d.init();
            d.sel();
            d.hander('pjTab', 'form_con');
            d.publish();
        });
    </script>
<?php include TMPL_PATH . 'Admin/footer.php' ?>
<form method="post" id="upload_from" action="<?php echo U("Admin/Advert/upload");?>" style="display: none;" target="ifram_upload" enctype="multipart/form-data">
    <input  type="file" class="js_file_input" name="image" />
    <input  type="hidden" class="js_object_flag" name="object_flag" value=''/>
</form>
<iframe name="ifram_upload" src="" frameborder="0" height="0" width="0" marginheight="0" marginwidth="0"></iframe>
<script type="text/javascript">
    $(".js_upload_image").bind("click", function (){
        var id = $(this).prop("id");
        $(".js_object_flag").val(id);
        $(".js_file_input").val("");
        $(".js_file_input").click();
    });
    
    $(".js_file_input").bind("change", function(){
        $("#upload_from").submit();
    });
    
    function upload_callback(status, message, object_flag){
        if (status < 1) {
            alert(message);
        } else {
            $("#"+object_flag+"").prop("src", message);
            $("#"+object_flag+"").next("input").val(message);
        }
    }
</script>