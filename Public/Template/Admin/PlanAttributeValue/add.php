<?php include TMPL_PATH . 'Admin/header.php' ?>
<form action="<?php echo U('Admin/PlanAttributeValue/add');?>" method="post" class="definewidth m20" enctype="multipart/form-data">
    <h4>新建属性</h4>
    <table class="table table-bordered table-hover ">
        <tr>
            <td width="10%" >分类：</td>
            <td>
                <select name="categoryid" class="js-i-category">
                    <option value="0">请选择分类</option>
                    <?php foreach ($category as $k=>$v) {?>
                        <option value="<?php echo $v['id'];?>"><?php echo $v['name'];?></option>
                    <?php }?>
                </select>
            </td>
        </tr>
        <tr>
            <td width="10%" >属性：</td>
            <td>
                <select name="attributeid" class="js-i-attribute">
                    <option value="0">请选择属性</option>
                </select>
            </td>
        </tr>
        <tr>
            <td width="10%" >属性值名称：</td>
            <td><input type="text" name="value" value=""></td>
        </tr>
        <tr>
            <td class=""></td>
            <td>
                <button type="button" class="btn btn-primary js-sub-btn" type="button">提交</button> 
                &nbsp;&nbsp;
                <button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
            </td>
        </tr>
    </table>
</form>
<?php include TMPL_PATH . 'Admin/footer.php' ?>
<script type="text/javascript">
    $(".js-i-category").bind("change", function(){
        var _this       = $(this);
        var categoryid  = _this.val();
        
        $.ajax({
            type: "POST",
            url: "<?php echo U("Admin/PlanAttributeValue/getAttributeByCategory");?>",
            data: {categoryid:categoryid},
            success: function(rdata){
                $(".js-i-attribute").children().remove();
                var html  = "<option value='0'>请选择属性</option>";
                $.each(rdata, function(i,n){
                    html += "<option value='"+ n.id +"'>"+ n.name +"</option>";
                });
                $(".js-i-attribute").append(html);
            }
        });
    });
</script>