<?php    
include 'db.php';
$sql="select * from $tbname order by time asc limit 0 ,850";
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
			background: #141414;
      margin: 0;
		}
		.sel_main{
			width: 90%;
      		height: 450px;
			margin: 0 auto;
	        overflow-y:auto;
	        position: absolute;
	        top: 23%;
	        left: 5%;
	        /*background: url('bg.jpg') no-repeat;
	        background-size: 100% 100%;*/
		}
		h2{
			width: 100%;
			text-align: center;
			margin-top: 10px;
		}
	</style>
</head>
<body id='sel'>
<br>
<br>
<img src="bg.jpg" alt="" style="width:100%;height:100%;position:absolute;top:0;left:0;">
<center><h1 style="color:white;position:absolute;top:5%;left:35%;width:30%;">排行榜</h1></center>
	<div class="sel_main">
	<table border='1' width="100%"cellpadding="2" cellspacing="0" style="color:white;border:1px solid grey;font-size:20px;">
		<tr>
			<td align='center' width="25%" style="height:40px;">排行</td>
			<td align='center' width="25%" style="height:40px;">姓名</td>
			<td align='center' width="25%" style="height:40px;">用时（秒）</td>
		</tr>
		<?php
			while ($row=mysql_fetch_assoc($query)) {
		# code...
		$a++;
	?>
	<?php 
	$tim=$row['time'];
	$tima=$tim/100;
	 ?>
	<tr border='1px' style="color: white;">
		<td align='center' width="25%" style="height:40px;">第<?php echo $a ?>名</td>
		<td align='center' width="25%" style="height:40px;"><?php echo $row['name']?></td>
		<td align='center' width="25%" style="height:40px;"><?php if($tima>9999){echo "无成绩";}else{echo $tima;}?></td>
	</tr>
	<?php
	}
	?>
	</table>
	<br>
	<br>
	<br>
	<br>
  </div>
</body>
</html>