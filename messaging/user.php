<?php
include 'conn.php';
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�����</title>
<style type="text/css">
body {
	text-align: center;
}

#header {
	width: 800px;
	height: 50px;
	margin: 10px;
	background: #E3EFFB;
	line-height: 50px;
	font-size: 20px;
}

#main {
	width: 600px;
	margin: 10px;
	margin: 0px auto;
}

#main table {
	widt h: 600px;
	background: #E3EFFB;
	cellspacing: 1px;
	text-align: center;
}

#main table tr {
	background: white;
}

#main table img {
	border: 0px;
}

#page {
	width: 600px;
	height: 30px;
	background: #E3EFFB;
	line-height: 30px;
}
</style>
</head>
<body>
	<div id="header">���Թ���</div>
	<div id="main">
		<table>
			<tr>
				<th width="100">id</th>
				<th width="150">�û���</th>
				<th width="200">�ʼ���ַ</th>
				<th width="300">���ԃ���</th>
			</tr>
   		
 <?php
				$page = isset($_GET['page'])?$_GET['page']:1;
				$pagesize=5;
				$sql ="select count(*) from message";
				$result=mysql_query($sql);
				$maxrows=mysql_result($result,0,0);
				$maxpage=ceil($maxrows/$pagesize);
				if ($page>$maxpage) {
					$page=$maxpage;
				}
				if ($page<1) {
					$page=1;
				}
				$offset=($page-1)*$pagesize;
				$sql="select * from message limit {$offset},$pagesize";
				         $result = mysql_query ( $sql );
				while($rows=mysql_fetch_assoc($result)){
								echo "<tr>";
								echo "<td>{$rows['id']}</td>";
								echo "<td>{$rows['username']}</td>";
								echo "<td>{$rows['email']}</td>";
								echo "<td>{$rows['content']}</td>";
								echo "</tr>";
									}
?> 
</table>
		<br />
		<div id="page">
				<?php
				echo "��ǰ{$page}/{$maxpage}ҳ ����{$maxrows}����Ϣ&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "<a href='user.php?page=1'>��ҳ</a>&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "<a href='user.php?page=" . ($page - 1) . "'>��һҳ</a>&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "<a href='user.php?page=" . ($page + 1) . "'>��һҳ</a>&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "<a href='user.php?page=" . $maxpage . "'>���һҳ</a>";
				?>
				</div>

	</div>
</body>
</html>