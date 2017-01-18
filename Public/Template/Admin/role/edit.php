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
        <div class="top_pms"></div>
        <div class="allCond">
            <form action="<?php echo U("Admin/Role/add");?>" method="POST">
                <div class="form_con" style="display: block;">
                    <p class="form_Itext">
                        <label>角色名称：</label>
                        <input type="text" class="i3" name="name" value="<?php echo $role['name'];?>"/>
                    </p>
                    <p class="form_Itext">
                        <label>角色权限：</label>
                        <div>
                            <table>
                                <?php foreach ($permission as $k=>$v) {?>
                                    <tr>
                                        <td><label><input type="checkbox" name="permission[]" value="<?php echo $v['controller']."_".$v['action']?>"><?php echo $v['name'];?></label></td>
                                    </tr>
                                    <?php foreach ($v['children'] as $kk=>$vv) {?>
                                        <tr>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="checkbox" name="permission[]"  value="<?php echo $vv['controller']."_".$vv['action']?>"><?php echo $vv['name'];?></label></td>
                                        </tr>                                        
                                        <tr>
                                            <?php foreach ($vv['children'] as $kkk=>$vvv) {?>
                                                <td>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <label><input type="checkbox" name="permission[]"  value="<?php echo $vvv['controller']."_".$vvv['action']?>"><?php echo $vvv['name'];?></label>
                                                </td>
                                            <?php }?>
                                        </tr>
                                    <?php }?>               
                                <?php }?>
                            </table>
                        </div>
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
            url: "<?php echo U("Admin/Role/getLocation");?>",
            data: {address:address},
            success: function(data){
                position = data.location.lat +","+ data.location.lng;
                _this.prev("input").val(position);
            }
        });
    });
</script>
<?php include TMPL_PATH . 'Admin/footer.php' ?>