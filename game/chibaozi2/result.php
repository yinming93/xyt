<?php
include 'db.php';
$sql="select * from $tbname order by code desc,time asc";
//echo $sql;
$a=0;
$query=mysql_query($sql);
//var_dump($row);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>排行榜查询</title>
	        <meta name="viewport" content="width=device-width,minimum-scale=1,user-scalable=no,maximum-scale=1,initial-scale=1">
	<style>
		#sel{
			background:#71c2ef;
		}
		.sel_main{
			width: 90%;
			margin: 0 auto;
			background: rgba(255,255,255,.3);
			padding-top: 5px;
		}
		h2{
			width: 100%;
			text-align: center;
			margin-top: 10px;
		}
	</style>
</head>
<body id='sel'>
	<div class="sel_main">
<h2>排行榜查询</h2>
	<table border='1' width="100%">
		<tr>
			<td align='center' width="20%">排行</td>
			<td align='center' width="20%">姓名</td>
            <td align='center' width="20%">电话</td>
			<td align='center' width="20%">分数</td>
<td align='center' width="20%">时间</td>
		</tr>
	
		<?php
			while ($row=mysql_fetch_assoc($query)) {
	# code...
	$a++;

	?>
	<tr border='1px'>
		<td align='center' width="20%">第<?php echo $a ?>名</td>
		<td align='center' width="20%"><?php echo $row['uname']?></td>
       <td align='center' width="20%"> <?php echo $row['tel']?></td>
		<td align='center' width="20%"><?php echo $row['code']?>分</td>
<td align='center' width="20%"><?php echo $row['time']?></td>
	</tr>
	<?php
	}
		?>
	</div>
	</table>
<div align="center"><a href="index.html">返回 </a></div>
</body>
</html>