<?php include TMPL_PATH . 'Admin/header.php' ?>
    <div class="conter clearfix">
        <!--left-->
        <?php include TMPL_PATH . 'Admin/menu.php' ?>
        <!--right-->
        <div class="contRight">
            <div class="i_title">
                <a href="javascript:void(0);" class="refresh iconfont">&#xe60b;</a>
                <a href="<?php echo U("Admin/Operation/add");?>" class="addBnt qrhb"><var class="iconfont">&#xe60e;</var>添加</a>

                <div class="seach_tl">
                    <form action="<?php echo U("Admin/Operation/login")?>" method="GET">
                        <div class="drapDown selBtn">
                            <a class="dragA selCur" href="javascript:void(0)">用户名</a>
                        </div>
                        <input class="i1" name="keyword" type="text" value="<?php echo empty($_GET['keyword']) ? "" : $_GET['keyword'];?>">
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
                            <th style="width: 100px;">ID</th>
                            <th>用户</th>
                            <th>时间</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <?php if (!empty($results)) {?>
                            <?php foreach ($results as $k => $v) {?>
                                <tr>
                                    <td><?php echo $v['id'];?></td>
                                    <td><?php echo $v['admin_name'];?></td>
                                    <td><?php echo date("Y-m-d H:i:s", $v['addtime']);?></td>
                                    <td>登录</td>
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