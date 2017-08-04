<?php
include 'db.php';
$sql="select * from $tbname";
//echo $sql;
$i=1;
$query=mysql_query($sql);
//var_dump($row);


?>

<html>
<head>
<meta http-equiv="Content-Type"content="text/html; charset=UTF-8">
<style>
	td{text-align: center;}
</style>
</head>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>报名查询</title>
<meta name="viewport" content="width=device-width,minimum-scale=1,user-scalable=no,maximum-scale=1,initial-scale=1">
	
</head>
	<body bgcolor="#FFFFFF">
<table border="1">
<tr>
  <td>序号</td>
  <td>姓名</td>
  <td>电话</td>
  <td>时间</td>
</tr>
	
		<?php
			while ($row=mysql_fetch_assoc($query)) {
	# code...

	?>
	<tr>

		<td><?php echo $i++;?></td>
		<td><?php echo $row['name']?></td>
		<td><?php echo $row['tel']?></td>
        <td><?php echo $row['time']?></td>
	</tr>
	<?php
	}
		?>
	</table>

</body>
</html>