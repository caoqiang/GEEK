<?php 
	$conn = @mysql_connect("localhost","root","root")or die("数据库连接失败！");   //连接数据库 
	mysql_select_db("message",$conn)or die("没有该数据库！");
	mysql_query("set names 'GBK'"); //设置操作编码格式 
?>


