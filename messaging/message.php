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
<a href="#message"></a>
<?php 
   $sql="select * from message";//��ѯmessage���е����е�����
   $squery=mysql_query($sql);//ִ��SQL���
   $nums=mysql_num_rows($squery);//�����ܹ���ѯ�����ݣ������Ƿ��е����ݵ��ж�
   if($nums!=0){
   	while ($rs=mysql_fetch_array($squery)) {
   		?>
   	<table cellspacing="1" border="0" align="center" bgcolor=red width="800" >
   		<tr> 
   		   <td bgcolor=blue>
   		   <a href="view.php?id=<?php echo $rs['id'];//�������ID?>"> <?php echo $rs['username'];//����û���  ?> </a> &nbsp;&nbsp;
   		  <a href="mailto:<?php 
   		  echo $rs['email'];//���Email
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
   	echo "<center> ��û������</center>";
   	
   	}
   
   ?>
<hr>
<a name="message"></a>
<form action="" method="post">
  <table border="0" width="500">
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
