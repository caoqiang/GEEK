<?php 
	$conn = @mysql_connect("localhost","root","root")or die("���ݿ�����ʧ�ܣ�");   //�������ݿ� 
	mysql_select_db("message",$conn)or die("û�и����ݿ⣡");
	mysql_query("set names 'GBK'"); //���ò��������ʽ 
?>


