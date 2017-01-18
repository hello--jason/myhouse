<?php include TMPL_PATH . 'Admin/header.php' ?>
<style>
    .order_a_tab{display: inline-block; width: 70px; height: 30px; border: 1px solid #999999; text-align: center; line-height: 30px;}
    .active{ color: #e6584d;}
</style>
<div class="definewidth m20">
    <a class="order_a_tab active" href="javascript:;">属性列表</a>
    <a class="order_a_tab" href="<?php echo U("Admin/PlanAttribute/add");?>">新建属性</a>    
</div>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
        <tr>
            <th>序号</th>
            <th>属性名称</th>
            <th>分类</th>
            <th>属性类型</th>
            <th>是否必填</th>
            <th>操作</th>
        </tr>
    </thead>
    <?php if (!empty($attribute)) {?>
        <?php foreach ($attribute as $k=>$v) {?>
            <tr>
                <td><?php echo $v['id'];?></td>
                <td><?php echo $v['name'];?></td>
                <td><?php echo $v['category_name'];?></td>
                <td><?php echo $v['type_name'];?></td>
                <td><?php echo $v['required'] == 1 ? "是" : "否";?></td>
                <td>
                    <?php if (in_array($v['typeid'], array(2,3))) {?>
                        <a href="<?php echo U("Admin/DangCategory/edit", array("id"=>$v['id']));?>">添加属性值</a>
                    <?php }?>
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