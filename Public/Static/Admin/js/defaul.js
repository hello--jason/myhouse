/*!
 * Created By:evanxu;
 * Created Time:2015-11-05;
 * Updated By:evanxu;
 * Updated Time:2015-11-05;
 * http://evanxu.com
 */
define(function(require, exports, module){
	var pops=require("dialogs");
	require("ag");
	exports.init = function(){
		var leftD=$(".contLift");
		var headD=$(".header");
		var rH=$(".contRight");
		var wH=$(window).height()-headD.height();
		var oDiv=$(".contLift").children("h3");
		var inputs=document.getElementsByTagName("input");
		leftD.css({height:wH});
		rH.css({height:wH});

		oDiv.click(function(){

			$(this).children("a").addClass("cur").parent("h3").siblings().children("a").removeClass("cur");
			$(this).find("i").html("&#xe60c").parents("h3").siblings().find("i").html("&#xe60d;");
			$(this).siblings(".list").hide().end().next(".list").show()

		})


		$(".kssh").on("click",function(){
			var order_id=$(this).attr("data-id");
			var html=$("#getpwd_template").html();
			pops.dialogs(html);
			exports.userAg(order_id);

		})
		
	}
	exports.publish=function(){
		var html=$(".hbcon").html();
		$(".addiform").on("click",function(){
			$(".zswycrd").append("<div class='hbcon'>"+html+"</div>");
		})
		$(".deliform").on("click",function(){
			var size=$(".zswycrd").children(".hbcon").size();
			if(size>1)
			{
				$(".zswycrd").children(".hbcon").eq(size-1).remove();
			}
		})
	}

	exports.userAg=function(uid){

		var userInfoModule = angular.module('UserInfoModule', []);
		userInfoModule.controller('UserInfoCtrl', ['$scope',
			function($scope) {
				if(uid)
				{
					$.ajax({
						type:'get',
						url:'/index.php/Admin/Index/getDemandInfo?id='+uid+'',
						dataType:'json',
						async: false,
						success:function(datas){
							//console.log(data);
							console.log(datas.data);
							var varustatus=datas.data.status==0?"":datas.data.status;

							$scope.userInfo = {
								id:uid,
								number:datas.data.number,
								type_name:datas.data.type_name,
								status:datas.data.status,
								verify_note: datas.data.verify_note
							};
						},
						error:function(){}
					})
				}else{

					$scope.userInfo = {
						id:uid,
						number:"",
						type_name:0,
						status: "",
						verify_note:""
					};

				}

				$scope.getsh=function(){
					console.log(333);
					$.ajax({
						type:'post',
						url:'/index.php/Admin/Index/demandVerify',
						dataType:'json',
						data:$scope.userInfo,
						async: false,
						success:function(data){
							if(data.status==1)
							{

								layer.msg(data.info, {icon: 1,time: 1000},function(){
									window.location.reload();
								});
							}else{
								layer.msg(data.info, {icon: 2});
							}
						},
						error:function(){}
					})
				}
			}
		])
		angular.bootstrap($(".form_add"),['UserInfoModule']);
	}

	exports.sel =function(){

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
	};
	exports.groupcheck= function(){
		$(".onTd").click(function(){
			if($(this).is(':checked')){
				$(this).parents(".td").next(".tr").find("input[type='checkbox']").attr('checked',true);
			}else{
				$(this).parents(".td").next(".tr").find("input[type='checkbox']").attr('checked',false);

			}
		})
	}
	exports.checkbox =function(){
		$('.checkbox').each(function(){

			$(this).addClass('checkbox');
			if($(this).prev().is(':disabled')==false){
				if($(this).prev().is(':checked'))
					$(this).addClass("checked");
			}else{
				$(this).addClass('disabled');
			}
		}).click(function(event){
				if(!$(this).prev().is(':checked')){
					$(this).addClass("checked");
					$(this).prev()[0].checked = true;
				}
				else{
					$(this).removeClass('checked');
					$(this).prev()[0].checked = false;
				}
				event.stopPropagation();
			}
		).prev().hide();
	}
	exports.radio =function(){
		console.log(0);
		$(':radio+span',".payRadio").each(function(i){
			console.log(i);
			$(this).addClass('hRadio');
			if($(this).prev().is("checked"))
				$(this).addClass('hRadio_Checked');
		}).click(function(event){
			$(this).siblings().removeClass("hRadio_Checked");
			if(!$(this).prev().is(':checked')){
				$(this).addClass("hRadio_Checked");
				$(this).prev()[0].checked = true;
			}
			event.stopPropagation();
		})
			.prev().hide();
	}
	exports.selTime =function(){

		var dateRange = new pickerDateRange('date_demo3', {
			//aRecent7Days : 'aRecent7DaysDemo3', //���7��
			isTodayValid : true,
			startDate : '2016-01-01',
			endDate : '2016-03-01',
			//needCompare : true,
			//isSingleDay : true,
			//shortOpr : true,
			defaultText : ' 至 ',
			theme : 'ta',
			success : function(obj) {
				$("#dCon_demo3").html('开始时间 : ' + obj.startDate + '<br/>结束时间 : ' + obj.endDate);
			}
		});
	};
	exports.nav=function(){
		$(".contLift").children("h3").click(function(){
console.log(0);

				$(this).children("a").addClass("cur").parent("h3").siblings().children("a").removeClass("cur");
			    $(this).find("i").html("&#xe60c").parents("h3").siblings().find("i").html("&#xe60d;");
				$(this).siblings(".list").hide().end().next(".list").show()

		})
	}
	exports.hander = function(hanrd,tabCon,dd,index){
		var odl;
		if(dd)
		{
			odl=dd;
		}else{
			odl="span";
		}
		if(index)
		{
			$("."+hanrd).children(odl).eq(index).addClass("cur").siblings(odl).removeClass("cur");
			exports.tab(index,tabCon);
			$("."+hanrd).children(odl).on("click",function(){
				var index=$(this).index();
				$(this).addClass("cur").siblings(odl).removeClass("cur");
				exports.tab(index,tabCon);
			})

		}else{
			$("."+hanrd).children(odl).on("click",function(){
				var index=$(this).index();
				$(this).addClass("cur").siblings(odl).removeClass("cur");
				exports.tab(index,tabCon);
			})
		}

	}
	exports.tab = function(index,field){
		var tabCon=$("."+field);
		tabCon.eq(index).show().siblings("."+field).hide();
	}
	exports.repay_detail = function(){
		//日期选择器
		require("datepicker");
		$(".date_picker").live("click",function(){
			WdatePicker();
		})
	};
	exports.Tab =function(handCon,tabCon){
		var index=0;
		var handCon=$("."+handCon);
		var tabCon=$("."+tabCon);
		handCon.eq(index).addClass("cur").siblings(this).removeClass("cur");
		tabCon.eq(index).show().siblings(this).hide();
		handCon.click(function(){
			index=$(this).index();
			$(this).addClass("cur").siblings(this).removeClass("cur");
			tabCon.eq(index).show().siblings(this).hide();
		})
	};
})