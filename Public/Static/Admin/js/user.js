
define(function(require, exports, module){

    exports.init = function(){

    };
    exports.addqd = function(){
        $(".addqd").click(function(){
            var cont="<div class='dia_info'><p class='info'>请输入渠道归属名称</p><p class='text'><input type='text' class='i_input i1'></p><p class='bnt'><button class='bntTy b1'>确定</button><button class='bntTy b1 bntclose'>取消</button></p></div>";
            khm.use(['dialogs'],function(d){d.message("新建渠道归属",cont)});
        })
    }
    exports.upqdname = function(){
        $(".upd").click(function(){
            var cont="<div class='dia_info'><p class='info'>请输入渠道归属名称</p><p class='text'><input type='text' class='i_input i1'></p><p class='bnt'><button class='bntTy b1'>确定</button><button class='bntTy b1 bntclose'>取消</button></p></div>";
            khm.use(['dialogs'],function(d){d.message("重命名渠道归属",cont)});
        })
    }
    exports.addUsTy = function(){
        $(".addUsTy").click(function(){
            var cont="<div class='dia_info'><p class='info'>请输入用户类型名称</p><p class='text'><input type='text' class='i_input i1'></p><p class='info'>请选择渠道归属</p><div class='text'><div class='drapDown selBtn'><a class='dragA selCur' href='javascript:void(0)'>渠道归属为</a><div class='dragDiv selOpg'><a href='javascript:void(0)'>集团</a><a href='javascript:void(0)'>线上</a><a href='javascript:void(0)'>线下</a></div></div></div><p class='bnt'><button class='bntTy b1'>确定</button><button class='bntTy b1 bntclose'>取消</button></p></div>";
            khm.use(['defaul','dialogs'],function(d,d1){d1.message("重命名渠道归属",cont),d.sel()});
        })
    }
    exports.upUsTy = function(){
        $(".upd").click(function(){
            var oTr=$(this).parent().parent("tr");
            var data_type=oTr.attr("data-type");
            var data_qd=oTr.attr("data-qd");
            var cont="<div class='dia_info'><p class='info'>请输入用户类型名称</p><p class='text'><input type='text' class='i_input i1' value='"+data_type+"'></p><p class='info'>请选择渠道归属</p><div class='text'><div class='drapDown selBtn'><a class='dragA selCur' href='javascript:void(0)'>"+data_qd+"</a><div class='dragDiv selOpg'><a href='javascript:void(0)'>集团</a><a href='javascript:void(0)'>线上</a><a href='javascript:void(0)'>线下</a></div></div></div><p class='bnt'><button class='bntTy b1'>确定</button><button class='bntTy b1 bntclose'>取消</button></p></div>";
            khm.use(['defaul','dialogs'],function(d,d1){d1.message("重命名渠道归属",cont);d.sel();d.init();});
        })
    }

});