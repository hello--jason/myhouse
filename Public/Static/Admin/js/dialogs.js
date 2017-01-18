
define(function(require, exports, module) {
    //从上往下弹出窗口的外框（全站通用）
    exports._dialog = function(){
        var $diyou_dialog = $(".diyou_dialog");
        var $diyou_dialog_msg = $("#diyou_dialog_warning");
        var $popBtn = $("#popBtn");
        var $dialog_main = $(".dialog_main");
        var $dialog_con = $(".dialog_con");

        var windowH = document.documentElement.clientHeight;
        if( $dialog_con.height() > windowH){$dialog_con.css({"max-height":windowH -50 +"px"})}
        if ($.browser.msie && ($.browser.version == "6.0") && !$.support.style) { //判断IE6
            $dialog_con.css({"height":windowH -50 +"px" })}
        var $maskLayer = $(".dialog_maskLayer");
        var $dialog_mainClose = $(".close");
        var $dialog_mainCloses = $(".bntclose");
        var $dialog_mainClose_msg = $(".close_msg");
        var $dialog_mainTop = -($dialog_main.outerHeight() / 2);
        var $dialog_mainLeft = -($dialog_main.outerWidth() / 2);
        var $pageH = $(document).height(); //IE6不支持height:100%，所以为遮罩背景设一个固定高度
        var sto = '';
        var Drag_ID = $dialog_main,DragHead = $(".dialog_main h2");
        var moveable = false , moveX = 0,moveY = 0,moveTop=0,moveLeft = 0;
        var	cw = $(document).width(),ch = $(document).height()
        var	sw = Drag_ID.width(),sh = Drag_ID.height();

        //从上往下显示
        $dialog_main.animate({top:"50%"},500);


        DragHead.bind('mouseover',function(){
            DragHead.css({'cursor':'move'});
        });
        DragHead.bind('mousedown',function(e){
            moveable = true;
            e = window.event?window.event:e;
            var ol = Drag_ID.offset().left, ot = Drag_ID.offset().top-moveTop;
            moveX = e.clientX-ol;
            moveY = e.clientY-ot;
        });
        $(document).bind('mousemove',function(e){
            if (moveable) {
                e = window.event?window.event:e;
                var x = e.clientX - moveX;
                var y = e.clientY - moveY;
                if ( x > 0 &&( x + sw < cw) && y > 0 && (y + sh < ch) ) {
                    Drag_ID.offset({left:x,top:parseInt(y+moveTop)});
                    Drag_ID.css({'margin':'auto'});
                }
            }
        })
        $(document).bind('mouseup',function(e){moveable = false;});
        Drag_ID.bind('onselectstart',function(e){return false;});

        //点击按钮后显示
        $maskLayer.css({ "height":$pageH });
        if ($.browser.msie && ($.browser.version == "6.0") && !$.support.style) { //判断IE6
            $dialog_main.css({ "position":"absolute","marginLeft":( $dialog_mainLeft ) }).show();
        }else{
            $dialog_main.css({ "marginTop":( $dialog_mainTop ),"marginLeft":( $dialog_mainLeft ) }).show();
        };

        function cancelBubble(event) { //阻止事件冒泡
            event.stopPropagation();
        };
        function hideLyaerMsg(event) {
            $diyou_dialog_msg.remove();
            if (sto!=''){
                clearTimeout(sto);
            }
        };
        function hideLyaer(event) {
            $dialog_main.animate({top:"-40%"},500,function(){
                $diyou_dialog.remove();
            });
            if (sto!=''){
                clearTimeout(sto);
            }
        };
        $dialog_main.click(cancelBubble);
        $dialog_mainClose_msg.click(hideLyaerMsg);
        $dialog_mainClose.click(hideLyaer);
        $dialog_mainCloses.click(hideLyaer);

    }

    //普通弹窗外框（全站通用）
    exports.normal_dialog = function(){
        var $diyou_dialog = $(".diyou_dialog");
        var $diyou_dialog_msg = $("#diyou_dialog_warning");
        var $popBtn = $("#popBtn");
        var $dialog_main = $(".dialog_main");
        var $dialog_con = $(".dialog_con");

        var windowH = document.documentElement.clientHeight;
        $dialog_main.css({"height":windowH -69 +"px"});

        var $maskLayer = $(".dialog_maskLayer");
        var $dialog_mainClose = $(".close");
        var $dialog_mainClose_msg = $(".close_msg");
       var $dialog_mainTop = -($dialog_main.outerHeight() / 2);
        var $dialog_mainLeft = -($dialog_main.outerWidth() / 2);
        var $pageH = $(document).height(); //IE6不支持height:100%，所以为遮罩背景设一个固定高度
        var sto = '';
        var Drag_ID = $dialog_main,DragHead = $(".dialog_main h2");
        var moveable = false , moveX = 0,moveY = 0,moveTop=0,moveLeft = 0;
        var	cw = $(document).width(),ch = $(document).height()
        var	sw = Drag_ID.width(),sh = Drag_ID.height();

        DragHead.bind('mouseover',function(){
            DragHead.css({'cursor':'move'});
        });

        Drag_ID.bind('onselectstart',function(e){return false;});

        //点击按钮后显示
        $maskLayer.css({ "height":$pageH });
        if ($.browser.msie && ($.browser.version == "6.0") && !$.support.style) { //判断IE6
            $dialog_main.css({ "position":"absolute","marginLeft":( $dialog_mainLeft ) }).show();
        }else{
            $dialog_main.css({ "marginLeft":( $dialog_mainLeft ) }).show();
        };

        function cancelBubble(event) { //阻止事件冒泡
            event.stopPropagation();
        };
        function hideLyaerMsg(event) {
            $diyou_dialog_msg.remove();
            if (sto!=''){
                clearTimeout(sto);
            }
        };
        function hideLyaer(event) {
            $diyou_dialog.remove();
            if (sto!=''){
                clearTimeout(sto);
            }
        };
        $(".selBtn").hover(function(){
            $(this).children(".selCur").addClass("selOn").next(".selOpg").show();
            $(this).css({"z-index":999})
        }, function(){
            $(this).children(".selCur").removeClass("selOn").next(".selOpg").hide();
            $(this).css({"z-index":0})
        });
        $(".selOpg").children("a").click(function(){
            var vals=$(this).text();
            $(this).parent().siblings(".dragA").text(vals);
            $(this).parent().hide();
        })
        $dialog_main.click(cancelBubble);
        $dialog_mainClose_msg.click(hideLyaerMsg);
        $dialog_mainClose.click(hideLyaer);

    }


    exports.dialog = function(title,url,reply,tourl){
        $('.diyou_dialog').remove();
        if(typeof(tourl)=="undefined"){
            tourl='';
        }
        var _cont ='<div class="diyou_dialog"><div class="dialog_main"><div class="dialog_tit"><h2>'+title+'</h2><i class="close" data-url='+tourl+'></i></div><div class="dialog_con"><div class="dialog_warning"><div class="dialog_loading">数据正在加载中······</div></div></div></div><div class="dialog_maskLayer"></div></div>';
        $('body').append(_cont);
        //exports._dialog();
        if(url!=""){
            $.ajax({
                type: "GET",
                dataType: "html",
                url:url,
                success: function(data) {
                    $('.dialog_con').html(data);
                    exports._dialog();
                }
            });
        }

    }
    exports.dialogs=function(content,pos){
        $('.FWG_dialog').remove();
        var position = pos || 'fixed';
        var _cont = '<div class="FWG_dialog"><div class="dialog_mains">'+content+'</div><div class="dialog_maskLayer"></div></div>';
        $('body').append(_cont);
        $('.dialog_con').html(content);
        var $dialog = $('.FWG_dialog');
        var $dialog_main = $('.dialog_mains');
        var $dialog_mainClose = $('.close');
        var windowH = $(window).height();
        var windowW = $(window).width();
        //var wscroll = $(document).scrollTop();
        var $dialogLeft = ( windowW - $dialog_main.width() ) / 2;
        if( position == 'fixed'){
            var $dialogTop = ( windowH - $dialog_main.height() ) / 2;
            $dialog_main.css({ 'left':( $dialogLeft ) }).show();
        }else if( position == 'absolute'){
            //var $dialogTop = (( windowH - $dialog_main.height())/2) + wscroll;
            var $dialogTop = '40%';
            $dialog_main.css({ 'position': position,'left':( $dialogLeft ) }).show();
        }

        //从上往下显示
        $dialog_main.animate({top:( $dialogTop )},500);

        function cancelBubble(event) { //阻止事件冒泡
            event.stopPropagation();
        };
        function hideLyaer(event) {
            $dialog_main.animate({top:"-100%"},500,function(){
                $dialog.remove();
            });
        };
        $dialog_main.on('click',cancelBubble);
        $dialog_mainClose.on('click',hideLyaer);
        $("#qdsq").on("click",function(){
            var order_id= $(this).attr("data-order_id");
            var cont=$(this).attr("data-cont");
            exports.fkgkh(order_id,cont,"申请成功");
        })
        $("#del").on("click",function(){
            var order_id=$(this).attr("data-order_id");
            var ele=$(this).attr("data-id");

            exports.qrhb(ele,order_id,"已确认");
        })
        $(".wxwl").click(function(){
            if($(this).hasClass("del")){ return;}
            if($(this).hasClass("cur"))
            {
                $(this).removeClass("cur").attr("rel",1);
                $(".winfo").show()
            }else{
                $(this).addClass("cur").attr("rel",0);
                $(".winfo").hide()
            }

        })
        $("input,textarea").focus(function(){
            $(this).addClass("iCur");
        }).blur(function(){
            $(this).removeClass("iCur");
        });
        $("#qdfh").click(function(){

            var order_id=$(this).attr("data-order_id");
            var elm=$("#fh"+order_id).parent().parent().parent("dl");
            var need=$(".wxwl").attr("rel");


            if(need==1){
                var sn_name=$(".sn_name").val();
                var sn_no=$(".sn_no").val();
                if(sn_name=="请选择")
                {
                    $("#warning").text("请选择物流公司");
                    return false;
                }
                if(sn_no=="")
                {
                    $("#warning").text("请输入快递单号");
                    return false;
                }
            }
            exports.fhress(order_id,need,sn_name,sn_no,elm);
        })
    }
    exports.calculator = function(title,url){
        $('.diyou_dialog').remove();
        var _cont = '<div class="diyou_dialog" id="diyou_calculator"><div class="dialog_main"><div class="dialog_tit"><h2>'+title+'</h2><i class="close"></i></div><div class="dialog_con"></div></div><div class="dialog_maskLayer"></div></div>';
        $('body').append(_cont);
        $.ajax({
            type: 'GET',
            dataType: 'html',
            url:url,
            success: function(data){
                $('.dialog_con').html(data);
                exports.cal_dialog();
            }
        });

    }

    exports.cal_dialog = function(){
        var $diyou_dialog = $(".diyou_dialog");
        var $diyou_dialog_msg = $("#diyou_dialog_warning");
        var $popBtn = $("#popBtn");
        var $dialog_main = $(".dialog_main");
        var $dialog_con = $(".dialog_con");
        var i = $(document).scrollTop();
        var windowH = document.documentElement.clientHeight;
        if( $dialog_con.height() > windowH){$dialog_con.css({"max-height":windowH -50 +"px"})}
        if ($.browser.msie && ($.browser.version == "6.0") && !$.support.style) { //判断IE6
            $dialog_con.css({"height":windowH -50 +"px" })}
        var $maskLayer = $(".dialog_maskLayer");
        var $dialog_mainClose = $(".close");
        var $dialog_mainClose_msg = $(".close_msg");
        var $dialog_mainTop = -($dialog_main.outerHeight() / 2);
        var $dialog_mainLeft = -($dialog_main.outerWidth() / 2);
        var $pageH = $(document).height(); //IE6不支持height:100%，所以为遮罩背景设一个固定高度
        var sto = '';
        var Drag_ID = $dialog_main,DragHead = $(".dialog_main h2");
        var moveable = false , moveX = 0,moveY = 0,moveTop=0,moveLeft = 0;
        var	cw = $(document).width(),ch = $(document).height()
        var	sw = Drag_ID.width(),sh = Drag_ID.height();

        //从上往下显示
        $dialog_main.animate({top:"50%"},500);

        DragHead.bind('mouseover',function(){
            DragHead.css({'cursor':'move'});
        });
        DragHead.bind('mousedown',function(e){
            moveable = true;
            e = window.event?window.event:e;
            var ol = Drag_ID.offset().left, ot = Drag_ID.offset().top-moveTop;
            moveX = e.clientX-ol;
            moveY = e.clientY-ot;
        });
        $(document).bind('mousemove',function(e){
            if (moveable) {
                e = window.event?window.event:e;
                var x = e.clientX - moveX;
                var y = e.clientY - moveY;
                if ( x > 0 &&( x + sw < cw) && y > 0 && (y + sh < ch) ) {
                    Drag_ID.offset({left:x,top:parseInt(y+moveTop)});
                    Drag_ID.css({'margin':'auto'});
                }
            }
        })
        $(document).bind('mouseup',function(e){moveable = false;});
        Drag_ID.bind('onselectstart',function(e){return false;});

        //点击按钮后显示
        $maskLayer.css({ "height":$pageH });
        if ($.browser.msie && ($.browser.version == "6.0") && !$.support.style) { //判断IE6
            $dialog_main.css({ "position":"absolute","marginLeft":( $dialog_mainLeft ) }).show();
        }else{
            $dialog_main.css({ "position":"absolute","marginTop":( $dialog_mainTop + i ),"marginLeft":( $dialog_mainLeft ) }).show();
        };

        function cancelBubble(event) { //阻止事件冒泡
            event.stopPropagation();
        };
        function hideLyaerMsg(event) {
            $diyou_dialog_msg.remove();
            if (sto!=''){
                clearTimeout(sto);
            }
        };
        function hideLyaer(event) {
            $dialog_main.animate({top:"-40%"},500,function(){
                $diyou_dialog.remove();
            });
            if (sto!=''){
                clearTimeout(sto);
            }
        };
        $dialog_main.click(cancelBubble);
        $dialog_mainClose_msg.click(hideLyaerMsg);
        $dialog_mainClose.click(hideLyaer);
    }



    exports.tips = function(content){
        $('#diyou_tips_warning').remove();
        var _cont ='<div class="diyou_dialog" id="diyou_tips_warning"><div class="dialog_main"><div class="dialog_tit_msg"><i class="close"></i></div><div class="dialog_con" ><div class="dialog_warning"><div class="dialog_error">'+content+'</div></div></div></div><div class="dialog_maskLayer"></div></div>';
        $('body').append(_cont);
        exports.normal_dialog();
        var sto = setTimeout("$('#diyou_tips_warning').remove()",1500);
        return false;
    }

    exports.message = function(title,content){
        $('.diyou_dialog').remove();
        var _cont ='<div class="diyou_dialog" id="diyou_dialog_warning"><div class="dialog_main"><div class="dialog_tit"><h2>'+title+'</h2><i class="close"></i></div><div class="dialog_con">'+content+'</div></div><div class="dialog_maskLayer"></div></div>';
        $('body').append(_cont);
        exports.normal_dialog();
    }

    exports.success = function(content,url){
        $('.diyou_dialog').remove();
        $('#diyou_dialog_warning').remove();
        var _cont ='<div class="diyou_dialog" id="diyou_dialog_warning"><div class="dialog_main"><div class="dialog_tit_msg"><i class="close_msg"></i></div><div class="dialog_con" ><div class="dialog_warning"><div class="dialog_success">'+content+'</div></div></div></div><div class="dialog_maskLayer"></div></div>';
        $('body').append(_cont);
        exports.normal_dialog();
        if(typeof(url)=="undefined"){
            url='';
        }
        if(url!=''){
            if (url=='this'){
                setTimeout("window.location.reload()",2000);
            }else{
                setTimeout("location.href='"+url+"'",2000);
            }
        }else{
            setTimeout("$('#diyou_dialog_warning').remove()",2000);
        }

    }

    exports.error = function(content,url){

        $('.diyou_dialog').remove();
        $('#diyou_dialog_warning').remove();
        var _cont ='<div class="diyou_dialog" id="diyou_dialog_warning"><div class="dialog_main"><div class="dialog_tit_msg"><i class="close_msg"></i></div><div class="dialog_con" ><div class="dialog_warning"><div class="dialog_error">'+content+'</div></div></div></div><div class="dialog_maskLayer"></div></div>';
        $('body').append(_cont);
        exports.normal_dialog();
        if(typeof(url)=="undefined"){
            url='';

        }
        if(url!=''){
            if (url=='this'){
                sto =  setTimeout("window.location.reload()",1500);
            }else{
                sto = setTimeout("location.href='"+url+"'",1500);
            }
        }else{
            sto = setTimeout("$('#diyou_dialog_warning').remove()",1500);
        }
        return false;
    }

    //hsd
    exports.confirm = function(content,url){
        $('.diyou_dialog').remove();
        $('#diyou_dialog_warning').remove();
        var _cont ='<div class="diyou_dialog" id="diyou_dialog_warning"><div class="dialog_main"><div class="dialog_tit_msg"><i class="close_msg"></i></div><div class="dialog_con" ><div class="dialog_warning"><div class="dialog_warn">'+content+'</div></div></div><div class="ui_buttons"><input  type="submit" value="确认" class="dialog_confirm"/> <input  type="submit" value="关闭" class="dialog_cancel"></div></div><div class="dialog_maskLayer"></div></div>';
        $('body').append(_cont);
        exports.normal_dialog();
        $('.dialog_cancel').bind('click',function(){
            $('#diyou_dialog_warning').remove();
        })
        $('.dialog_confirm').click(function(){
            $.ajax({
                type: "GET",
                dataType: "text",
                url:url,
                success: function(data) {
                    exports.success('操作成功',"this");

                }
            });
        })
    }

    //hsd
    exports.confirm_cancel = function(content,url){
        $('.diyou_dialog').remove();
        $('#diyou_dialog_warning').remove();
        var _cont ='<div class="diyou_dialog" id="diyou_dialog_warning"><div class="dialog_main"><div class="dialog_tit_msg"><i class="close_msg"></i></div><div class="dialog_con" ><div class="dialog_warning"><div class="dialog_warn">'+content+'</div></div></div><div class="ui_buttons"><input  type="button" value="确认" class="dialog_confirm"/> <input  type="button" value="关闭" class="dialog_cancel"></div></div><div class="dialog_maskLayer"></div></div>';
        $('body').append(_cont);
        exports.normal_dialog();
        $('.dialog_confirm').bind('click',function(){
            location.href = '"'+ url +'"';
        });
        $('.dialog_cancel').bind('click',function(){
            $('#diyou_dialog_warning').remove();
        })
    }
});