<?php include TMPL_PATH . 'Admin/header.php' ?>
    <div class="conter clearfix">
        <!--left-->
        <?php include TMPL_PATH . 'Admin/menu.php' ?>
        <!--right-->
        <div class="contRight">
            <div class="i_title">
                <a href="javascript:void(0);" class="refresh iconfont">&#xe60b;</a>
                <a href="<?php echo U("Admin/Manager/add");?>" class="addBnt qrhb"><var class="iconfont">&#xe60e;</var>添加管理员</a>
            </div>
            <div class="top_pms">
            </div>
            <div class="allCons">
                <table class="Tb_con" cellspacing="0" cellpadding="0" border="0" style="table-layout:fixed;">
                    <thead>
                        <tr>
                            <th style="width: 100px;">ID</th>
                            <th class="name">用户名</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <?php if (!empty($manager)) {?>
                            <?php foreach ($manager as $k => $v) {?>
                                <tr>
                                    <td class="name"><?php echo $v['id'];?></td>
                                    <td><?php echo $v['username'];?></td>
                                    <td class="czs">
                                        <a href="<?php echo U("Admin/Manager/edit", array("id"=>$v['id']));?>" class="qrhb">编辑</a>
                                        <a href="javascript:void(0);" class="del js-del-btn" data-url="<?php echo U("Admin/Manager/del", array("id"=>$v['id']));?>">删除</a>
                                    </td>
                                </tr>
                            <?php }?>
                        <?php } else {?>
                                <tr><td colspan="4">暂时还没有相关内容</td></tr>
                        <?php }?>
                    </tfoot>
                </table>

                <?php echo $pageHtml;?>
            </div>

        </div>
    </div>
    <script>

        khm.use(['defaul'], function (d) {
            d.init();
            d.sel();
        });

    </script>
<?php include TMPL_PATH . 'Admin/footer.php' ?>