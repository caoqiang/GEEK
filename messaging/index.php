

<?php
include_once 'conn.php';
//�ж��Ƿ��ύ
if(!empty($_POST['post'])){
    $sql="insert into message set username='".$_POST['username']."',email='".$_POST['email']."',content='".$_POST['content']."'";
   // $result=mysql_query($sql);
	//$sql="insert into message set username='".$_POST['username']."',`email`='".$_POST['email']."',content='".$_POST['content']."'"; //���ύ������������ϳ�SQL���
	$result = mysql_query($sql);
		    if($result){
    	echo "<script type='text/javascript'>
		     alert('���Գɹ�');
    	   location.href='index.php'</script>";   	
    }else {
    	echo "<script type='text/javascript'>
		     alert('����ʧ��');
    	   location.href='index.php'</script>";     	
    }
	
	
}

?>


<form action="" method="post">
  <table border="0" wid>
       <tr>
	       <td width="100" align="center"> �Ñ�����</td>
	       <td>  <input type="text" name="username" value=""></td>
      </tr>
      <tr>
	       <td width="100" align="center"> E-mail��</td>
	       <td>  <input type="text" name="email" value=""></td>
      </tr>
      <tr>
	       <td width="100" align="center"> �Ñ�����</td>
	       <td>  <textarea name="content"></textarea></td>
      </tr>
      <tr> 
           <td colspan="2"><input type="submit" name="post" value="����"></td>
        
        </tr>
      
</table>


</form>
