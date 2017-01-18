<?php include TMPL_PATH . 'Admin/header.php' ?>
<form action="<?php echo U('Admin/PlanAttribute/add');?>" method="post" class="definewidth m20" enctype="multipart/form-data">
    <h4>新建属性</h4>
    <table class="table table-bordered table-hover ">
        <tr>
            <td width="10%" >分类：</td>
            <td>
                <select name="categoryid">
                    <option value="0">请选择分类</option>
                    <?php foreach ($category as $k=>$v) {?>
                        <option value="<?php echo $v['id'];?>"><?php echo $v['name'];?></option>
                    <?php }?>
                </select>
            </td>
        </tr>
        <tr>
            <td width="10%" >属性名称：</td>
            <td><input type="text" name="name" value=""></td>
        </tr>
        <tr>
            <td width="10%" >属性类型：</td>
            <td>
                <select name="typeid">
                    <option value="0">请选择属性类型</option>
                    <option value="1">文本</option>
                    <option value="2">单选</option>
                    <option value="3">多选</option>
                    <option value="4">富文本</option>
                </select>
            </td>
        </tr>
        <tr>
            <td width="10%" >是否必填：</td>
            <td>
                <label><input type="radio" name="required" checked="checked" value="1">是</label>
                <label><input type="radio" name="required" value="0">否</label>
            </td>
        </tr>
        <tr>
            <td width="10%" >属性提示：</td>
            <td><input type="text" name="hint" value=""></td>
        </tr>
        <tr>
            <td class="">排序：</td>
            <td><input type="text" name="sort" value=""/></td>
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