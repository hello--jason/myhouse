<div class="contLift">
    <div class="topLet">
        显示全部
    </div>
    <h3><a href="javascript:void(0);"  class="<?php echo CONTROLLER_NAME == 'Index' ? "cur" : "";?>"><var class="iconfont">&#xe606;</var><span>业务管理</span><i class="iconfont">&#xe60c;</i></a></h3>
    <div class="list" <?php echo (CONTROLLER_NAME == 'Index' || CONTROLLER_NAME == 'Demand') && in_array(ACTION_NAME, array("index", "pending","detail", "edit","publish")) ? "style='display: block'" : "";?>>
        <p><a href="<?php echo U("Admin/Index/index");?>"><var class="iconfont">&#xe601;</var><span>业务列表</span></a> </p>
        <p><a href="<?php echo U("Admin/Index/pending");?>"><var class="iconfont">&#xe601;</var><span>待审业务</span></a> </p>
        <p><a href="<?php echo U("Admin/Demand/publish");?>"><var class="iconfont">&#xe601;</var><span>新增业务</span></a> </p>
    </div>
    <h3><a href="javascript:void(0);" class="<?php echo CONTROLLER_NAME == 'Advert' ? "cur" : "";?>"><var class="iconfont">&#xe606;</var><span>营销管理</span><i class="iconfont">&#xe60d;</i></a></h3>
    <div class="list" <?php echo CONTROLLER_NAME == 'Advert' && in_array(ACTION_NAME, array("index", "add", "edit")) ? "style='display: block'" : "";?>>
        <p><a href="<?php echo U("Admin/Advert/index");?>" class="cur"><var class="iconfont">&#xe601;</var><span>活动管理</span></a> </p>
    </div>
    <h3><a href="javascript:void(0);" class="<?php echo CONTROLLER_NAME == 'Article' ? "cur" : "";?>"><var class="iconfont">&#xe606;</var><span>内容管理</span><i class="iconfont">&#xe60d;</i></a></h3>
    <div class="list" <?php echo CONTROLLER_NAME == 'Article' && in_array(ACTION_NAME, array("index", "add", "edit")) ? "style='display: block'" : "";?>>
        <p><a href="<?php echo U("Admin/Article/index");?>" class="cur"><var class="iconfont">&#xe601;</var><span>内容列表</span></a> </p>
    </div>
    <h3><a href="javascript:void(0);" class="<?php echo CONTROLLER_NAME == 'Store' ? "cur" : "";?>"><var class="iconfont">&#xe606;</var><span>门店管理</span><i class="iconfont">&#xe60d;</i></a></h3>
    <div class="list" <?php echo CONTROLLER_NAME == 'Store' && in_array(ACTION_NAME, array("index", "add", "edit")) ? "style='display: block'" : "";?>>
        <p><a href="<?php echo U("Admin/Store/index");?>" class="cur"><var class="iconfont">&#xe601;</var><span>门店列表</span></a> </p>
    </div>
    <h3><a href="javascript:void(0);" class="<?php echo CONTROLLER_NAME == 'Job' ? "cur" : "";?>"><var class="iconfont">&#xe606;</var><span>招聘管理</span><i class="iconfont">&#xe60d;</i></a></h3>
    <div class="list" <?php echo CONTROLLER_NAME == 'Job' && in_array(ACTION_NAME, array("index", "add", "edit")) ? "style='display: block'" : "";?>>
        <p><a href="<?php echo U("Admin/Job/index")?>" class="cur"><var class="iconfont">&#xe601;</var><span>招聘列表</span></a> </p>
    </div>
    
    <h3><a href="javascript:void(0);" class="<?php echo CONTROLLER_NAME == 'Role' || CONTROLLER_NAME == 'Manager' ? "cur" : "";?>"><var class="iconfont">&#xe606;</var><span>权限管理</span><i class="iconfont">&#xe60d;</i></a></h3>
    <div class="list" <?php echo (CONTROLLER_NAME == 'Role' || CONTROLLER_NAME == 'Manager') && in_array(ACTION_NAME, array("index", "add", "edit")) ? "style='display: block'" : "";?>>
        <!--<p><a href="<?php echo U("Admin/Role/index")?>" class="cur"><var class="iconfont">&#xe601;</var><span>角色管理</span></a> </p>-->
        <p><a href="<?php echo U("Admin/Manager/index")?>" class="cur"><var class="iconfont">&#xe601;</var><span>管理员管理</span></a> </p>
    </div>
    
    <h3><a href="javascript:void(0);" class="<?php echo CONTROLLER_NAME == 'User' ? "cur" : "";?>"><var class="iconfont">&#xe606;</var><span>用户管理</span><i class="iconfont">&#xe60d;</i></a></h3>
    <div class="list" <?php echo CONTROLLER_NAME == 'User' && in_array(ACTION_NAME, array("index", "add", "edit")) ? "style='display: block'" : "";?>>
        <p><a href="<?php echo U("Admin/User/index")?>" class="cur"><var class="iconfont">&#xe601;</var><span>用户列表</span></a> </p>
        <p><a href="<?php echo U("Admin/User/add")?>" class="cur"><var class="iconfont">&#xe601;</var><span>新增用户</span></a> </p>
    </div>
    <h3><a href="javascript:void(0);" class="<?php echo CONTROLLER_NAME == 'Operation' ? "cur" : "";?>"><var class="iconfont">&#xe606;</var><span>操作日志</span><i class="iconfont">&#xe60d;</i></a></h3>
    <div class="list" <?php echo CONTROLLER_NAME == 'Operation' && in_array(ACTION_NAME, array("index", "login")) ? "style='display: block'" : "";?>>
        <p><a href="<?php echo U("Admin/Operation/index")?>" class="cur"><var class="iconfont">&#xe601;</var><span>操作记录</span></a> </p>
        <p><a href="<?php echo U("Admin/Operation/login")?>" class="cur"><var class="iconfont">&#xe601;</var><span>登录记录</span></a> </p>
    </div>
</div>