<?php include TMPL_PATH . 'Admin/header.php' ?>
<form action="<?php echo U('Admin/PlanCategory/add');?>" method="post" class="definewidth m20" enctype="multipart/form-data">
    <h4>新建分类</h4>
    <table class="table table-bordered table-hover ">
        <tr>
            <td width="12%" >分类名称：</td>
            <td><input type="text" name="name" value=""></td>
        </tr>
        <tr>
            <td class="">描述：</td>
            <td><textarea name="content"></textarea></td>
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