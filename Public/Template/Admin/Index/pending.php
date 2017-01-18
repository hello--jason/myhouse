<?php include TMPL_PATH . 'Admin/header.php' ?>
<div class="conter clearfix">
    <!--left-->
    <?php include TMPL_PATH . 'Admin/menu.php' ?>
    <!--right-->
    <div class="contRight">
        <div class="i_title">
            <form action="<?php echo U("Admin/Index/pending");?>" method="GET">
                <a href="javascript:void(0);" class="refresh iconfont">&#xe60b;</a>
                <select name="typeid" id="pay_status" class="form-control">
                    <option value="0">请选择</option>
                    <?php foreach ($types as $k=>$v) {?>
                    <option value="<?php echo $k;?>" <?php echo !empty($_GET['typeid']) && $_GET['typeid'] == $k ? "selected='selected'" : "";?>><?php echo $v['name'];?></option>
                    <?php }?>
                </select>
            </form>
            
            <form action="<?php echo U("Admin/Index/pending");?>" method="GET">
                <div class="seach_tls">
                    <span class="laby">申请时间</span>
                    <input class="i1 time" type="text" name="beginTime" onfocus="WdatePicker()" value="<?php echo !empty($_GET['beginTime']) ? $_GET['beginTime'] : "";?>"/>
                    <span class="laby">-</span>
                    <input class="i1 time" type="text" name="endTime" onfocus="WdatePicker()" value="<?php echo !empty($_GET['endTime']) ? $_GET['endTime'] : "";?>"/>
                    <input class="bntSel iconfont" type="submit" value="&#xe60a;"/>
                </div>
            </form>
            <form action="<?php echo U("Admin/Index/pending");?>" method="GET">
                <div class="seach_tl">
                    <div class="drapDown selBtn">
                        <a class="dragA selCur" href="javascript:void(0)">按地区</a>
                    </div>
                    <input class="i1" type="text" name="searchArea" value="<?php echo !empty($_GET['searchArea']) ? $_GET['searchArea'] : "";?>"/>
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
                        <th class="name">业务编号</th>
                        <th>业务类型</th>
                        <th>手机号码</th>
                        <th>姓名</th>
                        <th>省市区</th>
                        <th>申请状态</th>
                        <th>申请时间</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tfoot>
                    <?php if (!empty($demands)) {?>
                        <?php foreach ($demands as $k=>$v) {?>
                            <tr>
                                <td class="name"><?php echo $v['number'];?></td>
                                <td><?php echo $v['type_name'];?></td>
                                <td><?php echo $v['mobile'];?></td>
                                <td><?php echo $v['realname'];?></td>
                                <td><?php echo $v['province_name']."&nbsp;".$v['city_name']."&nbsp;".$v['area_name'];?></td>
                                <td><?php echo $v['status'] == 1 ? "已通过" : "待审核";?></td>
                                <td><?php echo date("Y-m-d H:i:s", $v['addtime']);?></td>
                                <td class="czs">
                                    <a href="<?php echo U("Admin/Index/detail", array("id"=>$v['id']));?>" class="qrhb">查看</a>
                                    <a href="<?php echo U("Admin/Demand/edit", array("id"=>$v['id']));?>" class="qrhb">编辑</a>
                                    <a href="javascript:void(0);" class="kssh" data-id="<?php echo $v['id'];?>">审核</a>
                                    <a href="javascript:void(0);" data-url="<?php echo U("Admin/Index/del", array("id"=>$v['id']));?>" class="del js-del-btn">删除</a>
                                </td>
                            </tr>
                        <?php }?>
                    <?php } else {?>
                        <tr>
                            <td colspan="8">暂时没有相关数据</td>
                        </tr>
                    <?php }?>
                </tfoot>
            </table>
            <?php echo $pageHtml;?>
        </div>

    </div>
</div>
    <script id="getpwd_template" type="text/template">
        <div class="form_add">
            <form role="form" id="formpop"  ng-controller="UserInfoCtrl">
                <div class="popDD" style="background: #fff;">
                    <div class="dialog_tit">
                        <h2 class="lk">审核</h2><i class="iconfont close">&#xe610;</i>
                    </div>
                    <div class="dialog_cons">
                        <p class="text_input"><label>项目编号：</label><var>{{userInfo.number}}</var></p>
                        <p class="text_input"><label>业务名称：</label><var >{{userInfo.type_name}}</var></p>
                        <p class="text_input"><label>审核状态：</label><label class="rio"><input type="radio" name="status" value="1" ng-model="userInfo.status">通过 </label><label class="rio"><input type="radio" name="status" value="-1" ng-model="userInfo.status">不通过 </label></p>
                        <p class="text_textarea"><label>备注：</label><textarea placeholder="备注" ng-model="userInfo.verify_note"></textarea></p>
                    </div>
                    <div class="popFo">
                        <p class="btn"><input type="submit" class="lsbj" value="审核" ng-click="getsh()"><a href="javascript:void(0)" class="close wbj">取消</a></p>
                    </div>
                </div>
            </form>
        </div>
    </script>
<script>

    khm.use(['defaul'], function (d) {
        d.init();
        d.sel();
    });
    
    $("#pay_status").bind("change", function(){
        var form = $(this).closest("form");
        form.submit();
    });
</script>
<?php include TMPL_PATH . 'Admin/footer.php' ?>