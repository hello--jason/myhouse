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
            <form action="<?php echo U("Admin/Job/edit", array("id"=>$job['id']));?>" method="POST">
                <div class="form_con" style="display: block;">
                    <p class="form_Itext">
                        <label>岗位名称：</label>
                        <input type="text" class="i3" name="name" value="<?php echo $job['name'];?>"/>
                    </p>

                    <p class="form_Itext">
                        <label>招聘人数：</label>
                        <input type="text" class="i3" name="quantity" value="<?php echo $job['quantity'];?>"/>
                    </p>
                    <p class="form_textarea">
                        <label>岗位职责：</label>
                        <textarea placeholder="岗位职责" name="duties"><?php echo str_replace( "<br />", '', $job['duties']);?></textarea>
                    </p>
                    <p class="form_textarea">
                        <label>任职要求：</label>
                        <textarea placeholder="任职要求" name="demand"><?php echo str_replace( "<br />", '', $job['demand']);?></textarea>
                    </p>
                    <p class="form_Itext">
                        <label>工作地点：</label>
                        <input type="text" class="i3" name="address" value="<?php echo $job['address'];?>"/>
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