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
        <div class="top_pms"></div>
        <div class="allCond">
            <form action="<?php echo U("Admin/Demand/publish");?>" method="POST">
                <div class="form_con js-items" style="display: block;">
                    <p class="form_Itext">
                        <label>业务类型：</label>
                        <select name="typeid" class="js-i-type" autocomplete="off">
                            <?php foreach ($categories as $k=>$v) {?>
                                <option value="<?php echo $k;?>"><?php echo $v['name'];?></option>
                            <?php }?>
                        </select>
                    </p>
                    <p class="form_Itext js-i-mobile">
                        <label>手机号码：</label>
                        <input type="text" class="i1" name="mobile"/>
                    </p>
                    <p class="form_Itext">
                        <label>项目名称</label>
                        <input type="text"  name="name" class="mone i1">
                    </p>
                    <p class="form_Itext">
                        <label>投资金额</label>
                        <input type="text" placeholder="0" name="amount" class="mone i1">
                        <em class="wzts">元</em>
                    </p>
                </div>
                <div class="form_con" style="display: block;" style="padding-top: 0;">
                    <p class="bnt_Con" style="padding-top: 0;">
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
    
    
    /*业务类别选择事件*/
    $(".js-i-type").bind("change", function(){
        var id = $(this).val();
        
        $.ajax({
            type: "GET",
            url: "<?php echo U('Admin/Demand/getHtmlByType');?>",
            data: {typeid:id},
            success: function(redata){
                if (redata.status > 0) {
                    removeNextAll($(".js-i-mobile"));
                    $(".js-items").append(redata.html);
                }
            }
        });
    });
    
    /*删除同级以下的所有对象元素*/
    function removeNextAll(object){
        var next = object.next();
        if (next.length > 0) {
            next.remove();
            removeNextAll(object);
        }
    }
    
    
    //$("select").delegate(".js-i-province", "change", function(){
    $(".js-i-province").live("change", function(){
        var id = $(this).val();
        $.ajax({
            type: "get",
            url: "<?php echo U("Admin/Demand/getRegion");?>",
            data: {parentid:id},
            success: function(data){
                if (data.status > 0) {
                    $(".js-i-city").children().remove();
                    $(".js-i-city").append("<option value='0'>请选择</option>");
                    
                    $(".js-i-area").children().remove();
                    $(".js-i-area").append("<option value='0'>请选择</option>");  
                    $.each(data.region, function(i, n){
                        var html = "<option value='"+ n.id +"'>"+ n.short_name +"</option>";
                        $(".js-i-city").append(html);
                    });
                }
            }
        });
    });
    
    //$(".js-i-areas").delegate(".js-i-city", "change", function(){
    $(".js-i-city").live("change", function(){
        var id = $(this).val();
        $.ajax({
            type: "get",
            url: "<?php echo U("Admin/Demand/getRegion");?>",
            data: {parentid:id},
            success: function(data){
                if (data.status > 0) {
                    $(".js-i-area").children().remove();
                    $(".js-i-area").append("<option value='0'>请选择</option>");                    
                    $.each(data.region, function(i, n){
                        var html = "<option value='"+ n.id +"'>"+ n.short_name +"</option>";
                        $(".js-i-area").append(html);
                    });
                }
            }
        });
    });
</script>
<?php include TMPL_PATH . 'Admin/footer.php' ?>