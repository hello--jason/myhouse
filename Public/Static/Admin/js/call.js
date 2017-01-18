/*!
 * Created By:evanxu;
 * Created Time:2015-11-05;
 * Updated By:evanxu;
 * Updated Time:2015-11-05;
 * http://evanxu.com
 */
define(function(require, exports, module){

	exports.init = function(){}
	exports.navs = function(e){
		for(var _obj=document.getElementById(e.id).getElementsByTagName(e.tag),i=-1,em;em=_obj[++i];){
			em.onclick = function(){ //onmouseover
				var ul = this.nextSibling;
				if(!ul){return false;}
				ul = ul.nextSibling; if(!ul){return false;}
				if(e.tag != 'a'){ ul = ul.nextSibling; if(!ul){return false;} } //a 标签控制 隐藏或删除该行
				for(var _li=this.parentNode.parentNode.childNodes,n=-1,li;li=_li[++n];){
					if(li.tagName=="LI"){
						for(var _ul=li.childNodes,t=-1,$ul;$ul=_ul[++t];){
							switch($ul.tagName){
								case "UL":
									$ul.className = $ul!=ul?"" : ul.className?"":"off";
									break;
								case "EM":
									$ul.className = $ul!=this?"" : this.className?"":"off";
									break;
							}
						}
					}
				}
			}
		}
	}

})