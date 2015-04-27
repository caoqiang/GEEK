<?php
include_once 'conn.php';
//判断是否提交
if(!empty($_POST['post'])){
	$sql="insert into message set username='".$_POST['username']."',email='".$_POST['email']."',content='".$_POST['content']."'";
	// $result=mysql_query($sql);
	//$sql="insert into message set username='".$_POST['username']."',`email`='".$_POST['email']."',content='".$_POST['content']."'"; //将提交过来的内容组合成SQL语句
	$result = mysql_query($sql);
	if($result){
		echo "<script type='text/javascript'>
		     alert('留言成功');
    	   location.href='index.php'</script>";
	}else {
		echo "<script type='text/javascript'>
		     alert('留言失敗');
    	   location.href='index.php'</script>";
	}


}
?>
<a href="#message"></a>
<?php 
   $sql="select * from message";//查询message表中的所有的数据
   $squery=mysql_query($sql);//执行SQL语句
   $nums=mysql_num_rows($squery);//计算总共查询的数据，用作是否有的数据的判断
   if($nums!=0){
   	while ($rs=mysql_fetch_array($squery)) {
   		?>
   	<table cellspacing="1" border="0" align="center" bgcolor=red width="800" >
   		<tr> 
   		   <td bgcolor=blue>
   		   <a href="view.php?id=<?php echo $rs['id'];//输出留言ID?>"> <?php echo $rs['username'];//输出用户名  ?> </a> &nbsp;&nbsp;
   		  <a href="mailto:<?php 
   		  echo $rs['email'];//输出Email
   		  ?>"> E-mail:<?php echo  $rs['email']?></a>
   		   
   		   </td>
   		</tr>
   		<tr>
   		   <td bgcolor="#fdfeff">
   		   <?php  echo $rs['content']?>;
   		   </td>
   		</tr>
   	
   	</table>	
   	<br>
  <?php 	
   		}
  	 }else {
   	echo "<center> 还没留言呢</center>";
   	
   	}
   
   ?>
<hr>
<a name="message"></a>
<form action="" method="post">
  <table border="0" width="500">
       <tr>
	       <td width="100" align="center"> 用戶名：</td>
	       <td>  <input type="text" name="username" value=""></td>
      </tr>
      <tr>
	       <td width="100" align="center"> E-mail：</td>
	       <td>  <input type="text" name="email" value=""></td>
      </tr>
      <tr>
	       <td width="100" align="center"> 用戶名：</td>
	       <td>  <textarea name="content"></textarea></td>
      </tr>
      <tr> 
           <td colspan="2"><input type="submit" name="post" value="留言"></td>
        
        </tr>
      
</table>


</form>
