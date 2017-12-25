<?php
include 'db.php';
$sql="select * from lhhbls";
//echo $sql;
$i=1;
$query=mysql_query($sql);
//var_dump($row);

?>

<html>
<head>
<meta http-equiv="Content-Type"content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<style>
body{
	padding:0;
	margin:0;
}

	td{text-align: center;}
			.sel_main{
			width: 90%;
			margin: 0 auto;
			/*background: url('__PUBLIC__/images/banner22.jpg') no-repeat;
			background-size: 100% 100%;*/
			padding-top: 5px;
			height: 50%;
			overflow: hidden;
		}
</style>
</head>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>查询</title>
<meta name="viewport" content="width=device-width,minimum-scale=1,user-scalable=no,maximum-scale=1,initial-scale=1">
	
</head>
	<body bgcolor="#FFFFFF">
<div class="box">
    <table>
		<tr>
		  <td class="text-center">序号</td>
		  <td class="text-center">openid</td>
		  <td class="text-center">金额</td>
		  <td class="text-center">ip</td>
		</tr>
		<?php while ($row=mysql_fetch_assoc($query)) { ?>
	<tr>

		<td class="text-center"><?php echo $i++;?></td>
		<td class="text-center"><?php echo $row['openid']?></td>
		<td class="text-center"><?php echo $row['money']?></td>
		<td class="text-center"><?php echo $row['ip']?></td>
	</tr>
	<?php } ?>
		</table>
    </div>
</body>
</html>