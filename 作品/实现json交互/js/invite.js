// JavaScript Document
/* recoment*/
$(function(){       
    $.getJSON('invite_panel.json',function(data) {//用$.getJSON获取数据	
		 $.each(data.recommended, function(commentIndex, comment) {	//遍历json数据这是没有被邀请的	
		 //将数据遍历后，插入到网页中
			$('#recommend').append(
			'<div id="items">'+'<div id="items-img">'+'<img src="'+comment['avatarUrl']+'">'+'</div>'+
			'<div id="items-name">'+'<p id="na">'+'<a href="#">'+comment['name']+'</a>'+'</p>'+
			'<p>'+ comment['bio'] + '</p>'+'</div>'+
			'<div  id="items-btn">'+' <input type="button" value="邀请回答">'+'</div>'+'</div>');			 
		 
		 });		 
		 //按钮事件的操作		 
	        var num=data.invited[2].id;//从json中获取已邀请的人数		  
		    $('#invite-name').html('<a href="">'+num+'人'+'</a>');//显示已经邀请的人			        	
		    $('#items-btn input[type=button]').bind('click',function(){	//获取按钮后绑定click事件	   	   
		    var name=$(this).parent().parent().children().next().children('p:first-child').children();
			//通过this获取父节点中的comment['name']，邀请回答的人名，
			var namevalue=name.html();	
			$('#invite-name a[href|=""]').remove();//点击后让原先#invite-name中的内容清空；		
		 if(this.value=="邀请回答"){//判断按钮的value值来改变样式；
			  num++;
			 $(this).attr("value","收回邀请").css("background-color","#404040");	//改变button的value	     
		     $('#invite-name').append('<a href="#">'+namevalue+'、'+'</a>');	
				 //将鼠标点击的这个被邀请的人添加到头部						   				
		  }else{	
			 num--;						
			 $(this).attr("value","邀请回答").css("background-color","#006ECC");  //改变button的value	
			 $('#invite-name>a').filter(':contains("'+namevalue+'")').remove(); 
			 //将鼠标点击的这个被邀请的人从头部删除	
		  }		 
			 $('#invite-count').html('等共'+num+'人');	  
			  
			 var a_num=$('#invite-name>a');//通过获取#invite-name中动态生成的<a>标签的数量，进行处理
			 	 if(a_num.length==0){//如果<a>标签长度为0，回到初始网页时候显示的效果
					  $('#invite-name').html('<a href="">'+num+'人'+'</a>');	//处处"已选人数"
				  	  $('#invite-count').html("");//清空后面这一标签内的内容
				  
				  } 
		
			});
			
			
		 
		})
		
		 
	
		 
		        
 });	
 	   
	
	   
	   
	