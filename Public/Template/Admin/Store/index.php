<?php include TMPL_PATH . 'Admin/header.php' ?>
    <div class="conter clearfix">
        <!--left-->
        <?php include TMPL_PATH . 'Admin/menu.php' ?>
        <!--right-->
        <div class="contRight">
            <div class="i_title">
                <a href="javascript:void(0);" class="refresh iconfont">&#xe60b;</a>
                <a href="<?php echo U("Admin/Store/add");?>" class="addBnt qrhb"><var class="iconfont">&#xe60e;</var>添加</a>

                <div class="seach_tl">
                    <form action="<?php echo U("Admin/Store/index")?>" method="GET">
                        <div class="drapDown selBtn">
                            <a class="dragA selCur"  href="javascript:void(0)">门店名称</a>
                        </div>
                        <input class="i1" name='keyword' type="text" value="<?php echo empty($_GET['keyword']) ? "" : $_GET['keyword'];?>">
                        <input class="bntSel iconfont" type="submit" value="&#xe60a;">
                    </form>
                </div>
            </div>
            <div class="top_pms">
            </div>
            <div class="allCons">
                <table class="Tb_con" cellspacing="0" cellpadding="0" border="0" style="table-layout:fixed;">
                    <thead>
                        <tr>
                            <th class="name">门店名称</th>
                            <th>门店地址</th>
                            <th>门店电话</th>
                            <th>经纬度</th>
                            <th>时间</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <?php if (!empty($stores)) {?>
                            <?php foreach ($stores as $k => $v) {?>
                                <tr>
                                    <td class="name"><?php echo $v['name'];?></td>
                                    <td><?php echo $v['address'];?></td>
                                    <td><?php echo $v['telephone'];?></td>
                                    <td><?php echo $v['position'];?></td>
                                    <td><?php echo date("Y-m-d H:i:s", $v['addtime']);?></td>
                                    <td class="czs">
                                        <a href="<?php echo U("Admin/Store/edit", array("id"=>$v['id']));?>" class="qrhb">编辑</a>
                                        <a href="javascript:void(0);" class="del js-del-btn" data-url="<?php echo U("Admin/Store/del", array("id"=>$v['id']));?>">删除</a>
                                    </td>
                                </tr>
                            <?php }?>
                        <?php } else {?>
                                <tr><td colspan="6">暂时还没有相关内容</td></tr>
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