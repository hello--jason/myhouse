<?php include TMPL_PATH . 'Admin/header.php' ?>
    <div class="conter clearfix">
        <!--left-->
        <?php include TMPL_PATH . 'Admin/menu.php' ?>
        <!--right-->
        <div class="contRight">
            <div class="i_title">
                <a href="javascript:void(0);" class="refresh iconfont">&#xe60b;</a>
                <a href="<?php echo U("Admin/User/add");?>" class="addBnt qrhb"><var class="iconfont">&#xe60e;</var>添加</a>
                <form action="<?php echo U("Admin/User/index");?>" method="GET">
                    <div class="seach_tls">
                        <span class="laby">注册时间</span>
                        <input class="i1 time" type="text" name="beginTime" onfocus="WdatePicker()" value="<?php echo !empty($_GET['beginTime']) ? $_GET['beginTime'] : "";?>"/>
                        <span class="laby">-</span>
                        <input class="i1 time" type="text" name="endTime" onfocus="WdatePicker()" value="<?php echo !empty($_GET['endTime']) ? $_GET['endTime'] : "";?>"/>
                        <input class="bntSel iconfont" type="submit" value="&#xe60a;"/>
                    </div>
                </form>
                <form action="<?php echo U("Admin/User/index");?>" method="GET">
                    <div class="seach_tl">
                        <div class="drapDown selBtn">
                            <select name="type" style="margin-top: 3px;">
                                <option value="username" <?php echo !empty($_GET['type']) && $_GET['type'] == 'username' ? "selected='selected'" : "";?>>用户名</option>
                                <option value="mobile"   <?php echo !empty($_GET['type']) && $_GET['type'] == 'mobile' ? "selected='selected'" : "";?>>手机号</option>
                            </select>
                        </div>
                        <input class="i1" type="text" name="keyword" value="<?php echo !empty($_GET['keyword']) ? $_GET['keyword'] : "";?>"/>
                        <input class="bntSel iconfont" type="submit" value="&#xe60a;"/>
                    </div>
                </form>                
            </div>
            <div class="top_pms">
            </div>
            <div class="allCons">
                <table class="Tb_con" cellspacing="0" cellpadding="0" border="0" style="table-layout:fixed;">
                    <thead>
                        <tr>
                            <th>用户ID</th>
                            <th>手机号</th>
                            <th>用户名</th>
                            <th>性别</th>
                            <th>邮箱</th>
                            <th>注册时间</th>
                            <th>最后登录时间</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <?php if (!empty($users)) {?>
                            <?php foreach ($users as $k => $v) {?>
                                <tr>
                                    <td><?php echo $v['id'];?></td>
                                    <td><?php echo $v['mobile'];?></td>
                                    <td><?php echo $v['nickname'];?></td>
                                    <td><?php if ($v['sex'] == 0) { echo "--";} else if ($v['sex'] == 1) { echo "男";} else if ($v['sex'] == 2) { echo "女";}?></td>
                                    <td><?php echo empty($v['email']) ? "--" : $v['email'];?></td>
                                    <td><?php echo date("Y-m-d H:i:s", $v['addtime']);?></td>
                                    <td><?php echo empty($v['last_login_time']) ? "--" : date("Y-m-d H:i:s", $v['last_login_time']);?></td>
                                    <td class="czs">
                                        <a href="<?php echo U("Admin/User/edit", array("id"=>$v['id']));?>" class="qrhb">编辑</a>
                                    </td>
                                </tr>
                            <?php }?>
                        <?php } else {?>
                                <tr><td colspan="8">暂时还没有相关内容</td></tr>
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