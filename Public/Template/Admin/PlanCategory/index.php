<?php include TMPL_PATH . 'Admin/header.php' ?>
<style>
    .order_a_tab{display: inline-block; width: 70px; height: 30px; border: 1px solid #999999; text-align: center; line-height: 30px;}
    .active{ color: #e6584d;}
</style>
<div class="definewidth m20">
    <a class="order_a_tab active" href="javascript:;">分类列表</a>
    <a class="order_a_tab" href="<?php echo U("Admin/PlanCategory/add");?>">新建分类</a>    
</div>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
        <tr>
            <th>序号</th>
            <th>分类名称</th>
            <th>描述</th>
            <th>排序</th>
            <th>操作</th>
        </tr>
    </thead>
    <?php if (!empty($category)) {?>
        <?php foreach ($category as $k=>$v) {?>
            <tr>
                <td><?php echo $v['id'];?></td>
                <td><?php for ($i=1; $i < $v['level']; $i++) { echo "&nbsp;&nbsp;&nbsp;&nbsp;";} ?><?php echo $v['name'];?></td>
                <td><?php echo $v['content'];?></td>
                <td><?php echo $v['sort'];?></td>
                <td>
                    <a href="<?php echo U("Admin/DangCategory/edit", array("id"=>$v['id']));?>">编辑</a>
                    <button class="btn btn-danger js-del-btn" data-url="<?php echo U("Admin/DangCategory/del", array("id"=>$v['id']));?>">删除</button>
                </td>
            </tr>
        <?php }?> 
    <?php } else {?>
        <tr>
            <td colspan="5" style="text-align: center;">暂时还没有相关记录</td>
        </tr>
    <?php }?>
</table>
<div class="inline pull-right page"><?php echo $showPage;?></div>
<?php include TMPL_PATH . 'Admin/footer.php' ?>