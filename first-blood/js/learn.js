// JavaScript Document
function showtarget(st){
	var oFrame=document.getElementById("jieshao-iframe");
	switch(st){
		case "st1":oFrame.src="webpagefront.html";
		break;
		case "st2":oFrame.src="webpageafter.html";
		break;
		case "st3":oFrame.src="art.html";
		break;
		case "st4":oFrame.src="android.html";
		break;
		};
	
	}
//图片滚动	
window.onload=function(){
	var oDiv=document.getElementById('div');
	var oLeft=document.getElementById('left');
	var oRight=document.getElementById('right');
	var oDiv1=document.getElementById('div1');
	var oUl=oDiv1.getElementsByTagName('ul')[0];
	var aLi=oUl.getElementsByTagName('li');
	var speed=1;
	oUl.innerHTML=oUl.innerHTML+oUl.innerHTML;
	oUl.style.width=aLi[0].offsetWidth*aLi.length+90+'px';
	function move(){
		if(oUl.offsetLeft<-oUl.offsetWidth/2){
			oUl.style.left=0;
		};
		if(oUl.offsetLeft>0){
			oUl.style.left=-oUl.offsetWidth/2+'px';
		};
		oUl.style.left=oUl.offsetLeft+speed+'px';
	};
	var timer=setInterval(move,30);
	div1.onmouseover=function(){
		clearInterval(timer);
	};
	div1.onmouseout=function(){
		timer=setInterval(move,30);
	};
	oLeft.onclick=function(){
		speed=-1;
	};
	oRight.onclick=function(){
		speed=1;
	};
}