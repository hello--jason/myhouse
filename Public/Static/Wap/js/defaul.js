/*!
 * Created By:evanxu;
 * Created Time:2015-11-05;
 * Updated By:evanxu;
 * Updated Time:2015-11-05;
 * http://evanxu.com
 */
define(function(require, exports, module){

	exports.init = function(){

	}

	exports.rems = function(){
		var _self=this;_self.width=640;_self.fontSize=100;_self.widthProportion=function(){var p=(document.body&&document.body.clientWidth||document.getElementsByTagName("html")[0].offsetWidth)/_self.width;return p>1?1:p<0.25?0.25:p};_self.changePage=function(){console.log(_self.widthProportion());document.getElementsByTagName("html")[0].setAttribute("style","font-size:"+_self.widthProportion()*_self.fontSize+"px !important")};_self.changePage();window.addEventListener("resize",function(){_self.changePage()},false);
	}

	exports.circle = function() {
		$(".circle").each(function(i) {
			var porp=$(this).children(".mask").attr("data-porp");
			var porpBl=3.6;
			if(porp<=50)
			{
				$(this).find(".right").css({"transform":"rotate("+porp*porpBl+"deg)","-webkit-transform":"rotate("+porp*porpBl+"deg)"});
			}else{
				$(this).find(".right").css({"transform":"rotate(180deg)","-webkit-transform":"rotate(180deg)"});
				$(this).find(".left").css({"transform":"rotate("+(porp-50)*porpBl+"deg)","-webkit-transform":"rotate("+(porp-50)*porpBl+"deg)"});
			}
		});
	}
	exports.slide = function() {
		var banner = $(".banner");
		var maxH = 354,
				maxW = 640,
				minH = 177;
		var baImg = banner.find('img');
		var win = $(".banner").width();

		var swiper = new Swiper('.banner', {
			pagination: '.pagination',
			loop: true,
			speed:600,
			autoplay: 5000,
			onFirstInit: function(swiper) {

				$('.banner a').on('click', function(e) {
					e.preventDefault();
					var turl = $(this).attr('href');
					window.location.href = turl;
					return false;
				})
			}
		});
		banner.find('.swiper-wrapper').show();
		var size=$(".pagination").children("span").size();
		var bl=(100/size).toFixed(2);
		$(".pagination").children("span").css({width:bl+"%"})
		console.log(bl);

	}
	exports.slidetab = function() {

		var ddssd= new Swiper('.tabsCon', {
			speed:600,
			onSlideChangeStart: function(){
				$(".tabHand .cur").removeClass('cur');
				$(".tabHand span").eq(ddssd.activeIndex).addClass('cur');
			},
			onFirstInit: function(swiper) {

				$('.tabHand span').on('touchstart mousedown', function(e) {
					e.preventDefault();
					$(".tabHand .cur").removeClass('cur');
					$(this).addClass('cur');

					ddssd.swipeTo($(this).index(), 600, false);
					return false;
				})
			}
		});


	}
	exports.names = function(){
		$("#name").on("click",function(){
			var heightW=$(window).height();
			$("#edot").show();
			var Wtop=(heightW-$("#edot").height())/2;
			$("#edot").css({top:Wtop}).siblings(".share_maskyer").show();

		})
		$("#email").on("click",function(){
			var heightW=$(window).height();
			$("#emailP").show();
			var Wtop=(heightW-$("#emailP").height())/2;
			$("#emailP").css({top:Wtop}).siblings(".share_maskyer").show();

		})
		$(".popClose").on("click",function(){
			$(".pop").hide().siblings(".share_maskyer").hide();
		})
	}
	exports.tabs=function(){
		var el = document.querySelector('.all');
		var startPosition, endPosition, deltaX, deltaY, moveLength;
		var wh=$(window).height();
		var cunt=$(".cont1").size(),index= 0,topX;
		el.addEventListener('touchstart', function (e) {
			e.preventDefault();
			var touch = e.touches[0];
			startPosition = {
				x: touch.pageX,
				y: touch.pageY
			}
		});

		el.addEventListener('touchmove', function (e) {
			e.preventDefault();
			var touch = e.touches[0];
			endPosition = {
				x: touch.pageX,
				y: touch.pageY
			}

			deltaX = endPosition.x - startPosition.x;
			deltaY = endPosition.y - startPosition.y;
			moveLength = Math.sqrt( Math.pow(Math.abs(deltaY), 2));

		});
		el.addEventListener('touchend', function (e) {
			e.preventDefault();
			if(deltaY<0 && Math.abs(deltaY)>30)
			{
				index++;
				if(index<cunt)
				{

					topX=index*wh;
					exports.goDown(topX);
					if(index==cunt-1)
					{
						$(".hyxyy").hide().siblings(".myxyy").show();
					}
				}else{
					index=cunt-1;

					return false;
				}

			}else if(deltaY>0 && deltaY>30) {
				index--;
				if(index>=0)
				{

					topX=index*wh;
					exports.goDown(topX);
					if(index==0)
					{
						$(".myxyy").hide().siblings(".hyxyy").show();
					}
				}else{
					index=0;

					return false;
				}
			}
		})
	}
	exports.goDown=function(h){
		$(".nrjs").css({transform:"translate3d(0px, -"+h+"px, 0px)", "transition-duration": "0.5s"})
	}
	exports.swiper = function(target,index) {
		if(typeof(index)=="undefined"){
			index='';
		}
		if(index!=''){
			_initSlide = index - 1;
		}else{
			_initSlide = 0;
		}
		var tabsSwiper = new Swiper('.swiper-container', {
			speed: 500,
			initialSlide: _initSlide,
			onInit: function(swiper) {

				var heights=$('.swiper-con').eq(_initSlide).height();
				console.log($(swiper.activeSlide()).find('.swiper-con'));

				$(swiper.activeSlide()).closest('.swiper-wrapper').height(heights).css('overflow', 'hidden');
				if($(".comment_set"))
				{
					if(_initSlide>0)
					{
						$(".comment_set").hide().siblings(".bott_nav").show();
					}else{
						$(".comment_set").show().siblings(".bott_nav").hide();
					}
				}
			},
			onSlideChangeStart: function(swiper) {
				$('.' + target + ' .cur').removeClass('cur');
				$('.' + target + ' span').eq(swiper.activeIndex).addClass('cur');
				if($(".comment_set"))
				{
					if(swiper.activeIndex>0)
					{
						$(".comment_set").hide().siblings(".bott_nav").show();
					}else{
						$(".comment_set").show().siblings(".bott_nav").hide();
					}
				}

				$(swiper.activeSlide()).closest('.swiper-wrapper').height($(swiper.activeSlide()).find('.swiper-con').height() ).css('overflow', 'hidden');
			}
		})
		$('.' + target + ' span').on('touchstart mousedown', function() {
			$('.' + target + ' .cur').removeClass('cur');
			$(this).addClass('cur');
			tabsSwiper.swipeTo($(this).index())
			return false;
		})
	}

	exports.swiper = function(target,index) {
		if(typeof(index)=="undefined"){
			index='';
		}
		if(index!=''){
			_initSlide = index - 1;
		}else{
			_initSlide = 0;
		}
		var tabsSwiper = new Swiper('.swiper-container', {
			speed: 500,
			initialSlide: _initSlide,
			onInit: function(swiper) {

				var heights=$('.swiper-con').eq(_initSlide).height();
				console.log($(swiper.activeSlide()).find('.swiper-con'));

				$(swiper.activeSlide()).closest('.swiper-wrapper').height(heights).css('overflow', 'hidden');
				if($(".comment_set"))
				{
					if(_initSlide>0)
					{
						$(".comment_set").hide().siblings(".bott_nav").show();
					}else{
						$(".comment_set").show().siblings(".bott_nav").hide();
					}
				}
			},
			onSlideChangeStart: function(swiper) {
				$('.' + target + ' .cur').removeClass('cur');
				$('.' + target + ' span').eq(swiper.activeIndex).addClass('cur');
				if($(".comment_set"))
				{
					if(swiper.activeIndex>0)
					{
						$(".comment_set").hide().siblings(".bott_nav").show();
					}else{
						$(".comment_set").show().siblings(".bott_nav").hide();
					}
				}

				$(swiper.activeSlide()).closest('.swiper-wrapper').height($(swiper.activeSlide()).find('.swiper-con').height() ).css('overflow', 'hidden');
			}
		})
		$('.' + target + ' span').on('touchstart mousedown', function() {
			$('.' + target + ' .cur').removeClass('cur');
			$(this).addClass('cur');
			tabsSwiper.swipeTo($(this).index())
			return false;
		})
	}


	exports.selts=function(){
		var pvtx=$("#pvct").children("a.cur").text();
		var sttx=$("#storm").children("a.cur").text();
		console.log(pvtx);
		if(pvtx!=null)
		{
			$(".pvct").children("span").text(pvtx);

		}
		if(sttx!=null)
		{
			$(".storm").children("span").text(sttx);
		}

		$(".pvct").click(function(){
			if($("#pvct").css("display")=="none")
			{
				$("#pvct").show().siblings(".pops").hide();
			}
		})
		$(".storm").click(function(){
			if($("#storm").css("display")=="none")
			{
				$("#storm").show().siblings(".pops").hide();
			}
		})
		$(".seletCon").children("a").click(function(){
			$(this).parent().hide();
			var clas=$(this).parent().attr("id");
			var text=$(this).text();
			$("."+clas).text(text);
		})
	}
	exports.getList=function(){
		var wH=$(window).height();
		var city=$(".citys").val();
		var typeid=$(".typeids").val();
        var page=1;
		$(window).scroll(function(){
			var bh=$(".all").height();
			var sTop=$("body").scrollTop();
			var navH=$(".nav").height()+10;
			if(sTop+wH>=(bh-navH))
			{
				page++;
				exports.ajaxList(page,city,typeid);
			}
		})

	}

	exports.ajaxList=function(page,city,typeid){
		$.ajax({
			type: "get",
			url: "/index.php/Wap/Demand/listing",
			async: false,
			data:{page:page,city:city,type:typeid},
			dataType: "json",
			success: function (result) {

				var html="";
				if(page>result.totalPage)
				{
					return false;
				}
				if(result.totalPage>0)
				{
					$.each(result.data, function(i, field) {

						html += '<dl><dd class="d1"><a href="/index.php/Wap/Demand/detail/id/'+field.id+'"><span class="img"><img src="/Public/Static/Wap/images/type'+field.typeid+'.png" width="100%"><var>'+field.type_name+'</var></span><p class="time">'+field.mrname+' '+field.verify_time_format+'</p>';
						if(field.typeid==1)
						{
							html += '<p class="name">投资项目：'+field.other.name+'</p><p>投资金额：'+field.amount+'万元 </p>';
						}
						else if(field.typeid==2)
						{
							html += '<p class="name">支持项目：'+field.other.name+'</p><p>支持金额：'+field.amount+'万元 </p>';
						}else if(field.typeid==3)
						{
							html += '<p class="name">借款金额：'+field.amount+'万元</p><p>借款期限：'+field.other.term+' </p>';
						}
						else if(field.typeid==4)
						{
							html += '<p class="name">典当金额：'+field.amount+'万元</p><p>典当期限：'+field.other.term+' </p>';
						}
						else if(field.typeid==5)
						{
							html += '<p class="name">融资金额：'+field.amount+'万元</p><p>租赁期限：'+field.other.term+' </p>';
						}
						else if(field.typeid==6)
						{
							html += '<p class="name">公司名称：'+field.other.company+'万元</p><p>拟IPO市场：'+field.other.ipo+' </p>';
						}
						else if(field.typeid==7)
						{
							html += '<p class="name">公司名称：'+field.other.company+'万元</p><p>拟融资规模：'+field.other.amount+' </p>';
						}
						else if(field.typeid==10)
						{
							html += '<p class="info">资管需求：'+field.other.note+' </p>';
						}else if(field.typeid==11)
						{
							html += '<p class="name">产品名称：'+field.other.name+'</p><p>支付金额：'+field.amount+'万元 </p>';
						}else if(field.typeid==12)
						{
							html += '<p class="name">公司名称：'+field.other.company+'</p><p class="name">咨询类型：'+field.other.zxtype+' </p>';
						}else{
							html += '<p class="name">投资金额：'+field.amount+'万元</p><p>投资期限：'+field.other.term+' </p>';
						}
						html+= '</a></dd><dd class="d2">';
						if(field.typeid!=1&&field.typeid!=2&&field.typeid!=11){
							html+='<a href="javascript:void(0);"><img src="/Public/Static/Wap/images/wz.png">'+field.city_name+'.'+field.area_name+' </a>';
						}
						html+='</dd></dl>';
					})

					$(".projectList").append(html);
				}else{
					html='<p class="nopage"><span><img src="/Public/Static/Wap/images/no.jpg" width="100%"></span></p>';
					$(".project").html(html);
				}


			}
		});
	}

	exports.selT=function(){
		$(".sel").on("click",function(){
			console.log($(this).siblings("select"));;
		})
	}

	exports.tipSuc=function(id,pop,cont){
		var html='<div class="tip">'+cont+'</div>';
		$("#"+id).on("click",function(){
			$("."+pop).hide();
			$("body").append(html);
			setTimeout(function(){
				$(".share_maskyer").hide();
				$(".tip").remove();
			},1000);
		})
	}
	exports.citySelect = function(){
		var city_json;
		var heightW=$(window).height()>=$("body").height()?$(window).height() :$("body").height() ;
		$(".select_city").css({height:heightW});
		$(".sel_prov").on("click",function(){
			$.getJSON("js/city.min.js", function(json) {
				city_json = json;
				exports.prov(city_json)
			});
		})

	};
	exports.prov =function(datajson){
		var prov_obj=$("#sel_prov");
		var temp_html='';
		$.each(datajson.citylist, function(i, prov) {
			temp_html += "<li prov_id='" + i + "' prov_name='" + prov.p+ "' class='citys'><a>" + prov.p + "</a></li>";
		});
		prov_obj.html(temp_html);
		prov_obj.show();
		prov_obj.children("li").on("click",function(){
			var prov_id=$(this).attr("prov_id");
			var prov_name=$(this).attr("prov_name");
			prov_obj.hide();
			$(".sel_prov").attr({"prov_id":prov_id}).text(prov_name);
			if(!datajson.citylist[prov_id].c[0].a)
			{
				$(".sel_city").parent(".sel").hide();
				exports.city(datajson.citylist[prov_id],"sel_dist");
			}else{
				$(".sel_city").parent(".sel").show();
				exports.city(datajson.citylist[prov_id],"sel_city");
			}
			//console.log($(this).attr("prov_id"));
		})
	}
	exports.weixin = function(){
		$(".dyhws").on("click",function(){
			$(".share_maskyer").show().siblings(".dyhwx").show();
		})
		$(".kfws").on("click",function(){
			$(".share_maskyer").show().siblings(".kfwx").show();
		})
		$(".gbwx").on("click",function(){
			$(".share_maskyer").hide().siblings(".weixins").hide();
		})

	}
	exports.city =function(datajson,obj){
		var prov_obj=$("#"+obj);
		var temp_html='';
		$("."+obj).text("请选择");
		$.each(datajson.c, function(i,  prov) {
			temp_html += "<li prov_id='" + i + "'  prov_name='" +  prov.n+ "' class='citys'><a>" +  prov.n + "</a></li>";
		});
		prov_obj.html(temp_html);
		$("."+obj).on("click",function(){
			prov_obj.show();
		})
		prov_obj.children("li").on("click",function() {
			var prov_id = $(this).attr("prov_id");
			var prov_name = $(this).attr("prov_name");
			$("."+obj).attr({"prov_id":prov_id}).text(prov_name);
			prov_obj.hide();
			if(!datajson.c[prov_id].a)
			{
				return false;
			}else{
				exports.dist(datajson.c[prov_id]);
			}
		})
	};

})