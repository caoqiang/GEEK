<?php
include 'conn.php';
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户管理</title>
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
	<div id="header">留言管理</div>
	<div id="main">
		<table>
			<tr>
				<th width="100">id</th>
				<th width="150">用户名</th>
				<th width="200">邮件地址</th>
				<th width="300">留言內容</th>
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
				echo "当前{$page}/{$maxpage}页 共计{$maxrows}条信息&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "<a href='user.php?page=1'>首页</a>&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "<a href='user.php?page=" . ($page - 1) . "'>上一页</a>&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "<a href='user.php?page=" . ($page + 1) . "'>下一页</a>&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "<a href='user.php?page=" . $maxpage . "'>最后一页</a>";
				?>
				</div>

	</div>
</body>
</html>