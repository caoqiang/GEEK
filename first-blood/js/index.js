// JavaScript Document
function getCurrentStyle (obj, prop){

      if (obj.currentStyle) //IE
      {
          return obj.currentStyle[prop];
      }
      else if (window.getComputedStyle) //非IE
      {
          propprop = prop.replace(/([A-Z])/g, "-$1");
          propprop = prop.toLowerCase();
          return document.defaultView.getComputedStyle(obj,null)[propprop];
      }
     return null;
}
window.onload=function() {
	var amember_intro_img=document.getElementsByName("member_intro_img");
	var amember_intro=document.getElementById("member_intro");
	var amember_intro_div=amember_intro.getElementsByTagName("div");
	
	
    /********************成员介绍*******************/
	for(var i=0;i<amember_intro_img.length;i++){
		amember_intro_img[i].onmousemove=function(){
			startMove(this.nextSibling,"height",0);
			getCurrentStyle(this.nextSibling,"display");
			this.nextSibling.style.display="none";
		};
		amember_intro_img[i].onmouseout=function(){
			startMove(this.nextSibling,"height",30);
			getCurrentStyle(this.nextSibling,"display");
			this.nextSibling.style.display="block";
		};
	}
};
	/********************运动框架*******************/	
function startMove(obj,arrt,iTarget){
	clearInterval(obj.timer);
	obj.timer=setInterval(function (){
		var cur=0;
		if(arrt=="opacity"){
			cur=parseFloat(getCurrentStyle(obj,arrt))*100;
		}
		else{
			cur=parseInt(getCurrentStyle(obj,arrt));
		}
		var speed=(iTarget-cur)/3;
		speed=speed>0?Math.ceil(speed):Math.floor(speed);
		if(cur==iTarget){
			clearInterval(obj.timer);
		}
		else{
			if(arrt=="opacity"){
				obj.style.filter="alpha(opacity:+'cur+speed')";
				obj.style.opacity=(cur+speed)/100;
			}
			else{
		        obj.style[arrt]=cur+speed+"px";
			}
		}
	},30);
}
	
