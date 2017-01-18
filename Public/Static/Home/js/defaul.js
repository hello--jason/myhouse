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