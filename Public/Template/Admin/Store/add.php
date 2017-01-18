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
            <form action="<?php echo U("Admin/Store/add");?>" method="POST">
                <div class="form_con" style="display: block;">
                    <p class="form_Itext">
                        <label>门店名称：</label>
                        <input type="text" class="i3" name="name" />
                    </p>
                    <p class="form_Itext">
                        <label>门店地址：</label>
                        <input type="text" class="i3 js-i-address" name="address"/>
                    </p>
                    <p class="form_Itext">
                        <label>门店电话：</label>
                        <input type="text" class="i3" name="telephone"/>
                    </p>
                    <p class="form_Itext">
                        <label>经纬度：</label>
                        <input type="text" class="i3" name="position"/>
                        <a href="javascript:void(0);" class="js-get-position">查询经纬度</a>
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
    
    $(".js-get-position").bind("click", function(){
        var _this   = $(this);
        var position= "";
        var address = $(".js-i-address").val();
        if (address.length < 1) {
            alert("请先填写地址");
            return false;
        }
        $.ajax({
            type: "POST",
            url: "<?php echo U("Admin/Store/getLocation");?>",
            data: {address:address},
            success: function(data){
                position = data.location.lat +","+ data.location.lng;
                _this.prev("input").val(position);
            }
        });
    });
</script>
<?php include TMPL_PATH . 'Admin/footer.php' ?>