

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


<form action="" method="post">
  <table border="0" wid>
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
